#!/bin/bash

# This script assumes the following files are in the same directory as this
# - init.sh
# - config.sh

CURRENT_SCRIPTS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
LOG_FILE=init.log

# Run configurations
. $CURRENT_SCRIPTS_DIR/config.sh

if [ -d $OPEN_KITCHEN_SCRIPTS_PATH ]
then
    echo "[SKIP] Creating $OPEN_KITCHEN_SCRIPTS_PATH"
else
    echo "[EXEC] Creating $OPEN_KITCHEN_SCRIPTS_PATH"
    mkdir $OPEN_KITCHEN_SCRIPTS_PATH
    echo "[EXEC] Copying contents of $CURRENT_SCRIPTS_DIR to $OPEN_KITCHEN_SCRIPTS_PATH"
    cp -r $CURRENT_SCRIPTS_DIR $OPEN_KITCHEN_SCRIPTS_PATH/..
    chmod +x $OPEN_KITCHEN_SCRIPTS_PATH/*.sh
fi

# Create the logs folder:
if [ ! -d ~/logs ]
then
    mkdir ~/logs
fi

echo "[EXEC] Try Installing cron, git, curl and build dependencies"
sudo apt-get update -y >> $LOG_FILE
sudo apt-get install cron git curl build-essential tk-dev libncurses5-dev libncursesw5-dev libreadline6-dev libdb5.3-dev libgdbm-dev libsqlite3-dev libssl-dev libbz2-dev libexpat1-dev liblzma-dev zlib1g-dev libffi-dev -y >> $LOG_FILE

# Create and clone the repository
if [ -d $OPEN_KITCHEN_PATH ]
then
    echo "[SKIP] Cloning repository to $OPEN_KITCHEN_PATH, branch: $OPEN_KITCHEN_BRANCH, from: $OPEN_KITCHEN_REPO_URL"
else
    echo "[EXEC] Cloning repository to $OPEN_KITCHEN_PATH, branch: $OPEN_KITCHEN_BRANCH, from: $OPEN_KITCHEN_REPO_URL"
    git clone -b $OPEN_KITCHEN_BRANCH $OPEN_KITCHEN_REPO_URL $OPEN_KITCHEN_PATH
    git checkout $OPEN_KITCHEN_PATH
fi

if [ -d $OPEN_KITCHEN_PATH ]
then
    # Attempt to copy only if the .env does not exist
    if [ -f "$OPEN_KITCHEN_PATH/.env" ]
    then
        echo "[SKIP] Copying .env to $OPEN_KITCHEN_PATH"
    else
        echo "[EXEC] Copying .env to $OPEN_KITCHEN_PATH"
        if [ -f $CURRENT_SCRIPTS_DIR/.env ]
        then
            cp $OPEN_KITCHEN_SCRIPTS_PATH/.env $OPEN_KITCHEN_PATH/.env
        else
            echo "[FAIL] $CURRENT_SCRIPTS_DIR/.env does not exist. Cannot copy"
        fi
    fi

    # Same for settings.cfg
    if [ -f "$OPEN_KITCHEN_PATH/settings.cfg" ]
    then
        echo "[SKIP] Copying settings.cfg to $OPEN_KITCHEN_PATH"
    else
        echo "[EXEC] Copying settings.cfg to $OPEN_KITCHEN_PATH"
        if [ -f $CURRENT_SCRIPTS_DIR/settings.cfg ]
        then
            cp $OPEN_KITCHEN_SCRIPTS_PATH/settings.cfg $OPEN_KITCHEN_PATH/settings.cfg
        else
            echo "[FAIL] $CURRENT_SCRIPTS_DIR/settings.cfg does not exist. Cannot copy"
        fi
    fi
else
    echo "[SKIP] Copying .env from $OPEN_KITCHEN_SCRIPTS_PATH to $OPEN_KITCHEN_PATH"
    echo "[SKIP] Copying settings.cfg from $OPEN_KITCHEN_SCRIPTS_PATH to $OPEN_KITCHEN_PATH"
    echo "------ Path: $OPEN_KITCHEN_PATH does not exist"
fi
    
if type python3 && (python3 --version | grep 3.7)
then
    INSTALLED_PYTHON=python3 --version
    echo "[SKIP] Installing Python 3.7.2"
    echo "------ $INSTALLED_PYTHON already installed"
else
    # Install Python3.7.2 and make an alias to it
    echo "[EXEC] Installing Python 3.7.2"
    wget https://www.python.org/ftp/python/3.7.2/Python-3.7.2.tar.xz
    tar xf Python-3.7.2.tar.xz
    cd Python-3.7.2
    echo "------ Configuring..."
    ./configure >> $LOG_FILE
    echo "------ Making..."
    make -j 4 >> $LOG_FILE
    echo "------ altinstalling..."
    sudo make altinstall

    echo "alias python3='python3.7'" >> ~/.bashrc
fi

# .bashrc changes
if grep "export APP_SETTINGS" ~/.bashrc
then
    echo "[SKIP] Adding APP_SETTINGS export to .bashrc"
else
    echo "[EXEC] Adding APP_SETTINGS export to .bashrc"
    echo "export APP_SETTINGS=$OPEN_KITCHEN_PATH/settings.cfg" >> ~/.bashrc
fi

if grep "$OPEN_KITCHEN_SCRIPTS_PATH/startup.sh" ~/.bashrc
then
    echo "[SKIP] Adding $OPEN_KITCHEN_SCRIPTS_PATH/startup.sh to .bashrc"
else
    echo "[EXEC] Adding $OPEN_KITCHEN_SCRIPTS_PATH/startup.sh to .bashrc"
    echo "$OPEN_KITCHEN_SCRIPTS_PATH/startup.sh &" >> ~/.bashrc
fi

# Will install python3
if type pip3
then
    echo "[SKIP] Installing pip3"
    echo "------ pip3 already exists"
else
    echo "[EXEC] Installing pip3"
    wget https://bootstrap.pypa.io/get-pip.py
    python3 get-pip.py
    echo "[ OK ] pip3 Installed"
fi

# Install all python dependencies:
if [ -f $OPEN_KITCHEN_PATH/requirements.txt ]
then
    echo "[EXEC] Trying to install open-kitchen python dependencies via pip3"
    pip3 --timeout 1000 --retries 50 install -r $OPEN_KITCHEN_PATH/requirements.txt
    echo "[ OK ] Python dependencies installed"
else
    echo "[SKIP] Trying to install open-kitchen python dependencies via pip3"
    echo "------ Could not find $OPEN_KITCHEN_PATH/requirements.txt"
fi

# Will be used to connect to wifi:
if crontab -l | grep health-check.sh
then
    echo "[SKIP] Register cron health-check"
else
    echo "[EXEC] Register cron health-check"
    (crontab -l 2>/dev/null; echo "*/1 * * * * $OPEN_KITCHEN_SCRIPTS_PATH/health-check.sh") | crontab -
    sudo systemctl enable cron
    sudo service cron start
fi

if ps -ef | grep "[a]pp.py"
then
    echo "[SKIP] Executing $OPEN_KITCHEN_SCRIPTS_PATH/startup.sh"
    echo "------ Already running"
else
    echo "[EXEC] Executing $OPEN_KITCHEN_SCRIPTS_PATH/startup.sh"
    export APP_SETTINGS=$OPEN_KITCHEN_PATH/settings.cfg
    $OPEN_KITCHEN_SCRIPTS_PATH/startup.sh &
fi

read -p "Press [Enter] to continue..."