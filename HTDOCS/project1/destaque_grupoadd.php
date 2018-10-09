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
$destaque_grupo_add = new destaque_grupo_add();

// Run the page
$destaque_grupo_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$destaque_grupo_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fdestaque_grupoadd = currentForm = new ew.Form("fdestaque_grupoadd", "add");

// Validate form
fdestaque_grupoadd.validate = function() {
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
		<?php if ($destaque_grupo_add->titulo_destaque_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_destaque_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->titulo_destaque_grupo->caption(), $destaque_grupo->titulo_destaque_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($destaque_grupo_add->grupo_id->Required) { ?>
			elm = this.getElements("x" + infix + "_grupo_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->grupo_id->caption(), $destaque_grupo->grupo_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grupo_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($destaque_grupo->grupo_id->errorMessage()) ?>");
		<?php if ($destaque_grupo_add->imagem_destaque_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_destaque_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->imagem_destaque_grupo->caption(), $destaque_grupo->imagem_destaque_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($destaque_grupo_add->descricao_destaque_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_destaque_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->descricao_destaque_grupo->caption(), $destaque_grupo->descricao_destaque_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($destaque_grupo_add->configurar_site_id->Required) { ?>
			elm = this.getElements("x" + infix + "_configurar_site_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->configurar_site_id->caption(), $destaque_grupo->configurar_site_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_configurar_site_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($destaque_grupo->configurar_site_id->errorMessage()) ?>");
		<?php if ($destaque_grupo_add->data_atualizacao_destaque_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_destaque_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->data_atualizacao_destaque_grupo->caption(), $destaque_grupo->data_atualizacao_destaque_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_destaque_grupo");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($destaque_grupo->data_atualizacao_destaque_grupo->errorMessage()) ?>");
		<?php if ($destaque_grupo_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->usuario_id->caption(), $destaque_grupo->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($destaque_grupo->usuario_id->errorMessage()) ?>");
		<?php if ($destaque_grupo_add->bool_ativo_destaque_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_destaque_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $destaque_grupo->bool_ativo_destaque_grupo->caption(), $destaque_grupo->bool_ativo_destaque_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_destaque_grupo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($destaque_grupo->bool_ativo_destaque_grupo->errorMessage()) ?>");

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
fdestaque_grupoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdestaque_grupoadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $destaque_grupo_add->showPageHeader(); ?>
<?php
$destaque_grupo_add->showMessage();
?>
<form name="fdestaque_grupoadd" id="fdestaque_grupoadd" class="<?php echo $destaque_grupo_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($destaque_grupo_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $destaque_grupo_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="destaque_grupo">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$destaque_grupo_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($destaque_grupo->titulo_destaque_grupo->Visible) { // titulo_destaque_grupo ?>
	<div id="r_titulo_destaque_grupo" class="form-group row">
		<label id="elh_destaque_grupo_titulo_destaque_grupo" for="x_titulo_destaque_grupo" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->titulo_destaque_grupo->caption() ?><?php echo ($destaque_grupo->titulo_destaque_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->titulo_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_titulo_destaque_grupo">
<input type="text" data-table="destaque_grupo" data-field="x_titulo_destaque_grupo" name="x_titulo_destaque_grupo" id="x_titulo_destaque_grupo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($destaque_grupo->titulo_destaque_grupo->getPlaceHolder()) ?>" value="<?php echo $destaque_grupo->titulo_destaque_grupo->EditValue ?>"<?php echo $destaque_grupo->titulo_destaque_grupo->editAttributes() ?>>
</span>
<?php echo $destaque_grupo->titulo_destaque_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($destaque_grupo->grupo_id->Visible) { // grupo_id ?>
	<div id="r_grupo_id" class="form-group row">
		<label id="elh_destaque_grupo_grupo_id" for="x_grupo_id" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->grupo_id->caption() ?><?php echo ($destaque_grupo->grupo_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->grupo_id->cellAttributes() ?>>
<span id="el_destaque_grupo_grupo_id">
<input type="text" data-table="destaque_grupo" data-field="x_grupo_id" name="x_grupo_id" id="x_grupo_id" size="30" placeholder="<?php echo HtmlEncode($destaque_grupo->grupo_id->getPlaceHolder()) ?>" value="<?php echo $destaque_grupo->grupo_id->EditValue ?>"<?php echo $destaque_grupo->grupo_id->editAttributes() ?>>
</span>
<?php echo $destaque_grupo->grupo_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($destaque_grupo->imagem_destaque_grupo->Visible) { // imagem_destaque_grupo ?>
	<div id="r_imagem_destaque_grupo" class="form-group row">
		<label id="elh_destaque_grupo_imagem_destaque_grupo" for="x_imagem_destaque_grupo" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->imagem_destaque_grupo->caption() ?><?php echo ($destaque_grupo->imagem_destaque_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->imagem_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_imagem_destaque_grupo">
<input type="text" data-table="destaque_grupo" data-field="x_imagem_destaque_grupo" name="x_imagem_destaque_grupo" id="x_imagem_destaque_grupo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($destaque_grupo->imagem_destaque_grupo->getPlaceHolder()) ?>" value="<?php echo $destaque_grupo->imagem_destaque_grupo->EditValue ?>"<?php echo $destaque_grupo->imagem_destaque_grupo->editAttributes() ?>>
</span>
<?php echo $destaque_grupo->imagem_destaque_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($destaque_grupo->descricao_destaque_grupo->Visible) { // descricao_destaque_grupo ?>
	<div id="r_descricao_destaque_grupo" class="form-group row">
		<label id="elh_destaque_grupo_descricao_destaque_grupo" for="x_descricao_destaque_grupo" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->descricao_destaque_grupo->caption() ?><?php echo ($destaque_grupo->descricao_destaque_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->descricao_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_descricao_destaque_grupo">
<textarea data-table="destaque_grupo" data-field="x_descricao_destaque_grupo" name="x_descricao_destaque_grupo" id="x_descricao_destaque_grupo" cols="35" rows="4" placeholder="<?php echo HtmlEncode($destaque_grupo->descricao_destaque_grupo->getPlaceHolder()) ?>"<?php echo $destaque_grupo->descricao_destaque_grupo->editAttributes() ?>><?php echo $destaque_grupo->descricao_destaque_grupo->EditValue ?></textarea>
</span>
<?php echo $destaque_grupo->descricao_destaque_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($destaque_grupo->configurar_site_id->Visible) { // configurar_site_id ?>
	<div id="r_configurar_site_id" class="form-group row">
		<label id="elh_destaque_grupo_configurar_site_id" for="x_configurar_site_id" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->configurar_site_id->caption() ?><?php echo ($destaque_grupo->configurar_site_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->configurar_site_id->cellAttributes() ?>>
<span id="el_destaque_grupo_configurar_site_id">
<input type="text" data-table="destaque_grupo" data-field="x_configurar_site_id" name="x_configurar_site_id" id="x_configurar_site_id" size="30" placeholder="<?php echo HtmlEncode($destaque_grupo->configurar_site_id->getPlaceHolder()) ?>" value="<?php echo $destaque_grupo->configurar_site_id->EditValue ?>"<?php echo $destaque_grupo->configurar_site_id->editAttributes() ?>>
</span>
<?php echo $destaque_grupo->configurar_site_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($destaque_grupo->data_atualizacao_destaque_grupo->Visible) { // data_atualizacao_destaque_grupo ?>
	<div id="r_data_atualizacao_destaque_grupo" class="form-group row">
		<label id="elh_destaque_grupo_data_atualizacao_destaque_grupo" for="x_data_atualizacao_destaque_grupo" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->data_atualizacao_destaque_grupo->caption() ?><?php echo ($destaque_grupo->data_atualizacao_destaque_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_data_atualizacao_destaque_grupo">
<input type="text" data-table="destaque_grupo" data-field="x_data_atualizacao_destaque_grupo" name="x_data_atualizacao_destaque_grupo" id="x_data_atualizacao_destaque_grupo" placeholder="<?php echo HtmlEncode($destaque_grupo->data_atualizacao_destaque_grupo->getPlaceHolder()) ?>" value="<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->EditValue ?>"<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->editAttributes() ?>>
</span>
<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($destaque_grupo->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_destaque_grupo_usuario_id" for="x_usuario_id" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->usuario_id->caption() ?><?php echo ($destaque_grupo->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->usuario_id->cellAttributes() ?>>
<span id="el_destaque_grupo_usuario_id">
<input type="text" data-table="destaque_grupo" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($destaque_grupo->usuario_id->getPlaceHolder()) ?>" value="<?php echo $destaque_grupo->usuario_id->EditValue ?>"<?php echo $destaque_grupo->usuario_id->editAttributes() ?>>
</span>
<?php echo $destaque_grupo->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($destaque_grupo->bool_ativo_destaque_grupo->Visible) { // bool_ativo_destaque_grupo ?>
	<div id="r_bool_ativo_destaque_grupo" class="form-group row">
		<label id="elh_destaque_grupo_bool_ativo_destaque_grupo" for="x_bool_ativo_destaque_grupo" class="<?php echo $destaque_grupo_add->LeftColumnClass ?>"><?php echo $destaque_grupo->bool_ativo_destaque_grupo->caption() ?><?php echo ($destaque_grupo->bool_ativo_destaque_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $destaque_grupo_add->RightColumnClass ?>"><div<?php echo $destaque_grupo->bool_ativo_destaque_grupo->cellAttributes() ?>>
<span id="el_destaque_grupo_bool_ativo_destaque_grupo">
<input type="text" data-table="destaque_grupo" data-field="x_bool_ativo_destaque_grupo" name="x_bool_ativo_destaque_grupo" id="x_bool_ativo_destaque_grupo" size="30" placeholder="<?php echo HtmlEncode($destaque_grupo->bool_ativo_destaque_grupo->getPlaceHolder()) ?>" value="<?php echo $destaque_grupo->bool_ativo_destaque_grupo->EditValue ?>"<?php echo $destaque_grupo->bool_ativo_destaque_grupo->editAttributes() ?>>
</span>
<?php echo $destaque_grupo->bool_ativo_destaque_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$destaque_grupo_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $destaque_grupo_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $destaque_grupo_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$destaque_grupo_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$destaque_grupo_add->terminate();
?>
