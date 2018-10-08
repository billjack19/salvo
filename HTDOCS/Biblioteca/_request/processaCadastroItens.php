<?php 
	require_once "../_class/entidades/Itens.php";
	require_once "../_class/dao/itensDAO.php";

	$entidadeItens = new Itens();
	$intensDAO = new intensDAO();

	$entidadeItens->setQtd_kit($_POST['quantidade']);
	$entidadeItens->setDescricao_kit($_POST['select_equipamento']);
	$entidadeItens->setDescricao_produto($_POST['select_produto']);

	$retorno = $intensDAO->cadastraItens($entidadeItens);
	echo $retorno;
 ?>