<?php 
include('Webhook.php');
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
$wh->build_simpleResponse("Försöker lägga till " + $msg, "Försöker lägga till " + $msg);
$wh->respond();


?>