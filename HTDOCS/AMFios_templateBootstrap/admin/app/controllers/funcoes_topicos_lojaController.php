
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_topicos_loja'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT topicos_loja.* 
				FROM topicos_loja topicos_loja 
				INNER JOIN loja loja ON topicos_loja.loja_id = loja.id_loja 
				WHERE topicos_loja.titulo_topicos_loja LIKE '%$filtro%'
				   OR topicos_loja.descricao_topicos_loja LIKE '%$filtro%'
				   OR loja.titulo_loja LIKE '%$filtro%'
				   OR topicos_loja.data_atualizacao_topicos_loja LIKE '%$filtro%'
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
				FROM topicos_loja
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
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT topicos_loja.* 
				FROM topicos_loja topicos_loja 
				INNER JOIN loja loja ON topicos_loja.loja_id = loja.id_loja
				WHERE $coluna = $id 
				AND (
					   topicos_loja.titulo_topicos_loja LIKE '%$filtro%'
					OR topicos_loja.descricao_topicos_loja LIKE '%$filtro%'
					OR loja.titulo_loja LIKE '%$filtro%'
					OR topicos_loja.data_atualizacao_topicos_loja LIKE '%$filtro%'
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
