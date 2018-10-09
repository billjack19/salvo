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
$saiba_mais_view = new saiba_mais_view();

// Run the page
$saiba_mais_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$saiba_mais_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$saiba_mais->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsaiba_maisview = currentForm = new ew.Form("fsaiba_maisview", "view");

// Form_CustomValidate event
fsaiba_maisview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsaiba_maisview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$saiba_mais->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $saiba_mais_view->ExportOptions->render("body") ?>
<?php
	foreach ($saiba_mais_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $saiba_mais_view->showPageHeader(); ?>
<?php
$saiba_mais_view->showMessage();
?>
<form name="fsaiba_maisview" id="fsaiba_maisview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($saiba_mais_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $saiba_mais_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="saiba_mais">
<input type="hidden" name="modal" value="<?php echo (int)$saiba_mais_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($saiba_mais->id_saiba_mais->Visible) { // id_saiba_mais ?>
	<tr id="r_id_saiba_mais">
		<td class="<?php echo $saiba_mais_view->TableLeftColumnClass ?>"><span id="elh_saiba_mais_id_saiba_mais"><?php echo $saiba_mais->id_saiba_mais->caption() ?></span></td>
		<td data-name="id_saiba_mais"<?php echo $saiba_mais->id_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_id_saiba_mais">
<span<?php echo $saiba_mais->id_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->id_saiba_mais->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($saiba_mais->descricao_saiba_mais->Visible) { // descricao_saiba_mais ?>
	<tr id="r_descricao_saiba_mais">
		<td class="<?php echo $saiba_mais_view->TableLeftColumnClass ?>"><span id="elh_saiba_mais_descricao_saiba_mais"><?php echo $saiba_mais->descricao_saiba_mais->caption() ?></span></td>
		<td data-name="descricao_saiba_mais"<?php echo $saiba_mais->descricao_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_descricao_saiba_mais">
<span<?php echo $saiba_mais->descricao_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->descricao_saiba_mais->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($saiba_mais->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<tr id="r_pagina_principal_id">
		<td class="<?php echo $saiba_mais_view->TableLeftColumnClass ?>"><span id="elh_saiba_mais_pagina_principal_id"><?php echo $saiba_mais->pagina_principal_id->caption() ?></span></td>
		<td data-name="pagina_principal_id"<?php echo $saiba_mais->pagina_principal_id->cellAttributes() ?>>
<span id="el_saiba_mais_pagina_principal_id">
<span<?php echo $saiba_mais->pagina_principal_id->viewAttributes() ?>>
<?php echo $saiba_mais->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($saiba_mais->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $saiba_mais_view->TableLeftColumnClass ?>"><span id="elh_saiba_mais_usuario_id"><?php echo $saiba_mais->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $saiba_mais->usuario_id->cellAttributes() ?>>
<span id="el_saiba_mais_usuario_id">
<span<?php echo $saiba_mais->usuario_id->viewAttributes() ?>>
<?php echo $saiba_mais->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($saiba_mais->data_atualizacao_saiba_mais->Visible) { // data_atualizacao_saiba_mais ?>
	<tr id="r_data_atualizacao_saiba_mais">
		<td class="<?php echo $saiba_mais_view->TableLeftColumnClass ?>"><span id="elh_saiba_mais_data_atualizacao_saiba_mais"><?php echo $saiba_mais->data_atualizacao_saiba_mais->caption() ?></span></td>
		<td data-name="data_atualizacao_saiba_mais"<?php echo $saiba_mais->data_atualizacao_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_data_atualizacao_saiba_mais">
<span<?php echo $saiba_mais->data_atualizacao_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->data_atualizacao_saiba_mais->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($saiba_mais->bool_ativo_saiba_mais->Visible) { // bool_ativo_saiba_mais ?>
	<tr id="r_bool_ativo_saiba_mais">
		<td class="<?php echo $saiba_mais_view->TableLeftColumnClass ?>"><span id="elh_saiba_mais_bool_ativo_saiba_mais"><?php echo $saiba_mais->bool_ativo_saiba_mais->caption() ?></span></td>
		<td data-name="bool_ativo_saiba_mais"<?php echo $saiba_mais->bool_ativo_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_bool_ativo_saiba_mais">
<span<?php echo $saiba_mais->bool_ativo_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->bool_ativo_saiba_mais->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$saiba_mais_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$saiba_mais->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$saiba_mais_view->terminate();
?>
