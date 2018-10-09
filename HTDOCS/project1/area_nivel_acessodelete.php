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
$area_nivel_acesso_delete = new area_nivel_acesso_delete();

// Run the page
$area_nivel_acesso_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$area_nivel_acesso_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var farea_nivel_acessodelete = currentForm = new ew.Form("farea_nivel_acessodelete", "delete");

// Form_CustomValidate event
farea_nivel_acessodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
farea_nivel_acessodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $area_nivel_acesso_delete->showPageHeader(); ?>
<?php
$area_nivel_acesso_delete->showMessage();
?>
<form name="farea_nivel_acessodelete" id="farea_nivel_acessodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($area_nivel_acesso_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $area_nivel_acesso_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="area_nivel_acesso">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($area_nivel_acesso_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($area_nivel_acesso->id_area_nivel_acesso->Visible) { // id_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->id_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_id_area_nivel_acesso" class="area_nivel_acesso_id_area_nivel_acesso"><?php echo $area_nivel_acesso->id_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->area_area_nivel_acesso->Visible) { // area_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->area_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_area_area_nivel_acesso" class="area_nivel_acesso_area_area_nivel_acesso"><?php echo $area_nivel_acesso->area_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->demostrativo_area_nivel_acesso->Visible) { // demostrativo_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_demostrativo_area_nivel_acesso" class="area_nivel_acesso_demostrativo_area_nivel_acesso"><?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->bool_list_area_nivel_acesso->Visible) { // bool_list_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_bool_list_area_nivel_acesso" class="area_nivel_acesso_bool_list_area_nivel_acesso"><?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->bool_insert_area_nivel_acesso->Visible) { // bool_insert_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_bool_insert_area_nivel_acesso" class="area_nivel_acesso_bool_insert_area_nivel_acesso"><?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->bool_update_area_nivel_acesso->Visible) { // bool_update_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_bool_update_area_nivel_acesso" class="area_nivel_acesso_bool_update_area_nivel_acesso"><?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
		<th class="<?php echo $area_nivel_acesso->nivel_acesso_id->headerCellClass() ?>"><span id="elh_area_nivel_acesso_nivel_acesso_id" class="area_nivel_acesso_nivel_acesso_id"><?php echo $area_nivel_acesso->nivel_acesso_id->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->Visible) { // data_atualizacao_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_data_atualizacao_area_nivel_acesso" class="area_nivel_acesso_data_atualizacao_area_nivel_acesso"><?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $area_nivel_acesso->usuario_id->headerCellClass() ?>"><span id="elh_area_nivel_acesso_usuario_id" class="area_nivel_acesso_usuario_id"><?php echo $area_nivel_acesso->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($area_nivel_acesso->bool_ativo_area_nivel_acesso->Visible) { // bool_ativo_area_nivel_acesso ?>
		<th class="<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->headerCellClass() ?>"><span id="elh_area_nivel_acesso_bool_ativo_area_nivel_acesso" class="area_nivel_acesso_bool_ativo_area_nivel_acesso"><?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$area_nivel_acesso_delete->RecCnt = 0;
$i = 0;
while (!$area_nivel_acesso_delete->Recordset->EOF) {
	$area_nivel_acesso_delete->RecCnt++;
	$area_nivel_acesso_delete->RowCnt++;

	// Set row properties
	$area_nivel_acesso->resetAttributes();
	$area_nivel_acesso->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$area_nivel_acesso_delete->loadRowValues($area_nivel_acesso_delete->Recordset);

	// Render row
	$area_nivel_acesso_delete->renderRow();
?>
	<tr<?php echo $area_nivel_acesso->rowAttributes() ?>>
<?php if ($area_nivel_acesso->id_area_nivel_acesso->Visible) { // id_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->id_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_id_area_nivel_acesso" class="area_nivel_acesso_id_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->id_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->id_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->area_area_nivel_acesso->Visible) { // area_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->area_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_area_area_nivel_acesso" class="area_nivel_acesso_area_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->area_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->area_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->demostrativo_area_nivel_acesso->Visible) { // demostrativo_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_demostrativo_area_nivel_acesso" class="area_nivel_acesso_demostrativo_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->bool_list_area_nivel_acesso->Visible) { // bool_list_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_bool_list_area_nivel_acesso" class="area_nivel_acesso_bool_list_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->bool_insert_area_nivel_acesso->Visible) { // bool_insert_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_bool_insert_area_nivel_acesso" class="area_nivel_acesso_bool_insert_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->bool_update_area_nivel_acesso->Visible) { // bool_update_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_bool_update_area_nivel_acesso" class="area_nivel_acesso_bool_update_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
		<td<?php echo $area_nivel_acesso->nivel_acesso_id->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_nivel_acesso_id" class="area_nivel_acesso_nivel_acesso_id">
<span<?php echo $area_nivel_acesso->nivel_acesso_id->viewAttributes() ?>>
<?php echo $area_nivel_acesso->nivel_acesso_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->Visible) { // data_atualizacao_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_data_atualizacao_area_nivel_acesso" class="area_nivel_acesso_data_atualizacao_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $area_nivel_acesso->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_usuario_id" class="area_nivel_acesso_usuario_id">
<span<?php echo $area_nivel_acesso->usuario_id->viewAttributes() ?>>
<?php echo $area_nivel_acesso->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($area_nivel_acesso->bool_ativo_area_nivel_acesso->Visible) { // bool_ativo_area_nivel_acesso ?>
		<td<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_delete->RowCnt ?>_area_nivel_acesso_bool_ativo_area_nivel_acesso" class="area_nivel_acesso_bool_ativo_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$area_nivel_acesso_delete->Recordset->moveNext();
}
$area_nivel_acesso_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $area_nivel_acesso_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$area_nivel_acesso_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$area_nivel_acesso_delete->terminate();
?>
