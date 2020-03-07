import logging
import time
from argparse import ArgumentParser, Namespace
from enum import Enum
from typing import Optional

from fastapi import APIRouter
from pydantic import BaseModel
from starlette import status
from starlette.responses import JSONResponse

from components.wok_sim import WokSim
from messages.main_controller_message import ComponentReceiveResponses
from messages.wok_message import (
    WokStates,
    WokRequestCodes,
    MasterWokRequestCodes,
    WokErrors,
)

log = logging.getLogger(f"Wok Simulation API")
log.setLevel(logging.DEBUG)

pi_sim = APIRouter()
woks = []
wok_num = 2


def argparser_setup(arg_parser: ArgumentParser) -> ArgumentParser:
    arg_parser.add_argument("--wok-num", default=2, type=int)
    return arg_parser


async def startup_event(args: Namespace):
    global woks, wok_num
    wok_num = args.wok_num
    woks = [WokSim(id=wok_id + 1) for wok_id in range(wok_num)]
    log.info(f"{len(woks)} Wok simulation(s) has been initialized.")


async def shutdown_event():
    for wok in woks:
        wok.stop()
    log.info(f"{len(woks)} Wok simulation(s) has been triggered to turned off.")


def get_wok_by_id(wok_id: int):
    if wok_id - 1 not in range(len(woks)):
        log.error(f"Wok #{wok_id} does not exists.")
        return None
    return woks[wok_id - 1]


class ErrorResponse(Enum):
    """The error responses for the simulation interaction endpoints"""

    @staticmethod
    def wok_not_found(wok_id: int):
        """Wok does not exist"""
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    @staticmethod
    def method_not_allow(wok_id: int, message: str):
        """Method not allow"""
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": f"Wok #{wok_id} {message}."},
        )


class WokConfig(BaseModel):
    cooking_time: Optional[int]
    cooking_temperature: Optional[int]
    order_id: Optional[str]


@pi_sim.put("/{wok_id}")
async def config_cooking(wok_id: int, wok_config: WokConfig):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Check if in waiting order state
    if wok.request(MasterWokRequestCodes.GET_STATE_CODE) != WokStates.WAITING_ORDER:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={
                "Error": f"To set [cooking_temperature, cooking_time, order_id] the Wok #{wok_id}, "
                f"has to be in STATE: {WokStates.WAITING_ORDER.name}."
            },
        )

    # Handle API call
    response = ""

    # Set cooking temperature
    if wok_config.cooking_temperature:
        wok_raw_response = wok.request(
            MasterWokRequestCodes.RESET_HEAT_TEMPERATURE,
            data=wok_config.cooking_temperature,
        )
        wok_response = ComponentReceiveResponses(wok_raw_response)
        if wok_response == ComponentReceiveResponses.CONFIRMED:
            response += (
                f"Cooking temperature has been successfully set to {wok_config.cooking_temperature} "
                f"celsius degrees. "
            )
        else:
            response += (
                f"Failed to set temperature to {wok_config.cooking_temperature} ℃. "
            )
            log.error(response)

    # Set cooking time cooking time
    if wok_config.cooking_time:
        wok_raw_response = wok.request(
            MasterWokRequestCodes.RESET_COOKING_TIME, data=wok_config.cooking_time
        )
        wok_response = ComponentReceiveResponses(wok_raw_response)
        if wok_response == ComponentReceiveResponses.CONFIRMED:
            response += f"Cooking time has been successfully set to {wok_config.cooking_time} seconds. "
        else:
            response += (
                f"Failed to set a cooking time to {wok_config.cooking_time} seconds. "
            )
            log.error(response)

    # Set order ID
    if wok_config.order_id:
        time.sleep(1)  # wait 1 seconds to see if wok request order ID
        if (
            wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
            == WokRequestCodes.SET_ORDER_ID
        ):
            wok_raw_response = wok.request(
                MasterWokRequestCodes.RESPOND_REQUEST, data=wok_config.order_id
            )
            wok_response = ComponentReceiveResponses(wok_raw_response)
            if wok_response == ComponentReceiveResponses.CONFIRMED:
                response += (
                    f"Order ID has been set successfully to {wok_config.order_id}. "
                )
            else:
                response += f"Failed to set order id to {wok_config.order_id}. "
                log.error(response)
        else:
            response += (
                f"Not albe to set Order ID to {wok_config.order_id} since it already been set or "
                f"cooking time and/or temperature haven't been set. "
            )
            log.error(response)

    return {"Wok response": response}


@pi_sim.get("/{wok_id}/state")
async def get_wok_state(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_STATE_CODE)
    wok_state = WokStates(wok_raw_response)
    return {"Wok state": f"{wok_state.name}"}


@pi_sim.put("/{wok_id}/state")
async def transit_wok_state(wok_id: int, dest_state: WokStates):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Get the current wok state
    current_state = WokStates(wok.request(MasterWokRequestCodes.GET_STATE_CODE))

    # Reconfigure
    if dest_state == WokStates.WAITING_ORDER and current_state in [
        WokStates.WAITING_ORDER,
        WokStates.WAITING_INGREDIENT,
        WokStates.COOKING,
    ]:
        master_request_code = MasterWokRequestCodes.RECONFIG_WOK
        response = f"reconfigure Wok #{wok_id} (erased cooking time and temperature)."

    # Force dispense
    elif dest_state == WokStates.DISPENSING_FOOD and current_state == WokStates.COOKING:
        master_request_code = MasterWokRequestCodes.FORCE_DISPENSE
        response = f"force dispense Wok #{wok_id}."

    # Set ingredients is ready
    elif (
        current_state == WokStates.WAITING_INGREDIENT
        and dest_state == WokStates.COOKING
        and wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
        == WokRequestCodes.SET_INGREDIENTS_READY
    ):
        master_request_code = MasterWokRequestCodes.RESPOND_REQUEST
        response = f"notify Wok #{wok_id} that ingredients are ready."

    # Set wok is empty
    elif (
        current_state == WokStates.DISPENSING_FOOD
        and dest_state == WokStates.CLEANING
        and wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
        == WokRequestCodes.SET_WOK_IS_EMPTY
    ):
        master_request_code = MasterWokRequestCodes.RESPOND_REQUEST
        response = f"notify Wok #{wok_id} that wok is empty."

    # Method not allow
    else:
        return ErrorResponse.method_not_allow(
            wok_id,
            f"not able to transit to {dest_state.name} state while in {current_state.name} state.",
        )

    # Perform wok operation through I2C
    wok_raw_response = wok.request(
        master_request_code, data=ComponentReceiveResponses.CONFIRMED
    )
    wok_response = ComponentReceiveResponses(wok_raw_response)
    if wok_response == ComponentReceiveResponses.CONFIRMED:
        response = f"Successfully {response}"
    else:
        response = f"Failed to {response}"

    return {"Wok response": response}


@pi_sim.get("/{wok_id}/error")
async def get_wok_error(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_ERROR_CODE)
    wok_error = WokErrors(wok_raw_response)
    return {"Wok error": f"{wok_error.get_description()}"}


@pi_sim.get("/{wok_id}/request")
async def get_wok_request(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
    wok_request = WokRequestCodes(wok_raw_response)
    return {"Wok request": f"{wok_request.get_description()}"}
