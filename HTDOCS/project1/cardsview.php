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
$cards_view = new cards_view();

// Run the page
$cards_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cards_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$cards->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcardsview = currentForm = new ew.Form("fcardsview", "view");

// Form_CustomValidate event
fcardsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcardsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$cards->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $cards_view->ExportOptions->render("body") ?>
<?php
	foreach ($cards_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $cards_view->showPageHeader(); ?>
<?php
$cards_view->showMessage();
?>
<form name="fcardsview" id="fcardsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cards_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cards_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cards">
<input type="hidden" name="modal" value="<?php echo (int)$cards_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($cards->id_cards->Visible) { // id_cards ?>
	<tr id="r_id_cards">
		<td class="<?php echo $cards_view->TableLeftColumnClass ?>"><span id="elh_cards_id_cards"><?php echo $cards->id_cards->caption() ?></span></td>
		<td data-name="id_cards"<?php echo $cards->id_cards->cellAttributes() ?>>
<span id="el_cards_id_cards">
<span<?php echo $cards->id_cards->viewAttributes() ?>>
<?php echo $cards->id_cards->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cards->titulo_cards->Visible) { // titulo_cards ?>
	<tr id="r_titulo_cards">
		<td class="<?php echo $cards_view->TableLeftColumnClass ?>"><span id="elh_cards_titulo_cards"><?php echo $cards->titulo_cards->caption() ?></span></td>
		<td data-name="titulo_cards"<?php echo $cards->titulo_cards->cellAttributes() ?>>
<span id="el_cards_titulo_cards">
<span<?php echo $cards->titulo_cards->viewAttributes() ?>>
<?php echo $cards->titulo_cards->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cards->descricao_cards->Visible) { // descricao_cards ?>
	<tr id="r_descricao_cards">
		<td class="<?php echo $cards_view->TableLeftColumnClass ?>"><span id="elh_cards_descricao_cards"><?php echo $cards->descricao_cards->caption() ?></span></td>
		<td data-name="descricao_cards"<?php echo $cards->descricao_cards->cellAttributes() ?>>
<span id="el_cards_descricao_cards">
<span<?php echo $cards->descricao_cards->viewAttributes() ?>>
<?php echo $cards->descricao_cards->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cards->imagem_cards->Visible) { // imagem_cards ?>
	<tr id="r_imagem_cards">
		<td class="<?php echo $cards_view->TableLeftColumnClass ?>"><span id="elh_cards_imagem_cards"><?php echo $cards->imagem_cards->caption() ?></span></td>
		<td data-name="imagem_cards"<?php echo $cards->imagem_cards->cellAttributes() ?>>
<span id="el_cards_imagem_cards">
<span<?php echo $cards->imagem_cards->viewAttributes() ?>>
<?php echo $cards->imagem_cards->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cards->data_atualizacao_cards->Visible) { // data_atualizacao_cards ?>
	<tr id="r_data_atualizacao_cards">
		<td class="<?php echo $cards_view->TableLeftColumnClass ?>"><span id="elh_cards_data_atualizacao_cards"><?php echo $cards->data_atualizacao_cards->caption() ?></span></td>
		<td data-name="data_atualizacao_cards"<?php echo $cards->data_atualizacao_cards->cellAttributes() ?>>
<span id="el_cards_data_atualizacao_cards">
<span<?php echo $cards->data_atualizacao_cards->viewAttributes() ?>>
<?php echo $cards->data_atualizacao_cards->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cards->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $cards_view->TableLeftColumnClass ?>"><span id="elh_cards_usuario_id"><?php echo $cards->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $cards->usuario_id->cellAttributes() ?>>
<span id="el_cards_usuario_id">
<span<?php echo $cards->usuario_id->viewAttributes() ?>>
<?php echo $cards->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cards->bool_ativo_cards->Visible) { // bool_ativo_cards ?>
	<tr id="r_bool_ativo_cards">
		<td class="<?php echo $cards_view->TableLeftColumnClass ?>"><span id="elh_cards_bool_ativo_cards"><?php echo $cards->bool_ativo_cards->caption() ?></span></td>
		<td data-name="bool_ativo_cards"<?php echo $cards->bool_ativo_cards->cellAttributes() ?>>
<span id="el_cards_bool_ativo_cards">
<span<?php echo $cards->bool_ativo_cards->viewAttributes() ?>>
<?php echo $cards->bool_ativo_cards->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$cards_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$cards->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$cards_view->terminate();
?>
