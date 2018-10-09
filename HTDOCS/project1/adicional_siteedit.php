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
$adicional_site_edit = new adicional_site_edit();

// Run the page
$adicional_site_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$adicional_site_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fadicional_siteedit = currentForm = new ew.Form("fadicional_siteedit", "edit");

// Validate form
fadicional_siteedit.validate = function() {
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
		<?php if ($adicional_site_edit->id_adicional_site->Required) { ?>
			elm = this.getElements("x" + infix + "_id_adicional_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->id_adicional_site->caption(), $adicional_site->id_adicional_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($adicional_site_edit->titulo_adicional_site->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_adicional_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->titulo_adicional_site->caption(), $adicional_site->titulo_adicional_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($adicional_site_edit->descricao_adicional_site->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_adicional_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->descricao_adicional_site->caption(), $adicional_site->descricao_adicional_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($adicional_site_edit->imagem_adicional_site->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_adicional_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->imagem_adicional_site->caption(), $adicional_site->imagem_adicional_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($adicional_site_edit->saiba_mais_id->Required) { ?>
			elm = this.getElements("x" + infix + "_saiba_mais_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->saiba_mais_id->caption(), $adicional_site->saiba_mais_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_saiba_mais_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($adicional_site->saiba_mais_id->errorMessage()) ?>");
		<?php if ($adicional_site_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->usuario_id->caption(), $adicional_site->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($adicional_site->usuario_id->errorMessage()) ?>");
		<?php if ($adicional_site_edit->data_atualizacao_adicional_site->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_adicional_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->data_atualizacao_adicional_site->caption(), $adicional_site->data_atualizacao_adicional_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_adicional_site");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($adicional_site->data_atualizacao_adicional_site->errorMessage()) ?>");
		<?php if ($adicional_site_edit->bool_ativo_adicional_site->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_adicional_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $adicional_site->bool_ativo_adicional_site->caption(), $adicional_site->bool_ativo_adicional_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_adicional_site");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($adicional_site->bool_ativo_adicional_site->errorMessage()) ?>");

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
fadicional_siteedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fadicional_siteedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $adicional_site_edit->showPageHeader(); ?>
<?php
$adicional_site_edit->showMessage();
?>
<form name="fadicional_siteedit" id="fadicional_siteedit" class="<?php echo $adicional_site_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($adicional_site_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $adicional_site_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="adicional_site">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$adicional_site_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($adicional_site->id_adicional_site->Visible) { // id_adicional_site ?>
	<div id="r_id_adicional_site" class="form-group row">
		<label id="elh_adicional_site_id_adicional_site" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->id_adicional_site->caption() ?><?php echo ($adicional_site->id_adicional_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->id_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_id_adicional_site">
<span<?php echo $adicional_site->id_adicional_site->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($adicional_site->id_adicional_site->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="adicional_site" data-field="x_id_adicional_site" name="x_id_adicional_site" id="x_id_adicional_site" value="<?php echo HtmlEncode($adicional_site->id_adicional_site->CurrentValue) ?>">
<?php echo $adicional_site->id_adicional_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($adicional_site->titulo_adicional_site->Visible) { // titulo_adicional_site ?>
	<div id="r_titulo_adicional_site" class="form-group row">
		<label id="elh_adicional_site_titulo_adicional_site" for="x_titulo_adicional_site" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->titulo_adicional_site->caption() ?><?php echo ($adicional_site->titulo_adicional_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->titulo_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_titulo_adicional_site">
<input type="text" data-table="adicional_site" data-field="x_titulo_adicional_site" name="x_titulo_adicional_site" id="x_titulo_adicional_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($adicional_site->titulo_adicional_site->getPlaceHolder()) ?>" value="<?php echo $adicional_site->titulo_adicional_site->EditValue ?>"<?php echo $adicional_site->titulo_adicional_site->editAttributes() ?>>
</span>
<?php echo $adicional_site->titulo_adicional_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($adicional_site->descricao_adicional_site->Visible) { // descricao_adicional_site ?>
	<div id="r_descricao_adicional_site" class="form-group row">
		<label id="elh_adicional_site_descricao_adicional_site" for="x_descricao_adicional_site" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->descricao_adicional_site->caption() ?><?php echo ($adicional_site->descricao_adicional_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->descricao_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_descricao_adicional_site">
<textarea data-table="adicional_site" data-field="x_descricao_adicional_site" name="x_descricao_adicional_site" id="x_descricao_adicional_site" cols="35" rows="4" placeholder="<?php echo HtmlEncode($adicional_site->descricao_adicional_site->getPlaceHolder()) ?>"<?php echo $adicional_site->descricao_adicional_site->editAttributes() ?>><?php echo $adicional_site->descricao_adicional_site->EditValue ?></textarea>
</span>
<?php echo $adicional_site->descricao_adicional_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($adicional_site->imagem_adicional_site->Visible) { // imagem_adicional_site ?>
	<div id="r_imagem_adicional_site" class="form-group row">
		<label id="elh_adicional_site_imagem_adicional_site" for="x_imagem_adicional_site" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->imagem_adicional_site->caption() ?><?php echo ($adicional_site->imagem_adicional_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->imagem_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_imagem_adicional_site">
<input type="text" data-table="adicional_site" data-field="x_imagem_adicional_site" name="x_imagem_adicional_site" id="x_imagem_adicional_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($adicional_site->imagem_adicional_site->getPlaceHolder()) ?>" value="<?php echo $adicional_site->imagem_adicional_site->EditValue ?>"<?php echo $adicional_site->imagem_adicional_site->editAttributes() ?>>
</span>
<?php echo $adicional_site->imagem_adicional_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($adicional_site->saiba_mais_id->Visible) { // saiba_mais_id ?>
	<div id="r_saiba_mais_id" class="form-group row">
		<label id="elh_adicional_site_saiba_mais_id" for="x_saiba_mais_id" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->saiba_mais_id->caption() ?><?php echo ($adicional_site->saiba_mais_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->saiba_mais_id->cellAttributes() ?>>
<span id="el_adicional_site_saiba_mais_id">
<input type="text" data-table="adicional_site" data-field="x_saiba_mais_id" name="x_saiba_mais_id" id="x_saiba_mais_id" size="30" placeholder="<?php echo HtmlEncode($adicional_site->saiba_mais_id->getPlaceHolder()) ?>" value="<?php echo $adicional_site->saiba_mais_id->EditValue ?>"<?php echo $adicional_site->saiba_mais_id->editAttributes() ?>>
</span>
<?php echo $adicional_site->saiba_mais_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($adicional_site->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_adicional_site_usuario_id" for="x_usuario_id" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->usuario_id->caption() ?><?php echo ($adicional_site->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->usuario_id->cellAttributes() ?>>
<span id="el_adicional_site_usuario_id">
<input type="text" data-table="adicional_site" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($adicional_site->usuario_id->getPlaceHolder()) ?>" value="<?php echo $adicional_site->usuario_id->EditValue ?>"<?php echo $adicional_site->usuario_id->editAttributes() ?>>
</span>
<?php echo $adicional_site->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($adicional_site->data_atualizacao_adicional_site->Visible) { // data_atualizacao_adicional_site ?>
	<div id="r_data_atualizacao_adicional_site" class="form-group row">
		<label id="elh_adicional_site_data_atualizacao_adicional_site" for="x_data_atualizacao_adicional_site" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->data_atualizacao_adicional_site->caption() ?><?php echo ($adicional_site->data_atualizacao_adicional_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->data_atualizacao_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_data_atualizacao_adicional_site">
<input type="text" data-table="adicional_site" data-field="x_data_atualizacao_adicional_site" name="x_data_atualizacao_adicional_site" id="x_data_atualizacao_adicional_site" placeholder="<?php echo HtmlEncode($adicional_site->data_atualizacao_adicional_site->getPlaceHolder()) ?>" value="<?php echo $adicional_site->data_atualizacao_adicional_site->EditValue ?>"<?php echo $adicional_site->data_atualizacao_adicional_site->editAttributes() ?>>
</span>
<?php echo $adicional_site->data_atualizacao_adicional_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($adicional_site->bool_ativo_adicional_site->Visible) { // bool_ativo_adicional_site ?>
	<div id="r_bool_ativo_adicional_site" class="form-group row">
		<label id="elh_adicional_site_bool_ativo_adicional_site" for="x_bool_ativo_adicional_site" class="<?php echo $adicional_site_edit->LeftColumnClass ?>"><?php echo $adicional_site->bool_ativo_adicional_site->caption() ?><?php echo ($adicional_site->bool_ativo_adicional_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $adicional_site_edit->RightColumnClass ?>"><div<?php echo $adicional_site->bool_ativo_adicional_site->cellAttributes() ?>>
<span id="el_adicional_site_bool_ativo_adicional_site">
<input type="text" data-table="adicional_site" data-field="x_bool_ativo_adicional_site" name="x_bool_ativo_adicional_site" id="x_bool_ativo_adicional_site" size="30" placeholder="<?php echo HtmlEncode($adicional_site->bool_ativo_adicional_site->getPlaceHolder()) ?>" value="<?php echo $adicional_site->bool_ativo_adicional_site->EditValue ?>"<?php echo $adicional_site->bool_ativo_adicional_site->editAttributes() ?>>
</span>
<?php echo $adicional_site->bool_ativo_adicional_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$adicional_site_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $adicional_site_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $adicional_site_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$adicional_site_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$adicional_site_edit->terminate();
?>
