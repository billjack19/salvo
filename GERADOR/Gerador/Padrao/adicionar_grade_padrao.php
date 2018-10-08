<?php


$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$nomeTable = "";
$listaGradeAdicionar = "";
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

		// $classeName = gerarViewAdiciona($nomeTable, $id_tabela, $colunas, $projetoNome, $pdo, $tabelaLogin, $camposGrade);
		// $listaViewAdicionar .= "<li>".$classeName."</li>";
		$classeName = gerarGradeAdiciona($nomeTable, $id_tabela, $colunas, $projetoNome, $pdo, $tabelaLogin, $camposGrade, $pdoLocal, $resultadosLogicaN);
		if ($classeName != "") {
			$classeName = explode("+", $classeName);
			for ($i=0; $i < sizeof($classeName); $i++) $listaGradeAdicionar .= "<li>".$classeName[$i]."</li>";
		}
	}
}

function gerarGradeAdiciona($nomeTabela, $id_tabela, $colunas, $projetoNome, $pdo, $tabelaLogin, $camposGrade, $pdoLocal, $resultadosLogicaN){
	// return $classeNomeViewCadastro;
	include "Padrao/adicionar_grade_include.php";
	return $nomeArquivos;
}
?>