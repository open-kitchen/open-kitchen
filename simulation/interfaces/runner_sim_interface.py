import logging
from argparse import ArgumentParser, Namespace
from enum import Enum
from typing import Optional

from fastapi import APIRouter
from pydantic import BaseModel
from starlette import status
from starlette.responses import JSONResponse

from components.runner_sim import RunnerSim
from messages.main_controller_message import (
    MasterComponentRequestCodes,
    ComponentReceiveResponses,
)
from messages.runner_message import (
    MasterRunnerRequestCodes,
    RunnerStates,
    RunnerErrors,
    RunnerRequestCodes,
)

log = logging.getLogger(f"Runner Simulation API")
log.setLevel(logging.DEBUG)

runner_pi_sim = APIRouter()
runners = []


def argparser_setup(arg_parser: ArgumentParser) -> ArgumentParser:
    arg_parser.add_argument("--sauce-bag-num", default=4, type=int)
    return arg_parser


async def startup_event(args: Namespace):
    global runners
    sauce_bag_num = args.sauce_bag_num
    runners = [RunnerSim(id=1, sauce_container_number=sauce_bag_num)]
    log.info(
        f"{len(runners)} Runner simulation(s) has been initialized. Runner has {sauce_bag_num} sauce bags."
    )


async def shutdown_event():
    for runner in runners:
        runner.stop()
    log.info(f"{len(runners)} Runner simulation(s) has been triggered stop.")


def get_runner_by_id(runner_id: int):
    if runner_id - 1 not in range(len(runners)):
        log.error(f"Runner #{runner_id} does not exists.")
        return None
    return runners[runner_id - 1]


class ErrorResponse(Enum):
    """The error responses for the simulation interaction endpoints"""

    @staticmethod
    def runner_not_found(runner_id: int):
        """Wok does not exist"""
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Wok #{runner_id} not found."},
        )

    @staticmethod
    def method_not_allow(runner_id: int, message: str):
        """Method not allow"""
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": f"Wok #{runner_id} {message}."},
        )


class RunnerConfig(BaseModel):
    target_wok_id: Optional[int]
    desire_sauce_id: Optional[int]
    desire_sauce_volume: Optional[int]


@runner_pi_sim.put("/{runner_id}")
async def config_runner(runner_id: int, runner_config: RunnerConfig):
    # Get the specific Runner by id
    runner = get_runner_by_id(runner_id)
    if runner is None:
        return ErrorResponse.runner_not_found(runner_id)

    # Check if in STANDBY or SENDING state
    if runner.request(MasterComponentRequestCodes.GET_STATE_CODE) not in [
        RunnerStates.STANDBY,
        RunnerStates.SENDING,
    ]:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={
                "Error": f"To set [target_wok_id, desire_sauce_id, release volume], the Sauce Runner #{runner_id}, "
                f"has to be in STATE: {RunnerStates.STANDBY.name} or {RunnerStates.SENDING.name}."
            },
        )

    # Handle API call
    response = ""

    # Set target Wok ID
    if runner_config.target_wok_id is not None:
        raw_response = runner.request(
            MasterRunnerRequestCodes.RESET_TARGET_WOK, data=runner_config.target_wok_id
        )
        wok_response = ComponentReceiveResponses(raw_response)
        if wok_response == ComponentReceiveResponses.CONFIRMED:
            response += f"Target Wok ID has been successfully set to {runner_config.target_wok_id}. "
        else:
            response += (
                f"Failed to set target Wok ID to {runner_config.target_wok_id}. "
            )
            log.error(response)

    # Set desire sauce ID
    if runner_config.desire_sauce_id is not None:
        raw_response = runner.request(
            MasterRunnerRequestCodes.RESET_DESIRE_SAUCE,
            data=runner_config.desire_sauce_id,
        )
        wok_response = ComponentReceiveResponses(raw_response)
        if wok_response == ComponentReceiveResponses.CONFIRMED:
            response += f"Desire sauce ID has been successfully set to {runner_config.desire_sauce_id}. "
        else:
            response += (
                f"Failed to set desire sauce ID to {runner_config.desire_sauce_id}. "
            )
            log.error(response)

    # Set desire sauce volume
    if runner_config.desire_sauce_volume is not None:
        raw_response = runner.request(
            MasterRunnerRequestCodes.RESET_RELEASE_VOLUME,
            data=runner_config.desire_sauce_volume,
        )
        wok_response = ComponentReceiveResponses(raw_response)
        if wok_response == ComponentReceiveResponses.CONFIRMED:
            response += f"Release volume has been successfully set to {runner_config.desire_sauce_volume}. "
        else:
            response += (
                f"Failed to set release volume to {runner_config.desire_sauce_volume}. "
            )
            log.error(response)

    # Respond to API call
    if "Failed" in response:
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Runner response": response}


@runner_pi_sim.get("/{runner_id}/state")
async def get_runner_state(runner_id: Optional[int] = 1):
    # Get the specific Runner by id
    runner = get_runner_by_id(runner_id)
    if runner is None:
        return ErrorResponse.runner_not_found(runner_id)

    # Handle API call
    raw_response = runner.request(MasterComponentRequestCodes.GET_STATE_CODE)
    runner_state = RunnerStates(raw_response)
    return {"Runner state": f"{runner_state.name}"}


@runner_pi_sim.put("/{runner_id}/state")
async def transit_runner_state(runner_id: int, dest_state: RunnerStates):
    # Get the specific Runner by id
    runner = get_runner_by_id(runner_id)
    if runner is None:
        return ErrorResponse.runner_not_found(runner_id)

    # Get the current runner state
    current_state = RunnerStates(
        runner.request(MasterComponentRequestCodes.GET_STATE_CODE)
    )

    # Reset (Force retrieve) runner
    if dest_state == RunnerStates.RETRIEVING and current_state in [
        RunnerStates.SENDING,
        RunnerStates.RELEASING,
    ]:
        master_request_code = MasterRunnerRequestCodes.FORCE_RETRIEVE_RUNNER
        response = f"force retrieve Sauce Runner #{runner_id}."

    # Set wok is ready
    elif (
        current_state == RunnerStates.SENDING
        and dest_state == RunnerStates.RELEASING
        and runner.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == RunnerRequestCodes.SET_WOK_IS_READY
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        response = f"notify Sauce Runner #{runner_id} that wok is ready."

    # Set refill is done
    elif (
        current_state == RunnerStates.REFILLING
        and dest_state == RunnerStates.STANDBY
        and runner.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
        == RunnerRequestCodes.SET_REFILL_DONE
    ):
        master_request_code = MasterComponentRequestCodes.RESPOND_REQUEST
        response = f"notify Sauce Runner #{runner_id} that refill is done."

    # Method not allow
    else:
        return ErrorResponse.method_not_allow(
            runner_id,
            f"not able to transit to {dest_state.name} state while in {current_state.name} state.",
        )

    # Perform runner operation through I2C
    raw_response = runner.request(
        master_request_code, data=ComponentReceiveResponses.CONFIRMED
    )
    runner_response = ComponentReceiveResponses(raw_response)

    # Respond to API call
    if runner_response == ComponentReceiveResponses.CONFIRMED:
        response = f"Successfully {response}"
    else:
        response = f"Failed to {response}"
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Wok response": response}


@runner_pi_sim.get("/{runner_id}/error")
async def get_runner_error(runner_id: int):
    # Get the specific Runner by id
    runner = get_runner_by_id(runner_id)
    if runner is None:
        return ErrorResponse.runner_not_found(runner_id)

    # Handle API call
    raw_response = runner.request(MasterComponentRequestCodes.GET_ERROR_CODE)
    runner_error = RunnerErrors(raw_response)
    return {"Runner error": f"{runner_error.get_description()}"}


@runner_pi_sim.get("/{runner_id}/request")
async def get_runner_request(runner_id: int):
    # Get the specific Runner by id
    runner = get_runner_by_id(runner_id)
    if runner is None:
        return ErrorResponse.runner_not_found(runner_id)

    # Handle API call
    raw_response = runner.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
    runner_request = RunnerRequestCodes(raw_response)
    return {"Runner request": f"{runner_request.get_description()}"}
