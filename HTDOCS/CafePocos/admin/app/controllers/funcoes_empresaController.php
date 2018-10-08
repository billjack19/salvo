
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_empresa'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT empresa.* 
				FROM empresa empresa  
				WHERE descricao_empresa LIKE '%$filtro%'
				OR imagem_logo_empresa LIKE '%$filtro%'
				OR data_atualizacao_empresa LIKE '%$filtro%'
				OR bool_ativo_empresa LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_empresa"]."{,}".
					$dados["descricao_empresa"]."{,}".
					$dados["imagem_logo_empresa"]."{,}".
					$dados["data_atualizacao_empresa"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_empresa"];
		} else {
			echo    "[]".
					$dados["id_empresa"]."{,}".
					$dados["descricao_empresa"]."{,}".
					$dados["imagem_logo_empresa"]."{,}".
					$dados["data_atualizacao_empresa"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_empresa"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_empresa_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT empresa.* 
				FROM empresa empresa
				WHERE id_empresa = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_empresa"]."{,}".
					$dados["descricao_empresa"]."{,}".
					$dados["imagem_logo_empresa"]."{,}".
					$dados["data_atualizacao_empresa"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_empresa"];
	}
}




if (!empty($_POST['pequisa_empresa_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT empresa.* 
				FROM empresa empresa 
				WHERE $coluna = $id 
				AND (
					   descricao_empresa LIKE '%$filtro%'
					OR imagem_logo_empresa LIKE '%$filtro%'
					OR data_atualizacao_empresa LIKE '%$filtro%'
					OR bool_ativo_empresa LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_empresa"]."{,}".
					$dados["descricao_empresa"]."{,}".
					$dados["imagem_logo_empresa"]."{,}".
					$dados["data_atualizacao_empresa"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_empresa"];
		} else {
			echo    "[]".
					$dados["id_empresa"]."{,}".
					$dados["descricao_empresa"]."{,}".
					$dados["imagem_logo_empresa"]."{,}".
					$dados["data_atualizacao_empresa"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_empresa"];
		}
		$cont++;
	}
}

?>
