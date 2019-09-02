<?php 
include('Webhook.php');
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, "91.214.90.130", 100)
        or onSocketFailure("Failed to connect to 91.214.90.130:100", $socket);
$args = ['projectId' => 'fancy-queue-e0980'];
socket_write($socket, "wazza");
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
$wh->build_simpleResponse($msg, $msg);
$wh->respond();

?>