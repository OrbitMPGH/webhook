<?php 
include('Webhook.php');
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
$wh->build_simpleResponse("Försöker lägga till {$msg}", "Försöker lägga till {$msg}");
$wh->respond();
$hasSent = false;
function wow($songname, $hook){

	if ($hasSent) return;
	
	$fp = fsockopen("0.tcp.eu.ngrok.io", 15756, $errno, $errstr, 30);
	fwrite($fp, "search_queue{$songname}");
	fclose($fp);
	$hasSent = true;
}

?>