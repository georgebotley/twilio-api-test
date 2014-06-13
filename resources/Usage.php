<?php
/**
 * Usage.php - Twilio
 * 
 * Get account usage. Both Calls and SMS/MMS
 *
 * @author George Botley <george@torindul.co.uk>
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 */
 class Usage extends Communicator {
	 
 	 /**
	  * list_usage function.
	  *
	  * Return list of queues within the Sid account.
	  * 
	  * @access public
	  *
	  * @method $Usage->list_usage();
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/usage-records#usage-categories
	  * @param string $Type - The period of time to search as per https://www.twilio.com/docs/api/rest/usage-records#list-subresources, Defaults to All.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function list_usage( $Type='All', $Params=array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Usage/Records';
		if($Type!='All') { $resource .= "/" . $Type; }
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 } 

?>