<?php
/**
 * Communicator.php - Twilio
 * 
 * Handles HTTP communication
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage core
 *
 */

 class Communicator extends ErrorHandler {
	 
	 //Define variables for the communicator
	 protected $api_location;
	 protected $api_account_sid;
	 protected $api_account_token;
	 protected $api_protocol;
	 
	 /**
	  * __construct function.
	  * 
	  * Initiate the communicator class with the remote APIs respective credentials and accepted protocol.
	  *
	  * @access public
	  * @param mixed $remote_uri
	  * @param mixed $account_sid
	  * @param mixed $account_token
	  * @param mixed $http_protocol
	  * @return void
	  */
	 function __construct() {
	 
		 //Check for cURL, if it does not exist, throw an error.
		 ( function_exists('curl_version') ? $this->throwError("PHP cURL extension not found") : '' );
		 
		 //Set the class variables.
		 $this->api_location = API_REMOTE_LOCATION;
		 $this->api_account_sid = API_ACCOUNT_SID;
		 $this->api_account_token = API_ACCOUNT_TOKEN;
		 $this->api_protocol = API_PROTOCOL;
		 
	 }
	 
	 /**
	  * prepareResourceURI function.
	  *
	  * Return the full URL of the remote resource, inculding protocol.
	  * 
	  * @access public
	  * @param mixed $resource - the path to the API resource we are to communicate with.
	  * @return String.
	  */
	 public function prepareResourceURI($resource) {
		 
		 return $this->protocol . $this->location . $resource;
		 
	 }
	 	 
	 
 }
 
 
?>