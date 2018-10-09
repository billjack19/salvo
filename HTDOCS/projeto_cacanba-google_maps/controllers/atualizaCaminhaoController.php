<?php 
	require_once "../class/entidade/Caminhao.php";
	require_once "../class/dao/caminhaoDAO.php";

	$entidadeCaminhao = new Caminhao();
	$caminhaoDAO = new caminhaoDAO();

	$entidadeCaminhao->set($_POST['placa'] , 'placa');
	$entidadeCaminhao->set($_POST['cor_id'] , 'cor_id');
	$entidadeCaminhao->set($_POST['marca_id'] , 'marca_id');
	$entidadeCaminhao->set($_POST['proprietario_id'] , 'proprietario_id');
	$entidadeCaminhao->set($_POST['vin_media'] , 'vin_media');

	$retorno = $caminhaoDAO->atualizaCaminhao($entidadeCaminhao, $_POST['id_caminhao']);
	echo $retorno;
 ?>