from flask import Flask

app = Flask(__name__)
app.config.from_envvar('APP_SETTINGS')


class Config:
    ENV = app.config['ENV']
    SERVER_URL = app.config['SERVER_URL']
    AUTH_EMAIL = app.config['AUTH_EMAIL']
    AUTH_PASSWORD = app.config['AUTH_PASSWORD']
    TOKEN = ''
