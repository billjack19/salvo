
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cards'])) {
	$cont = 1;
	$sql = "	SELECT cards.* , configurar_site.* 
				FROM cards cards 
				INNER JOIN configurar_site configurar_site ON cards.configurar_site_id = configurar_site.id_configurar_site
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cards"].",".
					$dados["titulo_cards"].",".
					$dados["descricao_cards"].",".
					$dados["imagem_cards"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_cards"].",".
					$dados["bool_ativo_cards"].",".
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
					$dados["id_cards"].",".
					$dados["titulo_cards"].",".
					$dados["descricao_cards"].",".
					$dados["imagem_cards"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_cards"].",".
					$dados["bool_ativo_cards"].",".
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

if (!empty($_POST['pequisa_cards_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT cards.* , configurar_site.* 
				FROM cards cards
				INNER JOIN configurar_site configurar_site ON cards.configurar_site_id = configurar_site.id_configurar_site
				WHERE id_cards = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_cards"].",".
					$dados["titulo_cards"].",".
					$dados["descricao_cards"].",".
					$dados["imagem_cards"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_cards"].",".
					$dados["bool_ativo_cards"].",".
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




if (!empty($_POST['pequisa_cards_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT cards.* , configurar_site.* 
				FROM cards cards 
				INNER JOIN configurar_site configurar_site ON cards.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cards"].",".
					$dados["titulo_cards"].",".
					$dados["descricao_cards"].",".
					$dados["imagem_cards"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_cards"].",".
					$dados["bool_ativo_cards"].",".
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
					$dados["id_cards"].",".
					$dados["titulo_cards"].",".
					$dados["descricao_cards"].",".
					$dados["imagem_cards"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_cards"].",".
					$dados["bool_ativo_cards"].",".
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
