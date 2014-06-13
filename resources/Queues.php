<?php
/**
 * Queues.php - Twilio
 * 
 * Interact with Twilio Queues.
 *
 * @author George Botley <george@torindul.co.uk>
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 */
 class Queues extends Communicator { 
	 
 	 /**
	  * list_queues function.
	  *
	  * Return list of queues within the Sid account.
	  * 
	  * @access public
	  *
	  * @method $Queues->list_queues();
	  *
	  * @param string $Sid	 	- The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function list_queues( $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Queues';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * make_queue function.
	  *
	  * Make a new queue
	  * 
	  * @access public
	  *
	  * @method $Queues->make_queue( $Params, $Sid )
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/queue#list-post-parameters-optional
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function make_queue( $Params=array(), $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Queues';
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * get_queue_details function.
	  *
	  * Return the details of a specified queue.
	  * 
	  * @access public
	  *
	  * @method $Queues->get_queue_details( $QueueSid, $Sid )
	  *
	  * @param string $QueueSid - The Sid of the queue we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_queue_details( $QueueSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Queues/' . $QueueSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * modify_queue function.
	  *
	  * Modify the details of a specified queue.
	  * 
	  * @access public
	  *
	  * @method $Queues->get_queue_details( $Params, $QueueSid, $Sid )
	  *
	  * @param array $Params - An array e.g, (ParameterName => Value). See https://www.twilio.com/docs/api/rest/queue#list-post-parameters-optional
	  * @param string $QueueSid - The Sid of the queue we are to modify.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function modify_queue( $QueueSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Queues/' . $QueueSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( $Params, $requestURI, "POST", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * close_queue function.
	  *
	  * Close the specified queue.
	  * 
	  * @access public
	  *
	  * @method $Queues->close_queue( $QueueSid, $Sid )
	  *
	  * @param string $QueueSid - The Sid of the queue we are to get the close.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function close_queue( $QueueSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Queues/' . $QueueSid;
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "DELETE", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * get_front_member function.
	  *
	  * Fetch the details of the first member in the specified queue.
	  * 
	  * @access public
	  *
	  * @method $Queues->get_front_member( $QueueSid, $Sid )
	  *
	  * @param string $QueueSid - The Sid of the queue we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_front_member( $QueueSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Queues/' . $QueueSid . "/Members/Front";
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }
	 
 	 /**
	  * get_all_members function.
	  *
	  * Fetch the details of the members in the specified queue.
	  * 
	  * @access public
	  *
	  * @method $Queues->get_all_members( $QueueSid, $Sid )
	  *
	  * @param string $QueueSid - The Sid of the queue we are to get the details of.
	  * @param string $Sid - The account Sid to perform this request on. Defaults to the master Sid if left blank.	  
	  *
	  * @return XML response from API.
	  */
	 public function get_all_members( $QueueSid, $Sid=API_ACCOUNT_SID ) {
		 
		//Establish the resource
		$resource = '/Accounts/' . $Sid . '/Queues/' . $QueueSid . "/Members";
					 	
		//Form the REST Request URI
		$requestURI = $this->api_protocol . $this->api_location . $resource;	
		
		//Send the request and return the result as XML
		return parent::send_request( array(), $requestURI, "GET", DEBUG_MODE, DUMMY_MODE ); 
		 
	 }	 
	 
 }