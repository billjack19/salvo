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
$site_view = new site_view();

// Run the page
$site_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$site_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsiteview = currentForm = new ew.Form("fsiteview", "view");

// Form_CustomValidate event
fsiteview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsiteview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $site_view->ExportOptions->render("body") ?>
<?php
	foreach ($site_view->OtherOptions as &$option)
		$option->render("body");
?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $site_view->showPageHeader(); ?>
<?php
$site_view->showMessage();
?>
<form name="fsiteview" id="fsiteview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($site_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $site_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="site">
<input type="hidden" name="modal" value="<?php echo (int)$site_view->IsModal ?>">
<table class="table ew-view-table">
<?php if ($site->ID_SITE->Visible) { // ID_SITE ?>
	<tr id="r_ID_SITE">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_ID_SITE"><?php echo $site->ID_SITE->caption() ?></span></td>
		<td data-name="ID_SITE"<?php echo $site->ID_SITE->cellAttributes() ?>>
<span id="el_site_ID_SITE">
<span<?php echo $site->ID_SITE->viewAttributes() ?>>
<?php echo $site->ID_SITE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->NOME_EMPRESA->Visible) { // NOME_EMPRESA ?>
	<tr id="r_NOME_EMPRESA">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_NOME_EMPRESA"><?php echo $site->NOME_EMPRESA->caption() ?></span></td>
		<td data-name="NOME_EMPRESA"<?php echo $site->NOME_EMPRESA->cellAttributes() ?>>
<span id="el_site_NOME_EMPRESA">
<span<?php echo $site->NOME_EMPRESA->viewAttributes() ?>>
<?php echo $site->NOME_EMPRESA->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->NOME_CIDADE->Visible) { // NOME_CIDADE ?>
	<tr id="r_NOME_CIDADE">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_NOME_CIDADE"><?php echo $site->NOME_CIDADE->caption() ?></span></td>
		<td data-name="NOME_CIDADE"<?php echo $site->NOME_CIDADE->cellAttributes() ?>>
<span id="el_site_NOME_CIDADE">
<span<?php echo $site->NOME_CIDADE->viewAttributes() ?>>
<?php echo $site->NOME_CIDADE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->ESTADO->Visible) { // ESTADO ?>
	<tr id="r_ESTADO">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_ESTADO"><?php echo $site->ESTADO->caption() ?></span></td>
		<td data-name="ESTADO"<?php echo $site->ESTADO->cellAttributes() ?>>
<span id="el_site_ESTADO">
<span<?php echo $site->ESTADO->viewAttributes() ?>>
<?php echo $site->ESTADO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->FONE->Visible) { // FONE ?>
	<tr id="r_FONE">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_FONE"><?php echo $site->FONE->caption() ?></span></td>
		<td data-name="FONE"<?php echo $site->FONE->cellAttributes() ?>>
<span id="el_site_FONE">
<span<?php echo $site->FONE->viewAttributes() ?>>
<?php echo $site->FONE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->FONE_APP->Visible) { // FONE_APP ?>
	<tr id="r_FONE_APP">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_FONE_APP"><?php echo $site->FONE_APP->caption() ?></span></td>
		<td data-name="FONE_APP"<?php echo $site->FONE_APP->cellAttributes() ?>>
<span id="el_site_FONE_APP">
<span<?php echo $site->FONE_APP->viewAttributes() ?>>
<?php echo $site->FONE_APP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->_EMAIL->Visible) { // EMAIL ?>
	<tr id="r__EMAIL">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site__EMAIL"><?php echo $site->_EMAIL->caption() ?></span></td>
		<td data-name="_EMAIL"<?php echo $site->_EMAIL->cellAttributes() ?>>
<span id="el_site__EMAIL">
<span<?php echo $site->_EMAIL->viewAttributes() ?>>
<?php echo $site->_EMAIL->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->sendusername->Visible) { // sendusername ?>
	<tr id="r_sendusername">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_sendusername"><?php echo $site->sendusername->caption() ?></span></td>
		<td data-name="sendusername"<?php echo $site->sendusername->cellAttributes() ?>>
<span id="el_site_sendusername">
<span<?php echo $site->sendusername->viewAttributes() ?>>
<?php echo $site->sendusername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->sendpassword->Visible) { // sendpassword ?>
	<tr id="r_sendpassword">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_sendpassword"><?php echo $site->sendpassword->caption() ?></span></td>
		<td data-name="sendpassword"<?php echo $site->sendpassword->cellAttributes() ?>>
<span id="el_site_sendpassword">
<span<?php echo $site->sendpassword->viewAttributes() ?>>
<?php echo $site->sendpassword->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->smtpserver->Visible) { // smtpserver ?>
	<tr id="r_smtpserver">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_smtpserver"><?php echo $site->smtpserver->caption() ?></span></td>
		<td data-name="smtpserver"<?php echo $site->smtpserver->cellAttributes() ?>>
<span id="el_site_smtpserver">
<span<?php echo $site->smtpserver->viewAttributes() ?>>
<?php echo $site->smtpserver->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->smtpserverport->Visible) { // smtpserverport ?>
	<tr id="r_smtpserverport">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_smtpserverport"><?php echo $site->smtpserverport->caption() ?></span></td>
		<td data-name="smtpserverport"<?php echo $site->smtpserverport->cellAttributes() ?>>
<span id="el_site_smtpserverport">
<span<?php echo $site->smtpserverport->viewAttributes() ?>>
<?php echo $site->smtpserverport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->MailFrom->Visible) { // MailFrom ?>
	<tr id="r_MailFrom">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_MailFrom"><?php echo $site->MailFrom->caption() ?></span></td>
		<td data-name="MailFrom"<?php echo $site->MailFrom->cellAttributes() ?>>
<span id="el_site_MailFrom">
<span<?php echo $site->MailFrom->viewAttributes() ?>>
<?php echo $site->MailFrom->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->MailTo->Visible) { // MailTo ?>
	<tr id="r_MailTo">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_MailTo"><?php echo $site->MailTo->caption() ?></span></td>
		<td data-name="MailTo"<?php echo $site->MailTo->cellAttributes() ?>>
<span id="el_site_MailTo">
<span<?php echo $site->MailTo->viewAttributes() ?>>
<?php echo $site->MailTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->MailCc->Visible) { // MailCc ?>
	<tr id="r_MailCc">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_MailCc"><?php echo $site->MailCc->caption() ?></span></td>
		<td data-name="MailCc"<?php echo $site->MailCc->cellAttributes() ?>>
<span id="el_site_MailCc">
<span<?php echo $site->MailCc->viewAttributes() ?>>
<?php echo $site->MailCc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($site->bool_ativo_site->Visible) { // bool_ativo_site ?>
	<tr id="r_bool_ativo_site">
		<td class="<?php echo $site_view->TableLeftColumnClass ?>"><span id="elh_site_bool_ativo_site"><?php echo $site->bool_ativo_site->caption() ?></span></td>
		<td data-name="bool_ativo_site"<?php echo $site->bool_ativo_site->cellAttributes() ?>>
<span id="el_site_bool_ativo_site">
<span<?php echo $site->bool_ativo_site->viewAttributes() ?>>
<?php echo $site->bool_ativo_site->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$site_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$site_view->terminate();
?>
