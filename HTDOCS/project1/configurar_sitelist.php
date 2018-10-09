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
$configurar_site_list = new configurar_site_list();

// Run the page
$configurar_site_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$configurar_site_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$configurar_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fconfigurar_sitelist = currentForm = new ew.Form("fconfigurar_sitelist", "list");
fconfigurar_sitelist.formKeyCountName = '<?php echo $configurar_site_list->FormKeyCountName ?>';

// Form_CustomValidate event
fconfigurar_sitelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fconfigurar_sitelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fconfigurar_sitelistsrch = currentSearchForm = new ew.Form("fconfigurar_sitelistsrch");

// Filters
fconfigurar_sitelistsrch.filterList = <?php echo $configurar_site_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$configurar_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($configurar_site_list->TotalRecs > 0 && $configurar_site_list->ExportOptions->visible()) { ?>
<?php $configurar_site_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($configurar_site_list->ImportOptions->visible()) { ?>
<?php $configurar_site_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($configurar_site_list->SearchOptions->visible()) { ?>
<?php $configurar_site_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($configurar_site_list->FilterOptions->visible()) { ?>
<?php $configurar_site_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$configurar_site_list->renderOtherOptions();
?>
<?php if (!$configurar_site->isExport() && !$configurar_site->CurrentAction) { ?>
<form name="fconfigurar_sitelistsrch" id="fconfigurar_sitelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($configurar_site_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fconfigurar_sitelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="configurar_site">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($configurar_site_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($configurar_site_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $configurar_site_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($configurar_site_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($configurar_site_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($configurar_site_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($configurar_site_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $configurar_site_list->showPageHeader(); ?>
<?php
$configurar_site_list->showMessage();
?>
<?php if ($configurar_site_list->TotalRecs > 0 || $configurar_site->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($configurar_site_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> configurar_site">
<form name="fconfigurar_sitelist" id="fconfigurar_sitelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($configurar_site_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $configurar_site_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="configurar_site">
<div id="gmp_configurar_site" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($configurar_site_list->TotalRecs > 0 || $configurar_site->isGridEdit()) { ?>
<table id="tbl_configurar_sitelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$configurar_site_list->RowType = ROWTYPE_HEADER;

// Render list options
$configurar_site_list->renderListOptions();

// Render list options (header, left)
$configurar_site_list->ListOptions->render("header", "left");
?>
<?php if ($configurar_site->id_configurar_site->Visible) { // id_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->id_configurar_site) == "") { ?>
		<th data-name="id_configurar_site" class="<?php echo $configurar_site->id_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_id_configurar_site" class="configurar_site_id_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->id_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_configurar_site" class="<?php echo $configurar_site->id_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->id_configurar_site) ?>',1);"><div id="elh_configurar_site_id_configurar_site" class="configurar_site_id_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->id_configurar_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->id_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->id_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->titulo_configurar_site->Visible) { // titulo_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->titulo_configurar_site) == "") { ?>
		<th data-name="titulo_configurar_site" class="<?php echo $configurar_site->titulo_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_titulo_configurar_site" class="configurar_site_titulo_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->titulo_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_configurar_site" class="<?php echo $configurar_site->titulo_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->titulo_configurar_site) ?>',1);"><div id="elh_configurar_site_titulo_configurar_site" class="configurar_site_titulo_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->titulo_configurar_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->titulo_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->titulo_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->titulo_menu_configurar_site->Visible) { // titulo_menu_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->titulo_menu_configurar_site) == "") { ?>
		<th data-name="titulo_menu_configurar_site" class="<?php echo $configurar_site->titulo_menu_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_titulo_menu_configurar_site" class="configurar_site_titulo_menu_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->titulo_menu_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="titulo_menu_configurar_site" class="<?php echo $configurar_site->titulo_menu_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->titulo_menu_configurar_site) ?>',1);"><div id="elh_configurar_site_titulo_menu_configurar_site" class="configurar_site_titulo_menu_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->titulo_menu_configurar_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->titulo_menu_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->titulo_menu_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->cor_pagina_configurar_site->Visible) { // cor_pagina_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->cor_pagina_configurar_site) == "") { ?>
		<th data-name="cor_pagina_configurar_site" class="<?php echo $configurar_site->cor_pagina_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_cor_pagina_configurar_site" class="configurar_site_cor_pagina_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->cor_pagina_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cor_pagina_configurar_site" class="<?php echo $configurar_site->cor_pagina_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->cor_pagina_configurar_site) ?>',1);"><div id="elh_configurar_site_cor_pagina_configurar_site" class="configurar_site_cor_pagina_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->cor_pagina_configurar_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->cor_pagina_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->cor_pagina_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->contra_cor_pagina_configurar_site->Visible) { // contra_cor_pagina_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->contra_cor_pagina_configurar_site) == "") { ?>
		<th data-name="contra_cor_pagina_configurar_site" class="<?php echo $configurar_site->contra_cor_pagina_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_contra_cor_pagina_configurar_site" class="configurar_site_contra_cor_pagina_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->contra_cor_pagina_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contra_cor_pagina_configurar_site" class="<?php echo $configurar_site->contra_cor_pagina_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->contra_cor_pagina_configurar_site) ?>',1);"><div id="elh_configurar_site_contra_cor_pagina_configurar_site" class="configurar_site_contra_cor_pagina_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->contra_cor_pagina_configurar_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->contra_cor_pagina_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->contra_cor_pagina_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->imagem_icone_configurar_site->Visible) { // imagem_icone_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->imagem_icone_configurar_site) == "") { ?>
		<th data-name="imagem_icone_configurar_site" class="<?php echo $configurar_site->imagem_icone_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_imagem_icone_configurar_site" class="configurar_site_imagem_icone_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->imagem_icone_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_icone_configurar_site" class="<?php echo $configurar_site->imagem_icone_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->imagem_icone_configurar_site) ?>',1);"><div id="elh_configurar_site_imagem_icone_configurar_site" class="configurar_site_imagem_icone_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->imagem_icone_configurar_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->imagem_icone_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->imagem_icone_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->imagem_logo_configurar_site->Visible) { // imagem_logo_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->imagem_logo_configurar_site) == "") { ?>
		<th data-name="imagem_logo_configurar_site" class="<?php echo $configurar_site->imagem_logo_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_imagem_logo_configurar_site" class="configurar_site_imagem_logo_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->imagem_logo_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_logo_configurar_site" class="<?php echo $configurar_site->imagem_logo_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->imagem_logo_configurar_site) ?>',1);"><div id="elh_configurar_site_imagem_logo_configurar_site" class="configurar_site_imagem_logo_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->imagem_logo_configurar_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->imagem_logo_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->imagem_logo_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->data_atualizacao_configurar_site->Visible) { // data_atualizacao_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->data_atualizacao_configurar_site) == "") { ?>
		<th data-name="data_atualizacao_configurar_site" class="<?php echo $configurar_site->data_atualizacao_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_data_atualizacao_configurar_site" class="configurar_site_data_atualizacao_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->data_atualizacao_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_configurar_site" class="<?php echo $configurar_site->data_atualizacao_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->data_atualizacao_configurar_site) ?>',1);"><div id="elh_configurar_site_data_atualizacao_configurar_site" class="configurar_site_data_atualizacao_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->data_atualizacao_configurar_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->data_atualizacao_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->data_atualizacao_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->usuario_id->Visible) { // usuario_id ?>
	<?php if ($configurar_site->sortUrl($configurar_site->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $configurar_site->usuario_id->headerCellClass() ?>"><div id="elh_configurar_site_usuario_id" class="configurar_site_usuario_id"><div class="ew-table-header-caption"><?php echo $configurar_site->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $configurar_site->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->usuario_id) ?>',1);"><div id="elh_configurar_site_usuario_id" class="configurar_site_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($configurar_site->bool_ativo_configurar_site->Visible) { // bool_ativo_configurar_site ?>
	<?php if ($configurar_site->sortUrl($configurar_site->bool_ativo_configurar_site) == "") { ?>
		<th data-name="bool_ativo_configurar_site" class="<?php echo $configurar_site->bool_ativo_configurar_site->headerCellClass() ?>"><div id="elh_configurar_site_bool_ativo_configurar_site" class="configurar_site_bool_ativo_configurar_site"><div class="ew-table-header-caption"><?php echo $configurar_site->bool_ativo_configurar_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_configurar_site" class="<?php echo $configurar_site->bool_ativo_configurar_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $configurar_site->SortUrl($configurar_site->bool_ativo_configurar_site) ?>',1);"><div id="elh_configurar_site_bool_ativo_configurar_site" class="configurar_site_bool_ativo_configurar_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $configurar_site->bool_ativo_configurar_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($configurar_site->bool_ativo_configurar_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($configurar_site->bool_ativo_configurar_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$configurar_site_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($configurar_site->ExportAll && $configurar_site->isExport()) {
	$configurar_site_list->StopRec = $configurar_site_list->TotalRecs;
} else {

	// Set the last record to display
	if ($configurar_site_list->TotalRecs > $configurar_site_list->StartRec + $configurar_site_list->DisplayRecs - 1)
		$configurar_site_list->StopRec = $configurar_site_list->StartRec + $configurar_site_list->DisplayRecs - 1;
	else
		$configurar_site_list->StopRec = $configurar_site_list->TotalRecs;
}
$configurar_site_list->RecCnt = $configurar_site_list->StartRec - 1;
if ($configurar_site_list->Recordset && !$configurar_site_list->Recordset->EOF) {
	$configurar_site_list->Recordset->moveFirst();
	$selectLimit = $configurar_site_list->UseSelectLimit;
	if (!$selectLimit && $configurar_site_list->StartRec > 1)
		$configurar_site_list->Recordset->move($configurar_site_list->StartRec - 1);
} elseif (!$configurar_site->AllowAddDeleteRow && $configurar_site_list->StopRec == 0) {
	$configurar_site_list->StopRec = $configurar_site->GridAddRowCount;
}

// Initialize aggregate
$configurar_site->RowType = ROWTYPE_AGGREGATEINIT;
$configurar_site->resetAttributes();
$configurar_site_list->renderRow();
while ($configurar_site_list->RecCnt < $configurar_site_list->StopRec) {
	$configurar_site_list->RecCnt++;
	if ($configurar_site_list->RecCnt >= $configurar_site_list->StartRec) {
		$configurar_site_list->RowCnt++;

		// Set up key count
		$configurar_site_list->KeyCount = $configurar_site_list->RowIndex;

		// Init row class and style
		$configurar_site->resetAttributes();
		$configurar_site->CssClass = "";
		if ($configurar_site->isGridAdd()) {
		} else {
			$configurar_site_list->loadRowValues($configurar_site_list->Recordset); // Load row values
		}
		$configurar_site->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$configurar_site->RowAttrs = array_merge($configurar_site->RowAttrs, array('data-rowindex'=>$configurar_site_list->RowCnt, 'id'=>'r' . $configurar_site_list->RowCnt . '_configurar_site', 'data-rowtype'=>$configurar_site->RowType));

		// Render row
		$configurar_site_list->renderRow();

		// Render list options
		$configurar_site_list->renderListOptions();
?>
	<tr<?php echo $configurar_site->rowAttributes() ?>>
<?php

// Render list options (body, left)
$configurar_site_list->ListOptions->render("body", "left", $configurar_site_list->RowCnt);
?>
	<?php if ($configurar_site->id_configurar_site->Visible) { // id_configurar_site ?>
		<td data-name="id_configurar_site"<?php echo $configurar_site->id_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_id_configurar_site" class="configurar_site_id_configurar_site">
<span<?php echo $configurar_site->id_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->id_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->titulo_configurar_site->Visible) { // titulo_configurar_site ?>
		<td data-name="titulo_configurar_site"<?php echo $configurar_site->titulo_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_titulo_configurar_site" class="configurar_site_titulo_configurar_site">
<span<?php echo $configurar_site->titulo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->titulo_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->titulo_menu_configurar_site->Visible) { // titulo_menu_configurar_site ?>
		<td data-name="titulo_menu_configurar_site"<?php echo $configurar_site->titulo_menu_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_titulo_menu_configurar_site" class="configurar_site_titulo_menu_configurar_site">
<span<?php echo $configurar_site->titulo_menu_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->titulo_menu_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->cor_pagina_configurar_site->Visible) { // cor_pagina_configurar_site ?>
		<td data-name="cor_pagina_configurar_site"<?php echo $configurar_site->cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_cor_pagina_configurar_site" class="configurar_site_cor_pagina_configurar_site">
<span<?php echo $configurar_site->cor_pagina_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->cor_pagina_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->contra_cor_pagina_configurar_site->Visible) { // contra_cor_pagina_configurar_site ?>
		<td data-name="contra_cor_pagina_configurar_site"<?php echo $configurar_site->contra_cor_pagina_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_contra_cor_pagina_configurar_site" class="configurar_site_contra_cor_pagina_configurar_site">
<span<?php echo $configurar_site->contra_cor_pagina_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->contra_cor_pagina_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->imagem_icone_configurar_site->Visible) { // imagem_icone_configurar_site ?>
		<td data-name="imagem_icone_configurar_site"<?php echo $configurar_site->imagem_icone_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_imagem_icone_configurar_site" class="configurar_site_imagem_icone_configurar_site">
<span<?php echo $configurar_site->imagem_icone_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->imagem_icone_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->imagem_logo_configurar_site->Visible) { // imagem_logo_configurar_site ?>
		<td data-name="imagem_logo_configurar_site"<?php echo $configurar_site->imagem_logo_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_imagem_logo_configurar_site" class="configurar_site_imagem_logo_configurar_site">
<span<?php echo $configurar_site->imagem_logo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->imagem_logo_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->data_atualizacao_configurar_site->Visible) { // data_atualizacao_configurar_site ?>
		<td data-name="data_atualizacao_configurar_site"<?php echo $configurar_site->data_atualizacao_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_data_atualizacao_configurar_site" class="configurar_site_data_atualizacao_configurar_site">
<span<?php echo $configurar_site->data_atualizacao_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->data_atualizacao_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $configurar_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_usuario_id" class="configurar_site_usuario_id">
<span<?php echo $configurar_site->usuario_id->viewAttributes() ?>>
<?php echo $configurar_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($configurar_site->bool_ativo_configurar_site->Visible) { // bool_ativo_configurar_site ?>
		<td data-name="bool_ativo_configurar_site"<?php echo $configurar_site->bool_ativo_configurar_site->cellAttributes() ?>>
<span id="el<?php echo $configurar_site_list->RowCnt ?>_configurar_site_bool_ativo_configurar_site" class="configurar_site_bool_ativo_configurar_site">
<span<?php echo $configurar_site->bool_ativo_configurar_site->viewAttributes() ?>>
<?php echo $configurar_site->bool_ativo_configurar_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$configurar_site_list->ListOptions->render("body", "right", $configurar_site_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$configurar_site->isGridAdd())
		$configurar_site_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$configurar_site->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($configurar_site_list->Recordset)
	$configurar_site_list->Recordset->Close();
?>
<?php if (!$configurar_site->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$configurar_site->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($configurar_site_list->Pager)) $configurar_site_list->Pager = new PrevNextPager($configurar_site_list->StartRec, $configurar_site_list->DisplayRecs, $configurar_site_list->TotalRecs, $configurar_site_list->AutoHidePager) ?>
<?php if ($configurar_site_list->Pager->RecordCount > 0 && $configurar_site_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($configurar_site_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $configurar_site_list->pageUrl() ?>start=<?php echo $configurar_site_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($configurar_site_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $configurar_site_list->pageUrl() ?>start=<?php echo $configurar_site_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $configurar_site_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($configurar_site_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $configurar_site_list->pageUrl() ?>start=<?php echo $configurar_site_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($configurar_site_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $configurar_site_list->pageUrl() ?>start=<?php echo $configurar_site_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $configurar_site_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($configurar_site_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $configurar_site_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $configurar_site_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $configurar_site_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($configurar_site_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($configurar_site_list->TotalRecs == 0 && !$configurar_site->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($configurar_site_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$configurar_site_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$configurar_site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$configurar_site_list->terminate();
?>
