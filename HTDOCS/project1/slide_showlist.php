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
$slide_show_list = new slide_show_list();

// Run the page
$slide_show_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$slide_show_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$slide_show->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fslide_showlist = currentForm = new ew.Form("fslide_showlist", "list");
fslide_showlist.formKeyCountName = '<?php echo $slide_show_list->FormKeyCountName ?>';

// Form_CustomValidate event
fslide_showlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fslide_showlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fslide_showlistsrch = currentSearchForm = new ew.Form("fslide_showlistsrch");

// Filters
fslide_showlistsrch.filterList = <?php echo $slide_show_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$slide_show->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($slide_show_list->TotalRecs > 0 && $slide_show_list->ExportOptions->visible()) { ?>
<?php $slide_show_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($slide_show_list->ImportOptions->visible()) { ?>
<?php $slide_show_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($slide_show_list->SearchOptions->visible()) { ?>
<?php $slide_show_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($slide_show_list->FilterOptions->visible()) { ?>
<?php $slide_show_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$slide_show_list->renderOtherOptions();
?>
<?php if (!$slide_show->isExport() && !$slide_show->CurrentAction) { ?>
<form name="fslide_showlistsrch" id="fslide_showlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($slide_show_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fslide_showlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="slide_show">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($slide_show_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($slide_show_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $slide_show_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($slide_show_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($slide_show_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($slide_show_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($slide_show_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $slide_show_list->showPageHeader(); ?>
<?php
$slide_show_list->showMessage();
?>
<?php if ($slide_show_list->TotalRecs > 0 || $slide_show->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($slide_show_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> slide_show">
<form name="fslide_showlist" id="fslide_showlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($slide_show_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $slide_show_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="slide_show">
<div id="gmp_slide_show" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($slide_show_list->TotalRecs > 0 || $slide_show->isGridEdit()) { ?>
<table id="tbl_slide_showlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$slide_show_list->RowType = ROWTYPE_HEADER;

// Render list options
$slide_show_list->renderListOptions();

// Render list options (header, left)
$slide_show_list->ListOptions->render("header", "left");
?>
<?php if ($slide_show->id_slide_show->Visible) { // id_slide_show ?>
	<?php if ($slide_show->sortUrl($slide_show->id_slide_show) == "") { ?>
		<th data-name="id_slide_show" class="<?php echo $slide_show->id_slide_show->headerCellClass() ?>"><div id="elh_slide_show_id_slide_show" class="slide_show_id_slide_show"><div class="ew-table-header-caption"><?php echo $slide_show->id_slide_show->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_slide_show" class="<?php echo $slide_show->id_slide_show->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->id_slide_show) ?>',1);"><div id="elh_slide_show_id_slide_show" class="slide_show_id_slide_show">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->id_slide_show->caption() ?></span><span class="ew-table-header-sort"><?php if ($slide_show->id_slide_show->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->id_slide_show->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->titulo_slide_show->Visible) { // titulo_slide_show ?>
	<?php if ($slide_show->sortUrl($slide_show->titulo_slide_show) == "") { ?>
		<th data-name="titulo_slide_show" class="<?php echo $slide_show->titulo_slide_show->headerCellClass() ?>"><div id="elh_slide_show_titulo_slide_show" class="slide_show_titulo_slide_show"><div class="ew-table-header-caption"><?php echo $slide_show->titulo_slide_show->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_slide_show" class="<?php echo $slide_show->titulo_slide_show->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->titulo_slide_show) ?>',1);"><div id="elh_slide_show_titulo_slide_show" class="slide_show_titulo_slide_show">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->titulo_slide_show->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($slide_show->titulo_slide_show->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->titulo_slide_show->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->descricao_slide_show->Visible) { // descricao_slide_show ?>
	<?php if ($slide_show->sortUrl($slide_show->descricao_slide_show) == "") { ?>
		<th data-name="descricao_slide_show" class="<?php echo $slide_show->descricao_slide_show->headerCellClass() ?>"><div id="elh_slide_show_descricao_slide_show" class="slide_show_descricao_slide_show"><div class="ew-table-header-caption"><?php echo $slide_show->descricao_slide_show->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_slide_show" class="<?php echo $slide_show->descricao_slide_show->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->descricao_slide_show) ?>',1);"><div id="elh_slide_show_descricao_slide_show" class="slide_show_descricao_slide_show">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->descricao_slide_show->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($slide_show->descricao_slide_show->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->descricao_slide_show->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->imagem_slide_show->Visible) { // imagem_slide_show ?>
	<?php if ($slide_show->sortUrl($slide_show->imagem_slide_show) == "") { ?>
		<th data-name="imagem_slide_show" class="<?php echo $slide_show->imagem_slide_show->headerCellClass() ?>"><div id="elh_slide_show_imagem_slide_show" class="slide_show_imagem_slide_show"><div class="ew-table-header-caption"><?php echo $slide_show->imagem_slide_show->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_slide_show" class="<?php echo $slide_show->imagem_slide_show->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->imagem_slide_show) ?>',1);"><div id="elh_slide_show_imagem_slide_show" class="slide_show_imagem_slide_show">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->imagem_slide_show->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($slide_show->imagem_slide_show->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->imagem_slide_show->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->item_id->Visible) { // item_id ?>
	<?php if ($slide_show->sortUrl($slide_show->item_id) == "") { ?>
		<th data-name="item_id" class="<?php echo $slide_show->item_id->headerCellClass() ?>"><div id="elh_slide_show_item_id" class="slide_show_item_id"><div class="ew-table-header-caption"><?php echo $slide_show->item_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="item_id" class="<?php echo $slide_show->item_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->item_id) ?>',1);"><div id="elh_slide_show_item_id" class="slide_show_item_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->item_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($slide_show->item_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->item_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<?php if ($slide_show->sortUrl($slide_show->pagina_principal_id) == "") { ?>
		<th data-name="pagina_principal_id" class="<?php echo $slide_show->pagina_principal_id->headerCellClass() ?>"><div id="elh_slide_show_pagina_principal_id" class="slide_show_pagina_principal_id"><div class="ew-table-header-caption"><?php echo $slide_show->pagina_principal_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pagina_principal_id" class="<?php echo $slide_show->pagina_principal_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->pagina_principal_id) ?>',1);"><div id="elh_slide_show_pagina_principal_id" class="slide_show_pagina_principal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->pagina_principal_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($slide_show->pagina_principal_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->pagina_principal_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->data_atualizacao_slide_show->Visible) { // data_atualizacao_slide_show ?>
	<?php if ($slide_show->sortUrl($slide_show->data_atualizacao_slide_show) == "") { ?>
		<th data-name="data_atualizacao_slide_show" class="<?php echo $slide_show->data_atualizacao_slide_show->headerCellClass() ?>"><div id="elh_slide_show_data_atualizacao_slide_show" class="slide_show_data_atualizacao_slide_show"><div class="ew-table-header-caption"><?php echo $slide_show->data_atualizacao_slide_show->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_slide_show" class="<?php echo $slide_show->data_atualizacao_slide_show->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->data_atualizacao_slide_show) ?>',1);"><div id="elh_slide_show_data_atualizacao_slide_show" class="slide_show_data_atualizacao_slide_show">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->data_atualizacao_slide_show->caption() ?></span><span class="ew-table-header-sort"><?php if ($slide_show->data_atualizacao_slide_show->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->data_atualizacao_slide_show->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->usuario_id->Visible) { // usuario_id ?>
	<?php if ($slide_show->sortUrl($slide_show->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $slide_show->usuario_id->headerCellClass() ?>"><div id="elh_slide_show_usuario_id" class="slide_show_usuario_id"><div class="ew-table-header-caption"><?php echo $slide_show->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $slide_show->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->usuario_id) ?>',1);"><div id="elh_slide_show_usuario_id" class="slide_show_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($slide_show->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($slide_show->bool_ativo_slide_show->Visible) { // bool_ativo_slide_show ?>
	<?php if ($slide_show->sortUrl($slide_show->bool_ativo_slide_show) == "") { ?>
		<th data-name="bool_ativo_slide_show" class="<?php echo $slide_show->bool_ativo_slide_show->headerCellClass() ?>"><div id="elh_slide_show_bool_ativo_slide_show" class="slide_show_bool_ativo_slide_show"><div class="ew-table-header-caption"><?php echo $slide_show->bool_ativo_slide_show->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_slide_show" class="<?php echo $slide_show->bool_ativo_slide_show->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $slide_show->SortUrl($slide_show->bool_ativo_slide_show) ?>',1);"><div id="elh_slide_show_bool_ativo_slide_show" class="slide_show_bool_ativo_slide_show">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $slide_show->bool_ativo_slide_show->caption() ?></span><span class="ew-table-header-sort"><?php if ($slide_show->bool_ativo_slide_show->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($slide_show->bool_ativo_slide_show->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$slide_show_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($slide_show->ExportAll && $slide_show->isExport()) {
	$slide_show_list->StopRec = $slide_show_list->TotalRecs;
} else {

	// Set the last record to display
	if ($slide_show_list->TotalRecs > $slide_show_list->StartRec + $slide_show_list->DisplayRecs - 1)
		$slide_show_list->StopRec = $slide_show_list->StartRec + $slide_show_list->DisplayRecs - 1;
	else
		$slide_show_list->StopRec = $slide_show_list->TotalRecs;
}
$slide_show_list->RecCnt = $slide_show_list->StartRec - 1;
if ($slide_show_list->Recordset && !$slide_show_list->Recordset->EOF) {
	$slide_show_list->Recordset->moveFirst();
	$selectLimit = $slide_show_list->UseSelectLimit;
	if (!$selectLimit && $slide_show_list->StartRec > 1)
		$slide_show_list->Recordset->move($slide_show_list->StartRec - 1);
} elseif (!$slide_show->AllowAddDeleteRow && $slide_show_list->StopRec == 0) {
	$slide_show_list->StopRec = $slide_show->GridAddRowCount;
}

// Initialize aggregate
$slide_show->RowType = ROWTYPE_AGGREGATEINIT;
$slide_show->resetAttributes();
$slide_show_list->renderRow();
while ($slide_show_list->RecCnt < $slide_show_list->StopRec) {
	$slide_show_list->RecCnt++;
	if ($slide_show_list->RecCnt >= $slide_show_list->StartRec) {
		$slide_show_list->RowCnt++;

		// Set up key count
		$slide_show_list->KeyCount = $slide_show_list->RowIndex;

		// Init row class and style
		$slide_show->resetAttributes();
		$slide_show->CssClass = "";
		if ($slide_show->isGridAdd()) {
		} else {
			$slide_show_list->loadRowValues($slide_show_list->Recordset); // Load row values
		}
		$slide_show->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$slide_show->RowAttrs = array_merge($slide_show->RowAttrs, array('data-rowindex'=>$slide_show_list->RowCnt, 'id'=>'r' . $slide_show_list->RowCnt . '_slide_show', 'data-rowtype'=>$slide_show->RowType));

		// Render row
		$slide_show_list->renderRow();

		// Render list options
		$slide_show_list->renderListOptions();
?>
	<tr<?php echo $slide_show->rowAttributes() ?>>
<?php

// Render list options (body, left)
$slide_show_list->ListOptions->render("body", "left", $slide_show_list->RowCnt);
?>
	<?php if ($slide_show->id_slide_show->Visible) { // id_slide_show ?>
		<td data-name="id_slide_show"<?php echo $slide_show->id_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_id_slide_show" class="slide_show_id_slide_show">
<span<?php echo $slide_show->id_slide_show->viewAttributes() ?>>
<?php echo $slide_show->id_slide_show->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->titulo_slide_show->Visible) { // titulo_slide_show ?>
		<td data-name="titulo_slide_show"<?php echo $slide_show->titulo_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_titulo_slide_show" class="slide_show_titulo_slide_show">
<span<?php echo $slide_show->titulo_slide_show->viewAttributes() ?>>
<?php echo $slide_show->titulo_slide_show->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->descricao_slide_show->Visible) { // descricao_slide_show ?>
		<td data-name="descricao_slide_show"<?php echo $slide_show->descricao_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_descricao_slide_show" class="slide_show_descricao_slide_show">
<span<?php echo $slide_show->descricao_slide_show->viewAttributes() ?>>
<?php echo $slide_show->descricao_slide_show->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->imagem_slide_show->Visible) { // imagem_slide_show ?>
		<td data-name="imagem_slide_show"<?php echo $slide_show->imagem_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_imagem_slide_show" class="slide_show_imagem_slide_show">
<span<?php echo $slide_show->imagem_slide_show->viewAttributes() ?>>
<?php echo $slide_show->imagem_slide_show->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->item_id->Visible) { // item_id ?>
		<td data-name="item_id"<?php echo $slide_show->item_id->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_item_id" class="slide_show_item_id">
<span<?php echo $slide_show->item_id->viewAttributes() ?>>
<?php echo $slide_show->item_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td data-name="pagina_principal_id"<?php echo $slide_show->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_pagina_principal_id" class="slide_show_pagina_principal_id">
<span<?php echo $slide_show->pagina_principal_id->viewAttributes() ?>>
<?php echo $slide_show->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->data_atualizacao_slide_show->Visible) { // data_atualizacao_slide_show ?>
		<td data-name="data_atualizacao_slide_show"<?php echo $slide_show->data_atualizacao_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_data_atualizacao_slide_show" class="slide_show_data_atualizacao_slide_show">
<span<?php echo $slide_show->data_atualizacao_slide_show->viewAttributes() ?>>
<?php echo $slide_show->data_atualizacao_slide_show->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $slide_show->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_usuario_id" class="slide_show_usuario_id">
<span<?php echo $slide_show->usuario_id->viewAttributes() ?>>
<?php echo $slide_show->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($slide_show->bool_ativo_slide_show->Visible) { // bool_ativo_slide_show ?>
		<td data-name="bool_ativo_slide_show"<?php echo $slide_show->bool_ativo_slide_show->cellAttributes() ?>>
<span id="el<?php echo $slide_show_list->RowCnt ?>_slide_show_bool_ativo_slide_show" class="slide_show_bool_ativo_slide_show">
<span<?php echo $slide_show->bool_ativo_slide_show->viewAttributes() ?>>
<?php echo $slide_show->bool_ativo_slide_show->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$slide_show_list->ListOptions->render("body", "right", $slide_show_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$slide_show->isGridAdd())
		$slide_show_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$slide_show->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($slide_show_list->Recordset)
	$slide_show_list->Recordset->Close();
?>
<?php if (!$slide_show->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$slide_show->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($slide_show_list->Pager)) $slide_show_list->Pager = new PrevNextPager($slide_show_list->StartRec, $slide_show_list->DisplayRecs, $slide_show_list->TotalRecs, $slide_show_list->AutoHidePager) ?>
<?php if ($slide_show_list->Pager->RecordCount > 0 && $slide_show_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($slide_show_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $slide_show_list->pageUrl() ?>start=<?php echo $slide_show_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($slide_show_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $slide_show_list->pageUrl() ?>start=<?php echo $slide_show_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $slide_show_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($slide_show_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $slide_show_list->pageUrl() ?>start=<?php echo $slide_show_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($slide_show_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $slide_show_list->pageUrl() ?>start=<?php echo $slide_show_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $slide_show_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($slide_show_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $slide_show_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $slide_show_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $slide_show_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($slide_show_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($slide_show_list->TotalRecs == 0 && !$slide_show->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($slide_show_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$slide_show_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$slide_show->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$slide_show_list->terminate();
?>
