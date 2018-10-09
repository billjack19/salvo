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
$videos_delete = new videos_delete();

// Run the page
$videos_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$videos_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fvideosdelete = currentForm = new ew.Form("fvideosdelete", "delete");

// Form_CustomValidate event
fvideosdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvideosdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $videos_delete->showPageHeader(); ?>
<?php
$videos_delete->showMessage();
?>
<form name="fvideosdelete" id="fvideosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($videos_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $videos_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="videos">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($videos_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($videos->id_videos->Visible) { // id_videos ?>
		<th class="<?php echo $videos->id_videos->headerCellClass() ?>"><span id="elh_videos_id_videos" class="videos_id_videos"><?php echo $videos->id_videos->caption() ?></span></th>
<?php } ?>
<?php if ($videos->link_videos->Visible) { // link_videos ?>
		<th class="<?php echo $videos->link_videos->headerCellClass() ?>"><span id="elh_videos_link_videos" class="videos_link_videos"><?php echo $videos->link_videos->caption() ?></span></th>
<?php } ?>
<?php if ($videos->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<th class="<?php echo $videos->pagina_principal_id->headerCellClass() ?>"><span id="elh_videos_pagina_principal_id" class="videos_pagina_principal_id"><?php echo $videos->pagina_principal_id->caption() ?></span></th>
<?php } ?>
<?php if ($videos->data_atualizacao_videos->Visible) { // data_atualizacao_videos ?>
		<th class="<?php echo $videos->data_atualizacao_videos->headerCellClass() ?>"><span id="elh_videos_data_atualizacao_videos" class="videos_data_atualizacao_videos"><?php echo $videos->data_atualizacao_videos->caption() ?></span></th>
<?php } ?>
<?php if ($videos->bool_ativo_videos->Visible) { // bool_ativo_videos ?>
		<th class="<?php echo $videos->bool_ativo_videos->headerCellClass() ?>"><span id="elh_videos_bool_ativo_videos" class="videos_bool_ativo_videos"><?php echo $videos->bool_ativo_videos->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$videos_delete->RecCnt = 0;
$i = 0;
while (!$videos_delete->Recordset->EOF) {
	$videos_delete->RecCnt++;
	$videos_delete->RowCnt++;

	// Set row properties
	$videos->resetAttributes();
	$videos->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$videos_delete->loadRowValues($videos_delete->Recordset);

	// Render row
	$videos_delete->renderRow();
?>
	<tr<?php echo $videos->rowAttributes() ?>>
<?php if ($videos->id_videos->Visible) { // id_videos ?>
		<td<?php echo $videos->id_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_delete->RowCnt ?>_videos_id_videos" class="videos_id_videos">
<span<?php echo $videos->id_videos->viewAttributes() ?>>
<?php echo $videos->id_videos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($videos->link_videos->Visible) { // link_videos ?>
		<td<?php echo $videos->link_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_delete->RowCnt ?>_videos_link_videos" class="videos_link_videos">
<span<?php echo $videos->link_videos->viewAttributes() ?>>
<?php echo $videos->link_videos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($videos->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td<?php echo $videos->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $videos_delete->RowCnt ?>_videos_pagina_principal_id" class="videos_pagina_principal_id">
<span<?php echo $videos->pagina_principal_id->viewAttributes() ?>>
<?php echo $videos->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($videos->data_atualizacao_videos->Visible) { // data_atualizacao_videos ?>
		<td<?php echo $videos->data_atualizacao_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_delete->RowCnt ?>_videos_data_atualizacao_videos" class="videos_data_atualizacao_videos">
<span<?php echo $videos->data_atualizacao_videos->viewAttributes() ?>>
<?php echo $videos->data_atualizacao_videos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($videos->bool_ativo_videos->Visible) { // bool_ativo_videos ?>
		<td<?php echo $videos->bool_ativo_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_delete->RowCnt ?>_videos_bool_ativo_videos" class="videos_bool_ativo_videos">
<span<?php echo $videos->bool_ativo_videos->viewAttributes() ?>>
<?php echo $videos->bool_ativo_videos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$videos_delete->Recordset->moveNext();
}
$videos_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $videos_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$videos_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$videos_delete->terminate();
?>
