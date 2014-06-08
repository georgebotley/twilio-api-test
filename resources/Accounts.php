<?php
/**
 * Accounts.php - Twilio
 * 
 * Interface with the primary account.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 */
 class Accounts extends Communicator {
 
 	 /**
	  * resource
	  *
	  * The REST API resource for the sms and mms capability.
	  *
	  * REQUIRED BY THIS RESOURCE
	  * 
	  * @var string
	  * @access private
	  */
	 private $api_resource;
	 
	 /**
	  * getAccount function.
	  *
	  * Retreive an accounts details by Sid.
	  * 
	  * @access public
	  * @param mixed $Sid - An account to query, using Sid.
	  * @return void
	  */
	 public function getAccount($Sid=null) {
	 
	 	//Establish the resource
	 	$this->api_resource = '/Accounts/' . $Sid;
	 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $this->api_resource;	
		
		//Store each parameter in an array for REST preparation
		$requestParameters = array();
		
		//Append $requestParameters to our REST Request URI and return it out of the function
		return array( $requestParameters, $requestURI );
	 
	 }

	 
	 
	 
 }
 
 ?>