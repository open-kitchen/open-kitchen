from flask_restful import Resource, reqparse
import requests
from flask import request, Flask, jsonify
import json
from config import Config
from Modules.DishModule.Services.DishService import DishService
from Modules.UtilityModule.Helpers import Helpers


class DishesController(Resource):

    def get(self):
        dishes_in_queue = DishService.get_dishes_in_queue()
        return {
            "count": len(dishes_in_queue),
            "data": dishes_in_queue
        }

    def post(self):
        content = request.json

        return content


class DishController(Resource):

    def get(self, dish_id):
        element = Helpers.get_element_by_key(DishService.get_dishes_in_queue(), '_id', dish_id)
        return jsonify(element)

    def put(self, id):
        content = request.json
        return content

    def delete(self, id):
        pass
