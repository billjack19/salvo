<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "emprestimo_livroinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$emprestimo_livro_edit = NULL; // Initialize page object first

class cemprestimo_livro_edit extends cemprestimo_livro {

	// Page ID
	var $PageID = 'edit';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'emprestimo_livro';

	// Page object name
	var $PageObjName = 'emprestimo_livro_edit';

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

		// Table object (emprestimo_livro)
		if (!isset($GLOBALS["emprestimo_livro"]) || get_class($GLOBALS["emprestimo_livro"]) == "cemprestimo_livro") {
			$GLOBALS["emprestimo_livro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["emprestimo_livro"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'emprestimo_livro', TRUE);

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

		// Is modal
		$this->IsModal = (@$_GET["modal"] == "1" || @$_POST["modal"] == "1");

		// Create form object
		$objForm = new cFormObj();
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
		$this->ID_EMPRESTIMO_LIVRO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_EMPRESTIMO_LIVRO->Visible = FALSE;
		$this->ID_LIVRO->SetVisibility();
		$this->ID_ALUNO->SetVisibility();
		$this->ID_CADASTRO->SetVisibility();
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->SetVisibility();
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->SetVisibility();
		$this->STATUS_EMPRESTIMO->SetVisibility();

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
		global $EW_EXPORT, $emprestimo_livro;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($emprestimo_livro);
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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = ew_GetPageName($url);
				if ($pageName != $this->GetListUrl()) { // Not List page
					$row["caption"] = $this->GetModalCaption($pageName);
					if ($pageName == "emprestimo_livroview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				header("Content-Type: application/json; charset=utf-8");
				echo ew_ConvertToUtf8(ew_ArrayToJson(array($row)));
			} else {
				ew_SaveDebugMsg();
				header("Location: " . $url);
			}
		}
		exit();
	}
	var $FormClassName = "form-horizontal ewForm ewEditForm";
	var $IsModal = FALSE;
	var $IsMobileOrModal = FALSE;
	var $DbMasterFilter;
	var $DbDetailFilter;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $gbSkipHeaderFooter;

		// Check modal
		if ($this->IsModal)
			$gbSkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = ew_IsMobile() || $this->IsModal;
		$this->FormClassName = "ewForm ewEditForm form-horizontal";
		$sReturnUrl = "";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (@$_POST["a_edit"] <> "") {
			$this->CurrentAction = $_POST["a_edit"]; // Get action code
			if ($this->CurrentAction <> "I") // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($objForm->HasValue("x_ID_EMPRESTIMO_LIVRO")) {
				$this->ID_EMPRESTIMO_LIVRO->setFormValue($objForm->GetValue("x_ID_EMPRESTIMO_LIVRO"));
			}
		} else {
			$this->CurrentAction = "I"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (isset($_GET["ID_EMPRESTIMO_LIVRO"])) {
				$this->ID_EMPRESTIMO_LIVRO->setQueryStringValue($_GET["ID_EMPRESTIMO_LIVRO"]);
				$loadByQuery = TRUE;
			} else {
				$this->ID_EMPRESTIMO_LIVRO->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->LoadRow();

		// Process form if post back
		if ($postBack) {
			$this->LoadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->ValidateForm()) {
				$this->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "I": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "") $this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("emprestimo_livrolist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$sReturnUrl = $this->getReturnUrl();
				if (ew_GetPageName($sReturnUrl) == "emprestimo_livrolist.php")
					$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} elseif ($this->getFailureMessage() == $Language->Phrase("NoRecord")) {
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Render the record
		$this->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->ResetAttrs();
		$this->RenderRow();
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

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $Language;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->ID_EMPRESTIMO_LIVRO->FldIsDetailKey)
			$this->ID_EMPRESTIMO_LIVRO->setFormValue($objForm->GetValue("x_ID_EMPRESTIMO_LIVRO"));
		if (!$this->ID_LIVRO->FldIsDetailKey) {
			$this->ID_LIVRO->setFormValue($objForm->GetValue("x_ID_LIVRO"));
		}
		if (!$this->ID_ALUNO->FldIsDetailKey) {
			$this->ID_ALUNO->setFormValue($objForm->GetValue("x_ID_ALUNO"));
		}
		if (!$this->ID_CADASTRO->FldIsDetailKey) {
			$this->ID_CADASTRO->setFormValue($objForm->GetValue("x_ID_CADASTRO"));
		}
		if (!$this->DATA_INICIAL_EMPRESTIMO_LIVRO->FldIsDetailKey) {
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->setFormValue($objForm->GetValue("x_DATA_INICIAL_EMPRESTIMO_LIVRO"));
		}
		if (!$this->DATA_FINAL_EMPRESTIMO_LIVRO->FldIsDetailKey) {
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->setFormValue($objForm->GetValue("x_DATA_FINAL_EMPRESTIMO_LIVRO"));
		}
		if (!$this->STATUS_EMPRESTIMO->FldIsDetailKey) {
			$this->STATUS_EMPRESTIMO->setFormValue($objForm->GetValue("x_STATUS_EMPRESTIMO"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->ID_EMPRESTIMO_LIVRO->CurrentValue = $this->ID_EMPRESTIMO_LIVRO->FormValue;
		$this->ID_LIVRO->CurrentValue = $this->ID_LIVRO->FormValue;
		$this->ID_ALUNO->CurrentValue = $this->ID_ALUNO->FormValue;
		$this->ID_CADASTRO->CurrentValue = $this->ID_CADASTRO->FormValue;
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->CurrentValue = $this->DATA_INICIAL_EMPRESTIMO_LIVRO->FormValue;
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->CurrentValue = $this->DATA_FINAL_EMPRESTIMO_LIVRO->FormValue;
		$this->STATUS_EMPRESTIMO->CurrentValue = $this->STATUS_EMPRESTIMO->FormValue;
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
		$this->ID_EMPRESTIMO_LIVRO->setDbValue($row['ID_EMPRESTIMO_LIVRO']);
		$this->ID_LIVRO->setDbValue($row['ID_LIVRO']);
		$this->ID_ALUNO->setDbValue($row['ID_ALUNO']);
		$this->ID_CADASTRO->setDbValue($row['ID_CADASTRO']);
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->setDbValue($row['DATA_INICIAL_EMPRESTIMO_LIVRO']);
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->setDbValue($row['DATA_FINAL_EMPRESTIMO_LIVRO']);
		$this->STATUS_EMPRESTIMO->setDbValue($row['STATUS_EMPRESTIMO']);
	}

	// Return a row with default values
	function NewRow() {
		$row = array();
		$row['ID_EMPRESTIMO_LIVRO'] = NULL;
		$row['ID_LIVRO'] = NULL;
		$row['ID_ALUNO'] = NULL;
		$row['ID_CADASTRO'] = NULL;
		$row['DATA_INICIAL_EMPRESTIMO_LIVRO'] = NULL;
		$row['DATA_FINAL_EMPRESTIMO_LIVRO'] = NULL;
		$row['STATUS_EMPRESTIMO'] = NULL;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_EMPRESTIMO_LIVRO->DbValue = $row['ID_EMPRESTIMO_LIVRO'];
		$this->ID_LIVRO->DbValue = $row['ID_LIVRO'];
		$this->ID_ALUNO->DbValue = $row['ID_ALUNO'];
		$this->ID_CADASTRO->DbValue = $row['ID_CADASTRO'];
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->DbValue = $row['DATA_INICIAL_EMPRESTIMO_LIVRO'];
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->DbValue = $row['DATA_FINAL_EMPRESTIMO_LIVRO'];
		$this->STATUS_EMPRESTIMO->DbValue = $row['STATUS_EMPRESTIMO'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_EMPRESTIMO_LIVRO")) <> "")
			$this->ID_EMPRESTIMO_LIVRO->CurrentValue = $this->getKey("ID_EMPRESTIMO_LIVRO"); // ID_EMPRESTIMO_LIVRO
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
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// ID_EMPRESTIMO_LIVRO
		// ID_LIVRO
		// ID_ALUNO
		// ID_CADASTRO
		// DATA_INICIAL_EMPRESTIMO_LIVRO
		// DATA_FINAL_EMPRESTIMO_LIVRO
		// STATUS_EMPRESTIMO

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_EMPRESTIMO_LIVRO
		$this->ID_EMPRESTIMO_LIVRO->ViewValue = $this->ID_EMPRESTIMO_LIVRO->CurrentValue;
		$this->ID_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// ID_LIVRO
		$this->ID_LIVRO->ViewValue = $this->ID_LIVRO->CurrentValue;
		$this->ID_LIVRO->ViewCustomAttributes = "";

		// ID_ALUNO
		$this->ID_ALUNO->ViewValue = $this->ID_ALUNO->CurrentValue;
		$this->ID_ALUNO->ViewCustomAttributes = "";

		// ID_CADASTRO
		$this->ID_CADASTRO->ViewValue = $this->ID_CADASTRO->CurrentValue;
		$this->ID_CADASTRO->ViewCustomAttributes = "";

		// DATA_INICIAL_EMPRESTIMO_LIVRO
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->ViewValue = $this->DATA_INICIAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// DATA_FINAL_EMPRESTIMO_LIVRO
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->ViewValue = $this->DATA_FINAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// STATUS_EMPRESTIMO
		$this->STATUS_EMPRESTIMO->ViewValue = $this->STATUS_EMPRESTIMO->CurrentValue;
		$this->STATUS_EMPRESTIMO->ViewCustomAttributes = "";

			// ID_EMPRESTIMO_LIVRO
			$this->ID_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->ID_EMPRESTIMO_LIVRO->HrefValue = "";
			$this->ID_EMPRESTIMO_LIVRO->TooltipValue = "";

			// ID_LIVRO
			$this->ID_LIVRO->LinkCustomAttributes = "";
			$this->ID_LIVRO->HrefValue = "";
			$this->ID_LIVRO->TooltipValue = "";

			// ID_ALUNO
			$this->ID_ALUNO->LinkCustomAttributes = "";
			$this->ID_ALUNO->HrefValue = "";
			$this->ID_ALUNO->TooltipValue = "";

			// ID_CADASTRO
			$this->ID_CADASTRO->LinkCustomAttributes = "";
			$this->ID_CADASTRO->HrefValue = "";
			$this->ID_CADASTRO->TooltipValue = "";

			// DATA_INICIAL_EMPRESTIMO_LIVRO
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->HrefValue = "";
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->TooltipValue = "";

			// DATA_FINAL_EMPRESTIMO_LIVRO
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->HrefValue = "";
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->TooltipValue = "";

			// STATUS_EMPRESTIMO
			$this->STATUS_EMPRESTIMO->LinkCustomAttributes = "";
			$this->STATUS_EMPRESTIMO->HrefValue = "";
			$this->STATUS_EMPRESTIMO->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// ID_EMPRESTIMO_LIVRO
			$this->ID_EMPRESTIMO_LIVRO->EditAttrs["class"] = "form-control";
			$this->ID_EMPRESTIMO_LIVRO->EditCustomAttributes = "";
			$this->ID_EMPRESTIMO_LIVRO->EditValue = $this->ID_EMPRESTIMO_LIVRO->CurrentValue;
			$this->ID_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

			// ID_LIVRO
			$this->ID_LIVRO->EditAttrs["class"] = "form-control";
			$this->ID_LIVRO->EditCustomAttributes = "";
			$this->ID_LIVRO->EditValue = ew_HtmlEncode($this->ID_LIVRO->CurrentValue);
			$this->ID_LIVRO->PlaceHolder = ew_RemoveHtml($this->ID_LIVRO->FldCaption());

			// ID_ALUNO
			$this->ID_ALUNO->EditAttrs["class"] = "form-control";
			$this->ID_ALUNO->EditCustomAttributes = "";
			$this->ID_ALUNO->EditValue = ew_HtmlEncode($this->ID_ALUNO->CurrentValue);
			$this->ID_ALUNO->PlaceHolder = ew_RemoveHtml($this->ID_ALUNO->FldCaption());

			// ID_CADASTRO
			$this->ID_CADASTRO->EditAttrs["class"] = "form-control";
			$this->ID_CADASTRO->EditCustomAttributes = "";
			$this->ID_CADASTRO->EditValue = ew_HtmlEncode($this->ID_CADASTRO->CurrentValue);
			$this->ID_CADASTRO->PlaceHolder = ew_RemoveHtml($this->ID_CADASTRO->FldCaption());

			// DATA_INICIAL_EMPRESTIMO_LIVRO
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->EditAttrs["class"] = "form-control";
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->EditCustomAttributes = "";
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->EditValue = ew_HtmlEncode($this->DATA_INICIAL_EMPRESTIMO_LIVRO->CurrentValue);
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->PlaceHolder = ew_RemoveHtml($this->DATA_INICIAL_EMPRESTIMO_LIVRO->FldCaption());

			// DATA_FINAL_EMPRESTIMO_LIVRO
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->EditAttrs["class"] = "form-control";
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->EditCustomAttributes = "";
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->EditValue = ew_HtmlEncode($this->DATA_FINAL_EMPRESTIMO_LIVRO->CurrentValue);
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->PlaceHolder = ew_RemoveHtml($this->DATA_FINAL_EMPRESTIMO_LIVRO->FldCaption());

			// STATUS_EMPRESTIMO
			$this->STATUS_EMPRESTIMO->EditAttrs["class"] = "form-control";
			$this->STATUS_EMPRESTIMO->EditCustomAttributes = "";
			$this->STATUS_EMPRESTIMO->EditValue = ew_HtmlEncode($this->STATUS_EMPRESTIMO->CurrentValue);
			$this->STATUS_EMPRESTIMO->PlaceHolder = ew_RemoveHtml($this->STATUS_EMPRESTIMO->FldCaption());

			// Edit refer script
			// ID_EMPRESTIMO_LIVRO

			$this->ID_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->ID_EMPRESTIMO_LIVRO->HrefValue = "";

			// ID_LIVRO
			$this->ID_LIVRO->LinkCustomAttributes = "";
			$this->ID_LIVRO->HrefValue = "";

			// ID_ALUNO
			$this->ID_ALUNO->LinkCustomAttributes = "";
			$this->ID_ALUNO->HrefValue = "";

			// ID_CADASTRO
			$this->ID_CADASTRO->LinkCustomAttributes = "";
			$this->ID_CADASTRO->HrefValue = "";

			// DATA_INICIAL_EMPRESTIMO_LIVRO
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->HrefValue = "";

			// DATA_FINAL_EMPRESTIMO_LIVRO
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->HrefValue = "";

			// STATUS_EMPRESTIMO
			$this->STATUS_EMPRESTIMO->LinkCustomAttributes = "";
			$this->STATUS_EMPRESTIMO->HrefValue = "";
		}
		if ($this->RowType == EW_ROWTYPE_ADD || $this->RowType == EW_ROWTYPE_EDIT || $this->RowType == EW_ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->SetupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!$this->ID_LIVRO->FldIsDetailKey && !is_null($this->ID_LIVRO->FormValue) && $this->ID_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ID_LIVRO->FldCaption(), $this->ID_LIVRO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ID_LIVRO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_LIVRO->FldErrMsg());
		}
		if (!ew_CheckInteger($this->ID_ALUNO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_ALUNO->FldErrMsg());
		}
		if (!$this->ID_CADASTRO->FldIsDetailKey && !is_null($this->ID_CADASTRO->FormValue) && $this->ID_CADASTRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ID_CADASTRO->FldCaption(), $this->ID_CADASTRO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ID_CADASTRO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_CADASTRO->FldErrMsg());
		}
		if (!$this->DATA_INICIAL_EMPRESTIMO_LIVRO->FldIsDetailKey && !is_null($this->DATA_INICIAL_EMPRESTIMO_LIVRO->FormValue) && $this->DATA_INICIAL_EMPRESTIMO_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DATA_INICIAL_EMPRESTIMO_LIVRO->FldCaption(), $this->DATA_INICIAL_EMPRESTIMO_LIVRO->ReqErrMsg));
		}
		if (!$this->DATA_FINAL_EMPRESTIMO_LIVRO->FldIsDetailKey && !is_null($this->DATA_FINAL_EMPRESTIMO_LIVRO->FormValue) && $this->DATA_FINAL_EMPRESTIMO_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DATA_FINAL_EMPRESTIMO_LIVRO->FldCaption(), $this->DATA_FINAL_EMPRESTIMO_LIVRO->ReqErrMsg));
		}
		if (!$this->STATUS_EMPRESTIMO->FldIsDetailKey && !is_null($this->STATUS_EMPRESTIMO->FormValue) && $this->STATUS_EMPRESTIMO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->STATUS_EMPRESTIMO->FldCaption(), $this->STATUS_EMPRESTIMO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->STATUS_EMPRESTIMO->FormValue)) {
			ew_AddMessage($gsFormError, $this->STATUS_EMPRESTIMO->FldErrMsg());
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			ew_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $Security, $Language;
		$sFilter = $this->KeyFilter();
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$conn = &$this->Connection();
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->LoadDbValues($rsold);
			$rsnew = array();

			// ID_LIVRO
			$this->ID_LIVRO->SetDbValueDef($rsnew, $this->ID_LIVRO->CurrentValue, 0, $this->ID_LIVRO->ReadOnly);

			// ID_ALUNO
			$this->ID_ALUNO->SetDbValueDef($rsnew, $this->ID_ALUNO->CurrentValue, NULL, $this->ID_ALUNO->ReadOnly);

			// ID_CADASTRO
			$this->ID_CADASTRO->SetDbValueDef($rsnew, $this->ID_CADASTRO->CurrentValue, 0, $this->ID_CADASTRO->ReadOnly);

			// DATA_INICIAL_EMPRESTIMO_LIVRO
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->SetDbValueDef($rsnew, $this->DATA_INICIAL_EMPRESTIMO_LIVRO->CurrentValue, "", $this->DATA_INICIAL_EMPRESTIMO_LIVRO->ReadOnly);

			// DATA_FINAL_EMPRESTIMO_LIVRO
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->SetDbValueDef($rsnew, $this->DATA_FINAL_EMPRESTIMO_LIVRO->CurrentValue, "", $this->DATA_FINAL_EMPRESTIMO_LIVRO->ReadOnly);

			// STATUS_EMPRESTIMO
			$this->STATUS_EMPRESTIMO->SetDbValueDef($rsnew, $this->STATUS_EMPRESTIMO->CurrentValue, 0, $this->STATUS_EMPRESTIMO->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $this->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
				if (count($rsnew) > 0)
					$EditRow = $this->Update($rsnew, "", $rsold);
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($EditRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$url = substr(ew_CurrentUrl(), strrpos(ew_CurrentUrl(), "/")+1);
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("emprestimo_livrolist.php"), "", $this->TableVar, TRUE);
		$PageId = "edit";
		$Breadcrumb->Add("edit", $PageId, $url);
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
}
?>
<?php ew_Header(TRUE) ?>
<?php

// Create page object
if (!isset($emprestimo_livro_edit)) $emprestimo_livro_edit = new cemprestimo_livro_edit();

// Page init
$emprestimo_livro_edit->Page_Init();

// Page main
$emprestimo_livro_edit->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$emprestimo_livro_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "edit";
var CurrentForm = femprestimo_livroedit = new ew_Form("femprestimo_livroedit", "edit");

// Validate form
femprestimo_livroedit.Validate = function() {
	if (!this.ValidateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.GetForm(), $fobj = $(fobj);
	if ($fobj.find("#a_confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.FormKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = $fobj.find("#a_list").val() == "gridinsert";
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
			elm = this.GetElements("x" + infix + "_ID_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_livro->ID_LIVRO->FldCaption(), $emprestimo_livro->ID_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($emprestimo_livro->ID_LIVRO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_ID_ALUNO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($emprestimo_livro->ID_ALUNO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_ID_CADASTRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_livro->ID_CADASTRO->FldCaption(), $emprestimo_livro->ID_CADASTRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_CADASTRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($emprestimo_livro->ID_CADASTRO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_DATA_INICIAL_EMPRESTIMO_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->FldCaption(), $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_DATA_FINAL_EMPRESTIMO_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->FldCaption(), $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_STATUS_EMPRESTIMO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_livro->STATUS_EMPRESTIMO->FldCaption(), $emprestimo_livro->STATUS_EMPRESTIMO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_STATUS_EMPRESTIMO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($emprestimo_livro->STATUS_EMPRESTIMO->FldErrMsg()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ewForms[val])
			if (!ewForms[val].Validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
femprestimo_livroedit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
femprestimo_livroedit.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $emprestimo_livro_edit->ShowPageHeader(); ?>
<?php
$emprestimo_livro_edit->ShowMessage();
?>
<form name="femprestimo_livroedit" id="femprestimo_livroedit" class="<?php echo $emprestimo_livro_edit->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($emprestimo_livro_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $emprestimo_livro_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="emprestimo_livro">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<input type="hidden" name="modal" value="<?php echo intval($emprestimo_livro_edit->IsModal) ?>">
<div class="ewEditDiv"><!-- page* -->
<?php if ($emprestimo_livro->ID_EMPRESTIMO_LIVRO->Visible) { // ID_EMPRESTIMO_LIVRO ?>
	<div id="r_ID_EMPRESTIMO_LIVRO" class="form-group">
		<label id="elh_emprestimo_livro_ID_EMPRESTIMO_LIVRO" class="<?php echo $emprestimo_livro_edit->LeftColumnClass ?>"><?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $emprestimo_livro_edit->RightColumnClass ?>"><div<?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->CellAttributes() ?>>
<span id="el_emprestimo_livro_ID_EMPRESTIMO_LIVRO">
<span<?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->EditValue ?></p></span>
</span>
<input type="hidden" data-table="emprestimo_livro" data-field="x_ID_EMPRESTIMO_LIVRO" name="x_ID_EMPRESTIMO_LIVRO" id="x_ID_EMPRESTIMO_LIVRO" value="<?php echo ew_HtmlEncode($emprestimo_livro->ID_EMPRESTIMO_LIVRO->CurrentValue) ?>">
<?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_livro->ID_LIVRO->Visible) { // ID_LIVRO ?>
	<div id="r_ID_LIVRO" class="form-group">
		<label id="elh_emprestimo_livro_ID_LIVRO" for="x_ID_LIVRO" class="<?php echo $emprestimo_livro_edit->LeftColumnClass ?>"><?php echo $emprestimo_livro->ID_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_livro_edit->RightColumnClass ?>"><div<?php echo $emprestimo_livro->ID_LIVRO->CellAttributes() ?>>
<span id="el_emprestimo_livro_ID_LIVRO">
<input type="text" data-table="emprestimo_livro" data-field="x_ID_LIVRO" name="x_ID_LIVRO" id="x_ID_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($emprestimo_livro->ID_LIVRO->getPlaceHolder()) ?>" value="<?php echo $emprestimo_livro->ID_LIVRO->EditValue ?>"<?php echo $emprestimo_livro->ID_LIVRO->EditAttributes() ?>>
</span>
<?php echo $emprestimo_livro->ID_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_livro->ID_ALUNO->Visible) { // ID_ALUNO ?>
	<div id="r_ID_ALUNO" class="form-group">
		<label id="elh_emprestimo_livro_ID_ALUNO" for="x_ID_ALUNO" class="<?php echo $emprestimo_livro_edit->LeftColumnClass ?>"><?php echo $emprestimo_livro->ID_ALUNO->FldCaption() ?></label>
		<div class="<?php echo $emprestimo_livro_edit->RightColumnClass ?>"><div<?php echo $emprestimo_livro->ID_ALUNO->CellAttributes() ?>>
<span id="el_emprestimo_livro_ID_ALUNO">
<input type="text" data-table="emprestimo_livro" data-field="x_ID_ALUNO" name="x_ID_ALUNO" id="x_ID_ALUNO" size="30" placeholder="<?php echo ew_HtmlEncode($emprestimo_livro->ID_ALUNO->getPlaceHolder()) ?>" value="<?php echo $emprestimo_livro->ID_ALUNO->EditValue ?>"<?php echo $emprestimo_livro->ID_ALUNO->EditAttributes() ?>>
</span>
<?php echo $emprestimo_livro->ID_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_livro->ID_CADASTRO->Visible) { // ID_CADASTRO ?>
	<div id="r_ID_CADASTRO" class="form-group">
		<label id="elh_emprestimo_livro_ID_CADASTRO" for="x_ID_CADASTRO" class="<?php echo $emprestimo_livro_edit->LeftColumnClass ?>"><?php echo $emprestimo_livro->ID_CADASTRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_livro_edit->RightColumnClass ?>"><div<?php echo $emprestimo_livro->ID_CADASTRO->CellAttributes() ?>>
<span id="el_emprestimo_livro_ID_CADASTRO">
<input type="text" data-table="emprestimo_livro" data-field="x_ID_CADASTRO" name="x_ID_CADASTRO" id="x_ID_CADASTRO" size="30" placeholder="<?php echo ew_HtmlEncode($emprestimo_livro->ID_CADASTRO->getPlaceHolder()) ?>" value="<?php echo $emprestimo_livro->ID_CADASTRO->EditValue ?>"<?php echo $emprestimo_livro->ID_CADASTRO->EditAttributes() ?>>
</span>
<?php echo $emprestimo_livro->ID_CADASTRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->Visible) { // DATA_INICIAL_EMPRESTIMO_LIVRO ?>
	<div id="r_DATA_INICIAL_EMPRESTIMO_LIVRO" class="form-group">
		<label id="elh_emprestimo_livro_DATA_INICIAL_EMPRESTIMO_LIVRO" for="x_DATA_INICIAL_EMPRESTIMO_LIVRO" class="<?php echo $emprestimo_livro_edit->LeftColumnClass ?>"><?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_livro_edit->RightColumnClass ?>"><div<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->CellAttributes() ?>>
<span id="el_emprestimo_livro_DATA_INICIAL_EMPRESTIMO_LIVRO">
<input type="text" data-table="emprestimo_livro" data-field="x_DATA_INICIAL_EMPRESTIMO_LIVRO" name="x_DATA_INICIAL_EMPRESTIMO_LIVRO" id="x_DATA_INICIAL_EMPRESTIMO_LIVRO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->getPlaceHolder()) ?>" value="<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->EditValue ?>"<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->EditAttributes() ?>>
</span>
<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->Visible) { // DATA_FINAL_EMPRESTIMO_LIVRO ?>
	<div id="r_DATA_FINAL_EMPRESTIMO_LIVRO" class="form-group">
		<label id="elh_emprestimo_livro_DATA_FINAL_EMPRESTIMO_LIVRO" for="x_DATA_FINAL_EMPRESTIMO_LIVRO" class="<?php echo $emprestimo_livro_edit->LeftColumnClass ?>"><?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_livro_edit->RightColumnClass ?>"><div<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->CellAttributes() ?>>
<span id="el_emprestimo_livro_DATA_FINAL_EMPRESTIMO_LIVRO">
<input type="text" data-table="emprestimo_livro" data-field="x_DATA_FINAL_EMPRESTIMO_LIVRO" name="x_DATA_FINAL_EMPRESTIMO_LIVRO" id="x_DATA_FINAL_EMPRESTIMO_LIVRO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->getPlaceHolder()) ?>" value="<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->EditValue ?>"<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->EditAttributes() ?>>
</span>
<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_livro->STATUS_EMPRESTIMO->Visible) { // STATUS_EMPRESTIMO ?>
	<div id="r_STATUS_EMPRESTIMO" class="form-group">
		<label id="elh_emprestimo_livro_STATUS_EMPRESTIMO" for="x_STATUS_EMPRESTIMO" class="<?php echo $emprestimo_livro_edit->LeftColumnClass ?>"><?php echo $emprestimo_livro->STATUS_EMPRESTIMO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_livro_edit->RightColumnClass ?>"><div<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->CellAttributes() ?>>
<span id="el_emprestimo_livro_STATUS_EMPRESTIMO">
<input type="text" data-table="emprestimo_livro" data-field="x_STATUS_EMPRESTIMO" name="x_STATUS_EMPRESTIMO" id="x_STATUS_EMPRESTIMO" size="30" placeholder="<?php echo ew_HtmlEncode($emprestimo_livro->STATUS_EMPRESTIMO->getPlaceHolder()) ?>" value="<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->EditValue ?>"<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->EditAttributes() ?>>
</span>
<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$emprestimo_livro_edit->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $emprestimo_livro_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $emprestimo_livro_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
femprestimo_livroedit.Init();
</script>
<?php
$emprestimo_livro_edit->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$emprestimo_livro_edit->Page_Terminate();
?>
