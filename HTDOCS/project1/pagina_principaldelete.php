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
$pagina_principal_delete = new pagina_principal_delete();

// Run the page
$pagina_principal_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pagina_principal_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpagina_principaldelete = currentForm = new ew.Form("fpagina_principaldelete", "delete");

// Form_CustomValidate event
fpagina_principaldelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpagina_principaldelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pagina_principal_delete->showPageHeader(); ?>
<?php
$pagina_principal_delete->showMessage();
?>
<form name="fpagina_principaldelete" id="fpagina_principaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pagina_principal_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pagina_principal_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pagina_principal">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pagina_principal_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pagina_principal->id_pagina_principal->Visible) { // id_pagina_principal ?>
		<th class="<?php echo $pagina_principal->id_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_id_pagina_principal" class="pagina_principal_id_pagina_principal"><?php echo $pagina_principal->id_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->titulo_pagina_principal->Visible) { // titulo_pagina_principal ?>
		<th class="<?php echo $pagina_principal->titulo_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_titulo_pagina_principal" class="pagina_principal_titulo_pagina_principal"><?php echo $pagina_principal->titulo_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->titulo_menu_pagina_principal->Visible) { // titulo_menu_pagina_principal ?>
		<th class="<?php echo $pagina_principal->titulo_menu_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_titulo_menu_pagina_principal" class="pagina_principal_titulo_menu_pagina_principal"><?php echo $pagina_principal->titulo_menu_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->cor_pagina_pagina_principal->Visible) { // cor_pagina_pagina_principal ?>
		<th class="<?php echo $pagina_principal->cor_pagina_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_cor_pagina_pagina_principal" class="pagina_principal_cor_pagina_pagina_principal"><?php echo $pagina_principal->cor_pagina_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->contra_cor_pagina_pagina_principal->Visible) { // contra_cor_pagina_pagina_principal ?>
		<th class="<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_contra_cor_pagina_pagina_principal" class="pagina_principal_contra_cor_pagina_pagina_principal"><?php echo $pagina_principal->contra_cor_pagina_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->imagem_icone_pagina_principal->Visible) { // imagem_icone_pagina_principal ?>
		<th class="<?php echo $pagina_principal->imagem_icone_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_imagem_icone_pagina_principal" class="pagina_principal_imagem_icone_pagina_principal"><?php echo $pagina_principal->imagem_icone_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->imagem_logo_pagina_principal->Visible) { // imagem_logo_pagina_principal ?>
		<th class="<?php echo $pagina_principal->imagem_logo_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_imagem_logo_pagina_principal" class="pagina_principal_imagem_logo_pagina_principal"><?php echo $pagina_principal->imagem_logo_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->data_atualizacao_pagina_principal->Visible) { // data_atualizacao_pagina_principal ?>
		<th class="<?php echo $pagina_principal->data_atualizacao_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_data_atualizacao_pagina_principal" class="pagina_principal_data_atualizacao_pagina_principal"><?php echo $pagina_principal->data_atualizacao_pagina_principal->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $pagina_principal->usuario_id->headerCellClass() ?>"><span id="elh_pagina_principal_usuario_id" class="pagina_principal_usuario_id"><?php echo $pagina_principal->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($pagina_principal->bool_ativo_pagina_principal->Visible) { // bool_ativo_pagina_principal ?>
		<th class="<?php echo $pagina_principal->bool_ativo_pagina_principal->headerCellClass() ?>"><span id="elh_pagina_principal_bool_ativo_pagina_principal" class="pagina_principal_bool_ativo_pagina_principal"><?php echo $pagina_principal->bool_ativo_pagina_principal->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pagina_principal_delete->RecCnt = 0;
$i = 0;
while (!$pagina_principal_delete->Recordset->EOF) {
	$pagina_principal_delete->RecCnt++;
	$pagina_principal_delete->RowCnt++;

	// Set row properties
	$pagina_principal->resetAttributes();
	$pagina_principal->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pagina_principal_delete->loadRowValues($pagina_principal_delete->Recordset);

	// Render row
	$pagina_principal_delete->renderRow();
?>
	<tr<?php echo $pagina_principal->rowAttributes() ?>>
<?php if ($pagina_principal->id_pagina_principal->Visible) { // id_pagina_principal ?>
		<td<?php echo $pagina_principal->id_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_id_pagina_principal" class="pagina_principal_id_pagina_principal">
<span<?php echo $pagina_principal->id_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->id_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->titulo_pagina_principal->Visible) { // titulo_pagina_principal ?>
		<td<?php echo $pagina_principal->titulo_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_titulo_pagina_principal" class="pagina_principal_titulo_pagina_principal">
<span<?php echo $pagina_principal->titulo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->titulo_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->titulo_menu_pagina_principal->Visible) { // titulo_menu_pagina_principal ?>
		<td<?php echo $pagina_principal->titulo_menu_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_titulo_menu_pagina_principal" class="pagina_principal_titulo_menu_pagina_principal">
<span<?php echo $pagina_principal->titulo_menu_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->titulo_menu_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->cor_pagina_pagina_principal->Visible) { // cor_pagina_pagina_principal ?>
		<td<?php echo $pagina_principal->cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_cor_pagina_pagina_principal" class="pagina_principal_cor_pagina_pagina_principal">
<span<?php echo $pagina_principal->cor_pagina_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->cor_pagina_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->contra_cor_pagina_pagina_principal->Visible) { // contra_cor_pagina_pagina_principal ?>
		<td<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_contra_cor_pagina_pagina_principal" class="pagina_principal_contra_cor_pagina_pagina_principal">
<span<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->imagem_icone_pagina_principal->Visible) { // imagem_icone_pagina_principal ?>
		<td<?php echo $pagina_principal->imagem_icone_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_imagem_icone_pagina_principal" class="pagina_principal_imagem_icone_pagina_principal">
<span<?php echo $pagina_principal->imagem_icone_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->imagem_icone_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->imagem_logo_pagina_principal->Visible) { // imagem_logo_pagina_principal ?>
		<td<?php echo $pagina_principal->imagem_logo_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_imagem_logo_pagina_principal" class="pagina_principal_imagem_logo_pagina_principal">
<span<?php echo $pagina_principal->imagem_logo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->imagem_logo_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->data_atualizacao_pagina_principal->Visible) { // data_atualizacao_pagina_principal ?>
		<td<?php echo $pagina_principal->data_atualizacao_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_data_atualizacao_pagina_principal" class="pagina_principal_data_atualizacao_pagina_principal">
<span<?php echo $pagina_principal->data_atualizacao_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->data_atualizacao_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $pagina_principal->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_usuario_id" class="pagina_principal_usuario_id">
<span<?php echo $pagina_principal->usuario_id->viewAttributes() ?>>
<?php echo $pagina_principal->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pagina_principal->bool_ativo_pagina_principal->Visible) { // bool_ativo_pagina_principal ?>
		<td<?php echo $pagina_principal->bool_ativo_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_delete->RowCnt ?>_pagina_principal_bool_ativo_pagina_principal" class="pagina_principal_bool_ativo_pagina_principal">
<span<?php echo $pagina_principal->bool_ativo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->bool_ativo_pagina_principal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pagina_principal_delete->Recordset->moveNext();
}
$pagina_principal_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pagina_principal_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pagina_principal_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pagina_principal_delete->terminate();
?>
