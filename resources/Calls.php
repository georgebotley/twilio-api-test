<?php
/**
 * Calls.php - Twilio
 * 
 * Interact with Calls made through the API. Both Inbound and Outbound.
 *
 * @author George Botley <george@torindul.co.uk>
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage Resources
 *
 */
class Calls extends Communicator {
	
 	 /**
	  * list_calls function.
	  *
	  * Return numbers in the Sid account.
	  * 
	  * @access public
	  *
	  * @method $Calls->list_calls( $Params );
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/call#list-get-filters
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function list_calls( $Params = array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Calls';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * make_call function.
	  *
	  * Make a call using the API.
	  * 
	  * @access public
	  *
	  * @method $Calls->make_call( $From, $To, $Url, $Params )
	  *
	  * @param string $From	- The phone number or client identifier to use as the caller id. Must be the number itself or a registered callerid. i.e., +441234123456
	  * @param string $To - The phone number to call. i.e., +441234123456
	  * @param string $Url - The Twiml reference to be followed once the call is connected.
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/making-calls#post-parameters-optional
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function make_call( $From, $To, $Url, $Params = array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Calls';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Merge the arrays
		$Params = array_merge( array('From' => $From, 'To' => $To, 'Url' => $Url), $Params);
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
	 
	 /**
	  * modify_call function.
	  *
	  * Modify a live call
	  * 
	  * @access public
	  *
	  * @method $Numbers->modify_call( $Params, $CallSid, $Sid);
	  *
	  * @param string $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/change-call-state#post-parameters
	  * @param string $CallSid - The Sid of the call we are to modify.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function modify_call( $Params=array(), $CallSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Calls/' . $CallSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * get_call_details function.
	  *
	  * Retreive details of the selected phone call
	  * 
	  * @access public
	  *
	  * @method $Numbers->get_call_details( $CallSid, $Sid);
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/making-calls#post-parameters-optional
	  * @param string $CallSid - The Sid of the call we are to get details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_call_details( $CallSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Calls/' . $CallSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * get_call_recordings function.
	  *
	  * Retreive call recordings from a specific call
	  * 
	  * @access public
	  *
	  * @method $Numbers->get_call_recordings( $Params, $CallSid, $Sid);
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/recording#list-get-filters
	  * @param string $CallSid - The Sid of the call we are to retreive recordings for.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_call_recordings( $Params=array(), $CallSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Calls/' . $CallSid . '/Recordings';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "GET", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * delete_call_recording function.
	  *
	  * Delete the provided call recording
	  * 
	  * @access public
	  *
	  * @method $Numbers->delete_call_recording( $RecordingSid, $Sid );
	  *
	  * @param string $RecordingSid - The Sid of the recording we are to delete.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function delete_call_recording( $RecordingSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Recordings/' . $RecordingSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "DELETE", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * get_call_recording_transcription function.
	  *
	  * Return the transcriptions of the provided recorded message or resource
	  * 
	  * @access public
	  *
	  * @method $Numbers->get_call_recording_transcription( $Params, $CallSid, $Sid);
	  *
	  * @param string $RecordingSid - The Sid of the recording we are to retreive transcriptions for.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_call_recording_transcription( $RecordingSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Recordings/' . $RecordingSid . '/Transcriptions';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 	
}

?>