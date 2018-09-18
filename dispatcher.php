<?php

use Stomp\StatefulStomp;
use Stomp\Client;
use Stomp\Network\Connection;
use Stomp\Transport\Message;
use \Stomp\Transport\Frame;

require __DIR__ . '/vendor/autoload.php';

$connection = new Connection('tcp://localhost:61613');
$stomp = new StatefulStomp(new Client($connection));

$stomp->subscribe('/tchat');

while(true){
    echo "In listening\n";
    /** Frame $message */
    while($message = $stomp->read()){
        $response = json_decode($message->getBody());
    
        $stomp->send(
            '/tchat-u' . $response->receiver, new Message($message->getBody())
        );
    
        echo "Message from {$response->sender} to {$response->receiver} sended\n";
    }
}