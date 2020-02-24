from components import ComponentSim
from messages.main_controller_message import ComponentCodes, ComponentReceiveResponses
from messages.runner_message import (
    RunnerErrors,
    RunnerStates,
    RunnerRequestCodes,
    MasterRunnerRequestCodes,
)


class SauceContainer:
    """Individual sauce container

    Attributes:
        id (str or int): the sauce type identifier

    """

    def __init__(self, sauce_id, sauce_name, capacity=None):
        """Constructor

        Args:
            sauce_id (str or in): The sauce ID, identify the sauce type
            capacity (int): The current capacity of the sauce (0-100)

        """
        self.id = sauce_id
        if capacity is None:
            capacity = self.full_capacity
        self._capacity = capacity
        self.sauce_name = sauce_name

    @property
    def full_capacity(self) -> int:
        return 100

    @property
    def current_capacity(self) -> int:
        return self._capacity

    def release(self, volume: int) -> int:
        """Release sauce from this sauce container

        Args:
            volume (int): The amount of sauce to release

        Returns:
            released_volume (int): The actual volume that been released

        """
        # Log the current capacity before release
        before_release_capacity = self._capacity

        # If the remaining amount is enough to release
        if self._capacity - volume > 0:
            self._capacity -= volume

        # If the remaining amount is enough to release
        else:
            self._capacity = 0

        # Calculate the released capacity
        released_volume = before_release_capacity - self._capacity
        return released_volume

    def refill(self) -> None:
        """Refill the sauce container"""
        self._capacity = self.full_capacity


class RunnerSim(ComponentSim):
    def __init__(self, id: int, sauce_container_number: int = 4) -> None:
        super().__init__(
            component_id=id,
            component_code=ComponentCodes.RUNNER,
            initial_state=RunnerStates.STANDBY,
        )

        # Sauce Runner attributes
        self.sauce_type = None
        # self.current_volume = 100
        self.sauce_containers = dict(
            [
                (i, SauceContainer(sauce_id=i, sauce_name=f"Sauce #{i}"))
                for i in range(sauce_container_number)
            ]
        )
        self.wok_positions = {1: 11500, 2: 23000, 3: 34500}  # {Wok ID: sim position}
        self.home_position = 500
        self.moving_speed = 500

        # Operation attributes
        self._target_wok = None
        self._desire_sauce_id = None
        self._release_volume = None
        self._released = 0
        self._is_wok_ready = False

        self._current_position = self.home_position
        self._startup = True

        # RunnerSim loop Thread start
        self._reset()
        self.start()

    """
    Runner Input/Output functions
    """

    @property
    def _request_handlers(self):
        """Request handlers"""
        # Grab general component request handlers
        general_component_request_handlers = super()._request_handlers

        # Runner special requests
        runner_request_handlers = {
            MasterRunnerRequestCodes.RESET_RUNNER: self._reset,
            MasterRunnerRequestCodes.RESET_TARGET_WOK: self._set_target_wok,
            MasterRunnerRequestCodes.RESET_DESIRE_SAUCE: self._set_desire_sauce,
            MasterRunnerRequestCodes.RESET_RELEASE_VOLUME: self._set_release_volume,
            MasterRunnerRequestCodes.SET_REFILL_DONE: self._set_refill_done,
            MasterRunnerRequestCodes.SET_WOK_IS_READY: self._set_wok_ready,
        }

        # Combines all handlers
        runner_request_handlers.update(general_component_request_handlers)
        return runner_request_handlers

    @property
    def _receive_handlers(self):
        """Receiving handlers"""
        return {
            RunnerRequestCodes.SET_TARGET_WOK: self._set_target_wok,
            RunnerRequestCodes.SET_DESIRE_SAUCE: self._set_desire_sauce,
            RunnerRequestCodes.SET_RELEASE_VOLUME: self._set_release_volume,
            RunnerRequestCodes.SET_REFILL_DONE: self._set_refill_done,
            RunnerRequestCodes.SET_WOK_IS_READY: self._set_wok_ready,
        }

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
        self._desire_sauce_id = None
        self._release_volume = None
        self._released = 0
        self._is_wok_ready = False

        # return self._reconfig(data=data)
        return ComponentReceiveResponses.CONFIRMED

    def _set_target_wok(self, target_wok_id: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 1 and MainController request 7"""
        # Check if desire Wok ID is valid
        if target_wok_id not in self.wok_positions:
            return ComponentReceiveResponses.DENIED

        # If resetting target Wok (only at Main Controller request 7)
        if self._target_wok:
            self.log.warning(
                f"RunnerSim #{self.id} reset target to Wok #{target_wok_id} (was Wok #{self._target_wok})."
            )

        # Set the target Wok
        else:
            self.log.info(f"RunnerSim #{self.id} set target to Wok #{target_wok_id}.")

        self._target_wok = target_wok_id
        return ComponentReceiveResponses.CONFIRMED

    def _set_desire_sauce(self, desire_sauce_id: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 2 and Main Controller request 8"""
        # Not able to set heat desire sauce while not in STANDBY, SENDING, or RELEASING state
        if not (self.is_STANDBY() or self.is_SENDING() or self.is_RELEASING()):
            self.log.error(
                f"RunnerSim #{self.id} not able to set desire sauce while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # If resetting desire_sauce (only at Main Controller request 8)
        if self._desire_sauce_id:
            self.log.warning(
                f"RunnerSim #{self.id} desire sauce reset to {self.sauce_containers[desire_sauce_id].sauce_name} "
                f"(was {self.sauce_containers[self._desire_sauce_id].sauce_name})."
            )

        # Set desire sauce
        else:
            self.log.info(
                f"RunnerSim #{self.id} desire sauce set to {self.sauce_containers[desire_sauce_id].sauce_name}."
            )

        self._desire_sauce_id = desire_sauce_id
        return ComponentReceiveResponses.CONFIRMED

    def _set_release_volume(self, volume: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 3 and Main Controller request 9"""
        # Not able to set heat degree while not in STANDBY, SENDING, or RELEASING state
        if not (self.is_STANDBY() or self.is_SENDING() or self.is_RELEASING()):
            self.log.error(
                f"RunnerSim #{self.id} not able to set release volume while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # If resetting release volume (only at Main Controller request 8)
        if self._release_volume:
            self.log.warning(
                f"RunnerSim #{self.id} release volume reset to {volume} (was {self._release_volume})."
            )

        # Set release volume
        else:
            self.log.info(f"RunnerSim #{self.id} release volume set to {volume}.")

        self._release_volume = volume
        return ComponentReceiveResponses.CONFIRMED

    def _set_refill_done(self, data: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 4 and Main Controller request 10"""
        # Not able to set refill done while not in REFILLING state
        if not self.is_REFILLING():
            self.log.error(
                f"RunnerSim #{self.id} not able to set refill done while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # Set refill done
        else:
            self.log.info(
                f"RunnerSim #{self.id} got notified that "
                f"{self.sauce_containers[self._desire_sauce_id].sauce_name} refill is done."
            )

        self.sauce_containers[self._desire_sauce_id].refill()
        self._error_code = RunnerErrors.NO_ERROR
        return ComponentReceiveResponses.CONFIRMED

    def _set_wok_ready(self, data: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 5 and Main Controller request 11"""
        # Not able to set wok ready while not in SENDING state
        if not self.is_SENDING():
            self.log.error(
                f"RunnerSim #{self.id} not able to set wok ready while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # Set wok ready
        else:
            self.log.info(
                f"RunnerSim #{self.id} got notified that "
                f"Wok #{self._target_wok} is now at WAITING INGREDIENT state (Wok is ready for sauce dispense)."
            )

        self._is_wok_ready = True
        return ComponentReceiveResponses.CONFIRMED

    """
    Physical functions
    """

    @property
    def _is_refill_done(self) -> bool:
        return not self._is_desire_sauce_need_refill

    @property
    def _is_desire_sauce_need_refill(self) -> bool:
        """Check if the desire sauce needs refill"""
        if self._desire_sauce_id and self._release_volume:
            return (
                self.sauce_containers[self._desire_sauce_id].current_capacity < 20
                or self._release_volume
                > self.sauce_containers[self._desire_sauce_id].current_capacity
            )
        return False

    @property
    def _is_at_home_position(self) -> bool:
        """Check if Runner at the home position"""
        return self._is_arrive_target_position(self.home_position)

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
            self._current_position -= self.moving_speed
        else:
            self._current_position += self.moving_speed

        self.log.info(
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

        self._released += self.sauce_containers[self._desire_sauce_id].release(1)
        self.log.info(
            f"RunnerSim #{self.id} releasing sauce to Wok #{self._target_wok} "
            f"(released {self._released}, target {self._release_volume}) ..."
        )

    """
    Runner Operations logic functions
    """

    @property
    def states(self):
        return RunnerStates

    @property
    def transitions(self):
        # The transitions for the finite state machine
        transitions = [
            {
                "trigger": "go_to_send_runner",
                "source": RunnerStates.STANDBY,
                "dest": RunnerStates.SENDING,
            },
            {
                "trigger": "go_to_release",
                "source": RunnerStates.SENDING,
                "dest": RunnerStates.RELEASING,
            },
            {
                "trigger": "go_to_retrieve_runner",
                "source": RunnerStates.RELEASING,
                "dest": RunnerStates.RETRIEVING,
            },
            {
                "trigger": "go_to_refill",
                "source": RunnerStates.STANDBY,
                "dest": RunnerStates.REFILLING,
            },
            {
                "trigger": "go_to_standby",
                "source": [RunnerStates.REFILLING, RunnerStates.RETRIEVING],
                "dest": RunnerStates.STANDBY,
                "before": "_reset",
            },
        ]
        return transitions

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
        if (
            self.is_STANDBY()
            and self._target_wok
            and self._desire_sauce_id
            and self._release_volume
        ):
            if not self._is_desire_sauce_need_refill:
                self.go_to_send_runner()
            else:
                self.go_to_refill()

        elif (
            self.is_SENDING()
            and self._is_arrive_target_wok
            and self._release_volume
            and self._is_wok_ready
        ):
            self.go_to_release()

        elif self.is_RELEASING() and self._is_release_done:
            self.go_to_retrieve_runner()

        elif (self.is_RETRIEVING() and self._is_at_home_position) or (
            self.is_REFILLING() and self._is_refill_done
        ):
            self.go_to_standby()

    @property
    def _state_actions(self):
        """Actions to execute in each states"""
        return {
            RunnerStates.STANDBY: self._standby_state_actions,
            RunnerStates.SENDING: self._sending_state_actions,
            RunnerStates.RELEASING: self._releasing_state_actions,
            RunnerStates.RETRIEVING: self._retrieving_state_actions,
            RunnerStates.REFILLING: self._refilling_state_actions,
        }

    def _standby_state_actions(self) -> None:
        self._release_code = RunnerRequestCodes.NO_REQUEST
        if self._target_wok is None:
            self._request_code = RunnerRequestCodes.SET_TARGET_WOK
        elif self._desire_sauce_id is None:
            self._request_code = RunnerRequestCodes.SET_DESIRE_SAUCE
        elif self._release_volume is None:
            self._request_code = RunnerRequestCodes.SET_RELEASE_VOLUME

    def _sending_state_actions(self) -> None:
        self._release_code = RunnerRequestCodes.NO_REQUEST
        if not self._is_wok_ready:
            self._request_code = RunnerRequestCodes.SET_WOK_IS_READY

        self._adjust_runner_position(self.wok_positions[self._target_wok])

    def _releasing_state_actions(self) -> None:
        self._release_sauce()

    def _retrieving_state_actions(self) -> None:
        self._adjust_runner_position(self.home_position)

    def _refilling_state_actions(self) -> None:
        if not self._is_refill_done:
            self._request_code = RunnerRequestCodes.SET_REFILL_DONE
            self._error_code = RunnerErrors.NEED_REFILL
        else:
            self._request_code = RunnerRequestCodes.NO_REQUEST
            self._error_code = RunnerErrors.NO_ERROR
