<?php
namespace PHPMaker2019\project1;

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(1, "mi_adicional_site", $Language->MenuPhrase("1", "MenuText"), "adicional_sitelist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(2, "mi_area_nivel_acesso", $Language->MenuPhrase("2", "MenuText"), "area_nivel_acessolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(3, "mi_videos", $Language->MenuPhrase("3", "MenuText"), "videoslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(4, "mi_usuario", $Language->MenuPhrase("4", "MenuText"), "usuariolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(5, "mi_upload_arq", $Language->MenuPhrase("5", "MenuText"), "upload_arqlist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(6, "mi_topicos_loja", $Language->MenuPhrase("6", "MenuText"), "topicos_lojalist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(7, "mi_slide_show", $Language->MenuPhrase("7", "MenuText"), "slide_showlist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(8, "mi_situacao", $Language->MenuPhrase("8", "MenuText"), "situacaolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(9, "mi_site", $Language->MenuPhrase("9", "MenuText"), "sitelist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(10, "mi_saiba_mais", $Language->MenuPhrase("10", "MenuText"), "saiba_maislist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(11, "mi_relatorios", $Language->MenuPhrase("11", "MenuText"), "relatorioslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(12, "mi_relatorio_tabela", $Language->MenuPhrase("12", "MenuText"), "relatorio_tabelalist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(13, "mi_quem_somos", $Language->MenuPhrase("13", "MenuText"), "quem_somoslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(14, "mi_paginas", $Language->MenuPhrase("14", "MenuText"), "paginaslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(15, "mi_pagina_principal", $Language->MenuPhrase("15", "MenuText"), "pagina_principallist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(16, "mi_orcamento", $Language->MenuPhrase("16", "MenuText"), "orcamentolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(17, "mi_notificacoes_salvas", $Language->MenuPhrase("17", "MenuText"), "notificacoes_salvaslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(18, "mi_notificacoes_pendentes", $Language->MenuPhrase("18", "MenuText"), "notificacoes_pendenteslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(19, "mi_notificacoes_config", $Language->MenuPhrase("19", "MenuText"), "notificacoes_configlist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(20, "mi_notificacoes", $Language->MenuPhrase("20", "MenuText"), "notificacoeslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(21, "mi_nivel_acesso", $Language->MenuPhrase("21", "MenuText"), "nivel_acessolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(22, "mi_new_sjt", $Language->MenuPhrase("22", "MenuText"), "new_sjtlist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(23, "mi_loja", $Language->MenuPhrase("23", "MenuText"), "lojalist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(24, "mi_item_orcamento", $Language->MenuPhrase("24", "MenuText"), "item_orcamentolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(25, "mi_item", $Language->MenuPhrase("25", "MenuText"), "itemlist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(26, "mi_grupo", $Language->MenuPhrase("26", "MenuText"), "grupolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(27, "mi_fotos", $Language->MenuPhrase("27", "MenuText"), "fotoslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(28, "mi_estado", $Language->MenuPhrase("28", "MenuText"), "estadolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(29, "mi_endereco_site", $Language->MenuPhrase("29", "MenuText"), "endereco_sitelist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(30, "mi_empresa", $Language->MenuPhrase("30", "MenuText"), "empresalist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(31, "mi_contato", $Language->MenuPhrase("31", "MenuText"), "contatolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(32, "mi_destaque_grupo", $Language->MenuPhrase("32", "MenuText"), "destaque_grupolist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(33, "mi_configurar_site", $Language->MenuPhrase("33", "MenuText"), "configurar_sitelist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(34, "mi_cliente_site", $Language->MenuPhrase("34", "MenuText"), "cliente_sitelist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(35, "mi_cards", $Language->MenuPhrase("35", "MenuText"), "cardslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(36, "mi_audittrail", $Language->MenuPhrase("36", "MenuText"), "audittraillist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>
