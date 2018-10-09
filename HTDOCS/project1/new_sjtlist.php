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
$new_sjt_list = new new_sjt_list();

// Run the page
$new_sjt_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$new_sjt_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$new_sjt->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fnew_sjtlist = currentForm = new ew.Form("fnew_sjtlist", "list");
fnew_sjtlist.formKeyCountName = '<?php echo $new_sjt_list->FormKeyCountName ?>';

// Form_CustomValidate event
fnew_sjtlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fnew_sjtlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fnew_sjtlistsrch = currentSearchForm = new ew.Form("fnew_sjtlistsrch");

// Filters
fnew_sjtlistsrch.filterList = <?php echo $new_sjt_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$new_sjt->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($new_sjt_list->TotalRecs > 0 && $new_sjt_list->ExportOptions->visible()) { ?>
<?php $new_sjt_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($new_sjt_list->ImportOptions->visible()) { ?>
<?php $new_sjt_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($new_sjt_list->SearchOptions->visible()) { ?>
<?php $new_sjt_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($new_sjt_list->FilterOptions->visible()) { ?>
<?php $new_sjt_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$new_sjt_list->renderOtherOptions();
?>
<?php if (!$new_sjt->isExport() && !$new_sjt->CurrentAction) { ?>
<form name="fnew_sjtlistsrch" id="fnew_sjtlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($new_sjt_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fnew_sjtlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="new_sjt">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($new_sjt_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($new_sjt_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $new_sjt_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($new_sjt_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($new_sjt_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($new_sjt_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($new_sjt_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $new_sjt_list->showPageHeader(); ?>
<?php
$new_sjt_list->showMessage();
?>
<?php if ($new_sjt_list->TotalRecs > 0 || $new_sjt->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($new_sjt_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> new_sjt">
<form name="fnew_sjtlist" id="fnew_sjtlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($new_sjt_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $new_sjt_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="new_sjt">
<div id="gmp_new_sjt" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($new_sjt_list->TotalRecs > 0 || $new_sjt->isGridEdit()) { ?>
<table id="tbl_new_sjtlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$new_sjt_list->RowType = ROWTYPE_HEADER;

// Render list options
$new_sjt_list->renderListOptions();

// Render list options (header, left)
$new_sjt_list->ListOptions->render("header", "left");
?>
<?php if ($new_sjt->id_new_sjt->Visible) { // id_new_sjt ?>
	<?php if ($new_sjt->sortUrl($new_sjt->id_new_sjt) == "") { ?>
		<th data-name="id_new_sjt" class="<?php echo $new_sjt->id_new_sjt->headerCellClass() ?>"><div id="elh_new_sjt_id_new_sjt" class="new_sjt_id_new_sjt"><div class="ew-table-header-caption"><?php echo $new_sjt->id_new_sjt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_new_sjt" class="<?php echo $new_sjt->id_new_sjt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $new_sjt->SortUrl($new_sjt->id_new_sjt) ?>',1);"><div id="elh_new_sjt_id_new_sjt" class="new_sjt_id_new_sjt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $new_sjt->id_new_sjt->caption() ?></span><span class="ew-table-header-sort"><?php if ($new_sjt->id_new_sjt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($new_sjt->id_new_sjt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($new_sjt->descricao_new_sjt->Visible) { // descricao_new_sjt ?>
	<?php if ($new_sjt->sortUrl($new_sjt->descricao_new_sjt) == "") { ?>
		<th data-name="descricao_new_sjt" class="<?php echo $new_sjt->descricao_new_sjt->headerCellClass() ?>"><div id="elh_new_sjt_descricao_new_sjt" class="new_sjt_descricao_new_sjt"><div class="ew-table-header-caption"><?php echo $new_sjt->descricao_new_sjt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="descricao_new_sjt" class="<?php echo $new_sjt->descricao_new_sjt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $new_sjt->SortUrl($new_sjt->descricao_new_sjt) ?>',1);"><div id="elh_new_sjt_descricao_new_sjt" class="new_sjt_descricao_new_sjt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $new_sjt->descricao_new_sjt->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($new_sjt->descricao_new_sjt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($new_sjt->descricao_new_sjt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($new_sjt->imagem_demonstrativa_new_sjt->Visible) { // imagem_demonstrativa_new_sjt ?>
	<?php if ($new_sjt->sortUrl($new_sjt->imagem_demonstrativa_new_sjt) == "") { ?>
		<th data-name="imagem_demonstrativa_new_sjt" class="<?php echo $new_sjt->imagem_demonstrativa_new_sjt->headerCellClass() ?>"><div id="elh_new_sjt_imagem_demonstrativa_new_sjt" class="new_sjt_imagem_demonstrativa_new_sjt"><div class="ew-table-header-caption"><?php echo $new_sjt->imagem_demonstrativa_new_sjt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="imagem_demonstrativa_new_sjt" class="<?php echo $new_sjt->imagem_demonstrativa_new_sjt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $new_sjt->SortUrl($new_sjt->imagem_demonstrativa_new_sjt) ?>',1);"><div id="elh_new_sjt_imagem_demonstrativa_new_sjt" class="new_sjt_imagem_demonstrativa_new_sjt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $new_sjt->imagem_demonstrativa_new_sjt->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($new_sjt->imagem_demonstrativa_new_sjt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($new_sjt->imagem_demonstrativa_new_sjt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($new_sjt->numero_edicao_new_sjt->Visible) { // numero_edicao_new_sjt ?>
	<?php if ($new_sjt->sortUrl($new_sjt->numero_edicao_new_sjt) == "") { ?>
		<th data-name="numero_edicao_new_sjt" class="<?php echo $new_sjt->numero_edicao_new_sjt->headerCellClass() ?>"><div id="elh_new_sjt_numero_edicao_new_sjt" class="new_sjt_numero_edicao_new_sjt"><div class="ew-table-header-caption"><?php echo $new_sjt->numero_edicao_new_sjt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="numero_edicao_new_sjt" class="<?php echo $new_sjt->numero_edicao_new_sjt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $new_sjt->SortUrl($new_sjt->numero_edicao_new_sjt) ?>',1);"><div id="elh_new_sjt_numero_edicao_new_sjt" class="new_sjt_numero_edicao_new_sjt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $new_sjt->numero_edicao_new_sjt->caption() ?></span><span class="ew-table-header-sort"><?php if ($new_sjt->numero_edicao_new_sjt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($new_sjt->numero_edicao_new_sjt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($new_sjt->data_atualizacao_new_sjt->Visible) { // data_atualizacao_new_sjt ?>
	<?php if ($new_sjt->sortUrl($new_sjt->data_atualizacao_new_sjt) == "") { ?>
		<th data-name="data_atualizacao_new_sjt" class="<?php echo $new_sjt->data_atualizacao_new_sjt->headerCellClass() ?>"><div id="elh_new_sjt_data_atualizacao_new_sjt" class="new_sjt_data_atualizacao_new_sjt"><div class="ew-table-header-caption"><?php echo $new_sjt->data_atualizacao_new_sjt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_new_sjt" class="<?php echo $new_sjt->data_atualizacao_new_sjt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $new_sjt->SortUrl($new_sjt->data_atualizacao_new_sjt) ?>',1);"><div id="elh_new_sjt_data_atualizacao_new_sjt" class="new_sjt_data_atualizacao_new_sjt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $new_sjt->data_atualizacao_new_sjt->caption() ?></span><span class="ew-table-header-sort"><?php if ($new_sjt->data_atualizacao_new_sjt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($new_sjt->data_atualizacao_new_sjt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($new_sjt->usuario_id->Visible) { // usuario_id ?>
	<?php if ($new_sjt->sortUrl($new_sjt->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $new_sjt->usuario_id->headerCellClass() ?>"><div id="elh_new_sjt_usuario_id" class="new_sjt_usuario_id"><div class="ew-table-header-caption"><?php echo $new_sjt->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $new_sjt->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $new_sjt->SortUrl($new_sjt->usuario_id) ?>',1);"><div id="elh_new_sjt_usuario_id" class="new_sjt_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $new_sjt->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($new_sjt->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($new_sjt->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($new_sjt->bool_ativo_new_sjt->Visible) { // bool_ativo_new_sjt ?>
	<?php if ($new_sjt->sortUrl($new_sjt->bool_ativo_new_sjt) == "") { ?>
		<th data-name="bool_ativo_new_sjt" class="<?php echo $new_sjt->bool_ativo_new_sjt->headerCellClass() ?>"><div id="elh_new_sjt_bool_ativo_new_sjt" class="new_sjt_bool_ativo_new_sjt"><div class="ew-table-header-caption"><?php echo $new_sjt->bool_ativo_new_sjt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_new_sjt" class="<?php echo $new_sjt->bool_ativo_new_sjt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $new_sjt->SortUrl($new_sjt->bool_ativo_new_sjt) ?>',1);"><div id="elh_new_sjt_bool_ativo_new_sjt" class="new_sjt_bool_ativo_new_sjt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $new_sjt->bool_ativo_new_sjt->caption() ?></span><span class="ew-table-header-sort"><?php if ($new_sjt->bool_ativo_new_sjt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($new_sjt->bool_ativo_new_sjt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$new_sjt_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($new_sjt->ExportAll && $new_sjt->isExport()) {
	$new_sjt_list->StopRec = $new_sjt_list->TotalRecs;
} else {

	// Set the last record to display
	if ($new_sjt_list->TotalRecs > $new_sjt_list->StartRec + $new_sjt_list->DisplayRecs - 1)
		$new_sjt_list->StopRec = $new_sjt_list->StartRec + $new_sjt_list->DisplayRecs - 1;
	else
		$new_sjt_list->StopRec = $new_sjt_list->TotalRecs;
}
$new_sjt_list->RecCnt = $new_sjt_list->StartRec - 1;
if ($new_sjt_list->Recordset && !$new_sjt_list->Recordset->EOF) {
	$new_sjt_list->Recordset->moveFirst();
	$selectLimit = $new_sjt_list->UseSelectLimit;
	if (!$selectLimit && $new_sjt_list->StartRec > 1)
		$new_sjt_list->Recordset->move($new_sjt_list->StartRec - 1);
} elseif (!$new_sjt->AllowAddDeleteRow && $new_sjt_list->StopRec == 0) {
	$new_sjt_list->StopRec = $new_sjt->GridAddRowCount;
}

// Initialize aggregate
$new_sjt->RowType = ROWTYPE_AGGREGATEINIT;
$new_sjt->resetAttributes();
$new_sjt_list->renderRow();
while ($new_sjt_list->RecCnt < $new_sjt_list->StopRec) {
	$new_sjt_list->RecCnt++;
	if ($new_sjt_list->RecCnt >= $new_sjt_list->StartRec) {
		$new_sjt_list->RowCnt++;

		// Set up key count
		$new_sjt_list->KeyCount = $new_sjt_list->RowIndex;

		// Init row class and style
		$new_sjt->resetAttributes();
		$new_sjt->CssClass = "";
		if ($new_sjt->isGridAdd()) {
		} else {
			$new_sjt_list->loadRowValues($new_sjt_list->Recordset); // Load row values
		}
		$new_sjt->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$new_sjt->RowAttrs = array_merge($new_sjt->RowAttrs, array('data-rowindex'=>$new_sjt_list->RowCnt, 'id'=>'r' . $new_sjt_list->RowCnt . '_new_sjt', 'data-rowtype'=>$new_sjt->RowType));

		// Render row
		$new_sjt_list->renderRow();

		// Render list options
		$new_sjt_list->renderListOptions();
?>
	<tr<?php echo $new_sjt->rowAttributes() ?>>
<?php

// Render list options (body, left)
$new_sjt_list->ListOptions->render("body", "left", $new_sjt_list->RowCnt);
?>
	<?php if ($new_sjt->id_new_sjt->Visible) { // id_new_sjt ?>
		<td data-name="id_new_sjt"<?php echo $new_sjt->id_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_list->RowCnt ?>_new_sjt_id_new_sjt" class="new_sjt_id_new_sjt">
<span<?php echo $new_sjt->id_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->id_new_sjt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($new_sjt->descricao_new_sjt->Visible) { // descricao_new_sjt ?>
		<td data-name="descricao_new_sjt"<?php echo $new_sjt->descricao_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_list->RowCnt ?>_new_sjt_descricao_new_sjt" class="new_sjt_descricao_new_sjt">
<span<?php echo $new_sjt->descricao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->descricao_new_sjt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($new_sjt->imagem_demonstrativa_new_sjt->Visible) { // imagem_demonstrativa_new_sjt ?>
		<td data-name="imagem_demonstrativa_new_sjt"<?php echo $new_sjt->imagem_demonstrativa_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_list->RowCnt ?>_new_sjt_imagem_demonstrativa_new_sjt" class="new_sjt_imagem_demonstrativa_new_sjt">
<span<?php echo $new_sjt->imagem_demonstrativa_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->imagem_demonstrativa_new_sjt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($new_sjt->numero_edicao_new_sjt->Visible) { // numero_edicao_new_sjt ?>
		<td data-name="numero_edicao_new_sjt"<?php echo $new_sjt->numero_edicao_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_list->RowCnt ?>_new_sjt_numero_edicao_new_sjt" class="new_sjt_numero_edicao_new_sjt">
<span<?php echo $new_sjt->numero_edicao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->numero_edicao_new_sjt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($new_sjt->data_atualizacao_new_sjt->Visible) { // data_atualizacao_new_sjt ?>
		<td data-name="data_atualizacao_new_sjt"<?php echo $new_sjt->data_atualizacao_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_list->RowCnt ?>_new_sjt_data_atualizacao_new_sjt" class="new_sjt_data_atualizacao_new_sjt">
<span<?php echo $new_sjt->data_atualizacao_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->data_atualizacao_new_sjt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($new_sjt->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $new_sjt->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_list->RowCnt ?>_new_sjt_usuario_id" class="new_sjt_usuario_id">
<span<?php echo $new_sjt->usuario_id->viewAttributes() ?>>
<?php echo $new_sjt->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($new_sjt->bool_ativo_new_sjt->Visible) { // bool_ativo_new_sjt ?>
		<td data-name="bool_ativo_new_sjt"<?php echo $new_sjt->bool_ativo_new_sjt->cellAttributes() ?>>
<span id="el<?php echo $new_sjt_list->RowCnt ?>_new_sjt_bool_ativo_new_sjt" class="new_sjt_bool_ativo_new_sjt">
<span<?php echo $new_sjt->bool_ativo_new_sjt->viewAttributes() ?>>
<?php echo $new_sjt->bool_ativo_new_sjt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$new_sjt_list->ListOptions->render("body", "right", $new_sjt_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$new_sjt->isGridAdd())
		$new_sjt_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$new_sjt->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($new_sjt_list->Recordset)
	$new_sjt_list->Recordset->Close();
?>
<?php if (!$new_sjt->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$new_sjt->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($new_sjt_list->Pager)) $new_sjt_list->Pager = new PrevNextPager($new_sjt_list->StartRec, $new_sjt_list->DisplayRecs, $new_sjt_list->TotalRecs, $new_sjt_list->AutoHidePager) ?>
<?php if ($new_sjt_list->Pager->RecordCount > 0 && $new_sjt_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($new_sjt_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $new_sjt_list->pageUrl() ?>start=<?php echo $new_sjt_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($new_sjt_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $new_sjt_list->pageUrl() ?>start=<?php echo $new_sjt_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $new_sjt_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($new_sjt_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $new_sjt_list->pageUrl() ?>start=<?php echo $new_sjt_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($new_sjt_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $new_sjt_list->pageUrl() ?>start=<?php echo $new_sjt_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $new_sjt_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($new_sjt_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $new_sjt_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $new_sjt_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $new_sjt_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($new_sjt_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($new_sjt_list->TotalRecs == 0 && !$new_sjt->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($new_sjt_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$new_sjt_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$new_sjt->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$new_sjt_list->terminate();
?>
