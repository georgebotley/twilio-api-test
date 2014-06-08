<?php
/**
 * Messages.php - Twilio
 * 
 * Interact with Twilio API SMS and MMS facility. Comments as per the API Docs.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 * @todo Short Code Interaction (non sending). The sending of short code messages will continue to work with this API.
 * @todo StatusCallback development.
 *
 */
 class Messages extends Communicator {
	 
	 /**
	  * send_message function.
	  *
	  * Send an SMS/MMS message.
	  * 
	  * @access public
	  *
	  * @method $Messaging->send_message( '', array('To' => '+441234123456', 'From' => '+441234123456', 'Body => 'Hello', 'MediaUrl' => 'http://url-to-image'));
	  *
	  * @param array $Params 	- An array of parameters, e.g, (ParameterName => Value), as at https://www.twilio.com/docs/api/rest/sending-messages
	  * @param string $Sid	 	- The account Sid to perform this request on. Defaults to the master Sid if left blank.
	  *
	  * @return XML response from API.
	  */
	 public function send_message( $Params, $Sid=API_ACCOUNT_SID ) {
	 	
	 	//Resource URI
	 	$resource = "/Accounts/" . ( ($Sid==null) ? API_ACCOUNT_SID : $Sid ) . "/Messages";
	 	
	 	//Form the REST Request URI
	 	$requestURI = $this->api_protocol . $this->api_location . $resource;
	 	
	 	//Send the request and return the result as XML
	 	return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE);
	 
	 }
	 	 
	 /**
	  * get_messages function.
	  *
	  * Retreive a list of messages sent/received from the account. Can be narrowed down with critera.
	  * 
	  * @access public
	  *
	  * @method $Messages->get_messages( '', array('From' => '+441234123456') );
	  *
	  * @param array $Params - An array of search critera parameters, e.g, (ParameterName => Value), as at https://www.twilio.com/docs/api/rest/message
	  * @param string $Sid	 - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_messages( $Params = array(), $Sid=API_ACCOUNT_SID  ) {
	 
	 	//Resource URI
	 	$resource = "/Accounts/" . ( ($Sid==null) ? API_ACCOUNT_SID : $Sid ) . "/Messages";
	 	
	 	//Form the REST Request URI
	 	$requestURI = $this->api_protocol . $this->api_location . $resource;
		 
	 	//Send the request and return the result as XML
	 	return parent::send_request( $Params, $requestURI, "GET", DEBUG_MODE, DUMMY_MODE);
		 
	 }
	 	 	 
 }
 
 
 ?>