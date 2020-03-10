import abc
import threading
import time
from typing import Any, Type, List, Dict

import colorlog
from transitions import Machine

from messages.main_controller_message import (
    ComponentCodes,
    ComponentReceiveResponses,
    MasterComponentRequestCodes,
)


class ComponentSim(abc.ABC):
    """General Open-Kitchen hardware component"""

    @property
    def log(self):
        """Component simulation log"""
        return colorlog.getLogger(f"{self.__class__.__name__}")

    @property
    @abc.abstractmethod
    def transitions(self) -> List[Dict]:
        """The transitions for the finite state machine"""
        return []

    @property
    @abc.abstractmethod
    def states(self) -> Type[Any]:
        """The states for the finite state machine"""
        return []

    def __init__(self, component_id: int, component_code: int, initial_state: Any):
        self.id = component_id

        self._component_code = ComponentCodes(component_code)
        self._error_code = 0
        self._request_code = 0

        # Initialize component state machine
        self.machine = Machine(
            model=self,
            states=self.states,
            transitions=self.transitions,
            initial=initial_state,
        )

        # ComponentSim loop Thread
        self._transition_lock = threading.RLock()
        self._loop_thread_stop_event = threading.Event()

    """
    Runner Input/Output functions
    """

    @property
    @abc.abstractmethod
    def _request_handlers(self) -> dict:
        """Request handlers"""
        return {
            MasterComponentRequestCodes.GET_COMPONENT_CODE: self._get_component_code,
            MasterComponentRequestCodes.GET_STATE_CODE: self._get_state_code,
            MasterComponentRequestCodes.GET_ERROR_CODE: self._get_error_code,
            MasterComponentRequestCodes.GET_REQUEST_CODE: self._get_request_code,
            MasterComponentRequestCodes.RESPOND_REQUEST: self._save_data_handler,
        }

    @property
    @abc.abstractmethod
    def _receive_handlers(self) -> dict:
        """The receive handlers"""
        return {}

    def request(self, request_code, data=0) -> int:
        """Got request from main controller"""
        response = ComponentReceiveResponses.DENIED

        if request_code in self._request_handlers:
            request_handler = self._request_handlers[request_code]
            response = request_handler(data)

        return response

    def _get_component_code(self, data) -> ComponentCodes:
        """Handle request code 1"""
        return self._component_code

    def _get_state_code(self, data) -> int:
        """Handle request code 2"""
        return int(self.state)

    def _get_error_code(self, data) -> int:
        """Handle request code 3"""
        return int(self._error_code)

    def _get_request_code(self, data) -> int:
        """Handle request code 4"""
        return int(self._request_code)

    def _save_data_handler(self, data) -> ComponentReceiveResponses:
        """Handle request code 5"""
        response = ComponentReceiveResponses.DENIED
        if self._request_code in self._receive_handlers:
            receive_handler = self._receive_handlers[self._request_code]
            response = receive_handler(data)
            # with self._transition_lock:
            #     self._transit_state()
        return response

    """
    Runner Operations logic functions
    """

    @abc.abstractmethod
    def _transit_state(self) -> None:
        """Defines the logic of state transition"""
        pass

    @property
    @abc.abstractmethod
    def _state_actions(self) -> dict:
        """State actions pair map"""
        return {}

    def start(self):
        loop_thread = threading.Thread(target=self._sim_loop)
        loop_thread.start()

    def stop(self) -> None:
        self._loop_thread_stop_event.set()

    def _sim_loop(self) -> None:
        loop_interval_seconds = 0.1
        self.log.info(
            f"{self.__class__.__name__} #{self.id} simulation loop initialized."
        )

        while not self._loop_thread_stop_event.is_set():
            # Get state actions and run them
            state_actions = self._state_actions[self.state]
            state_actions()

            # Update state if meet the requirements
            with self._transition_lock:
                self._transit_state()

            # Rest a bit
            time.sleep(loop_interval_seconds)

        self.log.info(f"{self.__class__.__name__} #{self.id} simulation terminated.")
