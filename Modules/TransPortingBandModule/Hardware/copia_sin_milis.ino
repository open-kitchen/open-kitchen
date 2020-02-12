// i2c_firmware_arduino.ino
#include <Wire.h>

#define SLAVE_ADDRESS 0x20
#define DEBUG 0

// data buffer
String dataBuffer = "";

int Solenoid1 = 5;          // solenoid for to hold cup in the tipper
int Tipper1Right = 4;
int Tipper1Left = 3;     // two signals for motor for turnaround
int SensorTipper1 = 8;

int start_tipper_time;
int CupPresence1;
int pinOut = 0;
int estado = 0;
int i =0;
int getcomponent = 0;
int getstate = 1;
int geterror = 6;
int getTipperrequest = 0;
int respondTipper = 1;
int resetTipper = 1;
int reconfigTipper = 1;
int current_time = millis();

// Read data in to buffer.
void receiveData(int byteCount) {
  

  dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    if (dataBuffer == "1") {
          
      dataBuffer = getcomponent;
      start_tipper_time=current_time;
      TIPPER1 ();             // Go to subrutine pusher
    }
    else if (dataBuffer == "2") {
      dataBuffer = getstate;
    }
    else if (dataBuffer == "3") {
         
      dataBuffer = geterror;
    }
    else if (dataBuffer == "4") {
     
      dataBuffer = getTipperrequest;
    }
    else if (dataBuffer == "5") {
      dataBuffer = respondTipper;
      
    }
    else if (dataBuffer == "6") {
      dataBuffer = resetTipper;
    }
    else if (dataBuffer == "7") {
      dataBuffer = reconfigTipper;
    }
    getTipperrequest = 0;
    respondTipper = 1;
    resetTipper = 1;
    reconfigTipper = 1;
  }

  if (DEBUG) {
    Serial.println("Receive");
    Serial.println(dataBuffer);
    char lengthStrBuff[32];
    sprintf(lengthStrBuff, "Length: %d", dataBuffer.length());
    Serial.println(lengthStrBuff);
  }
}

// Respnse to request
void sendData() {
  Wire.write(dataBuffer.c_str());

  if (DEBUG) {
    Serial.println("Request");
    Serial.println(dataBuffer);
  }
}

/*
  Setup the Arduino
*/
void setup() {

  pinMode(Tipper1Right, OUTPUT); // variables as output
pinMode(Tipper1Left, OUTPUT);
pinMode(Solenoid1, OUTPUT);

pinMode(SensorTipper1, INPUT_PULLUP);       // variables as input
digitalWrite (Tipper1Right, HIGH);
digitalWrite (Tipper1Left, HIGH);
digitalWrite (Solenoid1, HIGH);//++

analogWrite(i, 10);              // i is used for counters

  Wire.begin(SLAVE_ADDRESS);
  Wire.onReceive(receiveData);
  Wire.onRequest(sendData);

  if (DEBUG) {
    Serial.begin(9600); // start serial for debugging
    Serial.println("I2C Ready!");
  }
}

void TIPPER1 ()       // subrutine pusher
{
digitalWrite (Solenoid1, LOW);
digitalWrite (Tipper1Right, HIGH);
      delay (30000);
      digitalWrite (Solenoid1, HIGH);
      digitalWrite (Tipper1Right, LOW);
       delay (30000);
      digitalWrite (Solenoid1, LOW);
      digitalWrite (Tipper1Right, HIGH);
      delay (30000);
      digitalWrite (Solenoid1, HIGH);
      digitalWrite (Tipper1Right, LOW);
  digitalWrite (Tipper1Right, LOW);
digitalWrite (Tipper1Left, LOW);
digitalWrite (Solenoid1, LOW);//++
delay (2000);
  digitalWrite (Solenoid1, HIGH);//++
  //int time_difference_between_start_tipper = current_time - start_tipper_time;
//getcomponent = start_tipper_time;//++
//if (time_difference_between_start_tipper <580){
  digitalWrite (Solenoid1, LOW); //++
  digitalWrite (Tipper1Left, LOW); // tipper go to overturn the foot in the wok
  digitalWrite (Tipper1Right, HIGH);
  Serial.println ("Tipper 1 spinning 1");
  getstate = 9;
  delay (580);
//}
  

  //else if (time_difference_between_start_tipper >580&&time_difference_between_start_tipper <1500){
    digitalWrite (Solenoid1, HIGH); //++
    digitalWrite (Tipper1Right, LOW); // reverse the turn of the tipper
    digitalWrite (Tipper1Left, HIGH); // tipper with cup without food go to giving out cup
  Serial.println ("Tipper 1 return");
  getstate = 8;
  delay (930);
  //}
//else if (time_difference_between_start_tipper >1500&&time_difference_between_start_tipper <3000){
    digitalWrite (Tipper1Right, HIGH); // tipper wait that the cup out
  digitalWrite (Tipper1Left, HIGH);
  Serial.println ("Tipper 1 giving out cup");
  getstate = 7;
  digitalWrite (Solenoid1, LOW);    // solenoid assures that cup leave the tipper

  delay (1500);
//}
  //else if (time_difference_between_start_tipper >3000&&time_difference_between_start_tipper <3500){
    
  digitalWrite (Solenoid1, HIGH);
  delay(500);
  //}
//else if (time_difference_between_start_tipper >3500&&time_difference_between_start_tipper <3600){
    digitalWrite (Solenoid1, LOW);//++
  digitalWrite (Tipper1Left, LOW); // tipper return to home
  digitalWrite (Tipper1Right, HIGH);
  SensorTipper1 == 1;             // rutine of read sensor of tipper at 0 point
  for (i = 0; i <= 230; i++) {
    SensorTipper1 = digitalRead(SensorTipper1);
    Serial.println(SensorTipper1);
    if (SensorTipper1 == 0) {
      i = 579;
    }
  }
//}
  if (SensorTipper1 == 0) {
    digitalWrite (Solenoid1, HIGH);//++
    geterror = 0;
    Serial.println ("Tipper 1 to HOME");
    digitalWrite (Tipper1Right, HIGH); // tipper finished and stoped
    digitalWrite (Tipper1Left, HIGH);
    Serial.println ("Tipper 1 at HOME");
  }
  else {
    geterror = 1;
  }

}
/*
  Arduino looping
*/
void loop() {
  //delay(100); // Delay for stability
}
