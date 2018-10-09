
<?php 
	require_once "../classe/entidade/Loja.php";
	require_once "../classe/dao/lojaDAO.php";

	$entidadeLoja = new Loja();
	$lojaDAO = new lojaDAO();
	
	$entidadeLoja->set($_POST['titulo_loja'], 'titulo_loja');
	$entidadeLoja->set($_POST['descricao_loja'], 'descricao_loja');
	$entidadeLoja->set($_POST['imagem_loja'], 'imagem_loja');
	$entidadeLoja->set($_POST['configurar_site_id'], 'configurar_site_id');
	$entidadeLoja->set($_POST['data_atualizacao_loja'], 'data_atualizacao_loja');
	$entidadeLoja->set($_POST['bool_ativo_loja'], 'bool_ativo_loja');

	$retorno = $lojaDAO->cadastraLoja($entidadeLoja);
	echo $retorno;
?>
