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
$notificacoes_pendentes_list = new notificacoes_pendentes_list();

// Run the page
$notificacoes_pendentes_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$notificacoes_pendentes_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$notificacoes_pendentes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fnotificacoes_pendenteslist = currentForm = new ew.Form("fnotificacoes_pendenteslist", "list");
fnotificacoes_pendenteslist.formKeyCountName = '<?php echo $notificacoes_pendentes_list->FormKeyCountName ?>';

// Form_CustomValidate event
fnotificacoes_pendenteslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_pendenteslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoes_pendenteslist.lists["x_tipo_alteracao_notificacoes_pendentes"] = <?php echo $notificacoes_pendentes_list->tipo_alteracao_notificacoes_pendentes->Lookup->toClientList() ?>;
fnotificacoes_pendenteslist.lists["x_tipo_alteracao_notificacoes_pendentes"].options = <?php echo JsonEncode($notificacoes_pendentes_list->tipo_alteracao_notificacoes_pendentes->options(FALSE, TRUE)) ?>;

// Form object for search
var fnotificacoes_pendenteslistsrch = currentSearchForm = new ew.Form("fnotificacoes_pendenteslistsrch");

// Validate function for search
fnotificacoes_pendenteslistsrch.validate = function(fobj) {
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
fnotificacoes_pendenteslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnotificacoes_pendenteslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fnotificacoes_pendenteslistsrch.lists["x_tipo_alteracao_notificacoes_pendentes"] = <?php echo $notificacoes_pendentes_list->tipo_alteracao_notificacoes_pendentes->Lookup->toClientList() ?>;
fnotificacoes_pendenteslistsrch.lists["x_tipo_alteracao_notificacoes_pendentes"].options = <?php echo JsonEncode($notificacoes_pendentes_list->tipo_alteracao_notificacoes_pendentes->options(FALSE, TRUE)) ?>;

// Filters
fnotificacoes_pendenteslistsrch.filterList = <?php echo $notificacoes_pendentes_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$notificacoes_pendentes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($notificacoes_pendentes_list->TotalRecs > 0 && $notificacoes_pendentes_list->ExportOptions->visible()) { ?>
<?php $notificacoes_pendentes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_pendentes_list->ImportOptions->visible()) { ?>
<?php $notificacoes_pendentes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_pendentes_list->SearchOptions->visible()) { ?>
<?php $notificacoes_pendentes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($notificacoes_pendentes_list->FilterOptions->visible()) { ?>
<?php $notificacoes_pendentes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$notificacoes_pendentes_list->renderOtherOptions();
?>
<?php if (!$notificacoes_pendentes->isExport() && !$notificacoes_pendentes->CurrentAction) { ?>
<form name="fnotificacoes_pendenteslistsrch" id="fnotificacoes_pendenteslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($notificacoes_pendentes_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fnotificacoes_pendenteslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="notificacoes_pendentes">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$notificacoes_pendentes_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$notificacoes_pendentes->RowType = ROWTYPE_SEARCH;

// Render row
$notificacoes_pendentes->resetAttributes();
$notificacoes_pendentes_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Visible) { // tipo_alteracao_notificacoes_pendentes ?>
	<div id="xsc_tipo_alteracao_notificacoes_pendentes" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_tipo_alteracao_notificacoes_pendentes" id="z_tipo_alteracao_notificacoes_pendentes" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_tipo_alteracao_notificacoes_pendentes" class="ew-template"><input type="radio" class="form-check-input" data-table="notificacoes_pendentes" data-field="x_tipo_alteracao_notificacoes_pendentes" data-value-separator="<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->displayValueSeparatorAttribute() ?>" name="x_tipo_alteracao_notificacoes_pendentes" id="x_tipo_alteracao_notificacoes_pendentes" value="{value}"<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->editAttributes() ?>></div>
<div id="dsl_x_tipo_alteracao_notificacoes_pendentes" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->radioButtonListHtml(FALSE, "x_tipo_alteracao_notificacoes_pendentes") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($notificacoes_pendentes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($notificacoes_pendentes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $notificacoes_pendentes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($notificacoes_pendentes_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_pendentes_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_pendentes_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($notificacoes_pendentes_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $notificacoes_pendentes_list->showPageHeader(); ?>
<?php
$notificacoes_pendentes_list->showMessage();
?>
<?php if ($notificacoes_pendentes_list->TotalRecs > 0 || $notificacoes_pendentes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($notificacoes_pendentes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> notificacoes_pendentes">
<form name="fnotificacoes_pendenteslist" id="fnotificacoes_pendenteslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($notificacoes_pendentes_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $notificacoes_pendentes_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="notificacoes_pendentes">
<div id="gmp_notificacoes_pendentes" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($notificacoes_pendentes_list->TotalRecs > 0 || $notificacoes_pendentes->isGridEdit()) { ?>
<table id="tbl_notificacoes_pendenteslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$notificacoes_pendentes_list->RowType = ROWTYPE_HEADER;

// Render list options
$notificacoes_pendentes_list->renderListOptions();

// Render list options (header, left)
$notificacoes_pendentes_list->ListOptions->render("header", "left");
?>
<?php if ($notificacoes_pendentes->id_notificacoes_pendentes->Visible) { // id_notificacoes_pendentes ?>
	<?php if ($notificacoes_pendentes->sortUrl($notificacoes_pendentes->id_notificacoes_pendentes) == "") { ?>
		<th data-name="id_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->headerCellClass() ?>"><div id="elh_notificacoes_pendentes_id_notificacoes_pendentes" class="notificacoes_pendentes_id_notificacoes_pendentes"><div class="ew-table-header-caption"><?php echo $notificacoes_pendentes->id_notificacoes_pendentes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_pendentes->SortUrl($notificacoes_pendentes->id_notificacoes_pendentes) ?>',1);"><div id="elh_notificacoes_pendentes_id_notificacoes_pendentes" class="notificacoes_pendentes_id_notificacoes_pendentes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_pendentes->id_notificacoes_pendentes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_pendentes->id_notificacoes_pendentes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_pendentes->id_notificacoes_pendentes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->Visible) { // usuario_atuador_notificacoes_pendentes ?>
	<?php if ($notificacoes_pendentes->sortUrl($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes) == "") { ?>
		<th data-name="usuario_atuador_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->headerCellClass() ?>"><div id="elh_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes" class="notificacoes_pendentes_usuario_atuador_notificacoes_pendentes"><div class="ew-table-header-caption"><?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_atuador_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_pendentes->SortUrl($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes) ?>',1);"><div id="elh_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes" class="notificacoes_pendentes_usuario_atuador_notificacoes_pendentes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->Visible) { // usuaio_requerente_notificacoes_pendentes ?>
	<?php if ($notificacoes_pendentes->sortUrl($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes) == "") { ?>
		<th data-name="usuaio_requerente_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->headerCellClass() ?>"><div id="elh_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes" class="notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes"><div class="ew-table-header-caption"><?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuaio_requerente_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_pendentes->SortUrl($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes) ?>',1);"><div id="elh_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes" class="notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Visible) { // tipo_alteracao_notificacoes_pendentes ?>
	<?php if ($notificacoes_pendentes->sortUrl($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes) == "") { ?>
		<th data-name="tipo_alteracao_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->headerCellClass() ?>"><div id="elh_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes" class="notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes"><div class="ew-table-header-caption"><?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipo_alteracao_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_pendentes->SortUrl($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes) ?>',1);"><div id="elh_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes" class="notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_pendentes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
	<?php if ($notificacoes_pendentes->sortUrl($notificacoes_pendentes->notificacoes_config_id) == "") { ?>
		<th data-name="notificacoes_config_id" class="<?php echo $notificacoes_pendentes->notificacoes_config_id->headerCellClass() ?>"><div id="elh_notificacoes_pendentes_notificacoes_config_id" class="notificacoes_pendentes_notificacoes_config_id"><div class="ew-table-header-caption"><?php echo $notificacoes_pendentes->notificacoes_config_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="notificacoes_config_id" class="<?php echo $notificacoes_pendentes->notificacoes_config_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_pendentes->SortUrl($notificacoes_pendentes->notificacoes_config_id) ?>',1);"><div id="elh_notificacoes_pendentes_notificacoes_config_id" class="notificacoes_pendentes_notificacoes_config_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_pendentes->notificacoes_config_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_pendentes->notificacoes_config_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_pendentes->notificacoes_config_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->Visible) { // data_atualizacao_notificacoes_pendentes ?>
	<?php if ($notificacoes_pendentes->sortUrl($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes) == "") { ?>
		<th data-name="data_atualizacao_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->headerCellClass() ?>"><div id="elh_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes" class="notificacoes_pendentes_data_atualizacao_notificacoes_pendentes"><div class="ew-table-header-caption"><?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_pendentes->SortUrl($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes) ?>',1);"><div id="elh_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes" class="notificacoes_pendentes_data_atualizacao_notificacoes_pendentes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->Visible) { // bool_ativo_notificacoes_pendentes ?>
	<?php if ($notificacoes_pendentes->sortUrl($notificacoes_pendentes->bool_ativo_notificacoes_pendentes) == "") { ?>
		<th data-name="bool_ativo_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->headerCellClass() ?>"><div id="elh_notificacoes_pendentes_bool_ativo_notificacoes_pendentes" class="notificacoes_pendentes_bool_ativo_notificacoes_pendentes"><div class="ew-table-header-caption"><?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_notificacoes_pendentes" class="<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $notificacoes_pendentes->SortUrl($notificacoes_pendentes->bool_ativo_notificacoes_pendentes) ?>',1);"><div id="elh_notificacoes_pendentes_bool_ativo_notificacoes_pendentes" class="notificacoes_pendentes_bool_ativo_notificacoes_pendentes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->caption() ?></span><span class="ew-table-header-sort"><?php if ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$notificacoes_pendentes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($notificacoes_pendentes->ExportAll && $notificacoes_pendentes->isExport()) {
	$notificacoes_pendentes_list->StopRec = $notificacoes_pendentes_list->TotalRecs;
} else {

	// Set the last record to display
	if ($notificacoes_pendentes_list->TotalRecs > $notificacoes_pendentes_list->StartRec + $notificacoes_pendentes_list->DisplayRecs - 1)
		$notificacoes_pendentes_list->StopRec = $notificacoes_pendentes_list->StartRec + $notificacoes_pendentes_list->DisplayRecs - 1;
	else
		$notificacoes_pendentes_list->StopRec = $notificacoes_pendentes_list->TotalRecs;
}
$notificacoes_pendentes_list->RecCnt = $notificacoes_pendentes_list->StartRec - 1;
if ($notificacoes_pendentes_list->Recordset && !$notificacoes_pendentes_list->Recordset->EOF) {
	$notificacoes_pendentes_list->Recordset->moveFirst();
	$selectLimit = $notificacoes_pendentes_list->UseSelectLimit;
	if (!$selectLimit && $notificacoes_pendentes_list->StartRec > 1)
		$notificacoes_pendentes_list->Recordset->move($notificacoes_pendentes_list->StartRec - 1);
} elseif (!$notificacoes_pendentes->AllowAddDeleteRow && $notificacoes_pendentes_list->StopRec == 0) {
	$notificacoes_pendentes_list->StopRec = $notificacoes_pendentes->GridAddRowCount;
}

// Initialize aggregate
$notificacoes_pendentes->RowType = ROWTYPE_AGGREGATEINIT;
$notificacoes_pendentes->resetAttributes();
$notificacoes_pendentes_list->renderRow();
while ($notificacoes_pendentes_list->RecCnt < $notificacoes_pendentes_list->StopRec) {
	$notificacoes_pendentes_list->RecCnt++;
	if ($notificacoes_pendentes_list->RecCnt >= $notificacoes_pendentes_list->StartRec) {
		$notificacoes_pendentes_list->RowCnt++;

		// Set up key count
		$notificacoes_pendentes_list->KeyCount = $notificacoes_pendentes_list->RowIndex;

		// Init row class and style
		$notificacoes_pendentes->resetAttributes();
		$notificacoes_pendentes->CssClass = "";
		if ($notificacoes_pendentes->isGridAdd()) {
		} else {
			$notificacoes_pendentes_list->loadRowValues($notificacoes_pendentes_list->Recordset); // Load row values
		}
		$notificacoes_pendentes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$notificacoes_pendentes->RowAttrs = array_merge($notificacoes_pendentes->RowAttrs, array('data-rowindex'=>$notificacoes_pendentes_list->RowCnt, 'id'=>'r' . $notificacoes_pendentes_list->RowCnt . '_notificacoes_pendentes', 'data-rowtype'=>$notificacoes_pendentes->RowType));

		// Render row
		$notificacoes_pendentes_list->renderRow();

		// Render list options
		$notificacoes_pendentes_list->renderListOptions();
?>
	<tr<?php echo $notificacoes_pendentes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$notificacoes_pendentes_list->ListOptions->render("body", "left", $notificacoes_pendentes_list->RowCnt);
?>
	<?php if ($notificacoes_pendentes->id_notificacoes_pendentes->Visible) { // id_notificacoes_pendentes ?>
		<td data-name="id_notificacoes_pendentes"<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_list->RowCnt ?>_notificacoes_pendentes_id_notificacoes_pendentes" class="notificacoes_pendentes_id_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->id_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->Visible) { // usuario_atuador_notificacoes_pendentes ?>
		<td data-name="usuario_atuador_notificacoes_pendentes"<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_list->RowCnt ?>_notificacoes_pendentes_usuario_atuador_notificacoes_pendentes" class="notificacoes_pendentes_usuario_atuador_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->usuario_atuador_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->Visible) { // usuaio_requerente_notificacoes_pendentes ?>
		<td data-name="usuaio_requerente_notificacoes_pendentes"<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_list->RowCnt ?>_notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes" class="notificacoes_pendentes_usuaio_requerente_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->usuaio_requerente_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->Visible) { // tipo_alteracao_notificacoes_pendentes ?>
		<td data-name="tipo_alteracao_notificacoes_pendentes"<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_list->RowCnt ?>_notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes" class="notificacoes_pendentes_tipo_alteracao_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->tipo_alteracao_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_pendentes->notificacoes_config_id->Visible) { // notificacoes_config_id ?>
		<td data-name="notificacoes_config_id"<?php echo $notificacoes_pendentes->notificacoes_config_id->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_list->RowCnt ?>_notificacoes_pendentes_notificacoes_config_id" class="notificacoes_pendentes_notificacoes_config_id">
<span<?php echo $notificacoes_pendentes->notificacoes_config_id->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->notificacoes_config_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->Visible) { // data_atualizacao_notificacoes_pendentes ?>
		<td data-name="data_atualizacao_notificacoes_pendentes"<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_list->RowCnt ?>_notificacoes_pendentes_data_atualizacao_notificacoes_pendentes" class="notificacoes_pendentes_data_atualizacao_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->data_atualizacao_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($notificacoes_pendentes->bool_ativo_notificacoes_pendentes->Visible) { // bool_ativo_notificacoes_pendentes ?>
		<td data-name="bool_ativo_notificacoes_pendentes"<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->cellAttributes() ?>>
<span id="el<?php echo $notificacoes_pendentes_list->RowCnt ?>_notificacoes_pendentes_bool_ativo_notificacoes_pendentes" class="notificacoes_pendentes_bool_ativo_notificacoes_pendentes">
<span<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->viewAttributes() ?>>
<?php echo $notificacoes_pendentes->bool_ativo_notificacoes_pendentes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$notificacoes_pendentes_list->ListOptions->render("body", "right", $notificacoes_pendentes_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$notificacoes_pendentes->isGridAdd())
		$notificacoes_pendentes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$notificacoes_pendentes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($notificacoes_pendentes_list->Recordset)
	$notificacoes_pendentes_list->Recordset->Close();
?>
<?php if (!$notificacoes_pendentes->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$notificacoes_pendentes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($notificacoes_pendentes_list->Pager)) $notificacoes_pendentes_list->Pager = new PrevNextPager($notificacoes_pendentes_list->StartRec, $notificacoes_pendentes_list->DisplayRecs, $notificacoes_pendentes_list->TotalRecs, $notificacoes_pendentes_list->AutoHidePager) ?>
<?php if ($notificacoes_pendentes_list->Pager->RecordCount > 0 && $notificacoes_pendentes_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($notificacoes_pendentes_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $notificacoes_pendentes_list->pageUrl() ?>start=<?php echo $notificacoes_pendentes_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($notificacoes_pendentes_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $notificacoes_pendentes_list->pageUrl() ?>start=<?php echo $notificacoes_pendentes_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $notificacoes_pendentes_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($notificacoes_pendentes_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $notificacoes_pendentes_list->pageUrl() ?>start=<?php echo $notificacoes_pendentes_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($notificacoes_pendentes_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $notificacoes_pendentes_list->pageUrl() ?>start=<?php echo $notificacoes_pendentes_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $notificacoes_pendentes_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($notificacoes_pendentes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $notificacoes_pendentes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $notificacoes_pendentes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $notificacoes_pendentes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_pendentes_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($notificacoes_pendentes_list->TotalRecs == 0 && !$notificacoes_pendentes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($notificacoes_pendentes_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$notificacoes_pendentes_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$notificacoes_pendentes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$notificacoes_pendentes_list->terminate();
?>
