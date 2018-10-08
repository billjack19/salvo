
<?php 
	require_once "../classe/entidade/Notificacoes.php";
	require_once "../classe/dao/notificacoesDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";

	

	if ($gravar) {
		$entidadeNotificacoes = new Notificacoes();
		$notificacoesDAO = new notificacoesDAO();
		
		$entidadeNotificacoes->set($_POST['descricao_notificacoes'], 'descricao_notificacoes');
		$entidadeNotificacoes->set($_POST['usuario_atuador_notificacoes'], 'usuario_atuador_notificacoes');
		$entidadeNotificacoes->set($_POST['usuaio_requerente_notificacoes'], 'usuaio_requerente_notificacoes');
		$entidadeNotificacoes->set($_POST['tipo_alteracao_notificacoes'], 'tipo_alteracao_notificacoes');
		$entidadeNotificacoes->set($_POST['notificacoes_config_id'], 'notificacoes_config_id');
		$entidadeNotificacoes->set($_POST['bool_view_notificacoes'], 'bool_view_notificacoes');

		$data_atualizacao_notificacoes = $_POST['data_atualizacao_notificacoes'] == '' ? 0 : $_POST['data_atualizacao_notificacoes'];
		$entidadeNotificacoes->set($data_atualizacao_notificacoes, 'data_atualizacao_notificacoes');


		$bool_ativo_notificacoes = $_POST['bool_ativo_notificacoes'] == '' ? 0 : $_POST['bool_ativo_notificacoes'];
		$entidadeNotificacoes->set($bool_ativo_notificacoes, 'bool_ativo_notificacoes');


		$retorno = $notificacoesDAO->atualizaNotificacoes($entidadeNotificacoes, $_POST['id_notificacoes']);
		echo $retorno;
	}
	else echo $saida;
?>
