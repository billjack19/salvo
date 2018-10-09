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
$orcamento_edit = new orcamento_edit();

// Run the page
$orcamento_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$orcamento_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var forcamentoedit = currentForm = new ew.Form("forcamentoedit", "edit");

// Validate form
forcamentoedit.validate = function() {
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
		<?php if ($orcamento_edit->id_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_id_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $orcamento->id_orcamento->caption(), $orcamento->id_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($orcamento_edit->descricao_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $orcamento->descricao_orcamento->caption(), $orcamento->descricao_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($orcamento_edit->cliente_site_id->Required) { ?>
			elm = this.getElements("x" + infix + "_cliente_site_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $orcamento->cliente_site_id->caption(), $orcamento->cliente_site_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_cliente_site_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($orcamento->cliente_site_id->errorMessage()) ?>");
		<?php if ($orcamento_edit->data_lanc_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_data_lanc_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $orcamento->data_lanc_orcamento->caption(), $orcamento->data_lanc_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_lanc_orcamento");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($orcamento->data_lanc_orcamento->errorMessage()) ?>");
		<?php if ($orcamento_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $orcamento->usuario_id->caption(), $orcamento->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($orcamento->usuario_id->errorMessage()) ?>");
		<?php if ($orcamento_edit->bool_ativo_orcamento->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_orcamento");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $orcamento->bool_ativo_orcamento->caption(), $orcamento->bool_ativo_orcamento->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_orcamento");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($orcamento->bool_ativo_orcamento->errorMessage()) ?>");

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
forcamentoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
forcamentoedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $orcamento_edit->showPageHeader(); ?>
<?php
$orcamento_edit->showMessage();
?>
<form name="forcamentoedit" id="forcamentoedit" class="<?php echo $orcamento_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($orcamento_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $orcamento_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="orcamento">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$orcamento_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($orcamento->id_orcamento->Visible) { // id_orcamento ?>
	<div id="r_id_orcamento" class="form-group row">
		<label id="elh_orcamento_id_orcamento" class="<?php echo $orcamento_edit->LeftColumnClass ?>"><?php echo $orcamento->id_orcamento->caption() ?><?php echo ($orcamento->id_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $orcamento_edit->RightColumnClass ?>"><div<?php echo $orcamento->id_orcamento->cellAttributes() ?>>
<span id="el_orcamento_id_orcamento">
<span<?php echo $orcamento->id_orcamento->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($orcamento->id_orcamento->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="orcamento" data-field="x_id_orcamento" name="x_id_orcamento" id="x_id_orcamento" value="<?php echo HtmlEncode($orcamento->id_orcamento->CurrentValue) ?>">
<?php echo $orcamento->id_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($orcamento->descricao_orcamento->Visible) { // descricao_orcamento ?>
	<div id="r_descricao_orcamento" class="form-group row">
		<label id="elh_orcamento_descricao_orcamento" for="x_descricao_orcamento" class="<?php echo $orcamento_edit->LeftColumnClass ?>"><?php echo $orcamento->descricao_orcamento->caption() ?><?php echo ($orcamento->descricao_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $orcamento_edit->RightColumnClass ?>"><div<?php echo $orcamento->descricao_orcamento->cellAttributes() ?>>
<span id="el_orcamento_descricao_orcamento">
<input type="text" data-table="orcamento" data-field="x_descricao_orcamento" name="x_descricao_orcamento" id="x_descricao_orcamento" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($orcamento->descricao_orcamento->getPlaceHolder()) ?>" value="<?php echo $orcamento->descricao_orcamento->EditValue ?>"<?php echo $orcamento->descricao_orcamento->editAttributes() ?>>
</span>
<?php echo $orcamento->descricao_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($orcamento->cliente_site_id->Visible) { // cliente_site_id ?>
	<div id="r_cliente_site_id" class="form-group row">
		<label id="elh_orcamento_cliente_site_id" for="x_cliente_site_id" class="<?php echo $orcamento_edit->LeftColumnClass ?>"><?php echo $orcamento->cliente_site_id->caption() ?><?php echo ($orcamento->cliente_site_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $orcamento_edit->RightColumnClass ?>"><div<?php echo $orcamento->cliente_site_id->cellAttributes() ?>>
<span id="el_orcamento_cliente_site_id">
<input type="text" data-table="orcamento" data-field="x_cliente_site_id" name="x_cliente_site_id" id="x_cliente_site_id" size="30" placeholder="<?php echo HtmlEncode($orcamento->cliente_site_id->getPlaceHolder()) ?>" value="<?php echo $orcamento->cliente_site_id->EditValue ?>"<?php echo $orcamento->cliente_site_id->editAttributes() ?>>
</span>
<?php echo $orcamento->cliente_site_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($orcamento->data_lanc_orcamento->Visible) { // data_lanc_orcamento ?>
	<div id="r_data_lanc_orcamento" class="form-group row">
		<label id="elh_orcamento_data_lanc_orcamento" for="x_data_lanc_orcamento" class="<?php echo $orcamento_edit->LeftColumnClass ?>"><?php echo $orcamento->data_lanc_orcamento->caption() ?><?php echo ($orcamento->data_lanc_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $orcamento_edit->RightColumnClass ?>"><div<?php echo $orcamento->data_lanc_orcamento->cellAttributes() ?>>
<span id="el_orcamento_data_lanc_orcamento">
<input type="text" data-table="orcamento" data-field="x_data_lanc_orcamento" name="x_data_lanc_orcamento" id="x_data_lanc_orcamento" placeholder="<?php echo HtmlEncode($orcamento->data_lanc_orcamento->getPlaceHolder()) ?>" value="<?php echo $orcamento->data_lanc_orcamento->EditValue ?>"<?php echo $orcamento->data_lanc_orcamento->editAttributes() ?>>
</span>
<?php echo $orcamento->data_lanc_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($orcamento->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_orcamento_usuario_id" for="x_usuario_id" class="<?php echo $orcamento_edit->LeftColumnClass ?>"><?php echo $orcamento->usuario_id->caption() ?><?php echo ($orcamento->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $orcamento_edit->RightColumnClass ?>"><div<?php echo $orcamento->usuario_id->cellAttributes() ?>>
<span id="el_orcamento_usuario_id">
<input type="text" data-table="orcamento" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($orcamento->usuario_id->getPlaceHolder()) ?>" value="<?php echo $orcamento->usuario_id->EditValue ?>"<?php echo $orcamento->usuario_id->editAttributes() ?>>
</span>
<?php echo $orcamento->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($orcamento->bool_ativo_orcamento->Visible) { // bool_ativo_orcamento ?>
	<div id="r_bool_ativo_orcamento" class="form-group row">
		<label id="elh_orcamento_bool_ativo_orcamento" for="x_bool_ativo_orcamento" class="<?php echo $orcamento_edit->LeftColumnClass ?>"><?php echo $orcamento->bool_ativo_orcamento->caption() ?><?php echo ($orcamento->bool_ativo_orcamento->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $orcamento_edit->RightColumnClass ?>"><div<?php echo $orcamento->bool_ativo_orcamento->cellAttributes() ?>>
<span id="el_orcamento_bool_ativo_orcamento">
<input type="text" data-table="orcamento" data-field="x_bool_ativo_orcamento" name="x_bool_ativo_orcamento" id="x_bool_ativo_orcamento" size="30" placeholder="<?php echo HtmlEncode($orcamento->bool_ativo_orcamento->getPlaceHolder()) ?>" value="<?php echo $orcamento->bool_ativo_orcamento->EditValue ?>"<?php echo $orcamento->bool_ativo_orcamento->editAttributes() ?>>
</span>
<?php echo $orcamento->bool_ativo_orcamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$orcamento_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $orcamento_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $orcamento_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$orcamento_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$orcamento_edit->terminate();
?>
