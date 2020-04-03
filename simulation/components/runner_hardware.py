from components import ComponentSim
from components.runner_sim import RunnerSim


class ComponentHardware(ComponentSim):
    def __init__(self, address: int) -> None:
        # TODO: establish I2C communication
        self._i2c_device = I2CDevice(address)
        self.log.info(f"Established {self.__class__.__name__}({hex(address)}) at I2C address {hex(address)}")
        
    def stop(self):
        pass
        
    def request(self, request_code: int, data: int) -> int:
        # TODO: send I2C message and read I2C responses
        self._i2c_device.send(request_code, data) if data is not None
        self._i2c_device.send(request_code) 
        response = self._i2c_device.read(1)
        return response
        
        
class RunnerHardware(ComponentHardware, RunnerSim):
    pass