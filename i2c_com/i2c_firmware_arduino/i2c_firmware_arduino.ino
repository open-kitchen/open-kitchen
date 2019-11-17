// i2c_firmware_arduino.ino
#include <Wire.h>

#define SLAVE_ADDRESS 0x20

// data buffer
String dataBuffer = "";


// Read data in to buffer.
void receiveData(int byteCount) {
  dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
  }
  Serial.println("Receive");
  Serial.println(dataBuffer);
  char lengthStrBuff[32];
  sprintf(lengthStrBuff, "Length: %d", dataBuffer.length());
  Serial.println(lengthStrBuff);
}


// Respnse to request
void sendData() {
  Serial.println("Request");
  Serial.println(dataBuffer);
  Wire.write(dataBuffer.c_str());
}


/*
* Setup the Arduino
*/
void setup() {
  Wire.begin(SLAVE_ADDRESS);
  Wire.onReceive(receiveData);
  Wire.onRequest(sendData);
  
  Serial.begin(9600); // start serial for debugging
  Serial.println("I2C Ready!");
}


/*
* Arduino looping
*/
void loop() {
  delay(100); // Delay for stability
}
