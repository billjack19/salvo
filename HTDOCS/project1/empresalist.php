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
$empresa_list = new empresa_list();

// Run the page
$empresa_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$empresa_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$empresa->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fempresalist = currentForm = new ew.Form("fempresalist", "list");
fempresalist.formKeyCountName = '<?php echo $empresa_list->FormKeyCountName ?>';

// Form_CustomValidate event
fempresalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fempresalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fempresalistsrch = currentSearchForm = new ew.Form("fempresalistsrch");

// Filters
fempresalistsrch.filterList = <?php echo $empresa_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$empresa->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($empresa_list->TotalRecs > 0 && $empresa_list->ExportOptions->visible()) { ?>
<?php $empresa_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($empresa_list->ImportOptions->visible()) { ?>
<?php $empresa_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($empresa_list->SearchOptions->visible()) { ?>
<?php $empresa_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($empresa_list->FilterOptions->visible()) { ?>
<?php $empresa_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$empresa_list->renderOtherOptions();
?>
<?php if (!$empresa->isExport() && !$empresa->CurrentAction) { ?>
<form name="fempresalistsrch" id="fempresalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($empresa_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fempresalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="empresa">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($empresa_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($empresa_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $empresa_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($empresa_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($empresa_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($empresa_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($empresa_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $empresa_list->showPageHeader(); ?>
<?php
$empresa_list->showMessage();
?>
<?php if ($empresa_list->TotalRecs > 0 || $empresa->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($empresa_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> empresa">
<form name="fempresalist" id="fempresalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($empresa_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $empresa_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="empresa">
<div id="gmp_empresa" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($empresa_list->TotalRecs > 0 || $empresa->isGridEdit()) { ?>
<table id="tbl_empresalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$empresa_list->RowType = ROWTYPE_HEADER;

// Render list options
$empresa_list->renderListOptions();

// Render list options (header, left)
$empresa_list->ListOptions->render("header", "left");
?>
<?php if ($empresa->id_empresa->Visible) { // id_empresa ?>
	<?php if ($empresa->sortUrl($empresa->id_empresa) == "") { ?>
		<th data-name="id_empresa" class="<?php echo $empresa->id_empresa->headerCellClass() ?>"><div id="elh_empresa_id_empresa" class="empresa_id_empresa"><div class="ew-table-header-caption"><?php echo $empresa->id_empresa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_empresa" class="<?php echo $empresa->id_empresa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $empresa->SortUrl($empresa->id_empresa) ?>',1);"><div id="elh_empresa_id_empresa" class="empresa_id_empresa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $empresa->id_empresa->caption() ?></span><span class="ew-table-header-sort"><?php if ($empresa->id_empresa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($empresa->id_empresa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($empresa->descricao_empresa->Visible) { // descricao_empresa ?>
	<?php if ($empresa->sortUrl($empresa->descricao_empresa) == "") { ?>
		<th data-name="descricao_empresa" class="<?php echo $empresa->descricao_empresa->headerCellClass() ?>"><div id="elh_empresa_descricao_empresa" class="empresa_descricao_empresa"><div class="ew-table-header-caption"><?php echo $empresa->descricao_empresa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_empresa" class="<?php echo $empresa->descricao_empresa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $empresa->SortUrl($empresa->descricao_empresa) ?>',1);"><div id="elh_empresa_descricao_empresa" class="empresa_descricao_empresa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $empresa->descricao_empresa->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($empresa->descricao_empresa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($empresa->descricao_empresa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($empresa->imagem_logo_empresa->Visible) { // imagem_logo_empresa ?>
	<?php if ($empresa->sortUrl($empresa->imagem_logo_empresa) == "") { ?>
		<th data-name="imagem_logo_empresa" class="<?php echo $empresa->imagem_logo_empresa->headerCellClass() ?>"><div id="elh_empresa_imagem_logo_empresa" class="empresa_imagem_logo_empresa"><div class="ew-table-header-caption"><?php echo $empresa->imagem_logo_empresa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_logo_empresa" class="<?php echo $empresa->imagem_logo_empresa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $empresa->SortUrl($empresa->imagem_logo_empresa) ?>',1);"><div id="elh_empresa_imagem_logo_empresa" class="empresa_imagem_logo_empresa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $empresa->imagem_logo_empresa->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($empresa->imagem_logo_empresa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($empresa->imagem_logo_empresa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($empresa->data_atualizacao_empresa->Visible) { // data_atualizacao_empresa ?>
	<?php if ($empresa->sortUrl($empresa->data_atualizacao_empresa) == "") { ?>
		<th data-name="data_atualizacao_empresa" class="<?php echo $empresa->data_atualizacao_empresa->headerCellClass() ?>"><div id="elh_empresa_data_atualizacao_empresa" class="empresa_data_atualizacao_empresa"><div class="ew-table-header-caption"><?php echo $empresa->data_atualizacao_empresa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_empresa" class="<?php echo $empresa->data_atualizacao_empresa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $empresa->SortUrl($empresa->data_atualizacao_empresa) ?>',1);"><div id="elh_empresa_data_atualizacao_empresa" class="empresa_data_atualizacao_empresa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $empresa->data_atualizacao_empresa->caption() ?></span><span class="ew-table-header-sort"><?php if ($empresa->data_atualizacao_empresa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($empresa->data_atualizacao_empresa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($empresa->usuario_id->Visible) { // usuario_id ?>
	<?php if ($empresa->sortUrl($empresa->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $empresa->usuario_id->headerCellClass() ?>"><div id="elh_empresa_usuario_id" class="empresa_usuario_id"><div class="ew-table-header-caption"><?php echo $empresa->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $empresa->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $empresa->SortUrl($empresa->usuario_id) ?>',1);"><div id="elh_empresa_usuario_id" class="empresa_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $empresa->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($empresa->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($empresa->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($empresa->bool_ativo_empresa->Visible) { // bool_ativo_empresa ?>
	<?php if ($empresa->sortUrl($empresa->bool_ativo_empresa) == "") { ?>
		<th data-name="bool_ativo_empresa" class="<?php echo $empresa->bool_ativo_empresa->headerCellClass() ?>"><div id="elh_empresa_bool_ativo_empresa" class="empresa_bool_ativo_empresa"><div class="ew-table-header-caption"><?php echo $empresa->bool_ativo_empresa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_empresa" class="<?php echo $empresa->bool_ativo_empresa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $empresa->SortUrl($empresa->bool_ativo_empresa) ?>',1);"><div id="elh_empresa_bool_ativo_empresa" class="empresa_bool_ativo_empresa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $empresa->bool_ativo_empresa->caption() ?></span><span class="ew-table-header-sort"><?php if ($empresa->bool_ativo_empresa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($empresa->bool_ativo_empresa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$empresa_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($empresa->ExportAll && $empresa->isExport()) {
	$empresa_list->StopRec = $empresa_list->TotalRecs;
} else {

	// Set the last record to display
	if ($empresa_list->TotalRecs > $empresa_list->StartRec + $empresa_list->DisplayRecs - 1)
		$empresa_list->StopRec = $empresa_list->StartRec + $empresa_list->DisplayRecs - 1;
	else
		$empresa_list->StopRec = $empresa_list->TotalRecs;
}
$empresa_list->RecCnt = $empresa_list->StartRec - 1;
if ($empresa_list->Recordset && !$empresa_list->Recordset->EOF) {
	$empresa_list->Recordset->moveFirst();
	$selectLimit = $empresa_list->UseSelectLimit;
	if (!$selectLimit && $empresa_list->StartRec > 1)
		$empresa_list->Recordset->move($empresa_list->StartRec - 1);
} elseif (!$empresa->AllowAddDeleteRow && $empresa_list->StopRec == 0) {
	$empresa_list->StopRec = $empresa->GridAddRowCount;
}

// Initialize aggregate
$empresa->RowType = ROWTYPE_AGGREGATEINIT;
$empresa->resetAttributes();
$empresa_list->renderRow();
while ($empresa_list->RecCnt < $empresa_list->StopRec) {
	$empresa_list->RecCnt++;
	if ($empresa_list->RecCnt >= $empresa_list->StartRec) {
		$empresa_list->RowCnt++;

		// Set up key count
		$empresa_list->KeyCount = $empresa_list->RowIndex;

		// Init row class and style
		$empresa->resetAttributes();
		$empresa->CssClass = "";
		if ($empresa->isGridAdd()) {
		} else {
			$empresa_list->loadRowValues($empresa_list->Recordset); // Load row values
		}
		$empresa->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$empresa->RowAttrs = array_merge($empresa->RowAttrs, array('data-rowindex'=>$empresa_list->RowCnt, 'id'=>'r' . $empresa_list->RowCnt . '_empresa', 'data-rowtype'=>$empresa->RowType));

		// Render row
		$empresa_list->renderRow();

		// Render list options
		$empresa_list->renderListOptions();
?>
	<tr<?php echo $empresa->rowAttributes() ?>>
<?php

// Render list options (body, left)
$empresa_list->ListOptions->render("body", "left", $empresa_list->RowCnt);
?>
	<?php if ($empresa->id_empresa->Visible) { // id_empresa ?>
		<td data-name="id_empresa"<?php echo $empresa->id_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_list->RowCnt ?>_empresa_id_empresa" class="empresa_id_empresa">
<span<?php echo $empresa->id_empresa->viewAttributes() ?>>
<?php echo $empresa->id_empresa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($empresa->descricao_empresa->Visible) { // descricao_empresa ?>
		<td data-name="descricao_empresa"<?php echo $empresa->descricao_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_list->RowCnt ?>_empresa_descricao_empresa" class="empresa_descricao_empresa">
<span<?php echo $empresa->descricao_empresa->viewAttributes() ?>>
<?php echo $empresa->descricao_empresa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($empresa->imagem_logo_empresa->Visible) { // imagem_logo_empresa ?>
		<td data-name="imagem_logo_empresa"<?php echo $empresa->imagem_logo_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_list->RowCnt ?>_empresa_imagem_logo_empresa" class="empresa_imagem_logo_empresa">
<span<?php echo $empresa->imagem_logo_empresa->viewAttributes() ?>>
<?php echo $empresa->imagem_logo_empresa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($empresa->data_atualizacao_empresa->Visible) { // data_atualizacao_empresa ?>
		<td data-name="data_atualizacao_empresa"<?php echo $empresa->data_atualizacao_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_list->RowCnt ?>_empresa_data_atualizacao_empresa" class="empresa_data_atualizacao_empresa">
<span<?php echo $empresa->data_atualizacao_empresa->viewAttributes() ?>>
<?php echo $empresa->data_atualizacao_empresa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($empresa->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $empresa->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $empresa_list->RowCnt ?>_empresa_usuario_id" class="empresa_usuario_id">
<span<?php echo $empresa->usuario_id->viewAttributes() ?>>
<?php echo $empresa->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($empresa->bool_ativo_empresa->Visible) { // bool_ativo_empresa ?>
		<td data-name="bool_ativo_empresa"<?php echo $empresa->bool_ativo_empresa->cellAttributes() ?>>
<span id="el<?php echo $empresa_list->RowCnt ?>_empresa_bool_ativo_empresa" class="empresa_bool_ativo_empresa">
<span<?php echo $empresa->bool_ativo_empresa->viewAttributes() ?>>
<?php echo $empresa->bool_ativo_empresa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$empresa_list->ListOptions->render("body", "right", $empresa_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$empresa->isGridAdd())
		$empresa_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$empresa->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($empresa_list->Recordset)
	$empresa_list->Recordset->Close();
?>
<?php if (!$empresa->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$empresa->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($empresa_list->Pager)) $empresa_list->Pager = new PrevNextPager($empresa_list->StartRec, $empresa_list->DisplayRecs, $empresa_list->TotalRecs, $empresa_list->AutoHidePager) ?>
<?php if ($empresa_list->Pager->RecordCount > 0 && $empresa_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($empresa_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $empresa_list->pageUrl() ?>start=<?php echo $empresa_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($empresa_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $empresa_list->pageUrl() ?>start=<?php echo $empresa_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $empresa_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($empresa_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $empresa_list->pageUrl() ?>start=<?php echo $empresa_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($empresa_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $empresa_list->pageUrl() ?>start=<?php echo $empresa_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $empresa_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($empresa_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $empresa_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $empresa_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $empresa_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($empresa_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($empresa_list->TotalRecs == 0 && !$empresa->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($empresa_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$empresa_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$empresa->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$empresa_list->terminate();
?>
