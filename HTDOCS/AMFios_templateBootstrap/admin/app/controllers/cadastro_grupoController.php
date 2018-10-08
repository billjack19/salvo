<?php 
	require_once "../classe/entidade/Grupo.php";
	require_once "../classe/dao/grupoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeGrupo = new Grupo();
		$grupoDAO = new grupoDAO();
		
		$entidadeGrupo->set($_POST['descricao_grupo'], 'descricao_grupo');
		$entidadeGrupo->set($_POST['data_atualizacao_grupo'], 'data_atualizacao_grupo');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeGrupo->set($usuario_id, 'usuario_id');


		$bool_ativo_grupo = $_POST['bool_ativo_grupo'] == '' ? 0 : $_POST['bool_ativo_grupo'];
		$entidadeGrupo->set($bool_ativo_grupo, 'bool_ativo_grupo');


		$retorno = $grupoDAO->cadastraGrupo($entidadeGrupo, $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>