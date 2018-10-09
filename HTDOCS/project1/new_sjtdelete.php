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
$new_sjt_delete = new new_sjt_delete();

// Run the page
$new_sjt_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$new_sjt_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fnew_sjtdelete = currentForm = new ew.Form("fnew_sjtdelete", "delete");

// Form_CustomValidate event
fnew_sjtdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnew_sjtdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $new_sjt_delete->showPageHeader(); ?>
<?php
$new_sjt_delete->showMessage();
?>
<form name="fnew_sjtdelete" id="fnew_sjtdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($new_sjt_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $new_sjt_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="new_sjt">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($new_sjt_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($new_sjt->id_new_sjt->Visible) { // id_new_sjt ?>
		<th class="<?php echo $new_sjt->id_new_sjt->headerCellClass() ?>"><span id="elh_new_sjt_id_new_sjt" class="new_sjt_id_new_sjt"><?php echo $new_sjt->id_new_sjt->caption() ?></span></th>
<?php } ?>
<?php if ($new_sjt->descricao_new_sjt->Visible) { // descricao_new_sjt ?>
		<th class="<?php echo $new_sjt->descricao_new_sjt->headerCellClass() ?>"><span id="elh_new_sjt_descricao_new_sjt" class="new_sjt_descricao_new_sjt"><?php echo $new_sjt->descricao_new_sjt->caption() ?></span></th>
<?php } ?>
<?php if ($new_sjt->imagem_demonstrativa_new_sjt->Visible) { // imagem_demonstrativa_new_sjt ?>
		<th class="<?php echo $new_sjt->imagem_demonstrativa_new_sjt->headerCellClass() ?>"><span id="elh_new_sjt_imagem_demonstrativa_new_sjt" class="new_sjt_imagem_demonstrativa_new_sjt"><?php echo $new_sjt->imagem_demonstrativa_new_sjt->caption() ?></span></th>
<?php } ?>
<?php if ($new_sjt->numero_edicao_new_sjt->Visible) { // numero_edicao_new_sjt ?>
		<th class="<?php echo $new_sjt->numero_edicao_new_sjt->headerCellClass() ?>"><span id="elh_new_sjt_numero_edicao_new_sjt" class="new_sjt_numero_edicao_new_sjt"><?php echo $new_sjt->numero_edicao_new_sjt->caption() ?></span></th>
<?php } ?>
<?php if ($new_sjt->data_atualizacao_new_sjt->Visible) { // data_atualizacao_new_sjt ?>
		<th class="<?php echo $new_sjt->data_atualizacao_new_sjt->headerCellClass() ?>"><span id="elh_new_sjt_data_atualizacao_new_sjt" class="new_sjt_data_atualizacao_new_sjt"><?php echo $new_sjt->data_atualizacao_new_sjt->caption() ?></span></th>
<?php } ?>
<?php if ($new_sjt->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $new_sjt->usuario_id->headerCellClass() ?>"><span id="elh_new_sjt_usuario_id" class="new_sjt_usuario_id"><?php echo $new_sjt->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($new_sjt->bool_ativo_new_sjt->Visible) { // bool_ativo_new_sjt ?>
		<th class="<?php echo $new_sjt->bool_ativo_new_sjt->headerCellClass() ?>"><span id="elh_new_sjt_bool_ativo_new_sjt" class="new_sjt_bool_ativo_new_sjt"><?php echo $new_sjt->bool_ativo_new_sjt->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$new_sjt_delete->RecCnt = 0;
$i = 0;
while (!$new_sjt_delete->Recordset->EOF) {
	$new_sjt_delete->RecCnt++;
	$new_sjt_delete->RowCnt++;

	// Set row properties
	$new_sjt->resetAttributes();
	$new_sjt->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$new_sjt_delete->loadRowValues($new_sjt_delete->Recordset);

	// Render row
	$new_sjt_delete->renderRow();
?>
	<tr<?php echo $new_sjt->rowAttributes() ?>>
<?php if ($new_sjt->id_new_sjt->Visible) { // id_new_sjt ?>
		<td<?php echo $new_sjt->id_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_delete->RowCnt ?>_new_sjt_id_new_sjt" class="new_sjt_id_new_sjt">
<span<?php echo $new_sjt->id_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->id_new_sjt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($new_sjt->descricao_new_sjt->Visible) { // descricao_new_sjt ?>
		<td<?php echo $new_sjt->descricao_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_delete->RowCnt ?>_new_sjt_descricao_new_sjt" class="new_sjt_descricao_new_sjt">
<span<?php echo $new_sjt->descricao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->descricao_new_sjt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($new_sjt->imagem_demonstrativa_new_sjt->Visible) { // imagem_demonstrativa_new_sjt ?>
		<td<?php echo $new_sjt->imagem_demonstrativa_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_delete->RowCnt ?>_new_sjt_imagem_demonstrativa_new_sjt" class="new_sjt_imagem_demonstrativa_new_sjt">
<span<?php echo $new_sjt->imagem_demonstrativa_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->imagem_demonstrativa_new_sjt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($new_sjt->numero_edicao_new_sjt->Visible) { // numero_edicao_new_sjt ?>
		<td<?php echo $new_sjt->numero_edicao_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_delete->RowCnt ?>_new_sjt_numero_edicao_new_sjt" class="new_sjt_numero_edicao_new_sjt">
<span<?php echo $new_sjt->numero_edicao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->numero_edicao_new_sjt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($new_sjt->data_atualizacao_new_sjt->Visible) { // data_atualizacao_new_sjt ?>
		<td<?php echo $new_sjt->data_atualizacao_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_delete->RowCnt ?>_new_sjt_data_atualizacao_new_sjt" class="new_sjt_data_atualizacao_new_sjt">
<span<?php echo $new_sjt->data_atualizacao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->data_atualizacao_new_sjt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($new_sjt->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $new_sjt->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_delete->RowCnt ?>_new_sjt_usuario_id" class="new_sjt_usuario_id">
<span<?php echo $new_sjt->usuario_id->viewAttributes() ?>>
<?php echo $new_sjt->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($new_sjt->bool_ativo_new_sjt->Visible) { // bool_ativo_new_sjt ?>
		<td<?php echo $new_sjt->bool_ativo_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_delete->RowCnt ?>_new_sjt_bool_ativo_new_sjt" class="new_sjt_bool_ativo_new_sjt">
<span<?php echo $new_sjt->bool_ativo_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->bool_ativo_new_sjt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$new_sjt_delete->Recordset->moveNext();
}
$new_sjt_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $new_sjt_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$new_sjt_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$new_sjt_delete->terminate();
?>
