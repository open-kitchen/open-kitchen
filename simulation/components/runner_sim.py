from typing import Union, Dict, List

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

    def __init__(
        self, sauce_id, sauce_name, capacity=200, current_capacity=None
    ) -> None:
        """Constructor

        Args:
            sauce_id (str or in): The sauce ID, identify the sauce type
            capacity (int): The full capacity of the sauce container
            current_capacity (int): The current capacity of the sauce

        """
        self.id = sauce_id
        self.sauce_name = sauce_name
        self._capacity = capacity
        if current_capacity is None:
            current_capacity = self.capacity
        self._current_capacity = current_capacity

    @property
    def capacity(self) -> int:
        return self._capacity

    @property
    def current_capacity(self) -> int:
        return self._current_capacity

    def release(self, volume: int) -> int:
        """Release sauce from this sauce container

        Args:
            volume (int): The amount of sauce to release

        Returns:
            released_volume (int): The actual volume that been released

        """
        # Log the current capacity before release
        before_release_capacity = self._current_capacity

        # If the remaining amount is enough to release
        if self._current_capacity - volume > 0:
            self._current_capacity -= volume

        # If the remaining amount is enough to release
        else:
            self._current_capacity = 0

        # Calculate the released capacity
        released_volume = before_release_capacity - self._current_capacity
        return released_volume

    def refill(self) -> None:
        """Refill the sauce container"""
        self._current_capacity = self.capacity


class RunnerSim(ComponentSim):
    def __init__(
        self,
        id: int,
        sauce_container_number: int = 4,
        sauce_container_config: List[dict] or None = None,
    ) -> None:
        super().__init__(
            component_id=id,
            component_code=ComponentCodes.RUNNER,
            initial_state=RunnerStates.STANDBY,
        )

        # Sauce Runner attributes
        self.sauce_containers = dict(
            [
                (i, SauceContainer(sauce_id=i, sauce_name=f"Sauce #{i}"))
                for i in range(1, sauce_container_number + 1)
            ]
        )
        if sauce_container_config is not None:
            self.sauce_containers = dict(
                [
                    (
                        i,
                        SauceContainer(
                            sauce_id=i,
                            sauce_name=f"{sauce_container_config[i - 1]['identifier']}",
                            capacity=sauce_container_config[i - 1]["capacity"],
                            current_capacity=sauce_container_config[i - 1][
                                "current_load"
                            ],
                        ),
                    )
                    for i in range(1, len(sauce_container_config) + 1)
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

    def _reset(self, data=None) -> ComponentReceiveResponses:
        """when Wok naturally goes back to STANDBY state"""
        # Reset operation attributes
        self._target_wok = None
        self._desire_sauce_id = None
        self._release_volume = None
        self._released = 0
        self._is_wok_ready = False

        return ComponentReceiveResponses.CONFIRMED

    """
    Runner Input/Output functions
    """

    @property
    def _request_handlers(self) -> Dict:
        """Request handlers"""
        # Grab general component request handlers
        general_component_request_handlers = super()._request_handlers

        # Runner special requests
        runner_request_handlers = {
            MasterRunnerRequestCodes.FORCE_RETRIEVE_RUNNER: self._force_retrieve,
            MasterRunnerRequestCodes.RESET_TARGET_WOK: self._set_target_wok,
            MasterRunnerRequestCodes.RESET_DESIRE_SAUCE: self._set_desire_sauce,
            MasterRunnerRequestCodes.RESET_RELEASE_VOLUME: self._set_release_volume,
            MasterRunnerRequestCodes.SET_REFILL_DONE: self._set_refill_done,
            MasterRunnerRequestCodes.SET_WOK_IS_READY: self._set_wok_ready,
            MasterRunnerRequestCodes.GET_SAUCE_BAG_STATUS: self._get_sauce_bag_status,
        }

        # Combines all handlers
        runner_request_handlers.update(general_component_request_handlers)
        return runner_request_handlers

    @property
    def _receive_handlers(self) -> Dict:
        """Receiving handlers"""
        return {
            RunnerRequestCodes.SET_TARGET_WOK: self._set_target_wok,
            RunnerRequestCodes.SET_DESIRE_SAUCE: self._set_desire_sauce,
            RunnerRequestCodes.SET_RELEASE_VOLUME: self._set_release_volume,
            RunnerRequestCodes.SET_REFILL_DONE: self._set_refill_done,
            RunnerRequestCodes.SET_WOK_IS_READY: self._set_wok_ready,
        }

    def _force_retrieve(self, data: int) -> ComponentReceiveResponses:
        """Handler MainController request 6"""
        # Check state
        if self.is_REFILLING():
            self.error_code = RunnerErrors.NOT_ABLE_TO_RETRIEVE
            self.log.error(f"RunnerSim #{self.id} {self.error_code.get_description()}")
            return ComponentReceiveResponses.DENIED

        # Force retrieve runner
        self.force_retrieve_runner()
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

    def _set_desire_sauce(
        self, desire_sauce_container_id: int
    ) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 2 and Main Controller request 8"""
        # Check if desire sauce ID is valid
        if desire_sauce_container_id not in self.sauce_containers:
            return ComponentReceiveResponses.DENIED

        # Not able to set heat desire sauce while not in STANDBY, SENDING, or RELEASING state
        if not (self.is_STANDBY() or self.is_SENDING() or self.is_RELEASING()):
            self.log.error(
                f"RunnerSim #{self.id} not able to set desire sauce while in {self.state.name} state"
            )
            return ComponentReceiveResponses.DENIED

        # If resetting desire_sauce (only at Main Controller request 8)
        if self._desire_sauce_id:
            self.log.warning(
                f"RunnerSim #{self.id} desire sauce reset to "
                f"{self.sauce_containers[desire_sauce_container_id].sauce_name} "
                f"(was {self.sauce_containers[self._desire_sauce_id].sauce_name})."
            )

        # Set desire sauce
        else:
            self.log.info(
                f"RunnerSim #{self.id} desire sauce set to "
                f"{self.sauce_containers[desire_sauce_container_id].sauce_name}."
            )

        self._desire_sauce_id = desire_sauce_container_id
        return ComponentReceiveResponses.CONFIRMED

    def _set_release_volume(self, volume: int) -> ComponentReceiveResponses:
        """Handler data that requested by Runner request 3 and Main Controller request 9"""
        # Check if release volume is valid
        if volume <= 0:
            return ComponentReceiveResponses.DENIED

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

    def _get_sauce_bag_status(
        self, sauce_container_id: int
    ) -> Union[ComponentReceiveResponses, int]:
        """Handler Main Controller request 12"""
        # Container not found
        if sauce_container_id not in self.sauce_containers:
            self.log.error(
                f"RunnerSim #{self.id} not able to get status of sauce container #{sauce_container_id}"
            )
            return ComponentReceiveResponses.DENIED

        # Get sauce bag status
        return self.sauce_containers[sauce_container_id].current_capacity

    # Not able to set wok ready while not in SENDING state
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
    def states(self) -> RunnerStates:
        return RunnerStates

    @property
    def transitions(self) -> List[Dict]:
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
                "trigger": "force_retrieve_runner",
                "source": [
                    RunnerStates.STANDBY,
                    RunnerStates.SENDING,
                    RunnerStates.RELEASING,
                    RunnerStates.RETRIEVING,
                ],
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

        1. The Runner will initialize in the `STANDBY` state, which will
            - Wait for the main controller to set the target wok ID.
            - Wait for the main controller to set the desire sauce ID.
            - Wait for the main controller to set the release volume.

        2(a). After the above parameter are set, and the desire sauce load is greater than 20%, the Runner goes
        into the `SENDING` state which will
            - Move runner to the target Wok position, and
            - Wait for the main controller to notify if Wok is ready.
        3(a). Once the main controller notify that the target Wok is ready to receive sauce and it arrive the target
        Wok position, it goes into the `RELEASING` state which will
            - Release the desired sauce by the volume been set.
        4(a). Once the desired sauce volume been released, the Runner will enter the `moving back` state which will
            - Move the Runner back to the original (home) position.
        5(a). Finally, the Runner will go to the `STANDBY` state when it arrive the original (home) position.
        6(a). The Runner will cycle back to the first step

        2(b). After the above parameter are set, and the desire sauce load is not greater than 20%, the Runner goes
        into the `REFILLING` state which will
            - Wait main controller to notify if the refilling is done.
        3(b). Once the main controller notified that refilling is done, Runner goes back to `STANDBY` state (cycle
        back to the first step).

        """
        if (
            self.is_STANDBY()
            and self._target_wok is not None
            and self._desire_sauce_id is not None
            and self._release_volume
        ):
            if not self._is_desire_sauce_need_refill:
                self.go_to_send_runner()
            else:
                self.go_to_refill()

        elif self.is_SENDING() and self._is_arrive_target_wok and self._is_wok_ready:
            self.go_to_release()

        elif self.is_RELEASING() and self._is_release_done:
            self.go_to_retrieve_runner()

        elif (self.is_RETRIEVING() and self._is_at_home_position) or (
            self.is_REFILLING() and self._is_refill_done
        ):
            self.go_to_standby()

    @property
    def _state_actions(self) -> Dict:
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
