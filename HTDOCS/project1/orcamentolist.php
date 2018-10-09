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
$orcamento_list = new orcamento_list();

// Run the page
$orcamento_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$orcamento_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$orcamento->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var forcamentolist = currentForm = new ew.Form("forcamentolist", "list");
forcamentolist.formKeyCountName = '<?php echo $orcamento_list->FormKeyCountName ?>';

// Form_CustomValidate event
forcamentolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
forcamentolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var forcamentolistsrch = currentSearchForm = new ew.Form("forcamentolistsrch");

// Filters
forcamentolistsrch.filterList = <?php echo $orcamento_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$orcamento->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($orcamento_list->TotalRecs > 0 && $orcamento_list->ExportOptions->visible()) { ?>
<?php $orcamento_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($orcamento_list->ImportOptions->visible()) { ?>
<?php $orcamento_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($orcamento_list->SearchOptions->visible()) { ?>
<?php $orcamento_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($orcamento_list->FilterOptions->visible()) { ?>
<?php $orcamento_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$orcamento_list->renderOtherOptions();
?>
<?php if (!$orcamento->isExport() && !$orcamento->CurrentAction) { ?>
<form name="forcamentolistsrch" id="forcamentolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($orcamento_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="forcamentolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="orcamento">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($orcamento_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($orcamento_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $orcamento_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($orcamento_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($orcamento_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($orcamento_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($orcamento_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $orcamento_list->showPageHeader(); ?>
<?php
$orcamento_list->showMessage();
?>
<?php if ($orcamento_list->TotalRecs > 0 || $orcamento->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($orcamento_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> orcamento">
<form name="forcamentolist" id="forcamentolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($orcamento_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $orcamento_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="orcamento">
<div id="gmp_orcamento" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($orcamento_list->TotalRecs > 0 || $orcamento->isGridEdit()) { ?>
<table id="tbl_orcamentolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$orcamento_list->RowType = ROWTYPE_HEADER;

// Render list options
$orcamento_list->renderListOptions();

// Render list options (header, left)
$orcamento_list->ListOptions->render("header", "left");
?>
<?php if ($orcamento->id_orcamento->Visible) { // id_orcamento ?>
	<?php if ($orcamento->sortUrl($orcamento->id_orcamento) == "") { ?>
		<th data-name="id_orcamento" class="<?php echo $orcamento->id_orcamento->headerCellClass() ?>"><div id="elh_orcamento_id_orcamento" class="orcamento_id_orcamento"><div class="ew-table-header-caption"><?php echo $orcamento->id_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_orcamento" class="<?php echo $orcamento->id_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $orcamento->SortUrl($orcamento->id_orcamento) ?>',1);"><div id="elh_orcamento_id_orcamento" class="orcamento_id_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $orcamento->id_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($orcamento->id_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($orcamento->id_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($orcamento->descricao_orcamento->Visible) { // descricao_orcamento ?>
	<?php if ($orcamento->sortUrl($orcamento->descricao_orcamento) == "") { ?>
		<th data-name="descricao_orcamento" class="<?php echo $orcamento->descricao_orcamento->headerCellClass() ?>"><div id="elh_orcamento_descricao_orcamento" class="orcamento_descricao_orcamento"><div class="ew-table-header-caption"><?php echo $orcamento->descricao_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_orcamento" class="<?php echo $orcamento->descricao_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $orcamento->SortUrl($orcamento->descricao_orcamento) ?>',1);"><div id="elh_orcamento_descricao_orcamento" class="orcamento_descricao_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $orcamento->descricao_orcamento->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($orcamento->descricao_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($orcamento->descricao_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($orcamento->cliente_site_id->Visible) { // cliente_site_id ?>
	<?php if ($orcamento->sortUrl($orcamento->cliente_site_id) == "") { ?>
		<th data-name="cliente_site_id" class="<?php echo $orcamento->cliente_site_id->headerCellClass() ?>"><div id="elh_orcamento_cliente_site_id" class="orcamento_cliente_site_id"><div class="ew-table-header-caption"><?php echo $orcamento->cliente_site_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cliente_site_id" class="<?php echo $orcamento->cliente_site_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $orcamento->SortUrl($orcamento->cliente_site_id) ?>',1);"><div id="elh_orcamento_cliente_site_id" class="orcamento_cliente_site_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $orcamento->cliente_site_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($orcamento->cliente_site_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($orcamento->cliente_site_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($orcamento->data_lanc_orcamento->Visible) { // data_lanc_orcamento ?>
	<?php if ($orcamento->sortUrl($orcamento->data_lanc_orcamento) == "") { ?>
		<th data-name="data_lanc_orcamento" class="<?php echo $orcamento->data_lanc_orcamento->headerCellClass() ?>"><div id="elh_orcamento_data_lanc_orcamento" class="orcamento_data_lanc_orcamento"><div class="ew-table-header-caption"><?php echo $orcamento->data_lanc_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_lanc_orcamento" class="<?php echo $orcamento->data_lanc_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $orcamento->SortUrl($orcamento->data_lanc_orcamento) ?>',1);"><div id="elh_orcamento_data_lanc_orcamento" class="orcamento_data_lanc_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $orcamento->data_lanc_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($orcamento->data_lanc_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($orcamento->data_lanc_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($orcamento->usuario_id->Visible) { // usuario_id ?>
	<?php if ($orcamento->sortUrl($orcamento->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $orcamento->usuario_id->headerCellClass() ?>"><div id="elh_orcamento_usuario_id" class="orcamento_usuario_id"><div class="ew-table-header-caption"><?php echo $orcamento->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $orcamento->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $orcamento->SortUrl($orcamento->usuario_id) ?>',1);"><div id="elh_orcamento_usuario_id" class="orcamento_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $orcamento->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($orcamento->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($orcamento->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($orcamento->bool_ativo_orcamento->Visible) { // bool_ativo_orcamento ?>
	<?php if ($orcamento->sortUrl($orcamento->bool_ativo_orcamento) == "") { ?>
		<th data-name="bool_ativo_orcamento" class="<?php echo $orcamento->bool_ativo_orcamento->headerCellClass() ?>"><div id="elh_orcamento_bool_ativo_orcamento" class="orcamento_bool_ativo_orcamento"><div class="ew-table-header-caption"><?php echo $orcamento->bool_ativo_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_orcamento" class="<?php echo $orcamento->bool_ativo_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $orcamento->SortUrl($orcamento->bool_ativo_orcamento) ?>',1);"><div id="elh_orcamento_bool_ativo_orcamento" class="orcamento_bool_ativo_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $orcamento->bool_ativo_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($orcamento->bool_ativo_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($orcamento->bool_ativo_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$orcamento_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($orcamento->ExportAll && $orcamento->isExport()) {
	$orcamento_list->StopRec = $orcamento_list->TotalRecs;
} else {

	// Set the last record to display
	if ($orcamento_list->TotalRecs > $orcamento_list->StartRec + $orcamento_list->DisplayRecs - 1)
		$orcamento_list->StopRec = $orcamento_list->StartRec + $orcamento_list->DisplayRecs - 1;
	else
		$orcamento_list->StopRec = $orcamento_list->TotalRecs;
}
$orcamento_list->RecCnt = $orcamento_list->StartRec - 1;
if ($orcamento_list->Recordset && !$orcamento_list->Recordset->EOF) {
	$orcamento_list->Recordset->moveFirst();
	$selectLimit = $orcamento_list->UseSelectLimit;
	if (!$selectLimit && $orcamento_list->StartRec > 1)
		$orcamento_list->Recordset->move($orcamento_list->StartRec - 1);
} elseif (!$orcamento->AllowAddDeleteRow && $orcamento_list->StopRec == 0) {
	$orcamento_list->StopRec = $orcamento->GridAddRowCount;
}

// Initialize aggregate
$orcamento->RowType = ROWTYPE_AGGREGATEINIT;
$orcamento->resetAttributes();
$orcamento_list->renderRow();
while ($orcamento_list->RecCnt < $orcamento_list->StopRec) {
	$orcamento_list->RecCnt++;
	if ($orcamento_list->RecCnt >= $orcamento_list->StartRec) {
		$orcamento_list->RowCnt++;

		// Set up key count
		$orcamento_list->KeyCount = $orcamento_list->RowIndex;

		// Init row class and style
		$orcamento->resetAttributes();
		$orcamento->CssClass = "";
		if ($orcamento->isGridAdd()) {
		} else {
			$orcamento_list->loadRowValues($orcamento_list->Recordset); // Load row values
		}
		$orcamento->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$orcamento->RowAttrs = array_merge($orcamento->RowAttrs, array('data-rowindex'=>$orcamento_list->RowCnt, 'id'=>'r' . $orcamento_list->RowCnt . '_orcamento', 'data-rowtype'=>$orcamento->RowType));

		// Render row
		$orcamento_list->renderRow();

		// Render list options
		$orcamento_list->renderListOptions();
?>
	<tr<?php echo $orcamento->rowAttributes() ?>>
<?php

// Render list options (body, left)
$orcamento_list->ListOptions->render("body", "left", $orcamento_list->RowCnt);
?>
	<?php if ($orcamento->id_orcamento->Visible) { // id_orcamento ?>
		<td data-name="id_orcamento"<?php echo $orcamento->id_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_list->RowCnt ?>_orcamento_id_orcamento" class="orcamento_id_orcamento">
<span<?php echo $orcamento->id_orcamento->viewAttributes() ?>>
<?php echo $orcamento->id_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($orcamento->descricao_orcamento->Visible) { // descricao_orcamento ?>
		<td data-name="descricao_orcamento"<?php echo $orcamento->descricao_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_list->RowCnt ?>_orcamento_descricao_orcamento" class="orcamento_descricao_orcamento">
<span<?php echo $orcamento->descricao_orcamento->viewAttributes() ?>>
<?php echo $orcamento->descricao_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($orcamento->cliente_site_id->Visible) { // cliente_site_id ?>
		<td data-name="cliente_site_id"<?php echo $orcamento->cliente_site_id->cellAttributes() ?>>
<span id="el<?php echo $orcamento_list->RowCnt ?>_orcamento_cliente_site_id" class="orcamento_cliente_site_id">
<span<?php echo $orcamento->cliente_site_id->viewAttributes() ?>>
<?php echo $orcamento->cliente_site_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($orcamento->data_lanc_orcamento->Visible) { // data_lanc_orcamento ?>
		<td data-name="data_lanc_orcamento"<?php echo $orcamento->data_lanc_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_list->RowCnt ?>_orcamento_data_lanc_orcamento" class="orcamento_data_lanc_orcamento">
<span<?php echo $orcamento->data_lanc_orcamento->viewAttributes() ?>>
<?php echo $orcamento->data_lanc_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($orcamento->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $orcamento->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $orcamento_list->RowCnt ?>_orcamento_usuario_id" class="orcamento_usuario_id">
<span<?php echo $orcamento->usuario_id->viewAttributes() ?>>
<?php echo $orcamento->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($orcamento->bool_ativo_orcamento->Visible) { // bool_ativo_orcamento ?>
		<td data-name="bool_ativo_orcamento"<?php echo $orcamento->bool_ativo_orcamento->cellAttributes() ?>>
<span id="el<?php echo $orcamento_list->RowCnt ?>_orcamento_bool_ativo_orcamento" class="orcamento_bool_ativo_orcamento">
<span<?php echo $orcamento->bool_ativo_orcamento->viewAttributes() ?>>
<?php echo $orcamento->bool_ativo_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$orcamento_list->ListOptions->render("body", "right", $orcamento_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$orcamento->isGridAdd())
		$orcamento_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$orcamento->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($orcamento_list->Recordset)
	$orcamento_list->Recordset->Close();
?>
<?php if (!$orcamento->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$orcamento->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($orcamento_list->Pager)) $orcamento_list->Pager = new PrevNextPager($orcamento_list->StartRec, $orcamento_list->DisplayRecs, $orcamento_list->TotalRecs, $orcamento_list->AutoHidePager) ?>
<?php if ($orcamento_list->Pager->RecordCount > 0 && $orcamento_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($orcamento_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $orcamento_list->pageUrl() ?>start=<?php echo $orcamento_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($orcamento_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $orcamento_list->pageUrl() ?>start=<?php echo $orcamento_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $orcamento_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($orcamento_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $orcamento_list->pageUrl() ?>start=<?php echo $orcamento_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($orcamento_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $orcamento_list->pageUrl() ?>start=<?php echo $orcamento_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $orcamento_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($orcamento_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $orcamento_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $orcamento_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $orcamento_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($orcamento_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($orcamento_list->TotalRecs == 0 && !$orcamento->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($orcamento_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$orcamento_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$orcamento->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$orcamento_list->terminate();
?>
