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
$adicional_site_view = new adicional_site_view();

// Run the page
$adicional_site_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$adicional_site_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$adicional_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fadicional_siteview = currentForm = new ew.Form("fadicional_siteview", "view");

// Form_CustomValidate event
fadicional_siteview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fadicional_siteview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$adicional_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $adicional_site_view->ExportOptions->render("body") ?>
<?php
	foreach ($adicional_site_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $adicional_site_view->showPageHeader(); ?>
<?php
$adicional_site_view->showMessage();
?>
<form name="fadicional_siteview" id="fadicional_siteview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($adicional_site_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $adicional_site_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="adicional_site">
<input type="hidden" name="modal" value="<?php echo (int)$adicional_site_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($adicional_site->id_adicional_site->Visible) { // id_adicional_site ?>
	<tr id="r_id_adicional_site">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_id_adicional_site"><?php echo $adicional_site->id_adicional_site->caption() ?></span></td>
		<td data-name="id_adicional_site"<?php echo $adicional_site->id_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_id_adicional_site">
<span<?php echo $adicional_site->id_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->id_adicional_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($adicional_site->titulo_adicional_site->Visible) { // titulo_adicional_site ?>
	<tr id="r_titulo_adicional_site">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_titulo_adicional_site"><?php echo $adicional_site->titulo_adicional_site->caption() ?></span></td>
		<td data-name="titulo_adicional_site"<?php echo $adicional_site->titulo_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_titulo_adicional_site">
<span<?php echo $adicional_site->titulo_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->titulo_adicional_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($adicional_site->descricao_adicional_site->Visible) { // descricao_adicional_site ?>
	<tr id="r_descricao_adicional_site">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_descricao_adicional_site"><?php echo $adicional_site->descricao_adicional_site->caption() ?></span></td>
		<td data-name="descricao_adicional_site"<?php echo $adicional_site->descricao_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_descricao_adicional_site">
<span<?php echo $adicional_site->descricao_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->descricao_adicional_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($adicional_site->imagem_adicional_site->Visible) { // imagem_adicional_site ?>
	<tr id="r_imagem_adicional_site">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_imagem_adicional_site"><?php echo $adicional_site->imagem_adicional_site->caption() ?></span></td>
		<td data-name="imagem_adicional_site"<?php echo $adicional_site->imagem_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_imagem_adicional_site">
<span<?php echo $adicional_site->imagem_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->imagem_adicional_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($adicional_site->saiba_mais_id->Visible) { // saiba_mais_id ?>
	<tr id="r_saiba_mais_id">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_saiba_mais_id"><?php echo $adicional_site->saiba_mais_id->caption() ?></span></td>
		<td data-name="saiba_mais_id"<?php echo $adicional_site->saiba_mais_id->cellAttributes() ?>>
<span id="el_adicional_site_saiba_mais_id">
<span<?php echo $adicional_site->saiba_mais_id->viewAttributes() ?>>
<?php echo $adicional_site->saiba_mais_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($adicional_site->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_usuario_id"><?php echo $adicional_site->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $adicional_site->usuario_id->cellAttributes() ?>>
<span id="el_adicional_site_usuario_id">
<span<?php echo $adicional_site->usuario_id->viewAttributes() ?>>
<?php echo $adicional_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($adicional_site->data_atualizacao_adicional_site->Visible) { // data_atualizacao_adicional_site ?>
	<tr id="r_data_atualizacao_adicional_site">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_data_atualizacao_adicional_site"><?php echo $adicional_site->data_atualizacao_adicional_site->caption() ?></span></td>
		<td data-name="data_atualizacao_adicional_site"<?php echo $adicional_site->data_atualizacao_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_data_atualizacao_adicional_site">
<span<?php echo $adicional_site->data_atualizacao_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->data_atualizacao_adicional_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($adicional_site->bool_ativo_adicional_site->Visible) { // bool_ativo_adicional_site ?>
	<tr id="r_bool_ativo_adicional_site">
		<td class="<?php echo $adicional_site_view->TableLeftColumnClass ?>"><span id="elh_adicional_site_bool_ativo_adicional_site"><?php echo $adicional_site->bool_ativo_adicional_site->caption() ?></span></td>
		<td data-name="bool_ativo_adicional_site"<?php echo $adicional_site->bool_ativo_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_bool_ativo_adicional_site">
<span<?php echo $adicional_site->bool_ativo_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->bool_ativo_adicional_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$adicional_site_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$adicional_site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$adicional_site_view->terminate();
?>
