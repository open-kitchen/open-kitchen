from typing import Dict, List, Type

from components import ComponentSim
from messages.fda_message import (
    FDAErrors,
    FDADispenserStates,
    FDACupTransportationStates,
    FDARequestCodes,
    MasterFDARequestCodes,
)
from messages.main_controller_message import ComponentCodes, ComponentReceiveResponses


class FDACupTransitSim(ComponentSim):
    def __init__(self, id: int) -> None:
        super().__init__(
            component_id=id,
            component_code=ComponentCodes.DISPENSER,
            initial_state=FDADispenserStates.STANDBY,
        )

        # Operation attributes
        self._target_XY = [None, None]
        self._dispensing_done = False
        self._is_more_ingredient = None

        self._startup = True
        self._cups_in_tower = 1
        self._table_position = [500, 500]

        # FDA Dispenser Sim loop Thread start
        self._reset()
        self.start()

    def _reset(self, data=None) -> ComponentReceiveResponses:
        """when system naturally goes back to STANDBY state"""
        # Reset operation attributes
        self._target_XY = [None, None]
        self._dispensing_done = False
        self._is_more_ingredient = None

        return ComponentReceiveResponses.CONFIRMED

    """
    Cup Transit Input/Output functions
    """

    @property
    def _request_handlers(self) -> Dict:
        """Request handlers"""
        # Grab general component request handlers
        general_component_request_handlers = super()._request_handlers

        # Dispenser special requests
        fda_request_handlers = {
            MasterFDARequestCodes.SET_TABLE_X: self._set_target_table_x,
            MasterFDARequestCodes.SET_TABLE_Y: self._set_target_table_y,
            MasterFDARequestCodes.SET_TO_COLLECT_MORE_INGREDIENTS: self._notify_to_collect_more_ingredients,
            MasterFDARequestCodes.SET_CUP_TOWER_REFILLING_DONE: self._notify_cup_tower_refill_done,
        }

        # Combines all handlers
        fda_request_handlers.update(general_component_request_handlers)
        return fda_request_handlers

    @property
    def _receive_handlers(self) -> Dict:
        """Receiving handlers"""
        return {
            FDARequestCodes.SET_TABLE_X: self._set_target_table_x,
            FDARequestCodes.SET_TABLE_Y: self._set_target_table_y,
            FDARequestCodes.SET_TO_COLLECT_MORE_INGREDIENTS: self._notify_to_collect_more_ingredients,
            FDARequestCodes.SET_CUP_TOWER_REFILLING_DONE: self._notify_cup_tower_refill_done,
            FDARequestCodes.SET_DISPENSING_DONE: self._notify_cylinder_dispensing_done,
        }

    def _set_target_table_x(self, target_x: int) -> ComponentReceiveResponses:
        """Handler MainController request 10 and FDA request 5"""
        # Check if target x value is valid
        if target_x not in range(500, 35501):
            return ComponentReceiveResponses.DENIED

        # If resetting (only at Main Controller request 9)
        if self._target_XY[0] is not None:
            self.log.warning(
                f"FDACupTransitSim #{self.id} reset target X to {target_x} (was {self._target_XY[0]})."
            )

        # Set the dispensing cylinder number
        else:
            self.log.info(f"FDACupTransitSim #{self.id} reset target X to {target_x}.")

        self._target_XY[0] = target_x
        return ComponentReceiveResponses.CONFIRMED

    def _set_target_table_y(self, target_y: int) -> ComponentReceiveResponses:
        """Handler MainController request 11 and FDA request 6"""
        # Check if target y value is valid
        if target_y not in range(500, 35501):
            return ComponentReceiveResponses.DENIED

        # If resetting (only at Main Controller request 9)
        if self._target_XY[1] is not None:
            self.log.warning(
                f"FDACupTransitSim #{self.id} reset target Y to {target_y} (was {self._target_XY[1]})."
            )

        # Set the dispensing cylinder number
        else:
            self.log.info(f"FDACupTransitSim #{self.id} reset target Y to {target_y}.")

        self._target_XY[1] = target_y
        return ComponentReceiveResponses.CONFIRMED

    def _notify_to_collect_more_ingredients(
        self, need_to_collect_more_ingredients: bool
    ) -> ComponentReceiveResponses:
        """Handler MainController request 12 and FDA request 7"""
        if bool(need_to_collect_more_ingredients):
            self.log.info(
                f"FDACupTransitSim #{self.id} been notified to collect more ingredients"
            )
        else:
            self.log.info(
                f"FDACupTransitSim #{self.id} been notified there is no more ingredients to collect"
            )

        self._is_more_ingredient = bool(need_to_collect_more_ingredients)
        self._target_XY = [
            None,
            None,
        ]  # Reset the target so it can ask next target XY if there is more to collect
        self._dispensing_done = False  # Reset dispensing flag
        return ComponentReceiveResponses.CONFIRMED

    def _notify_cup_tower_refill_done(
        self, number_of_cups_been_refilled: int
    ) -> ComponentReceiveResponses:
        """Handler MainController request 13 and FDA request 8"""
        self.log.info(
            f"FDACupTransitSim #{self.id} Cup tower refilled {number_of_cups_been_refilled} cups."
        )
        self._cups_in_tower = int(number_of_cups_been_refilled)
        self._error_code = FDAErrors.NO_ERROR
        return ComponentReceiveResponses.CONFIRMED

    def _notify_cylinder_dispensing_done(
        self, dispensing_done: bool
    ) -> ComponentReceiveResponses:
        """FDA request 9"""
        if bool(dispensing_done) is True:
            self.log.info(
                f"FDACupTransitSim #{self.id} been notified that cylinder dispensing is done."
            )
        self._dispensing_done = bool(dispensing_done)
        return ComponentReceiveResponses.CONFIRMED

    """
    Physical functions
    """

    @property
    def _is_arrive_table_target(self) -> bool:
        if (
            self._target_XY[0] == self._table_position[0]
            and self._target_XY[1] == self._table_position[1]
        ):
            return True
        return False

    def move_table_to_target(self):
        """Fake one sec move to target"""
        self._table_position[0] = self._target_XY[0]
        self._table_position[1] = self._target_XY[1]

    def _take_one_cup_from_tower(self):
        self._cups_in_tower -= 1

    """
    Cup Transit Operations logic functions
    """

    @property
    def states(self) -> Type[FDACupTransportationStates]:
        return FDACupTransportationStates

    @property
    def transitions(self) -> List[Dict]:
        # The transitions for the finite state machine
        transitions = [
            {
                "trigger": "go_to_collect",
                "source": FDACupTransportationStates.STANDBY,
                "dest": FDACupTransportationStates.COLLECTING,
                "before": "_take_one_cup_from_tower",
            },
            {
                "trigger": "go_to_cup_tower_refill",
                "source": self.states.STANDBY,
                "dest": self.states.CUP_REFILLING,
            },
            {
                "trigger": "go_to_departure",
                "source": FDACupTransportationStates.COLLECTING,
                "dest": FDACupTransportationStates.DEPARTING,
            },
            {
                "trigger": "go_to_standby",
                "source": [self.states.DEPARTING, self.states.CUP_REFILLING],
                "dest": self.states.STANDBY,
                "before": "_reset",
            },
        ]
        return transitions

    def _transit_state(self) -> None:
        """The logic of state transition

        1. The FDA Cup Transit will initialize in the `STANDBY` state, which will
            - Check if there is cup in the cup tower.
            - Trigger to release a cup if there is cup in cup tower, call to refill cup otherwise (go to step 2(b)).
            - Move cup to the conveyor's actuator.
            - Move XY table to the start position.
            - Place the cup on XY table.

        2(a). After the operations above, the FDA Cup Transit goes into the `COLLECTING` state which will
            - Wait for the main controller to set target X and target Y place.
            - Move XY table to the target coordinates.
            - Wait for the main controller to notify if the cylinder dispensing is done.
            - Ask main controller if there is more ingredient to collect. Repeat step 2(a) if there is more ingredients
              to collect.
        3(a). Once the FDA Cup Transit collected all the ingredients, it goes into the `DEPARTING` state which will
            - Move XY table to the exit position.
            - Pull out the cup from XY table to the departure conveyor.
            - Move the cup with ingredients to the queue conveyor.

        2(b). If there is not cup in the cup tower then the FDA Cup Transit goes into the `CUP REFILLING` state
        which will
            - Wait main controller to notify if the cup refilling is done.
        3(b). Once the main controller notified that cup refilling is done, FDA Cup Transit goes back to `STANDBY`
        state (cycle back to the first step).

        """
        if self.is_STANDBY():
            if self._cups_in_tower == 0:
                self.go_to_cup_tower_refill()
            else:
                self.go_to_collect()

        elif self.is_COLLECTING() and self._is_more_ingredient is False:
            self.go_to_departure()

        elif self.is_DEPARTING() or (
            self.is_CUP_REFILLING() and self._cups_in_tower > 0
        ):
            self.go_to_standby()

    @property
    def _state_actions(self) -> Dict:
        """Actions to execute in each states"""
        return {
            self.states.STANDBY: self._standby_state_actions,
            self.states.COLLECTING: self._collecting_state_actions,
            self.states.DEPARTING: self._departing_state_actions,
            self.states.CUP_REFILLING: self._cup_refilling_state_actions,
        }

    def _standby_state_actions(self) -> None:
        pass

    def _collecting_state_actions(self) -> None:
        self._request_code = FDARequestCodes.NO_REQUEST
        if not self._target_XY[0]:
            self._request_code = FDARequestCodes.SET_TABLE_X
        elif not self._target_XY[1]:
            self._request_code = FDARequestCodes.SET_TABLE_Y
        elif not self._dispensing_done:
            self._request_code = FDARequestCodes.SET_DISPENSING_DONE
        elif self._is_arrive_table_target:
            self._request_code = FDARequestCodes.SET_TO_COLLECT_MORE_INGREDIENTS
        else:
            self.move_table_to_target()

    def _departing_state_actions(self) -> None:
        pass

    def _cup_refilling_state_actions(self) -> None:
        if self._cups_in_tower == 0:
            self._error_code = FDAErrors.CUP_TOWER_EMPTY
        self._request_code = FDARequestCodes.SET_CUP_TOWER_REFILLING_DONE


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
        self._cylinder_refill_done = False

        self._startup = True
        self._cylinder_load_levels = [100 for _ in range(25)]

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
        self._cylinder_refill_done = False

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
            MasterFDARequestCodes.SET_ENTER_REFILLING: self._set_enter_refill,
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
            FDARequestCodes.SET_CYLINDER_REFILLING_DONE: self._set_refill_done,
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

    def _set_enter_refill(self, data: int) -> ComponentReceiveResponses:
        """Handler MainController request 9"""
        self._cylinder_refill_done = bool(data)
        if bool(data):
            self.go_to_refill()
        return ComponentReceiveResponses.CONFIRMED

    def _set_refill_done(self, data: int) -> ComponentReceiveResponses:
        """Handler MainController FDA request 4"""
        self._cylinder_refill_done = bool(data)
        return ComponentReceiveResponses.CONFIRMED

    """
    Physical functions
    """

    @property
    def _is_desire_cylinder_need_refill(self) -> bool:
        if (
            self._dispensing_weight is not None
            and self._dispensing_cylindar_number is not None
            and self._cylinder_load_levels[self._dispensing_cylindar_number - 1]
            < self._dispensing_weight
        ):
            return True
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
                "source": [
                    FDADispenserStates.DISPENSING,
                    FDADispenserStates.CYLINDER_REFILLING,
                ],
                "dest": FDADispenserStates.STANDBY,
                "before": "_reset",
            },
            {
                "trigger": "go_to_refill",
                "source": "*",
                "dest": FDADispenserStates.CYLINDER_REFILLING,
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
            and not self._is_desire_cylinder_need_refill
        ):
            self.go_to_weight()

        elif self.is_WEIGHTING() and self._is_weighting_done and self._is_cup_arrived:
            self.go_to_dispense()

        elif (self.is_DISPENSING() and self._is_dispensing_done) or (
            self.is_CYLINDER_REFILLING() and self._cylinder_refill_done
        ):
            self.go_to_standby()

    @property
    def _state_actions(self) -> Dict:
        """Actions to execute in each states"""
        return {
            FDADispenserStates.STANDBY: self._standby_state_actions,
            FDADispenserStates.WEIGHTING: self._weighting_state_actions,
            FDADispenserStates.DISPENSING: self._dispensing_state_actions,
            FDADispenserStates.CYLINDER_REFILLING: self._cylinder_refill_state_actions,
        }

    def _standby_state_actions(self) -> None:
        self._request_code = FDARequestCodes.NO_REQUEST
        if self._dispensing_cylindar_number is None:
            self._request_code = FDARequestCodes.SET_DISPENSING_CYLINDER_NUMBER
        elif self._dispensing_weight is None:
            self._request_code = FDARequestCodes.SET_DISPENSING_WEIGHT

        # Check if there is enough ingredient in cylinder
        if self._is_desire_cylinder_need_refill:
            self._error_code = FDAErrors.CYLINDER_NEED_REFILL
        else:
            self._error_code = FDAErrors.NO_ERROR

    def _weighting_state_actions(self) -> None:
        self._request_code = FDARequestCodes.NO_REQUEST
        if not self._is_cup_arrived:
            self._request_code = FDARequestCodes.SET_CUP_IS_ARRIVED_CYLINDER

    def _dispensing_state_actions(self) -> None:
        if self._dispensed_weight < self._dispensing_weight:
            self._dispensed_weight = self._dispensing_weight
            self._cylinder_load_levels[
                self._dispensing_cylindar_number
            ] -= self._dispensing_weight

    def _cylinder_refill_state_actions(self) -> None:
        self._request_code = FDARequestCodes.NO_REQUEST
        if not self._cylinder_refill_done:
            self._request_code = FDARequestCodes.SET_CYLINDER_REFILLING_DONE
