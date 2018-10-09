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
$destaque_grupo_delete = new destaque_grupo_delete();

// Run the page
$destaque_grupo_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$destaque_grupo_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fdestaque_grupodelete = currentForm = new ew.Form("fdestaque_grupodelete", "delete");

// Form_CustomValidate event
fdestaque_grupodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdestaque_grupodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $destaque_grupo_delete->showPageHeader(); ?>
<?php
$destaque_grupo_delete->showMessage();
?>
<form name="fdestaque_grupodelete" id="fdestaque_grupodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($destaque_grupo_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $destaque_grupo_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="destaque_grupo">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($destaque_grupo_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($destaque_grupo->id_destaque_grupo->Visible) { // id_destaque_grupo ?>
		<th class="<?php echo $destaque_grupo->id_destaque_grupo->headerCellClass() ?>"><span id="elh_destaque_grupo_id_destaque_grupo" class="destaque_grupo_id_destaque_grupo"><?php echo $destaque_grupo->id_destaque_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($destaque_grupo->titulo_destaque_grupo->Visible) { // titulo_destaque_grupo ?>
		<th class="<?php echo $destaque_grupo->titulo_destaque_grupo->headerCellClass() ?>"><span id="elh_destaque_grupo_titulo_destaque_grupo" class="destaque_grupo_titulo_destaque_grupo"><?php echo $destaque_grupo->titulo_destaque_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($destaque_grupo->grupo_id->Visible) { // grupo_id ?>
		<th class="<?php echo $destaque_grupo->grupo_id->headerCellClass() ?>"><span id="elh_destaque_grupo_grupo_id" class="destaque_grupo_grupo_id"><?php echo $destaque_grupo->grupo_id->caption() ?></span></th>
<?php } ?>
<?php if ($destaque_grupo->imagem_destaque_grupo->Visible) { // imagem_destaque_grupo ?>
		<th class="<?php echo $destaque_grupo->imagem_destaque_grupo->headerCellClass() ?>"><span id="elh_destaque_grupo_imagem_destaque_grupo" class="destaque_grupo_imagem_destaque_grupo"><?php echo $destaque_grupo->imagem_destaque_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($destaque_grupo->configurar_site_id->Visible) { // configurar_site_id ?>
		<th class="<?php echo $destaque_grupo->configurar_site_id->headerCellClass() ?>"><span id="elh_destaque_grupo_configurar_site_id" class="destaque_grupo_configurar_site_id"><?php echo $destaque_grupo->configurar_site_id->caption() ?></span></th>
<?php } ?>
<?php if ($destaque_grupo->data_atualizacao_destaque_grupo->Visible) { // data_atualizacao_destaque_grupo ?>
		<th class="<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->headerCellClass() ?>"><span id="elh_destaque_grupo_data_atualizacao_destaque_grupo" class="destaque_grupo_data_atualizacao_destaque_grupo"><?php echo $destaque_grupo->data_atualizacao_destaque_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($destaque_grupo->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $destaque_grupo->usuario_id->headerCellClass() ?>"><span id="elh_destaque_grupo_usuario_id" class="destaque_grupo_usuario_id"><?php echo $destaque_grupo->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($destaque_grupo->bool_ativo_destaque_grupo->Visible) { // bool_ativo_destaque_grupo ?>
		<th class="<?php echo $destaque_grupo->bool_ativo_destaque_grupo->headerCellClass() ?>"><span id="elh_destaque_grupo_bool_ativo_destaque_grupo" class="destaque_grupo_bool_ativo_destaque_grupo"><?php echo $destaque_grupo->bool_ativo_destaque_grupo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$destaque_grupo_delete->RecCnt = 0;
$i = 0;
while (!$destaque_grupo_delete->Recordset->EOF) {
	$destaque_grupo_delete->RecCnt++;
	$destaque_grupo_delete->RowCnt++;

	// Set row properties
	$destaque_grupo->resetAttributes();
	$destaque_grupo->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$destaque_grupo_delete->loadRowValues($destaque_grupo_delete->Recordset);

	// Render row
	$destaque_grupo_delete->renderRow();
?>
	<tr<?php echo $destaque_grupo->rowAttributes() ?>>
<?php if ($destaque_grupo->id_destaque_grupo->Visible) { // id_destaque_grupo ?>
		<td<?php echo $destaque_grupo->id_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_id_destaque_grupo" class="destaque_grupo_id_destaque_grupo">
<span<?php echo $destaque_grupo->id_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->id_destaque_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($destaque_grupo->titulo_destaque_grupo->Visible) { // titulo_destaque_grupo ?>
		<td<?php echo $destaque_grupo->titulo_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_titulo_destaque_grupo" class="destaque_grupo_titulo_destaque_grupo">
<span<?php echo $destaque_grupo->titulo_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->titulo_destaque_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($destaque_grupo->grupo_id->Visible) { // grupo_id ?>
		<td<?php echo $destaque_grupo->grupo_id->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_grupo_id" class="destaque_grupo_grupo_id">
<span<?php echo $destaque_grupo->grupo_id->viewAttributes() ?>>
<?php echo $destaque_grupo->grupo_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($destaque_grupo->imagem_destaque_grupo->Visible) { // imagem_destaque_grupo ?>
		<td<?php echo $destaque_grupo->imagem_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_imagem_destaque_grupo" class="destaque_grupo_imagem_destaque_grupo">
<span<?php echo $destaque_grupo->imagem_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->imagem_destaque_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($destaque_grupo->configurar_site_id->Visible) { // configurar_site_id ?>
		<td<?php echo $destaque_grupo->configurar_site_id->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_configurar_site_id" class="destaque_grupo_configurar_site_id">
<span<?php echo $destaque_grupo->configurar_site_id->viewAttributes() ?>>
<?php echo $destaque_grupo->configurar_site_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($destaque_grupo->data_atualizacao_destaque_grupo->Visible) { // data_atualizacao_destaque_grupo ?>
		<td<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_data_atualizacao_destaque_grupo" class="destaque_grupo_data_atualizacao_destaque_grupo">
<span<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($destaque_grupo->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $destaque_grupo->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_usuario_id" class="destaque_grupo_usuario_id">
<span<?php echo $destaque_grupo->usuario_id->viewAttributes() ?>>
<?php echo $destaque_grupo->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($destaque_grupo->bool_ativo_destaque_grupo->Visible) { // bool_ativo_destaque_grupo ?>
		<td<?php echo $destaque_grupo->bool_ativo_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_delete->RowCnt ?>_destaque_grupo_bool_ativo_destaque_grupo" class="destaque_grupo_bool_ativo_destaque_grupo">
<span<?php echo $destaque_grupo->bool_ativo_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->bool_ativo_destaque_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$destaque_grupo_delete->Recordset->moveNext();
}
$destaque_grupo_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $destaque_grupo_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$destaque_grupo_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$destaque_grupo_delete->terminate();
?>
