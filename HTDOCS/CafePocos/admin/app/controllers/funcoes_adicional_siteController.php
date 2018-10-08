
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_adicional_site'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT adicional_site.* 
				FROM adicional_site adicional_site  
				WHERE titulo_adicional_site LIKE '%$filtro%'
				OR descricao_adicional_site LIKE '%$filtro%'
				OR imagem_adicional_site LIKE '%$filtro%'
				OR data_atualizacao_adicional_site LIKE '%$filtro%'
				OR bool_ativo_adicional_site LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_adicional_site"]."{,}".
					$dados["titulo_adicional_site"]."{,}".
					$dados["descricao_adicional_site"]."{,}".
					$dados["imagem_adicional_site"]."{,}".
					$dados["saiba_mais_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_adicional_site"]."{,}".
					$dados["bool_ativo_adicional_site"];
		} else {
			echo    "[]".
					$dados["id_adicional_site"]."{,}".
					$dados["titulo_adicional_site"]."{,}".
					$dados["descricao_adicional_site"]."{,}".
					$dados["imagem_adicional_site"]."{,}".
					$dados["saiba_mais_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_adicional_site"]."{,}".
					$dados["bool_ativo_adicional_site"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_adicional_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT adicional_site.* 
				FROM adicional_site adicional_site
				WHERE id_adicional_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_adicional_site"]."{,}".
					$dados["titulo_adicional_site"]."{,}".
					$dados["descricao_adicional_site"]."{,}".
					$dados["imagem_adicional_site"]."{,}".
					$dados["saiba_mais_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_adicional_site"]."{,}".
					$dados["bool_ativo_adicional_site"];
	}
}




if (!empty($_POST['pequisa_adicional_site_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT adicional_site.* 
				FROM adicional_site adicional_site 
				WHERE $coluna = $id 
				AND (
					   titulo_adicional_site LIKE '%$filtro%'
					OR descricao_adicional_site LIKE '%$filtro%'
					OR imagem_adicional_site LIKE '%$filtro%'
					OR data_atualizacao_adicional_site LIKE '%$filtro%'
					OR bool_ativo_adicional_site LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_adicional_site"]."{,}".
					$dados["titulo_adicional_site"]."{,}".
					$dados["descricao_adicional_site"]."{,}".
					$dados["imagem_adicional_site"]."{,}".
					$dados["saiba_mais_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_adicional_site"]."{,}".
					$dados["bool_ativo_adicional_site"];
		} else {
			echo    "[]".
					$dados["id_adicional_site"]."{,}".
					$dados["titulo_adicional_site"]."{,}".
					$dados["descricao_adicional_site"]."{,}".
					$dados["imagem_adicional_site"]."{,}".
					$dados["saiba_mais_id"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_adicional_site"]."{,}".
					$dados["bool_ativo_adicional_site"];
		}
		$cont++;
	}
}

?>
