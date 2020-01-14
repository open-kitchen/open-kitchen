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

from WokSim import WokSim
from fastapi import FastAPI
from MainControllerMessage import ComponentCodes
from WokMessage import WokStates, WokRequestCodes, MasterWokRequestCodes, WokErrors

i2c_sim = FastAPI()
# wok = WokSim(id=1)
woks = [WokSim(id=1), WokSim(id=2)]

# log = logging.getLogger(f"WokSim_{wok.id}")
log = logging.getLogger(f"WokSims")


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

