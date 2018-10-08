
<?php 
	require_once "../classe/entidade/Item_orcamento.php";
	require_once "../classe/dao/item_orcamentoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";


	


	if ($gravar) {
		$entidadeItem_orcamento = new Item_orcamento();
		$item_orcamentoDAO = new item_orcamentoDAO();
		
		$entidadeItem_orcamento->set($_POST['data_lanc_item_orcamento'], 'data_lanc_item_orcamento');

		$orcamento_id = $_POST['orcamento_id'] == '' ? 0 : $_POST['orcamento_id'];
		$entidadeItem_orcamento->set($orcamento_id, 'orcamento_id');


		$item_id = $_POST['item_id'] == '' ? 0 : $_POST['item_id'];
		$entidadeItem_orcamento->set($item_id, 'item_id');


		$quantidade_item_orcamento = $_POST['quantidade_item_orcamento'] == '' ? 0 : $_POST['quantidade_item_orcamento'];
		$entidadeItem_orcamento->set($quantidade_item_orcamento, 'quantidade_item_orcamento');


		$total_item_orcamento = $_POST['total_item_orcamento'] == '' ? 0 : $_POST['total_item_orcamento'];
		$entidadeItem_orcamento->set($total_item_orcamento, 'total_item_orcamento');


		$bool_ativo_item_orcamento = $_POST['bool_ativo_item_orcamento'] == '' ? 0 : $_POST['bool_ativo_item_orcamento'];
		$entidadeItem_orcamento->set($bool_ativo_item_orcamento, 'bool_ativo_item_orcamento');


		$retorno = $item_orcamentoDAO->cadastraItem_orcamento($entidadeItem_orcamento);
		echo $retorno;
	}
	else echo $saida;
?>
