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
$grupo_add = new grupo_add();

// Run the page
$grupo_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$grupo_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fgrupoadd = currentForm = new ew.Form("fgrupoadd", "add");

// Validate form
fgrupoadd.validate = function() {
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
		<?php if ($grupo_add->descricao_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $grupo->descricao_grupo->caption(), $grupo->descricao_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($grupo_add->imagem_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $grupo->imagem_grupo->caption(), $grupo->imagem_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($grupo_add->data_atualizacao_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $grupo->data_atualizacao_grupo->caption(), $grupo->data_atualizacao_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_grupo");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($grupo->data_atualizacao_grupo->errorMessage()) ?>");
		<?php if ($grupo_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $grupo->usuario_id->caption(), $grupo->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($grupo->usuario_id->errorMessage()) ?>");
		<?php if ($grupo_add->bool_ativo_grupo->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_grupo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $grupo->bool_ativo_grupo->caption(), $grupo->bool_ativo_grupo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_grupo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($grupo->bool_ativo_grupo->errorMessage()) ?>");

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
fgrupoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgrupoadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $grupo_add->showPageHeader(); ?>
<?php
$grupo_add->showMessage();
?>
<form name="fgrupoadd" id="fgrupoadd" class="<?php echo $grupo_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($grupo_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $grupo_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="grupo">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$grupo_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($grupo->descricao_grupo->Visible) { // descricao_grupo ?>
	<div id="r_descricao_grupo" class="form-group row">
		<label id="elh_grupo_descricao_grupo" for="x_descricao_grupo" class="<?php echo $grupo_add->LeftColumnClass ?>"><?php echo $grupo->descricao_grupo->caption() ?><?php echo ($grupo->descricao_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $grupo_add->RightColumnClass ?>"><div<?php echo $grupo->descricao_grupo->cellAttributes() ?>>
<span id="el_grupo_descricao_grupo">
<input type="text" data-table="grupo" data-field="x_descricao_grupo" name="x_descricao_grupo" id="x_descricao_grupo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($grupo->descricao_grupo->getPlaceHolder()) ?>" value="<?php echo $grupo->descricao_grupo->EditValue ?>"<?php echo $grupo->descricao_grupo->editAttributes() ?>>
</span>
<?php echo $grupo->descricao_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($grupo->imagem_grupo->Visible) { // imagem_grupo ?>
	<div id="r_imagem_grupo" class="form-group row">
		<label id="elh_grupo_imagem_grupo" for="x_imagem_grupo" class="<?php echo $grupo_add->LeftColumnClass ?>"><?php echo $grupo->imagem_grupo->caption() ?><?php echo ($grupo->imagem_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $grupo_add->RightColumnClass ?>"><div<?php echo $grupo->imagem_grupo->cellAttributes() ?>>
<span id="el_grupo_imagem_grupo">
<input type="text" data-table="grupo" data-field="x_imagem_grupo" name="x_imagem_grupo" id="x_imagem_grupo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($grupo->imagem_grupo->getPlaceHolder()) ?>" value="<?php echo $grupo->imagem_grupo->EditValue ?>"<?php echo $grupo->imagem_grupo->editAttributes() ?>>
</span>
<?php echo $grupo->imagem_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($grupo->data_atualizacao_grupo->Visible) { // data_atualizacao_grupo ?>
	<div id="r_data_atualizacao_grupo" class="form-group row">
		<label id="elh_grupo_data_atualizacao_grupo" for="x_data_atualizacao_grupo" class="<?php echo $grupo_add->LeftColumnClass ?>"><?php echo $grupo->data_atualizacao_grupo->caption() ?><?php echo ($grupo->data_atualizacao_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $grupo_add->RightColumnClass ?>"><div<?php echo $grupo->data_atualizacao_grupo->cellAttributes() ?>>
<span id="el_grupo_data_atualizacao_grupo">
<input type="text" data-table="grupo" data-field="x_data_atualizacao_grupo" name="x_data_atualizacao_grupo" id="x_data_atualizacao_grupo" placeholder="<?php echo HtmlEncode($grupo->data_atualizacao_grupo->getPlaceHolder()) ?>" value="<?php echo $grupo->data_atualizacao_grupo->EditValue ?>"<?php echo $grupo->data_atualizacao_grupo->editAttributes() ?>>
</span>
<?php echo $grupo->data_atualizacao_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($grupo->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_grupo_usuario_id" for="x_usuario_id" class="<?php echo $grupo_add->LeftColumnClass ?>"><?php echo $grupo->usuario_id->caption() ?><?php echo ($grupo->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $grupo_add->RightColumnClass ?>"><div<?php echo $grupo->usuario_id->cellAttributes() ?>>
<span id="el_grupo_usuario_id">
<input type="text" data-table="grupo" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($grupo->usuario_id->getPlaceHolder()) ?>" value="<?php echo $grupo->usuario_id->EditValue ?>"<?php echo $grupo->usuario_id->editAttributes() ?>>
</span>
<?php echo $grupo->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($grupo->bool_ativo_grupo->Visible) { // bool_ativo_grupo ?>
	<div id="r_bool_ativo_grupo" class="form-group row">
		<label id="elh_grupo_bool_ativo_grupo" for="x_bool_ativo_grupo" class="<?php echo $grupo_add->LeftColumnClass ?>"><?php echo $grupo->bool_ativo_grupo->caption() ?><?php echo ($grupo->bool_ativo_grupo->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $grupo_add->RightColumnClass ?>"><div<?php echo $grupo->bool_ativo_grupo->cellAttributes() ?>>
<span id="el_grupo_bool_ativo_grupo">
<input type="text" data-table="grupo" data-field="x_bool_ativo_grupo" name="x_bool_ativo_grupo" id="x_bool_ativo_grupo" size="30" placeholder="<?php echo HtmlEncode($grupo->bool_ativo_grupo->getPlaceHolder()) ?>" value="<?php echo $grupo->bool_ativo_grupo->EditValue ?>"<?php echo $grupo->bool_ativo_grupo->editAttributes() ?>>
</span>
<?php echo $grupo->bool_ativo_grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$grupo_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $grupo_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $grupo_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$grupo_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$grupo_add->terminate();
?>
