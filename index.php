<?php 
include('Webhook.php');
$wh = new Webhook($args);
$msg = $wh->get_parameter('text');
wow($msg, $wh);


function wow($songname, $hook){
	
	$fp = fsockopen("0.tcp.eu.ngrok.io", 15756, $errno, $errstr, 30);
	fwrite($fp, "search_queue" + $songname);
	$line = socket_read($socket, 1024, PHP_NORMAL_READ);
    if(substr($line, -1) === "\r") {
        // read/skip one byte from the socket
        // we assume that the next byte in the stream must be a \n.
        // this is actually bad in practice; the script is vulnerable to unexpected values
		socket_read($socket, 1, PHP_BINARY_READ);
	}
	$message = parseLine($line);
	$hook->build_simpleResponse($message, $message);
	$hook->respond();
	fclose($fp);
}

?>