// OK Component Firmware Skeleton
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
int componentCode = 4;
int positionTipper;
int cupEjection;
int wokReady;
int activate;
int startTipperTime; // timer of cicle for tipper
int startPusherTime; // timer of cicle for pusher
int cupPresence;     // High is without cup
int pinOut = 0;
int wokPosition = 0;
int i = 0;
int startCicle = 0;
int getComponent = 4; // Variables for answer messages from raspberry
int getState = 1;
int getError = 0;
int getPusherTipperRequest = 0;
int respondTipper = 0;
int activatePusherTipper = 0;
int setWok = 0;
int ejecting = 0;
int currentTime = millis();

int timeDifferenceBetweenStartTipper;
int timeDifferenceBetweenStartPusher;

/*int startSaucesTime; // timer for count the time of the cicle
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
 * 2 --> Transporting
 * 3 --> Pushing
 * 4 --> Tipping
 * 5 --> Ejecting
 */
int stateCode = 1;

/*
 * 0 --> No errors
 * 1 --> Error:
 * 2 --> Error:
 */
int errorCode = 0;

/*
 * Request code
 * 0 --> Pusher-tipper no request
 * 1 --> Pusher-tipper request to activate
 * 2 --> Pusher-tipper request to set Wok is in ready position or waiting for
 * ingredients
 * 3 --> Pusher-tipper request to notify when cup ejection is done
 * 4 -->
 * 5 -->
 */
int requestCode = 0;

const int CONVEYOR = 4; // main conveyor
const int SOLENOID = 5; // solenoid for to hold cup in the tipper
const int TIPPER_RIGHT = 6;
const int TIPPER_LEFT = 7; // two signals for motor for turnaround
const int PUSHER_LEFT = 8;
const int PUSHER_RIGHT = 9; // declaration of variables
const int SENSOR_TIPPER = 10;
const int SENSOR_PUSHER = 11; // Sensor of presence of cup in the conveyor
const int SENSOR_CONVEYOR = 12;
const int SENSOR_EJECT = 13;
// Operation varibales

// Request handlers
int getComponentCode(int data) { return componentCode; }

int getStateCode(int data) { return stateCode; }

int getErrorCode(int data) { return errorCode; }

int getRequestCode(int data) { return requestCode; }

int saveDataHandler(int data) {
  switch (requestCode) {
  case 1:
    activate = data;
    break;
  case 2:
    wokReady = data;
    break;
  case 3:
    cupEjection = data;
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
void resetVariables() {

  activate = NULL;
  wokReady = NULL;
  cupEjection = NULL;
}

void TRANSPORTING() { // Subrutine to carry on the cup to the pusher
  timeDifferenceBetweenStartPusher = currentTime - startPusherTime;
  startCicle = startPusherTime; // count time of cicle tipper
  if (timeDifferenceBetweenStartPusher < 480) {
    // delay (480);                                       //wait for the cup is
    // in front of the pusher
    digitalWrite(CONVEYOR, LOW); // power off the conveyor
  }
}

void PUSHING() // subrutine pusher
{

  timeDifferenceBetweenStartPusher = currentTime - startPusherTime;
  startCicle = startPusherTime;
  if (timeDifferenceBetweenStartPusher < 7880) {
    digitalWrite(CONVEYOR, LOW); // power off the conveyor
    Serial.println("Have a Cup 1 ");
    digitalWrite(PUSHER_RIGHT, HIGH); // push the cup to tipper
    digitalWrite(PUSHER_LEFT, LOW);
    Serial.println("Pusher 1 out");
    // delay (7400);
  }
  timeDifferenceBetweenStartPusher = currentTime - startPusherTime;
  startCicle = startPusherTime;
  if (timeDifferenceBetweenStartPusher < 7882) {

    digitalWrite(PUSHER_RIGHT, HIGH); // pusher finished the travel
    digitalWrite(PUSHER_LEFT, HIGH);
    // delay (1);
  }
  timeDifferenceBetweenStartPusher = currentTime - startPusherTime;
  startCicle = startPusherTime;
  if (timeDifferenceBetweenStartPusher < 14932) {
    digitalWrite(PUSHER_RIGHT, LOW); // pusher return to the home
    digitalWrite(PUSHER_LEFT, HIGH);
    Serial.println("Pusher 1 enter");
    // delay (7050);
  }
  digitalWrite(PUSHER_RIGHT, HIGH); // pusher stoped at initial position
  digitalWrite(PUSHER_LEFT, HIGH);
  Serial.println("Pusher 1 at HOME");
  digitalWrite(CONVEYOR, LOW); // power on the conveyor
}

void TIPPING() // subrutine pusher
{
  currentTime = startTipperTime; // count time of cicle tipper
  timeDifferenceBetweenStartTipper = currentTime - startTipperTime;
  startCicle = startTipperTime;
  if (timeDifferenceBetweenStartTipper < 580) {
    digitalWrite(TIPPER_LEFT, LOW); // tipper go to overturn the foot in the wok
    digitalWrite(TIPPER_RIGHT, HIGH);
    Serial.println("Tipper 1 spinning 1");
    // delay (580);
  }
}

void EJECTING() {
  if (timeDifferenceBetweenStartTipper > 580 &&
      timeDifferenceBetweenStartTipper < 1500) {
    digitalWrite(SOLENOID, HIGH);
    digitalWrite(TIPPER_RIGHT, LOW); // reverse the turn of the tipper
    digitalWrite(TIPPER_LEFT,
                 HIGH); // tipper with cup without food go to giving out cup
    Serial.println("Tipper 1 return");
    // delay (930);
  } else if (timeDifferenceBetweenStartTipper > 1500 &&
             timeDifferenceBetweenStartTipper < 3000) {
    digitalWrite(TIPPER_RIGHT, HIGH); // tipper wait that the cup out
    digitalWrite(TIPPER_LEFT, HIGH);
    Serial.println("Tipper 1 giving out cup");
    digitalWrite(SOLENOID, LOW); // solenoid assures that cup leave the tipper

    // delay (1500);
  } else if (timeDifferenceBetweenStartTipper > 3000 &&
             timeDifferenceBetweenStartTipper < 3500) {
    digitalWrite(SOLENOID, HIGH);
    // delay(500);
  }
}

// State actions
/* Standby state actions */
void standbyStateActions() {
  requestCode = 0; // self._request_code = conveyorRequestCodes.NO_REQUEST
  if (activate == NULL) { // if self._target_wok is None:
    requestCode = 1; // self._request_code = ConveyorRequestCodes.SET_TARGET_WOK
  } else if (wokReady == NULL) { // elif self._Wok_isnot_at_position:
    requestCode =
        2; // self._request_code = conveyorRequestCodes.SET_DESIRE_SAUCE
  } else if (ejecting = !0) { // elif self._release_ejectting_the_cup is None:
    requestCode =
        3; // self._request_code = RunnerRequestCodes.SET_RELEASE_VOLUME
  }
}

/* Sending state actions */
void sendingStateActions() {
  Serial.println("EN WOKS, sendingStateActions");
  if (activate == 1) {
    TRANSPORTING(); // Go to subrutine transporting
  }
}

/* Releasing state actions */
void releasingStateActions() {}

/* Retrieving state actions */
void retrievingStateActions() {

  if (timeDifferenceBetweenStartTipper > 3500 &&
      timeDifferenceBetweenStartTipper < 3600) {
    digitalWrite(SOLENOID, LOW);
    digitalWrite(TIPPER_LEFT, LOW); // tipper return to home
    digitalWrite(TIPPER_RIGHT, HIGH);
    positionTipper = 1; // rutine of read sensor of tipper at 0 point
    for (i = 0; i <= 230; i++) {
      positionTipper = digitalRead(SENSOR_TIPPER);
      Serial.println(SENSOR_TIPPER);
      if (SENSOR_TIPPER == 0) {
        i = 579;
      }
    }
  }
  if (SENSOR_TIPPER == 0) {
    digitalWrite(SOLENOID, HIGH);
    Serial.println("Tipper 1 to HOME");
    digitalWrite(TIPPER_RIGHT, HIGH); // tipper finished and stoped
    digitalWrite(TIPPER_LEFT, HIGH);
    Serial.println("Tipper 1 at HOME");
  }
}
/* Refilling state actions */

// Transit state rules
void transitState() {
  if (stateCode == 1      // self.is_STANDBY()
      && activate != NULL // and self._target_wok is not None
      && wokReady != NULL // and self._desire_sauce_id is not None
      ) {
    stateCode = 2; // self.go_to_transporting()
  }

  if (stateCode == 2             // self.is_TRANSPORTING()
      && SENSOR_CONVEYOR != NULL // and self._is_arrive_cup
      ) {
    stateCode = 3; // self.go_to_PUSHING()
  }
  if (stateCode == 3        // self.is_PUSHING()
      && SENSOR_PUSHER == 1 // and self._is_release_done:
      ) {
    stateCode = 4; // self.go_to_TIPPING()
  }
  if (stateCode == 4          // self.is_TIPPING()
      && SENSOR_EJECT != NULL // self._is_eject_cup
      ) {
    stateCode = 5; // self.go_to_retrievingStateActions()
  }
  if (stateCode == 5       // or self.is_retrievingStateActions()
      && SENSOR_TIPPER > 0 // self._is_at_home
      ) {

    stateCode = 1; // self.go_to_standby()
    resetVariables();
  }
}

/*
 * Setup the Arduino
 */
void setup() {
  Wire.begin(SLAVE_ADDRESS);
  Wire.onReceive(receiveData);
  Wire.onRequest(sendData);

  pinMode(CONVEYOR, OUTPUT); // variables as output
  pinMode(PUSHER_RIGHT, OUTPUT);
  pinMode(PUSHER_LEFT, OUTPUT);
  pinMode(TIPPER_RIGHT, OUTPUT);
  pinMode(TIPPER_LEFT, OUTPUT);
  pinMode(SOLENOID, OUTPUT);

  pinMode(SENSOR_PUSHER, INPUT);
  pinMode(SENSOR_CONVEYOR, INPUT);
  pinMode(SENSOR_EJECT, INPUT);

  pinMode(SENSOR_TIPPER, INPUT_PULLUP); // variables as input

  if (DEBUG) {
    Serial.begin(9600); // start serial for debugging
    Serial.println("I2C Ready!");
  }
}

/*
 * Arduino looping
 */
void loop() {
  //(stateActions[stateCode - 1])();
  transitState();
  delay(100); // Delay for stability
}
