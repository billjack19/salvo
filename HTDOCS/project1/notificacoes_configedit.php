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
$notificacoes_config_edit = new notificacoes_config_edit();

// Run the page
$notificacoes_config_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_config_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fnotificacoes_configedit = currentForm = new ew.Form("fnotificacoes_configedit", "edit");

// Validate form
fnotificacoes_configedit.validate = function() {
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
		<?php if ($notificacoes_config_edit->id_notificacoes_config->Required) { ?>
			elm = this.getElements("x" + infix + "_id_notificacoes_config");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_config->id_notificacoes_config->caption(), $notificacoes_config->id_notificacoes_config->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_config_edit->area_notificacoes_config->Required) { ?>
			elm = this.getElements("x" + infix + "_area_notificacoes_config");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_config->area_notificacoes_config->caption(), $notificacoes_config->area_notificacoes_config->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_config_edit->tipo_alteracao_notificacoes_config->Required) { ?>
			elm = this.getElements("x" + infix + "_tipo_alteracao_notificacoes_config");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_config->tipo_alteracao_notificacoes_config->caption(), $notificacoes_config->tipo_alteracao_notificacoes_config->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_config_edit->data_atualizacao_notificacoes_config->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes_config");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_config->data_atualizacao_notificacoes_config->caption(), $notificacoes_config->data_atualizacao_notificacoes_config->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes_config");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_config->data_atualizacao_notificacoes_config->errorMessage()) ?>");
		<?php if ($notificacoes_config_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_config->usuario_id->caption(), $notificacoes_config->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_config->usuario_id->errorMessage()) ?>");
		<?php if ($notificacoes_config_edit->bool_ativo_notificacoes_config->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes_config");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_config->bool_ativo_notificacoes_config->caption(), $notificacoes_config->bool_ativo_notificacoes_config->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes_config");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_config->bool_ativo_notificacoes_config->errorMessage()) ?>");

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
fnotificacoes_configedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_configedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_config_edit->showPageHeader(); ?>
<?php
$notificacoes_config_edit->showMessage();
?>
<form name="fnotificacoes_configedit" id="fnotificacoes_configedit" class="<?php echo $notificacoes_config_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_config_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_config_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_config">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_config_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($notificacoes_config->id_notificacoes_config->Visible) { // id_notificacoes_config ?>
	<div id="r_id_notificacoes_config" class="form-group row">
		<label id="elh_notificacoes_config_id_notificacoes_config" class="<?php echo $notificacoes_config_edit->LeftColumnClass ?>"><?php echo $notificacoes_config->id_notificacoes_config->caption() ?><?php echo ($notificacoes_config->id_notificacoes_config->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_config_edit->RightColumnClass ?>"><div<?php echo $notificacoes_config->id_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_id_notificacoes_config">
<span<?php echo $notificacoes_config->id_notificacoes_config->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($notificacoes_config->id_notificacoes_config->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="notificacoes_config" data-field="x_id_notificacoes_config" name="x_id_notificacoes_config" id="x_id_notificacoes_config" value="<?php echo HtmlEncode($notificacoes_config->id_notificacoes_config->CurrentValue) ?>">
<?php echo $notificacoes_config->id_notificacoes_config->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_config->area_notificacoes_config->Visible) { // area_notificacoes_config ?>
	<div id="r_area_notificacoes_config" class="form-group row">
		<label id="elh_notificacoes_config_area_notificacoes_config" for="x_area_notificacoes_config" class="<?php echo $notificacoes_config_edit->LeftColumnClass ?>"><?php echo $notificacoes_config->area_notificacoes_config->caption() ?><?php echo ($notificacoes_config->area_notificacoes_config->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_config_edit->RightColumnClass ?>"><div<?php echo $notificacoes_config->area_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_area_notificacoes_config">
<input type="text" data-table="notificacoes_config" data-field="x_area_notificacoes_config" name="x_area_notificacoes_config" id="x_area_notificacoes_config" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($notificacoes_config->area_notificacoes_config->getPlaceHolder()) ?>" value="<?php echo $notificacoes_config->area_notificacoes_config->EditValue ?>"<?php echo $notificacoes_config->area_notificacoes_config->editAttributes() ?>>
</span>
<?php echo $notificacoes_config->area_notificacoes_config->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_config->tipo_alteracao_notificacoes_config->Visible) { // tipo_alteracao_notificacoes_config ?>
	<div id="r_tipo_alteracao_notificacoes_config" class="form-group row">
		<label id="elh_notificacoes_config_tipo_alteracao_notificacoes_config" for="x_tipo_alteracao_notificacoes_config" class="<?php echo $notificacoes_config_edit->LeftColumnClass ?>"><?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->caption() ?><?php echo ($notificacoes_config->tipo_alteracao_notificacoes_config->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_config_edit->RightColumnClass ?>"><div<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_tipo_alteracao_notificacoes_config">
<input type="text" data-table="notificacoes_config" data-field="x_tipo_alteracao_notificacoes_config" name="x_tipo_alteracao_notificacoes_config" id="x_tipo_alteracao_notificacoes_config" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($notificacoes_config->tipo_alteracao_notificacoes_config->getPlaceHolder()) ?>" value="<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->EditValue ?>"<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->editAttributes() ?>>
</span>
<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_config->data_atualizacao_notificacoes_config->Visible) { // data_atualizacao_notificacoes_config ?>
	<div id="r_data_atualizacao_notificacoes_config" class="form-group row">
		<label id="elh_notificacoes_config_data_atualizacao_notificacoes_config" for="x_data_atualizacao_notificacoes_config" class="<?php echo $notificacoes_config_edit->LeftColumnClass ?>"><?php echo $notificacoes_config->data_atualizacao_notificacoes_config->caption() ?><?php echo ($notificacoes_config->data_atualizacao_notificacoes_config->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_config_edit->RightColumnClass ?>"><div<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_data_atualizacao_notificacoes_config">
<input type="text" data-table="notificacoes_config" data-field="x_data_atualizacao_notificacoes_config" name="x_data_atualizacao_notificacoes_config" id="x_data_atualizacao_notificacoes_config" placeholder="<?php echo HtmlEncode($notificacoes_config->data_atualizacao_notificacoes_config->getPlaceHolder()) ?>" value="<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->EditValue ?>"<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->editAttributes() ?>>
</span>
<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_config->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_notificacoes_config_usuario_id" for="x_usuario_id" class="<?php echo $notificacoes_config_edit->LeftColumnClass ?>"><?php echo $notificacoes_config->usuario_id->caption() ?><?php echo ($notificacoes_config->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_config_edit->RightColumnClass ?>"><div<?php echo $notificacoes_config->usuario_id->cellAttributes() ?>>
<span id="el_notificacoes_config_usuario_id">
<input type="text" data-table="notificacoes_config" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($notificacoes_config->usuario_id->getPlaceHolder()) ?>" value="<?php echo $notificacoes_config->usuario_id->EditValue ?>"<?php echo $notificacoes_config->usuario_id->editAttributes() ?>>
</span>
<?php echo $notificacoes_config->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_config->bool_ativo_notificacoes_config->Visible) { // bool_ativo_notificacoes_config ?>
	<div id="r_bool_ativo_notificacoes_config" class="form-group row">
		<label id="elh_notificacoes_config_bool_ativo_notificacoes_config" for="x_bool_ativo_notificacoes_config" class="<?php echo $notificacoes_config_edit->LeftColumnClass ?>"><?php echo $notificacoes_config->bool_ativo_notificacoes_config->caption() ?><?php echo ($notificacoes_config->bool_ativo_notificacoes_config->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_config_edit->RightColumnClass ?>"><div<?php echo $notificacoes_config->bool_ativo_notificacoes_config->cellAttributes() ?>>
<span id="el_notificacoes_config_bool_ativo_notificacoes_config">
<input type="text" data-table="notificacoes_config" data-field="x_bool_ativo_notificacoes_config" name="x_bool_ativo_notificacoes_config" id="x_bool_ativo_notificacoes_config" size="30" placeholder="<?php echo HtmlEncode($notificacoes_config->bool_ativo_notificacoes_config->getPlaceHolder()) ?>" value="<?php echo $notificacoes_config->bool_ativo_notificacoes_config->EditValue ?>"<?php echo $notificacoes_config->bool_ativo_notificacoes_config->editAttributes() ?>>
</span>
<?php echo $notificacoes_config->bool_ativo_notificacoes_config->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$notificacoes_config_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $notificacoes_config_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_config_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$notificacoes_config_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_config_edit->terminate();
?>
