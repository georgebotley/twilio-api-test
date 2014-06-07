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
 include_once "resources/Messaging.php";
 
 //Initialise instances of API classes
 $ErrorHandler = new ErrorHandler();
 $Communicator = new Communicator();
 $Messaging = new Messaging();
 
 //Pass control to the required controller
 include_once "core/Controller.php";


?>