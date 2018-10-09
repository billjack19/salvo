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
$endereco_site_edit = new endereco_site_edit();

// Run the page
$endereco_site_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$endereco_site_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fendereco_siteedit = currentForm = new ew.Form("fendereco_siteedit", "edit");

// Validate form
fendereco_siteedit.validate = function() {
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
		<?php if ($endereco_site_edit->id_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_id_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->id_endereco_site->caption(), $endereco_site->id_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->descricao_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_descricao_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->descricao_endereco_site->caption(), $endereco_site->descricao_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->endereco_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_endereco_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->endereco_endereco_site->caption(), $endereco_site->endereco_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->numero_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_numero_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->numero_endereco_site->caption(), $endereco_site->numero_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_numero_endereco_site");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($endereco_site->numero_endereco_site->errorMessage()) ?>");
		<?php if ($endereco_site_edit->complemento_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_complemento_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->complemento_endereco_site->caption(), $endereco_site->complemento_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->bairro_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_bairro_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->bairro_endereco_site->caption(), $endereco_site->bairro_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->cidade_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_cidade_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->cidade_endereco_site->caption(), $endereco_site->cidade_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->estado_id->Required) { ?>
			elm = this.getElements("x" + infix + "_estado_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->estado_id->caption(), $endereco_site->estado_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_estado_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($endereco_site->estado_id->errorMessage()) ?>");
		<?php if ($endereco_site_edit->cep_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_cep_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->cep_endereco_site->caption(), $endereco_site->cep_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->telefone_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_telefone_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->telefone_endereco_site->caption(), $endereco_site->telefone_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->celular_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_celular_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->celular_endereco_site->caption(), $endereco_site->celular_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->email_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_email_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->email_endereco_site->caption(), $endereco_site->email_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->horario_funcionamento_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_horario_funcionamento_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->horario_funcionamento_endereco_site->caption(), $endereco_site->horario_funcionamento_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->latitude_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_latitude_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->latitude_endereco_site->caption(), $endereco_site->latitude_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->longitude_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_longitude_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->longitude_endereco_site->caption(), $endereco_site->longitude_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($endereco_site_edit->data_atualizacao_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->data_atualizacao_endereco_site->caption(), $endereco_site->data_atualizacao_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_endereco_site");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($endereco_site->data_atualizacao_endereco_site->errorMessage()) ?>");
		<?php if ($endereco_site_edit->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->usuario_id->caption(), $endereco_site->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($endereco_site->usuario_id->errorMessage()) ?>");
		<?php if ($endereco_site_edit->bool_ativo_endereco_site->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_endereco_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $endereco_site->bool_ativo_endereco_site->caption(), $endereco_site->bool_ativo_endereco_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_endereco_site");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($endereco_site->bool_ativo_endereco_site->errorMessage()) ?>");

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
fendereco_siteedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fendereco_siteedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $endereco_site_edit->showPageHeader(); ?>
<?php
$endereco_site_edit->showMessage();
?>
<form name="fendereco_siteedit" id="fendereco_siteedit" class="<?php echo $endereco_site_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($endereco_site_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $endereco_site_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="endereco_site">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$endereco_site_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($endereco_site->id_endereco_site->Visible) { // id_endereco_site ?>
	<div id="r_id_endereco_site" class="form-group row">
		<label id="elh_endereco_site_id_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->id_endereco_site->caption() ?><?php echo ($endereco_site->id_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->id_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_id_endereco_site">
<span<?php echo $endereco_site->id_endereco_site->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($endereco_site->id_endereco_site->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="endereco_site" data-field="x_id_endereco_site" name="x_id_endereco_site" id="x_id_endereco_site" value="<?php echo HtmlEncode($endereco_site->id_endereco_site->CurrentValue) ?>">
<?php echo $endereco_site->id_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->descricao_endereco_site->Visible) { // descricao_endereco_site ?>
	<div id="r_descricao_endereco_site" class="form-group row">
		<label id="elh_endereco_site_descricao_endereco_site" for="x_descricao_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->descricao_endereco_site->caption() ?><?php echo ($endereco_site->descricao_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->descricao_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_descricao_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_descricao_endereco_site" name="x_descricao_endereco_site" id="x_descricao_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->descricao_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->descricao_endereco_site->EditValue ?>"<?php echo $endereco_site->descricao_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->descricao_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->endereco_endereco_site->Visible) { // endereco_endereco_site ?>
	<div id="r_endereco_endereco_site" class="form-group row">
		<label id="elh_endereco_site_endereco_endereco_site" for="x_endereco_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->endereco_endereco_site->caption() ?><?php echo ($endereco_site->endereco_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->endereco_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_endereco_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_endereco_endereco_site" name="x_endereco_endereco_site" id="x_endereco_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->endereco_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->endereco_endereco_site->EditValue ?>"<?php echo $endereco_site->endereco_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->endereco_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->numero_endereco_site->Visible) { // numero_endereco_site ?>
	<div id="r_numero_endereco_site" class="form-group row">
		<label id="elh_endereco_site_numero_endereco_site" for="x_numero_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->numero_endereco_site->caption() ?><?php echo ($endereco_site->numero_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->numero_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_numero_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_numero_endereco_site" name="x_numero_endereco_site" id="x_numero_endereco_site" size="30" placeholder="<?php echo HtmlEncode($endereco_site->numero_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->numero_endereco_site->EditValue ?>"<?php echo $endereco_site->numero_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->numero_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->complemento_endereco_site->Visible) { // complemento_endereco_site ?>
	<div id="r_complemento_endereco_site" class="form-group row">
		<label id="elh_endereco_site_complemento_endereco_site" for="x_complemento_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->complemento_endereco_site->caption() ?><?php echo ($endereco_site->complemento_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->complemento_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_complemento_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_complemento_endereco_site" name="x_complemento_endereco_site" id="x_complemento_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->complemento_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->complemento_endereco_site->EditValue ?>"<?php echo $endereco_site->complemento_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->complemento_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->bairro_endereco_site->Visible) { // bairro_endereco_site ?>
	<div id="r_bairro_endereco_site" class="form-group row">
		<label id="elh_endereco_site_bairro_endereco_site" for="x_bairro_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->bairro_endereco_site->caption() ?><?php echo ($endereco_site->bairro_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->bairro_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_bairro_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_bairro_endereco_site" name="x_bairro_endereco_site" id="x_bairro_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->bairro_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->bairro_endereco_site->EditValue ?>"<?php echo $endereco_site->bairro_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->bairro_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->cidade_endereco_site->Visible) { // cidade_endereco_site ?>
	<div id="r_cidade_endereco_site" class="form-group row">
		<label id="elh_endereco_site_cidade_endereco_site" for="x_cidade_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->cidade_endereco_site->caption() ?><?php echo ($endereco_site->cidade_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->cidade_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_cidade_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_cidade_endereco_site" name="x_cidade_endereco_site" id="x_cidade_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->cidade_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->cidade_endereco_site->EditValue ?>"<?php echo $endereco_site->cidade_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->cidade_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->estado_id->Visible) { // estado_id ?>
	<div id="r_estado_id" class="form-group row">
		<label id="elh_endereco_site_estado_id" for="x_estado_id" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->estado_id->caption() ?><?php echo ($endereco_site->estado_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->estado_id->cellAttributes() ?>>
<span id="el_endereco_site_estado_id">
<input type="text" data-table="endereco_site" data-field="x_estado_id" name="x_estado_id" id="x_estado_id" size="30" placeholder="<?php echo HtmlEncode($endereco_site->estado_id->getPlaceHolder()) ?>" value="<?php echo $endereco_site->estado_id->EditValue ?>"<?php echo $endereco_site->estado_id->editAttributes() ?>>
</span>
<?php echo $endereco_site->estado_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->cep_endereco_site->Visible) { // cep_endereco_site ?>
	<div id="r_cep_endereco_site" class="form-group row">
		<label id="elh_endereco_site_cep_endereco_site" for="x_cep_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->cep_endereco_site->caption() ?><?php echo ($endereco_site->cep_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->cep_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_cep_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_cep_endereco_site" name="x_cep_endereco_site" id="x_cep_endereco_site" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($endereco_site->cep_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->cep_endereco_site->EditValue ?>"<?php echo $endereco_site->cep_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->cep_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->telefone_endereco_site->Visible) { // telefone_endereco_site ?>
	<div id="r_telefone_endereco_site" class="form-group row">
		<label id="elh_endereco_site_telefone_endereco_site" for="x_telefone_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->telefone_endereco_site->caption() ?><?php echo ($endereco_site->telefone_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->telefone_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_telefone_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_telefone_endereco_site" name="x_telefone_endereco_site" id="x_telefone_endereco_site" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($endereco_site->telefone_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->telefone_endereco_site->EditValue ?>"<?php echo $endereco_site->telefone_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->telefone_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->celular_endereco_site->Visible) { // celular_endereco_site ?>
	<div id="r_celular_endereco_site" class="form-group row">
		<label id="elh_endereco_site_celular_endereco_site" for="x_celular_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->celular_endereco_site->caption() ?><?php echo ($endereco_site->celular_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->celular_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_celular_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_celular_endereco_site" name="x_celular_endereco_site" id="x_celular_endereco_site" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($endereco_site->celular_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->celular_endereco_site->EditValue ?>"<?php echo $endereco_site->celular_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->celular_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->email_endereco_site->Visible) { // email_endereco_site ?>
	<div id="r_email_endereco_site" class="form-group row">
		<label id="elh_endereco_site_email_endereco_site" for="x_email_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->email_endereco_site->caption() ?><?php echo ($endereco_site->email_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->email_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_email_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_email_endereco_site" name="x_email_endereco_site" id="x_email_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->email_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->email_endereco_site->EditValue ?>"<?php echo $endereco_site->email_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->email_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->horario_funcionamento_endereco_site->Visible) { // horario_funcionamento_endereco_site ?>
	<div id="r_horario_funcionamento_endereco_site" class="form-group row">
		<label id="elh_endereco_site_horario_funcionamento_endereco_site" for="x_horario_funcionamento_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->horario_funcionamento_endereco_site->caption() ?><?php echo ($endereco_site->horario_funcionamento_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->horario_funcionamento_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_horario_funcionamento_endereco_site">
<textarea data-table="endereco_site" data-field="x_horario_funcionamento_endereco_site" name="x_horario_funcionamento_endereco_site" id="x_horario_funcionamento_endereco_site" cols="35" rows="4" placeholder="<?php echo HtmlEncode($endereco_site->horario_funcionamento_endereco_site->getPlaceHolder()) ?>"<?php echo $endereco_site->horario_funcionamento_endereco_site->editAttributes() ?>><?php echo $endereco_site->horario_funcionamento_endereco_site->EditValue ?></textarea>
</span>
<?php echo $endereco_site->horario_funcionamento_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->latitude_endereco_site->Visible) { // latitude_endereco_site ?>
	<div id="r_latitude_endereco_site" class="form-group row">
		<label id="elh_endereco_site_latitude_endereco_site" for="x_latitude_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->latitude_endereco_site->caption() ?><?php echo ($endereco_site->latitude_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->latitude_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_latitude_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_latitude_endereco_site" name="x_latitude_endereco_site" id="x_latitude_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->latitude_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->latitude_endereco_site->EditValue ?>"<?php echo $endereco_site->latitude_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->latitude_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->longitude_endereco_site->Visible) { // longitude_endereco_site ?>
	<div id="r_longitude_endereco_site" class="form-group row">
		<label id="elh_endereco_site_longitude_endereco_site" for="x_longitude_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->longitude_endereco_site->caption() ?><?php echo ($endereco_site->longitude_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->longitude_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_longitude_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_longitude_endereco_site" name="x_longitude_endereco_site" id="x_longitude_endereco_site" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($endereco_site->longitude_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->longitude_endereco_site->EditValue ?>"<?php echo $endereco_site->longitude_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->longitude_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->data_atualizacao_endereco_site->Visible) { // data_atualizacao_endereco_site ?>
	<div id="r_data_atualizacao_endereco_site" class="form-group row">
		<label id="elh_endereco_site_data_atualizacao_endereco_site" for="x_data_atualizacao_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->data_atualizacao_endereco_site->caption() ?><?php echo ($endereco_site->data_atualizacao_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->data_atualizacao_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_data_atualizacao_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_data_atualizacao_endereco_site" name="x_data_atualizacao_endereco_site" id="x_data_atualizacao_endereco_site" placeholder="<?php echo HtmlEncode($endereco_site->data_atualizacao_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->data_atualizacao_endereco_site->EditValue ?>"<?php echo $endereco_site->data_atualizacao_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->data_atualizacao_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_endereco_site_usuario_id" for="x_usuario_id" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->usuario_id->caption() ?><?php echo ($endereco_site->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->usuario_id->cellAttributes() ?>>
<span id="el_endereco_site_usuario_id">
<input type="text" data-table="endereco_site" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($endereco_site->usuario_id->getPlaceHolder()) ?>" value="<?php echo $endereco_site->usuario_id->EditValue ?>"<?php echo $endereco_site->usuario_id->editAttributes() ?>>
</span>
<?php echo $endereco_site->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($endereco_site->bool_ativo_endereco_site->Visible) { // bool_ativo_endereco_site ?>
	<div id="r_bool_ativo_endereco_site" class="form-group row">
		<label id="elh_endereco_site_bool_ativo_endereco_site" for="x_bool_ativo_endereco_site" class="<?php echo $endereco_site_edit->LeftColumnClass ?>"><?php echo $endereco_site->bool_ativo_endereco_site->caption() ?><?php echo ($endereco_site->bool_ativo_endereco_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $endereco_site_edit->RightColumnClass ?>"><div<?php echo $endereco_site->bool_ativo_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_bool_ativo_endereco_site">
<input type="text" data-table="endereco_site" data-field="x_bool_ativo_endereco_site" name="x_bool_ativo_endereco_site" id="x_bool_ativo_endereco_site" size="30" placeholder="<?php echo HtmlEncode($endereco_site->bool_ativo_endereco_site->getPlaceHolder()) ?>" value="<?php echo $endereco_site->bool_ativo_endereco_site->EditValue ?>"<?php echo $endereco_site->bool_ativo_endereco_site->editAttributes() ?>>
</span>
<?php echo $endereco_site->bool_ativo_endereco_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$endereco_site_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $endereco_site_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $endereco_site_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$endereco_site_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$endereco_site_edit->terminate();
?>
