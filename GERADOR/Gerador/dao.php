<?php

ini_set('max_execution_time', 300);
$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$nomeTable = "";
$listaDao = "";
foreach ($verifica as $dados2) {
	$nomeTable = $dados2[0];

	if (!in_array($nomeTable, $tabelasPadrao)){
		$sql = "SHOW COLUMNS FROM $nomeTable";
		$verifica = $pdo->query($sql);

		$id_tabela = "";
		$colunas = "";
		$contColuna = 0;

		foreach ($verifica as $dados) {
			if ($dados[3] == "PRI") {
				$id_tabela = $dados[0];
			} else {
				$contColuna++;
$colunas .= $contColuna == 1 ? $dados[0]."+".$dados[4]."+".$dados[1] : ",/,".$dados[0]."+".$dados[4]."+".$dados[1];
			}
		}
		$classeName = gerarDao($nomeTable, $id_tabela, $colunas, $projetoNome);
		$listaDao .= "<li>".$classeName."</li>";
	}
}

function gerarDao($nomeTabela, $id_tabela, $colunas, $projetoNome){
	include "Componetes/dao_include.php";
	criarArquivo("../GeradorProjetos/$projetoNome/app/classe/dao/$classeName.php", $classeDAO);
	return $classeName;
}
?>