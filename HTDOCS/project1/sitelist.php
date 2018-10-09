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
$site_list = new site_list();

// Run the page
$site_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$site_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsitelist = currentForm = new ew.Form("fsitelist", "list");
fsitelist.formKeyCountName = '<?php echo $site_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsitelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsitelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsitelistsrch = currentSearchForm = new ew.Form("fsitelistsrch");

// Filters
fsitelistsrch.filterList = <?php echo $site_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($site_list->TotalRecs > 0 && $site_list->ExportOptions->visible()) { ?>
<?php $site_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($site_list->ImportOptions->visible()) { ?>
<?php $site_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($site_list->SearchOptions->visible()) { ?>
<?php $site_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($site_list->FilterOptions->visible()) { ?>
<?php $site_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$site_list->renderOtherOptions();
?>
<?php if (!$site->isExport() && !$site->CurrentAction) { ?>
<form name="fsitelistsrch" id="fsitelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($site_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsitelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="site">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($site_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($site_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $site_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($site_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($site_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($site_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($site_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $site_list->showPageHeader(); ?>
<?php
$site_list->showMessage();
?>
<?php if ($site_list->TotalRecs > 0 || $site->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($site_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> site">
<form name="fsitelist" id="fsitelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($site_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $site_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="site">
<div id="gmp_site" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($site_list->TotalRecs > 0 || $site->isGridEdit()) { ?>
<table id="tbl_sitelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$site_list->RowType = ROWTYPE_HEADER;

// Render list options
$site_list->renderListOptions();

// Render list options (header, left)
$site_list->ListOptions->render("header", "left");
?>
<?php if ($site->ID_SITE->Visible) { // ID_SITE ?>
	<?php if ($site->sortUrl($site->ID_SITE) == "") { ?>
		<th data-name="ID_SITE" class="<?php echo $site->ID_SITE->headerCellClass() ?>"><div id="elh_site_ID_SITE" class="site_ID_SITE"><div class="ew-table-header-caption"><?php echo $site->ID_SITE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID_SITE" class="<?php echo $site->ID_SITE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->ID_SITE) ?>',1);"><div id="elh_site_ID_SITE" class="site_ID_SITE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->ID_SITE->caption() ?></span><span class="ew-table-header-sort"><?php if ($site->ID_SITE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->ID_SITE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->NOME_EMPRESA->Visible) { // NOME_EMPRESA ?>
	<?php if ($site->sortUrl($site->NOME_EMPRESA) == "") { ?>
		<th data-name="NOME_EMPRESA" class="<?php echo $site->NOME_EMPRESA->headerCellClass() ?>"><div id="elh_site_NOME_EMPRESA" class="site_NOME_EMPRESA"><div class="ew-table-header-caption"><?php echo $site->NOME_EMPRESA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOME_EMPRESA" class="<?php echo $site->NOME_EMPRESA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->NOME_EMPRESA) ?>',1);"><div id="elh_site_NOME_EMPRESA" class="site_NOME_EMPRESA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->NOME_EMPRESA->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->NOME_EMPRESA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->NOME_EMPRESA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->NOME_CIDADE->Visible) { // NOME_CIDADE ?>
	<?php if ($site->sortUrl($site->NOME_CIDADE) == "") { ?>
		<th data-name="NOME_CIDADE" class="<?php echo $site->NOME_CIDADE->headerCellClass() ?>"><div id="elh_site_NOME_CIDADE" class="site_NOME_CIDADE"><div class="ew-table-header-caption"><?php echo $site->NOME_CIDADE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOME_CIDADE" class="<?php echo $site->NOME_CIDADE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->NOME_CIDADE) ?>',1);"><div id="elh_site_NOME_CIDADE" class="site_NOME_CIDADE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->NOME_CIDADE->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->NOME_CIDADE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->NOME_CIDADE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->ESTADO->Visible) { // ESTADO ?>
	<?php if ($site->sortUrl($site->ESTADO) == "") { ?>
		<th data-name="ESTADO" class="<?php echo $site->ESTADO->headerCellClass() ?>"><div id="elh_site_ESTADO" class="site_ESTADO"><div class="ew-table-header-caption"><?php echo $site->ESTADO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ESTADO" class="<?php echo $site->ESTADO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->ESTADO) ?>',1);"><div id="elh_site_ESTADO" class="site_ESTADO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->ESTADO->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->ESTADO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->ESTADO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->FONE->Visible) { // FONE ?>
	<?php if ($site->sortUrl($site->FONE) == "") { ?>
		<th data-name="FONE" class="<?php echo $site->FONE->headerCellClass() ?>"><div id="elh_site_FONE" class="site_FONE"><div class="ew-table-header-caption"><?php echo $site->FONE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FONE" class="<?php echo $site->FONE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->FONE) ?>',1);"><div id="elh_site_FONE" class="site_FONE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->FONE->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->FONE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->FONE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->FONE_APP->Visible) { // FONE_APP ?>
	<?php if ($site->sortUrl($site->FONE_APP) == "") { ?>
		<th data-name="FONE_APP" class="<?php echo $site->FONE_APP->headerCellClass() ?>"><div id="elh_site_FONE_APP" class="site_FONE_APP"><div class="ew-table-header-caption"><?php echo $site->FONE_APP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FONE_APP" class="<?php echo $site->FONE_APP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->FONE_APP) ?>',1);"><div id="elh_site_FONE_APP" class="site_FONE_APP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->FONE_APP->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->FONE_APP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->FONE_APP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->_EMAIL->Visible) { // EMAIL ?>
	<?php if ($site->sortUrl($site->_EMAIL) == "") { ?>
		<th data-name="_EMAIL" class="<?php echo $site->_EMAIL->headerCellClass() ?>"><div id="elh_site__EMAIL" class="site__EMAIL"><div class="ew-table-header-caption"><?php echo $site->_EMAIL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_EMAIL" class="<?php echo $site->_EMAIL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->_EMAIL) ?>',1);"><div id="elh_site__EMAIL" class="site__EMAIL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->_EMAIL->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->_EMAIL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->_EMAIL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->sendusername->Visible) { // sendusername ?>
	<?php if ($site->sortUrl($site->sendusername) == "") { ?>
		<th data-name="sendusername" class="<?php echo $site->sendusername->headerCellClass() ?>"><div id="elh_site_sendusername" class="site_sendusername"><div class="ew-table-header-caption"><?php echo $site->sendusername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sendusername" class="<?php echo $site->sendusername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->sendusername) ?>',1);"><div id="elh_site_sendusername" class="site_sendusername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->sendusername->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->sendusername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->sendusername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->sendpassword->Visible) { // sendpassword ?>
	<?php if ($site->sortUrl($site->sendpassword) == "") { ?>
		<th data-name="sendpassword" class="<?php echo $site->sendpassword->headerCellClass() ?>"><div id="elh_site_sendpassword" class="site_sendpassword"><div class="ew-table-header-caption"><?php echo $site->sendpassword->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sendpassword" class="<?php echo $site->sendpassword->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->sendpassword) ?>',1);"><div id="elh_site_sendpassword" class="site_sendpassword">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->sendpassword->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->sendpassword->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->sendpassword->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->smtpserver->Visible) { // smtpserver ?>
	<?php if ($site->sortUrl($site->smtpserver) == "") { ?>
		<th data-name="smtpserver" class="<?php echo $site->smtpserver->headerCellClass() ?>"><div id="elh_site_smtpserver" class="site_smtpserver"><div class="ew-table-header-caption"><?php echo $site->smtpserver->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="smtpserver" class="<?php echo $site->smtpserver->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->smtpserver) ?>',1);"><div id="elh_site_smtpserver" class="site_smtpserver">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->smtpserver->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->smtpserver->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->smtpserver->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->smtpserverport->Visible) { // smtpserverport ?>
	<?php if ($site->sortUrl($site->smtpserverport) == "") { ?>
		<th data-name="smtpserverport" class="<?php echo $site->smtpserverport->headerCellClass() ?>"><div id="elh_site_smtpserverport" class="site_smtpserverport"><div class="ew-table-header-caption"><?php echo $site->smtpserverport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="smtpserverport" class="<?php echo $site->smtpserverport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->smtpserverport) ?>',1);"><div id="elh_site_smtpserverport" class="site_smtpserverport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->smtpserverport->caption() ?></span><span class="ew-table-header-sort"><?php if ($site->smtpserverport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->smtpserverport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->MailFrom->Visible) { // MailFrom ?>
	<?php if ($site->sortUrl($site->MailFrom) == "") { ?>
		<th data-name="MailFrom" class="<?php echo $site->MailFrom->headerCellClass() ?>"><div id="elh_site_MailFrom" class="site_MailFrom"><div class="ew-table-header-caption"><?php echo $site->MailFrom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MailFrom" class="<?php echo $site->MailFrom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->MailFrom) ?>',1);"><div id="elh_site_MailFrom" class="site_MailFrom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->MailFrom->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->MailFrom->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->MailFrom->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->MailTo->Visible) { // MailTo ?>
	<?php if ($site->sortUrl($site->MailTo) == "") { ?>
		<th data-name="MailTo" class="<?php echo $site->MailTo->headerCellClass() ?>"><div id="elh_site_MailTo" class="site_MailTo"><div class="ew-table-header-caption"><?php echo $site->MailTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MailTo" class="<?php echo $site->MailTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->MailTo) ?>',1);"><div id="elh_site_MailTo" class="site_MailTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->MailTo->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->MailTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->MailTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->MailCc->Visible) { // MailCc ?>
	<?php if ($site->sortUrl($site->MailCc) == "") { ?>
		<th data-name="MailCc" class="<?php echo $site->MailCc->headerCellClass() ?>"><div id="elh_site_MailCc" class="site_MailCc"><div class="ew-table-header-caption"><?php echo $site->MailCc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MailCc" class="<?php echo $site->MailCc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->MailCc) ?>',1);"><div id="elh_site_MailCc" class="site_MailCc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->MailCc->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($site->MailCc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->MailCc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($site->bool_ativo_site->Visible) { // bool_ativo_site ?>
	<?php if ($site->sortUrl($site->bool_ativo_site) == "") { ?>
		<th data-name="bool_ativo_site" class="<?php echo $site->bool_ativo_site->headerCellClass() ?>"><div id="elh_site_bool_ativo_site" class="site_bool_ativo_site"><div class="ew-table-header-caption"><?php echo $site->bool_ativo_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_site" class="<?php echo $site->bool_ativo_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $site->SortUrl($site->bool_ativo_site) ?>',1);"><div id="elh_site_bool_ativo_site" class="site_bool_ativo_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $site->bool_ativo_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($site->bool_ativo_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($site->bool_ativo_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$site_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($site->ExportAll && $site->isExport()) {
	$site_list->StopRec = $site_list->TotalRecs;
} else {

	// Set the last record to display
	if ($site_list->TotalRecs > $site_list->StartRec + $site_list->DisplayRecs - 1)
		$site_list->StopRec = $site_list->StartRec + $site_list->DisplayRecs - 1;
	else
		$site_list->StopRec = $site_list->TotalRecs;
}
$site_list->RecCnt = $site_list->StartRec - 1;
if ($site_list->Recordset && !$site_list->Recordset->EOF) {
	$site_list->Recordset->moveFirst();
	$selectLimit = $site_list->UseSelectLimit;
	if (!$selectLimit && $site_list->StartRec > 1)
		$site_list->Recordset->move($site_list->StartRec - 1);
} elseif (!$site->AllowAddDeleteRow && $site_list->StopRec == 0) {
	$site_list->StopRec = $site->GridAddRowCount;
}

// Initialize aggregate
$site->RowType = ROWTYPE_AGGREGATEINIT;
$site->resetAttributes();
$site_list->renderRow();
while ($site_list->RecCnt < $site_list->StopRec) {
	$site_list->RecCnt++;
	if ($site_list->RecCnt >= $site_list->StartRec) {
		$site_list->RowCnt++;

		// Set up key count
		$site_list->KeyCount = $site_list->RowIndex;

		// Init row class and style
		$site->resetAttributes();
		$site->CssClass = "";
		if ($site->isGridAdd()) {
		} else {
			$site_list->loadRowValues($site_list->Recordset); // Load row values
		}
		$site->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$site->RowAttrs = array_merge($site->RowAttrs, array('data-rowindex'=>$site_list->RowCnt, 'id'=>'r' . $site_list->RowCnt . '_site', 'data-rowtype'=>$site->RowType));

		// Render row
		$site_list->renderRow();

		// Render list options
		$site_list->renderListOptions();
?>
	<tr<?php echo $site->rowAttributes() ?>>
<?php

// Render list options (body, left)
$site_list->ListOptions->render("body", "left", $site_list->RowCnt);
?>
	<?php if ($site->ID_SITE->Visible) { // ID_SITE ?>
		<td data-name="ID_SITE"<?php echo $site->ID_SITE->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_ID_SITE" class="site_ID_SITE">
<span<?php echo $site->ID_SITE->viewAttributes() ?>>
<?php echo $site->ID_SITE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->NOME_EMPRESA->Visible) { // NOME_EMPRESA ?>
		<td data-name="NOME_EMPRESA"<?php echo $site->NOME_EMPRESA->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_NOME_EMPRESA" class="site_NOME_EMPRESA">
<span<?php echo $site->NOME_EMPRESA->viewAttributes() ?>>
<?php echo $site->NOME_EMPRESA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->NOME_CIDADE->Visible) { // NOME_CIDADE ?>
		<td data-name="NOME_CIDADE"<?php echo $site->NOME_CIDADE->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_NOME_CIDADE" class="site_NOME_CIDADE">
<span<?php echo $site->NOME_CIDADE->viewAttributes() ?>>
<?php echo $site->NOME_CIDADE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->ESTADO->Visible) { // ESTADO ?>
		<td data-name="ESTADO"<?php echo $site->ESTADO->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_ESTADO" class="site_ESTADO">
<span<?php echo $site->ESTADO->viewAttributes() ?>>
<?php echo $site->ESTADO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->FONE->Visible) { // FONE ?>
		<td data-name="FONE"<?php echo $site->FONE->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_FONE" class="site_FONE">
<span<?php echo $site->FONE->viewAttributes() ?>>
<?php echo $site->FONE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->FONE_APP->Visible) { // FONE_APP ?>
		<td data-name="FONE_APP"<?php echo $site->FONE_APP->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_FONE_APP" class="site_FONE_APP">
<span<?php echo $site->FONE_APP->viewAttributes() ?>>
<?php echo $site->FONE_APP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->_EMAIL->Visible) { // EMAIL ?>
		<td data-name="_EMAIL"<?php echo $site->_EMAIL->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site__EMAIL" class="site__EMAIL">
<span<?php echo $site->_EMAIL->viewAttributes() ?>>
<?php echo $site->_EMAIL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->sendusername->Visible) { // sendusername ?>
		<td data-name="sendusername"<?php echo $site->sendusername->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_sendusername" class="site_sendusername">
<span<?php echo $site->sendusername->viewAttributes() ?>>
<?php echo $site->sendusername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->sendpassword->Visible) { // sendpassword ?>
		<td data-name="sendpassword"<?php echo $site->sendpassword->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_sendpassword" class="site_sendpassword">
<span<?php echo $site->sendpassword->viewAttributes() ?>>
<?php echo $site->sendpassword->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->smtpserver->Visible) { // smtpserver ?>
		<td data-name="smtpserver"<?php echo $site->smtpserver->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_smtpserver" class="site_smtpserver">
<span<?php echo $site->smtpserver->viewAttributes() ?>>
<?php echo $site->smtpserver->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->smtpserverport->Visible) { // smtpserverport ?>
		<td data-name="smtpserverport"<?php echo $site->smtpserverport->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_smtpserverport" class="site_smtpserverport">
<span<?php echo $site->smtpserverport->viewAttributes() ?>>
<?php echo $site->smtpserverport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->MailFrom->Visible) { // MailFrom ?>
		<td data-name="MailFrom"<?php echo $site->MailFrom->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_MailFrom" class="site_MailFrom">
<span<?php echo $site->MailFrom->viewAttributes() ?>>
<?php echo $site->MailFrom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->MailTo->Visible) { // MailTo ?>
		<td data-name="MailTo"<?php echo $site->MailTo->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_MailTo" class="site_MailTo">
<span<?php echo $site->MailTo->viewAttributes() ?>>
<?php echo $site->MailTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->MailCc->Visible) { // MailCc ?>
		<td data-name="MailCc"<?php echo $site->MailCc->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_MailCc" class="site_MailCc">
<span<?php echo $site->MailCc->viewAttributes() ?>>
<?php echo $site->MailCc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($site->bool_ativo_site->Visible) { // bool_ativo_site ?>
		<td data-name="bool_ativo_site"<?php echo $site->bool_ativo_site->cellAttributes() ?>>
<span id="el<?php echo $site_list->RowCnt ?>_site_bool_ativo_site" class="site_bool_ativo_site">
<span<?php echo $site->bool_ativo_site->viewAttributes() ?>>
<?php echo $site->bool_ativo_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$site_list->ListOptions->render("body", "right", $site_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$site->isGridAdd())
		$site_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$site->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($site_list->Recordset)
	$site_list->Recordset->Close();
?>
<?php if (!$site->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$site->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($site_list->Pager)) $site_list->Pager = new PrevNextPager($site_list->StartRec, $site_list->DisplayRecs, $site_list->TotalRecs, $site_list->AutoHidePager) ?>
<?php if ($site_list->Pager->RecordCount > 0 && $site_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($site_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $site_list->pageUrl() ?>start=<?php echo $site_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($site_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $site_list->pageUrl() ?>start=<?php echo $site_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $site_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($site_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $site_list->pageUrl() ?>start=<?php echo $site_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($site_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $site_list->pageUrl() ?>start=<?php echo $site_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $site_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($site_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $site_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $site_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $site_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($site_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($site_list->TotalRecs == 0 && !$site->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($site_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$site_list->showPageFooter();
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
$site_list->terminate();
?>
