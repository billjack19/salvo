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
$fotos_view = new fotos_view();

// Run the page
$fotos_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$fotos_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$fotos->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ffotosview = currentForm = new ew.Form("ffotosview", "view");

// Form_CustomValidate event
ffotosview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ffotosview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$fotos->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $fotos_view->ExportOptions->render("body") ?>
<?php
	foreach ($fotos_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $fotos_view->showPageHeader(); ?>
<?php
$fotos_view->showMessage();
?>
<form name="ffotosview" id="ffotosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($fotos_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $fotos_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="fotos">
<input type="hidden" name="modal" value="<?php echo (int)$fotos_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($fotos->id_fotos->Visible) { // id_fotos ?>
	<tr id="r_id_fotos">
		<td class="<?php echo $fotos_view->TableLeftColumnClass ?>"><span id="elh_fotos_id_fotos"><?php echo $fotos->id_fotos->caption() ?></span></td>
		<td data-name="id_fotos"<?php echo $fotos->id_fotos->cellAttributes() ?>>
<span id="el_fotos_id_fotos">
<span<?php echo $fotos->id_fotos->viewAttributes() ?>>
<?php echo $fotos->id_fotos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($fotos->descricao_fotos->Visible) { // descricao_fotos ?>
	<tr id="r_descricao_fotos">
		<td class="<?php echo $fotos_view->TableLeftColumnClass ?>"><span id="elh_fotos_descricao_fotos"><?php echo $fotos->descricao_fotos->caption() ?></span></td>
		<td data-name="descricao_fotos"<?php echo $fotos->descricao_fotos->cellAttributes() ?>>
<span id="el_fotos_descricao_fotos">
<span<?php echo $fotos->descricao_fotos->viewAttributes() ?>>
<?php echo $fotos->descricao_fotos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($fotos->imagem_fotos->Visible) { // imagem_fotos ?>
	<tr id="r_imagem_fotos">
		<td class="<?php echo $fotos_view->TableLeftColumnClass ?>"><span id="elh_fotos_imagem_fotos"><?php echo $fotos->imagem_fotos->caption() ?></span></td>
		<td data-name="imagem_fotos"<?php echo $fotos->imagem_fotos->cellAttributes() ?>>
<span id="el_fotos_imagem_fotos">
<span<?php echo $fotos->imagem_fotos->viewAttributes() ?>>
<?php echo $fotos->imagem_fotos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($fotos->item_id->Visible) { // item_id ?>
	<tr id="r_item_id">
		<td class="<?php echo $fotos_view->TableLeftColumnClass ?>"><span id="elh_fotos_item_id"><?php echo $fotos->item_id->caption() ?></span></td>
		<td data-name="item_id"<?php echo $fotos->item_id->cellAttributes() ?>>
<span id="el_fotos_item_id">
<span<?php echo $fotos->item_id->viewAttributes() ?>>
<?php echo $fotos->item_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($fotos->data_atualizacao_fotos->Visible) { // data_atualizacao_fotos ?>
	<tr id="r_data_atualizacao_fotos">
		<td class="<?php echo $fotos_view->TableLeftColumnClass ?>"><span id="elh_fotos_data_atualizacao_fotos"><?php echo $fotos->data_atualizacao_fotos->caption() ?></span></td>
		<td data-name="data_atualizacao_fotos"<?php echo $fotos->data_atualizacao_fotos->cellAttributes() ?>>
<span id="el_fotos_data_atualizacao_fotos">
<span<?php echo $fotos->data_atualizacao_fotos->viewAttributes() ?>>
<?php echo $fotos->data_atualizacao_fotos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($fotos->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $fotos_view->TableLeftColumnClass ?>"><span id="elh_fotos_usuario_id"><?php echo $fotos->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $fotos->usuario_id->cellAttributes() ?>>
<span id="el_fotos_usuario_id">
<span<?php echo $fotos->usuario_id->viewAttributes() ?>>
<?php echo $fotos->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($fotos->bool_ativo_fotos->Visible) { // bool_ativo_fotos ?>
	<tr id="r_bool_ativo_fotos">
		<td class="<?php echo $fotos_view->TableLeftColumnClass ?>"><span id="elh_fotos_bool_ativo_fotos"><?php echo $fotos->bool_ativo_fotos->caption() ?></span></td>
		<td data-name="bool_ativo_fotos"<?php echo $fotos->bool_ativo_fotos->cellAttributes() ?>>
<span id="el_fotos_bool_ativo_fotos">
<span<?php echo $fotos->bool_ativo_fotos->viewAttributes() ?>>
<?php echo $fotos->bool_ativo_fotos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$fotos_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$fotos->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$fotos_view->terminate();
?>
