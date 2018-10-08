
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_item'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT item.* 
				FROM item item  
				WHERE descricao_item LIKE '%$filtro%'
				OR descricao_site_item LIKE '%$filtro%'
				OR unidade_medida_item LIKE '%$filtro%'
				OR imagem_item LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item"]."{,}".
					$dados["descricao_item"]."{,}".
					$dados["descricao_site_item"]."{,}".
					$dados["unidade_medida_item"]."{,}".
					$dados["imagem_item"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_item"];
		} else {
			echo    "[]".
					$dados["id_item"]."{,}".
					$dados["descricao_item"]."{,}".
					$dados["descricao_site_item"]."{,}".
					$dados["unidade_medida_item"]."{,}".
					$dados["imagem_item"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_item"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_item_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT item.* 
				FROM item item
				WHERE id_item = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_item"]."{,}".
					$dados["descricao_item"]."{,}".
					$dados["descricao_site_item"]."{,}".
					$dados["unidade_medida_item"]."{,}".
					$dados["imagem_item"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_item"];
	}
}




if (!empty($_POST['pequisa_item_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT item.* 
				FROM item item 
				WHERE $coluna = $id 
				AND (
					   descricao_item LIKE '%$filtro%'
					OR descricao_site_item LIKE '%$filtro%'
					OR unidade_medida_item LIKE '%$filtro%'
					OR imagem_item LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item"]."{,}".
					$dados["descricao_item"]."{,}".
					$dados["descricao_site_item"]."{,}".
					$dados["unidade_medida_item"]."{,}".
					$dados["imagem_item"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_item"];
		} else {
			echo    "[]".
					$dados["id_item"]."{,}".
					$dados["descricao_item"]."{,}".
					$dados["descricao_site_item"]."{,}".
					$dados["unidade_medida_item"]."{,}".
					$dados["imagem_item"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_item"];
		}
		$cont++;
	}
}

?>
