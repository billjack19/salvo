<?php

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$nomeTable = "";
$listaGradeEditar = "";
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

		// $classeName = gerarViewEdita($nomeTable, $id_tabela, $colunas, $projetoNome, $pdo, $camposGrade);
		// $listaGradeEditar .= "<li>".$classeName."</li>";

		$classeName = gerarGradeEditar($nomeTable, $id_tabela, $colunas, $projetoNome, $pdo, $camposGrade, $pdoLocal, $resultadosLogicaN);
		if ($classeName != "") {
			$classeName = explode("+", $classeName);
			for ($i=0; $i < sizeof($classeName); $i++) $listaGradeEditar .= "<li>".$classeName[$i]."</li>";
		}
	}
}

function gerarGradeEditar($nomeTable, $id_tabela, $colunas, $projetoNome, $pdo, $camposGrade, $pdoLocal, $resultadosLogicaN){
	include "Padrao/editar_grade_include.php";
	return $nomeArquivos;
}
?>