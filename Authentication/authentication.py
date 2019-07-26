from flask_restful import Resource, reqparse
import requests
import json
from config import Config


class AuthenticationController(Resource):
    # parser = reqparse.RequestParser()
    # parser.add_argument('email', type=str, required=True, help="This field cannot be blank")
    # parser.add_argument('password', type=str, required=True, help="This field cannot be blank")

    def post(self):
        # data = AuthenticationController.parser.parse_args()
        headers = {'Content-Type': 'application/json'}
        response = requests.post(Config.SERVER_URL + '/api/auth/token',
                                 data=json.dumps({"email": Config.AUTH_EMAIL, "password": Config.AUTH_PASSWORD}),
                                 headers=headers)
        Config.TOKEN = response.json()['token']
        return {"token": Config.TOKEN, "env": Config.ENV}, 201


class AuthenticationService:
    def __init__(self):
        pass

    @classmethod
    def get_auth_token(cls):
        headers = {'Content-Type': 'application/json'}
        response = requests.post(Config.SERVER_URL + '/api/auth/token',
                                 data=json.dumps({"email": Config.AUTH_EMAIL, "password": Config.AUTH_PASSWORD}),
                                 headers=headers)

        Config.set_token(response.json()['token'])

        print('token has been set ======!!!=====', Config.get_token())

        return {"token": Config.TOKEN, "env": Config.ENV}, 201
