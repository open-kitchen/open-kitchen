from typing import Dict, List, Type

from components import ComponentSim
from messages.fda_message import (
    # FDAErrors,
    FDADispenserStates,
    # FDACupTransportationStates,
    FDARequestCodes,
    MasterFDARequestCodes,
)
from messages.main_controller_message import ComponentCodes, ComponentReceiveResponses


class FDADispenserSim(ComponentSim):
    def __init__(self, id: int) -> None:
        super().__init__(
            component_id=id,
            component_code=ComponentCodes.DISPENSER,
            initial_state=FDADispenserStates.STANDBY,
        )

        # Operation attributes
        self._dispensing_cylindar_number = None
        self._dispensing_weight = None
        self._dispensed_weight = 0
        self._is_cup_arrived = False

        self._startup = True

        # FDA Dispenser Sim loop Thread start
        self._reset()
        self.start()

    def _reset(self, data=None) -> ComponentReceiveResponses:
        """when dispenser naturally goes back to STANDBY state"""
        # Reset operation attributes
        self._dispensing_cylindar_number = None
        self._dispensing_weight = None
        self._dispensed_weight = 0
        self._is_cup_arrived = False

        return ComponentReceiveResponses.CONFIRMED

    """
    Dispenser Input/Output functions
    """

    @property
    def _request_handlers(self) -> Dict:
        """Request handlers"""
        # Grab general component request handlers
        general_component_request_handlers = super()._request_handlers

        # Dispenser special requests
        fda_request_handlers = {
            MasterFDARequestCodes.SET_DISPENSING_CYLINDER_NUMBER: self._set_dispensing_cylinder_number,
            MasterFDARequestCodes.SET_DISPENSING_WEIGHT: self._set_dispensing_weight,
            MasterFDARequestCodes.SET_CUP_IS_ARRIVED_CYLINDER: self._set_cup_is_arrived_cylinder,
        }

        # Combines all handlers
        fda_request_handlers.update(general_component_request_handlers)
        return fda_request_handlers

    @property
    def _receive_handlers(self) -> Dict:
        """Receiving handlers"""
        return {
            FDARequestCodes.SET_DISPENSING_CYLINDER_NUMBER: self._set_dispensing_cylinder_number,
            FDARequestCodes.SET_DISPENSING_WEIGHT: self._set_dispensing_weight,
            FDARequestCodes.SET_CUP_IS_ARRIVED_CYLINDER: self._set_cup_is_arrived_cylinder,
        }

    def _set_dispensing_cylinder_number(
        self, cylinder_number: int
    ) -> ComponentReceiveResponses:
        """Handler MainController request 6 and FDA request 1"""
        # Check if cylindar number is valid
        if cylinder_number not in range(1, 26):
            return ComponentReceiveResponses.DENIED

        # If resetting dispensing cylinder number (only at Main Controller request 6)
        if self._dispensing_cylindar_number:
            self.log.warning(
                f"FDADispenserSim #{self.id} reset dispensing cylinder to #{cylinder_number} "
                f"(was #{self._dispensing_cylindar_number})."
            )

        # Set the dispensing cylinder number
        else:
            self.log.info(
                f"FDADispenserSim #{self.id} set dispensing cylinder to #{cylinder_number}."
            )

        self._dispensing_cylindar_number = cylinder_number
        return ComponentReceiveResponses.CONFIRMED

    def _set_dispensing_weight(self, weight: int) -> ComponentReceiveResponses:
        """Handler MainController request 7 and FDA request 2"""
        self.log.info(
            f"FDADispenserSim #{self.id} set dispensing weight to {weight} grams."
        )
        self._dispensing_weight = weight
        return ComponentReceiveResponses.CONFIRMED

    def _set_cup_is_arrived_cylinder(self, data: int) -> ComponentReceiveResponses:
        """Handler MainController request 8 and FDA request 3"""
        self._is_cup_arrived = bool(data)
        return ComponentReceiveResponses.CONFIRMED

    """
    Physical functions
    """

    @property
    def _is_desire_cylinder_need_refill(self) -> bool:
        return False

    @property
    def _is_weighting_done(self) -> bool:
        return True

    @property
    def _is_dispensing_done(self) -> bool:
        return True

    """
    Dispenser Operations logic functions
    """

    @property
    def states(self) -> Type[FDADispenserStates]:
        return FDADispenserStates

    @property
    def transitions(self) -> List[Dict]:
        # The transitions for the finite state machine
        transitions = [
            {
                "trigger": "go_to_weight",
                "source": FDADispenserStates.STANDBY,
                "dest": FDADispenserStates.WEIGHTING,
            },
            {
                "trigger": "go_to_dispense",
                "source": FDADispenserStates.WEIGHTING,
                "dest": FDADispenserStates.DISPENSING,
            },
            {
                "trigger": "go_to_standby",
                "source": FDADispenserStates.DISPENSING,
                "dest": FDADispenserStates.STANDBY,
                "before": "_reset",
            },
        ]
        return transitions

    def _transit_state(self) -> None:
        """The logic of state transition

        1. The FDA Dispenser will initialize in the `STANDBY` state, which will
            - Wait for the main controller to set the cylinder number to dispense.
            - Wait for the main controller to set the weight of ingredient to dispense.

        2(a). After the above parameter are set, and the desire ingredient load is greater than 20%, the FDA
        Dispenser goes into the `WEIGHTING` state which will
            - Opens up the top damper doors and weight the ingredient and close top damper doors once it reach the
            desire weight of ingredient.
            - Wait for the main controller to notify if the cup is arrive the cylinder.
        3(a). Once the main controller notify that the cup arrive the target cylinder, it goes into the
        `DISPENSING` state which will
            - Dispense the weighted ingredient in the desired cylinder number to the cup.
        4(a). Finally, the FDA Dispenser will go to the `STANDBY` state.
        5(a). The FDA Dispenser will cycle back to the first step

        2(b). After the above parameter are set, and the desire ingredient load is not greater than 20%, the FDA
        Dispenser goes into the `REFILLING` state which will
            - Wait main controller to notify if the refilling is done.
        3(b). Once the main controller notified that refilling is done, FDA Dispenser goes back to `STANDBY`
        state (cycle back to the first step).

        """
        if (
            self.is_STANDBY()
            and self._dispensing_cylindar_number is not None
            and self._dispensing_weight is not None
        ):
            self.go_to_weight()

        elif self.is_WEIGHTING() and self._is_weighting_done and self._is_cup_arrived:
            self.go_to_dispense()

        elif self.is_DISPENSING() and self._is_dispensing_done:
            self.go_to_standby()

    @property
    def _state_actions(self) -> Dict:
        """Actions to execute in each states"""
        return {
            FDADispenserStates.STANDBY: self._standby_state_actions,
            FDADispenserStates.WEIGHTING: self._weighting_state_actions,
            FDADispenserStates.DISPENSING: self._dispensing_state_actions,
        }

    def _standby_state_actions(self) -> None:
        self._request_code = FDARequestCodes.NO_REQUEST
        if self._dispensing_cylindar_number is None:
            self._request_code = FDARequestCodes.SET_DISPENSING_CYLINDER_NUMBER
        elif self._dispensing_weight is None:
            self._request_code = FDARequestCodes.SET_DISPENSING_WEIGHT

    def _weighting_state_actions(self) -> None:
        self._request_code = FDARequestCodes.NO_REQUEST
        if not self._is_cup_arrived:
            self._request_code = FDARequestCodes.SET_CUP_IS_ARRIVED_CYLINDER

    def _dispensing_state_actions(self) -> None:
        pass
