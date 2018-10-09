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
$notificacoes_salvas_edit = new notificacoes_salvas_edit();

// Run the page
$notificacoes_salvas_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_salvas_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fnotificacoes_salvasedit = currentForm = new ew.Form("fnotificacoes_salvasedit", "edit");

// Validate form
fnotificacoes_salvasedit.validate = function() {
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
		<?php if ($notificacoes_salvas_edit->id_notificacoes_salvas->Required) { ?>
			elm = this.getElements("x" + infix + "_id_notificacoes_salvas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->id_notificacoes_salvas->caption(), $notificacoes_salvas->id_notificacoes_salvas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_salvas_edit->descricao_notificacoes_salvas->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_notificacoes_salvas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->descricao_notificacoes_salvas->caption(), $notificacoes_salvas->descricao_notificacoes_salvas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_salvas_edit->usuario_atuador_notificacoes_salvas->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_atuador_notificacoes_salvas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->usuario_atuador_notificacoes_salvas->caption(), $notificacoes_salvas->usuario_atuador_notificacoes_salvas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_salvas_edit->usuaio_requerente_notificacoes_salvas->Required) { ?>
			elm = this.getElements("x" + infix + "_usuaio_requerente_notificacoes_salvas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->caption(), $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_salvas_edit->tipo_alteracao_notificacoes_salvas->Required) { ?>
			elm = this.getElements("x" + infix + "_tipo_alteracao_notificacoes_salvas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->caption(), $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_salvas_edit->notificacoes_config_id->Required) { ?>
			elm = this.getElements("x" + infix + "_notificacoes_config_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->notificacoes_config_id->caption(), $notificacoes_salvas->notificacoes_config_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_notificacoes_config_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_salvas->notificacoes_config_id->errorMessage()) ?>");
		<?php if ($notificacoes_salvas_edit->data_atualizacao_notificacoes_salvas->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes_salvas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->data_atualizacao_notificacoes_salvas->caption(), $notificacoes_salvas->data_atualizacao_notificacoes_salvas->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes_salvas");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_salvas->data_atualizacao_notificacoes_salvas->errorMessage()) ?>");
		<?php if ($notificacoes_salvas_edit->bool_ativo_notificacoes_salvas->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes_salvas");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_salvas->bool_ativo_notificacoes_salvas->caption(), $notificacoes_salvas->bool_ativo_notificacoes_salvas->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes_salvas");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_salvas->bool_ativo_notificacoes_salvas->errorMessage()) ?>");

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
fnotificacoes_salvasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_salvasedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_salvas_edit->showPageHeader(); ?>
<?php
$notificacoes_salvas_edit->showMessage();
?>
<form name="fnotificacoes_salvasedit" id="fnotificacoes_salvasedit" class="<?php echo $notificacoes_salvas_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_salvas_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_salvas_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_salvas">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_salvas_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($notificacoes_salvas->id_notificacoes_salvas->Visible) { // id_notificacoes_salvas ?>
	<div id="r_id_notificacoes_salvas" class="form-group row">
		<label id="elh_notificacoes_salvas_id_notificacoes_salvas" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->id_notificacoes_salvas->caption() ?><?php echo ($notificacoes_salvas->id_notificacoes_salvas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->id_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_id_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->id_notificacoes_salvas->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($notificacoes_salvas->id_notificacoes_salvas->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="notificacoes_salvas" data-field="x_id_notificacoes_salvas" name="x_id_notificacoes_salvas" id="x_id_notificacoes_salvas" value="<?php echo HtmlEncode($notificacoes_salvas->id_notificacoes_salvas->CurrentValue) ?>">
<?php echo $notificacoes_salvas->id_notificacoes_salvas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_salvas->descricao_notificacoes_salvas->Visible) { // descricao_notificacoes_salvas ?>
	<div id="r_descricao_notificacoes_salvas" class="form-group row">
		<label id="elh_notificacoes_salvas_descricao_notificacoes_salvas" for="x_descricao_notificacoes_salvas" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->descricao_notificacoes_salvas->caption() ?><?php echo ($notificacoes_salvas->descricao_notificacoes_salvas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->descricao_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_descricao_notificacoes_salvas">
<textarea data-table="notificacoes_salvas" data-field="x_descricao_notificacoes_salvas" name="x_descricao_notificacoes_salvas" id="x_descricao_notificacoes_salvas" cols="35" rows="4" placeholder="<?php echo HtmlEncode($notificacoes_salvas->descricao_notificacoes_salvas->getPlaceHolder()) ?>"<?php echo $notificacoes_salvas->descricao_notificacoes_salvas->editAttributes() ?>><?php echo $notificacoes_salvas->descricao_notificacoes_salvas->EditValue ?></textarea>
</span>
<?php echo $notificacoes_salvas->descricao_notificacoes_salvas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->Visible) { // usuario_atuador_notificacoes_salvas ?>
	<div id="r_usuario_atuador_notificacoes_salvas" class="form-group row">
		<label id="elh_notificacoes_salvas_usuario_atuador_notificacoes_salvas" for="x_usuario_atuador_notificacoes_salvas" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->caption() ?><?php echo ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_usuario_atuador_notificacoes_salvas">
<input type="text" data-table="notificacoes_salvas" data-field="x_usuario_atuador_notificacoes_salvas" name="x_usuario_atuador_notificacoes_salvas" id="x_usuario_atuador_notificacoes_salvas" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($notificacoes_salvas->usuario_atuador_notificacoes_salvas->getPlaceHolder()) ?>" value="<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->EditValue ?>"<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->editAttributes() ?>>
</span>
<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->Visible) { // usuaio_requerente_notificacoes_salvas ?>
	<div id="r_usuaio_requerente_notificacoes_salvas" class="form-group row">
		<label id="elh_notificacoes_salvas_usuaio_requerente_notificacoes_salvas" for="x_usuaio_requerente_notificacoes_salvas" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->caption() ?><?php echo ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_usuaio_requerente_notificacoes_salvas">
<input type="text" data-table="notificacoes_salvas" data-field="x_usuaio_requerente_notificacoes_salvas" name="x_usuaio_requerente_notificacoes_salvas" id="x_usuaio_requerente_notificacoes_salvas" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->getPlaceHolder()) ?>" value="<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->EditValue ?>"<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->editAttributes() ?>>
</span>
<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->Visible) { // tipo_alteracao_notificacoes_salvas ?>
	<div id="r_tipo_alteracao_notificacoes_salvas" class="form-group row">
		<label id="elh_notificacoes_salvas_tipo_alteracao_notificacoes_salvas" for="x_tipo_alteracao_notificacoes_salvas" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->caption() ?><?php echo ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_tipo_alteracao_notificacoes_salvas">
<input type="text" data-table="notificacoes_salvas" data-field="x_tipo_alteracao_notificacoes_salvas" name="x_tipo_alteracao_notificacoes_salvas" id="x_tipo_alteracao_notificacoes_salvas" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->getPlaceHolder()) ?>" value="<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->EditValue ?>"<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->editAttributes() ?>>
</span>
<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_salvas->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<div id="r_notificacoes_config_id" class="form-group row">
		<label id="elh_notificacoes_salvas_notificacoes_config_id" for="x_notificacoes_config_id" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->notificacoes_config_id->caption() ?><?php echo ($notificacoes_salvas->notificacoes_config_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->notificacoes_config_id->cellAttributes() ?>>
<span id="el_notificacoes_salvas_notificacoes_config_id">
<input type="text" data-table="notificacoes_salvas" data-field="x_notificacoes_config_id" name="x_notificacoes_config_id" id="x_notificacoes_config_id" size="30" placeholder="<?php echo HtmlEncode($notificacoes_salvas->notificacoes_config_id->getPlaceHolder()) ?>" value="<?php echo $notificacoes_salvas->notificacoes_config_id->EditValue ?>"<?php echo $notificacoes_salvas->notificacoes_config_id->editAttributes() ?>>
</span>
<?php echo $notificacoes_salvas->notificacoes_config_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->Visible) { // data_atualizacao_notificacoes_salvas ?>
	<div id="r_data_atualizacao_notificacoes_salvas" class="form-group row">
		<label id="elh_notificacoes_salvas_data_atualizacao_notificacoes_salvas" for="x_data_atualizacao_notificacoes_salvas" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->caption() ?><?php echo ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_data_atualizacao_notificacoes_salvas">
<input type="text" data-table="notificacoes_salvas" data-field="x_data_atualizacao_notificacoes_salvas" name="x_data_atualizacao_notificacoes_salvas" id="x_data_atualizacao_notificacoes_salvas" placeholder="<?php echo HtmlEncode($notificacoes_salvas->data_atualizacao_notificacoes_salvas->getPlaceHolder()) ?>" value="<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->EditValue ?>"<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->editAttributes() ?>>
</span>
<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_salvas->bool_ativo_notificacoes_salvas->Visible) { // bool_ativo_notificacoes_salvas ?>
	<div id="r_bool_ativo_notificacoes_salvas" class="form-group row">
		<label id="elh_notificacoes_salvas_bool_ativo_notificacoes_salvas" for="x_bool_ativo_notificacoes_salvas" class="<?php echo $notificacoes_salvas_edit->LeftColumnClass ?>"><?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->caption() ?><?php echo ($notificacoes_salvas->bool_ativo_notificacoes_salvas->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_salvas_edit->RightColumnClass ?>"><div<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->cellAttributes() ?>>
<span id="el_notificacoes_salvas_bool_ativo_notificacoes_salvas">
<input type="text" data-table="notificacoes_salvas" data-field="x_bool_ativo_notificacoes_salvas" name="x_bool_ativo_notificacoes_salvas" id="x_bool_ativo_notificacoes_salvas" size="30" placeholder="<?php echo HtmlEncode($notificacoes_salvas->bool_ativo_notificacoes_salvas->getPlaceHolder()) ?>" value="<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->EditValue ?>"<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->editAttributes() ?>>
</span>
<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$notificacoes_salvas_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $notificacoes_salvas_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_salvas_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$notificacoes_salvas_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_salvas_edit->terminate();
?>
