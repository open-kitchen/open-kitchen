from apscheduler.schedulers.background import BackgroundScheduler
import time
from time import sleep, strftime
import atexit
import datetime

from Modules.OrderModule.Services.OrderService import OrderService
from Modules.WokModule.Services.WokService import WokService
from Modules.DishModule.Services.DishService import DishService


class BackGroundCommandsController:

    def __init__(self):
        pass

    @classmethod
    def init(cls):
        scheduler = BackgroundScheduler()

        # sync orders from server every 60 seconds to see if priorities changed
        scheduler.add_job(func=cls.sync_next_dishes_in_queue, trigger="interval", seconds=15)

        # get current dishes in queue from server every 10 seconds
        scheduler.add_job(func=cls.sync_current_orders, trigger="interval", seconds=10)

        # assign dishes to available woks
        scheduler.add_job(func=cls.add_dishes_to_woks, trigger="interval", seconds=5)

        scheduler.start()

        # Shut down the scheduler when exiting the app
        atexit.register(lambda: scheduler.shutdown())

    @classmethod
    def sync_next_dishes_in_queue(cls):
        now = datetime.datetime.now()
        # date and time params option
        # {   date: '2019-07-29',
        #     time: '12:15:00',
        #     dateTime: '2019-07-29 12:00:00'
        # }
        dishes_response = OrderService.assign_next_dishes_in_queue({
            "date": now.strftime("%m/%d/%Y, %H:%M:%S"),
        })
        print('next dishes assigned now')

    @classmethod
    def sync_current_orders(cls):
        now = datetime.datetime.now()
        dishes_response = OrderService.request_dishes_in_queue({
            "date": now.strftime("%m/%d/%Y, %H:%M:%S"),
        })
        DishService.set_dishes_in_queue(dishes_response['data'])
        print(len(DishService.get_dishes_in_queue()))
        print('sync current orders completed')

    @classmethod
    def add_dishes_to_woks(cls):
        # get woks
        # assign order to woks and notify the server about it
        # init new background schedule for a specific wok so the runner can start getting the ingredients
        print('--- add dishes to woks ---')
