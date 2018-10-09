<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class destaque_grupo_add extends destaque_grupo
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'destaque_grupo';

	// Page object name
	public $PageObjName = "destaque_grupo_add";

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

		// Table object (destaque_grupo)
		if (!isset($GLOBALS["destaque_grupo"]) || get_class($GLOBALS["destaque_grupo"]) == PROJECT_NAMESPACE . "destaque_grupo") {
			$GLOBALS["destaque_grupo"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["destaque_grupo"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'destaque_grupo');

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
		global $EXPORT, $destaque_grupo;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($destaque_grupo);
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
					if ($pageName == "destaque_grupoview.php")
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
			$key .= @$ar['id_destaque_grupo'];
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
			$this->id_destaque_grupo->Visible = FALSE;
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
		$this->id_destaque_grupo->Visible = FALSE;
		$this->titulo_destaque_grupo->setVisibility();
		$this->grupo_id->setVisibility();
		$this->imagem_destaque_grupo->setVisibility();
		$this->descricao_destaque_grupo->setVisibility();
		$this->configurar_site_id->setVisibility();
		$this->data_atualizacao_destaque_grupo->setVisibility();
		$this->usuario_id->setVisibility();
		$this->bool_ativo_destaque_grupo->setVisibility();
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
			if (Get("id_destaque_grupo") !== NULL) {
				$this->id_destaque_grupo->setQueryStringValue(Get("id_destaque_grupo"));
				$this->setKey("id_destaque_grupo", $this->id_destaque_grupo->CurrentValue); // Set up key
			} else {
				$this->setKey("id_destaque_grupo", ""); // Clear key
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
					$this->terminate("destaque_grupolist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "destaque_grupolist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "destaque_grupoview.php")
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
		$this->id_destaque_grupo->CurrentValue = NULL;
		$this->id_destaque_grupo->OldValue = $this->id_destaque_grupo->CurrentValue;
		$this->titulo_destaque_grupo->CurrentValue = NULL;
		$this->titulo_destaque_grupo->OldValue = $this->titulo_destaque_grupo->CurrentValue;
		$this->grupo_id->CurrentValue = NULL;
		$this->grupo_id->OldValue = $this->grupo_id->CurrentValue;
		$this->imagem_destaque_grupo->CurrentValue = NULL;
		$this->imagem_destaque_grupo->OldValue = $this->imagem_destaque_grupo->CurrentValue;
		$this->descricao_destaque_grupo->CurrentValue = NULL;
		$this->descricao_destaque_grupo->OldValue = $this->descricao_destaque_grupo->CurrentValue;
		$this->configurar_site_id->CurrentValue = NULL;
		$this->configurar_site_id->OldValue = $this->configurar_site_id->CurrentValue;
		$this->data_atualizacao_destaque_grupo->CurrentValue = NULL;
		$this->data_atualizacao_destaque_grupo->OldValue = $this->data_atualizacao_destaque_grupo->CurrentValue;
		$this->usuario_id->CurrentValue = NULL;
		$this->usuario_id->OldValue = $this->usuario_id->CurrentValue;
		$this->bool_ativo_destaque_grupo->CurrentValue = NULL;
		$this->bool_ativo_destaque_grupo->OldValue = $this->bool_ativo_destaque_grupo->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'titulo_destaque_grupo' first before field var 'x_titulo_destaque_grupo'
		$val = $CurrentForm->hasValue("titulo_destaque_grupo") ? $CurrentForm->getValue("titulo_destaque_grupo") : $CurrentForm->getValue("x_titulo_destaque_grupo");
		if (!$this->titulo_destaque_grupo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->titulo_destaque_grupo->Visible = FALSE; // Disable update for API request
			else
				$this->titulo_destaque_grupo->setFormValue($val);
		}

		// Check field name 'grupo_id' first before field var 'x_grupo_id'
		$val = $CurrentForm->hasValue("grupo_id") ? $CurrentForm->getValue("grupo_id") : $CurrentForm->getValue("x_grupo_id");
		if (!$this->grupo_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grupo_id->Visible = FALSE; // Disable update for API request
			else
				$this->grupo_id->setFormValue($val);
		}

		// Check field name 'imagem_destaque_grupo' first before field var 'x_imagem_destaque_grupo'
		$val = $CurrentForm->hasValue("imagem_destaque_grupo") ? $CurrentForm->getValue("imagem_destaque_grupo") : $CurrentForm->getValue("x_imagem_destaque_grupo");
		if (!$this->imagem_destaque_grupo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->imagem_destaque_grupo->Visible = FALSE; // Disable update for API request
			else
				$this->imagem_destaque_grupo->setFormValue($val);
		}

		// Check field name 'descricao_destaque_grupo' first before field var 'x_descricao_destaque_grupo'
		$val = $CurrentForm->hasValue("descricao_destaque_grupo") ? $CurrentForm->getValue("descricao_destaque_grupo") : $CurrentForm->getValue("x_descricao_destaque_grupo");
		if (!$this->descricao_destaque_grupo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->descricao_destaque_grupo->Visible = FALSE; // Disable update for API request
			else
				$this->descricao_destaque_grupo->setFormValue($val);
		}

		// Check field name 'configurar_site_id' first before field var 'x_configurar_site_id'
		$val = $CurrentForm->hasValue("configurar_site_id") ? $CurrentForm->getValue("configurar_site_id") : $CurrentForm->getValue("x_configurar_site_id");
		if (!$this->configurar_site_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->configurar_site_id->Visible = FALSE; // Disable update for API request
			else
				$this->configurar_site_id->setFormValue($val);
		}

		// Check field name 'data_atualizacao_destaque_grupo' first before field var 'x_data_atualizacao_destaque_grupo'
		$val = $CurrentForm->hasValue("data_atualizacao_destaque_grupo") ? $CurrentForm->getValue("data_atualizacao_destaque_grupo") : $CurrentForm->getValue("x_data_atualizacao_destaque_grupo");
		if (!$this->data_atualizacao_destaque_grupo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->data_atualizacao_destaque_grupo->Visible = FALSE; // Disable update for API request
			else
				$this->data_atualizacao_destaque_grupo->setFormValue($val);
			$this->data_atualizacao_destaque_grupo->CurrentValue = UnFormatDateTime($this->data_atualizacao_destaque_grupo->CurrentValue, 0);
		}

		// Check field name 'usuario_id' first before field var 'x_usuario_id'
		$val = $CurrentForm->hasValue("usuario_id") ? $CurrentForm->getValue("usuario_id") : $CurrentForm->getValue("x_usuario_id");
		if (!$this->usuario_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usuario_id->Visible = FALSE; // Disable update for API request
			else
				$this->usuario_id->setFormValue($val);
		}

		// Check field name 'bool_ativo_destaque_grupo' first before field var 'x_bool_ativo_destaque_grupo'
		$val = $CurrentForm->hasValue("bool_ativo_destaque_grupo") ? $CurrentForm->getValue("bool_ativo_destaque_grupo") : $CurrentForm->getValue("x_bool_ativo_destaque_grupo");
		if (!$this->bool_ativo_destaque_grupo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_destaque_grupo->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_destaque_grupo->setFormValue($val);
		}

		// Check field name 'id_destaque_grupo' first before field var 'x_id_destaque_grupo'
		$val = $CurrentForm->hasValue("id_destaque_grupo") ? $CurrentForm->getValue("id_destaque_grupo") : $CurrentForm->getValue("x_id_destaque_grupo");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->titulo_destaque_grupo->CurrentValue = $this->titulo_destaque_grupo->FormValue;
		$this->grupo_id->CurrentValue = $this->grupo_id->FormValue;
		$this->imagem_destaque_grupo->CurrentValue = $this->imagem_destaque_grupo->FormValue;
		$this->descricao_destaque_grupo->CurrentValue = $this->descricao_destaque_grupo->FormValue;
		$this->configurar_site_id->CurrentValue = $this->configurar_site_id->FormValue;
		$this->data_atualizacao_destaque_grupo->CurrentValue = $this->data_atualizacao_destaque_grupo->FormValue;
		$this->data_atualizacao_destaque_grupo->CurrentValue = UnFormatDateTime($this->data_atualizacao_destaque_grupo->CurrentValue, 0);
		$this->usuario_id->CurrentValue = $this->usuario_id->FormValue;
		$this->bool_ativo_destaque_grupo->CurrentValue = $this->bool_ativo_destaque_grupo->FormValue;
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
		$this->id_destaque_grupo->setDbValue($row['id_destaque_grupo']);
		$this->titulo_destaque_grupo->setDbValue($row['titulo_destaque_grupo']);
		$this->grupo_id->setDbValue($row['grupo_id']);
		$this->imagem_destaque_grupo->setDbValue($row['imagem_destaque_grupo']);
		$this->descricao_destaque_grupo->setDbValue($row['descricao_destaque_grupo']);
		$this->configurar_site_id->setDbValue($row['configurar_site_id']);
		$this->data_atualizacao_destaque_grupo->setDbValue($row['data_atualizacao_destaque_grupo']);
		$this->usuario_id->setDbValue($row['usuario_id']);
		$this->bool_ativo_destaque_grupo->setDbValue($row['bool_ativo_destaque_grupo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_destaque_grupo'] = $this->id_destaque_grupo->CurrentValue;
		$row['titulo_destaque_grupo'] = $this->titulo_destaque_grupo->CurrentValue;
		$row['grupo_id'] = $this->grupo_id->CurrentValue;
		$row['imagem_destaque_grupo'] = $this->imagem_destaque_grupo->CurrentValue;
		$row['descricao_destaque_grupo'] = $this->descricao_destaque_grupo->CurrentValue;
		$row['configurar_site_id'] = $this->configurar_site_id->CurrentValue;
		$row['data_atualizacao_destaque_grupo'] = $this->data_atualizacao_destaque_grupo->CurrentValue;
		$row['usuario_id'] = $this->usuario_id->CurrentValue;
		$row['bool_ativo_destaque_grupo'] = $this->bool_ativo_destaque_grupo->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_destaque_grupo")) <> "")
			$this->id_destaque_grupo->CurrentValue = $this->getKey("id_destaque_grupo"); // id_destaque_grupo
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
		// id_destaque_grupo
		// titulo_destaque_grupo
		// grupo_id
		// imagem_destaque_grupo
		// descricao_destaque_grupo
		// configurar_site_id
		// data_atualizacao_destaque_grupo
		// usuario_id
		// bool_ativo_destaque_grupo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_destaque_grupo
			$this->id_destaque_grupo->ViewValue = $this->id_destaque_grupo->CurrentValue;
			$this->id_destaque_grupo->ViewCustomAttributes = "";

			// titulo_destaque_grupo
			$this->titulo_destaque_grupo->ViewValue = $this->titulo_destaque_grupo->CurrentValue;
			$this->titulo_destaque_grupo->ViewCustomAttributes = "";

			// grupo_id
			$this->grupo_id->ViewValue = $this->grupo_id->CurrentValue;
			$this->grupo_id->ViewValue = FormatNumber($this->grupo_id->ViewValue, 0, -2, -2, -2);
			$this->grupo_id->ViewCustomAttributes = "";

			// imagem_destaque_grupo
			$this->imagem_destaque_grupo->ViewValue = $this->imagem_destaque_grupo->CurrentValue;
			$this->imagem_destaque_grupo->ViewCustomAttributes = "";

			// descricao_destaque_grupo
			$this->descricao_destaque_grupo->ViewValue = $this->descricao_destaque_grupo->CurrentValue;
			$this->descricao_destaque_grupo->ViewCustomAttributes = "";

			// configurar_site_id
			$this->configurar_site_id->ViewValue = $this->configurar_site_id->CurrentValue;
			$this->configurar_site_id->ViewValue = FormatNumber($this->configurar_site_id->ViewValue, 0, -2, -2, -2);
			$this->configurar_site_id->ViewCustomAttributes = "";

			// data_atualizacao_destaque_grupo
			$this->data_atualizacao_destaque_grupo->ViewValue = $this->data_atualizacao_destaque_grupo->CurrentValue;
			$this->data_atualizacao_destaque_grupo->ViewValue = FormatDateTime($this->data_atualizacao_destaque_grupo->ViewValue, 0);
			$this->data_atualizacao_destaque_grupo->ViewCustomAttributes = "";

			// usuario_id
			$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
			$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
			$this->usuario_id->ViewCustomAttributes = "";

			// bool_ativo_destaque_grupo
			$this->bool_ativo_destaque_grupo->ViewValue = $this->bool_ativo_destaque_grupo->CurrentValue;
			$this->bool_ativo_destaque_grupo->ViewValue = FormatNumber($this->bool_ativo_destaque_grupo->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_destaque_grupo->ViewCustomAttributes = "";

			// titulo_destaque_grupo
			$this->titulo_destaque_grupo->LinkCustomAttributes = "";
			$this->titulo_destaque_grupo->HrefValue = "";
			$this->titulo_destaque_grupo->TooltipValue = "";

			// grupo_id
			$this->grupo_id->LinkCustomAttributes = "";
			$this->grupo_id->HrefValue = "";
			$this->grupo_id->TooltipValue = "";

			// imagem_destaque_grupo
			$this->imagem_destaque_grupo->LinkCustomAttributes = "";
			$this->imagem_destaque_grupo->HrefValue = "";
			$this->imagem_destaque_grupo->TooltipValue = "";

			// descricao_destaque_grupo
			$this->descricao_destaque_grupo->LinkCustomAttributes = "";
			$this->descricao_destaque_grupo->HrefValue = "";
			$this->descricao_destaque_grupo->TooltipValue = "";

			// configurar_site_id
			$this->configurar_site_id->LinkCustomAttributes = "";
			$this->configurar_site_id->HrefValue = "";
			$this->configurar_site_id->TooltipValue = "";

			// data_atualizacao_destaque_grupo
			$this->data_atualizacao_destaque_grupo->LinkCustomAttributes = "";
			$this->data_atualizacao_destaque_grupo->HrefValue = "";
			$this->data_atualizacao_destaque_grupo->TooltipValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";
			$this->usuario_id->TooltipValue = "";

			// bool_ativo_destaque_grupo
			$this->bool_ativo_destaque_grupo->LinkCustomAttributes = "";
			$this->bool_ativo_destaque_grupo->HrefValue = "";
			$this->bool_ativo_destaque_grupo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// titulo_destaque_grupo
			$this->titulo_destaque_grupo->EditAttrs["class"] = "form-control";
			$this->titulo_destaque_grupo->EditCustomAttributes = "";
			$this->titulo_destaque_grupo->EditValue = HtmlEncode($this->titulo_destaque_grupo->CurrentValue);
			$this->titulo_destaque_grupo->PlaceHolder = RemoveHtml($this->titulo_destaque_grupo->caption());

			// grupo_id
			$this->grupo_id->EditAttrs["class"] = "form-control";
			$this->grupo_id->EditCustomAttributes = "";
			$this->grupo_id->EditValue = HtmlEncode($this->grupo_id->CurrentValue);
			$this->grupo_id->PlaceHolder = RemoveHtml($this->grupo_id->caption());

			// imagem_destaque_grupo
			$this->imagem_destaque_grupo->EditAttrs["class"] = "form-control";
			$this->imagem_destaque_grupo->EditCustomAttributes = "";
			$this->imagem_destaque_grupo->EditValue = HtmlEncode($this->imagem_destaque_grupo->CurrentValue);
			$this->imagem_destaque_grupo->PlaceHolder = RemoveHtml($this->imagem_destaque_grupo->caption());

			// descricao_destaque_grupo
			$this->descricao_destaque_grupo->EditAttrs["class"] = "form-control";
			$this->descricao_destaque_grupo->EditCustomAttributes = "";
			$this->descricao_destaque_grupo->EditValue = HtmlEncode($this->descricao_destaque_grupo->CurrentValue);
			$this->descricao_destaque_grupo->PlaceHolder = RemoveHtml($this->descricao_destaque_grupo->caption());

			// configurar_site_id
			$this->configurar_site_id->EditAttrs["class"] = "form-control";
			$this->configurar_site_id->EditCustomAttributes = "";
			$this->configurar_site_id->EditValue = HtmlEncode($this->configurar_site_id->CurrentValue);
			$this->configurar_site_id->PlaceHolder = RemoveHtml($this->configurar_site_id->caption());

			// data_atualizacao_destaque_grupo
			$this->data_atualizacao_destaque_grupo->EditAttrs["class"] = "form-control";
			$this->data_atualizacao_destaque_grupo->EditCustomAttributes = "";
			$this->data_atualizacao_destaque_grupo->EditValue = HtmlEncode(FormatDateTime($this->data_atualizacao_destaque_grupo->CurrentValue, 8));
			$this->data_atualizacao_destaque_grupo->PlaceHolder = RemoveHtml($this->data_atualizacao_destaque_grupo->caption());

			// usuario_id
			$this->usuario_id->EditAttrs["class"] = "form-control";
			$this->usuario_id->EditCustomAttributes = "";
			$this->usuario_id->EditValue = HtmlEncode($this->usuario_id->CurrentValue);
			$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

			// bool_ativo_destaque_grupo
			$this->bool_ativo_destaque_grupo->EditAttrs["class"] = "form-control";
			$this->bool_ativo_destaque_grupo->EditCustomAttributes = "";
			$this->bool_ativo_destaque_grupo->EditValue = HtmlEncode($this->bool_ativo_destaque_grupo->CurrentValue);
			$this->bool_ativo_destaque_grupo->PlaceHolder = RemoveHtml($this->bool_ativo_destaque_grupo->caption());

			// Add refer script
			// titulo_destaque_grupo

			$this->titulo_destaque_grupo->LinkCustomAttributes = "";
			$this->titulo_destaque_grupo->HrefValue = "";

			// grupo_id
			$this->grupo_id->LinkCustomAttributes = "";
			$this->grupo_id->HrefValue = "";

			// imagem_destaque_grupo
			$this->imagem_destaque_grupo->LinkCustomAttributes = "";
			$this->imagem_destaque_grupo->HrefValue = "";

			// descricao_destaque_grupo
			$this->descricao_destaque_grupo->LinkCustomAttributes = "";
			$this->descricao_destaque_grupo->HrefValue = "";

			// configurar_site_id
			$this->configurar_site_id->LinkCustomAttributes = "";
			$this->configurar_site_id->HrefValue = "";

			// data_atualizacao_destaque_grupo
			$this->data_atualizacao_destaque_grupo->LinkCustomAttributes = "";
			$this->data_atualizacao_destaque_grupo->HrefValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";

			// bool_ativo_destaque_grupo
			$this->bool_ativo_destaque_grupo->LinkCustomAttributes = "";
			$this->bool_ativo_destaque_grupo->HrefValue = "";
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
		if ($this->id_destaque_grupo->Required) {
			if (!$this->id_destaque_grupo->IsDetailKey && $this->id_destaque_grupo->FormValue != NULL && $this->id_destaque_grupo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_destaque_grupo->caption(), $this->id_destaque_grupo->RequiredErrorMessage));
			}
		}
		if ($this->titulo_destaque_grupo->Required) {
			if (!$this->titulo_destaque_grupo->IsDetailKey && $this->titulo_destaque_grupo->FormValue != NULL && $this->titulo_destaque_grupo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->titulo_destaque_grupo->caption(), $this->titulo_destaque_grupo->RequiredErrorMessage));
			}
		}
		if ($this->grupo_id->Required) {
			if (!$this->grupo_id->IsDetailKey && $this->grupo_id->FormValue != NULL && $this->grupo_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grupo_id->caption(), $this->grupo_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->grupo_id->FormValue)) {
			AddMessage($FormError, $this->grupo_id->errorMessage());
		}
		if ($this->imagem_destaque_grupo->Required) {
			if (!$this->imagem_destaque_grupo->IsDetailKey && $this->imagem_destaque_grupo->FormValue != NULL && $this->imagem_destaque_grupo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->imagem_destaque_grupo->caption(), $this->imagem_destaque_grupo->RequiredErrorMessage));
			}
		}
		if ($this->descricao_destaque_grupo->Required) {
			if (!$this->descricao_destaque_grupo->IsDetailKey && $this->descricao_destaque_grupo->FormValue != NULL && $this->descricao_destaque_grupo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->descricao_destaque_grupo->caption(), $this->descricao_destaque_grupo->RequiredErrorMessage));
			}
		}
		if ($this->configurar_site_id->Required) {
			if (!$this->configurar_site_id->IsDetailKey && $this->configurar_site_id->FormValue != NULL && $this->configurar_site_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->configurar_site_id->caption(), $this->configurar_site_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->configurar_site_id->FormValue)) {
			AddMessage($FormError, $this->configurar_site_id->errorMessage());
		}
		if ($this->data_atualizacao_destaque_grupo->Required) {
			if (!$this->data_atualizacao_destaque_grupo->IsDetailKey && $this->data_atualizacao_destaque_grupo->FormValue != NULL && $this->data_atualizacao_destaque_grupo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->data_atualizacao_destaque_grupo->caption(), $this->data_atualizacao_destaque_grupo->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->data_atualizacao_destaque_grupo->FormValue)) {
			AddMessage($FormError, $this->data_atualizacao_destaque_grupo->errorMessage());
		}
		if ($this->usuario_id->Required) {
			if (!$this->usuario_id->IsDetailKey && $this->usuario_id->FormValue != NULL && $this->usuario_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usuario_id->caption(), $this->usuario_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->usuario_id->FormValue)) {
			AddMessage($FormError, $this->usuario_id->errorMessage());
		}
		if ($this->bool_ativo_destaque_grupo->Required) {
			if (!$this->bool_ativo_destaque_grupo->IsDetailKey && $this->bool_ativo_destaque_grupo->FormValue != NULL && $this->bool_ativo_destaque_grupo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_destaque_grupo->caption(), $this->bool_ativo_destaque_grupo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_destaque_grupo->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_destaque_grupo->errorMessage());
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

		// titulo_destaque_grupo
		$this->titulo_destaque_grupo->setDbValueDef($rsnew, $this->titulo_destaque_grupo->CurrentValue, "", FALSE);

		// grupo_id
		$this->grupo_id->setDbValueDef($rsnew, $this->grupo_id->CurrentValue, 0, FALSE);

		// imagem_destaque_grupo
		$this->imagem_destaque_grupo->setDbValueDef($rsnew, $this->imagem_destaque_grupo->CurrentValue, "", FALSE);

		// descricao_destaque_grupo
		$this->descricao_destaque_grupo->setDbValueDef($rsnew, $this->descricao_destaque_grupo->CurrentValue, NULL, FALSE);

		// configurar_site_id
		$this->configurar_site_id->setDbValueDef($rsnew, $this->configurar_site_id->CurrentValue, 0, FALSE);

		// data_atualizacao_destaque_grupo
		$this->data_atualizacao_destaque_grupo->setDbValueDef($rsnew, UnFormatDateTime($this->data_atualizacao_destaque_grupo->CurrentValue, 0), NULL, FALSE);

		// usuario_id
		$this->usuario_id->setDbValueDef($rsnew, $this->usuario_id->CurrentValue, 0, FALSE);

		// bool_ativo_destaque_grupo
		$this->bool_ativo_destaque_grupo->setDbValueDef($rsnew, $this->bool_ativo_destaque_grupo->CurrentValue, 0, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("destaque_grupolist.php"), "", $this->TableVar, TRUE);
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
