<?php
define('BOT_TOKEN', 'BOT_TOKEN_ID');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
define('WEATHER_API_URL', 'http://api.openweathermap.org/data/2.5/weather?appid=e036195e96fe8ea62f54d5170035147b&q=');
ini_set("allow_url_fopen", true);

function curl_get_contents($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function logIt($data) {
	error_log(PHP_EOL."User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.print_r($data,true), 3, $_SERVER['DOCUMENT_ROOT']."/data.log");
}

logIt( $rawData = file_get_contents("php://input"));

?>