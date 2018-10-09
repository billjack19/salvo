
<?php 
	require_once "../classe/entidade/Item.php";
	require_once "../classe/dao/itemDAO.php";

	$entidadeItem = new Item();
	$itemDAO = new itemDAO();
	
	$entidadeItem->set($_POST['DESCRICAO'], 'DESCRICAO');
	$entidadeItem->set($_POST['UNIDADE_MEDIDA'], 'UNIDADE_MEDIDA');
	$entidadeItem->set($_POST['PESO_UNITARIO'], 'PESO_UNITARIO');
	$entidadeItem->set($_POST['ESTOQUE'], 'ESTOQUE');

	$retorno = $itemDAO->atualizaItem($entidadeItem, $_POST['ITEM']);
	echo $retorno;
?>
