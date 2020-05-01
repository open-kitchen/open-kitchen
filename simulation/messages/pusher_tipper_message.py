"""The Pusher-tipper group related messages"""
from enum import IntEnum, auto

from messages import EnhanceEnum, OKComponentCodeEnum, CodeDescMap
from messages.main_controller_message import MASTER_COMPONENT_REQ_DESC_MAP

"""
Main Controller to Pusher-tipper messages
"""

MASTER_PUSHER_TIPPER_REQ_DESC_MAP = CodeDescMap(
    ACTIVATE="request to activate Pusher-tipper group",
    SET_WOK_IS_READY="request to set Wok is ready",
    SET_EJECT_DONE="request to set ejecting is done",
)

MasterPusherTipperRequestCodes = OKComponentCodeEnum(
    "MasterPusherTipperRequestCodes",
    list(MASTER_COMPONENT_REQ_DESC_MAP) + list(MASTER_PUSHER_TIPPER_REQ_DESC_MAP),
)
MasterPusherTipperRequestCodes.set_description(
    MASTER_COMPONENT_REQ_DESC_MAP + MASTER_PUSHER_TIPPER_REQ_DESC_MAP
)


"""
Pusher-tipper to Main Controller messages
"""


class PusherTipperRequestCodes(IntEnum):
    """The request code from Pusher-tipper to Main controller"""

    NO_REQUEST = 0
    SET_ACTIVATE = 1
    SET_WOK_IS_READY = 2
    SET_EJECT_DONE = 3

    def get_description(self):
        request_desc = {
            self.NO_REQUEST: "No request from Pusher-tipper group",
            self.SET_ACTIVATE: "Pusher-tipper group request to set activate",
            self.SET_WOK_IS_READY: "Pusher-tipper group request to notify if Wok is ready for tipping",
            self.SET_EJECT_DONE: "Pusher-tipper group request to notify if ejecting is done",
        }
        request_code = self.value
        return request_desc.get(
            request_code,
            f"No description for Pusher-tipper request code {request_code}",
        )


"""
Pusher-tipper status messages
"""


class PusherTipperErrors(IntEnum):

    NO_ERROR = 0

    def get_description(self):
        # The error code and description map
        err_desc = {self.NO_ERROR: "no error"}
        err_code = self.value
        return err_desc.get(err_code, f"No description for Error {err_code}")


class PusherTipperStates(IntEnum, EnhanceEnum):
    """Pusher-tipper group states"""

    # ERROR = 255
    STANDBY = auto()
    TRANSPORTING = auto()
    PUSHING = auto()
    TIPPING = auto()
    EJECTING = auto()


"""
Coneyor
"""


class ConveyorStates(IntEnum):
    ON = auto()
    OFF = auto()


PUSHER_TIPPER_CONVEYOR_REQ_DESC_MAP = CodeDescMap(
    TURN_ON="request to turn on conveyor", TURN_OFF="request to turn off conveyor"
)

PusherTipperConveyorRequestCodes = OKComponentCodeEnum(
    "PusherTipperConveyorRequestCodes", list(PUSHER_TIPPER_CONVEYOR_REQ_DESC_MAP)
)
PusherTipperConveyorRequestCodes.set_description(PUSHER_TIPPER_CONVEYOR_REQ_DESC_MAP)
