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
$paginas_edit = new paginas_edit();

// Run the page
$paginas_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$paginas_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpaginasedit = currentForm = new ew.Form("fpaginasedit", "edit");

// Validate form
fpaginasedit.validate = function() {
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
		<?php if ($paginas_edit->id_paginas->Required) { ?>
			elm = this.getElements("x" + infix + "_id_paginas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->id_paginas->caption(), $paginas->id_paginas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($paginas_edit->numero_da_pagina_paginas->Required) { ?>
			elm = this.getElements("x" + infix + "_numero_da_pagina_paginas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->numero_da_pagina_paginas->caption(), $paginas->numero_da_pagina_paginas->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_numero_da_pagina_paginas");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($paginas->numero_da_pagina_paginas->errorMessage()) ?>");
		<?php if ($paginas_edit->imagem_paginas->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_paginas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->imagem_paginas->caption(), $paginas->imagem_paginas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($paginas_edit->imagem_miniatura_paginas->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_miniatura_paginas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->imagem_miniatura_paginas->caption(), $paginas->imagem_miniatura_paginas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($paginas_edit->new_sjt_id->Required) { ?>
			elm = this.getElements("x" + infix + "_new_sjt_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->new_sjt_id->caption(), $paginas->new_sjt_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_new_sjt_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($paginas->new_sjt_id->errorMessage()) ?>");
		<?php if ($paginas_edit->data_atualizacao_paginas->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_paginas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->data_atualizacao_paginas->caption(), $paginas->data_atualizacao_paginas->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_paginas");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($paginas->data_atualizacao_paginas->errorMessage()) ?>");
		<?php if ($paginas_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->usuario_id->caption(), $paginas->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($paginas->usuario_id->errorMessage()) ?>");
		<?php if ($paginas_edit->bool_ativo_paginas->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_paginas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $paginas->bool_ativo_paginas->caption(), $paginas->bool_ativo_paginas->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_paginas");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($paginas->bool_ativo_paginas->errorMessage()) ?>");

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
fpaginasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpaginasedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $paginas_edit->showPageHeader(); ?>
<?php
$paginas_edit->showMessage();
?>
<form name="fpaginasedit" id="fpaginasedit" class="<?php echo $paginas_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($paginas_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $paginas_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="paginas">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$paginas_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($paginas->id_paginas->Visible) { // id_paginas ?>
	<div id="r_id_paginas" class="form-group row">
		<label id="elh_paginas_id_paginas" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->id_paginas->caption() ?><?php echo ($paginas->id_paginas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->id_paginas->cellAttributes() ?>>
<span id="el_paginas_id_paginas">
<span<?php echo $paginas->id_paginas->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($paginas->id_paginas->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="paginas" data-field="x_id_paginas" name="x_id_paginas" id="x_id_paginas" value="<?php echo HtmlEncode($paginas->id_paginas->CurrentValue) ?>">
<?php echo $paginas->id_paginas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($paginas->numero_da_pagina_paginas->Visible) { // numero_da_pagina_paginas ?>
	<div id="r_numero_da_pagina_paginas" class="form-group row">
		<label id="elh_paginas_numero_da_pagina_paginas" for="x_numero_da_pagina_paginas" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->numero_da_pagina_paginas->caption() ?><?php echo ($paginas->numero_da_pagina_paginas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->numero_da_pagina_paginas->cellAttributes() ?>>
<span id="el_paginas_numero_da_pagina_paginas">
<input type="text" data-table="paginas" data-field="x_numero_da_pagina_paginas" name="x_numero_da_pagina_paginas" id="x_numero_da_pagina_paginas" size="30" placeholder="<?php echo HtmlEncode($paginas->numero_da_pagina_paginas->getPlaceHolder()) ?>" value="<?php echo $paginas->numero_da_pagina_paginas->EditValue ?>"<?php echo $paginas->numero_da_pagina_paginas->editAttributes() ?>>
</span>
<?php echo $paginas->numero_da_pagina_paginas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($paginas->imagem_paginas->Visible) { // imagem_paginas ?>
	<div id="r_imagem_paginas" class="form-group row">
		<label id="elh_paginas_imagem_paginas" for="x_imagem_paginas" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->imagem_paginas->caption() ?><?php echo ($paginas->imagem_paginas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->imagem_paginas->cellAttributes() ?>>
<span id="el_paginas_imagem_paginas">
<input type="text" data-table="paginas" data-field="x_imagem_paginas" name="x_imagem_paginas" id="x_imagem_paginas" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($paginas->imagem_paginas->getPlaceHolder()) ?>" value="<?php echo $paginas->imagem_paginas->EditValue ?>"<?php echo $paginas->imagem_paginas->editAttributes() ?>>
</span>
<?php echo $paginas->imagem_paginas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($paginas->imagem_miniatura_paginas->Visible) { // imagem_miniatura_paginas ?>
	<div id="r_imagem_miniatura_paginas" class="form-group row">
		<label id="elh_paginas_imagem_miniatura_paginas" for="x_imagem_miniatura_paginas" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->imagem_miniatura_paginas->caption() ?><?php echo ($paginas->imagem_miniatura_paginas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->imagem_miniatura_paginas->cellAttributes() ?>>
<span id="el_paginas_imagem_miniatura_paginas">
<input type="text" data-table="paginas" data-field="x_imagem_miniatura_paginas" name="x_imagem_miniatura_paginas" id="x_imagem_miniatura_paginas" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($paginas->imagem_miniatura_paginas->getPlaceHolder()) ?>" value="<?php echo $paginas->imagem_miniatura_paginas->EditValue ?>"<?php echo $paginas->imagem_miniatura_paginas->editAttributes() ?>>
</span>
<?php echo $paginas->imagem_miniatura_paginas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($paginas->new_sjt_id->Visible) { // new_sjt_id ?>
	<div id="r_new_sjt_id" class="form-group row">
		<label id="elh_paginas_new_sjt_id" for="x_new_sjt_id" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->new_sjt_id->caption() ?><?php echo ($paginas->new_sjt_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->new_sjt_id->cellAttributes() ?>>
<span id="el_paginas_new_sjt_id">
<input type="text" data-table="paginas" data-field="x_new_sjt_id" name="x_new_sjt_id" id="x_new_sjt_id" size="30" placeholder="<?php echo HtmlEncode($paginas->new_sjt_id->getPlaceHolder()) ?>" value="<?php echo $paginas->new_sjt_id->EditValue ?>"<?php echo $paginas->new_sjt_id->editAttributes() ?>>
</span>
<?php echo $paginas->new_sjt_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($paginas->data_atualizacao_paginas->Visible) { // data_atualizacao_paginas ?>
	<div id="r_data_atualizacao_paginas" class="form-group row">
		<label id="elh_paginas_data_atualizacao_paginas" for="x_data_atualizacao_paginas" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->data_atualizacao_paginas->caption() ?><?php echo ($paginas->data_atualizacao_paginas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->data_atualizacao_paginas->cellAttributes() ?>>
<span id="el_paginas_data_atualizacao_paginas">
<input type="text" data-table="paginas" data-field="x_data_atualizacao_paginas" name="x_data_atualizacao_paginas" id="x_data_atualizacao_paginas" placeholder="<?php echo HtmlEncode($paginas->data_atualizacao_paginas->getPlaceHolder()) ?>" value="<?php echo $paginas->data_atualizacao_paginas->EditValue ?>"<?php echo $paginas->data_atualizacao_paginas->editAttributes() ?>>
</span>
<?php echo $paginas->data_atualizacao_paginas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($paginas->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_paginas_usuario_id" for="x_usuario_id" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->usuario_id->caption() ?><?php echo ($paginas->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->usuario_id->cellAttributes() ?>>
<span id="el_paginas_usuario_id">
<input type="text" data-table="paginas" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($paginas->usuario_id->getPlaceHolder()) ?>" value="<?php echo $paginas->usuario_id->EditValue ?>"<?php echo $paginas->usuario_id->editAttributes() ?>>
</span>
<?php echo $paginas->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($paginas->bool_ativo_paginas->Visible) { // bool_ativo_paginas ?>
	<div id="r_bool_ativo_paginas" class="form-group row">
		<label id="elh_paginas_bool_ativo_paginas" for="x_bool_ativo_paginas" class="<?php echo $paginas_edit->LeftColumnClass ?>"><?php echo $paginas->bool_ativo_paginas->caption() ?><?php echo ($paginas->bool_ativo_paginas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $paginas_edit->RightColumnClass ?>"><div<?php echo $paginas->bool_ativo_paginas->cellAttributes() ?>>
<span id="el_paginas_bool_ativo_paginas">
<input type="text" data-table="paginas" data-field="x_bool_ativo_paginas" name="x_bool_ativo_paginas" id="x_bool_ativo_paginas" size="30" placeholder="<?php echo HtmlEncode($paginas->bool_ativo_paginas->getPlaceHolder()) ?>" value="<?php echo $paginas->bool_ativo_paginas->EditValue ?>"<?php echo $paginas->bool_ativo_paginas->editAttributes() ?>>
</span>
<?php echo $paginas->bool_ativo_paginas->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$paginas_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $paginas_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $paginas_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$paginas_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$paginas_edit->terminate();
?>
