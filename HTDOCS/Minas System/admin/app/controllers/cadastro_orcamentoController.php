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
		
		$entidadeOrcamento->set($_POST['descricao_orcamento'], 'descricao_orcamento');

		$cliente_site_id = $_POST['cliente_site_id'] == '' ? 0 : $_POST['cliente_site_id'];
		$entidadeOrcamento->set($cliente_site_id, 'cliente_site_id');

		$entidadeOrcamento->set($_POST['data_lanc_orcamento'], 'data_lanc_orcamento');

		$bool_ativo_orcamento = $_POST['bool_ativo_orcamento'] == '' ? 0 : $_POST['bool_ativo_orcamento'];
		$entidadeOrcamento->set($bool_ativo_orcamento, 'bool_ativo_orcamento');


		$retorno = $orcamentoDAO->cadastraOrcamento($entidadeOrcamento, $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>