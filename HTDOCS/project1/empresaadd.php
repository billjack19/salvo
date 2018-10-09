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
$empresa_add = new empresa_add();

// Run the page
$empresa_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$empresa_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fempresaadd = currentForm = new ew.Form("fempresaadd", "add");

// Validate form
fempresaadd.validate = function() {
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
		<?php if ($empresa_add->descricao_empresa->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_empresa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $empresa->descricao_empresa->caption(), $empresa->descricao_empresa->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($empresa_add->imagem_logo_empresa->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_logo_empresa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $empresa->imagem_logo_empresa->caption(), $empresa->imagem_logo_empresa->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($empresa_add->data_atualizacao_empresa->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_empresa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $empresa->data_atualizacao_empresa->caption(), $empresa->data_atualizacao_empresa->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_empresa");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($empresa->data_atualizacao_empresa->errorMessage()) ?>");
		<?php if ($empresa_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $empresa->usuario_id->caption(), $empresa->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($empresa->usuario_id->errorMessage()) ?>");
		<?php if ($empresa_add->bool_ativo_empresa->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_empresa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $empresa->bool_ativo_empresa->caption(), $empresa->bool_ativo_empresa->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_empresa");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($empresa->bool_ativo_empresa->errorMessage()) ?>");

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
fempresaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fempresaadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $empresa_add->showPageHeader(); ?>
<?php
$empresa_add->showMessage();
?>
<form name="fempresaadd" id="fempresaadd" class="<?php echo $empresa_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($empresa_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $empresa_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="empresa">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$empresa_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($empresa->descricao_empresa->Visible) { // descricao_empresa ?>
	<div id="r_descricao_empresa" class="form-group row">
		<label id="elh_empresa_descricao_empresa" for="x_descricao_empresa" class="<?php echo $empresa_add->LeftColumnClass ?>"><?php echo $empresa->descricao_empresa->caption() ?><?php echo ($empresa->descricao_empresa->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $empresa_add->RightColumnClass ?>"><div<?php echo $empresa->descricao_empresa->cellAttributes() ?>>
<span id="el_empresa_descricao_empresa">
<input type="text" data-table="empresa" data-field="x_descricao_empresa" name="x_descricao_empresa" id="x_descricao_empresa" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($empresa->descricao_empresa->getPlaceHolder()) ?>" value="<?php echo $empresa->descricao_empresa->EditValue ?>"<?php echo $empresa->descricao_empresa->editAttributes() ?>>
</span>
<?php echo $empresa->descricao_empresa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($empresa->imagem_logo_empresa->Visible) { // imagem_logo_empresa ?>
	<div id="r_imagem_logo_empresa" class="form-group row">
		<label id="elh_empresa_imagem_logo_empresa" for="x_imagem_logo_empresa" class="<?php echo $empresa_add->LeftColumnClass ?>"><?php echo $empresa->imagem_logo_empresa->caption() ?><?php echo ($empresa->imagem_logo_empresa->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $empresa_add->RightColumnClass ?>"><div<?php echo $empresa->imagem_logo_empresa->cellAttributes() ?>>
<span id="el_empresa_imagem_logo_empresa">
<input type="text" data-table="empresa" data-field="x_imagem_logo_empresa" name="x_imagem_logo_empresa" id="x_imagem_logo_empresa" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($empresa->imagem_logo_empresa->getPlaceHolder()) ?>" value="<?php echo $empresa->imagem_logo_empresa->EditValue ?>"<?php echo $empresa->imagem_logo_empresa->editAttributes() ?>>
</span>
<?php echo $empresa->imagem_logo_empresa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($empresa->data_atualizacao_empresa->Visible) { // data_atualizacao_empresa ?>
	<div id="r_data_atualizacao_empresa" class="form-group row">
		<label id="elh_empresa_data_atualizacao_empresa" for="x_data_atualizacao_empresa" class="<?php echo $empresa_add->LeftColumnClass ?>"><?php echo $empresa->data_atualizacao_empresa->caption() ?><?php echo ($empresa->data_atualizacao_empresa->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $empresa_add->RightColumnClass ?>"><div<?php echo $empresa->data_atualizacao_empresa->cellAttributes() ?>>
<span id="el_empresa_data_atualizacao_empresa">
<input type="text" data-table="empresa" data-field="x_data_atualizacao_empresa" name="x_data_atualizacao_empresa" id="x_data_atualizacao_empresa" placeholder="<?php echo HtmlEncode($empresa->data_atualizacao_empresa->getPlaceHolder()) ?>" value="<?php echo $empresa->data_atualizacao_empresa->EditValue ?>"<?php echo $empresa->data_atualizacao_empresa->editAttributes() ?>>
</span>
<?php echo $empresa->data_atualizacao_empresa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($empresa->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_empresa_usuario_id" for="x_usuario_id" class="<?php echo $empresa_add->LeftColumnClass ?>"><?php echo $empresa->usuario_id->caption() ?><?php echo ($empresa->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $empresa_add->RightColumnClass ?>"><div<?php echo $empresa->usuario_id->cellAttributes() ?>>
<span id="el_empresa_usuario_id">
<input type="text" data-table="empresa" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($empresa->usuario_id->getPlaceHolder()) ?>" value="<?php echo $empresa->usuario_id->EditValue ?>"<?php echo $empresa->usuario_id->editAttributes() ?>>
</span>
<?php echo $empresa->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($empresa->bool_ativo_empresa->Visible) { // bool_ativo_empresa ?>
	<div id="r_bool_ativo_empresa" class="form-group row">
		<label id="elh_empresa_bool_ativo_empresa" for="x_bool_ativo_empresa" class="<?php echo $empresa_add->LeftColumnClass ?>"><?php echo $empresa->bool_ativo_empresa->caption() ?><?php echo ($empresa->bool_ativo_empresa->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $empresa_add->RightColumnClass ?>"><div<?php echo $empresa->bool_ativo_empresa->cellAttributes() ?>>
<span id="el_empresa_bool_ativo_empresa">
<input type="text" data-table="empresa" data-field="x_bool_ativo_empresa" name="x_bool_ativo_empresa" id="x_bool_ativo_empresa" size="30" placeholder="<?php echo HtmlEncode($empresa->bool_ativo_empresa->getPlaceHolder()) ?>" value="<?php echo $empresa->bool_ativo_empresa->EditValue ?>"<?php echo $empresa->bool_ativo_empresa->editAttributes() ?>>
</span>
<?php echo $empresa->bool_ativo_empresa->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$empresa_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $empresa_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $empresa_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$empresa_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$empresa_add->terminate();
?>
