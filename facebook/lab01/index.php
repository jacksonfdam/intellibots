	<?php

	//setlocale(LC_TIME, "pt_BR");
	//date_default_timezone_set('America/Sao_Paulo');

	$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
	$diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");

	/* 
	https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received 

	*/

	define('BOT_TOKEN', "");
	define('VERIFY_TOKEN', "curso_intellibots");
	define('API_URL', 'https://graph.facebook.com/v2.6/me/messages?access_token='.BOT_TOKEN);
	define('WEATHER_API_URL', 'http://api.openweathermap.org/data/2.5/weather?appid=e036195e96fe8ea62f54d5170035147b&q=');

	/*
	Teste Tambem:
	curl -X POST "https://graph.facebook.com/v2.6/me/subscribed_apps?access_token=<BOT_TOKEN>"

	*/
	$hub_verify_token = null;

	/*-----VEFICA O WEBHOOK-----*/
	if(isset($_REQUEST['hub_challenge'])) {
		$challenge = $_REQUEST['hub_challenge'];
		$hub_verify_token = $_REQUEST['hub_verify_token'];
	}
	if ($hub_verify_token === VERIFY_TOKEN) {
		echo $challenge;
	}
	/*-----FIM VERIFICAÇÃO-----*/

	$hub_verify_token = null;

	function getWeather($city){
		$url = WEATHER_API_URL."$city,BR&lang=pt&units=metric";
		$cURL = curl_init($url);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true); 
		$resultado = curl_exec($cURL);              
		return json_decode($resultado, true);
	}

	function processMessage($message) {

		$sender = $message['sender']['id'];
		$text = $message['message']['text'];

		if (isset($text)) {

			if(preg_match('[data|hora|agora]', strtolower($text))) {
				ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
				$hoje = getdate();
				$dia = $hoje["mday"];
				$mes = $hoje["mon"];
				$nomemes = $meses[$mes];
				$ano = $hoje["year"];
				$diadasemana = $hoje["wday"];
				$nomediadasemana = $diasdasemana[$diadasemana];
				$result = "São ". date("H:i") . " de $nomediadasemana, $dia de $nomemes de $ano";
				if($result != '') {
					sendMessage(array('recipient' => array('id' => $sender), 'message' => array('text' => $result)));
				}
			} else if(preg_match('[tempo]', strtolower($text))) {
				/* echo "O usuário buscou por '$text'"; */
				$dados = explode(" em ",$text);
				/* 
				$dados[0]  -> Contem a Intenção do Usuário
				$dados[1]  -> Contem a Entidade
				*/
				if(isset($dados[1]) && !empty($dados[1])){
					$cidade = getWeather($dados[1]);
					$result = "Hoje a condição em ".$cidade['name']." é de ".$cidade ['weather'][0]['description'].", com temperatura de " . $cidade ['main']['temp']." com miníma de ".$cidade ['main']['temp_min']." e máxima de ".$cidade ['main']['temp_max']."";

					if($result != '') {
						sendMessage(array('recipient' => array('id' => $sender), 'message' => array('text' => $result)));
					}
				}else{
					sendMessage(array('recipient' => array('id' => $sender), 'message' => array('text' => 'Desculpe não compreendi a cidade.')));
				}

			} else {
				sendMessage(array('recipient' => array('id' => $sender), 'message' => array('text' => 'Olá! Eu sou um bot do curso de Intellibots')));
			}
			
		} 
	}
	function sendMessage($parameters) {
		$options = array(
			'http' => array(
				'method'  => 'POST',
				'content' => json_encode($parameters),
				'header'=>  "Content-Type: application/json\r\n" .
				"Accept: application/json\r\n"
				)
			);
		$context  = stream_context_create( $options );
		file_get_contents(API_URL, false, $context );
	}

	$update_response = file_get_contents("php://input");
	$update = json_decode($update_response, true);
	if (isset($update['entry'][0]['messaging'][0])) {
		processMessage($update['entry'][0]['messaging'][0]);
	}