<?php
namespace PHPMaker2019\project1;

/**
 * Table class for notificacoes_pendentes
 */
class notificacoes_pendentes extends DbTable
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
	public $id_notificacoes_pendentes;
	public $descricao_notificacoes_pendentes;
	public $usuario_atuador_notificacoes_pendentes;
	public $usuaio_requerente_notificacoes_pendentes;
	public $tipo_alteracao_notificacoes_pendentes;
	public $notificacoes_config_id;
	public $data_atualizacao_notificacoes_pendentes;
	public $bool_ativo_notificacoes_pendentes;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'notificacoes_pendentes';
		$this->TableName = 'notificacoes_pendentes';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`notificacoes_pendentes`";
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

		// id_notificacoes_pendentes
		$this->id_notificacoes_pendentes = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_id_notificacoes_pendentes', 'id_notificacoes_pendentes', '`id_notificacoes_pendentes`', '`id_notificacoes_pendentes`', 3, -1, FALSE, '`id_notificacoes_pendentes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_notificacoes_pendentes->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_notificacoes_pendentes->IsPrimaryKey = TRUE; // Primary key field
		$this->id_notificacoes_pendentes->Sortable = TRUE; // Allow sort
		$this->id_notificacoes_pendentes->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['id_notificacoes_pendentes'] = &$this->id_notificacoes_pendentes;

		// descricao_notificacoes_pendentes
		$this->descricao_notificacoes_pendentes = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_descricao_notificacoes_pendentes', 'descricao_notificacoes_pendentes', '`descricao_notificacoes_pendentes`', '`descricao_notificacoes_pendentes`', 201, -1, FALSE, '`descricao_notificacoes_pendentes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->descricao_notificacoes_pendentes->Nullable = FALSE; // NOT NULL field
		$this->descricao_notificacoes_pendentes->Sortable = TRUE; // Allow sort
		$this->fields['descricao_notificacoes_pendentes'] = &$this->descricao_notificacoes_pendentes;

		// usuario_atuador_notificacoes_pendentes
		$this->usuario_atuador_notificacoes_pendentes = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_usuario_atuador_notificacoes_pendentes', 'usuario_atuador_notificacoes_pendentes', '`usuario_atuador_notificacoes_pendentes`', '`usuario_atuador_notificacoes_pendentes`', 200, -1, FALSE, '`usuario_atuador_notificacoes_pendentes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usuario_atuador_notificacoes_pendentes->Nullable = FALSE; // NOT NULL field
		$this->usuario_atuador_notificacoes_pendentes->Required = TRUE; // Required field
		$this->usuario_atuador_notificacoes_pendentes->Sortable = TRUE; // Allow sort
		$this->fields['usuario_atuador_notificacoes_pendentes'] = &$this->usuario_atuador_notificacoes_pendentes;

		// usuaio_requerente_notificacoes_pendentes
		$this->usuaio_requerente_notificacoes_pendentes = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_usuaio_requerente_notificacoes_pendentes', 'usuaio_requerente_notificacoes_pendentes', '`usuaio_requerente_notificacoes_pendentes`', '`usuaio_requerente_notificacoes_pendentes`', 200, -1, FALSE, '`usuaio_requerente_notificacoes_pendentes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usuaio_requerente_notificacoes_pendentes->Nullable = FALSE; // NOT NULL field
		$this->usuaio_requerente_notificacoes_pendentes->Required = TRUE; // Required field
		$this->usuaio_requerente_notificacoes_pendentes->Sortable = TRUE; // Allow sort
		$this->fields['usuaio_requerente_notificacoes_pendentes'] = &$this->usuaio_requerente_notificacoes_pendentes;

		// tipo_alteracao_notificacoes_pendentes
		$this->tipo_alteracao_notificacoes_pendentes = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_tipo_alteracao_notificacoes_pendentes', 'tipo_alteracao_notificacoes_pendentes', '`tipo_alteracao_notificacoes_pendentes`', '`tipo_alteracao_notificacoes_pendentes`', 202, -1, FALSE, '`tipo_alteracao_notificacoes_pendentes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->tipo_alteracao_notificacoes_pendentes->Nullable = FALSE; // NOT NULL field
		$this->tipo_alteracao_notificacoes_pendentes->Required = TRUE; // Required field
		$this->tipo_alteracao_notificacoes_pendentes->Sortable = TRUE; // Allow sort
		$this->tipo_alteracao_notificacoes_pendentes->Lookup = new Lookup('tipo_alteracao_notificacoes_pendentes', 'notificacoes_pendentes', FALSE, '', ["","","",""], [], [], [], [], [], '', '');
		$this->tipo_alteracao_notificacoes_pendentes->OptionCount = 3;
		$this->fields['tipo_alteracao_notificacoes_pendentes'] = &$this->tipo_alteracao_notificacoes_pendentes;

		// notificacoes_config_id
		$this->notificacoes_config_id = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_notificacoes_config_id', 'notificacoes_config_id', '`notificacoes_config_id`', '`notificacoes_config_id`', 3, -1, FALSE, '`notificacoes_config_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->notificacoes_config_id->Nullable = FALSE; // NOT NULL field
		$this->notificacoes_config_id->Required = TRUE; // Required field
		$this->notificacoes_config_id->Sortable = TRUE; // Allow sort
		$this->notificacoes_config_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['notificacoes_config_id'] = &$this->notificacoes_config_id;

		// data_atualizacao_notificacoes_pendentes
		$this->data_atualizacao_notificacoes_pendentes = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_data_atualizacao_notificacoes_pendentes', 'data_atualizacao_notificacoes_pendentes', '`data_atualizacao_notificacoes_pendentes`', CastDateFieldForLike('`data_atualizacao_notificacoes_pendentes`', 0, "DB"), 135, 0, FALSE, '`data_atualizacao_notificacoes_pendentes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->data_atualizacao_notificacoes_pendentes->Nullable = FALSE; // NOT NULL field
		$this->data_atualizacao_notificacoes_pendentes->Required = TRUE; // Required field
		$this->data_atualizacao_notificacoes_pendentes->Sortable = TRUE; // Allow sort
		$this->data_atualizacao_notificacoes_pendentes->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['data_atualizacao_notificacoes_pendentes'] = &$this->data_atualizacao_notificacoes_pendentes;

		// bool_ativo_notificacoes_pendentes
		$this->bool_ativo_notificacoes_pendentes = new DbField('notificacoes_pendentes', 'notificacoes_pendentes', 'x_bool_ativo_notificacoes_pendentes', 'bool_ativo_notificacoes_pendentes', '`bool_ativo_notificacoes_pendentes`', '`bool_ativo_notificacoes_pendentes`', 3, -1, FALSE, '`bool_ativo_notificacoes_pendentes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bool_ativo_notificacoes_pendentes->Nullable = FALSE; // NOT NULL field
		$this->bool_ativo_notificacoes_pendentes->Required = TRUE; // Required field
		$this->bool_ativo_notificacoes_pendentes->Sortable = TRUE; // Allow sort
		$this->bool_ativo_notificacoes_pendentes->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['bool_ativo_notificacoes_pendentes'] = &$this->bool_ativo_notificacoes_pendentes;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`notificacoes_pendentes`";
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
			$this->id_notificacoes_pendentes->setDbValue($conn->insert_ID());
			$rs['id_notificacoes_pendentes'] = $this->id_notificacoes_pendentes->DbValue;
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
			if (array_key_exists('id_notificacoes_pendentes', $rs))
				AddFilter($where, QuotedName('id_notificacoes_pendentes', $this->Dbid) . '=' . QuotedValue($rs['id_notificacoes_pendentes'], $this->id_notificacoes_pendentes->DataType, $this->Dbid));
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
		$this->id_notificacoes_pendentes->DbValue = $row['id_notificacoes_pendentes'];
		$this->descricao_notificacoes_pendentes->DbValue = $row['descricao_notificacoes_pendentes'];
		$this->usuario_atuador_notificacoes_pendentes->DbValue = $row['usuario_atuador_notificacoes_pendentes'];
		$this->usuaio_requerente_notificacoes_pendentes->DbValue = $row['usuaio_requerente_notificacoes_pendentes'];
		$this->tipo_alteracao_notificacoes_pendentes->DbValue = $row['tipo_alteracao_notificacoes_pendentes'];
		$this->notificacoes_config_id->DbValue = $row['notificacoes_config_id'];
		$this->data_atualizacao_notificacoes_pendentes->DbValue = $row['data_atualizacao_notificacoes_pendentes'];
		$this->bool_ativo_notificacoes_pendentes->DbValue = $row['bool_ativo_notificacoes_pendentes'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id_notificacoes_pendentes` = @id_notificacoes_pendentes@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id_notificacoes_pendentes', $row) ? $row['id_notificacoes_pendentes'] : NULL) : $this->id_notificacoes_pendentes->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_notificacoes_pendentes@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "notificacoes_pendenteslist.php";
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
		if ($pageName == "notificacoes_pendentesview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "notificacoes_pendentesedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "notificacoes_pendentesadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "notificacoes_pendenteslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("notificacoes_pendentesview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("notificacoes_pendentesview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "notificacoes_pendentesadd.php?" . $this->getUrlParm($parm);
		else
			$url = "notificacoes_pendentesadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("notificacoes_pendentesedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("notificacoes_pendentesadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("notificacoes_pendentesdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_notificacoes_pendentes:" . JsonEncode($this->id_notificacoes_pendentes->CurrentValue, "number");
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
		if ($this->id_notificacoes_pendentes->CurrentValue != NULL) {
			$url .= "id_notificacoes_pendentes=" . urlencode($this->id_notificacoes_pendentes->CurrentValue);
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
			if (Param("id_notificacoes_pendentes") !== NULL)
				$arKeys[] = Param("id_notificacoes_pendentes");
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
			$this->id_notificacoes_pendentes->CurrentValue = $key;
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
		$this->id_notificacoes_pendentes->setDbValue($rs->fields('id_notificacoes_pendentes'));
		$this->descricao_notificacoes_pendentes->setDbValue($rs->fields('descricao_notificacoes_pendentes'));
		$this->usuario_atuador_notificacoes_pendentes->setDbValue($rs->fields('usuario_atuador_notificacoes_pendentes'));
		$this->usuaio_requerente_notificacoes_pendentes->setDbValue($rs->fields('usuaio_requerente_notificacoes_pendentes'));
		$this->tipo_alteracao_notificacoes_pendentes->setDbValue($rs->fields('tipo_alteracao_notificacoes_pendentes'));
		$this->notificacoes_config_id->setDbValue($rs->fields('notificacoes_config_id'));
		$this->data_atualizacao_notificacoes_pendentes->setDbValue($rs->fields('data_atualizacao_notificacoes_pendentes'));
		$this->bool_ativo_notificacoes_pendentes->setDbValue($rs->fields('bool_ativo_notificacoes_pendentes'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// id_notificacoes_pendentes
		// descricao_notificacoes_pendentes
		// usuario_atuador_notificacoes_pendentes
		// usuaio_requerente_notificacoes_pendentes
		// tipo_alteracao_notificacoes_pendentes
		// notificacoes_config_id
		// data_atualizacao_notificacoes_pendentes
		// bool_ativo_notificacoes_pendentes
		// id_notificacoes_pendentes

		$this->id_notificacoes_pendentes->ViewValue = $this->id_notificacoes_pendentes->CurrentValue;
		$this->id_notificacoes_pendentes->ViewCustomAttributes = "";

		// descricao_notificacoes_pendentes
		$this->descricao_notificacoes_pendentes->ViewValue = $this->descricao_notificacoes_pendentes->CurrentValue;
		$this->descricao_notificacoes_pendentes->ViewCustomAttributes = "";

		// usuario_atuador_notificacoes_pendentes
		$this->usuario_atuador_notificacoes_pendentes->ViewValue = $this->usuario_atuador_notificacoes_pendentes->CurrentValue;
		$this->usuario_atuador_notificacoes_pendentes->ViewCustomAttributes = "";

		// usuaio_requerente_notificacoes_pendentes
		$this->usuaio_requerente_notificacoes_pendentes->ViewValue = $this->usuaio_requerente_notificacoes_pendentes->CurrentValue;
		$this->usuaio_requerente_notificacoes_pendentes->ViewCustomAttributes = "";

		// tipo_alteracao_notificacoes_pendentes
		if (strval($this->tipo_alteracao_notificacoes_pendentes->CurrentValue) <> "") {
			$this->tipo_alteracao_notificacoes_pendentes->ViewValue = $this->tipo_alteracao_notificacoes_pendentes->optionCaption($this->tipo_alteracao_notificacoes_pendentes->CurrentValue);
		} else {
			$this->tipo_alteracao_notificacoes_pendentes->ViewValue = NULL;
		}
		$this->tipo_alteracao_notificacoes_pendentes->ViewCustomAttributes = "";

		// notificacoes_config_id
		$this->notificacoes_config_id->ViewValue = $this->notificacoes_config_id->CurrentValue;
		$this->notificacoes_config_id->ViewValue = FormatNumber($this->notificacoes_config_id->ViewValue, 0, -2, -2, -2);
		$this->notificacoes_config_id->ViewCustomAttributes = "";

		// data_atualizacao_notificacoes_pendentes
		$this->data_atualizacao_notificacoes_pendentes->ViewValue = $this->data_atualizacao_notificacoes_pendentes->CurrentValue;
		$this->data_atualizacao_notificacoes_pendentes->ViewValue = FormatDateTime($this->data_atualizacao_notificacoes_pendentes->ViewValue, 0);
		$this->data_atualizacao_notificacoes_pendentes->ViewCustomAttributes = "";

		// bool_ativo_notificacoes_pendentes
		$this->bool_ativo_notificacoes_pendentes->ViewValue = $this->bool_ativo_notificacoes_pendentes->CurrentValue;
		$this->bool_ativo_notificacoes_pendentes->ViewValue = FormatNumber($this->bool_ativo_notificacoes_pendentes->ViewValue, 0, -2, -2, -2);
		$this->bool_ativo_notificacoes_pendentes->ViewCustomAttributes = "";

		// id_notificacoes_pendentes
		$this->id_notificacoes_pendentes->LinkCustomAttributes = "";
		$this->id_notificacoes_pendentes->HrefValue = "";
		$this->id_notificacoes_pendentes->TooltipValue = "";

		// descricao_notificacoes_pendentes
		$this->descricao_notificacoes_pendentes->LinkCustomAttributes = "";
		$this->descricao_notificacoes_pendentes->HrefValue = "";
		$this->descricao_notificacoes_pendentes->TooltipValue = "";

		// usuario_atuador_notificacoes_pendentes
		$this->usuario_atuador_notificacoes_pendentes->LinkCustomAttributes = "";
		$this->usuario_atuador_notificacoes_pendentes->HrefValue = "";
		$this->usuario_atuador_notificacoes_pendentes->TooltipValue = "";

		// usuaio_requerente_notificacoes_pendentes
		$this->usuaio_requerente_notificacoes_pendentes->LinkCustomAttributes = "";
		$this->usuaio_requerente_notificacoes_pendentes->HrefValue = "";
		$this->usuaio_requerente_notificacoes_pendentes->TooltipValue = "";

		// tipo_alteracao_notificacoes_pendentes
		$this->tipo_alteracao_notificacoes_pendentes->LinkCustomAttributes = "";
		$this->tipo_alteracao_notificacoes_pendentes->HrefValue = "";
		$this->tipo_alteracao_notificacoes_pendentes->TooltipValue = "";

		// notificacoes_config_id
		$this->notificacoes_config_id->LinkCustomAttributes = "";
		$this->notificacoes_config_id->HrefValue = "";
		$this->notificacoes_config_id->TooltipValue = "";

		// data_atualizacao_notificacoes_pendentes
		$this->data_atualizacao_notificacoes_pendentes->LinkCustomAttributes = "";
		$this->data_atualizacao_notificacoes_pendentes->HrefValue = "";
		$this->data_atualizacao_notificacoes_pendentes->TooltipValue = "";

		// bool_ativo_notificacoes_pendentes
		$this->bool_ativo_notificacoes_pendentes->LinkCustomAttributes = "";
		$this->bool_ativo_notificacoes_pendentes->HrefValue = "";
		$this->bool_ativo_notificacoes_pendentes->TooltipValue = "";

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

		// id_notificacoes_pendentes
		$this->id_notificacoes_pendentes->EditAttrs["class"] = "form-control";
		$this->id_notificacoes_pendentes->EditCustomAttributes = "";
		$this->id_notificacoes_pendentes->EditValue = $this->id_notificacoes_pendentes->CurrentValue;
		$this->id_notificacoes_pendentes->ViewCustomAttributes = "";

		// descricao_notificacoes_pendentes
		$this->descricao_notificacoes_pendentes->EditAttrs["class"] = "form-control";
		$this->descricao_notificacoes_pendentes->EditCustomAttributes = "";
		$this->descricao_notificacoes_pendentes->EditValue = $this->descricao_notificacoes_pendentes->CurrentValue;
		$this->descricao_notificacoes_pendentes->PlaceHolder = RemoveHtml($this->descricao_notificacoes_pendentes->caption());

		// usuario_atuador_notificacoes_pendentes
		$this->usuario_atuador_notificacoes_pendentes->EditAttrs["class"] = "form-control";
		$this->usuario_atuador_notificacoes_pendentes->EditCustomAttributes = "";
		$this->usuario_atuador_notificacoes_pendentes->EditValue = $this->usuario_atuador_notificacoes_pendentes->CurrentValue;
		$this->usuario_atuador_notificacoes_pendentes->PlaceHolder = RemoveHtml($this->usuario_atuador_notificacoes_pendentes->caption());

		// usuaio_requerente_notificacoes_pendentes
		$this->usuaio_requerente_notificacoes_pendentes->EditAttrs["class"] = "form-control";
		$this->usuaio_requerente_notificacoes_pendentes->EditCustomAttributes = "";
		$this->usuaio_requerente_notificacoes_pendentes->EditValue = $this->usuaio_requerente_notificacoes_pendentes->CurrentValue;
		$this->usuaio_requerente_notificacoes_pendentes->PlaceHolder = RemoveHtml($this->usuaio_requerente_notificacoes_pendentes->caption());

		// tipo_alteracao_notificacoes_pendentes
		$this->tipo_alteracao_notificacoes_pendentes->EditCustomAttributes = "";
		$this->tipo_alteracao_notificacoes_pendentes->EditValue = $this->tipo_alteracao_notificacoes_pendentes->options(FALSE);

		// notificacoes_config_id
		$this->notificacoes_config_id->EditAttrs["class"] = "form-control";
		$this->notificacoes_config_id->EditCustomAttributes = "";
		$this->notificacoes_config_id->EditValue = $this->notificacoes_config_id->CurrentValue;
		$this->notificacoes_config_id->PlaceHolder = RemoveHtml($this->notificacoes_config_id->caption());

		// data_atualizacao_notificacoes_pendentes
		$this->data_atualizacao_notificacoes_pendentes->EditAttrs["class"] = "form-control";
		$this->data_atualizacao_notificacoes_pendentes->EditCustomAttributes = "";
		$this->data_atualizacao_notificacoes_pendentes->EditValue = FormatDateTime($this->data_atualizacao_notificacoes_pendentes->CurrentValue, 8);
		$this->data_atualizacao_notificacoes_pendentes->PlaceHolder = RemoveHtml($this->data_atualizacao_notificacoes_pendentes->caption());

		// bool_ativo_notificacoes_pendentes
		$this->bool_ativo_notificacoes_pendentes->EditAttrs["class"] = "form-control";
		$this->bool_ativo_notificacoes_pendentes->EditCustomAttributes = "";
		$this->bool_ativo_notificacoes_pendentes->EditValue = $this->bool_ativo_notificacoes_pendentes->CurrentValue;
		$this->bool_ativo_notificacoes_pendentes->PlaceHolder = RemoveHtml($this->bool_ativo_notificacoes_pendentes->caption());

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
					if ($this->id_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->id_notificacoes_pendentes);
					if ($this->descricao_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->descricao_notificacoes_pendentes);
					if ($this->usuario_atuador_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->usuario_atuador_notificacoes_pendentes);
					if ($this->usuaio_requerente_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->usuaio_requerente_notificacoes_pendentes);
					if ($this->tipo_alteracao_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->tipo_alteracao_notificacoes_pendentes);
					if ($this->notificacoes_config_id->Exportable)
						$doc->exportCaption($this->notificacoes_config_id);
					if ($this->data_atualizacao_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->data_atualizacao_notificacoes_pendentes);
					if ($this->bool_ativo_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->bool_ativo_notificacoes_pendentes);
				} else {
					if ($this->id_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->id_notificacoes_pendentes);
					if ($this->usuario_atuador_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->usuario_atuador_notificacoes_pendentes);
					if ($this->usuaio_requerente_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->usuaio_requerente_notificacoes_pendentes);
					if ($this->tipo_alteracao_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->tipo_alteracao_notificacoes_pendentes);
					if ($this->notificacoes_config_id->Exportable)
						$doc->exportCaption($this->notificacoes_config_id);
					if ($this->data_atualizacao_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->data_atualizacao_notificacoes_pendentes);
					if ($this->bool_ativo_notificacoes_pendentes->Exportable)
						$doc->exportCaption($this->bool_ativo_notificacoes_pendentes);
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
						if ($this->id_notificacoes_pendentes->Exportable)
							$doc->exportField($this->id_notificacoes_pendentes);
						if ($this->descricao_notificacoes_pendentes->Exportable)
							$doc->exportField($this->descricao_notificacoes_pendentes);
						if ($this->usuario_atuador_notificacoes_pendentes->Exportable)
							$doc->exportField($this->usuario_atuador_notificacoes_pendentes);
						if ($this->usuaio_requerente_notificacoes_pendentes->Exportable)
							$doc->exportField($this->usuaio_requerente_notificacoes_pendentes);
						if ($this->tipo_alteracao_notificacoes_pendentes->Exportable)
							$doc->exportField($this->tipo_alteracao_notificacoes_pendentes);
						if ($this->notificacoes_config_id->Exportable)
							$doc->exportField($this->notificacoes_config_id);
						if ($this->data_atualizacao_notificacoes_pendentes->Exportable)
							$doc->exportField($this->data_atualizacao_notificacoes_pendentes);
						if ($this->bool_ativo_notificacoes_pendentes->Exportable)
							$doc->exportField($this->bool_ativo_notificacoes_pendentes);
					} else {
						if ($this->id_notificacoes_pendentes->Exportable)
							$doc->exportField($this->id_notificacoes_pendentes);
						if ($this->usuario_atuador_notificacoes_pendentes->Exportable)
							$doc->exportField($this->usuario_atuador_notificacoes_pendentes);
						if ($this->usuaio_requerente_notificacoes_pendentes->Exportable)
							$doc->exportField($this->usuaio_requerente_notificacoes_pendentes);
						if ($this->tipo_alteracao_notificacoes_pendentes->Exportable)
							$doc->exportField($this->tipo_alteracao_notificacoes_pendentes);
						if ($this->notificacoes_config_id->Exportable)
							$doc->exportField($this->notificacoes_config_id);
						if ($this->data_atualizacao_notificacoes_pendentes->Exportable)
							$doc->exportField($this->data_atualizacao_notificacoes_pendentes);
						if ($this->bool_ativo_notificacoes_pendentes->Exportable)
							$doc->exportField($this->bool_ativo_notificacoes_pendentes);
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
