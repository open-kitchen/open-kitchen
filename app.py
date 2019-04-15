from flask import Flask, jsonify
from flask_restful import Resource, Api, reqparse
from flask_jwt import JWT, jwt_required
from config import Config
from Authentication.authentication import AuthenticationController, AuthenticationService
from Modules.InventoryModule.InventoryController import InventoryService
import time
import atexit

# v2.x version - see https://stackoverflow.com/a/38501429/135978
# for the 3.x version
from apscheduler.schedulers.background import BackgroundScheduler
from flask import Flask

app = Flask(__name__)
api = Api(app)
AuthenticationService.get_auth_token()
dependencies = InventoryService.get_dependencies()


def print_date_time():
    print(time.strftime("%A, %d. %B %Y %I:%M:%S %p"))


scheduler = BackgroundScheduler()
scheduler.add_job(func=print_date_time, trigger="interval", seconds=3)
scheduler.start()

# Shut down the scheduler when exiting the app
atexit.register(lambda: scheduler.shutdown())


# must run export APP_SETTINGS=/path/settings.cfg first
# then python app.py

@app.route('/')
def hello():
    data = {"token": Config.TOKEN, "dependencies": dependencies}
    return jsonify(data)


api.add_resource(AuthenticationController, '/authenticate')

if __name__ == '__main__':
    app.run()
