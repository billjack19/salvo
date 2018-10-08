<?php

// Global variable for table object
$aluno = NULL;

//
// Table class for aluno
//
class caluno extends cTable {
	var $ID_ALUNO;
	var $NOME_ALUNO;
	var $MATRICULA_ALUNO;
	var $EMAIL_ALUNO;
	var $CPF_ALUNO;
	var $RG_ALUNO;
	var $SEXO_ALUNO;
	var $DATA_NASCIMENTO_ALUNO;
	var $TURNO_ALUNO;
	var $TELEFONE_ALUNO;
	var $RECORD_ALUNO;
	var $ID_NIVEL_ACESSO;
	var $ANO_ALUNO;
	var $TURMA_ALUNO;
	var $SALA_ALUNO;
	var $NUMERO_LIVROS;
	var $FREQUENCIA_LIVRO;

	//
	// Table class constructor
	//
	function __construct() {
		global $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();
		$this->TableVar = 'aluno';
		$this->TableName = 'aluno';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`aluno`";
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

		// ID_ALUNO
		$this->ID_ALUNO = new cField('aluno', 'aluno', 'x_ID_ALUNO', 'ID_ALUNO', '`ID_ALUNO`', '`ID_ALUNO`', 3, -1, FALSE, '`ID_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ID_ALUNO->Sortable = TRUE; // Allow sort
		$this->ID_ALUNO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_ALUNO'] = &$this->ID_ALUNO;

		// NOME_ALUNO
		$this->NOME_ALUNO = new cField('aluno', 'aluno', 'x_NOME_ALUNO', 'NOME_ALUNO', '`NOME_ALUNO`', '`NOME_ALUNO`', 200, -1, FALSE, '`NOME_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NOME_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['NOME_ALUNO'] = &$this->NOME_ALUNO;

		// MATRICULA_ALUNO
		$this->MATRICULA_ALUNO = new cField('aluno', 'aluno', 'x_MATRICULA_ALUNO', 'MATRICULA_ALUNO', '`MATRICULA_ALUNO`', '`MATRICULA_ALUNO`', 200, -1, FALSE, '`MATRICULA_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MATRICULA_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['MATRICULA_ALUNO'] = &$this->MATRICULA_ALUNO;

		// EMAIL_ALUNO
		$this->EMAIL_ALUNO = new cField('aluno', 'aluno', 'x_EMAIL_ALUNO', 'EMAIL_ALUNO', '`EMAIL_ALUNO`', '`EMAIL_ALUNO`', 200, -1, FALSE, '`EMAIL_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EMAIL_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['EMAIL_ALUNO'] = &$this->EMAIL_ALUNO;

		// CPF_ALUNO
		$this->CPF_ALUNO = new cField('aluno', 'aluno', 'x_CPF_ALUNO', 'CPF_ALUNO', '`CPF_ALUNO`', '`CPF_ALUNO`', 200, -1, FALSE, '`CPF_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CPF_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['CPF_ALUNO'] = &$this->CPF_ALUNO;

		// RG_ALUNO
		$this->RG_ALUNO = new cField('aluno', 'aluno', 'x_RG_ALUNO', 'RG_ALUNO', '`RG_ALUNO`', '`RG_ALUNO`', 200, -1, FALSE, '`RG_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RG_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['RG_ALUNO'] = &$this->RG_ALUNO;

		// SEXO_ALUNO
		$this->SEXO_ALUNO = new cField('aluno', 'aluno', 'x_SEXO_ALUNO', 'SEXO_ALUNO', '`SEXO_ALUNO`', '`SEXO_ALUNO`', 200, -1, FALSE, '`SEXO_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SEXO_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['SEXO_ALUNO'] = &$this->SEXO_ALUNO;

		// DATA_NASCIMENTO_ALUNO
		$this->DATA_NASCIMENTO_ALUNO = new cField('aluno', 'aluno', 'x_DATA_NASCIMENTO_ALUNO', 'DATA_NASCIMENTO_ALUNO', '`DATA_NASCIMENTO_ALUNO`', '`DATA_NASCIMENTO_ALUNO`', 200, -1, FALSE, '`DATA_NASCIMENTO_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATA_NASCIMENTO_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['DATA_NASCIMENTO_ALUNO'] = &$this->DATA_NASCIMENTO_ALUNO;

		// TURNO_ALUNO
		$this->TURNO_ALUNO = new cField('aluno', 'aluno', 'x_TURNO_ALUNO', 'TURNO_ALUNO', '`TURNO_ALUNO`', '`TURNO_ALUNO`', 200, -1, FALSE, '`TURNO_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TURNO_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['TURNO_ALUNO'] = &$this->TURNO_ALUNO;

		// TELEFONE_ALUNO
		$this->TELEFONE_ALUNO = new cField('aluno', 'aluno', 'x_TELEFONE_ALUNO', 'TELEFONE_ALUNO', '`TELEFONE_ALUNO`', '`TELEFONE_ALUNO`', 200, -1, FALSE, '`TELEFONE_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TELEFONE_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['TELEFONE_ALUNO'] = &$this->TELEFONE_ALUNO;

		// RECORD_ALUNO
		$this->RECORD_ALUNO = new cField('aluno', 'aluno', 'x_RECORD_ALUNO', 'RECORD_ALUNO', '`RECORD_ALUNO`', '`RECORD_ALUNO`', 3, -1, FALSE, '`RECORD_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RECORD_ALUNO->Sortable = TRUE; // Allow sort
		$this->RECORD_ALUNO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['RECORD_ALUNO'] = &$this->RECORD_ALUNO;

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO = new cField('aluno', 'aluno', 'x_ID_NIVEL_ACESSO', 'ID_NIVEL_ACESSO', '`ID_NIVEL_ACESSO`', '`ID_NIVEL_ACESSO`', 3, -1, FALSE, '`ID_NIVEL_ACESSO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ID_NIVEL_ACESSO->Sortable = TRUE; // Allow sort
		$this->ID_NIVEL_ACESSO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ID_NIVEL_ACESSO'] = &$this->ID_NIVEL_ACESSO;

		// ANO_ALUNO
		$this->ANO_ALUNO = new cField('aluno', 'aluno', 'x_ANO_ALUNO', 'ANO_ALUNO', '`ANO_ALUNO`', '`ANO_ALUNO`', 200, -1, FALSE, '`ANO_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANO_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['ANO_ALUNO'] = &$this->ANO_ALUNO;

		// TURMA_ALUNO
		$this->TURMA_ALUNO = new cField('aluno', 'aluno', 'x_TURMA_ALUNO', 'TURMA_ALUNO', '`TURMA_ALUNO`', '`TURMA_ALUNO`', 200, -1, FALSE, '`TURMA_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TURMA_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['TURMA_ALUNO'] = &$this->TURMA_ALUNO;

		// SALA_ALUNO
		$this->SALA_ALUNO = new cField('aluno', 'aluno', 'x_SALA_ALUNO', 'SALA_ALUNO', '`SALA_ALUNO`', '`SALA_ALUNO`', 200, -1, FALSE, '`SALA_ALUNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SALA_ALUNO->Sortable = TRUE; // Allow sort
		$this->fields['SALA_ALUNO'] = &$this->SALA_ALUNO;

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS = new cField('aluno', 'aluno', 'x_NUMERO_LIVROS', 'NUMERO_LIVROS', '`NUMERO_LIVROS`', '`NUMERO_LIVROS`', 3, -1, FALSE, '`NUMERO_LIVROS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NUMERO_LIVROS->Sortable = TRUE; // Allow sort
		$this->NUMERO_LIVROS->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['NUMERO_LIVROS'] = &$this->NUMERO_LIVROS;

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO = new cField('aluno', 'aluno', 'x_FREQUENCIA_LIVRO', 'FREQUENCIA_LIVRO', '`FREQUENCIA_LIVRO`', '`FREQUENCIA_LIVRO`', 3, -1, FALSE, '`FREQUENCIA_LIVRO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`aluno`";
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
			$this->ID_ALUNO->setDbValue($conn->Insert_ID());
			$rs['ID_ALUNO'] = $this->ID_ALUNO->DbValue;
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
			if (array_key_exists('ID_ALUNO', $rs))
				ew_AddFilter($where, ew_QuotedName('ID_ALUNO', $this->DBID) . '=' . ew_QuotedValue($rs['ID_ALUNO'], $this->ID_ALUNO->FldDataType, $this->DBID));
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
		return "`ID_ALUNO` = @ID_ALUNO@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->ID_ALUNO->CurrentValue))
			return "0=1"; // Invalid key
		if (is_null($this->ID_ALUNO->CurrentValue))
			return "0=1"; // Invalid key
		else
			$sKeyFilter = str_replace("@ID_ALUNO@", ew_AdjustSql($this->ID_ALUNO->CurrentValue, $this->DBID), $sKeyFilter); // Replace key value
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
			return "alunolist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	function GetModalCaption($pageName) {
		global $Language;
		if ($pageName == "alunoview.php")
			return $Language->Phrase("View");
		elseif ($pageName == "alunoedit.php")
			return $Language->Phrase("Edit");
		elseif ($pageName == "alunoadd.php")
			return $Language->Phrase("Add");
		else
			return "";
	}

	// List URL
	function GetListUrl() {
		return "alunolist.php";
	}

	// View URL
	function GetViewUrl($parm = "") {
		if ($parm <> "")
			$url = $this->KeyUrl("alunoview.php", $this->UrlParm($parm));
		else
			$url = $this->KeyUrl("alunoview.php", $this->UrlParm(EW_TABLE_SHOW_DETAIL . "="));
		return $this->AddMasterUrl($url);
	}

	// Add URL
	function GetAddUrl($parm = "") {
		if ($parm <> "")
			$url = "alunoadd.php?" . $this->UrlParm($parm);
		else
			$url = "alunoadd.php";
		return $this->AddMasterUrl($url);
	}

	// Edit URL
	function GetEditUrl($parm = "") {
		$url = $this->KeyUrl("alunoedit.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline edit URL
	function GetInlineEditUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
		return $this->AddMasterUrl($url);
	}

	// Copy URL
	function GetCopyUrl($parm = "") {
		$url = $this->KeyUrl("alunoadd.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline copy URL
	function GetInlineCopyUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
		return $this->AddMasterUrl($url);
	}

	// Delete URL
	function GetDeleteUrl() {
		return $this->KeyUrl("alunodelete.php", $this->UrlParm());
	}

	// Add master url
	function AddMasterUrl($url) {
		return $url;
	}

	function KeyToJson() {
		$json = "";
		$json .= "ID_ALUNO:" . ew_VarToJson($this->ID_ALUNO->CurrentValue, "number", "'");
		return "{" . $json . "}";
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->ID_ALUNO->CurrentValue)) {
			$sUrl .= "ID_ALUNO=" . urlencode($this->ID_ALUNO->CurrentValue);
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
			if ($isPost && isset($_POST["ID_ALUNO"]))
				$arKeys[] = $_POST["ID_ALUNO"];
			elseif (isset($_GET["ID_ALUNO"]))
				$arKeys[] = $_GET["ID_ALUNO"];
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
			$this->ID_ALUNO->CurrentValue = $key;
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
		$this->ID_ALUNO->setDbValue($rs->fields('ID_ALUNO'));
		$this->NOME_ALUNO->setDbValue($rs->fields('NOME_ALUNO'));
		$this->MATRICULA_ALUNO->setDbValue($rs->fields('MATRICULA_ALUNO'));
		$this->EMAIL_ALUNO->setDbValue($rs->fields('EMAIL_ALUNO'));
		$this->CPF_ALUNO->setDbValue($rs->fields('CPF_ALUNO'));
		$this->RG_ALUNO->setDbValue($rs->fields('RG_ALUNO'));
		$this->SEXO_ALUNO->setDbValue($rs->fields('SEXO_ALUNO'));
		$this->DATA_NASCIMENTO_ALUNO->setDbValue($rs->fields('DATA_NASCIMENTO_ALUNO'));
		$this->TURNO_ALUNO->setDbValue($rs->fields('TURNO_ALUNO'));
		$this->TELEFONE_ALUNO->setDbValue($rs->fields('TELEFONE_ALUNO'));
		$this->RECORD_ALUNO->setDbValue($rs->fields('RECORD_ALUNO'));
		$this->ID_NIVEL_ACESSO->setDbValue($rs->fields('ID_NIVEL_ACESSO'));
		$this->ANO_ALUNO->setDbValue($rs->fields('ANO_ALUNO'));
		$this->TURMA_ALUNO->setDbValue($rs->fields('TURMA_ALUNO'));
		$this->SALA_ALUNO->setDbValue($rs->fields('SALA_ALUNO'));
		$this->NUMERO_LIVROS->setDbValue($rs->fields('NUMERO_LIVROS'));
		$this->FREQUENCIA_LIVRO->setDbValue($rs->fields('FREQUENCIA_LIVRO'));
	}

	// Render list row values
	function RenderListRow() {
		global $Security, $gsLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

	// Common render codes
		// ID_ALUNO
		// NOME_ALUNO
		// MATRICULA_ALUNO
		// EMAIL_ALUNO
		// CPF_ALUNO
		// RG_ALUNO
		// SEXO_ALUNO
		// DATA_NASCIMENTO_ALUNO
		// TURNO_ALUNO
		// TELEFONE_ALUNO
		// RECORD_ALUNO
		// ID_NIVEL_ACESSO
		// ANO_ALUNO
		// TURMA_ALUNO
		// SALA_ALUNO
		// NUMERO_LIVROS
		// FREQUENCIA_LIVRO
		// ID_ALUNO

		$this->ID_ALUNO->ViewValue = $this->ID_ALUNO->CurrentValue;
		$this->ID_ALUNO->ViewCustomAttributes = "";

		// NOME_ALUNO
		$this->NOME_ALUNO->ViewValue = $this->NOME_ALUNO->CurrentValue;
		$this->NOME_ALUNO->ViewCustomAttributes = "";

		// MATRICULA_ALUNO
		$this->MATRICULA_ALUNO->ViewValue = $this->MATRICULA_ALUNO->CurrentValue;
		$this->MATRICULA_ALUNO->ViewCustomAttributes = "";

		// EMAIL_ALUNO
		$this->EMAIL_ALUNO->ViewValue = $this->EMAIL_ALUNO->CurrentValue;
		$this->EMAIL_ALUNO->ViewCustomAttributes = "";

		// CPF_ALUNO
		$this->CPF_ALUNO->ViewValue = $this->CPF_ALUNO->CurrentValue;
		$this->CPF_ALUNO->ViewCustomAttributes = "";

		// RG_ALUNO
		$this->RG_ALUNO->ViewValue = $this->RG_ALUNO->CurrentValue;
		$this->RG_ALUNO->ViewCustomAttributes = "";

		// SEXO_ALUNO
		$this->SEXO_ALUNO->ViewValue = $this->SEXO_ALUNO->CurrentValue;
		$this->SEXO_ALUNO->ViewCustomAttributes = "";

		// DATA_NASCIMENTO_ALUNO
		$this->DATA_NASCIMENTO_ALUNO->ViewValue = $this->DATA_NASCIMENTO_ALUNO->CurrentValue;
		$this->DATA_NASCIMENTO_ALUNO->ViewCustomAttributes = "";

		// TURNO_ALUNO
		$this->TURNO_ALUNO->ViewValue = $this->TURNO_ALUNO->CurrentValue;
		$this->TURNO_ALUNO->ViewCustomAttributes = "";

		// TELEFONE_ALUNO
		$this->TELEFONE_ALUNO->ViewValue = $this->TELEFONE_ALUNO->CurrentValue;
		$this->TELEFONE_ALUNO->ViewCustomAttributes = "";

		// RECORD_ALUNO
		$this->RECORD_ALUNO->ViewValue = $this->RECORD_ALUNO->CurrentValue;
		$this->RECORD_ALUNO->ViewCustomAttributes = "";

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->ViewValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->ID_NIVEL_ACESSO->ViewCustomAttributes = "";

		// ANO_ALUNO
		$this->ANO_ALUNO->ViewValue = $this->ANO_ALUNO->CurrentValue;
		$this->ANO_ALUNO->ViewCustomAttributes = "";

		// TURMA_ALUNO
		$this->TURMA_ALUNO->ViewValue = $this->TURMA_ALUNO->CurrentValue;
		$this->TURMA_ALUNO->ViewCustomAttributes = "";

		// SALA_ALUNO
		$this->SALA_ALUNO->ViewValue = $this->SALA_ALUNO->CurrentValue;
		$this->SALA_ALUNO->ViewCustomAttributes = "";

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS->ViewValue = $this->NUMERO_LIVROS->CurrentValue;
		$this->NUMERO_LIVROS->ViewCustomAttributes = "";

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->ViewValue = $this->FREQUENCIA_LIVRO->CurrentValue;
		$this->FREQUENCIA_LIVRO->ViewCustomAttributes = "";

		// ID_ALUNO
		$this->ID_ALUNO->LinkCustomAttributes = "";
		$this->ID_ALUNO->HrefValue = "";
		$this->ID_ALUNO->TooltipValue = "";

		// NOME_ALUNO
		$this->NOME_ALUNO->LinkCustomAttributes = "";
		$this->NOME_ALUNO->HrefValue = "";
		$this->NOME_ALUNO->TooltipValue = "";

		// MATRICULA_ALUNO
		$this->MATRICULA_ALUNO->LinkCustomAttributes = "";
		$this->MATRICULA_ALUNO->HrefValue = "";
		$this->MATRICULA_ALUNO->TooltipValue = "";

		// EMAIL_ALUNO
		$this->EMAIL_ALUNO->LinkCustomAttributes = "";
		$this->EMAIL_ALUNO->HrefValue = "";
		$this->EMAIL_ALUNO->TooltipValue = "";

		// CPF_ALUNO
		$this->CPF_ALUNO->LinkCustomAttributes = "";
		$this->CPF_ALUNO->HrefValue = "";
		$this->CPF_ALUNO->TooltipValue = "";

		// RG_ALUNO
		$this->RG_ALUNO->LinkCustomAttributes = "";
		$this->RG_ALUNO->HrefValue = "";
		$this->RG_ALUNO->TooltipValue = "";

		// SEXO_ALUNO
		$this->SEXO_ALUNO->LinkCustomAttributes = "";
		$this->SEXO_ALUNO->HrefValue = "";
		$this->SEXO_ALUNO->TooltipValue = "";

		// DATA_NASCIMENTO_ALUNO
		$this->DATA_NASCIMENTO_ALUNO->LinkCustomAttributes = "";
		$this->DATA_NASCIMENTO_ALUNO->HrefValue = "";
		$this->DATA_NASCIMENTO_ALUNO->TooltipValue = "";

		// TURNO_ALUNO
		$this->TURNO_ALUNO->LinkCustomAttributes = "";
		$this->TURNO_ALUNO->HrefValue = "";
		$this->TURNO_ALUNO->TooltipValue = "";

		// TELEFONE_ALUNO
		$this->TELEFONE_ALUNO->LinkCustomAttributes = "";
		$this->TELEFONE_ALUNO->HrefValue = "";
		$this->TELEFONE_ALUNO->TooltipValue = "";

		// RECORD_ALUNO
		$this->RECORD_ALUNO->LinkCustomAttributes = "";
		$this->RECORD_ALUNO->HrefValue = "";
		$this->RECORD_ALUNO->TooltipValue = "";

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->LinkCustomAttributes = "";
		$this->ID_NIVEL_ACESSO->HrefValue = "";
		$this->ID_NIVEL_ACESSO->TooltipValue = "";

		// ANO_ALUNO
		$this->ANO_ALUNO->LinkCustomAttributes = "";
		$this->ANO_ALUNO->HrefValue = "";
		$this->ANO_ALUNO->TooltipValue = "";

		// TURMA_ALUNO
		$this->TURMA_ALUNO->LinkCustomAttributes = "";
		$this->TURMA_ALUNO->HrefValue = "";
		$this->TURMA_ALUNO->TooltipValue = "";

		// SALA_ALUNO
		$this->SALA_ALUNO->LinkCustomAttributes = "";
		$this->SALA_ALUNO->HrefValue = "";
		$this->SALA_ALUNO->TooltipValue = "";

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

		// ID_ALUNO
		$this->ID_ALUNO->EditAttrs["class"] = "form-control";
		$this->ID_ALUNO->EditCustomAttributes = "";
		$this->ID_ALUNO->EditValue = $this->ID_ALUNO->CurrentValue;
		$this->ID_ALUNO->ViewCustomAttributes = "";

		// NOME_ALUNO
		$this->NOME_ALUNO->EditAttrs["class"] = "form-control";
		$this->NOME_ALUNO->EditCustomAttributes = "";
		$this->NOME_ALUNO->EditValue = $this->NOME_ALUNO->CurrentValue;
		$this->NOME_ALUNO->PlaceHolder = ew_RemoveHtml($this->NOME_ALUNO->FldCaption());

		// MATRICULA_ALUNO
		$this->MATRICULA_ALUNO->EditAttrs["class"] = "form-control";
		$this->MATRICULA_ALUNO->EditCustomAttributes = "";
		$this->MATRICULA_ALUNO->EditValue = $this->MATRICULA_ALUNO->CurrentValue;
		$this->MATRICULA_ALUNO->PlaceHolder = ew_RemoveHtml($this->MATRICULA_ALUNO->FldCaption());

		// EMAIL_ALUNO
		$this->EMAIL_ALUNO->EditAttrs["class"] = "form-control";
		$this->EMAIL_ALUNO->EditCustomAttributes = "";
		$this->EMAIL_ALUNO->EditValue = $this->EMAIL_ALUNO->CurrentValue;
		$this->EMAIL_ALUNO->PlaceHolder = ew_RemoveHtml($this->EMAIL_ALUNO->FldCaption());

		// CPF_ALUNO
		$this->CPF_ALUNO->EditAttrs["class"] = "form-control";
		$this->CPF_ALUNO->EditCustomAttributes = "";
		$this->CPF_ALUNO->EditValue = $this->CPF_ALUNO->CurrentValue;
		$this->CPF_ALUNO->PlaceHolder = ew_RemoveHtml($this->CPF_ALUNO->FldCaption());

		// RG_ALUNO
		$this->RG_ALUNO->EditAttrs["class"] = "form-control";
		$this->RG_ALUNO->EditCustomAttributes = "";
		$this->RG_ALUNO->EditValue = $this->RG_ALUNO->CurrentValue;
		$this->RG_ALUNO->PlaceHolder = ew_RemoveHtml($this->RG_ALUNO->FldCaption());

		// SEXO_ALUNO
		$this->SEXO_ALUNO->EditAttrs["class"] = "form-control";
		$this->SEXO_ALUNO->EditCustomAttributes = "";
		$this->SEXO_ALUNO->EditValue = $this->SEXO_ALUNO->CurrentValue;
		$this->SEXO_ALUNO->PlaceHolder = ew_RemoveHtml($this->SEXO_ALUNO->FldCaption());

		// DATA_NASCIMENTO_ALUNO
		$this->DATA_NASCIMENTO_ALUNO->EditAttrs["class"] = "form-control";
		$this->DATA_NASCIMENTO_ALUNO->EditCustomAttributes = "";
		$this->DATA_NASCIMENTO_ALUNO->EditValue = $this->DATA_NASCIMENTO_ALUNO->CurrentValue;
		$this->DATA_NASCIMENTO_ALUNO->PlaceHolder = ew_RemoveHtml($this->DATA_NASCIMENTO_ALUNO->FldCaption());

		// TURNO_ALUNO
		$this->TURNO_ALUNO->EditAttrs["class"] = "form-control";
		$this->TURNO_ALUNO->EditCustomAttributes = "";
		$this->TURNO_ALUNO->EditValue = $this->TURNO_ALUNO->CurrentValue;
		$this->TURNO_ALUNO->PlaceHolder = ew_RemoveHtml($this->TURNO_ALUNO->FldCaption());

		// TELEFONE_ALUNO
		$this->TELEFONE_ALUNO->EditAttrs["class"] = "form-control";
		$this->TELEFONE_ALUNO->EditCustomAttributes = "";
		$this->TELEFONE_ALUNO->EditValue = $this->TELEFONE_ALUNO->CurrentValue;
		$this->TELEFONE_ALUNO->PlaceHolder = ew_RemoveHtml($this->TELEFONE_ALUNO->FldCaption());

		// RECORD_ALUNO
		$this->RECORD_ALUNO->EditAttrs["class"] = "form-control";
		$this->RECORD_ALUNO->EditCustomAttributes = "";
		$this->RECORD_ALUNO->EditValue = $this->RECORD_ALUNO->CurrentValue;
		$this->RECORD_ALUNO->PlaceHolder = ew_RemoveHtml($this->RECORD_ALUNO->FldCaption());

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->EditAttrs["class"] = "form-control";
		$this->ID_NIVEL_ACESSO->EditCustomAttributes = "";
		$this->ID_NIVEL_ACESSO->EditValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->ID_NIVEL_ACESSO->PlaceHolder = ew_RemoveHtml($this->ID_NIVEL_ACESSO->FldCaption());

		// ANO_ALUNO
		$this->ANO_ALUNO->EditAttrs["class"] = "form-control";
		$this->ANO_ALUNO->EditCustomAttributes = "";
		$this->ANO_ALUNO->EditValue = $this->ANO_ALUNO->CurrentValue;
		$this->ANO_ALUNO->PlaceHolder = ew_RemoveHtml($this->ANO_ALUNO->FldCaption());

		// TURMA_ALUNO
		$this->TURMA_ALUNO->EditAttrs["class"] = "form-control";
		$this->TURMA_ALUNO->EditCustomAttributes = "";
		$this->TURMA_ALUNO->EditValue = $this->TURMA_ALUNO->CurrentValue;
		$this->TURMA_ALUNO->PlaceHolder = ew_RemoveHtml($this->TURMA_ALUNO->FldCaption());

		// SALA_ALUNO
		$this->SALA_ALUNO->EditAttrs["class"] = "form-control";
		$this->SALA_ALUNO->EditCustomAttributes = "";
		$this->SALA_ALUNO->EditValue = $this->SALA_ALUNO->CurrentValue;
		$this->SALA_ALUNO->PlaceHolder = ew_RemoveHtml($this->SALA_ALUNO->FldCaption());

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
					if ($this->ID_ALUNO->Exportable) $Doc->ExportCaption($this->ID_ALUNO);
					if ($this->NOME_ALUNO->Exportable) $Doc->ExportCaption($this->NOME_ALUNO);
					if ($this->MATRICULA_ALUNO->Exportable) $Doc->ExportCaption($this->MATRICULA_ALUNO);
					if ($this->EMAIL_ALUNO->Exportable) $Doc->ExportCaption($this->EMAIL_ALUNO);
					if ($this->CPF_ALUNO->Exportable) $Doc->ExportCaption($this->CPF_ALUNO);
					if ($this->RG_ALUNO->Exportable) $Doc->ExportCaption($this->RG_ALUNO);
					if ($this->SEXO_ALUNO->Exportable) $Doc->ExportCaption($this->SEXO_ALUNO);
					if ($this->DATA_NASCIMENTO_ALUNO->Exportable) $Doc->ExportCaption($this->DATA_NASCIMENTO_ALUNO);
					if ($this->TURNO_ALUNO->Exportable) $Doc->ExportCaption($this->TURNO_ALUNO);
					if ($this->TELEFONE_ALUNO->Exportable) $Doc->ExportCaption($this->TELEFONE_ALUNO);
					if ($this->RECORD_ALUNO->Exportable) $Doc->ExportCaption($this->RECORD_ALUNO);
					if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportCaption($this->ID_NIVEL_ACESSO);
					if ($this->ANO_ALUNO->Exportable) $Doc->ExportCaption($this->ANO_ALUNO);
					if ($this->TURMA_ALUNO->Exportable) $Doc->ExportCaption($this->TURMA_ALUNO);
					if ($this->SALA_ALUNO->Exportable) $Doc->ExportCaption($this->SALA_ALUNO);
					if ($this->NUMERO_LIVROS->Exportable) $Doc->ExportCaption($this->NUMERO_LIVROS);
					if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportCaption($this->FREQUENCIA_LIVRO);
				} else {
					if ($this->ID_ALUNO->Exportable) $Doc->ExportCaption($this->ID_ALUNO);
					if ($this->NOME_ALUNO->Exportable) $Doc->ExportCaption($this->NOME_ALUNO);
					if ($this->MATRICULA_ALUNO->Exportable) $Doc->ExportCaption($this->MATRICULA_ALUNO);
					if ($this->EMAIL_ALUNO->Exportable) $Doc->ExportCaption($this->EMAIL_ALUNO);
					if ($this->CPF_ALUNO->Exportable) $Doc->ExportCaption($this->CPF_ALUNO);
					if ($this->RG_ALUNO->Exportable) $Doc->ExportCaption($this->RG_ALUNO);
					if ($this->SEXO_ALUNO->Exportable) $Doc->ExportCaption($this->SEXO_ALUNO);
					if ($this->DATA_NASCIMENTO_ALUNO->Exportable) $Doc->ExportCaption($this->DATA_NASCIMENTO_ALUNO);
					if ($this->TURNO_ALUNO->Exportable) $Doc->ExportCaption($this->TURNO_ALUNO);
					if ($this->TELEFONE_ALUNO->Exportable) $Doc->ExportCaption($this->TELEFONE_ALUNO);
					if ($this->RECORD_ALUNO->Exportable) $Doc->ExportCaption($this->RECORD_ALUNO);
					if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportCaption($this->ID_NIVEL_ACESSO);
					if ($this->ANO_ALUNO->Exportable) $Doc->ExportCaption($this->ANO_ALUNO);
					if ($this->TURMA_ALUNO->Exportable) $Doc->ExportCaption($this->TURMA_ALUNO);
					if ($this->SALA_ALUNO->Exportable) $Doc->ExportCaption($this->SALA_ALUNO);
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
						if ($this->ID_ALUNO->Exportable) $Doc->ExportField($this->ID_ALUNO);
						if ($this->NOME_ALUNO->Exportable) $Doc->ExportField($this->NOME_ALUNO);
						if ($this->MATRICULA_ALUNO->Exportable) $Doc->ExportField($this->MATRICULA_ALUNO);
						if ($this->EMAIL_ALUNO->Exportable) $Doc->ExportField($this->EMAIL_ALUNO);
						if ($this->CPF_ALUNO->Exportable) $Doc->ExportField($this->CPF_ALUNO);
						if ($this->RG_ALUNO->Exportable) $Doc->ExportField($this->RG_ALUNO);
						if ($this->SEXO_ALUNO->Exportable) $Doc->ExportField($this->SEXO_ALUNO);
						if ($this->DATA_NASCIMENTO_ALUNO->Exportable) $Doc->ExportField($this->DATA_NASCIMENTO_ALUNO);
						if ($this->TURNO_ALUNO->Exportable) $Doc->ExportField($this->TURNO_ALUNO);
						if ($this->TELEFONE_ALUNO->Exportable) $Doc->ExportField($this->TELEFONE_ALUNO);
						if ($this->RECORD_ALUNO->Exportable) $Doc->ExportField($this->RECORD_ALUNO);
						if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportField($this->ID_NIVEL_ACESSO);
						if ($this->ANO_ALUNO->Exportable) $Doc->ExportField($this->ANO_ALUNO);
						if ($this->TURMA_ALUNO->Exportable) $Doc->ExportField($this->TURMA_ALUNO);
						if ($this->SALA_ALUNO->Exportable) $Doc->ExportField($this->SALA_ALUNO);
						if ($this->NUMERO_LIVROS->Exportable) $Doc->ExportField($this->NUMERO_LIVROS);
						if ($this->FREQUENCIA_LIVRO->Exportable) $Doc->ExportField($this->FREQUENCIA_LIVRO);
					} else {
						if ($this->ID_ALUNO->Exportable) $Doc->ExportField($this->ID_ALUNO);
						if ($this->NOME_ALUNO->Exportable) $Doc->ExportField($this->NOME_ALUNO);
						if ($this->MATRICULA_ALUNO->Exportable) $Doc->ExportField($this->MATRICULA_ALUNO);
						if ($this->EMAIL_ALUNO->Exportable) $Doc->ExportField($this->EMAIL_ALUNO);
						if ($this->CPF_ALUNO->Exportable) $Doc->ExportField($this->CPF_ALUNO);
						if ($this->RG_ALUNO->Exportable) $Doc->ExportField($this->RG_ALUNO);
						if ($this->SEXO_ALUNO->Exportable) $Doc->ExportField($this->SEXO_ALUNO);
						if ($this->DATA_NASCIMENTO_ALUNO->Exportable) $Doc->ExportField($this->DATA_NASCIMENTO_ALUNO);
						if ($this->TURNO_ALUNO->Exportable) $Doc->ExportField($this->TURNO_ALUNO);
						if ($this->TELEFONE_ALUNO->Exportable) $Doc->ExportField($this->TELEFONE_ALUNO);
						if ($this->RECORD_ALUNO->Exportable) $Doc->ExportField($this->RECORD_ALUNO);
						if ($this->ID_NIVEL_ACESSO->Exportable) $Doc->ExportField($this->ID_NIVEL_ACESSO);
						if ($this->ANO_ALUNO->Exportable) $Doc->ExportField($this->ANO_ALUNO);
						if ($this->TURMA_ALUNO->Exportable) $Doc->ExportField($this->TURMA_ALUNO);
						if ($this->SALA_ALUNO->Exportable) $Doc->ExportField($this->SALA_ALUNO);
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
