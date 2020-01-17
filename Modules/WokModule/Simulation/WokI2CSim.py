"""
This is a simulation for the I2C communication of Wok(s).

The RESTful API setup at here is use to simulate the I2C communication designed in
OK Communication Message Specification.

To bring up the Simulation, install requirements and requirements-dev then run,
>>> uvicorn WokI2CSim:i2c_sim
Then, the API should be up at http://localhost:8000
You should able to see the API UI if you visit http://localhost:8000/docs
"""
import logging

from MainControllerMessage import ComponentCodes
from WokMessage import WokStates, WokRequestCodes, MasterWokRequestCodes, WokErrors, WokReceiveResponses
from WokSim import WokSim
from fastapi import FastAPI
from starlette import status
from starlette.responses import JSONResponse

i2c_sim = FastAPI()
pi_sim = FastAPI()
# wok = WokSim(id=1)
woks = [WokSim(id=1), WokSim(id=2)]

# log = logging.getLogger(f"WokSim_{wok.id}")
log = logging.getLogger(f"WokSims")


def get_wok_by_id(wok_id: int):
    if wok_id - 1 not in range(len(woks)):
        log.error("Wok ID not exist.")
        return None
    return woks[wok_id - 1]


@pi_sim.get("/wok/{wok_id}/state")
async def get_wok_state(wok_id: int):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_STATE_CODE)
    wok_state = WokStates(wok_raw_response)
    return {
        "Wok state": f"{wok_state.name}"
    }


@pi_sim.get("/wok/{wok_id}/error")
async def get_wok_error(wok_id: int):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_ERROR_CODE)
    wok_error = WokErrors(wok_raw_response)
    return {
        "Wok error": f"{wok_error.get_description()}"
    }


@pi_sim.get("/wok/{wok_id}/request")
async def get_wok_request(wok_id: int):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    wok_raw_response = wok.request(MasterWokRequestCodes.GET_REQUEST_CODE)
    wok_request = WokRequestCodes(wok_raw_response)
    return {
        "Wok reqeust": f"{wok_request.get_description()}"
    }


@pi_sim.patch("/wok/{wok_id}/temperature/{temperature}")
async def reset_wok_temperature(wok_id: int, temperature: int):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    wok_raw_response = wok.request(MasterWokRequestCodes.RESET_HEAT_TEMPERATURE, data=temperature)
    wok_response = WokReceiveResponses(wok_raw_response)
    if wok_response == WokReceiveResponses.CONFIRMED:
        response = f"Reset temperature to {temperature} ℃ successfully."
    else:
        response = f"Failed to reset temperature to {temperature} ℃."
    return {
        "Wok response": response
    }


@pi_sim.post("/wok/{wok_id}/temperature/{temperature}")
async def set_wok_temperature(wok_id: int, temperature: int):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    if wok.request(MasterWokRequestCodes.GET_REQUEST_CODE) == WokRequestCodes.SET_HEAT_DEGREES:
        wok_raw_response = wok.request(MasterWokRequestCodes.RESPOND_REQUEST, data=temperature)
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Set temperature to {temperature} ℃ successfully."
        else:
            response = f"Failed to set temperature to {temperature} ℃."
        return {
            "Wok response": response
        }
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Not able to set cooking temperature now."},
        )


@pi_sim.patch("/wok/{wok_id}/cooking_time/{duration}")
async def reset_wok_cooking_time(wok_id: int, duration: int):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    wok_raw_response = wok.request(MasterWokRequestCodes.RESET_COOKING_TIME, data=duration)
    wok_response = WokReceiveResponses(wok_raw_response)
    if wok_response == WokReceiveResponses.CONFIRMED:
        response = f"Reset cook time to {duration} seconds successfully."
    else:
        response = f"Failed to reset cook time to {duration} seconds."
    return {
        "Wok response": response
    }


@pi_sim.post("/wok/{wok_id}/cooking_time/{duration}")
async def set_wok_cooking_time(wok_id: int, duration: int):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    if wok.request(MasterWokRequestCodes.GET_REQUEST_CODE) == WokRequestCodes.SET_COOK_SECONDS:
        wok_raw_response = wok.request(MasterWokRequestCodes.RESPOND_REQUEST, data=duration)
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Set cook time to {duration} seconds successfully."
        else:
            response = f"Failed to set cook time to {duration} seconds."
        return {
            "Wok response": response
        }
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Not able to set cooking time now."},
        )


@pi_sim.post("/wok/{wok_id}/order_id/{order_id}")
async def set_wok_order_id(wok_id: int, order_id: str):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    if wok.request(MasterWokRequestCodes.GET_REQUEST_CODE) == WokRequestCodes.SET_ORDER_ID:
        wok_raw_response = wok.request(MasterWokRequestCodes.RESPOND_REQUEST, data=order_id)
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Set order id to {order_id} successfully."
        else:
            response = f"Failed to set order id to {order_id}."
        return {
            "Wok response": response
        }
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Not able to set order ID now."},
        )


@pi_sim.post("/wok/{wok_id}/notice_wok_ingredients_ready/{is_ingredients_ready}")
async def notice_wok_ingredients_ready(wok_id: int, is_ingredients_ready: bool):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    if wok.request(MasterWokRequestCodes.GET_REQUEST_CODE) == WokRequestCodes.SET_INGREDIENTS_READY:
        wok_raw_response = wok.request(MasterWokRequestCodes.RESPOND_REQUEST, data=int(is_ingredients_ready))
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Successfully notified wok #{wok_id} the ingredients is ready."
        else:
            response = f"Failed to notified wok #{wok_id} the ingredients is ready."
        return {
            "Wok response": response
        }
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Not able to set order ID now."},
        )


@pi_sim.post("/wok/{wok_id}/notice_wok_empty/{is_wok_empty}")
async def notice_wok_empty(wok_id: int, is_wok_empty: bool):
    wok = get_wok_by_id(wok_id)
    if wok is None:
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={
                "Error": f"Wok with ID {wok_id} not found."
            }
        )
    if wok.request(MasterWokRequestCodes.GET_REQUEST_CODE) == WokRequestCodes.SET_WOK_IS_EMPTY:
        wok_raw_response = wok.request(MasterWokRequestCodes.RESPOND_REQUEST, data=int(is_wok_empty))
        wok_response = WokReceiveResponses(wok_raw_response)
        if wok_response == WokReceiveResponses.CONFIRMED:
            response = f"Successfully notified wok #{wok_id} it's empty."
        else:
            response = f"Failed to notified wok #{wok_id} it's empty."
        return {
            "Wok response": response
        }
    else:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": "Not able to set order ID now."},
        )


@i2c_sim.post("/i2c/{wok_id}/{request_code}/{data}")
async def send_i2c(wok_id: int, request_code: int, data: int):
    wok_request_code = woks[wok_id - 1].request(MasterWokRequestCodes.GET_REQUEST_CODE)
    response: int = woks[wok_id - 1].request(request_code, data)

    master_request_desc = MasterWokRequestCodes(request_code).get_description()

    wok_response_desc = ""
    if request_code == MasterWokRequestCodes.GET_COMPONENT_CODE:
        wok_response_desc = f"The component is a {ComponentCodes(response).name}."
    elif request_code == MasterWokRequestCodes.GET_STATE_CODE:
        wok_response_desc = f"The Wok is at {WokStates(response).name} state."
    elif request_code == MasterWokRequestCodes.GET_ERROR_CODE:
        if response == 0:
            wok_response_desc = f"The Wok has no error."
        else:
            wok_response_desc = f"The Wok error is {WokErrors(response).get_description()}."
    elif request_code == MasterWokRequestCodes.GET_REQUEST_CODE:
        wok_response_desc = f"The {WokRequestCodes(response).get_description()}."
    elif request_code == MasterWokRequestCodes.RESPOND_REQUEST:
        if response == 1:
            if wok_request_code == WokRequestCodes.SET_HEAT_DEGREES:
                wok_response_desc = f"Wok set heat temperature to {data}C."
            elif wok_request_code == WokRequestCodes.SET_COOK_SECONDS:
                wok_response_desc = f"Wok set cooking duration to {data} seconds."
            elif wok_request_code == WokRequestCodes.SET_ORDER_ID:
                wok_response_desc = f"Wok set order id to {data}."
            elif wok_request_code == WokRequestCodes.SET_INGREDIENTS_READY:
                if data == 1:
                    wok_response_desc = f"Wok notify the ingredient is ready."
                else:
                    wok_response_desc = f"Wok notify the ingredient is not ready."

    return {
        "wok_id": wok_id,
        "raw_request": request_code,
        "raw_response": response,
        "request_description": master_request_desc,
        "response_description": wok_response_desc
    }

