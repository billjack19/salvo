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
$item_orcamento_delete = new item_orcamento_delete();

// Run the page
$item_orcamento_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_orcamento_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fitem_orcamentodelete = currentForm = new ew.Form("fitem_orcamentodelete", "delete");

// Form_CustomValidate event
fitem_orcamentodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitem_orcamentodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $item_orcamento_delete->showPageHeader(); ?>
<?php
$item_orcamento_delete->showMessage();
?>
<form name="fitem_orcamentodelete" id="fitem_orcamentodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_orcamento_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_orcamento_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item_orcamento">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($item_orcamento_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($item_orcamento->id_item_orcamento->Visible) { // id_item_orcamento ?>
		<th class="<?php echo $item_orcamento->id_item_orcamento->headerCellClass() ?>"><span id="elh_item_orcamento_id_item_orcamento" class="item_orcamento_id_item_orcamento"><?php echo $item_orcamento->id_item_orcamento->caption() ?></span></th>
<?php } ?>
<?php if ($item_orcamento->data_lanc_item_orcamento->Visible) { // data_lanc_item_orcamento ?>
		<th class="<?php echo $item_orcamento->data_lanc_item_orcamento->headerCellClass() ?>"><span id="elh_item_orcamento_data_lanc_item_orcamento" class="item_orcamento_data_lanc_item_orcamento"><?php echo $item_orcamento->data_lanc_item_orcamento->caption() ?></span></th>
<?php } ?>
<?php if ($item_orcamento->orcamento_id->Visible) { // orcamento_id ?>
		<th class="<?php echo $item_orcamento->orcamento_id->headerCellClass() ?>"><span id="elh_item_orcamento_orcamento_id" class="item_orcamento_orcamento_id"><?php echo $item_orcamento->orcamento_id->caption() ?></span></th>
<?php } ?>
<?php if ($item_orcamento->item_id->Visible) { // item_id ?>
		<th class="<?php echo $item_orcamento->item_id->headerCellClass() ?>"><span id="elh_item_orcamento_item_id" class="item_orcamento_item_id"><?php echo $item_orcamento->item_id->caption() ?></span></th>
<?php } ?>
<?php if ($item_orcamento->quantidade_item_orcamento->Visible) { // quantidade_item_orcamento ?>
		<th class="<?php echo $item_orcamento->quantidade_item_orcamento->headerCellClass() ?>"><span id="elh_item_orcamento_quantidade_item_orcamento" class="item_orcamento_quantidade_item_orcamento"><?php echo $item_orcamento->quantidade_item_orcamento->caption() ?></span></th>
<?php } ?>
<?php if ($item_orcamento->total_item_orcamento->Visible) { // total_item_orcamento ?>
		<th class="<?php echo $item_orcamento->total_item_orcamento->headerCellClass() ?>"><span id="elh_item_orcamento_total_item_orcamento" class="item_orcamento_total_item_orcamento"><?php echo $item_orcamento->total_item_orcamento->caption() ?></span></th>
<?php } ?>
<?php if ($item_orcamento->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $item_orcamento->usuario_id->headerCellClass() ?>"><span id="elh_item_orcamento_usuario_id" class="item_orcamento_usuario_id"><?php echo $item_orcamento->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($item_orcamento->bool_ativo_item_orcamento->Visible) { // bool_ativo_item_orcamento ?>
		<th class="<?php echo $item_orcamento->bool_ativo_item_orcamento->headerCellClass() ?>"><span id="elh_item_orcamento_bool_ativo_item_orcamento" class="item_orcamento_bool_ativo_item_orcamento"><?php echo $item_orcamento->bool_ativo_item_orcamento->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$item_orcamento_delete->RecCnt = 0;
$i = 0;
while (!$item_orcamento_delete->Recordset->EOF) {
	$item_orcamento_delete->RecCnt++;
	$item_orcamento_delete->RowCnt++;

	// Set row properties
	$item_orcamento->resetAttributes();
	$item_orcamento->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$item_orcamento_delete->loadRowValues($item_orcamento_delete->Recordset);

	// Render row
	$item_orcamento_delete->renderRow();
?>
	<tr<?php echo $item_orcamento->rowAttributes() ?>>
<?php if ($item_orcamento->id_item_orcamento->Visible) { // id_item_orcamento ?>
		<td<?php echo $item_orcamento->id_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_id_item_orcamento" class="item_orcamento_id_item_orcamento">
<span<?php echo $item_orcamento->id_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->id_item_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item_orcamento->data_lanc_item_orcamento->Visible) { // data_lanc_item_orcamento ?>
		<td<?php echo $item_orcamento->data_lanc_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_data_lanc_item_orcamento" class="item_orcamento_data_lanc_item_orcamento">
<span<?php echo $item_orcamento->data_lanc_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->data_lanc_item_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item_orcamento->orcamento_id->Visible) { // orcamento_id ?>
		<td<?php echo $item_orcamento->orcamento_id->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_orcamento_id" class="item_orcamento_orcamento_id">
<span<?php echo $item_orcamento->orcamento_id->viewAttributes() ?>>
<?php echo $item_orcamento->orcamento_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item_orcamento->item_id->Visible) { // item_id ?>
		<td<?php echo $item_orcamento->item_id->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_item_id" class="item_orcamento_item_id">
<span<?php echo $item_orcamento->item_id->viewAttributes() ?>>
<?php echo $item_orcamento->item_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item_orcamento->quantidade_item_orcamento->Visible) { // quantidade_item_orcamento ?>
		<td<?php echo $item_orcamento->quantidade_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_quantidade_item_orcamento" class="item_orcamento_quantidade_item_orcamento">
<span<?php echo $item_orcamento->quantidade_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->quantidade_item_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item_orcamento->total_item_orcamento->Visible) { // total_item_orcamento ?>
		<td<?php echo $item_orcamento->total_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_total_item_orcamento" class="item_orcamento_total_item_orcamento">
<span<?php echo $item_orcamento->total_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->total_item_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item_orcamento->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $item_orcamento->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_usuario_id" class="item_orcamento_usuario_id">
<span<?php echo $item_orcamento->usuario_id->viewAttributes() ?>>
<?php echo $item_orcamento->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($item_orcamento->bool_ativo_item_orcamento->Visible) { // bool_ativo_item_orcamento ?>
		<td<?php echo $item_orcamento->bool_ativo_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_delete->RowCnt ?>_item_orcamento_bool_ativo_item_orcamento" class="item_orcamento_bool_ativo_item_orcamento">
<span<?php echo $item_orcamento->bool_ativo_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->bool_ativo_item_orcamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$item_orcamento_delete->Recordset->moveNext();
}
$item_orcamento_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $item_orcamento_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$item_orcamento_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$item_orcamento_delete->terminate();
?>
