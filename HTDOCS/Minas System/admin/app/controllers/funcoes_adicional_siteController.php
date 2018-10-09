
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_adicional_site'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT adicional_site.* 
				FROM adicional_site adicional_site 
				INNER JOIN saiba_mais saiba_mais ON adicional_site.saiba_mais_id = saiba_mais.id_saiba_mais
				INNER JOIN usuario usuario ON adicional_site.usuario_id = usuario.id_usuario 
				WHERE adicional_site.titulo_adicional_site LIKE '%$filtro%'
				   OR adicional_site.descricao_adicional_site LIKE '%$filtro%'
				   OR adicional_site.imagem_adicional_site LIKE '%$filtro%'
				   OR saiba_mais.descricao_saiba_mais LIKE '%$filtro%'
				   OR usuario.nome_usuario LIKE '%$filtro%'
				   OR adicional_site.data_atualizacao_adicional_site LIKE '%$filtro%'
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
				FROM adicional_site
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
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT adicional_site.* 
				FROM adicional_site adicional_site 
				INNER JOIN saiba_mais saiba_mais ON adicional_site.saiba_mais_id = saiba_mais.id_saiba_mais
				INNER JOIN usuario usuario ON adicional_site.usuario_id = usuario.id_usuario
				WHERE $coluna = $id 
				AND (
					   adicional_site.titulo_adicional_site LIKE '%$filtro%'
					OR adicional_site.descricao_adicional_site LIKE '%$filtro%'
					OR adicional_site.imagem_adicional_site LIKE '%$filtro%'
					OR saiba_mais.descricao_saiba_mais LIKE '%$filtro%'
					OR usuario.nome_usuario LIKE '%$filtro%'
					OR adicional_site.data_atualizacao_adicional_site LIKE '%$filtro%'
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
