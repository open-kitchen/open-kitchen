from Authentication.authentication import AuthenticationController, AuthenticationService
from Modules.RunnerModule.Controllers.RunnerController import RunnerController, RunnersController
from config import Config
from flask import Flask, jsonify


class Router:
    app_reference = None
    api_reference = None

    def __init__(self):
        pass

    @classmethod
    def init_routes(cls, app_reference, api_reference):
        cls.app_reference = app_reference
        cls.api_reference = api_reference

        @cls.app_reference.route('/')
        def hello():
            data = {"origin": "Router", "path": '/'}
            return jsonify(data)

        # authenticate endpoints
        cls.api_reference.add_resource(AuthenticationController, '/authenticate')
        # runner endpoints
        cls.api_reference.add_resource(RunnersController, '/runners')
        cls.api_reference.add_resource(RunnerController, '/runner/<int:id>')
