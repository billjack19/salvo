
<?php 
	require_once "../classe/entidade/Estado.php";
	require_once "../classe/dao/estadoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";

	

	if ($gravar) {
		$entidadeEstado = new Estado();
		$estadoDAO = new estadoDAO();
		
		$entidadeEstado->set($_POST['descricao_estado'], 'descricao_estado');
		$entidadeEstado->set($_POST['sigla_estado'], 'sigla_estado');

		$bool_ativo_estado = $_POST['bool_ativo_estado'] == '' ? 0 : $_POST['bool_ativo_estado'];
		$entidadeEstado->set($bool_ativo_estado, 'bool_ativo_estado');


		$retorno = $estadoDAO->atualizaEstado($entidadeEstado, $_POST['id_estado']);
		echo $retorno;
	}
	else echo $saida;
?>
