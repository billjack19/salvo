
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_quem_somos'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT quem_somos.* 
				FROM quem_somos quem_somos  
				WHERE quem_somos.titulo_quem_somos LIKE '%$filtro%'
				   OR quem_somos.descricao_quem_somos LIKE '%$filtro%'
				   OR quem_somos.data_atualizacao_quem_somos LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_quem_somos"]."{,}".
					$dados["titulo_quem_somos"]."{,}".
					$dados["descricao_quem_somos"]."{,}".
					$dados["data_atualizacao_quem_somos"]."{,}".
					$dados["bool_ativo_quem_somos"];
		} else {
			echo    "[]".
					$dados["id_quem_somos"]."{,}".
					$dados["titulo_quem_somos"]."{,}".
					$dados["descricao_quem_somos"]."{,}".
					$dados["data_atualizacao_quem_somos"]."{,}".
					$dados["bool_ativo_quem_somos"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_quem_somos_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT quem_somos.* 
				FROM quem_somos
				WHERE id_quem_somos = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_quem_somos"]."{,}".
					$dados["titulo_quem_somos"]."{,}".
					$dados["descricao_quem_somos"]."{,}".
					$dados["data_atualizacao_quem_somos"]."{,}".
					$dados["bool_ativo_quem_somos"];
	}
}




if (!empty($_POST['pequisa_quem_somos_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT quem_somos.* 
				FROM quem_somos quem_somos 
				WHERE $coluna = $id 
				AND (
					   quem_somos.titulo_quem_somos LIKE '%$filtro%'
					OR quem_somos.descricao_quem_somos LIKE '%$filtro%'
					OR quem_somos.data_atualizacao_quem_somos LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_quem_somos"]."{,}".
					$dados["titulo_quem_somos"]."{,}".
					$dados["descricao_quem_somos"]."{,}".
					$dados["data_atualizacao_quem_somos"]."{,}".
					$dados["bool_ativo_quem_somos"];
		} else {
			echo    "[]".
					$dados["id_quem_somos"]."{,}".
					$dados["titulo_quem_somos"]."{,}".
					$dados["descricao_quem_somos"]."{,}".
					$dados["data_atualizacao_quem_somos"]."{,}".
					$dados["bool_ativo_quem_somos"];
		}
		$cont++;
	}
}

?>
