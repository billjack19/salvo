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
$grupo_delete = new grupo_delete();

// Run the page
$grupo_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$grupo_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fgrupodelete = currentForm = new ew.Form("fgrupodelete", "delete");

// Form_CustomValidate event
fgrupodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgrupodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $grupo_delete->showPageHeader(); ?>
<?php
$grupo_delete->showMessage();
?>
<form name="fgrupodelete" id="fgrupodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($grupo_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $grupo_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="grupo">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($grupo_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($grupo->id_grupo->Visible) { // id_grupo ?>
		<th class="<?php echo $grupo->id_grupo->headerCellClass() ?>"><span id="elh_grupo_id_grupo" class="grupo_id_grupo"><?php echo $grupo->id_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($grupo->descricao_grupo->Visible) { // descricao_grupo ?>
		<th class="<?php echo $grupo->descricao_grupo->headerCellClass() ?>"><span id="elh_grupo_descricao_grupo" class="grupo_descricao_grupo"><?php echo $grupo->descricao_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($grupo->imagem_grupo->Visible) { // imagem_grupo ?>
		<th class="<?php echo $grupo->imagem_grupo->headerCellClass() ?>"><span id="elh_grupo_imagem_grupo" class="grupo_imagem_grupo"><?php echo $grupo->imagem_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($grupo->data_atualizacao_grupo->Visible) { // data_atualizacao_grupo ?>
		<th class="<?php echo $grupo->data_atualizacao_grupo->headerCellClass() ?>"><span id="elh_grupo_data_atualizacao_grupo" class="grupo_data_atualizacao_grupo"><?php echo $grupo->data_atualizacao_grupo->caption() ?></span></th>
<?php } ?>
<?php if ($grupo->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $grupo->usuario_id->headerCellClass() ?>"><span id="elh_grupo_usuario_id" class="grupo_usuario_id"><?php echo $grupo->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($grupo->bool_ativo_grupo->Visible) { // bool_ativo_grupo ?>
		<th class="<?php echo $grupo->bool_ativo_grupo->headerCellClass() ?>"><span id="elh_grupo_bool_ativo_grupo" class="grupo_bool_ativo_grupo"><?php echo $grupo->bool_ativo_grupo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$grupo_delete->RecCnt = 0;
$i = 0;
while (!$grupo_delete->Recordset->EOF) {
	$grupo_delete->RecCnt++;
	$grupo_delete->RowCnt++;

	// Set row properties
	$grupo->resetAttributes();
	$grupo->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$grupo_delete->loadRowValues($grupo_delete->Recordset);

	// Render row
	$grupo_delete->renderRow();
?>
	<tr<?php echo $grupo->rowAttributes() ?>>
<?php if ($grupo->id_grupo->Visible) { // id_grupo ?>
		<td<?php echo $grupo->id_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_delete->RowCnt ?>_grupo_id_grupo" class="grupo_id_grupo">
<span<?php echo $grupo->id_grupo->viewAttributes() ?>>
<?php echo $grupo->id_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($grupo->descricao_grupo->Visible) { // descricao_grupo ?>
		<td<?php echo $grupo->descricao_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_delete->RowCnt ?>_grupo_descricao_grupo" class="grupo_descricao_grupo">
<span<?php echo $grupo->descricao_grupo->viewAttributes() ?>>
<?php echo $grupo->descricao_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($grupo->imagem_grupo->Visible) { // imagem_grupo ?>
		<td<?php echo $grupo->imagem_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_delete->RowCnt ?>_grupo_imagem_grupo" class="grupo_imagem_grupo">
<span<?php echo $grupo->imagem_grupo->viewAttributes() ?>>
<?php echo $grupo->imagem_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($grupo->data_atualizacao_grupo->Visible) { // data_atualizacao_grupo ?>
		<td<?php echo $grupo->data_atualizacao_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_delete->RowCnt ?>_grupo_data_atualizacao_grupo" class="grupo_data_atualizacao_grupo">
<span<?php echo $grupo->data_atualizacao_grupo->viewAttributes() ?>>
<?php echo $grupo->data_atualizacao_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($grupo->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $grupo->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $grupo_delete->RowCnt ?>_grupo_usuario_id" class="grupo_usuario_id">
<span<?php echo $grupo->usuario_id->viewAttributes() ?>>
<?php echo $grupo->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($grupo->bool_ativo_grupo->Visible) { // bool_ativo_grupo ?>
		<td<?php echo $grupo->bool_ativo_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_delete->RowCnt ?>_grupo_bool_ativo_grupo" class="grupo_bool_ativo_grupo">
<span<?php echo $grupo->bool_ativo_grupo->viewAttributes() ?>>
<?php echo $grupo->bool_ativo_grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$grupo_delete->Recordset->moveNext();
}
$grupo_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $grupo_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$grupo_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$grupo_delete->terminate();
?>
