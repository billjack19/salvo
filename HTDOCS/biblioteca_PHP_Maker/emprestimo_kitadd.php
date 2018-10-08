<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "emprestimo_kitinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$emprestimo_kit_add = NULL; // Initialize page object first

class cemprestimo_kit_add extends cemprestimo_kit {

	// Page ID
	var $PageID = 'add';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'emprestimo_kit';

	// Page object name
	var $PageObjName = 'emprestimo_kit_add';

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

		// Table object (emprestimo_kit)
		if (!isset($GLOBALS["emprestimo_kit"]) || get_class($GLOBALS["emprestimo_kit"]) == "cemprestimo_kit") {
			$GLOBALS["emprestimo_kit"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["emprestimo_kit"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'emprestimo_kit', TRUE);

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
		$this->ID_KIT->SetVisibility();
		$this->ID_FUNCIONARIO->SetVisibility();
		$this->DATA_EMPRESTIMO_KIT->SetVisibility();
		$this->CODIGO_AULA_EMPRESTIMO_KIT->SetVisibility();
		$this->STATUS_EMPRESTIMO_KIT->SetVisibility();

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
		global $EW_EXPORT, $emprestimo_kit;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($emprestimo_kit);
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
					if ($pageName == "emprestimo_kitview.php")
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
	var $FormClassName = "form-horizontal ewForm ewAddForm";
	var $IsModal = FALSE;
	var $IsMobileOrModal = FALSE;
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $StartRec;
	var $Priv = 0;
	var $OldRecordset;
	var $CopyRecord;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError;
		global $gbSkipHeaderFooter;

		// Check modal
		if ($this->IsModal)
			$gbSkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = ew_IsMobile() || $this->IsModal;
		$this->FormClassName = "ewForm ewAddForm form-horizontal";

		// Set up current action
		if (@$_POST["a_add"] <> "") {
			$this->CurrentAction = $_POST["a_add"]; // Get form action
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["ID_EMPRESTIMO_KIT"] != "") {
				$this->ID_EMPRESTIMO_KIT->setQueryStringValue($_GET["ID_EMPRESTIMO_KIT"]);
				$this->setKey("ID_EMPRESTIMO_KIT", $this->ID_EMPRESTIMO_KIT->CurrentValue); // Set up key
			} else {
				$this->setKey("ID_EMPRESTIMO_KIT", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "C"; // Copy record
			} else {
				$this->CurrentAction = "I"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->LoadOldRecord();

		// Load form values
		if (@$_POST["a_add"] <> "") {
			$this->LoadFormValues(); // Load form values
		}

		// Validate form if post back
		if (@$_POST["a_add"] <> "") {
			if (!$this->ValidateForm()) {
				$this->CurrentAction = "I"; // Form error, reset action
				$this->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "I": // Blank record
				break;
			case "C": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "") $this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("emprestimo_kitlist.php"); // No matching record, return to list
				}
				break;
			case "A": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $this->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "emprestimo_kitlist.php")
						$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to List page with correct master key if necessary
					elseif (ew_GetPageName($sReturnUrl) == "emprestimo_kitview.php")
						$sReturnUrl = $this->GetViewUrl(); // View page, return to View page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Render row based on row type
		$this->RowType = EW_ROWTYPE_ADD; // Render add type

		// Render row
		$this->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $Language;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		$this->ID_EMPRESTIMO_KIT->CurrentValue = NULL;
		$this->ID_EMPRESTIMO_KIT->OldValue = $this->ID_EMPRESTIMO_KIT->CurrentValue;
		$this->ID_KIT->CurrentValue = NULL;
		$this->ID_KIT->OldValue = $this->ID_KIT->CurrentValue;
		$this->ID_FUNCIONARIO->CurrentValue = NULL;
		$this->ID_FUNCIONARIO->OldValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->DATA_EMPRESTIMO_KIT->CurrentValue = NULL;
		$this->DATA_EMPRESTIMO_KIT->OldValue = $this->DATA_EMPRESTIMO_KIT->CurrentValue;
		$this->CODIGO_AULA_EMPRESTIMO_KIT->CurrentValue = NULL;
		$this->CODIGO_AULA_EMPRESTIMO_KIT->OldValue = $this->CODIGO_AULA_EMPRESTIMO_KIT->CurrentValue;
		$this->STATUS_EMPRESTIMO_KIT->CurrentValue = NULL;
		$this->STATUS_EMPRESTIMO_KIT->OldValue = $this->STATUS_EMPRESTIMO_KIT->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->ID_KIT->FldIsDetailKey) {
			$this->ID_KIT->setFormValue($objForm->GetValue("x_ID_KIT"));
		}
		if (!$this->ID_FUNCIONARIO->FldIsDetailKey) {
			$this->ID_FUNCIONARIO->setFormValue($objForm->GetValue("x_ID_FUNCIONARIO"));
		}
		if (!$this->DATA_EMPRESTIMO_KIT->FldIsDetailKey) {
			$this->DATA_EMPRESTIMO_KIT->setFormValue($objForm->GetValue("x_DATA_EMPRESTIMO_KIT"));
		}
		if (!$this->CODIGO_AULA_EMPRESTIMO_KIT->FldIsDetailKey) {
			$this->CODIGO_AULA_EMPRESTIMO_KIT->setFormValue($objForm->GetValue("x_CODIGO_AULA_EMPRESTIMO_KIT"));
		}
		if (!$this->STATUS_EMPRESTIMO_KIT->FldIsDetailKey) {
			$this->STATUS_EMPRESTIMO_KIT->setFormValue($objForm->GetValue("x_STATUS_EMPRESTIMO_KIT"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->ID_KIT->CurrentValue = $this->ID_KIT->FormValue;
		$this->ID_FUNCIONARIO->CurrentValue = $this->ID_FUNCIONARIO->FormValue;
		$this->DATA_EMPRESTIMO_KIT->CurrentValue = $this->DATA_EMPRESTIMO_KIT->FormValue;
		$this->CODIGO_AULA_EMPRESTIMO_KIT->CurrentValue = $this->CODIGO_AULA_EMPRESTIMO_KIT->FormValue;
		$this->STATUS_EMPRESTIMO_KIT->CurrentValue = $this->STATUS_EMPRESTIMO_KIT->FormValue;
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
		$this->ID_EMPRESTIMO_KIT->setDbValue($row['ID_EMPRESTIMO_KIT']);
		$this->ID_KIT->setDbValue($row['ID_KIT']);
		$this->ID_FUNCIONARIO->setDbValue($row['ID_FUNCIONARIO']);
		$this->DATA_EMPRESTIMO_KIT->setDbValue($row['DATA_EMPRESTIMO_KIT']);
		$this->CODIGO_AULA_EMPRESTIMO_KIT->setDbValue($row['CODIGO_AULA_EMPRESTIMO_KIT']);
		$this->STATUS_EMPRESTIMO_KIT->setDbValue($row['STATUS_EMPRESTIMO_KIT']);
	}

	// Return a row with default values
	function NewRow() {
		$this->LoadDefaultValues();
		$row = array();
		$row['ID_EMPRESTIMO_KIT'] = $this->ID_EMPRESTIMO_KIT->CurrentValue;
		$row['ID_KIT'] = $this->ID_KIT->CurrentValue;
		$row['ID_FUNCIONARIO'] = $this->ID_FUNCIONARIO->CurrentValue;
		$row['DATA_EMPRESTIMO_KIT'] = $this->DATA_EMPRESTIMO_KIT->CurrentValue;
		$row['CODIGO_AULA_EMPRESTIMO_KIT'] = $this->CODIGO_AULA_EMPRESTIMO_KIT->CurrentValue;
		$row['STATUS_EMPRESTIMO_KIT'] = $this->STATUS_EMPRESTIMO_KIT->CurrentValue;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_EMPRESTIMO_KIT->DbValue = $row['ID_EMPRESTIMO_KIT'];
		$this->ID_KIT->DbValue = $row['ID_KIT'];
		$this->ID_FUNCIONARIO->DbValue = $row['ID_FUNCIONARIO'];
		$this->DATA_EMPRESTIMO_KIT->DbValue = $row['DATA_EMPRESTIMO_KIT'];
		$this->CODIGO_AULA_EMPRESTIMO_KIT->DbValue = $row['CODIGO_AULA_EMPRESTIMO_KIT'];
		$this->STATUS_EMPRESTIMO_KIT->DbValue = $row['STATUS_EMPRESTIMO_KIT'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_EMPRESTIMO_KIT")) <> "")
			$this->ID_EMPRESTIMO_KIT->CurrentValue = $this->getKey("ID_EMPRESTIMO_KIT"); // ID_EMPRESTIMO_KIT
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
		// ID_EMPRESTIMO_KIT
		// ID_KIT
		// ID_FUNCIONARIO
		// DATA_EMPRESTIMO_KIT
		// CODIGO_AULA_EMPRESTIMO_KIT
		// STATUS_EMPRESTIMO_KIT

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_EMPRESTIMO_KIT
		$this->ID_EMPRESTIMO_KIT->ViewValue = $this->ID_EMPRESTIMO_KIT->CurrentValue;
		$this->ID_EMPRESTIMO_KIT->ViewCustomAttributes = "";

		// ID_KIT
		$this->ID_KIT->ViewValue = $this->ID_KIT->CurrentValue;
		$this->ID_KIT->ViewCustomAttributes = "";

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->ViewValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->ID_FUNCIONARIO->ViewCustomAttributes = "";

		// DATA_EMPRESTIMO_KIT
		$this->DATA_EMPRESTIMO_KIT->ViewValue = $this->DATA_EMPRESTIMO_KIT->CurrentValue;
		$this->DATA_EMPRESTIMO_KIT->ViewCustomAttributes = "";

		// CODIGO_AULA_EMPRESTIMO_KIT
		$this->CODIGO_AULA_EMPRESTIMO_KIT->ViewValue = $this->CODIGO_AULA_EMPRESTIMO_KIT->CurrentValue;
		$this->CODIGO_AULA_EMPRESTIMO_KIT->ViewCustomAttributes = "";

		// STATUS_EMPRESTIMO_KIT
		$this->STATUS_EMPRESTIMO_KIT->ViewValue = $this->STATUS_EMPRESTIMO_KIT->CurrentValue;
		$this->STATUS_EMPRESTIMO_KIT->ViewCustomAttributes = "";

			// ID_KIT
			$this->ID_KIT->LinkCustomAttributes = "";
			$this->ID_KIT->HrefValue = "";
			$this->ID_KIT->TooltipValue = "";

			// ID_FUNCIONARIO
			$this->ID_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ID_FUNCIONARIO->HrefValue = "";
			$this->ID_FUNCIONARIO->TooltipValue = "";

			// DATA_EMPRESTIMO_KIT
			$this->DATA_EMPRESTIMO_KIT->LinkCustomAttributes = "";
			$this->DATA_EMPRESTIMO_KIT->HrefValue = "";
			$this->DATA_EMPRESTIMO_KIT->TooltipValue = "";

			// CODIGO_AULA_EMPRESTIMO_KIT
			$this->CODIGO_AULA_EMPRESTIMO_KIT->LinkCustomAttributes = "";
			$this->CODIGO_AULA_EMPRESTIMO_KIT->HrefValue = "";
			$this->CODIGO_AULA_EMPRESTIMO_KIT->TooltipValue = "";

			// STATUS_EMPRESTIMO_KIT
			$this->STATUS_EMPRESTIMO_KIT->LinkCustomAttributes = "";
			$this->STATUS_EMPRESTIMO_KIT->HrefValue = "";
			$this->STATUS_EMPRESTIMO_KIT->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_ADD) { // Add row

			// ID_KIT
			$this->ID_KIT->EditAttrs["class"] = "form-control";
			$this->ID_KIT->EditCustomAttributes = "";
			$this->ID_KIT->EditValue = ew_HtmlEncode($this->ID_KIT->CurrentValue);
			$this->ID_KIT->PlaceHolder = ew_RemoveHtml($this->ID_KIT->FldCaption());

			// ID_FUNCIONARIO
			$this->ID_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->ID_FUNCIONARIO->EditCustomAttributes = "";
			$this->ID_FUNCIONARIO->EditValue = ew_HtmlEncode($this->ID_FUNCIONARIO->CurrentValue);
			$this->ID_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->ID_FUNCIONARIO->FldCaption());

			// DATA_EMPRESTIMO_KIT
			$this->DATA_EMPRESTIMO_KIT->EditAttrs["class"] = "form-control";
			$this->DATA_EMPRESTIMO_KIT->EditCustomAttributes = "";
			$this->DATA_EMPRESTIMO_KIT->EditValue = ew_HtmlEncode($this->DATA_EMPRESTIMO_KIT->CurrentValue);
			$this->DATA_EMPRESTIMO_KIT->PlaceHolder = ew_RemoveHtml($this->DATA_EMPRESTIMO_KIT->FldCaption());

			// CODIGO_AULA_EMPRESTIMO_KIT
			$this->CODIGO_AULA_EMPRESTIMO_KIT->EditAttrs["class"] = "form-control";
			$this->CODIGO_AULA_EMPRESTIMO_KIT->EditCustomAttributes = "";
			$this->CODIGO_AULA_EMPRESTIMO_KIT->EditValue = ew_HtmlEncode($this->CODIGO_AULA_EMPRESTIMO_KIT->CurrentValue);
			$this->CODIGO_AULA_EMPRESTIMO_KIT->PlaceHolder = ew_RemoveHtml($this->CODIGO_AULA_EMPRESTIMO_KIT->FldCaption());

			// STATUS_EMPRESTIMO_KIT
			$this->STATUS_EMPRESTIMO_KIT->EditAttrs["class"] = "form-control";
			$this->STATUS_EMPRESTIMO_KIT->EditCustomAttributes = "";
			$this->STATUS_EMPRESTIMO_KIT->EditValue = ew_HtmlEncode($this->STATUS_EMPRESTIMO_KIT->CurrentValue);
			$this->STATUS_EMPRESTIMO_KIT->PlaceHolder = ew_RemoveHtml($this->STATUS_EMPRESTIMO_KIT->FldCaption());

			// Add refer script
			// ID_KIT

			$this->ID_KIT->LinkCustomAttributes = "";
			$this->ID_KIT->HrefValue = "";

			// ID_FUNCIONARIO
			$this->ID_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ID_FUNCIONARIO->HrefValue = "";

			// DATA_EMPRESTIMO_KIT
			$this->DATA_EMPRESTIMO_KIT->LinkCustomAttributes = "";
			$this->DATA_EMPRESTIMO_KIT->HrefValue = "";

			// CODIGO_AULA_EMPRESTIMO_KIT
			$this->CODIGO_AULA_EMPRESTIMO_KIT->LinkCustomAttributes = "";
			$this->CODIGO_AULA_EMPRESTIMO_KIT->HrefValue = "";

			// STATUS_EMPRESTIMO_KIT
			$this->STATUS_EMPRESTIMO_KIT->LinkCustomAttributes = "";
			$this->STATUS_EMPRESTIMO_KIT->HrefValue = "";
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
		if (!$this->ID_KIT->FldIsDetailKey && !is_null($this->ID_KIT->FormValue) && $this->ID_KIT->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ID_KIT->FldCaption(), $this->ID_KIT->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ID_KIT->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_KIT->FldErrMsg());
		}
		if (!$this->ID_FUNCIONARIO->FldIsDetailKey && !is_null($this->ID_FUNCIONARIO->FormValue) && $this->ID_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ID_FUNCIONARIO->FldCaption(), $this->ID_FUNCIONARIO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ID_FUNCIONARIO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_FUNCIONARIO->FldErrMsg());
		}
		if (!$this->DATA_EMPRESTIMO_KIT->FldIsDetailKey && !is_null($this->DATA_EMPRESTIMO_KIT->FormValue) && $this->DATA_EMPRESTIMO_KIT->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DATA_EMPRESTIMO_KIT->FldCaption(), $this->DATA_EMPRESTIMO_KIT->ReqErrMsg));
		}
		if (!$this->CODIGO_AULA_EMPRESTIMO_KIT->FldIsDetailKey && !is_null($this->CODIGO_AULA_EMPRESTIMO_KIT->FormValue) && $this->CODIGO_AULA_EMPRESTIMO_KIT->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->CODIGO_AULA_EMPRESTIMO_KIT->FldCaption(), $this->CODIGO_AULA_EMPRESTIMO_KIT->ReqErrMsg));
		}
		if (!$this->STATUS_EMPRESTIMO_KIT->FldIsDetailKey && !is_null($this->STATUS_EMPRESTIMO_KIT->FormValue) && $this->STATUS_EMPRESTIMO_KIT->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->STATUS_EMPRESTIMO_KIT->FldCaption(), $this->STATUS_EMPRESTIMO_KIT->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->STATUS_EMPRESTIMO_KIT->FormValue)) {
			ew_AddMessage($gsFormError, $this->STATUS_EMPRESTIMO_KIT->FldErrMsg());
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

	// Add record
	function AddRow($rsold = NULL) {
		global $Language, $Security;
		$conn = &$this->Connection();

		// Load db values from rsold
		$this->LoadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = array();

		// ID_KIT
		$this->ID_KIT->SetDbValueDef($rsnew, $this->ID_KIT->CurrentValue, 0, FALSE);

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->SetDbValueDef($rsnew, $this->ID_FUNCIONARIO->CurrentValue, 0, FALSE);

		// DATA_EMPRESTIMO_KIT
		$this->DATA_EMPRESTIMO_KIT->SetDbValueDef($rsnew, $this->DATA_EMPRESTIMO_KIT->CurrentValue, "", FALSE);

		// CODIGO_AULA_EMPRESTIMO_KIT
		$this->CODIGO_AULA_EMPRESTIMO_KIT->SetDbValueDef($rsnew, $this->CODIGO_AULA_EMPRESTIMO_KIT->CurrentValue, "", FALSE);

		// STATUS_EMPRESTIMO_KIT
		$this->STATUS_EMPRESTIMO_KIT->SetDbValueDef($rsnew, $this->STATUS_EMPRESTIMO_KIT->CurrentValue, 0, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $this->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
			$AddRow = $this->Insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($AddRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$this->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$url = substr(ew_CurrentUrl(), strrpos(ew_CurrentUrl(), "/")+1);
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("emprestimo_kitlist.php"), "", $this->TableVar, TRUE);
		$PageId = ($this->CurrentAction == "C") ? "Copy" : "Add";
		$Breadcrumb->Add("add", $PageId, $url);
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
if (!isset($emprestimo_kit_add)) $emprestimo_kit_add = new cemprestimo_kit_add();

// Page init
$emprestimo_kit_add->Page_Init();

// Page main
$emprestimo_kit_add->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$emprestimo_kit_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "add";
var CurrentForm = femprestimo_kitadd = new ew_Form("femprestimo_kitadd", "add");

// Validate form
femprestimo_kitadd.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_ID_KIT");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_kit->ID_KIT->FldCaption(), $emprestimo_kit->ID_KIT->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_KIT");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($emprestimo_kit->ID_KIT->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_ID_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_kit->ID_FUNCIONARIO->FldCaption(), $emprestimo_kit->ID_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_FUNCIONARIO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($emprestimo_kit->ID_FUNCIONARIO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_DATA_EMPRESTIMO_KIT");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_kit->DATA_EMPRESTIMO_KIT->FldCaption(), $emprestimo_kit->DATA_EMPRESTIMO_KIT->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_CODIGO_AULA_EMPRESTIMO_KIT");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->FldCaption(), $emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_STATUS_EMPRESTIMO_KIT");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $emprestimo_kit->STATUS_EMPRESTIMO_KIT->FldCaption(), $emprestimo_kit->STATUS_EMPRESTIMO_KIT->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_STATUS_EMPRESTIMO_KIT");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($emprestimo_kit->STATUS_EMPRESTIMO_KIT->FldErrMsg()) ?>");

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
femprestimo_kitadd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
femprestimo_kitadd.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $emprestimo_kit_add->ShowPageHeader(); ?>
<?php
$emprestimo_kit_add->ShowMessage();
?>
<form name="femprestimo_kitadd" id="femprestimo_kitadd" class="<?php echo $emprestimo_kit_add->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($emprestimo_kit_add->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $emprestimo_kit_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="emprestimo_kit">
<input type="hidden" name="a_add" id="a_add" value="A">
<input type="hidden" name="modal" value="<?php echo intval($emprestimo_kit_add->IsModal) ?>">
<div class="ewAddDiv"><!-- page* -->
<?php if ($emprestimo_kit->ID_KIT->Visible) { // ID_KIT ?>
	<div id="r_ID_KIT" class="form-group">
		<label id="elh_emprestimo_kit_ID_KIT" for="x_ID_KIT" class="<?php echo $emprestimo_kit_add->LeftColumnClass ?>"><?php echo $emprestimo_kit->ID_KIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_kit_add->RightColumnClass ?>"><div<?php echo $emprestimo_kit->ID_KIT->CellAttributes() ?>>
<span id="el_emprestimo_kit_ID_KIT">
<input type="text" data-table="emprestimo_kit" data-field="x_ID_KIT" name="x_ID_KIT" id="x_ID_KIT" size="30" placeholder="<?php echo ew_HtmlEncode($emprestimo_kit->ID_KIT->getPlaceHolder()) ?>" value="<?php echo $emprestimo_kit->ID_KIT->EditValue ?>"<?php echo $emprestimo_kit->ID_KIT->EditAttributes() ?>>
</span>
<?php echo $emprestimo_kit->ID_KIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_kit->ID_FUNCIONARIO->Visible) { // ID_FUNCIONARIO ?>
	<div id="r_ID_FUNCIONARIO" class="form-group">
		<label id="elh_emprestimo_kit_ID_FUNCIONARIO" for="x_ID_FUNCIONARIO" class="<?php echo $emprestimo_kit_add->LeftColumnClass ?>"><?php echo $emprestimo_kit->ID_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_kit_add->RightColumnClass ?>"><div<?php echo $emprestimo_kit->ID_FUNCIONARIO->CellAttributes() ?>>
<span id="el_emprestimo_kit_ID_FUNCIONARIO">
<input type="text" data-table="emprestimo_kit" data-field="x_ID_FUNCIONARIO" name="x_ID_FUNCIONARIO" id="x_ID_FUNCIONARIO" size="30" placeholder="<?php echo ew_HtmlEncode($emprestimo_kit->ID_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $emprestimo_kit->ID_FUNCIONARIO->EditValue ?>"<?php echo $emprestimo_kit->ID_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $emprestimo_kit->ID_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_kit->DATA_EMPRESTIMO_KIT->Visible) { // DATA_EMPRESTIMO_KIT ?>
	<div id="r_DATA_EMPRESTIMO_KIT" class="form-group">
		<label id="elh_emprestimo_kit_DATA_EMPRESTIMO_KIT" for="x_DATA_EMPRESTIMO_KIT" class="<?php echo $emprestimo_kit_add->LeftColumnClass ?>"><?php echo $emprestimo_kit->DATA_EMPRESTIMO_KIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_kit_add->RightColumnClass ?>"><div<?php echo $emprestimo_kit->DATA_EMPRESTIMO_KIT->CellAttributes() ?>>
<span id="el_emprestimo_kit_DATA_EMPRESTIMO_KIT">
<input type="text" data-table="emprestimo_kit" data-field="x_DATA_EMPRESTIMO_KIT" name="x_DATA_EMPRESTIMO_KIT" id="x_DATA_EMPRESTIMO_KIT" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($emprestimo_kit->DATA_EMPRESTIMO_KIT->getPlaceHolder()) ?>" value="<?php echo $emprestimo_kit->DATA_EMPRESTIMO_KIT->EditValue ?>"<?php echo $emprestimo_kit->DATA_EMPRESTIMO_KIT->EditAttributes() ?>>
</span>
<?php echo $emprestimo_kit->DATA_EMPRESTIMO_KIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->Visible) { // CODIGO_AULA_EMPRESTIMO_KIT ?>
	<div id="r_CODIGO_AULA_EMPRESTIMO_KIT" class="form-group">
		<label id="elh_emprestimo_kit_CODIGO_AULA_EMPRESTIMO_KIT" for="x_CODIGO_AULA_EMPRESTIMO_KIT" class="<?php echo $emprestimo_kit_add->LeftColumnClass ?>"><?php echo $emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_kit_add->RightColumnClass ?>"><div<?php echo $emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->CellAttributes() ?>>
<span id="el_emprestimo_kit_CODIGO_AULA_EMPRESTIMO_KIT">
<input type="text" data-table="emprestimo_kit" data-field="x_CODIGO_AULA_EMPRESTIMO_KIT" name="x_CODIGO_AULA_EMPRESTIMO_KIT" id="x_CODIGO_AULA_EMPRESTIMO_KIT" size="30" maxlength="5" placeholder="<?php echo ew_HtmlEncode($emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->getPlaceHolder()) ?>" value="<?php echo $emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->EditValue ?>"<?php echo $emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->EditAttributes() ?>>
</span>
<?php echo $emprestimo_kit->CODIGO_AULA_EMPRESTIMO_KIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($emprestimo_kit->STATUS_EMPRESTIMO_KIT->Visible) { // STATUS_EMPRESTIMO_KIT ?>
	<div id="r_STATUS_EMPRESTIMO_KIT" class="form-group">
		<label id="elh_emprestimo_kit_STATUS_EMPRESTIMO_KIT" for="x_STATUS_EMPRESTIMO_KIT" class="<?php echo $emprestimo_kit_add->LeftColumnClass ?>"><?php echo $emprestimo_kit->STATUS_EMPRESTIMO_KIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $emprestimo_kit_add->RightColumnClass ?>"><div<?php echo $emprestimo_kit->STATUS_EMPRESTIMO_KIT->CellAttributes() ?>>
<span id="el_emprestimo_kit_STATUS_EMPRESTIMO_KIT">
<input type="text" data-table="emprestimo_kit" data-field="x_STATUS_EMPRESTIMO_KIT" name="x_STATUS_EMPRESTIMO_KIT" id="x_STATUS_EMPRESTIMO_KIT" size="30" placeholder="<?php echo ew_HtmlEncode($emprestimo_kit->STATUS_EMPRESTIMO_KIT->getPlaceHolder()) ?>" value="<?php echo $emprestimo_kit->STATUS_EMPRESTIMO_KIT->EditValue ?>"<?php echo $emprestimo_kit->STATUS_EMPRESTIMO_KIT->EditAttributes() ?>>
</span>
<?php echo $emprestimo_kit->STATUS_EMPRESTIMO_KIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$emprestimo_kit_add->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $emprestimo_kit_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $emprestimo_kit_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
femprestimo_kitadd.Init();
</script>
<?php
$emprestimo_kit_add->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$emprestimo_kit_add->Page_Terminate();
?>
