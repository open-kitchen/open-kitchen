import argparse
import logging
from typing import List

import colorlog

from components.runner_sim import RunnerSim
from components.wok_sim import WokSim
from messages.wok_message import MasterWokRequestCodes, WokErrors, WokRequestCodes
from messages.main_controller_message import (
    MasterComponentRequestCodes,
    ComponentCodes,
    ComponentReceiveResponses,
)
from messages.runner_message import (
    MasterRunnerRequestCodes,
    RunnerErrors,
    RunnerRequestCodes,
)

COMPONENTS = ["wok", "runner"]


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


"""
RunnerSim
"""


def runner_i2c_data_refine(sim: RunnerSim, request_code: int, data: str):
    return int(data)


def runner_i2c_response_refine(
    sim: RunnerSim, request_code: int, data: str, response: int
):
    if request_code == MasterRunnerRequestCodes.GET_SAUCE_BAG_STATUS:
        if response not in ComponentReceiveResponses.values():
            response_description = (
                f"Sauce #{runner_i2c_data_refine(sim, request_code, data)} "
                f"current load is {response}"
            )
        else:
            response_description = (
                f"{ComponentReceiveResponses(response).name}. "
                f"Not able to get status of Sauce #{runner_i2c_data_refine(sim, request_code, data)}"
            )
    else:
        response_description = f"{ComponentReceiveResponses(response).name}"
    return response_description


"""
WokSim
"""


def wok_i2c_data_refine(sim: WokSim, request_code: int, data: str):
    if (
        request_code == MasterComponentRequestCodes.RESPOND_REQUEST
        and sim.request(
            request_code=MasterComponentRequestCodes.GET_REQUEST_CODE, data=0
        )
        == WokRequestCodes.SET_ORDER_ID
    ):
        return data
    else:
        return int(data)


def wok_i2c_response_refine(
    sim: RunnerSim, request_code: int, data: str, response: int
):
    response_description = f"{ComponentReceiveResponses(response).name}"
    return response_description


"""
The Main
"""


def argparser_setup(arg_parser: argparse.ArgumentParser) -> argparse.ArgumentParser:
    arg_parser.add_argument(
        "--component",
        required=True,
        type=str,
        choices=COMPONENTS,
        help=f"The componnet in one of {COMPONENTS}",
    )
    return arg_parser


if __name__ == "__main__":
    f"""This main function should only be use to debug

    It contains a command line interface to control a Sauce Runner simulation.
    This simulation will simulate the hardware level behavior of a Sauce Runner
    which will receive 8-bit I2C message at a time and respond another
    8-bits message as designed in OK Communication Message Specification.

    To debug, install requirements and requirements-dev then run
    >>> python {__file__}

    """
    # Setup config
    arg_parser = argparse.ArgumentParser()
    argparser_setup(arg_parser)
    config = arg_parser.parse_args()

    # Create logger for this file
    log = colorlog.getLogger(f"{__file__}")

    # Rename finite state machine log
    transition_log = colorlog.getLogger("transitions.core")
    transition_log.name = "StateMachine"

    # Setup all the logging
    setup_logging(["WokSim", "RunnerSim", "transitions.core"])
    setup_logging([f"{__file__}"], level=logging.DEBUG)

    sim_component = config.component

    if sim_component == "wok":
        # Create a runner sim simulation
        sim = WokSim(id=1)
        errors = WokErrors
        commands = MasterWokRequestCodes
        requests = WokRequestCodes
        i2c_data_refine_rules = wok_i2c_data_refine
        i2c_response_refine_rules = wok_i2c_response_refine
    elif sim_component == "runner":
        # Create a runner sim simulation
        sim = RunnerSim(id=1)
        errors = RunnerErrors
        commands = MasterRunnerRequestCodes
        requests = RunnerRequestCodes
        i2c_data_refine_rules = runner_i2c_data_refine
        i2c_response_refine_rules = runner_i2c_response_refine
    else:
        log.critical(f"The component {sim_component} is not supported.")
        exit(-1)

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
                # Display main controller's request code and description in log
                log.debug(
                    f"I2C request: {command} ({commands(command).get_description()})"
                )
                data = 0
                response_description = ""
                if command not in [
                    MasterComponentRequestCodes.GET_COMPONENT_CODE,
                    MasterComponentRequestCodes.GET_STATE_CODE,
                    MasterComponentRequestCodes.GET_ERROR_CODE,
                    MasterComponentRequestCodes.GET_REQUEST_CODE,
                ]:
                    raw_data = input("I2C data > ")
                    data = i2c_data_refine_rules(sim, command, raw_data)

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
                    response_description = i2c_response_refine_rules(
                        sim, command, raw_data, response
                    )

                # Display response code and description in log
                log.debug(f"I2C respond: {response} ({response_description})")

        except Exception as e:
            log.error(e)
            continue
