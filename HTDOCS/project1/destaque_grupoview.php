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
$destaque_grupo_view = new destaque_grupo_view();

// Run the page
$destaque_grupo_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$destaque_grupo_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$destaque_grupo->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fdestaque_grupoview = currentForm = new ew.Form("fdestaque_grupoview", "view");

// Form_CustomValidate event
fdestaque_grupoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdestaque_grupoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$destaque_grupo->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $destaque_grupo_view->ExportOptions->render("body") ?>
<?php
	foreach ($destaque_grupo_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $destaque_grupo_view->showPageHeader(); ?>
<?php
$destaque_grupo_view->showMessage();
?>
<form name="fdestaque_grupoview" id="fdestaque_grupoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($destaque_grupo_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $destaque_grupo_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="destaque_grupo">
<input type="hidden" name="modal" value="<?php echo (int)$destaque_grupo_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($destaque_grupo->id_destaque_grupo->Visible) { // id_destaque_grupo ?>
	<tr id="r_id_destaque_grupo">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_id_destaque_grupo"><?php echo $destaque_grupo->id_destaque_grupo->caption() ?></span></td>
		<td data-name="id_destaque_grupo"<?php echo $destaque_grupo->id_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_id_destaque_grupo">
<span<?php echo $destaque_grupo->id_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->id_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->titulo_destaque_grupo->Visible) { // titulo_destaque_grupo ?>
	<tr id="r_titulo_destaque_grupo">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_titulo_destaque_grupo"><?php echo $destaque_grupo->titulo_destaque_grupo->caption() ?></span></td>
		<td data-name="titulo_destaque_grupo"<?php echo $destaque_grupo->titulo_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_titulo_destaque_grupo">
<span<?php echo $destaque_grupo->titulo_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->titulo_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->grupo_id->Visible) { // grupo_id ?>
	<tr id="r_grupo_id">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_grupo_id"><?php echo $destaque_grupo->grupo_id->caption() ?></span></td>
		<td data-name="grupo_id"<?php echo $destaque_grupo->grupo_id->cellAttributes() ?>>
<span id="el_destaque_grupo_grupo_id">
<span<?php echo $destaque_grupo->grupo_id->viewAttributes() ?>>
<?php echo $destaque_grupo->grupo_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->imagem_destaque_grupo->Visible) { // imagem_destaque_grupo ?>
	<tr id="r_imagem_destaque_grupo">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_imagem_destaque_grupo"><?php echo $destaque_grupo->imagem_destaque_grupo->caption() ?></span></td>
		<td data-name="imagem_destaque_grupo"<?php echo $destaque_grupo->imagem_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_imagem_destaque_grupo">
<span<?php echo $destaque_grupo->imagem_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->imagem_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->descricao_destaque_grupo->Visible) { // descricao_destaque_grupo ?>
	<tr id="r_descricao_destaque_grupo">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_descricao_destaque_grupo"><?php echo $destaque_grupo->descricao_destaque_grupo->caption() ?></span></td>
		<td data-name="descricao_destaque_grupo"<?php echo $destaque_grupo->descricao_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_descricao_destaque_grupo">
<span<?php echo $destaque_grupo->descricao_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->descricao_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->configurar_site_id->Visible) { // configurar_site_id ?>
	<tr id="r_configurar_site_id">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_configurar_site_id"><?php echo $destaque_grupo->configurar_site_id->caption() ?></span></td>
		<td data-name="configurar_site_id"<?php echo $destaque_grupo->configurar_site_id->cellAttributes() ?>>
<span id="el_destaque_grupo_configurar_site_id">
<span<?php echo $destaque_grupo->configurar_site_id->viewAttributes() ?>>
<?php echo $destaque_grupo->configurar_site_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->data_atualizacao_destaque_grupo->Visible) { // data_atualizacao_destaque_grupo ?>
	<tr id="r_data_atualizacao_destaque_grupo">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_data_atualizacao_destaque_grupo"><?php echo $destaque_grupo->data_atualizacao_destaque_grupo->caption() ?></span></td>
		<td data-name="data_atualizacao_destaque_grupo"<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_data_atualizacao_destaque_grupo">
<span<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_usuario_id"><?php echo $destaque_grupo->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $destaque_grupo->usuario_id->cellAttributes() ?>>
<span id="el_destaque_grupo_usuario_id">
<span<?php echo $destaque_grupo->usuario_id->viewAttributes() ?>>
<?php echo $destaque_grupo->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($destaque_grupo->bool_ativo_destaque_grupo->Visible) { // bool_ativo_destaque_grupo ?>
	<tr id="r_bool_ativo_destaque_grupo">
		<td class="<?php echo $destaque_grupo_view->TableLeftColumnClass ?>"><span id="elh_destaque_grupo_bool_ativo_destaque_grupo"><?php echo $destaque_grupo->bool_ativo_destaque_grupo->caption() ?></span></td>
		<td data-name="bool_ativo_destaque_grupo"<?php echo $destaque_grupo->bool_ativo_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_bool_ativo_destaque_grupo">
<span<?php echo $destaque_grupo->bool_ativo_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->bool_ativo_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$destaque_grupo_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$destaque_grupo->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$destaque_grupo_view->terminate();
?>
