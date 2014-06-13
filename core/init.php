<?php
/**
 * init.php - Twilio
 * 
 * Prepare the API by including all of the neccessary files and initialising the required classes.
 *
 * @author George Botley <george@torindul.co.uk>
 * @package Twilio
 * @subpackage core
 *
 */
 
 //Set the include path to that of the Twilio (one folder above)
 set_include_path( dirname(__DIR__) );
 
 //Include the API configuration
 include_once "config/config.php";
 
 //Set PHP errors as requested.
 ini_set("display_errors", PHP_ERRORS);
 
 //Include the API classes
 include_once "core/ErrorHandler.php";
 include_once "core/Communicator.php";
 include_once "resources/Twiml.php"; 
 include_once "resources/Accounts.php";
 include_once "resources/Messages.php";
 include_once "resources/Numbers.php";
 include_once "resources/Calls.php";
 include_once "resources/Queues.php";
 include_once "resources/Conferences.php";
 include_once "resources/Usage.php";
 
 //Initialise instances of API classes
 $ErrorHandler = new ErrorHandler();
 $Communicator = new Communicator();
 $Accounts = new Accounts();
 $Messages = new Messages();
 $Numbers = new Numbers();
 $Calls = new Calls();
 $Queues = new Queues();
 $Conferences = new Conferences();
 $Usagw = new Usage();


?>