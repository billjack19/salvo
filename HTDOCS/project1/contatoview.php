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
$contato_view = new contato_view();

// Run the page
$contato_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$contato_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$contato->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcontatoview = currentForm = new ew.Form("fcontatoview", "view");

// Form_CustomValidate event
fcontatoview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcontatoview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$contato->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $contato_view->ExportOptions->render("body") ?>
<?php
	foreach ($contato_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $contato_view->showPageHeader(); ?>
<?php
$contato_view->showMessage();
?>
<form name="fcontatoview" id="fcontatoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($contato_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $contato_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="contato">
<input type="hidden" name="modal" value="<?php echo (int)$contato_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($contato->id_contato->Visible) { // id_contato ?>
	<tr id="r_id_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_id_contato"><?php echo $contato->id_contato->caption() ?></span></td>
		<td data-name="id_contato"<?php echo $contato->id_contato->cellAttributes() ?>>
<span id="el_contato_id_contato">
<span<?php echo $contato->id_contato->viewAttributes() ?>>
<?php echo $contato->id_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->nome_contato->Visible) { // nome_contato ?>
	<tr id="r_nome_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_nome_contato"><?php echo $contato->nome_contato->caption() ?></span></td>
		<td data-name="nome_contato"<?php echo $contato->nome_contato->cellAttributes() ?>>
<span id="el_contato_nome_contato">
<span<?php echo $contato->nome_contato->viewAttributes() ?>>
<?php echo $contato->nome_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->email_contato->Visible) { // email_contato ?>
	<tr id="r_email_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_email_contato"><?php echo $contato->email_contato->caption() ?></span></td>
		<td data-name="email_contato"<?php echo $contato->email_contato->cellAttributes() ?>>
<span id="el_contato_email_contato">
<span<?php echo $contato->email_contato->viewAttributes() ?>>
<?php echo $contato->email_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->telefone_contato->Visible) { // telefone_contato ?>
	<tr id="r_telefone_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_telefone_contato"><?php echo $contato->telefone_contato->caption() ?></span></td>
		<td data-name="telefone_contato"<?php echo $contato->telefone_contato->cellAttributes() ?>>
<span id="el_contato_telefone_contato">
<span<?php echo $contato->telefone_contato->viewAttributes() ?>>
<?php echo $contato->telefone_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->assunto_contato->Visible) { // assunto_contato ?>
	<tr id="r_assunto_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_assunto_contato"><?php echo $contato->assunto_contato->caption() ?></span></td>
		<td data-name="assunto_contato"<?php echo $contato->assunto_contato->cellAttributes() ?>>
<span id="el_contato_assunto_contato">
<span<?php echo $contato->assunto_contato->viewAttributes() ?>>
<?php echo $contato->assunto_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->mensagem_contato->Visible) { // mensagem_contato ?>
	<tr id="r_mensagem_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_mensagem_contato"><?php echo $contato->mensagem_contato->caption() ?></span></td>
		<td data-name="mensagem_contato"<?php echo $contato->mensagem_contato->cellAttributes() ?>>
<span id="el_contato_mensagem_contato">
<span<?php echo $contato->mensagem_contato->viewAttributes() ?>>
<?php echo $contato->mensagem_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->usuario_id->Visible) { // usuario_id ?>
	<tr id="r_usuario_id">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_usuario_id"><?php echo $contato->usuario_id->caption() ?></span></td>
		<td data-name="usuario_id"<?php echo $contato->usuario_id->cellAttributes() ?>>
<span id="el_contato_usuario_id">
<span<?php echo $contato->usuario_id->viewAttributes() ?>>
<?php echo $contato->usuario_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->data_atualizacao_contato->Visible) { // data_atualizacao_contato ?>
	<tr id="r_data_atualizacao_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_data_atualizacao_contato"><?php echo $contato->data_atualizacao_contato->caption() ?></span></td>
		<td data-name="data_atualizacao_contato"<?php echo $contato->data_atualizacao_contato->cellAttributes() ?>>
<span id="el_contato_data_atualizacao_contato">
<span<?php echo $contato->data_atualizacao_contato->viewAttributes() ?>>
<?php echo $contato->data_atualizacao_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($contato->bool_ativo_contato->Visible) { // bool_ativo_contato ?>
	<tr id="r_bool_ativo_contato">
		<td class="<?php echo $contato_view->TableLeftColumnClass ?>"><span id="elh_contato_bool_ativo_contato"><?php echo $contato->bool_ativo_contato->caption() ?></span></td>
		<td data-name="bool_ativo_contato"<?php echo $contato->bool_ativo_contato->cellAttributes() ?>>
<span id="el_contato_bool_ativo_contato">
<span<?php echo $contato->bool_ativo_contato->viewAttributes() ?>>
<?php echo $contato->bool_ativo_contato->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$contato_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$contato->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$contato_view->terminate();
?>
