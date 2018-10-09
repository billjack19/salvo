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
$pagina_principal_add = new pagina_principal_add();

// Run the page
$pagina_principal_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pagina_principal_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpagina_principaladd = currentForm = new ew.Form("fpagina_principaladd", "add");

// Validate form
fpagina_principaladd.validate = function() {
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
		<?php if ($pagina_principal_add->titulo_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->titulo_pagina_principal->caption(), $pagina_principal->titulo_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pagina_principal_add->titulo_menu_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_menu_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->titulo_menu_pagina_principal->caption(), $pagina_principal->titulo_menu_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pagina_principal_add->cor_pagina_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_cor_pagina_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->cor_pagina_pagina_principal->caption(), $pagina_principal->cor_pagina_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pagina_principal_add->contra_cor_pagina_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_contra_cor_pagina_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->contra_cor_pagina_pagina_principal->caption(), $pagina_principal->contra_cor_pagina_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pagina_principal_add->imagem_icone_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_icone_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->imagem_icone_pagina_principal->caption(), $pagina_principal->imagem_icone_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pagina_principal_add->imagem_logo_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_logo_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->imagem_logo_pagina_principal->caption(), $pagina_principal->imagem_logo_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pagina_principal_add->data_atualizacao_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->data_atualizacao_pagina_principal->caption(), $pagina_principal->data_atualizacao_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_pagina_principal");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pagina_principal->data_atualizacao_pagina_principal->errorMessage()) ?>");
		<?php if ($pagina_principal_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->usuario_id->caption(), $pagina_principal->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pagina_principal->usuario_id->errorMessage()) ?>");
		<?php if ($pagina_principal_add->bool_ativo_pagina_principal->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_pagina_principal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pagina_principal->bool_ativo_pagina_principal->caption(), $pagina_principal->bool_ativo_pagina_principal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_pagina_principal");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pagina_principal->bool_ativo_pagina_principal->errorMessage()) ?>");

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
fpagina_principaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpagina_principaladd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pagina_principal_add->showPageHeader(); ?>
<?php
$pagina_principal_add->showMessage();
?>
<form name="fpagina_principaladd" id="fpagina_principaladd" class="<?php echo $pagina_principal_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pagina_principal_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pagina_principal_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pagina_principal">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pagina_principal_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pagina_principal->titulo_pagina_principal->Visible) { // titulo_pagina_principal ?>
	<div id="r_titulo_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_titulo_pagina_principal" for="x_titulo_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->titulo_pagina_principal->caption() ?><?php echo ($pagina_principal->titulo_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->titulo_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_titulo_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_titulo_pagina_principal" name="x_titulo_pagina_principal" id="x_titulo_pagina_principal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pagina_principal->titulo_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->titulo_pagina_principal->EditValue ?>"<?php echo $pagina_principal->titulo_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->titulo_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->titulo_menu_pagina_principal->Visible) { // titulo_menu_pagina_principal ?>
	<div id="r_titulo_menu_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_titulo_menu_pagina_principal" for="x_titulo_menu_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->titulo_menu_pagina_principal->caption() ?><?php echo ($pagina_principal->titulo_menu_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->titulo_menu_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_titulo_menu_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_titulo_menu_pagina_principal" name="x_titulo_menu_pagina_principal" id="x_titulo_menu_pagina_principal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pagina_principal->titulo_menu_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->titulo_menu_pagina_principal->EditValue ?>"<?php echo $pagina_principal->titulo_menu_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->titulo_menu_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->cor_pagina_pagina_principal->Visible) { // cor_pagina_pagina_principal ?>
	<div id="r_cor_pagina_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_cor_pagina_pagina_principal" for="x_cor_pagina_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->cor_pagina_pagina_principal->caption() ?><?php echo ($pagina_principal->cor_pagina_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_cor_pagina_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_cor_pagina_pagina_principal" name="x_cor_pagina_pagina_principal" id="x_cor_pagina_pagina_principal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pagina_principal->cor_pagina_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->cor_pagina_pagina_principal->EditValue ?>"<?php echo $pagina_principal->cor_pagina_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->cor_pagina_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->contra_cor_pagina_pagina_principal->Visible) { // contra_cor_pagina_pagina_principal ?>
	<div id="r_contra_cor_pagina_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_contra_cor_pagina_pagina_principal" for="x_contra_cor_pagina_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->contra_cor_pagina_pagina_principal->caption() ?><?php echo ($pagina_principal->contra_cor_pagina_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_contra_cor_pagina_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_contra_cor_pagina_pagina_principal" name="x_contra_cor_pagina_pagina_principal" id="x_contra_cor_pagina_pagina_principal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pagina_principal->contra_cor_pagina_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->EditValue ?>"<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->imagem_icone_pagina_principal->Visible) { // imagem_icone_pagina_principal ?>
	<div id="r_imagem_icone_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_imagem_icone_pagina_principal" for="x_imagem_icone_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->imagem_icone_pagina_principal->caption() ?><?php echo ($pagina_principal->imagem_icone_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->imagem_icone_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_imagem_icone_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_imagem_icone_pagina_principal" name="x_imagem_icone_pagina_principal" id="x_imagem_icone_pagina_principal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pagina_principal->imagem_icone_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->imagem_icone_pagina_principal->EditValue ?>"<?php echo $pagina_principal->imagem_icone_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->imagem_icone_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->imagem_logo_pagina_principal->Visible) { // imagem_logo_pagina_principal ?>
	<div id="r_imagem_logo_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_imagem_logo_pagina_principal" for="x_imagem_logo_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->imagem_logo_pagina_principal->caption() ?><?php echo ($pagina_principal->imagem_logo_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->imagem_logo_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_imagem_logo_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_imagem_logo_pagina_principal" name="x_imagem_logo_pagina_principal" id="x_imagem_logo_pagina_principal" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pagina_principal->imagem_logo_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->imagem_logo_pagina_principal->EditValue ?>"<?php echo $pagina_principal->imagem_logo_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->imagem_logo_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->data_atualizacao_pagina_principal->Visible) { // data_atualizacao_pagina_principal ?>
	<div id="r_data_atualizacao_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_data_atualizacao_pagina_principal" for="x_data_atualizacao_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->data_atualizacao_pagina_principal->caption() ?><?php echo ($pagina_principal->data_atualizacao_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->data_atualizacao_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_data_atualizacao_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_data_atualizacao_pagina_principal" name="x_data_atualizacao_pagina_principal" id="x_data_atualizacao_pagina_principal" placeholder="<?php echo HtmlEncode($pagina_principal->data_atualizacao_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->data_atualizacao_pagina_principal->EditValue ?>"<?php echo $pagina_principal->data_atualizacao_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->data_atualizacao_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_pagina_principal_usuario_id" for="x_usuario_id" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->usuario_id->caption() ?><?php echo ($pagina_principal->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->usuario_id->cellAttributes() ?>>
<span id="el_pagina_principal_usuario_id">
<input type="text" data-table="pagina_principal" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($pagina_principal->usuario_id->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->usuario_id->EditValue ?>"<?php echo $pagina_principal->usuario_id->editAttributes() ?>>
</span>
<?php echo $pagina_principal->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pagina_principal->bool_ativo_pagina_principal->Visible) { // bool_ativo_pagina_principal ?>
	<div id="r_bool_ativo_pagina_principal" class="form-group row">
		<label id="elh_pagina_principal_bool_ativo_pagina_principal" for="x_bool_ativo_pagina_principal" class="<?php echo $pagina_principal_add->LeftColumnClass ?>"><?php echo $pagina_principal->bool_ativo_pagina_principal->caption() ?><?php echo ($pagina_principal->bool_ativo_pagina_principal->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pagina_principal_add->RightColumnClass ?>"><div<?php echo $pagina_principal->bool_ativo_pagina_principal->cellAttributes() ?>>
<span id="el_pagina_principal_bool_ativo_pagina_principal">
<input type="text" data-table="pagina_principal" data-field="x_bool_ativo_pagina_principal" name="x_bool_ativo_pagina_principal" id="x_bool_ativo_pagina_principal" size="30" placeholder="<?php echo HtmlEncode($pagina_principal->bool_ativo_pagina_principal->getPlaceHolder()) ?>" value="<?php echo $pagina_principal->bool_ativo_pagina_principal->EditValue ?>"<?php echo $pagina_principal->bool_ativo_pagina_principal->editAttributes() ?>>
</span>
<?php echo $pagina_principal->bool_ativo_pagina_principal->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pagina_principal_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pagina_principal_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pagina_principal_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pagina_principal_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pagina_principal_add->terminate();
?>
