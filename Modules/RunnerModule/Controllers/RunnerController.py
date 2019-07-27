from flask_restful import Resource, reqparse
import requests
from flask import request
import json
from config import Config


class RunnersController(Resource):

    def get(self):
        content = request.json
        return content

    def post(self):
        content = request.json

        return content


class RunnerController(Resource):

    def get(self, id):
        content = request.json
        return content

    def put(self, id):
        content = request.json
        return content

    def delete(self, id):
        pass

# properties:
# task => ['retrieve', 'notify', 'add_to_wok'
# dishId => we have the dishes saved in memory to use
#
