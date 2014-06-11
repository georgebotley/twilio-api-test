<?php
/**
 * Accounts.php - Twilio
 * 
 * Interact with the master account resources and sub accounts.
 *
 * @author George Botley <george@torindul.co.uk>
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 * @todo Sorting the transferring of numbers between accounts
 *
 */
 class Accounts extends Communicator {
	 
	 /**
	  * get_account function.
	  *
	  * Retreive an accounts details by Sid.
	  * 
	  * @access public
	  *
	  * @method $Accounts->get_account( $Sid );
	  *
	  * @param mixed $Sid - An account to query, using Sid. Defaults to the master Sid if left blank.
	  *
	  * @return XML response from API.
	  */
	 public function get_account( $Sid=API_ACCOUNT_SID ) {
	 
	 	//Establish the resource
	 	$resource = '/Accounts/' . $Sid;
	 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
	 	//Send the request and return the result as XML
	 	return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE );
	 
	 }
	 	 
	 /**
	  * update_account function.
	  *
	  * Update an accounts details
	  * 
	  * @access public
	  *
	  * @param array $Params 	- An array of parameters, e.g, (ParameterName => Value), as at https://www.twilio.com/docs/api/rest/account
	  * @param mixed $Sid 		- An account to update, using Sid. Defaults to the master Sid if left blank.
	  *
	  * @return XML response from API.
	  */
	 public function update_account( $Params = array(), $Sid=API_ACCOUNT_SID ) {
		 
	 	//Establish the resource
	 	$resource = '/Accounts/' . $Sid;
	 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
	 	//Send the request and return the result as XML
	 	return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * update_account_status function.
	  *
	  * Update the account
	  * 
	  * @access public
	  *
	  * @param mixed $Status - the accounts status. Defaults to active. Can be either suspended or closed. The latter being destructive and irreversible.
	  * @param mixed $Sid - An account to update, using Sid. Can not be the master account Sid.
	  *
	  * @return XML response from API.
	  */
	 public function update_account_status( $Status='Active', $Sid ) {
	 
	 	//If the $Sid belongs to the master account then fail
	 	if($Sid==API_ACCOUNT_SID) { $this->throwError("Status can not be updated on the primary account.", __FILE__, __LINE__); }
		 
	 	//Establish the resource
	 	$resource = '/Accounts/' . $Sid;
	 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Store each parameter in an array for REST preparation
	 	$requestParameters = array("Status" => $Status);
	 	
		//Send the request and return the result as XML
	 	return parent::send_request( $requestParameters, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * search_accounts function.
	  *
	  * Search the database of accounts that belong to the account making this API call.
	  * 
	  * @access public
	  *
	  * @param array $Params 	- An array of parameters, e.g, (ParameterName => Value), as at https://www.twilio.com/docs/api/rest/account#list-get-filters
	  *
	  * @return XML response from API.
	  */
	 public function search_accounts( $Params = array() ) {
		 
	 	//Establish the resource
	 	$resource = '/Accounts';
	 		 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
	 	
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "GET", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
	 /**
	  * create_sub_account function.
	  *
	  * Create a sub account for the purposes of billing restrictions.
	  * 
	  * @access public
	  *
	  * @param mixed $FriendlyName - A human readable description of the new subaccount, up to 64 characters. Defaults to "SubAccount Created at {YYYY-MM-DD HH:MM}".
	  *
	  * @return XML response from API.
	  */
	 public function create_sub_account($FriendlyName=null) {
		 
	 	//Establish the resource
	 	$resource = '/Accounts';
	 		 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Store each parameter in an array for REST preparation
	 	$Params = array("FriendlyName" 	=> $FriendlyName);
	 	
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE );
		 
	 }
	 
 }
 
 ?>