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
$estado_view = new estado_view();

// Run the page
$estado_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$estado_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$estado->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var festadoview = currentForm = new ew.Form("festadoview", "view");

// Form_CustomValidate event
festadoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
festadoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$estado->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $estado_view->ExportOptions->render("body") ?>
<?php
	foreach ($estado_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $estado_view->showPageHeader(); ?>
<?php
$estado_view->showMessage();
?>
<form name="festadoview" id="festadoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($estado_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $estado_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="estado">
<input type="hidden" name="modal" value="<?php echo (int)$estado_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($estado->id_estado->Visible) { // id_estado ?>
	<tr id="r_id_estado">
		<td class="<?php echo $estado_view->TableLeftColumnClass ?>"><span id="elh_estado_id_estado"><?php echo $estado->id_estado->caption() ?></span></td>
		<td data-name="id_estado"<?php echo $estado->id_estado->cellAttributes() ?>>
<span id="el_estado_id_estado">
<span<?php echo $estado->id_estado->viewAttributes() ?>>
<?php echo $estado->id_estado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($estado->descricao_estado->Visible) { // descricao_estado ?>
	<tr id="r_descricao_estado">
		<td class="<?php echo $estado_view->TableLeftColumnClass ?>"><span id="elh_estado_descricao_estado"><?php echo $estado->descricao_estado->caption() ?></span></td>
		<td data-name="descricao_estado"<?php echo $estado->descricao_estado->cellAttributes() ?>>
<span id="el_estado_descricao_estado">
<span<?php echo $estado->descricao_estado->viewAttributes() ?>>
<?php echo $estado->descricao_estado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($estado->sigla_estado->Visible) { // sigla_estado ?>
	<tr id="r_sigla_estado">
		<td class="<?php echo $estado_view->TableLeftColumnClass ?>"><span id="elh_estado_sigla_estado"><?php echo $estado->sigla_estado->caption() ?></span></td>
		<td data-name="sigla_estado"<?php echo $estado->sigla_estado->cellAttributes() ?>>
<span id="el_estado_sigla_estado">
<span<?php echo $estado->sigla_estado->viewAttributes() ?>>
<?php echo $estado->sigla_estado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($estado->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $estado_view->TableLeftColumnClass ?>"><span id="elh_estado_usuario_id"><?php echo $estado->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $estado->usuario_id->cellAttributes() ?>>
<span id="el_estado_usuario_id">
<span<?php echo $estado->usuario_id->viewAttributes() ?>>
<?php echo $estado->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($estado->bool_ativo_estado->Visible) { // bool_ativo_estado ?>
	<tr id="r_bool_ativo_estado">
		<td class="<?php echo $estado_view->TableLeftColumnClass ?>"><span id="elh_estado_bool_ativo_estado"><?php echo $estado->bool_ativo_estado->caption() ?></span></td>
		<td data-name="bool_ativo_estado"<?php echo $estado->bool_ativo_estado->cellAttributes() ?>>
<span id="el_estado_bool_ativo_estado">
<span<?php echo $estado->bool_ativo_estado->viewAttributes() ?>>
<?php echo $estado->bool_ativo_estado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$estado_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$estado->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$estado_view->terminate();
?>
