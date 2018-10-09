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
$item_delete = new item_delete();

// Run the page
$item_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fitemdelete = currentForm = new ew.Form("fitemdelete", "delete");

// Form_CustomValidate event
fitemdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitemdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $item_delete->showPageHeader(); ?>
<?php
$item_delete->showMessage();
?>
<form name="fitemdelete" id="fitemdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($item_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($item->id_item->Visible) { // id_item ?>
		<th class="<?php echo $item->id_item->headerCellClass() ?>"><span id="elh_item_id_item" class="item_id_item"><?php echo $item->id_item->caption() ?></span></th>
<?php } ?>
<?php if ($item->imagem_item->Visible) { // imagem_item ?>
		<th class="<?php echo $item->imagem_item->headerCellClass() ?>"><span id="elh_item_imagem_item" class="item_imagem_item"><?php echo $item->imagem_item->caption() ?></span></th>
<?php } ?>
<?php if ($item->numero_item->Visible) { // numero_item ?>
		<th class="<?php echo $item->numero_item->headerCellClass() ?>"><span id="elh_item_numero_item" class="item_numero_item"><?php echo $item->numero_item->caption() ?></span></th>
<?php } ?>
<?php if ($item->bairro_item->Visible) { // bairro_item ?>
		<th class="<?php echo $item->bairro_item->headerCellClass() ?>"><span id="elh_item_bairro_item" class="item_bairro_item"><?php echo $item->bairro_item->caption() ?></span></th>
<?php } ?>
<?php if ($item->cidade_item->Visible) { // cidade_item ?>
		<th class="<?php echo $item->cidade_item->headerCellClass() ?>"><span id="elh_item_cidade_item" class="item_cidade_item"><?php echo $item->cidade_item->caption() ?></span></th>
<?php } ?>
<?php if ($item->estado_id->Visible) { // estado_id ?>
		<th class="<?php echo $item->estado_id->headerCellClass() ?>"><span id="elh_item_estado_id" class="item_estado_id"><?php echo $item->estado_id->caption() ?></span></th>
<?php } ?>
<?php if ($item->situacao_id->Visible) { // situacao_id ?>
		<th class="<?php echo $item->situacao_id->headerCellClass() ?>"><span id="elh_item_situacao_id" class="item_situacao_id"><?php echo $item->situacao_id->caption() ?></span></th>
<?php } ?>
<?php if ($item->grupo_id->Visible) { // grupo_id ?>
		<th class="<?php echo $item->grupo_id->headerCellClass() ?>"><span id="elh_item_grupo_id" class="item_grupo_id"><?php echo $item->grupo_id->caption() ?></span></th>
<?php } ?>
<?php if ($item->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $item->usuario_id->headerCellClass() ?>"><span id="elh_item_usuario_id" class="item_usuario_id"><?php echo $item->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($item->bool_ativo_item->Visible) { // bool_ativo_item ?>
		<th class="<?php echo $item->bool_ativo_item->headerCellClass() ?>"><span id="elh_item_bool_ativo_item" class="item_bool_ativo_item"><?php echo $item->bool_ativo_item->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$item_delete->RecCnt = 0;
$i = 0;
while (!$item_delete->Recordset->EOF) {
	$item_delete->RecCnt++;
	$item_delete->RowCnt++;

	// Set row properties
	$item->resetAttributes();
	$item->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$item_delete->loadRowValues($item_delete->Recordset);

	// Render row
	$item_delete->renderRow();
?>
	<tr<?php echo $item->rowAttributes() ?>>
<?php if ($item->id_item->Visible) { // id_item ?>
		<td<?php echo $item->id_item->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_id_item" class="item_id_item">
<span<?php echo $item->id_item->viewAttributes() ?>>
<?php echo $item->id_item->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->imagem_item->Visible) { // imagem_item ?>
		<td<?php echo $item->imagem_item->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_imagem_item" class="item_imagem_item">
<span<?php echo $item->imagem_item->viewAttributes() ?>>
<?php echo $item->imagem_item->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->numero_item->Visible) { // numero_item ?>
		<td<?php echo $item->numero_item->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_numero_item" class="item_numero_item">
<span<?php echo $item->numero_item->viewAttributes() ?>>
<?php echo $item->numero_item->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->bairro_item->Visible) { // bairro_item ?>
		<td<?php echo $item->bairro_item->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_bairro_item" class="item_bairro_item">
<span<?php echo $item->bairro_item->viewAttributes() ?>>
<?php echo $item->bairro_item->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->cidade_item->Visible) { // cidade_item ?>
		<td<?php echo $item->cidade_item->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_cidade_item" class="item_cidade_item">
<span<?php echo $item->cidade_item->viewAttributes() ?>>
<?php echo $item->cidade_item->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->estado_id->Visible) { // estado_id ?>
		<td<?php echo $item->estado_id->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_estado_id" class="item_estado_id">
<span<?php echo $item->estado_id->viewAttributes() ?>>
<?php echo $item->estado_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->situacao_id->Visible) { // situacao_id ?>
		<td<?php echo $item->situacao_id->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_situacao_id" class="item_situacao_id">
<span<?php echo $item->situacao_id->viewAttributes() ?>>
<?php echo $item->situacao_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->grupo_id->Visible) { // grupo_id ?>
		<td<?php echo $item->grupo_id->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_grupo_id" class="item_grupo_id">
<span<?php echo $item->grupo_id->viewAttributes() ?>>
<?php echo $item->grupo_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $item->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_usuario_id" class="item_usuario_id">
<span<?php echo $item->usuario_id->viewAttributes() ?>>
<?php echo $item->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item->bool_ativo_item->Visible) { // bool_ativo_item ?>
		<td<?php echo $item->bool_ativo_item->cellAttributes() ?>>
<span id="el<?php echo $item_delete->RowCnt ?>_item_bool_ativo_item" class="item_bool_ativo_item">
<span<?php echo $item->bool_ativo_item->viewAttributes() ?>>
<?php echo $item->bool_ativo_item->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$item_delete->Recordset->moveNext();
}
$item_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $item_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$item_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$item_delete->terminate();
?>
