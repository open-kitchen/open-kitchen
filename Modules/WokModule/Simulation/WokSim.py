import logging
import threading
import time
from enum import IntEnum, Enum, auto

import colorlog
from transitions import Machine

log = colorlog.getLogger("WokSim")


class EnhanceEnum(Enum):
    @classmethod
    def values(cls):
        return [v.value for v in cls]

    @classmethod
    def names(cls):
        return [v.name for v in cls]


class ComponentCodes(IntEnum):
    WOK = 1
    DISPENSER = 2
    RUNNER = 3
    TRANSPORTATION_BAND = 4


class MasterRequestCodes(IntEnum):
    GET_COMPONENT_CODE = 1
    GET_STATE_CODE = 2
    GET_ERROR_CODE = 3
    GET_REQUEST_CODE = 4
    RESPOND_REQUEST = 5
    RESET_WOK = 6


class WokRequestCodes(IntEnum):
    NO_REQUEST = 0
    SET_HEAT_DIGREE = 1
    SET_COOK_SECONDS = 2
    SET_INGREDIENTS_READY = 3


class WokErrors(IntEnum):
    COOK_TERMINATED_BEFORE_DONE = 1  # Cooking terminates before cooking time complete
    BOWL_NO_READY = 2  # The bowl is not in place for dish exporting


# The Wok error code and description map
WokErrorsDescriptions = {
    1: "Cooking terminates before cooking time complete",
    2: "The bowl is not in place for dish exporting",
}


class WokStates(IntEnum, EnhanceEnum):
    """Wok states"""

    # ERROR = 255
    WAITING_ORDER = auto()
    WAITING_INGREDIENT = auto()
    COOKING = auto()
    EXPORTING_DISH = auto()
    CLEANING = auto()


class WokSim:
    """This is the simulation of the wok component powered by an Arduino"""

    # The transitions for the finite state machine
    transitions = [
        {
            "trigger": "set_order_id",
            "source": WokStates.WAITING_ORDER,
            "dest": WokStates.WAITING_INGREDIENT,
            "before": "_set_order_id",
        },
        {
            "trigger": "cook",
            "source": WokStates.WAITING_INGREDIENT,
            "dest": WokStates.COOKING,
        },
        {
            "trigger": "cook_done",
            "source": WokStates.COOKING,
            "dest": WokStates.EXPORTING_DISH,
        },
        {
            "trigger": "clean",
            "source": WokStates.EXPORTING_DISH,
            "dest": WokStates.CLEANING,
        },
        {
            "trigger": "reset",
            "source": [
                WokStates.WAITING_ORDER,
                WokStates.WAITING_INGREDIENT,
                WokStates.COOKING,
                WokStates.EXPORTING_DISH,
                WokStates.CLEANING,
            ],
            "dest": WokStates.WAITING_ORDER,
            "before": "_reset"
        },
    ]

    def __init__(self, id):
        self.id = id
        self.error_code = 0
        self.request_code = WokRequestCodes.NO_REQUEST

        self.order_id = 0
        self._heat_degree = None
        self._cook_seconds = None
        self._ingredients_ready = False
        self._drop_done = False
        self._clean_done = False

        self._cook_start_time = None
        self._cooked_seconds = 0
        self._last_cook_iteration_check_time = 0

        self._reset()

        # Initialize
        self.machine = Machine(
            model=self,
            states=WokStates,
            transitions=WokSim.transitions,
            initial=WokStates.WAITING_ORDER,
        )

        # start thread timer the backup
        self._loop_thread_stop_event = threading.Event()
        loop_thread = threading.Thread(target=self.sim_loop)
        loop_thread.start()

    def _reset(self):
        self._heat_degree = None
        self._cook_seconds = None
        self._ingredients_ready = False
        self._drop_done = False
        self._clean_done = False

        self._cook_start_time = None
        self._cooked_seconds = 0
        self._last_cook_iteration_check_time = 0

    def _transit_state(self):
        if (
            self.state == WokStates.WAITING_ORDER
            and self._heat_degree
            and self._cook_seconds
        ):
            self.set_order_id(self.order_id + 1)
        elif self.state == WokStates.WAITING_INGREDIENT and self._ingredients_ready:
            self.cook()
        elif self.state == WokStates.COOKING and self._cooked_seconds >= self._cook_seconds:
            self.cook_done()
        elif self.state == WokStates.EXPORTING_DISH and self._drop_done:
            self.clean()
        elif self.state == WokStates.CLEANING and self._clean_done:
            self.reset()

    def _set_order_id(self, o_id):
        self.order_id = o_id
        log.info(
            f"WokSim {self.id} set an order to cook (Order ID: {self.order_id}) "
            f"Temperature: {self._heat_degree}C, Cook for {self._cook_seconds} seconds."
        )

    def _cook(self):
        now = time.time()

        if self._cook_start_time:
            pass
        else:
            self._cook_start_time = now
            self._cooked_seconds = 0
            self._last_cook_iteration_check_time = now

        self._cooked_seconds = now - self._cook_start_time
        check_delta = now - self._last_cook_iteration_check_time
        if check_delta > self._cook_seconds // 5:
            remaining_seconds = self._cook_seconds - self._cooked_seconds
            log.info(
                f"WokSim {self.id} cooking ... Cooked {self._cooked_seconds:.2f} seconds, "
                f"{remaining_seconds:.2f} seconds remaining."
            )
            self._last_cook_iteration_check_time = now

    def _drop_dish_to_bowl(self):
        log.info(f"WokSim {self.id} dropping dish to bowl ...")
        self._drop_done = True

    def _clean_wok(self):
        log.info(f"WokSim {self.id} cleaning ...")
        self._clean_done = True

    def _save_data_handler(self, data):
        if self.request_code == WokRequestCodes.SET_HEAT_DIGREE:
            self._heat_degree = data
        elif self.request_code == WokRequestCodes.SET_COOK_SECONDS:
            self._cook_seconds = data
        elif self.request_code == WokRequestCodes.SET_INGREDIENTS_READY:
            self._ingredients_ready = data == 1

        self._transit_state()

    def request(self, request_code, data=0):
        respond = 0
        if request_code == MasterRequestCodes.GET_COMPONENT_CODE:
            respond = ComponentCodes.WOK
        elif request_code == MasterRequestCodes.GET_STATE_CODE:
            respond = self.state
        elif request_code == MasterRequestCodes.GET_ERROR_CODE:
            respond = self.error_code
        elif request_code == MasterRequestCodes.GET_REQUEST_CODE:
            respond = self.request_code
        elif request_code == MasterRequestCodes.RESPOND_REQUEST:
            self._save_data_handler(data)
            self.request_code = WokRequestCodes.NO_REQUEST
        elif request_code == MasterRequestCodes.RESET_WOK:
            if self.state == WokStates.COOKING:
                self.error_code = WokErrors.COOK_TERMINATED_BEFORE_DONE
                log.error(WokErrorsDescriptions.get(WokErrors.COOK_TERMINATED_BEFORE_DONE, ""))
            self.reset()

        return respond

    def stop(self):
        self._loop_thread_stop_event.set()

    def sim_loop(self):
        loop_interval_seconds = 0.1
        log.info("Wok simulation loop initialized.")

        while not self._loop_thread_stop_event.is_set():
            if self.state == WokStates.WAITING_ORDER:
                self.request_code = 1 if self._heat_degree is None else 2
            elif self.state == WokStates.WAITING_INGREDIENT:
                self.request_code = 3
            elif self.state == WokStates.COOKING:
                self._cook()
            elif self.state == WokStates.EXPORTING_DISH:
                self._drop_dish_to_bowl()
            elif self.state == WokStates.CLEANING:
                self._clean_wok()

            self._transit_state()
            time.sleep(loop_interval_seconds)

        log.info("Wok simulation terminated.")


if __name__ == "__main__":
    """This main function should only be use to debug
    
    It contains a command line interface to control a wok simulation. 
    This simulation will simulate the hardware level behavior of a Wok 
    which will receive 8-bit I2C message at a time and respond another 
    8-bits message as designed in OK Communication Message 
    Specification.
    
    To debug, install requirements and requirements-dev then run
    >>> python WokSim.py
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
    log = colorlog.getLogger("WokSim")
    log.setLevel(logging.INFO)
    log.addHandler(ch)

    # Setup finit state machine log
    transition_log = colorlog.getLogger("transitions.core")
    transition_log.name = "StateMachine"
    transition_log.setLevel(logging.INFO)
    transition_log.addHandler(ch)

    # Create a wok simulation
    wok = WokSim(id=1)

    # CLI
    while True:
        command = input("I2C reqest code > ")
        try:
            if command == "stop":
                wok.stop()
                break
            elif type(eval(command)) is int:
                command = int(command)
                data = 0
                if command == MasterRequestCodes.GET_COMPONENT_CODE:
                    pass
                elif command == MasterRequestCodes.GET_STATE_CODE:
                    pass
                elif command == MasterRequestCodes.GET_ERROR_CODE:
                    pass
                elif command == MasterRequestCodes.GET_REQUEST_CODE:
                    pass
                elif command == MasterRequestCodes.RESPOND_REQUEST:
                    data = int(input("I2C data > "))
                elif command == MasterRequestCodes.RESET_WOK:
                    pass

                respond = wok.request(request_code=int(command), data=data)
                print(f"I2C respond: {respond}")

                # # Check state code
                # state_code = wok.request(request_code=int(2), data=0)
                # while state_code != WokStates.WAITING_ORDER and state_code != WokStates.WAITING_INGREDIENT:
                #     state_code = wok.request(request_code=int(2), data=0)

        except Exception as e:
            print(e)
            continue

    # # GUI machine
    # try:
    #     while True:
    #         time.sleep(5)
    #         wok.receive_order()
    #         time.sleep(5)
    #         wok.receive_ingredients()
    #         time.sleep(5)
    #         wok.cook()
    #         time.sleep(5)
    #         wok.drop_dish_to_bowl()
    #         time.sleep(5)
    #         wok.clean_wok()
    #         # wok.machine.next_state()
    # except KeyboardInterrupt:  # Ctrl + C will shutdown the machine
    #     wok.machine.stop_server()
