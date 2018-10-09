
<?php 
	require_once "../classe/entidade/Grupo.php";
	require_once "../classe/dao/grupoDAO.php";

	$entidadeGrupo = new Grupo();
	$grupoDAO = new grupoDAO();
	
	$entidadeGrupo->set($_POST['descricao_grupo'], 'descricao_grupo');
	$entidadeGrupo->set($_POST['data_atualizacao_grupo'], 'data_atualizacao_grupo');
	$entidadeGrupo->set($_POST['usuario_id'], 'usuario_id');
	$entidadeGrupo->set($_POST['bool_ativo_grupo'], 'bool_ativo_grupo');

	$retorno = $grupoDAO->atualizaGrupo($entidadeGrupo, $_POST['id_grupo']);
	echo $retorno;
?>
