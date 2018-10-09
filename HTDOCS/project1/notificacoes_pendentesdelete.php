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
$notificacoes_pendentes_delete = new notificacoes_pendentes_delete();

// Run the page
$notificacoes_pendentes_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_pendentes_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fnotificacoes_pendentesdelete = currentForm = new ew.Form("fnotificacoes_pendentesdelete", "delete");

// Form_CustomValidate event
fnotificacoes_pendentesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_pendentesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoes_pendentesdelete.lists["x_tipo_alteracao_notificacoes_pendentes"] = <?php echo $notificacoes_pendentes_delete->tipo_alteracao_notificacoes_pendentes->Lookup->toClientList() ?>;
fnotificacoes_pendentesdelete.lists["x_tipo_alteracao_notificacoes_pendentes"].options = <?php echo JsonEncode($notificacoes_pendentes_delete->tipo_alteracao_notificacoes_pendentes->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_pendentes_delete->showPageHeader(); ?>
<?php
$notificacoes_pendentes_delete->showMessage();
?>
<form name="fnotificacoes_pendentesdelete" id="fnotificacoes_pendentesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_pendentes_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_pendentes_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_pendentes">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($notificacoes_pendentes_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($notificacoes_pendentes->id_notificacoes_pendentes->Visible) { // id_notificacoes_pendentes ?>
		<th class="<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->headerCellClass() ?>"><span id="elh_notificacoes_pendentes_id_notificacoes_pendentes" class="notificacoes_pendentes_id_notificacoes_pendentes"><?php echo $notificacoes_pendentes->id_notificacoes_pendentes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->Visible) { // usuario_atuador_notificacoes_pendentes ?>
		<th class="<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->headerCellClass() ?>"><span id="elh_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes" class="notificacoes_pendentes_usuario_atuador_notificacoes_pendentes"><?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->Visible) { // usuaio_requerente_notificacoes_pendentes ?>
		<th class="<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->headerCellClass() ?>"><span id="elh_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes" class="notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes"><?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Visible) { // tipo_alteracao_notificacoes_pendentes ?>
		<th class="<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->headerCellClass() ?>"><span id="elh_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes" class="notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes"><?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_pendentes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<th class="<?php echo $notificacoes_pendentes->notificacoes_config_id->headerCellClass() ?>"><span id="elh_notificacoes_pendentes_notificacoes_config_id" class="notificacoes_pendentes_notificacoes_config_id"><?php echo $notificacoes_pendentes->notificacoes_config_id->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->Visible) { // data_atualizacao_notificacoes_pendentes ?>
		<th class="<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->headerCellClass() ?>"><span id="elh_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes" class="notificacoes_pendentes_data_atualizacao_notificacoes_pendentes"><?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->Visible) { // bool_ativo_notificacoes_pendentes ?>
		<th class="<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->headerCellClass() ?>"><span id="elh_notificacoes_pendentes_bool_ativo_notificacoes_pendentes" class="notificacoes_pendentes_bool_ativo_notificacoes_pendentes"><?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$notificacoes_pendentes_delete->RecCnt = 0;
$i = 0;
while (!$notificacoes_pendentes_delete->Recordset->EOF) {
	$notificacoes_pendentes_delete->RecCnt++;
	$notificacoes_pendentes_delete->RowCnt++;

	// Set row properties
	$notificacoes_pendentes->resetAttributes();
	$notificacoes_pendentes->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$notificacoes_pendentes_delete->loadRowValues($notificacoes_pendentes_delete->Recordset);

	// Render row
	$notificacoes_pendentes_delete->renderRow();
?>
	<tr<?php echo $notificacoes_pendentes->rowAttributes() ?>>
<?php if ($notificacoes_pendentes->id_notificacoes_pendentes->Visible) { // id_notificacoes_pendentes ?>
		<td<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_delete->RowCnt ?>_notificacoes_pendentes_id_notificacoes_pendentes" class="notificacoes_pendentes_id_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->Visible) { // usuario_atuador_notificacoes_pendentes ?>
		<td<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_delete->RowCnt ?>_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes" class="notificacoes_pendentes_usuario_atuador_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->Visible) { // usuaio_requerente_notificacoes_pendentes ?>
		<td<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_delete->RowCnt ?>_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes" class="notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Visible) { // tipo_alteracao_notificacoes_pendentes ?>
		<td<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_delete->RowCnt ?>_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes" class="notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_pendentes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<td<?php echo $notificacoes_pendentes->notificacoes_config_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_delete->RowCnt ?>_notificacoes_pendentes_notificacoes_config_id" class="notificacoes_pendentes_notificacoes_config_id">
<span<?php echo $notificacoes_pendentes->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->Visible) { // data_atualizacao_notificacoes_pendentes ?>
		<td<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_delete->RowCnt ?>_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes" class="notificacoes_pendentes_data_atualizacao_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->Visible) { // bool_ativo_notificacoes_pendentes ?>
		<td<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_delete->RowCnt ?>_notificacoes_pendentes_bool_ativo_notificacoes_pendentes" class="notificacoes_pendentes_bool_ativo_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$notificacoes_pendentes_delete->Recordset->moveNext();
}
$notificacoes_pendentes_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_pendentes_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$notificacoes_pendentes_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_pendentes_delete->terminate();
?>
