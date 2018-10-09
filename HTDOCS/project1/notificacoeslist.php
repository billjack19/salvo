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
$notificacoes_list = new notificacoes_list();

// Run the page
$notificacoes_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fnotificacoeslist = currentForm = new ew.Form("fnotificacoeslist", "list");
fnotificacoeslist.formKeyCountName = '<?php echo $notificacoes_list->FormKeyCountName ?>';

// Form_CustomValidate event
fnotificacoeslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoeslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoeslist.lists["x_tipo_alteracao_notificacoes"] = <?php echo $notificacoes_list->tipo_alteracao_notificacoes->Lookup->toClientList() ?>;
fnotificacoeslist.lists["x_tipo_alteracao_notificacoes"].options = <?php echo JsonEncode($notificacoes_list->tipo_alteracao_notificacoes->options(FALSE, TRUE)) ?>;

// Form object for search
var fnotificacoeslistsrch = currentSearchForm = new ew.Form("fnotificacoeslistsrch");

// Validate function for search
fnotificacoeslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fnotificacoeslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoeslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoeslistsrch.lists["x_tipo_alteracao_notificacoes"] = <?php echo $notificacoes_list->tipo_alteracao_notificacoes->Lookup->toClientList() ?>;
fnotificacoeslistsrch.lists["x_tipo_alteracao_notificacoes"].options = <?php echo JsonEncode($notificacoes_list->tipo_alteracao_notificacoes->options(FALSE, TRUE)) ?>;

// Filters
fnotificacoeslistsrch.filterList = <?php echo $notificacoes_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($notificacoes_list->TotalRecs > 0 && $notificacoes_list->ExportOptions->visible()) { ?>
<?php $notificacoes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_list->ImportOptions->visible()) { ?>
<?php $notificacoes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_list->SearchOptions->visible()) { ?>
<?php $notificacoes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_list->FilterOptions->visible()) { ?>
<?php $notificacoes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$notificacoes_list->renderOtherOptions();
?>
<?php if (!$notificacoes->isExport() && !$notificacoes->CurrentAction) { ?>
<form name="fnotificacoeslistsrch" id="fnotificacoeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($notificacoes_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fnotificacoeslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="notificacoes">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$notificacoes_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$notificacoes->RowType = ROWTYPE_SEARCH;

// Render row
$notificacoes->resetAttributes();
$notificacoes_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($notificacoes->tipo_alteracao_notificacoes->Visible) { // tipo_alteracao_notificacoes ?>
	<div id="xsc_tipo_alteracao_notificacoes" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $notificacoes->tipo_alteracao_notificacoes->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_tipo_alteracao_notificacoes" id="z_tipo_alteracao_notificacoes" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_tipo_alteracao_notificacoes" class="ew-template"><input type="radio" class="form-check-input" data-table="notificacoes" data-field="x_tipo_alteracao_notificacoes" data-value-separator="<?php echo $notificacoes->tipo_alteracao_notificacoes->displayValueSeparatorAttribute() ?>" name="x_tipo_alteracao_notificacoes" id="x_tipo_alteracao_notificacoes" value="{value}"<?php echo $notificacoes->tipo_alteracao_notificacoes->editAttributes() ?>></div>
<div id="dsl_x_tipo_alteracao_notificacoes" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $notificacoes->tipo_alteracao_notificacoes->radioButtonListHtml(FALSE, "x_tipo_alteracao_notificacoes") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($notificacoes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($notificacoes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $notificacoes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($notificacoes_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $notificacoes_list->showPageHeader(); ?>
<?php
$notificacoes_list->showMessage();
?>
<?php if ($notificacoes_list->TotalRecs > 0 || $notificacoes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($notificacoes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> notificacoes">
<form name="fnotificacoeslist" id="fnotificacoeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes">
<div id="gmp_notificacoes" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($notificacoes_list->TotalRecs > 0 || $notificacoes->isGridEdit()) { ?>
<table id="tbl_notificacoeslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$notificacoes_list->RowType = ROWTYPE_HEADER;

// Render list options
$notificacoes_list->renderListOptions();

// Render list options (header, left)
$notificacoes_list->ListOptions->render("header", "left");
?>
<?php if ($notificacoes->id_notificacoes->Visible) { // id_notificacoes ?>
	<?php if ($notificacoes->sortUrl($notificacoes->id_notificacoes) == "") { ?>
		<th data-name="id_notificacoes" class="<?php echo $notificacoes->id_notificacoes->headerCellClass() ?>"><div id="elh_notificacoes_id_notificacoes" class="notificacoes_id_notificacoes"><div class="ew-table-header-caption"><?php echo $notificacoes->id_notificacoes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_notificacoes" class="<?php echo $notificacoes->id_notificacoes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->id_notificacoes) ?>',1);"><div id="elh_notificacoes_id_notificacoes" class="notificacoes_id_notificacoes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->id_notificacoes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->id_notificacoes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->id_notificacoes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes->usuario_atuador_notificacoes->Visible) { // usuario_atuador_notificacoes ?>
	<?php if ($notificacoes->sortUrl($notificacoes->usuario_atuador_notificacoes) == "") { ?>
		<th data-name="usuario_atuador_notificacoes" class="<?php echo $notificacoes->usuario_atuador_notificacoes->headerCellClass() ?>"><div id="elh_notificacoes_usuario_atuador_notificacoes" class="notificacoes_usuario_atuador_notificacoes"><div class="ew-table-header-caption"><?php echo $notificacoes->usuario_atuador_notificacoes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_atuador_notificacoes" class="<?php echo $notificacoes->usuario_atuador_notificacoes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->usuario_atuador_notificacoes) ?>',1);"><div id="elh_notificacoes_usuario_atuador_notificacoes" class="notificacoes_usuario_atuador_notificacoes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->usuario_atuador_notificacoes->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->usuario_atuador_notificacoes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->usuario_atuador_notificacoes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes->usuaio_requerente_notificacoes->Visible) { // usuaio_requerente_notificacoes ?>
	<?php if ($notificacoes->sortUrl($notificacoes->usuaio_requerente_notificacoes) == "") { ?>
		<th data-name="usuaio_requerente_notificacoes" class="<?php echo $notificacoes->usuaio_requerente_notificacoes->headerCellClass() ?>"><div id="elh_notificacoes_usuaio_requerente_notificacoes" class="notificacoes_usuaio_requerente_notificacoes"><div class="ew-table-header-caption"><?php echo $notificacoes->usuaio_requerente_notificacoes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuaio_requerente_notificacoes" class="<?php echo $notificacoes->usuaio_requerente_notificacoes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->usuaio_requerente_notificacoes) ?>',1);"><div id="elh_notificacoes_usuaio_requerente_notificacoes" class="notificacoes_usuaio_requerente_notificacoes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->usuaio_requerente_notificacoes->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->usuaio_requerente_notificacoes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->usuaio_requerente_notificacoes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes->tipo_alteracao_notificacoes->Visible) { // tipo_alteracao_notificacoes ?>
	<?php if ($notificacoes->sortUrl($notificacoes->tipo_alteracao_notificacoes) == "") { ?>
		<th data-name="tipo_alteracao_notificacoes" class="<?php echo $notificacoes->tipo_alteracao_notificacoes->headerCellClass() ?>"><div id="elh_notificacoes_tipo_alteracao_notificacoes" class="notificacoes_tipo_alteracao_notificacoes"><div class="ew-table-header-caption"><?php echo $notificacoes->tipo_alteracao_notificacoes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_alteracao_notificacoes" class="<?php echo $notificacoes->tipo_alteracao_notificacoes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->tipo_alteracao_notificacoes) ?>',1);"><div id="elh_notificacoes_tipo_alteracao_notificacoes" class="notificacoes_tipo_alteracao_notificacoes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->tipo_alteracao_notificacoes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->tipo_alteracao_notificacoes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->tipo_alteracao_notificacoes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<?php if ($notificacoes->sortUrl($notificacoes->notificacoes_config_id) == "") { ?>
		<th data-name="notificacoes_config_id" class="<?php echo $notificacoes->notificacoes_config_id->headerCellClass() ?>"><div id="elh_notificacoes_notificacoes_config_id" class="notificacoes_notificacoes_config_id"><div class="ew-table-header-caption"><?php echo $notificacoes->notificacoes_config_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="notificacoes_config_id" class="<?php echo $notificacoes->notificacoes_config_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->notificacoes_config_id) ?>',1);"><div id="elh_notificacoes_notificacoes_config_id" class="notificacoes_notificacoes_config_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->notificacoes_config_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->notificacoes_config_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->notificacoes_config_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes->bool_view_notificacoes->Visible) { // bool_view_notificacoes ?>
	<?php if ($notificacoes->sortUrl($notificacoes->bool_view_notificacoes) == "") { ?>
		<th data-name="bool_view_notificacoes" class="<?php echo $notificacoes->bool_view_notificacoes->headerCellClass() ?>"><div id="elh_notificacoes_bool_view_notificacoes" class="notificacoes_bool_view_notificacoes"><div class="ew-table-header-caption"><?php echo $notificacoes->bool_view_notificacoes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_view_notificacoes" class="<?php echo $notificacoes->bool_view_notificacoes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->bool_view_notificacoes) ?>',1);"><div id="elh_notificacoes_bool_view_notificacoes" class="notificacoes_bool_view_notificacoes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->bool_view_notificacoes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->bool_view_notificacoes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->bool_view_notificacoes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes->data_atualizacao_notificacoes->Visible) { // data_atualizacao_notificacoes ?>
	<?php if ($notificacoes->sortUrl($notificacoes->data_atualizacao_notificacoes) == "") { ?>
		<th data-name="data_atualizacao_notificacoes" class="<?php echo $notificacoes->data_atualizacao_notificacoes->headerCellClass() ?>"><div id="elh_notificacoes_data_atualizacao_notificacoes" class="notificacoes_data_atualizacao_notificacoes"><div class="ew-table-header-caption"><?php echo $notificacoes->data_atualizacao_notificacoes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_notificacoes" class="<?php echo $notificacoes->data_atualizacao_notificacoes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->data_atualizacao_notificacoes) ?>',1);"><div id="elh_notificacoes_data_atualizacao_notificacoes" class="notificacoes_data_atualizacao_notificacoes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->data_atualizacao_notificacoes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->data_atualizacao_notificacoes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->data_atualizacao_notificacoes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes->bool_ativo_notificacoes->Visible) { // bool_ativo_notificacoes ?>
	<?php if ($notificacoes->sortUrl($notificacoes->bool_ativo_notificacoes) == "") { ?>
		<th data-name="bool_ativo_notificacoes" class="<?php echo $notificacoes->bool_ativo_notificacoes->headerCellClass() ?>"><div id="elh_notificacoes_bool_ativo_notificacoes" class="notificacoes_bool_ativo_notificacoes"><div class="ew-table-header-caption"><?php echo $notificacoes->bool_ativo_notificacoes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_notificacoes" class="<?php echo $notificacoes->bool_ativo_notificacoes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes->SortUrl($notificacoes->bool_ativo_notificacoes) ?>',1);"><div id="elh_notificacoes_bool_ativo_notificacoes" class="notificacoes_bool_ativo_notificacoes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes->bool_ativo_notificacoes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes->bool_ativo_notificacoes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes->bool_ativo_notificacoes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$notificacoes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($notificacoes->ExportAll && $notificacoes->isExport()) {
	$notificacoes_list->StopRec = $notificacoes_list->TotalRecs;
} else {

	// Set the last record to display
	if ($notificacoes_list->TotalRecs > $notificacoes_list->StartRec + $notificacoes_list->DisplayRecs - 1)
		$notificacoes_list->StopRec = $notificacoes_list->StartRec + $notificacoes_list->DisplayRecs - 1;
	else
		$notificacoes_list->StopRec = $notificacoes_list->TotalRecs;
}
$notificacoes_list->RecCnt = $notificacoes_list->StartRec - 1;
if ($notificacoes_list->Recordset && !$notificacoes_list->Recordset->EOF) {
	$notificacoes_list->Recordset->moveFirst();
	$selectLimit = $notificacoes_list->UseSelectLimit;
	if (!$selectLimit && $notificacoes_list->StartRec > 1)
		$notificacoes_list->Recordset->move($notificacoes_list->StartRec - 1);
} elseif (!$notificacoes->AllowAddDeleteRow && $notificacoes_list->StopRec == 0) {
	$notificacoes_list->StopRec = $notificacoes->GridAddRowCount;
}

// Initialize aggregate
$notificacoes->RowType = ROWTYPE_AGGREGATEINIT;
$notificacoes->resetAttributes();
$notificacoes_list->renderRow();
while ($notificacoes_list->RecCnt < $notificacoes_list->StopRec) {
	$notificacoes_list->RecCnt++;
	if ($notificacoes_list->RecCnt >= $notificacoes_list->StartRec) {
		$notificacoes_list->RowCnt++;

		// Set up key count
		$notificacoes_list->KeyCount = $notificacoes_list->RowIndex;

		// Init row class and style
		$notificacoes->resetAttributes();
		$notificacoes->CssClass = "";
		if ($notificacoes->isGridAdd()) {
		} else {
			$notificacoes_list->loadRowValues($notificacoes_list->Recordset); // Load row values
		}
		$notificacoes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$notificacoes->RowAttrs = array_merge($notificacoes->RowAttrs, array('data-rowindex'=>$notificacoes_list->RowCnt, 'id'=>'r' . $notificacoes_list->RowCnt . '_notificacoes', 'data-rowtype'=>$notificacoes->RowType));

		// Render row
		$notificacoes_list->renderRow();

		// Render list options
		$notificacoes_list->renderListOptions();
?>
	<tr<?php echo $notificacoes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$notificacoes_list->ListOptions->render("body", "left", $notificacoes_list->RowCnt);
?>
	<?php if ($notificacoes->id_notificacoes->Visible) { // id_notificacoes ?>
		<td data-name="id_notificacoes"<?php echo $notificacoes->id_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_id_notificacoes" class="notificacoes_id_notificacoes">
<span<?php echo $notificacoes->id_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->id_notificacoes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes->usuario_atuador_notificacoes->Visible) { // usuario_atuador_notificacoes ?>
		<td data-name="usuario_atuador_notificacoes"<?php echo $notificacoes->usuario_atuador_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_usuario_atuador_notificacoes" class="notificacoes_usuario_atuador_notificacoes">
<span<?php echo $notificacoes->usuario_atuador_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->usuario_atuador_notificacoes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes->usuaio_requerente_notificacoes->Visible) { // usuaio_requerente_notificacoes ?>
		<td data-name="usuaio_requerente_notificacoes"<?php echo $notificacoes->usuaio_requerente_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_usuaio_requerente_notificacoes" class="notificacoes_usuaio_requerente_notificacoes">
<span<?php echo $notificacoes->usuaio_requerente_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->usuaio_requerente_notificacoes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes->tipo_alteracao_notificacoes->Visible) { // tipo_alteracao_notificacoes ?>
		<td data-name="tipo_alteracao_notificacoes"<?php echo $notificacoes->tipo_alteracao_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_tipo_alteracao_notificacoes" class="notificacoes_tipo_alteracao_notificacoes">
<span<?php echo $notificacoes->tipo_alteracao_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->tipo_alteracao_notificacoes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<td data-name="notificacoes_config_id"<?php echo $notificacoes->notificacoes_config_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_notificacoes_config_id" class="notificacoes_notificacoes_config_id">
<span<?php echo $notificacoes->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes->bool_view_notificacoes->Visible) { // bool_view_notificacoes ?>
		<td data-name="bool_view_notificacoes"<?php echo $notificacoes->bool_view_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_bool_view_notificacoes" class="notificacoes_bool_view_notificacoes">
<span<?php echo $notificacoes->bool_view_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->bool_view_notificacoes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes->data_atualizacao_notificacoes->Visible) { // data_atualizacao_notificacoes ?>
		<td data-name="data_atualizacao_notificacoes"<?php echo $notificacoes->data_atualizacao_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_data_atualizacao_notificacoes" class="notificacoes_data_atualizacao_notificacoes">
<span<?php echo $notificacoes->data_atualizacao_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->data_atualizacao_notificacoes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes->bool_ativo_notificacoes->Visible) { // bool_ativo_notificacoes ?>
		<td data-name="bool_ativo_notificacoes"<?php echo $notificacoes->bool_ativo_notificacoes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_list->RowCnt ?>_notificacoes_bool_ativo_notificacoes" class="notificacoes_bool_ativo_notificacoes">
<span<?php echo $notificacoes->bool_ativo_notificacoes->viewAttributes() ?>>
<?php echo $notificacoes->bool_ativo_notificacoes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$notificacoes_list->ListOptions->render("body", "right", $notificacoes_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$notificacoes->isGridAdd())
		$notificacoes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$notificacoes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($notificacoes_list->Recordset)
	$notificacoes_list->Recordset->Close();
?>
<?php if (!$notificacoes->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$notificacoes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($notificacoes_list->Pager)) $notificacoes_list->Pager = new PrevNextPager($notificacoes_list->StartRec, $notificacoes_list->DisplayRecs, $notificacoes_list->TotalRecs, $notificacoes_list->AutoHidePager) ?>
<?php if ($notificacoes_list->Pager->RecordCount > 0 && $notificacoes_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($notificacoes_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $notificacoes_list->pageUrl() ?>start=<?php echo $notificacoes_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($notificacoes_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $notificacoes_list->pageUrl() ?>start=<?php echo $notificacoes_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $notificacoes_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($notificacoes_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $notificacoes_list->pageUrl() ?>start=<?php echo $notificacoes_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($notificacoes_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $notificacoes_list->pageUrl() ?>start=<?php echo $notificacoes_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $notificacoes_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($notificacoes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $notificacoes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $notificacoes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $notificacoes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($notificacoes_list->TotalRecs == 0 && !$notificacoes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$notificacoes_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_list->terminate();
?>
