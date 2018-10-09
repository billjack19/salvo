
<?php 
	require_once "../classe/entidade/Configurar_site.php";
	require_once "../classe/dao/configurar_siteDAO.php";

	$entidadeConfigurar_site = new Configurar_site();
	$configurar_siteDAO = new configurar_siteDAO();
	
	$entidadeConfigurar_site->set($_POST['titulo_configurar_site'], 'titulo_configurar_site');
	$entidadeConfigurar_site->set($_POST['cor_pagina_configurar_site'], 'cor_pagina_configurar_site');
	$entidadeConfigurar_site->set($_POST['contra_cor_pagina_configurar_site'], 'contra_cor_pagina_configurar_site');
	$entidadeConfigurar_site->set($_POST['imagem_icone_configurar_site'], 'imagem_icone_configurar_site');
	$entidadeConfigurar_site->set($_POST['imagem_logo_configurar_site'], 'imagem_logo_configurar_site');
	$entidadeConfigurar_site->set($_POST['data_atualizacao_configurar_site'], 'data_atualizacao_configurar_site');
	$entidadeConfigurar_site->set($_POST['bool_ativo_configurar_site'], 'bool_ativo_configurar_site');

	$retorno = $configurar_siteDAO->atualizaConfigurar_site($entidadeConfigurar_site, $_POST['id_configurar_site']);
	echo $retorno;
?>
