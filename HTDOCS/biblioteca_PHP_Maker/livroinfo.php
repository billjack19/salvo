<?php

// Global variable for table object
$livro = NULL;

//
// Table class for livro
//
class clivro extends cTable {
	var $ID_LIVRO;
	var $CODIGO_LIVRO;
	var $ISBN;
	var $NOME_LIVRO;
	var $AUTOR_LIVRO;
	var $TEMA_LIVRO;
	var $ANO_LIVRO;
	var $MATERIA_LIVRO;
	var $ESTANTE_LIVRO;
	var $PRATELEIRA_LIVRO;
	var $EDITORA_LIVRO;
	var $EDICAO_LIVRO;
	var $IDIOMA_LIVRO;
	var $PRAZO_LIVRO;
	var $STATUS_LIVRO;
	var $FREQUENCIA_LIVRO;

	//
	// Table class constructor
	//
	function __construct() {
		global $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();
		$this->TableVar = 'livro';
		$this->TableName = 'livro';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`livro`";
		$this->DBID = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PHPExcel only)
		$this->ExportExcelPageSize = ""; // Page size (PHPExcel only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new cBasicSearch($this->TableVar);

		// ID_LIVRO
		$this->ID_LIVRO = new cField('livro', 'livro', 'x_ID_LIVRO', 'ID_LIVRO', '`ID_LIVRO`', '`ID_LIVRO`', 3, -1, FALSE, '`ID_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ID_LIVRO->Sortable = TRUE; // Allow sort
		$this->ID_LIVRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_LIVRO'] = &$this->ID_LIVRO;

		// CODIGO_LIVRO
		$this->CODIGO_LIVRO = new cField('livro', 'livro', 'x_CODIGO_LIVRO', 'CODIGO_LIVRO', '`CODIGO_LIVRO`', '`CODIGO_LIVRO`', 200, -1, FALSE, '`CODIGO_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CODIGO_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['CODIGO_LIVRO'] = &$this->CODIGO_LIVRO;

		// ISBN
		$this->ISBN = new cField('livro', 'livro', 'x_ISBN', 'ISBN', '`ISBN`', '`ISBN`', 200, -1, FALSE, '`ISBN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ISBN->Sortable = TRUE; // Allow sort
		$this->fields['ISBN'] = &$this->ISBN;

		// NOME_LIVRO
		$this->NOME_LIVRO = new cField('livro', 'livro', 'x_NOME_LIVRO', 'NOME_LIVRO', '`NOME_LIVRO`', '`NOME_LIVRO`', 200, -1, FALSE, '`NOME_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NOME_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['NOME_LIVRO'] = &$this->NOME_LIVRO;

		// AUTOR_LIVRO
		$this->AUTOR_LIVRO = new cField('livro', 'livro', 'x_AUTOR_LIVRO', 'AUTOR_LIVRO', '`AUTOR_LIVRO`', '`AUTOR_LIVRO`', 200, -1, FALSE, '`AUTOR_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AUTOR_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['AUTOR_LIVRO'] = &$this->AUTOR_LIVRO;

		// TEMA_LIVRO
		$this->TEMA_LIVRO = new cField('livro', 'livro', 'x_TEMA_LIVRO', 'TEMA_LIVRO', '`TEMA_LIVRO`', '`TEMA_LIVRO`', 200, -1, FALSE, '`TEMA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TEMA_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['TEMA_LIVRO'] = &$this->TEMA_LIVRO;

		// ANO_LIVRO
		$this->ANO_LIVRO = new cField('livro', 'livro', 'x_ANO_LIVRO', 'ANO_LIVRO', '`ANO_LIVRO`', '`ANO_LIVRO`', 200, -1, FALSE, '`ANO_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANO_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['ANO_LIVRO'] = &$this->ANO_LIVRO;

		// MATERIA_LIVRO
		$this->MATERIA_LIVRO = new cField('livro', 'livro', 'x_MATERIA_LIVRO', 'MATERIA_LIVRO', '`MATERIA_LIVRO`', '`MATERIA_LIVRO`', 200, -1, FALSE, '`MATERIA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MATERIA_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['MATERIA_LIVRO'] = &$this->MATERIA_LIVRO;

		// ESTANTE_LIVRO
		$this->ESTANTE_LIVRO = new cField('livro', 'livro', 'x_ESTANTE_LIVRO', 'ESTANTE_LIVRO', '`ESTANTE_LIVRO`', '`ESTANTE_LIVRO`', 3, -1, FALSE, '`ESTANTE_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ESTANTE_LIVRO->Sortable = TRUE; // Allow sort
		$this->ESTANTE_LIVRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ESTANTE_LIVRO'] = &$this->ESTANTE_LIVRO;

		// PRATELEIRA_LIVRO
		$this->PRATELEIRA_LIVRO = new cField('livro', 'livro', 'x_PRATELEIRA_LIVRO', 'PRATELEIRA_LIVRO', '`PRATELEIRA_LIVRO`', '`PRATELEIRA_LIVRO`', 3, -1, FALSE, '`PRATELEIRA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRATELEIRA_LIVRO->Sortable = TRUE; // Allow sort
		$this->PRATELEIRA_LIVRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PRATELEIRA_LIVRO'] = &$this->PRATELEIRA_LIVRO;

		// EDITORA_LIVRO
		$this->EDITORA_LIVRO = new cField('livro', 'livro', 'x_EDITORA_LIVRO', 'EDITORA_LIVRO', '`EDITORA_LIVRO`', '`EDITORA_LIVRO`', 200, -1, FALSE, '`EDITORA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EDITORA_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['EDITORA_LIVRO'] = &$this->EDITORA_LIVRO;

		// EDICAO_LIVRO
		$this->EDICAO_LIVRO = new cField('livro', 'livro', 'x_EDICAO_LIVRO', 'EDICAO_LIVRO', '`EDICAO_LIVRO`', '`EDICAO_LIVRO`', 200, -1, FALSE, '`EDICAO_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EDICAO_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['EDICAO_LIVRO'] = &$this->EDICAO_LIVRO;

		// IDIOMA_LIVRO
		$this->IDIOMA_LIVRO = new cField('livro', 'livro', 'x_IDIOMA_LIVRO', 'IDIOMA_LIVRO', '`IDIOMA_LIVRO`', '`IDIOMA_LIVRO`', 200, -1, FALSE, '`IDIOMA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IDIOMA_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['IDIOMA_LIVRO'] = &$this->IDIOMA_LIVRO;

		// PRAZO_LIVRO
		$this->PRAZO_LIVRO = new cField('livro', 'livro', 'x_PRAZO_LIVRO', 'PRAZO_LIVRO', '`PRAZO_LIVRO`', '`PRAZO_LIVRO`', 3, -1, FALSE, '`PRAZO_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRAZO_LIVRO->Sortable = TRUE; // Allow sort
		$this->PRAZO_LIVRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PRAZO_LIVRO'] = &$this->PRAZO_LIVRO;

		// STATUS_LIVRO
		$this->STATUS_LIVRO = new cField('livro', 'livro', 'x_STATUS_LIVRO', 'STATUS_LIVRO', '`STATUS_LIVRO`', '`STATUS_LIVRO`', 3, -1, FALSE, '`STATUS_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->STATUS_LIVRO->Sortable = TRUE; // Allow sort
		$this->STATUS_LIVRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['STATUS_LIVRO'] = &$this->STATUS_LIVRO;

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO = new cField('livro', 'livro', 'x_FREQUENCIA_LIVRO', 'FREQUENCIA_LIVRO', '`FREQUENCIA_LIVRO`', '`FREQUENCIA_LIVRO`', 3, -1, FALSE, '`FREQUENCIA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FREQUENCIA_LIVRO->Sortable = TRUE; // Allow sort
		$this->FREQUENCIA_LIVRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FREQUENCIA_LIVRO'] = &$this->FREQUENCIA_LIVRO;
	}

	// Field Visibility
	function GetFieldVisibility($fldparm) {
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Column CSS classes
	var $LeftColumnClass = "col-sm-2 control-label ewLabel";
	var $RightColumnClass = "col-sm-10";
	var $OffsetColumnClass = "col-sm-10 col-sm-offset-2";

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function SetLeftColumnClass($class) {
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " control-label ewLabel";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - intval($match[2]));
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace($match[1], $match[1] + "-offset", $class);
		}
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Table level SQL
	var $_SqlFrom = "";

	function getSqlFrom() { // From
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`livro`";
	}

	function SqlFrom() { // For backward compatibility
		return $this->getSqlFrom();
	}

	function setSqlFrom($v) {
		$this->_SqlFrom = $v;
	}
	var $_SqlSelect = "";

	function getSqlSelect() { // Select
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelect() { // For backward compatibility
		return $this->getSqlSelect();
	}

	function setSqlSelect($v) {
		$this->_SqlSelect = $v;
	}
	var $_SqlWhere = "";

	function getSqlWhere() { // Where
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "";
		$this->TableFilter = "";
		ew_AddFilter($sWhere, $this->TableFilter);
		return $sWhere;
	}

	function SqlWhere() { // For backward compatibility
		return $this->getSqlWhere();
	}

	function setSqlWhere($v) {
		$this->_SqlWhere = $v;
	}
	var $_SqlGroupBy = "";

	function getSqlGroupBy() { // Group By
		return ($this->_SqlGroupBy <> "") ? $this->_SqlGroupBy : "";
	}

	function SqlGroupBy() { // For backward compatibility
		return $this->getSqlGroupBy();
	}

	function setSqlGroupBy($v) {
		$this->_SqlGroupBy = $v;
	}
	var $_SqlHaving = "";

	function getSqlHaving() { // Having
		return ($this->_SqlHaving <> "") ? $this->_SqlHaving : "";
	}

	function SqlHaving() { // For backward compatibility
		return $this->getSqlHaving();
	}

	function setSqlHaving($v) {
		$this->_SqlHaving = $v;
	}
	var $_SqlOrderBy = "";

	function getSqlOrderBy() { // Order By
		return ($this->_SqlOrderBy <> "") ? $this->_SqlOrderBy : "";
	}

	function SqlOrderBy() { // For backward compatibility
		return $this->getSqlOrderBy();
	}

	function setSqlOrderBy($v) {
		$this->_SqlOrderBy = $v;
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		return $sFilter;
	}

	// Check if User ID security allows view all
	function UserIDAllow($id = "") {
		$allow = EW_USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$filter = $this->CurrentFilter;
		$filter = $this->ApplyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->GetSQL($filter, $sort);
	}

	// Table SQL with List page filter
	var $UseSessionForListSQL = TRUE;

	function ListSQL() {
		$sFilter = $this->UseSessionForListSQL ? $this->getSessionWhere() : "";
		ew_AddFilter($sFilter, $this->CurrentFilter);
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$this->Recordset_Selecting($sFilter);
		$sSelect = $this->getSqlSelect();
		$sSort = $this->UseSessionForListSQL ? $this->getSessionOrderBy() : "";
		return ew_BuildSelectSql($sSelect, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $sFilter, $sSort);
	}

	// Get ORDER BY clause
	function GetOrderBy() {
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sSort);
	}

	// Try to get record count
	function TryGetRecordCount($sql) {
		$cnt = -1;
		$pattern = "/^SELECT \* FROM/i";
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') && preg_match($pattern, $sql)) {
			$sql = "SELECT COUNT(*) FROM" . preg_replace($pattern, "", $sql);
		} else {
			$sql = "SELECT COUNT(*) FROM (" . $sql . ") EW_COUNT_TABLE";
		}
		$conn = &$this->Connection();
		if ($rs = $conn->Execute($sql)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// Get record count based on filter (for detail record count in master table pages)
	function LoadRecordCount($filter) {
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = ew_BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->TryGetRecordCount($sql);
		if ($cnt == -1) {
			if ($rs = $this->LoadRs($this->CurrentFilter)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Get record count (for current List page)
	function ListRecordCount() {
		$filter = $this->getSessionWhere();
		ew_AddFilter($filter, $this->CurrentFilter);
		$filter = $this->ApplyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = ew_BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->TryGetRecordCount($sql);
		if ($cnt == -1) {
			$conn = &$this->Connection();
			if ($rs = $conn->Execute($sql)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->FldIsCustom)
				continue;
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= ew_QuotedValue($value, $this->fields[$name]->FldDataType, $this->DBID) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	function Insert(&$rs) {
		$conn = &$this->Connection();
		$bInsert = $conn->Execute($this->InsertSQL($rs));
		if ($bInsert) {

			// Get insert id if necessary
			$this->ID_LIVRO->setDbValue($conn->Insert_ID());
			$rs['ID_LIVRO'] = $this->ID_LIVRO->DbValue;
		}
		return $bInsert;
	}

	// UPDATE statement
	function UpdateSQL(&$rs, $where = "", $curfilter = TRUE) {
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->FldIsCustom)
				continue;
			$sql .= $this->fields[$name]->FldExpression . "=";
			$sql .= ew_QuotedValue($value, $this->fields[$name]->FldDataType, $this->DBID) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->ArrayToFilter($where);
		ew_AddFilter($filter, $where);
		if ($filter <> "")	$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	function Update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE) {
		$conn = &$this->Connection();
		$bUpdate = $conn->Execute($this->UpdateSQL($rs, $where, $curfilter));
		return $bUpdate;
	}

	// DELETE statement
	function DeleteSQL(&$rs, $where = "", $curfilter = TRUE) {
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->ArrayToFilter($where);
		if ($rs) {
			if (array_key_exists('ID_LIVRO', $rs))
				ew_AddFilter($where, ew_QuotedName('ID_LIVRO', $this->DBID) . '=' . ew_QuotedValue($rs['ID_LIVRO'], $this->ID_LIVRO->FldDataType, $this->DBID));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		ew_AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	function Delete(&$rs, $where = "", $curfilter = TRUE) {
		$bDelete = TRUE;
		$conn = &$this->Connection();
		if ($bDelete)
			$bDelete = $conn->Execute($this->DeleteSQL($rs, $where, $curfilter));
		return $bDelete;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`ID_LIVRO` = @ID_LIVRO@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->ID_LIVRO->CurrentValue))
			return "0=1"; // Invalid key
		if (is_null($this->ID_LIVRO->CurrentValue))
			return "0=1"; // Invalid key
		else
			$sKeyFilter = str_replace("@ID_LIVRO@", ew_AdjustSql($this->ID_LIVRO->CurrentValue, $this->DBID), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return page URL
	function getReturnUrl() {
		$name = EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "livrolist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	function GetModalCaption($pageName) {
		global $Language;
		if ($pageName == "livroview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "livroedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "livroadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	function GetListUrl() {
		return "livrolist.php";
	}

	// View URL
	function GetViewUrl($parm = "") {
		if ($parm <> "")
			$url = $this->KeyUrl("livroview.php", $this->UrlParm($parm));
		else
			$url = $this->KeyUrl("livroview.php", $this->UrlParm(EW_TABLE_SHOW_DETAIL . "="));
		return $this->AddMasterUrl($url);
	}

	// Add URL
	function GetAddUrl($parm = "") {
		if ($parm <> "")
			$url = "livroadd.php?" . $this->UrlParm($parm);
		else
			$url = "livroadd.php";
		return $this->AddMasterUrl($url);
	}

	// Edit URL
	function GetEditUrl($parm = "") {
		$url = $this->KeyUrl("livroedit.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline edit URL
	function GetInlineEditUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
		return $this->AddMasterUrl($url);
	}

	// Copy URL
	function GetCopyUrl($parm = "") {
		$url = $this->KeyUrl("livroadd.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline copy URL
	function GetInlineCopyUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
		return $this->AddMasterUrl($url);
	}

	// Delete URL
	function GetDeleteUrl() {
		return $this->KeyUrl("livrodelete.php", $this->UrlParm());
	}

	// Add master url
	function AddMasterUrl($url) {
		return $url;
	}

	function KeyToJson() {
		$json = "";
		$json .= "ID_LIVRO:" . ew_VarToJson($this->ID_LIVRO->CurrentValue, "number", "'");
		return "{" . $json . "}";
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->ID_LIVRO->CurrentValue)) {
			$sUrl .= "ID_LIVRO=" . urlencode($this->ID_LIVRO->CurrentValue);
		} else {
			return "javascript:ew_Alert(ewLanguage.Phrase('InvalidRecord'));";
		}
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&amp;ordertype=" . $fld->ReverseSort());
			return $this->AddMasterUrl(ew_CurrentPage() . "?" . $sUrlParm);
		} else {
			return "";
		}
	}

	// Get record keys from $_POST/$_GET/$_SESSION
	function GetRecordKeys() {
		global $EW_COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (isset($_POST["key_m"])) {
			$arKeys = $_POST["key_m"];
			$cnt = count($arKeys);
		} elseif (isset($_GET["key_m"])) {
			$arKeys = $_GET["key_m"];
			$cnt = count($arKeys);
		} elseif (!empty($_GET) || !empty($_POST)) {
			$isPost = ew_IsPost();
			if ($isPost && isset($_POST["ID_LIVRO"]))
				$arKeys[] = $_POST["ID_LIVRO"];
			elseif (isset($_GET["ID_LIVRO"]))
				$arKeys[] = $_GET["ID_LIVRO"];
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get key filter
	function GetKeyFilter() {
		$arKeys = $this->GetRecordKeys();
		$sKeyFilter = "";
		foreach ($arKeys as $key) {
			if ($sKeyFilter <> "") $sKeyFilter .= " OR ";
			$this->ID_LIVRO->CurrentValue = $key;
			$sKeyFilter .= "(" . $this->KeyFilter() . ")";
		}
		return $sKeyFilter;
	}

	// Load rows based on filter
	function &LoadRs($filter) {

		// Set up filter (SQL WHERE clause) and get return SQL
		//$this->CurrentFilter = $filter;
		//$sql = $this->SQL();

		$sql = $this->GetSQL($filter, "");
		$conn = &$this->Connection();
		$rs = $conn->Execute($sql);
		return $rs;
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->ID_LIVRO->setDbValue($rs->fields('ID_LIVRO'));
		$this->CODIGO_LIVRO->setDbValue($rs->fields('CODIGO_LIVRO'));
		$this->ISBN->setDbValue($rs->fields('ISBN'));
		$this->NOME_LIVRO->setDbValue($rs->fields('NOME_LIVRO'));
		$this->AUTOR_LIVRO->setDbValue($rs->fields('AUTOR_LIVRO'));
		$this->TEMA_LIVRO->setDbValue($rs->fields('TEMA_LIVRO'));
		$this->ANO_LIVRO->setDbValue($rs->fields('ANO_LIVRO'));
		$this->MATERIA_LIVRO->setDbValue($rs->fields('MATERIA_LIVRO'));
		$this->ESTANTE_LIVRO->setDbValue($rs->fields('ESTANTE_LIVRO'));
		$this->PRATELEIRA_LIVRO->setDbValue($rs->fields('PRATELEIRA_LIVRO'));
		$this->EDITORA_LIVRO->setDbValue($rs->fields('EDITORA_LIVRO'));
		$this->EDICAO_LIVRO->setDbValue($rs->fields('EDICAO_LIVRO'));
		$this->IDIOMA_LIVRO->setDbValue($rs->fields('IDIOMA_LIVRO'));
		$this->PRAZO_LIVRO->setDbValue($rs->fields('PRAZO_LIVRO'));
		$this->STATUS_LIVRO->setDbValue($rs->fields('STATUS_LIVRO'));
		$this->FREQUENCIA_LIVRO->setDbValue($rs->fields('FREQUENCIA_LIVRO'));
	}

	// Render list row values
	function RenderListRow() {
		global $Security, $gsLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// ID_LIVRO
		// CODIGO_LIVRO
		// ISBN
		// NOME_LIVRO
		// AUTOR_LIVRO
		// TEMA_LIVRO
		// ANO_LIVRO
		// MATERIA_LIVRO
		// ESTANTE_LIVRO
		// PRATELEIRA_LIVRO
		// EDITORA_LIVRO
		// EDICAO_LIVRO
		// IDIOMA_LIVRO
		// PRAZO_LIVRO
		// STATUS_LIVRO
		// FREQUENCIA_LIVRO
		// ID_LIVRO

		$this->ID_LIVRO->ViewValue = $this->ID_LIVRO->CurrentValue;
		$this->ID_LIVRO->ViewCustomAttributes = "";

		// CODIGO_LIVRO
		$this->CODIGO_LIVRO->ViewValue = $this->CODIGO_LIVRO->CurrentValue;
		$this->CODIGO_LIVRO->ViewCustomAttributes = "";

		// ISBN
		$this->ISBN->ViewValue = $this->ISBN->CurrentValue;
		$this->ISBN->ViewCustomAttributes = "";

		// NOME_LIVRO
		$this->NOME_LIVRO->ViewValue = $this->NOME_LIVRO->CurrentValue;
		$this->NOME_LIVRO->ViewCustomAttributes = "";

		// AUTOR_LIVRO
		$this->AUTOR_LIVRO->ViewValue = $this->AUTOR_LIVRO->CurrentValue;
		$this->AUTOR_LIVRO->ViewCustomAttributes = "";

		// TEMA_LIVRO
		$this->TEMA_LIVRO->ViewValue = $this->TEMA_LIVRO->CurrentValue;
		$this->TEMA_LIVRO->ViewCustomAttributes = "";

		// ANO_LIVRO
		$this->ANO_LIVRO->ViewValue = $this->ANO_LIVRO->CurrentValue;
		$this->ANO_LIVRO->ViewCustomAttributes = "";

		// MATERIA_LIVRO
		$this->MATERIA_LIVRO->ViewValue = $this->MATERIA_LIVRO->CurrentValue;
		$this->MATERIA_LIVRO->ViewCustomAttributes = "";

		// ESTANTE_LIVRO
		$this->ESTANTE_LIVRO->ViewValue = $this->ESTANTE_LIVRO->CurrentValue;
		$this->ESTANTE_LIVRO->ViewCustomAttributes = "";

		// PRATELEIRA_LIVRO
		$this->PRATELEIRA_LIVRO->ViewValue = $this->PRATELEIRA_LIVRO->CurrentValue;
		$this->PRATELEIRA_LIVRO->ViewCustomAttributes = "";

		// EDITORA_LIVRO
		$this->EDITORA_LIVRO->ViewValue = $this->EDITORA_LIVRO->CurrentValue;
		$this->EDITORA_LIVRO->ViewCustomAttributes = "";

		// EDICAO_LIVRO
		$this->EDICAO_LIVRO->ViewValue = $this->EDICAO_LIVRO->CurrentValue;
		$this->EDICAO_LIVRO->ViewCustomAttributes = "";

		// IDIOMA_LIVRO
		$this->IDIOMA_LIVRO->ViewValue = $this->IDIOMA_LIVRO->CurrentValue;
		$this->IDIOMA_LIVRO->ViewCustomAttributes = "";

		// PRAZO_LIVRO
		$this->PRAZO_LIVRO->ViewValue = $this->PRAZO_LIVRO->CurrentValue;
		$this->PRAZO_LIVRO->ViewCustomAttributes = "";

		// STATUS_LIVRO
		$this->STATUS_LIVRO->ViewValue = $this->STATUS_LIVRO->CurrentValue;
		$this->STATUS_LIVRO->ViewCustomAttributes = "";

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->ViewValue = $this->FREQUENCIA_LIVRO->CurrentValue;
		$this->FREQUENCIA_LIVRO->ViewCustomAttributes = "";

		// ID_LIVRO
		$this->ID_LIVRO->LinkCustomAttributes = "";
		$this->ID_LIVRO->HrefValue = "";
		$this->ID_LIVRO->TooltipValue = "";

		// CODIGO_LIVRO
		$this->CODIGO_LIVRO->LinkCustomAttributes = "";
		$this->CODIGO_LIVRO->HrefValue = "";
		$this->CODIGO_LIVRO->TooltipValue = "";

		// ISBN
		$this->ISBN->LinkCustomAttributes = "";
		$this->ISBN->HrefValue = "";
		$this->ISBN->TooltipValue = "";

		// NOME_LIVRO
		$this->NOME_LIVRO->LinkCustomAttributes = "";
		$this->NOME_LIVRO->HrefValue = "";
		$this->NOME_LIVRO->TooltipValue = "";

		// AUTOR_LIVRO
		$this->AUTOR_LIVRO->LinkCustomAttributes = "";
		$this->AUTOR_LIVRO->HrefValue = "";
		$this->AUTOR_LIVRO->TooltipValue = "";

		// TEMA_LIVRO
		$this->TEMA_LIVRO->LinkCustomAttributes = "";
		$this->TEMA_LIVRO->HrefValue = "";
		$this->TEMA_LIVRO->TooltipValue = "";

		// ANO_LIVRO
		$this->ANO_LIVRO->LinkCustomAttributes = "";
		$this->ANO_LIVRO->HrefValue = "";
		$this->ANO_LIVRO->TooltipValue = "";

		// MATERIA_LIVRO
		$this->MATERIA_LIVRO->LinkCustomAttributes = "";
		$this->MATERIA_LIVRO->HrefValue = "";
		$this->MATERIA_LIVRO->TooltipValue = "";

		// ESTANTE_LIVRO
		$this->ESTANTE_LIVRO->LinkCustomAttributes = "";
		$this->ESTANTE_LIVRO->HrefValue = "";
		$this->ESTANTE_LIVRO->TooltipValue = "";

		// PRATELEIRA_LIVRO
		$this->PRATELEIRA_LIVRO->LinkCustomAttributes = "";
		$this->PRATELEIRA_LIVRO->HrefValue = "";
		$this->PRATELEIRA_LIVRO->TooltipValue = "";

		// EDITORA_LIVRO
		$this->EDITORA_LIVRO->LinkCustomAttributes = "";
		$this->EDITORA_LIVRO->HrefValue = "";
		$this->EDITORA_LIVRO->TooltipValue = "";

		// EDICAO_LIVRO
		$this->EDICAO_LIVRO->LinkCustomAttributes = "";
		$this->EDICAO_LIVRO->HrefValue = "";
		$this->EDICAO_LIVRO->TooltipValue = "";

		// IDIOMA_LIVRO
		$this->IDIOMA_LIVRO->LinkCustomAttributes = "";
		$this->IDIOMA_LIVRO->HrefValue = "";
		$this->IDIOMA_LIVRO->TooltipValue = "";

		// PRAZO_LIVRO
		$this->PRAZO_LIVRO->LinkCustomAttributes = "";
		$this->PRAZO_LIVRO->HrefValue = "";
		$this->PRAZO_LIVRO->TooltipValue = "";

		// STATUS_LIVRO
		$this->STATUS_LIVRO->LinkCustomAttributes = "";
		$this->STATUS_LIVRO->HrefValue = "";
		$this->STATUS_LIVRO->TooltipValue = "";

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->LinkCustomAttributes = "";
		$this->FREQUENCIA_LIVRO->HrefValue = "";
		$this->FREQUENCIA_LIVRO->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->CustomTemplateFieldValues();
	}

	// Render edit row values
	function RenderEditRow() {
		global $Security, $gsLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// ID_LIVRO
		$this->ID_LIVRO->EditAttrs["class"] = "form-control";
		$this->ID_LIVRO->EditCustomAttributes = "";
		$this->ID_LIVRO->EditValue = $this->ID_LIVRO->CurrentValue;
		$this->ID_LIVRO->ViewCustomAttributes = "";

		// CODIGO_LIVRO
		$this->CODIGO_LIVRO->EditAttrs["class"] = "form-control";
		$this->CODIGO_LIVRO->EditCustomAttributes = "";
		$this->CODIGO_LIVRO->EditValue = $this->CODIGO_LIVRO->CurrentValue;
		$this->CODIGO_LIVRO->PlaceHolder = ew_RemoveHtml($this->CODIGO_LIVRO->FldCaption());

		// ISBN
		$this->ISBN->EditAttrs["class"] = "form-control";
		$this->ISBN->EditCustomAttributes = "";
		$this->ISBN->EditValue = $this->ISBN->CurrentValue;
		$this->ISBN->PlaceHolder = ew_RemoveHtml($this->ISBN->FldCaption());

		// NOME_LIVRO
		$this->NOME_LIVRO->EditAttrs["class"] = "form-control";
		$this->NOME_LIVRO->EditCustomAttributes = "";
		$this->NOME_LIVRO->EditValue = $this->NOME_LIVRO->CurrentValue;
		$this->NOME_LIVRO->PlaceHolder = ew_RemoveHtml($this->NOME_LIVRO->FldCaption());

		// AUTOR_LIVRO
		$this->AUTOR_LIVRO->EditAttrs["class"] = "form-control";
		$this->AUTOR_LIVRO->EditCustomAttributes = "";
		$this->AUTOR_LIVRO->EditValue = $this->AUTOR_LIVRO->CurrentValue;
		$this->AUTOR_LIVRO->PlaceHolder = ew_RemoveHtml($this->AUTOR_LIVRO->FldCaption());

		// TEMA_LIVRO
		$this->TEMA_LIVRO->EditAttrs["class"] = "form-control";
		$this->TEMA_LIVRO->EditCustomAttributes = "";
		$this->TEMA_LIVRO->EditValue = $this->TEMA_LIVRO->CurrentValue;
		$this->TEMA_LIVRO->PlaceHolder = ew_RemoveHtml($this->TEMA_LIVRO->FldCaption());

		// ANO_LIVRO
		$this->ANO_LIVRO->EditAttrs["class"] = "form-control";
		$this->ANO_LIVRO->EditCustomAttributes = "";
		$this->ANO_LIVRO->EditValue = $this->ANO_LIVRO->CurrentValue;
		$this->ANO_LIVRO->PlaceHolder = ew_RemoveHtml($this->ANO_LIVRO->FldCaption());

		// MATERIA_LIVRO
		$this->MATERIA_LIVRO->EditAttrs["class"] = "form-control";
		$this->MATERIA_LIVRO->EditCustomAttributes = "";
		$this->MATERIA_LIVRO->EditValue = $this->MATERIA_LIVRO->CurrentValue;
		$this->MATERIA_LIVRO->PlaceHolder = ew_RemoveHtml($this->MATERIA_LIVRO->FldCaption());

		// ESTANTE_LIVRO
		$this->ESTANTE_LIVRO->EditAttrs["class"] = "form-control";
		$this->ESTANTE_LIVRO->EditCustomAttributes = "";
		$this->ESTANTE_LIVRO->EditValue = $this->ESTANTE_LIVRO->CurrentValue;
		$this->ESTANTE_LIVRO->PlaceHolder = ew_RemoveHtml($this->ESTANTE_LIVRO->FldCaption());

		// PRATELEIRA_LIVRO
		$this->PRATELEIRA_LIVRO->EditAttrs["class"] = "form-control";
		$this->PRATELEIRA_LIVRO->EditCustomAttributes = "";
		$this->PRATELEIRA_LIVRO->EditValue = $this->PRATELEIRA_LIVRO->CurrentValue;
		$this->PRATELEIRA_LIVRO->PlaceHolder = ew_RemoveHtml($this->PRATELEIRA_LIVRO->FldCaption());

		// EDITORA_LIVRO
		$this->EDITORA_LIVRO->EditAttrs["class"] = "form-control";
		$this->EDITORA_LIVRO->EditCustomAttributes = "";
		$this->EDITORA_LIVRO->EditValue = $this->EDITORA_LIVRO->CurrentValue;
		$this->EDITORA_LIVRO->PlaceHolder = ew_RemoveHtml($this->EDITORA_LIVRO->FldCaption());

		// EDICAO_LIVRO
		$this->EDICAO_LIVRO->EditAttrs["class"] = "form-control";
		$this->EDICAO_LIVRO->EditCustomAttributes = "";
		$this->EDICAO_LIVRO->EditValue = $this->EDICAO_LIVRO->CurrentValue;
		$this->EDICAO_LIVRO->PlaceHolder = ew_RemoveHtml($this->EDICAO_LIVRO->FldCaption());

		// IDIOMA_LIVRO
		$this->IDIOMA_LIVRO->EditAttrs["class"] = "form-control";
		$this->IDIOMA_LIVRO->EditCustomAttributes = "";
		$this->IDIOMA_LIVRO->EditValue = $this->IDIOMA_LIVRO->CurrentValue;
		$this->IDIOMA_LIVRO->PlaceHolder = ew_RemoveHtml($this->IDIOMA_LIVRO->FldCaption());

		// PRAZO_LIVRO
		$this->PRAZO_LIVRO->EditAttrs["class"] = "form-control";
		$this->PRAZO_LIVRO->EditCustomAttributes = "";
		$this->PRAZO_LIVRO->EditValue = $this->PRAZO_LIVRO->CurrentValue;
		$this->PRAZO_LIVRO->PlaceHolder = ew_RemoveHtml($this->PRAZO_LIVRO->FldCaption());

		// STATUS_LIVRO
		$this->STATUS_LIVRO->EditAttrs["class"] = "form-control";
		$this->STATUS_LIVRO->EditCustomAttributes = "";
		$this->STATUS_LIVRO->EditValue = $this->STATUS_LIVRO->CurrentValue;
		$this->STATUS_LIVRO->PlaceHolder = ew_RemoveHtml($this->STATUS_LIVRO->FldCaption());

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->EditAttrs["class"] = "form-control";
		$this->FREQUENCIA_LIVRO->EditCustomAttributes = "";
		$this->FREQUENCIA_LIVRO->EditValue = $this->FREQUENCIA_LIVRO->CurrentValue;
		$this->FREQUENCIA_LIVRO->PlaceHolder = ew_RemoveHtml($this->FREQUENCIA_LIVRO->FldCaption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {

		// Call Row Rendered event
		$this->Row_Rendered();
	}
	var $ExportDoc;

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	function ExportDocument(&$Doc, &$Recordset, $StartRec, $StopRec, $ExportPageType = "") {
		if (!$Recordset || !$Doc)
			return;
		if (!$Doc->ExportCustom) {

			// Write header
			$Doc->ExportTableHeader();
			if ($Doc->Horizontal) { // Horizontal format, write header
				$Doc->BeginExportRow();
				if ($ExportPageType == "view") {
					if ($this->ID_LIVRO->Exportable) $Doc->ExportCaption($this->ID_LIVRO);
					if ($this->CODIGO_LIVRO->Exportable) $Doc->ExportCaption($this->CODIGO_LIVRO);
					if ($this->ISBN->Exportable) $Doc->ExportCaption($this->ISBN);
					if ($this->NOME_LIVRO->Exportable) $Doc->ExportCaption($this->NOME_LIVRO);
					if ($this->AUTOR_LIVRO->Exportable) $Doc->ExportCaption($this->AUTOR_LIVRO);
					if ($this->TEMA_LIVRO->Exportable) $Doc->ExportCaption($this->TEMA_LIVRO);
					if ($this->ANO_LIVRO->Exportable) $Doc->ExportCaption($this->ANO_LIVRO);
					if ($this->MATERIA_LIVRO->Exportable) $Doc->ExportCaption($this->MATERIA_LIVRO);
					if ($this->ESTANTE_LIVRO->Exportable) $Doc->ExportCaption($this->ESTANTE_LIVRO);
					if ($this->PRATELEIRA_LIVRO->Exportable) $Doc->ExportCaption($this->PRATELEIRA_LIVRO);
					if ($this->EDITORA_LIVRO->Exportable) $Doc->ExportCaption($this->EDITORA_LIVRO);
					if ($this->EDICAO_LIVRO->Exportable) $Doc->ExportCaption($this->EDICAO_LIVRO);
					if ($this->IDIOMA_LIVRO->Exportable) $Doc->ExportCaption($this->IDIOMA_LIVRO);
					if ($this->PRAZO_LIVRO->Exportable) $Doc->ExportCaption($this->PRAZO_LIVRO);
					if ($this->STATUS_LIVRO->Exportable) $Doc->ExportCaption($this->STATUS_LIVRO);
					if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportCaption($this->FREQUENCIA_LIVRO);
				} else {
					if ($this->ID_LIVRO->Exportable) $Doc->ExportCaption($this->ID_LIVRO);
					if ($this->CODIGO_LIVRO->Exportable) $Doc->ExportCaption($this->CODIGO_LIVRO);
					if ($this->ISBN->Exportable) $Doc->ExportCaption($this->ISBN);
					if ($this->NOME_LIVRO->Exportable) $Doc->ExportCaption($this->NOME_LIVRO);
					if ($this->AUTOR_LIVRO->Exportable) $Doc->ExportCaption($this->AUTOR_LIVRO);
					if ($this->TEMA_LIVRO->Exportable) $Doc->ExportCaption($this->TEMA_LIVRO);
					if ($this->ANO_LIVRO->Exportable) $Doc->ExportCaption($this->ANO_LIVRO);
					if ($this->MATERIA_LIVRO->Exportable) $Doc->ExportCaption($this->MATERIA_LIVRO);
					if ($this->ESTANTE_LIVRO->Exportable) $Doc->ExportCaption($this->ESTANTE_LIVRO);
					if ($this->PRATELEIRA_LIVRO->Exportable) $Doc->ExportCaption($this->PRATELEIRA_LIVRO);
					if ($this->EDITORA_LIVRO->Exportable) $Doc->ExportCaption($this->EDITORA_LIVRO);
					if ($this->EDICAO_LIVRO->Exportable) $Doc->ExportCaption($this->EDICAO_LIVRO);
					if ($this->IDIOMA_LIVRO->Exportable) $Doc->ExportCaption($this->IDIOMA_LIVRO);
					if ($this->PRAZO_LIVRO->Exportable) $Doc->ExportCaption($this->PRAZO_LIVRO);
					if ($this->STATUS_LIVRO->Exportable) $Doc->ExportCaption($this->STATUS_LIVRO);
					if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportCaption($this->FREQUENCIA_LIVRO);
				}
				$Doc->EndExportRow();
			}
		}

		// Move to first record
		$RecCnt = $StartRec - 1;
		if (!$Recordset->EOF) {
			$Recordset->MoveFirst();
			if ($StartRec > 1)
				$Recordset->Move($StartRec - 1);
		}
		while (!$Recordset->EOF && $RecCnt < $StopRec) {
			$RecCnt++;
			if (intval($RecCnt) >= intval($StartRec)) {
				$RowCnt = intval($RecCnt) - intval($StartRec) + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($RowCnt > 1 && ($RowCnt - 1) % $this->ExportPageBreakCount == 0)
						$Doc->ExportPageBreak();
				}
				$this->LoadListRowValues($Recordset);

				// Render row
				$this->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->ResetAttrs();
				$this->RenderListRow();
				if (!$Doc->ExportCustom) {
					$Doc->BeginExportRow($RowCnt); // Allow CSS styles if enabled
					if ($ExportPageType == "view") {
						if ($this->ID_LIVRO->Exportable) $Doc->ExportField($this->ID_LIVRO);
						if ($this->CODIGO_LIVRO->Exportable) $Doc->ExportField($this->CODIGO_LIVRO);
						if ($this->ISBN->Exportable) $Doc->ExportField($this->ISBN);
						if ($this->NOME_LIVRO->Exportable) $Doc->ExportField($this->NOME_LIVRO);
						if ($this->AUTOR_LIVRO->Exportable) $Doc->ExportField($this->AUTOR_LIVRO);
						if ($this->TEMA_LIVRO->Exportable) $Doc->ExportField($this->TEMA_LIVRO);
						if ($this->ANO_LIVRO->Exportable) $Doc->ExportField($this->ANO_LIVRO);
						if ($this->MATERIA_LIVRO->Exportable) $Doc->ExportField($this->MATERIA_LIVRO);
						if ($this->ESTANTE_LIVRO->Exportable) $Doc->ExportField($this->ESTANTE_LIVRO);
						if ($this->PRATELEIRA_LIVRO->Exportable) $Doc->ExportField($this->PRATELEIRA_LIVRO);
						if ($this->EDITORA_LIVRO->Exportable) $Doc->ExportField($this->EDITORA_LIVRO);
						if ($this->EDICAO_LIVRO->Exportable) $Doc->ExportField($this->EDICAO_LIVRO);
						if ($this->IDIOMA_LIVRO->Exportable) $Doc->ExportField($this->IDIOMA_LIVRO);
						if ($this->PRAZO_LIVRO->Exportable) $Doc->ExportField($this->PRAZO_LIVRO);
						if ($this->STATUS_LIVRO->Exportable) $Doc->ExportField($this->STATUS_LIVRO);
						if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportField($this->FREQUENCIA_LIVRO);
					} else {
						if ($this->ID_LIVRO->Exportable) $Doc->ExportField($this->ID_LIVRO);
						if ($this->CODIGO_LIVRO->Exportable) $Doc->ExportField($this->CODIGO_LIVRO);
						if ($this->ISBN->Exportable) $Doc->ExportField($this->ISBN);
						if ($this->NOME_LIVRO->Exportable) $Doc->ExportField($this->NOME_LIVRO);
						if ($this->AUTOR_LIVRO->Exportable) $Doc->ExportField($this->AUTOR_LIVRO);
						if ($this->TEMA_LIVRO->Exportable) $Doc->ExportField($this->TEMA_LIVRO);
						if ($this->ANO_LIVRO->Exportable) $Doc->ExportField($this->ANO_LIVRO);
						if ($this->MATERIA_LIVRO->Exportable) $Doc->ExportField($this->MATERIA_LIVRO);
						if ($this->ESTANTE_LIVRO->Exportable) $Doc->ExportField($this->ESTANTE_LIVRO);
						if ($this->PRATELEIRA_LIVRO->Exportable) $Doc->ExportField($this->PRATELEIRA_LIVRO);
						if ($this->EDITORA_LIVRO->Exportable) $Doc->ExportField($this->EDITORA_LIVRO);
						if ($this->EDICAO_LIVRO->Exportable) $Doc->ExportField($this->EDICAO_LIVRO);
						if ($this->IDIOMA_LIVRO->Exportable) $Doc->ExportField($this->IDIOMA_LIVRO);
						if ($this->PRAZO_LIVRO->Exportable) $Doc->ExportField($this->PRAZO_LIVRO);
						if ($this->STATUS_LIVRO->Exportable) $Doc->ExportField($this->STATUS_LIVRO);
						if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportField($this->FREQUENCIA_LIVRO);
					}
					$Doc->EndExportRow($RowCnt);
				}
			}

			// Call Row Export server event
			if ($Doc->ExportCustom)
				$this->Row_Export($Recordset->fields);
			$Recordset->MoveNext();
		}
		if (!$Doc->ExportCustom) {
			$Doc->ExportTableFooter();
		}
	}

	// Get auto fill value
	function GetAutoFill($id, $val) {
		$rsarr = array();
		$rowcnt = 0;

		// Output
		if (is_array($rsarr) && $rowcnt > 0) {
			$fldcnt = count($rsarr[0]);
			for ($i = 0; $i < $rowcnt; $i++) {
				for ($j = 0; $j < $fldcnt; $j++) {
					$str = strval($rsarr[$i][$j]);
					$str = ew_ConvertToUtf8($str);
					if (isset($post["keepCRLF"])) {
						$str = str_replace(array("\r", "\n"), array("\\r", "\\n"), $str);
					} else {
						$str = str_replace(array("\r", "\n"), array(" ", " "), $str);
					}
					$rsarr[$i][$j] = $str;
				}
			}
			return ew_ArrayToJson($rsarr);
		} else {
			return FALSE;
		}
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->FldName, $fld->LookupFilters, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
