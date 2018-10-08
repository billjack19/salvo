<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "pontoinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$ponto_add = NULL; // Initialize page object first

class cponto_add extends cponto {

	// Page ID
	var $PageID = 'add';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'ponto';

	// Page object name
	var $PageObjName = 'ponto_add';

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

		// Table object (ponto)
		if (!isset($GLOBALS["ponto"]) || get_class($GLOBALS["ponto"]) == "cponto") {
			$GLOBALS["ponto"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ponto"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'ponto', TRUE);

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
		$this->ID_FUNCIONARIO->SetVisibility();
		$this->DATA_PONTO->SetVisibility();
		$this->HORARIO_INICIAL_PONTO->SetVisibility();
		$this->HORARIO_FINAL_PONTO->SetVisibility();

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
		global $EW_EXPORT, $ponto;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ponto);
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
					if ($pageName == "pontoview.php")
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
			if (@$_GET["ID_PONTO"] != "") {
				$this->ID_PONTO->setQueryStringValue($_GET["ID_PONTO"]);
				$this->setKey("ID_PONTO", $this->ID_PONTO->CurrentValue); // Set up key
			} else {
				$this->setKey("ID_PONTO", ""); // Clear key
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
					$this->Page_Terminate("pontolist.php"); // No matching record, return to list
				}
				break;
			case "A": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $this->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "pontolist.php")
						$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to List page with correct master key if necessary
					elseif (ew_GetPageName($sReturnUrl) == "pontoview.php")
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
		$this->ID_PONTO->CurrentValue = NULL;
		$this->ID_PONTO->OldValue = $this->ID_PONTO->CurrentValue;
		$this->ID_FUNCIONARIO->CurrentValue = NULL;
		$this->ID_FUNCIONARIO->OldValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->DATA_PONTO->CurrentValue = NULL;
		$this->DATA_PONTO->OldValue = $this->DATA_PONTO->CurrentValue;
		$this->HORARIO_INICIAL_PONTO->CurrentValue = NULL;
		$this->HORARIO_INICIAL_PONTO->OldValue = $this->HORARIO_INICIAL_PONTO->CurrentValue;
		$this->HORARIO_FINAL_PONTO->CurrentValue = NULL;
		$this->HORARIO_FINAL_PONTO->OldValue = $this->HORARIO_FINAL_PONTO->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->ID_FUNCIONARIO->FldIsDetailKey) {
			$this->ID_FUNCIONARIO->setFormValue($objForm->GetValue("x_ID_FUNCIONARIO"));
		}
		if (!$this->DATA_PONTO->FldIsDetailKey) {
			$this->DATA_PONTO->setFormValue($objForm->GetValue("x_DATA_PONTO"));
		}
		if (!$this->HORARIO_INICIAL_PONTO->FldIsDetailKey) {
			$this->HORARIO_INICIAL_PONTO->setFormValue($objForm->GetValue("x_HORARIO_INICIAL_PONTO"));
		}
		if (!$this->HORARIO_FINAL_PONTO->FldIsDetailKey) {
			$this->HORARIO_FINAL_PONTO->setFormValue($objForm->GetValue("x_HORARIO_FINAL_PONTO"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->ID_FUNCIONARIO->CurrentValue = $this->ID_FUNCIONARIO->FormValue;
		$this->DATA_PONTO->CurrentValue = $this->DATA_PONTO->FormValue;
		$this->HORARIO_INICIAL_PONTO->CurrentValue = $this->HORARIO_INICIAL_PONTO->FormValue;
		$this->HORARIO_FINAL_PONTO->CurrentValue = $this->HORARIO_FINAL_PONTO->FormValue;
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
		$this->ID_PONTO->setDbValue($row['ID_PONTO']);
		$this->ID_FUNCIONARIO->setDbValue($row['ID_FUNCIONARIO']);
		$this->DATA_PONTO->setDbValue($row['DATA_PONTO']);
		$this->HORARIO_INICIAL_PONTO->setDbValue($row['HORARIO_INICIAL_PONTO']);
		$this->HORARIO_FINAL_PONTO->setDbValue($row['HORARIO_FINAL_PONTO']);
	}

	// Return a row with default values
	function NewRow() {
		$this->LoadDefaultValues();
		$row = array();
		$row['ID_PONTO'] = $this->ID_PONTO->CurrentValue;
		$row['ID_FUNCIONARIO'] = $this->ID_FUNCIONARIO->CurrentValue;
		$row['DATA_PONTO'] = $this->DATA_PONTO->CurrentValue;
		$row['HORARIO_INICIAL_PONTO'] = $this->HORARIO_INICIAL_PONTO->CurrentValue;
		$row['HORARIO_FINAL_PONTO'] = $this->HORARIO_FINAL_PONTO->CurrentValue;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_PONTO->DbValue = $row['ID_PONTO'];
		$this->ID_FUNCIONARIO->DbValue = $row['ID_FUNCIONARIO'];
		$this->DATA_PONTO->DbValue = $row['DATA_PONTO'];
		$this->HORARIO_INICIAL_PONTO->DbValue = $row['HORARIO_INICIAL_PONTO'];
		$this->HORARIO_FINAL_PONTO->DbValue = $row['HORARIO_FINAL_PONTO'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_PONTO")) <> "")
			$this->ID_PONTO->CurrentValue = $this->getKey("ID_PONTO"); // ID_PONTO
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
		// ID_PONTO
		// ID_FUNCIONARIO
		// DATA_PONTO
		// HORARIO_INICIAL_PONTO
		// HORARIO_FINAL_PONTO

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_PONTO
		$this->ID_PONTO->ViewValue = $this->ID_PONTO->CurrentValue;
		$this->ID_PONTO->ViewCustomAttributes = "";

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->ViewValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->ID_FUNCIONARIO->ViewCustomAttributes = "";

		// DATA_PONTO
		$this->DATA_PONTO->ViewValue = $this->DATA_PONTO->CurrentValue;
		$this->DATA_PONTO->ViewCustomAttributes = "";

		// HORARIO_INICIAL_PONTO
		$this->HORARIO_INICIAL_PONTO->ViewValue = $this->HORARIO_INICIAL_PONTO->CurrentValue;
		$this->HORARIO_INICIAL_PONTO->ViewCustomAttributes = "";

		// HORARIO_FINAL_PONTO
		$this->HORARIO_FINAL_PONTO->ViewValue = $this->HORARIO_FINAL_PONTO->CurrentValue;
		$this->HORARIO_FINAL_PONTO->ViewCustomAttributes = "";

			// ID_FUNCIONARIO
			$this->ID_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ID_FUNCIONARIO->HrefValue = "";
			$this->ID_FUNCIONARIO->TooltipValue = "";

			// DATA_PONTO
			$this->DATA_PONTO->LinkCustomAttributes = "";
			$this->DATA_PONTO->HrefValue = "";
			$this->DATA_PONTO->TooltipValue = "";

			// HORARIO_INICIAL_PONTO
			$this->HORARIO_INICIAL_PONTO->LinkCustomAttributes = "";
			$this->HORARIO_INICIAL_PONTO->HrefValue = "";
			$this->HORARIO_INICIAL_PONTO->TooltipValue = "";

			// HORARIO_FINAL_PONTO
			$this->HORARIO_FINAL_PONTO->LinkCustomAttributes = "";
			$this->HORARIO_FINAL_PONTO->HrefValue = "";
			$this->HORARIO_FINAL_PONTO->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_ADD) { // Add row

			// ID_FUNCIONARIO
			$this->ID_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->ID_FUNCIONARIO->EditCustomAttributes = "";
			$this->ID_FUNCIONARIO->EditValue = ew_HtmlEncode($this->ID_FUNCIONARIO->CurrentValue);
			$this->ID_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->ID_FUNCIONARIO->FldCaption());

			// DATA_PONTO
			$this->DATA_PONTO->EditAttrs["class"] = "form-control";
			$this->DATA_PONTO->EditCustomAttributes = "";
			$this->DATA_PONTO->EditValue = ew_HtmlEncode($this->DATA_PONTO->CurrentValue);
			$this->DATA_PONTO->PlaceHolder = ew_RemoveHtml($this->DATA_PONTO->FldCaption());

			// HORARIO_INICIAL_PONTO
			$this->HORARIO_INICIAL_PONTO->EditAttrs["class"] = "form-control";
			$this->HORARIO_INICIAL_PONTO->EditCustomAttributes = "";
			$this->HORARIO_INICIAL_PONTO->EditValue = ew_HtmlEncode($this->HORARIO_INICIAL_PONTO->CurrentValue);
			$this->HORARIO_INICIAL_PONTO->PlaceHolder = ew_RemoveHtml($this->HORARIO_INICIAL_PONTO->FldCaption());

			// HORARIO_FINAL_PONTO
			$this->HORARIO_FINAL_PONTO->EditAttrs["class"] = "form-control";
			$this->HORARIO_FINAL_PONTO->EditCustomAttributes = "";
			$this->HORARIO_FINAL_PONTO->EditValue = ew_HtmlEncode($this->HORARIO_FINAL_PONTO->CurrentValue);
			$this->HORARIO_FINAL_PONTO->PlaceHolder = ew_RemoveHtml($this->HORARIO_FINAL_PONTO->FldCaption());

			// Add refer script
			// ID_FUNCIONARIO

			$this->ID_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ID_FUNCIONARIO->HrefValue = "";

			// DATA_PONTO
			$this->DATA_PONTO->LinkCustomAttributes = "";
			$this->DATA_PONTO->HrefValue = "";

			// HORARIO_INICIAL_PONTO
			$this->HORARIO_INICIAL_PONTO->LinkCustomAttributes = "";
			$this->HORARIO_INICIAL_PONTO->HrefValue = "";

			// HORARIO_FINAL_PONTO
			$this->HORARIO_FINAL_PONTO->LinkCustomAttributes = "";
			$this->HORARIO_FINAL_PONTO->HrefValue = "";
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
		if (!$this->ID_FUNCIONARIO->FldIsDetailKey && !is_null($this->ID_FUNCIONARIO->FormValue) && $this->ID_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ID_FUNCIONARIO->FldCaption(), $this->ID_FUNCIONARIO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ID_FUNCIONARIO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_FUNCIONARIO->FldErrMsg());
		}
		if (!$this->DATA_PONTO->FldIsDetailKey && !is_null($this->DATA_PONTO->FormValue) && $this->DATA_PONTO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DATA_PONTO->FldCaption(), $this->DATA_PONTO->ReqErrMsg));
		}
		if (!$this->HORARIO_INICIAL_PONTO->FldIsDetailKey && !is_null($this->HORARIO_INICIAL_PONTO->FormValue) && $this->HORARIO_INICIAL_PONTO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->HORARIO_INICIAL_PONTO->FldCaption(), $this->HORARIO_INICIAL_PONTO->ReqErrMsg));
		}
		if (!$this->HORARIO_FINAL_PONTO->FldIsDetailKey && !is_null($this->HORARIO_FINAL_PONTO->FormValue) && $this->HORARIO_FINAL_PONTO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->HORARIO_FINAL_PONTO->FldCaption(), $this->HORARIO_FINAL_PONTO->ReqErrMsg));
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

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->SetDbValueDef($rsnew, $this->ID_FUNCIONARIO->CurrentValue, 0, FALSE);

		// DATA_PONTO
		$this->DATA_PONTO->SetDbValueDef($rsnew, $this->DATA_PONTO->CurrentValue, "", FALSE);

		// HORARIO_INICIAL_PONTO
		$this->HORARIO_INICIAL_PONTO->SetDbValueDef($rsnew, $this->HORARIO_INICIAL_PONTO->CurrentValue, "", FALSE);

		// HORARIO_FINAL_PONTO
		$this->HORARIO_FINAL_PONTO->SetDbValueDef($rsnew, $this->HORARIO_FINAL_PONTO->CurrentValue, "", FALSE);

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("pontolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($ponto_add)) $ponto_add = new cponto_add();

// Page init
$ponto_add->Page_Init();

// Page main
$ponto_add->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ponto_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "add";
var CurrentForm = fpontoadd = new ew_Form("fpontoadd", "add");

// Validate form
fpontoadd.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_ID_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $ponto->ID_FUNCIONARIO->FldCaption(), $ponto->ID_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_FUNCIONARIO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($ponto->ID_FUNCIONARIO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_DATA_PONTO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $ponto->DATA_PONTO->FldCaption(), $ponto->DATA_PONTO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_HORARIO_INICIAL_PONTO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $ponto->HORARIO_INICIAL_PONTO->FldCaption(), $ponto->HORARIO_INICIAL_PONTO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_HORARIO_FINAL_PONTO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $ponto->HORARIO_FINAL_PONTO->FldCaption(), $ponto->HORARIO_FINAL_PONTO->ReqErrMsg)) ?>");

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
fpontoadd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
fpontoadd.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $ponto_add->ShowPageHeader(); ?>
<?php
$ponto_add->ShowMessage();
?>
<form name="fpontoadd" id="fpontoadd" class="<?php echo $ponto_add->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($ponto_add->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $ponto_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ponto">
<input type="hidden" name="a_add" id="a_add" value="A">
<input type="hidden" name="modal" value="<?php echo intval($ponto_add->IsModal) ?>">
<div class="ewAddDiv"><!-- page* -->
<?php if ($ponto->ID_FUNCIONARIO->Visible) { // ID_FUNCIONARIO ?>
	<div id="r_ID_FUNCIONARIO" class="form-group">
		<label id="elh_ponto_ID_FUNCIONARIO" for="x_ID_FUNCIONARIO" class="<?php echo $ponto_add->LeftColumnClass ?>"><?php echo $ponto->ID_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_add->RightColumnClass ?>"><div<?php echo $ponto->ID_FUNCIONARIO->CellAttributes() ?>>
<span id="el_ponto_ID_FUNCIONARIO">
<input type="text" data-table="ponto" data-field="x_ID_FUNCIONARIO" name="x_ID_FUNCIONARIO" id="x_ID_FUNCIONARIO" size="30" placeholder="<?php echo ew_HtmlEncode($ponto->ID_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $ponto->ID_FUNCIONARIO->EditValue ?>"<?php echo $ponto->ID_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $ponto->ID_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ponto->DATA_PONTO->Visible) { // DATA_PONTO ?>
	<div id="r_DATA_PONTO" class="form-group">
		<label id="elh_ponto_DATA_PONTO" for="x_DATA_PONTO" class="<?php echo $ponto_add->LeftColumnClass ?>"><?php echo $ponto->DATA_PONTO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_add->RightColumnClass ?>"><div<?php echo $ponto->DATA_PONTO->CellAttributes() ?>>
<span id="el_ponto_DATA_PONTO">
<input type="text" data-table="ponto" data-field="x_DATA_PONTO" name="x_DATA_PONTO" id="x_DATA_PONTO" size="30" maxlength="10" placeholder="<?php echo ew_HtmlEncode($ponto->DATA_PONTO->getPlaceHolder()) ?>" value="<?php echo $ponto->DATA_PONTO->EditValue ?>"<?php echo $ponto->DATA_PONTO->EditAttributes() ?>>
</span>
<?php echo $ponto->DATA_PONTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ponto->HORARIO_INICIAL_PONTO->Visible) { // HORARIO_INICIAL_PONTO ?>
	<div id="r_HORARIO_INICIAL_PONTO" class="form-group">
		<label id="elh_ponto_HORARIO_INICIAL_PONTO" for="x_HORARIO_INICIAL_PONTO" class="<?php echo $ponto_add->LeftColumnClass ?>"><?php echo $ponto->HORARIO_INICIAL_PONTO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_add->RightColumnClass ?>"><div<?php echo $ponto->HORARIO_INICIAL_PONTO->CellAttributes() ?>>
<span id="el_ponto_HORARIO_INICIAL_PONTO">
<input type="text" data-table="ponto" data-field="x_HORARIO_INICIAL_PONTO" name="x_HORARIO_INICIAL_PONTO" id="x_HORARIO_INICIAL_PONTO" size="30" maxlength="7" placeholder="<?php echo ew_HtmlEncode($ponto->HORARIO_INICIAL_PONTO->getPlaceHolder()) ?>" value="<?php echo $ponto->HORARIO_INICIAL_PONTO->EditValue ?>"<?php echo $ponto->HORARIO_INICIAL_PONTO->EditAttributes() ?>>
</span>
<?php echo $ponto->HORARIO_INICIAL_PONTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ponto->HORARIO_FINAL_PONTO->Visible) { // HORARIO_FINAL_PONTO ?>
	<div id="r_HORARIO_FINAL_PONTO" class="form-group">
		<label id="elh_ponto_HORARIO_FINAL_PONTO" for="x_HORARIO_FINAL_PONTO" class="<?php echo $ponto_add->LeftColumnClass ?>"><?php echo $ponto->HORARIO_FINAL_PONTO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_add->RightColumnClass ?>"><div<?php echo $ponto->HORARIO_FINAL_PONTO->CellAttributes() ?>>
<span id="el_ponto_HORARIO_FINAL_PONTO">
<input type="text" data-table="ponto" data-field="x_HORARIO_FINAL_PONTO" name="x_HORARIO_FINAL_PONTO" id="x_HORARIO_FINAL_PONTO" size="30" maxlength="7" placeholder="<?php echo ew_HtmlEncode($ponto->HORARIO_FINAL_PONTO->getPlaceHolder()) ?>" value="<?php echo $ponto->HORARIO_FINAL_PONTO->EditValue ?>"<?php echo $ponto->HORARIO_FINAL_PONTO->EditAttributes() ?>>
</span>
<?php echo $ponto->HORARIO_FINAL_PONTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ponto_add->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $ponto_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $ponto_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
fpontoadd.Init();
</script>
<?php
$ponto_add->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ponto_add->Page_Terminate();
?>
