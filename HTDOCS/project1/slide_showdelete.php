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
$slide_show_delete = new slide_show_delete();

// Run the page
$slide_show_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$slide_show_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fslide_showdelete = currentForm = new ew.Form("fslide_showdelete", "delete");

// Form_CustomValidate event
fslide_showdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fslide_showdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $slide_show_delete->showPageHeader(); ?>
<?php
$slide_show_delete->showMessage();
?>
<form name="fslide_showdelete" id="fslide_showdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($slide_show_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $slide_show_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="slide_show">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($slide_show_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($slide_show->id_slide_show->Visible) { // id_slide_show ?>
		<th class="<?php echo $slide_show->id_slide_show->headerCellClass() ?>"><span id="elh_slide_show_id_slide_show" class="slide_show_id_slide_show"><?php echo $slide_show->id_slide_show->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->titulo_slide_show->Visible) { // titulo_slide_show ?>
		<th class="<?php echo $slide_show->titulo_slide_show->headerCellClass() ?>"><span id="elh_slide_show_titulo_slide_show" class="slide_show_titulo_slide_show"><?php echo $slide_show->titulo_slide_show->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->descricao_slide_show->Visible) { // descricao_slide_show ?>
		<th class="<?php echo $slide_show->descricao_slide_show->headerCellClass() ?>"><span id="elh_slide_show_descricao_slide_show" class="slide_show_descricao_slide_show"><?php echo $slide_show->descricao_slide_show->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->imagem_slide_show->Visible) { // imagem_slide_show ?>
		<th class="<?php echo $slide_show->imagem_slide_show->headerCellClass() ?>"><span id="elh_slide_show_imagem_slide_show" class="slide_show_imagem_slide_show"><?php echo $slide_show->imagem_slide_show->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->item_id->Visible) { // item_id ?>
		<th class="<?php echo $slide_show->item_id->headerCellClass() ?>"><span id="elh_slide_show_item_id" class="slide_show_item_id"><?php echo $slide_show->item_id->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<th class="<?php echo $slide_show->pagina_principal_id->headerCellClass() ?>"><span id="elh_slide_show_pagina_principal_id" class="slide_show_pagina_principal_id"><?php echo $slide_show->pagina_principal_id->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->data_atualizacao_slide_show->Visible) { // data_atualizacao_slide_show ?>
		<th class="<?php echo $slide_show->data_atualizacao_slide_show->headerCellClass() ?>"><span id="elh_slide_show_data_atualizacao_slide_show" class="slide_show_data_atualizacao_slide_show"><?php echo $slide_show->data_atualizacao_slide_show->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $slide_show->usuario_id->headerCellClass() ?>"><span id="elh_slide_show_usuario_id" class="slide_show_usuario_id"><?php echo $slide_show->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($slide_show->bool_ativo_slide_show->Visible) { // bool_ativo_slide_show ?>
		<th class="<?php echo $slide_show->bool_ativo_slide_show->headerCellClass() ?>"><span id="elh_slide_show_bool_ativo_slide_show" class="slide_show_bool_ativo_slide_show"><?php echo $slide_show->bool_ativo_slide_show->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$slide_show_delete->RecCnt = 0;
$i = 0;
while (!$slide_show_delete->Recordset->EOF) {
	$slide_show_delete->RecCnt++;
	$slide_show_delete->RowCnt++;

	// Set row properties
	$slide_show->resetAttributes();
	$slide_show->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$slide_show_delete->loadRowValues($slide_show_delete->Recordset);

	// Render row
	$slide_show_delete->renderRow();
?>
	<tr<?php echo $slide_show->rowAttributes() ?>>
<?php if ($slide_show->id_slide_show->Visible) { // id_slide_show ?>
		<td<?php echo $slide_show->id_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_id_slide_show" class="slide_show_id_slide_show">
<span<?php echo $slide_show->id_slide_show->viewAttributes() ?>>
<?php echo $slide_show->id_slide_show->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->titulo_slide_show->Visible) { // titulo_slide_show ?>
		<td<?php echo $slide_show->titulo_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_titulo_slide_show" class="slide_show_titulo_slide_show">
<span<?php echo $slide_show->titulo_slide_show->viewAttributes() ?>>
<?php echo $slide_show->titulo_slide_show->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->descricao_slide_show->Visible) { // descricao_slide_show ?>
		<td<?php echo $slide_show->descricao_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_descricao_slide_show" class="slide_show_descricao_slide_show">
<span<?php echo $slide_show->descricao_slide_show->viewAttributes() ?>>
<?php echo $slide_show->descricao_slide_show->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->imagem_slide_show->Visible) { // imagem_slide_show ?>
		<td<?php echo $slide_show->imagem_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_imagem_slide_show" class="slide_show_imagem_slide_show">
<span<?php echo $slide_show->imagem_slide_show->viewAttributes() ?>>
<?php echo $slide_show->imagem_slide_show->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->item_id->Visible) { // item_id ?>
		<td<?php echo $slide_show->item_id->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_item_id" class="slide_show_item_id">
<span<?php echo $slide_show->item_id->viewAttributes() ?>>
<?php echo $slide_show->item_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td<?php echo $slide_show->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_pagina_principal_id" class="slide_show_pagina_principal_id">
<span<?php echo $slide_show->pagina_principal_id->viewAttributes() ?>>
<?php echo $slide_show->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->data_atualizacao_slide_show->Visible) { // data_atualizacao_slide_show ?>
		<td<?php echo $slide_show->data_atualizacao_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_data_atualizacao_slide_show" class="slide_show_data_atualizacao_slide_show">
<span<?php echo $slide_show->data_atualizacao_slide_show->viewAttributes() ?>>
<?php echo $slide_show->data_atualizacao_slide_show->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $slide_show->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_usuario_id" class="slide_show_usuario_id">
<span<?php echo $slide_show->usuario_id->viewAttributes() ?>>
<?php echo $slide_show->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($slide_show->bool_ativo_slide_show->Visible) { // bool_ativo_slide_show ?>
		<td<?php echo $slide_show->bool_ativo_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_delete->RowCnt ?>_slide_show_bool_ativo_slide_show" class="slide_show_bool_ativo_slide_show">
<span<?php echo $slide_show->bool_ativo_slide_show->viewAttributes() ?>>
<?php echo $slide_show->bool_ativo_slide_show->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$slide_show_delete->Recordset->moveNext();
}
$slide_show_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $slide_show_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$slide_show_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$slide_show_delete->terminate();
?>
