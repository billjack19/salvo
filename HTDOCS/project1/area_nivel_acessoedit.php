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
$area_nivel_acesso_edit = new area_nivel_acesso_edit();

// Run the page
$area_nivel_acesso_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$area_nivel_acesso_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var farea_nivel_acessoedit = currentForm = new ew.Form("farea_nivel_acessoedit", "edit");

// Validate form
farea_nivel_acessoedit.validate = function() {
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
		<?php if ($area_nivel_acesso_edit->id_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_id_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->id_area_nivel_acesso->caption(), $area_nivel_acesso->id_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($area_nivel_acesso_edit->area_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_area_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->area_area_nivel_acesso->caption(), $area_nivel_acesso->area_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($area_nivel_acesso_edit->demostrativo_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_demostrativo_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->demostrativo_area_nivel_acesso->caption(), $area_nivel_acesso->demostrativo_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($area_nivel_acesso_edit->bool_list_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_list_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->bool_list_area_nivel_acesso->caption(), $area_nivel_acesso->bool_list_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_list_area_nivel_acesso");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($area_nivel_acesso->bool_list_area_nivel_acesso->errorMessage()) ?>");
		<?php if ($area_nivel_acesso_edit->bool_insert_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_insert_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->bool_insert_area_nivel_acesso->caption(), $area_nivel_acesso->bool_insert_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_insert_area_nivel_acesso");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($area_nivel_acesso->bool_insert_area_nivel_acesso->errorMessage()) ?>");
		<?php if ($area_nivel_acesso_edit->bool_update_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_update_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->bool_update_area_nivel_acesso->caption(), $area_nivel_acesso->bool_update_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_update_area_nivel_acesso");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($area_nivel_acesso->bool_update_area_nivel_acesso->errorMessage()) ?>");
		<?php if ($area_nivel_acesso_edit->nivel_acesso_id->Required) { ?>
			elm = this.getElements("x" + infix + "_nivel_acesso_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->nivel_acesso_id->caption(), $area_nivel_acesso->nivel_acesso_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_nivel_acesso_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($area_nivel_acesso->nivel_acesso_id->errorMessage()) ?>");
		<?php if ($area_nivel_acesso_edit->data_atualizacao_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->data_atualizacao_area_nivel_acesso->caption(), $area_nivel_acesso->data_atualizacao_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_area_nivel_acesso");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($area_nivel_acesso->data_atualizacao_area_nivel_acesso->errorMessage()) ?>");
		<?php if ($area_nivel_acesso_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->usuario_id->caption(), $area_nivel_acesso->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($area_nivel_acesso->usuario_id->errorMessage()) ?>");
		<?php if ($area_nivel_acesso_edit->bool_ativo_area_nivel_acesso->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_area_nivel_acesso");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $area_nivel_acesso->bool_ativo_area_nivel_acesso->caption(), $area_nivel_acesso->bool_ativo_area_nivel_acesso->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_area_nivel_acesso");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($area_nivel_acesso->bool_ativo_area_nivel_acesso->errorMessage()) ?>");

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
farea_nivel_acessoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
farea_nivel_acessoedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $area_nivel_acesso_edit->showPageHeader(); ?>
<?php
$area_nivel_acesso_edit->showMessage();
?>
<form name="farea_nivel_acessoedit" id="farea_nivel_acessoedit" class="<?php echo $area_nivel_acesso_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($area_nivel_acesso_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $area_nivel_acesso_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="area_nivel_acesso">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$area_nivel_acesso_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($area_nivel_acesso->id_area_nivel_acesso->Visible) { // id_area_nivel_acesso ?>
	<div id="r_id_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_id_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->id_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->id_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->id_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_id_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->id_area_nivel_acesso->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($area_nivel_acesso->id_area_nivel_acesso->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="area_nivel_acesso" data-field="x_id_area_nivel_acesso" name="x_id_area_nivel_acesso" id="x_id_area_nivel_acesso" value="<?php echo HtmlEncode($area_nivel_acesso->id_area_nivel_acesso->CurrentValue) ?>">
<?php echo $area_nivel_acesso->id_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->area_area_nivel_acesso->Visible) { // area_area_nivel_acesso ?>
	<div id="r_area_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_area_area_nivel_acesso" for="x_area_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->area_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->area_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->area_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_area_area_nivel_acesso">
<input type="text" data-table="area_nivel_acesso" data-field="x_area_area_nivel_acesso" name="x_area_area_nivel_acesso" id="x_area_area_nivel_acesso" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($area_nivel_acesso->area_area_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->area_area_nivel_acesso->EditValue ?>"<?php echo $area_nivel_acesso->area_area_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->area_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->demostrativo_area_nivel_acesso->Visible) { // demostrativo_area_nivel_acesso ?>
	<div id="r_demostrativo_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_demostrativo_area_nivel_acesso" for="x_demostrativo_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->demostrativo_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_demostrativo_area_nivel_acesso">
<input type="text" data-table="area_nivel_acesso" data-field="x_demostrativo_area_nivel_acesso" name="x_demostrativo_area_nivel_acesso" id="x_demostrativo_area_nivel_acesso" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($area_nivel_acesso->demostrativo_area_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->EditValue ?>"<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->bool_list_area_nivel_acesso->Visible) { // bool_list_area_nivel_acesso ?>
	<div id="r_bool_list_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_bool_list_area_nivel_acesso" for="x_bool_list_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->bool_list_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_bool_list_area_nivel_acesso">
<input type="text" data-table="area_nivel_acesso" data-field="x_bool_list_area_nivel_acesso" name="x_bool_list_area_nivel_acesso" id="x_bool_list_area_nivel_acesso" size="30" placeholder="<?php echo HtmlEncode($area_nivel_acesso->bool_list_area_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->EditValue ?>"<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->bool_insert_area_nivel_acesso->Visible) { // bool_insert_area_nivel_acesso ?>
	<div id="r_bool_insert_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_bool_insert_area_nivel_acesso" for="x_bool_insert_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->bool_insert_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_bool_insert_area_nivel_acesso">
<input type="text" data-table="area_nivel_acesso" data-field="x_bool_insert_area_nivel_acesso" name="x_bool_insert_area_nivel_acesso" id="x_bool_insert_area_nivel_acesso" size="30" placeholder="<?php echo HtmlEncode($area_nivel_acesso->bool_insert_area_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->EditValue ?>"<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->bool_update_area_nivel_acesso->Visible) { // bool_update_area_nivel_acesso ?>
	<div id="r_bool_update_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_bool_update_area_nivel_acesso" for="x_bool_update_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->bool_update_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_bool_update_area_nivel_acesso">
<input type="text" data-table="area_nivel_acesso" data-field="x_bool_update_area_nivel_acesso" name="x_bool_update_area_nivel_acesso" id="x_bool_update_area_nivel_acesso" size="30" placeholder="<?php echo HtmlEncode($area_nivel_acesso->bool_update_area_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->EditValue ?>"<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
	<div id="r_nivel_acesso_id" class="form-group row">
		<label id="elh_area_nivel_acesso_nivel_acesso_id" for="x_nivel_acesso_id" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->nivel_acesso_id->caption() ?><?php echo ($area_nivel_acesso->nivel_acesso_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->nivel_acesso_id->cellAttributes() ?>>
<span id="el_area_nivel_acesso_nivel_acesso_id">
<input type="text" data-table="area_nivel_acesso" data-field="x_nivel_acesso_id" name="x_nivel_acesso_id" id="x_nivel_acesso_id" size="30" placeholder="<?php echo HtmlEncode($area_nivel_acesso->nivel_acesso_id->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->nivel_acesso_id->EditValue ?>"<?php echo $area_nivel_acesso->nivel_acesso_id->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->nivel_acesso_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->Visible) { // data_atualizacao_area_nivel_acesso ?>
	<div id="r_data_atualizacao_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_data_atualizacao_area_nivel_acesso" for="x_data_atualizacao_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_data_atualizacao_area_nivel_acesso">
<input type="text" data-table="area_nivel_acesso" data-field="x_data_atualizacao_area_nivel_acesso" name="x_data_atualizacao_area_nivel_acesso" id="x_data_atualizacao_area_nivel_acesso" placeholder="<?php echo HtmlEncode($area_nivel_acesso->data_atualizacao_area_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->EditValue ?>"<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_area_nivel_acesso_usuario_id" for="x_usuario_id" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->usuario_id->caption() ?><?php echo ($area_nivel_acesso->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->usuario_id->cellAttributes() ?>>
<span id="el_area_nivel_acesso_usuario_id">
<input type="text" data-table="area_nivel_acesso" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($area_nivel_acesso->usuario_id->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->usuario_id->EditValue ?>"<?php echo $area_nivel_acesso->usuario_id->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($area_nivel_acesso->bool_ativo_area_nivel_acesso->Visible) { // bool_ativo_area_nivel_acesso ?>
	<div id="r_bool_ativo_area_nivel_acesso" class="form-group row">
		<label id="elh_area_nivel_acesso_bool_ativo_area_nivel_acesso" for="x_bool_ativo_area_nivel_acesso" class="<?php echo $area_nivel_acesso_edit->LeftColumnClass ?>"><?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->caption() ?><?php echo ($area_nivel_acesso->bool_ativo_area_nivel_acesso->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $area_nivel_acesso_edit->RightColumnClass ?>"><div<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->cellAttributes() ?>>
<span id="el_area_nivel_acesso_bool_ativo_area_nivel_acesso">
<input type="text" data-table="area_nivel_acesso" data-field="x_bool_ativo_area_nivel_acesso" name="x_bool_ativo_area_nivel_acesso" id="x_bool_ativo_area_nivel_acesso" size="30" placeholder="<?php echo HtmlEncode($area_nivel_acesso->bool_ativo_area_nivel_acesso->getPlaceHolder()) ?>" value="<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->EditValue ?>"<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->editAttributes() ?>>
</span>
<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$area_nivel_acesso_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $area_nivel_acesso_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $area_nivel_acesso_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$area_nivel_acesso_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$area_nivel_acesso_edit->terminate();
?>
