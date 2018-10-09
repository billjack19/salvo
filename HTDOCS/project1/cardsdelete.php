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
$cards_delete = new cards_delete();

// Run the page
$cards_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cards_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcardsdelete = currentForm = new ew.Form("fcardsdelete", "delete");

// Form_CustomValidate event
fcardsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcardsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $cards_delete->showPageHeader(); ?>
<?php
$cards_delete->showMessage();
?>
<form name="fcardsdelete" id="fcardsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cards_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cards_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cards">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($cards_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($cards->id_cards->Visible) { // id_cards ?>
		<th class="<?php echo $cards->id_cards->headerCellClass() ?>"><span id="elh_cards_id_cards" class="cards_id_cards"><?php echo $cards->id_cards->caption() ?></span></th>
<?php } ?>
<?php if ($cards->titulo_cards->Visible) { // titulo_cards ?>
		<th class="<?php echo $cards->titulo_cards->headerCellClass() ?>"><span id="elh_cards_titulo_cards" class="cards_titulo_cards"><?php echo $cards->titulo_cards->caption() ?></span></th>
<?php } ?>
<?php if ($cards->descricao_cards->Visible) { // descricao_cards ?>
		<th class="<?php echo $cards->descricao_cards->headerCellClass() ?>"><span id="elh_cards_descricao_cards" class="cards_descricao_cards"><?php echo $cards->descricao_cards->caption() ?></span></th>
<?php } ?>
<?php if ($cards->imagem_cards->Visible) { // imagem_cards ?>
		<th class="<?php echo $cards->imagem_cards->headerCellClass() ?>"><span id="elh_cards_imagem_cards" class="cards_imagem_cards"><?php echo $cards->imagem_cards->caption() ?></span></th>
<?php } ?>
<?php if ($cards->data_atualizacao_cards->Visible) { // data_atualizacao_cards ?>
		<th class="<?php echo $cards->data_atualizacao_cards->headerCellClass() ?>"><span id="elh_cards_data_atualizacao_cards" class="cards_data_atualizacao_cards"><?php echo $cards->data_atualizacao_cards->caption() ?></span></th>
<?php } ?>
<?php if ($cards->usuario_id->Visible) { // usuario_id ?>
		<th class="<?php echo $cards->usuario_id->headerCellClass() ?>"><span id="elh_cards_usuario_id" class="cards_usuario_id"><?php echo $cards->usuario_id->caption() ?></span></th>
<?php } ?>
<?php if ($cards->bool_ativo_cards->Visible) { // bool_ativo_cards ?>
		<th class="<?php echo $cards->bool_ativo_cards->headerCellClass() ?>"><span id="elh_cards_bool_ativo_cards" class="cards_bool_ativo_cards"><?php echo $cards->bool_ativo_cards->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$cards_delete->RecCnt = 0;
$i = 0;
while (!$cards_delete->Recordset->EOF) {
	$cards_delete->RecCnt++;
	$cards_delete->RowCnt++;

	// Set row properties
	$cards->resetAttributes();
	$cards->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$cards_delete->loadRowValues($cards_delete->Recordset);

	// Render row
	$cards_delete->renderRow();
?>
	<tr<?php echo $cards->rowAttributes() ?>>
<?php if ($cards->id_cards->Visible) { // id_cards ?>
		<td<?php echo $cards->id_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_delete->RowCnt ?>_cards_id_cards" class="cards_id_cards">
<span<?php echo $cards->id_cards->viewAttributes() ?>>
<?php echo $cards->id_cards->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cards->titulo_cards->Visible) { // titulo_cards ?>
		<td<?php echo $cards->titulo_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_delete->RowCnt ?>_cards_titulo_cards" class="cards_titulo_cards">
<span<?php echo $cards->titulo_cards->viewAttributes() ?>>
<?php echo $cards->titulo_cards->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cards->descricao_cards->Visible) { // descricao_cards ?>
		<td<?php echo $cards->descricao_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_delete->RowCnt ?>_cards_descricao_cards" class="cards_descricao_cards">
<span<?php echo $cards->descricao_cards->viewAttributes() ?>>
<?php echo $cards->descricao_cards->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cards->imagem_cards->Visible) { // imagem_cards ?>
		<td<?php echo $cards->imagem_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_delete->RowCnt ?>_cards_imagem_cards" class="cards_imagem_cards">
<span<?php echo $cards->imagem_cards->viewAttributes() ?>>
<?php echo $cards->imagem_cards->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cards->data_atualizacao_cards->Visible) { // data_atualizacao_cards ?>
		<td<?php echo $cards->data_atualizacao_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_delete->RowCnt ?>_cards_data_atualizacao_cards" class="cards_data_atualizacao_cards">
<span<?php echo $cards->data_atualizacao_cards->viewAttributes() ?>>
<?php echo $cards->data_atualizacao_cards->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cards->usuario_id->Visible) { // usuario_id ?>
		<td<?php echo $cards->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $cards_delete->RowCnt ?>_cards_usuario_id" class="cards_usuario_id">
<span<?php echo $cards->usuario_id->viewAttributes() ?>>
<?php echo $cards->usuario_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cards->bool_ativo_cards->Visible) { // bool_ativo_cards ?>
		<td<?php echo $cards->bool_ativo_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_delete->RowCnt ?>_cards_bool_ativo_cards" class="cards_bool_ativo_cards">
<span<?php echo $cards->bool_ativo_cards->viewAttributes() ?>>
<?php echo $cards->bool_ativo_cards->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$cards_delete->Recordset->moveNext();
}
$cards_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $cards_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$cards_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$cards_delete->terminate();
?>
