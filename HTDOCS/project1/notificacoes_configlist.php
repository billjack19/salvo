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
$notificacoes_config_list = new notificacoes_config_list();

// Run the page
$notificacoes_config_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_config_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes_config->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fnotificacoes_configlist = currentForm = new ew.Form("fnotificacoes_configlist", "list");
fnotificacoes_configlist.formKeyCountName = '<?php echo $notificacoes_config_list->FormKeyCountName ?>';

// Form_CustomValidate event
fnotificacoes_configlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_configlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fnotificacoes_configlistsrch = currentSearchForm = new ew.Form("fnotificacoes_configlistsrch");

// Filters
fnotificacoes_configlistsrch.filterList = <?php echo $notificacoes_config_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes_config->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($notificacoes_config_list->TotalRecs > 0 && $notificacoes_config_list->ExportOptions->visible()) { ?>
<?php $notificacoes_config_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_config_list->ImportOptions->visible()) { ?>
<?php $notificacoes_config_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_config_list->SearchOptions->visible()) { ?>
<?php $notificacoes_config_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_config_list->FilterOptions->visible()) { ?>
<?php $notificacoes_config_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$notificacoes_config_list->renderOtherOptions();
?>
<?php if (!$notificacoes_config->isExport() && !$notificacoes_config->CurrentAction) { ?>
<form name="fnotificacoes_configlistsrch" id="fnotificacoes_configlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($notificacoes_config_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fnotificacoes_configlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="notificacoes_config">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($notificacoes_config_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($notificacoes_config_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $notificacoes_config_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($notificacoes_config_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_config_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_config_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_config_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $notificacoes_config_list->showPageHeader(); ?>
<?php
$notificacoes_config_list->showMessage();
?>
<?php if ($notificacoes_config_list->TotalRecs > 0 || $notificacoes_config->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($notificacoes_config_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> notificacoes_config">
<form name="fnotificacoes_configlist" id="fnotificacoes_configlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_config_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_config_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_config">
<div id="gmp_notificacoes_config" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($notificacoes_config_list->TotalRecs > 0 || $notificacoes_config->isGridEdit()) { ?>
<table id="tbl_notificacoes_configlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$notificacoes_config_list->RowType = ROWTYPE_HEADER;

// Render list options
$notificacoes_config_list->renderListOptions();

// Render list options (header, left)
$notificacoes_config_list->ListOptions->render("header", "left");
?>
<?php if ($notificacoes_config->id_notificacoes_config->Visible) { // id_notificacoes_config ?>
	<?php if ($notificacoes_config->sortUrl($notificacoes_config->id_notificacoes_config) == "") { ?>
		<th data-name="id_notificacoes_config" class="<?php echo $notificacoes_config->id_notificacoes_config->headerCellClass() ?>"><div id="elh_notificacoes_config_id_notificacoes_config" class="notificacoes_config_id_notificacoes_config"><div class="ew-table-header-caption"><?php echo $notificacoes_config->id_notificacoes_config->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_notificacoes_config" class="<?php echo $notificacoes_config->id_notificacoes_config->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_config->SortUrl($notificacoes_config->id_notificacoes_config) ?>',1);"><div id="elh_notificacoes_config_id_notificacoes_config" class="notificacoes_config_id_notificacoes_config">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_config->id_notificacoes_config->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_config->id_notificacoes_config->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_config->id_notificacoes_config->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_config->area_notificacoes_config->Visible) { // area_notificacoes_config ?>
	<?php if ($notificacoes_config->sortUrl($notificacoes_config->area_notificacoes_config) == "") { ?>
		<th data-name="area_notificacoes_config" class="<?php echo $notificacoes_config->area_notificacoes_config->headerCellClass() ?>"><div id="elh_notificacoes_config_area_notificacoes_config" class="notificacoes_config_area_notificacoes_config"><div class="ew-table-header-caption"><?php echo $notificacoes_config->area_notificacoes_config->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area_notificacoes_config" class="<?php echo $notificacoes_config->area_notificacoes_config->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_config->SortUrl($notificacoes_config->area_notificacoes_config) ?>',1);"><div id="elh_notificacoes_config_area_notificacoes_config" class="notificacoes_config_area_notificacoes_config">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_config->area_notificacoes_config->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_config->area_notificacoes_config->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_config->area_notificacoes_config->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_config->tipo_alteracao_notificacoes_config->Visible) { // tipo_alteracao_notificacoes_config ?>
	<?php if ($notificacoes_config->sortUrl($notificacoes_config->tipo_alteracao_notificacoes_config) == "") { ?>
		<th data-name="tipo_alteracao_notificacoes_config" class="<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->headerCellClass() ?>"><div id="elh_notificacoes_config_tipo_alteracao_notificacoes_config" class="notificacoes_config_tipo_alteracao_notificacoes_config"><div class="ew-table-header-caption"><?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_alteracao_notificacoes_config" class="<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_config->SortUrl($notificacoes_config->tipo_alteracao_notificacoes_config) ?>',1);"><div id="elh_notificacoes_config_tipo_alteracao_notificacoes_config" class="notificacoes_config_tipo_alteracao_notificacoes_config">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_config->tipo_alteracao_notificacoes_config->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_config->tipo_alteracao_notificacoes_config->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_config->data_atualizacao_notificacoes_config->Visible) { // data_atualizacao_notificacoes_config ?>
	<?php if ($notificacoes_config->sortUrl($notificacoes_config->data_atualizacao_notificacoes_config) == "") { ?>
		<th data-name="data_atualizacao_notificacoes_config" class="<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->headerCellClass() ?>"><div id="elh_notificacoes_config_data_atualizacao_notificacoes_config" class="notificacoes_config_data_atualizacao_notificacoes_config"><div class="ew-table-header-caption"><?php echo $notificacoes_config->data_atualizacao_notificacoes_config->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_notificacoes_config" class="<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_config->SortUrl($notificacoes_config->data_atualizacao_notificacoes_config) ?>',1);"><div id="elh_notificacoes_config_data_atualizacao_notificacoes_config" class="notificacoes_config_data_atualizacao_notificacoes_config">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_config->data_atualizacao_notificacoes_config->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_config->data_atualizacao_notificacoes_config->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_config->data_atualizacao_notificacoes_config->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_config->usuario_id->Visible) { // usuario_id ?>
	<?php if ($notificacoes_config->sortUrl($notificacoes_config->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $notificacoes_config->usuario_id->headerCellClass() ?>"><div id="elh_notificacoes_config_usuario_id" class="notificacoes_config_usuario_id"><div class="ew-table-header-caption"><?php echo $notificacoes_config->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $notificacoes_config->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_config->SortUrl($notificacoes_config->usuario_id) ?>',1);"><div id="elh_notificacoes_config_usuario_id" class="notificacoes_config_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_config->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_config->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_config->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_config->bool_ativo_notificacoes_config->Visible) { // bool_ativo_notificacoes_config ?>
	<?php if ($notificacoes_config->sortUrl($notificacoes_config->bool_ativo_notificacoes_config) == "") { ?>
		<th data-name="bool_ativo_notificacoes_config" class="<?php echo $notificacoes_config->bool_ativo_notificacoes_config->headerCellClass() ?>"><div id="elh_notificacoes_config_bool_ativo_notificacoes_config" class="notificacoes_config_bool_ativo_notificacoes_config"><div class="ew-table-header-caption"><?php echo $notificacoes_config->bool_ativo_notificacoes_config->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_notificacoes_config" class="<?php echo $notificacoes_config->bool_ativo_notificacoes_config->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_config->SortUrl($notificacoes_config->bool_ativo_notificacoes_config) ?>',1);"><div id="elh_notificacoes_config_bool_ativo_notificacoes_config" class="notificacoes_config_bool_ativo_notificacoes_config">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_config->bool_ativo_notificacoes_config->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_config->bool_ativo_notificacoes_config->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_config->bool_ativo_notificacoes_config->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$notificacoes_config_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($notificacoes_config->ExportAll && $notificacoes_config->isExport()) {
	$notificacoes_config_list->StopRec = $notificacoes_config_list->TotalRecs;
} else {

	// Set the last record to display
	if ($notificacoes_config_list->TotalRecs > $notificacoes_config_list->StartRec + $notificacoes_config_list->DisplayRecs - 1)
		$notificacoes_config_list->StopRec = $notificacoes_config_list->StartRec + $notificacoes_config_list->DisplayRecs - 1;
	else
		$notificacoes_config_list->StopRec = $notificacoes_config_list->TotalRecs;
}
$notificacoes_config_list->RecCnt = $notificacoes_config_list->StartRec - 1;
if ($notificacoes_config_list->Recordset && !$notificacoes_config_list->Recordset->EOF) {
	$notificacoes_config_list->Recordset->moveFirst();
	$selectLimit = $notificacoes_config_list->UseSelectLimit;
	if (!$selectLimit && $notificacoes_config_list->StartRec > 1)
		$notificacoes_config_list->Recordset->move($notificacoes_config_list->StartRec - 1);
} elseif (!$notificacoes_config->AllowAddDeleteRow && $notificacoes_config_list->StopRec == 0) {
	$notificacoes_config_list->StopRec = $notificacoes_config->GridAddRowCount;
}

// Initialize aggregate
$notificacoes_config->RowType = ROWTYPE_AGGREGATEINIT;
$notificacoes_config->resetAttributes();
$notificacoes_config_list->renderRow();
while ($notificacoes_config_list->RecCnt < $notificacoes_config_list->StopRec) {
	$notificacoes_config_list->RecCnt++;
	if ($notificacoes_config_list->RecCnt >= $notificacoes_config_list->StartRec) {
		$notificacoes_config_list->RowCnt++;

		// Set up key count
		$notificacoes_config_list->KeyCount = $notificacoes_config_list->RowIndex;

		// Init row class and style
		$notificacoes_config->resetAttributes();
		$notificacoes_config->CssClass = "";
		if ($notificacoes_config->isGridAdd()) {
		} else {
			$notificacoes_config_list->loadRowValues($notificacoes_config_list->Recordset); // Load row values
		}
		$notificacoes_config->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$notificacoes_config->RowAttrs = array_merge($notificacoes_config->RowAttrs, array('data-rowindex'=>$notificacoes_config_list->RowCnt, 'id'=>'r' . $notificacoes_config_list->RowCnt . '_notificacoes_config', 'data-rowtype'=>$notificacoes_config->RowType));

		// Render row
		$notificacoes_config_list->renderRow();

		// Render list options
		$notificacoes_config_list->renderListOptions();
?>
	<tr<?php echo $notificacoes_config->rowAttributes() ?>>
<?php

// Render list options (body, left)
$notificacoes_config_list->ListOptions->render("body", "left", $notificacoes_config_list->RowCnt);
?>
	<?php if ($notificacoes_config->id_notificacoes_config->Visible) { // id_notificacoes_config ?>
		<td data-name="id_notificacoes_config"<?php echo $notificacoes_config->id_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_list->RowCnt ?>_notificacoes_config_id_notificacoes_config" class="notificacoes_config_id_notificacoes_config">
<span<?php echo $notificacoes_config->id_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->id_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_config->area_notificacoes_config->Visible) { // area_notificacoes_config ?>
		<td data-name="area_notificacoes_config"<?php echo $notificacoes_config->area_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_list->RowCnt ?>_notificacoes_config_area_notificacoes_config" class="notificacoes_config_area_notificacoes_config">
<span<?php echo $notificacoes_config->area_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->area_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_config->tipo_alteracao_notificacoes_config->Visible) { // tipo_alteracao_notificacoes_config ?>
		<td data-name="tipo_alteracao_notificacoes_config"<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_list->RowCnt ?>_notificacoes_config_tipo_alteracao_notificacoes_config" class="notificacoes_config_tipo_alteracao_notificacoes_config">
<span<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->tipo_alteracao_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_config->data_atualizacao_notificacoes_config->Visible) { // data_atualizacao_notificacoes_config ?>
		<td data-name="data_atualizacao_notificacoes_config"<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_list->RowCnt ?>_notificacoes_config_data_atualizacao_notificacoes_config" class="notificacoes_config_data_atualizacao_notificacoes_config">
<span<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->data_atualizacao_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_config->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $notificacoes_config->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_list->RowCnt ?>_notificacoes_config_usuario_id" class="notificacoes_config_usuario_id">
<span<?php echo $notificacoes_config->usuario_id->viewAttributes() ?>>
<?php echo $notificacoes_config->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_config->bool_ativo_notificacoes_config->Visible) { // bool_ativo_notificacoes_config ?>
		<td data-name="bool_ativo_notificacoes_config"<?php echo $notificacoes_config->bool_ativo_notificacoes_config->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_config_list->RowCnt ?>_notificacoes_config_bool_ativo_notificacoes_config" class="notificacoes_config_bool_ativo_notificacoes_config">
<span<?php echo $notificacoes_config->bool_ativo_notificacoes_config->viewAttributes() ?>>
<?php echo $notificacoes_config->bool_ativo_notificacoes_config->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$notificacoes_config_list->ListOptions->render("body", "right", $notificacoes_config_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$notificacoes_config->isGridAdd())
		$notificacoes_config_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$notificacoes_config->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($notificacoes_config_list->Recordset)
	$notificacoes_config_list->Recordset->Close();
?>
<?php if (!$notificacoes_config->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$notificacoes_config->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($notificacoes_config_list->Pager)) $notificacoes_config_list->Pager = new PrevNextPager($notificacoes_config_list->StartRec, $notificacoes_config_list->DisplayRecs, $notificacoes_config_list->TotalRecs, $notificacoes_config_list->AutoHidePager) ?>
<?php if ($notificacoes_config_list->Pager->RecordCount > 0 && $notificacoes_config_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($notificacoes_config_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $notificacoes_config_list->pageUrl() ?>start=<?php echo $notificacoes_config_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($notificacoes_config_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $notificacoes_config_list->pageUrl() ?>start=<?php echo $notificacoes_config_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $notificacoes_config_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($notificacoes_config_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $notificacoes_config_list->pageUrl() ?>start=<?php echo $notificacoes_config_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($notificacoes_config_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $notificacoes_config_list->pageUrl() ?>start=<?php echo $notificacoes_config_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $notificacoes_config_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($notificacoes_config_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $notificacoes_config_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $notificacoes_config_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $notificacoes_config_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_config_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($notificacoes_config_list->TotalRecs == 0 && !$notificacoes_config->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_config_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$notificacoes_config_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes_config->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_config_list->terminate();
?>
