<?php 
	require_once "../classe/entidade/Lanc_preco.php";
	require_once "../classe/dao/lanc_precoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeLanc_preco = new Lanc_preco();
		$lanc_precoDAO = new lanc_precoDAO();
		

		$supermercado_id = $_POST['supermercado_id'] == '' ? 0 : $_POST['supermercado_id'];
		$entidadeLanc_preco->set($supermercado_id, 'supermercado_id');


		$item_id = $_POST['item_id'] == '' ? 0 : $_POST['item_id'];
		$entidadeLanc_preco->set($item_id, 'item_id');


		$marca_id = $_POST['marca_id'] == '' ? 0 : $_POST['marca_id'];
		$entidadeLanc_preco->set($marca_id, 'marca_id');


		$preco_lanc_preco = $_POST['preco_lanc_preco'] == '' ? 0 : $_POST['preco_lanc_preco'];
		$entidadeLanc_preco->set($preco_lanc_preco, 'preco_lanc_preco');

		$entidadeLanc_preco->set($_POST['data_atualizacao_lanc_preco'], 'data_atualizacao_lanc_preco');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeLanc_preco->set($usuario_id, 'usuario_id');


		$bool_ativo_lanc_preco = $_POST['bool_ativo_lanc_preco'] == '' ? 0 : $_POST['bool_ativo_lanc_preco'];
		$entidadeLanc_preco->set($bool_ativo_lanc_preco, 'bool_ativo_lanc_preco');


		$retorno = $lanc_precoDAO->cadastraLanc_preco($entidadeLanc_preco, $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>