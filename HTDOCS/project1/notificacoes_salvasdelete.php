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
$notificacoes_salvas_delete = new notificacoes_salvas_delete();

// Run the page
$notificacoes_salvas_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_salvas_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fnotificacoes_salvasdelete = currentForm = new ew.Form("fnotificacoes_salvasdelete", "delete");

// Form_CustomValidate event
fnotificacoes_salvasdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_salvasdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_salvas_delete->showPageHeader(); ?>
<?php
$notificacoes_salvas_delete->showMessage();
?>
<form name="fnotificacoes_salvasdelete" id="fnotificacoes_salvasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_salvas_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_salvas_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_salvas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($notificacoes_salvas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($notificacoes_salvas->id_notificacoes_salvas->Visible) { // id_notificacoes_salvas ?>
		<th class="<?php echo $notificacoes_salvas->id_notificacoes_salvas->headerCellClass() ?>"><span id="elh_notificacoes_salvas_id_notificacoes_salvas" class="notificacoes_salvas_id_notificacoes_salvas"><?php echo $notificacoes_salvas->id_notificacoes_salvas->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->Visible) { // usuario_atuador_notificacoes_salvas ?>
		<th class="<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->headerCellClass() ?>"><span id="elh_notificacoes_salvas_usuario_atuador_notificacoes_salvas" class="notificacoes_salvas_usuario_atuador_notificacoes_salvas"><?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->Visible) { // usuaio_requerente_notificacoes_salvas ?>
		<th class="<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->headerCellClass() ?>"><span id="elh_notificacoes_salvas_usuaio_requerente_notificacoes_salvas" class="notificacoes_salvas_usuaio_requerente_notificacoes_salvas"><?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->Visible) { // tipo_alteracao_notificacoes_salvas ?>
		<th class="<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->headerCellClass() ?>"><span id="elh_notificacoes_salvas_tipo_alteracao_notificacoes_salvas" class="notificacoes_salvas_tipo_alteracao_notificacoes_salvas"><?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_salvas->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<th class="<?php echo $notificacoes_salvas->notificacoes_config_id->headerCellClass() ?>"><span id="elh_notificacoes_salvas_notificacoes_config_id" class="notificacoes_salvas_notificacoes_config_id"><?php echo $notificacoes_salvas->notificacoes_config_id->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->Visible) { // data_atualizacao_notificacoes_salvas ?>
		<th class="<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->headerCellClass() ?>"><span id="elh_notificacoes_salvas_data_atualizacao_notificacoes_salvas" class="notificacoes_salvas_data_atualizacao_notificacoes_salvas"><?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_salvas->bool_ativo_notificacoes_salvas->Visible) { // bool_ativo_notificacoes_salvas ?>
		<th class="<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->headerCellClass() ?>"><span id="elh_notificacoes_salvas_bool_ativo_notificacoes_salvas" class="notificacoes_salvas_bool_ativo_notificacoes_salvas"><?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$notificacoes_salvas_delete->RecCnt = 0;
$i = 0;
while (!$notificacoes_salvas_delete->Recordset->EOF) {
	$notificacoes_salvas_delete->RecCnt++;
	$notificacoes_salvas_delete->RowCnt++;

	// Set row properties
	$notificacoes_salvas->resetAttributes();
	$notificacoes_salvas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$notificacoes_salvas_delete->loadRowValues($notificacoes_salvas_delete->Recordset);

	// Render row
	$notificacoes_salvas_delete->renderRow();
?>
	<tr<?php echo $notificacoes_salvas->rowAttributes() ?>>
<?php if ($notificacoes_salvas->id_notificacoes_salvas->Visible) { // id_notificacoes_salvas ?>
		<td<?php echo $notificacoes_salvas->id_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_delete->RowCnt ?>_notificacoes_salvas_id_notificacoes_salvas" class="notificacoes_salvas_id_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->id_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->id_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->Visible) { // usuario_atuador_notificacoes_salvas ?>
		<td<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_delete->RowCnt ?>_notificacoes_salvas_usuario_atuador_notificacoes_salvas" class="notificacoes_salvas_usuario_atuador_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->Visible) { // usuaio_requerente_notificacoes_salvas ?>
		<td<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_delete->RowCnt ?>_notificacoes_salvas_usuaio_requerente_notificacoes_salvas" class="notificacoes_salvas_usuaio_requerente_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->Visible) { // tipo_alteracao_notificacoes_salvas ?>
		<td<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_delete->RowCnt ?>_notificacoes_salvas_tipo_alteracao_notificacoes_salvas" class="notificacoes_salvas_tipo_alteracao_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_salvas->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<td<?php echo $notificacoes_salvas->notificacoes_config_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_delete->RowCnt ?>_notificacoes_salvas_notificacoes_config_id" class="notificacoes_salvas_notificacoes_config_id">
<span<?php echo $notificacoes_salvas->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes_salvas->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->Visible) { // data_atualizacao_notificacoes_salvas ?>
		<td<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_delete->RowCnt ?>_notificacoes_salvas_data_atualizacao_notificacoes_salvas" class="notificacoes_salvas_data_atualizacao_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_salvas->bool_ativo_notificacoes_salvas->Visible) { // bool_ativo_notificacoes_salvas ?>
		<td<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_delete->RowCnt ?>_notificacoes_salvas_bool_ativo_notificacoes_salvas" class="notificacoes_salvas_bool_ativo_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$notificacoes_salvas_delete->Recordset->moveNext();
}
$notificacoes_salvas_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_salvas_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$notificacoes_salvas_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_salvas_delete->terminate();
?>
