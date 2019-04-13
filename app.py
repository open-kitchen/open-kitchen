from flask import Flask

app = Flask(__name__)
app.config.from_envvar('APP_SETTINGS')


# must run export APP_SETTINGS=/path/settings.cfg first
# then python app.py

@app.route('/')
def hello_world():
    return 'Hello World!' + app.config['ENV']


if __name__ == '__main__':
    app.run()
