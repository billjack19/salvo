
<?php 
	require_once "../classe/entidade/Topicos_loja.php";
	require_once "../classe/dao/topicos_lojaDAO.php";

	$entidadeTopicos_loja = new Topicos_loja();
	$topicos_lojaDAO = new topicos_lojaDAO();
	
	$entidadeTopicos_loja->set($_POST['titulo_topicos_loja'], 'titulo_topicos_loja');
	$entidadeTopicos_loja->set($_POST['descricao_topicos_loja'], 'descricao_topicos_loja');

	$loja_id = $_POST['loja_id'] == '' ? 0 : $_POST['loja_id'];
	$entidadeTopicos_loja->set($loja_id, 'loja_id');

	$entidadeTopicos_loja->set($_POST['data_atualizacao_topicos_loja'], 'data_atualizacao_topicos_loja');

	$bool_ativo_topicos_loja = $_POST['bool_ativo_topicos_loja'] == '' ? 0 : $_POST['bool_ativo_topicos_loja'];
	$entidadeTopicos_loja->set($bool_ativo_topicos_loja, 'bool_ativo_topicos_loja');


	$retorno = $topicos_lojaDAO->atualizaTopicos_loja($entidadeTopicos_loja, $_POST['id_topicos_loja']);
	echo $retorno;
?>
