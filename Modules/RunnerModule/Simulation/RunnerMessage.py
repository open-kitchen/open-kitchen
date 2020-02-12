"""The Sauce Runner related messages"""
from enum import IntEnum, auto

from MainControllerMessage import EnhanceEnum


class MasterComponentRequestCodes(IntEnum):
    """The request code from Main controller to Sauce Runner"""

    GET_COMPONENT_CODE = 1
    GET_STATE_CODE = 2
    GET_ERROR_CODE = 3
    GET_REQUEST_CODE = 4
    RESPOND_REQUEST = 5

    def get_description(self):
        request_desc = {
            self.GET_COMPONENT_CODE: "request component code",
            self.GET_STATE_CODE: "request state code",
            self.GET_ERROR_CODE: "request error code",
            self.GET_REQUEST_CODE: "request runner action",
            self.RESPOND_REQUEST: "send data to Wok",
        }
        request_code = self.value
        return request_desc.get(
            request_code, f"No description for Master-Wok request code {request_code}"
        )


class MasterRunnerRequestCodes(IntEnum):
    """The request code from Main controller to Sauce Runner"""

    GET_COMPONENT_CODE = 1
    GET_STATE_CODE = 2
    GET_ERROR_CODE = 3
    GET_REQUEST_CODE = 4
    RESPOND_REQUEST = 5
    RESET_RUNNER = 6
    RESET_TARGET_WOK = 7
    RESET_RELEASE_VOLUME = 8

    def get_description(self):
        request_desc = {
            self.GET_COMPONENT_CODE: "request component code",
            self.GET_STATE_CODE: "request state code",
            self.GET_ERROR_CODE: "request error code",
            self.GET_REQUEST_CODE: "request runner action",
            self.RESPOND_REQUEST: "send data to Wok",
        }
        request_code = self.value
        return request_desc.get(
            request_code, f"No description for Master-Wok request code {request_code}"
        )


class RunnerRequestCodes(IntEnum):
    """The request code from Sauce Runner to Main controller"""

    NO_REQUEST = 0
    SET_TARGET_WOK = auto()
    SET_RELEASE_VOLUME = auto()

    def get_description(self):
        request_desc = {
            self.NO_REQUEST: "No request from Sauce Runner",
            self.SET_TARGET_WOK: "Runner request target runner ID",
            self.SET_RELEASE_VOLUME: "Runner request release volume",
        }
        runner_request_code = self.value
        return request_desc.get(
            runner_request_code,
            f"No description for Sauce Runner request code {runner_request_code}",
        )


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
    MOVING_TO_WOK = auto()
    RELEASING = auto()
    MOVING_BACK = auto()
    REFILLING = auto()


class ComponentReceiveResponses(IntEnum):

    DENIED = 0
    CONFIRMED = 1
