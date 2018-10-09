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
$endereco_site_view = new endereco_site_view();

// Run the page
$endereco_site_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$endereco_site_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$endereco_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fendereco_siteview = currentForm = new ew.Form("fendereco_siteview", "view");

// Form_CustomValidate event
fendereco_siteview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fendereco_siteview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$endereco_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $endereco_site_view->ExportOptions->render("body") ?>
<?php
	foreach ($endereco_site_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $endereco_site_view->showPageHeader(); ?>
<?php
$endereco_site_view->showMessage();
?>
<form name="fendereco_siteview" id="fendereco_siteview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($endereco_site_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $endereco_site_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="endereco_site">
<input type="hidden" name="modal" value="<?php echo (int)$endereco_site_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($endereco_site->id_endereco_site->Visible) { // id_endereco_site ?>
	<tr id="r_id_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_id_endereco_site"><?php echo $endereco_site->id_endereco_site->caption() ?></span></td>
		<td data-name="id_endereco_site"<?php echo $endereco_site->id_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_id_endereco_site">
<span<?php echo $endereco_site->id_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->id_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->descricao_endereco_site->Visible) { // descricao_endereco_site ?>
	<tr id="r_descricao_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_descricao_endereco_site"><?php echo $endereco_site->descricao_endereco_site->caption() ?></span></td>
		<td data-name="descricao_endereco_site"<?php echo $endereco_site->descricao_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_descricao_endereco_site">
<span<?php echo $endereco_site->descricao_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->descricao_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->endereco_endereco_site->Visible) { // endereco_endereco_site ?>
	<tr id="r_endereco_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_endereco_endereco_site"><?php echo $endereco_site->endereco_endereco_site->caption() ?></span></td>
		<td data-name="endereco_endereco_site"<?php echo $endereco_site->endereco_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_endereco_endereco_site">
<span<?php echo $endereco_site->endereco_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->endereco_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->numero_endereco_site->Visible) { // numero_endereco_site ?>
	<tr id="r_numero_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_numero_endereco_site"><?php echo $endereco_site->numero_endereco_site->caption() ?></span></td>
		<td data-name="numero_endereco_site"<?php echo $endereco_site->numero_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_numero_endereco_site">
<span<?php echo $endereco_site->numero_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->numero_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->complemento_endereco_site->Visible) { // complemento_endereco_site ?>
	<tr id="r_complemento_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_complemento_endereco_site"><?php echo $endereco_site->complemento_endereco_site->caption() ?></span></td>
		<td data-name="complemento_endereco_site"<?php echo $endereco_site->complemento_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_complemento_endereco_site">
<span<?php echo $endereco_site->complemento_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->complemento_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->bairro_endereco_site->Visible) { // bairro_endereco_site ?>
	<tr id="r_bairro_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_bairro_endereco_site"><?php echo $endereco_site->bairro_endereco_site->caption() ?></span></td>
		<td data-name="bairro_endereco_site"<?php echo $endereco_site->bairro_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_bairro_endereco_site">
<span<?php echo $endereco_site->bairro_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->bairro_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->cidade_endereco_site->Visible) { // cidade_endereco_site ?>
	<tr id="r_cidade_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_cidade_endereco_site"><?php echo $endereco_site->cidade_endereco_site->caption() ?></span></td>
		<td data-name="cidade_endereco_site"<?php echo $endereco_site->cidade_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_cidade_endereco_site">
<span<?php echo $endereco_site->cidade_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->cidade_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->estado_id->Visible) { // estado_id ?>
	<tr id="r_estado_id">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_estado_id"><?php echo $endereco_site->estado_id->caption() ?></span></td>
		<td data-name="estado_id"<?php echo $endereco_site->estado_id->cellAttributes() ?>>
<span id="el_endereco_site_estado_id">
<span<?php echo $endereco_site->estado_id->viewAttributes() ?>>
<?php echo $endereco_site->estado_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->cep_endereco_site->Visible) { // cep_endereco_site ?>
	<tr id="r_cep_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_cep_endereco_site"><?php echo $endereco_site->cep_endereco_site->caption() ?></span></td>
		<td data-name="cep_endereco_site"<?php echo $endereco_site->cep_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_cep_endereco_site">
<span<?php echo $endereco_site->cep_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->cep_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->telefone_endereco_site->Visible) { // telefone_endereco_site ?>
	<tr id="r_telefone_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_telefone_endereco_site"><?php echo $endereco_site->telefone_endereco_site->caption() ?></span></td>
		<td data-name="telefone_endereco_site"<?php echo $endereco_site->telefone_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_telefone_endereco_site">
<span<?php echo $endereco_site->telefone_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->telefone_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->celular_endereco_site->Visible) { // celular_endereco_site ?>
	<tr id="r_celular_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_celular_endereco_site"><?php echo $endereco_site->celular_endereco_site->caption() ?></span></td>
		<td data-name="celular_endereco_site"<?php echo $endereco_site->celular_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_celular_endereco_site">
<span<?php echo $endereco_site->celular_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->celular_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->email_endereco_site->Visible) { // email_endereco_site ?>
	<tr id="r_email_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_email_endereco_site"><?php echo $endereco_site->email_endereco_site->caption() ?></span></td>
		<td data-name="email_endereco_site"<?php echo $endereco_site->email_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_email_endereco_site">
<span<?php echo $endereco_site->email_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->email_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->horario_funcionamento_endereco_site->Visible) { // horario_funcionamento_endereco_site ?>
	<tr id="r_horario_funcionamento_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_horario_funcionamento_endereco_site"><?php echo $endereco_site->horario_funcionamento_endereco_site->caption() ?></span></td>
		<td data-name="horario_funcionamento_endereco_site"<?php echo $endereco_site->horario_funcionamento_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_horario_funcionamento_endereco_site">
<span<?php echo $endereco_site->horario_funcionamento_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->horario_funcionamento_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->latitude_endereco_site->Visible) { // latitude_endereco_site ?>
	<tr id="r_latitude_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_latitude_endereco_site"><?php echo $endereco_site->latitude_endereco_site->caption() ?></span></td>
		<td data-name="latitude_endereco_site"<?php echo $endereco_site->latitude_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_latitude_endereco_site">
<span<?php echo $endereco_site->latitude_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->latitude_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->longitude_endereco_site->Visible) { // longitude_endereco_site ?>
	<tr id="r_longitude_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_longitude_endereco_site"><?php echo $endereco_site->longitude_endereco_site->caption() ?></span></td>
		<td data-name="longitude_endereco_site"<?php echo $endereco_site->longitude_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_longitude_endereco_site">
<span<?php echo $endereco_site->longitude_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->longitude_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->data_atualizacao_endereco_site->Visible) { // data_atualizacao_endereco_site ?>
	<tr id="r_data_atualizacao_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_data_atualizacao_endereco_site"><?php echo $endereco_site->data_atualizacao_endereco_site->caption() ?></span></td>
		<td data-name="data_atualizacao_endereco_site"<?php echo $endereco_site->data_atualizacao_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_data_atualizacao_endereco_site">
<span<?php echo $endereco_site->data_atualizacao_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->data_atualizacao_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_usuario_id"><?php echo $endereco_site->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $endereco_site->usuario_id->cellAttributes() ?>>
<span id="el_endereco_site_usuario_id">
<span<?php echo $endereco_site->usuario_id->viewAttributes() ?>>
<?php echo $endereco_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($endereco_site->bool_ativo_endereco_site->Visible) { // bool_ativo_endereco_site ?>
	<tr id="r_bool_ativo_endereco_site">
		<td class="<?php echo $endereco_site_view->TableLeftColumnClass ?>"><span id="elh_endereco_site_bool_ativo_endereco_site"><?php echo $endereco_site->bool_ativo_endereco_site->caption() ?></span></td>
		<td data-name="bool_ativo_endereco_site"<?php echo $endereco_site->bool_ativo_endereco_site->cellAttributes() ?>>
<span id="el_endereco_site_bool_ativo_endereco_site">
<span<?php echo $endereco_site->bool_ativo_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->bool_ativo_endereco_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$endereco_site_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$endereco_site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$endereco_site_view->terminate();
?>
