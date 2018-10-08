
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_item_orcamento'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT item_orcamento.* 
				FROM item_orcamento item_orcamento  
				WHERE data_lanc_item_orcamento LIKE '%$filtro%'
				OR quantidade_item_orcamento LIKE '%$filtro%'
				OR total_item_orcamento LIKE '%$filtro%'
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
				FROM item_orcamento item_orcamento
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
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT item_orcamento.* 
				FROM item_orcamento item_orcamento 
				WHERE $coluna = $id 
				AND (
					   data_lanc_item_orcamento LIKE '%$filtro%'
					OR quantidade_item_orcamento LIKE '%$filtro%'
					OR total_item_orcamento LIKE '%$filtro%'
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
