int Pusher1Right = 12;       // declaration of variables
int Pusher1Left = 11;
int Pusher2Right = 10;      // two signals for motor for turnaround
int Pusher2Left = 9;
int Pusher3Right = 8;
int Pusher3Left = 7;
int Solenoid1 = 6;          // solenoid for to hold cup in the tipper
int Solenoid2 = 4;

int Solenoid3 = 3;
int Conveyor = 5;           //main conveyor
int Tipper3Right = 14;
int Tipper3Left = 15;     // two signals for motor for turnaround
int Tipper2Right = 16;
int Tipper2Left = 17;
int Tipper1Right = 18;
int Tipper1Left = 19;

int SensorPusher1 = 21;   // Sensor of presence of cup in the conveyor
int SensorPusher2 = 22;
int SensorPusher3 = 23;

int StartSauces =24;     // signal to runner 
long AdressWok = A0;    //  adress for cup to wok 
long AdressWokRunner =A1; // return the adress to runner

int i;
const int SensorPusher;

void setup() 
{
  Serial.begin(9600);
  pinMode(Conveyor,OUTPUT);         // variables with output
  pinMode(Pusher1Right,OUTPUT);
  pinMode(Pusher1Left,OUTPUT);
  pinMode(Pusher2Right,OUTPUT);
  pinMode(Pusher2Left,OUTPUT);
  pinMode(Pusher3Right,OUTPUT);
  pinMode(Pusher3Left,OUTPUT);
  pinMode(Tipper1Right,OUTPUT);
  pinMode(Tipper1Left,OUTPUT);
  pinMode(Tipper2Right,OUTPUT);
  pinMode(Tipper2Left,OUTPUT);
  pinMode(Tipper3Right,OUTPUT);
  pinMode(Tipper3Left,OUTPUT);
  pinMode(Solenoid1,OUTPUT);
  pinMode(Solenoid2,OUTPUT);
  pinMode(Solenoid3,OUTPUT);

  pinMode (AdressWokRunner, OUTPUT);
  pinMode (StartSauces, OUTPUT);
  
  pinMode(SensorPusher1,INPUT);        // variables with input
  pinMode(SensorPusher2,INPUT);
  pinMode(SensorPusher3,INPUT);
  pinMode(AdressWok,INPUT);
  
  digitalWrite (Conveyor,HIGH);       // outputs in High, because the relays works inverted 
  digitalWrite (Pusher1Right,HIGH);
  digitalWrite (Pusher1Left,HIGH);
  digitalWrite (Pusher2Right,HIGH);
  digitalWrite (Pusher2Left,HIGH);
  digitalWrite (Pusher3Right,HIGH);
  digitalWrite (Pusher3Left,HIGH);
  digitalWrite (Tipper1Right,HIGH);
  digitalWrite (Tipper1Left,HIGH);
  digitalWrite (Tipper2Right,HIGH);
  digitalWrite (Tipper2Left,HIGH);
  digitalWrite (Tipper3Right,HIGH);
  digitalWrite (Tipper3Left,HIGH);
  digitalWrite (Solenoid1,HIGH);
  digitalWrite (Solenoid2,HIGH);
  digitalWrite (Solenoid3,HIGH);
  
  digitalWrite (StartSauces, LOW);     
  analogWrite (AdressWokRunner, 0);
  analogWrite (i, 0);               // i is used for counters 
  
}
   void loop() 
{
  digitalWrite (Conveyor,LOW); // conveyor power on 
   Serial.println("Start Conveyor");
 
  ADRESS_WOK (); // subrutine for know the adress detination of the new cup
}
void ADRESS_WOK ()                // subrutine for know the adress to destination of the new cup 
{
  
  AdressWok = analogRead (A0);   // read the input (this signal will be from the Rasp
      Serial.println("Asks adress Wok");
      Serial.println(AdressWok);  // adress is 100 to 400 wok 1, 401 to 599 wok 2 and 600 to 1000 wok 3
  
    if (AdressWok > 100 && AdressWok <399) 
  { 
      Serial.println("Wok 1");
      INFRARED1 ();               // go to subrutine infrared 
  }
    
    if (AdressWok > 400 && AdressWok <600)
  { 
    Serial.println("Wok 2");
  INFRARED2 ();
    }
    
    if (AdressWok > 600 && AdressWok <1000)
    {
      Serial.println("Wok 3");
  INFRARED3 ();
}
}

void INFRARED1 (){ // subrutine to view a cup in conveyor and depend of detination

int CupPresence1 =HIGH;       // High is without cup
     CupPresence1 = digitalRead(SensorPusher1);
     
  if (CupPresence1 == LOW)  // ask if view a cup in conveyor 
    {
      Serial.println("Cup detected ");
    CupPresence1 = HIGH;
    PUSHER1 ();             // Go to subrutine pusher
  }
  
  else{
    Serial.println("Clear"); //if not view a cup read again the sensor 
        INFRARED1 ();
     
    }
}

void INFRARED2 (){

int CupPresence2 = HIGH; 
     CupPresence2 = digitalRead(SensorPusher2);
     
  if (CupPresence2 == LOW)
    {
        Serial.println("Cup detected2!!");
  
    CupPresence2 = HIGH;
    PUSHER2 ();
  }
  
  else{
        Serial.println("Clear");
           INFRARED2 ();
      } 
 }
  
  void INFRARED3 (){
    
  int CupPresence3 = HIGH; 
      CupPresence3 = digitalRead(SensorPusher3);
      
       if (CupPresence3 == LOW)
          {
            Serial.println(" Cup detected 3!!");
                    
          CupPresence3 = HIGH;
          PUSHER3 ();
          }
  
       else{
            Serial.println("clear");
            INFRARED3 ();
     
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
  delay (4000);
  digitalWrite (Solenoid1,LOW);     // solenoid it allows the cup enter to the tipper
  delay (3400);
  
  digitalWrite (Pusher1Right,HIGH); // pusher finished the travel
  digitalWrite (Pusher1Left,HIGH);
  delay (1);
  
  digitalWrite (Solenoid1,HIGH);   // solenoid assures the cup in the tipper
  delay (10);
  digitalWrite (Pusher1Right,LOW); // pusher return to the home
  digitalWrite (Pusher1Left,HIGH);
    Serial.println("Pusher 1 enter");
  delay (7050);
  
  digitalWrite (Pusher1Right,HIGH); // pusher stoped at initial position
  digitalWrite (Pusher1Left,HIGH);
  Serial.println("Pusher 1 at HOME");
  
  digitalWrite (Tipper1Left,LOW); // tipper go to overturn the foot in the wok
  delay (10);
  digitalWrite (Tipper1Right,HIGH);
    Serial.println ("Tipper 1 spinning 1");
  delay (580);
    
  digitalWrite (Tipper1Right,LOW);  // reverse the turn of the tipper 
  digitalWrite (Tipper1Left,HIGH);  // tipper with cup without food go to giving out cup
    Serial.println ("Tipper 1 return");
  delay (930);
  
  digitalWrite (StartSauces, HIGH); // signal to runner for dispense sauces in the wok
  analogWrite (AdressWokRunner, 100); // adress of the wok
  
  digitalWrite (Tipper1Right,HIGH); // tipper wait that the cup out
  digitalWrite (Tipper1Left,HIGH);
    Serial.println ("Tipper 1 giving out cup");
  digitalWrite (Solenoid1,LOW);     // solenoid assures that cup leave the tipper

  delay (1500);
  digitalWrite (Solenoid1,HIGH);
  delay(500);
  digitalWrite (StartSauces, LOW); // signal for the runner return to low
  analogWrite (AdressWokRunner,0);

    digitalWrite (Tipper1Left,LOW); // tipper return to home 
    delay (2);
  digitalWrite (Tipper1Right,HIGH);
    Serial.println ("Tipper 1 to HOME");
  delay (415);
    
  digitalWrite (Tipper1Right,HIGH); // tipper finished and stoped 
  digitalWrite (Tipper1Left,HIGH);
    Serial.println ("Tipper 1 at HOME");
 
}
  
void PUSHER2 ()
{
  delay (480);
  
    Serial.println("Have a Cup 2");
  digitalWrite (Conveyor,HIGH);
  digitalWrite (Pusher2Right,HIGH);
  digitalWrite (Pusher2Left,LOW);
    Serial.println("Pusher 2 out");
  delay (3650);
    
  digitalWrite (Pusher2Right,LOW);
  digitalWrite (Pusher2Left,HIGH);
    Serial.println("Pusher 2 enter");
  delay (2680);
  digitalWrite (Solenoid2,LOW);
delay (1000);
digitalWrite (Pusher2Right,HIGH);
  digitalWrite (Pusher2Left,HIGH);
  
digitalWrite (Solenoid2,HIGH);
  digitalWrite (Tipper2Right,HIGH);
  digitalWrite (Tipper2Left,LOW);
    Serial.println("Tipper 2 spinning");
  delay (500);
    
  digitalWrite (Tipper2Right,LOW);
  digitalWrite (Tipper2Left,HIGH);
    Serial.println("Tipper 2return");
  delay (800);

  digitalWrite (StartSauces, HIGH);
  analogWrite (AdressWokRunner, 400);
    
  digitalWrite (Tipper2Right,HIGH);
  digitalWrite (Tipper2Left,HIGH);
    Serial.println("Tipper 2 giving out cup");
  digitalWrite (Solenoid2,LOW);
  delay (1500);
  digitalWrite (Solenoid2,HIGH);
  
  digitalWrite (StartSauces, LOW);
  analogWrite (AdressWokRunner, 0);

   digitalWrite (Tipper2Right,HIGH);
  digitalWrite (Tipper2Left,LOW);
    Serial.println("Tipper 2 to HOME");
  delay (370);
  
  digitalWrite (Tipper2Right,HIGH);
  digitalWrite (Tipper2Left,HIGH);
    Serial.println("Tipper 2 at HOME");
    
}void PUSHER3 ()
{
  delay (480);
  
    Serial.println("Have a Cup 3");
  digitalWrite (Conveyor,HIGH);
  digitalWrite (Pusher3Right,HIGH);
  digitalWrite (Pusher3Left,LOW);
    Serial.println("Pusher 3 out");
  delay (2650);
    
  digitalWrite (Pusher3Right,LOW);
  digitalWrite (Pusher3Left,HIGH);
    Serial.println("Pusher 3 enter");
  delay (1250);
  digitalWrite (Solenoid3,LOW);
delay (1000);
digitalWrite (Pusher3Right,HIGH);
  digitalWrite (Pusher3Left,HIGH);
  
digitalWrite (Solenoid3,HIGH);
  digitalWrite (Tipper3Right,HIGH);
  digitalWrite (Tipper3Left,LOW);
    Serial.println("Tipper 3 spinning");
  delay (600);
    
  digitalWrite (Tipper3Right,LOW);
  digitalWrite (Tipper3Left,HIGH);
    Serial.println("Tipper 3 return");
  delay (1000);

  digitalWrite (StartSauces, HIGH);
  analogWrite (AdressWokRunner, 400);
    
  digitalWrite (Tipper3Right,HIGH);
  digitalWrite (Tipper3Left,HIGH);
    Serial.println("Tipper 3 giving out cup");
  digitalWrite (Solenoid3,LOW);
  delay (1500);
  digitalWrite (Solenoid3,HIGH);
  digitalWrite (StartSauces, LOW);
  analogWrite (AdressWokRunner, 0);

   digitalWrite (Tipper3Right,HIGH);
  digitalWrite (Tipper3Left,LOW);
    Serial.println("Tipper 3 to HOME");
  delay (400);
    
  digitalWrite (Tipper3Right,HIGH);
  digitalWrite (Tipper3Left,HIGH);
    Serial.println("Tipper 3 at HOME");
  
}
 

