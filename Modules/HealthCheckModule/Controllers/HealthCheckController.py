from flask_restful import Resource

'''
Endpoint here will be used to determine if the server is up

@author Jose Taira <jose_taira@yahoo.com>
'''
class HealthCheckController(Resource):

    def get(self):
        return 'ok'


