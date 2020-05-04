import logging
from argparse import ArgumentParser, Namespace, ArgumentError
from enum import Enum
from typing import Union, Optional

from fastapi import APIRouter
from pydantic import BaseModel
from starlette import status
from starlette.responses import JSONResponse

from components.fda_sim import FDADispenserSim, FDACupTransitSim
from messages.fda_message import (
    FDADispenserStates,
    FDACupTransportationStates,
    MasterFDARequestCodes,
    FDARequestCodes,
    FDAErrors,
)
from messages.main_controller_message import (
    MasterComponentRequestCodes,
    ComponentReceiveResponses,
)

log = logging.getLogger(f"FDA Simulation API")
log.setLevel(logging.DEBUG)

dispensers = []
cup_transits = []

"""
Dispenser
"""
dispenser_pi_sim = APIRouter()


def argparser_setup(arg_parser: ArgumentParser) -> ArgumentParser:
    try:
        arg_parser.add_argument("--fda-num", default=1, type=int)
    except ArgumentError:
        pass
    return arg_parser


async def startup_event(args: Namespace):
    global dispensers, cup_transits

    dispensers = [FDADispenserSim(id=i + 1) for i in range(args.fda_num)]
    cup_transits = [FDACupTransitSim(id=i + 1) for i in range(args.fda_num)]
    log.info(f"{len(dispensers)} FDA simulation(s) has been initialized.")


async def shutdown_event():
    for dispenser in dispensers:
        dispenser.stop()
    for cup_transit in cup_transits:
        cup_transit.stop()
    log.info(f"{len(dispensers)} FDA simulation(s) has been triggered stop.")


def get_dispenser_by_id(dispenser_id: int):
    if dispenser_id - 1 not in range(len(dispensers)):
        log.error(f"Dispenser #{dispenser_id} does not exists.")
        return None
    return dispensers[dispenser_id - 1]


class ErrorResponse(Enum):
    """The error responses for the simulation interaction endpoints"""

    @staticmethod
    def dispenser_not_found(dispenser_id: int):
        """Dispenser group does not exist"""
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Dispenser #{dispenser_id} not found."},
        )

    @staticmethod
    def method_not_allow(dispenser_id: int, message: str):
        """Method not allow"""
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": f"Dispenser #{dispenser_id} {message}"},
        )


class DispenserConfig(BaseModel):
    dispensing_cylinder_number: int
    dispensing_weight: int


@dispenser_pi_sim.put("/{dispenser_id}")
async def config_dispenser(dispenser_id: int, dispenser_config: DispenserConfig):
    # Get the specific Dispenser by id
    dispenser = get_dispenser_by_id(dispenser_id)
    if dispenser is None:
        return ErrorResponse.dispenser_not_found(dispenser_id)

    # Check if in STANDBY state
    if dispenser.request(MasterComponentRequestCodes.GET_STATE_CODE) not in [
        FDADispenserStates.STANDBY
    ]:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={
                "Error": f"In order to config, Dispenser #{dispenser_id} "
                f"has to be in STATE: {FDADispenserStates.STANDBY.name}."
            },
        )

    # Handle API call
    response = ""

    # Config dispensing cylinder number
    if dispenser_config.dispensing_cylinder_number is not None:
        raw_response = dispenser.request(
            MasterFDARequestCodes.SET_DISPENSING_CYLINDER_NUMBER,
            data=dispenser_config.dispensing_cylinder_number,
        )
        dispenser_response = ComponentReceiveResponses(raw_response)
        if dispenser_response == ComponentReceiveResponses.CONFIRMED:
            response += f"Dispensing cylinder set to #{dispenser_config.dispensing_cylinder_number}. "
        else:
            response += f"Failed to set dispensing cylinder to #{dispenser_config.dispensing_cylinder_number}. "
            log.error(response)

    # Config dispensing weight
    if dispenser_config.dispensing_weight is not None:
        raw_response = dispenser.request(
            MasterFDARequestCodes.SET_DISPENSING_WEIGHT,
            data=dispenser_config.dispensing_weight,
        )
        dispenser_response = ComponentReceiveResponses(raw_response)
        if dispenser_response == ComponentReceiveResponses.CONFIRMED:
            response += (
                f"Dispensing weight set to {dispenser_config.dispensing_weight} grams. "
            )
        else:
            response += f"Failed to set dispensing weight to {dispenser_config.dispensing_weight} grams. "
            log.error(response)

    # Respond to API call
    if "Failed" in response:
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Dispenser response": response}


@dispenser_pi_sim.get("/{dispenser_id}/state")
async def get_dispenser_state(dispenser_id: int):
    # Get the specific Dispenser by id
    dispenser = get_dispenser_by_id(dispenser_id)
    if dispenser is None:
        return ErrorResponse.dispenser_not_found(dispenser_id)

    # Handle API call
    raw_response = dispenser.request(MasterComponentRequestCodes.GET_STATE_CODE)
    state = FDADispenserStates(raw_response)
    return {"Dispenser state": f"{state.name}"}


@dispenser_pi_sim.put("/{dispenser_id}/state")
async def transit_dispenser_state(dispenser_id: int, dest_state: FDADispenserStates):
    # Get the specific Dispenser by id
    dispenser = get_dispenser_by_id(dispenser_id)
    if dispenser is None:
        return ErrorResponse.dispenser_not_found(dispenser_id)

    # Get the current Dispenser state
    current_state = FDADispenserStates(
        dispenser.request(MasterComponentRequestCodes.GET_STATE_CODE)
    )

    # Set cup is arrived cylinder
    if (
        current_state == FDADispenserStates.WEIGHTING
        and dest_state == FDADispenserStates.DISPENSING
        and dispenser.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == FDARequestCodes.SET_CUP_IS_ARRIVED_CYLINDER
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        response = (
            f"notify Dispenser #{dispenser_id} that cup is arrived target cylinder."
        )

    # Set enter refill state
    elif dest_state == FDADispenserStates.CYLINDER_REFILLING:
        master_request_code = MasterFDARequestCodes.SET_ENTER_REFILLING
        response = f"notify Dispenser #{dispenser_id} enter cylinder refill state."

    # Set cylinder refill done
    elif (
        current_state == FDADispenserStates.CYLINDER_REFILLING
        and dest_state == FDADispenserStates.STANDBY
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        response = f"notify Dispenser #{dispenser_id} cylinder refilling is done."

    # Method not allow
    else:
        return ErrorResponse.method_not_allow(
            dispenser_id,
            f"not able to transit to {dest_state.name} state while in {current_state.name} state.",
        )

    # Perform operation through I2C
    raw_response = dispenser.request(
        master_request_code, data=ComponentReceiveResponses.CONFIRMED
    )
    dispenser_response = ComponentReceiveResponses(raw_response)

    # Respond to API call
    if dispenser_response == ComponentReceiveResponses.CONFIRMED:
        response = f"Successfully {response}"
    else:
        response = f"Failed to {response}"
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Dispenser response": response}


@dispenser_pi_sim.get("/{dispenser_id}/error")
async def get_dispenser_error(dispenser_id: int):
    # Get the specific Dispenser by id
    dispenser = get_dispenser_by_id(dispenser_id)
    if dispenser is None:
        return ErrorResponse.dispenser_not_found(dispenser_id)

    # Handle API call
    raw_response = dispenser.request(MasterComponentRequestCodes.GET_ERROR_CODE)
    error = FDAErrors(raw_response)
    return {"Dispenser error": f"{error.get_description()}"}


@dispenser_pi_sim.get("/{dispenser_id}/request")
async def get_dispenser_request(dispenser_id: int):
    # Get the specific Dispenser by id
    dispenser = get_dispenser_by_id(dispenser_id)
    if dispenser is None:
        return ErrorResponse.dispenser_not_found(dispenser_id)

    # Handle API call
    raw_response = dispenser.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
    component_request = FDARequestCodes(raw_response)
    return {"Dispenser request": f"{component_request.get_description()}"}


"""
Cup Transit
"""
cup_transit_pi_sim = APIRouter()


def get_cup_transit_by_id(cup_transit_id: int):
    if cup_transit_id - 1 not in range(len(cup_transits)):
        log.error(f"Cup-Transit #{cup_transit_id} does not exists.")
        return None
    return cup_transits[cup_transit_id - 1]


class CupTransitErrorResponse(Enum):
    """The error responses for the simulation interaction endpoints"""

    @staticmethod
    def cup_transit_not_found(cup_transit_id: int):
        """Cup-transit group does not exist"""
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"FDA Cup-transit #{cup_transit_id} not found."},
        )

    @staticmethod
    def method_not_allow(cup_transit_id: int, message: str):
        """Method not allow"""
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": f"Cup-transit #{cup_transit_id} {message}"},
        )


class XYTableConfig(BaseModel):
    x_target: int
    y_target: int


@cup_transit_pi_sim.put("/{cup_transit_id}")
async def config_xy_table_target(cup_transit_id: int, xy_table_target: XYTableConfig):
    # Get the specific Cup-transit by id
    cup_transit = get_cup_transit_by_id(cup_transit_id)
    if cup_transit is None:
        return CupTransitErrorResponse.cup_transit_not_found(cup_transit_id)

    # Check if in COLLECTING state
    if cup_transit.request(MasterComponentRequestCodes.GET_STATE_CODE) not in [
        FDACupTransportationStates.COLLECTING
    ]:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={
                "Error": (
                    f"In order to be config XY-table target, Cup-transit #{cup_transit_id} "
                    f"has to be in STATE: {FDACupTransportationStates.COLLECTING.name}."
                )
            },
        )

    # Handle API call
    response = ""

    # Config Cup-transit XY-table target x
    if xy_table_target.x_target is not None:
        raw_response = cup_transit.request(
            MasterFDARequestCodes.SET_TABLE_X, data=xy_table_target.x_target
        )
        cup_transit_response = ComponentReceiveResponses(raw_response)
        if cup_transit_response == ComponentReceiveResponses.CONFIRMED:
            response += f"X target been set to {xy_table_target.x_target}. "
        else:
            response += f"Failed to set X target to {xy_table_target.x_target}. "
            log.error(response)

    # Config Cup-transit XY-table target y
    if xy_table_target.y_target is not None:
        raw_response = cup_transit.request(
            MasterFDARequestCodes.SET_TABLE_Y, data=xy_table_target.y_target
        )
        cup_transit_response = ComponentReceiveResponses(raw_response)
        if cup_transit_response == ComponentReceiveResponses.CONFIRMED:
            response += f"Y target been set to {xy_table_target.y_target}. "
        else:
            response += f"Failed to set Y target to {xy_table_target.y_target}. "
            log.error(response)

    # Respond to API call
    if "Failed" in response:
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Cup-transit response": response}


@cup_transit_pi_sim.get("/{cup_transit_id}/state")
async def get_cup_transit_state(cup_transit_id: int):
    # Get the specific Cup-transit by id
    cup_transit = get_cup_transit_by_id(cup_transit_id)
    if cup_transit is None:
        return CupTransitErrorResponse.cup_transit_not_found(cup_transit_id)

    # Handle API call
    raw_response = cup_transit.request(MasterComponentRequestCodes.GET_STATE_CODE)
    state = FDACupTransportationStates(raw_response)
    return {"Cup-transit state": f"{state.name}"}


@cup_transit_pi_sim.put("/{cup_transit_id}/state")
async def transit_cup_transit_state(
    cup_transit_id: int,
    dest_state: FDACupTransportationStates,
    data: Optional[Union[int, None]] = None,
):
    # Get the specific Cup-transit by id
    cup_transit = get_cup_transit_by_id(cup_transit_id)
    if cup_transit is None:
        return CupTransitErrorResponse.cup_transit_not_found(cup_transit_id)

    # Get the current Cup-transit state
    current_state = FDACupTransportationStates(
        cup_transit.request(MasterComponentRequestCodes.GET_STATE_CODE)
    )

    # Set cylinder dispensing is done
    if (
        current_state == FDACupTransportationStates.COLLECTING
        and dest_state == FDACupTransportationStates.COLLECTING
        and cup_transit.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == FDARequestCodes.SET_DISPENSING_DONE
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        response = (
            f"notify Cup-transit #{cup_transit_id} that cylinder dispensing is done."
        )

    # Set there are more ingredients to collect
    elif (
        current_state == FDACupTransportationStates.COLLECTING
        and dest_state == FDACupTransportationStates.COLLECTING
        and cup_transit.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == FDARequestCodes.SET_TO_COLLECT_MORE_INGREDIENTS
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        data = ComponentReceiveResponses.CONFIRMED
        response = f"notify Cup-transit #{cup_transit_id} there are more ingredients to collect."

    # Set no more ingredients to collect
    elif (
        current_state == FDACupTransportationStates.COLLECTING
        and dest_state == FDACupTransportationStates.DEPARTING
    ):
        master_request_code = MasterFDARequestCodes.SET_TO_COLLECT_MORE_INGREDIENTS
        data = ComponentReceiveResponses.DENIED
        response = f"notify Cup-transit #{cup_transit_id} there is not more ingredient to collect."

    # Set cup refilling done
    elif (
        current_state == FDACupTransportationStates.CUP_REFILLING
        and dest_state == FDACupTransportationStates.STANDBY
        and cup_transit.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == FDARequestCodes.SET_CUP_TOWER_REFILLING_DONE
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        data = data if data is not None else 0
        response = f"notify Cup-transit #{cup_transit_id} that {data} cups been refilled to the cup tower."

    # Method not allow
    else:
        return CupTransitErrorResponse.method_not_allow(
            cup_transit_id,
            f"not able to transit to {dest_state.name} state while in {current_state.name} state.",
        )

    # Perform operation through I2C
    raw_response = cup_transit.request(
        master_request_code,
        data=data if data is not None else ComponentReceiveResponses.CONFIRMED,
    )
    cup_transit_response = ComponentReceiveResponses(raw_response)

    # Respond to API call
    if cup_transit_response == ComponentReceiveResponses.CONFIRMED:
        response = f"Successfully {response}"
    else:
        response = f"Failed to {response}"
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Cup-transit response": response}


@cup_transit_pi_sim.get("/{cup_transit_id}/error")
async def get_cup_transit_error(cup_transit_id: int):
    # Get the specific Cup-transit by id
    cup_transit = get_cup_transit_by_id(cup_transit_id)
    if cup_transit is None:
        return CupTransitErrorResponse.cup_transit_not_found(cup_transit_id)

    # Handle API call
    raw_response = cup_transit.request(MasterComponentRequestCodes.GET_ERROR_CODE)
    error = FDAErrors(raw_response)
    return {"Cup-transit error": f"{error.get_description()}"}


@cup_transit_pi_sim.get("/{cup_transit_id}/request")
async def get_cup_transit_request(cup_transit_id: int):
    # Get the specific Cup-transit by id
    cup_transit = get_cup_transit_by_id(cup_transit_id)
    if cup_transit is None:
        return CupTransitErrorResponse.cup_transit_not_found(cup_transit_id)

    # Handle API call
    raw_response = cup_transit.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
    component_request = FDARequestCodes(raw_response)
    return {"Cup-transit request": f"{component_request.get_description()}"}
