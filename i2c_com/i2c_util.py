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
            data = list(str)
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
        
        response = [chr(value) for value in read]
        return "".join(response)
        

if __name__ == "__main__":
    i2c_device_1 = I2CDevice(0x20)
    
    cmd = "Hi, this is a test."
    print("Sending message:", cmd)
    i2c_device_1.send(cmd)
    
    print("Receive message:", i2c_device_1.read())
    
# addres = [0x8, 0x20] # bus address
# last_cmd = [0x0, 0x0]
# 
# # # 1: Convert message content to list
# # msg = i2c_msg.write(0x20, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
# # data = list(msg)  # data = [1, 2, 3, ...]
# # print("msg len:", len(data))  # => 10
# # 
# # # 2: i2c_msg is iterable
# # for value in msg:
# #     print(value, end=" ")
# # print()
# # 
# # # 3: Through i2c_msg properties
# # for k in range(msg.len):
# #     print(msg.buf[k])
# # print()
# 
# write = i2c_msg.write(0x20, [ord('a'), ord('b')])
# read = i2c_msg.read(0x20, 5)
# 
# with SMBus(1) as bus:
#     bus.i2c_rdwr(write, read)
# 
# # 2: i2c_msg is iterable
# print("Got")
# for value in read:
#     print(value, end=" ")
# print()
# # 3: Through i2c_msg properties
# for k in range(read.len):
#     print(read.buf[k])
# print()