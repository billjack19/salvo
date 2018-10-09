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
$usuario_edit = new usuario_edit();

// Run the page
$usuario_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuario_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fusuarioedit = currentForm = new ew.Form("fusuarioedit", "edit");

// Validate form
fusuarioedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($usuario_edit->id_usuario->Required) { ?>
			elm = this.getElements("x" + infix + "_id_usuario");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuario->id_usuario->caption(), $usuario->id_usuario->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($usuario_edit->nome_usuario->Required) { ?>
			elm = this.getElements("x" + infix + "_nome_usuario");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuario->nome_usuario->caption(), $usuario->nome_usuario->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($usuario_edit->login_usuario->Required) { ?>
			elm = this.getElements("x" + infix + "_login_usuario");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuario->login_usuario->caption(), $usuario->login_usuario->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($usuario_edit->senha_usuario->Required) { ?>
			elm = this.getElements("x" + infix + "_senha_usuario");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuario->senha_usuario->caption(), $usuario->senha_usuario->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($usuario_edit->nivel_acesso_id->Required) { ?>
			elm = this.getElements("x" + infix + "_nivel_acesso_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuario->nivel_acesso_id->caption(), $usuario->nivel_acesso_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_nivel_acesso_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($usuario->nivel_acesso_id->errorMessage()) ?>");
		<?php if ($usuario_edit->bool_ativo_usuario->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_usuario");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuario->bool_ativo_usuario->caption(), $usuario->bool_ativo_usuario->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_usuario");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($usuario->bool_ativo_usuario->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fusuarioedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fusuarioedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $usuario_edit->showPageHeader(); ?>
<?php
$usuario_edit->showMessage();
?>
<form name="fusuarioedit" id="fusuarioedit" class="<?php echo $usuario_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($usuario_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $usuario_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuario">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$usuario_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($usuario->id_usuario->Visible) { // id_usuario ?>
	<div id="r_id_usuario" class="form-group row">
		<label id="elh_usuario_id_usuario" class="<?php echo $usuario_edit->LeftColumnClass ?>"><?php echo $usuario->id_usuario->caption() ?><?php echo ($usuario->id_usuario->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuario_edit->RightColumnClass ?>"><div<?php echo $usuario->id_usuario->cellAttributes() ?>>
<span id="el_usuario_id_usuario">
<span<?php echo $usuario->id_usuario->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($usuario->id_usuario->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="usuario" data-field="x_id_usuario" name="x_id_usuario" id="x_id_usuario" value="<?php echo HtmlEncode($usuario->id_usuario->CurrentValue) ?>">
<?php echo $usuario->id_usuario->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuario->nome_usuario->Visible) { // nome_usuario ?>
	<div id="r_nome_usuario" class="form-group row">
		<label id="elh_usuario_nome_usuario" for="x_nome_usuario" class="<?php echo $usuario_edit->LeftColumnClass ?>"><?php echo $usuario->nome_usuario->caption() ?><?php echo ($usuario->nome_usuario->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuario_edit->RightColumnClass ?>"><div<?php echo $usuario->nome_usuario->cellAttributes() ?>>
<span id="el_usuario_nome_usuario">
<input type="text" data-table="usuario" data-field="x_nome_usuario" name="x_nome_usuario" id="x_nome_usuario" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($usuario->nome_usuario->getPlaceHolder()) ?>" value="<?php echo $usuario->nome_usuario->EditValue ?>"<?php echo $usuario->nome_usuario->editAttributes() ?>>
</span>
<?php echo $usuario->nome_usuario->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuario->login_usuario->Visible) { // login_usuario ?>
	<div id="r_login_usuario" class="form-group row">
		<label id="elh_usuario_login_usuario" for="x_login_usuario" class="<?php echo $usuario_edit->LeftColumnClass ?>"><?php echo $usuario->login_usuario->caption() ?><?php echo ($usuario->login_usuario->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuario_edit->RightColumnClass ?>"><div<?php echo $usuario->login_usuario->cellAttributes() ?>>
<span id="el_usuario_login_usuario">
<input type="text" data-table="usuario" data-field="x_login_usuario" name="x_login_usuario" id="x_login_usuario" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($usuario->login_usuario->getPlaceHolder()) ?>" value="<?php echo $usuario->login_usuario->EditValue ?>"<?php echo $usuario->login_usuario->editAttributes() ?>>
</span>
<?php echo $usuario->login_usuario->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuario->senha_usuario->Visible) { // senha_usuario ?>
	<div id="r_senha_usuario" class="form-group row">
		<label id="elh_usuario_senha_usuario" for="x_senha_usuario" class="<?php echo $usuario_edit->LeftColumnClass ?>"><?php echo $usuario->senha_usuario->caption() ?><?php echo ($usuario->senha_usuario->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuario_edit->RightColumnClass ?>"><div<?php echo $usuario->senha_usuario->cellAttributes() ?>>
<span id="el_usuario_senha_usuario">
<input type="text" data-table="usuario" data-field="x_senha_usuario" name="x_senha_usuario" id="x_senha_usuario" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($usuario->senha_usuario->getPlaceHolder()) ?>" value="<?php echo $usuario->senha_usuario->EditValue ?>"<?php echo $usuario->senha_usuario->editAttributes() ?>>
</span>
<?php echo $usuario->senha_usuario->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuario->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
	<div id="r_nivel_acesso_id" class="form-group row">
		<label id="elh_usuario_nivel_acesso_id" for="x_nivel_acesso_id" class="<?php echo $usuario_edit->LeftColumnClass ?>"><?php echo $usuario->nivel_acesso_id->caption() ?><?php echo ($usuario->nivel_acesso_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuario_edit->RightColumnClass ?>"><div<?php echo $usuario->nivel_acesso_id->cellAttributes() ?>>
<span id="el_usuario_nivel_acesso_id">
<input type="text" data-table="usuario" data-field="x_nivel_acesso_id" name="x_nivel_acesso_id" id="x_nivel_acesso_id" size="30" placeholder="<?php echo HtmlEncode($usuario->nivel_acesso_id->getPlaceHolder()) ?>" value="<?php echo $usuario->nivel_acesso_id->EditValue ?>"<?php echo $usuario->nivel_acesso_id->editAttributes() ?>>
</span>
<?php echo $usuario->nivel_acesso_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuario->bool_ativo_usuario->Visible) { // bool_ativo_usuario ?>
	<div id="r_bool_ativo_usuario" class="form-group row">
		<label id="elh_usuario_bool_ativo_usuario" for="x_bool_ativo_usuario" class="<?php echo $usuario_edit->LeftColumnClass ?>"><?php echo $usuario->bool_ativo_usuario->caption() ?><?php echo ($usuario->bool_ativo_usuario->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuario_edit->RightColumnClass ?>"><div<?php echo $usuario->bool_ativo_usuario->cellAttributes() ?>>
<span id="el_usuario_bool_ativo_usuario">
<input type="text" data-table="usuario" data-field="x_bool_ativo_usuario" name="x_bool_ativo_usuario" id="x_bool_ativo_usuario" size="30" placeholder="<?php echo HtmlEncode($usuario->bool_ativo_usuario->getPlaceHolder()) ?>" value="<?php echo $usuario->bool_ativo_usuario->EditValue ?>"<?php echo $usuario->bool_ativo_usuario->editAttributes() ?>>
</span>
<?php echo $usuario->bool_ativo_usuario->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$usuario_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $usuario_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $usuario_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$usuario_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$usuario_edit->terminate();
?>
