
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_teste'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT teste.* 
				FROM teste teste  
				WHERE descricao_teste LIKE '%$filtro%'
				OR data_atualizacao_teste LIKE '%$filtro%'
				OR bool_ativo_teste LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_teste"]."{,}".
					$dados["descricao_teste"]."{,}".
					$dados["data_atualizacao_teste"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste"];
		} else {
			echo    "[]".
					$dados["id_teste"]."{,}".
					$dados["descricao_teste"]."{,}".
					$dados["data_atualizacao_teste"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_teste_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT teste.* 
				FROM teste teste
				WHERE id_teste = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_teste"]."{,}".
					$dados["descricao_teste"]."{,}".
					$dados["data_atualizacao_teste"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste"];
	}
}




if (!empty($_POST['pequisa_teste_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT teste.* 
				FROM teste teste 
				WHERE $coluna = $id 
				AND (
					   descricao_teste LIKE '%$filtro%'
					OR data_atualizacao_teste LIKE '%$filtro%'
					OR bool_ativo_teste LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_teste"]."{,}".
					$dados["descricao_teste"]."{,}".
					$dados["data_atualizacao_teste"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste"];
		} else {
			echo    "[]".
					$dados["id_teste"]."{,}".
					$dados["descricao_teste"]."{,}".
					$dados["data_atualizacao_teste"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_teste"];
		}
		$cont++;
	}
}

?>
