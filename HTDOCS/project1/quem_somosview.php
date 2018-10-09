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
$quem_somos_view = new quem_somos_view();

// Run the page
$quem_somos_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$quem_somos_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$quem_somos->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fquem_somosview = currentForm = new ew.Form("fquem_somosview", "view");

// Form_CustomValidate event
fquem_somosview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fquem_somosview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$quem_somos->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $quem_somos_view->ExportOptions->render("body") ?>
<?php
	foreach ($quem_somos_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $quem_somos_view->showPageHeader(); ?>
<?php
$quem_somos_view->showMessage();
?>
<form name="fquem_somosview" id="fquem_somosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($quem_somos_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $quem_somos_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="quem_somos">
<input type="hidden" name="modal" value="<?php echo (int)$quem_somos_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($quem_somos->id_quem_somos->Visible) { // id_quem_somos ?>
	<tr id="r_id_quem_somos">
		<td class="<?php echo $quem_somos_view->TableLeftColumnClass ?>"><span id="elh_quem_somos_id_quem_somos"><?php echo $quem_somos->id_quem_somos->caption() ?></span></td>
		<td data-name="id_quem_somos"<?php echo $quem_somos->id_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_id_quem_somos">
<span<?php echo $quem_somos->id_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->id_quem_somos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($quem_somos->titulo_quem_somos->Visible) { // titulo_quem_somos ?>
	<tr id="r_titulo_quem_somos">
		<td class="<?php echo $quem_somos_view->TableLeftColumnClass ?>"><span id="elh_quem_somos_titulo_quem_somos"><?php echo $quem_somos->titulo_quem_somos->caption() ?></span></td>
		<td data-name="titulo_quem_somos"<?php echo $quem_somos->titulo_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_titulo_quem_somos">
<span<?php echo $quem_somos->titulo_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->titulo_quem_somos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($quem_somos->descricao_quem_somos->Visible) { // descricao_quem_somos ?>
	<tr id="r_descricao_quem_somos">
		<td class="<?php echo $quem_somos_view->TableLeftColumnClass ?>"><span id="elh_quem_somos_descricao_quem_somos"><?php echo $quem_somos->descricao_quem_somos->caption() ?></span></td>
		<td data-name="descricao_quem_somos"<?php echo $quem_somos->descricao_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_descricao_quem_somos">
<span<?php echo $quem_somos->descricao_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->descricao_quem_somos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($quem_somos->imagem_quem_somos->Visible) { // imagem_quem_somos ?>
	<tr id="r_imagem_quem_somos">
		<td class="<?php echo $quem_somos_view->TableLeftColumnClass ?>"><span id="elh_quem_somos_imagem_quem_somos"><?php echo $quem_somos->imagem_quem_somos->caption() ?></span></td>
		<td data-name="imagem_quem_somos"<?php echo $quem_somos->imagem_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_imagem_quem_somos">
<span<?php echo $quem_somos->imagem_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->imagem_quem_somos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($quem_somos->data_atualizacao_quem_somos->Visible) { // data_atualizacao_quem_somos ?>
	<tr id="r_data_atualizacao_quem_somos">
		<td class="<?php echo $quem_somos_view->TableLeftColumnClass ?>"><span id="elh_quem_somos_data_atualizacao_quem_somos"><?php echo $quem_somos->data_atualizacao_quem_somos->caption() ?></span></td>
		<td data-name="data_atualizacao_quem_somos"<?php echo $quem_somos->data_atualizacao_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_data_atualizacao_quem_somos">
<span<?php echo $quem_somos->data_atualizacao_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->data_atualizacao_quem_somos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($quem_somos->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $quem_somos_view->TableLeftColumnClass ?>"><span id="elh_quem_somos_usuario_id"><?php echo $quem_somos->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $quem_somos->usuario_id->cellAttributes() ?>>
<span id="el_quem_somos_usuario_id">
<span<?php echo $quem_somos->usuario_id->viewAttributes() ?>>
<?php echo $quem_somos->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($quem_somos->bool_ativo_quem_somos->Visible) { // bool_ativo_quem_somos ?>
	<tr id="r_bool_ativo_quem_somos">
		<td class="<?php echo $quem_somos_view->TableLeftColumnClass ?>"><span id="elh_quem_somos_bool_ativo_quem_somos"><?php echo $quem_somos->bool_ativo_quem_somos->caption() ?></span></td>
		<td data-name="bool_ativo_quem_somos"<?php echo $quem_somos->bool_ativo_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_bool_ativo_quem_somos">
<span<?php echo $quem_somos->bool_ativo_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->bool_ativo_quem_somos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$quem_somos_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$quem_somos->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$quem_somos_view->terminate();
?>
