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
$upload_arq_add = new upload_arq_add();

// Run the page
$upload_arq_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$upload_arq_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fupload_arqadd = currentForm = new ew.Form("fupload_arqadd", "add");

// Validate form
fupload_arqadd.validate = function() {
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
		<?php if ($upload_arq_add->descricao_upload_arq->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_upload_arq");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $upload_arq->descricao_upload_arq->caption(), $upload_arq->descricao_upload_arq->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($upload_arq_add->tipo_upload_arq->Required) { ?>
			elm = this.getElements("x" + infix + "_tipo_upload_arq");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $upload_arq->tipo_upload_arq->caption(), $upload_arq->tipo_upload_arq->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($upload_arq_add->data_atualizacaoupload_arq->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacaoupload_arq");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $upload_arq->data_atualizacaoupload_arq->caption(), $upload_arq->data_atualizacaoupload_arq->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacaoupload_arq");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($upload_arq->data_atualizacaoupload_arq->errorMessage()) ?>");
		<?php if ($upload_arq_add->bool_ativo_upload_arq->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_upload_arq");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $upload_arq->bool_ativo_upload_arq->caption(), $upload_arq->bool_ativo_upload_arq->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_upload_arq");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($upload_arq->bool_ativo_upload_arq->errorMessage()) ?>");

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
fupload_arqadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fupload_arqadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $upload_arq_add->showPageHeader(); ?>
<?php
$upload_arq_add->showMessage();
?>
<form name="fupload_arqadd" id="fupload_arqadd" class="<?php echo $upload_arq_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($upload_arq_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $upload_arq_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="upload_arq">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$upload_arq_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($upload_arq->descricao_upload_arq->Visible) { // descricao_upload_arq ?>
	<div id="r_descricao_upload_arq" class="form-group row">
		<label id="elh_upload_arq_descricao_upload_arq" for="x_descricao_upload_arq" class="<?php echo $upload_arq_add->LeftColumnClass ?>"><?php echo $upload_arq->descricao_upload_arq->caption() ?><?php echo ($upload_arq->descricao_upload_arq->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $upload_arq_add->RightColumnClass ?>"><div<?php echo $upload_arq->descricao_upload_arq->cellAttributes() ?>>
<span id="el_upload_arq_descricao_upload_arq">
<input type="text" data-table="upload_arq" data-field="x_descricao_upload_arq" name="x_descricao_upload_arq" id="x_descricao_upload_arq" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($upload_arq->descricao_upload_arq->getPlaceHolder()) ?>" value="<?php echo $upload_arq->descricao_upload_arq->EditValue ?>"<?php echo $upload_arq->descricao_upload_arq->editAttributes() ?>>
</span>
<?php echo $upload_arq->descricao_upload_arq->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($upload_arq->tipo_upload_arq->Visible) { // tipo_upload_arq ?>
	<div id="r_tipo_upload_arq" class="form-group row">
		<label id="elh_upload_arq_tipo_upload_arq" for="x_tipo_upload_arq" class="<?php echo $upload_arq_add->LeftColumnClass ?>"><?php echo $upload_arq->tipo_upload_arq->caption() ?><?php echo ($upload_arq->tipo_upload_arq->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $upload_arq_add->RightColumnClass ?>"><div<?php echo $upload_arq->tipo_upload_arq->cellAttributes() ?>>
<span id="el_upload_arq_tipo_upload_arq">
<input type="text" data-table="upload_arq" data-field="x_tipo_upload_arq" name="x_tipo_upload_arq" id="x_tipo_upload_arq" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($upload_arq->tipo_upload_arq->getPlaceHolder()) ?>" value="<?php echo $upload_arq->tipo_upload_arq->EditValue ?>"<?php echo $upload_arq->tipo_upload_arq->editAttributes() ?>>
</span>
<?php echo $upload_arq->tipo_upload_arq->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($upload_arq->data_atualizacaoupload_arq->Visible) { // data_atualizacaoupload_arq ?>
	<div id="r_data_atualizacaoupload_arq" class="form-group row">
		<label id="elh_upload_arq_data_atualizacaoupload_arq" for="x_data_atualizacaoupload_arq" class="<?php echo $upload_arq_add->LeftColumnClass ?>"><?php echo $upload_arq->data_atualizacaoupload_arq->caption() ?><?php echo ($upload_arq->data_atualizacaoupload_arq->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $upload_arq_add->RightColumnClass ?>"><div<?php echo $upload_arq->data_atualizacaoupload_arq->cellAttributes() ?>>
<span id="el_upload_arq_data_atualizacaoupload_arq">
<input type="text" data-table="upload_arq" data-field="x_data_atualizacaoupload_arq" name="x_data_atualizacaoupload_arq" id="x_data_atualizacaoupload_arq" placeholder="<?php echo HtmlEncode($upload_arq->data_atualizacaoupload_arq->getPlaceHolder()) ?>" value="<?php echo $upload_arq->data_atualizacaoupload_arq->EditValue ?>"<?php echo $upload_arq->data_atualizacaoupload_arq->editAttributes() ?>>
</span>
<?php echo $upload_arq->data_atualizacaoupload_arq->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($upload_arq->bool_ativo_upload_arq->Visible) { // bool_ativo_upload_arq ?>
	<div id="r_bool_ativo_upload_arq" class="form-group row">
		<label id="elh_upload_arq_bool_ativo_upload_arq" for="x_bool_ativo_upload_arq" class="<?php echo $upload_arq_add->LeftColumnClass ?>"><?php echo $upload_arq->bool_ativo_upload_arq->caption() ?><?php echo ($upload_arq->bool_ativo_upload_arq->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $upload_arq_add->RightColumnClass ?>"><div<?php echo $upload_arq->bool_ativo_upload_arq->cellAttributes() ?>>
<span id="el_upload_arq_bool_ativo_upload_arq">
<input type="text" data-table="upload_arq" data-field="x_bool_ativo_upload_arq" name="x_bool_ativo_upload_arq" id="x_bool_ativo_upload_arq" size="30" placeholder="<?php echo HtmlEncode($upload_arq->bool_ativo_upload_arq->getPlaceHolder()) ?>" value="<?php echo $upload_arq->bool_ativo_upload_arq->EditValue ?>"<?php echo $upload_arq->bool_ativo_upload_arq->editAttributes() ?>>
</span>
<?php echo $upload_arq->bool_ativo_upload_arq->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$upload_arq_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $upload_arq_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $upload_arq_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$upload_arq_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$upload_arq_add->terminate();
?>
