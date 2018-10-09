
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_loja'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT loja.* 
				FROM loja loja 
				INNER JOIN configurar_site configurar_site ON loja.configurar_site_id = configurar_site.id_configurar_site 
				WHERE loja.titulo_loja LIKE '%$filtro%'
				   OR loja.descricao_loja LIKE '%$filtro%'
				   OR loja.imagem_loja LIKE '%$filtro%'
				   OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
				   OR loja.data_atualizacao_loja LIKE '%$filtro%'
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
				FROM loja
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
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT loja.* 
				FROM loja loja 
				INNER JOIN configurar_site configurar_site ON loja.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id 
				AND (
					   loja.titulo_loja LIKE '%$filtro%'
					OR loja.descricao_loja LIKE '%$filtro%'
					OR loja.imagem_loja LIKE '%$filtro%'
					OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
					OR loja.data_atualizacao_loja LIKE '%$filtro%'
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
