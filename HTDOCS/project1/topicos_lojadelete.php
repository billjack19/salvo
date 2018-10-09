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
$topicos_loja_delete = new topicos_loja_delete();

// Run the page
$topicos_loja_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$topicos_loja_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftopicos_lojadelete = currentForm = new ew.Form("ftopicos_lojadelete", "delete");

// Form_CustomValidate event
ftopicos_lojadelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftopicos_lojadelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $topicos_loja_delete->showPageHeader(); ?>
<?php
$topicos_loja_delete->showMessage();
?>
<form name="ftopicos_lojadelete" id="ftopicos_lojadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($topicos_loja_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $topicos_loja_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="topicos_loja">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($topicos_loja_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($topicos_loja->id_topicos_loja->Visible) { // id_topicos_loja ?>
		<th class="<?php echo $topicos_loja->id_topicos_loja->headerCellClass() ?>"><span id="elh_topicos_loja_id_topicos_loja" class="topicos_loja_id_topicos_loja"><?php echo $topicos_loja->id_topicos_loja->caption() ?></span></th>
<?php } ?>
<?php if ($topicos_loja->titulo_topicos_loja->Visible) { // titulo_topicos_loja ?>
		<th class="<?php echo $topicos_loja->titulo_topicos_loja->headerCellClass() ?>"><span id="elh_topicos_loja_titulo_topicos_loja" class="topicos_loja_titulo_topicos_loja"><?php echo $topicos_loja->titulo_topicos_loja->caption() ?></span></th>
<?php } ?>
<?php if ($topicos_loja->descricao_topicos_loja->Visible) { // descricao_topicos_loja ?>
		<th class="<?php echo $topicos_loja->descricao_topicos_loja->headerCellClass() ?>"><span id="elh_topicos_loja_descricao_topicos_loja" class="topicos_loja_descricao_topicos_loja"><?php echo $topicos_loja->descricao_topicos_loja->caption() ?></span></th>
<?php } ?>
<?php if ($topicos_loja->loja_id->Visible) { // loja_id ?>
		<th class="<?php echo $topicos_loja->loja_id->headerCellClass() ?>"><span id="elh_topicos_loja_loja_id" class="topicos_loja_loja_id"><?php echo $topicos_loja->loja_id->caption() ?></span></th>
<?php } ?>
<?php if ($topicos_loja->data_atualizacao_topicos_loja->Visible) { // data_atualizacao_topicos_loja ?>
		<th class="<?php echo $topicos_loja->data_atualizacao_topicos_loja->headerCellClass() ?>"><span id="elh_topicos_loja_data_atualizacao_topicos_loja" class="topicos_loja_data_atualizacao_topicos_loja"><?php echo $topicos_loja->data_atualizacao_topicos_loja->caption() ?></span></th>
<?php } ?>
<?php if ($topicos_loja->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $topicos_loja->usuario_id->headerCellClass() ?>"><span id="elh_topicos_loja_usuario_id" class="topicos_loja_usuario_id"><?php echo $topicos_loja->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($topicos_loja->bool_ativo_topicos_loja->Visible) { // bool_ativo_topicos_loja ?>
		<th class="<?php echo $topicos_loja->bool_ativo_topicos_loja->headerCellClass() ?>"><span id="elh_topicos_loja_bool_ativo_topicos_loja" class="topicos_loja_bool_ativo_topicos_loja"><?php echo $topicos_loja->bool_ativo_topicos_loja->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$topicos_loja_delete->RecCnt = 0;
$i = 0;
while (!$topicos_loja_delete->Recordset->EOF) {
	$topicos_loja_delete->RecCnt++;
	$topicos_loja_delete->RowCnt++;

	// Set row properties
	$topicos_loja->resetAttributes();
	$topicos_loja->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$topicos_loja_delete->loadRowValues($topicos_loja_delete->Recordset);

	// Render row
	$topicos_loja_delete->renderRow();
?>
	<tr<?php echo $topicos_loja->rowAttributes() ?>>
<?php if ($topicos_loja->id_topicos_loja->Visible) { // id_topicos_loja ?>
		<td<?php echo $topicos_loja->id_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_delete->RowCnt ?>_topicos_loja_id_topicos_loja" class="topicos_loja_id_topicos_loja">
<span<?php echo $topicos_loja->id_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->id_topicos_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($topicos_loja->titulo_topicos_loja->Visible) { // titulo_topicos_loja ?>
		<td<?php echo $topicos_loja->titulo_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_delete->RowCnt ?>_topicos_loja_titulo_topicos_loja" class="topicos_loja_titulo_topicos_loja">
<span<?php echo $topicos_loja->titulo_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->titulo_topicos_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($topicos_loja->descricao_topicos_loja->Visible) { // descricao_topicos_loja ?>
		<td<?php echo $topicos_loja->descricao_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_delete->RowCnt ?>_topicos_loja_descricao_topicos_loja" class="topicos_loja_descricao_topicos_loja">
<span<?php echo $topicos_loja->descricao_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->descricao_topicos_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($topicos_loja->loja_id->Visible) { // loja_id ?>
		<td<?php echo $topicos_loja->loja_id->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_delete->RowCnt ?>_topicos_loja_loja_id" class="topicos_loja_loja_id">
<span<?php echo $topicos_loja->loja_id->viewAttributes() ?>>
<?php echo $topicos_loja->loja_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($topicos_loja->data_atualizacao_topicos_loja->Visible) { // data_atualizacao_topicos_loja ?>
		<td<?php echo $topicos_loja->data_atualizacao_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_delete->RowCnt ?>_topicos_loja_data_atualizacao_topicos_loja" class="topicos_loja_data_atualizacao_topicos_loja">
<span<?php echo $topicos_loja->data_atualizacao_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->data_atualizacao_topicos_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($topicos_loja->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $topicos_loja->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_delete->RowCnt ?>_topicos_loja_usuario_id" class="topicos_loja_usuario_id">
<span<?php echo $topicos_loja->usuario_id->viewAttributes() ?>>
<?php echo $topicos_loja->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($topicos_loja->bool_ativo_topicos_loja->Visible) { // bool_ativo_topicos_loja ?>
		<td<?php echo $topicos_loja->bool_ativo_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_delete->RowCnt ?>_topicos_loja_bool_ativo_topicos_loja" class="topicos_loja_bool_ativo_topicos_loja">
<span<?php echo $topicos_loja->bool_ativo_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->bool_ativo_topicos_loja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$topicos_loja_delete->Recordset->moveNext();
}
$topicos_loja_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $topicos_loja_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$topicos_loja_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$topicos_loja_delete->terminate();
?>
