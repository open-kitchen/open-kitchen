from enum import IntEnum, Enum


class EnhanceEnum(Enum):
    """An enhance enumeration with some extra methods"""

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
