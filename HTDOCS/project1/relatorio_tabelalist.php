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
$relatorio_tabela_list = new relatorio_tabela_list();

// Run the page
$relatorio_tabela_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorio_tabela_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$relatorio_tabela->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var frelatorio_tabelalist = currentForm = new ew.Form("frelatorio_tabelalist", "list");
frelatorio_tabelalist.formKeyCountName = '<?php echo $relatorio_tabela_list->FormKeyCountName ?>';

// Form_CustomValidate event
frelatorio_tabelalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatorio_tabelalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var frelatorio_tabelalistsrch = currentSearchForm = new ew.Form("frelatorio_tabelalistsrch");

// Filters
frelatorio_tabelalistsrch.filterList = <?php echo $relatorio_tabela_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$relatorio_tabela->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($relatorio_tabela_list->TotalRecs > 0 && $relatorio_tabela_list->ExportOptions->visible()) { ?>
<?php $relatorio_tabela_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($relatorio_tabela_list->ImportOptions->visible()) { ?>
<?php $relatorio_tabela_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($relatorio_tabela_list->SearchOptions->visible()) { ?>
<?php $relatorio_tabela_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($relatorio_tabela_list->FilterOptions->visible()) { ?>
<?php $relatorio_tabela_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$relatorio_tabela_list->renderOtherOptions();
?>
<?php if (!$relatorio_tabela->isExport() && !$relatorio_tabela->CurrentAction) { ?>
<form name="frelatorio_tabelalistsrch" id="frelatorio_tabelalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($relatorio_tabela_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="frelatorio_tabelalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="relatorio_tabela">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($relatorio_tabela_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($relatorio_tabela_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $relatorio_tabela_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($relatorio_tabela_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($relatorio_tabela_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($relatorio_tabela_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($relatorio_tabela_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $relatorio_tabela_list->showPageHeader(); ?>
<?php
$relatorio_tabela_list->showMessage();
?>
<?php if ($relatorio_tabela_list->TotalRecs > 0 || $relatorio_tabela->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($relatorio_tabela_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> relatorio_tabela">
<form name="frelatorio_tabelalist" id="frelatorio_tabelalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorio_tabela_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorio_tabela_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorio_tabela">
<div id="gmp_relatorio_tabela" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($relatorio_tabela_list->TotalRecs > 0 || $relatorio_tabela->isGridEdit()) { ?>
<table id="tbl_relatorio_tabelalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$relatorio_tabela_list->RowType = ROWTYPE_HEADER;

// Render list options
$relatorio_tabela_list->renderListOptions();

// Render list options (header, left)
$relatorio_tabela_list->ListOptions->render("header", "left");
?>
<?php if ($relatorio_tabela->id_relatorio_tabela->Visible) { // id_relatorio_tabela ?>
	<?php if ($relatorio_tabela->sortUrl($relatorio_tabela->id_relatorio_tabela) == "") { ?>
		<th data-name="id_relatorio_tabela" class="<?php echo $relatorio_tabela->id_relatorio_tabela->headerCellClass() ?>"><div id="elh_relatorio_tabela_id_relatorio_tabela" class="relatorio_tabela_id_relatorio_tabela"><div class="ew-table-header-caption"><?php echo $relatorio_tabela->id_relatorio_tabela->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_relatorio_tabela" class="<?php echo $relatorio_tabela->id_relatorio_tabela->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorio_tabela->SortUrl($relatorio_tabela->id_relatorio_tabela) ?>',1);"><div id="elh_relatorio_tabela_id_relatorio_tabela" class="relatorio_tabela_id_relatorio_tabela">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorio_tabela->id_relatorio_tabela->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorio_tabela->id_relatorio_tabela->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorio_tabela->id_relatorio_tabela->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorio_tabela->descricao_relatorio_tabela->Visible) { // descricao_relatorio_tabela ?>
	<?php if ($relatorio_tabela->sortUrl($relatorio_tabela->descricao_relatorio_tabela) == "") { ?>
		<th data-name="descricao_relatorio_tabela" class="<?php echo $relatorio_tabela->descricao_relatorio_tabela->headerCellClass() ?>"><div id="elh_relatorio_tabela_descricao_relatorio_tabela" class="relatorio_tabela_descricao_relatorio_tabela"><div class="ew-table-header-caption"><?php echo $relatorio_tabela->descricao_relatorio_tabela->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_relatorio_tabela" class="<?php echo $relatorio_tabela->descricao_relatorio_tabela->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorio_tabela->SortUrl($relatorio_tabela->descricao_relatorio_tabela) ?>',1);"><div id="elh_relatorio_tabela_descricao_relatorio_tabela" class="relatorio_tabela_descricao_relatorio_tabela">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorio_tabela->descricao_relatorio_tabela->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($relatorio_tabela->descricao_relatorio_tabela->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorio_tabela->descricao_relatorio_tabela->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorio_tabela->data_atualizacao_relatorio_tabela->Visible) { // data_atualizacao_relatorio_tabela ?>
	<?php if ($relatorio_tabela->sortUrl($relatorio_tabela->data_atualizacao_relatorio_tabela) == "") { ?>
		<th data-name="data_atualizacao_relatorio_tabela" class="<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->headerCellClass() ?>"><div id="elh_relatorio_tabela_data_atualizacao_relatorio_tabela" class="relatorio_tabela_data_atualizacao_relatorio_tabela"><div class="ew-table-header-caption"><?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_relatorio_tabela" class="<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorio_tabela->SortUrl($relatorio_tabela->data_atualizacao_relatorio_tabela) ?>',1);"><div id="elh_relatorio_tabela_data_atualizacao_relatorio_tabela" class="relatorio_tabela_data_atualizacao_relatorio_tabela">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorio_tabela->data_atualizacao_relatorio_tabela->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorio_tabela->data_atualizacao_relatorio_tabela->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorio_tabela->bool_ativo_relatorio_tabela->Visible) { // bool_ativo_relatorio_tabela ?>
	<?php if ($relatorio_tabela->sortUrl($relatorio_tabela->bool_ativo_relatorio_tabela) == "") { ?>
		<th data-name="bool_ativo_relatorio_tabela" class="<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->headerCellClass() ?>"><div id="elh_relatorio_tabela_bool_ativo_relatorio_tabela" class="relatorio_tabela_bool_ativo_relatorio_tabela"><div class="ew-table-header-caption"><?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_relatorio_tabela" class="<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorio_tabela->SortUrl($relatorio_tabela->bool_ativo_relatorio_tabela) ?>',1);"><div id="elh_relatorio_tabela_bool_ativo_relatorio_tabela" class="relatorio_tabela_bool_ativo_relatorio_tabela">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorio_tabela->bool_ativo_relatorio_tabela->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorio_tabela->bool_ativo_relatorio_tabela->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$relatorio_tabela_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($relatorio_tabela->ExportAll && $relatorio_tabela->isExport()) {
	$relatorio_tabela_list->StopRec = $relatorio_tabela_list->TotalRecs;
} else {

	// Set the last record to display
	if ($relatorio_tabela_list->TotalRecs > $relatorio_tabela_list->StartRec + $relatorio_tabela_list->DisplayRecs - 1)
		$relatorio_tabela_list->StopRec = $relatorio_tabela_list->StartRec + $relatorio_tabela_list->DisplayRecs - 1;
	else
		$relatorio_tabela_list->StopRec = $relatorio_tabela_list->TotalRecs;
}
$relatorio_tabela_list->RecCnt = $relatorio_tabela_list->StartRec - 1;
if ($relatorio_tabela_list->Recordset && !$relatorio_tabela_list->Recordset->EOF) {
	$relatorio_tabela_list->Recordset->moveFirst();
	$selectLimit = $relatorio_tabela_list->UseSelectLimit;
	if (!$selectLimit && $relatorio_tabela_list->StartRec > 1)
		$relatorio_tabela_list->Recordset->move($relatorio_tabela_list->StartRec - 1);
} elseif (!$relatorio_tabela->AllowAddDeleteRow && $relatorio_tabela_list->StopRec == 0) {
	$relatorio_tabela_list->StopRec = $relatorio_tabela->GridAddRowCount;
}

// Initialize aggregate
$relatorio_tabela->RowType = ROWTYPE_AGGREGATEINIT;
$relatorio_tabela->resetAttributes();
$relatorio_tabela_list->renderRow();
while ($relatorio_tabela_list->RecCnt < $relatorio_tabela_list->StopRec) {
	$relatorio_tabela_list->RecCnt++;
	if ($relatorio_tabela_list->RecCnt >= $relatorio_tabela_list->StartRec) {
		$relatorio_tabela_list->RowCnt++;

		// Set up key count
		$relatorio_tabela_list->KeyCount = $relatorio_tabela_list->RowIndex;

		// Init row class and style
		$relatorio_tabela->resetAttributes();
		$relatorio_tabela->CssClass = "";
		if ($relatorio_tabela->isGridAdd()) {
		} else {
			$relatorio_tabela_list->loadRowValues($relatorio_tabela_list->Recordset); // Load row values
		}
		$relatorio_tabela->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$relatorio_tabela->RowAttrs = array_merge($relatorio_tabela->RowAttrs, array('data-rowindex'=>$relatorio_tabela_list->RowCnt, 'id'=>'r' . $relatorio_tabela_list->RowCnt . '_relatorio_tabela', 'data-rowtype'=>$relatorio_tabela->RowType));

		// Render row
		$relatorio_tabela_list->renderRow();

		// Render list options
		$relatorio_tabela_list->renderListOptions();
?>
	<tr<?php echo $relatorio_tabela->rowAttributes() ?>>
<?php

// Render list options (body, left)
$relatorio_tabela_list->ListOptions->render("body", "left", $relatorio_tabela_list->RowCnt);
?>
	<?php if ($relatorio_tabela->id_relatorio_tabela->Visible) { // id_relatorio_tabela ?>
		<td data-name="id_relatorio_tabela"<?php echo $relatorio_tabela->id_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_list->RowCnt ?>_relatorio_tabela_id_relatorio_tabela" class="relatorio_tabela_id_relatorio_tabela">
<span<?php echo $relatorio_tabela->id_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->id_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorio_tabela->descricao_relatorio_tabela->Visible) { // descricao_relatorio_tabela ?>
		<td data-name="descricao_relatorio_tabela"<?php echo $relatorio_tabela->descricao_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_list->RowCnt ?>_relatorio_tabela_descricao_relatorio_tabela" class="relatorio_tabela_descricao_relatorio_tabela">
<span<?php echo $relatorio_tabela->descricao_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->descricao_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorio_tabela->data_atualizacao_relatorio_tabela->Visible) { // data_atualizacao_relatorio_tabela ?>
		<td data-name="data_atualizacao_relatorio_tabela"<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_list->RowCnt ?>_relatorio_tabela_data_atualizacao_relatorio_tabela" class="relatorio_tabela_data_atualizacao_relatorio_tabela">
<span<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->data_atualizacao_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorio_tabela->bool_ativo_relatorio_tabela->Visible) { // bool_ativo_relatorio_tabela ?>
		<td data-name="bool_ativo_relatorio_tabela"<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->cellAttributes() ?>>
<span id="el<?php echo $relatorio_tabela_list->RowCnt ?>_relatorio_tabela_bool_ativo_relatorio_tabela" class="relatorio_tabela_bool_ativo_relatorio_tabela">
<span<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->viewAttributes() ?>>
<?php echo $relatorio_tabela->bool_ativo_relatorio_tabela->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$relatorio_tabela_list->ListOptions->render("body", "right", $relatorio_tabela_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$relatorio_tabela->isGridAdd())
		$relatorio_tabela_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$relatorio_tabela->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($relatorio_tabela_list->Recordset)
	$relatorio_tabela_list->Recordset->Close();
?>
<?php if (!$relatorio_tabela->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$relatorio_tabela->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($relatorio_tabela_list->Pager)) $relatorio_tabela_list->Pager = new PrevNextPager($relatorio_tabela_list->StartRec, $relatorio_tabela_list->DisplayRecs, $relatorio_tabela_list->TotalRecs, $relatorio_tabela_list->AutoHidePager) ?>
<?php if ($relatorio_tabela_list->Pager->RecordCount > 0 && $relatorio_tabela_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($relatorio_tabela_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $relatorio_tabela_list->pageUrl() ?>start=<?php echo $relatorio_tabela_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($relatorio_tabela_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $relatorio_tabela_list->pageUrl() ?>start=<?php echo $relatorio_tabela_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $relatorio_tabela_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($relatorio_tabela_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $relatorio_tabela_list->pageUrl() ?>start=<?php echo $relatorio_tabela_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($relatorio_tabela_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $relatorio_tabela_list->pageUrl() ?>start=<?php echo $relatorio_tabela_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $relatorio_tabela_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($relatorio_tabela_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $relatorio_tabela_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $relatorio_tabela_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $relatorio_tabela_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($relatorio_tabela_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($relatorio_tabela_list->TotalRecs == 0 && !$relatorio_tabela->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($relatorio_tabela_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$relatorio_tabela_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$relatorio_tabela->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$relatorio_tabela_list->terminate();
?>
