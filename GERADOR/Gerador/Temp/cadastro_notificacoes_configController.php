
<?php 
	require_once "../classe/entidade/Notificacoes_config.php";
	require_once "../classe/dao/notificacoes_configDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";


	


	if ($gravar) {
		$entidadeNotificacoes_config = new Notificacoes_config();
		$notificacoes_configDAO = new notificacoes_configDAO();
		
		$entidadeNotificacoes_config->set($_POST['area_notificacoes_config'], 'area_notificacoes_config');
		$entidadeNotificacoes_config->set($_POST['tipo_alteracao_notificacoes_config'], 'tipo_alteracao_notificacoes_config');
		$entidadeNotificacoes_config->set($_POST['data_atualizacao_notificacoes_config'], 'data_atualizacao_notificacoes_config');
		$entidadeNotificacoes_config->set($_POST['usuario_id'], 'usuario_id');
		$entidadeNotificacoes_config->set($_POST['bool_ativo_notificacoes_config'], 'bool_ativo_notificacoes_config');

		$retorno = $notificacoes_configDAO->cadastraNotificacoes_config($entidadeNotificacoes_config);
		echo $retorno;
	}
	else echo $saida;
?>
