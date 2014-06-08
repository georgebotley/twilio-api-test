<?php
/**
 * Controller.php - Twilio
 * 
 * Control the operation of the API calls and callbacks.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage core
 *
 */
 
 //If we are dealing with a POST communication this is a call back.
 if($_SERVER['REQUEST_METHOD'] === 'POST') {}
 
 //Otherwise, we are dealing with a standard request to communicate with the API.
 else {}
 
/*
 * SMS SEND
*/
//$ourMessage = "Hello George, how are you doing today? This is a test Twilio API message. :-) :D";
//$preparedAPICall = $Messaging->prepareMessage("+441383630054", "+447757765484", $ourMessage);
//$response = $Communicator->sendCommunication($preparedAPICall[0], $preparedAPICall[1], "POST", DEBUG_MODE, false);


/*
 * SMS RETREIVE MESSAGES
*/
$preparedAPICall = $Messaging->getMessages();
$response = $Communicator->sendCommunication($preparedAPICall[0], $preparedAPICall[1], "GET", DEBUG_MODE, false);


/*
 * ACCOUNT RETREIVE
*/
//$preparedAPICall = $Accounts->getAccount("AC718634fa7cc8856c75633f50526c0141");
//$response = $Communicator->sendCommunication($preparedAPICall[0], $preparedAPICall[1], "GET", DEBUG_MODE, false);

 
?>