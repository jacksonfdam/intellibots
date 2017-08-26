<?php
setlocale(LC_TIME, "pt_BR");
date_default_timezone_set('America/Sao_Paulo');

/*

https://developers.facebook.com/docs/messenger-platform/send-api-reference/templates

*/
define('BOT_TOKEN', "EAARnxkZCzY10BAAmBwMZC22ADQbgPzxU2berWP4iHF202KrSkbCf05bh4zr9TgAzufCly7arjHiAqmyfZBHnZBvsEvfYs5J2TElDoZB8Ir4NHoVebZC9pDFqGZB14rY1z4HYtL3BhzfXhSUbjJO6WCY8VHWXQrvJx8vq1wSpU2WEAZDZD");
define('VERIFY_TOKEN', "curso_intellibots");
define('API_URL', 'https://graph.facebook.com/v2.6/me/messages?access_token='.BOT_TOKEN);


if ($_REQUEST['hub_verify_token'] === VERIFY_TOKEN) {
	echo $_REQUEST['hub_challenge'];
	exit;
}


function getUsuario($USER_ID){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.6/'.$USER_ID.'?fields=first_name,last_name&access_token='.BOT_TOKEN);
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result);
}
$input = json_decode(file_get_contents('php://input'), true);
$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];
$messageType = isset($input['entry'][0]['messaging'][0]['message']['attachments'][0]['type']) ? $input['entry'][0]['messaging'][0]['message']['attachments'][0]['type'] : '';
$response = null;

if($messageType=='location'){
	$attachment = $input['entry'][0]['messaging'][0]['message']['attachments'][0];
	$answer = "Olá ".getUsuario($senderId)->first_name ." você está na ".$attachment['title']." ?";
	$response = [
		'recipient' => [ 'id' => $senderId ],
		'message' => [ 'text' => $answer ]
	];
}

if($messageText == "hi") {
	$answer = "Hello ".getUsuario($senderId)->first_name;
	$response = [
		'recipient' => [ 'id' => $senderId ],
		'message' => [ 'text' => $answer ]
	];
}

if($messageText == "phpconference"){
     $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"generic",
        "elements"=>[
          [
            "title"=>"PHP Conference Brasil 2017",
            "item_url"=>"http://phpconference.com.br/",
            "image_url"=>"http://phpconference.com.br/media/images/noticia/med/3040c720eec335dd86a754f43bb20a20.png",
            "subtitle"=>"O principal evento de php da américa latina",
            "buttons"=>[
              [
                "type"=>"web_url",
                "url"=>"http://phpconference.com.br/",
                "title"=>"Visitar"
              ],
              [
                "type"=>"postback",
                "title"=>"Tirar Dúvidas",
                "payload"=>"tenho_duvidas"
              ]              
            ]
          ]
        ]
      ]
    ]];
     $response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => $answer 
];
}

if($messageText == "Tirar Dúvidas") {
	$answer = "Olá, ".getUsuario($senderId)->first_name.", que dúvidas você tem?";
	$response = [
		'recipient' => [ 'id' => $senderId ],
		'message' => [ 'text' => $answer ]
	];
}

if($messageText == "cursos"){
 $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"list",
        "elements"=>[
          [
             "title"=> "ChatBots: Intelligent Bots - Aprenda a Desenvolver ChatBots ",
                    "image_url"=> "https://static.wixstatic.com/media/faf3fd_0b274f61f1eb4c12a54920baf56bbe7e~mv2.jpg/v1/fill/w_243,h_132,al_c,q_80,usm_0.66_1.00_0.01/faf3fd_0b274f61f1eb4c12a54920baf56bbe7e~mv2.webp",
                    "subtitle"=> "Presencial São Paulo  |   EAD ao vivo",
                    "default_action"=> [
                        "type"=> "web_url",
                        "url"=> "https://www.temporealeventos.com.br/intelligent-bots-presencial",                       
                        "webview_height_ratio"=> "tall"
                    ],
            "buttons"=>[
              [
                "type"=>"web_url",
                "url"=>"https://www.temporealeventos.com.br/intelligent-bots-presencial",
                "title"=>"Conferir"
              ],
            ]
          ],
            [
            "title"=>"Amazon AWS  | Virtualização vs Cloud Computing",
            "item_url"=>"https://www.temporealeventos.com.br/amazon-aws-treinamento-presencial",
            "image_url"=>"https://static.wixstatic.com/media/faf3fd_0b274f61f1eb4c12a54920baf56bbe7e~mv2.jpg/v1/fill/w_243,h_132,al_c,q_80,usm_0.66_1.00_0.01/faf3fd_0b274f61f1eb4c12a54920baf56bbe7e~mv2.webp",
            "subtitle"=>"Presencial São Paulo ",
            "buttons"=>[
              [
                "type"=>"web_url",
                "url"=>"https://www.temporealeventos.com.br/amazon-aws-treinamento-presencial",
                "title"=>"Conferir"
              ],
            ]
          ]
        ]
      ]
    ]];
  $response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => $answer
];}

if($messageText == "sobre") {  
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>"Quer conhecer melhor a Tempo Real Eventos?",
        "buttons"=>[
          [
            "type"=>"web_url",
            "url"=>"https://www.temporealeventos.com.br/sobre-a-tempo-real-eventos",
            "title"=>"Conhecer"
          ],
          [
            "type"=>"postback",
            "title"=>"Comprar Curso",
            "payload"=>"comprar_curso"
          ]
        ]
      ]
      ]];
      $response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => $answer
];
}


$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
if(!empty($input)){
	$result = curl_exec($ch);
}
curl_close($ch);