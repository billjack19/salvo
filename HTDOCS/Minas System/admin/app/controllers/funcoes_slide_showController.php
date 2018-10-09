
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_slide_show'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT slide_show.* 
				FROM slide_show slide_show 
				INNER JOIN configurar_site configurar_site ON slide_show.configurar_site_id = configurar_site.id_configurar_site 
				WHERE slide_show.titulo_slide_show LIKE '%$filtro%'
				   OR slide_show.descricao_slide_show LIKE '%$filtro%'
				   OR slide_show.imagem_slide_show LIKE '%$filtro%'
				   OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
				   OR slide_show.data_atualizacao_slide_show LIKE '%$filtro%'
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
				FROM slide_show
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
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT slide_show.* 
				FROM slide_show slide_show 
				INNER JOIN configurar_site configurar_site ON slide_show.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id 
				AND (
					   slide_show.titulo_slide_show LIKE '%$filtro%'
					OR slide_show.descricao_slide_show LIKE '%$filtro%'
					OR slide_show.imagem_slide_show LIKE '%$filtro%'
					OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
					OR slide_show.data_atualizacao_slide_show LIKE '%$filtro%'
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
