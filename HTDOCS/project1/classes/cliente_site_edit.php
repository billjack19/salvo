<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class cliente_site_edit extends cliente_site
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'cliente_site';

	// Page object name
	public $PageObjName = "cliente_site_edit";

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

		// Table object (cliente_site)
		if (!isset($GLOBALS["cliente_site"]) || get_class($GLOBALS["cliente_site"]) == PROJECT_NAMESPACE . "cliente_site") {
			$GLOBALS["cliente_site"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["cliente_site"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'cliente_site');

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
		global $EXPORT, $cliente_site;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($cliente_site);
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
					if ($pageName == "cliente_siteview.php")
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
			$key .= @$ar['id_cliente_site'];
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
			$this->id_cliente_site->Visible = FALSE;
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
		$this->id_cliente_site->setVisibility();
		$this->nome_cliente_site->setVisibility();
		$this->login_cliente_site->setVisibility();
		$this->senha_cliente_site->setVisibility();
		$this->telefone_cliente_site->setVisibility();
		$this->celular_cliente_site->setVisibility();
		$this->endereco_cliente_site->setVisibility();
		$this->numero_cliente_site->setVisibility();
		$this->complemento_cliente_site->setVisibility();
		$this->bairro_cliente_site->setVisibility();
		$this->cidade_cliente_site->setVisibility();
		$this->estado_id->setVisibility();
		$this->cep_cliente_site->setVisibility();
		$this->data_atualizacao_cliente_site->setVisibility();
		$this->usuario_id->setVisibility();
		$this->bool_ativo_cliente_site->setVisibility();
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
			if ($CurrentForm->hasValue("x_id_cliente_site")) {
				$this->id_cliente_site->setFormValue($CurrentForm->getValue("x_id_cliente_site"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id_cliente_site") !== NULL) {
				$this->id_cliente_site->setQueryStringValue(Get("id_cliente_site"));
				$loadByQuery = TRUE;
			} else {
				$this->id_cliente_site->CurrentValue = NULL;
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
					$this->terminate("cliente_sitelist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "cliente_sitelist.php")
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

		// Check field name 'id_cliente_site' first before field var 'x_id_cliente_site'
		$val = $CurrentForm->hasValue("id_cliente_site") ? $CurrentForm->getValue("id_cliente_site") : $CurrentForm->getValue("x_id_cliente_site");
		if (!$this->id_cliente_site->IsDetailKey)
			$this->id_cliente_site->setFormValue($val);

		// Check field name 'nome_cliente_site' first before field var 'x_nome_cliente_site'
		$val = $CurrentForm->hasValue("nome_cliente_site") ? $CurrentForm->getValue("nome_cliente_site") : $CurrentForm->getValue("x_nome_cliente_site");
		if (!$this->nome_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nome_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->nome_cliente_site->setFormValue($val);
		}

		// Check field name 'login_cliente_site' first before field var 'x_login_cliente_site'
		$val = $CurrentForm->hasValue("login_cliente_site") ? $CurrentForm->getValue("login_cliente_site") : $CurrentForm->getValue("x_login_cliente_site");
		if (!$this->login_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->login_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->login_cliente_site->setFormValue($val);
		}

		// Check field name 'senha_cliente_site' first before field var 'x_senha_cliente_site'
		$val = $CurrentForm->hasValue("senha_cliente_site") ? $CurrentForm->getValue("senha_cliente_site") : $CurrentForm->getValue("x_senha_cliente_site");
		if (!$this->senha_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->senha_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->senha_cliente_site->setFormValue($val);
		}

		// Check field name 'telefone_cliente_site' first before field var 'x_telefone_cliente_site'
		$val = $CurrentForm->hasValue("telefone_cliente_site") ? $CurrentForm->getValue("telefone_cliente_site") : $CurrentForm->getValue("x_telefone_cliente_site");
		if (!$this->telefone_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->telefone_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->telefone_cliente_site->setFormValue($val);
		}

		// Check field name 'celular_cliente_site' first before field var 'x_celular_cliente_site'
		$val = $CurrentForm->hasValue("celular_cliente_site") ? $CurrentForm->getValue("celular_cliente_site") : $CurrentForm->getValue("x_celular_cliente_site");
		if (!$this->celular_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->celular_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->celular_cliente_site->setFormValue($val);
		}

		// Check field name 'endereco_cliente_site' first before field var 'x_endereco_cliente_site'
		$val = $CurrentForm->hasValue("endereco_cliente_site") ? $CurrentForm->getValue("endereco_cliente_site") : $CurrentForm->getValue("x_endereco_cliente_site");
		if (!$this->endereco_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->endereco_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->endereco_cliente_site->setFormValue($val);
		}

		// Check field name 'numero_cliente_site' first before field var 'x_numero_cliente_site'
		$val = $CurrentForm->hasValue("numero_cliente_site") ? $CurrentForm->getValue("numero_cliente_site") : $CurrentForm->getValue("x_numero_cliente_site");
		if (!$this->numero_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->numero_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->numero_cliente_site->setFormValue($val);
		}

		// Check field name 'complemento_cliente_site' first before field var 'x_complemento_cliente_site'
		$val = $CurrentForm->hasValue("complemento_cliente_site") ? $CurrentForm->getValue("complemento_cliente_site") : $CurrentForm->getValue("x_complemento_cliente_site");
		if (!$this->complemento_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->complemento_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->complemento_cliente_site->setFormValue($val);
		}

		// Check field name 'bairro_cliente_site' first before field var 'x_bairro_cliente_site'
		$val = $CurrentForm->hasValue("bairro_cliente_site") ? $CurrentForm->getValue("bairro_cliente_site") : $CurrentForm->getValue("x_bairro_cliente_site");
		if (!$this->bairro_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bairro_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->bairro_cliente_site->setFormValue($val);
		}

		// Check field name 'cidade_cliente_site' first before field var 'x_cidade_cliente_site'
		$val = $CurrentForm->hasValue("cidade_cliente_site") ? $CurrentForm->getValue("cidade_cliente_site") : $CurrentForm->getValue("x_cidade_cliente_site");
		if (!$this->cidade_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cidade_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->cidade_cliente_site->setFormValue($val);
		}

		// Check field name 'estado_id' first before field var 'x_estado_id'
		$val = $CurrentForm->hasValue("estado_id") ? $CurrentForm->getValue("estado_id") : $CurrentForm->getValue("x_estado_id");
		if (!$this->estado_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->estado_id->Visible = FALSE; // Disable update for API request
			else
				$this->estado_id->setFormValue($val);
		}

		// Check field name 'cep_cliente_site' first before field var 'x_cep_cliente_site'
		$val = $CurrentForm->hasValue("cep_cliente_site") ? $CurrentForm->getValue("cep_cliente_site") : $CurrentForm->getValue("x_cep_cliente_site");
		if (!$this->cep_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cep_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->cep_cliente_site->setFormValue($val);
		}

		// Check field name 'data_atualizacao_cliente_site' first before field var 'x_data_atualizacao_cliente_site'
		$val = $CurrentForm->hasValue("data_atualizacao_cliente_site") ? $CurrentForm->getValue("data_atualizacao_cliente_site") : $CurrentForm->getValue("x_data_atualizacao_cliente_site");
		if (!$this->data_atualizacao_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->data_atualizacao_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->data_atualizacao_cliente_site->setFormValue($val);
			$this->data_atualizacao_cliente_site->CurrentValue = UnFormatDateTime($this->data_atualizacao_cliente_site->CurrentValue, 0);
		}

		// Check field name 'usuario_id' first before field var 'x_usuario_id'
		$val = $CurrentForm->hasValue("usuario_id") ? $CurrentForm->getValue("usuario_id") : $CurrentForm->getValue("x_usuario_id");
		if (!$this->usuario_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usuario_id->Visible = FALSE; // Disable update for API request
			else
				$this->usuario_id->setFormValue($val);
		}

		// Check field name 'bool_ativo_cliente_site' first before field var 'x_bool_ativo_cliente_site'
		$val = $CurrentForm->hasValue("bool_ativo_cliente_site") ? $CurrentForm->getValue("bool_ativo_cliente_site") : $CurrentForm->getValue("x_bool_ativo_cliente_site");
		if (!$this->bool_ativo_cliente_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_cliente_site->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_cliente_site->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id_cliente_site->CurrentValue = $this->id_cliente_site->FormValue;
		$this->nome_cliente_site->CurrentValue = $this->nome_cliente_site->FormValue;
		$this->login_cliente_site->CurrentValue = $this->login_cliente_site->FormValue;
		$this->senha_cliente_site->CurrentValue = $this->senha_cliente_site->FormValue;
		$this->telefone_cliente_site->CurrentValue = $this->telefone_cliente_site->FormValue;
		$this->celular_cliente_site->CurrentValue = $this->celular_cliente_site->FormValue;
		$this->endereco_cliente_site->CurrentValue = $this->endereco_cliente_site->FormValue;
		$this->numero_cliente_site->CurrentValue = $this->numero_cliente_site->FormValue;
		$this->complemento_cliente_site->CurrentValue = $this->complemento_cliente_site->FormValue;
		$this->bairro_cliente_site->CurrentValue = $this->bairro_cliente_site->FormValue;
		$this->cidade_cliente_site->CurrentValue = $this->cidade_cliente_site->FormValue;
		$this->estado_id->CurrentValue = $this->estado_id->FormValue;
		$this->cep_cliente_site->CurrentValue = $this->cep_cliente_site->FormValue;
		$this->data_atualizacao_cliente_site->CurrentValue = $this->data_atualizacao_cliente_site->FormValue;
		$this->data_atualizacao_cliente_site->CurrentValue = UnFormatDateTime($this->data_atualizacao_cliente_site->CurrentValue, 0);
		$this->usuario_id->CurrentValue = $this->usuario_id->FormValue;
		$this->bool_ativo_cliente_site->CurrentValue = $this->bool_ativo_cliente_site->FormValue;
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
		$this->id_cliente_site->setDbValue($row['id_cliente_site']);
		$this->nome_cliente_site->setDbValue($row['nome_cliente_site']);
		$this->login_cliente_site->setDbValue($row['login_cliente_site']);
		$this->senha_cliente_site->setDbValue($row['senha_cliente_site']);
		$this->telefone_cliente_site->setDbValue($row['telefone_cliente_site']);
		$this->celular_cliente_site->setDbValue($row['celular_cliente_site']);
		$this->endereco_cliente_site->setDbValue($row['endereco_cliente_site']);
		$this->numero_cliente_site->setDbValue($row['numero_cliente_site']);
		$this->complemento_cliente_site->setDbValue($row['complemento_cliente_site']);
		$this->bairro_cliente_site->setDbValue($row['bairro_cliente_site']);
		$this->cidade_cliente_site->setDbValue($row['cidade_cliente_site']);
		$this->estado_id->setDbValue($row['estado_id']);
		$this->cep_cliente_site->setDbValue($row['cep_cliente_site']);
		$this->data_atualizacao_cliente_site->setDbValue($row['data_atualizacao_cliente_site']);
		$this->usuario_id->setDbValue($row['usuario_id']);
		$this->bool_ativo_cliente_site->setDbValue($row['bool_ativo_cliente_site']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id_cliente_site'] = NULL;
		$row['nome_cliente_site'] = NULL;
		$row['login_cliente_site'] = NULL;
		$row['senha_cliente_site'] = NULL;
		$row['telefone_cliente_site'] = NULL;
		$row['celular_cliente_site'] = NULL;
		$row['endereco_cliente_site'] = NULL;
		$row['numero_cliente_site'] = NULL;
		$row['complemento_cliente_site'] = NULL;
		$row['bairro_cliente_site'] = NULL;
		$row['cidade_cliente_site'] = NULL;
		$row['estado_id'] = NULL;
		$row['cep_cliente_site'] = NULL;
		$row['data_atualizacao_cliente_site'] = NULL;
		$row['usuario_id'] = NULL;
		$row['bool_ativo_cliente_site'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_cliente_site")) <> "")
			$this->id_cliente_site->CurrentValue = $this->getKey("id_cliente_site"); // id_cliente_site
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
		// id_cliente_site
		// nome_cliente_site
		// login_cliente_site
		// senha_cliente_site
		// telefone_cliente_site
		// celular_cliente_site
		// endereco_cliente_site
		// numero_cliente_site
		// complemento_cliente_site
		// bairro_cliente_site
		// cidade_cliente_site
		// estado_id
		// cep_cliente_site
		// data_atualizacao_cliente_site
		// usuario_id
		// bool_ativo_cliente_site

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_cliente_site
			$this->id_cliente_site->ViewValue = $this->id_cliente_site->CurrentValue;
			$this->id_cliente_site->ViewCustomAttributes = "";

			// nome_cliente_site
			$this->nome_cliente_site->ViewValue = $this->nome_cliente_site->CurrentValue;
			$this->nome_cliente_site->ViewCustomAttributes = "";

			// login_cliente_site
			$this->login_cliente_site->ViewValue = $this->login_cliente_site->CurrentValue;
			$this->login_cliente_site->ViewCustomAttributes = "";

			// senha_cliente_site
			$this->senha_cliente_site->ViewValue = $this->senha_cliente_site->CurrentValue;
			$this->senha_cliente_site->ViewCustomAttributes = "";

			// telefone_cliente_site
			$this->telefone_cliente_site->ViewValue = $this->telefone_cliente_site->CurrentValue;
			$this->telefone_cliente_site->ViewCustomAttributes = "";

			// celular_cliente_site
			$this->celular_cliente_site->ViewValue = $this->celular_cliente_site->CurrentValue;
			$this->celular_cliente_site->ViewCustomAttributes = "";

			// endereco_cliente_site
			$this->endereco_cliente_site->ViewValue = $this->endereco_cliente_site->CurrentValue;
			$this->endereco_cliente_site->ViewCustomAttributes = "";

			// numero_cliente_site
			$this->numero_cliente_site->ViewValue = $this->numero_cliente_site->CurrentValue;
			$this->numero_cliente_site->ViewValue = FormatNumber($this->numero_cliente_site->ViewValue, 0, -2, -2, -2);
			$this->numero_cliente_site->ViewCustomAttributes = "";

			// complemento_cliente_site
			$this->complemento_cliente_site->ViewValue = $this->complemento_cliente_site->CurrentValue;
			$this->complemento_cliente_site->ViewCustomAttributes = "";

			// bairro_cliente_site
			$this->bairro_cliente_site->ViewValue = $this->bairro_cliente_site->CurrentValue;
			$this->bairro_cliente_site->ViewCustomAttributes = "";

			// cidade_cliente_site
			$this->cidade_cliente_site->ViewValue = $this->cidade_cliente_site->CurrentValue;
			$this->cidade_cliente_site->ViewCustomAttributes = "";

			// estado_id
			$this->estado_id->ViewValue = $this->estado_id->CurrentValue;
			$this->estado_id->ViewValue = FormatNumber($this->estado_id->ViewValue, 0, -2, -2, -2);
			$this->estado_id->ViewCustomAttributes = "";

			// cep_cliente_site
			$this->cep_cliente_site->ViewValue = $this->cep_cliente_site->CurrentValue;
			$this->cep_cliente_site->ViewCustomAttributes = "";

			// data_atualizacao_cliente_site
			$this->data_atualizacao_cliente_site->ViewValue = $this->data_atualizacao_cliente_site->CurrentValue;
			$this->data_atualizacao_cliente_site->ViewValue = FormatDateTime($this->data_atualizacao_cliente_site->ViewValue, 0);
			$this->data_atualizacao_cliente_site->ViewCustomAttributes = "";

			// usuario_id
			$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
			$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
			$this->usuario_id->ViewCustomAttributes = "";

			// bool_ativo_cliente_site
			$this->bool_ativo_cliente_site->ViewValue = $this->bool_ativo_cliente_site->CurrentValue;
			$this->bool_ativo_cliente_site->ViewValue = FormatNumber($this->bool_ativo_cliente_site->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_cliente_site->ViewCustomAttributes = "";

			// id_cliente_site
			$this->id_cliente_site->LinkCustomAttributes = "";
			$this->id_cliente_site->HrefValue = "";
			$this->id_cliente_site->TooltipValue = "";

			// nome_cliente_site
			$this->nome_cliente_site->LinkCustomAttributes = "";
			$this->nome_cliente_site->HrefValue = "";
			$this->nome_cliente_site->TooltipValue = "";

			// login_cliente_site
			$this->login_cliente_site->LinkCustomAttributes = "";
			$this->login_cliente_site->HrefValue = "";
			$this->login_cliente_site->TooltipValue = "";

			// senha_cliente_site
			$this->senha_cliente_site->LinkCustomAttributes = "";
			$this->senha_cliente_site->HrefValue = "";
			$this->senha_cliente_site->TooltipValue = "";

			// telefone_cliente_site
			$this->telefone_cliente_site->LinkCustomAttributes = "";
			$this->telefone_cliente_site->HrefValue = "";
			$this->telefone_cliente_site->TooltipValue = "";

			// celular_cliente_site
			$this->celular_cliente_site->LinkCustomAttributes = "";
			$this->celular_cliente_site->HrefValue = "";
			$this->celular_cliente_site->TooltipValue = "";

			// endereco_cliente_site
			$this->endereco_cliente_site->LinkCustomAttributes = "";
			$this->endereco_cliente_site->HrefValue = "";
			$this->endereco_cliente_site->TooltipValue = "";

			// numero_cliente_site
			$this->numero_cliente_site->LinkCustomAttributes = "";
			$this->numero_cliente_site->HrefValue = "";
			$this->numero_cliente_site->TooltipValue = "";

			// complemento_cliente_site
			$this->complemento_cliente_site->LinkCustomAttributes = "";
			$this->complemento_cliente_site->HrefValue = "";
			$this->complemento_cliente_site->TooltipValue = "";

			// bairro_cliente_site
			$this->bairro_cliente_site->LinkCustomAttributes = "";
			$this->bairro_cliente_site->HrefValue = "";
			$this->bairro_cliente_site->TooltipValue = "";

			// cidade_cliente_site
			$this->cidade_cliente_site->LinkCustomAttributes = "";
			$this->cidade_cliente_site->HrefValue = "";
			$this->cidade_cliente_site->TooltipValue = "";

			// estado_id
			$this->estado_id->LinkCustomAttributes = "";
			$this->estado_id->HrefValue = "";
			$this->estado_id->TooltipValue = "";

			// cep_cliente_site
			$this->cep_cliente_site->LinkCustomAttributes = "";
			$this->cep_cliente_site->HrefValue = "";
			$this->cep_cliente_site->TooltipValue = "";

			// data_atualizacao_cliente_site
			$this->data_atualizacao_cliente_site->LinkCustomAttributes = "";
			$this->data_atualizacao_cliente_site->HrefValue = "";
			$this->data_atualizacao_cliente_site->TooltipValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";
			$this->usuario_id->TooltipValue = "";

			// bool_ativo_cliente_site
			$this->bool_ativo_cliente_site->LinkCustomAttributes = "";
			$this->bool_ativo_cliente_site->HrefValue = "";
			$this->bool_ativo_cliente_site->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id_cliente_site
			$this->id_cliente_site->EditAttrs["class"] = "form-control";
			$this->id_cliente_site->EditCustomAttributes = "";
			$this->id_cliente_site->EditValue = $this->id_cliente_site->CurrentValue;
			$this->id_cliente_site->ViewCustomAttributes = "";

			// nome_cliente_site
			$this->nome_cliente_site->EditAttrs["class"] = "form-control";
			$this->nome_cliente_site->EditCustomAttributes = "";
			$this->nome_cliente_site->EditValue = HtmlEncode($this->nome_cliente_site->CurrentValue);
			$this->nome_cliente_site->PlaceHolder = RemoveHtml($this->nome_cliente_site->caption());

			// login_cliente_site
			$this->login_cliente_site->EditAttrs["class"] = "form-control";
			$this->login_cliente_site->EditCustomAttributes = "";
			$this->login_cliente_site->EditValue = HtmlEncode($this->login_cliente_site->CurrentValue);
			$this->login_cliente_site->PlaceHolder = RemoveHtml($this->login_cliente_site->caption());

			// senha_cliente_site
			$this->senha_cliente_site->EditAttrs["class"] = "form-control";
			$this->senha_cliente_site->EditCustomAttributes = "";
			$this->senha_cliente_site->EditValue = HtmlEncode($this->senha_cliente_site->CurrentValue);
			$this->senha_cliente_site->PlaceHolder = RemoveHtml($this->senha_cliente_site->caption());

			// telefone_cliente_site
			$this->telefone_cliente_site->EditAttrs["class"] = "form-control";
			$this->telefone_cliente_site->EditCustomAttributes = "";
			$this->telefone_cliente_site->EditValue = HtmlEncode($this->telefone_cliente_site->CurrentValue);
			$this->telefone_cliente_site->PlaceHolder = RemoveHtml($this->telefone_cliente_site->caption());

			// celular_cliente_site
			$this->celular_cliente_site->EditAttrs["class"] = "form-control";
			$this->celular_cliente_site->EditCustomAttributes = "";
			$this->celular_cliente_site->EditValue = HtmlEncode($this->celular_cliente_site->CurrentValue);
			$this->celular_cliente_site->PlaceHolder = RemoveHtml($this->celular_cliente_site->caption());

			// endereco_cliente_site
			$this->endereco_cliente_site->EditAttrs["class"] = "form-control";
			$this->endereco_cliente_site->EditCustomAttributes = "";
			$this->endereco_cliente_site->EditValue = HtmlEncode($this->endereco_cliente_site->CurrentValue);
			$this->endereco_cliente_site->PlaceHolder = RemoveHtml($this->endereco_cliente_site->caption());

			// numero_cliente_site
			$this->numero_cliente_site->EditAttrs["class"] = "form-control";
			$this->numero_cliente_site->EditCustomAttributes = "";
			$this->numero_cliente_site->EditValue = HtmlEncode($this->numero_cliente_site->CurrentValue);
			$this->numero_cliente_site->PlaceHolder = RemoveHtml($this->numero_cliente_site->caption());

			// complemento_cliente_site
			$this->complemento_cliente_site->EditAttrs["class"] = "form-control";
			$this->complemento_cliente_site->EditCustomAttributes = "";
			$this->complemento_cliente_site->EditValue = HtmlEncode($this->complemento_cliente_site->CurrentValue);
			$this->complemento_cliente_site->PlaceHolder = RemoveHtml($this->complemento_cliente_site->caption());

			// bairro_cliente_site
			$this->bairro_cliente_site->EditAttrs["class"] = "form-control";
			$this->bairro_cliente_site->EditCustomAttributes = "";
			$this->bairro_cliente_site->EditValue = HtmlEncode($this->bairro_cliente_site->CurrentValue);
			$this->bairro_cliente_site->PlaceHolder = RemoveHtml($this->bairro_cliente_site->caption());

			// cidade_cliente_site
			$this->cidade_cliente_site->EditAttrs["class"] = "form-control";
			$this->cidade_cliente_site->EditCustomAttributes = "";
			$this->cidade_cliente_site->EditValue = HtmlEncode($this->cidade_cliente_site->CurrentValue);
			$this->cidade_cliente_site->PlaceHolder = RemoveHtml($this->cidade_cliente_site->caption());

			// estado_id
			$this->estado_id->EditAttrs["class"] = "form-control";
			$this->estado_id->EditCustomAttributes = "";
			$this->estado_id->EditValue = HtmlEncode($this->estado_id->CurrentValue);
			$this->estado_id->PlaceHolder = RemoveHtml($this->estado_id->caption());

			// cep_cliente_site
			$this->cep_cliente_site->EditAttrs["class"] = "form-control";
			$this->cep_cliente_site->EditCustomAttributes = "";
			$this->cep_cliente_site->EditValue = HtmlEncode($this->cep_cliente_site->CurrentValue);
			$this->cep_cliente_site->PlaceHolder = RemoveHtml($this->cep_cliente_site->caption());

			// data_atualizacao_cliente_site
			$this->data_atualizacao_cliente_site->EditAttrs["class"] = "form-control";
			$this->data_atualizacao_cliente_site->EditCustomAttributes = "";
			$this->data_atualizacao_cliente_site->EditValue = HtmlEncode(FormatDateTime($this->data_atualizacao_cliente_site->CurrentValue, 8));
			$this->data_atualizacao_cliente_site->PlaceHolder = RemoveHtml($this->data_atualizacao_cliente_site->caption());

			// usuario_id
			$this->usuario_id->EditAttrs["class"] = "form-control";
			$this->usuario_id->EditCustomAttributes = "";
			$this->usuario_id->EditValue = HtmlEncode($this->usuario_id->CurrentValue);
			$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

			// bool_ativo_cliente_site
			$this->bool_ativo_cliente_site->EditAttrs["class"] = "form-control";
			$this->bool_ativo_cliente_site->EditCustomAttributes = "";
			$this->bool_ativo_cliente_site->EditValue = HtmlEncode($this->bool_ativo_cliente_site->CurrentValue);
			$this->bool_ativo_cliente_site->PlaceHolder = RemoveHtml($this->bool_ativo_cliente_site->caption());

			// Edit refer script
			// id_cliente_site

			$this->id_cliente_site->LinkCustomAttributes = "";
			$this->id_cliente_site->HrefValue = "";

			// nome_cliente_site
			$this->nome_cliente_site->LinkCustomAttributes = "";
			$this->nome_cliente_site->HrefValue = "";

			// login_cliente_site
			$this->login_cliente_site->LinkCustomAttributes = "";
			$this->login_cliente_site->HrefValue = "";

			// senha_cliente_site
			$this->senha_cliente_site->LinkCustomAttributes = "";
			$this->senha_cliente_site->HrefValue = "";

			// telefone_cliente_site
			$this->telefone_cliente_site->LinkCustomAttributes = "";
			$this->telefone_cliente_site->HrefValue = "";

			// celular_cliente_site
			$this->celular_cliente_site->LinkCustomAttributes = "";
			$this->celular_cliente_site->HrefValue = "";

			// endereco_cliente_site
			$this->endereco_cliente_site->LinkCustomAttributes = "";
			$this->endereco_cliente_site->HrefValue = "";

			// numero_cliente_site
			$this->numero_cliente_site->LinkCustomAttributes = "";
			$this->numero_cliente_site->HrefValue = "";

			// complemento_cliente_site
			$this->complemento_cliente_site->LinkCustomAttributes = "";
			$this->complemento_cliente_site->HrefValue = "";

			// bairro_cliente_site
			$this->bairro_cliente_site->LinkCustomAttributes = "";
			$this->bairro_cliente_site->HrefValue = "";

			// cidade_cliente_site
			$this->cidade_cliente_site->LinkCustomAttributes = "";
			$this->cidade_cliente_site->HrefValue = "";

			// estado_id
			$this->estado_id->LinkCustomAttributes = "";
			$this->estado_id->HrefValue = "";

			// cep_cliente_site
			$this->cep_cliente_site->LinkCustomAttributes = "";
			$this->cep_cliente_site->HrefValue = "";

			// data_atualizacao_cliente_site
			$this->data_atualizacao_cliente_site->LinkCustomAttributes = "";
			$this->data_atualizacao_cliente_site->HrefValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";

			// bool_ativo_cliente_site
			$this->bool_ativo_cliente_site->LinkCustomAttributes = "";
			$this->bool_ativo_cliente_site->HrefValue = "";
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
		if ($this->id_cliente_site->Required) {
			if (!$this->id_cliente_site->IsDetailKey && $this->id_cliente_site->FormValue != NULL && $this->id_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_cliente_site->caption(), $this->id_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->nome_cliente_site->Required) {
			if (!$this->nome_cliente_site->IsDetailKey && $this->nome_cliente_site->FormValue != NULL && $this->nome_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nome_cliente_site->caption(), $this->nome_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->login_cliente_site->Required) {
			if (!$this->login_cliente_site->IsDetailKey && $this->login_cliente_site->FormValue != NULL && $this->login_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->login_cliente_site->caption(), $this->login_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->senha_cliente_site->Required) {
			if (!$this->senha_cliente_site->IsDetailKey && $this->senha_cliente_site->FormValue != NULL && $this->senha_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->senha_cliente_site->caption(), $this->senha_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->telefone_cliente_site->Required) {
			if (!$this->telefone_cliente_site->IsDetailKey && $this->telefone_cliente_site->FormValue != NULL && $this->telefone_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefone_cliente_site->caption(), $this->telefone_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->celular_cliente_site->Required) {
			if (!$this->celular_cliente_site->IsDetailKey && $this->celular_cliente_site->FormValue != NULL && $this->celular_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->celular_cliente_site->caption(), $this->celular_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->endereco_cliente_site->Required) {
			if (!$this->endereco_cliente_site->IsDetailKey && $this->endereco_cliente_site->FormValue != NULL && $this->endereco_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->endereco_cliente_site->caption(), $this->endereco_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->numero_cliente_site->Required) {
			if (!$this->numero_cliente_site->IsDetailKey && $this->numero_cliente_site->FormValue != NULL && $this->numero_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->numero_cliente_site->caption(), $this->numero_cliente_site->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->numero_cliente_site->FormValue)) {
			AddMessage($FormError, $this->numero_cliente_site->errorMessage());
		}
		if ($this->complemento_cliente_site->Required) {
			if (!$this->complemento_cliente_site->IsDetailKey && $this->complemento_cliente_site->FormValue != NULL && $this->complemento_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->complemento_cliente_site->caption(), $this->complemento_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->bairro_cliente_site->Required) {
			if (!$this->bairro_cliente_site->IsDetailKey && $this->bairro_cliente_site->FormValue != NULL && $this->bairro_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bairro_cliente_site->caption(), $this->bairro_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->cidade_cliente_site->Required) {
			if (!$this->cidade_cliente_site->IsDetailKey && $this->cidade_cliente_site->FormValue != NULL && $this->cidade_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cidade_cliente_site->caption(), $this->cidade_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->estado_id->Required) {
			if (!$this->estado_id->IsDetailKey && $this->estado_id->FormValue != NULL && $this->estado_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->estado_id->caption(), $this->estado_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->estado_id->FormValue)) {
			AddMessage($FormError, $this->estado_id->errorMessage());
		}
		if ($this->cep_cliente_site->Required) {
			if (!$this->cep_cliente_site->IsDetailKey && $this->cep_cliente_site->FormValue != NULL && $this->cep_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cep_cliente_site->caption(), $this->cep_cliente_site->RequiredErrorMessage));
			}
		}
		if ($this->data_atualizacao_cliente_site->Required) {
			if (!$this->data_atualizacao_cliente_site->IsDetailKey && $this->data_atualizacao_cliente_site->FormValue != NULL && $this->data_atualizacao_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->data_atualizacao_cliente_site->caption(), $this->data_atualizacao_cliente_site->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->data_atualizacao_cliente_site->FormValue)) {
			AddMessage($FormError, $this->data_atualizacao_cliente_site->errorMessage());
		}
		if ($this->usuario_id->Required) {
			if (!$this->usuario_id->IsDetailKey && $this->usuario_id->FormValue != NULL && $this->usuario_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usuario_id->caption(), $this->usuario_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->usuario_id->FormValue)) {
			AddMessage($FormError, $this->usuario_id->errorMessage());
		}
		if ($this->bool_ativo_cliente_site->Required) {
			if (!$this->bool_ativo_cliente_site->IsDetailKey && $this->bool_ativo_cliente_site->FormValue != NULL && $this->bool_ativo_cliente_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_cliente_site->caption(), $this->bool_ativo_cliente_site->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_cliente_site->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_cliente_site->errorMessage());
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

			// nome_cliente_site
			$this->nome_cliente_site->setDbValueDef($rsnew, $this->nome_cliente_site->CurrentValue, "", $this->nome_cliente_site->ReadOnly);

			// login_cliente_site
			$this->login_cliente_site->setDbValueDef($rsnew, $this->login_cliente_site->CurrentValue, "", $this->login_cliente_site->ReadOnly);

			// senha_cliente_site
			$this->senha_cliente_site->setDbValueDef($rsnew, $this->senha_cliente_site->CurrentValue, "", $this->senha_cliente_site->ReadOnly);

			// telefone_cliente_site
			$this->telefone_cliente_site->setDbValueDef($rsnew, $this->telefone_cliente_site->CurrentValue, "", $this->telefone_cliente_site->ReadOnly);

			// celular_cliente_site
			$this->celular_cliente_site->setDbValueDef($rsnew, $this->celular_cliente_site->CurrentValue, NULL, $this->celular_cliente_site->ReadOnly);

			// endereco_cliente_site
			$this->endereco_cliente_site->setDbValueDef($rsnew, $this->endereco_cliente_site->CurrentValue, NULL, $this->endereco_cliente_site->ReadOnly);

			// numero_cliente_site
			$this->numero_cliente_site->setDbValueDef($rsnew, $this->numero_cliente_site->CurrentValue, NULL, $this->numero_cliente_site->ReadOnly);

			// complemento_cliente_site
			$this->complemento_cliente_site->setDbValueDef($rsnew, $this->complemento_cliente_site->CurrentValue, NULL, $this->complemento_cliente_site->ReadOnly);

			// bairro_cliente_site
			$this->bairro_cliente_site->setDbValueDef($rsnew, $this->bairro_cliente_site->CurrentValue, NULL, $this->bairro_cliente_site->ReadOnly);

			// cidade_cliente_site
			$this->cidade_cliente_site->setDbValueDef($rsnew, $this->cidade_cliente_site->CurrentValue, NULL, $this->cidade_cliente_site->ReadOnly);

			// estado_id
			$this->estado_id->setDbValueDef($rsnew, $this->estado_id->CurrentValue, NULL, $this->estado_id->ReadOnly);

			// cep_cliente_site
			$this->cep_cliente_site->setDbValueDef($rsnew, $this->cep_cliente_site->CurrentValue, NULL, $this->cep_cliente_site->ReadOnly);

			// data_atualizacao_cliente_site
			$this->data_atualizacao_cliente_site->setDbValueDef($rsnew, UnFormatDateTime($this->data_atualizacao_cliente_site->CurrentValue, 0), NULL, $this->data_atualizacao_cliente_site->ReadOnly);

			// usuario_id
			$this->usuario_id->setDbValueDef($rsnew, $this->usuario_id->CurrentValue, NULL, $this->usuario_id->ReadOnly);

			// bool_ativo_cliente_site
			$this->bool_ativo_cliente_site->setDbValueDef($rsnew, $this->bool_ativo_cliente_site->CurrentValue, 0, $this->bool_ativo_cliente_site->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("cliente_sitelist.php"), "", $this->TableVar, TRUE);
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
