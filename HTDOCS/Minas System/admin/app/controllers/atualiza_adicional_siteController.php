<?php 
	require_once "../classe/entidade/Adicional_site.php";
	require_once "../classe/dao/adicional_siteDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeAdicional_site = new Adicional_site();
		$adicional_siteDAO = new adicional_siteDAO();
		
		$entidadeAdicional_site->set($_POST['titulo_adicional_site'], 'titulo_adicional_site');
		$entidadeAdicional_site->set($_POST['descricao_adicional_site'], 'descricao_adicional_site');
		$entidadeAdicional_site->set($_POST['imagem_adicional_site'], 'imagem_adicional_site');

		$saiba_mais_id = $_POST['saiba_mais_id'] == '' ? 0 : $_POST['saiba_mais_id'];
		$entidadeAdicional_site->set($saiba_mais_id, 'saiba_mais_id');


		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeAdicional_site->set($usuario_id, 'usuario_id');

		$entidadeAdicional_site->set($_POST['data_atualizacao_adicional_site'], 'data_atualizacao_adicional_site');

		$bool_ativo_adicional_site = $_POST['bool_ativo_adicional_site'] == '' ? 0 : $_POST['bool_ativo_adicional_site'];
		$entidadeAdicional_site->set($bool_ativo_adicional_site, 'bool_ativo_adicional_site');


		$retorno = $adicional_siteDAO->atualizaAdicional_site($entidadeAdicional_site, $_POST['id_adicional_site'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>