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
$paginas_delete = new paginas_delete();

// Run the page
$paginas_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$paginas_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpaginasdelete = currentForm = new ew.Form("fpaginasdelete", "delete");

// Form_CustomValidate event
fpaginasdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpaginasdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $paginas_delete->showPageHeader(); ?>
<?php
$paginas_delete->showMessage();
?>
<form name="fpaginasdelete" id="fpaginasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($paginas_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $paginas_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="paginas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($paginas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($paginas->id_paginas->Visible) { // id_paginas ?>
		<th class="<?php echo $paginas->id_paginas->headerCellClass() ?>"><span id="elh_paginas_id_paginas" class="paginas_id_paginas"><?php echo $paginas->id_paginas->caption() ?></span></th>
<?php } ?>
<?php if ($paginas->numero_da_pagina_paginas->Visible) { // numero_da_pagina_paginas ?>
		<th class="<?php echo $paginas->numero_da_pagina_paginas->headerCellClass() ?>"><span id="elh_paginas_numero_da_pagina_paginas" class="paginas_numero_da_pagina_paginas"><?php echo $paginas->numero_da_pagina_paginas->caption() ?></span></th>
<?php } ?>
<?php if ($paginas->imagem_paginas->Visible) { // imagem_paginas ?>
		<th class="<?php echo $paginas->imagem_paginas->headerCellClass() ?>"><span id="elh_paginas_imagem_paginas" class="paginas_imagem_paginas"><?php echo $paginas->imagem_paginas->caption() ?></span></th>
<?php } ?>
<?php if ($paginas->imagem_miniatura_paginas->Visible) { // imagem_miniatura_paginas ?>
		<th class="<?php echo $paginas->imagem_miniatura_paginas->headerCellClass() ?>"><span id="elh_paginas_imagem_miniatura_paginas" class="paginas_imagem_miniatura_paginas"><?php echo $paginas->imagem_miniatura_paginas->caption() ?></span></th>
<?php } ?>
<?php if ($paginas->new_sjt_id->Visible) { // new_sjt_id ?>
		<th class="<?php echo $paginas->new_sjt_id->headerCellClass() ?>"><span id="elh_paginas_new_sjt_id" class="paginas_new_sjt_id"><?php echo $paginas->new_sjt_id->caption() ?></span></th>
<?php } ?>
<?php if ($paginas->data_atualizacao_paginas->Visible) { // data_atualizacao_paginas ?>
		<th class="<?php echo $paginas->data_atualizacao_paginas->headerCellClass() ?>"><span id="elh_paginas_data_atualizacao_paginas" class="paginas_data_atualizacao_paginas"><?php echo $paginas->data_atualizacao_paginas->caption() ?></span></th>
<?php } ?>
<?php if ($paginas->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $paginas->usuario_id->headerCellClass() ?>"><span id="elh_paginas_usuario_id" class="paginas_usuario_id"><?php echo $paginas->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($paginas->bool_ativo_paginas->Visible) { // bool_ativo_paginas ?>
		<th class="<?php echo $paginas->bool_ativo_paginas->headerCellClass() ?>"><span id="elh_paginas_bool_ativo_paginas" class="paginas_bool_ativo_paginas"><?php echo $paginas->bool_ativo_paginas->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$paginas_delete->RecCnt = 0;
$i = 0;
while (!$paginas_delete->Recordset->EOF) {
	$paginas_delete->RecCnt++;
	$paginas_delete->RowCnt++;

	// Set row properties
	$paginas->resetAttributes();
	$paginas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$paginas_delete->loadRowValues($paginas_delete->Recordset);

	// Render row
	$paginas_delete->renderRow();
?>
	<tr<?php echo $paginas->rowAttributes() ?>>
<?php if ($paginas->id_paginas->Visible) { // id_paginas ?>
		<td<?php echo $paginas->id_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_id_paginas" class="paginas_id_paginas">
<span<?php echo $paginas->id_paginas->viewAttributes() ?>>
<?php echo $paginas->id_paginas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($paginas->numero_da_pagina_paginas->Visible) { // numero_da_pagina_paginas ?>
		<td<?php echo $paginas->numero_da_pagina_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_numero_da_pagina_paginas" class="paginas_numero_da_pagina_paginas">
<span<?php echo $paginas->numero_da_pagina_paginas->viewAttributes() ?>>
<?php echo $paginas->numero_da_pagina_paginas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($paginas->imagem_paginas->Visible) { // imagem_paginas ?>
		<td<?php echo $paginas->imagem_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_imagem_paginas" class="paginas_imagem_paginas">
<span<?php echo $paginas->imagem_paginas->viewAttributes() ?>>
<?php echo $paginas->imagem_paginas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($paginas->imagem_miniatura_paginas->Visible) { // imagem_miniatura_paginas ?>
		<td<?php echo $paginas->imagem_miniatura_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_imagem_miniatura_paginas" class="paginas_imagem_miniatura_paginas">
<span<?php echo $paginas->imagem_miniatura_paginas->viewAttributes() ?>>
<?php echo $paginas->imagem_miniatura_paginas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($paginas->new_sjt_id->Visible) { // new_sjt_id ?>
		<td<?php echo $paginas->new_sjt_id->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_new_sjt_id" class="paginas_new_sjt_id">
<span<?php echo $paginas->new_sjt_id->viewAttributes() ?>>
<?php echo $paginas->new_sjt_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($paginas->data_atualizacao_paginas->Visible) { // data_atualizacao_paginas ?>
		<td<?php echo $paginas->data_atualizacao_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_data_atualizacao_paginas" class="paginas_data_atualizacao_paginas">
<span<?php echo $paginas->data_atualizacao_paginas->viewAttributes() ?>>
<?php echo $paginas->data_atualizacao_paginas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($paginas->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $paginas->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_usuario_id" class="paginas_usuario_id">
<span<?php echo $paginas->usuario_id->viewAttributes() ?>>
<?php echo $paginas->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($paginas->bool_ativo_paginas->Visible) { // bool_ativo_paginas ?>
		<td<?php echo $paginas->bool_ativo_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_delete->RowCnt ?>_paginas_bool_ativo_paginas" class="paginas_bool_ativo_paginas">
<span<?php echo $paginas->bool_ativo_paginas->viewAttributes() ?>>
<?php echo $paginas->bool_ativo_paginas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$paginas_delete->Recordset->moveNext();
}
$paginas_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $paginas_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$paginas_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$paginas_delete->terminate();
?>
