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
$loja_delete = new loja_delete();

// Run the page
$loja_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$loja_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flojadelete = currentForm = new ew.Form("flojadelete", "delete");

// Form_CustomValidate event
flojadelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flojadelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $loja_delete->showPageHeader(); ?>
<?php
$loja_delete->showMessage();
?>
<form name="flojadelete" id="flojadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($loja_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $loja_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="loja">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($loja_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($loja->id_loja->Visible) { // id_loja ?>
		<th class="<?php echo $loja->id_loja->headerCellClass() ?>"><span id="elh_loja_id_loja" class="loja_id_loja"><?php echo $loja->id_loja->caption() ?></span></th>
<?php } ?>
<?php if ($loja->titulo_loja->Visible) { // titulo_loja ?>
		<th class="<?php echo $loja->titulo_loja->headerCellClass() ?>"><span id="elh_loja_titulo_loja" class="loja_titulo_loja"><?php echo $loja->titulo_loja->caption() ?></span></th>
<?php } ?>
<?php if ($loja->descricao_loja->Visible) { // descricao_loja ?>
		<th class="<?php echo $loja->descricao_loja->headerCellClass() ?>"><span id="elh_loja_descricao_loja" class="loja_descricao_loja"><?php echo $loja->descricao_loja->caption() ?></span></th>
<?php } ?>
<?php if ($loja->imagem_loja->Visible) { // imagem_loja ?>
		<th class="<?php echo $loja->imagem_loja->headerCellClass() ?>"><span id="elh_loja_imagem_loja" class="loja_imagem_loja"><?php echo $loja->imagem_loja->caption() ?></span></th>
<?php } ?>
<?php if ($loja->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<th class="<?php echo $loja->pagina_principal_id->headerCellClass() ?>"><span id="elh_loja_pagina_principal_id" class="loja_pagina_principal_id"><?php echo $loja->pagina_principal_id->caption() ?></span></th>
<?php } ?>
<?php if ($loja->data_atualizacao_loja->Visible) { // data_atualizacao_loja ?>
		<th class="<?php echo $loja->data_atualizacao_loja->headerCellClass() ?>"><span id="elh_loja_data_atualizacao_loja" class="loja_data_atualizacao_loja"><?php echo $loja->data_atualizacao_loja->caption() ?></span></th>
<?php } ?>
<?php if ($loja->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $loja->usuario_id->headerCellClass() ?>"><span id="elh_loja_usuario_id" class="loja_usuario_id"><?php echo $loja->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($loja->bool_ativo_loja->Visible) { // bool_ativo_loja ?>
		<th class="<?php echo $loja->bool_ativo_loja->headerCellClass() ?>"><span id="elh_loja_bool_ativo_loja" class="loja_bool_ativo_loja"><?php echo $loja->bool_ativo_loja->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$loja_delete->RecCnt = 0;
$i = 0;
while (!$loja_delete->Recordset->EOF) {
	$loja_delete->RecCnt++;
	$loja_delete->RowCnt++;

	// Set row properties
	$loja->resetAttributes();
	$loja->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$loja_delete->loadRowValues($loja_delete->Recordset);

	// Render row
	$loja_delete->renderRow();
?>
	<tr<?php echo $loja->rowAttributes() ?>>
<?php if ($loja->id_loja->Visible) { // id_loja ?>
		<td<?php echo $loja->id_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_id_loja" class="loja_id_loja">
<span<?php echo $loja->id_loja->viewAttributes() ?>>
<?php echo $loja->id_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($loja->titulo_loja->Visible) { // titulo_loja ?>
		<td<?php echo $loja->titulo_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_titulo_loja" class="loja_titulo_loja">
<span<?php echo $loja->titulo_loja->viewAttributes() ?>>
<?php echo $loja->titulo_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($loja->descricao_loja->Visible) { // descricao_loja ?>
		<td<?php echo $loja->descricao_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_descricao_loja" class="loja_descricao_loja">
<span<?php echo $loja->descricao_loja->viewAttributes() ?>>
<?php echo $loja->descricao_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($loja->imagem_loja->Visible) { // imagem_loja ?>
		<td<?php echo $loja->imagem_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_imagem_loja" class="loja_imagem_loja">
<span<?php echo $loja->imagem_loja->viewAttributes() ?>>
<?php echo $loja->imagem_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($loja->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td<?php echo $loja->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_pagina_principal_id" class="loja_pagina_principal_id">
<span<?php echo $loja->pagina_principal_id->viewAttributes() ?>>
<?php echo $loja->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($loja->data_atualizacao_loja->Visible) { // data_atualizacao_loja ?>
		<td<?php echo $loja->data_atualizacao_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_data_atualizacao_loja" class="loja_data_atualizacao_loja">
<span<?php echo $loja->data_atualizacao_loja->viewAttributes() ?>>
<?php echo $loja->data_atualizacao_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($loja->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $loja->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_usuario_id" class="loja_usuario_id">
<span<?php echo $loja->usuario_id->viewAttributes() ?>>
<?php echo $loja->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($loja->bool_ativo_loja->Visible) { // bool_ativo_loja ?>
		<td<?php echo $loja->bool_ativo_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_delete->RowCnt ?>_loja_bool_ativo_loja" class="loja_bool_ativo_loja">
<span<?php echo $loja->bool_ativo_loja->viewAttributes() ?>>
<?php echo $loja->bool_ativo_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$loja_delete->Recordset->moveNext();
}
$loja_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $loja_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$loja_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$loja_delete->terminate();
?>
