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
$nivel_acesso_edit = new nivel_acesso_edit();

// Run the page
$nivel_acesso_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$nivel_acesso_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fnivel_acessoedit = currentForm = new ew.Form("fnivel_acessoedit", "edit");

// Validate form
fnivel_acessoedit.validate = function() {
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
		<?php if ($nivel_acesso_edit->id_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_id_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $nivel_acesso->id_nivel_acesso->caption(), $nivel_acesso->id_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($nivel_acesso_edit->descricao_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $nivel_acesso->descricao_nivel_acesso->caption(), $nivel_acesso->descricao_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($nivel_acesso_edit->area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $nivel_acesso->area_nivel_acesso->caption(), $nivel_acesso->area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($nivel_acesso_edit->data_atualizacao_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $nivel_acesso->data_atualizacao_nivel_acesso->caption(), $nivel_acesso->data_atualizacao_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_nivel_acesso");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($nivel_acesso->data_atualizacao_nivel_acesso->errorMessage()) ?>");
		<?php if ($nivel_acesso_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $nivel_acesso->usuario_id->caption(), $nivel_acesso->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($nivel_acesso->usuario_id->errorMessage()) ?>");
		<?php if ($nivel_acesso_edit->bool_ativo_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $nivel_acesso->bool_ativo_nivel_acesso->caption(), $nivel_acesso->bool_ativo_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_nivel_acesso");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($nivel_acesso->bool_ativo_nivel_acesso->errorMessage()) ?>");

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
fnivel_acessoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnivel_acessoedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $nivel_acesso_edit->showPageHeader(); ?>
<?php
$nivel_acesso_edit->showMessage();
?>
<form name="fnivel_acessoedit" id="fnivel_acessoedit" class="<?php echo $nivel_acesso_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($nivel_acesso_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $nivel_acesso_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="nivel_acesso">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$nivel_acesso_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($nivel_acesso->id_nivel_acesso->Visible) { // id_nivel_acesso ?>
	<div id="r_id_nivel_acesso" class="form-group row">
		<label id="elh_nivel_acesso_id_nivel_acesso" class="<?php echo $nivel_acesso_edit->LeftColumnClass ?>"><?php echo $nivel_acesso->id_nivel_acesso->caption() ?><?php echo ($nivel_acesso->id_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $nivel_acesso->id_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_id_nivel_acesso">
<span<?php echo $nivel_acesso->id_nivel_acesso->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($nivel_acesso->id_nivel_acesso->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="nivel_acesso" data-field="x_id_nivel_acesso" name="x_id_nivel_acesso" id="x_id_nivel_acesso" value="<?php echo HtmlEncode($nivel_acesso->id_nivel_acesso->CurrentValue) ?>">
<?php echo $nivel_acesso->id_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($nivel_acesso->descricao_nivel_acesso->Visible) { // descricao_nivel_acesso ?>
	<div id="r_descricao_nivel_acesso" class="form-group row">
		<label id="elh_nivel_acesso_descricao_nivel_acesso" for="x_descricao_nivel_acesso" class="<?php echo $nivel_acesso_edit->LeftColumnClass ?>"><?php echo $nivel_acesso->descricao_nivel_acesso->caption() ?><?php echo ($nivel_acesso->descricao_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $nivel_acesso->descricao_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_descricao_nivel_acesso">
<input type="text" data-table="nivel_acesso" data-field="x_descricao_nivel_acesso" name="x_descricao_nivel_acesso" id="x_descricao_nivel_acesso" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($nivel_acesso->descricao_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $nivel_acesso->descricao_nivel_acesso->EditValue ?>"<?php echo $nivel_acesso->descricao_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $nivel_acesso->descricao_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($nivel_acesso->area_nivel_acesso->Visible) { // area_nivel_acesso ?>
	<div id="r_area_nivel_acesso" class="form-group row">
		<label id="elh_nivel_acesso_area_nivel_acesso" for="x_area_nivel_acesso" class="<?php echo $nivel_acesso_edit->LeftColumnClass ?>"><?php echo $nivel_acesso->area_nivel_acesso->caption() ?><?php echo ($nivel_acesso->area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $nivel_acesso->area_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_area_nivel_acesso">
<textarea data-table="nivel_acesso" data-field="x_area_nivel_acesso" name="x_area_nivel_acesso" id="x_area_nivel_acesso" cols="35" rows="4" placeholder="<?php echo HtmlEncode($nivel_acesso->area_nivel_acesso->getPlaceHolder()) ?>"<?php echo $nivel_acesso->area_nivel_acesso->editAttributes() ?>><?php echo $nivel_acesso->area_nivel_acesso->EditValue ?></textarea>
</span>
<?php echo $nivel_acesso->area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($nivel_acesso->data_atualizacao_nivel_acesso->Visible) { // data_atualizacao_nivel_acesso ?>
	<div id="r_data_atualizacao_nivel_acesso" class="form-group row">
		<label id="elh_nivel_acesso_data_atualizacao_nivel_acesso" for="x_data_atualizacao_nivel_acesso" class="<?php echo $nivel_acesso_edit->LeftColumnClass ?>"><?php echo $nivel_acesso->data_atualizacao_nivel_acesso->caption() ?><?php echo ($nivel_acesso->data_atualizacao_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_data_atualizacao_nivel_acesso">
<input type="text" data-table="nivel_acesso" data-field="x_data_atualizacao_nivel_acesso" name="x_data_atualizacao_nivel_acesso" id="x_data_atualizacao_nivel_acesso" placeholder="<?php echo HtmlEncode($nivel_acesso->data_atualizacao_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->EditValue ?>"<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $nivel_acesso->data_atualizacao_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($nivel_acesso->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_nivel_acesso_usuario_id" for="x_usuario_id" class="<?php echo $nivel_acesso_edit->LeftColumnClass ?>"><?php echo $nivel_acesso->usuario_id->caption() ?><?php echo ($nivel_acesso->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $nivel_acesso->usuario_id->cellAttributes() ?>>
<span id="el_nivel_acesso_usuario_id">
<input type="text" data-table="nivel_acesso" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($nivel_acesso->usuario_id->getPlaceHolder()) ?>" value="<?php echo $nivel_acesso->usuario_id->EditValue ?>"<?php echo $nivel_acesso->usuario_id->editAttributes() ?>>
</span>
<?php echo $nivel_acesso->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($nivel_acesso->bool_ativo_nivel_acesso->Visible) { // bool_ativo_nivel_acesso ?>
	<div id="r_bool_ativo_nivel_acesso" class="form-group row">
		<label id="elh_nivel_acesso_bool_ativo_nivel_acesso" for="x_bool_ativo_nivel_acesso" class="<?php echo $nivel_acesso_edit->LeftColumnClass ?>"><?php echo $nivel_acesso->bool_ativo_nivel_acesso->caption() ?><?php echo ($nivel_acesso->bool_ativo_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $nivel_acesso->bool_ativo_nivel_acesso->cellAttributes() ?>>
<span id="el_nivel_acesso_bool_ativo_nivel_acesso">
<input type="text" data-table="nivel_acesso" data-field="x_bool_ativo_nivel_acesso" name="x_bool_ativo_nivel_acesso" id="x_bool_ativo_nivel_acesso" size="30" placeholder="<?php echo HtmlEncode($nivel_acesso->bool_ativo_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $nivel_acesso->bool_ativo_nivel_acesso->EditValue ?>"<?php echo $nivel_acesso->bool_ativo_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $nivel_acesso->bool_ativo_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$nivel_acesso_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $nivel_acesso_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $nivel_acesso_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$nivel_acesso_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$nivel_acesso_edit->terminate();
?>
