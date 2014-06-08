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
	 public function throwError($message, $file, $line) {
		 
		 exit($message . " <br /><br />Error found in file <strong>" . $file . "</strong> on line <strong>" . $line . "</strong>");
		 
	 }	 
	 
	 
	 /**
	  * HTTPStatus function.
	  *
	  * Check the status code of an API response. Return true or false based on status code meaning.
	  *
	  * (https://www.twilio.com/docs/api/rest/request)
	  * 
	  * @access public
	  * @param mixed $status	- The HTTP status
	  * @param mixed $file 		- The file where the error occured
	  * @param mixed $line 		- The line number of the file where the error occured
	  * @return void
	  */
	 public function HTTPStatus($status, $file, $line) {
		 
		 switch($status) {
			 
			 //200 - OK
			 //The request was successful and the response body contains the representation requested.
			 case 200:
			 	return true;
			 break;
			 
			 //201 - CREATED
			 //The request was successful, we updated the resource and the response body contains the representation.
			 case 201:
			 	return true;
			 break;
			 
			 //302 - FOUMD
			 //A common redirect response; you can GET the representation at the URI in the Location response header.
			 case 302:
			 	return true;
			 break;
			 
			 //304 - NOT MODIFIED
			 //Your client's cached version of the representation is still up to date.
			 case 304:
			 	return true;
			 break;
			 
			 //401 - UNAUTHORIZED
			 //The supplied credentials, if any, are not sufficient to access the resource.
			 case 401:
			 	$this->throwError("HTTP Status Code 401 - Uh Oh! It looks like the credentials you're using are invalid. Please correct them in config/config.php", 
				 		$file,
				 		$line
			 		);
			 break;
			 
			 //404 - NOT FOUND
			 //Resource not found.
			 case 404:
			 	$this->throwError(
				 		"HTTP Status Code 404 - The resource could not be found. Check the Sid you are using or contact your system administrator.", 
				 		$file,
				 		$line
			 		);
			 break;
			 
			 //405 - NOT ALLOWED
			 //You can't POST or PUT to the resource.
			 case 405:
			 	$this->throwError("HTTP Status Code 405 - You can't POST or PUT to the resource requested.", $file, $line);
			 break;			 
			 
			 //429 - TOO MANY REQUESTS
			 //Your application is sending too many simultaneous requests.
			 case 429:
			 	$this->throwError("HTTP Status Code 429 - Too many simultaneous requests from you. Allow me to catch up. Please try again shortly.", $file, $line);			 break;
			 
			 //500 - SERVER ERROR
			 //We couldn't return the representation due to an internal server error.
			 case 500:
			 	$this->throwError("HTTP Status Code 500 - An internal server error has occured. Please try again shortly.", $file, $line);
			 break;
			 
			 //503 - SERVICE UNAVAILABLE
			 //We are temporarily unable to return the representation. Please wait for a bit and try again.
			 case 503:
			 	$this->throwError("HTTP Status Code 503 - Resource temporarily unavailable. Please try again shortly.", $file, $line);
			 break;			 			 
			 
			 
		 } 
		 
	 }
	 
 }
 
 ?>