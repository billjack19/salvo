
<?php 
	require_once "../classe/entidade/Item.php";
	require_once "../classe/dao/itemDAO.php";

	$entidadeItem = new Item();
	$itemDAO = new itemDAO();
	
	$entidadeItem->set($_POST['descricao_item'], 'descricao_item');
	$entidadeItem->set($_POST['descricao_site_item'], 'descricao_site_item');
	$entidadeItem->set($_POST['unidade_medida_item'], 'unidade_medida_item');
	$entidadeItem->set($_POST['imagem_item'], 'imagem_item');
	$entidadeItem->set($_POST['grupo_id'], 'grupo_id');
	$entidadeItem->set($_POST['usuario_id'], 'usuario_id');
	$entidadeItem->set($_POST['bool_ativo_item'], 'bool_ativo_item');

	$retorno = $itemDAO->cadastraItem($entidadeItem);
	echo $retorno;
?>
