<?php
/*
 * PROCESSANDO A MENSAGEM 
 */
function processMessage($update) {
    if ($update["result"]["action"] == "consulta.cep") {
        $array = ConsultaCep($update);
        sendMessage($array);
    }
}
/*
 * FUNÇÃO PARA ENVIAR A MENSAGEM
 */
function sendMessage($parameters) {
    echo json_encode($parameters);
}
/*
 * PEGANDO A REQUISIÇÃO
 */
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}
/*
 * FUNÇÃO PARA CONSULTAR O CEP
 * API - https://correiosapi.apphb.com/
 */
function ConsultaCep($update = array()) {
    $mensagem = array();
    if (strlen($update['result']['parameters']['CEP']) == 8) {
        $dados = json_decode(file_get_contents('http://correiosapi.apphb.com/cep/' . $update['result']['parameters']['CEP']), true);
        if (isset($dados['cep'])) {
            $mensagem[] = array(
                'type' => 0,
                'speech' => 'O CEP ' . $dados['cep'] . ' é referente ao endereço: ' . $dados['tipoDeLogradouro'] . ' ' . $dados['logradouro'] . ', ' . $dados['bairro'] . ' - ' . $dados['cidade'] . ' - ' . $dados['estado']
            );
        } else {
            $mensagem[] = array(
                'type' => 0,
                'speech' => 'Desculpe, não consegui localizar o CEP ' . $update['result']['parameters']['CEP']
            );
        }
        $mensagem[] = array(
            'type' => 0,
            'speech' => 'Gostaria de realizar uma nova consulta?',
        );
    } else {
        $mensagem[] = array(
            'type' => 0,
            'speech' => 'Por favor, digite um CEP válido'
        );
    }
    return array(
        'source' => $update['result']['source'],
        'messages' => $mensagem,
        'contextOut' => array(
            array(
                'name' => 'ctx-cep',
                'lifespan' => 1,
                'parameters' => array()
            )
        )
    );
}