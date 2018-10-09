
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_destaque_grupo'])) {
	$cont = 1;
	$sql = "	SELECT destaque_grupo.* , grupo.* , configurar_site.* 
				FROM destaque_grupo destaque_grupo 
				INNER JOIN grupo grupo ON destaque_grupo.grupo_id = grupo.id_grupo
				INNER JOIN configurar_site configurar_site ON destaque_grupo.configurar_site_id = configurar_site.id_configurar_site
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque_grupo"].",".
					$dados["titulo_destaque_grupo"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque_grupo"].",".
					$dados["descricao_destaque_grupo"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_grupo"].",".
					$dados["bool_ativo_destaque_grupo"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		} else {
			echo    "[]".
					$dados["id_destaque_grupo"].",".
					$dados["titulo_destaque_grupo"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque_grupo"].",".
					$dados["descricao_destaque_grupo"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_grupo"].",".
					$dados["bool_ativo_destaque_grupo"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_destaque_grupo_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT destaque_grupo.* , grupo.* , configurar_site.* 
				FROM destaque_grupo destaque_grupo
				INNER JOIN grupo grupo ON destaque_grupo.grupo_id = grupo.id_grupo
				INNER JOIN configurar_site configurar_site ON destaque_grupo.configurar_site_id = configurar_site.id_configurar_site
				WHERE id_destaque_grupo = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_destaque_grupo"].",".
					$dados["titulo_destaque_grupo"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque_grupo"].",".
					$dados["descricao_destaque_grupo"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_grupo"].",".
					$dados["bool_ativo_destaque_grupo"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
	}
}




if (!empty($_POST['pequisa_destaque_grupo_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT destaque_grupo.* , grupo.* , configurar_site.* 
				FROM destaque_grupo destaque_grupo 
				INNER JOIN grupo grupo ON destaque_grupo.grupo_id = grupo.id_grupo
				INNER JOIN configurar_site configurar_site ON destaque_grupo.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque_grupo"].",".
					$dados["titulo_destaque_grupo"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque_grupo"].",".
					$dados["descricao_destaque_grupo"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_grupo"].",".
					$dados["bool_ativo_destaque_grupo"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		} else {
			echo    "[]".
					$dados["id_destaque_grupo"].",".
					$dados["titulo_destaque_grupo"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque_grupo"].",".
					$dados["descricao_destaque_grupo"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_grupo"].",".
					$dados["bool_ativo_destaque_grupo"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		}
		$cont++;
	}
}

?>
