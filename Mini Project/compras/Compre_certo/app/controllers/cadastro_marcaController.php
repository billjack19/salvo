<?php 
	require_once "../classe/entidade/Marca.php";
	require_once "../classe/dao/marcaDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeMarca = new Marca();
		$marcaDAO = new marcaDAO();
		
		$entidadeMarca->set($_POST['descricao_marca'], 'descricao_marca');
		$entidadeMarca->set($_POST['data_atualizacao_marca'], 'data_atualizacao_marca');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeMarca->set($usuario_id, 'usuario_id');


		$bool_ativo_marca = $_POST['bool_ativo_marca'] == '' ? 0 : $_POST['bool_ativo_marca'];
		$entidadeMarca->set($bool_ativo_marca, 'bool_ativo_marca');


		$retorno = $marcaDAO->cadastraMarca($entidadeMarca, $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>