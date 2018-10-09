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
$estado_add = new estado_add();

// Run the page
$estado_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$estado_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var festadoadd = currentForm = new ew.Form("festadoadd", "add");

// Validate form
festadoadd.validate = function() {
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
		<?php if ($estado_add->descricao_estado->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_estado");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->descricao_estado->caption(), $estado->descricao_estado->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($estado_add->sigla_estado->Required) { ?>
			elm = this.getElements("x" + infix + "_sigla_estado");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->sigla_estado->caption(), $estado->sigla_estado->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($estado_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->usuario_id->caption(), $estado->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($estado->usuario_id->errorMessage()) ?>");
		<?php if ($estado_add->bool_ativo_estado->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_estado");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->bool_ativo_estado->caption(), $estado->bool_ativo_estado->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_estado");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($estado->bool_ativo_estado->errorMessage()) ?>");

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
festadoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
festadoadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $estado_add->showPageHeader(); ?>
<?php
$estado_add->showMessage();
?>
<form name="festadoadd" id="festadoadd" class="<?php echo $estado_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($estado_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $estado_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="estado">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$estado_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($estado->descricao_estado->Visible) { // descricao_estado ?>
	<div id="r_descricao_estado" class="form-group row">
		<label id="elh_estado_descricao_estado" for="x_descricao_estado" class="<?php echo $estado_add->LeftColumnClass ?>"><?php echo $estado->descricao_estado->caption() ?><?php echo ($estado->descricao_estado->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_add->RightColumnClass ?>"><div<?php echo $estado->descricao_estado->cellAttributes() ?>>
<span id="el_estado_descricao_estado">
<input type="text" data-table="estado" data-field="x_descricao_estado" name="x_descricao_estado" id="x_descricao_estado" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($estado->descricao_estado->getPlaceHolder()) ?>" value="<?php echo $estado->descricao_estado->EditValue ?>"<?php echo $estado->descricao_estado->editAttributes() ?>>
</span>
<?php echo $estado->descricao_estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($estado->sigla_estado->Visible) { // sigla_estado ?>
	<div id="r_sigla_estado" class="form-group row">
		<label id="elh_estado_sigla_estado" for="x_sigla_estado" class="<?php echo $estado_add->LeftColumnClass ?>"><?php echo $estado->sigla_estado->caption() ?><?php echo ($estado->sigla_estado->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_add->RightColumnClass ?>"><div<?php echo $estado->sigla_estado->cellAttributes() ?>>
<span id="el_estado_sigla_estado">
<input type="text" data-table="estado" data-field="x_sigla_estado" name="x_sigla_estado" id="x_sigla_estado" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($estado->sigla_estado->getPlaceHolder()) ?>" value="<?php echo $estado->sigla_estado->EditValue ?>"<?php echo $estado->sigla_estado->editAttributes() ?>>
</span>
<?php echo $estado->sigla_estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($estado->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_estado_usuario_id" for="x_usuario_id" class="<?php echo $estado_add->LeftColumnClass ?>"><?php echo $estado->usuario_id->caption() ?><?php echo ($estado->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_add->RightColumnClass ?>"><div<?php echo $estado->usuario_id->cellAttributes() ?>>
<span id="el_estado_usuario_id">
<input type="text" data-table="estado" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($estado->usuario_id->getPlaceHolder()) ?>" value="<?php echo $estado->usuario_id->EditValue ?>"<?php echo $estado->usuario_id->editAttributes() ?>>
</span>
<?php echo $estado->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($estado->bool_ativo_estado->Visible) { // bool_ativo_estado ?>
	<div id="r_bool_ativo_estado" class="form-group row">
		<label id="elh_estado_bool_ativo_estado" for="x_bool_ativo_estado" class="<?php echo $estado_add->LeftColumnClass ?>"><?php echo $estado->bool_ativo_estado->caption() ?><?php echo ($estado->bool_ativo_estado->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_add->RightColumnClass ?>"><div<?php echo $estado->bool_ativo_estado->cellAttributes() ?>>
<span id="el_estado_bool_ativo_estado">
<input type="text" data-table="estado" data-field="x_bool_ativo_estado" name="x_bool_ativo_estado" id="x_bool_ativo_estado" size="30" placeholder="<?php echo HtmlEncode($estado->bool_ativo_estado->getPlaceHolder()) ?>" value="<?php echo $estado->bool_ativo_estado->EditValue ?>"<?php echo $estado->bool_ativo_estado->editAttributes() ?>>
</span>
<?php echo $estado->bool_ativo_estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$estado_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $estado_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $estado_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$estado_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$estado_add->terminate();
?>
