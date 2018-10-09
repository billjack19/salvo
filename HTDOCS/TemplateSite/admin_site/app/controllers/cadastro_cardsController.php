
<?php 
	require_once "../classe/entidade/Cards.php";
	require_once "../classe/dao/cardsDAO.php";

	$entidadeCards = new Cards();
	$cardsDAO = new cardsDAO();
	
	$entidadeCards->set($_POST['titulo_cards'], 'titulo_cards');
	$entidadeCards->set($_POST['descricao_cards'], 'descricao_cards');
	$entidadeCards->set($_POST['imagem_cards'], 'imagem_cards');
	$entidadeCards->set($_POST['data_atualizacao_cards'], 'data_atualizacao_cards');
	$entidadeCards->set($_POST['bool_ativo_cards'], 'bool_ativo_cards');

	$retorno = $cardsDAO->cadastraCards($entidadeCards);
	echo $retorno;
?>
