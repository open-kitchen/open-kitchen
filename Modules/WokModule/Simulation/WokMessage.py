"""The Wok related messages"""
from enum import IntEnum, auto

from MainControllerMessage import EnhanceEnum


class MasterWokRequestCodes(IntEnum):
    """The request code from Main controller to Wok"""
    GET_COMPONENT_CODE = 1
    GET_STATE_CODE = 2
    GET_ERROR_CODE = 3
    GET_REQUEST_CODE = 4
    RESPOND_REQUEST = 5
    RESET_WOK = 6
    RESET_COOKING_TIME = 7

    def get_description(self):
        request_desc = {
            self.GET_COMPONENT_CODE: "request component code",
            self.GET_STATE_CODE: "request state code",
            self.GET_ERROR_CODE: "request error code",
            self.GET_REQUEST_CODE: "request wok action",
            self.RESPOND_REQUEST: "send data to Wok",
            self.RESET_WOK: "request to reset Wok",
            self.RESET_COOKING_TIME: "request to reset Wok cooking duration"
        }
        request_code = self.value
        return request_desc.get(request_code, f"No description for Master-Wok request code {request_code}")


class WokRequestCodes(IntEnum):
    """The request code from Wok to Main controller"""
    NO_REQUEST = 0
    SET_HEAT_DEGREES = auto()
    SET_COOK_SECONDS = auto()
    SET_ORDER_ID = auto()
    SET_INGREDIENTS_READY = auto()
    SET_WOK_IS_EMPTY = auto()

    def get_description(self):
        request_desc = {
            self.NO_REQUEST: "No request from Wok",
            self.SET_ORDER_ID: "Wok request order ID",
            self.SET_HEAT_DEGREES: "Wok request to set cooking temperature",
            self.SET_COOK_SECONDS: "Wok request to set cook time in seconds",
            self.SET_INGREDIENTS_READY: "Wok request to confirm whether ingredients are in Wok",
        }
        wok_request_code = self.value
        return request_desc.get(wok_request_code, f"No description for Wok request code {wok_request_code}")


class WokErrors(IntEnum):

    NO_ERROR = 0
    COOK_TERMINATED_BEFORE_DONE = 1  # Cooking terminates before cooking time complete
    BOWL_NO_READY = 2  # The bowl is not in place for dish exporting

    def get_description(self):
        # The Wok error code and description map
        err_desc = {
            self.NO_ERROR: "no error",
            self.COOK_TERMINATED_BEFORE_DONE: "cooking terminates before cooking time complete",
            self.BOWL_NO_READY: "the bowl is not in place for dish exporting",
        }
        err_code = self.value
        return err_desc.get(err_code, f"No description for Error {err_code}")


class WokStates(IntEnum, EnhanceEnum):
    """Wok states"""

    # ERROR = 255
    WAITING_ORDER = auto()
    WAITING_INGREDIENT = auto()
    COOKING = auto()
    EMPTYING_WOK = auto()
    CLEANING = auto()



