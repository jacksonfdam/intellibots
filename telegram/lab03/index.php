<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);

session_start();

header('Content-Type: text/plain; charset=utf-8');
define('BOT_TOKEN', "BOT_TOKEN_ID");


// Instances the class
$telegram = new Telegram(BOT_TOKEN);

$text = $telegram->Text();
$chat_id = $telegram->ChatID();
// Test CallBack
$callback_query = $telegram->Callback_Query();
if ($callback_query !== null && $callback_query != '') {
    $reply = 'Callback value '.$telegram->Callback_Data();
    $content = ['chat_id' => $telegram->Callback_ChatID(), 'text' => $reply];
    $telegram->sendMessage($content);
    $content = ['callback_query_id' => $telegram->Callback_ID(), 'text' => $reply, 'show_alert' => true];
    $telegram->answerCallbackQuery($content);
}
//Test Inline
$data = $telegram->getData();
if ($data['inline_query'] !== null && $data['inline_query'] != '') {
    $query = $data['inline_query']['query'];
    // GIF Examples
    if (strpos('testText', $query) !== false) {
        $results = json_encode([['type' => 'gif', 'id'=> '1', 'gif_url' => 'http://i1260.photobucket.com/albums/ii571/LMFAOSPEAKS/LMFAO/113481459.gif', 'thumb_url'=>'http://i1260.photobucket.com/albums/ii571/LMFAOSPEAKS/LMFAO/113481459.gif']]);
        $content = ['inline_query_id' => $data['inline_query']['id'], 'results' => $results];
        $reply = $telegram->answerInlineQuery($content);
    }
    if (strpos('dance', $query) !== false) {
        $results = json_encode([['type' => 'gif', 'id'=> '1', 'gif_url' => 'https://media.tenor.co/images/cbbfdd7ff679e2ae442024b5cfed229c/tenor.gif', 'thumb_url'=>'https://media.tenor.co/images/cbbfdd7ff679e2ae442024b5cfed229c/tenor.gif']]);
        $content = ['inline_query_id' => $data['inline_query']['id'], 'results' => $results];
        $reply = $telegram->answerInlineQuery($content);
    }
}
// Check if the text is a command
if (!is_null($text) && !is_null($chat_id)) {

    if ($text == "/start") {
        $option = array( array("Produtos"), array("Pedidos", "Carrinho") );
        $keyb = $telegram->buildKeyBoard($option, $onetime=false);
        $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Bem-vindo ao Atendimento da Triplice Store 
            \nUse /produtos - para a listagem de produtos
            \nUse /pedidos - para a listagem dos pedidos
            \nUse /carrinho - para a listagem do carrinho

            ");
        $telegram->sendMessage($content);
    }
    if ($text == "/produtos" || $text == "Produtos" ) {
        $reply = "Listagem de Produtos";
        $content = array('chat_id' => $chat_id, 'text' => $reply);
        $telegram->sendMessage($content);
    }
    if ($text == "/pedidos" || $text == "Pedidos") {
        $reply = "Listagem de Pedidos";
        $content = array('chat_id' => $chat_id, 'text' => $reply);
        $telegram->sendMessage($content);
    }
    if ($text == "/carrinho" || $text == "Carrinho") {
        $reply = "Listagem do Carrinho";
        $content = array('chat_id' => $chat_id, 'text' => $reply);
        $telegram->sendMessage($content);
    }
    if ($text == '/test') {
        if ($telegram->messageFromGroup()) {
            $reply = 'Chat em Grupo';
        } else {
            $reply = 'Chat Privado';
        }
        // Cria opção para o teclado personalizado. Array de array string
        $option = [['A', 'B'], ['C', 'D']];
        $keyb = $telegram->buildKeyBoard($option);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => $reply];
        $telegram->sendMessage($content);
    } elseif ($text == '/site') {
        $reply = 'Confira nossos produtos em https://triplicestore.com.br/';
        // Build the reply array
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $telegram->sendMessage($content);
    } elseif ($text == '/foto') {
        // Load a local file to upload. If is already on Telegram's Servers just pass the resource id
        $img = curl_file_create('bofather.png', 'image/png');
        $content = ['chat_id' => $chat_id, 'photo' => $img];
        $telegram->sendPhoto($content);
        //Download the file just sended
        $file_id = $message['photo'][0]['file_id'];
        $file = $telegram->getFile($file_id);
        $telegram->downloadFile($file['result']['file_path'], './bofather.png');
    } elseif ($text == '/onde') {
        // Brazil   Rio Grande do Sul   Porto Alegre
        $content = ['chat_id' => $chat_id, 'latitude' => '-30.0333', 'longitude' => '-51.2000'];
        $telegram->sendLocation($content);
    } elseif ($text == '/inlinekeyboard') {
        // Shows the Inline Keyboard and Trigger a callback on a button press
        $option = [
                [
                $telegram->buildInlineKeyBoardButton('Callback 1', $url = '', $callback_data = '1'),
                $telegram->buildInlineKeyBoardButton('Callback 2', $url = '', $callback_data = '2'),
                ],
            ];
        $keyb = $telegram->buildInlineKeyBoard($option);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => 'Este é um teste de teclado inline com retornos de chamada'];
        $telegram->sendMessage($content);
    }
}