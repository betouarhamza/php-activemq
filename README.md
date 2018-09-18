# Stomp with PHP & ActiveMQ

***This project work only with command line interface***

## Installation

### Install depedencies

    composer install

### Launch ActiveMQ

    {dir_to_activemq}/bin/activemq start

### Launch Dispacher

    php dispacher.php

## Documentation

### Send message

    php sender.php sender receiver "message"
    example 1 : php sender.php 1 2 "Hello"
    example 2 : php sender.php 2 1 "Hi, How are you ?"

### Listening for a user

    php listener.php user
    example : php listener.php 1