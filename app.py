from flask import Flask

app = Flask(__name__)
app.config.from_envvar('APP_SETTINGS')


@app.route('/')
def hello_world():
    return 'Hello World!' + app.config['ENV']


if __name__ == '__main__':
    app.run()
