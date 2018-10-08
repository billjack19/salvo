
<?php 
	require_once "../classe/entidade/Topicos_cards.php";
	require_once "../classe/dao/topicos_cardsDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";

	

	if ($gravar) {
		$entidadeTopicos_cards = new Topicos_cards();
		$topicos_cardsDAO = new topicos_cardsDAO();
		
		$entidadeTopicos_cards->set($_POST['descricao_topicos_cards'], 'descricao_topicos_cards');

		$cards_id = $_POST['cards_id'] == '' ? 0 : $_POST['cards_id'];
		$entidadeTopicos_cards->set($cards_id, 'cards_id');

		$entidadeTopicos_cards->set($_POST['data_atualizacao_topicos_cards'], 'data_atualizacao_topicos_cards');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeTopicos_cards->set($usuario_id, 'usuario_id');


		$bool_ativo_topicos_cards = $_POST['bool_ativo_topicos_cards'] == '' ? 0 : $_POST['bool_ativo_topicos_cards'];
		$entidadeTopicos_cards->set($bool_ativo_topicos_cards, 'bool_ativo_topicos_cards');


		$retorno = $topicos_cardsDAO->atualizaTopicos_cards($entidadeTopicos_cards, $_POST['id_topicos_cards']);
		echo $retorno;
	}
	else echo $saida;
?>
