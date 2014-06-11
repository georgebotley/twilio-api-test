<?php
/**
 * Numbers.php - Twilio
 * 
 * Interact with telephone and mobile numbers in the master account and any sub accounts.
 *
 * @author George Botley <george@torindul.co.uk>
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 */
 class Numbers extends Communicator {
 
 	 /**
	  * list_numbers function.
	  *
	  * Return numbers in the Sid account.
	  * 
	  * @access public
	  *
	  * @method $Numbers->list_numbers();
	  *
	  * @param string $Type		- The type of number we wish to list. Can be set to 'Local', 'TollFree' or 'Mobile' or 'All'. Defaults to All.
	  * @param array $Params 	- An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/incoming-phone-numbers#list-get-filters
	  * @param string $Sid	 	- The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function list_numbers( $Type='All', $Params = array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/IncomingPhoneNumbers';
		if($Type!='All') { $resource .= "/" . $Type; }
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
 
	 /**
	  * search_numbers function.
	  *
	  * Search for available telephone numbers
	  * 
	  * @access public
	  *
	  * @method $Numbers->search_numbers( array('SmsEnabled' => true), 'GB', 'Local' );
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/available-phone-numbers
	  * @param string $CountryCode - Country code in ISO 3166-1 alpha-2 format. See https://www.twilio.com/docs/api/rest/available-phone-numbers#countries
	  * @param string $Area - The type of number we are looking for. Can be set to 'Local', 'TollFree' or 'Mobile'.
	  * @param string $Sid	 - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function search_numbers( $Params = array(), $CountryCode, $Area, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/AvailablePhoneNumbers/' . $CountryCode . '/' . $Area;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "GET", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * provision_number function.
	  *
	  * Provision a number and assign it to the provised Sid.
	  * 
	  * @access public
	  *
	  * @method $Numbers->provision_number( '+441234123456' );
	  *
	  * @param array $Params - Optional parameters. See https://www.twilio.com/docs/api/rest/incoming-phone-numbers#list-post-optional-parameters
	  * @param string $PhoneNumber - The phone number you want to purchase. Starting with a '+'. i.e. +441234123456.
	  * @param string $Sid	 - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function provision_number( $Params = array(), $PhoneNumber, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/IncomingPhoneNumbers';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * get_number_details function.
	  *
	  * Retreive details of the selected phone number
	  * 
	  * @access public
	  *
	  * @method $Numbers->get_number_details( $PhoneNumberSid, $Sid);
	  *
	  * @param string $PhoneNumberSid - The Sid of the phone number we are to fetch the details for.
	  * @param string $Sid	 - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_number_details( $PhoneNumberSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/IncomingPhoneNumbers/' . $PhoneNumberSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * update_number_details function.
	  *
	  * Update details of the selected number.
	  * 
	  * @access public
	  *
	  * @method $Numbers->update_number_details( $Params = array(), $PhoneNumberSid, $Sid );
	  *
	  * @param array $Params - Optional parameters. See https://www.twilio.com/docs/api/rest/incoming-phone-numbers#instance-post-optional-parameters
	  * @param string $PhoneNumberSid - The Sid of the phone number we are to update the details of.
	  * @param string $Sid	 - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function update_number_details( $Params = array(), $PhoneNumberSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/IncomingPhoneNumbers/' . $PhoneNumberSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE );		 
		 
	 }
	 
	 /**
	  * release_number function.
	  *
	  * Release telephone number from the selected account
	  * 
	  * @access public
	  *
	  * @method $Numbers->release_number( $PhoneNumberSid, $Sid );
	  *
	  * @param string $PhoneNumberSid - The Sid of the phone number we are to release.
	  * @param string $Sid	 - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function release_number( $PhoneNumberSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/IncomingPhoneNumbers/' . $PhoneNumberSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		 
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "DELETE", DEBUG_MODE, DUMMY_MODE );		 
		 
	 }
	 
	 /**
	  * account_transfer function.
	  *
	  * Transfer a number between accounts
	  * 
	  * @access public
	  *
	  * @method $Numbers->account_transfer( $NewAccountSid, $PhoneNumberSid, $Sid );
	  *
	  * @param string $NewAccountSid - The Sid of the account we are to transfer the number to.
	  * @param string $PhoneNumberSid - The Sid of the phone number we are to transfer.
	  * @param string $Sid	 - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function account_transfer( $NewAccountSid, $PhoneNumberSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/IncomingPhoneNumbers/' . $PhoneNumberSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Merge the arrays
		$Params = array_merge( array('AccountSid' => $NewAccountSid), array() );
		 
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "POST", DEBUG_MODE, DUMMY_MODE );		 
		 
	 }
	 
 	 /**
	  * list_outgoingcallerid function.
	  *
	  * Returns a list of outgoing caller ids for a given number.
	  * 
	  * @access public
	  *
	  * @method $Numbers->list_outgoingcallerid( array(), $Sid );
	  *
	  * @param array $Params 	- An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/outgoing-caller-ids#list-get-filters
	  * @param string $Sid	 	- The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function list_outgoingcallerid( $Params = array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/OutgoingCallerIds';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * create_outgoingcallerid function.
	  *
	  * Returns a list of outgoing caller ids for a given number.
	  * 
	  * @access public
	  *
	  * @method $Numbers->create_outgoingcallerid( '+441234123456', array(), $Sid );
	  *
	  * @param string $PhoneNumber - The phone number to verify. Should be formatted with a '+' and country code e.g., +441234123456
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/outgoing-caller-ids#list-post-optional-parameters
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function create_outgoingcallerid( $PhoneNumber, $Params = array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/OutgoingCallerIds';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Merge the arrays
		$Params = array_merge( array('PhoneNumber' => $PhoneNumber), $Params);
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }

 	 /**
	  * delete_outgoingcallerid function.
	  *
	  * Deletes a specified outgoing caller id.
	  * 
	  * @access public 
	  *
	  * @method $Numbers->delete_outgoingcallerid( $CallerIDSid );
	  *
	  * @param string $CallerIDSid - The Sid of the outgoing caller id which we are to delete.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function delete_outgoingcallerid( $CallerIDSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/OutgoingCallerIds/' . $CallerIDSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "DELETE", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }	 

 	 /**
	  * view_outgoingcallerid function.
	  *
	  * Retreives representation of a specified outgoing caller id.
	  * 
	  * @access public 
	  *
	  * @method $Numbers->view_outgoingcallerid( $CallerIDSid );
	  *
	  * @param string $CallerIDSid - The Sid of the outgoing caller id which we are to view.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function view_outgoingcallerid( $CallerIDSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/OutgoingCallerIds/' . $CallerIDSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }	 
	 

 	 /**
	  * edit_outgoingcallerid function.
	  *
	  * Retreives representation of a specified outgoing caller id.
	  * 
	  * @access public 
	  *
	  * @method $Numbers->edit_outgoingcallerid( $Params, $CallerIDSid );
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/outgoing-caller-ids#instance-post-optional-parameters
	  * @param string $CallerIDSid - The Sid of the outgoing caller id which we are to edit.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function edit_outgoingcallerid( $Params = array(), $CallerIDSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/OutgoingCallerIds/' . $CallerIDSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
	 	
 
 }


?>