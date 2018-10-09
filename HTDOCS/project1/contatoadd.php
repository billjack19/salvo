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
$contato_add = new contato_add();

// Run the page
$contato_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$contato_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcontatoadd = currentForm = new ew.Form("fcontatoadd", "add");

// Validate form
fcontatoadd.validate = function() {
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
		<?php if ($contato_add->nome_contato->Required) { ?>
			elm = this.getElements("x" + infix + "_nome_contato");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->nome_contato->caption(), $contato->nome_contato->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($contato_add->email_contato->Required) { ?>
			elm = this.getElements("x" + infix + "_email_contato");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->email_contato->caption(), $contato->email_contato->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($contato_add->telefone_contato->Required) { ?>
			elm = this.getElements("x" + infix + "_telefone_contato");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->telefone_contato->caption(), $contato->telefone_contato->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($contato_add->assunto_contato->Required) { ?>
			elm = this.getElements("x" + infix + "_assunto_contato");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->assunto_contato->caption(), $contato->assunto_contato->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($contato_add->mensagem_contato->Required) { ?>
			elm = this.getElements("x" + infix + "_mensagem_contato");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->mensagem_contato->caption(), $contato->mensagem_contato->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($contato_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->usuario_id->caption(), $contato->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($contato->usuario_id->errorMessage()) ?>");
		<?php if ($contato_add->data_atualizacao_contato->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_contato");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->data_atualizacao_contato->caption(), $contato->data_atualizacao_contato->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_contato");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($contato->data_atualizacao_contato->errorMessage()) ?>");
		<?php if ($contato_add->bool_ativo_contato->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_contato");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $contato->bool_ativo_contato->caption(), $contato->bool_ativo_contato->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_contato");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($contato->bool_ativo_contato->errorMessage()) ?>");

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
fcontatoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcontatoadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $contato_add->showPageHeader(); ?>
<?php
$contato_add->showMessage();
?>
<form name="fcontatoadd" id="fcontatoadd" class="<?php echo $contato_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($contato_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $contato_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="contato">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$contato_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($contato->nome_contato->Visible) { // nome_contato ?>
	<div id="r_nome_contato" class="form-group row">
		<label id="elh_contato_nome_contato" for="x_nome_contato" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->nome_contato->caption() ?><?php echo ($contato->nome_contato->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->nome_contato->cellAttributes() ?>>
<span id="el_contato_nome_contato">
<input type="text" data-table="contato" data-field="x_nome_contato" name="x_nome_contato" id="x_nome_contato" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($contato->nome_contato->getPlaceHolder()) ?>" value="<?php echo $contato->nome_contato->EditValue ?>"<?php echo $contato->nome_contato->editAttributes() ?>>
</span>
<?php echo $contato->nome_contato->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($contato->email_contato->Visible) { // email_contato ?>
	<div id="r_email_contato" class="form-group row">
		<label id="elh_contato_email_contato" for="x_email_contato" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->email_contato->caption() ?><?php echo ($contato->email_contato->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->email_contato->cellAttributes() ?>>
<span id="el_contato_email_contato">
<input type="text" data-table="contato" data-field="x_email_contato" name="x_email_contato" id="x_email_contato" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($contato->email_contato->getPlaceHolder()) ?>" value="<?php echo $contato->email_contato->EditValue ?>"<?php echo $contato->email_contato->editAttributes() ?>>
</span>
<?php echo $contato->email_contato->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($contato->telefone_contato->Visible) { // telefone_contato ?>
	<div id="r_telefone_contato" class="form-group row">
		<label id="elh_contato_telefone_contato" for="x_telefone_contato" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->telefone_contato->caption() ?><?php echo ($contato->telefone_contato->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->telefone_contato->cellAttributes() ?>>
<span id="el_contato_telefone_contato">
<input type="text" data-table="contato" data-field="x_telefone_contato" name="x_telefone_contato" id="x_telefone_contato" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($contato->telefone_contato->getPlaceHolder()) ?>" value="<?php echo $contato->telefone_contato->EditValue ?>"<?php echo $contato->telefone_contato->editAttributes() ?>>
</span>
<?php echo $contato->telefone_contato->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($contato->assunto_contato->Visible) { // assunto_contato ?>
	<div id="r_assunto_contato" class="form-group row">
		<label id="elh_contato_assunto_contato" for="x_assunto_contato" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->assunto_contato->caption() ?><?php echo ($contato->assunto_contato->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->assunto_contato->cellAttributes() ?>>
<span id="el_contato_assunto_contato">
<input type="text" data-table="contato" data-field="x_assunto_contato" name="x_assunto_contato" id="x_assunto_contato" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($contato->assunto_contato->getPlaceHolder()) ?>" value="<?php echo $contato->assunto_contato->EditValue ?>"<?php echo $contato->assunto_contato->editAttributes() ?>>
</span>
<?php echo $contato->assunto_contato->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($contato->mensagem_contato->Visible) { // mensagem_contato ?>
	<div id="r_mensagem_contato" class="form-group row">
		<label id="elh_contato_mensagem_contato" for="x_mensagem_contato" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->mensagem_contato->caption() ?><?php echo ($contato->mensagem_contato->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->mensagem_contato->cellAttributes() ?>>
<span id="el_contato_mensagem_contato">
<textarea data-table="contato" data-field="x_mensagem_contato" name="x_mensagem_contato" id="x_mensagem_contato" cols="35" rows="4" placeholder="<?php echo HtmlEncode($contato->mensagem_contato->getPlaceHolder()) ?>"<?php echo $contato->mensagem_contato->editAttributes() ?>><?php echo $contato->mensagem_contato->EditValue ?></textarea>
</span>
<?php echo $contato->mensagem_contato->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($contato->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_contato_usuario_id" for="x_usuario_id" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->usuario_id->caption() ?><?php echo ($contato->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->usuario_id->cellAttributes() ?>>
<span id="el_contato_usuario_id">
<input type="text" data-table="contato" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($contato->usuario_id->getPlaceHolder()) ?>" value="<?php echo $contato->usuario_id->EditValue ?>"<?php echo $contato->usuario_id->editAttributes() ?>>
</span>
<?php echo $contato->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($contato->data_atualizacao_contato->Visible) { // data_atualizacao_contato ?>
	<div id="r_data_atualizacao_contato" class="form-group row">
		<label id="elh_contato_data_atualizacao_contato" for="x_data_atualizacao_contato" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->data_atualizacao_contato->caption() ?><?php echo ($contato->data_atualizacao_contato->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->data_atualizacao_contato->cellAttributes() ?>>
<span id="el_contato_data_atualizacao_contato">
<input type="text" data-table="contato" data-field="x_data_atualizacao_contato" name="x_data_atualizacao_contato" id="x_data_atualizacao_contato" placeholder="<?php echo HtmlEncode($contato->data_atualizacao_contato->getPlaceHolder()) ?>" value="<?php echo $contato->data_atualizacao_contato->EditValue ?>"<?php echo $contato->data_atualizacao_contato->editAttributes() ?>>
</span>
<?php echo $contato->data_atualizacao_contato->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($contato->bool_ativo_contato->Visible) { // bool_ativo_contato ?>
	<div id="r_bool_ativo_contato" class="form-group row">
		<label id="elh_contato_bool_ativo_contato" for="x_bool_ativo_contato" class="<?php echo $contato_add->LeftColumnClass ?>"><?php echo $contato->bool_ativo_contato->caption() ?><?php echo ($contato->bool_ativo_contato->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $contato_add->RightColumnClass ?>"><div<?php echo $contato->bool_ativo_contato->cellAttributes() ?>>
<span id="el_contato_bool_ativo_contato">
<input type="text" data-table="contato" data-field="x_bool_ativo_contato" name="x_bool_ativo_contato" id="x_bool_ativo_contato" size="30" placeholder="<?php echo HtmlEncode($contato->bool_ativo_contato->getPlaceHolder()) ?>" value="<?php echo $contato->bool_ativo_contato->EditValue ?>"<?php echo $contato->bool_ativo_contato->editAttributes() ?>>
</span>
<?php echo $contato->bool_ativo_contato->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$contato_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $contato_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $contato_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$contato_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$contato_add->terminate();
?>
