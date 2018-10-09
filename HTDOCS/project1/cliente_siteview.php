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
$cliente_site_view = new cliente_site_view();

// Run the page
$cliente_site_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cliente_site_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$cliente_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcliente_siteview = currentForm = new ew.Form("fcliente_siteview", "view");

// Form_CustomValidate event
fcliente_siteview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcliente_siteview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$cliente_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $cliente_site_view->ExportOptions->render("body") ?>
<?php
	foreach ($cliente_site_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $cliente_site_view->showPageHeader(); ?>
<?php
$cliente_site_view->showMessage();
?>
<form name="fcliente_siteview" id="fcliente_siteview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cliente_site_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cliente_site_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cliente_site">
<input type="hidden" name="modal" value="<?php echo (int)$cliente_site_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($cliente_site->id_cliente_site->Visible) { // id_cliente_site ?>
	<tr id="r_id_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_id_cliente_site"><?php echo $cliente_site->id_cliente_site->caption() ?></span></td>
		<td data-name="id_cliente_site"<?php echo $cliente_site->id_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_id_cliente_site">
<span<?php echo $cliente_site->id_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->id_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->nome_cliente_site->Visible) { // nome_cliente_site ?>
	<tr id="r_nome_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_nome_cliente_site"><?php echo $cliente_site->nome_cliente_site->caption() ?></span></td>
		<td data-name="nome_cliente_site"<?php echo $cliente_site->nome_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_nome_cliente_site">
<span<?php echo $cliente_site->nome_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->nome_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->login_cliente_site->Visible) { // login_cliente_site ?>
	<tr id="r_login_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_login_cliente_site"><?php echo $cliente_site->login_cliente_site->caption() ?></span></td>
		<td data-name="login_cliente_site"<?php echo $cliente_site->login_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_login_cliente_site">
<span<?php echo $cliente_site->login_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->login_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->senha_cliente_site->Visible) { // senha_cliente_site ?>
	<tr id="r_senha_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_senha_cliente_site"><?php echo $cliente_site->senha_cliente_site->caption() ?></span></td>
		<td data-name="senha_cliente_site"<?php echo $cliente_site->senha_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_senha_cliente_site">
<span<?php echo $cliente_site->senha_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->senha_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->telefone_cliente_site->Visible) { // telefone_cliente_site ?>
	<tr id="r_telefone_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_telefone_cliente_site"><?php echo $cliente_site->telefone_cliente_site->caption() ?></span></td>
		<td data-name="telefone_cliente_site"<?php echo $cliente_site->telefone_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_telefone_cliente_site">
<span<?php echo $cliente_site->telefone_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->telefone_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->celular_cliente_site->Visible) { // celular_cliente_site ?>
	<tr id="r_celular_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_celular_cliente_site"><?php echo $cliente_site->celular_cliente_site->caption() ?></span></td>
		<td data-name="celular_cliente_site"<?php echo $cliente_site->celular_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_celular_cliente_site">
<span<?php echo $cliente_site->celular_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->celular_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->endereco_cliente_site->Visible) { // endereco_cliente_site ?>
	<tr id="r_endereco_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_endereco_cliente_site"><?php echo $cliente_site->endereco_cliente_site->caption() ?></span></td>
		<td data-name="endereco_cliente_site"<?php echo $cliente_site->endereco_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_endereco_cliente_site">
<span<?php echo $cliente_site->endereco_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->endereco_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->numero_cliente_site->Visible) { // numero_cliente_site ?>
	<tr id="r_numero_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_numero_cliente_site"><?php echo $cliente_site->numero_cliente_site->caption() ?></span></td>
		<td data-name="numero_cliente_site"<?php echo $cliente_site->numero_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_numero_cliente_site">
<span<?php echo $cliente_site->numero_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->numero_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->complemento_cliente_site->Visible) { // complemento_cliente_site ?>
	<tr id="r_complemento_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_complemento_cliente_site"><?php echo $cliente_site->complemento_cliente_site->caption() ?></span></td>
		<td data-name="complemento_cliente_site"<?php echo $cliente_site->complemento_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_complemento_cliente_site">
<span<?php echo $cliente_site->complemento_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->complemento_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->bairro_cliente_site->Visible) { // bairro_cliente_site ?>
	<tr id="r_bairro_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_bairro_cliente_site"><?php echo $cliente_site->bairro_cliente_site->caption() ?></span></td>
		<td data-name="bairro_cliente_site"<?php echo $cliente_site->bairro_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_bairro_cliente_site">
<span<?php echo $cliente_site->bairro_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->bairro_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->cidade_cliente_site->Visible) { // cidade_cliente_site ?>
	<tr id="r_cidade_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_cidade_cliente_site"><?php echo $cliente_site->cidade_cliente_site->caption() ?></span></td>
		<td data-name="cidade_cliente_site"<?php echo $cliente_site->cidade_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_cidade_cliente_site">
<span<?php echo $cliente_site->cidade_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->cidade_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->estado_id->Visible) { // estado_id ?>
	<tr id="r_estado_id">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_estado_id"><?php echo $cliente_site->estado_id->caption() ?></span></td>
		<td data-name="estado_id"<?php echo $cliente_site->estado_id->cellAttributes() ?>>
<span id="el_cliente_site_estado_id">
<span<?php echo $cliente_site->estado_id->viewAttributes() ?>>
<?php echo $cliente_site->estado_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->cep_cliente_site->Visible) { // cep_cliente_site ?>
	<tr id="r_cep_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_cep_cliente_site"><?php echo $cliente_site->cep_cliente_site->caption() ?></span></td>
		<td data-name="cep_cliente_site"<?php echo $cliente_site->cep_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_cep_cliente_site">
<span<?php echo $cliente_site->cep_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->cep_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->data_atualizacao_cliente_site->Visible) { // data_atualizacao_cliente_site ?>
	<tr id="r_data_atualizacao_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_data_atualizacao_cliente_site"><?php echo $cliente_site->data_atualizacao_cliente_site->caption() ?></span></td>
		<td data-name="data_atualizacao_cliente_site"<?php echo $cliente_site->data_atualizacao_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_data_atualizacao_cliente_site">
<span<?php echo $cliente_site->data_atualizacao_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->data_atualizacao_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_usuario_id"><?php echo $cliente_site->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $cliente_site->usuario_id->cellAttributes() ?>>
<span id="el_cliente_site_usuario_id">
<span<?php echo $cliente_site->usuario_id->viewAttributes() ?>>
<?php echo $cliente_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cliente_site->bool_ativo_cliente_site->Visible) { // bool_ativo_cliente_site ?>
	<tr id="r_bool_ativo_cliente_site">
		<td class="<?php echo $cliente_site_view->TableLeftColumnClass ?>"><span id="elh_cliente_site_bool_ativo_cliente_site"><?php echo $cliente_site->bool_ativo_cliente_site->caption() ?></span></td>
		<td data-name="bool_ativo_cliente_site"<?php echo $cliente_site->bool_ativo_cliente_site->cellAttributes() ?>>
<span id="el_cliente_site_bool_ativo_cliente_site">
<span<?php echo $cliente_site->bool_ativo_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->bool_ativo_cliente_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$cliente_site_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$cliente_site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$cliente_site_view->terminate();
?>
