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
$cards_edit = new cards_edit();

// Run the page
$cards_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cards_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fcardsedit = currentForm = new ew.Form("fcardsedit", "edit");

// Validate form
fcardsedit.validate = function() {
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
		<?php if ($cards_edit->id_cards->Required) { ?>
			elm = this.getElements("x" + infix + "_id_cards");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cards->id_cards->caption(), $cards->id_cards->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cards_edit->titulo_cards->Required) { ?>
			elm = this.getElements("x" + infix + "_titulo_cards");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cards->titulo_cards->caption(), $cards->titulo_cards->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cards_edit->descricao_cards->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_cards");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cards->descricao_cards->caption(), $cards->descricao_cards->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cards_edit->imagem_cards->Required) { ?>
			elm = this.getElements("x" + infix + "_imagem_cards");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cards->imagem_cards->caption(), $cards->imagem_cards->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cards_edit->data_atualizacao_cards->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_cards");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cards->data_atualizacao_cards->caption(), $cards->data_atualizacao_cards->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_cards");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cards->data_atualizacao_cards->errorMessage()) ?>");
		<?php if ($cards_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cards->usuario_id->caption(), $cards->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cards->usuario_id->errorMessage()) ?>");
		<?php if ($cards_edit->bool_ativo_cards->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_cards");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cards->bool_ativo_cards->caption(), $cards->bool_ativo_cards->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_cards");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cards->bool_ativo_cards->errorMessage()) ?>");

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
fcardsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcardsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $cards_edit->showPageHeader(); ?>
<?php
$cards_edit->showMessage();
?>
<form name="fcardsedit" id="fcardsedit" class="<?php echo $cards_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cards_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cards_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cards">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$cards_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($cards->id_cards->Visible) { // id_cards ?>
	<div id="r_id_cards" class="form-group row">
		<label id="elh_cards_id_cards" class="<?php echo $cards_edit->LeftColumnClass ?>"><?php echo $cards->id_cards->caption() ?><?php echo ($cards->id_cards->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cards_edit->RightColumnClass ?>"><div<?php echo $cards->id_cards->cellAttributes() ?>>
<span id="el_cards_id_cards">
<span<?php echo $cards->id_cards->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($cards->id_cards->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="cards" data-field="x_id_cards" name="x_id_cards" id="x_id_cards" value="<?php echo HtmlEncode($cards->id_cards->CurrentValue) ?>">
<?php echo $cards->id_cards->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cards->titulo_cards->Visible) { // titulo_cards ?>
	<div id="r_titulo_cards" class="form-group row">
		<label id="elh_cards_titulo_cards" for="x_titulo_cards" class="<?php echo $cards_edit->LeftColumnClass ?>"><?php echo $cards->titulo_cards->caption() ?><?php echo ($cards->titulo_cards->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cards_edit->RightColumnClass ?>"><div<?php echo $cards->titulo_cards->cellAttributes() ?>>
<span id="el_cards_titulo_cards">
<input type="text" data-table="cards" data-field="x_titulo_cards" name="x_titulo_cards" id="x_titulo_cards" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($cards->titulo_cards->getPlaceHolder()) ?>" value="<?php echo $cards->titulo_cards->EditValue ?>"<?php echo $cards->titulo_cards->editAttributes() ?>>
</span>
<?php echo $cards->titulo_cards->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cards->descricao_cards->Visible) { // descricao_cards ?>
	<div id="r_descricao_cards" class="form-group row">
		<label id="elh_cards_descricao_cards" for="x_descricao_cards" class="<?php echo $cards_edit->LeftColumnClass ?>"><?php echo $cards->descricao_cards->caption() ?><?php echo ($cards->descricao_cards->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cards_edit->RightColumnClass ?>"><div<?php echo $cards->descricao_cards->cellAttributes() ?>>
<span id="el_cards_descricao_cards">
<input type="text" data-table="cards" data-field="x_descricao_cards" name="x_descricao_cards" id="x_descricao_cards" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($cards->descricao_cards->getPlaceHolder()) ?>" value="<?php echo $cards->descricao_cards->EditValue ?>"<?php echo $cards->descricao_cards->editAttributes() ?>>
</span>
<?php echo $cards->descricao_cards->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cards->imagem_cards->Visible) { // imagem_cards ?>
	<div id="r_imagem_cards" class="form-group row">
		<label id="elh_cards_imagem_cards" for="x_imagem_cards" class="<?php echo $cards_edit->LeftColumnClass ?>"><?php echo $cards->imagem_cards->caption() ?><?php echo ($cards->imagem_cards->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cards_edit->RightColumnClass ?>"><div<?php echo $cards->imagem_cards->cellAttributes() ?>>
<span id="el_cards_imagem_cards">
<input type="text" data-table="cards" data-field="x_imagem_cards" name="x_imagem_cards" id="x_imagem_cards" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($cards->imagem_cards->getPlaceHolder()) ?>" value="<?php echo $cards->imagem_cards->EditValue ?>"<?php echo $cards->imagem_cards->editAttributes() ?>>
</span>
<?php echo $cards->imagem_cards->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cards->data_atualizacao_cards->Visible) { // data_atualizacao_cards ?>
	<div id="r_data_atualizacao_cards" class="form-group row">
		<label id="elh_cards_data_atualizacao_cards" for="x_data_atualizacao_cards" class="<?php echo $cards_edit->LeftColumnClass ?>"><?php echo $cards->data_atualizacao_cards->caption() ?><?php echo ($cards->data_atualizacao_cards->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cards_edit->RightColumnClass ?>"><div<?php echo $cards->data_atualizacao_cards->cellAttributes() ?>>
<span id="el_cards_data_atualizacao_cards">
<input type="text" data-table="cards" data-field="x_data_atualizacao_cards" name="x_data_atualizacao_cards" id="x_data_atualizacao_cards" placeholder="<?php echo HtmlEncode($cards->data_atualizacao_cards->getPlaceHolder()) ?>" value="<?php echo $cards->data_atualizacao_cards->EditValue ?>"<?php echo $cards->data_atualizacao_cards->editAttributes() ?>>
</span>
<?php echo $cards->data_atualizacao_cards->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cards->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_cards_usuario_id" for="x_usuario_id" class="<?php echo $cards_edit->LeftColumnClass ?>"><?php echo $cards->usuario_id->caption() ?><?php echo ($cards->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cards_edit->RightColumnClass ?>"><div<?php echo $cards->usuario_id->cellAttributes() ?>>
<span id="el_cards_usuario_id">
<input type="text" data-table="cards" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($cards->usuario_id->getPlaceHolder()) ?>" value="<?php echo $cards->usuario_id->EditValue ?>"<?php echo $cards->usuario_id->editAttributes() ?>>
</span>
<?php echo $cards->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cards->bool_ativo_cards->Visible) { // bool_ativo_cards ?>
	<div id="r_bool_ativo_cards" class="form-group row">
		<label id="elh_cards_bool_ativo_cards" for="x_bool_ativo_cards" class="<?php echo $cards_edit->LeftColumnClass ?>"><?php echo $cards->bool_ativo_cards->caption() ?><?php echo ($cards->bool_ativo_cards->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cards_edit->RightColumnClass ?>"><div<?php echo $cards->bool_ativo_cards->cellAttributes() ?>>
<span id="el_cards_bool_ativo_cards">
<input type="text" data-table="cards" data-field="x_bool_ativo_cards" name="x_bool_ativo_cards" id="x_bool_ativo_cards" size="30" placeholder="<?php echo HtmlEncode($cards->bool_ativo_cards->getPlaceHolder()) ?>" value="<?php echo $cards->bool_ativo_cards->EditValue ?>"<?php echo $cards->bool_ativo_cards->editAttributes() ?>>
</span>
<?php echo $cards->bool_ativo_cards->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$cards_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $cards_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $cards_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$cards_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$cards_edit->terminate();
?>
