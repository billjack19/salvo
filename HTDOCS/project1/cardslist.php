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
$cards_list = new cards_list();

// Run the page
$cards_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cards_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$cards->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcardslist = currentForm = new ew.Form("fcardslist", "list");
fcardslist.formKeyCountName = '<?php echo $cards_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcardslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcardslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcardslistsrch = currentSearchForm = new ew.Form("fcardslistsrch");

// Filters
fcardslistsrch.filterList = <?php echo $cards_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$cards->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($cards_list->TotalRecs > 0 && $cards_list->ExportOptions->visible()) { ?>
<?php $cards_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($cards_list->ImportOptions->visible()) { ?>
<?php $cards_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($cards_list->SearchOptions->visible()) { ?>
<?php $cards_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($cards_list->FilterOptions->visible()) { ?>
<?php $cards_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$cards_list->renderOtherOptions();
?>
<?php if (!$cards->isExport() && !$cards->CurrentAction) { ?>
<form name="fcardslistsrch" id="fcardslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($cards_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcardslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="cards">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($cards_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($cards_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $cards_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($cards_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($cards_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($cards_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($cards_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $cards_list->showPageHeader(); ?>
<?php
$cards_list->showMessage();
?>
<?php if ($cards_list->TotalRecs > 0 || $cards->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($cards_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> cards">
<form name="fcardslist" id="fcardslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cards_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cards_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cards">
<div id="gmp_cards" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($cards_list->TotalRecs > 0 || $cards->isGridEdit()) { ?>
<table id="tbl_cardslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$cards_list->RowType = ROWTYPE_HEADER;

// Render list options
$cards_list->renderListOptions();

// Render list options (header, left)
$cards_list->ListOptions->render("header", "left");
?>
<?php if ($cards->id_cards->Visible) { // id_cards ?>
	<?php if ($cards->sortUrl($cards->id_cards) == "") { ?>
		<th data-name="id_cards" class="<?php echo $cards->id_cards->headerCellClass() ?>"><div id="elh_cards_id_cards" class="cards_id_cards"><div class="ew-table-header-caption"><?php echo $cards->id_cards->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_cards" class="<?php echo $cards->id_cards->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cards->SortUrl($cards->id_cards) ?>',1);"><div id="elh_cards_id_cards" class="cards_id_cards">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cards->id_cards->caption() ?></span><span class="ew-table-header-sort"><?php if ($cards->id_cards->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cards->id_cards->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cards->titulo_cards->Visible) { // titulo_cards ?>
	<?php if ($cards->sortUrl($cards->titulo_cards) == "") { ?>
		<th data-name="titulo_cards" class="<?php echo $cards->titulo_cards->headerCellClass() ?>"><div id="elh_cards_titulo_cards" class="cards_titulo_cards"><div class="ew-table-header-caption"><?php echo $cards->titulo_cards->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_cards" class="<?php echo $cards->titulo_cards->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cards->SortUrl($cards->titulo_cards) ?>',1);"><div id="elh_cards_titulo_cards" class="cards_titulo_cards">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cards->titulo_cards->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cards->titulo_cards->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cards->titulo_cards->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cards->descricao_cards->Visible) { // descricao_cards ?>
	<?php if ($cards->sortUrl($cards->descricao_cards) == "") { ?>
		<th data-name="descricao_cards" class="<?php echo $cards->descricao_cards->headerCellClass() ?>"><div id="elh_cards_descricao_cards" class="cards_descricao_cards"><div class="ew-table-header-caption"><?php echo $cards->descricao_cards->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_cards" class="<?php echo $cards->descricao_cards->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cards->SortUrl($cards->descricao_cards) ?>',1);"><div id="elh_cards_descricao_cards" class="cards_descricao_cards">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cards->descricao_cards->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cards->descricao_cards->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cards->descricao_cards->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cards->imagem_cards->Visible) { // imagem_cards ?>
	<?php if ($cards->sortUrl($cards->imagem_cards) == "") { ?>
		<th data-name="imagem_cards" class="<?php echo $cards->imagem_cards->headerCellClass() ?>"><div id="elh_cards_imagem_cards" class="cards_imagem_cards"><div class="ew-table-header-caption"><?php echo $cards->imagem_cards->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_cards" class="<?php echo $cards->imagem_cards->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cards->SortUrl($cards->imagem_cards) ?>',1);"><div id="elh_cards_imagem_cards" class="cards_imagem_cards">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cards->imagem_cards->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cards->imagem_cards->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cards->imagem_cards->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cards->data_atualizacao_cards->Visible) { // data_atualizacao_cards ?>
	<?php if ($cards->sortUrl($cards->data_atualizacao_cards) == "") { ?>
		<th data-name="data_atualizacao_cards" class="<?php echo $cards->data_atualizacao_cards->headerCellClass() ?>"><div id="elh_cards_data_atualizacao_cards" class="cards_data_atualizacao_cards"><div class="ew-table-header-caption"><?php echo $cards->data_atualizacao_cards->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_cards" class="<?php echo $cards->data_atualizacao_cards->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cards->SortUrl($cards->data_atualizacao_cards) ?>',1);"><div id="elh_cards_data_atualizacao_cards" class="cards_data_atualizacao_cards">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cards->data_atualizacao_cards->caption() ?></span><span class="ew-table-header-sort"><?php if ($cards->data_atualizacao_cards->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cards->data_atualizacao_cards->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cards->usuario_id->Visible) { // usuario_id ?>
	<?php if ($cards->sortUrl($cards->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $cards->usuario_id->headerCellClass() ?>"><div id="elh_cards_usuario_id" class="cards_usuario_id"><div class="ew-table-header-caption"><?php echo $cards->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $cards->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cards->SortUrl($cards->usuario_id) ?>',1);"><div id="elh_cards_usuario_id" class="cards_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cards->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($cards->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cards->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cards->bool_ativo_cards->Visible) { // bool_ativo_cards ?>
	<?php if ($cards->sortUrl($cards->bool_ativo_cards) == "") { ?>
		<th data-name="bool_ativo_cards" class="<?php echo $cards->bool_ativo_cards->headerCellClass() ?>"><div id="elh_cards_bool_ativo_cards" class="cards_bool_ativo_cards"><div class="ew-table-header-caption"><?php echo $cards->bool_ativo_cards->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_cards" class="<?php echo $cards->bool_ativo_cards->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cards->SortUrl($cards->bool_ativo_cards) ?>',1);"><div id="elh_cards_bool_ativo_cards" class="cards_bool_ativo_cards">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cards->bool_ativo_cards->caption() ?></span><span class="ew-table-header-sort"><?php if ($cards->bool_ativo_cards->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cards->bool_ativo_cards->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$cards_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($cards->ExportAll && $cards->isExport()) {
	$cards_list->StopRec = $cards_list->TotalRecs;
} else {

	// Set the last record to display
	if ($cards_list->TotalRecs > $cards_list->StartRec + $cards_list->DisplayRecs - 1)
		$cards_list->StopRec = $cards_list->StartRec + $cards_list->DisplayRecs - 1;
	else
		$cards_list->StopRec = $cards_list->TotalRecs;
}
$cards_list->RecCnt = $cards_list->StartRec - 1;
if ($cards_list->Recordset && !$cards_list->Recordset->EOF) {
	$cards_list->Recordset->moveFirst();
	$selectLimit = $cards_list->UseSelectLimit;
	if (!$selectLimit && $cards_list->StartRec > 1)
		$cards_list->Recordset->move($cards_list->StartRec - 1);
} elseif (!$cards->AllowAddDeleteRow && $cards_list->StopRec == 0) {
	$cards_list->StopRec = $cards->GridAddRowCount;
}

// Initialize aggregate
$cards->RowType = ROWTYPE_AGGREGATEINIT;
$cards->resetAttributes();
$cards_list->renderRow();
while ($cards_list->RecCnt < $cards_list->StopRec) {
	$cards_list->RecCnt++;
	if ($cards_list->RecCnt >= $cards_list->StartRec) {
		$cards_list->RowCnt++;

		// Set up key count
		$cards_list->KeyCount = $cards_list->RowIndex;

		// Init row class and style
		$cards->resetAttributes();
		$cards->CssClass = "";
		if ($cards->isGridAdd()) {
		} else {
			$cards_list->loadRowValues($cards_list->Recordset); // Load row values
		}
		$cards->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$cards->RowAttrs = array_merge($cards->RowAttrs, array('data-rowindex'=>$cards_list->RowCnt, 'id'=>'r' . $cards_list->RowCnt . '_cards', 'data-rowtype'=>$cards->RowType));

		// Render row
		$cards_list->renderRow();

		// Render list options
		$cards_list->renderListOptions();
?>
	<tr<?php echo $cards->rowAttributes() ?>>
<?php

// Render list options (body, left)
$cards_list->ListOptions->render("body", "left", $cards_list->RowCnt);
?>
	<?php if ($cards->id_cards->Visible) { // id_cards ?>
		<td data-name="id_cards"<?php echo $cards->id_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_list->RowCnt ?>_cards_id_cards" class="cards_id_cards">
<span<?php echo $cards->id_cards->viewAttributes() ?>>
<?php echo $cards->id_cards->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cards->titulo_cards->Visible) { // titulo_cards ?>
		<td data-name="titulo_cards"<?php echo $cards->titulo_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_list->RowCnt ?>_cards_titulo_cards" class="cards_titulo_cards">
<span<?php echo $cards->titulo_cards->viewAttributes() ?>>
<?php echo $cards->titulo_cards->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cards->descricao_cards->Visible) { // descricao_cards ?>
		<td data-name="descricao_cards"<?php echo $cards->descricao_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_list->RowCnt ?>_cards_descricao_cards" class="cards_descricao_cards">
<span<?php echo $cards->descricao_cards->viewAttributes() ?>>
<?php echo $cards->descricao_cards->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cards->imagem_cards->Visible) { // imagem_cards ?>
		<td data-name="imagem_cards"<?php echo $cards->imagem_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_list->RowCnt ?>_cards_imagem_cards" class="cards_imagem_cards">
<span<?php echo $cards->imagem_cards->viewAttributes() ?>>
<?php echo $cards->imagem_cards->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cards->data_atualizacao_cards->Visible) { // data_atualizacao_cards ?>
		<td data-name="data_atualizacao_cards"<?php echo $cards->data_atualizacao_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_list->RowCnt ?>_cards_data_atualizacao_cards" class="cards_data_atualizacao_cards">
<span<?php echo $cards->data_atualizacao_cards->viewAttributes() ?>>
<?php echo $cards->data_atualizacao_cards->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cards->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $cards->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $cards_list->RowCnt ?>_cards_usuario_id" class="cards_usuario_id">
<span<?php echo $cards->usuario_id->viewAttributes() ?>>
<?php echo $cards->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cards->bool_ativo_cards->Visible) { // bool_ativo_cards ?>
		<td data-name="bool_ativo_cards"<?php echo $cards->bool_ativo_cards->cellAttributes() ?>>
<span id="el<?php echo $cards_list->RowCnt ?>_cards_bool_ativo_cards" class="cards_bool_ativo_cards">
<span<?php echo $cards->bool_ativo_cards->viewAttributes() ?>>
<?php echo $cards->bool_ativo_cards->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$cards_list->ListOptions->render("body", "right", $cards_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$cards->isGridAdd())
		$cards_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$cards->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($cards_list->Recordset)
	$cards_list->Recordset->Close();
?>
<?php if (!$cards->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$cards->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($cards_list->Pager)) $cards_list->Pager = new PrevNextPager($cards_list->StartRec, $cards_list->DisplayRecs, $cards_list->TotalRecs, $cards_list->AutoHidePager) ?>
<?php if ($cards_list->Pager->RecordCount > 0 && $cards_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($cards_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $cards_list->pageUrl() ?>start=<?php echo $cards_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($cards_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $cards_list->pageUrl() ?>start=<?php echo $cards_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $cards_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($cards_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $cards_list->pageUrl() ?>start=<?php echo $cards_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($cards_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $cards_list->pageUrl() ?>start=<?php echo $cards_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $cards_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($cards_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $cards_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $cards_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $cards_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($cards_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($cards_list->TotalRecs == 0 && !$cards->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($cards_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$cards_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$cards->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$cards_list->terminate();
?>
