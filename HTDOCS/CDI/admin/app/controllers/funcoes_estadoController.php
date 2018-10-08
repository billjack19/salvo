
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_estado'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT estado.* 
				FROM estado estado  
				WHERE descricao_estado LIKE '%$filtro%'
				OR sigla_estado LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_estado"]."{,}".
					$dados["descricao_estado"]."{,}".
					$dados["sigla_estado"]."{,}".
					$dados["bool_ativo_estado"];
		} else {
			echo    "[]".
					$dados["id_estado"]."{,}".
					$dados["descricao_estado"]."{,}".
					$dados["sigla_estado"]."{,}".
					$dados["bool_ativo_estado"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_estado_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT estado.* 
				FROM estado estado
				WHERE id_estado = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_estado"]."{,}".
					$dados["descricao_estado"]."{,}".
					$dados["sigla_estado"]."{,}".
					$dados["bool_ativo_estado"];
	}
}




if (!empty($_POST['pequisa_estado_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT estado.* 
				FROM estado estado 
				WHERE $coluna = $id 
				AND (
					   descricao_estado LIKE '%$filtro%'
					OR sigla_estado LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_estado"]."{,}".
					$dados["descricao_estado"]."{,}".
					$dados["sigla_estado"]."{,}".
					$dados["bool_ativo_estado"];
		} else {
			echo    "[]".
					$dados["id_estado"]."{,}".
					$dados["descricao_estado"]."{,}".
					$dados["sigla_estado"]."{,}".
					$dados["bool_ativo_estado"];
		}
		$cont++;
	}
}

?>
