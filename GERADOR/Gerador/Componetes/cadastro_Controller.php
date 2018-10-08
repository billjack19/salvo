<?php

include "../Classe/funcoes.php";

$nomeTabela = $_POST['nomeTabela'];
$id_tabela = $_POST['id_tabela'];
$colunas = $_POST['colunas'];
$projetoNome = $_POST['projetoNome'];

$setarParamentro = "";

$arquivoName = "cadastro_".$nomeTabela."Controller";
$arquivoNameA = "atualiza_".$nomeTabela."Controller";
$classeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));
$classeDao = $nomeTabela."DAO";

$colunaVez = "";

$colunas = explode(",",$colunas);
for ($i=0; $i < count($colunas); $i++) { 
		$colunaVez = $colunas[$i];
		$setarParamentro .= "
	\$entidade".$classeEntidade."->set(\$_POST['$colunaVez'], '$colunaVez');";	
}


$cadastro_Controller = "
<?php 
	require_once \"../classe/entidade/$classeEntidade.php\";
	require_once \"../classe/dao/$classeDao.php\";

	\$entidade$classeEntidade = new $classeEntidade();
	\$$classeDao = new $classeDao();
	$setarParamentro

	\$retorno = \$".$classeDao."->cadastra$classeEntidade(\$entidade$classeEntidade);
	echo \$retorno;
?>
";

$atualiza_Controller = "
<?php 
	require_once \"../classe/entidade/$classeEntidade.php\";
	require_once \"../classe/dao/$classeDao.php\";

	\$entidade$classeEntidade = new $classeEntidade();
	\$$classeDao = new $classeDao();
	$setarParamentro

	\$retorno = \$".$classeDao."->atualiza".$classeEntidade."(\$entidade$classeEntidade, \$_POST['$id_tabela']);
	echo \$retorno;
?>
";

echo criarArquivo("../../GeradorProjetos/$projetoNome/app/controllers/$arquivoName.php", $cadastro_Controller);
echo criarArquivo("../../GeradorProjetos/$projetoNome/app/controllers/$arquivoNameA.php", $atualiza_Controller);

?>