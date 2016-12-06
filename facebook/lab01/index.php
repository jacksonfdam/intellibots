	<?php
	/* 
	https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received 

	*/

	define('BOT_TOKEN', "EAAaki53jQwMBAGgy1sDUkjR0tQOyDFcVbKk1vavact1wiQ1dszOrAPiUuZCzdOL8bZCoVDdO9KpgqRyfVXSUEySUYwBgG6pijLRg0UC5AFG3MIxUMOAJarKPfvbBq58uIWXwdRZAxQeCACfhCCYbKQ2ccAvIPGVZAZAIXlcFJDAZDZD");
	define('VERIFY_TOKEN', "curso_intellibots");
	define('API_URL', 'https://graph.facebook.com/v2.6/me/messages?access_token='.BOT_TOKEN);

	/*
	Teste Tambem:
	curl -X POST "https://graph.facebook.com/v2.6/me/subscribed_apps?access_token=EAAaki53jQwMBAGgy1sDUkjR0tQOyDFcVbKk1vavact1wiQ1dszOrAPiUuZCzdOL8bZCoVDdO9KpgqRyfVXSUEySUYwBgG6pijLRg0UC5AFG3MIxUMOAJarKPfvbBq58uIWXwdRZAxQeCACfhCCYbKQ2ccAvIPGVZAZAIXlcFJDAZDZD"

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

	function processMessage($message) {

		$sender = $message['sender']['id'];
		$text = $message['message']['text'];

		if (isset($text)) {

			if(preg_match('[data|hora|agora]', strtolower($text))) {
				ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
				$result = file_get_contents("http://www.timeapi.org/utc/now?format=%25a%20%25b%20%25d%20%25I:%25M:%25S%20%25Y");
				if($result != '') {
					sendMessage(array('recipient' => array('id' => $sender), 'message' => array('text' => $result)));
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