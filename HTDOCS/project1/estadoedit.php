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
$estado_edit = new estado_edit();

// Run the page
$estado_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$estado_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var festadoedit = currentForm = new ew.Form("festadoedit", "edit");

// Validate form
festadoedit.validate = function() {
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
		<?php if ($estado_edit->id_estado->Required) { ?>
			elm = this.getElements("x" + infix + "_id_estado");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->id_estado->caption(), $estado->id_estado->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($estado_edit->descricao_estado->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_estado");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->descricao_estado->caption(), $estado->descricao_estado->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($estado_edit->sigla_estado->Required) { ?>
			elm = this.getElements("x" + infix + "_sigla_estado");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->sigla_estado->caption(), $estado->sigla_estado->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($estado_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $estado->usuario_id->caption(), $estado->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($estado->usuario_id->errorMessage()) ?>");
		<?php if ($estado_edit->bool_ativo_estado->Required) { ?>
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
festadoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
festadoedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $estado_edit->showPageHeader(); ?>
<?php
$estado_edit->showMessage();
?>
<form name="festadoedit" id="festadoedit" class="<?php echo $estado_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($estado_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $estado_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="estado">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$estado_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($estado->id_estado->Visible) { // id_estado ?>
	<div id="r_id_estado" class="form-group row">
		<label id="elh_estado_id_estado" class="<?php echo $estado_edit->LeftColumnClass ?>"><?php echo $estado->id_estado->caption() ?><?php echo ($estado->id_estado->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_edit->RightColumnClass ?>"><div<?php echo $estado->id_estado->cellAttributes() ?>>
<span id="el_estado_id_estado">
<span<?php echo $estado->id_estado->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($estado->id_estado->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="estado" data-field="x_id_estado" name="x_id_estado" id="x_id_estado" value="<?php echo HtmlEncode($estado->id_estado->CurrentValue) ?>">
<?php echo $estado->id_estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($estado->descricao_estado->Visible) { // descricao_estado ?>
	<div id="r_descricao_estado" class="form-group row">
		<label id="elh_estado_descricao_estado" for="x_descricao_estado" class="<?php echo $estado_edit->LeftColumnClass ?>"><?php echo $estado->descricao_estado->caption() ?><?php echo ($estado->descricao_estado->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_edit->RightColumnClass ?>"><div<?php echo $estado->descricao_estado->cellAttributes() ?>>
<span id="el_estado_descricao_estado">
<input type="text" data-table="estado" data-field="x_descricao_estado" name="x_descricao_estado" id="x_descricao_estado" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($estado->descricao_estado->getPlaceHolder()) ?>" value="<?php echo $estado->descricao_estado->EditValue ?>"<?php echo $estado->descricao_estado->editAttributes() ?>>
</span>
<?php echo $estado->descricao_estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($estado->sigla_estado->Visible) { // sigla_estado ?>
	<div id="r_sigla_estado" class="form-group row">
		<label id="elh_estado_sigla_estado" for="x_sigla_estado" class="<?php echo $estado_edit->LeftColumnClass ?>"><?php echo $estado->sigla_estado->caption() ?><?php echo ($estado->sigla_estado->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_edit->RightColumnClass ?>"><div<?php echo $estado->sigla_estado->cellAttributes() ?>>
<span id="el_estado_sigla_estado">
<input type="text" data-table="estado" data-field="x_sigla_estado" name="x_sigla_estado" id="x_sigla_estado" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($estado->sigla_estado->getPlaceHolder()) ?>" value="<?php echo $estado->sigla_estado->EditValue ?>"<?php echo $estado->sigla_estado->editAttributes() ?>>
</span>
<?php echo $estado->sigla_estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($estado->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_estado_usuario_id" for="x_usuario_id" class="<?php echo $estado_edit->LeftColumnClass ?>"><?php echo $estado->usuario_id->caption() ?><?php echo ($estado->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_edit->RightColumnClass ?>"><div<?php echo $estado->usuario_id->cellAttributes() ?>>
<span id="el_estado_usuario_id">
<input type="text" data-table="estado" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($estado->usuario_id->getPlaceHolder()) ?>" value="<?php echo $estado->usuario_id->EditValue ?>"<?php echo $estado->usuario_id->editAttributes() ?>>
</span>
<?php echo $estado->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($estado->bool_ativo_estado->Visible) { // bool_ativo_estado ?>
	<div id="r_bool_ativo_estado" class="form-group row">
		<label id="elh_estado_bool_ativo_estado" for="x_bool_ativo_estado" class="<?php echo $estado_edit->LeftColumnClass ?>"><?php echo $estado->bool_ativo_estado->caption() ?><?php echo ($estado->bool_ativo_estado->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $estado_edit->RightColumnClass ?>"><div<?php echo $estado->bool_ativo_estado->cellAttributes() ?>>
<span id="el_estado_bool_ativo_estado">
<input type="text" data-table="estado" data-field="x_bool_ativo_estado" name="x_bool_ativo_estado" id="x_bool_ativo_estado" size="30" placeholder="<?php echo HtmlEncode($estado->bool_ativo_estado->getPlaceHolder()) ?>" value="<?php echo $estado->bool_ativo_estado->EditValue ?>"<?php echo $estado->bool_ativo_estado->editAttributes() ?>>
</span>
<?php echo $estado->bool_ativo_estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$estado_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $estado_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $estado_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$estado_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$estado_edit->terminate();
?>
