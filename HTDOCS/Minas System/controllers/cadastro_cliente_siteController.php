<?php 
	session_start();

	require_once "../classe/entidade/Cliente_site.php";
	require_once "../classe/dao/cliente_siteDAO.php";

	$entidadeCliente_site = new Cliente_site();
	$cliente_siteDAO = new cliente_siteDAO();
	
	$entidadeCliente_site->set($_POST['nome_cliente_site'], 'nome_cliente_site');
	$entidadeCliente_site->set($_POST['login_cliente_site'], 'login_cliente_site');
	$entidadeCliente_site->set("password(\"".$_POST['senha_cliente_site']."\")", 'senha_cliente_site');
	$entidadeCliente_site->set($_POST['telefone_cliente_site'], 'telefone_cliente_site');
	$entidadeCliente_site->set($_POST['celular_cliente_site'], 'celular_cliente_site');
	$entidadeCliente_site->set($_POST['endereco_cliente_site'], 'endereco_cliente_site');

	$numero_cliente_site = $_POST['numero_cliente_site'] == '' ? 0 : $_POST['numero_cliente_site'];
	$entidadeCliente_site->set($numero_cliente_site, 'numero_cliente_site');

	$entidadeCliente_site->set($_POST['complemento_cliente_site'], 'complemento_cliente_site');
	$entidadeCliente_site->set($_POST['bairro_cliente_site'], 'bairro_cliente_site');
	$entidadeCliente_site->set($_POST['cidade_cliente_site'], 'cidade_cliente_site');

	$estado_id = $_POST['estado_id'] == '' ? 0 : $_POST['estado_id'];
	$entidadeCliente_site->set(0, 'estado_id');

	$entidadeCliente_site->set($_POST['cep_cliente_site'], 'cep_cliente_site');

	$bool_ativo_cliente_site = $_POST['bool_ativo_cliente_site'] == '' ? 0 : $_POST['bool_ativo_cliente_site'];
	$entidadeCliente_site->set($bool_ativo_cliente_site, 'bool_ativo_cliente_site');


	$conn = new Conexao();
	$pdo = $conn->Connect(); 

	$contLogin = 0;
	$sql = "SELECT COUNT(*) FROM cliente_site WHERE login_cliente_site = '".$entidadeCliente_site->get('login_cliente_site')."';";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$contLogin = $dados[0];
	}

	if ($contLogin == 0) {
		$retorno = $cliente_siteDAO->cadastraCliente_site($entidadeCliente_site);
		echo $retorno;
		if ($retorno == 1 || $retorno == "1") {
			$sql = "SELECT id_cliente_site, nome_cliente_site FROM cliente_site ORDER BY id_cliente_site DESC LIMIT 1";

			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) {
				$_SESSION['login_cliente'] = $dados['id_cliente_site'];
				$_SESSION['nome_cliente'] = $dados['nome_cliente_site'];
			}
		}
		header("Location: ../index.php");
	}
	else {
		echo "-1";
		$_SESSION['login_cliente'] = "-1";
		$_SESSION['nome_cliente'] = "";
	}
?>
