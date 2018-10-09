<?php
	/* cacambaController .php */

	require_once "../class/entidade/Cacamba.php";
	require_once "../class/dao/cacambaDAO.php";	

	$entidadeCacamba = new Cacamba();
	$cacambaDAO = new cacambaDAO();

	$entidadeCacamba->set($_POST['descricao_cacamba'], 'descricao_cacamba');
	$entidadeCacamba->set($_POST['cnpj_user'], 'cnpj_user');

	$retorno = $cacambaDAO->cadastraCacamba($entidadeCacamba);
	echo $retorno;
?>