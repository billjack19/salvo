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
$notificacoes_config_view = new notificacoes_config_view();

// Run the page
$notificacoes_config_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_config_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes_config->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fnotificacoes_configview = currentForm = new ew.Form("fnotificacoes_configview", "view");

// Form_CustomValidate event
fnotificacoes_configview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_configview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes_config->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $notificacoes_config_view->ExportOptions->render("body") ?>
<?php
	foreach ($notificacoes_config_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $notificacoes_config_view->showPageHeader(); ?>
<?php
$notificacoes_config_view->showMessage();
?>
<form name="fnotificacoes_configview" id="fnotificacoes_configview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_config_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_config_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_config">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_config_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($notificacoes_config->id_notificacoes_config->Visible) { // id_notificacoes_config ?>
	<tr id="r_id_notificacoes_config">
		<td class="<?php echo $notificacoes_config_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_config_id_notificacoes_config"><?php echo $notificacoes_config->id_notificacoes_config->caption() ?></span></td>
		<td data-name="id_notificacoes_config"<?php echo $notificacoes_config->id_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_id_notificacoes_config">
<span<?php echo $notificacoes_config->id_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->id_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_config->area_notificacoes_config->Visible) { // area_notificacoes_config ?>
	<tr id="r_area_notificacoes_config">
		<td class="<?php echo $notificacoes_config_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_config_area_notificacoes_config"><?php echo $notificacoes_config->area_notificacoes_config->caption() ?></span></td>
		<td data-name="area_notificacoes_config"<?php echo $notificacoes_config->area_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_area_notificacoes_config">
<span<?php echo $notificacoes_config->area_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->area_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_config->tipo_alteracao_notificacoes_config->Visible) { // tipo_alteracao_notificacoes_config ?>
	<tr id="r_tipo_alteracao_notificacoes_config">
		<td class="<?php echo $notificacoes_config_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_config_tipo_alteracao_notificacoes_config"><?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->caption() ?></span></td>
		<td data-name="tipo_alteracao_notificacoes_config"<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_tipo_alteracao_notificacoes_config">
<span<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_config->data_atualizacao_notificacoes_config->Visible) { // data_atualizacao_notificacoes_config ?>
	<tr id="r_data_atualizacao_notificacoes_config">
		<td class="<?php echo $notificacoes_config_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_config_data_atualizacao_notificacoes_config"><?php echo $notificacoes_config->data_atualizacao_notificacoes_config->caption() ?></span></td>
		<td data-name="data_atualizacao_notificacoes_config"<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_data_atualizacao_notificacoes_config">
<span<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_config->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $notificacoes_config_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_config_usuario_id"><?php echo $notificacoes_config->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $notificacoes_config->usuario_id->cellAttributes() ?>>
<span id="el_notificacoes_config_usuario_id">
<span<?php echo $notificacoes_config->usuario_id->viewAttributes() ?>>
<?php echo $notificacoes_config->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($notificacoes_config->bool_ativo_notificacoes_config->Visible) { // bool_ativo_notificacoes_config ?>
	<tr id="r_bool_ativo_notificacoes_config">
		<td class="<?php echo $notificacoes_config_view->TableLeftColumnClass ?>"><span id="elh_notificacoes_config_bool_ativo_notificacoes_config"><?php echo $notificacoes_config->bool_ativo_notificacoes_config->caption() ?></span></td>
		<td data-name="bool_ativo_notificacoes_config"<?php echo $notificacoes_config->bool_ativo_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_bool_ativo_notificacoes_config">
<span<?php echo $notificacoes_config->bool_ativo_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->bool_ativo_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$notificacoes_config_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes_config->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_config_view->terminate();
?>
