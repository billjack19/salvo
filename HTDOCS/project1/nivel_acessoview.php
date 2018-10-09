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
$nivel_acesso_view = new nivel_acesso_view();

// Run the page
$nivel_acesso_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$nivel_acesso_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$nivel_acesso->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fnivel_acessoview = currentForm = new ew.Form("fnivel_acessoview", "view");

// Form_CustomValidate event
fnivel_acessoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnivel_acessoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$nivel_acesso->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $nivel_acesso_view->ExportOptions->render("body") ?>
<?php
	foreach ($nivel_acesso_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $nivel_acesso_view->showPageHeader(); ?>
<?php
$nivel_acesso_view->showMessage();
?>
<form name="fnivel_acessoview" id="fnivel_acessoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($nivel_acesso_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $nivel_acesso_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="nivel_acesso">
<input type="hidden" name="modal" value="<?php echo (int)$nivel_acesso_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($nivel_acesso->id_nivel_acesso->Visible) { // id_nivel_acesso ?>
	<tr id="r_id_nivel_acesso">
		<td class="<?php echo $nivel_acesso_view->TableLeftColumnClass ?>"><span id="elh_nivel_acesso_id_nivel_acesso"><?php echo $nivel_acesso->id_nivel_acesso->caption() ?></span></td>
		<td data-name="id_nivel_acesso"<?php echo $nivel_acesso->id_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_id_nivel_acesso">
<span<?php echo $nivel_acesso->id_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->id_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($nivel_acesso->descricao_nivel_acesso->Visible) { // descricao_nivel_acesso ?>
	<tr id="r_descricao_nivel_acesso">
		<td class="<?php echo $nivel_acesso_view->TableLeftColumnClass ?>"><span id="elh_nivel_acesso_descricao_nivel_acesso"><?php echo $nivel_acesso->descricao_nivel_acesso->caption() ?></span></td>
		<td data-name="descricao_nivel_acesso"<?php echo $nivel_acesso->descricao_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_descricao_nivel_acesso">
<span<?php echo $nivel_acesso->descricao_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->descricao_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($nivel_acesso->area_nivel_acesso->Visible) { // area_nivel_acesso ?>
	<tr id="r_area_nivel_acesso">
		<td class="<?php echo $nivel_acesso_view->TableLeftColumnClass ?>"><span id="elh_nivel_acesso_area_nivel_acesso"><?php echo $nivel_acesso->area_nivel_acesso->caption() ?></span></td>
		<td data-name="area_nivel_acesso"<?php echo $nivel_acesso->area_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_area_nivel_acesso">
<span<?php echo $nivel_acesso->area_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($nivel_acesso->data_atualizacao_nivel_acesso->Visible) { // data_atualizacao_nivel_acesso ?>
	<tr id="r_data_atualizacao_nivel_acesso">
		<td class="<?php echo $nivel_acesso_view->TableLeftColumnClass ?>"><span id="elh_nivel_acesso_data_atualizacao_nivel_acesso"><?php echo $nivel_acesso->data_atualizacao_nivel_acesso->caption() ?></span></td>
		<td data-name="data_atualizacao_nivel_acesso"<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_data_atualizacao_nivel_acesso">
<span<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($nivel_acesso->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $nivel_acesso_view->TableLeftColumnClass ?>"><span id="elh_nivel_acesso_usuario_id"><?php echo $nivel_acesso->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $nivel_acesso->usuario_id->cellAttributes() ?>>
<span id="el_nivel_acesso_usuario_id">
<span<?php echo $nivel_acesso->usuario_id->viewAttributes() ?>>
<?php echo $nivel_acesso->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($nivel_acesso->bool_ativo_nivel_acesso->Visible) { // bool_ativo_nivel_acesso ?>
	<tr id="r_bool_ativo_nivel_acesso">
		<td class="<?php echo $nivel_acesso_view->TableLeftColumnClass ?>"><span id="elh_nivel_acesso_bool_ativo_nivel_acesso"><?php echo $nivel_acesso->bool_ativo_nivel_acesso->caption() ?></span></td>
		<td data-name="bool_ativo_nivel_acesso"<?php echo $nivel_acesso->bool_ativo_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_bool_ativo_nivel_acesso">
<span<?php echo $nivel_acesso->bool_ativo_nivel_acesso->viewAttributes() ?>>
<?php echo $nivel_acesso->bool_ativo_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$nivel_acesso_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$nivel_acesso->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$nivel_acesso_view->terminate();
?>
