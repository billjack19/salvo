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
$grupo_view = new grupo_view();

// Run the page
$grupo_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$grupo_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$grupo->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fgrupoview = currentForm = new ew.Form("fgrupoview", "view");

// Form_CustomValidate event
fgrupoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgrupoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$grupo->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $grupo_view->ExportOptions->render("body") ?>
<?php
	foreach ($grupo_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $grupo_view->showPageHeader(); ?>
<?php
$grupo_view->showMessage();
?>
<form name="fgrupoview" id="fgrupoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($grupo_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $grupo_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="grupo">
<input type="hidden" name="modal" value="<?php echo (int)$grupo_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($grupo->id_grupo->Visible) { // id_grupo ?>
	<tr id="r_id_grupo">
		<td class="<?php echo $grupo_view->TableLeftColumnClass ?>"><span id="elh_grupo_id_grupo"><?php echo $grupo->id_grupo->caption() ?></span></td>
		<td data-name="id_grupo"<?php echo $grupo->id_grupo->cellAttributes() ?>>
<span id="el_grupo_id_grupo">
<span<?php echo $grupo->id_grupo->viewAttributes() ?>>
<?php echo $grupo->id_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($grupo->descricao_grupo->Visible) { // descricao_grupo ?>
	<tr id="r_descricao_grupo">
		<td class="<?php echo $grupo_view->TableLeftColumnClass ?>"><span id="elh_grupo_descricao_grupo"><?php echo $grupo->descricao_grupo->caption() ?></span></td>
		<td data-name="descricao_grupo"<?php echo $grupo->descricao_grupo->cellAttributes() ?>>
<span id="el_grupo_descricao_grupo">
<span<?php echo $grupo->descricao_grupo->viewAttributes() ?>>
<?php echo $grupo->descricao_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($grupo->imagem_grupo->Visible) { // imagem_grupo ?>
	<tr id="r_imagem_grupo">
		<td class="<?php echo $grupo_view->TableLeftColumnClass ?>"><span id="elh_grupo_imagem_grupo"><?php echo $grupo->imagem_grupo->caption() ?></span></td>
		<td data-name="imagem_grupo"<?php echo $grupo->imagem_grupo->cellAttributes() ?>>
<span id="el_grupo_imagem_grupo">
<span<?php echo $grupo->imagem_grupo->viewAttributes() ?>>
<?php echo $grupo->imagem_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($grupo->data_atualizacao_grupo->Visible) { // data_atualizacao_grupo ?>
	<tr id="r_data_atualizacao_grupo">
		<td class="<?php echo $grupo_view->TableLeftColumnClass ?>"><span id="elh_grupo_data_atualizacao_grupo"><?php echo $grupo->data_atualizacao_grupo->caption() ?></span></td>
		<td data-name="data_atualizacao_grupo"<?php echo $grupo->data_atualizacao_grupo->cellAttributes() ?>>
<span id="el_grupo_data_atualizacao_grupo">
<span<?php echo $grupo->data_atualizacao_grupo->viewAttributes() ?>>
<?php echo $grupo->data_atualizacao_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($grupo->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $grupo_view->TableLeftColumnClass ?>"><span id="elh_grupo_usuario_id"><?php echo $grupo->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $grupo->usuario_id->cellAttributes() ?>>
<span id="el_grupo_usuario_id">
<span<?php echo $grupo->usuario_id->viewAttributes() ?>>
<?php echo $grupo->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($grupo->bool_ativo_grupo->Visible) { // bool_ativo_grupo ?>
	<tr id="r_bool_ativo_grupo">
		<td class="<?php echo $grupo_view->TableLeftColumnClass ?>"><span id="elh_grupo_bool_ativo_grupo"><?php echo $grupo->bool_ativo_grupo->caption() ?></span></td>
		<td data-name="bool_ativo_grupo"<?php echo $grupo->bool_ativo_grupo->cellAttributes() ?>>
<span id="el_grupo_bool_ativo_grupo">
<span<?php echo $grupo->bool_ativo_grupo->viewAttributes() ?>>
<?php echo $grupo->bool_ativo_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$grupo_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$grupo->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$grupo_view->terminate();
?>
