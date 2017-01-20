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

$telegram->sendContact([
    'chat_id' => getenv('CHAT_ID'),
    'phone_number' => '552199999999',
    'first_name' => 'José das Couves'
]);