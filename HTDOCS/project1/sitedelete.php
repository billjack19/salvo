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
$site_delete = new site_delete();

// Run the page
$site_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$site_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsitedelete = currentForm = new ew.Form("fsitedelete", "delete");

// Form_CustomValidate event
fsitedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsitedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $site_delete->showPageHeader(); ?>
<?php
$site_delete->showMessage();
?>
<form name="fsitedelete" id="fsitedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($site_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $site_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="site">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($site_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($site->ID_SITE->Visible) { // ID_SITE ?>
		<th class="<?php echo $site->ID_SITE->headerCellClass() ?>"><span id="elh_site_ID_SITE" class="site_ID_SITE"><?php echo $site->ID_SITE->caption() ?></span></th>
<?php } ?>
<?php if ($site->NOME_EMPRESA->Visible) { // NOME_EMPRESA ?>
		<th class="<?php echo $site->NOME_EMPRESA->headerCellClass() ?>"><span id="elh_site_NOME_EMPRESA" class="site_NOME_EMPRESA"><?php echo $site->NOME_EMPRESA->caption() ?></span></th>
<?php } ?>
<?php if ($site->NOME_CIDADE->Visible) { // NOME_CIDADE ?>
		<th class="<?php echo $site->NOME_CIDADE->headerCellClass() ?>"><span id="elh_site_NOME_CIDADE" class="site_NOME_CIDADE"><?php echo $site->NOME_CIDADE->caption() ?></span></th>
<?php } ?>
<?php if ($site->ESTADO->Visible) { // ESTADO ?>
		<th class="<?php echo $site->ESTADO->headerCellClass() ?>"><span id="elh_site_ESTADO" class="site_ESTADO"><?php echo $site->ESTADO->caption() ?></span></th>
<?php } ?>
<?php if ($site->FONE->Visible) { // FONE ?>
		<th class="<?php echo $site->FONE->headerCellClass() ?>"><span id="elh_site_FONE" class="site_FONE"><?php echo $site->FONE->caption() ?></span></th>
<?php } ?>
<?php if ($site->FONE_APP->Visible) { // FONE_APP ?>
		<th class="<?php echo $site->FONE_APP->headerCellClass() ?>"><span id="elh_site_FONE_APP" class="site_FONE_APP"><?php echo $site->FONE_APP->caption() ?></span></th>
<?php } ?>
<?php if ($site->_EMAIL->Visible) { // EMAIL ?>
		<th class="<?php echo $site->_EMAIL->headerCellClass() ?>"><span id="elh_site__EMAIL" class="site__EMAIL"><?php echo $site->_EMAIL->caption() ?></span></th>
<?php } ?>
<?php if ($site->sendusername->Visible) { // sendusername ?>
		<th class="<?php echo $site->sendusername->headerCellClass() ?>"><span id="elh_site_sendusername" class="site_sendusername"><?php echo $site->sendusername->caption() ?></span></th>
<?php } ?>
<?php if ($site->sendpassword->Visible) { // sendpassword ?>
		<th class="<?php echo $site->sendpassword->headerCellClass() ?>"><span id="elh_site_sendpassword" class="site_sendpassword"><?php echo $site->sendpassword->caption() ?></span></th>
<?php } ?>
<?php if ($site->smtpserver->Visible) { // smtpserver ?>
		<th class="<?php echo $site->smtpserver->headerCellClass() ?>"><span id="elh_site_smtpserver" class="site_smtpserver"><?php echo $site->smtpserver->caption() ?></span></th>
<?php } ?>
<?php if ($site->smtpserverport->Visible) { // smtpserverport ?>
		<th class="<?php echo $site->smtpserverport->headerCellClass() ?>"><span id="elh_site_smtpserverport" class="site_smtpserverport"><?php echo $site->smtpserverport->caption() ?></span></th>
<?php } ?>
<?php if ($site->MailFrom->Visible) { // MailFrom ?>
		<th class="<?php echo $site->MailFrom->headerCellClass() ?>"><span id="elh_site_MailFrom" class="site_MailFrom"><?php echo $site->MailFrom->caption() ?></span></th>
<?php } ?>
<?php if ($site->MailTo->Visible) { // MailTo ?>
		<th class="<?php echo $site->MailTo->headerCellClass() ?>"><span id="elh_site_MailTo" class="site_MailTo"><?php echo $site->MailTo->caption() ?></span></th>
<?php } ?>
<?php if ($site->MailCc->Visible) { // MailCc ?>
		<th class="<?php echo $site->MailCc->headerCellClass() ?>"><span id="elh_site_MailCc" class="site_MailCc"><?php echo $site->MailCc->caption() ?></span></th>
<?php } ?>
<?php if ($site->bool_ativo_site->Visible) { // bool_ativo_site ?>
		<th class="<?php echo $site->bool_ativo_site->headerCellClass() ?>"><span id="elh_site_bool_ativo_site" class="site_bool_ativo_site"><?php echo $site->bool_ativo_site->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$site_delete->RecCnt = 0;
$i = 0;
while (!$site_delete->Recordset->EOF) {
	$site_delete->RecCnt++;
	$site_delete->RowCnt++;

	// Set row properties
	$site->resetAttributes();
	$site->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$site_delete->loadRowValues($site_delete->Recordset);

	// Render row
	$site_delete->renderRow();
?>
	<tr<?php echo $site->rowAttributes() ?>>
<?php if ($site->ID_SITE->Visible) { // ID_SITE ?>
		<td<?php echo $site->ID_SITE->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_ID_SITE" class="site_ID_SITE">
<span<?php echo $site->ID_SITE->viewAttributes() ?>>
<?php echo $site->ID_SITE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->NOME_EMPRESA->Visible) { // NOME_EMPRESA ?>
		<td<?php echo $site->NOME_EMPRESA->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_NOME_EMPRESA" class="site_NOME_EMPRESA">
<span<?php echo $site->NOME_EMPRESA->viewAttributes() ?>>
<?php echo $site->NOME_EMPRESA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->NOME_CIDADE->Visible) { // NOME_CIDADE ?>
		<td<?php echo $site->NOME_CIDADE->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_NOME_CIDADE" class="site_NOME_CIDADE">
<span<?php echo $site->NOME_CIDADE->viewAttributes() ?>>
<?php echo $site->NOME_CIDADE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->ESTADO->Visible) { // ESTADO ?>
		<td<?php echo $site->ESTADO->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_ESTADO" class="site_ESTADO">
<span<?php echo $site->ESTADO->viewAttributes() ?>>
<?php echo $site->ESTADO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->FONE->Visible) { // FONE ?>
		<td<?php echo $site->FONE->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_FONE" class="site_FONE">
<span<?php echo $site->FONE->viewAttributes() ?>>
<?php echo $site->FONE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->FONE_APP->Visible) { // FONE_APP ?>
		<td<?php echo $site->FONE_APP->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_FONE_APP" class="site_FONE_APP">
<span<?php echo $site->FONE_APP->viewAttributes() ?>>
<?php echo $site->FONE_APP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->_EMAIL->Visible) { // EMAIL ?>
		<td<?php echo $site->_EMAIL->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site__EMAIL" class="site__EMAIL">
<span<?php echo $site->_EMAIL->viewAttributes() ?>>
<?php echo $site->_EMAIL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->sendusername->Visible) { // sendusername ?>
		<td<?php echo $site->sendusername->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_sendusername" class="site_sendusername">
<span<?php echo $site->sendusername->viewAttributes() ?>>
<?php echo $site->sendusername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->sendpassword->Visible) { // sendpassword ?>
		<td<?php echo $site->sendpassword->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_sendpassword" class="site_sendpassword">
<span<?php echo $site->sendpassword->viewAttributes() ?>>
<?php echo $site->sendpassword->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->smtpserver->Visible) { // smtpserver ?>
		<td<?php echo $site->smtpserver->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_smtpserver" class="site_smtpserver">
<span<?php echo $site->smtpserver->viewAttributes() ?>>
<?php echo $site->smtpserver->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->smtpserverport->Visible) { // smtpserverport ?>
		<td<?php echo $site->smtpserverport->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_smtpserverport" class="site_smtpserverport">
<span<?php echo $site->smtpserverport->viewAttributes() ?>>
<?php echo $site->smtpserverport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->MailFrom->Visible) { // MailFrom ?>
		<td<?php echo $site->MailFrom->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_MailFrom" class="site_MailFrom">
<span<?php echo $site->MailFrom->viewAttributes() ?>>
<?php echo $site->MailFrom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->MailTo->Visible) { // MailTo ?>
		<td<?php echo $site->MailTo->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_MailTo" class="site_MailTo">
<span<?php echo $site->MailTo->viewAttributes() ?>>
<?php echo $site->MailTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->MailCc->Visible) { // MailCc ?>
		<td<?php echo $site->MailCc->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_MailCc" class="site_MailCc">
<span<?php echo $site->MailCc->viewAttributes() ?>>
<?php echo $site->MailCc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($site->bool_ativo_site->Visible) { // bool_ativo_site ?>
		<td<?php echo $site->bool_ativo_site->cellAttributes() ?>>
<span id="el<?php echo $site_delete->RowCnt ?>_site_bool_ativo_site" class="site_bool_ativo_site">
<span<?php echo $site->bool_ativo_site->viewAttributes() ?>>
<?php echo $site->bool_ativo_site->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$site_delete->Recordset->moveNext();
}
$site_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $site_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$site_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$site_delete->terminate();
?>
