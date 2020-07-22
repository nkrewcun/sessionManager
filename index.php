<?php

require_once 'class/includes.php';

$session = new Session();

$session->toto = 'Toto';
$session->taille = 165;
$session->age = 10;
$session->user = new User('Nathan', '123456');

echo 'Ma variable $_SESSION<br>';
var_dump($_SESSION);

echo 'Le petit get de l\'objet user';
var_dump($session->user);

echo 'unset de toto et test avec isset';
unset($session->toto);
var_dump(isset($session->toto));
