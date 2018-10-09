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
$orcamento_view = new orcamento_view();

// Run the page
$orcamento_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$orcamento_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$orcamento->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var forcamentoview = currentForm = new ew.Form("forcamentoview", "view");

// Form_CustomValidate event
forcamentoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
forcamentoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$orcamento->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $orcamento_view->ExportOptions->render("body") ?>
<?php
	foreach ($orcamento_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $orcamento_view->showPageHeader(); ?>
<?php
$orcamento_view->showMessage();
?>
<form name="forcamentoview" id="forcamentoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($orcamento_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $orcamento_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="orcamento">
<input type="hidden" name="modal" value="<?php echo (int)$orcamento_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($orcamento->id_orcamento->Visible) { // id_orcamento ?>
	<tr id="r_id_orcamento">
		<td class="<?php echo $orcamento_view->TableLeftColumnClass ?>"><span id="elh_orcamento_id_orcamento"><?php echo $orcamento->id_orcamento->caption() ?></span></td>
		<td data-name="id_orcamento"<?php echo $orcamento->id_orcamento->cellAttributes() ?>>
<span id="el_orcamento_id_orcamento">
<span<?php echo $orcamento->id_orcamento->viewAttributes() ?>>
<?php echo $orcamento->id_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($orcamento->descricao_orcamento->Visible) { // descricao_orcamento ?>
	<tr id="r_descricao_orcamento">
		<td class="<?php echo $orcamento_view->TableLeftColumnClass ?>"><span id="elh_orcamento_descricao_orcamento"><?php echo $orcamento->descricao_orcamento->caption() ?></span></td>
		<td data-name="descricao_orcamento"<?php echo $orcamento->descricao_orcamento->cellAttributes() ?>>
<span id="el_orcamento_descricao_orcamento">
<span<?php echo $orcamento->descricao_orcamento->viewAttributes() ?>>
<?php echo $orcamento->descricao_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($orcamento->cliente_site_id->Visible) { // cliente_site_id ?>
	<tr id="r_cliente_site_id">
		<td class="<?php echo $orcamento_view->TableLeftColumnClass ?>"><span id="elh_orcamento_cliente_site_id"><?php echo $orcamento->cliente_site_id->caption() ?></span></td>
		<td data-name="cliente_site_id"<?php echo $orcamento->cliente_site_id->cellAttributes() ?>>
<span id="el_orcamento_cliente_site_id">
<span<?php echo $orcamento->cliente_site_id->viewAttributes() ?>>
<?php echo $orcamento->cliente_site_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($orcamento->data_lanc_orcamento->Visible) { // data_lanc_orcamento ?>
	<tr id="r_data_lanc_orcamento">
		<td class="<?php echo $orcamento_view->TableLeftColumnClass ?>"><span id="elh_orcamento_data_lanc_orcamento"><?php echo $orcamento->data_lanc_orcamento->caption() ?></span></td>
		<td data-name="data_lanc_orcamento"<?php echo $orcamento->data_lanc_orcamento->cellAttributes() ?>>
<span id="el_orcamento_data_lanc_orcamento">
<span<?php echo $orcamento->data_lanc_orcamento->viewAttributes() ?>>
<?php echo $orcamento->data_lanc_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($orcamento->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $orcamento_view->TableLeftColumnClass ?>"><span id="elh_orcamento_usuario_id"><?php echo $orcamento->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $orcamento->usuario_id->cellAttributes() ?>>
<span id="el_orcamento_usuario_id">
<span<?php echo $orcamento->usuario_id->viewAttributes() ?>>
<?php echo $orcamento->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($orcamento->bool_ativo_orcamento->Visible) { // bool_ativo_orcamento ?>
	<tr id="r_bool_ativo_orcamento">
		<td class="<?php echo $orcamento_view->TableLeftColumnClass ?>"><span id="elh_orcamento_bool_ativo_orcamento"><?php echo $orcamento->bool_ativo_orcamento->caption() ?></span></td>
		<td data-name="bool_ativo_orcamento"<?php echo $orcamento->bool_ativo_orcamento->cellAttributes() ?>>
<span id="el_orcamento_bool_ativo_orcamento">
<span<?php echo $orcamento->bool_ativo_orcamento->viewAttributes() ?>>
<?php echo $orcamento->bool_ativo_orcamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$orcamento_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$orcamento->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$orcamento_view->terminate();
?>
