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
$relatorio_tabela_view = new relatorio_tabela_view();

// Run the page
$relatorio_tabela_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorio_tabela_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$relatorio_tabela->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var frelatorio_tabelaview = currentForm = new ew.Form("frelatorio_tabelaview", "view");

// Form_CustomValidate event
frelatorio_tabelaview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatorio_tabelaview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$relatorio_tabela->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $relatorio_tabela_view->ExportOptions->render("body") ?>
<?php
	foreach ($relatorio_tabela_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $relatorio_tabela_view->showPageHeader(); ?>
<?php
$relatorio_tabela_view->showMessage();
?>
<form name="frelatorio_tabelaview" id="frelatorio_tabelaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorio_tabela_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorio_tabela_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorio_tabela">
<input type="hidden" name="modal" value="<?php echo (int)$relatorio_tabela_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($relatorio_tabela->id_relatorio_tabela->Visible) { // id_relatorio_tabela ?>
	<tr id="r_id_relatorio_tabela">
		<td class="<?php echo $relatorio_tabela_view->TableLeftColumnClass ?>"><span id="elh_relatorio_tabela_id_relatorio_tabela"><?php echo $relatorio_tabela->id_relatorio_tabela->caption() ?></span></td>
		<td data-name="id_relatorio_tabela"<?php echo $relatorio_tabela->id_relatorio_tabela->cellAttributes() ?>>
<span id="el_relatorio_tabela_id_relatorio_tabela">
<span<?php echo $relatorio_tabela->id_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->id_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorio_tabela->descricao_relatorio_tabela->Visible) { // descricao_relatorio_tabela ?>
	<tr id="r_descricao_relatorio_tabela">
		<td class="<?php echo $relatorio_tabela_view->TableLeftColumnClass ?>"><span id="elh_relatorio_tabela_descricao_relatorio_tabela"><?php echo $relatorio_tabela->descricao_relatorio_tabela->caption() ?></span></td>
		<td data-name="descricao_relatorio_tabela"<?php echo $relatorio_tabela->descricao_relatorio_tabela->cellAttributes() ?>>
<span id="el_relatorio_tabela_descricao_relatorio_tabela">
<span<?php echo $relatorio_tabela->descricao_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->descricao_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorio_tabela->data_atualizacao_relatorio_tabela->Visible) { // data_atualizacao_relatorio_tabela ?>
	<tr id="r_data_atualizacao_relatorio_tabela">
		<td class="<?php echo $relatorio_tabela_view->TableLeftColumnClass ?>"><span id="elh_relatorio_tabela_data_atualizacao_relatorio_tabela"><?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->caption() ?></span></td>
		<td data-name="data_atualizacao_relatorio_tabela"<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->cellAttributes() ?>>
<span id="el_relatorio_tabela_data_atualizacao_relatorio_tabela">
<span<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorio_tabela->bool_ativo_relatorio_tabela->Visible) { // bool_ativo_relatorio_tabela ?>
	<tr id="r_bool_ativo_relatorio_tabela">
		<td class="<?php echo $relatorio_tabela_view->TableLeftColumnClass ?>"><span id="elh_relatorio_tabela_bool_ativo_relatorio_tabela"><?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->caption() ?></span></td>
		<td data-name="bool_ativo_relatorio_tabela"<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->cellAttributes() ?>>
<span id="el_relatorio_tabela_bool_ativo_relatorio_tabela">
<span<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$relatorio_tabela_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$relatorio_tabela->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$relatorio_tabela_view->terminate();
?>
