
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_orcamento'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT orcamento.* 
				FROM orcamento orcamento  
				WHERE descricao_orcamento LIKE '%$filtro%'
				OR data_lanc_orcamento LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["cliente_site_id"]."{,}".
					$dados["data_lanc_orcamento"]."{,}".
					$dados["bool_ativo_orcamento"];
		} else {
			echo    "[]".
					$dados["id_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["cliente_site_id"]."{,}".
					$dados["data_lanc_orcamento"]."{,}".
					$dados["bool_ativo_orcamento"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_orcamento_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT orcamento.* 
				FROM orcamento orcamento
				WHERE id_orcamento = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["cliente_site_id"]."{,}".
					$dados["data_lanc_orcamento"]."{,}".
					$dados["bool_ativo_orcamento"];
	}
}




if (!empty($_POST['pequisa_orcamento_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT orcamento.* 
				FROM orcamento orcamento 
				WHERE $coluna = $id 
				AND (
					   descricao_orcamento LIKE '%$filtro%'
					OR data_lanc_orcamento LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["cliente_site_id"]."{,}".
					$dados["data_lanc_orcamento"]."{,}".
					$dados["bool_ativo_orcamento"];
		} else {
			echo    "[]".
					$dados["id_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["cliente_site_id"]."{,}".
					$dados["data_lanc_orcamento"]."{,}".
					$dados["bool_ativo_orcamento"];
		}
		$cont++;
	}
}

?>
