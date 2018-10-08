<?php

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$nomeTable = "";
$listaGradesLista = "";
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

		$classeName = gerarGradeLista($nomeTable, $id_tabela, $colunas, $projetoNome, $camposGrade);
		if ($classeName != "") {
			$classeName = explode("+", $classeName);
			for ($i=0; $i < sizeof($classeName); $i++) $listaGradesLista .= "<li>".$classeName[$i]."</li>";
		}
	}
}

function gerarGradeLista($nomeTabela, $id_tabela, $colunas, $projetoNome, $camposGrade){
	include "Padrao/grade_include.php";
	return $nomeArquivos;
}
?>