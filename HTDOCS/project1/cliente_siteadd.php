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
$cliente_site_add = new cliente_site_add();

// Run the page
$cliente_site_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cliente_site_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcliente_siteadd = currentForm = new ew.Form("fcliente_siteadd", "add");

// Validate form
fcliente_siteadd.validate = function() {
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
		<?php if ($cliente_site_add->nome_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_nome_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->nome_cliente_site->caption(), $cliente_site->nome_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->login_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_login_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->login_cliente_site->caption(), $cliente_site->login_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->senha_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_senha_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->senha_cliente_site->caption(), $cliente_site->senha_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->telefone_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_telefone_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->telefone_cliente_site->caption(), $cliente_site->telefone_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->celular_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_celular_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->celular_cliente_site->caption(), $cliente_site->celular_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->endereco_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_endereco_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->endereco_cliente_site->caption(), $cliente_site->endereco_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->numero_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_numero_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->numero_cliente_site->caption(), $cliente_site->numero_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_numero_cliente_site");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cliente_site->numero_cliente_site->errorMessage()) ?>");
		<?php if ($cliente_site_add->complemento_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_complemento_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->complemento_cliente_site->caption(), $cliente_site->complemento_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->bairro_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_bairro_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->bairro_cliente_site->caption(), $cliente_site->bairro_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->cidade_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_cidade_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->cidade_cliente_site->caption(), $cliente_site->cidade_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->estado_id->Required) { ?>
			elm = this.getElements("x" + infix + "_estado_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->estado_id->caption(), $cliente_site->estado_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_estado_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cliente_site->estado_id->errorMessage()) ?>");
		<?php if ($cliente_site_add->cep_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_cep_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->cep_cliente_site->caption(), $cliente_site->cep_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($cliente_site_add->data_atualizacao_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->data_atualizacao_cliente_site->caption(), $cliente_site->data_atualizacao_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_data_atualizacao_cliente_site");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cliente_site->data_atualizacao_cliente_site->errorMessage()) ?>");
		<?php if ($cliente_site_add->usuario_id->Required) { ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->usuario_id->caption(), $cliente_site->usuario_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_usuario_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cliente_site->usuario_id->errorMessage()) ?>");
		<?php if ($cliente_site_add->bool_ativo_cliente_site->Required) { ?>
			elm = this.getElements("x" + infix + "_bool_ativo_cliente_site");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cliente_site->bool_ativo_cliente_site->caption(), $cliente_site->bool_ativo_cliente_site->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_bool_ativo_cliente_site");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($cliente_site->bool_ativo_cliente_site->errorMessage()) ?>");

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
fcliente_siteadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcliente_siteadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $cliente_site_add->showPageHeader(); ?>
<?php
$cliente_site_add->showMessage();
?>
<form name="fcliente_siteadd" id="fcliente_siteadd" class="<?php echo $cliente_site_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cliente_site_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cliente_site_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cliente_site">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$cliente_site_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($cliente_site->nome_cliente_site->Visible) { // nome_cliente_site ?>
	<div id="r_nome_cliente_site" class="form-group row">
		<label id="elh_cliente_site_nome_cliente_site" for="x_nome_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->nome_cliente_site->caption() ?><?php echo ($cliente_site->nome_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->nome_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_nome_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_nome_cliente_site" name="x_nome_cliente_site" id="x_nome_cliente_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($cliente_site->nome_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->nome_cliente_site->EditValue ?>"<?php echo $cliente_site->nome_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->nome_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->login_cliente_site->Visible) { // login_cliente_site ?>
	<div id="r_login_cliente_site" class="form-group row">
		<label id="elh_cliente_site_login_cliente_site" for="x_login_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->login_cliente_site->caption() ?><?php echo ($cliente_site->login_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->login_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_login_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_login_cliente_site" name="x_login_cliente_site" id="x_login_cliente_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($cliente_site->login_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->login_cliente_site->EditValue ?>"<?php echo $cliente_site->login_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->login_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->senha_cliente_site->Visible) { // senha_cliente_site ?>
	<div id="r_senha_cliente_site" class="form-group row">
		<label id="elh_cliente_site_senha_cliente_site" for="x_senha_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->senha_cliente_site->caption() ?><?php echo ($cliente_site->senha_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->senha_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_senha_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_senha_cliente_site" name="x_senha_cliente_site" id="x_senha_cliente_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($cliente_site->senha_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->senha_cliente_site->EditValue ?>"<?php echo $cliente_site->senha_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->senha_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->telefone_cliente_site->Visible) { // telefone_cliente_site ?>
	<div id="r_telefone_cliente_site" class="form-group row">
		<label id="elh_cliente_site_telefone_cliente_site" for="x_telefone_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->telefone_cliente_site->caption() ?><?php echo ($cliente_site->telefone_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->telefone_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_telefone_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_telefone_cliente_site" name="x_telefone_cliente_site" id="x_telefone_cliente_site" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($cliente_site->telefone_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->telefone_cliente_site->EditValue ?>"<?php echo $cliente_site->telefone_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->telefone_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->celular_cliente_site->Visible) { // celular_cliente_site ?>
	<div id="r_celular_cliente_site" class="form-group row">
		<label id="elh_cliente_site_celular_cliente_site" for="x_celular_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->celular_cliente_site->caption() ?><?php echo ($cliente_site->celular_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->celular_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_celular_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_celular_cliente_site" name="x_celular_cliente_site" id="x_celular_cliente_site" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($cliente_site->celular_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->celular_cliente_site->EditValue ?>"<?php echo $cliente_site->celular_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->celular_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->endereco_cliente_site->Visible) { // endereco_cliente_site ?>
	<div id="r_endereco_cliente_site" class="form-group row">
		<label id="elh_cliente_site_endereco_cliente_site" for="x_endereco_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->endereco_cliente_site->caption() ?><?php echo ($cliente_site->endereco_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->endereco_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_endereco_cliente_site">
<textarea data-table="cliente_site" data-field="x_endereco_cliente_site" name="x_endereco_cliente_site" id="x_endereco_cliente_site" cols="35" rows="4" placeholder="<?php echo HtmlEncode($cliente_site->endereco_cliente_site->getPlaceHolder()) ?>"<?php echo $cliente_site->endereco_cliente_site->editAttributes() ?>><?php echo $cliente_site->endereco_cliente_site->EditValue ?></textarea>
</span>
<?php echo $cliente_site->endereco_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->numero_cliente_site->Visible) { // numero_cliente_site ?>
	<div id="r_numero_cliente_site" class="form-group row">
		<label id="elh_cliente_site_numero_cliente_site" for="x_numero_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->numero_cliente_site->caption() ?><?php echo ($cliente_site->numero_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->numero_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_numero_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_numero_cliente_site" name="x_numero_cliente_site" id="x_numero_cliente_site" size="30" placeholder="<?php echo HtmlEncode($cliente_site->numero_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->numero_cliente_site->EditValue ?>"<?php echo $cliente_site->numero_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->numero_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->complemento_cliente_site->Visible) { // complemento_cliente_site ?>
	<div id="r_complemento_cliente_site" class="form-group row">
		<label id="elh_cliente_site_complemento_cliente_site" for="x_complemento_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->complemento_cliente_site->caption() ?><?php echo ($cliente_site->complemento_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->complemento_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_complemento_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_complemento_cliente_site" name="x_complemento_cliente_site" id="x_complemento_cliente_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($cliente_site->complemento_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->complemento_cliente_site->EditValue ?>"<?php echo $cliente_site->complemento_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->complemento_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->bairro_cliente_site->Visible) { // bairro_cliente_site ?>
	<div id="r_bairro_cliente_site" class="form-group row">
		<label id="elh_cliente_site_bairro_cliente_site" for="x_bairro_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->bairro_cliente_site->caption() ?><?php echo ($cliente_site->bairro_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->bairro_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_bairro_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_bairro_cliente_site" name="x_bairro_cliente_site" id="x_bairro_cliente_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($cliente_site->bairro_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->bairro_cliente_site->EditValue ?>"<?php echo $cliente_site->bairro_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->bairro_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->cidade_cliente_site->Visible) { // cidade_cliente_site ?>
	<div id="r_cidade_cliente_site" class="form-group row">
		<label id="elh_cliente_site_cidade_cliente_site" for="x_cidade_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->cidade_cliente_site->caption() ?><?php echo ($cliente_site->cidade_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->cidade_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_cidade_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_cidade_cliente_site" name="x_cidade_cliente_site" id="x_cidade_cliente_site" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($cliente_site->cidade_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->cidade_cliente_site->EditValue ?>"<?php echo $cliente_site->cidade_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->cidade_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->estado_id->Visible) { // estado_id ?>
	<div id="r_estado_id" class="form-group row">
		<label id="elh_cliente_site_estado_id" for="x_estado_id" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->estado_id->caption() ?><?php echo ($cliente_site->estado_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->estado_id->cellAttributes() ?>>
<span id="el_cliente_site_estado_id">
<input type="text" data-table="cliente_site" data-field="x_estado_id" name="x_estado_id" id="x_estado_id" size="30" placeholder="<?php echo HtmlEncode($cliente_site->estado_id->getPlaceHolder()) ?>" value="<?php echo $cliente_site->estado_id->EditValue ?>"<?php echo $cliente_site->estado_id->editAttributes() ?>>
</span>
<?php echo $cliente_site->estado_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->cep_cliente_site->Visible) { // cep_cliente_site ?>
	<div id="r_cep_cliente_site" class="form-group row">
		<label id="elh_cliente_site_cep_cliente_site" for="x_cep_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->cep_cliente_site->caption() ?><?php echo ($cliente_site->cep_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->cep_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_cep_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_cep_cliente_site" name="x_cep_cliente_site" id="x_cep_cliente_site" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($cliente_site->cep_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->cep_cliente_site->EditValue ?>"<?php echo $cliente_site->cep_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->cep_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->data_atualizacao_cliente_site->Visible) { // data_atualizacao_cliente_site ?>
	<div id="r_data_atualizacao_cliente_site" class="form-group row">
		<label id="elh_cliente_site_data_atualizacao_cliente_site" for="x_data_atualizacao_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->data_atualizacao_cliente_site->caption() ?><?php echo ($cliente_site->data_atualizacao_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->data_atualizacao_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_data_atualizacao_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_data_atualizacao_cliente_site" name="x_data_atualizacao_cliente_site" id="x_data_atualizacao_cliente_site" placeholder="<?php echo HtmlEncode($cliente_site->data_atualizacao_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->data_atualizacao_cliente_site->EditValue ?>"<?php echo $cliente_site->data_atualizacao_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->data_atualizacao_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->usuario_id->Visible) { // usuario_id ?>
	<div id="r_usuario_id" class="form-group row">
		<label id="elh_cliente_site_usuario_id" for="x_usuario_id" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->usuario_id->caption() ?><?php echo ($cliente_site->usuario_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->usuario_id->cellAttributes() ?>>
<span id="el_cliente_site_usuario_id">
<input type="text" data-table="cliente_site" data-field="x_usuario_id" name="x_usuario_id" id="x_usuario_id" size="30" placeholder="<?php echo HtmlEncode($cliente_site->usuario_id->getPlaceHolder()) ?>" value="<?php echo $cliente_site->usuario_id->EditValue ?>"<?php echo $cliente_site->usuario_id->editAttributes() ?>>
</span>
<?php echo $cliente_site->usuario_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cliente_site->bool_ativo_cliente_site->Visible) { // bool_ativo_cliente_site ?>
	<div id="r_bool_ativo_cliente_site" class="form-group row">
		<label id="elh_cliente_site_bool_ativo_cliente_site" for="x_bool_ativo_cliente_site" class="<?php echo $cliente_site_add->LeftColumnClass ?>"><?php echo $cliente_site->bool_ativo_cliente_site->caption() ?><?php echo ($cliente_site->bool_ativo_cliente_site->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cliente_site_add->RightColumnClass ?>"><div<?php echo $cliente_site->bool_ativo_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_bool_ativo_cliente_site">
<input type="text" data-table="cliente_site" data-field="x_bool_ativo_cliente_site" name="x_bool_ativo_cliente_site" id="x_bool_ativo_cliente_site" size="30" placeholder="<?php echo HtmlEncode($cliente_site->bool_ativo_cliente_site->getPlaceHolder()) ?>" value="<?php echo $cliente_site->bool_ativo_cliente_site->EditValue ?>"<?php echo $cliente_site->bool_ativo_cliente_site->editAttributes() ?>>
</span>
<?php echo $cliente_site->bool_ativo_cliente_site->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$cliente_site_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $cliente_site_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $cliente_site_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$cliente_site_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$cliente_site_add->terminate();
?>
