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
$videos_view = new videos_view();

// Run the page
$videos_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$videos_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$videos->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fvideosview = currentForm = new ew.Form("fvideosview", "view");

// Form_CustomValidate event
fvideosview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvideosview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$videos->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $videos_view->ExportOptions->render("body") ?>
<?php
	foreach ($videos_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $videos_view->showPageHeader(); ?>
<?php
$videos_view->showMessage();
?>
<form name="fvideosview" id="fvideosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($videos_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $videos_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="videos">
<input type="hidden" name="modal" value="<?php echo (int)$videos_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($videos->id_videos->Visible) { // id_videos ?>
	<tr id="r_id_videos">
		<td class="<?php echo $videos_view->TableLeftColumnClass ?>"><span id="elh_videos_id_videos"><?php echo $videos->id_videos->caption() ?></span></td>
		<td data-name="id_videos"<?php echo $videos->id_videos->cellAttributes() ?>>
<span id="el_videos_id_videos">
<span<?php echo $videos->id_videos->viewAttributes() ?>>
<?php echo $videos->id_videos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($videos->descricao_videos->Visible) { // descricao_videos ?>
	<tr id="r_descricao_videos">
		<td class="<?php echo $videos_view->TableLeftColumnClass ?>"><span id="elh_videos_descricao_videos"><?php echo $videos->descricao_videos->caption() ?></span></td>
		<td data-name="descricao_videos"<?php echo $videos->descricao_videos->cellAttributes() ?>>
<span id="el_videos_descricao_videos">
<span<?php echo $videos->descricao_videos->viewAttributes() ?>>
<?php echo $videos->descricao_videos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($videos->link_videos->Visible) { // link_videos ?>
	<tr id="r_link_videos">
		<td class="<?php echo $videos_view->TableLeftColumnClass ?>"><span id="elh_videos_link_videos"><?php echo $videos->link_videos->caption() ?></span></td>
		<td data-name="link_videos"<?php echo $videos->link_videos->cellAttributes() ?>>
<span id="el_videos_link_videos">
<span<?php echo $videos->link_videos->viewAttributes() ?>>
<?php echo $videos->link_videos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($videos->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<tr id="r_pagina_principal_id">
		<td class="<?php echo $videos_view->TableLeftColumnClass ?>"><span id="elh_videos_pagina_principal_id"><?php echo $videos->pagina_principal_id->caption() ?></span></td>
		<td data-name="pagina_principal_id"<?php echo $videos->pagina_principal_id->cellAttributes() ?>>
<span id="el_videos_pagina_principal_id">
<span<?php echo $videos->pagina_principal_id->viewAttributes() ?>>
<?php echo $videos->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($videos->data_atualizacao_videos->Visible) { // data_atualizacao_videos ?>
	<tr id="r_data_atualizacao_videos">
		<td class="<?php echo $videos_view->TableLeftColumnClass ?>"><span id="elh_videos_data_atualizacao_videos"><?php echo $videos->data_atualizacao_videos->caption() ?></span></td>
		<td data-name="data_atualizacao_videos"<?php echo $videos->data_atualizacao_videos->cellAttributes() ?>>
<span id="el_videos_data_atualizacao_videos">
<span<?php echo $videos->data_atualizacao_videos->viewAttributes() ?>>
<?php echo $videos->data_atualizacao_videos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($videos->bool_ativo_videos->Visible) { // bool_ativo_videos ?>
	<tr id="r_bool_ativo_videos">
		<td class="<?php echo $videos_view->TableLeftColumnClass ?>"><span id="elh_videos_bool_ativo_videos"><?php echo $videos->bool_ativo_videos->caption() ?></span></td>
		<td data-name="bool_ativo_videos"<?php echo $videos->bool_ativo_videos->cellAttributes() ?>>
<span id="el_videos_bool_ativo_videos">
<span<?php echo $videos->bool_ativo_videos->viewAttributes() ?>>
<?php echo $videos->bool_ativo_videos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$videos_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$videos->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$videos_view->terminate();
?>
