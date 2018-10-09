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
$estado_list = new estado_list();

// Run the page
$estado_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$estado_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$estado->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var festadolist = currentForm = new ew.Form("festadolist", "list");
festadolist.formKeyCountName = '<?php echo $estado_list->FormKeyCountName ?>';

// Form_CustomValidate event
festadolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
festadolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var festadolistsrch = currentSearchForm = new ew.Form("festadolistsrch");

// Filters
festadolistsrch.filterList = <?php echo $estado_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$estado->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($estado_list->TotalRecs > 0 && $estado_list->ExportOptions->visible()) { ?>
<?php $estado_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($estado_list->ImportOptions->visible()) { ?>
<?php $estado_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($estado_list->SearchOptions->visible()) { ?>
<?php $estado_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($estado_list->FilterOptions->visible()) { ?>
<?php $estado_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$estado_list->renderOtherOptions();
?>
<?php if (!$estado->isExport() && !$estado->CurrentAction) { ?>
<form name="festadolistsrch" id="festadolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($estado_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="festadolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="estado">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($estado_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($estado_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $estado_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($estado_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($estado_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($estado_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($estado_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $estado_list->showPageHeader(); ?>
<?php
$estado_list->showMessage();
?>
<?php if ($estado_list->TotalRecs > 0 || $estado->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($estado_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> estado">
<form name="festadolist" id="festadolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($estado_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $estado_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="estado">
<div id="gmp_estado" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($estado_list->TotalRecs > 0 || $estado->isGridEdit()) { ?>
<table id="tbl_estadolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$estado_list->RowType = ROWTYPE_HEADER;

// Render list options
$estado_list->renderListOptions();

// Render list options (header, left)
$estado_list->ListOptions->render("header", "left");
?>
<?php if ($estado->id_estado->Visible) { // id_estado ?>
	<?php if ($estado->sortUrl($estado->id_estado) == "") { ?>
		<th data-name="id_estado" class="<?php echo $estado->id_estado->headerCellClass() ?>"><div id="elh_estado_id_estado" class="estado_id_estado"><div class="ew-table-header-caption"><?php echo $estado->id_estado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_estado" class="<?php echo $estado->id_estado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $estado->SortUrl($estado->id_estado) ?>',1);"><div id="elh_estado_id_estado" class="estado_id_estado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $estado->id_estado->caption() ?></span><span class="ew-table-header-sort"><?php if ($estado->id_estado->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($estado->id_estado->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($estado->descricao_estado->Visible) { // descricao_estado ?>
	<?php if ($estado->sortUrl($estado->descricao_estado) == "") { ?>
		<th data-name="descricao_estado" class="<?php echo $estado->descricao_estado->headerCellClass() ?>"><div id="elh_estado_descricao_estado" class="estado_descricao_estado"><div class="ew-table-header-caption"><?php echo $estado->descricao_estado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_estado" class="<?php echo $estado->descricao_estado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $estado->SortUrl($estado->descricao_estado) ?>',1);"><div id="elh_estado_descricao_estado" class="estado_descricao_estado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $estado->descricao_estado->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($estado->descricao_estado->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($estado->descricao_estado->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($estado->sigla_estado->Visible) { // sigla_estado ?>
	<?php if ($estado->sortUrl($estado->sigla_estado) == "") { ?>
		<th data-name="sigla_estado" class="<?php echo $estado->sigla_estado->headerCellClass() ?>"><div id="elh_estado_sigla_estado" class="estado_sigla_estado"><div class="ew-table-header-caption"><?php echo $estado->sigla_estado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sigla_estado" class="<?php echo $estado->sigla_estado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $estado->SortUrl($estado->sigla_estado) ?>',1);"><div id="elh_estado_sigla_estado" class="estado_sigla_estado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $estado->sigla_estado->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($estado->sigla_estado->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($estado->sigla_estado->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($estado->usuario_id->Visible) { // usuario_id ?>
	<?php if ($estado->sortUrl($estado->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $estado->usuario_id->headerCellClass() ?>"><div id="elh_estado_usuario_id" class="estado_usuario_id"><div class="ew-table-header-caption"><?php echo $estado->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $estado->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $estado->SortUrl($estado->usuario_id) ?>',1);"><div id="elh_estado_usuario_id" class="estado_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $estado->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($estado->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($estado->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($estado->bool_ativo_estado->Visible) { // bool_ativo_estado ?>
	<?php if ($estado->sortUrl($estado->bool_ativo_estado) == "") { ?>
		<th data-name="bool_ativo_estado" class="<?php echo $estado->bool_ativo_estado->headerCellClass() ?>"><div id="elh_estado_bool_ativo_estado" class="estado_bool_ativo_estado"><div class="ew-table-header-caption"><?php echo $estado->bool_ativo_estado->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_estado" class="<?php echo $estado->bool_ativo_estado->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $estado->SortUrl($estado->bool_ativo_estado) ?>',1);"><div id="elh_estado_bool_ativo_estado" class="estado_bool_ativo_estado">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $estado->bool_ativo_estado->caption() ?></span><span class="ew-table-header-sort"><?php if ($estado->bool_ativo_estado->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($estado->bool_ativo_estado->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$estado_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($estado->ExportAll && $estado->isExport()) {
	$estado_list->StopRec = $estado_list->TotalRecs;
} else {

	// Set the last record to display
	if ($estado_list->TotalRecs > $estado_list->StartRec + $estado_list->DisplayRecs - 1)
		$estado_list->StopRec = $estado_list->StartRec + $estado_list->DisplayRecs - 1;
	else
		$estado_list->StopRec = $estado_list->TotalRecs;
}
$estado_list->RecCnt = $estado_list->StartRec - 1;
if ($estado_list->Recordset && !$estado_list->Recordset->EOF) {
	$estado_list->Recordset->moveFirst();
	$selectLimit = $estado_list->UseSelectLimit;
	if (!$selectLimit && $estado_list->StartRec > 1)
		$estado_list->Recordset->move($estado_list->StartRec - 1);
} elseif (!$estado->AllowAddDeleteRow && $estado_list->StopRec == 0) {
	$estado_list->StopRec = $estado->GridAddRowCount;
}

// Initialize aggregate
$estado->RowType = ROWTYPE_AGGREGATEINIT;
$estado->resetAttributes();
$estado_list->renderRow();
while ($estado_list->RecCnt < $estado_list->StopRec) {
	$estado_list->RecCnt++;
	if ($estado_list->RecCnt >= $estado_list->StartRec) {
		$estado_list->RowCnt++;

		// Set up key count
		$estado_list->KeyCount = $estado_list->RowIndex;

		// Init row class and style
		$estado->resetAttributes();
		$estado->CssClass = "";
		if ($estado->isGridAdd()) {
		} else {
			$estado_list->loadRowValues($estado_list->Recordset); // Load row values
		}
		$estado->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$estado->RowAttrs = array_merge($estado->RowAttrs, array('data-rowindex'=>$estado_list->RowCnt, 'id'=>'r' . $estado_list->RowCnt . '_estado', 'data-rowtype'=>$estado->RowType));

		// Render row
		$estado_list->renderRow();

		// Render list options
		$estado_list->renderListOptions();
?>
	<tr<?php echo $estado->rowAttributes() ?>>
<?php

// Render list options (body, left)
$estado_list->ListOptions->render("body", "left", $estado_list->RowCnt);
?>
	<?php if ($estado->id_estado->Visible) { // id_estado ?>
		<td data-name="id_estado"<?php echo $estado->id_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_list->RowCnt ?>_estado_id_estado" class="estado_id_estado">
<span<?php echo $estado->id_estado->viewAttributes() ?>>
<?php echo $estado->id_estado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($estado->descricao_estado->Visible) { // descricao_estado ?>
		<td data-name="descricao_estado"<?php echo $estado->descricao_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_list->RowCnt ?>_estado_descricao_estado" class="estado_descricao_estado">
<span<?php echo $estado->descricao_estado->viewAttributes() ?>>
<?php echo $estado->descricao_estado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($estado->sigla_estado->Visible) { // sigla_estado ?>
		<td data-name="sigla_estado"<?php echo $estado->sigla_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_list->RowCnt ?>_estado_sigla_estado" class="estado_sigla_estado">
<span<?php echo $estado->sigla_estado->viewAttributes() ?>>
<?php echo $estado->sigla_estado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($estado->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $estado->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $estado_list->RowCnt ?>_estado_usuario_id" class="estado_usuario_id">
<span<?php echo $estado->usuario_id->viewAttributes() ?>>
<?php echo $estado->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($estado->bool_ativo_estado->Visible) { // bool_ativo_estado ?>
		<td data-name="bool_ativo_estado"<?php echo $estado->bool_ativo_estado->cellAttributes() ?>>
<span id="el<?php echo $estado_list->RowCnt ?>_estado_bool_ativo_estado" class="estado_bool_ativo_estado">
<span<?php echo $estado->bool_ativo_estado->viewAttributes() ?>>
<?php echo $estado->bool_ativo_estado->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$estado_list->ListOptions->render("body", "right", $estado_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$estado->isGridAdd())
		$estado_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$estado->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($estado_list->Recordset)
	$estado_list->Recordset->Close();
?>
<?php if (!$estado->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$estado->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($estado_list->Pager)) $estado_list->Pager = new PrevNextPager($estado_list->StartRec, $estado_list->DisplayRecs, $estado_list->TotalRecs, $estado_list->AutoHidePager) ?>
<?php if ($estado_list->Pager->RecordCount > 0 && $estado_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($estado_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $estado_list->pageUrl() ?>start=<?php echo $estado_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($estado_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $estado_list->pageUrl() ?>start=<?php echo $estado_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $estado_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($estado_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $estado_list->pageUrl() ?>start=<?php echo $estado_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($estado_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $estado_list->pageUrl() ?>start=<?php echo $estado_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $estado_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($estado_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $estado_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $estado_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $estado_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($estado_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($estado_list->TotalRecs == 0 && !$estado->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($estado_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$estado_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$estado->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$estado_list->terminate();
?>
