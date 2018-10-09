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
$new_sjt_view = new new_sjt_view();

// Run the page
$new_sjt_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$new_sjt_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$new_sjt->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fnew_sjtview = currentForm = new ew.Form("fnew_sjtview", "view");

// Form_CustomValidate event
fnew_sjtview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnew_sjtview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$new_sjt->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $new_sjt_view->ExportOptions->render("body") ?>
<?php
	foreach ($new_sjt_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $new_sjt_view->showPageHeader(); ?>
<?php
$new_sjt_view->showMessage();
?>
<form name="fnew_sjtview" id="fnew_sjtview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($new_sjt_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $new_sjt_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="new_sjt">
<input type="hidden" name="modal" value="<?php echo (int)$new_sjt_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($new_sjt->id_new_sjt->Visible) { // id_new_sjt ?>
	<tr id="r_id_new_sjt">
		<td class="<?php echo $new_sjt_view->TableLeftColumnClass ?>"><span id="elh_new_sjt_id_new_sjt"><?php echo $new_sjt->id_new_sjt->caption() ?></span></td>
		<td data-name="id_new_sjt"<?php echo $new_sjt->id_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_id_new_sjt">
<span<?php echo $new_sjt->id_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->id_new_sjt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($new_sjt->descricao_new_sjt->Visible) { // descricao_new_sjt ?>
	<tr id="r_descricao_new_sjt">
		<td class="<?php echo $new_sjt_view->TableLeftColumnClass ?>"><span id="elh_new_sjt_descricao_new_sjt"><?php echo $new_sjt->descricao_new_sjt->caption() ?></span></td>
		<td data-name="descricao_new_sjt"<?php echo $new_sjt->descricao_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_descricao_new_sjt">
<span<?php echo $new_sjt->descricao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->descricao_new_sjt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($new_sjt->imagem_demonstrativa_new_sjt->Visible) { // imagem_demonstrativa_new_sjt ?>
	<tr id="r_imagem_demonstrativa_new_sjt">
		<td class="<?php echo $new_sjt_view->TableLeftColumnClass ?>"><span id="elh_new_sjt_imagem_demonstrativa_new_sjt"><?php echo $new_sjt->imagem_demonstrativa_new_sjt->caption() ?></span></td>
		<td data-name="imagem_demonstrativa_new_sjt"<?php echo $new_sjt->imagem_demonstrativa_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_imagem_demonstrativa_new_sjt">
<span<?php echo $new_sjt->imagem_demonstrativa_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->imagem_demonstrativa_new_sjt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($new_sjt->numero_edicao_new_sjt->Visible) { // numero_edicao_new_sjt ?>
	<tr id="r_numero_edicao_new_sjt">
		<td class="<?php echo $new_sjt_view->TableLeftColumnClass ?>"><span id="elh_new_sjt_numero_edicao_new_sjt"><?php echo $new_sjt->numero_edicao_new_sjt->caption() ?></span></td>
		<td data-name="numero_edicao_new_sjt"<?php echo $new_sjt->numero_edicao_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_numero_edicao_new_sjt">
<span<?php echo $new_sjt->numero_edicao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->numero_edicao_new_sjt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($new_sjt->data_atualizacao_new_sjt->Visible) { // data_atualizacao_new_sjt ?>
	<tr id="r_data_atualizacao_new_sjt">
		<td class="<?php echo $new_sjt_view->TableLeftColumnClass ?>"><span id="elh_new_sjt_data_atualizacao_new_sjt"><?php echo $new_sjt->data_atualizacao_new_sjt->caption() ?></span></td>
		<td data-name="data_atualizacao_new_sjt"<?php echo $new_sjt->data_atualizacao_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_data_atualizacao_new_sjt">
<span<?php echo $new_sjt->data_atualizacao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->data_atualizacao_new_sjt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($new_sjt->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $new_sjt_view->TableLeftColumnClass ?>"><span id="elh_new_sjt_usuario_id"><?php echo $new_sjt->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $new_sjt->usuario_id->cellAttributes() ?>>
<span id="el_new_sjt_usuario_id">
<span<?php echo $new_sjt->usuario_id->viewAttributes() ?>>
<?php echo $new_sjt->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($new_sjt->bool_ativo_new_sjt->Visible) { // bool_ativo_new_sjt ?>
	<tr id="r_bool_ativo_new_sjt">
		<td class="<?php echo $new_sjt_view->TableLeftColumnClass ?>"><span id="elh_new_sjt_bool_ativo_new_sjt"><?php echo $new_sjt->bool_ativo_new_sjt->caption() ?></span></td>
		<td data-name="bool_ativo_new_sjt"<?php echo $new_sjt->bool_ativo_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_bool_ativo_new_sjt">
<span<?php echo $new_sjt->bool_ativo_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->bool_ativo_new_sjt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$new_sjt_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$new_sjt->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$new_sjt_view->terminate();
?>
