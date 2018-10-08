<?php 
	require_once "../classe/entidade/Supermercado.php";
	require_once "../classe/dao/supermercadoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeSupermercado = new Supermercado();
		$supermercadoDAO = new supermercadoDAO();
		
		$entidadeSupermercado->set($_POST['descricao_supermercado'], 'descricao_supermercado');
		$entidadeSupermercado->set($_POST['data_atualizacao_supermercado'], 'data_atualizacao_supermercado');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeSupermercado->set($usuario_id, 'usuario_id');


		$bool_ativo_supermercado = $_POST['bool_ativo_supermercado'] == '' ? 0 : $_POST['bool_ativo_supermercado'];
		$entidadeSupermercado->set($bool_ativo_supermercado, 'bool_ativo_supermercado');


		$retorno = $supermercadoDAO->atualizaSupermercado($entidadeSupermercado, $_POST['id_supermercado'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>