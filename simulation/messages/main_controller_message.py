from messages import EnhanceEnum, OKComponentCodeEnum, CodeDescMap

"""
Main Controller to Component messages (general)
"""

MASTER_COMPONENT_REQ_DESC_MAP = CodeDescMap(
    GET_COMPONENT_CODE="request component code",
    GET_STATE_CODE="request state code",
    GET_ERROR_CODE="request error code",
    GET_REQUEST_CODE="request component action code",
    RESPOND_REQUEST="send data to component",
)

MasterComponentRequestCodes = OKComponentCodeEnum(
    "MasterComponentRequestCodes", list(MASTER_COMPONENT_REQ_DESC_MAP)
)
MasterComponentRequestCodes.set_description(MASTER_COMPONENT_REQ_DESC_MAP)


"""
Component to Main Controller messages (general)
"""


class ComponentCodes(OKComponentCodeEnum):
    WOK = 1
    DISPENSER = 2
    RUNNER = 3
    TRANSPORTATION_BAND = 4


class ComponentReceiveResponses(int, EnhanceEnum):

    DENIED = 0
    CONFIRMED = 1
