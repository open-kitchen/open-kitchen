'''
This script is intended to be executed separate from app.py

It's only goal is to connect to the configured wifi in the .env

@author Jose Taira<jose_taira@yahoo.com>
'''

from wireless import Wireless
from dotenv import load_dotenv

import os

def connect():
    DOTENV_PATH = os.path.dirname(os.path.realpath(__file__)) + '/../.env'

    load_dotenv(DOTENV_PATH)

    WIFI_SSID = os.getenv('WIFI_SSID')
    WIFI_PASSPHRASE = os.getenv('WIFI_PASSPHRASE')

    wire = Wireless()

    is_connected = False
    tries = 0

    while not is_connected and tries < 3:

        is_connected = wire.connect(ssid=WIFI_SSID, password=WIFI_PASSPHRASE)

        if is_connected:
            print('Successfully connected to [' + os.getenv('WIFI_SSID') + ']')
        else:
            print('Failed to connect to [' + os.getenv('WIFI_SSID') + ']')
            tries = tries + 1
    
    if not is_connected:
        raise Exception('Unable to connect to the wifi after 3 tries')

try:
    connect()
except:
    print('No driver to connect with or failed to connect too many times')