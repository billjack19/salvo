<?php

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$nomeTable = "";
$listaComboJsPre = "";
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
			}
			$contColuna++;
			$colunas .= $contColuna == 1 ? $dados[0] : ",".$dados[0];
		}

		$classeName = gerarComboJsPre($nomeTable, $id_tabela, $contColuna, $projetoNome);
		$listaComboJsPre .= "<li>".$classeName."</li>";
	}
}

function gerarComboJsPre($nomeTabela, $id_tabela, $colunas, $projetoNome){
	include "Padrao/combo_pre_include.php";
	criarArquivo("../GeradorProjetos/$projetoNome/app/js/combo/$classeNomeCombo.js", $contrudoCombo);
	return $classeNomeCombo;
}
?>