<?php

require_once(dirname(__FILE__) . '/vendor/autoload.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);

session_start();

header('Content-Type: text/plain; charset=utf-8');

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;


function logIt($message){
	$logfile = fopen("log-".date('Y-m-d') .'.log', "a") or die("Unable to open file!");
	fwrite($logfile, "\n".date('Y-m-d H:i:s').' | '. $message);
	fclose($logfile);
}


$config = [
	"telegram" => [
		"token" => "TOKEN"
	],
	'facebook' => [
		'token' => 'BOT_TOKEN',
		'app_secret' => 'FACEBOOK-APP-SECRET',
		'verification'=>'VERIFY_TOKEN',
	]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('ola', function (BotMan $bot) {
	$bot->reply('Olá usuário');
});

$botman->hears('Eu quero ([0-9]+) itens', function ($bot, $number) {
    $bot->reply('Você terá: '.$number.' items');
});

$botman->fallback(function($bot) {
    $bot->reply('Desculpe, eu não entendi esses comandos. Aqui está uma lista de comandos que eu entendo: ...');
});

// Start listening
$botman->listen();