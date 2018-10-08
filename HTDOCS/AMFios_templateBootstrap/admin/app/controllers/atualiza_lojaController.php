<?php 
	require_once "../classe/entidade/Loja.php";
	require_once "../classe/dao/lojaDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeLoja = new Loja();
		$lojaDAO = new lojaDAO();
		
		$entidadeLoja->set($_POST['titulo_loja'], 'titulo_loja');
		$entidadeLoja->set($_POST['descricao_loja'], 'descricao_loja');
		$entidadeLoja->set($_POST['imagem_loja'], 'imagem_loja');

		$configurar_site_id = $_POST['configurar_site_id'] == '' ? 0 : $_POST['configurar_site_id'];
		$entidadeLoja->set($configurar_site_id, 'configurar_site_id');

		$entidadeLoja->set($_POST['data_atualizacao_loja'], 'data_atualizacao_loja');

		$bool_ativo_loja = $_POST['bool_ativo_loja'] == '' ? 0 : $_POST['bool_ativo_loja'];
		$entidadeLoja->set($bool_ativo_loja, 'bool_ativo_loja');


		$retorno = $lojaDAO->atualizaLoja($entidadeLoja, $_POST['id_loja'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>