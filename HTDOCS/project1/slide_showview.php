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
$slide_show_view = new slide_show_view();

// Run the page
$slide_show_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$slide_show_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$slide_show->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fslide_showview = currentForm = new ew.Form("fslide_showview", "view");

// Form_CustomValidate event
fslide_showview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fslide_showview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$slide_show->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $slide_show_view->ExportOptions->render("body") ?>
<?php
	foreach ($slide_show_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $slide_show_view->showPageHeader(); ?>
<?php
$slide_show_view->showMessage();
?>
<form name="fslide_showview" id="fslide_showview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($slide_show_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $slide_show_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="slide_show">
<input type="hidden" name="modal" value="<?php echo (int)$slide_show_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($slide_show->id_slide_show->Visible) { // id_slide_show ?>
	<tr id="r_id_slide_show">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_id_slide_show"><?php echo $slide_show->id_slide_show->caption() ?></span></td>
		<td data-name="id_slide_show"<?php echo $slide_show->id_slide_show->cellAttributes() ?>>
<span id="el_slide_show_id_slide_show">
<span<?php echo $slide_show->id_slide_show->viewAttributes() ?>>
<?php echo $slide_show->id_slide_show->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->titulo_slide_show->Visible) { // titulo_slide_show ?>
	<tr id="r_titulo_slide_show">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_titulo_slide_show"><?php echo $slide_show->titulo_slide_show->caption() ?></span></td>
		<td data-name="titulo_slide_show"<?php echo $slide_show->titulo_slide_show->cellAttributes() ?>>
<span id="el_slide_show_titulo_slide_show">
<span<?php echo $slide_show->titulo_slide_show->viewAttributes() ?>>
<?php echo $slide_show->titulo_slide_show->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->descricao_slide_show->Visible) { // descricao_slide_show ?>
	<tr id="r_descricao_slide_show">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_descricao_slide_show"><?php echo $slide_show->descricao_slide_show->caption() ?></span></td>
		<td data-name="descricao_slide_show"<?php echo $slide_show->descricao_slide_show->cellAttributes() ?>>
<span id="el_slide_show_descricao_slide_show">
<span<?php echo $slide_show->descricao_slide_show->viewAttributes() ?>>
<?php echo $slide_show->descricao_slide_show->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->imagem_slide_show->Visible) { // imagem_slide_show ?>
	<tr id="r_imagem_slide_show">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_imagem_slide_show"><?php echo $slide_show->imagem_slide_show->caption() ?></span></td>
		<td data-name="imagem_slide_show"<?php echo $slide_show->imagem_slide_show->cellAttributes() ?>>
<span id="el_slide_show_imagem_slide_show">
<span<?php echo $slide_show->imagem_slide_show->viewAttributes() ?>>
<?php echo $slide_show->imagem_slide_show->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->item_id->Visible) { // item_id ?>
	<tr id="r_item_id">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_item_id"><?php echo $slide_show->item_id->caption() ?></span></td>
		<td data-name="item_id"<?php echo $slide_show->item_id->cellAttributes() ?>>
<span id="el_slide_show_item_id">
<span<?php echo $slide_show->item_id->viewAttributes() ?>>
<?php echo $slide_show->item_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<tr id="r_pagina_principal_id">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_pagina_principal_id"><?php echo $slide_show->pagina_principal_id->caption() ?></span></td>
		<td data-name="pagina_principal_id"<?php echo $slide_show->pagina_principal_id->cellAttributes() ?>>
<span id="el_slide_show_pagina_principal_id">
<span<?php echo $slide_show->pagina_principal_id->viewAttributes() ?>>
<?php echo $slide_show->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->data_atualizacao_slide_show->Visible) { // data_atualizacao_slide_show ?>
	<tr id="r_data_atualizacao_slide_show">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_data_atualizacao_slide_show"><?php echo $slide_show->data_atualizacao_slide_show->caption() ?></span></td>
		<td data-name="data_atualizacao_slide_show"<?php echo $slide_show->data_atualizacao_slide_show->cellAttributes() ?>>
<span id="el_slide_show_data_atualizacao_slide_show">
<span<?php echo $slide_show->data_atualizacao_slide_show->viewAttributes() ?>>
<?php echo $slide_show->data_atualizacao_slide_show->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_usuario_id"><?php echo $slide_show->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $slide_show->usuario_id->cellAttributes() ?>>
<span id="el_slide_show_usuario_id">
<span<?php echo $slide_show->usuario_id->viewAttributes() ?>>
<?php echo $slide_show->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($slide_show->bool_ativo_slide_show->Visible) { // bool_ativo_slide_show ?>
	<tr id="r_bool_ativo_slide_show">
		<td class="<?php echo $slide_show_view->TableLeftColumnClass ?>"><span id="elh_slide_show_bool_ativo_slide_show"><?php echo $slide_show->bool_ativo_slide_show->caption() ?></span></td>
		<td data-name="bool_ativo_slide_show"<?php echo $slide_show->bool_ativo_slide_show->cellAttributes() ?>>
<span id="el_slide_show_bool_ativo_slide_show">
<span<?php echo $slide_show->bool_ativo_slide_show->viewAttributes() ?>>
<?php echo $slide_show->bool_ativo_slide_show->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$slide_show_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$slide_show->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$slide_show_view->terminate();
?>
