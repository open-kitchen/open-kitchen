#include <Wire.h>

const byte MY_ADRESS = 21;

int Conveyor = 5;           //main conveyor
int Pusher1Left = 8;
int Pusher1Right = 9;       // declaration of variables
int SensorPusher1 = 12;   // Sensor of presence of cup in the conveyor

int i;
int CupPresence1;       // High is without cup
const int SensorPusher;

int pinOut = 0;
  int estado = 0;

void setup() 
{
  Wire.begin (MY_ADRESS); // We connect this device to the I2C bus with address 21
  Wire.onReceive(receiveEvent); // We register the event upon receiving data
  Serial.begin(9600); // We start the serial monitor to monitor the communication
  
  pinMode(Conveyor,OUTPUT);         // variables as output
  pinMode(Pusher1Right,OUTPUT);
  pinMode(Pusher1Left,OUTPUT);
 
  pinMode(SensorPusher1,INPUT);        // variables as input

  digitalWrite (Conveyor,HIGH);       // outputs in High, because the relays works inverted 
  digitalWrite (Pusher1Right,HIGH);
  digitalWrite (Pusher1Left,HIGH);
  digitalWrite (CupPresence1, HIGH);
  analogWrite (i, 0);               // i is used for counters 
}


 void loop() 
{ 
 
}

    
// Function that is executed whenever master data is received
// as long as the endTransmission statement is executed in the master
// receive all the information we have passed through the Wire.write statement
void receiveEvent(int howMany) {
 
  
  if (Wire.available() == 1) // If there is a byte available
  {
    CupPresence1 = digitalRead(SensorPusher1);
     
  if (CupPresence1 == LOW)  // ask if view a cup in conveyor 
    {
      Serial.println("Cup detected ");
    CupPresence1 = HIGH;
    PUSHER1 ();             // Go to subrutine pusher
  }
  }
}

  

void PUSHER1 ()       // subrutine pusher 
{
   delay (480);       //wait for the cup is in front of the pusher 
  digitalWrite (Conveyor,HIGH);     // power of the conveyor
  Serial.println("Have a Cup 1 ");
  digitalWrite (Pusher1Right,HIGH);  // push the cup to tipper 
  digitalWrite (Pusher1Left,LOW);
    Serial.println("Pusher 1 out");
  delay (7400);
  
  digitalWrite (Pusher1Right,HIGH); // pusher finished the travel
  digitalWrite (Pusher1Left,HIGH);
  delay (1);
  
  digitalWrite (Pusher1Right,LOW); // pusher return to the home
  digitalWrite (Pusher1Left,HIGH);
    Serial.println("Pusher 1 enter");
  delay (7050);
  
  digitalWrite (Pusher1Right,HIGH); // pusher stoped at initial position
  digitalWrite (Pusher1Left,HIGH);
  Serial.println("Pusher 1 at HOME");
  
  }  
