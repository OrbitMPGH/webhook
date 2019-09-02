<?php 
include('Webhook.php');
$args = ['projectId' => 'fancy-queue-e0980'];
$wh = new Webhook($args);
$msg = "döda mig";
$wh->build_simpleResponse($msg, $msg);
$wh->respond();

?>