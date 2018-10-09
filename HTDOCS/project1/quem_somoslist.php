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
$quem_somos_list = new quem_somos_list();

// Run the page
$quem_somos_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$quem_somos_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$quem_somos->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fquem_somoslist = currentForm = new ew.Form("fquem_somoslist", "list");
fquem_somoslist.formKeyCountName = '<?php echo $quem_somos_list->FormKeyCountName ?>';

// Form_CustomValidate event
fquem_somoslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fquem_somoslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fquem_somoslistsrch = currentSearchForm = new ew.Form("fquem_somoslistsrch");

// Filters
fquem_somoslistsrch.filterList = <?php echo $quem_somos_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$quem_somos->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($quem_somos_list->TotalRecs > 0 && $quem_somos_list->ExportOptions->visible()) { ?>
<?php $quem_somos_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($quem_somos_list->ImportOptions->visible()) { ?>
<?php $quem_somos_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($quem_somos_list->SearchOptions->visible()) { ?>
<?php $quem_somos_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($quem_somos_list->FilterOptions->visible()) { ?>
<?php $quem_somos_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$quem_somos_list->renderOtherOptions();
?>
<?php if (!$quem_somos->isExport() && !$quem_somos->CurrentAction) { ?>
<form name="fquem_somoslistsrch" id="fquem_somoslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($quem_somos_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fquem_somoslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="quem_somos">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($quem_somos_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($quem_somos_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $quem_somos_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($quem_somos_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($quem_somos_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($quem_somos_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($quem_somos_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $quem_somos_list->showPageHeader(); ?>
<?php
$quem_somos_list->showMessage();
?>
<?php if ($quem_somos_list->TotalRecs > 0 || $quem_somos->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($quem_somos_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> quem_somos">
<form name="fquem_somoslist" id="fquem_somoslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($quem_somos_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $quem_somos_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="quem_somos">
<div id="gmp_quem_somos" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($quem_somos_list->TotalRecs > 0 || $quem_somos->isGridEdit()) { ?>
<table id="tbl_quem_somoslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$quem_somos_list->RowType = ROWTYPE_HEADER;

// Render list options
$quem_somos_list->renderListOptions();

// Render list options (header, left)
$quem_somos_list->ListOptions->render("header", "left");
?>
<?php if ($quem_somos->id_quem_somos->Visible) { // id_quem_somos ?>
	<?php if ($quem_somos->sortUrl($quem_somos->id_quem_somos) == "") { ?>
		<th data-name="id_quem_somos" class="<?php echo $quem_somos->id_quem_somos->headerCellClass() ?>"><div id="elh_quem_somos_id_quem_somos" class="quem_somos_id_quem_somos"><div class="ew-table-header-caption"><?php echo $quem_somos->id_quem_somos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_quem_somos" class="<?php echo $quem_somos->id_quem_somos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $quem_somos->SortUrl($quem_somos->id_quem_somos) ?>',1);"><div id="elh_quem_somos_id_quem_somos" class="quem_somos_id_quem_somos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $quem_somos->id_quem_somos->caption() ?></span><span class="ew-table-header-sort"><?php if ($quem_somos->id_quem_somos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($quem_somos->id_quem_somos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($quem_somos->titulo_quem_somos->Visible) { // titulo_quem_somos ?>
	<?php if ($quem_somos->sortUrl($quem_somos->titulo_quem_somos) == "") { ?>
		<th data-name="titulo_quem_somos" class="<?php echo $quem_somos->titulo_quem_somos->headerCellClass() ?>"><div id="elh_quem_somos_titulo_quem_somos" class="quem_somos_titulo_quem_somos"><div class="ew-table-header-caption"><?php echo $quem_somos->titulo_quem_somos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_quem_somos" class="<?php echo $quem_somos->titulo_quem_somos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $quem_somos->SortUrl($quem_somos->titulo_quem_somos) ?>',1);"><div id="elh_quem_somos_titulo_quem_somos" class="quem_somos_titulo_quem_somos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $quem_somos->titulo_quem_somos->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($quem_somos->titulo_quem_somos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($quem_somos->titulo_quem_somos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($quem_somos->imagem_quem_somos->Visible) { // imagem_quem_somos ?>
	<?php if ($quem_somos->sortUrl($quem_somos->imagem_quem_somos) == "") { ?>
		<th data-name="imagem_quem_somos" class="<?php echo $quem_somos->imagem_quem_somos->headerCellClass() ?>"><div id="elh_quem_somos_imagem_quem_somos" class="quem_somos_imagem_quem_somos"><div class="ew-table-header-caption"><?php echo $quem_somos->imagem_quem_somos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_quem_somos" class="<?php echo $quem_somos->imagem_quem_somos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $quem_somos->SortUrl($quem_somos->imagem_quem_somos) ?>',1);"><div id="elh_quem_somos_imagem_quem_somos" class="quem_somos_imagem_quem_somos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $quem_somos->imagem_quem_somos->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($quem_somos->imagem_quem_somos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($quem_somos->imagem_quem_somos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($quem_somos->data_atualizacao_quem_somos->Visible) { // data_atualizacao_quem_somos ?>
	<?php if ($quem_somos->sortUrl($quem_somos->data_atualizacao_quem_somos) == "") { ?>
		<th data-name="data_atualizacao_quem_somos" class="<?php echo $quem_somos->data_atualizacao_quem_somos->headerCellClass() ?>"><div id="elh_quem_somos_data_atualizacao_quem_somos" class="quem_somos_data_atualizacao_quem_somos"><div class="ew-table-header-caption"><?php echo $quem_somos->data_atualizacao_quem_somos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_quem_somos" class="<?php echo $quem_somos->data_atualizacao_quem_somos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $quem_somos->SortUrl($quem_somos->data_atualizacao_quem_somos) ?>',1);"><div id="elh_quem_somos_data_atualizacao_quem_somos" class="quem_somos_data_atualizacao_quem_somos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $quem_somos->data_atualizacao_quem_somos->caption() ?></span><span class="ew-table-header-sort"><?php if ($quem_somos->data_atualizacao_quem_somos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($quem_somos->data_atualizacao_quem_somos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($quem_somos->usuario_id->Visible) { // usuario_id ?>
	<?php if ($quem_somos->sortUrl($quem_somos->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $quem_somos->usuario_id->headerCellClass() ?>"><div id="elh_quem_somos_usuario_id" class="quem_somos_usuario_id"><div class="ew-table-header-caption"><?php echo $quem_somos->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $quem_somos->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $quem_somos->SortUrl($quem_somos->usuario_id) ?>',1);"><div id="elh_quem_somos_usuario_id" class="quem_somos_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $quem_somos->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($quem_somos->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($quem_somos->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($quem_somos->bool_ativo_quem_somos->Visible) { // bool_ativo_quem_somos ?>
	<?php if ($quem_somos->sortUrl($quem_somos->bool_ativo_quem_somos) == "") { ?>
		<th data-name="bool_ativo_quem_somos" class="<?php echo $quem_somos->bool_ativo_quem_somos->headerCellClass() ?>"><div id="elh_quem_somos_bool_ativo_quem_somos" class="quem_somos_bool_ativo_quem_somos"><div class="ew-table-header-caption"><?php echo $quem_somos->bool_ativo_quem_somos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_quem_somos" class="<?php echo $quem_somos->bool_ativo_quem_somos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $quem_somos->SortUrl($quem_somos->bool_ativo_quem_somos) ?>',1);"><div id="elh_quem_somos_bool_ativo_quem_somos" class="quem_somos_bool_ativo_quem_somos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $quem_somos->bool_ativo_quem_somos->caption() ?></span><span class="ew-table-header-sort"><?php if ($quem_somos->bool_ativo_quem_somos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($quem_somos->bool_ativo_quem_somos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$quem_somos_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($quem_somos->ExportAll && $quem_somos->isExport()) {
	$quem_somos_list->StopRec = $quem_somos_list->TotalRecs;
} else {

	// Set the last record to display
	if ($quem_somos_list->TotalRecs > $quem_somos_list->StartRec + $quem_somos_list->DisplayRecs - 1)
		$quem_somos_list->StopRec = $quem_somos_list->StartRec + $quem_somos_list->DisplayRecs - 1;
	else
		$quem_somos_list->StopRec = $quem_somos_list->TotalRecs;
}
$quem_somos_list->RecCnt = $quem_somos_list->StartRec - 1;
if ($quem_somos_list->Recordset && !$quem_somos_list->Recordset->EOF) {
	$quem_somos_list->Recordset->moveFirst();
	$selectLimit = $quem_somos_list->UseSelectLimit;
	if (!$selectLimit && $quem_somos_list->StartRec > 1)
		$quem_somos_list->Recordset->move($quem_somos_list->StartRec - 1);
} elseif (!$quem_somos->AllowAddDeleteRow && $quem_somos_list->StopRec == 0) {
	$quem_somos_list->StopRec = $quem_somos->GridAddRowCount;
}

// Initialize aggregate
$quem_somos->RowType = ROWTYPE_AGGREGATEINIT;
$quem_somos->resetAttributes();
$quem_somos_list->renderRow();
while ($quem_somos_list->RecCnt < $quem_somos_list->StopRec) {
	$quem_somos_list->RecCnt++;
	if ($quem_somos_list->RecCnt >= $quem_somos_list->StartRec) {
		$quem_somos_list->RowCnt++;

		// Set up key count
		$quem_somos_list->KeyCount = $quem_somos_list->RowIndex;

		// Init row class and style
		$quem_somos->resetAttributes();
		$quem_somos->CssClass = "";
		if ($quem_somos->isGridAdd()) {
		} else {
			$quem_somos_list->loadRowValues($quem_somos_list->Recordset); // Load row values
		}
		$quem_somos->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$quem_somos->RowAttrs = array_merge($quem_somos->RowAttrs, array('data-rowindex'=>$quem_somos_list->RowCnt, 'id'=>'r' . $quem_somos_list->RowCnt . '_quem_somos', 'data-rowtype'=>$quem_somos->RowType));

		// Render row
		$quem_somos_list->renderRow();

		// Render list options
		$quem_somos_list->renderListOptions();
?>
	<tr<?php echo $quem_somos->rowAttributes() ?>>
<?php

// Render list options (body, left)
$quem_somos_list->ListOptions->render("body", "left", $quem_somos_list->RowCnt);
?>
	<?php if ($quem_somos->id_quem_somos->Visible) { // id_quem_somos ?>
		<td data-name="id_quem_somos"<?php echo $quem_somos->id_quem_somos->cellAttributes() ?>>
<span id="el<?php echo $quem_somos_list->RowCnt ?>_quem_somos_id_quem_somos" class="quem_somos_id_quem_somos">
<span<?php echo $quem_somos->id_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->id_quem_somos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($quem_somos->titulo_quem_somos->Visible) { // titulo_quem_somos ?>
		<td data-name="titulo_quem_somos"<?php echo $quem_somos->titulo_quem_somos->cellAttributes() ?>>
<span id="el<?php echo $quem_somos_list->RowCnt ?>_quem_somos_titulo_quem_somos" class="quem_somos_titulo_quem_somos">
<span<?php echo $quem_somos->titulo_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->titulo_quem_somos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($quem_somos->imagem_quem_somos->Visible) { // imagem_quem_somos ?>
		<td data-name="imagem_quem_somos"<?php echo $quem_somos->imagem_quem_somos->cellAttributes() ?>>
<span id="el<?php echo $quem_somos_list->RowCnt ?>_quem_somos_imagem_quem_somos" class="quem_somos_imagem_quem_somos">
<span<?php echo $quem_somos->imagem_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->imagem_quem_somos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($quem_somos->data_atualizacao_quem_somos->Visible) { // data_atualizacao_quem_somos ?>
		<td data-name="data_atualizacao_quem_somos"<?php echo $quem_somos->data_atualizacao_quem_somos->cellAttributes() ?>>
<span id="el<?php echo $quem_somos_list->RowCnt ?>_quem_somos_data_atualizacao_quem_somos" class="quem_somos_data_atualizacao_quem_somos">
<span<?php echo $quem_somos->data_atualizacao_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->data_atualizacao_quem_somos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($quem_somos->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $quem_somos->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $quem_somos_list->RowCnt ?>_quem_somos_usuario_id" class="quem_somos_usuario_id">
<span<?php echo $quem_somos->usuario_id->viewAttributes() ?>>
<?php echo $quem_somos->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($quem_somos->bool_ativo_quem_somos->Visible) { // bool_ativo_quem_somos ?>
		<td data-name="bool_ativo_quem_somos"<?php echo $quem_somos->bool_ativo_quem_somos->cellAttributes() ?>>
<span id="el<?php echo $quem_somos_list->RowCnt ?>_quem_somos_bool_ativo_quem_somos" class="quem_somos_bool_ativo_quem_somos">
<span<?php echo $quem_somos->bool_ativo_quem_somos->viewAttributes() ?>>
<?php echo $quem_somos->bool_ativo_quem_somos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$quem_somos_list->ListOptions->render("body", "right", $quem_somos_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$quem_somos->isGridAdd())
		$quem_somos_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$quem_somos->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($quem_somos_list->Recordset)
	$quem_somos_list->Recordset->Close();
?>
<?php if (!$quem_somos->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$quem_somos->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($quem_somos_list->Pager)) $quem_somos_list->Pager = new PrevNextPager($quem_somos_list->StartRec, $quem_somos_list->DisplayRecs, $quem_somos_list->TotalRecs, $quem_somos_list->AutoHidePager) ?>
<?php if ($quem_somos_list->Pager->RecordCount > 0 && $quem_somos_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($quem_somos_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $quem_somos_list->pageUrl() ?>start=<?php echo $quem_somos_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($quem_somos_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $quem_somos_list->pageUrl() ?>start=<?php echo $quem_somos_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $quem_somos_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($quem_somos_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $quem_somos_list->pageUrl() ?>start=<?php echo $quem_somos_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($quem_somos_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $quem_somos_list->pageUrl() ?>start=<?php echo $quem_somos_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $quem_somos_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($quem_somos_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $quem_somos_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $quem_somos_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $quem_somos_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($quem_somos_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($quem_somos_list->TotalRecs == 0 && !$quem_somos->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($quem_somos_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$quem_somos_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$quem_somos->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$quem_somos_list->terminate();
?>
