
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_grupo'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT grupo.* 
				FROM grupo grupo  
				WHERE descricao_grupo LIKE '%$filtro%'
				OR data_atualizacao_grupo LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_grupo"]."{,}".
					$dados["descricao_grupo"]."{,}".
					$dados["data_atualizacao_grupo"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_grupo"];
		} else {
			echo    "[]".
					$dados["id_grupo"]."{,}".
					$dados["descricao_grupo"]."{,}".
					$dados["data_atualizacao_grupo"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_grupo"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_grupo_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT grupo.* 
				FROM grupo grupo
				WHERE id_grupo = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_grupo"]."{,}".
					$dados["descricao_grupo"]."{,}".
					$dados["data_atualizacao_grupo"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_grupo"];
	}
}




if (!empty($_POST['pequisa_grupo_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT grupo.* 
				FROM grupo grupo 
				WHERE $coluna = $id 
				AND (
					   descricao_grupo LIKE '%$filtro%'
					OR data_atualizacao_grupo LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_grupo"]."{,}".
					$dados["descricao_grupo"]."{,}".
					$dados["data_atualizacao_grupo"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_grupo"];
		} else {
			echo    "[]".
					$dados["id_grupo"]."{,}".
					$dados["descricao_grupo"]."{,}".
					$dados["data_atualizacao_grupo"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_grupo"];
		}
		$cont++;
	}
}

?>
