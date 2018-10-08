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

$ponto_delete = NULL; // Initialize page object first

class cponto_delete extends cponto {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'ponto';

	// Page object name
	var $PageObjName = 'ponto_delete';

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
			define("EW_PAGE_ID", 'delete', TRUE);

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
			$this->Page_Terminate("pontolist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in ponto class, pontoinfo.php

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
				$this->Page_Terminate("pontolist.php"); // Return to list
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
				$sThisKey .= $row['ID_PONTO'];
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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("pontolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($ponto_delete)) $ponto_delete = new cponto_delete();

// Page init
$ponto_delete->Page_Init();

// Page main
$ponto_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ponto_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "delete";
var CurrentForm = fpontodelete = new ew_Form("fpontodelete", "delete");

// Form_CustomValidate event
fpontodelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
fpontodelete.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $ponto_delete->ShowPageHeader(); ?>
<?php
$ponto_delete->ShowMessage();
?>
<form name="fpontodelete" id="fpontodelete" class="form-inline ewForm ewDeleteForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($ponto_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $ponto_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ponto">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($ponto_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="box ewBox ewGrid">
<div class="<?php if (ew_IsResponsiveLayout()) { ?>table-responsive <?php } ?>ewGridMiddlePanel">
<table class="table ewTable">
	<thead>
	<tr class="ewTableHeader">
<?php if ($ponto->ID_PONTO->Visible) { // ID_PONTO ?>
		<th class="<?php echo $ponto->ID_PONTO->HeaderCellClass() ?>"><span id="elh_ponto_ID_PONTO" class="ponto_ID_PONTO"><?php echo $ponto->ID_PONTO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($ponto->ID_FUNCIONARIO->Visible) { // ID_FUNCIONARIO ?>
		<th class="<?php echo $ponto->ID_FUNCIONARIO->HeaderCellClass() ?>"><span id="elh_ponto_ID_FUNCIONARIO" class="ponto_ID_FUNCIONARIO"><?php echo $ponto->ID_FUNCIONARIO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($ponto->DATA_PONTO->Visible) { // DATA_PONTO ?>
		<th class="<?php echo $ponto->DATA_PONTO->HeaderCellClass() ?>"><span id="elh_ponto_DATA_PONTO" class="ponto_DATA_PONTO"><?php echo $ponto->DATA_PONTO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($ponto->HORARIO_INICIAL_PONTO->Visible) { // HORARIO_INICIAL_PONTO ?>
		<th class="<?php echo $ponto->HORARIO_INICIAL_PONTO->HeaderCellClass() ?>"><span id="elh_ponto_HORARIO_INICIAL_PONTO" class="ponto_HORARIO_INICIAL_PONTO"><?php echo $ponto->HORARIO_INICIAL_PONTO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($ponto->HORARIO_FINAL_PONTO->Visible) { // HORARIO_FINAL_PONTO ?>
		<th class="<?php echo $ponto->HORARIO_FINAL_PONTO->HeaderCellClass() ?>"><span id="elh_ponto_HORARIO_FINAL_PONTO" class="ponto_HORARIO_FINAL_PONTO"><?php echo $ponto->HORARIO_FINAL_PONTO->FldCaption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ponto_delete->RecCnt = 0;
$i = 0;
while (!$ponto_delete->Recordset->EOF) {
	$ponto_delete->RecCnt++;
	$ponto_delete->RowCnt++;

	// Set row properties
	$ponto->ResetAttrs();
	$ponto->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$ponto_delete->LoadRowValues($ponto_delete->Recordset);

	// Render row
	$ponto_delete->RenderRow();
?>
	<tr<?php echo $ponto->RowAttributes() ?>>
<?php if ($ponto->ID_PONTO->Visible) { // ID_PONTO ?>
		<td<?php echo $ponto->ID_PONTO->CellAttributes() ?>>
<span id="el<?php echo $ponto_delete->RowCnt ?>_ponto_ID_PONTO" class="ponto_ID_PONTO">
<span<?php echo $ponto->ID_PONTO->ViewAttributes() ?>>
<?php echo $ponto->ID_PONTO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ponto->ID_FUNCIONARIO->Visible) { // ID_FUNCIONARIO ?>
		<td<?php echo $ponto->ID_FUNCIONARIO->CellAttributes() ?>>
<span id="el<?php echo $ponto_delete->RowCnt ?>_ponto_ID_FUNCIONARIO" class="ponto_ID_FUNCIONARIO">
<span<?php echo $ponto->ID_FUNCIONARIO->ViewAttributes() ?>>
<?php echo $ponto->ID_FUNCIONARIO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ponto->DATA_PONTO->Visible) { // DATA_PONTO ?>
		<td<?php echo $ponto->DATA_PONTO->CellAttributes() ?>>
<span id="el<?php echo $ponto_delete->RowCnt ?>_ponto_DATA_PONTO" class="ponto_DATA_PONTO">
<span<?php echo $ponto->DATA_PONTO->ViewAttributes() ?>>
<?php echo $ponto->DATA_PONTO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ponto->HORARIO_INICIAL_PONTO->Visible) { // HORARIO_INICIAL_PONTO ?>
		<td<?php echo $ponto->HORARIO_INICIAL_PONTO->CellAttributes() ?>>
<span id="el<?php echo $ponto_delete->RowCnt ?>_ponto_HORARIO_INICIAL_PONTO" class="ponto_HORARIO_INICIAL_PONTO">
<span<?php echo $ponto->HORARIO_INICIAL_PONTO->ViewAttributes() ?>>
<?php echo $ponto->HORARIO_INICIAL_PONTO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ponto->HORARIO_FINAL_PONTO->Visible) { // HORARIO_FINAL_PONTO ?>
		<td<?php echo $ponto->HORARIO_FINAL_PONTO->CellAttributes() ?>>
<span id="el<?php echo $ponto_delete->RowCnt ?>_ponto_HORARIO_FINAL_PONTO" class="ponto_HORARIO_FINAL_PONTO">
<span<?php echo $ponto->HORARIO_FINAL_PONTO->ViewAttributes() ?>>
<?php echo $ponto->HORARIO_FINAL_PONTO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ponto_delete->Recordset->MoveNext();
}
$ponto_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $ponto_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<script type="text/javascript">
fpontodelete.Init();
</script>
<?php
$ponto_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ponto_delete->Page_Terminate();
?>
