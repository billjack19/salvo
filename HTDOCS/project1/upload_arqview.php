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
$upload_arq_view = new upload_arq_view();

// Run the page
$upload_arq_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$upload_arq_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$upload_arq->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fupload_arqview = currentForm = new ew.Form("fupload_arqview", "view");

// Form_CustomValidate event
fupload_arqview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fupload_arqview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$upload_arq->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $upload_arq_view->ExportOptions->render("body") ?>
<?php
	foreach ($upload_arq_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $upload_arq_view->showPageHeader(); ?>
<?php
$upload_arq_view->showMessage();
?>
<form name="fupload_arqview" id="fupload_arqview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($upload_arq_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $upload_arq_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="upload_arq">
<input type="hidden" name="modal" value="<?php echo (int)$upload_arq_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($upload_arq->id_upload_arq->Visible) { // id_upload_arq ?>
	<tr id="r_id_upload_arq">
		<td class="<?php echo $upload_arq_view->TableLeftColumnClass ?>"><span id="elh_upload_arq_id_upload_arq"><?php echo $upload_arq->id_upload_arq->caption() ?></span></td>
		<td data-name="id_upload_arq"<?php echo $upload_arq->id_upload_arq->cellAttributes() ?>>
<span id="el_upload_arq_id_upload_arq">
<span<?php echo $upload_arq->id_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->id_upload_arq->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($upload_arq->descricao_upload_arq->Visible) { // descricao_upload_arq ?>
	<tr id="r_descricao_upload_arq">
		<td class="<?php echo $upload_arq_view->TableLeftColumnClass ?>"><span id="elh_upload_arq_descricao_upload_arq"><?php echo $upload_arq->descricao_upload_arq->caption() ?></span></td>
		<td data-name="descricao_upload_arq"<?php echo $upload_arq->descricao_upload_arq->cellAttributes() ?>>
<span id="el_upload_arq_descricao_upload_arq">
<span<?php echo $upload_arq->descricao_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->descricao_upload_arq->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($upload_arq->tipo_upload_arq->Visible) { // tipo_upload_arq ?>
	<tr id="r_tipo_upload_arq">
		<td class="<?php echo $upload_arq_view->TableLeftColumnClass ?>"><span id="elh_upload_arq_tipo_upload_arq"><?php echo $upload_arq->tipo_upload_arq->caption() ?></span></td>
		<td data-name="tipo_upload_arq"<?php echo $upload_arq->tipo_upload_arq->cellAttributes() ?>>
<span id="el_upload_arq_tipo_upload_arq">
<span<?php echo $upload_arq->tipo_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->tipo_upload_arq->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($upload_arq->data_atualizacaoupload_arq->Visible) { // data_atualizacaoupload_arq ?>
	<tr id="r_data_atualizacaoupload_arq">
		<td class="<?php echo $upload_arq_view->TableLeftColumnClass ?>"><span id="elh_upload_arq_data_atualizacaoupload_arq"><?php echo $upload_arq->data_atualizacaoupload_arq->caption() ?></span></td>
		<td data-name="data_atualizacaoupload_arq"<?php echo $upload_arq->data_atualizacaoupload_arq->cellAttributes() ?>>
<span id="el_upload_arq_data_atualizacaoupload_arq">
<span<?php echo $upload_arq->data_atualizacaoupload_arq->viewAttributes() ?>>
<?php echo $upload_arq->data_atualizacaoupload_arq->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($upload_arq->bool_ativo_upload_arq->Visible) { // bool_ativo_upload_arq ?>
	<tr id="r_bool_ativo_upload_arq">
		<td class="<?php echo $upload_arq_view->TableLeftColumnClass ?>"><span id="elh_upload_arq_bool_ativo_upload_arq"><?php echo $upload_arq->bool_ativo_upload_arq->caption() ?></span></td>
		<td data-name="bool_ativo_upload_arq"<?php echo $upload_arq->bool_ativo_upload_arq->cellAttributes() ?>>
<span id="el_upload_arq_bool_ativo_upload_arq">
<span<?php echo $upload_arq->bool_ativo_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->bool_ativo_upload_arq->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$upload_arq_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$upload_arq->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$upload_arq_view->terminate();
?>
