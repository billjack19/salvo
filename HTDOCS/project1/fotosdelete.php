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
$fotos_delete = new fotos_delete();

// Run the page
$fotos_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$fotos_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ffotosdelete = currentForm = new ew.Form("ffotosdelete", "delete");

// Form_CustomValidate event
ffotosdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ffotosdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $fotos_delete->showPageHeader(); ?>
<?php
$fotos_delete->showMessage();
?>
<form name="ffotosdelete" id="ffotosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($fotos_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $fotos_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="fotos">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($fotos_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($fotos->id_fotos->Visible) { // id_fotos ?>
		<th class="<?php echo $fotos->id_fotos->headerCellClass() ?>"><span id="elh_fotos_id_fotos" class="fotos_id_fotos"><?php echo $fotos->id_fotos->caption() ?></span></th>
<?php } ?>
<?php if ($fotos->descricao_fotos->Visible) { // descricao_fotos ?>
		<th class="<?php echo $fotos->descricao_fotos->headerCellClass() ?>"><span id="elh_fotos_descricao_fotos" class="fotos_descricao_fotos"><?php echo $fotos->descricao_fotos->caption() ?></span></th>
<?php } ?>
<?php if ($fotos->imagem_fotos->Visible) { // imagem_fotos ?>
		<th class="<?php echo $fotos->imagem_fotos->headerCellClass() ?>"><span id="elh_fotos_imagem_fotos" class="fotos_imagem_fotos"><?php echo $fotos->imagem_fotos->caption() ?></span></th>
<?php } ?>
<?php if ($fotos->item_id->Visible) { // item_id ?>
		<th class="<?php echo $fotos->item_id->headerCellClass() ?>"><span id="elh_fotos_item_id" class="fotos_item_id"><?php echo $fotos->item_id->caption() ?></span></th>
<?php } ?>
<?php if ($fotos->data_atualizacao_fotos->Visible) { // data_atualizacao_fotos ?>
		<th class="<?php echo $fotos->data_atualizacao_fotos->headerCellClass() ?>"><span id="elh_fotos_data_atualizacao_fotos" class="fotos_data_atualizacao_fotos"><?php echo $fotos->data_atualizacao_fotos->caption() ?></span></th>
<?php } ?>
<?php if ($fotos->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $fotos->usuario_id->headerCellClass() ?>"><span id="elh_fotos_usuario_id" class="fotos_usuario_id"><?php echo $fotos->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($fotos->bool_ativo_fotos->Visible) { // bool_ativo_fotos ?>
		<th class="<?php echo $fotos->bool_ativo_fotos->headerCellClass() ?>"><span id="elh_fotos_bool_ativo_fotos" class="fotos_bool_ativo_fotos"><?php echo $fotos->bool_ativo_fotos->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$fotos_delete->RecCnt = 0;
$i = 0;
while (!$fotos_delete->Recordset->EOF) {
	$fotos_delete->RecCnt++;
	$fotos_delete->RowCnt++;

	// Set row properties
	$fotos->resetAttributes();
	$fotos->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$fotos_delete->loadRowValues($fotos_delete->Recordset);

	// Render row
	$fotos_delete->renderRow();
?>
	<tr<?php echo $fotos->rowAttributes() ?>>
<?php if ($fotos->id_fotos->Visible) { // id_fotos ?>
		<td<?php echo $fotos->id_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_delete->RowCnt ?>_fotos_id_fotos" class="fotos_id_fotos">
<span<?php echo $fotos->id_fotos->viewAttributes() ?>>
<?php echo $fotos->id_fotos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($fotos->descricao_fotos->Visible) { // descricao_fotos ?>
		<td<?php echo $fotos->descricao_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_delete->RowCnt ?>_fotos_descricao_fotos" class="fotos_descricao_fotos">
<span<?php echo $fotos->descricao_fotos->viewAttributes() ?>>
<?php echo $fotos->descricao_fotos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($fotos->imagem_fotos->Visible) { // imagem_fotos ?>
		<td<?php echo $fotos->imagem_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_delete->RowCnt ?>_fotos_imagem_fotos" class="fotos_imagem_fotos">
<span<?php echo $fotos->imagem_fotos->viewAttributes() ?>>
<?php echo $fotos->imagem_fotos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($fotos->item_id->Visible) { // item_id ?>
		<td<?php echo $fotos->item_id->cellAttributes() ?>>
<span id="el<?php echo $fotos_delete->RowCnt ?>_fotos_item_id" class="fotos_item_id">
<span<?php echo $fotos->item_id->viewAttributes() ?>>
<?php echo $fotos->item_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($fotos->data_atualizacao_fotos->Visible) { // data_atualizacao_fotos ?>
		<td<?php echo $fotos->data_atualizacao_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_delete->RowCnt ?>_fotos_data_atualizacao_fotos" class="fotos_data_atualizacao_fotos">
<span<?php echo $fotos->data_atualizacao_fotos->viewAttributes() ?>>
<?php echo $fotos->data_atualizacao_fotos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($fotos->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $fotos->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $fotos_delete->RowCnt ?>_fotos_usuario_id" class="fotos_usuario_id">
<span<?php echo $fotos->usuario_id->viewAttributes() ?>>
<?php echo $fotos->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($fotos->bool_ativo_fotos->Visible) { // bool_ativo_fotos ?>
		<td<?php echo $fotos->bool_ativo_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_delete->RowCnt ?>_fotos_bool_ativo_fotos" class="fotos_bool_ativo_fotos">
<span<?php echo $fotos->bool_ativo_fotos->viewAttributes() ?>>
<?php echo $fotos->bool_ativo_fotos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$fotos_delete->Recordset->moveNext();
}
$fotos_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $fotos_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$fotos_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$fotos_delete->terminate();
?>
