#!/bin/bash

if [ -z "$OPEN_KITCHEN_PATH" ]
then
    OPEN_KITCHEN_PATH=/var/www
fi

if [ -d "$OPEN_KITCHEN_PATH" ]
then
    echo "[ ok ] Open Kitchen Repository exists"
else
    echo "[    ] No Open Kitchen Repository"
fi

if [ which python3 ]
then
    echo "[ ok ] Python3 exists"
else
    echo "[    ] No Python3"
fi

if [ which pip3 ]
then
    echo "[ ok ] pip3 exists"
else
    echo "[    ] No pip3"
fi