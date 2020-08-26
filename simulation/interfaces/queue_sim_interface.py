import logging
from argparse import ArgumentParser, Namespace
from enum import Enum
from typing import Optional

from fastapi import APIRouter
from starlette import status
from starlette.responses import JSONResponse

from components.queue_sim import QueueSim
from messages.main_controller_message import (
    MasterComponentRequestCodes,
    ComponentReceiveResponses,
)
from messages.queue_message import (
    MasterQueueRequestCodes,
    QueueStates,
    QueueErrors,
    QueueRequestCodes,
)

log = logging.getLogger(f"Queue Simulation API")
log.setLevel(logging.DEBUG)

queue_pi_sim = APIRouter()
queues = []


def argparser_setup(arg_parser: ArgumentParser) -> ArgumentParser:
    arg_parser.add_argument("--current-cups-in-queue", default=0, type=int)
    return arg_parser


async def startup_event(args: Namespace):
    global queues
    queues = [QueueSim(id=1, current_cups=args.current_cups_in_queue)]
    log.info(
        f"{len(queues)} Queue simulation(s) has been initialized. "
        f"Each Queue has {args.current_cups_in_queue} cups in it."
    )


async def shutdown_event():
    for queue in queues:
        queue.stop()
    log.info(f"{len(queues)} Queue simulation(s) has been triggered stop.")


def get_queue_by_id(queue_id: int):
    if queue_id - 1 not in range(len(queues)):
        log.error(f"Queue #{queue_id} does not exists.")
        return None
    return queues[queue_id - 1]


class ErrorResponse(Enum):
    """The error responses for the simulation interaction endpoints"""

    @staticmethod
    def queue_not_found(queue_id: int):
        """Queue does not exist"""
        return JSONResponse(
            status_code=status.HTTP_404_NOT_FOUND,
            content={"Error": f"Queue #{queue_id} not found."},
        )

    @staticmethod
    def method_not_allow(queue_id: int, message: str):
        """Method not allow"""
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={"Error": f"Queue #{queue_id} {message}"},
        )


@queue_pi_sim.put("/{queue_id}/dequeue")
async def dequeue_queue(queue_id: int):
    # Get the specific Queue by id
    queue = get_queue_by_id(queue_id)
    if queue is None:
        return ErrorResponse.queue_not_found(queue_id)

    # Check if in STANDBY state
    if queue.request(MasterComponentRequestCodes.GET_STATE_CODE) not in [
        QueueStates.STANDBY
    ]:
        return JSONResponse(
            status_code=status.HTTP_405_METHOD_NOT_ALLOWED,
            content={
                "Error": f"To dequeue the Queue #{queue_id}, "
                f"it has to be in STATE: {QueueStates.STANDBY.name}."
            },
        )

    # Handle API call
    response = ""

    # Trigger queue to dequeue
    raw_response = queue.request(MasterQueueRequestCodes.DEQUEUE)
    queue_response = ComponentReceiveResponses(raw_response)
    if queue_response == ComponentReceiveResponses.CONFIRMED:
        response += f"Queue receive command to dequeue. "
    else:
        response += f"Failed to trigger Queue #{queue_id} to dequeue. "
        log.error(response)

    # Respond to API call
    if "Failed" in response:
        return JSONResponse(
            status_code=status.HTTP_400_BAD_REQUEST, content={"Error": response}
        )
    return {"Queue response": response}


@queue_pi_sim.get("/{queue_id}/size")
async def get_queue_size(queue_id: int = 1):
    # Get the specific Queue by id
    queue = get_queue_by_id(queue_id)
    if queue is None:
        return ErrorResponse.queue_not_found(queue_id)

    # Handle API call
    # Get the queue size
    raw_response = queue.request(MasterQueueRequestCodes.GET_QUEUE_SIZE)
    queue_size = raw_response
    return {f"Queue #{queue_id} current size is {queue_size}"}


@queue_pi_sim.get("/{queue_id}/state")
async def get_queue_state(queue_id: Optional[int] = 1):
    # Get the specific Queue by id
    queue = get_queue_by_id(queue_id)
    if queue is None:
        return ErrorResponse.queue_not_found(queue_id)

    # Handle API call
    raw_response = queue.request(MasterComponentRequestCodes.GET_STATE_CODE)
    queue_state = QueueStates(raw_response)
    return {"Queue state": f"{queue_state.name}"}


@queue_pi_sim.get("/{queue_id}/error")
async def get_queue_error(queue_id: int):
    # Get the specific Queue by id
    queue = get_queue_by_id(queue_id)
    if queue is None:
        return ErrorResponse.queue_not_found(queue_id)

    # Handle API call
    raw_response = queue.request(MasterComponentRequestCodes.GET_ERROR_CODE)
    queue_error = QueueErrors(raw_response)
    return {"Queue error": f"{queue_error.get_description()}"}


@queue_pi_sim.get("/{queue_id}/request")
async def get_queue_request(queue_id: int):
    # Get the specific Queue by id
    queue = get_queue_by_id(queue_id)
    if queue is None:
        return ErrorResponse.queue_not_found(queue_id)

    # Handle API call
    raw_response = queue.request(MasterComponentRequestCodes.GET_REQUEST_CODE)
    queue_request = QueueRequestCodes(raw_response)
    return {"Queue request": f"{queue_request.get_description()}"}
