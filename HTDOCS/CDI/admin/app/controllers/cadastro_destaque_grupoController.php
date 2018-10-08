
<?php 
	require_once "../classe/entidade/Destaque_grupo.php";
	require_once "../classe/dao/destaque_grupoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";


	


	if ($gravar) {
		$entidadeDestaque_grupo = new Destaque_grupo();
		$destaque_grupoDAO = new destaque_grupoDAO();
		
		$entidadeDestaque_grupo->set($_POST['titulo_destaque_grupo'], 'titulo_destaque_grupo');

		$grupo_id = $_POST['grupo_id'] == '' ? 0 : $_POST['grupo_id'];
		$entidadeDestaque_grupo->set($grupo_id, 'grupo_id');

		$entidadeDestaque_grupo->set($_POST['imagem_destaque_grupo'], 'imagem_destaque_grupo');
		$entidadeDestaque_grupo->set($_POST['descricao_destaque_grupo'], 'descricao_destaque_grupo');

		$configurar_site_id = $_POST['configurar_site_id'] == '' ? 0 : $_POST['configurar_site_id'];
		$entidadeDestaque_grupo->set($configurar_site_id, 'configurar_site_id');

		$entidadeDestaque_grupo->set($_POST['data_atualizacao_destaque_grupo'], 'data_atualizacao_destaque_grupo');

		$bool_ativo_destaque_grupo = $_POST['bool_ativo_destaque_grupo'] == '' ? 0 : $_POST['bool_ativo_destaque_grupo'];
		$entidadeDestaque_grupo->set($bool_ativo_destaque_grupo, 'bool_ativo_destaque_grupo');


		$retorno = $destaque_grupoDAO->cadastraDestaque_grupo($entidadeDestaque_grupo);
		echo $retorno;
	}
	else echo $saida;
?>
