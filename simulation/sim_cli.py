import logging

import colorlog

from components.runner_sim import RunnerSim
from messages.runner_message import MasterRunnerRequestCodes


if __name__ == "__main__":
    """This main function should only be use to debug

    It contains a command line interface to control a Sauce Runner simulation.
    This simulation will simulate the hardware level behavior of a Sauce Runner
    which will receive 8-bit I2C message at a time and respond another
    8-bits message as designed in OK Communication Message Specification.

    To debug, install requirements and requirements-dev then run
    >>> python RunnerSim.py
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

    # Create logger for this file
    log = colorlog.getLogger("RunnerSim")
    log.setLevel(logging.INFO)
    log.addHandler(ch)

    component_sim_log = colorlog.getLogger("ComponentSim")
    component_sim_log.setLevel(logging.INFO)
    component_sim_log.addHandler(ch)

    # Setup finite state machine log
    transition_log = colorlog.getLogger("transitions.core")
    transition_log.name = "StateMachine"
    transition_log.setLevel(logging.INFO)
    transition_log.addHandler(ch)

    # Create a runner simulation
    runner = RunnerSim(id=1)

    # CLI
    while True:
        command = input("I2C request code > ")
        try:
            if command == "stop":
                runner.stop()
                break
            elif type(eval(command)) is int:
                command = int(command)
                data = 0
                if command == MasterRunnerRequestCodes.GET_COMPONENT_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.GET_STATE_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.GET_ERROR_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.GET_REQUEST_CODE:
                    pass
                elif command == MasterRunnerRequestCodes.RESPOND_REQUEST:
                    data = input("I2C data > ")
                    # if (
                    #     runner.request(
                    #         request_code=MasterRunnerRequestCodes.GET_REQUEST_CODE, data=0
                    #     )
                    #     == WokRequestCodes.SET_ORDER_ID
                    # ):
                    #     data = data
                    # else:
                    #     data = int(data)
                    data = int(data)
                elif command == MasterRunnerRequestCodes.RESET_RUNNER:
                    pass
                elif command == MasterRunnerRequestCodes.RESET_TARGET_WOK:
                    data = input("I2C data > ")
                    data = int(data)
                elif command == MasterRunnerRequestCodes.RESET_RELEASE_VOLUME:
                    data = input("I2C data > ")
                    data = int(data)

                response = runner.request(request_code=int(command), data=data)
                print(f"I2C respond: {response}")

                # # Check state code
                # state_code = runner.request(request_code=int(2), data=0)
                # while state_code != WokStates.WAITING_ORDER and state_code != WokStates.WAITING_INGREDIENT:
                #     state_code = runner.request(request_code=int(2), data=0)

        except Exception as e:
            print(e)
            continue
