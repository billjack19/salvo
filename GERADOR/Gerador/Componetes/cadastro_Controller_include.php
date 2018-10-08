<?php


$listaDados = "";
$complementoListaDados = "";
$vetorColuna = "";
$nomeTabelaEstrangeira = "";
$chaveEstrangira = "";
$paramentroChaveEsntrangeira = "";

$setarParamentro_I = "";
$setarParamentro_U = "";

// $classeName = "funcoes_".$nomeTable."Controller";
$classeName1 = "cadastro_".$nomeTable."Controller";
$classeName2 = "atualiza_".$nomeTable."Controller";

// $contColuna = 0;
// $contFiltro = 0;

// $arquivoName = "cadastro_".$nomeTabela."Controller";
// $arquivoNameA = "atualiza_".$nomeTabela."Controller";

$contElemetTable = explode("_", $nomeTable);

$classeEntidade = letraMaiuscula(substr($nomeTable, 0, 1)).substr($nomeTable, 1, strlen($nomeTable));
$classeDao = $nomeTable."DAO";

$colunaVez = "";
$verificaCampoTipo = "";
$stringCamposUnicos_I = "";
$stringCamposUnicos_U = "";

$prefixo = "";


$tipos = explode(",",$tipos);
$colunas = explode(",",$colunas);
for ($i=0; $i < count($colunas); $i++) { 

	$prefixo = explode("_", $colunas[$i]);
	$prefixo = $prefixo[0];

	$verificaCampoTipo = explode("(", $tipos[$i]);
	if (sizeof($verificaCampoTipo) > 1) {
		$tamanhoCampo = str_replace(")", "", $verificaCampoTipo[1]);
	}

	if (
		$verificaCampoTipo[0] == "int"   	||
		$verificaCampoTipo[0] == "float" 	||
		$verificaCampoTipo[0] == "tinyint" 	||
		$verificaCampoTipo[0] == "smallint" ||
		$verificaCampoTipo[0] == "bigint"  	||
		$verificaCampoTipo[0] == "decimal" 	||
		$verificaCampoTipo[0] == "double"  	||
		$verificaCampoTipo[0] == "real"    	||
		$verificaCampoTipo[0] == "bit"     	||
		$verificaCampoTipo[0] == "boolean" 	||
		$verificaCampoTipo[0] == "serial"
	) {
		$colunaVez = $colunas[$i];
		$setarParamentro_U .= "

		\$$colunaVez = \$_POST['$colunaVez'] == '' ? 0 : \$_POST['$colunaVez'];
		\$entidade".$classeEntidade."->set(\$$colunaVez, '$colunaVez');
";
		$setarParamentro_I .= "

		\$$colunaVez = \$_POST['$colunaVez'] == '' ? 0 : \$_POST['$colunaVez'];
		\$entidade".$classeEntidade."->set(\$$colunaVez, '$colunaVez');
";

	} else {
		$colunaVez = $colunas[$i];
			$setarParamentro_I .= "
		\$entidade".$classeEntidade."->set(\$_POST['$colunaVez'], '$colunaVez');";

		if ($prefixo != "senha") {
			$setarParamentro_U .= "
		\$entidade".$classeEntidade."->set(\$_POST['$colunaVez'], '$colunaVez');";
		}
	}
}



$camposUnicos = explode("+", $camposUnicos);
if ($camposUnicos[0] != "") {
	for ($i=0; $i < sizeof($camposUnicos); $i++) { 
		$nomeCampo = formatarNomeCampo($camposUnicos[$i], sizeof($contElemetTable));
		$nomeCampo = formatarNomeHeadTable2($nomeCampo);

		$stringCamposUnicos_I .= "
	\$sql = \"SELECT COUNT(*) FROM $nomeTable 
			WHERE ".$camposUnicos[$i]." = '\".\$_POST['".$camposUnicos[$i]."'].\"'\";
	\$verifica = \$pdoVerifica->query(\$sql);
	foreach (\$verifica as \$dados) {
		if (\$dados[0] > 0): \$gravar = false; \$saida = \"O $nomeCampo não pode ser esse(a)!\"; endif;
	}";



		$stringCamposUnicos_U .= "
	\$sql = \"SELECT COUNT(*) FROM $nomeTable 
			WHERE ".$camposUnicos[$i]." = '\".\$_POST['".$camposUnicos[$i]."'].\"'
			OR id_$nomeTable = \".\$_POST['id_$nomeTable'].\";\";
	\$verifica = \$pdoVerifica->query(\$sql);
	foreach (\$verifica as \$dados) {
		if (\$dados[0] > 1): \$gravar = false; \$saida = \"O $nomeCampo não pode ser esse(a)!\"; endif;
	}";
	}
}


$cadastro_Controller = "<?php 
	ob_start();
	require_once \"../classe/entidade/$classeEntidade.php\";
	require_once \"../classe/dao/$classeDao.php\";

	\$conn = new Conexao();
	\$pdoVerifica = \$conn->Connect();

	\$gravar = true;
	\$saida = \"\";
	$stringCamposUnicos_I

	if (\$gravar) {
		\$entidade$classeEntidade = new $classeEntidade();
		\$$classeDao = new $classeDao();
		$setarParamentro_I

		\$retorno = \$".$classeDao."->cadastra$classeEntidade(\$entidade$classeEntidade, \$_POST['areaDeAtuacao']);
		echo \$retorno;
	}
	else echo \$saida;
?>";

$atualiza_Controller = "<?php 
	ob_start();
	require_once \"../classe/entidade/$classeEntidade.php\";
	require_once \"../classe/dao/$classeDao.php\";

	\$conn = new Conexao();
	\$pdoVerifica = \$conn->Connect();

	\$gravar = true;
	\$saida = \"\";
	$stringCamposUnicos_U

	if (\$gravar) {
		\$entidade$classeEntidade = new $classeEntidade();
		\$$classeDao = new $classeDao();
		$setarParamentro_U

		\$retorno = \$".$classeDao."->atualiza".$classeEntidade."(\$entidade$classeEntidade, \$_POST['$id_tabela'], \$_POST['areaDeAtuacao']);
		echo \$retorno;
	}
	else echo \$saida;
?>";

?>