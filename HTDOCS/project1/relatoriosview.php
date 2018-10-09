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
$relatorios_view = new relatorios_view();

// Run the page
$relatorios_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorios_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$relatorios->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var frelatoriosview = currentForm = new ew.Form("frelatoriosview", "view");

// Form_CustomValidate event
frelatoriosview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatoriosview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$relatorios->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $relatorios_view->ExportOptions->render("body") ?>
<?php
	foreach ($relatorios_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $relatorios_view->showPageHeader(); ?>
<?php
$relatorios_view->showMessage();
?>
<form name="frelatoriosview" id="frelatoriosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorios_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorios_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorios">
<input type="hidden" name="modal" value="<?php echo (int)$relatorios_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($relatorios->id_relatorios->Visible) { // id_relatorios ?>
	<tr id="r_id_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_id_relatorios"><?php echo $relatorios->id_relatorios->caption() ?></span></td>
		<td data-name="id_relatorios"<?php echo $relatorios->id_relatorios->cellAttributes() ?>>
<span id="el_relatorios_id_relatorios">
<span<?php echo $relatorios->id_relatorios->viewAttributes() ?>>
<?php echo $relatorios->id_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->descricao_relatorios->Visible) { // descricao_relatorios ?>
	<tr id="r_descricao_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_descricao_relatorios"><?php echo $relatorios->descricao_relatorios->caption() ?></span></td>
		<td data-name="descricao_relatorios"<?php echo $relatorios->descricao_relatorios->cellAttributes() ?>>
<span id="el_relatorios_descricao_relatorios">
<span<?php echo $relatorios->descricao_relatorios->viewAttributes() ?>>
<?php echo $relatorios->descricao_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->tabela_relatorios->Visible) { // tabela_relatorios ?>
	<tr id="r_tabela_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_tabela_relatorios"><?php echo $relatorios->tabela_relatorios->caption() ?></span></td>
		<td data-name="tabela_relatorios"<?php echo $relatorios->tabela_relatorios->cellAttributes() ?>>
<span id="el_relatorios_tabela_relatorios">
<span<?php echo $relatorios->tabela_relatorios->viewAttributes() ?>>
<?php echo $relatorios->tabela_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->colunas_relatorios->Visible) { // colunas_relatorios ?>
	<tr id="r_colunas_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_colunas_relatorios"><?php echo $relatorios->colunas_relatorios->caption() ?></span></td>
		<td data-name="colunas_relatorios"<?php echo $relatorios->colunas_relatorios->cellAttributes() ?>>
<span id="el_relatorios_colunas_relatorios">
<span<?php echo $relatorios->colunas_relatorios->viewAttributes() ?>>
<?php echo $relatorios->colunas_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->colunas_estrangeiras_relatorios->Visible) { // colunas_estrangeiras_relatorios ?>
	<tr id="r_colunas_estrangeiras_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_colunas_estrangeiras_relatorios"><?php echo $relatorios->colunas_estrangeiras_relatorios->caption() ?></span></td>
		<td data-name="colunas_estrangeiras_relatorios"<?php echo $relatorios->colunas_estrangeiras_relatorios->cellAttributes() ?>>
<span id="el_relatorios_colunas_estrangeiras_relatorios">
<span<?php echo $relatorios->colunas_estrangeiras_relatorios->viewAttributes() ?>>
<?php echo $relatorios->colunas_estrangeiras_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->colunas_filtro_relatorios->Visible) { // colunas_filtro_relatorios ?>
	<tr id="r_colunas_filtro_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_colunas_filtro_relatorios"><?php echo $relatorios->colunas_filtro_relatorios->caption() ?></span></td>
		<td data-name="colunas_filtro_relatorios"<?php echo $relatorios->colunas_filtro_relatorios->cellAttributes() ?>>
<span id="el_relatorios_colunas_filtro_relatorios">
<span<?php echo $relatorios->colunas_filtro_relatorios->viewAttributes() ?>>
<?php echo $relatorios->colunas_filtro_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->bool_filtro_ativo_relatorios->Visible) { // bool_filtro_ativo_relatorios ?>
	<tr id="r_bool_filtro_ativo_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_bool_filtro_ativo_relatorios"><?php echo $relatorios->bool_filtro_ativo_relatorios->caption() ?></span></td>
		<td data-name="bool_filtro_ativo_relatorios"<?php echo $relatorios->bool_filtro_ativo_relatorios->cellAttributes() ?>>
<span id="el_relatorios_bool_filtro_ativo_relatorios">
<span<?php echo $relatorios->bool_filtro_ativo_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_filtro_ativo_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->data_atualizacao_relatorios->Visible) { // data_atualizacao_relatorios ?>
	<tr id="r_data_atualizacao_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_data_atualizacao_relatorios"><?php echo $relatorios->data_atualizacao_relatorios->caption() ?></span></td>
		<td data-name="data_atualizacao_relatorios"<?php echo $relatorios->data_atualizacao_relatorios->cellAttributes() ?>>
<span id="el_relatorios_data_atualizacao_relatorios">
<span<?php echo $relatorios->data_atualizacao_relatorios->viewAttributes() ?>>
<?php echo $relatorios->data_atualizacao_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_usuario_id"><?php echo $relatorios->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $relatorios->usuario_id->cellAttributes() ?>>
<span id="el_relatorios_usuario_id">
<span<?php echo $relatorios->usuario_id->viewAttributes() ?>>
<?php echo $relatorios->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->bool_emitir_relatorios->Visible) { // bool_emitir_relatorios ?>
	<tr id="r_bool_emitir_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_bool_emitir_relatorios"><?php echo $relatorios->bool_emitir_relatorios->caption() ?></span></td>
		<td data-name="bool_emitir_relatorios"<?php echo $relatorios->bool_emitir_relatorios->cellAttributes() ?>>
<span id="el_relatorios_bool_emitir_relatorios">
<span<?php echo $relatorios->bool_emitir_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_emitir_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($relatorios->bool_ativo_relatorios->Visible) { // bool_ativo_relatorios ?>
	<tr id="r_bool_ativo_relatorios">
		<td class="<?php echo $relatorios_view->TableLeftColumnClass ?>"><span id="elh_relatorios_bool_ativo_relatorios"><?php echo $relatorios->bool_ativo_relatorios->caption() ?></span></td>
		<td data-name="bool_ativo_relatorios"<?php echo $relatorios->bool_ativo_relatorios->cellAttributes() ?>>
<span id="el_relatorios_bool_ativo_relatorios">
<span<?php echo $relatorios->bool_ativo_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_ativo_relatorios->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$relatorios_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$relatorios->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$relatorios_view->terminate();
?>
