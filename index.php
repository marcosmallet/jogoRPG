<?php
class TipoArma {
    public $ataque;
    public $defesa;
    public $numeroFacesDado;
}

class TipoPersonagem {
    public $vida;
    public $forca;
    public $agilidade;
    public $arma;
}

$humano;
$orc;
$contRodada;
$vez;

function CriarHumano(){
	global $humano;
	$humano = new TipoPersonagem();
	$humano->vida = 12;
	$humano->forca = 1;	
	$humano->agilidade = 2;	
	$humano->arma = new TipoArma();
	$humano->arma->ataque = 2;
	$humano->arma->defesa = 1;
	$humano->arma->numeroFacesDado = 6;		
}

function CriarOrc(){
	global $orc;
	$orc = new TipoPersonagem();
	$orc->vida = 20;
	$orc->forca = 2;	
	$orc->agilidade = 0;	
	$orc->arma = new TipoArma();
	$orc->arma->ataque = 1;
	$orc->arma->defesa = 0;
	$orc->arma->numeroFacesDado = 8;		
}

function PrepararJogo()
{
	global $humano, $orc, $contRodada;
	CriarHumano();
	CriarOrc();
	$contRodada = 0;
}

function CalcularDanosOrc()
{
	global $humano, $orc;
	
	//Jogar Dado Humano;
	$dado = rand(1, $humano->arma->numeroFacesDado);
	$pontuacaoHumano = $dado + $humano->forca;
	
	echo "Calculando Danos...";
	echo "<br>";
	echo "Vida Orc: ".$orc->vida." - ".$pontuacaoHumano;
	$orc->vida = $orc->vida - $pontuacaoHumano;
	echo " = ".$orc->vida;
	echo "<br>";
	echo "<br>";
}

function CalcularDanosHumano()
{
	global $orc, $humano;
	
	//Jogar Dado Orc;
	$dado = rand(1, $orc->arma->numeroFacesDado);
	$pontuacaoOrc = $dado + $orc->forca;
	
	echo "Calculando Danos...";
	echo "<br>";
	echo "Vida Humano: ".$humano->vida." - ".$pontuacaoOrc;
	$humano->vida = $humano->vida - $pontuacaoOrc;
	echo " = ".$humano->vida;
	echo "<br>";
	echo "<br>";
}

function IniciaBatalha()
{
	global $humano, $orc, $vez;
	
	//Jogar Dado Humano;
	$dado = rand(1, 20);
	$pontuacaoHumano = $dado + $humano->agilidade;
	
	//Jogar Dado Orc;
	$dado = rand(1, 20);
	$pontuacaoOrc = $dado + $orc->agilidade;
	
	echo "<< INICIO DE JOGO >>";
	echo "<br>";
	echo "<br>";
	echo "Jogando dados...";
	echo "<br>";
	echo "Pontuacao Humano: ".$pontuacaoHumano;
	echo "<br>";
	echo "Pontuacao Orc: ".$pontuacaoOrc;
	echo "<br>";
	echo "<br>";
	if ($pontuacaoHumano > $pontuacaoOrc) {
		$vez = "HUMANO";
		echo "Humano começa o Ataque.";
		echo "<br>";
		echo "<br>";
	}
	if ($pontuacaoHumano < $pontuacaoOrc) {
		$vez = "ORC";
		echo "Orc começa o Ataque.";
		echo "<br>";
		echo "<br>";
	}
	if ($pontuacaoHumano == $pontuacaoOrc) {
		echo "Empate. Jogando dados novamente...";
		echo "<br>";
		IniciaBatalha();
	}
}

function IniciaRodada()
{
	global $humano, $orc, $contRodada, $vez;
	$contRodada++;
	echo "<<< RODADA ".$contRodada." >>>";
	echo "<br>";
	echo "<br>";
	
	if ($vez == "HUMANO"){
		echo "Humano ataca...";
		echo "<br>";
		//Jogar Dado Humano;
		$dado = rand(1, 20);
		$pontuacaoHumano = $dado + $humano->agilidade + $humano->arma->ataque;
		echo "Pontuacao Humano: ".$pontuacaoHumano;
		echo "<br>";
		echo "<br>";
		
		echo "Orc defende...";
		echo "<br>";
		//Jogar Dado Orc;
		$dado = rand(1, 20);
		$pontuacaoOrc = $dado + $orc->agilidade + $orc->arma->defesa;
		echo "Pontuacao Orc: ".$pontuacaoOrc;
		echo "<br>";
		echo "<br>";
		
		if ($pontuacaoHumano > $pontuacaoOrc){
			echo "Humano é vencedor da Rodada.";
			echo "<br>";
			echo "<br>";
			CalcularDanosOrc();
		}else{
			echo "Orc é vencedor da Rodada.";
			echo "<br>";
			echo "<br>";
		}
		$vez = "ORC";
	}else{
		echo "Orc ataca...";
		echo "<br>";
		//Jogar Dado Orc;
		$dado = rand(1, 20);
		$pontuacaoOrc = $dado + $orc->agilidade + $orc->arma->ataque;
		echo "Pontuacao Orc: ".$pontuacaoOrc;
		echo "<br>";
		echo "<br>";
		
		echo "Humano defende...";
		echo "<br>";
		//Jogar Dado Humano;
		$dado = rand(1, 20);
		$pontuacaoHumano = $dado + $humano->agilidade + $humano->arma->defesa;
		echo "Pontuacao Humano: ".$pontuacaoHumano;
		echo "<br>";
		echo "<br>";
		
		if ($pontuacaoOrc > $pontuacaoHumano){
			echo "Orc é vencedor da Rodada.";
			echo "<br>";
			echo "<br>";
			CalcularDanosHumano();
		}else{
			echo "Humano é vencedor da Rodada.";
			echo "<br>";
			echo "<br>";
		}
		$vez = "HUMANO";
	}
}

PrepararJogo();
IniciaBatalha();
