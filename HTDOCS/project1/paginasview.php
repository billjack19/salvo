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
$paginas_view = new paginas_view();

// Run the page
$paginas_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$paginas_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$paginas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpaginasview = currentForm = new ew.Form("fpaginasview", "view");

// Form_CustomValidate event
fpaginasview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpaginasview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$paginas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $paginas_view->ExportOptions->render("body") ?>
<?php
	foreach ($paginas_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $paginas_view->showPageHeader(); ?>
<?php
$paginas_view->showMessage();
?>
<form name="fpaginasview" id="fpaginasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($paginas_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $paginas_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="paginas">
<input type="hidden" name="modal" value="<?php echo (int)$paginas_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($paginas->id_paginas->Visible) { // id_paginas ?>
	<tr id="r_id_paginas">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_id_paginas"><?php echo $paginas->id_paginas->caption() ?></span></td>
		<td data-name="id_paginas"<?php echo $paginas->id_paginas->cellAttributes() ?>>
<span id="el_paginas_id_paginas">
<span<?php echo $paginas->id_paginas->viewAttributes() ?>>
<?php echo $paginas->id_paginas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($paginas->numero_da_pagina_paginas->Visible) { // numero_da_pagina_paginas ?>
	<tr id="r_numero_da_pagina_paginas">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_numero_da_pagina_paginas"><?php echo $paginas->numero_da_pagina_paginas->caption() ?></span></td>
		<td data-name="numero_da_pagina_paginas"<?php echo $paginas->numero_da_pagina_paginas->cellAttributes() ?>>
<span id="el_paginas_numero_da_pagina_paginas">
<span<?php echo $paginas->numero_da_pagina_paginas->viewAttributes() ?>>
<?php echo $paginas->numero_da_pagina_paginas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($paginas->imagem_paginas->Visible) { // imagem_paginas ?>
	<tr id="r_imagem_paginas">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_imagem_paginas"><?php echo $paginas->imagem_paginas->caption() ?></span></td>
		<td data-name="imagem_paginas"<?php echo $paginas->imagem_paginas->cellAttributes() ?>>
<span id="el_paginas_imagem_paginas">
<span<?php echo $paginas->imagem_paginas->viewAttributes() ?>>
<?php echo $paginas->imagem_paginas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($paginas->imagem_miniatura_paginas->Visible) { // imagem_miniatura_paginas ?>
	<tr id="r_imagem_miniatura_paginas">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_imagem_miniatura_paginas"><?php echo $paginas->imagem_miniatura_paginas->caption() ?></span></td>
		<td data-name="imagem_miniatura_paginas"<?php echo $paginas->imagem_miniatura_paginas->cellAttributes() ?>>
<span id="el_paginas_imagem_miniatura_paginas">
<span<?php echo $paginas->imagem_miniatura_paginas->viewAttributes() ?>>
<?php echo $paginas->imagem_miniatura_paginas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($paginas->new_sjt_id->Visible) { // new_sjt_id ?>
	<tr id="r_new_sjt_id">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_new_sjt_id"><?php echo $paginas->new_sjt_id->caption() ?></span></td>
		<td data-name="new_sjt_id"<?php echo $paginas->new_sjt_id->cellAttributes() ?>>
<span id="el_paginas_new_sjt_id">
<span<?php echo $paginas->new_sjt_id->viewAttributes() ?>>
<?php echo $paginas->new_sjt_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($paginas->data_atualizacao_paginas->Visible) { // data_atualizacao_paginas ?>
	<tr id="r_data_atualizacao_paginas">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_data_atualizacao_paginas"><?php echo $paginas->data_atualizacao_paginas->caption() ?></span></td>
		<td data-name="data_atualizacao_paginas"<?php echo $paginas->data_atualizacao_paginas->cellAttributes() ?>>
<span id="el_paginas_data_atualizacao_paginas">
<span<?php echo $paginas->data_atualizacao_paginas->viewAttributes() ?>>
<?php echo $paginas->data_atualizacao_paginas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($paginas->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_usuario_id"><?php echo $paginas->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $paginas->usuario_id->cellAttributes() ?>>
<span id="el_paginas_usuario_id">
<span<?php echo $paginas->usuario_id->viewAttributes() ?>>
<?php echo $paginas->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($paginas->bool_ativo_paginas->Visible) { // bool_ativo_paginas ?>
	<tr id="r_bool_ativo_paginas">
		<td class="<?php echo $paginas_view->TableLeftColumnClass ?>"><span id="elh_paginas_bool_ativo_paginas"><?php echo $paginas->bool_ativo_paginas->caption() ?></span></td>
		<td data-name="bool_ativo_paginas"<?php echo $paginas->bool_ativo_paginas->cellAttributes() ?>>
<span id="el_paginas_bool_ativo_paginas">
<span<?php echo $paginas->bool_ativo_paginas->viewAttributes() ?>>
<?php echo $paginas->bool_ativo_paginas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$paginas_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$paginas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$paginas_view->terminate();
?>
