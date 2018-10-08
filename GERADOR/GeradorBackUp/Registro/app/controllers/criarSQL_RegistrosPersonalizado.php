<?php

$arquivo = $_POST['arquivo'];
$sql = $_POST['sql'];
$tabela = $_POST['tabela'];
$operacao = $_POST['op'];


echo criarArquivo("../bd/".$arquivo."/registroPersonalizado/".$arquivo."_registros_".$tabela.".sql", $sql, $operacao);


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