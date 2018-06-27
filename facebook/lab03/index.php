<?php

if (file_exists(__DIR__.'/config.php')) {
    $config = include __DIR__.'/config.php';
    $verify_token = $config['verify_token'];
    $token = $config['token'];
}

require_once(dirname(__FILE__) . '/vendor/autoload.php');


use intellibots\FbBotApp;
use intellibots\Messages\Message;
use intellibots\Messages\ImageMessage;
use intellibots\UserProfile;
use intellibots\Messages\MessageButton;
use intellibots\Messages\StructuredMessage;
use intellibots\Messages\MessageElement;
use intellibots\Messages\MessageReceiptElement;
use intellibots\Messages\Address;
use intellibots\Messages\Summary;
use intellibots\Messages\Adjustment;

$bot = new FbBotApp($token);
if (!empty($_REQUEST['local'])) {
    $message = new ImageMessage(1585388421775947, dirname(__FILE__).'/Messages-256.png');
    $message_data = $message->getData();
    $message_data['message']['attachment']['payload']['url'] = 'Messages-256.png';
        echo '<pre>', print_r($message->getData()), '</pre>';
    $res = $bot->send($message);
    echo '<pre>', print_r($res), '</pre>';
}
if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) {
    echo $_REQUEST['hub_challenge'];
} else {
    $data = json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
    if (!empty($data['entry'][0]['messaging'])) {
        foreach ($data['entry'][0]['messaging'] as $message) {
            if (!empty($message['delivery'])) {
                continue;
            }
            
            
            if (($message['message']['is_echo'] == "true")) {
                continue;
            }
            
            $command = "";
            if (!empty($message['message'])) {
                $command = $message['message']['text'];
            } else if (!empty($message['postback'])) {
                $command = $message['postback']['payload'];
            }
            switch ($command) {
                case 'text':
                    $bot->send(new Message($message['sender']['id'], 'Esta é uma mensagem de texto simples.'));
                    break;
                case 'image':
                    $bot->send(new ImageMessage($message['sender']['id'], 'https://cdn.dribbble.com/users/100203/screenshots/2645012/botlist-logo_1x.png'));
                    break;
                case 'local image':
                    $bot->send(new ImageMessage($message['sender']['id'], dirname(__FILE__).'/Messages-256.png'));
                    break;
                case 'profile':
                    $user = $bot->userProfile($message['sender']['id']);
                    $bot->send(new StructuredMessage($message['sender']['id'],
                        StructuredMessage::TYPE_GENERIC,
                        [
                            'elements' => [
                                new MessageElement($user->getFirstName()." ".$user->getLastName(), " ", $user->getPicture())
                            ]
                        ]
                    ));
                    break;
                case 'button':
                  $bot->send(new StructuredMessage($message['sender']['id'],
                      StructuredMessage::TYPE_BUTTON,
                      [
                          'text' => 'Escolha sua Categoria',
                          'buttons' => [
                              new MessageButton(MessageButton::TYPE_POSTBACK, 'Categoria 01'),
                              new MessageButton(MessageButton::TYPE_POSTBACK, 'Categoria 02'),
                              new MessageButton(MessageButton::TYPE_POSTBACK, 'Categoria 03')
                          ]
                      ]
                  ));
                break;
                case 'generic':
                    $bot->send(new StructuredMessage($message['sender']['id'],
                        StructuredMessage::TYPE_GENERIC,
                        [
                            'elements' => [
                                new MessageElement("Primeiro item", "Descrição do item", "", [
                                    new MessageButton(MessageButton::TYPE_POSTBACK, 'Primeiro botão'),
                                    new MessageButton(MessageButton::TYPE_WEB, 'Web link', 'http://facebook.com')
                                ]),
                                new MessageElement("Segundo item", "Descrição do item", "", [
                                    new MessageButton(MessageButton::TYPE_POSTBACK, 'Primeiro botão'),
                                    new MessageButton(MessageButton::TYPE_POSTBACK, 'Segundo botão')
                                ]),
                                new MessageElement("Terceiro item", "Descrição do item", "", [
                                    new MessageButton(MessageButton::TYPE_POSTBACK, 'Primeiro botão'),
                                    new MessageButton(MessageButton::TYPE_POSTBACK, 'Segundo botão')
                                ])
                            ]
                        ]
                    ));
                    
                break;
                case 'receipt':
                    $bot->send(new StructuredMessage($message['sender']['id'],
                        StructuredMessage::TYPE_RECEIPT,
                        [
                            'recipient_name' => 'Jackson Mafra',
                            'order_number' => rand(10000, 99999),
                            'currency' => 'BRL',
                            'payment_method' => 'VISA',
                            'order_url' => 'http://facebook.com',
                            'timestamp' => time(),
                            'elements' => [
                                new MessageReceiptElement("Produto 01", "Descrição do produto", "", 1, 300, "BRL"),
                                new MessageReceiptElement("Produto 02", "Descrição do produto", "", 2, 200, "BRL"),
                                new MessageReceiptElement("Produto 03", "Descrição do produto", "", 3, 1800, "BRL"),
                            ],
                            'address' => new Address([
                                'country' => 'US',
                                'state' => 'CA',
                                'postal_code' => 94025,
                                'city' => 'Menlo Park',
                                'street_1' => '1 Hacker Way',
                                'street_2' => ''
                            ]),
                            'summary' => new Summary([
                                'subtotal' => 2300,
                                'shipping_cost' => 150,
                                'total_tax' => 50,
                                'total_cost' => 2500,
                            ]),
                            'adjustments' => [
                                new Adjustment([
                                    'name' => 'Desconto de 20%',
                                    'amount' => 20
                                ]),
                                new Adjustment([
                                    'name' => 'Disconto de 10%',
                                    'amount' => 10
                                ])
                            ]
                        ]
                    ));
                break;
                case 'set menu':
                    $bot->setPersistentMenu([
                        new MessageButton(MessageButton::TYPE_WEB, "Primeiro link", "http://google.com"),
                        new MessageButton(MessageButton::TYPE_WEB, "Segundo link", "http://yahoo.com")
                    ]);
                break;
                case 'delete menu':
                    $bot->deletePersistentMenu();
                break;
                default:
                    if (!empty($command)) 
                    $bot->send(new Message($message['sender']['id'], 'Desculpe. Eu não entendo você.'));
            }
        }
    }
}