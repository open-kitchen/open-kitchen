import datetime
from typing import Dict, List, Type

from components import ComponentSim
from messages.main_controller_message import ComponentCodes, ComponentReceiveResponses
from messages.pusher_tipper_message import (
    PusherTipperStates,
    MasterPusherTipperRequestCodes,
    PusherTipperRequestCodes,
    ConveyorStates,
    PusherTipperConveyorRequestCodes,
)


class ConveyorSim(ComponentSim):
    """Simulation of a conveyor"""

    def __init__(self, id) -> None:
        super().__init__(
            component_id=id, component_code=0, initial_state=ConveyorStates.OFF
        )
        # Hardware attributes
        self.linear_speed = 10
        self.payload_positions = 0
        self._pusher_tipper_requests = (
            {}
        )  # {pusher_tipper_id[int]: requested_signal[bool]}

        # Operation attributes
        self._startup = True

        # Conveyor loop Thread start
        self._reset()
        self.start()

    def _reset(self):
        self.payload_positions = 0

    def reset(self):
        self._reset()

    """
    Input/Output functions
    """

    @property
    def _request_handlers(self) -> dict:
        return {
            PusherTipperConveyorRequestCodes.TURN_ON: self._turn_on,
            PusherTipperConveyorRequestCodes.TURN_OFF: self._turn_off,
        }

    @property
    def _receive_handlers(self) -> dict:
        return {}

    def _turn_on(self, pusher_tipper_id: int) -> ComponentReceiveResponses:
        if pusher_tipper_id not in self._pusher_tipper_requests:
            return ComponentReceiveResponses.DENIED
        self._pusher_tipper_requests[pusher_tipper_id] = True
        return ComponentReceiveResponses.CONFIRMED

    def _turn_off(self, pusher_tipper_id: int) -> ComponentReceiveResponses:
        if pusher_tipper_id not in self._pusher_tipper_requests:
            return ComponentReceiveResponses.DENIED
        self._pusher_tipper_requests[pusher_tipper_id] = False
        return ComponentReceiveResponses.CONFIRMED

    """
    Physical functions
    """

    @property
    def _is_on(self) -> bool:
        for group, signal in self._pusher_tipper_requests.items():
            if signal:
                return True
        return False

    def regiest_pusher_tipper_group(self, pusher_tipper_id: int) -> None:
        self._pusher_tipper_requests[pusher_tipper_id] = False

    """
    Operations logic functions
    """

    @property
    def states(self) -> Type[ConveyorStates]:
        return ConveyorStates

    @property
    def transitions(self) -> List[Dict]:
        transitions = [
            {
                "trigger": "turn_on",
                "source": ConveyorStates.OFF,
                "dest": ConveyorStates.ON,
            },
            {
                "trigger": "turn_off",
                "source": ConveyorStates.ON,
                "dest": ConveyorStates.OFF,
            },
        ]
        return transitions

    def _transit_state(self) -> None:
        if self.is_ON() and not self._is_on:
            self.turn_off()
        elif self.is_OFF() and self._is_on:
            self.turn_on()

    @property
    def _state_actions(self) -> dict:
        return {ConveyorStates.ON: self._on_state_actions}

    def _on_state_actions(self) -> None:
        self.payload_positions += self.linear_speed


class PusherTipperSim(ComponentSim):
    """Simulation of a Pusher Tipper group"""

    def __init__(self, id, conveyor: ConveyorSim, position_on_conveyor: int) -> None:
        super().__init__(
            component_id=id,
            component_code=ComponentCodes.TRANSPORTATION_BAND,
            initial_state=PusherTipperStates.STANDBY,
        )
        # Attributes
        self.pushing_process_seconds = 5
        self.tipper_position = 0
        self.tipping_process_seconds = 2
        self.ejecting_process_seconds = 1
        self.conveyor = conveyor
        self.position_on_conveyor = position_on_conveyor

        # Operation attributes
        self.pushing_start_time = None
        self.tipping_start_time = None
        self.ejecting_start_time = None
        self._wok_ready = False
        self._is_ejecting_done = False
        self._activated = False
        self._startup = True

        # WokSim loop Thread
        self.conveyor.regiest_pusher_tipper_group(pusher_tipper_id=id)
        self._reset()
        self.start()

    def _reset(self, data=None) -> ComponentReceiveResponses:
        """when Pusher-tipper naturally goes back to STANDBY state"""
        # Reset operation attributes
        self.pushing_start_time = None
        self.tipping_start_time = None
        self.ejecting_start_time = None
        self._wok_ready = False
        self._is_ejecting_done = False
        self._activated = False

        self.conveyor.reset()

        return ComponentReceiveResponses.CONFIRMED

    """
    Input/Output functions
    """

    @property
    def _request_handlers(self) -> Dict:
        """Request handlers"""
        # Grab general component request handlers
        general_component_request_handlers = super()._request_handlers

        # Pusher-tipper special requests
        request_handlers = {
            MasterPusherTipperRequestCodes.ACTIVATE: self._set_activate,
            MasterPusherTipperRequestCodes.SET_WOK_IS_READY: self._set_wok_ready,
            MasterPusherTipperRequestCodes.SET_EJECT_DONE: self._set_eject_done,
        }

        # Combines all handlers
        request_handlers.update(general_component_request_handlers)
        return request_handlers

    @property
    def _receive_handlers(self) -> Dict:
        """Receiving handlers"""
        return {
            PusherTipperRequestCodes.SET_ACTIVATE: self._set_activate,
            PusherTipperRequestCodes.SET_WOK_IS_READY: self._set_wok_ready,
            PusherTipperRequestCodes.SET_EJECT_DONE: self._set_eject_done,
        }

    def _set_activate(self, data: int = 1) -> ComponentReceiveResponses:
        self._activated = bool(data)
        return ComponentReceiveResponses.CONFIRMED

    def _set_wok_ready(self, data: int = 1) -> ComponentReceiveResponses:
        if not self.is_EJECTING():
            self._wok_ready = bool(data)
            return ComponentReceiveResponses.CONFIRMED

        self.log.error(f"Not able to set wok is ready during {self.state.name} state.")
        return ComponentReceiveResponses.DENIED

    def _set_eject_done(self, data: int = 1) -> ComponentReceiveResponses:
        if self.is_EJECTING():
            self._is_ejecting_done = bool(data)
            return ComponentReceiveResponses.CONFIRMED

        self.log.error(
            f"Not able to notify ejecting is done during {self.state.name} state."
        )
        return ComponentReceiveResponses.DENIED

    """
    Physical functions
    """

    def _signal_conveyor_on(self) -> None:
        response = self.conveyor.request(
            request_code=PusherTipperConveyorRequestCodes.TURN_ON, data=self.id
        )
        if response == ComponentReceiveResponses.DENIED:
            self.log.error(
                f"{self.__class__.__name__} #{self.id} signal conveyor turn on failed."
            )

    def _signal_conveyor_off(self) -> None:
        response = self.conveyor.request(
            request_code=PusherTipperConveyorRequestCodes.TURN_OFF, data=self.id
        )
        if response == ComponentReceiveResponses.DENIED:
            self.log.error(
                f"{self.__class__.__name__} #{self.id} signal conveyor turn off failed."
            )

    @property
    def _is_cup_arrived(self) -> bool:
        if (
            abs(self.position_on_conveyor - self.conveyor.payload_positions)
            < self.conveyor.linear_speed * 2
        ):
            return True
        return False

    @property
    def _is_pushing_done(self) -> bool:
        if (
            self.pushing_start_time
            and (datetime.datetime.now() - self.pushing_start_time).total_seconds()
            > self.pushing_process_seconds
        ):
            return True
        return False

    @property
    def _is_tipping_done(self) -> bool:
        if (
            self.tipping_start_time
            and (datetime.datetime.now() - self.tipping_start_time).total_seconds()
            > self.tipping_process_seconds
        ):
            return True
        return False

    """
    Operations logic functions
    """

    def stop(self) -> None:
        super().stop()
        self.conveyor.stop()

    @property
    def states(self) -> Type[PusherTipperStates]:
        return PusherTipperStates

    @property
    def transitions(self) -> List[Dict]:
        # The transitions for the finite state machine
        transitions = [
            {
                "trigger": "go_to_transporting",
                "source": PusherTipperStates.STANDBY,
                "dest": PusherTipperStates.TRANSPORTING,
            },
            {
                "trigger": "go_to_pushing",
                "source": PusherTipperStates.TRANSPORTING,
                "dest": PusherTipperStates.PUSHING,
            },
            {
                "trigger": "go_to_tipping",
                "source": PusherTipperStates.PUSHING,
                "dest": PusherTipperStates.TIPPING,
            },
            {
                "trigger": "go_to_ejecting",
                "source": PusherTipperStates.TIPPING,
                "dest": PusherTipperStates.EJECTING,
            },
            {
                "trigger": "go_to_standby",
                "source": PusherTipperStates.EJECTING,
                "dest": PusherTipperStates.STANDBY,
                "before": "_reset",
            },
        ]
        return transitions

    def _transit_state(self) -> None:
        """
        The state transitions are base on the following 6 steps,

        1. The Pusher-tipper will initialize in the `STANDBY` state, which will
            - Wait for the main controller to set it activated. The main controller will only activate a
              Pusher-tipper group if there is a cup needs to be sent to the corresponding wok associated
              with the Pusher-tipper group.

        2. After being set to activated, the Pusher-tipper group goes into the `TRANSPORTING` state which will
            - Turn on the conveyor in the OFTA if cup is not been detect by the Pusher-tipper's cup sensor.
            - Wait for the cup being transferred to the position in front of the Pusher.
            - True off the conveyor in the OFTA once the cup is arrived the Pusher-tipper location.

        3. Pusher-tipper will enter the `PUSHING` state once the cup is arrive. In this state it will
            - Check if tipper is at home position.
            - Start pushing the cup to tipper if tipper is at home, otherwise control tipper to go back home position.

        4. Pusher-tipper will enter the `TIPPING` state once the pushing is done. In thi state it will
            - Check if the Wok is at waiting for ingredients state (that means Wok is ready).
            - Dump the food ingredient into to Wok if it's ready.

        5. After dumping the food ingredients into the Wok, Pusher-tipper group will enter `EJECTING` state which will
            - Eject the cup from tipper into an area to wash cups.

        6. Once the cup been ejected, the Pusher-tipper will cycle back to `STANDBY` state.

        """
        if self.is_STANDBY() and self._activated:
            self.go_to_transporting()
        elif (
            self.is_TRANSPORTING()
            and self._is_cup_arrived
            and self.conveyor.state == ConveyorStates.OFF
        ):
            self.go_to_pushing()
        elif self.is_PUSHING() and self._is_pushing_done:
            self.go_to_tipping()
        elif self.is_TIPPING() and self._is_tipping_done:
            self.go_to_ejecting()
        elif self.is_EJECTING() and self._is_ejecting_done:
            self.go_to_standby()

    @property
    def _state_actions(self) -> dict:
        """Actions to execute in each states"""
        return {
            PusherTipperStates.STANDBY: self._standby_state_actions,
            PusherTipperStates.TRANSPORTING: self._transporting_state_actions,
            PusherTipperStates.PUSHING: self._pushing_state_actions,
            PusherTipperStates.TIPPING: self._tipping_state_actions,
            PusherTipperStates.EJECTING: self._ejecting_state_actions,
        }

    def _standby_state_actions(self) -> None:
        self._request_code = PusherTipperRequestCodes.NO_REQUEST
        if not self._activated:
            self._request_code = PusherTipperRequestCodes.SET_ACTIVATE

    def _transporting_state_actions(self) -> None:
        self._request_code = PusherTipperRequestCodes.NO_REQUEST

        # Check if the cup is arrived
        if self._is_cup_arrived:
            self._signal_conveyor_off()
        else:
            self._signal_conveyor_on()

        # Log info
        if self.conveyor.payload_positions % (self.conveyor.linear_speed * 5) == 0:
            self.log.info(
                f"{self.__class__.__name__} #{self.id} cup at position "
                f"{self.conveyor.payload_positions} (target position {self.position_on_conveyor})"
            )

    def _pushing_state_actions(self) -> None:
        self._request_code = PusherTipperRequestCodes.NO_REQUEST

        # Check if tipper is at home position
        if self.tipper_position != 0:
            self.tipper_position -= self.tipper_position / abs(self.tipper_position)

        # Start pushing
        elif self.pushing_start_time is None:
            self.pushing_start_time = datetime.datetime.now()
        else:
            # Log pushing processed time
            processed_secs = (
                datetime.datetime.now() - self.pushing_start_time
            ).total_seconds()
            remaining_secs = self.pushing_process_seconds - processed_secs
            if (
                processed_secs < self.pushing_process_seconds
                and processed_secs % 1.0 < 0.1
            ):
                self.log.info(
                    f"{self.__class__.__name__} #{self.id} pushed for {processed_secs: .2f} seconds "
                    f"({remaining_secs: .2f} seconds remaining)"
                )

    def _tipping_state_actions(self) -> None:
        # Request notify wok is ready
        self._request_code = PusherTipperRequestCodes.NO_REQUEST
        if not self._wok_ready:
            self._request_code = PusherTipperRequestCodes.SET_WOK_IS_READY

        # Start tipping
        elif self.tipping_start_time is None:
            self.tipping_start_time = datetime.datetime.now()
        else:
            # Control tipper position to dump ingredients
            self.tipper_position += 1

            # log message
            processed_secs = (
                datetime.datetime.now() - self.tipping_start_time
            ).total_seconds()
            remaining_secs = self.tipping_process_seconds - processed_secs
            if processed_secs % 1.0 < 0.1:
                self.log.info(
                    f"{self.__class__.__name__} #{self.id} tipped for {processed_secs: .2f} seconds "
                    f"({remaining_secs: .2f} seconds remaining)"
                )

    def _ejecting_state_actions(self) -> None:
        self._request_code = PusherTipperRequestCodes.NO_REQUEST
        if not self._is_ejecting_done:
            self._request_code = PusherTipperRequestCodes.SET_EJECT_DONE
