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
$item_list = new item_list();

// Run the page
$item_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$item->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fitemlist = currentForm = new ew.Form("fitemlist", "list");
fitemlist.formKeyCountName = '<?php echo $item_list->FormKeyCountName ?>';

// Form_CustomValidate event
fitemlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitemlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fitemlistsrch = currentSearchForm = new ew.Form("fitemlistsrch");

// Filters
fitemlistsrch.filterList = <?php echo $item_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$item->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($item_list->TotalRecs > 0 && $item_list->ExportOptions->visible()) { ?>
<?php $item_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($item_list->ImportOptions->visible()) { ?>
<?php $item_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($item_list->SearchOptions->visible()) { ?>
<?php $item_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($item_list->FilterOptions->visible()) { ?>
<?php $item_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$item_list->renderOtherOptions();
?>
<?php if (!$item->isExport() && !$item->CurrentAction) { ?>
<form name="fitemlistsrch" id="fitemlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($item_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fitemlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="item">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($item_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($item_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $item_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($item_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($item_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($item_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($item_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $item_list->showPageHeader(); ?>
<?php
$item_list->showMessage();
?>
<?php if ($item_list->TotalRecs > 0 || $item->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($item_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> item">
<form name="fitemlist" id="fitemlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item">
<div id="gmp_item" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($item_list->TotalRecs > 0 || $item->isGridEdit()) { ?>
<table id="tbl_itemlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$item_list->RowType = ROWTYPE_HEADER;

// Render list options
$item_list->renderListOptions();

// Render list options (header, left)
$item_list->ListOptions->render("header", "left");
?>
<?php if ($item->id_item->Visible) { // id_item ?>
	<?php if ($item->sortUrl($item->id_item) == "") { ?>
		<th data-name="id_item" class="<?php echo $item->id_item->headerCellClass() ?>"><div id="elh_item_id_item" class="item_id_item"><div class="ew-table-header-caption"><?php echo $item->id_item->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_item" class="<?php echo $item->id_item->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->id_item) ?>',1);"><div id="elh_item_id_item" class="item_id_item">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->id_item->caption() ?></span><span class="ew-table-header-sort"><?php if ($item->id_item->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->id_item->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->imagem_item->Visible) { // imagem_item ?>
	<?php if ($item->sortUrl($item->imagem_item) == "") { ?>
		<th data-name="imagem_item" class="<?php echo $item->imagem_item->headerCellClass() ?>"><div id="elh_item_imagem_item" class="item_imagem_item"><div class="ew-table-header-caption"><?php echo $item->imagem_item->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_item" class="<?php echo $item->imagem_item->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->imagem_item) ?>',1);"><div id="elh_item_imagem_item" class="item_imagem_item">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->imagem_item->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($item->imagem_item->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->imagem_item->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->numero_item->Visible) { // numero_item ?>
	<?php if ($item->sortUrl($item->numero_item) == "") { ?>
		<th data-name="numero_item" class="<?php echo $item->numero_item->headerCellClass() ?>"><div id="elh_item_numero_item" class="item_numero_item"><div class="ew-table-header-caption"><?php echo $item->numero_item->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="numero_item" class="<?php echo $item->numero_item->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->numero_item) ?>',1);"><div id="elh_item_numero_item" class="item_numero_item">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->numero_item->caption() ?></span><span class="ew-table-header-sort"><?php if ($item->numero_item->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->numero_item->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->bairro_item->Visible) { // bairro_item ?>
	<?php if ($item->sortUrl($item->bairro_item) == "") { ?>
		<th data-name="bairro_item" class="<?php echo $item->bairro_item->headerCellClass() ?>"><div id="elh_item_bairro_item" class="item_bairro_item"><div class="ew-table-header-caption"><?php echo $item->bairro_item->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bairro_item" class="<?php echo $item->bairro_item->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->bairro_item) ?>',1);"><div id="elh_item_bairro_item" class="item_bairro_item">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->bairro_item->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($item->bairro_item->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->bairro_item->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->cidade_item->Visible) { // cidade_item ?>
	<?php if ($item->sortUrl($item->cidade_item) == "") { ?>
		<th data-name="cidade_item" class="<?php echo $item->cidade_item->headerCellClass() ?>"><div id="elh_item_cidade_item" class="item_cidade_item"><div class="ew-table-header-caption"><?php echo $item->cidade_item->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cidade_item" class="<?php echo $item->cidade_item->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->cidade_item) ?>',1);"><div id="elh_item_cidade_item" class="item_cidade_item">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->cidade_item->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($item->cidade_item->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->cidade_item->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->estado_id->Visible) { // estado_id ?>
	<?php if ($item->sortUrl($item->estado_id) == "") { ?>
		<th data-name="estado_id" class="<?php echo $item->estado_id->headerCellClass() ?>"><div id="elh_item_estado_id" class="item_estado_id"><div class="ew-table-header-caption"><?php echo $item->estado_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_id" class="<?php echo $item->estado_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->estado_id) ?>',1);"><div id="elh_item_estado_id" class="item_estado_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->estado_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($item->estado_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->estado_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->situacao_id->Visible) { // situacao_id ?>
	<?php if ($item->sortUrl($item->situacao_id) == "") { ?>
		<th data-name="situacao_id" class="<?php echo $item->situacao_id->headerCellClass() ?>"><div id="elh_item_situacao_id" class="item_situacao_id"><div class="ew-table-header-caption"><?php echo $item->situacao_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="situacao_id" class="<?php echo $item->situacao_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->situacao_id) ?>',1);"><div id="elh_item_situacao_id" class="item_situacao_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->situacao_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($item->situacao_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->situacao_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->grupo_id->Visible) { // grupo_id ?>
	<?php if ($item->sortUrl($item->grupo_id) == "") { ?>
		<th data-name="grupo_id" class="<?php echo $item->grupo_id->headerCellClass() ?>"><div id="elh_item_grupo_id" class="item_grupo_id"><div class="ew-table-header-caption"><?php echo $item->grupo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grupo_id" class="<?php echo $item->grupo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->grupo_id) ?>',1);"><div id="elh_item_grupo_id" class="item_grupo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->grupo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($item->grupo_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->grupo_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->usuario_id->Visible) { // usuario_id ?>
	<?php if ($item->sortUrl($item->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $item->usuario_id->headerCellClass() ?>"><div id="elh_item_usuario_id" class="item_usuario_id"><div class="ew-table-header-caption"><?php echo $item->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $item->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->usuario_id) ?>',1);"><div id="elh_item_usuario_id" class="item_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($item->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item->bool_ativo_item->Visible) { // bool_ativo_item ?>
	<?php if ($item->sortUrl($item->bool_ativo_item) == "") { ?>
		<th data-name="bool_ativo_item" class="<?php echo $item->bool_ativo_item->headerCellClass() ?>"><div id="elh_item_bool_ativo_item" class="item_bool_ativo_item"><div class="ew-table-header-caption"><?php echo $item->bool_ativo_item->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_item" class="<?php echo $item->bool_ativo_item->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item->SortUrl($item->bool_ativo_item) ?>',1);"><div id="elh_item_bool_ativo_item" class="item_bool_ativo_item">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item->bool_ativo_item->caption() ?></span><span class="ew-table-header-sort"><?php if ($item->bool_ativo_item->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item->bool_ativo_item->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$item_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($item->ExportAll && $item->isExport()) {
	$item_list->StopRec = $item_list->TotalRecs;
} else {

	// Set the last record to display
	if ($item_list->TotalRecs > $item_list->StartRec + $item_list->DisplayRecs - 1)
		$item_list->StopRec = $item_list->StartRec + $item_list->DisplayRecs - 1;
	else
		$item_list->StopRec = $item_list->TotalRecs;
}
$item_list->RecCnt = $item_list->StartRec - 1;
if ($item_list->Recordset && !$item_list->Recordset->EOF) {
	$item_list->Recordset->moveFirst();
	$selectLimit = $item_list->UseSelectLimit;
	if (!$selectLimit && $item_list->StartRec > 1)
		$item_list->Recordset->move($item_list->StartRec - 1);
} elseif (!$item->AllowAddDeleteRow && $item_list->StopRec == 0) {
	$item_list->StopRec = $item->GridAddRowCount;
}

// Initialize aggregate
$item->RowType = ROWTYPE_AGGREGATEINIT;
$item->resetAttributes();
$item_list->renderRow();
while ($item_list->RecCnt < $item_list->StopRec) {
	$item_list->RecCnt++;
	if ($item_list->RecCnt >= $item_list->StartRec) {
		$item_list->RowCnt++;

		// Set up key count
		$item_list->KeyCount = $item_list->RowIndex;

		// Init row class and style
		$item->resetAttributes();
		$item->CssClass = "";
		if ($item->isGridAdd()) {
		} else {
			$item_list->loadRowValues($item_list->Recordset); // Load row values
		}
		$item->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$item->RowAttrs = array_merge($item->RowAttrs, array('data-rowindex'=>$item_list->RowCnt, 'id'=>'r' . $item_list->RowCnt . '_item', 'data-rowtype'=>$item->RowType));

		// Render row
		$item_list->renderRow();

		// Render list options
		$item_list->renderListOptions();
?>
	<tr<?php echo $item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$item_list->ListOptions->render("body", "left", $item_list->RowCnt);
?>
	<?php if ($item->id_item->Visible) { // id_item ?>
		<td data-name="id_item"<?php echo $item->id_item->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_id_item" class="item_id_item">
<span<?php echo $item->id_item->viewAttributes() ?>>
<?php echo $item->id_item->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->imagem_item->Visible) { // imagem_item ?>
		<td data-name="imagem_item"<?php echo $item->imagem_item->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_imagem_item" class="item_imagem_item">
<span<?php echo $item->imagem_item->viewAttributes() ?>>
<?php echo $item->imagem_item->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->numero_item->Visible) { // numero_item ?>
		<td data-name="numero_item"<?php echo $item->numero_item->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_numero_item" class="item_numero_item">
<span<?php echo $item->numero_item->viewAttributes() ?>>
<?php echo $item->numero_item->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->bairro_item->Visible) { // bairro_item ?>
		<td data-name="bairro_item"<?php echo $item->bairro_item->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_bairro_item" class="item_bairro_item">
<span<?php echo $item->bairro_item->viewAttributes() ?>>
<?php echo $item->bairro_item->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->cidade_item->Visible) { // cidade_item ?>
		<td data-name="cidade_item"<?php echo $item->cidade_item->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_cidade_item" class="item_cidade_item">
<span<?php echo $item->cidade_item->viewAttributes() ?>>
<?php echo $item->cidade_item->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->estado_id->Visible) { // estado_id ?>
		<td data-name="estado_id"<?php echo $item->estado_id->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_estado_id" class="item_estado_id">
<span<?php echo $item->estado_id->viewAttributes() ?>>
<?php echo $item->estado_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->situacao_id->Visible) { // situacao_id ?>
		<td data-name="situacao_id"<?php echo $item->situacao_id->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_situacao_id" class="item_situacao_id">
<span<?php echo $item->situacao_id->viewAttributes() ?>>
<?php echo $item->situacao_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->grupo_id->Visible) { // grupo_id ?>
		<td data-name="grupo_id"<?php echo $item->grupo_id->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_grupo_id" class="item_grupo_id">
<span<?php echo $item->grupo_id->viewAttributes() ?>>
<?php echo $item->grupo_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $item->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_usuario_id" class="item_usuario_id">
<span<?php echo $item->usuario_id->viewAttributes() ?>>
<?php echo $item->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item->bool_ativo_item->Visible) { // bool_ativo_item ?>
		<td data-name="bool_ativo_item"<?php echo $item->bool_ativo_item->cellAttributes() ?>>
<span id="el<?php echo $item_list->RowCnt ?>_item_bool_ativo_item" class="item_bool_ativo_item">
<span<?php echo $item->bool_ativo_item->viewAttributes() ?>>
<?php echo $item->bool_ativo_item->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$item_list->ListOptions->render("body", "right", $item_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$item->isGridAdd())
		$item_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$item->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($item_list->Recordset)
	$item_list->Recordset->Close();
?>
<?php if (!$item->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$item->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($item_list->Pager)) $item_list->Pager = new PrevNextPager($item_list->StartRec, $item_list->DisplayRecs, $item_list->TotalRecs, $item_list->AutoHidePager) ?>
<?php if ($item_list->Pager->RecordCount > 0 && $item_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($item_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $item_list->pageUrl() ?>start=<?php echo $item_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($item_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $item_list->pageUrl() ?>start=<?php echo $item_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $item_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($item_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $item_list->pageUrl() ?>start=<?php echo $item_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($item_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $item_list->pageUrl() ?>start=<?php echo $item_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $item_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($item_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $item_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $item_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $item_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($item_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($item_list->TotalRecs == 0 && !$item->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($item_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$item_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$item->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$item_list->terminate();
?>
