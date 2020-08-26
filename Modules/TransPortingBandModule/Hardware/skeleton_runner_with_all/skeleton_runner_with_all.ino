// OK Component Firmware Skeleton
#include <Stepper.h>
#include <Wire.h>

#define SLAVE_ADDRESS 0x20
#define DEBUG 1

typedef int (*RequestHandler)(int);
typedef void (*StateActions)(void);

/*
 * Component code
 * 1 --> Wok component
 * 2 --> Ingredient dispenser component
 * 3 --> Sauce runner component
 * 4 --> Transporter (Conveyor) component
 */
int componentCode = 3;
int startSaucesTime; // timer for count the time of the cicle
int i = 0;
int j = 0;
int w = 0;
int adressWok = 0;
int criticalVolume = 0;
int arriveTargetWok = NULL;
int wokReady = NULL;
int requestRefill = 0;
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
// bool isDesireSauceNeedRefill;
int retrieveRunner = 0;
int refillDone = 0;

const int ADRESS = 2;  // define Direction pin
const int ENABLE = 3;  // define Enable Pin
const int PULSE = 4;   // Pin para la señal de pulso
const int SAUCE_1 = 6; // pins to the electropumps of the sauces
const int SAUCE_2 = 7;
const int SAUCE_3 = 8;
const int SAUCE_4 = 9;
const int SAUCE_5 = 10;
const int SAUCE_6 = 11;
const int SAUCE_7 = 12;
const int SAUCE_8 = 13;

const int SAUCE_DOWN = 15;   // data of the sauce if this are down
const int START_SAUCES = 24; // intern data of control of the sauces
const int TRIG = 26;         // pulse to the sensor of quantity
const int ULTRASOUND_1 = 27; // pins to the sensors of quantity of the sauces
const int ULTRASOUND_2 = 28;
const int ULTRASOUND_3 = 29;
const int ULTRASOUND_4 = 30;
const int ULTRASOUND_5 = 31;
const int ULTRASOUND_6 = 32;
const int ULTRASOUND_7 = 33;
const int ULTRASOUND_8 = 34;

// Request handlers
int getComponentCode(int data) { return componentCode; }

int getStateCode(int data) { return stateCode; }

int getErrorCode(int data) { return errorCode; }

int getRequestCode(int data) { return requestCode; }

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

RequestHandler requestHandler[] = {&getComponentCode, &getStateCode,
                                   &getErrorCode, &getRequestCode,
                                   &saveDataHandler};

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

  for (int i = 0; i < sendLenth; i++) {
    Wire.write(sendBuffer[i]);

    if (DEBUG) {
      Serial.println(sendBuffer[i]);
    }
  }

  sendLenth = 0;
}

void runnerWok() { // Subrutine for move the runner to wok 1

  if (isDesireSauceNeedRefill == false) {
    digitalWrite(ADRESS, LOW);

    digitalWrite(ADRESS, HIGH); // define the actual position of runner
    for (j = 0; j < w; j++) {
      for (int i = 0; i < 11000; i++) // Backward 11000 steps
      {
        digitalWrite(PULSE, HIGH);
        delayMicroseconds(30);
        digitalWrite(PULSE, LOW);
        delayMicroseconds(30);
      }
    }
    for (int i = 0; i < 1000; i++) // Forward 1000 steps
    {
      digitalWrite(PULSE, HIGH);
      delayMicroseconds(150);
      digitalWrite(PULSE, LOW);
      delayMicroseconds(100);
    }
  } else {
    refillingStateActions(); // go to subrutine refilling
  }
  Serial.print("rutina de Wok");
  Serial.println(w);
  releasingStateActions();
}

// State actions
/* Standby state actions */
void standbyStateActions() {
  requestCode = 0;         // self._request_code = RunnerRequestCodes.NO_REQUEST
  if (targetWok == NULL) { // if self._target_wok is None:
    requestCode = 1; // self._request_code = RunnerRequestCodes.SET_TARGET_WOK
  } else if (desireSauceID == NULL) { // elif self._desire_sauce_id is None:
    requestCode = 2; // self._request_code = RunnerRequestCodes.SET_DESIRE_SAUCE
  } else if (releaseVol == 0) { // elif self._release_volume is None:
    requestCode =
        3; // self._request_code = RunnerRequestCodes.SET_RELEASE_VOLUME
  }
}

/* Sending state actions */
void sendingStateActions() {

  if (targetWok == "1") {
    w = 1;
    runnerWok(); // Go to subrutine wok1
  } else if (targetWok == "2") {
    w = 2;
    runnerWok(); // Go to subrutine wok2

  } else if (targetWok == "3") {
    w = 3;
    runnerWok(); // Go to subrutine wok3
  }
}

/* Releasing state actions */
void releasingStateActions() {

  digitalWrite(SAUCE_6, LOW); // dispens the suace
  digitalWrite(SAUCE_7, LOW);
  // digitalWrite(Sauce8,LOW);
  // digitalWrite(Sauce7,LOW);
  Serial.println("salsa");
  delay(2000);

  digitalWrite(SAUCE_6, HIGH);
  digitalWrite(SAUCE_7, HIGH);
  digitalWrite(SAUCE_5, HIGH);
  digitalWrite(SAUCE_2, HIGH);
  delay(300);
  stateCode = 4; // activate Retrieve runner
}

/* Retrieving state actions */
void retrievingStateActions() {
  retrieveRunner = 1;

  Serial.println("retornando");

  digitalWrite(ADRESS, HIGH); // define the actual position of runner
  for (j = 0; j < w; j++) {
    for (int i = 0; i < 11000; i++) // Backward 11000 steps
    {
      digitalWrite(PULSE, HIGH);
      delayMicroseconds(30);
      digitalWrite(PULSE, LOW);
      delayMicroseconds(30);
    }
  }
  for (int i = 0; i < 1000; i++) // Forward 1000 steps
  {
    digitalWrite(PULSE, HIGH);
    delayMicroseconds(150);
    digitalWrite(PULSE, LOW);
    delayMicroseconds(100);
  }
}

/* Refilling state actions */
void refillingStateActions() {
  if (criticalVolume == 1) {
    digitalWrite(SAUCE_DOWN,
                 HIGH); // power on the signal of level sauce is down
    requestRefill = 0;
  } else {
    digitalWrite(SAUCE_DOWN,
                 LOW); // power off the signal of level sauce is full
    requestRefill = 1;
  }
}

StateActions stateActions[] = {&standbyStateActions, &sendingStateActions,
                               &releasingStateActions, &retrievingStateActions,
                               &refillingStateActions};

bool isDesireSauceNeedRefill() {
  // TODO: Mechanism to determine whether the desire sauce needs to be refilled
  int k = 0;
  int l = 0;

  long quantity; // internal variables for read the volume of sauces
  long distance;
  for (k = 0; k < 8; k++) {
    digitalWrite(TRIG, LOW); // control of pulses to the ultrasound sensor
    delayMicroseconds(4);
    digitalWrite(TRIG, HIGH);
    delayMicroseconds(10);
    digitalWrite(TRIG, LOW);
    distance = pulseIn(27 + k, HIGH); // calcule of volume
    distance = distance / 2;
    quantity = distance / 29;
    Serial.print("tanque :");
    Serial.print(k);
    l = 100 - (quantity * 4);
    Serial.println(l);
    Serial.print("%");
    if (quantity > 20) { // if the level is so down send the messagge
      Serial.println("nivel critico");
      criticalVolume = 1;
      refillDone = 1;
    } else if (quantity < 20 && quantity > 10) {
      Serial.println("nivel medio");
    } else if (quantity < 10) {
      Serial.println("tanque completo");
    }
    if (criticalVolume == 0) {
      refillDone = 0;
      return true;
    }
  }
}

// Transit state rules
void transitState() {
  if (stateCode == 1           // self.is_STANDBY()
      && targetWok != NULL     // and self._target_wok is not None
      && desireSauceID != NULL // and self._desire_sauce_id is not None
      && releaseVol > 0        // and self._release_volume
      ) {
    if (!isDesireSauceNeedRefill()) { // if not
                                      // self._is_desire_sauce_need_refill:
      stateCode = 2;                  // self.go_to_send_runner()
    } else {                          // else:
      stateCode = 5;                  // self.go_to_refill()
    }
  }
  if (stateCode == 2             // self.is_SENDING()
      && arriveTargetWok != NULL // and self._is_arrive_target_wok
      && wokReady != NULL        // and self._is_wok_ready
      ) {
    stateCode = 3; // self.go_to_release()
  }
  if (stateCode == 3         // self.is_RELEASING()
      && criticalVolume == 1 // and self._is_release_done:
      ) {
    stateCode = 4; // self.go_to_retrieve_runner()
  }
  if (stateCode == 4                // self.is_RETRIEVING()
          && retrieveRunner != NULL // self._is_at_home_position
      ||
      stateCode == 5        // or self.is_REFILLING()
          && refillDone > 0 // self._is_refill_done
      ) {
    stateCode = 1; // self.go_to_standby()
  }
}

/*
 * Setup the Arduino
 */
void setup() {
  Wire.begin(SLAVE_ADDRESS);
  Wire.onReceive(receiveData);
  Wire.onRequest(sendData);

  pinMode(PULSE, OUTPUT); // active pins and variables such as outputs
  pinMode(ADRESS, OUTPUT);
  pinMode(ENABLE, OUTPUT);
  pinMode(TRIG, OUTPUT);

  pinMode(SAUCE_1, OUTPUT);
  pinMode(SAUCE_2, OUTPUT);
  pinMode(SAUCE_3, OUTPUT);
  pinMode(SAUCE_4, OUTPUT);
  pinMode(SAUCE_5, OUTPUT);
  pinMode(SAUCE_6, OUTPUT);
  pinMode(SAUCE_7, OUTPUT);
  pinMode(SAUCE_8, OUTPUT);
  pinMode(SAUCE_DOWN, OUTPUT);

  pinMode(ULTRASOUND_1, INPUT); // active pins and variables such as outputs
  pinMode(ULTRASOUND_2, INPUT);
  pinMode(ULTRASOUND_3, INPUT);
  pinMode(ULTRASOUND_4, INPUT);
  pinMode(ULTRASOUND_5, INPUT);
  pinMode(ULTRASOUND_6, INPUT);
  pinMode(ULTRASOUND_7, INPUT);
  pinMode(ULTRASOUND_8, INPUT);
  pinMode(STARTSAUCES, INPUT);
  // pinMode (AdressWokRunner,INPUT);

  digitalWrite(ENABLE, HIGH);
  digitalWrite(SAUCE_8, HIGH);
  digitalWrite(SAUCE_7, HIGH);
  digitalWrite(SAUCE_6, HIGH);
  digitalWrite(SAUCE_5, HIGH);
  digitalWrite(SAUCE_4, HIGH);
  digitalWrite(SAUCE_3, HIGH);
  digitalWrite(SAUCE_2, HIGH);
  digitalWrite(SAUCE_1, HIGH);

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
