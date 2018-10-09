<?php 
	require_once "../classe/entidade/Saiba_mais.php";
	require_once "../classe/dao/saiba_maisDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeSaiba_mais = new Saiba_mais();
		$saiba_maisDAO = new saiba_maisDAO();
		
		$entidadeSaiba_mais->set($_POST['descricao_saiba_mais'], 'descricao_saiba_mais');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeSaiba_mais->set($usuario_id, 'usuario_id');

		$entidadeSaiba_mais->set($_POST['data_atualizacao_saiba_mais'], 'data_atualizacao_saiba_mais');

		$bool_ativo_saiba_mais = $_POST['bool_ativo_saiba_mais'] == '' ? 0 : $_POST['bool_ativo_saiba_mais'];
		$entidadeSaiba_mais->set($bool_ativo_saiba_mais, 'bool_ativo_saiba_mais');


		$retorno = $saiba_maisDAO->atualizaSaiba_mais($entidadeSaiba_mais, $_POST['id_saiba_mais'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>