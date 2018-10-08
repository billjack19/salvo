<?php

include "../Classe/funcoes.php";

$nomeTabela = $_POST['nomeTabela'];
$id_tabela = $_POST['id_tabela'];
$colunas = $_POST['colunas'];
$filtroArray = $_POST['filtroArray'];
$projetoNome = $_POST['projetoNome'];

$filtroSql = "";
$filtroVariaveis = "";
$listaDados = "";

$classeName = "funcoes_".$nomeTabela."Controller";

$contColuna = 0;
$contFiltro = 0;

$colunas = explode(",",$colunas);
for ($i=0; $i < count($colunas); $i++) { 
	if ($contColuna == 0) {
		$listaDados .= "
					\$dados[\"".$colunas[$i]."\"]";
	} else {
		$listaDados .= ".\",\".
					\$dados[\"".$colunas[$i]."\"]";
	}
	$contColuna++;	
}


if ($filtroArray != "") {
	$filtroArray = explode(",",$filtroArray);
	for ($i=0; $i < count($filtroArray); $i++) { 
		if ($contFiltro == 0) {
			$filtroSql .= "WHERE ".$filtroArray[$i]." =  \$".$filtroArray[$i];
			$filtroVariaveis  .= "\$".$filtroArray[$i]." = \$_POST['".$filtroArray[$i]."']";
		} else {
			$filtroSql .= " AND ".$filtroArray[$i]." =  \$".$filtroArray[$i];
			$filtroVariaveis  .= "
		\$".$filtroArray[$i]." = \$_POST['".$filtroArray[$i]."']";
		}
		
	}
}


$funcoes_Controller = "
<?php
require_once \"../classe/conexao.php\";

\$conn = new Conexao();
\$pdo = \$conn->Connect(); 


if (!empty(\$_POST['pequisa_$nomeTabela'])) {
	$filtroVariaveis
	\$cont = 1;
	\$sql = \"SELECT * FROM $nomeTabela $filtroSql\";
	\$verifica = \$pdo->query(\$sql);
	foreach (\$verifica as \$dados) {
		if (\$cont ==  1) {
			echo 	$listaDados;
		} else {
			echo    \"[]\".$listaDados;
		}
		\$cont++;
	}
}

if (!empty(\$_POST['pequisa_".$nomeTabela."_id'])) {
	\$id = \$_POST['id'];
	\$sql = \"SELECT * FROM $nomeTabela WHERE $id_tabela = \$id\";
	\$verifica = \$pdo->query(\$sql);
	foreach (\$verifica as \$dados) {
			echo 	$listaDados;
	}
}

?>
";

echo criarArquivo("../../GeradorProjetos/$projetoNome/app/controllers/$classeName.php", $funcoes_Controller);

?>