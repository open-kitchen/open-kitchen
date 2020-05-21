from typing import Dict, List, Type

from components import ComponentSim
from messages.main_controller_message import ComponentCodes, ComponentReceiveResponses
from messages.queue_message import (
    QueueStates,
    QueueErrors,
    QueueRequestCodes,
    MasterQueueRequestCodes,
)


class QueueSim(ComponentSim):
    def __init__(self, id: int, current_cups: int = 0) -> None:
        super().__init__(
            component_id=id,
            component_code=ComponentCodes.OTHER,
            initial_state=QueueStates.STANDBY,
        )

        # Operation attributes
        self._triggered_to_dequeue = False
        self._start_dequeue_iterations = 0
        self._is_dequeue_done = False

        self._cups_in_queue = current_cups
        self._startup = True

        # QueueSim loop Thread start
        self._reset()
        self.start()

    def _reset(self, data=None) -> ComponentReceiveResponses:
        """when Queue naturally goes back to STANDBY state"""
        # Reset operation attributes
        self._triggered_to_dequeue = False
        self._start_dequeue_iterations = 0
        self._is_dequeue_done = False

        return ComponentReceiveResponses.CONFIRMED

    """
    Queue Input/Output functions
    """

    @property
    def _request_handlers(self) -> Dict:
        """Request handlers"""
        # Grab general component request handlers
        general_component_request_handlers = super()._request_handlers

        # Queue special requests
        queue_request_handlers = {
            MasterQueueRequestCodes.DEQUEUE: self._trigger_to_dequeue,
            MasterQueueRequestCodes.GET_QUEUE_SIZE: self._get_queue_size,
        }

        # Combines all handlers
        queue_request_handlers.update(general_component_request_handlers)
        return queue_request_handlers

    @property
    def _receive_handlers(self) -> Dict:
        """Receiving handlers"""
        return {QueueRequestCodes.SET_DEQUEUE: self._trigger_to_dequeue}

    def _trigger_to_dequeue(self, data: int) -> ComponentReceiveResponses:
        """Handler MainController request 6 and queue request 1"""
        # Check state
        if not self.is_STANDBY():
            self._error_code = QueueErrors.NOT_ABLE_TO_DEQUEUE
            self.log.error(f"QueueSim #{self.id} {self._error_code.get_description()}")
            return ComponentReceiveResponses.DENIED

        # Dequeue a cup from queue
        self._triggered_to_dequeue = self.validate_dequeue_a_cup()
        if not self._triggered_to_dequeue:
            self._error_code = QueueErrors.NO_CUP
            self.log.error(f"QueueSim #{self.id} {self._error_code.get_description()}")
        return ComponentReceiveResponses(int(self._triggered_to_dequeue))

    def _get_queue_size(self, data: int) -> int:
        return self._cups_in_queue

    """
    Physical functions
    """

    def validate_dequeue_a_cup(self) -> bool:
        if self._cups_in_queue > 0:
            return True
        else:
            return False

    def dequeue_a_cup(self) -> bool:
        self._start_dequeue_iterations += 1
        if self.validate_dequeue_a_cup() and self._start_dequeue_iterations > 100:
            self._cups_in_queue -= 1
            return True
        else:
            return False

    def enqueue_a_cup(self) -> None:
        self._cups_in_queue += 1

    """
    Queue Operations logic functions
    """

    @property
    def states(self) -> Type[QueueStates]:
        return QueueStates

    @property
    def transitions(self) -> List[Dict]:
        # The transitions for the finite state machine
        transitions = [
            {
                "trigger": "go_to_dequeue",
                "source": QueueStates.STANDBY,
                "dest": QueueStates.DEQUEUING,
            },
            {
                "trigger": "go_to_standby",
                "source": QueueStates.DEQUEUING,
                "dest": QueueStates.STANDBY,
                "before": "_reset",
            },
        ]
        return transitions

    def _transit_state(self) -> None:
        """The logic of state transition

        1. The Queue will initialize in the `STANDBY` state, which will
            - Wait for the main controller to set the target wok ID.
            - Wait for the main controller to set the desire sauce ID.
            - Wait for the main controller to set the release volume.

        2(a). After the above parameter are set, and the desire sauce load is greater than 20%, the Queue goes
        into the `SENDING` state which will
            - Move queue to the target Wok position, and
            - Wait for the main controller to notify if Wok is ready.
        3(a). Once the main controller notify that the target Wok is ready to receive sauce and it arrive the target
        Wok position, it goes into the `RELEASING` state which will
            - Release the desired sauce by the volume been set.
        4(a). Once the desired sauce volume been released, the Queue will enter the `moving back` state which will
            - Move the Queue back to the original (home) position.
        5(a). Finally, the Queue will go to the `STANDBY` state when it arrive the original (home) position.
        6(a). The Queue will cycle back to the first step

        2(b). After the above parameter are set, and the desire sauce load is not greater than 20%, the Queue goes
        into the `REFILLING` state which will
            - Wait main controller to notify if the refilling is done.
        3(b). Once the main controller notified that refilling is done, Queue goes back to `STANDBY` state (cycle
        back to the first step).

        """
        if self.is_STANDBY() and self._triggered_to_dequeue:
            self.go_to_dequeue()

        elif self.is_DEQUEUING() and self._is_dequeue_done:
            self.go_to_standby()

    @property
    def _state_actions(self) -> Dict:
        """Actions to execute in each states"""
        return {
            QueueStates.STANDBY: self._standby_state_actions,
            QueueStates.DEQUEUING: self._dequeuing_state_actions,
        }

    def _standby_state_actions(self) -> None:
        self._request_code = QueueRequestCodes.SET_DEQUEUE

    def _dequeuing_state_actions(self) -> None:
        self._request_code = QueueRequestCodes.NO_REQUEST
        if self.dequeue_a_cup():
            self._is_dequeue_done = True
