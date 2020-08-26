import argparse
import logging

import uvicorn
from fastapi import FastAPI

from interfaces import (
    runner_sim_interface,
    wok_sim_interface,
    pusher_tipper_sim_interface,
    fda_sim_interface,
    queue_sim_interface,
)

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
    await pusher_tipper_sim_interface.startup_event(args)
    await fda_sim_interface.startup_event(args)
    await queue_sim_interface.startup_event(args)
    log.info(f"Open-Kitchen simulation has been initialized.")


@app.on_event("shutdown")
async def shutdown_event():
    await wok_sim_interface.shutdown_event()
    await runner_sim_interface.shutdown_event()
    await pusher_tipper_sim_interface.shutdown_event()
    await fda_sim_interface.shutdown_event()
    await queue_sim_interface.shutdown_event()
    log.info(f"Open-Kitchen simulation has been triggered to turn off.")


if __name__ == "__main__":
    arg_parser = argparse.ArgumentParser()
    wok_sim_interface.argparser_setup(arg_parser)
    runner_sim_interface.argparser_setup(arg_parser)
    pusher_tipper_sim_interface.argparser_setup(arg_parser)
    fda_sim_interface.argparser_setup(arg_parser)
    queue_sim_interface.argparser_setup(arg_parser)
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
    app.include_router(
        pusher_tipper_sim_interface.pi_sim,
        prefix="/OFTA",
        tags=["OFTA"],
        responses={404: {"description": "Not found"}},
    )
    app.include_router(
        fda_sim_interface.cup_transit_pi_sim,
        prefix="/cup-transit",
        tags=["FDA"],
        responses={404: {"description": "Not found"}},
    )
    app.include_router(
        fda_sim_interface.dispenser_pi_sim,
        prefix="/dispenser",
        tags=["FDA"],
        responses={404: {"description": "Not found"}},
    )
    app.include_router(
        queue_sim_interface.queue_pi_sim,
        prefix="/queue",
        tags=["queue"],
        responses={404: {"description": "Not found"}},
    )

    uvicorn.run(app)
