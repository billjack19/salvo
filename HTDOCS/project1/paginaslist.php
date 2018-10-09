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
$paginas_list = new paginas_list();

// Run the page
$paginas_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$paginas_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$paginas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpaginaslist = currentForm = new ew.Form("fpaginaslist", "list");
fpaginaslist.formKeyCountName = '<?php echo $paginas_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpaginaslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpaginaslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpaginaslistsrch = currentSearchForm = new ew.Form("fpaginaslistsrch");

// Filters
fpaginaslistsrch.filterList = <?php echo $paginas_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$paginas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($paginas_list->TotalRecs > 0 && $paginas_list->ExportOptions->visible()) { ?>
<?php $paginas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($paginas_list->ImportOptions->visible()) { ?>
<?php $paginas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($paginas_list->SearchOptions->visible()) { ?>
<?php $paginas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($paginas_list->FilterOptions->visible()) { ?>
<?php $paginas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$paginas_list->renderOtherOptions();
?>
<?php if (!$paginas->isExport() && !$paginas->CurrentAction) { ?>
<form name="fpaginaslistsrch" id="fpaginaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($paginas_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpaginaslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="paginas">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($paginas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($paginas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $paginas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($paginas_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($paginas_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($paginas_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($paginas_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $paginas_list->showPageHeader(); ?>
<?php
$paginas_list->showMessage();
?>
<?php if ($paginas_list->TotalRecs > 0 || $paginas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($paginas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> paginas">
<form name="fpaginaslist" id="fpaginaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($paginas_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $paginas_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="paginas">
<div id="gmp_paginas" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($paginas_list->TotalRecs > 0 || $paginas->isGridEdit()) { ?>
<table id="tbl_paginaslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$paginas_list->RowType = ROWTYPE_HEADER;

// Render list options
$paginas_list->renderListOptions();

// Render list options (header, left)
$paginas_list->ListOptions->render("header", "left");
?>
<?php if ($paginas->id_paginas->Visible) { // id_paginas ?>
	<?php if ($paginas->sortUrl($paginas->id_paginas) == "") { ?>
		<th data-name="id_paginas" class="<?php echo $paginas->id_paginas->headerCellClass() ?>"><div id="elh_paginas_id_paginas" class="paginas_id_paginas"><div class="ew-table-header-caption"><?php echo $paginas->id_paginas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_paginas" class="<?php echo $paginas->id_paginas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->id_paginas) ?>',1);"><div id="elh_paginas_id_paginas" class="paginas_id_paginas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->id_paginas->caption() ?></span><span class="ew-table-header-sort"><?php if ($paginas->id_paginas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->id_paginas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($paginas->numero_da_pagina_paginas->Visible) { // numero_da_pagina_paginas ?>
	<?php if ($paginas->sortUrl($paginas->numero_da_pagina_paginas) == "") { ?>
		<th data-name="numero_da_pagina_paginas" class="<?php echo $paginas->numero_da_pagina_paginas->headerCellClass() ?>"><div id="elh_paginas_numero_da_pagina_paginas" class="paginas_numero_da_pagina_paginas"><div class="ew-table-header-caption"><?php echo $paginas->numero_da_pagina_paginas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="numero_da_pagina_paginas" class="<?php echo $paginas->numero_da_pagina_paginas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->numero_da_pagina_paginas) ?>',1);"><div id="elh_paginas_numero_da_pagina_paginas" class="paginas_numero_da_pagina_paginas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->numero_da_pagina_paginas->caption() ?></span><span class="ew-table-header-sort"><?php if ($paginas->numero_da_pagina_paginas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->numero_da_pagina_paginas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($paginas->imagem_paginas->Visible) { // imagem_paginas ?>
	<?php if ($paginas->sortUrl($paginas->imagem_paginas) == "") { ?>
		<th data-name="imagem_paginas" class="<?php echo $paginas->imagem_paginas->headerCellClass() ?>"><div id="elh_paginas_imagem_paginas" class="paginas_imagem_paginas"><div class="ew-table-header-caption"><?php echo $paginas->imagem_paginas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_paginas" class="<?php echo $paginas->imagem_paginas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->imagem_paginas) ?>',1);"><div id="elh_paginas_imagem_paginas" class="paginas_imagem_paginas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->imagem_paginas->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($paginas->imagem_paginas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->imagem_paginas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($paginas->imagem_miniatura_paginas->Visible) { // imagem_miniatura_paginas ?>
	<?php if ($paginas->sortUrl($paginas->imagem_miniatura_paginas) == "") { ?>
		<th data-name="imagem_miniatura_paginas" class="<?php echo $paginas->imagem_miniatura_paginas->headerCellClass() ?>"><div id="elh_paginas_imagem_miniatura_paginas" class="paginas_imagem_miniatura_paginas"><div class="ew-table-header-caption"><?php echo $paginas->imagem_miniatura_paginas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_miniatura_paginas" class="<?php echo $paginas->imagem_miniatura_paginas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->imagem_miniatura_paginas) ?>',1);"><div id="elh_paginas_imagem_miniatura_paginas" class="paginas_imagem_miniatura_paginas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->imagem_miniatura_paginas->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($paginas->imagem_miniatura_paginas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->imagem_miniatura_paginas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($paginas->new_sjt_id->Visible) { // new_sjt_id ?>
	<?php if ($paginas->sortUrl($paginas->new_sjt_id) == "") { ?>
		<th data-name="new_sjt_id" class="<?php echo $paginas->new_sjt_id->headerCellClass() ?>"><div id="elh_paginas_new_sjt_id" class="paginas_new_sjt_id"><div class="ew-table-header-caption"><?php echo $paginas->new_sjt_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="new_sjt_id" class="<?php echo $paginas->new_sjt_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->new_sjt_id) ?>',1);"><div id="elh_paginas_new_sjt_id" class="paginas_new_sjt_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->new_sjt_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($paginas->new_sjt_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->new_sjt_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($paginas->data_atualizacao_paginas->Visible) { // data_atualizacao_paginas ?>
	<?php if ($paginas->sortUrl($paginas->data_atualizacao_paginas) == "") { ?>
		<th data-name="data_atualizacao_paginas" class="<?php echo $paginas->data_atualizacao_paginas->headerCellClass() ?>"><div id="elh_paginas_data_atualizacao_paginas" class="paginas_data_atualizacao_paginas"><div class="ew-table-header-caption"><?php echo $paginas->data_atualizacao_paginas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_paginas" class="<?php echo $paginas->data_atualizacao_paginas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->data_atualizacao_paginas) ?>',1);"><div id="elh_paginas_data_atualizacao_paginas" class="paginas_data_atualizacao_paginas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->data_atualizacao_paginas->caption() ?></span><span class="ew-table-header-sort"><?php if ($paginas->data_atualizacao_paginas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->data_atualizacao_paginas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($paginas->usuario_id->Visible) { // usuario_id ?>
	<?php if ($paginas->sortUrl($paginas->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $paginas->usuario_id->headerCellClass() ?>"><div id="elh_paginas_usuario_id" class="paginas_usuario_id"><div class="ew-table-header-caption"><?php echo $paginas->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $paginas->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->usuario_id) ?>',1);"><div id="elh_paginas_usuario_id" class="paginas_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($paginas->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($paginas->bool_ativo_paginas->Visible) { // bool_ativo_paginas ?>
	<?php if ($paginas->sortUrl($paginas->bool_ativo_paginas) == "") { ?>
		<th data-name="bool_ativo_paginas" class="<?php echo $paginas->bool_ativo_paginas->headerCellClass() ?>"><div id="elh_paginas_bool_ativo_paginas" class="paginas_bool_ativo_paginas"><div class="ew-table-header-caption"><?php echo $paginas->bool_ativo_paginas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_paginas" class="<?php echo $paginas->bool_ativo_paginas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $paginas->SortUrl($paginas->bool_ativo_paginas) ?>',1);"><div id="elh_paginas_bool_ativo_paginas" class="paginas_bool_ativo_paginas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $paginas->bool_ativo_paginas->caption() ?></span><span class="ew-table-header-sort"><?php if ($paginas->bool_ativo_paginas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($paginas->bool_ativo_paginas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$paginas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($paginas->ExportAll && $paginas->isExport()) {
	$paginas_list->StopRec = $paginas_list->TotalRecs;
} else {

	// Set the last record to display
	if ($paginas_list->TotalRecs > $paginas_list->StartRec + $paginas_list->DisplayRecs - 1)
		$paginas_list->StopRec = $paginas_list->StartRec + $paginas_list->DisplayRecs - 1;
	else
		$paginas_list->StopRec = $paginas_list->TotalRecs;
}
$paginas_list->RecCnt = $paginas_list->StartRec - 1;
if ($paginas_list->Recordset && !$paginas_list->Recordset->EOF) {
	$paginas_list->Recordset->moveFirst();
	$selectLimit = $paginas_list->UseSelectLimit;
	if (!$selectLimit && $paginas_list->StartRec > 1)
		$paginas_list->Recordset->move($paginas_list->StartRec - 1);
} elseif (!$paginas->AllowAddDeleteRow && $paginas_list->StopRec == 0) {
	$paginas_list->StopRec = $paginas->GridAddRowCount;
}

// Initialize aggregate
$paginas->RowType = ROWTYPE_AGGREGATEINIT;
$paginas->resetAttributes();
$paginas_list->renderRow();
while ($paginas_list->RecCnt < $paginas_list->StopRec) {
	$paginas_list->RecCnt++;
	if ($paginas_list->RecCnt >= $paginas_list->StartRec) {
		$paginas_list->RowCnt++;

		// Set up key count
		$paginas_list->KeyCount = $paginas_list->RowIndex;

		// Init row class and style
		$paginas->resetAttributes();
		$paginas->CssClass = "";
		if ($paginas->isGridAdd()) {
		} else {
			$paginas_list->loadRowValues($paginas_list->Recordset); // Load row values
		}
		$paginas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$paginas->RowAttrs = array_merge($paginas->RowAttrs, array('data-rowindex'=>$paginas_list->RowCnt, 'id'=>'r' . $paginas_list->RowCnt . '_paginas', 'data-rowtype'=>$paginas->RowType));

		// Render row
		$paginas_list->renderRow();

		// Render list options
		$paginas_list->renderListOptions();
?>
	<tr<?php echo $paginas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$paginas_list->ListOptions->render("body", "left", $paginas_list->RowCnt);
?>
	<?php if ($paginas->id_paginas->Visible) { // id_paginas ?>
		<td data-name="id_paginas"<?php echo $paginas->id_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_id_paginas" class="paginas_id_paginas">
<span<?php echo $paginas->id_paginas->viewAttributes() ?>>
<?php echo $paginas->id_paginas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($paginas->numero_da_pagina_paginas->Visible) { // numero_da_pagina_paginas ?>
		<td data-name="numero_da_pagina_paginas"<?php echo $paginas->numero_da_pagina_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_numero_da_pagina_paginas" class="paginas_numero_da_pagina_paginas">
<span<?php echo $paginas->numero_da_pagina_paginas->viewAttributes() ?>>
<?php echo $paginas->numero_da_pagina_paginas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($paginas->imagem_paginas->Visible) { // imagem_paginas ?>
		<td data-name="imagem_paginas"<?php echo $paginas->imagem_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_imagem_paginas" class="paginas_imagem_paginas">
<span<?php echo $paginas->imagem_paginas->viewAttributes() ?>>
<?php echo $paginas->imagem_paginas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($paginas->imagem_miniatura_paginas->Visible) { // imagem_miniatura_paginas ?>
		<td data-name="imagem_miniatura_paginas"<?php echo $paginas->imagem_miniatura_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_imagem_miniatura_paginas" class="paginas_imagem_miniatura_paginas">
<span<?php echo $paginas->imagem_miniatura_paginas->viewAttributes() ?>>
<?php echo $paginas->imagem_miniatura_paginas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($paginas->new_sjt_id->Visible) { // new_sjt_id ?>
		<td data-name="new_sjt_id"<?php echo $paginas->new_sjt_id->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_new_sjt_id" class="paginas_new_sjt_id">
<span<?php echo $paginas->new_sjt_id->viewAttributes() ?>>
<?php echo $paginas->new_sjt_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($paginas->data_atualizacao_paginas->Visible) { // data_atualizacao_paginas ?>
		<td data-name="data_atualizacao_paginas"<?php echo $paginas->data_atualizacao_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_data_atualizacao_paginas" class="paginas_data_atualizacao_paginas">
<span<?php echo $paginas->data_atualizacao_paginas->viewAttributes() ?>>
<?php echo $paginas->data_atualizacao_paginas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($paginas->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $paginas->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_usuario_id" class="paginas_usuario_id">
<span<?php echo $paginas->usuario_id->viewAttributes() ?>>
<?php echo $paginas->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($paginas->bool_ativo_paginas->Visible) { // bool_ativo_paginas ?>
		<td data-name="bool_ativo_paginas"<?php echo $paginas->bool_ativo_paginas->cellAttributes() ?>>
<span id="el<?php echo $paginas_list->RowCnt ?>_paginas_bool_ativo_paginas" class="paginas_bool_ativo_paginas">
<span<?php echo $paginas->bool_ativo_paginas->viewAttributes() ?>>
<?php echo $paginas->bool_ativo_paginas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$paginas_list->ListOptions->render("body", "right", $paginas_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$paginas->isGridAdd())
		$paginas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$paginas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($paginas_list->Recordset)
	$paginas_list->Recordset->Close();
?>
<?php if (!$paginas->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$paginas->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($paginas_list->Pager)) $paginas_list->Pager = new PrevNextPager($paginas_list->StartRec, $paginas_list->DisplayRecs, $paginas_list->TotalRecs, $paginas_list->AutoHidePager) ?>
<?php if ($paginas_list->Pager->RecordCount > 0 && $paginas_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($paginas_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $paginas_list->pageUrl() ?>start=<?php echo $paginas_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($paginas_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $paginas_list->pageUrl() ?>start=<?php echo $paginas_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $paginas_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($paginas_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $paginas_list->pageUrl() ?>start=<?php echo $paginas_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($paginas_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $paginas_list->pageUrl() ?>start=<?php echo $paginas_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $paginas_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($paginas_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $paginas_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $paginas_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $paginas_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($paginas_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($paginas_list->TotalRecs == 0 && !$paginas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($paginas_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$paginas_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$paginas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$paginas_list->terminate();
?>
