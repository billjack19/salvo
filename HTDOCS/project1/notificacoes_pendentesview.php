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
$notificacoes_pendentes_view = new notificacoes_pendentes_view();

// Run the page
$notificacoes_pendentes_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_pendentes_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes_pendentes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fnotificacoes_pendentesview = currentForm = new ew.Form("fnotificacoes_pendentesview", "view");

// Form_CustomValidate event
fnotificacoes_pendentesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_pendentesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoes_pendentesview.lists["x_tipo_alteracao_notificacoes_pendentes"] = <?php echo $notificacoes_pendentes_view->tipo_alteracao_notificacoes_pendentes->Lookup->toClientList() ?>;
fnotificacoes_pendentesview.lists["x_tipo_alteracao_notificacoes_pendentes"].options = <?php echo JsonEncode($notificacoes_pendentes_view->tipo_alteracao_notificacoes_pendentes->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes_pendentes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $notificacoes_pendentes_view->ExportOptions->render("body") ?>
<?php
	foreach ($notificacoes_pendentes_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $notificacoes_pendentes_view->showPageHeader(); ?>
<?php
$notificacoes_pendentes_view->showMessage();
?>
<form name="fnotificacoes_pendentesview" id="fnotificacoes_pendentesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_pendentes_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_pendentes_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_pendentes">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_pendentes_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($notificacoes_pendentes->id_notificacoes_pendentes->Visible) { // id_notificacoes_pendentes ?>
	<tr id="r_id_notificacoes_pendentes">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_id_notificacoes_pendentes"><?php echo $notificacoes_pendentes->id_notificacoes_pendentes->caption() ?></span></td>
		<td data-name="id_notificacoes_pendentes"<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_id_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_pendentes->descricao_notificacoes_pendentes->Visible) { // descricao_notificacoes_pendentes ?>
	<tr id="r_descricao_notificacoes_pendentes">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_descricao_notificacoes_pendentes"><?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->caption() ?></span></td>
		<td data-name="descricao_notificacoes_pendentes"<?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_descricao_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->Visible) { // usuario_atuador_notificacoes_pendentes ?>
	<tr id="r_usuario_atuador_notificacoes_pendentes">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes"><?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->caption() ?></span></td>
		<td data-name="usuario_atuador_notificacoes_pendentes"<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->Visible) { // usuaio_requerente_notificacoes_pendentes ?>
	<tr id="r_usuaio_requerente_notificacoes_pendentes">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes"><?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->caption() ?></span></td>
		<td data-name="usuaio_requerente_notificacoes_pendentes"<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Visible) { // tipo_alteracao_notificacoes_pendentes ?>
	<tr id="r_tipo_alteracao_notificacoes_pendentes">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes"><?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->caption() ?></span></td>
		<td data-name="tipo_alteracao_notificacoes_pendentes"<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_pendentes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<tr id="r_notificacoes_config_id">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_notificacoes_config_id"><?php echo $notificacoes_pendentes->notificacoes_config_id->caption() ?></span></td>
		<td data-name="notificacoes_config_id"<?php echo $notificacoes_pendentes->notificacoes_config_id->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_notificacoes_config_id">
<span<?php echo $notificacoes_pendentes->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->Visible) { // data_atualizacao_notificacoes_pendentes ?>
	<tr id="r_data_atualizacao_notificacoes_pendentes">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes"><?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->caption() ?></span></td>
		<td data-name="data_atualizacao_notificacoes_pendentes"<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->Visible) { // bool_ativo_notificacoes_pendentes ?>
	<tr id="r_bool_ativo_notificacoes_pendentes">
		<td class="<?php echo $notificacoes_pendentes_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_pendentes_bool_ativo_notificacoes_pendentes"><?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->caption() ?></span></td>
		<td data-name="bool_ativo_notificacoes_pendentes"<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_bool_ativo_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$notificacoes_pendentes_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes_pendentes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_pendentes_view->terminate();
?>
