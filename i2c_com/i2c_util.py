from smbus2 import SMBus, i2c_msg


class I2CDevice:
    def __init__(self, address: int) -> None:
        self.addr = address
        self._bus = SMBus(1)  # None
    
    def set_address(self, address: int) -> None:
        self.addr = address
        
    def _i2c_rw(self, msg: i2c_msg) -> None:
        with SMBus(1) as bus:
            bus.i2c_rdwr(msg)
        
    def send(self, data: str or int) -> None:
        if type(data) is str:
            data = list(data)
            data = list(map(ord, data))
        elif type(data) is int:
            data = data
        else:
            raise TypeError("Unsupport data type to send.")
            
        cmd_msg = i2c_msg.write(self.addr, data)
        self._i2c_rw(cmd_msg)
            
    def read(self, read_bytes: int = 1) -> str:
        request_msg = i2c_msg.read(self.addr, read_bytes)
        self._i2c_rw(request_msg)
        
        response = [chr(value) for value in request_msg]
        return "".join(response)
        

if __name__ == "__main__":
    i2c_device_1 = I2CDevice(0x20)
    
    cmd = "Hi, this is a test."
    print("Sending message:", cmd)
    i2c_device_1.send(cmd)
    
    print("Receive message:", i2c_device_1.read(len(cmd)))
    
