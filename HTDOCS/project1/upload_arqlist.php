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
$upload_arq_list = new upload_arq_list();

// Run the page
$upload_arq_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$upload_arq_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$upload_arq->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fupload_arqlist = currentForm = new ew.Form("fupload_arqlist", "list");
fupload_arqlist.formKeyCountName = '<?php echo $upload_arq_list->FormKeyCountName ?>';

// Form_CustomValidate event
fupload_arqlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fupload_arqlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fupload_arqlistsrch = currentSearchForm = new ew.Form("fupload_arqlistsrch");

// Filters
fupload_arqlistsrch.filterList = <?php echo $upload_arq_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$upload_arq->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($upload_arq_list->TotalRecs > 0 && $upload_arq_list->ExportOptions->visible()) { ?>
<?php $upload_arq_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($upload_arq_list->ImportOptions->visible()) { ?>
<?php $upload_arq_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($upload_arq_list->SearchOptions->visible()) { ?>
<?php $upload_arq_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($upload_arq_list->FilterOptions->visible()) { ?>
<?php $upload_arq_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$upload_arq_list->renderOtherOptions();
?>
<?php if (!$upload_arq->isExport() && !$upload_arq->CurrentAction) { ?>
<form name="fupload_arqlistsrch" id="fupload_arqlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($upload_arq_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fupload_arqlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="upload_arq">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($upload_arq_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($upload_arq_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $upload_arq_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($upload_arq_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($upload_arq_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($upload_arq_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($upload_arq_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $upload_arq_list->showPageHeader(); ?>
<?php
$upload_arq_list->showMessage();
?>
<?php if ($upload_arq_list->TotalRecs > 0 || $upload_arq->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($upload_arq_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> upload_arq">
<form name="fupload_arqlist" id="fupload_arqlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($upload_arq_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $upload_arq_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="upload_arq">
<div id="gmp_upload_arq" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($upload_arq_list->TotalRecs > 0 || $upload_arq->isGridEdit()) { ?>
<table id="tbl_upload_arqlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$upload_arq_list->RowType = ROWTYPE_HEADER;

// Render list options
$upload_arq_list->renderListOptions();

// Render list options (header, left)
$upload_arq_list->ListOptions->render("header", "left");
?>
<?php if ($upload_arq->id_upload_arq->Visible) { // id_upload_arq ?>
	<?php if ($upload_arq->sortUrl($upload_arq->id_upload_arq) == "") { ?>
		<th data-name="id_upload_arq" class="<?php echo $upload_arq->id_upload_arq->headerCellClass() ?>"><div id="elh_upload_arq_id_upload_arq" class="upload_arq_id_upload_arq"><div class="ew-table-header-caption"><?php echo $upload_arq->id_upload_arq->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_upload_arq" class="<?php echo $upload_arq->id_upload_arq->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $upload_arq->SortUrl($upload_arq->id_upload_arq) ?>',1);"><div id="elh_upload_arq_id_upload_arq" class="upload_arq_id_upload_arq">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $upload_arq->id_upload_arq->caption() ?></span><span class="ew-table-header-sort"><?php if ($upload_arq->id_upload_arq->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($upload_arq->id_upload_arq->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($upload_arq->descricao_upload_arq->Visible) { // descricao_upload_arq ?>
	<?php if ($upload_arq->sortUrl($upload_arq->descricao_upload_arq) == "") { ?>
		<th data-name="descricao_upload_arq" class="<?php echo $upload_arq->descricao_upload_arq->headerCellClass() ?>"><div id="elh_upload_arq_descricao_upload_arq" class="upload_arq_descricao_upload_arq"><div class="ew-table-header-caption"><?php echo $upload_arq->descricao_upload_arq->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_upload_arq" class="<?php echo $upload_arq->descricao_upload_arq->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $upload_arq->SortUrl($upload_arq->descricao_upload_arq) ?>',1);"><div id="elh_upload_arq_descricao_upload_arq" class="upload_arq_descricao_upload_arq">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $upload_arq->descricao_upload_arq->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($upload_arq->descricao_upload_arq->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($upload_arq->descricao_upload_arq->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($upload_arq->tipo_upload_arq->Visible) { // tipo_upload_arq ?>
	<?php if ($upload_arq->sortUrl($upload_arq->tipo_upload_arq) == "") { ?>
		<th data-name="tipo_upload_arq" class="<?php echo $upload_arq->tipo_upload_arq->headerCellClass() ?>"><div id="elh_upload_arq_tipo_upload_arq" class="upload_arq_tipo_upload_arq"><div class="ew-table-header-caption"><?php echo $upload_arq->tipo_upload_arq->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_upload_arq" class="<?php echo $upload_arq->tipo_upload_arq->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $upload_arq->SortUrl($upload_arq->tipo_upload_arq) ?>',1);"><div id="elh_upload_arq_tipo_upload_arq" class="upload_arq_tipo_upload_arq">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $upload_arq->tipo_upload_arq->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($upload_arq->tipo_upload_arq->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($upload_arq->tipo_upload_arq->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($upload_arq->data_atualizacaoupload_arq->Visible) { // data_atualizacaoupload_arq ?>
	<?php if ($upload_arq->sortUrl($upload_arq->data_atualizacaoupload_arq) == "") { ?>
		<th data-name="data_atualizacaoupload_arq" class="<?php echo $upload_arq->data_atualizacaoupload_arq->headerCellClass() ?>"><div id="elh_upload_arq_data_atualizacaoupload_arq" class="upload_arq_data_atualizacaoupload_arq"><div class="ew-table-header-caption"><?php echo $upload_arq->data_atualizacaoupload_arq->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacaoupload_arq" class="<?php echo $upload_arq->data_atualizacaoupload_arq->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $upload_arq->SortUrl($upload_arq->data_atualizacaoupload_arq) ?>',1);"><div id="elh_upload_arq_data_atualizacaoupload_arq" class="upload_arq_data_atualizacaoupload_arq">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $upload_arq->data_atualizacaoupload_arq->caption() ?></span><span class="ew-table-header-sort"><?php if ($upload_arq->data_atualizacaoupload_arq->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($upload_arq->data_atualizacaoupload_arq->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($upload_arq->bool_ativo_upload_arq->Visible) { // bool_ativo_upload_arq ?>
	<?php if ($upload_arq->sortUrl($upload_arq->bool_ativo_upload_arq) == "") { ?>
		<th data-name="bool_ativo_upload_arq" class="<?php echo $upload_arq->bool_ativo_upload_arq->headerCellClass() ?>"><div id="elh_upload_arq_bool_ativo_upload_arq" class="upload_arq_bool_ativo_upload_arq"><div class="ew-table-header-caption"><?php echo $upload_arq->bool_ativo_upload_arq->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_upload_arq" class="<?php echo $upload_arq->bool_ativo_upload_arq->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $upload_arq->SortUrl($upload_arq->bool_ativo_upload_arq) ?>',1);"><div id="elh_upload_arq_bool_ativo_upload_arq" class="upload_arq_bool_ativo_upload_arq">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $upload_arq->bool_ativo_upload_arq->caption() ?></span><span class="ew-table-header-sort"><?php if ($upload_arq->bool_ativo_upload_arq->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($upload_arq->bool_ativo_upload_arq->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$upload_arq_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($upload_arq->ExportAll && $upload_arq->isExport()) {
	$upload_arq_list->StopRec = $upload_arq_list->TotalRecs;
} else {

	// Set the last record to display
	if ($upload_arq_list->TotalRecs > $upload_arq_list->StartRec + $upload_arq_list->DisplayRecs - 1)
		$upload_arq_list->StopRec = $upload_arq_list->StartRec + $upload_arq_list->DisplayRecs - 1;
	else
		$upload_arq_list->StopRec = $upload_arq_list->TotalRecs;
}
$upload_arq_list->RecCnt = $upload_arq_list->StartRec - 1;
if ($upload_arq_list->Recordset && !$upload_arq_list->Recordset->EOF) {
	$upload_arq_list->Recordset->moveFirst();
	$selectLimit = $upload_arq_list->UseSelectLimit;
	if (!$selectLimit && $upload_arq_list->StartRec > 1)
		$upload_arq_list->Recordset->move($upload_arq_list->StartRec - 1);
} elseif (!$upload_arq->AllowAddDeleteRow && $upload_arq_list->StopRec == 0) {
	$upload_arq_list->StopRec = $upload_arq->GridAddRowCount;
}

// Initialize aggregate
$upload_arq->RowType = ROWTYPE_AGGREGATEINIT;
$upload_arq->resetAttributes();
$upload_arq_list->renderRow();
while ($upload_arq_list->RecCnt < $upload_arq_list->StopRec) {
	$upload_arq_list->RecCnt++;
	if ($upload_arq_list->RecCnt >= $upload_arq_list->StartRec) {
		$upload_arq_list->RowCnt++;

		// Set up key count
		$upload_arq_list->KeyCount = $upload_arq_list->RowIndex;

		// Init row class and style
		$upload_arq->resetAttributes();
		$upload_arq->CssClass = "";
		if ($upload_arq->isGridAdd()) {
		} else {
			$upload_arq_list->loadRowValues($upload_arq_list->Recordset); // Load row values
		}
		$upload_arq->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$upload_arq->RowAttrs = array_merge($upload_arq->RowAttrs, array('data-rowindex'=>$upload_arq_list->RowCnt, 'id'=>'r' . $upload_arq_list->RowCnt . '_upload_arq', 'data-rowtype'=>$upload_arq->RowType));

		// Render row
		$upload_arq_list->renderRow();

		// Render list options
		$upload_arq_list->renderListOptions();
?>
	<tr<?php echo $upload_arq->rowAttributes() ?>>
<?php

// Render list options (body, left)
$upload_arq_list->ListOptions->render("body", "left", $upload_arq_list->RowCnt);
?>
	<?php if ($upload_arq->id_upload_arq->Visible) { // id_upload_arq ?>
		<td data-name="id_upload_arq"<?php echo $upload_arq->id_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_list->RowCnt ?>_upload_arq_id_upload_arq" class="upload_arq_id_upload_arq">
<span<?php echo $upload_arq->id_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->id_upload_arq->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($upload_arq->descricao_upload_arq->Visible) { // descricao_upload_arq ?>
		<td data-name="descricao_upload_arq"<?php echo $upload_arq->descricao_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_list->RowCnt ?>_upload_arq_descricao_upload_arq" class="upload_arq_descricao_upload_arq">
<span<?php echo $upload_arq->descricao_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->descricao_upload_arq->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($upload_arq->tipo_upload_arq->Visible) { // tipo_upload_arq ?>
		<td data-name="tipo_upload_arq"<?php echo $upload_arq->tipo_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_list->RowCnt ?>_upload_arq_tipo_upload_arq" class="upload_arq_tipo_upload_arq">
<span<?php echo $upload_arq->tipo_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->tipo_upload_arq->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($upload_arq->data_atualizacaoupload_arq->Visible) { // data_atualizacaoupload_arq ?>
		<td data-name="data_atualizacaoupload_arq"<?php echo $upload_arq->data_atualizacaoupload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_list->RowCnt ?>_upload_arq_data_atualizacaoupload_arq" class="upload_arq_data_atualizacaoupload_arq">
<span<?php echo $upload_arq->data_atualizacaoupload_arq->viewAttributes() ?>>
<?php echo $upload_arq->data_atualizacaoupload_arq->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($upload_arq->bool_ativo_upload_arq->Visible) { // bool_ativo_upload_arq ?>
		<td data-name="bool_ativo_upload_arq"<?php echo $upload_arq->bool_ativo_upload_arq->cellAttributes() ?>>
<span id="el<?php echo $upload_arq_list->RowCnt ?>_upload_arq_bool_ativo_upload_arq" class="upload_arq_bool_ativo_upload_arq">
<span<?php echo $upload_arq->bool_ativo_upload_arq->viewAttributes() ?>>
<?php echo $upload_arq->bool_ativo_upload_arq->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$upload_arq_list->ListOptions->render("body", "right", $upload_arq_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$upload_arq->isGridAdd())
		$upload_arq_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$upload_arq->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($upload_arq_list->Recordset)
	$upload_arq_list->Recordset->Close();
?>
<?php if (!$upload_arq->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$upload_arq->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($upload_arq_list->Pager)) $upload_arq_list->Pager = new PrevNextPager($upload_arq_list->StartRec, $upload_arq_list->DisplayRecs, $upload_arq_list->TotalRecs, $upload_arq_list->AutoHidePager) ?>
<?php if ($upload_arq_list->Pager->RecordCount > 0 && $upload_arq_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($upload_arq_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $upload_arq_list->pageUrl() ?>start=<?php echo $upload_arq_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($upload_arq_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $upload_arq_list->pageUrl() ?>start=<?php echo $upload_arq_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $upload_arq_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($upload_arq_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $upload_arq_list->pageUrl() ?>start=<?php echo $upload_arq_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($upload_arq_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $upload_arq_list->pageUrl() ?>start=<?php echo $upload_arq_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $upload_arq_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($upload_arq_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $upload_arq_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $upload_arq_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $upload_arq_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($upload_arq_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($upload_arq_list->TotalRecs == 0 && !$upload_arq->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($upload_arq_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$upload_arq_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$upload_arq->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$upload_arq_list->terminate();
?>
