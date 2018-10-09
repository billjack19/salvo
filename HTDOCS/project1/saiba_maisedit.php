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
$saiba_mais_edit = new saiba_mais_edit();

// Run the page
$saiba_mais_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$saiba_mais_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsaiba_maisedit = currentForm = new ew.Form("fsaiba_maisedit", "edit");

// Validate form
fsaiba_maisedit.validate = function() {
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
		<?php if ($saiba_mais_edit->id_saiba_mais->Required) { ?>
			elm = this.getElements("x" + infix + "_id_saiba_mais");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $saiba_mais->id_saiba_mais->caption(), $saiba_mais->id_saiba_mais->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($saiba_mais_edit->descricao_saiba_mais->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_saiba_mais");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $saiba_mais->descricao_saiba_mais->caption(), $saiba_mais->descricao_saiba_mais->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($saiba_mais_edit->pagina_principal_id->Required) { ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $saiba_mais->pagina_principal_id->caption(), $saiba_mais->pagina_principal_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($saiba_mais->pagina_principal_id->errorMessage()) ?>");
		<?php if ($saiba_mais_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $saiba_mais->usuario_id->caption(), $saiba_mais->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($saiba_mais->usuario_id->errorMessage()) ?>");
		<?php if ($saiba_mais_edit->data_atualizacao_saiba_mais->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_saiba_mais");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $saiba_mais->data_atualizacao_saiba_mais->caption(), $saiba_mais->data_atualizacao_saiba_mais->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_saiba_mais");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($saiba_mais->data_atualizacao_saiba_mais->errorMessage()) ?>");
		<?php if ($saiba_mais_edit->bool_ativo_saiba_mais->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_saiba_mais");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $saiba_mais->bool_ativo_saiba_mais->caption(), $saiba_mais->bool_ativo_saiba_mais->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_saiba_mais");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($saiba_mais->bool_ativo_saiba_mais->errorMessage()) ?>");

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
fsaiba_maisedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsaiba_maisedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $saiba_mais_edit->showPageHeader(); ?>
<?php
$saiba_mais_edit->showMessage();
?>
<form name="fsaiba_maisedit" id="fsaiba_maisedit" class="<?php echo $saiba_mais_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($saiba_mais_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $saiba_mais_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="saiba_mais">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$saiba_mais_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($saiba_mais->id_saiba_mais->Visible) { // id_saiba_mais ?>
	<div id="r_id_saiba_mais" class="form-group row">
		<label id="elh_saiba_mais_id_saiba_mais" class="<?php echo $saiba_mais_edit->LeftColumnClass ?>"><?php echo $saiba_mais->id_saiba_mais->caption() ?><?php echo ($saiba_mais->id_saiba_mais->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $saiba_mais_edit->RightColumnClass ?>"><div<?php echo $saiba_mais->id_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_id_saiba_mais">
<span<?php echo $saiba_mais->id_saiba_mais->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($saiba_mais->id_saiba_mais->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="saiba_mais" data-field="x_id_saiba_mais" name="x_id_saiba_mais" id="x_id_saiba_mais" value="<?php echo HtmlEncode($saiba_mais->id_saiba_mais->CurrentValue) ?>">
<?php echo $saiba_mais->id_saiba_mais->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($saiba_mais->descricao_saiba_mais->Visible) { // descricao_saiba_mais ?>
	<div id="r_descricao_saiba_mais" class="form-group row">
		<label id="elh_saiba_mais_descricao_saiba_mais" for="x_descricao_saiba_mais" class="<?php echo $saiba_mais_edit->LeftColumnClass ?>"><?php echo $saiba_mais->descricao_saiba_mais->caption() ?><?php echo ($saiba_mais->descricao_saiba_mais->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $saiba_mais_edit->RightColumnClass ?>"><div<?php echo $saiba_mais->descricao_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_descricao_saiba_mais">
<input type="text" data-table="saiba_mais" data-field="x_descricao_saiba_mais" name="x_descricao_saiba_mais" id="x_descricao_saiba_mais" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($saiba_mais->descricao_saiba_mais->getPlaceHolder()) ?>" value="<?php echo $saiba_mais->descricao_saiba_mais->EditValue ?>"<?php echo $saiba_mais->descricao_saiba_mais->editAttributes() ?>>
</span>
<?php echo $saiba_mais->descricao_saiba_mais->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($saiba_mais->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<div id="r_pagina_principal_id" class="form-group row">
		<label id="elh_saiba_mais_pagina_principal_id" for="x_pagina_principal_id" class="<?php echo $saiba_mais_edit->LeftColumnClass ?>"><?php echo $saiba_mais->pagina_principal_id->caption() ?><?php echo ($saiba_mais->pagina_principal_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $saiba_mais_edit->RightColumnClass ?>"><div<?php echo $saiba_mais->pagina_principal_id->cellAttributes() ?>>
<span id="el_saiba_mais_pagina_principal_id">
<input type="text" data-table="saiba_mais" data-field="x_pagina_principal_id" name="x_pagina_principal_id" id="x_pagina_principal_id" size="30" placeholder="<?php echo HtmlEncode($saiba_mais->pagina_principal_id->getPlaceHolder()) ?>" value="<?php echo $saiba_mais->pagina_principal_id->EditValue ?>"<?php echo $saiba_mais->pagina_principal_id->editAttributes() ?>>
</span>
<?php echo $saiba_mais->pagina_principal_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($saiba_mais->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_saiba_mais_usuario_id" for="x_usuario_id" class="<?php echo $saiba_mais_edit->LeftColumnClass ?>"><?php echo $saiba_mais->usuario_id->caption() ?><?php echo ($saiba_mais->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $saiba_mais_edit->RightColumnClass ?>"><div<?php echo $saiba_mais->usuario_id->cellAttributes() ?>>
<span id="el_saiba_mais_usuario_id">
<input type="text" data-table="saiba_mais" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($saiba_mais->usuario_id->getPlaceHolder()) ?>" value="<?php echo $saiba_mais->usuario_id->EditValue ?>"<?php echo $saiba_mais->usuario_id->editAttributes() ?>>
</span>
<?php echo $saiba_mais->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($saiba_mais->data_atualizacao_saiba_mais->Visible) { // data_atualizacao_saiba_mais ?>
	<div id="r_data_atualizacao_saiba_mais" class="form-group row">
		<label id="elh_saiba_mais_data_atualizacao_saiba_mais" for="x_data_atualizacao_saiba_mais" class="<?php echo $saiba_mais_edit->LeftColumnClass ?>"><?php echo $saiba_mais->data_atualizacao_saiba_mais->caption() ?><?php echo ($saiba_mais->data_atualizacao_saiba_mais->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $saiba_mais_edit->RightColumnClass ?>"><div<?php echo $saiba_mais->data_atualizacao_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_data_atualizacao_saiba_mais">
<input type="text" data-table="saiba_mais" data-field="x_data_atualizacao_saiba_mais" name="x_data_atualizacao_saiba_mais" id="x_data_atualizacao_saiba_mais" placeholder="<?php echo HtmlEncode($saiba_mais->data_atualizacao_saiba_mais->getPlaceHolder()) ?>" value="<?php echo $saiba_mais->data_atualizacao_saiba_mais->EditValue ?>"<?php echo $saiba_mais->data_atualizacao_saiba_mais->editAttributes() ?>>
</span>
<?php echo $saiba_mais->data_atualizacao_saiba_mais->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($saiba_mais->bool_ativo_saiba_mais->Visible) { // bool_ativo_saiba_mais ?>
	<div id="r_bool_ativo_saiba_mais" class="form-group row">
		<label id="elh_saiba_mais_bool_ativo_saiba_mais" for="x_bool_ativo_saiba_mais" class="<?php echo $saiba_mais_edit->LeftColumnClass ?>"><?php echo $saiba_mais->bool_ativo_saiba_mais->caption() ?><?php echo ($saiba_mais->bool_ativo_saiba_mais->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $saiba_mais_edit->RightColumnClass ?>"><div<?php echo $saiba_mais->bool_ativo_saiba_mais->cellAttributes() ?>>
<span id="el_saiba_mais_bool_ativo_saiba_mais">
<input type="text" data-table="saiba_mais" data-field="x_bool_ativo_saiba_mais" name="x_bool_ativo_saiba_mais" id="x_bool_ativo_saiba_mais" size="30" placeholder="<?php echo HtmlEncode($saiba_mais->bool_ativo_saiba_mais->getPlaceHolder()) ?>" value="<?php echo $saiba_mais->bool_ativo_saiba_mais->EditValue ?>"<?php echo $saiba_mais->bool_ativo_saiba_mais->editAttributes() ?>>
</span>
<?php echo $saiba_mais->bool_ativo_saiba_mais->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$saiba_mais_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $saiba_mais_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $saiba_mais_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$saiba_mais_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$saiba_mais_edit->terminate();
?>
