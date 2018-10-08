<?php

$arquivo = $_POST['arquivo'];
$sql = $_POST['sql'];
$tabela = $_POST['tabela'];
$operacao = $_POST['op'];


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

USE $arquivo;

$sql";


echo criarArquivo("../bd/".$arquivo."/estrutura/".$arquivo."_estrutura_".$tabela.".sql", $sql, $operacao);


function criarArquivo($nome, $conteudo, $operacao){
	$myfile = fopen($nome, $operacao) or die("Unable to open file!");
	$txt = $conteudo;
	fwrite($myfile, $txt);
	fclose($myfile);
	return 1;
}

/*
--
-- Database $arquivo 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/


//USE ".$arquivo.";





?>