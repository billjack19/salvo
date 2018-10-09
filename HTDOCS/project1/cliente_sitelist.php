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
$cliente_site_list = new cliente_site_list();

// Run the page
$cliente_site_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cliente_site_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$cliente_site->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcliente_sitelist = currentForm = new ew.Form("fcliente_sitelist", "list");
fcliente_sitelist.formKeyCountName = '<?php echo $cliente_site_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcliente_sitelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcliente_sitelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcliente_sitelistsrch = currentSearchForm = new ew.Form("fcliente_sitelistsrch");

// Filters
fcliente_sitelistsrch.filterList = <?php echo $cliente_site_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$cliente_site->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($cliente_site_list->TotalRecs > 0 && $cliente_site_list->ExportOptions->visible()) { ?>
<?php $cliente_site_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($cliente_site_list->ImportOptions->visible()) { ?>
<?php $cliente_site_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($cliente_site_list->SearchOptions->visible()) { ?>
<?php $cliente_site_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($cliente_site_list->FilterOptions->visible()) { ?>
<?php $cliente_site_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$cliente_site_list->renderOtherOptions();
?>
<?php if (!$cliente_site->isExport() && !$cliente_site->CurrentAction) { ?>
<form name="fcliente_sitelistsrch" id="fcliente_sitelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($cliente_site_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcliente_sitelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="cliente_site">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($cliente_site_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->Phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($cliente_site_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $cliente_site_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($cliente_site_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($cliente_site_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($cliente_site_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($cliente_site_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $cliente_site_list->showPageHeader(); ?>
<?php
$cliente_site_list->showMessage();
?>
<?php if ($cliente_site_list->TotalRecs > 0 || $cliente_site->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($cliente_site_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> cliente_site">
<form name="fcliente_sitelist" id="fcliente_sitelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($cliente_site_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $cliente_site_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cliente_site">
<div id="gmp_cliente_site" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($cliente_site_list->TotalRecs > 0 || $cliente_site->isGridEdit()) { ?>
<table id="tbl_cliente_sitelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$cliente_site_list->RowType = ROWTYPE_HEADER;

// Render list options
$cliente_site_list->renderListOptions();

// Render list options (header, left)
$cliente_site_list->ListOptions->render("header", "left");
?>
<?php if ($cliente_site->id_cliente_site->Visible) { // id_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->id_cliente_site) == "") { ?>
		<th data-name="id_cliente_site" class="<?php echo $cliente_site->id_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_id_cliente_site" class="cliente_site_id_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->id_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_cliente_site" class="<?php echo $cliente_site->id_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->id_cliente_site) ?>',1);"><div id="elh_cliente_site_id_cliente_site" class="cliente_site_id_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->id_cliente_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->id_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->id_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->nome_cliente_site->Visible) { // nome_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->nome_cliente_site) == "") { ?>
		<th data-name="nome_cliente_site" class="<?php echo $cliente_site->nome_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_nome_cliente_site" class="cliente_site_nome_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->nome_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nome_cliente_site" class="<?php echo $cliente_site->nome_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->nome_cliente_site) ?>',1);"><div id="elh_cliente_site_nome_cliente_site" class="cliente_site_nome_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->nome_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->nome_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->nome_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->login_cliente_site->Visible) { // login_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->login_cliente_site) == "") { ?>
		<th data-name="login_cliente_site" class="<?php echo $cliente_site->login_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_login_cliente_site" class="cliente_site_login_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->login_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="login_cliente_site" class="<?php echo $cliente_site->login_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->login_cliente_site) ?>',1);"><div id="elh_cliente_site_login_cliente_site" class="cliente_site_login_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->login_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->login_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->login_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->senha_cliente_site->Visible) { // senha_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->senha_cliente_site) == "") { ?>
		<th data-name="senha_cliente_site" class="<?php echo $cliente_site->senha_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_senha_cliente_site" class="cliente_site_senha_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->senha_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="senha_cliente_site" class="<?php echo $cliente_site->senha_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->senha_cliente_site) ?>',1);"><div id="elh_cliente_site_senha_cliente_site" class="cliente_site_senha_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->senha_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->senha_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->senha_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->telefone_cliente_site->Visible) { // telefone_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->telefone_cliente_site) == "") { ?>
		<th data-name="telefone_cliente_site" class="<?php echo $cliente_site->telefone_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_telefone_cliente_site" class="cliente_site_telefone_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->telefone_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telefone_cliente_site" class="<?php echo $cliente_site->telefone_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->telefone_cliente_site) ?>',1);"><div id="elh_cliente_site_telefone_cliente_site" class="cliente_site_telefone_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->telefone_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->telefone_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->telefone_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->celular_cliente_site->Visible) { // celular_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->celular_cliente_site) == "") { ?>
		<th data-name="celular_cliente_site" class="<?php echo $cliente_site->celular_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_celular_cliente_site" class="cliente_site_celular_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->celular_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="celular_cliente_site" class="<?php echo $cliente_site->celular_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->celular_cliente_site) ?>',1);"><div id="elh_cliente_site_celular_cliente_site" class="cliente_site_celular_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->celular_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->celular_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->celular_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->numero_cliente_site->Visible) { // numero_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->numero_cliente_site) == "") { ?>
		<th data-name="numero_cliente_site" class="<?php echo $cliente_site->numero_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_numero_cliente_site" class="cliente_site_numero_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->numero_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="numero_cliente_site" class="<?php echo $cliente_site->numero_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->numero_cliente_site) ?>',1);"><div id="elh_cliente_site_numero_cliente_site" class="cliente_site_numero_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->numero_cliente_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->numero_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->numero_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->complemento_cliente_site->Visible) { // complemento_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->complemento_cliente_site) == "") { ?>
		<th data-name="complemento_cliente_site" class="<?php echo $cliente_site->complemento_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_complemento_cliente_site" class="cliente_site_complemento_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->complemento_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="complemento_cliente_site" class="<?php echo $cliente_site->complemento_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->complemento_cliente_site) ?>',1);"><div id="elh_cliente_site_complemento_cliente_site" class="cliente_site_complemento_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->complemento_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->complemento_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->complemento_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->bairro_cliente_site->Visible) { // bairro_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->bairro_cliente_site) == "") { ?>
		<th data-name="bairro_cliente_site" class="<?php echo $cliente_site->bairro_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_bairro_cliente_site" class="cliente_site_bairro_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->bairro_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bairro_cliente_site" class="<?php echo $cliente_site->bairro_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->bairro_cliente_site) ?>',1);"><div id="elh_cliente_site_bairro_cliente_site" class="cliente_site_bairro_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->bairro_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->bairro_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->bairro_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->cidade_cliente_site->Visible) { // cidade_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->cidade_cliente_site) == "") { ?>
		<th data-name="cidade_cliente_site" class="<?php echo $cliente_site->cidade_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_cidade_cliente_site" class="cliente_site_cidade_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->cidade_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cidade_cliente_site" class="<?php echo $cliente_site->cidade_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->cidade_cliente_site) ?>',1);"><div id="elh_cliente_site_cidade_cliente_site" class="cliente_site_cidade_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->cidade_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->cidade_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->cidade_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->estado_id->Visible) { // estado_id ?>
	<?php if ($cliente_site->sortUrl($cliente_site->estado_id) == "") { ?>
		<th data-name="estado_id" class="<?php echo $cliente_site->estado_id->headerCellClass() ?>"><div id="elh_cliente_site_estado_id" class="cliente_site_estado_id"><div class="ew-table-header-caption"><?php echo $cliente_site->estado_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="estado_id" class="<?php echo $cliente_site->estado_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->estado_id) ?>',1);"><div id="elh_cliente_site_estado_id" class="cliente_site_estado_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->estado_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->estado_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->estado_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->cep_cliente_site->Visible) { // cep_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->cep_cliente_site) == "") { ?>
		<th data-name="cep_cliente_site" class="<?php echo $cliente_site->cep_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_cep_cliente_site" class="cliente_site_cep_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->cep_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cep_cliente_site" class="<?php echo $cliente_site->cep_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->cep_cliente_site) ?>',1);"><div id="elh_cliente_site_cep_cliente_site" class="cliente_site_cep_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->cep_cliente_site->caption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->cep_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->cep_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->data_atualizacao_cliente_site->Visible) { // data_atualizacao_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->data_atualizacao_cliente_site) == "") { ?>
		<th data-name="data_atualizacao_cliente_site" class="<?php echo $cliente_site->data_atualizacao_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_data_atualizacao_cliente_site" class="cliente_site_data_atualizacao_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->data_atualizacao_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="data_atualizacao_cliente_site" class="<?php echo $cliente_site->data_atualizacao_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->data_atualizacao_cliente_site) ?>',1);"><div id="elh_cliente_site_data_atualizacao_cliente_site" class="cliente_site_data_atualizacao_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->data_atualizacao_cliente_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->data_atualizacao_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->data_atualizacao_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->usuario_id->Visible) { // usuario_id ?>
	<?php if ($cliente_site->sortUrl($cliente_site->usuario_id) == "") { ?>
		<th data-name="usuario_id" class="<?php echo $cliente_site->usuario_id->headerCellClass() ?>"><div id="elh_cliente_site_usuario_id" class="cliente_site_usuario_id"><div class="ew-table-header-caption"><?php echo $cliente_site->usuario_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usuario_id" class="<?php echo $cliente_site->usuario_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->usuario_id) ?>',1);"><div id="elh_cliente_site_usuario_id" class="cliente_site_usuario_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->usuario_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->usuario_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->usuario_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($cliente_site->bool_ativo_cliente_site->Visible) { // bool_ativo_cliente_site ?>
	<?php if ($cliente_site->sortUrl($cliente_site->bool_ativo_cliente_site) == "") { ?>
		<th data-name="bool_ativo_cliente_site" class="<?php echo $cliente_site->bool_ativo_cliente_site->headerCellClass() ?>"><div id="elh_cliente_site_bool_ativo_cliente_site" class="cliente_site_bool_ativo_cliente_site"><div class="ew-table-header-caption"><?php echo $cliente_site->bool_ativo_cliente_site->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bool_ativo_cliente_site" class="<?php echo $cliente_site->bool_ativo_cliente_site->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $cliente_site->SortUrl($cliente_site->bool_ativo_cliente_site) ?>',1);"><div id="elh_cliente_site_bool_ativo_cliente_site" class="cliente_site_bool_ativo_cliente_site">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $cliente_site->bool_ativo_cliente_site->caption() ?></span><span class="ew-table-header-sort"><?php if ($cliente_site->bool_ativo_cliente_site->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($cliente_site->bool_ativo_cliente_site->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$cliente_site_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($cliente_site->ExportAll && $cliente_site->isExport()) {
	$cliente_site_list->StopRec = $cliente_site_list->TotalRecs;
} else {

	// Set the last record to display
	if ($cliente_site_list->TotalRecs > $cliente_site_list->StartRec + $cliente_site_list->DisplayRecs - 1)
		$cliente_site_list->StopRec = $cliente_site_list->StartRec + $cliente_site_list->DisplayRecs - 1;
	else
		$cliente_site_list->StopRec = $cliente_site_list->TotalRecs;
}
$cliente_site_list->RecCnt = $cliente_site_list->StartRec - 1;
if ($cliente_site_list->Recordset && !$cliente_site_list->Recordset->EOF) {
	$cliente_site_list->Recordset->moveFirst();
	$selectLimit = $cliente_site_list->UseSelectLimit;
	if (!$selectLimit && $cliente_site_list->StartRec > 1)
		$cliente_site_list->Recordset->move($cliente_site_list->StartRec - 1);
} elseif (!$cliente_site->AllowAddDeleteRow && $cliente_site_list->StopRec == 0) {
	$cliente_site_list->StopRec = $cliente_site->GridAddRowCount;
}

// Initialize aggregate
$cliente_site->RowType = ROWTYPE_AGGREGATEINIT;
$cliente_site->resetAttributes();
$cliente_site_list->renderRow();
while ($cliente_site_list->RecCnt < $cliente_site_list->StopRec) {
	$cliente_site_list->RecCnt++;
	if ($cliente_site_list->RecCnt >= $cliente_site_list->StartRec) {
		$cliente_site_list->RowCnt++;

		// Set up key count
		$cliente_site_list->KeyCount = $cliente_site_list->RowIndex;

		// Init row class and style
		$cliente_site->resetAttributes();
		$cliente_site->CssClass = "";
		if ($cliente_site->isGridAdd()) {
		} else {
			$cliente_site_list->loadRowValues($cliente_site_list->Recordset); // Load row values
		}
		$cliente_site->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$cliente_site->RowAttrs = array_merge($cliente_site->RowAttrs, array('data-rowindex'=>$cliente_site_list->RowCnt, 'id'=>'r' . $cliente_site_list->RowCnt . '_cliente_site', 'data-rowtype'=>$cliente_site->RowType));

		// Render row
		$cliente_site_list->renderRow();

		// Render list options
		$cliente_site_list->renderListOptions();
?>
	<tr<?php echo $cliente_site->rowAttributes() ?>>
<?php

// Render list options (body, left)
$cliente_site_list->ListOptions->render("body", "left", $cliente_site_list->RowCnt);
?>
	<?php if ($cliente_site->id_cliente_site->Visible) { // id_cliente_site ?>
		<td data-name="id_cliente_site"<?php echo $cliente_site->id_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_id_cliente_site" class="cliente_site_id_cliente_site">
<span<?php echo $cliente_site->id_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->id_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->nome_cliente_site->Visible) { // nome_cliente_site ?>
		<td data-name="nome_cliente_site"<?php echo $cliente_site->nome_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_nome_cliente_site" class="cliente_site_nome_cliente_site">
<span<?php echo $cliente_site->nome_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->nome_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->login_cliente_site->Visible) { // login_cliente_site ?>
		<td data-name="login_cliente_site"<?php echo $cliente_site->login_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_login_cliente_site" class="cliente_site_login_cliente_site">
<span<?php echo $cliente_site->login_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->login_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->senha_cliente_site->Visible) { // senha_cliente_site ?>
		<td data-name="senha_cliente_site"<?php echo $cliente_site->senha_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_senha_cliente_site" class="cliente_site_senha_cliente_site">
<span<?php echo $cliente_site->senha_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->senha_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->telefone_cliente_site->Visible) { // telefone_cliente_site ?>
		<td data-name="telefone_cliente_site"<?php echo $cliente_site->telefone_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_telefone_cliente_site" class="cliente_site_telefone_cliente_site">
<span<?php echo $cliente_site->telefone_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->telefone_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->celular_cliente_site->Visible) { // celular_cliente_site ?>
		<td data-name="celular_cliente_site"<?php echo $cliente_site->celular_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_celular_cliente_site" class="cliente_site_celular_cliente_site">
<span<?php echo $cliente_site->celular_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->celular_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->numero_cliente_site->Visible) { // numero_cliente_site ?>
		<td data-name="numero_cliente_site"<?php echo $cliente_site->numero_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_numero_cliente_site" class="cliente_site_numero_cliente_site">
<span<?php echo $cliente_site->numero_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->numero_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->complemento_cliente_site->Visible) { // complemento_cliente_site ?>
		<td data-name="complemento_cliente_site"<?php echo $cliente_site->complemento_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_complemento_cliente_site" class="cliente_site_complemento_cliente_site">
<span<?php echo $cliente_site->complemento_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->complemento_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->bairro_cliente_site->Visible) { // bairro_cliente_site ?>
		<td data-name="bairro_cliente_site"<?php echo $cliente_site->bairro_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_bairro_cliente_site" class="cliente_site_bairro_cliente_site">
<span<?php echo $cliente_site->bairro_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->bairro_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->cidade_cliente_site->Visible) { // cidade_cliente_site ?>
		<td data-name="cidade_cliente_site"<?php echo $cliente_site->cidade_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_cidade_cliente_site" class="cliente_site_cidade_cliente_site">
<span<?php echo $cliente_site->cidade_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->cidade_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->estado_id->Visible) { // estado_id ?>
		<td data-name="estado_id"<?php echo $cliente_site->estado_id->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_estado_id" class="cliente_site_estado_id">
<span<?php echo $cliente_site->estado_id->viewAttributes() ?>>
<?php echo $cliente_site->estado_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->cep_cliente_site->Visible) { // cep_cliente_site ?>
		<td data-name="cep_cliente_site"<?php echo $cliente_site->cep_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_cep_cliente_site" class="cliente_site_cep_cliente_site">
<span<?php echo $cliente_site->cep_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->cep_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->data_atualizacao_cliente_site->Visible) { // data_atualizacao_cliente_site ?>
		<td data-name="data_atualizacao_cliente_site"<?php echo $cliente_site->data_atualizacao_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_data_atualizacao_cliente_site" class="cliente_site_data_atualizacao_cliente_site">
<span<?php echo $cliente_site->data_atualizacao_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->data_atualizacao_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->usuario_id->Visible) { // usuario_id ?>
		<td data-name="usuario_id"<?php echo $cliente_site->usuario_id->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_usuario_id" class="cliente_site_usuario_id">
<span<?php echo $cliente_site->usuario_id->viewAttributes() ?>>
<?php echo $cliente_site->usuario_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($cliente_site->bool_ativo_cliente_site->Visible) { // bool_ativo_cliente_site ?>
		<td data-name="bool_ativo_cliente_site"<?php echo $cliente_site->bool_ativo_cliente_site->cellAttributes() ?>>
<span id="el<?php echo $cliente_site_list->RowCnt ?>_cliente_site_bool_ativo_cliente_site" class="cliente_site_bool_ativo_cliente_site">
<span<?php echo $cliente_site->bool_ativo_cliente_site->viewAttributes() ?>>
<?php echo $cliente_site->bool_ativo_cliente_site->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$cliente_site_list->ListOptions->render("body", "right", $cliente_site_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$cliente_site->isGridAdd())
		$cliente_site_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$cliente_site->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($cliente_site_list->Recordset)
	$cliente_site_list->Recordset->Close();
?>
<?php if (!$cliente_site->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$cliente_site->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($cliente_site_list->Pager)) $cliente_site_list->Pager = new PrevNextPager($cliente_site_list->StartRec, $cliente_site_list->DisplayRecs, $cliente_site_list->TotalRecs, $cliente_site_list->AutoHidePager) ?>
<?php if ($cliente_site_list->Pager->RecordCount > 0 && $cliente_site_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($cliente_site_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $cliente_site_list->pageUrl() ?>start=<?php echo $cliente_site_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($cliente_site_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $cliente_site_list->pageUrl() ?>start=<?php echo $cliente_site_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $cliente_site_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($cliente_site_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $cliente_site_list->pageUrl() ?>start=<?php echo $cliente_site_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($cliente_site_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $cliente_site_list->pageUrl() ?>start=<?php echo $cliente_site_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $cliente_site_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($cliente_site_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $cliente_site_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $cliente_site_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $cliente_site_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php
	foreach ($cliente_site_list->OtherOptions as &$option)
		$option->render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($cliente_site_list->TotalRecs == 0 && !$cliente_site->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php
	foreach ($cliente_site_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$cliente_site_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$cliente_site->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$cliente_site_list->terminate();
?>
