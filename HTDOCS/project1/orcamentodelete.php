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
$orcamento_delete = new orcamento_delete();

// Run the page
$orcamento_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$orcamento_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var forcamentodelete = currentForm = new ew.Form("forcamentodelete", "delete");

// Form_CustomValidate event
forcamentodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
forcamentodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $orcamento_delete->showPageHeader(); ?>
<?php
$orcamento_delete->showMessage();
?>
<form name="forcamentodelete" id="forcamentodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($orcamento_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $orcamento_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="orcamento">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($orcamento_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($orcamento->id_orcamento->Visible) { // id_orcamento ?>
		<th class="<?php echo $orcamento->id_orcamento->headerCellClass() ?>"><span id="elh_orcamento_id_orcamento" class="orcamento_id_orcamento"><?php echo $orcamento->id_orcamento->caption() ?></span></th>
<?php } ?>
<?php if ($orcamento->descricao_orcamento->Visible) { // descricao_orcamento ?>
		<th class="<?php echo $orcamento->descricao_orcamento->headerCellClass() ?>"><span id="elh_orcamento_descricao_orcamento" class="orcamento_descricao_orcamento"><?php echo $orcamento->descricao_orcamento->caption() ?></span></th>
<?php } ?>
<?php if ($orcamento->cliente_site_id->Visible) { // cliente_site_id ?>
		<th class="<?php echo $orcamento->cliente_site_id->headerCellClass() ?>"><span id="elh_orcamento_cliente_site_id" class="orcamento_cliente_site_id"><?php echo $orcamento->cliente_site_id->caption() ?></span></th>
<?php } ?>
<?php if ($orcamento->data_lanc_orcamento->Visible) { // data_lanc_orcamento ?>
		<th class="<?php echo $orcamento->data_lanc_orcamento->headerCellClass() ?>"><span id="elh_orcamento_data_lanc_orcamento" class="orcamento_data_lanc_orcamento"><?php echo $orcamento->data_lanc_orcamento->caption() ?></span></th>
<?php } ?>
<?php if ($orcamento->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $orcamento->usuario_id->headerCellClass() ?>"><span id="elh_orcamento_usuario_id" class="orcamento_usuario_id"><?php echo $orcamento->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($orcamento->bool_ativo_orcamento->Visible) { // bool_ativo_orcamento ?>
		<th class="<?php echo $orcamento->bool_ativo_orcamento->headerCellClass() ?>"><span id="elh_orcamento_bool_ativo_orcamento" class="orcamento_bool_ativo_orcamento"><?php echo $orcamento->bool_ativo_orcamento->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$orcamento_delete->RecCnt = 0;
$i = 0;
while (!$orcamento_delete->Recordset->EOF) {
	$orcamento_delete->RecCnt++;
	$orcamento_delete->RowCnt++;

	// Set row properties
	$orcamento->resetAttributes();
	$orcamento->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$orcamento_delete->loadRowValues($orcamento_delete->Recordset);

	// Render row
	$orcamento_delete->renderRow();
?>
	<tr<?php echo $orcamento->rowAttributes() ?>>
<?php if ($orcamento->id_orcamento->Visible) { // id_orcamento ?>
		<td<?php echo $orcamento->id_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_delete->RowCnt ?>_orcamento_id_orcamento" class="orcamento_id_orcamento">
<span<?php echo $orcamento->id_orcamento->viewAttributes() ?>>
<?php echo $orcamento->id_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($orcamento->descricao_orcamento->Visible) { // descricao_orcamento ?>
		<td<?php echo $orcamento->descricao_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_delete->RowCnt ?>_orcamento_descricao_orcamento" class="orcamento_descricao_orcamento">
<span<?php echo $orcamento->descricao_orcamento->viewAttributes() ?>>
<?php echo $orcamento->descricao_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($orcamento->cliente_site_id->Visible) { // cliente_site_id ?>
		<td<?php echo $orcamento->cliente_site_id->cellAttributes() ?>>
<span id="el<?php echo $orcamento_delete->RowCnt ?>_orcamento_cliente_site_id" class="orcamento_cliente_site_id">
<span<?php echo $orcamento->cliente_site_id->viewAttributes() ?>>
<?php echo $orcamento->cliente_site_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($orcamento->data_lanc_orcamento->Visible) { // data_lanc_orcamento ?>
		<td<?php echo $orcamento->data_lanc_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_delete->RowCnt ?>_orcamento_data_lanc_orcamento" class="orcamento_data_lanc_orcamento">
<span<?php echo $orcamento->data_lanc_orcamento->viewAttributes() ?>>
<?php echo $orcamento->data_lanc_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($orcamento->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $orcamento->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $orcamento_delete->RowCnt ?>_orcamento_usuario_id" class="orcamento_usuario_id">
<span<?php echo $orcamento->usuario_id->viewAttributes() ?>>
<?php echo $orcamento->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($orcamento->bool_ativo_orcamento->Visible) { // bool_ativo_orcamento ?>
		<td<?php echo $orcamento->bool_ativo_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_delete->RowCnt ?>_orcamento_bool_ativo_orcamento" class="orcamento_bool_ativo_orcamento">
<span<?php echo $orcamento->bool_ativo_orcamento->viewAttributes() ?>>
<?php echo $orcamento->bool_ativo_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$orcamento_delete->Recordset->moveNext();
}
$orcamento_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $orcamento_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$orcamento_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$orcamento_delete->terminate();
?>
