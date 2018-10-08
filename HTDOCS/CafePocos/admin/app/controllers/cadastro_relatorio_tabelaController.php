
<?php 
	require_once "../classe/entidade/Relatorio_tabela.php";
	require_once "../classe/dao/relatorio_tabelaDAO.php";

	$entidadeRelatorio_tabela = new Relatorio_tabela();
	$relatorio_tabelaDAO = new relatorio_tabelaDAO();
	
	$entidadeRelatorio_tabela->set($_POST['descricao_relatorio_tabela'], 'descricao_relatorio_tabela');
	$entidadeRelatorio_tabela->set($_POST['data_atualizacao_relatorio_tabela'], 'data_atualizacao_relatorio_tabela');

	$bool_ativo_relatorio_tabela = $_POST['bool_ativo_relatorio_tabela'] == '' ? 0 : $_POST['bool_ativo_relatorio_tabela'];
	$entidadeRelatorio_tabela->set($bool_ativo_relatorio_tabela, 'bool_ativo_relatorio_tabela');


	$retorno = $relatorio_tabelaDAO->cadastraRelatorio_tabela($entidadeRelatorio_tabela);
	echo $retorno;
?>
