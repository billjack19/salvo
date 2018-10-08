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

$aluno_view = NULL; // Initialize page object first

class caluno_view extends caluno {

	// Page ID
	var $PageID = 'view';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'aluno';

	// Page object name
	var $PageObjName = 'aluno_view';

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
		$KeyUrl = "";
		if (@$_GET["ID_ALUNO"] <> "") {
			$this->RecKey["ID_ALUNO"] = $_GET["ID_ALUNO"];
			$KeyUrl .= "&amp;ID_ALUNO=" . urlencode($this->RecKey["ID_ALUNO"]);
		}
		$this->ExportPrintUrl = $this->PageUrl() . "export=print" . $KeyUrl;
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html" . $KeyUrl;
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel" . $KeyUrl;
		$this->ExportWordUrl = $this->PageUrl() . "export=word" . $KeyUrl;
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml" . $KeyUrl;
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv" . $KeyUrl;
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf" . $KeyUrl;

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

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

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ewExportOption";

		// Other options
		$this->OtherOptions['action'] = new cListOptions();
		$this->OtherOptions['action']->Tag = "div";
		$this->OtherOptions['action']->TagClassName = "ewActionOption";
		$this->OtherOptions['detail'] = new cListOptions();
		$this->OtherOptions['detail']->Tag = "div";
		$this->OtherOptions['detail']->TagClassName = "ewDetailOption";
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsCustomExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;

		// Is modal
		$this->IsModal = (@$_GET["modal"] == "1" || @$_POST["modal"] == "1");
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
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
	var $ExportOptions; // Export options
	var $OtherOptions = array(); // Other options
	var $DisplayRecs = 1;
	var $DbMasterFilter;
	var $DbDetailFilter;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $RecCnt;
	var $RecKey = array();
	var $IsModal = FALSE;
	var $Recordset;

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $gbSkipHeaderFooter, $EW_EXPORT;

		// Check modal
		if ($this->IsModal)
			$gbSkipHeaderFooter = TRUE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["ID_ALUNO"] <> "") {
				$this->ID_ALUNO->setQueryStringValue($_GET["ID_ALUNO"]);
				$this->RecKey["ID_ALUNO"] = $this->ID_ALUNO->QueryStringValue;
			} elseif (@$_POST["ID_ALUNO"] <> "") {
				$this->ID_ALUNO->setFormValue($_POST["ID_ALUNO"]);
				$this->RecKey["ID_ALUNO"] = $this->ID_ALUNO->FormValue;
			} else {
				$sReturnUrl = "alunolist.php"; // Return to list
			}

			// Get action
			$this->CurrentAction = "I"; // Display form
			switch ($this->CurrentAction) {
				case "I": // Get a record to display
					if (!$this->LoadRow()) { // Load record based on key
						if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "")
							$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "alunolist.php"; // No matching record, return to list
					}
			}
		} else {
			$sReturnUrl = "alunolist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Set up Breadcrumb
		if ($this->Export == "")
			$this->SetupBreadcrumb();

		// Render row
		$this->RowType = EW_ROWTYPE_VIEW;
		$this->ResetAttrs();
		$this->RenderRow();
	}

	// Set up other options
	function SetupOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = &$options["action"];

		// Add
		$item = &$option->Add("add");
		$addcaption = ew_HtmlTitle($Language->Phrase("ViewPageAddLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ewAction ewAdd\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"javascript:void(0);\" onclick=\"ew_ModalDialogShow({lnk:this,url:'" . ew_HtmlEncode($this->AddUrl) . "'});\">" . $Language->Phrase("ViewPageAddLink") . "</a>";
		else
			$item->Body = "<a class=\"ewAction ewAdd\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . ew_HtmlEncode($this->AddUrl) . "\">" . $Language->Phrase("ViewPageAddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "");

		// Edit
		$item = &$option->Add("edit");
		$editcaption = ew_HtmlTitle($Language->Phrase("ViewPageEditLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ewAction ewEdit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"javascript:void(0);\" onclick=\"ew_ModalDialogShow({lnk:this,url:'" . ew_HtmlEncode($this->EditUrl) . "'});\">" . $Language->Phrase("ViewPageEditLink") . "</a>";
		else
			$item->Body = "<a class=\"ewAction ewEdit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . ew_HtmlEncode($this->EditUrl) . "\">" . $Language->Phrase("ViewPageEditLink") . "</a>";
		$item->Visible = ($this->EditUrl <> "");

		// Copy
		$item = &$option->Add("copy");
		$copycaption = ew_HtmlTitle($Language->Phrase("ViewPageCopyLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ewAction ewCopy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"javascript:void(0);\" onclick=\"ew_ModalDialogShow({lnk:this,btn:'AddBtn',url:'" . ew_HtmlEncode($this->CopyUrl) . "'});\">" . $Language->Phrase("ViewPageCopyLink") . "</a>";
		else
			$item->Body = "<a class=\"ewAction ewCopy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . ew_HtmlEncode($this->CopyUrl) . "\">" . $Language->Phrase("ViewPageCopyLink") . "</a>";
		$item->Visible = ($this->CopyUrl <> "");

		// Delete
		$item = &$option->Add("delete");
		if ($this->IsModal) // Handle as inline delete
			$item->Body = "<a onclick=\"return ew_ConfirmDelete(this);\" class=\"ewAction ewDelete\" title=\"" . ew_HtmlTitle($Language->Phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . ew_HtmlTitle($Language->Phrase("ViewPageDeleteLink")) . "\" href=\"" . ew_HtmlEncode(ew_UrlAddQuery($this->DeleteUrl, "a_delete=1")) . "\">" . $Language->Phrase("ViewPageDeleteLink") . "</a>";
		else
			$item->Body = "<a class=\"ewAction ewDelete\" title=\"" . ew_HtmlTitle($Language->Phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . ew_HtmlTitle($Language->Phrase("ViewPageDeleteLink")) . "\" href=\"" . ew_HtmlEncode($this->DeleteUrl) . "\">" . $Language->Phrase("ViewPageDeleteLink") . "</a>";
		$item->Visible = ($this->DeleteUrl <> "");

		// Set up action default
		$option = &$options["action"];
		$option->DropDownButtonPhrase = $Language->Phrase("ButtonActions");
		$option->UseImageAndText = TRUE;
		$option->UseDropDownButton = FALSE;
		$option->UseButtonGroup = TRUE;
		$item = &$option->Add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
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

	// Render row values based on field settings
	function RenderRow() {
		global $Security, $Language, $gsLanguage;

		// Initialize URLs
		$this->AddUrl = $this->GetAddUrl();
		$this->EditUrl = $this->GetEditUrl();
		$this->CopyUrl = $this->GetCopyUrl();
		$this->DeleteUrl = $this->GetDeleteUrl();
		$this->ListUrl = $this->GetListUrl();
		$this->SetupOtherOptions();

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("alunolist.php"), "", $this->TableVar, TRUE);
		$PageId = "view";
		$Breadcrumb->Add("view", $PageId, $url);
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
if (!isset($aluno_view)) $aluno_view = new caluno_view();

// Page init
$aluno_view->Page_Init();

// Page main
$aluno_view->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aluno_view->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "view";
var CurrentForm = falunoview = new ew_Form("falunoview", "view");

// Form_CustomValidate event
falunoview.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
falunoview.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<div class="ewToolbar">
<?php $aluno_view->ExportOptions->Render("body") ?>
<?php
	foreach ($aluno_view->OtherOptions as &$option)
		$option->Render("body");
?>
<div class="clearfix"></div>
</div>
<?php $aluno_view->ShowPageHeader(); ?>
<?php
$aluno_view->ShowMessage();
?>
<form name="falunoview" id="falunoview" class="form-inline ewForm ewViewForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($aluno_view->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $aluno_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="aluno">
<input type="hidden" name="modal" value="<?php echo intval($aluno_view->IsModal) ?>">
<table class="table table-striped table-bordered table-hover table-condensed ewViewTable">
<?php if ($aluno->ID_ALUNO->Visible) { // ID_ALUNO ?>
	<tr id="r_ID_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_ID_ALUNO"><?php echo $aluno->ID_ALUNO->FldCaption() ?></span></td>
		<td data-name="ID_ALUNO"<?php echo $aluno->ID_ALUNO->CellAttributes() ?>>
<span id="el_aluno_ID_ALUNO">
<span<?php echo $aluno->ID_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->ID_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->NOME_ALUNO->Visible) { // NOME_ALUNO ?>
	<tr id="r_NOME_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_NOME_ALUNO"><?php echo $aluno->NOME_ALUNO->FldCaption() ?></span></td>
		<td data-name="NOME_ALUNO"<?php echo $aluno->NOME_ALUNO->CellAttributes() ?>>
<span id="el_aluno_NOME_ALUNO">
<span<?php echo $aluno->NOME_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->NOME_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->MATRICULA_ALUNO->Visible) { // MATRICULA_ALUNO ?>
	<tr id="r_MATRICULA_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_MATRICULA_ALUNO"><?php echo $aluno->MATRICULA_ALUNO->FldCaption() ?></span></td>
		<td data-name="MATRICULA_ALUNO"<?php echo $aluno->MATRICULA_ALUNO->CellAttributes() ?>>
<span id="el_aluno_MATRICULA_ALUNO">
<span<?php echo $aluno->MATRICULA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->MATRICULA_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->EMAIL_ALUNO->Visible) { // EMAIL_ALUNO ?>
	<tr id="r_EMAIL_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_EMAIL_ALUNO"><?php echo $aluno->EMAIL_ALUNO->FldCaption() ?></span></td>
		<td data-name="EMAIL_ALUNO"<?php echo $aluno->EMAIL_ALUNO->CellAttributes() ?>>
<span id="el_aluno_EMAIL_ALUNO">
<span<?php echo $aluno->EMAIL_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->EMAIL_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->CPF_ALUNO->Visible) { // CPF_ALUNO ?>
	<tr id="r_CPF_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_CPF_ALUNO"><?php echo $aluno->CPF_ALUNO->FldCaption() ?></span></td>
		<td data-name="CPF_ALUNO"<?php echo $aluno->CPF_ALUNO->CellAttributes() ?>>
<span id="el_aluno_CPF_ALUNO">
<span<?php echo $aluno->CPF_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->CPF_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->RG_ALUNO->Visible) { // RG_ALUNO ?>
	<tr id="r_RG_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_RG_ALUNO"><?php echo $aluno->RG_ALUNO->FldCaption() ?></span></td>
		<td data-name="RG_ALUNO"<?php echo $aluno->RG_ALUNO->CellAttributes() ?>>
<span id="el_aluno_RG_ALUNO">
<span<?php echo $aluno->RG_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->RG_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->SEXO_ALUNO->Visible) { // SEXO_ALUNO ?>
	<tr id="r_SEXO_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_SEXO_ALUNO"><?php echo $aluno->SEXO_ALUNO->FldCaption() ?></span></td>
		<td data-name="SEXO_ALUNO"<?php echo $aluno->SEXO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_SEXO_ALUNO">
<span<?php echo $aluno->SEXO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->SEXO_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->DATA_NASCIMENTO_ALUNO->Visible) { // DATA_NASCIMENTO_ALUNO ?>
	<tr id="r_DATA_NASCIMENTO_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_DATA_NASCIMENTO_ALUNO"><?php echo $aluno->DATA_NASCIMENTO_ALUNO->FldCaption() ?></span></td>
		<td data-name="DATA_NASCIMENTO_ALUNO"<?php echo $aluno->DATA_NASCIMENTO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_DATA_NASCIMENTO_ALUNO">
<span<?php echo $aluno->DATA_NASCIMENTO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->DATA_NASCIMENTO_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->TURNO_ALUNO->Visible) { // TURNO_ALUNO ?>
	<tr id="r_TURNO_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_TURNO_ALUNO"><?php echo $aluno->TURNO_ALUNO->FldCaption() ?></span></td>
		<td data-name="TURNO_ALUNO"<?php echo $aluno->TURNO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_TURNO_ALUNO">
<span<?php echo $aluno->TURNO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TURNO_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->TELEFONE_ALUNO->Visible) { // TELEFONE_ALUNO ?>
	<tr id="r_TELEFONE_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_TELEFONE_ALUNO"><?php echo $aluno->TELEFONE_ALUNO->FldCaption() ?></span></td>
		<td data-name="TELEFONE_ALUNO"<?php echo $aluno->TELEFONE_ALUNO->CellAttributes() ?>>
<span id="el_aluno_TELEFONE_ALUNO">
<span<?php echo $aluno->TELEFONE_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TELEFONE_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->RECORD_ALUNO->Visible) { // RECORD_ALUNO ?>
	<tr id="r_RECORD_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_RECORD_ALUNO"><?php echo $aluno->RECORD_ALUNO->FldCaption() ?></span></td>
		<td data-name="RECORD_ALUNO"<?php echo $aluno->RECORD_ALUNO->CellAttributes() ?>>
<span id="el_aluno_RECORD_ALUNO">
<span<?php echo $aluno->RECORD_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->RECORD_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
	<tr id="r_ID_NIVEL_ACESSO">
		<td class="col-sm-2"><span id="elh_aluno_ID_NIVEL_ACESSO"><?php echo $aluno->ID_NIVEL_ACESSO->FldCaption() ?></span></td>
		<td data-name="ID_NIVEL_ACESSO"<?php echo $aluno->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el_aluno_ID_NIVEL_ACESSO">
<span<?php echo $aluno->ID_NIVEL_ACESSO->ViewAttributes() ?>>
<?php echo $aluno->ID_NIVEL_ACESSO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->ANO_ALUNO->Visible) { // ANO_ALUNO ?>
	<tr id="r_ANO_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_ANO_ALUNO"><?php echo $aluno->ANO_ALUNO->FldCaption() ?></span></td>
		<td data-name="ANO_ALUNO"<?php echo $aluno->ANO_ALUNO->CellAttributes() ?>>
<span id="el_aluno_ANO_ALUNO">
<span<?php echo $aluno->ANO_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->ANO_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->TURMA_ALUNO->Visible) { // TURMA_ALUNO ?>
	<tr id="r_TURMA_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_TURMA_ALUNO"><?php echo $aluno->TURMA_ALUNO->FldCaption() ?></span></td>
		<td data-name="TURMA_ALUNO"<?php echo $aluno->TURMA_ALUNO->CellAttributes() ?>>
<span id="el_aluno_TURMA_ALUNO">
<span<?php echo $aluno->TURMA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->TURMA_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->SALA_ALUNO->Visible) { // SALA_ALUNO ?>
	<tr id="r_SALA_ALUNO">
		<td class="col-sm-2"><span id="elh_aluno_SALA_ALUNO"><?php echo $aluno->SALA_ALUNO->FldCaption() ?></span></td>
		<td data-name="SALA_ALUNO"<?php echo $aluno->SALA_ALUNO->CellAttributes() ?>>
<span id="el_aluno_SALA_ALUNO">
<span<?php echo $aluno->SALA_ALUNO->ViewAttributes() ?>>
<?php echo $aluno->SALA_ALUNO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->NUMERO_LIVROS->Visible) { // NUMERO_LIVROS ?>
	<tr id="r_NUMERO_LIVROS">
		<td class="col-sm-2"><span id="elh_aluno_NUMERO_LIVROS"><?php echo $aluno->NUMERO_LIVROS->FldCaption() ?></span></td>
		<td data-name="NUMERO_LIVROS"<?php echo $aluno->NUMERO_LIVROS->CellAttributes() ?>>
<span id="el_aluno_NUMERO_LIVROS">
<span<?php echo $aluno->NUMERO_LIVROS->ViewAttributes() ?>>
<?php echo $aluno->NUMERO_LIVROS->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($aluno->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
	<tr id="r_FREQUENCIA_LIVRO">
		<td class="col-sm-2"><span id="elh_aluno_FREQUENCIA_LIVRO"><?php echo $aluno->FREQUENCIA_LIVRO->FldCaption() ?></span></td>
		<td data-name="FREQUENCIA_LIVRO"<?php echo $aluno->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el_aluno_FREQUENCIA_LIVRO">
<span<?php echo $aluno->FREQUENCIA_LIVRO->ViewAttributes() ?>>
<?php echo $aluno->FREQUENCIA_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<script type="text/javascript">
falunoview.Init();
</script>
<?php
$aluno_view->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$aluno_view->Page_Terminate();
?>
