
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cards'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT cards.* 
				FROM cards cards  
				WHERE titulo_cards LIKE '%$filtro%'
				OR descricao_cards LIKE '%$filtro%'
				OR imagem_cards LIKE '%$filtro%'
				OR data_atualizacao_cards LIKE '%$filtro%'
				OR bool_ativo_cards LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cards"]."{,}".
					$dados["titulo_cards"]."{,}".
					$dados["descricao_cards"]."{,}".
					$dados["imagem_cards"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_cards"]."{,}".
					$dados["bool_ativo_cards"];
		} else {
			echo    "[]".
					$dados["id_cards"]."{,}".
					$dados["titulo_cards"]."{,}".
					$dados["descricao_cards"]."{,}".
					$dados["imagem_cards"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_cards"]."{,}".
					$dados["bool_ativo_cards"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_cards_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT cards.* 
				FROM cards cards
				WHERE id_cards = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_cards"]."{,}".
					$dados["titulo_cards"]."{,}".
					$dados["descricao_cards"]."{,}".
					$dados["imagem_cards"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_cards"]."{,}".
					$dados["bool_ativo_cards"];
	}
}




if (!empty($_POST['pequisa_cards_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT cards.* 
				FROM cards cards 
				WHERE $coluna = $id 
				AND (
					   titulo_cards LIKE '%$filtro%'
					OR descricao_cards LIKE '%$filtro%'
					OR imagem_cards LIKE '%$filtro%'
					OR data_atualizacao_cards LIKE '%$filtro%'
					OR bool_ativo_cards LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cards"]."{,}".
					$dados["titulo_cards"]."{,}".
					$dados["descricao_cards"]."{,}".
					$dados["imagem_cards"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_cards"]."{,}".
					$dados["bool_ativo_cards"];
		} else {
			echo    "[]".
					$dados["id_cards"]."{,}".
					$dados["titulo_cards"]."{,}".
					$dados["descricao_cards"]."{,}".
					$dados["imagem_cards"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_cards"]."{,}".
					$dados["bool_ativo_cards"];
		}
		$cont++;
	}
}

?>
