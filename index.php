<?php 
include('Webhook.php');
$args = ['projectId' => 'fancy-queue-e0980'];
$wh = new Webhook($args);
$msg = $wh->get_parameter('any');
$wh->build_simpleResponse($msg, $msg);
$wh->respond();

?>