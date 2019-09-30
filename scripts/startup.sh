#!/bin/bash

# 
# Script intended to always be executed on boot. It does:
# 1. Connect to the wifi
# 2. Run the open-kitchen app
#
# @author Jose Taira <jose_taira@yahoo.com>
#

if [ -z "$OPEN_KITCHEN_PATH" ]
then
    OPEN_KITCHEN_PATH=/var/www
fi

# Ensure we're connected to the wifi
python3 $OPEN_KITCHEN_PATH/scripts/connect-to-wifi.py &

# Pull latest changes
cd $OPEN_KITCHEN_PATH
git pull

python3 $OPEN_KITCHEN_PATH/app.py &> /tmp/open-kitchen.log