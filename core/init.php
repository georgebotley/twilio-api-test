<?php
/**
 * init.php - Twilio
 * 
 * Prepare the API by calling the neccessary files and passing control to the controller.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @package Twilio
 * @subpackage core
 *
 */
 
 //Include the API configuration
 include_once "config/config.php";
 
 //Include the API classes
 include_once "messaging/messaging.php";
 
 //Initialise instances of API classes
 $messaging = new messaging();
 
 //Pass control to the required controller
 include_once "core/controller.php";


?>