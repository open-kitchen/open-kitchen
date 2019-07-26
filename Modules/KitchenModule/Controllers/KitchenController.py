import requests
from config import Config
import json
from Modules.KitchenModule.Services.KitchenService import KitchenService
from Modules.WokModule.Services.WokService import WokService


class KitchenController:

    def __init__(self):
        pass

    @classmethod
    def init_kitchen(cls):
        dependencies = KitchenService.get_dependencies()
        if dependencies['woks']:
            WokService.set_woks(dependencies['woks'])
        return dependencies
