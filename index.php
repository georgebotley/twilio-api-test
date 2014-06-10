<?php
/**
 * index.php - Twilio
 * 
 * Include the API Initialiser.
 *
 * @author George Botley <george@torindul.co.uk>
 * @version 4301410344
 * @copyright Copyright © 2014, Torindul Business Solutions
 * @package Twilio
 * @subpackage /
 *
 */
 
 //Include the API initialiser.
 include_once "core/init.php";
 
 //$Messages->send_message( array('From' => '+44 1383 630054', 'To' => '+447446954755', 'Body' => "Hello Adam!") );
 //$Messages->get_messages( array('To' => '+447969430926') );
 
 //$Accounts->get_account();
 //$Accounts->search_accounts();
 
 //$Numbers->list_numbers();
 //$Numbers->search_numbers( array('SmsEnabled' => 'True'), 'GB', 'Local' );
 //$Numbers->list_outgoingcallerid();
 //$Numbers->create_outgoingcallerid( '+447757765484' );
 //$Numbers->delete_outgoingcallerid( 'PNd1d357538b75bd810b6292f1c537efe9' );
 //$Numbers->view_outgoingcallerid( 'PNd1d357538b75bd810b6292f1c537efe9' );
 //$Numbers->edit_outgoingcallerid( array('FriendlyName' => 'George Mobile'), 'PNd1d357538b75bd810b6292f1c537efe9' );
 
 //$Calls->make_call( '+447757765484', '+447757765484', 'http://www.torindul.co.uk/twilio/twiml/outbound-test.xml', array('Record' => 'True'));
 //$Calls->get_call_details( 'CAb34eadb826c97af6bab99e2fe359a4bb' );
 //$Calls->get_call_recordings( array(), 'CAb34eadb826c97af6bab99e2fe359a4bb' );
 //$Calls->get_call_recording_transcription( 'RE00f22810a69a1d219df91996b9c2e73f' );
 
 $Twiml = new Twiml();
 $Twiml->say("Hello Monkey");
 echo $Twiml;
 
 
 

?>