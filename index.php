<?php 
include('Webhook.php');
$args = ['projectId' => 'fancy-queue-e0980'];
$wh = new Webhook($args);
$wh->respond_simpleMessage('ta mitt liv');
$wh->endConversation();

?>