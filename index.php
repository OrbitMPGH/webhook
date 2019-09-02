<?php 
include('Webhook.php');
$serverip = "typ ngrok eller nått";
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
$wh->build_simpleResponse("Försöker lägga till {$msg}", "Försöker lägga till {$msg}");
$wh->endConversation();
$wh->respond();
$hasSent = false;
wow($msg, $wh);

function wow($songname, $hook){

	if ($hasSent) return;
	
	$fp = fsockopen($serverip, 15756, $errno, $errstr, 30);
	fwrite($fp, utf8_encode("search_queue{$songname}"));
	fclose($fp);
	$hasSent = true;
	return;
}

?>