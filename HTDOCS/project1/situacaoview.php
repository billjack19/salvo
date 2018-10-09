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
$situacao_view = new situacao_view();

// Run the page
$situacao_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$situacao_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$situacao->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsituacaoview = currentForm = new ew.Form("fsituacaoview", "view");

// Form_CustomValidate event
fsituacaoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsituacaoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$situacao->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $situacao_view->ExportOptions->render("body") ?>
<?php
	foreach ($situacao_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $situacao_view->showPageHeader(); ?>
<?php
$situacao_view->showMessage();
?>
<form name="fsituacaoview" id="fsituacaoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($situacao_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $situacao_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="situacao">
<input type="hidden" name="modal" value="<?php echo (int)$situacao_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($situacao->id_situacao->Visible) { // id_situacao ?>
	<tr id="r_id_situacao">
		<td class="<?php echo $situacao_view->TableLeftColumnClass ?>"><span id="elh_situacao_id_situacao"><?php echo $situacao->id_situacao->caption() ?></span></td>
		<td data-name="id_situacao"<?php echo $situacao->id_situacao->cellAttributes() ?>>
<span id="el_situacao_id_situacao">
<span<?php echo $situacao->id_situacao->viewAttributes() ?>>
<?php echo $situacao->id_situacao->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($situacao->descricao_situacao->Visible) { // descricao_situacao ?>
	<tr id="r_descricao_situacao">
		<td class="<?php echo $situacao_view->TableLeftColumnClass ?>"><span id="elh_situacao_descricao_situacao"><?php echo $situacao->descricao_situacao->caption() ?></span></td>
		<td data-name="descricao_situacao"<?php echo $situacao->descricao_situacao->cellAttributes() ?>>
<span id="el_situacao_descricao_situacao">
<span<?php echo $situacao->descricao_situacao->viewAttributes() ?>>
<?php echo $situacao->descricao_situacao->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($situacao->cor_situacao->Visible) { // cor_situacao ?>
	<tr id="r_cor_situacao">
		<td class="<?php echo $situacao_view->TableLeftColumnClass ?>"><span id="elh_situacao_cor_situacao"><?php echo $situacao->cor_situacao->caption() ?></span></td>
		<td data-name="cor_situacao"<?php echo $situacao->cor_situacao->cellAttributes() ?>>
<span id="el_situacao_cor_situacao">
<span<?php echo $situacao->cor_situacao->viewAttributes() ?>>
<?php echo $situacao->cor_situacao->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($situacao->data_atualizacao_situacao->Visible) { // data_atualizacao_situacao ?>
	<tr id="r_data_atualizacao_situacao">
		<td class="<?php echo $situacao_view->TableLeftColumnClass ?>"><span id="elh_situacao_data_atualizacao_situacao"><?php echo $situacao->data_atualizacao_situacao->caption() ?></span></td>
		<td data-name="data_atualizacao_situacao"<?php echo $situacao->data_atualizacao_situacao->cellAttributes() ?>>
<span id="el_situacao_data_atualizacao_situacao">
<span<?php echo $situacao->data_atualizacao_situacao->viewAttributes() ?>>
<?php echo $situacao->data_atualizacao_situacao->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($situacao->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $situacao_view->TableLeftColumnClass ?>"><span id="elh_situacao_usuario_id"><?php echo $situacao->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $situacao->usuario_id->cellAttributes() ?>>
<span id="el_situacao_usuario_id">
<span<?php echo $situacao->usuario_id->viewAttributes() ?>>
<?php echo $situacao->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($situacao->bool_ativo_situacao->Visible) { // bool_ativo_situacao ?>
	<tr id="r_bool_ativo_situacao">
		<td class="<?php echo $situacao_view->TableLeftColumnClass ?>"><span id="elh_situacao_bool_ativo_situacao"><?php echo $situacao->bool_ativo_situacao->caption() ?></span></td>
		<td data-name="bool_ativo_situacao"<?php echo $situacao->bool_ativo_situacao->cellAttributes() ?>>
<span id="el_situacao_bool_ativo_situacao">
<span<?php echo $situacao->bool_ativo_situacao->viewAttributes() ?>>
<?php echo $situacao->bool_ativo_situacao->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$situacao_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$situacao->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$situacao_view->terminate();
?>
