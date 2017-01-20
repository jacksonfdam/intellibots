<?php
require 'vendor/autoload.php';

use Telegram\Bot\Api;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$telegram = new Api();

$telegram->sendMessage([
    'chat_id' => getenv('CHAT_ID'),
    'text' =>
        '<b>bold</b> ' .
        '<i>italic</i> ' .
        '<a href="phprio.org">PHPRio</a> ' .
        '<code>fixed-width</code>' .
        '<pre>code block</pre>',
    'parse_mode' => 'HTML',
    'disable_web_page_preview' => true
]);