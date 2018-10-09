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
$loja_add = new loja_add();

// Run the page
$loja_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$loja_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flojaadd = currentForm = new ew.Form("flojaadd", "add");

// Validate form
flojaadd.validate = function() {
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
		<?php if ($loja_add->titulo_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $loja->titulo_loja->caption(), $loja->titulo_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($loja_add->descricao_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $loja->descricao_loja->caption(), $loja->descricao_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($loja_add->imagem_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $loja->imagem_loja->caption(), $loja->imagem_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($loja_add->pagina_principal_id->Required) { ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $loja->pagina_principal_id->caption(), $loja->pagina_principal_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($loja->pagina_principal_id->errorMessage()) ?>");
		<?php if ($loja_add->data_atualizacao_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $loja->data_atualizacao_loja->caption(), $loja->data_atualizacao_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_loja");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($loja->data_atualizacao_loja->errorMessage()) ?>");
		<?php if ($loja_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $loja->usuario_id->caption(), $loja->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($loja->usuario_id->errorMessage()) ?>");
		<?php if ($loja_add->bool_ativo_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $loja->bool_ativo_loja->caption(), $loja->bool_ativo_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_loja");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($loja->bool_ativo_loja->errorMessage()) ?>");

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
flojaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flojaadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $loja_add->showPageHeader(); ?>
<?php
$loja_add->showMessage();
?>
<form name="flojaadd" id="flojaadd" class="<?php echo $loja_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($loja_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $loja_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="loja">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$loja_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($loja->titulo_loja->Visible) { // titulo_loja ?>
	<div id="r_titulo_loja" class="form-group row">
		<label id="elh_loja_titulo_loja" for="x_titulo_loja" class="<?php echo $loja_add->LeftColumnClass ?>"><?php echo $loja->titulo_loja->caption() ?><?php echo ($loja->titulo_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $loja_add->RightColumnClass ?>"><div<?php echo $loja->titulo_loja->cellAttributes() ?>>
<span id="el_loja_titulo_loja">
<input type="text" data-table="loja" data-field="x_titulo_loja" name="x_titulo_loja" id="x_titulo_loja" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($loja->titulo_loja->getPlaceHolder()) ?>" value="<?php echo $loja->titulo_loja->EditValue ?>"<?php echo $loja->titulo_loja->editAttributes() ?>>
</span>
<?php echo $loja->titulo_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($loja->descricao_loja->Visible) { // descricao_loja ?>
	<div id="r_descricao_loja" class="form-group row">
		<label id="elh_loja_descricao_loja" for="x_descricao_loja" class="<?php echo $loja_add->LeftColumnClass ?>"><?php echo $loja->descricao_loja->caption() ?><?php echo ($loja->descricao_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $loja_add->RightColumnClass ?>"><div<?php echo $loja->descricao_loja->cellAttributes() ?>>
<span id="el_loja_descricao_loja">
<input type="text" data-table="loja" data-field="x_descricao_loja" name="x_descricao_loja" id="x_descricao_loja" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($loja->descricao_loja->getPlaceHolder()) ?>" value="<?php echo $loja->descricao_loja->EditValue ?>"<?php echo $loja->descricao_loja->editAttributes() ?>>
</span>
<?php echo $loja->descricao_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($loja->imagem_loja->Visible) { // imagem_loja ?>
	<div id="r_imagem_loja" class="form-group row">
		<label id="elh_loja_imagem_loja" for="x_imagem_loja" class="<?php echo $loja_add->LeftColumnClass ?>"><?php echo $loja->imagem_loja->caption() ?><?php echo ($loja->imagem_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $loja_add->RightColumnClass ?>"><div<?php echo $loja->imagem_loja->cellAttributes() ?>>
<span id="el_loja_imagem_loja">
<input type="text" data-table="loja" data-field="x_imagem_loja" name="x_imagem_loja" id="x_imagem_loja" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($loja->imagem_loja->getPlaceHolder()) ?>" value="<?php echo $loja->imagem_loja->EditValue ?>"<?php echo $loja->imagem_loja->editAttributes() ?>>
</span>
<?php echo $loja->imagem_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($loja->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<div id="r_pagina_principal_id" class="form-group row">
		<label id="elh_loja_pagina_principal_id" for="x_pagina_principal_id" class="<?php echo $loja_add->LeftColumnClass ?>"><?php echo $loja->pagina_principal_id->caption() ?><?php echo ($loja->pagina_principal_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $loja_add->RightColumnClass ?>"><div<?php echo $loja->pagina_principal_id->cellAttributes() ?>>
<span id="el_loja_pagina_principal_id">
<input type="text" data-table="loja" data-field="x_pagina_principal_id" name="x_pagina_principal_id" id="x_pagina_principal_id" size="30" placeholder="<?php echo HtmlEncode($loja->pagina_principal_id->getPlaceHolder()) ?>" value="<?php echo $loja->pagina_principal_id->EditValue ?>"<?php echo $loja->pagina_principal_id->editAttributes() ?>>
</span>
<?php echo $loja->pagina_principal_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($loja->data_atualizacao_loja->Visible) { // data_atualizacao_loja ?>
	<div id="r_data_atualizacao_loja" class="form-group row">
		<label id="elh_loja_data_atualizacao_loja" for="x_data_atualizacao_loja" class="<?php echo $loja_add->LeftColumnClass ?>"><?php echo $loja->data_atualizacao_loja->caption() ?><?php echo ($loja->data_atualizacao_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $loja_add->RightColumnClass ?>"><div<?php echo $loja->data_atualizacao_loja->cellAttributes() ?>>
<span id="el_loja_data_atualizacao_loja">
<input type="text" data-table="loja" data-field="x_data_atualizacao_loja" name="x_data_atualizacao_loja" id="x_data_atualizacao_loja" placeholder="<?php echo HtmlEncode($loja->data_atualizacao_loja->getPlaceHolder()) ?>" value="<?php echo $loja->data_atualizacao_loja->EditValue ?>"<?php echo $loja->data_atualizacao_loja->editAttributes() ?>>
</span>
<?php echo $loja->data_atualizacao_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($loja->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_loja_usuario_id" for="x_usuario_id" class="<?php echo $loja_add->LeftColumnClass ?>"><?php echo $loja->usuario_id->caption() ?><?php echo ($loja->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $loja_add->RightColumnClass ?>"><div<?php echo $loja->usuario_id->cellAttributes() ?>>
<span id="el_loja_usuario_id">
<input type="text" data-table="loja" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($loja->usuario_id->getPlaceHolder()) ?>" value="<?php echo $loja->usuario_id->EditValue ?>"<?php echo $loja->usuario_id->editAttributes() ?>>
</span>
<?php echo $loja->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($loja->bool_ativo_loja->Visible) { // bool_ativo_loja ?>
	<div id="r_bool_ativo_loja" class="form-group row">
		<label id="elh_loja_bool_ativo_loja" for="x_bool_ativo_loja" class="<?php echo $loja_add->LeftColumnClass ?>"><?php echo $loja->bool_ativo_loja->caption() ?><?php echo ($loja->bool_ativo_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $loja_add->RightColumnClass ?>"><div<?php echo $loja->bool_ativo_loja->cellAttributes() ?>>
<span id="el_loja_bool_ativo_loja">
<input type="text" data-table="loja" data-field="x_bool_ativo_loja" name="x_bool_ativo_loja" id="x_bool_ativo_loja" size="30" placeholder="<?php echo HtmlEncode($loja->bool_ativo_loja->getPlaceHolder()) ?>" value="<?php echo $loja->bool_ativo_loja->EditValue ?>"<?php echo $loja->bool_ativo_loja->editAttributes() ?>>
</span>
<?php echo $loja->bool_ativo_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$loja_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $loja_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $loja_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$loja_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$loja_add->terminate();
?>
