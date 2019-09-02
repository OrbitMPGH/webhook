<?php 
include('Webhook.php');
wow();


function wow(){
	$wh = new Webhook($args);
	$msg = $wh->get_parameter('text');
	$fp = fsockopen("0.tcp.eu.ngrok.io", 15756, $errno, $errstr, 30);
	fwrite($fp, "search_queue" + $msg);
	$line = socket_read($socket, 1024, PHP_NORMAL_READ);
    if(substr($line, -1) === "\r") {
        // read/skip one byte from the socket
        // we assume that the next byte in the stream must be a \n.
        // this is actually bad in practice; the script is vulnerable to unexpected values
		socket_read($socket, 1, PHP_BINARY_READ);
	}
	$message = parseLine($line);
	$wh->build_simpleResponse($message, $message);
	$wh->respond();
	fclose($fp);
}

?>