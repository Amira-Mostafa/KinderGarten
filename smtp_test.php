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

// <!doctype html>
// <html lang="en">

// <head>
// </head>

// <body>
//     <div class="container" style=" width: 50vw;">

//         <table class="table">
//             <tr>
//                 <td>From: </td>
//                 <td>{{$name}}</td>
//             </tr>
//             <tr>
//                 <td>Email: </td>
//                 <td>{{$email}}</td>
//             </tr>
//             <tr>
//                 <td>Subject: </td>
//                 <td>{{$subject}}</td>
//             </tr>
//         </table>

//         <div style="border: 1px solid #e5e5e5; border-radius: 4px; padding: 30px 20px">{{ $messages }}</div>


//     </div>

// </body>

// </html>