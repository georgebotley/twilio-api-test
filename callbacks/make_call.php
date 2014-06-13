<?php

//Include the API
include_once "../core/init.php";

header('Content-type: application/xml');

$Twiml = new Twiml();

$Twiml->Pause( array('length' => '3') );
$Twiml->Enqueue( 'Torindul Designs', array('waitUrl' => 'http://www.torinet.co.uk/twilio/callbacks/on_hold.php') );

echo $Twiml;

?>