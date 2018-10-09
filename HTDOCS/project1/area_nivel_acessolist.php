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
$area_nivel_acesso_list = new area_nivel_acesso_list();

// Run the page
$area_nivel_acesso_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$area_nivel_acesso_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$area_nivel_acesso->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var farea_nivel_acessolist = currentForm = new ew.Form("farea_nivel_acessolist", "list");
farea_nivel_acessolist.formKeyCountName = '<?php echo $area_nivel_acesso_list->FormKeyCountName ?>';

// Form_CustomValidate event
farea_nivel_acessolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
farea_nivel_acessolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var farea_nivel_acessolistsrch = currentSearchForm = new ew.Form("farea_nivel_acessolistsrch");

// Filters
farea_nivel_acessolistsrch.filterList = <?php echo $area_nivel_acesso_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$area_nivel_acesso->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($area_nivel_acesso_list->TotalRecs > 0 && $area_nivel_acesso_list->ExportOptions->visible()) { ?>
<?php $area_nivel_acesso_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($area_nivel_acesso_list->ImportOptions->visible()) { ?>
<?php $area_nivel_acesso_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($area_nivel_acesso_list->SearchOptions->visible()) { ?>
<?php $area_nivel_acesso_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($area_nivel_acesso_list->FilterOptions->visible()) { ?>
<?php $area_nivel_acesso_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$area_nivel_acesso_list->renderOtherOptions();
?>
<?php if (!$area_nivel_acesso->isExport() && !$area_nivel_acesso->CurrentAction) { ?>
<form name="farea_nivel_acessolistsrch" id="farea_nivel_acessolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($area_nivel_acesso_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="farea_nivel_acessolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="area_nivel_acesso">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($area_nivel_acesso_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($area_nivel_acesso_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $area_nivel_acesso_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($area_nivel_acesso_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($area_nivel_acesso_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($area_nivel_acesso_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($area_nivel_acesso_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $area_nivel_acesso_list->showPageHeader(); ?>
<?php
$area_nivel_acesso_list->showMessage();
?>
<?php if ($area_nivel_acesso_list->TotalRecs > 0 || $area_nivel_acesso->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($area_nivel_acesso_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> area_nivel_acesso">
<form name="farea_nivel_acessolist" id="farea_nivel_acessolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($area_nivel_acesso_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $area_nivel_acesso_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="area_nivel_acesso">
<div id="gmp_area_nivel_acesso" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($area_nivel_acesso_list->TotalRecs > 0 || $area_nivel_acesso->isGridEdit()) { ?>
<table id="tbl_area_nivel_acessolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$area_nivel_acesso_list->RowType = ROWTYPE_HEADER;

// Render list options
$area_nivel_acesso_list->renderListOptions();

// Render list options (header, left)
$area_nivel_acesso_list->ListOptions->render("header", "left");
?>
<?php if ($area_nivel_acesso->id_area_nivel_acesso->Visible) { // id_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->id_area_nivel_acesso) == "") { ?>
		<th data-name="id_area_nivel_acesso" class="<?php echo $area_nivel_acesso->id_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_id_area_nivel_acesso" class="area_nivel_acesso_id_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->id_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_area_nivel_acesso" class="<?php echo $area_nivel_acesso->id_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->id_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_id_area_nivel_acesso" class="area_nivel_acesso_id_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->id_area_nivel_acesso->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->id_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->id_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->area_area_nivel_acesso->Visible) { // area_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->area_area_nivel_acesso) == "") { ?>
		<th data-name="area_area_nivel_acesso" class="<?php echo $area_nivel_acesso->area_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_area_area_nivel_acesso" class="area_nivel_acesso_area_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->area_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area_area_nivel_acesso" class="<?php echo $area_nivel_acesso->area_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->area_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_area_area_nivel_acesso" class="area_nivel_acesso_area_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->area_area_nivel_acesso->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->area_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->area_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->demostrativo_area_nivel_acesso->Visible) { // demostrativo_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->demostrativo_area_nivel_acesso) == "") { ?>
		<th data-name="demostrativo_area_nivel_acesso" class="<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_demostrativo_area_nivel_acesso" class="area_nivel_acesso_demostrativo_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="demostrativo_area_nivel_acesso" class="<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->demostrativo_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_demostrativo_area_nivel_acesso" class="area_nivel_acesso_demostrativo_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->demostrativo_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->demostrativo_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->bool_list_area_nivel_acesso->Visible) { // bool_list_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->bool_list_area_nivel_acesso) == "") { ?>
		<th data-name="bool_list_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_bool_list_area_nivel_acesso" class="area_nivel_acesso_bool_list_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_list_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->bool_list_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_bool_list_area_nivel_acesso" class="area_nivel_acesso_bool_list_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->bool_list_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->bool_list_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->bool_insert_area_nivel_acesso->Visible) { // bool_insert_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->bool_insert_area_nivel_acesso) == "") { ?>
		<th data-name="bool_insert_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_bool_insert_area_nivel_acesso" class="area_nivel_acesso_bool_insert_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_insert_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->bool_insert_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_bool_insert_area_nivel_acesso" class="area_nivel_acesso_bool_insert_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->bool_insert_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->bool_insert_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->bool_update_area_nivel_acesso->Visible) { // bool_update_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->bool_update_area_nivel_acesso) == "") { ?>
		<th data-name="bool_update_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_bool_update_area_nivel_acesso" class="area_nivel_acesso_bool_update_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_update_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->bool_update_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_bool_update_area_nivel_acesso" class="area_nivel_acesso_bool_update_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->bool_update_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->bool_update_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->nivel_acesso_id) == "") { ?>
		<th data-name="nivel_acesso_id" class="<?php echo $area_nivel_acesso->nivel_acesso_id->headerCellClass() ?>"><div id="elh_area_nivel_acesso_nivel_acesso_id" class="area_nivel_acesso_nivel_acesso_id"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->nivel_acesso_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nivel_acesso_id" class="<?php echo $area_nivel_acesso->nivel_acesso_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->nivel_acesso_id) ?>',1);"><div id="elh_area_nivel_acesso_nivel_acesso_id" class="area_nivel_acesso_nivel_acesso_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->nivel_acesso_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->nivel_acesso_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->nivel_acesso_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->Visible) { // data_atualizacao_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->data_atualizacao_area_nivel_acesso) == "") { ?>
		<th data-name="data_atualizacao_area_nivel_acesso" class="<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_data_atualizacao_area_nivel_acesso" class="area_nivel_acesso_data_atualizacao_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_area_nivel_acesso" class="<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->data_atualizacao_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_data_atualizacao_area_nivel_acesso" class="area_nivel_acesso_data_atualizacao_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->usuario_id->Visible) { // usuario_id ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $area_nivel_acesso->usuario_id->headerCellClass() ?>"><div id="elh_area_nivel_acesso_usuario_id" class="area_nivel_acesso_usuario_id"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $area_nivel_acesso->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->usuario_id) ?>',1);"><div id="elh_area_nivel_acesso_usuario_id" class="area_nivel_acesso_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($area_nivel_acesso->bool_ativo_area_nivel_acesso->Visible) { // bool_ativo_area_nivel_acesso ?>
	<?php if ($area_nivel_acesso->sortUrl($area_nivel_acesso->bool_ativo_area_nivel_acesso) == "") { ?>
		<th data-name="bool_ativo_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->headerCellClass() ?>"><div id="elh_area_nivel_acesso_bool_ativo_area_nivel_acesso" class="area_nivel_acesso_bool_ativo_area_nivel_acesso"><div class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_area_nivel_acesso" class="<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $area_nivel_acesso->SortUrl($area_nivel_acesso->bool_ativo_area_nivel_acesso) ?>',1);"><div id="elh_area_nivel_acesso_bool_ativo_area_nivel_acesso" class="area_nivel_acesso_bool_ativo_area_nivel_acesso">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->caption() ?></span><span class="ew-table-header-sort"><?php if ($area_nivel_acesso->bool_ativo_area_nivel_acesso->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($area_nivel_acesso->bool_ativo_area_nivel_acesso->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$area_nivel_acesso_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($area_nivel_acesso->ExportAll && $area_nivel_acesso->isExport()) {
	$area_nivel_acesso_list->StopRec = $area_nivel_acesso_list->TotalRecs;
} else {

	// Set the last record to display
	if ($area_nivel_acesso_list->TotalRecs > $area_nivel_acesso_list->StartRec + $area_nivel_acesso_list->DisplayRecs - 1)
		$area_nivel_acesso_list->StopRec = $area_nivel_acesso_list->StartRec + $area_nivel_acesso_list->DisplayRecs - 1;
	else
		$area_nivel_acesso_list->StopRec = $area_nivel_acesso_list->TotalRecs;
}
$area_nivel_acesso_list->RecCnt = $area_nivel_acesso_list->StartRec - 1;
if ($area_nivel_acesso_list->Recordset && !$area_nivel_acesso_list->Recordset->EOF) {
	$area_nivel_acesso_list->Recordset->moveFirst();
	$selectLimit = $area_nivel_acesso_list->UseSelectLimit;
	if (!$selectLimit && $area_nivel_acesso_list->StartRec > 1)
		$area_nivel_acesso_list->Recordset->move($area_nivel_acesso_list->StartRec - 1);
} elseif (!$area_nivel_acesso->AllowAddDeleteRow && $area_nivel_acesso_list->StopRec == 0) {
	$area_nivel_acesso_list->StopRec = $area_nivel_acesso->GridAddRowCount;
}

// Initialize aggregate
$area_nivel_acesso->RowType = ROWTYPE_AGGREGATEINIT;
$area_nivel_acesso->resetAttributes();
$area_nivel_acesso_list->renderRow();
while ($area_nivel_acesso_list->RecCnt < $area_nivel_acesso_list->StopRec) {
	$area_nivel_acesso_list->RecCnt++;
	if ($area_nivel_acesso_list->RecCnt >= $area_nivel_acesso_list->StartRec) {
		$area_nivel_acesso_list->RowCnt++;

		// Set up key count
		$area_nivel_acesso_list->KeyCount = $area_nivel_acesso_list->RowIndex;

		// Init row class and style
		$area_nivel_acesso->resetAttributes();
		$area_nivel_acesso->CssClass = "";
		if ($area_nivel_acesso->isGridAdd()) {
		} else {
			$area_nivel_acesso_list->loadRowValues($area_nivel_acesso_list->Recordset); // Load row values
		}
		$area_nivel_acesso->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$area_nivel_acesso->RowAttrs = array_merge($area_nivel_acesso->RowAttrs, array('data-rowindex'=>$area_nivel_acesso_list->RowCnt, 'id'=>'r' . $area_nivel_acesso_list->RowCnt . '_area_nivel_acesso', 'data-rowtype'=>$area_nivel_acesso->RowType));

		// Render row
		$area_nivel_acesso_list->renderRow();

		// Render list options
		$area_nivel_acesso_list->renderListOptions();
?>
	<tr<?php echo $area_nivel_acesso->rowAttributes() ?>>
<?php

// Render list options (body, left)
$area_nivel_acesso_list->ListOptions->render("body", "left", $area_nivel_acesso_list->RowCnt);
?>
	<?php if ($area_nivel_acesso->id_area_nivel_acesso->Visible) { // id_area_nivel_acesso ?>
		<td data-name="id_area_nivel_acesso"<?php echo $area_nivel_acesso->id_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_id_area_nivel_acesso" class="area_nivel_acesso_id_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->id_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->id_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->area_area_nivel_acesso->Visible) { // area_area_nivel_acesso ?>
		<td data-name="area_area_nivel_acesso"<?php echo $area_nivel_acesso->area_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_area_area_nivel_acesso" class="area_nivel_acesso_area_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->area_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->area_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->demostrativo_area_nivel_acesso->Visible) { // demostrativo_area_nivel_acesso ?>
		<td data-name="demostrativo_area_nivel_acesso"<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_demostrativo_area_nivel_acesso" class="area_nivel_acesso_demostrativo_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->demostrativo_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->bool_list_area_nivel_acesso->Visible) { // bool_list_area_nivel_acesso ?>
		<td data-name="bool_list_area_nivel_acesso"<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_bool_list_area_nivel_acesso" class="area_nivel_acesso_bool_list_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_list_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->bool_insert_area_nivel_acesso->Visible) { // bool_insert_area_nivel_acesso ?>
		<td data-name="bool_insert_area_nivel_acesso"<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_bool_insert_area_nivel_acesso" class="area_nivel_acesso_bool_insert_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_insert_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->bool_update_area_nivel_acesso->Visible) { // bool_update_area_nivel_acesso ?>
		<td data-name="bool_update_area_nivel_acesso"<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_bool_update_area_nivel_acesso" class="area_nivel_acesso_bool_update_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_update_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
		<td data-name="nivel_acesso_id"<?php echo $area_nivel_acesso->nivel_acesso_id->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_nivel_acesso_id" class="area_nivel_acesso_nivel_acesso_id">
<span<?php echo $area_nivel_acesso->nivel_acesso_id->viewAttributes() ?>>
<?php echo $area_nivel_acesso->nivel_acesso_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->data_atualizacao_area_nivel_acesso->Visible) { // data_atualizacao_area_nivel_acesso ?>
		<td data-name="data_atualizacao_area_nivel_acesso"<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_data_atualizacao_area_nivel_acesso" class="area_nivel_acesso_data_atualizacao_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->data_atualizacao_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $area_nivel_acesso->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_usuario_id" class="area_nivel_acesso_usuario_id">
<span<?php echo $area_nivel_acesso->usuario_id->viewAttributes() ?>>
<?php echo $area_nivel_acesso->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($area_nivel_acesso->bool_ativo_area_nivel_acesso->Visible) { // bool_ativo_area_nivel_acesso ?>
		<td data-name="bool_ativo_area_nivel_acesso"<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->cellAttributes() ?>>
<span id="el<?php echo $area_nivel_acesso_list->RowCnt ?>_area_nivel_acesso_bool_ativo_area_nivel_acesso" class="area_nivel_acesso_bool_ativo_area_nivel_acesso">
<span<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->viewAttributes() ?>>
<?php echo $area_nivel_acesso->bool_ativo_area_nivel_acesso->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$area_nivel_acesso_list->ListOptions->render("body", "right", $area_nivel_acesso_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$area_nivel_acesso->isGridAdd())
		$area_nivel_acesso_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$area_nivel_acesso->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($area_nivel_acesso_list->Recordset)
	$area_nivel_acesso_list->Recordset->Close();
?>
<?php if (!$area_nivel_acesso->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$area_nivel_acesso->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($area_nivel_acesso_list->Pager)) $area_nivel_acesso_list->Pager = new PrevNextPager($area_nivel_acesso_list->StartRec, $area_nivel_acesso_list->DisplayRecs, $area_nivel_acesso_list->TotalRecs, $area_nivel_acesso_list->AutoHidePager) ?>
<?php if ($area_nivel_acesso_list->Pager->RecordCount > 0 && $area_nivel_acesso_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($area_nivel_acesso_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $area_nivel_acesso_list->pageUrl() ?>start=<?php echo $area_nivel_acesso_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($area_nivel_acesso_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $area_nivel_acesso_list->pageUrl() ?>start=<?php echo $area_nivel_acesso_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $area_nivel_acesso_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($area_nivel_acesso_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $area_nivel_acesso_list->pageUrl() ?>start=<?php echo $area_nivel_acesso_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($area_nivel_acesso_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $area_nivel_acesso_list->pageUrl() ?>start=<?php echo $area_nivel_acesso_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $area_nivel_acesso_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($area_nivel_acesso_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $area_nivel_acesso_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $area_nivel_acesso_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $area_nivel_acesso_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($area_nivel_acesso_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($area_nivel_acesso_list->TotalRecs == 0 && !$area_nivel_acesso->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($area_nivel_acesso_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$area_nivel_acesso_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$area_nivel_acesso->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$area_nivel_acesso_list->terminate();
?>
