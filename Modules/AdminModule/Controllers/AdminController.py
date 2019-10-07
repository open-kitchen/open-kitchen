from flask_restful import Resource, reqparse
import requests
from flask import request, Flask, jsonify
import json
from config import Config
from Modules.UtilityModule.Helpers import Helpers
import subprocess
from flask import request
import os

# https://stackoverflow.com/questions/15562446/how-to-stop-flask-application-without-using-ctrl-c
def shutdown_server():
    func = request.environ.get('werkzeug.server.shutdown')
    if func is None:
        raise RuntimeError('Not running with the Werkzeug Server')
    func()

class AdminController(Resource):

    def post(self, hash_value):
        print('hash_value', hash_value) # This hash value can be used for validating who can post to this endpoint
        subprocess.Popen([os.getenv('OPEN_KITCHEN_SCRIPTS_PATH') + '/health-check.sh'])
        shutdown_server()

        return 'success'

