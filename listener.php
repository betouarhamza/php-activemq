<?php

use Stomp\StatefulStomp;
use Stomp\Client;
use Stomp\Network\Connection;

require __DIR__ . '/vendor/autoload.php';

$connection = new Connection('tcp://localhost:61613');
$stomp = new StatefulStomp(new Client($connection));

if( !isset($argv[1]) ) {
    echo "error syntax : php listener.php user";
    die;
}

$stomp->subscribe('/tchat-u'.$argv[1]);
while(true){
    echo "In listening for user {$argv[1]}\n";
    /** Frame $message */
    while($message = $stomp->read()){
        $response = json_decode($message->getBody());
        echo "Message from {$response->sender} : '{$response->message}'\n";
    }
}