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
$notificacoes_delete = new notificacoes_delete();

// Run the page
$notificacoes_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fnotificacoesdelete = currentForm = new ew.Form("fnotificacoesdelete", "delete");

// Form_CustomValidate event
fnotificacoesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoesdelete.lists["x_tipo_alteracao_notificacoes"] = <?php echo $notificacoes_delete->tipo_alteracao_notificacoes->Lookup->toClientList() ?>;
fnotificacoesdelete.lists["x_tipo_alteracao_notificacoes"].options = <?php echo JsonEncode($notificacoes_delete->tipo_alteracao_notificacoes->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_delete->showPageHeader(); ?>
<?php
$notificacoes_delete->showMessage();
?>
<form name="fnotificacoesdelete" id="fnotificacoesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($notificacoes_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($notificacoes->id_notificacoes->Visible) { // id_notificacoes ?>
		<th class="<?php echo $notificacoes->id_notificacoes->headerCellClass() ?>"><span id="elh_notificacoes_id_notificacoes" class="notificacoes_id_notificacoes"><?php echo $notificacoes->id_notificacoes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes->usuario_atuador_notificacoes->Visible) { // usuario_atuador_notificacoes ?>
		<th class="<?php echo $notificacoes->usuario_atuador_notificacoes->headerCellClass() ?>"><span id="elh_notificacoes_usuario_atuador_notificacoes" class="notificacoes_usuario_atuador_notificacoes"><?php echo $notificacoes->usuario_atuador_notificacoes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes->usuaio_requerente_notificacoes->Visible) { // usuaio_requerente_notificacoes ?>
		<th class="<?php echo $notificacoes->usuaio_requerente_notificacoes->headerCellClass() ?>"><span id="elh_notificacoes_usuaio_requerente_notificacoes" class="notificacoes_usuaio_requerente_notificacoes"><?php echo $notificacoes->usuaio_requerente_notificacoes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes->tipo_alteracao_notificacoes->Visible) { // tipo_alteracao_notificacoes ?>
		<th class="<?php echo $notificacoes->tipo_alteracao_notificacoes->headerCellClass() ?>"><span id="elh_notificacoes_tipo_alteracao_notificacoes" class="notificacoes_tipo_alteracao_notificacoes"><?php echo $notificacoes->tipo_alteracao_notificacoes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<th class="<?php echo $notificacoes->notificacoes_config_id->headerCellClass() ?>"><span id="elh_notificacoes_notificacoes_config_id" class="notificacoes_notificacoes_config_id"><?php echo $notificacoes->notificacoes_config_id->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes->bool_view_notificacoes->Visible) { // bool_view_notificacoes ?>
		<th class="<?php echo $notificacoes->bool_view_notificacoes->headerCellClass() ?>"><span id="elh_notificacoes_bool_view_notificacoes" class="notificacoes_bool_view_notificacoes"><?php echo $notificacoes->bool_view_notificacoes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes->data_atualizacao_notificacoes->Visible) { // data_atualizacao_notificacoes ?>
		<th class="<?php echo $notificacoes->data_atualizacao_notificacoes->headerCellClass() ?>"><span id="elh_notificacoes_data_atualizacao_notificacoes" class="notificacoes_data_atualizacao_notificacoes"><?php echo $notificacoes->data_atualizacao_notificacoes->caption() ?></span></th>
<?php } ?>
<?php if ($notificacoes->bool_ativo_notificacoes->Visible) { // bool_ativo_notificacoes ?>
		<th class="<?php echo $notificacoes->bool_ativo_notificacoes->headerCellClass() ?>"><span id="elh_notificacoes_bool_ativo_notificacoes" class="notificacoes_bool_ativo_notificacoes"><?php echo $notificacoes->bool_ativo_notificacoes->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$notificacoes_delete->RecCnt = 0;
$i = 0;
while (!$notificacoes_delete->Recordset->EOF) {
	$notificacoes_delete->RecCnt++;
	$notificacoes_delete->RowCnt++;

	// Set row properties
	$notificacoes->resetAttributes();
	$notificacoes->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$notificacoes_delete->loadRowValues($notificacoes_delete->Recordset);

	// Render row
	$notificacoes_delete->renderRow();
?>
	<tr<?php echo $notificacoes->rowAttributes() ?>>
<?php if ($notificacoes->id_notificacoes->Visible) { // id_notificacoes ?>
		<td<?php echo $notificacoes->id_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_id_notificacoes" class="notificacoes_id_notificacoes">
<span<?php echo $notificacoes->id_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->id_notificacoes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes->usuario_atuador_notificacoes->Visible) { // usuario_atuador_notificacoes ?>
		<td<?php echo $notificacoes->usuario_atuador_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_usuario_atuador_notificacoes" class="notificacoes_usuario_atuador_notificacoes">
<span<?php echo $notificacoes->usuario_atuador_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->usuario_atuador_notificacoes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes->usuaio_requerente_notificacoes->Visible) { // usuaio_requerente_notificacoes ?>
		<td<?php echo $notificacoes->usuaio_requerente_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_usuaio_requerente_notificacoes" class="notificacoes_usuaio_requerente_notificacoes">
<span<?php echo $notificacoes->usuaio_requerente_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->usuaio_requerente_notificacoes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes->tipo_alteracao_notificacoes->Visible) { // tipo_alteracao_notificacoes ?>
		<td<?php echo $notificacoes->tipo_alteracao_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_tipo_alteracao_notificacoes" class="notificacoes_tipo_alteracao_notificacoes">
<span<?php echo $notificacoes->tipo_alteracao_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->tipo_alteracao_notificacoes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<td<?php echo $notificacoes->notificacoes_config_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_notificacoes_config_id" class="notificacoes_notificacoes_config_id">
<span<?php echo $notificacoes->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes->bool_view_notificacoes->Visible) { // bool_view_notificacoes ?>
		<td<?php echo $notificacoes->bool_view_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_bool_view_notificacoes" class="notificacoes_bool_view_notificacoes">
<span<?php echo $notificacoes->bool_view_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->bool_view_notificacoes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes->data_atualizacao_notificacoes->Visible) { // data_atualizacao_notificacoes ?>
		<td<?php echo $notificacoes->data_atualizacao_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_data_atualizacao_notificacoes" class="notificacoes_data_atualizacao_notificacoes">
<span<?php echo $notificacoes->data_atualizacao_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->data_atualizacao_notificacoes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($notificacoes->bool_ativo_notificacoes->Visible) { // bool_ativo_notificacoes ?>
		<td<?php echo $notificacoes->bool_ativo_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_delete->RowCnt ?>_notificacoes_bool_ativo_notificacoes" class="notificacoes_bool_ativo_notificacoes">
<span<?php echo $notificacoes->bool_ativo_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->bool_ativo_notificacoes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$notificacoes_delete->Recordset->moveNext();
}
$notificacoes_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$notificacoes_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_delete->terminate();
?>
