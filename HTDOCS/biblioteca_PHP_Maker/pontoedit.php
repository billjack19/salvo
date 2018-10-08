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

$ponto_edit = NULL; // Initialize page object first

class cponto_edit extends cponto {

	// Page ID
	var $PageID = 'edit';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'ponto';

	// Page object name
	var $PageObjName = 'ponto_edit';

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
			define("EW_PAGE_ID", 'edit', TRUE);

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
		$this->ID_PONTO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_PONTO->Visible = FALSE;
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
			if ($objForm->HasValue("x_ID_PONTO")) {
				$this->ID_PONTO->setFormValue($objForm->GetValue("x_ID_PONTO"));
			}
		} else {
			$this->CurrentAction = "I"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (isset($_GET["ID_PONTO"])) {
				$this->ID_PONTO->setQueryStringValue($_GET["ID_PONTO"]);
				$loadByQuery = TRUE;
			} else {
				$this->ID_PONTO->CurrentValue = NULL;
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
					$this->Page_Terminate("pontolist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$sReturnUrl = $this->getReturnUrl();
				if (ew_GetPageName($sReturnUrl) == "pontolist.php")
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
		if (!$this->ID_PONTO->FldIsDetailKey)
			$this->ID_PONTO->setFormValue($objForm->GetValue("x_ID_PONTO"));
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
		$this->ID_PONTO->CurrentValue = $this->ID_PONTO->FormValue;
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
		$row = array();
		$row['ID_PONTO'] = NULL;
		$row['ID_FUNCIONARIO'] = NULL;
		$row['DATA_PONTO'] = NULL;
		$row['HORARIO_INICIAL_PONTO'] = NULL;
		$row['HORARIO_FINAL_PONTO'] = NULL;
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

			// ID_PONTO
			$this->ID_PONTO->LinkCustomAttributes = "";
			$this->ID_PONTO->HrefValue = "";
			$this->ID_PONTO->TooltipValue = "";

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
		} elseif ($this->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// ID_PONTO
			$this->ID_PONTO->EditAttrs["class"] = "form-control";
			$this->ID_PONTO->EditCustomAttributes = "";
			$this->ID_PONTO->EditValue = $this->ID_PONTO->CurrentValue;
			$this->ID_PONTO->ViewCustomAttributes = "";

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

			// Edit refer script
			// ID_PONTO

			$this->ID_PONTO->LinkCustomAttributes = "";
			$this->ID_PONTO->HrefValue = "";

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

			// ID_FUNCIONARIO
			$this->ID_FUNCIONARIO->SetDbValueDef($rsnew, $this->ID_FUNCIONARIO->CurrentValue, 0, $this->ID_FUNCIONARIO->ReadOnly);

			// DATA_PONTO
			$this->DATA_PONTO->SetDbValueDef($rsnew, $this->DATA_PONTO->CurrentValue, "", $this->DATA_PONTO->ReadOnly);

			// HORARIO_INICIAL_PONTO
			$this->HORARIO_INICIAL_PONTO->SetDbValueDef($rsnew, $this->HORARIO_INICIAL_PONTO->CurrentValue, "", $this->HORARIO_INICIAL_PONTO->ReadOnly);

			// HORARIO_FINAL_PONTO
			$this->HORARIO_FINAL_PONTO->SetDbValueDef($rsnew, $this->HORARIO_FINAL_PONTO->CurrentValue, "", $this->HORARIO_FINAL_PONTO->ReadOnly);

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("pontolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($ponto_edit)) $ponto_edit = new cponto_edit();

// Page init
$ponto_edit->Page_Init();

// Page main
$ponto_edit->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ponto_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "edit";
var CurrentForm = fpontoedit = new ew_Form("fpontoedit", "edit");

// Validate form
fpontoedit.Validate = function() {
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
fpontoedit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
fpontoedit.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $ponto_edit->ShowPageHeader(); ?>
<?php
$ponto_edit->ShowMessage();
?>
<form name="fpontoedit" id="fpontoedit" class="<?php echo $ponto_edit->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($ponto_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $ponto_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ponto">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<input type="hidden" name="modal" value="<?php echo intval($ponto_edit->IsModal) ?>">
<div class="ewEditDiv"><!-- page* -->
<?php if ($ponto->ID_PONTO->Visible) { // ID_PONTO ?>
	<div id="r_ID_PONTO" class="form-group">
		<label id="elh_ponto_ID_PONTO" class="<?php echo $ponto_edit->LeftColumnClass ?>"><?php echo $ponto->ID_PONTO->FldCaption() ?></label>
		<div class="<?php echo $ponto_edit->RightColumnClass ?>"><div<?php echo $ponto->ID_PONTO->CellAttributes() ?>>
<span id="el_ponto_ID_PONTO">
<span<?php echo $ponto->ID_PONTO->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $ponto->ID_PONTO->EditValue ?></p></span>
</span>
<input type="hidden" data-table="ponto" data-field="x_ID_PONTO" name="x_ID_PONTO" id="x_ID_PONTO" value="<?php echo ew_HtmlEncode($ponto->ID_PONTO->CurrentValue) ?>">
<?php echo $ponto->ID_PONTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ponto->ID_FUNCIONARIO->Visible) { // ID_FUNCIONARIO ?>
	<div id="r_ID_FUNCIONARIO" class="form-group">
		<label id="elh_ponto_ID_FUNCIONARIO" for="x_ID_FUNCIONARIO" class="<?php echo $ponto_edit->LeftColumnClass ?>"><?php echo $ponto->ID_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_edit->RightColumnClass ?>"><div<?php echo $ponto->ID_FUNCIONARIO->CellAttributes() ?>>
<span id="el_ponto_ID_FUNCIONARIO">
<input type="text" data-table="ponto" data-field="x_ID_FUNCIONARIO" name="x_ID_FUNCIONARIO" id="x_ID_FUNCIONARIO" size="30" placeholder="<?php echo ew_HtmlEncode($ponto->ID_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $ponto->ID_FUNCIONARIO->EditValue ?>"<?php echo $ponto->ID_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $ponto->ID_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ponto->DATA_PONTO->Visible) { // DATA_PONTO ?>
	<div id="r_DATA_PONTO" class="form-group">
		<label id="elh_ponto_DATA_PONTO" for="x_DATA_PONTO" class="<?php echo $ponto_edit->LeftColumnClass ?>"><?php echo $ponto->DATA_PONTO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_edit->RightColumnClass ?>"><div<?php echo $ponto->DATA_PONTO->CellAttributes() ?>>
<span id="el_ponto_DATA_PONTO">
<input type="text" data-table="ponto" data-field="x_DATA_PONTO" name="x_DATA_PONTO" id="x_DATA_PONTO" size="30" maxlength="10" placeholder="<?php echo ew_HtmlEncode($ponto->DATA_PONTO->getPlaceHolder()) ?>" value="<?php echo $ponto->DATA_PONTO->EditValue ?>"<?php echo $ponto->DATA_PONTO->EditAttributes() ?>>
</span>
<?php echo $ponto->DATA_PONTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ponto->HORARIO_INICIAL_PONTO->Visible) { // HORARIO_INICIAL_PONTO ?>
	<div id="r_HORARIO_INICIAL_PONTO" class="form-group">
		<label id="elh_ponto_HORARIO_INICIAL_PONTO" for="x_HORARIO_INICIAL_PONTO" class="<?php echo $ponto_edit->LeftColumnClass ?>"><?php echo $ponto->HORARIO_INICIAL_PONTO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_edit->RightColumnClass ?>"><div<?php echo $ponto->HORARIO_INICIAL_PONTO->CellAttributes() ?>>
<span id="el_ponto_HORARIO_INICIAL_PONTO">
<input type="text" data-table="ponto" data-field="x_HORARIO_INICIAL_PONTO" name="x_HORARIO_INICIAL_PONTO" id="x_HORARIO_INICIAL_PONTO" size="30" maxlength="7" placeholder="<?php echo ew_HtmlEncode($ponto->HORARIO_INICIAL_PONTO->getPlaceHolder()) ?>" value="<?php echo $ponto->HORARIO_INICIAL_PONTO->EditValue ?>"<?php echo $ponto->HORARIO_INICIAL_PONTO->EditAttributes() ?>>
</span>
<?php echo $ponto->HORARIO_INICIAL_PONTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ponto->HORARIO_FINAL_PONTO->Visible) { // HORARIO_FINAL_PONTO ?>
	<div id="r_HORARIO_FINAL_PONTO" class="form-group">
		<label id="elh_ponto_HORARIO_FINAL_PONTO" for="x_HORARIO_FINAL_PONTO" class="<?php echo $ponto_edit->LeftColumnClass ?>"><?php echo $ponto->HORARIO_FINAL_PONTO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $ponto_edit->RightColumnClass ?>"><div<?php echo $ponto->HORARIO_FINAL_PONTO->CellAttributes() ?>>
<span id="el_ponto_HORARIO_FINAL_PONTO">
<input type="text" data-table="ponto" data-field="x_HORARIO_FINAL_PONTO" name="x_HORARIO_FINAL_PONTO" id="x_HORARIO_FINAL_PONTO" size="30" maxlength="7" placeholder="<?php echo ew_HtmlEncode($ponto->HORARIO_FINAL_PONTO->getPlaceHolder()) ?>" value="<?php echo $ponto->HORARIO_FINAL_PONTO->EditValue ?>"<?php echo $ponto->HORARIO_FINAL_PONTO->EditAttributes() ?>>
</span>
<?php echo $ponto->HORARIO_FINAL_PONTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ponto_edit->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $ponto_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $ponto_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
fpontoedit.Init();
</script>
<?php
$ponto_edit->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ponto_edit->Page_Terminate();
?>
