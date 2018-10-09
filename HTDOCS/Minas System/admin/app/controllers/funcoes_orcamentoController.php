
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_orcamento'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT orcamento.* 
				FROM orcamento orcamento 
				INNER JOIN cliente_site cliente_site ON orcamento.cliente_site_id = cliente_site.id_cliente_site 
				WHERE orcamento.descricao_orcamento LIKE '%$filtro%'
				   OR cliente_site.nome_cliente_site LIKE '%$filtro%'
				   OR orcamento.data_lanc_orcamento LIKE '%$filtro%'
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
				FROM orcamento
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
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT orcamento.* 
				FROM orcamento orcamento 
				INNER JOIN cliente_site cliente_site ON orcamento.cliente_site_id = cliente_site.id_cliente_site
				WHERE $coluna = $id 
				AND (
					   orcamento.descricao_orcamento LIKE '%$filtro%'
					OR cliente_site.nome_cliente_site LIKE '%$filtro%'
					OR orcamento.data_lanc_orcamento LIKE '%$filtro%'
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
