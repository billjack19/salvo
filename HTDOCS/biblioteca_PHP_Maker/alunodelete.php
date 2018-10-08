<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "alunoinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$aluno_delete = NULL; // Initialize page object first

class caluno_delete extends caluno {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'aluno';

	// Page object name
	var $PageObjName = 'aluno_delete';

	// Page headings
	var $Heading = '';
	var $Subheading = '';

	// Page heading
	function PageHeading() {
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "TableCaption"))
			return $this->TableCaption();
		return "";
	}

	// Page subheading
	function PageSubheading() {
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->Phrase($this->PageID);
		return "";
	}

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		if ($this->UseTokenInUrl) $PageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EW_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EW_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_SUCCESS_MESSAGE], $v);
	}

	function getWarningMessage() {
		return @$_SESSION[EW_SESSION_WARNING_MESSAGE];
	}

	function setWarningMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_WARNING_MESSAGE], $v);
	}

	// Methods to clear message
	function ClearMessage() {
		$_SESSION[EW_SESSION_MESSAGE] = "";
	}

	function ClearFailureMessage() {
		$_SESSION[EW_SESSION_FAILURE_MESSAGE] = "";
	}

	function ClearSuccessMessage() {
		$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = "";
	}

	function ClearWarningMessage() {
		$_SESSION[EW_SESSION_WARNING_MESSAGE] = "";
	}

	function ClearMessages() {
		$_SESSION[EW_SESSION_MESSAGE] = "";
		$_SESSION[EW_SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[EW_SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	function ShowMessage() {
		$hidden = FALSE;
		$html = "";

		// Message
		$sMessage = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sMessage;
			$html .= "<div class=\"alert alert-info ewInfo\">" . $sMessage . "</div>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$sWarningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sWarningMessage, "warning");
		if ($sWarningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sWarningMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sWarningMessage;
			$html .= "<div class=\"alert alert-warning ewWarning\">" . $sWarningMessage . "</div>";
			$_SESSION[EW_SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sSuccessMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sSuccessMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sSuccessMessage . "</div>";
			$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sErrorMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sErrorMessage;
			$html .= "<div class=\"alert alert-danger ewError\">" . $sErrorMessage . "</div>";
			$_SESSION[EW_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo "<div class=\"ewMessageDialog\"" . (($hidden) ? " style=\"display: none;\"" : "") . ">" . $html . "</div>";
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p>" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Footer exists, display
			echo "<p>" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm;
		if ($this->UseTokenInUrl) {
			if ($objForm)
				return ($this->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($this->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}
	var $Token = "";
	var $TokenTimeout = 0;
	var $CheckToken = EW_CHECK_TOKEN;
	var $CheckTokenFn = "ew_CheckToken";
	var $CreateTokenFn = "ew_CreateToken";

	// Valid Post
	function ValidPost() {
		if (!$this->CheckToken || !ew_IsPost())
			return TRUE;
		if (!isset($_POST[EW_TOKEN_NAME]))
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn($_POST[EW_TOKEN_NAME], $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	function CreateToken() {
		global $gsToken;
		if ($this->CheckToken) {
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$gsToken = $this->Token; // Save to global variable
		}
	}

	//
	// Page class constructor
	//
	function __construct() {
		global $conn, $Language;
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = ew_SessionTimeoutTime();

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Parent constuctor
		parent::__construct();

		// Table object (aluno)
		if (!isset($GLOBALS["aluno"]) || get_class($GLOBALS["aluno"]) == "caluno") {
			$GLOBALS["aluno"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["aluno"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'aluno', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"]))
			$GLOBALS["gTimer"] = new cTimer();

		// Debug message
		ew_LoadDebugMsg();

		// Open connection
		if (!isset($conn))
			$conn = ew_Connect($this->DBID);
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsCustomExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
		$this->ID_ALUNO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_ALUNO->Visible = FALSE;
		$this->NOME_ALUNO->SetVisibility();
		$this->MATRICULA_ALUNO->SetVisibility();
		$this->EMAIL_ALUNO->SetVisibility();
		$this->CPF_ALUNO->SetVisibility();
		$this->RG_ALUNO->SetVisibility();
		$this->SEXO_ALUNO->SetVisibility();
		$this->DATA_NASCIMENTO_ALUNO->SetVisibility();
		$this->TURNO_ALUNO->SetVisibility();
		$this->TELEFONE_ALUNO->SetVisibility();
		$this->RECORD_ALUNO->SetVisibility();
		$this->ID_NIVEL_ACESSO->SetVisibility();
		$this->ANO_ALUNO->SetVisibility();
		$this->TURMA_ALUNO->SetVisibility();
		$this->SALA_ALUNO->SetVisibility();
		$this->NUMERO_LIVROS->SetVisibility();
		$this->FREQUENCIA_LIVRO->SetVisibility();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->ValidPost()) {
			echo $Language->Phrase("InvalidPostRequest");
			$this->Page_Terminate();
			exit();
		}

		// Create Token
		$this->CreateToken();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $gsExportFile, $gTmpImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EW_EXPORT, $aluno;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($aluno);
				$doc->Text = $sContent;
				if ($this->Export == "email")
					echo $this->ExportEmail($doc->Text);
				else
					$doc->Export();
				ew_DeleteTmpImages(); // Delete temp images
				exit();
			}
		}
		$this->Page_Redirecting($url);

		// Close connection
		ew_CloseConn();

		// Go to URL if specified
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			ew_SaveDebugMsg();
			header("Location: " . $url);
		}
		exit();
	}
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $StartRec;
	var $TotalRecs = 0;
	var $RecCnt;
	var $RecKeys = array();
	var $Recordset;
	var $StartRowCnt = 1;
	var $RowCnt = 0;

	//
	// Page main
	//
	function Page_Main() {
		global $Language;

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->GetRecordKeys(); // Load record keys
		$sFilter = $this->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("alunolist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in aluno class, alunoinfo.php

		$this->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$this->CurrentAction = $_POST["a_delete"];
		} elseif (@$_GET["a_delete"] == "1") {
			$this->CurrentAction = "D"; // Delete record directly
		} else {
			$this->CurrentAction = "I"; // Display record
		}
		if ($this->CurrentAction == "D") {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->DeleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
				$this->Page_Terminate($this->getReturnUrl()); // Return to caller
			} else { // Delete failed
				$this->CurrentAction = "I"; // Display record
			}
		}
		if ($this->CurrentAction == "I") { // Load records for display
			if ($this->Recordset = $this->LoadRecordset())
				$this->TotalRecs = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecs <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->Close();
				$this->Page_Terminate("alunolist.php"); // Return to list
			}
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {

		// Load List page SQL
		$sSql = $this->ListSQL();
		$conn = &$this->Connection();

		// Load recordset
		$dbtype = ew_GetConnectionType($this->DBID);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->SelectLimit($sSql, $rowcnt, $offset, array("_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())));
			} else {
				$rs = $conn->SelectLimit($sSql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = ew_LoadRecordset($sSql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $Security, $Language;
		$sFilter = $this->KeyFilter();

		// Call Row Selecting event
		$this->Row_Selecting($sFilter);

		// Load SQL based on filter
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$conn = &$this->Connection();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues($rs = NULL) {
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->NewRow(); 

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->ID_ALUNO->setDbValue($row['ID_ALUNO']);
		$this->NOME_ALUNO->setDbValue($row['NOME_ALUNO']);
		$this->MATRICULA_ALUNO->setDbValue($row['MATRICULA_ALUNO']);
		$this->EMAIL_ALUNO->setDbValue($row['EMAIL_ALUNO']);
		$this->CPF_ALUNO->setDbValue($row['CPF_ALUNO']);
		$this->RG_ALUNO->setDbValue($row['RG_ALUNO']);
		$this->SEXO_ALUNO->setDbValue($row['SEXO_ALUNO']);
		$this->DATA_NASCIMENTO_ALUNO->setDbValue($row['DATA_NASCIMENTO_ALUNO']);
		$this->TURNO_ALUNO->setDbValue($row['TURNO_ALUNO']);
		$this->TELEFONE_ALUNO->setDbValue($row['TELEFONE_ALUNO']);
		$this->RECORD_ALUNO->setDbValue($row['RECORD_ALUNO']);
		$this->ID_NIVEL_ACESSO->setDbValue($row['ID_NIVEL_ACESSO']);
		$this->ANO_ALUNO->setDbValue($row['ANO_ALUNO']);
		$this->TURMA_ALUNO->setDbValue($row['TURMA_ALUNO']);
		$this->SALA_ALUNO->setDbValue($row['SALA_ALUNO']);
		$this->NUMERO_LIVROS->setDbValue($row['NUMERO_LIVROS']);
		$this->FREQUENCIA_LIVRO->setDbValue($row['FREQUENCIA_LIVRO']);
	}

	// Return a row with default values
	function NewRow() {
		$row = array();
		$row['ID_ALUNO'] = NULL;
		$row['NOME_ALUNO'] = NULL;
		$row['MATRICULA_ALUNO'] = NULL;
		$row['EMAIL_ALUNO'] = NULL;
		$row['CPF_ALUNO'] = NULL;
		$row['RG_ALUNO'] = NULL;
		$row['SEXO_ALUNO'] = NULL;
		$row['DATA_NASCIMENTO_ALUNO'] = NULL;
		$row['TURNO_ALUNO'] = NULL;
		$row['TELEFONE_ALUNO'] = NULL;
		$row['RECORD_ALUNO'] = NULL;
		$row['ID_NIVEL_ACESSO'] = NULL;
		$row['ANO_ALUNO'] = NULL;
		$row['TURMA_ALUNO'] = NULL;
		$row['SALA_ALUNO'] = NULL;
		$row['NUMERO_LIVROS'] = NULL;
		$row['FREQUENCIA_LIVRO'] = NULL;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_ALUNO->DbValue = $row['ID_ALUNO'];
		$this->NOME_ALUNO->DbValue = $row['NOME_ALUNO'];
		$this->MATRICULA_ALUNO->DbValue = $row['MATRICULA_ALUNO'];
		$this->EMAIL_ALUNO->DbValue = $row['EMAIL_ALUNO'];
		$this->CPF_ALUNO->DbValue = $row['CPF_ALUNO'];
		$this->RG_ALUNO->DbValue = $row['RG_ALUNO'];
		$this->SEXO_ALUNO->DbValue = $row['SEXO_ALUNO'];
		$this->DATA_NASCIMENTO_ALUNO->DbValue = $row['DATA_NASCIMENTO_ALUNO'];
		$this->TURNO_ALUNO->DbValue = $row['TURNO_ALUNO'];
		$this->TELEFONE_ALUNO->DbValue = $row['TELEFONE_ALUNO'];
		$this->RECORD_ALUNO->DbValue = $row['RECORD_ALUNO'];
		$this->ID_NIVEL_ACESSO->DbValue = $row['ID_NIVEL_ACESSO'];
		$this->ANO_ALUNO->DbValue = $row['ANO_ALUNO'];
		$this->TURMA_ALUNO->DbValue = $row['TURMA_ALUNO'];
		$this->SALA_ALUNO->DbValue = $row['SALA_ALUNO'];
		$this->NUMERO_LIVROS->DbValue = $row['NUMERO_LIVROS'];
		$this->FREQUENCIA_LIVRO->DbValue = $row['FREQUENCIA_LIVRO'];
	}

	// Render row values based on field settings
	function RenderRow() {
		global $Security, $Language, $gsLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

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
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $Language, $Security;
		$DeleteRows = TRUE;
		$sSql = $this->SQL();
		$conn = &$this->Connection();
		$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->GetRows() : array();
		$conn->BeginTrans();

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $this->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= $GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"];
				$sThisKey .= $row['ID_ALUNO'];
				$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
				$DeleteRows = $this->Delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		}
		if (!$DeleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$url = substr(ew_CurrentUrl(), strrpos(ew_CurrentUrl(), "/")+1);
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("alunolist.php"), "", $this->TableVar, TRUE);
		$PageId = "delete";
		$Breadcrumb->Add("delete", $PageId, $url);
	}

	// Setup lookup filters of a field
	function SetupLookupFilters($fld, $pageId = null) {
		global $gsLanguage;
		$pageId = $pageId ?: $this->PageID;
		switch ($fld->FldVar) {
		}
	}

	// Setup AutoSuggest filters of a field
	function SetupAutoSuggestFilters($fld, $pageId = null) {
		global $gsLanguage;
		$pageId = $pageId ?: $this->PageID;
		switch ($fld->FldVar) {
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}
}
?>
<?php ew_Header(TRUE) ?>
<?php

// Create page object
if (!isset($aluno_delete)) $aluno_delete = new caluno_delete();

// Page init
$aluno_delete->Page_Init();

// Page main
$aluno_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aluno_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "delete";
var CurrentForm = falunodelete = new ew_Form("falunodelete", "delete");

// Form_CustomValidate event
falunodelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
falunodelete.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $aluno_delete->ShowPageHeader(); ?>
<?php
$aluno_delete->ShowMessage();
?>
<form name="falunodelete" id="falunodelete" class="form-inline ewForm ewDeleteForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($aluno_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $aluno_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="aluno">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($aluno_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="box ewBox ewGrid">
<div class="<?php if (ew_IsResponsiveLayout()) { ?>table-responsive <?php } ?>ewGridMiddlePanel">
<table class="table ewTable">
	<thead>
	<tr class="ewTableHeader">
<?php if ($aluno->ID_ALUNO->Visible) { // ID_ALUNO ?>
		<th class="<?php echo $aluno->ID_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_ID_ALUNO" class="aluno_ID_ALUNO"><?php echo $aluno->ID_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->NOME_ALUNO->Visible) { // NOME_ALUNO ?>
		<th class="<?php echo $aluno->NOME_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_NOME_ALUNO" class="aluno_NOME_ALUNO"><?php echo $aluno->NOME_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->MATRICULA_ALUNO->Visible) { // MATRICULA_ALUNO ?>
		<th class="<?php echo $aluno->MATRICULA_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_MATRICULA_ALUNO" class="aluno_MATRICULA_ALUNO"><?php echo $aluno->MATRICULA_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->EMAIL_ALUNO->Visible) { // EMAIL_ALUNO ?>
		<th class="<?php echo $aluno->EMAIL_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_EMAIL_ALUNO" class="aluno_EMAIL_ALUNO"><?php echo $aluno->EMAIL_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->CPF_ALUNO->Visible) { // CPF_ALUNO ?>
		<th class="<?php echo $aluno->CPF_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_CPF_ALUNO" class="aluno_CPF_ALUNO"><?php echo $aluno->CPF_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->RG_ALUNO->Visible) { // RG_ALUNO ?>
		<th class="<?php echo $aluno->RG_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_RG_ALUNO" class="aluno_RG_ALUNO"><?php echo $aluno->RG_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->SEXO_ALUNO->Visible) { // SEXO_ALUNO ?>
		<th class="<?php echo $aluno->SEXO_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_SEXO_ALUNO" class="aluno_SEXO_ALUNO"><?php echo $aluno->SEXO_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->DATA_NASCIMENTO_ALUNO->Visible) { // DATA_NASCIMENTO_ALUNO ?>
		<th class="<?php echo $aluno->DATA_NASCIMENTO_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_DATA_NASCIMENTO_ALUNO" class="aluno_DATA_NASCIMENTO_ALUNO"><?php echo $aluno->DATA_NASCIMENTO_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->TURNO_ALUNO->Visible) { // TURNO_ALUNO ?>
		<th class="<?php echo $aluno->TURNO_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_TURNO_ALUNO" class="aluno_TURNO_ALUNO"><?php echo $aluno->TURNO_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->TELEFONE_ALUNO->Visible) { // TELEFONE_ALUNO ?>
		<th class="<?php echo $aluno->TELEFONE_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_TELEFONE_ALUNO" class="aluno_TELEFONE_ALUNO"><?php echo $aluno->TELEFONE_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->RECORD_ALUNO->Visible) { // RECORD_ALUNO ?>
		<th class="<?php echo $aluno->RECORD_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_RECORD_ALUNO" class="aluno_RECORD_ALUNO"><?php echo $aluno->RECORD_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
		<th class="<?php echo $aluno->ID_NIVEL_ACESSO->HeaderCellClass() ?>"><span id="elh_aluno_ID_NIVEL_ACESSO" class="aluno_ID_NIVEL_ACESSO"><?php echo $aluno->ID_NIVEL_ACESSO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->ANO_ALUNO->Visible) { // ANO_ALUNO ?>
		<th class="<?php echo $aluno->ANO_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_ANO_ALUNO" class="aluno_ANO_ALUNO"><?php echo $aluno->ANO_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->TURMA_ALUNO->Visible) { // TURMA_ALUNO ?>
		<th class="<?php echo $aluno->TURMA_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_TURMA_ALUNO" class="aluno_TURMA_ALUNO"><?php echo $aluno->TURMA_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->SALA_ALUNO->Visible) { // SALA_ALUNO ?>
		<th class="<?php echo $aluno->SALA_ALUNO->HeaderCellClass() ?>"><span id="elh_aluno_SALA_ALUNO" class="aluno_SALA_ALUNO"><?php echo $aluno->SALA_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
		<th class="<?php echo $aluno->NUMERO_LIVROS->HeaderCellClass() ?>"><span id="elh_aluno_NUMERO_LIVROS" class="aluno_NUMERO_LIVROS"><?php echo $aluno->NUMERO_LIVROS->FldCaption() ?></span></th>
<?php } ?>
<?php if ($aluno->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
		<th class="<?php echo $aluno->FREQUENCIA_LIVRO->HeaderCellClass() ?>"><span id="elh_aluno_FREQUENCIA_LIVRO" class="aluno_FREQUENCIA_LIVRO"><?php echo $aluno->FREQUENCIA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$aluno_delete->RecCnt = 0;
$i = 0;
while (!$aluno_delete->Recordset->EOF) {
	$aluno_delete->RecCnt++;
	$aluno_delete->RowCnt++;

	// Set row properties
	$aluno->ResetAttrs();
	$aluno->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$aluno_delete->LoadRowValues($aluno_delete->Recordset);

	// Render row
	$aluno_delete->RenderRow();
?>
	<tr<?php echo $aluno->RowAttributes() ?>>
<?php if ($aluno->ID_ALUNO->Visible) { // ID_ALUNO ?>
		<td<?php echo $aluno->ID_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_ID_ALUNO" class="aluno_ID_ALUNO">
<span<?php echo $aluno->ID_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->ID_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->NOME_ALUNO->Visible) { // NOME_ALUNO ?>
		<td<?php echo $aluno->NOME_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_NOME_ALUNO" class="aluno_NOME_ALUNO">
<span<?php echo $aluno->NOME_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->NOME_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->MATRICULA_ALUNO->Visible) { // MATRICULA_ALUNO ?>
		<td<?php echo $aluno->MATRICULA_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_MATRICULA_ALUNO" class="aluno_MATRICULA_ALUNO">
<span<?php echo $aluno->MATRICULA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->MATRICULA_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->EMAIL_ALUNO->Visible) { // EMAIL_ALUNO ?>
		<td<?php echo $aluno->EMAIL_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_EMAIL_ALUNO" class="aluno_EMAIL_ALUNO">
<span<?php echo $aluno->EMAIL_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->EMAIL_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->CPF_ALUNO->Visible) { // CPF_ALUNO ?>
		<td<?php echo $aluno->CPF_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_CPF_ALUNO" class="aluno_CPF_ALUNO">
<span<?php echo $aluno->CPF_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->CPF_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->RG_ALUNO->Visible) { // RG_ALUNO ?>
		<td<?php echo $aluno->RG_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_RG_ALUNO" class="aluno_RG_ALUNO">
<span<?php echo $aluno->RG_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->RG_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->SEXO_ALUNO->Visible) { // SEXO_ALUNO ?>
		<td<?php echo $aluno->SEXO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_SEXO_ALUNO" class="aluno_SEXO_ALUNO">
<span<?php echo $aluno->SEXO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->SEXO_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->DATA_NASCIMENTO_ALUNO->Visible) { // DATA_NASCIMENTO_ALUNO ?>
		<td<?php echo $aluno->DATA_NASCIMENTO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_DATA_NASCIMENTO_ALUNO" class="aluno_DATA_NASCIMENTO_ALUNO">
<span<?php echo $aluno->DATA_NASCIMENTO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->DATA_NASCIMENTO_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->TURNO_ALUNO->Visible) { // TURNO_ALUNO ?>
		<td<?php echo $aluno->TURNO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_TURNO_ALUNO" class="aluno_TURNO_ALUNO">
<span<?php echo $aluno->TURNO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TURNO_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->TELEFONE_ALUNO->Visible) { // TELEFONE_ALUNO ?>
		<td<?php echo $aluno->TELEFONE_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_TELEFONE_ALUNO" class="aluno_TELEFONE_ALUNO">
<span<?php echo $aluno->TELEFONE_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TELEFONE_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->RECORD_ALUNO->Visible) { // RECORD_ALUNO ?>
		<td<?php echo $aluno->RECORD_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_RECORD_ALUNO" class="aluno_RECORD_ALUNO">
<span<?php echo $aluno->RECORD_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->RECORD_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
		<td<?php echo $aluno->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_ID_NIVEL_ACESSO" class="aluno_ID_NIVEL_ACESSO">
<span<?php echo $aluno->ID_NIVEL_ACESSO->ViewAttributes() ?>>
<?php echo $aluno->ID_NIVEL_ACESSO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->ANO_ALUNO->Visible) { // ANO_ALUNO ?>
		<td<?php echo $aluno->ANO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_ANO_ALUNO" class="aluno_ANO_ALUNO">
<span<?php echo $aluno->ANO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->ANO_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->TURMA_ALUNO->Visible) { // TURMA_ALUNO ?>
		<td<?php echo $aluno->TURMA_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_TURMA_ALUNO" class="aluno_TURMA_ALUNO">
<span<?php echo $aluno->TURMA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TURMA_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->SALA_ALUNO->Visible) { // SALA_ALUNO ?>
		<td<?php echo $aluno->SALA_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_SALA_ALUNO" class="aluno_SALA_ALUNO">
<span<?php echo $aluno->SALA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->SALA_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
		<td<?php echo $aluno->NUMERO_LIVROS->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_NUMERO_LIVROS" class="aluno_NUMERO_LIVROS">
<span<?php echo $aluno->NUMERO_LIVROS->ViewAttributes() ?>>
<?php echo $aluno->NUMERO_LIVROS->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aluno->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
		<td<?php echo $aluno->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $aluno_delete->RowCnt ?>_aluno_FREQUENCIA_LIVRO" class="aluno_FREQUENCIA_LIVRO">
<span<?php echo $aluno->FREQUENCIA_LIVRO->ViewAttributes() ?>>
<?php echo $aluno->FREQUENCIA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$aluno_delete->Recordset->MoveNext();
}
$aluno_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $aluno_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<script type="text/javascript">
falunodelete.Init();
</script>
<?php
$aluno_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$aluno_delete->Page_Terminate();
?>
