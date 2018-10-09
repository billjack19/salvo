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
$relatorios_add = new relatorios_add();

// Run the page
$relatorios_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorios_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var frelatoriosadd = currentForm = new ew.Form("frelatoriosadd", "add");

// Validate form
frelatoriosadd.validate = function() {
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
		<?php if ($relatorios_add->descricao_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->descricao_relatorios->caption(), $relatorios->descricao_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($relatorios_add->tabela_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_tabela_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->tabela_relatorios->caption(), $relatorios->tabela_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($relatorios_add->colunas_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_colunas_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->colunas_relatorios->caption(), $relatorios->colunas_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($relatorios_add->colunas_estrangeiras_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_colunas_estrangeiras_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->colunas_estrangeiras_relatorios->caption(), $relatorios->colunas_estrangeiras_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($relatorios_add->colunas_filtro_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_colunas_filtro_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->colunas_filtro_relatorios->caption(), $relatorios->colunas_filtro_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($relatorios_add->bool_filtro_ativo_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_filtro_ativo_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->bool_filtro_ativo_relatorios->caption(), $relatorios->bool_filtro_ativo_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_filtro_ativo_relatorios");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($relatorios->bool_filtro_ativo_relatorios->errorMessage()) ?>");
		<?php if ($relatorios_add->data_atualizacao_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->data_atualizacao_relatorios->caption(), $relatorios->data_atualizacao_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_relatorios");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($relatorios->data_atualizacao_relatorios->errorMessage()) ?>");
		<?php if ($relatorios_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->usuario_id->caption(), $relatorios->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($relatorios->usuario_id->errorMessage()) ?>");
		<?php if ($relatorios_add->bool_emitir_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_emitir_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->bool_emitir_relatorios->caption(), $relatorios->bool_emitir_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_emitir_relatorios");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($relatorios->bool_emitir_relatorios->errorMessage()) ?>");
		<?php if ($relatorios_add->bool_ativo_relatorios->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_relatorios");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorios->bool_ativo_relatorios->caption(), $relatorios->bool_ativo_relatorios->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_relatorios");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($relatorios->bool_ativo_relatorios->errorMessage()) ?>");

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
frelatoriosadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatoriosadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $relatorios_add->showPageHeader(); ?>
<?php
$relatorios_add->showMessage();
?>
<form name="frelatoriosadd" id="frelatoriosadd" class="<?php echo $relatorios_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorios_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorios_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorios">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$relatorios_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($relatorios->descricao_relatorios->Visible) { // descricao_relatorios ?>
	<div id="r_descricao_relatorios" class="form-group row">
		<label id="elh_relatorios_descricao_relatorios" for="x_descricao_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->descricao_relatorios->caption() ?><?php echo ($relatorios->descricao_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->descricao_relatorios->cellAttributes() ?>>
<span id="el_relatorios_descricao_relatorios">
<input type="text" data-table="relatorios" data-field="x_descricao_relatorios" name="x_descricao_relatorios" id="x_descricao_relatorios" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($relatorios->descricao_relatorios->getPlaceHolder()) ?>" value="<?php echo $relatorios->descricao_relatorios->EditValue ?>"<?php echo $relatorios->descricao_relatorios->editAttributes() ?>>
</span>
<?php echo $relatorios->descricao_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->tabela_relatorios->Visible) { // tabela_relatorios ?>
	<div id="r_tabela_relatorios" class="form-group row">
		<label id="elh_relatorios_tabela_relatorios" for="x_tabela_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->tabela_relatorios->caption() ?><?php echo ($relatorios->tabela_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->tabela_relatorios->cellAttributes() ?>>
<span id="el_relatorios_tabela_relatorios">
<input type="text" data-table="relatorios" data-field="x_tabela_relatorios" name="x_tabela_relatorios" id="x_tabela_relatorios" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($relatorios->tabela_relatorios->getPlaceHolder()) ?>" value="<?php echo $relatorios->tabela_relatorios->EditValue ?>"<?php echo $relatorios->tabela_relatorios->editAttributes() ?>>
</span>
<?php echo $relatorios->tabela_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->colunas_relatorios->Visible) { // colunas_relatorios ?>
	<div id="r_colunas_relatorios" class="form-group row">
		<label id="elh_relatorios_colunas_relatorios" for="x_colunas_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->colunas_relatorios->caption() ?><?php echo ($relatorios->colunas_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->colunas_relatorios->cellAttributes() ?>>
<span id="el_relatorios_colunas_relatorios">
<textarea data-table="relatorios" data-field="x_colunas_relatorios" name="x_colunas_relatorios" id="x_colunas_relatorios" cols="35" rows="4" placeholder="<?php echo HtmlEncode($relatorios->colunas_relatorios->getPlaceHolder()) ?>"<?php echo $relatorios->colunas_relatorios->editAttributes() ?>><?php echo $relatorios->colunas_relatorios->EditValue ?></textarea>
</span>
<?php echo $relatorios->colunas_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->colunas_estrangeiras_relatorios->Visible) { // colunas_estrangeiras_relatorios ?>
	<div id="r_colunas_estrangeiras_relatorios" class="form-group row">
		<label id="elh_relatorios_colunas_estrangeiras_relatorios" for="x_colunas_estrangeiras_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->colunas_estrangeiras_relatorios->caption() ?><?php echo ($relatorios->colunas_estrangeiras_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->colunas_estrangeiras_relatorios->cellAttributes() ?>>
<span id="el_relatorios_colunas_estrangeiras_relatorios">
<textarea data-table="relatorios" data-field="x_colunas_estrangeiras_relatorios" name="x_colunas_estrangeiras_relatorios" id="x_colunas_estrangeiras_relatorios" cols="35" rows="4" placeholder="<?php echo HtmlEncode($relatorios->colunas_estrangeiras_relatorios->getPlaceHolder()) ?>"<?php echo $relatorios->colunas_estrangeiras_relatorios->editAttributes() ?>><?php echo $relatorios->colunas_estrangeiras_relatorios->EditValue ?></textarea>
</span>
<?php echo $relatorios->colunas_estrangeiras_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->colunas_filtro_relatorios->Visible) { // colunas_filtro_relatorios ?>
	<div id="r_colunas_filtro_relatorios" class="form-group row">
		<label id="elh_relatorios_colunas_filtro_relatorios" for="x_colunas_filtro_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->colunas_filtro_relatorios->caption() ?><?php echo ($relatorios->colunas_filtro_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->colunas_filtro_relatorios->cellAttributes() ?>>
<span id="el_relatorios_colunas_filtro_relatorios">
<textarea data-table="relatorios" data-field="x_colunas_filtro_relatorios" name="x_colunas_filtro_relatorios" id="x_colunas_filtro_relatorios" cols="35" rows="4" placeholder="<?php echo HtmlEncode($relatorios->colunas_filtro_relatorios->getPlaceHolder()) ?>"<?php echo $relatorios->colunas_filtro_relatorios->editAttributes() ?>><?php echo $relatorios->colunas_filtro_relatorios->EditValue ?></textarea>
</span>
<?php echo $relatorios->colunas_filtro_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->bool_filtro_ativo_relatorios->Visible) { // bool_filtro_ativo_relatorios ?>
	<div id="r_bool_filtro_ativo_relatorios" class="form-group row">
		<label id="elh_relatorios_bool_filtro_ativo_relatorios" for="x_bool_filtro_ativo_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->bool_filtro_ativo_relatorios->caption() ?><?php echo ($relatorios->bool_filtro_ativo_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->bool_filtro_ativo_relatorios->cellAttributes() ?>>
<span id="el_relatorios_bool_filtro_ativo_relatorios">
<input type="text" data-table="relatorios" data-field="x_bool_filtro_ativo_relatorios" name="x_bool_filtro_ativo_relatorios" id="x_bool_filtro_ativo_relatorios" size="30" placeholder="<?php echo HtmlEncode($relatorios->bool_filtro_ativo_relatorios->getPlaceHolder()) ?>" value="<?php echo $relatorios->bool_filtro_ativo_relatorios->EditValue ?>"<?php echo $relatorios->bool_filtro_ativo_relatorios->editAttributes() ?>>
</span>
<?php echo $relatorios->bool_filtro_ativo_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->data_atualizacao_relatorios->Visible) { // data_atualizacao_relatorios ?>
	<div id="r_data_atualizacao_relatorios" class="form-group row">
		<label id="elh_relatorios_data_atualizacao_relatorios" for="x_data_atualizacao_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->data_atualizacao_relatorios->caption() ?><?php echo ($relatorios->data_atualizacao_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->data_atualizacao_relatorios->cellAttributes() ?>>
<span id="el_relatorios_data_atualizacao_relatorios">
<input type="text" data-table="relatorios" data-field="x_data_atualizacao_relatorios" name="x_data_atualizacao_relatorios" id="x_data_atualizacao_relatorios" placeholder="<?php echo HtmlEncode($relatorios->data_atualizacao_relatorios->getPlaceHolder()) ?>" value="<?php echo $relatorios->data_atualizacao_relatorios->EditValue ?>"<?php echo $relatorios->data_atualizacao_relatorios->editAttributes() ?>>
</span>
<?php echo $relatorios->data_atualizacao_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_relatorios_usuario_id" for="x_usuario_id" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->usuario_id->caption() ?><?php echo ($relatorios->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->usuario_id->cellAttributes() ?>>
<span id="el_relatorios_usuario_id">
<input type="text" data-table="relatorios" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($relatorios->usuario_id->getPlaceHolder()) ?>" value="<?php echo $relatorios->usuario_id->EditValue ?>"<?php echo $relatorios->usuario_id->editAttributes() ?>>
</span>
<?php echo $relatorios->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->bool_emitir_relatorios->Visible) { // bool_emitir_relatorios ?>
	<div id="r_bool_emitir_relatorios" class="form-group row">
		<label id="elh_relatorios_bool_emitir_relatorios" for="x_bool_emitir_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->bool_emitir_relatorios->caption() ?><?php echo ($relatorios->bool_emitir_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->bool_emitir_relatorios->cellAttributes() ?>>
<span id="el_relatorios_bool_emitir_relatorios">
<input type="text" data-table="relatorios" data-field="x_bool_emitir_relatorios" name="x_bool_emitir_relatorios" id="x_bool_emitir_relatorios" size="30" placeholder="<?php echo HtmlEncode($relatorios->bool_emitir_relatorios->getPlaceHolder()) ?>" value="<?php echo $relatorios->bool_emitir_relatorios->EditValue ?>"<?php echo $relatorios->bool_emitir_relatorios->editAttributes() ?>>
</span>
<?php echo $relatorios->bool_emitir_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorios->bool_ativo_relatorios->Visible) { // bool_ativo_relatorios ?>
	<div id="r_bool_ativo_relatorios" class="form-group row">
		<label id="elh_relatorios_bool_ativo_relatorios" for="x_bool_ativo_relatorios" class="<?php echo $relatorios_add->LeftColumnClass ?>"><?php echo $relatorios->bool_ativo_relatorios->caption() ?><?php echo ($relatorios->bool_ativo_relatorios->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorios_add->RightColumnClass ?>"><div<?php echo $relatorios->bool_ativo_relatorios->cellAttributes() ?>>
<span id="el_relatorios_bool_ativo_relatorios">
<input type="text" data-table="relatorios" data-field="x_bool_ativo_relatorios" name="x_bool_ativo_relatorios" id="x_bool_ativo_relatorios" size="30" placeholder="<?php echo HtmlEncode($relatorios->bool_ativo_relatorios->getPlaceHolder()) ?>" value="<?php echo $relatorios->bool_ativo_relatorios->EditValue ?>"<?php echo $relatorios->bool_ativo_relatorios->editAttributes() ?>>
</span>
<?php echo $relatorios->bool_ativo_relatorios->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$relatorios_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $relatorios_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $relatorios_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$relatorios_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$relatorios_add->terminate();
?>
