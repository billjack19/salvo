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
$notificacoes_pendentes_add = new notificacoes_pendentes_add();

// Run the page
$notificacoes_pendentes_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_pendentes_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fnotificacoes_pendentesadd = currentForm = new ew.Form("fnotificacoes_pendentesadd", "add");

// Validate form
fnotificacoes_pendentesadd.validate = function() {
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
		<?php if ($notificacoes_pendentes_add->descricao_notificacoes_pendentes->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_notificacoes_pendentes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_pendentes->descricao_notificacoes_pendentes->caption(), $notificacoes_pendentes->descricao_notificacoes_pendentes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_pendentes_add->usuario_atuador_notificacoes_pendentes->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_atuador_notificacoes_pendentes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->caption(), $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_pendentes_add->usuaio_requerente_notificacoes_pendentes->Required) { ?>
			elm = this.getElements("x" + infix + "_usuaio_requerente_notificacoes_pendentes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->caption(), $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_pendentes_add->tipo_alteracao_notificacoes_pendentes->Required) { ?>
			elm = this.getElements("x" + infix + "_tipo_alteracao_notificacoes_pendentes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->caption(), $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_pendentes_add->notificacoes_config_id->Required) { ?>
			elm = this.getElements("x" + infix + "_notificacoes_config_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_pendentes->notificacoes_config_id->caption(), $notificacoes_pendentes->notificacoes_config_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_notificacoes_config_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_pendentes->notificacoes_config_id->errorMessage()) ?>");
		<?php if ($notificacoes_pendentes_add->data_atualizacao_notificacoes_pendentes->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes_pendentes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->caption(), $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes_pendentes");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->errorMessage()) ?>");
		<?php if ($notificacoes_pendentes_add->bool_ativo_notificacoes_pendentes->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes_pendentes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->caption(), $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes_pendentes");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->errorMessage()) ?>");

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
fnotificacoes_pendentesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_pendentesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoes_pendentesadd.lists["x_tipo_alteracao_notificacoes_pendentes"] = <?php echo $notificacoes_pendentes_add->tipo_alteracao_notificacoes_pendentes->Lookup->toClientList() ?>;
fnotificacoes_pendentesadd.lists["x_tipo_alteracao_notificacoes_pendentes"].options = <?php echo JsonEncode($notificacoes_pendentes_add->tipo_alteracao_notificacoes_pendentes->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_pendentes_add->showPageHeader(); ?>
<?php
$notificacoes_pendentes_add->showMessage();
?>
<form name="fnotificacoes_pendentesadd" id="fnotificacoes_pendentesadd" class="<?php echo $notificacoes_pendentes_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_pendentes_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_pendentes_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_pendentes">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_pendentes_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($notificacoes_pendentes->descricao_notificacoes_pendentes->Visible) { // descricao_notificacoes_pendentes ?>
	<div id="r_descricao_notificacoes_pendentes" class="form-group row">
		<label id="elh_notificacoes_pendentes_descricao_notificacoes_pendentes" for="x_descricao_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes_add->LeftColumnClass ?>"><?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->caption() ?><?php echo ($notificacoes_pendentes->descricao_notificacoes_pendentes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_pendentes_add->RightColumnClass ?>"><div<?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_descricao_notificacoes_pendentes">
<textarea data-table="notificacoes_pendentes" data-field="x_descricao_notificacoes_pendentes" name="x_descricao_notificacoes_pendentes" id="x_descricao_notificacoes_pendentes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($notificacoes_pendentes->descricao_notificacoes_pendentes->getPlaceHolder()) ?>"<?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->editAttributes() ?>><?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->EditValue ?></textarea>
</span>
<?php echo $notificacoes_pendentes->descricao_notificacoes_pendentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->Visible) { // usuario_atuador_notificacoes_pendentes ?>
	<div id="r_usuario_atuador_notificacoes_pendentes" class="form-group row">
		<label id="elh_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes" for="x_usuario_atuador_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes_add->LeftColumnClass ?>"><?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->caption() ?><?php echo ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_pendentes_add->RightColumnClass ?>"><div<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes">
<input type="text" data-table="notificacoes_pendentes" data-field="x_usuario_atuador_notificacoes_pendentes" name="x_usuario_atuador_notificacoes_pendentes" id="x_usuario_atuador_notificacoes_pendentes" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->getPlaceHolder()) ?>" value="<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->EditValue ?>"<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->editAttributes() ?>>
</span>
<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->Visible) { // usuaio_requerente_notificacoes_pendentes ?>
	<div id="r_usuaio_requerente_notificacoes_pendentes" class="form-group row">
		<label id="elh_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes" for="x_usuaio_requerente_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes_add->LeftColumnClass ?>"><?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->caption() ?><?php echo ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_pendentes_add->RightColumnClass ?>"><div<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes">
<input type="text" data-table="notificacoes_pendentes" data-field="x_usuaio_requerente_notificacoes_pendentes" name="x_usuaio_requerente_notificacoes_pendentes" id="x_usuaio_requerente_notificacoes_pendentes" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->getPlaceHolder()) ?>" value="<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->EditValue ?>"<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->editAttributes() ?>>
</span>
<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Visible) { // tipo_alteracao_notificacoes_pendentes ?>
	<div id="r_tipo_alteracao_notificacoes_pendentes" class="form-group row">
		<label id="elh_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes_add->LeftColumnClass ?>"><?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->caption() ?><?php echo ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_pendentes_add->RightColumnClass ?>"><div<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes">
<div id="tp_x_tipo_alteracao_notificacoes_pendentes" class="ew-template"><input type="radio" class="form-check-input" data-table="notificacoes_pendentes" data-field="x_tipo_alteracao_notificacoes_pendentes" data-value-separator="<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->displayValueSeparatorAttribute() ?>" name="x_tipo_alteracao_notificacoes_pendentes" id="x_tipo_alteracao_notificacoes_pendentes" value="{value}"<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->editAttributes() ?>></div>
<div id="dsl_x_tipo_alteracao_notificacoes_pendentes" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->radioButtonListHtml(FALSE, "x_tipo_alteracao_notificacoes_pendentes") ?>
</div></div>
</span>
<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_pendentes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<div id="r_notificacoes_config_id" class="form-group row">
		<label id="elh_notificacoes_pendentes_notificacoes_config_id" for="x_notificacoes_config_id" class="<?php echo $notificacoes_pendentes_add->LeftColumnClass ?>"><?php echo $notificacoes_pendentes->notificacoes_config_id->caption() ?><?php echo ($notificacoes_pendentes->notificacoes_config_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_pendentes_add->RightColumnClass ?>"><div<?php echo $notificacoes_pendentes->notificacoes_config_id->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_notificacoes_config_id">
<input type="text" data-table="notificacoes_pendentes" data-field="x_notificacoes_config_id" name="x_notificacoes_config_id" id="x_notificacoes_config_id" size="30" placeholder="<?php echo HtmlEncode($notificacoes_pendentes->notificacoes_config_id->getPlaceHolder()) ?>" value="<?php echo $notificacoes_pendentes->notificacoes_config_id->EditValue ?>"<?php echo $notificacoes_pendentes->notificacoes_config_id->editAttributes() ?>>
</span>
<?php echo $notificacoes_pendentes->notificacoes_config_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->Visible) { // data_atualizacao_notificacoes_pendentes ?>
	<div id="r_data_atualizacao_notificacoes_pendentes" class="form-group row">
		<label id="elh_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes" for="x_data_atualizacao_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes_add->LeftColumnClass ?>"><?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->caption() ?><?php echo ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_pendentes_add->RightColumnClass ?>"><div<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes">
<input type="text" data-table="notificacoes_pendentes" data-field="x_data_atualizacao_notificacoes_pendentes" name="x_data_atualizacao_notificacoes_pendentes" id="x_data_atualizacao_notificacoes_pendentes" placeholder="<?php echo HtmlEncode($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->getPlaceHolder()) ?>" value="<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->EditValue ?>"<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->editAttributes() ?>>
</span>
<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->Visible) { // bool_ativo_notificacoes_pendentes ?>
	<div id="r_bool_ativo_notificacoes_pendentes" class="form-group row">
		<label id="elh_notificacoes_pendentes_bool_ativo_notificacoes_pendentes" for="x_bool_ativo_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes_add->LeftColumnClass ?>"><?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->caption() ?><?php echo ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_pendentes_add->RightColumnClass ?>"><div<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->cellAttributes() ?>>
<span id="el_notificacoes_pendentes_bool_ativo_notificacoes_pendentes">
<input type="text" data-table="notificacoes_pendentes" data-field="x_bool_ativo_notificacoes_pendentes" name="x_bool_ativo_notificacoes_pendentes" id="x_bool_ativo_notificacoes_pendentes" size="30" placeholder="<?php echo HtmlEncode($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->getPlaceHolder()) ?>" value="<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->EditValue ?>"<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->editAttributes() ?>>
</span>
<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$notificacoes_pendentes_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $notificacoes_pendentes_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_pendentes_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$notificacoes_pendentes_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_pendentes_add->terminate();
?>
