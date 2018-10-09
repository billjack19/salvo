
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_destaque_itens'])) {
	$cont = 1;
	$sql = "	SELECT destaque_itens.* , item.* , configurar_site.* 
				FROM destaque_itens destaque_itens 
				INNER JOIN item item ON destaque_itens.item_id = item.id_item
				INNER JOIN configurar_site configurar_site ON destaque_itens.configurar_site_id = configurar_site.id_configurar_site
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque_itens"].",".
					$dados["descricao_destaque_itens"].",".
					$dados["item_id"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_itens"].",".
					$dados["bool_ativo_destaque_itens"].",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ .",".
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
					$dados["id_destaque_itens"].",".
					$dados["descricao_destaque_itens"].",".
					$dados["item_id"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_itens"].",".
					$dados["bool_ativo_destaque_itens"].",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ .",".
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

if (!empty($_POST['pequisa_destaque_itens_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT destaque_itens.* , item.* , configurar_site.* 
				FROM destaque_itens destaque_itens
				INNER JOIN item item ON destaque_itens.item_id = item.id_item
				INNER JOIN configurar_site configurar_site ON destaque_itens.configurar_site_id = configurar_site.id_configurar_site
				WHERE id_destaque_itens = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_destaque_itens"].",".
					$dados["descricao_destaque_itens"].",".
					$dados["item_id"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_itens"].",".
					$dados["bool_ativo_destaque_itens"].",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ .",".
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




if (!empty($_POST['pequisa_destaque_itens_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT destaque_itens.* , item.* , configurar_site.* 
				FROM destaque_itens destaque_itens 
				INNER JOIN item item ON destaque_itens.item_id = item.id_item
				INNER JOIN configurar_site configurar_site ON destaque_itens.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque_itens"].",".
					$dados["descricao_destaque_itens"].",".
					$dados["item_id"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_itens"].",".
					$dados["bool_ativo_destaque_itens"].",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ .",".
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
					$dados["id_destaque_itens"].",".
					$dados["descricao_destaque_itens"].",".
					$dados["item_id"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_destaque_itens"].",".
					$dados["bool_ativo_destaque_itens"].",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ .",".
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
