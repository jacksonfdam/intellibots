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
	'facebook' => [
		'token' => 'EAAByYnBlfsMBAI3Vc5EY30coTjaGKWJnkfPjQKR93lTFcFcMpzkzuMtEEiGD8zeZCSlRmTZCax5ItrKzRigV63jN0mVOgB2QZB5arEujvwLXZC4FZBMG1av2Oa1LfO3KfPyfDiTq5ENDGl2HOpIAmeHuD5C1PYTNiC2Vy0kIXFpI477wQGDZCZB',
		'app_secret' => '4b6d2914a6e78c1f2aa2fcbfda08442b',
		'verification'=>'curso_bots'
	]
];

//$config  = [];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
	$bot->reply('Hello yourself.');
});


// Start listening
$botman->listen();