
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_slide_show'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT slide_show.* 
				FROM slide_show slide_show  
				WHERE titulo_slide_show LIKE '%$filtro%'
				OR descricao_slide_show LIKE '%$filtro%'
				OR imagem_slide_show LIKE '%$filtro%'
				OR data_atualizacao_slide_show LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_slide_show"]."{,}".
					$dados["titulo_slide_show"]."{,}".
					$dados["descricao_slide_show"]."{,}".
					$dados["imagem_slide_show"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_slide_show"]."{,}".
					$dados["bool_ativo_slide_show"];
		} else {
			echo    "[]".
					$dados["id_slide_show"]."{,}".
					$dados["titulo_slide_show"]."{,}".
					$dados["descricao_slide_show"]."{,}".
					$dados["imagem_slide_show"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_slide_show"]."{,}".
					$dados["bool_ativo_slide_show"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_slide_show_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT slide_show.* 
				FROM slide_show slide_show
				WHERE id_slide_show = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_slide_show"]."{,}".
					$dados["titulo_slide_show"]."{,}".
					$dados["descricao_slide_show"]."{,}".
					$dados["imagem_slide_show"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_slide_show"]."{,}".
					$dados["bool_ativo_slide_show"];
	}
}




if (!empty($_POST['pequisa_slide_show_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT slide_show.* 
				FROM slide_show slide_show 
				WHERE $coluna = $id 
				AND (
					   titulo_slide_show LIKE '%$filtro%'
					OR descricao_slide_show LIKE '%$filtro%'
					OR imagem_slide_show LIKE '%$filtro%'
					OR data_atualizacao_slide_show LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_slide_show"]."{,}".
					$dados["titulo_slide_show"]."{,}".
					$dados["descricao_slide_show"]."{,}".
					$dados["imagem_slide_show"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_slide_show"]."{,}".
					$dados["bool_ativo_slide_show"];
		} else {
			echo    "[]".
					$dados["id_slide_show"]."{,}".
					$dados["titulo_slide_show"]."{,}".
					$dados["descricao_slide_show"]."{,}".
					$dados["imagem_slide_show"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_slide_show"]."{,}".
					$dados["bool_ativo_slide_show"];
		}
		$cont++;
	}
}

?>
