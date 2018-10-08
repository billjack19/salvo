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

$livro_view = NULL; // Initialize page object first

class clivro_view extends clivro {

	// Page ID
	var $PageID = 'view';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'livro';

	// Page object name
	var $PageObjName = 'livro_view';

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

		// Table object (livro)
		if (!isset($GLOBALS["livro"]) || get_class($GLOBALS["livro"]) == "clivro") {
			$GLOBALS["livro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["livro"];
		}
		$KeyUrl = "";
		if (@$_GET["ID_LIVRO"] <> "") {
			$this->RecKey["ID_LIVRO"] = $_GET["ID_LIVRO"];
			$KeyUrl .= "&amp;ID_LIVRO=" . urlencode($this->RecKey["ID_LIVRO"]);
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
			define("EW_TABLE_NAME", 'livro', TRUE);

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
		$this->ID_LIVRO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_LIVRO->Visible = FALSE;
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
			if (@$_GET["ID_LIVRO"] <> "") {
				$this->ID_LIVRO->setQueryStringValue($_GET["ID_LIVRO"]);
				$this->RecKey["ID_LIVRO"] = $this->ID_LIVRO->QueryStringValue;
			} elseif (@$_POST["ID_LIVRO"] <> "") {
				$this->ID_LIVRO->setFormValue($_POST["ID_LIVRO"]);
				$this->RecKey["ID_LIVRO"] = $this->ID_LIVRO->FormValue;
			} else {
				$sReturnUrl = "livrolist.php"; // Return to list
			}

			// Get action
			$this->CurrentAction = "I"; // Display form
			switch ($this->CurrentAction) {
				case "I": // Get a record to display
					if (!$this->LoadRow()) { // Load record based on key
						if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "")
							$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "livrolist.php"; // No matching record, return to list
					}
			}
		} else {
			$sReturnUrl = "livrolist.php"; // Not page request, return to list
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
		$row = array();
		$row['ID_LIVRO'] = NULL;
		$row['CODIGO_LIVRO'] = NULL;
		$row['ISBN'] = NULL;
		$row['NOME_LIVRO'] = NULL;
		$row['AUTOR_LIVRO'] = NULL;
		$row['TEMA_LIVRO'] = NULL;
		$row['ANO_LIVRO'] = NULL;
		$row['MATERIA_LIVRO'] = NULL;
		$row['ESTANTE_LIVRO'] = NULL;
		$row['PRATELEIRA_LIVRO'] = NULL;
		$row['EDITORA_LIVRO'] = NULL;
		$row['EDICAO_LIVRO'] = NULL;
		$row['IDIOMA_LIVRO'] = NULL;
		$row['PRAZO_LIVRO'] = NULL;
		$row['STATUS_LIVRO'] = NULL;
		$row['FREQUENCIA_LIVRO'] = NULL;
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

			// ID_LIVRO
			$this->ID_LIVRO->LinkCustomAttributes = "";
			$this->ID_LIVRO->HrefValue = "";
			$this->ID_LIVRO->TooltipValue = "";

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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("livrolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($livro_view)) $livro_view = new clivro_view();

// Page init
$livro_view->Page_Init();

// Page main
$livro_view->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$livro_view->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "view";
var CurrentForm = flivroview = new ew_Form("flivroview", "view");

// Form_CustomValidate event
flivroview.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
flivroview.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<div class="ewToolbar">
<?php $livro_view->ExportOptions->Render("body") ?>
<?php
	foreach ($livro_view->OtherOptions as &$option)
		$option->Render("body");
?>
<div class="clearfix"></div>
</div>
<?php $livro_view->ShowPageHeader(); ?>
<?php
$livro_view->ShowMessage();
?>
<form name="flivroview" id="flivroview" class="form-inline ewForm ewViewForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($livro_view->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $livro_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="livro">
<input type="hidden" name="modal" value="<?php echo intval($livro_view->IsModal) ?>">
<table class="table table-striped table-bordered table-hover table-condensed ewViewTable">
<?php if ($livro->ID_LIVRO->Visible) { // ID_LIVRO ?>
	<tr id="r_ID_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_ID_LIVRO"><?php echo $livro->ID_LIVRO->FldCaption() ?></span></td>
		<td data-name="ID_LIVRO"<?php echo $livro->ID_LIVRO->CellAttributes() ?>>
<span id="el_livro_ID_LIVRO">
<span<?php echo $livro->ID_LIVRO->ViewAttributes() ?>>
<?php echo $livro->ID_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->CODIGO_LIVRO->Visible) { // CODIGO_LIVRO ?>
	<tr id="r_CODIGO_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_CODIGO_LIVRO"><?php echo $livro->CODIGO_LIVRO->FldCaption() ?></span></td>
		<td data-name="CODIGO_LIVRO"<?php echo $livro->CODIGO_LIVRO->CellAttributes() ?>>
<span id="el_livro_CODIGO_LIVRO">
<span<?php echo $livro->CODIGO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->CODIGO_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->ISBN->Visible) { // ISBN ?>
	<tr id="r_ISBN">
		<td class="col-sm-2"><span id="elh_livro_ISBN"><?php echo $livro->ISBN->FldCaption() ?></span></td>
		<td data-name="ISBN"<?php echo $livro->ISBN->CellAttributes() ?>>
<span id="el_livro_ISBN">
<span<?php echo $livro->ISBN->ViewAttributes() ?>>
<?php echo $livro->ISBN->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->NOME_LIVRO->Visible) { // NOME_LIVRO ?>
	<tr id="r_NOME_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_NOME_LIVRO"><?php echo $livro->NOME_LIVRO->FldCaption() ?></span></td>
		<td data-name="NOME_LIVRO"<?php echo $livro->NOME_LIVRO->CellAttributes() ?>>
<span id="el_livro_NOME_LIVRO">
<span<?php echo $livro->NOME_LIVRO->ViewAttributes() ?>>
<?php echo $livro->NOME_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->AUTOR_LIVRO->Visible) { // AUTOR_LIVRO ?>
	<tr id="r_AUTOR_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_AUTOR_LIVRO"><?php echo $livro->AUTOR_LIVRO->FldCaption() ?></span></td>
		<td data-name="AUTOR_LIVRO"<?php echo $livro->AUTOR_LIVRO->CellAttributes() ?>>
<span id="el_livro_AUTOR_LIVRO">
<span<?php echo $livro->AUTOR_LIVRO->ViewAttributes() ?>>
<?php echo $livro->AUTOR_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->TEMA_LIVRO->Visible) { // TEMA_LIVRO ?>
	<tr id="r_TEMA_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_TEMA_LIVRO"><?php echo $livro->TEMA_LIVRO->FldCaption() ?></span></td>
		<td data-name="TEMA_LIVRO"<?php echo $livro->TEMA_LIVRO->CellAttributes() ?>>
<span id="el_livro_TEMA_LIVRO">
<span<?php echo $livro->TEMA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->TEMA_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->ANO_LIVRO->Visible) { // ANO_LIVRO ?>
	<tr id="r_ANO_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_ANO_LIVRO"><?php echo $livro->ANO_LIVRO->FldCaption() ?></span></td>
		<td data-name="ANO_LIVRO"<?php echo $livro->ANO_LIVRO->CellAttributes() ?>>
<span id="el_livro_ANO_LIVRO">
<span<?php echo $livro->ANO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->ANO_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->MATERIA_LIVRO->Visible) { // MATERIA_LIVRO ?>
	<tr id="r_MATERIA_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_MATERIA_LIVRO"><?php echo $livro->MATERIA_LIVRO->FldCaption() ?></span></td>
		<td data-name="MATERIA_LIVRO"<?php echo $livro->MATERIA_LIVRO->CellAttributes() ?>>
<span id="el_livro_MATERIA_LIVRO">
<span<?php echo $livro->MATERIA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->MATERIA_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->ESTANTE_LIVRO->Visible) { // ESTANTE_LIVRO ?>
	<tr id="r_ESTANTE_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_ESTANTE_LIVRO"><?php echo $livro->ESTANTE_LIVRO->FldCaption() ?></span></td>
		<td data-name="ESTANTE_LIVRO"<?php echo $livro->ESTANTE_LIVRO->CellAttributes() ?>>
<span id="el_livro_ESTANTE_LIVRO">
<span<?php echo $livro->ESTANTE_LIVRO->ViewAttributes() ?>>
<?php echo $livro->ESTANTE_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->PRATELEIRA_LIVRO->Visible) { // PRATELEIRA_LIVRO ?>
	<tr id="r_PRATELEIRA_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_PRATELEIRA_LIVRO"><?php echo $livro->PRATELEIRA_LIVRO->FldCaption() ?></span></td>
		<td data-name="PRATELEIRA_LIVRO"<?php echo $livro->PRATELEIRA_LIVRO->CellAttributes() ?>>
<span id="el_livro_PRATELEIRA_LIVRO">
<span<?php echo $livro->PRATELEIRA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->PRATELEIRA_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->EDITORA_LIVRO->Visible) { // EDITORA_LIVRO ?>
	<tr id="r_EDITORA_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_EDITORA_LIVRO"><?php echo $livro->EDITORA_LIVRO->FldCaption() ?></span></td>
		<td data-name="EDITORA_LIVRO"<?php echo $livro->EDITORA_LIVRO->CellAttributes() ?>>
<span id="el_livro_EDITORA_LIVRO">
<span<?php echo $livro->EDITORA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->EDITORA_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->EDICAO_LIVRO->Visible) { // EDICAO_LIVRO ?>
	<tr id="r_EDICAO_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_EDICAO_LIVRO"><?php echo $livro->EDICAO_LIVRO->FldCaption() ?></span></td>
		<td data-name="EDICAO_LIVRO"<?php echo $livro->EDICAO_LIVRO->CellAttributes() ?>>
<span id="el_livro_EDICAO_LIVRO">
<span<?php echo $livro->EDICAO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->EDICAO_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->IDIOMA_LIVRO->Visible) { // IDIOMA_LIVRO ?>
	<tr id="r_IDIOMA_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_IDIOMA_LIVRO"><?php echo $livro->IDIOMA_LIVRO->FldCaption() ?></span></td>
		<td data-name="IDIOMA_LIVRO"<?php echo $livro->IDIOMA_LIVRO->CellAttributes() ?>>
<span id="el_livro_IDIOMA_LIVRO">
<span<?php echo $livro->IDIOMA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->IDIOMA_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->PRAZO_LIVRO->Visible) { // PRAZO_LIVRO ?>
	<tr id="r_PRAZO_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_PRAZO_LIVRO"><?php echo $livro->PRAZO_LIVRO->FldCaption() ?></span></td>
		<td data-name="PRAZO_LIVRO"<?php echo $livro->PRAZO_LIVRO->CellAttributes() ?>>
<span id="el_livro_PRAZO_LIVRO">
<span<?php echo $livro->PRAZO_LIVRO->ViewAttributes() ?>>
<?php echo $livro->PRAZO_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->STATUS_LIVRO->Visible) { // STATUS_LIVRO ?>
	<tr id="r_STATUS_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_STATUS_LIVRO"><?php echo $livro->STATUS_LIVRO->FldCaption() ?></span></td>
		<td data-name="STATUS_LIVRO"<?php echo $livro->STATUS_LIVRO->CellAttributes() ?>>
<span id="el_livro_STATUS_LIVRO">
<span<?php echo $livro->STATUS_LIVRO->ViewAttributes() ?>>
<?php echo $livro->STATUS_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($livro->FREQUENCIA_LIVRO->Visible) { // FREQUENCIA_LIVRO ?>
	<tr id="r_FREQUENCIA_LIVRO">
		<td class="col-sm-2"><span id="elh_livro_FREQUENCIA_LIVRO"><?php echo $livro->FREQUENCIA_LIVRO->FldCaption() ?></span></td>
		<td data-name="FREQUENCIA_LIVRO"<?php echo $livro->FREQUENCIA_LIVRO->CellAttributes() ?>>
<span id="el_livro_FREQUENCIA_LIVRO">
<span<?php echo $livro->FREQUENCIA_LIVRO->ViewAttributes() ?>>
<?php echo $livro->FREQUENCIA_LIVRO->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<script type="text/javascript">
flivroview.Init();
</script>
<?php
$livro_view->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$livro_view->Page_Terminate();
?>
