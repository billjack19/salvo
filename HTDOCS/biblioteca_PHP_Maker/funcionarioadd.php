<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "funcionarioinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$funcionario_add = NULL; // Initialize page object first

class cfuncionario_add extends cfuncionario {

	// Page ID
	var $PageID = 'add';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'funcionario';

	// Page object name
	var $PageObjName = 'funcionario_add';

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

		// Table object (funcionario)
		if (!isset($GLOBALS["funcionario"]) || get_class($GLOBALS["funcionario"]) == "cfuncionario") {
			$GLOBALS["funcionario"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["funcionario"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'funcionario', TRUE);

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
		$this->NOME_FUNCIONARIO->SetVisibility();
		$this->CPF_FUNCIONARIO->SetVisibility();
		$this->RG_FUNCIONARIO->SetVisibility();
		$this->SEXO_FUNCIONARIO->SetVisibility();
		$this->DATA_NASCIMENTO_FUNCIONARIO->SetVisibility();
		$this->TELEFONE_FUNCIONARIO->SetVisibility();
		$this->EMAIL_FUNCIONARIO->SetVisibility();
		$this->CEP_FUNCIONARIO->SetVisibility();
		$this->ENDERECO_FUNCIONARIO->SetVisibility();
		$this->NUMERO_END_FUNCIONARIO->SetVisibility();
		$this->COMPLEMENTO_END_FUNCIONARIO->SetVisibility();
		$this->BAIRRO_END_FUNCIONARIO->SetVisibility();
		$this->ESTADO_END_FUNCIONARIO->SetVisibility();
		$this->CIDADE_END_FUNCIONARIO->SetVisibility();
		$this->TURNO_FUNCIONARIO->SetVisibility();
		$this->CARGO_FUNCIONARIO->SetVisibility();
		$this->ID_NIVEL_ACESSO->SetVisibility();
		$this->MASP->SetVisibility();
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
		global $EW_EXPORT, $funcionario;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($funcionario);
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
					if ($pageName == "funcionarioview.php")
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
			if (@$_GET["ID_FUNCIONARIO"] != "") {
				$this->ID_FUNCIONARIO->setQueryStringValue($_GET["ID_FUNCIONARIO"]);
				$this->setKey("ID_FUNCIONARIO", $this->ID_FUNCIONARIO->CurrentValue); // Set up key
			} else {
				$this->setKey("ID_FUNCIONARIO", ""); // Clear key
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
					$this->Page_Terminate("funcionariolist.php"); // No matching record, return to list
				}
				break;
			case "A": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $this->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "funcionariolist.php")
						$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to List page with correct master key if necessary
					elseif (ew_GetPageName($sReturnUrl) == "funcionarioview.php")
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
		$this->ID_FUNCIONARIO->CurrentValue = NULL;
		$this->ID_FUNCIONARIO->OldValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->NOME_FUNCIONARIO->CurrentValue = NULL;
		$this->NOME_FUNCIONARIO->OldValue = $this->NOME_FUNCIONARIO->CurrentValue;
		$this->CPF_FUNCIONARIO->CurrentValue = NULL;
		$this->CPF_FUNCIONARIO->OldValue = $this->CPF_FUNCIONARIO->CurrentValue;
		$this->RG_FUNCIONARIO->CurrentValue = NULL;
		$this->RG_FUNCIONARIO->OldValue = $this->RG_FUNCIONARIO->CurrentValue;
		$this->SEXO_FUNCIONARIO->CurrentValue = NULL;
		$this->SEXO_FUNCIONARIO->OldValue = $this->SEXO_FUNCIONARIO->CurrentValue;
		$this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue = NULL;
		$this->DATA_NASCIMENTO_FUNCIONARIO->OldValue = $this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue;
		$this->TELEFONE_FUNCIONARIO->CurrentValue = NULL;
		$this->TELEFONE_FUNCIONARIO->OldValue = $this->TELEFONE_FUNCIONARIO->CurrentValue;
		$this->EMAIL_FUNCIONARIO->CurrentValue = NULL;
		$this->EMAIL_FUNCIONARIO->OldValue = $this->EMAIL_FUNCIONARIO->CurrentValue;
		$this->CEP_FUNCIONARIO->CurrentValue = NULL;
		$this->CEP_FUNCIONARIO->OldValue = $this->CEP_FUNCIONARIO->CurrentValue;
		$this->ENDERECO_FUNCIONARIO->CurrentValue = NULL;
		$this->ENDERECO_FUNCIONARIO->OldValue = $this->ENDERECO_FUNCIONARIO->CurrentValue;
		$this->NUMERO_END_FUNCIONARIO->CurrentValue = NULL;
		$this->NUMERO_END_FUNCIONARIO->OldValue = $this->NUMERO_END_FUNCIONARIO->CurrentValue;
		$this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue = NULL;
		$this->COMPLEMENTO_END_FUNCIONARIO->OldValue = $this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue;
		$this->BAIRRO_END_FUNCIONARIO->CurrentValue = NULL;
		$this->BAIRRO_END_FUNCIONARIO->OldValue = $this->BAIRRO_END_FUNCIONARIO->CurrentValue;
		$this->ESTADO_END_FUNCIONARIO->CurrentValue = NULL;
		$this->ESTADO_END_FUNCIONARIO->OldValue = $this->ESTADO_END_FUNCIONARIO->CurrentValue;
		$this->CIDADE_END_FUNCIONARIO->CurrentValue = NULL;
		$this->CIDADE_END_FUNCIONARIO->OldValue = $this->CIDADE_END_FUNCIONARIO->CurrentValue;
		$this->TURNO_FUNCIONARIO->CurrentValue = NULL;
		$this->TURNO_FUNCIONARIO->OldValue = $this->TURNO_FUNCIONARIO->CurrentValue;
		$this->CARGO_FUNCIONARIO->CurrentValue = NULL;
		$this->CARGO_FUNCIONARIO->OldValue = $this->CARGO_FUNCIONARIO->CurrentValue;
		$this->ID_NIVEL_ACESSO->CurrentValue = NULL;
		$this->ID_NIVEL_ACESSO->OldValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->MASP->CurrentValue = NULL;
		$this->MASP->OldValue = $this->MASP->CurrentValue;
		$this->NUMERO_LIVROS->CurrentValue = NULL;
		$this->NUMERO_LIVROS->OldValue = $this->NUMERO_LIVROS->CurrentValue;
		$this->FREQUENCIA_LIVRO->CurrentValue = NULL;
		$this->FREQUENCIA_LIVRO->OldValue = $this->FREQUENCIA_LIVRO->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->NOME_FUNCIONARIO->FldIsDetailKey) {
			$this->NOME_FUNCIONARIO->setFormValue($objForm->GetValue("x_NOME_FUNCIONARIO"));
		}
		if (!$this->CPF_FUNCIONARIO->FldIsDetailKey) {
			$this->CPF_FUNCIONARIO->setFormValue($objForm->GetValue("x_CPF_FUNCIONARIO"));
		}
		if (!$this->RG_FUNCIONARIO->FldIsDetailKey) {
			$this->RG_FUNCIONARIO->setFormValue($objForm->GetValue("x_RG_FUNCIONARIO"));
		}
		if (!$this->SEXO_FUNCIONARIO->FldIsDetailKey) {
			$this->SEXO_FUNCIONARIO->setFormValue($objForm->GetValue("x_SEXO_FUNCIONARIO"));
		}
		if (!$this->DATA_NASCIMENTO_FUNCIONARIO->FldIsDetailKey) {
			$this->DATA_NASCIMENTO_FUNCIONARIO->setFormValue($objForm->GetValue("x_DATA_NASCIMENTO_FUNCIONARIO"));
		}
		if (!$this->TELEFONE_FUNCIONARIO->FldIsDetailKey) {
			$this->TELEFONE_FUNCIONARIO->setFormValue($objForm->GetValue("x_TELEFONE_FUNCIONARIO"));
		}
		if (!$this->EMAIL_FUNCIONARIO->FldIsDetailKey) {
			$this->EMAIL_FUNCIONARIO->setFormValue($objForm->GetValue("x_EMAIL_FUNCIONARIO"));
		}
		if (!$this->CEP_FUNCIONARIO->FldIsDetailKey) {
			$this->CEP_FUNCIONARIO->setFormValue($objForm->GetValue("x_CEP_FUNCIONARIO"));
		}
		if (!$this->ENDERECO_FUNCIONARIO->FldIsDetailKey) {
			$this->ENDERECO_FUNCIONARIO->setFormValue($objForm->GetValue("x_ENDERECO_FUNCIONARIO"));
		}
		if (!$this->NUMERO_END_FUNCIONARIO->FldIsDetailKey) {
			$this->NUMERO_END_FUNCIONARIO->setFormValue($objForm->GetValue("x_NUMERO_END_FUNCIONARIO"));
		}
		if (!$this->COMPLEMENTO_END_FUNCIONARIO->FldIsDetailKey) {
			$this->COMPLEMENTO_END_FUNCIONARIO->setFormValue($objForm->GetValue("x_COMPLEMENTO_END_FUNCIONARIO"));
		}
		if (!$this->BAIRRO_END_FUNCIONARIO->FldIsDetailKey) {
			$this->BAIRRO_END_FUNCIONARIO->setFormValue($objForm->GetValue("x_BAIRRO_END_FUNCIONARIO"));
		}
		if (!$this->ESTADO_END_FUNCIONARIO->FldIsDetailKey) {
			$this->ESTADO_END_FUNCIONARIO->setFormValue($objForm->GetValue("x_ESTADO_END_FUNCIONARIO"));
		}
		if (!$this->CIDADE_END_FUNCIONARIO->FldIsDetailKey) {
			$this->CIDADE_END_FUNCIONARIO->setFormValue($objForm->GetValue("x_CIDADE_END_FUNCIONARIO"));
		}
		if (!$this->TURNO_FUNCIONARIO->FldIsDetailKey) {
			$this->TURNO_FUNCIONARIO->setFormValue($objForm->GetValue("x_TURNO_FUNCIONARIO"));
		}
		if (!$this->CARGO_FUNCIONARIO->FldIsDetailKey) {
			$this->CARGO_FUNCIONARIO->setFormValue($objForm->GetValue("x_CARGO_FUNCIONARIO"));
		}
		if (!$this->ID_NIVEL_ACESSO->FldIsDetailKey) {
			$this->ID_NIVEL_ACESSO->setFormValue($objForm->GetValue("x_ID_NIVEL_ACESSO"));
		}
		if (!$this->MASP->FldIsDetailKey) {
			$this->MASP->setFormValue($objForm->GetValue("x_MASP"));
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
		$this->NOME_FUNCIONARIO->CurrentValue = $this->NOME_FUNCIONARIO->FormValue;
		$this->CPF_FUNCIONARIO->CurrentValue = $this->CPF_FUNCIONARIO->FormValue;
		$this->RG_FUNCIONARIO->CurrentValue = $this->RG_FUNCIONARIO->FormValue;
		$this->SEXO_FUNCIONARIO->CurrentValue = $this->SEXO_FUNCIONARIO->FormValue;
		$this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue = $this->DATA_NASCIMENTO_FUNCIONARIO->FormValue;
		$this->TELEFONE_FUNCIONARIO->CurrentValue = $this->TELEFONE_FUNCIONARIO->FormValue;
		$this->EMAIL_FUNCIONARIO->CurrentValue = $this->EMAIL_FUNCIONARIO->FormValue;
		$this->CEP_FUNCIONARIO->CurrentValue = $this->CEP_FUNCIONARIO->FormValue;
		$this->ENDERECO_FUNCIONARIO->CurrentValue = $this->ENDERECO_FUNCIONARIO->FormValue;
		$this->NUMERO_END_FUNCIONARIO->CurrentValue = $this->NUMERO_END_FUNCIONARIO->FormValue;
		$this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue = $this->COMPLEMENTO_END_FUNCIONARIO->FormValue;
		$this->BAIRRO_END_FUNCIONARIO->CurrentValue = $this->BAIRRO_END_FUNCIONARIO->FormValue;
		$this->ESTADO_END_FUNCIONARIO->CurrentValue = $this->ESTADO_END_FUNCIONARIO->FormValue;
		$this->CIDADE_END_FUNCIONARIO->CurrentValue = $this->CIDADE_END_FUNCIONARIO->FormValue;
		$this->TURNO_FUNCIONARIO->CurrentValue = $this->TURNO_FUNCIONARIO->FormValue;
		$this->CARGO_FUNCIONARIO->CurrentValue = $this->CARGO_FUNCIONARIO->FormValue;
		$this->ID_NIVEL_ACESSO->CurrentValue = $this->ID_NIVEL_ACESSO->FormValue;
		$this->MASP->CurrentValue = $this->MASP->FormValue;
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
		$this->ID_FUNCIONARIO->setDbValue($row['ID_FUNCIONARIO']);
		$this->NOME_FUNCIONARIO->setDbValue($row['NOME_FUNCIONARIO']);
		$this->CPF_FUNCIONARIO->setDbValue($row['CPF_FUNCIONARIO']);
		$this->RG_FUNCIONARIO->setDbValue($row['RG_FUNCIONARIO']);
		$this->SEXO_FUNCIONARIO->setDbValue($row['SEXO_FUNCIONARIO']);
		$this->DATA_NASCIMENTO_FUNCIONARIO->setDbValue($row['DATA_NASCIMENTO_FUNCIONARIO']);
		$this->TELEFONE_FUNCIONARIO->setDbValue($row['TELEFONE_FUNCIONARIO']);
		$this->EMAIL_FUNCIONARIO->setDbValue($row['EMAIL_FUNCIONARIO']);
		$this->CEP_FUNCIONARIO->setDbValue($row['CEP_FUNCIONARIO']);
		$this->ENDERECO_FUNCIONARIO->setDbValue($row['ENDERECO_FUNCIONARIO']);
		$this->NUMERO_END_FUNCIONARIO->setDbValue($row['NUMERO_END_FUNCIONARIO']);
		$this->COMPLEMENTO_END_FUNCIONARIO->setDbValue($row['COMPLEMENTO_END_FUNCIONARIO']);
		$this->BAIRRO_END_FUNCIONARIO->setDbValue($row['BAIRRO_END_FUNCIONARIO']);
		$this->ESTADO_END_FUNCIONARIO->setDbValue($row['ESTADO_END_FUNCIONARIO']);
		$this->CIDADE_END_FUNCIONARIO->setDbValue($row['CIDADE_END_FUNCIONARIO']);
		$this->TURNO_FUNCIONARIO->setDbValue($row['TURNO_FUNCIONARIO']);
		$this->CARGO_FUNCIONARIO->setDbValue($row['CARGO_FUNCIONARIO']);
		$this->ID_NIVEL_ACESSO->setDbValue($row['ID_NIVEL_ACESSO']);
		$this->MASP->setDbValue($row['MASP']);
		$this->NUMERO_LIVROS->setDbValue($row['NUMERO_LIVROS']);
		$this->FREQUENCIA_LIVRO->setDbValue($row['FREQUENCIA_LIVRO']);
	}

	// Return a row with default values
	function NewRow() {
		$this->LoadDefaultValues();
		$row = array();
		$row['ID_FUNCIONARIO'] = $this->ID_FUNCIONARIO->CurrentValue;
		$row['NOME_FUNCIONARIO'] = $this->NOME_FUNCIONARIO->CurrentValue;
		$row['CPF_FUNCIONARIO'] = $this->CPF_FUNCIONARIO->CurrentValue;
		$row['RG_FUNCIONARIO'] = $this->RG_FUNCIONARIO->CurrentValue;
		$row['SEXO_FUNCIONARIO'] = $this->SEXO_FUNCIONARIO->CurrentValue;
		$row['DATA_NASCIMENTO_FUNCIONARIO'] = $this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue;
		$row['TELEFONE_FUNCIONARIO'] = $this->TELEFONE_FUNCIONARIO->CurrentValue;
		$row['EMAIL_FUNCIONARIO'] = $this->EMAIL_FUNCIONARIO->CurrentValue;
		$row['CEP_FUNCIONARIO'] = $this->CEP_FUNCIONARIO->CurrentValue;
		$row['ENDERECO_FUNCIONARIO'] = $this->ENDERECO_FUNCIONARIO->CurrentValue;
		$row['NUMERO_END_FUNCIONARIO'] = $this->NUMERO_END_FUNCIONARIO->CurrentValue;
		$row['COMPLEMENTO_END_FUNCIONARIO'] = $this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue;
		$row['BAIRRO_END_FUNCIONARIO'] = $this->BAIRRO_END_FUNCIONARIO->CurrentValue;
		$row['ESTADO_END_FUNCIONARIO'] = $this->ESTADO_END_FUNCIONARIO->CurrentValue;
		$row['CIDADE_END_FUNCIONARIO'] = $this->CIDADE_END_FUNCIONARIO->CurrentValue;
		$row['TURNO_FUNCIONARIO'] = $this->TURNO_FUNCIONARIO->CurrentValue;
		$row['CARGO_FUNCIONARIO'] = $this->CARGO_FUNCIONARIO->CurrentValue;
		$row['ID_NIVEL_ACESSO'] = $this->ID_NIVEL_ACESSO->CurrentValue;
		$row['MASP'] = $this->MASP->CurrentValue;
		$row['NUMERO_LIVROS'] = $this->NUMERO_LIVROS->CurrentValue;
		$row['FREQUENCIA_LIVRO'] = $this->FREQUENCIA_LIVRO->CurrentValue;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_FUNCIONARIO->DbValue = $row['ID_FUNCIONARIO'];
		$this->NOME_FUNCIONARIO->DbValue = $row['NOME_FUNCIONARIO'];
		$this->CPF_FUNCIONARIO->DbValue = $row['CPF_FUNCIONARIO'];
		$this->RG_FUNCIONARIO->DbValue = $row['RG_FUNCIONARIO'];
		$this->SEXO_FUNCIONARIO->DbValue = $row['SEXO_FUNCIONARIO'];
		$this->DATA_NASCIMENTO_FUNCIONARIO->DbValue = $row['DATA_NASCIMENTO_FUNCIONARIO'];
		$this->TELEFONE_FUNCIONARIO->DbValue = $row['TELEFONE_FUNCIONARIO'];
		$this->EMAIL_FUNCIONARIO->DbValue = $row['EMAIL_FUNCIONARIO'];
		$this->CEP_FUNCIONARIO->DbValue = $row['CEP_FUNCIONARIO'];
		$this->ENDERECO_FUNCIONARIO->DbValue = $row['ENDERECO_FUNCIONARIO'];
		$this->NUMERO_END_FUNCIONARIO->DbValue = $row['NUMERO_END_FUNCIONARIO'];
		$this->COMPLEMENTO_END_FUNCIONARIO->DbValue = $row['COMPLEMENTO_END_FUNCIONARIO'];
		$this->BAIRRO_END_FUNCIONARIO->DbValue = $row['BAIRRO_END_FUNCIONARIO'];
		$this->ESTADO_END_FUNCIONARIO->DbValue = $row['ESTADO_END_FUNCIONARIO'];
		$this->CIDADE_END_FUNCIONARIO->DbValue = $row['CIDADE_END_FUNCIONARIO'];
		$this->TURNO_FUNCIONARIO->DbValue = $row['TURNO_FUNCIONARIO'];
		$this->CARGO_FUNCIONARIO->DbValue = $row['CARGO_FUNCIONARIO'];
		$this->ID_NIVEL_ACESSO->DbValue = $row['ID_NIVEL_ACESSO'];
		$this->MASP->DbValue = $row['MASP'];
		$this->NUMERO_LIVROS->DbValue = $row['NUMERO_LIVROS'];
		$this->FREQUENCIA_LIVRO->DbValue = $row['FREQUENCIA_LIVRO'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("ID_FUNCIONARIO")) <> "")
			$this->ID_FUNCIONARIO->CurrentValue = $this->getKey("ID_FUNCIONARIO"); // ID_FUNCIONARIO
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
		// ID_FUNCIONARIO
		// NOME_FUNCIONARIO
		// CPF_FUNCIONARIO
		// RG_FUNCIONARIO
		// SEXO_FUNCIONARIO
		// DATA_NASCIMENTO_FUNCIONARIO
		// TELEFONE_FUNCIONARIO
		// EMAIL_FUNCIONARIO
		// CEP_FUNCIONARIO
		// ENDERECO_FUNCIONARIO
		// NUMERO_END_FUNCIONARIO
		// COMPLEMENTO_END_FUNCIONARIO
		// BAIRRO_END_FUNCIONARIO
		// ESTADO_END_FUNCIONARIO
		// CIDADE_END_FUNCIONARIO
		// TURNO_FUNCIONARIO
		// CARGO_FUNCIONARIO
		// ID_NIVEL_ACESSO
		// MASP
		// NUMERO_LIVROS
		// FREQUENCIA_LIVRO

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_FUNCIONARIO
		$this->ID_FUNCIONARIO->ViewValue = $this->ID_FUNCIONARIO->CurrentValue;
		$this->ID_FUNCIONARIO->ViewCustomAttributes = "";

		// NOME_FUNCIONARIO
		$this->NOME_FUNCIONARIO->ViewValue = $this->NOME_FUNCIONARIO->CurrentValue;
		$this->NOME_FUNCIONARIO->ViewCustomAttributes = "";

		// CPF_FUNCIONARIO
		$this->CPF_FUNCIONARIO->ViewValue = $this->CPF_FUNCIONARIO->CurrentValue;
		$this->CPF_FUNCIONARIO->ViewCustomAttributes = "";

		// RG_FUNCIONARIO
		$this->RG_FUNCIONARIO->ViewValue = $this->RG_FUNCIONARIO->CurrentValue;
		$this->RG_FUNCIONARIO->ViewCustomAttributes = "";

		// SEXO_FUNCIONARIO
		$this->SEXO_FUNCIONARIO->ViewValue = $this->SEXO_FUNCIONARIO->CurrentValue;
		$this->SEXO_FUNCIONARIO->ViewCustomAttributes = "";

		// DATA_NASCIMENTO_FUNCIONARIO
		$this->DATA_NASCIMENTO_FUNCIONARIO->ViewValue = $this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue;
		$this->DATA_NASCIMENTO_FUNCIONARIO->ViewCustomAttributes = "";

		// TELEFONE_FUNCIONARIO
		$this->TELEFONE_FUNCIONARIO->ViewValue = $this->TELEFONE_FUNCIONARIO->CurrentValue;
		$this->TELEFONE_FUNCIONARIO->ViewCustomAttributes = "";

		// EMAIL_FUNCIONARIO
		$this->EMAIL_FUNCIONARIO->ViewValue = $this->EMAIL_FUNCIONARIO->CurrentValue;
		$this->EMAIL_FUNCIONARIO->ViewCustomAttributes = "";

		// CEP_FUNCIONARIO
		$this->CEP_FUNCIONARIO->ViewValue = $this->CEP_FUNCIONARIO->CurrentValue;
		$this->CEP_FUNCIONARIO->ViewCustomAttributes = "";

		// ENDERECO_FUNCIONARIO
		$this->ENDERECO_FUNCIONARIO->ViewValue = $this->ENDERECO_FUNCIONARIO->CurrentValue;
		$this->ENDERECO_FUNCIONARIO->ViewCustomAttributes = "";

		// NUMERO_END_FUNCIONARIO
		$this->NUMERO_END_FUNCIONARIO->ViewValue = $this->NUMERO_END_FUNCIONARIO->CurrentValue;
		$this->NUMERO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// COMPLEMENTO_END_FUNCIONARIO
		$this->COMPLEMENTO_END_FUNCIONARIO->ViewValue = $this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue;
		$this->COMPLEMENTO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// BAIRRO_END_FUNCIONARIO
		$this->BAIRRO_END_FUNCIONARIO->ViewValue = $this->BAIRRO_END_FUNCIONARIO->CurrentValue;
		$this->BAIRRO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// ESTADO_END_FUNCIONARIO
		$this->ESTADO_END_FUNCIONARIO->ViewValue = $this->ESTADO_END_FUNCIONARIO->CurrentValue;
		$this->ESTADO_END_FUNCIONARIO->ViewCustomAttributes = "";

		// CIDADE_END_FUNCIONARIO
		$this->CIDADE_END_FUNCIONARIO->ViewValue = $this->CIDADE_END_FUNCIONARIO->CurrentValue;
		$this->CIDADE_END_FUNCIONARIO->ViewCustomAttributes = "";

		// TURNO_FUNCIONARIO
		$this->TURNO_FUNCIONARIO->ViewValue = $this->TURNO_FUNCIONARIO->CurrentValue;
		$this->TURNO_FUNCIONARIO->ViewCustomAttributes = "";

		// CARGO_FUNCIONARIO
		$this->CARGO_FUNCIONARIO->ViewValue = $this->CARGO_FUNCIONARIO->CurrentValue;
		$this->CARGO_FUNCIONARIO->ViewCustomAttributes = "";

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->ViewValue = $this->ID_NIVEL_ACESSO->CurrentValue;
		$this->ID_NIVEL_ACESSO->ViewCustomAttributes = "";

		// MASP
		$this->MASP->ViewValue = $this->MASP->CurrentValue;
		$this->MASP->ViewCustomAttributes = "";

		// NUMERO_LIVROS
		$this->NUMERO_LIVROS->ViewValue = $this->NUMERO_LIVROS->CurrentValue;
		$this->NUMERO_LIVROS->ViewCustomAttributes = "";

		// FREQUENCIA_LIVRO
		$this->FREQUENCIA_LIVRO->ViewValue = $this->FREQUENCIA_LIVRO->CurrentValue;
		$this->FREQUENCIA_LIVRO->ViewCustomAttributes = "";

			// NOME_FUNCIONARIO
			$this->NOME_FUNCIONARIO->LinkCustomAttributes = "";
			$this->NOME_FUNCIONARIO->HrefValue = "";
			$this->NOME_FUNCIONARIO->TooltipValue = "";

			// CPF_FUNCIONARIO
			$this->CPF_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CPF_FUNCIONARIO->HrefValue = "";
			$this->CPF_FUNCIONARIO->TooltipValue = "";

			// RG_FUNCIONARIO
			$this->RG_FUNCIONARIO->LinkCustomAttributes = "";
			$this->RG_FUNCIONARIO->HrefValue = "";
			$this->RG_FUNCIONARIO->TooltipValue = "";

			// SEXO_FUNCIONARIO
			$this->SEXO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->SEXO_FUNCIONARIO->HrefValue = "";
			$this->SEXO_FUNCIONARIO->TooltipValue = "";

			// DATA_NASCIMENTO_FUNCIONARIO
			$this->DATA_NASCIMENTO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->DATA_NASCIMENTO_FUNCIONARIO->HrefValue = "";
			$this->DATA_NASCIMENTO_FUNCIONARIO->TooltipValue = "";

			// TELEFONE_FUNCIONARIO
			$this->TELEFONE_FUNCIONARIO->LinkCustomAttributes = "";
			$this->TELEFONE_FUNCIONARIO->HrefValue = "";
			$this->TELEFONE_FUNCIONARIO->TooltipValue = "";

			// EMAIL_FUNCIONARIO
			$this->EMAIL_FUNCIONARIO->LinkCustomAttributes = "";
			$this->EMAIL_FUNCIONARIO->HrefValue = "";
			$this->EMAIL_FUNCIONARIO->TooltipValue = "";

			// CEP_FUNCIONARIO
			$this->CEP_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CEP_FUNCIONARIO->HrefValue = "";
			$this->CEP_FUNCIONARIO->TooltipValue = "";

			// ENDERECO_FUNCIONARIO
			$this->ENDERECO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ENDERECO_FUNCIONARIO->HrefValue = "";
			$this->ENDERECO_FUNCIONARIO->TooltipValue = "";

			// NUMERO_END_FUNCIONARIO
			$this->NUMERO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->NUMERO_END_FUNCIONARIO->HrefValue = "";
			$this->NUMERO_END_FUNCIONARIO->TooltipValue = "";

			// COMPLEMENTO_END_FUNCIONARIO
			$this->COMPLEMENTO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->COMPLEMENTO_END_FUNCIONARIO->HrefValue = "";
			$this->COMPLEMENTO_END_FUNCIONARIO->TooltipValue = "";

			// BAIRRO_END_FUNCIONARIO
			$this->BAIRRO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->BAIRRO_END_FUNCIONARIO->HrefValue = "";
			$this->BAIRRO_END_FUNCIONARIO->TooltipValue = "";

			// ESTADO_END_FUNCIONARIO
			$this->ESTADO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ESTADO_END_FUNCIONARIO->HrefValue = "";
			$this->ESTADO_END_FUNCIONARIO->TooltipValue = "";

			// CIDADE_END_FUNCIONARIO
			$this->CIDADE_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CIDADE_END_FUNCIONARIO->HrefValue = "";
			$this->CIDADE_END_FUNCIONARIO->TooltipValue = "";

			// TURNO_FUNCIONARIO
			$this->TURNO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->TURNO_FUNCIONARIO->HrefValue = "";
			$this->TURNO_FUNCIONARIO->TooltipValue = "";

			// CARGO_FUNCIONARIO
			$this->CARGO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CARGO_FUNCIONARIO->HrefValue = "";
			$this->CARGO_FUNCIONARIO->TooltipValue = "";

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->LinkCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->HrefValue = "";
			$this->ID_NIVEL_ACESSO->TooltipValue = "";

			// MASP
			$this->MASP->LinkCustomAttributes = "";
			$this->MASP->HrefValue = "";
			$this->MASP->TooltipValue = "";

			// NUMERO_LIVROS
			$this->NUMERO_LIVROS->LinkCustomAttributes = "";
			$this->NUMERO_LIVROS->HrefValue = "";
			$this->NUMERO_LIVROS->TooltipValue = "";

			// FREQUENCIA_LIVRO
			$this->FREQUENCIA_LIVRO->LinkCustomAttributes = "";
			$this->FREQUENCIA_LIVRO->HrefValue = "";
			$this->FREQUENCIA_LIVRO->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_ADD) { // Add row

			// NOME_FUNCIONARIO
			$this->NOME_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->NOME_FUNCIONARIO->EditCustomAttributes = "";
			$this->NOME_FUNCIONARIO->EditValue = ew_HtmlEncode($this->NOME_FUNCIONARIO->CurrentValue);
			$this->NOME_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->NOME_FUNCIONARIO->FldCaption());

			// CPF_FUNCIONARIO
			$this->CPF_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->CPF_FUNCIONARIO->EditCustomAttributes = "";
			$this->CPF_FUNCIONARIO->EditValue = ew_HtmlEncode($this->CPF_FUNCIONARIO->CurrentValue);
			$this->CPF_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CPF_FUNCIONARIO->FldCaption());

			// RG_FUNCIONARIO
			$this->RG_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->RG_FUNCIONARIO->EditCustomAttributes = "";
			$this->RG_FUNCIONARIO->EditValue = ew_HtmlEncode($this->RG_FUNCIONARIO->CurrentValue);
			$this->RG_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->RG_FUNCIONARIO->FldCaption());

			// SEXO_FUNCIONARIO
			$this->SEXO_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->SEXO_FUNCIONARIO->EditCustomAttributes = "";
			$this->SEXO_FUNCIONARIO->EditValue = ew_HtmlEncode($this->SEXO_FUNCIONARIO->CurrentValue);
			$this->SEXO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->SEXO_FUNCIONARIO->FldCaption());

			// DATA_NASCIMENTO_FUNCIONARIO
			$this->DATA_NASCIMENTO_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->DATA_NASCIMENTO_FUNCIONARIO->EditCustomAttributes = "";
			$this->DATA_NASCIMENTO_FUNCIONARIO->EditValue = ew_HtmlEncode($this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue);
			$this->DATA_NASCIMENTO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->DATA_NASCIMENTO_FUNCIONARIO->FldCaption());

			// TELEFONE_FUNCIONARIO
			$this->TELEFONE_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->TELEFONE_FUNCIONARIO->EditCustomAttributes = "";
			$this->TELEFONE_FUNCIONARIO->EditValue = ew_HtmlEncode($this->TELEFONE_FUNCIONARIO->CurrentValue);
			$this->TELEFONE_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->TELEFONE_FUNCIONARIO->FldCaption());

			// EMAIL_FUNCIONARIO
			$this->EMAIL_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->EMAIL_FUNCIONARIO->EditCustomAttributes = "";
			$this->EMAIL_FUNCIONARIO->EditValue = ew_HtmlEncode($this->EMAIL_FUNCIONARIO->CurrentValue);
			$this->EMAIL_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->EMAIL_FUNCIONARIO->FldCaption());

			// CEP_FUNCIONARIO
			$this->CEP_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->CEP_FUNCIONARIO->EditCustomAttributes = "";
			$this->CEP_FUNCIONARIO->EditValue = ew_HtmlEncode($this->CEP_FUNCIONARIO->CurrentValue);
			$this->CEP_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CEP_FUNCIONARIO->FldCaption());

			// ENDERECO_FUNCIONARIO
			$this->ENDERECO_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->ENDERECO_FUNCIONARIO->EditCustomAttributes = "";
			$this->ENDERECO_FUNCIONARIO->EditValue = ew_HtmlEncode($this->ENDERECO_FUNCIONARIO->CurrentValue);
			$this->ENDERECO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->ENDERECO_FUNCIONARIO->FldCaption());

			// NUMERO_END_FUNCIONARIO
			$this->NUMERO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->NUMERO_END_FUNCIONARIO->EditCustomAttributes = "";
			$this->NUMERO_END_FUNCIONARIO->EditValue = ew_HtmlEncode($this->NUMERO_END_FUNCIONARIO->CurrentValue);
			$this->NUMERO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->NUMERO_END_FUNCIONARIO->FldCaption());

			// COMPLEMENTO_END_FUNCIONARIO
			$this->COMPLEMENTO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->COMPLEMENTO_END_FUNCIONARIO->EditCustomAttributes = "";
			$this->COMPLEMENTO_END_FUNCIONARIO->EditValue = ew_HtmlEncode($this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue);
			$this->COMPLEMENTO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->COMPLEMENTO_END_FUNCIONARIO->FldCaption());

			// BAIRRO_END_FUNCIONARIO
			$this->BAIRRO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->BAIRRO_END_FUNCIONARIO->EditCustomAttributes = "";
			$this->BAIRRO_END_FUNCIONARIO->EditValue = ew_HtmlEncode($this->BAIRRO_END_FUNCIONARIO->CurrentValue);
			$this->BAIRRO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->BAIRRO_END_FUNCIONARIO->FldCaption());

			// ESTADO_END_FUNCIONARIO
			$this->ESTADO_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->ESTADO_END_FUNCIONARIO->EditCustomAttributes = "";
			$this->ESTADO_END_FUNCIONARIO->EditValue = ew_HtmlEncode($this->ESTADO_END_FUNCIONARIO->CurrentValue);
			$this->ESTADO_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->ESTADO_END_FUNCIONARIO->FldCaption());

			// CIDADE_END_FUNCIONARIO
			$this->CIDADE_END_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->CIDADE_END_FUNCIONARIO->EditCustomAttributes = "";
			$this->CIDADE_END_FUNCIONARIO->EditValue = ew_HtmlEncode($this->CIDADE_END_FUNCIONARIO->CurrentValue);
			$this->CIDADE_END_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CIDADE_END_FUNCIONARIO->FldCaption());

			// TURNO_FUNCIONARIO
			$this->TURNO_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->TURNO_FUNCIONARIO->EditCustomAttributes = "";
			$this->TURNO_FUNCIONARIO->EditValue = ew_HtmlEncode($this->TURNO_FUNCIONARIO->CurrentValue);
			$this->TURNO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->TURNO_FUNCIONARIO->FldCaption());

			// CARGO_FUNCIONARIO
			$this->CARGO_FUNCIONARIO->EditAttrs["class"] = "form-control";
			$this->CARGO_FUNCIONARIO->EditCustomAttributes = "";
			$this->CARGO_FUNCIONARIO->EditValue = ew_HtmlEncode($this->CARGO_FUNCIONARIO->CurrentValue);
			$this->CARGO_FUNCIONARIO->PlaceHolder = ew_RemoveHtml($this->CARGO_FUNCIONARIO->FldCaption());

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->EditAttrs["class"] = "form-control";
			$this->ID_NIVEL_ACESSO->EditCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->EditValue = ew_HtmlEncode($this->ID_NIVEL_ACESSO->CurrentValue);
			$this->ID_NIVEL_ACESSO->PlaceHolder = ew_RemoveHtml($this->ID_NIVEL_ACESSO->FldCaption());

			// MASP
			$this->MASP->EditAttrs["class"] = "form-control";
			$this->MASP->EditCustomAttributes = "";
			$this->MASP->EditValue = ew_HtmlEncode($this->MASP->CurrentValue);
			$this->MASP->PlaceHolder = ew_RemoveHtml($this->MASP->FldCaption());

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
			// NOME_FUNCIONARIO

			$this->NOME_FUNCIONARIO->LinkCustomAttributes = "";
			$this->NOME_FUNCIONARIO->HrefValue = "";

			// CPF_FUNCIONARIO
			$this->CPF_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CPF_FUNCIONARIO->HrefValue = "";

			// RG_FUNCIONARIO
			$this->RG_FUNCIONARIO->LinkCustomAttributes = "";
			$this->RG_FUNCIONARIO->HrefValue = "";

			// SEXO_FUNCIONARIO
			$this->SEXO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->SEXO_FUNCIONARIO->HrefValue = "";

			// DATA_NASCIMENTO_FUNCIONARIO
			$this->DATA_NASCIMENTO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->DATA_NASCIMENTO_FUNCIONARIO->HrefValue = "";

			// TELEFONE_FUNCIONARIO
			$this->TELEFONE_FUNCIONARIO->LinkCustomAttributes = "";
			$this->TELEFONE_FUNCIONARIO->HrefValue = "";

			// EMAIL_FUNCIONARIO
			$this->EMAIL_FUNCIONARIO->LinkCustomAttributes = "";
			$this->EMAIL_FUNCIONARIO->HrefValue = "";

			// CEP_FUNCIONARIO
			$this->CEP_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CEP_FUNCIONARIO->HrefValue = "";

			// ENDERECO_FUNCIONARIO
			$this->ENDERECO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ENDERECO_FUNCIONARIO->HrefValue = "";

			// NUMERO_END_FUNCIONARIO
			$this->NUMERO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->NUMERO_END_FUNCIONARIO->HrefValue = "";

			// COMPLEMENTO_END_FUNCIONARIO
			$this->COMPLEMENTO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->COMPLEMENTO_END_FUNCIONARIO->HrefValue = "";

			// BAIRRO_END_FUNCIONARIO
			$this->BAIRRO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->BAIRRO_END_FUNCIONARIO->HrefValue = "";

			// ESTADO_END_FUNCIONARIO
			$this->ESTADO_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->ESTADO_END_FUNCIONARIO->HrefValue = "";

			// CIDADE_END_FUNCIONARIO
			$this->CIDADE_END_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CIDADE_END_FUNCIONARIO->HrefValue = "";

			// TURNO_FUNCIONARIO
			$this->TURNO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->TURNO_FUNCIONARIO->HrefValue = "";

			// CARGO_FUNCIONARIO
			$this->CARGO_FUNCIONARIO->LinkCustomAttributes = "";
			$this->CARGO_FUNCIONARIO->HrefValue = "";

			// ID_NIVEL_ACESSO
			$this->ID_NIVEL_ACESSO->LinkCustomAttributes = "";
			$this->ID_NIVEL_ACESSO->HrefValue = "";

			// MASP
			$this->MASP->LinkCustomAttributes = "";
			$this->MASP->HrefValue = "";

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
		if (!$this->NOME_FUNCIONARIO->FldIsDetailKey && !is_null($this->NOME_FUNCIONARIO->FormValue) && $this->NOME_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->NOME_FUNCIONARIO->FldCaption(), $this->NOME_FUNCIONARIO->ReqErrMsg));
		}
		if (!$this->CPF_FUNCIONARIO->FldIsDetailKey && !is_null($this->CPF_FUNCIONARIO->FormValue) && $this->CPF_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->CPF_FUNCIONARIO->FldCaption(), $this->CPF_FUNCIONARIO->ReqErrMsg));
		}
		if (!$this->SEXO_FUNCIONARIO->FldIsDetailKey && !is_null($this->SEXO_FUNCIONARIO->FormValue) && $this->SEXO_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->SEXO_FUNCIONARIO->FldCaption(), $this->SEXO_FUNCIONARIO->ReqErrMsg));
		}
		if (!$this->DATA_NASCIMENTO_FUNCIONARIO->FldIsDetailKey && !is_null($this->DATA_NASCIMENTO_FUNCIONARIO->FormValue) && $this->DATA_NASCIMENTO_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->DATA_NASCIMENTO_FUNCIONARIO->FldCaption(), $this->DATA_NASCIMENTO_FUNCIONARIO->ReqErrMsg));
		}
		if (!$this->TELEFONE_FUNCIONARIO->FldIsDetailKey && !is_null($this->TELEFONE_FUNCIONARIO->FormValue) && $this->TELEFONE_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->TELEFONE_FUNCIONARIO->FldCaption(), $this->TELEFONE_FUNCIONARIO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->NUMERO_END_FUNCIONARIO->FormValue)) {
			ew_AddMessage($gsFormError, $this->NUMERO_END_FUNCIONARIO->FldErrMsg());
		}
		if (!$this->TURNO_FUNCIONARIO->FldIsDetailKey && !is_null($this->TURNO_FUNCIONARIO->FormValue) && $this->TURNO_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->TURNO_FUNCIONARIO->FldCaption(), $this->TURNO_FUNCIONARIO->ReqErrMsg));
		}
		if (!$this->CARGO_FUNCIONARIO->FldIsDetailKey && !is_null($this->CARGO_FUNCIONARIO->FormValue) && $this->CARGO_FUNCIONARIO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->CARGO_FUNCIONARIO->FldCaption(), $this->CARGO_FUNCIONARIO->ReqErrMsg));
		}
		if (!$this->ID_NIVEL_ACESSO->FldIsDetailKey && !is_null($this->ID_NIVEL_ACESSO->FormValue) && $this->ID_NIVEL_ACESSO->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->ID_NIVEL_ACESSO->FldCaption(), $this->ID_NIVEL_ACESSO->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->ID_NIVEL_ACESSO->FormValue)) {
			ew_AddMessage($gsFormError, $this->ID_NIVEL_ACESSO->FldErrMsg());
		}
		if (!$this->MASP->FldIsDetailKey && !is_null($this->MASP->FormValue) && $this->MASP->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->MASP->FldCaption(), $this->MASP->ReqErrMsg));
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

		// NOME_FUNCIONARIO
		$this->NOME_FUNCIONARIO->SetDbValueDef($rsnew, $this->NOME_FUNCIONARIO->CurrentValue, "", FALSE);

		// CPF_FUNCIONARIO
		$this->CPF_FUNCIONARIO->SetDbValueDef($rsnew, $this->CPF_FUNCIONARIO->CurrentValue, "", FALSE);

		// RG_FUNCIONARIO
		$this->RG_FUNCIONARIO->SetDbValueDef($rsnew, $this->RG_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// SEXO_FUNCIONARIO
		$this->SEXO_FUNCIONARIO->SetDbValueDef($rsnew, $this->SEXO_FUNCIONARIO->CurrentValue, "", FALSE);

		// DATA_NASCIMENTO_FUNCIONARIO
		$this->DATA_NASCIMENTO_FUNCIONARIO->SetDbValueDef($rsnew, $this->DATA_NASCIMENTO_FUNCIONARIO->CurrentValue, "", FALSE);

		// TELEFONE_FUNCIONARIO
		$this->TELEFONE_FUNCIONARIO->SetDbValueDef($rsnew, $this->TELEFONE_FUNCIONARIO->CurrentValue, "", FALSE);

		// EMAIL_FUNCIONARIO
		$this->EMAIL_FUNCIONARIO->SetDbValueDef($rsnew, $this->EMAIL_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// CEP_FUNCIONARIO
		$this->CEP_FUNCIONARIO->SetDbValueDef($rsnew, $this->CEP_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// ENDERECO_FUNCIONARIO
		$this->ENDERECO_FUNCIONARIO->SetDbValueDef($rsnew, $this->ENDERECO_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// NUMERO_END_FUNCIONARIO
		$this->NUMERO_END_FUNCIONARIO->SetDbValueDef($rsnew, $this->NUMERO_END_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// COMPLEMENTO_END_FUNCIONARIO
		$this->COMPLEMENTO_END_FUNCIONARIO->SetDbValueDef($rsnew, $this->COMPLEMENTO_END_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// BAIRRO_END_FUNCIONARIO
		$this->BAIRRO_END_FUNCIONARIO->SetDbValueDef($rsnew, $this->BAIRRO_END_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// ESTADO_END_FUNCIONARIO
		$this->ESTADO_END_FUNCIONARIO->SetDbValueDef($rsnew, $this->ESTADO_END_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// CIDADE_END_FUNCIONARIO
		$this->CIDADE_END_FUNCIONARIO->SetDbValueDef($rsnew, $this->CIDADE_END_FUNCIONARIO->CurrentValue, NULL, FALSE);

		// TURNO_FUNCIONARIO
		$this->TURNO_FUNCIONARIO->SetDbValueDef($rsnew, $this->TURNO_FUNCIONARIO->CurrentValue, "", FALSE);

		// CARGO_FUNCIONARIO
		$this->CARGO_FUNCIONARIO->SetDbValueDef($rsnew, $this->CARGO_FUNCIONARIO->CurrentValue, "", FALSE);

		// ID_NIVEL_ACESSO
		$this->ID_NIVEL_ACESSO->SetDbValueDef($rsnew, $this->ID_NIVEL_ACESSO->CurrentValue, 0, FALSE);

		// MASP
		$this->MASP->SetDbValueDef($rsnew, $this->MASP->CurrentValue, "", FALSE);

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("funcionariolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($funcionario_add)) $funcionario_add = new cfuncionario_add();

// Page init
$funcionario_add->Page_Init();

// Page main
$funcionario_add->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$funcionario_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "add";
var CurrentForm = ffuncionarioadd = new ew_Form("ffuncionarioadd", "add");

// Validate form
ffuncionarioadd.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_NOME_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->NOME_FUNCIONARIO->FldCaption(), $funcionario->NOME_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_CPF_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->CPF_FUNCIONARIO->FldCaption(), $funcionario->CPF_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_SEXO_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->SEXO_FUNCIONARIO->FldCaption(), $funcionario->SEXO_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_DATA_NASCIMENTO_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->DATA_NASCIMENTO_FUNCIONARIO->FldCaption(), $funcionario->DATA_NASCIMENTO_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_TELEFONE_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->TELEFONE_FUNCIONARIO->FldCaption(), $funcionario->TELEFONE_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_NUMERO_END_FUNCIONARIO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($funcionario->NUMERO_END_FUNCIONARIO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_TURNO_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->TURNO_FUNCIONARIO->FldCaption(), $funcionario->TURNO_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_CARGO_FUNCIONARIO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->CARGO_FUNCIONARIO->FldCaption(), $funcionario->CARGO_FUNCIONARIO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_NIVEL_ACESSO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->ID_NIVEL_ACESSO->FldCaption(), $funcionario->ID_NIVEL_ACESSO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_ID_NIVEL_ACESSO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($funcionario->ID_NIVEL_ACESSO->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_MASP");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->MASP->FldCaption(), $funcionario->MASP->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_NUMERO_LIVROS");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->NUMERO_LIVROS->FldCaption(), $funcionario->NUMERO_LIVROS->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_NUMERO_LIVROS");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($funcionario->NUMERO_LIVROS->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_FREQUENCIA_LIVRO");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $funcionario->FREQUENCIA_LIVRO->FldCaption(), $funcionario->FREQUENCIA_LIVRO->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_FREQUENCIA_LIVRO");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($funcionario->FREQUENCIA_LIVRO->FldErrMsg()) ?>");

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
ffuncionarioadd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
ffuncionarioadd.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $funcionario_add->ShowPageHeader(); ?>
<?php
$funcionario_add->ShowMessage();
?>
<form name="ffuncionarioadd" id="ffuncionarioadd" class="<?php echo $funcionario_add->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($funcionario_add->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $funcionario_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="funcionario">
<input type="hidden" name="a_add" id="a_add" value="A">
<input type="hidden" name="modal" value="<?php echo intval($funcionario_add->IsModal) ?>">
<div class="ewAddDiv"><!-- page* -->
<?php if ($funcionario->NOME_FUNCIONARIO->Visible) { // NOME_FUNCIONARIO ?>
	<div id="r_NOME_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_NOME_FUNCIONARIO" for="x_NOME_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->NOME_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->NOME_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_NOME_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_NOME_FUNCIONARIO" name="x_NOME_FUNCIONARIO" id="x_NOME_FUNCIONARIO" size="30" maxlength="30" placeholder="<?php echo ew_HtmlEncode($funcionario->NOME_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->NOME_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->NOME_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->NOME_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->CPF_FUNCIONARIO->Visible) { // CPF_FUNCIONARIO ?>
	<div id="r_CPF_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_CPF_FUNCIONARIO" for="x_CPF_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->CPF_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->CPF_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_CPF_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_CPF_FUNCIONARIO" name="x_CPF_FUNCIONARIO" id="x_CPF_FUNCIONARIO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($funcionario->CPF_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->CPF_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->CPF_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->CPF_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->RG_FUNCIONARIO->Visible) { // RG_FUNCIONARIO ?>
	<div id="r_RG_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_RG_FUNCIONARIO" for="x_RG_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->RG_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->RG_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_RG_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_RG_FUNCIONARIO" name="x_RG_FUNCIONARIO" id="x_RG_FUNCIONARIO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($funcionario->RG_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->RG_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->RG_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->RG_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->SEXO_FUNCIONARIO->Visible) { // SEXO_FUNCIONARIO ?>
	<div id="r_SEXO_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_SEXO_FUNCIONARIO" for="x_SEXO_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->SEXO_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->SEXO_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_SEXO_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_SEXO_FUNCIONARIO" name="x_SEXO_FUNCIONARIO" id="x_SEXO_FUNCIONARIO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($funcionario->SEXO_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->SEXO_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->SEXO_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->SEXO_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->DATA_NASCIMENTO_FUNCIONARIO->Visible) { // DATA_NASCIMENTO_FUNCIONARIO ?>
	<div id="r_DATA_NASCIMENTO_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_DATA_NASCIMENTO_FUNCIONARIO" for="x_DATA_NASCIMENTO_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_DATA_NASCIMENTO_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_DATA_NASCIMENTO_FUNCIONARIO" name="x_DATA_NASCIMENTO_FUNCIONARIO" id="x_DATA_NASCIMENTO_FUNCIONARIO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($funcionario->DATA_NASCIMENTO_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->DATA_NASCIMENTO_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->TELEFONE_FUNCIONARIO->Visible) { // TELEFONE_FUNCIONARIO ?>
	<div id="r_TELEFONE_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_TELEFONE_FUNCIONARIO" for="x_TELEFONE_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->TELEFONE_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->TELEFONE_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_TELEFONE_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_TELEFONE_FUNCIONARIO" name="x_TELEFONE_FUNCIONARIO" id="x_TELEFONE_FUNCIONARIO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($funcionario->TELEFONE_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->TELEFONE_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->TELEFONE_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->TELEFONE_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->EMAIL_FUNCIONARIO->Visible) { // EMAIL_FUNCIONARIO ?>
	<div id="r_EMAIL_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_EMAIL_FUNCIONARIO" for="x_EMAIL_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->EMAIL_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->EMAIL_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_EMAIL_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_EMAIL_FUNCIONARIO" name="x_EMAIL_FUNCIONARIO" id="x_EMAIL_FUNCIONARIO" size="30" maxlength="50" placeholder="<?php echo ew_HtmlEncode($funcionario->EMAIL_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->EMAIL_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->EMAIL_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->EMAIL_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->CEP_FUNCIONARIO->Visible) { // CEP_FUNCIONARIO ?>
	<div id="r_CEP_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_CEP_FUNCIONARIO" for="x_CEP_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->CEP_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->CEP_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_CEP_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_CEP_FUNCIONARIO" name="x_CEP_FUNCIONARIO" id="x_CEP_FUNCIONARIO" size="30" maxlength="15" placeholder="<?php echo ew_HtmlEncode($funcionario->CEP_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->CEP_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->CEP_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->CEP_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->ENDERECO_FUNCIONARIO->Visible) { // ENDERECO_FUNCIONARIO ?>
	<div id="r_ENDERECO_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_ENDERECO_FUNCIONARIO" for="x_ENDERECO_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->ENDERECO_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->ENDERECO_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_ENDERECO_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_ENDERECO_FUNCIONARIO" name="x_ENDERECO_FUNCIONARIO" id="x_ENDERECO_FUNCIONARIO" size="30" maxlength="50" placeholder="<?php echo ew_HtmlEncode($funcionario->ENDERECO_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->ENDERECO_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->ENDERECO_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->ENDERECO_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->NUMERO_END_FUNCIONARIO->Visible) { // NUMERO_END_FUNCIONARIO ?>
	<div id="r_NUMERO_END_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_NUMERO_END_FUNCIONARIO" for="x_NUMERO_END_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->NUMERO_END_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->NUMERO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_NUMERO_END_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_NUMERO_END_FUNCIONARIO" name="x_NUMERO_END_FUNCIONARIO" id="x_NUMERO_END_FUNCIONARIO" size="30" placeholder="<?php echo ew_HtmlEncode($funcionario->NUMERO_END_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->NUMERO_END_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->NUMERO_END_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->NUMERO_END_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->COMPLEMENTO_END_FUNCIONARIO->Visible) { // COMPLEMENTO_END_FUNCIONARIO ?>
	<div id="r_COMPLEMENTO_END_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_COMPLEMENTO_END_FUNCIONARIO" for="x_COMPLEMENTO_END_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_COMPLEMENTO_END_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_COMPLEMENTO_END_FUNCIONARIO" name="x_COMPLEMENTO_END_FUNCIONARIO" id="x_COMPLEMENTO_END_FUNCIONARIO" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($funcionario->COMPLEMENTO_END_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->COMPLEMENTO_END_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->BAIRRO_END_FUNCIONARIO->Visible) { // BAIRRO_END_FUNCIONARIO ?>
	<div id="r_BAIRRO_END_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_BAIRRO_END_FUNCIONARIO" for="x_BAIRRO_END_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->BAIRRO_END_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_BAIRRO_END_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_BAIRRO_END_FUNCIONARIO" name="x_BAIRRO_END_FUNCIONARIO" id="x_BAIRRO_END_FUNCIONARIO" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($funcionario->BAIRRO_END_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->BAIRRO_END_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->ESTADO_END_FUNCIONARIO->Visible) { // ESTADO_END_FUNCIONARIO ?>
	<div id="r_ESTADO_END_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_ESTADO_END_FUNCIONARIO" for="x_ESTADO_END_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->ESTADO_END_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->ESTADO_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_ESTADO_END_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_ESTADO_END_FUNCIONARIO" name="x_ESTADO_END_FUNCIONARIO" id="x_ESTADO_END_FUNCIONARIO" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($funcionario->ESTADO_END_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->ESTADO_END_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->ESTADO_END_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->ESTADO_END_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->CIDADE_END_FUNCIONARIO->Visible) { // CIDADE_END_FUNCIONARIO ?>
	<div id="r_CIDADE_END_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_CIDADE_END_FUNCIONARIO" for="x_CIDADE_END_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->CIDADE_END_FUNCIONARIO->FldCaption() ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->CIDADE_END_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_CIDADE_END_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_CIDADE_END_FUNCIONARIO" name="x_CIDADE_END_FUNCIONARIO" id="x_CIDADE_END_FUNCIONARIO" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($funcionario->CIDADE_END_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->CIDADE_END_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->CIDADE_END_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->CIDADE_END_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->TURNO_FUNCIONARIO->Visible) { // TURNO_FUNCIONARIO ?>
	<div id="r_TURNO_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_TURNO_FUNCIONARIO" for="x_TURNO_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->TURNO_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->TURNO_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_TURNO_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_TURNO_FUNCIONARIO" name="x_TURNO_FUNCIONARIO" id="x_TURNO_FUNCIONARIO" size="30" maxlength="30" placeholder="<?php echo ew_HtmlEncode($funcionario->TURNO_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->TURNO_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->TURNO_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->TURNO_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->CARGO_FUNCIONARIO->Visible) { // CARGO_FUNCIONARIO ?>
	<div id="r_CARGO_FUNCIONARIO" class="form-group">
		<label id="elh_funcionario_CARGO_FUNCIONARIO" for="x_CARGO_FUNCIONARIO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->CARGO_FUNCIONARIO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->CARGO_FUNCIONARIO->CellAttributes() ?>>
<span id="el_funcionario_CARGO_FUNCIONARIO">
<input type="text" data-table="funcionario" data-field="x_CARGO_FUNCIONARIO" name="x_CARGO_FUNCIONARIO" id="x_CARGO_FUNCIONARIO" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($funcionario->CARGO_FUNCIONARIO->getPlaceHolder()) ?>" value="<?php echo $funcionario->CARGO_FUNCIONARIO->EditValue ?>"<?php echo $funcionario->CARGO_FUNCIONARIO->EditAttributes() ?>>
</span>
<?php echo $funcionario->CARGO_FUNCIONARIO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
	<div id="r_ID_NIVEL_ACESSO" class="form-group">
		<label id="elh_funcionario_ID_NIVEL_ACESSO" for="x_ID_NIVEL_ACESSO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->ID_NIVEL_ACESSO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el_funcionario_ID_NIVEL_ACESSO">
<input type="text" data-table="funcionario" data-field="x_ID_NIVEL_ACESSO" name="x_ID_NIVEL_ACESSO" id="x_ID_NIVEL_ACESSO" size="30" placeholder="<?php echo ew_HtmlEncode($funcionario->ID_NIVEL_ACESSO->getPlaceHolder()) ?>" value="<?php echo $funcionario->ID_NIVEL_ACESSO->EditValue ?>"<?php echo $funcionario->ID_NIVEL_ACESSO->EditAttributes() ?>>
</span>
<?php echo $funcionario->ID_NIVEL_ACESSO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->MASP->Visible) { // MASP ?>
	<div id="r_MASP" class="form-group">
		<label id="elh_funcionario_MASP" for="x_MASP" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->MASP->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->MASP->CellAttributes() ?>>
<span id="el_funcionario_MASP">
<input type="text" data-table="funcionario" data-field="x_MASP" name="x_MASP" id="x_MASP" size="30" maxlength="25" placeholder="<?php echo ew_HtmlEncode($funcionario->MASP->getPlaceHolder()) ?>" value="<?php echo $funcionario->MASP->EditValue ?>"<?php echo $funcionario->MASP->EditAttributes() ?>>
</span>
<?php echo $funcionario->MASP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
	<div id="r_NUMERO_LIVROS" class="form-group">
		<label id="elh_funcionario_NUMERO_LIVROS" for="x_NUMERO_LIVROS" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->NUMERO_LIVROS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->NUMERO_LIVROS->CellAttributes() ?>>
<span id="el_funcionario_NUMERO_LIVROS">
<input type="text" data-table="funcionario" data-field="x_NUMERO_LIVROS" name="x_NUMERO_LIVROS" id="x_NUMERO_LIVROS" size="30" placeholder="<?php echo ew_HtmlEncode($funcionario->NUMERO_LIVROS->getPlaceHolder()) ?>" value="<?php echo $funcionario->NUMERO_LIVROS->EditValue ?>"<?php echo $funcionario->NUMERO_LIVROS->EditAttributes() ?>>
</span>
<?php echo $funcionario->NUMERO_LIVROS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($funcionario->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
	<div id="r_FREQUENCIA_LIVRO" class="form-group">
		<label id="elh_funcionario_FREQUENCIA_LIVRO" for="x_FREQUENCIA_LIVRO" class="<?php echo $funcionario_add->LeftColumnClass ?>"><?php echo $funcionario->FREQUENCIA_LIVRO->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="<?php echo $funcionario_add->RightColumnClass ?>"><div<?php echo $funcionario->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el_funcionario_FREQUENCIA_LIVRO">
<input type="text" data-table="funcionario" data-field="x_FREQUENCIA_LIVRO" name="x_FREQUENCIA_LIVRO" id="x_FREQUENCIA_LIVRO" size="30" placeholder="<?php echo ew_HtmlEncode($funcionario->FREQUENCIA_LIVRO->getPlaceHolder()) ?>" value="<?php echo $funcionario->FREQUENCIA_LIVRO->EditValue ?>"<?php echo $funcionario->FREQUENCIA_LIVRO->EditAttributes() ?>>
</span>
<?php echo $funcionario->FREQUENCIA_LIVRO->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$funcionario_add->IsModal) { ?>
<div class="form-group"><!-- buttons .form-group -->
	<div class="<?php echo $funcionario_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $funcionario_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script type="text/javascript">
ffuncionarioadd.Init();
</script>
<?php
$funcionario_add->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$funcionario_add->Page_Terminate();
?>
