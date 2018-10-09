
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_item_orcamento'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT item_orcamento.* 
				FROM item_orcamento item_orcamento 
				INNER JOIN orcamento orcamento ON item_orcamento.orcamento_id = orcamento.id_orcamento
				INNER JOIN item item ON item_orcamento.item_id = item.id_item 
				WHERE item_orcamento.data_lanc_item_orcamento LIKE '%$filtro%'
				   OR orcamento.descricao_orcamento LIKE '%$filtro%'
				   OR item.descricao_item LIKE '%$filtro%'
				   OR item_orcamento.quantidade_item_orcamento LIKE '%$filtro%'
				   OR item_orcamento.total_item_orcamento LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item_orcamento"]."{,}".
					$dados["data_lanc_item_orcamento"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["quantidade_item_orcamento"]."{,}".
					$dados["total_item_orcamento"]."{,}".
					$dados["bool_ativo_item_orcamento"];
		} else {
			echo    "[]".
					$dados["id_item_orcamento"]."{,}".
					$dados["data_lanc_item_orcamento"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["quantidade_item_orcamento"]."{,}".
					$dados["total_item_orcamento"]."{,}".
					$dados["bool_ativo_item_orcamento"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_item_orcamento_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT item_orcamento.* 
				FROM item_orcamento
				WHERE id_item_orcamento = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_item_orcamento"]."{,}".
					$dados["data_lanc_item_orcamento"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["quantidade_item_orcamento"]."{,}".
					$dados["total_item_orcamento"]."{,}".
					$dados["bool_ativo_item_orcamento"];
	}
}




if (!empty($_POST['pequisa_item_orcamento_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT item_orcamento.* 
				FROM item_orcamento item_orcamento 
				INNER JOIN orcamento orcamento ON item_orcamento.orcamento_id = orcamento.id_orcamento
				INNER JOIN item item ON item_orcamento.item_id = item.id_item
				WHERE $coluna = $id 
				AND (
					   item_orcamento.data_lanc_item_orcamento LIKE '%$filtro%'
					OR orcamento.descricao_orcamento LIKE '%$filtro%'
					OR item.descricao_item LIKE '%$filtro%'
					OR item_orcamento.quantidade_item_orcamento LIKE '%$filtro%'
					OR item_orcamento.total_item_orcamento LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item_orcamento"]."{,}".
					$dados["data_lanc_item_orcamento"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["quantidade_item_orcamento"]."{,}".
					$dados["total_item_orcamento"]."{,}".
					$dados["bool_ativo_item_orcamento"];
		} else {
			echo    "[]".
					$dados["id_item_orcamento"]."{,}".
					$dados["data_lanc_item_orcamento"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["quantidade_item_orcamento"]."{,}".
					$dados["total_item_orcamento"]."{,}".
					$dados["bool_ativo_item_orcamento"];
		}
		$cont++;
	}
}

?>
