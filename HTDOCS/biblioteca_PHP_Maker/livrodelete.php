<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "livroinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$livro_delete = NULL; // Initialize page object first

class clivro_delete extends clivro {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'livro';

	// Page object name
	var $PageObjName = 'livro_delete';

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

		// Table object (livro)
		if (!isset($GLOBALS["livro"]) || get_class($GLOBALS["livro"]) == "clivro") {
			$GLOBALS["livro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["livro"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'livro', TRUE);

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
		$this->ID_LIVRO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_LIVRO->Visible = FALSE;
		$this->CODIGO_LIVRO->SetVisibility();
		$this->ISBN->SetVisibility();
		$this->NOME_LIVRO->SetVisibility();
		$this->AUTOR_LIVRO->SetVisibility();
		$this->TEMA_LIVRO->SetVisibility();
		$this->ANO_LIVRO->SetVisibility();
		$this->MATERIA_LIVRO->SetVisibility();
		$this->ESTANTE_LIVRO->SetVisibility();
		$this->PRATELEIRA_LIVRO->SetVisibility();
		$this->EDITORA_LIVRO->SetVisibility();
		$this->EDICAO_LIVRO->SetVisibility();
		$this->IDIOMA_LIVRO->SetVisibility();
		$this->PRAZO_LIVRO->SetVisibility();
		$this->STATUS_LIVRO->SetVisibility();
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
		global $EW_EXPORT, $livro;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($livro);
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
			$this->Page_Terminate("livrolist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in livro class, livroinfo.php

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
				$this->Page_Terminate("livrolist.php"); // Return to list
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
		$this->ID_LIVRO->setDbValue($row['ID_LIVRO']);
		$this->CODIGO_LIVRO->setDbValue($row['CODIGO_LIVRO']);
		$this->ISBN->setDbValue($row['ISBN']);
		$this->NOME_LIVRO->setDbValue($row['NOME_LIVRO']);
		$this->AUTOR_LIVRO->setDbValue($row['AUTOR_LIVRO']);
		$this->TEMA_LIVRO->setDbValue($row['TEMA_LIVRO']);
		$this->ANO_LIVRO->setDbValue($row['ANO_LIVRO']);
		$this->MATERIA_LIVRO->setDbValue($row['MATERIA_LIVRO']);
		$this->ESTANTE_LIVRO->setDbValue($row['ESTANTE_LIVRO']);
		$this->PRATELEIRA_LIVRO->setDbValue($row['PRATELEIRA_LIVRO']);
		$this->EDITORA_LIVRO->setDbValue($row['EDITORA_LIVRO']);
		$this->EDICAO_LIVRO->setDbValue($row['EDICAO_LIVRO']);
		$this->IDIOMA_LIVRO->setDbValue($row['IDIOMA_LIVRO']);
		$this->PRAZO_LIVRO->setDbValue($row['PRAZO_LIVRO']);
		$this->STATUS_LIVRO->setDbValue($row['STATUS_LIVRO']);
		$this->FREQUENCIA_LIVRO->setDbValue($row['FREQUENCIA_LIVRO']);
	}

	// Return a row with default values
	function NewRow() {
		$row = array();
		$row['ID_LIVRO'] = NULL;
		$row['CODIGO_LIVRO'] = NULL;
		$row['ISBN'] = NULL;
		$row['NOME_LIVRO'] = NULL;
		$row['AUTOR_LIVRO'] = NULL;
		$row['TEMA_LIVRO'] = NULL;
		$row['ANO_LIVRO'] = NULL;
		$row['MATERIA_LIVRO'] = NULL;
		$row['ESTANTE_LIVRO'] = NULL;
		$row['PRATELEIRA_LIVRO'] = NULL;
		$row['EDITORA_LIVRO'] = NULL;
		$row['EDICAO_LIVRO'] = NULL;
		$row['IDIOMA_LIVRO'] = NULL;
		$row['PRAZO_LIVRO'] = NULL;
		$row['STATUS_LIVRO'] = NULL;
		$row['FREQUENCIA_LIVRO'] = NULL;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_LIVRO->DbValue = $row['ID_LIVRO'];
		$this->CODIGO_LIVRO->DbValue = $row['CODIGO_LIVRO'];
		$this->ISBN->DbValue = $row['ISBN'];
		$this->NOME_LIVRO->DbValue = $row['NOME_LIVRO'];
		$this->AUTOR_LIVRO->DbValue = $row['AUTOR_LIVRO'];
		$this->TEMA_LIVRO->DbValue = $row['TEMA_LIVRO'];
		$this->ANO_LIVRO->DbValue = $row['ANO_LIVRO'];
		$this->MATERIA_LIVRO->DbValue = $row['MATERIA_LIVRO'];
		$this->ESTANTE_LIVRO->DbValue = $row['ESTANTE_LIVRO'];
		$this->PRATELEIRA_LIVRO->DbValue = $row['PRATELEIRA_LIVRO'];
		$this->EDITORA_LIVRO->DbValue = $row['EDITORA_LIVRO'];
		$this->EDICAO_LIVRO->DbValue = $row['EDICAO_LIVRO'];
		$this->IDIOMA_LIVRO->DbValue = $row['IDIOMA_LIVRO'];
		$this->PRAZO_LIVRO->DbValue = $row['PRAZO_LIVRO'];
		$this->STATUS_LIVRO->DbValue = $row['STATUS_LIVRO'];
		$this->FREQUENCIA_LIVRO->DbValue = $row['FREQUENCIA_LIVRO'];
	}

	// Render row values based on field settings
	function RenderRow() {
		global $Security, $Language, $gsLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// ID_LIVRO
		// CODIGO_LIVRO
		// ISBN
		// NOME_LIVRO
		// AUTOR_LIVRO
		// TEMA_LIVRO
		// ANO_LIVRO
		// MATERIA_LIVRO
		// ESTANTE_LIVRO
		// PRATELEIRA_LIVRO
		// EDITORA_LIVRO
		// EDICAO_LIVRO
		// IDIOMA_LIVRO
		// PRAZO_LIVRO
		// STATUS_LIVRO
		// FREQUENCIA_LIVRO

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_LIVRO
		$this->ID_LIVRO->ViewValue = $this->ID_LIVRO->CurrentValue;
		$this->ID_LIVRO->ViewCustomAttributes = "";

		// CODIGO_LIVRO
		$this->CODIGO_LIVRO->ViewValue = $this->CODIGO_LIVRO->CurrentValue;
		$this->CODIGO_LIVRO->ViewCustomAttributes = "";

		// ISBN
		$this->ISBN->ViewValue = $this->ISBN->CurrentValue;
		$this->ISBN->ViewCustomAttributes = "";

		// NOME_LIVRO
		$this->NOME_LIVRO->ViewValue = $this->NOME_LIVRO->CurrentValue;
		$this->NOME_LIVRO->ViewCustomAttributes = "";

		// AUTOR_LIVRO
		$this->AUTOR_LIVRO->ViewValue = $this->AUTOR_LIVRO->CurrentValue;
		$this->AUTOR_LIVRO->ViewCustomAttributes = "";

		// TEMA_LIVRO
		$this->TEMA_LIVRO->ViewValue = $this->TEMA_LIVRO->CurrentValue;
		$this->TEMA_LIVRO->ViewCustomAttributes = "";

		// ANO_LIVRO
		$this->ANO_LIVRO->ViewValue = $this->ANO_LIVRO->CurrentValue;
		$this->ANO_LIVRO->ViewCustomAttributes = "";

		// MATERIA_LIVRO
		$this->MATERIA_LIVRO->ViewValue = $this->MATERIA_LIVRO->CurrentValue;
		$this->MATERIA_LIVRO->ViewCustomAttributes = "";

		// ESTANTE_LIVRO
		$this->ESTANTE_LIVRO->ViewValue = $this->ESTANTE_LIVRO->CurrentValue;
		$this->ESTANTE_LIVRO->ViewCustomAttributes = "";

		// PRATELEIRA_LIVRO
		$this->PRATELEIRA_LIVRO->ViewValue = $this->PRATELEIRA_LIVRO->CurrentValue;
		$this->PRATELEIRA_LIVRO->ViewCustomAttributes = "";

		// EDITORA_LIVRO
		$this->EDITORA_LIVRO->ViewValue = $this->EDITORA_LIVRO->CurrentValue;
		$this->EDITORA_LIVRO->ViewCustomAttributes = "";

		// EDICAO_LIVRO
		$this->EDICAO_LIVRO->ViewValue = $this->EDICAO_LIVRO->CurrentValue;
		$this->EDICAO_LIVRO->ViewCustomAttributes = "";

		// IDIOMA_LIVRO
		$this->IDIOMA_LIVRO->ViewValue = $this->IDIOMA_LIVRO->CurrentValue;
		$this->IDIOMA_LIVRO->ViewCustomAttributes = "";

		// PRAZO_LIVRO
		$this->PRAZO_LIVRO->ViewValue = $this->PRAZO_LIVRO->CurrentValue;
		$this->PRAZO_LIVRO->ViewCustomAttributes = "";

		// STATUS_LIVRO
		$this->STATUS_LIVRO->ViewValue = $this->STATUS_LIVRO->CurrentValue;
		$this->STATUS_LIVRO->ViewCustomAttributes = "";

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->ViewValue = $this->FREQUENCIA_LIVRO->CurrentValue;
		$this->FREQUENCIA_LIVRO->ViewCustomAttributes = "";

			// ID_LIVRO
			$this->ID_LIVRO->LinkCustomAttributes = "";
			$this->ID_LIVRO->HrefValue = "";
			$this->ID_LIVRO->TooltipValue = "";

			// CODIGO_LIVRO
			$this->CODIGO_LIVRO->LinkCustomAttributes = "";
			$this->CODIGO_LIVRO->HrefValue = "";
			$this->CODIGO_LIVRO->TooltipValue = "";

			// ISBN
			$this->ISBN->LinkCustomAttributes = "";
			$this->ISBN->HrefValue = "";
			$this->ISBN->TooltipValue = "";

			// NOME_LIVRO
			$this->NOME_LIVRO->LinkCustomAttributes = "";
			$this->NOME_LIVRO->HrefValue = "";
			$this->NOME_LIVRO->TooltipValue = "";

			// AUTOR_LIVRO
			$this->AUTOR_LIVRO->LinkCustomAttributes = "";
			$this->AUTOR_LIVRO->HrefValue = "";
			$this->AUTOR_LIVRO->TooltipValue = "";

			// TEMA_LIVRO
			$this->TEMA_LIVRO->LinkCustomAttributes = "";
			$this->TEMA_LIVRO->HrefValue = "";
			$this->TEMA_LIVRO->TooltipValue = "";

			// ANO_LIVRO
			$this->ANO_LIVRO->LinkCustomAttributes = "";
			$this->ANO_LIVRO->HrefValue = "";
			$this->ANO_LIVRO->TooltipValue = "";

			// MATERIA_LIVRO
			$this->MATERIA_LIVRO->LinkCustomAttributes = "";
			$this->MATERIA_LIVRO->HrefValue = "";
			$this->MATERIA_LIVRO->TooltipValue = "";

			// ESTANTE_LIVRO
			$this->ESTANTE_LIVRO->LinkCustomAttributes = "";
			$this->ESTANTE_LIVRO->HrefValue = "";
			$this->ESTANTE_LIVRO->TooltipValue = "";

			// PRATELEIRA_LIVRO
			$this->PRATELEIRA_LIVRO->LinkCustomAttributes = "";
			$this->PRATELEIRA_LIVRO->HrefValue = "";
			$this->PRATELEIRA_LIVRO->TooltipValue = "";

			// EDITORA_LIVRO
			$this->EDITORA_LIVRO->LinkCustomAttributes = "";
			$this->EDITORA_LIVRO->HrefValue = "";
			$this->EDITORA_LIVRO->TooltipValue = "";

			// EDICAO_LIVRO
			$this->EDICAO_LIVRO->LinkCustomAttributes = "";
			$this->EDICAO_LIVRO->HrefValue = "";
			$this->EDICAO_LIVRO->TooltipValue = "";

			// IDIOMA_LIVRO
			$this->IDIOMA_LIVRO->LinkCustomAttributes = "";
			$this->IDIOMA_LIVRO->HrefValue = "";
			$this->IDIOMA_LIVRO->TooltipValue = "";

			// PRAZO_LIVRO
			$this->PRAZO_LIVRO->LinkCustomAttributes = "";
			$this->PRAZO_LIVRO->HrefValue = "";
			$this->PRAZO_LIVRO->TooltipValue = "";

			// STATUS_LIVRO
			$this->STATUS_LIVRO->LinkCustomAttributes = "";
			$this->STATUS_LIVRO->HrefValue = "";
			$this->STATUS_LIVRO->TooltipValue = "";

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
				$sThisKey .= $row['ID_LIVRO'];
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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("livrolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($livro_delete)) $livro_delete = new clivro_delete();

// Page init
$livro_delete->Page_Init();

// Page main
$livro_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$livro_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "delete";
var CurrentForm = flivrodelete = new ew_Form("flivrodelete", "delete");

// Form_CustomValidate event
flivrodelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
flivrodelete.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $livro_delete->ShowPageHeader(); ?>
<?php
$livro_delete->ShowMessage();
?>
<form name="flivrodelete" id="flivrodelete" class="form-inline ewForm ewDeleteForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($livro_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $livro_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="livro">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($livro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="box ewBox ewGrid">
<div class="<?php if (ew_IsResponsiveLayout()) { ?>table-responsive <?php } ?>ewGridMiddlePanel">
<table class="table ewTable">
	<thead>
	<tr class="ewTableHeader">
<?php if ($livro->ID_LIVRO->Visible) { // ID_LIVRO ?>
		<th class="<?php echo $livro->ID_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_ID_LIVRO" class="livro_ID_LIVRO"><?php echo $livro->ID_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->CODIGO_LIVRO->Visible) { // CODIGO_LIVRO ?>
		<th class="<?php echo $livro->CODIGO_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_CODIGO_LIVRO" class="livro_CODIGO_LIVRO"><?php echo $livro->CODIGO_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->ISBN->Visible) { // ISBN ?>
		<th class="<?php echo $livro->ISBN->HeaderCellClass() ?>"><span id="elh_livro_ISBN" class="livro_ISBN"><?php echo $livro->ISBN->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->NOME_LIVRO->Visible) { // NOME_LIVRO ?>
		<th class="<?php echo $livro->NOME_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_NOME_LIVRO" class="livro_NOME_LIVRO"><?php echo $livro->NOME_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->AUTOR_LIVRO->Visible) { // AUTOR_LIVRO ?>
		<th class="<?php echo $livro->AUTOR_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_AUTOR_LIVRO" class="livro_AUTOR_LIVRO"><?php echo $livro->AUTOR_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->TEMA_LIVRO->Visible) { // TEMA_LIVRO ?>
		<th class="<?php echo $livro->TEMA_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_TEMA_LIVRO" class="livro_TEMA_LIVRO"><?php echo $livro->TEMA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->ANO_LIVRO->Visible) { // ANO_LIVRO ?>
		<th class="<?php echo $livro->ANO_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_ANO_LIVRO" class="livro_ANO_LIVRO"><?php echo $livro->ANO_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->MATERIA_LIVRO->Visible) { // MATERIA_LIVRO ?>
		<th class="<?php echo $livro->MATERIA_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_MATERIA_LIVRO" class="livro_MATERIA_LIVRO"><?php echo $livro->MATERIA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->ESTANTE_LIVRO->Visible) { // ESTANTE_LIVRO ?>
		<th class="<?php echo $livro->ESTANTE_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_ESTANTE_LIVRO" class="livro_ESTANTE_LIVRO"><?php echo $livro->ESTANTE_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->PRATELEIRA_LIVRO->Visible) { // PRATELEIRA_LIVRO ?>
		<th class="<?php echo $livro->PRATELEIRA_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_PRATELEIRA_LIVRO" class="livro_PRATELEIRA_LIVRO"><?php echo $livro->PRATELEIRA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->EDITORA_LIVRO->Visible) { // EDITORA_LIVRO ?>
		<th class="<?php echo $livro->EDITORA_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_EDITORA_LIVRO" class="livro_EDITORA_LIVRO"><?php echo $livro->EDITORA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->EDICAO_LIVRO->Visible) { // EDICAO_LIVRO ?>
		<th class="<?php echo $livro->EDICAO_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_EDICAO_LIVRO" class="livro_EDICAO_LIVRO"><?php echo $livro->EDICAO_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->IDIOMA_LIVRO->Visible) { // IDIOMA_LIVRO ?>
		<th class="<?php echo $livro->IDIOMA_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_IDIOMA_LIVRO" class="livro_IDIOMA_LIVRO"><?php echo $livro->IDIOMA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->PRAZO_LIVRO->Visible) { // PRAZO_LIVRO ?>
		<th class="<?php echo $livro->PRAZO_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_PRAZO_LIVRO" class="livro_PRAZO_LIVRO"><?php echo $livro->PRAZO_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->STATUS_LIVRO->Visible) { // STATUS_LIVRO ?>
		<th class="<?php echo $livro->STATUS_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_STATUS_LIVRO" class="livro_STATUS_LIVRO"><?php echo $livro->STATUS_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($livro->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
		<th class="<?php echo $livro->FREQUENCIA_LIVRO->HeaderCellClass() ?>"><span id="elh_livro_FREQUENCIA_LIVRO" class="livro_FREQUENCIA_LIVRO"><?php echo $livro->FREQUENCIA_LIVRO->FldCaption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$livro_delete->RecCnt = 0;
$i = 0;
while (!$livro_delete->Recordset->EOF) {
	$livro_delete->RecCnt++;
	$livro_delete->RowCnt++;

	// Set row properties
	$livro->ResetAttrs();
	$livro->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$livro_delete->LoadRowValues($livro_delete->Recordset);

	// Render row
	$livro_delete->RenderRow();
?>
	<tr<?php echo $livro->RowAttributes() ?>>
<?php if ($livro->ID_LIVRO->Visible) { // ID_LIVRO ?>
		<td<?php echo $livro->ID_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_ID_LIVRO" class="livro_ID_LIVRO">
<span<?php echo $livro->ID_LIVRO->ViewAttributes() ?>>
<?php echo $livro->ID_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->CODIGO_LIVRO->Visible) { // CODIGO_LIVRO ?>
		<td<?php echo $livro->CODIGO_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_CODIGO_LIVRO" class="livro_CODIGO_LIVRO">
<span<?php echo $livro->CODIGO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->CODIGO_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->ISBN->Visible) { // ISBN ?>
		<td<?php echo $livro->ISBN->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_ISBN" class="livro_ISBN">
<span<?php echo $livro->ISBN->ViewAttributes() ?>>
<?php echo $livro->ISBN->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->NOME_LIVRO->Visible) { // NOME_LIVRO ?>
		<td<?php echo $livro->NOME_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_NOME_LIVRO" class="livro_NOME_LIVRO">
<span<?php echo $livro->NOME_LIVRO->ViewAttributes() ?>>
<?php echo $livro->NOME_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->AUTOR_LIVRO->Visible) { // AUTOR_LIVRO ?>
		<td<?php echo $livro->AUTOR_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_AUTOR_LIVRO" class="livro_AUTOR_LIVRO">
<span<?php echo $livro->AUTOR_LIVRO->ViewAttributes() ?>>
<?php echo $livro->AUTOR_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->TEMA_LIVRO->Visible) { // TEMA_LIVRO ?>
		<td<?php echo $livro->TEMA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_TEMA_LIVRO" class="livro_TEMA_LIVRO">
<span<?php echo $livro->TEMA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->TEMA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->ANO_LIVRO->Visible) { // ANO_LIVRO ?>
		<td<?php echo $livro->ANO_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_ANO_LIVRO" class="livro_ANO_LIVRO">
<span<?php echo $livro->ANO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->ANO_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->MATERIA_LIVRO->Visible) { // MATERIA_LIVRO ?>
		<td<?php echo $livro->MATERIA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_MATERIA_LIVRO" class="livro_MATERIA_LIVRO">
<span<?php echo $livro->MATERIA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->MATERIA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->ESTANTE_LIVRO->Visible) { // ESTANTE_LIVRO ?>
		<td<?php echo $livro->ESTANTE_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_ESTANTE_LIVRO" class="livro_ESTANTE_LIVRO">
<span<?php echo $livro->ESTANTE_LIVRO->ViewAttributes() ?>>
<?php echo $livro->ESTANTE_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->PRATELEIRA_LIVRO->Visible) { // PRATELEIRA_LIVRO ?>
		<td<?php echo $livro->PRATELEIRA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_PRATELEIRA_LIVRO" class="livro_PRATELEIRA_LIVRO">
<span<?php echo $livro->PRATELEIRA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->PRATELEIRA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->EDITORA_LIVRO->Visible) { // EDITORA_LIVRO ?>
		<td<?php echo $livro->EDITORA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_EDITORA_LIVRO" class="livro_EDITORA_LIVRO">
<span<?php echo $livro->EDITORA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->EDITORA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->EDICAO_LIVRO->Visible) { // EDICAO_LIVRO ?>
		<td<?php echo $livro->EDICAO_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_EDICAO_LIVRO" class="livro_EDICAO_LIVRO">
<span<?php echo $livro->EDICAO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->EDICAO_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->IDIOMA_LIVRO->Visible) { // IDIOMA_LIVRO ?>
		<td<?php echo $livro->IDIOMA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_IDIOMA_LIVRO" class="livro_IDIOMA_LIVRO">
<span<?php echo $livro->IDIOMA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->IDIOMA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->PRAZO_LIVRO->Visible) { // PRAZO_LIVRO ?>
		<td<?php echo $livro->PRAZO_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_PRAZO_LIVRO" class="livro_PRAZO_LIVRO">
<span<?php echo $livro->PRAZO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->PRAZO_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->STATUS_LIVRO->Visible) { // STATUS_LIVRO ?>
		<td<?php echo $livro->STATUS_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_STATUS_LIVRO" class="livro_STATUS_LIVRO">
<span<?php echo $livro->STATUS_LIVRO->ViewAttributes() ?>>
<?php echo $livro->STATUS_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($livro->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
		<td<?php echo $livro->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $livro_delete->RowCnt ?>_livro_FREQUENCIA_LIVRO" class="livro_FREQUENCIA_LIVRO">
<span<?php echo $livro->FREQUENCIA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->FREQUENCIA_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$livro_delete->Recordset->MoveNext();
}
$livro_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $livro_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<script type="text/javascript">
flivrodelete.Init();
</script>
<?php
$livro_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$livro_delete->Page_Terminate();
?>
