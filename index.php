<?php

require_once 'class/includes.php';

$session = new Session();

$session->toto = 'Toto';
$session->taille = 165;
$session->age = 10;
$session->user = new User('Nathan', '123456');

echo 'Ma variable $_SESSION avant le save<br>';
var_dump($_SESSION);

echo 'Ma variable $_SESSION après le save<br>';
$session->save();
var_dump($_SESSION);

echo 'Ma variable $_SESSION après le destruct<br>';
$session->destruct();
var_dump($_SESSION);
