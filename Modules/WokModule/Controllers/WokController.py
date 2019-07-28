from flask_restful import Resource, reqparse
import requests
from flask import request
import json
from config import Config


class WoksController(Resource):

    def get(self):
        content = request.json
        return content

    def post(self):
        content = request.json

        return content


class WokController(Resource):

    def get(self, wok_id):
        content = request.json
        return content

    def put(self, wok_id):
        content = request.json
        return content

    def delete(self, wok_id):
        pass
