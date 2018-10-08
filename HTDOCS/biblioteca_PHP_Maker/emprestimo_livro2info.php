<?php

// Global variable for table object
$emprestimo_livro2 = NULL;

//
// Table class for emprestimo_livro2
//
class cemprestimo_livro2 extends cTable {
	var $ID_EMPRESTIMO_LIVRO2;
	var $ID_LIVRO;
	var $ID_FUNCIONARIO;
	var $ID_CADASTRO;
	var $DATA_INICIAL_EMPRESTIMO_LIVRO;
	var $DATA_FINAL_EMPRESTIMO_LIVRO;
	var $STATUS_EMPRESTIMO;

	//
	// Table class constructor
	//
	function __construct() {
		global $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();
		$this->TableVar = 'emprestimo_livro2';
		$this->TableName = 'emprestimo_livro2';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`emprestimo_livro2`";
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

		// ID_EMPRESTIMO_LIVRO2
		$this->ID_EMPRESTIMO_LIVRO2 = new cField('emprestimo_livro2', 'emprestimo_livro2', 'x_ID_EMPRESTIMO_LIVRO2', 'ID_EMPRESTIMO_LIVRO2', '`ID_EMPRESTIMO_LIVRO2`', '`ID_EMPRESTIMO_LIVRO2`', 3, -1, FALSE, '`ID_EMPRESTIMO_LIVRO2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ID_EMPRESTIMO_LIVRO2->Sortable = TRUE; // Allow sort
		$this->ID_EMPRESTIMO_LIVRO2->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_EMPRESTIMO_LIVRO2'] = &$this->ID_EMPRESTIMO_LIVRO2;

		// ID_LIVRO
		$this->ID_LIVRO = new cField('emprestimo_livro2', 'emprestimo_livro2', 'x_ID_LIVRO', 'ID_LIVRO', '`ID_LIVRO`', '`ID_LIVRO`', 3, -1, FALSE, '`ID_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ID_LIVRO->Sortable = TRUE; // Allow sort
		$this->ID_LIVRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_LIVRO'] = &$this->ID_LIVRO;

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO = new cField('emprestimo_livro2', 'emprestimo_livro2', 'x_ID_FUNCIONARIO', 'ID_FUNCIONARIO', '`ID_FUNCIONARIO`', '`ID_FUNCIONARIO`', 3, -1, FALSE, '`ID_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ID_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->ID_FUNCIONARIO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_FUNCIONARIO'] = &$this->ID_FUNCIONARIO;

		// ID_CADASTRO
		$this->ID_CADASTRO = new cField('emprestimo_livro2', 'emprestimo_livro2', 'x_ID_CADASTRO', 'ID_CADASTRO', '`ID_CADASTRO`', '`ID_CADASTRO`', 3, -1, FALSE, '`ID_CADASTRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ID_CADASTRO->Sortable = TRUE; // Allow sort
		$this->ID_CADASTRO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_CADASTRO'] = &$this->ID_CADASTRO;

		// DATA_INICIAL_EMPRESTIMO_LIVRO
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO = new cField('emprestimo_livro2', 'emprestimo_livro2', 'x_DATA_INICIAL_EMPRESTIMO_LIVRO', 'DATA_INICIAL_EMPRESTIMO_LIVRO', '`DATA_INICIAL_EMPRESTIMO_LIVRO`', '`DATA_INICIAL_EMPRESTIMO_LIVRO`', 200, -1, FALSE, '`DATA_INICIAL_EMPRESTIMO_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['DATA_INICIAL_EMPRESTIMO_LIVRO'] = &$this->DATA_INICIAL_EMPRESTIMO_LIVRO;

		// DATA_FINAL_EMPRESTIMO_LIVRO
		$this->DATA_FINAL_EMPRESTIMO_LIVRO = new cField('emprestimo_livro2', 'emprestimo_livro2', 'x_DATA_FINAL_EMPRESTIMO_LIVRO', 'DATA_FINAL_EMPRESTIMO_LIVRO', '`DATA_FINAL_EMPRESTIMO_LIVRO`', '`DATA_FINAL_EMPRESTIMO_LIVRO`', 200, -1, FALSE, '`DATA_FINAL_EMPRESTIMO_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->Sortable = TRUE; // Allow sort
		$this->fields['DATA_FINAL_EMPRESTIMO_LIVRO'] = &$this->DATA_FINAL_EMPRESTIMO_LIVRO;

		// STATUS_EMPRESTIMO
		$this->STATUS_EMPRESTIMO = new cField('emprestimo_livro2', 'emprestimo_livro2', 'x_STATUS_EMPRESTIMO', 'STATUS_EMPRESTIMO', '`STATUS_EMPRESTIMO`', '`STATUS_EMPRESTIMO`', 3, -1, FALSE, '`STATUS_EMPRESTIMO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->STATUS_EMPRESTIMO->Sortable = TRUE; // Allow sort
		$this->STATUS_EMPRESTIMO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['STATUS_EMPRESTIMO'] = &$this->STATUS_EMPRESTIMO;
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
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`emprestimo_livro2`";
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
			$this->ID_EMPRESTIMO_LIVRO2->setDbValue($conn->Insert_ID());
			$rs['ID_EMPRESTIMO_LIVRO2'] = $this->ID_EMPRESTIMO_LIVRO2->DbValue;
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
			if (array_key_exists('ID_EMPRESTIMO_LIVRO2', $rs))
				ew_AddFilter($where, ew_QuotedName('ID_EMPRESTIMO_LIVRO2', $this->DBID) . '=' . ew_QuotedValue($rs['ID_EMPRESTIMO_LIVRO2'], $this->ID_EMPRESTIMO_LIVRO2->FldDataType, $this->DBID));
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
		return "`ID_EMPRESTIMO_LIVRO2` = @ID_EMPRESTIMO_LIVRO2@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->ID_EMPRESTIMO_LIVRO2->CurrentValue))
			return "0=1"; // Invalid key
		if (is_null($this->ID_EMPRESTIMO_LIVRO2->CurrentValue))
			return "0=1"; // Invalid key
		else
			$sKeyFilter = str_replace("@ID_EMPRESTIMO_LIVRO2@", ew_AdjustSql($this->ID_EMPRESTIMO_LIVRO2->CurrentValue, $this->DBID), $sKeyFilter); // Replace key value
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
			return "emprestimo_livro2list.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	function GetModalCaption($pageName) {
		global $Language;
		if ($pageName == "emprestimo_livro2view.php")
			return $Language->Phrase("View");
		elseif ($pageName == "emprestimo_livro2edit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "emprestimo_livro2add.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	function GetListUrl() {
		return "emprestimo_livro2list.php";
	}

	// View URL
	function GetViewUrl($parm = "") {
		if ($parm <> "")
			$url = $this->KeyUrl("emprestimo_livro2view.php", $this->UrlParm($parm));
		else
			$url = $this->KeyUrl("emprestimo_livro2view.php", $this->UrlParm(EW_TABLE_SHOW_DETAIL . "="));
		return $this->AddMasterUrl($url);
	}

	// Add URL
	function GetAddUrl($parm = "") {
		if ($parm <> "")
			$url = "emprestimo_livro2add.php?" . $this->UrlParm($parm);
		else
			$url = "emprestimo_livro2add.php";
		return $this->AddMasterUrl($url);
	}

	// Edit URL
	function GetEditUrl($parm = "") {
		$url = $this->KeyUrl("emprestimo_livro2edit.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline edit URL
	function GetInlineEditUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
		return $this->AddMasterUrl($url);
	}

	// Copy URL
	function GetCopyUrl($parm = "") {
		$url = $this->KeyUrl("emprestimo_livro2add.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline copy URL
	function GetInlineCopyUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
		return $this->AddMasterUrl($url);
	}

	// Delete URL
	function GetDeleteUrl() {
		return $this->KeyUrl("emprestimo_livro2delete.php", $this->UrlParm());
	}

	// Add master url
	function AddMasterUrl($url) {
		return $url;
	}

	function KeyToJson() {
		$json = "";
		$json .= "ID_EMPRESTIMO_LIVRO2:" . ew_VarToJson($this->ID_EMPRESTIMO_LIVRO2->CurrentValue, "number", "'");
		return "{" . $json . "}";
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->ID_EMPRESTIMO_LIVRO2->CurrentValue)) {
			$sUrl .= "ID_EMPRESTIMO_LIVRO2=" . urlencode($this->ID_EMPRESTIMO_LIVRO2->CurrentValue);
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
			if ($isPost && isset($_POST["ID_EMPRESTIMO_LIVRO2"]))
				$arKeys[] = $_POST["ID_EMPRESTIMO_LIVRO2"];
			elseif (isset($_GET["ID_EMPRESTIMO_LIVRO2"]))
				$arKeys[] = $_GET["ID_EMPRESTIMO_LIVRO2"];
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
			$this->ID_EMPRESTIMO_LIVRO2->CurrentValue = $key;
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
		$this->ID_EMPRESTIMO_LIVRO2->setDbValue($rs->fields('ID_EMPRESTIMO_LIVRO2'));
		$this->ID_LIVRO->setDbValue($rs->fields('ID_LIVRO'));
		$this->ID_FUNCIONARIO->setDbValue($rs->fields('ID_FUNCIONARIO'));
		$this->ID_CADASTRO->setDbValue($rs->fields('ID_CADASTRO'));
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->setDbValue($rs->fields('DATA_INICIAL_EMPRESTIMO_LIVRO'));
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->setDbValue($rs->fields('DATA_FINAL_EMPRESTIMO_LIVRO'));
		$this->STATUS_EMPRESTIMO->setDbValue($rs->fields('STATUS_EMPRESTIMO'));
	}

	// Render list row values
	function RenderListRow() {
		global $Security, $gsLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// ID_EMPRESTIMO_LIVRO2
		// ID_LIVRO
		// ID_FUNCIONARIO
		// ID_CADASTRO
		// DATA_INICIAL_EMPRESTIMO_LIVRO
		// DATA_FINAL_EMPRESTIMO_LIVRO
		// STATUS_EMPRESTIMO
		// ID_EMPRESTIMO_LIVRO2

		$this->ID_EMPRESTIMO_LIVRO2->ViewValue = $this->ID_EMPRESTIMO_LIVRO2->CurrentValue;
		$this->ID_EMPRESTIMO_LIVRO2->ViewCustomAttributes = "";

		// ID_LIVRO
		$this->ID_LIVRO->ViewValue = $this->ID_LIVRO->CurrentValue;
		$this->ID_LIVRO->ViewCustomAttributes = "";

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->ViewValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->ID_FUNCIONARIO->ViewCustomAttributes = "";

		// ID_CADASTRO
		$this->ID_CADASTRO->ViewValue = $this->ID_CADASTRO->CurrentValue;
		$this->ID_CADASTRO->ViewCustomAttributes = "";

		// DATA_INICIAL_EMPRESTIMO_LIVRO
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->ViewValue = $this->DATA_INICIAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// DATA_FINAL_EMPRESTIMO_LIVRO
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->ViewValue = $this->DATA_FINAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// STATUS_EMPRESTIMO
		$this->STATUS_EMPRESTIMO->ViewValue = $this->STATUS_EMPRESTIMO->CurrentValue;
		$this->STATUS_EMPRESTIMO->ViewCustomAttributes = "";

		// ID_EMPRESTIMO_LIVRO2
		$this->ID_EMPRESTIMO_LIVRO2->LinkCustomAttributes = "";
		$this->ID_EMPRESTIMO_LIVRO2->HrefValue = "";
		$this->ID_EMPRESTIMO_LIVRO2->TooltipValue = "";

		// ID_LIVRO
		$this->ID_LIVRO->LinkCustomAttributes = "";
		$this->ID_LIVRO->HrefValue = "";
		$this->ID_LIVRO->TooltipValue = "";

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->LinkCustomAttributes = "";
		$this->ID_FUNCIONARIO->HrefValue = "";
		$this->ID_FUNCIONARIO->TooltipValue = "";

		// ID_CADASTRO
		$this->ID_CADASTRO->LinkCustomAttributes = "";
		$this->ID_CADASTRO->HrefValue = "";
		$this->ID_CADASTRO->TooltipValue = "";

		// DATA_INICIAL_EMPRESTIMO_LIVRO
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->HrefValue = "";
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->TooltipValue = "";

		// DATA_FINAL_EMPRESTIMO_LIVRO
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->HrefValue = "";
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->TooltipValue = "";

		// STATUS_EMPRESTIMO
		$this->STATUS_EMPRESTIMO->LinkCustomAttributes = "";
		$this->STATUS_EMPRESTIMO->HrefValue = "";
		$this->STATUS_EMPRESTIMO->TooltipValue = "";

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

		// ID_EMPRESTIMO_LIVRO2
		$this->ID_EMPRESTIMO_LIVRO2->EditAttrs["class"] = "form-control";
		$this->ID_EMPRESTIMO_LIVRO2->EditCustomAttributes = "";
		$this->ID_EMPRESTIMO_LIVRO2->EditValue = $this->ID_EMPRESTIMO_LIVRO2->CurrentValue;
		$this->ID_EMPRESTIMO_LIVRO2->ViewCustomAttributes = "";

		// ID_LIVRO
		$this->ID_LIVRO->EditAttrs["class"] = "form-control";
		$this->ID_LIVRO->EditCustomAttributes = "";
		$this->ID_LIVRO->EditValue = $this->ID_LIVRO->CurrentValue;
		$this->ID_LIVRO->PlaceHolder = ew_RemoveHtml($this->ID_LIVRO->FldCaption());

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->ID_FUNCIONARIO->EditCustomAttributes = "";
		$this->ID_FUNCIONARIO->EditValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->ID_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->ID_FUNCIONARIO->FldCaption());

		// ID_CADASTRO
		$this->ID_CADASTRO->EditAttrs["class"] = "form-control";
		$this->ID_CADASTRO->EditCustomAttributes = "";
		$this->ID_CADASTRO->EditValue = $this->ID_CADASTRO->CurrentValue;
		$this->ID_CADASTRO->PlaceHolder = ew_RemoveHtml($this->ID_CADASTRO->FldCaption());

		// DATA_INICIAL_EMPRESTIMO_LIVRO
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->EditAttrs["class"] = "form-control";
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->EditCustomAttributes = "";
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->EditValue = $this->DATA_INICIAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->PlaceHolder = ew_RemoveHtml($this->DATA_INICIAL_EMPRESTIMO_LIVRO->FldCaption());

		// DATA_FINAL_EMPRESTIMO_LIVRO
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->EditAttrs["class"] = "form-control";
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->EditCustomAttributes = "";
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->EditValue = $this->DATA_FINAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->PlaceHolder = ew_RemoveHtml($this->DATA_FINAL_EMPRESTIMO_LIVRO->FldCaption());

		// STATUS_EMPRESTIMO
		$this->STATUS_EMPRESTIMO->EditAttrs["class"] = "form-control";
		$this->STATUS_EMPRESTIMO->EditCustomAttributes = "";
		$this->STATUS_EMPRESTIMO->EditValue = $this->STATUS_EMPRESTIMO->CurrentValue;
		$this->STATUS_EMPRESTIMO->PlaceHolder = ew_RemoveHtml($this->STATUS_EMPRESTIMO->FldCaption());

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
					if ($this->ID_EMPRESTIMO_LIVRO2->Exportable) $Doc->ExportCaption($this->ID_EMPRESTIMO_LIVRO2);
					if ($this->ID_LIVRO->Exportable) $Doc->ExportCaption($this->ID_LIVRO);
					if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ID_FUNCIONARIO);
					if ($this->ID_CADASTRO->Exportable) $Doc->ExportCaption($this->ID_CADASTRO);
					if ($this->DATA_INICIAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportCaption($this->DATA_INICIAL_EMPRESTIMO_LIVRO);
					if ($this->DATA_FINAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportCaption($this->DATA_FINAL_EMPRESTIMO_LIVRO);
					if ($this->STATUS_EMPRESTIMO->Exportable) $Doc->ExportCaption($this->STATUS_EMPRESTIMO);
				} else {
					if ($this->ID_EMPRESTIMO_LIVRO2->Exportable) $Doc->ExportCaption($this->ID_EMPRESTIMO_LIVRO2);
					if ($this->ID_LIVRO->Exportable) $Doc->ExportCaption($this->ID_LIVRO);
					if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ID_FUNCIONARIO);
					if ($this->ID_CADASTRO->Exportable) $Doc->ExportCaption($this->ID_CADASTRO);
					if ($this->DATA_INICIAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportCaption($this->DATA_INICIAL_EMPRESTIMO_LIVRO);
					if ($this->DATA_FINAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportCaption($this->DATA_FINAL_EMPRESTIMO_LIVRO);
					if ($this->STATUS_EMPRESTIMO->Exportable) $Doc->ExportCaption($this->STATUS_EMPRESTIMO);
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
						if ($this->ID_EMPRESTIMO_LIVRO2->Exportable) $Doc->ExportField($this->ID_EMPRESTIMO_LIVRO2);
						if ($this->ID_LIVRO->Exportable) $Doc->ExportField($this->ID_LIVRO);
						if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportField($this->ID_FUNCIONARIO);
						if ($this->ID_CADASTRO->Exportable) $Doc->ExportField($this->ID_CADASTRO);
						if ($this->DATA_INICIAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportField($this->DATA_INICIAL_EMPRESTIMO_LIVRO);
						if ($this->DATA_FINAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportField($this->DATA_FINAL_EMPRESTIMO_LIVRO);
						if ($this->STATUS_EMPRESTIMO->Exportable) $Doc->ExportField($this->STATUS_EMPRESTIMO);
					} else {
						if ($this->ID_EMPRESTIMO_LIVRO2->Exportable) $Doc->ExportField($this->ID_EMPRESTIMO_LIVRO2);
						if ($this->ID_LIVRO->Exportable) $Doc->ExportField($this->ID_LIVRO);
						if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportField($this->ID_FUNCIONARIO);
						if ($this->ID_CADASTRO->Exportable) $Doc->ExportField($this->ID_CADASTRO);
						if ($this->DATA_INICIAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportField($this->DATA_INICIAL_EMPRESTIMO_LIVRO);
						if ($this->DATA_FINAL_EMPRESTIMO_LIVRO->Exportable) $Doc->ExportField($this->DATA_FINAL_EMPRESTIMO_LIVRO);
						if ($this->STATUS_EMPRESTIMO->Exportable) $Doc->ExportField($this->STATUS_EMPRESTIMO);
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
