from apscheduler.schedulers.background import BackgroundScheduler
import time
from time import sleep, strftime
import atexit
import datetime

from Modules.OrderModule.Services.OrderService import OrderService
from Modules.WokModule.Services.WokService import WokService
from Modules.DishesModule.Services.DishService import DishService


class BackGroundCommandsController:

    def __init__(self):
        pass

    @classmethod
    def init(cls):
        scheduler = BackgroundScheduler()

        # init print_date_time every 3 seconds
        scheduler.add_job(func=cls.print_date_time, trigger="interval", seconds=3)
        scheduler.start()

        # init sync orders from server every 10 seconds
        scheduler.add_job(func=cls.sync_next_dishes_in_queue, trigger="interval", seconds=50)

        # init sync orders from server every 10 seconds
        scheduler.add_job(func=cls.sync_current_orders, trigger="interval", seconds=10)

        # Shut down the scheduler when exiting the app
        atexit.register(lambda: scheduler.shutdown())

    @classmethod
    def print_date_time(cls):
        print('...')

    @classmethod
    def sync_next_dishes_in_queue(cls):
        now = datetime.datetime.now()
        dishes_response = OrderService.request_next_dishes({
            "date": now.strftime("%m/%d/%Y, %H:%M:%S"),
        })

    @classmethod
    def sync_current_orders(cls):
        now = datetime.datetime.now()
        dishes_response = OrderService.request_dishes_in_queue({
            "date": now.strftime("%m/%d/%Y, %H:%M:%S"),

        })
        DishService.set_dishes_in_queue(dishes_response['data'])
        print('sync current orders completed')
