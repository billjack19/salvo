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
$notificacoes_add = new notificacoes_add();

// Run the page
$notificacoes_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fnotificacoesadd = currentForm = new ew.Form("fnotificacoesadd", "add");

// Validate form
fnotificacoesadd.validate = function() {
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
		<?php if ($notificacoes_add->descricao_notificacoes->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_notificacoes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->descricao_notificacoes->caption(), $notificacoes->descricao_notificacoes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_add->usuario_atuador_notificacoes->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_atuador_notificacoes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->usuario_atuador_notificacoes->caption(), $notificacoes->usuario_atuador_notificacoes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_add->usuaio_requerente_notificacoes->Required) { ?>
			elm = this.getElements("x" + infix + "_usuaio_requerente_notificacoes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->usuaio_requerente_notificacoes->caption(), $notificacoes->usuaio_requerente_notificacoes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_add->tipo_alteracao_notificacoes->Required) { ?>
			elm = this.getElements("x" + infix + "_tipo_alteracao_notificacoes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->tipo_alteracao_notificacoes->caption(), $notificacoes->tipo_alteracao_notificacoes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($notificacoes_add->notificacoes_config_id->Required) { ?>
			elm = this.getElements("x" + infix + "_notificacoes_config_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->notificacoes_config_id->caption(), $notificacoes->notificacoes_config_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_notificacoes_config_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes->notificacoes_config_id->errorMessage()) ?>");
		<?php if ($notificacoes_add->bool_view_notificacoes->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_view_notificacoes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->bool_view_notificacoes->caption(), $notificacoes->bool_view_notificacoes->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_view_notificacoes");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes->bool_view_notificacoes->errorMessage()) ?>");
		<?php if ($notificacoes_add->data_atualizacao_notificacoes->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->data_atualizacao_notificacoes->caption(), $notificacoes->data_atualizacao_notificacoes->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_notificacoes");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes->data_atualizacao_notificacoes->errorMessage()) ?>");
		<?php if ($notificacoes_add->bool_ativo_notificacoes->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $notificacoes->bool_ativo_notificacoes->caption(), $notificacoes->bool_ativo_notificacoes->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_notificacoes");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($notificacoes->bool_ativo_notificacoes->errorMessage()) ?>");

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
fnotificacoesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoesadd.lists["x_tipo_alteracao_notificacoes"] = <?php echo $notificacoes_add->tipo_alteracao_notificacoes->Lookup->toClientList() ?>;
fnotificacoesadd.lists["x_tipo_alteracao_notificacoes"].options = <?php echo JsonEncode($notificacoes_add->tipo_alteracao_notificacoes->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $notificacoes_add->showPageHeader(); ?>
<?php
$notificacoes_add->showMessage();
?>
<form name="fnotificacoesadd" id="fnotificacoesadd" class="<?php echo $notificacoes_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$notificacoes_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($notificacoes->descricao_notificacoes->Visible) { // descricao_notificacoes ?>
	<div id="r_descricao_notificacoes" class="form-group row">
		<label id="elh_notificacoes_descricao_notificacoes" for="x_descricao_notificacoes" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->descricao_notificacoes->caption() ?><?php echo ($notificacoes->descricao_notificacoes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->descricao_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_descricao_notificacoes">
<textarea data-table="notificacoes" data-field="x_descricao_notificacoes" name="x_descricao_notificacoes" id="x_descricao_notificacoes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($notificacoes->descricao_notificacoes->getPlaceHolder()) ?>"<?php echo $notificacoes->descricao_notificacoes->editAttributes() ?>><?php echo $notificacoes->descricao_notificacoes->EditValue ?></textarea>
</span>
<?php echo $notificacoes->descricao_notificacoes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes->usuario_atuador_notificacoes->Visible) { // usuario_atuador_notificacoes ?>
	<div id="r_usuario_atuador_notificacoes" class="form-group row">
		<label id="elh_notificacoes_usuario_atuador_notificacoes" for="x_usuario_atuador_notificacoes" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->usuario_atuador_notificacoes->caption() ?><?php echo ($notificacoes->usuario_atuador_notificacoes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->usuario_atuador_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_usuario_atuador_notificacoes">
<input type="text" data-table="notificacoes" data-field="x_usuario_atuador_notificacoes" name="x_usuario_atuador_notificacoes" id="x_usuario_atuador_notificacoes" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($notificacoes->usuario_atuador_notificacoes->getPlaceHolder()) ?>" value="<?php echo $notificacoes->usuario_atuador_notificacoes->EditValue ?>"<?php echo $notificacoes->usuario_atuador_notificacoes->editAttributes() ?>>
</span>
<?php echo $notificacoes->usuario_atuador_notificacoes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes->usuaio_requerente_notificacoes->Visible) { // usuaio_requerente_notificacoes ?>
	<div id="r_usuaio_requerente_notificacoes" class="form-group row">
		<label id="elh_notificacoes_usuaio_requerente_notificacoes" for="x_usuaio_requerente_notificacoes" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->usuaio_requerente_notificacoes->caption() ?><?php echo ($notificacoes->usuaio_requerente_notificacoes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->usuaio_requerente_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_usuaio_requerente_notificacoes">
<input type="text" data-table="notificacoes" data-field="x_usuaio_requerente_notificacoes" name="x_usuaio_requerente_notificacoes" id="x_usuaio_requerente_notificacoes" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($notificacoes->usuaio_requerente_notificacoes->getPlaceHolder()) ?>" value="<?php echo $notificacoes->usuaio_requerente_notificacoes->EditValue ?>"<?php echo $notificacoes->usuaio_requerente_notificacoes->editAttributes() ?>>
</span>
<?php echo $notificacoes->usuaio_requerente_notificacoes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes->tipo_alteracao_notificacoes->Visible) { // tipo_alteracao_notificacoes ?>
	<div id="r_tipo_alteracao_notificacoes" class="form-group row">
		<label id="elh_notificacoes_tipo_alteracao_notificacoes" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->tipo_alteracao_notificacoes->caption() ?><?php echo ($notificacoes->tipo_alteracao_notificacoes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->tipo_alteracao_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_tipo_alteracao_notificacoes">
<div id="tp_x_tipo_alteracao_notificacoes" class="ew-template"><input type="radio" class="form-check-input" data-table="notificacoes" data-field="x_tipo_alteracao_notificacoes" data-value-separator="<?php echo $notificacoes->tipo_alteracao_notificacoes->displayValueSeparatorAttribute() ?>" name="x_tipo_alteracao_notificacoes" id="x_tipo_alteracao_notificacoes" value="{value}"<?php echo $notificacoes->tipo_alteracao_notificacoes->editAttributes() ?>></div>
<div id="dsl_x_tipo_alteracao_notificacoes" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $notificacoes->tipo_alteracao_notificacoes->radioButtonListHtml(FALSE, "x_tipo_alteracao_notificacoes") ?>
</div></div>
</span>
<?php echo $notificacoes->tipo_alteracao_notificacoes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<div id="r_notificacoes_config_id" class="form-group row">
		<label id="elh_notificacoes_notificacoes_config_id" for="x_notificacoes_config_id" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->notificacoes_config_id->caption() ?><?php echo ($notificacoes->notificacoes_config_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->notificacoes_config_id->cellAttributes() ?>>
<span id="el_notificacoes_notificacoes_config_id">
<input type="text" data-table="notificacoes" data-field="x_notificacoes_config_id" name="x_notificacoes_config_id" id="x_notificacoes_config_id" size="30" placeholder="<?php echo HtmlEncode($notificacoes->notificacoes_config_id->getPlaceHolder()) ?>" value="<?php echo $notificacoes->notificacoes_config_id->EditValue ?>"<?php echo $notificacoes->notificacoes_config_id->editAttributes() ?>>
</span>
<?php echo $notificacoes->notificacoes_config_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes->bool_view_notificacoes->Visible) { // bool_view_notificacoes ?>
	<div id="r_bool_view_notificacoes" class="form-group row">
		<label id="elh_notificacoes_bool_view_notificacoes" for="x_bool_view_notificacoes" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->bool_view_notificacoes->caption() ?><?php echo ($notificacoes->bool_view_notificacoes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->bool_view_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_bool_view_notificacoes">
<input type="text" data-table="notificacoes" data-field="x_bool_view_notificacoes" name="x_bool_view_notificacoes" id="x_bool_view_notificacoes" size="30" placeholder="<?php echo HtmlEncode($notificacoes->bool_view_notificacoes->getPlaceHolder()) ?>" value="<?php echo $notificacoes->bool_view_notificacoes->EditValue ?>"<?php echo $notificacoes->bool_view_notificacoes->editAttributes() ?>>
</span>
<?php echo $notificacoes->bool_view_notificacoes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes->data_atualizacao_notificacoes->Visible) { // data_atualizacao_notificacoes ?>
	<div id="r_data_atualizacao_notificacoes" class="form-group row">
		<label id="elh_notificacoes_data_atualizacao_notificacoes" for="x_data_atualizacao_notificacoes" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->data_atualizacao_notificacoes->caption() ?><?php echo ($notificacoes->data_atualizacao_notificacoes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->data_atualizacao_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_data_atualizacao_notificacoes">
<input type="text" data-table="notificacoes" data-field="x_data_atualizacao_notificacoes" name="x_data_atualizacao_notificacoes" id="x_data_atualizacao_notificacoes" placeholder="<?php echo HtmlEncode($notificacoes->data_atualizacao_notificacoes->getPlaceHolder()) ?>" value="<?php echo $notificacoes->data_atualizacao_notificacoes->EditValue ?>"<?php echo $notificacoes->data_atualizacao_notificacoes->editAttributes() ?>>
</span>
<?php echo $notificacoes->data_atualizacao_notificacoes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($notificacoes->bool_ativo_notificacoes->Visible) { // bool_ativo_notificacoes ?>
	<div id="r_bool_ativo_notificacoes" class="form-group row">
		<label id="elh_notificacoes_bool_ativo_notificacoes" for="x_bool_ativo_notificacoes" class="<?php echo $notificacoes_add->LeftColumnClass ?>"><?php echo $notificacoes->bool_ativo_notificacoes->caption() ?><?php echo ($notificacoes->bool_ativo_notificacoes->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $notificacoes_add->RightColumnClass ?>"><div<?php echo $notificacoes->bool_ativo_notificacoes->cellAttributes() ?>>
<span id="el_notificacoes_bool_ativo_notificacoes">
<input type="text" data-table="notificacoes" data-field="x_bool_ativo_notificacoes" name="x_bool_ativo_notificacoes" id="x_bool_ativo_notificacoes" size="30" placeholder="<?php echo HtmlEncode($notificacoes->bool_ativo_notificacoes->getPlaceHolder()) ?>" value="<?php echo $notificacoes->bool_ativo_notificacoes->EditValue ?>"<?php echo $notificacoes->bool_ativo_notificacoes->editAttributes() ?>>
</span>
<?php echo $notificacoes->bool_ativo_notificacoes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$notificacoes_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $notificacoes_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $notificacoes_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$notificacoes_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$notificacoes_add->terminate();
?>
