
<?php 
	require_once "../classe/entidade/Estado.php";
	require_once "../classe/dao/estadoDAO.php";

	$entidadeEstado = new Estado();
	$estadoDAO = new estadoDAO();
	
	$entidadeEstado->set($_POST['descricao_estado'], 'descricao_estado');
	$entidadeEstado->set($_POST['sigla_estado'], 'sigla_estado');
	$entidadeEstado->set($_POST['bool_ativo_estado'], 'bool_ativo_estado');

	$retorno = $estadoDAO->cadastraEstado($entidadeEstado);
	echo $retorno;
?>
