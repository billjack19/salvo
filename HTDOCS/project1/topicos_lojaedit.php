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
$topicos_loja_edit = new topicos_loja_edit();

// Run the page
$topicos_loja_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$topicos_loja_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftopicos_lojaedit = currentForm = new ew.Form("ftopicos_lojaedit", "edit");

// Validate form
ftopicos_lojaedit.validate = function() {
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
		<?php if ($topicos_loja_edit->id_topicos_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_id_topicos_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $topicos_loja->id_topicos_loja->caption(), $topicos_loja->id_topicos_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($topicos_loja_edit->titulo_topicos_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_topicos_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $topicos_loja->titulo_topicos_loja->caption(), $topicos_loja->titulo_topicos_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($topicos_loja_edit->descricao_topicos_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_topicos_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $topicos_loja->descricao_topicos_loja->caption(), $topicos_loja->descricao_topicos_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($topicos_loja_edit->loja_id->Required) { ?>
			elm = this.getElements("x" + infix + "_loja_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $topicos_loja->loja_id->caption(), $topicos_loja->loja_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_loja_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($topicos_loja->loja_id->errorMessage()) ?>");
		<?php if ($topicos_loja_edit->data_atualizacao_topicos_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_topicos_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $topicos_loja->data_atualizacao_topicos_loja->caption(), $topicos_loja->data_atualizacao_topicos_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_topicos_loja");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($topicos_loja->data_atualizacao_topicos_loja->errorMessage()) ?>");
		<?php if ($topicos_loja_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $topicos_loja->usuario_id->caption(), $topicos_loja->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($topicos_loja->usuario_id->errorMessage()) ?>");
		<?php if ($topicos_loja_edit->bool_ativo_topicos_loja->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_topicos_loja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $topicos_loja->bool_ativo_topicos_loja->caption(), $topicos_loja->bool_ativo_topicos_loja->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_topicos_loja");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($topicos_loja->bool_ativo_topicos_loja->errorMessage()) ?>");

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
ftopicos_lojaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftopicos_lojaedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $topicos_loja_edit->showPageHeader(); ?>
<?php
$topicos_loja_edit->showMessage();
?>
<form name="ftopicos_lojaedit" id="ftopicos_lojaedit" class="<?php echo $topicos_loja_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($topicos_loja_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $topicos_loja_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="topicos_loja">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$topicos_loja_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($topicos_loja->id_topicos_loja->Visible) { // id_topicos_loja ?>
	<div id="r_id_topicos_loja" class="form-group row">
		<label id="elh_topicos_loja_id_topicos_loja" class="<?php echo $topicos_loja_edit->LeftColumnClass ?>"><?php echo $topicos_loja->id_topicos_loja->caption() ?><?php echo ($topicos_loja->id_topicos_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $topicos_loja_edit->RightColumnClass ?>"><div<?php echo $topicos_loja->id_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_id_topicos_loja">
<span<?php echo $topicos_loja->id_topicos_loja->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($topicos_loja->id_topicos_loja->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="topicos_loja" data-field="x_id_topicos_loja" name="x_id_topicos_loja" id="x_id_topicos_loja" value="<?php echo HtmlEncode($topicos_loja->id_topicos_loja->CurrentValue) ?>">
<?php echo $topicos_loja->id_topicos_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($topicos_loja->titulo_topicos_loja->Visible) { // titulo_topicos_loja ?>
	<div id="r_titulo_topicos_loja" class="form-group row">
		<label id="elh_topicos_loja_titulo_topicos_loja" for="x_titulo_topicos_loja" class="<?php echo $topicos_loja_edit->LeftColumnClass ?>"><?php echo $topicos_loja->titulo_topicos_loja->caption() ?><?php echo ($topicos_loja->titulo_topicos_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $topicos_loja_edit->RightColumnClass ?>"><div<?php echo $topicos_loja->titulo_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_titulo_topicos_loja">
<input type="text" data-table="topicos_loja" data-field="x_titulo_topicos_loja" name="x_titulo_topicos_loja" id="x_titulo_topicos_loja" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($topicos_loja->titulo_topicos_loja->getPlaceHolder()) ?>" value="<?php echo $topicos_loja->titulo_topicos_loja->EditValue ?>"<?php echo $topicos_loja->titulo_topicos_loja->editAttributes() ?>>
</span>
<?php echo $topicos_loja->titulo_topicos_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($topicos_loja->descricao_topicos_loja->Visible) { // descricao_topicos_loja ?>
	<div id="r_descricao_topicos_loja" class="form-group row">
		<label id="elh_topicos_loja_descricao_topicos_loja" for="x_descricao_topicos_loja" class="<?php echo $topicos_loja_edit->LeftColumnClass ?>"><?php echo $topicos_loja->descricao_topicos_loja->caption() ?><?php echo ($topicos_loja->descricao_topicos_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $topicos_loja_edit->RightColumnClass ?>"><div<?php echo $topicos_loja->descricao_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_descricao_topicos_loja">
<input type="text" data-table="topicos_loja" data-field="x_descricao_topicos_loja" name="x_descricao_topicos_loja" id="x_descricao_topicos_loja" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($topicos_loja->descricao_topicos_loja->getPlaceHolder()) ?>" value="<?php echo $topicos_loja->descricao_topicos_loja->EditValue ?>"<?php echo $topicos_loja->descricao_topicos_loja->editAttributes() ?>>
</span>
<?php echo $topicos_loja->descricao_topicos_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($topicos_loja->loja_id->Visible) { // loja_id ?>
	<div id="r_loja_id" class="form-group row">
		<label id="elh_topicos_loja_loja_id" for="x_loja_id" class="<?php echo $topicos_loja_edit->LeftColumnClass ?>"><?php echo $topicos_loja->loja_id->caption() ?><?php echo ($topicos_loja->loja_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $topicos_loja_edit->RightColumnClass ?>"><div<?php echo $topicos_loja->loja_id->cellAttributes() ?>>
<span id="el_topicos_loja_loja_id">
<input type="text" data-table="topicos_loja" data-field="x_loja_id" name="x_loja_id" id="x_loja_id" size="30" placeholder="<?php echo HtmlEncode($topicos_loja->loja_id->getPlaceHolder()) ?>" value="<?php echo $topicos_loja->loja_id->EditValue ?>"<?php echo $topicos_loja->loja_id->editAttributes() ?>>
</span>
<?php echo $topicos_loja->loja_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($topicos_loja->data_atualizacao_topicos_loja->Visible) { // data_atualizacao_topicos_loja ?>
	<div id="r_data_atualizacao_topicos_loja" class="form-group row">
		<label id="elh_topicos_loja_data_atualizacao_topicos_loja" for="x_data_atualizacao_topicos_loja" class="<?php echo $topicos_loja_edit->LeftColumnClass ?>"><?php echo $topicos_loja->data_atualizacao_topicos_loja->caption() ?><?php echo ($topicos_loja->data_atualizacao_topicos_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $topicos_loja_edit->RightColumnClass ?>"><div<?php echo $topicos_loja->data_atualizacao_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_data_atualizacao_topicos_loja">
<input type="text" data-table="topicos_loja" data-field="x_data_atualizacao_topicos_loja" name="x_data_atualizacao_topicos_loja" id="x_data_atualizacao_topicos_loja" placeholder="<?php echo HtmlEncode($topicos_loja->data_atualizacao_topicos_loja->getPlaceHolder()) ?>" value="<?php echo $topicos_loja->data_atualizacao_topicos_loja->EditValue ?>"<?php echo $topicos_loja->data_atualizacao_topicos_loja->editAttributes() ?>>
</span>
<?php echo $topicos_loja->data_atualizacao_topicos_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($topicos_loja->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_topicos_loja_usuario_id" for="x_usuario_id" class="<?php echo $topicos_loja_edit->LeftColumnClass ?>"><?php echo $topicos_loja->usuario_id->caption() ?><?php echo ($topicos_loja->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $topicos_loja_edit->RightColumnClass ?>"><div<?php echo $topicos_loja->usuario_id->cellAttributes() ?>>
<span id="el_topicos_loja_usuario_id">
<input type="text" data-table="topicos_loja" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($topicos_loja->usuario_id->getPlaceHolder()) ?>" value="<?php echo $topicos_loja->usuario_id->EditValue ?>"<?php echo $topicos_loja->usuario_id->editAttributes() ?>>
</span>
<?php echo $topicos_loja->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($topicos_loja->bool_ativo_topicos_loja->Visible) { // bool_ativo_topicos_loja ?>
	<div id="r_bool_ativo_topicos_loja" class="form-group row">
		<label id="elh_topicos_loja_bool_ativo_topicos_loja" for="x_bool_ativo_topicos_loja" class="<?php echo $topicos_loja_edit->LeftColumnClass ?>"><?php echo $topicos_loja->bool_ativo_topicos_loja->caption() ?><?php echo ($topicos_loja->bool_ativo_topicos_loja->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $topicos_loja_edit->RightColumnClass ?>"><div<?php echo $topicos_loja->bool_ativo_topicos_loja->cellAttributes() ?>>
<span id="el_topicos_loja_bool_ativo_topicos_loja">
<input type="text" data-table="topicos_loja" data-field="x_bool_ativo_topicos_loja" name="x_bool_ativo_topicos_loja" id="x_bool_ativo_topicos_loja" size="30" placeholder="<?php echo HtmlEncode($topicos_loja->bool_ativo_topicos_loja->getPlaceHolder()) ?>" value="<?php echo $topicos_loja->bool_ativo_topicos_loja->EditValue ?>"<?php echo $topicos_loja->bool_ativo_topicos_loja->editAttributes() ?>>
</span>
<?php echo $topicos_loja->bool_ativo_topicos_loja->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$topicos_loja_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $topicos_loja_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $topicos_loja_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$topicos_loja_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$topicos_loja_edit->terminate();
?>
