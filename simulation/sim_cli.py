import logging
from typing import List

import colorlog

from components.runner_sim import RunnerSim
from messages.main_controller_message import (
    MasterComponentRequestCodes,
    ComponentCodes,
    ComponentReceiveResponses,
)
from messages.runner_message import RunnerErrors, RunnerRequestCodes


def setup_logging(log_names: List[str], level=logging.INFO) -> None:
    """Setup logging with colored logging handler

    Args:
        log_names (List[str]): The log names that needs to setup
        level (optional): The logging level

    """
    # Create a colored log stream handler with custom format
    ch = colorlog.StreamHandler()
    ch.setFormatter(
        colorlog.ColoredFormatter(
            "{asctime} [{log_color}{levelname:^8}{reset}] {name:s} "
            ":{bold_black}{threadName:s}{reset}: {log_color}{message:s}",
            style="{",
            log_colors={
                "DEBUG": "bold_cyan",
                "INFO": "green",
                "WARNING": "yellow",
                "ERROR": "thin_red",
                "CRITICAL": "bold_red",
            },
        )
    )

    # Setup logging handler and level
    for log_name in log_names:
        log = colorlog.getLogger(log_name)
        log.setLevel(level)
        log.addHandler(ch)


def i2c_data_refine(sim: RunnerSim, data: str):
    return int(data)


# def wok_i2c_data_refine(sim: WokSim, component_request_code: int, data: str):
#     if (
#         sim.request(
#             request_code=MasterRunnerRequestCodes.GET_REQUEST_CODE, data=0
#         ) == WokRequestCodes.SET_ORDER_ID
#     ):
#     # if (component_request_code == WokRequestCodes.SET_ORDER_ID):
#         refined_data = data
#     else:
#         refined_data = i2c_data_refine(sim=sim, component_request_code=component_request_code, data=data)
#
#     return refined_data


if __name__ == "__main__":
    f"""This main function should only be use to debug

    It contains a command line interface to control a Sauce Runner simulation.
    This simulation will simulate the hardware level behavior of a Sauce Runner
    which will receive 8-bit I2C message at a time and respond another
    8-bits message as designed in OK Communication Message Specification.

    To debug, install requirements and requirements-dev then run
    >>> python {__file__}

    """
    # Create logger for this file
    log = colorlog.getLogger(f"{__file__}")

    # Rename finite state machine log
    transition_log = colorlog.getLogger("transitions.core")
    transition_log.name = "StateMachine"

    # Setup all the logging
    setup_logging(["RunnerSim", "transitions.core"])
    setup_logging([f"{__file__}"], level=logging.DEBUG)

    sim_component = "Runner"

    if sim_component == "Runner":
        # Create a sim simulation
        sim = RunnerSim(id=1)
        errors = RunnerErrors
        requests = RunnerRequestCodes
        i2c_data_refine_rules = i2c_data_refine

    states = sim.states

    # CLI
    while True:
        command = input("I2C request code > ")
        try:
            if command == "stop":
                sim.stop()
                break
            elif type(eval(command)) is int:
                # Got command, grab data if needed
                command = int(command)
                data = 0
                response_description = ""
                if command not in [
                    MasterComponentRequestCodes.GET_COMPONENT_CODE,
                    MasterComponentRequestCodes.GET_STATE_CODE,
                    MasterComponentRequestCodes.GET_ERROR_CODE,
                    MasterComponentRequestCodes.GET_REQUEST_CODE,
                ]:
                    data = input("I2C data > ")
                    data = i2c_data_refine_rules(sim, data)

                # Perform request
                response = sim.request(request_code=int(command), data=data)

                # Grab response helper info
                if command == MasterComponentRequestCodes.GET_COMPONENT_CODE:
                    response_description = f"component {ComponentCodes(response).name}"
                elif command == MasterComponentRequestCodes.GET_STATE_CODE:
                    response_description = f"{states(response).name} state"
                elif command == MasterComponentRequestCodes.GET_ERROR_CODE:
                    response_description = f"{errors(response).get_description()}"
                elif command == MasterComponentRequestCodes.GET_REQUEST_CODE:
                    response_description = f"{requests(response).get_description()}"
                else:
                    response_description = f"{ComponentReceiveResponses(response).name}"

                # Display response code and description in log
                log.debug(f"I2C respond: {response} ({response_description})")

        except Exception as e:
            print(e)
            continue
