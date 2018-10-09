
<?php 
	require_once "../classe/entidade/Orcamento.php";
	require_once "../classe/dao/orcamentoDAO.php";

	$entidadeOrcamento = new Orcamento();
	$orcamentoDAO = new orcamentoDAO();
	
	$entidadeOrcamento->set($_POST['descricao_orcamento'], 'descricao_orcamento');
	$entidadeOrcamento->set($_POST['cliente_site_id'], 'cliente_site_id');
	$entidadeOrcamento->set($_POST['data_lanc_orcamento'], 'data_lanc_orcamento');
	$entidadeOrcamento->set($_POST['bool_ativo_orcamento'], 'bool_ativo_orcamento');

	$retorno = $orcamentoDAO->cadastraOrcamento($entidadeOrcamento);
	echo $retorno;
?>
