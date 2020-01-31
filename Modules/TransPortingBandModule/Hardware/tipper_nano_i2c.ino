#include <Wire.h>

const byte MY_ADRESS = 31;

int Solenoid1 = 5;          // solenoid for to hold cup in the tipper
int Tipper1Right = 8;
int Tipper1Left = 9;     // two signals for motor for turnaround
int SensorTipper1 = 12;
int i;
int CupPresence1;       // High is without cup
int pinOut = 0;
  int estado = 0;

void setup() 
{
  Wire.begin (MY_ADRESS); // We connect this device to the I2C bus with address 31
  Wire.onReceive(receiveEvent); // We register the event upon receiving data
Serial.begin(9600); // We start the serial monitor to monitor the communication

  pinMode(Tipper1Right,OUTPUT); // variables as output
  pinMode(Tipper1Left,OUTPUT);
    pinMode(Solenoid1,OUTPUT);

    pinMode(SensorTipper1,INPUT_PULLUP);        // variables as input
    digitalWrite (Tipper1Right,HIGH);
  digitalWrite (Tipper1Left,HIGH);
    digitalWrite (Solenoid1,HIGH);

      analogWrite (i, 0);               // i is used for counters 
}

   void loop() 
{
  
}


// Function that is executed whenever master data is received
// as long as the endTransmission statement is executed in the master
// receive all the information we have passed through the Wire.write statement
void receiveEvent(int howMany) {
 
  // Si hay un byte disponible
  if (Wire.available() == 1)
  {
    TIPPER1 ();             // Go to subrutine pusher
  }
 }



void TIPPER1 ()       // subrutine pusher 
{
  digitalWrite (Tipper1Left,LOW); // tipper go to overturn the foot in the wok
  digitalWrite (Tipper1Right,HIGH);
    Serial.println ("Tipper 1 spinning 1");
  delay (580);
    
  digitalWrite (Tipper1Right,LOW);  // reverse the turn of the tipper 
  digitalWrite (Tipper1Left,HIGH);  // tipper with cup without food go to giving out cup
    Serial.println ("Tipper 1 return");
  delay (930);
  
  digitalWrite (Tipper1Right,HIGH); // tipper wait that the cup out
  digitalWrite (Tipper1Left,HIGH);
    Serial.println ("Tipper 1 giving out cup");
  digitalWrite (Solenoid1,LOW);     // solenoid assures that cup leave the tipper

  delay (1500);
  digitalWrite (Solenoid1,HIGH);
  delay(500);
 
  digitalWrite (Tipper1Left,LOW); // tipper return to home 
  digitalWrite (Tipper1Right,HIGH);
  SensorTipper1 == 1;             // rutine of read sensor of tipper at 0 point 
  for (i=0;i<=230;i++){
      SensorTipper1 = digitalRead(SensorTipper1);
  Serial.println(SensorTipper1);
   if (SensorTipper1 == 0) {
   i=579;
   }
  }
 
    Serial.println ("Tipper 1 to HOME");
  digitalWrite (Tipper1Right,HIGH); // tipper finished and stoped 
  digitalWrite (Tipper1Left,HIGH);
    Serial.println ("Tipper 1 at HOME");
 
}
