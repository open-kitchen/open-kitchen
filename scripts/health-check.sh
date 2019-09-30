#!/bin/bash

status=`curl -s -o /dev/null -w "%{http_code}" http://127.0.0.1:5000`
echo `date` $status >> /tmp/crash_checks.log

if [ "$status" -ne "200" ]
then
    # Take any appropriate recovery action here.
	echo "webserver seems down, restarting app." >> /tmp/crash_checks.log
	/scripts/startup.sh
else
    echo "webserver is running"
fi