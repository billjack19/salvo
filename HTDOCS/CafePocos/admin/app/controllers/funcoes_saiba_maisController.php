
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_saiba_mais'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT saiba_mais.* 
				FROM saiba_mais saiba_mais  
				WHERE descricao_saiba_mais LIKE '%$filtro%'
				OR data_atualizacao_saiba_mais LIKE '%$filtro%'
				OR bool_ativo_saiba_mais LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_saiba_mais"]."{,}".
					$dados["descricao_saiba_mais"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_saiba_mais"]."{,}".
					$dados["bool_ativo_saiba_mais"];
		} else {
			echo    "[]".
					$dados["id_saiba_mais"]."{,}".
					$dados["descricao_saiba_mais"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_saiba_mais"]."{,}".
					$dados["bool_ativo_saiba_mais"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_saiba_mais_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT saiba_mais.* 
				FROM saiba_mais saiba_mais
				WHERE id_saiba_mais = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_saiba_mais"]."{,}".
					$dados["descricao_saiba_mais"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_saiba_mais"]."{,}".
					$dados["bool_ativo_saiba_mais"];
	}
}




if (!empty($_POST['pequisa_saiba_mais_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT saiba_mais.* 
				FROM saiba_mais saiba_mais 
				WHERE $coluna = $id 
				AND (
					   descricao_saiba_mais LIKE '%$filtro%'
					OR data_atualizacao_saiba_mais LIKE '%$filtro%'
					OR bool_ativo_saiba_mais LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_saiba_mais"]."{,}".
					$dados["descricao_saiba_mais"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_saiba_mais"]."{,}".
					$dados["bool_ativo_saiba_mais"];
		} else {
			echo    "[]".
					$dados["id_saiba_mais"]."{,}".
					$dados["descricao_saiba_mais"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_saiba_mais"]."{,}".
					$dados["bool_ativo_saiba_mais"];
		}
		$cont++;
	}
}

?>
