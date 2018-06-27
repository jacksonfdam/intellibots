<?php

require 'vendor/autoload.php';
use PhpSlackBot\Bot;

// Custom command
class MeuNovoComando extends \PhpSlackBot\Command\BaseCommand {

    protected function configure() {
        $this->setName('comando');
    }

    protected function execute($message, $context) {
        $this->send($this->getCurrentChannel(), null, 'Hello !');
    }

}

// Custom command
class Tempo extends \PhpSlackBot\Command\BaseCommand {
    protected function configure() {
        $this->setName('tempo');
    }

    protected function execute($message, $context) {
		$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
		$diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");

    	$hoje = getdate();
		$dia = $hoje["mday"];
		$mes = $hoje["mon"];
		$nomemes = $meses[$mes];
		$ano = $hoje["year"];
		$diadasemana = $hoje["wday"];
		$nomediadasemana = $diasdasemana[$diadasemana];
		$result = "São ". date("H:i") . " de $nomediadasemana, $dia de $nomemes de $ano";
        $this->send($this->getCurrentChannel(), null, $result);
    }

}

$bot = new Bot();
$bot->setToken('xoxb-346979919350-2B3orCNYxoOBsQcESxoC4vHP'); 
$bot->loadCommand(new MeuNovoComando());
$bot->loadCommand(new Tempo());
$bot->loadInternalCommands(); 
$bot->run();