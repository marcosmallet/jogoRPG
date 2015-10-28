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
