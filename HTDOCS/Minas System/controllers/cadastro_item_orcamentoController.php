
<?php 
	require_once "../classe/entidade/Item_orcamento.php";
	require_once "../classe/dao/item_orcamentoDAO.php";

	$entidadeItem_orcamento = new Item_orcamento();
	$item_orcamentoDAO = new item_orcamentoDAO();
	
	$entidadeItem_orcamento->set($_POST['data_lanc_item_orcamento'], 'data_lanc_item_orcamento');
	$entidadeItem_orcamento->set($_POST['orcamento_id'], 'orcamento_id');
	$entidadeItem_orcamento->set($_POST['item_id'], 'item_id');
	$entidadeItem_orcamento->set($_POST['quantidade_item_orcamento'], 'quantidade_item_orcamento');
	$entidadeItem_orcamento->set($_POST['total_item_orcamento'], 'total_item_orcamento');
	$entidadeItem_orcamento->set($_POST['bool_ativo_item_orcamento'], 'bool_ativo_item_orcamento');

	$retorno = $item_orcamentoDAO->cadastraItem_orcamento($entidadeItem_orcamento);
	echo $retorno;
?>
