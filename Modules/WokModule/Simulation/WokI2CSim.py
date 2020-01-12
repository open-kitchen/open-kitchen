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

i2c_sim = FastAPI()
wok = WokSim(id=1)

log = logging.getLogger(f"WokSim_{wok.id}")


@i2c_sim.post("/i2c/{request_code}/{order_id}")
async def send_i2c(request_code: int, data: int):
    respond: int = wok.request(request_code, data)
    return {"respond": respond}

