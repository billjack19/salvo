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
$cliente_site_delete = new cliente_site_delete();

// Run the page
$cliente_site_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cliente_site_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcliente_sitedelete = currentForm = new ew.Form("fcliente_sitedelete", "delete");

// Form_CustomValidate event
fcliente_sitedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcliente_sitedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $cliente_site_delete->showPageHeader(); ?>
<?php
$cliente_site_delete->showMessage();
?>
<form name="fcliente_sitedelete" id="fcliente_sitedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cliente_site_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cliente_site_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cliente_site">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($cliente_site_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($cliente_site->id_cliente_site->Visible) { // id_cliente_site ?>
		<th class="<?php echo $cliente_site->id_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_id_cliente_site" class="cliente_site_id_cliente_site"><?php echo $cliente_site->id_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->nome_cliente_site->Visible) { // nome_cliente_site ?>
		<th class="<?php echo $cliente_site->nome_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_nome_cliente_site" class="cliente_site_nome_cliente_site"><?php echo $cliente_site->nome_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->login_cliente_site->Visible) { // login_cliente_site ?>
		<th class="<?php echo $cliente_site->login_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_login_cliente_site" class="cliente_site_login_cliente_site"><?php echo $cliente_site->login_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->senha_cliente_site->Visible) { // senha_cliente_site ?>
		<th class="<?php echo $cliente_site->senha_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_senha_cliente_site" class="cliente_site_senha_cliente_site"><?php echo $cliente_site->senha_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->telefone_cliente_site->Visible) { // telefone_cliente_site ?>
		<th class="<?php echo $cliente_site->telefone_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_telefone_cliente_site" class="cliente_site_telefone_cliente_site"><?php echo $cliente_site->telefone_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->celular_cliente_site->Visible) { // celular_cliente_site ?>
		<th class="<?php echo $cliente_site->celular_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_celular_cliente_site" class="cliente_site_celular_cliente_site"><?php echo $cliente_site->celular_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->numero_cliente_site->Visible) { // numero_cliente_site ?>
		<th class="<?php echo $cliente_site->numero_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_numero_cliente_site" class="cliente_site_numero_cliente_site"><?php echo $cliente_site->numero_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->complemento_cliente_site->Visible) { // complemento_cliente_site ?>
		<th class="<?php echo $cliente_site->complemento_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_complemento_cliente_site" class="cliente_site_complemento_cliente_site"><?php echo $cliente_site->complemento_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->bairro_cliente_site->Visible) { // bairro_cliente_site ?>
		<th class="<?php echo $cliente_site->bairro_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_bairro_cliente_site" class="cliente_site_bairro_cliente_site"><?php echo $cliente_site->bairro_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->cidade_cliente_site->Visible) { // cidade_cliente_site ?>
		<th class="<?php echo $cliente_site->cidade_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_cidade_cliente_site" class="cliente_site_cidade_cliente_site"><?php echo $cliente_site->cidade_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->estado_id->Visible) { // estado_id ?>
		<th class="<?php echo $cliente_site->estado_id->headerCellClass() ?>"><span id="elh_cliente_site_estado_id" class="cliente_site_estado_id"><?php echo $cliente_site->estado_id->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->cep_cliente_site->Visible) { // cep_cliente_site ?>
		<th class="<?php echo $cliente_site->cep_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_cep_cliente_site" class="cliente_site_cep_cliente_site"><?php echo $cliente_site->cep_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->data_atualizacao_cliente_site->Visible) { // data_atualizacao_cliente_site ?>
		<th class="<?php echo $cliente_site->data_atualizacao_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_data_atualizacao_cliente_site" class="cliente_site_data_atualizacao_cliente_site"><?php echo $cliente_site->data_atualizacao_cliente_site->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $cliente_site->usuario_id->headerCellClass() ?>"><span id="elh_cliente_site_usuario_id" class="cliente_site_usuario_id"><?php echo $cliente_site->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($cliente_site->bool_ativo_cliente_site->Visible) { // bool_ativo_cliente_site ?>
		<th class="<?php echo $cliente_site->bool_ativo_cliente_site->headerCellClass() ?>"><span id="elh_cliente_site_bool_ativo_cliente_site" class="cliente_site_bool_ativo_cliente_site"><?php echo $cliente_site->bool_ativo_cliente_site->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$cliente_site_delete->RecCnt = 0;
$i = 0;
while (!$cliente_site_delete->Recordset->EOF) {
	$cliente_site_delete->RecCnt++;
	$cliente_site_delete->RowCnt++;

	// Set row properties
	$cliente_site->resetAttributes();
	$cliente_site->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$cliente_site_delete->loadRowValues($cliente_site_delete->Recordset);

	// Render row
	$cliente_site_delete->renderRow();
?>
	<tr<?php echo $cliente_site->rowAttributes() ?>>
<?php if ($cliente_site->id_cliente_site->Visible) { // id_cliente_site ?>
		<td<?php echo $cliente_site->id_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_id_cliente_site" class="cliente_site_id_cliente_site">
<span<?php echo $cliente_site->id_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->id_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->nome_cliente_site->Visible) { // nome_cliente_site ?>
		<td<?php echo $cliente_site->nome_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_nome_cliente_site" class="cliente_site_nome_cliente_site">
<span<?php echo $cliente_site->nome_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->nome_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->login_cliente_site->Visible) { // login_cliente_site ?>
		<td<?php echo $cliente_site->login_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_login_cliente_site" class="cliente_site_login_cliente_site">
<span<?php echo $cliente_site->login_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->login_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->senha_cliente_site->Visible) { // senha_cliente_site ?>
		<td<?php echo $cliente_site->senha_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_senha_cliente_site" class="cliente_site_senha_cliente_site">
<span<?php echo $cliente_site->senha_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->senha_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->telefone_cliente_site->Visible) { // telefone_cliente_site ?>
		<td<?php echo $cliente_site->telefone_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_telefone_cliente_site" class="cliente_site_telefone_cliente_site">
<span<?php echo $cliente_site->telefone_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->telefone_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->celular_cliente_site->Visible) { // celular_cliente_site ?>
		<td<?php echo $cliente_site->celular_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_celular_cliente_site" class="cliente_site_celular_cliente_site">
<span<?php echo $cliente_site->celular_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->celular_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->numero_cliente_site->Visible) { // numero_cliente_site ?>
		<td<?php echo $cliente_site->numero_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_numero_cliente_site" class="cliente_site_numero_cliente_site">
<span<?php echo $cliente_site->numero_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->numero_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->complemento_cliente_site->Visible) { // complemento_cliente_site ?>
		<td<?php echo $cliente_site->complemento_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_complemento_cliente_site" class="cliente_site_complemento_cliente_site">
<span<?php echo $cliente_site->complemento_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->complemento_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->bairro_cliente_site->Visible) { // bairro_cliente_site ?>
		<td<?php echo $cliente_site->bairro_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_bairro_cliente_site" class="cliente_site_bairro_cliente_site">
<span<?php echo $cliente_site->bairro_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->bairro_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->cidade_cliente_site->Visible) { // cidade_cliente_site ?>
		<td<?php echo $cliente_site->cidade_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_cidade_cliente_site" class="cliente_site_cidade_cliente_site">
<span<?php echo $cliente_site->cidade_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->cidade_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->estado_id->Visible) { // estado_id ?>
		<td<?php echo $cliente_site->estado_id->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_estado_id" class="cliente_site_estado_id">
<span<?php echo $cliente_site->estado_id->viewAttributes() ?>>
<?php echo $cliente_site->estado_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->cep_cliente_site->Visible) { // cep_cliente_site ?>
		<td<?php echo $cliente_site->cep_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_cep_cliente_site" class="cliente_site_cep_cliente_site">
<span<?php echo $cliente_site->cep_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->cep_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->data_atualizacao_cliente_site->Visible) { // data_atualizacao_cliente_site ?>
		<td<?php echo $cliente_site->data_atualizacao_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_data_atualizacao_cliente_site" class="cliente_site_data_atualizacao_cliente_site">
<span<?php echo $cliente_site->data_atualizacao_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->data_atualizacao_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $cliente_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_usuario_id" class="cliente_site_usuario_id">
<span<?php echo $cliente_site->usuario_id->viewAttributes() ?>>
<?php echo $cliente_site->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cliente_site->bool_ativo_cliente_site->Visible) { // bool_ativo_cliente_site ?>
		<td<?php echo $cliente_site->bool_ativo_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_delete->RowCnt ?>_cliente_site_bool_ativo_cliente_site" class="cliente_site_bool_ativo_cliente_site">
<span<?php echo $cliente_site->bool_ativo_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->bool_ativo_cliente_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$cliente_site_delete->Recordset->moveNext();
}
$cliente_site_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $cliente_site_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$cliente_site_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$cliente_site_delete->terminate();
?>
