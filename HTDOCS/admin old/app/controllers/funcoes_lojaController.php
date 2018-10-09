
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_loja'])) {
	$cont = 1;
	$sql = "	SELECT loja.* , configurar_site.* 
				FROM loja loja 
				INNER JOIN configurar_site configurar_site ON loja.configurar_site_id = configurar_site.id_configurar_site
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_loja"].",".
					$dados["titulo_loja"].",".
					$dados["descricao_loja"].",".
					$dados["imagem_loja"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_loja"].",".
					$dados["bool_ativo_loja"].",".
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
					$dados["id_loja"].",".
					$dados["titulo_loja"].",".
					$dados["descricao_loja"].",".
					$dados["imagem_loja"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_loja"].",".
					$dados["bool_ativo_loja"].",".
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

if (!empty($_POST['pequisa_loja_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT loja.* , configurar_site.* 
				FROM loja loja
				INNER JOIN configurar_site configurar_site ON loja.configurar_site_id = configurar_site.id_configurar_site
				WHERE id_loja = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_loja"].",".
					$dados["titulo_loja"].",".
					$dados["descricao_loja"].",".
					$dados["imagem_loja"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_loja"].",".
					$dados["bool_ativo_loja"].",".
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




if (!empty($_POST['pequisa_loja_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT loja.* , configurar_site.* 
				FROM loja loja 
				INNER JOIN configurar_site configurar_site ON loja.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_loja"].",".
					$dados["titulo_loja"].",".
					$dados["descricao_loja"].",".
					$dados["imagem_loja"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_loja"].",".
					$dados["bool_ativo_loja"].",".
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
					$dados["id_loja"].",".
					$dados["titulo_loja"].",".
					$dados["descricao_loja"].",".
					$dados["imagem_loja"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_loja"].",".
					$dados["bool_ativo_loja"].",".
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
