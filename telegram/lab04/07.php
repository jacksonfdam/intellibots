<?php
require 'vendor/autoload.php';

use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Helpers\Emojify;
use Telegram\Bot\FileUpload\InputFile;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$telegram = new Api();

$inputFile = new InputFile('telegram.png');

$telegram->sendPhoto([
    'chat_id' => getenv('CHAT_ID'),
    //'photo' => $inputFile->open(),
    'photo' => 'http://php.net/manual/en/images/c0d23d2d6769e53e24a1b3136c064577-php_logo.png',
    'caption' => 'PHP!!!'
]);