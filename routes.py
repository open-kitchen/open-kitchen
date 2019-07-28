from Authentication.authentication import AuthenticationController, AuthenticationService
from Modules.RunnerModule.Controllers.RunnerController import RunnerController, RunnersController
from Modules.DishModule.Controllers.DishController import DishesController, DishController
from Modules.WokModule.Controllers.WokController import WoksController, WokController
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
        cls.api_reference.add_resource(RunnerController, '/runner/<runner_id>')

        # dishes endpoints
        cls.api_reference.add_resource(DishesController, '/dishes')
        cls.api_reference.add_resource(DishController, '/dish/<dish_id>')

        # # woks endpoints
        cls.api_reference.add_resource(WoksController, '/woks')
        cls.api_reference.add_resource(WokController, '/wok/<wok_id>')
