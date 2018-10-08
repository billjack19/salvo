<?php


$arquivo = $_POST['arquivo'];
$sql = $_POST['sql'];

// date_default_timezone_get();
date_default_timezone_set("America/Sao_Paulo");
$dia = date("d/m/Y H:i:s");

$sql = "

--
-- Database $arquivo 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: $dia
--   _       _          __     ___             ______        _____     ___                 ___
-- // \\\  // \\\  ||   //  \\\  ||  \\\    //\\\     ||    ||   //   \\\  ||   ||       //||  //   ||
-- ||  \\\//  ||  ||   || __   ||__//   //__\\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\\__//  ||  \\\  //    \\\   ||    ||   \\\___//  ||   ||         ||   ____||
--

DROP DATABASE IF EXISTS `".$arquivo."`;
CREATE DATABASE `".$arquivo."`;

USE ".$arquivo.";


".$sql;

criarDiretorio("../bd/".$arquivo);
criarDiretorio("../bd/".$arquivo."/registro");
criarDiretorio("../bd/".$arquivo."/estrutura");
criarDiretorio("../bd/".$arquivo."/registroPersonalizado");


criarArquivo("../bd/".$arquivo."/".$arquivo.".sql", $sql);


function criarArquivo($nome, $conteudo){
	$myfile = fopen($nome, "w") or die("Unable to open file!");
	$txt = $conteudo;
	fwrite($myfile, $txt);
	fclose($myfile);
	return 1;
}

function criarDiretorio($diretorio){
	if(!is_dir($diretorio)){
		mkdir($diretorio, 0755);
	}
}


?>