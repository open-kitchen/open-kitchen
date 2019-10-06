#!/bin/bash

# 
# Script intended to always be executed on boot. It does:
# 1. Connect to the wifi
# 2. Run the open-kitchen app
#
# @author Jose Taira <jose_taira@yahoo.com>
#

CURRENT_SCRIPTS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

# Run configurations
. $CURRENT_SCRIPTS_DIR/config.sh

if type python3
then
    # Ensure we're connected to the wifi
    # Attempt to use the scripts path if connect to wifi doesn't exist
    # This will kill all existing wpa_supplicant, so it has the side-effect of making it seem like
    # there are no wireless interfaces
    echo "attempting to connect to wifi"
    python3 $OPEN_KITCHEN_PATH/scripts/connect-to-wifi.py &

    # Pull latest changes
    echo "pulling latest git changes"
    cd $OPEN_KITCHEN_PATH
    git pull

    python3 $OPEN_KITCHEN_PATH/app.py &>> /tmp/open-kitchen.log
    echo "app.py is running"
else
    echo "python3 not yet installed. Skipping current run"
fi