
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_configurar_site'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT configurar_site.* 
				FROM configurar_site configurar_site  
				WHERE titulo_configurar_site LIKE '%$filtro%'
				OR titulo_menu_configurar_site LIKE '%$filtro%'
				OR cor_pagina_configurar_site LIKE '%$filtro%'
				OR contra_cor_pagina_configurar_site LIKE '%$filtro%'
				OR imagem_icone_configurar_site LIKE '%$filtro%'
				OR imagem_logo_configurar_site LIKE '%$filtro%'
				OR imagem_logo_sm_configurar_site LIKE '%$filtro%'
				OR bem_vindo_configurar_site LIKE '%$filtro%'
				OR data_atualizacao_configurar_site LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_configurar_site"]."{,}".
					$dados["titulo_configurar_site"]."{,}".
					$dados["titulo_menu_configurar_site"]."{,}".
					$dados["cor_pagina_configurar_site"]."{,}".
					$dados["contra_cor_pagina_configurar_site"]."{,}".
					$dados["imagem_icone_configurar_site"]."{,}".
					$dados["imagem_logo_configurar_site"]."{,}".
					$dados["imagem_logo_sm_configurar_site"]."{,}".
					$dados["bem_vindo_configurar_site"]."{,}".
					$dados["data_atualizacao_configurar_site"]."{,}".
					$dados["bool_ativo_configurar_site"];
		} else {
			echo    "[]".
					$dados["id_configurar_site"]."{,}".
					$dados["titulo_configurar_site"]."{,}".
					$dados["titulo_menu_configurar_site"]."{,}".
					$dados["cor_pagina_configurar_site"]."{,}".
					$dados["contra_cor_pagina_configurar_site"]."{,}".
					$dados["imagem_icone_configurar_site"]."{,}".
					$dados["imagem_logo_configurar_site"]."{,}".
					$dados["imagem_logo_sm_configurar_site"]."{,}".
					$dados["bem_vindo_configurar_site"]."{,}".
					$dados["data_atualizacao_configurar_site"]."{,}".
					$dados["bool_ativo_configurar_site"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_configurar_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT configurar_site.* 
				FROM configurar_site configurar_site
				WHERE id_configurar_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_configurar_site"]."{,}".
					$dados["titulo_configurar_site"]."{,}".
					$dados["titulo_menu_configurar_site"]."{,}".
					$dados["cor_pagina_configurar_site"]."{,}".
					$dados["contra_cor_pagina_configurar_site"]."{,}".
					$dados["imagem_icone_configurar_site"]."{,}".
					$dados["imagem_logo_configurar_site"]."{,}".
					$dados["imagem_logo_sm_configurar_site"]."{,}".
					$dados["bem_vindo_configurar_site"]."{,}".
					$dados["data_atualizacao_configurar_site"]."{,}".
					$dados["bool_ativo_configurar_site"];
	}
}




if (!empty($_POST['pequisa_configurar_site_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT configurar_site.* 
				FROM configurar_site configurar_site 
				WHERE $coluna = $id 
				AND (
					   titulo_configurar_site LIKE '%$filtro%'
					OR titulo_menu_configurar_site LIKE '%$filtro%'
					OR cor_pagina_configurar_site LIKE '%$filtro%'
					OR contra_cor_pagina_configurar_site LIKE '%$filtro%'
					OR imagem_icone_configurar_site LIKE '%$filtro%'
					OR imagem_logo_configurar_site LIKE '%$filtro%'
					OR imagem_logo_sm_configurar_site LIKE '%$filtro%'
					OR bem_vindo_configurar_site LIKE '%$filtro%'
					OR data_atualizacao_configurar_site LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_configurar_site"]."{,}".
					$dados["titulo_configurar_site"]."{,}".
					$dados["titulo_menu_configurar_site"]."{,}".
					$dados["cor_pagina_configurar_site"]."{,}".
					$dados["contra_cor_pagina_configurar_site"]."{,}".
					$dados["imagem_icone_configurar_site"]."{,}".
					$dados["imagem_logo_configurar_site"]."{,}".
					$dados["imagem_logo_sm_configurar_site"]."{,}".
					$dados["bem_vindo_configurar_site"]."{,}".
					$dados["data_atualizacao_configurar_site"]."{,}".
					$dados["bool_ativo_configurar_site"];
		} else {
			echo    "[]".
					$dados["id_configurar_site"]."{,}".
					$dados["titulo_configurar_site"]."{,}".
					$dados["titulo_menu_configurar_site"]."{,}".
					$dados["cor_pagina_configurar_site"]."{,}".
					$dados["contra_cor_pagina_configurar_site"]."{,}".
					$dados["imagem_icone_configurar_site"]."{,}".
					$dados["imagem_logo_configurar_site"]."{,}".
					$dados["imagem_logo_sm_configurar_site"]."{,}".
					$dados["bem_vindo_configurar_site"]."{,}".
					$dados["data_atualizacao_configurar_site"]."{,}".
					$dados["bool_ativo_configurar_site"];
		}
		$cont++;
	}
}

?>
