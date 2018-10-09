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
$relatorios_list = new relatorios_list();

// Run the page
$relatorios_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$relatorios_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$relatorios->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var frelatorioslist = currentForm = new ew.Form("frelatorioslist", "list");
frelatorioslist.formKeyCountName = '<?php echo $relatorios_list->FormKeyCountName ?>';

// Form_CustomValidate event
frelatorioslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frelatorioslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var frelatorioslistsrch = currentSearchForm = new ew.Form("frelatorioslistsrch");

// Filters
frelatorioslistsrch.filterList = <?php echo $relatorios_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$relatorios->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($relatorios_list->TotalRecs > 0 && $relatorios_list->ExportOptions->visible()) { ?>
<?php $relatorios_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($relatorios_list->ImportOptions->visible()) { ?>
<?php $relatorios_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($relatorios_list->SearchOptions->visible()) { ?>
<?php $relatorios_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($relatorios_list->FilterOptions->visible()) { ?>
<?php $relatorios_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$relatorios_list->renderOtherOptions();
?>
<?php if (!$relatorios->isExport() && !$relatorios->CurrentAction) { ?>
<form name="frelatorioslistsrch" id="frelatorioslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($relatorios_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="frelatorioslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="relatorios">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($relatorios_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($relatorios_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $relatorios_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($relatorios_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($relatorios_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($relatorios_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($relatorios_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $relatorios_list->showPageHeader(); ?>
<?php
$relatorios_list->showMessage();
?>
<?php if ($relatorios_list->TotalRecs > 0 || $relatorios->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($relatorios_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> relatorios">
<form name="frelatorioslist" id="frelatorioslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($relatorios_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $relatorios_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="relatorios">
<div id="gmp_relatorios" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($relatorios_list->TotalRecs > 0 || $relatorios->isGridEdit()) { ?>
<table id="tbl_relatorioslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$relatorios_list->RowType = ROWTYPE_HEADER;

// Render list options
$relatorios_list->renderListOptions();

// Render list options (header, left)
$relatorios_list->ListOptions->render("header", "left");
?>
<?php if ($relatorios->id_relatorios->Visible) { // id_relatorios ?>
	<?php if ($relatorios->sortUrl($relatorios->id_relatorios) == "") { ?>
		<th data-name="id_relatorios" class="<?php echo $relatorios->id_relatorios->headerCellClass() ?>"><div id="elh_relatorios_id_relatorios" class="relatorios_id_relatorios"><div class="ew-table-header-caption"><?php echo $relatorios->id_relatorios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_relatorios" class="<?php echo $relatorios->id_relatorios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->id_relatorios) ?>',1);"><div id="elh_relatorios_id_relatorios" class="relatorios_id_relatorios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->id_relatorios->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorios->id_relatorios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->id_relatorios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorios->descricao_relatorios->Visible) { // descricao_relatorios ?>
	<?php if ($relatorios->sortUrl($relatorios->descricao_relatorios) == "") { ?>
		<th data-name="descricao_relatorios" class="<?php echo $relatorios->descricao_relatorios->headerCellClass() ?>"><div id="elh_relatorios_descricao_relatorios" class="relatorios_descricao_relatorios"><div class="ew-table-header-caption"><?php echo $relatorios->descricao_relatorios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_relatorios" class="<?php echo $relatorios->descricao_relatorios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->descricao_relatorios) ?>',1);"><div id="elh_relatorios_descricao_relatorios" class="relatorios_descricao_relatorios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->descricao_relatorios->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($relatorios->descricao_relatorios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->descricao_relatorios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorios->tabela_relatorios->Visible) { // tabela_relatorios ?>
	<?php if ($relatorios->sortUrl($relatorios->tabela_relatorios) == "") { ?>
		<th data-name="tabela_relatorios" class="<?php echo $relatorios->tabela_relatorios->headerCellClass() ?>"><div id="elh_relatorios_tabela_relatorios" class="relatorios_tabela_relatorios"><div class="ew-table-header-caption"><?php echo $relatorios->tabela_relatorios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tabela_relatorios" class="<?php echo $relatorios->tabela_relatorios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->tabela_relatorios) ?>',1);"><div id="elh_relatorios_tabela_relatorios" class="relatorios_tabela_relatorios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->tabela_relatorios->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($relatorios->tabela_relatorios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->tabela_relatorios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorios->bool_filtro_ativo_relatorios->Visible) { // bool_filtro_ativo_relatorios ?>
	<?php if ($relatorios->sortUrl($relatorios->bool_filtro_ativo_relatorios) == "") { ?>
		<th data-name="bool_filtro_ativo_relatorios" class="<?php echo $relatorios->bool_filtro_ativo_relatorios->headerCellClass() ?>"><div id="elh_relatorios_bool_filtro_ativo_relatorios" class="relatorios_bool_filtro_ativo_relatorios"><div class="ew-table-header-caption"><?php echo $relatorios->bool_filtro_ativo_relatorios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_filtro_ativo_relatorios" class="<?php echo $relatorios->bool_filtro_ativo_relatorios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->bool_filtro_ativo_relatorios) ?>',1);"><div id="elh_relatorios_bool_filtro_ativo_relatorios" class="relatorios_bool_filtro_ativo_relatorios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->bool_filtro_ativo_relatorios->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorios->bool_filtro_ativo_relatorios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->bool_filtro_ativo_relatorios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorios->data_atualizacao_relatorios->Visible) { // data_atualizacao_relatorios ?>
	<?php if ($relatorios->sortUrl($relatorios->data_atualizacao_relatorios) == "") { ?>
		<th data-name="data_atualizacao_relatorios" class="<?php echo $relatorios->data_atualizacao_relatorios->headerCellClass() ?>"><div id="elh_relatorios_data_atualizacao_relatorios" class="relatorios_data_atualizacao_relatorios"><div class="ew-table-header-caption"><?php echo $relatorios->data_atualizacao_relatorios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_relatorios" class="<?php echo $relatorios->data_atualizacao_relatorios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->data_atualizacao_relatorios) ?>',1);"><div id="elh_relatorios_data_atualizacao_relatorios" class="relatorios_data_atualizacao_relatorios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->data_atualizacao_relatorios->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorios->data_atualizacao_relatorios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->data_atualizacao_relatorios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorios->usuario_id->Visible) { // usuario_id ?>
	<?php if ($relatorios->sortUrl($relatorios->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $relatorios->usuario_id->headerCellClass() ?>"><div id="elh_relatorios_usuario_id" class="relatorios_usuario_id"><div class="ew-table-header-caption"><?php echo $relatorios->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $relatorios->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->usuario_id) ?>',1);"><div id="elh_relatorios_usuario_id" class="relatorios_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorios->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorios->bool_emitir_relatorios->Visible) { // bool_emitir_relatorios ?>
	<?php if ($relatorios->sortUrl($relatorios->bool_emitir_relatorios) == "") { ?>
		<th data-name="bool_emitir_relatorios" class="<?php echo $relatorios->bool_emitir_relatorios->headerCellClass() ?>"><div id="elh_relatorios_bool_emitir_relatorios" class="relatorios_bool_emitir_relatorios"><div class="ew-table-header-caption"><?php echo $relatorios->bool_emitir_relatorios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_emitir_relatorios" class="<?php echo $relatorios->bool_emitir_relatorios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->bool_emitir_relatorios) ?>',1);"><div id="elh_relatorios_bool_emitir_relatorios" class="relatorios_bool_emitir_relatorios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->bool_emitir_relatorios->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorios->bool_emitir_relatorios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->bool_emitir_relatorios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($relatorios->bool_ativo_relatorios->Visible) { // bool_ativo_relatorios ?>
	<?php if ($relatorios->sortUrl($relatorios->bool_ativo_relatorios) == "") { ?>
		<th data-name="bool_ativo_relatorios" class="<?php echo $relatorios->bool_ativo_relatorios->headerCellClass() ?>"><div id="elh_relatorios_bool_ativo_relatorios" class="relatorios_bool_ativo_relatorios"><div class="ew-table-header-caption"><?php echo $relatorios->bool_ativo_relatorios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_relatorios" class="<?php echo $relatorios->bool_ativo_relatorios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $relatorios->SortUrl($relatorios->bool_ativo_relatorios) ?>',1);"><div id="elh_relatorios_bool_ativo_relatorios" class="relatorios_bool_ativo_relatorios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $relatorios->bool_ativo_relatorios->caption() ?></span><span class="ew-table-header-sort"><?php if ($relatorios->bool_ativo_relatorios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($relatorios->bool_ativo_relatorios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$relatorios_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($relatorios->ExportAll && $relatorios->isExport()) {
	$relatorios_list->StopRec = $relatorios_list->TotalRecs;
} else {

	// Set the last record to display
	if ($relatorios_list->TotalRecs > $relatorios_list->StartRec + $relatorios_list->DisplayRecs - 1)
		$relatorios_list->StopRec = $relatorios_list->StartRec + $relatorios_list->DisplayRecs - 1;
	else
		$relatorios_list->StopRec = $relatorios_list->TotalRecs;
}
$relatorios_list->RecCnt = $relatorios_list->StartRec - 1;
if ($relatorios_list->Recordset && !$relatorios_list->Recordset->EOF) {
	$relatorios_list->Recordset->moveFirst();
	$selectLimit = $relatorios_list->UseSelectLimit;
	if (!$selectLimit && $relatorios_list->StartRec > 1)
		$relatorios_list->Recordset->move($relatorios_list->StartRec - 1);
} elseif (!$relatorios->AllowAddDeleteRow && $relatorios_list->StopRec == 0) {
	$relatorios_list->StopRec = $relatorios->GridAddRowCount;
}

// Initialize aggregate
$relatorios->RowType = ROWTYPE_AGGREGATEINIT;
$relatorios->resetAttributes();
$relatorios_list->renderRow();
while ($relatorios_list->RecCnt < $relatorios_list->StopRec) {
	$relatorios_list->RecCnt++;
	if ($relatorios_list->RecCnt >= $relatorios_list->StartRec) {
		$relatorios_list->RowCnt++;

		// Set up key count
		$relatorios_list->KeyCount = $relatorios_list->RowIndex;

		// Init row class and style
		$relatorios->resetAttributes();
		$relatorios->CssClass = "";
		if ($relatorios->isGridAdd()) {
		} else {
			$relatorios_list->loadRowValues($relatorios_list->Recordset); // Load row values
		}
		$relatorios->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$relatorios->RowAttrs = array_merge($relatorios->RowAttrs, array('data-rowindex'=>$relatorios_list->RowCnt, 'id'=>'r' . $relatorios_list->RowCnt . '_relatorios', 'data-rowtype'=>$relatorios->RowType));

		// Render row
		$relatorios_list->renderRow();

		// Render list options
		$relatorios_list->renderListOptions();
?>
	<tr<?php echo $relatorios->rowAttributes() ?>>
<?php

// Render list options (body, left)
$relatorios_list->ListOptions->render("body", "left", $relatorios_list->RowCnt);
?>
	<?php if ($relatorios->id_relatorios->Visible) { // id_relatorios ?>
		<td data-name="id_relatorios"<?php echo $relatorios->id_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_id_relatorios" class="relatorios_id_relatorios">
<span<?php echo $relatorios->id_relatorios->viewAttributes() ?>>
<?php echo $relatorios->id_relatorios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorios->descricao_relatorios->Visible) { // descricao_relatorios ?>
		<td data-name="descricao_relatorios"<?php echo $relatorios->descricao_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_descricao_relatorios" class="relatorios_descricao_relatorios">
<span<?php echo $relatorios->descricao_relatorios->viewAttributes() ?>>
<?php echo $relatorios->descricao_relatorios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorios->tabela_relatorios->Visible) { // tabela_relatorios ?>
		<td data-name="tabela_relatorios"<?php echo $relatorios->tabela_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_tabela_relatorios" class="relatorios_tabela_relatorios">
<span<?php echo $relatorios->tabela_relatorios->viewAttributes() ?>>
<?php echo $relatorios->tabela_relatorios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorios->bool_filtro_ativo_relatorios->Visible) { // bool_filtro_ativo_relatorios ?>
		<td data-name="bool_filtro_ativo_relatorios"<?php echo $relatorios->bool_filtro_ativo_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_bool_filtro_ativo_relatorios" class="relatorios_bool_filtro_ativo_relatorios">
<span<?php echo $relatorios->bool_filtro_ativo_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_filtro_ativo_relatorios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorios->data_atualizacao_relatorios->Visible) { // data_atualizacao_relatorios ?>
		<td data-name="data_atualizacao_relatorios"<?php echo $relatorios->data_atualizacao_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_data_atualizacao_relatorios" class="relatorios_data_atualizacao_relatorios">
<span<?php echo $relatorios->data_atualizacao_relatorios->viewAttributes() ?>>
<?php echo $relatorios->data_atualizacao_relatorios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorios->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $relatorios->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_usuario_id" class="relatorios_usuario_id">
<span<?php echo $relatorios->usuario_id->viewAttributes() ?>>
<?php echo $relatorios->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorios->bool_emitir_relatorios->Visible) { // bool_emitir_relatorios ?>
		<td data-name="bool_emitir_relatorios"<?php echo $relatorios->bool_emitir_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_bool_emitir_relatorios" class="relatorios_bool_emitir_relatorios">
<span<?php echo $relatorios->bool_emitir_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_emitir_relatorios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($relatorios->bool_ativo_relatorios->Visible) { // bool_ativo_relatorios ?>
		<td data-name="bool_ativo_relatorios"<?php echo $relatorios->bool_ativo_relatorios->cellAttributes() ?>>
<span id="el<?php echo $relatorios_list->RowCnt ?>_relatorios_bool_ativo_relatorios" class="relatorios_bool_ativo_relatorios">
<span<?php echo $relatorios->bool_ativo_relatorios->viewAttributes() ?>>
<?php echo $relatorios->bool_ativo_relatorios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$relatorios_list->ListOptions->render("body", "right", $relatorios_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$relatorios->isGridAdd())
		$relatorios_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$relatorios->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($relatorios_list->Recordset)
	$relatorios_list->Recordset->Close();
?>
<?php if (!$relatorios->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$relatorios->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($relatorios_list->Pager)) $relatorios_list->Pager = new PrevNextPager($relatorios_list->StartRec, $relatorios_list->DisplayRecs, $relatorios_list->TotalRecs, $relatorios_list->AutoHidePager) ?>
<?php if ($relatorios_list->Pager->RecordCount > 0 && $relatorios_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($relatorios_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $relatorios_list->pageUrl() ?>start=<?php echo $relatorios_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($relatorios_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $relatorios_list->pageUrl() ?>start=<?php echo $relatorios_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $relatorios_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($relatorios_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $relatorios_list->pageUrl() ?>start=<?php echo $relatorios_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($relatorios_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $relatorios_list->pageUrl() ?>start=<?php echo $relatorios_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $relatorios_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($relatorios_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $relatorios_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $relatorios_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $relatorios_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($relatorios_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($relatorios_list->TotalRecs == 0 && !$relatorios->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($relatorios_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$relatorios_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$relatorios->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$relatorios_list->terminate();
?>
