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

$cadastro_delete = NULL; // Initialize page object first

class ccadastro_delete extends ccadastro {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = '{F97651BD-5B9A-4483-825A-646D2CE2E400}';

	// Table name
	var $TableName = 'cadastro';

	// Page object name
	var $PageObjName = 'cadastro_delete';

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
			define("EW_PAGE_ID", 'delete', TRUE);

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
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
		$this->ID_CADASTRO->SetVisibility();
		if ($this->IsAdd() || $this->IsCopy() || $this->IsGridAdd())
			$this->ID_CADASTRO->Visible = FALSE;
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
			$this->Page_Terminate("cadastrolist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in cadastro class, cadastroinfo.php

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
				$this->Page_Terminate("cadastrolist.php"); // Return to list
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
		$this->ID_CADASTRO->setDbValue($row['ID_CADASTRO']);
		$this->NOME_CADASTRO->setDbValue($row['NOME_CADASTRO']);
		$this->LOGIN_CADASTRO->setDbValue($row['LOGIN_CADASTRO']);
		$this->SENHA_CADASTRO->setDbValue($row['SENHA_CADASTRO']);
		$this->ID_NIVEL_ACESSO->setDbValue($row['ID_NIVEL_ACESSO']);
	}

	// Return a row with default values
	function NewRow() {
		$row = array();
		$row['ID_CADASTRO'] = NULL;
		$row['NOME_CADASTRO'] = NULL;
		$row['LOGIN_CADASTRO'] = NULL;
		$row['SENHA_CADASTRO'] = NULL;
		$row['ID_NIVEL_ACESSO'] = NULL;
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

			// ID_CADASTRO
			$this->ID_CADASTRO->LinkCustomAttributes = "";
			$this->ID_CADASTRO->HrefValue = "";
			$this->ID_CADASTRO->TooltipValue = "";

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
				$sThisKey .= $row['ID_CADASTRO'];
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
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("cadastrolist.php"), "", $this->TableVar, TRUE);
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
if (!isset($cadastro_delete)) $cadastro_delete = new ccadastro_delete();

// Page init
$cadastro_delete->Page_Init();

// Page main
$cadastro_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cadastro_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "delete";
var CurrentForm = fcadastrodelete = new ew_Form("fcadastrodelete", "delete");

// Form_CustomValidate event
fcadastrodelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }

// Use JavaScript validation or not
fcadastrodelete.ValidateRequired = <?php echo json_encode(EW_CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $cadastro_delete->ShowPageHeader(); ?>
<?php
$cadastro_delete->ShowMessage();
?>
<form name="fcadastrodelete" id="fcadastrodelete" class="form-inline ewForm ewDeleteForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($cadastro_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $cadastro_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cadastro">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($cadastro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="box ewBox ewGrid">
<div class="<?php if (ew_IsResponsiveLayout()) { ?>table-responsive <?php } ?>ewGridMiddlePanel">
<table class="table ewTable">
	<thead>
	<tr class="ewTableHeader">
<?php if ($cadastro->ID_CADASTRO->Visible) { // ID_CADASTRO ?>
		<th class="<?php echo $cadastro->ID_CADASTRO->HeaderCellClass() ?>"><span id="elh_cadastro_ID_CADASTRO" class="cadastro_ID_CADASTRO"><?php echo $cadastro->ID_CADASTRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($cadastro->NOME_CADASTRO->Visible) { // NOME_CADASTRO ?>
		<th class="<?php echo $cadastro->NOME_CADASTRO->HeaderCellClass() ?>"><span id="elh_cadastro_NOME_CADASTRO" class="cadastro_NOME_CADASTRO"><?php echo $cadastro->NOME_CADASTRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($cadastro->LOGIN_CADASTRO->Visible) { // LOGIN_CADASTRO ?>
		<th class="<?php echo $cadastro->LOGIN_CADASTRO->HeaderCellClass() ?>"><span id="elh_cadastro_LOGIN_CADASTRO" class="cadastro_LOGIN_CADASTRO"><?php echo $cadastro->LOGIN_CADASTRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($cadastro->SENHA_CADASTRO->Visible) { // SENHA_CADASTRO ?>
		<th class="<?php echo $cadastro->SENHA_CADASTRO->HeaderCellClass() ?>"><span id="elh_cadastro_SENHA_CADASTRO" class="cadastro_SENHA_CADASTRO"><?php echo $cadastro->SENHA_CADASTRO->FldCaption() ?></span></th>
<?php } ?>
<?php if ($cadastro->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
		<th class="<?php echo $cadastro->ID_NIVEL_ACESSO->HeaderCellClass() ?>"><span id="elh_cadastro_ID_NIVEL_ACESSO" class="cadastro_ID_NIVEL_ACESSO"><?php echo $cadastro->ID_NIVEL_ACESSO->FldCaption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$cadastro_delete->RecCnt = 0;
$i = 0;
while (!$cadastro_delete->Recordset->EOF) {
	$cadastro_delete->RecCnt++;
	$cadastro_delete->RowCnt++;

	// Set row properties
	$cadastro->ResetAttrs();
	$cadastro->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$cadastro_delete->LoadRowValues($cadastro_delete->Recordset);

	// Render row
	$cadastro_delete->RenderRow();
?>
	<tr<?php echo $cadastro->RowAttributes() ?>>
<?php if ($cadastro->ID_CADASTRO->Visible) { // ID_CADASTRO ?>
		<td<?php echo $cadastro->ID_CADASTRO->CellAttributes() ?>>
<span id="el<?php echo $cadastro_delete->RowCnt ?>_cadastro_ID_CADASTRO" class="cadastro_ID_CADASTRO">
<span<?php echo $cadastro->ID_CADASTRO->ViewAttributes() ?>>
<?php echo $cadastro->ID_CADASTRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cadastro->NOME_CADASTRO->Visible) { // NOME_CADASTRO ?>
		<td<?php echo $cadastro->NOME_CADASTRO->CellAttributes() ?>>
<span id="el<?php echo $cadastro_delete->RowCnt ?>_cadastro_NOME_CADASTRO" class="cadastro_NOME_CADASTRO">
<span<?php echo $cadastro->NOME_CADASTRO->ViewAttributes() ?>>
<?php echo $cadastro->NOME_CADASTRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cadastro->LOGIN_CADASTRO->Visible) { // LOGIN_CADASTRO ?>
		<td<?php echo $cadastro->LOGIN_CADASTRO->CellAttributes() ?>>
<span id="el<?php echo $cadastro_delete->RowCnt ?>_cadastro_LOGIN_CADASTRO" class="cadastro_LOGIN_CADASTRO">
<span<?php echo $cadastro->LOGIN_CADASTRO->ViewAttributes() ?>>
<?php echo $cadastro->LOGIN_CADASTRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cadastro->SENHA_CADASTRO->Visible) { // SENHA_CADASTRO ?>
		<td<?php echo $cadastro->SENHA_CADASTRO->CellAttributes() ?>>
<span id="el<?php echo $cadastro_delete->RowCnt ?>_cadastro_SENHA_CADASTRO" class="cadastro_SENHA_CADASTRO">
<span<?php echo $cadastro->SENHA_CADASTRO->ViewAttributes() ?>>
<?php echo $cadastro->SENHA_CADASTRO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cadastro->ID_NIVEL_ACESSO->Visible) { // ID_NIVEL_ACESSO ?>
		<td<?php echo $cadastro->ID_NIVEL_ACESSO->CellAttributes() ?>>
<span id="el<?php echo $cadastro_delete->RowCnt ?>_cadastro_ID_NIVEL_ACESSO" class="cadastro_ID_NIVEL_ACESSO">
<span<?php echo $cadastro->ID_NIVEL_ACESSO->ViewAttributes() ?>>
<?php echo $cadastro->ID_NIVEL_ACESSO->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$cadastro_delete->Recordset->MoveNext();
}
$cadastro_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $cadastro_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<script type="text/javascript">
fcadastrodelete.Init();
</script>
<?php
$cadastro_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$cadastro_delete->Page_Terminate();
?>
