<?php
/**
 * init.php - Twilio
 * 
 * Prepare the API by checking for required extensions, calling the neccessary files and passing control to the controller.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @package Twilio
 * @subpackage core
 *
 */
 
 //Include the API configuration
 include_once "config/config.php";
 
 //Set PHP errors as requested.
 ini_set("display_errors", PHP_ERRORS);
 
 //Include the API classes
 include_once "core/ErrorHandler.php";
 include_once "core/Communicator.php";
 include_once "resources/Accounts.php";
 include_once "resources/Messages.php";
 include_once "resources/Numbers.php";
 include_once "resources/Calls.php";
 
 //Initialise instances of API classes
 $ErrorHandler = new ErrorHandler();
 $Communicator = new Communicator();
 $Accounts = new Accounts();
 $Messages = new Messages();
 $Numbers = new Numbers();
 $Calls = new Calls();
 
 //Pass control to the required controller
 include_once "core/Controller.php";


?>