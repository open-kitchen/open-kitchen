from flask import Flask

app = Flask(__name__)
app.config.from_envvar('APP_SETTINGS')

ENV = app.config['ENV']
SERVER_URL = app.config['SERVER_URL']
AUTH_EMAIL = app.config['AUTH_EMAIL']
AUTH_PASSWORD = app.config['AUTH_PASSWORD']
TOKEN = ''


class Config:
    ENV = ENV
    SERVER_URL = SERVER_URL
    AUTH_EMAIL = AUTH_EMAIL
    AUTH_PASSWORD = AUTH_PASSWORD
    TOKEN = TOKEN

    @classmethod
    def set_token(cls, token):
        cls.TOKEN = token

    @classmethod
    def get_token(cls):
        return cls.TOKEN
