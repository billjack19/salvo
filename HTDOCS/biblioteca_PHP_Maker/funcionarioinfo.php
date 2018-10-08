<?php

// Global variable for table object
$funcionario = NULL;

//
// Table class for funcionario
//
class cfuncionario extends cTable {
	var $ID_FUNCIONARIO;
	var $NOME_FUNCIONARIO;
	var $CPF_FUNCIONARIO;
	var $RG_FUNCIONARIO;
	var $SEXO_FUNCIONARIO;
	var $DATA_NASCIMENTO_FUNCIONARIO;
	var $TELEFONE_FUNCIONARIO;
	var $EMAIL_FUNCIONARIO;
	var $CEP_FUNCIONARIO;
	var $ENDERECO_FUNCIONARIO;
	var $NUMERO_END_FUNCIONARIO;
	var $COMPLEMENTO_END_FUNCIONARIO;
	var $BAIRRO_END_FUNCIONARIO;
	var $ESTADO_END_FUNCIONARIO;
	var $CIDADE_END_FUNCIONARIO;
	var $TURNO_FUNCIONARIO;
	var $CARGO_FUNCIONARIO;
	var $ID_NIVEL_ACESSO;
	var $MASP;
	var $NUMERO_LIVROS;
	var $FREQUENCIA_LIVRO;

	//
	// Table class constructor
	//
	function __construct() {
		global $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();
		$this->TableVar = 'funcionario';
		$this->TableName = 'funcionario';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`funcionario`";
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

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_ID_FUNCIONARIO', 'ID_FUNCIONARIO', '`ID_FUNCIONARIO`', '`ID_FUNCIONARIO`', 3, -1, FALSE, '`ID_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ID_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->ID_FUNCIONARIO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_FUNCIONARIO'] = &$this->ID_FUNCIONARIO;

		// NOME_FUNCIONARIO
		$this->NOME_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_NOME_FUNCIONARIO', 'NOME_FUNCIONARIO', '`NOME_FUNCIONARIO`', '`NOME_FUNCIONARIO`', 200, -1, FALSE, '`NOME_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NOME_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['NOME_FUNCIONARIO'] = &$this->NOME_FUNCIONARIO;

		// CPF_FUNCIONARIO
		$this->CPF_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_CPF_FUNCIONARIO', 'CPF_FUNCIONARIO', '`CPF_FUNCIONARIO`', '`CPF_FUNCIONARIO`', 200, -1, FALSE, '`CPF_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CPF_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['CPF_FUNCIONARIO'] = &$this->CPF_FUNCIONARIO;

		// RG_FUNCIONARIO
		$this->RG_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_RG_FUNCIONARIO', 'RG_FUNCIONARIO', '`RG_FUNCIONARIO`', '`RG_FUNCIONARIO`', 200, -1, FALSE, '`RG_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RG_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['RG_FUNCIONARIO'] = &$this->RG_FUNCIONARIO;

		// SEXO_FUNCIONARIO
		$this->SEXO_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_SEXO_FUNCIONARIO', 'SEXO_FUNCIONARIO', '`SEXO_FUNCIONARIO`', '`SEXO_FUNCIONARIO`', 200, -1, FALSE, '`SEXO_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SEXO_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['SEXO_FUNCIONARIO'] = &$this->SEXO_FUNCIONARIO;

		// DATA_NASCIMENTO_FUNCIONARIO
		$this->DATA_NASCIMENTO_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_DATA_NASCIMENTO_FUNCIONARIO', 'DATA_NASCIMENTO_FUNCIONARIO', '`DATA_NASCIMENTO_FUNCIONARIO`', '`DATA_NASCIMENTO_FUNCIONARIO`', 200, -1, FALSE, '`DATA_NASCIMENTO_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATA_NASCIMENTO_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['DATA_NASCIMENTO_FUNCIONARIO'] = &$this->DATA_NASCIMENTO_FUNCIONARIO;

		// TELEFONE_FUNCIONARIO
		$this->TELEFONE_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_TELEFONE_FUNCIONARIO', 'TELEFONE_FUNCIONARIO', '`TELEFONE_FUNCIONARIO`', '`TELEFONE_FUNCIONARIO`', 200, -1, FALSE, '`TELEFONE_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TELEFONE_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['TELEFONE_FUNCIONARIO'] = &$this->TELEFONE_FUNCIONARIO;

		// EMAIL_FUNCIONARIO
		$this->EMAIL_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_EMAIL_FUNCIONARIO', 'EMAIL_FUNCIONARIO', '`EMAIL_FUNCIONARIO`', '`EMAIL_FUNCIONARIO`', 200, -1, FALSE, '`EMAIL_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EMAIL_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['EMAIL_FUNCIONARIO'] = &$this->EMAIL_FUNCIONARIO;

		// CEP_FUNCIONARIO
		$this->CEP_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_CEP_FUNCIONARIO', 'CEP_FUNCIONARIO', '`CEP_FUNCIONARIO`', '`CEP_FUNCIONARIO`', 200, -1, FALSE, '`CEP_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CEP_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['CEP_FUNCIONARIO'] = &$this->CEP_FUNCIONARIO;

		// ENDERECO_FUNCIONARIO
		$this->ENDERECO_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_ENDERECO_FUNCIONARIO', 'ENDERECO_FUNCIONARIO', '`ENDERECO_FUNCIONARIO`', '`ENDERECO_FUNCIONARIO`', 200, -1, FALSE, '`ENDERECO_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ENDERECO_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['ENDERECO_FUNCIONARIO'] = &$this->ENDERECO_FUNCIONARIO;

		// NUMERO_END_FUNCIONARIO
		$this->NUMERO_END_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_NUMERO_END_FUNCIONARIO', 'NUMERO_END_FUNCIONARIO', '`NUMERO_END_FUNCIONARIO`', '`NUMERO_END_FUNCIONARIO`', 3, -1, FALSE, '`NUMERO_END_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NUMERO_END_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->NUMERO_END_FUNCIONARIO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['NUMERO_END_FUNCIONARIO'] = &$this->NUMERO_END_FUNCIONARIO;

		// COMPLEMENTO_END_FUNCIONARIO
		$this->COMPLEMENTO_END_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_COMPLEMENTO_END_FUNCIONARIO', 'COMPLEMENTO_END_FUNCIONARIO', '`COMPLEMENTO_END_FUNCIONARIO`', '`COMPLEMENTO_END_FUNCIONARIO`', 200, -1, FALSE, '`COMPLEMENTO_END_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->COMPLEMENTO_END_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['COMPLEMENTO_END_FUNCIONARIO'] = &$this->COMPLEMENTO_END_FUNCIONARIO;

		// BAIRRO_END_FUNCIONARIO
		$this->BAIRRO_END_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_BAIRRO_END_FUNCIONARIO', 'BAIRRO_END_FUNCIONARIO', '`BAIRRO_END_FUNCIONARIO`', '`BAIRRO_END_FUNCIONARIO`', 200, -1, FALSE, '`BAIRRO_END_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BAIRRO_END_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['BAIRRO_END_FUNCIONARIO'] = &$this->BAIRRO_END_FUNCIONARIO;

		// ESTADO_END_FUNCIONARIO
		$this->ESTADO_END_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_ESTADO_END_FUNCIONARIO', 'ESTADO_END_FUNCIONARIO', '`ESTADO_END_FUNCIONARIO`', '`ESTADO_END_FUNCIONARIO`', 200, -1, FALSE, '`ESTADO_END_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ESTADO_END_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['ESTADO_END_FUNCIONARIO'] = &$this->ESTADO_END_FUNCIONARIO;

		// CIDADE_END_FUNCIONARIO
		$this->CIDADE_END_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_CIDADE_END_FUNCIONARIO', 'CIDADE_END_FUNCIONARIO', '`CIDADE_END_FUNCIONARIO`', '`CIDADE_END_FUNCIONARIO`', 200, -1, FALSE, '`CIDADE_END_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CIDADE_END_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['CIDADE_END_FUNCIONARIO'] = &$this->CIDADE_END_FUNCIONARIO;

		// TURNO_FUNCIONARIO
		$this->TURNO_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_TURNO_FUNCIONARIO', 'TURNO_FUNCIONARIO', '`TURNO_FUNCIONARIO`', '`TURNO_FUNCIONARIO`', 200, -1, FALSE, '`TURNO_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TURNO_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['TURNO_FUNCIONARIO'] = &$this->TURNO_FUNCIONARIO;

		// CARGO_FUNCIONARIO
		$this->CARGO_FUNCIONARIO = new cField('funcionario', 'funcionario', 'x_CARGO_FUNCIONARIO', 'CARGO_FUNCIONARIO', '`CARGO_FUNCIONARIO`', '`CARGO_FUNCIONARIO`', 200, -1, FALSE, '`CARGO_FUNCIONARIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CARGO_FUNCIONARIO->Sortable = TRUE; // Allow sort
		$this->fields['CARGO_FUNCIONARIO'] = &$this->CARGO_FUNCIONARIO;

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO = new cField('funcionario', 'funcionario', 'x_ID_NIVEL_ACESSO', 'ID_NIVEL_ACESSO', '`ID_NIVEL_ACESSO`', '`ID_NIVEL_ACESSO`', 3, -1, FALSE, '`ID_NIVEL_ACESSO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ID_NIVEL_ACESSO->Sortable = TRUE; // Allow sort
		$this->ID_NIVEL_ACESSO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_NIVEL_ACESSO'] = &$this->ID_NIVEL_ACESSO;

		// MASP
		$this->MASP = new cField('funcionario', 'funcionario', 'x_MASP', 'MASP', '`MASP`', '`MASP`', 200, -1, FALSE, '`MASP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MASP->Sortable = TRUE; // Allow sort
		$this->fields['MASP'] = &$this->MASP;

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS = new cField('funcionario', 'funcionario', 'x_NUMERO_LIVROS', 'NUMERO_LIVROS', '`NUMERO_LIVROS`', '`NUMERO_LIVROS`', 3, -1, FALSE, '`NUMERO_LIVROS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NUMERO_LIVROS->Sortable = TRUE; // Allow sort
		$this->NUMERO_LIVROS->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['NUMERO_LIVROS'] = &$this->NUMERO_LIVROS;

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO = new cField('funcionario', 'funcionario', 'x_FREQUENCIA_LIVRO', 'FREQUENCIA_LIVRO', '`FREQUENCIA_LIVRO`', '`FREQUENCIA_LIVRO`', 3, -1, FALSE, '`FREQUENCIA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`funcionario`";
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
			$this->ID_FUNCIONARIO->setDbValue($conn->Insert_ID());
			$rs['ID_FUNCIONARIO'] = $this->ID_FUNCIONARIO->DbValue;
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
			if (array_key_exists('ID_FUNCIONARIO', $rs))
				ew_AddFilter($where, ew_QuotedName('ID_FUNCIONARIO', $this->DBID) . '=' . ew_QuotedValue($rs['ID_FUNCIONARIO'], $this->ID_FUNCIONARIO->FldDataType, $this->DBID));
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
		return "`ID_FUNCIONARIO` = @ID_FUNCIONARIO@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->ID_FUNCIONARIO->CurrentValue))
			return "0=1"; // Invalid key
		if (is_null($this->ID_FUNCIONARIO->CurrentValue))
			return "0=1"; // Invalid key
		else
			$sKeyFilter = str_replace("@ID_FUNCIONARIO@", ew_AdjustSql($this->ID_FUNCIONARIO->CurrentValue, $this->DBID), $sKeyFilter); // Replace key value
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
			return "funcionariolist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	function GetModalCaption($pageName) {
		global $Language;
		if ($pageName == "funcionarioview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "funcionarioedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "funcionarioadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	function GetListUrl() {
		return "funcionariolist.php";
	}

	// View URL
	function GetViewUrl($parm = "") {
		if ($parm <> "")
			$url = $this->KeyUrl("funcionarioview.php", $this->UrlParm($parm));
		else
			$url = $this->KeyUrl("funcionarioview.php", $this->UrlParm(EW_TABLE_SHOW_DETAIL . "="));
		return $this->AddMasterUrl($url);
	}

	// Add URL
	function GetAddUrl($parm = "") {
		if ($parm <> "")
			$url = "funcionarioadd.php?" . $this->UrlParm($parm);
		else
			$url = "funcionarioadd.php";
		return $this->AddMasterUrl($url);
	}

	// Edit URL
	function GetEditUrl($parm = "") {
		$url = $this->KeyUrl("funcionarioedit.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline edit URL
	function GetInlineEditUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
		return $this->AddMasterUrl($url);
	}

	// Copy URL
	function GetCopyUrl($parm = "") {
		$url = $this->KeyUrl("funcionarioadd.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline copy URL
	function GetInlineCopyUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
		return $this->AddMasterUrl($url);
	}

	// Delete URL
	function GetDeleteUrl() {
		return $this->KeyUrl("funcionariodelete.php", $this->UrlParm());
	}

	// Add master url
	function AddMasterUrl($url) {
		return $url;
	}

	function KeyToJson() {
		$json = "";
		$json .= "ID_FUNCIONARIO:" . ew_VarToJson($this->ID_FUNCIONARIO->CurrentValue, "number", "'");
		return "{" . $json . "}";
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->ID_FUNCIONARIO->CurrentValue)) {
			$sUrl .= "ID_FUNCIONARIO=" . urlencode($this->ID_FUNCIONARIO->CurrentValue);
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
			if ($isPost && isset($_POST["ID_FUNCIONARIO"]))
				$arKeys[] = $_POST["ID_FUNCIONARIO"];
			elseif (isset($_GET["ID_FUNCIONARIO"]))
				$arKeys[] = $_GET["ID_FUNCIONARIO"];
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
			$this->ID_FUNCIONARIO->CurrentValue = $key;
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
		$this->ID_FUNCIONARIO->setDbValue($rs->fields('ID_FUNCIONARIO'));
		$this->NOME_FUNCIONARIO->setDbValue($rs->fields('NOME_FUNCIONARIO'));
		$this->CPF_FUNCIONARIO->setDbValue($rs->fields('CPF_FUNCIONARIO'));
		$this->RG_FUNCIONARIO->setDbValue($rs->fields('RG_FUNCIONARIO'));
		$this->SEXO_FUNCIONARIO->setDbValue($rs->fields('SEXO_FUNCIONARIO'));
		$this->DATA_NASCIMENTO_FUNCIONARIO->setDbValue($rs->fields('DATA_NASCIMENTO_FUNCIONARIO'));
		$this->TELEFONE_FUNCIONARIO->setDbValue($rs->fields('TELEFONE_FUNCIONARIO'));
		$this->EMAIL_FUNCIONARIO->setDbValue($rs->fields('EMAIL_FUNCIONARIO'));
		$this->CEP_FUNCIONARIO->setDbValue($rs->fields('CEP_FUNCIONARIO'));
		$this->ENDERECO_FUNCIONARIO->setDbValue($rs->fields('ENDERECO_FUNCIONARIO'));
		$this->NUMERO_END_FUNCIONARIO->setDbValue($rs->fields('NUMERO_END_FUNCIONARIO'));
		$this->COMPLEMENTO_END_FUNCIONARIO->setDbValue($rs->fields('COMPLEMENTO_END_FUNCIONARIO'));
		$this->BAIRRO_END_FUNCIONARIO->setDbValue($rs->fields('BAIRRO_END_FUNCIONARIO'));
		$this->ESTADO_END_FUNCIONARIO->setDbValue($rs->fields('ESTADO_END_FUNCIONARIO'));
		$this->CIDADE_END_FUNCIONARIO->setDbValue($rs->fields('CIDADE_END_FUNCIONARIO'));
		$this->TURNO_FUNCIONARIO->setDbValue($rs->fields('TURNO_FUNCIONARIO'));
		$this->CARGO_FUNCIONARIO->setDbValue($rs->fields('CARGO_FUNCIONARIO'));
		$this->ID_NIVEL_ACESSO->setDbValue($rs->fields('ID_NIVEL_ACESSO'));
		$this->MASP->setDbValue($rs->fields('MASP'));
		$this->NUMERO_LIVROS->setDbValue($rs->fields('NUMERO_LIVROS'));
		$this->FREQUENCIA_LIVRO->setDbValue($rs->fields('FREQUENCIA_LIVRO'));
	}

	// Render list row values
	function RenderListRow() {
		global $Security, $gsLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// ID_FUNCIONARIO
		// NOME_FUNCIONARIO
		// CPF_FUNCIONARIO
		// RG_FUNCIONARIO
		// SEXO_FUNCIONARIO
		// DATA_NASCIMENTO_FUNCIONARIO
		// TELEFONE_FUNCIONARIO
		// EMAIL_FUNCIONARIO
		// CEP_FUNCIONARIO
		// ENDERECO_FUNCIONARIO
		// NUMERO_END_FUNCIONARIO
		// COMPLEMENTO_END_FUNCIONARIO
		// BAIRRO_END_FUNCIONARIO
		// ESTADO_END_FUNCIONARIO
		// CIDADE_END_FUNCIONARIO
		// TURNO_FUNCIONARIO
		// CARGO_FUNCIONARIO
		// ID_NIVEL_ACESSO
		// MASP
		// NUMERO_LIVROS
		// FREQUENCIA_LIVRO
		// ID_FUNCIONARIO

		$this->ID_FUNCIONARIO->ViewValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->ID_FUNCIONARIO->ViewCustomAttributes = "";

		// NOME_FUNCIONARIO
		$this->NOME_FUNCIONARIO->ViewValue = $this->NOME_FUNCIONARIO->CurrentValue;
		$this->NOME_FUNCIONARIO->ViewCustomAttributes = "";

		// CPF_FUNCIONARIO
		$this->CPF_FUNCIONARIO->ViewValue = $this->CPF_FUNCIONARIO->CurrentValue;
		$this->CPF_FUNCIONARIO->ViewCustomAttributes = "";

		// RG_FUNCIONARIO
		$this->RG_FUNCIONARIO->ViewValue = $this->RG_FUNCIONARIO->CurrentValue;
		$this->RG_FUNCIONARIO->ViewCustomAttributes = "";

		// SEXO_FUNCIONARIO
		$this->SEXO_FUNCIONARIO->ViewValue = $this->SEXO_FUNCIONARIO->CurrentValue;
		$this->SEXO_FUNCIONARIO->ViewCustomAttributes = "";

		// DATA_NASCIMENTO_FUNCIONARIO
		$this->DATA_NASCIMENTO_FUNCIONARIO->ViewValue = $this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue;
		$this->DATA_NASCIMENTO_FUNCIONARIO->ViewCustomAttributes = "";

		// TELEFONE_FUNCIONARIO
		$this->TELEFONE_FUNCIONARIO->ViewValue = $this->TELEFONE_FUNCIONARIO->CurrentValue;
		$this->TELEFONE_FUNCIONARIO->ViewCustomAttributes = "";

		// EMAIL_FUNCIONARIO
		$this->EMAIL_FUNCIONARIO->ViewValue = $this->EMAIL_FUNCIONARIO->CurrentValue;
		$this->EMAIL_FUNCIONARIO->ViewCustomAttributes = "";

		// CEP_FUNCIONARIO
		$this->CEP_FUNCIONARIO->ViewValue = $this->CEP_FUNCIONARIO->CurrentValue;
		$this->CEP_FUNCIONARIO->ViewCustomAttributes = "";

		// ENDERECO_FUNCIONARIO
		$this->ENDERECO_FUNCIONARIO->ViewValue = $this->ENDERECO_FUNCIONARIO->CurrentValue;
		$this->ENDERECO_FUNCIONARIO->ViewCustomAttributes = "";

		// NUMERO_END_FUNCIONARIO
		$this->NUMERO_END_FUNCIONARIO->ViewValue = $this->NUMERO_END_FUNCIONARIO->CurrentValue;
		$this->NUMERO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// COMPLEMENTO_END_FUNCIONARIO
		$this->COMPLEMENTO_END_FUNCIONARIO->ViewValue = $this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue;
		$this->COMPLEMENTO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// BAIRRO_END_FUNCIONARIO
		$this->BAIRRO_END_FUNCIONARIO->ViewValue = $this->BAIRRO_END_FUNCIONARIO->CurrentValue;
		$this->BAIRRO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// ESTADO_END_FUNCIONARIO
		$this->ESTADO_END_FUNCIONARIO->ViewValue = $this->ESTADO_END_FUNCIONARIO->CurrentValue;
		$this->ESTADO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// CIDADE_END_FUNCIONARIO
		$this->CIDADE_END_FUNCIONARIO->ViewValue = $this->CIDADE_END_FUNCIONARIO->CurrentValue;
		$this->CIDADE_END_FUNCIONARIO->ViewCustomAttributes = "";

		// TURNO_FUNCIONARIO
		$this->TURNO_FUNCIONARIO->ViewValue = $this->TURNO_FUNCIONARIO->CurrentValue;
		$this->TURNO_FUNCIONARIO->ViewCustomAttributes = "";

		// CARGO_FUNCIONARIO
		$this->CARGO_FUNCIONARIO->ViewValue = $this->CARGO_FUNCIONARIO->CurrentValue;
		$this->CARGO_FUNCIONARIO->ViewCustomAttributes = "";

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->ViewValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->ID_NIVEL_ACESSO->ViewCustomAttributes = "";

		// MASP
		$this->MASP->ViewValue = $this->MASP->CurrentValue;
		$this->MASP->ViewCustomAttributes = "";

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS->ViewValue = $this->NUMERO_LIVROS->CurrentValue;
		$this->NUMERO_LIVROS->ViewCustomAttributes = "";

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->ViewValue = $this->FREQUENCIA_LIVRO->CurrentValue;
		$this->FREQUENCIA_LIVRO->ViewCustomAttributes = "";

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->LinkCustomAttributes = "";
		$this->ID_FUNCIONARIO->HrefValue = "";
		$this->ID_FUNCIONARIO->TooltipValue = "";

		// NOME_FUNCIONARIO
		$this->NOME_FUNCIONARIO->LinkCustomAttributes = "";
		$this->NOME_FUNCIONARIO->HrefValue = "";
		$this->NOME_FUNCIONARIO->TooltipValue = "";

		// CPF_FUNCIONARIO
		$this->CPF_FUNCIONARIO->LinkCustomAttributes = "";
		$this->CPF_FUNCIONARIO->HrefValue = "";
		$this->CPF_FUNCIONARIO->TooltipValue = "";

		// RG_FUNCIONARIO
		$this->RG_FUNCIONARIO->LinkCustomAttributes = "";
		$this->RG_FUNCIONARIO->HrefValue = "";
		$this->RG_FUNCIONARIO->TooltipValue = "";

		// SEXO_FUNCIONARIO
		$this->SEXO_FUNCIONARIO->LinkCustomAttributes = "";
		$this->SEXO_FUNCIONARIO->HrefValue = "";
		$this->SEXO_FUNCIONARIO->TooltipValue = "";

		// DATA_NASCIMENTO_FUNCIONARIO
		$this->DATA_NASCIMENTO_FUNCIONARIO->LinkCustomAttributes = "";
		$this->DATA_NASCIMENTO_FUNCIONARIO->HrefValue = "";
		$this->DATA_NASCIMENTO_FUNCIONARIO->TooltipValue = "";

		// TELEFONE_FUNCIONARIO
		$this->TELEFONE_FUNCIONARIO->LinkCustomAttributes = "";
		$this->TELEFONE_FUNCIONARIO->HrefValue = "";
		$this->TELEFONE_FUNCIONARIO->TooltipValue = "";

		// EMAIL_FUNCIONARIO
		$this->EMAIL_FUNCIONARIO->LinkCustomAttributes = "";
		$this->EMAIL_FUNCIONARIO->HrefValue = "";
		$this->EMAIL_FUNCIONARIO->TooltipValue = "";

		// CEP_FUNCIONARIO
		$this->CEP_FUNCIONARIO->LinkCustomAttributes = "";
		$this->CEP_FUNCIONARIO->HrefValue = "";
		$this->CEP_FUNCIONARIO->TooltipValue = "";

		// ENDERECO_FUNCIONARIO
		$this->ENDERECO_FUNCIONARIO->LinkCustomAttributes = "";
		$this->ENDERECO_FUNCIONARIO->HrefValue = "";
		$this->ENDERECO_FUNCIONARIO->TooltipValue = "";

		// NUMERO_END_FUNCIONARIO
		$this->NUMERO_END_FUNCIONARIO->LinkCustomAttributes = "";
		$this->NUMERO_END_FUNCIONARIO->HrefValue = "";
		$this->NUMERO_END_FUNCIONARIO->TooltipValue = "";

		// COMPLEMENTO_END_FUNCIONARIO
		$this->COMPLEMENTO_END_FUNCIONARIO->LinkCustomAttributes = "";
		$this->COMPLEMENTO_END_FUNCIONARIO->HrefValue = "";
		$this->COMPLEMENTO_END_FUNCIONARIO->TooltipValue = "";

		// BAIRRO_END_FUNCIONARIO
		$this->BAIRRO_END_FUNCIONARIO->LinkCustomAttributes = "";
		$this->BAIRRO_END_FUNCIONARIO->HrefValue = "";
		$this->BAIRRO_END_FUNCIONARIO->TooltipValue = "";

		// ESTADO_END_FUNCIONARIO
		$this->ESTADO_END_FUNCIONARIO->LinkCustomAttributes = "";
		$this->ESTADO_END_FUNCIONARIO->HrefValue = "";
		$this->ESTADO_END_FUNCIONARIO->TooltipValue = "";

		// CIDADE_END_FUNCIONARIO
		$this->CIDADE_END_FUNCIONARIO->LinkCustomAttributes = "";
		$this->CIDADE_END_FUNCIONARIO->HrefValue = "";
		$this->CIDADE_END_FUNCIONARIO->TooltipValue = "";

		// TURNO_FUNCIONARIO
		$this->TURNO_FUNCIONARIO->LinkCustomAttributes = "";
		$this->TURNO_FUNCIONARIO->HrefValue = "";
		$this->TURNO_FUNCIONARIO->TooltipValue = "";

		// CARGO_FUNCIONARIO
		$this->CARGO_FUNCIONARIO->LinkCustomAttributes = "";
		$this->CARGO_FUNCIONARIO->HrefValue = "";
		$this->CARGO_FUNCIONARIO->TooltipValue = "";

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->LinkCustomAttributes = "";
		$this->ID_NIVEL_ACESSO->HrefValue = "";
		$this->ID_NIVEL_ACESSO->TooltipValue = "";

		// MASP
		$this->MASP->LinkCustomAttributes = "";
		$this->MASP->HrefValue = "";
		$this->MASP->TooltipValue = "";

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS->LinkCustomAttributes = "";
		$this->NUMERO_LIVROS->HrefValue = "";
		$this->NUMERO_LIVROS->TooltipValue = "";

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

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->ID_FUNCIONARIO->EditCustomAttributes = "";
		$this->ID_FUNCIONARIO->EditValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->ID_FUNCIONARIO->ViewCustomAttributes = "";

		// NOME_FUNCIONARIO
		$this->NOME_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->NOME_FUNCIONARIO->EditCustomAttributes = "";
		$this->NOME_FUNCIONARIO->EditValue = $this->NOME_FUNCIONARIO->CurrentValue;
		$this->NOME_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->NOME_FUNCIONARIO->FldCaption());

		// CPF_FUNCIONARIO
		$this->CPF_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->CPF_FUNCIONARIO->EditCustomAttributes = "";
		$this->CPF_FUNCIONARIO->EditValue = $this->CPF_FUNCIONARIO->CurrentValue;
		$this->CPF_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CPF_FUNCIONARIO->FldCaption());

		// RG_FUNCIONARIO
		$this->RG_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->RG_FUNCIONARIO->EditCustomAttributes = "";
		$this->RG_FUNCIONARIO->EditValue = $this->RG_FUNCIONARIO->CurrentValue;
		$this->RG_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->RG_FUNCIONARIO->FldCaption());

		// SEXO_FUNCIONARIO
		$this->SEXO_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->SEXO_FUNCIONARIO->EditCustomAttributes = "";
		$this->SEXO_FUNCIONARIO->EditValue = $this->SEXO_FUNCIONARIO->CurrentValue;
		$this->SEXO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->SEXO_FUNCIONARIO->FldCaption());

		// DATA_NASCIMENTO_FUNCIONARIO
		$this->DATA_NASCIMENTO_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->DATA_NASCIMENTO_FUNCIONARIO->EditCustomAttributes = "";
		$this->DATA_NASCIMENTO_FUNCIONARIO->EditValue = $this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue;
		$this->DATA_NASCIMENTO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->DATA_NASCIMENTO_FUNCIONARIO->FldCaption());

		// TELEFONE_FUNCIONARIO
		$this->TELEFONE_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->TELEFONE_FUNCIONARIO->EditCustomAttributes = "";
		$this->TELEFONE_FUNCIONARIO->EditValue = $this->TELEFONE_FUNCIONARIO->CurrentValue;
		$this->TELEFONE_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->TELEFONE_FUNCIONARIO->FldCaption());

		// EMAIL_FUNCIONARIO
		$this->EMAIL_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->EMAIL_FUNCIONARIO->EditCustomAttributes = "";
		$this->EMAIL_FUNCIONARIO->EditValue = $this->EMAIL_FUNCIONARIO->CurrentValue;
		$this->EMAIL_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->EMAIL_FUNCIONARIO->FldCaption());

		// CEP_FUNCIONARIO
		$this->CEP_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->CEP_FUNCIONARIO->EditCustomAttributes = "";
		$this->CEP_FUNCIONARIO->EditValue = $this->CEP_FUNCIONARIO->CurrentValue;
		$this->CEP_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CEP_FUNCIONARIO->FldCaption());

		// ENDERECO_FUNCIONARIO
		$this->ENDERECO_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->ENDERECO_FUNCIONARIO->EditCustomAttributes = "";
		$this->ENDERECO_FUNCIONARIO->EditValue = $this->ENDERECO_FUNCIONARIO->CurrentValue;
		$this->ENDERECO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->ENDERECO_FUNCIONARIO->FldCaption());

		// NUMERO_END_FUNCIONARIO
		$this->NUMERO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->NUMERO_END_FUNCIONARIO->EditCustomAttributes = "";
		$this->NUMERO_END_FUNCIONARIO->EditValue = $this->NUMERO_END_FUNCIONARIO->CurrentValue;
		$this->NUMERO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->NUMERO_END_FUNCIONARIO->FldCaption());

		// COMPLEMENTO_END_FUNCIONARIO
		$this->COMPLEMENTO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->COMPLEMENTO_END_FUNCIONARIO->EditCustomAttributes = "";
		$this->COMPLEMENTO_END_FUNCIONARIO->EditValue = $this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue;
		$this->COMPLEMENTO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->COMPLEMENTO_END_FUNCIONARIO->FldCaption());

		// BAIRRO_END_FUNCIONARIO
		$this->BAIRRO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->BAIRRO_END_FUNCIONARIO->EditCustomAttributes = "";
		$this->BAIRRO_END_FUNCIONARIO->EditValue = $this->BAIRRO_END_FUNCIONARIO->CurrentValue;
		$this->BAIRRO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->BAIRRO_END_FUNCIONARIO->FldCaption());

		// ESTADO_END_FUNCIONARIO
		$this->ESTADO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->ESTADO_END_FUNCIONARIO->EditCustomAttributes = "";
		$this->ESTADO_END_FUNCIONARIO->EditValue = $this->ESTADO_END_FUNCIONARIO->CurrentValue;
		$this->ESTADO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->ESTADO_END_FUNCIONARIO->FldCaption());

		// CIDADE_END_FUNCIONARIO
		$this->CIDADE_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->CIDADE_END_FUNCIONARIO->EditCustomAttributes = "";
		$this->CIDADE_END_FUNCIONARIO->EditValue = $this->CIDADE_END_FUNCIONARIO->CurrentValue;
		$this->CIDADE_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CIDADE_END_FUNCIONARIO->FldCaption());

		// TURNO_FUNCIONARIO
		$this->TURNO_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->TURNO_FUNCIONARIO->EditCustomAttributes = "";
		$this->TURNO_FUNCIONARIO->EditValue = $this->TURNO_FUNCIONARIO->CurrentValue;
		$this->TURNO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->TURNO_FUNCIONARIO->FldCaption());

		// CARGO_FUNCIONARIO
		$this->CARGO_FUNCIONARIO->EditAttrs["class"] = "form-control";
		$this->CARGO_FUNCIONARIO->EditCustomAttributes = "";
		$this->CARGO_FUNCIONARIO->EditValue = $this->CARGO_FUNCIONARIO->CurrentValue;
		$this->CARGO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CARGO_FUNCIONARIO->FldCaption());

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->EditAttrs["class"] = "form-control";
		$this->ID_NIVEL_ACESSO->EditCustomAttributes = "";
		$this->ID_NIVEL_ACESSO->EditValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->ID_NIVEL_ACESSO->PlaceHolder = ew_RemoveHtml($this->ID_NIVEL_ACESSO->FldCaption());

		// MASP
		$this->MASP->EditAttrs["class"] = "form-control";
		$this->MASP->EditCustomAttributes = "";
		$this->MASP->EditValue = $this->MASP->CurrentValue;
		$this->MASP->PlaceHolder = ew_RemoveHtml($this->MASP->FldCaption());

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS->EditAttrs["class"] = "form-control";
		$this->NUMERO_LIVROS->EditCustomAttributes = "";
		$this->NUMERO_LIVROS->EditValue = $this->NUMERO_LIVROS->CurrentValue;
		$this->NUMERO_LIVROS->PlaceHolder = ew_RemoveHtml($this->NUMERO_LIVROS->FldCaption());

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
					if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ID_FUNCIONARIO);
					if ($this->NOME_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->NOME_FUNCIONARIO);
					if ($this->CPF_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CPF_FUNCIONARIO);
					if ($this->RG_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->RG_FUNCIONARIO);
					if ($this->SEXO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->SEXO_FUNCIONARIO);
					if ($this->DATA_NASCIMENTO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->DATA_NASCIMENTO_FUNCIONARIO);
					if ($this->TELEFONE_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->TELEFONE_FUNCIONARIO);
					if ($this->EMAIL_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->EMAIL_FUNCIONARIO);
					if ($this->CEP_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CEP_FUNCIONARIO);
					if ($this->ENDERECO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ENDERECO_FUNCIONARIO);
					if ($this->NUMERO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->NUMERO_END_FUNCIONARIO);
					if ($this->COMPLEMENTO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->COMPLEMENTO_END_FUNCIONARIO);
					if ($this->BAIRRO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->BAIRRO_END_FUNCIONARIO);
					if ($this->ESTADO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ESTADO_END_FUNCIONARIO);
					if ($this->CIDADE_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CIDADE_END_FUNCIONARIO);
					if ($this->TURNO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->TURNO_FUNCIONARIO);
					if ($this->CARGO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CARGO_FUNCIONARIO);
					if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportCaption($this->ID_NIVEL_ACESSO);
					if ($this->MASP->Exportable) $Doc->ExportCaption($this->MASP);
					if ($this->NUMERO_LIVROS->Exportable) $Doc->ExportCaption($this->NUMERO_LIVROS);
					if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportCaption($this->FREQUENCIA_LIVRO);
				} else {
					if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ID_FUNCIONARIO);
					if ($this->NOME_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->NOME_FUNCIONARIO);
					if ($this->CPF_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CPF_FUNCIONARIO);
					if ($this->RG_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->RG_FUNCIONARIO);
					if ($this->SEXO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->SEXO_FUNCIONARIO);
					if ($this->DATA_NASCIMENTO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->DATA_NASCIMENTO_FUNCIONARIO);
					if ($this->TELEFONE_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->TELEFONE_FUNCIONARIO);
					if ($this->EMAIL_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->EMAIL_FUNCIONARIO);
					if ($this->CEP_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CEP_FUNCIONARIO);
					if ($this->ENDERECO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ENDERECO_FUNCIONARIO);
					if ($this->NUMERO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->NUMERO_END_FUNCIONARIO);
					if ($this->COMPLEMENTO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->COMPLEMENTO_END_FUNCIONARIO);
					if ($this->BAIRRO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->BAIRRO_END_FUNCIONARIO);
					if ($this->ESTADO_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->ESTADO_END_FUNCIONARIO);
					if ($this->CIDADE_END_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CIDADE_END_FUNCIONARIO);
					if ($this->TURNO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->TURNO_FUNCIONARIO);
					if ($this->CARGO_FUNCIONARIO->Exportable) $Doc->ExportCaption($this->CARGO_FUNCIONARIO);
					if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportCaption($this->ID_NIVEL_ACESSO);
					if ($this->MASP->Exportable) $Doc->ExportCaption($this->MASP);
					if ($this->NUMERO_LIVROS->Exportable) $Doc->ExportCaption($this->NUMERO_LIVROS);
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
						if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportField($this->ID_FUNCIONARIO);
						if ($this->NOME_FUNCIONARIO->Exportable) $Doc->ExportField($this->NOME_FUNCIONARIO);
						if ($this->CPF_FUNCIONARIO->Exportable) $Doc->ExportField($this->CPF_FUNCIONARIO);
						if ($this->RG_FUNCIONARIO->Exportable) $Doc->ExportField($this->RG_FUNCIONARIO);
						if ($this->SEXO_FUNCIONARIO->Exportable) $Doc->ExportField($this->SEXO_FUNCIONARIO);
						if ($this->DATA_NASCIMENTO_FUNCIONARIO->Exportable) $Doc->ExportField($this->DATA_NASCIMENTO_FUNCIONARIO);
						if ($this->TELEFONE_FUNCIONARIO->Exportable) $Doc->ExportField($this->TELEFONE_FUNCIONARIO);
						if ($this->EMAIL_FUNCIONARIO->Exportable) $Doc->ExportField($this->EMAIL_FUNCIONARIO);
						if ($this->CEP_FUNCIONARIO->Exportable) $Doc->ExportField($this->CEP_FUNCIONARIO);
						if ($this->ENDERECO_FUNCIONARIO->Exportable) $Doc->ExportField($this->ENDERECO_FUNCIONARIO);
						if ($this->NUMERO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->NUMERO_END_FUNCIONARIO);
						if ($this->COMPLEMENTO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->COMPLEMENTO_END_FUNCIONARIO);
						if ($this->BAIRRO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->BAIRRO_END_FUNCIONARIO);
						if ($this->ESTADO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->ESTADO_END_FUNCIONARIO);
						if ($this->CIDADE_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->CIDADE_END_FUNCIONARIO);
						if ($this->TURNO_FUNCIONARIO->Exportable) $Doc->ExportField($this->TURNO_FUNCIONARIO);
						if ($this->CARGO_FUNCIONARIO->Exportable) $Doc->ExportField($this->CARGO_FUNCIONARIO);
						if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportField($this->ID_NIVEL_ACESSO);
						if ($this->MASP->Exportable) $Doc->ExportField($this->MASP);
						if ($this->NUMERO_LIVROS->Exportable) $Doc->ExportField($this->NUMERO_LIVROS);
						if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportField($this->FREQUENCIA_LIVRO);
					} else {
						if ($this->ID_FUNCIONARIO->Exportable) $Doc->ExportField($this->ID_FUNCIONARIO);
						if ($this->NOME_FUNCIONARIO->Exportable) $Doc->ExportField($this->NOME_FUNCIONARIO);
						if ($this->CPF_FUNCIONARIO->Exportable) $Doc->ExportField($this->CPF_FUNCIONARIO);
						if ($this->RG_FUNCIONARIO->Exportable) $Doc->ExportField($this->RG_FUNCIONARIO);
						if ($this->SEXO_FUNCIONARIO->Exportable) $Doc->ExportField($this->SEXO_FUNCIONARIO);
						if ($this->DATA_NASCIMENTO_FUNCIONARIO->Exportable) $Doc->ExportField($this->DATA_NASCIMENTO_FUNCIONARIO);
						if ($this->TELEFONE_FUNCIONARIO->Exportable) $Doc->ExportField($this->TELEFONE_FUNCIONARIO);
						if ($this->EMAIL_FUNCIONARIO->Exportable) $Doc->ExportField($this->EMAIL_FUNCIONARIO);
						if ($this->CEP_FUNCIONARIO->Exportable) $Doc->ExportField($this->CEP_FUNCIONARIO);
						if ($this->ENDERECO_FUNCIONARIO->Exportable) $Doc->ExportField($this->ENDERECO_FUNCIONARIO);
						if ($this->NUMERO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->NUMERO_END_FUNCIONARIO);
						if ($this->COMPLEMENTO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->COMPLEMENTO_END_FUNCIONARIO);
						if ($this->BAIRRO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->BAIRRO_END_FUNCIONARIO);
						if ($this->ESTADO_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->ESTADO_END_FUNCIONARIO);
						if ($this->CIDADE_END_FUNCIONARIO->Exportable) $Doc->ExportField($this->CIDADE_END_FUNCIONARIO);
						if ($this->TURNO_FUNCIONARIO->Exportable) $Doc->ExportField($this->TURNO_FUNCIONARIO);
						if ($this->CARGO_FUNCIONARIO->Exportable) $Doc->ExportField($this->CARGO_FUNCIONARIO);
						if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportField($this->ID_NIVEL_ACESSO);
						if ($this->MASP->Exportable) $Doc->ExportField($this->MASP);
						if ($this->NUMERO_LIVROS->Exportable) $Doc->ExportField($this->NUMERO_LIVROS);
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
