<?php

use Stomp\StatefulStomp;
use Stomp\Client;
use Stomp\Network\Connection;
use Stomp\Transport\Message;

require __DIR__ . '/vendor/autoload.php';

$connection = new Connection('tcp://localhost:61613');
$stomp = new StatefulStomp(new Client($connection));

if( !isset($argv[1]) || !isset($argv[2]) || !isset($argv[3]) ) {
    echo "error syntax : php sender.php user receiver message";
    die;
}

$user = $argv[1];
$receiver = $argv[2];
$message = $argv[3];

$body = json_encode([
    'sender' => $user,
    'receiver' => $receiver,
    'message' => $message,
    'createdAt' => new DateTime(),
]);

$stomp->send(
    '/tchat', new Message($body)
);
echo "Message sended";
