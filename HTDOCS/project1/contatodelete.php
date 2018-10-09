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
$contato_delete = new contato_delete();

// Run the page
$contato_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$contato_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcontatodelete = currentForm = new ew.Form("fcontatodelete", "delete");

// Form_CustomValidate event
fcontatodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcontatodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $contato_delete->showPageHeader(); ?>
<?php
$contato_delete->showMessage();
?>
<form name="fcontatodelete" id="fcontatodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($contato_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $contato_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="contato">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($contato_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($contato->id_contato->Visible) { // id_contato ?>
		<th class="<?php echo $contato->id_contato->headerCellClass() ?>"><span id="elh_contato_id_contato" class="contato_id_contato"><?php echo $contato->id_contato->caption() ?></span></th>
<?php } ?>
<?php if ($contato->nome_contato->Visible) { // nome_contato ?>
		<th class="<?php echo $contato->nome_contato->headerCellClass() ?>"><span id="elh_contato_nome_contato" class="contato_nome_contato"><?php echo $contato->nome_contato->caption() ?></span></th>
<?php } ?>
<?php if ($contato->email_contato->Visible) { // email_contato ?>
		<th class="<?php echo $contato->email_contato->headerCellClass() ?>"><span id="elh_contato_email_contato" class="contato_email_contato"><?php echo $contato->email_contato->caption() ?></span></th>
<?php } ?>
<?php if ($contato->telefone_contato->Visible) { // telefone_contato ?>
		<th class="<?php echo $contato->telefone_contato->headerCellClass() ?>"><span id="elh_contato_telefone_contato" class="contato_telefone_contato"><?php echo $contato->telefone_contato->caption() ?></span></th>
<?php } ?>
<?php if ($contato->assunto_contato->Visible) { // assunto_contato ?>
		<th class="<?php echo $contato->assunto_contato->headerCellClass() ?>"><span id="elh_contato_assunto_contato" class="contato_assunto_contato"><?php echo $contato->assunto_contato->caption() ?></span></th>
<?php } ?>
<?php if ($contato->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $contato->usuario_id->headerCellClass() ?>"><span id="elh_contato_usuario_id" class="contato_usuario_id"><?php echo $contato->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($contato->data_atualizacao_contato->Visible) { // data_atualizacao_contato ?>
		<th class="<?php echo $contato->data_atualizacao_contato->headerCellClass() ?>"><span id="elh_contato_data_atualizacao_contato" class="contato_data_atualizacao_contato"><?php echo $contato->data_atualizacao_contato->caption() ?></span></th>
<?php } ?>
<?php if ($contato->bool_ativo_contato->Visible) { // bool_ativo_contato ?>
		<th class="<?php echo $contato->bool_ativo_contato->headerCellClass() ?>"><span id="elh_contato_bool_ativo_contato" class="contato_bool_ativo_contato"><?php echo $contato->bool_ativo_contato->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$contato_delete->RecCnt = 0;
$i = 0;
while (!$contato_delete->Recordset->EOF) {
	$contato_delete->RecCnt++;
	$contato_delete->RowCnt++;

	// Set row properties
	$contato->resetAttributes();
	$contato->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$contato_delete->loadRowValues($contato_delete->Recordset);

	// Render row
	$contato_delete->renderRow();
?>
	<tr<?php echo $contato->rowAttributes() ?>>
<?php if ($contato->id_contato->Visible) { // id_contato ?>
		<td<?php echo $contato->id_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_id_contato" class="contato_id_contato">
<span<?php echo $contato->id_contato->viewAttributes() ?>>
<?php echo $contato->id_contato->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($contato->nome_contato->Visible) { // nome_contato ?>
		<td<?php echo $contato->nome_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_nome_contato" class="contato_nome_contato">
<span<?php echo $contato->nome_contato->viewAttributes() ?>>
<?php echo $contato->nome_contato->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($contato->email_contato->Visible) { // email_contato ?>
		<td<?php echo $contato->email_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_email_contato" class="contato_email_contato">
<span<?php echo $contato->email_contato->viewAttributes() ?>>
<?php echo $contato->email_contato->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($contato->telefone_contato->Visible) { // telefone_contato ?>
		<td<?php echo $contato->telefone_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_telefone_contato" class="contato_telefone_contato">
<span<?php echo $contato->telefone_contato->viewAttributes() ?>>
<?php echo $contato->telefone_contato->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($contato->assunto_contato->Visible) { // assunto_contato ?>
		<td<?php echo $contato->assunto_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_assunto_contato" class="contato_assunto_contato">
<span<?php echo $contato->assunto_contato->viewAttributes() ?>>
<?php echo $contato->assunto_contato->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($contato->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $contato->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_usuario_id" class="contato_usuario_id">
<span<?php echo $contato->usuario_id->viewAttributes() ?>>
<?php echo $contato->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($contato->data_atualizacao_contato->Visible) { // data_atualizacao_contato ?>
		<td<?php echo $contato->data_atualizacao_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_data_atualizacao_contato" class="contato_data_atualizacao_contato">
<span<?php echo $contato->data_atualizacao_contato->viewAttributes() ?>>
<?php echo $contato->data_atualizacao_contato->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($contato->bool_ativo_contato->Visible) { // bool_ativo_contato ?>
		<td<?php echo $contato->bool_ativo_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_delete->RowCnt ?>_contato_bool_ativo_contato" class="contato_bool_ativo_contato">
<span<?php echo $contato->bool_ativo_contato->viewAttributes() ?>>
<?php echo $contato->bool_ativo_contato->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$contato_delete->Recordset->moveNext();
}
$contato_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $contato_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$contato_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$contato_delete->terminate();
?>
