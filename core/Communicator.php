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

 class Communicator {
	 
	 //Define variables for the communicator
	 private $api_location;
	 private $api_account_sid;
	 private $api_account_token;
	 private $api_protocol;
	 
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
	 function __construct($remote_uri, $account_sid, $account_token, $http_protocol) {
		 
		 //Set the class variables.
		 $this->api_location = $remote_uri;
		 $this->api_account_sid = $account_sid;
		 $this->api_account_token = $account_token;
		 $this->api_protocol = $http_protocol;
		 
	 }
	 
	 
	 	 
	 
 }
 
 
?>