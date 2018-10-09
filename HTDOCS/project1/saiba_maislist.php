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
$saiba_mais_list = new saiba_mais_list();

// Run the page
$saiba_mais_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$saiba_mais_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$saiba_mais->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsaiba_maislist = currentForm = new ew.Form("fsaiba_maislist", "list");
fsaiba_maislist.formKeyCountName = '<?php echo $saiba_mais_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsaiba_maislist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsaiba_maislist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsaiba_maislistsrch = currentSearchForm = new ew.Form("fsaiba_maislistsrch");

// Filters
fsaiba_maislistsrch.filterList = <?php echo $saiba_mais_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$saiba_mais->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($saiba_mais_list->TotalRecs > 0 && $saiba_mais_list->ExportOptions->visible()) { ?>
<?php $saiba_mais_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($saiba_mais_list->ImportOptions->visible()) { ?>
<?php $saiba_mais_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($saiba_mais_list->SearchOptions->visible()) { ?>
<?php $saiba_mais_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($saiba_mais_list->FilterOptions->visible()) { ?>
<?php $saiba_mais_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$saiba_mais_list->renderOtherOptions();
?>
<?php if (!$saiba_mais->isExport() && !$saiba_mais->CurrentAction) { ?>
<form name="fsaiba_maislistsrch" id="fsaiba_maislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($saiba_mais_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsaiba_maislistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="saiba_mais">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($saiba_mais_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($saiba_mais_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $saiba_mais_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($saiba_mais_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($saiba_mais_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($saiba_mais_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($saiba_mais_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $saiba_mais_list->showPageHeader(); ?>
<?php
$saiba_mais_list->showMessage();
?>
<?php if ($saiba_mais_list->TotalRecs > 0 || $saiba_mais->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($saiba_mais_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> saiba_mais">
<form name="fsaiba_maislist" id="fsaiba_maislist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($saiba_mais_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $saiba_mais_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="saiba_mais">
<div id="gmp_saiba_mais" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($saiba_mais_list->TotalRecs > 0 || $saiba_mais->isGridEdit()) { ?>
<table id="tbl_saiba_maislist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$saiba_mais_list->RowType = ROWTYPE_HEADER;

// Render list options
$saiba_mais_list->renderListOptions();

// Render list options (header, left)
$saiba_mais_list->ListOptions->render("header", "left");
?>
<?php if ($saiba_mais->id_saiba_mais->Visible) { // id_saiba_mais ?>
	<?php if ($saiba_mais->sortUrl($saiba_mais->id_saiba_mais) == "") { ?>
		<th data-name="id_saiba_mais" class="<?php echo $saiba_mais->id_saiba_mais->headerCellClass() ?>"><div id="elh_saiba_mais_id_saiba_mais" class="saiba_mais_id_saiba_mais"><div class="ew-table-header-caption"><?php echo $saiba_mais->id_saiba_mais->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_saiba_mais" class="<?php echo $saiba_mais->id_saiba_mais->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $saiba_mais->SortUrl($saiba_mais->id_saiba_mais) ?>',1);"><div id="elh_saiba_mais_id_saiba_mais" class="saiba_mais_id_saiba_mais">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $saiba_mais->id_saiba_mais->caption() ?></span><span class="ew-table-header-sort"><?php if ($saiba_mais->id_saiba_mais->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($saiba_mais->id_saiba_mais->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($saiba_mais->descricao_saiba_mais->Visible) { // descricao_saiba_mais ?>
	<?php if ($saiba_mais->sortUrl($saiba_mais->descricao_saiba_mais) == "") { ?>
		<th data-name="descricao_saiba_mais" class="<?php echo $saiba_mais->descricao_saiba_mais->headerCellClass() ?>"><div id="elh_saiba_mais_descricao_saiba_mais" class="saiba_mais_descricao_saiba_mais"><div class="ew-table-header-caption"><?php echo $saiba_mais->descricao_saiba_mais->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_saiba_mais" class="<?php echo $saiba_mais->descricao_saiba_mais->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $saiba_mais->SortUrl($saiba_mais->descricao_saiba_mais) ?>',1);"><div id="elh_saiba_mais_descricao_saiba_mais" class="saiba_mais_descricao_saiba_mais">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $saiba_mais->descricao_saiba_mais->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($saiba_mais->descricao_saiba_mais->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($saiba_mais->descricao_saiba_mais->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($saiba_mais->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<?php if ($saiba_mais->sortUrl($saiba_mais->pagina_principal_id) == "") { ?>
		<th data-name="pagina_principal_id" class="<?php echo $saiba_mais->pagina_principal_id->headerCellClass() ?>"><div id="elh_saiba_mais_pagina_principal_id" class="saiba_mais_pagina_principal_id"><div class="ew-table-header-caption"><?php echo $saiba_mais->pagina_principal_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pagina_principal_id" class="<?php echo $saiba_mais->pagina_principal_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $saiba_mais->SortUrl($saiba_mais->pagina_principal_id) ?>',1);"><div id="elh_saiba_mais_pagina_principal_id" class="saiba_mais_pagina_principal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $saiba_mais->pagina_principal_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($saiba_mais->pagina_principal_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($saiba_mais->pagina_principal_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($saiba_mais->usuario_id->Visible) { // usuario_id ?>
	<?php if ($saiba_mais->sortUrl($saiba_mais->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $saiba_mais->usuario_id->headerCellClass() ?>"><div id="elh_saiba_mais_usuario_id" class="saiba_mais_usuario_id"><div class="ew-table-header-caption"><?php echo $saiba_mais->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $saiba_mais->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $saiba_mais->SortUrl($saiba_mais->usuario_id) ?>',1);"><div id="elh_saiba_mais_usuario_id" class="saiba_mais_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $saiba_mais->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($saiba_mais->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($saiba_mais->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($saiba_mais->data_atualizacao_saiba_mais->Visible) { // data_atualizacao_saiba_mais ?>
	<?php if ($saiba_mais->sortUrl($saiba_mais->data_atualizacao_saiba_mais) == "") { ?>
		<th data-name="data_atualizacao_saiba_mais" class="<?php echo $saiba_mais->data_atualizacao_saiba_mais->headerCellClass() ?>"><div id="elh_saiba_mais_data_atualizacao_saiba_mais" class="saiba_mais_data_atualizacao_saiba_mais"><div class="ew-table-header-caption"><?php echo $saiba_mais->data_atualizacao_saiba_mais->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_saiba_mais" class="<?php echo $saiba_mais->data_atualizacao_saiba_mais->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $saiba_mais->SortUrl($saiba_mais->data_atualizacao_saiba_mais) ?>',1);"><div id="elh_saiba_mais_data_atualizacao_saiba_mais" class="saiba_mais_data_atualizacao_saiba_mais">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $saiba_mais->data_atualizacao_saiba_mais->caption() ?></span><span class="ew-table-header-sort"><?php if ($saiba_mais->data_atualizacao_saiba_mais->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($saiba_mais->data_atualizacao_saiba_mais->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($saiba_mais->bool_ativo_saiba_mais->Visible) { // bool_ativo_saiba_mais ?>
	<?php if ($saiba_mais->sortUrl($saiba_mais->bool_ativo_saiba_mais) == "") { ?>
		<th data-name="bool_ativo_saiba_mais" class="<?php echo $saiba_mais->bool_ativo_saiba_mais->headerCellClass() ?>"><div id="elh_saiba_mais_bool_ativo_saiba_mais" class="saiba_mais_bool_ativo_saiba_mais"><div class="ew-table-header-caption"><?php echo $saiba_mais->bool_ativo_saiba_mais->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_saiba_mais" class="<?php echo $saiba_mais->bool_ativo_saiba_mais->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $saiba_mais->SortUrl($saiba_mais->bool_ativo_saiba_mais) ?>',1);"><div id="elh_saiba_mais_bool_ativo_saiba_mais" class="saiba_mais_bool_ativo_saiba_mais">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $saiba_mais->bool_ativo_saiba_mais->caption() ?></span><span class="ew-table-header-sort"><?php if ($saiba_mais->bool_ativo_saiba_mais->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($saiba_mais->bool_ativo_saiba_mais->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$saiba_mais_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($saiba_mais->ExportAll && $saiba_mais->isExport()) {
	$saiba_mais_list->StopRec = $saiba_mais_list->TotalRecs;
} else {

	// Set the last record to display
	if ($saiba_mais_list->TotalRecs > $saiba_mais_list->StartRec + $saiba_mais_list->DisplayRecs - 1)
		$saiba_mais_list->StopRec = $saiba_mais_list->StartRec + $saiba_mais_list->DisplayRecs - 1;
	else
		$saiba_mais_list->StopRec = $saiba_mais_list->TotalRecs;
}
$saiba_mais_list->RecCnt = $saiba_mais_list->StartRec - 1;
if ($saiba_mais_list->Recordset && !$saiba_mais_list->Recordset->EOF) {
	$saiba_mais_list->Recordset->moveFirst();
	$selectLimit = $saiba_mais_list->UseSelectLimit;
	if (!$selectLimit && $saiba_mais_list->StartRec > 1)
		$saiba_mais_list->Recordset->move($saiba_mais_list->StartRec - 1);
} elseif (!$saiba_mais->AllowAddDeleteRow && $saiba_mais_list->StopRec == 0) {
	$saiba_mais_list->StopRec = $saiba_mais->GridAddRowCount;
}

// Initialize aggregate
$saiba_mais->RowType = ROWTYPE_AGGREGATEINIT;
$saiba_mais->resetAttributes();
$saiba_mais_list->renderRow();
while ($saiba_mais_list->RecCnt < $saiba_mais_list->StopRec) {
	$saiba_mais_list->RecCnt++;
	if ($saiba_mais_list->RecCnt >= $saiba_mais_list->StartRec) {
		$saiba_mais_list->RowCnt++;

		// Set up key count
		$saiba_mais_list->KeyCount = $saiba_mais_list->RowIndex;

		// Init row class and style
		$saiba_mais->resetAttributes();
		$saiba_mais->CssClass = "";
		if ($saiba_mais->isGridAdd()) {
		} else {
			$saiba_mais_list->loadRowValues($saiba_mais_list->Recordset); // Load row values
		}
		$saiba_mais->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$saiba_mais->RowAttrs = array_merge($saiba_mais->RowAttrs, array('data-rowindex'=>$saiba_mais_list->RowCnt, 'id'=>'r' . $saiba_mais_list->RowCnt . '_saiba_mais', 'data-rowtype'=>$saiba_mais->RowType));

		// Render row
		$saiba_mais_list->renderRow();

		// Render list options
		$saiba_mais_list->renderListOptions();
?>
	<tr<?php echo $saiba_mais->rowAttributes() ?>>
<?php

// Render list options (body, left)
$saiba_mais_list->ListOptions->render("body", "left", $saiba_mais_list->RowCnt);
?>
	<?php if ($saiba_mais->id_saiba_mais->Visible) { // id_saiba_mais ?>
		<td data-name="id_saiba_mais"<?php echo $saiba_mais->id_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_list->RowCnt ?>_saiba_mais_id_saiba_mais" class="saiba_mais_id_saiba_mais">
<span<?php echo $saiba_mais->id_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->id_saiba_mais->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($saiba_mais->descricao_saiba_mais->Visible) { // descricao_saiba_mais ?>
		<td data-name="descricao_saiba_mais"<?php echo $saiba_mais->descricao_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_list->RowCnt ?>_saiba_mais_descricao_saiba_mais" class="saiba_mais_descricao_saiba_mais">
<span<?php echo $saiba_mais->descricao_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->descricao_saiba_mais->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($saiba_mais->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td data-name="pagina_principal_id"<?php echo $saiba_mais->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_list->RowCnt ?>_saiba_mais_pagina_principal_id" class="saiba_mais_pagina_principal_id">
<span<?php echo $saiba_mais->pagina_principal_id->viewAttributes() ?>>
<?php echo $saiba_mais->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($saiba_mais->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $saiba_mais->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_list->RowCnt ?>_saiba_mais_usuario_id" class="saiba_mais_usuario_id">
<span<?php echo $saiba_mais->usuario_id->viewAttributes() ?>>
<?php echo $saiba_mais->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($saiba_mais->data_atualizacao_saiba_mais->Visible) { // data_atualizacao_saiba_mais ?>
		<td data-name="data_atualizacao_saiba_mais"<?php echo $saiba_mais->data_atualizacao_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_list->RowCnt ?>_saiba_mais_data_atualizacao_saiba_mais" class="saiba_mais_data_atualizacao_saiba_mais">
<span<?php echo $saiba_mais->data_atualizacao_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->data_atualizacao_saiba_mais->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($saiba_mais->bool_ativo_saiba_mais->Visible) { // bool_ativo_saiba_mais ?>
		<td data-name="bool_ativo_saiba_mais"<?php echo $saiba_mais->bool_ativo_saiba_mais->cellAttributes() ?>>
<span id="el<?php echo $saiba_mais_list->RowCnt ?>_saiba_mais_bool_ativo_saiba_mais" class="saiba_mais_bool_ativo_saiba_mais">
<span<?php echo $saiba_mais->bool_ativo_saiba_mais->viewAttributes() ?>>
<?php echo $saiba_mais->bool_ativo_saiba_mais->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$saiba_mais_list->ListOptions->render("body", "right", $saiba_mais_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$saiba_mais->isGridAdd())
		$saiba_mais_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$saiba_mais->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($saiba_mais_list->Recordset)
	$saiba_mais_list->Recordset->Close();
?>
<?php if (!$saiba_mais->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$saiba_mais->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($saiba_mais_list->Pager)) $saiba_mais_list->Pager = new PrevNextPager($saiba_mais_list->StartRec, $saiba_mais_list->DisplayRecs, $saiba_mais_list->TotalRecs, $saiba_mais_list->AutoHidePager) ?>
<?php if ($saiba_mais_list->Pager->RecordCount > 0 && $saiba_mais_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($saiba_mais_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $saiba_mais_list->pageUrl() ?>start=<?php echo $saiba_mais_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($saiba_mais_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $saiba_mais_list->pageUrl() ?>start=<?php echo $saiba_mais_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $saiba_mais_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($saiba_mais_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $saiba_mais_list->pageUrl() ?>start=<?php echo $saiba_mais_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($saiba_mais_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $saiba_mais_list->pageUrl() ?>start=<?php echo $saiba_mais_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $saiba_mais_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($saiba_mais_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $saiba_mais_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $saiba_mais_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $saiba_mais_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($saiba_mais_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($saiba_mais_list->TotalRecs == 0 && !$saiba_mais->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($saiba_mais_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$saiba_mais_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$saiba_mais->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$saiba_mais_list->terminate();
?>
