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
$empresa_delete = new empresa_delete();

// Run the page
$empresa_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$empresa_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fempresadelete = currentForm = new ew.Form("fempresadelete", "delete");

// Form_CustomValidate event
fempresadelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fempresadelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $empresa_delete->showPageHeader(); ?>
<?php
$empresa_delete->showMessage();
?>
<form name="fempresadelete" id="fempresadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($empresa_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $empresa_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="empresa">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($empresa_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($empresa->id_empresa->Visible) { // id_empresa ?>
		<th class="<?php echo $empresa->id_empresa->headerCellClass() ?>"><span id="elh_empresa_id_empresa" class="empresa_id_empresa"><?php echo $empresa->id_empresa->caption() ?></span></th>
<?php } ?>
<?php if ($empresa->descricao_empresa->Visible) { // descricao_empresa ?>
		<th class="<?php echo $empresa->descricao_empresa->headerCellClass() ?>"><span id="elh_empresa_descricao_empresa" class="empresa_descricao_empresa"><?php echo $empresa->descricao_empresa->caption() ?></span></th>
<?php } ?>
<?php if ($empresa->imagem_logo_empresa->Visible) { // imagem_logo_empresa ?>
		<th class="<?php echo $empresa->imagem_logo_empresa->headerCellClass() ?>"><span id="elh_empresa_imagem_logo_empresa" class="empresa_imagem_logo_empresa"><?php echo $empresa->imagem_logo_empresa->caption() ?></span></th>
<?php } ?>
<?php if ($empresa->data_atualizacao_empresa->Visible) { // data_atualizacao_empresa ?>
		<th class="<?php echo $empresa->data_atualizacao_empresa->headerCellClass() ?>"><span id="elh_empresa_data_atualizacao_empresa" class="empresa_data_atualizacao_empresa"><?php echo $empresa->data_atualizacao_empresa->caption() ?></span></th>
<?php } ?>
<?php if ($empresa->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $empresa->usuario_id->headerCellClass() ?>"><span id="elh_empresa_usuario_id" class="empresa_usuario_id"><?php echo $empresa->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($empresa->bool_ativo_empresa->Visible) { // bool_ativo_empresa ?>
		<th class="<?php echo $empresa->bool_ativo_empresa->headerCellClass() ?>"><span id="elh_empresa_bool_ativo_empresa" class="empresa_bool_ativo_empresa"><?php echo $empresa->bool_ativo_empresa->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$empresa_delete->RecCnt = 0;
$i = 0;
while (!$empresa_delete->Recordset->EOF) {
	$empresa_delete->RecCnt++;
	$empresa_delete->RowCnt++;

	// Set row properties
	$empresa->resetAttributes();
	$empresa->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$empresa_delete->loadRowValues($empresa_delete->Recordset);

	// Render row
	$empresa_delete->renderRow();
?>
	<tr<?php echo $empresa->rowAttributes() ?>>
<?php if ($empresa->id_empresa->Visible) { // id_empresa ?>
		<td<?php echo $empresa->id_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_delete->RowCnt ?>_empresa_id_empresa" class="empresa_id_empresa">
<span<?php echo $empresa->id_empresa->viewAttributes() ?>>
<?php echo $empresa->id_empresa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($empresa->descricao_empresa->Visible) { // descricao_empresa ?>
		<td<?php echo $empresa->descricao_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_delete->RowCnt ?>_empresa_descricao_empresa" class="empresa_descricao_empresa">
<span<?php echo $empresa->descricao_empresa->viewAttributes() ?>>
<?php echo $empresa->descricao_empresa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($empresa->imagem_logo_empresa->Visible) { // imagem_logo_empresa ?>
		<td<?php echo $empresa->imagem_logo_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_delete->RowCnt ?>_empresa_imagem_logo_empresa" class="empresa_imagem_logo_empresa">
<span<?php echo $empresa->imagem_logo_empresa->viewAttributes() ?>>
<?php echo $empresa->imagem_logo_empresa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($empresa->data_atualizacao_empresa->Visible) { // data_atualizacao_empresa ?>
		<td<?php echo $empresa->data_atualizacao_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_delete->RowCnt ?>_empresa_data_atualizacao_empresa" class="empresa_data_atualizacao_empresa">
<span<?php echo $empresa->data_atualizacao_empresa->viewAttributes() ?>>
<?php echo $empresa->data_atualizacao_empresa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($empresa->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $empresa->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $empresa_delete->RowCnt ?>_empresa_usuario_id" class="empresa_usuario_id">
<span<?php echo $empresa->usuario_id->viewAttributes() ?>>
<?php echo $empresa->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($empresa->bool_ativo_empresa->Visible) { // bool_ativo_empresa ?>
		<td<?php echo $empresa->bool_ativo_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_delete->RowCnt ?>_empresa_bool_ativo_empresa" class="empresa_bool_ativo_empresa">
<span<?php echo $empresa->bool_ativo_empresa->viewAttributes() ?>>
<?php echo $empresa->bool_ativo_empresa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$empresa_delete->Recordset->moveNext();
}
$empresa_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $empresa_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$empresa_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$empresa_delete->terminate();
?>
