
<?php 
	require_once "../classe/entidade/Destaque_itens.php";
	require_once "../classe/dao/destaque_itensDAO.php";

	$entidadeDestaque_itens = new Destaque_itens();
	$destaque_itensDAO = new destaque_itensDAO();
	
	$entidadeDestaque_itens->set($_POST['descricao_destaque_itens'], 'descricao_destaque_itens');
	$entidadeDestaque_itens->set($_POST['item_id'], 'item_id');
	$entidadeDestaque_itens->set($_POST['configurar_site_id'], 'configurar_site_id');
	$entidadeDestaque_itens->set($_POST['data_atualizacao_destaque_itens'], 'data_atualizacao_destaque_itens');
	$entidadeDestaque_itens->set($_POST['bool_ativo_destaque_itens'], 'bool_ativo_destaque_itens');

	$retorno = $destaque_itensDAO->atualizaDestaque_itens($entidadeDestaque_itens, $_POST['id_destaque_itens']);
	echo $retorno;
?>
