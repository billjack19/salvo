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
$grupo_list = new grupo_list();

// Run the page
$grupo_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$grupo_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$grupo->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fgrupolist = currentForm = new ew.Form("fgrupolist", "list");
fgrupolist.formKeyCountName = '<?php echo $grupo_list->FormKeyCountName ?>';

// Form_CustomValidate event
fgrupolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fgrupolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fgrupolistsrch = currentSearchForm = new ew.Form("fgrupolistsrch");

// Filters
fgrupolistsrch.filterList = <?php echo $grupo_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$grupo->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($grupo_list->TotalRecs > 0 && $grupo_list->ExportOptions->visible()) { ?>
<?php $grupo_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($grupo_list->ImportOptions->visible()) { ?>
<?php $grupo_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($grupo_list->SearchOptions->visible()) { ?>
<?php $grupo_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($grupo_list->FilterOptions->visible()) { ?>
<?php $grupo_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$grupo_list->renderOtherOptions();
?>
<?php if (!$grupo->isExport() && !$grupo->CurrentAction) { ?>
<form name="fgrupolistsrch" id="fgrupolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($grupo_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fgrupolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="grupo">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($grupo_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($grupo_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $grupo_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($grupo_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($grupo_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($grupo_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($grupo_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $grupo_list->showPageHeader(); ?>
<?php
$grupo_list->showMessage();
?>
<?php if ($grupo_list->TotalRecs > 0 || $grupo->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($grupo_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> grupo">
<form name="fgrupolist" id="fgrupolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($grupo_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $grupo_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="grupo">
<div id="gmp_grupo" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($grupo_list->TotalRecs > 0 || $grupo->isGridEdit()) { ?>
<table id="tbl_grupolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$grupo_list->RowType = ROWTYPE_HEADER;

// Render list options
$grupo_list->renderListOptions();

// Render list options (header, left)
$grupo_list->ListOptions->render("header", "left");
?>
<?php if ($grupo->id_grupo->Visible) { // id_grupo ?>
	<?php if ($grupo->sortUrl($grupo->id_grupo) == "") { ?>
		<th data-name="id_grupo" class="<?php echo $grupo->id_grupo->headerCellClass() ?>"><div id="elh_grupo_id_grupo" class="grupo_id_grupo"><div class="ew-table-header-caption"><?php echo $grupo->id_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_grupo" class="<?php echo $grupo->id_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $grupo->SortUrl($grupo->id_grupo) ?>',1);"><div id="elh_grupo_id_grupo" class="grupo_id_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $grupo->id_grupo->caption() ?></span><span class="ew-table-header-sort"><?php if ($grupo->id_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($grupo->id_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($grupo->descricao_grupo->Visible) { // descricao_grupo ?>
	<?php if ($grupo->sortUrl($grupo->descricao_grupo) == "") { ?>
		<th data-name="descricao_grupo" class="<?php echo $grupo->descricao_grupo->headerCellClass() ?>"><div id="elh_grupo_descricao_grupo" class="grupo_descricao_grupo"><div class="ew-table-header-caption"><?php echo $grupo->descricao_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_grupo" class="<?php echo $grupo->descricao_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $grupo->SortUrl($grupo->descricao_grupo) ?>',1);"><div id="elh_grupo_descricao_grupo" class="grupo_descricao_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $grupo->descricao_grupo->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($grupo->descricao_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($grupo->descricao_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($grupo->imagem_grupo->Visible) { // imagem_grupo ?>
	<?php if ($grupo->sortUrl($grupo->imagem_grupo) == "") { ?>
		<th data-name="imagem_grupo" class="<?php echo $grupo->imagem_grupo->headerCellClass() ?>"><div id="elh_grupo_imagem_grupo" class="grupo_imagem_grupo"><div class="ew-table-header-caption"><?php echo $grupo->imagem_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_grupo" class="<?php echo $grupo->imagem_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $grupo->SortUrl($grupo->imagem_grupo) ?>',1);"><div id="elh_grupo_imagem_grupo" class="grupo_imagem_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $grupo->imagem_grupo->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($grupo->imagem_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($grupo->imagem_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($grupo->data_atualizacao_grupo->Visible) { // data_atualizacao_grupo ?>
	<?php if ($grupo->sortUrl($grupo->data_atualizacao_grupo) == "") { ?>
		<th data-name="data_atualizacao_grupo" class="<?php echo $grupo->data_atualizacao_grupo->headerCellClass() ?>"><div id="elh_grupo_data_atualizacao_grupo" class="grupo_data_atualizacao_grupo"><div class="ew-table-header-caption"><?php echo $grupo->data_atualizacao_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_grupo" class="<?php echo $grupo->data_atualizacao_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $grupo->SortUrl($grupo->data_atualizacao_grupo) ?>',1);"><div id="elh_grupo_data_atualizacao_grupo" class="grupo_data_atualizacao_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $grupo->data_atualizacao_grupo->caption() ?></span><span class="ew-table-header-sort"><?php if ($grupo->data_atualizacao_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($grupo->data_atualizacao_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($grupo->usuario_id->Visible) { // usuario_id ?>
	<?php if ($grupo->sortUrl($grupo->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $grupo->usuario_id->headerCellClass() ?>"><div id="elh_grupo_usuario_id" class="grupo_usuario_id"><div class="ew-table-header-caption"><?php echo $grupo->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $grupo->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $grupo->SortUrl($grupo->usuario_id) ?>',1);"><div id="elh_grupo_usuario_id" class="grupo_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $grupo->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($grupo->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($grupo->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($grupo->bool_ativo_grupo->Visible) { // bool_ativo_grupo ?>
	<?php if ($grupo->sortUrl($grupo->bool_ativo_grupo) == "") { ?>
		<th data-name="bool_ativo_grupo" class="<?php echo $grupo->bool_ativo_grupo->headerCellClass() ?>"><div id="elh_grupo_bool_ativo_grupo" class="grupo_bool_ativo_grupo"><div class="ew-table-header-caption"><?php echo $grupo->bool_ativo_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_grupo" class="<?php echo $grupo->bool_ativo_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $grupo->SortUrl($grupo->bool_ativo_grupo) ?>',1);"><div id="elh_grupo_bool_ativo_grupo" class="grupo_bool_ativo_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $grupo->bool_ativo_grupo->caption() ?></span><span class="ew-table-header-sort"><?php if ($grupo->bool_ativo_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($grupo->bool_ativo_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$grupo_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($grupo->ExportAll && $grupo->isExport()) {
	$grupo_list->StopRec = $grupo_list->TotalRecs;
} else {

	// Set the last record to display
	if ($grupo_list->TotalRecs > $grupo_list->StartRec + $grupo_list->DisplayRecs - 1)
		$grupo_list->StopRec = $grupo_list->StartRec + $grupo_list->DisplayRecs - 1;
	else
		$grupo_list->StopRec = $grupo_list->TotalRecs;
}
$grupo_list->RecCnt = $grupo_list->StartRec - 1;
if ($grupo_list->Recordset && !$grupo_list->Recordset->EOF) {
	$grupo_list->Recordset->moveFirst();
	$selectLimit = $grupo_list->UseSelectLimit;
	if (!$selectLimit && $grupo_list->StartRec > 1)
		$grupo_list->Recordset->move($grupo_list->StartRec - 1);
} elseif (!$grupo->AllowAddDeleteRow && $grupo_list->StopRec == 0) {
	$grupo_list->StopRec = $grupo->GridAddRowCount;
}

// Initialize aggregate
$grupo->RowType = ROWTYPE_AGGREGATEINIT;
$grupo->resetAttributes();
$grupo_list->renderRow();
while ($grupo_list->RecCnt < $grupo_list->StopRec) {
	$grupo_list->RecCnt++;
	if ($grupo_list->RecCnt >= $grupo_list->StartRec) {
		$grupo_list->RowCnt++;

		// Set up key count
		$grupo_list->KeyCount = $grupo_list->RowIndex;

		// Init row class and style
		$grupo->resetAttributes();
		$grupo->CssClass = "";
		if ($grupo->isGridAdd()) {
		} else {
			$grupo_list->loadRowValues($grupo_list->Recordset); // Load row values
		}
		$grupo->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$grupo->RowAttrs = array_merge($grupo->RowAttrs, array('data-rowindex'=>$grupo_list->RowCnt, 'id'=>'r' . $grupo_list->RowCnt . '_grupo', 'data-rowtype'=>$grupo->RowType));

		// Render row
		$grupo_list->renderRow();

		// Render list options
		$grupo_list->renderListOptions();
?>
	<tr<?php echo $grupo->rowAttributes() ?>>
<?php

// Render list options (body, left)
$grupo_list->ListOptions->render("body", "left", $grupo_list->RowCnt);
?>
	<?php if ($grupo->id_grupo->Visible) { // id_grupo ?>
		<td data-name="id_grupo"<?php echo $grupo->id_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_list->RowCnt ?>_grupo_id_grupo" class="grupo_id_grupo">
<span<?php echo $grupo->id_grupo->viewAttributes() ?>>
<?php echo $grupo->id_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($grupo->descricao_grupo->Visible) { // descricao_grupo ?>
		<td data-name="descricao_grupo"<?php echo $grupo->descricao_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_list->RowCnt ?>_grupo_descricao_grupo" class="grupo_descricao_grupo">
<span<?php echo $grupo->descricao_grupo->viewAttributes() ?>>
<?php echo $grupo->descricao_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($grupo->imagem_grupo->Visible) { // imagem_grupo ?>
		<td data-name="imagem_grupo"<?php echo $grupo->imagem_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_list->RowCnt ?>_grupo_imagem_grupo" class="grupo_imagem_grupo">
<span<?php echo $grupo->imagem_grupo->viewAttributes() ?>>
<?php echo $grupo->imagem_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($grupo->data_atualizacao_grupo->Visible) { // data_atualizacao_grupo ?>
		<td data-name="data_atualizacao_grupo"<?php echo $grupo->data_atualizacao_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_list->RowCnt ?>_grupo_data_atualizacao_grupo" class="grupo_data_atualizacao_grupo">
<span<?php echo $grupo->data_atualizacao_grupo->viewAttributes() ?>>
<?php echo $grupo->data_atualizacao_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($grupo->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $grupo->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $grupo_list->RowCnt ?>_grupo_usuario_id" class="grupo_usuario_id">
<span<?php echo $grupo->usuario_id->viewAttributes() ?>>
<?php echo $grupo->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($grupo->bool_ativo_grupo->Visible) { // bool_ativo_grupo ?>
		<td data-name="bool_ativo_grupo"<?php echo $grupo->bool_ativo_grupo->cellAttributes() ?>>
<span id="el<?php echo $grupo_list->RowCnt ?>_grupo_bool_ativo_grupo" class="grupo_bool_ativo_grupo">
<span<?php echo $grupo->bool_ativo_grupo->viewAttributes() ?>>
<?php echo $grupo->bool_ativo_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$grupo_list->ListOptions->render("body", "right", $grupo_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$grupo->isGridAdd())
		$grupo_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$grupo->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($grupo_list->Recordset)
	$grupo_list->Recordset->Close();
?>
<?php if (!$grupo->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$grupo->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($grupo_list->Pager)) $grupo_list->Pager = new PrevNextPager($grupo_list->StartRec, $grupo_list->DisplayRecs, $grupo_list->TotalRecs, $grupo_list->AutoHidePager) ?>
<?php if ($grupo_list->Pager->RecordCount > 0 && $grupo_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($grupo_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $grupo_list->pageUrl() ?>start=<?php echo $grupo_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($grupo_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $grupo_list->pageUrl() ?>start=<?php echo $grupo_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $grupo_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($grupo_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $grupo_list->pageUrl() ?>start=<?php echo $grupo_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($grupo_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $grupo_list->pageUrl() ?>start=<?php echo $grupo_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $grupo_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($grupo_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $grupo_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $grupo_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $grupo_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($grupo_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($grupo_list->TotalRecs == 0 && !$grupo->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($grupo_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$grupo_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$grupo->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$grupo_list->terminate();
?>
