
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_topicos_loja'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT topicos_loja.* 
				FROM topicos_loja topicos_loja  
				WHERE titulo_topicos_loja LIKE '%$filtro%'
				OR descricao_topicos_loja LIKE '%$filtro%'
				OR data_atualizacao_topicos_loja LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_topicos_loja"]."{,}".
					$dados["titulo_topicos_loja"]."{,}".
					$dados["descricao_topicos_loja"]."{,}".
					$dados["loja_id"]."{,}".
					$dados["data_atualizacao_topicos_loja"]."{,}".
					$dados["bool_ativo_topicos_loja"];
		} else {
			echo    "[]".
					$dados["id_topicos_loja"]."{,}".
					$dados["titulo_topicos_loja"]."{,}".
					$dados["descricao_topicos_loja"]."{,}".
					$dados["loja_id"]."{,}".
					$dados["data_atualizacao_topicos_loja"]."{,}".
					$dados["bool_ativo_topicos_loja"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_topicos_loja_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT topicos_loja.* 
				FROM topicos_loja topicos_loja
				WHERE id_topicos_loja = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_topicos_loja"]."{,}".
					$dados["titulo_topicos_loja"]."{,}".
					$dados["descricao_topicos_loja"]."{,}".
					$dados["loja_id"]."{,}".
					$dados["data_atualizacao_topicos_loja"]."{,}".
					$dados["bool_ativo_topicos_loja"];
	}
}




if (!empty($_POST['pequisa_topicos_loja_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT topicos_loja.* 
				FROM topicos_loja topicos_loja 
				WHERE $coluna = $id 
				AND (
					   titulo_topicos_loja LIKE '%$filtro%'
					OR descricao_topicos_loja LIKE '%$filtro%'
					OR data_atualizacao_topicos_loja LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_topicos_loja"]."{,}".
					$dados["titulo_topicos_loja"]."{,}".
					$dados["descricao_topicos_loja"]."{,}".
					$dados["loja_id"]."{,}".
					$dados["data_atualizacao_topicos_loja"]."{,}".
					$dados["bool_ativo_topicos_loja"];
		} else {
			echo    "[]".
					$dados["id_topicos_loja"]."{,}".
					$dados["titulo_topicos_loja"]."{,}".
					$dados["descricao_topicos_loja"]."{,}".
					$dados["loja_id"]."{,}".
					$dados["data_atualizacao_topicos_loja"]."{,}".
					$dados["bool_ativo_topicos_loja"];
		}
		$cont++;
	}
}

?>
