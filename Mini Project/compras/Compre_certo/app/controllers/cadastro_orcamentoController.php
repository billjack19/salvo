<?php 
	require_once "../classe/entidade/Orcamento.php";
	require_once "../classe/dao/orcamentoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeOrcamento = new Orcamento();
		$orcamentoDAO = new orcamentoDAO();
		
		$entidadeOrcamento->set($_POST['emissao_orcamento'], 'emissao_orcamento');
		$entidadeOrcamento->set($_POST['descricao_orcamento'], 'descricao_orcamento');
		$entidadeOrcamento->set($_POST['data_atualizacao_orcamento'], 'data_atualizacao_orcamento');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeOrcamento->set($usuario_id, 'usuario_id');


		$bool_ativo_orcamento = $_POST['bool_ativo_orcamento'] == '' ? 0 : $_POST['bool_ativo_orcamento'];
		$entidadeOrcamento->set($bool_ativo_orcamento, 'bool_ativo_orcamento');


		$retorno = $orcamentoDAO->cadastraOrcamento($entidadeOrcamento, $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>