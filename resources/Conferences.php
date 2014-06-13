<?php
/**
 * Conferences.php - Twilio
 * 
 * Interact with Conference calls that have been created with Twiml.
 *
 * @author George Botley <george@torindul.co.uk>
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 */
 class Conferences extends Communicator {
	 
 	 /**
	  * list_conferences function.
	  *
	  * Return list of conferences within the Sid account.
	  * 
	  * @access public
	  *
	  * @method $Conferences->list_conferences();
	  *
	  * @param array $Params 	- An array of parameters, e.g, (ParameterName => Value), as at https://www.twilio.com/docs/api/rest/conference#list-get-filters
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function list_conferences( $Params=array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Conferences/';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * get_conference_details function.
	  *
	  * Return the details of a specified conference.
	  * 
	  * @access public
	  *
	  * @method $Queues->get_conference_details( $ConferenceSid, $Sid )
	  *
	  * @param string $ConferenceSid - The Sid of the conference we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_conference_details( $ConferenceSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Conferences/' . $ConferenceSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * get_conference_participants function.
	  *
	  * Return the participants of a conference.
	  * 
	  * @access public
	  *
	  * @method $Queues->get_conference_participants( $ConferenceSid, $Sid )
	  *
	  * @param string $ConferenceSid - The Sid of the conference we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_conference_participants( $ConferenceSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Conferences/' . $ConferenceSid . '/Participants';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * get_conference_participant function.
	  *
	  * Return a participant of a conference.
	  * 
	  * @access public
	  *
	  * @method $Queues->get_conference_participant( $CallSid, $ConferenceSid, $Sid )
	  *
	  * @param string $CallSid - The Sid of the caller in the conference.
	  * @param string $ConferenceSid - The Sid of the conference we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_conference_participant( $CallSid, $ConferenceSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Conferences/' . $ConferenceSid . '/Participants/' . $CallSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * modify_participant function.
	  *
	  * Modify a participant in a conference.
	  * 
	  * @access public
	  *
	  * @method $Queues->modify_participant( $CallSid, $ConferenceSid, $Sid )
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/participant#instance-post
	  * @param string $CallSid - The Sid of the caller in the conference.
	  * @param string $ConferenceSid - The Sid of the conference we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function modify_participant( $Params=array(), $CallSid, $ConferenceSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Conferences/' . $ConferenceSid . '/Participants/' . $CallSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * kick_participant function.
	  *
	  * Kick a participant from a conference.
	  * 
	  * @access public
	  *
	  * @method $Queues->kick_participant( $CallSid, $ConferenceSid, $Sid )
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/participant#instance-post
	  * @param string $CallSid - The Sid of the caller in the conference.
	  * @param string $ConferenceSid - The Sid of the conference we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function kick_participant( $Params=array(), $CallSid, $ConferenceSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Conferences/' . $ConferenceSid . '/Participants/' . $CallSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "DELETE", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 	 
 }

 

?>
