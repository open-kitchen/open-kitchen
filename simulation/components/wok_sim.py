import time
from typing import Dict, List, Type

from components import ComponentSim
from messages.main_controller_message import ComponentCodes, ComponentReceiveResponses
from messages.wok_message import (
    WokStates,
    WokRequestCodes,
    MasterWokRequestCodes,
    WokErrors,
)


class WokSim(ComponentSim):
    """This is the simulation of the wok component powered by an Arduino"""

    def __init__(self, id) -> None:
        super().__init__(
            component_id=id,
            component_code=ComponentCodes.WOK,
            initial_state=WokStates.WAITING_ORDER,
        )

        # Wok attributes
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

        # WokSim loop Thread
        self._reset()
        self.start()

    """
    Wok Input/Output functions
    """

    @property
    def _request_handlers(self) -> Dict:
        """Request handlers"""
        # Grab general component request handlers
        general_component_request_handlers = super()._request_handlers

        # Wok special requests
        wok_request_handlers = {
            MasterWokRequestCodes.RESET_WOK: self._reset,
            MasterWokRequestCodes.RESET_HEAT_TEMPERATURE: self._set_heat_degrees,
            MasterWokRequestCodes.RESET_COOKING_TIME: self._set_cook_seconds,
            MasterWokRequestCodes.RECONFIG_WOK: self._reconfig,
            MasterWokRequestCodes.FORCE_DISPENSE: self._force_dispense,
        }

        # Combines all handlers
        wok_request_handlers.update(general_component_request_handlers)
        return wok_request_handlers

    @property
    def _receive_handlers(self) -> Dict:
        """Receiving handlers"""
        return {
            WokRequestCodes.SET_ORDER_ID: self._set_order_id,
            WokRequestCodes.SET_HEAT_DEGREES: self._set_heat_degrees,
            WokRequestCodes.SET_COOK_SECONDS: self._set_cook_seconds,
            WokRequestCodes.SET_INGREDIENTS_READY: self._set_ingredients_ready,
            WokRequestCodes.SET_WOK_IS_EMPTY: self._set_wok_is_empty,
        }

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

    def _save_data_handler(self, data) -> ComponentReceiveResponses:
        """Handle request code 5"""
        response = ComponentReceiveResponses.DENIED
        if self._request_code in self._receive_handlers:
            receive_handler = self._receive_handlers[self._request_code]
            response = receive_handler(data)
            # with self._transition_lock:
            #     self._transit_state()
        return response

    def _reset(self, data=None) -> ComponentReceiveResponses:
        """Handle request code 6 or when Wok naturally goes back to WAITING ORDER state"""

        # If reset by master
        if data is not None:
            if self.is_COOKING():
                self.error_code = WokErrors.COOK_TERMINATED_BEFORE_DONE
                self.log.error(f"WokSim #{self.id} {self.error_code.get_description()}")
                # return WokReceiveResponses.DENIED # TODO: Need to clarify how to recover from error
                self.reset()

        # Reset operation attributes
        self._order_id = None

        return self._reconfig(data=data)

    def _reconfig(self, data=None) -> ComponentReceiveResponses:
        """Handle request code 9"""

        # Check state
        if self.is_DISPENSING_FOOD() or (self.is_CLEANING() and not self._clean_done):
            self.error_code = WokErrors.NOT_ABLE_TO_RECONFIG
            self.log.error(f"WokSim #{self.id} {self.error_code.get_description()}")
            return ComponentReceiveResponses.DENIED

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
            self.log.warning(
                f"WokSim #{self.id} reconfigured (erase cooking time and temperature)"
            )

        self._clean_done = False
        self._startup = False

        return ComponentReceiveResponses.CONFIRMED

    def _force_dispense(self, data=None) -> ComponentReceiveResponses:
        """Handle request code 10"""
        if self.is_COOKING():
            self.log.warning(f"WokSim #{self.id} been forced to dispense dish")
            self._cook_seconds = 0
            return ComponentReceiveResponses.CONFIRMED

        self.error_code = WokErrors.NOT_ABLE_TO_RECONFIG
        self.log.error(f"WokSim #{self.id} {self.error_code.get_description()}")
        return ComponentReceiveResponses.DENIED

    def _set_order_id(self, o_id: str) -> ComponentReceiveResponses:
        """Handler data that requested by Wok request 1"""
        self._order_id = o_id
        self.log.info(
            f"WokSim #{self.id} set an order to cook (Order ID: {self._order_id}) "
            f"Temperature: {self._heat_degrees}C, Cook for {self._cook_seconds} seconds."
        )
        return ComponentReceiveResponses.CONFIRMED

    def _set_heat_degrees(self, degrees: int) -> ComponentReceiveResponses:
        """Handler data that requested by Wok request 2 and Main Controller request 7"""
        # Not able to set heat degree while not in WAITING ORDER, WAITING INGREDIENT, or COOKING state
        if not (
            self.is_WAITING_ORDER() or self.is_WAITING_INGREDIENT() or self.is_COOKING()
        ):
            self.log.error(
                f"WokSim #{self.id} not able to set temperature while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # If resetting heat degrees (only at Main Controller request 7)
        if self._heat_degrees:
            self.log.warning(
                f"WokSim #{self.id} cooking temperature reset to {degrees} C (was {self._heat_degrees} C)."
            )

        self._heat_degrees = degrees
        return ComponentReceiveResponses.CONFIRMED

    def _set_cook_seconds(self, duration: int) -> ComponentReceiveResponses:
        """Handler data that requested by Wok request 3 and Main Controller request 8"""
        # Not able to set cooking duration while not in WAITING ORDER, WAITING INGREDIENT, or COOKING state
        if not (
            self.is_WAITING_ORDER() or self.is_WAITING_INGREDIENT() or self.is_COOKING()
        ):
            self.log.error(
                f"WokSim #{self.id} not able to set cook duration while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # If resetting cook duration (only at Main Controller request 8)
        if self._cook_seconds:
            self.log.warning(
                f"WokSim #{self.id} cooking time reset to {duration} seconds (was {self._cook_seconds} seconds)."
            )

        self._cook_seconds = duration
        return ComponentReceiveResponses.CONFIRMED

    def _set_ingredients_ready(
        self, is_ingredients_ready: bool
    ) -> ComponentReceiveResponses:
        """Handler data that requested by Wok request 4"""
        self._ingredients_ready = is_ingredients_ready
        return ComponentReceiveResponses.CONFIRMED

    def _set_wok_is_empty(self, is_wok_empty: bool) -> ComponentReceiveResponses:
        """Handler data that requested by Wok request 5"""
        self._drop_done = is_wok_empty
        return ComponentReceiveResponses.CONFIRMED

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
            self.log.error(
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
            self.log.info(
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
            self.log.info(
                f"WokSim #{self.id} cooking ... Cooked {self._cooked_seconds:.2f} seconds, "
                f"{remaining_seconds:.2f} seconds remaining."
            )
            self._last_cook_iteration_check_time = now

    def _drop_dish_to_bowl(self) -> None:
        """Simulate Wok dispensing food to bowl"""
        self.log.info(f"WokSim #{self.id} dropping dish to bowl ...")

    def _clean_wok(self) -> None:
        """Simulate Wok cleaning"""
        self.log.info(f"WokSim #{self.id} cleaning ...")
        self._clean_done = True
        self.log.info(f"WokSim #{self.id} cleaning done. Waiting order again.")

    """
    Wok Operations logic functions
    """

    @property
    def states(self) -> Type[WokStates]:
        return WokStates

    @property
    def transitions(self) -> List[Dict]:
        """The transitions for the finite state machine"""
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
        return transitions

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

    @property
    def _state_actions(self) -> Dict:
        """Actions to execute in each states"""
        return {
            WokStates.WAITING_ORDER: self._waiting_order_state_actions,
            WokStates.WAITING_INGREDIENT: self._waiting_ingredient_state_actions,
            WokStates.COOKING: self._cooking_state_actions,
            WokStates.DISPENSING_FOOD: self._dispensing_food_state_actions,
            WokStates.CLEANING: self._cleaning_state_actions,
        }

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
