import requests
from config import Config
import json


class WokService:
    woks = []

    @classmethod
    def set_woks(cls, woks):
        cls.woks = woks

    @classmethod
    def get_woks(cls):
        return cls.woks
