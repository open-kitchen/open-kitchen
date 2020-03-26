#include <Wire.h>
#define DEBUG 0

#define SLAVE_ADDRESS 0x20
String dataBuffer = "";

int Conveyor = 4 ;                    //main conveyor
int Solenoid1 = 5;                    // solenoid for to hold cup in the tipper
int Tipper1Right = 6;
int Tipper1Left = 7;                  // two signals for motor for turnaround
int Pusher1Left = 8;
int Pusher1Right = 9;                 // declaration of variables
int SensorTipper1 = 10;
int SensorPusher1 = 11;               // Sensor of presence of cup in the conveyor

int start_tipper_time;                //timer of cicle for tipper
int start_pusher_time;                //timer of cicle for pusher
int CupPresence1;                     // High is without cup
int pinOut = 0;
int wokposition = 0;
int i =0;
int start_cicle =0;
int GetComponent = 4;                 //Variables for answer messages from raspberry
int GetState = 1;
int GetError = 0;
int GetPusherTipperRequest = 0;
int RespondTipper = 0;
int ActivatePusherTipper = 0;
int SetWok = 0;
int Setejecting = 0;
int current_time = millis();




void setup() {
 
  pinMode(Conveyor,OUTPUT);                       // variables as output
  pinMode(Pusher1Right,OUTPUT);
  pinMode(Pusher1Left,OUTPUT);

  pinMode(Tipper1Right, OUTPUT); 
pinMode(Tipper1Left, OUTPUT);
pinMode(Solenoid1, OUTPUT);

pinMode(SensorTipper1, INPUT_PULLUP);               // variables as input


  Wire.begin(SLAVE_ADDRESS);                      // We connect this device to the I2C bus with address 21
  Wire.onReceive(receiveData);                    // We register the event upon receiving data
  Wire.onRequest(sendData);


   if (DEBUG) {
    Serial.begin(9600);                           // start serial for debugging
    Serial.println("I2C Ready!");
  }
}


void sendData() {                                 //Subrutine for send data
  Wire.write(dataBuffer.c_str());
  Serial.println(dataBuffer);

  if (DEBUG) {
    Serial.println("Request");
    Serial.println(dataBuffer);
  }
}


void receiveData(int byteCount) {                  //Subrutine for receive data
  
  dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    if (dataBuffer == "1") {                      //define the order to ejecut
      GetState = 1;                     
      dataBuffer=GetComponent;
      sendData();
    }
    else if (dataBuffer == "2") {
      
      dataBuffer=GetState;                      // charge the answer to raspberry
      sendData();

     }
    else if (dataBuffer == "3") {
      dataBuffer = GetError;
      sendData();
    }
    else if (dataBuffer == "4") {
      dataBuffer = GetPusherTipperRequest;
      sendData();
    }
    else if (dataBuffer == "5") {
     dataBuffer = RespondTipper;
      sendData();
    }
    else if (dataBuffer == "6") {
      ActivatePusherTipper=1;
      dataBuffer = ActivatePusherTipper;
      sendData();
      CupPresence1 = digitalRead(SensorPusher1);
      
     
  if (CupPresence1 == LOW)                      // ask if view a cup in conveyor 
    {
      
      CupPresence1 = HIGH;
      start_tipper_time=current_time;
      
      PUSHER ();                                // Go to subrutine pusher
        TIPPER ();                              // Go to subrutine Tipper
     }
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



 void loop() 
{ 
 
}

  

void PUSHER ()                                           // subrutine pusher 
{
  int time_difference_between_start_pusher = current_time - start_pusher_time;
start_cicle = start_pusher_time;                      //count time of cicle tipper
GetState = 2;
GetPusherTipperRequest=2;
if (time_difference_between_start_pusher <480){
   //delay (480);                                       //wait for the cup is in front of the pusher 
  digitalWrite (Conveyor,LOW);                          // power off the conveyor
}
 time_difference_between_start_pusher = current_time - start_pusher_time;
start_cicle = start_pusher_time;
if (time_difference_between_start_pusher <7880){
  GetState = 3;
digitalWrite (Conveyor,LOW);                            // power off the conveyor
  Serial.println("Have a Cup 1 ");
  digitalWrite (Pusher1Right,HIGH);                     // push the cup to tipper 
  digitalWrite (Pusher1Left,LOW);
    Serial.println("Pusher 1 out");
  //delay (7400);
}
 time_difference_between_start_pusher = current_time - start_pusher_time;
start_cicle = start_pusher_time;
if (time_difference_between_start_pusher <7882){
  
  digitalWrite (Pusher1Right,HIGH);                     // pusher finished the travel
  digitalWrite (Pusher1Left,HIGH);
  //delay (1);
}
 time_difference_between_start_pusher = current_time - start_pusher_time;
start_cicle = start_pusher_time;
if (time_difference_between_start_pusher <14932){
  digitalWrite (Pusher1Right,LOW);                      // pusher return to the home
  digitalWrite (Pusher1Left,HIGH);
    Serial.println("Pusher 1 enter");
  //delay (7050);
}
  digitalWrite (Pusher1Right,HIGH);                     // pusher stoped at initial position
  digitalWrite (Pusher1Left,HIGH);
  Serial.println("Pusher 1 at HOME");
  digitalWrite (Conveyor,LOW);                          // power on the conveyor
  GetState = 1;
  }



  
void TIPPER ()                                             // subrutine pusher
{
  if (wokposition ==1){
  current_time = start_tipper_time;                      //count time of cicle tipper
   int time_difference_between_start_tipper = current_time - start_tipper_time;
start_cicle = start_tipper_time;
if (time_difference_between_start_tipper <580){
  GetState = 4;
  digitalWrite (Tipper1Left, LOW);                // tipper go to overturn the foot in the wok
  digitalWrite (Tipper1Right, HIGH);
  Serial.println ("Tipper 1 spinning 1");
  GetState = 4;
  //delay (580);
}
  else if (time_difference_between_start_tipper >580&&time_difference_between_start_tipper <1500){
    digitalWrite (Solenoid1, HIGH); 
    digitalWrite (Tipper1Right, LOW);               // reverse the turn of the tipper
    digitalWrite (Tipper1Left, HIGH);             // tipper with cup without food go to giving out cup
  Serial.println ("Tipper 1 return");
  GetState = 4;
  //delay (930);
  }
else if (time_difference_between_start_tipper >1500&&time_difference_between_start_tipper <3000){
    digitalWrite (Tipper1Right, HIGH);            // tipper wait that the cup out
  digitalWrite (Tipper1Left, HIGH);
  Serial.println ("Tipper 1 giving out cup");
  GetState = 5;
  digitalWrite (Solenoid1, LOW);                  // solenoid assures that cup leave the tipper

  //delay (1500);
}
  else if (time_difference_between_start_tipper >3000&&time_difference_between_start_tipper <3500){
  digitalWrite (Solenoid1, HIGH);
  GetState = 5;
  //delay(500);
  }
else if (time_difference_between_start_tipper >3500&&time_difference_between_start_tipper <3600){
    digitalWrite (Solenoid1, LOW);                  
  digitalWrite (Tipper1Left, LOW);                    // tipper return to home
  digitalWrite (Tipper1Right, HIGH);
  SensorTipper1 == 1;                                 // rutine of read sensor of tipper at 0 point
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
    GetError = 0;                                 //charge message of error to raspberry
    Serial.println ("Tipper 1 to HOME");
    digitalWrite (Tipper1Right, HIGH);            // tipper finished and stoped
    digitalWrite (Tipper1Left, HIGH);
    Serial.println ("Tipper 1 at HOME");
  }
 
  else {
    GetError = 1;                             //charge message of error to raspberry
  }
   GetState = 1;
  GetPusherTipperRequest=1;                  //charge message of pusher tipper request to raspberry
  }
 else if (wokposition ==0){
  GetState = 1;                             //charge message of state to raspberry
  TIPPER ();                                  // go to subrutine Tipper
 }
  
}

