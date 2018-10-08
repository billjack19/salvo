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

$aluno_add = NULL; // Initialize page object first

class caluno_add extends caluno {

	// Page ID
	var $PageID = 'add';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'aluno';

	// Page object name
	var $PageObjName = 'aluno_add';

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

		// Table object (aluno)
		if (!isset($GLOBALS["aluno"]) || get_class($GLOBALS["aluno"]) == "caluno") {
			$GLOBALS["aluno"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["aluno"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = ew_GetPageName($url);
				if ($pageName != $this->GetListUrl()) { // Not List page
					$row["caption"] = $this->GetModalCaption($pageName);
					if ($pageName == "alunoview.php")
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
			if (@$_GET["ID_ALUNO"] != "") {
				$this->ID_ALUNO->setQueryStringValue($_GET["ID_ALUNO"]);
				$this->setKey("ID_ALUNO", $this->ID_ALUNO->CurrentValue); // Set up key
			} else {
				$this->setKey("ID_ALUNO", ""); // Clear key
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
					$this->Page_Terminate("alunolist.php"); // No matching record, return to list
				}
				break;
			case "A": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $this->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "alunolist.php")
						$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to List page with correct master key if necessary
					elseif (ew_GetPageName($sReturnUrl) == "alunoview.php")
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
		$this->ID_ALUNO->CurrentValue = NULL;
		$this->ID_ALUNO->OldValue = $this->ID_ALUNO->CurrentValue;
		$this->NOME_ALUNO->CurrentValue = NULL;
		$this->NOME_ALUNO->OldValue = $this->NOME_ALUNO->CurrentValue;
		$this->MATRICULA_ALUNO->CurrentValue = NULL;
		$this->MATRICULA_ALUNO->OldValue = $this->MATRICULA_ALUNO->CurrentValue;
		$this->EMAIL_ALUNO->CurrentValue = NULL;
		$this->EMAIL_ALUNO->OldValue = $this->EMAIL_ALUNO->CurrentValue;
		$this->CPF_ALUNO->CurrentValue = NULL;
		$this->CPF_ALUNO->OldValue = $this->CPF_ALUNO->CurrentValue;
		$this->RG_ALUNO->CurrentValue = NULL;
		$this->RG_ALUNO->OldValue = $this->RG_ALUNO->CurrentValue;
		$this->SEXO_ALUNO->CurrentValue = NULL;
		$this->SEXO_ALUNO->OldValue = $this->SEXO_ALUNO->CurrentValue;
		$this->DATA_NASCIMENTO_ALUNO->CurrentValue = NULL;
		$this->DATA_NASCIMENTO_ALUNO->OldValue = $this->DATA_NASCIMENTO_ALUNO->CurrentValue;
		$this->TURNO_ALUNO->CurrentValue = NULL;
		$this->TURNO_ALUNO->OldValue = $this->TURNO_ALUNO->CurrentValue;
		$this->TELEFONE_ALUNO->CurrentValue = NULL;
		$this->TELEFONE_ALUNO->OldValue = $this->TELEFONE_ALUNO->CurrentValue;
		$this->RECORD_ALUNO->CurrentValue = NULL;
		$this->RECORD_ALUNO->OldValue = $this->RECORD_ALUNO->CurrentValue;
		$this->ID_NIVEL_ACESSO->CurrentValue = NULL;
		$this->ID_NIVEL_ACESSO->OldValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->ANO_ALUNO->CurrentValue = NULL;
		$this->ANO_ALUNO->OldValue = $this->ANO_ALUNO->CurrentValue;
		$this->TURMA_ALUNO->CurrentValue = NULL;
		$this->TURMA_ALUNO->OldValue = $this->TURMA_ALUNO->CurrentValue;
		$this->SALA_ALUNO->CurrentValue = NULL;
		$this->SALA_ALUNO->OldValue = $this->SALA_ALUNO->CurrentValue;
		$this->NUMERO_LIVROS->CurrentValue = NULL;
		$this->NUMERO_LIVROS->OldValue = $this->NUMERO_LIVROS->CurrentValue;
		$this->FREQUENCIA_LIVRO->CurrentValue = NULL;
		$this->FREQUENCIA_LIVRO->OldValue = $this->FREQUENCIA_LIVRO->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->NOME_ALUNO->FldIsDetailKey) {
			$this->NOME_ALUNO->setFormValue($objForm->GetValue("x_NOME_ALUNO"));
		}
		if (!$this->MATRICULA_ALUNO->FldIsDetailKey) {
			$this->MATRICULA_ALUNO->setFormValue($objForm->GetValue("x_MATRICULA_ALUNO"));
		}
		if (!$this->EMAIL_ALUNO->FldIsDetailKey) {
			$this->EMAIL_ALUNO->setFormValue($objForm->GetValue("x_EMAIL_ALUNO"));
		}
		if (!$this->CPF_ALUNO->FldIsDetailKey) {
			$this->CPF_ALUNO->setFormValue($objForm->GetValue("x_CPF_ALUNO"));
		}
		if (!$this->RG_ALUNO->FldIsDetailKey) {
			$this->RG_ALUNO->setFormValue($objForm->GetValue("x_RG_ALUNO"));
		}
		if (!$this->SEXO_ALUNO->FldIsDetailKey) {
			$this->SEXO_ALUNO->setFormValue($objForm->GetValue("x_SEXO_ALUNO"));
		}
		if (!$this->DATA_NASCIMENTO_ALUNO->FldIsDetailKey) {
			$this->DATA_NASCIMENTO_ALUNO->setFormValue($objForm->GetValue("x_DATA_NASCIMENTO_ALUNO"));
		}
		if (!$this->TURNO_ALUNO->FldIsDetailKey) {
			$this->TURNO_ALUNO->setFormValue($objForm->GetValue("x_TURNO_ALUNO"));
		}
		if (!$this->TELEFONE_ALUNO->FldIsDetailKey) {
			$this->TELEFONE_ALUNO->setFormValue($objForm->GetValue("x_TELEFONE_ALUNO"));
		}
		if (!$this->RECORD_ALUNO->FldIsDetailKey) {
			$this->RECORD_ALUNO->setFormValue($objForm->GetValue("x_RECORD_ALUNO"));
		}
		if (!$this->ID_NIVEL_ACESSO->FldIsDetailKey) {
			$this->ID_NIVEL_ACESSO->setFormValue($objForm->GetValue("x_ID_NIVEL_ACESSO"));
		}
		if (!$this->ANO_ALUNO->FldIsDetailKey) {
			$this->ANO_ALUNO->setFormValue($objForm->GetValue("x_ANO_ALUNO"));
		}
		if (!$this->TURMA_ALUNO->FldIsDetailKey) {
			$this->TURMA_ALUNO->setFormValue($objForm->GetValue("x_TURMA_ALUNO"));
		}
		if (!$this->SALA_ALUNO->FldIsDetailKey) {
			$this->SALA_ALUNO->setFormValue($objForm->GetValue("x_SALA_ALUNO"));
		}
		if (!$this->NUMERO_LIVROS->FldIsDetailKey) {
			$this->NUMERO_LIVROS->setFormValue($objForm->GetValue("x_NUMERO_LIVROS"));
		}
		if (!$this->FREQUENCIA_LIVRO->FldIsDetailKey) {
			$this->FREQUENCIA_LIVRO->setFormValue($objForm->GetValue("x_FREQUENCIA_LIVRO"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->NOME_ALUNO->CurrentValue = $this->NOME_ALUNO->FormValue;
		$this->MATRICULA_ALUNO->CurrentValue = $this->MATRICULA_ALUNO->FormValue;
		$this->EMAIL_ALUNO->CurrentValue = $this->EMAIL_ALUNO->FormValue;
		$this->CPF_ALUNO->CurrentValue = $this->CPF_ALUNO->FormValue;
		$this->RG_ALUNO->CurrentValue = $this->RG_ALUNO->FormValue;
		$this->SEXO_ALUNO->CurrentValue = $this->SEXO_ALUNO->FormValue;
		$this->DATA_NASCIMENTO_ALUNO->CurrentValue = $this->DATA_NASCIMENTO_ALUNO->FormValue;
		$this->TURNO_ALUNO->CurrentValue = $this->TURNO_ALUNO->FormValue;
		$this->TELEFONE_ALUNO->CurrentValue = $this->TELEFONE_ALUNO->FormValue;
		$this->RECORD_ALUNO->CurrentValue = $this->RECORD_ALUNO->FormValue;
		$this->ID_NIVEL_ACESSO->CurrentValue = $this->ID_NIVEL_ACESSO->FormValue;
		$this->ANO_ALUNO->CurrentValue = $this->ANO_ALUNO->FormValue;
		$this->TURMA_ALUNO->CurrentValue = $this->TURMA_ALUNO->FormValue;
		$this->SALA_ALUNO->CurrentValue = $this->SALA_ALUNO->FormValue;
		$this->NUMERO_LIVROS->CurrentValue = $this->NUMERO_LIVROS->FormValue;
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
		$this->LoadDefaultValues();
		$row = array();
		$row['ID_ALUNO'] = $this->ID_ALUNO->CurrentValue;
		$row['NOME_ALUNO'] = $this->NOME_ALUNO->CurrentValue;
		$row['MATRICULA_ALUNO'] = $this->MATRICULA_ALUNO->CurrentValue;
		$row['EMAIL_ALUNO'] = $this->EMAIL_ALUNO->CurrentValue;
		$row['CPF_ALUNO'] = $this->CPF_ALUNO->CurrentValue;
		$row['RG_ALUNO'] = $this->RG_ALUNO->CurrentValue;
		$row['SEXO_ALUNO'] = $this->SEXO_ALUNO->CurrentValue;
		$row['DATA_NASCIMENTO_ALUNO'] = $this->DATA_NASCIMENTO_ALUNO->CurrentValue;
		$row['TURNO_ALUNO'] = $this->TURNO_ALUNO->CurrentValue;
		$row['TELEFONE_ALUNO'] = $this->TELEFONE_ALUNO->CurrentValue;
		$row['RECORD_ALUNO'] = $this->RECORD_ALUNO->CurrentValue;
		$row['ID_NIVEL_ACESSO'] = $this->ID_NIVEL_ACESSO->CurrentValue;
		$row['ANO_ALUNO'] = $this->ANO_ALUNO->CurrentValue;
		$row['TURMA_ALUNO'] = $this->TURMA_ALUNO->CurrentValue;
		$row['SALA_ALUNO'] = $this->SALA_ALUNO->CurrentValue;
		$row['NUMERO_LIVROS'] = $this->NUMERO_LIVROS->CurrentValue;
		$row['FREQUENCIA_LIVRO'] = $this->FREQUENCIA_LIVRO->CurrentValue;
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
		} elseif ($this->RowType == EW_ROWTYPE_ADD) { // Add row

			// NOME_ALUNO
			$this->NOME_ALUNO->EditAttrs["class"] = "form-control";
			$this->NOME_ALUNO->EditCustomAttributes = "";
			$this->NOME_ALUNO->EditValue = ew_HtmlEncode($this->NOME_ALUNO->CurrentValue);
			$this->NOME_ALUNO->PlaceHolder = ew_RemoveHtml($this->NOME_ALUNO->FldCaption());

			// MATRICULA_ALUNO
			$this->MATRICULA_ALUNO->EditAttrs["class"] = "form-control";
			$this->MATRICULA_ALUNO->EditCustomAttributes = "";
			$this->MATRICULA_ALUNO->EditValue = ew_HtmlEncode($this->MATRICULA_ALUNO->CurrentValue);
			$this->MATRICULA_ALUNO->PlaceHolder = ew_RemoveHtml($this->MATRICULA_ALUNO->FldCaption());

			// EMAIL_ALUNO
			$this->EMAIL_ALUNO->EditAttrs["class"] = "form-control";
			$this->EMAIL_ALUNO->EditCustomAttributes = "";
			$this->EMAIL_ALUNO->EditValue = ew_HtmlEncode($this->EMAIL_ALUNO->CurrentValue);
			$this->EMAIL_ALUNO->PlaceHolder = ew_RemoveHtml($this->EMAIL_ALUNO->FldCaption());

			// CPF_ALUNO
			$this->CPF_ALUNO->EditAttrs["class"] = "form-control";
			$this->CPF_ALUNO->EditCustomAttributes = "";
			$this->CPF_ALUNO->EditValue = ew_HtmlEncode($this->CPF_ALUNO->CurrentValue);
			$this->CPF_ALUNO->PlaceHolder = ew_RemoveHtml($this->CPF_ALUNO->FldCaption());

			// RG_ALUNO
			$this->RG_ALUNO->EditAttrs["class"] = "form-control";
			$this->RG_ALUNO->EditCustomAttributes = "";
			$this->RG_ALUNO->EditValue = ew_HtmlEncode($this->RG_ALUNO->CurrentValue);
			$this->RG_ALUNO->PlaceHolder = ew_RemoveHtml($this->RG_ALUNO->FldCaption());

			// SEXO_ALUNO
			$this->SEXO_ALUNO->EditAttrs["class"] = "form-control";
			$this->SEXO_ALUNO->EditCustomAttributes = "";
			$this->SEXO_ALUNO->EditValue = ew_HtmlEncode($this->SEXO_ALUNO->CurrentValue);
			$this->SEXO_ALUNO->PlaceHolder = ew_RemoveHtml($this->SEXO_ALUNO->FldCaption());

			// DATA_NASCIMENTO_ALUNO
			$this->DATA_NASCIMENTO_ALUNO->EditAttrs["class"] = "form-control";
			$this->DATA_NASCIMENTO_ALUNO->EditCustomAttributes = "";
			$this->DATA_NASCIMENTO_ALUNO->EditValue = ew_HtmlEncode($this->DATA_NASCIMENTO_ALUNO->CurrentValue);
			$this->DATA_NASCIMENTO_ALUNO->PlaceHolder = ew_RemoveHtml($this->DATA_NASCIMENTO_ALUNO->FldCaption());

			// TURNO_ALUNO
			$this->TURNO_ALUNO->EditAttrs["class"] = "form-control";
			$this->TURNO_ALUNO->EditCustomAttributes = "";
			$this->TURNO_ALUNO->EditValue = ew_HtmlEncode($this->TURNO_ALUNO->CurrentValue);
			$this->TURNO_ALUNO->PlaceHolder = ew_RemoveHtml($this->TURNO_ALUNO->FldCaption());

			// TELEFONE_ALUNO
			$this->TELEFONE_ALUNO->EditAttrs["class"] = "form-control";
			$this->TELEFONE_ALUNO->EditCustomAttributes = "";
			$this->TELEFONE_ALUNO->EditValue = ew_HtmlEncode($this->TELEFONE_ALUNO->CurrentValue);
			$this->TELEFONE_ALUNO->PlaceHolder = ew_RemoveHtml($this->TELEFONE_ALUNO->FldCaption());

			// RECORD_ALUNO
			$this->RECORD_ALUNO->EditAttrs["class"] = "form-control";
			$this->RECORD_ALUNO->EditCustomAttributes = "";
			$this->RECORD_ALUNO->EditValue = ew_HtmlEncode($this->RECORD_ALUNO->CurrentValue);
			$this->RECORD_ALUNO->PlaceHolder = ew_RemoveHtml($this->RECORD_ALUNO->FldCaption());

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->EditAttrs["class"] = "form-control";
			$this->ID_NIVEL_ACESSO->EditCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->EditValue = ew_HtmlEncode($this->ID_NIVEL_ACESSO->CurrentValue);
			$this->ID_NIVEL_ACESSO->PlaceHolder = ew_RemoveHtml($this->ID_NIVEL_ACESSO->FldCaption());

			// ANO_ALUNO
			$this->ANO_ALUNO->EditAttrs["class"] = "form-control";
			$this->ANO_ALUNO->EditCustomAttributes = "";
			$this->ANO_ALUNO->EditValue = ew_HtmlEncode($this->ANO_ALUNO->CurrentValue);
			$this->ANO_ALUNO->PlaceHolder = ew_RemoveHtml($this->ANO_ALUNO->FldCaption());

			// TURMA_ALUNO
			$this->TURMA_ALUNO->EditAttrs["class"] = "form-control";
			$this->TURMA_ALUNO->EditCustomAttributes = "";
			$this->TURMA_ALUNO->EditValue = ew_HtmlEncode($this->TURMA_ALUNO->CurrentValue);
			$this->TURMA_ALUNO->PlaceHolder = ew_RemoveHtml($this->TURMA_ALUNO->FldCaption());

			// SALA_ALUNO
			$this->SALA_ALUNO->EditAttrs["class"] = "form-control";
			$this->SALA_ALUNO->EditCustomAttributes = "";
			$this->SALA_ALUNO->EditValue = ew_HtmlEncode($this->SALA_ALUNO->CurrentValue);
			$this->SALA_ALUNO->PlaceHolder = ew_RemoveHtml($this->SALA_ALUNO->FldCaption());

			// NUMERO_LIVROS
			$this->NUMERO_LIVROS->EditAttrs["class"] = "form-control";
			$this->NUMERO_LIVROS->EditCustomAttributes = "";
			$this->NUMERO_LIVROS->EditValue = ew_HtmlEncode($this->NUMERO_LIVROS->CurrentValue);
			$this->NUMERO_LIVROS->PlaceHolder = ew_RemoveHtml($this->NUMERO_LIVROS->FldCaption());

			// FREQUENCIA_LIVRO
			$this->FREQUENCIA_LIVRO->EditAttrs["class"] = "form-control";
			$this->FREQUENCIA_LIVRO->EditCustomAttributes = "";
			$this->FREQUENCIA_LIVRO->EditValue = ew_HtmlEncode($this->FREQUENCIA_LIVRO->CurrentValue);
			$this->FREQUENCIA_LIVRO->PlaceHolder = ew_RemoveHtml($this->FREQUENCIA_LIVRO->FldCaption());

			// Add refer script
			// NOME_ALUNO

			$this->NOME_ALUNO->LinkCustomAttributes = "";
			$this->NOME_ALUNO->HrefValue = "";

			// MATRICULA_ALUNO
			$this->MATRICULA_ALUNO->LinkCustomAttributes = "";
			$this->MATRICULA_ALUNO->HrefValue = "";

			// EMAIL_ALUNO
			$this->EMAIL_ALUNO->LinkCustomAttributes = "";
			$this->EMAIL_ALUNO->HrefValue = "";

			// CPF_ALUNO
			$this->CPF_ALUNO->LinkCustomAttributes = "";
			$this->CPF_ALUNO->HrefValue = "";

			// RG_ALUNO
			$this->RG_ALUNO->LinkCustomAttributes = "";
			$this->RG_ALUNO->HrefValue = "";

			// SEXO_ALUNO
			$this->SEXO_ALUNO->LinkCustomAttributes = "";
			$this->SEXO_ALUNO->HrefValue = "";

			// DATA_NASCIMENTO_ALUNO
			$this->DATA_NASCIMENTO_ALUNO->LinkCustomAttributes = "";
			$this->DATA_NASCIMENTO_ALUNO->HrefValue = "";

			// TURNO_ALUNO
			$this->TURNO_ALUNO->LinkCustomAttributes = "";
			$this->TURNO_ALUNO->HrefValue = "";

			// TELEFONE_ALUNO
			$this->TELEFONE_ALUNO->LinkCustomAttributes = "";
			$this->TELEFONE_ALUNO->HrefValue = "";

			// RECORD_ALUNO
			$this->RECORD_ALUNO->LinkCustomAttributes = "";
			$this->RECORD_ALUNO->HrefValue = "";

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->LinkCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->HrefValue = "";

			// ANO_ALUNO
			$this->ANO_ALUNO->LinkCustomAttributes = "";
			$this->ANO_ALUNO->HrefValue = "";

			// TURMA_ALUNO
			$this->TURMA_ALUNO->LinkCustomAttributes = "";
			$this->TURMA_ALUNO->HrefValue = "";

			// SALA_ALUNO
			$this->SALA_ALUNO->LinkCustomAttributes = "";
			$this->SALA_ALUNO->HrefValue = "";

			// NUMERO_LIVROS
			$this->NUMERO_LIVROS->LinkCustomAttributes = "";
			$this->NUMERO_LIVROS->HrefValue = "";

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
		if (!$this->NOME_ALUNO->FldIsDetailKey && !is_null($this->NOME_ALUNO->FormValue) && $this->NOME_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->NOME_ALUNO->FldCaption(), $this->NOME_ALUNO->ReqErrMsg));
		}
		if (!$this->MATRICULA_ALUNO->FldIsDetailKey && !is_null($this->MATRICULA_ALUNO->FormValue) && $this->MATRICULA_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->MATRICULA_ALUNO->FldCaption(), $this->MATRICULA_ALUNO->ReqErrMsg));
		}
		if (!$this->SEXO_ALUNO->FldIsDetailKey && !is_null($this->SEXO_ALUNO->FormValue) && $this->SEXO_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->SEXO_ALUNO->FldCaption(), $this->SEXO_ALUNO->ReqErrMsg));
		}
		if (!$this->DATA_NASCIMENTO_ALUNO->FldIsDetailKey && !is_null($this->DATA_NASCIMENTO_ALUNO->FormValue) && $this->DATA_NASCIMENTO_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DATA_NASCIMENTO_ALUNO->FldCaption(), $this->DATA_NASCIMENTO_ALUNO->ReqErrMsg));
		}
		if (!$this->TURNO_ALUNO->FldIsDetailKey && !is_null($this->TURNO_ALUNO->FormValue) && $this->TURNO_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->TURNO_ALUNO->FldCaption(), $this->TURNO_ALUNO->ReqErrMsg));
		}
		if (!$this->TELEFONE_ALUNO->FldIsDetailKey && !is_null($this->TELEFONE_ALUNO->FormValue) && $this->TELEFONE_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->TELEFONE_ALUNO->FldCaption(), $this->TELEFONE_ALUNO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->RECORD_ALUNO->FormValue)) {
			ew_AddMessage($gsFormError, $this->RECORD_ALUNO->FldErrMsg());
		}
		if (!ew_CheckInteger($this->ID_NIVEL_ACESSO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_NIVEL_ACESSO->FldErrMsg());
		}
		if (!$this->ANO_ALUNO->FldIsDetailKey && !is_null($this->ANO_ALUNO->FormValue) && $this->ANO_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ANO_ALUNO->FldCaption(), $this->ANO_ALUNO->ReqErrMsg));
		}
		if (!$this->TURMA_ALUNO->FldIsDetailKey && !is_null($this->TURMA_ALUNO->FormValue) && $this->TURMA_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->TURMA_ALUNO->FldCaption(), $this->TURMA_ALUNO->ReqErrMsg));
		}
		if (!$this->SALA_ALUNO->FldIsDetailKey && !is_null($this->SALA_ALUNO->FormValue) && $this->SALA_ALUNO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->SALA_ALUNO->FldCaption(), $this->SALA_ALUNO->ReqErrMsg));
		}
		if (!$this->NUMERO_LIVROS->FldIsDetailKey && !is_null($this->NUMERO_LIVROS->FormValue) && $this->NUMERO_LIVROS->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->NUMERO_LIVROS->FldCaption(), $this->NUMERO_LIVROS->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->NUMERO_LIVROS->FormValue)) {
			ew_AddMessage($gsFormError, $this->NUMERO_LIVROS->FldErrMsg());
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

		// NOME_ALUNO
		$this->NOME_ALUNO->SetDbValueDef($rsnew, $this->NOME_ALUNO->CurrentValue, "", FALSE);

		// MATRICULA_ALUNO
		$this->MATRICULA_ALUNO->SetDbValueDef($rsnew, $this->MATRICULA_ALUNO->CurrentValue, "", FALSE);

		// EMAIL_ALUNO
		$this->EMAIL_ALUNO->SetDbValueDef($rsnew, $this->EMAIL_ALUNO->CurrentValue, NULL, FALSE);

		// CPF_ALUNO
		$this->CPF_ALUNO->SetDbValueDef($rsnew, $this->CPF_ALUNO->CurrentValue, NULL, FALSE);

		// RG_ALUNO
		$this->RG_ALUNO->SetDbValueDef($rsnew, $this->RG_ALUNO->CurrentValue, NULL, FALSE);

		// SEXO_ALUNO
		$this->SEXO_ALUNO->SetDbValueDef($rsnew, $this->SEXO_ALUNO->CurrentValue, "", FALSE);

		// DATA_NASCIMENTO_ALUNO
		$this->DATA_NASCIMENTO_ALUNO->SetDbValueDef($rsnew, $this->DATA_NASCIMENTO_ALUNO->CurrentValue, "", FALSE);

		// TURNO_ALUNO
		$this->TURNO_ALUNO->SetDbValueDef($rsnew, $this->TURNO_ALUNO->CurrentValue, "", FALSE);

		// TELEFONE_ALUNO
		$this->TELEFONE_ALUNO->SetDbValueDef($rsnew, $this->TELEFONE_ALUNO->CurrentValue, "", FALSE);

		// RECORD_ALUNO
		$this->RECORD_ALUNO->SetDbValueDef($rsnew, $this->RECORD_ALUNO->CurrentValue, NULL, FALSE);

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->SetDbValueDef($rsnew, $this->ID_NIVEL_ACESSO->CurrentValue, NULL, FALSE);

		// ANO_ALUNO
		$this->ANO_ALUNO->SetDbValueDef($rsnew, $this->ANO_ALUNO->CurrentValue, "", FALSE);

		// TURMA_ALUNO
		$this->TURMA_ALUNO->SetDbValueDef($rsnew, $this->TURMA_ALUNO->CurrentValue, "", FALSE);

		// SALA_ALUNO
		$this->SALA_ALUNO->SetDbValueDef($rsnew, $this->SALA_ALUNO->CurrentValue, "", FALSE);

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS->SetDbValueDef($rsnew, $this->NUMERO_LIVROS->CurrentValue, 0, FALSE);

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("alunolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($aluno_add)) $aluno_add = new caluno_add();

// Page init
$aluno_add->Page_Init();

// Page main
$aluno_add->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aluno_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "add";
var CurrentForm = falunoadd = new ew_Form("falunoadd", "add");

// Validate form
falunoadd.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_NOME_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->NOME_ALUNO->FldCaption(), $aluno->NOME_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_MATRICULA_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->MATRICULA_ALUNO->FldCaption(), $aluno->MATRICULA_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_SEXO_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->SEXO_ALUNO->FldCaption(), $aluno->SEXO_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_DATA_NASCIMENTO_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->DATA_NASCIMENTO_ALUNO->FldCaption(), $aluno->DATA_NASCIMENTO_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_TURNO_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->TURNO_ALUNO->FldCaption(), $aluno->TURNO_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_TELEFONE_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->TELEFONE_ALUNO->FldCaption(), $aluno->TELEFONE_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_RECORD_ALUNO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($aluno->RECORD_ALUNO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_ID_NIVEL_ACESSO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($aluno->ID_NIVEL_ACESSO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_ANO_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->ANO_ALUNO->FldCaption(), $aluno->ANO_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_TURMA_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->TURMA_ALUNO->FldCaption(), $aluno->TURMA_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_SALA_ALUNO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->SALA_ALUNO->FldCaption(), $aluno->SALA_ALUNO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_NUMERO_LIVROS");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->NUMERO_LIVROS->FldCaption(), $aluno->NUMERO_LIVROS->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_NUMERO_LIVROS");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($aluno->NUMERO_LIVROS->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_FREQUENCIA_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $aluno->FREQUENCIA_LIVRO->FldCaption(), $aluno->FREQUENCIA_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_FREQUENCIA_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($aluno->FREQUENCIA_LIVRO->FldErrMsg()) ?>");

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
falunoadd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
falunoadd.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $aluno_add->ShowPageHeader(); ?>
<?php
$aluno_add->ShowMessage();
?>
<form name="falunoadd" id="falunoadd" class="<?php echo $aluno_add->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($aluno_add->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $aluno_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="aluno">
<input type="hidden" name="a_add" id="a_add" value="A">
<input type="hidden" name="modal" value="<?php echo intval($aluno_add->IsModal) ?>">
<div class="ewAddDiv"><!-- page* -->
<?php if ($aluno->NOME_ALUNO->Visible) { // NOME_ALUNO ?>
	<div id="r_NOME_ALUNO" class="form-group">
		<label id="elh_aluno_NOME_ALUNO" for="x_NOME_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->NOME_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->NOME_ALUNO->CellAttributes() ?>>
<span id="el_aluno_NOME_ALUNO">
<input type="text" data-table="aluno" data-field="x_NOME_ALUNO" name="x_NOME_ALUNO" id="x_NOME_ALUNO" size="30" maxlength="30" placeholder="<?php echo ew_HtmlEncode($aluno->NOME_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->NOME_ALUNO->EditValue ?>"<?php echo $aluno->NOME_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->NOME_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->MATRICULA_ALUNO->Visible) { // MATRICULA_ALUNO ?>
	<div id="r_MATRICULA_ALUNO" class="form-group">
		<label id="elh_aluno_MATRICULA_ALUNO" for="x_MATRICULA_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->MATRICULA_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->MATRICULA_ALUNO->CellAttributes() ?>>
<span id="el_aluno_MATRICULA_ALUNO">
<input type="text" data-table="aluno" data-field="x_MATRICULA_ALUNO" name="x_MATRICULA_ALUNO" id="x_MATRICULA_ALUNO" size="30" maxlength="45" placeholder="<?php echo ew_HtmlEncode($aluno->MATRICULA_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->MATRICULA_ALUNO->EditValue ?>"<?php echo $aluno->MATRICULA_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->MATRICULA_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->EMAIL_ALUNO->Visible) { // EMAIL_ALUNO ?>
	<div id="r_EMAIL_ALUNO" class="form-group">
		<label id="elh_aluno_EMAIL_ALUNO" for="x_EMAIL_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->EMAIL_ALUNO->FldCaption() ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->EMAIL_ALUNO->CellAttributes() ?>>
<span id="el_aluno_EMAIL_ALUNO">
<input type="text" data-table="aluno" data-field="x_EMAIL_ALUNO" name="x_EMAIL_ALUNO" id="x_EMAIL_ALUNO" size="30" maxlength="50" placeholder="<?php echo ew_HtmlEncode($aluno->EMAIL_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->EMAIL_ALUNO->EditValue ?>"<?php echo $aluno->EMAIL_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->EMAIL_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->CPF_ALUNO->Visible) { // CPF_ALUNO ?>
	<div id="r_CPF_ALUNO" class="form-group">
		<label id="elh_aluno_CPF_ALUNO" for="x_CPF_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->CPF_ALUNO->FldCaption() ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->CPF_ALUNO->CellAttributes() ?>>
<span id="el_aluno_CPF_ALUNO">
<input type="text" data-table="aluno" data-field="x_CPF_ALUNO" name="x_CPF_ALUNO" id="x_CPF_ALUNO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($aluno->CPF_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->CPF_ALUNO->EditValue ?>"<?php echo $aluno->CPF_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->CPF_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->RG_ALUNO->Visible) { // RG_ALUNO ?>
	<div id="r_RG_ALUNO" class="form-group">
		<label id="elh_aluno_RG_ALUNO" for="x_RG_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->RG_ALUNO->FldCaption() ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->RG_ALUNO->CellAttributes() ?>>
<span id="el_aluno_RG_ALUNO">
<input type="text" data-table="aluno" data-field="x_RG_ALUNO" name="x_RG_ALUNO" id="x_RG_ALUNO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($aluno->RG_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->RG_ALUNO->EditValue ?>"<?php echo $aluno->RG_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->RG_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->SEXO_ALUNO->Visible) { // SEXO_ALUNO ?>
	<div id="r_SEXO_ALUNO" class="form-group">
		<label id="elh_aluno_SEXO_ALUNO" for="x_SEXO_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->SEXO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->SEXO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_SEXO_ALUNO">
<input type="text" data-table="aluno" data-field="x_SEXO_ALUNO" name="x_SEXO_ALUNO" id="x_SEXO_ALUNO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($aluno->SEXO_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->SEXO_ALUNO->EditValue ?>"<?php echo $aluno->SEXO_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->SEXO_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->DATA_NASCIMENTO_ALUNO->Visible) { // DATA_NASCIMENTO_ALUNO ?>
	<div id="r_DATA_NASCIMENTO_ALUNO" class="form-group">
		<label id="elh_aluno_DATA_NASCIMENTO_ALUNO" for="x_DATA_NASCIMENTO_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->DATA_NASCIMENTO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->DATA_NASCIMENTO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_DATA_NASCIMENTO_ALUNO">
<input type="text" data-table="aluno" data-field="x_DATA_NASCIMENTO_ALUNO" name="x_DATA_NASCIMENTO_ALUNO" id="x_DATA_NASCIMENTO_ALUNO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($aluno->DATA_NASCIMENTO_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->DATA_NASCIMENTO_ALUNO->EditValue ?>"<?php echo $aluno->DATA_NASCIMENTO_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->DATA_NASCIMENTO_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->TURNO_ALUNO->Visible) { // TURNO_ALUNO ?>
	<div id="r_TURNO_ALUNO" class="form-group">
		<label id="elh_aluno_TURNO_ALUNO" for="x_TURNO_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->TURNO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->TURNO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_TURNO_ALUNO">
<input type="text" data-table="aluno" data-field="x_TURNO_ALUNO" name="x_TURNO_ALUNO" id="x_TURNO_ALUNO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($aluno->TURNO_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->TURNO_ALUNO->EditValue ?>"<?php echo $aluno->TURNO_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->TURNO_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->TELEFONE_ALUNO->Visible) { // TELEFONE_ALUNO ?>
	<div id="r_TELEFONE_ALUNO" class="form-group">
		<label id="elh_aluno_TELEFONE_ALUNO" for="x_TELEFONE_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->TELEFONE_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->TELEFONE_ALUNO->CellAttributes() ?>>
<span id="el_aluno_TELEFONE_ALUNO">
<input type="text" data-table="aluno" data-field="x_TELEFONE_ALUNO" name="x_TELEFONE_ALUNO" id="x_TELEFONE_ALUNO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($aluno->TELEFONE_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->TELEFONE_ALUNO->EditValue ?>"<?php echo $aluno->TELEFONE_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->TELEFONE_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->RECORD_ALUNO->Visible) { // RECORD_ALUNO ?>
	<div id="r_RECORD_ALUNO" class="form-group">
		<label id="elh_aluno_RECORD_ALUNO" for="x_RECORD_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->RECORD_ALUNO->FldCaption() ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->RECORD_ALUNO->CellAttributes() ?>>
<span id="el_aluno_RECORD_ALUNO">
<input type="text" data-table="aluno" data-field="x_RECORD_ALUNO" name="x_RECORD_ALUNO" id="x_RECORD_ALUNO" size="30" placeholder="<?php echo ew_HtmlEncode($aluno->RECORD_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->RECORD_ALUNO->EditValue ?>"<?php echo $aluno->RECORD_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->RECORD_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
	<div id="r_ID_NIVEL_ACESSO" class="form-group">
		<label id="elh_aluno_ID_NIVEL_ACESSO" for="x_ID_NIVEL_ACESSO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->ID_NIVEL_ACESSO->FldCaption() ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el_aluno_ID_NIVEL_ACESSO">
<input type="text" data-table="aluno" data-field="x_ID_NIVEL_ACESSO" name="x_ID_NIVEL_ACESSO" id="x_ID_NIVEL_ACESSO" size="30" placeholder="<?php echo ew_HtmlEncode($aluno->ID_NIVEL_ACESSO->getPlaceHolder()) ?>" value="<?php echo $aluno->ID_NIVEL_ACESSO->EditValue ?>"<?php echo $aluno->ID_NIVEL_ACESSO->EditAttributes() ?>>
</span>
<?php echo $aluno->ID_NIVEL_ACESSO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->ANO_ALUNO->Visible) { // ANO_ALUNO ?>
	<div id="r_ANO_ALUNO" class="form-group">
		<label id="elh_aluno_ANO_ALUNO" for="x_ANO_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->ANO_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->ANO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_ANO_ALUNO">
<input type="text" data-table="aluno" data-field="x_ANO_ALUNO" name="x_ANO_ALUNO" id="x_ANO_ALUNO" size="30" maxlength="40" placeholder="<?php echo ew_HtmlEncode($aluno->ANO_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->ANO_ALUNO->EditValue ?>"<?php echo $aluno->ANO_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->ANO_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->TURMA_ALUNO->Visible) { // TURMA_ALUNO ?>
	<div id="r_TURMA_ALUNO" class="form-group">
		<label id="elh_aluno_TURMA_ALUNO" for="x_TURMA_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->TURMA_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->TURMA_ALUNO->CellAttributes() ?>>
<span id="el_aluno_TURMA_ALUNO">
<input type="text" data-table="aluno" data-field="x_TURMA_ALUNO" name="x_TURMA_ALUNO" id="x_TURMA_ALUNO" size="30" maxlength="10" placeholder="<?php echo ew_HtmlEncode($aluno->TURMA_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->TURMA_ALUNO->EditValue ?>"<?php echo $aluno->TURMA_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->TURMA_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->SALA_ALUNO->Visible) { // SALA_ALUNO ?>
	<div id="r_SALA_ALUNO" class="form-group">
		<label id="elh_aluno_SALA_ALUNO" for="x_SALA_ALUNO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->SALA_ALUNO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->SALA_ALUNO->CellAttributes() ?>>
<span id="el_aluno_SALA_ALUNO">
<input type="text" data-table="aluno" data-field="x_SALA_ALUNO" name="x_SALA_ALUNO" id="x_SALA_ALUNO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($aluno->SALA_ALUNO->getPlaceHolder()) ?>" value="<?php echo $aluno->SALA_ALUNO->EditValue ?>"<?php echo $aluno->SALA_ALUNO->EditAttributes() ?>>
</span>
<?php echo $aluno->SALA_ALUNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
	<div id="r_NUMERO_LIVROS" class="form-group">
		<label id="elh_aluno_NUMERO_LIVROS" for="x_NUMERO_LIVROS" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->NUMERO_LIVROS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->NUMERO_LIVROS->CellAttributes() ?>>
<span id="el_aluno_NUMERO_LIVROS">
<input type="text" data-table="aluno" data-field="x_NUMERO_LIVROS" name="x_NUMERO_LIVROS" id="x_NUMERO_LIVROS" size="30" placeholder="<?php echo ew_HtmlEncode($aluno->NUMERO_LIVROS->getPlaceHolder()) ?>" value="<?php echo $aluno->NUMERO_LIVROS->EditValue ?>"<?php echo $aluno->NUMERO_LIVROS->EditAttributes() ?>>
</span>
<?php echo $aluno->NUMERO_LIVROS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($aluno->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
	<div id="r_FREQUENCIA_LIVRO" class="form-group">
		<label id="elh_aluno_FREQUENCIA_LIVRO" for="x_FREQUENCIA_LIVRO" class="<?php echo $aluno_add->LeftColumnClass ?>"><?php echo $aluno->FREQUENCIA_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $aluno_add->RightColumnClass ?>"><div<?php echo $aluno->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el_aluno_FREQUENCIA_LIVRO">
<input type="text" data-table="aluno" data-field="x_FREQUENCIA_LIVRO" name="x_FREQUENCIA_LIVRO" id="x_FREQUENCIA_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($aluno->FREQUENCIA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $aluno->FREQUENCIA_LIVRO->EditValue ?>"<?php echo $aluno->FREQUENCIA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $aluno->FREQUENCIA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$aluno_add->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $aluno_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $aluno_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
falunoadd.Init();
</script>
<?php
$aluno_add->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$aluno_add->Page_Terminate();
?>
