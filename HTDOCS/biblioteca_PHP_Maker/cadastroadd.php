<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "cadastroinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$cadastro_add = NULL; // Initialize page object first

class ccadastro_add extends ccadastro {

	// Page ID
	var $PageID = 'add';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'cadastro';

	// Page object name
	var $PageObjName = 'cadastro_add';

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

		// Table object (cadastro)
		if (!isset($GLOBALS["cadastro"]) || get_class($GLOBALS["cadastro"]) == "ccadastro") {
			$GLOBALS["cadastro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["cadastro"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'cadastro', TRUE);

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
		$this->NOME_CADASTRO->SetVisibility();
		$this->LOGIN_CADASTRO->SetVisibility();
		$this->SENHA_CADASTRO->SetVisibility();
		$this->ID_NIVEL_ACESSO->SetVisibility();

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
		global $EW_EXPORT, $cadastro;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($cadastro);
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
					if ($pageName == "cadastroview.php")
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
			if (@$_GET["ID_CADASTRO"] != "") {
				$this->ID_CADASTRO->setQueryStringValue($_GET["ID_CADASTRO"]);
				$this->setKey("ID_CADASTRO", $this->ID_CADASTRO->CurrentValue); // Set up key
			} else {
				$this->setKey("ID_CADASTRO", ""); // Clear key
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
					$this->Page_Terminate("cadastrolist.php"); // No matching record, return to list
				}
				break;
			case "A": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $this->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "cadastrolist.php")
						$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to List page with correct master key if necessary
					elseif (ew_GetPageName($sReturnUrl) == "cadastroview.php")
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
		$this->ID_CADASTRO->CurrentValue = NULL;
		$this->ID_CADASTRO->OldValue = $this->ID_CADASTRO->CurrentValue;
		$this->NOME_CADASTRO->CurrentValue = NULL;
		$this->NOME_CADASTRO->OldValue = $this->NOME_CADASTRO->CurrentValue;
		$this->LOGIN_CADASTRO->CurrentValue = NULL;
		$this->LOGIN_CADASTRO->OldValue = $this->LOGIN_CADASTRO->CurrentValue;
		$this->SENHA_CADASTRO->CurrentValue = NULL;
		$this->SENHA_CADASTRO->OldValue = $this->SENHA_CADASTRO->CurrentValue;
		$this->ID_NIVEL_ACESSO->CurrentValue = NULL;
		$this->ID_NIVEL_ACESSO->OldValue = $this->ID_NIVEL_ACESSO->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->NOME_CADASTRO->FldIsDetailKey) {
			$this->NOME_CADASTRO->setFormValue($objForm->GetValue("x_NOME_CADASTRO"));
		}
		if (!$this->LOGIN_CADASTRO->FldIsDetailKey) {
			$this->LOGIN_CADASTRO->setFormValue($objForm->GetValue("x_LOGIN_CADASTRO"));
		}
		if (!$this->SENHA_CADASTRO->FldIsDetailKey) {
			$this->SENHA_CADASTRO->setFormValue($objForm->GetValue("x_SENHA_CADASTRO"));
		}
		if (!$this->ID_NIVEL_ACESSO->FldIsDetailKey) {
			$this->ID_NIVEL_ACESSO->setFormValue($objForm->GetValue("x_ID_NIVEL_ACESSO"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->NOME_CADASTRO->CurrentValue = $this->NOME_CADASTRO->FormValue;
		$this->LOGIN_CADASTRO->CurrentValue = $this->LOGIN_CADASTRO->FormValue;
		$this->SENHA_CADASTRO->CurrentValue = $this->SENHA_CADASTRO->FormValue;
		$this->ID_NIVEL_ACESSO->CurrentValue = $this->ID_NIVEL_ACESSO->FormValue;
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
		$this->ID_CADASTRO->setDbValue($row['ID_CADASTRO']);
		$this->NOME_CADASTRO->setDbValue($row['NOME_CADASTRO']);
		$this->LOGIN_CADASTRO->setDbValue($row['LOGIN_CADASTRO']);
		$this->SENHA_CADASTRO->setDbValue($row['SENHA_CADASTRO']);
		$this->ID_NIVEL_ACESSO->setDbValue($row['ID_NIVEL_ACESSO']);
	}

	// Return a row with default values
	function NewRow() {
		$this->LoadDefaultValues();
		$row = array();
		$row['ID_CADASTRO'] = $this->ID_CADASTRO->CurrentValue;
		$row['NOME_CADASTRO'] = $this->NOME_CADASTRO->CurrentValue;
		$row['LOGIN_CADASTRO'] = $this->LOGIN_CADASTRO->CurrentValue;
		$row['SENHA_CADASTRO'] = $this->SENHA_CADASTRO->CurrentValue;
		$row['ID_NIVEL_ACESSO'] = $this->ID_NIVEL_ACESSO->CurrentValue;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_CADASTRO->DbValue = $row['ID_CADASTRO'];
		$this->NOME_CADASTRO->DbValue = $row['NOME_CADASTRO'];
		$this->LOGIN_CADASTRO->DbValue = $row['LOGIN_CADASTRO'];
		$this->SENHA_CADASTRO->DbValue = $row['SENHA_CADASTRO'];
		$this->ID_NIVEL_ACESSO->DbValue = $row['ID_NIVEL_ACESSO'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_CADASTRO")) <> "")
			$this->ID_CADASTRO->CurrentValue = $this->getKey("ID_CADASTRO"); // ID_CADASTRO
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
		// ID_CADASTRO
		// NOME_CADASTRO
		// LOGIN_CADASTRO
		// SENHA_CADASTRO
		// ID_NIVEL_ACESSO

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_CADASTRO
		$this->ID_CADASTRO->ViewValue = $this->ID_CADASTRO->CurrentValue;
		$this->ID_CADASTRO->ViewCustomAttributes = "";

		// NOME_CADASTRO
		$this->NOME_CADASTRO->ViewValue = $this->NOME_CADASTRO->CurrentValue;
		$this->NOME_CADASTRO->ViewCustomAttributes = "";

		// LOGIN_CADASTRO
		$this->LOGIN_CADASTRO->ViewValue = $this->LOGIN_CADASTRO->CurrentValue;
		$this->LOGIN_CADASTRO->ViewCustomAttributes = "";

		// SENHA_CADASTRO
		$this->SENHA_CADASTRO->ViewValue = $this->SENHA_CADASTRO->CurrentValue;
		$this->SENHA_CADASTRO->ViewCustomAttributes = "";

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->ViewValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->ID_NIVEL_ACESSO->ViewCustomAttributes = "";

			// NOME_CADASTRO
			$this->NOME_CADASTRO->LinkCustomAttributes = "";
			$this->NOME_CADASTRO->HrefValue = "";
			$this->NOME_CADASTRO->TooltipValue = "";

			// LOGIN_CADASTRO
			$this->LOGIN_CADASTRO->LinkCustomAttributes = "";
			$this->LOGIN_CADASTRO->HrefValue = "";
			$this->LOGIN_CADASTRO->TooltipValue = "";

			// SENHA_CADASTRO
			$this->SENHA_CADASTRO->LinkCustomAttributes = "";
			$this->SENHA_CADASTRO->HrefValue = "";
			$this->SENHA_CADASTRO->TooltipValue = "";

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->LinkCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->HrefValue = "";
			$this->ID_NIVEL_ACESSO->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_ADD) { // Add row

			// NOME_CADASTRO
			$this->NOME_CADASTRO->EditAttrs["class"] = "form-control";
			$this->NOME_CADASTRO->EditCustomAttributes = "";
			$this->NOME_CADASTRO->EditValue = ew_HtmlEncode($this->NOME_CADASTRO->CurrentValue);
			$this->NOME_CADASTRO->PlaceHolder = ew_RemoveHtml($this->NOME_CADASTRO->FldCaption());

			// LOGIN_CADASTRO
			$this->LOGIN_CADASTRO->EditAttrs["class"] = "form-control";
			$this->LOGIN_CADASTRO->EditCustomAttributes = "";
			$this->LOGIN_CADASTRO->EditValue = ew_HtmlEncode($this->LOGIN_CADASTRO->CurrentValue);
			$this->LOGIN_CADASTRO->PlaceHolder = ew_RemoveHtml($this->LOGIN_CADASTRO->FldCaption());

			// SENHA_CADASTRO
			$this->SENHA_CADASTRO->EditAttrs["class"] = "form-control";
			$this->SENHA_CADASTRO->EditCustomAttributes = "";
			$this->SENHA_CADASTRO->EditValue = ew_HtmlEncode($this->SENHA_CADASTRO->CurrentValue);
			$this->SENHA_CADASTRO->PlaceHolder = ew_RemoveHtml($this->SENHA_CADASTRO->FldCaption());

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->EditAttrs["class"] = "form-control";
			$this->ID_NIVEL_ACESSO->EditCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->EditValue = ew_HtmlEncode($this->ID_NIVEL_ACESSO->CurrentValue);
			$this->ID_NIVEL_ACESSO->PlaceHolder = ew_RemoveHtml($this->ID_NIVEL_ACESSO->FldCaption());

			// Add refer script
			// NOME_CADASTRO

			$this->NOME_CADASTRO->LinkCustomAttributes = "";
			$this->NOME_CADASTRO->HrefValue = "";

			// LOGIN_CADASTRO
			$this->LOGIN_CADASTRO->LinkCustomAttributes = "";
			$this->LOGIN_CADASTRO->HrefValue = "";

			// SENHA_CADASTRO
			$this->SENHA_CADASTRO->LinkCustomAttributes = "";
			$this->SENHA_CADASTRO->HrefValue = "";

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->LinkCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->HrefValue = "";
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
		if (!$this->NOME_CADASTRO->FldIsDetailKey && !is_null($this->NOME_CADASTRO->FormValue) && $this->NOME_CADASTRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->NOME_CADASTRO->FldCaption(), $this->NOME_CADASTRO->ReqErrMsg));
		}
		if (!$this->LOGIN_CADASTRO->FldIsDetailKey && !is_null($this->LOGIN_CADASTRO->FormValue) && $this->LOGIN_CADASTRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->LOGIN_CADASTRO->FldCaption(), $this->LOGIN_CADASTRO->ReqErrMsg));
		}
		if (!$this->SENHA_CADASTRO->FldIsDetailKey && !is_null($this->SENHA_CADASTRO->FormValue) && $this->SENHA_CADASTRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->SENHA_CADASTRO->FldCaption(), $this->SENHA_CADASTRO->ReqErrMsg));
		}
		if (!$this->ID_NIVEL_ACESSO->FldIsDetailKey && !is_null($this->ID_NIVEL_ACESSO->FormValue) && $this->ID_NIVEL_ACESSO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ID_NIVEL_ACESSO->FldCaption(), $this->ID_NIVEL_ACESSO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ID_NIVEL_ACESSO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_NIVEL_ACESSO->FldErrMsg());
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
		if ($this->LOGIN_CADASTRO->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(LOGIN_CADASTRO = '" . ew_AdjustSql($this->LOGIN_CADASTRO->CurrentValue, $this->DBID) . "')";
			$rsChk = $this->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", $this->LOGIN_CADASTRO->FldCaption(), $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $this->LOGIN_CADASTRO->CurrentValue, $sIdxErrMsg);
				$this->setFailureMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$conn = &$this->Connection();

		// Load db values from rsold
		$this->LoadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = array();

		// NOME_CADASTRO
		$this->NOME_CADASTRO->SetDbValueDef($rsnew, $this->NOME_CADASTRO->CurrentValue, "", FALSE);

		// LOGIN_CADASTRO
		$this->LOGIN_CADASTRO->SetDbValueDef($rsnew, $this->LOGIN_CADASTRO->CurrentValue, "", FALSE);

		// SENHA_CADASTRO
		$this->SENHA_CADASTRO->SetDbValueDef($rsnew, $this->SENHA_CADASTRO->CurrentValue, "", FALSE);

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->SetDbValueDef($rsnew, $this->ID_NIVEL_ACESSO->CurrentValue, 0, FALSE);

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("cadastrolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($cadastro_add)) $cadastro_add = new ccadastro_add();

// Page init
$cadastro_add->Page_Init();

// Page main
$cadastro_add->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cadastro_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "add";
var CurrentForm = fcadastroadd = new ew_Form("fcadastroadd", "add");

// Validate form
fcadastroadd.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_NOME_CADASTRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $cadastro->NOME_CADASTRO->FldCaption(), $cadastro->NOME_CADASTRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_LOGIN_CADASTRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $cadastro->LOGIN_CADASTRO->FldCaption(), $cadastro->LOGIN_CADASTRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_SENHA_CADASTRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $cadastro->SENHA_CADASTRO->FldCaption(), $cadastro->SENHA_CADASTRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_NIVEL_ACESSO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $cadastro->ID_NIVEL_ACESSO->FldCaption(), $cadastro->ID_NIVEL_ACESSO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_NIVEL_ACESSO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($cadastro->ID_NIVEL_ACESSO->FldErrMsg()) ?>");

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
fcadastroadd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
fcadastroadd.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $cadastro_add->ShowPageHeader(); ?>
<?php
$cadastro_add->ShowMessage();
?>
<form name="fcadastroadd" id="fcadastroadd" class="<?php echo $cadastro_add->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($cadastro_add->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $cadastro_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cadastro">
<input type="hidden" name="a_add" id="a_add" value="A">
<input type="hidden" name="modal" value="<?php echo intval($cadastro_add->IsModal) ?>">
<div class="ewAddDiv"><!-- page* -->
<?php if ($cadastro->NOME_CADASTRO->Visible) { // NOME_CADASTRO ?>
	<div id="r_NOME_CADASTRO" class="form-group">
		<label id="elh_cadastro_NOME_CADASTRO" for="x_NOME_CADASTRO" class="<?php echo $cadastro_add->LeftColumnClass ?>"><?php echo $cadastro->NOME_CADASTRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $cadastro_add->RightColumnClass ?>"><div<?php echo $cadastro->NOME_CADASTRO->CellAttributes() ?>>
<span id="el_cadastro_NOME_CADASTRO">
<input type="text" data-table="cadastro" data-field="x_NOME_CADASTRO" name="x_NOME_CADASTRO" id="x_NOME_CADASTRO" size="30" maxlength="50" placeholder="<?php echo ew_HtmlEncode($cadastro->NOME_CADASTRO->getPlaceHolder()) ?>" value="<?php echo $cadastro->NOME_CADASTRO->EditValue ?>"<?php echo $cadastro->NOME_CADASTRO->EditAttributes() ?>>
</span>
<?php echo $cadastro->NOME_CADASTRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cadastro->LOGIN_CADASTRO->Visible) { // LOGIN_CADASTRO ?>
	<div id="r_LOGIN_CADASTRO" class="form-group">
		<label id="elh_cadastro_LOGIN_CADASTRO" for="x_LOGIN_CADASTRO" class="<?php echo $cadastro_add->LeftColumnClass ?>"><?php echo $cadastro->LOGIN_CADASTRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $cadastro_add->RightColumnClass ?>"><div<?php echo $cadastro->LOGIN_CADASTRO->CellAttributes() ?>>
<span id="el_cadastro_LOGIN_CADASTRO">
<input type="text" data-table="cadastro" data-field="x_LOGIN_CADASTRO" name="x_LOGIN_CADASTRO" id="x_LOGIN_CADASTRO" size="30" maxlength="50" placeholder="<?php echo ew_HtmlEncode($cadastro->LOGIN_CADASTRO->getPlaceHolder()) ?>" value="<?php echo $cadastro->LOGIN_CADASTRO->EditValue ?>"<?php echo $cadastro->LOGIN_CADASTRO->EditAttributes() ?>>
</span>
<?php echo $cadastro->LOGIN_CADASTRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cadastro->SENHA_CADASTRO->Visible) { // SENHA_CADASTRO ?>
	<div id="r_SENHA_CADASTRO" class="form-group">
		<label id="elh_cadastro_SENHA_CADASTRO" for="x_SENHA_CADASTRO" class="<?php echo $cadastro_add->LeftColumnClass ?>"><?php echo $cadastro->SENHA_CADASTRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $cadastro_add->RightColumnClass ?>"><div<?php echo $cadastro->SENHA_CADASTRO->CellAttributes() ?>>
<span id="el_cadastro_SENHA_CADASTRO">
<input type="text" data-table="cadastro" data-field="x_SENHA_CADASTRO" name="x_SENHA_CADASTRO" id="x_SENHA_CADASTRO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($cadastro->SENHA_CADASTRO->getPlaceHolder()) ?>" value="<?php echo $cadastro->SENHA_CADASTRO->EditValue ?>"<?php echo $cadastro->SENHA_CADASTRO->EditAttributes() ?>>
</span>
<?php echo $cadastro->SENHA_CADASTRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cadastro->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
	<div id="r_ID_NIVEL_ACESSO" class="form-group">
		<label id="elh_cadastro_ID_NIVEL_ACESSO" for="x_ID_NIVEL_ACESSO" class="<?php echo $cadastro_add->LeftColumnClass ?>"><?php echo $cadastro->ID_NIVEL_ACESSO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $cadastro_add->RightColumnClass ?>"><div<?php echo $cadastro->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el_cadastro_ID_NIVEL_ACESSO">
<input type="text" data-table="cadastro" data-field="x_ID_NIVEL_ACESSO" name="x_ID_NIVEL_ACESSO" id="x_ID_NIVEL_ACESSO" size="30" placeholder="<?php echo ew_HtmlEncode($cadastro->ID_NIVEL_ACESSO->getPlaceHolder()) ?>" value="<?php echo $cadastro->ID_NIVEL_ACESSO->EditValue ?>"<?php echo $cadastro->ID_NIVEL_ACESSO->EditAttributes() ?>>
</span>
<?php echo $cadastro->ID_NIVEL_ACESSO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$cadastro_add->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $cadastro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $cadastro_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
fcadastroadd.Init();
</script>
<?php
$cadastro_add->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$cadastro_add->Page_Terminate();
?>
