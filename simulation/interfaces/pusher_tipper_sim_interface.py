import logging
from argparse import ArgumentParser, Namespace, ArgumentError
from enum import Enum

from fastapi import APIRouter
from pydantic import BaseModel
from starlette import status
from starlette.responses import JSONResponse

from components.pusher_tipper_sim import PusherTipperSim, ConveyorSim
from messages.main_controller_message import (
    MasterComponentRequestCodes,
    ComponentReceiveResponses,
)
from messages.pusher_tipper_message import (
    PusherTipperStates,
    MasterPusherTipperRequestCodes,
    PusherTipperRequestCodes,
    PusherTipperErrors,
)

log = logging.getLogger(f"OFTA Simulation API")
log.setLevel(logging.DEBUG)

pi_sim = APIRouter()
conveyor = None
pusher_tipper_groups = []


def argparser_setup(arg_parser: ArgumentParser) -> ArgumentParser:
    try:
        arg_parser.add_argument("--wok-num", default=2, type=int)
    except ArgumentError:
        pass
    return arg_parser


async def startup_event(args: Namespace):
    global conveyor, pusher_tipper_groups

    wok_num = args.wok_num

    conveyor = ConveyorSim(id=1)
    pusher_tipper_groups = [
        PusherTipperSim(id=i + 1, conveyor=conveyor, position_on_conveyor=i * 500 + 200)
        for i in range(wok_num)
    ]
    log.info(
        f"{len(pusher_tipper_groups)} pusher-tipper simulation(s) has been initialized."
    )


async def shutdown_event():
    for pusher_tipper in pusher_tipper_groups:
        pusher_tipper.stop()
    log.info(
        f"{len(pusher_tipper_groups)} pusher-tipper simulation(s) has been triggered stop."
    )


def get_pusher_tipper_group_by_id(pusher_tipper_id: int):
    if pusher_tipper_id - 1 not in range(len(pusher_tipper_groups)):
        log.error(f"Pusher-Tipper #{pusher_tipper_id} does not exists.")
        return None
    return pusher_tipper_groups[pusher_tipper_id - 1]


class ErrorResponse(Enum):
    """The error responses for the simulation interaction endpoints"""

    @staticmethod
    def pusher_tipper_not_found(pusher_tipper_id: int):
        """Pusher-tipper group does not exist"""
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Pusher-tipper #{pusher_tipper_id} not found."},
        )

    @staticmethod
    def method_not_allow(pusher_tipper_id: int, message: str):
        """Method not allow"""
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": f"Pusher-tipper #{pusher_tipper_id} {message}"},
        )


class PusherTipperConfig(BaseModel):
    activate: bool


@pi_sim.put("/{pusher_tipper_id}")
async def config_pusher_tipper(
    pusher_tipper_id: int, pusher_tipper_config: PusherTipperConfig
):
    # Get the specific Pusher-tipper by id
    pusher_tipper = get_pusher_tipper_group_by_id(pusher_tipper_id)
    if pusher_tipper is None:
        return ErrorResponse.pusher_tipper_not_found(pusher_tipper_id)

    # Check if in STANDBY state
    if pusher_tipper.request(MasterComponentRequestCodes.GET_STATE_CODE) not in [
        PusherTipperStates.STANDBY
    ]:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={
                "Error": f"In order to be activated, Pusher-tipper #{pusher_tipper_id} "
                f"has to be in STATE: {PusherTipperStates.STANDBY.name}."
            },
        )

    # Handle API call
    response = ""

    # Activate Pusher-tipper group
    if pusher_tipper_config.activate is not None:
        raw_response = pusher_tipper.request(
            MasterPusherTipperRequestCodes.ACTIVATE, data=pusher_tipper_config.activate
        )
        pusher_tipper_response = ComponentReceiveResponses(raw_response)
        if pusher_tipper_response == ComponentReceiveResponses.CONFIRMED:
            response += f"Activation been set to {pusher_tipper_config.activate}. "
        else:
            response += f"Failed to set Activation to {pusher_tipper_config.activate}. "
            log.error(response)

    # Respond to API call
    if "Failed" in response:
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Pusher-tipper response": response}


@pi_sim.get("/{pusher_tipper_id}/state")
async def get_pusher_tipper_state(pusher_tipper_id: int):
    # Get the specific Pusher-tipper by id
    pusher_tipper = get_pusher_tipper_group_by_id(pusher_tipper_id)
    if pusher_tipper is None:
        return ErrorResponse.pusher_tipper_not_found(pusher_tipper_id)

    # Handle API call
    raw_response = pusher_tipper.request(MasterComponentRequestCodes.GET_STATE_CODE)
    state = PusherTipperStates(raw_response)
    return {"Pusher-tipper state": f"{state.name}"}


@pi_sim.put("/{pusher_tipper_id}/state")
async def transit_pusher_tipper_state(
    pusher_tipper_id: int, dest_state: PusherTipperStates
):
    # Get the specific Pusher-tipper by id
    pusher_tipper = get_pusher_tipper_group_by_id(pusher_tipper_id)
    if pusher_tipper is None:
        return ErrorResponse.pusher_tipper_not_found(pusher_tipper_id)

    # Get the current Pusher-tipper state
    current_state = PusherTipperStates(
        pusher_tipper.request(MasterComponentRequestCodes.GET_STATE_CODE)
    )

    # Set wok is ready
    if (
        current_state == PusherTipperStates.PUSHING
        and dest_state == PusherTipperStates.TIPPING
        and pusher_tipper.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == PusherTipperRequestCodes.SET_WOK_IS_READY
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        response = f"notify Pusher-tipper #{pusher_tipper_id} that wok is ready."

    # Set eject is done
    elif (
        current_state == PusherTipperStates.EJECTING
        and dest_state == PusherTipperStates.STANDBY
        and pusher_tipper.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == PusherTipperRequestCodes.SET_EJECT_DONE
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        response = f"notify Pusher-tipper #{pusher_tipper_id} that ejecting is done."

    # Method not allow
    else:
        return ErrorResponse.method_not_allow(
            pusher_tipper_id,
            f"not able to transit to {dest_state.name} state while in {current_state.name} state.",
        )

    # Perform operation through I2C
    raw_response = pusher_tipper.request(
        master_request_code, data=ComponentReceiveResponses.CONFIRMED
    )
    pusher_tipper_response = ComponentReceiveResponses(raw_response)

    # Respond to API call
    if pusher_tipper_response == ComponentReceiveResponses.CONFIRMED:
        response = f"Successfully {response}"
    else:
        response = f"Failed to {response}"
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Pusher-tipper response": response}


@pi_sim.get("/{pusher_tipper_id}/error")
async def get_pusher_tipper_error(pusher_tipper_id: int):
    # Get the specific Pusher-tipper by id
    pusher_tipper = get_pusher_tipper_group_by_id(pusher_tipper_id)
    if pusher_tipper is None:
        return ErrorResponse.pusher_tipper_not_found(pusher_tipper_id)

    # Handle API call
    raw_response = pusher_tipper.request(MasterComponentRequestCodes.GET_ERROR_CODE)
    error = PusherTipperErrors(raw_response)
    return {"Pusher-tipper error": f"{error.get_description()}"}


@pi_sim.get("/{pusher_tipper_id}/request")
async def get_pusher_tipper_request(pusher_tipper_id: int):
    # Get the specific Pusher-tipper by id
    pusher_tipper = get_pusher_tipper_group_by_id(pusher_tipper_id)
    if pusher_tipper is None:
        return ErrorResponse.pusher_tipper_not_found(pusher_tipper_id)

    # Handle API call
    raw_response = pusher_tipper.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
    component_request = PusherTipperRequestCodes(raw_response)
    return {"Pusher-tipper request": f"{component_request.get_description()}"}
