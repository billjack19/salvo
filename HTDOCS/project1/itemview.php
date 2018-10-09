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
$item_view = new item_view();

// Run the page
$item_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$item->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fitemview = currentForm = new ew.Form("fitemview", "view");

// Form_CustomValidate event
fitemview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitemview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$item->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $item_view->ExportOptions->render("body") ?>
<?php
	foreach ($item_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $item_view->showPageHeader(); ?>
<?php
$item_view->showMessage();
?>
<form name="fitemview" id="fitemview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item">
<input type="hidden" name="modal" value="<?php echo (int)$item_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($item->id_item->Visible) { // id_item ?>
	<tr id="r_id_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_id_item"><?php echo $item->id_item->caption() ?></span></td>
		<td data-name="id_item"<?php echo $item->id_item->cellAttributes() ?>>
<span id="el_item_id_item">
<span<?php echo $item->id_item->viewAttributes() ?>>
<?php echo $item->id_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->titulo_item->Visible) { // titulo_item ?>
	<tr id="r_titulo_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_titulo_item"><?php echo $item->titulo_item->caption() ?></span></td>
		<td data-name="titulo_item"<?php echo $item->titulo_item->cellAttributes() ?>>
<span id="el_item_titulo_item">
<span<?php echo $item->titulo_item->viewAttributes() ?>>
<?php echo $item->titulo_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->descricao_resumida_item->Visible) { // descricao_resumida_item ?>
	<tr id="r_descricao_resumida_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_descricao_resumida_item"><?php echo $item->descricao_resumida_item->caption() ?></span></td>
		<td data-name="descricao_resumida_item"<?php echo $item->descricao_resumida_item->cellAttributes() ?>>
<span id="el_item_descricao_resumida_item">
<span<?php echo $item->descricao_resumida_item->viewAttributes() ?>>
<?php echo $item->descricao_resumida_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->descricao_site_item->Visible) { // descricao_site_item ?>
	<tr id="r_descricao_site_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_descricao_site_item"><?php echo $item->descricao_site_item->caption() ?></span></td>
		<td data-name="descricao_site_item"<?php echo $item->descricao_site_item->cellAttributes() ?>>
<span id="el_item_descricao_site_item">
<span<?php echo $item->descricao_site_item->viewAttributes() ?>>
<?php echo $item->descricao_site_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->imagem_item->Visible) { // imagem_item ?>
	<tr id="r_imagem_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_imagem_item"><?php echo $item->imagem_item->caption() ?></span></td>
		<td data-name="imagem_item"<?php echo $item->imagem_item->cellAttributes() ?>>
<span id="el_item_imagem_item">
<span<?php echo $item->imagem_item->viewAttributes() ?>>
<?php echo $item->imagem_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->endereco_item->Visible) { // endereco_item ?>
	<tr id="r_endereco_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_endereco_item"><?php echo $item->endereco_item->caption() ?></span></td>
		<td data-name="endereco_item"<?php echo $item->endereco_item->cellAttributes() ?>>
<span id="el_item_endereco_item">
<span<?php echo $item->endereco_item->viewAttributes() ?>>
<?php echo $item->endereco_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->numero_item->Visible) { // numero_item ?>
	<tr id="r_numero_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_numero_item"><?php echo $item->numero_item->caption() ?></span></td>
		<td data-name="numero_item"<?php echo $item->numero_item->cellAttributes() ?>>
<span id="el_item_numero_item">
<span<?php echo $item->numero_item->viewAttributes() ?>>
<?php echo $item->numero_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->bairro_item->Visible) { // bairro_item ?>
	<tr id="r_bairro_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_bairro_item"><?php echo $item->bairro_item->caption() ?></span></td>
		<td data-name="bairro_item"<?php echo $item->bairro_item->cellAttributes() ?>>
<span id="el_item_bairro_item">
<span<?php echo $item->bairro_item->viewAttributes() ?>>
<?php echo $item->bairro_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->cidade_item->Visible) { // cidade_item ?>
	<tr id="r_cidade_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_cidade_item"><?php echo $item->cidade_item->caption() ?></span></td>
		<td data-name="cidade_item"<?php echo $item->cidade_item->cellAttributes() ?>>
<span id="el_item_cidade_item">
<span<?php echo $item->cidade_item->viewAttributes() ?>>
<?php echo $item->cidade_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->estado_id->Visible) { // estado_id ?>
	<tr id="r_estado_id">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_estado_id"><?php echo $item->estado_id->caption() ?></span></td>
		<td data-name="estado_id"<?php echo $item->estado_id->cellAttributes() ?>>
<span id="el_item_estado_id">
<span<?php echo $item->estado_id->viewAttributes() ?>>
<?php echo $item->estado_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->situacao_id->Visible) { // situacao_id ?>
	<tr id="r_situacao_id">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_situacao_id"><?php echo $item->situacao_id->caption() ?></span></td>
		<td data-name="situacao_id"<?php echo $item->situacao_id->cellAttributes() ?>>
<span id="el_item_situacao_id">
<span<?php echo $item->situacao_id->viewAttributes() ?>>
<?php echo $item->situacao_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->grupo_id->Visible) { // grupo_id ?>
	<tr id="r_grupo_id">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_grupo_id"><?php echo $item->grupo_id->caption() ?></span></td>
		<td data-name="grupo_id"<?php echo $item->grupo_id->cellAttributes() ?>>
<span id="el_item_grupo_id">
<span<?php echo $item->grupo_id->viewAttributes() ?>>
<?php echo $item->grupo_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_usuario_id"><?php echo $item->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $item->usuario_id->cellAttributes() ?>>
<span id="el_item_usuario_id">
<span<?php echo $item->usuario_id->viewAttributes() ?>>
<?php echo $item->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($item->bool_ativo_item->Visible) { // bool_ativo_item ?>
	<tr id="r_bool_ativo_item">
		<td class="<?php echo $item_view->TableLeftColumnClass ?>"><span id="elh_item_bool_ativo_item"><?php echo $item->bool_ativo_item->caption() ?></span></td>
		<td data-name="bool_ativo_item"<?php echo $item->bool_ativo_item->cellAttributes() ?>>
<span id="el_item_bool_ativo_item">
<span<?php echo $item->bool_ativo_item->viewAttributes() ?>>
<?php echo $item->bool_ativo_item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$item_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$item->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$item_view->terminate();
?>
