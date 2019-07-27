import requests
from config import Config
import json


class InventoryService:
    inventory = []
    inventory_items = []

    @classmethod
    def set_inventory(cls, inventory):
        cls.inventory = inventory

    @classmethod
    def get_inventory(cls):
        return cls.inventory

    @classmethod
    def set_inventory_items(cls, inventory_items):
        cls.inventory_items = inventory_items

    @classmethod
    def get_inventory_items(cls):
        return cls.inventory_items
