<?php


$listaDados = "";
$complementoListaDados = "";
$vetorColuna = "";
$nomeTabelaEstrangeira = "";
$chaveEstrangira = "";
$paramentroChaveEsntrangeira = "";

$condFiltroBusca = "";
$condFiltroBuscaGrade = "";

$prefixoBusca = "";
$prefixoBuscaGrade = "";

$classeName = "funcoes_".$nomeTable."Controller";

$contColuna = 0;
$contFiltro = 0;

$verificacaoPre = "";

$colunas = explode(",",$colunas);
for ($i=0; $i < count($colunas); $i++) { 
	$verificacaoPre = explode("_", $colunas[$i]);

	if ($contColuna == 1) 	{ $prefixoBusca = "WHERE "; $prefixoBuscaGrade = "   "; }
	else 					{ $prefixoBusca = "   OR ";	$prefixoBuscaGrade = "OR "; }


	if ($contColuna == 0) {
		$listaDados .= "
					\$dados[\"".$colunas[$i]."\"]";
	} else {
		if (substr($colunas[$i], -3) != "_id" && $verificacaoPre[0] != "senha" && $verificacaoPre[0] != "bool") {
			
			$condFiltroBusca .= "
				$prefixoBusca".$nomeTable.".".$colunas[$i]." LIKE '%\$filtro%'";
			$condFiltroBuscaGrade .= "
					$prefixoBuscaGrade".$nomeTable.".".$colunas[$i]." LIKE '%\$filtro%'";
		}

		$listaDados .= ".\"{,}\".
					\$dados[\"".$colunas[$i]."\"]";
	}
	$contColuna++;

	if (substr($colunas[$i], -3) == "_id") {
		$nomeTabelaEstrangeira = substr($colunas[$i], 0, strlen($colunas[$i])-3);
		// $paramentroChaveEsntrangeira .= ", $nomeTabelaEstrangeira.* ";
		$chaveEstrangira .= "
				INNER JOIN $nomeTabelaEstrangeira $nomeTabelaEstrangeira ON $nomeTable.".$nomeTabelaEstrangeira."_id = $nomeTabelaEstrangeira.id_$nomeTabelaEstrangeira";

		$sql2 = "SHOW COLUMNS FROM $nomeTabelaEstrangeira";
		$verifica2 = $pdo2->query($sql2);

		$colunasCom = "";
		$contColunaCom = 0;

		foreach ($verifica2 as $dados3) {
			$contColunaCom++;
			$colunasCom .= $contColunaCom == 1 ? $dados3[0] : ",".$dados3[0];
		}

		$colunasCom = explode(",",$colunasCom);
		// for ($j=0; $j < count($colunasCom); $j++) { 
				$condFiltroBusca .= "
				$prefixoBusca".$nomeTabelaEstrangeira.".".$colunasCom[1]." LIKE '%\$filtro%'";
				$condFiltroBuscaGrade .= "
					$prefixoBuscaGrade".$nomeTabelaEstrangeira.".".$colunasCom[1]." LIKE '%\$filtro%'";
				// $complementoListaDados .= ".\",\".
				// 	\$dados[\"".$colunasCom[$j]."\"] /* Tabela $nomeTabelaEstrangeira */ ";
		// } 
	} 
}

for ($i=0; $i < count($colunas); $i++) {
	
}


$funcoes_Controller = "<?php
ob_start();
require_once \"../classe/conexao.php\";

\$conn = new Conexao();
\$pdo = \$conn->Connect(); 


if (!empty(\$_POST['pequisa_$nomeTable'])) {
	\$filtro = !empty(\$_POST['filtro']) ? \$_POST['filtro'] : \"\";
	\$cont = 1;
	\$sql = \"	SELECT $nomeTable.* $paramentroChaveEsntrangeira
				FROM $nomeTable $nomeTable $chaveEstrangira $condFiltroBusca
			\";
	\$verifica = \$pdo->query(\$sql);
	foreach (\$verifica as \$dados) {
		if (\$cont !=  1) 
			echo    \"[]\";
			echo 	$listaDados$complementoListaDados;
		\$cont++;
	}
}




if (!empty(\$_POST['pequisa_".$nomeTable."_id'])) {
	\$id = \$_POST['id'];
	\$sql = \"	SELECT $nomeTable.* $paramentroChaveEsntrangeira
				FROM $nomeTable
				WHERE id_$nomeTable = \$id
			\";
	\$verifica = \$pdo->query(\$sql);
	foreach (\$verifica as \$dados) {
			echo 	$listaDados$complementoListaDados;
	}
}




if (!empty(\$_POST['pequisa_".$nomeTable."_grade'])) {
	\$filtro = !empty(\$_POST['filtro']) ? \$_POST['filtro'] : \"\";
	\$coluna = \$_POST['tabela'].\"_id\";
	\$id = \$_POST['id'];
	\$cont = 1;
	\$sql = \"	SELECT $nomeTable.* $paramentroChaveEsntrangeira
				FROM $nomeTable $nomeTable $chaveEstrangira
				WHERE \$coluna = \$id 
				AND ($condFiltroBuscaGrade
				)
			\";
	\$verifica = \$pdo->query(\$sql);
	foreach (\$verifica as \$dados) {
		if (\$cont !=  1) 
			echo    \"[]\";
			echo 	$listaDados$complementoListaDados;
		\$cont++;
	}
}
?>";

?>