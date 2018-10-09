<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class site_edit extends site
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'site';

	// Page object name
	public $PageObjName = "site_edit";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;
	public $CheckTokenFn = PROJECT_NAMESPACE . "CheckToken";
	public $CreateTokenFn = PROJECT_NAMESPACE . "CreateToken";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->Phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Methods to clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessageAsArray()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") <> "")
				return ($this->TableVar == Get("t"));
		} else {
			return TRUE;
		}
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;

		//if ($this->CheckToken) { // Always create token, required by API file/lookup request
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$CurrentToken = $this->Token; // Save to global variable

		//}
	}

	//
	// Page class constructor
	//

	public function __construct()
	{
		global $Conn, $Language, $COMPOSITE_KEY_SEPARATOR;

		// Validate configuration
		if (!IS_PHP5)
			die("This script requires PHP 5.5 or later, but you are running " . phpversion() . ".");
		if (!function_exists("xml_parser_create"))
			die("This script requires PHP XML Parser.");
		if (!IS_WINDOWS && IS_MSACCESS)
			die("Microsoft Access is supported on Windows server only.");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (site)
		if (!isset($GLOBALS["site"]) || get_class($GLOBALS["site"]) == PROJECT_NAMESPACE . "site") {
			$GLOBALS["site"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["site"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'site');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($Conn))
			$Conn = GetConnection($this->Dbid);
	}

	//
	// Terminate page
	//

	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $site;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($site);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessageAsArray()));
			exit();
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "siteview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson([$row]);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType(substr($val, 0, 11)), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['ID_SITE'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->ID_SITE->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . "CheckToken";
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->ID_SITE->setVisibility();
		$this->NOME_EMPRESA->setVisibility();
		$this->NOME_CIDADE->setVisibility();
		$this->ESTADO->setVisibility();
		$this->FONE->setVisibility();
		$this->FONE_APP->setVisibility();
		$this->_EMAIL->setVisibility();
		$this->sendusername->setVisibility();
		$this->sendpassword->setVisibility();
		$this->smtpserver->setVisibility();
		$this->smtpserverport->setVisibility();
		$this->MailFrom->setVisibility();
		$this->MailTo->setVisibility();
		$this->MailCc->setVisibility();
		$this->bool_ativo_site->setVisibility();
		$this->hideFieldsForAddEdit();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->Phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$returnUrl = "";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_ID_SITE")) {
				$this->ID_SITE->setFormValue($CurrentForm->getValue("x_ID_SITE"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("ID_SITE") !== NULL) {
				$this->ID_SITE->setQueryStringValue(Get("ID_SITE"));
				$loadByQuery = TRUE;
			} else {
				$this->ID_SITE->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi())
					$this->terminate();
				else
					$this->CurrentAction = ""; // Form error, reset action
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->terminate("sitelist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "sitelist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					if (IsApi())
						$this->terminate(TRUE);
					else
						$this->terminate($returnUrl); // Return to caller
				} elseif (IsApi()) { // API request, return
					$this->terminate();
				} elseif ($this->getFailureMessage() == $Language->Phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
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
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'ID_SITE' first before field var 'x_ID_SITE'
		$val = $CurrentForm->hasValue("ID_SITE") ? $CurrentForm->getValue("ID_SITE") : $CurrentForm->getValue("x_ID_SITE");
		if (!$this->ID_SITE->IsDetailKey)
			$this->ID_SITE->setFormValue($val);

		// Check field name 'NOME_EMPRESA' first before field var 'x_NOME_EMPRESA'
		$val = $CurrentForm->hasValue("NOME_EMPRESA") ? $CurrentForm->getValue("NOME_EMPRESA") : $CurrentForm->getValue("x_NOME_EMPRESA");
		if (!$this->NOME_EMPRESA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NOME_EMPRESA->Visible = FALSE; // Disable update for API request
			else
				$this->NOME_EMPRESA->setFormValue($val);
		}

		// Check field name 'NOME_CIDADE' first before field var 'x_NOME_CIDADE'
		$val = $CurrentForm->hasValue("NOME_CIDADE") ? $CurrentForm->getValue("NOME_CIDADE") : $CurrentForm->getValue("x_NOME_CIDADE");
		if (!$this->NOME_CIDADE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NOME_CIDADE->Visible = FALSE; // Disable update for API request
			else
				$this->NOME_CIDADE->setFormValue($val);
		}

		// Check field name 'ESTADO' first before field var 'x_ESTADO'
		$val = $CurrentForm->hasValue("ESTADO") ? $CurrentForm->getValue("ESTADO") : $CurrentForm->getValue("x_ESTADO");
		if (!$this->ESTADO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ESTADO->Visible = FALSE; // Disable update for API request
			else
				$this->ESTADO->setFormValue($val);
		}

		// Check field name 'FONE' first before field var 'x_FONE'
		$val = $CurrentForm->hasValue("FONE") ? $CurrentForm->getValue("FONE") : $CurrentForm->getValue("x_FONE");
		if (!$this->FONE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FONE->Visible = FALSE; // Disable update for API request
			else
				$this->FONE->setFormValue($val);
		}

		// Check field name 'FONE_APP' first before field var 'x_FONE_APP'
		$val = $CurrentForm->hasValue("FONE_APP") ? $CurrentForm->getValue("FONE_APP") : $CurrentForm->getValue("x_FONE_APP");
		if (!$this->FONE_APP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FONE_APP->Visible = FALSE; // Disable update for API request
			else
				$this->FONE_APP->setFormValue($val);
		}

		// Check field name 'EMAIL' first before field var 'x__EMAIL'
		$val = $CurrentForm->hasValue("EMAIL") ? $CurrentForm->getValue("EMAIL") : $CurrentForm->getValue("x__EMAIL");
		if (!$this->_EMAIL->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_EMAIL->Visible = FALSE; // Disable update for API request
			else
				$this->_EMAIL->setFormValue($val);
		}

		// Check field name 'sendusername' first before field var 'x_sendusername'
		$val = $CurrentForm->hasValue("sendusername") ? $CurrentForm->getValue("sendusername") : $CurrentForm->getValue("x_sendusername");
		if (!$this->sendusername->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sendusername->Visible = FALSE; // Disable update for API request
			else
				$this->sendusername->setFormValue($val);
		}

		// Check field name 'sendpassword' first before field var 'x_sendpassword'
		$val = $CurrentForm->hasValue("sendpassword") ? $CurrentForm->getValue("sendpassword") : $CurrentForm->getValue("x_sendpassword");
		if (!$this->sendpassword->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sendpassword->Visible = FALSE; // Disable update for API request
			else
				$this->sendpassword->setFormValue($val);
		}

		// Check field name 'smtpserver' first before field var 'x_smtpserver'
		$val = $CurrentForm->hasValue("smtpserver") ? $CurrentForm->getValue("smtpserver") : $CurrentForm->getValue("x_smtpserver");
		if (!$this->smtpserver->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->smtpserver->Visible = FALSE; // Disable update for API request
			else
				$this->smtpserver->setFormValue($val);
		}

		// Check field name 'smtpserverport' first before field var 'x_smtpserverport'
		$val = $CurrentForm->hasValue("smtpserverport") ? $CurrentForm->getValue("smtpserverport") : $CurrentForm->getValue("x_smtpserverport");
		if (!$this->smtpserverport->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->smtpserverport->Visible = FALSE; // Disable update for API request
			else
				$this->smtpserverport->setFormValue($val);
		}

		// Check field name 'MailFrom' first before field var 'x_MailFrom'
		$val = $CurrentForm->hasValue("MailFrom") ? $CurrentForm->getValue("MailFrom") : $CurrentForm->getValue("x_MailFrom");
		if (!$this->MailFrom->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MailFrom->Visible = FALSE; // Disable update for API request
			else
				$this->MailFrom->setFormValue($val);
		}

		// Check field name 'MailTo' first before field var 'x_MailTo'
		$val = $CurrentForm->hasValue("MailTo") ? $CurrentForm->getValue("MailTo") : $CurrentForm->getValue("x_MailTo");
		if (!$this->MailTo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MailTo->Visible = FALSE; // Disable update for API request
			else
				$this->MailTo->setFormValue($val);
		}

		// Check field name 'MailCc' first before field var 'x_MailCc'
		$val = $CurrentForm->hasValue("MailCc") ? $CurrentForm->getValue("MailCc") : $CurrentForm->getValue("x_MailCc");
		if (!$this->MailCc->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MailCc->Visible = FALSE; // Disable update for API request
			else
				$this->MailCc->setFormValue($val);
		}

		// Check field name 'bool_ativo_site' first before field var 'x_bool_ativo_site'
		$val = $CurrentForm->hasValue("bool_ativo_site") ? $CurrentForm->getValue("bool_ativo_site") : $CurrentForm->getValue("x_bool_ativo_site");
		if (!$this->bool_ativo_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_site->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_site->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->ID_SITE->CurrentValue = $this->ID_SITE->FormValue;
		$this->NOME_EMPRESA->CurrentValue = $this->NOME_EMPRESA->FormValue;
		$this->NOME_CIDADE->CurrentValue = $this->NOME_CIDADE->FormValue;
		$this->ESTADO->CurrentValue = $this->ESTADO->FormValue;
		$this->FONE->CurrentValue = $this->FONE->FormValue;
		$this->FONE_APP->CurrentValue = $this->FONE_APP->FormValue;
		$this->_EMAIL->CurrentValue = $this->_EMAIL->FormValue;
		$this->sendusername->CurrentValue = $this->sendusername->FormValue;
		$this->sendpassword->CurrentValue = $this->sendpassword->FormValue;
		$this->smtpserver->CurrentValue = $this->smtpserver->FormValue;
		$this->smtpserverport->CurrentValue = $this->smtpserverport->FormValue;
		$this->MailFrom->CurrentValue = $this->MailFrom->FormValue;
		$this->MailTo->CurrentValue = $this->MailTo->FormValue;
		$this->MailCc->CurrentValue = $this->MailCc->FormValue;
		$this->bool_ativo_site->CurrentValue = $this->bool_ativo_site->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->ID_SITE->setDbValue($row['ID_SITE']);
		$this->NOME_EMPRESA->setDbValue($row['NOME_EMPRESA']);
		$this->NOME_CIDADE->setDbValue($row['NOME_CIDADE']);
		$this->ESTADO->setDbValue($row['ESTADO']);
		$this->FONE->setDbValue($row['FONE']);
		$this->FONE_APP->setDbValue($row['FONE_APP']);
		$this->_EMAIL->setDbValue($row['EMAIL']);
		$this->sendusername->setDbValue($row['sendusername']);
		$this->sendpassword->setDbValue($row['sendpassword']);
		$this->smtpserver->setDbValue($row['smtpserver']);
		$this->smtpserverport->setDbValue($row['smtpserverport']);
		$this->MailFrom->setDbValue($row['MailFrom']);
		$this->MailTo->setDbValue($row['MailTo']);
		$this->MailCc->setDbValue($row['MailCc']);
		$this->bool_ativo_site->setDbValue($row['bool_ativo_site']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['ID_SITE'] = NULL;
		$row['NOME_EMPRESA'] = NULL;
		$row['NOME_CIDADE'] = NULL;
		$row['ESTADO'] = NULL;
		$row['FONE'] = NULL;
		$row['FONE_APP'] = NULL;
		$row['EMAIL'] = NULL;
		$row['sendusername'] = NULL;
		$row['sendpassword'] = NULL;
		$row['smtpserver'] = NULL;
		$row['smtpserverport'] = NULL;
		$row['MailFrom'] = NULL;
		$row['MailTo'] = NULL;
		$row['MailCc'] = NULL;
		$row['bool_ativo_site'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("ID_SITE")) <> "")
			$this->ID_SITE->CurrentValue = $this->getKey("ID_SITE"); // ID_SITE
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// ID_SITE
		// NOME_EMPRESA
		// NOME_CIDADE
		// ESTADO
		// FONE
		// FONE_APP
		// EMAIL
		// sendusername
		// sendpassword
		// smtpserver
		// smtpserverport
		// MailFrom
		// MailTo
		// MailCc
		// bool_ativo_site

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ID_SITE
			$this->ID_SITE->ViewValue = $this->ID_SITE->CurrentValue;
			$this->ID_SITE->ViewCustomAttributes = "";

			// NOME_EMPRESA
			$this->NOME_EMPRESA->ViewValue = $this->NOME_EMPRESA->CurrentValue;
			$this->NOME_EMPRESA->ViewCustomAttributes = "";

			// NOME_CIDADE
			$this->NOME_CIDADE->ViewValue = $this->NOME_CIDADE->CurrentValue;
			$this->NOME_CIDADE->ViewCustomAttributes = "";

			// ESTADO
			$this->ESTADO->ViewValue = $this->ESTADO->CurrentValue;
			$this->ESTADO->ViewCustomAttributes = "";

			// FONE
			$this->FONE->ViewValue = $this->FONE->CurrentValue;
			$this->FONE->ViewCustomAttributes = "";

			// FONE_APP
			$this->FONE_APP->ViewValue = $this->FONE_APP->CurrentValue;
			$this->FONE_APP->ViewCustomAttributes = "";

			// EMAIL
			$this->_EMAIL->ViewValue = $this->_EMAIL->CurrentValue;
			$this->_EMAIL->ViewCustomAttributes = "";

			// sendusername
			$this->sendusername->ViewValue = $this->sendusername->CurrentValue;
			$this->sendusername->ViewCustomAttributes = "";

			// sendpassword
			$this->sendpassword->ViewValue = $this->sendpassword->CurrentValue;
			$this->sendpassword->ViewCustomAttributes = "";

			// smtpserver
			$this->smtpserver->ViewValue = $this->smtpserver->CurrentValue;
			$this->smtpserver->ViewCustomAttributes = "";

			// smtpserverport
			$this->smtpserverport->ViewValue = $this->smtpserverport->CurrentValue;
			$this->smtpserverport->ViewValue = FormatNumber($this->smtpserverport->ViewValue, 0, -2, -2, -2);
			$this->smtpserverport->ViewCustomAttributes = "";

			// MailFrom
			$this->MailFrom->ViewValue = $this->MailFrom->CurrentValue;
			$this->MailFrom->ViewCustomAttributes = "";

			// MailTo
			$this->MailTo->ViewValue = $this->MailTo->CurrentValue;
			$this->MailTo->ViewCustomAttributes = "";

			// MailCc
			$this->MailCc->ViewValue = $this->MailCc->CurrentValue;
			$this->MailCc->ViewCustomAttributes = "";

			// bool_ativo_site
			$this->bool_ativo_site->ViewValue = $this->bool_ativo_site->CurrentValue;
			$this->bool_ativo_site->ViewValue = FormatNumber($this->bool_ativo_site->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_site->ViewCustomAttributes = "";

			// ID_SITE
			$this->ID_SITE->LinkCustomAttributes = "";
			$this->ID_SITE->HrefValue = "";
			$this->ID_SITE->TooltipValue = "";

			// NOME_EMPRESA
			$this->NOME_EMPRESA->LinkCustomAttributes = "";
			$this->NOME_EMPRESA->HrefValue = "";
			$this->NOME_EMPRESA->TooltipValue = "";

			// NOME_CIDADE
			$this->NOME_CIDADE->LinkCustomAttributes = "";
			$this->NOME_CIDADE->HrefValue = "";
			$this->NOME_CIDADE->TooltipValue = "";

			// ESTADO
			$this->ESTADO->LinkCustomAttributes = "";
			$this->ESTADO->HrefValue = "";
			$this->ESTADO->TooltipValue = "";

			// FONE
			$this->FONE->LinkCustomAttributes = "";
			$this->FONE->HrefValue = "";
			$this->FONE->TooltipValue = "";

			// FONE_APP
			$this->FONE_APP->LinkCustomAttributes = "";
			$this->FONE_APP->HrefValue = "";
			$this->FONE_APP->TooltipValue = "";

			// EMAIL
			$this->_EMAIL->LinkCustomAttributes = "";
			$this->_EMAIL->HrefValue = "";
			$this->_EMAIL->TooltipValue = "";

			// sendusername
			$this->sendusername->LinkCustomAttributes = "";
			$this->sendusername->HrefValue = "";
			$this->sendusername->TooltipValue = "";

			// sendpassword
			$this->sendpassword->LinkCustomAttributes = "";
			$this->sendpassword->HrefValue = "";
			$this->sendpassword->TooltipValue = "";

			// smtpserver
			$this->smtpserver->LinkCustomAttributes = "";
			$this->smtpserver->HrefValue = "";
			$this->smtpserver->TooltipValue = "";

			// smtpserverport
			$this->smtpserverport->LinkCustomAttributes = "";
			$this->smtpserverport->HrefValue = "";
			$this->smtpserverport->TooltipValue = "";

			// MailFrom
			$this->MailFrom->LinkCustomAttributes = "";
			$this->MailFrom->HrefValue = "";
			$this->MailFrom->TooltipValue = "";

			// MailTo
			$this->MailTo->LinkCustomAttributes = "";
			$this->MailTo->HrefValue = "";
			$this->MailTo->TooltipValue = "";

			// MailCc
			$this->MailCc->LinkCustomAttributes = "";
			$this->MailCc->HrefValue = "";
			$this->MailCc->TooltipValue = "";

			// bool_ativo_site
			$this->bool_ativo_site->LinkCustomAttributes = "";
			$this->bool_ativo_site->HrefValue = "";
			$this->bool_ativo_site->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// ID_SITE
			$this->ID_SITE->EditAttrs["class"] = "form-control";
			$this->ID_SITE->EditCustomAttributes = "";
			$this->ID_SITE->EditValue = $this->ID_SITE->CurrentValue;
			$this->ID_SITE->ViewCustomAttributes = "";

			// NOME_EMPRESA
			$this->NOME_EMPRESA->EditAttrs["class"] = "form-control";
			$this->NOME_EMPRESA->EditCustomAttributes = "";
			$this->NOME_EMPRESA->EditValue = HtmlEncode($this->NOME_EMPRESA->CurrentValue);
			$this->NOME_EMPRESA->PlaceHolder = RemoveHtml($this->NOME_EMPRESA->caption());

			// NOME_CIDADE
			$this->NOME_CIDADE->EditAttrs["class"] = "form-control";
			$this->NOME_CIDADE->EditCustomAttributes = "";
			$this->NOME_CIDADE->EditValue = HtmlEncode($this->NOME_CIDADE->CurrentValue);
			$this->NOME_CIDADE->PlaceHolder = RemoveHtml($this->NOME_CIDADE->caption());

			// ESTADO
			$this->ESTADO->EditAttrs["class"] = "form-control";
			$this->ESTADO->EditCustomAttributes = "";
			$this->ESTADO->EditValue = HtmlEncode($this->ESTADO->CurrentValue);
			$this->ESTADO->PlaceHolder = RemoveHtml($this->ESTADO->caption());

			// FONE
			$this->FONE->EditAttrs["class"] = "form-control";
			$this->FONE->EditCustomAttributes = "";
			$this->FONE->EditValue = HtmlEncode($this->FONE->CurrentValue);
			$this->FONE->PlaceHolder = RemoveHtml($this->FONE->caption());

			// FONE_APP
			$this->FONE_APP->EditAttrs["class"] = "form-control";
			$this->FONE_APP->EditCustomAttributes = "";
			$this->FONE_APP->EditValue = HtmlEncode($this->FONE_APP->CurrentValue);
			$this->FONE_APP->PlaceHolder = RemoveHtml($this->FONE_APP->caption());

			// EMAIL
			$this->_EMAIL->EditAttrs["class"] = "form-control";
			$this->_EMAIL->EditCustomAttributes = "";
			$this->_EMAIL->EditValue = HtmlEncode($this->_EMAIL->CurrentValue);
			$this->_EMAIL->PlaceHolder = RemoveHtml($this->_EMAIL->caption());

			// sendusername
			$this->sendusername->EditAttrs["class"] = "form-control";
			$this->sendusername->EditCustomAttributes = "";
			$this->sendusername->EditValue = HtmlEncode($this->sendusername->CurrentValue);
			$this->sendusername->PlaceHolder = RemoveHtml($this->sendusername->caption());

			// sendpassword
			$this->sendpassword->EditAttrs["class"] = "form-control";
			$this->sendpassword->EditCustomAttributes = "";
			$this->sendpassword->EditValue = HtmlEncode($this->sendpassword->CurrentValue);
			$this->sendpassword->PlaceHolder = RemoveHtml($this->sendpassword->caption());

			// smtpserver
			$this->smtpserver->EditAttrs["class"] = "form-control";
			$this->smtpserver->EditCustomAttributes = "";
			$this->smtpserver->EditValue = HtmlEncode($this->smtpserver->CurrentValue);
			$this->smtpserver->PlaceHolder = RemoveHtml($this->smtpserver->caption());

			// smtpserverport
			$this->smtpserverport->EditAttrs["class"] = "form-control";
			$this->smtpserverport->EditCustomAttributes = "";
			$this->smtpserverport->EditValue = HtmlEncode($this->smtpserverport->CurrentValue);
			$this->smtpserverport->PlaceHolder = RemoveHtml($this->smtpserverport->caption());

			// MailFrom
			$this->MailFrom->EditAttrs["class"] = "form-control";
			$this->MailFrom->EditCustomAttributes = "";
			$this->MailFrom->EditValue = HtmlEncode($this->MailFrom->CurrentValue);
			$this->MailFrom->PlaceHolder = RemoveHtml($this->MailFrom->caption());

			// MailTo
			$this->MailTo->EditAttrs["class"] = "form-control";
			$this->MailTo->EditCustomAttributes = "";
			$this->MailTo->EditValue = HtmlEncode($this->MailTo->CurrentValue);
			$this->MailTo->PlaceHolder = RemoveHtml($this->MailTo->caption());

			// MailCc
			$this->MailCc->EditAttrs["class"] = "form-control";
			$this->MailCc->EditCustomAttributes = "";
			$this->MailCc->EditValue = HtmlEncode($this->MailCc->CurrentValue);
			$this->MailCc->PlaceHolder = RemoveHtml($this->MailCc->caption());

			// bool_ativo_site
			$this->bool_ativo_site->EditAttrs["class"] = "form-control";
			$this->bool_ativo_site->EditCustomAttributes = "";
			$this->bool_ativo_site->EditValue = HtmlEncode($this->bool_ativo_site->CurrentValue);
			$this->bool_ativo_site->PlaceHolder = RemoveHtml($this->bool_ativo_site->caption());

			// Edit refer script
			// ID_SITE

			$this->ID_SITE->LinkCustomAttributes = "";
			$this->ID_SITE->HrefValue = "";

			// NOME_EMPRESA
			$this->NOME_EMPRESA->LinkCustomAttributes = "";
			$this->NOME_EMPRESA->HrefValue = "";

			// NOME_CIDADE
			$this->NOME_CIDADE->LinkCustomAttributes = "";
			$this->NOME_CIDADE->HrefValue = "";

			// ESTADO
			$this->ESTADO->LinkCustomAttributes = "";
			$this->ESTADO->HrefValue = "";

			// FONE
			$this->FONE->LinkCustomAttributes = "";
			$this->FONE->HrefValue = "";

			// FONE_APP
			$this->FONE_APP->LinkCustomAttributes = "";
			$this->FONE_APP->HrefValue = "";

			// EMAIL
			$this->_EMAIL->LinkCustomAttributes = "";
			$this->_EMAIL->HrefValue = "";

			// sendusername
			$this->sendusername->LinkCustomAttributes = "";
			$this->sendusername->HrefValue = "";

			// sendpassword
			$this->sendpassword->LinkCustomAttributes = "";
			$this->sendpassword->HrefValue = "";

			// smtpserver
			$this->smtpserver->LinkCustomAttributes = "";
			$this->smtpserver->HrefValue = "";

			// smtpserverport
			$this->smtpserverport->LinkCustomAttributes = "";
			$this->smtpserverport->HrefValue = "";

			// MailFrom
			$this->MailFrom->LinkCustomAttributes = "";
			$this->MailFrom->HrefValue = "";

			// MailTo
			$this->MailTo->LinkCustomAttributes = "";
			$this->MailTo->HrefValue = "";

			// MailCc
			$this->MailCc->LinkCustomAttributes = "";
			$this->MailCc->HrefValue = "";

			// bool_ativo_site
			$this->bool_ativo_site->LinkCustomAttributes = "";
			$this->bool_ativo_site->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->ID_SITE->Required) {
			if (!$this->ID_SITE->IsDetailKey && $this->ID_SITE->FormValue != NULL && $this->ID_SITE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ID_SITE->caption(), $this->ID_SITE->RequiredErrorMessage));
			}
		}
		if ($this->NOME_EMPRESA->Required) {
			if (!$this->NOME_EMPRESA->IsDetailKey && $this->NOME_EMPRESA->FormValue != NULL && $this->NOME_EMPRESA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NOME_EMPRESA->caption(), $this->NOME_EMPRESA->RequiredErrorMessage));
			}
		}
		if ($this->NOME_CIDADE->Required) {
			if (!$this->NOME_CIDADE->IsDetailKey && $this->NOME_CIDADE->FormValue != NULL && $this->NOME_CIDADE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NOME_CIDADE->caption(), $this->NOME_CIDADE->RequiredErrorMessage));
			}
		}
		if ($this->ESTADO->Required) {
			if (!$this->ESTADO->IsDetailKey && $this->ESTADO->FormValue != NULL && $this->ESTADO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ESTADO->caption(), $this->ESTADO->RequiredErrorMessage));
			}
		}
		if ($this->FONE->Required) {
			if (!$this->FONE->IsDetailKey && $this->FONE->FormValue != NULL && $this->FONE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FONE->caption(), $this->FONE->RequiredErrorMessage));
			}
		}
		if ($this->FONE_APP->Required) {
			if (!$this->FONE_APP->IsDetailKey && $this->FONE_APP->FormValue != NULL && $this->FONE_APP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FONE_APP->caption(), $this->FONE_APP->RequiredErrorMessage));
			}
		}
		if ($this->_EMAIL->Required) {
			if (!$this->_EMAIL->IsDetailKey && $this->_EMAIL->FormValue != NULL && $this->_EMAIL->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_EMAIL->caption(), $this->_EMAIL->RequiredErrorMessage));
			}
		}
		if ($this->sendusername->Required) {
			if (!$this->sendusername->IsDetailKey && $this->sendusername->FormValue != NULL && $this->sendusername->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sendusername->caption(), $this->sendusername->RequiredErrorMessage));
			}
		}
		if ($this->sendpassword->Required) {
			if (!$this->sendpassword->IsDetailKey && $this->sendpassword->FormValue != NULL && $this->sendpassword->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sendpassword->caption(), $this->sendpassword->RequiredErrorMessage));
			}
		}
		if ($this->smtpserver->Required) {
			if (!$this->smtpserver->IsDetailKey && $this->smtpserver->FormValue != NULL && $this->smtpserver->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->smtpserver->caption(), $this->smtpserver->RequiredErrorMessage));
			}
		}
		if ($this->smtpserverport->Required) {
			if (!$this->smtpserverport->IsDetailKey && $this->smtpserverport->FormValue != NULL && $this->smtpserverport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->smtpserverport->caption(), $this->smtpserverport->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->smtpserverport->FormValue)) {
			AddMessage($FormError, $this->smtpserverport->errorMessage());
		}
		if ($this->MailFrom->Required) {
			if (!$this->MailFrom->IsDetailKey && $this->MailFrom->FormValue != NULL && $this->MailFrom->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MailFrom->caption(), $this->MailFrom->RequiredErrorMessage));
			}
		}
		if ($this->MailTo->Required) {
			if (!$this->MailTo->IsDetailKey && $this->MailTo->FormValue != NULL && $this->MailTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MailTo->caption(), $this->MailTo->RequiredErrorMessage));
			}
		}
		if ($this->MailCc->Required) {
			if (!$this->MailCc->IsDetailKey && $this->MailCc->FormValue != NULL && $this->MailCc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MailCc->caption(), $this->MailCc->RequiredErrorMessage));
			}
		}
		if ($this->bool_ativo_site->Required) {
			if (!$this->bool_ativo_site->IsDetailKey && $this->bool_ativo_site->FormValue != NULL && $this->bool_ativo_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_site->caption(), $this->bool_ativo_site->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_site->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_site->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// NOME_EMPRESA
			$this->NOME_EMPRESA->setDbValueDef($rsnew, $this->NOME_EMPRESA->CurrentValue, NULL, $this->NOME_EMPRESA->ReadOnly);

			// NOME_CIDADE
			$this->NOME_CIDADE->setDbValueDef($rsnew, $this->NOME_CIDADE->CurrentValue, NULL, $this->NOME_CIDADE->ReadOnly);

			// ESTADO
			$this->ESTADO->setDbValueDef($rsnew, $this->ESTADO->CurrentValue, NULL, $this->ESTADO->ReadOnly);

			// FONE
			$this->FONE->setDbValueDef($rsnew, $this->FONE->CurrentValue, NULL, $this->FONE->ReadOnly);

			// FONE_APP
			$this->FONE_APP->setDbValueDef($rsnew, $this->FONE_APP->CurrentValue, NULL, $this->FONE_APP->ReadOnly);

			// EMAIL
			$this->_EMAIL->setDbValueDef($rsnew, $this->_EMAIL->CurrentValue, NULL, $this->_EMAIL->ReadOnly);

			// sendusername
			$this->sendusername->setDbValueDef($rsnew, $this->sendusername->CurrentValue, NULL, $this->sendusername->ReadOnly);

			// sendpassword
			$this->sendpassword->setDbValueDef($rsnew, $this->sendpassword->CurrentValue, NULL, $this->sendpassword->ReadOnly);

			// smtpserver
			$this->smtpserver->setDbValueDef($rsnew, $this->smtpserver->CurrentValue, NULL, $this->smtpserver->ReadOnly);

			// smtpserverport
			$this->smtpserverport->setDbValueDef($rsnew, $this->smtpserverport->CurrentValue, NULL, $this->smtpserverport->ReadOnly);

			// MailFrom
			$this->MailFrom->setDbValueDef($rsnew, $this->MailFrom->CurrentValue, NULL, $this->MailFrom->ReadOnly);

			// MailTo
			$this->MailTo->setDbValueDef($rsnew, $this->MailTo->CurrentValue, NULL, $this->MailTo->ReadOnly);

			// MailCc
			$this->MailCc->setDbValueDef($rsnew, $this->MailCc->CurrentValue, NULL, $this->MailCc->ReadOnly);

			// bool_ativo_site
			$this->bool_ativo_site->setDbValueDef($rsnew, $this->bool_ativo_site->CurrentValue, NULL, $this->bool_ativo_site->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
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
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("sitelist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
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
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
