<?php
/**
 * Accounts.php - Twilio
 * 
 * Interface with the master account.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 * @todo Sorting the transferring of numbers between accounts
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
	 	 
	 /**
	  * updateAccount function.
	  *
	  * Update the account
	  * 
	  * @access public
	  * @param mixed $Sid - Account Resource ID
	  * @param mixed $FriendlyName (default: null)
	  * @return void
	  */
	 public function updateAccount($Sid=null, $FriendlyName=null) {
		 
	 	//Establish the resource
	 	$this->api_resource = '/Accounts/' . $Sid;
	 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $this->api_resource;	
		
		//Store each parameter in an array for REST preparation
	 	$requestParameters = array("FriendlyName" => $FriendlyName);
	 	
		//Append $requestParameters to our REST Request URI and return it out of the function
		return array( $requestParameters, $requestURI );
		 
	 }
	 
	 /**
	  * updateAccount function.
	  *
	  * Update the account
	  * 
	  * @access public
	  * @param mixed $Sid - Account Resource ID
	  * @param mixed $Status - the accounts status. Defaults to active. Can be either suspended or closed. The latter being destructive and irreversible.
	  * @return void
	  */
	 public function updateAccountStatus($Sid=null, $Status="active") {
	 
	 	//If the $Sid belongs to the master account then fail.
	 	if($Sid==API_ACCOUNT_SID) { $this->throwError("Status can not be updated on the primary account."); exit(); }
		 
	 	//Establish the resource
	 	$this->api_resource = '/Accounts/' . $Sid;
	 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $this->api_resource;	
		
		//Store each parameter in an array for REST preparation
	 	$requestParameters = array("Status" => $Status);
	 	
		//Append $requestParameters to our REST Request URI and return it out of the function
		return array( $requestParameters, $requestURI );
		 
	 }
	 
	 /**
	  * searchAccounts function.
	  *
	  * Search the database of accounts that belong to the account making this API call.
	  * 
	  * @access public
	  * @param mixed $FriendlyName - Only return the Account resources with friendly names that exactly match this name.
	  * @param mixed $Status - Only return Account resources with the given status. Can be closed, suspended or active.
	  * @return void
	  */
	 public function searchAccounts($FriendlyName=null, $Status=null) {
		 
	 	//Establish the resource
	 	$this->api_resource = '/Accounts';
	 		 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $this->api_resource;	
		
		//Store each parameter in an array for REST preparation
	 	$requestParameters = array(
	 								"FriendlyName" 	=> $FriendlyName,
	 								"Status" 		=> $Status
	 						);
	 	
		//Append $requestParameters to our REST Request URI and return it out of the function
		return array( $requestParameters, $requestURI );
		 
	 }
	 
	 /**
	  * createSubAccount function.
	  *
	  * Create a sub account for the purposes of billing restrictions.
	  * 
	  * @access public
	  * @param mixed $FriendlyName - A human readable description of the new subaccount, up to 64 characters. Defaults to "SubAccount Created at {YYYY-MM-DD HH:MM}".
	  * @return void
	  */
	 public function createSubAccount($FriendlyName=null) {
		 
	 	//Establish the resource
	 	$this->api_resource = '/Accounts';
	 		 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $this->api_resource;	
		
		//Store each parameter in an array for REST preparation
	 	$requestParameters = array("FriendlyName" 	=> $FriendlyName);
	 	
		//Append $requestParameters to our REST Request URI and return it out of the function
		return array( $requestParameters, $requestURI );
		 
	 }
	 
 }
 
 ?>