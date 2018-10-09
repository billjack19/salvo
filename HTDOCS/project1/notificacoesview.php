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
$notificacoes_view = new notificacoes_view();

// Run the page
$notificacoes_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fnotificacoesview = currentForm = new ew.Form("fnotificacoesview", "view");

// Form_CustomValidate event
fnotificacoesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoesview.lists["x_tipo_alteracao_notificacoes"] = <?php echo $notificacoes_view->tipo_alteracao_notificacoes->Lookup->toClientList() ?>;
fnotificacoesview.lists["x_tipo_alteracao_notificacoes"].options = <?php echo JsonEncode($notificacoes_view->tipo_alteracao_notificacoes->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $notificacoes_view->ExportOptions->render("body") ?>
<?php
	foreach ($notificacoes_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $notificacoes_view->showPageHeader(); ?>
<?php
$notificacoes_view->showMessage();
?>
<form name="fnotificacoesview" id="fnotificacoesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($notificacoes->id_notificacoes->Visible) { // id_notificacoes ?>
	<tr id="r_id_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_id_notificacoes"><?php echo $notificacoes->id_notificacoes->caption() ?></span></td>
		<td data-name="id_notificacoes"<?php echo $notificacoes->id_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_id_notificacoes">
<span<?php echo $notificacoes->id_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->id_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->descricao_notificacoes->Visible) { // descricao_notificacoes ?>
	<tr id="r_descricao_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_descricao_notificacoes"><?php echo $notificacoes->descricao_notificacoes->caption() ?></span></td>
		<td data-name="descricao_notificacoes"<?php echo $notificacoes->descricao_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_descricao_notificacoes">
<span<?php echo $notificacoes->descricao_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->descricao_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->usuario_atuador_notificacoes->Visible) { // usuario_atuador_notificacoes ?>
	<tr id="r_usuario_atuador_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_usuario_atuador_notificacoes"><?php echo $notificacoes->usuario_atuador_notificacoes->caption() ?></span></td>
		<td data-name="usuario_atuador_notificacoes"<?php echo $notificacoes->usuario_atuador_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_usuario_atuador_notificacoes">
<span<?php echo $notificacoes->usuario_atuador_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->usuario_atuador_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->usuaio_requerente_notificacoes->Visible) { // usuaio_requerente_notificacoes ?>
	<tr id="r_usuaio_requerente_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_usuaio_requerente_notificacoes"><?php echo $notificacoes->usuaio_requerente_notificacoes->caption() ?></span></td>
		<td data-name="usuaio_requerente_notificacoes"<?php echo $notificacoes->usuaio_requerente_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_usuaio_requerente_notificacoes">
<span<?php echo $notificacoes->usuaio_requerente_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->usuaio_requerente_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->tipo_alteracao_notificacoes->Visible) { // tipo_alteracao_notificacoes ?>
	<tr id="r_tipo_alteracao_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_tipo_alteracao_notificacoes"><?php echo $notificacoes->tipo_alteracao_notificacoes->caption() ?></span></td>
		<td data-name="tipo_alteracao_notificacoes"<?php echo $notificacoes->tipo_alteracao_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_tipo_alteracao_notificacoes">
<span<?php echo $notificacoes->tipo_alteracao_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->tipo_alteracao_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<tr id="r_notificacoes_config_id">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_notificacoes_config_id"><?php echo $notificacoes->notificacoes_config_id->caption() ?></span></td>
		<td data-name="notificacoes_config_id"<?php echo $notificacoes->notificacoes_config_id->cellAttributes() ?>>
<span id="el_notificacoes_notificacoes_config_id">
<span<?php echo $notificacoes->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->bool_view_notificacoes->Visible) { // bool_view_notificacoes ?>
	<tr id="r_bool_view_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_bool_view_notificacoes"><?php echo $notificacoes->bool_view_notificacoes->caption() ?></span></td>
		<td data-name="bool_view_notificacoes"<?php echo $notificacoes->bool_view_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_bool_view_notificacoes">
<span<?php echo $notificacoes->bool_view_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->bool_view_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->data_atualizacao_notificacoes->Visible) { // data_atualizacao_notificacoes ?>
	<tr id="r_data_atualizacao_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_data_atualizacao_notificacoes"><?php echo $notificacoes->data_atualizacao_notificacoes->caption() ?></span></td>
		<td data-name="data_atualizacao_notificacoes"<?php echo $notificacoes->data_atualizacao_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_data_atualizacao_notificacoes">
<span<?php echo $notificacoes->data_atualizacao_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->data_atualizacao_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes->bool_ativo_notificacoes->Visible) { // bool_ativo_notificacoes ?>
	<tr id="r_bool_ativo_notificacoes">
		<td class="<?php echo $notificacoes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_bool_ativo_notificacoes"><?php echo $notificacoes->bool_ativo_notificacoes->caption() ?></span></td>
		<td data-name="bool_ativo_notificacoes"<?php echo $notificacoes->bool_ativo_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_bool_ativo_notificacoes">
<span<?php echo $notificacoes->bool_ativo_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->bool_ativo_notificacoes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$notificacoes_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_view->terminate();
?>
