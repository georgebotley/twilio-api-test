<?php

/**
 * config.php - Twilio
 * 
 * Twilio API Configuration
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright � 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage config
 *
 */
 
/**
 * API Configuration Options
 *
 * - API_LOCAL_LOCATION 		= The URI of the parent folder where the local API files reside, excluding the protocol.
 * - API_REMOTE_LOCATION 		= The url in which to communicate with the API, excluding the protocol.
 * - API_ACCOUNT_SID 			= The account SID hash. Can be found in the Twilio dashboard.
 * - API_ACCOUNT_TOKEN 			= The account token. Can be found in the Twilio dashboard.
 * - PHP_ERRORS 				= Shall we show PHP errors? 1 = yes, 0 = no.
 */
 define("API_LOCAL_LOCATION", "www.torindul.co.uk/twilio");
 define("API_REMOTE_LOCATION", "api.twilio.com/2010-04-01"); 
 define("API_PROTOCOL", "https://");
 define("API_ACCOUNT_SID", "AC718634fa7cc8856c75633f50526c0141"); 
 define("API_ACCOUNT_TOKEN", "f84db14b022fa60fe33339e7f28cc07a"); 
 define("PHP_ERRORS", 1);
 
 
 ?>
