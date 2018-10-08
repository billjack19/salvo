
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_destaque_grupo'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT destaque_grupo.* 
				FROM destaque_grupo destaque_grupo 
				INNER JOIN grupo grupo ON destaque_grupo.grupo_id = grupo.id_grupo
				INNER JOIN configurar_site configurar_site ON destaque_grupo.configurar_site_id = configurar_site.id_configurar_site 
				WHERE destaque_grupo.titulo_destaque_grupo LIKE '%$filtro%'
				   OR grupo.descricao_grupo LIKE '%$filtro%'
				   OR destaque_grupo.imagem_destaque_grupo LIKE '%$filtro%'
				   OR destaque_grupo.descricao_destaque_grupo LIKE '%$filtro%'
				   OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
				   OR destaque_grupo.data_atualizacao_destaque_grupo LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque_grupo"]."{,}".
					$dados["titulo_destaque_grupo"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["imagem_destaque_grupo"]."{,}".
					$dados["descricao_destaque_grupo"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_destaque_grupo"]."{,}".
					$dados["bool_ativo_destaque_grupo"];
		} else {
			echo    "[]".
					$dados["id_destaque_grupo"]."{,}".
					$dados["titulo_destaque_grupo"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["imagem_destaque_grupo"]."{,}".
					$dados["descricao_destaque_grupo"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_destaque_grupo"]."{,}".
					$dados["bool_ativo_destaque_grupo"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_destaque_grupo_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT destaque_grupo.* 
				FROM destaque_grupo
				WHERE id_destaque_grupo = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_destaque_grupo"]."{,}".
					$dados["titulo_destaque_grupo"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["imagem_destaque_grupo"]."{,}".
					$dados["descricao_destaque_grupo"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_destaque_grupo"]."{,}".
					$dados["bool_ativo_destaque_grupo"];
	}
}




if (!empty($_POST['pequisa_destaque_grupo_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT destaque_grupo.* 
				FROM destaque_grupo destaque_grupo 
				INNER JOIN grupo grupo ON destaque_grupo.grupo_id = grupo.id_grupo
				INNER JOIN configurar_site configurar_site ON destaque_grupo.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id 
				AND (
					   destaque_grupo.titulo_destaque_grupo LIKE '%$filtro%'
					OR grupo.descricao_grupo LIKE '%$filtro%'
					OR destaque_grupo.imagem_destaque_grupo LIKE '%$filtro%'
					OR destaque_grupo.descricao_destaque_grupo LIKE '%$filtro%'
					OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
					OR destaque_grupo.data_atualizacao_destaque_grupo LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque_grupo"]."{,}".
					$dados["titulo_destaque_grupo"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["imagem_destaque_grupo"]."{,}".
					$dados["descricao_destaque_grupo"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_destaque_grupo"]."{,}".
					$dados["bool_ativo_destaque_grupo"];
		} else {
			echo    "[]".
					$dados["id_destaque_grupo"]."{,}".
					$dados["titulo_destaque_grupo"]."{,}".
					$dados["grupo_id"]."{,}".
					$dados["imagem_destaque_grupo"]."{,}".
					$dados["descricao_destaque_grupo"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_destaque_grupo"]."{,}".
					$dados["bool_ativo_destaque_grupo"];
		}
		$cont++;
	}
}

?>
