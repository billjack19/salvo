<?php

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$nomeTable = "";
$listaAjaxAdicionar = "";
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
				$colunas .= $contColuna == 1 ? $dados[0] : ",".$dados[0];	
			}
		}

		$classeName = gerarAjaxAdiciona($nomeTable, $id_tabela, $colunas, $projetoNome, $pdo);
		$listaAjaxAdicionar .= "<li>".$classeName."</li>";
	}
}

function gerarAjaxAdiciona($nomeTabela, $id_tabela, $colunas, $projetoNome, $pdo){
	include "Padrao/ajax_adiciona_include.php";
	criarArquivo("../GeradorProjetos/$projetoNome/app/js/ajax/$classeNomeAjaxCadastro.js", $contrudoAjaxCadastro);
	return $classeNomeAjaxCadastro;
}
?>