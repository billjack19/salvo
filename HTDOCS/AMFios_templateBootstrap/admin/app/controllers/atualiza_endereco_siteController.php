<?php 
	require_once "../classe/entidade/Endereco_site.php";
	require_once "../classe/dao/endereco_siteDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeEndereco_site = new Endereco_site();
		$endereco_siteDAO = new endereco_siteDAO();
		
		$entidadeEndereco_site->set($_POST['descricao_endereco_site'], 'descricao_endereco_site');
		$entidadeEndereco_site->set($_POST['endereco_endereco_site'], 'endereco_endereco_site');

		$numero_endereco_site = $_POST['numero_endereco_site'] == '' ? 0 : $_POST['numero_endereco_site'];
		$entidadeEndereco_site->set($numero_endereco_site, 'numero_endereco_site');

		$entidadeEndereco_site->set($_POST['complemento_endereco_site'], 'complemento_endereco_site');
		$entidadeEndereco_site->set($_POST['bairro_endereco_site'], 'bairro_endereco_site');
		$entidadeEndereco_site->set($_POST['cidade_endereco_site'], 'cidade_endereco_site');

		$estado_id = $_POST['estado_id'] == '' ? 0 : $_POST['estado_id'];
		$entidadeEndereco_site->set($estado_id, 'estado_id');

		$entidadeEndereco_site->set($_POST['cep_endereco_site'], 'cep_endereco_site');
		$entidadeEndereco_site->set($_POST['telefone_endereco_site'], 'telefone_endereco_site');
		$entidadeEndereco_site->set($_POST['celular_endereco_site'], 'celular_endereco_site');
		$entidadeEndereco_site->set($_POST['email_endereco_site'], 'email_endereco_site');
		$entidadeEndereco_site->set($_POST['horario_funcionamento_endereco_site'], 'horario_funcionamento_endereco_site');
		$entidadeEndereco_site->set($_POST['latitude_endereco_site'], 'latitude_endereco_site');
		$entidadeEndereco_site->set($_POST['longitude_endereco_site'], 'longitude_endereco_site');

		$configurar_site_id = $_POST['configurar_site_id'] == '' ? 0 : $_POST['configurar_site_id'];
		$entidadeEndereco_site->set($configurar_site_id, 'configurar_site_id');

		$entidadeEndereco_site->set($_POST['data_atualizacao_endereco_site'], 'data_atualizacao_endereco_site');

		$bool_ativo_endereco_site = $_POST['bool_ativo_endereco_site'] == '' ? 0 : $_POST['bool_ativo_endereco_site'];
		$entidadeEndereco_site->set($bool_ativo_endereco_site, 'bool_ativo_endereco_site');


		$retorno = $endereco_siteDAO->atualizaEndereco_site($entidadeEndereco_site, $_POST['id_endereco_site'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>