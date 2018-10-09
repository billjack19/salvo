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
$situacao_delete = new situacao_delete();

// Run the page
$situacao_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$situacao_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsituacaodelete = currentForm = new ew.Form("fsituacaodelete", "delete");

// Form_CustomValidate event
fsituacaodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsituacaodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $situacao_delete->showPageHeader(); ?>
<?php
$situacao_delete->showMessage();
?>
<form name="fsituacaodelete" id="fsituacaodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($situacao_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $situacao_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="situacao">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($situacao_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($situacao->id_situacao->Visible) { // id_situacao ?>
		<th class="<?php echo $situacao->id_situacao->headerCellClass() ?>"><span id="elh_situacao_id_situacao" class="situacao_id_situacao"><?php echo $situacao->id_situacao->caption() ?></span></th>
<?php } ?>
<?php if ($situacao->descricao_situacao->Visible) { // descricao_situacao ?>
		<th class="<?php echo $situacao->descricao_situacao->headerCellClass() ?>"><span id="elh_situacao_descricao_situacao" class="situacao_descricao_situacao"><?php echo $situacao->descricao_situacao->caption() ?></span></th>
<?php } ?>
<?php if ($situacao->cor_situacao->Visible) { // cor_situacao ?>
		<th class="<?php echo $situacao->cor_situacao->headerCellClass() ?>"><span id="elh_situacao_cor_situacao" class="situacao_cor_situacao"><?php echo $situacao->cor_situacao->caption() ?></span></th>
<?php } ?>
<?php if ($situacao->data_atualizacao_situacao->Visible) { // data_atualizacao_situacao ?>
		<th class="<?php echo $situacao->data_atualizacao_situacao->headerCellClass() ?>"><span id="elh_situacao_data_atualizacao_situacao" class="situacao_data_atualizacao_situacao"><?php echo $situacao->data_atualizacao_situacao->caption() ?></span></th>
<?php } ?>
<?php if ($situacao->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $situacao->usuario_id->headerCellClass() ?>"><span id="elh_situacao_usuario_id" class="situacao_usuario_id"><?php echo $situacao->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($situacao->bool_ativo_situacao->Visible) { // bool_ativo_situacao ?>
		<th class="<?php echo $situacao->bool_ativo_situacao->headerCellClass() ?>"><span id="elh_situacao_bool_ativo_situacao" class="situacao_bool_ativo_situacao"><?php echo $situacao->bool_ativo_situacao->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$situacao_delete->RecCnt = 0;
$i = 0;
while (!$situacao_delete->Recordset->EOF) {
	$situacao_delete->RecCnt++;
	$situacao_delete->RowCnt++;

	// Set row properties
	$situacao->resetAttributes();
	$situacao->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$situacao_delete->loadRowValues($situacao_delete->Recordset);

	// Render row
	$situacao_delete->renderRow();
?>
	<tr<?php echo $situacao->rowAttributes() ?>>
<?php if ($situacao->id_situacao->Visible) { // id_situacao ?>
		<td<?php echo $situacao->id_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_delete->RowCnt ?>_situacao_id_situacao" class="situacao_id_situacao">
<span<?php echo $situacao->id_situacao->viewAttributes() ?>>
<?php echo $situacao->id_situacao->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($situacao->descricao_situacao->Visible) { // descricao_situacao ?>
		<td<?php echo $situacao->descricao_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_delete->RowCnt ?>_situacao_descricao_situacao" class="situacao_descricao_situacao">
<span<?php echo $situacao->descricao_situacao->viewAttributes() ?>>
<?php echo $situacao->descricao_situacao->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($situacao->cor_situacao->Visible) { // cor_situacao ?>
		<td<?php echo $situacao->cor_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_delete->RowCnt ?>_situacao_cor_situacao" class="situacao_cor_situacao">
<span<?php echo $situacao->cor_situacao->viewAttributes() ?>>
<?php echo $situacao->cor_situacao->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($situacao->data_atualizacao_situacao->Visible) { // data_atualizacao_situacao ?>
		<td<?php echo $situacao->data_atualizacao_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_delete->RowCnt ?>_situacao_data_atualizacao_situacao" class="situacao_data_atualizacao_situacao">
<span<?php echo $situacao->data_atualizacao_situacao->viewAttributes() ?>>
<?php echo $situacao->data_atualizacao_situacao->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($situacao->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $situacao->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $situacao_delete->RowCnt ?>_situacao_usuario_id" class="situacao_usuario_id">
<span<?php echo $situacao->usuario_id->viewAttributes() ?>>
<?php echo $situacao->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($situacao->bool_ativo_situacao->Visible) { // bool_ativo_situacao ?>
		<td<?php echo $situacao->bool_ativo_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_delete->RowCnt ?>_situacao_bool_ativo_situacao" class="situacao_bool_ativo_situacao">
<span<?php echo $situacao->bool_ativo_situacao->viewAttributes() ?>>
<?php echo $situacao->bool_ativo_situacao->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$situacao_delete->Recordset->moveNext();
}
$situacao_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $situacao_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$situacao_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$situacao_delete->terminate();
?>
