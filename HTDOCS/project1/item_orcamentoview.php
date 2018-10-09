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
$item_orcamento_view = new item_orcamento_view();

// Run the page
$item_orcamento_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_orcamento_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$item_orcamento->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fitem_orcamentoview = currentForm = new ew.Form("fitem_orcamentoview", "view");

// Form_CustomValidate event
fitem_orcamentoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitem_orcamentoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$item_orcamento->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $item_orcamento_view->ExportOptions->render("body") ?>
<?php
	foreach ($item_orcamento_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $item_orcamento_view->showPageHeader(); ?>
<?php
$item_orcamento_view->showMessage();
?>
<form name="fitem_orcamentoview" id="fitem_orcamentoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_orcamento_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_orcamento_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item_orcamento">
<input type="hidden" name="modal" value="<?php echo (int)$item_orcamento_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($item_orcamento->id_item_orcamento->Visible) { // id_item_orcamento ?>
	<tr id="r_id_item_orcamento">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_id_item_orcamento"><?php echo $item_orcamento->id_item_orcamento->caption() ?></span></td>
		<td data-name="id_item_orcamento"<?php echo $item_orcamento->id_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_id_item_orcamento">
<span<?php echo $item_orcamento->id_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->id_item_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item_orcamento->data_lanc_item_orcamento->Visible) { // data_lanc_item_orcamento ?>
	<tr id="r_data_lanc_item_orcamento">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_data_lanc_item_orcamento"><?php echo $item_orcamento->data_lanc_item_orcamento->caption() ?></span></td>
		<td data-name="data_lanc_item_orcamento"<?php echo $item_orcamento->data_lanc_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_data_lanc_item_orcamento">
<span<?php echo $item_orcamento->data_lanc_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->data_lanc_item_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item_orcamento->orcamento_id->Visible) { // orcamento_id ?>
	<tr id="r_orcamento_id">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_orcamento_id"><?php echo $item_orcamento->orcamento_id->caption() ?></span></td>
		<td data-name="orcamento_id"<?php echo $item_orcamento->orcamento_id->cellAttributes() ?>>
<span id="el_item_orcamento_orcamento_id">
<span<?php echo $item_orcamento->orcamento_id->viewAttributes() ?>>
<?php echo $item_orcamento->orcamento_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item_orcamento->item_id->Visible) { // item_id ?>
	<tr id="r_item_id">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_item_id"><?php echo $item_orcamento->item_id->caption() ?></span></td>
		<td data-name="item_id"<?php echo $item_orcamento->item_id->cellAttributes() ?>>
<span id="el_item_orcamento_item_id">
<span<?php echo $item_orcamento->item_id->viewAttributes() ?>>
<?php echo $item_orcamento->item_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item_orcamento->quantidade_item_orcamento->Visible) { // quantidade_item_orcamento ?>
	<tr id="r_quantidade_item_orcamento">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_quantidade_item_orcamento"><?php echo $item_orcamento->quantidade_item_orcamento->caption() ?></span></td>
		<td data-name="quantidade_item_orcamento"<?php echo $item_orcamento->quantidade_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_quantidade_item_orcamento">
<span<?php echo $item_orcamento->quantidade_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->quantidade_item_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item_orcamento->total_item_orcamento->Visible) { // total_item_orcamento ?>
	<tr id="r_total_item_orcamento">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_total_item_orcamento"><?php echo $item_orcamento->total_item_orcamento->caption() ?></span></td>
		<td data-name="total_item_orcamento"<?php echo $item_orcamento->total_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_total_item_orcamento">
<span<?php echo $item_orcamento->total_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->total_item_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item_orcamento->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_usuario_id"><?php echo $item_orcamento->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $item_orcamento->usuario_id->cellAttributes() ?>>
<span id="el_item_orcamento_usuario_id">
<span<?php echo $item_orcamento->usuario_id->viewAttributes() ?>>
<?php echo $item_orcamento->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item_orcamento->bool_ativo_item_orcamento->Visible) { // bool_ativo_item_orcamento ?>
	<tr id="r_bool_ativo_item_orcamento">
		<td class="<?php echo $item_orcamento_view->TableLeftColumnClass ?>"><span id="elh_item_orcamento_bool_ativo_item_orcamento"><?php echo $item_orcamento->bool_ativo_item_orcamento->caption() ?></span></td>
		<td data-name="bool_ativo_item_orcamento"<?php echo $item_orcamento->bool_ativo_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_bool_ativo_item_orcamento">
<span<?php echo $item_orcamento->bool_ativo_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->bool_ativo_item_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$item_orcamento_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$item_orcamento->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$item_orcamento_view->terminate();
?>
