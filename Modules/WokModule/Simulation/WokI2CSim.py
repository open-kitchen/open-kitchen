"""
This is a simulation for the I2C communication of Wok(s).

The API setup at here is use to simulate the I2C communication designed in
OK Communication Message Specification.

To bring up the Simulation, install requirements and requirements-dev then run,
>>> uvicorn WokI2CSim:i2c_sim
Then, the API should be up at http://localhost:8000
You should able to see the API UI if you visit http://localhost:8000/docs
"""
import argparse
import logging
import time
from enum import Enum
from typing import Optional

import uvicorn
from MainControllerMessage import ComponentCodes
from WokMessage import (
    WokStates,
    WokRequestCodes,
    MasterWokRequestCodes,
    WokErrors,
    WokReceiveResponses,
)
from WokSim import WokSim
from fastapi import FastAPI
from pydantic import BaseModel
from starlette import status
from starlette.responses import JSONResponse

i2c_sim = FastAPI(
    title="Wok Simulation", description="The Open-kitchen Wok simulation engine."
)
pi_sim = FastAPI(
    title="Wok Simulation v1.0.0",
    description=f"This API is for testing proposes; "
    f"please play around with all the endpoints to control the simulation.",
)

log = logging.getLogger(f"WokSims")

# Setup finite state machine log
transition_log = logging.getLogger("transitions.core")
transition_log.setLevel(logging.WARNING)


class WokConfig(BaseModel):
    cooking_time: Optional[int]
    cooking_temperature: Optional[int]
    order_id: Optional[str]


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


@pi_sim.on_event("startup")
async def startup_event():
    global woks
    wok_num = args.wok_num
    woks = [WokSim(id=wok_id + 1) for wok_id in range(wok_num)]
    log.info(f"{len(woks)} Wok simulation has been initialized.")


@pi_sim.on_event("shutdown")
async def shutdown_event():
    for wok in woks:
        wok.stop()
    log.info(f"{len(woks)} Wok simulation has been turned off.")


@pi_sim.put("/wok/{wok_id}")
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
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
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
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
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
            wok_response = WokReceiveResponses(wok_raw_response)
            if wok_response == WokReceiveResponses.CONFIRMED:
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


@pi_sim.get("/wok/{wok_id}/state")
async def get_wok_state(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_STATE_CODE)
    wok_state = WokStates(wok_raw_response)
    return {"Wok state": f"{wok_state.name}"}


@pi_sim.put("/wok/{wok_id}/state")
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
        master_request_code, data=WokReceiveResponses.CONFIRMED
    )
    wok_response = WokReceiveResponses(wok_raw_response)
    if wok_response == WokReceiveResponses.CONFIRMED:
        response = f"Successfully {response}"
    else:
        response = f"Failed to {response}"

    return {"Wok response": response}


@pi_sim.get("/wok/{wok_id}/error")
async def get_wok_error(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_ERROR_CODE)
    wok_error = WokErrors(wok_raw_response)
    return {"Wok error": f"{wok_error.get_description()}"}


@pi_sim.get("/wok/{wok_id}/request")
async def get_wok_request(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return ErrorResponse.wok_not_found(wok_id)

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
    wok_request = WokRequestCodes(wok_raw_response)
    return {"Wok request": f"{wok_request.get_description()}"}


@i2c_sim.on_event("startup")
async def init_woks():
    global woks
    woks = [WokSim(id=wok_id + 1) for wok_id in range(2)]
    log.info(f"{len(woks)} Wok simulation has been initialized.")


@i2c_sim.on_event("shutdown")
async def shutdown_woks_event():
    await shutdown_event()


@i2c_sim.post("/i2c/{wok_id}/{request_code}/{data}")
async def send_i2c(wok_id: int, request_code: int, data: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    # Get Wok request code so it can generate human readable text later
    wok_request_code = wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)

    # Perform I2C request to Wok
    response: int = wok.request(request_code, data)

    # Generate human readable text and response to the API call
    master_request_desc = MasterWokRequestCodes(request_code).get_description()

    wok_response_desc = ""
    if request_code == MasterWokRequestCodes.GET_COMPONENT_CODE:
        wok_response_desc = f"Component => {ComponentCodes(response).name}."
    elif request_code == MasterWokRequestCodes.GET_STATE_CODE:
        wok_response_desc = f"Wok state => {WokStates(response).name}"
    elif request_code == MasterWokRequestCodes.GET_ERROR_CODE:
        if response == 0:
            wok_response_desc = f"The Wok does not contain any error."
        else:
            wok_response_desc = (
                f"The Wok error is {WokErrors(response).get_description()}."
            )
    elif request_code == MasterWokRequestCodes.GET_REQUEST_CODE:
        wok_response_desc = f"The {WokRequestCodes(response).get_description()}."
    elif request_code == MasterWokRequestCodes.RESPOND_REQUEST:
        if response == WokReceiveResponses.CONFIRMED:
            if wok_request_code == WokRequestCodes.SET_HEAT_DEGREES:
                wok_response_desc = f"Wok heat temperature: {data} C degrees."
            elif wok_request_code == WokRequestCodes.SET_COOK_SECONDS:
                wok_response_desc = f"Wok cooking time: {data} seconds."
            elif wok_request_code == WokRequestCodes.SET_ORDER_ID:
                wok_response_desc = f"Wok order id: {data}."
            elif wok_request_code == WokRequestCodes.SET_INGREDIENTS_READY:
                if data == 1:
                    wok_response_desc = (
                        f"Wok has been notified that the ingredients are ready."
                    )
                else:
                    wok_response_desc = (
                        f"Wok has been notified that the ingredients are NOT ready."
                    )

    return {
        "wok_id": wok_id,
        "raw_request": request_code,
        "raw_response": response,
        "request_description": master_request_desc,
        "response_description": wok_response_desc,
    }


if __name__ == "__main__":
    arg_parser = argparse.ArgumentParser()
    arg_parser.add_argument("--wok_num", default=2, type=int)
    args = arg_parser.parse_args()

    woks = []

    uvicorn.run(pi_sim)
