<?php
$smtp_host = 'sandbox.smtp.mailtrap.io';
$smtp_port = 587;
$timeout = 30;

echo "Attempting to connect to $smtp_host on port $smtp_port...\n";

$socket = @fsockopen($smtp_host, $smtp_port, $errno, $errstr, $timeout);
if (!$socket) {
	echo "Failed to connect: $errno - $errstr\n";
} else {
	echo "Connection successful!\n";
	$response = fgets($socket, 515);
	echo "Server response: $response\n";
	fclose($socket);
}
