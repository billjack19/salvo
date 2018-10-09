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
$quem_somos_edit = new quem_somos_edit();

// Run the page
$quem_somos_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$quem_somos_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fquem_somosedit = currentForm = new ew.Form("fquem_somosedit", "edit");

// Validate form
fquem_somosedit.validate = function() {
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
		<?php if ($quem_somos_edit->id_quem_somos->Required) { ?>
			elm = this.getElements("x" + infix + "_id_quem_somos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $quem_somos->id_quem_somos->caption(), $quem_somos->id_quem_somos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($quem_somos_edit->titulo_quem_somos->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_quem_somos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $quem_somos->titulo_quem_somos->caption(), $quem_somos->titulo_quem_somos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($quem_somos_edit->descricao_quem_somos->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_quem_somos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $quem_somos->descricao_quem_somos->caption(), $quem_somos->descricao_quem_somos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($quem_somos_edit->imagem_quem_somos->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_quem_somos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $quem_somos->imagem_quem_somos->caption(), $quem_somos->imagem_quem_somos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($quem_somos_edit->data_atualizacao_quem_somos->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_quem_somos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $quem_somos->data_atualizacao_quem_somos->caption(), $quem_somos->data_atualizacao_quem_somos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_quem_somos");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($quem_somos->data_atualizacao_quem_somos->errorMessage()) ?>");
		<?php if ($quem_somos_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $quem_somos->usuario_id->caption(), $quem_somos->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($quem_somos->usuario_id->errorMessage()) ?>");
		<?php if ($quem_somos_edit->bool_ativo_quem_somos->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_quem_somos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $quem_somos->bool_ativo_quem_somos->caption(), $quem_somos->bool_ativo_quem_somos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_quem_somos");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($quem_somos->bool_ativo_quem_somos->errorMessage()) ?>");

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
fquem_somosedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fquem_somosedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $quem_somos_edit->showPageHeader(); ?>
<?php
$quem_somos_edit->showMessage();
?>
<form name="fquem_somosedit" id="fquem_somosedit" class="<?php echo $quem_somos_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($quem_somos_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $quem_somos_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="quem_somos">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$quem_somos_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($quem_somos->id_quem_somos->Visible) { // id_quem_somos ?>
	<div id="r_id_quem_somos" class="form-group row">
		<label id="elh_quem_somos_id_quem_somos" class="<?php echo $quem_somos_edit->LeftColumnClass ?>"><?php echo $quem_somos->id_quem_somos->caption() ?><?php echo ($quem_somos->id_quem_somos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $quem_somos_edit->RightColumnClass ?>"><div<?php echo $quem_somos->id_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_id_quem_somos">
<span<?php echo $quem_somos->id_quem_somos->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($quem_somos->id_quem_somos->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="quem_somos" data-field="x_id_quem_somos" name="x_id_quem_somos" id="x_id_quem_somos" value="<?php echo HtmlEncode($quem_somos->id_quem_somos->CurrentValue) ?>">
<?php echo $quem_somos->id_quem_somos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($quem_somos->titulo_quem_somos->Visible) { // titulo_quem_somos ?>
	<div id="r_titulo_quem_somos" class="form-group row">
		<label id="elh_quem_somos_titulo_quem_somos" for="x_titulo_quem_somos" class="<?php echo $quem_somos_edit->LeftColumnClass ?>"><?php echo $quem_somos->titulo_quem_somos->caption() ?><?php echo ($quem_somos->titulo_quem_somos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $quem_somos_edit->RightColumnClass ?>"><div<?php echo $quem_somos->titulo_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_titulo_quem_somos">
<input type="text" data-table="quem_somos" data-field="x_titulo_quem_somos" name="x_titulo_quem_somos" id="x_titulo_quem_somos" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($quem_somos->titulo_quem_somos->getPlaceHolder()) ?>" value="<?php echo $quem_somos->titulo_quem_somos->EditValue ?>"<?php echo $quem_somos->titulo_quem_somos->editAttributes() ?>>
</span>
<?php echo $quem_somos->titulo_quem_somos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($quem_somos->descricao_quem_somos->Visible) { // descricao_quem_somos ?>
	<div id="r_descricao_quem_somos" class="form-group row">
		<label id="elh_quem_somos_descricao_quem_somos" for="x_descricao_quem_somos" class="<?php echo $quem_somos_edit->LeftColumnClass ?>"><?php echo $quem_somos->descricao_quem_somos->caption() ?><?php echo ($quem_somos->descricao_quem_somos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $quem_somos_edit->RightColumnClass ?>"><div<?php echo $quem_somos->descricao_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_descricao_quem_somos">
<textarea data-table="quem_somos" data-field="x_descricao_quem_somos" name="x_descricao_quem_somos" id="x_descricao_quem_somos" cols="35" rows="4" placeholder="<?php echo HtmlEncode($quem_somos->descricao_quem_somos->getPlaceHolder()) ?>"<?php echo $quem_somos->descricao_quem_somos->editAttributes() ?>><?php echo $quem_somos->descricao_quem_somos->EditValue ?></textarea>
</span>
<?php echo $quem_somos->descricao_quem_somos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($quem_somos->imagem_quem_somos->Visible) { // imagem_quem_somos ?>
	<div id="r_imagem_quem_somos" class="form-group row">
		<label id="elh_quem_somos_imagem_quem_somos" for="x_imagem_quem_somos" class="<?php echo $quem_somos_edit->LeftColumnClass ?>"><?php echo $quem_somos->imagem_quem_somos->caption() ?><?php echo ($quem_somos->imagem_quem_somos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $quem_somos_edit->RightColumnClass ?>"><div<?php echo $quem_somos->imagem_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_imagem_quem_somos">
<input type="text" data-table="quem_somos" data-field="x_imagem_quem_somos" name="x_imagem_quem_somos" id="x_imagem_quem_somos" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($quem_somos->imagem_quem_somos->getPlaceHolder()) ?>" value="<?php echo $quem_somos->imagem_quem_somos->EditValue ?>"<?php echo $quem_somos->imagem_quem_somos->editAttributes() ?>>
</span>
<?php echo $quem_somos->imagem_quem_somos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($quem_somos->data_atualizacao_quem_somos->Visible) { // data_atualizacao_quem_somos ?>
	<div id="r_data_atualizacao_quem_somos" class="form-group row">
		<label id="elh_quem_somos_data_atualizacao_quem_somos" for="x_data_atualizacao_quem_somos" class="<?php echo $quem_somos_edit->LeftColumnClass ?>"><?php echo $quem_somos->data_atualizacao_quem_somos->caption() ?><?php echo ($quem_somos->data_atualizacao_quem_somos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $quem_somos_edit->RightColumnClass ?>"><div<?php echo $quem_somos->data_atualizacao_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_data_atualizacao_quem_somos">
<input type="text" data-table="quem_somos" data-field="x_data_atualizacao_quem_somos" name="x_data_atualizacao_quem_somos" id="x_data_atualizacao_quem_somos" placeholder="<?php echo HtmlEncode($quem_somos->data_atualizacao_quem_somos->getPlaceHolder()) ?>" value="<?php echo $quem_somos->data_atualizacao_quem_somos->EditValue ?>"<?php echo $quem_somos->data_atualizacao_quem_somos->editAttributes() ?>>
</span>
<?php echo $quem_somos->data_atualizacao_quem_somos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($quem_somos->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_quem_somos_usuario_id" for="x_usuario_id" class="<?php echo $quem_somos_edit->LeftColumnClass ?>"><?php echo $quem_somos->usuario_id->caption() ?><?php echo ($quem_somos->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $quem_somos_edit->RightColumnClass ?>"><div<?php echo $quem_somos->usuario_id->cellAttributes() ?>>
<span id="el_quem_somos_usuario_id">
<input type="text" data-table="quem_somos" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($quem_somos->usuario_id->getPlaceHolder()) ?>" value="<?php echo $quem_somos->usuario_id->EditValue ?>"<?php echo $quem_somos->usuario_id->editAttributes() ?>>
</span>
<?php echo $quem_somos->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($quem_somos->bool_ativo_quem_somos->Visible) { // bool_ativo_quem_somos ?>
	<div id="r_bool_ativo_quem_somos" class="form-group row">
		<label id="elh_quem_somos_bool_ativo_quem_somos" for="x_bool_ativo_quem_somos" class="<?php echo $quem_somos_edit->LeftColumnClass ?>"><?php echo $quem_somos->bool_ativo_quem_somos->caption() ?><?php echo ($quem_somos->bool_ativo_quem_somos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $quem_somos_edit->RightColumnClass ?>"><div<?php echo $quem_somos->bool_ativo_quem_somos->cellAttributes() ?>>
<span id="el_quem_somos_bool_ativo_quem_somos">
<input type="text" data-table="quem_somos" data-field="x_bool_ativo_quem_somos" name="x_bool_ativo_quem_somos" id="x_bool_ativo_quem_somos" size="30" placeholder="<?php echo HtmlEncode($quem_somos->bool_ativo_quem_somos->getPlaceHolder()) ?>" value="<?php echo $quem_somos->bool_ativo_quem_somos->EditValue ?>"<?php echo $quem_somos->bool_ativo_quem_somos->editAttributes() ?>>
</span>
<?php echo $quem_somos->bool_ativo_quem_somos->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$quem_somos_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $quem_somos_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $quem_somos_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$quem_somos_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$quem_somos_edit->terminate();
?>
