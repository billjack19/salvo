<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "funcionarioinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$funcionario_delete = NULL; // Initialize page object first

class cfuncionario_delete extends cfuncionario {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'funcionario';

	// Page object name
	var $PageObjName = 'funcionario_delete';

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

		// Table object (funcionario)
		if (!isset($GLOBALS["funcionario"]) || get_class($GLOBALS["funcionario"]) == "cfuncionario") {
			$GLOBALS["funcionario"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["funcionario"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'funcionario', TRUE);

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
		$this->ID_FUNCIONARIO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_FUNCIONARIO->Visible = FALSE;
		$this->NOME_FUNCIONARIO->SetVisibility();
		$this->CPF_FUNCIONARIO->SetVisibility();
		$this->RG_FUNCIONARIO->SetVisibility();
		$this->SEXO_FUNCIONARIO->SetVisibility();
		$this->DATA_NASCIMENTO_FUNCIONARIO->SetVisibility();
		$this->TELEFONE_FUNCIONARIO->SetVisibility();
		$this->EMAIL_FUNCIONARIO->SetVisibility();
		$this->CEP_FUNCIONARIO->SetVisibility();
		$this->ENDERECO_FUNCIONARIO->SetVisibility();
		$this->NUMERO_END_FUNCIONARIO->SetVisibility();
		$this->COMPLEMENTO_END_FUNCIONARIO->SetVisibility();
		$this->BAIRRO_END_FUNCIONARIO->SetVisibility();
		$this->ESTADO_END_FUNCIONARIO->SetVisibility();
		$this->CIDADE_END_FUNCIONARIO->SetVisibility();
		$this->TURNO_FUNCIONARIO->SetVisibility();
		$this->CARGO_FUNCIONARIO->SetVisibility();
		$this->ID_NIVEL_ACESSO->SetVisibility();
		$this->MASP->SetVisibility();
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
		global $EW_EXPORT, $funcionario;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($funcionario);
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
			$this->Page_Terminate("funcionariolist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in funcionario class, funcionarioinfo.php

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
				$this->Page_Terminate("funcionariolist.php"); // Return to list
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
		$this->ID_FUNCIONARIO->setDbValue($row['ID_FUNCIONARIO']);
		$this->NOME_FUNCIONARIO->setDbValue($row['NOME_FUNCIONARIO']);
		$this->CPF_FUNCIONARIO->setDbValue($row['CPF_FUNCIONARIO']);
		$this->RG_FUNCIONARIO->setDbValue($row['RG_FUNCIONARIO']);
		$this->SEXO_FUNCIONARIO->setDbValue($row['SEXO_FUNCIONARIO']);
		$this->DATA_NASCIMENTO_FUNCIONARIO->setDbValue($row['DATA_NASCIMENTO_FUNCIONARIO']);
		$this->TELEFONE_FUNCIONARIO->setDbValue($row['TELEFONE_FUNCIONARIO']);
		$this->EMAIL_FUNCIONARIO->setDbValue($row['EMAIL_FUNCIONARIO']);
		$this->CEP_FUNCIONARIO->setDbValue($row['CEP_FUNCIONARIO']);
		$this->ENDERECO_FUNCIONARIO->setDbValue($row['ENDERECO_FUNCIONARIO']);
		$this->NUMERO_END_FUNCIONARIO->setDbValue($row['NUMERO_END_FUNCIONARIO']);
		$this->COMPLEMENTO_END_FUNCIONARIO->setDbValue($row['COMPLEMENTO_END_FUNCIONARIO']);
		$this->BAIRRO_END_FUNCIONARIO->setDbValue($row['BAIRRO_END_FUNCIONARIO']);
		$this->ESTADO_END_FUNCIONARIO->setDbValue($row['ESTADO_END_FUNCIONARIO']);
		$this->CIDADE_END_FUNCIONARIO->setDbValue($row['CIDADE_END_FUNCIONARIO']);
		$this->TURNO_FUNCIONARIO->setDbValue($row['TURNO_FUNCIONARIO']);
		$this->CARGO_FUNCIONARIO->setDbValue($row['CARGO_FUNCIONARIO']);
		$this->ID_NIVEL_ACESSO->setDbValue($row['ID_NIVEL_ACESSO']);
		$this->MASP->setDbValue($row['MASP']);
		$this->NUMERO_LIVROS->setDbValue($row['NUMERO_LIVROS']);
		$this->FREQUENCIA_LIVRO->setDbValue($row['FREQUENCIA_LIVRO']);
	}

	// Return a row with default values
	function NewRow() {
		$row = array();
		$row['ID_FUNCIONARIO'] = NULL;
		$row['NOME_FUNCIONARIO'] = NULL;
		$row['CPF_FUNCIONARIO'] = NULL;
		$row['RG_FUNCIONARIO'] = NULL;
		$row['SEXO_FUNCIONARIO'] = NULL;
		$row['DATA_NASCIMENTO_FUNCIONARIO'] = NULL;
		$row['TELEFONE_FUNCIONARIO'] = NULL;
		$row['EMAIL_FUNCIONARIO'] = NULL;
		$row['CEP_FUNCIONARIO'] = NULL;
		$row['ENDERECO_FUNCIONARIO'] = NULL;
		$row['NUMERO_END_FUNCIONARIO'] = NULL;
		$row['COMPLEMENTO_END_FUNCIONARIO'] = NULL;
		$row['BAIRRO_END_FUNCIONARIO'] = NULL;
		$row['ESTADO_END_FUNCIONARIO'] = NULL;
		$row['CIDADE_END_FUNCIONARIO'] = NULL;
		$row['TURNO_FUNCIONARIO'] = NULL;
		$row['CARGO_FUNCIONARIO'] = NULL;
		$row['ID_NIVEL_ACESSO'] = NULL;
		$row['MASP'] = NULL;
		$row['NUMERO_LIVROS'] = NULL;
		$row['FREQUENCIA_LIVRO'] = NULL;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_FUNCIONARIO->DbValue = $row['ID_FUNCIONARIO'];
		$this->NOME_FUNCIONARIO->DbValue = $row['NOME_FUNCIONARIO'];
		$this->CPF_FUNCIONARIO->DbValue = $row['CPF_FUNCIONARIO'];
		$this->RG_FUNCIONARIO->DbValue = $row['RG_FUNCIONARIO'];
		$this->SEXO_FUNCIONARIO->DbValue = $row['SEXO_FUNCIONARIO'];
		$this->DATA_NASCIMENTO_FUNCIONARIO->DbValue = $row['DATA_NASCIMENTO_FUNCIONARIO'];
		$this->TELEFONE_FUNCIONARIO->DbValue = $row['TELEFONE_FUNCIONARIO'];
		$this->EMAIL_FUNCIONARIO->DbValue = $row['EMAIL_FUNCIONARIO'];
		$this->CEP_FUNCIONARIO->DbValue = $row['CEP_FUNCIONARIO'];
		$this->ENDERECO_FUNCIONARIO->DbValue = $row['ENDERECO_FUNCIONARIO'];
		$this->NUMERO_END_FUNCIONARIO->DbValue = $row['NUMERO_END_FUNCIONARIO'];
		$this->COMPLEMENTO_END_FUNCIONARIO->DbValue = $row['COMPLEMENTO_END_FUNCIONARIO'];
		$this->BAIRRO_END_FUNCIONARIO->DbValue = $row['BAIRRO_END_FUNCIONARIO'];
		$this->ESTADO_END_FUNCIONARIO->DbValue = $row['ESTADO_END_FUNCIONARIO'];
		$this->CIDADE_END_FUNCIONARIO->DbValue = $row['CIDADE_END_FUNCIONARIO'];
		$this->TURNO_FUNCIONARIO->DbValue = $row['TURNO_FUNCIONARIO'];
		$this->CARGO_FUNCIONARIO->DbValue = $row['CARGO_FUNCIONARIO'];
		$this->ID_NIVEL_ACESSO->DbValue = $row['ID_NIVEL_ACESSO'];
		$this->MASP->DbValue = $row['MASP'];
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

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

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
				$sThisKey .= $row['ID_FUNCIONARIO'];
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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("funcionariolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($funcionario_delete)) $funcionario_delete = new cfuncionario_delete();

// Page init
$funcionario_delete->Page_Init();

// Page main
$funcionario_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$funcionario_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "delete";
var CurrentForm = ffuncionariodelete = new ew_Form("ffuncionariodelete", "delete");

// Form_CustomValidate event
ffuncionariodelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
ffuncionariodelete.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $funcionario_delete->ShowPageHeader(); ?>
<?php
$funcionario_delete->ShowMessage();
?>
<form name="ffuncionariodelete" id="ffuncionariodelete" class="form-inline ewForm ewDeleteForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($funcionario_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $funcionario_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="funcionario">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($funcionario_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="box ewBox ewGrid">
<div class="<?php if (ew_IsResponsiveLayout()) { ?>table-responsive <?php } ?>ewGridMiddlePanel">
<table class="table ewTable">
	<thead>
	<tr class="ewTableHeader">
<?php if ($funcionario->ID_FUNCIONARIO->Visible) { // ID_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->ID_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_ID_FUNCIONARIO" class="funcionario_ID_FUNCIONARIO"><?php echo $funcionario->ID_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->NOME_FUNCIONARIO->Visible) { // NOME_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->NOME_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_NOME_FUNCIONARIO" class="funcionario_NOME_FUNCIONARIO"><?php echo $funcionario->NOME_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->CPF_FUNCIONARIO->Visible) { // CPF_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->CPF_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_CPF_FUNCIONARIO" class="funcionario_CPF_FUNCIONARIO"><?php echo $funcionario->CPF_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->RG_FUNCIONARIO->Visible) { // RG_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->RG_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_RG_FUNCIONARIO" class="funcionario_RG_FUNCIONARIO"><?php echo $funcionario->RG_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->SEXO_FUNCIONARIO->Visible) { // SEXO_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->SEXO_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_SEXO_FUNCIONARIO" class="funcionario_SEXO_FUNCIONARIO"><?php echo $funcionario->SEXO_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->DATA_NASCIMENTO_FUNCIONARIO->Visible) { // DATA_NASCIMENTO_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_DATA_NASCIMENTO_FUNCIONARIO" class="funcionario_DATA_NASCIMENTO_FUNCIONARIO"><?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->TELEFONE_FUNCIONARIO->Visible) { // TELEFONE_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->TELEFONE_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_TELEFONE_FUNCIONARIO" class="funcionario_TELEFONE_FUNCIONARIO"><?php echo $funcionario->TELEFONE_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->EMAIL_FUNCIONARIO->Visible) { // EMAIL_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->EMAIL_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_EMAIL_FUNCIONARIO" class="funcionario_EMAIL_FUNCIONARIO"><?php echo $funcionario->EMAIL_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->CEP_FUNCIONARIO->Visible) { // CEP_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->CEP_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_CEP_FUNCIONARIO" class="funcionario_CEP_FUNCIONARIO"><?php echo $funcionario->CEP_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->ENDERECO_FUNCIONARIO->Visible) { // ENDERECO_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->ENDERECO_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_ENDERECO_FUNCIONARIO" class="funcionario_ENDERECO_FUNCIONARIO"><?php echo $funcionario->ENDERECO_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->NUMERO_END_FUNCIONARIO->Visible) { // NUMERO_END_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->NUMERO_END_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_NUMERO_END_FUNCIONARIO" class="funcionario_NUMERO_END_FUNCIONARIO"><?php echo $funcionario->NUMERO_END_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->COMPLEMENTO_END_FUNCIONARIO->Visible) { // COMPLEMENTO_END_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_COMPLEMENTO_END_FUNCIONARIO" class="funcionario_COMPLEMENTO_END_FUNCIONARIO"><?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->BAIRRO_END_FUNCIONARIO->Visible) { // BAIRRO_END_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_BAIRRO_END_FUNCIONARIO" class="funcionario_BAIRRO_END_FUNCIONARIO"><?php echo $funcionario->BAIRRO_END_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->ESTADO_END_FUNCIONARIO->Visible) { // ESTADO_END_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->ESTADO_END_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_ESTADO_END_FUNCIONARIO" class="funcionario_ESTADO_END_FUNCIONARIO"><?php echo $funcionario->ESTADO_END_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->CIDADE_END_FUNCIONARIO->Visible) { // CIDADE_END_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->CIDADE_END_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_CIDADE_END_FUNCIONARIO" class="funcionario_CIDADE_END_FUNCIONARIO"><?php echo $funcionario->CIDADE_END_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->TURNO_FUNCIONARIO->Visible) { // TURNO_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->TURNO_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_TURNO_FUNCIONARIO" class="funcionario_TURNO_FUNCIONARIO"><?php echo $funcionario->TURNO_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->CARGO_FUNCIONARIO->Visible) { // CARGO_FUNCIONARIO ?>
		<th class="<?php echo $funcionario->CARGO_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_funcionario_CARGO_FUNCIONARIO" class="funcionario_CARGO_FUNCIONARIO"><?php echo $funcionario->CARGO_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
		<th class="<?php echo $funcionario->ID_NIVEL_ACESSO->HeaderCellClass() ?>"><span id="elh_funcionario_ID_NIVEL_ACESSO" class="funcionario_ID_NIVEL_ACESSO"><?php echo $funcionario->ID_NIVEL_ACESSO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->MASP->Visible) { // MASP ?>
		<th class="<?php echo $funcionario->MASP->HeaderCellClass() ?>"><span id="elh_funcionario_MASP" class="funcionario_MASP"><?php echo $funcionario->MASP->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
		<th class="<?php echo $funcionario->NUMERO_LIVROS->HeaderCellClass() ?>"><span id="elh_funcionario_NUMERO_LIVROS" class="funcionario_NUMERO_LIVROS"><?php echo $funcionario->NUMERO_LIVROS->FldCaption() ?></span></th>
<?php } ?>
<?php if ($funcionario->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
		<th class="<?php echo $funcionario->FREQUENCIA_LIVRO->HeaderCellClass() ?>"><span id="elh_funcionario_FREQUENCIA_LIVRO" class="funcionario_FREQUENCIA_LIVRO"><?php echo $funcionario->FREQUENCIA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$funcionario_delete->RecCnt = 0;
$i = 0;
while (!$funcionario_delete->Recordset->EOF) {
	$funcionario_delete->RecCnt++;
	$funcionario_delete->RowCnt++;

	// Set row properties
	$funcionario->ResetAttrs();
	$funcionario->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$funcionario_delete->LoadRowValues($funcionario_delete->Recordset);

	// Render row
	$funcionario_delete->RenderRow();
?>
	<tr<?php echo $funcionario->RowAttributes() ?>>
<?php if ($funcionario->ID_FUNCIONARIO->Visible) { // ID_FUNCIONARIO ?>
		<td<?php echo $funcionario->ID_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_ID_FUNCIONARIO" class="funcionario_ID_FUNCIONARIO">
<span<?php echo $funcionario->ID_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->ID_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->NOME_FUNCIONARIO->Visible) { // NOME_FUNCIONARIO ?>
		<td<?php echo $funcionario->NOME_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_NOME_FUNCIONARIO" class="funcionario_NOME_FUNCIONARIO">
<span<?php echo $funcionario->NOME_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->NOME_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->CPF_FUNCIONARIO->Visible) { // CPF_FUNCIONARIO ?>
		<td<?php echo $funcionario->CPF_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_CPF_FUNCIONARIO" class="funcionario_CPF_FUNCIONARIO">
<span<?php echo $funcionario->CPF_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->CPF_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->RG_FUNCIONARIO->Visible) { // RG_FUNCIONARIO ?>
		<td<?php echo $funcionario->RG_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_RG_FUNCIONARIO" class="funcionario_RG_FUNCIONARIO">
<span<?php echo $funcionario->RG_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->RG_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->SEXO_FUNCIONARIO->Visible) { // SEXO_FUNCIONARIO ?>
		<td<?php echo $funcionario->SEXO_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_SEXO_FUNCIONARIO" class="funcionario_SEXO_FUNCIONARIO">
<span<?php echo $funcionario->SEXO_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->SEXO_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->DATA_NASCIMENTO_FUNCIONARIO->Visible) { // DATA_NASCIMENTO_FUNCIONARIO ?>
		<td<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_DATA_NASCIMENTO_FUNCIONARIO" class="funcionario_DATA_NASCIMENTO_FUNCIONARIO">
<span<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->TELEFONE_FUNCIONARIO->Visible) { // TELEFONE_FUNCIONARIO ?>
		<td<?php echo $funcionario->TELEFONE_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_TELEFONE_FUNCIONARIO" class="funcionario_TELEFONE_FUNCIONARIO">
<span<?php echo $funcionario->TELEFONE_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->TELEFONE_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->EMAIL_FUNCIONARIO->Visible) { // EMAIL_FUNCIONARIO ?>
		<td<?php echo $funcionario->EMAIL_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_EMAIL_FUNCIONARIO" class="funcionario_EMAIL_FUNCIONARIO">
<span<?php echo $funcionario->EMAIL_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->EMAIL_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->CEP_FUNCIONARIO->Visible) { // CEP_FUNCIONARIO ?>
		<td<?php echo $funcionario->CEP_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_CEP_FUNCIONARIO" class="funcionario_CEP_FUNCIONARIO">
<span<?php echo $funcionario->CEP_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->CEP_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->ENDERECO_FUNCIONARIO->Visible) { // ENDERECO_FUNCIONARIO ?>
		<td<?php echo $funcionario->ENDERECO_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_ENDERECO_FUNCIONARIO" class="funcionario_ENDERECO_FUNCIONARIO">
<span<?php echo $funcionario->ENDERECO_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->ENDERECO_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->NUMERO_END_FUNCIONARIO->Visible) { // NUMERO_END_FUNCIONARIO ?>
		<td<?php echo $funcionario->NUMERO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_NUMERO_END_FUNCIONARIO" class="funcionario_NUMERO_END_FUNCIONARIO">
<span<?php echo $funcionario->NUMERO_END_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->NUMERO_END_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->COMPLEMENTO_END_FUNCIONARIO->Visible) { // COMPLEMENTO_END_FUNCIONARIO ?>
		<td<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_COMPLEMENTO_END_FUNCIONARIO" class="funcionario_COMPLEMENTO_END_FUNCIONARIO">
<span<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->BAIRRO_END_FUNCIONARIO->Visible) { // BAIRRO_END_FUNCIONARIO ?>
		<td<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_BAIRRO_END_FUNCIONARIO" class="funcionario_BAIRRO_END_FUNCIONARIO">
<span<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->ESTADO_END_FUNCIONARIO->Visible) { // ESTADO_END_FUNCIONARIO ?>
		<td<?php echo $funcionario->ESTADO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_ESTADO_END_FUNCIONARIO" class="funcionario_ESTADO_END_FUNCIONARIO">
<span<?php echo $funcionario->ESTADO_END_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->ESTADO_END_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->CIDADE_END_FUNCIONARIO->Visible) { // CIDADE_END_FUNCIONARIO ?>
		<td<?php echo $funcionario->CIDADE_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_CIDADE_END_FUNCIONARIO" class="funcionario_CIDADE_END_FUNCIONARIO">
<span<?php echo $funcionario->CIDADE_END_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->CIDADE_END_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->TURNO_FUNCIONARIO->Visible) { // TURNO_FUNCIONARIO ?>
		<td<?php echo $funcionario->TURNO_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_TURNO_FUNCIONARIO" class="funcionario_TURNO_FUNCIONARIO">
<span<?php echo $funcionario->TURNO_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->TURNO_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->CARGO_FUNCIONARIO->Visible) { // CARGO_FUNCIONARIO ?>
		<td<?php echo $funcionario->CARGO_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_CARGO_FUNCIONARIO" class="funcionario_CARGO_FUNCIONARIO">
<span<?php echo $funcionario->CARGO_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $funcionario->CARGO_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
		<td<?php echo $funcionario->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_ID_NIVEL_ACESSO" class="funcionario_ID_NIVEL_ACESSO">
<span<?php echo $funcionario->ID_NIVEL_ACESSO->ViewAttributes() ?>>
<?php echo $funcionario->ID_NIVEL_ACESSO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->MASP->Visible) { // MASP ?>
		<td<?php echo $funcionario->MASP->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_MASP" class="funcionario_MASP">
<span<?php echo $funcionario->MASP->ViewAttributes() ?>>
<?php echo $funcionario->MASP->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
		<td<?php echo $funcionario->NUMERO_LIVROS->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_NUMERO_LIVROS" class="funcionario_NUMERO_LIVROS">
<span<?php echo $funcionario->NUMERO_LIVROS->ViewAttributes() ?>>
<?php echo $funcionario->NUMERO_LIVROS->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($funcionario->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
		<td<?php echo $funcionario->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $funcionario_delete->RowCnt ?>_funcionario_FREQUENCIA_LIVRO" class="funcionario_FREQUENCIA_LIVRO">
<span<?php echo $funcionario->FREQUENCIA_LIVRO->ViewAttributes() ?>>
<?php echo $funcionario->FREQUENCIA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$funcionario_delete->Recordset->MoveNext();
}
$funcionario_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $funcionario_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<script type="text/javascript">
ffuncionariodelete.Init();
</script>
<?php
$funcionario_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$funcionario_delete->Page_Terminate();
?>
