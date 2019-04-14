from flask import Flask, jsonify
from flask_restful import Resource, Api, reqparse
from flask_jwt import JWT, jwt_required
from config import Config
from Authentication.authentication import AuthenticationController

app = Flask(__name__)
api = Api(app)


# must run export APP_SETTINGS=/path/settings.cfg first
# then python app.py

@app.route('/')
def hello():
    data = {"token": Config.TOKEN}
    return jsonify(data)


api.add_resource(AuthenticationController, '/authenticate')

if __name__ == '__main__':
    app.run()
