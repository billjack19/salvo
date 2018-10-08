<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg14.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql14.php") ?>
<?php include_once "phpfn14.php" ?>
<?php include_once "emprestimo_livroinfo.php" ?>
<?php include_once "userfn14.php" ?>
<?php

//
// Page class
//

$emprestimo_livro_delete = NULL; // Initialize page object first

class cemprestimo_livro_delete extends cemprestimo_livro {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'emprestimo_livro';

	// Page object name
	var $PageObjName = 'emprestimo_livro_delete';

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

		// Table object (emprestimo_livro)
		if (!isset($GLOBALS["emprestimo_livro"]) || get_class($GLOBALS["emprestimo_livro"]) == "cemprestimo_livro") {
			$GLOBALS["emprestimo_livro"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["emprestimo_livro"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'emprestimo_livro', TRUE);

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
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
		$this->ID_EMPRESTIMO_LIVRO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_EMPRESTIMO_LIVRO->Visible = FALSE;
		$this->ID_LIVRO->SetVisibility();
		$this->ID_ALUNO->SetVisibility();
		$this->ID_CADASTRO->SetVisibility();
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->SetVisibility();
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->SetVisibility();
		$this->STATUS_EMPRESTIMO->SetVisibility();

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
		global $EW_EXPORT, $emprestimo_livro;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($emprestimo_livro);
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
			ew_SaveDebugMsg();
			header("Location: " . $url);
		}
		exit();
	}
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $StartRec;
	var $TotalRecs = 0;
	var $RecCnt;
	var $RecKeys = array();
	var $Recordset;
	var $StartRowCnt = 1;
	var $RowCnt = 0;

	//
	// Page main
	//
	function Page_Main() {
		global $Language;

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->GetRecordKeys(); // Load record keys
		$sFilter = $this->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("emprestimo_livrolist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in emprestimo_livro class, emprestimo_livroinfo.php

		$this->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$this->CurrentAction = $_POST["a_delete"];
		} elseif (@$_GET["a_delete"] == "1") {
			$this->CurrentAction = "D"; // Delete record directly
		} else {
			$this->CurrentAction = "I"; // Display record
		}
		if ($this->CurrentAction == "D") {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->DeleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
				$this->Page_Terminate($this->getReturnUrl()); // Return to caller
			} else { // Delete failed
				$this->CurrentAction = "I"; // Display record
			}
		}
		if ($this->CurrentAction == "I") { // Load records for display
			if ($this->Recordset = $this->LoadRecordset())
				$this->TotalRecs = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecs <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->Close();
				$this->Page_Terminate("emprestimo_livrolist.php"); // Return to list
			}
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {

		// Load List page SQL
		$sSql = $this->ListSQL();
		$conn = &$this->Connection();

		// Load recordset
		$dbtype = ew_GetConnectionType($this->DBID);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->SelectLimit($sSql, $rowcnt, $offset, array("_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())));
			} else {
				$rs = $conn->SelectLimit($sSql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = ew_LoadRecordset($sSql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$this->ID_EMPRESTIMO_LIVRO->setDbValue($row['ID_EMPRESTIMO_LIVRO']);
		$this->ID_LIVRO->setDbValue($row['ID_LIVRO']);
		$this->ID_ALUNO->setDbValue($row['ID_ALUNO']);
		$this->ID_CADASTRO->setDbValue($row['ID_CADASTRO']);
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->setDbValue($row['DATA_INICIAL_EMPRESTIMO_LIVRO']);
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->setDbValue($row['DATA_FINAL_EMPRESTIMO_LIVRO']);
		$this->STATUS_EMPRESTIMO->setDbValue($row['STATUS_EMPRESTIMO']);
	}

	// Return a row with default values
	function NewRow() {
		$row = array();
		$row['ID_EMPRESTIMO_LIVRO'] = NULL;
		$row['ID_LIVRO'] = NULL;
		$row['ID_ALUNO'] = NULL;
		$row['ID_CADASTRO'] = NULL;
		$row['DATA_INICIAL_EMPRESTIMO_LIVRO'] = NULL;
		$row['DATA_FINAL_EMPRESTIMO_LIVRO'] = NULL;
		$row['STATUS_EMPRESTIMO'] = NULL;
		return $row;
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ID_EMPRESTIMO_LIVRO->DbValue = $row['ID_EMPRESTIMO_LIVRO'];
		$this->ID_LIVRO->DbValue = $row['ID_LIVRO'];
		$this->ID_ALUNO->DbValue = $row['ID_ALUNO'];
		$this->ID_CADASTRO->DbValue = $row['ID_CADASTRO'];
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->DbValue = $row['DATA_INICIAL_EMPRESTIMO_LIVRO'];
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->DbValue = $row['DATA_FINAL_EMPRESTIMO_LIVRO'];
		$this->STATUS_EMPRESTIMO->DbValue = $row['STATUS_EMPRESTIMO'];
	}

	// Render row values based on field settings
	function RenderRow() {
		global $Security, $Language, $gsLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// ID_EMPRESTIMO_LIVRO
		// ID_LIVRO
		// ID_ALUNO
		// ID_CADASTRO
		// DATA_INICIAL_EMPRESTIMO_LIVRO
		// DATA_FINAL_EMPRESTIMO_LIVRO
		// STATUS_EMPRESTIMO

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// ID_EMPRESTIMO_LIVRO
		$this->ID_EMPRESTIMO_LIVRO->ViewValue = $this->ID_EMPRESTIMO_LIVRO->CurrentValue;
		$this->ID_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// ID_LIVRO
		$this->ID_LIVRO->ViewValue = $this->ID_LIVRO->CurrentValue;
		$this->ID_LIVRO->ViewCustomAttributes = "";

		// ID_ALUNO
		$this->ID_ALUNO->ViewValue = $this->ID_ALUNO->CurrentValue;
		$this->ID_ALUNO->ViewCustomAttributes = "";

		// ID_CADASTRO
		$this->ID_CADASTRO->ViewValue = $this->ID_CADASTRO->CurrentValue;
		$this->ID_CADASTRO->ViewCustomAttributes = "";

		// DATA_INICIAL_EMPRESTIMO_LIVRO
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->ViewValue = $this->DATA_INICIAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_INICIAL_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// DATA_FINAL_EMPRESTIMO_LIVRO
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->ViewValue = $this->DATA_FINAL_EMPRESTIMO_LIVRO->CurrentValue;
		$this->DATA_FINAL_EMPRESTIMO_LIVRO->ViewCustomAttributes = "";

		// STATUS_EMPRESTIMO
		$this->STATUS_EMPRESTIMO->ViewValue = $this->STATUS_EMPRESTIMO->CurrentValue;
		$this->STATUS_EMPRESTIMO->ViewCustomAttributes = "";

			// ID_EMPRESTIMO_LIVRO
			$this->ID_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->ID_EMPRESTIMO_LIVRO->HrefValue = "";
			$this->ID_EMPRESTIMO_LIVRO->TooltipValue = "";

			// ID_LIVRO
			$this->ID_LIVRO->LinkCustomAttributes = "";
			$this->ID_LIVRO->HrefValue = "";
			$this->ID_LIVRO->TooltipValue = "";

			// ID_ALUNO
			$this->ID_ALUNO->LinkCustomAttributes = "";
			$this->ID_ALUNO->HrefValue = "";
			$this->ID_ALUNO->TooltipValue = "";

			// ID_CADASTRO
			$this->ID_CADASTRO->LinkCustomAttributes = "";
			$this->ID_CADASTRO->HrefValue = "";
			$this->ID_CADASTRO->TooltipValue = "";

			// DATA_INICIAL_EMPRESTIMO_LIVRO
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->HrefValue = "";
			$this->DATA_INICIAL_EMPRESTIMO_LIVRO->TooltipValue = "";

			// DATA_FINAL_EMPRESTIMO_LIVRO
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->LinkCustomAttributes = "";
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->HrefValue = "";
			$this->DATA_FINAL_EMPRESTIMO_LIVRO->TooltipValue = "";

			// STATUS_EMPRESTIMO
			$this->STATUS_EMPRESTIMO->LinkCustomAttributes = "";
			$this->STATUS_EMPRESTIMO->HrefValue = "";
			$this->STATUS_EMPRESTIMO->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $Language, $Security;
		$DeleteRows = TRUE;
		$sSql = $this->SQL();
		$conn = &$this->Connection();
		$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->GetRows() : array();
		$conn->BeginTrans();

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $this->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= $GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"];
				$sThisKey .= $row['ID_EMPRESTIMO_LIVRO'];
				$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
				$DeleteRows = $this->Delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		}
		if (!$DeleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$url = substr(ew_CurrentUrl(), strrpos(ew_CurrentUrl(), "/")+1);
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("emprestimo_livrolist.php"), "", $this->TableVar, TRUE);
		$PageId = "delete";
		$Breadcrumb->Add("delete", $PageId, $url);
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
}
?>
<?php ew_Header(TRUE) ?>
<?php

// Create page object
if (!isset($emprestimo_livro_delete)) $emprestimo_livro_delete = new cemprestimo_livro_delete();

// Page init
$emprestimo_livro_delete->Page_Init();

// Page main
$emprestimo_livro_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$emprestimo_livro_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "delete";
var CurrentForm = femprestimo_livrodelete = new ew_Form("femprestimo_livrodelete", "delete");

// Form_CustomValidate event
femprestimo_livrodelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
femprestimo_livrodelete.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $emprestimo_livro_delete->ShowPageHeader(); ?>
<?php
$emprestimo_livro_delete->ShowMessage();
?>
<form name="femprestimo_livrodelete" id="femprestimo_livrodelete" class="form-inline ewForm ewDeleteForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($emprestimo_livro_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $emprestimo_livro_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="emprestimo_livro">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($emprestimo_livro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="box ewBox ewGrid">
<div class="<?php if (ew_IsResponsiveLayout()) { ?>table-responsive <?php } ?>ewGridMiddlePanel">
<table class="table ewTable">
	<thead>
	<tr class="ewTableHeader">
<?php if ($emprestimo_livro->ID_EMPRESTIMO_LIVRO->Visible) { // ID_EMPRESTIMO_LIVRO ?>
		<th class="<?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->HeaderCellClass() ?>"><span id="elh_emprestimo_livro_ID_EMPRESTIMO_LIVRO" class="emprestimo_livro_ID_EMPRESTIMO_LIVRO"><?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($emprestimo_livro->ID_LIVRO->Visible) { // ID_LIVRO ?>
		<th class="<?php echo $emprestimo_livro->ID_LIVRO->HeaderCellClass() ?>"><span id="elh_emprestimo_livro_ID_LIVRO" class="emprestimo_livro_ID_LIVRO"><?php echo $emprestimo_livro->ID_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($emprestimo_livro->ID_ALUNO->Visible) { // ID_ALUNO ?>
		<th class="<?php echo $emprestimo_livro->ID_ALUNO->HeaderCellClass() ?>"><span id="elh_emprestimo_livro_ID_ALUNO" class="emprestimo_livro_ID_ALUNO"><?php echo $emprestimo_livro->ID_ALUNO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($emprestimo_livro->ID_CADASTRO->Visible) { // ID_CADASTRO ?>
		<th class="<?php echo $emprestimo_livro->ID_CADASTRO->HeaderCellClass() ?>"><span id="elh_emprestimo_livro_ID_CADASTRO" class="emprestimo_livro_ID_CADASTRO"><?php echo $emprestimo_livro->ID_CADASTRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->Visible) { // DATA_INICIAL_EMPRESTIMO_LIVRO ?>
		<th class="<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->HeaderCellClass() ?>"><span id="elh_emprestimo_livro_DATA_INICIAL_EMPRESTIMO_LIVRO" class="emprestimo_livro_DATA_INICIAL_EMPRESTIMO_LIVRO"><?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->Visible) { // DATA_FINAL_EMPRESTIMO_LIVRO ?>
		<th class="<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->HeaderCellClass() ?>"><span id="elh_emprestimo_livro_DATA_FINAL_EMPRESTIMO_LIVRO" class="emprestimo_livro_DATA_FINAL_EMPRESTIMO_LIVRO"><?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($emprestimo_livro->STATUS_EMPRESTIMO->Visible) { // STATUS_EMPRESTIMO ?>
		<th class="<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->HeaderCellClass() ?>"><span id="elh_emprestimo_livro_STATUS_EMPRESTIMO" class="emprestimo_livro_STATUS_EMPRESTIMO"><?php echo $emprestimo_livro->STATUS_EMPRESTIMO->FldCaption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$emprestimo_livro_delete->RecCnt = 0;
$i = 0;
while (!$emprestimo_livro_delete->Recordset->EOF) {
	$emprestimo_livro_delete->RecCnt++;
	$emprestimo_livro_delete->RowCnt++;

	// Set row properties
	$emprestimo_livro->ResetAttrs();
	$emprestimo_livro->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$emprestimo_livro_delete->LoadRowValues($emprestimo_livro_delete->Recordset);

	// Render row
	$emprestimo_livro_delete->RenderRow();
?>
	<tr<?php echo $emprestimo_livro->RowAttributes() ?>>
<?php if ($emprestimo_livro->ID_EMPRESTIMO_LIVRO->Visible) { // ID_EMPRESTIMO_LIVRO ?>
		<td<?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $emprestimo_livro_delete->RowCnt ?>_emprestimo_livro_ID_EMPRESTIMO_LIVRO" class="emprestimo_livro_ID_EMPRESTIMO_LIVRO">
<span<?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->ViewAttributes() ?>>
<?php echo $emprestimo_livro->ID_EMPRESTIMO_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($emprestimo_livro->ID_LIVRO->Visible) { // ID_LIVRO ?>
		<td<?php echo $emprestimo_livro->ID_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $emprestimo_livro_delete->RowCnt ?>_emprestimo_livro_ID_LIVRO" class="emprestimo_livro_ID_LIVRO">
<span<?php echo $emprestimo_livro->ID_LIVRO->ViewAttributes() ?>>
<?php echo $emprestimo_livro->ID_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($emprestimo_livro->ID_ALUNO->Visible) { // ID_ALUNO ?>
		<td<?php echo $emprestimo_livro->ID_ALUNO->CellAttributes() ?>>
<span id="el<?php echo $emprestimo_livro_delete->RowCnt ?>_emprestimo_livro_ID_ALUNO" class="emprestimo_livro_ID_ALUNO">
<span<?php echo $emprestimo_livro->ID_ALUNO->ViewAttributes() ?>>
<?php echo $emprestimo_livro->ID_ALUNO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($emprestimo_livro->ID_CADASTRO->Visible) { // ID_CADASTRO ?>
		<td<?php echo $emprestimo_livro->ID_CADASTRO->CellAttributes() ?>>
<span id="el<?php echo $emprestimo_livro_delete->RowCnt ?>_emprestimo_livro_ID_CADASTRO" class="emprestimo_livro_ID_CADASTRO">
<span<?php echo $emprestimo_livro->ID_CADASTRO->ViewAttributes() ?>>
<?php echo $emprestimo_livro->ID_CADASTRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->Visible) { // DATA_INICIAL_EMPRESTIMO_LIVRO ?>
		<td<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $emprestimo_livro_delete->RowCnt ?>_emprestimo_livro_DATA_INICIAL_EMPRESTIMO_LIVRO" class="emprestimo_livro_DATA_INICIAL_EMPRESTIMO_LIVRO">
<span<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->ViewAttributes() ?>>
<?php echo $emprestimo_livro->DATA_INICIAL_EMPRESTIMO_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->Visible) { // DATA_FINAL_EMPRESTIMO_LIVRO ?>
		<td<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->CellAttributes() ?>>
<span id="el<?php echo $emprestimo_livro_delete->RowCnt ?>_emprestimo_livro_DATA_FINAL_EMPRESTIMO_LIVRO" class="emprestimo_livro_DATA_FINAL_EMPRESTIMO_LIVRO">
<span<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->ViewAttributes() ?>>
<?php echo $emprestimo_livro->DATA_FINAL_EMPRESTIMO_LIVRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($emprestimo_livro->STATUS_EMPRESTIMO->Visible) { // STATUS_EMPRESTIMO ?>
		<td<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->CellAttributes() ?>>
<span id="el<?php echo $emprestimo_livro_delete->RowCnt ?>_emprestimo_livro_STATUS_EMPRESTIMO" class="emprestimo_livro_STATUS_EMPRESTIMO">
<span<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->ViewAttributes() ?>>
<?php echo $emprestimo_livro->STATUS_EMPRESTIMO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$emprestimo_livro_delete->Recordset->MoveNext();
}
$emprestimo_livro_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $emprestimo_livro_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<script type="text/javascript">
femprestimo_livrodelete.Init();
</script>
<?php
$emprestimo_livro_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$emprestimo_livro_delete->Page_Terminate();
?>
