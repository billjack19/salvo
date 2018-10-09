
<?php 
	require_once "../classe/entidade/Destaque.php";
	require_once "../classe/dao/destaqueDAO.php";

	$entidadeDestaque = new Destaque();
	$destaqueDAO = new destaqueDAO();
	
	$entidadeDestaque->set($_POST['descricao_destaque'], 'descricao_destaque');
	$entidadeDestaque->set($_POST['grupo_id'], 'grupo_id');
	$entidadeDestaque->set($_POST['imagem_destaque'], 'imagem_destaque');
	$entidadeDestaque->set($_POST['data_atualizacao_destaque'], 'data_atualizacao_destaque');
	$entidadeDestaque->set($_POST['bool_ativo_destaque'], 'bool_ativo_destaque');

	$retorno = $destaqueDAO->atualizaDestaque($entidadeDestaque, $_POST['id_destaque']);
	echo $retorno;
?>
