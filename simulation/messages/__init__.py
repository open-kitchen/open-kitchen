from collections import OrderedDict
from enum import Enum


class EnhanceEnum(Enum):
    """An enhance enumeration with some extra methods"""

    @classmethod
    def values(cls):
        return [v.value for v in cls]

    @classmethod
    def names(cls):
        return [v.name for v in cls]

    @classmethod
    def members(cls):
        return [v for v in cls]


class OKComponentCodeEnum(int, EnhanceEnum):
    """Advance component enum that could find the enum description"""

    @classmethod
    def set_description(cls, request_desc):
        code_desc_map = {}
        for k, v in request_desc.items():
            request_code = getattr(cls, k, None)
            if request_code is not None:
                code_desc_map[request_code] = v
        setattr(cls, "request_desc", code_desc_map)

    def get_description(self):
        request_code = self.value
        return self.request_desc.get(
            request_code, f"No description for code {request_code} in {self.__class__}"
        )


class CodeDescMap(OrderedDict):
    def __add__(self, another):
        return OrderedDict(list(self.items()) + list(another.items()))
