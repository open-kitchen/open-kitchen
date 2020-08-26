"""The Food Dispenser Assembly (FDA) related messages"""
from enum import IntEnum, auto

from messages import EnhanceEnum, OKComponentCodeEnum, CodeDescMap
from messages.main_controller_message import MASTER_COMPONENT_REQ_DESC_MAP

"""
Main Controller to FDA messages
"""

MASTER_FDA_REQ_DESC_MAP = CodeDescMap(
    # FDA Dispenser
    SET_DISPENSING_CYLINDER_NUMBER="request to set dispensing cylinder number",
    SET_DISPENSING_WEIGHT="request to set dispensing weight in grams",
    SET_CUP_IS_ARRIVED_CYLINDER="request to notify that the cup is arrived the cylinder and ready for dispensing",
    SET_ENTER_REFILLING="request to enter refilling state",
    # FDA Cup Transportation
    SET_TABLE_X="request to set X target on XY-table",
    SET_TABLE_Y="request to set Y target on XY-table",
    SET_TO_COLLECT_MORE_INGREDIENTS="request to notify if there are more ingredients to collect",
    SET_CUP_TOWER_REFILLING_DONE="request to notify the cup tower refilling is done",
)

MasterFDARequestCodes = OKComponentCodeEnum(
    "MasterFDARequestCodes",
    list(MASTER_COMPONENT_REQ_DESC_MAP) + list(MASTER_FDA_REQ_DESC_MAP),
)
MasterFDARequestCodes.set_description(
    MASTER_COMPONENT_REQ_DESC_MAP + MASTER_FDA_REQ_DESC_MAP
)


"""
FDA to Main Controller messages
"""


class FDARequestCodes(IntEnum):
    """The request code from Food Dispenser Assembly (FDA) to Main controller"""

    NO_REQUEST = 0
    # FDA Dispenser
    SET_DISPENSING_CYLINDER_NUMBER = 1
    SET_DISPENSING_WEIGHT = 2
    SET_CUP_IS_ARRIVED_CYLINDER = 3
    SET_CYLINDER_REFILLING_DONE = 4
    # FDA Cup Transportation
    SET_TABLE_X = 5
    SET_TABLE_Y = 6
    SET_TO_COLLECT_MORE_INGREDIENTS = 7
    SET_CUP_TOWER_REFILLING_DONE = 8
    SET_DISPENSING_DONE = 9

    def get_description(self):
        request_desc = {
            self.NO_REQUEST: "No request from FDA",
            # FDA Dispenser
            self.SET_DISPENSING_CYLINDER_NUMBER: "FDA request to set dispensing cylinder number",
            self.SET_DISPENSING_WEIGHT: "FDA request to set dispensing weight in grams",
            self.SET_CUP_IS_ARRIVED_CYLINDER: (
                "FDA request to notify that the cup is arrived the cylinder and ready for dispensing"
            ),
            self.SET_CYLINDER_REFILLING_DONE: "FDA request to notify the cylinder refilling is done",
            # FDA Cup Transportation
            self.SET_TABLE_X: "FDA request to set X target on XY-table",
            self.SET_TABLE_Y: "FDA request to set Y target on XY-table",
            self.SET_TO_COLLECT_MORE_INGREDIENTS: "FDA request notify if there are more ingredients to collect",
            self.SET_CUP_TOWER_REFILLING_DONE: "FDA request notify the cup tower refilling is done",
            self.SET_DISPENSING_DONE: "FDA request notify the cylinder dispensing is done",
        }
        request_code = self.value
        return request_desc.get(
            request_code,
            f"No description for Pusher-tipper request code {request_code}",
        )


"""
FDA errors
"""


class FDAErrors(IntEnum):

    NO_ERROR = 0
    CYLINDER_NEED_REFILL = 1
    CUP_TOWER_EMPTY = 2

    def get_description(self):
        # The error code and description map
        err_desc = {
            self.NO_ERROR: "no error",
            self.CYLINDER_NEED_REFILL: "target cylinder needs refill before it can dispense desire weight",
            self.CUP_TOWER_EMPTY: "cup tower is empty",
        }
        err_code = self.value
        return err_desc.get(err_code, f"No description for Error {err_code}")


"""
FDA status messages
"""


class FDADispenserStates(IntEnum, EnhanceEnum):
    # ERROR = 255
    STANDBY = auto()
    WEIGHTING = auto()
    DISPENSING = auto()
    CYLINDER_REFILLING = auto()


class FDACupTransportationStates(IntEnum, EnhanceEnum):
    # ERROR = 255
    STANDBY = auto()
    COLLECTING = auto()
    DEPARTING = auto()
    CUP_REFILLING = auto()
