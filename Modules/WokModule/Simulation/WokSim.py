import logging
import threading
import time

import colorlog
from MainControllerMessage import ComponentCodes
from WokMessage import (
    WokStates,
    WokRequestCodes,
    MasterWokRequestCodes,
    WokErrors,
    WokReceiveResponses,
)
from transitions import Machine

log = colorlog.getLogger("WokSim")


class WokSim:
    """This is the simulation of the wok component powered by an Arduino"""

    # The transitions for the finite state machine
    transitions = [
        {
            "trigger": "configured_order",
            "source": WokStates.WAITING_ORDER,
            "dest": WokStates.WAITING_INGREDIENT,
        },
        {
            "trigger": "cook",
            "source": WokStates.WAITING_INGREDIENT,
            "dest": WokStates.COOKING,
        },
        {
            "trigger": "cook_done",
            "source": WokStates.COOKING,
            "dest": WokStates.DISPENSING_FOOD,
            "after": "_drop_dish_to_bowl",
        },
        {
            "trigger": "clean",
            "source": WokStates.DISPENSING_FOOD,
            "dest": WokStates.CLEANING,
        },
        {
            "trigger": "reconfig",
            "source": [
                WokStates.WAITING_ORDER,
                WokStates.WAITING_INGREDIENT,
                WokStates.COOKING,
            ],
            "dest": WokStates.WAITING_ORDER,
        },
        {
            "trigger": "reset",
            "source": "*",
            "dest": WokStates.WAITING_ORDER,
            "before": "_reset",
        },
    ]

    def __init__(self, id) -> None:

        # Component attributes
        self._component_code = ComponentCodes.WOK
        self._error_code = WokErrors.NO_ERROR
        self._request_code = WokRequestCodes.NO_REQUEST

        # Wok attributes
        self.id = id
        self._real_wok_degrees = 23

        # Operation attributes
        self._order_id = None
        self._heat_degrees = None
        self._cook_seconds = None
        self._ingredients_ready = False
        self._drop_done = False
        self._clean_done = False

        self._preheat_start_degrees = None
        self._cook_start_time = None
        self._cooked_seconds = 0
        self._last_cook_iteration_check_time = 0
        self._startup = True

        # Initialize Wok state machine
        self.machine = Machine(
            model=self,
            states=WokStates,
            transitions=WokSim.transitions,
            initial=WokStates.WAITING_ORDER,
        )

        self._reset()

        # Request handlers
        self._request_handlers = {
            MasterWokRequestCodes.GET_COMPONENT_CODE: self._get_component_code,
            MasterWokRequestCodes.GET_STATE_CODE: self._get_state_code,
            MasterWokRequestCodes.GET_ERROR_CODE: self._get_error_code,
            MasterWokRequestCodes.GET_REQUEST_CODE: self._get_request_code,
            MasterWokRequestCodes.RESPOND_REQUEST: self._save_data_handler,
            # Wok special requests
            MasterWokRequestCodes.RESET_WOK: self._reset,
            MasterWokRequestCodes.RESET_HEAT_TEMPERATURE: self._set_heat_degrees,
            MasterWokRequestCodes.RESET_COOKING_TIME: self._set_cook_seconds,
            MasterWokRequestCodes.RECONFIG_WOK: self._reconfig,
            MasterWokRequestCodes.FORCE_DISPENSE: self._force_dispense,
        }

        # Receiving handlers
        self._receive_handlers = {
            WokRequestCodes.SET_ORDER_ID: self._set_order_id,
            WokRequestCodes.SET_HEAT_DEGREES: self._set_heat_degrees,
            WokRequestCodes.SET_COOK_SECONDS: self._set_cook_seconds,
            WokRequestCodes.SET_INGREDIENTS_READY: self._set_ingredients_ready,
            WokRequestCodes.SET_WOK_IS_EMPTY: self._set_wok_is_empty,
        }

        # Actions to execute in each states
        self._state_actions = {
            WokStates.WAITING_ORDER: self._waiting_order_state_actions,
            WokStates.WAITING_INGREDIENT: self._waiting_ingredient_state_actions,
            WokStates.COOKING: self._cooking_state_actions,
            WokStates.DISPENSING_FOOD: self._dispensing_food_state_actions,
            WokStates.CLEANING: self._cleaning_state_actions,
        }

        # WokSim loop Thread
        self._transition_lock = threading.RLock()
        self._loop_thread_stop_event = threading.Event()
        loop_thread = threading.Thread(target=self._sim_loop)
        loop_thread.start()

    """
    Wok Input/Output functions
    """

    def request(self, request_code, data=0) -> int:
        """Got request from main controller"""
        response = WokReceiveResponses.DENIED

        if request_code in self._request_handlers:
            request_handler = self._request_handlers[request_code]
            response = request_handler(data)

        return response

    def _get_component_code(self, data) -> ComponentCodes:
        """Handle request code 1"""
        return ComponentCodes.WOK

    def _get_state_code(self, data) -> WokStates:
        """Handle request code 2"""
        return WokStates(self.state)

    def _get_error_code(self, data) -> WokErrors:
        """Handle request code 3"""
        return WokErrors(self._error_code)

    def _get_request_code(self, data) -> WokRequestCodes:
        """Handle request code 4"""
        return WokRequestCodes(self._request_code)

    def _save_data_handler(self, data) -> WokReceiveResponses:
        """Handle request code 5"""
        response = WokReceiveResponses.DENIED
        if self._request_code in self._receive_handlers:
            receive_handler = self._receive_handlers[self._request_code]
            response = receive_handler(data)
            # with self._transition_lock:
            #     self._transit_state()
        return response

    def _reset(self, data=None) -> WokReceiveResponses:
        """Handle request code 6 or when Wok naturally goes back to WAITING ORDER state"""

        # If reset by master
        if data is not None:
            if self.is_COOKING():
                self.error_code = WokErrors.COOK_TERMINATED_BEFORE_DONE
                log.error(f"WokSim #{self.id} {self.error_code.get_description()}")
                # return WokReceiveResponses.DENIED # TODO: Need to clarify how to recover from error
                self.reset()

        # Reset operation attributes
        self._order_id = None

        return self._reconfig(data=data)

    def _reconfig(self, data=None) -> WokReceiveResponses:
        """Handle request code 9"""

        # Check state
        if self.is_DISPENSING_FOOD() or (self.is_CLEANING() and not self._clean_done):
            self.error_code = WokErrors.NOT_ABLE_TO_RECONFIG
            log.error(f"WokSim #{self.id} {self.error_code.get_description()}")
            return WokReceiveResponses.DENIED

        # Reset operation attributes
        self._heat_degrees = None
        self._cook_seconds = None
        self._ingredients_ready = False
        self._drop_done = False

        self._preheat_start_degrees = None
        self._cook_start_time = None
        self._cooked_seconds = 0
        self._last_cook_iteration_check_time = 0
        self._last_cook_iteration_time = None

        # Go to WAITING ORDER if not naturally reconfigure request from the Main Controller
        if not (self.is_CLEANING() and self._clean_done) and not self._startup:
            self.reconfig()
            log.warning(
                f"WokSim #{self.id} reconfigured (erase cooking time and temperature)"
            )

        self._clean_done = False
        self._startup = False

        return WokReceiveResponses.CONFIRMED

    def _force_dispense(self, data=None):
        """Handle request code 10"""
        if self.is_COOKING():
            log.warning(f"WokSim #{self.id} been forced to dispense dish")
            self._cook_seconds = 0
            return WokReceiveResponses.CONFIRMED

        self.error_code = WokErrors.NOT_ABLE_TO_RECONFIG
        log.error(f"WokSim #{self.id} {self.error_code.get_description()}")
        return WokReceiveResponses.DENIED

    def _set_order_id(self, o_id: str) -> WokReceiveResponses:
        """Handler data that requested by Wok request 1"""
        self._order_id = o_id
        log.info(
            f"WokSim #{self.id} set an order to cook (Order ID: {self._order_id}) "
            f"Temperature: {self._heat_degrees}C, Cook for {self._cook_seconds} seconds."
        )
        return WokReceiveResponses.CONFIRMED

    def _set_heat_degrees(self, degrees: int) -> WokReceiveResponses:
        """Handler data that requested by Wok request 2 and Main Controller request 7"""
        # Not able to set heat degree while not in WAITING ORDER, WAITING INGREDIENT, or COOKING state
        if not (
            self.is_WAITING_ORDER() or self.is_WAITING_INGREDIENT() or self.is_COOKING()
        ):
            log.error(
                f"WokSim #{self.id} not able to set temperature while in {self.state.name} state"
            )
            return WokReceiveResponses.DENIED

        # If resetting heat degrees (only at Main Controller request 7)
        if self._heat_degrees:
            log.warning(
                f"WokSim #{self.id} cooking temperature reset to {degrees} C (was {self._heat_degrees} C)."
            )

        self._heat_degrees = degrees
        return WokReceiveResponses.CONFIRMED

    def _set_cook_seconds(self, duration: int) -> WokReceiveResponses:
        """Handler data that requested by Wok request 3 and Main Controller request 8"""
        # Not able to set cooking duration while not in WAITING ORDER, WAITING INGREDIENT, or COOKING state
        if not (
            self.is_WAITING_ORDER() or self.is_WAITING_INGREDIENT() or self.is_COOKING()
        ):
            log.error(
                f"WokSim #{self.id} not able to set cook duration while in {self.state.name} state"
            )
            return WokReceiveResponses.DENIED

        # If resetting cook duration (only at Main Controller request 8)
        if self._cook_seconds:
            log.warning(
                f"WokSim #{self.id} cooking time reset to {duration} seconds (was {self._cook_seconds} seconds)."
            )

        self._cook_seconds = duration
        return WokReceiveResponses.CONFIRMED

    def _set_ingredients_ready(self, is_ingredients_ready: bool) -> WokReceiveResponses:
        """Handler data that requested by Wok request 4"""
        self._ingredients_ready = is_ingredients_ready
        return WokReceiveResponses.CONFIRMED

    def _set_wok_is_empty(self, is_wok_empty: bool) -> WokReceiveResponses:
        """Handler data that requested by Wok request 5"""
        self._drop_done = is_wok_empty
        return WokReceiveResponses.CONFIRMED

    """
    Physical functions
    """

    @property
    def _is_temperature_set(self) -> bool:
        """Check if preheat is done"""
        if (
            self._heat_degrees
            and abs(self._heat_degrees - self._real_wok_degrees) < 0.5
        ):
            return True
        return False

    def _adjust_wok_temperature(self) -> None:
        """Simulate pre-heat Wok to configured cooking temperature"""

        # Not able to pre-heat if not configured cooking temperature
        if not self._heat_degrees:
            log.error(
                f"WokSim #{self.id} can't pre-heat without cooking temperature configured."
            )
            return

        # Do nothing if pre-heat is achieve
        if self._is_temperature_set:
            return

        # Set pre-heating monitoring when start cooking
        if not self._preheat_start_degrees:
            self._preheat_start_degrees = self._real_wok_degrees

        # Updates while pre-heating
        if self._real_wok_degrees > self._heat_degrees:
            self._real_wok_degrees -= 1
        else:
            self._real_wok_degrees += 1

        current_delta_degrees = self._heat_degrees - self._real_wok_degrees
        full_delta_degrees = self._heat_degrees - self._preheat_start_degrees
        if current_delta_degrees % (full_delta_degrees // 5) == 0:
            log.info(
                f"WokSim #{self.id} adjusting temperature (current temperature {self._real_wok_degrees} C, "
                f"target {self._heat_degrees} C)"
            )

    def _cook(self) -> None:
        """Simulate Wok while cooking"""
        now = time.time()

        # Set cooking monitoring when start cooking
        if not self._cook_start_time:
            self._cook_start_time = now
            self._cooked_seconds = 0
            self._last_cook_iteration_check_time = now

        # Set last cook iteration time to now if it's None
        if not self._last_cook_iteration_time:
            self._last_cook_iteration_time = now

        # Adjust temperature if it's not set
        if not self._is_temperature_set:
            self._adjust_wok_temperature()
            self._last_cook_iteration_time = None
            return

        # Updates while cooking
        self._cooked_seconds += now - self._last_cook_iteration_time
        self._last_cook_iteration_time = now

        # Logs
        check_delta = now - self._last_cook_iteration_check_time
        if check_delta > self._cook_seconds // 5:
            remaining_seconds = self._cook_seconds - self._cooked_seconds
            log.info(
                f"WokSim #{self.id} cooking ... Cooked {self._cooked_seconds:.2f} seconds, "
                f"{remaining_seconds:.2f} seconds remaining."
            )
            self._last_cook_iteration_check_time = now

    def _drop_dish_to_bowl(self) -> None:
        """Simulate Wok dispensing food to bowl"""
        log.info(f"WokSim #{self.id} dropping dish to bowl ...")

    def _clean_wok(self) -> None:
        """Simulate Wok cleaning"""
        log.info(f"WokSim #{self.id} cleaning ...")
        self._clean_done = True
        log.info(f"WokSim #{self.id} cleaning done. Waiting order again.")

    """
    Wok Operations logic functions
    """

    def _transit_state(self) -> None:
        """The logic of state transition

        1. The Wok will initialize in the `WAITING ORDER` state, which will
            - Wait for the main controller to set the cooking heat temperature.
            - Heat the Wok to the temperature configured.
            - Wait for the main controller to set cooking duration in seconds.
            - Wait for the main controller to pass down the order id.
        2. After the above parameters are set, the Wok goes into the `waiting ingredients` state which will
            - Wait for the main controller to notify if the ingredients are in the Wok.
        3. Once the main controller confirm the ingredients have been put in the Wok, it goes into the
        `cooking` state which will
            - Heat the Wok to the temperature configured and cook for the duration in seconds previously set.
        4. Once the cooking time has passed, the Wok will enter the `dispensing food` state which will
            - Drop the Wok content (food) into the bowl.
        5. Finally, the Wok will go to the `cleaning` state after dropping the dish into a bowl. It will
            - Clean itself
        6. The Wok will cycle back to the first step

        """

        # If Wok is configured if the order id, cook duration, and temperature are set (point 1 and 2)
        if (
            self.is_WAITING_ORDER()
            and self._real_wok_degrees
            and self._is_temperature_set
            and self._cook_seconds
            and self._order_id
        ):
            self.configured_order()

        # If Wok has ingredients ready then start to cook (point 3)
        elif self.is_WAITING_INGREDIENT() and self._ingredients_ready:
            self.cook()

        # If Wok done cooking when the cooked time is mare than configured cook duration (point 4)
        elif (
            self.is_COOKING() and self._cooked_seconds >= self._cook_seconds
            if self._cook_seconds is not None
            else 0
        ):
            self.cook_done()

        # Wok can start cleaning once it's empty (point 5)
        elif self.is_DISPENSING_FOOD() and self._drop_done:
            self.clean()

        # Wok can reset to WAITING ORDER state once it done cleaning (point 6)
        elif self.is_CLEANING() and self._clean_done:
            self.reset()

    def stop(self) -> None:
        self._loop_thread_stop_event.set()

    def _sim_loop(self) -> None:
        loop_interval_seconds = 0.1
        log.info(f"WokSim #{self.id} simulation loop initialized.")

        while not self._loop_thread_stop_event.is_set():
            # Get state actions and run them
            state_actions = self._state_actions[self.state]
            state_actions()

            # Update state if meet the requirements
            with self._transition_lock:
                self._transit_state()

            # Rest a bit
            time.sleep(loop_interval_seconds)

        log.info(f"WokSim #{self.id} simulation terminated.")

    def _waiting_order_state_actions(self) -> None:
        """Actions while WAITING ORDER state"""
        # Update Wok request code
        self._request_code = WokRequestCodes.NO_REQUEST
        self._request_code = (
            WokRequestCodes.SET_ORDER_ID if not self._order_id else self._request_code
        )
        self._request_code = (
            WokRequestCodes.SET_COOK_SECONDS
            if not self._cook_seconds
            else self._request_code
        )
        self._request_code = (
            WokRequestCodes.SET_HEAT_DEGREES
            if not self._heat_degrees
            else self._request_code
        )

        # If temperature configured pre-heat the Wok
        if self._heat_degrees:
            self._adjust_wok_temperature()

    def _waiting_ingredient_state_actions(self) -> None:
        """Actions while WAITING INGREDIENTS state"""
        # Update Wok request code
        self._request_code = (
            WokRequestCodes.SET_INGREDIENTS_READY
            if not self._ingredients_ready
            else WokRequestCodes.NO_REQUEST
        )

    def _cooking_state_actions(self) -> None:
        """Actions while COOKING state"""
        # Cook dish
        self._cook()

    def _dispensing_food_state_actions(self) -> None:
        """Actions while WAITING INGREDIENTS state"""
        # Update Wok request code
        self._request_code = (
            WokRequestCodes.SET_WOK_IS_EMPTY
            if not self._drop_done
            else WokRequestCodes.NO_REQUEST
        )

    def _cleaning_state_actions(self) -> None:
        """Actions while WAITING INGREDIENTS state"""
        # Clean the Wok
        self._clean_wok()


if __name__ == "__main__":
    """This main function should only be use to debug

    It contains a command line interface to control a wok simulation.
    This simulation will simulate the hardware level behavior of a Wok
    which will receive 8-bit I2C message at a time and respond another
    8-bits message as designed in OK Communication Message
    Specification.

    To debug, install requirements and requirements-dev then run
    >>> python WokSim.py
    """

    # Create a colored log stream handler with custom format
    ch = colorlog.StreamHandler()
    ch.setFormatter(
        colorlog.ColoredFormatter(
            "{asctime} [{log_color}{levelname:^8}{reset}] {name:s} "
            ":{bold_black}{threadName:s}{reset}: {log_color}{message:s}",
            style="{",
            log_colors={
                "DEBUG": "bold_cyan",
                "INFO": "green",
                "WARNING": "yellow",
                "ERROR": "thin_red",
                "CRITICAL": "bold_red",
            },
        )
    )

    # Create logger for this file
    log = colorlog.getLogger("WokSim")
    log.setLevel(logging.INFO)
    log.addHandler(ch)

    # Setup finite state machine log
    transition_log = colorlog.getLogger("transitions.core")
    transition_log.name = "StateMachine"
    transition_log.setLevel(logging.INFO)
    transition_log.addHandler(ch)

    # Create a wok simulation
    wok = WokSim(id=1)

    # CLI
    while True:
        command = input("I2C request code > ")
        try:
            if command == "stop":
                wok.stop()
                break
            elif type(eval(command)) is int:
                command = int(command)
                data = 0
                if command == MasterWokRequestCodes.GET_COMPONENT_CODE:
                    pass
                elif command == MasterWokRequestCodes.GET_STATE_CODE:
                    pass
                elif command == MasterWokRequestCodes.GET_ERROR_CODE:
                    pass
                elif command == MasterWokRequestCodes.GET_REQUEST_CODE:
                    pass
                elif command == MasterWokRequestCodes.RESPOND_REQUEST:
                    data = input("I2C data > ")
                    if (
                        wok.request(
                            request_code=MasterWokRequestCodes.GET_REQUEST_CODE, data=0
                        )
                        == WokRequestCodes.SET_ORDER_ID
                    ):
                        data = data
                    else:
                        data = int(data)
                elif command == MasterWokRequestCodes.RESET_WOK:
                    pass
                elif command == MasterWokRequestCodes.RESET_HEAT_TEMPERATURE:
                    data = input("I2C data > ")
                    data = int(data)
                elif command == MasterWokRequestCodes.RESET_COOKING_TIME:
                    data = input("I2C data > ")
                    data = int(data)

                response = wok.request(request_code=int(command), data=data)
                print(f"I2C respond: {response}")

                # # Check state code
                # state_code = wok.request(request_code=int(2), data=0)
                # while state_code != WokStates.WAITING_ORDER and state_code != WokStates.WAITING_INGREDIENT:
                #     state_code = wok.request(request_code=int(2), data=0)

        except Exception as e:
            print(e)
            continue
