<?php
/**
 * Telegram Cowsay Bot Example.
 * Add @cowmooobot to try it!
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 */
include("Telegram.php");
// Set the bot TOKEN
$bot_id = "";
// Instances the class
$telegram = new Telegram($bot_id);
/* If you need to manually take some parameters
*  $result = $telegram->getData();
*  $text = $result["message"] ["text"];
*  $chat_id = $result["message"] ["chat"]["id"];
*/
// Take text and chat_id from the message
$text = $telegram->Text();
$chat_id = $telegram->ChatID();
if ($text == "/start") {
    $option = array( array("Produtos"), array("Pedidos", "Carrinho") );
    // Create a permanent custom keyboard
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
?>