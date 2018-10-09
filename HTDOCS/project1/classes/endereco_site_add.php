<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class endereco_site_add extends endereco_site
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'endereco_site';

	// Page object name
	public $PageObjName = "endereco_site_add";

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

		// Table object (endereco_site)
		if (!isset($GLOBALS["endereco_site"]) || get_class($GLOBALS["endereco_site"]) == PROJECT_NAMESPACE . "endereco_site") {
			$GLOBALS["endereco_site"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["endereco_site"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'endereco_site');

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
		global $EXPORT, $endereco_site;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($endereco_site);
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
					if ($pageName == "endereco_siteview.php")
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
			$key .= @$ar['id_endereco_site'];
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
			$this->id_endereco_site->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

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
		$this->id_endereco_site->Visible = FALSE;
		$this->descricao_endereco_site->setVisibility();
		$this->endereco_endereco_site->setVisibility();
		$this->numero_endereco_site->setVisibility();
		$this->complemento_endereco_site->setVisibility();
		$this->bairro_endereco_site->setVisibility();
		$this->cidade_endereco_site->setVisibility();
		$this->estado_id->setVisibility();
		$this->cep_endereco_site->setVisibility();
		$this->telefone_endereco_site->setVisibility();
		$this->celular_endereco_site->setVisibility();
		$this->email_endereco_site->setVisibility();
		$this->horario_funcionamento_endereco_site->setVisibility();
		$this->latitude_endereco_site->setVisibility();
		$this->longitude_endereco_site->setVisibility();
		$this->data_atualizacao_endereco_site->setVisibility();
		$this->usuario_id->setVisibility();
		$this->bool_ativo_endereco_site->setVisibility();
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
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id_endereco_site") !== NULL) {
				$this->id_endereco_site->setQueryStringValue(Get("id_endereco_site"));
				$this->setKey("id_endereco_site", $this->id_endereco_site->CurrentValue); // Set up key
			} else {
				$this->setKey("id_endereco_site", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi())
					$this->terminate();
				else
					$this->CurrentAction = "show"; // Form error, reset action
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->terminate("endereco_sitelist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "endereco_sitelist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "endereco_siteview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) // Return to caller
						$this->terminate(TRUE);
					else
						$this->terminate($returnUrl);
				} elseif (IsApi()) { // API request, return
					$this->terminate();
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id_endereco_site->CurrentValue = NULL;
		$this->id_endereco_site->OldValue = $this->id_endereco_site->CurrentValue;
		$this->descricao_endereco_site->CurrentValue = NULL;
		$this->descricao_endereco_site->OldValue = $this->descricao_endereco_site->CurrentValue;
		$this->endereco_endereco_site->CurrentValue = NULL;
		$this->endereco_endereco_site->OldValue = $this->endereco_endereco_site->CurrentValue;
		$this->numero_endereco_site->CurrentValue = NULL;
		$this->numero_endereco_site->OldValue = $this->numero_endereco_site->CurrentValue;
		$this->complemento_endereco_site->CurrentValue = NULL;
		$this->complemento_endereco_site->OldValue = $this->complemento_endereco_site->CurrentValue;
		$this->bairro_endereco_site->CurrentValue = NULL;
		$this->bairro_endereco_site->OldValue = $this->bairro_endereco_site->CurrentValue;
		$this->cidade_endereco_site->CurrentValue = NULL;
		$this->cidade_endereco_site->OldValue = $this->cidade_endereco_site->CurrentValue;
		$this->estado_id->CurrentValue = NULL;
		$this->estado_id->OldValue = $this->estado_id->CurrentValue;
		$this->cep_endereco_site->CurrentValue = NULL;
		$this->cep_endereco_site->OldValue = $this->cep_endereco_site->CurrentValue;
		$this->telefone_endereco_site->CurrentValue = NULL;
		$this->telefone_endereco_site->OldValue = $this->telefone_endereco_site->CurrentValue;
		$this->celular_endereco_site->CurrentValue = NULL;
		$this->celular_endereco_site->OldValue = $this->celular_endereco_site->CurrentValue;
		$this->email_endereco_site->CurrentValue = NULL;
		$this->email_endereco_site->OldValue = $this->email_endereco_site->CurrentValue;
		$this->horario_funcionamento_endereco_site->CurrentValue = NULL;
		$this->horario_funcionamento_endereco_site->OldValue = $this->horario_funcionamento_endereco_site->CurrentValue;
		$this->latitude_endereco_site->CurrentValue = NULL;
		$this->latitude_endereco_site->OldValue = $this->latitude_endereco_site->CurrentValue;
		$this->longitude_endereco_site->CurrentValue = NULL;
		$this->longitude_endereco_site->OldValue = $this->longitude_endereco_site->CurrentValue;
		$this->data_atualizacao_endereco_site->CurrentValue = NULL;
		$this->data_atualizacao_endereco_site->OldValue = $this->data_atualizacao_endereco_site->CurrentValue;
		$this->usuario_id->CurrentValue = NULL;
		$this->usuario_id->OldValue = $this->usuario_id->CurrentValue;
		$this->bool_ativo_endereco_site->CurrentValue = 1;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'descricao_endereco_site' first before field var 'x_descricao_endereco_site'
		$val = $CurrentForm->hasValue("descricao_endereco_site") ? $CurrentForm->getValue("descricao_endereco_site") : $CurrentForm->getValue("x_descricao_endereco_site");
		if (!$this->descricao_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->descricao_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->descricao_endereco_site->setFormValue($val);
		}

		// Check field name 'endereco_endereco_site' first before field var 'x_endereco_endereco_site'
		$val = $CurrentForm->hasValue("endereco_endereco_site") ? $CurrentForm->getValue("endereco_endereco_site") : $CurrentForm->getValue("x_endereco_endereco_site");
		if (!$this->endereco_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->endereco_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->endereco_endereco_site->setFormValue($val);
		}

		// Check field name 'numero_endereco_site' first before field var 'x_numero_endereco_site'
		$val = $CurrentForm->hasValue("numero_endereco_site") ? $CurrentForm->getValue("numero_endereco_site") : $CurrentForm->getValue("x_numero_endereco_site");
		if (!$this->numero_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->numero_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->numero_endereco_site->setFormValue($val);
		}

		// Check field name 'complemento_endereco_site' first before field var 'x_complemento_endereco_site'
		$val = $CurrentForm->hasValue("complemento_endereco_site") ? $CurrentForm->getValue("complemento_endereco_site") : $CurrentForm->getValue("x_complemento_endereco_site");
		if (!$this->complemento_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->complemento_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->complemento_endereco_site->setFormValue($val);
		}

		// Check field name 'bairro_endereco_site' first before field var 'x_bairro_endereco_site'
		$val = $CurrentForm->hasValue("bairro_endereco_site") ? $CurrentForm->getValue("bairro_endereco_site") : $CurrentForm->getValue("x_bairro_endereco_site");
		if (!$this->bairro_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bairro_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->bairro_endereco_site->setFormValue($val);
		}

		// Check field name 'cidade_endereco_site' first before field var 'x_cidade_endereco_site'
		$val = $CurrentForm->hasValue("cidade_endereco_site") ? $CurrentForm->getValue("cidade_endereco_site") : $CurrentForm->getValue("x_cidade_endereco_site");
		if (!$this->cidade_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cidade_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->cidade_endereco_site->setFormValue($val);
		}

		// Check field name 'estado_id' first before field var 'x_estado_id'
		$val = $CurrentForm->hasValue("estado_id") ? $CurrentForm->getValue("estado_id") : $CurrentForm->getValue("x_estado_id");
		if (!$this->estado_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->estado_id->Visible = FALSE; // Disable update for API request
			else
				$this->estado_id->setFormValue($val);
		}

		// Check field name 'cep_endereco_site' first before field var 'x_cep_endereco_site'
		$val = $CurrentForm->hasValue("cep_endereco_site") ? $CurrentForm->getValue("cep_endereco_site") : $CurrentForm->getValue("x_cep_endereco_site");
		if (!$this->cep_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cep_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->cep_endereco_site->setFormValue($val);
		}

		// Check field name 'telefone_endereco_site' first before field var 'x_telefone_endereco_site'
		$val = $CurrentForm->hasValue("telefone_endereco_site") ? $CurrentForm->getValue("telefone_endereco_site") : $CurrentForm->getValue("x_telefone_endereco_site");
		if (!$this->telefone_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->telefone_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->telefone_endereco_site->setFormValue($val);
		}

		// Check field name 'celular_endereco_site' first before field var 'x_celular_endereco_site'
		$val = $CurrentForm->hasValue("celular_endereco_site") ? $CurrentForm->getValue("celular_endereco_site") : $CurrentForm->getValue("x_celular_endereco_site");
		if (!$this->celular_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->celular_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->celular_endereco_site->setFormValue($val);
		}

		// Check field name 'email_endereco_site' first before field var 'x_email_endereco_site'
		$val = $CurrentForm->hasValue("email_endereco_site") ? $CurrentForm->getValue("email_endereco_site") : $CurrentForm->getValue("x_email_endereco_site");
		if (!$this->email_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->email_endereco_site->setFormValue($val);
		}

		// Check field name 'horario_funcionamento_endereco_site' first before field var 'x_horario_funcionamento_endereco_site'
		$val = $CurrentForm->hasValue("horario_funcionamento_endereco_site") ? $CurrentForm->getValue("horario_funcionamento_endereco_site") : $CurrentForm->getValue("x_horario_funcionamento_endereco_site");
		if (!$this->horario_funcionamento_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->horario_funcionamento_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->horario_funcionamento_endereco_site->setFormValue($val);
		}

		// Check field name 'latitude_endereco_site' first before field var 'x_latitude_endereco_site'
		$val = $CurrentForm->hasValue("latitude_endereco_site") ? $CurrentForm->getValue("latitude_endereco_site") : $CurrentForm->getValue("x_latitude_endereco_site");
		if (!$this->latitude_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->latitude_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->latitude_endereco_site->setFormValue($val);
		}

		// Check field name 'longitude_endereco_site' first before field var 'x_longitude_endereco_site'
		$val = $CurrentForm->hasValue("longitude_endereco_site") ? $CurrentForm->getValue("longitude_endereco_site") : $CurrentForm->getValue("x_longitude_endereco_site");
		if (!$this->longitude_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->longitude_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->longitude_endereco_site->setFormValue($val);
		}

		// Check field name 'data_atualizacao_endereco_site' first before field var 'x_data_atualizacao_endereco_site'
		$val = $CurrentForm->hasValue("data_atualizacao_endereco_site") ? $CurrentForm->getValue("data_atualizacao_endereco_site") : $CurrentForm->getValue("x_data_atualizacao_endereco_site");
		if (!$this->data_atualizacao_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->data_atualizacao_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->data_atualizacao_endereco_site->setFormValue($val);
			$this->data_atualizacao_endereco_site->CurrentValue = UnFormatDateTime($this->data_atualizacao_endereco_site->CurrentValue, 0);
		}

		// Check field name 'usuario_id' first before field var 'x_usuario_id'
		$val = $CurrentForm->hasValue("usuario_id") ? $CurrentForm->getValue("usuario_id") : $CurrentForm->getValue("x_usuario_id");
		if (!$this->usuario_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usuario_id->Visible = FALSE; // Disable update for API request
			else
				$this->usuario_id->setFormValue($val);
		}

		// Check field name 'bool_ativo_endereco_site' first before field var 'x_bool_ativo_endereco_site'
		$val = $CurrentForm->hasValue("bool_ativo_endereco_site") ? $CurrentForm->getValue("bool_ativo_endereco_site") : $CurrentForm->getValue("x_bool_ativo_endereco_site");
		if (!$this->bool_ativo_endereco_site->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_endereco_site->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_endereco_site->setFormValue($val);
		}

		// Check field name 'id_endereco_site' first before field var 'x_id_endereco_site'
		$val = $CurrentForm->hasValue("id_endereco_site") ? $CurrentForm->getValue("id_endereco_site") : $CurrentForm->getValue("x_id_endereco_site");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->descricao_endereco_site->CurrentValue = $this->descricao_endereco_site->FormValue;
		$this->endereco_endereco_site->CurrentValue = $this->endereco_endereco_site->FormValue;
		$this->numero_endereco_site->CurrentValue = $this->numero_endereco_site->FormValue;
		$this->complemento_endereco_site->CurrentValue = $this->complemento_endereco_site->FormValue;
		$this->bairro_endereco_site->CurrentValue = $this->bairro_endereco_site->FormValue;
		$this->cidade_endereco_site->CurrentValue = $this->cidade_endereco_site->FormValue;
		$this->estado_id->CurrentValue = $this->estado_id->FormValue;
		$this->cep_endereco_site->CurrentValue = $this->cep_endereco_site->FormValue;
		$this->telefone_endereco_site->CurrentValue = $this->telefone_endereco_site->FormValue;
		$this->celular_endereco_site->CurrentValue = $this->celular_endereco_site->FormValue;
		$this->email_endereco_site->CurrentValue = $this->email_endereco_site->FormValue;
		$this->horario_funcionamento_endereco_site->CurrentValue = $this->horario_funcionamento_endereco_site->FormValue;
		$this->latitude_endereco_site->CurrentValue = $this->latitude_endereco_site->FormValue;
		$this->longitude_endereco_site->CurrentValue = $this->longitude_endereco_site->FormValue;
		$this->data_atualizacao_endereco_site->CurrentValue = $this->data_atualizacao_endereco_site->FormValue;
		$this->data_atualizacao_endereco_site->CurrentValue = UnFormatDateTime($this->data_atualizacao_endereco_site->CurrentValue, 0);
		$this->usuario_id->CurrentValue = $this->usuario_id->FormValue;
		$this->bool_ativo_endereco_site->CurrentValue = $this->bool_ativo_endereco_site->FormValue;
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
		$this->id_endereco_site->setDbValue($row['id_endereco_site']);
		$this->descricao_endereco_site->setDbValue($row['descricao_endereco_site']);
		$this->endereco_endereco_site->setDbValue($row['endereco_endereco_site']);
		$this->numero_endereco_site->setDbValue($row['numero_endereco_site']);
		$this->complemento_endereco_site->setDbValue($row['complemento_endereco_site']);
		$this->bairro_endereco_site->setDbValue($row['bairro_endereco_site']);
		$this->cidade_endereco_site->setDbValue($row['cidade_endereco_site']);
		$this->estado_id->setDbValue($row['estado_id']);
		$this->cep_endereco_site->setDbValue($row['cep_endereco_site']);
		$this->telefone_endereco_site->setDbValue($row['telefone_endereco_site']);
		$this->celular_endereco_site->setDbValue($row['celular_endereco_site']);
		$this->email_endereco_site->setDbValue($row['email_endereco_site']);
		$this->horario_funcionamento_endereco_site->setDbValue($row['horario_funcionamento_endereco_site']);
		$this->latitude_endereco_site->setDbValue($row['latitude_endereco_site']);
		$this->longitude_endereco_site->setDbValue($row['longitude_endereco_site']);
		$this->data_atualizacao_endereco_site->setDbValue($row['data_atualizacao_endereco_site']);
		$this->usuario_id->setDbValue($row['usuario_id']);
		$this->bool_ativo_endereco_site->setDbValue($row['bool_ativo_endereco_site']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_endereco_site'] = $this->id_endereco_site->CurrentValue;
		$row['descricao_endereco_site'] = $this->descricao_endereco_site->CurrentValue;
		$row['endereco_endereco_site'] = $this->endereco_endereco_site->CurrentValue;
		$row['numero_endereco_site'] = $this->numero_endereco_site->CurrentValue;
		$row['complemento_endereco_site'] = $this->complemento_endereco_site->CurrentValue;
		$row['bairro_endereco_site'] = $this->bairro_endereco_site->CurrentValue;
		$row['cidade_endereco_site'] = $this->cidade_endereco_site->CurrentValue;
		$row['estado_id'] = $this->estado_id->CurrentValue;
		$row['cep_endereco_site'] = $this->cep_endereco_site->CurrentValue;
		$row['telefone_endereco_site'] = $this->telefone_endereco_site->CurrentValue;
		$row['celular_endereco_site'] = $this->celular_endereco_site->CurrentValue;
		$row['email_endereco_site'] = $this->email_endereco_site->CurrentValue;
		$row['horario_funcionamento_endereco_site'] = $this->horario_funcionamento_endereco_site->CurrentValue;
		$row['latitude_endereco_site'] = $this->latitude_endereco_site->CurrentValue;
		$row['longitude_endereco_site'] = $this->longitude_endereco_site->CurrentValue;
		$row['data_atualizacao_endereco_site'] = $this->data_atualizacao_endereco_site->CurrentValue;
		$row['usuario_id'] = $this->usuario_id->CurrentValue;
		$row['bool_ativo_endereco_site'] = $this->bool_ativo_endereco_site->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_endereco_site")) <> "")
			$this->id_endereco_site->CurrentValue = $this->getKey("id_endereco_site"); // id_endereco_site
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
		// id_endereco_site
		// descricao_endereco_site
		// endereco_endereco_site
		// numero_endereco_site
		// complemento_endereco_site
		// bairro_endereco_site
		// cidade_endereco_site
		// estado_id
		// cep_endereco_site
		// telefone_endereco_site
		// celular_endereco_site
		// email_endereco_site
		// horario_funcionamento_endereco_site
		// latitude_endereco_site
		// longitude_endereco_site
		// data_atualizacao_endereco_site
		// usuario_id
		// bool_ativo_endereco_site

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_endereco_site
			$this->id_endereco_site->ViewValue = $this->id_endereco_site->CurrentValue;
			$this->id_endereco_site->ViewCustomAttributes = "";

			// descricao_endereco_site
			$this->descricao_endereco_site->ViewValue = $this->descricao_endereco_site->CurrentValue;
			$this->descricao_endereco_site->ViewCustomAttributes = "";

			// endereco_endereco_site
			$this->endereco_endereco_site->ViewValue = $this->endereco_endereco_site->CurrentValue;
			$this->endereco_endereco_site->ViewCustomAttributes = "";

			// numero_endereco_site
			$this->numero_endereco_site->ViewValue = $this->numero_endereco_site->CurrentValue;
			$this->numero_endereco_site->ViewValue = FormatNumber($this->numero_endereco_site->ViewValue, 0, -2, -2, -2);
			$this->numero_endereco_site->ViewCustomAttributes = "";

			// complemento_endereco_site
			$this->complemento_endereco_site->ViewValue = $this->complemento_endereco_site->CurrentValue;
			$this->complemento_endereco_site->ViewCustomAttributes = "";

			// bairro_endereco_site
			$this->bairro_endereco_site->ViewValue = $this->bairro_endereco_site->CurrentValue;
			$this->bairro_endereco_site->ViewCustomAttributes = "";

			// cidade_endereco_site
			$this->cidade_endereco_site->ViewValue = $this->cidade_endereco_site->CurrentValue;
			$this->cidade_endereco_site->ViewCustomAttributes = "";

			// estado_id
			$this->estado_id->ViewValue = $this->estado_id->CurrentValue;
			$this->estado_id->ViewValue = FormatNumber($this->estado_id->ViewValue, 0, -2, -2, -2);
			$this->estado_id->ViewCustomAttributes = "";

			// cep_endereco_site
			$this->cep_endereco_site->ViewValue = $this->cep_endereco_site->CurrentValue;
			$this->cep_endereco_site->ViewCustomAttributes = "";

			// telefone_endereco_site
			$this->telefone_endereco_site->ViewValue = $this->telefone_endereco_site->CurrentValue;
			$this->telefone_endereco_site->ViewCustomAttributes = "";

			// celular_endereco_site
			$this->celular_endereco_site->ViewValue = $this->celular_endereco_site->CurrentValue;
			$this->celular_endereco_site->ViewCustomAttributes = "";

			// email_endereco_site
			$this->email_endereco_site->ViewValue = $this->email_endereco_site->CurrentValue;
			$this->email_endereco_site->ViewCustomAttributes = "";

			// horario_funcionamento_endereco_site
			$this->horario_funcionamento_endereco_site->ViewValue = $this->horario_funcionamento_endereco_site->CurrentValue;
			$this->horario_funcionamento_endereco_site->ViewCustomAttributes = "";

			// latitude_endereco_site
			$this->latitude_endereco_site->ViewValue = $this->latitude_endereco_site->CurrentValue;
			$this->latitude_endereco_site->ViewCustomAttributes = "";

			// longitude_endereco_site
			$this->longitude_endereco_site->ViewValue = $this->longitude_endereco_site->CurrentValue;
			$this->longitude_endereco_site->ViewCustomAttributes = "";

			// data_atualizacao_endereco_site
			$this->data_atualizacao_endereco_site->ViewValue = $this->data_atualizacao_endereco_site->CurrentValue;
			$this->data_atualizacao_endereco_site->ViewValue = FormatDateTime($this->data_atualizacao_endereco_site->ViewValue, 0);
			$this->data_atualizacao_endereco_site->ViewCustomAttributes = "";

			// usuario_id
			$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
			$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
			$this->usuario_id->ViewCustomAttributes = "";

			// bool_ativo_endereco_site
			$this->bool_ativo_endereco_site->ViewValue = $this->bool_ativo_endereco_site->CurrentValue;
			$this->bool_ativo_endereco_site->ViewValue = FormatNumber($this->bool_ativo_endereco_site->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_endereco_site->ViewCustomAttributes = "";

			// descricao_endereco_site
			$this->descricao_endereco_site->LinkCustomAttributes = "";
			$this->descricao_endereco_site->HrefValue = "";
			$this->descricao_endereco_site->TooltipValue = "";

			// endereco_endereco_site
			$this->endereco_endereco_site->LinkCustomAttributes = "";
			$this->endereco_endereco_site->HrefValue = "";
			$this->endereco_endereco_site->TooltipValue = "";

			// numero_endereco_site
			$this->numero_endereco_site->LinkCustomAttributes = "";
			$this->numero_endereco_site->HrefValue = "";
			$this->numero_endereco_site->TooltipValue = "";

			// complemento_endereco_site
			$this->complemento_endereco_site->LinkCustomAttributes = "";
			$this->complemento_endereco_site->HrefValue = "";
			$this->complemento_endereco_site->TooltipValue = "";

			// bairro_endereco_site
			$this->bairro_endereco_site->LinkCustomAttributes = "";
			$this->bairro_endereco_site->HrefValue = "";
			$this->bairro_endereco_site->TooltipValue = "";

			// cidade_endereco_site
			$this->cidade_endereco_site->LinkCustomAttributes = "";
			$this->cidade_endereco_site->HrefValue = "";
			$this->cidade_endereco_site->TooltipValue = "";

			// estado_id
			$this->estado_id->LinkCustomAttributes = "";
			$this->estado_id->HrefValue = "";
			$this->estado_id->TooltipValue = "";

			// cep_endereco_site
			$this->cep_endereco_site->LinkCustomAttributes = "";
			$this->cep_endereco_site->HrefValue = "";
			$this->cep_endereco_site->TooltipValue = "";

			// telefone_endereco_site
			$this->telefone_endereco_site->LinkCustomAttributes = "";
			$this->telefone_endereco_site->HrefValue = "";
			$this->telefone_endereco_site->TooltipValue = "";

			// celular_endereco_site
			$this->celular_endereco_site->LinkCustomAttributes = "";
			$this->celular_endereco_site->HrefValue = "";
			$this->celular_endereco_site->TooltipValue = "";

			// email_endereco_site
			$this->email_endereco_site->LinkCustomAttributes = "";
			$this->email_endereco_site->HrefValue = "";
			$this->email_endereco_site->TooltipValue = "";

			// horario_funcionamento_endereco_site
			$this->horario_funcionamento_endereco_site->LinkCustomAttributes = "";
			$this->horario_funcionamento_endereco_site->HrefValue = "";
			$this->horario_funcionamento_endereco_site->TooltipValue = "";

			// latitude_endereco_site
			$this->latitude_endereco_site->LinkCustomAttributes = "";
			$this->latitude_endereco_site->HrefValue = "";
			$this->latitude_endereco_site->TooltipValue = "";

			// longitude_endereco_site
			$this->longitude_endereco_site->LinkCustomAttributes = "";
			$this->longitude_endereco_site->HrefValue = "";
			$this->longitude_endereco_site->TooltipValue = "";

			// data_atualizacao_endereco_site
			$this->data_atualizacao_endereco_site->LinkCustomAttributes = "";
			$this->data_atualizacao_endereco_site->HrefValue = "";
			$this->data_atualizacao_endereco_site->TooltipValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";
			$this->usuario_id->TooltipValue = "";

			// bool_ativo_endereco_site
			$this->bool_ativo_endereco_site->LinkCustomAttributes = "";
			$this->bool_ativo_endereco_site->HrefValue = "";
			$this->bool_ativo_endereco_site->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// descricao_endereco_site
			$this->descricao_endereco_site->EditAttrs["class"] = "form-control";
			$this->descricao_endereco_site->EditCustomAttributes = "";
			$this->descricao_endereco_site->EditValue = HtmlEncode($this->descricao_endereco_site->CurrentValue);
			$this->descricao_endereco_site->PlaceHolder = RemoveHtml($this->descricao_endereco_site->caption());

			// endereco_endereco_site
			$this->endereco_endereco_site->EditAttrs["class"] = "form-control";
			$this->endereco_endereco_site->EditCustomAttributes = "";
			$this->endereco_endereco_site->EditValue = HtmlEncode($this->endereco_endereco_site->CurrentValue);
			$this->endereco_endereco_site->PlaceHolder = RemoveHtml($this->endereco_endereco_site->caption());

			// numero_endereco_site
			$this->numero_endereco_site->EditAttrs["class"] = "form-control";
			$this->numero_endereco_site->EditCustomAttributes = "";
			$this->numero_endereco_site->EditValue = HtmlEncode($this->numero_endereco_site->CurrentValue);
			$this->numero_endereco_site->PlaceHolder = RemoveHtml($this->numero_endereco_site->caption());

			// complemento_endereco_site
			$this->complemento_endereco_site->EditAttrs["class"] = "form-control";
			$this->complemento_endereco_site->EditCustomAttributes = "";
			$this->complemento_endereco_site->EditValue = HtmlEncode($this->complemento_endereco_site->CurrentValue);
			$this->complemento_endereco_site->PlaceHolder = RemoveHtml($this->complemento_endereco_site->caption());

			// bairro_endereco_site
			$this->bairro_endereco_site->EditAttrs["class"] = "form-control";
			$this->bairro_endereco_site->EditCustomAttributes = "";
			$this->bairro_endereco_site->EditValue = HtmlEncode($this->bairro_endereco_site->CurrentValue);
			$this->bairro_endereco_site->PlaceHolder = RemoveHtml($this->bairro_endereco_site->caption());

			// cidade_endereco_site
			$this->cidade_endereco_site->EditAttrs["class"] = "form-control";
			$this->cidade_endereco_site->EditCustomAttributes = "";
			$this->cidade_endereco_site->EditValue = HtmlEncode($this->cidade_endereco_site->CurrentValue);
			$this->cidade_endereco_site->PlaceHolder = RemoveHtml($this->cidade_endereco_site->caption());

			// estado_id
			$this->estado_id->EditAttrs["class"] = "form-control";
			$this->estado_id->EditCustomAttributes = "";
			$this->estado_id->EditValue = HtmlEncode($this->estado_id->CurrentValue);
			$this->estado_id->PlaceHolder = RemoveHtml($this->estado_id->caption());

			// cep_endereco_site
			$this->cep_endereco_site->EditAttrs["class"] = "form-control";
			$this->cep_endereco_site->EditCustomAttributes = "";
			$this->cep_endereco_site->EditValue = HtmlEncode($this->cep_endereco_site->CurrentValue);
			$this->cep_endereco_site->PlaceHolder = RemoveHtml($this->cep_endereco_site->caption());

			// telefone_endereco_site
			$this->telefone_endereco_site->EditAttrs["class"] = "form-control";
			$this->telefone_endereco_site->EditCustomAttributes = "";
			$this->telefone_endereco_site->EditValue = HtmlEncode($this->telefone_endereco_site->CurrentValue);
			$this->telefone_endereco_site->PlaceHolder = RemoveHtml($this->telefone_endereco_site->caption());

			// celular_endereco_site
			$this->celular_endereco_site->EditAttrs["class"] = "form-control";
			$this->celular_endereco_site->EditCustomAttributes = "";
			$this->celular_endereco_site->EditValue = HtmlEncode($this->celular_endereco_site->CurrentValue);
			$this->celular_endereco_site->PlaceHolder = RemoveHtml($this->celular_endereco_site->caption());

			// email_endereco_site
			$this->email_endereco_site->EditAttrs["class"] = "form-control";
			$this->email_endereco_site->EditCustomAttributes = "";
			$this->email_endereco_site->EditValue = HtmlEncode($this->email_endereco_site->CurrentValue);
			$this->email_endereco_site->PlaceHolder = RemoveHtml($this->email_endereco_site->caption());

			// horario_funcionamento_endereco_site
			$this->horario_funcionamento_endereco_site->EditAttrs["class"] = "form-control";
			$this->horario_funcionamento_endereco_site->EditCustomAttributes = "";
			$this->horario_funcionamento_endereco_site->EditValue = HtmlEncode($this->horario_funcionamento_endereco_site->CurrentValue);
			$this->horario_funcionamento_endereco_site->PlaceHolder = RemoveHtml($this->horario_funcionamento_endereco_site->caption());

			// latitude_endereco_site
			$this->latitude_endereco_site->EditAttrs["class"] = "form-control";
			$this->latitude_endereco_site->EditCustomAttributes = "";
			$this->latitude_endereco_site->EditValue = HtmlEncode($this->latitude_endereco_site->CurrentValue);
			$this->latitude_endereco_site->PlaceHolder = RemoveHtml($this->latitude_endereco_site->caption());

			// longitude_endereco_site
			$this->longitude_endereco_site->EditAttrs["class"] = "form-control";
			$this->longitude_endereco_site->EditCustomAttributes = "";
			$this->longitude_endereco_site->EditValue = HtmlEncode($this->longitude_endereco_site->CurrentValue);
			$this->longitude_endereco_site->PlaceHolder = RemoveHtml($this->longitude_endereco_site->caption());

			// data_atualizacao_endereco_site
			$this->data_atualizacao_endereco_site->EditAttrs["class"] = "form-control";
			$this->data_atualizacao_endereco_site->EditCustomAttributes = "";
			$this->data_atualizacao_endereco_site->EditValue = HtmlEncode(FormatDateTime($this->data_atualizacao_endereco_site->CurrentValue, 8));
			$this->data_atualizacao_endereco_site->PlaceHolder = RemoveHtml($this->data_atualizacao_endereco_site->caption());

			// usuario_id
			$this->usuario_id->EditAttrs["class"] = "form-control";
			$this->usuario_id->EditCustomAttributes = "";
			$this->usuario_id->EditValue = HtmlEncode($this->usuario_id->CurrentValue);
			$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

			// bool_ativo_endereco_site
			$this->bool_ativo_endereco_site->EditAttrs["class"] = "form-control";
			$this->bool_ativo_endereco_site->EditCustomAttributes = "";
			$this->bool_ativo_endereco_site->EditValue = HtmlEncode($this->bool_ativo_endereco_site->CurrentValue);
			$this->bool_ativo_endereco_site->PlaceHolder = RemoveHtml($this->bool_ativo_endereco_site->caption());

			// Add refer script
			// descricao_endereco_site

			$this->descricao_endereco_site->LinkCustomAttributes = "";
			$this->descricao_endereco_site->HrefValue = "";

			// endereco_endereco_site
			$this->endereco_endereco_site->LinkCustomAttributes = "";
			$this->endereco_endereco_site->HrefValue = "";

			// numero_endereco_site
			$this->numero_endereco_site->LinkCustomAttributes = "";
			$this->numero_endereco_site->HrefValue = "";

			// complemento_endereco_site
			$this->complemento_endereco_site->LinkCustomAttributes = "";
			$this->complemento_endereco_site->HrefValue = "";

			// bairro_endereco_site
			$this->bairro_endereco_site->LinkCustomAttributes = "";
			$this->bairro_endereco_site->HrefValue = "";

			// cidade_endereco_site
			$this->cidade_endereco_site->LinkCustomAttributes = "";
			$this->cidade_endereco_site->HrefValue = "";

			// estado_id
			$this->estado_id->LinkCustomAttributes = "";
			$this->estado_id->HrefValue = "";

			// cep_endereco_site
			$this->cep_endereco_site->LinkCustomAttributes = "";
			$this->cep_endereco_site->HrefValue = "";

			// telefone_endereco_site
			$this->telefone_endereco_site->LinkCustomAttributes = "";
			$this->telefone_endereco_site->HrefValue = "";

			// celular_endereco_site
			$this->celular_endereco_site->LinkCustomAttributes = "";
			$this->celular_endereco_site->HrefValue = "";

			// email_endereco_site
			$this->email_endereco_site->LinkCustomAttributes = "";
			$this->email_endereco_site->HrefValue = "";

			// horario_funcionamento_endereco_site
			$this->horario_funcionamento_endereco_site->LinkCustomAttributes = "";
			$this->horario_funcionamento_endereco_site->HrefValue = "";

			// latitude_endereco_site
			$this->latitude_endereco_site->LinkCustomAttributes = "";
			$this->latitude_endereco_site->HrefValue = "";

			// longitude_endereco_site
			$this->longitude_endereco_site->LinkCustomAttributes = "";
			$this->longitude_endereco_site->HrefValue = "";

			// data_atualizacao_endereco_site
			$this->data_atualizacao_endereco_site->LinkCustomAttributes = "";
			$this->data_atualizacao_endereco_site->HrefValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";

			// bool_ativo_endereco_site
			$this->bool_ativo_endereco_site->LinkCustomAttributes = "";
			$this->bool_ativo_endereco_site->HrefValue = "";
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
		if ($this->id_endereco_site->Required) {
			if (!$this->id_endereco_site->IsDetailKey && $this->id_endereco_site->FormValue != NULL && $this->id_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_endereco_site->caption(), $this->id_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->descricao_endereco_site->Required) {
			if (!$this->descricao_endereco_site->IsDetailKey && $this->descricao_endereco_site->FormValue != NULL && $this->descricao_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->descricao_endereco_site->caption(), $this->descricao_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->endereco_endereco_site->Required) {
			if (!$this->endereco_endereco_site->IsDetailKey && $this->endereco_endereco_site->FormValue != NULL && $this->endereco_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->endereco_endereco_site->caption(), $this->endereco_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->numero_endereco_site->Required) {
			if (!$this->numero_endereco_site->IsDetailKey && $this->numero_endereco_site->FormValue != NULL && $this->numero_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->numero_endereco_site->caption(), $this->numero_endereco_site->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->numero_endereco_site->FormValue)) {
			AddMessage($FormError, $this->numero_endereco_site->errorMessage());
		}
		if ($this->complemento_endereco_site->Required) {
			if (!$this->complemento_endereco_site->IsDetailKey && $this->complemento_endereco_site->FormValue != NULL && $this->complemento_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->complemento_endereco_site->caption(), $this->complemento_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->bairro_endereco_site->Required) {
			if (!$this->bairro_endereco_site->IsDetailKey && $this->bairro_endereco_site->FormValue != NULL && $this->bairro_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bairro_endereco_site->caption(), $this->bairro_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->cidade_endereco_site->Required) {
			if (!$this->cidade_endereco_site->IsDetailKey && $this->cidade_endereco_site->FormValue != NULL && $this->cidade_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cidade_endereco_site->caption(), $this->cidade_endereco_site->RequiredErrorMessage));
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
		if ($this->cep_endereco_site->Required) {
			if (!$this->cep_endereco_site->IsDetailKey && $this->cep_endereco_site->FormValue != NULL && $this->cep_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cep_endereco_site->caption(), $this->cep_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->telefone_endereco_site->Required) {
			if (!$this->telefone_endereco_site->IsDetailKey && $this->telefone_endereco_site->FormValue != NULL && $this->telefone_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefone_endereco_site->caption(), $this->telefone_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->celular_endereco_site->Required) {
			if (!$this->celular_endereco_site->IsDetailKey && $this->celular_endereco_site->FormValue != NULL && $this->celular_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->celular_endereco_site->caption(), $this->celular_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->email_endereco_site->Required) {
			if (!$this->email_endereco_site->IsDetailKey && $this->email_endereco_site->FormValue != NULL && $this->email_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_endereco_site->caption(), $this->email_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->horario_funcionamento_endereco_site->Required) {
			if (!$this->horario_funcionamento_endereco_site->IsDetailKey && $this->horario_funcionamento_endereco_site->FormValue != NULL && $this->horario_funcionamento_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->horario_funcionamento_endereco_site->caption(), $this->horario_funcionamento_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->latitude_endereco_site->Required) {
			if (!$this->latitude_endereco_site->IsDetailKey && $this->latitude_endereco_site->FormValue != NULL && $this->latitude_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->latitude_endereco_site->caption(), $this->latitude_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->longitude_endereco_site->Required) {
			if (!$this->longitude_endereco_site->IsDetailKey && $this->longitude_endereco_site->FormValue != NULL && $this->longitude_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->longitude_endereco_site->caption(), $this->longitude_endereco_site->RequiredErrorMessage));
			}
		}
		if ($this->data_atualizacao_endereco_site->Required) {
			if (!$this->data_atualizacao_endereco_site->IsDetailKey && $this->data_atualizacao_endereco_site->FormValue != NULL && $this->data_atualizacao_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->data_atualizacao_endereco_site->caption(), $this->data_atualizacao_endereco_site->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->data_atualizacao_endereco_site->FormValue)) {
			AddMessage($FormError, $this->data_atualizacao_endereco_site->errorMessage());
		}
		if ($this->usuario_id->Required) {
			if (!$this->usuario_id->IsDetailKey && $this->usuario_id->FormValue != NULL && $this->usuario_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usuario_id->caption(), $this->usuario_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->usuario_id->FormValue)) {
			AddMessage($FormError, $this->usuario_id->errorMessage());
		}
		if ($this->bool_ativo_endereco_site->Required) {
			if (!$this->bool_ativo_endereco_site->IsDetailKey && $this->bool_ativo_endereco_site->FormValue != NULL && $this->bool_ativo_endereco_site->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_endereco_site->caption(), $this->bool_ativo_endereco_site->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_endereco_site->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_endereco_site->errorMessage());
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// descricao_endereco_site
		$this->descricao_endereco_site->setDbValueDef($rsnew, $this->descricao_endereco_site->CurrentValue, "", FALSE);

		// endereco_endereco_site
		$this->endereco_endereco_site->setDbValueDef($rsnew, $this->endereco_endereco_site->CurrentValue, "", FALSE);

		// numero_endereco_site
		$this->numero_endereco_site->setDbValueDef($rsnew, $this->numero_endereco_site->CurrentValue, 0, FALSE);

		// complemento_endereco_site
		$this->complemento_endereco_site->setDbValueDef($rsnew, $this->complemento_endereco_site->CurrentValue, NULL, FALSE);

		// bairro_endereco_site
		$this->bairro_endereco_site->setDbValueDef($rsnew, $this->bairro_endereco_site->CurrentValue, NULL, FALSE);

		// cidade_endereco_site
		$this->cidade_endereco_site->setDbValueDef($rsnew, $this->cidade_endereco_site->CurrentValue, "", FALSE);

		// estado_id
		$this->estado_id->setDbValueDef($rsnew, $this->estado_id->CurrentValue, 0, FALSE);

		// cep_endereco_site
		$this->cep_endereco_site->setDbValueDef($rsnew, $this->cep_endereco_site->CurrentValue, "", FALSE);

		// telefone_endereco_site
		$this->telefone_endereco_site->setDbValueDef($rsnew, $this->telefone_endereco_site->CurrentValue, "", FALSE);

		// celular_endereco_site
		$this->celular_endereco_site->setDbValueDef($rsnew, $this->celular_endereco_site->CurrentValue, NULL, FALSE);

		// email_endereco_site
		$this->email_endereco_site->setDbValueDef($rsnew, $this->email_endereco_site->CurrentValue, NULL, FALSE);

		// horario_funcionamento_endereco_site
		$this->horario_funcionamento_endereco_site->setDbValueDef($rsnew, $this->horario_funcionamento_endereco_site->CurrentValue, "", FALSE);

		// latitude_endereco_site
		$this->latitude_endereco_site->setDbValueDef($rsnew, $this->latitude_endereco_site->CurrentValue, "", FALSE);

		// longitude_endereco_site
		$this->longitude_endereco_site->setDbValueDef($rsnew, $this->longitude_endereco_site->CurrentValue, "", FALSE);

		// data_atualizacao_endereco_site
		$this->data_atualizacao_endereco_site->setDbValueDef($rsnew, UnFormatDateTime($this->data_atualizacao_endereco_site->CurrentValue, 0), NULL, FALSE);

		// usuario_id
		$this->usuario_id->setDbValueDef($rsnew, $this->usuario_id->CurrentValue, 0, FALSE);

		// bool_ativo_endereco_site
		$this->bool_ativo_endereco_site->setDbValueDef($rsnew, $this->bool_ativo_endereco_site->CurrentValue, 0, strval($this->bool_ativo_endereco_site->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
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
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("endereco_sitelist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
