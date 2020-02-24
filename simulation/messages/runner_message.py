"""The Sauce Runner related messages"""
from enum import IntEnum, auto

from messages import EnhanceEnum, OKComponentCodeEnum, CodeDescMap
from messages.main_controller_message import MASTER_COMPONENT_REQ_DESC_MAP

"""
Main Controller to Runner messages
"""

MASTER_RUNNER_REQ_DESC_MAP = CodeDescMap(
    RESET_RUNNER="request to reset runner",
    RESET_TARGET_WOK="request to set target Wok ID",
    RESET_RELEASE_VOLUME="request to set release volume",
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
    SET_RELEASE_VOLUME = auto()

    def get_description(self):
        request_desc = {
            self.NO_REQUEST: "No request from Sauce Runner",
            self.SET_TARGET_WOK: "Runner request target Wok ID",
            self.SET_RELEASE_VOLUME: "Runner request release volume",
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

    def get_description(self):
        # The Wok error code and description map
        err_desc = {self.NO_ERROR: "no error"}
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
