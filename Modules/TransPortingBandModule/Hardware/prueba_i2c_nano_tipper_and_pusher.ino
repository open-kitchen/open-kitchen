#include <Wire.h>
#define DEBUG 0

#define SLAVE_ADDRESS 0x21
String dataBuffer = "";

int Solenoid1 = 5;          // solenoid for to hold cup in the tipper
int Tipper1Right = 6;
int Tipper1Left = 7;     // two signals for motor for turnaround
int SensorTipper1 = 8;
int Pusher1Left = 9;
int Pusher1Right = 10;       // declaration of variables
int SensorPusher1 = 11;   // Sensor of presence of cup in the conveyor
int Conveyor = 12 ;           //main conveyor

int start_tipper_time;
int start_pusher_time;
int CupPresence1;             // High is without cup
int pinOut = 0;
int estado = 0;
int i =0;
int getcomponent = 2;         //Variables for future commands from raspberry
int getstate = 1;
int geterror = 0;
int getTipperrequest = 0;
int respondTipper = 1;
int resetTipper = 1;
int reconfigTipper = 1;
int current_time = millis();




void setup() {
{
  Wire.begin(SLAVE_ADDRESS); // We connect this device to the I2C bus with address 21
  Wire.onReceive(receiveData); // We register the event upon receiving data
  Wire.onRequest(sendData);
   if (DEBUG) {
    Serial.begin(9600); // start serial for debugging
    Serial.println("I2C Ready!");
  }
}
  
  pinMode(Conveyor,OUTPUT);         // variables as output
  pinMode(Pusher1Right,OUTPUT);
  pinMode(Pusher1Left,OUTPUT);

  pinMode(Tipper1Right, OUTPUT); // variables as output
pinMode(Tipper1Left, OUTPUT);
pinMode(Solenoid1, OUTPUT);

pinMode(SensorTipper1, INPUT_PULLUP);       // variables as input
}


void sendData() {
  Wire.write(dataBuffer.c_str());

  if (DEBUG) {
    Serial.println("Request");
    Serial.println(dataBuffer);
  }
}


void receiveData(int byteCount) {
  
  dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    if (dataBuffer == "1") {

      CupPresence1 = digitalRead(SensorPusher1);
     
  if (CupPresence1 == LOW)  // ask if view a cup in conveyor 
    {
      CupPresence1 = HIGH;
      start_tipper_time=current_time;
      getstate = 1;
      PUSHER ();              // Go to subrutine pusher
     }
    else if (dataBuffer == "2") {
      getstate = 2;
        TIPPER ();             // Go to subrutine Tipper

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
    else if (dataBuffer == "8") {
    getTipperrequest = 0;
    respondTipper = 1;
    resetTipper = 1;
    reconfigTipper = 1;
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
}




 void loop() 
{ 
 
}

    
// Function that is executed whenever master data is received
// as long as the endTransmission statement is executed in the master
// receive all the information we have passed through the Wire.write statement


  

void PUSHER ()       // subrutine pusher 
{
  int time_difference_between_start_pusher = current_time - start_pusher_time;
getcomponent = start_pusher_time;
if (time_difference_between_start_pusher <480){
   //delay (480);       //wait for the cup is in front of the pusher 
  digitalWrite (Conveyor,LOW);     // power off the conveyor
}
 time_difference_between_start_pusher = current_time - start_pusher_time;
getcomponent = start_pusher_time;
if (time_difference_between_start_pusher <7880){
digitalWrite (Conveyor,LOW);     // power off the conveyor
  Serial.println("Have a Cup 1 ");
  digitalWrite (Pusher1Right,HIGH);  // push the cup to tipper 
  digitalWrite (Pusher1Left,LOW);
    Serial.println("Pusher 1 out");
  //delay (7400);
}
 time_difference_between_start_pusher = current_time - start_pusher_time;
getcomponent = start_pusher_time;
if (time_difference_between_start_pusher <7882){
  
  digitalWrite (Pusher1Right,HIGH); // pusher finished the travel
  digitalWrite (Pusher1Left,HIGH);
  //delay (1);
}
 time_difference_between_start_pusher = current_time - start_pusher_time;
getcomponent = start_pusher_time;
if (time_difference_between_start_pusher <14932){
  digitalWrite (Pusher1Right,LOW); // pusher return to the home
  digitalWrite (Pusher1Left,HIGH);
    Serial.println("Pusher 1 enter");
  //delay (7050);
}
  digitalWrite (Pusher1Right,HIGH); // pusher stoped at initial position
  digitalWrite (Pusher1Left,HIGH);
  Serial.println("Pusher 1 at HOME");
  digitalWrite (Conveyor,LOW);     // power on the conveyor
  }



  
void TIPPER ()       // subrutine pusher
{
   int time_difference_between_start_tipper = current_time - start_tipper_time;
getcomponent = start_tipper_time;
if (time_difference_between_start_tipper <580){
  digitalWrite (Tipper1Left, LOW); // tipper go to overturn the foot in the wok
  digitalWrite (Tipper1Right, HIGH);
  Serial.println ("Tipper 1 spinning 1");
  getstate = 9;
  //delay (580);
}
  else if (time_difference_between_start_tipper >580&&time_difference_between_start_tipper <1500){
    digitalWrite (Solenoid1, HIGH); //++
    digitalWrite (Tipper1Right, LOW); // reverse the turn of the tipper
    digitalWrite (Tipper1Left, HIGH); // tipper with cup without food go to giving out cup
  Serial.println ("Tipper 1 return");
  getstate = 8;
  //delay (930);
  }
else if (time_difference_between_start_tipper >1500&&time_difference_between_start_tipper <3000){
    digitalWrite (Tipper1Right, HIGH); // tipper wait that the cup out
  digitalWrite (Tipper1Left, HIGH);
  Serial.println ("Tipper 1 giving out cup");
  getstate = 7;
  digitalWrite (Solenoid1, LOW);    // solenoid assures that cup leave the tipper

  //delay (1500);
}
  else if (time_difference_between_start_tipper >3000&&time_difference_between_start_tipper <3500){
  digitalWrite (Solenoid1, HIGH);
  //delay(500);
  }
else if (time_difference_between_start_tipper >3500&&time_difference_between_start_tipper <3600){
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
}
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

