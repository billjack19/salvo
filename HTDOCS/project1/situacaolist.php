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
$situacao_list = new situacao_list();

// Run the page
$situacao_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$situacao_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$situacao->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsituacaolist = currentForm = new ew.Form("fsituacaolist", "list");
fsituacaolist.formKeyCountName = '<?php echo $situacao_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsituacaolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsituacaolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsituacaolistsrch = currentSearchForm = new ew.Form("fsituacaolistsrch");

// Filters
fsituacaolistsrch.filterList = <?php echo $situacao_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$situacao->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($situacao_list->TotalRecs > 0 && $situacao_list->ExportOptions->visible()) { ?>
<?php $situacao_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($situacao_list->ImportOptions->visible()) { ?>
<?php $situacao_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($situacao_list->SearchOptions->visible()) { ?>
<?php $situacao_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($situacao_list->FilterOptions->visible()) { ?>
<?php $situacao_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$situacao_list->renderOtherOptions();
?>
<?php if (!$situacao->isExport() && !$situacao->CurrentAction) { ?>
<form name="fsituacaolistsrch" id="fsituacaolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($situacao_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsituacaolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="situacao">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($situacao_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($situacao_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $situacao_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($situacao_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($situacao_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($situacao_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($situacao_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $situacao_list->showPageHeader(); ?>
<?php
$situacao_list->showMessage();
?>
<?php if ($situacao_list->TotalRecs > 0 || $situacao->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($situacao_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> situacao">
<form name="fsituacaolist" id="fsituacaolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($situacao_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $situacao_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="situacao">
<div id="gmp_situacao" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($situacao_list->TotalRecs > 0 || $situacao->isGridEdit()) { ?>
<table id="tbl_situacaolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$situacao_list->RowType = ROWTYPE_HEADER;

// Render list options
$situacao_list->renderListOptions();

// Render list options (header, left)
$situacao_list->ListOptions->render("header", "left");
?>
<?php if ($situacao->id_situacao->Visible) { // id_situacao ?>
	<?php if ($situacao->sortUrl($situacao->id_situacao) == "") { ?>
		<th data-name="id_situacao" class="<?php echo $situacao->id_situacao->headerCellClass() ?>"><div id="elh_situacao_id_situacao" class="situacao_id_situacao"><div class="ew-table-header-caption"><?php echo $situacao->id_situacao->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_situacao" class="<?php echo $situacao->id_situacao->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $situacao->SortUrl($situacao->id_situacao) ?>',1);"><div id="elh_situacao_id_situacao" class="situacao_id_situacao">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $situacao->id_situacao->caption() ?></span><span class="ew-table-header-sort"><?php if ($situacao->id_situacao->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($situacao->id_situacao->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($situacao->descricao_situacao->Visible) { // descricao_situacao ?>
	<?php if ($situacao->sortUrl($situacao->descricao_situacao) == "") { ?>
		<th data-name="descricao_situacao" class="<?php echo $situacao->descricao_situacao->headerCellClass() ?>"><div id="elh_situacao_descricao_situacao" class="situacao_descricao_situacao"><div class="ew-table-header-caption"><?php echo $situacao->descricao_situacao->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_situacao" class="<?php echo $situacao->descricao_situacao->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $situacao->SortUrl($situacao->descricao_situacao) ?>',1);"><div id="elh_situacao_descricao_situacao" class="situacao_descricao_situacao">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $situacao->descricao_situacao->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($situacao->descricao_situacao->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($situacao->descricao_situacao->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($situacao->cor_situacao->Visible) { // cor_situacao ?>
	<?php if ($situacao->sortUrl($situacao->cor_situacao) == "") { ?>
		<th data-name="cor_situacao" class="<?php echo $situacao->cor_situacao->headerCellClass() ?>"><div id="elh_situacao_cor_situacao" class="situacao_cor_situacao"><div class="ew-table-header-caption"><?php echo $situacao->cor_situacao->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cor_situacao" class="<?php echo $situacao->cor_situacao->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $situacao->SortUrl($situacao->cor_situacao) ?>',1);"><div id="elh_situacao_cor_situacao" class="situacao_cor_situacao">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $situacao->cor_situacao->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($situacao->cor_situacao->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($situacao->cor_situacao->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($situacao->data_atualizacao_situacao->Visible) { // data_atualizacao_situacao ?>
	<?php if ($situacao->sortUrl($situacao->data_atualizacao_situacao) == "") { ?>
		<th data-name="data_atualizacao_situacao" class="<?php echo $situacao->data_atualizacao_situacao->headerCellClass() ?>"><div id="elh_situacao_data_atualizacao_situacao" class="situacao_data_atualizacao_situacao"><div class="ew-table-header-caption"><?php echo $situacao->data_atualizacao_situacao->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_situacao" class="<?php echo $situacao->data_atualizacao_situacao->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $situacao->SortUrl($situacao->data_atualizacao_situacao) ?>',1);"><div id="elh_situacao_data_atualizacao_situacao" class="situacao_data_atualizacao_situacao">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $situacao->data_atualizacao_situacao->caption() ?></span><span class="ew-table-header-sort"><?php if ($situacao->data_atualizacao_situacao->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($situacao->data_atualizacao_situacao->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($situacao->usuario_id->Visible) { // usuario_id ?>
	<?php if ($situacao->sortUrl($situacao->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $situacao->usuario_id->headerCellClass() ?>"><div id="elh_situacao_usuario_id" class="situacao_usuario_id"><div class="ew-table-header-caption"><?php echo $situacao->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $situacao->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $situacao->SortUrl($situacao->usuario_id) ?>',1);"><div id="elh_situacao_usuario_id" class="situacao_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $situacao->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($situacao->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($situacao->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($situacao->bool_ativo_situacao->Visible) { // bool_ativo_situacao ?>
	<?php if ($situacao->sortUrl($situacao->bool_ativo_situacao) == "") { ?>
		<th data-name="bool_ativo_situacao" class="<?php echo $situacao->bool_ativo_situacao->headerCellClass() ?>"><div id="elh_situacao_bool_ativo_situacao" class="situacao_bool_ativo_situacao"><div class="ew-table-header-caption"><?php echo $situacao->bool_ativo_situacao->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_situacao" class="<?php echo $situacao->bool_ativo_situacao->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $situacao->SortUrl($situacao->bool_ativo_situacao) ?>',1);"><div id="elh_situacao_bool_ativo_situacao" class="situacao_bool_ativo_situacao">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $situacao->bool_ativo_situacao->caption() ?></span><span class="ew-table-header-sort"><?php if ($situacao->bool_ativo_situacao->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($situacao->bool_ativo_situacao->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$situacao_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($situacao->ExportAll && $situacao->isExport()) {
	$situacao_list->StopRec = $situacao_list->TotalRecs;
} else {

	// Set the last record to display
	if ($situacao_list->TotalRecs > $situacao_list->StartRec + $situacao_list->DisplayRecs - 1)
		$situacao_list->StopRec = $situacao_list->StartRec + $situacao_list->DisplayRecs - 1;
	else
		$situacao_list->StopRec = $situacao_list->TotalRecs;
}
$situacao_list->RecCnt = $situacao_list->StartRec - 1;
if ($situacao_list->Recordset && !$situacao_list->Recordset->EOF) {
	$situacao_list->Recordset->moveFirst();
	$selectLimit = $situacao_list->UseSelectLimit;
	if (!$selectLimit && $situacao_list->StartRec > 1)
		$situacao_list->Recordset->move($situacao_list->StartRec - 1);
} elseif (!$situacao->AllowAddDeleteRow && $situacao_list->StopRec == 0) {
	$situacao_list->StopRec = $situacao->GridAddRowCount;
}

// Initialize aggregate
$situacao->RowType = ROWTYPE_AGGREGATEINIT;
$situacao->resetAttributes();
$situacao_list->renderRow();
while ($situacao_list->RecCnt < $situacao_list->StopRec) {
	$situacao_list->RecCnt++;
	if ($situacao_list->RecCnt >= $situacao_list->StartRec) {
		$situacao_list->RowCnt++;

		// Set up key count
		$situacao_list->KeyCount = $situacao_list->RowIndex;

		// Init row class and style
		$situacao->resetAttributes();
		$situacao->CssClass = "";
		if ($situacao->isGridAdd()) {
		} else {
			$situacao_list->loadRowValues($situacao_list->Recordset); // Load row values
		}
		$situacao->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$situacao->RowAttrs = array_merge($situacao->RowAttrs, array('data-rowindex'=>$situacao_list->RowCnt, 'id'=>'r' . $situacao_list->RowCnt . '_situacao', 'data-rowtype'=>$situacao->RowType));

		// Render row
		$situacao_list->renderRow();

		// Render list options
		$situacao_list->renderListOptions();
?>
	<tr<?php echo $situacao->rowAttributes() ?>>
<?php

// Render list options (body, left)
$situacao_list->ListOptions->render("body", "left", $situacao_list->RowCnt);
?>
	<?php if ($situacao->id_situacao->Visible) { // id_situacao ?>
		<td data-name="id_situacao"<?php echo $situacao->id_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_list->RowCnt ?>_situacao_id_situacao" class="situacao_id_situacao">
<span<?php echo $situacao->id_situacao->viewAttributes() ?>>
<?php echo $situacao->id_situacao->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($situacao->descricao_situacao->Visible) { // descricao_situacao ?>
		<td data-name="descricao_situacao"<?php echo $situacao->descricao_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_list->RowCnt ?>_situacao_descricao_situacao" class="situacao_descricao_situacao">
<span<?php echo $situacao->descricao_situacao->viewAttributes() ?>>
<?php echo $situacao->descricao_situacao->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($situacao->cor_situacao->Visible) { // cor_situacao ?>
		<td data-name="cor_situacao"<?php echo $situacao->cor_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_list->RowCnt ?>_situacao_cor_situacao" class="situacao_cor_situacao">
<span<?php echo $situacao->cor_situacao->viewAttributes() ?>>
<?php echo $situacao->cor_situacao->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($situacao->data_atualizacao_situacao->Visible) { // data_atualizacao_situacao ?>
		<td data-name="data_atualizacao_situacao"<?php echo $situacao->data_atualizacao_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_list->RowCnt ?>_situacao_data_atualizacao_situacao" class="situacao_data_atualizacao_situacao">
<span<?php echo $situacao->data_atualizacao_situacao->viewAttributes() ?>>
<?php echo $situacao->data_atualizacao_situacao->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($situacao->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $situacao->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $situacao_list->RowCnt ?>_situacao_usuario_id" class="situacao_usuario_id">
<span<?php echo $situacao->usuario_id->viewAttributes() ?>>
<?php echo $situacao->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($situacao->bool_ativo_situacao->Visible) { // bool_ativo_situacao ?>
		<td data-name="bool_ativo_situacao"<?php echo $situacao->bool_ativo_situacao->cellAttributes() ?>>
<span id="el<?php echo $situacao_list->RowCnt ?>_situacao_bool_ativo_situacao" class="situacao_bool_ativo_situacao">
<span<?php echo $situacao->bool_ativo_situacao->viewAttributes() ?>>
<?php echo $situacao->bool_ativo_situacao->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$situacao_list->ListOptions->render("body", "right", $situacao_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$situacao->isGridAdd())
		$situacao_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$situacao->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($situacao_list->Recordset)
	$situacao_list->Recordset->Close();
?>
<?php if (!$situacao->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$situacao->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($situacao_list->Pager)) $situacao_list->Pager = new PrevNextPager($situacao_list->StartRec, $situacao_list->DisplayRecs, $situacao_list->TotalRecs, $situacao_list->AutoHidePager) ?>
<?php if ($situacao_list->Pager->RecordCount > 0 && $situacao_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($situacao_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $situacao_list->pageUrl() ?>start=<?php echo $situacao_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($situacao_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $situacao_list->pageUrl() ?>start=<?php echo $situacao_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $situacao_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($situacao_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $situacao_list->pageUrl() ?>start=<?php echo $situacao_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($situacao_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $situacao_list->pageUrl() ?>start=<?php echo $situacao_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $situacao_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($situacao_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $situacao_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $situacao_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $situacao_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($situacao_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($situacao_list->TotalRecs == 0 && !$situacao->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($situacao_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$situacao_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$situacao->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$situacao_list->terminate();
?>
