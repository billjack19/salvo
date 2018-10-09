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
$empresa_view = new empresa_view();

// Run the page
$empresa_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$empresa_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$empresa->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fempresaview = currentForm = new ew.Form("fempresaview", "view");

// Form_CustomValidate event
fempresaview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fempresaview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$empresa->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $empresa_view->ExportOptions->render("body") ?>
<?php
	foreach ($empresa_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $empresa_view->showPageHeader(); ?>
<?php
$empresa_view->showMessage();
?>
<form name="fempresaview" id="fempresaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($empresa_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $empresa_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="empresa">
<input type="hidden" name="modal" value="<?php echo (int)$empresa_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($empresa->id_empresa->Visible) { // id_empresa ?>
	<tr id="r_id_empresa">
		<td class="<?php echo $empresa_view->TableLeftColumnClass ?>"><span id="elh_empresa_id_empresa"><?php echo $empresa->id_empresa->caption() ?></span></td>
		<td data-name="id_empresa"<?php echo $empresa->id_empresa->cellAttributes() ?>>
<span id="el_empresa_id_empresa">
<span<?php echo $empresa->id_empresa->viewAttributes() ?>>
<?php echo $empresa->id_empresa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($empresa->descricao_empresa->Visible) { // descricao_empresa ?>
	<tr id="r_descricao_empresa">
		<td class="<?php echo $empresa_view->TableLeftColumnClass ?>"><span id="elh_empresa_descricao_empresa"><?php echo $empresa->descricao_empresa->caption() ?></span></td>
		<td data-name="descricao_empresa"<?php echo $empresa->descricao_empresa->cellAttributes() ?>>
<span id="el_empresa_descricao_empresa">
<span<?php echo $empresa->descricao_empresa->viewAttributes() ?>>
<?php echo $empresa->descricao_empresa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($empresa->imagem_logo_empresa->Visible) { // imagem_logo_empresa ?>
	<tr id="r_imagem_logo_empresa">
		<td class="<?php echo $empresa_view->TableLeftColumnClass ?>"><span id="elh_empresa_imagem_logo_empresa"><?php echo $empresa->imagem_logo_empresa->caption() ?></span></td>
		<td data-name="imagem_logo_empresa"<?php echo $empresa->imagem_logo_empresa->cellAttributes() ?>>
<span id="el_empresa_imagem_logo_empresa">
<span<?php echo $empresa->imagem_logo_empresa->viewAttributes() ?>>
<?php echo $empresa->imagem_logo_empresa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($empresa->data_atualizacao_empresa->Visible) { // data_atualizacao_empresa ?>
	<tr id="r_data_atualizacao_empresa">
		<td class="<?php echo $empresa_view->TableLeftColumnClass ?>"><span id="elh_empresa_data_atualizacao_empresa"><?php echo $empresa->data_atualizacao_empresa->caption() ?></span></td>
		<td data-name="data_atualizacao_empresa"<?php echo $empresa->data_atualizacao_empresa->cellAttributes() ?>>
<span id="el_empresa_data_atualizacao_empresa">
<span<?php echo $empresa->data_atualizacao_empresa->viewAttributes() ?>>
<?php echo $empresa->data_atualizacao_empresa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($empresa->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $empresa_view->TableLeftColumnClass ?>"><span id="elh_empresa_usuario_id"><?php echo $empresa->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $empresa->usuario_id->cellAttributes() ?>>
<span id="el_empresa_usuario_id">
<span<?php echo $empresa->usuario_id->viewAttributes() ?>>
<?php echo $empresa->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($empresa->bool_ativo_empresa->Visible) { // bool_ativo_empresa ?>
	<tr id="r_bool_ativo_empresa">
		<td class="<?php echo $empresa_view->TableLeftColumnClass ?>"><span id="elh_empresa_bool_ativo_empresa"><?php echo $empresa->bool_ativo_empresa->caption() ?></span></td>
		<td data-name="bool_ativo_empresa"<?php echo $empresa->bool_ativo_empresa->cellAttributes() ?>>
<span id="el_empresa_bool_ativo_empresa">
<span<?php echo $empresa->bool_ativo_empresa->viewAttributes() ?>>
<?php echo $empresa->bool_ativo_empresa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$empresa_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$empresa->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$empresa_view->terminate();
?>
