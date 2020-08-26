"""The Cup Queue related messages"""
from enum import IntEnum, auto

from messages import EnhanceEnum, OKComponentCodeEnum, CodeDescMap
from messages.main_controller_message import MASTER_COMPONENT_REQ_DESC_MAP

"""
Main Controller to Queue messages
"""

MASTER_QUEUE_REQ_DESC_MAP = CodeDescMap(
    DEQUEUE="request to release one cup from the queue",
    GET_QUEUE_SIZE="request to get current queue size",
)

MasterQueueRequestCodes = OKComponentCodeEnum(
    "MasterQueueRequestCodes",
    list(MASTER_COMPONENT_REQ_DESC_MAP) + list(MASTER_QUEUE_REQ_DESC_MAP),
)
MasterQueueRequestCodes.set_description(
    MASTER_COMPONENT_REQ_DESC_MAP + MASTER_QUEUE_REQ_DESC_MAP
)


"""
Queue to Main Controller messages
"""


class QueueRequestCodes(IntEnum):
    """The request code from Queue to Main controller"""

    NO_REQUEST = 0
    SET_DEQUEUE = auto()

    def get_description(self):
        request_desc = {
            self.NO_REQUEST: "No request from Sauce Queue",
            self.SET_DEQUEUE: "Queue request to trigger dequeue a cup",
        }
        queue_request_code = self.value
        return request_desc.get(
            queue_request_code,
            f"No description for Cup Queue request code {queue_request_code}",
        )


"""
Queue status messages
"""


class QueueErrors(IntEnum):

    NO_ERROR = 0
    NO_CUP = 1
    NOT_ABLE_TO_DEQUEUE = 2

    def get_description(self):
        # The error code and description map
        err_desc = {
            self.NO_ERROR: "no error",
            self.NO_CUP: "no cups in queue",
            self.NOT_ABLE_TO_DEQUEUE: "not able to dequeue at current state",
        }
        err_code = self.value
        return err_desc.get(err_code, f"No description for Error {err_code}")


class QueueStates(IntEnum, EnhanceEnum):
    """Queue states"""

    # ERROR = 255
    STANDBY = auto()
    DEQUEUING = auto()
