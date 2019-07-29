import requests
import json
from config import Config


class OrderService:
    base_path = Config.SERVER_URL + '/api/open-kitchen'
    headers = {'Content-Type': 'application/json'}

    def __init__(self):
        pass

    @classmethod
    def assign_next_dishes_in_queue(cls, params):
        path = cls.base_path + '/assign/dishes'

        cls.headers['Authorization'] = "JWT " + Config.get_token()

        response = requests.post(path,
                                 data=json.dumps(params),
                                 headers=cls.headers)
        return response.json()

    @classmethod
    def request_dishes_in_queue(cls, params):
        path = cls.base_path + '/queue/dishes'
        cls.headers['Authorization'] = "JWT " + Config.get_token()

        response = requests.get(path,
                                data=json.dumps(params),
                                headers=cls.headers)
        return response.json()

    @classmethod
    def request_dish_in_queue(cls, _id, params):
        path = cls.base_path + '/assign/dishes'

        cls.headers['Authorization'] = "JWT " + Config.get_token()
        response = requests.get(cls.base_path + '/queue/dishes/' + _id,
                                data=json.dumps(params),
                                headers=cls.headers)
        return response.json()
