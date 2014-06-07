<?php
/**
 * ErrorHandler.php - Twilio
 * 
 * Class to handle the throwing of error messages
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage core
 *
 */
 
 class ErrorHandler {
	 
	 /**
	  * throwError function.
	  *
	  * Throw a PHP error message, as per http://php.net/trigger_error/
	  * 
	  * @access public
	  * @param mixed $message - The message itself.
	  * @param mixed $type - The type of message. Refer to documention at PHP.net. If blank defaults to E_USER_ERROR.
	  * @return void
	  */
	 public function throwError($message, $type=E_USER_ERROR) {
		 
		 trigger_error($message, $type);
		 
	 }	 
	 
 }
 
 ?>