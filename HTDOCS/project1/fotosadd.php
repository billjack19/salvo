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
$fotos_add = new fotos_add();

// Run the page
$fotos_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$fotos_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ffotosadd = currentForm = new ew.Form("ffotosadd", "add");

// Validate form
ffotosadd.validate = function() {
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
		<?php if ($fotos_add->descricao_fotos->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_fotos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $fotos->descricao_fotos->caption(), $fotos->descricao_fotos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($fotos_add->imagem_fotos->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_fotos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $fotos->imagem_fotos->caption(), $fotos->imagem_fotos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($fotos_add->item_id->Required) { ?>
			elm = this.getElements("x" + infix + "_item_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $fotos->item_id->caption(), $fotos->item_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_item_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($fotos->item_id->errorMessage()) ?>");
		<?php if ($fotos_add->data_atualizacao_fotos->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_fotos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $fotos->data_atualizacao_fotos->caption(), $fotos->data_atualizacao_fotos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_fotos");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($fotos->data_atualizacao_fotos->errorMessage()) ?>");
		<?php if ($fotos_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $fotos->usuario_id->caption(), $fotos->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($fotos->usuario_id->errorMessage()) ?>");
		<?php if ($fotos_add->bool_ativo_fotos->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_fotos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $fotos->bool_ativo_fotos->caption(), $fotos->bool_ativo_fotos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_fotos");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($fotos->bool_ativo_fotos->errorMessage()) ?>");

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
ffotosadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ffotosadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $fotos_add->showPageHeader(); ?>
<?php
$fotos_add->showMessage();
?>
<form name="ffotosadd" id="ffotosadd" class="<?php echo $fotos_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($fotos_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $fotos_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="fotos">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$fotos_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($fotos->descricao_fotos->Visible) { // descricao_fotos ?>
	<div id="r_descricao_fotos" class="form-group row">
		<label id="elh_fotos_descricao_fotos" for="x_descricao_fotos" class="<?php echo $fotos_add->LeftColumnClass ?>"><?php echo $fotos->descricao_fotos->caption() ?><?php echo ($fotos->descricao_fotos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $fotos_add->RightColumnClass ?>"><div<?php echo $fotos->descricao_fotos->cellAttributes() ?>>
<span id="el_fotos_descricao_fotos">
<input type="text" data-table="fotos" data-field="x_descricao_fotos" name="x_descricao_fotos" id="x_descricao_fotos" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($fotos->descricao_fotos->getPlaceHolder()) ?>" value="<?php echo $fotos->descricao_fotos->EditValue ?>"<?php echo $fotos->descricao_fotos->editAttributes() ?>>
</span>
<?php echo $fotos->descricao_fotos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($fotos->imagem_fotos->Visible) { // imagem_fotos ?>
	<div id="r_imagem_fotos" class="form-group row">
		<label id="elh_fotos_imagem_fotos" for="x_imagem_fotos" class="<?php echo $fotos_add->LeftColumnClass ?>"><?php echo $fotos->imagem_fotos->caption() ?><?php echo ($fotos->imagem_fotos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $fotos_add->RightColumnClass ?>"><div<?php echo $fotos->imagem_fotos->cellAttributes() ?>>
<span id="el_fotos_imagem_fotos">
<input type="text" data-table="fotos" data-field="x_imagem_fotos" name="x_imagem_fotos" id="x_imagem_fotos" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($fotos->imagem_fotos->getPlaceHolder()) ?>" value="<?php echo $fotos->imagem_fotos->EditValue ?>"<?php echo $fotos->imagem_fotos->editAttributes() ?>>
</span>
<?php echo $fotos->imagem_fotos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($fotos->item_id->Visible) { // item_id ?>
	<div id="r_item_id" class="form-group row">
		<label id="elh_fotos_item_id" for="x_item_id" class="<?php echo $fotos_add->LeftColumnClass ?>"><?php echo $fotos->item_id->caption() ?><?php echo ($fotos->item_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $fotos_add->RightColumnClass ?>"><div<?php echo $fotos->item_id->cellAttributes() ?>>
<span id="el_fotos_item_id">
<input type="text" data-table="fotos" data-field="x_item_id" name="x_item_id" id="x_item_id" size="30" placeholder="<?php echo HtmlEncode($fotos->item_id->getPlaceHolder()) ?>" value="<?php echo $fotos->item_id->EditValue ?>"<?php echo $fotos->item_id->editAttributes() ?>>
</span>
<?php echo $fotos->item_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($fotos->data_atualizacao_fotos->Visible) { // data_atualizacao_fotos ?>
	<div id="r_data_atualizacao_fotos" class="form-group row">
		<label id="elh_fotos_data_atualizacao_fotos" for="x_data_atualizacao_fotos" class="<?php echo $fotos_add->LeftColumnClass ?>"><?php echo $fotos->data_atualizacao_fotos->caption() ?><?php echo ($fotos->data_atualizacao_fotos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $fotos_add->RightColumnClass ?>"><div<?php echo $fotos->data_atualizacao_fotos->cellAttributes() ?>>
<span id="el_fotos_data_atualizacao_fotos">
<input type="text" data-table="fotos" data-field="x_data_atualizacao_fotos" name="x_data_atualizacao_fotos" id="x_data_atualizacao_fotos" placeholder="<?php echo HtmlEncode($fotos->data_atualizacao_fotos->getPlaceHolder()) ?>" value="<?php echo $fotos->data_atualizacao_fotos->EditValue ?>"<?php echo $fotos->data_atualizacao_fotos->editAttributes() ?>>
</span>
<?php echo $fotos->data_atualizacao_fotos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($fotos->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_fotos_usuario_id" for="x_usuario_id" class="<?php echo $fotos_add->LeftColumnClass ?>"><?php echo $fotos->usuario_id->caption() ?><?php echo ($fotos->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $fotos_add->RightColumnClass ?>"><div<?php echo $fotos->usuario_id->cellAttributes() ?>>
<span id="el_fotos_usuario_id">
<input type="text" data-table="fotos" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($fotos->usuario_id->getPlaceHolder()) ?>" value="<?php echo $fotos->usuario_id->EditValue ?>"<?php echo $fotos->usuario_id->editAttributes() ?>>
</span>
<?php echo $fotos->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($fotos->bool_ativo_fotos->Visible) { // bool_ativo_fotos ?>
	<div id="r_bool_ativo_fotos" class="form-group row">
		<label id="elh_fotos_bool_ativo_fotos" for="x_bool_ativo_fotos" class="<?php echo $fotos_add->LeftColumnClass ?>"><?php echo $fotos->bool_ativo_fotos->caption() ?><?php echo ($fotos->bool_ativo_fotos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $fotos_add->RightColumnClass ?>"><div<?php echo $fotos->bool_ativo_fotos->cellAttributes() ?>>
<span id="el_fotos_bool_ativo_fotos">
<input type="text" data-table="fotos" data-field="x_bool_ativo_fotos" name="x_bool_ativo_fotos" id="x_bool_ativo_fotos" size="30" placeholder="<?php echo HtmlEncode($fotos->bool_ativo_fotos->getPlaceHolder()) ?>" value="<?php echo $fotos->bool_ativo_fotos->EditValue ?>"<?php echo $fotos->bool_ativo_fotos->editAttributes() ?>>
</span>
<?php echo $fotos->bool_ativo_fotos->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$fotos_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $fotos_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $fotos_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$fotos_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$fotos_add->terminate();
?>
