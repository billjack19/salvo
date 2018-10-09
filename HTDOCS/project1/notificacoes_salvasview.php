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
$notificacoes_salvas_view = new notificacoes_salvas_view();

// Run the page
$notificacoes_salvas_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_salvas_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes_salvas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fnotificacoes_salvasview = currentForm = new ew.Form("fnotificacoes_salvasview", "view");

// Form_CustomValidate event
fnotificacoes_salvasview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_salvasview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes_salvas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $notificacoes_salvas_view->ExportOptions->render("body") ?>
<?php
	foreach ($notificacoes_salvas_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $notificacoes_salvas_view->showPageHeader(); ?>
<?php
$notificacoes_salvas_view->showMessage();
?>
<form name="fnotificacoes_salvasview" id="fnotificacoes_salvasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_salvas_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_salvas_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_salvas">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_salvas_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($notificacoes_salvas->id_notificacoes_salvas->Visible) { // id_notificacoes_salvas ?>
	<tr id="r_id_notificacoes_salvas">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_id_notificacoes_salvas"><?php echo $notificacoes_salvas->id_notificacoes_salvas->caption() ?></span></td>
		<td data-name="id_notificacoes_salvas"<?php echo $notificacoes_salvas->id_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_id_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->id_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->id_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_salvas->descricao_notificacoes_salvas->Visible) { // descricao_notificacoes_salvas ?>
	<tr id="r_descricao_notificacoes_salvas">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_descricao_notificacoes_salvas"><?php echo $notificacoes_salvas->descricao_notificacoes_salvas->caption() ?></span></td>
		<td data-name="descricao_notificacoes_salvas"<?php echo $notificacoes_salvas->descricao_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_descricao_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->descricao_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->descricao_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->Visible) { // usuario_atuador_notificacoes_salvas ?>
	<tr id="r_usuario_atuador_notificacoes_salvas">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_usuario_atuador_notificacoes_salvas"><?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->caption() ?></span></td>
		<td data-name="usuario_atuador_notificacoes_salvas"<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_usuario_atuador_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->Visible) { // usuaio_requerente_notificacoes_salvas ?>
	<tr id="r_usuaio_requerente_notificacoes_salvas">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_usuaio_requerente_notificacoes_salvas"><?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->caption() ?></span></td>
		<td data-name="usuaio_requerente_notificacoes_salvas"<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_usuaio_requerente_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->Visible) { // tipo_alteracao_notificacoes_salvas ?>
	<tr id="r_tipo_alteracao_notificacoes_salvas">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_tipo_alteracao_notificacoes_salvas"><?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->caption() ?></span></td>
		<td data-name="tipo_alteracao_notificacoes_salvas"<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_tipo_alteracao_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_salvas->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<tr id="r_notificacoes_config_id">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_notificacoes_config_id"><?php echo $notificacoes_salvas->notificacoes_config_id->caption() ?></span></td>
		<td data-name="notificacoes_config_id"<?php echo $notificacoes_salvas->notificacoes_config_id->cellAttributes() ?>>
<span id="el_notificacoes_salvas_notificacoes_config_id">
<span<?php echo $notificacoes_salvas->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes_salvas->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->Visible) { // data_atualizacao_notificacoes_salvas ?>
	<tr id="r_data_atualizacao_notificacoes_salvas">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_data_atualizacao_notificacoes_salvas"><?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->caption() ?></span></td>
		<td data-name="data_atualizacao_notificacoes_salvas"<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_data_atualizacao_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_salvas->bool_ativo_notificacoes_salvas->Visible) { // bool_ativo_notificacoes_salvas ?>
	<tr id="r_bool_ativo_notificacoes_salvas">
		<td class="<?php echo $notificacoes_salvas_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_salvas_bool_ativo_notificacoes_salvas"><?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->caption() ?></span></td>
		<td data-name="bool_ativo_notificacoes_salvas"<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_bool_ativo_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$notificacoes_salvas_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes_salvas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_salvas_view->terminate();
?>
