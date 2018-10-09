<?php
namespace PHPMaker2019\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$configurar_site_view = new configurar_site_view();

// Run the page
$configurar_site_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$configurar_site_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$configurar_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fconfigurar_siteview = currentForm = new ew.Form("fconfigurar_siteview", "view");

// Form_CustomValidate event
fconfigurar_siteview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fconfigurar_siteview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$configurar_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $configurar_site_view->ExportOptions->render("body") ?>
<?php
	foreach ($configurar_site_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $configurar_site_view->showPageHeader(); ?>
<?php
$configurar_site_view->showMessage();
?>
<form name="fconfigurar_siteview" id="fconfigurar_siteview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($configurar_site_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $configurar_site_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="configurar_site">
<input type="hidden" name="modal" value="<?php echo (int)$configurar_site_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($configurar_site->id_configurar_site->Visible) { // id_configurar_site ?>
	<tr id="r_id_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_id_configurar_site"><?php echo $configurar_site->id_configurar_site->caption() ?></span></td>
		<td data-name="id_configurar_site"<?php echo $configurar_site->id_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_id_configurar_site">
<span<?php echo $configurar_site->id_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->id_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->titulo_configurar_site->Visible) { // titulo_configurar_site ?>
	<tr id="r_titulo_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_titulo_configurar_site"><?php echo $configurar_site->titulo_configurar_site->caption() ?></span></td>
		<td data-name="titulo_configurar_site"<?php echo $configurar_site->titulo_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_titulo_configurar_site">
<span<?php echo $configurar_site->titulo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->titulo_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->titulo_menu_configurar_site->Visible) { // titulo_menu_configurar_site ?>
	<tr id="r_titulo_menu_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_titulo_menu_configurar_site"><?php echo $configurar_site->titulo_menu_configurar_site->caption() ?></span></td>
		<td data-name="titulo_menu_configurar_site"<?php echo $configurar_site->titulo_menu_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_titulo_menu_configurar_site">
<span<?php echo $configurar_site->titulo_menu_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->titulo_menu_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->cor_pagina_configurar_site->Visible) { // cor_pagina_configurar_site ?>
	<tr id="r_cor_pagina_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_cor_pagina_configurar_site"><?php echo $configurar_site->cor_pagina_configurar_site->caption() ?></span></td>
		<td data-name="cor_pagina_configurar_site"<?php echo $configurar_site->cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_cor_pagina_configurar_site">
<span<?php echo $configurar_site->cor_pagina_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->cor_pagina_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->contra_cor_pagina_configurar_site->Visible) { // contra_cor_pagina_configurar_site ?>
	<tr id="r_contra_cor_pagina_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_contra_cor_pagina_configurar_site"><?php echo $configurar_site->contra_cor_pagina_configurar_site->caption() ?></span></td>
		<td data-name="contra_cor_pagina_configurar_site"<?php echo $configurar_site->contra_cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_contra_cor_pagina_configurar_site">
<span<?php echo $configurar_site->contra_cor_pagina_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->contra_cor_pagina_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->imagem_icone_configurar_site->Visible) { // imagem_icone_configurar_site ?>
	<tr id="r_imagem_icone_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_imagem_icone_configurar_site"><?php echo $configurar_site->imagem_icone_configurar_site->caption() ?></span></td>
		<td data-name="imagem_icone_configurar_site"<?php echo $configurar_site->imagem_icone_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_imagem_icone_configurar_site">
<span<?php echo $configurar_site->imagem_icone_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->imagem_icone_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->imagem_logo_configurar_site->Visible) { // imagem_logo_configurar_site ?>
	<tr id="r_imagem_logo_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_imagem_logo_configurar_site"><?php echo $configurar_site->imagem_logo_configurar_site->caption() ?></span></td>
		<td data-name="imagem_logo_configurar_site"<?php echo $configurar_site->imagem_logo_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_imagem_logo_configurar_site">
<span<?php echo $configurar_site->imagem_logo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->imagem_logo_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->data_atualizacao_configurar_site->Visible) { // data_atualizacao_configurar_site ?>
	<tr id="r_data_atualizacao_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_data_atualizacao_configurar_site"><?php echo $configurar_site->data_atualizacao_configurar_site->caption() ?></span></td>
		<td data-name="data_atualizacao_configurar_site"<?php echo $configurar_site->data_atualizacao_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_data_atualizacao_configurar_site">
<span<?php echo $configurar_site->data_atualizacao_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->data_atualizacao_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_usuario_id"><?php echo $configurar_site->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $configurar_site->usuario_id->cellAttributes() ?>>
<span id="el_configurar_site_usuario_id">
<span<?php echo $configurar_site->usuario_id->viewAttributes() ?>>
<?php echo $configurar_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($configurar_site->bool_ativo_configurar_site->Visible) { // bool_ativo_configurar_site ?>
	<tr id="r_bool_ativo_configurar_site">
		<td class="<?php echo $configurar_site_view->TableLeftColumnClass ?>"><span id="elh_configurar_site_bool_ativo_configurar_site"><?php echo $configurar_site->bool_ativo_configurar_site->caption() ?></span></td>
		<td data-name="bool_ativo_configurar_site"<?php echo $configurar_site->bool_ativo_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_bool_ativo_configurar_site">
<span<?php echo $configurar_site->bool_ativo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->bool_ativo_configurar_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$configurar_site_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$configurar_site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$configurar_site_view->terminate();
?>
