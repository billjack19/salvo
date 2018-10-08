
<?php 
	require_once "../classe/entidade/Links_uteis.php";
	require_once "../classe/dao/links_uteisDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";

	

	if ($gravar) {
		$entidadeLinks_uteis = new Links_uteis();
		$links_uteisDAO = new links_uteisDAO();
		
		$entidadeLinks_uteis->set($_POST['descricao_links_uteis'], 'descricao_links_uteis');
		$entidadeLinks_uteis->set($_POST['link_links_uteis'], 'link_links_uteis');
		$entidadeLinks_uteis->set($_POST['data_atualizacao_links_uteis'], 'data_atualizacao_links_uteis');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeLinks_uteis->set($usuario_id, 'usuario_id');


		$bool_ativo_links_uteis = $_POST['bool_ativo_links_uteis'] == '' ? 0 : $_POST['bool_ativo_links_uteis'];
		$entidadeLinks_uteis->set($bool_ativo_links_uteis, 'bool_ativo_links_uteis');


		$retorno = $links_uteisDAO->atualizaLinks_uteis($entidadeLinks_uteis, $_POST['id_links_uteis']);
		echo $retorno;
	}
	else echo $saida;
?>
