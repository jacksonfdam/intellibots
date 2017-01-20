<?php
require 'vendor/autoload.php';

use Telegram\Bot\Api;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$telegram = new Api();

$response = $telegram->getMe();

$botId = $response->getId();
$firstName = $response->getFirstName();
$username = $response->getUsername();

var_dump($botId, $firstName, $username);
