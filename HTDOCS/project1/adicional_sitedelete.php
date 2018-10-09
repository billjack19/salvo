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
$adicional_site_delete = new adicional_site_delete();

// Run the page
$adicional_site_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$adicional_site_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fadicional_sitedelete = currentForm = new ew.Form("fadicional_sitedelete", "delete");

// Form_CustomValidate event
fadicional_sitedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fadicional_sitedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $adicional_site_delete->showPageHeader(); ?>
<?php
$adicional_site_delete->showMessage();
?>
<form name="fadicional_sitedelete" id="fadicional_sitedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($adicional_site_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $adicional_site_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="adicional_site">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($adicional_site_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($adicional_site->id_adicional_site->Visible) { // id_adicional_site ?>
		<th class="<?php echo $adicional_site->id_adicional_site->headerCellClass() ?>"><span id="elh_adicional_site_id_adicional_site" class="adicional_site_id_adicional_site"><?php echo $adicional_site->id_adicional_site->caption() ?></span></th>
<?php } ?>
<?php if ($adicional_site->titulo_adicional_site->Visible) { // titulo_adicional_site ?>
		<th class="<?php echo $adicional_site->titulo_adicional_site->headerCellClass() ?>"><span id="elh_adicional_site_titulo_adicional_site" class="adicional_site_titulo_adicional_site"><?php echo $adicional_site->titulo_adicional_site->caption() ?></span></th>
<?php } ?>
<?php if ($adicional_site->imagem_adicional_site->Visible) { // imagem_adicional_site ?>
		<th class="<?php echo $adicional_site->imagem_adicional_site->headerCellClass() ?>"><span id="elh_adicional_site_imagem_adicional_site" class="adicional_site_imagem_adicional_site"><?php echo $adicional_site->imagem_adicional_site->caption() ?></span></th>
<?php } ?>
<?php if ($adicional_site->saiba_mais_id->Visible) { // saiba_mais_id ?>
		<th class="<?php echo $adicional_site->saiba_mais_id->headerCellClass() ?>"><span id="elh_adicional_site_saiba_mais_id" class="adicional_site_saiba_mais_id"><?php echo $adicional_site->saiba_mais_id->caption() ?></span></th>
<?php } ?>
<?php if ($adicional_site->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $adicional_site->usuario_id->headerCellClass() ?>"><span id="elh_adicional_site_usuario_id" class="adicional_site_usuario_id"><?php echo $adicional_site->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($adicional_site->data_atualizacao_adicional_site->Visible) { // data_atualizacao_adicional_site ?>
		<th class="<?php echo $adicional_site->data_atualizacao_adicional_site->headerCellClass() ?>"><span id="elh_adicional_site_data_atualizacao_adicional_site" class="adicional_site_data_atualizacao_adicional_site"><?php echo $adicional_site->data_atualizacao_adicional_site->caption() ?></span></th>
<?php } ?>
<?php if ($adicional_site->bool_ativo_adicional_site->Visible) { // bool_ativo_adicional_site ?>
		<th class="<?php echo $adicional_site->bool_ativo_adicional_site->headerCellClass() ?>"><span id="elh_adicional_site_bool_ativo_adicional_site" class="adicional_site_bool_ativo_adicional_site"><?php echo $adicional_site->bool_ativo_adicional_site->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$adicional_site_delete->RecCnt = 0;
$i = 0;
while (!$adicional_site_delete->Recordset->EOF) {
	$adicional_site_delete->RecCnt++;
	$adicional_site_delete->RowCnt++;

	// Set row properties
	$adicional_site->resetAttributes();
	$adicional_site->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$adicional_site_delete->loadRowValues($adicional_site_delete->Recordset);

	// Render row
	$adicional_site_delete->renderRow();
?>
	<tr<?php echo $adicional_site->rowAttributes() ?>>
<?php if ($adicional_site->id_adicional_site->Visible) { // id_adicional_site ?>
		<td<?php echo $adicional_site->id_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_delete->RowCnt ?>_adicional_site_id_adicional_site" class="adicional_site_id_adicional_site">
<span<?php echo $adicional_site->id_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->id_adicional_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($adicional_site->titulo_adicional_site->Visible) { // titulo_adicional_site ?>
		<td<?php echo $adicional_site->titulo_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_delete->RowCnt ?>_adicional_site_titulo_adicional_site" class="adicional_site_titulo_adicional_site">
<span<?php echo $adicional_site->titulo_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->titulo_adicional_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($adicional_site->imagem_adicional_site->Visible) { // imagem_adicional_site ?>
		<td<?php echo $adicional_site->imagem_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_delete->RowCnt ?>_adicional_site_imagem_adicional_site" class="adicional_site_imagem_adicional_site">
<span<?php echo $adicional_site->imagem_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->imagem_adicional_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($adicional_site->saiba_mais_id->Visible) { // saiba_mais_id ?>
		<td<?php echo $adicional_site->saiba_mais_id->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_delete->RowCnt ?>_adicional_site_saiba_mais_id" class="adicional_site_saiba_mais_id">
<span<?php echo $adicional_site->saiba_mais_id->viewAttributes() ?>>
<?php echo $adicional_site->saiba_mais_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($adicional_site->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $adicional_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_delete->RowCnt ?>_adicional_site_usuario_id" class="adicional_site_usuario_id">
<span<?php echo $adicional_site->usuario_id->viewAttributes() ?>>
<?php echo $adicional_site->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($adicional_site->data_atualizacao_adicional_site->Visible) { // data_atualizacao_adicional_site ?>
		<td<?php echo $adicional_site->data_atualizacao_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_delete->RowCnt ?>_adicional_site_data_atualizacao_adicional_site" class="adicional_site_data_atualizacao_adicional_site">
<span<?php echo $adicional_site->data_atualizacao_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->data_atualizacao_adicional_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($adicional_site->bool_ativo_adicional_site->Visible) { // bool_ativo_adicional_site ?>
		<td<?php echo $adicional_site->bool_ativo_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_delete->RowCnt ?>_adicional_site_bool_ativo_adicional_site" class="adicional_site_bool_ativo_adicional_site">
<span<?php echo $adicional_site->bool_ativo_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->bool_ativo_adicional_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$adicional_site_delete->Recordset->moveNext();
}
$adicional_site_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $adicional_site_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$adicional_site_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$adicional_site_delete->terminate();
?>
