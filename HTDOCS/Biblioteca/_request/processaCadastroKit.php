<?php 
	require_once "../_class/entidades/Kit.php";
	require_once "../_class/dao/kitDAO.php";

	$entidadeKit = new Kit();
	$kitDAO = new kitDAO();

	$entidadeKit->setDescricao_kit($_POST['nome']);
	
	if ($_POST['numero'] != '') {
		$entidadeKit->setNumero_kit($_POST['numero']);
	}

	$retorno = $kitDAO->cadastraKit($entidadeKit);
	echo $retorno;
 ?>