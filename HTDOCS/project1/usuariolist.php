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
$usuario_list = new usuario_list();

// Run the page
$usuario_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuario_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$usuario->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fusuariolist = currentForm = new ew.Form("fusuariolist", "list");
fusuariolist.formKeyCountName = '<?php echo $usuario_list->FormKeyCountName ?>';

// Form_CustomValidate event
fusuariolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fusuariolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fusuariolistsrch = currentSearchForm = new ew.Form("fusuariolistsrch");

// Filters
fusuariolistsrch.filterList = <?php echo $usuario_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$usuario->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($usuario_list->TotalRecs > 0 && $usuario_list->ExportOptions->visible()) { ?>
<?php $usuario_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($usuario_list->ImportOptions->visible()) { ?>
<?php $usuario_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($usuario_list->SearchOptions->visible()) { ?>
<?php $usuario_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($usuario_list->FilterOptions->visible()) { ?>
<?php $usuario_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$usuario_list->renderOtherOptions();
?>
<?php if (!$usuario->isExport() && !$usuario->CurrentAction) { ?>
<form name="fusuariolistsrch" id="fusuariolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($usuario_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fusuariolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="usuario">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($usuario_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($usuario_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $usuario_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($usuario_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($usuario_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($usuario_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($usuario_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $usuario_list->showPageHeader(); ?>
<?php
$usuario_list->showMessage();
?>
<?php if ($usuario_list->TotalRecs > 0 || $usuario->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($usuario_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> usuario">
<form name="fusuariolist" id="fusuariolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($usuario_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $usuario_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuario">
<div id="gmp_usuario" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($usuario_list->TotalRecs > 0 || $usuario->isGridEdit()) { ?>
<table id="tbl_usuariolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$usuario_list->RowType = ROWTYPE_HEADER;

// Render list options
$usuario_list->renderListOptions();

// Render list options (header, left)
$usuario_list->ListOptions->render("header", "left");
?>
<?php if ($usuario->id_usuario->Visible) { // id_usuario ?>
	<?php if ($usuario->sortUrl($usuario->id_usuario) == "") { ?>
		<th data-name="id_usuario" class="<?php echo $usuario->id_usuario->headerCellClass() ?>"><div id="elh_usuario_id_usuario" class="usuario_id_usuario"><div class="ew-table-header-caption"><?php echo $usuario->id_usuario->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_usuario" class="<?php echo $usuario->id_usuario->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $usuario->SortUrl($usuario->id_usuario) ?>',1);"><div id="elh_usuario_id_usuario" class="usuario_id_usuario">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuario->id_usuario->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuario->id_usuario->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($usuario->id_usuario->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuario->nome_usuario->Visible) { // nome_usuario ?>
	<?php if ($usuario->sortUrl($usuario->nome_usuario) == "") { ?>
		<th data-name="nome_usuario" class="<?php echo $usuario->nome_usuario->headerCellClass() ?>"><div id="elh_usuario_nome_usuario" class="usuario_nome_usuario"><div class="ew-table-header-caption"><?php echo $usuario->nome_usuario->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nome_usuario" class="<?php echo $usuario->nome_usuario->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $usuario->SortUrl($usuario->nome_usuario) ?>',1);"><div id="elh_usuario_nome_usuario" class="usuario_nome_usuario">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuario->nome_usuario->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($usuario->nome_usuario->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($usuario->nome_usuario->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuario->login_usuario->Visible) { // login_usuario ?>
	<?php if ($usuario->sortUrl($usuario->login_usuario) == "") { ?>
		<th data-name="login_usuario" class="<?php echo $usuario->login_usuario->headerCellClass() ?>"><div id="elh_usuario_login_usuario" class="usuario_login_usuario"><div class="ew-table-header-caption"><?php echo $usuario->login_usuario->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="login_usuario" class="<?php echo $usuario->login_usuario->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $usuario->SortUrl($usuario->login_usuario) ?>',1);"><div id="elh_usuario_login_usuario" class="usuario_login_usuario">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuario->login_usuario->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($usuario->login_usuario->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($usuario->login_usuario->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuario->senha_usuario->Visible) { // senha_usuario ?>
	<?php if ($usuario->sortUrl($usuario->senha_usuario) == "") { ?>
		<th data-name="senha_usuario" class="<?php echo $usuario->senha_usuario->headerCellClass() ?>"><div id="elh_usuario_senha_usuario" class="usuario_senha_usuario"><div class="ew-table-header-caption"><?php echo $usuario->senha_usuario->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="senha_usuario" class="<?php echo $usuario->senha_usuario->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $usuario->SortUrl($usuario->senha_usuario) ?>',1);"><div id="elh_usuario_senha_usuario" class="usuario_senha_usuario">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuario->senha_usuario->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($usuario->senha_usuario->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($usuario->senha_usuario->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuario->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
	<?php if ($usuario->sortUrl($usuario->nivel_acesso_id) == "") { ?>
		<th data-name="nivel_acesso_id" class="<?php echo $usuario->nivel_acesso_id->headerCellClass() ?>"><div id="elh_usuario_nivel_acesso_id" class="usuario_nivel_acesso_id"><div class="ew-table-header-caption"><?php echo $usuario->nivel_acesso_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nivel_acesso_id" class="<?php echo $usuario->nivel_acesso_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $usuario->SortUrl($usuario->nivel_acesso_id) ?>',1);"><div id="elh_usuario_nivel_acesso_id" class="usuario_nivel_acesso_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuario->nivel_acesso_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuario->nivel_acesso_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($usuario->nivel_acesso_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($usuario->bool_ativo_usuario->Visible) { // bool_ativo_usuario ?>
	<?php if ($usuario->sortUrl($usuario->bool_ativo_usuario) == "") { ?>
		<th data-name="bool_ativo_usuario" class="<?php echo $usuario->bool_ativo_usuario->headerCellClass() ?>"><div id="elh_usuario_bool_ativo_usuario" class="usuario_bool_ativo_usuario"><div class="ew-table-header-caption"><?php echo $usuario->bool_ativo_usuario->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_usuario" class="<?php echo $usuario->bool_ativo_usuario->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $usuario->SortUrl($usuario->bool_ativo_usuario) ?>',1);"><div id="elh_usuario_bool_ativo_usuario" class="usuario_bool_ativo_usuario">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $usuario->bool_ativo_usuario->caption() ?></span><span class="ew-table-header-sort"><?php if ($usuario->bool_ativo_usuario->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($usuario->bool_ativo_usuario->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$usuario_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($usuario->ExportAll && $usuario->isExport()) {
	$usuario_list->StopRec = $usuario_list->TotalRecs;
} else {

	// Set the last record to display
	if ($usuario_list->TotalRecs > $usuario_list->StartRec + $usuario_list->DisplayRecs - 1)
		$usuario_list->StopRec = $usuario_list->StartRec + $usuario_list->DisplayRecs - 1;
	else
		$usuario_list->StopRec = $usuario_list->TotalRecs;
}
$usuario_list->RecCnt = $usuario_list->StartRec - 1;
if ($usuario_list->Recordset && !$usuario_list->Recordset->EOF) {
	$usuario_list->Recordset->moveFirst();
	$selectLimit = $usuario_list->UseSelectLimit;
	if (!$selectLimit && $usuario_list->StartRec > 1)
		$usuario_list->Recordset->move($usuario_list->StartRec - 1);
} elseif (!$usuario->AllowAddDeleteRow && $usuario_list->StopRec == 0) {
	$usuario_list->StopRec = $usuario->GridAddRowCount;
}

// Initialize aggregate
$usuario->RowType = ROWTYPE_AGGREGATEINIT;
$usuario->resetAttributes();
$usuario_list->renderRow();
while ($usuario_list->RecCnt < $usuario_list->StopRec) {
	$usuario_list->RecCnt++;
	if ($usuario_list->RecCnt >= $usuario_list->StartRec) {
		$usuario_list->RowCnt++;

		// Set up key count
		$usuario_list->KeyCount = $usuario_list->RowIndex;

		// Init row class and style
		$usuario->resetAttributes();
		$usuario->CssClass = "";
		if ($usuario->isGridAdd()) {
		} else {
			$usuario_list->loadRowValues($usuario_list->Recordset); // Load row values
		}
		$usuario->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$usuario->RowAttrs = array_merge($usuario->RowAttrs, array('data-rowindex'=>$usuario_list->RowCnt, 'id'=>'r' . $usuario_list->RowCnt . '_usuario', 'data-rowtype'=>$usuario->RowType));

		// Render row
		$usuario_list->renderRow();

		// Render list options
		$usuario_list->renderListOptions();
?>
	<tr<?php echo $usuario->rowAttributes() ?>>
<?php

// Render list options (body, left)
$usuario_list->ListOptions->render("body", "left", $usuario_list->RowCnt);
?>
	<?php if ($usuario->id_usuario->Visible) { // id_usuario ?>
		<td data-name="id_usuario"<?php echo $usuario->id_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_list->RowCnt ?>_usuario_id_usuario" class="usuario_id_usuario">
<span<?php echo $usuario->id_usuario->viewAttributes() ?>>
<?php echo $usuario->id_usuario->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuario->nome_usuario->Visible) { // nome_usuario ?>
		<td data-name="nome_usuario"<?php echo $usuario->nome_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_list->RowCnt ?>_usuario_nome_usuario" class="usuario_nome_usuario">
<span<?php echo $usuario->nome_usuario->viewAttributes() ?>>
<?php echo $usuario->nome_usuario->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuario->login_usuario->Visible) { // login_usuario ?>
		<td data-name="login_usuario"<?php echo $usuario->login_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_list->RowCnt ?>_usuario_login_usuario" class="usuario_login_usuario">
<span<?php echo $usuario->login_usuario->viewAttributes() ?>>
<?php echo $usuario->login_usuario->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuario->senha_usuario->Visible) { // senha_usuario ?>
		<td data-name="senha_usuario"<?php echo $usuario->senha_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_list->RowCnt ?>_usuario_senha_usuario" class="usuario_senha_usuario">
<span<?php echo $usuario->senha_usuario->viewAttributes() ?>>
<?php echo $usuario->senha_usuario->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuario->nivel_acesso_id->Visible) { // nivel_acesso_id ?>
		<td data-name="nivel_acesso_id"<?php echo $usuario->nivel_acesso_id->cellAttributes() ?>>
<span id="el<?php echo $usuario_list->RowCnt ?>_usuario_nivel_acesso_id" class="usuario_nivel_acesso_id">
<span<?php echo $usuario->nivel_acesso_id->viewAttributes() ?>>
<?php echo $usuario->nivel_acesso_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($usuario->bool_ativo_usuario->Visible) { // bool_ativo_usuario ?>
		<td data-name="bool_ativo_usuario"<?php echo $usuario->bool_ativo_usuario->cellAttributes() ?>>
<span id="el<?php echo $usuario_list->RowCnt ?>_usuario_bool_ativo_usuario" class="usuario_bool_ativo_usuario">
<span<?php echo $usuario->bool_ativo_usuario->viewAttributes() ?>>
<?php echo $usuario->bool_ativo_usuario->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$usuario_list->ListOptions->render("body", "right", $usuario_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$usuario->isGridAdd())
		$usuario_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$usuario->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($usuario_list->Recordset)
	$usuario_list->Recordset->Close();
?>
<?php if (!$usuario->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$usuario->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($usuario_list->Pager)) $usuario_list->Pager = new PrevNextPager($usuario_list->StartRec, $usuario_list->DisplayRecs, $usuario_list->TotalRecs, $usuario_list->AutoHidePager) ?>
<?php if ($usuario_list->Pager->RecordCount > 0 && $usuario_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($usuario_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $usuario_list->pageUrl() ?>start=<?php echo $usuario_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($usuario_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $usuario_list->pageUrl() ?>start=<?php echo $usuario_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $usuario_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($usuario_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $usuario_list->pageUrl() ?>start=<?php echo $usuario_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($usuario_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $usuario_list->pageUrl() ?>start=<?php echo $usuario_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $usuario_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($usuario_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $usuario_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $usuario_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $usuario_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($usuario_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($usuario_list->TotalRecs == 0 && !$usuario->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($usuario_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$usuario_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$usuario->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$usuario_list->terminate();
?>
