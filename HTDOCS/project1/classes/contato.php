<?php
namespace PHPMaker2019\project1;

/**
 * Table class for contato
 */
class contato extends DbTable
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
	public $id_contato;
	public $nome_contato;
	public $email_contato;
	public $telefone_contato;
	public $assunto_contato;
	public $mensagem_contato;
	public $usuario_id;
	public $data_atualizacao_contato;
	public $bool_ativo_contato;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'contato';
		$this->TableName = 'contato';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`contato`";
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

		// id_contato
		$this->id_contato = new DbField('contato', 'contato', 'x_id_contato', 'id_contato', '`id_contato`', '`id_contato`', 3, -1, FALSE, '`id_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_contato->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_contato->IsPrimaryKey = TRUE; // Primary key field
		$this->id_contato->Sortable = TRUE; // Allow sort
		$this->id_contato->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['id_contato'] = &$this->id_contato;

		// nome_contato
		$this->nome_contato = new DbField('contato', 'contato', 'x_nome_contato', 'nome_contato', '`nome_contato`', '`nome_contato`', 200, -1, FALSE, '`nome_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nome_contato->Nullable = FALSE; // NOT NULL field
		$this->nome_contato->Required = TRUE; // Required field
		$this->nome_contato->Sortable = TRUE; // Allow sort
		$this->fields['nome_contato'] = &$this->nome_contato;

		// email_contato
		$this->email_contato = new DbField('contato', 'contato', 'x_email_contato', 'email_contato', '`email_contato`', '`email_contato`', 200, -1, FALSE, '`email_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->email_contato->Sortable = TRUE; // Allow sort
		$this->fields['email_contato'] = &$this->email_contato;

		// telefone_contato
		$this->telefone_contato = new DbField('contato', 'contato', 'x_telefone_contato', 'telefone_contato', '`telefone_contato`', '`telefone_contato`', 200, -1, FALSE, '`telefone_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefone_contato->Sortable = TRUE; // Allow sort
		$this->fields['telefone_contato'] = &$this->telefone_contato;

		// assunto_contato
		$this->assunto_contato = new DbField('contato', 'contato', 'x_assunto_contato', 'assunto_contato', '`assunto_contato`', '`assunto_contato`', 200, -1, FALSE, '`assunto_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->assunto_contato->Sortable = TRUE; // Allow sort
		$this->fields['assunto_contato'] = &$this->assunto_contato;

		// mensagem_contato
		$this->mensagem_contato = new DbField('contato', 'contato', 'x_mensagem_contato', 'mensagem_contato', '`mensagem_contato`', '`mensagem_contato`', 201, -1, FALSE, '`mensagem_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->mensagem_contato->Sortable = TRUE; // Allow sort
		$this->fields['mensagem_contato'] = &$this->mensagem_contato;

		// usuario_id
		$this->usuario_id = new DbField('contato', 'contato', 'x_usuario_id', 'usuario_id', '`usuario_id`', '`usuario_id`', 3, -1, FALSE, '`usuario_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usuario_id->Nullable = FALSE; // NOT NULL field
		$this->usuario_id->Required = TRUE; // Required field
		$this->usuario_id->Sortable = TRUE; // Allow sort
		$this->usuario_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['usuario_id'] = &$this->usuario_id;

		// data_atualizacao_contato
		$this->data_atualizacao_contato = new DbField('contato', 'contato', 'x_data_atualizacao_contato', 'data_atualizacao_contato', '`data_atualizacao_contato`', CastDateFieldForLike('`data_atualizacao_contato`', 0, "DB"), 135, 0, FALSE, '`data_atualizacao_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->data_atualizacao_contato->Nullable = FALSE; // NOT NULL field
		$this->data_atualizacao_contato->Required = TRUE; // Required field
		$this->data_atualizacao_contato->Sortable = TRUE; // Allow sort
		$this->data_atualizacao_contato->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['data_atualizacao_contato'] = &$this->data_atualizacao_contato;

		// bool_ativo_contato
		$this->bool_ativo_contato = new DbField('contato', 'contato', 'x_bool_ativo_contato', 'bool_ativo_contato', '`bool_ativo_contato`', '`bool_ativo_contato`', 3, -1, FALSE, '`bool_ativo_contato`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bool_ativo_contato->Nullable = FALSE; // NOT NULL field
		$this->bool_ativo_contato->Required = TRUE; // Required field
		$this->bool_ativo_contato->Sortable = TRUE; // Allow sort
		$this->bool_ativo_contato->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['bool_ativo_contato'] = &$this->bool_ativo_contato;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`contato`";
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
			$this->id_contato->setDbValue($conn->insert_ID());
			$rs['id_contato'] = $this->id_contato->DbValue;
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
			if (array_key_exists('id_contato', $rs))
				AddFilter($where, QuotedName('id_contato', $this->Dbid) . '=' . QuotedValue($rs['id_contato'], $this->id_contato->DataType, $this->Dbid));
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
		$this->id_contato->DbValue = $row['id_contato'];
		$this->nome_contato->DbValue = $row['nome_contato'];
		$this->email_contato->DbValue = $row['email_contato'];
		$this->telefone_contato->DbValue = $row['telefone_contato'];
		$this->assunto_contato->DbValue = $row['assunto_contato'];
		$this->mensagem_contato->DbValue = $row['mensagem_contato'];
		$this->usuario_id->DbValue = $row['usuario_id'];
		$this->data_atualizacao_contato->DbValue = $row['data_atualizacao_contato'];
		$this->bool_ativo_contato->DbValue = $row['bool_ativo_contato'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id_contato` = @id_contato@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id_contato', $row) ? $row['id_contato'] : NULL) : $this->id_contato->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_contato@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "contatolist.php";
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
		if ($pageName == "contatoview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "contatoedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "contatoadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "contatolist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("contatoview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("contatoview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "contatoadd.php?" . $this->getUrlParm($parm);
		else
			$url = "contatoadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("contatoedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("contatoadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("contatodelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_contato:" . JsonEncode($this->id_contato->CurrentValue, "number");
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
		if ($this->id_contato->CurrentValue != NULL) {
			$url .= "id_contato=" . urlencode($this->id_contato->CurrentValue);
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
			if (Param("id_contato") !== NULL)
				$arKeys[] = Param("id_contato");
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
			$this->id_contato->CurrentValue = $key;
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
		$this->id_contato->setDbValue($rs->fields('id_contato'));
		$this->nome_contato->setDbValue($rs->fields('nome_contato'));
		$this->email_contato->setDbValue($rs->fields('email_contato'));
		$this->telefone_contato->setDbValue($rs->fields('telefone_contato'));
		$this->assunto_contato->setDbValue($rs->fields('assunto_contato'));
		$this->mensagem_contato->setDbValue($rs->fields('mensagem_contato'));
		$this->usuario_id->setDbValue($rs->fields('usuario_id'));
		$this->data_atualizacao_contato->setDbValue($rs->fields('data_atualizacao_contato'));
		$this->bool_ativo_contato->setDbValue($rs->fields('bool_ativo_contato'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// id_contato
		// nome_contato
		// email_contato
		// telefone_contato
		// assunto_contato
		// mensagem_contato
		// usuario_id
		// data_atualizacao_contato
		// bool_ativo_contato
		// id_contato

		$this->id_contato->ViewValue = $this->id_contato->CurrentValue;
		$this->id_contato->ViewCustomAttributes = "";

		// nome_contato
		$this->nome_contato->ViewValue = $this->nome_contato->CurrentValue;
		$this->nome_contato->ViewCustomAttributes = "";

		// email_contato
		$this->email_contato->ViewValue = $this->email_contato->CurrentValue;
		$this->email_contato->ViewCustomAttributes = "";

		// telefone_contato
		$this->telefone_contato->ViewValue = $this->telefone_contato->CurrentValue;
		$this->telefone_contato->ViewCustomAttributes = "";

		// assunto_contato
		$this->assunto_contato->ViewValue = $this->assunto_contato->CurrentValue;
		$this->assunto_contato->ViewCustomAttributes = "";

		// mensagem_contato
		$this->mensagem_contato->ViewValue = $this->mensagem_contato->CurrentValue;
		$this->mensagem_contato->ViewCustomAttributes = "";

		// usuario_id
		$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
		$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
		$this->usuario_id->ViewCustomAttributes = "";

		// data_atualizacao_contato
		$this->data_atualizacao_contato->ViewValue = $this->data_atualizacao_contato->CurrentValue;
		$this->data_atualizacao_contato->ViewValue = FormatDateTime($this->data_atualizacao_contato->ViewValue, 0);
		$this->data_atualizacao_contato->ViewCustomAttributes = "";

		// bool_ativo_contato
		$this->bool_ativo_contato->ViewValue = $this->bool_ativo_contato->CurrentValue;
		$this->bool_ativo_contato->ViewValue = FormatNumber($this->bool_ativo_contato->ViewValue, 0, -2, -2, -2);
		$this->bool_ativo_contato->ViewCustomAttributes = "";

		// id_contato
		$this->id_contato->LinkCustomAttributes = "";
		$this->id_contato->HrefValue = "";
		$this->id_contato->TooltipValue = "";

		// nome_contato
		$this->nome_contato->LinkCustomAttributes = "";
		$this->nome_contato->HrefValue = "";
		$this->nome_contato->TooltipValue = "";

		// email_contato
		$this->email_contato->LinkCustomAttributes = "";
		$this->email_contato->HrefValue = "";
		$this->email_contato->TooltipValue = "";

		// telefone_contato
		$this->telefone_contato->LinkCustomAttributes = "";
		$this->telefone_contato->HrefValue = "";
		$this->telefone_contato->TooltipValue = "";

		// assunto_contato
		$this->assunto_contato->LinkCustomAttributes = "";
		$this->assunto_contato->HrefValue = "";
		$this->assunto_contato->TooltipValue = "";

		// mensagem_contato
		$this->mensagem_contato->LinkCustomAttributes = "";
		$this->mensagem_contato->HrefValue = "";
		$this->mensagem_contato->TooltipValue = "";

		// usuario_id
		$this->usuario_id->LinkCustomAttributes = "";
		$this->usuario_id->HrefValue = "";
		$this->usuario_id->TooltipValue = "";

		// data_atualizacao_contato
		$this->data_atualizacao_contato->LinkCustomAttributes = "";
		$this->data_atualizacao_contato->HrefValue = "";
		$this->data_atualizacao_contato->TooltipValue = "";

		// bool_ativo_contato
		$this->bool_ativo_contato->LinkCustomAttributes = "";
		$this->bool_ativo_contato->HrefValue = "";
		$this->bool_ativo_contato->TooltipValue = "";

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

		// id_contato
		$this->id_contato->EditAttrs["class"] = "form-control";
		$this->id_contato->EditCustomAttributes = "";
		$this->id_contato->EditValue = $this->id_contato->CurrentValue;
		$this->id_contato->ViewCustomAttributes = "";

		// nome_contato
		$this->nome_contato->EditAttrs["class"] = "form-control";
		$this->nome_contato->EditCustomAttributes = "";
		$this->nome_contato->EditValue = $this->nome_contato->CurrentValue;
		$this->nome_contato->PlaceHolder = RemoveHtml($this->nome_contato->caption());

		// email_contato
		$this->email_contato->EditAttrs["class"] = "form-control";
		$this->email_contato->EditCustomAttributes = "";
		$this->email_contato->EditValue = $this->email_contato->CurrentValue;
		$this->email_contato->PlaceHolder = RemoveHtml($this->email_contato->caption());

		// telefone_contato
		$this->telefone_contato->EditAttrs["class"] = "form-control";
		$this->telefone_contato->EditCustomAttributes = "";
		$this->telefone_contato->EditValue = $this->telefone_contato->CurrentValue;
		$this->telefone_contato->PlaceHolder = RemoveHtml($this->telefone_contato->caption());

		// assunto_contato
		$this->assunto_contato->EditAttrs["class"] = "form-control";
		$this->assunto_contato->EditCustomAttributes = "";
		$this->assunto_contato->EditValue = $this->assunto_contato->CurrentValue;
		$this->assunto_contato->PlaceHolder = RemoveHtml($this->assunto_contato->caption());

		// mensagem_contato
		$this->mensagem_contato->EditAttrs["class"] = "form-control";
		$this->mensagem_contato->EditCustomAttributes = "";
		$this->mensagem_contato->EditValue = $this->mensagem_contato->CurrentValue;
		$this->mensagem_contato->PlaceHolder = RemoveHtml($this->mensagem_contato->caption());

		// usuario_id
		$this->usuario_id->EditAttrs["class"] = "form-control";
		$this->usuario_id->EditCustomAttributes = "";
		$this->usuario_id->EditValue = $this->usuario_id->CurrentValue;
		$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

		// data_atualizacao_contato
		$this->data_atualizacao_contato->EditAttrs["class"] = "form-control";
		$this->data_atualizacao_contato->EditCustomAttributes = "";
		$this->data_atualizacao_contato->EditValue = FormatDateTime($this->data_atualizacao_contato->CurrentValue, 8);
		$this->data_atualizacao_contato->PlaceHolder = RemoveHtml($this->data_atualizacao_contato->caption());

		// bool_ativo_contato
		$this->bool_ativo_contato->EditAttrs["class"] = "form-control";
		$this->bool_ativo_contato->EditCustomAttributes = "";
		$this->bool_ativo_contato->EditValue = $this->bool_ativo_contato->CurrentValue;
		$this->bool_ativo_contato->PlaceHolder = RemoveHtml($this->bool_ativo_contato->caption());

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
					if ($this->id_contato->Exportable)
						$doc->exportCaption($this->id_contato);
					if ($this->nome_contato->Exportable)
						$doc->exportCaption($this->nome_contato);
					if ($this->email_contato->Exportable)
						$doc->exportCaption($this->email_contato);
					if ($this->telefone_contato->Exportable)
						$doc->exportCaption($this->telefone_contato);
					if ($this->assunto_contato->Exportable)
						$doc->exportCaption($this->assunto_contato);
					if ($this->mensagem_contato->Exportable)
						$doc->exportCaption($this->mensagem_contato);
					if ($this->usuario_id->Exportable)
						$doc->exportCaption($this->usuario_id);
					if ($this->data_atualizacao_contato->Exportable)
						$doc->exportCaption($this->data_atualizacao_contato);
					if ($this->bool_ativo_contato->Exportable)
						$doc->exportCaption($this->bool_ativo_contato);
				} else {
					if ($this->id_contato->Exportable)
						$doc->exportCaption($this->id_contato);
					if ($this->nome_contato->Exportable)
						$doc->exportCaption($this->nome_contato);
					if ($this->email_contato->Exportable)
						$doc->exportCaption($this->email_contato);
					if ($this->telefone_contato->Exportable)
						$doc->exportCaption($this->telefone_contato);
					if ($this->assunto_contato->Exportable)
						$doc->exportCaption($this->assunto_contato);
					if ($this->usuario_id->Exportable)
						$doc->exportCaption($this->usuario_id);
					if ($this->data_atualizacao_contato->Exportable)
						$doc->exportCaption($this->data_atualizacao_contato);
					if ($this->bool_ativo_contato->Exportable)
						$doc->exportCaption($this->bool_ativo_contato);
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
						if ($this->id_contato->Exportable)
							$doc->exportField($this->id_contato);
						if ($this->nome_contato->Exportable)
							$doc->exportField($this->nome_contato);
						if ($this->email_contato->Exportable)
							$doc->exportField($this->email_contato);
						if ($this->telefone_contato->Exportable)
							$doc->exportField($this->telefone_contato);
						if ($this->assunto_contato->Exportable)
							$doc->exportField($this->assunto_contato);
						if ($this->mensagem_contato->Exportable)
							$doc->exportField($this->mensagem_contato);
						if ($this->usuario_id->Exportable)
							$doc->exportField($this->usuario_id);
						if ($this->data_atualizacao_contato->Exportable)
							$doc->exportField($this->data_atualizacao_contato);
						if ($this->bool_ativo_contato->Exportable)
							$doc->exportField($this->bool_ativo_contato);
					} else {
						if ($this->id_contato->Exportable)
							$doc->exportField($this->id_contato);
						if ($this->nome_contato->Exportable)
							$doc->exportField($this->nome_contato);
						if ($this->email_contato->Exportable)
							$doc->exportField($this->email_contato);
						if ($this->telefone_contato->Exportable)
							$doc->exportField($this->telefone_contato);
						if ($this->assunto_contato->Exportable)
							$doc->exportField($this->assunto_contato);
						if ($this->usuario_id->Exportable)
							$doc->exportField($this->usuario_id);
						if ($this->data_atualizacao_contato->Exportable)
							$doc->exportField($this->data_atualizacao_contato);
						if ($this->bool_ativo_contato->Exportable)
							$doc->exportField($this->bool_ativo_contato);
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
