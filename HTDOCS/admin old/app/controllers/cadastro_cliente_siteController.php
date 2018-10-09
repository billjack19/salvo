
<?php 
	require_once "../classe/entidade/Cliente_site.php";
	require_once "../classe/dao/cliente_siteDAO.php";

	$entidadeCliente_site = new Cliente_site();
	$cliente_siteDAO = new cliente_siteDAO();
	
	$entidadeCliente_site->set($_POST['nome_cliente_site'], 'nome_cliente_site');
	$entidadeCliente_site->set($_POST['login_cliente_site'], 'login_cliente_site');
	$entidadeCliente_site->set($_POST['senha_cliente_site'], 'senha_cliente_site');
	$entidadeCliente_site->set($_POST['telefone_cliente_site'], 'telefone_cliente_site');
	$entidadeCliente_site->set($_POST['celular_cliente_site'], 'celular_cliente_site');
	$entidadeCliente_site->set($_POST['endereco_cliente_site'], 'endereco_cliente_site');
	$entidadeCliente_site->set($_POST['numero_cliente_site'], 'numero_cliente_site');
	$entidadeCliente_site->set($_POST['complemento_cliente_site'], 'complemento_cliente_site');
	$entidadeCliente_site->set($_POST['bairro_cliente_site'], 'bairro_cliente_site');
	$entidadeCliente_site->set($_POST['cidade_cliente_site'], 'cidade_cliente_site');
	$entidadeCliente_site->set($_POST['estado_id'], 'estado_id');
	$entidadeCliente_site->set($_POST['cep_cliente_site'], 'cep_cliente_site');
	$entidadeCliente_site->set($_POST['bool_ativo_cliente_site'], 'bool_ativo_cliente_site');

	$retorno = $cliente_siteDAO->cadastraCliente_site($entidadeCliente_site);
	echo $retorno;
?>
