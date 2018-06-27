<?php

function generateRandom($min = 1, $max = 20) {
	if (function_exists('random_int')):
        return random_int($min, $max); // more secure
    elseif (function_exists('mt_rand')):
        return mt_rand($min, $max); // faster
    endif;
    return rand($min, $max); // old
}

function getResult($numero){
	$out = "";
	$escolha = generateRandom(1,20);
	if($numero == $escolha){
		$out = "Você acertou! $numero = $escolha";
	}else{
		$out = "Você errou! $numero != $escolha";
	}
	return json_encode(array("speech" => $out,  "displayText" => $out));
}

$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["parameters"]["numero"])) {
	echo getResult($update["result"]["parameters"]["numero"]);
}
?>