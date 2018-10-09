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
$nivel_acesso_delete = new nivel_acesso_delete();

// Run the page
$nivel_acesso_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$nivel_acesso_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fnivel_acessodelete = currentForm = new ew.Form("fnivel_acessodelete", "delete");

// Form_CustomValidate event
fnivel_acessodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnivel_acessodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $nivel_acesso_delete->showPageHeader(); ?>
<?php
$nivel_acesso_delete->showMessage();
?>
<form name="fnivel_acessodelete" id="fnivel_acessodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($nivel_acesso_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $nivel_acesso_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="nivel_acesso">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($nivel_acesso_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($nivel_acesso->id_nivel_acesso->Visible) { // id_nivel_acesso ?>
		<th class="<?php echo $nivel_acesso->id_nivel_acesso->headerCellClass() ?>"><span id="elh_nivel_acesso_id_nivel_acesso" class="nivel_acesso_id_nivel_acesso"><?php echo $nivel_acesso->id_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($nivel_acesso->descricao_nivel_acesso->Visible) { // descricao_nivel_acesso ?>
		<th class="<?php echo $nivel_acesso->descricao_nivel_acesso->headerCellClass() ?>"><span id="elh_nivel_acesso_descricao_nivel_acesso" class="nivel_acesso_descricao_nivel_acesso"><?php echo $nivel_acesso->descricao_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($nivel_acesso->data_atualizacao_nivel_acesso->Visible) { // data_atualizacao_nivel_acesso ?>
		<th class="<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->headerCellClass() ?>"><span id="elh_nivel_acesso_data_atualizacao_nivel_acesso" class="nivel_acesso_data_atualizacao_nivel_acesso"><?php echo $nivel_acesso->data_atualizacao_nivel_acesso->caption() ?></span></th>
<?php } ?>
<?php if ($nivel_acesso->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $nivel_acesso->usuario_id->headerCellClass() ?>"><span id="elh_nivel_acesso_usuario_id" class="nivel_acesso_usuario_id"><?php echo $nivel_acesso->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($nivel_acesso->bool_ativo_nivel_acesso->Visible) { // bool_ativo_nivel_acesso ?>
		<th class="<?php echo $nivel_acesso->bool_ativo_nivel_acesso->headerCellClass() ?>"><span id="elh_nivel_acesso_bool_ativo_nivel_acesso" class="nivel_acesso_bool_ativo_nivel_acesso"><?php echo $nivel_acesso->bool_ativo_nivel_acesso->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$nivel_acesso_delete->RecCnt = 0;
$i = 0;
while (!$nivel_acesso_delete->Recordset->EOF) {
	$nivel_acesso_delete->RecCnt++;
	$nivel_acesso_delete->RowCnt++;

	// Set row properties
	$nivel_acesso->resetAttributes();
	$nivel_acesso->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$nivel_acesso_delete->loadRowValues($nivel_acesso_delete->Recordset);

	// Render row
	$nivel_acesso_delete->renderRow();
?>
	<tr<?php echo $nivel_acesso->rowAttributes() ?>>
<?php if ($nivel_acesso->id_nivel_acesso->Visible) { // id_nivel_acesso ?>
		<td<?php echo $nivel_acesso->id_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $nivel_acesso_delete->RowCnt ?>_nivel_acesso_id_nivel_acesso" class="nivel_acesso_id_nivel_acesso">
<span<?php echo $nivel_acesso->id_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->id_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($nivel_acesso->descricao_nivel_acesso->Visible) { // descricao_nivel_acesso ?>
		<td<?php echo $nivel_acesso->descricao_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $nivel_acesso_delete->RowCnt ?>_nivel_acesso_descricao_nivel_acesso" class="nivel_acesso_descricao_nivel_acesso">
<span<?php echo $nivel_acesso->descricao_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->descricao_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($nivel_acesso->data_atualizacao_nivel_acesso->Visible) { // data_atualizacao_nivel_acesso ?>
		<td<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $nivel_acesso_delete->RowCnt ?>_nivel_acesso_data_atualizacao_nivel_acesso" class="nivel_acesso_data_atualizacao_nivel_acesso">
<span<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($nivel_acesso->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $nivel_acesso->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $nivel_acesso_delete->RowCnt ?>_nivel_acesso_usuario_id" class="nivel_acesso_usuario_id">
<span<?php echo $nivel_acesso->usuario_id->viewAttributes() ?>>
<?php echo $nivel_acesso->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($nivel_acesso->bool_ativo_nivel_acesso->Visible) { // bool_ativo_nivel_acesso ?>
		<td<?php echo $nivel_acesso->bool_ativo_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $nivel_acesso_delete->RowCnt ?>_nivel_acesso_bool_ativo_nivel_acesso" class="nivel_acesso_bool_ativo_nivel_acesso">
<span<?php echo $nivel_acesso->bool_ativo_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->bool_ativo_nivel_acesso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$nivel_acesso_delete->Recordset->moveNext();
}
$nivel_acesso_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $nivel_acesso_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$nivel_acesso_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$nivel_acesso_delete->terminate();
?>
