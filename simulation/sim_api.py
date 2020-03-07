import argparse
import logging

import uvicorn
from fastapi import FastAPI

from interfaces import runner_sim_interface, wok_sim_interface

app = FastAPI(
    title="Open Kitchen Simulation",
    version="0.0.1",
    description=f"This API is for testing proposes; "
    f"please play around with all the endpoints to control the simulation.",
)
log = logging.getLogger(f"Simulation API")


@app.on_event("startup")
async def startup_event():
    await wok_sim_interface.startup_event(args)
    await runner_sim_interface.startup_event(args)
    log.info(f"Open-Kitchen simulation has been initialized.")


@app.on_event("shutdown")
async def shutdown_event():
    await wok_sim_interface.shutdown_event()
    await runner_sim_interface.shutdown_event()
    log.info(f"Open-Kitchen simulation has been triggered to turn off.")


if __name__ == "__main__":
    arg_parser = argparse.ArgumentParser()
    wok_sim_interface.argparser_setup(arg_parser)
    runner_sim_interface.argparser_setup(arg_parser)
    args = arg_parser.parse_args()

    app.include_router(
        wok_sim_interface.pi_sim,
        prefix="/wok",
        tags=["wok"],
        responses={404: {"description": "Not found"}},
    )
    app.include_router(
        runner_sim_interface.runner_pi_sim,
        prefix="/runner",
        tags=["runner"],
        responses={404: {"description": "Not found"}},
    )

    uvicorn.run(app)
