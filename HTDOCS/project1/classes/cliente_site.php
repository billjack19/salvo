<?php
namespace PHPMaker2019\project1;

/**
 * Table class for cliente_site
 */
class cliente_site extends DbTable
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
	public $id_cliente_site;
	public $nome_cliente_site;
	public $login_cliente_site;
	public $senha_cliente_site;
	public $telefone_cliente_site;
	public $celular_cliente_site;
	public $endereco_cliente_site;
	public $numero_cliente_site;
	public $complemento_cliente_site;
	public $bairro_cliente_site;
	public $cidade_cliente_site;
	public $estado_id;
	public $cep_cliente_site;
	public $data_atualizacao_cliente_site;
	public $usuario_id;
	public $bool_ativo_cliente_site;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'cliente_site';
		$this->TableName = 'cliente_site';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`cliente_site`";
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

		// id_cliente_site
		$this->id_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_id_cliente_site', 'id_cliente_site', '`id_cliente_site`', '`id_cliente_site`', 3, -1, FALSE, '`id_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_cliente_site->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_cliente_site->IsPrimaryKey = TRUE; // Primary key field
		$this->id_cliente_site->Sortable = TRUE; // Allow sort
		$this->id_cliente_site->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['id_cliente_site'] = &$this->id_cliente_site;

		// nome_cliente_site
		$this->nome_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_nome_cliente_site', 'nome_cliente_site', '`nome_cliente_site`', '`nome_cliente_site`', 200, -1, FALSE, '`nome_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nome_cliente_site->Nullable = FALSE; // NOT NULL field
		$this->nome_cliente_site->Required = TRUE; // Required field
		$this->nome_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['nome_cliente_site'] = &$this->nome_cliente_site;

		// login_cliente_site
		$this->login_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_login_cliente_site', 'login_cliente_site', '`login_cliente_site`', '`login_cliente_site`', 200, -1, FALSE, '`login_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->login_cliente_site->Nullable = FALSE; // NOT NULL field
		$this->login_cliente_site->Required = TRUE; // Required field
		$this->login_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['login_cliente_site'] = &$this->login_cliente_site;

		// senha_cliente_site
		$this->senha_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_senha_cliente_site', 'senha_cliente_site', '`senha_cliente_site`', '`senha_cliente_site`', 200, -1, FALSE, '`senha_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->senha_cliente_site->Nullable = FALSE; // NOT NULL field
		$this->senha_cliente_site->Required = TRUE; // Required field
		$this->senha_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['senha_cliente_site'] = &$this->senha_cliente_site;

		// telefone_cliente_site
		$this->telefone_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_telefone_cliente_site', 'telefone_cliente_site', '`telefone_cliente_site`', '`telefone_cliente_site`', 200, -1, FALSE, '`telefone_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telefone_cliente_site->Nullable = FALSE; // NOT NULL field
		$this->telefone_cliente_site->Required = TRUE; // Required field
		$this->telefone_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['telefone_cliente_site'] = &$this->telefone_cliente_site;

		// celular_cliente_site
		$this->celular_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_celular_cliente_site', 'celular_cliente_site', '`celular_cliente_site`', '`celular_cliente_site`', 200, -1, FALSE, '`celular_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->celular_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['celular_cliente_site'] = &$this->celular_cliente_site;

		// endereco_cliente_site
		$this->endereco_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_endereco_cliente_site', 'endereco_cliente_site', '`endereco_cliente_site`', '`endereco_cliente_site`', 201, -1, FALSE, '`endereco_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->endereco_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['endereco_cliente_site'] = &$this->endereco_cliente_site;

		// numero_cliente_site
		$this->numero_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_numero_cliente_site', 'numero_cliente_site', '`numero_cliente_site`', '`numero_cliente_site`', 3, -1, FALSE, '`numero_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->numero_cliente_site->Sortable = TRUE; // Allow sort
		$this->numero_cliente_site->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['numero_cliente_site'] = &$this->numero_cliente_site;

		// complemento_cliente_site
		$this->complemento_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_complemento_cliente_site', 'complemento_cliente_site', '`complemento_cliente_site`', '`complemento_cliente_site`', 200, -1, FALSE, '`complemento_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->complemento_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['complemento_cliente_site'] = &$this->complemento_cliente_site;

		// bairro_cliente_site
		$this->bairro_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_bairro_cliente_site', 'bairro_cliente_site', '`bairro_cliente_site`', '`bairro_cliente_site`', 200, -1, FALSE, '`bairro_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bairro_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['bairro_cliente_site'] = &$this->bairro_cliente_site;

		// cidade_cliente_site
		$this->cidade_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_cidade_cliente_site', 'cidade_cliente_site', '`cidade_cliente_site`', '`cidade_cliente_site`', 200, -1, FALSE, '`cidade_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cidade_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['cidade_cliente_site'] = &$this->cidade_cliente_site;

		// estado_id
		$this->estado_id = new DbField('cliente_site', 'cliente_site', 'x_estado_id', 'estado_id', '`estado_id`', '`estado_id`', 3, -1, FALSE, '`estado_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estado_id->Sortable = TRUE; // Allow sort
		$this->estado_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['estado_id'] = &$this->estado_id;

		// cep_cliente_site
		$this->cep_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_cep_cliente_site', 'cep_cliente_site', '`cep_cliente_site`', '`cep_cliente_site`', 200, -1, FALSE, '`cep_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cep_cliente_site->Sortable = TRUE; // Allow sort
		$this->fields['cep_cliente_site'] = &$this->cep_cliente_site;

		// data_atualizacao_cliente_site
		$this->data_atualizacao_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_data_atualizacao_cliente_site', 'data_atualizacao_cliente_site', '`data_atualizacao_cliente_site`', CastDateFieldForLike('`data_atualizacao_cliente_site`', 0, "DB"), 135, 0, FALSE, '`data_atualizacao_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->data_atualizacao_cliente_site->Sortable = TRUE; // Allow sort
		$this->data_atualizacao_cliente_site->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['data_atualizacao_cliente_site'] = &$this->data_atualizacao_cliente_site;

		// usuario_id
		$this->usuario_id = new DbField('cliente_site', 'cliente_site', 'x_usuario_id', 'usuario_id', '`usuario_id`', '`usuario_id`', 3, -1, FALSE, '`usuario_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usuario_id->Sortable = TRUE; // Allow sort
		$this->usuario_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['usuario_id'] = &$this->usuario_id;

		// bool_ativo_cliente_site
		$this->bool_ativo_cliente_site = new DbField('cliente_site', 'cliente_site', 'x_bool_ativo_cliente_site', 'bool_ativo_cliente_site', '`bool_ativo_cliente_site`', '`bool_ativo_cliente_site`', 3, -1, FALSE, '`bool_ativo_cliente_site`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bool_ativo_cliente_site->Nullable = FALSE; // NOT NULL field
		$this->bool_ativo_cliente_site->Required = TRUE; // Required field
		$this->bool_ativo_cliente_site->Sortable = TRUE; // Allow sort
		$this->bool_ativo_cliente_site->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['bool_ativo_cliente_site'] = &$this->bool_ativo_cliente_site;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`cliente_site`";
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
			$this->id_cliente_site->setDbValue($conn->insert_ID());
			$rs['id_cliente_site'] = $this->id_cliente_site->DbValue;
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
			if (array_key_exists('id_cliente_site', $rs))
				AddFilter($where, QuotedName('id_cliente_site', $this->Dbid) . '=' . QuotedValue($rs['id_cliente_site'], $this->id_cliente_site->DataType, $this->Dbid));
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
		$this->id_cliente_site->DbValue = $row['id_cliente_site'];
		$this->nome_cliente_site->DbValue = $row['nome_cliente_site'];
		$this->login_cliente_site->DbValue = $row['login_cliente_site'];
		$this->senha_cliente_site->DbValue = $row['senha_cliente_site'];
		$this->telefone_cliente_site->DbValue = $row['telefone_cliente_site'];
		$this->celular_cliente_site->DbValue = $row['celular_cliente_site'];
		$this->endereco_cliente_site->DbValue = $row['endereco_cliente_site'];
		$this->numero_cliente_site->DbValue = $row['numero_cliente_site'];
		$this->complemento_cliente_site->DbValue = $row['complemento_cliente_site'];
		$this->bairro_cliente_site->DbValue = $row['bairro_cliente_site'];
		$this->cidade_cliente_site->DbValue = $row['cidade_cliente_site'];
		$this->estado_id->DbValue = $row['estado_id'];
		$this->cep_cliente_site->DbValue = $row['cep_cliente_site'];
		$this->data_atualizacao_cliente_site->DbValue = $row['data_atualizacao_cliente_site'];
		$this->usuario_id->DbValue = $row['usuario_id'];
		$this->bool_ativo_cliente_site->DbValue = $row['bool_ativo_cliente_site'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id_cliente_site` = @id_cliente_site@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id_cliente_site', $row) ? $row['id_cliente_site'] : NULL) : $this->id_cliente_site->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_cliente_site@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "cliente_sitelist.php";
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
		if ($pageName == "cliente_siteview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "cliente_siteedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "cliente_siteadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "cliente_sitelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("cliente_siteview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("cliente_siteview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "cliente_siteadd.php?" . $this->getUrlParm($parm);
		else
			$url = "cliente_siteadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("cliente_siteedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("cliente_siteadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("cliente_sitedelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_cliente_site:" . JsonEncode($this->id_cliente_site->CurrentValue, "number");
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
		if ($this->id_cliente_site->CurrentValue != NULL) {
			$url .= "id_cliente_site=" . urlencode($this->id_cliente_site->CurrentValue);
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
			if (Param("id_cliente_site") !== NULL)
				$arKeys[] = Param("id_cliente_site");
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
			$this->id_cliente_site->CurrentValue = $key;
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
		$this->id_cliente_site->setDbValue($rs->fields('id_cliente_site'));
		$this->nome_cliente_site->setDbValue($rs->fields('nome_cliente_site'));
		$this->login_cliente_site->setDbValue($rs->fields('login_cliente_site'));
		$this->senha_cliente_site->setDbValue($rs->fields('senha_cliente_site'));
		$this->telefone_cliente_site->setDbValue($rs->fields('telefone_cliente_site'));
		$this->celular_cliente_site->setDbValue($rs->fields('celular_cliente_site'));
		$this->endereco_cliente_site->setDbValue($rs->fields('endereco_cliente_site'));
		$this->numero_cliente_site->setDbValue($rs->fields('numero_cliente_site'));
		$this->complemento_cliente_site->setDbValue($rs->fields('complemento_cliente_site'));
		$this->bairro_cliente_site->setDbValue($rs->fields('bairro_cliente_site'));
		$this->cidade_cliente_site->setDbValue($rs->fields('cidade_cliente_site'));
		$this->estado_id->setDbValue($rs->fields('estado_id'));
		$this->cep_cliente_site->setDbValue($rs->fields('cep_cliente_site'));
		$this->data_atualizacao_cliente_site->setDbValue($rs->fields('data_atualizacao_cliente_site'));
		$this->usuario_id->setDbValue($rs->fields('usuario_id'));
		$this->bool_ativo_cliente_site->setDbValue($rs->fields('bool_ativo_cliente_site'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// id_cliente_site
		// nome_cliente_site
		// login_cliente_site
		// senha_cliente_site
		// telefone_cliente_site
		// celular_cliente_site
		// endereco_cliente_site
		// numero_cliente_site
		// complemento_cliente_site
		// bairro_cliente_site
		// cidade_cliente_site
		// estado_id
		// cep_cliente_site
		// data_atualizacao_cliente_site
		// usuario_id
		// bool_ativo_cliente_site
		// id_cliente_site

		$this->id_cliente_site->ViewValue = $this->id_cliente_site->CurrentValue;
		$this->id_cliente_site->ViewCustomAttributes = "";

		// nome_cliente_site
		$this->nome_cliente_site->ViewValue = $this->nome_cliente_site->CurrentValue;
		$this->nome_cliente_site->ViewCustomAttributes = "";

		// login_cliente_site
		$this->login_cliente_site->ViewValue = $this->login_cliente_site->CurrentValue;
		$this->login_cliente_site->ViewCustomAttributes = "";

		// senha_cliente_site
		$this->senha_cliente_site->ViewValue = $this->senha_cliente_site->CurrentValue;
		$this->senha_cliente_site->ViewCustomAttributes = "";

		// telefone_cliente_site
		$this->telefone_cliente_site->ViewValue = $this->telefone_cliente_site->CurrentValue;
		$this->telefone_cliente_site->ViewCustomAttributes = "";

		// celular_cliente_site
		$this->celular_cliente_site->ViewValue = $this->celular_cliente_site->CurrentValue;
		$this->celular_cliente_site->ViewCustomAttributes = "";

		// endereco_cliente_site
		$this->endereco_cliente_site->ViewValue = $this->endereco_cliente_site->CurrentValue;
		$this->endereco_cliente_site->ViewCustomAttributes = "";

		// numero_cliente_site
		$this->numero_cliente_site->ViewValue = $this->numero_cliente_site->CurrentValue;
		$this->numero_cliente_site->ViewValue = FormatNumber($this->numero_cliente_site->ViewValue, 0, -2, -2, -2);
		$this->numero_cliente_site->ViewCustomAttributes = "";

		// complemento_cliente_site
		$this->complemento_cliente_site->ViewValue = $this->complemento_cliente_site->CurrentValue;
		$this->complemento_cliente_site->ViewCustomAttributes = "";

		// bairro_cliente_site
		$this->bairro_cliente_site->ViewValue = $this->bairro_cliente_site->CurrentValue;
		$this->bairro_cliente_site->ViewCustomAttributes = "";

		// cidade_cliente_site
		$this->cidade_cliente_site->ViewValue = $this->cidade_cliente_site->CurrentValue;
		$this->cidade_cliente_site->ViewCustomAttributes = "";

		// estado_id
		$this->estado_id->ViewValue = $this->estado_id->CurrentValue;
		$this->estado_id->ViewValue = FormatNumber($this->estado_id->ViewValue, 0, -2, -2, -2);
		$this->estado_id->ViewCustomAttributes = "";

		// cep_cliente_site
		$this->cep_cliente_site->ViewValue = $this->cep_cliente_site->CurrentValue;
		$this->cep_cliente_site->ViewCustomAttributes = "";

		// data_atualizacao_cliente_site
		$this->data_atualizacao_cliente_site->ViewValue = $this->data_atualizacao_cliente_site->CurrentValue;
		$this->data_atualizacao_cliente_site->ViewValue = FormatDateTime($this->data_atualizacao_cliente_site->ViewValue, 0);
		$this->data_atualizacao_cliente_site->ViewCustomAttributes = "";

		// usuario_id
		$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
		$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
		$this->usuario_id->ViewCustomAttributes = "";

		// bool_ativo_cliente_site
		$this->bool_ativo_cliente_site->ViewValue = $this->bool_ativo_cliente_site->CurrentValue;
		$this->bool_ativo_cliente_site->ViewValue = FormatNumber($this->bool_ativo_cliente_site->ViewValue, 0, -2, -2, -2);
		$this->bool_ativo_cliente_site->ViewCustomAttributes = "";

		// id_cliente_site
		$this->id_cliente_site->LinkCustomAttributes = "";
		$this->id_cliente_site->HrefValue = "";
		$this->id_cliente_site->TooltipValue = "";

		// nome_cliente_site
		$this->nome_cliente_site->LinkCustomAttributes = "";
		$this->nome_cliente_site->HrefValue = "";
		$this->nome_cliente_site->TooltipValue = "";

		// login_cliente_site
		$this->login_cliente_site->LinkCustomAttributes = "";
		$this->login_cliente_site->HrefValue = "";
		$this->login_cliente_site->TooltipValue = "";

		// senha_cliente_site
		$this->senha_cliente_site->LinkCustomAttributes = "";
		$this->senha_cliente_site->HrefValue = "";
		$this->senha_cliente_site->TooltipValue = "";

		// telefone_cliente_site
		$this->telefone_cliente_site->LinkCustomAttributes = "";
		$this->telefone_cliente_site->HrefValue = "";
		$this->telefone_cliente_site->TooltipValue = "";

		// celular_cliente_site
		$this->celular_cliente_site->LinkCustomAttributes = "";
		$this->celular_cliente_site->HrefValue = "";
		$this->celular_cliente_site->TooltipValue = "";

		// endereco_cliente_site
		$this->endereco_cliente_site->LinkCustomAttributes = "";
		$this->endereco_cliente_site->HrefValue = "";
		$this->endereco_cliente_site->TooltipValue = "";

		// numero_cliente_site
		$this->numero_cliente_site->LinkCustomAttributes = "";
		$this->numero_cliente_site->HrefValue = "";
		$this->numero_cliente_site->TooltipValue = "";

		// complemento_cliente_site
		$this->complemento_cliente_site->LinkCustomAttributes = "";
		$this->complemento_cliente_site->HrefValue = "";
		$this->complemento_cliente_site->TooltipValue = "";

		// bairro_cliente_site
		$this->bairro_cliente_site->LinkCustomAttributes = "";
		$this->bairro_cliente_site->HrefValue = "";
		$this->bairro_cliente_site->TooltipValue = "";

		// cidade_cliente_site
		$this->cidade_cliente_site->LinkCustomAttributes = "";
		$this->cidade_cliente_site->HrefValue = "";
		$this->cidade_cliente_site->TooltipValue = "";

		// estado_id
		$this->estado_id->LinkCustomAttributes = "";
		$this->estado_id->HrefValue = "";
		$this->estado_id->TooltipValue = "";

		// cep_cliente_site
		$this->cep_cliente_site->LinkCustomAttributes = "";
		$this->cep_cliente_site->HrefValue = "";
		$this->cep_cliente_site->TooltipValue = "";

		// data_atualizacao_cliente_site
		$this->data_atualizacao_cliente_site->LinkCustomAttributes = "";
		$this->data_atualizacao_cliente_site->HrefValue = "";
		$this->data_atualizacao_cliente_site->TooltipValue = "";

		// usuario_id
		$this->usuario_id->LinkCustomAttributes = "";
		$this->usuario_id->HrefValue = "";
		$this->usuario_id->TooltipValue = "";

		// bool_ativo_cliente_site
		$this->bool_ativo_cliente_site->LinkCustomAttributes = "";
		$this->bool_ativo_cliente_site->HrefValue = "";
		$this->bool_ativo_cliente_site->TooltipValue = "";

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

		// id_cliente_site
		$this->id_cliente_site->EditAttrs["class"] = "form-control";
		$this->id_cliente_site->EditCustomAttributes = "";
		$this->id_cliente_site->EditValue = $this->id_cliente_site->CurrentValue;
		$this->id_cliente_site->ViewCustomAttributes = "";

		// nome_cliente_site
		$this->nome_cliente_site->EditAttrs["class"] = "form-control";
		$this->nome_cliente_site->EditCustomAttributes = "";
		$this->nome_cliente_site->EditValue = $this->nome_cliente_site->CurrentValue;
		$this->nome_cliente_site->PlaceHolder = RemoveHtml($this->nome_cliente_site->caption());

		// login_cliente_site
		$this->login_cliente_site->EditAttrs["class"] = "form-control";
		$this->login_cliente_site->EditCustomAttributes = "";
		$this->login_cliente_site->EditValue = $this->login_cliente_site->CurrentValue;
		$this->login_cliente_site->PlaceHolder = RemoveHtml($this->login_cliente_site->caption());

		// senha_cliente_site
		$this->senha_cliente_site->EditAttrs["class"] = "form-control";
		$this->senha_cliente_site->EditCustomAttributes = "";
		$this->senha_cliente_site->EditValue = $this->senha_cliente_site->CurrentValue;
		$this->senha_cliente_site->PlaceHolder = RemoveHtml($this->senha_cliente_site->caption());

		// telefone_cliente_site
		$this->telefone_cliente_site->EditAttrs["class"] = "form-control";
		$this->telefone_cliente_site->EditCustomAttributes = "";
		$this->telefone_cliente_site->EditValue = $this->telefone_cliente_site->CurrentValue;
		$this->telefone_cliente_site->PlaceHolder = RemoveHtml($this->telefone_cliente_site->caption());

		// celular_cliente_site
		$this->celular_cliente_site->EditAttrs["class"] = "form-control";
		$this->celular_cliente_site->EditCustomAttributes = "";
		$this->celular_cliente_site->EditValue = $this->celular_cliente_site->CurrentValue;
		$this->celular_cliente_site->PlaceHolder = RemoveHtml($this->celular_cliente_site->caption());

		// endereco_cliente_site
		$this->endereco_cliente_site->EditAttrs["class"] = "form-control";
		$this->endereco_cliente_site->EditCustomAttributes = "";
		$this->endereco_cliente_site->EditValue = $this->endereco_cliente_site->CurrentValue;
		$this->endereco_cliente_site->PlaceHolder = RemoveHtml($this->endereco_cliente_site->caption());

		// numero_cliente_site
		$this->numero_cliente_site->EditAttrs["class"] = "form-control";
		$this->numero_cliente_site->EditCustomAttributes = "";
		$this->numero_cliente_site->EditValue = $this->numero_cliente_site->CurrentValue;
		$this->numero_cliente_site->PlaceHolder = RemoveHtml($this->numero_cliente_site->caption());

		// complemento_cliente_site
		$this->complemento_cliente_site->EditAttrs["class"] = "form-control";
		$this->complemento_cliente_site->EditCustomAttributes = "";
		$this->complemento_cliente_site->EditValue = $this->complemento_cliente_site->CurrentValue;
		$this->complemento_cliente_site->PlaceHolder = RemoveHtml($this->complemento_cliente_site->caption());

		// bairro_cliente_site
		$this->bairro_cliente_site->EditAttrs["class"] = "form-control";
		$this->bairro_cliente_site->EditCustomAttributes = "";
		$this->bairro_cliente_site->EditValue = $this->bairro_cliente_site->CurrentValue;
		$this->bairro_cliente_site->PlaceHolder = RemoveHtml($this->bairro_cliente_site->caption());

		// cidade_cliente_site
		$this->cidade_cliente_site->EditAttrs["class"] = "form-control";
		$this->cidade_cliente_site->EditCustomAttributes = "";
		$this->cidade_cliente_site->EditValue = $this->cidade_cliente_site->CurrentValue;
		$this->cidade_cliente_site->PlaceHolder = RemoveHtml($this->cidade_cliente_site->caption());

		// estado_id
		$this->estado_id->EditAttrs["class"] = "form-control";
		$this->estado_id->EditCustomAttributes = "";
		$this->estado_id->EditValue = $this->estado_id->CurrentValue;
		$this->estado_id->PlaceHolder = RemoveHtml($this->estado_id->caption());

		// cep_cliente_site
		$this->cep_cliente_site->EditAttrs["class"] = "form-control";
		$this->cep_cliente_site->EditCustomAttributes = "";
		$this->cep_cliente_site->EditValue = $this->cep_cliente_site->CurrentValue;
		$this->cep_cliente_site->PlaceHolder = RemoveHtml($this->cep_cliente_site->caption());

		// data_atualizacao_cliente_site
		$this->data_atualizacao_cliente_site->EditAttrs["class"] = "form-control";
		$this->data_atualizacao_cliente_site->EditCustomAttributes = "";
		$this->data_atualizacao_cliente_site->EditValue = FormatDateTime($this->data_atualizacao_cliente_site->CurrentValue, 8);
		$this->data_atualizacao_cliente_site->PlaceHolder = RemoveHtml($this->data_atualizacao_cliente_site->caption());

		// usuario_id
		$this->usuario_id->EditAttrs["class"] = "form-control";
		$this->usuario_id->EditCustomAttributes = "";
		$this->usuario_id->EditValue = $this->usuario_id->CurrentValue;
		$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

		// bool_ativo_cliente_site
		$this->bool_ativo_cliente_site->EditAttrs["class"] = "form-control";
		$this->bool_ativo_cliente_site->EditCustomAttributes = "";
		$this->bool_ativo_cliente_site->EditValue = $this->bool_ativo_cliente_site->CurrentValue;
		$this->bool_ativo_cliente_site->PlaceHolder = RemoveHtml($this->bool_ativo_cliente_site->caption());

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
					if ($this->id_cliente_site->Exportable)
						$doc->exportCaption($this->id_cliente_site);
					if ($this->nome_cliente_site->Exportable)
						$doc->exportCaption($this->nome_cliente_site);
					if ($this->login_cliente_site->Exportable)
						$doc->exportCaption($this->login_cliente_site);
					if ($this->senha_cliente_site->Exportable)
						$doc->exportCaption($this->senha_cliente_site);
					if ($this->telefone_cliente_site->Exportable)
						$doc->exportCaption($this->telefone_cliente_site);
					if ($this->celular_cliente_site->Exportable)
						$doc->exportCaption($this->celular_cliente_site);
					if ($this->endereco_cliente_site->Exportable)
						$doc->exportCaption($this->endereco_cliente_site);
					if ($this->numero_cliente_site->Exportable)
						$doc->exportCaption($this->numero_cliente_site);
					if ($this->complemento_cliente_site->Exportable)
						$doc->exportCaption($this->complemento_cliente_site);
					if ($this->bairro_cliente_site->Exportable)
						$doc->exportCaption($this->bairro_cliente_site);
					if ($this->cidade_cliente_site->Exportable)
						$doc->exportCaption($this->cidade_cliente_site);
					if ($this->estado_id->Exportable)
						$doc->exportCaption($this->estado_id);
					if ($this->cep_cliente_site->Exportable)
						$doc->exportCaption($this->cep_cliente_site);
					if ($this->data_atualizacao_cliente_site->Exportable)
						$doc->exportCaption($this->data_atualizacao_cliente_site);
					if ($this->usuario_id->Exportable)
						$doc->exportCaption($this->usuario_id);
					if ($this->bool_ativo_cliente_site->Exportable)
						$doc->exportCaption($this->bool_ativo_cliente_site);
				} else {
					if ($this->id_cliente_site->Exportable)
						$doc->exportCaption($this->id_cliente_site);
					if ($this->nome_cliente_site->Exportable)
						$doc->exportCaption($this->nome_cliente_site);
					if ($this->login_cliente_site->Exportable)
						$doc->exportCaption($this->login_cliente_site);
					if ($this->senha_cliente_site->Exportable)
						$doc->exportCaption($this->senha_cliente_site);
					if ($this->telefone_cliente_site->Exportable)
						$doc->exportCaption($this->telefone_cliente_site);
					if ($this->celular_cliente_site->Exportable)
						$doc->exportCaption($this->celular_cliente_site);
					if ($this->numero_cliente_site->Exportable)
						$doc->exportCaption($this->numero_cliente_site);
					if ($this->complemento_cliente_site->Exportable)
						$doc->exportCaption($this->complemento_cliente_site);
					if ($this->bairro_cliente_site->Exportable)
						$doc->exportCaption($this->bairro_cliente_site);
					if ($this->cidade_cliente_site->Exportable)
						$doc->exportCaption($this->cidade_cliente_site);
					if ($this->estado_id->Exportable)
						$doc->exportCaption($this->estado_id);
					if ($this->cep_cliente_site->Exportable)
						$doc->exportCaption($this->cep_cliente_site);
					if ($this->data_atualizacao_cliente_site->Exportable)
						$doc->exportCaption($this->data_atualizacao_cliente_site);
					if ($this->usuario_id->Exportable)
						$doc->exportCaption($this->usuario_id);
					if ($this->bool_ativo_cliente_site->Exportable)
						$doc->exportCaption($this->bool_ativo_cliente_site);
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
						if ($this->id_cliente_site->Exportable)
							$doc->exportField($this->id_cliente_site);
						if ($this->nome_cliente_site->Exportable)
							$doc->exportField($this->nome_cliente_site);
						if ($this->login_cliente_site->Exportable)
							$doc->exportField($this->login_cliente_site);
						if ($this->senha_cliente_site->Exportable)
							$doc->exportField($this->senha_cliente_site);
						if ($this->telefone_cliente_site->Exportable)
							$doc->exportField($this->telefone_cliente_site);
						if ($this->celular_cliente_site->Exportable)
							$doc->exportField($this->celular_cliente_site);
						if ($this->endereco_cliente_site->Exportable)
							$doc->exportField($this->endereco_cliente_site);
						if ($this->numero_cliente_site->Exportable)
							$doc->exportField($this->numero_cliente_site);
						if ($this->complemento_cliente_site->Exportable)
							$doc->exportField($this->complemento_cliente_site);
						if ($this->bairro_cliente_site->Exportable)
							$doc->exportField($this->bairro_cliente_site);
						if ($this->cidade_cliente_site->Exportable)
							$doc->exportField($this->cidade_cliente_site);
						if ($this->estado_id->Exportable)
							$doc->exportField($this->estado_id);
						if ($this->cep_cliente_site->Exportable)
							$doc->exportField($this->cep_cliente_site);
						if ($this->data_atualizacao_cliente_site->Exportable)
							$doc->exportField($this->data_atualizacao_cliente_site);
						if ($this->usuario_id->Exportable)
							$doc->exportField($this->usuario_id);
						if ($this->bool_ativo_cliente_site->Exportable)
							$doc->exportField($this->bool_ativo_cliente_site);
					} else {
						if ($this->id_cliente_site->Exportable)
							$doc->exportField($this->id_cliente_site);
						if ($this->nome_cliente_site->Exportable)
							$doc->exportField($this->nome_cliente_site);
						if ($this->login_cliente_site->Exportable)
							$doc->exportField($this->login_cliente_site);
						if ($this->senha_cliente_site->Exportable)
							$doc->exportField($this->senha_cliente_site);
						if ($this->telefone_cliente_site->Exportable)
							$doc->exportField($this->telefone_cliente_site);
						if ($this->celular_cliente_site->Exportable)
							$doc->exportField($this->celular_cliente_site);
						if ($this->numero_cliente_site->Exportable)
							$doc->exportField($this->numero_cliente_site);
						if ($this->complemento_cliente_site->Exportable)
							$doc->exportField($this->complemento_cliente_site);
						if ($this->bairro_cliente_site->Exportable)
							$doc->exportField($this->bairro_cliente_site);
						if ($this->cidade_cliente_site->Exportable)
							$doc->exportField($this->cidade_cliente_site);
						if ($this->estado_id->Exportable)
							$doc->exportField($this->estado_id);
						if ($this->cep_cliente_site->Exportable)
							$doc->exportField($this->cep_cliente_site);
						if ($this->data_atualizacao_cliente_site->Exportable)
							$doc->exportField($this->data_atualizacao_cliente_site);
						if ($this->usuario_id->Exportable)
							$doc->exportField($this->usuario_id);
						if ($this->bool_ativo_cliente_site->Exportable)
							$doc->exportField($this->bool_ativo_cliente_site);
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
