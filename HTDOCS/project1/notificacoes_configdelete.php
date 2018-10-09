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
$notificacoes_config_delete = new notificacoes_config_delete();

// Run the page
$notificacoes_config_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_config_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fnotificacoes_configdelete = currentForm = new ew.Form("fnotificacoes_configdelete", "delete");

// Form_CustomValidate event
fnotificacoes_configdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_configdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_config_delete->showPageHeader(); ?>
<?php
$notificacoes_config_delete->showMessage();
?>
<form name="fnotificacoes_configdelete" id="fnotificacoes_configdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_config_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_config_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_config">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($notificacoes_config_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($notificacoes_config->id_notificacoes_config->Visible) { // id_notificacoes_config ?>
		<th class="<?php echo $notificacoes_config->id_notificacoes_config->headerCellClass() ?>"><span id="elh_notificacoes_config_id_notificacoes_config" class="notificacoes_config_id_notificacoes_config"><?php echo $notificacoes_config->id_notificacoes_config->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_config->area_notificacoes_config->Visible) { // area_notificacoes_config ?>
		<th class="<?php echo $notificacoes_config->area_notificacoes_config->headerCellClass() ?>"><span id="elh_notificacoes_config_area_notificacoes_config" class="notificacoes_config_area_notificacoes_config"><?php echo $notificacoes_config->area_notificacoes_config->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_config->tipo_alteracao_notificacoes_config->Visible) { // tipo_alteracao_notificacoes_config ?>
		<th class="<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->headerCellClass() ?>"><span id="elh_notificacoes_config_tipo_alteracao_notificacoes_config" class="notificacoes_config_tipo_alteracao_notificacoes_config"><?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_config->data_atualizacao_notificacoes_config->Visible) { // data_atualizacao_notificacoes_config ?>
		<th class="<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->headerCellClass() ?>"><span id="elh_notificacoes_config_data_atualizacao_notificacoes_config" class="notificacoes_config_data_atualizacao_notificacoes_config"><?php echo $notificacoes_config->data_atualizacao_notificacoes_config->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_config->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $notificacoes_config->usuario_id->headerCellClass() ?>"><span id="elh_notificacoes_config_usuario_id" class="notificacoes_config_usuario_id"><?php echo $notificacoes_config->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_config->bool_ativo_notificacoes_config->Visible) { // bool_ativo_notificacoes_config ?>
		<th class="<?php echo $notificacoes_config->bool_ativo_notificacoes_config->headerCellClass() ?>"><span id="elh_notificacoes_config_bool_ativo_notificacoes_config" class="notificacoes_config_bool_ativo_notificacoes_config"><?php echo $notificacoes_config->bool_ativo_notificacoes_config->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$notificacoes_config_delete->RecCnt = 0;
$i = 0;
while (!$notificacoes_config_delete->Recordset->EOF) {
	$notificacoes_config_delete->RecCnt++;
	$notificacoes_config_delete->RowCnt++;

	// Set row properties
	$notificacoes_config->resetAttributes();
	$notificacoes_config->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$notificacoes_config_delete->loadRowValues($notificacoes_config_delete->Recordset);

	// Render row
	$notificacoes_config_delete->renderRow();
?>
	<tr<?php echo $notificacoes_config->rowAttributes() ?>>
<?php if ($notificacoes_config->id_notificacoes_config->Visible) { // id_notificacoes_config ?>
		<td<?php echo $notificacoes_config->id_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_delete->RowCnt ?>_notificacoes_config_id_notificacoes_config" class="notificacoes_config_id_notificacoes_config">
<span<?php echo $notificacoes_config->id_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->id_notificacoes_config->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_config->area_notificacoes_config->Visible) { // area_notificacoes_config ?>
		<td<?php echo $notificacoes_config->area_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_delete->RowCnt ?>_notificacoes_config_area_notificacoes_config" class="notificacoes_config_area_notificacoes_config">
<span<?php echo $notificacoes_config->area_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->area_notificacoes_config->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_config->tipo_alteracao_notificacoes_config->Visible) { // tipo_alteracao_notificacoes_config ?>
		<td<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_delete->RowCnt ?>_notificacoes_config_tipo_alteracao_notificacoes_config" class="notificacoes_config_tipo_alteracao_notificacoes_config">
<span<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_config->data_atualizacao_notificacoes_config->Visible) { // data_atualizacao_notificacoes_config ?>
		<td<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_delete->RowCnt ?>_notificacoes_config_data_atualizacao_notificacoes_config" class="notificacoes_config_data_atualizacao_notificacoes_config">
<span<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_config->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $notificacoes_config->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_delete->RowCnt ?>_notificacoes_config_usuario_id" class="notificacoes_config_usuario_id">
<span<?php echo $notificacoes_config->usuario_id->viewAttributes() ?>>
<?php echo $notificacoes_config->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_config->bool_ativo_notificacoes_config->Visible) { // bool_ativo_notificacoes_config ?>
		<td<?php echo $notificacoes_config->bool_ativo_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_delete->RowCnt ?>_notificacoes_config_bool_ativo_notificacoes_config" class="notificacoes_config_bool_ativo_notificacoes_config">
<span<?php echo $notificacoes_config->bool_ativo_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->bool_ativo_notificacoes_config->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$notificacoes_config_delete->Recordset->moveNext();
}
$notificacoes_config_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_config_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$notificacoes_config_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_config_delete->terminate();
?>
