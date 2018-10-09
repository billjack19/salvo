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
$loja_view = new loja_view();

// Run the page
$loja_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$loja_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$loja->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flojaview = currentForm = new ew.Form("flojaview", "view");

// Form_CustomValidate event
flojaview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flojaview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$loja->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $loja_view->ExportOptions->render("body") ?>
<?php
	foreach ($loja_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $loja_view->showPageHeader(); ?>
<?php
$loja_view->showMessage();
?>
<form name="flojaview" id="flojaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($loja_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $loja_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="loja">
<input type="hidden" name="modal" value="<?php echo (int)$loja_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($loja->id_loja->Visible) { // id_loja ?>
	<tr id="r_id_loja">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_id_loja"><?php echo $loja->id_loja->caption() ?></span></td>
		<td data-name="id_loja"<?php echo $loja->id_loja->cellAttributes() ?>>
<span id="el_loja_id_loja">
<span<?php echo $loja->id_loja->viewAttributes() ?>>
<?php echo $loja->id_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($loja->titulo_loja->Visible) { // titulo_loja ?>
	<tr id="r_titulo_loja">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_titulo_loja"><?php echo $loja->titulo_loja->caption() ?></span></td>
		<td data-name="titulo_loja"<?php echo $loja->titulo_loja->cellAttributes() ?>>
<span id="el_loja_titulo_loja">
<span<?php echo $loja->titulo_loja->viewAttributes() ?>>
<?php echo $loja->titulo_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($loja->descricao_loja->Visible) { // descricao_loja ?>
	<tr id="r_descricao_loja">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_descricao_loja"><?php echo $loja->descricao_loja->caption() ?></span></td>
		<td data-name="descricao_loja"<?php echo $loja->descricao_loja->cellAttributes() ?>>
<span id="el_loja_descricao_loja">
<span<?php echo $loja->descricao_loja->viewAttributes() ?>>
<?php echo $loja->descricao_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($loja->imagem_loja->Visible) { // imagem_loja ?>
	<tr id="r_imagem_loja">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_imagem_loja"><?php echo $loja->imagem_loja->caption() ?></span></td>
		<td data-name="imagem_loja"<?php echo $loja->imagem_loja->cellAttributes() ?>>
<span id="el_loja_imagem_loja">
<span<?php echo $loja->imagem_loja->viewAttributes() ?>>
<?php echo $loja->imagem_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($loja->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<tr id="r_pagina_principal_id">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_pagina_principal_id"><?php echo $loja->pagina_principal_id->caption() ?></span></td>
		<td data-name="pagina_principal_id"<?php echo $loja->pagina_principal_id->cellAttributes() ?>>
<span id="el_loja_pagina_principal_id">
<span<?php echo $loja->pagina_principal_id->viewAttributes() ?>>
<?php echo $loja->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($loja->data_atualizacao_loja->Visible) { // data_atualizacao_loja ?>
	<tr id="r_data_atualizacao_loja">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_data_atualizacao_loja"><?php echo $loja->data_atualizacao_loja->caption() ?></span></td>
		<td data-name="data_atualizacao_loja"<?php echo $loja->data_atualizacao_loja->cellAttributes() ?>>
<span id="el_loja_data_atualizacao_loja">
<span<?php echo $loja->data_atualizacao_loja->viewAttributes() ?>>
<?php echo $loja->data_atualizacao_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($loja->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_usuario_id"><?php echo $loja->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $loja->usuario_id->cellAttributes() ?>>
<span id="el_loja_usuario_id">
<span<?php echo $loja->usuario_id->viewAttributes() ?>>
<?php echo $loja->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($loja->bool_ativo_loja->Visible) { // bool_ativo_loja ?>
	<tr id="r_bool_ativo_loja">
		<td class="<?php echo $loja_view->TableLeftColumnClass ?>"><span id="elh_loja_bool_ativo_loja"><?php echo $loja->bool_ativo_loja->caption() ?></span></td>
		<td data-name="bool_ativo_loja"<?php echo $loja->bool_ativo_loja->cellAttributes() ?>>
<span id="el_loja_bool_ativo_loja">
<span<?php echo $loja->bool_ativo_loja->viewAttributes() ?>>
<?php echo $loja->bool_ativo_loja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$loja_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$loja->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$loja_view->terminate();
?>
