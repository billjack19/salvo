<?php
	require_once "../class/entidade/Residencial.php";
	require_once "../class/dao/residencialDAO.php";	

	$entidadeResidencial = new Residencial();
	$residencialDAO = new residencialDAO();

	$entidadeResidencial->set($_POST['endereco'], 'endereco_residencial');
	$entidadeResidencial->set($_POST['numero'], 'numero_residencial');
	$entidadeResidencial->set($_POST['bairro'], 'bairro_residencial');
	$entidadeResidencial->set($_POST['cidade'], 'cidade_residencial');
	$entidadeResidencial->set($_POST['uf'], 'uf_residencial');
	$entidadeResidencial->set($_POST['cep'], 'cep_residencial');
	$entidadeResidencial->set($_POST['titulo'], 'titulo_residencial');

	$id_consumidor = $residencialDAO->cadastraResidencial($entidadeResidencial);

	if ($id_consumidor != 0) {
		require_once "../class/entidade/Cacamba.php";
		require_once "../class/dao/cacambaDAO.php";

		$entidadeCacamba = new Cacamba();
		$cacambaDAO = new cacambaDAO();

		$entidadeCacamba->set($_POST['latidude'], 'latidude');
		$entidadeCacamba->set($_POST['logitude'], 'logitude');
		$entidadeCacamba->set(1, 'situacao');
		$entidadeCacamba->set($_POST['titulo'], 'titulo');
		$entidadeCacamba->set('r', 'tipo');
		$entidadeCacamba->set($id_consumidor, 'id_consumidor');
		$entidadeCacamba->set(0, 'confirma_carreto');
		$entidadeCacamba->set(0, 'flag_entrega');
		$entidadeCacamba->set(0, 'flag_recolhe');
		$entidadeCacamba->set(0, 'flag_pagto');
		
		$retorno = $cacambaDAO->cadastraCacamba($entidadeCacamba);
		echo $retorno;
	} else {
		echo 0;
	}
?>