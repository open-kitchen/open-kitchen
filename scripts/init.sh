#!/bin/bash

# This script assumes the following files are in /scripts
# - startup.sh
# - init.sh
# - requirements.txt

if [ -z "$OPEN_KITCHEN_PATH" ]
then
    OPEN_KITCHEN_PATH=/var/www
fi

echo "[APT-GET] Installing build dependencies"
sudo apt-get update -y
sudo apt-get install cron git curl build-essential tk-dev libncurses5-dev libncursesw5-dev libreadline6-dev libdb5.3-dev libgdbm-dev libsqlite3-dev libssl-dev libbz2-dev libexpat1-dev liblzma-dev zlib1g-dev libffi-dev -y

sudo systemctl enable cron

# Create and clone the repository
echo "[GIT] Cloning repository to $OPEN_KITCHEN_PATH"
git clone https://github.com/open-kitchen/open-kitchen $OPEN_KITCHEN_PATH
git checkout $OPEN_KITCHEN_PATH

if [ [ ! -f "$OPEN_KITCHEN_PATH/.env" ] && [ -f /scripts/.env ] ]
then
    echo "Copying .env from /scripts to $OPEN_KITCHEN_PATH"
    cp /scripts/.env $OPEN_KITCHEN_PATH/.env
else
    echo ".env already exist or cannot be copied from /scripts"
fi
    

# Install Python3.7.2 and make an alias to it
echo "Installing python 3.7.2"
wget https://www.python.org/ftp/python/3.7.2/Python-3.7.2.tar.xz
tar xf Python-3.7.2.tar.xz
cd Python-3.7.2
./configure
make -j 4
sudo make altinstall

# .bashrc changes
echo "Adding .bashrc changes"
echo "alias python3='python3.7'" >> ~/.bashrc
echo "export APP_SETTINGS=$OPEN_KITCHEN_PATH/setting.cfg"
echo "/scripts/startup.sh &" >> ~/.bashrc

# Will install python3
echo "Installing pip3"
wget https://bootstrap.pypa.io/get-pip.py
python3 get-pip.py

# Install all python dependencies:
echo "[Python] Installing python dependencies"
pip3 --timeout 1000 --retries 50 install -r /scripts/requirements.txt

# Will be used to connect to wifi:
# pip3 install wireless packaging

(sudo crontab -l 2>/dev/null; echo "*/1 * * * * /scripts/health-check.sh") | sudo crontab -
sudo service cron start