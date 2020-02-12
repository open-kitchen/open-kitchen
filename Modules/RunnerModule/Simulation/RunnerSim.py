import logging
import threading
import time

import colorlog
from MainControllerMessage import ComponentCodes
from RunnerMessage import (
    RunnerStates,
    RunnerRequestCodes,
    MasterRunnerRequestCodes,
    RunnerErrors,
    ComponentReceiveResponses,
)
from transitions import Machine

log = colorlog.getLogger("RunnerSim")


class RunnerSim:

    # The transitions for the finite state machine
    transitions = [
        {
            "trigger": "go_to_send_runner",
            "source": RunnerStates.STANDBY,
            "dest": RunnerStates.MOVING_TO_WOK,
        },
        {
            "trigger": "go_to_release",
            "source": RunnerStates.MOVING_TO_WOK,
            "dest": RunnerStates.RELEASING,
        },
        {
            "trigger": "go_to_retrieve_runner",
            "source": RunnerStates.RELEASING,
            "dest": RunnerStates.MOVING_BACK,
        },
        {"trigger": "go_to_refill", "source": "*", "dest": RunnerStates.REFILLING},
        {
            "trigger": "go_to_standby",
            "source": [RunnerStates.REFILLING, RunnerStates.MOVING_BACK],
            "dest": RunnerStates.STANDBY,
            "before": "_reset",
        },
    ]

    def __init__(self, id) -> None:

        # Component attributes
        self._component_code = ComponentCodes.RUNNER
        self._error_code = RunnerErrors.NO_ERROR
        self._request_code = RunnerRequestCodes.NO_REQUEST

        # Sauce Runner attributes
        self.id = id
        self.sauce_type = None
        self.current_volume = 100
        self.wok_positions = {1: 50, 2: 150, 3: 200}  # runner ID: runner position

        # Operation attributes
        self._target_wok = None
        self._release_volume = None
        self._released = 0

        self._current_position = 0
        self._startup = True

        # Initialize Runner state machine
        self.machine = Machine(
            model=self,
            states=RunnerStates,
            transitions=RunnerSim.transitions,
            initial=RunnerStates.STANDBY,
        )

        self._reset()

        # Request handlers
        self._request_handlers = {
            MasterRunnerRequestCodes.GET_COMPONENT_CODE: self._get_component_code,
            MasterRunnerRequestCodes.GET_STATE_CODE: self._get_state_code,
            MasterRunnerRequestCodes.GET_ERROR_CODE: self._get_error_code,
            MasterRunnerRequestCodes.GET_REQUEST_CODE: self._get_request_code,
            MasterRunnerRequestCodes.RESPOND_REQUEST: self._save_data_handler,
            # Runner special requests
            MasterRunnerRequestCodes.RESET_RUNNER: self._reset,
            MasterRunnerRequestCodes.RESET_TARGET_WOK: self._set_target_wok,
            MasterRunnerRequestCodes.RESET_RELEASE_VOLUME: self._set_release_volume,
        }

        # Receiving handlers
        self._receive_handlers = {
            RunnerRequestCodes.SET_TARGET_WOK: self._set_target_wok,
            RunnerRequestCodes.SET_RELEASE_VOLUME: self._set_release_volume,
        }

        # Actions to execute in each states
        self._state_actions = {
            RunnerStates.STANDBY: self._standby_state_actions,
            RunnerStates.MOVING_TO_WOK: self._moving_to_wok_state_actions,
            RunnerStates.RELEASING: self._releasing_state_actions,
            RunnerStates.MOVING_BACK: self._moving_back_state_actions,
            RunnerStates.REFILLING: self._refilling_state_actions,
        }

        # RunnerSim loop Thread
        self._transition_lock = threading.RLock()
        self._loop_thread_stop_event = threading.Event()
        loop_thread = threading.Thread(target=self._sim_loop)
        loop_thread.start()

    """
    Runner Input/Output functions
    """

    def request(self, request_code, data=0) -> int:
        """Got request from main controller"""
        response = ComponentReceiveResponses.DENIED

        if request_code in self._request_handlers:
            request_handler = self._request_handlers[request_code]
            response = request_handler(data)

        return response

    def _get_component_code(self, data) -> ComponentCodes:
        """Handle request code 1"""
        return ComponentCodes.RUNNER

    def _get_state_code(self, data) -> RunnerStates:
        """Handle request code 2"""
        return RunnerStates(self.state)

    def _get_error_code(self, data) -> RunnerErrors:
        """Handle request code 3"""
        return RunnerErrors(self._error_code)

    def _get_request_code(self, data) -> RunnerRequestCodes:
        """Handle request code 4"""
        return RunnerRequestCodes(self._request_code)

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
        """Handle request code 6 or when Wok naturally goes back to STANDBY state"""

        # # If reset by master
        # if data is not None:
        #     if self.is_COOKING():
        #         self.error_code = WokErrors.COOK_TERMINATED_BEFORE_DONE
        #         log.error(f"WokSim #{self.id} {self.error_code.get_description()}")
        #         # return WokReceiveResponses.DENIED # TODO: Need to clarify how to recover from error
        #         self.reset()

        # Reset operation attributes
        self._target_wok = None
        self._release_volume = None
        self._released = 0

        # return self._reconfig(data=data)
        return ComponentReceiveResponses.CONFIRMED

    def _set_target_wok(self, target_wok_id: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 1 and MainController request 7"""
        # If resetting target Wok (only at Main Controller request 7)
        if self._target_wok:
            log.warning(
                f"RunnerSim #{self.id} reset target to Wok #{target_wok_id} (was Wok #{self._target_wok})."
            )

        # Set the target Wok
        else:
            log.info(f"RunnerSim #{self.id} set target to Wok #{self._target_wok}.")

        self._target_wok = target_wok_id
        return ComponentReceiveResponses.CONFIRMED

    def _set_release_volume(self, volume: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 2 and Main Controller request 8"""
        # Not able to set heat degree while not in STANDBY, MOVING TO WOK, or RELEASING state
        if not (self.is_STANDBY() or self.is_MOVING_TO_WOK() or self.is_RELEASING()):
            log.error(
                f"RunnerSim #{self.id} not able to set release volume while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # If resetting release volume (only at Main Controller request 8)
        if self._release_volume:
            log.warning(
                f"RunnerSim #{self.id} release volume reset to {volume} (was {self._release_volume})."
            )

        # Set release volume
        else:
            log.info(f"RunnerSim #{self.id} release volume set to {volume}.")

        self._release_volume = volume
        return ComponentReceiveResponses.CONFIRMED

    """
    Physical functions
    """

    @property
    def _is_on_origin(self) -> bool:
        """Check if Runner at the original position"""
        return self._is_arrive_target_position(0)

    @property
    def _is_arrive_target_wok(self) -> bool:
        """Check if current position is arrive target runner position"""
        if (
            self._target_wok
            and self._is_arrive_target_position(self.wok_positions[self._target_wok])
            if self._target_wok in self.wok_positions
            else False
        ):
            return True
        return False

    def _is_arrive_target_position(self, target) -> bool:
        """Check if current position is arrive target position"""
        if abs(self._current_position - target) < 5:
            return True
        return False

    def _adjust_runner_position(self, target: int) -> None:
        """Simulate moving sauce runner to target position"""

        # Do nothing if position is arrive target position
        if self._is_arrive_target_position(target):
            return

        # Updates while moving
        if self._current_position > target:
            self._current_position -= 1
        else:
            self._current_position += 1

        log.info(
            f"RunnerSim #{self.id} moving (current position {self._current_position}, "
            f"target {target})"
        )
        # current_shifted = self._heat_degrees - self._real_wok_degrees
        # full_delta_degrees = self._heat_degrees - self._preheat_start_degrees
        # if current_delta_degrees % (full_delta_degrees // 5) == 0:

    @property
    def _is_release_done(self) -> bool:
        if (
            self._release_volume is not None
            and abs(self._release_volume - self._released) < 0.1
        ):
            return True
        return False

    def _release_sauce(self) -> None:
        """Simulate Sauce Runner releasing sauce to Wok"""
        # Do nothing if already released require volume
        if self._is_release_done:
            return

        self._released += 1
        log.info(
            f"RunnerSim #{self.id} releasing sauce to Wok #{self._target_wok} "
            f"(released {self._released}, target {self._release_volume}) ..."
        )

    """
    Wok Operations logic functions
    """

    def _transit_state(self) -> None:
        """The logic of state transition

        1. The Runner will initialize in the `standby` state, which will
            - Wait for the main controller to set the target wok.
        2. After the above parameter are set, the Wok goes into the `moving to wok` state which will
            - Move runner to the target Wok, and
            - Wait for the main controller to set release volume.
        3. Once the main controller set the release volume and Runner arrived target Wok, it goes into the
        `releasing` state which will
            - Release the desired sauce volume.
        4. Once the desired sauce volume been released, the Runner will enter the `moving back` state which will
            - Move the Runner back to the original position.
        5. Finally, the Runner will go to the `standby` state when it arrive the original position.
        6. The Runner will cycle back to the first step

        """
        if self.is_STANDBY() and self._target_wok:
            self.go_to_send_runner()

        elif (
            self.is_MOVING_TO_WOK()
            and self._is_arrive_target_wok
            and self._release_volume
        ):
            self.go_to_release()

        elif self.is_RELEASING() and self._is_release_done:
            self.go_to_retrieve_runner()

        elif self.is_MOVING_BACK() and self._is_on_origin:
            self.go_to_standby()

    def stop(self) -> None:
        self._loop_thread_stop_event.set()

    def _sim_loop(self) -> None:
        loop_interval_seconds = 0.1
        log.info(f"RunnerSim #{self.id} simulation loop initialized.")

        while not self._loop_thread_stop_event.is_set():
            # Get state actions and run them
            state_actions = self._state_actions[self.state]
            state_actions()

            # Update state if meet the requirements
            with self._transition_lock:
                self._transit_state()

            # Rest a bit
            time.sleep(loop_interval_seconds)

        log.info(f"RunnerSim #{self.id} simulation terminated.")

    def _standby_state_actions(self) -> None:
        if self._target_wok is None:
            self._request_code = RunnerRequestCodes.SET_TARGET_WOK

    def _moving_to_wok_state_actions(self) -> None:
        self._adjust_runner_position(self.wok_positions[self._target_wok])
        if self._release_volume is None:
            self._request_code = RunnerRequestCodes.SET_RELEASE_VOLUME

    def _releasing_state_actions(self) -> None:
        self._release_sauce()

    def _moving_back_state_actions(self) -> None:
        self._adjust_runner_position(0)

    def _refilling_state_actions(self) -> None:
        pass


if __name__ == "__main__":
    """This main function should only be use to debug

    It contains a command line interface to control a Sauce Runner simulation.
    This simulation will simulate the hardware level behavior of a Sauce Runner
    which will receive 8-bit I2C message at a time and respond another
    8-bits message as designed in OK Communication Message Specification.

    To debug, install requirements and requirements-dev then run
    >>> python RunnerSim.py
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
    log = colorlog.getLogger("RunnerSim")
    log.setLevel(logging.INFO)
    log.addHandler(ch)

    # Setup finite state machine log
    transition_log = colorlog.getLogger("transitions.core")
    transition_log.name = "StateMachine"
    transition_log.setLevel(logging.INFO)
    transition_log.addHandler(ch)

    # Create a runner simulation
    runner = RunnerSim(id=1)

    # CLI
    while True:
        command = input("I2C request code > ")
        try:
            if command == "stop":
                runner.stop()
                break
            elif type(eval(command)) is int:
                command = int(command)
                data = 0
                if command == MasterRunnerRequestCodes.GET_COMPONENT_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.GET_STATE_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.GET_ERROR_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.GET_REQUEST_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.RESPOND_REQUEST:
                    data = input("I2C data > ")
                    # if (
                    #     runner.request(
                    #         request_code=MasterRunnerRequestCodes.GET_REQUEST_CODE, data=0
                    #     )
                    #     == WokRequestCodes.SET_ORDER_ID
                    # ):
                    #     data = data
                    # else:
                    #     data = int(data)
                    data = int(data)
                elif command == MasterRunnerRequestCodes.RESET_RUNNER:
                    pass
                elif command == MasterRunnerRequestCodes.RESET_TARGET_WOK:
                    data = input("I2C data > ")
                    data = int(data)
                elif command == MasterRunnerRequestCodes.RESET_RELEASE_VOLUME:
                    data = input("I2C data > ")
                    data = int(data)

                response = runner.request(request_code=int(command), data=data)
                print(f"I2C respond: {response}")

                # # Check state code
                # state_code = runner.request(request_code=int(2), data=0)
                # while state_code != WokStates.WAITING_ORDER and state_code != WokStates.WAITING_INGREDIENT:
                #     state_code = runner.request(request_code=int(2), data=0)

        except Exception as e:
            print(e)
            continue
