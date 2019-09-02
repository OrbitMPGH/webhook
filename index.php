<?php 
include('Webhook.php');
$fp = fsockopen("0.tcp.eu.ngrok.io", 15756, $errno, $errstr, 30);
fwrite($fp, "wazza");
fclose($fp);
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
$wh->build_simpleResponse($msg, $msg);
$wh->respond();

?>