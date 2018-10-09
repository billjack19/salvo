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
$item_orcamento_add = new item_orcamento_add();

// Run the page
$item_orcamento_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_orcamento_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fitem_orcamentoadd = currentForm = new ew.Form("fitem_orcamentoadd", "add");

// Validate form
fitem_orcamentoadd.validate = function() {
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
		<?php if ($item_orcamento_add->data_lanc_item_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_data_lanc_item_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item_orcamento->data_lanc_item_orcamento->caption(), $item_orcamento->data_lanc_item_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_lanc_item_orcamento");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item_orcamento->data_lanc_item_orcamento->errorMessage()) ?>");
		<?php if ($item_orcamento_add->orcamento_id->Required) { ?>
			elm = this.getElements("x" + infix + "_orcamento_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item_orcamento->orcamento_id->caption(), $item_orcamento->orcamento_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_orcamento_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item_orcamento->orcamento_id->errorMessage()) ?>");
		<?php if ($item_orcamento_add->item_id->Required) { ?>
			elm = this.getElements("x" + infix + "_item_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item_orcamento->item_id->caption(), $item_orcamento->item_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_item_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item_orcamento->item_id->errorMessage()) ?>");
		<?php if ($item_orcamento_add->quantidade_item_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_quantidade_item_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item_orcamento->quantidade_item_orcamento->caption(), $item_orcamento->quantidade_item_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_quantidade_item_orcamento");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item_orcamento->quantidade_item_orcamento->errorMessage()) ?>");
		<?php if ($item_orcamento_add->total_item_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_total_item_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item_orcamento->total_item_orcamento->caption(), $item_orcamento->total_item_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_total_item_orcamento");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item_orcamento->total_item_orcamento->errorMessage()) ?>");
		<?php if ($item_orcamento_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item_orcamento->usuario_id->caption(), $item_orcamento->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item_orcamento->usuario_id->errorMessage()) ?>");
		<?php if ($item_orcamento_add->bool_ativo_item_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_item_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $item_orcamento->bool_ativo_item_orcamento->caption(), $item_orcamento->bool_ativo_item_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_item_orcamento");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($item_orcamento->bool_ativo_item_orcamento->errorMessage()) ?>");

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
fitem_orcamentoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitem_orcamentoadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $item_orcamento_add->showPageHeader(); ?>
<?php
$item_orcamento_add->showMessage();
?>
<form name="fitem_orcamentoadd" id="fitem_orcamentoadd" class="<?php echo $item_orcamento_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_orcamento_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_orcamento_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item_orcamento">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$item_orcamento_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($item_orcamento->data_lanc_item_orcamento->Visible) { // data_lanc_item_orcamento ?>
	<div id="r_data_lanc_item_orcamento" class="form-group row">
		<label id="elh_item_orcamento_data_lanc_item_orcamento" for="x_data_lanc_item_orcamento" class="<?php echo $item_orcamento_add->LeftColumnClass ?>"><?php echo $item_orcamento->data_lanc_item_orcamento->caption() ?><?php echo ($item_orcamento->data_lanc_item_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_orcamento_add->RightColumnClass ?>"><div<?php echo $item_orcamento->data_lanc_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_data_lanc_item_orcamento">
<input type="text" data-table="item_orcamento" data-field="x_data_lanc_item_orcamento" name="x_data_lanc_item_orcamento" id="x_data_lanc_item_orcamento" placeholder="<?php echo HtmlEncode($item_orcamento->data_lanc_item_orcamento->getPlaceHolder()) ?>" value="<?php echo $item_orcamento->data_lanc_item_orcamento->EditValue ?>"<?php echo $item_orcamento->data_lanc_item_orcamento->editAttributes() ?>>
</span>
<?php echo $item_orcamento->data_lanc_item_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item_orcamento->orcamento_id->Visible) { // orcamento_id ?>
	<div id="r_orcamento_id" class="form-group row">
		<label id="elh_item_orcamento_orcamento_id" for="x_orcamento_id" class="<?php echo $item_orcamento_add->LeftColumnClass ?>"><?php echo $item_orcamento->orcamento_id->caption() ?><?php echo ($item_orcamento->orcamento_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_orcamento_add->RightColumnClass ?>"><div<?php echo $item_orcamento->orcamento_id->cellAttributes() ?>>
<span id="el_item_orcamento_orcamento_id">
<input type="text" data-table="item_orcamento" data-field="x_orcamento_id" name="x_orcamento_id" id="x_orcamento_id" size="30" placeholder="<?php echo HtmlEncode($item_orcamento->orcamento_id->getPlaceHolder()) ?>" value="<?php echo $item_orcamento->orcamento_id->EditValue ?>"<?php echo $item_orcamento->orcamento_id->editAttributes() ?>>
</span>
<?php echo $item_orcamento->orcamento_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item_orcamento->item_id->Visible) { // item_id ?>
	<div id="r_item_id" class="form-group row">
		<label id="elh_item_orcamento_item_id" for="x_item_id" class="<?php echo $item_orcamento_add->LeftColumnClass ?>"><?php echo $item_orcamento->item_id->caption() ?><?php echo ($item_orcamento->item_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_orcamento_add->RightColumnClass ?>"><div<?php echo $item_orcamento->item_id->cellAttributes() ?>>
<span id="el_item_orcamento_item_id">
<input type="text" data-table="item_orcamento" data-field="x_item_id" name="x_item_id" id="x_item_id" size="30" placeholder="<?php echo HtmlEncode($item_orcamento->item_id->getPlaceHolder()) ?>" value="<?php echo $item_orcamento->item_id->EditValue ?>"<?php echo $item_orcamento->item_id->editAttributes() ?>>
</span>
<?php echo $item_orcamento->item_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item_orcamento->quantidade_item_orcamento->Visible) { // quantidade_item_orcamento ?>
	<div id="r_quantidade_item_orcamento" class="form-group row">
		<label id="elh_item_orcamento_quantidade_item_orcamento" for="x_quantidade_item_orcamento" class="<?php echo $item_orcamento_add->LeftColumnClass ?>"><?php echo $item_orcamento->quantidade_item_orcamento->caption() ?><?php echo ($item_orcamento->quantidade_item_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_orcamento_add->RightColumnClass ?>"><div<?php echo $item_orcamento->quantidade_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_quantidade_item_orcamento">
<input type="text" data-table="item_orcamento" data-field="x_quantidade_item_orcamento" name="x_quantidade_item_orcamento" id="x_quantidade_item_orcamento" size="30" placeholder="<?php echo HtmlEncode($item_orcamento->quantidade_item_orcamento->getPlaceHolder()) ?>" value="<?php echo $item_orcamento->quantidade_item_orcamento->EditValue ?>"<?php echo $item_orcamento->quantidade_item_orcamento->editAttributes() ?>>
</span>
<?php echo $item_orcamento->quantidade_item_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item_orcamento->total_item_orcamento->Visible) { // total_item_orcamento ?>
	<div id="r_total_item_orcamento" class="form-group row">
		<label id="elh_item_orcamento_total_item_orcamento" for="x_total_item_orcamento" class="<?php echo $item_orcamento_add->LeftColumnClass ?>"><?php echo $item_orcamento->total_item_orcamento->caption() ?><?php echo ($item_orcamento->total_item_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_orcamento_add->RightColumnClass ?>"><div<?php echo $item_orcamento->total_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_total_item_orcamento">
<input type="text" data-table="item_orcamento" data-field="x_total_item_orcamento" name="x_total_item_orcamento" id="x_total_item_orcamento" size="30" placeholder="<?php echo HtmlEncode($item_orcamento->total_item_orcamento->getPlaceHolder()) ?>" value="<?php echo $item_orcamento->total_item_orcamento->EditValue ?>"<?php echo $item_orcamento->total_item_orcamento->editAttributes() ?>>
</span>
<?php echo $item_orcamento->total_item_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item_orcamento->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_item_orcamento_usuario_id" for="x_usuario_id" class="<?php echo $item_orcamento_add->LeftColumnClass ?>"><?php echo $item_orcamento->usuario_id->caption() ?><?php echo ($item_orcamento->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_orcamento_add->RightColumnClass ?>"><div<?php echo $item_orcamento->usuario_id->cellAttributes() ?>>
<span id="el_item_orcamento_usuario_id">
<input type="text" data-table="item_orcamento" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($item_orcamento->usuario_id->getPlaceHolder()) ?>" value="<?php echo $item_orcamento->usuario_id->EditValue ?>"<?php echo $item_orcamento->usuario_id->editAttributes() ?>>
</span>
<?php echo $item_orcamento->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($item_orcamento->bool_ativo_item_orcamento->Visible) { // bool_ativo_item_orcamento ?>
	<div id="r_bool_ativo_item_orcamento" class="form-group row">
		<label id="elh_item_orcamento_bool_ativo_item_orcamento" for="x_bool_ativo_item_orcamento" class="<?php echo $item_orcamento_add->LeftColumnClass ?>"><?php echo $item_orcamento->bool_ativo_item_orcamento->caption() ?><?php echo ($item_orcamento->bool_ativo_item_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $item_orcamento_add->RightColumnClass ?>"><div<?php echo $item_orcamento->bool_ativo_item_orcamento->cellAttributes() ?>>
<span id="el_item_orcamento_bool_ativo_item_orcamento">
<input type="text" data-table="item_orcamento" data-field="x_bool_ativo_item_orcamento" name="x_bool_ativo_item_orcamento" id="x_bool_ativo_item_orcamento" size="30" placeholder="<?php echo HtmlEncode($item_orcamento->bool_ativo_item_orcamento->getPlaceHolder()) ?>" value="<?php echo $item_orcamento->bool_ativo_item_orcamento->EditValue ?>"<?php echo $item_orcamento->bool_ativo_item_orcamento->editAttributes() ?>>
</span>
<?php echo $item_orcamento->bool_ativo_item_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$item_orcamento_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $item_orcamento_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $item_orcamento_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$item_orcamento_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$item_orcamento_add->terminate();
?>
