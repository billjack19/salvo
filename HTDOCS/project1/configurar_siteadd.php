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
$configurar_site_add = new configurar_site_add();

// Run the page
$configurar_site_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$configurar_site_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fconfigurar_siteadd = currentForm = new ew.Form("fconfigurar_siteadd", "add");

// Validate form
fconfigurar_siteadd.validate = function() {
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
		<?php if ($configurar_site_add->titulo_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->titulo_configurar_site->caption(), $configurar_site->titulo_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($configurar_site_add->titulo_menu_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_menu_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->titulo_menu_configurar_site->caption(), $configurar_site->titulo_menu_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($configurar_site_add->cor_pagina_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_cor_pagina_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->cor_pagina_configurar_site->caption(), $configurar_site->cor_pagina_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($configurar_site_add->contra_cor_pagina_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_contra_cor_pagina_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->contra_cor_pagina_configurar_site->caption(), $configurar_site->contra_cor_pagina_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($configurar_site_add->imagem_icone_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_icone_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->imagem_icone_configurar_site->caption(), $configurar_site->imagem_icone_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($configurar_site_add->imagem_logo_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_logo_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->imagem_logo_configurar_site->caption(), $configurar_site->imagem_logo_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($configurar_site_add->data_atualizacao_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->data_atualizacao_configurar_site->caption(), $configurar_site->data_atualizacao_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_configurar_site");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($configurar_site->data_atualizacao_configurar_site->errorMessage()) ?>");
		<?php if ($configurar_site_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->usuario_id->caption(), $configurar_site->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($configurar_site->usuario_id->errorMessage()) ?>");
		<?php if ($configurar_site_add->bool_ativo_configurar_site->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_configurar_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $configurar_site->bool_ativo_configurar_site->caption(), $configurar_site->bool_ativo_configurar_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_configurar_site");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($configurar_site->bool_ativo_configurar_site->errorMessage()) ?>");

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
fconfigurar_siteadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fconfigurar_siteadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $configurar_site_add->showPageHeader(); ?>
<?php
$configurar_site_add->showMessage();
?>
<form name="fconfigurar_siteadd" id="fconfigurar_siteadd" class="<?php echo $configurar_site_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($configurar_site_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $configurar_site_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="configurar_site">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$configurar_site_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($configurar_site->titulo_configurar_site->Visible) { // titulo_configurar_site ?>
	<div id="r_titulo_configurar_site" class="form-group row">
		<label id="elh_configurar_site_titulo_configurar_site" for="x_titulo_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->titulo_configurar_site->caption() ?><?php echo ($configurar_site->titulo_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->titulo_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_titulo_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_titulo_configurar_site" name="x_titulo_configurar_site" id="x_titulo_configurar_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($configurar_site->titulo_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->titulo_configurar_site->EditValue ?>"<?php echo $configurar_site->titulo_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->titulo_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->titulo_menu_configurar_site->Visible) { // titulo_menu_configurar_site ?>
	<div id="r_titulo_menu_configurar_site" class="form-group row">
		<label id="elh_configurar_site_titulo_menu_configurar_site" for="x_titulo_menu_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->titulo_menu_configurar_site->caption() ?><?php echo ($configurar_site->titulo_menu_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->titulo_menu_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_titulo_menu_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_titulo_menu_configurar_site" name="x_titulo_menu_configurar_site" id="x_titulo_menu_configurar_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($configurar_site->titulo_menu_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->titulo_menu_configurar_site->EditValue ?>"<?php echo $configurar_site->titulo_menu_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->titulo_menu_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->cor_pagina_configurar_site->Visible) { // cor_pagina_configurar_site ?>
	<div id="r_cor_pagina_configurar_site" class="form-group row">
		<label id="elh_configurar_site_cor_pagina_configurar_site" for="x_cor_pagina_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->cor_pagina_configurar_site->caption() ?><?php echo ($configurar_site->cor_pagina_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_cor_pagina_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_cor_pagina_configurar_site" name="x_cor_pagina_configurar_site" id="x_cor_pagina_configurar_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($configurar_site->cor_pagina_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->cor_pagina_configurar_site->EditValue ?>"<?php echo $configurar_site->cor_pagina_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->cor_pagina_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->contra_cor_pagina_configurar_site->Visible) { // contra_cor_pagina_configurar_site ?>
	<div id="r_contra_cor_pagina_configurar_site" class="form-group row">
		<label id="elh_configurar_site_contra_cor_pagina_configurar_site" for="x_contra_cor_pagina_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->contra_cor_pagina_configurar_site->caption() ?><?php echo ($configurar_site->contra_cor_pagina_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->contra_cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_contra_cor_pagina_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_contra_cor_pagina_configurar_site" name="x_contra_cor_pagina_configurar_site" id="x_contra_cor_pagina_configurar_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($configurar_site->contra_cor_pagina_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->contra_cor_pagina_configurar_site->EditValue ?>"<?php echo $configurar_site->contra_cor_pagina_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->contra_cor_pagina_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->imagem_icone_configurar_site->Visible) { // imagem_icone_configurar_site ?>
	<div id="r_imagem_icone_configurar_site" class="form-group row">
		<label id="elh_configurar_site_imagem_icone_configurar_site" for="x_imagem_icone_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->imagem_icone_configurar_site->caption() ?><?php echo ($configurar_site->imagem_icone_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->imagem_icone_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_imagem_icone_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_imagem_icone_configurar_site" name="x_imagem_icone_configurar_site" id="x_imagem_icone_configurar_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($configurar_site->imagem_icone_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->imagem_icone_configurar_site->EditValue ?>"<?php echo $configurar_site->imagem_icone_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->imagem_icone_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->imagem_logo_configurar_site->Visible) { // imagem_logo_configurar_site ?>
	<div id="r_imagem_logo_configurar_site" class="form-group row">
		<label id="elh_configurar_site_imagem_logo_configurar_site" for="x_imagem_logo_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->imagem_logo_configurar_site->caption() ?><?php echo ($configurar_site->imagem_logo_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->imagem_logo_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_imagem_logo_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_imagem_logo_configurar_site" name="x_imagem_logo_configurar_site" id="x_imagem_logo_configurar_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($configurar_site->imagem_logo_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->imagem_logo_configurar_site->EditValue ?>"<?php echo $configurar_site->imagem_logo_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->imagem_logo_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->data_atualizacao_configurar_site->Visible) { // data_atualizacao_configurar_site ?>
	<div id="r_data_atualizacao_configurar_site" class="form-group row">
		<label id="elh_configurar_site_data_atualizacao_configurar_site" for="x_data_atualizacao_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->data_atualizacao_configurar_site->caption() ?><?php echo ($configurar_site->data_atualizacao_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->data_atualizacao_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_data_atualizacao_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_data_atualizacao_configurar_site" name="x_data_atualizacao_configurar_site" id="x_data_atualizacao_configurar_site" placeholder="<?php echo HtmlEncode($configurar_site->data_atualizacao_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->data_atualizacao_configurar_site->EditValue ?>"<?php echo $configurar_site->data_atualizacao_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->data_atualizacao_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_configurar_site_usuario_id" for="x_usuario_id" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->usuario_id->caption() ?><?php echo ($configurar_site->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->usuario_id->cellAttributes() ?>>
<span id="el_configurar_site_usuario_id">
<input type="text" data-table="configurar_site" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($configurar_site->usuario_id->getPlaceHolder()) ?>" value="<?php echo $configurar_site->usuario_id->EditValue ?>"<?php echo $configurar_site->usuario_id->editAttributes() ?>>
</span>
<?php echo $configurar_site->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($configurar_site->bool_ativo_configurar_site->Visible) { // bool_ativo_configurar_site ?>
	<div id="r_bool_ativo_configurar_site" class="form-group row">
		<label id="elh_configurar_site_bool_ativo_configurar_site" for="x_bool_ativo_configurar_site" class="<?php echo $configurar_site_add->LeftColumnClass ?>"><?php echo $configurar_site->bool_ativo_configurar_site->caption() ?><?php echo ($configurar_site->bool_ativo_configurar_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $configurar_site_add->RightColumnClass ?>"><div<?php echo $configurar_site->bool_ativo_configurar_site->cellAttributes() ?>>
<span id="el_configurar_site_bool_ativo_configurar_site">
<input type="text" data-table="configurar_site" data-field="x_bool_ativo_configurar_site" name="x_bool_ativo_configurar_site" id="x_bool_ativo_configurar_site" size="30" placeholder="<?php echo HtmlEncode($configurar_site->bool_ativo_configurar_site->getPlaceHolder()) ?>" value="<?php echo $configurar_site->bool_ativo_configurar_site->EditValue ?>"<?php echo $configurar_site->bool_ativo_configurar_site->editAttributes() ?>>
</span>
<?php echo $configurar_site->bool_ativo_configurar_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$configurar_site_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $configurar_site_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $configurar_site_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$configurar_site_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$configurar_site_add->terminate();
?>
