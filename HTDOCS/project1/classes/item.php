<?php
namespace PHPMaker2019\project1;

/**
 * Table class for item
 */
class item extends DbTable
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
	public $id_item;
	public $titulo_item;
	public $descricao_resumida_item;
	public $descricao_site_item;
	public $imagem_item;
	public $endereco_item;
	public $numero_item;
	public $bairro_item;
	public $cidade_item;
	public $estado_id;
	public $situacao_id;
	public $grupo_id;
	public $usuario_id;
	public $bool_ativo_item;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'item';
		$this->TableName = 'item';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`item`";
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

		// id_item
		$this->id_item = new DbField('item', 'item', 'x_id_item', 'id_item', '`id_item`', '`id_item`', 3, -1, FALSE, '`id_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_item->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_item->IsPrimaryKey = TRUE; // Primary key field
		$this->id_item->Sortable = TRUE; // Allow sort
		$this->id_item->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['id_item'] = &$this->id_item;

		// titulo_item
		$this->titulo_item = new DbField('item', 'item', 'x_titulo_item', 'titulo_item', '`titulo_item`', '`titulo_item`', 201, -1, FALSE, '`titulo_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->titulo_item->Nullable = FALSE; // NOT NULL field
		$this->titulo_item->Sortable = TRUE; // Allow sort
		$this->fields['titulo_item'] = &$this->titulo_item;

		// descricao_resumida_item
		$this->descricao_resumida_item = new DbField('item', 'item', 'x_descricao_resumida_item', 'descricao_resumida_item', '`descricao_resumida_item`', '`descricao_resumida_item`', 201, -1, FALSE, '`descricao_resumida_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->descricao_resumida_item->Sortable = TRUE; // Allow sort
		$this->fields['descricao_resumida_item'] = &$this->descricao_resumida_item;

		// descricao_site_item
		$this->descricao_site_item = new DbField('item', 'item', 'x_descricao_site_item', 'descricao_site_item', '`descricao_site_item`', '`descricao_site_item`', 201, -1, FALSE, '`descricao_site_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->descricao_site_item->Sortable = TRUE; // Allow sort
		$this->fields['descricao_site_item'] = &$this->descricao_site_item;

		// imagem_item
		$this->imagem_item = new DbField('item', 'item', 'x_imagem_item', 'imagem_item', '`imagem_item`', '`imagem_item`', 200, -1, FALSE, '`imagem_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->imagem_item->Nullable = FALSE; // NOT NULL field
		$this->imagem_item->Required = TRUE; // Required field
		$this->imagem_item->Sortable = TRUE; // Allow sort
		$this->fields['imagem_item'] = &$this->imagem_item;

		// endereco_item
		$this->endereco_item = new DbField('item', 'item', 'x_endereco_item', 'endereco_item', '`endereco_item`', '`endereco_item`', 201, -1, FALSE, '`endereco_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->endereco_item->Sortable = TRUE; // Allow sort
		$this->fields['endereco_item'] = &$this->endereco_item;

		// numero_item
		$this->numero_item = new DbField('item', 'item', 'x_numero_item', 'numero_item', '`numero_item`', '`numero_item`', 3, -1, FALSE, '`numero_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->numero_item->Nullable = FALSE; // NOT NULL field
		$this->numero_item->Required = TRUE; // Required field
		$this->numero_item->Sortable = TRUE; // Allow sort
		$this->numero_item->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['numero_item'] = &$this->numero_item;

		// bairro_item
		$this->bairro_item = new DbField('item', 'item', 'x_bairro_item', 'bairro_item', '`bairro_item`', '`bairro_item`', 200, -1, FALSE, '`bairro_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bairro_item->Sortable = TRUE; // Allow sort
		$this->fields['bairro_item'] = &$this->bairro_item;

		// cidade_item
		$this->cidade_item = new DbField('item', 'item', 'x_cidade_item', 'cidade_item', '`cidade_item`', '`cidade_item`', 200, -1, FALSE, '`cidade_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cidade_item->Sortable = TRUE; // Allow sort
		$this->fields['cidade_item'] = &$this->cidade_item;

		// estado_id
		$this->estado_id = new DbField('item', 'item', 'x_estado_id', 'estado_id', '`estado_id`', '`estado_id`', 3, -1, FALSE, '`estado_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->estado_id->Sortable = TRUE; // Allow sort
		$this->estado_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['estado_id'] = &$this->estado_id;

		// situacao_id
		$this->situacao_id = new DbField('item', 'item', 'x_situacao_id', 'situacao_id', '`situacao_id`', '`situacao_id`', 3, -1, FALSE, '`situacao_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->situacao_id->Nullable = FALSE; // NOT NULL field
		$this->situacao_id->Required = TRUE; // Required field
		$this->situacao_id->Sortable = TRUE; // Allow sort
		$this->situacao_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['situacao_id'] = &$this->situacao_id;

		// grupo_id
		$this->grupo_id = new DbField('item', 'item', 'x_grupo_id', 'grupo_id', '`grupo_id`', '`grupo_id`', 3, -1, FALSE, '`grupo_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grupo_id->Sortable = TRUE; // Allow sort
		$this->grupo_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['grupo_id'] = &$this->grupo_id;

		// usuario_id
		$this->usuario_id = new DbField('item', 'item', 'x_usuario_id', 'usuario_id', '`usuario_id`', '`usuario_id`', 3, -1, FALSE, '`usuario_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usuario_id->Nullable = FALSE; // NOT NULL field
		$this->usuario_id->Required = TRUE; // Required field
		$this->usuario_id->Sortable = TRUE; // Allow sort
		$this->usuario_id->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['usuario_id'] = &$this->usuario_id;

		// bool_ativo_item
		$this->bool_ativo_item = new DbField('item', 'item', 'x_bool_ativo_item', 'bool_ativo_item', '`bool_ativo_item`', '`bool_ativo_item`', 3, -1, FALSE, '`bool_ativo_item`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bool_ativo_item->Nullable = FALSE; // NOT NULL field
		$this->bool_ativo_item->Required = TRUE; // Required field
		$this->bool_ativo_item->Sortable = TRUE; // Allow sort
		$this->bool_ativo_item->DefaultErrorMessage = $Language->Phrase("IncorrectInteger");
		$this->fields['bool_ativo_item'] = &$this->bool_ativo_item;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`item`";
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
			$this->id_item->setDbValue($conn->insert_ID());
			$rs['id_item'] = $this->id_item->DbValue;
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
			if (array_key_exists('id_item', $rs))
				AddFilter($where, QuotedName('id_item', $this->Dbid) . '=' . QuotedValue($rs['id_item'], $this->id_item->DataType, $this->Dbid));
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
		$this->id_item->DbValue = $row['id_item'];
		$this->titulo_item->DbValue = $row['titulo_item'];
		$this->descricao_resumida_item->DbValue = $row['descricao_resumida_item'];
		$this->descricao_site_item->DbValue = $row['descricao_site_item'];
		$this->imagem_item->DbValue = $row['imagem_item'];
		$this->endereco_item->DbValue = $row['endereco_item'];
		$this->numero_item->DbValue = $row['numero_item'];
		$this->bairro_item->DbValue = $row['bairro_item'];
		$this->cidade_item->DbValue = $row['cidade_item'];
		$this->estado_id->DbValue = $row['estado_id'];
		$this->situacao_id->DbValue = $row['situacao_id'];
		$this->grupo_id->DbValue = $row['grupo_id'];
		$this->usuario_id->DbValue = $row['usuario_id'];
		$this->bool_ativo_item->DbValue = $row['bool_ativo_item'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id_item` = @id_item@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id_item', $row) ? $row['id_item'] : NULL) : $this->id_item->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_item@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "itemlist.php";
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
		if ($pageName == "itemview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "itemedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "itemadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "itemlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("itemview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("itemview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "itemadd.php?" . $this->getUrlParm($parm);
		else
			$url = "itemadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("itemedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("itemadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("itemdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_item:" . JsonEncode($this->id_item->CurrentValue, "number");
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
		if ($this->id_item->CurrentValue != NULL) {
			$url .= "id_item=" . urlencode($this->id_item->CurrentValue);
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
			if (Param("id_item") !== NULL)
				$arKeys[] = Param("id_item");
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
			$this->id_item->CurrentValue = $key;
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
		$this->id_item->setDbValue($rs->fields('id_item'));
		$this->titulo_item->setDbValue($rs->fields('titulo_item'));
		$this->descricao_resumida_item->setDbValue($rs->fields('descricao_resumida_item'));
		$this->descricao_site_item->setDbValue($rs->fields('descricao_site_item'));
		$this->imagem_item->setDbValue($rs->fields('imagem_item'));
		$this->endereco_item->setDbValue($rs->fields('endereco_item'));
		$this->numero_item->setDbValue($rs->fields('numero_item'));
		$this->bairro_item->setDbValue($rs->fields('bairro_item'));
		$this->cidade_item->setDbValue($rs->fields('cidade_item'));
		$this->estado_id->setDbValue($rs->fields('estado_id'));
		$this->situacao_id->setDbValue($rs->fields('situacao_id'));
		$this->grupo_id->setDbValue($rs->fields('grupo_id'));
		$this->usuario_id->setDbValue($rs->fields('usuario_id'));
		$this->bool_ativo_item->setDbValue($rs->fields('bool_ativo_item'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// id_item
		// titulo_item
		// descricao_resumida_item
		// descricao_site_item
		// imagem_item
		// endereco_item
		// numero_item
		// bairro_item
		// cidade_item
		// estado_id
		// situacao_id
		// grupo_id
		// usuario_id
		// bool_ativo_item
		// id_item

		$this->id_item->ViewValue = $this->id_item->CurrentValue;
		$this->id_item->ViewCustomAttributes = "";

		// titulo_item
		$this->titulo_item->ViewValue = $this->titulo_item->CurrentValue;
		$this->titulo_item->ViewCustomAttributes = "";

		// descricao_resumida_item
		$this->descricao_resumida_item->ViewValue = $this->descricao_resumida_item->CurrentValue;
		$this->descricao_resumida_item->ViewCustomAttributes = "";

		// descricao_site_item
		$this->descricao_site_item->ViewValue = $this->descricao_site_item->CurrentValue;
		$this->descricao_site_item->ViewCustomAttributes = "";

		// imagem_item
		$this->imagem_item->ViewValue = $this->imagem_item->CurrentValue;
		$this->imagem_item->ViewCustomAttributes = "";

		// endereco_item
		$this->endereco_item->ViewValue = $this->endereco_item->CurrentValue;
		$this->endereco_item->ViewCustomAttributes = "";

		// numero_item
		$this->numero_item->ViewValue = $this->numero_item->CurrentValue;
		$this->numero_item->ViewValue = FormatNumber($this->numero_item->ViewValue, 0, -2, -2, -2);
		$this->numero_item->ViewCustomAttributes = "";

		// bairro_item
		$this->bairro_item->ViewValue = $this->bairro_item->CurrentValue;
		$this->bairro_item->ViewCustomAttributes = "";

		// cidade_item
		$this->cidade_item->ViewValue = $this->cidade_item->CurrentValue;
		$this->cidade_item->ViewCustomAttributes = "";

		// estado_id
		$this->estado_id->ViewValue = $this->estado_id->CurrentValue;
		$this->estado_id->ViewValue = FormatNumber($this->estado_id->ViewValue, 0, -2, -2, -2);
		$this->estado_id->ViewCustomAttributes = "";

		// situacao_id
		$this->situacao_id->ViewValue = $this->situacao_id->CurrentValue;
		$this->situacao_id->ViewValue = FormatNumber($this->situacao_id->ViewValue, 0, -2, -2, -2);
		$this->situacao_id->ViewCustomAttributes = "";

		// grupo_id
		$this->grupo_id->ViewValue = $this->grupo_id->CurrentValue;
		$this->grupo_id->ViewValue = FormatNumber($this->grupo_id->ViewValue, 0, -2, -2, -2);
		$this->grupo_id->ViewCustomAttributes = "";

		// usuario_id
		$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
		$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
		$this->usuario_id->ViewCustomAttributes = "";

		// bool_ativo_item
		$this->bool_ativo_item->ViewValue = $this->bool_ativo_item->CurrentValue;
		$this->bool_ativo_item->ViewValue = FormatNumber($this->bool_ativo_item->ViewValue, 0, -2, -2, -2);
		$this->bool_ativo_item->ViewCustomAttributes = "";

		// id_item
		$this->id_item->LinkCustomAttributes = "";
		$this->id_item->HrefValue = "";
		$this->id_item->TooltipValue = "";

		// titulo_item
		$this->titulo_item->LinkCustomAttributes = "";
		$this->titulo_item->HrefValue = "";
		$this->titulo_item->TooltipValue = "";

		// descricao_resumida_item
		$this->descricao_resumida_item->LinkCustomAttributes = "";
		$this->descricao_resumida_item->HrefValue = "";
		$this->descricao_resumida_item->TooltipValue = "";

		// descricao_site_item
		$this->descricao_site_item->LinkCustomAttributes = "";
		$this->descricao_site_item->HrefValue = "";
		$this->descricao_site_item->TooltipValue = "";

		// imagem_item
		$this->imagem_item->LinkCustomAttributes = "";
		$this->imagem_item->HrefValue = "";
		$this->imagem_item->TooltipValue = "";

		// endereco_item
		$this->endereco_item->LinkCustomAttributes = "";
		$this->endereco_item->HrefValue = "";
		$this->endereco_item->TooltipValue = "";

		// numero_item
		$this->numero_item->LinkCustomAttributes = "";
		$this->numero_item->HrefValue = "";
		$this->numero_item->TooltipValue = "";

		// bairro_item
		$this->bairro_item->LinkCustomAttributes = "";
		$this->bairro_item->HrefValue = "";
		$this->bairro_item->TooltipValue = "";

		// cidade_item
		$this->cidade_item->LinkCustomAttributes = "";
		$this->cidade_item->HrefValue = "";
		$this->cidade_item->TooltipValue = "";

		// estado_id
		$this->estado_id->LinkCustomAttributes = "";
		$this->estado_id->HrefValue = "";
		$this->estado_id->TooltipValue = "";

		// situacao_id
		$this->situacao_id->LinkCustomAttributes = "";
		$this->situacao_id->HrefValue = "";
		$this->situacao_id->TooltipValue = "";

		// grupo_id
		$this->grupo_id->LinkCustomAttributes = "";
		$this->grupo_id->HrefValue = "";
		$this->grupo_id->TooltipValue = "";

		// usuario_id
		$this->usuario_id->LinkCustomAttributes = "";
		$this->usuario_id->HrefValue = "";
		$this->usuario_id->TooltipValue = "";

		// bool_ativo_item
		$this->bool_ativo_item->LinkCustomAttributes = "";
		$this->bool_ativo_item->HrefValue = "";
		$this->bool_ativo_item->TooltipValue = "";

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

		// id_item
		$this->id_item->EditAttrs["class"] = "form-control";
		$this->id_item->EditCustomAttributes = "";
		$this->id_item->EditValue = $this->id_item->CurrentValue;
		$this->id_item->ViewCustomAttributes = "";

		// titulo_item
		$this->titulo_item->EditAttrs["class"] = "form-control";
		$this->titulo_item->EditCustomAttributes = "";
		$this->titulo_item->EditValue = $this->titulo_item->CurrentValue;
		$this->titulo_item->PlaceHolder = RemoveHtml($this->titulo_item->caption());

		// descricao_resumida_item
		$this->descricao_resumida_item->EditAttrs["class"] = "form-control";
		$this->descricao_resumida_item->EditCustomAttributes = "";
		$this->descricao_resumida_item->EditValue = $this->descricao_resumida_item->CurrentValue;
		$this->descricao_resumida_item->PlaceHolder = RemoveHtml($this->descricao_resumida_item->caption());

		// descricao_site_item
		$this->descricao_site_item->EditAttrs["class"] = "form-control";
		$this->descricao_site_item->EditCustomAttributes = "";
		$this->descricao_site_item->EditValue = $this->descricao_site_item->CurrentValue;
		$this->descricao_site_item->PlaceHolder = RemoveHtml($this->descricao_site_item->caption());

		// imagem_item
		$this->imagem_item->EditAttrs["class"] = "form-control";
		$this->imagem_item->EditCustomAttributes = "";
		$this->imagem_item->EditValue = $this->imagem_item->CurrentValue;
		$this->imagem_item->PlaceHolder = RemoveHtml($this->imagem_item->caption());

		// endereco_item
		$this->endereco_item->EditAttrs["class"] = "form-control";
		$this->endereco_item->EditCustomAttributes = "";
		$this->endereco_item->EditValue = $this->endereco_item->CurrentValue;
		$this->endereco_item->PlaceHolder = RemoveHtml($this->endereco_item->caption());

		// numero_item
		$this->numero_item->EditAttrs["class"] = "form-control";
		$this->numero_item->EditCustomAttributes = "";
		$this->numero_item->EditValue = $this->numero_item->CurrentValue;
		$this->numero_item->PlaceHolder = RemoveHtml($this->numero_item->caption());

		// bairro_item
		$this->bairro_item->EditAttrs["class"] = "form-control";
		$this->bairro_item->EditCustomAttributes = "";
		$this->bairro_item->EditValue = $this->bairro_item->CurrentValue;
		$this->bairro_item->PlaceHolder = RemoveHtml($this->bairro_item->caption());

		// cidade_item
		$this->cidade_item->EditAttrs["class"] = "form-control";
		$this->cidade_item->EditCustomAttributes = "";
		$this->cidade_item->EditValue = $this->cidade_item->CurrentValue;
		$this->cidade_item->PlaceHolder = RemoveHtml($this->cidade_item->caption());

		// estado_id
		$this->estado_id->EditAttrs["class"] = "form-control";
		$this->estado_id->EditCustomAttributes = "";
		$this->estado_id->EditValue = $this->estado_id->CurrentValue;
		$this->estado_id->PlaceHolder = RemoveHtml($this->estado_id->caption());

		// situacao_id
		$this->situacao_id->EditAttrs["class"] = "form-control";
		$this->situacao_id->EditCustomAttributes = "";
		$this->situacao_id->EditValue = $this->situacao_id->CurrentValue;
		$this->situacao_id->PlaceHolder = RemoveHtml($this->situacao_id->caption());

		// grupo_id
		$this->grupo_id->EditAttrs["class"] = "form-control";
		$this->grupo_id->EditCustomAttributes = "";
		$this->grupo_id->EditValue = $this->grupo_id->CurrentValue;
		$this->grupo_id->PlaceHolder = RemoveHtml($this->grupo_id->caption());

		// usuario_id
		$this->usuario_id->EditAttrs["class"] = "form-control";
		$this->usuario_id->EditCustomAttributes = "";
		$this->usuario_id->EditValue = $this->usuario_id->CurrentValue;
		$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

		// bool_ativo_item
		$this->bool_ativo_item->EditAttrs["class"] = "form-control";
		$this->bool_ativo_item->EditCustomAttributes = "";
		$this->bool_ativo_item->EditValue = $this->bool_ativo_item->CurrentValue;
		$this->bool_ativo_item->PlaceHolder = RemoveHtml($this->bool_ativo_item->caption());

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
					if ($this->id_item->Exportable)
						$doc->exportCaption($this->id_item);
					if ($this->titulo_item->Exportable)
						$doc->exportCaption($this->titulo_item);
					if ($this->descricao_resumida_item->Exportable)
						$doc->exportCaption($this->descricao_resumida_item);
					if ($this->descricao_site_item->Exportable)
						$doc->exportCaption($this->descricao_site_item);
					if ($this->imagem_item->Exportable)
						$doc->exportCaption($this->imagem_item);
					if ($this->endereco_item->Exportable)
						$doc->exportCaption($this->endereco_item);
					if ($this->numero_item->Exportable)
						$doc->exportCaption($this->numero_item);
					if ($this->bairro_item->Exportable)
						$doc->exportCaption($this->bairro_item);
					if ($this->cidade_item->Exportable)
						$doc->exportCaption($this->cidade_item);
					if ($this->estado_id->Exportable)
						$doc->exportCaption($this->estado_id);
					if ($this->situacao_id->Exportable)
						$doc->exportCaption($this->situacao_id);
					if ($this->grupo_id->Exportable)
						$doc->exportCaption($this->grupo_id);
					if ($this->usuario_id->Exportable)
						$doc->exportCaption($this->usuario_id);
					if ($this->bool_ativo_item->Exportable)
						$doc->exportCaption($this->bool_ativo_item);
				} else {
					if ($this->id_item->Exportable)
						$doc->exportCaption($this->id_item);
					if ($this->imagem_item->Exportable)
						$doc->exportCaption($this->imagem_item);
					if ($this->numero_item->Exportable)
						$doc->exportCaption($this->numero_item);
					if ($this->bairro_item->Exportable)
						$doc->exportCaption($this->bairro_item);
					if ($this->cidade_item->Exportable)
						$doc->exportCaption($this->cidade_item);
					if ($this->estado_id->Exportable)
						$doc->exportCaption($this->estado_id);
					if ($this->situacao_id->Exportable)
						$doc->exportCaption($this->situacao_id);
					if ($this->grupo_id->Exportable)
						$doc->exportCaption($this->grupo_id);
					if ($this->usuario_id->Exportable)
						$doc->exportCaption($this->usuario_id);
					if ($this->bool_ativo_item->Exportable)
						$doc->exportCaption($this->bool_ativo_item);
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
						if ($this->id_item->Exportable)
							$doc->exportField($this->id_item);
						if ($this->titulo_item->Exportable)
							$doc->exportField($this->titulo_item);
						if ($this->descricao_resumida_item->Exportable)
							$doc->exportField($this->descricao_resumida_item);
						if ($this->descricao_site_item->Exportable)
							$doc->exportField($this->descricao_site_item);
						if ($this->imagem_item->Exportable)
							$doc->exportField($this->imagem_item);
						if ($this->endereco_item->Exportable)
							$doc->exportField($this->endereco_item);
						if ($this->numero_item->Exportable)
							$doc->exportField($this->numero_item);
						if ($this->bairro_item->Exportable)
							$doc->exportField($this->bairro_item);
						if ($this->cidade_item->Exportable)
							$doc->exportField($this->cidade_item);
						if ($this->estado_id->Exportable)
							$doc->exportField($this->estado_id);
						if ($this->situacao_id->Exportable)
							$doc->exportField($this->situacao_id);
						if ($this->grupo_id->Exportable)
							$doc->exportField($this->grupo_id);
						if ($this->usuario_id->Exportable)
							$doc->exportField($this->usuario_id);
						if ($this->bool_ativo_item->Exportable)
							$doc->exportField($this->bool_ativo_item);
					} else {
						if ($this->id_item->Exportable)
							$doc->exportField($this->id_item);
						if ($this->imagem_item->Exportable)
							$doc->exportField($this->imagem_item);
						if ($this->numero_item->Exportable)
							$doc->exportField($this->numero_item);
						if ($this->bairro_item->Exportable)
							$doc->exportField($this->bairro_item);
						if ($this->cidade_item->Exportable)
							$doc->exportField($this->cidade_item);
						if ($this->estado_id->Exportable)
							$doc->exportField($this->estado_id);
						if ($this->situacao_id->Exportable)
							$doc->exportField($this->situacao_id);
						if ($this->grupo_id->Exportable)
							$doc->exportField($this->grupo_id);
						if ($this->usuario_id->Exportable)
							$doc->exportField($this->usuario_id);
						if ($this->bool_ativo_item->Exportable)
							$doc->exportField($this->bool_ativo_item);
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
