<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class item_orcamento_edit extends item_orcamento
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'item_orcamento';

	// Page object name
	public $PageObjName = "item_orcamento_edit";

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

		// Table object (item_orcamento)
		if (!isset($GLOBALS["item_orcamento"]) || get_class($GLOBALS["item_orcamento"]) == PROJECT_NAMESPACE . "item_orcamento") {
			$GLOBALS["item_orcamento"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["item_orcamento"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'item_orcamento');

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
		global $EXPORT, $item_orcamento;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($item_orcamento);
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
					if ($pageName == "item_orcamentoview.php")
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
			$key .= @$ar['id_item_orcamento'];
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
			$this->id_item_orcamento->Visible = FALSE;
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
		$this->id_item_orcamento->setVisibility();
		$this->data_lanc_item_orcamento->setVisibility();
		$this->orcamento_id->setVisibility();
		$this->item_id->setVisibility();
		$this->quantidade_item_orcamento->setVisibility();
		$this->total_item_orcamento->setVisibility();
		$this->usuario_id->setVisibility();
		$this->bool_ativo_item_orcamento->setVisibility();
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
			if ($CurrentForm->hasValue("x_id_item_orcamento")) {
				$this->id_item_orcamento->setFormValue($CurrentForm->getValue("x_id_item_orcamento"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id_item_orcamento") !== NULL) {
				$this->id_item_orcamento->setQueryStringValue(Get("id_item_orcamento"));
				$loadByQuery = TRUE;
			} else {
				$this->id_item_orcamento->CurrentValue = NULL;
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
					$this->terminate("item_orcamentolist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "item_orcamentolist.php")
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

		// Check field name 'id_item_orcamento' first before field var 'x_id_item_orcamento'
		$val = $CurrentForm->hasValue("id_item_orcamento") ? $CurrentForm->getValue("id_item_orcamento") : $CurrentForm->getValue("x_id_item_orcamento");
		if (!$this->id_item_orcamento->IsDetailKey)
			$this->id_item_orcamento->setFormValue($val);

		// Check field name 'data_lanc_item_orcamento' first before field var 'x_data_lanc_item_orcamento'
		$val = $CurrentForm->hasValue("data_lanc_item_orcamento") ? $CurrentForm->getValue("data_lanc_item_orcamento") : $CurrentForm->getValue("x_data_lanc_item_orcamento");
		if (!$this->data_lanc_item_orcamento->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->data_lanc_item_orcamento->Visible = FALSE; // Disable update for API request
			else
				$this->data_lanc_item_orcamento->setFormValue($val);
			$this->data_lanc_item_orcamento->CurrentValue = UnFormatDateTime($this->data_lanc_item_orcamento->CurrentValue, 0);
		}

		// Check field name 'orcamento_id' first before field var 'x_orcamento_id'
		$val = $CurrentForm->hasValue("orcamento_id") ? $CurrentForm->getValue("orcamento_id") : $CurrentForm->getValue("x_orcamento_id");
		if (!$this->orcamento_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->orcamento_id->Visible = FALSE; // Disable update for API request
			else
				$this->orcamento_id->setFormValue($val);
		}

		// Check field name 'item_id' first before field var 'x_item_id'
		$val = $CurrentForm->hasValue("item_id") ? $CurrentForm->getValue("item_id") : $CurrentForm->getValue("x_item_id");
		if (!$this->item_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->item_id->Visible = FALSE; // Disable update for API request
			else
				$this->item_id->setFormValue($val);
		}

		// Check field name 'quantidade_item_orcamento' first before field var 'x_quantidade_item_orcamento'
		$val = $CurrentForm->hasValue("quantidade_item_orcamento") ? $CurrentForm->getValue("quantidade_item_orcamento") : $CurrentForm->getValue("x_quantidade_item_orcamento");
		if (!$this->quantidade_item_orcamento->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->quantidade_item_orcamento->Visible = FALSE; // Disable update for API request
			else
				$this->quantidade_item_orcamento->setFormValue($val);
		}

		// Check field name 'total_item_orcamento' first before field var 'x_total_item_orcamento'
		$val = $CurrentForm->hasValue("total_item_orcamento") ? $CurrentForm->getValue("total_item_orcamento") : $CurrentForm->getValue("x_total_item_orcamento");
		if (!$this->total_item_orcamento->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->total_item_orcamento->Visible = FALSE; // Disable update for API request
			else
				$this->total_item_orcamento->setFormValue($val);
		}

		// Check field name 'usuario_id' first before field var 'x_usuario_id'
		$val = $CurrentForm->hasValue("usuario_id") ? $CurrentForm->getValue("usuario_id") : $CurrentForm->getValue("x_usuario_id");
		if (!$this->usuario_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usuario_id->Visible = FALSE; // Disable update for API request
			else
				$this->usuario_id->setFormValue($val);
		}

		// Check field name 'bool_ativo_item_orcamento' first before field var 'x_bool_ativo_item_orcamento'
		$val = $CurrentForm->hasValue("bool_ativo_item_orcamento") ? $CurrentForm->getValue("bool_ativo_item_orcamento") : $CurrentForm->getValue("x_bool_ativo_item_orcamento");
		if (!$this->bool_ativo_item_orcamento->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_item_orcamento->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_item_orcamento->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id_item_orcamento->CurrentValue = $this->id_item_orcamento->FormValue;
		$this->data_lanc_item_orcamento->CurrentValue = $this->data_lanc_item_orcamento->FormValue;
		$this->data_lanc_item_orcamento->CurrentValue = UnFormatDateTime($this->data_lanc_item_orcamento->CurrentValue, 0);
		$this->orcamento_id->CurrentValue = $this->orcamento_id->FormValue;
		$this->item_id->CurrentValue = $this->item_id->FormValue;
		$this->quantidade_item_orcamento->CurrentValue = $this->quantidade_item_orcamento->FormValue;
		$this->total_item_orcamento->CurrentValue = $this->total_item_orcamento->FormValue;
		$this->usuario_id->CurrentValue = $this->usuario_id->FormValue;
		$this->bool_ativo_item_orcamento->CurrentValue = $this->bool_ativo_item_orcamento->FormValue;
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
		$this->id_item_orcamento->setDbValue($row['id_item_orcamento']);
		$this->data_lanc_item_orcamento->setDbValue($row['data_lanc_item_orcamento']);
		$this->orcamento_id->setDbValue($row['orcamento_id']);
		$this->item_id->setDbValue($row['item_id']);
		$this->quantidade_item_orcamento->setDbValue($row['quantidade_item_orcamento']);
		$this->total_item_orcamento->setDbValue($row['total_item_orcamento']);
		$this->usuario_id->setDbValue($row['usuario_id']);
		$this->bool_ativo_item_orcamento->setDbValue($row['bool_ativo_item_orcamento']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id_item_orcamento'] = NULL;
		$row['data_lanc_item_orcamento'] = NULL;
		$row['orcamento_id'] = NULL;
		$row['item_id'] = NULL;
		$row['quantidade_item_orcamento'] = NULL;
		$row['total_item_orcamento'] = NULL;
		$row['usuario_id'] = NULL;
		$row['bool_ativo_item_orcamento'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_item_orcamento")) <> "")
			$this->id_item_orcamento->CurrentValue = $this->getKey("id_item_orcamento"); // id_item_orcamento
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
		// Convert decimal values if posted back

		if ($this->quantidade_item_orcamento->FormValue == $this->quantidade_item_orcamento->CurrentValue && is_numeric(ConvertToFloatString($this->quantidade_item_orcamento->CurrentValue)))
			$this->quantidade_item_orcamento->CurrentValue = ConvertToFloatString($this->quantidade_item_orcamento->CurrentValue);

		// Convert decimal values if posted back
		if ($this->total_item_orcamento->FormValue == $this->total_item_orcamento->CurrentValue && is_numeric(ConvertToFloatString($this->total_item_orcamento->CurrentValue)))
			$this->total_item_orcamento->CurrentValue = ConvertToFloatString($this->total_item_orcamento->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id_item_orcamento
		// data_lanc_item_orcamento
		// orcamento_id
		// item_id
		// quantidade_item_orcamento
		// total_item_orcamento
		// usuario_id
		// bool_ativo_item_orcamento

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_item_orcamento
			$this->id_item_orcamento->ViewValue = $this->id_item_orcamento->CurrentValue;
			$this->id_item_orcamento->ViewCustomAttributes = "";

			// data_lanc_item_orcamento
			$this->data_lanc_item_orcamento->ViewValue = $this->data_lanc_item_orcamento->CurrentValue;
			$this->data_lanc_item_orcamento->ViewValue = FormatDateTime($this->data_lanc_item_orcamento->ViewValue, 0);
			$this->data_lanc_item_orcamento->ViewCustomAttributes = "";

			// orcamento_id
			$this->orcamento_id->ViewValue = $this->orcamento_id->CurrentValue;
			$this->orcamento_id->ViewValue = FormatNumber($this->orcamento_id->ViewValue, 0, -2, -2, -2);
			$this->orcamento_id->ViewCustomAttributes = "";

			// item_id
			$this->item_id->ViewValue = $this->item_id->CurrentValue;
			$this->item_id->ViewValue = FormatNumber($this->item_id->ViewValue, 0, -2, -2, -2);
			$this->item_id->ViewCustomAttributes = "";

			// quantidade_item_orcamento
			$this->quantidade_item_orcamento->ViewValue = $this->quantidade_item_orcamento->CurrentValue;
			$this->quantidade_item_orcamento->ViewValue = FormatNumber($this->quantidade_item_orcamento->ViewValue, 2, -2, -2, -2);
			$this->quantidade_item_orcamento->ViewCustomAttributes = "";

			// total_item_orcamento
			$this->total_item_orcamento->ViewValue = $this->total_item_orcamento->CurrentValue;
			$this->total_item_orcamento->ViewValue = FormatNumber($this->total_item_orcamento->ViewValue, 2, -2, -2, -2);
			$this->total_item_orcamento->ViewCustomAttributes = "";

			// usuario_id
			$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
			$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
			$this->usuario_id->ViewCustomAttributes = "";

			// bool_ativo_item_orcamento
			$this->bool_ativo_item_orcamento->ViewValue = $this->bool_ativo_item_orcamento->CurrentValue;
			$this->bool_ativo_item_orcamento->ViewValue = FormatNumber($this->bool_ativo_item_orcamento->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_item_orcamento->ViewCustomAttributes = "";

			// id_item_orcamento
			$this->id_item_orcamento->LinkCustomAttributes = "";
			$this->id_item_orcamento->HrefValue = "";
			$this->id_item_orcamento->TooltipValue = "";

			// data_lanc_item_orcamento
			$this->data_lanc_item_orcamento->LinkCustomAttributes = "";
			$this->data_lanc_item_orcamento->HrefValue = "";
			$this->data_lanc_item_orcamento->TooltipValue = "";

			// orcamento_id
			$this->orcamento_id->LinkCustomAttributes = "";
			$this->orcamento_id->HrefValue = "";
			$this->orcamento_id->TooltipValue = "";

			// item_id
			$this->item_id->LinkCustomAttributes = "";
			$this->item_id->HrefValue = "";
			$this->item_id->TooltipValue = "";

			// quantidade_item_orcamento
			$this->quantidade_item_orcamento->LinkCustomAttributes = "";
			$this->quantidade_item_orcamento->HrefValue = "";
			$this->quantidade_item_orcamento->TooltipValue = "";

			// total_item_orcamento
			$this->total_item_orcamento->LinkCustomAttributes = "";
			$this->total_item_orcamento->HrefValue = "";
			$this->total_item_orcamento->TooltipValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";
			$this->usuario_id->TooltipValue = "";

			// bool_ativo_item_orcamento
			$this->bool_ativo_item_orcamento->LinkCustomAttributes = "";
			$this->bool_ativo_item_orcamento->HrefValue = "";
			$this->bool_ativo_item_orcamento->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id_item_orcamento
			$this->id_item_orcamento->EditAttrs["class"] = "form-control";
			$this->id_item_orcamento->EditCustomAttributes = "";
			$this->id_item_orcamento->EditValue = $this->id_item_orcamento->CurrentValue;
			$this->id_item_orcamento->ViewCustomAttributes = "";

			// data_lanc_item_orcamento
			$this->data_lanc_item_orcamento->EditAttrs["class"] = "form-control";
			$this->data_lanc_item_orcamento->EditCustomAttributes = "";
			$this->data_lanc_item_orcamento->EditValue = HtmlEncode(FormatDateTime($this->data_lanc_item_orcamento->CurrentValue, 8));
			$this->data_lanc_item_orcamento->PlaceHolder = RemoveHtml($this->data_lanc_item_orcamento->caption());

			// orcamento_id
			$this->orcamento_id->EditAttrs["class"] = "form-control";
			$this->orcamento_id->EditCustomAttributes = "";
			$this->orcamento_id->EditValue = HtmlEncode($this->orcamento_id->CurrentValue);
			$this->orcamento_id->PlaceHolder = RemoveHtml($this->orcamento_id->caption());

			// item_id
			$this->item_id->EditAttrs["class"] = "form-control";
			$this->item_id->EditCustomAttributes = "";
			$this->item_id->EditValue = HtmlEncode($this->item_id->CurrentValue);
			$this->item_id->PlaceHolder = RemoveHtml($this->item_id->caption());

			// quantidade_item_orcamento
			$this->quantidade_item_orcamento->EditAttrs["class"] = "form-control";
			$this->quantidade_item_orcamento->EditCustomAttributes = "";
			$this->quantidade_item_orcamento->EditValue = HtmlEncode($this->quantidade_item_orcamento->CurrentValue);
			$this->quantidade_item_orcamento->PlaceHolder = RemoveHtml($this->quantidade_item_orcamento->caption());
			if (strval($this->quantidade_item_orcamento->EditValue) <> "" && is_numeric($this->quantidade_item_orcamento->EditValue))
				$this->quantidade_item_orcamento->EditValue = FormatNumber($this->quantidade_item_orcamento->EditValue, -2, -2, -2, -2);

			// total_item_orcamento
			$this->total_item_orcamento->EditAttrs["class"] = "form-control";
			$this->total_item_orcamento->EditCustomAttributes = "";
			$this->total_item_orcamento->EditValue = HtmlEncode($this->total_item_orcamento->CurrentValue);
			$this->total_item_orcamento->PlaceHolder = RemoveHtml($this->total_item_orcamento->caption());
			if (strval($this->total_item_orcamento->EditValue) <> "" && is_numeric($this->total_item_orcamento->EditValue))
				$this->total_item_orcamento->EditValue = FormatNumber($this->total_item_orcamento->EditValue, -2, -2, -2, -2);

			// usuario_id
			$this->usuario_id->EditAttrs["class"] = "form-control";
			$this->usuario_id->EditCustomAttributes = "";
			$this->usuario_id->EditValue = HtmlEncode($this->usuario_id->CurrentValue);
			$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

			// bool_ativo_item_orcamento
			$this->bool_ativo_item_orcamento->EditAttrs["class"] = "form-control";
			$this->bool_ativo_item_orcamento->EditCustomAttributes = "";
			$this->bool_ativo_item_orcamento->EditValue = HtmlEncode($this->bool_ativo_item_orcamento->CurrentValue);
			$this->bool_ativo_item_orcamento->PlaceHolder = RemoveHtml($this->bool_ativo_item_orcamento->caption());

			// Edit refer script
			// id_item_orcamento

			$this->id_item_orcamento->LinkCustomAttributes = "";
			$this->id_item_orcamento->HrefValue = "";

			// data_lanc_item_orcamento
			$this->data_lanc_item_orcamento->LinkCustomAttributes = "";
			$this->data_lanc_item_orcamento->HrefValue = "";

			// orcamento_id
			$this->orcamento_id->LinkCustomAttributes = "";
			$this->orcamento_id->HrefValue = "";

			// item_id
			$this->item_id->LinkCustomAttributes = "";
			$this->item_id->HrefValue = "";

			// quantidade_item_orcamento
			$this->quantidade_item_orcamento->LinkCustomAttributes = "";
			$this->quantidade_item_orcamento->HrefValue = "";

			// total_item_orcamento
			$this->total_item_orcamento->LinkCustomAttributes = "";
			$this->total_item_orcamento->HrefValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";

			// bool_ativo_item_orcamento
			$this->bool_ativo_item_orcamento->LinkCustomAttributes = "";
			$this->bool_ativo_item_orcamento->HrefValue = "";
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
		if ($this->id_item_orcamento->Required) {
			if (!$this->id_item_orcamento->IsDetailKey && $this->id_item_orcamento->FormValue != NULL && $this->id_item_orcamento->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_item_orcamento->caption(), $this->id_item_orcamento->RequiredErrorMessage));
			}
		}
		if ($this->data_lanc_item_orcamento->Required) {
			if (!$this->data_lanc_item_orcamento->IsDetailKey && $this->data_lanc_item_orcamento->FormValue != NULL && $this->data_lanc_item_orcamento->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->data_lanc_item_orcamento->caption(), $this->data_lanc_item_orcamento->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->data_lanc_item_orcamento->FormValue)) {
			AddMessage($FormError, $this->data_lanc_item_orcamento->errorMessage());
		}
		if ($this->orcamento_id->Required) {
			if (!$this->orcamento_id->IsDetailKey && $this->orcamento_id->FormValue != NULL && $this->orcamento_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->orcamento_id->caption(), $this->orcamento_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->orcamento_id->FormValue)) {
			AddMessage($FormError, $this->orcamento_id->errorMessage());
		}
		if ($this->item_id->Required) {
			if (!$this->item_id->IsDetailKey && $this->item_id->FormValue != NULL && $this->item_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->item_id->caption(), $this->item_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->item_id->FormValue)) {
			AddMessage($FormError, $this->item_id->errorMessage());
		}
		if ($this->quantidade_item_orcamento->Required) {
			if (!$this->quantidade_item_orcamento->IsDetailKey && $this->quantidade_item_orcamento->FormValue != NULL && $this->quantidade_item_orcamento->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->quantidade_item_orcamento->caption(), $this->quantidade_item_orcamento->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->quantidade_item_orcamento->FormValue)) {
			AddMessage($FormError, $this->quantidade_item_orcamento->errorMessage());
		}
		if ($this->total_item_orcamento->Required) {
			if (!$this->total_item_orcamento->IsDetailKey && $this->total_item_orcamento->FormValue != NULL && $this->total_item_orcamento->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->total_item_orcamento->caption(), $this->total_item_orcamento->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->total_item_orcamento->FormValue)) {
			AddMessage($FormError, $this->total_item_orcamento->errorMessage());
		}
		if ($this->usuario_id->Required) {
			if (!$this->usuario_id->IsDetailKey && $this->usuario_id->FormValue != NULL && $this->usuario_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usuario_id->caption(), $this->usuario_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->usuario_id->FormValue)) {
			AddMessage($FormError, $this->usuario_id->errorMessage());
		}
		if ($this->bool_ativo_item_orcamento->Required) {
			if (!$this->bool_ativo_item_orcamento->IsDetailKey && $this->bool_ativo_item_orcamento->FormValue != NULL && $this->bool_ativo_item_orcamento->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_item_orcamento->caption(), $this->bool_ativo_item_orcamento->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_item_orcamento->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_item_orcamento->errorMessage());
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

			// data_lanc_item_orcamento
			$this->data_lanc_item_orcamento->setDbValueDef($rsnew, UnFormatDateTime($this->data_lanc_item_orcamento->CurrentValue, 0), CurrentDate(), $this->data_lanc_item_orcamento->ReadOnly);

			// orcamento_id
			$this->orcamento_id->setDbValueDef($rsnew, $this->orcamento_id->CurrentValue, 0, $this->orcamento_id->ReadOnly);

			// item_id
			$this->item_id->setDbValueDef($rsnew, $this->item_id->CurrentValue, 0, $this->item_id->ReadOnly);

			// quantidade_item_orcamento
			$this->quantidade_item_orcamento->setDbValueDef($rsnew, $this->quantidade_item_orcamento->CurrentValue, 0, $this->quantidade_item_orcamento->ReadOnly);

			// total_item_orcamento
			$this->total_item_orcamento->setDbValueDef($rsnew, $this->total_item_orcamento->CurrentValue, 0, $this->total_item_orcamento->ReadOnly);

			// usuario_id
			$this->usuario_id->setDbValueDef($rsnew, $this->usuario_id->CurrentValue, 0, $this->usuario_id->ReadOnly);

			// bool_ativo_item_orcamento
			$this->bool_ativo_item_orcamento->setDbValueDef($rsnew, $this->bool_ativo_item_orcamento->CurrentValue, NULL, $this->bool_ativo_item_orcamento->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("item_orcamentolist.php"), "", $this->TableVar, TRUE);
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
