<?php
/**
 * Messaging.php - Twilio
 * 
 * Interact with Twilio API SMS and MMS facility. Comments as per the API Docs.
 *
 * API DOCS available here. (https://www.twilio.com/docs/api/rest/sending-messages)
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage resources
 *
 * @todo Short Code Interaction (non sending). The sending of short code messages will continue to work with this API.
 *
 */
 class Messaging extends Communicator {
	 
	 /**
	  * resource
	  *
	  * The REST API resource for the sms and mms capability.
	  *
	  * REQUIRED BY THIS RESOURCE
	  * 
	  * (default value: '/2010-04-01/Accounts/API_ACCOUNT_SID/Messages')
	  * 
	  * @var string
	  * @access private
	  */
	 private $api_resource;
	 
	 /**
	  * From
	  *
	  * A Twilio phone number enabled for the type of message you wish to send.
	  * Only phone numbers or short codes purchased from Twilio work here;
	  * you cannot (for example) spoof messages from your own cell phone number.
	  *
	  * REQUIRED BY THIS RESOURCE
	  * 
	  * @var string
	  * @access private
	  */
	 private $From;
	 
	 /**
	  * To
	  *
	  * The destination phone number. Format with a '+' and country code e.g., +16175551212 (E.164 format).
	  * For 'To' numbers without a '+', Twilio will use the same country code as the 'From' number. Twilio will 
	  * also attempt to handle locally formatted numbers for that country code (e.g. (415) 555-1212 for US, 07400123456 for GB).
	  * If you are sending to a different country than the 'From' number, you must include a '+' and the country code to ensure
	  * proper delivery. If you are sending messages while in trial mode, the 'To' phone number must be verified with Twilio.
	  *
	  * REQUIRED BY THIS RESOURCE
	  * 
	  * @var string
	  * @access private
	  */	 
	 private $To;
	 
	 /**
	  * Body
	  *
	  * The text of the message you want to send, limited to 1600 characters.
	  * If you are sending non-BMP characters in the message Body the number of characters could
	  * be smaller than 1600. Almost all global languages are supported without the use of the non-BMP
	  * character plane.	  
 	  *
 	  * Note that if you do not specify a MediaUrl and the body is greater than 160 characters, the message
 	  * will be sent as SMS, segmented and charged accordingly. 
	  *
	  * REQUIRED BY THIS RESOURCE OR USE MediaURL.
	  *
	  * @var string
	  * @access private
	  */	 
	 private $Body;
	 
	 /**
	  * MediaUrl
	  *
	  * The URL of the media you wish to send out with the message. .gif, .png and .jpeg content is currently 
	  * supported and will be formatted correctly on the recipient's device. Other types are also accepted by the
	  * API. If you wish to send more than one image in the message body then please provide multiple MediaUrl values
	  * in the POST request.
	  *
	  * Content types for MediaUrl validation are fetched via the content-type header at the provided URLs. 
	  * If the content-type header does not match the media, Twilio will reject the request. 
	  * Twilio supports image/gif, image/png, and image/jpeg mime-types and accepts many others.
	  *
	  * REQUIRED BY THIS RESOURCE OR USE Body.
	  * 
	  * @var string
	  * @access private
	  */	 
	 private $MediaUrl;
	 
	 /**
	  * StatusCallback
	  * 
	  * A URL that Twilio will POST to each time your message status changes to one of the following: failed, sent, delivered, or undelivered.
	  * Twilio will POST the MessageSid along with the other standard request parameters
	  * (https://www.twilio.com/docs/api/twiml/sms/twilio_request#request-parameters) as well as MessageStatus and ErrorCode.
	  *
	  * Each time a message status changes, Twilio will make an asynchronous HTTP request to the StatusCallback URL, if you provided one.
	  *
	  * The parameters Twilio passes to your application in its request to the StatusCallback URL include all the standard request parameters
	  * (https://www.twilio.com/docs/api/twiml/sms/twilio_request#request-parameters) and these additional parameters:
	  *
	  *		'MessageStatus'
	  *		The status of the message. Message delivery information is reflected in message status. The possible values are described here.
	  *		(https://www.twilio.com/docs/api/rest/message#sms-status-values)
	  *		
	  *		'ErrorCode'
	  *		The error code (if any) associated with your message. If your message status is failed or undelivered, the ErrorCode can give you
	  *		more information about the failure. If the message was delivered successfully, no ErrorCode will be present. The possible values
	  *		are described here. (https://www.twilio.com/docs/api/rest/message#error-values)
	  *
	  * @var string
	  * @access private
	  */
	 private $StatusCallback;
	 
	 /**
	  * ApplicationSid
	  * 
	  * Twilio will POST MessageSid as well as MessageStatus=sent or MessageStatus=failed to the URL in the MessageStatusCallback
	  * property of this Application. If the StatusCallback parameter above is also passed, the Application's MessageStatusCallback 
	  * parameter will take precedence.
	  *
	  * @var string
	  * @access private
	  */
	 private $ApplicationSid;
	 
	 /**
	  * Date
	  * 
	  * Only show messages sent on this date (in GMT format), given as YYYY-MM-DD. Example: DateSent=2009-07-06. 
	  * You can also specify inequality, such as DateSent<=YYYY-MM-DD for messages that were sent on or before midnight
	  * on a date, and DateSent>=YYYY-MM-DD for messages sent on or after midnight on a date.
	  *
	  * @var string
	  * @access private
	  */
	 private $Date;
	 
	 /**
	  * prepareMessage function.
	  *
	  * 1 - Set the value of all of the required variables in preparation for sending the message.
	  * 2 - Prepare the message request 
	  * 3 - Return the request for use in the Communicator class
	  * 
	  * @access public
	  * @param mixed $From (default: null)
	  * @param mixed $To (default: null)
	  * @param mixed $Body (default: null)
	  * @param mixed $MediaUrl (default: null) - comma delimtedf URL's for MMS images.
	  * @param mixed $StatusCallback (default: null)
	  * @param mixed $ApplicationSid (default: null)
	  * @param mixed $Type (default: null)
	  * @return array( [0] => The prepared urlencoded message, [1] => The url from the API to send the request to );
	  */
	 public function prepareMessage($From=null,$To=null,$Body=null,$MediaUrl=null,$StatusCallback=null,$ApplicationSid=null,$Type=null) {
	 	
	 	//Set the relevant parameter values, if passed in with the constructor.
	 	$this->From 				= $From;
	 	$this->To					= $To;
	 	$this->Body					= $Body;
	 	$this->MediaUrl				= $MediaUrl;
	 	$this->StatusCallback		= $StatusCallback;
	 	$this->ApplicationSid		= $ApplicationSid;
	 	$this->api_resource 		= "/Accounts/" . API_ACCOUNT_SID . "/Messages";
	 	
	 	//Form the REST Request URI
	 	$requestURI = $this->api_protocol . $this->api_location . $this->api_resource;
	 	
	 	//Store each parameter in an array for REST preparation
	 	$requestParameters = array(
	 							"From" 				=> $this->From,
								"To"				=> $this->To,
								"Body"				=> $this->Body,
								"StatusCallback"	=> $this->StatusCallback,
								"ApplicationSid"	=> $this->ApplicationSid,
							);
							
		//Assign MediaUrl to the $requestParameters seperately, BUT ONLY WHEN it exists. This prevents the API falling over!
		if( $MediaUrl!==null ) { $requestParameters["MediaUrl"] = $this->MediaUrl; }
		
		//Append $requestParameters to our REST Request URI and return it out of the function
		return array( $requestParameters, $requestURI );
	 
	 }
	 
	 	 
	 /**
	  * getMessages function.
	  *
	  * Retreive a list of messages sent/received from the account. Can be narrowed down with critera.
	  * 
	  * @access public
	  * @param mixed $From (default: null) - Only show messages to this phone number.
	  * @param mixed $To (default: null) - Only show messages from this phone number.
	  * @param mixed $Date (default: null) - Only show messages sent on this date (in GMT format), given as YYYY-MM-DD
	  * @return void
	  */
	 public function getMessages($From=null,$To=null,$Date=null) {
	 
	 	//Set the relevant parameter values, if passed in with the constructor.	 
	 	$this->From				= $From;
	 	$this->To				= $To;
	 	$this->Date				= $Date;
	 	$this->api_resource 	= "/Accounts/" . API_ACCOUNT_SID . "/Messages";
	 	
	 	//Form the REST Request URI
	 	$requestURI = $this->api_protocol . $this->api_location . $this->api_resource;
		 
	 	//Store each parameter in an array for REST preparation
	 	$requestParameters = array(
	 							"From" 				=> $this->From,
								"To"				=> $this->To,
								"Date"				=> $this->Date,
								);
															
		//Append $requestParameters to our REST Request URI and return it out of the function
		return array( $requestParameters, $requestURI );
		 
	 }

	 
	 /**
	  * getFrom function.
	  * 
	  * Return the value of the From variable. 
	  *
	  * @access public
	  * @return String
	  */
	 public function getFrom() { 
	 	return $this->From; 
	 }
	 
	 /**
	  * setTo function.
	  * 
	  * Set the value of the To variable.
	  *
	  * @access public
	  * @return String
	  */
	 public function setFrom($NewFrom) { 
	 	$this->From = $NewFrom;
	 }
	 
	 /**
	  * getTo function.
	  * 
	  * Return the value of the To variable. 
	  *
	  * @access public
	  * @return String
	  */
	 public function getTo() { 
	 	return $this->To; 
	 }
	 
	 /**
	  * setTo function.
	  * 
	  * Set the value of the To variable.
	  *
	  * @access public
	  * @return String
	  */
	 public function setTo($NewTo) { 
	 	$this->To = $NewTo;
	 }

	 /**
	  * getBody function.
	  * 
	  * Return the value of the Body variable. 
	  *
	  * @access public
	  * @return String
	  */
	 public function getBody() { 
	 	return $this->Body; 
	 }
	 
	 /**
	  * setBody function.
	  * 
	  * Set the value of the Body variable.
	  *
	  * @access public
	  * @return String
	  */
	 public function setBody($NewBody) { 
	 	$this->Body = $NewBody;
	 }
	 
	 /**
	  * getMediaUrl function.
	  * 
	  * Return the value of the MediaUrl variable. 
	  *
	  * @access public
	  * @return String
	  */
	 public function getMediaUrl() { 
	 	return $this->MediaUrl; 
	 }
	 
	 /**
	  * setMediaUrl function.
	  * 
	  * Set the value of the MediaUrl variable.
	  *
	  * @access public
	  * @return String
	  */
	 public function setMediaUrl($NewMediaUrl) { 
	 	$this->MediaUrl = $NewMediaUrl;
	 }
	 
	 /**
	  * getStatusCallback function.
	  * 
	  * Return the value of the StatusCallback variable. 
	  *
	  * @access public
	  * @return String
	  */
	 public function getStatusCallback() { 
	 	return $this->StatusCallback; 
	 }
	 
	 /**
	  * setStatusCallback function.
	  * 
	  * Set the value of the StatusCallback variable.
	  *
	  * @access public
	  * @return String
	  */
	 public function setStatusCallback($NewStatusCallback) { 
	 	$this->StatusCallback = $NewStatusCallback;
	 }
	 
	 /**
	  * getApplicationSid function.
	  * 
	  * Return the value of the ApplicationSid variable. 
	  *
	  * @access public
	  * @return String
	  */
	 public function getApplicationSid() { 
	 	return $this->ApplicationSid; 
	 }
	 
	 /**
	  * setApplicationSid function.
	  * 
	  * Set the value of the ApplicationSid variable.
	  *
	  * @access public
	  * @return String
	  */
	 public function setApplicationSid($NewApplicationSid) { 
	 	$this->ApplicationSid = $NewApplicationSid;
	 }
	 	 
 }
 
 
 ?>