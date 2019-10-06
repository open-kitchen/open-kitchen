#!/bin/bash

CURRENT_SCRIPTS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

# Run configurations
. $CURRENT_SCRIPTS_DIR/config.sh

if [ -d "$OPEN_KITCHEN_PATH" ]
then
    echo "[ ok ] Open Kitchen Repository exists"
else
    echo "[    ] Open Kitchen Repository exists"
fi

if type python3
then
    echo "[ ok ] Python3 installed"
else
    echo "[    ] Python3 installed"
fi

if type pip3
then
    echo "[ ok ] pip3 installed"
else
    echo "[    ] pip3 installed"
fi

status=`curl -s -o /dev/null -w "%{http_code}" http://127.0.0.1:5000`

if [ "$status" -ne "200" ]
then
    echo "[    ] app.py is running"
else
    echo "[ ok ] app.py is running"
fi