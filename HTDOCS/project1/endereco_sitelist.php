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
$endereco_site_list = new endereco_site_list();

// Run the page
$endereco_site_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$endereco_site_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$endereco_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fendereco_sitelist = currentForm = new ew.Form("fendereco_sitelist", "list");
fendereco_sitelist.formKeyCountName = '<?php echo $endereco_site_list->FormKeyCountName ?>';

// Form_CustomValidate event
fendereco_sitelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fendereco_sitelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fendereco_sitelistsrch = currentSearchForm = new ew.Form("fendereco_sitelistsrch");

// Filters
fendereco_sitelistsrch.filterList = <?php echo $endereco_site_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$endereco_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($endereco_site_list->TotalRecs > 0 && $endereco_site_list->ExportOptions->visible()) { ?>
<?php $endereco_site_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($endereco_site_list->ImportOptions->visible()) { ?>
<?php $endereco_site_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($endereco_site_list->SearchOptions->visible()) { ?>
<?php $endereco_site_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($endereco_site_list->FilterOptions->visible()) { ?>
<?php $endereco_site_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$endereco_site_list->renderOtherOptions();
?>
<?php if (!$endereco_site->isExport() && !$endereco_site->CurrentAction) { ?>
<form name="fendereco_sitelistsrch" id="fendereco_sitelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($endereco_site_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fendereco_sitelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="endereco_site">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($endereco_site_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($endereco_site_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $endereco_site_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($endereco_site_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($endereco_site_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($endereco_site_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($endereco_site_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $endereco_site_list->showPageHeader(); ?>
<?php
$endereco_site_list->showMessage();
?>
<?php if ($endereco_site_list->TotalRecs > 0 || $endereco_site->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($endereco_site_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> endereco_site">
<form name="fendereco_sitelist" id="fendereco_sitelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($endereco_site_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $endereco_site_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="endereco_site">
<div id="gmp_endereco_site" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($endereco_site_list->TotalRecs > 0 || $endereco_site->isGridEdit()) { ?>
<table id="tbl_endereco_sitelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$endereco_site_list->RowType = ROWTYPE_HEADER;

// Render list options
$endereco_site_list->renderListOptions();

// Render list options (header, left)
$endereco_site_list->ListOptions->render("header", "left");
?>
<?php if ($endereco_site->id_endereco_site->Visible) { // id_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->id_endereco_site) == "") { ?>
		<th data-name="id_endereco_site" class="<?php echo $endereco_site->id_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_id_endereco_site" class="endereco_site_id_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->id_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_endereco_site" class="<?php echo $endereco_site->id_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->id_endereco_site) ?>',1);"><div id="elh_endereco_site_id_endereco_site" class="endereco_site_id_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->id_endereco_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->id_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->id_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->descricao_endereco_site->Visible) { // descricao_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->descricao_endereco_site) == "") { ?>
		<th data-name="descricao_endereco_site" class="<?php echo $endereco_site->descricao_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_descricao_endereco_site" class="endereco_site_descricao_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->descricao_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_endereco_site" class="<?php echo $endereco_site->descricao_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->descricao_endereco_site) ?>',1);"><div id="elh_endereco_site_descricao_endereco_site" class="endereco_site_descricao_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->descricao_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->descricao_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->descricao_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->endereco_endereco_site->Visible) { // endereco_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->endereco_endereco_site) == "") { ?>
		<th data-name="endereco_endereco_site" class="<?php echo $endereco_site->endereco_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_endereco_endereco_site" class="endereco_site_endereco_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->endereco_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="endereco_endereco_site" class="<?php echo $endereco_site->endereco_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->endereco_endereco_site) ?>',1);"><div id="elh_endereco_site_endereco_endereco_site" class="endereco_site_endereco_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->endereco_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->endereco_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->endereco_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->numero_endereco_site->Visible) { // numero_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->numero_endereco_site) == "") { ?>
		<th data-name="numero_endereco_site" class="<?php echo $endereco_site->numero_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_numero_endereco_site" class="endereco_site_numero_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->numero_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="numero_endereco_site" class="<?php echo $endereco_site->numero_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->numero_endereco_site) ?>',1);"><div id="elh_endereco_site_numero_endereco_site" class="endereco_site_numero_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->numero_endereco_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->numero_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->numero_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->complemento_endereco_site->Visible) { // complemento_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->complemento_endereco_site) == "") { ?>
		<th data-name="complemento_endereco_site" class="<?php echo $endereco_site->complemento_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_complemento_endereco_site" class="endereco_site_complemento_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->complemento_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="complemento_endereco_site" class="<?php echo $endereco_site->complemento_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->complemento_endereco_site) ?>',1);"><div id="elh_endereco_site_complemento_endereco_site" class="endereco_site_complemento_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->complemento_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->complemento_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->complemento_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->bairro_endereco_site->Visible) { // bairro_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->bairro_endereco_site) == "") { ?>
		<th data-name="bairro_endereco_site" class="<?php echo $endereco_site->bairro_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_bairro_endereco_site" class="endereco_site_bairro_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->bairro_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bairro_endereco_site" class="<?php echo $endereco_site->bairro_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->bairro_endereco_site) ?>',1);"><div id="elh_endereco_site_bairro_endereco_site" class="endereco_site_bairro_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->bairro_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->bairro_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->bairro_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->cidade_endereco_site->Visible) { // cidade_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->cidade_endereco_site) == "") { ?>
		<th data-name="cidade_endereco_site" class="<?php echo $endereco_site->cidade_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_cidade_endereco_site" class="endereco_site_cidade_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->cidade_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cidade_endereco_site" class="<?php echo $endereco_site->cidade_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->cidade_endereco_site) ?>',1);"><div id="elh_endereco_site_cidade_endereco_site" class="endereco_site_cidade_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->cidade_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->cidade_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->cidade_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->estado_id->Visible) { // estado_id ?>
	<?php if ($endereco_site->sortUrl($endereco_site->estado_id) == "") { ?>
		<th data-name="estado_id" class="<?php echo $endereco_site->estado_id->headerCellClass() ?>"><div id="elh_endereco_site_estado_id" class="endereco_site_estado_id"><div class="ew-table-header-caption"><?php echo $endereco_site->estado_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_id" class="<?php echo $endereco_site->estado_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->estado_id) ?>',1);"><div id="elh_endereco_site_estado_id" class="endereco_site_estado_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->estado_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->estado_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->estado_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->cep_endereco_site->Visible) { // cep_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->cep_endereco_site) == "") { ?>
		<th data-name="cep_endereco_site" class="<?php echo $endereco_site->cep_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_cep_endereco_site" class="endereco_site_cep_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->cep_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cep_endereco_site" class="<?php echo $endereco_site->cep_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->cep_endereco_site) ?>',1);"><div id="elh_endereco_site_cep_endereco_site" class="endereco_site_cep_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->cep_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->cep_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->cep_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->telefone_endereco_site->Visible) { // telefone_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->telefone_endereco_site) == "") { ?>
		<th data-name="telefone_endereco_site" class="<?php echo $endereco_site->telefone_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_telefone_endereco_site" class="endereco_site_telefone_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->telefone_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefone_endereco_site" class="<?php echo $endereco_site->telefone_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->telefone_endereco_site) ?>',1);"><div id="elh_endereco_site_telefone_endereco_site" class="endereco_site_telefone_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->telefone_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->telefone_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->telefone_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->celular_endereco_site->Visible) { // celular_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->celular_endereco_site) == "") { ?>
		<th data-name="celular_endereco_site" class="<?php echo $endereco_site->celular_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_celular_endereco_site" class="endereco_site_celular_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->celular_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="celular_endereco_site" class="<?php echo $endereco_site->celular_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->celular_endereco_site) ?>',1);"><div id="elh_endereco_site_celular_endereco_site" class="endereco_site_celular_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->celular_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->celular_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->celular_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->email_endereco_site->Visible) { // email_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->email_endereco_site) == "") { ?>
		<th data-name="email_endereco_site" class="<?php echo $endereco_site->email_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_email_endereco_site" class="endereco_site_email_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->email_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_endereco_site" class="<?php echo $endereco_site->email_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->email_endereco_site) ?>',1);"><div id="elh_endereco_site_email_endereco_site" class="endereco_site_email_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->email_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->email_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->email_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->latitude_endereco_site->Visible) { // latitude_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->latitude_endereco_site) == "") { ?>
		<th data-name="latitude_endereco_site" class="<?php echo $endereco_site->latitude_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_latitude_endereco_site" class="endereco_site_latitude_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->latitude_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="latitude_endereco_site" class="<?php echo $endereco_site->latitude_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->latitude_endereco_site) ?>',1);"><div id="elh_endereco_site_latitude_endereco_site" class="endereco_site_latitude_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->latitude_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->latitude_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->latitude_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->longitude_endereco_site->Visible) { // longitude_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->longitude_endereco_site) == "") { ?>
		<th data-name="longitude_endereco_site" class="<?php echo $endereco_site->longitude_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_longitude_endereco_site" class="endereco_site_longitude_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->longitude_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="longitude_endereco_site" class="<?php echo $endereco_site->longitude_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->longitude_endereco_site) ?>',1);"><div id="elh_endereco_site_longitude_endereco_site" class="endereco_site_longitude_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->longitude_endereco_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->longitude_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->longitude_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->data_atualizacao_endereco_site->Visible) { // data_atualizacao_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->data_atualizacao_endereco_site) == "") { ?>
		<th data-name="data_atualizacao_endereco_site" class="<?php echo $endereco_site->data_atualizacao_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_data_atualizacao_endereco_site" class="endereco_site_data_atualizacao_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->data_atualizacao_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_endereco_site" class="<?php echo $endereco_site->data_atualizacao_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->data_atualizacao_endereco_site) ?>',1);"><div id="elh_endereco_site_data_atualizacao_endereco_site" class="endereco_site_data_atualizacao_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->data_atualizacao_endereco_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->data_atualizacao_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->data_atualizacao_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->usuario_id->Visible) { // usuario_id ?>
	<?php if ($endereco_site->sortUrl($endereco_site->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $endereco_site->usuario_id->headerCellClass() ?>"><div id="elh_endereco_site_usuario_id" class="endereco_site_usuario_id"><div class="ew-table-header-caption"><?php echo $endereco_site->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $endereco_site->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->usuario_id) ?>',1);"><div id="elh_endereco_site_usuario_id" class="endereco_site_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($endereco_site->bool_ativo_endereco_site->Visible) { // bool_ativo_endereco_site ?>
	<?php if ($endereco_site->sortUrl($endereco_site->bool_ativo_endereco_site) == "") { ?>
		<th data-name="bool_ativo_endereco_site" class="<?php echo $endereco_site->bool_ativo_endereco_site->headerCellClass() ?>"><div id="elh_endereco_site_bool_ativo_endereco_site" class="endereco_site_bool_ativo_endereco_site"><div class="ew-table-header-caption"><?php echo $endereco_site->bool_ativo_endereco_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_endereco_site" class="<?php echo $endereco_site->bool_ativo_endereco_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $endereco_site->SortUrl($endereco_site->bool_ativo_endereco_site) ?>',1);"><div id="elh_endereco_site_bool_ativo_endereco_site" class="endereco_site_bool_ativo_endereco_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $endereco_site->bool_ativo_endereco_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($endereco_site->bool_ativo_endereco_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($endereco_site->bool_ativo_endereco_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$endereco_site_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($endereco_site->ExportAll && $endereco_site->isExport()) {
	$endereco_site_list->StopRec = $endereco_site_list->TotalRecs;
} else {

	// Set the last record to display
	if ($endereco_site_list->TotalRecs > $endereco_site_list->StartRec + $endereco_site_list->DisplayRecs - 1)
		$endereco_site_list->StopRec = $endereco_site_list->StartRec + $endereco_site_list->DisplayRecs - 1;
	else
		$endereco_site_list->StopRec = $endereco_site_list->TotalRecs;
}
$endereco_site_list->RecCnt = $endereco_site_list->StartRec - 1;
if ($endereco_site_list->Recordset && !$endereco_site_list->Recordset->EOF) {
	$endereco_site_list->Recordset->moveFirst();
	$selectLimit = $endereco_site_list->UseSelectLimit;
	if (!$selectLimit && $endereco_site_list->StartRec > 1)
		$endereco_site_list->Recordset->move($endereco_site_list->StartRec - 1);
} elseif (!$endereco_site->AllowAddDeleteRow && $endereco_site_list->StopRec == 0) {
	$endereco_site_list->StopRec = $endereco_site->GridAddRowCount;
}

// Initialize aggregate
$endereco_site->RowType = ROWTYPE_AGGREGATEINIT;
$endereco_site->resetAttributes();
$endereco_site_list->renderRow();
while ($endereco_site_list->RecCnt < $endereco_site_list->StopRec) {
	$endereco_site_list->RecCnt++;
	if ($endereco_site_list->RecCnt >= $endereco_site_list->StartRec) {
		$endereco_site_list->RowCnt++;

		// Set up key count
		$endereco_site_list->KeyCount = $endereco_site_list->RowIndex;

		// Init row class and style
		$endereco_site->resetAttributes();
		$endereco_site->CssClass = "";
		if ($endereco_site->isGridAdd()) {
		} else {
			$endereco_site_list->loadRowValues($endereco_site_list->Recordset); // Load row values
		}
		$endereco_site->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$endereco_site->RowAttrs = array_merge($endereco_site->RowAttrs, array('data-rowindex'=>$endereco_site_list->RowCnt, 'id'=>'r' . $endereco_site_list->RowCnt . '_endereco_site', 'data-rowtype'=>$endereco_site->RowType));

		// Render row
		$endereco_site_list->renderRow();

		// Render list options
		$endereco_site_list->renderListOptions();
?>
	<tr<?php echo $endereco_site->rowAttributes() ?>>
<?php

// Render list options (body, left)
$endereco_site_list->ListOptions->render("body", "left", $endereco_site_list->RowCnt);
?>
	<?php if ($endereco_site->id_endereco_site->Visible) { // id_endereco_site ?>
		<td data-name="id_endereco_site"<?php echo $endereco_site->id_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_id_endereco_site" class="endereco_site_id_endereco_site">
<span<?php echo $endereco_site->id_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->id_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->descricao_endereco_site->Visible) { // descricao_endereco_site ?>
		<td data-name="descricao_endereco_site"<?php echo $endereco_site->descricao_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_descricao_endereco_site" class="endereco_site_descricao_endereco_site">
<span<?php echo $endereco_site->descricao_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->descricao_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->endereco_endereco_site->Visible) { // endereco_endereco_site ?>
		<td data-name="endereco_endereco_site"<?php echo $endereco_site->endereco_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_endereco_endereco_site" class="endereco_site_endereco_endereco_site">
<span<?php echo $endereco_site->endereco_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->endereco_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->numero_endereco_site->Visible) { // numero_endereco_site ?>
		<td data-name="numero_endereco_site"<?php echo $endereco_site->numero_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_numero_endereco_site" class="endereco_site_numero_endereco_site">
<span<?php echo $endereco_site->numero_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->numero_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->complemento_endereco_site->Visible) { // complemento_endereco_site ?>
		<td data-name="complemento_endereco_site"<?php echo $endereco_site->complemento_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_complemento_endereco_site" class="endereco_site_complemento_endereco_site">
<span<?php echo $endereco_site->complemento_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->complemento_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->bairro_endereco_site->Visible) { // bairro_endereco_site ?>
		<td data-name="bairro_endereco_site"<?php echo $endereco_site->bairro_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_bairro_endereco_site" class="endereco_site_bairro_endereco_site">
<span<?php echo $endereco_site->bairro_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->bairro_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->cidade_endereco_site->Visible) { // cidade_endereco_site ?>
		<td data-name="cidade_endereco_site"<?php echo $endereco_site->cidade_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_cidade_endereco_site" class="endereco_site_cidade_endereco_site">
<span<?php echo $endereco_site->cidade_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->cidade_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->estado_id->Visible) { // estado_id ?>
		<td data-name="estado_id"<?php echo $endereco_site->estado_id->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_estado_id" class="endereco_site_estado_id">
<span<?php echo $endereco_site->estado_id->viewAttributes() ?>>
<?php echo $endereco_site->estado_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->cep_endereco_site->Visible) { // cep_endereco_site ?>
		<td data-name="cep_endereco_site"<?php echo $endereco_site->cep_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_cep_endereco_site" class="endereco_site_cep_endereco_site">
<span<?php echo $endereco_site->cep_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->cep_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->telefone_endereco_site->Visible) { // telefone_endereco_site ?>
		<td data-name="telefone_endereco_site"<?php echo $endereco_site->telefone_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_telefone_endereco_site" class="endereco_site_telefone_endereco_site">
<span<?php echo $endereco_site->telefone_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->telefone_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->celular_endereco_site->Visible) { // celular_endereco_site ?>
		<td data-name="celular_endereco_site"<?php echo $endereco_site->celular_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_celular_endereco_site" class="endereco_site_celular_endereco_site">
<span<?php echo $endereco_site->celular_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->celular_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->email_endereco_site->Visible) { // email_endereco_site ?>
		<td data-name="email_endereco_site"<?php echo $endereco_site->email_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_email_endereco_site" class="endereco_site_email_endereco_site">
<span<?php echo $endereco_site->email_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->email_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->latitude_endereco_site->Visible) { // latitude_endereco_site ?>
		<td data-name="latitude_endereco_site"<?php echo $endereco_site->latitude_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_latitude_endereco_site" class="endereco_site_latitude_endereco_site">
<span<?php echo $endereco_site->latitude_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->latitude_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->longitude_endereco_site->Visible) { // longitude_endereco_site ?>
		<td data-name="longitude_endereco_site"<?php echo $endereco_site->longitude_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_longitude_endereco_site" class="endereco_site_longitude_endereco_site">
<span<?php echo $endereco_site->longitude_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->longitude_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->data_atualizacao_endereco_site->Visible) { // data_atualizacao_endereco_site ?>
		<td data-name="data_atualizacao_endereco_site"<?php echo $endereco_site->data_atualizacao_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_data_atualizacao_endereco_site" class="endereco_site_data_atualizacao_endereco_site">
<span<?php echo $endereco_site->data_atualizacao_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->data_atualizacao_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $endereco_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_usuario_id" class="endereco_site_usuario_id">
<span<?php echo $endereco_site->usuario_id->viewAttributes() ?>>
<?php echo $endereco_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($endereco_site->bool_ativo_endereco_site->Visible) { // bool_ativo_endereco_site ?>
		<td data-name="bool_ativo_endereco_site"<?php echo $endereco_site->bool_ativo_endereco_site->cellAttributes() ?>>
<span id="el<?php echo $endereco_site_list->RowCnt ?>_endereco_site_bool_ativo_endereco_site" class="endereco_site_bool_ativo_endereco_site">
<span<?php echo $endereco_site->bool_ativo_endereco_site->viewAttributes() ?>>
<?php echo $endereco_site->bool_ativo_endereco_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$endereco_site_list->ListOptions->render("body", "right", $endereco_site_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$endereco_site->isGridAdd())
		$endereco_site_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$endereco_site->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($endereco_site_list->Recordset)
	$endereco_site_list->Recordset->Close();
?>
<?php if (!$endereco_site->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$endereco_site->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($endereco_site_list->Pager)) $endereco_site_list->Pager = new PrevNextPager($endereco_site_list->StartRec, $endereco_site_list->DisplayRecs, $endereco_site_list->TotalRecs, $endereco_site_list->AutoHidePager) ?>
<?php if ($endereco_site_list->Pager->RecordCount > 0 && $endereco_site_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($endereco_site_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $endereco_site_list->pageUrl() ?>start=<?php echo $endereco_site_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($endereco_site_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $endereco_site_list->pageUrl() ?>start=<?php echo $endereco_site_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $endereco_site_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($endereco_site_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $endereco_site_list->pageUrl() ?>start=<?php echo $endereco_site_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($endereco_site_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $endereco_site_list->pageUrl() ?>start=<?php echo $endereco_site_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $endereco_site_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($endereco_site_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $endereco_site_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $endereco_site_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $endereco_site_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($endereco_site_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($endereco_site_list->TotalRecs == 0 && !$endereco_site->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($endereco_site_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$endereco_site_list->showPageFooter();
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
$endereco_site_list->terminate();
?>
