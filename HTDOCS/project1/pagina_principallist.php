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
$pagina_principal_list = new pagina_principal_list();

// Run the page
$pagina_principal_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pagina_principal_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pagina_principal->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpagina_principallist = currentForm = new ew.Form("fpagina_principallist", "list");
fpagina_principallist.formKeyCountName = '<?php echo $pagina_principal_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpagina_principallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpagina_principallist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpagina_principallistsrch = currentSearchForm = new ew.Form("fpagina_principallistsrch");

// Filters
fpagina_principallistsrch.filterList = <?php echo $pagina_principal_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pagina_principal->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pagina_principal_list->TotalRecs > 0 && $pagina_principal_list->ExportOptions->visible()) { ?>
<?php $pagina_principal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pagina_principal_list->ImportOptions->visible()) { ?>
<?php $pagina_principal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pagina_principal_list->SearchOptions->visible()) { ?>
<?php $pagina_principal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pagina_principal_list->FilterOptions->visible()) { ?>
<?php $pagina_principal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pagina_principal_list->renderOtherOptions();
?>
<?php if (!$pagina_principal->isExport() && !$pagina_principal->CurrentAction) { ?>
<form name="fpagina_principallistsrch" id="fpagina_principallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pagina_principal_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpagina_principallistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pagina_principal">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pagina_principal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pagina_principal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pagina_principal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pagina_principal_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pagina_principal_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pagina_principal_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pagina_principal_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $pagina_principal_list->showPageHeader(); ?>
<?php
$pagina_principal_list->showMessage();
?>
<?php if ($pagina_principal_list->TotalRecs > 0 || $pagina_principal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pagina_principal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pagina_principal">
<form name="fpagina_principallist" id="fpagina_principallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pagina_principal_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pagina_principal_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pagina_principal">
<div id="gmp_pagina_principal" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pagina_principal_list->TotalRecs > 0 || $pagina_principal->isGridEdit()) { ?>
<table id="tbl_pagina_principallist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pagina_principal_list->RowType = ROWTYPE_HEADER;

// Render list options
$pagina_principal_list->renderListOptions();

// Render list options (header, left)
$pagina_principal_list->ListOptions->render("header", "left");
?>
<?php if ($pagina_principal->id_pagina_principal->Visible) { // id_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->id_pagina_principal) == "") { ?>
		<th data-name="id_pagina_principal" class="<?php echo $pagina_principal->id_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_id_pagina_principal" class="pagina_principal_id_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->id_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_pagina_principal" class="<?php echo $pagina_principal->id_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->id_pagina_principal) ?>',1);"><div id="elh_pagina_principal_id_pagina_principal" class="pagina_principal_id_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->id_pagina_principal->caption() ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->id_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->id_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->titulo_pagina_principal->Visible) { // titulo_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->titulo_pagina_principal) == "") { ?>
		<th data-name="titulo_pagina_principal" class="<?php echo $pagina_principal->titulo_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_titulo_pagina_principal" class="pagina_principal_titulo_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->titulo_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_pagina_principal" class="<?php echo $pagina_principal->titulo_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->titulo_pagina_principal) ?>',1);"><div id="elh_pagina_principal_titulo_pagina_principal" class="pagina_principal_titulo_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->titulo_pagina_principal->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->titulo_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->titulo_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->titulo_menu_pagina_principal->Visible) { // titulo_menu_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->titulo_menu_pagina_principal) == "") { ?>
		<th data-name="titulo_menu_pagina_principal" class="<?php echo $pagina_principal->titulo_menu_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_titulo_menu_pagina_principal" class="pagina_principal_titulo_menu_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->titulo_menu_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_menu_pagina_principal" class="<?php echo $pagina_principal->titulo_menu_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->titulo_menu_pagina_principal) ?>',1);"><div id="elh_pagina_principal_titulo_menu_pagina_principal" class="pagina_principal_titulo_menu_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->titulo_menu_pagina_principal->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->titulo_menu_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->titulo_menu_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->cor_pagina_pagina_principal->Visible) { // cor_pagina_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->cor_pagina_pagina_principal) == "") { ?>
		<th data-name="cor_pagina_pagina_principal" class="<?php echo $pagina_principal->cor_pagina_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_cor_pagina_pagina_principal" class="pagina_principal_cor_pagina_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->cor_pagina_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cor_pagina_pagina_principal" class="<?php echo $pagina_principal->cor_pagina_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->cor_pagina_pagina_principal) ?>',1);"><div id="elh_pagina_principal_cor_pagina_pagina_principal" class="pagina_principal_cor_pagina_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->cor_pagina_pagina_principal->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->cor_pagina_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->cor_pagina_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->contra_cor_pagina_pagina_principal->Visible) { // contra_cor_pagina_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->contra_cor_pagina_pagina_principal) == "") { ?>
		<th data-name="contra_cor_pagina_pagina_principal" class="<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_contra_cor_pagina_pagina_principal" class="pagina_principal_contra_cor_pagina_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->contra_cor_pagina_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contra_cor_pagina_pagina_principal" class="<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->contra_cor_pagina_pagina_principal) ?>',1);"><div id="elh_pagina_principal_contra_cor_pagina_pagina_principal" class="pagina_principal_contra_cor_pagina_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->contra_cor_pagina_pagina_principal->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->contra_cor_pagina_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->contra_cor_pagina_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->imagem_icone_pagina_principal->Visible) { // imagem_icone_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->imagem_icone_pagina_principal) == "") { ?>
		<th data-name="imagem_icone_pagina_principal" class="<?php echo $pagina_principal->imagem_icone_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_imagem_icone_pagina_principal" class="pagina_principal_imagem_icone_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->imagem_icone_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_icone_pagina_principal" class="<?php echo $pagina_principal->imagem_icone_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->imagem_icone_pagina_principal) ?>',1);"><div id="elh_pagina_principal_imagem_icone_pagina_principal" class="pagina_principal_imagem_icone_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->imagem_icone_pagina_principal->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->imagem_icone_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->imagem_icone_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->imagem_logo_pagina_principal->Visible) { // imagem_logo_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->imagem_logo_pagina_principal) == "") { ?>
		<th data-name="imagem_logo_pagina_principal" class="<?php echo $pagina_principal->imagem_logo_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_imagem_logo_pagina_principal" class="pagina_principal_imagem_logo_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->imagem_logo_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_logo_pagina_principal" class="<?php echo $pagina_principal->imagem_logo_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->imagem_logo_pagina_principal) ?>',1);"><div id="elh_pagina_principal_imagem_logo_pagina_principal" class="pagina_principal_imagem_logo_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->imagem_logo_pagina_principal->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->imagem_logo_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->imagem_logo_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->data_atualizacao_pagina_principal->Visible) { // data_atualizacao_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->data_atualizacao_pagina_principal) == "") { ?>
		<th data-name="data_atualizacao_pagina_principal" class="<?php echo $pagina_principal->data_atualizacao_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_data_atualizacao_pagina_principal" class="pagina_principal_data_atualizacao_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->data_atualizacao_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_pagina_principal" class="<?php echo $pagina_principal->data_atualizacao_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->data_atualizacao_pagina_principal) ?>',1);"><div id="elh_pagina_principal_data_atualizacao_pagina_principal" class="pagina_principal_data_atualizacao_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->data_atualizacao_pagina_principal->caption() ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->data_atualizacao_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->data_atualizacao_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->usuario_id->Visible) { // usuario_id ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $pagina_principal->usuario_id->headerCellClass() ?>"><div id="elh_pagina_principal_usuario_id" class="pagina_principal_usuario_id"><div class="ew-table-header-caption"><?php echo $pagina_principal->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $pagina_principal->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->usuario_id) ?>',1);"><div id="elh_pagina_principal_usuario_id" class="pagina_principal_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pagina_principal->bool_ativo_pagina_principal->Visible) { // bool_ativo_pagina_principal ?>
	<?php if ($pagina_principal->sortUrl($pagina_principal->bool_ativo_pagina_principal) == "") { ?>
		<th data-name="bool_ativo_pagina_principal" class="<?php echo $pagina_principal->bool_ativo_pagina_principal->headerCellClass() ?>"><div id="elh_pagina_principal_bool_ativo_pagina_principal" class="pagina_principal_bool_ativo_pagina_principal"><div class="ew-table-header-caption"><?php echo $pagina_principal->bool_ativo_pagina_principal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_pagina_principal" class="<?php echo $pagina_principal->bool_ativo_pagina_principal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pagina_principal->SortUrl($pagina_principal->bool_ativo_pagina_principal) ?>',1);"><div id="elh_pagina_principal_bool_ativo_pagina_principal" class="pagina_principal_bool_ativo_pagina_principal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pagina_principal->bool_ativo_pagina_principal->caption() ?></span><span class="ew-table-header-sort"><?php if ($pagina_principal->bool_ativo_pagina_principal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pagina_principal->bool_ativo_pagina_principal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pagina_principal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pagina_principal->ExportAll && $pagina_principal->isExport()) {
	$pagina_principal_list->StopRec = $pagina_principal_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pagina_principal_list->TotalRecs > $pagina_principal_list->StartRec + $pagina_principal_list->DisplayRecs - 1)
		$pagina_principal_list->StopRec = $pagina_principal_list->StartRec + $pagina_principal_list->DisplayRecs - 1;
	else
		$pagina_principal_list->StopRec = $pagina_principal_list->TotalRecs;
}
$pagina_principal_list->RecCnt = $pagina_principal_list->StartRec - 1;
if ($pagina_principal_list->Recordset && !$pagina_principal_list->Recordset->EOF) {
	$pagina_principal_list->Recordset->moveFirst();
	$selectLimit = $pagina_principal_list->UseSelectLimit;
	if (!$selectLimit && $pagina_principal_list->StartRec > 1)
		$pagina_principal_list->Recordset->move($pagina_principal_list->StartRec - 1);
} elseif (!$pagina_principal->AllowAddDeleteRow && $pagina_principal_list->StopRec == 0) {
	$pagina_principal_list->StopRec = $pagina_principal->GridAddRowCount;
}

// Initialize aggregate
$pagina_principal->RowType = ROWTYPE_AGGREGATEINIT;
$pagina_principal->resetAttributes();
$pagina_principal_list->renderRow();
while ($pagina_principal_list->RecCnt < $pagina_principal_list->StopRec) {
	$pagina_principal_list->RecCnt++;
	if ($pagina_principal_list->RecCnt >= $pagina_principal_list->StartRec) {
		$pagina_principal_list->RowCnt++;

		// Set up key count
		$pagina_principal_list->KeyCount = $pagina_principal_list->RowIndex;

		// Init row class and style
		$pagina_principal->resetAttributes();
		$pagina_principal->CssClass = "";
		if ($pagina_principal->isGridAdd()) {
		} else {
			$pagina_principal_list->loadRowValues($pagina_principal_list->Recordset); // Load row values
		}
		$pagina_principal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pagina_principal->RowAttrs = array_merge($pagina_principal->RowAttrs, array('data-rowindex'=>$pagina_principal_list->RowCnt, 'id'=>'r' . $pagina_principal_list->RowCnt . '_pagina_principal', 'data-rowtype'=>$pagina_principal->RowType));

		// Render row
		$pagina_principal_list->renderRow();

		// Render list options
		$pagina_principal_list->renderListOptions();
?>
	<tr<?php echo $pagina_principal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pagina_principal_list->ListOptions->render("body", "left", $pagina_principal_list->RowCnt);
?>
	<?php if ($pagina_principal->id_pagina_principal->Visible) { // id_pagina_principal ?>
		<td data-name="id_pagina_principal"<?php echo $pagina_principal->id_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_id_pagina_principal" class="pagina_principal_id_pagina_principal">
<span<?php echo $pagina_principal->id_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->id_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->titulo_pagina_principal->Visible) { // titulo_pagina_principal ?>
		<td data-name="titulo_pagina_principal"<?php echo $pagina_principal->titulo_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_titulo_pagina_principal" class="pagina_principal_titulo_pagina_principal">
<span<?php echo $pagina_principal->titulo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->titulo_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->titulo_menu_pagina_principal->Visible) { // titulo_menu_pagina_principal ?>
		<td data-name="titulo_menu_pagina_principal"<?php echo $pagina_principal->titulo_menu_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_titulo_menu_pagina_principal" class="pagina_principal_titulo_menu_pagina_principal">
<span<?php echo $pagina_principal->titulo_menu_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->titulo_menu_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->cor_pagina_pagina_principal->Visible) { // cor_pagina_pagina_principal ?>
		<td data-name="cor_pagina_pagina_principal"<?php echo $pagina_principal->cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_cor_pagina_pagina_principal" class="pagina_principal_cor_pagina_pagina_principal">
<span<?php echo $pagina_principal->cor_pagina_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->cor_pagina_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->contra_cor_pagina_pagina_principal->Visible) { // contra_cor_pagina_pagina_principal ?>
		<td data-name="contra_cor_pagina_pagina_principal"<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_contra_cor_pagina_pagina_principal" class="pagina_principal_contra_cor_pagina_pagina_principal">
<span<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->contra_cor_pagina_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->imagem_icone_pagina_principal->Visible) { // imagem_icone_pagina_principal ?>
		<td data-name="imagem_icone_pagina_principal"<?php echo $pagina_principal->imagem_icone_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_imagem_icone_pagina_principal" class="pagina_principal_imagem_icone_pagina_principal">
<span<?php echo $pagina_principal->imagem_icone_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->imagem_icone_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->imagem_logo_pagina_principal->Visible) { // imagem_logo_pagina_principal ?>
		<td data-name="imagem_logo_pagina_principal"<?php echo $pagina_principal->imagem_logo_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_imagem_logo_pagina_principal" class="pagina_principal_imagem_logo_pagina_principal">
<span<?php echo $pagina_principal->imagem_logo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->imagem_logo_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->data_atualizacao_pagina_principal->Visible) { // data_atualizacao_pagina_principal ?>
		<td data-name="data_atualizacao_pagina_principal"<?php echo $pagina_principal->data_atualizacao_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_data_atualizacao_pagina_principal" class="pagina_principal_data_atualizacao_pagina_principal">
<span<?php echo $pagina_principal->data_atualizacao_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->data_atualizacao_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $pagina_principal->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_usuario_id" class="pagina_principal_usuario_id">
<span<?php echo $pagina_principal->usuario_id->viewAttributes() ?>>
<?php echo $pagina_principal->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pagina_principal->bool_ativo_pagina_principal->Visible) { // bool_ativo_pagina_principal ?>
		<td data-name="bool_ativo_pagina_principal"<?php echo $pagina_principal->bool_ativo_pagina_principal->cellAttributes() ?>>
<span id="el<?php echo $pagina_principal_list->RowCnt ?>_pagina_principal_bool_ativo_pagina_principal" class="pagina_principal_bool_ativo_pagina_principal">
<span<?php echo $pagina_principal->bool_ativo_pagina_principal->viewAttributes() ?>>
<?php echo $pagina_principal->bool_ativo_pagina_principal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pagina_principal_list->ListOptions->render("body", "right", $pagina_principal_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pagina_principal->isGridAdd())
		$pagina_principal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pagina_principal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pagina_principal_list->Recordset)
	$pagina_principal_list->Recordset->Close();
?>
<?php if (!$pagina_principal->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pagina_principal->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pagina_principal_list->Pager)) $pagina_principal_list->Pager = new PrevNextPager($pagina_principal_list->StartRec, $pagina_principal_list->DisplayRecs, $pagina_principal_list->TotalRecs, $pagina_principal_list->AutoHidePager) ?>
<?php if ($pagina_principal_list->Pager->RecordCount > 0 && $pagina_principal_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($pagina_principal_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $pagina_principal_list->pageUrl() ?>start=<?php echo $pagina_principal_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($pagina_principal_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $pagina_principal_list->pageUrl() ?>start=<?php echo $pagina_principal_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $pagina_principal_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($pagina_principal_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $pagina_principal_list->pageUrl() ?>start=<?php echo $pagina_principal_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($pagina_principal_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $pagina_principal_list->pageUrl() ?>start=<?php echo $pagina_principal_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $pagina_principal_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($pagina_principal_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pagina_principal_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pagina_principal_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pagina_principal_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($pagina_principal_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pagina_principal_list->TotalRecs == 0 && !$pagina_principal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($pagina_principal_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pagina_principal_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pagina_principal->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pagina_principal_list->terminate();
?>
