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
$fotos_list = new fotos_list();

// Run the page
$fotos_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$fotos_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$fotos->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ffotoslist = currentForm = new ew.Form("ffotoslist", "list");
ffotoslist.formKeyCountName = '<?php echo $fotos_list->FormKeyCountName ?>';

// Form_CustomValidate event
ffotoslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ffotoslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ffotoslistsrch = currentSearchForm = new ew.Form("ffotoslistsrch");

// Filters
ffotoslistsrch.filterList = <?php echo $fotos_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$fotos->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($fotos_list->TotalRecs > 0 && $fotos_list->ExportOptions->visible()) { ?>
<?php $fotos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($fotos_list->ImportOptions->visible()) { ?>
<?php $fotos_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($fotos_list->SearchOptions->visible()) { ?>
<?php $fotos_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($fotos_list->FilterOptions->visible()) { ?>
<?php $fotos_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$fotos_list->renderOtherOptions();
?>
<?php if (!$fotos->isExport() && !$fotos->CurrentAction) { ?>
<form name="ffotoslistsrch" id="ffotoslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($fotos_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ffotoslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="fotos">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($fotos_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($fotos_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $fotos_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($fotos_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($fotos_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($fotos_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($fotos_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $fotos_list->showPageHeader(); ?>
<?php
$fotos_list->showMessage();
?>
<?php if ($fotos_list->TotalRecs > 0 || $fotos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($fotos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> fotos">
<form name="ffotoslist" id="ffotoslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($fotos_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $fotos_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="fotos">
<div id="gmp_fotos" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($fotos_list->TotalRecs > 0 || $fotos->isGridEdit()) { ?>
<table id="tbl_fotoslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$fotos_list->RowType = ROWTYPE_HEADER;

// Render list options
$fotos_list->renderListOptions();

// Render list options (header, left)
$fotos_list->ListOptions->render("header", "left");
?>
<?php if ($fotos->id_fotos->Visible) { // id_fotos ?>
	<?php if ($fotos->sortUrl($fotos->id_fotos) == "") { ?>
		<th data-name="id_fotos" class="<?php echo $fotos->id_fotos->headerCellClass() ?>"><div id="elh_fotos_id_fotos" class="fotos_id_fotos"><div class="ew-table-header-caption"><?php echo $fotos->id_fotos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_fotos" class="<?php echo $fotos->id_fotos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $fotos->SortUrl($fotos->id_fotos) ?>',1);"><div id="elh_fotos_id_fotos" class="fotos_id_fotos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $fotos->id_fotos->caption() ?></span><span class="ew-table-header-sort"><?php if ($fotos->id_fotos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($fotos->id_fotos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($fotos->descricao_fotos->Visible) { // descricao_fotos ?>
	<?php if ($fotos->sortUrl($fotos->descricao_fotos) == "") { ?>
		<th data-name="descricao_fotos" class="<?php echo $fotos->descricao_fotos->headerCellClass() ?>"><div id="elh_fotos_descricao_fotos" class="fotos_descricao_fotos"><div class="ew-table-header-caption"><?php echo $fotos->descricao_fotos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_fotos" class="<?php echo $fotos->descricao_fotos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $fotos->SortUrl($fotos->descricao_fotos) ?>',1);"><div id="elh_fotos_descricao_fotos" class="fotos_descricao_fotos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $fotos->descricao_fotos->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($fotos->descricao_fotos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($fotos->descricao_fotos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($fotos->imagem_fotos->Visible) { // imagem_fotos ?>
	<?php if ($fotos->sortUrl($fotos->imagem_fotos) == "") { ?>
		<th data-name="imagem_fotos" class="<?php echo $fotos->imagem_fotos->headerCellClass() ?>"><div id="elh_fotos_imagem_fotos" class="fotos_imagem_fotos"><div class="ew-table-header-caption"><?php echo $fotos->imagem_fotos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_fotos" class="<?php echo $fotos->imagem_fotos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $fotos->SortUrl($fotos->imagem_fotos) ?>',1);"><div id="elh_fotos_imagem_fotos" class="fotos_imagem_fotos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $fotos->imagem_fotos->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($fotos->imagem_fotos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($fotos->imagem_fotos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($fotos->item_id->Visible) { // item_id ?>
	<?php if ($fotos->sortUrl($fotos->item_id) == "") { ?>
		<th data-name="item_id" class="<?php echo $fotos->item_id->headerCellClass() ?>"><div id="elh_fotos_item_id" class="fotos_item_id"><div class="ew-table-header-caption"><?php echo $fotos->item_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="item_id" class="<?php echo $fotos->item_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $fotos->SortUrl($fotos->item_id) ?>',1);"><div id="elh_fotos_item_id" class="fotos_item_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $fotos->item_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($fotos->item_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($fotos->item_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($fotos->data_atualizacao_fotos->Visible) { // data_atualizacao_fotos ?>
	<?php if ($fotos->sortUrl($fotos->data_atualizacao_fotos) == "") { ?>
		<th data-name="data_atualizacao_fotos" class="<?php echo $fotos->data_atualizacao_fotos->headerCellClass() ?>"><div id="elh_fotos_data_atualizacao_fotos" class="fotos_data_atualizacao_fotos"><div class="ew-table-header-caption"><?php echo $fotos->data_atualizacao_fotos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_fotos" class="<?php echo $fotos->data_atualizacao_fotos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $fotos->SortUrl($fotos->data_atualizacao_fotos) ?>',1);"><div id="elh_fotos_data_atualizacao_fotos" class="fotos_data_atualizacao_fotos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $fotos->data_atualizacao_fotos->caption() ?></span><span class="ew-table-header-sort"><?php if ($fotos->data_atualizacao_fotos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($fotos->data_atualizacao_fotos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($fotos->usuario_id->Visible) { // usuario_id ?>
	<?php if ($fotos->sortUrl($fotos->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $fotos->usuario_id->headerCellClass() ?>"><div id="elh_fotos_usuario_id" class="fotos_usuario_id"><div class="ew-table-header-caption"><?php echo $fotos->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $fotos->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $fotos->SortUrl($fotos->usuario_id) ?>',1);"><div id="elh_fotos_usuario_id" class="fotos_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $fotos->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($fotos->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($fotos->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($fotos->bool_ativo_fotos->Visible) { // bool_ativo_fotos ?>
	<?php if ($fotos->sortUrl($fotos->bool_ativo_fotos) == "") { ?>
		<th data-name="bool_ativo_fotos" class="<?php echo $fotos->bool_ativo_fotos->headerCellClass() ?>"><div id="elh_fotos_bool_ativo_fotos" class="fotos_bool_ativo_fotos"><div class="ew-table-header-caption"><?php echo $fotos->bool_ativo_fotos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_fotos" class="<?php echo $fotos->bool_ativo_fotos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $fotos->SortUrl($fotos->bool_ativo_fotos) ?>',1);"><div id="elh_fotos_bool_ativo_fotos" class="fotos_bool_ativo_fotos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $fotos->bool_ativo_fotos->caption() ?></span><span class="ew-table-header-sort"><?php if ($fotos->bool_ativo_fotos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($fotos->bool_ativo_fotos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$fotos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($fotos->ExportAll && $fotos->isExport()) {
	$fotos_list->StopRec = $fotos_list->TotalRecs;
} else {

	// Set the last record to display
	if ($fotos_list->TotalRecs > $fotos_list->StartRec + $fotos_list->DisplayRecs - 1)
		$fotos_list->StopRec = $fotos_list->StartRec + $fotos_list->DisplayRecs - 1;
	else
		$fotos_list->StopRec = $fotos_list->TotalRecs;
}
$fotos_list->RecCnt = $fotos_list->StartRec - 1;
if ($fotos_list->Recordset && !$fotos_list->Recordset->EOF) {
	$fotos_list->Recordset->moveFirst();
	$selectLimit = $fotos_list->UseSelectLimit;
	if (!$selectLimit && $fotos_list->StartRec > 1)
		$fotos_list->Recordset->move($fotos_list->StartRec - 1);
} elseif (!$fotos->AllowAddDeleteRow && $fotos_list->StopRec == 0) {
	$fotos_list->StopRec = $fotos->GridAddRowCount;
}

// Initialize aggregate
$fotos->RowType = ROWTYPE_AGGREGATEINIT;
$fotos->resetAttributes();
$fotos_list->renderRow();
while ($fotos_list->RecCnt < $fotos_list->StopRec) {
	$fotos_list->RecCnt++;
	if ($fotos_list->RecCnt >= $fotos_list->StartRec) {
		$fotos_list->RowCnt++;

		// Set up key count
		$fotos_list->KeyCount = $fotos_list->RowIndex;

		// Init row class and style
		$fotos->resetAttributes();
		$fotos->CssClass = "";
		if ($fotos->isGridAdd()) {
		} else {
			$fotos_list->loadRowValues($fotos_list->Recordset); // Load row values
		}
		$fotos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$fotos->RowAttrs = array_merge($fotos->RowAttrs, array('data-rowindex'=>$fotos_list->RowCnt, 'id'=>'r' . $fotos_list->RowCnt . '_fotos', 'data-rowtype'=>$fotos->RowType));

		// Render row
		$fotos_list->renderRow();

		// Render list options
		$fotos_list->renderListOptions();
?>
	<tr<?php echo $fotos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$fotos_list->ListOptions->render("body", "left", $fotos_list->RowCnt);
?>
	<?php if ($fotos->id_fotos->Visible) { // id_fotos ?>
		<td data-name="id_fotos"<?php echo $fotos->id_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_list->RowCnt ?>_fotos_id_fotos" class="fotos_id_fotos">
<span<?php echo $fotos->id_fotos->viewAttributes() ?>>
<?php echo $fotos->id_fotos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($fotos->descricao_fotos->Visible) { // descricao_fotos ?>
		<td data-name="descricao_fotos"<?php echo $fotos->descricao_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_list->RowCnt ?>_fotos_descricao_fotos" class="fotos_descricao_fotos">
<span<?php echo $fotos->descricao_fotos->viewAttributes() ?>>
<?php echo $fotos->descricao_fotos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($fotos->imagem_fotos->Visible) { // imagem_fotos ?>
		<td data-name="imagem_fotos"<?php echo $fotos->imagem_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_list->RowCnt ?>_fotos_imagem_fotos" class="fotos_imagem_fotos">
<span<?php echo $fotos->imagem_fotos->viewAttributes() ?>>
<?php echo $fotos->imagem_fotos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($fotos->item_id->Visible) { // item_id ?>
		<td data-name="item_id"<?php echo $fotos->item_id->cellAttributes() ?>>
<span id="el<?php echo $fotos_list->RowCnt ?>_fotos_item_id" class="fotos_item_id">
<span<?php echo $fotos->item_id->viewAttributes() ?>>
<?php echo $fotos->item_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($fotos->data_atualizacao_fotos->Visible) { // data_atualizacao_fotos ?>
		<td data-name="data_atualizacao_fotos"<?php echo $fotos->data_atualizacao_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_list->RowCnt ?>_fotos_data_atualizacao_fotos" class="fotos_data_atualizacao_fotos">
<span<?php echo $fotos->data_atualizacao_fotos->viewAttributes() ?>>
<?php echo $fotos->data_atualizacao_fotos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($fotos->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $fotos->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $fotos_list->RowCnt ?>_fotos_usuario_id" class="fotos_usuario_id">
<span<?php echo $fotos->usuario_id->viewAttributes() ?>>
<?php echo $fotos->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($fotos->bool_ativo_fotos->Visible) { // bool_ativo_fotos ?>
		<td data-name="bool_ativo_fotos"<?php echo $fotos->bool_ativo_fotos->cellAttributes() ?>>
<span id="el<?php echo $fotos_list->RowCnt ?>_fotos_bool_ativo_fotos" class="fotos_bool_ativo_fotos">
<span<?php echo $fotos->bool_ativo_fotos->viewAttributes() ?>>
<?php echo $fotos->bool_ativo_fotos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$fotos_list->ListOptions->render("body", "right", $fotos_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$fotos->isGridAdd())
		$fotos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$fotos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($fotos_list->Recordset)
	$fotos_list->Recordset->Close();
?>
<?php if (!$fotos->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$fotos->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($fotos_list->Pager)) $fotos_list->Pager = new PrevNextPager($fotos_list->StartRec, $fotos_list->DisplayRecs, $fotos_list->TotalRecs, $fotos_list->AutoHidePager) ?>
<?php if ($fotos_list->Pager->RecordCount > 0 && $fotos_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($fotos_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $fotos_list->pageUrl() ?>start=<?php echo $fotos_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($fotos_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $fotos_list->pageUrl() ?>start=<?php echo $fotos_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $fotos_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($fotos_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $fotos_list->pageUrl() ?>start=<?php echo $fotos_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($fotos_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $fotos_list->pageUrl() ?>start=<?php echo $fotos_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $fotos_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($fotos_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $fotos_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $fotos_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $fotos_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($fotos_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($fotos_list->TotalRecs == 0 && !$fotos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($fotos_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$fotos_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$fotos->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$fotos_list->terminate();
?>
