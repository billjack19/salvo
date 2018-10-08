
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_teste_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT teste_grade.* 
				FROM teste_grade teste_grade  
				WHERE descricao_teste_grade LIKE '%$filtro%'
				OR data_atualizacao_teste_grade LIKE '%$filtro%'
				OR bool_ativo_teste_grade LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_teste_grade"]."{,}".
					$dados["descricao_teste_grade"]."{,}".
					$dados["teste_id"]."{,}".
					$dados["data_atualizacao_teste_grade"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste_grade"];
		} else {
			echo    "[]".
					$dados["id_teste_grade"]."{,}".
					$dados["descricao_teste_grade"]."{,}".
					$dados["teste_id"]."{,}".
					$dados["data_atualizacao_teste_grade"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste_grade"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_teste_grade_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT teste_grade.* 
				FROM teste_grade teste_grade
				WHERE id_teste_grade = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_teste_grade"]."{,}".
					$dados["descricao_teste_grade"]."{,}".
					$dados["teste_id"]."{,}".
					$dados["data_atualizacao_teste_grade"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste_grade"];
	}
}




if (!empty($_POST['pequisa_teste_grade_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT teste_grade.* 
				FROM teste_grade teste_grade 
				WHERE $coluna = $id 
				AND (
					   descricao_teste_grade LIKE '%$filtro%'
					OR data_atualizacao_teste_grade LIKE '%$filtro%'
					OR bool_ativo_teste_grade LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_teste_grade"]."{,}".
					$dados["descricao_teste_grade"]."{,}".
					$dados["teste_id"]."{,}".
					$dados["data_atualizacao_teste_grade"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste_grade"];
		} else {
			echo    "[]".
					$dados["id_teste_grade"]."{,}".
					$dados["descricao_teste_grade"]."{,}".
					$dados["teste_id"]."{,}".
					$dados["data_atualizacao_teste_grade"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste_grade"];
		}
		$cont++;
	}
}

?>
