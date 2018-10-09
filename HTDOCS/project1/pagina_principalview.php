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
$pagina_principal_view = new pagina_principal_view();

// Run the page
$pagina_principal_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pagina_principal_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pagina_principal->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpagina_principalview = currentForm = new ew.Form("fpagina_principalview", "view");

// Form_CustomValidate event
fpagina_principalview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpagina_principalview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pagina_principal->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pagina_principal_view->ExportOptions->render("body") ?>
<?php
	foreach ($pagina_principal_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pagina_principal_view->showPageHeader(); ?>
<?php
$pagina_principal_view->showMessage();
?>
<form name="fpagina_principalview" id="fpagina_principalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pagina_principal_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pagina_principal_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pagina_principal">
<input type="hidden" name="modal" value="<?php echo (int)$pagina_principal_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($pagina_principal->id_pagina_principal->Visible) { // id_pagina_principal ?>
	<tr id="r_id_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_id_pagina_principal"><?php echo $pagina_principal->id_pagina_principal->caption() ?></span></td>
		<td data-name="id_pagina_principal"<?php echo $pagina_principal->id_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_id_pagina_principal">
<span<?php echo $pagina_principal->id_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->id_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->titulo_pagina_principal->Visible) { // titulo_pagina_principal ?>
	<tr id="r_titulo_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_titulo_pagina_principal"><?php echo $pagina_principal->titulo_pagina_principal->caption() ?></span></td>
		<td data-name="titulo_pagina_principal"<?php echo $pagina_principal->titulo_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_titulo_pagina_principal">
<span<?php echo $pagina_principal->titulo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->titulo_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->titulo_menu_pagina_principal->Visible) { // titulo_menu_pagina_principal ?>
	<tr id="r_titulo_menu_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_titulo_menu_pagina_principal"><?php echo $pagina_principal->titulo_menu_pagina_principal->caption() ?></span></td>
		<td data-name="titulo_menu_pagina_principal"<?php echo $pagina_principal->titulo_menu_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_titulo_menu_pagina_principal">
<span<?php echo $pagina_principal->titulo_menu_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->titulo_menu_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->cor_pagina_pagina_principal->Visible) { // cor_pagina_pagina_principal ?>
	<tr id="r_cor_pagina_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_cor_pagina_pagina_principal"><?php echo $pagina_principal->cor_pagina_pagina_principal->caption() ?></span></td>
		<td data-name="cor_pagina_pagina_principal"<?php echo $pagina_principal->cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_cor_pagina_pagina_principal">
<span<?php echo $pagina_principal->cor_pagina_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->cor_pagina_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->contra_cor_pagina_pagina_principal->Visible) { // contra_cor_pagina_pagina_principal ?>
	<tr id="r_contra_cor_pagina_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_contra_cor_pagina_pagina_principal"><?php echo $pagina_principal->contra_cor_pagina_pagina_principal->caption() ?></span></td>
		<td data-name="contra_cor_pagina_pagina_principal"<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_contra_cor_pagina_pagina_principal">
<span<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->imagem_icone_pagina_principal->Visible) { // imagem_icone_pagina_principal ?>
	<tr id="r_imagem_icone_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_imagem_icone_pagina_principal"><?php echo $pagina_principal->imagem_icone_pagina_principal->caption() ?></span></td>
		<td data-name="imagem_icone_pagina_principal"<?php echo $pagina_principal->imagem_icone_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_imagem_icone_pagina_principal">
<span<?php echo $pagina_principal->imagem_icone_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->imagem_icone_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->imagem_logo_pagina_principal->Visible) { // imagem_logo_pagina_principal ?>
	<tr id="r_imagem_logo_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_imagem_logo_pagina_principal"><?php echo $pagina_principal->imagem_logo_pagina_principal->caption() ?></span></td>
		<td data-name="imagem_logo_pagina_principal"<?php echo $pagina_principal->imagem_logo_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_imagem_logo_pagina_principal">
<span<?php echo $pagina_principal->imagem_logo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->imagem_logo_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->data_atualizacao_pagina_principal->Visible) { // data_atualizacao_pagina_principal ?>
	<tr id="r_data_atualizacao_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_data_atualizacao_pagina_principal"><?php echo $pagina_principal->data_atualizacao_pagina_principal->caption() ?></span></td>
		<td data-name="data_atualizacao_pagina_principal"<?php echo $pagina_principal->data_atualizacao_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_data_atualizacao_pagina_principal">
<span<?php echo $pagina_principal->data_atualizacao_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->data_atualizacao_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_usuario_id"><?php echo $pagina_principal->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $pagina_principal->usuario_id->cellAttributes() ?>>
<span id="el_pagina_principal_usuario_id">
<span<?php echo $pagina_principal->usuario_id->viewAttributes() ?>>
<?php echo $pagina_principal->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pagina_principal->bool_ativo_pagina_principal->Visible) { // bool_ativo_pagina_principal ?>
	<tr id="r_bool_ativo_pagina_principal">
		<td class="<?php echo $pagina_principal_view->TableLeftColumnClass ?>"><span id="elh_pagina_principal_bool_ativo_pagina_principal"><?php echo $pagina_principal->bool_ativo_pagina_principal->caption() ?></span></td>
		<td data-name="bool_ativo_pagina_principal"<?php echo $pagina_principal->bool_ativo_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_bool_ativo_pagina_principal">
<span<?php echo $pagina_principal->bool_ativo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->bool_ativo_pagina_principal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pagina_principal_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pagina_principal->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pagina_principal_view->terminate();
?>
