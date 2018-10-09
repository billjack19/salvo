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
$notificacoes_salvas_list = new notificacoes_salvas_list();

// Run the page
$notificacoes_salvas_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_salvas_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes_salvas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fnotificacoes_salvaslist = currentForm = new ew.Form("fnotificacoes_salvaslist", "list");
fnotificacoes_salvaslist.formKeyCountName = '<?php echo $notificacoes_salvas_list->FormKeyCountName ?>';

// Form_CustomValidate event
fnotificacoes_salvaslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_salvaslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fnotificacoes_salvaslistsrch = currentSearchForm = new ew.Form("fnotificacoes_salvaslistsrch");

// Filters
fnotificacoes_salvaslistsrch.filterList = <?php echo $notificacoes_salvas_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes_salvas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($notificacoes_salvas_list->TotalRecs > 0 && $notificacoes_salvas_list->ExportOptions->visible()) { ?>
<?php $notificacoes_salvas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_salvas_list->ImportOptions->visible()) { ?>
<?php $notificacoes_salvas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_salvas_list->SearchOptions->visible()) { ?>
<?php $notificacoes_salvas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_salvas_list->FilterOptions->visible()) { ?>
<?php $notificacoes_salvas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$notificacoes_salvas_list->renderOtherOptions();
?>
<?php if (!$notificacoes_salvas->isExport() && !$notificacoes_salvas->CurrentAction) { ?>
<form name="fnotificacoes_salvaslistsrch" id="fnotificacoes_salvaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($notificacoes_salvas_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fnotificacoes_salvaslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="notificacoes_salvas">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($notificacoes_salvas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($notificacoes_salvas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $notificacoes_salvas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($notificacoes_salvas_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_salvas_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_salvas_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_salvas_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $notificacoes_salvas_list->showPageHeader(); ?>
<?php
$notificacoes_salvas_list->showMessage();
?>
<?php if ($notificacoes_salvas_list->TotalRecs > 0 || $notificacoes_salvas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($notificacoes_salvas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> notificacoes_salvas">
<form name="fnotificacoes_salvaslist" id="fnotificacoes_salvaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_salvas_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_salvas_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_salvas">
<div id="gmp_notificacoes_salvas" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($notificacoes_salvas_list->TotalRecs > 0 || $notificacoes_salvas->isGridEdit()) { ?>
<table id="tbl_notificacoes_salvaslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$notificacoes_salvas_list->RowType = ROWTYPE_HEADER;

// Render list options
$notificacoes_salvas_list->renderListOptions();

// Render list options (header, left)
$notificacoes_salvas_list->ListOptions->render("header", "left");
?>
<?php if ($notificacoes_salvas->id_notificacoes_salvas->Visible) { // id_notificacoes_salvas ?>
	<?php if ($notificacoes_salvas->sortUrl($notificacoes_salvas->id_notificacoes_salvas) == "") { ?>
		<th data-name="id_notificacoes_salvas" class="<?php echo $notificacoes_salvas->id_notificacoes_salvas->headerCellClass() ?>"><div id="elh_notificacoes_salvas_id_notificacoes_salvas" class="notificacoes_salvas_id_notificacoes_salvas"><div class="ew-table-header-caption"><?php echo $notificacoes_salvas->id_notificacoes_salvas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_notificacoes_salvas" class="<?php echo $notificacoes_salvas->id_notificacoes_salvas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_salvas->SortUrl($notificacoes_salvas->id_notificacoes_salvas) ?>',1);"><div id="elh_notificacoes_salvas_id_notificacoes_salvas" class="notificacoes_salvas_id_notificacoes_salvas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_salvas->id_notificacoes_salvas->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_salvas->id_notificacoes_salvas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_salvas->id_notificacoes_salvas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->Visible) { // usuario_atuador_notificacoes_salvas ?>
	<?php if ($notificacoes_salvas->sortUrl($notificacoes_salvas->usuario_atuador_notificacoes_salvas) == "") { ?>
		<th data-name="usuario_atuador_notificacoes_salvas" class="<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->headerCellClass() ?>"><div id="elh_notificacoes_salvas_usuario_atuador_notificacoes_salvas" class="notificacoes_salvas_usuario_atuador_notificacoes_salvas"><div class="ew-table-header-caption"><?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_atuador_notificacoes_salvas" class="<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_salvas->SortUrl($notificacoes_salvas->usuario_atuador_notificacoes_salvas) ?>',1);"><div id="elh_notificacoes_salvas_usuario_atuador_notificacoes_salvas" class="notificacoes_salvas_usuario_atuador_notificacoes_salvas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->Visible) { // usuaio_requerente_notificacoes_salvas ?>
	<?php if ($notificacoes_salvas->sortUrl($notificacoes_salvas->usuaio_requerente_notificacoes_salvas) == "") { ?>
		<th data-name="usuaio_requerente_notificacoes_salvas" class="<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->headerCellClass() ?>"><div id="elh_notificacoes_salvas_usuaio_requerente_notificacoes_salvas" class="notificacoes_salvas_usuaio_requerente_notificacoes_salvas"><div class="ew-table-header-caption"><?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuaio_requerente_notificacoes_salvas" class="<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_salvas->SortUrl($notificacoes_salvas->usuaio_requerente_notificacoes_salvas) ?>',1);"><div id="elh_notificacoes_salvas_usuaio_requerente_notificacoes_salvas" class="notificacoes_salvas_usuaio_requerente_notificacoes_salvas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->Visible) { // tipo_alteracao_notificacoes_salvas ?>
	<?php if ($notificacoes_salvas->sortUrl($notificacoes_salvas->tipo_alteracao_notificacoes_salvas) == "") { ?>
		<th data-name="tipo_alteracao_notificacoes_salvas" class="<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->headerCellClass() ?>"><div id="elh_notificacoes_salvas_tipo_alteracao_notificacoes_salvas" class="notificacoes_salvas_tipo_alteracao_notificacoes_salvas"><div class="ew-table-header-caption"><?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_alteracao_notificacoes_salvas" class="<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_salvas->SortUrl($notificacoes_salvas->tipo_alteracao_notificacoes_salvas) ?>',1);"><div id="elh_notificacoes_salvas_tipo_alteracao_notificacoes_salvas" class="notificacoes_salvas_tipo_alteracao_notificacoes_salvas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_salvas->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<?php if ($notificacoes_salvas->sortUrl($notificacoes_salvas->notificacoes_config_id) == "") { ?>
		<th data-name="notificacoes_config_id" class="<?php echo $notificacoes_salvas->notificacoes_config_id->headerCellClass() ?>"><div id="elh_notificacoes_salvas_notificacoes_config_id" class="notificacoes_salvas_notificacoes_config_id"><div class="ew-table-header-caption"><?php echo $notificacoes_salvas->notificacoes_config_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="notificacoes_config_id" class="<?php echo $notificacoes_salvas->notificacoes_config_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_salvas->SortUrl($notificacoes_salvas->notificacoes_config_id) ?>',1);"><div id="elh_notificacoes_salvas_notificacoes_config_id" class="notificacoes_salvas_notificacoes_config_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_salvas->notificacoes_config_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_salvas->notificacoes_config_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_salvas->notificacoes_config_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->Visible) { // data_atualizacao_notificacoes_salvas ?>
	<?php if ($notificacoes_salvas->sortUrl($notificacoes_salvas->data_atualizacao_notificacoes_salvas) == "") { ?>
		<th data-name="data_atualizacao_notificacoes_salvas" class="<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->headerCellClass() ?>"><div id="elh_notificacoes_salvas_data_atualizacao_notificacoes_salvas" class="notificacoes_salvas_data_atualizacao_notificacoes_salvas"><div class="ew-table-header-caption"><?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_notificacoes_salvas" class="<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_salvas->SortUrl($notificacoes_salvas->data_atualizacao_notificacoes_salvas) ?>',1);"><div id="elh_notificacoes_salvas_data_atualizacao_notificacoes_salvas" class="notificacoes_salvas_data_atualizacao_notificacoes_salvas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_salvas->bool_ativo_notificacoes_salvas->Visible) { // bool_ativo_notificacoes_salvas ?>
	<?php if ($notificacoes_salvas->sortUrl($notificacoes_salvas->bool_ativo_notificacoes_salvas) == "") { ?>
		<th data-name="bool_ativo_notificacoes_salvas" class="<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->headerCellClass() ?>"><div id="elh_notificacoes_salvas_bool_ativo_notificacoes_salvas" class="notificacoes_salvas_bool_ativo_notificacoes_salvas"><div class="ew-table-header-caption"><?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_notificacoes_salvas" class="<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_salvas->SortUrl($notificacoes_salvas->bool_ativo_notificacoes_salvas) ?>',1);"><div id="elh_notificacoes_salvas_bool_ativo_notificacoes_salvas" class="notificacoes_salvas_bool_ativo_notificacoes_salvas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_salvas->bool_ativo_notificacoes_salvas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_salvas->bool_ativo_notificacoes_salvas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$notificacoes_salvas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($notificacoes_salvas->ExportAll && $notificacoes_salvas->isExport()) {
	$notificacoes_salvas_list->StopRec = $notificacoes_salvas_list->TotalRecs;
} else {

	// Set the last record to display
	if ($notificacoes_salvas_list->TotalRecs > $notificacoes_salvas_list->StartRec + $notificacoes_salvas_list->DisplayRecs - 1)
		$notificacoes_salvas_list->StopRec = $notificacoes_salvas_list->StartRec + $notificacoes_salvas_list->DisplayRecs - 1;
	else
		$notificacoes_salvas_list->StopRec = $notificacoes_salvas_list->TotalRecs;
}
$notificacoes_salvas_list->RecCnt = $notificacoes_salvas_list->StartRec - 1;
if ($notificacoes_salvas_list->Recordset && !$notificacoes_salvas_list->Recordset->EOF) {
	$notificacoes_salvas_list->Recordset->moveFirst();
	$selectLimit = $notificacoes_salvas_list->UseSelectLimit;
	if (!$selectLimit && $notificacoes_salvas_list->StartRec > 1)
		$notificacoes_salvas_list->Recordset->move($notificacoes_salvas_list->StartRec - 1);
} elseif (!$notificacoes_salvas->AllowAddDeleteRow && $notificacoes_salvas_list->StopRec == 0) {
	$notificacoes_salvas_list->StopRec = $notificacoes_salvas->GridAddRowCount;
}

// Initialize aggregate
$notificacoes_salvas->RowType = ROWTYPE_AGGREGATEINIT;
$notificacoes_salvas->resetAttributes();
$notificacoes_salvas_list->renderRow();
while ($notificacoes_salvas_list->RecCnt < $notificacoes_salvas_list->StopRec) {
	$notificacoes_salvas_list->RecCnt++;
	if ($notificacoes_salvas_list->RecCnt >= $notificacoes_salvas_list->StartRec) {
		$notificacoes_salvas_list->RowCnt++;

		// Set up key count
		$notificacoes_salvas_list->KeyCount = $notificacoes_salvas_list->RowIndex;

		// Init row class and style
		$notificacoes_salvas->resetAttributes();
		$notificacoes_salvas->CssClass = "";
		if ($notificacoes_salvas->isGridAdd()) {
		} else {
			$notificacoes_salvas_list->loadRowValues($notificacoes_salvas_list->Recordset); // Load row values
		}
		$notificacoes_salvas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$notificacoes_salvas->RowAttrs = array_merge($notificacoes_salvas->RowAttrs, array('data-rowindex'=>$notificacoes_salvas_list->RowCnt, 'id'=>'r' . $notificacoes_salvas_list->RowCnt . '_notificacoes_salvas', 'data-rowtype'=>$notificacoes_salvas->RowType));

		// Render row
		$notificacoes_salvas_list->renderRow();

		// Render list options
		$notificacoes_salvas_list->renderListOptions();
?>
	<tr<?php echo $notificacoes_salvas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$notificacoes_salvas_list->ListOptions->render("body", "left", $notificacoes_salvas_list->RowCnt);
?>
	<?php if ($notificacoes_salvas->id_notificacoes_salvas->Visible) { // id_notificacoes_salvas ?>
		<td data-name="id_notificacoes_salvas"<?php echo $notificacoes_salvas->id_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_list->RowCnt ?>_notificacoes_salvas_id_notificacoes_salvas" class="notificacoes_salvas_id_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->id_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->id_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_salvas->usuario_atuador_notificacoes_salvas->Visible) { // usuario_atuador_notificacoes_salvas ?>
		<td data-name="usuario_atuador_notificacoes_salvas"<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_list->RowCnt ?>_notificacoes_salvas_usuario_atuador_notificacoes_salvas" class="notificacoes_salvas_usuario_atuador_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->usuario_atuador_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_salvas->usuaio_requerente_notificacoes_salvas->Visible) { // usuaio_requerente_notificacoes_salvas ?>
		<td data-name="usuaio_requerente_notificacoes_salvas"<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_list->RowCnt ?>_notificacoes_salvas_usuaio_requerente_notificacoes_salvas" class="notificacoes_salvas_usuaio_requerente_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->usuaio_requerente_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_salvas->tipo_alteracao_notificacoes_salvas->Visible) { // tipo_alteracao_notificacoes_salvas ?>
		<td data-name="tipo_alteracao_notificacoes_salvas"<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_list->RowCnt ?>_notificacoes_salvas_tipo_alteracao_notificacoes_salvas" class="notificacoes_salvas_tipo_alteracao_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->tipo_alteracao_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_salvas->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<td data-name="notificacoes_config_id"<?php echo $notificacoes_salvas->notificacoes_config_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_list->RowCnt ?>_notificacoes_salvas_notificacoes_config_id" class="notificacoes_salvas_notificacoes_config_id">
<span<?php echo $notificacoes_salvas->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes_salvas->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_salvas->data_atualizacao_notificacoes_salvas->Visible) { // data_atualizacao_notificacoes_salvas ?>
		<td data-name="data_atualizacao_notificacoes_salvas"<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_list->RowCnt ?>_notificacoes_salvas_data_atualizacao_notificacoes_salvas" class="notificacoes_salvas_data_atualizacao_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->data_atualizacao_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_salvas->bool_ativo_notificacoes_salvas->Visible) { // bool_ativo_notificacoes_salvas ?>
		<td data-name="bool_ativo_notificacoes_salvas"<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_salvas_list->RowCnt ?>_notificacoes_salvas_bool_ativo_notificacoes_salvas" class="notificacoes_salvas_bool_ativo_notificacoes_salvas">
<span<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->viewAttributes() ?>>
<?php echo $notificacoes_salvas->bool_ativo_notificacoes_salvas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$notificacoes_salvas_list->ListOptions->render("body", "right", $notificacoes_salvas_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$notificacoes_salvas->isGridAdd())
		$notificacoes_salvas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$notificacoes_salvas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($notificacoes_salvas_list->Recordset)
	$notificacoes_salvas_list->Recordset->Close();
?>
<?php if (!$notificacoes_salvas->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$notificacoes_salvas->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($notificacoes_salvas_list->Pager)) $notificacoes_salvas_list->Pager = new PrevNextPager($notificacoes_salvas_list->StartRec, $notificacoes_salvas_list->DisplayRecs, $notificacoes_salvas_list->TotalRecs, $notificacoes_salvas_list->AutoHidePager) ?>
<?php if ($notificacoes_salvas_list->Pager->RecordCount > 0 && $notificacoes_salvas_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($notificacoes_salvas_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $notificacoes_salvas_list->pageUrl() ?>start=<?php echo $notificacoes_salvas_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($notificacoes_salvas_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $notificacoes_salvas_list->pageUrl() ?>start=<?php echo $notificacoes_salvas_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $notificacoes_salvas_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($notificacoes_salvas_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $notificacoes_salvas_list->pageUrl() ?>start=<?php echo $notificacoes_salvas_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($notificacoes_salvas_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $notificacoes_salvas_list->pageUrl() ?>start=<?php echo $notificacoes_salvas_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $notificacoes_salvas_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($notificacoes_salvas_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $notificacoes_salvas_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $notificacoes_salvas_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $notificacoes_salvas_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_salvas_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($notificacoes_salvas_list->TotalRecs == 0 && !$notificacoes_salvas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_salvas_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$notificacoes_salvas_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes_salvas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_salvas_list->terminate();
?>
