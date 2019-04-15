from flask_restful import Resource
import requests
from config import Config
import json


class InventoryService:

    def __init__(self):
        pass

    @classmethod
    def get_dependencies(cls):
        headers = {'Content-Type': 'application/json', 'Authorization': 'JWT ' + Config.TOKEN}
        response = requests.get(Config.SERVER_URL + '/api/open-kitchen', headers=headers)
        return response.json()
