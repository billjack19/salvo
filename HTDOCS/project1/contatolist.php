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
$contato_list = new contato_list();

// Run the page
$contato_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$contato_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$contato->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcontatolist = currentForm = new ew.Form("fcontatolist", "list");
fcontatolist.formKeyCountName = '<?php echo $contato_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcontatolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcontatolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcontatolistsrch = currentSearchForm = new ew.Form("fcontatolistsrch");

// Filters
fcontatolistsrch.filterList = <?php echo $contato_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$contato->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($contato_list->TotalRecs > 0 && $contato_list->ExportOptions->visible()) { ?>
<?php $contato_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($contato_list->ImportOptions->visible()) { ?>
<?php $contato_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($contato_list->SearchOptions->visible()) { ?>
<?php $contato_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($contato_list->FilterOptions->visible()) { ?>
<?php $contato_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$contato_list->renderOtherOptions();
?>
<?php if (!$contato->isExport() && !$contato->CurrentAction) { ?>
<form name="fcontatolistsrch" id="fcontatolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($contato_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcontatolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="contato">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($contato_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($contato_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $contato_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($contato_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($contato_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($contato_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($contato_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $contato_list->showPageHeader(); ?>
<?php
$contato_list->showMessage();
?>
<?php if ($contato_list->TotalRecs > 0 || $contato->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($contato_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> contato">
<form name="fcontatolist" id="fcontatolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($contato_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $contato_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="contato">
<div id="gmp_contato" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($contato_list->TotalRecs > 0 || $contato->isGridEdit()) { ?>
<table id="tbl_contatolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$contato_list->RowType = ROWTYPE_HEADER;

// Render list options
$contato_list->renderListOptions();

// Render list options (header, left)
$contato_list->ListOptions->render("header", "left");
?>
<?php if ($contato->id_contato->Visible) { // id_contato ?>
	<?php if ($contato->sortUrl($contato->id_contato) == "") { ?>
		<th data-name="id_contato" class="<?php echo $contato->id_contato->headerCellClass() ?>"><div id="elh_contato_id_contato" class="contato_id_contato"><div class="ew-table-header-caption"><?php echo $contato->id_contato->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_contato" class="<?php echo $contato->id_contato->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->id_contato) ?>',1);"><div id="elh_contato_id_contato" class="contato_id_contato">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->id_contato->caption() ?></span><span class="ew-table-header-sort"><?php if ($contato->id_contato->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->id_contato->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($contato->nome_contato->Visible) { // nome_contato ?>
	<?php if ($contato->sortUrl($contato->nome_contato) == "") { ?>
		<th data-name="nome_contato" class="<?php echo $contato->nome_contato->headerCellClass() ?>"><div id="elh_contato_nome_contato" class="contato_nome_contato"><div class="ew-table-header-caption"><?php echo $contato->nome_contato->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nome_contato" class="<?php echo $contato->nome_contato->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->nome_contato) ?>',1);"><div id="elh_contato_nome_contato" class="contato_nome_contato">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->nome_contato->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($contato->nome_contato->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->nome_contato->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($contato->email_contato->Visible) { // email_contato ?>
	<?php if ($contato->sortUrl($contato->email_contato) == "") { ?>
		<th data-name="email_contato" class="<?php echo $contato->email_contato->headerCellClass() ?>"><div id="elh_contato_email_contato" class="contato_email_contato"><div class="ew-table-header-caption"><?php echo $contato->email_contato->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_contato" class="<?php echo $contato->email_contato->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->email_contato) ?>',1);"><div id="elh_contato_email_contato" class="contato_email_contato">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->email_contato->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($contato->email_contato->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->email_contato->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($contato->telefone_contato->Visible) { // telefone_contato ?>
	<?php if ($contato->sortUrl($contato->telefone_contato) == "") { ?>
		<th data-name="telefone_contato" class="<?php echo $contato->telefone_contato->headerCellClass() ?>"><div id="elh_contato_telefone_contato" class="contato_telefone_contato"><div class="ew-table-header-caption"><?php echo $contato->telefone_contato->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefone_contato" class="<?php echo $contato->telefone_contato->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->telefone_contato) ?>',1);"><div id="elh_contato_telefone_contato" class="contato_telefone_contato">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->telefone_contato->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($contato->telefone_contato->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->telefone_contato->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($contato->assunto_contato->Visible) { // assunto_contato ?>
	<?php if ($contato->sortUrl($contato->assunto_contato) == "") { ?>
		<th data-name="assunto_contato" class="<?php echo $contato->assunto_contato->headerCellClass() ?>"><div id="elh_contato_assunto_contato" class="contato_assunto_contato"><div class="ew-table-header-caption"><?php echo $contato->assunto_contato->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="assunto_contato" class="<?php echo $contato->assunto_contato->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->assunto_contato) ?>',1);"><div id="elh_contato_assunto_contato" class="contato_assunto_contato">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->assunto_contato->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($contato->assunto_contato->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->assunto_contato->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($contato->usuario_id->Visible) { // usuario_id ?>
	<?php if ($contato->sortUrl($contato->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $contato->usuario_id->headerCellClass() ?>"><div id="elh_contato_usuario_id" class="contato_usuario_id"><div class="ew-table-header-caption"><?php echo $contato->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $contato->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->usuario_id) ?>',1);"><div id="elh_contato_usuario_id" class="contato_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($contato->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($contato->data_atualizacao_contato->Visible) { // data_atualizacao_contato ?>
	<?php if ($contato->sortUrl($contato->data_atualizacao_contato) == "") { ?>
		<th data-name="data_atualizacao_contato" class="<?php echo $contato->data_atualizacao_contato->headerCellClass() ?>"><div id="elh_contato_data_atualizacao_contato" class="contato_data_atualizacao_contato"><div class="ew-table-header-caption"><?php echo $contato->data_atualizacao_contato->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_contato" class="<?php echo $contato->data_atualizacao_contato->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->data_atualizacao_contato) ?>',1);"><div id="elh_contato_data_atualizacao_contato" class="contato_data_atualizacao_contato">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->data_atualizacao_contato->caption() ?></span><span class="ew-table-header-sort"><?php if ($contato->data_atualizacao_contato->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->data_atualizacao_contato->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($contato->bool_ativo_contato->Visible) { // bool_ativo_contato ?>
	<?php if ($contato->sortUrl($contato->bool_ativo_contato) == "") { ?>
		<th data-name="bool_ativo_contato" class="<?php echo $contato->bool_ativo_contato->headerCellClass() ?>"><div id="elh_contato_bool_ativo_contato" class="contato_bool_ativo_contato"><div class="ew-table-header-caption"><?php echo $contato->bool_ativo_contato->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_contato" class="<?php echo $contato->bool_ativo_contato->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $contato->SortUrl($contato->bool_ativo_contato) ?>',1);"><div id="elh_contato_bool_ativo_contato" class="contato_bool_ativo_contato">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $contato->bool_ativo_contato->caption() ?></span><span class="ew-table-header-sort"><?php if ($contato->bool_ativo_contato->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($contato->bool_ativo_contato->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$contato_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($contato->ExportAll && $contato->isExport()) {
	$contato_list->StopRec = $contato_list->TotalRecs;
} else {

	// Set the last record to display
	if ($contato_list->TotalRecs > $contato_list->StartRec + $contato_list->DisplayRecs - 1)
		$contato_list->StopRec = $contato_list->StartRec + $contato_list->DisplayRecs - 1;
	else
		$contato_list->StopRec = $contato_list->TotalRecs;
}
$contato_list->RecCnt = $contato_list->StartRec - 1;
if ($contato_list->Recordset && !$contato_list->Recordset->EOF) {
	$contato_list->Recordset->moveFirst();
	$selectLimit = $contato_list->UseSelectLimit;
	if (!$selectLimit && $contato_list->StartRec > 1)
		$contato_list->Recordset->move($contato_list->StartRec - 1);
} elseif (!$contato->AllowAddDeleteRow && $contato_list->StopRec == 0) {
	$contato_list->StopRec = $contato->GridAddRowCount;
}

// Initialize aggregate
$contato->RowType = ROWTYPE_AGGREGATEINIT;
$contato->resetAttributes();
$contato_list->renderRow();
while ($contato_list->RecCnt < $contato_list->StopRec) {
	$contato_list->RecCnt++;
	if ($contato_list->RecCnt >= $contato_list->StartRec) {
		$contato_list->RowCnt++;

		// Set up key count
		$contato_list->KeyCount = $contato_list->RowIndex;

		// Init row class and style
		$contato->resetAttributes();
		$contato->CssClass = "";
		if ($contato->isGridAdd()) {
		} else {
			$contato_list->loadRowValues($contato_list->Recordset); // Load row values
		}
		$contato->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$contato->RowAttrs = array_merge($contato->RowAttrs, array('data-rowindex'=>$contato_list->RowCnt, 'id'=>'r' . $contato_list->RowCnt . '_contato', 'data-rowtype'=>$contato->RowType));

		// Render row
		$contato_list->renderRow();

		// Render list options
		$contato_list->renderListOptions();
?>
	<tr<?php echo $contato->rowAttributes() ?>>
<?php

// Render list options (body, left)
$contato_list->ListOptions->render("body", "left", $contato_list->RowCnt);
?>
	<?php if ($contato->id_contato->Visible) { // id_contato ?>
		<td data-name="id_contato"<?php echo $contato->id_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_id_contato" class="contato_id_contato">
<span<?php echo $contato->id_contato->viewAttributes() ?>>
<?php echo $contato->id_contato->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($contato->nome_contato->Visible) { // nome_contato ?>
		<td data-name="nome_contato"<?php echo $contato->nome_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_nome_contato" class="contato_nome_contato">
<span<?php echo $contato->nome_contato->viewAttributes() ?>>
<?php echo $contato->nome_contato->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($contato->email_contato->Visible) { // email_contato ?>
		<td data-name="email_contato"<?php echo $contato->email_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_email_contato" class="contato_email_contato">
<span<?php echo $contato->email_contato->viewAttributes() ?>>
<?php echo $contato->email_contato->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($contato->telefone_contato->Visible) { // telefone_contato ?>
		<td data-name="telefone_contato"<?php echo $contato->telefone_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_telefone_contato" class="contato_telefone_contato">
<span<?php echo $contato->telefone_contato->viewAttributes() ?>>
<?php echo $contato->telefone_contato->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($contato->assunto_contato->Visible) { // assunto_contato ?>
		<td data-name="assunto_contato"<?php echo $contato->assunto_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_assunto_contato" class="contato_assunto_contato">
<span<?php echo $contato->assunto_contato->viewAttributes() ?>>
<?php echo $contato->assunto_contato->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($contato->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $contato->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_usuario_id" class="contato_usuario_id">
<span<?php echo $contato->usuario_id->viewAttributes() ?>>
<?php echo $contato->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($contato->data_atualizacao_contato->Visible) { // data_atualizacao_contato ?>
		<td data-name="data_atualizacao_contato"<?php echo $contato->data_atualizacao_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_data_atualizacao_contato" class="contato_data_atualizacao_contato">
<span<?php echo $contato->data_atualizacao_contato->viewAttributes() ?>>
<?php echo $contato->data_atualizacao_contato->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($contato->bool_ativo_contato->Visible) { // bool_ativo_contato ?>
		<td data-name="bool_ativo_contato"<?php echo $contato->bool_ativo_contato->cellAttributes() ?>>
<span id="el<?php echo $contato_list->RowCnt ?>_contato_bool_ativo_contato" class="contato_bool_ativo_contato">
<span<?php echo $contato->bool_ativo_contato->viewAttributes() ?>>
<?php echo $contato->bool_ativo_contato->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$contato_list->ListOptions->render("body", "right", $contato_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$contato->isGridAdd())
		$contato_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$contato->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($contato_list->Recordset)
	$contato_list->Recordset->Close();
?>
<?php if (!$contato->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$contato->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($contato_list->Pager)) $contato_list->Pager = new PrevNextPager($contato_list->StartRec, $contato_list->DisplayRecs, $contato_list->TotalRecs, $contato_list->AutoHidePager) ?>
<?php if ($contato_list->Pager->RecordCount > 0 && $contato_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($contato_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $contato_list->pageUrl() ?>start=<?php echo $contato_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($contato_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $contato_list->pageUrl() ?>start=<?php echo $contato_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $contato_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($contato_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $contato_list->pageUrl() ?>start=<?php echo $contato_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($contato_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $contato_list->pageUrl() ?>start=<?php echo $contato_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $contato_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($contato_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $contato_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $contato_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $contato_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($contato_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($contato_list->TotalRecs == 0 && !$contato->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($contato_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$contato_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$contato->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$contato_list->terminate();
?>
