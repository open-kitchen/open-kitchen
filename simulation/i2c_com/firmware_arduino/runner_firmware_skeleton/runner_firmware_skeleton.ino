// OK Component Firmware Skeleton
#include <Wire.h>

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

}

/* Releasing state actions */
void releasingStateActions() {

}

/* Retrieving state actions */
void retrievingStateActions() {

}

/* Refilling state actions */
void refillingStateActions() {

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
