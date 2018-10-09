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
$saiba_mais_delete = new saiba_mais_delete();

// Run the page
$saiba_mais_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$saiba_mais_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsaiba_maisdelete = currentForm = new ew.Form("fsaiba_maisdelete", "delete");

// Form_CustomValidate event
fsaiba_maisdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsaiba_maisdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $saiba_mais_delete->showPageHeader(); ?>
<?php
$saiba_mais_delete->showMessage();
?>
<form name="fsaiba_maisdelete" id="fsaiba_maisdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($saiba_mais_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $saiba_mais_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="saiba_mais">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($saiba_mais_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($saiba_mais->id_saiba_mais->Visible) { // id_saiba_mais ?>
		<th class="<?php echo $saiba_mais->id_saiba_mais->headerCellClass() ?>"><span id="elh_saiba_mais_id_saiba_mais" class="saiba_mais_id_saiba_mais"><?php echo $saiba_mais->id_saiba_mais->caption() ?></span></th>
<?php } ?>
<?php if ($saiba_mais->descricao_saiba_mais->Visible) { // descricao_saiba_mais ?>
		<th class="<?php echo $saiba_mais->descricao_saiba_mais->headerCellClass() ?>"><span id="elh_saiba_mais_descricao_saiba_mais" class="saiba_mais_descricao_saiba_mais"><?php echo $saiba_mais->descricao_saiba_mais->caption() ?></span></th>
<?php } ?>
<?php if ($saiba_mais->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<th class="<?php echo $saiba_mais->pagina_principal_id->headerCellClass() ?>"><span id="elh_saiba_mais_pagina_principal_id" class="saiba_mais_pagina_principal_id"><?php echo $saiba_mais->pagina_principal_id->caption() ?></span></th>
<?php } ?>
<?php if ($saiba_mais->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $saiba_mais->usuario_id->headerCellClass() ?>"><span id="elh_saiba_mais_usuario_id" class="saiba_mais_usuario_id"><?php echo $saiba_mais->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($saiba_mais->data_atualizacao_saiba_mais->Visible) { // data_atualizacao_saiba_mais ?>
		<th class="<?php echo $saiba_mais->data_atualizacao_saiba_mais->headerCellClass() ?>"><span id="elh_saiba_mais_data_atualizacao_saiba_mais" class="saiba_mais_data_atualizacao_saiba_mais"><?php echo $saiba_mais->data_atualizacao_saiba_mais->caption() ?></span></th>
<?php } ?>
<?php if ($saiba_mais->bool_ativo_saiba_mais->Visible) { // bool_ativo_saiba_mais ?>
		<th class="<?php echo $saiba_mais->bool_ativo_saiba_mais->headerCellClass() ?>"><span id="elh_saiba_mais_bool_ativo_saiba_mais" class="saiba_mais_bool_ativo_saiba_mais"><?php echo $saiba_mais->bool_ativo_saiba_mais->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$saiba_mais_delete->RecCnt = 0;
$i = 0;
while (!$saiba_mais_delete->Recordset->EOF) {
	$saiba_mais_delete->RecCnt++;
	$saiba_mais_delete->RowCnt++;

	// Set row properties
	$saiba_mais->resetAttributes();
	$saiba_mais->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$saiba_mais_delete->loadRowValues($saiba_mais_delete->Recordset);

	// Render row
	$saiba_mais_delete->renderRow();
?>
	<tr<?php echo $saiba_mais->rowAttributes() ?>>
<?php if ($saiba_mais->id_saiba_mais->Visible) { // id_saiba_mais ?>
		<td<?php echo $saiba_mais->id_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_delete->RowCnt ?>_saiba_mais_id_saiba_mais" class="saiba_mais_id_saiba_mais">
<span<?php echo $saiba_mais->id_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->id_saiba_mais->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($saiba_mais->descricao_saiba_mais->Visible) { // descricao_saiba_mais ?>
		<td<?php echo $saiba_mais->descricao_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_delete->RowCnt ?>_saiba_mais_descricao_saiba_mais" class="saiba_mais_descricao_saiba_mais">
<span<?php echo $saiba_mais->descricao_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->descricao_saiba_mais->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($saiba_mais->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td<?php echo $saiba_mais->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_delete->RowCnt ?>_saiba_mais_pagina_principal_id" class="saiba_mais_pagina_principal_id">
<span<?php echo $saiba_mais->pagina_principal_id->viewAttributes() ?>>
<?php echo $saiba_mais->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($saiba_mais->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $saiba_mais->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_delete->RowCnt ?>_saiba_mais_usuario_id" class="saiba_mais_usuario_id">
<span<?php echo $saiba_mais->usuario_id->viewAttributes() ?>>
<?php echo $saiba_mais->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($saiba_mais->data_atualizacao_saiba_mais->Visible) { // data_atualizacao_saiba_mais ?>
		<td<?php echo $saiba_mais->data_atualizacao_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_delete->RowCnt ?>_saiba_mais_data_atualizacao_saiba_mais" class="saiba_mais_data_atualizacao_saiba_mais">
<span<?php echo $saiba_mais->data_atualizacao_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->data_atualizacao_saiba_mais->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($saiba_mais->bool_ativo_saiba_mais->Visible) { // bool_ativo_saiba_mais ?>
		<td<?php echo $saiba_mais->bool_ativo_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_delete->RowCnt ?>_saiba_mais_bool_ativo_saiba_mais" class="saiba_mais_bool_ativo_saiba_mais">
<span<?php echo $saiba_mais->bool_ativo_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->bool_ativo_saiba_mais->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$saiba_mais_delete->Recordset->moveNext();
}
$saiba_mais_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $saiba_mais_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$saiba_mais_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$saiba_mais_delete->terminate();
?>
