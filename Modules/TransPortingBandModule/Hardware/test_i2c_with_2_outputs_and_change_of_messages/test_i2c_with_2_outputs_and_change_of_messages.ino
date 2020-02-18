// i2c_firmware_arduino.ino
#include <Wire.h>

#define SLAVE_ADDRESS 0x20
#define DEBUG 0

// data buffer
String dataBuffer = "";
int getcomponent =3;
int getstate=9;
int actuador = 5;
int actuador1 = 6;
int tiempo = 0;
int i=0;


// Read data in to buffer.
void receiveData(int byteCount) {
  dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    if (dataBuffer == "1") {
          tiempo =1000;
      
      TIPPER1 ();             // Go to subrutine pusher
      dataBuffer = getcomponent;
    }
    else if (dataBuffer == "2") {
      tiempo =5000;
      TIPPER2 ();
      dataBuffer = getstate;
    }
  }
  
  if (DEBUG) {
    Serial.println("Receive");
    Serial.println(dataBuffer);
    char lengthStrBuff[32];
    sprintf(lengthStrBuff, "Length: %d", dataBuffer.length());
    Serial.println(lengthStrBuff);
  }
}
void TIPPER1 ()       // subrutine pusher
{
  for (i=0;i<10;i++){
digitalWrite (actuador, LOW);
delay (tiempo);
digitalWrite (actuador, HIGH);
delay (tiempo);
digitalWrite (actuador, LOW);
  }
}
void TIPPER2 ()       // subrutine pusher
{
  for (i=0;i<10;i++){
digitalWrite (actuador1, LOW);
delay (tiempo);
digitalWrite (actuador1, HIGH);
delay (tiempo);
digitalWrite (actuador, LOW);
  }
}
// Respnse to request
void sendData() {
  Wire.write(dataBuffer.c_str());
  Serial.println(dataBuffer);
   
  if (DEBUG) {
    Serial.println("Request");
    Serial.println(dataBuffer);
  }
}


/*
* Setup the Arduino
*/
void setup() {
  Wire.begin(SLAVE_ADDRESS);
  Wire.onReceive(receiveData);
  Wire.onRequest(sendData);
  pinMode(actuador,OUTPUT);
  pinMode(actuador1,OUTPUT);
  
  if (DEBUG) {
    Serial.begin(9600); // start serial for debugging
    Serial.println("I2C Ready!");
  }
}


/*
* Arduino looping
*/
void loop() {
  delay(100); // Delay for stability
}
