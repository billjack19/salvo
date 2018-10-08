
<?php 
	require_once "../classe/entidade/Status.php";
	require_once "../classe/dao/statusDAO.php";

	$entidadeStatus = new Status();
	$statusDAO = new statusDAO();
	
	$entidadeStatus->set($_POST['descricao_status'], 'descricao_status');
	$entidadeStatus->set($_POST['basedados_id'], 'basedados_id');

	$retorno = $statusDAO->atualizaStatus($entidadeStatus, $_POST['id_status']);
	// echo $retorno;
?>
