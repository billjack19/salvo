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
$topicos_loja_list = new topicos_loja_list();

// Run the page
$topicos_loja_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$topicos_loja_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$topicos_loja->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftopicos_lojalist = currentForm = new ew.Form("ftopicos_lojalist", "list");
ftopicos_lojalist.formKeyCountName = '<?php echo $topicos_loja_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftopicos_lojalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftopicos_lojalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ftopicos_lojalistsrch = currentSearchForm = new ew.Form("ftopicos_lojalistsrch");

// Filters
ftopicos_lojalistsrch.filterList = <?php echo $topicos_loja_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$topicos_loja->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($topicos_loja_list->TotalRecs > 0 && $topicos_loja_list->ExportOptions->visible()) { ?>
<?php $topicos_loja_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($topicos_loja_list->ImportOptions->visible()) { ?>
<?php $topicos_loja_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($topicos_loja_list->SearchOptions->visible()) { ?>
<?php $topicos_loja_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($topicos_loja_list->FilterOptions->visible()) { ?>
<?php $topicos_loja_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$topicos_loja_list->renderOtherOptions();
?>
<?php if (!$topicos_loja->isExport() && !$topicos_loja->CurrentAction) { ?>
<form name="ftopicos_lojalistsrch" id="ftopicos_lojalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($topicos_loja_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftopicos_lojalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="topicos_loja">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($topicos_loja_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($topicos_loja_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $topicos_loja_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($topicos_loja_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($topicos_loja_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($topicos_loja_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($topicos_loja_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $topicos_loja_list->showPageHeader(); ?>
<?php
$topicos_loja_list->showMessage();
?>
<?php if ($topicos_loja_list->TotalRecs > 0 || $topicos_loja->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($topicos_loja_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> topicos_loja">
<form name="ftopicos_lojalist" id="ftopicos_lojalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($topicos_loja_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $topicos_loja_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="topicos_loja">
<div id="gmp_topicos_loja" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($topicos_loja_list->TotalRecs > 0 || $topicos_loja->isGridEdit()) { ?>
<table id="tbl_topicos_lojalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$topicos_loja_list->RowType = ROWTYPE_HEADER;

// Render list options
$topicos_loja_list->renderListOptions();

// Render list options (header, left)
$topicos_loja_list->ListOptions->render("header", "left");
?>
<?php if ($topicos_loja->id_topicos_loja->Visible) { // id_topicos_loja ?>
	<?php if ($topicos_loja->sortUrl($topicos_loja->id_topicos_loja) == "") { ?>
		<th data-name="id_topicos_loja" class="<?php echo $topicos_loja->id_topicos_loja->headerCellClass() ?>"><div id="elh_topicos_loja_id_topicos_loja" class="topicos_loja_id_topicos_loja"><div class="ew-table-header-caption"><?php echo $topicos_loja->id_topicos_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_topicos_loja" class="<?php echo $topicos_loja->id_topicos_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $topicos_loja->SortUrl($topicos_loja->id_topicos_loja) ?>',1);"><div id="elh_topicos_loja_id_topicos_loja" class="topicos_loja_id_topicos_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $topicos_loja->id_topicos_loja->caption() ?></span><span class="ew-table-header-sort"><?php if ($topicos_loja->id_topicos_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($topicos_loja->id_topicos_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($topicos_loja->titulo_topicos_loja->Visible) { // titulo_topicos_loja ?>
	<?php if ($topicos_loja->sortUrl($topicos_loja->titulo_topicos_loja) == "") { ?>
		<th data-name="titulo_topicos_loja" class="<?php echo $topicos_loja->titulo_topicos_loja->headerCellClass() ?>"><div id="elh_topicos_loja_titulo_topicos_loja" class="topicos_loja_titulo_topicos_loja"><div class="ew-table-header-caption"><?php echo $topicos_loja->titulo_topicos_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_topicos_loja" class="<?php echo $topicos_loja->titulo_topicos_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $topicos_loja->SortUrl($topicos_loja->titulo_topicos_loja) ?>',1);"><div id="elh_topicos_loja_titulo_topicos_loja" class="topicos_loja_titulo_topicos_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $topicos_loja->titulo_topicos_loja->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($topicos_loja->titulo_topicos_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($topicos_loja->titulo_topicos_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($topicos_loja->descricao_topicos_loja->Visible) { // descricao_topicos_loja ?>
	<?php if ($topicos_loja->sortUrl($topicos_loja->descricao_topicos_loja) == "") { ?>
		<th data-name="descricao_topicos_loja" class="<?php echo $topicos_loja->descricao_topicos_loja->headerCellClass() ?>"><div id="elh_topicos_loja_descricao_topicos_loja" class="topicos_loja_descricao_topicos_loja"><div class="ew-table-header-caption"><?php echo $topicos_loja->descricao_topicos_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_topicos_loja" class="<?php echo $topicos_loja->descricao_topicos_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $topicos_loja->SortUrl($topicos_loja->descricao_topicos_loja) ?>',1);"><div id="elh_topicos_loja_descricao_topicos_loja" class="topicos_loja_descricao_topicos_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $topicos_loja->descricao_topicos_loja->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($topicos_loja->descricao_topicos_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($topicos_loja->descricao_topicos_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($topicos_loja->loja_id->Visible) { // loja_id ?>
	<?php if ($topicos_loja->sortUrl($topicos_loja->loja_id) == "") { ?>
		<th data-name="loja_id" class="<?php echo $topicos_loja->loja_id->headerCellClass() ?>"><div id="elh_topicos_loja_loja_id" class="topicos_loja_loja_id"><div class="ew-table-header-caption"><?php echo $topicos_loja->loja_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="loja_id" class="<?php echo $topicos_loja->loja_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $topicos_loja->SortUrl($topicos_loja->loja_id) ?>',1);"><div id="elh_topicos_loja_loja_id" class="topicos_loja_loja_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $topicos_loja->loja_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($topicos_loja->loja_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($topicos_loja->loja_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($topicos_loja->data_atualizacao_topicos_loja->Visible) { // data_atualizacao_topicos_loja ?>
	<?php if ($topicos_loja->sortUrl($topicos_loja->data_atualizacao_topicos_loja) == "") { ?>
		<th data-name="data_atualizacao_topicos_loja" class="<?php echo $topicos_loja->data_atualizacao_topicos_loja->headerCellClass() ?>"><div id="elh_topicos_loja_data_atualizacao_topicos_loja" class="topicos_loja_data_atualizacao_topicos_loja"><div class="ew-table-header-caption"><?php echo $topicos_loja->data_atualizacao_topicos_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_topicos_loja" class="<?php echo $topicos_loja->data_atualizacao_topicos_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $topicos_loja->SortUrl($topicos_loja->data_atualizacao_topicos_loja) ?>',1);"><div id="elh_topicos_loja_data_atualizacao_topicos_loja" class="topicos_loja_data_atualizacao_topicos_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $topicos_loja->data_atualizacao_topicos_loja->caption() ?></span><span class="ew-table-header-sort"><?php if ($topicos_loja->data_atualizacao_topicos_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($topicos_loja->data_atualizacao_topicos_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($topicos_loja->usuario_id->Visible) { // usuario_id ?>
	<?php if ($topicos_loja->sortUrl($topicos_loja->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $topicos_loja->usuario_id->headerCellClass() ?>"><div id="elh_topicos_loja_usuario_id" class="topicos_loja_usuario_id"><div class="ew-table-header-caption"><?php echo $topicos_loja->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $topicos_loja->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $topicos_loja->SortUrl($topicos_loja->usuario_id) ?>',1);"><div id="elh_topicos_loja_usuario_id" class="topicos_loja_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $topicos_loja->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($topicos_loja->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($topicos_loja->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($topicos_loja->bool_ativo_topicos_loja->Visible) { // bool_ativo_topicos_loja ?>
	<?php if ($topicos_loja->sortUrl($topicos_loja->bool_ativo_topicos_loja) == "") { ?>
		<th data-name="bool_ativo_topicos_loja" class="<?php echo $topicos_loja->bool_ativo_topicos_loja->headerCellClass() ?>"><div id="elh_topicos_loja_bool_ativo_topicos_loja" class="topicos_loja_bool_ativo_topicos_loja"><div class="ew-table-header-caption"><?php echo $topicos_loja->bool_ativo_topicos_loja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_topicos_loja" class="<?php echo $topicos_loja->bool_ativo_topicos_loja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $topicos_loja->SortUrl($topicos_loja->bool_ativo_topicos_loja) ?>',1);"><div id="elh_topicos_loja_bool_ativo_topicos_loja" class="topicos_loja_bool_ativo_topicos_loja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $topicos_loja->bool_ativo_topicos_loja->caption() ?></span><span class="ew-table-header-sort"><?php if ($topicos_loja->bool_ativo_topicos_loja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($topicos_loja->bool_ativo_topicos_loja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$topicos_loja_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($topicos_loja->ExportAll && $topicos_loja->isExport()) {
	$topicos_loja_list->StopRec = $topicos_loja_list->TotalRecs;
} else {

	// Set the last record to display
	if ($topicos_loja_list->TotalRecs > $topicos_loja_list->StartRec + $topicos_loja_list->DisplayRecs - 1)
		$topicos_loja_list->StopRec = $topicos_loja_list->StartRec + $topicos_loja_list->DisplayRecs - 1;
	else
		$topicos_loja_list->StopRec = $topicos_loja_list->TotalRecs;
}
$topicos_loja_list->RecCnt = $topicos_loja_list->StartRec - 1;
if ($topicos_loja_list->Recordset && !$topicos_loja_list->Recordset->EOF) {
	$topicos_loja_list->Recordset->moveFirst();
	$selectLimit = $topicos_loja_list->UseSelectLimit;
	if (!$selectLimit && $topicos_loja_list->StartRec > 1)
		$topicos_loja_list->Recordset->move($topicos_loja_list->StartRec - 1);
} elseif (!$topicos_loja->AllowAddDeleteRow && $topicos_loja_list->StopRec == 0) {
	$topicos_loja_list->StopRec = $topicos_loja->GridAddRowCount;
}

// Initialize aggregate
$topicos_loja->RowType = ROWTYPE_AGGREGATEINIT;
$topicos_loja->resetAttributes();
$topicos_loja_list->renderRow();
while ($topicos_loja_list->RecCnt < $topicos_loja_list->StopRec) {
	$topicos_loja_list->RecCnt++;
	if ($topicos_loja_list->RecCnt >= $topicos_loja_list->StartRec) {
		$topicos_loja_list->RowCnt++;

		// Set up key count
		$topicos_loja_list->KeyCount = $topicos_loja_list->RowIndex;

		// Init row class and style
		$topicos_loja->resetAttributes();
		$topicos_loja->CssClass = "";
		if ($topicos_loja->isGridAdd()) {
		} else {
			$topicos_loja_list->loadRowValues($topicos_loja_list->Recordset); // Load row values
		}
		$topicos_loja->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$topicos_loja->RowAttrs = array_merge($topicos_loja->RowAttrs, array('data-rowindex'=>$topicos_loja_list->RowCnt, 'id'=>'r' . $topicos_loja_list->RowCnt . '_topicos_loja', 'data-rowtype'=>$topicos_loja->RowType));

		// Render row
		$topicos_loja_list->renderRow();

		// Render list options
		$topicos_loja_list->renderListOptions();
?>
	<tr<?php echo $topicos_loja->rowAttributes() ?>>
<?php

// Render list options (body, left)
$topicos_loja_list->ListOptions->render("body", "left", $topicos_loja_list->RowCnt);
?>
	<?php if ($topicos_loja->id_topicos_loja->Visible) { // id_topicos_loja ?>
		<td data-name="id_topicos_loja"<?php echo $topicos_loja->id_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_list->RowCnt ?>_topicos_loja_id_topicos_loja" class="topicos_loja_id_topicos_loja">
<span<?php echo $topicos_loja->id_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->id_topicos_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($topicos_loja->titulo_topicos_loja->Visible) { // titulo_topicos_loja ?>
		<td data-name="titulo_topicos_loja"<?php echo $topicos_loja->titulo_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_list->RowCnt ?>_topicos_loja_titulo_topicos_loja" class="topicos_loja_titulo_topicos_loja">
<span<?php echo $topicos_loja->titulo_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->titulo_topicos_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($topicos_loja->descricao_topicos_loja->Visible) { // descricao_topicos_loja ?>
		<td data-name="descricao_topicos_loja"<?php echo $topicos_loja->descricao_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_list->RowCnt ?>_topicos_loja_descricao_topicos_loja" class="topicos_loja_descricao_topicos_loja">
<span<?php echo $topicos_loja->descricao_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->descricao_topicos_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($topicos_loja->loja_id->Visible) { // loja_id ?>
		<td data-name="loja_id"<?php echo $topicos_loja->loja_id->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_list->RowCnt ?>_topicos_loja_loja_id" class="topicos_loja_loja_id">
<span<?php echo $topicos_loja->loja_id->viewAttributes() ?>>
<?php echo $topicos_loja->loja_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($topicos_loja->data_atualizacao_topicos_loja->Visible) { // data_atualizacao_topicos_loja ?>
		<td data-name="data_atualizacao_topicos_loja"<?php echo $topicos_loja->data_atualizacao_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_list->RowCnt ?>_topicos_loja_data_atualizacao_topicos_loja" class="topicos_loja_data_atualizacao_topicos_loja">
<span<?php echo $topicos_loja->data_atualizacao_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->data_atualizacao_topicos_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($topicos_loja->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $topicos_loja->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_list->RowCnt ?>_topicos_loja_usuario_id" class="topicos_loja_usuario_id">
<span<?php echo $topicos_loja->usuario_id->viewAttributes() ?>>
<?php echo $topicos_loja->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($topicos_loja->bool_ativo_topicos_loja->Visible) { // bool_ativo_topicos_loja ?>
		<td data-name="bool_ativo_topicos_loja"<?php echo $topicos_loja->bool_ativo_topicos_loja->cellAttributes() ?>>
<span id="el<?php echo $topicos_loja_list->RowCnt ?>_topicos_loja_bool_ativo_topicos_loja" class="topicos_loja_bool_ativo_topicos_loja">
<span<?php echo $topicos_loja->bool_ativo_topicos_loja->viewAttributes() ?>>
<?php echo $topicos_loja->bool_ativo_topicos_loja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$topicos_loja_list->ListOptions->render("body", "right", $topicos_loja_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$topicos_loja->isGridAdd())
		$topicos_loja_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$topicos_loja->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($topicos_loja_list->Recordset)
	$topicos_loja_list->Recordset->Close();
?>
<?php if (!$topicos_loja->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$topicos_loja->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($topicos_loja_list->Pager)) $topicos_loja_list->Pager = new PrevNextPager($topicos_loja_list->StartRec, $topicos_loja_list->DisplayRecs, $topicos_loja_list->TotalRecs, $topicos_loja_list->AutoHidePager) ?>
<?php if ($topicos_loja_list->Pager->RecordCount > 0 && $topicos_loja_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($topicos_loja_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $topicos_loja_list->pageUrl() ?>start=<?php echo $topicos_loja_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($topicos_loja_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $topicos_loja_list->pageUrl() ?>start=<?php echo $topicos_loja_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $topicos_loja_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($topicos_loja_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $topicos_loja_list->pageUrl() ?>start=<?php echo $topicos_loja_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($topicos_loja_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $topicos_loja_list->pageUrl() ?>start=<?php echo $topicos_loja_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $topicos_loja_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($topicos_loja_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $topicos_loja_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $topicos_loja_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $topicos_loja_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($topicos_loja_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($topicos_loja_list->TotalRecs == 0 && !$topicos_loja->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($topicos_loja_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$topicos_loja_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$topicos_loja->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$topicos_loja_list->terminate();
?>
