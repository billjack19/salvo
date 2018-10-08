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

$aluno_list = NULL; // Initialize page object first

class caluno_list extends caluno {

	// Page ID
	var $PageID = 'list';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'aluno';

	// Page object name
	var $PageObjName = 'aluno_list';

	// Grid form hidden field names
	var $FormName = 'falunolist';
	var $FormActionName = 'k_action';
	var $FormKeyName = 'k_key';
	var $FormOldKeyName = 'k_oldkey';
	var $FormBlankRowName = 'k_blankrow';
	var $FormKeyCountName = 'key_count';

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

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;
	var $ExportPdfUrl;

	// Custom export
	var $ExportExcelCustom = FALSE;
	var $ExportWordCustom = FALSE;
	var $ExportPdfCustom = FALSE;
	var $ExportEmailCustom = FALSE;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

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

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "alunoadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "alunodelete.php";
		$this->MultiUpdateUrl = "alunoupdate.php";

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

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

		// List options
		$this->ListOptions = new cListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ewExportOption";

		// Other options
		$this->OtherOptions['addedit'] = new cListOptions();
		$this->OtherOptions['addedit']->Tag = "div";
		$this->OtherOptions['addedit']->TagClassName = "ewAddEditOption";
		$this->OtherOptions['detail'] = new cListOptions();
		$this->OtherOptions['detail']->Tag = "div";
		$this->OtherOptions['detail']->TagClassName = "ewDetailOption";
		$this->OtherOptions['action'] = new cListOptions();
		$this->OtherOptions['action']->Tag = "div";
		$this->OtherOptions['action']->TagClassName = "ewActionOption";

		// Filter options
		$this->FilterOptions = new cListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ewFilterOption falunolistsrch";

		// List actions
		$this->ListActions = new cListActions();
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsCustomExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action

		// Get grid add count
		$gridaddcnt = @$_GET[EW_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();
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

		// Process auto fill
		if (@$_POST["ajax"] == "autofill") {
			$results = $this->GetAutoFill(@$_POST["name"], @$_POST["q"]);
			if ($results) {

				// Clean output buffer
				if (!EW_DEBUG_ENABLED && ob_get_length())
					ob_end_clean();
				echo $results;
				$this->Page_Terminate();
				exit();
			}
		}

		// Create Token
		$this->CreateToken();

		// Setup other options
		$this->SetupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->Add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == EW_ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions->Items["checkbox"]->Visible = TRUE;
				break;
			}
		}
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

	// Class variables
	var $ListOptions; // List options
	var $ExportOptions; // Export options
	var $SearchOptions; // Search options
	var $OtherOptions = array(); // Other options
	var $FilterOptions; // Filter options
	var $ListActions; // List actions
	var $SelectedCount = 0;
	var $SelectedIndex = 0;
	var $DisplayRecs = 20;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $Pager;
	var $AutoHidePager = EW_AUTO_HIDE_PAGER;
	var $AutoHidePageSizeSelector = EW_AUTO_HIDE_PAGE_SIZE_SELECTOR;
	var $DefaultSearchWhere = ""; // Default search WHERE clause
	var $SearchWhere = ""; // Search WHERE clause
	var $RecCnt = 0; // Record count
	var $EditRowCnt;
	var $StartRowCnt = 1;
	var $RowCnt = 0;
	var $Attrs = array(); // Row attributes and cell attributes
	var $RowIndex = 0; // Row index
	var $KeyCount = 0; // Key count
	var $RowAction = ""; // Row action
	var $RowOldKey = ""; // Row old key (for copy)
	var $RecPerRow = 0;
	var $MultiColumnClass;
	var $MultiColumnEditClass = "col-sm-12";
	var $MultiColumnCnt = 12;
	var $MultiColumnEditCnt = 12;
	var $GridCnt = 0;
	var $ColCnt = 0;
	var $DbMasterFilter = ""; // Master filter
	var $DbDetailFilter = ""; // Detail filter
	var $MasterRecordExists;
	var $MultiSelectKey;
	var $Command;
	var $RestoreSearch = FALSE;
	var $DetailPages;
	var $Recordset;
	var $OldRecordset;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $EW_EXPORT;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";

		// Get command
		$this->Command = strtolower(@$_GET["cmd"]);
		if ($this->IsPageRequest()) { // Validate request

			// Process list action first
			if ($this->ProcessListAction()) // Ajax request
				$this->Page_Terminate();

			// Handle reset command
			$this->ResetCmd();

			// Set up Breadcrumb
			if ($this->Export == "")
				$this->SetupBreadcrumb();

			// Hide list options
			if ($this->Export <> "") {
				$this->ListOptions->HideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->CurrentAction == "gridadd" || $this->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->Export <> "" || $this->CurrentAction <> "") {
				$this->ExportOptions->HideAllOptions();
				$this->FilterOptions->HideAllOptions();
			}

			// Hide other options
			if ($this->Export <> "") {
				foreach ($this->OtherOptions as &$option)
					$option->HideAllOptions();
			}

			// Get default search criteria
			ew_AddFilter($this->DefaultSearchWhere, $this->BasicSearchWhere(TRUE));

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Process filter list
			$this->ProcessFilterList();

			// Restore search parms from Session if not searching / reset / export
			if (($this->Export <> "" || $this->Command <> "search" && $this->Command <> "reset" && $this->Command <> "resetall") && $this->Command <> "json" && $this->CheckSearchParms())
				$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetupSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($this->Command <> "json" && $this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		if ($this->Command <> "json")
			$this->LoadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->CheckSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->LoadDefault();
			if ($this->BasicSearch->Keyword != "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Build search criteria
		ew_AddFilter($this->SearchWhere, $sSrchAdvanced);
		ew_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->Command <> "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		ew_AddFilter($sFilter, $this->DbDetailFilter);
		ew_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSQL = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $sFilter;
		} else {
			$this->setSessionWhere($sFilter);
			$this->CurrentFilter = "";
		}

		// Load record count first
		if (!$this->IsAddOrEdit()) {
			$bSelectLimit = $this->UseSelectLimit;
			if ($bSelectLimit) {
				$this->TotalRecs = $this->ListRecordCount();
			} else {
				if ($this->Recordset = $this->LoadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
		}

		// Search options
		$this->SetupSearchOptions();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue($this->FormKeyName));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $this->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$objForm->Index = $rowindex;
			$sThisKey = strval($objForm->GetValue($this->FormKeyName));
		}
		return $sWrkFilter;
	}

	// Set up key values
	function SetupKeyValues($key) {
		$arrKeyFlds = explode($GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arrKeyFlds) >= 1) {
			$this->ID_ALUNO->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($this->ID_ALUNO->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	function GetFilterList() {
		global $UserProfile;

		// Initialize
		$sFilterList = "";
		$sSavedFilterList = "";
		$sFilterList = ew_Concat($sFilterList, $this->ID_ALUNO->AdvancedSearch->ToJson(), ","); // Field ID_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->NOME_ALUNO->AdvancedSearch->ToJson(), ","); // Field NOME_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->MATRICULA_ALUNO->AdvancedSearch->ToJson(), ","); // Field MATRICULA_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->EMAIL_ALUNO->AdvancedSearch->ToJson(), ","); // Field EMAIL_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->CPF_ALUNO->AdvancedSearch->ToJson(), ","); // Field CPF_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->RG_ALUNO->AdvancedSearch->ToJson(), ","); // Field RG_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->SEXO_ALUNO->AdvancedSearch->ToJson(), ","); // Field SEXO_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->DATA_NASCIMENTO_ALUNO->AdvancedSearch->ToJson(), ","); // Field DATA_NASCIMENTO_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->TURNO_ALUNO->AdvancedSearch->ToJson(), ","); // Field TURNO_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->TELEFONE_ALUNO->AdvancedSearch->ToJson(), ","); // Field TELEFONE_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->RECORD_ALUNO->AdvancedSearch->ToJson(), ","); // Field RECORD_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->ID_NIVEL_ACESSO->AdvancedSearch->ToJson(), ","); // Field ID_NIVEL_ACESSO
		$sFilterList = ew_Concat($sFilterList, $this->ANO_ALUNO->AdvancedSearch->ToJson(), ","); // Field ANO_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->TURMA_ALUNO->AdvancedSearch->ToJson(), ","); // Field TURMA_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->SALA_ALUNO->AdvancedSearch->ToJson(), ","); // Field SALA_ALUNO
		$sFilterList = ew_Concat($sFilterList, $this->NUMERO_LIVROS->AdvancedSearch->ToJson(), ","); // Field NUMERO_LIVROS
		$sFilterList = ew_Concat($sFilterList, $this->FREQUENCIA_LIVRO->AdvancedSearch->ToJson(), ","); // Field FREQUENCIA_LIVRO
		if ($this->BasicSearch->Keyword <> "") {
			$sWrk = "\"" . EW_TABLE_BASIC_SEARCH . "\":\"" . ew_JsEncode2($this->BasicSearch->Keyword) . "\",\"" . EW_TABLE_BASIC_SEARCH_TYPE . "\":\"" . ew_JsEncode2($this->BasicSearch->Type) . "\"";
			$sFilterList = ew_Concat($sFilterList, $sWrk, ",");
		}
		$sFilterList = preg_replace('/,$/', "", $sFilterList);

		// Return filter list in json
		if ($sFilterList <> "")
			$sFilterList = "\"data\":{" . $sFilterList . "}";
		if ($sSavedFilterList <> "") {
			if ($sFilterList <> "")
				$sFilterList .= ",";
			$sFilterList .= "\"filters\":" . $sSavedFilterList;
		}
		return ($sFilterList <> "") ? "{" . $sFilterList . "}" : "null";
	}

	// Process filter list
	function ProcessFilterList() {
		global $UserProfile;
		if (@$_POST["ajax"] == "savefilters") { // Save filter request (Ajax)
			$filters = @$_POST["filters"];
			$UserProfile->SetSearchFilters(CurrentUserName(), "falunolistsrch", $filters);

			// Clean output buffer
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			echo ew_ArrayToJson(array(array("success" => TRUE))); // Success
			$this->Page_Terminate();
			exit();
		} elseif (@$_POST["cmd"] == "resetfilter") {
			$this->RestoreFilterList();
		}
	}

	// Restore list of filters
	function RestoreFilterList() {

		// Return if not reset filter
		if (@$_POST["cmd"] <> "resetfilter")
			return FALSE;
		$filter = json_decode(@$_POST["filter"], TRUE);
		$this->Command = "search";

		// Field ID_ALUNO
		$this->ID_ALUNO->AdvancedSearch->SearchValue = @$filter["x_ID_ALUNO"];
		$this->ID_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_ID_ALUNO"];
		$this->ID_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_ID_ALUNO"];
		$this->ID_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_ID_ALUNO"];
		$this->ID_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_ID_ALUNO"];
		$this->ID_ALUNO->AdvancedSearch->Save();

		// Field NOME_ALUNO
		$this->NOME_ALUNO->AdvancedSearch->SearchValue = @$filter["x_NOME_ALUNO"];
		$this->NOME_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_NOME_ALUNO"];
		$this->NOME_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_NOME_ALUNO"];
		$this->NOME_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_NOME_ALUNO"];
		$this->NOME_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_NOME_ALUNO"];
		$this->NOME_ALUNO->AdvancedSearch->Save();

		// Field MATRICULA_ALUNO
		$this->MATRICULA_ALUNO->AdvancedSearch->SearchValue = @$filter["x_MATRICULA_ALUNO"];
		$this->MATRICULA_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_MATRICULA_ALUNO"];
		$this->MATRICULA_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_MATRICULA_ALUNO"];
		$this->MATRICULA_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_MATRICULA_ALUNO"];
		$this->MATRICULA_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_MATRICULA_ALUNO"];
		$this->MATRICULA_ALUNO->AdvancedSearch->Save();

		// Field EMAIL_ALUNO
		$this->EMAIL_ALUNO->AdvancedSearch->SearchValue = @$filter["x_EMAIL_ALUNO"];
		$this->EMAIL_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_EMAIL_ALUNO"];
		$this->EMAIL_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_EMAIL_ALUNO"];
		$this->EMAIL_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_EMAIL_ALUNO"];
		$this->EMAIL_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_EMAIL_ALUNO"];
		$this->EMAIL_ALUNO->AdvancedSearch->Save();

		// Field CPF_ALUNO
		$this->CPF_ALUNO->AdvancedSearch->SearchValue = @$filter["x_CPF_ALUNO"];
		$this->CPF_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_CPF_ALUNO"];
		$this->CPF_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_CPF_ALUNO"];
		$this->CPF_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_CPF_ALUNO"];
		$this->CPF_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_CPF_ALUNO"];
		$this->CPF_ALUNO->AdvancedSearch->Save();

		// Field RG_ALUNO
		$this->RG_ALUNO->AdvancedSearch->SearchValue = @$filter["x_RG_ALUNO"];
		$this->RG_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_RG_ALUNO"];
		$this->RG_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_RG_ALUNO"];
		$this->RG_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_RG_ALUNO"];
		$this->RG_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_RG_ALUNO"];
		$this->RG_ALUNO->AdvancedSearch->Save();

		// Field SEXO_ALUNO
		$this->SEXO_ALUNO->AdvancedSearch->SearchValue = @$filter["x_SEXO_ALUNO"];
		$this->SEXO_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_SEXO_ALUNO"];
		$this->SEXO_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_SEXO_ALUNO"];
		$this->SEXO_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_SEXO_ALUNO"];
		$this->SEXO_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_SEXO_ALUNO"];
		$this->SEXO_ALUNO->AdvancedSearch->Save();

		// Field DATA_NASCIMENTO_ALUNO
		$this->DATA_NASCIMENTO_ALUNO->AdvancedSearch->SearchValue = @$filter["x_DATA_NASCIMENTO_ALUNO"];
		$this->DATA_NASCIMENTO_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_DATA_NASCIMENTO_ALUNO"];
		$this->DATA_NASCIMENTO_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_DATA_NASCIMENTO_ALUNO"];
		$this->DATA_NASCIMENTO_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_DATA_NASCIMENTO_ALUNO"];
		$this->DATA_NASCIMENTO_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_DATA_NASCIMENTO_ALUNO"];
		$this->DATA_NASCIMENTO_ALUNO->AdvancedSearch->Save();

		// Field TURNO_ALUNO
		$this->TURNO_ALUNO->AdvancedSearch->SearchValue = @$filter["x_TURNO_ALUNO"];
		$this->TURNO_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_TURNO_ALUNO"];
		$this->TURNO_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_TURNO_ALUNO"];
		$this->TURNO_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_TURNO_ALUNO"];
		$this->TURNO_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_TURNO_ALUNO"];
		$this->TURNO_ALUNO->AdvancedSearch->Save();

		// Field TELEFONE_ALUNO
		$this->TELEFONE_ALUNO->AdvancedSearch->SearchValue = @$filter["x_TELEFONE_ALUNO"];
		$this->TELEFONE_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_TELEFONE_ALUNO"];
		$this->TELEFONE_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_TELEFONE_ALUNO"];
		$this->TELEFONE_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_TELEFONE_ALUNO"];
		$this->TELEFONE_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_TELEFONE_ALUNO"];
		$this->TELEFONE_ALUNO->AdvancedSearch->Save();

		// Field RECORD_ALUNO
		$this->RECORD_ALUNO->AdvancedSearch->SearchValue = @$filter["x_RECORD_ALUNO"];
		$this->RECORD_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_RECORD_ALUNO"];
		$this->RECORD_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_RECORD_ALUNO"];
		$this->RECORD_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_RECORD_ALUNO"];
		$this->RECORD_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_RECORD_ALUNO"];
		$this->RECORD_ALUNO->AdvancedSearch->Save();

		// Field ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->AdvancedSearch->SearchValue = @$filter["x_ID_NIVEL_ACESSO"];
		$this->ID_NIVEL_ACESSO->AdvancedSearch->SearchOperator = @$filter["z_ID_NIVEL_ACESSO"];
		$this->ID_NIVEL_ACESSO->AdvancedSearch->SearchCondition = @$filter["v_ID_NIVEL_ACESSO"];
		$this->ID_NIVEL_ACESSO->AdvancedSearch->SearchValue2 = @$filter["y_ID_NIVEL_ACESSO"];
		$this->ID_NIVEL_ACESSO->AdvancedSearch->SearchOperator2 = @$filter["w_ID_NIVEL_ACESSO"];
		$this->ID_NIVEL_ACESSO->AdvancedSearch->Save();

		// Field ANO_ALUNO
		$this->ANO_ALUNO->AdvancedSearch->SearchValue = @$filter["x_ANO_ALUNO"];
		$this->ANO_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_ANO_ALUNO"];
		$this->ANO_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_ANO_ALUNO"];
		$this->ANO_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_ANO_ALUNO"];
		$this->ANO_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_ANO_ALUNO"];
		$this->ANO_ALUNO->AdvancedSearch->Save();

		// Field TURMA_ALUNO
		$this->TURMA_ALUNO->AdvancedSearch->SearchValue = @$filter["x_TURMA_ALUNO"];
		$this->TURMA_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_TURMA_ALUNO"];
		$this->TURMA_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_TURMA_ALUNO"];
		$this->TURMA_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_TURMA_ALUNO"];
		$this->TURMA_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_TURMA_ALUNO"];
		$this->TURMA_ALUNO->AdvancedSearch->Save();

		// Field SALA_ALUNO
		$this->SALA_ALUNO->AdvancedSearch->SearchValue = @$filter["x_SALA_ALUNO"];
		$this->SALA_ALUNO->AdvancedSearch->SearchOperator = @$filter["z_SALA_ALUNO"];
		$this->SALA_ALUNO->AdvancedSearch->SearchCondition = @$filter["v_SALA_ALUNO"];
		$this->SALA_ALUNO->AdvancedSearch->SearchValue2 = @$filter["y_SALA_ALUNO"];
		$this->SALA_ALUNO->AdvancedSearch->SearchOperator2 = @$filter["w_SALA_ALUNO"];
		$this->SALA_ALUNO->AdvancedSearch->Save();

		// Field NUMERO_LIVROS
		$this->NUMERO_LIVROS->AdvancedSearch->SearchValue = @$filter["x_NUMERO_LIVROS"];
		$this->NUMERO_LIVROS->AdvancedSearch->SearchOperator = @$filter["z_NUMERO_LIVROS"];
		$this->NUMERO_LIVROS->AdvancedSearch->SearchCondition = @$filter["v_NUMERO_LIVROS"];
		$this->NUMERO_LIVROS->AdvancedSearch->SearchValue2 = @$filter["y_NUMERO_LIVROS"];
		$this->NUMERO_LIVROS->AdvancedSearch->SearchOperator2 = @$filter["w_NUMERO_LIVROS"];
		$this->NUMERO_LIVROS->AdvancedSearch->Save();

		// Field FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->AdvancedSearch->SearchValue = @$filter["x_FREQUENCIA_LIVRO"];
		$this->FREQUENCIA_LIVRO->AdvancedSearch->SearchOperator = @$filter["z_FREQUENCIA_LIVRO"];
		$this->FREQUENCIA_LIVRO->AdvancedSearch->SearchCondition = @$filter["v_FREQUENCIA_LIVRO"];
		$this->FREQUENCIA_LIVRO->AdvancedSearch->SearchValue2 = @$filter["y_FREQUENCIA_LIVRO"];
		$this->FREQUENCIA_LIVRO->AdvancedSearch->SearchOperator2 = @$filter["w_FREQUENCIA_LIVRO"];
		$this->FREQUENCIA_LIVRO->AdvancedSearch->Save();
		$this->BasicSearch->setKeyword(@$filter[EW_TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[EW_TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	function BasicSearchSQL($arKeywords, $type) {
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $this->NOME_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->MATRICULA_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->EMAIL_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->CPF_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->RG_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->SEXO_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->DATA_NASCIMENTO_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->TURNO_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->TELEFONE_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->ANO_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->TURMA_ALUNO, $arKeywords, $type);
		$this->BuildBasicSearchSQL($sWhere, $this->SALA_ALUNO, $arKeywords, $type);
		return $sWhere;
	}

	// Build basic search SQL
	function BuildBasicSearchSQL(&$Where, &$Fld, $arKeywords, $type) {
		global $EW_BASIC_SEARCH_IGNORE_PATTERN;
		$sDefCond = ($type == "OR") ? "OR" : "AND";
		$arSQL = array(); // Array for SQL parts
		$arCond = array(); // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$Keyword = $arKeywords[$i];
			$Keyword = trim($Keyword);
			if ($EW_BASIC_SEARCH_IGNORE_PATTERN <> "") {
				$Keyword = preg_replace($EW_BASIC_SEARCH_IGNORE_PATTERN, "\\", $Keyword);
				$ar = explode("\\", $Keyword);
			} else {
				$ar = array($Keyword);
			}
			foreach ($ar as $Keyword) {
				if ($Keyword <> "") {
					$sWrk = "";
					if ($Keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j-1] = "OR";
					} elseif ($Keyword == EW_NULL_VALUE) {
						$sWrk = $Fld->FldExpression . " IS NULL";
					} elseif ($Keyword == EW_NOT_NULL_VALUE) {
						$sWrk = $Fld->FldExpression . " IS NOT NULL";
					} elseif ($Fld->FldIsVirtual) {
						$sWrk = $Fld->FldVirtualExpression . ew_Like(ew_QuotedValue("%" . $Keyword . "%", EW_DATATYPE_STRING, $this->DBID), $this->DBID);
					} elseif ($Fld->FldDataType != EW_DATATYPE_NUMBER || is_numeric($Keyword)) {
						$sWrk = $Fld->FldBasicSearchExpression . ew_Like(ew_QuotedValue("%" . $Keyword . "%", EW_DATATYPE_STRING, $this->DBID), $this->DBID);
					}
					if ($sWrk <> "") {
						$arSQL[$j] = $sWrk;
						$arCond[$j] = $sDefCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSQL);
		$bQuoted = FALSE;
		$sSql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt-1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$bQuoted) $sSql .= "(";
					$bQuoted = TRUE;
				}
				$sSql .= $arSQL[$i];
				if ($bQuoted && $arCond[$i] <> "OR") {
					$sSql .= ")";
					$bQuoted = FALSE;
				}
				$sSql .= " " . $arCond[$i] . " ";
			}
			$sSql .= $arSQL[$cnt-1];
			if ($bQuoted)
				$sSql .= ")";
		}
		if ($sSql <> "") {
			if ($Where <> "") $Where .= " OR ";
			$Where .= "(" . $sSql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	function BasicSearchWhere($Default = FALSE) {
		global $Security;
		$sSearchStr = "";
		$sSearchKeyword = ($Default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$sSearchType = ($Default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($sSearchKeyword <> "") {
			$ar = $this->BasicSearch->KeywordList($Default);

			// Search keyword in any fields
			if (($sSearchType == "OR" || $sSearchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $sKeyword) {
					if ($sKeyword <> "") {
						if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
						$sSearchStr .= "(" . $this->BasicSearchSQL(array($sKeyword), $sSearchType) . ")";
					}
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($ar, $sSearchType);
			}
			if (!$Default && in_array($this->Command, array("", "reset", "resetall"))) $this->Command = "search";
		}
		if (!$Default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($sSearchKeyword);
			$this->BasicSearch->setType($sSearchType);
		}
		return $sSearchStr;
	}

	// Check if search parm exists
	function CheckSearchParms() {

		// Check basic search
		if ($this->BasicSearch->IssetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Load advanced search default values
	function LoadAdvancedSearchDefault() {
		return FALSE;
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		$this->BasicSearch->UnsetSession();
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->Load();
	}

	// Set up sort parameters
	function SetupSortOrder() {

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$this->CurrentOrder = @$_GET["order"];
			$this->CurrentOrderType = @$_GET["ordertype"];
			$this->UpdateSort($this->ID_ALUNO); // ID_ALUNO
			$this->UpdateSort($this->NOME_ALUNO); // NOME_ALUNO
			$this->UpdateSort($this->MATRICULA_ALUNO); // MATRICULA_ALUNO
			$this->UpdateSort($this->EMAIL_ALUNO); // EMAIL_ALUNO
			$this->UpdateSort($this->CPF_ALUNO); // CPF_ALUNO
			$this->UpdateSort($this->RG_ALUNO); // RG_ALUNO
			$this->UpdateSort($this->SEXO_ALUNO); // SEXO_ALUNO
			$this->UpdateSort($this->DATA_NASCIMENTO_ALUNO); // DATA_NASCIMENTO_ALUNO
			$this->UpdateSort($this->TURNO_ALUNO); // TURNO_ALUNO
			$this->UpdateSort($this->TELEFONE_ALUNO); // TELEFONE_ALUNO
			$this->UpdateSort($this->RECORD_ALUNO); // RECORD_ALUNO
			$this->UpdateSort($this->ID_NIVEL_ACESSO); // ID_NIVEL_ACESSO
			$this->UpdateSort($this->ANO_ALUNO); // ANO_ALUNO
			$this->UpdateSort($this->TURMA_ALUNO); // TURMA_ALUNO
			$this->UpdateSort($this->SALA_ALUNO); // SALA_ALUNO
			$this->UpdateSort($this->NUMERO_LIVROS); // NUMERO_LIVROS
			$this->UpdateSort($this->FREQUENCIA_LIVRO); // FREQUENCIA_LIVRO
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		$sOrderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($this->getSqlOrderBy() <> "") {
				$sOrderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)
	function ResetCmd() {

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$sOrderBy = "";
				$this->setSessionOrderBy($sOrderBy);
				$this->ID_ALUNO->setSort("");
				$this->NOME_ALUNO->setSort("");
				$this->MATRICULA_ALUNO->setSort("");
				$this->EMAIL_ALUNO->setSort("");
				$this->CPF_ALUNO->setSort("");
				$this->RG_ALUNO->setSort("");
				$this->SEXO_ALUNO->setSort("");
				$this->DATA_NASCIMENTO_ALUNO->setSort("");
				$this->TURNO_ALUNO->setSort("");
				$this->TELEFONE_ALUNO->setSort("");
				$this->RECORD_ALUNO->setSort("");
				$this->ID_NIVEL_ACESSO->setSort("");
				$this->ANO_ALUNO->setSort("");
				$this->TURMA_ALUNO->setSort("");
				$this->SALA_ALUNO->setSort("");
				$this->NUMERO_LIVROS->setSort("");
				$this->FREQUENCIA_LIVRO->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->Add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->Add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "edit"
		$item = &$this->ListOptions->Add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "copy"
		$item = &$this->ListOptions->Add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "delete"
		$item = &$this->ListOptions->Add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// List actions
		$item = &$this->ListOptions->Add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->Add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = FALSE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" onclick=\"ew_SelectAllKey(this);\">";
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseImageAndText = TRUE;
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->Phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && ew_IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;
		$this->ListOptions->ButtonClass = "btn-sm"; // Class for button group

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		$this->SetupListOptionsExt();
		$item = &$this->ListOptions->GetItem($this->ListOptions->GroupOptionName);
		$item->Visible = $this->ListOptions->GroupOptionVisible();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $objForm;
		$this->ListOptions->LoadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// "view"
		$oListOpt = &$this->ListOptions->Items["view"];
		$viewcaption = ew_HtmlTitle($Language->Phrase("ViewLink"));
		if (TRUE) {
			$oListOpt->Body = "<a class=\"ewRowLink ewView\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . ew_HtmlEncode($this->ViewUrl) . "\">" . $Language->Phrase("ViewLink") . "</a>";
		} else {
			$oListOpt->Body = "";
		}

		// "edit"
		$oListOpt = &$this->ListOptions->Items["edit"];
		$editcaption = ew_HtmlTitle($Language->Phrase("EditLink"));
		if (TRUE) {
			$oListOpt->Body = "<a class=\"ewRowLink ewEdit\" title=\"" . ew_HtmlTitle($Language->Phrase("EditLink")) . "\" data-caption=\"" . ew_HtmlTitle($Language->Phrase("EditLink")) . "\" href=\"" . ew_HtmlEncode($this->EditUrl) . "\">" . $Language->Phrase("EditLink") . "</a>";
		} else {
			$oListOpt->Body = "";
		}

		// "copy"
		$oListOpt = &$this->ListOptions->Items["copy"];
		$copycaption = ew_HtmlTitle($Language->Phrase("CopyLink"));
		if (TRUE) {
			$oListOpt->Body = "<a class=\"ewRowLink ewCopy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . ew_HtmlEncode($this->CopyUrl) . "\">" . $Language->Phrase("CopyLink") . "</a>";
		} else {
			$oListOpt->Body = "";
		}

		// "delete"
		$oListOpt = &$this->ListOptions->Items["delete"];
		if (TRUE)
			$oListOpt->Body = "<a class=\"ewRowLink ewDelete\"" . "" . " title=\"" . ew_HtmlTitle($Language->Phrase("DeleteLink")) . "\" data-caption=\"" . ew_HtmlTitle($Language->Phrase("DeleteLink")) . "\" href=\"" . ew_HtmlEncode($this->DeleteUrl) . "\">" . $Language->Phrase("DeleteLink") . "</a>";
		else
			$oListOpt->Body = "";

		// Set up list action buttons
		$oListOpt = &$this->ListOptions->GetItem("listactions");
		if ($oListOpt && $this->Export == "" && $this->CurrentAction == "") {
			$body = "";
			$links = array();
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == EW_ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<span class=\"" . ew_HtmlEncode(str_replace(" ewIcon", "", $listaction->Icon)) . "\" data-caption=\"" . ew_HtmlTitle($caption) . "\"></span> " : "";
					$links[] = "<li><a class=\"ewAction ewListAction\" data-action=\"" . ew_HtmlEncode($action) . "\" data-caption=\"" . ew_HtmlTitle($caption) . "\" href=\"\" onclick=\"ew_SubmitAction(event,jQuery.extend({key:" . $this->KeyToJson() . "}," . $listaction->ToJson(TRUE) . "));return false;\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ewAction ewListAction\" data-action=\"" . ew_HtmlEncode($action) . "\" title=\"" . ew_HtmlTitle($caption) . "\" data-caption=\"" . ew_HtmlTitle($caption) . "\" href=\"\" onclick=\"ew_SubmitAction(event,jQuery.extend({key:" . $this->KeyToJson() . "}," . $listaction->ToJson(TRUE) . "));return false;\">" . $Language->Phrase("ListActionButton") . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default btn-sm ewActions\" title=\"" . ew_HtmlTitle($Language->Phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->Phrase("ListActionButton") . "<b class=\"caret\"></b></button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($oListOpt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$oListOpt->Body = $body;
				$oListOpt->Visible = TRUE;
			}
		}

		// "checkbox"
		$oListOpt = &$this->ListOptions->Items["checkbox"];
		$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ewMultiSelect\" value=\"" . ew_HtmlEncode($this->ID_ALUNO->CurrentValue) . "\" onclick=\"ew_ClickMultiCheckbox(event);\">";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	function SetupOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->Add("add");
		$addcaption = ew_HtmlTitle($Language->Phrase("AddLink"));
		$item->Body = "<a class=\"ewAddEdit ewAdd\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . ew_HtmlEncode($this->AddUrl) . "\">" . $Language->Phrase("AddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "");
		$option = $options["action"];

		// Set up options default
		foreach ($options as &$option) {
			$option->UseImageAndText = TRUE;
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;
			$option->ButtonClass = "btn-sm"; // Class for button group
			$item = &$option->Add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->Phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->Phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->Phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->Add("savecurrentfilter");
		$item->Body = "<a class=\"ewSaveFilter\" data-form=\"falunolistsrch\" href=\"#\">" . $Language->Phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->Add("deletefilter");
		$item->Body = "<a class=\"ewDeleteFilter\" data-form=\"falunolistsrch\" href=\"#\">" . $Language->Phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->Phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->Add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	function RenderOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == EW_ACTION_MULTIPLE) {
					$item = &$option->Add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<span class=\"" . ew_HtmlEncode($listaction->Icon) . "\" data-caption=\"" . ew_HtmlEncode($caption) . "\"></span> " : $caption;
					$item->Body = "<a class=\"ewAction ewListAction\" title=\"" . ew_HtmlEncode($caption) . "\" data-caption=\"" . ew_HtmlEncode($caption) . "\" href=\"\" onclick=\"ew_SubmitAction(event,jQuery.extend({f:document.falunolist}," . $listaction->ToJson(TRUE) . "));return false;\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecs <= 0) {
				$option = &$options["addedit"];
				$item = &$option->GetItem("gridedit");
				if ($item) $item->Visible = FALSE;
				$option = &$options["action"];
				$option->HideAllOptions();
			}
	}

	// Process list action
	function ProcessListAction() {
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$sFilter = $this->GetKeyFilter();
		$UserAction = @$_POST["useraction"];
		if ($sFilter <> "" && $UserAction <> "") {

			// Check permission first
			$ActionCaption = $UserAction;
			if (array_key_exists($UserAction, $this->ListActions->Items)) {
				$ActionCaption = $this->ListActions->Items[$UserAction]->Caption;
				if (!$this->ListActions->Items[$UserAction]->Allow) {
					$errmsg = str_replace('%s', $ActionCaption, $Language->Phrase("CustomActionNotAllowed"));
					if (@$_POST["ajax"] == $UserAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $sFilter;
			$sSql = $this->SQL();
			$conn = &$this->Connection();
			$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
			$rs = $conn->Execute($sSql);
			$conn->raiseErrorFn = '';
			$this->CurrentAction = $UserAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->BeginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$Processed = $this->Row_CustomAction($UserAction, $row);
					if (!$Processed) break;
					$rs->MoveNext();
				}
				if ($Processed) {
					$conn->CommitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage(str_replace('%s', $ActionCaption, $Language->Phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->RollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage <> "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $ActionCaption, $Language->Phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->Close();
			$this->CurrentAction = ""; // Clear action
			if (@$_POST["ajax"] == $UserAction) { // Ajax
				if ($this->getSuccessMessage() <> "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->ClearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() <> "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->ClearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up search options
	function SetupSearchOptions() {
		global $Language;
		$this->SearchOptions = new cListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ewSearchOption";

		// Search button
		$item = &$this->SearchOptions->Add("searchtoggle");
		$SearchToggleClass = ($this->SearchWhere <> "") ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ewSearchToggle" . $SearchToggleClass . "\" title=\"" . $Language->Phrase("SearchPanel") . "\" data-caption=\"" . $Language->Phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"falunolistsrch\">" . $Language->Phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->Add("showall");
		$item->Body = "<a class=\"btn btn-default ewShowAll\" title=\"" . $Language->Phrase("ShowAll") . "\" data-caption=\"" . $Language->Phrase("ShowAll") . "\" href=\"" . $this->PageUrl() . "cmd=reset\">" . $Language->Phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseImageAndText = TRUE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->Phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->Add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->Export <> "" || $this->CurrentAction <> "")
			$this->SearchOptions->HideAllOptions();
	}

	function SetupListOptionsExt() {
		global $Security, $Language;
	}

	function RenderListOptionsExt() {
		global $Security, $Language;
	}

	// Set up starting record parameters
	function SetupStartRec() {
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[EW_TABLE_START_REC];
				$this->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		$this->BasicSearch->Keyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		if ($this->BasicSearch->Keyword <> "" && $this->Command == "") $this->Command = "search";
		$this->BasicSearch->Type = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
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

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_ALUNO")) <> "")
			$this->ID_ALUNO->CurrentValue = $this->getKey("ID_ALUNO"); // ID_ALUNO
		else
			$bValidKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($bValidKey) {
			$this->CurrentFilter = $this->KeyFilter();
			$sSql = $this->SQL();
			$conn = &$this->Connection();
			$this->OldRecordset = ew_LoadRecordset($sSql, $conn);
		}
		$this->LoadRowValues($this->OldRecordset); // Load row values
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $Security, $Language, $gsLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->GetViewUrl();
		$this->EditUrl = $this->GetEditUrl();
		$this->InlineEditUrl = $this->GetInlineEditUrl();
		$this->CopyUrl = $this->GetCopyUrl();
		$this->InlineCopyUrl = $this->GetInlineCopyUrl();
		$this->DeleteUrl = $this->GetDeleteUrl();

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

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$url = substr(ew_CurrentUrl(), strrpos(ew_CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->Add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}
}
?>
<?php ew_Header(TRUE) ?>
<?php

// Create page object
if (!isset($aluno_list)) $aluno_list = new caluno_list();

// Page init
$aluno_list->Page_Init();

// Page main
$aluno_list->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aluno_list->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "list";
var CurrentForm = falunolist = new ew_Form("falunolist", "list");
falunolist.FormKeyCountName = '<?php echo $aluno_list->FormKeyCountName ?>';

// Form_CustomValidate event
falunolist.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
falunolist.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var CurrentSearchForm = falunolistsrch = new ew_Form("falunolistsrch");
</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<div class="ewToolbar">
<?php if ($aluno_list->TotalRecs > 0 && $aluno_list->ExportOptions->Visible()) { ?>
<?php $aluno_list->ExportOptions->Render("body") ?>
<?php } ?>
<?php if ($aluno_list->SearchOptions->Visible()) { ?>
<?php $aluno_list->SearchOptions->Render("body") ?>
<?php } ?>
<?php if ($aluno_list->FilterOptions->Visible()) { ?>
<?php $aluno_list->FilterOptions->Render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php
	$bSelectLimit = $aluno_list->UseSelectLimit;
	if ($bSelectLimit) {
		if ($aluno_list->TotalRecs <= 0)
			$aluno_list->TotalRecs = $aluno->ListRecordCount();
	} else {
		if (!$aluno_list->Recordset && ($aluno_list->Recordset = $aluno_list->LoadRecordset()))
			$aluno_list->TotalRecs = $aluno_list->Recordset->RecordCount();
	}
	$aluno_list->StartRec = 1;
	if ($aluno_list->DisplayRecs <= 0 || ($aluno->Export <> "" && $aluno->ExportAll)) // Display all records
		$aluno_list->DisplayRecs = $aluno_list->TotalRecs;
	if (!($aluno->Export <> "" && $aluno->ExportAll))
		$aluno_list->SetupStartRec(); // Set up start record position
	if ($bSelectLimit)
		$aluno_list->Recordset = $aluno_list->LoadRecordset($aluno_list->StartRec-1, $aluno_list->DisplayRecs);

	// Set no record found message
	if ($aluno->CurrentAction == "" && $aluno_list->TotalRecs == 0) {
		if ($aluno_list->SearchWhere == "0=101")
			$aluno_list->setWarningMessage($Language->Phrase("EnterSearchCriteria"));
		else
			$aluno_list->setWarningMessage($Language->Phrase("NoRecord"));
	}
$aluno_list->RenderOtherOptions();
?>
<?php if ($aluno->Export == "" && $aluno->CurrentAction == "") { ?>
<form name="falunolistsrch" id="falunolistsrch" class="form-inline ewForm ewExtSearchForm" action="<?php echo ew_CurrentPage() ?>">
<?php $SearchPanelClass = ($aluno_list->SearchWhere <> "") ? " in" : " in"; ?>
<div id="falunolistsrch_SearchPanel" class="ewSearchPanel collapse<?php echo $SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="aluno">
	<div class="ewBasicSearch">
<div id="xsr_1" class="ewRow">
	<div class="ewQuickSearch input-group">
	<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo ew_HtmlEncode($aluno_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo ew_HtmlEncode($Language->Phrase("Search")) ?>">
	<input type="hidden" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo ew_HtmlEncode($aluno_list->BasicSearch->getType()) ?>">
	<div class="input-group-btn">
		<button type="button" data-toggle="dropdown" class="btn btn-default"><span id="searchtype"><?php echo $aluno_list->BasicSearch->getTypeNameShort() ?></span><span class="caret"></span></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li<?php if ($aluno_list->BasicSearch->getType() == "") echo " class=\"active\""; ?>><a href="javascript:void(0);" onclick="ew_SetSearchType(this)"><?php echo $Language->Phrase("QuickSearchAuto") ?></a></li>
			<li<?php if ($aluno_list->BasicSearch->getType() == "=") echo " class=\"active\""; ?>><a href="javascript:void(0);" onclick="ew_SetSearchType(this,'=')"><?php echo $Language->Phrase("QuickSearchExact") ?></a></li>
			<li<?php if ($aluno_list->BasicSearch->getType() == "AND") echo " class=\"active\""; ?>><a href="javascript:void(0);" onclick="ew_SetSearchType(this,'AND')"><?php echo $Language->Phrase("QuickSearchAll") ?></a></li>
			<li<?php if ($aluno_list->BasicSearch->getType() == "OR") echo " class=\"active\""; ?>><a href="javascript:void(0);" onclick="ew_SetSearchType(this,'OR')"><?php echo $Language->Phrase("QuickSearchAny") ?></a></li>
		</ul>
	<button class="btn btn-primary ewButton" name="btnsubmit" id="btnsubmit" type="submit"><?php echo $Language->Phrase("SearchBtn") ?></button>
	</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $aluno_list->ShowPageHeader(); ?>
<?php
$aluno_list->ShowMessage();
?>
<?php if ($aluno_list->TotalRecs > 0 || $aluno->CurrentAction <> "") { ?>
<div class="box ewBox ewGrid<?php if ($aluno_list->IsAddOrEdit()) { ?> ewGridAddEdit<?php } ?> aluno">
<form name="falunolist" id="falunolist" class="form-inline ewForm ewListForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($aluno_list->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $aluno_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="aluno">
<div id="gmp_aluno" class="<?php if (ew_IsResponsiveLayout()) { ?>table-responsive <?php } ?>ewGridMiddlePanel">
<?php if ($aluno_list->TotalRecs > 0 || $aluno->CurrentAction == "gridedit") { ?>
<table id="tbl_alunolist" class="table ewTable">
<thead>
	<tr class="ewTableHeader">
<?php

// Header row
$aluno_list->RowType = EW_ROWTYPE_HEADER;

// Render list options
$aluno_list->RenderListOptions();

// Render list options (header, left)
$aluno_list->ListOptions->Render("header", "left");
?>
<?php if ($aluno->ID_ALUNO->Visible) { // ID_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->ID_ALUNO) == "") { ?>
		<th data-name="ID_ALUNO" class="<?php echo $aluno->ID_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_ID_ALUNO" class="aluno_ID_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->ID_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID_ALUNO" class="<?php echo $aluno->ID_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->ID_ALUNO) ?>',1);"><div id="elh_aluno_ID_ALUNO" class="aluno_ID_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->ID_ALUNO->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($aluno->ID_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->ID_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->NOME_ALUNO->Visible) { // NOME_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->NOME_ALUNO) == "") { ?>
		<th data-name="NOME_ALUNO" class="<?php echo $aluno->NOME_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_NOME_ALUNO" class="aluno_NOME_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->NOME_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOME_ALUNO" class="<?php echo $aluno->NOME_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->NOME_ALUNO) ?>',1);"><div id="elh_aluno_NOME_ALUNO" class="aluno_NOME_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->NOME_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->NOME_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->NOME_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->MATRICULA_ALUNO->Visible) { // MATRICULA_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->MATRICULA_ALUNO) == "") { ?>
		<th data-name="MATRICULA_ALUNO" class="<?php echo $aluno->MATRICULA_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_MATRICULA_ALUNO" class="aluno_MATRICULA_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->MATRICULA_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MATRICULA_ALUNO" class="<?php echo $aluno->MATRICULA_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->MATRICULA_ALUNO) ?>',1);"><div id="elh_aluno_MATRICULA_ALUNO" class="aluno_MATRICULA_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->MATRICULA_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->MATRICULA_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->MATRICULA_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->EMAIL_ALUNO->Visible) { // EMAIL_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->EMAIL_ALUNO) == "") { ?>
		<th data-name="EMAIL_ALUNO" class="<?php echo $aluno->EMAIL_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_EMAIL_ALUNO" class="aluno_EMAIL_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->EMAIL_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EMAIL_ALUNO" class="<?php echo $aluno->EMAIL_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->EMAIL_ALUNO) ?>',1);"><div id="elh_aluno_EMAIL_ALUNO" class="aluno_EMAIL_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->EMAIL_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->EMAIL_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->EMAIL_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->CPF_ALUNO->Visible) { // CPF_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->CPF_ALUNO) == "") { ?>
		<th data-name="CPF_ALUNO" class="<?php echo $aluno->CPF_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_CPF_ALUNO" class="aluno_CPF_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->CPF_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CPF_ALUNO" class="<?php echo $aluno->CPF_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->CPF_ALUNO) ?>',1);"><div id="elh_aluno_CPF_ALUNO" class="aluno_CPF_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->CPF_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->CPF_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->CPF_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->RG_ALUNO->Visible) { // RG_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->RG_ALUNO) == "") { ?>
		<th data-name="RG_ALUNO" class="<?php echo $aluno->RG_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_RG_ALUNO" class="aluno_RG_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->RG_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RG_ALUNO" class="<?php echo $aluno->RG_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->RG_ALUNO) ?>',1);"><div id="elh_aluno_RG_ALUNO" class="aluno_RG_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->RG_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->RG_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->RG_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->SEXO_ALUNO->Visible) { // SEXO_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->SEXO_ALUNO) == "") { ?>
		<th data-name="SEXO_ALUNO" class="<?php echo $aluno->SEXO_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_SEXO_ALUNO" class="aluno_SEXO_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->SEXO_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEXO_ALUNO" class="<?php echo $aluno->SEXO_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->SEXO_ALUNO) ?>',1);"><div id="elh_aluno_SEXO_ALUNO" class="aluno_SEXO_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->SEXO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->SEXO_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->SEXO_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->DATA_NASCIMENTO_ALUNO->Visible) { // DATA_NASCIMENTO_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->DATA_NASCIMENTO_ALUNO) == "") { ?>
		<th data-name="DATA_NASCIMENTO_ALUNO" class="<?php echo $aluno->DATA_NASCIMENTO_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_DATA_NASCIMENTO_ALUNO" class="aluno_DATA_NASCIMENTO_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->DATA_NASCIMENTO_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATA_NASCIMENTO_ALUNO" class="<?php echo $aluno->DATA_NASCIMENTO_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->DATA_NASCIMENTO_ALUNO) ?>',1);"><div id="elh_aluno_DATA_NASCIMENTO_ALUNO" class="aluno_DATA_NASCIMENTO_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->DATA_NASCIMENTO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->DATA_NASCIMENTO_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->DATA_NASCIMENTO_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->TURNO_ALUNO->Visible) { // TURNO_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->TURNO_ALUNO) == "") { ?>
		<th data-name="TURNO_ALUNO" class="<?php echo $aluno->TURNO_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_TURNO_ALUNO" class="aluno_TURNO_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->TURNO_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TURNO_ALUNO" class="<?php echo $aluno->TURNO_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->TURNO_ALUNO) ?>',1);"><div id="elh_aluno_TURNO_ALUNO" class="aluno_TURNO_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->TURNO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->TURNO_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->TURNO_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->TELEFONE_ALUNO->Visible) { // TELEFONE_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->TELEFONE_ALUNO) == "") { ?>
		<th data-name="TELEFONE_ALUNO" class="<?php echo $aluno->TELEFONE_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_TELEFONE_ALUNO" class="aluno_TELEFONE_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->TELEFONE_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TELEFONE_ALUNO" class="<?php echo $aluno->TELEFONE_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->TELEFONE_ALUNO) ?>',1);"><div id="elh_aluno_TELEFONE_ALUNO" class="aluno_TELEFONE_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->TELEFONE_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->TELEFONE_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->TELEFONE_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->RECORD_ALUNO->Visible) { // RECORD_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->RECORD_ALUNO) == "") { ?>
		<th data-name="RECORD_ALUNO" class="<?php echo $aluno->RECORD_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_RECORD_ALUNO" class="aluno_RECORD_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->RECORD_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RECORD_ALUNO" class="<?php echo $aluno->RECORD_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->RECORD_ALUNO) ?>',1);"><div id="elh_aluno_RECORD_ALUNO" class="aluno_RECORD_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->RECORD_ALUNO->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($aluno->RECORD_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->RECORD_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
	<?php if ($aluno->SortUrl($aluno->ID_NIVEL_ACESSO) == "") { ?>
		<th data-name="ID_NIVEL_ACESSO" class="<?php echo $aluno->ID_NIVEL_ACESSO->HeaderCellClass() ?>"><div id="elh_aluno_ID_NIVEL_ACESSO" class="aluno_ID_NIVEL_ACESSO"><div class="ewTableHeaderCaption"><?php echo $aluno->ID_NIVEL_ACESSO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID_NIVEL_ACESSO" class="<?php echo $aluno->ID_NIVEL_ACESSO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->ID_NIVEL_ACESSO) ?>',1);"><div id="elh_aluno_ID_NIVEL_ACESSO" class="aluno_ID_NIVEL_ACESSO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->ID_NIVEL_ACESSO->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($aluno->ID_NIVEL_ACESSO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->ID_NIVEL_ACESSO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->ANO_ALUNO->Visible) { // ANO_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->ANO_ALUNO) == "") { ?>
		<th data-name="ANO_ALUNO" class="<?php echo $aluno->ANO_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_ANO_ALUNO" class="aluno_ANO_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->ANO_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANO_ALUNO" class="<?php echo $aluno->ANO_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->ANO_ALUNO) ?>',1);"><div id="elh_aluno_ANO_ALUNO" class="aluno_ANO_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->ANO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->ANO_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->ANO_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->TURMA_ALUNO->Visible) { // TURMA_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->TURMA_ALUNO) == "") { ?>
		<th data-name="TURMA_ALUNO" class="<?php echo $aluno->TURMA_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_TURMA_ALUNO" class="aluno_TURMA_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->TURMA_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TURMA_ALUNO" class="<?php echo $aluno->TURMA_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->TURMA_ALUNO) ?>',1);"><div id="elh_aluno_TURMA_ALUNO" class="aluno_TURMA_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->TURMA_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->TURMA_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->TURMA_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->SALA_ALUNO->Visible) { // SALA_ALUNO ?>
	<?php if ($aluno->SortUrl($aluno->SALA_ALUNO) == "") { ?>
		<th data-name="SALA_ALUNO" class="<?php echo $aluno->SALA_ALUNO->HeaderCellClass() ?>"><div id="elh_aluno_SALA_ALUNO" class="aluno_SALA_ALUNO"><div class="ewTableHeaderCaption"><?php echo $aluno->SALA_ALUNO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SALA_ALUNO" class="<?php echo $aluno->SALA_ALUNO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->SALA_ALUNO) ?>',1);"><div id="elh_aluno_SALA_ALUNO" class="aluno_SALA_ALUNO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->SALA_ALUNO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></span><span class="ewTableHeaderSort"><?php if ($aluno->SALA_ALUNO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->SALA_ALUNO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
	<?php if ($aluno->SortUrl($aluno->NUMERO_LIVROS) == "") { ?>
		<th data-name="NUMERO_LIVROS" class="<?php echo $aluno->NUMERO_LIVROS->HeaderCellClass() ?>"><div id="elh_aluno_NUMERO_LIVROS" class="aluno_NUMERO_LIVROS"><div class="ewTableHeaderCaption"><?php echo $aluno->NUMERO_LIVROS->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NUMERO_LIVROS" class="<?php echo $aluno->NUMERO_LIVROS->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->NUMERO_LIVROS) ?>',1);"><div id="elh_aluno_NUMERO_LIVROS" class="aluno_NUMERO_LIVROS">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->NUMERO_LIVROS->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($aluno->NUMERO_LIVROS->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->NUMERO_LIVROS->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($aluno->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
	<?php if ($aluno->SortUrl($aluno->FREQUENCIA_LIVRO) == "") { ?>
		<th data-name="FREQUENCIA_LIVRO" class="<?php echo $aluno->FREQUENCIA_LIVRO->HeaderCellClass() ?>"><div id="elh_aluno_FREQUENCIA_LIVRO" class="aluno_FREQUENCIA_LIVRO"><div class="ewTableHeaderCaption"><?php echo $aluno->FREQUENCIA_LIVRO->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FREQUENCIA_LIVRO" class="<?php echo $aluno->FREQUENCIA_LIVRO->HeaderCellClass() ?>"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $aluno->SortUrl($aluno->FREQUENCIA_LIVRO) ?>',1);"><div id="elh_aluno_FREQUENCIA_LIVRO" class="aluno_FREQUENCIA_LIVRO">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $aluno->FREQUENCIA_LIVRO->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($aluno->FREQUENCIA_LIVRO->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($aluno->FREQUENCIA_LIVRO->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$aluno_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($aluno->ExportAll && $aluno->Export <> "") {
	$aluno_list->StopRec = $aluno_list->TotalRecs;
} else {

	// Set the last record to display
	if ($aluno_list->TotalRecs > $aluno_list->StartRec + $aluno_list->DisplayRecs - 1)
		$aluno_list->StopRec = $aluno_list->StartRec + $aluno_list->DisplayRecs - 1;
	else
		$aluno_list->StopRec = $aluno_list->TotalRecs;
}
$aluno_list->RecCnt = $aluno_list->StartRec - 1;
if ($aluno_list->Recordset && !$aluno_list->Recordset->EOF) {
	$aluno_list->Recordset->MoveFirst();
	$bSelectLimit = $aluno_list->UseSelectLimit;
	if (!$bSelectLimit && $aluno_list->StartRec > 1)
		$aluno_list->Recordset->Move($aluno_list->StartRec - 1);
} elseif (!$aluno->AllowAddDeleteRow && $aluno_list->StopRec == 0) {
	$aluno_list->StopRec = $aluno->GridAddRowCount;
}

// Initialize aggregate
$aluno->RowType = EW_ROWTYPE_AGGREGATEINIT;
$aluno->ResetAttrs();
$aluno_list->RenderRow();
while ($aluno_list->RecCnt < $aluno_list->StopRec) {
	$aluno_list->RecCnt++;
	if (intval($aluno_list->RecCnt) >= intval($aluno_list->StartRec)) {
		$aluno_list->RowCnt++;

		// Set up key count
		$aluno_list->KeyCount = $aluno_list->RowIndex;

		// Init row class and style
		$aluno->ResetAttrs();
		$aluno->CssClass = "";
		if ($aluno->CurrentAction == "gridadd") {
		} else {
			$aluno_list->LoadRowValues($aluno_list->Recordset); // Load row values
		}
		$aluno->RowType = EW_ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$aluno->RowAttrs = array_merge($aluno->RowAttrs, array('data-rowindex'=>$aluno_list->RowCnt, 'id'=>'r' . $aluno_list->RowCnt . '_aluno', 'data-rowtype'=>$aluno->RowType));

		// Render row
		$aluno_list->RenderRow();

		// Render list options
		$aluno_list->RenderListOptions();
?>
	<tr<?php echo $aluno->RowAttributes() ?>>
<?php

// Render list options (body, left)
$aluno_list->ListOptions->Render("body", "left", $aluno_list->RowCnt);
?>
	<?php if ($aluno->ID_ALUNO->Visible) { // ID_ALUNO ?>
		<td data-name="ID_ALUNO"<?php echo $aluno->ID_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_ID_ALUNO" class="aluno_ID_ALUNO">
<span<?php echo $aluno->ID_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->ID_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->NOME_ALUNO->Visible) { // NOME_ALUNO ?>
		<td data-name="NOME_ALUNO"<?php echo $aluno->NOME_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_NOME_ALUNO" class="aluno_NOME_ALUNO">
<span<?php echo $aluno->NOME_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->NOME_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->MATRICULA_ALUNO->Visible) { // MATRICULA_ALUNO ?>
		<td data-name="MATRICULA_ALUNO"<?php echo $aluno->MATRICULA_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_MATRICULA_ALUNO" class="aluno_MATRICULA_ALUNO">
<span<?php echo $aluno->MATRICULA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->MATRICULA_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->EMAIL_ALUNO->Visible) { // EMAIL_ALUNO ?>
		<td data-name="EMAIL_ALUNO"<?php echo $aluno->EMAIL_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_EMAIL_ALUNO" class="aluno_EMAIL_ALUNO">
<span<?php echo $aluno->EMAIL_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->EMAIL_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->CPF_ALUNO->Visible) { // CPF_ALUNO ?>
		<td data-name="CPF_ALUNO"<?php echo $aluno->CPF_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_CPF_ALUNO" class="aluno_CPF_ALUNO">
<span<?php echo $aluno->CPF_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->CPF_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->RG_ALUNO->Visible) { // RG_ALUNO ?>
		<td data-name="RG_ALUNO"<?php echo $aluno->RG_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_RG_ALUNO" class="aluno_RG_ALUNO">
<span<?php echo $aluno->RG_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->RG_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->SEXO_ALUNO->Visible) { // SEXO_ALUNO ?>
		<td data-name="SEXO_ALUNO"<?php echo $aluno->SEXO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_SEXO_ALUNO" class="aluno_SEXO_ALUNO">
<span<?php echo $aluno->SEXO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->SEXO_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->DATA_NASCIMENTO_ALUNO->Visible) { // DATA_NASCIMENTO_ALUNO ?>
		<td data-name="DATA_NASCIMENTO_ALUNO"<?php echo $aluno->DATA_NASCIMENTO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_DATA_NASCIMENTO_ALUNO" class="aluno_DATA_NASCIMENTO_ALUNO">
<span<?php echo $aluno->DATA_NASCIMENTO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->DATA_NASCIMENTO_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->TURNO_ALUNO->Visible) { // TURNO_ALUNO ?>
		<td data-name="TURNO_ALUNO"<?php echo $aluno->TURNO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_TURNO_ALUNO" class="aluno_TURNO_ALUNO">
<span<?php echo $aluno->TURNO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TURNO_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->TELEFONE_ALUNO->Visible) { // TELEFONE_ALUNO ?>
		<td data-name="TELEFONE_ALUNO"<?php echo $aluno->TELEFONE_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_TELEFONE_ALUNO" class="aluno_TELEFONE_ALUNO">
<span<?php echo $aluno->TELEFONE_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TELEFONE_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->RECORD_ALUNO->Visible) { // RECORD_ALUNO ?>
		<td data-name="RECORD_ALUNO"<?php echo $aluno->RECORD_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_RECORD_ALUNO" class="aluno_RECORD_ALUNO">
<span<?php echo $aluno->RECORD_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->RECORD_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
		<td data-name="ID_NIVEL_ACESSO"<?php echo $aluno->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_ID_NIVEL_ACESSO" class="aluno_ID_NIVEL_ACESSO">
<span<?php echo $aluno->ID_NIVEL_ACESSO->ViewAttributes() ?>>
<?php echo $aluno->ID_NIVEL_ACESSO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->ANO_ALUNO->Visible) { // ANO_ALUNO ?>
		<td data-name="ANO_ALUNO"<?php echo $aluno->ANO_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_ANO_ALUNO" class="aluno_ANO_ALUNO">
<span<?php echo $aluno->ANO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->ANO_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->TURMA_ALUNO->Visible) { // TURMA_ALUNO ?>
		<td data-name="TURMA_ALUNO"<?php echo $aluno->TURMA_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_TURMA_ALUNO" class="aluno_TURMA_ALUNO">
<span<?php echo $aluno->TURMA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TURMA_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->SALA_ALUNO->Visible) { // SALA_ALUNO ?>
		<td data-name="SALA_ALUNO"<?php echo $aluno->SALA_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_SALA_ALUNO" class="aluno_SALA_ALUNO">
<span<?php echo $aluno->SALA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->SALA_ALUNO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
		<td data-name="NUMERO_LIVROS"<?php echo $aluno->NUMERO_LIVROS->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_NUMERO_LIVROS" class="aluno_NUMERO_LIVROS">
<span<?php echo $aluno->NUMERO_LIVROS->ViewAttributes() ?>>
<?php echo $aluno->NUMERO_LIVROS->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($aluno->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
		<td data-name="FREQUENCIA_LIVRO"<?php echo $aluno->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $aluno_list->RowCnt ?>_aluno_FREQUENCIA_LIVRO" class="aluno_FREQUENCIA_LIVRO">
<span<?php echo $aluno->FREQUENCIA_LIVRO->ViewAttributes() ?>>
<?php echo $aluno->FREQUENCIA_LIVRO->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$aluno_list->ListOptions->Render("body", "right", $aluno_list->RowCnt);
?>
	</tr>
<?php
	}
	if ($aluno->CurrentAction <> "gridadd")
		$aluno_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
<?php if ($aluno->CurrentAction == "") { ?>
<input type="hidden" name="a_list" id="a_list" value="">
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($aluno_list->Recordset)
	$aluno_list->Recordset->Close();
?>
<div class="box-footer ewGridLowerPanel">
<?php if ($aluno->CurrentAction <> "gridadd" && $aluno->CurrentAction <> "gridedit") { ?>
<form name="ewPagerForm" class="ewForm form-inline ewPagerForm" action="<?php echo ew_CurrentPage() ?>">
<?php if (!isset($aluno_list->Pager)) $aluno_list->Pager = new cPrevNextPager($aluno_list->StartRec, $aluno_list->DisplayRecs, $aluno_list->TotalRecs, $aluno_list->AutoHidePager) ?>
<?php if ($aluno_list->Pager->RecordCount > 0 && $aluno_list->Pager->Visible) { ?>
<div class="ewPager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ewPrevNext"><div class="input-group">
<div class="input-group-btn">
<!--first page button-->
	<?php if ($aluno_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $aluno_list->PageUrl() ?>start=<?php echo $aluno_list->Pager->FirstButton->Start ?>"><span class="icon-first ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><span class="icon-first ewIcon"></span></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($aluno_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $aluno_list->PageUrl() ?>start=<?php echo $aluno_list->Pager->PrevButton->Start ?>"><span class="icon-prev ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><span class="icon-prev ewIcon"></span></a>
	<?php } ?>
</div>
<!--current page number-->
	<input class="form-control input-sm" type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $aluno_list->Pager->CurrentPage ?>">
<div class="input-group-btn">
<!--next page button-->
	<?php if ($aluno_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $aluno_list->PageUrl() ?>start=<?php echo $aluno_list->Pager->NextButton->Start ?>"><span class="icon-next ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><span class="icon-next ewIcon"></span></a>
	<?php } ?>
<!--last page button-->
	<?php if ($aluno_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $aluno_list->PageUrl() ?>start=<?php echo $aluno_list->Pager->LastButton->Start ?>"><span class="icon-last ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><span class="icon-last ewIcon"></span></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $aluno_list->Pager->PageCount ?></span>
</div>
<?php } ?>
<?php if ($aluno_list->Pager->RecordCount > 0) { ?>
<div class="ewPager ewRec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $aluno_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $aluno_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $aluno_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ewListOtherOptions">
<?php
	foreach ($aluno_list->OtherOptions as &$option)
		$option->Render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
</div>
<?php } ?>
<?php if ($aluno_list->TotalRecs == 0 && $aluno->CurrentAction == "") { // Show other options ?>
<div class="ewListOtherOptions">
<?php
	foreach ($aluno_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->Render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script type="text/javascript">
falunolistsrch.FilterList = <?php echo $aluno_list->GetFilterList() ?>;
falunolistsrch.Init();
falunolist.Init();
</script>
<?php
$aluno_list->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$aluno_list->Page_Terminate();
?>
