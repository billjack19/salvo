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
$relatorios_delete = new relatorios_delete();

// Run the page
$relatorios_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorios_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var frelatoriosdelete = currentForm = new ew.Form("frelatoriosdelete", "delete");

// Form_CustomValidate event
frelatoriosdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatoriosdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $relatorios_delete->showPageHeader(); ?>
<?php
$relatorios_delete->showMessage();
?>
<form name="frelatoriosdelete" id="frelatoriosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorios_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorios_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorios">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($relatorios_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($relatorios->id_relatorios->Visible) { // id_relatorios ?>
		<th class="<?php echo $relatorios->id_relatorios->headerCellClass() ?>"><span id="elh_relatorios_id_relatorios" class="relatorios_id_relatorios"><?php echo $relatorios->id_relatorios->caption() ?></span></th>
<?php } ?>
<?php if ($relatorios->descricao_relatorios->Visible) { // descricao_relatorios ?>
		<th class="<?php echo $relatorios->descricao_relatorios->headerCellClass() ?>"><span id="elh_relatorios_descricao_relatorios" class="relatorios_descricao_relatorios"><?php echo $relatorios->descricao_relatorios->caption() ?></span></th>
<?php } ?>
<?php if ($relatorios->tabela_relatorios->Visible) { // tabela_relatorios ?>
		<th class="<?php echo $relatorios->tabela_relatorios->headerCellClass() ?>"><span id="elh_relatorios_tabela_relatorios" class="relatorios_tabela_relatorios"><?php echo $relatorios->tabela_relatorios->caption() ?></span></th>
<?php } ?>
<?php if ($relatorios->bool_filtro_ativo_relatorios->Visible) { // bool_filtro_ativo_relatorios ?>
		<th class="<?php echo $relatorios->bool_filtro_ativo_relatorios->headerCellClass() ?>"><span id="elh_relatorios_bool_filtro_ativo_relatorios" class="relatorios_bool_filtro_ativo_relatorios"><?php echo $relatorios->bool_filtro_ativo_relatorios->caption() ?></span></th>
<?php } ?>
<?php if ($relatorios->data_atualizacao_relatorios->Visible) { // data_atualizacao_relatorios ?>
		<th class="<?php echo $relatorios->data_atualizacao_relatorios->headerCellClass() ?>"><span id="elh_relatorios_data_atualizacao_relatorios" class="relatorios_data_atualizacao_relatorios"><?php echo $relatorios->data_atualizacao_relatorios->caption() ?></span></th>
<?php } ?>
<?php if ($relatorios->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $relatorios->usuario_id->headerCellClass() ?>"><span id="elh_relatorios_usuario_id" class="relatorios_usuario_id"><?php echo $relatorios->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($relatorios->bool_emitir_relatorios->Visible) { // bool_emitir_relatorios ?>
		<th class="<?php echo $relatorios->bool_emitir_relatorios->headerCellClass() ?>"><span id="elh_relatorios_bool_emitir_relatorios" class="relatorios_bool_emitir_relatorios"><?php echo $relatorios->bool_emitir_relatorios->caption() ?></span></th>
<?php } ?>
<?php if ($relatorios->bool_ativo_relatorios->Visible) { // bool_ativo_relatorios ?>
		<th class="<?php echo $relatorios->bool_ativo_relatorios->headerCellClass() ?>"><span id="elh_relatorios_bool_ativo_relatorios" class="relatorios_bool_ativo_relatorios"><?php echo $relatorios->bool_ativo_relatorios->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$relatorios_delete->RecCnt = 0;
$i = 0;
while (!$relatorios_delete->Recordset->EOF) {
	$relatorios_delete->RecCnt++;
	$relatorios_delete->RowCnt++;

	// Set row properties
	$relatorios->resetAttributes();
	$relatorios->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$relatorios_delete->loadRowValues($relatorios_delete->Recordset);

	// Render row
	$relatorios_delete->renderRow();
?>
	<tr<?php echo $relatorios->rowAttributes() ?>>
<?php if ($relatorios->id_relatorios->Visible) { // id_relatorios ?>
		<td<?php echo $relatorios->id_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_id_relatorios" class="relatorios_id_relatorios">
<span<?php echo $relatorios->id_relatorios->viewAttributes() ?>>
<?php echo $relatorios->id_relatorios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorios->descricao_relatorios->Visible) { // descricao_relatorios ?>
		<td<?php echo $relatorios->descricao_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_descricao_relatorios" class="relatorios_descricao_relatorios">
<span<?php echo $relatorios->descricao_relatorios->viewAttributes() ?>>
<?php echo $relatorios->descricao_relatorios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorios->tabela_relatorios->Visible) { // tabela_relatorios ?>
		<td<?php echo $relatorios->tabela_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_tabela_relatorios" class="relatorios_tabela_relatorios">
<span<?php echo $relatorios->tabela_relatorios->viewAttributes() ?>>
<?php echo $relatorios->tabela_relatorios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorios->bool_filtro_ativo_relatorios->Visible) { // bool_filtro_ativo_relatorios ?>
		<td<?php echo $relatorios->bool_filtro_ativo_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_bool_filtro_ativo_relatorios" class="relatorios_bool_filtro_ativo_relatorios">
<span<?php echo $relatorios->bool_filtro_ativo_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_filtro_ativo_relatorios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorios->data_atualizacao_relatorios->Visible) { // data_atualizacao_relatorios ?>
		<td<?php echo $relatorios->data_atualizacao_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_data_atualizacao_relatorios" class="relatorios_data_atualizacao_relatorios">
<span<?php echo $relatorios->data_atualizacao_relatorios->viewAttributes() ?>>
<?php echo $relatorios->data_atualizacao_relatorios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorios->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $relatorios->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_usuario_id" class="relatorios_usuario_id">
<span<?php echo $relatorios->usuario_id->viewAttributes() ?>>
<?php echo $relatorios->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorios->bool_emitir_relatorios->Visible) { // bool_emitir_relatorios ?>
		<td<?php echo $relatorios->bool_emitir_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_bool_emitir_relatorios" class="relatorios_bool_emitir_relatorios">
<span<?php echo $relatorios->bool_emitir_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_emitir_relatorios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorios->bool_ativo_relatorios->Visible) { // bool_ativo_relatorios ?>
		<td<?php echo $relatorios->bool_ativo_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_delete->RowCnt ?>_relatorios_bool_ativo_relatorios" class="relatorios_bool_ativo_relatorios">
<span<?php echo $relatorios->bool_ativo_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_ativo_relatorios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$relatorios_delete->Recordset->moveNext();
}
$relatorios_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $relatorios_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$relatorios_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$relatorios_delete->terminate();
?>
