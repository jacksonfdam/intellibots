<?php
require 'vendor/autoload.php';

use Telegram\Bot\Api;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

function logIt($data) {
	error_log(PHP_EOL."User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.print_r($data,true), 3, "data.log");
}

$telegram = new Api();

$response = $telegram->getMe();

$botId = $response->getId();
$botId = $response->getChatId();
$firstName = $response->getFirstName();
$username = $response->getUsername();


logIt("$botId, $firstName, $username");
//var_dump($botId, $firstName, $username);
