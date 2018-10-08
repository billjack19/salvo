<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "itensinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$itens_edit = NULL; // Initialize page object first

class citens_edit extends citens {

	// Page ID
	var $PageID = 'edit';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'itens';

	// Page object name
	var $PageObjName = 'itens_edit';

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

		// Table object (itens)
		if (!isset($GLOBALS["itens"]) || get_class($GLOBALS["itens"]) == "citens") {
			$GLOBALS["itens"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["itens"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'itens', TRUE);

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
		$this->ID_ITENS->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_ITENS->Visible = FALSE;
		$this->QTD_ITENS->SetVisibility();
		$this->DESCRICAO_KIT->SetVisibility();
		$this->DESCRICAO_PRODUTO->SetVisibility();

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
		global $EW_EXPORT, $itens;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($itens);
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
					if ($pageName == "itensview.php")
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
			if ($objForm->HasValue("x_ID_ITENS")) {
				$this->ID_ITENS->setFormValue($objForm->GetValue("x_ID_ITENS"));
			}
		} else {
			$this->CurrentAction = "I"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (isset($_GET["ID_ITENS"])) {
				$this->ID_ITENS->setQueryStringValue($_GET["ID_ITENS"]);
				$loadByQuery = TRUE;
			} else {
				$this->ID_ITENS->CurrentValue = NULL;
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
					$this->Page_Terminate("itenslist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$sReturnUrl = $this->getReturnUrl();
				if (ew_GetPageName($sReturnUrl) == "itenslist.php")
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
		if (!$this->ID_ITENS->FldIsDetailKey)
			$this->ID_ITENS->setFormValue($objForm->GetValue("x_ID_ITENS"));
		if (!$this->QTD_ITENS->FldIsDetailKey) {
			$this->QTD_ITENS->setFormValue($objForm->GetValue("x_QTD_ITENS"));
		}
		if (!$this->DESCRICAO_KIT->FldIsDetailKey) {
			$this->DESCRICAO_KIT->setFormValue($objForm->GetValue("x_DESCRICAO_KIT"));
		}
		if (!$this->DESCRICAO_PRODUTO->FldIsDetailKey) {
			$this->DESCRICAO_PRODUTO->setFormValue($objForm->GetValue("x_DESCRICAO_PRODUTO"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->ID_ITENS->CurrentValue = $this->ID_ITENS->FormValue;
		$this->QTD_ITENS->CurrentValue = $this->QTD_ITENS->FormValue;
		$this->DESCRICAO_KIT->CurrentValue = $this->DESCRICAO_KIT->FormValue;
		$this->DESCRICAO_PRODUTO->CurrentValue = $this->DESCRICAO_PRODUTO->FormValue;
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
		$this->ID_ITENS->setDbValue($row['ID_ITENS']);
		$this->QTD_ITENS->setDbValue($row['QTD_ITENS']);
		$this->DESCRICAO_KIT->setDbValue($row['DESCRICAO_KIT']);
		$this->DESCRICAO_PRODUTO->setDbValue($row['DESCRICAO_PRODUTO']);
	}

	// Return a row with default values
	function NewRow() {
		$row = array();
		$row['ID_ITENS'] = NULL;
		$row['QTD_ITENS'] = NULL;
		$row['DESCRICAO_KIT'] = NULL;
		$row['DESCRICAO_PRODUTO'] = NULL;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_ITENS->DbValue = $row['ID_ITENS'];
		$this->QTD_ITENS->DbValue = $row['QTD_ITENS'];
		$this->DESCRICAO_KIT->DbValue = $row['DESCRICAO_KIT'];
		$this->DESCRICAO_PRODUTO->DbValue = $row['DESCRICAO_PRODUTO'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_ITENS")) <> "")
			$this->ID_ITENS->CurrentValue = $this->getKey("ID_ITENS"); // ID_ITENS
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
		// ID_ITENS
		// QTD_ITENS
		// DESCRICAO_KIT
		// DESCRICAO_PRODUTO

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_ITENS
		$this->ID_ITENS->ViewValue = $this->ID_ITENS->CurrentValue;
		$this->ID_ITENS->ViewCustomAttributes = "";

		// QTD_ITENS
		$this->QTD_ITENS->ViewValue = $this->QTD_ITENS->CurrentValue;
		$this->QTD_ITENS->ViewCustomAttributes = "";

		// DESCRICAO_KIT
		$this->DESCRICAO_KIT->ViewValue = $this->DESCRICAO_KIT->CurrentValue;
		$this->DESCRICAO_KIT->ViewCustomAttributes = "";

		// DESCRICAO_PRODUTO
		$this->DESCRICAO_PRODUTO->ViewValue = $this->DESCRICAO_PRODUTO->CurrentValue;
		$this->DESCRICAO_PRODUTO->ViewCustomAttributes = "";

			// ID_ITENS
			$this->ID_ITENS->LinkCustomAttributes = "";
			$this->ID_ITENS->HrefValue = "";
			$this->ID_ITENS->TooltipValue = "";

			// QTD_ITENS
			$this->QTD_ITENS->LinkCustomAttributes = "";
			$this->QTD_ITENS->HrefValue = "";
			$this->QTD_ITENS->TooltipValue = "";

			// DESCRICAO_KIT
			$this->DESCRICAO_KIT->LinkCustomAttributes = "";
			$this->DESCRICAO_KIT->HrefValue = "";
			$this->DESCRICAO_KIT->TooltipValue = "";

			// DESCRICAO_PRODUTO
			$this->DESCRICAO_PRODUTO->LinkCustomAttributes = "";
			$this->DESCRICAO_PRODUTO->HrefValue = "";
			$this->DESCRICAO_PRODUTO->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// ID_ITENS
			$this->ID_ITENS->EditAttrs["class"] = "form-control";
			$this->ID_ITENS->EditCustomAttributes = "";
			$this->ID_ITENS->EditValue = $this->ID_ITENS->CurrentValue;
			$this->ID_ITENS->ViewCustomAttributes = "";

			// QTD_ITENS
			$this->QTD_ITENS->EditAttrs["class"] = "form-control";
			$this->QTD_ITENS->EditCustomAttributes = "";
			$this->QTD_ITENS->EditValue = ew_HtmlEncode($this->QTD_ITENS->CurrentValue);
			$this->QTD_ITENS->PlaceHolder = ew_RemoveHtml($this->QTD_ITENS->FldCaption());

			// DESCRICAO_KIT
			$this->DESCRICAO_KIT->EditAttrs["class"] = "form-control";
			$this->DESCRICAO_KIT->EditCustomAttributes = "";
			$this->DESCRICAO_KIT->EditValue = ew_HtmlEncode($this->DESCRICAO_KIT->CurrentValue);
			$this->DESCRICAO_KIT->PlaceHolder = ew_RemoveHtml($this->DESCRICAO_KIT->FldCaption());

			// DESCRICAO_PRODUTO
			$this->DESCRICAO_PRODUTO->EditAttrs["class"] = "form-control";
			$this->DESCRICAO_PRODUTO->EditCustomAttributes = "";
			$this->DESCRICAO_PRODUTO->EditValue = ew_HtmlEncode($this->DESCRICAO_PRODUTO->CurrentValue);
			$this->DESCRICAO_PRODUTO->PlaceHolder = ew_RemoveHtml($this->DESCRICAO_PRODUTO->FldCaption());

			// Edit refer script
			// ID_ITENS

			$this->ID_ITENS->LinkCustomAttributes = "";
			$this->ID_ITENS->HrefValue = "";

			// QTD_ITENS
			$this->QTD_ITENS->LinkCustomAttributes = "";
			$this->QTD_ITENS->HrefValue = "";

			// DESCRICAO_KIT
			$this->DESCRICAO_KIT->LinkCustomAttributes = "";
			$this->DESCRICAO_KIT->HrefValue = "";

			// DESCRICAO_PRODUTO
			$this->DESCRICAO_PRODUTO->LinkCustomAttributes = "";
			$this->DESCRICAO_PRODUTO->HrefValue = "";
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
		if (!$this->QTD_ITENS->FldIsDetailKey && !is_null($this->QTD_ITENS->FormValue) && $this->QTD_ITENS->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->QTD_ITENS->FldCaption(), $this->QTD_ITENS->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->QTD_ITENS->FormValue)) {
			ew_AddMessage($gsFormError, $this->QTD_ITENS->FldErrMsg());
		}
		if (!$this->DESCRICAO_KIT->FldIsDetailKey && !is_null($this->DESCRICAO_KIT->FormValue) && $this->DESCRICAO_KIT->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DESCRICAO_KIT->FldCaption(), $this->DESCRICAO_KIT->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->DESCRICAO_KIT->FormValue)) {
			ew_AddMessage($gsFormError, $this->DESCRICAO_KIT->FldErrMsg());
		}
		if (!$this->DESCRICAO_PRODUTO->FldIsDetailKey && !is_null($this->DESCRICAO_PRODUTO->FormValue) && $this->DESCRICAO_PRODUTO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DESCRICAO_PRODUTO->FldCaption(), $this->DESCRICAO_PRODUTO->ReqErrMsg));
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

			// QTD_ITENS
			$this->QTD_ITENS->SetDbValueDef($rsnew, $this->QTD_ITENS->CurrentValue, 0, $this->QTD_ITENS->ReadOnly);

			// DESCRICAO_KIT
			$this->DESCRICAO_KIT->SetDbValueDef($rsnew, $this->DESCRICAO_KIT->CurrentValue, 0, $this->DESCRICAO_KIT->ReadOnly);

			// DESCRICAO_PRODUTO
			$this->DESCRICAO_PRODUTO->SetDbValueDef($rsnew, $this->DESCRICAO_PRODUTO->CurrentValue, "", $this->DESCRICAO_PRODUTO->ReadOnly);

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("itenslist.php"), "", $this->TableVar, TRUE);
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
if (!isset($itens_edit)) $itens_edit = new citens_edit();

// Page init
$itens_edit->Page_Init();

// Page main
$itens_edit->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$itens_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "edit";
var CurrentForm = fitensedit = new ew_Form("fitensedit", "edit");

// Validate form
fitensedit.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_QTD_ITENS");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $itens->QTD_ITENS->FldCaption(), $itens->QTD_ITENS->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_QTD_ITENS");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($itens->QTD_ITENS->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_DESCRICAO_KIT");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $itens->DESCRICAO_KIT->FldCaption(), $itens->DESCRICAO_KIT->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_DESCRICAO_KIT");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($itens->DESCRICAO_KIT->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_DESCRICAO_PRODUTO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $itens->DESCRICAO_PRODUTO->FldCaption(), $itens->DESCRICAO_PRODUTO->ReqErrMsg)) ?>");

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
fitensedit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
fitensedit.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $itens_edit->ShowPageHeader(); ?>
<?php
$itens_edit->ShowMessage();
?>
<form name="fitensedit" id="fitensedit" class="<?php echo $itens_edit->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($itens_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $itens_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="itens">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<input type="hidden" name="modal" value="<?php echo intval($itens_edit->IsModal) ?>">
<div class="ewEditDiv"><!-- page* -->
<?php if ($itens->ID_ITENS->Visible) { // ID_ITENS ?>
	<div id="r_ID_ITENS" class="form-group">
		<label id="elh_itens_ID_ITENS" class="<?php echo $itens_edit->LeftColumnClass ?>"><?php echo $itens->ID_ITENS->FldCaption() ?></label>
		<div class="<?php echo $itens_edit->RightColumnClass ?>"><div<?php echo $itens->ID_ITENS->CellAttributes() ?>>
<span id="el_itens_ID_ITENS">
<span<?php echo $itens->ID_ITENS->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $itens->ID_ITENS->EditValue ?></p></span>
</span>
<input type="hidden" data-table="itens" data-field="x_ID_ITENS" name="x_ID_ITENS" id="x_ID_ITENS" value="<?php echo ew_HtmlEncode($itens->ID_ITENS->CurrentValue) ?>">
<?php echo $itens->ID_ITENS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($itens->QTD_ITENS->Visible) { // QTD_ITENS ?>
	<div id="r_QTD_ITENS" class="form-group">
		<label id="elh_itens_QTD_ITENS" for="x_QTD_ITENS" class="<?php echo $itens_edit->LeftColumnClass ?>"><?php echo $itens->QTD_ITENS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $itens_edit->RightColumnClass ?>"><div<?php echo $itens->QTD_ITENS->CellAttributes() ?>>
<span id="el_itens_QTD_ITENS">
<input type="text" data-table="itens" data-field="x_QTD_ITENS" name="x_QTD_ITENS" id="x_QTD_ITENS" size="30" placeholder="<?php echo ew_HtmlEncode($itens->QTD_ITENS->getPlaceHolder()) ?>" value="<?php echo $itens->QTD_ITENS->EditValue ?>"<?php echo $itens->QTD_ITENS->EditAttributes() ?>>
</span>
<?php echo $itens->QTD_ITENS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($itens->DESCRICAO_KIT->Visible) { // DESCRICAO_KIT ?>
	<div id="r_DESCRICAO_KIT" class="form-group">
		<label id="elh_itens_DESCRICAO_KIT" for="x_DESCRICAO_KIT" class="<?php echo $itens_edit->LeftColumnClass ?>"><?php echo $itens->DESCRICAO_KIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $itens_edit->RightColumnClass ?>"><div<?php echo $itens->DESCRICAO_KIT->CellAttributes() ?>>
<span id="el_itens_DESCRICAO_KIT">
<input type="text" data-table="itens" data-field="x_DESCRICAO_KIT" name="x_DESCRICAO_KIT" id="x_DESCRICAO_KIT" size="30" placeholder="<?php echo ew_HtmlEncode($itens->DESCRICAO_KIT->getPlaceHolder()) ?>" value="<?php echo $itens->DESCRICAO_KIT->EditValue ?>"<?php echo $itens->DESCRICAO_KIT->EditAttributes() ?>>
</span>
<?php echo $itens->DESCRICAO_KIT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($itens->DESCRICAO_PRODUTO->Visible) { // DESCRICAO_PRODUTO ?>
	<div id="r_DESCRICAO_PRODUTO" class="form-group">
		<label id="elh_itens_DESCRICAO_PRODUTO" for="x_DESCRICAO_PRODUTO" class="<?php echo $itens_edit->LeftColumnClass ?>"><?php echo $itens->DESCRICAO_PRODUTO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $itens_edit->RightColumnClass ?>"><div<?php echo $itens->DESCRICAO_PRODUTO->CellAttributes() ?>>
<span id="el_itens_DESCRICAO_PRODUTO">
<input type="text" data-table="itens" data-field="x_DESCRICAO_PRODUTO" name="x_DESCRICAO_PRODUTO" id="x_DESCRICAO_PRODUTO" size="30" maxlength="45" placeholder="<?php echo ew_HtmlEncode($itens->DESCRICAO_PRODUTO->getPlaceHolder()) ?>" value="<?php echo $itens->DESCRICAO_PRODUTO->EditValue ?>"<?php echo $itens->DESCRICAO_PRODUTO->EditAttributes() ?>>
</span>
<?php echo $itens->DESCRICAO_PRODUTO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$itens_edit->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $itens_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $itens_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
fitensedit.Init();
</script>
<?php
$itens_edit->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$itens_edit->Page_Terminate();
?>
