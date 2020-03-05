"""The Sauce Runner related messages"""
from enum import IntEnum, auto

from messages import EnhanceEnum, OKComponentCodeEnum, CodeDescMap
from messages.main_controller_message import MASTER_COMPONENT_REQ_DESC_MAP

"""
Main Controller to Runner messages
"""

MASTER_RUNNER_REQ_DESC_MAP = CodeDescMap(
    FORCE_RETRIEVE_RUNNER="request to reset (force retrieve) runner",
    RESET_TARGET_WOK="request to set target Wok ID",
    RESET_DESIRE_SAUCE="request to set desire sauce ID",
    RESET_RELEASE_VOLUME="request to set release volume",
    SET_REFILL_DONE="request to set refill done",
    SET_WOK_IS_READY="request to set Wok is ready",
    GET_SAUCE_BAG_STATUS="request sauce bag status",
)

MasterRunnerRequestCodes = OKComponentCodeEnum(
    "MasterRunnerRequestCodes",
    list(MASTER_COMPONENT_REQ_DESC_MAP) + list(MASTER_RUNNER_REQ_DESC_MAP),
)
MasterRunnerRequestCodes.set_description(
    MASTER_COMPONENT_REQ_DESC_MAP + MASTER_RUNNER_REQ_DESC_MAP
)


"""
Runner to Main Controller messages
"""


class RunnerRequestCodes(IntEnum):
    """The request code from Sauce Runner to Main controller"""

    NO_REQUEST = 0
    SET_TARGET_WOK = auto()
    SET_DESIRE_SAUCE = auto()
    SET_RELEASE_VOLUME = auto()
    SET_REFILL_DONE = auto()
    SET_WOK_IS_READY = auto()

    def get_description(self):
        request_desc = {
            self.NO_REQUEST: "No request from Sauce Runner",
            self.SET_TARGET_WOK: "Runner request target Wok ID",
            self.SET_DESIRE_SAUCE: "Runner request desire sauce ID",
            self.SET_RELEASE_VOLUME: "Runner request release volume",
            self.SET_REFILL_DONE: "Runner request to notify if refill is done",
            self.SET_WOK_IS_READY: "Runner request to notify if Wok is ready for sauce dispense",
        }
        runner_request_code = self.value
        return request_desc.get(
            runner_request_code,
            f"No description for Sauce Runner request code {runner_request_code}",
        )


"""
Runner status messages
"""


class RunnerErrors(IntEnum):

    NO_ERROR = 0
    NEED_REFILL = 1
    NOT_ABLE_TO_RETRIEVE = 2

    def get_description(self):
        # The Wok error code and description map
        err_desc = {
            self.NO_ERROR: "no error",
            self.NEED_REFILL: "need refill",
            self.NOT_ABLE_TO_RETRIEVE: "not able to retrieve at current state",
        }
        err_code = self.value
        return err_desc.get(err_code, f"No description for Error {err_code}")


class RunnerStates(IntEnum, EnhanceEnum):
    """Runner states"""

    # ERROR = 255
    STANDBY = auto()
    SENDING = auto()
    RELEASING = auto()
    RETRIEVING = auto()
    REFILLING = auto()


SAUCE_CODE_DESC_MAP = CodeDescMap(
    PadS="“Pad Thai” Sauce (Bangkok Bowl)",
    BiryaniS="Biryani Sauce (Istanbul Bowl)",
    DinaS="Dinamita Sauce (Tokyo Bowl)",
    CurryS="Curry Sauce (New Delhi Bowl)",
    TeriS="Teriyaki Sauce (Beirut Bowl)",
    LomoS="Salsa Lomo saltado (Lima Bowl)",
    CuzS="Cuzco Sauce (Cuzco Bowl)",
)

SauceCodes = OKComponentCodeEnum("SauceCodes", list(SAUCE_CODE_DESC_MAP))
SauceCodes.set_description(SAUCE_CODE_DESC_MAP)
