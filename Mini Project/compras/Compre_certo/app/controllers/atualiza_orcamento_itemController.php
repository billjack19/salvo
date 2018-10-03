<?php 
	require_once "../classe/entidade/Orcamento_item.php";
	require_once "../classe/dao/orcamento_itemDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeOrcamento_item = new Orcamento_item();
		$orcamento_itemDAO = new orcamento_itemDAO();
		

		$supermercado_id = $_POST['supermercado_id'] == '' ? 0 : $_POST['supermercado_id'];
		$entidadeOrcamento_item->set($supermercado_id, 'supermercado_id');


		$item_id = $_POST['item_id'] == '' ? 0 : $_POST['item_id'];
		$entidadeOrcamento_item->set($item_id, 'item_id');


		$marca_id = $_POST['marca_id'] == '' ? 0 : $_POST['marca_id'];
		$entidadeOrcamento_item->set($marca_id, 'marca_id');


		$quantidade_orcamento_item = $_POST['quantidade_orcamento_item'] == '' ? 0 : $_POST['quantidade_orcamento_item'];
		$entidadeOrcamento_item->set($quantidade_orcamento_item, 'quantidade_orcamento_item');


		$preco_orcamento_item = $_POST['preco_orcamento_item'] == '' ? 0 : $_POST['preco_orcamento_item'];
		$entidadeOrcamento_item->set($preco_orcamento_item, 'preco_orcamento_item');


		$total_orcamento_item = $_POST['total_orcamento_item'] == '' ? 0 : $_POST['total_orcamento_item'];
		$entidadeOrcamento_item->set($total_orcamento_item, 'total_orcamento_item');


		$orcamento_id = $_POST['orcamento_id'] == '' ? 0 : $_POST['orcamento_id'];
		$entidadeOrcamento_item->set($orcamento_id, 'orcamento_id');

		$entidadeOrcamento_item->set($_POST['data_atualizacao_orcamento_item'], 'data_atualizacao_orcamento_item');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeOrcamento_item->set($usuario_id, 'usuario_id');


		$bool_ativo_orcamento_item = $_POST['bool_ativo_orcamento_item'] == '' ? 0 : $_POST['bool_ativo_orcamento_item'];
		$entidadeOrcamento_item->set($bool_ativo_orcamento_item, 'bool_ativo_orcamento_item');


		$retorno = $orcamento_itemDAO->atualizaOrcamento_item($entidadeOrcamento_item, $_POST['id_orcamento_item'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>