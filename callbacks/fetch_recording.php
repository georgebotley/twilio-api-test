<?php

$recording = $_GET["RecordingUrl"];
$from = $_GET["From"];
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: george@torindul.co.uk' . "\r\n";

$body = "Hello Ryan, 

<br /><br />

You have received a new voicemail from $from.

<br /><br />

<strong>They said:</strong><br />
$transcribe

<br /><br />

For a copy of the voicemail, please go to $recording";

mail("ryan14williams@gmail.com", "New voicemail", $body, $headers);

?>