
<?php 
	require_once "../classe/entidade/Destaque_grupo.php";
	require_once "../classe/dao/destaque_grupoDAO.php";

	$entidadeDestaque_grupo = new Destaque_grupo();
	$destaque_grupoDAO = new destaque_grupoDAO();
	
	$entidadeDestaque_grupo->set($_POST['titulo_destaque_grupo'], 'titulo_destaque_grupo');
	$entidadeDestaque_grupo->set($_POST['grupo_id'], 'grupo_id');
	$entidadeDestaque_grupo->set($_POST['imagem_destaque_grupo'], 'imagem_destaque_grupo');
	$entidadeDestaque_grupo->set($_POST['descricao_destaque_grupo'], 'descricao_destaque_grupo');
	$entidadeDestaque_grupo->set($_POST['configurar_site_id'], 'configurar_site_id');
	$entidadeDestaque_grupo->set($_POST['data_atualizacao_destaque_grupo'], 'data_atualizacao_destaque_grupo');
	$entidadeDestaque_grupo->set($_POST['bool_ativo_destaque_grupo'], 'bool_ativo_destaque_grupo');

	$retorno = $destaque_grupoDAO->atualizaDestaque_grupo($entidadeDestaque_grupo, $_POST['id_destaque_grupo']);
	echo $retorno;
?>
