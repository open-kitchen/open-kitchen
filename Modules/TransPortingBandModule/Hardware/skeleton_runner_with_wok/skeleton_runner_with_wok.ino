// OK Component Firmware Skeleton
#include <Wire.h>
#include <Stepper.h>

#define SLAVE_ADDRESS 0x20
#define DEBUG 1

typedef int (* RequestHandler)(int);
typedef void (* StateActions)(void);


/*
 * Component code
 * 1 --> Wok component
 * 2 --> Ingredient dispenser component
 * 3 --> Sauce runner component
 * 4 --> Transporter (Conveyor) component
 */
int componentCode = 3;
int start_sauces_time;          //timer for count the time of the cicle 
int i = 0;
int j = 0;
int w = 0;
int k=0;
int AdressWok = 0;
/* 
 * State code:
 * 1 --> Standby
 * 2 --> Sending
 * 3 --> Releasing
 * 4 --> Retrieving
 * 5 --> Refilling
 */
int stateCode = 1;

/*
 * 0 --> No errors
 * 1 --> Error: need refill
 * 2 --> Error: not able to retrieve at current state
 */
int errorCode = 0;

/*
 * Request code
 * 0 --> Runner no request
 * 1 --> Runner request to set target Wok ID
 * 2 --> Runner request to set desire sauce bag ID
 * 3 --> Runner request to set release volume
 * 4 --> Runner request to notify if refill is done
 * 5 --> Runner request to notify if wok is ready
 */
int requestCode = 0;


// Operation varibales
int targetWok = NULL;
int desireSauceID = NULL;
int releaseVol = 0;
//bool isDesireSauceNeedRefill;
int RetrieveRunner = 0;
int RefillDone= 0;

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

// Request handlers
int getComponentCode(int data) {
  return componentCode;
}


int getStateCode(int data) {
  return stateCode;
}


int getErrorCode(int data) {
  return errorCode;
}


int getRequestCode(int data) {
  return requestCode;
}


int saveDataHandler(int data) {
  switch (requestCode) {
    case 1:
      targetWok = data;
      break;
    case 2:
      desireSauceID = data;
      break;
    case 3:
      releaseVol = data;
      break;
    case 4:
      // TODO
      break;
    case 5:
      // TODO
      break;
    default:
      return 0;
  }
  return 1;
  
  // if (requestCode == 1) {
  //   targetWok = data;
  // } else if (requestCode == 2) {
  //   desireSauceID = data;
  // } else if (requestCode == 3) {
  //   releaseVol = data;
  // } else if (requestCode == 4) {
  //   // TODO
  // } else if (requestCode == 5) {
  //   // TODO
  // } else {
  //   return 0;  // failed
  // }
  // return 1;  // success
}


RequestHandler requestHandler[] = {
  &getComponentCode,
  &getStateCode,
  &getErrorCode,
  &getRequestCode,
  &saveDataHandler
};



// data buffer
int dataBuffer[10];
int receiveLenth = 0;
int sendBuffer[10];
int sendLenth = 0;


// Read data in to buffer.
void receiveData(int byteCount) {
  if (DEBUG) {
    Serial.println("+++++++");
    Serial.println("Receive: ");
  }
  
  receiveLenth = 0;
  while (Wire.available()) {
    dataBuffer[receiveLenth] = Wire.read();
    receiveLenth = receiveLenth + 1;

    if (DEBUG) {
      char lengthStrBuff[50];
      sprintf(lengthStrBuff, "%d ", dataBuffer[receiveLenth - 1]);
      Serial.println(lengthStrBuff);
    }
  }
  dataBuffer[receiveLenth] = '\0';
  
  if (DEBUG) {
    char lengthStrBuff[50];
    sprintf(lengthStrBuff, "Received Length: %d", receiveLenth);
    Serial.println(lengthStrBuff);
    Serial.println("=======");
  }

  sendBuffer[0] = requestHandler[dataBuffer[0] - 1](dataBuffer[1]);
  sendLenth = 1;
}

// Respnse to request
void sendData() {
  if (DEBUG) {
    Serial.println("Sending: ");
  }
  
  for(int i=0; i < sendLenth; i++) {
    Wire.write(sendBuffer[i]);
    
    if (DEBUG) {
      Serial.println(sendBuffer[i]);
    }
  }
  
  sendLenth = 0;
}

void WOK (){                                     //Subrutine for move the runner to wok 1
  
    if (isDesireSauceNeedRefill == false){
       digitalWrite(Adress,LOW);

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
else {refillingStateActions();    //go to subrutine refilling
  }
  Serial.print("rutina de Wok");
       Serial.println(w);
     releasingStateActions ();  
                                            
}

  

// State actions
/* Standby state actions */
void standbyStateActions() {
  requestCode = 0;  //self._request_code = RunnerRequestCodes.NO_REQUEST
  if (targetWok == NULL) {  // if self._target_wok is None:
    requestCode = 1;  // self._request_code = RunnerRequestCodes.SET_TARGET_WOK
  } else if (desireSauceID == NULL) {  // elif self._desire_sauce_id is None:
    requestCode = 2;  // self._request_code = RunnerRequestCodes.SET_DESIRE_SAUCE
  } else if (releaseVol == 0) {  // elif self._release_volume is None:
    requestCode = 3; // self._request_code = RunnerRequestCodes.SET_RELEASE_VOLUME
  }
}

/* Sending state actions */
void sendingStateActions() {
  
 if (targetWok == "1"){
        w=1;
         WOK ();                             // Go to subrutine wok1
      }
     else if (targetWok == "2"){
        w=2;
        WOK ();                              // Go to subrutine wok2
        
      }
     else if (targetWok == "3"){
        w=3;
        WOK ();                              // Go to subrutine wok3
        
      }
}

/* Releasing state actions */
void releasingStateActions() {
        
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
    retrievingStateActions ();                                // go to subrutine Retrieve
}

/* Retrieving state actions */
void retrievingStateActions() {
  RetrieveRunner=1;
    
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


/* Refilling state actions */
void refillingStateActions() {
     digitalWrite(SauceDown, HIGH);        // power on the signal of level sauce is down

   
    }


StateActions stateActions[] = {
  &standbyStateActions,
  &sendingStateActions,
  &releasingStateActions,
  &retrievingStateActions,
  &refillingStateActions
};


bool isDesireSauceNeedRefill() {
  // TODO: Mechanism to determine whether the desire sauce needs to be refilled
  return true;
   
  long Quantity;                            // internal variables for read the volume of sauces
  long Distance;
  j=0;
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
bool    isDesireSauceNeedRefill=true;
    releaseVol=1;
    
   }
   else if(Quantity<20 && Quantity >10){
    Serial.println("nivel medio");
   }
   else if(Quantity<10){
    Serial.println("tanque completo");
   }
  if (isDesireSauceNeedRefill ==true){
    refillingStateActions();                           //go to refilling subrutine
     RefillDone=0;
  }
     
}
bool isDesireSauceNeedRefill =false;
 }
 



// Transit state rules
void transitState() {
  if (
    stateCode == 1  // self.is_STANDBY()
    && targetWok != NULL  // and self._target_wok is not None
    && desireSauceID != NULL  // and self._desire_sauce_id is not None
    && releaseVol > 0  // and self._release_volume
  ) {
    if (!isDesireSauceNeedRefill()) {  // if not self._is_desire_sauce_need_refill:
      stateCode = 2;  // self.go_to_send_runner()
    } else {  // else:
      stateCode = 5;  // self.go_to_refill()
    }
  }

  // elif self.is_SENDING() and self._is_arrive_target_wok and self._is_wok_ready:
  //     self.go_to_release()
  // 
  // elif self.is_RELEASING() and self._is_release_done:
  //     self.go_to_retrieve_runner()
  // 
  // elif (self.is_RETRIEVING() and self._is_at_home_position) or (
  //     self.is_REFILLING() and self._is_refill_done
  // ):
  //     self.go_to_standby()
}



/*
 * Setup the Arduino
 */
void setup() {
  Wire.begin(SLAVE_ADDRESS);
  Wire.onReceive(receiveData);
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


/*
 * Arduino looping
 */
void loop() {
  (stateActions[stateCode - 1])();
  transitState();
  delay(100); // Delay for stability
}
