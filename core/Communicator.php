<?php
/**
 * Communicator.php - Twilio
 * 
 * Client to handles HTTP communication
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage core
 *
 */

 class Communicator extends ErrorHandler {
	 
	 //Define variables for the communicator
	 protected $api_location;
	 protected $api_account_sid;
	 protected $api_account_token;
	 protected $api_protocol;
	 
	 /**
	  * __construct function.
	  * 
	  * Initiate the communicator class with the remote APIs respective credentials and accepted protocol.
	  *
	  * @access public
	  * @param mixed $remote_uri
	  * @param mixed $account_sid
	  * @param mixed $account_token
	  * @param mixed $http_protocol
	  * @return void
	  */
	 function __construct() {
	 
		 //Check for OpenSSL, if it does not exist, throw an error.
		 ( !in_array('openssl', get_loaded_extensions()) ? $this->throwError("Open SSL extension not found", __FILE__, __LINE__) : "" );
	 
		 //Check for cURL, if it does not exist, throw an error.
		 ( !in_array('curl', get_loaded_extensions()) ? $this->throwError("PHP cURL extension not found", __FILE__, __LINE__) : "" );
		 
		 //Set the class variables.
		 $this->api_location = API_REMOTE_LOCATION;
		 $this->api_account_sid = API_ACCOUNT_SID;
		 $this->api_account_token = API_ACCOUNT_TOKEN;
		 $this->api_protocol = API_PROTOCOL;
		 
	 }
	 
	 /**
	  * send_request function.
	  *
	  * Send the HTTP request and return an XML response.
	  * 
	  * @access public
	  *
	  * @method $Communicator->send_request($preparedMessage, $RequestURI, 'POST', 1, 1);
	  *
	  * @param mixed $preparedMessage - The REST formatted, urlencoded request.
	  * @param mixed $RequestURI - The request URI
	  * @param mixed $RequestMethod - The method to use, defaults to POST if not defined.
	  * @param mixed $debug - Should we verbose output debug the communication? Defaults to false if not defined.
	  * @param mixed $dummy - Dummy mode. Prevents API from authenticating. Useful for checking outbound request without response. Defaults to false if not defined.
	  *
	  * @return XML
	  *
	  * @todo Incorporate GET and any other required Request Method types
	  */
	 public function send_request($preparedMessage, $RequestURI, $RequestMethod="POST", $debug=false, $dummy=false) {
		 
		 //Curl Options
		 $curl_options = array();
		 $curl_options[CURLOPT_HEADER] 					= true; //Ask to receive HTTP headers
		 $curl_options[CURLOPT_RETURNTRANSFER] 			= true; //Request the response back to the application (set to false to output XML in source view)
		 $curl_options[CURLOPT_TIMEOUT] 				= 60; //Communication timeout time.
		 $curl_options[CURLINFO_HEADER_OUT] 			= true; //Communication timeout time.
		 $curl_options[CURLOPT_USERPWD] 				= ( ($dummy) ? "" : API_ACCOUNT_SID . ":" . API_ACCOUNT_TOKEN ); //Authentication
 		 
 		 //Establish the communication method type and set any other applicable options
 		 switch($RequestMethod) {
	 		 
	 		 case "POST":
	 		 
	 		 	$curl_options[CURLOPT_URL] 				= $RequestURI; //Set the URL to send this request to.
	 		 	$curl_options[CURLOPT_POST] 			= true; //Inform curl to use POST headers.
	 		 	
	 		 	//Prepare the POST request parameters. Remove empties.
	 		 	foreach($preparedMessage as $parameter => $value) {
		 		 	
		 		 	//Remove/Unset an empty, if not empty fall through.
		 		 	if(empty($value) || $value==null || $value=='') { unset($preparedMessage[$parameter]); }
		 		 	
	 		 	}
	 		 	
	 		 	$curl_options[CURLOPT_POSTFIELDS] 		= $preparedMessage; //The actual data of the communication.
	 		 
	 		 break;
	 		 
	 		 case "GET":
	 		 
	 		 	//Prepare the GET request parameters. It can't be an array in GET requests. It follows the standard ?a=1&b=2 style.
	 		 	$i=0;
	 		 	foreach($preparedMessage as $parameter => $value) {
	 		 	
	 		 		//If value is empty, don't include in the parameters
	 		 		if(empty($value) || $value==null || $value=='') {}
	 		 		
	 		 		//Otherwise, continue...		 		 	
	 		 		else {
	 		 		
			 		 	if($i==0) { $get_request = "?" . $parameter . "=" . $value; }
			 		 	else { $get_request .= "&" . $parameter . "=" . $value; }
			 		 	$i++;
			 		 	
		 		 	}
		 		 	
	 		 	}
	 		 
	 		 	$curl_options[CURLOPT_HTTPGET] 	= true; //Infom curl to use GET headers.
	 		 	$curl_options[CURLOPT_URL] 		= $RequestURI . $get_request; //Set the URL to send this request to (with GET style ?a=1&b=2).
	 		 
	 		 break;
	 		 
	 		 case "DELETE":
	 		 
	 		 	$curl_options[CURLOPT_HTTPGET] = "DELETE";
	 		 
	 		 break;
	 		 
	 		 default:
	 		 	$this->throwError(
	 		 		"The requested communication type (" . $RequestMethod . ") has not been configured yet. It is on the to do list.",
	 		 		__FILE__,
	 		 		__LINE__
	 		 	);
	 		 break;
	 		 
 		 }
 		 
 		 //If we can open a curl session, continue and configure.
		 if( $session = curl_init() ) {
			 
			 //If we can apply our curl options to our new session, continue and transmit.
			 if( curl_setopt_array($session, $curl_options) ) {
				 
				 //If we get a response, continue and handle it.
				 if( $response = curl_exec($session) ) {
				 
				 	 //Original request
				 	 $request = curl_getinfo($session, CURLINFO_HEADER_OUT);
					 
					 //Split the response in to manageable sections, limited to three explosions.
					 $parts = explode("\r\n\r\n", $response, 3);
					 
					 //Set variables as if they were arrays. Splitting the response in to the header and body.
					 list($head, $body) = ($parts[0] == 'HTTP/1.1 100 Continue') ? array($parts[1], $parts[2]) : array($parts[0], $parts[1]);
					 
					 //Fetch the HTTP code, as integer.
					 $status = curl_getinfo($session, CURLINFO_HTTP_CODE);
					 
					 //Check the status code. If the status is a failure then throwError and stop. Otherwise continue.
					 //$this->HTTPStatus($status, __FILE__, __LINE__); 
					 
					 //Explode the header in to it's own array.
					 $header_lines = explode("\r\n", $head);
					 
					 //Remove the first array item for the header
					 array_shift($header_lines);
					 
					 //Tidy up.
					 foreach ($header_lines as $line) {
		            
		             	list($key, $value) = explode(":", $line, 2);
		              
					 	$headers[$key] = trim($value);
		              
					 }
					 
					 //Close the curl session
					 curl_close($session);
					 
					 //TODO Close the buffer, if used.
					 //if (isset($buf) && is_resource( $buf ) ) { fclose($buf); }
					
					 //If debug has been enabled, loop through and output as a table. HTML buffer
					 if($debug) { 
						 
						 ob_start(); ?>
						 
						 	<h1>API Debug</h1>
						 	
						 	<table border="1" width="100%" cellpadding="5">
							 
							 	<tbody>
							 	
									<tr>
										
										<td width="40%"><strong>Original Request</strong></td>
										<td><?php echo $request; ?></td>
									
									</tr>
									
									<tr>
										
										<td width="40%"><strong>Original Params</strong></td>
										<td><?php echo print_r($preparedMessage); ?></td>
									
									</tr>
							 	
								</tbody>
							 	
							</table>
							
							<br /><br />
							 
						 	<table border="1" width="100%" cellpadding="5">
							 
							 	<tbody>
							 	
									<tr>
										
										<td width="40%"><strong>Status Code</strong></td>
										<td><?php print_r($status); ?></td>
									
									</tr>
							 	
								</tbody>
							 	
							</table>
							
							<br /><br />
							 
						 	<table border="1" width="100%" cellpadding="5">
							 
							 	<tbody>
							 	
							 		<?php 
							 		
							 			foreach($headers as $name => $value) { 
							 			
							 		?>
							 	
											<tr>
												
												<td width="40%"><strong><?php echo $name; ?></strong></td>
												<td><?php echo $value; ?></td>
												
											</tr>
											
									<?php } ?>		
							 	
								</tbody>
							 	
							</table>
							
							<br /><br />
							 
						 	<table border="1" width="100%" cellpadding="5">
							 
							 	<tbody>
							 	
									<tr>
										
										<td width="10%"><strong>Body</strong></td>
										<td width="90%">

										
												<?php
												
													$body_xml = new SimpleXMLElement($body);
													$dom = new DOMDocument("1.0");
													$dom->preserveWhiteSpace = true;
													$dom->formatOutput = true;
													$dom->loadXML( $body_xml->asXML() );
													echo nl2br ( htmlentities( $dom->saveXML() ) ); 
													
												?>
												

										</td>
										
									</tr>
							 	
								</tbody>
							 	
							</table>
							
						<?php ob_flush();
						
						//Before we return a response, check its status code.
						return $response;
						
					 } 
					 
				 }

				 //Otherwise, fail.
				 else {
					 $this->throwError("We could not get a response from the API.", __FILE__, __LINE__);
				 }
				 
				 
			 }
			 
			 //Otherwise, we could not configure the curl session so fail.
			 else { 
			 	$this->throwError("The curl session could not be configured.", __FILE__, __LINE__);
			 }
			 
		 }
		 
		 //Otherwise, we could not open a curl session so fail.
		 else {
			 $this->throwError("A curl session could not be opened.", __FILE__, __LINE__);
		 }
		 
	 }
	 	 
	 
 }
 
 
?>