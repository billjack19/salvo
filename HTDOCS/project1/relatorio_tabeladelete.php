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
$relatorio_tabela_delete = new relatorio_tabela_delete();

// Run the page
$relatorio_tabela_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorio_tabela_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var frelatorio_tabeladelete = currentForm = new ew.Form("frelatorio_tabeladelete", "delete");

// Form_CustomValidate event
frelatorio_tabeladelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatorio_tabeladelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $relatorio_tabela_delete->showPageHeader(); ?>
<?php
$relatorio_tabela_delete->showMessage();
?>
<form name="frelatorio_tabeladelete" id="frelatorio_tabeladelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorio_tabela_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorio_tabela_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorio_tabela">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($relatorio_tabela_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($relatorio_tabela->id_relatorio_tabela->Visible) { // id_relatorio_tabela ?>
		<th class="<?php echo $relatorio_tabela->id_relatorio_tabela->headerCellClass() ?>"><span id="elh_relatorio_tabela_id_relatorio_tabela" class="relatorio_tabela_id_relatorio_tabela"><?php echo $relatorio_tabela->id_relatorio_tabela->caption() ?></span></th>
<?php } ?>
<?php if ($relatorio_tabela->descricao_relatorio_tabela->Visible) { // descricao_relatorio_tabela ?>
		<th class="<?php echo $relatorio_tabela->descricao_relatorio_tabela->headerCellClass() ?>"><span id="elh_relatorio_tabela_descricao_relatorio_tabela" class="relatorio_tabela_descricao_relatorio_tabela"><?php echo $relatorio_tabela->descricao_relatorio_tabela->caption() ?></span></th>
<?php } ?>
<?php if ($relatorio_tabela->data_atualizacao_relatorio_tabela->Visible) { // data_atualizacao_relatorio_tabela ?>
		<th class="<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->headerCellClass() ?>"><span id="elh_relatorio_tabela_data_atualizacao_relatorio_tabela" class="relatorio_tabela_data_atualizacao_relatorio_tabela"><?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->caption() ?></span></th>
<?php } ?>
<?php if ($relatorio_tabela->bool_ativo_relatorio_tabela->Visible) { // bool_ativo_relatorio_tabela ?>
		<th class="<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->headerCellClass() ?>"><span id="elh_relatorio_tabela_bool_ativo_relatorio_tabela" class="relatorio_tabela_bool_ativo_relatorio_tabela"><?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$relatorio_tabela_delete->RecCnt = 0;
$i = 0;
while (!$relatorio_tabela_delete->Recordset->EOF) {
	$relatorio_tabela_delete->RecCnt++;
	$relatorio_tabela_delete->RowCnt++;

	// Set row properties
	$relatorio_tabela->resetAttributes();
	$relatorio_tabela->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$relatorio_tabela_delete->loadRowValues($relatorio_tabela_delete->Recordset);

	// Render row
	$relatorio_tabela_delete->renderRow();
?>
	<tr<?php echo $relatorio_tabela->rowAttributes() ?>>
<?php if ($relatorio_tabela->id_relatorio_tabela->Visible) { // id_relatorio_tabela ?>
		<td<?php echo $relatorio_tabela->id_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_delete->RowCnt ?>_relatorio_tabela_id_relatorio_tabela" class="relatorio_tabela_id_relatorio_tabela">
<span<?php echo $relatorio_tabela->id_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->id_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorio_tabela->descricao_relatorio_tabela->Visible) { // descricao_relatorio_tabela ?>
		<td<?php echo $relatorio_tabela->descricao_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_delete->RowCnt ?>_relatorio_tabela_descricao_relatorio_tabela" class="relatorio_tabela_descricao_relatorio_tabela">
<span<?php echo $relatorio_tabela->descricao_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->descricao_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorio_tabela->data_atualizacao_relatorio_tabela->Visible) { // data_atualizacao_relatorio_tabela ?>
		<td<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_delete->RowCnt ?>_relatorio_tabela_data_atualizacao_relatorio_tabela" class="relatorio_tabela_data_atualizacao_relatorio_tabela">
<span<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($relatorio_tabela->bool_ativo_relatorio_tabela->Visible) { // bool_ativo_relatorio_tabela ?>
		<td<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_delete->RowCnt ?>_relatorio_tabela_bool_ativo_relatorio_tabela" class="relatorio_tabela_bool_ativo_relatorio_tabela">
<span<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$relatorio_tabela_delete->Recordset->moveNext();
}
$relatorio_tabela_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $relatorio_tabela_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$relatorio_tabela_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$relatorio_tabela_delete->terminate();
?>
