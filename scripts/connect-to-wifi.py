'''
This script is intended to be executed separate from app.py

It's only goal is to connect to the configured wifi in the .env

@author Jose Taira<jose_taira@yahoo.com>
'''

from wireless import Wireless
from dotenv import load_dotenv

import os
import logging
import traceback

CURR_FILE_PATH=os.path.dirname(os.path.realpath(__file__))
LOG_FILE=CURR_FILE_PATH + '/connect-to-wifi.log'
DOTENV_PATH = CURR_FILE_PATH + '/../.env'

# Load .env
load_dotenv(DOTENV_PATH)
# Create logfile
logging.basicConfig(filename=LOG_FILE)

def connect():
    WIFI_SSID = os.getenv('WIFI_SSID')
    WIFI_PASSPHRASE = os.getenv('WIFI_PASSPHRASE')

    if not WIFI_SSID or not WIFI_PASSPHRASE:
        print('WIFI_SSID or WIFI_PASSPHRASE not set in .env. NOOP')
        return

    wire = Wireless()

    if wire.current() == WIFI_SSID:
        print('Already connected to [' + WIFI_SSID + ']')
        return

    is_connected = False
    tries = 0

    while not is_connected and tries < 3:

        is_connected = wire.connect(ssid=WIFI_SSID, password=WIFI_PASSPHRASE)

        if is_connected:
            print('Successfully connected to [' + WIFI_SSID + ']')
        else:
            print('Failed to connect to [' + WIFI_SSID + ']')
            tries = tries + 1
    
    if not is_connected:
        raise Exception('Unable to connect to [' + WIFI_SSID + '] after 3 tries')

try:
    connect()
except Exception as e:
    logging.error(traceback.format_exc())