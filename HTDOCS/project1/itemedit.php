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
$item_edit = new item_edit();

// Run the page
$item_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fitemedit = currentForm = new ew.Form("fitemedit", "edit");

// Validate form
fitemedit.validate = function() {
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
		<?php if ($item_edit->id_item->Required) { ?>
			elm = this.getElements("x" + infix + "_id_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->id_item->caption(), $item->id_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->titulo_item->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->titulo_item->caption(), $item->titulo_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->descricao_resumida_item->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_resumida_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->descricao_resumida_item->caption(), $item->descricao_resumida_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->descricao_site_item->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_site_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->descricao_site_item->caption(), $item->descricao_site_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->imagem_item->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->imagem_item->caption(), $item->imagem_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->endereco_item->Required) { ?>
			elm = this.getElements("x" + infix + "_endereco_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->endereco_item->caption(), $item->endereco_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->numero_item->Required) { ?>
			elm = this.getElements("x" + infix + "_numero_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->numero_item->caption(), $item->numero_item->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_numero_item");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item->numero_item->errorMessage()) ?>");
		<?php if ($item_edit->bairro_item->Required) { ?>
			elm = this.getElements("x" + infix + "_bairro_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->bairro_item->caption(), $item->bairro_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->cidade_item->Required) { ?>
			elm = this.getElements("x" + infix + "_cidade_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->cidade_item->caption(), $item->cidade_item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($item_edit->estado_id->Required) { ?>
			elm = this.getElements("x" + infix + "_estado_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->estado_id->caption(), $item->estado_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_estado_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item->estado_id->errorMessage()) ?>");
		<?php if ($item_edit->situacao_id->Required) { ?>
			elm = this.getElements("x" + infix + "_situacao_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->situacao_id->caption(), $item->situacao_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_situacao_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item->situacao_id->errorMessage()) ?>");
		<?php if ($item_edit->grupo_id->Required) { ?>
			elm = this.getElements("x" + infix + "_grupo_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->grupo_id->caption(), $item->grupo_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grupo_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item->grupo_id->errorMessage()) ?>");
		<?php if ($item_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->usuario_id->caption(), $item->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item->usuario_id->errorMessage()) ?>");
		<?php if ($item_edit->bool_ativo_item->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item->bool_ativo_item->caption(), $item->bool_ativo_item->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_item");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item->bool_ativo_item->errorMessage()) ?>");

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
fitemedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitemedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $item_edit->showPageHeader(); ?>
<?php
$item_edit->showMessage();
?>
<form name="fitemedit" id="fitemedit" class="<?php echo $item_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$item_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($item->id_item->Visible) { // id_item ?>
	<div id="r_id_item" class="form-group row">
		<label id="elh_item_id_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->id_item->caption() ?><?php echo ($item->id_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->id_item->cellAttributes() ?>>
<span id="el_item_id_item">
<span<?php echo $item->id_item->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($item->id_item->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="item" data-field="x_id_item" name="x_id_item" id="x_id_item" value="<?php echo HtmlEncode($item->id_item->CurrentValue) ?>">
<?php echo $item->id_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->titulo_item->Visible) { // titulo_item ?>
	<div id="r_titulo_item" class="form-group row">
		<label id="elh_item_titulo_item" for="x_titulo_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->titulo_item->caption() ?><?php echo ($item->titulo_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->titulo_item->cellAttributes() ?>>
<span id="el_item_titulo_item">
<textarea data-table="item" data-field="x_titulo_item" name="x_titulo_item" id="x_titulo_item" cols="35" rows="4" placeholder="<?php echo HtmlEncode($item->titulo_item->getPlaceHolder()) ?>"<?php echo $item->titulo_item->editAttributes() ?>><?php echo $item->titulo_item->EditValue ?></textarea>
</span>
<?php echo $item->titulo_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->descricao_resumida_item->Visible) { // descricao_resumida_item ?>
	<div id="r_descricao_resumida_item" class="form-group row">
		<label id="elh_item_descricao_resumida_item" for="x_descricao_resumida_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->descricao_resumida_item->caption() ?><?php echo ($item->descricao_resumida_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->descricao_resumida_item->cellAttributes() ?>>
<span id="el_item_descricao_resumida_item">
<textarea data-table="item" data-field="x_descricao_resumida_item" name="x_descricao_resumida_item" id="x_descricao_resumida_item" cols="35" rows="4" placeholder="<?php echo HtmlEncode($item->descricao_resumida_item->getPlaceHolder()) ?>"<?php echo $item->descricao_resumida_item->editAttributes() ?>><?php echo $item->descricao_resumida_item->EditValue ?></textarea>
</span>
<?php echo $item->descricao_resumida_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->descricao_site_item->Visible) { // descricao_site_item ?>
	<div id="r_descricao_site_item" class="form-group row">
		<label id="elh_item_descricao_site_item" for="x_descricao_site_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->descricao_site_item->caption() ?><?php echo ($item->descricao_site_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->descricao_site_item->cellAttributes() ?>>
<span id="el_item_descricao_site_item">
<textarea data-table="item" data-field="x_descricao_site_item" name="x_descricao_site_item" id="x_descricao_site_item" cols="35" rows="4" placeholder="<?php echo HtmlEncode($item->descricao_site_item->getPlaceHolder()) ?>"<?php echo $item->descricao_site_item->editAttributes() ?>><?php echo $item->descricao_site_item->EditValue ?></textarea>
</span>
<?php echo $item->descricao_site_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->imagem_item->Visible) { // imagem_item ?>
	<div id="r_imagem_item" class="form-group row">
		<label id="elh_item_imagem_item" for="x_imagem_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->imagem_item->caption() ?><?php echo ($item->imagem_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->imagem_item->cellAttributes() ?>>
<span id="el_item_imagem_item">
<input type="text" data-table="item" data-field="x_imagem_item" name="x_imagem_item" id="x_imagem_item" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($item->imagem_item->getPlaceHolder()) ?>" value="<?php echo $item->imagem_item->EditValue ?>"<?php echo $item->imagem_item->editAttributes() ?>>
</span>
<?php echo $item->imagem_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->endereco_item->Visible) { // endereco_item ?>
	<div id="r_endereco_item" class="form-group row">
		<label id="elh_item_endereco_item" for="x_endereco_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->endereco_item->caption() ?><?php echo ($item->endereco_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->endereco_item->cellAttributes() ?>>
<span id="el_item_endereco_item">
<textarea data-table="item" data-field="x_endereco_item" name="x_endereco_item" id="x_endereco_item" cols="35" rows="4" placeholder="<?php echo HtmlEncode($item->endereco_item->getPlaceHolder()) ?>"<?php echo $item->endereco_item->editAttributes() ?>><?php echo $item->endereco_item->EditValue ?></textarea>
</span>
<?php echo $item->endereco_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->numero_item->Visible) { // numero_item ?>
	<div id="r_numero_item" class="form-group row">
		<label id="elh_item_numero_item" for="x_numero_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->numero_item->caption() ?><?php echo ($item->numero_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->numero_item->cellAttributes() ?>>
<span id="el_item_numero_item">
<input type="text" data-table="item" data-field="x_numero_item" name="x_numero_item" id="x_numero_item" size="30" placeholder="<?php echo HtmlEncode($item->numero_item->getPlaceHolder()) ?>" value="<?php echo $item->numero_item->EditValue ?>"<?php echo $item->numero_item->editAttributes() ?>>
</span>
<?php echo $item->numero_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->bairro_item->Visible) { // bairro_item ?>
	<div id="r_bairro_item" class="form-group row">
		<label id="elh_item_bairro_item" for="x_bairro_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->bairro_item->caption() ?><?php echo ($item->bairro_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->bairro_item->cellAttributes() ?>>
<span id="el_item_bairro_item">
<input type="text" data-table="item" data-field="x_bairro_item" name="x_bairro_item" id="x_bairro_item" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($item->bairro_item->getPlaceHolder()) ?>" value="<?php echo $item->bairro_item->EditValue ?>"<?php echo $item->bairro_item->editAttributes() ?>>
</span>
<?php echo $item->bairro_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->cidade_item->Visible) { // cidade_item ?>
	<div id="r_cidade_item" class="form-group row">
		<label id="elh_item_cidade_item" for="x_cidade_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->cidade_item->caption() ?><?php echo ($item->cidade_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->cidade_item->cellAttributes() ?>>
<span id="el_item_cidade_item">
<input type="text" data-table="item" data-field="x_cidade_item" name="x_cidade_item" id="x_cidade_item" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($item->cidade_item->getPlaceHolder()) ?>" value="<?php echo $item->cidade_item->EditValue ?>"<?php echo $item->cidade_item->editAttributes() ?>>
</span>
<?php echo $item->cidade_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->estado_id->Visible) { // estado_id ?>
	<div id="r_estado_id" class="form-group row">
		<label id="elh_item_estado_id" for="x_estado_id" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->estado_id->caption() ?><?php echo ($item->estado_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->estado_id->cellAttributes() ?>>
<span id="el_item_estado_id">
<input type="text" data-table="item" data-field="x_estado_id" name="x_estado_id" id="x_estado_id" size="30" placeholder="<?php echo HtmlEncode($item->estado_id->getPlaceHolder()) ?>" value="<?php echo $item->estado_id->EditValue ?>"<?php echo $item->estado_id->editAttributes() ?>>
</span>
<?php echo $item->estado_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->situacao_id->Visible) { // situacao_id ?>
	<div id="r_situacao_id" class="form-group row">
		<label id="elh_item_situacao_id" for="x_situacao_id" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->situacao_id->caption() ?><?php echo ($item->situacao_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->situacao_id->cellAttributes() ?>>
<span id="el_item_situacao_id">
<input type="text" data-table="item" data-field="x_situacao_id" name="x_situacao_id" id="x_situacao_id" size="30" placeholder="<?php echo HtmlEncode($item->situacao_id->getPlaceHolder()) ?>" value="<?php echo $item->situacao_id->EditValue ?>"<?php echo $item->situacao_id->editAttributes() ?>>
</span>
<?php echo $item->situacao_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->grupo_id->Visible) { // grupo_id ?>
	<div id="r_grupo_id" class="form-group row">
		<label id="elh_item_grupo_id" for="x_grupo_id" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->grupo_id->caption() ?><?php echo ($item->grupo_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->grupo_id->cellAttributes() ?>>
<span id="el_item_grupo_id">
<input type="text" data-table="item" data-field="x_grupo_id" name="x_grupo_id" id="x_grupo_id" size="30" placeholder="<?php echo HtmlEncode($item->grupo_id->getPlaceHolder()) ?>" value="<?php echo $item->grupo_id->EditValue ?>"<?php echo $item->grupo_id->editAttributes() ?>>
</span>
<?php echo $item->grupo_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_item_usuario_id" for="x_usuario_id" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->usuario_id->caption() ?><?php echo ($item->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->usuario_id->cellAttributes() ?>>
<span id="el_item_usuario_id">
<input type="text" data-table="item" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($item->usuario_id->getPlaceHolder()) ?>" value="<?php echo $item->usuario_id->EditValue ?>"<?php echo $item->usuario_id->editAttributes() ?>>
</span>
<?php echo $item->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item->bool_ativo_item->Visible) { // bool_ativo_item ?>
	<div id="r_bool_ativo_item" class="form-group row">
		<label id="elh_item_bool_ativo_item" for="x_bool_ativo_item" class="<?php echo $item_edit->LeftColumnClass ?>"><?php echo $item->bool_ativo_item->caption() ?><?php echo ($item->bool_ativo_item->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_edit->RightColumnClass ?>"><div<?php echo $item->bool_ativo_item->cellAttributes() ?>>
<span id="el_item_bool_ativo_item">
<input type="text" data-table="item" data-field="x_bool_ativo_item" name="x_bool_ativo_item" id="x_bool_ativo_item" size="30" placeholder="<?php echo HtmlEncode($item->bool_ativo_item->getPlaceHolder()) ?>" value="<?php echo $item->bool_ativo_item->EditValue ?>"<?php echo $item->bool_ativo_item->editAttributes() ?>>
</span>
<?php echo $item->bool_ativo_item->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$item_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $item_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $item_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$item_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$item_edit->terminate();
?>
