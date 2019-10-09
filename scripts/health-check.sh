#!/bin/bash

CURRENT_SCRIPTS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

# Run configurations
. $CURRENT_SCRIPTS_DIR/config.sh

status=`curl -s -o /dev/null -w "%{http_code}" http://127.0.0.1:5000`
echo `date` $status >> /tmp/crash_checks.log

if [ "$status" -ne "200" ]
then
    # Take any appropriate recovery action here.
	echo "webserver seems down, restarting app." >> /tmp/crash_checks.log
	$OPEN_KITCHEN_SCRIPTS_PATH/startup.sh >> /tmp/open-kitchen.log
else
    echo "webserver is running"
fi