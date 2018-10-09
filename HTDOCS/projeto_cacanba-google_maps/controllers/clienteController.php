<?php

	require_once "../class/entidade/Cliente.php";
	require_once "../class/dao/clienteDAO.php";	

	$entidadeCliente = new Cliente();
	$clienteDAO = new clienteDAO();

	$entidadeCliente->set($_POST['razao_social'], 'razao_social');
	$entidadeCliente->set($_POST['tipo'], 'tipo');
	$entidadeCliente->set($_POST['inscricao_federal'], 'inscricao_federal');
	$entidadeCliente->set(1, 'bool_ativo');
	$entidadeCliente->set($_POST['telefone'], 'telefone');
	$entidadeCliente->set($_POST['email'], 'email');
	$entidadeCliente->set($_POST['cnpj_user'], 'cnpj_user');

	$id_cliente = $clienteDAO->cadastraCliente($entidadeCliente);

	if ((int) $id_cliente != 0) {
		require_once "../class/entidade/Local_Entrega.php";
		require_once "../class/dao/local_EntregaDAO.php";

		$entidadeLocal_Entrega = new Local_Entrega();
		$local_EntregaDAO = new local_EntregaDAO();

		$entidadeLocal_Entrega->set($_POST['endereco'], 'endereco');
		$entidadeLocal_Entrega->set($_POST['numero'], 'numero');
		$entidadeLocal_Entrega->set($_POST['complemento'], 'complemento');
		$entidadeLocal_Entrega->set($_POST['bairro'], 'bairro');
		$entidadeLocal_Entrega->set($_POST['cidade'], 'cidade');
		$entidadeLocal_Entrega->set($_POST['uf'], 'uf');
		$entidadeLocal_Entrega->set($_POST['cep'], 'cep');
		$entidadeLocal_Entrega->set((int) $id_cliente, 'cliente_id');
		$entidadeLocal_Entrega->set($_POST['latitude'], 'latitude');
		$entidadeLocal_Entrega->set($_POST['longitude'], 'longitude');
		$entidadeLocal_Entrega->set(1, 'bool_ativo');


		
		$id_local_entrega = $local_EntregaDAO->cadastraLocalEntrega($entidadeLocal_Entrega);
		if ($id_local_entrega != 0) {
			$retorno = $clienteDAO->enderecoPrincipalCliente($id_local_entrega, $id_cliente);
			echo $retorno;
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}



?>