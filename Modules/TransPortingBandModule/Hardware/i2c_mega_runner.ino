#include <Stepper.h>
#include <Wire.h>
#define DEBUG 0

#define SLAVE_ADDRESS 0x20
String dataBuffer = "";         // principal variable of messages from the raspberry

int start_sauces_time;          //timer for count the time of the cicle 
//int AdressWokRunner = A1;
int i = 0;
int j = 0;
int w = 0;
int k=0;
int AdressWok = 0;

int GetComponent = 3;         //Variables for future commands from raspberry
int GetState = 1;
int GetError = 0;
int RetrieveRunner = 0;
int GetRunnerrequest= 0;
int RespondRunner= 0;
int ForceRetrieve= 0;
String TargetWokId= "";
String DesireSauce= "";
int ReleaseVolume= 0;
int RefillDone= 0;
int NotifyWok= 0;
int SauceLoad= 0;
int current_time = millis();

int Adress=2;                  //define Direction pin
int Enable=3;                     //define Enable Pin
int Pulse=4;                     //Pin para la señal de pulso
const int Sauce1 = 6;             // pins to the electropumps of the sauces
const int Sauce2 = 7;
const int Sauce3 = 8;
const int Sauce4 = 9;
const int Sauce5 = 10;
const int Sauce6 = 11;
const int Sauce7 = 12;
const int Sauce8 = 13;

int SauceDown=15;               //data of the sauce if this are down
int StartSauces = 24;           //intern data of control of the sauces
int Trig = 26;                  //pulse to the sensor of quantity
int Ultrasound1 = 27;         // pins to the sensors of quantity of the sauces
int Ultrasound2 = 28;
int Ultrasound3 = 29;
int Ultrasound4 = 30;
int Ultrasound5 = 31;
int Ultrasound6 = 32;
int Ultrasound7 = 33;
int Ultrasound8 = 34;


void sendData() {                                         //Subrutine for send data
  Wire.write(dataBuffer.c_str());
Serial.println(dataBuffer);
  if (DEBUG) {
    Serial.println("Request");
    Serial.println(dataBuffer);
  }
}



void receiveData(int byteCount) {                             //Subrutine for receive data
  
  dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    if (dataBuffer != 0) {
      Runner ();                                              // call to subrutine Runner
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



void WOK1 (){                                     //Subrutine for move the runner to wok 1
  dataBuffer = 1;
      sendData();                                 //send message of status runner to raspberry
       dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    DesireSauce = dataBuffer;                   //read message of Desire sauces from raspberry
    if (DesireSauce !=0){
      volume();                                 // go to subrutine Volume
      GetState =2;
      dataBuffer=GetState;
      sendData();                              //send message of status runner to raspberry
    digitalWrite(Adress,LOW);
    for (int i=0; i<11000; i++)                //Forward 11000 steps
          {
          digitalWrite(Pulse,HIGH);             //pulses to move the runner 
          delayMicroseconds(35);
          digitalWrite(Pulse,LOW);
          delayMicroseconds(35);
          }
        Serial.print("Wok");
        Serial.println(w);
      
   for (int i=0; i<1000; i++)                   //Forward 1000 steps
      {
        digitalWrite(Pulse,HIGH);
        delayMicroseconds(150);
        digitalWrite(Pulse,LOW);
        delayMicroseconds(100);
      }
   
       Serial.print("rutina de Wok");
       Serial.println(w);
     SAUCES ();                                       //go to subrutine sauces 
}
//else {receiveData ();    }
  }
}

void WOK2 (){                                                 //Subrutine for move the runner to wok 2

  dataBuffer = 1;
      sendData();
       dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    DesireSauce = dataBuffer;
    if (DesireSauce !=0){
      volume();
      GetState =2;
      dataBuffer=GetState;
      sendData();
  digitalWrite(Adress,LOW);
   for ( j=0; j<w; j++)
   {
      for (int i=0; i<11000; i++)               //Forward 11000 steps
        {
          digitalWrite(Pulse,HIGH);
          delayMicroseconds(35);
          digitalWrite(Pulse,LOW);
          delayMicroseconds(35);
        }
   }
   for (int i=0; i<1000; i++)                     //Forward 1000 steps
      {
        digitalWrite(Pulse,HIGH);
        delayMicroseconds(150);
        digitalWrite(Pulse,LOW);
        delayMicroseconds(100);
      }
   
       Serial.print("rutina de Wok");
       Serial.println(w);
     SAUCES (); 
    }
     //else {receiveData ();    } 
}
}

void WOK3 () {                                      //Subrutine for move the runner to wok 3
  dataBuffer = 1;
      sendData();
       dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    DesireSauce = dataBuffer;
    if (DesireSauce !=0){
      volume();
      GetState =2;
      dataBuffer=GetState;
      sendData();

  digitalWrite(Adress,LOW);
  for ( j=0; j<w; j++)
   {
       for (int i=0; i<11000; i++)          //Forward 11000 steps
        {
          digitalWrite(Pulse,HIGH);
          delayMicroseconds(35);
          digitalWrite(Pulse,LOW);
          delayMicroseconds(35);
        }
   }
   for (int i=0; i<1000; i++)             //Forward 1000 steps
      {
        digitalWrite(Pulse,HIGH);
        delayMicroseconds(150);
        digitalWrite(Pulse,LOW);
        delayMicroseconds(100);
      }
   
       Serial.print("rutina de Wok");
       Serial.println(w);
     SAUCES ();  
    }
    //else {receiveData ();}
}
}

void SAUCES (){                               //Subrutine for Retrieve Runner to home
  GetState =3;
      dataBuffer=GetState;
      sendData();                            //send message of status runner to raspberry

    digitalWrite(Sauce6,LOW);               //dispens the suace
    digitalWrite(Sauce5,LOW);
    //digitalWrite(Sauce8,LOW);
    //digitalWrite(Sauce7,LOW);
    Serial.println("salsa");
    delay(2000);
       
    digitalWrite(Sauce6,HIGH);
    digitalWrite(Sauce5,HIGH);
    digitalWrite(Sauce8,HIGH);
    digitalWrite(Sauce4,HIGH);
    delay (300);
    Retrieve ();                                // go to subrutine Retrieve
}

  
 void Retrieve () {                           //Subrutine for Retrieve Runner to home
  
 
 RetrieveRunner=1;
  dataBuffer = RetrieveRunner;
      sendData();                                 //send message of retrieve runner to raspberry
       dataBuffer = "";
  
  Serial.println("retornando");
  
  digitalWrite(Adress,HIGH);                    //define the actual position of runner
 for ( j =0; j<w; j++)
    {
      for (int i=0; i<11000; i++)               //Backward 11000 steps
          {
            digitalWrite(Pulse,HIGH);
            delayMicroseconds(30);
            digitalWrite(Pulse,LOW);
            delayMicroseconds(30);
          }
    }
  for (int i=0; i<1000; i++)                  //Forward 1000 steps
      {
       digitalWrite(Pulse,HIGH);
       delayMicroseconds(150);
       digitalWrite(Pulse,LOW);
       delayMicroseconds(100);
      }
 }
 void Refilling ()                        //Subrutine for Refilling Sauces
{
  GetState = 5;
   dataBuffer = GetState;
      sendData();                         //send message of state runner to raspberry
    digitalWrite(SauceDown, HIGH);        // power on the signal of level sauce is down

    if (ReleaseVolume ==0){
      volume();                           // go to volume subrutine
      dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    RefillDone=1;
    dataBuffer=RefillDone;
    sendData();                           //send message of refill to raspberry
}
    }
}

 void volume (){                            //Subrutine for Sense Volume of Sauces
  
  long Quantity;                            // internal variables for read the volume of sauces
  long Distance;
  
for (k=0; k<8; k++)
    {
      digitalWrite(Trig,LOW);               //control of pulses to the ultrasound sensor
      delayMicroseconds (4);
      digitalWrite(Trig,HIGH);
      delayMicroseconds(10);
      digitalWrite(Trig,LOW);

        Distance = pulseIn(27 + k,HIGH);    //calcule of volume 
        Distance = Distance/2;
        Quantity = Distance/29;
          Serial.print( "tanque :");
          Serial.print(k);
          j= 100 - (Quantity*4);
          Serial.println(j);
          Serial.print( "%");
          
  if(Quantity >20){                               //if the level is so down send the messagge 
    Serial.println("nivel critico");
    ReleaseVolume=0;
    dataBuffer=ReleaseVolume;
    sendData();
   }
   else if(Quantity<20 && Quantity >10){
    Serial.println("nivel medio");
   }
   else if(Quantity<10){
    Serial.println("tanque completo");
   }
  if (ReleaseVolume==0){
    Refilling ();                           //go to refilling subrutine
  }
 }
 j=0;
 }

void loop() {
}

void Runner(){                                                //Subrutine for decided Adress the runner

  if (dataBuffer == "1") {                                    //define the order to ejecut 
      dataBuffer=GetComponent;                                // answer to raspberry
      }
    else if (dataBuffer == "2") {
      dataBuffer=GetState;
       

     }
    else if (dataBuffer == "3") {
       dataBuffer=GetError;
        
     }
    else if (dataBuffer == "4") {
      dataBuffer = GetRunnerrequest;
    }
    else if (dataBuffer == "5") {
     dataBuffer = RespondRunner;
      
    }
    else if (dataBuffer == "6") {
      dataBuffer = ForceRetrieve;
    }
    else if (dataBuffer == "7") {
      dataBuffer = 1;
      sendData();
       dataBuffer = "";
  while (Wire.available()) {
    dataBuffer += (char) Wire.read();
    TargetWokId = dataBuffer;                 //defined the address that the runner need goto
      
      if (TargetWokId == "1"){
         WOK1 ();                             // Go to subrutine wok1
      }
      if (TargetWokId == "2"){
        WOK2 ();                              // Go to subrutine wok2
        
      }
      if (TargetWokId == "3"){
        WOK3 ();                              // Go to subrutine wok3
        
      }
    }
    }
    else if (dataBuffer == "8") {
    dataBuffer = DesireSauce;
    }
       else if (dataBuffer == "9") {
      dataBuffer = ReleaseVolume;
    }
    else if (dataBuffer == "10") {
      dataBuffer = RefillDone;
    }
    else if (dataBuffer == "11") {
    dataBuffer = NotifyWok;
    }
    else if (dataBuffer == "12") {
    dataBuffer = SauceLoad;
  }
}
 /* i = 0;
 StartSauces = digitalRead(22);  //lectura digital de pin
    Serial.println(StartSauces);
      if (StartSauces == HIGH){
          Serial.println("incio salsas");
          AdressWok = analogRead (AdressWokRunner);
            Serial.println("Pide direccion Wok");
            Serial.println(AdressWok);
            //if (DireccionWok < 350){ 
              Serial.println("Wok 1");
                  w = 1;
                  WOK1 ();
             // if (DireccionWok > 350 && DireccionWok < 700){ 
              Serial.println("Wok 2");
                  w = 2;
                  WOK2 ();
            //if (DireccionWok > 700){
              Serial.println("Wok 3");
                  w = 3;
                  WOK3 ();
               }
 }*/



 void setup(){
    Wire.begin(SLAVE_ADDRESS); // We connect this device to the I2C bus with address 20
  Wire.onReceive(receiveData); // We register the event upon receiving data
  Wire.onRequest(sendData);
   

  pinMode (Pulse, OUTPUT);          // active pins and variables such as outputs
  pinMode (Adress, OUTPUT);
  pinMode (Enable, OUTPUT);
  pinMode (Trig,OUTPUT);
  
  pinMode (Sauce1, OUTPUT);
  pinMode (Sauce2, OUTPUT);
  pinMode (Sauce3, OUTPUT);
  pinMode (Sauce4, OUTPUT);
  pinMode (Sauce5, OUTPUT);
  pinMode (Sauce6, OUTPUT);
  pinMode (Sauce7, OUTPUT);
  pinMode (Sauce8, OUTPUT);
  pinMode (SauceDown, OUTPUT);
  
  pinMode (Ultrasound1,INPUT);    // active pins and variables such as outputs
  pinMode (Ultrasound2,INPUT);
  pinMode (Ultrasound3,INPUT);
  pinMode (Ultrasound4,INPUT);
  pinMode (Ultrasound5,INPUT);
  pinMode (Ultrasound6,INPUT);
  pinMode (Ultrasound7,INPUT);
  pinMode (Ultrasound8,INPUT);
  pinMode (StartSauces,INPUT);
  //pinMode (AdressWokRunner,INPUT);
   
  digitalWrite(Enable,HIGH);
  digitalWrite(Sauce8,HIGH);
  digitalWrite(Sauce7,HIGH);
  digitalWrite(Sauce6,HIGH);
  digitalWrite(Sauce5,HIGH);
  digitalWrite(Sauce4,HIGH);
  digitalWrite(Sauce3,HIGH);
  digitalWrite(Sauce2,HIGH);
  digitalWrite(Sauce1,HIGH);

if (DEBUG) {
    Serial.begin(9600); // start serial for debugging
    Serial.println("I2C Ready!");
 }
 }
