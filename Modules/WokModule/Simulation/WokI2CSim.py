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
    title="Wok Simulation", description="The Open-kitchen Wok simulation engine.",
)
pi_sim = FastAPI(
    title="Wok Simulation v1.0.0",
    description="This API is for testing proposes; please play around with all the endpoints to control the simulation."
)

log = logging.getLogger(f"WokSims")

# Setup finite state machine log
transition_log = logging.getLogger("transitions.core")
transition_log.setLevel(logging.WARNING)


class WokConfig(BaseModel):
    temperature: int
    duration: int
    order_id: str


def get_wok_by_id(wok_id: int):
    if wok_id - 1 not in range(len(woks)):
        log.error(f"Wok #{wok_id} does not exists.")
        return None
    return woks[wok_id - 1]


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


@pi_sim.put("/wok/{wok_id}/cook_config")
async def config_cooking(wok_id: int, wok_config: WokConfig):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

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

    # Set temperature
    wok_raw_response = wok.request(
        MasterWokRequestCodes.RESET_HEAT_TEMPERATURE, data=wok_config.temperature
    )
    wok_response = WokReceiveResponses(wok_raw_response)
    if wok_response == WokReceiveResponses.CONFIRMED:
        response += f"Cooking temperature has been successfully set to {wok_config.temperature} celsius degrees."
    else:
        response += f"Failed to set temperature to {wok_config.temperature} ℃."
        log.error(response)

    # Set cooking time duration
    wok_raw_response = wok.request(
        MasterWokRequestCodes.RESET_COOKING_TIME, data=wok_config.duration
    )
    wok_response = WokReceiveResponses(wok_raw_response)
    if wok_response == WokReceiveResponses.CONFIRMED:
        response += f"Cooking time has been successfully set to {wok_config.duration} seconds."
    else:
        response += f"Failed to set a cooking time to {wok_config.duration} seconds."
        log.error(response)

    # Set order ID
    while True:
        if (
                wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
                == WokRequestCodes.SET_ORDER_ID
        ):
            wok_raw_response = wok.request(
                MasterWokRequestCodes.RESPOND_REQUEST, data=wok_config.order_id
            )
            wok_response = WokReceiveResponses(wok_raw_response)
            if wok_response == WokReceiveResponses.CONFIRMED:
                response += f"Order ID has been set successfully to {wok_config.order_id}."
            else:
                response += f"Failed to set order id to {wok_config.order_id}."
                log.error(response)
                break

            # Break setting order ID loop
            break

    return {"Wok response": response}


@pi_sim.get("/wok/{wok_id}/state")
async def get_wok_state(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_STATE_CODE)
    wok_state = WokStates(wok_raw_response)
    return {"Wok state": f"{wok_state.name}"}


@pi_sim.get("/wok/{wok_id}/error")
async def get_wok_error(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_ERROR_CODE)
    wok_error = WokErrors(wok_raw_response)
    return {"Wok error": f"{wok_error.get_description()}"}


@pi_sim.get("/wok/{wok_id}/request")
async def get_wok_request(wok_id: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    # Handle API call
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
    wok_request = WokRequestCodes(wok_raw_response)
    return {"Wok request": f"{wok_request.get_description()}"}


@pi_sim.patch("/wok/{wok_id}/temperature/{temperature}")
async def reset_wok_temperature(wok_id: int, temperature: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    # Handle API call
    wok_raw_response = wok.request(
        MasterWokRequestCodes.RESET_HEAT_TEMPERATURE, data=temperature
    )
    wok_response = WokReceiveResponses(wok_raw_response)
    if wok_response == WokReceiveResponses.CONFIRMED:
        response = f"Cooking temperature has been changed successfully to {temperature} celsius degrees."
    else:
        response = f"Failed to change the cooking temperature : {temperature}"
    return {"Wok response": response}


@pi_sim.post("/wok/{wok_id}/temperature/{temperature}")
async def set_wok_temperature(wok_id: int, temperature: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    # Handle API call
    if (
            wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
            == WokRequestCodes.SET_HEAT_DEGREES
    ):
        wok_raw_response = wok.request(
            MasterWokRequestCodes.RESPOND_REQUEST, data=temperature
        )
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Cooking temperature has been changed successfully to {temperature} celsius degrees."
        else:
            response = f"Failed to change the cooking temperature : {temperature}"
        return {"Wok response": response}
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Not able to set a cooking temperature now."},
        )


@pi_sim.patch("/wok/{wok_id}/cooking_time/{duration}")
async def reset_wok_cooking_time(wok_id: int, duration: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{wok_id} not found."},
        )

    # Handle API call
    wok_raw_response = wok.request(
        MasterWokRequestCodes.RESET_COOKING_TIME, data=duration
    )
    wok_response = WokReceiveResponses(wok_raw_response)
    if wok_response == WokReceiveResponses.CONFIRMED:
        response = f"Cooking time has been successfully set to {duration} seconds."
    else:
        response = f"Failed to set a cooking time."
    return {"Wok response": response}


@pi_sim.post("/wok/{wok_id}/cooking_time/{duration}")
async def set_wok_cooking_time(wok_id: int, duration: int):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok with ID {wok_id} not found."},
        )

    # Handle API call
    if (
            wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
            == WokRequestCodes.SET_COOK_SECONDS
    ):
        wok_raw_response = wok.request(
            MasterWokRequestCodes.RESPOND_REQUEST, data=duration
        )
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Cooking time has been successfully set to {duration} seconds."
        else:
            response = f"Failed to set a cooking time."
        return {"Wok response": response}
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Failed to set a cooking time."},
        )


@pi_sim.post("/wok/{wok_id}/order_id/{order_id}")
async def set_wok_order_id(wok_id: int, order_id: str):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok with ID {wok_id} not found."},
        )

    # Handle API call
    if (
            wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
            == WokRequestCodes.SET_ORDER_ID
    ):
        wok_raw_response = wok.request(
            MasterWokRequestCodes.RESPOND_REQUEST, data=order_id
        )
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Set order id to {order_id} successfully."
        else:
            response = f"Failed to set order id to {order_id}."
        return {"Wok response": response}
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Not able to set order ID now."},
        )


@pi_sim.post("/wok/{wok_id}/notice_wok_ingredients_ready/{is_ingredients_ready}")
async def notice_wok_ingredients_ready(wok_id: int, is_ingredients_ready: bool):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)

    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok with ID {wok_id} not found."},
        )

    # Handle API call
    if (
            wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
            == WokRequestCodes.SET_INGREDIENTS_READY
    ):
        wok_raw_response = wok.request(
            MasterWokRequestCodes.RESPOND_REQUEST, data=int(is_ingredients_ready)
        )
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Wok #{wok_id} - The ingredients are ready."
        else:
            response = f"Wok #{wok_id} - failed to set ingredients ready."
        return {"Wok response": response}
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={
                "Error": f"Wok #{wok_id} - failed to set ingredients ready."
            },
        )


@pi_sim.post("/wok/{wok_id}/notice_wok_empty/{is_wok_empty}")
async def notice_wok_empty(wok_id: int, is_wok_empty: bool):
    # Get the specific Wok by id
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok with ID {wok_id} not found."},
        )

    # Handle API call
    if (
            wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
            == WokRequestCodes.SET_WOK_IS_EMPTY
    ):
        wok_raw_response = wok.request(
            MasterWokRequestCodes.RESPOND_REQUEST, data=int(is_wok_empty)
        )
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f" Wok #{wok_id} has been notified that the container is empty."
        else:
            response = f"Failed to notified Wok #{wok_id}."
        return {"Wok response": response}
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": f"Failed to notified Wok #{wok_id}."},
        )


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
                    wok_response_desc = f"Wok has been notified that the ingredients are ready."
                else:
                    wok_response_desc = f"Wok has been notified that the ingredients are NOT ready."

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
