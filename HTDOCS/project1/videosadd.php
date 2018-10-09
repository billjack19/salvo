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
$videos_add = new videos_add();

// Run the page
$videos_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$videos_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fvideosadd = currentForm = new ew.Form("fvideosadd", "add");

// Validate form
fvideosadd.validate = function() {
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
		<?php if ($videos_add->descricao_videos->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_videos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $videos->descricao_videos->caption(), $videos->descricao_videos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($videos_add->link_videos->Required) { ?>
			elm = this.getElements("x" + infix + "_link_videos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $videos->link_videos->caption(), $videos->link_videos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($videos_add->pagina_principal_id->Required) { ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $videos->pagina_principal_id->caption(), $videos->pagina_principal_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pagina_principal_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($videos->pagina_principal_id->errorMessage()) ?>");
		<?php if ($videos_add->data_atualizacao_videos->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_videos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $videos->data_atualizacao_videos->caption(), $videos->data_atualizacao_videos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_videos");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($videos->data_atualizacao_videos->errorMessage()) ?>");
		<?php if ($videos_add->bool_ativo_videos->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_videos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $videos->bool_ativo_videos->caption(), $videos->bool_ativo_videos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_videos");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($videos->bool_ativo_videos->errorMessage()) ?>");

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
fvideosadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvideosadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $videos_add->showPageHeader(); ?>
<?php
$videos_add->showMessage();
?>
<form name="fvideosadd" id="fvideosadd" class="<?php echo $videos_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($videos_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $videos_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="videos">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$videos_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($videos->descricao_videos->Visible) { // descricao_videos ?>
	<div id="r_descricao_videos" class="form-group row">
		<label id="elh_videos_descricao_videos" for="x_descricao_videos" class="<?php echo $videos_add->LeftColumnClass ?>"><?php echo $videos->descricao_videos->caption() ?><?php echo ($videos->descricao_videos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $videos_add->RightColumnClass ?>"><div<?php echo $videos->descricao_videos->cellAttributes() ?>>
<span id="el_videos_descricao_videos">
<textarea data-table="videos" data-field="x_descricao_videos" name="x_descricao_videos" id="x_descricao_videos" cols="35" rows="4" placeholder="<?php echo HtmlEncode($videos->descricao_videos->getPlaceHolder()) ?>"<?php echo $videos->descricao_videos->editAttributes() ?>><?php echo $videos->descricao_videos->EditValue ?></textarea>
</span>
<?php echo $videos->descricao_videos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($videos->link_videos->Visible) { // link_videos ?>
	<div id="r_link_videos" class="form-group row">
		<label id="elh_videos_link_videos" for="x_link_videos" class="<?php echo $videos_add->LeftColumnClass ?>"><?php echo $videos->link_videos->caption() ?><?php echo ($videos->link_videos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $videos_add->RightColumnClass ?>"><div<?php echo $videos->link_videos->cellAttributes() ?>>
<span id="el_videos_link_videos">
<input type="text" data-table="videos" data-field="x_link_videos" name="x_link_videos" id="x_link_videos" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($videos->link_videos->getPlaceHolder()) ?>" value="<?php echo $videos->link_videos->EditValue ?>"<?php echo $videos->link_videos->editAttributes() ?>>
</span>
<?php echo $videos->link_videos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($videos->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<div id="r_pagina_principal_id" class="form-group row">
		<label id="elh_videos_pagina_principal_id" for="x_pagina_principal_id" class="<?php echo $videos_add->LeftColumnClass ?>"><?php echo $videos->pagina_principal_id->caption() ?><?php echo ($videos->pagina_principal_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $videos_add->RightColumnClass ?>"><div<?php echo $videos->pagina_principal_id->cellAttributes() ?>>
<span id="el_videos_pagina_principal_id">
<input type="text" data-table="videos" data-field="x_pagina_principal_id" name="x_pagina_principal_id" id="x_pagina_principal_id" size="30" placeholder="<?php echo HtmlEncode($videos->pagina_principal_id->getPlaceHolder()) ?>" value="<?php echo $videos->pagina_principal_id->EditValue ?>"<?php echo $videos->pagina_principal_id->editAttributes() ?>>
</span>
<?php echo $videos->pagina_principal_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($videos->data_atualizacao_videos->Visible) { // data_atualizacao_videos ?>
	<div id="r_data_atualizacao_videos" class="form-group row">
		<label id="elh_videos_data_atualizacao_videos" for="x_data_atualizacao_videos" class="<?php echo $videos_add->LeftColumnClass ?>"><?php echo $videos->data_atualizacao_videos->caption() ?><?php echo ($videos->data_atualizacao_videos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $videos_add->RightColumnClass ?>"><div<?php echo $videos->data_atualizacao_videos->cellAttributes() ?>>
<span id="el_videos_data_atualizacao_videos">
<input type="text" data-table="videos" data-field="x_data_atualizacao_videos" name="x_data_atualizacao_videos" id="x_data_atualizacao_videos" placeholder="<?php echo HtmlEncode($videos->data_atualizacao_videos->getPlaceHolder()) ?>" value="<?php echo $videos->data_atualizacao_videos->EditValue ?>"<?php echo $videos->data_atualizacao_videos->editAttributes() ?>>
</span>
<?php echo $videos->data_atualizacao_videos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($videos->bool_ativo_videos->Visible) { // bool_ativo_videos ?>
	<div id="r_bool_ativo_videos" class="form-group row">
		<label id="elh_videos_bool_ativo_videos" for="x_bool_ativo_videos" class="<?php echo $videos_add->LeftColumnClass ?>"><?php echo $videos->bool_ativo_videos->caption() ?><?php echo ($videos->bool_ativo_videos->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $videos_add->RightColumnClass ?>"><div<?php echo $videos->bool_ativo_videos->cellAttributes() ?>>
<span id="el_videos_bool_ativo_videos">
<input type="text" data-table="videos" data-field="x_bool_ativo_videos" name="x_bool_ativo_videos" id="x_bool_ativo_videos" size="30" placeholder="<?php echo HtmlEncode($videos->bool_ativo_videos->getPlaceHolder()) ?>" value="<?php echo $videos->bool_ativo_videos->EditValue ?>"<?php echo $videos->bool_ativo_videos->editAttributes() ?>>
</span>
<?php echo $videos->bool_ativo_videos->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$videos_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $videos_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $videos_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$videos_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$videos_add->terminate();
?>
