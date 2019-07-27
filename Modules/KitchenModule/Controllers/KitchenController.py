import requests
from config import Config
import json
from Modules.KitchenModule.Services.KitchenService import KitchenService
from Modules.WokModule.Services.WokService import WokService
from Modules.InventoryModule.Services.InventoryService import InventoryService


class KitchenController:

    def __init__(self):
        pass

    @classmethod
    def init_kitchen(cls):
        dependencies = KitchenService.get_dependencies()
        if dependencies['woks']:
            WokService.set_woks(dependencies['woks'])

        if dependencies['inventory']:
            InventoryService.set_inventory(dependencies['inventory'])

        if dependencies['inventoryItems']:
            InventoryService.set_inventory_items(dependencies['inventoryItems'])

        return dependencies
