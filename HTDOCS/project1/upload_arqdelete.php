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
$upload_arq_delete = new upload_arq_delete();

// Run the page
$upload_arq_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$upload_arq_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fupload_arqdelete = currentForm = new ew.Form("fupload_arqdelete", "delete");

// Form_CustomValidate event
fupload_arqdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fupload_arqdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $upload_arq_delete->showPageHeader(); ?>
<?php
$upload_arq_delete->showMessage();
?>
<form name="fupload_arqdelete" id="fupload_arqdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($upload_arq_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $upload_arq_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="upload_arq">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($upload_arq_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($upload_arq->id_upload_arq->Visible) { // id_upload_arq ?>
		<th class="<?php echo $upload_arq->id_upload_arq->headerCellClass() ?>"><span id="elh_upload_arq_id_upload_arq" class="upload_arq_id_upload_arq"><?php echo $upload_arq->id_upload_arq->caption() ?></span></th>
<?php } ?>
<?php if ($upload_arq->descricao_upload_arq->Visible) { // descricao_upload_arq ?>
		<th class="<?php echo $upload_arq->descricao_upload_arq->headerCellClass() ?>"><span id="elh_upload_arq_descricao_upload_arq" class="upload_arq_descricao_upload_arq"><?php echo $upload_arq->descricao_upload_arq->caption() ?></span></th>
<?php } ?>
<?php if ($upload_arq->tipo_upload_arq->Visible) { // tipo_upload_arq ?>
		<th class="<?php echo $upload_arq->tipo_upload_arq->headerCellClass() ?>"><span id="elh_upload_arq_tipo_upload_arq" class="upload_arq_tipo_upload_arq"><?php echo $upload_arq->tipo_upload_arq->caption() ?></span></th>
<?php } ?>
<?php if ($upload_arq->data_atualizacaoupload_arq->Visible) { // data_atualizacaoupload_arq ?>
		<th class="<?php echo $upload_arq->data_atualizacaoupload_arq->headerCellClass() ?>"><span id="elh_upload_arq_data_atualizacaoupload_arq" class="upload_arq_data_atualizacaoupload_arq"><?php echo $upload_arq->data_atualizacaoupload_arq->caption() ?></span></th>
<?php } ?>
<?php if ($upload_arq->bool_ativo_upload_arq->Visible) { // bool_ativo_upload_arq ?>
		<th class="<?php echo $upload_arq->bool_ativo_upload_arq->headerCellClass() ?>"><span id="elh_upload_arq_bool_ativo_upload_arq" class="upload_arq_bool_ativo_upload_arq"><?php echo $upload_arq->bool_ativo_upload_arq->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$upload_arq_delete->RecCnt = 0;
$i = 0;
while (!$upload_arq_delete->Recordset->EOF) {
	$upload_arq_delete->RecCnt++;
	$upload_arq_delete->RowCnt++;

	// Set row properties
	$upload_arq->resetAttributes();
	$upload_arq->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$upload_arq_delete->loadRowValues($upload_arq_delete->Recordset);

	// Render row
	$upload_arq_delete->renderRow();
?>
	<tr<?php echo $upload_arq->rowAttributes() ?>>
<?php if ($upload_arq->id_upload_arq->Visible) { // id_upload_arq ?>
		<td<?php echo $upload_arq->id_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_delete->RowCnt ?>_upload_arq_id_upload_arq" class="upload_arq_id_upload_arq">
<span<?php echo $upload_arq->id_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->id_upload_arq->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($upload_arq->descricao_upload_arq->Visible) { // descricao_upload_arq ?>
		<td<?php echo $upload_arq->descricao_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_delete->RowCnt ?>_upload_arq_descricao_upload_arq" class="upload_arq_descricao_upload_arq">
<span<?php echo $upload_arq->descricao_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->descricao_upload_arq->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($upload_arq->tipo_upload_arq->Visible) { // tipo_upload_arq ?>
		<td<?php echo $upload_arq->tipo_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_delete->RowCnt ?>_upload_arq_tipo_upload_arq" class="upload_arq_tipo_upload_arq">
<span<?php echo $upload_arq->tipo_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->tipo_upload_arq->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($upload_arq->data_atualizacaoupload_arq->Visible) { // data_atualizacaoupload_arq ?>
		<td<?php echo $upload_arq->data_atualizacaoupload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_delete->RowCnt ?>_upload_arq_data_atualizacaoupload_arq" class="upload_arq_data_atualizacaoupload_arq">
<span<?php echo $upload_arq->data_atualizacaoupload_arq->viewAttributes() ?>>
<?php echo $upload_arq->data_atualizacaoupload_arq->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($upload_arq->bool_ativo_upload_arq->Visible) { // bool_ativo_upload_arq ?>
		<td<?php echo $upload_arq->bool_ativo_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_delete->RowCnt ?>_upload_arq_bool_ativo_upload_arq" class="upload_arq_bool_ativo_upload_arq">
<span<?php echo $upload_arq->bool_ativo_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->bool_ativo_upload_arq->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$upload_arq_delete->Recordset->moveNext();
}
$upload_arq_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $upload_arq_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$upload_arq_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$upload_arq_delete->terminate();
?>
