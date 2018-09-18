<?php

use Stomp\StatefulStomp;
use Stomp\Client;
use Stomp\Network\Connection;

require __DIR__ . '/vendor/autoload.php';

$connection = new Connection('tcp://localhost:61613');
$stomp = new StatefulStomp(new Client($connection));

if( !isset($argv[1]) ) {
    echo "error syntax : php sender.php user";
    die;
}