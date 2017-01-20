<?php
require 'vendor/autoload.php';

use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Helpers\Emojify;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$telegram = new Api();

$reply_markup = Keyboard::make();
$reply_markup->inline();
$reply_markup->row(
    Keyboard::inlineButton([
        'text' => Emojify::text(':see_no_evil:') . ' Será anônimo ' . Emojify::text(':speak_no_evil:'),
        'callback_data' => '/anonymous sdfds'
    ])
);
$reply_markup->row(
    Keyboard::inlineButton([
        'text' => Emojify::text(':bulb:').'Eu',
        'switch_inline_query_current_chat' => 'deslike'
    ]),
    Keyboard::inlineButton([
        'text' => Emojify::text(':heart:').'Outro',
        'switch_inline_query' => 'Like!'
    ]),
    Keyboard::inlineButton([
        'text' => Emojify::text(':link:').'PHP',
        'url' => 'http://php.net'
    ])
);

$telegram->sendMessage([
    'chat_id' => getenv('CHAT_ID'),
    'text' =>
        '<b>bold</b> ' .
        '<i>italic</i> ' .
        '<a href="phprio.org">PHPRio</a> ' .
        '<code>fixed-width</code>' .
        '<pre>code block</pre>',
    'parse_mode' => 'HTML',
    'disable_web_page_preview' => true,
    'reply_markup' => $reply_markup
]);
