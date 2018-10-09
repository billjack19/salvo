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
$site_edit = new site_edit();

// Run the page
$site_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$site_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsiteedit = currentForm = new ew.Form("fsiteedit", "edit");

// Validate form
fsiteedit.validate = function() {
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
		<?php if ($site_edit->ID_SITE->Required) { ?>
			elm = this.getElements("x" + infix + "_ID_SITE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->ID_SITE->caption(), $site->ID_SITE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->NOME_EMPRESA->Required) { ?>
			elm = this.getElements("x" + infix + "_NOME_EMPRESA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->NOME_EMPRESA->caption(), $site->NOME_EMPRESA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->NOME_CIDADE->Required) { ?>
			elm = this.getElements("x" + infix + "_NOME_CIDADE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->NOME_CIDADE->caption(), $site->NOME_CIDADE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->ESTADO->Required) { ?>
			elm = this.getElements("x" + infix + "_ESTADO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->ESTADO->caption(), $site->ESTADO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->FONE->Required) { ?>
			elm = this.getElements("x" + infix + "_FONE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->FONE->caption(), $site->FONE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->FONE_APP->Required) { ?>
			elm = this.getElements("x" + infix + "_FONE_APP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->FONE_APP->caption(), $site->FONE_APP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->_EMAIL->Required) { ?>
			elm = this.getElements("x" + infix + "__EMAIL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->_EMAIL->caption(), $site->_EMAIL->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->sendusername->Required) { ?>
			elm = this.getElements("x" + infix + "_sendusername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->sendusername->caption(), $site->sendusername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->sendpassword->Required) { ?>
			elm = this.getElements("x" + infix + "_sendpassword");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->sendpassword->caption(), $site->sendpassword->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->smtpserver->Required) { ?>
			elm = this.getElements("x" + infix + "_smtpserver");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->smtpserver->caption(), $site->smtpserver->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->smtpserverport->Required) { ?>
			elm = this.getElements("x" + infix + "_smtpserverport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->smtpserverport->caption(), $site->smtpserverport->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_smtpserverport");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($site->smtpserverport->errorMessage()) ?>");
		<?php if ($site_edit->MailFrom->Required) { ?>
			elm = this.getElements("x" + infix + "_MailFrom");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->MailFrom->caption(), $site->MailFrom->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->MailTo->Required) { ?>
			elm = this.getElements("x" + infix + "_MailTo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->MailTo->caption(), $site->MailTo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->MailCc->Required) { ?>
			elm = this.getElements("x" + infix + "_MailCc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->MailCc->caption(), $site->MailCc->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($site_edit->bool_ativo_site->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $site->bool_ativo_site->caption(), $site->bool_ativo_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_site");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($site->bool_ativo_site->errorMessage()) ?>");

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
fsiteedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsiteedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $site_edit->showPageHeader(); ?>
<?php
$site_edit->showMessage();
?>
<form name="fsiteedit" id="fsiteedit" class="<?php echo $site_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($site_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $site_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="site">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$site_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($site->ID_SITE->Visible) { // ID_SITE ?>
	<div id="r_ID_SITE" class="form-group row">
		<label id="elh_site_ID_SITE" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->ID_SITE->caption() ?><?php echo ($site->ID_SITE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->ID_SITE->cellAttributes() ?>>
<span id="el_site_ID_SITE">
<span<?php echo $site->ID_SITE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($site->ID_SITE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="site" data-field="x_ID_SITE" name="x_ID_SITE" id="x_ID_SITE" value="<?php echo HtmlEncode($site->ID_SITE->CurrentValue) ?>">
<?php echo $site->ID_SITE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->NOME_EMPRESA->Visible) { // NOME_EMPRESA ?>
	<div id="r_NOME_EMPRESA" class="form-group row">
		<label id="elh_site_NOME_EMPRESA" for="x_NOME_EMPRESA" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->NOME_EMPRESA->caption() ?><?php echo ($site->NOME_EMPRESA->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->NOME_EMPRESA->cellAttributes() ?>>
<span id="el_site_NOME_EMPRESA">
<input type="text" data-table="site" data-field="x_NOME_EMPRESA" name="x_NOME_EMPRESA" id="x_NOME_EMPRESA" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($site->NOME_EMPRESA->getPlaceHolder()) ?>" value="<?php echo $site->NOME_EMPRESA->EditValue ?>"<?php echo $site->NOME_EMPRESA->editAttributes() ?>>
</span>
<?php echo $site->NOME_EMPRESA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->NOME_CIDADE->Visible) { // NOME_CIDADE ?>
	<div id="r_NOME_CIDADE" class="form-group row">
		<label id="elh_site_NOME_CIDADE" for="x_NOME_CIDADE" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->NOME_CIDADE->caption() ?><?php echo ($site->NOME_CIDADE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->NOME_CIDADE->cellAttributes() ?>>
<span id="el_site_NOME_CIDADE">
<input type="text" data-table="site" data-field="x_NOME_CIDADE" name="x_NOME_CIDADE" id="x_NOME_CIDADE" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($site->NOME_CIDADE->getPlaceHolder()) ?>" value="<?php echo $site->NOME_CIDADE->EditValue ?>"<?php echo $site->NOME_CIDADE->editAttributes() ?>>
</span>
<?php echo $site->NOME_CIDADE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->ESTADO->Visible) { // ESTADO ?>
	<div id="r_ESTADO" class="form-group row">
		<label id="elh_site_ESTADO" for="x_ESTADO" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->ESTADO->caption() ?><?php echo ($site->ESTADO->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->ESTADO->cellAttributes() ?>>
<span id="el_site_ESTADO">
<input type="text" data-table="site" data-field="x_ESTADO" name="x_ESTADO" id="x_ESTADO" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($site->ESTADO->getPlaceHolder()) ?>" value="<?php echo $site->ESTADO->EditValue ?>"<?php echo $site->ESTADO->editAttributes() ?>>
</span>
<?php echo $site->ESTADO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->FONE->Visible) { // FONE ?>
	<div id="r_FONE" class="form-group row">
		<label id="elh_site_FONE" for="x_FONE" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->FONE->caption() ?><?php echo ($site->FONE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->FONE->cellAttributes() ?>>
<span id="el_site_FONE">
<input type="text" data-table="site" data-field="x_FONE" name="x_FONE" id="x_FONE" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($site->FONE->getPlaceHolder()) ?>" value="<?php echo $site->FONE->EditValue ?>"<?php echo $site->FONE->editAttributes() ?>>
</span>
<?php echo $site->FONE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->FONE_APP->Visible) { // FONE_APP ?>
	<div id="r_FONE_APP" class="form-group row">
		<label id="elh_site_FONE_APP" for="x_FONE_APP" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->FONE_APP->caption() ?><?php echo ($site->FONE_APP->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->FONE_APP->cellAttributes() ?>>
<span id="el_site_FONE_APP">
<input type="text" data-table="site" data-field="x_FONE_APP" name="x_FONE_APP" id="x_FONE_APP" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($site->FONE_APP->getPlaceHolder()) ?>" value="<?php echo $site->FONE_APP->EditValue ?>"<?php echo $site->FONE_APP->editAttributes() ?>>
</span>
<?php echo $site->FONE_APP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->_EMAIL->Visible) { // EMAIL ?>
	<div id="r__EMAIL" class="form-group row">
		<label id="elh_site__EMAIL" for="x__EMAIL" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->_EMAIL->caption() ?><?php echo ($site->_EMAIL->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->_EMAIL->cellAttributes() ?>>
<span id="el_site__EMAIL">
<input type="text" data-table="site" data-field="x__EMAIL" name="x__EMAIL" id="x__EMAIL" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($site->_EMAIL->getPlaceHolder()) ?>" value="<?php echo $site->_EMAIL->EditValue ?>"<?php echo $site->_EMAIL->editAttributes() ?>>
</span>
<?php echo $site->_EMAIL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->sendusername->Visible) { // sendusername ?>
	<div id="r_sendusername" class="form-group row">
		<label id="elh_site_sendusername" for="x_sendusername" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->sendusername->caption() ?><?php echo ($site->sendusername->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->sendusername->cellAttributes() ?>>
<span id="el_site_sendusername">
<input type="text" data-table="site" data-field="x_sendusername" name="x_sendusername" id="x_sendusername" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($site->sendusername->getPlaceHolder()) ?>" value="<?php echo $site->sendusername->EditValue ?>"<?php echo $site->sendusername->editAttributes() ?>>
</span>
<?php echo $site->sendusername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->sendpassword->Visible) { // sendpassword ?>
	<div id="r_sendpassword" class="form-group row">
		<label id="elh_site_sendpassword" for="x_sendpassword" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->sendpassword->caption() ?><?php echo ($site->sendpassword->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->sendpassword->cellAttributes() ?>>
<span id="el_site_sendpassword">
<input type="text" data-table="site" data-field="x_sendpassword" name="x_sendpassword" id="x_sendpassword" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($site->sendpassword->getPlaceHolder()) ?>" value="<?php echo $site->sendpassword->EditValue ?>"<?php echo $site->sendpassword->editAttributes() ?>>
</span>
<?php echo $site->sendpassword->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->smtpserver->Visible) { // smtpserver ?>
	<div id="r_smtpserver" class="form-group row">
		<label id="elh_site_smtpserver" for="x_smtpserver" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->smtpserver->caption() ?><?php echo ($site->smtpserver->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->smtpserver->cellAttributes() ?>>
<span id="el_site_smtpserver">
<input type="text" data-table="site" data-field="x_smtpserver" name="x_smtpserver" id="x_smtpserver" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($site->smtpserver->getPlaceHolder()) ?>" value="<?php echo $site->smtpserver->EditValue ?>"<?php echo $site->smtpserver->editAttributes() ?>>
</span>
<?php echo $site->smtpserver->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->smtpserverport->Visible) { // smtpserverport ?>
	<div id="r_smtpserverport" class="form-group row">
		<label id="elh_site_smtpserverport" for="x_smtpserverport" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->smtpserverport->caption() ?><?php echo ($site->smtpserverport->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->smtpserverport->cellAttributes() ?>>
<span id="el_site_smtpserverport">
<input type="text" data-table="site" data-field="x_smtpserverport" name="x_smtpserverport" id="x_smtpserverport" size="30" placeholder="<?php echo HtmlEncode($site->smtpserverport->getPlaceHolder()) ?>" value="<?php echo $site->smtpserverport->EditValue ?>"<?php echo $site->smtpserverport->editAttributes() ?>>
</span>
<?php echo $site->smtpserverport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->MailFrom->Visible) { // MailFrom ?>
	<div id="r_MailFrom" class="form-group row">
		<label id="elh_site_MailFrom" for="x_MailFrom" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->MailFrom->caption() ?><?php echo ($site->MailFrom->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->MailFrom->cellAttributes() ?>>
<span id="el_site_MailFrom">
<input type="text" data-table="site" data-field="x_MailFrom" name="x_MailFrom" id="x_MailFrom" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($site->MailFrom->getPlaceHolder()) ?>" value="<?php echo $site->MailFrom->EditValue ?>"<?php echo $site->MailFrom->editAttributes() ?>>
</span>
<?php echo $site->MailFrom->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->MailTo->Visible) { // MailTo ?>
	<div id="r_MailTo" class="form-group row">
		<label id="elh_site_MailTo" for="x_MailTo" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->MailTo->caption() ?><?php echo ($site->MailTo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->MailTo->cellAttributes() ?>>
<span id="el_site_MailTo">
<input type="text" data-table="site" data-field="x_MailTo" name="x_MailTo" id="x_MailTo" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($site->MailTo->getPlaceHolder()) ?>" value="<?php echo $site->MailTo->EditValue ?>"<?php echo $site->MailTo->editAttributes() ?>>
</span>
<?php echo $site->MailTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->MailCc->Visible) { // MailCc ?>
	<div id="r_MailCc" class="form-group row">
		<label id="elh_site_MailCc" for="x_MailCc" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->MailCc->caption() ?><?php echo ($site->MailCc->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->MailCc->cellAttributes() ?>>
<span id="el_site_MailCc">
<input type="text" data-table="site" data-field="x_MailCc" name="x_MailCc" id="x_MailCc" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($site->MailCc->getPlaceHolder()) ?>" value="<?php echo $site->MailCc->EditValue ?>"<?php echo $site->MailCc->editAttributes() ?>>
</span>
<?php echo $site->MailCc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($site->bool_ativo_site->Visible) { // bool_ativo_site ?>
	<div id="r_bool_ativo_site" class="form-group row">
		<label id="elh_site_bool_ativo_site" for="x_bool_ativo_site" class="<?php echo $site_edit->LeftColumnClass ?>"><?php echo $site->bool_ativo_site->caption() ?><?php echo ($site->bool_ativo_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $site_edit->RightColumnClass ?>"><div<?php echo $site->bool_ativo_site->cellAttributes() ?>>
<span id="el_site_bool_ativo_site">
<input type="text" data-table="site" data-field="x_bool_ativo_site" name="x_bool_ativo_site" id="x_bool_ativo_site" size="30" placeholder="<?php echo HtmlEncode($site->bool_ativo_site->getPlaceHolder()) ?>" value="<?php echo $site->bool_ativo_site->EditValue ?>"<?php echo $site->bool_ativo_site->editAttributes() ?>>
</span>
<?php echo $site->bool_ativo_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$site_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $site_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $site_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$site_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$site_edit->terminate();
?>
