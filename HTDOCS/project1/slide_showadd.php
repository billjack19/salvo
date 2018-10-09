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
$slide_show_add = new slide_show_add();

// Run the page
$slide_show_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$slide_show_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fslide_showadd = currentForm = new ew.Form("fslide_showadd", "add");

// Validate form
fslide_showadd.validate = function() {
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
		<?php if ($slide_show_add->titulo_slide_show->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_slide_show");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->titulo_slide_show->caption(), $slide_show->titulo_slide_show->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($slide_show_add->descricao_slide_show->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_slide_show");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->descricao_slide_show->caption(), $slide_show->descricao_slide_show->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($slide_show_add->imagem_slide_show->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_slide_show");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->imagem_slide_show->caption(), $slide_show->imagem_slide_show->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($slide_show_add->item_id->Required) { ?>
			elm = this.getElements("x" + infix + "_item_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->item_id->caption(), $slide_show->item_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_item_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($slide_show->item_id->errorMessage()) ?>");
		<?php if ($slide_show_add->pagina_principal_id->Required) { ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->pagina_principal_id->caption(), $slide_show->pagina_principal_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($slide_show->pagina_principal_id->errorMessage()) ?>");
		<?php if ($slide_show_add->data_atualizacao_slide_show->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_slide_show");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->data_atualizacao_slide_show->caption(), $slide_show->data_atualizacao_slide_show->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_slide_show");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($slide_show->data_atualizacao_slide_show->errorMessage()) ?>");
		<?php if ($slide_show_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->usuario_id->caption(), $slide_show->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($slide_show->usuario_id->errorMessage()) ?>");
		<?php if ($slide_show_add->bool_ativo_slide_show->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_slide_show");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $slide_show->bool_ativo_slide_show->caption(), $slide_show->bool_ativo_slide_show->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_slide_show");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($slide_show->bool_ativo_slide_show->errorMessage()) ?>");

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
fslide_showadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fslide_showadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $slide_show_add->showPageHeader(); ?>
<?php
$slide_show_add->showMessage();
?>
<form name="fslide_showadd" id="fslide_showadd" class="<?php echo $slide_show_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($slide_show_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $slide_show_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="slide_show">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$slide_show_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($slide_show->titulo_slide_show->Visible) { // titulo_slide_show ?>
	<div id="r_titulo_slide_show" class="form-group row">
		<label id="elh_slide_show_titulo_slide_show" for="x_titulo_slide_show" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->titulo_slide_show->caption() ?><?php echo ($slide_show->titulo_slide_show->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->titulo_slide_show->cellAttributes() ?>>
<span id="el_slide_show_titulo_slide_show">
<input type="text" data-table="slide_show" data-field="x_titulo_slide_show" name="x_titulo_slide_show" id="x_titulo_slide_show" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($slide_show->titulo_slide_show->getPlaceHolder()) ?>" value="<?php echo $slide_show->titulo_slide_show->EditValue ?>"<?php echo $slide_show->titulo_slide_show->editAttributes() ?>>
</span>
<?php echo $slide_show->titulo_slide_show->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($slide_show->descricao_slide_show->Visible) { // descricao_slide_show ?>
	<div id="r_descricao_slide_show" class="form-group row">
		<label id="elh_slide_show_descricao_slide_show" for="x_descricao_slide_show" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->descricao_slide_show->caption() ?><?php echo ($slide_show->descricao_slide_show->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->descricao_slide_show->cellAttributes() ?>>
<span id="el_slide_show_descricao_slide_show">
<input type="text" data-table="slide_show" data-field="x_descricao_slide_show" name="x_descricao_slide_show" id="x_descricao_slide_show" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($slide_show->descricao_slide_show->getPlaceHolder()) ?>" value="<?php echo $slide_show->descricao_slide_show->EditValue ?>"<?php echo $slide_show->descricao_slide_show->editAttributes() ?>>
</span>
<?php echo $slide_show->descricao_slide_show->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($slide_show->imagem_slide_show->Visible) { // imagem_slide_show ?>
	<div id="r_imagem_slide_show" class="form-group row">
		<label id="elh_slide_show_imagem_slide_show" for="x_imagem_slide_show" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->imagem_slide_show->caption() ?><?php echo ($slide_show->imagem_slide_show->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->imagem_slide_show->cellAttributes() ?>>
<span id="el_slide_show_imagem_slide_show">
<input type="text" data-table="slide_show" data-field="x_imagem_slide_show" name="x_imagem_slide_show" id="x_imagem_slide_show" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($slide_show->imagem_slide_show->getPlaceHolder()) ?>" value="<?php echo $slide_show->imagem_slide_show->EditValue ?>"<?php echo $slide_show->imagem_slide_show->editAttributes() ?>>
</span>
<?php echo $slide_show->imagem_slide_show->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($slide_show->item_id->Visible) { // item_id ?>
	<div id="r_item_id" class="form-group row">
		<label id="elh_slide_show_item_id" for="x_item_id" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->item_id->caption() ?><?php echo ($slide_show->item_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->item_id->cellAttributes() ?>>
<span id="el_slide_show_item_id">
<input type="text" data-table="slide_show" data-field="x_item_id" name="x_item_id" id="x_item_id" size="30" placeholder="<?php echo HtmlEncode($slide_show->item_id->getPlaceHolder()) ?>" value="<?php echo $slide_show->item_id->EditValue ?>"<?php echo $slide_show->item_id->editAttributes() ?>>
</span>
<?php echo $slide_show->item_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($slide_show->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<div id="r_pagina_principal_id" class="form-group row">
		<label id="elh_slide_show_pagina_principal_id" for="x_pagina_principal_id" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->pagina_principal_id->caption() ?><?php echo ($slide_show->pagina_principal_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->pagina_principal_id->cellAttributes() ?>>
<span id="el_slide_show_pagina_principal_id">
<input type="text" data-table="slide_show" data-field="x_pagina_principal_id" name="x_pagina_principal_id" id="x_pagina_principal_id" size="30" placeholder="<?php echo HtmlEncode($slide_show->pagina_principal_id->getPlaceHolder()) ?>" value="<?php echo $slide_show->pagina_principal_id->EditValue ?>"<?php echo $slide_show->pagina_principal_id->editAttributes() ?>>
</span>
<?php echo $slide_show->pagina_principal_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($slide_show->data_atualizacao_slide_show->Visible) { // data_atualizacao_slide_show ?>
	<div id="r_data_atualizacao_slide_show" class="form-group row">
		<label id="elh_slide_show_data_atualizacao_slide_show" for="x_data_atualizacao_slide_show" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->data_atualizacao_slide_show->caption() ?><?php echo ($slide_show->data_atualizacao_slide_show->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->data_atualizacao_slide_show->cellAttributes() ?>>
<span id="el_slide_show_data_atualizacao_slide_show">
<input type="text" data-table="slide_show" data-field="x_data_atualizacao_slide_show" name="x_data_atualizacao_slide_show" id="x_data_atualizacao_slide_show" placeholder="<?php echo HtmlEncode($slide_show->data_atualizacao_slide_show->getPlaceHolder()) ?>" value="<?php echo $slide_show->data_atualizacao_slide_show->EditValue ?>"<?php echo $slide_show->data_atualizacao_slide_show->editAttributes() ?>>
</span>
<?php echo $slide_show->data_atualizacao_slide_show->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($slide_show->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_slide_show_usuario_id" for="x_usuario_id" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->usuario_id->caption() ?><?php echo ($slide_show->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->usuario_id->cellAttributes() ?>>
<span id="el_slide_show_usuario_id">
<input type="text" data-table="slide_show" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($slide_show->usuario_id->getPlaceHolder()) ?>" value="<?php echo $slide_show->usuario_id->EditValue ?>"<?php echo $slide_show->usuario_id->editAttributes() ?>>
</span>
<?php echo $slide_show->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($slide_show->bool_ativo_slide_show->Visible) { // bool_ativo_slide_show ?>
	<div id="r_bool_ativo_slide_show" class="form-group row">
		<label id="elh_slide_show_bool_ativo_slide_show" for="x_bool_ativo_slide_show" class="<?php echo $slide_show_add->LeftColumnClass ?>"><?php echo $slide_show->bool_ativo_slide_show->caption() ?><?php echo ($slide_show->bool_ativo_slide_show->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $slide_show_add->RightColumnClass ?>"><div<?php echo $slide_show->bool_ativo_slide_show->cellAttributes() ?>>
<span id="el_slide_show_bool_ativo_slide_show">
<input type="text" data-table="slide_show" data-field="x_bool_ativo_slide_show" name="x_bool_ativo_slide_show" id="x_bool_ativo_slide_show" size="30" placeholder="<?php echo HtmlEncode($slide_show->bool_ativo_slide_show->getPlaceHolder()) ?>" value="<?php echo $slide_show->bool_ativo_slide_show->EditValue ?>"<?php echo $slide_show->bool_ativo_slide_show->editAttributes() ?>>
</span>
<?php echo $slide_show->bool_ativo_slide_show->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$slide_show_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $slide_show_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $slide_show_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$slide_show_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$slide_show_add->terminate();
?>
