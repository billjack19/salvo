<?php

	require_once "../class/entidade/Cliente.php";
	require_once "../class/dao/clienteDAO.php";	

	$entidadeCliente = new Cliente();
	$clienteDAO = new clienteDAO();

	$entidadeCliente->set($_POST['razao_social'], 'razao_social');
	$entidadeCliente->set($_POST['tipo'], 'tipo');
	$entidadeCliente->set($_POST['inscricao_federal'], 'inscricao_federal');
	$entidadeCliente->set($_POST['telefone'], 'telefone');
	$entidadeCliente->set($_POST['email'], 'email');

	$retorno = $clienteDAO->atualizaCliente($entidadeCliente, $_POST['id']);
	echo $retorno;
?>