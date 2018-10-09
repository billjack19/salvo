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
$situacao_edit = new situacao_edit();

// Run the page
$situacao_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$situacao_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fsituacaoedit = currentForm = new ew.Form("fsituacaoedit", "edit");

// Validate form
fsituacaoedit.validate = function() {
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
		<?php if ($situacao_edit->id_situacao->Required) { ?>
			elm = this.getElements("x" + infix + "_id_situacao");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $situacao->id_situacao->caption(), $situacao->id_situacao->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($situacao_edit->descricao_situacao->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_situacao");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $situacao->descricao_situacao->caption(), $situacao->descricao_situacao->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($situacao_edit->cor_situacao->Required) { ?>
			elm = this.getElements("x" + infix + "_cor_situacao");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $situacao->cor_situacao->caption(), $situacao->cor_situacao->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($situacao_edit->data_atualizacao_situacao->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_situacao");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $situacao->data_atualizacao_situacao->caption(), $situacao->data_atualizacao_situacao->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_situacao");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($situacao->data_atualizacao_situacao->errorMessage()) ?>");
		<?php if ($situacao_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $situacao->usuario_id->caption(), $situacao->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($situacao->usuario_id->errorMessage()) ?>");
		<?php if ($situacao_edit->bool_ativo_situacao->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_situacao");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $situacao->bool_ativo_situacao->caption(), $situacao->bool_ativo_situacao->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_situacao");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($situacao->bool_ativo_situacao->errorMessage()) ?>");

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
fsituacaoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsituacaoedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $situacao_edit->showPageHeader(); ?>
<?php
$situacao_edit->showMessage();
?>
<form name="fsituacaoedit" id="fsituacaoedit" class="<?php echo $situacao_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($situacao_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $situacao_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="situacao">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$situacao_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($situacao->id_situacao->Visible) { // id_situacao ?>
	<div id="r_id_situacao" class="form-group row">
		<label id="elh_situacao_id_situacao" class="<?php echo $situacao_edit->LeftColumnClass ?>"><?php echo $situacao->id_situacao->caption() ?><?php echo ($situacao->id_situacao->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $situacao_edit->RightColumnClass ?>"><div<?php echo $situacao->id_situacao->cellAttributes() ?>>
<span id="el_situacao_id_situacao">
<span<?php echo $situacao->id_situacao->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($situacao->id_situacao->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="situacao" data-field="x_id_situacao" name="x_id_situacao" id="x_id_situacao" value="<?php echo HtmlEncode($situacao->id_situacao->CurrentValue) ?>">
<?php echo $situacao->id_situacao->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($situacao->descricao_situacao->Visible) { // descricao_situacao ?>
	<div id="r_descricao_situacao" class="form-group row">
		<label id="elh_situacao_descricao_situacao" for="x_descricao_situacao" class="<?php echo $situacao_edit->LeftColumnClass ?>"><?php echo $situacao->descricao_situacao->caption() ?><?php echo ($situacao->descricao_situacao->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $situacao_edit->RightColumnClass ?>"><div<?php echo $situacao->descricao_situacao->cellAttributes() ?>>
<span id="el_situacao_descricao_situacao">
<input type="text" data-table="situacao" data-field="x_descricao_situacao" name="x_descricao_situacao" id="x_descricao_situacao" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($situacao->descricao_situacao->getPlaceHolder()) ?>" value="<?php echo $situacao->descricao_situacao->EditValue ?>"<?php echo $situacao->descricao_situacao->editAttributes() ?>>
</span>
<?php echo $situacao->descricao_situacao->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($situacao->cor_situacao->Visible) { // cor_situacao ?>
	<div id="r_cor_situacao" class="form-group row">
		<label id="elh_situacao_cor_situacao" for="x_cor_situacao" class="<?php echo $situacao_edit->LeftColumnClass ?>"><?php echo $situacao->cor_situacao->caption() ?><?php echo ($situacao->cor_situacao->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $situacao_edit->RightColumnClass ?>"><div<?php echo $situacao->cor_situacao->cellAttributes() ?>>
<span id="el_situacao_cor_situacao">
<input type="text" data-table="situacao" data-field="x_cor_situacao" name="x_cor_situacao" id="x_cor_situacao" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($situacao->cor_situacao->getPlaceHolder()) ?>" value="<?php echo $situacao->cor_situacao->EditValue ?>"<?php echo $situacao->cor_situacao->editAttributes() ?>>
</span>
<?php echo $situacao->cor_situacao->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($situacao->data_atualizacao_situacao->Visible) { // data_atualizacao_situacao ?>
	<div id="r_data_atualizacao_situacao" class="form-group row">
		<label id="elh_situacao_data_atualizacao_situacao" for="x_data_atualizacao_situacao" class="<?php echo $situacao_edit->LeftColumnClass ?>"><?php echo $situacao->data_atualizacao_situacao->caption() ?><?php echo ($situacao->data_atualizacao_situacao->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $situacao_edit->RightColumnClass ?>"><div<?php echo $situacao->data_atualizacao_situacao->cellAttributes() ?>>
<span id="el_situacao_data_atualizacao_situacao">
<input type="text" data-table="situacao" data-field="x_data_atualizacao_situacao" name="x_data_atualizacao_situacao" id="x_data_atualizacao_situacao" placeholder="<?php echo HtmlEncode($situacao->data_atualizacao_situacao->getPlaceHolder()) ?>" value="<?php echo $situacao->data_atualizacao_situacao->EditValue ?>"<?php echo $situacao->data_atualizacao_situacao->editAttributes() ?>>
</span>
<?php echo $situacao->data_atualizacao_situacao->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($situacao->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_situacao_usuario_id" for="x_usuario_id" class="<?php echo $situacao_edit->LeftColumnClass ?>"><?php echo $situacao->usuario_id->caption() ?><?php echo ($situacao->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $situacao_edit->RightColumnClass ?>"><div<?php echo $situacao->usuario_id->cellAttributes() ?>>
<span id="el_situacao_usuario_id">
<input type="text" data-table="situacao" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($situacao->usuario_id->getPlaceHolder()) ?>" value="<?php echo $situacao->usuario_id->EditValue ?>"<?php echo $situacao->usuario_id->editAttributes() ?>>
</span>
<?php echo $situacao->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($situacao->bool_ativo_situacao->Visible) { // bool_ativo_situacao ?>
	<div id="r_bool_ativo_situacao" class="form-group row">
		<label id="elh_situacao_bool_ativo_situacao" for="x_bool_ativo_situacao" class="<?php echo $situacao_edit->LeftColumnClass ?>"><?php echo $situacao->bool_ativo_situacao->caption() ?><?php echo ($situacao->bool_ativo_situacao->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $situacao_edit->RightColumnClass ?>"><div<?php echo $situacao->bool_ativo_situacao->cellAttributes() ?>>
<span id="el_situacao_bool_ativo_situacao">
<input type="text" data-table="situacao" data-field="x_bool_ativo_situacao" name="x_bool_ativo_situacao" id="x_bool_ativo_situacao" size="30" placeholder="<?php echo HtmlEncode($situacao->bool_ativo_situacao->getPlaceHolder()) ?>" value="<?php echo $situacao->bool_ativo_situacao->EditValue ?>"<?php echo $situacao->bool_ativo_situacao->editAttributes() ?>>
</span>
<?php echo $situacao->bool_ativo_situacao->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$situacao_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $situacao_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $situacao_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$situacao_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$situacao_edit->terminate();
?>
