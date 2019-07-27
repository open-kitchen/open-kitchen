import requests
from config import Config
import json


class DishService:
    dishes_in_queue = []

    @classmethod
    def get_dishes_in_queue(cls):
        return cls.dishes_in_queue

    @classmethod
    def set_dishes_in_queue(cls, dishes_in_queue):
        cls.dishes_in_queue = dishes_in_queue
