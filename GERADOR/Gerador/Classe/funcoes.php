<?php

/* funcoes .php */
function criarDiretorio($diretorio){
	if(!is_dir($diretorio)){
		mkdir($diretorio, 0755);
	}
}

/*function copiarPasta($pastaSrc, $pastaDis){
	$files1 = scandir($pastaSrc);
	for ($i=0; $i < count($files1); $i++) { 
		if ($files1[$i] != "." && $files1[$i] != "..") {
			if (is_dir($files1[$i])) {
				criarDiretorio($pastaDis."/".$files1[$i]);
				copiarPasta($pastaSrc."/".$files1[$i], $pastaDis."/".$files1[$i]);
			} else {
				copiarArquivo($pastaSrc, $pastaDis, $files1[$i]);
			}
		}
	}
}*/

function copiarPasta($pastaSrc, $pastaDis){
	$files1 = scandir($pastaSrc);
	for ($i=0; $i < count($files1); $i++) { 
		if ($files1[$i] != "." && $files1[$i] != "..") {
			if (is_dir($pastaSrc."/".$files1[$i])) {
				criarDiretorio($pastaDis."/".$files1[$i]);
				copiarPasta($pastaSrc."/".$files1[$i], $pastaDis."/".$files1[$i]);
			} else {
				copiarArquivo($pastaSrc, $pastaDis, $files1[$i]);
			}
		}
	}
}


/* você copia um arquivo para ser renomeado */
function copiarArquivo($pastaSrc, $pastaDis, $nomeArquivo){
	$myfile = fopen($pastaSrc."/".$nomeArquivo, "r") or die("Unable to open file!");
	$arquivoCopia = fread($myfile,filesize($pastaSrc."/".$nomeArquivo));
	fclose($myfile);

	criarArquivo($pastaDis."/".$nomeArquivo, $arquivoCopia);
}


function copiarArquivoSemNome($pastaSrc, $pastaDis){
	$myfile = fopen($pastaSrc, "r") or die("Unable to open file!");
	$arquivoCopia = fread($myfile,filesize($pastaSrc));
	fclose($myfile);

	criarArquivo($pastaDis, $arquivoCopia);
}


function criarArquivo($nome, $conteudo){
	$myfile = fopen($nome, "w") or die("Unable to open file!");
	$txt = $conteudo;
	fwrite($myfile, $txt);
	fclose($myfile);
	return 1;	
}

function letraMaiuscula($letra){
	switch ($letra) {
		case 'a': $letra = 'A'; break;
		case 'b': $letra = 'B'; break;
		case 'c': $letra = 'C'; break;
		case 'd': $letra = 'D'; break;
		case 'e': $letra = 'E'; break;
		case 'f': $letra = 'F'; break;
		case 'g': $letra = 'G'; break;
		case 'h': $letra = 'H'; break;
		case 'i': $letra = 'I'; break;
		case 'j': $letra = 'J'; break;
		case 'k': $letra = 'K'; break;
		case 'l': $letra = 'L'; break;
		case 'm': $letra = 'M'; break;
		case 'n': $letra = 'N'; break;
		case 'o': $letra = 'O'; break;
		case 'p': $letra = 'P'; break;
		case 'q': $letra = 'Q'; break;
		case 'r': $letra = 'R'; break;
		case 's': $letra = 'S'; break;
		case 't': $letra = 'T'; break;
		case 'u': $letra = 'U'; break;
		case 'v': $letra = 'V'; break;
		case 'w': $letra = 'W'; break;
		case 'x': $letra = 'X'; break;
		case 'y': $letra = 'Y'; break;
		case 'z': $letra = 'Z'; break;
		// default: $letra = $letra; break;
	}
	return $letra;
}

function formatarNomeHeadTable($nome){
	$nome = str_replace("-", "_-_", $nome);
	$nomeVetor = explode("_",$nome);
	for ($i=0; $i < (count($nomeVetor) - 1); $i++) { 
		if ($i == 0) {
			$nome = corretor(
						letraMaiuscula(
							substr($nomeVetor[$i], 0, 1)).substr($nomeVetor[$i], 1, strlen($nomeVetor[$i])
						)
					);
		} else {
			$nome .= " ".corretor(
							letraMaiuscula(
								substr($nomeVetor[$i], 0, 1)).substr($nomeVetor[$i], 1, strlen($nomeVetor[$i])
							)
						);
		}
	}
	return $nome;
}


function formatarNomeHeadTable2($nome){
	$nome = str_replace("-", "_-_", $nome);
	$nomeVetor = explode("_",$nome);
	for ($i=0; $i < sizeof($nomeVetor); $i++) { 
		if ($i == 0) {
			$nome = corretor(
						letraMaiuscula(
							substr($nomeVetor[$i], 0, 1)).substr($nomeVetor[$i], 1, strlen($nomeVetor[$i])
						)
					);
		} else {
			$nome .= " ".corretor(
							letraMaiuscula(
								substr($nomeVetor[$i], 0, 1)).substr($nomeVetor[$i], 1, strlen($nomeVetor[$i])
							)
						);
		}
	}
	return $nome;
}


function formatarNomeCampo($nomeCampo, $qtdTirarUltimo){
	$arrayNomeCampo = explode("_", $nomeCampo);
	$nomeCampo = "";
	if(sizeof($arrayNomeCampo)-$qtdTirarUltimo > 0){
		for ($i=0; $i < sizeof($arrayNomeCampo)-$qtdTirarUltimo; $i++) {
			$nomeCampo .= $i == 0 ? $arrayNomeCampo[$i] : "_".$arrayNomeCampo[$i];
		}
	}
	return $nomeCampo;
}


function juntaTodosMenosPrimeiro($array){
	$resultado = "";
	$cont = 0;
	for ($i = 1; $i < sizeof($array); $i++) { 
		$resultado .= $cont == 0 ? $array[$i] : " ".$array[$i];
		$cont++;
	}
	return $resultado;
}


function retornaUltimaPosicao($array){
	$resultado = "";
	for ($i=sizeof($array)-1; $i >= 0; $i--) { 
		$resultado = $array[$i];
		$i = -1;
	}
	return $resultado;
}

function corretor($palavra){
	$preDirectory = "";
	$tentativas = 5;
	for ($i=0; $i < $tentativas; $i++) {
		if (is_dir($preDirectory."Dicionario")): $preDirectory .= "Dicionario"; $i = $tentativas; endif;
		$preDirectory .= "../";
	}
	include $preDirectory."/dicionario.php";

	return $palavra;
}

// function corretorOld($palavra){
// 	$preDirectory = "";
// 	if (is_dir("Dicionario")) {
// 		$preDirectory = "Dicionario";
// 		include "Dicionario/dicionario.php";
// 	}
// 	else if(is_dir("../Dicionario")){
// 		$preDirectory = "../Dicionario";
// 		include "../Dicionario/dicionario.php";
// 	}
// 	else if(is_dir("../../Dicionario")){
// 		$preDirectory = "../../Dicionario";
// 		include "../../Dicionario/dicionario.php";
// 	}
// 	return $palavra;
// }


















/**********************************************************************************************************************/
/**********************************************************************************************************************/
/* FUNÇÕES PARA OBJETOS JSON */
/**********************************************************************************************************************/
/**********************************************************************************************************************/

function toJson($variavel){
	$resultado = $variavel;
		 if(gettype($variavel) == 'object') $resultado = objectEmJson($variavel);
	else if(gettype($variavel) == 'array' ) $resultado = arrayEmJson($variavel);

	return $resultado;
}

function objectEmJson($objeto){
	$class_vars = get_class_vars(get_class($objeto));
	$arrayObjeto = array();

	foreach ($class_vars as $name => $value) {
		array_push($arrayObjeto, $name , $objeto->get($name));
	}

	$verifica = true;
	$primeiro = true;
	$stringArray = "";
	$preStringArray = "";
	$oldValue = "teste";
	foreach ($arrayObjeto as $key => $value) {
		if ($verifica) {
			if($primeiro) 	$preStringArray = "{\"".$value."\":";
			else 			$preStringArray = ",\"".$value."\":";
			$verifica = false;
		} else {
			switch (gettype($value)) {
				case 'string':
					$stringArray .= $preStringArray."\"".$value."\"";
					break;
				case 'integer':
					$stringArray .= $preStringArray.$value;
					break;
				case 'double':
					$stringArray .= $preStringArray.$value;
					break; 
				case 'floute':
					$stringArray .= $preStringArray.$value;
					break;
				case 'boolean':
					if($value) 	$stringArray .= $preStringArray."1";
					else 		$stringArray .=  $preStringArray."0";
					break;
				case 'object':
					$stringArray .= $preStringArray.objectEmJson($value);
					break;
				case 'array':
					$stringArray .= $preStringArray.arrayEmJson($value);
					break;
				case 'NULL':
					// $stringArray .= $preStringArray.arrayEmJson($value); 
					break;
				default:
					$stringArray .= $preStringArray."\"".$value."\"";
					break;
			}
			if (gettype($value) != 'NULL') $primeiro = false;
			$verifica = true;
		}
	}
	return $stringArray."}";
}


function arrayEmJson($array){
	$stringArray = "[";
	$primeiro = true;

	foreach ($array as $key => $value) {
		switch (gettype($value)) {
			case 'string':
				if($primeiro) 	$stringArray .= "{\"".$key."\": \"".$value."\"}";
				else 			$stringArray .= ",{\"".$key."\": \"".$value."\"}";
				break;
			case 'interger':
				if($primeiro)	$stringArray .= "{".$key.": ".$value."}";
				else 			$stringArray .= ",{".$key.": ".$value."}";
				break;
			case 'double':
				if($primeiro) 	$stringArray .= "{".$key.": ".$value."}";
				else 			$stringArray .= ",{".$key.": ".$value."}";
				break; 
			case 'float':
				if($primeiro)	$stringArray .= "{".$key.": ".$value."}";
				else 			$stringArray .= ",{".$key.": ".$value."}";
				break;
			case 'boolean':
				if($value)	$value = "1";
				else 		$value = "0";
				if($primeiro) 	$stringArray .= "{".$key.": ".$value."}";
				else 			$stringArray .= ",{".$key.": ".$value."}";
				break;
			case 'object':
				if($primeiro) 	$stringArray .= objectEmJson($value);
				else 			$stringArray .= ",".objectEmJson($value);
				break;
			case 'array':
				if($primeiro)	$stringArray .= arrayEmJson($value);
				else 			$stringArray .= ",".arrayEmJson($value);
				break;
			default:
				$stringArray .= "\"".$value."\"";
				break;
		}
		$primeiro = false;
	}
	return $stringArray."]";
}

?>