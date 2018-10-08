
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_loja'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT loja.* 
				FROM loja loja  
				WHERE titulo_loja LIKE '%$filtro%'
				OR descricao_loja LIKE '%$filtro%'
				OR imagem_loja LIKE '%$filtro%'
				OR data_atualizacao_loja LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_loja"]."{,}".
					$dados["titulo_loja"]."{,}".
					$dados["descricao_loja"]."{,}".
					$dados["imagem_loja"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_loja"]."{,}".
					$dados["bool_ativo_loja"];
		} else {
			echo    "[]".
					$dados["id_loja"]."{,}".
					$dados["titulo_loja"]."{,}".
					$dados["descricao_loja"]."{,}".
					$dados["imagem_loja"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_loja"]."{,}".
					$dados["bool_ativo_loja"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_loja_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT loja.* 
				FROM loja loja
				WHERE id_loja = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_loja"]."{,}".
					$dados["titulo_loja"]."{,}".
					$dados["descricao_loja"]."{,}".
					$dados["imagem_loja"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_loja"]."{,}".
					$dados["bool_ativo_loja"];
	}
}




if (!empty($_POST['pequisa_loja_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT loja.* 
				FROM loja loja 
				WHERE $coluna = $id 
				AND (
					   titulo_loja LIKE '%$filtro%'
					OR descricao_loja LIKE '%$filtro%'
					OR imagem_loja LIKE '%$filtro%'
					OR data_atualizacao_loja LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_loja"]."{,}".
					$dados["titulo_loja"]."{,}".
					$dados["descricao_loja"]."{,}".
					$dados["imagem_loja"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_loja"]."{,}".
					$dados["bool_ativo_loja"];
		} else {
			echo    "[]".
					$dados["id_loja"]."{,}".
					$dados["titulo_loja"]."{,}".
					$dados["descricao_loja"]."{,}".
					$dados["imagem_loja"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_loja"]."{,}".
					$dados["bool_ativo_loja"];
		}
		$cont++;
	}
}

?>
