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
$destaque_grupo_list = new destaque_grupo_list();

// Run the page
$destaque_grupo_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$destaque_grupo_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$destaque_grupo->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fdestaque_grupolist = currentForm = new ew.Form("fdestaque_grupolist", "list");
fdestaque_grupolist.formKeyCountName = '<?php echo $destaque_grupo_list->FormKeyCountName ?>';

// Form_CustomValidate event
fdestaque_grupolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdestaque_grupolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fdestaque_grupolistsrch = currentSearchForm = new ew.Form("fdestaque_grupolistsrch");

// Filters
fdestaque_grupolistsrch.filterList = <?php echo $destaque_grupo_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$destaque_grupo->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($destaque_grupo_list->TotalRecs > 0 && $destaque_grupo_list->ExportOptions->visible()) { ?>
<?php $destaque_grupo_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($destaque_grupo_list->ImportOptions->visible()) { ?>
<?php $destaque_grupo_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($destaque_grupo_list->SearchOptions->visible()) { ?>
<?php $destaque_grupo_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($destaque_grupo_list->FilterOptions->visible()) { ?>
<?php $destaque_grupo_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$destaque_grupo_list->renderOtherOptions();
?>
<?php if (!$destaque_grupo->isExport() && !$destaque_grupo->CurrentAction) { ?>
<form name="fdestaque_grupolistsrch" id="fdestaque_grupolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($destaque_grupo_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fdestaque_grupolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="destaque_grupo">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($destaque_grupo_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($destaque_grupo_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $destaque_grupo_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($destaque_grupo_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($destaque_grupo_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($destaque_grupo_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($destaque_grupo_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $destaque_grupo_list->showPageHeader(); ?>
<?php
$destaque_grupo_list->showMessage();
?>
<?php if ($destaque_grupo_list->TotalRecs > 0 || $destaque_grupo->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($destaque_grupo_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> destaque_grupo">
<form name="fdestaque_grupolist" id="fdestaque_grupolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($destaque_grupo_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $destaque_grupo_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="destaque_grupo">
<div id="gmp_destaque_grupo" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($destaque_grupo_list->TotalRecs > 0 || $destaque_grupo->isGridEdit()) { ?>
<table id="tbl_destaque_grupolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$destaque_grupo_list->RowType = ROWTYPE_HEADER;

// Render list options
$destaque_grupo_list->renderListOptions();

// Render list options (header, left)
$destaque_grupo_list->ListOptions->render("header", "left");
?>
<?php if ($destaque_grupo->id_destaque_grupo->Visible) { // id_destaque_grupo ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->id_destaque_grupo) == "") { ?>
		<th data-name="id_destaque_grupo" class="<?php echo $destaque_grupo->id_destaque_grupo->headerCellClass() ?>"><div id="elh_destaque_grupo_id_destaque_grupo" class="destaque_grupo_id_destaque_grupo"><div class="ew-table-header-caption"><?php echo $destaque_grupo->id_destaque_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_destaque_grupo" class="<?php echo $destaque_grupo->id_destaque_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->id_destaque_grupo) ?>',1);"><div id="elh_destaque_grupo_id_destaque_grupo" class="destaque_grupo_id_destaque_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->id_destaque_grupo->caption() ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->id_destaque_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->id_destaque_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($destaque_grupo->titulo_destaque_grupo->Visible) { // titulo_destaque_grupo ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->titulo_destaque_grupo) == "") { ?>
		<th data-name="titulo_destaque_grupo" class="<?php echo $destaque_grupo->titulo_destaque_grupo->headerCellClass() ?>"><div id="elh_destaque_grupo_titulo_destaque_grupo" class="destaque_grupo_titulo_destaque_grupo"><div class="ew-table-header-caption"><?php echo $destaque_grupo->titulo_destaque_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_destaque_grupo" class="<?php echo $destaque_grupo->titulo_destaque_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->titulo_destaque_grupo) ?>',1);"><div id="elh_destaque_grupo_titulo_destaque_grupo" class="destaque_grupo_titulo_destaque_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->titulo_destaque_grupo->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->titulo_destaque_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->titulo_destaque_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($destaque_grupo->grupo_id->Visible) { // grupo_id ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->grupo_id) == "") { ?>
		<th data-name="grupo_id" class="<?php echo $destaque_grupo->grupo_id->headerCellClass() ?>"><div id="elh_destaque_grupo_grupo_id" class="destaque_grupo_grupo_id"><div class="ew-table-header-caption"><?php echo $destaque_grupo->grupo_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grupo_id" class="<?php echo $destaque_grupo->grupo_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->grupo_id) ?>',1);"><div id="elh_destaque_grupo_grupo_id" class="destaque_grupo_grupo_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->grupo_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->grupo_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->grupo_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($destaque_grupo->imagem_destaque_grupo->Visible) { // imagem_destaque_grupo ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->imagem_destaque_grupo) == "") { ?>
		<th data-name="imagem_destaque_grupo" class="<?php echo $destaque_grupo->imagem_destaque_grupo->headerCellClass() ?>"><div id="elh_destaque_grupo_imagem_destaque_grupo" class="destaque_grupo_imagem_destaque_grupo"><div class="ew-table-header-caption"><?php echo $destaque_grupo->imagem_destaque_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_destaque_grupo" class="<?php echo $destaque_grupo->imagem_destaque_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->imagem_destaque_grupo) ?>',1);"><div id="elh_destaque_grupo_imagem_destaque_grupo" class="destaque_grupo_imagem_destaque_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->imagem_destaque_grupo->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->imagem_destaque_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->imagem_destaque_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($destaque_grupo->configurar_site_id->Visible) { // configurar_site_id ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->configurar_site_id) == "") { ?>
		<th data-name="configurar_site_id" class="<?php echo $destaque_grupo->configurar_site_id->headerCellClass() ?>"><div id="elh_destaque_grupo_configurar_site_id" class="destaque_grupo_configurar_site_id"><div class="ew-table-header-caption"><?php echo $destaque_grupo->configurar_site_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="configurar_site_id" class="<?php echo $destaque_grupo->configurar_site_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->configurar_site_id) ?>',1);"><div id="elh_destaque_grupo_configurar_site_id" class="destaque_grupo_configurar_site_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->configurar_site_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->configurar_site_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->configurar_site_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($destaque_grupo->data_atualizacao_destaque_grupo->Visible) { // data_atualizacao_destaque_grupo ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->data_atualizacao_destaque_grupo) == "") { ?>
		<th data-name="data_atualizacao_destaque_grupo" class="<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->headerCellClass() ?>"><div id="elh_destaque_grupo_data_atualizacao_destaque_grupo" class="destaque_grupo_data_atualizacao_destaque_grupo"><div class="ew-table-header-caption"><?php echo $destaque_grupo->data_atualizacao_destaque_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_destaque_grupo" class="<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->data_atualizacao_destaque_grupo) ?>',1);"><div id="elh_destaque_grupo_data_atualizacao_destaque_grupo" class="destaque_grupo_data_atualizacao_destaque_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->data_atualizacao_destaque_grupo->caption() ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->data_atualizacao_destaque_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->data_atualizacao_destaque_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($destaque_grupo->usuario_id->Visible) { // usuario_id ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $destaque_grupo->usuario_id->headerCellClass() ?>"><div id="elh_destaque_grupo_usuario_id" class="destaque_grupo_usuario_id"><div class="ew-table-header-caption"><?php echo $destaque_grupo->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $destaque_grupo->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->usuario_id) ?>',1);"><div id="elh_destaque_grupo_usuario_id" class="destaque_grupo_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($destaque_grupo->bool_ativo_destaque_grupo->Visible) { // bool_ativo_destaque_grupo ?>
	<?php if ($destaque_grupo->sortUrl($destaque_grupo->bool_ativo_destaque_grupo) == "") { ?>
		<th data-name="bool_ativo_destaque_grupo" class="<?php echo $destaque_grupo->bool_ativo_destaque_grupo->headerCellClass() ?>"><div id="elh_destaque_grupo_bool_ativo_destaque_grupo" class="destaque_grupo_bool_ativo_destaque_grupo"><div class="ew-table-header-caption"><?php echo $destaque_grupo->bool_ativo_destaque_grupo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_destaque_grupo" class="<?php echo $destaque_grupo->bool_ativo_destaque_grupo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $destaque_grupo->SortUrl($destaque_grupo->bool_ativo_destaque_grupo) ?>',1);"><div id="elh_destaque_grupo_bool_ativo_destaque_grupo" class="destaque_grupo_bool_ativo_destaque_grupo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $destaque_grupo->bool_ativo_destaque_grupo->caption() ?></span><span class="ew-table-header-sort"><?php if ($destaque_grupo->bool_ativo_destaque_grupo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($destaque_grupo->bool_ativo_destaque_grupo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$destaque_grupo_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($destaque_grupo->ExportAll && $destaque_grupo->isExport()) {
	$destaque_grupo_list->StopRec = $destaque_grupo_list->TotalRecs;
} else {

	// Set the last record to display
	if ($destaque_grupo_list->TotalRecs > $destaque_grupo_list->StartRec + $destaque_grupo_list->DisplayRecs - 1)
		$destaque_grupo_list->StopRec = $destaque_grupo_list->StartRec + $destaque_grupo_list->DisplayRecs - 1;
	else
		$destaque_grupo_list->StopRec = $destaque_grupo_list->TotalRecs;
}
$destaque_grupo_list->RecCnt = $destaque_grupo_list->StartRec - 1;
if ($destaque_grupo_list->Recordset && !$destaque_grupo_list->Recordset->EOF) {
	$destaque_grupo_list->Recordset->moveFirst();
	$selectLimit = $destaque_grupo_list->UseSelectLimit;
	if (!$selectLimit && $destaque_grupo_list->StartRec > 1)
		$destaque_grupo_list->Recordset->move($destaque_grupo_list->StartRec - 1);
} elseif (!$destaque_grupo->AllowAddDeleteRow && $destaque_grupo_list->StopRec == 0) {
	$destaque_grupo_list->StopRec = $destaque_grupo->GridAddRowCount;
}

// Initialize aggregate
$destaque_grupo->RowType = ROWTYPE_AGGREGATEINIT;
$destaque_grupo->resetAttributes();
$destaque_grupo_list->renderRow();
while ($destaque_grupo_list->RecCnt < $destaque_grupo_list->StopRec) {
	$destaque_grupo_list->RecCnt++;
	if ($destaque_grupo_list->RecCnt >= $destaque_grupo_list->StartRec) {
		$destaque_grupo_list->RowCnt++;

		// Set up key count
		$destaque_grupo_list->KeyCount = $destaque_grupo_list->RowIndex;

		// Init row class and style
		$destaque_grupo->resetAttributes();
		$destaque_grupo->CssClass = "";
		if ($destaque_grupo->isGridAdd()) {
		} else {
			$destaque_grupo_list->loadRowValues($destaque_grupo_list->Recordset); // Load row values
		}
		$destaque_grupo->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$destaque_grupo->RowAttrs = array_merge($destaque_grupo->RowAttrs, array('data-rowindex'=>$destaque_grupo_list->RowCnt, 'id'=>'r' . $destaque_grupo_list->RowCnt . '_destaque_grupo', 'data-rowtype'=>$destaque_grupo->RowType));

		// Render row
		$destaque_grupo_list->renderRow();

		// Render list options
		$destaque_grupo_list->renderListOptions();
?>
	<tr<?php echo $destaque_grupo->rowAttributes() ?>>
<?php

// Render list options (body, left)
$destaque_grupo_list->ListOptions->render("body", "left", $destaque_grupo_list->RowCnt);
?>
	<?php if ($destaque_grupo->id_destaque_grupo->Visible) { // id_destaque_grupo ?>
		<td data-name="id_destaque_grupo"<?php echo $destaque_grupo->id_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_id_destaque_grupo" class="destaque_grupo_id_destaque_grupo">
<span<?php echo $destaque_grupo->id_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->id_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($destaque_grupo->titulo_destaque_grupo->Visible) { // titulo_destaque_grupo ?>
		<td data-name="titulo_destaque_grupo"<?php echo $destaque_grupo->titulo_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_titulo_destaque_grupo" class="destaque_grupo_titulo_destaque_grupo">
<span<?php echo $destaque_grupo->titulo_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->titulo_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($destaque_grupo->grupo_id->Visible) { // grupo_id ?>
		<td data-name="grupo_id"<?php echo $destaque_grupo->grupo_id->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_grupo_id" class="destaque_grupo_grupo_id">
<span<?php echo $destaque_grupo->grupo_id->viewAttributes() ?>>
<?php echo $destaque_grupo->grupo_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($destaque_grupo->imagem_destaque_grupo->Visible) { // imagem_destaque_grupo ?>
		<td data-name="imagem_destaque_grupo"<?php echo $destaque_grupo->imagem_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_imagem_destaque_grupo" class="destaque_grupo_imagem_destaque_grupo">
<span<?php echo $destaque_grupo->imagem_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->imagem_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($destaque_grupo->configurar_site_id->Visible) { // configurar_site_id ?>
		<td data-name="configurar_site_id"<?php echo $destaque_grupo->configurar_site_id->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_configurar_site_id" class="destaque_grupo_configurar_site_id">
<span<?php echo $destaque_grupo->configurar_site_id->viewAttributes() ?>>
<?php echo $destaque_grupo->configurar_site_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($destaque_grupo->data_atualizacao_destaque_grupo->Visible) { // data_atualizacao_destaque_grupo ?>
		<td data-name="data_atualizacao_destaque_grupo"<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_data_atualizacao_destaque_grupo" class="destaque_grupo_data_atualizacao_destaque_grupo">
<span<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->data_atualizacao_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($destaque_grupo->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $destaque_grupo->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_usuario_id" class="destaque_grupo_usuario_id">
<span<?php echo $destaque_grupo->usuario_id->viewAttributes() ?>>
<?php echo $destaque_grupo->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($destaque_grupo->bool_ativo_destaque_grupo->Visible) { // bool_ativo_destaque_grupo ?>
		<td data-name="bool_ativo_destaque_grupo"<?php echo $destaque_grupo->bool_ativo_destaque_grupo->cellAttributes() ?>>
<span id="el<?php echo $destaque_grupo_list->RowCnt ?>_destaque_grupo_bool_ativo_destaque_grupo" class="destaque_grupo_bool_ativo_destaque_grupo">
<span<?php echo $destaque_grupo->bool_ativo_destaque_grupo->viewAttributes() ?>>
<?php echo $destaque_grupo->bool_ativo_destaque_grupo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$destaque_grupo_list->ListOptions->render("body", "right", $destaque_grupo_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$destaque_grupo->isGridAdd())
		$destaque_grupo_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$destaque_grupo->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($destaque_grupo_list->Recordset)
	$destaque_grupo_list->Recordset->Close();
?>
<?php if (!$destaque_grupo->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$destaque_grupo->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($destaque_grupo_list->Pager)) $destaque_grupo_list->Pager = new PrevNextPager($destaque_grupo_list->StartRec, $destaque_grupo_list->DisplayRecs, $destaque_grupo_list->TotalRecs, $destaque_grupo_list->AutoHidePager) ?>
<?php if ($destaque_grupo_list->Pager->RecordCount > 0 && $destaque_grupo_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($destaque_grupo_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $destaque_grupo_list->pageUrl() ?>start=<?php echo $destaque_grupo_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($destaque_grupo_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $destaque_grupo_list->pageUrl() ?>start=<?php echo $destaque_grupo_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $destaque_grupo_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($destaque_grupo_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $destaque_grupo_list->pageUrl() ?>start=<?php echo $destaque_grupo_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($destaque_grupo_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $destaque_grupo_list->pageUrl() ?>start=<?php echo $destaque_grupo_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $destaque_grupo_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($destaque_grupo_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $destaque_grupo_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $destaque_grupo_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $destaque_grupo_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($destaque_grupo_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($destaque_grupo_list->TotalRecs == 0 && !$destaque_grupo->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($destaque_grupo_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$destaque_grupo_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$destaque_grupo->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$destaque_grupo_list->terminate();
?>
