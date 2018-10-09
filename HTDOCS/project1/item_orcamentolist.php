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
$item_orcamento_list = new item_orcamento_list();

// Run the page
$item_orcamento_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$item_orcamento_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$item_orcamento->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fitem_orcamentolist = currentForm = new ew.Form("fitem_orcamentolist", "list");
fitem_orcamentolist.formKeyCountName = '<?php echo $item_orcamento_list->FormKeyCountName ?>';

// Form_CustomValidate event
fitem_orcamentolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fitem_orcamentolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$item_orcamento->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($item_orcamento_list->TotalRecs > 0 && $item_orcamento_list->ExportOptions->visible()) { ?>
<?php $item_orcamento_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($item_orcamento_list->ImportOptions->visible()) { ?>
<?php $item_orcamento_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$item_orcamento_list->renderOtherOptions();
?>
<?php $item_orcamento_list->showPageHeader(); ?>
<?php
$item_orcamento_list->showMessage();
?>
<?php if ($item_orcamento_list->TotalRecs > 0 || $item_orcamento->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($item_orcamento_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> item_orcamento">
<form name="fitem_orcamentolist" id="fitem_orcamentolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($item_orcamento_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $item_orcamento_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="item_orcamento">
<div id="gmp_item_orcamento" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($item_orcamento_list->TotalRecs > 0 || $item_orcamento->isGridEdit()) { ?>
<table id="tbl_item_orcamentolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$item_orcamento_list->RowType = ROWTYPE_HEADER;

// Render list options
$item_orcamento_list->renderListOptions();

// Render list options (header, left)
$item_orcamento_list->ListOptions->render("header", "left");
?>
<?php if ($item_orcamento->id_item_orcamento->Visible) { // id_item_orcamento ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->id_item_orcamento) == "") { ?>
		<th data-name="id_item_orcamento" class="<?php echo $item_orcamento->id_item_orcamento->headerCellClass() ?>"><div id="elh_item_orcamento_id_item_orcamento" class="item_orcamento_id_item_orcamento"><div class="ew-table-header-caption"><?php echo $item_orcamento->id_item_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_item_orcamento" class="<?php echo $item_orcamento->id_item_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->id_item_orcamento) ?>',1);"><div id="elh_item_orcamento_id_item_orcamento" class="item_orcamento_id_item_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->id_item_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->id_item_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->id_item_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item_orcamento->data_lanc_item_orcamento->Visible) { // data_lanc_item_orcamento ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->data_lanc_item_orcamento) == "") { ?>
		<th data-name="data_lanc_item_orcamento" class="<?php echo $item_orcamento->data_lanc_item_orcamento->headerCellClass() ?>"><div id="elh_item_orcamento_data_lanc_item_orcamento" class="item_orcamento_data_lanc_item_orcamento"><div class="ew-table-header-caption"><?php echo $item_orcamento->data_lanc_item_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_lanc_item_orcamento" class="<?php echo $item_orcamento->data_lanc_item_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->data_lanc_item_orcamento) ?>',1);"><div id="elh_item_orcamento_data_lanc_item_orcamento" class="item_orcamento_data_lanc_item_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->data_lanc_item_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->data_lanc_item_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->data_lanc_item_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item_orcamento->orcamento_id->Visible) { // orcamento_id ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->orcamento_id) == "") { ?>
		<th data-name="orcamento_id" class="<?php echo $item_orcamento->orcamento_id->headerCellClass() ?>"><div id="elh_item_orcamento_orcamento_id" class="item_orcamento_orcamento_id"><div class="ew-table-header-caption"><?php echo $item_orcamento->orcamento_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="orcamento_id" class="<?php echo $item_orcamento->orcamento_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->orcamento_id) ?>',1);"><div id="elh_item_orcamento_orcamento_id" class="item_orcamento_orcamento_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->orcamento_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->orcamento_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->orcamento_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item_orcamento->item_id->Visible) { // item_id ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->item_id) == "") { ?>
		<th data-name="item_id" class="<?php echo $item_orcamento->item_id->headerCellClass() ?>"><div id="elh_item_orcamento_item_id" class="item_orcamento_item_id"><div class="ew-table-header-caption"><?php echo $item_orcamento->item_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="item_id" class="<?php echo $item_orcamento->item_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->item_id) ?>',1);"><div id="elh_item_orcamento_item_id" class="item_orcamento_item_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->item_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->item_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->item_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item_orcamento->quantidade_item_orcamento->Visible) { // quantidade_item_orcamento ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->quantidade_item_orcamento) == "") { ?>
		<th data-name="quantidade_item_orcamento" class="<?php echo $item_orcamento->quantidade_item_orcamento->headerCellClass() ?>"><div id="elh_item_orcamento_quantidade_item_orcamento" class="item_orcamento_quantidade_item_orcamento"><div class="ew-table-header-caption"><?php echo $item_orcamento->quantidade_item_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="quantidade_item_orcamento" class="<?php echo $item_orcamento->quantidade_item_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->quantidade_item_orcamento) ?>',1);"><div id="elh_item_orcamento_quantidade_item_orcamento" class="item_orcamento_quantidade_item_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->quantidade_item_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->quantidade_item_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->quantidade_item_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item_orcamento->total_item_orcamento->Visible) { // total_item_orcamento ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->total_item_orcamento) == "") { ?>
		<th data-name="total_item_orcamento" class="<?php echo $item_orcamento->total_item_orcamento->headerCellClass() ?>"><div id="elh_item_orcamento_total_item_orcamento" class="item_orcamento_total_item_orcamento"><div class="ew-table-header-caption"><?php echo $item_orcamento->total_item_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_item_orcamento" class="<?php echo $item_orcamento->total_item_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->total_item_orcamento) ?>',1);"><div id="elh_item_orcamento_total_item_orcamento" class="item_orcamento_total_item_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->total_item_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->total_item_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->total_item_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item_orcamento->usuario_id->Visible) { // usuario_id ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $item_orcamento->usuario_id->headerCellClass() ?>"><div id="elh_item_orcamento_usuario_id" class="item_orcamento_usuario_id"><div class="ew-table-header-caption"><?php echo $item_orcamento->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $item_orcamento->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->usuario_id) ?>',1);"><div id="elh_item_orcamento_usuario_id" class="item_orcamento_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($item_orcamento->bool_ativo_item_orcamento->Visible) { // bool_ativo_item_orcamento ?>
	<?php if ($item_orcamento->sortUrl($item_orcamento->bool_ativo_item_orcamento) == "") { ?>
		<th data-name="bool_ativo_item_orcamento" class="<?php echo $item_orcamento->bool_ativo_item_orcamento->headerCellClass() ?>"><div id="elh_item_orcamento_bool_ativo_item_orcamento" class="item_orcamento_bool_ativo_item_orcamento"><div class="ew-table-header-caption"><?php echo $item_orcamento->bool_ativo_item_orcamento->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_item_orcamento" class="<?php echo $item_orcamento->bool_ativo_item_orcamento->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $item_orcamento->SortUrl($item_orcamento->bool_ativo_item_orcamento) ?>',1);"><div id="elh_item_orcamento_bool_ativo_item_orcamento" class="item_orcamento_bool_ativo_item_orcamento">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $item_orcamento->bool_ativo_item_orcamento->caption() ?></span><span class="ew-table-header-sort"><?php if ($item_orcamento->bool_ativo_item_orcamento->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($item_orcamento->bool_ativo_item_orcamento->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$item_orcamento_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($item_orcamento->ExportAll && $item_orcamento->isExport()) {
	$item_orcamento_list->StopRec = $item_orcamento_list->TotalRecs;
} else {

	// Set the last record to display
	if ($item_orcamento_list->TotalRecs > $item_orcamento_list->StartRec + $item_orcamento_list->DisplayRecs - 1)
		$item_orcamento_list->StopRec = $item_orcamento_list->StartRec + $item_orcamento_list->DisplayRecs - 1;
	else
		$item_orcamento_list->StopRec = $item_orcamento_list->TotalRecs;
}
$item_orcamento_list->RecCnt = $item_orcamento_list->StartRec - 1;
if ($item_orcamento_list->Recordset && !$item_orcamento_list->Recordset->EOF) {
	$item_orcamento_list->Recordset->moveFirst();
	$selectLimit = $item_orcamento_list->UseSelectLimit;
	if (!$selectLimit && $item_orcamento_list->StartRec > 1)
		$item_orcamento_list->Recordset->move($item_orcamento_list->StartRec - 1);
} elseif (!$item_orcamento->AllowAddDeleteRow && $item_orcamento_list->StopRec == 0) {
	$item_orcamento_list->StopRec = $item_orcamento->GridAddRowCount;
}

// Initialize aggregate
$item_orcamento->RowType = ROWTYPE_AGGREGATEINIT;
$item_orcamento->resetAttributes();
$item_orcamento_list->renderRow();
while ($item_orcamento_list->RecCnt < $item_orcamento_list->StopRec) {
	$item_orcamento_list->RecCnt++;
	if ($item_orcamento_list->RecCnt >= $item_orcamento_list->StartRec) {
		$item_orcamento_list->RowCnt++;

		// Set up key count
		$item_orcamento_list->KeyCount = $item_orcamento_list->RowIndex;

		// Init row class and style
		$item_orcamento->resetAttributes();
		$item_orcamento->CssClass = "";
		if ($item_orcamento->isGridAdd()) {
		} else {
			$item_orcamento_list->loadRowValues($item_orcamento_list->Recordset); // Load row values
		}
		$item_orcamento->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$item_orcamento->RowAttrs = array_merge($item_orcamento->RowAttrs, array('data-rowindex'=>$item_orcamento_list->RowCnt, 'id'=>'r' . $item_orcamento_list->RowCnt . '_item_orcamento', 'data-rowtype'=>$item_orcamento->RowType));

		// Render row
		$item_orcamento_list->renderRow();

		// Render list options
		$item_orcamento_list->renderListOptions();
?>
	<tr<?php echo $item_orcamento->rowAttributes() ?>>
<?php

// Render list options (body, left)
$item_orcamento_list->ListOptions->render("body", "left", $item_orcamento_list->RowCnt);
?>
	<?php if ($item_orcamento->id_item_orcamento->Visible) { // id_item_orcamento ?>
		<td data-name="id_item_orcamento"<?php echo $item_orcamento->id_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_id_item_orcamento" class="item_orcamento_id_item_orcamento">
<span<?php echo $item_orcamento->id_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->id_item_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item_orcamento->data_lanc_item_orcamento->Visible) { // data_lanc_item_orcamento ?>
		<td data-name="data_lanc_item_orcamento"<?php echo $item_orcamento->data_lanc_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_data_lanc_item_orcamento" class="item_orcamento_data_lanc_item_orcamento">
<span<?php echo $item_orcamento->data_lanc_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->data_lanc_item_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item_orcamento->orcamento_id->Visible) { // orcamento_id ?>
		<td data-name="orcamento_id"<?php echo $item_orcamento->orcamento_id->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_orcamento_id" class="item_orcamento_orcamento_id">
<span<?php echo $item_orcamento->orcamento_id->viewAttributes() ?>>
<?php echo $item_orcamento->orcamento_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item_orcamento->item_id->Visible) { // item_id ?>
		<td data-name="item_id"<?php echo $item_orcamento->item_id->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_item_id" class="item_orcamento_item_id">
<span<?php echo $item_orcamento->item_id->viewAttributes() ?>>
<?php echo $item_orcamento->item_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item_orcamento->quantidade_item_orcamento->Visible) { // quantidade_item_orcamento ?>
		<td data-name="quantidade_item_orcamento"<?php echo $item_orcamento->quantidade_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_quantidade_item_orcamento" class="item_orcamento_quantidade_item_orcamento">
<span<?php echo $item_orcamento->quantidade_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->quantidade_item_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item_orcamento->total_item_orcamento->Visible) { // total_item_orcamento ?>
		<td data-name="total_item_orcamento"<?php echo $item_orcamento->total_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_total_item_orcamento" class="item_orcamento_total_item_orcamento">
<span<?php echo $item_orcamento->total_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->total_item_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item_orcamento->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $item_orcamento->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_usuario_id" class="item_orcamento_usuario_id">
<span<?php echo $item_orcamento->usuario_id->viewAttributes() ?>>
<?php echo $item_orcamento->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($item_orcamento->bool_ativo_item_orcamento->Visible) { // bool_ativo_item_orcamento ?>
		<td data-name="bool_ativo_item_orcamento"<?php echo $item_orcamento->bool_ativo_item_orcamento->cellAttributes() ?>>
<span id="el<?php echo $item_orcamento_list->RowCnt ?>_item_orcamento_bool_ativo_item_orcamento" class="item_orcamento_bool_ativo_item_orcamento">
<span<?php echo $item_orcamento->bool_ativo_item_orcamento->viewAttributes() ?>>
<?php echo $item_orcamento->bool_ativo_item_orcamento->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$item_orcamento_list->ListOptions->render("body", "right", $item_orcamento_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$item_orcamento->isGridAdd())
		$item_orcamento_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$item_orcamento->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($item_orcamento_list->Recordset)
	$item_orcamento_list->Recordset->Close();
?>
<?php if (!$item_orcamento->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$item_orcamento->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($item_orcamento_list->Pager)) $item_orcamento_list->Pager = new PrevNextPager($item_orcamento_list->StartRec, $item_orcamento_list->DisplayRecs, $item_orcamento_list->TotalRecs, $item_orcamento_list->AutoHidePager) ?>
<?php if ($item_orcamento_list->Pager->RecordCount > 0 && $item_orcamento_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($item_orcamento_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $item_orcamento_list->pageUrl() ?>start=<?php echo $item_orcamento_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($item_orcamento_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $item_orcamento_list->pageUrl() ?>start=<?php echo $item_orcamento_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $item_orcamento_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($item_orcamento_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $item_orcamento_list->pageUrl() ?>start=<?php echo $item_orcamento_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($item_orcamento_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $item_orcamento_list->pageUrl() ?>start=<?php echo $item_orcamento_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $item_orcamento_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($item_orcamento_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $item_orcamento_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $item_orcamento_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $item_orcamento_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($item_orcamento_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($item_orcamento_list->TotalRecs == 0 && !$item_orcamento->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($item_orcamento_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$item_orcamento_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$item_orcamento->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$item_orcamento_list->terminate();
?>
