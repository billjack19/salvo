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
$adicional_site_list = new adicional_site_list();

// Run the page
$adicional_site_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$adicional_site_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$adicional_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fadicional_sitelist = currentForm = new ew.Form("fadicional_sitelist", "list");
fadicional_sitelist.formKeyCountName = '<?php echo $adicional_site_list->FormKeyCountName ?>';

// Form_CustomValidate event
fadicional_sitelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fadicional_sitelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fadicional_sitelistsrch = currentSearchForm = new ew.Form("fadicional_sitelistsrch");

// Filters
fadicional_sitelistsrch.filterList = <?php echo $adicional_site_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$adicional_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($adicional_site_list->TotalRecs > 0 && $adicional_site_list->ExportOptions->visible()) { ?>
<?php $adicional_site_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($adicional_site_list->ImportOptions->visible()) { ?>
<?php $adicional_site_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($adicional_site_list->SearchOptions->visible()) { ?>
<?php $adicional_site_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($adicional_site_list->FilterOptions->visible()) { ?>
<?php $adicional_site_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$adicional_site_list->renderOtherOptions();
?>
<?php if (!$adicional_site->isExport() && !$adicional_site->CurrentAction) { ?>
<form name="fadicional_sitelistsrch" id="fadicional_sitelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($adicional_site_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fadicional_sitelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="adicional_site">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($adicional_site_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($adicional_site_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $adicional_site_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($adicional_site_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($adicional_site_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($adicional_site_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($adicional_site_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $adicional_site_list->showPageHeader(); ?>
<?php
$adicional_site_list->showMessage();
?>
<?php if ($adicional_site_list->TotalRecs > 0 || $adicional_site->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($adicional_site_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> adicional_site">
<form name="fadicional_sitelist" id="fadicional_sitelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($adicional_site_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $adicional_site_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="adicional_site">
<div id="gmp_adicional_site" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($adicional_site_list->TotalRecs > 0 || $adicional_site->isGridEdit()) { ?>
<table id="tbl_adicional_sitelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$adicional_site_list->RowType = ROWTYPE_HEADER;

// Render list options
$adicional_site_list->renderListOptions();

// Render list options (header, left)
$adicional_site_list->ListOptions->render("header", "left");
?>
<?php if ($adicional_site->id_adicional_site->Visible) { // id_adicional_site ?>
	<?php if ($adicional_site->sortUrl($adicional_site->id_adicional_site) == "") { ?>
		<th data-name="id_adicional_site" class="<?php echo $adicional_site->id_adicional_site->headerCellClass() ?>"><div id="elh_adicional_site_id_adicional_site" class="adicional_site_id_adicional_site"><div class="ew-table-header-caption"><?php echo $adicional_site->id_adicional_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_adicional_site" class="<?php echo $adicional_site->id_adicional_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $adicional_site->SortUrl($adicional_site->id_adicional_site) ?>',1);"><div id="elh_adicional_site_id_adicional_site" class="adicional_site_id_adicional_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $adicional_site->id_adicional_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($adicional_site->id_adicional_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($adicional_site->id_adicional_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($adicional_site->titulo_adicional_site->Visible) { // titulo_adicional_site ?>
	<?php if ($adicional_site->sortUrl($adicional_site->titulo_adicional_site) == "") { ?>
		<th data-name="titulo_adicional_site" class="<?php echo $adicional_site->titulo_adicional_site->headerCellClass() ?>"><div id="elh_adicional_site_titulo_adicional_site" class="adicional_site_titulo_adicional_site"><div class="ew-table-header-caption"><?php echo $adicional_site->titulo_adicional_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_adicional_site" class="<?php echo $adicional_site->titulo_adicional_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $adicional_site->SortUrl($adicional_site->titulo_adicional_site) ?>',1);"><div id="elh_adicional_site_titulo_adicional_site" class="adicional_site_titulo_adicional_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $adicional_site->titulo_adicional_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($adicional_site->titulo_adicional_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($adicional_site->titulo_adicional_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($adicional_site->imagem_adicional_site->Visible) { // imagem_adicional_site ?>
	<?php if ($adicional_site->sortUrl($adicional_site->imagem_adicional_site) == "") { ?>
		<th data-name="imagem_adicional_site" class="<?php echo $adicional_site->imagem_adicional_site->headerCellClass() ?>"><div id="elh_adicional_site_imagem_adicional_site" class="adicional_site_imagem_adicional_site"><div class="ew-table-header-caption"><?php echo $adicional_site->imagem_adicional_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_adicional_site" class="<?php echo $adicional_site->imagem_adicional_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $adicional_site->SortUrl($adicional_site->imagem_adicional_site) ?>',1);"><div id="elh_adicional_site_imagem_adicional_site" class="adicional_site_imagem_adicional_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $adicional_site->imagem_adicional_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($adicional_site->imagem_adicional_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($adicional_site->imagem_adicional_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($adicional_site->saiba_mais_id->Visible) { // saiba_mais_id ?>
	<?php if ($adicional_site->sortUrl($adicional_site->saiba_mais_id) == "") { ?>
		<th data-name="saiba_mais_id" class="<?php echo $adicional_site->saiba_mais_id->headerCellClass() ?>"><div id="elh_adicional_site_saiba_mais_id" class="adicional_site_saiba_mais_id"><div class="ew-table-header-caption"><?php echo $adicional_site->saiba_mais_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="saiba_mais_id" class="<?php echo $adicional_site->saiba_mais_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $adicional_site->SortUrl($adicional_site->saiba_mais_id) ?>',1);"><div id="elh_adicional_site_saiba_mais_id" class="adicional_site_saiba_mais_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $adicional_site->saiba_mais_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($adicional_site->saiba_mais_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($adicional_site->saiba_mais_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($adicional_site->usuario_id->Visible) { // usuario_id ?>
	<?php if ($adicional_site->sortUrl($adicional_site->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $adicional_site->usuario_id->headerCellClass() ?>"><div id="elh_adicional_site_usuario_id" class="adicional_site_usuario_id"><div class="ew-table-header-caption"><?php echo $adicional_site->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $adicional_site->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $adicional_site->SortUrl($adicional_site->usuario_id) ?>',1);"><div id="elh_adicional_site_usuario_id" class="adicional_site_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $adicional_site->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($adicional_site->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($adicional_site->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($adicional_site->data_atualizacao_adicional_site->Visible) { // data_atualizacao_adicional_site ?>
	<?php if ($adicional_site->sortUrl($adicional_site->data_atualizacao_adicional_site) == "") { ?>
		<th data-name="data_atualizacao_adicional_site" class="<?php echo $adicional_site->data_atualizacao_adicional_site->headerCellClass() ?>"><div id="elh_adicional_site_data_atualizacao_adicional_site" class="adicional_site_data_atualizacao_adicional_site"><div class="ew-table-header-caption"><?php echo $adicional_site->data_atualizacao_adicional_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_adicional_site" class="<?php echo $adicional_site->data_atualizacao_adicional_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $adicional_site->SortUrl($adicional_site->data_atualizacao_adicional_site) ?>',1);"><div id="elh_adicional_site_data_atualizacao_adicional_site" class="adicional_site_data_atualizacao_adicional_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $adicional_site->data_atualizacao_adicional_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($adicional_site->data_atualizacao_adicional_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($adicional_site->data_atualizacao_adicional_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($adicional_site->bool_ativo_adicional_site->Visible) { // bool_ativo_adicional_site ?>
	<?php if ($adicional_site->sortUrl($adicional_site->bool_ativo_adicional_site) == "") { ?>
		<th data-name="bool_ativo_adicional_site" class="<?php echo $adicional_site->bool_ativo_adicional_site->headerCellClass() ?>"><div id="elh_adicional_site_bool_ativo_adicional_site" class="adicional_site_bool_ativo_adicional_site"><div class="ew-table-header-caption"><?php echo $adicional_site->bool_ativo_adicional_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_adicional_site" class="<?php echo $adicional_site->bool_ativo_adicional_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $adicional_site->SortUrl($adicional_site->bool_ativo_adicional_site) ?>',1);"><div id="elh_adicional_site_bool_ativo_adicional_site" class="adicional_site_bool_ativo_adicional_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $adicional_site->bool_ativo_adicional_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($adicional_site->bool_ativo_adicional_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($adicional_site->bool_ativo_adicional_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$adicional_site_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($adicional_site->ExportAll && $adicional_site->isExport()) {
	$adicional_site_list->StopRec = $adicional_site_list->TotalRecs;
} else {

	// Set the last record to display
	if ($adicional_site_list->TotalRecs > $adicional_site_list->StartRec + $adicional_site_list->DisplayRecs - 1)
		$adicional_site_list->StopRec = $adicional_site_list->StartRec + $adicional_site_list->DisplayRecs - 1;
	else
		$adicional_site_list->StopRec = $adicional_site_list->TotalRecs;
}
$adicional_site_list->RecCnt = $adicional_site_list->StartRec - 1;
if ($adicional_site_list->Recordset && !$adicional_site_list->Recordset->EOF) {
	$adicional_site_list->Recordset->moveFirst();
	$selectLimit = $adicional_site_list->UseSelectLimit;
	if (!$selectLimit && $adicional_site_list->StartRec > 1)
		$adicional_site_list->Recordset->move($adicional_site_list->StartRec - 1);
} elseif (!$adicional_site->AllowAddDeleteRow && $adicional_site_list->StopRec == 0) {
	$adicional_site_list->StopRec = $adicional_site->GridAddRowCount;
}

// Initialize aggregate
$adicional_site->RowType = ROWTYPE_AGGREGATEINIT;
$adicional_site->resetAttributes();
$adicional_site_list->renderRow();
while ($adicional_site_list->RecCnt < $adicional_site_list->StopRec) {
	$adicional_site_list->RecCnt++;
	if ($adicional_site_list->RecCnt >= $adicional_site_list->StartRec) {
		$adicional_site_list->RowCnt++;

		// Set up key count
		$adicional_site_list->KeyCount = $adicional_site_list->RowIndex;

		// Init row class and style
		$adicional_site->resetAttributes();
		$adicional_site->CssClass = "";
		if ($adicional_site->isGridAdd()) {
		} else {
			$adicional_site_list->loadRowValues($adicional_site_list->Recordset); // Load row values
		}
		$adicional_site->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$adicional_site->RowAttrs = array_merge($adicional_site->RowAttrs, array('data-rowindex'=>$adicional_site_list->RowCnt, 'id'=>'r' . $adicional_site_list->RowCnt . '_adicional_site', 'data-rowtype'=>$adicional_site->RowType));

		// Render row
		$adicional_site_list->renderRow();

		// Render list options
		$adicional_site_list->renderListOptions();
?>
	<tr<?php echo $adicional_site->rowAttributes() ?>>
<?php

// Render list options (body, left)
$adicional_site_list->ListOptions->render("body", "left", $adicional_site_list->RowCnt);
?>
	<?php if ($adicional_site->id_adicional_site->Visible) { // id_adicional_site ?>
		<td data-name="id_adicional_site"<?php echo $adicional_site->id_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_list->RowCnt ?>_adicional_site_id_adicional_site" class="adicional_site_id_adicional_site">
<span<?php echo $adicional_site->id_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->id_adicional_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($adicional_site->titulo_adicional_site->Visible) { // titulo_adicional_site ?>
		<td data-name="titulo_adicional_site"<?php echo $adicional_site->titulo_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_list->RowCnt ?>_adicional_site_titulo_adicional_site" class="adicional_site_titulo_adicional_site">
<span<?php echo $adicional_site->titulo_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->titulo_adicional_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($adicional_site->imagem_adicional_site->Visible) { // imagem_adicional_site ?>
		<td data-name="imagem_adicional_site"<?php echo $adicional_site->imagem_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_list->RowCnt ?>_adicional_site_imagem_adicional_site" class="adicional_site_imagem_adicional_site">
<span<?php echo $adicional_site->imagem_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->imagem_adicional_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($adicional_site->saiba_mais_id->Visible) { // saiba_mais_id ?>
		<td data-name="saiba_mais_id"<?php echo $adicional_site->saiba_mais_id->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_list->RowCnt ?>_adicional_site_saiba_mais_id" class="adicional_site_saiba_mais_id">
<span<?php echo $adicional_site->saiba_mais_id->viewAttributes() ?>>
<?php echo $adicional_site->saiba_mais_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($adicional_site->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $adicional_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_list->RowCnt ?>_adicional_site_usuario_id" class="adicional_site_usuario_id">
<span<?php echo $adicional_site->usuario_id->viewAttributes() ?>>
<?php echo $adicional_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($adicional_site->data_atualizacao_adicional_site->Visible) { // data_atualizacao_adicional_site ?>
		<td data-name="data_atualizacao_adicional_site"<?php echo $adicional_site->data_atualizacao_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_list->RowCnt ?>_adicional_site_data_atualizacao_adicional_site" class="adicional_site_data_atualizacao_adicional_site">
<span<?php echo $adicional_site->data_atualizacao_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->data_atualizacao_adicional_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($adicional_site->bool_ativo_adicional_site->Visible) { // bool_ativo_adicional_site ?>
		<td data-name="bool_ativo_adicional_site"<?php echo $adicional_site->bool_ativo_adicional_site->cellAttributes() ?>>
<span id="el<?php echo $adicional_site_list->RowCnt ?>_adicional_site_bool_ativo_adicional_site" class="adicional_site_bool_ativo_adicional_site">
<span<?php echo $adicional_site->bool_ativo_adicional_site->viewAttributes() ?>>
<?php echo $adicional_site->bool_ativo_adicional_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$adicional_site_list->ListOptions->render("body", "right", $adicional_site_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$adicional_site->isGridAdd())
		$adicional_site_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$adicional_site->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($adicional_site_list->Recordset)
	$adicional_site_list->Recordset->Close();
?>
<?php if (!$adicional_site->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$adicional_site->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($adicional_site_list->Pager)) $adicional_site_list->Pager = new PrevNextPager($adicional_site_list->StartRec, $adicional_site_list->DisplayRecs, $adicional_site_list->TotalRecs, $adicional_site_list->AutoHidePager) ?>
<?php if ($adicional_site_list->Pager->RecordCount > 0 && $adicional_site_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($adicional_site_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $adicional_site_list->pageUrl() ?>start=<?php echo $adicional_site_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($adicional_site_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $adicional_site_list->pageUrl() ?>start=<?php echo $adicional_site_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $adicional_site_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($adicional_site_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $adicional_site_list->pageUrl() ?>start=<?php echo $adicional_site_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($adicional_site_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $adicional_site_list->pageUrl() ?>start=<?php echo $adicional_site_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $adicional_site_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($adicional_site_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $adicional_site_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $adicional_site_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $adicional_site_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($adicional_site_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($adicional_site_list->TotalRecs == 0 && !$adicional_site->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($adicional_site_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$adicional_site_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$adicional_site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$adicional_site_list->terminate();
?>
