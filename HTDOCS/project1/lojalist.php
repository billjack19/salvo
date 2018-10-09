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
$loja_list = new loja_list();

// Run the page
$loja_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$loja_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$loja->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flojalist = currentForm = new ew.Form("flojalist", "list");
flojalist.formKeyCountName = '<?php echo $loja_list->FormKeyCountName ?>';

// Form_CustomValidate event
flojalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flojalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flojalistsrch = currentSearchForm = new ew.Form("flojalistsrch");

// Filters
flojalistsrch.filterList = <?php echo $loja_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$loja->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($loja_list->TotalRecs > 0 && $loja_list->ExportOptions->visible()) { ?>
<?php $loja_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($loja_list->ImportOptions->visible()) { ?>
<?php $loja_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($loja_list->SearchOptions->visible()) { ?>
<?php $loja_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($loja_list->FilterOptions->visible()) { ?>
<?php $loja_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$loja_list->renderOtherOptions();
?>
<?php if (!$loja->isExport() && !$loja->CurrentAction) { ?>
<form name="flojalistsrch" id="flojalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($loja_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flojalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="loja">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($loja_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($loja_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $loja_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($loja_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($loja_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($loja_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($loja_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $loja_list->showPageHeader(); ?>
<?php
$loja_list->showMessage();
?>
<?php if ($loja_list->TotalRecs > 0 || $loja->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($loja_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> loja">
<form name="flojalist" id="flojalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($loja_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $loja_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="loja">
<div id="gmp_loja" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($loja_list->TotalRecs > 0 || $loja->isGridEdit()) { ?>
<table id="tbl_lojalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$loja_list->RowType = ROWTYPE_HEADER;

// Render list options
$loja_list->renderListOptions();

// Render list options (header, left)
$loja_list->ListOptions->render("header", "left");
?>
<?php if ($loja->id_loja->Visible) { // id_loja ?>
	<?php if ($loja->sortUrl($loja->id_loja) == "") { ?>
		<th data-name="id_loja" class="<?php echo $loja->id_loja->headerCellClass() ?>"><div id="elh_loja_id_loja" class="loja_id_loja"><div class="ew-table-header-caption"><?php echo $loja->id_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_loja" class="<?php echo $loja->id_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->id_loja) ?>',1);"><div id="elh_loja_id_loja" class="loja_id_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->id_loja->caption() ?></span><span class="ew-table-header-sort"><?php if ($loja->id_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->id_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($loja->titulo_loja->Visible) { // titulo_loja ?>
	<?php if ($loja->sortUrl($loja->titulo_loja) == "") { ?>
		<th data-name="titulo_loja" class="<?php echo $loja->titulo_loja->headerCellClass() ?>"><div id="elh_loja_titulo_loja" class="loja_titulo_loja"><div class="ew-table-header-caption"><?php echo $loja->titulo_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_loja" class="<?php echo $loja->titulo_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->titulo_loja) ?>',1);"><div id="elh_loja_titulo_loja" class="loja_titulo_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->titulo_loja->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($loja->titulo_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->titulo_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($loja->descricao_loja->Visible) { // descricao_loja ?>
	<?php if ($loja->sortUrl($loja->descricao_loja) == "") { ?>
		<th data-name="descricao_loja" class="<?php echo $loja->descricao_loja->headerCellClass() ?>"><div id="elh_loja_descricao_loja" class="loja_descricao_loja"><div class="ew-table-header-caption"><?php echo $loja->descricao_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_loja" class="<?php echo $loja->descricao_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->descricao_loja) ?>',1);"><div id="elh_loja_descricao_loja" class="loja_descricao_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->descricao_loja->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($loja->descricao_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->descricao_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($loja->imagem_loja->Visible) { // imagem_loja ?>
	<?php if ($loja->sortUrl($loja->imagem_loja) == "") { ?>
		<th data-name="imagem_loja" class="<?php echo $loja->imagem_loja->headerCellClass() ?>"><div id="elh_loja_imagem_loja" class="loja_imagem_loja"><div class="ew-table-header-caption"><?php echo $loja->imagem_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_loja" class="<?php echo $loja->imagem_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->imagem_loja) ?>',1);"><div id="elh_loja_imagem_loja" class="loja_imagem_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->imagem_loja->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($loja->imagem_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->imagem_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($loja->pagina_principal_id->Visible) { // pagina_principal_id ?>
	<?php if ($loja->sortUrl($loja->pagina_principal_id) == "") { ?>
		<th data-name="pagina_principal_id" class="<?php echo $loja->pagina_principal_id->headerCellClass() ?>"><div id="elh_loja_pagina_principal_id" class="loja_pagina_principal_id"><div class="ew-table-header-caption"><?php echo $loja->pagina_principal_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pagina_principal_id" class="<?php echo $loja->pagina_principal_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->pagina_principal_id) ?>',1);"><div id="elh_loja_pagina_principal_id" class="loja_pagina_principal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->pagina_principal_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($loja->pagina_principal_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->pagina_principal_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($loja->data_atualizacao_loja->Visible) { // data_atualizacao_loja ?>
	<?php if ($loja->sortUrl($loja->data_atualizacao_loja) == "") { ?>
		<th data-name="data_atualizacao_loja" class="<?php echo $loja->data_atualizacao_loja->headerCellClass() ?>"><div id="elh_loja_data_atualizacao_loja" class="loja_data_atualizacao_loja"><div class="ew-table-header-caption"><?php echo $loja->data_atualizacao_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_loja" class="<?php echo $loja->data_atualizacao_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->data_atualizacao_loja) ?>',1);"><div id="elh_loja_data_atualizacao_loja" class="loja_data_atualizacao_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->data_atualizacao_loja->caption() ?></span><span class="ew-table-header-sort"><?php if ($loja->data_atualizacao_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->data_atualizacao_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($loja->usuario_id->Visible) { // usuario_id ?>
	<?php if ($loja->sortUrl($loja->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $loja->usuario_id->headerCellClass() ?>"><div id="elh_loja_usuario_id" class="loja_usuario_id"><div class="ew-table-header-caption"><?php echo $loja->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $loja->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->usuario_id) ?>',1);"><div id="elh_loja_usuario_id" class="loja_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($loja->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($loja->bool_ativo_loja->Visible) { // bool_ativo_loja ?>
	<?php if ($loja->sortUrl($loja->bool_ativo_loja) == "") { ?>
		<th data-name="bool_ativo_loja" class="<?php echo $loja->bool_ativo_loja->headerCellClass() ?>"><div id="elh_loja_bool_ativo_loja" class="loja_bool_ativo_loja"><div class="ew-table-header-caption"><?php echo $loja->bool_ativo_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_loja" class="<?php echo $loja->bool_ativo_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $loja->SortUrl($loja->bool_ativo_loja) ?>',1);"><div id="elh_loja_bool_ativo_loja" class="loja_bool_ativo_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $loja->bool_ativo_loja->caption() ?></span><span class="ew-table-header-sort"><?php if ($loja->bool_ativo_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($loja->bool_ativo_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$loja_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($loja->ExportAll && $loja->isExport()) {
	$loja_list->StopRec = $loja_list->TotalRecs;
} else {

	// Set the last record to display
	if ($loja_list->TotalRecs > $loja_list->StartRec + $loja_list->DisplayRecs - 1)
		$loja_list->StopRec = $loja_list->StartRec + $loja_list->DisplayRecs - 1;
	else
		$loja_list->StopRec = $loja_list->TotalRecs;
}
$loja_list->RecCnt = $loja_list->StartRec - 1;
if ($loja_list->Recordset && !$loja_list->Recordset->EOF) {
	$loja_list->Recordset->moveFirst();
	$selectLimit = $loja_list->UseSelectLimit;
	if (!$selectLimit && $loja_list->StartRec > 1)
		$loja_list->Recordset->move($loja_list->StartRec - 1);
} elseif (!$loja->AllowAddDeleteRow && $loja_list->StopRec == 0) {
	$loja_list->StopRec = $loja->GridAddRowCount;
}

// Initialize aggregate
$loja->RowType = ROWTYPE_AGGREGATEINIT;
$loja->resetAttributes();
$loja_list->renderRow();
while ($loja_list->RecCnt < $loja_list->StopRec) {
	$loja_list->RecCnt++;
	if ($loja_list->RecCnt >= $loja_list->StartRec) {
		$loja_list->RowCnt++;

		// Set up key count
		$loja_list->KeyCount = $loja_list->RowIndex;

		// Init row class and style
		$loja->resetAttributes();
		$loja->CssClass = "";
		if ($loja->isGridAdd()) {
		} else {
			$loja_list->loadRowValues($loja_list->Recordset); // Load row values
		}
		$loja->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$loja->RowAttrs = array_merge($loja->RowAttrs, array('data-rowindex'=>$loja_list->RowCnt, 'id'=>'r' . $loja_list->RowCnt . '_loja', 'data-rowtype'=>$loja->RowType));

		// Render row
		$loja_list->renderRow();

		// Render list options
		$loja_list->renderListOptions();
?>
	<tr<?php echo $loja->rowAttributes() ?>>
<?php

// Render list options (body, left)
$loja_list->ListOptions->render("body", "left", $loja_list->RowCnt);
?>
	<?php if ($loja->id_loja->Visible) { // id_loja ?>
		<td data-name="id_loja"<?php echo $loja->id_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_id_loja" class="loja_id_loja">
<span<?php echo $loja->id_loja->viewAttributes() ?>>
<?php echo $loja->id_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($loja->titulo_loja->Visible) { // titulo_loja ?>
		<td data-name="titulo_loja"<?php echo $loja->titulo_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_titulo_loja" class="loja_titulo_loja">
<span<?php echo $loja->titulo_loja->viewAttributes() ?>>
<?php echo $loja->titulo_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($loja->descricao_loja->Visible) { // descricao_loja ?>
		<td data-name="descricao_loja"<?php echo $loja->descricao_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_descricao_loja" class="loja_descricao_loja">
<span<?php echo $loja->descricao_loja->viewAttributes() ?>>
<?php echo $loja->descricao_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($loja->imagem_loja->Visible) { // imagem_loja ?>
		<td data-name="imagem_loja"<?php echo $loja->imagem_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_imagem_loja" class="loja_imagem_loja">
<span<?php echo $loja->imagem_loja->viewAttributes() ?>>
<?php echo $loja->imagem_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($loja->pagina_principal_id->Visible) { // pagina_principal_id ?>
		<td data-name="pagina_principal_id"<?php echo $loja->pagina_principal_id->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_pagina_principal_id" class="loja_pagina_principal_id">
<span<?php echo $loja->pagina_principal_id->viewAttributes() ?>>
<?php echo $loja->pagina_principal_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($loja->data_atualizacao_loja->Visible) { // data_atualizacao_loja ?>
		<td data-name="data_atualizacao_loja"<?php echo $loja->data_atualizacao_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_data_atualizacao_loja" class="loja_data_atualizacao_loja">
<span<?php echo $loja->data_atualizacao_loja->viewAttributes() ?>>
<?php echo $loja->data_atualizacao_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($loja->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $loja->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_usuario_id" class="loja_usuario_id">
<span<?php echo $loja->usuario_id->viewAttributes() ?>>
<?php echo $loja->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($loja->bool_ativo_loja->Visible) { // bool_ativo_loja ?>
		<td data-name="bool_ativo_loja"<?php echo $loja->bool_ativo_loja->cellAttributes() ?>>
<span id="el<?php echo $loja_list->RowCnt ?>_loja_bool_ativo_loja" class="loja_bool_ativo_loja">
<span<?php echo $loja->bool_ativo_loja->viewAttributes() ?>>
<?php echo $loja->bool_ativo_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$loja_list->ListOptions->render("body", "right", $loja_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$loja->isGridAdd())
		$loja_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$loja->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($loja_list->Recordset)
	$loja_list->Recordset->Close();
?>
<?php if (!$loja->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$loja->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($loja_list->Pager)) $loja_list->Pager = new PrevNextPager($loja_list->StartRec, $loja_list->DisplayRecs, $loja_list->TotalRecs, $loja_list->AutoHidePager) ?>
<?php if ($loja_list->Pager->RecordCount > 0 && $loja_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($loja_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $loja_list->pageUrl() ?>start=<?php echo $loja_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($loja_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $loja_list->pageUrl() ?>start=<?php echo $loja_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $loja_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($loja_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $loja_list->pageUrl() ?>start=<?php echo $loja_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($loja_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $loja_list->pageUrl() ?>start=<?php echo $loja_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $loja_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($loja_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $loja_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $loja_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $loja_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($loja_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($loja_list->TotalRecs == 0 && !$loja->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($loja_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$loja_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$loja->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$loja_list->terminate();
?>
