<?php
/**
 * init.php - Twilio
 * 
 * Prepare the API by calling the neccessary files and passing control to the controller.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package core
 *
 */
 
 //Include the API configuration
 include_once "config/config.php";
 
 //Include the API classes
 include_once "sms_mms/sms_mms.php";
 
 //Initialise instances of API classes
 $sms_mms = new sms_mms();
 
 //Pass control to the required controller
 include_once "core/controller.php";


?>