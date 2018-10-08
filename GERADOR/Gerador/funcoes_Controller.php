<?php
ini_set('max_execution_time', 300);
set_time_limit(300);

$pdo2 = $pdo;

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$funcoesControllerGerada = "";
$cadastroControllerGerada = "";
$atualizaControllerGerada = "";

$camposUnicos = "";
foreach ($verifica as $dados2) {
	$nomeTable = $dados2[0];

	if (!in_array($nomeTable, $tabelasPadrao)){
		$sql = "SHOW COLUMNS FROM $nomeTable";
		$verifica = $pdo->query($sql);

		$colunas = "";
		$tiposColunas = "";
		$colunasSemChave = "";
		$contColuna = 0;
		$contColunaSemChave = 0;

		$camposUnicos = "";
		foreach ($verifica as $dados) {
			if ($dados[3] == "UNI") {
				$camposUnicos .= $camposUnicos == "" ? $dados[0] : "+".$dados[0];
			}
			if ($dados[3] != "PRI") {
				$contColunaSemChave++;
				$colunasSemChave .= $contColunaSemChave == 1 ? $dados[0] : ",".$dados[0];
				$tiposColunas .= $contColunaSemChave == 1 ? $dados[1] : ",".$dados[1];
			} else {
				$id_tabela = $dados[0];
			}
			$contColuna++;
			$colunas .= $contColuna == 1 ? $dados[0] : ",".$dados[0];
		}
		$classeName = gerarFuncaoController($nomeTable, $colunas, $pdo2);
		$classeNameVetor = gerarCadastroController($nomeTable, $colunasSemChave, $tiposColunas, $id_tabela, $camposUnicos);
		
		$classeNameVetor = explode(",",$classeNameVetor);
		$classeName1 = $classeNameVetor[0];
		$classeName2 = $classeNameVetor[1];

		$funcoesControllerGerada .= "<li>".$classeName."</li>";
		$cadastroControllerGerada .= "<li>".$classeName1."</li>";
		$atualizaControllerGerada .= "<li>".$classeName2."</li>";
	}
}


function gerarFuncaoController($nomeTable, $colunas, $pdo2){
	include "Componetes/funcoes_Controller_include.php";
	// criarArquivo("../GeradorProjetos/$projetoNome/app/controllers/$nomeArquivo.php", $funcoes_Controller);
	criarArquivo("../GeradorProjetos/".NOME_PROJ."/app/controllers/$classeName.php", $funcoes_Controller);
	return $classeName;
}

function gerarCadastroController($nomeTable, $colunas, $tipos, $id_tabela, $camposUnicos){
	include "Componetes/cadastro_Controller_include.php";
	criarArquivo("../GeradorProjetos/".NOME_PROJ."/app/controllers/$classeName1.php", $cadastro_Controller);
	criarArquivo("../GeradorProjetos/".NOME_PROJ."/app/controllers/$classeName2.php", $atualiza_Controller);
	return $classeName1 .",". $classeName2;
}

?>
