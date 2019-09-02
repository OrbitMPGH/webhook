<?php 
include('Webhook.php');
$serverip = "0.tcp.eu.ngrok.io";
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
$wh->build_simpleResponse("Försöker lägga till {$msg}", "Försöker lägga till {$msg}");
$wh->endConversation();
$wh->respond();
wow($msg, $wh);

function wow($songname, $hook){	
	$fp = fsockopen("0.tcp.eu.ngrok.io", 17796, $errno, $errstr, 30);
	fwrite($fp, utf8_encode("search_queue{$songname}"));
	fclose($fp);
}

?>