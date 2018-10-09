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
$relatorio_tabela_add = new relatorio_tabela_add();

// Run the page
$relatorio_tabela_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorio_tabela_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var frelatorio_tabelaadd = currentForm = new ew.Form("frelatorio_tabelaadd", "add");

// Validate form
frelatorio_tabelaadd.validate = function() {
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
		<?php if ($relatorio_tabela_add->descricao_relatorio_tabela->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_relatorio_tabela");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorio_tabela->descricao_relatorio_tabela->caption(), $relatorio_tabela->descricao_relatorio_tabela->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($relatorio_tabela_add->data_atualizacao_relatorio_tabela->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_relatorio_tabela");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorio_tabela->data_atualizacao_relatorio_tabela->caption(), $relatorio_tabela->data_atualizacao_relatorio_tabela->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_relatorio_tabela");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($relatorio_tabela->data_atualizacao_relatorio_tabela->errorMessage()) ?>");
		<?php if ($relatorio_tabela_add->bool_ativo_relatorio_tabela->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_relatorio_tabela");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $relatorio_tabela->bool_ativo_relatorio_tabela->caption(), $relatorio_tabela->bool_ativo_relatorio_tabela->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_relatorio_tabela");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($relatorio_tabela->bool_ativo_relatorio_tabela->errorMessage()) ?>");

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
frelatorio_tabelaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatorio_tabelaadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $relatorio_tabela_add->showPageHeader(); ?>
<?php
$relatorio_tabela_add->showMessage();
?>
<form name="frelatorio_tabelaadd" id="frelatorio_tabelaadd" class="<?php echo $relatorio_tabela_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorio_tabela_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorio_tabela_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorio_tabela">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$relatorio_tabela_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($relatorio_tabela->descricao_relatorio_tabela->Visible) { // descricao_relatorio_tabela ?>
	<div id="r_descricao_relatorio_tabela" class="form-group row">
		<label id="elh_relatorio_tabela_descricao_relatorio_tabela" for="x_descricao_relatorio_tabela" class="<?php echo $relatorio_tabela_add->LeftColumnClass ?>"><?php echo $relatorio_tabela->descricao_relatorio_tabela->caption() ?><?php echo ($relatorio_tabela->descricao_relatorio_tabela->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorio_tabela_add->RightColumnClass ?>"><div<?php echo $relatorio_tabela->descricao_relatorio_tabela->cellAttributes() ?>>
<span id="el_relatorio_tabela_descricao_relatorio_tabela">
<input type="text" data-table="relatorio_tabela" data-field="x_descricao_relatorio_tabela" name="x_descricao_relatorio_tabela" id="x_descricao_relatorio_tabela" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($relatorio_tabela->descricao_relatorio_tabela->getPlaceHolder()) ?>" value="<?php echo $relatorio_tabela->descricao_relatorio_tabela->EditValue ?>"<?php echo $relatorio_tabela->descricao_relatorio_tabela->editAttributes() ?>>
</span>
<?php echo $relatorio_tabela->descricao_relatorio_tabela->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorio_tabela->data_atualizacao_relatorio_tabela->Visible) { // data_atualizacao_relatorio_tabela ?>
	<div id="r_data_atualizacao_relatorio_tabela" class="form-group row">
		<label id="elh_relatorio_tabela_data_atualizacao_relatorio_tabela" for="x_data_atualizacao_relatorio_tabela" class="<?php echo $relatorio_tabela_add->LeftColumnClass ?>"><?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->caption() ?><?php echo ($relatorio_tabela->data_atualizacao_relatorio_tabela->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorio_tabela_add->RightColumnClass ?>"><div<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->cellAttributes() ?>>
<span id="el_relatorio_tabela_data_atualizacao_relatorio_tabela">
<input type="text" data-table="relatorio_tabela" data-field="x_data_atualizacao_relatorio_tabela" name="x_data_atualizacao_relatorio_tabela" id="x_data_atualizacao_relatorio_tabela" placeholder="<?php echo HtmlEncode($relatorio_tabela->data_atualizacao_relatorio_tabela->getPlaceHolder()) ?>" value="<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->EditValue ?>"<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->editAttributes() ?>>
</span>
<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($relatorio_tabela->bool_ativo_relatorio_tabela->Visible) { // bool_ativo_relatorio_tabela ?>
	<div id="r_bool_ativo_relatorio_tabela" class="form-group row">
		<label id="elh_relatorio_tabela_bool_ativo_relatorio_tabela" for="x_bool_ativo_relatorio_tabela" class="<?php echo $relatorio_tabela_add->LeftColumnClass ?>"><?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->caption() ?><?php echo ($relatorio_tabela->bool_ativo_relatorio_tabela->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $relatorio_tabela_add->RightColumnClass ?>"><div<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->cellAttributes() ?>>
<span id="el_relatorio_tabela_bool_ativo_relatorio_tabela">
<input type="text" data-table="relatorio_tabela" data-field="x_bool_ativo_relatorio_tabela" name="x_bool_ativo_relatorio_tabela" id="x_bool_ativo_relatorio_tabela" size="30" placeholder="<?php echo HtmlEncode($relatorio_tabela->bool_ativo_relatorio_tabela->getPlaceHolder()) ?>" value="<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->EditValue ?>"<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->editAttributes() ?>>
</span>
<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$relatorio_tabela_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $relatorio_tabela_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $relatorio_tabela_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$relatorio_tabela_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$relatorio_tabela_add->terminate();
?>
