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
$configurar_site_delete = new configurar_site_delete();

// Run the page
$configurar_site_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$configurar_site_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fconfigurar_sitedelete = currentForm = new ew.Form("fconfigurar_sitedelete", "delete");

// Form_CustomValidate event
fconfigurar_sitedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fconfigurar_sitedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $configurar_site_delete->showPageHeader(); ?>
<?php
$configurar_site_delete->showMessage();
?>
<form name="fconfigurar_sitedelete" id="fconfigurar_sitedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($configurar_site_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $configurar_site_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="configurar_site">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($configurar_site_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($configurar_site->id_configurar_site->Visible) { // id_configurar_site ?>
		<th class="<?php echo $configurar_site->id_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_id_configurar_site" class="configurar_site_id_configurar_site"><?php echo $configurar_site->id_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->titulo_configurar_site->Visible) { // titulo_configurar_site ?>
		<th class="<?php echo $configurar_site->titulo_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_titulo_configurar_site" class="configurar_site_titulo_configurar_site"><?php echo $configurar_site->titulo_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->titulo_menu_configurar_site->Visible) { // titulo_menu_configurar_site ?>
		<th class="<?php echo $configurar_site->titulo_menu_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_titulo_menu_configurar_site" class="configurar_site_titulo_menu_configurar_site"><?php echo $configurar_site->titulo_menu_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->cor_pagina_configurar_site->Visible) { // cor_pagina_configurar_site ?>
		<th class="<?php echo $configurar_site->cor_pagina_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_cor_pagina_configurar_site" class="configurar_site_cor_pagina_configurar_site"><?php echo $configurar_site->cor_pagina_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->contra_cor_pagina_configurar_site->Visible) { // contra_cor_pagina_configurar_site ?>
		<th class="<?php echo $configurar_site->contra_cor_pagina_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_contra_cor_pagina_configurar_site" class="configurar_site_contra_cor_pagina_configurar_site"><?php echo $configurar_site->contra_cor_pagina_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->imagem_icone_configurar_site->Visible) { // imagem_icone_configurar_site ?>
		<th class="<?php echo $configurar_site->imagem_icone_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_imagem_icone_configurar_site" class="configurar_site_imagem_icone_configurar_site"><?php echo $configurar_site->imagem_icone_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->imagem_logo_configurar_site->Visible) { // imagem_logo_configurar_site ?>
		<th class="<?php echo $configurar_site->imagem_logo_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_imagem_logo_configurar_site" class="configurar_site_imagem_logo_configurar_site"><?php echo $configurar_site->imagem_logo_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->data_atualizacao_configurar_site->Visible) { // data_atualizacao_configurar_site ?>
		<th class="<?php echo $configurar_site->data_atualizacao_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_data_atualizacao_configurar_site" class="configurar_site_data_atualizacao_configurar_site"><?php echo $configurar_site->data_atualizacao_configurar_site->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $configurar_site->usuario_id->headerCellClass() ?>"><span id="elh_configurar_site_usuario_id" class="configurar_site_usuario_id"><?php echo $configurar_site->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($configurar_site->bool_ativo_configurar_site->Visible) { // bool_ativo_configurar_site ?>
		<th class="<?php echo $configurar_site->bool_ativo_configurar_site->headerCellClass() ?>"><span id="elh_configurar_site_bool_ativo_configurar_site" class="configurar_site_bool_ativo_configurar_site"><?php echo $configurar_site->bool_ativo_configurar_site->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$configurar_site_delete->RecCnt = 0;
$i = 0;
while (!$configurar_site_delete->Recordset->EOF) {
	$configurar_site_delete->RecCnt++;
	$configurar_site_delete->RowCnt++;

	// Set row properties
	$configurar_site->resetAttributes();
	$configurar_site->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$configurar_site_delete->loadRowValues($configurar_site_delete->Recordset);

	// Render row
	$configurar_site_delete->renderRow();
?>
	<tr<?php echo $configurar_site->rowAttributes() ?>>
<?php if ($configurar_site->id_configurar_site->Visible) { // id_configurar_site ?>
		<td<?php echo $configurar_site->id_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_id_configurar_site" class="configurar_site_id_configurar_site">
<span<?php echo $configurar_site->id_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->id_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->titulo_configurar_site->Visible) { // titulo_configurar_site ?>
		<td<?php echo $configurar_site->titulo_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_titulo_configurar_site" class="configurar_site_titulo_configurar_site">
<span<?php echo $configurar_site->titulo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->titulo_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->titulo_menu_configurar_site->Visible) { // titulo_menu_configurar_site ?>
		<td<?php echo $configurar_site->titulo_menu_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_titulo_menu_configurar_site" class="configurar_site_titulo_menu_configurar_site">
<span<?php echo $configurar_site->titulo_menu_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->titulo_menu_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->cor_pagina_configurar_site->Visible) { // cor_pagina_configurar_site ?>
		<td<?php echo $configurar_site->cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_cor_pagina_configurar_site" class="configurar_site_cor_pagina_configurar_site">
<span<?php echo $configurar_site->cor_pagina_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->cor_pagina_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->contra_cor_pagina_configurar_site->Visible) { // contra_cor_pagina_configurar_site ?>
		<td<?php echo $configurar_site->contra_cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_contra_cor_pagina_configurar_site" class="configurar_site_contra_cor_pagina_configurar_site">
<span<?php echo $configurar_site->contra_cor_pagina_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->contra_cor_pagina_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->imagem_icone_configurar_site->Visible) { // imagem_icone_configurar_site ?>
		<td<?php echo $configurar_site->imagem_icone_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_imagem_icone_configurar_site" class="configurar_site_imagem_icone_configurar_site">
<span<?php echo $configurar_site->imagem_icone_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->imagem_icone_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->imagem_logo_configurar_site->Visible) { // imagem_logo_configurar_site ?>
		<td<?php echo $configurar_site->imagem_logo_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_imagem_logo_configurar_site" class="configurar_site_imagem_logo_configurar_site">
<span<?php echo $configurar_site->imagem_logo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->imagem_logo_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->data_atualizacao_configurar_site->Visible) { // data_atualizacao_configurar_site ?>
		<td<?php echo $configurar_site->data_atualizacao_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_data_atualizacao_configurar_site" class="configurar_site_data_atualizacao_configurar_site">
<span<?php echo $configurar_site->data_atualizacao_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->data_atualizacao_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $configurar_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_usuario_id" class="configurar_site_usuario_id">
<span<?php echo $configurar_site->usuario_id->viewAttributes() ?>>
<?php echo $configurar_site->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($configurar_site->bool_ativo_configurar_site->Visible) { // bool_ativo_configurar_site ?>
		<td<?php echo $configurar_site->bool_ativo_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_delete->RowCnt ?>_configurar_site_bool_ativo_configurar_site" class="configurar_site_bool_ativo_configurar_site">
<span<?php echo $configurar_site->bool_ativo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->bool_ativo_configurar_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$configurar_site_delete->Recordset->moveNext();
}
$configurar_site_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $configurar_site_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$configurar_site_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$configurar_site_delete->terminate();
?>
