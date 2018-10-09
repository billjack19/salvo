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
$estado_delete = new estado_delete();

// Run the page
$estado_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$estado_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var festadodelete = currentForm = new ew.Form("festadodelete", "delete");

// Form_CustomValidate event
festadodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
festadodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $estado_delete->showPageHeader(); ?>
<?php
$estado_delete->showMessage();
?>
<form name="festadodelete" id="festadodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($estado_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $estado_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="estado">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($estado_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($estado->id_estado->Visible) { // id_estado ?>
		<th class="<?php echo $estado->id_estado->headerCellClass() ?>"><span id="elh_estado_id_estado" class="estado_id_estado"><?php echo $estado->id_estado->caption() ?></span></th>
<?php } ?>
<?php if ($estado->descricao_estado->Visible) { // descricao_estado ?>
		<th class="<?php echo $estado->descricao_estado->headerCellClass() ?>"><span id="elh_estado_descricao_estado" class="estado_descricao_estado"><?php echo $estado->descricao_estado->caption() ?></span></th>
<?php } ?>
<?php if ($estado->sigla_estado->Visible) { // sigla_estado ?>
		<th class="<?php echo $estado->sigla_estado->headerCellClass() ?>"><span id="elh_estado_sigla_estado" class="estado_sigla_estado"><?php echo $estado->sigla_estado->caption() ?></span></th>
<?php } ?>
<?php if ($estado->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $estado->usuario_id->headerCellClass() ?>"><span id="elh_estado_usuario_id" class="estado_usuario_id"><?php echo $estado->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($estado->bool_ativo_estado->Visible) { // bool_ativo_estado ?>
		<th class="<?php echo $estado->bool_ativo_estado->headerCellClass() ?>"><span id="elh_estado_bool_ativo_estado" class="estado_bool_ativo_estado"><?php echo $estado->bool_ativo_estado->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$estado_delete->RecCnt = 0;
$i = 0;
while (!$estado_delete->Recordset->EOF) {
	$estado_delete->RecCnt++;
	$estado_delete->RowCnt++;

	// Set row properties
	$estado->resetAttributes();
	$estado->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$estado_delete->loadRowValues($estado_delete->Recordset);

	// Render row
	$estado_delete->renderRow();
?>
	<tr<?php echo $estado->rowAttributes() ?>>
<?php if ($estado->id_estado->Visible) { // id_estado ?>
		<td<?php echo $estado->id_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_delete->RowCnt ?>_estado_id_estado" class="estado_id_estado">
<span<?php echo $estado->id_estado->viewAttributes() ?>>
<?php echo $estado->id_estado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($estado->descricao_estado->Visible) { // descricao_estado ?>
		<td<?php echo $estado->descricao_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_delete->RowCnt ?>_estado_descricao_estado" class="estado_descricao_estado">
<span<?php echo $estado->descricao_estado->viewAttributes() ?>>
<?php echo $estado->descricao_estado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($estado->sigla_estado->Visible) { // sigla_estado ?>
		<td<?php echo $estado->sigla_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_delete->RowCnt ?>_estado_sigla_estado" class="estado_sigla_estado">
<span<?php echo $estado->sigla_estado->viewAttributes() ?>>
<?php echo $estado->sigla_estado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($estado->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $estado->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $estado_delete->RowCnt ?>_estado_usuario_id" class="estado_usuario_id">
<span<?php echo $estado->usuario_id->viewAttributes() ?>>
<?php echo $estado->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($estado->bool_ativo_estado->Visible) { // bool_ativo_estado ?>
		<td<?php echo $estado->bool_ativo_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_delete->RowCnt ?>_estado_bool_ativo_estado" class="estado_bool_ativo_estado">
<span<?php echo $estado->bool_ativo_estado->viewAttributes() ?>>
<?php echo $estado->bool_ativo_estado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$estado_delete->Recordset->moveNext();
}
$estado_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $estado_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$estado_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$estado_delete->terminate();
?>
