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
$videos_list = new videos_list();

// Run the page
$videos_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$videos_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$videos->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fvideoslist = currentForm = new ew.Form("fvideoslist", "list");
fvideoslist.formKeyCountName = '<?php echo $videos_list->FormKeyCountName ?>';

// Form_CustomValidate event
fvideoslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvideoslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fvideoslistsrch = currentSearchForm = new ew.Form("fvideoslistsrch");

// Filters
fvideoslistsrch.filterList = <?php echo $videos_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$videos->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($videos_list->TotalRecs > 0 && $videos_list->ExportOptions->visible()) { ?>
<?php $videos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($videos_list->ImportOptions->visible()) { ?>
<?php $videos_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($videos_list->SearchOptions->visible()) { ?>
<?php $videos_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($videos_list->FilterOptions->visible()) { ?>
<?php $videos_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$videos_list->renderOtherOptions();
?>
<?php if (!$videos->isExport() && !$videos->CurrentAction) { ?>
<form name="fvideoslistsrch" id="fvideoslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($videos_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fvideoslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="videos">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($videos_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($videos_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $videos_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($videos_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($videos_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($videos_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($videos_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $videos_list->showPageHeader(); ?>
<?php
$videos_list->showMessage();
?>
<?php if ($videos_list->TotalRecs > 0 || $videos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($videos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> videos">
<form name="fvideoslist" id="fvideoslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($videos_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $videos_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="videos">
<div id="gmp_videos" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($videos_list->TotalRecs > 0 || $videos->isGridEdit()) { ?>
<table id="tbl_videoslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$videos_list->RowType = ROWTYPE_HEADER;

// Render list options
$videos_list->renderListOptions();

// Render list options (header, left)
$videos_list->ListOptions->render("header", "left");
?>
<?php if ($videos->id_videos->Visible) { // id_videos ?>
	<?php if ($videos->sortUrl($videos->id_videos) == "") { ?>
		<th data-name="id_videos" class="<?php echo $videos->id_videos->headerCellClass() ?>"><div id="elh_videos_id_videos" class="videos_id_videos"><div class="ew-table-header-caption"><?php echo $videos->id_videos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_videos" class="<?php echo $videos->id_videos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $videos->SortUrl($videos->id_videos) ?>',1);"><div id="elh_videos_id_videos" class="videos_id_videos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $videos->id_videos->caption() ?></span><span class="ew-table-header-sort"><?php if ($videos->id_videos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($videos->id_videos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($videos->link_videos->Visible) { // link_videos ?>
	<?php if ($videos->sortUrl($videos->link_videos) == "") { ?>
		<th data-name="link_videos" class="<?php echo $videos->link_videos->headerCellClass() ?>"><div id="elh_videos_link_videos" class="videos_link_videos"><div class="ew-table-header-caption"><?php echo $videos->link_videos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="link_videos" class="<?php echo $videos->link_videos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $videos->SortUrl($videos->link_videos) ?>',1);"><div id="elh_videos_link_videos" class="videos_link_videos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $videos->link_videos->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($videos->link_videos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($videos->link_videos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($videos->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<?php if ($videos->sortUrl($videos->pagina_principal_id) == "") { ?>
		<th data-name="pagina_principal_id" class="<?php echo $videos->pagina_principal_id->headerCellClass() ?>"><div id="elh_videos_pagina_principal_id" class="videos_pagina_principal_id"><div class="ew-table-header-caption"><?php echo $videos->pagina_principal_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pagina_principal_id" class="<?php echo $videos->pagina_principal_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $videos->SortUrl($videos->pagina_principal_id) ?>',1);"><div id="elh_videos_pagina_principal_id" class="videos_pagina_principal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $videos->pagina_principal_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($videos->pagina_principal_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($videos->pagina_principal_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($videos->data_atualizacao_videos->Visible) { // data_atualizacao_videos ?>
	<?php if ($videos->sortUrl($videos->data_atualizacao_videos) == "") { ?>
		<th data-name="data_atualizacao_videos" class="<?php echo $videos->data_atualizacao_videos->headerCellClass() ?>"><div id="elh_videos_data_atualizacao_videos" class="videos_data_atualizacao_videos"><div class="ew-table-header-caption"><?php echo $videos->data_atualizacao_videos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_videos" class="<?php echo $videos->data_atualizacao_videos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $videos->SortUrl($videos->data_atualizacao_videos) ?>',1);"><div id="elh_videos_data_atualizacao_videos" class="videos_data_atualizacao_videos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $videos->data_atualizacao_videos->caption() ?></span><span class="ew-table-header-sort"><?php if ($videos->data_atualizacao_videos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($videos->data_atualizacao_videos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($videos->bool_ativo_videos->Visible) { // bool_ativo_videos ?>
	<?php if ($videos->sortUrl($videos->bool_ativo_videos) == "") { ?>
		<th data-name="bool_ativo_videos" class="<?php echo $videos->bool_ativo_videos->headerCellClass() ?>"><div id="elh_videos_bool_ativo_videos" class="videos_bool_ativo_videos"><div class="ew-table-header-caption"><?php echo $videos->bool_ativo_videos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_videos" class="<?php echo $videos->bool_ativo_videos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $videos->SortUrl($videos->bool_ativo_videos) ?>',1);"><div id="elh_videos_bool_ativo_videos" class="videos_bool_ativo_videos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $videos->bool_ativo_videos->caption() ?></span><span class="ew-table-header-sort"><?php if ($videos->bool_ativo_videos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($videos->bool_ativo_videos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$videos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($videos->ExportAll && $videos->isExport()) {
	$videos_list->StopRec = $videos_list->TotalRecs;
} else {

	// Set the last record to display
	if ($videos_list->TotalRecs > $videos_list->StartRec + $videos_list->DisplayRecs - 1)
		$videos_list->StopRec = $videos_list->StartRec + $videos_list->DisplayRecs - 1;
	else
		$videos_list->StopRec = $videos_list->TotalRecs;
}
$videos_list->RecCnt = $videos_list->StartRec - 1;
if ($videos_list->Recordset && !$videos_list->Recordset->EOF) {
	$videos_list->Recordset->moveFirst();
	$selectLimit = $videos_list->UseSelectLimit;
	if (!$selectLimit && $videos_list->StartRec > 1)
		$videos_list->Recordset->move($videos_list->StartRec - 1);
} elseif (!$videos->AllowAddDeleteRow && $videos_list->StopRec == 0) {
	$videos_list->StopRec = $videos->GridAddRowCount;
}

// Initialize aggregate
$videos->RowType = ROWTYPE_AGGREGATEINIT;
$videos->resetAttributes();
$videos_list->renderRow();
while ($videos_list->RecCnt < $videos_list->StopRec) {
	$videos_list->RecCnt++;
	if ($videos_list->RecCnt >= $videos_list->StartRec) {
		$videos_list->RowCnt++;

		// Set up key count
		$videos_list->KeyCount = $videos_list->RowIndex;

		// Init row class and style
		$videos->resetAttributes();
		$videos->CssClass = "";
		if ($videos->isGridAdd()) {
		} else {
			$videos_list->loadRowValues($videos_list->Recordset); // Load row values
		}
		$videos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$videos->RowAttrs = array_merge($videos->RowAttrs, array('data-rowindex'=>$videos_list->RowCnt, 'id'=>'r' . $videos_list->RowCnt . '_videos', 'data-rowtype'=>$videos->RowType));

		// Render row
		$videos_list->renderRow();

		// Render list options
		$videos_list->renderListOptions();
?>
	<tr<?php echo $videos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$videos_list->ListOptions->render("body", "left", $videos_list->RowCnt);
?>
	<?php if ($videos->id_videos->Visible) { // id_videos ?>
		<td data-name="id_videos"<?php echo $videos->id_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_list->RowCnt ?>_videos_id_videos" class="videos_id_videos">
<span<?php echo $videos->id_videos->viewAttributes() ?>>
<?php echo $videos->id_videos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($videos->link_videos->Visible) { // link_videos ?>
		<td data-name="link_videos"<?php echo $videos->link_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_list->RowCnt ?>_videos_link_videos" class="videos_link_videos">
<span<?php echo $videos->link_videos->viewAttributes() ?>>
<?php echo $videos->link_videos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($videos->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td data-name="pagina_principal_id"<?php echo $videos->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $videos_list->RowCnt ?>_videos_pagina_principal_id" class="videos_pagina_principal_id">
<span<?php echo $videos->pagina_principal_id->viewAttributes() ?>>
<?php echo $videos->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($videos->data_atualizacao_videos->Visible) { // data_atualizacao_videos ?>
		<td data-name="data_atualizacao_videos"<?php echo $videos->data_atualizacao_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_list->RowCnt ?>_videos_data_atualizacao_videos" class="videos_data_atualizacao_videos">
<span<?php echo $videos->data_atualizacao_videos->viewAttributes() ?>>
<?php echo $videos->data_atualizacao_videos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($videos->bool_ativo_videos->Visible) { // bool_ativo_videos ?>
		<td data-name="bool_ativo_videos"<?php echo $videos->bool_ativo_videos->cellAttributes() ?>>
<span id="el<?php echo $videos_list->RowCnt ?>_videos_bool_ativo_videos" class="videos_bool_ativo_videos">
<span<?php echo $videos->bool_ativo_videos->viewAttributes() ?>>
<?php echo $videos->bool_ativo_videos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$videos_list->ListOptions->render("body", "right", $videos_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$videos->isGridAdd())
		$videos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$videos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($videos_list->Recordset)
	$videos_list->Recordset->Close();
?>
<?php if (!$videos->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$videos->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($videos_list->Pager)) $videos_list->Pager = new PrevNextPager($videos_list->StartRec, $videos_list->DisplayRecs, $videos_list->TotalRecs, $videos_list->AutoHidePager) ?>
<?php if ($videos_list->Pager->RecordCount > 0 && $videos_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($videos_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $videos_list->pageUrl() ?>start=<?php echo $videos_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($videos_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $videos_list->pageUrl() ?>start=<?php echo $videos_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $videos_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($videos_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $videos_list->pageUrl() ?>start=<?php echo $videos_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($videos_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $videos_list->pageUrl() ?>start=<?php echo $videos_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $videos_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($videos_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $videos_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $videos_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $videos_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($videos_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($videos_list->TotalRecs == 0 && !$videos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($videos_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$videos_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$videos->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$videos_list->terminate();
?>
