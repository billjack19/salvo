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
$topicos_loja_view = new topicos_loja_view();

// Run the page
$topicos_loja_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$topicos_loja_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$topicos_loja->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftopicos_lojaview = currentForm = new ew.Form("ftopicos_lojaview", "view");

// Form_CustomValidate event
ftopicos_lojaview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftopicos_lojaview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$topicos_loja->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $topicos_loja_view->ExportOptions->render("body") ?>
<?php
	foreach ($topicos_loja_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $topicos_loja_view->showPageHeader(); ?>
<?php
$topicos_loja_view->showMessage();
?>
<form name="ftopicos_lojaview" id="ftopicos_lojaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($topicos_loja_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $topicos_loja_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="topicos_loja">
<input type="hidden" name="modal" value="<?php echo (int)$topicos_loja_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($topicos_loja->id_topicos_loja->Visible) { // id_topicos_loja ?>
	<tr id="r_id_topicos_loja">
		<td class="<?php echo $topicos_loja_view->TableLeftColumnClass ?>"><span id="elh_topicos_loja_id_topicos_loja"><?php echo $topicos_loja->id_topicos_loja->caption() ?></span></td>
		<td data-name="id_topicos_loja"<?php echo $topicos_loja->id_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_id_topicos_loja">
<span<?php echo $topicos_loja->id_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->id_topicos_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($topicos_loja->titulo_topicos_loja->Visible) { // titulo_topicos_loja ?>
	<tr id="r_titulo_topicos_loja">
		<td class="<?php echo $topicos_loja_view->TableLeftColumnClass ?>"><span id="elh_topicos_loja_titulo_topicos_loja"><?php echo $topicos_loja->titulo_topicos_loja->caption() ?></span></td>
		<td data-name="titulo_topicos_loja"<?php echo $topicos_loja->titulo_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_titulo_topicos_loja">
<span<?php echo $topicos_loja->titulo_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->titulo_topicos_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($topicos_loja->descricao_topicos_loja->Visible) { // descricao_topicos_loja ?>
	<tr id="r_descricao_topicos_loja">
		<td class="<?php echo $topicos_loja_view->TableLeftColumnClass ?>"><span id="elh_topicos_loja_descricao_topicos_loja"><?php echo $topicos_loja->descricao_topicos_loja->caption() ?></span></td>
		<td data-name="descricao_topicos_loja"<?php echo $topicos_loja->descricao_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_descricao_topicos_loja">
<span<?php echo $topicos_loja->descricao_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->descricao_topicos_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($topicos_loja->loja_id->Visible) { // loja_id ?>
	<tr id="r_loja_id">
		<td class="<?php echo $topicos_loja_view->TableLeftColumnClass ?>"><span id="elh_topicos_loja_loja_id"><?php echo $topicos_loja->loja_id->caption() ?></span></td>
		<td data-name="loja_id"<?php echo $topicos_loja->loja_id->cellAttributes() ?>>
<span id="el_topicos_loja_loja_id">
<span<?php echo $topicos_loja->loja_id->viewAttributes() ?>>
<?php echo $topicos_loja->loja_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($topicos_loja->data_atualizacao_topicos_loja->Visible) { // data_atualizacao_topicos_loja ?>
	<tr id="r_data_atualizacao_topicos_loja">
		<td class="<?php echo $topicos_loja_view->TableLeftColumnClass ?>"><span id="elh_topicos_loja_data_atualizacao_topicos_loja"><?php echo $topicos_loja->data_atualizacao_topicos_loja->caption() ?></span></td>
		<td data-name="data_atualizacao_topicos_loja"<?php echo $topicos_loja->data_atualizacao_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_data_atualizacao_topicos_loja">
<span<?php echo $topicos_loja->data_atualizacao_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->data_atualizacao_topicos_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($topicos_loja->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $topicos_loja_view->TableLeftColumnClass ?>"><span id="elh_topicos_loja_usuario_id"><?php echo $topicos_loja->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $topicos_loja->usuario_id->cellAttributes() ?>>
<span id="el_topicos_loja_usuario_id">
<span<?php echo $topicos_loja->usuario_id->viewAttributes() ?>>
<?php echo $topicos_loja->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($topicos_loja->bool_ativo_topicos_loja->Visible) { // bool_ativo_topicos_loja ?>
	<tr id="r_bool_ativo_topicos_loja">
		<td class="<?php echo $topicos_loja_view->TableLeftColumnClass ?>"><span id="elh_topicos_loja_bool_ativo_topicos_loja"><?php echo $topicos_loja->bool_ativo_topicos_loja->caption() ?></span></td>
		<td data-name="bool_ativo_topicos_loja"<?php echo $topicos_loja->bool_ativo_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_bool_ativo_topicos_loja">
<span<?php echo $topicos_loja->bool_ativo_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->bool_ativo_topicos_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$topicos_loja_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$topicos_loja->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$topicos_loja_view->terminate();
?>
