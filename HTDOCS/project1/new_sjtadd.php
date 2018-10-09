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
$new_sjt_add = new new_sjt_add();

// Run the page
$new_sjt_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$new_sjt_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fnew_sjtadd = currentForm = new ew.Form("fnew_sjtadd", "add");

// Validate form
fnew_sjtadd.validate = function() {
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
		<?php if ($new_sjt_add->descricao_new_sjt->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_new_sjt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $new_sjt->descricao_new_sjt->caption(), $new_sjt->descricao_new_sjt->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($new_sjt_add->imagem_demonstrativa_new_sjt->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_demonstrativa_new_sjt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $new_sjt->imagem_demonstrativa_new_sjt->caption(), $new_sjt->imagem_demonstrativa_new_sjt->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($new_sjt_add->numero_edicao_new_sjt->Required) { ?>
			elm = this.getElements("x" + infix + "_numero_edicao_new_sjt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $new_sjt->numero_edicao_new_sjt->caption(), $new_sjt->numero_edicao_new_sjt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_numero_edicao_new_sjt");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($new_sjt->numero_edicao_new_sjt->errorMessage()) ?>");
		<?php if ($new_sjt_add->data_atualizacao_new_sjt->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_new_sjt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $new_sjt->data_atualizacao_new_sjt->caption(), $new_sjt->data_atualizacao_new_sjt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_new_sjt");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($new_sjt->data_atualizacao_new_sjt->errorMessage()) ?>");
		<?php if ($new_sjt_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $new_sjt->usuario_id->caption(), $new_sjt->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($new_sjt->usuario_id->errorMessage()) ?>");
		<?php if ($new_sjt_add->bool_ativo_new_sjt->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_new_sjt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $new_sjt->bool_ativo_new_sjt->caption(), $new_sjt->bool_ativo_new_sjt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_new_sjt");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($new_sjt->bool_ativo_new_sjt->errorMessage()) ?>");

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
fnew_sjtadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnew_sjtadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $new_sjt_add->showPageHeader(); ?>
<?php
$new_sjt_add->showMessage();
?>
<form name="fnew_sjtadd" id="fnew_sjtadd" class="<?php echo $new_sjt_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($new_sjt_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $new_sjt_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="new_sjt">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$new_sjt_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($new_sjt->descricao_new_sjt->Visible) { // descricao_new_sjt ?>
	<div id="r_descricao_new_sjt" class="form-group row">
		<label id="elh_new_sjt_descricao_new_sjt" for="x_descricao_new_sjt" class="<?php echo $new_sjt_add->LeftColumnClass ?>"><?php echo $new_sjt->descricao_new_sjt->caption() ?><?php echo ($new_sjt->descricao_new_sjt->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $new_sjt_add->RightColumnClass ?>"><div<?php echo $new_sjt->descricao_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_descricao_new_sjt">
<input type="text" data-table="new_sjt" data-field="x_descricao_new_sjt" name="x_descricao_new_sjt" id="x_descricao_new_sjt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($new_sjt->descricao_new_sjt->getPlaceHolder()) ?>" value="<?php echo $new_sjt->descricao_new_sjt->EditValue ?>"<?php echo $new_sjt->descricao_new_sjt->editAttributes() ?>>
</span>
<?php echo $new_sjt->descricao_new_sjt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($new_sjt->imagem_demonstrativa_new_sjt->Visible) { // imagem_demonstrativa_new_sjt ?>
	<div id="r_imagem_demonstrativa_new_sjt" class="form-group row">
		<label id="elh_new_sjt_imagem_demonstrativa_new_sjt" for="x_imagem_demonstrativa_new_sjt" class="<?php echo $new_sjt_add->LeftColumnClass ?>"><?php echo $new_sjt->imagem_demonstrativa_new_sjt->caption() ?><?php echo ($new_sjt->imagem_demonstrativa_new_sjt->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $new_sjt_add->RightColumnClass ?>"><div<?php echo $new_sjt->imagem_demonstrativa_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_imagem_demonstrativa_new_sjt">
<input type="text" data-table="new_sjt" data-field="x_imagem_demonstrativa_new_sjt" name="x_imagem_demonstrativa_new_sjt" id="x_imagem_demonstrativa_new_sjt" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($new_sjt->imagem_demonstrativa_new_sjt->getPlaceHolder()) ?>" value="<?php echo $new_sjt->imagem_demonstrativa_new_sjt->EditValue ?>"<?php echo $new_sjt->imagem_demonstrativa_new_sjt->editAttributes() ?>>
</span>
<?php echo $new_sjt->imagem_demonstrativa_new_sjt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($new_sjt->numero_edicao_new_sjt->Visible) { // numero_edicao_new_sjt ?>
	<div id="r_numero_edicao_new_sjt" class="form-group row">
		<label id="elh_new_sjt_numero_edicao_new_sjt" for="x_numero_edicao_new_sjt" class="<?php echo $new_sjt_add->LeftColumnClass ?>"><?php echo $new_sjt->numero_edicao_new_sjt->caption() ?><?php echo ($new_sjt->numero_edicao_new_sjt->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $new_sjt_add->RightColumnClass ?>"><div<?php echo $new_sjt->numero_edicao_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_numero_edicao_new_sjt">
<input type="text" data-table="new_sjt" data-field="x_numero_edicao_new_sjt" name="x_numero_edicao_new_sjt" id="x_numero_edicao_new_sjt" size="30" placeholder="<?php echo HtmlEncode($new_sjt->numero_edicao_new_sjt->getPlaceHolder()) ?>" value="<?php echo $new_sjt->numero_edicao_new_sjt->EditValue ?>"<?php echo $new_sjt->numero_edicao_new_sjt->editAttributes() ?>>
</span>
<?php echo $new_sjt->numero_edicao_new_sjt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($new_sjt->data_atualizacao_new_sjt->Visible) { // data_atualizacao_new_sjt ?>
	<div id="r_data_atualizacao_new_sjt" class="form-group row">
		<label id="elh_new_sjt_data_atualizacao_new_sjt" for="x_data_atualizacao_new_sjt" class="<?php echo $new_sjt_add->LeftColumnClass ?>"><?php echo $new_sjt->data_atualizacao_new_sjt->caption() ?><?php echo ($new_sjt->data_atualizacao_new_sjt->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $new_sjt_add->RightColumnClass ?>"><div<?php echo $new_sjt->data_atualizacao_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_data_atualizacao_new_sjt">
<input type="text" data-table="new_sjt" data-field="x_data_atualizacao_new_sjt" name="x_data_atualizacao_new_sjt" id="x_data_atualizacao_new_sjt" placeholder="<?php echo HtmlEncode($new_sjt->data_atualizacao_new_sjt->getPlaceHolder()) ?>" value="<?php echo $new_sjt->data_atualizacao_new_sjt->EditValue ?>"<?php echo $new_sjt->data_atualizacao_new_sjt->editAttributes() ?>>
</span>
<?php echo $new_sjt->data_atualizacao_new_sjt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($new_sjt->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_new_sjt_usuario_id" for="x_usuario_id" class="<?php echo $new_sjt_add->LeftColumnClass ?>"><?php echo $new_sjt->usuario_id->caption() ?><?php echo ($new_sjt->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $new_sjt_add->RightColumnClass ?>"><div<?php echo $new_sjt->usuario_id->cellAttributes() ?>>
<span id="el_new_sjt_usuario_id">
<input type="text" data-table="new_sjt" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($new_sjt->usuario_id->getPlaceHolder()) ?>" value="<?php echo $new_sjt->usuario_id->EditValue ?>"<?php echo $new_sjt->usuario_id->editAttributes() ?>>
</span>
<?php echo $new_sjt->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($new_sjt->bool_ativo_new_sjt->Visible) { // bool_ativo_new_sjt ?>
	<div id="r_bool_ativo_new_sjt" class="form-group row">
		<label id="elh_new_sjt_bool_ativo_new_sjt" for="x_bool_ativo_new_sjt" class="<?php echo $new_sjt_add->LeftColumnClass ?>"><?php echo $new_sjt->bool_ativo_new_sjt->caption() ?><?php echo ($new_sjt->bool_ativo_new_sjt->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $new_sjt_add->RightColumnClass ?>"><div<?php echo $new_sjt->bool_ativo_new_sjt->cellAttributes() ?>>
<span id="el_new_sjt_bool_ativo_new_sjt">
<input type="text" data-table="new_sjt" data-field="x_bool_ativo_new_sjt" name="x_bool_ativo_new_sjt" id="x_bool_ativo_new_sjt" size="30" placeholder="<?php echo HtmlEncode($new_sjt->bool_ativo_new_sjt->getPlaceHolder()) ?>" value="<?php echo $new_sjt->bool_ativo_new_sjt->EditValue ?>"<?php echo $new_sjt->bool_ativo_new_sjt->editAttributes() ?>>
</span>
<?php echo $new_sjt->bool_ativo_new_sjt->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$new_sjt_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $new_sjt_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $new_sjt_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$new_sjt_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$new_sjt_add->terminate();
?>
