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
$usuario_delete = new usuario_delete();

// Run the page
$usuario_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuario_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fusuariodelete = currentForm = new ew.Form("fusuariodelete", "delete");

// Form_CustomValidate event
fusuariodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fusuariodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $usuario_delete->showPageHeader(); ?>
<?php
$usuario_delete->showMessage();
?>
<form name="fusuariodelete" id="fusuariodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($usuario_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $usuario_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuario">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($usuario_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($usuario->id_usuario->Visible) { // id_usuario ?>
		<th class="<?php echo $usuario->id_usuario->headerCellClass() ?>"><span id="elh_usuario_id_usuario" class="usuario_id_usuario"><?php echo $usuario->id_usuario->caption() ?></span></th>
<?php } ?>
<?php if ($usuario->nome_usuario->Visible) { // nome_usuario ?>
		<th class="<?php echo $usuario->nome_usuario->headerCellClass() ?>"><span id="elh_usuario_nome_usuario" class="usuario_nome_usuario"><?php echo $usuario->nome_usuario->caption() ?></span></th>
<?php } ?>
<?php if ($usuario->login_usuario->Visible) { // login_usuario ?>
		<th class="<?php echo $usuario->login_usuario->headerCellClass() ?>"><span id="elh_usuario_login_usuario" class="usuario_login_usuario"><?php echo $usuario->login_usuario->caption() ?></span></th>
<?php } ?>
<?php if ($usuario->senha_usuario->Visible) { // senha_usuario ?>
		<th class="<?php echo $usuario->senha_usuario->headerCellClass() ?>"><span id="elh_usuario_senha_usuario" class="usuario_senha_usuario"><?php echo $usuario->senha_usuario->caption() ?></span></th>
<?php } ?>
<?php if ($usuario->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
		<th class="<?php echo $usuario->nivel_acesso_id->headerCellClass() ?>"><span id="elh_usuario_nivel_acesso_id" class="usuario_nivel_acesso_id"><?php echo $usuario->nivel_acesso_id->caption() ?></span></th>
<?php } ?>
<?php if ($usuario->bool_ativo_usuario->Visible) { // bool_ativo_usuario ?>
		<th class="<?php echo $usuario->bool_ativo_usuario->headerCellClass() ?>"><span id="elh_usuario_bool_ativo_usuario" class="usuario_bool_ativo_usuario"><?php echo $usuario->bool_ativo_usuario->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$usuario_delete->RecCnt = 0;
$i = 0;
while (!$usuario_delete->Recordset->EOF) {
	$usuario_delete->RecCnt++;
	$usuario_delete->RowCnt++;

	// Set row properties
	$usuario->resetAttributes();
	$usuario->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$usuario_delete->loadRowValues($usuario_delete->Recordset);

	// Render row
	$usuario_delete->renderRow();
?>
	<tr<?php echo $usuario->rowAttributes() ?>>
<?php if ($usuario->id_usuario->Visible) { // id_usuario ?>
		<td<?php echo $usuario->id_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_delete->RowCnt ?>_usuario_id_usuario" class="usuario_id_usuario">
<span<?php echo $usuario->id_usuario->viewAttributes() ?>>
<?php echo $usuario->id_usuario->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuario->nome_usuario->Visible) { // nome_usuario ?>
		<td<?php echo $usuario->nome_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_delete->RowCnt ?>_usuario_nome_usuario" class="usuario_nome_usuario">
<span<?php echo $usuario->nome_usuario->viewAttributes() ?>>
<?php echo $usuario->nome_usuario->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuario->login_usuario->Visible) { // login_usuario ?>
		<td<?php echo $usuario->login_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_delete->RowCnt ?>_usuario_login_usuario" class="usuario_login_usuario">
<span<?php echo $usuario->login_usuario->viewAttributes() ?>>
<?php echo $usuario->login_usuario->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuario->senha_usuario->Visible) { // senha_usuario ?>
		<td<?php echo $usuario->senha_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_delete->RowCnt ?>_usuario_senha_usuario" class="usuario_senha_usuario">
<span<?php echo $usuario->senha_usuario->viewAttributes() ?>>
<?php echo $usuario->senha_usuario->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuario->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
		<td<?php echo $usuario->nivel_acesso_id->cellAttributes() ?>>
<span id="el<?php echo $usuario_delete->RowCnt ?>_usuario_nivel_acesso_id" class="usuario_nivel_acesso_id">
<span<?php echo $usuario->nivel_acesso_id->viewAttributes() ?>>
<?php echo $usuario->nivel_acesso_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuario->bool_ativo_usuario->Visible) { // bool_ativo_usuario ?>
		<td<?php echo $usuario->bool_ativo_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_delete->RowCnt ?>_usuario_bool_ativo_usuario" class="usuario_bool_ativo_usuario">
<span<?php echo $usuario->bool_ativo_usuario->viewAttributes() ?>>
<?php echo $usuario->bool_ativo_usuario->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$usuario_delete->Recordset->moveNext();
}
$usuario_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $usuario_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$usuario_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$usuario_delete->terminate();
?>
