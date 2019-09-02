<?php 
include('Webhook.php');
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
if($msg == "dab")
{
	wow();
}
$wh->build_simpleResponse($msg, $msg);
$wh->respond();

function wow(){
	$fp = fsockopen("0.tcp.eu.ngrok.io", 15756, $errno, $errstr, 30);
	fwrite($fp, "queue");
	fclose($fp);
}

?>