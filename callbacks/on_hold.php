<?php

//Include the API
include_once "../core/init.php";

header('Content-type: application/xml');

$Twiml = new Twiml();
$Twiml->Play('http://www.torinet.co.uk/twilio/callbacks/a-bright-new-day.mp3', array('loop' => '0') );
echo $Twiml;

?>