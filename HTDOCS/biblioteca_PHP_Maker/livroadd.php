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

$livro_add = NULL; // Initialize page object first

class clivro_add extends clivro {

	// Page ID
	var $PageID = 'add';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'livro';

	// Page object name
	var $PageObjName = 'livro_add';

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
			define("EW_PAGE_ID", 'add', TRUE);

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

		// Is modal
		$this->IsModal = (@$_GET["modal"] == "1" || @$_POST["modal"] == "1");

		// Create form object
		$objForm = new cFormObj();
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = ew_GetPageName($url);
				if ($pageName != $this->GetListUrl()) { // Not List page
					$row["caption"] = $this->GetModalCaption($pageName);
					if ($pageName == "livroview.php")
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
			if (@$_GET["ID_LIVRO"] != "") {
				$this->ID_LIVRO->setQueryStringValue($_GET["ID_LIVRO"]);
				$this->setKey("ID_LIVRO", $this->ID_LIVRO->CurrentValue); // Set up key
			} else {
				$this->setKey("ID_LIVRO", ""); // Clear key
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
					$this->Page_Terminate("livrolist.php"); // No matching record, return to list
				}
				break;
			case "A": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $this->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "livrolist.php")
						$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to List page with correct master key if necessary
					elseif (ew_GetPageName($sReturnUrl) == "livroview.php")
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
		$this->ID_LIVRO->CurrentValue = NULL;
		$this->ID_LIVRO->OldValue = $this->ID_LIVRO->CurrentValue;
		$this->CODIGO_LIVRO->CurrentValue = NULL;
		$this->CODIGO_LIVRO->OldValue = $this->CODIGO_LIVRO->CurrentValue;
		$this->ISBN->CurrentValue = NULL;
		$this->ISBN->OldValue = $this->ISBN->CurrentValue;
		$this->NOME_LIVRO->CurrentValue = NULL;
		$this->NOME_LIVRO->OldValue = $this->NOME_LIVRO->CurrentValue;
		$this->AUTOR_LIVRO->CurrentValue = NULL;
		$this->AUTOR_LIVRO->OldValue = $this->AUTOR_LIVRO->CurrentValue;
		$this->TEMA_LIVRO->CurrentValue = NULL;
		$this->TEMA_LIVRO->OldValue = $this->TEMA_LIVRO->CurrentValue;
		$this->ANO_LIVRO->CurrentValue = NULL;
		$this->ANO_LIVRO->OldValue = $this->ANO_LIVRO->CurrentValue;
		$this->MATERIA_LIVRO->CurrentValue = NULL;
		$this->MATERIA_LIVRO->OldValue = $this->MATERIA_LIVRO->CurrentValue;
		$this->ESTANTE_LIVRO->CurrentValue = NULL;
		$this->ESTANTE_LIVRO->OldValue = $this->ESTANTE_LIVRO->CurrentValue;
		$this->PRATELEIRA_LIVRO->CurrentValue = NULL;
		$this->PRATELEIRA_LIVRO->OldValue = $this->PRATELEIRA_LIVRO->CurrentValue;
		$this->EDITORA_LIVRO->CurrentValue = NULL;
		$this->EDITORA_LIVRO->OldValue = $this->EDITORA_LIVRO->CurrentValue;
		$this->EDICAO_LIVRO->CurrentValue = NULL;
		$this->EDICAO_LIVRO->OldValue = $this->EDICAO_LIVRO->CurrentValue;
		$this->IDIOMA_LIVRO->CurrentValue = NULL;
		$this->IDIOMA_LIVRO->OldValue = $this->IDIOMA_LIVRO->CurrentValue;
		$this->PRAZO_LIVRO->CurrentValue = NULL;
		$this->PRAZO_LIVRO->OldValue = $this->PRAZO_LIVRO->CurrentValue;
		$this->STATUS_LIVRO->CurrentValue = NULL;
		$this->STATUS_LIVRO->OldValue = $this->STATUS_LIVRO->CurrentValue;
		$this->FREQUENCIA_LIVRO->CurrentValue = NULL;
		$this->FREQUENCIA_LIVRO->OldValue = $this->FREQUENCIA_LIVRO->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->CODIGO_LIVRO->FldIsDetailKey) {
			$this->CODIGO_LIVRO->setFormValue($objForm->GetValue("x_CODIGO_LIVRO"));
		}
		if (!$this->ISBN->FldIsDetailKey) {
			$this->ISBN->setFormValue($objForm->GetValue("x_ISBN"));
		}
		if (!$this->NOME_LIVRO->FldIsDetailKey) {
			$this->NOME_LIVRO->setFormValue($objForm->GetValue("x_NOME_LIVRO"));
		}
		if (!$this->AUTOR_LIVRO->FldIsDetailKey) {
			$this->AUTOR_LIVRO->setFormValue($objForm->GetValue("x_AUTOR_LIVRO"));
		}
		if (!$this->TEMA_LIVRO->FldIsDetailKey) {
			$this->TEMA_LIVRO->setFormValue($objForm->GetValue("x_TEMA_LIVRO"));
		}
		if (!$this->ANO_LIVRO->FldIsDetailKey) {
			$this->ANO_LIVRO->setFormValue($objForm->GetValue("x_ANO_LIVRO"));
		}
		if (!$this->MATERIA_LIVRO->FldIsDetailKey) {
			$this->MATERIA_LIVRO->setFormValue($objForm->GetValue("x_MATERIA_LIVRO"));
		}
		if (!$this->ESTANTE_LIVRO->FldIsDetailKey) {
			$this->ESTANTE_LIVRO->setFormValue($objForm->GetValue("x_ESTANTE_LIVRO"));
		}
		if (!$this->PRATELEIRA_LIVRO->FldIsDetailKey) {
			$this->PRATELEIRA_LIVRO->setFormValue($objForm->GetValue("x_PRATELEIRA_LIVRO"));
		}
		if (!$this->EDITORA_LIVRO->FldIsDetailKey) {
			$this->EDITORA_LIVRO->setFormValue($objForm->GetValue("x_EDITORA_LIVRO"));
		}
		if (!$this->EDICAO_LIVRO->FldIsDetailKey) {
			$this->EDICAO_LIVRO->setFormValue($objForm->GetValue("x_EDICAO_LIVRO"));
		}
		if (!$this->IDIOMA_LIVRO->FldIsDetailKey) {
			$this->IDIOMA_LIVRO->setFormValue($objForm->GetValue("x_IDIOMA_LIVRO"));
		}
		if (!$this->PRAZO_LIVRO->FldIsDetailKey) {
			$this->PRAZO_LIVRO->setFormValue($objForm->GetValue("x_PRAZO_LIVRO"));
		}
		if (!$this->STATUS_LIVRO->FldIsDetailKey) {
			$this->STATUS_LIVRO->setFormValue($objForm->GetValue("x_STATUS_LIVRO"));
		}
		if (!$this->FREQUENCIA_LIVRO->FldIsDetailKey) {
			$this->FREQUENCIA_LIVRO->setFormValue($objForm->GetValue("x_FREQUENCIA_LIVRO"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->CODIGO_LIVRO->CurrentValue = $this->CODIGO_LIVRO->FormValue;
		$this->ISBN->CurrentValue = $this->ISBN->FormValue;
		$this->NOME_LIVRO->CurrentValue = $this->NOME_LIVRO->FormValue;
		$this->AUTOR_LIVRO->CurrentValue = $this->AUTOR_LIVRO->FormValue;
		$this->TEMA_LIVRO->CurrentValue = $this->TEMA_LIVRO->FormValue;
		$this->ANO_LIVRO->CurrentValue = $this->ANO_LIVRO->FormValue;
		$this->MATERIA_LIVRO->CurrentValue = $this->MATERIA_LIVRO->FormValue;
		$this->ESTANTE_LIVRO->CurrentValue = $this->ESTANTE_LIVRO->FormValue;
		$this->PRATELEIRA_LIVRO->CurrentValue = $this->PRATELEIRA_LIVRO->FormValue;
		$this->EDITORA_LIVRO->CurrentValue = $this->EDITORA_LIVRO->FormValue;
		$this->EDICAO_LIVRO->CurrentValue = $this->EDICAO_LIVRO->FormValue;
		$this->IDIOMA_LIVRO->CurrentValue = $this->IDIOMA_LIVRO->FormValue;
		$this->PRAZO_LIVRO->CurrentValue = $this->PRAZO_LIVRO->FormValue;
		$this->STATUS_LIVRO->CurrentValue = $this->STATUS_LIVRO->FormValue;
		$this->FREQUENCIA_LIVRO->CurrentValue = $this->FREQUENCIA_LIVRO->FormValue;
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
		$this->LoadDefaultValues();
		$row = array();
		$row['ID_LIVRO'] = $this->ID_LIVRO->CurrentValue;
		$row['CODIGO_LIVRO'] = $this->CODIGO_LIVRO->CurrentValue;
		$row['ISBN'] = $this->ISBN->CurrentValue;
		$row['NOME_LIVRO'] = $this->NOME_LIVRO->CurrentValue;
		$row['AUTOR_LIVRO'] = $this->AUTOR_LIVRO->CurrentValue;
		$row['TEMA_LIVRO'] = $this->TEMA_LIVRO->CurrentValue;
		$row['ANO_LIVRO'] = $this->ANO_LIVRO->CurrentValue;
		$row['MATERIA_LIVRO'] = $this->MATERIA_LIVRO->CurrentValue;
		$row['ESTANTE_LIVRO'] = $this->ESTANTE_LIVRO->CurrentValue;
		$row['PRATELEIRA_LIVRO'] = $this->PRATELEIRA_LIVRO->CurrentValue;
		$row['EDITORA_LIVRO'] = $this->EDITORA_LIVRO->CurrentValue;
		$row['EDICAO_LIVRO'] = $this->EDICAO_LIVRO->CurrentValue;
		$row['IDIOMA_LIVRO'] = $this->IDIOMA_LIVRO->CurrentValue;
		$row['PRAZO_LIVRO'] = $this->PRAZO_LIVRO->CurrentValue;
		$row['STATUS_LIVRO'] = $this->STATUS_LIVRO->CurrentValue;
		$row['FREQUENCIA_LIVRO'] = $this->FREQUENCIA_LIVRO->CurrentValue;
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

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_LIVRO")) <> "")
			$this->ID_LIVRO->CurrentValue = $this->getKey("ID_LIVRO"); // ID_LIVRO
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
		} elseif ($this->RowType == EW_ROWTYPE_ADD) { // Add row

			// CODIGO_LIVRO
			$this->CODIGO_LIVRO->EditAttrs["class"] = "form-control";
			$this->CODIGO_LIVRO->EditCustomAttributes = "";
			$this->CODIGO_LIVRO->EditValue = ew_HtmlEncode($this->CODIGO_LIVRO->CurrentValue);
			$this->CODIGO_LIVRO->PlaceHolder = ew_RemoveHtml($this->CODIGO_LIVRO->FldCaption());

			// ISBN
			$this->ISBN->EditAttrs["class"] = "form-control";
			$this->ISBN->EditCustomAttributes = "";
			$this->ISBN->EditValue = ew_HtmlEncode($this->ISBN->CurrentValue);
			$this->ISBN->PlaceHolder = ew_RemoveHtml($this->ISBN->FldCaption());

			// NOME_LIVRO
			$this->NOME_LIVRO->EditAttrs["class"] = "form-control";
			$this->NOME_LIVRO->EditCustomAttributes = "";
			$this->NOME_LIVRO->EditValue = ew_HtmlEncode($this->NOME_LIVRO->CurrentValue);
			$this->NOME_LIVRO->PlaceHolder = ew_RemoveHtml($this->NOME_LIVRO->FldCaption());

			// AUTOR_LIVRO
			$this->AUTOR_LIVRO->EditAttrs["class"] = "form-control";
			$this->AUTOR_LIVRO->EditCustomAttributes = "";
			$this->AUTOR_LIVRO->EditValue = ew_HtmlEncode($this->AUTOR_LIVRO->CurrentValue);
			$this->AUTOR_LIVRO->PlaceHolder = ew_RemoveHtml($this->AUTOR_LIVRO->FldCaption());

			// TEMA_LIVRO
			$this->TEMA_LIVRO->EditAttrs["class"] = "form-control";
			$this->TEMA_LIVRO->EditCustomAttributes = "";
			$this->TEMA_LIVRO->EditValue = ew_HtmlEncode($this->TEMA_LIVRO->CurrentValue);
			$this->TEMA_LIVRO->PlaceHolder = ew_RemoveHtml($this->TEMA_LIVRO->FldCaption());

			// ANO_LIVRO
			$this->ANO_LIVRO->EditAttrs["class"] = "form-control";
			$this->ANO_LIVRO->EditCustomAttributes = "";
			$this->ANO_LIVRO->EditValue = ew_HtmlEncode($this->ANO_LIVRO->CurrentValue);
			$this->ANO_LIVRO->PlaceHolder = ew_RemoveHtml($this->ANO_LIVRO->FldCaption());

			// MATERIA_LIVRO
			$this->MATERIA_LIVRO->EditAttrs["class"] = "form-control";
			$this->MATERIA_LIVRO->EditCustomAttributes = "";
			$this->MATERIA_LIVRO->EditValue = ew_HtmlEncode($this->MATERIA_LIVRO->CurrentValue);
			$this->MATERIA_LIVRO->PlaceHolder = ew_RemoveHtml($this->MATERIA_LIVRO->FldCaption());

			// ESTANTE_LIVRO
			$this->ESTANTE_LIVRO->EditAttrs["class"] = "form-control";
			$this->ESTANTE_LIVRO->EditCustomAttributes = "";
			$this->ESTANTE_LIVRO->EditValue = ew_HtmlEncode($this->ESTANTE_LIVRO->CurrentValue);
			$this->ESTANTE_LIVRO->PlaceHolder = ew_RemoveHtml($this->ESTANTE_LIVRO->FldCaption());

			// PRATELEIRA_LIVRO
			$this->PRATELEIRA_LIVRO->EditAttrs["class"] = "form-control";
			$this->PRATELEIRA_LIVRO->EditCustomAttributes = "";
			$this->PRATELEIRA_LIVRO->EditValue = ew_HtmlEncode($this->PRATELEIRA_LIVRO->CurrentValue);
			$this->PRATELEIRA_LIVRO->PlaceHolder = ew_RemoveHtml($this->PRATELEIRA_LIVRO->FldCaption());

			// EDITORA_LIVRO
			$this->EDITORA_LIVRO->EditAttrs["class"] = "form-control";
			$this->EDITORA_LIVRO->EditCustomAttributes = "";
			$this->EDITORA_LIVRO->EditValue = ew_HtmlEncode($this->EDITORA_LIVRO->CurrentValue);
			$this->EDITORA_LIVRO->PlaceHolder = ew_RemoveHtml($this->EDITORA_LIVRO->FldCaption());

			// EDICAO_LIVRO
			$this->EDICAO_LIVRO->EditAttrs["class"] = "form-control";
			$this->EDICAO_LIVRO->EditCustomAttributes = "";
			$this->EDICAO_LIVRO->EditValue = ew_HtmlEncode($this->EDICAO_LIVRO->CurrentValue);
			$this->EDICAO_LIVRO->PlaceHolder = ew_RemoveHtml($this->EDICAO_LIVRO->FldCaption());

			// IDIOMA_LIVRO
			$this->IDIOMA_LIVRO->EditAttrs["class"] = "form-control";
			$this->IDIOMA_LIVRO->EditCustomAttributes = "";
			$this->IDIOMA_LIVRO->EditValue = ew_HtmlEncode($this->IDIOMA_LIVRO->CurrentValue);
			$this->IDIOMA_LIVRO->PlaceHolder = ew_RemoveHtml($this->IDIOMA_LIVRO->FldCaption());

			// PRAZO_LIVRO
			$this->PRAZO_LIVRO->EditAttrs["class"] = "form-control";
			$this->PRAZO_LIVRO->EditCustomAttributes = "";
			$this->PRAZO_LIVRO->EditValue = ew_HtmlEncode($this->PRAZO_LIVRO->CurrentValue);
			$this->PRAZO_LIVRO->PlaceHolder = ew_RemoveHtml($this->PRAZO_LIVRO->FldCaption());

			// STATUS_LIVRO
			$this->STATUS_LIVRO->EditAttrs["class"] = "form-control";
			$this->STATUS_LIVRO->EditCustomAttributes = "";
			$this->STATUS_LIVRO->EditValue = ew_HtmlEncode($this->STATUS_LIVRO->CurrentValue);
			$this->STATUS_LIVRO->PlaceHolder = ew_RemoveHtml($this->STATUS_LIVRO->FldCaption());

			// FREQUENCIA_LIVRO
			$this->FREQUENCIA_LIVRO->EditAttrs["class"] = "form-control";
			$this->FREQUENCIA_LIVRO->EditCustomAttributes = "";
			$this->FREQUENCIA_LIVRO->EditValue = ew_HtmlEncode($this->FREQUENCIA_LIVRO->CurrentValue);
			$this->FREQUENCIA_LIVRO->PlaceHolder = ew_RemoveHtml($this->FREQUENCIA_LIVRO->FldCaption());

			// Add refer script
			// CODIGO_LIVRO

			$this->CODIGO_LIVRO->LinkCustomAttributes = "";
			$this->CODIGO_LIVRO->HrefValue = "";

			// ISBN
			$this->ISBN->LinkCustomAttributes = "";
			$this->ISBN->HrefValue = "";

			// NOME_LIVRO
			$this->NOME_LIVRO->LinkCustomAttributes = "";
			$this->NOME_LIVRO->HrefValue = "";

			// AUTOR_LIVRO
			$this->AUTOR_LIVRO->LinkCustomAttributes = "";
			$this->AUTOR_LIVRO->HrefValue = "";

			// TEMA_LIVRO
			$this->TEMA_LIVRO->LinkCustomAttributes = "";
			$this->TEMA_LIVRO->HrefValue = "";

			// ANO_LIVRO
			$this->ANO_LIVRO->LinkCustomAttributes = "";
			$this->ANO_LIVRO->HrefValue = "";

			// MATERIA_LIVRO
			$this->MATERIA_LIVRO->LinkCustomAttributes = "";
			$this->MATERIA_LIVRO->HrefValue = "";

			// ESTANTE_LIVRO
			$this->ESTANTE_LIVRO->LinkCustomAttributes = "";
			$this->ESTANTE_LIVRO->HrefValue = "";

			// PRATELEIRA_LIVRO
			$this->PRATELEIRA_LIVRO->LinkCustomAttributes = "";
			$this->PRATELEIRA_LIVRO->HrefValue = "";

			// EDITORA_LIVRO
			$this->EDITORA_LIVRO->LinkCustomAttributes = "";
			$this->EDITORA_LIVRO->HrefValue = "";

			// EDICAO_LIVRO
			$this->EDICAO_LIVRO->LinkCustomAttributes = "";
			$this->EDICAO_LIVRO->HrefValue = "";

			// IDIOMA_LIVRO
			$this->IDIOMA_LIVRO->LinkCustomAttributes = "";
			$this->IDIOMA_LIVRO->HrefValue = "";

			// PRAZO_LIVRO
			$this->PRAZO_LIVRO->LinkCustomAttributes = "";
			$this->PRAZO_LIVRO->HrefValue = "";

			// STATUS_LIVRO
			$this->STATUS_LIVRO->LinkCustomAttributes = "";
			$this->STATUS_LIVRO->HrefValue = "";

			// FREQUENCIA_LIVRO
			$this->FREQUENCIA_LIVRO->LinkCustomAttributes = "";
			$this->FREQUENCIA_LIVRO->HrefValue = "";
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
		if (!$this->CODIGO_LIVRO->FldIsDetailKey && !is_null($this->CODIGO_LIVRO->FormValue) && $this->CODIGO_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->CODIGO_LIVRO->FldCaption(), $this->CODIGO_LIVRO->ReqErrMsg));
		}
		if (!$this->ISBN->FldIsDetailKey && !is_null($this->ISBN->FormValue) && $this->ISBN->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ISBN->FldCaption(), $this->ISBN->ReqErrMsg));
		}
		if (!$this->NOME_LIVRO->FldIsDetailKey && !is_null($this->NOME_LIVRO->FormValue) && $this->NOME_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->NOME_LIVRO->FldCaption(), $this->NOME_LIVRO->ReqErrMsg));
		}
		if (!$this->AUTOR_LIVRO->FldIsDetailKey && !is_null($this->AUTOR_LIVRO->FormValue) && $this->AUTOR_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->AUTOR_LIVRO->FldCaption(), $this->AUTOR_LIVRO->ReqErrMsg));
		}
		if (!$this->TEMA_LIVRO->FldIsDetailKey && !is_null($this->TEMA_LIVRO->FormValue) && $this->TEMA_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->TEMA_LIVRO->FldCaption(), $this->TEMA_LIVRO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ESTANTE_LIVRO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ESTANTE_LIVRO->FldErrMsg());
		}
		if (!ew_CheckInteger($this->PRATELEIRA_LIVRO->FormValue)) {
			ew_AddMessage($gsFormError, $this->PRATELEIRA_LIVRO->FldErrMsg());
		}
		if (!$this->PRAZO_LIVRO->FldIsDetailKey && !is_null($this->PRAZO_LIVRO->FormValue) && $this->PRAZO_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->PRAZO_LIVRO->FldCaption(), $this->PRAZO_LIVRO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->PRAZO_LIVRO->FormValue)) {
			ew_AddMessage($gsFormError, $this->PRAZO_LIVRO->FldErrMsg());
		}
		if (!$this->STATUS_LIVRO->FldIsDetailKey && !is_null($this->STATUS_LIVRO->FormValue) && $this->STATUS_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->STATUS_LIVRO->FldCaption(), $this->STATUS_LIVRO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->STATUS_LIVRO->FormValue)) {
			ew_AddMessage($gsFormError, $this->STATUS_LIVRO->FldErrMsg());
		}
		if (!$this->FREQUENCIA_LIVRO->FldIsDetailKey && !is_null($this->FREQUENCIA_LIVRO->FormValue) && $this->FREQUENCIA_LIVRO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->FREQUENCIA_LIVRO->FldCaption(), $this->FREQUENCIA_LIVRO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->FREQUENCIA_LIVRO->FormValue)) {
			ew_AddMessage($gsFormError, $this->FREQUENCIA_LIVRO->FldErrMsg());
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

		// CODIGO_LIVRO
		$this->CODIGO_LIVRO->SetDbValueDef($rsnew, $this->CODIGO_LIVRO->CurrentValue, "", FALSE);

		// ISBN
		$this->ISBN->SetDbValueDef($rsnew, $this->ISBN->CurrentValue, "", FALSE);

		// NOME_LIVRO
		$this->NOME_LIVRO->SetDbValueDef($rsnew, $this->NOME_LIVRO->CurrentValue, "", FALSE);

		// AUTOR_LIVRO
		$this->AUTOR_LIVRO->SetDbValueDef($rsnew, $this->AUTOR_LIVRO->CurrentValue, "", FALSE);

		// TEMA_LIVRO
		$this->TEMA_LIVRO->SetDbValueDef($rsnew, $this->TEMA_LIVRO->CurrentValue, "", FALSE);

		// ANO_LIVRO
		$this->ANO_LIVRO->SetDbValueDef($rsnew, $this->ANO_LIVRO->CurrentValue, NULL, FALSE);

		// MATERIA_LIVRO
		$this->MATERIA_LIVRO->SetDbValueDef($rsnew, $this->MATERIA_LIVRO->CurrentValue, NULL, FALSE);

		// ESTANTE_LIVRO
		$this->ESTANTE_LIVRO->SetDbValueDef($rsnew, $this->ESTANTE_LIVRO->CurrentValue, NULL, FALSE);

		// PRATELEIRA_LIVRO
		$this->PRATELEIRA_LIVRO->SetDbValueDef($rsnew, $this->PRATELEIRA_LIVRO->CurrentValue, NULL, FALSE);

		// EDITORA_LIVRO
		$this->EDITORA_LIVRO->SetDbValueDef($rsnew, $this->EDITORA_LIVRO->CurrentValue, NULL, FALSE);

		// EDICAO_LIVRO
		$this->EDICAO_LIVRO->SetDbValueDef($rsnew, $this->EDICAO_LIVRO->CurrentValue, NULL, FALSE);

		// IDIOMA_LIVRO
		$this->IDIOMA_LIVRO->SetDbValueDef($rsnew, $this->IDIOMA_LIVRO->CurrentValue, NULL, FALSE);

		// PRAZO_LIVRO
		$this->PRAZO_LIVRO->SetDbValueDef($rsnew, $this->PRAZO_LIVRO->CurrentValue, 0, FALSE);

		// STATUS_LIVRO
		$this->STATUS_LIVRO->SetDbValueDef($rsnew, $this->STATUS_LIVRO->CurrentValue, 0, FALSE);

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->SetDbValueDef($rsnew, $this->FREQUENCIA_LIVRO->CurrentValue, 0, FALSE);

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("livrolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($livro_add)) $livro_add = new clivro_add();

// Page init
$livro_add->Page_Init();

// Page main
$livro_add->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$livro_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "add";
var CurrentForm = flivroadd = new ew_Form("flivroadd", "add");

// Validate form
flivroadd.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_CODIGO_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->CODIGO_LIVRO->FldCaption(), $livro->CODIGO_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ISBN");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->ISBN->FldCaption(), $livro->ISBN->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_NOME_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->NOME_LIVRO->FldCaption(), $livro->NOME_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_AUTOR_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->AUTOR_LIVRO->FldCaption(), $livro->AUTOR_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_TEMA_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->TEMA_LIVRO->FldCaption(), $livro->TEMA_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ESTANTE_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($livro->ESTANTE_LIVRO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_PRATELEIRA_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($livro->PRATELEIRA_LIVRO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_PRAZO_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->PRAZO_LIVRO->FldCaption(), $livro->PRAZO_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_PRAZO_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($livro->PRAZO_LIVRO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_STATUS_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->STATUS_LIVRO->FldCaption(), $livro->STATUS_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_STATUS_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($livro->STATUS_LIVRO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_FREQUENCIA_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $livro->FREQUENCIA_LIVRO->FldCaption(), $livro->FREQUENCIA_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_FREQUENCIA_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($livro->FREQUENCIA_LIVRO->FldErrMsg()) ?>");

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
flivroadd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
flivroadd.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $livro_add->ShowPageHeader(); ?>
<?php
$livro_add->ShowMessage();
?>
<form name="flivroadd" id="flivroadd" class="<?php echo $livro_add->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($livro_add->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $livro_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="livro">
<input type="hidden" name="a_add" id="a_add" value="A">
<input type="hidden" name="modal" value="<?php echo intval($livro_add->IsModal) ?>">
<div class="ewAddDiv"><!-- page* -->
<?php if ($livro->CODIGO_LIVRO->Visible) { // CODIGO_LIVRO ?>
	<div id="r_CODIGO_LIVRO" class="form-group">
		<label id="elh_livro_CODIGO_LIVRO" for="x_CODIGO_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->CODIGO_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->CODIGO_LIVRO->CellAttributes() ?>>
<span id="el_livro_CODIGO_LIVRO">
<input type="text" data-table="livro" data-field="x_CODIGO_LIVRO" name="x_CODIGO_LIVRO" id="x_CODIGO_LIVRO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($livro->CODIGO_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->CODIGO_LIVRO->EditValue ?>"<?php echo $livro->CODIGO_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->CODIGO_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->ISBN->Visible) { // ISBN ?>
	<div id="r_ISBN" class="form-group">
		<label id="elh_livro_ISBN" for="x_ISBN" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->ISBN->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->ISBN->CellAttributes() ?>>
<span id="el_livro_ISBN">
<input type="text" data-table="livro" data-field="x_ISBN" name="x_ISBN" id="x_ISBN" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($livro->ISBN->getPlaceHolder()) ?>" value="<?php echo $livro->ISBN->EditValue ?>"<?php echo $livro->ISBN->EditAttributes() ?>>
</span>
<?php echo $livro->ISBN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->NOME_LIVRO->Visible) { // NOME_LIVRO ?>
	<div id="r_NOME_LIVRO" class="form-group">
		<label id="elh_livro_NOME_LIVRO" for="x_NOME_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->NOME_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->NOME_LIVRO->CellAttributes() ?>>
<span id="el_livro_NOME_LIVRO">
<input type="text" data-table="livro" data-field="x_NOME_LIVRO" name="x_NOME_LIVRO" id="x_NOME_LIVRO" size="30" maxlength="35" placeholder="<?php echo ew_HtmlEncode($livro->NOME_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->NOME_LIVRO->EditValue ?>"<?php echo $livro->NOME_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->NOME_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->AUTOR_LIVRO->Visible) { // AUTOR_LIVRO ?>
	<div id="r_AUTOR_LIVRO" class="form-group">
		<label id="elh_livro_AUTOR_LIVRO" for="x_AUTOR_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->AUTOR_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->AUTOR_LIVRO->CellAttributes() ?>>
<span id="el_livro_AUTOR_LIVRO">
<input type="text" data-table="livro" data-field="x_AUTOR_LIVRO" name="x_AUTOR_LIVRO" id="x_AUTOR_LIVRO" size="30" maxlength="30" placeholder="<?php echo ew_HtmlEncode($livro->AUTOR_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->AUTOR_LIVRO->EditValue ?>"<?php echo $livro->AUTOR_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->AUTOR_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->TEMA_LIVRO->Visible) { // TEMA_LIVRO ?>
	<div id="r_TEMA_LIVRO" class="form-group">
		<label id="elh_livro_TEMA_LIVRO" for="x_TEMA_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->TEMA_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->TEMA_LIVRO->CellAttributes() ?>>
<span id="el_livro_TEMA_LIVRO">
<input type="text" data-table="livro" data-field="x_TEMA_LIVRO" name="x_TEMA_LIVRO" id="x_TEMA_LIVRO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($livro->TEMA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->TEMA_LIVRO->EditValue ?>"<?php echo $livro->TEMA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->TEMA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->ANO_LIVRO->Visible) { // ANO_LIVRO ?>
	<div id="r_ANO_LIVRO" class="form-group">
		<label id="elh_livro_ANO_LIVRO" for="x_ANO_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->ANO_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->ANO_LIVRO->CellAttributes() ?>>
<span id="el_livro_ANO_LIVRO">
<input type="text" data-table="livro" data-field="x_ANO_LIVRO" name="x_ANO_LIVRO" id="x_ANO_LIVRO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($livro->ANO_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->ANO_LIVRO->EditValue ?>"<?php echo $livro->ANO_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->ANO_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->MATERIA_LIVRO->Visible) { // MATERIA_LIVRO ?>
	<div id="r_MATERIA_LIVRO" class="form-group">
		<label id="elh_livro_MATERIA_LIVRO" for="x_MATERIA_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->MATERIA_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->MATERIA_LIVRO->CellAttributes() ?>>
<span id="el_livro_MATERIA_LIVRO">
<input type="text" data-table="livro" data-field="x_MATERIA_LIVRO" name="x_MATERIA_LIVRO" id="x_MATERIA_LIVRO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($livro->MATERIA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->MATERIA_LIVRO->EditValue ?>"<?php echo $livro->MATERIA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->MATERIA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->ESTANTE_LIVRO->Visible) { // ESTANTE_LIVRO ?>
	<div id="r_ESTANTE_LIVRO" class="form-group">
		<label id="elh_livro_ESTANTE_LIVRO" for="x_ESTANTE_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->ESTANTE_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->ESTANTE_LIVRO->CellAttributes() ?>>
<span id="el_livro_ESTANTE_LIVRO">
<input type="text" data-table="livro" data-field="x_ESTANTE_LIVRO" name="x_ESTANTE_LIVRO" id="x_ESTANTE_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($livro->ESTANTE_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->ESTANTE_LIVRO->EditValue ?>"<?php echo $livro->ESTANTE_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->ESTANTE_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->PRATELEIRA_LIVRO->Visible) { // PRATELEIRA_LIVRO ?>
	<div id="r_PRATELEIRA_LIVRO" class="form-group">
		<label id="elh_livro_PRATELEIRA_LIVRO" for="x_PRATELEIRA_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->PRATELEIRA_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->PRATELEIRA_LIVRO->CellAttributes() ?>>
<span id="el_livro_PRATELEIRA_LIVRO">
<input type="text" data-table="livro" data-field="x_PRATELEIRA_LIVRO" name="x_PRATELEIRA_LIVRO" id="x_PRATELEIRA_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($livro->PRATELEIRA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->PRATELEIRA_LIVRO->EditValue ?>"<?php echo $livro->PRATELEIRA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->PRATELEIRA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->EDITORA_LIVRO->Visible) { // EDITORA_LIVRO ?>
	<div id="r_EDITORA_LIVRO" class="form-group">
		<label id="elh_livro_EDITORA_LIVRO" for="x_EDITORA_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->EDITORA_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->EDITORA_LIVRO->CellAttributes() ?>>
<span id="el_livro_EDITORA_LIVRO">
<input type="text" data-table="livro" data-field="x_EDITORA_LIVRO" name="x_EDITORA_LIVRO" id="x_EDITORA_LIVRO" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($livro->EDITORA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->EDITORA_LIVRO->EditValue ?>"<?php echo $livro->EDITORA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->EDITORA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->EDICAO_LIVRO->Visible) { // EDICAO_LIVRO ?>
	<div id="r_EDICAO_LIVRO" class="form-group">
		<label id="elh_livro_EDICAO_LIVRO" for="x_EDICAO_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->EDICAO_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->EDICAO_LIVRO->CellAttributes() ?>>
<span id="el_livro_EDICAO_LIVRO">
<input type="text" data-table="livro" data-field="x_EDICAO_LIVRO" name="x_EDICAO_LIVRO" id="x_EDICAO_LIVRO" size="30" maxlength="10" placeholder="<?php echo ew_HtmlEncode($livro->EDICAO_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->EDICAO_LIVRO->EditValue ?>"<?php echo $livro->EDICAO_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->EDICAO_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->IDIOMA_LIVRO->Visible) { // IDIOMA_LIVRO ?>
	<div id="r_IDIOMA_LIVRO" class="form-group">
		<label id="elh_livro_IDIOMA_LIVRO" for="x_IDIOMA_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->IDIOMA_LIVRO->FldCaption() ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->IDIOMA_LIVRO->CellAttributes() ?>>
<span id="el_livro_IDIOMA_LIVRO">
<input type="text" data-table="livro" data-field="x_IDIOMA_LIVRO" name="x_IDIOMA_LIVRO" id="x_IDIOMA_LIVRO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($livro->IDIOMA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->IDIOMA_LIVRO->EditValue ?>"<?php echo $livro->IDIOMA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->IDIOMA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->PRAZO_LIVRO->Visible) { // PRAZO_LIVRO ?>
	<div id="r_PRAZO_LIVRO" class="form-group">
		<label id="elh_livro_PRAZO_LIVRO" for="x_PRAZO_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->PRAZO_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->PRAZO_LIVRO->CellAttributes() ?>>
<span id="el_livro_PRAZO_LIVRO">
<input type="text" data-table="livro" data-field="x_PRAZO_LIVRO" name="x_PRAZO_LIVRO" id="x_PRAZO_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($livro->PRAZO_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->PRAZO_LIVRO->EditValue ?>"<?php echo $livro->PRAZO_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->PRAZO_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->STATUS_LIVRO->Visible) { // STATUS_LIVRO ?>
	<div id="r_STATUS_LIVRO" class="form-group">
		<label id="elh_livro_STATUS_LIVRO" for="x_STATUS_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->STATUS_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->STATUS_LIVRO->CellAttributes() ?>>
<span id="el_livro_STATUS_LIVRO">
<input type="text" data-table="livro" data-field="x_STATUS_LIVRO" name="x_STATUS_LIVRO" id="x_STATUS_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($livro->STATUS_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->STATUS_LIVRO->EditValue ?>"<?php echo $livro->STATUS_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->STATUS_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($livro->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
	<div id="r_FREQUENCIA_LIVRO" class="form-group">
		<label id="elh_livro_FREQUENCIA_LIVRO" for="x_FREQUENCIA_LIVRO" class="<?php echo $livro_add->LeftColumnClass ?>"><?php echo $livro->FREQUENCIA_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $livro_add->RightColumnClass ?>"><div<?php echo $livro->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el_livro_FREQUENCIA_LIVRO">
<input type="text" data-table="livro" data-field="x_FREQUENCIA_LIVRO" name="x_FREQUENCIA_LIVRO" id="x_FREQUENCIA_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($livro->FREQUENCIA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $livro->FREQUENCIA_LIVRO->EditValue ?>"<?php echo $livro->FREQUENCIA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $livro->FREQUENCIA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$livro_add->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $livro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $livro_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
flivroadd.Init();
</script>
<?php
$livro_add->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$livro_add->Page_Terminate();
?>
