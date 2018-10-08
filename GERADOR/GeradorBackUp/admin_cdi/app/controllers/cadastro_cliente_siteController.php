
<?php 
	require_once "../classe/entidade/Cliente_site.php";
	require_once "../classe/dao/cliente_siteDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";


	


	if ($gravar) {
		$entidadeCliente_site = new Cliente_site();
		$cliente_siteDAO = new cliente_siteDAO();
		
		$entidadeCliente_site->set($_POST['nome_cliente_site'], 'nome_cliente_site');
		$entidadeCliente_site->set($_POST['login_cliente_site'], 'login_cliente_site');
		$entidadeCliente_site->set($_POST['senha_cliente_site'], 'senha_cliente_site');
		$entidadeCliente_site->set($_POST['telefone_cliente_site'], 'telefone_cliente_site');
		$entidadeCliente_site->set($_POST['celular_cliente_site'], 'celular_cliente_site');
		$entidadeCliente_site->set($_POST['endereco_cliente_site'], 'endereco_cliente_site');

		$numero_cliente_site = $_POST['numero_cliente_site'] == '' ? 0 : $_POST['numero_cliente_site'];
		$entidadeCliente_site->set($numero_cliente_site, 'numero_cliente_site');

		$entidadeCliente_site->set($_POST['complemento_cliente_site'], 'complemento_cliente_site');
		$entidadeCliente_site->set($_POST['bairro_cliente_site'], 'bairro_cliente_site');
		$entidadeCliente_site->set($_POST['cidade_cliente_site'], 'cidade_cliente_site');

		$estado_id = $_POST['estado_id'] == '' ? 0 : $_POST['estado_id'];
		$entidadeCliente_site->set($estado_id, 'estado_id');

		$entidadeCliente_site->set($_POST['cep_cliente_site'], 'cep_cliente_site');

		$bool_ativo_cliente_site = $_POST['bool_ativo_cliente_site'] == '' ? 0 : $_POST['bool_ativo_cliente_site'];
		$entidadeCliente_site->set($bool_ativo_cliente_site, 'bool_ativo_cliente_site');


		$retorno = $cliente_siteDAO->cadastraCliente_site($entidadeCliente_site);
		echo $retorno;
	}
	else echo $saida;
?>
