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
$usuario_view = new usuario_view();

// Run the page
$usuario_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuario_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$usuario->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fusuarioview = currentForm = new ew.Form("fusuarioview", "view");

// Form_CustomValidate event
fusuarioview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fusuarioview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$usuario->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $usuario_view->ExportOptions->render("body") ?>
<?php
	foreach ($usuario_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $usuario_view->showPageHeader(); ?>
<?php
$usuario_view->showMessage();
?>
<form name="fusuarioview" id="fusuarioview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($usuario_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $usuario_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuario">
<input type="hidden" name="modal" value="<?php echo (int)$usuario_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($usuario->id_usuario->Visible) { // id_usuario ?>
	<tr id="r_id_usuario">
		<td class="<?php echo $usuario_view->TableLeftColumnClass ?>"><span id="elh_usuario_id_usuario"><?php echo $usuario->id_usuario->caption() ?></span></td>
		<td data-name="id_usuario"<?php echo $usuario->id_usuario->cellAttributes() ?>>
<span id="el_usuario_id_usuario">
<span<?php echo $usuario->id_usuario->viewAttributes() ?>>
<?php echo $usuario->id_usuario->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuario->nome_usuario->Visible) { // nome_usuario ?>
	<tr id="r_nome_usuario">
		<td class="<?php echo $usuario_view->TableLeftColumnClass ?>"><span id="elh_usuario_nome_usuario"><?php echo $usuario->nome_usuario->caption() ?></span></td>
		<td data-name="nome_usuario"<?php echo $usuario->nome_usuario->cellAttributes() ?>>
<span id="el_usuario_nome_usuario">
<span<?php echo $usuario->nome_usuario->viewAttributes() ?>>
<?php echo $usuario->nome_usuario->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuario->login_usuario->Visible) { // login_usuario ?>
	<tr id="r_login_usuario">
		<td class="<?php echo $usuario_view->TableLeftColumnClass ?>"><span id="elh_usuario_login_usuario"><?php echo $usuario->login_usuario->caption() ?></span></td>
		<td data-name="login_usuario"<?php echo $usuario->login_usuario->cellAttributes() ?>>
<span id="el_usuario_login_usuario">
<span<?php echo $usuario->login_usuario->viewAttributes() ?>>
<?php echo $usuario->login_usuario->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuario->senha_usuario->Visible) { // senha_usuario ?>
	<tr id="r_senha_usuario">
		<td class="<?php echo $usuario_view->TableLeftColumnClass ?>"><span id="elh_usuario_senha_usuario"><?php echo $usuario->senha_usuario->caption() ?></span></td>
		<td data-name="senha_usuario"<?php echo $usuario->senha_usuario->cellAttributes() ?>>
<span id="el_usuario_senha_usuario">
<span<?php echo $usuario->senha_usuario->viewAttributes() ?>>
<?php echo $usuario->senha_usuario->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuario->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
	<tr id="r_nivel_acesso_id">
		<td class="<?php echo $usuario_view->TableLeftColumnClass ?>"><span id="elh_usuario_nivel_acesso_id"><?php echo $usuario->nivel_acesso_id->caption() ?></span></td>
		<td data-name="nivel_acesso_id"<?php echo $usuario->nivel_acesso_id->cellAttributes() ?>>
<span id="el_usuario_nivel_acesso_id">
<span<?php echo $usuario->nivel_acesso_id->viewAttributes() ?>>
<?php echo $usuario->nivel_acesso_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuario->bool_ativo_usuario->Visible) { // bool_ativo_usuario ?>
	<tr id="r_bool_ativo_usuario">
		<td class="<?php echo $usuario_view->TableLeftColumnClass ?>"><span id="elh_usuario_bool_ativo_usuario"><?php echo $usuario->bool_ativo_usuario->caption() ?></span></td>
		<td data-name="bool_ativo_usuario"<?php echo $usuario->bool_ativo_usuario->cellAttributes() ?>>
<span id="el_usuario_bool_ativo_usuario">
<span<?php echo $usuario->bool_ativo_usuario->viewAttributes() ?>>
<?php echo $usuario->bool_ativo_usuario->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$usuario_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$usuario->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$usuario_view->terminate();
?>
