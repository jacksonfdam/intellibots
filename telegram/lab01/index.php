<?php
define('BOT_TOKEN', 'SEU TOKEN');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
define('WEATHER_API_URL', 'http://api.openweathermap.org/data/2.5/weather?appid=e036195e96fe8ea62f54d5170035147b&q=');

function getWeather($city){
  $update_response = file_get_contents(WEATHER_API_URL."$city,BR");
  return json_decode($update_response, true);
}

function processMessage($message) {
  // processa a mensagem recebida
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  if (isset($message['text'])) {
    
    $text = $message['text'];//texto recebido na mensagem
    if (strpos($text, "/start") === 0) {
		//envia a mensagem ao usuário
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Olá, '. $message['from']['first_name'].
		'! Eu sou um bot que informa a previsao do tempo na sua cidade? Para começar, escolha qual loteria você deseja ver o resultado', 'reply_markup' => array(
        'keyboard' => array(array('São Paulo', 'Porto Alegre'),array('Curitiba','Florianópolis')),
        'one_time_keyboard' => true)));
    } else if ($text === "São Paulo") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('megasena', $text)));
    } else if ($text === "Porto Alegre") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('quina', $text)));
    } else if ($text === "Florianópolis") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('lotomania', $text)));
    } else if ($text === "Curitiba") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('lotofacil', $text)));
    } else {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Desculpe, mas não entendi essa mensagem. :('));
    }
  } else {
    sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Desculpe, mas só compreendo mensagens em texto'));
  }
}
function sendMessage($method, $parameters) {
  $options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode($parameters),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);


$context  = stream_context_create( $options );
file_get_contents(API_URL.$method, false, $context );
}
//obtém as atualizações do bot
$update_response = file_get_contents(API_URL."getupdates");
$response = json_decode($update_response, true);
$length = count($response["result"]);
//obtém a última atualização recebida pelo bot
$update = $response["result"][$length-1];
if (isset($update["message"])) {
  processMessage($update["message"]);
}
print_r(getWeather('Porto Alegre'));

?>