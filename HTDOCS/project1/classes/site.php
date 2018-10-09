<?php
namespace PHPMaker2019\project1;

/**
 * Table class for site
 */
class site extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $ID_SITE;
	public $NOME_EMPRESA;
	public $NOME_CIDADE;
	public $ESTADO;
	public $FONE;
	public $FONE_APP;
	public $_EMAIL;
	public $sendusername;
	public $sendpassword;
	public $smtpserver;
	public $smtpserverport;
	public $MailFrom;
	public $MailTo;
	public $MailCc;
	public $bool_ativo_site;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'site';
		$this->TableName = 'site';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`site`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// ID_SITE
		$this->ID_SITE = new DbField('site', 'site', 'x_ID_SITE', 'ID_SITE', '`ID_SITE`', '`ID_SITE`', 3, -1, FALSE, '`ID_SITE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ID_SITE->IsAutoIncrement = TRUE; // Autoincrement field
		$this->ID_SITE->IsPrimaryKey = TRUE; // Primary key field
		$this->ID_SITE->Sortable = TRUE; // Allow sort
		$this->ID_SITE->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_SITE'] = &$this->ID_SITE;

		// NOME_EMPRESA
		$this->NOME_EMPRESA = new DbField('site', 'site', 'x_NOME_EMPRESA', 'NOME_EMPRESA', '`NOME_EMPRESA`', '`NOME_EMPRESA`', 200, -1, FALSE, '`NOME_EMPRESA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NOME_EMPRESA->Sortable = TRUE; // Allow sort
		$this->fields['NOME_EMPRESA'] = &$this->NOME_EMPRESA;

		// NOME_CIDADE
		$this->NOME_CIDADE = new DbField('site', 'site', 'x_NOME_CIDADE', 'NOME_CIDADE', '`NOME_CIDADE`', '`NOME_CIDADE`', 200, -1, FALSE, '`NOME_CIDADE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NOME_CIDADE->Sortable = TRUE; // Allow sort
		$this->fields['NOME_CIDADE'] = &$this->NOME_CIDADE;

		// ESTADO
		$this->ESTADO = new DbField('site', 'site', 'x_ESTADO', 'ESTADO', '`ESTADO`', '`ESTADO`', 200, -1, FALSE, '`ESTADO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ESTADO->Sortable = TRUE; // Allow sort
		$this->fields['ESTADO'] = &$this->ESTADO;

		// FONE
		$this->FONE = new DbField('site', 'site', 'x_FONE', 'FONE', '`FONE`', '`FONE`', 200, -1, FALSE, '`FONE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FONE->Sortable = TRUE; // Allow sort
		$this->fields['FONE'] = &$this->FONE;

		// FONE_APP
		$this->FONE_APP = new DbField('site', 'site', 'x_FONE_APP', 'FONE_APP', '`FONE_APP`', '`FONE_APP`', 200, -1, FALSE, '`FONE_APP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FONE_APP->Sortable = TRUE; // Allow sort
		$this->fields['FONE_APP'] = &$this->FONE_APP;

		// EMAIL
		$this->_EMAIL = new DbField('site', 'site', 'x__EMAIL', 'EMAIL', '`EMAIL`', '`EMAIL`', 200, -1, FALSE, '`EMAIL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_EMAIL->Sortable = TRUE; // Allow sort
		$this->fields['EMAIL'] = &$this->_EMAIL;

		// sendusername
		$this->sendusername = new DbField('site', 'site', 'x_sendusername', 'sendusername', '`sendusername`', '`sendusername`', 200, -1, FALSE, '`sendusername`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sendusername->Sortable = TRUE; // Allow sort
		$this->fields['sendusername'] = &$this->sendusername;

		// sendpassword
		$this->sendpassword = new DbField('site', 'site', 'x_sendpassword', 'sendpassword', '`sendpassword`', '`sendpassword`', 200, -1, FALSE, '`sendpassword`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sendpassword->Sortable = TRUE; // Allow sort
		$this->fields['sendpassword'] = &$this->sendpassword;

		// smtpserver
		$this->smtpserver = new DbField('site', 'site', 'x_smtpserver', 'smtpserver', '`smtpserver`', '`smtpserver`', 200, -1, FALSE, '`smtpserver`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->smtpserver->Sortable = TRUE; // Allow sort
		$this->fields['smtpserver'] = &$this->smtpserver;

		// smtpserverport
		$this->smtpserverport = new DbField('site', 'site', 'x_smtpserverport', 'smtpserverport', '`smtpserverport`', '`smtpserverport`', 3, -1, FALSE, '`smtpserverport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->smtpserverport->Sortable = TRUE; // Allow sort
		$this->smtpserverport->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['smtpserverport'] = &$this->smtpserverport;

		// MailFrom
		$this->MailFrom = new DbField('site', 'site', 'x_MailFrom', 'MailFrom', '`MailFrom`', '`MailFrom`', 200, -1, FALSE, '`MailFrom`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MailFrom->Sortable = TRUE; // Allow sort
		$this->fields['MailFrom'] = &$this->MailFrom;

		// MailTo
		$this->MailTo = new DbField('site', 'site', 'x_MailTo', 'MailTo', '`MailTo`', '`MailTo`', 200, -1, FALSE, '`MailTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MailTo->Sortable = TRUE; // Allow sort
		$this->fields['MailTo'] = &$this->MailTo;

		// MailCc
		$this->MailCc = new DbField('site', 'site', 'x_MailCc', 'MailCc', '`MailCc`', '`MailCc`', 200, -1, FALSE, '`MailCc`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MailCc->Sortable = TRUE; // Allow sort
		$this->fields['MailCc'] = &$this->MailCc;

		// bool_ativo_site
		$this->bool_ativo_site = new DbField('site', 'site', 'x_bool_ativo_site', 'bool_ativo_site', '`bool_ativo_site`', '`bool_ativo_site`', 3, -1, FALSE, '`bool_ativo_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bool_ativo_site->Sortable = TRUE; // Allow sort
		$this->bool_ativo_site->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['bool_ativo_site'] = &$this->bool_ativo_site;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`site`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
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
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->ID_SITE->setDbValue($conn->insert_ID());
			$rs['ID_SITE'] = $this->ID_SITE->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('ID_SITE', $rs))
				AddFilter($where, QuotedName('ID_SITE', $this->Dbid) . '=' . QuotedValue($rs['ID_SITE'], $this->ID_SITE->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_SITE->DbValue = $row['ID_SITE'];
		$this->NOME_EMPRESA->DbValue = $row['NOME_EMPRESA'];
		$this->NOME_CIDADE->DbValue = $row['NOME_CIDADE'];
		$this->ESTADO->DbValue = $row['ESTADO'];
		$this->FONE->DbValue = $row['FONE'];
		$this->FONE_APP->DbValue = $row['FONE_APP'];
		$this->_EMAIL->DbValue = $row['EMAIL'];
		$this->sendusername->DbValue = $row['sendusername'];
		$this->sendpassword->DbValue = $row['sendpassword'];
		$this->smtpserver->DbValue = $row['smtpserver'];
		$this->smtpserverport->DbValue = $row['smtpserverport'];
		$this->MailFrom->DbValue = $row['MailFrom'];
		$this->MailTo->DbValue = $row['MailTo'];
		$this->MailCc->DbValue = $row['MailCc'];
		$this->bool_ativo_site->DbValue = $row['bool_ativo_site'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`ID_SITE` = @ID_SITE@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('ID_SITE', $row) ? $row['ID_SITE'] : NULL) : $this->ID_SITE->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@ID_SITE@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "sitelist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "siteview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "siteedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "siteadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "sitelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("siteview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("siteview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "siteadd.php?" . $this->getUrlParm($parm);
		else
			$url = "siteadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("siteedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("siteadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("sitedelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "ID_SITE:" . JsonEncode($this->ID_SITE->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->ID_SITE->CurrentValue != NULL) {
			$url .= "ID_SITE=" . urlencode($this->ID_SITE->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("ID_SITE") !== NULL)
				$arKeys[] = Param("ID_SITE");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
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

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->ID_SITE->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->ID_SITE->setDbValue($rs->fields('ID_SITE'));
		$this->NOME_EMPRESA->setDbValue($rs->fields('NOME_EMPRESA'));
		$this->NOME_CIDADE->setDbValue($rs->fields('NOME_CIDADE'));
		$this->ESTADO->setDbValue($rs->fields('ESTADO'));
		$this->FONE->setDbValue($rs->fields('FONE'));
		$this->FONE_APP->setDbValue($rs->fields('FONE_APP'));
		$this->_EMAIL->setDbValue($rs->fields('EMAIL'));
		$this->sendusername->setDbValue($rs->fields('sendusername'));
		$this->sendpassword->setDbValue($rs->fields('sendpassword'));
		$this->smtpserver->setDbValue($rs->fields('smtpserver'));
		$this->smtpserverport->setDbValue($rs->fields('smtpserverport'));
		$this->MailFrom->setDbValue($rs->fields('MailFrom'));
		$this->MailTo->setDbValue($rs->fields('MailTo'));
		$this->MailCc->setDbValue($rs->fields('MailCc'));
		$this->bool_ativo_site->setDbValue($rs->fields('bool_ativo_site'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// ID_SITE
		// NOME_EMPRESA
		// NOME_CIDADE
		// ESTADO
		// FONE
		// FONE_APP
		// EMAIL
		// sendusername
		// sendpassword
		// smtpserver
		// smtpserverport
		// MailFrom
		// MailTo
		// MailCc
		// bool_ativo_site
		// ID_SITE

		$this->ID_SITE->ViewValue = $this->ID_SITE->CurrentValue;
		$this->ID_SITE->ViewCustomAttributes = "";

		// NOME_EMPRESA
		$this->NOME_EMPRESA->ViewValue = $this->NOME_EMPRESA->CurrentValue;
		$this->NOME_EMPRESA->ViewCustomAttributes = "";

		// NOME_CIDADE
		$this->NOME_CIDADE->ViewValue = $this->NOME_CIDADE->CurrentValue;
		$this->NOME_CIDADE->ViewCustomAttributes = "";

		// ESTADO
		$this->ESTADO->ViewValue = $this->ESTADO->CurrentValue;
		$this->ESTADO->ViewCustomAttributes = "";

		// FONE
		$this->FONE->ViewValue = $this->FONE->CurrentValue;
		$this->FONE->ViewCustomAttributes = "";

		// FONE_APP
		$this->FONE_APP->ViewValue = $this->FONE_APP->CurrentValue;
		$this->FONE_APP->ViewCustomAttributes = "";

		// EMAIL
		$this->_EMAIL->ViewValue = $this->_EMAIL->CurrentValue;
		$this->_EMAIL->ViewCustomAttributes = "";

		// sendusername
		$this->sendusername->ViewValue = $this->sendusername->CurrentValue;
		$this->sendusername->ViewCustomAttributes = "";

		// sendpassword
		$this->sendpassword->ViewValue = $this->sendpassword->CurrentValue;
		$this->sendpassword->ViewCustomAttributes = "";

		// smtpserver
		$this->smtpserver->ViewValue = $this->smtpserver->CurrentValue;
		$this->smtpserver->ViewCustomAttributes = "";

		// smtpserverport
		$this->smtpserverport->ViewValue = $this->smtpserverport->CurrentValue;
		$this->smtpserverport->ViewValue = FormatNumber($this->smtpserverport->ViewValue, 0, -2, -2, -2);
		$this->smtpserverport->ViewCustomAttributes = "";

		// MailFrom
		$this->MailFrom->ViewValue = $this->MailFrom->CurrentValue;
		$this->MailFrom->ViewCustomAttributes = "";

		// MailTo
		$this->MailTo->ViewValue = $this->MailTo->CurrentValue;
		$this->MailTo->ViewCustomAttributes = "";

		// MailCc
		$this->MailCc->ViewValue = $this->MailCc->CurrentValue;
		$this->MailCc->ViewCustomAttributes = "";

		// bool_ativo_site
		$this->bool_ativo_site->ViewValue = $this->bool_ativo_site->CurrentValue;
		$this->bool_ativo_site->ViewValue = FormatNumber($this->bool_ativo_site->ViewValue, 0, -2, -2, -2);
		$this->bool_ativo_site->ViewCustomAttributes = "";

		// ID_SITE
		$this->ID_SITE->LinkCustomAttributes = "";
		$this->ID_SITE->HrefValue = "";
		$this->ID_SITE->TooltipValue = "";

		// NOME_EMPRESA
		$this->NOME_EMPRESA->LinkCustomAttributes = "";
		$this->NOME_EMPRESA->HrefValue = "";
		$this->NOME_EMPRESA->TooltipValue = "";

		// NOME_CIDADE
		$this->NOME_CIDADE->LinkCustomAttributes = "";
		$this->NOME_CIDADE->HrefValue = "";
		$this->NOME_CIDADE->TooltipValue = "";

		// ESTADO
		$this->ESTADO->LinkCustomAttributes = "";
		$this->ESTADO->HrefValue = "";
		$this->ESTADO->TooltipValue = "";

		// FONE
		$this->FONE->LinkCustomAttributes = "";
		$this->FONE->HrefValue = "";
		$this->FONE->TooltipValue = "";

		// FONE_APP
		$this->FONE_APP->LinkCustomAttributes = "";
		$this->FONE_APP->HrefValue = "";
		$this->FONE_APP->TooltipValue = "";

		// EMAIL
		$this->_EMAIL->LinkCustomAttributes = "";
		$this->_EMAIL->HrefValue = "";
		$this->_EMAIL->TooltipValue = "";

		// sendusername
		$this->sendusername->LinkCustomAttributes = "";
		$this->sendusername->HrefValue = "";
		$this->sendusername->TooltipValue = "";

		// sendpassword
		$this->sendpassword->LinkCustomAttributes = "";
		$this->sendpassword->HrefValue = "";
		$this->sendpassword->TooltipValue = "";

		// smtpserver
		$this->smtpserver->LinkCustomAttributes = "";
		$this->smtpserver->HrefValue = "";
		$this->smtpserver->TooltipValue = "";

		// smtpserverport
		$this->smtpserverport->LinkCustomAttributes = "";
		$this->smtpserverport->HrefValue = "";
		$this->smtpserverport->TooltipValue = "";

		// MailFrom
		$this->MailFrom->LinkCustomAttributes = "";
		$this->MailFrom->HrefValue = "";
		$this->MailFrom->TooltipValue = "";

		// MailTo
		$this->MailTo->LinkCustomAttributes = "";
		$this->MailTo->HrefValue = "";
		$this->MailTo->TooltipValue = "";

		// MailCc
		$this->MailCc->LinkCustomAttributes = "";
		$this->MailCc->HrefValue = "";
		$this->MailCc->TooltipValue = "";

		// bool_ativo_site
		$this->bool_ativo_site->LinkCustomAttributes = "";
		$this->bool_ativo_site->HrefValue = "";
		$this->bool_ativo_site->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// ID_SITE
		$this->ID_SITE->EditAttrs["class"] = "form-control";
		$this->ID_SITE->EditCustomAttributes = "";
		$this->ID_SITE->EditValue = $this->ID_SITE->CurrentValue;
		$this->ID_SITE->ViewCustomAttributes = "";

		// NOME_EMPRESA
		$this->NOME_EMPRESA->EditAttrs["class"] = "form-control";
		$this->NOME_EMPRESA->EditCustomAttributes = "";
		$this->NOME_EMPRESA->EditValue = $this->NOME_EMPRESA->CurrentValue;
		$this->NOME_EMPRESA->PlaceHolder = RemoveHtml($this->NOME_EMPRESA->caption());

		// NOME_CIDADE
		$this->NOME_CIDADE->EditAttrs["class"] = "form-control";
		$this->NOME_CIDADE->EditCustomAttributes = "";
		$this->NOME_CIDADE->EditValue = $this->NOME_CIDADE->CurrentValue;
		$this->NOME_CIDADE->PlaceHolder = RemoveHtml($this->NOME_CIDADE->caption());

		// ESTADO
		$this->ESTADO->EditAttrs["class"] = "form-control";
		$this->ESTADO->EditCustomAttributes = "";
		$this->ESTADO->EditValue = $this->ESTADO->CurrentValue;
		$this->ESTADO->PlaceHolder = RemoveHtml($this->ESTADO->caption());

		// FONE
		$this->FONE->EditAttrs["class"] = "form-control";
		$this->FONE->EditCustomAttributes = "";
		$this->FONE->EditValue = $this->FONE->CurrentValue;
		$this->FONE->PlaceHolder = RemoveHtml($this->FONE->caption());

		// FONE_APP
		$this->FONE_APP->EditAttrs["class"] = "form-control";
		$this->FONE_APP->EditCustomAttributes = "";
		$this->FONE_APP->EditValue = $this->FONE_APP->CurrentValue;
		$this->FONE_APP->PlaceHolder = RemoveHtml($this->FONE_APP->caption());

		// EMAIL
		$this->_EMAIL->EditAttrs["class"] = "form-control";
		$this->_EMAIL->EditCustomAttributes = "";
		$this->_EMAIL->EditValue = $this->_EMAIL->CurrentValue;
		$this->_EMAIL->PlaceHolder = RemoveHtml($this->_EMAIL->caption());

		// sendusername
		$this->sendusername->EditAttrs["class"] = "form-control";
		$this->sendusername->EditCustomAttributes = "";
		$this->sendusername->EditValue = $this->sendusername->CurrentValue;
		$this->sendusername->PlaceHolder = RemoveHtml($this->sendusername->caption());

		// sendpassword
		$this->sendpassword->EditAttrs["class"] = "form-control";
		$this->sendpassword->EditCustomAttributes = "";
		$this->sendpassword->EditValue = $this->sendpassword->CurrentValue;
		$this->sendpassword->PlaceHolder = RemoveHtml($this->sendpassword->caption());

		// smtpserver
		$this->smtpserver->EditAttrs["class"] = "form-control";
		$this->smtpserver->EditCustomAttributes = "";
		$this->smtpserver->EditValue = $this->smtpserver->CurrentValue;
		$this->smtpserver->PlaceHolder = RemoveHtml($this->smtpserver->caption());

		// smtpserverport
		$this->smtpserverport->EditAttrs["class"] = "form-control";
		$this->smtpserverport->EditCustomAttributes = "";
		$this->smtpserverport->EditValue = $this->smtpserverport->CurrentValue;
		$this->smtpserverport->PlaceHolder = RemoveHtml($this->smtpserverport->caption());

		// MailFrom
		$this->MailFrom->EditAttrs["class"] = "form-control";
		$this->MailFrom->EditCustomAttributes = "";
		$this->MailFrom->EditValue = $this->MailFrom->CurrentValue;
		$this->MailFrom->PlaceHolder = RemoveHtml($this->MailFrom->caption());

		// MailTo
		$this->MailTo->EditAttrs["class"] = "form-control";
		$this->MailTo->EditCustomAttributes = "";
		$this->MailTo->EditValue = $this->MailTo->CurrentValue;
		$this->MailTo->PlaceHolder = RemoveHtml($this->MailTo->caption());

		// MailCc
		$this->MailCc->EditAttrs["class"] = "form-control";
		$this->MailCc->EditCustomAttributes = "";
		$this->MailCc->EditValue = $this->MailCc->CurrentValue;
		$this->MailCc->PlaceHolder = RemoveHtml($this->MailCc->caption());

		// bool_ativo_site
		$this->bool_ativo_site->EditAttrs["class"] = "form-control";
		$this->bool_ativo_site->EditCustomAttributes = "";
		$this->bool_ativo_site->EditValue = $this->bool_ativo_site->CurrentValue;
		$this->bool_ativo_site->PlaceHolder = RemoveHtml($this->bool_ativo_site->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					if ($this->ID_SITE->Exportable)
						$doc->exportCaption($this->ID_SITE);
					if ($this->NOME_EMPRESA->Exportable)
						$doc->exportCaption($this->NOME_EMPRESA);
					if ($this->NOME_CIDADE->Exportable)
						$doc->exportCaption($this->NOME_CIDADE);
					if ($this->ESTADO->Exportable)
						$doc->exportCaption($this->ESTADO);
					if ($this->FONE->Exportable)
						$doc->exportCaption($this->FONE);
					if ($this->FONE_APP->Exportable)
						$doc->exportCaption($this->FONE_APP);
					if ($this->_EMAIL->Exportable)
						$doc->exportCaption($this->_EMAIL);
					if ($this->sendusername->Exportable)
						$doc->exportCaption($this->sendusername);
					if ($this->sendpassword->Exportable)
						$doc->exportCaption($this->sendpassword);
					if ($this->smtpserver->Exportable)
						$doc->exportCaption($this->smtpserver);
					if ($this->smtpserverport->Exportable)
						$doc->exportCaption($this->smtpserverport);
					if ($this->MailFrom->Exportable)
						$doc->exportCaption($this->MailFrom);
					if ($this->MailTo->Exportable)
						$doc->exportCaption($this->MailTo);
					if ($this->MailCc->Exportable)
						$doc->exportCaption($this->MailCc);
					if ($this->bool_ativo_site->Exportable)
						$doc->exportCaption($this->bool_ativo_site);
				} else {
					if ($this->ID_SITE->Exportable)
						$doc->exportCaption($this->ID_SITE);
					if ($this->NOME_EMPRESA->Exportable)
						$doc->exportCaption($this->NOME_EMPRESA);
					if ($this->NOME_CIDADE->Exportable)
						$doc->exportCaption($this->NOME_CIDADE);
					if ($this->ESTADO->Exportable)
						$doc->exportCaption($this->ESTADO);
					if ($this->FONE->Exportable)
						$doc->exportCaption($this->FONE);
					if ($this->FONE_APP->Exportable)
						$doc->exportCaption($this->FONE_APP);
					if ($this->_EMAIL->Exportable)
						$doc->exportCaption($this->_EMAIL);
					if ($this->sendusername->Exportable)
						$doc->exportCaption($this->sendusername);
					if ($this->sendpassword->Exportable)
						$doc->exportCaption($this->sendpassword);
					if ($this->smtpserver->Exportable)
						$doc->exportCaption($this->smtpserver);
					if ($this->smtpserverport->Exportable)
						$doc->exportCaption($this->smtpserverport);
					if ($this->MailFrom->Exportable)
						$doc->exportCaption($this->MailFrom);
					if ($this->MailTo->Exportable)
						$doc->exportCaption($this->MailTo);
					if ($this->MailCc->Exportable)
						$doc->exportCaption($this->MailCc);
					if ($this->bool_ativo_site->Exportable)
						$doc->exportCaption($this->bool_ativo_site);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						if ($this->ID_SITE->Exportable)
							$doc->exportField($this->ID_SITE);
						if ($this->NOME_EMPRESA->Exportable)
							$doc->exportField($this->NOME_EMPRESA);
						if ($this->NOME_CIDADE->Exportable)
							$doc->exportField($this->NOME_CIDADE);
						if ($this->ESTADO->Exportable)
							$doc->exportField($this->ESTADO);
						if ($this->FONE->Exportable)
							$doc->exportField($this->FONE);
						if ($this->FONE_APP->Exportable)
							$doc->exportField($this->FONE_APP);
						if ($this->_EMAIL->Exportable)
							$doc->exportField($this->_EMAIL);
						if ($this->sendusername->Exportable)
							$doc->exportField($this->sendusername);
						if ($this->sendpassword->Exportable)
							$doc->exportField($this->sendpassword);
						if ($this->smtpserver->Exportable)
							$doc->exportField($this->smtpserver);
						if ($this->smtpserverport->Exportable)
							$doc->exportField($this->smtpserverport);
						if ($this->MailFrom->Exportable)
							$doc->exportField($this->MailFrom);
						if ($this->MailTo->Exportable)
							$doc->exportField($this->MailTo);
						if ($this->MailCc->Exportable)
							$doc->exportField($this->MailCc);
						if ($this->bool_ativo_site->Exportable)
							$doc->exportField($this->bool_ativo_site);
					} else {
						if ($this->ID_SITE->Exportable)
							$doc->exportField($this->ID_SITE);
						if ($this->NOME_EMPRESA->Exportable)
							$doc->exportField($this->NOME_EMPRESA);
						if ($this->NOME_CIDADE->Exportable)
							$doc->exportField($this->NOME_CIDADE);
						if ($this->ESTADO->Exportable)
							$doc->exportField($this->ESTADO);
						if ($this->FONE->Exportable)
							$doc->exportField($this->FONE);
						if ($this->FONE_APP->Exportable)
							$doc->exportField($this->FONE_APP);
						if ($this->_EMAIL->Exportable)
							$doc->exportField($this->_EMAIL);
						if ($this->sendusername->Exportable)
							$doc->exportField($this->sendusername);
						if ($this->sendpassword->Exportable)
							$doc->exportField($this->sendpassword);
						if ($this->smtpserver->Exportable)
							$doc->exportField($this->smtpserver);
						if ($this->smtpserverport->Exportable)
							$doc->exportField($this->smtpserverport);
						if ($this->MailFrom->Exportable)
							$doc->exportField($this->MailFrom);
						if ($this->MailTo->Exportable)
							$doc->exportField($this->MailTo);
						if ($this->MailCc->Exportable)
							$doc->exportField($this->MailCc);
						if ($this->bool_ativo_site->Exportable)
							$doc->exportField($this->bool_ativo_site);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{

		// Load lookup parameters
		$distinct = (Post("distinct") === "1");
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		$lookup->FilterValues[] = rawurldecode(Post("v0", Post("lookupValue", ""))); // Lookup values
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = rawurldecode(Post("v" . $i, ""));
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
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
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
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
