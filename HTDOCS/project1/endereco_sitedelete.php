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
$endereco_site_delete = new endereco_site_delete();

// Run the page
$endereco_site_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$endereco_site_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fendereco_sitedelete = currentForm = new ew.Form("fendereco_sitedelete", "delete");

// Form_CustomValidate event
fendereco_sitedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fendereco_sitedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $endereco_site_delete->showPageHeader(); ?>
<?php
$endereco_site_delete->showMessage();
?>
<form name="fendereco_sitedelete" id="fendereco_sitedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($endereco_site_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $endereco_site_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="endereco_site">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($endereco_site_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($endereco_site->id_endereco_site->Visible) { // id_endereco_site ?>
		<th class="<?php echo $endereco_site->id_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_id_endereco_site" class="endereco_site_id_endereco_site"><?php echo $endereco_site->id_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->descricao_endereco_site->Visible) { // descricao_endereco_site ?>
		<th class="<?php echo $endereco_site->descricao_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_descricao_endereco_site" class="endereco_site_descricao_endereco_site"><?php echo $endereco_site->descricao_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->endereco_endereco_site->Visible) { // endereco_endereco_site ?>
		<th class="<?php echo $endereco_site->endereco_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_endereco_endereco_site" class="endereco_site_endereco_endereco_site"><?php echo $endereco_site->endereco_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->numero_endereco_site->Visible) { // numero_endereco_site ?>
		<th class="<?php echo $endereco_site->numero_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_numero_endereco_site" class="endereco_site_numero_endereco_site"><?php echo $endereco_site->numero_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->complemento_endereco_site->Visible) { // complemento_endereco_site ?>
		<th class="<?php echo $endereco_site->complemento_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_complemento_endereco_site" class="endereco_site_complemento_endereco_site"><?php echo $endereco_site->complemento_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->bairro_endereco_site->Visible) { // bairro_endereco_site ?>
		<th class="<?php echo $endereco_site->bairro_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_bairro_endereco_site" class="endereco_site_bairro_endereco_site"><?php echo $endereco_site->bairro_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->cidade_endereco_site->Visible) { // cidade_endereco_site ?>
		<th class="<?php echo $endereco_site->cidade_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_cidade_endereco_site" class="endereco_site_cidade_endereco_site"><?php echo $endereco_site->cidade_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->estado_id->Visible) { // estado_id ?>
		<th class="<?php echo $endereco_site->estado_id->headerCellClass() ?>"><span id="elh_endereco_site_estado_id" class="endereco_site_estado_id"><?php echo $endereco_site->estado_id->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->cep_endereco_site->Visible) { // cep_endereco_site ?>
		<th class="<?php echo $endereco_site->cep_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_cep_endereco_site" class="endereco_site_cep_endereco_site"><?php echo $endereco_site->cep_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->telefone_endereco_site->Visible) { // telefone_endereco_site ?>
		<th class="<?php echo $endereco_site->telefone_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_telefone_endereco_site" class="endereco_site_telefone_endereco_site"><?php echo $endereco_site->telefone_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->celular_endereco_site->Visible) { // celular_endereco_site ?>
		<th class="<?php echo $endereco_site->celular_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_celular_endereco_site" class="endereco_site_celular_endereco_site"><?php echo $endereco_site->celular_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->email_endereco_site->Visible) { // email_endereco_site ?>
		<th class="<?php echo $endereco_site->email_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_email_endereco_site" class="endereco_site_email_endereco_site"><?php echo $endereco_site->email_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->latitude_endereco_site->Visible) { // latitude_endereco_site ?>
		<th class="<?php echo $endereco_site->latitude_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_latitude_endereco_site" class="endereco_site_latitude_endereco_site"><?php echo $endereco_site->latitude_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->longitude_endereco_site->Visible) { // longitude_endereco_site ?>
		<th class="<?php echo $endereco_site->longitude_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_longitude_endereco_site" class="endereco_site_longitude_endereco_site"><?php echo $endereco_site->longitude_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->data_atualizacao_endereco_site->Visible) { // data_atualizacao_endereco_site ?>
		<th class="<?php echo $endereco_site->data_atualizacao_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_data_atualizacao_endereco_site" class="endereco_site_data_atualizacao_endereco_site"><?php echo $endereco_site->data_atualizacao_endereco_site->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $endereco_site->usuario_id->headerCellClass() ?>"><span id="elh_endereco_site_usuario_id" class="endereco_site_usuario_id"><?php echo $endereco_site->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($endereco_site->bool_ativo_endereco_site->Visible) { // bool_ativo_endereco_site ?>
		<th class="<?php echo $endereco_site->bool_ativo_endereco_site->headerCellClass() ?>"><span id="elh_endereco_site_bool_ativo_endereco_site" class="endereco_site_bool_ativo_endereco_site"><?php echo $endereco_site->bool_ativo_endereco_site->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$endereco_site_delete->RecCnt = 0;
$i = 0;
while (!$endereco_site_delete->Recordset->EOF) {
	$endereco_site_delete->RecCnt++;
	$endereco_site_delete->RowCnt++;

	// Set row properties
	$endereco_site->resetAttributes();
	$endereco_site->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$endereco_site_delete->loadRowValues($endereco_site_delete->Recordset);

	// Render row
	$endereco_site_delete->renderRow();
?>
	<tr<?php echo $endereco_site->rowAttributes() ?>>
<?php if ($endereco_site->id_endereco_site->Visible) { // id_endereco_site ?>
		<td<?php echo $endereco_site->id_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_id_endereco_site" class="endereco_site_id_endereco_site">
<span<?php echo $endereco_site->id_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->id_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->descricao_endereco_site->Visible) { // descricao_endereco_site ?>
		<td<?php echo $endereco_site->descricao_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_descricao_endereco_site" class="endereco_site_descricao_endereco_site">
<span<?php echo $endereco_site->descricao_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->descricao_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->endereco_endereco_site->Visible) { // endereco_endereco_site ?>
		<td<?php echo $endereco_site->endereco_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_endereco_endereco_site" class="endereco_site_endereco_endereco_site">
<span<?php echo $endereco_site->endereco_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->endereco_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->numero_endereco_site->Visible) { // numero_endereco_site ?>
		<td<?php echo $endereco_site->numero_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_numero_endereco_site" class="endereco_site_numero_endereco_site">
<span<?php echo $endereco_site->numero_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->numero_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->complemento_endereco_site->Visible) { // complemento_endereco_site ?>
		<td<?php echo $endereco_site->complemento_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_complemento_endereco_site" class="endereco_site_complemento_endereco_site">
<span<?php echo $endereco_site->complemento_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->complemento_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->bairro_endereco_site->Visible) { // bairro_endereco_site ?>
		<td<?php echo $endereco_site->bairro_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_bairro_endereco_site" class="endereco_site_bairro_endereco_site">
<span<?php echo $endereco_site->bairro_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->bairro_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->cidade_endereco_site->Visible) { // cidade_endereco_site ?>
		<td<?php echo $endereco_site->cidade_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_cidade_endereco_site" class="endereco_site_cidade_endereco_site">
<span<?php echo $endereco_site->cidade_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->cidade_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->estado_id->Visible) { // estado_id ?>
		<td<?php echo $endereco_site->estado_id->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_estado_id" class="endereco_site_estado_id">
<span<?php echo $endereco_site->estado_id->viewAttributes() ?>>
<?php echo $endereco_site->estado_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->cep_endereco_site->Visible) { // cep_endereco_site ?>
		<td<?php echo $endereco_site->cep_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_cep_endereco_site" class="endereco_site_cep_endereco_site">
<span<?php echo $endereco_site->cep_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->cep_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->telefone_endereco_site->Visible) { // telefone_endereco_site ?>
		<td<?php echo $endereco_site->telefone_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_telefone_endereco_site" class="endereco_site_telefone_endereco_site">
<span<?php echo $endereco_site->telefone_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->telefone_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->celular_endereco_site->Visible) { // celular_endereco_site ?>
		<td<?php echo $endereco_site->celular_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_celular_endereco_site" class="endereco_site_celular_endereco_site">
<span<?php echo $endereco_site->celular_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->celular_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->email_endereco_site->Visible) { // email_endereco_site ?>
		<td<?php echo $endereco_site->email_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_email_endereco_site" class="endereco_site_email_endereco_site">
<span<?php echo $endereco_site->email_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->email_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->latitude_endereco_site->Visible) { // latitude_endereco_site ?>
		<td<?php echo $endereco_site->latitude_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_latitude_endereco_site" class="endereco_site_latitude_endereco_site">
<span<?php echo $endereco_site->latitude_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->latitude_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->longitude_endereco_site->Visible) { // longitude_endereco_site ?>
		<td<?php echo $endereco_site->longitude_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_longitude_endereco_site" class="endereco_site_longitude_endereco_site">
<span<?php echo $endereco_site->longitude_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->longitude_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->data_atualizacao_endereco_site->Visible) { // data_atualizacao_endereco_site ?>
		<td<?php echo $endereco_site->data_atualizacao_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_data_atualizacao_endereco_site" class="endereco_site_data_atualizacao_endereco_site">
<span<?php echo $endereco_site->data_atualizacao_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->data_atualizacao_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $endereco_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_usuario_id" class="endereco_site_usuario_id">
<span<?php echo $endereco_site->usuario_id->viewAttributes() ?>>
<?php echo $endereco_site->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($endereco_site->bool_ativo_endereco_site->Visible) { // bool_ativo_endereco_site ?>
		<td<?php echo $endereco_site->bool_ativo_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_delete->RowCnt ?>_endereco_site_bool_ativo_endereco_site" class="endereco_site_bool_ativo_endereco_site">
<span<?php echo $endereco_site->bool_ativo_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->bool_ativo_endereco_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$endereco_site_delete->Recordset->moveNext();
}
$endereco_site_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $endereco_site_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$endereco_site_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$endereco_site_delete->terminate();
?>
