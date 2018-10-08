<?php


$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$nomeTable = "";
$listaViewsLista = "";
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

		$classeName = gerarAjaxLista($nomeTable, $id_tabela, $colunas, $projetoNome);
		$listaViewsLista .= "<li>".$classeName."</li>";
	}
}

function gerarAjaxLista($nomeTabela, $id_tabela, $colunas, $projetoNome){
	include "Padrao/view_include.php";
	criarArquivo("../GeradorProjetos/$projetoNome/app/views/$classeNameView.htm", $contrudoView);
	return $classeNameView;
}
?>