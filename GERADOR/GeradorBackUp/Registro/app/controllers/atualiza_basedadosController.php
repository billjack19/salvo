
<?php 
	require_once "../classe/entidade/Basedados.php";
	require_once "../classe/dao/basedadosDAO.php";

	$entidadeBasedados = new Basedados();
	$basedadosDAO = new basedadosDAO();
	
	$entidadeBasedados->set($_POST['descricao_baseDados'], 'descricao_baseDados');
	$entidadeBasedados->set($_POST['regitros_id'], 'regitros_id');

	$retorno = $basedadosDAO->atualizaBasedados($entidadeBasedados, $_POST['id_baseDados']);
	echo $retorno;
?>
