<?php
require 'vendor/autoload.php';

use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

if(file_exists('.env')) {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
    class mockApi extends Api{
        public function getWebhookUpdates($emitUpdateWasReceivedEvent = true) {
            return new Update(json_decode(getenv('MOCK_JSON'), true));
        }
    }
    $telegram = new mockApi();
} else {
    error_log(file_get_contents('php://input'));
    $telegram = new Api();
}

$update = $telegram->getWebhookUpdates();
if($update->has('message')) {
    $message = $update->getMessage();
    if($message->has('text')) {
        switch($text = $message->getText()) {
            case '/about':
                $telegram->sendMessage([
                    'chat_id' => $message->getChat()->getId(),
                    'text' => 'Sobre alguma coisa',
                    'reply_to_message_id' => $message->getMessageId()
                ]);
                break;
            case '/start':
            case (preg_match('/^\/start (?<token>[a-f0-9]{32})/', $text, $matches) ? true : false):
                break;
        }
    } elseif($message->has('location')) {
        $location = $message->getLocation();
        $url = 'http://maps.googleapis.com/maps/api/geocode/json?'.
            'latlng='.$location->getLatitude().','.$location->getLongitude().'&sensor=false&language=pt';
        if($response = \file_get_contents($url)) {
            $response = json_decode($response, true);
            if($response['status'] == 'OK') {
                if (isset($response['results'][0]['address_components'])) {
                    $cep = array_filter(
                        $response['results'][0]['address_components'],
                        function($var) {
                            return in_array('postal_code', $var['types']);
                        }
                    );
                    if($cep) {
                        $cep = current($cep);
                        $cep = $cep['long_name'];
                        $telegram->sendMessage([
                            'chat_id' => $message->getChat()->getId(),
                            'text' => 'Seu CEP é: '. $cep,
                        ]);
                    }
                }
            }
        }
        if(!$cep) {
            $telegram->sendMessage([
                'chat_id' => $message->getChat()->getId(),
                'text' => 'Não descobri seu CEP :cry:',
            ]);
        }
    }
}