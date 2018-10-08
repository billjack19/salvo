
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_topicos_cards'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT topicos_cards.* 
				FROM topicos_cards topicos_cards  
				WHERE descricao_topicos_cards LIKE '%$filtro%'
				OR data_atualizacao_topicos_cards LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_topicos_cards"]."{,}".
					$dados["descricao_topicos_cards"]."{,}".
					$dados["cards_id"]."{,}".
					$dados["data_atualizacao_topicos_cards"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_topicos_cards"];
		} else {
			echo    "[]".
					$dados["id_topicos_cards"]."{,}".
					$dados["descricao_topicos_cards"]."{,}".
					$dados["cards_id"]."{,}".
					$dados["data_atualizacao_topicos_cards"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_topicos_cards"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_topicos_cards_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT topicos_cards.* 
				FROM topicos_cards topicos_cards
				WHERE id_topicos_cards = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_topicos_cards"]."{,}".
					$dados["descricao_topicos_cards"]."{,}".
					$dados["cards_id"]."{,}".
					$dados["data_atualizacao_topicos_cards"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_topicos_cards"];
	}
}




if (!empty($_POST['pequisa_topicos_cards_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT topicos_cards.* 
				FROM topicos_cards topicos_cards 
				WHERE $coluna = $id 
				AND (
					   descricao_topicos_cards LIKE '%$filtro%'
					OR data_atualizacao_topicos_cards LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_topicos_cards"]."{,}".
					$dados["descricao_topicos_cards"]."{,}".
					$dados["cards_id"]."{,}".
					$dados["data_atualizacao_topicos_cards"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_topicos_cards"];
		} else {
			echo    "[]".
					$dados["id_topicos_cards"]."{,}".
					$dados["descricao_topicos_cards"]."{,}".
					$dados["cards_id"]."{,}".
					$dados["data_atualizacao_topicos_cards"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_topicos_cards"];
		}
		$cont++;
	}
}

?>
