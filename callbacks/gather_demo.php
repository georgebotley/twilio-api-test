<?php

//Include the API
include_once "../core/init.php";

header('Content-type: application/xml');

$digits = $_POST["Digits"];

$Twiml = new Twiml();



echo $Twiml;

?>