<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class contato_add extends contato
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'contato';

	// Page object name
	public $PageObjName = "contato_add";

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

		// Table object (contato)
		if (!isset($GLOBALS["contato"]) || get_class($GLOBALS["contato"]) == PROJECT_NAMESPACE . "contato") {
			$GLOBALS["contato"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["contato"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'contato');

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
		global $EXPORT, $contato;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($contato);
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
					if ($pageName == "contatoview.php")
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
			$key .= @$ar['id_contato'];
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
			$this->id_contato->Visible = FALSE;
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
		$this->id_contato->Visible = FALSE;
		$this->nome_contato->setVisibility();
		$this->email_contato->setVisibility();
		$this->telefone_contato->setVisibility();
		$this->assunto_contato->setVisibility();
		$this->mensagem_contato->setVisibility();
		$this->usuario_id->setVisibility();
		$this->data_atualizacao_contato->setVisibility();
		$this->bool_ativo_contato->setVisibility();
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
			if (Get("id_contato") !== NULL) {
				$this->id_contato->setQueryStringValue(Get("id_contato"));
				$this->setKey("id_contato", $this->id_contato->CurrentValue); // Set up key
			} else {
				$this->setKey("id_contato", ""); // Clear key
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
					$this->terminate("contatolist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "contatolist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "contatoview.php")
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
		$this->id_contato->CurrentValue = NULL;
		$this->id_contato->OldValue = $this->id_contato->CurrentValue;
		$this->nome_contato->CurrentValue = NULL;
		$this->nome_contato->OldValue = $this->nome_contato->CurrentValue;
		$this->email_contato->CurrentValue = NULL;
		$this->email_contato->OldValue = $this->email_contato->CurrentValue;
		$this->telefone_contato->CurrentValue = NULL;
		$this->telefone_contato->OldValue = $this->telefone_contato->CurrentValue;
		$this->assunto_contato->CurrentValue = NULL;
		$this->assunto_contato->OldValue = $this->assunto_contato->CurrentValue;
		$this->mensagem_contato->CurrentValue = NULL;
		$this->mensagem_contato->OldValue = $this->mensagem_contato->CurrentValue;
		$this->usuario_id->CurrentValue = NULL;
		$this->usuario_id->OldValue = $this->usuario_id->CurrentValue;
		$this->data_atualizacao_contato->CurrentValue = NULL;
		$this->data_atualizacao_contato->OldValue = $this->data_atualizacao_contato->CurrentValue;
		$this->bool_ativo_contato->CurrentValue = 1;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'nome_contato' first before field var 'x_nome_contato'
		$val = $CurrentForm->hasValue("nome_contato") ? $CurrentForm->getValue("nome_contato") : $CurrentForm->getValue("x_nome_contato");
		if (!$this->nome_contato->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nome_contato->Visible = FALSE; // Disable update for API request
			else
				$this->nome_contato->setFormValue($val);
		}

		// Check field name 'email_contato' first before field var 'x_email_contato'
		$val = $CurrentForm->hasValue("email_contato") ? $CurrentForm->getValue("email_contato") : $CurrentForm->getValue("x_email_contato");
		if (!$this->email_contato->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_contato->Visible = FALSE; // Disable update for API request
			else
				$this->email_contato->setFormValue($val);
		}

		// Check field name 'telefone_contato' first before field var 'x_telefone_contato'
		$val = $CurrentForm->hasValue("telefone_contato") ? $CurrentForm->getValue("telefone_contato") : $CurrentForm->getValue("x_telefone_contato");
		if (!$this->telefone_contato->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->telefone_contato->Visible = FALSE; // Disable update for API request
			else
				$this->telefone_contato->setFormValue($val);
		}

		// Check field name 'assunto_contato' first before field var 'x_assunto_contato'
		$val = $CurrentForm->hasValue("assunto_contato") ? $CurrentForm->getValue("assunto_contato") : $CurrentForm->getValue("x_assunto_contato");
		if (!$this->assunto_contato->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->assunto_contato->Visible = FALSE; // Disable update for API request
			else
				$this->assunto_contato->setFormValue($val);
		}

		// Check field name 'mensagem_contato' first before field var 'x_mensagem_contato'
		$val = $CurrentForm->hasValue("mensagem_contato") ? $CurrentForm->getValue("mensagem_contato") : $CurrentForm->getValue("x_mensagem_contato");
		if (!$this->mensagem_contato->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mensagem_contato->Visible = FALSE; // Disable update for API request
			else
				$this->mensagem_contato->setFormValue($val);
		}

		// Check field name 'usuario_id' first before field var 'x_usuario_id'
		$val = $CurrentForm->hasValue("usuario_id") ? $CurrentForm->getValue("usuario_id") : $CurrentForm->getValue("x_usuario_id");
		if (!$this->usuario_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usuario_id->Visible = FALSE; // Disable update for API request
			else
				$this->usuario_id->setFormValue($val);
		}

		// Check field name 'data_atualizacao_contato' first before field var 'x_data_atualizacao_contato'
		$val = $CurrentForm->hasValue("data_atualizacao_contato") ? $CurrentForm->getValue("data_atualizacao_contato") : $CurrentForm->getValue("x_data_atualizacao_contato");
		if (!$this->data_atualizacao_contato->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->data_atualizacao_contato->Visible = FALSE; // Disable update for API request
			else
				$this->data_atualizacao_contato->setFormValue($val);
			$this->data_atualizacao_contato->CurrentValue = UnFormatDateTime($this->data_atualizacao_contato->CurrentValue, 0);
		}

		// Check field name 'bool_ativo_contato' first before field var 'x_bool_ativo_contato'
		$val = $CurrentForm->hasValue("bool_ativo_contato") ? $CurrentForm->getValue("bool_ativo_contato") : $CurrentForm->getValue("x_bool_ativo_contato");
		if (!$this->bool_ativo_contato->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_contato->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_contato->setFormValue($val);
		}

		// Check field name 'id_contato' first before field var 'x_id_contato'
		$val = $CurrentForm->hasValue("id_contato") ? $CurrentForm->getValue("id_contato") : $CurrentForm->getValue("x_id_contato");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->nome_contato->CurrentValue = $this->nome_contato->FormValue;
		$this->email_contato->CurrentValue = $this->email_contato->FormValue;
		$this->telefone_contato->CurrentValue = $this->telefone_contato->FormValue;
		$this->assunto_contato->CurrentValue = $this->assunto_contato->FormValue;
		$this->mensagem_contato->CurrentValue = $this->mensagem_contato->FormValue;
		$this->usuario_id->CurrentValue = $this->usuario_id->FormValue;
		$this->data_atualizacao_contato->CurrentValue = $this->data_atualizacao_contato->FormValue;
		$this->data_atualizacao_contato->CurrentValue = UnFormatDateTime($this->data_atualizacao_contato->CurrentValue, 0);
		$this->bool_ativo_contato->CurrentValue = $this->bool_ativo_contato->FormValue;
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
		$this->id_contato->setDbValue($row['id_contato']);
		$this->nome_contato->setDbValue($row['nome_contato']);
		$this->email_contato->setDbValue($row['email_contato']);
		$this->telefone_contato->setDbValue($row['telefone_contato']);
		$this->assunto_contato->setDbValue($row['assunto_contato']);
		$this->mensagem_contato->setDbValue($row['mensagem_contato']);
		$this->usuario_id->setDbValue($row['usuario_id']);
		$this->data_atualizacao_contato->setDbValue($row['data_atualizacao_contato']);
		$this->bool_ativo_contato->setDbValue($row['bool_ativo_contato']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_contato'] = $this->id_contato->CurrentValue;
		$row['nome_contato'] = $this->nome_contato->CurrentValue;
		$row['email_contato'] = $this->email_contato->CurrentValue;
		$row['telefone_contato'] = $this->telefone_contato->CurrentValue;
		$row['assunto_contato'] = $this->assunto_contato->CurrentValue;
		$row['mensagem_contato'] = $this->mensagem_contato->CurrentValue;
		$row['usuario_id'] = $this->usuario_id->CurrentValue;
		$row['data_atualizacao_contato'] = $this->data_atualizacao_contato->CurrentValue;
		$row['bool_ativo_contato'] = $this->bool_ativo_contato->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_contato")) <> "")
			$this->id_contato->CurrentValue = $this->getKey("id_contato"); // id_contato
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
		// id_contato
		// nome_contato
		// email_contato
		// telefone_contato
		// assunto_contato
		// mensagem_contato
		// usuario_id
		// data_atualizacao_contato
		// bool_ativo_contato

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_contato
			$this->id_contato->ViewValue = $this->id_contato->CurrentValue;
			$this->id_contato->ViewCustomAttributes = "";

			// nome_contato
			$this->nome_contato->ViewValue = $this->nome_contato->CurrentValue;
			$this->nome_contato->ViewCustomAttributes = "";

			// email_contato
			$this->email_contato->ViewValue = $this->email_contato->CurrentValue;
			$this->email_contato->ViewCustomAttributes = "";

			// telefone_contato
			$this->telefone_contato->ViewValue = $this->telefone_contato->CurrentValue;
			$this->telefone_contato->ViewCustomAttributes = "";

			// assunto_contato
			$this->assunto_contato->ViewValue = $this->assunto_contato->CurrentValue;
			$this->assunto_contato->ViewCustomAttributes = "";

			// mensagem_contato
			$this->mensagem_contato->ViewValue = $this->mensagem_contato->CurrentValue;
			$this->mensagem_contato->ViewCustomAttributes = "";

			// usuario_id
			$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
			$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
			$this->usuario_id->ViewCustomAttributes = "";

			// data_atualizacao_contato
			$this->data_atualizacao_contato->ViewValue = $this->data_atualizacao_contato->CurrentValue;
			$this->data_atualizacao_contato->ViewValue = FormatDateTime($this->data_atualizacao_contato->ViewValue, 0);
			$this->data_atualizacao_contato->ViewCustomAttributes = "";

			// bool_ativo_contato
			$this->bool_ativo_contato->ViewValue = $this->bool_ativo_contato->CurrentValue;
			$this->bool_ativo_contato->ViewValue = FormatNumber($this->bool_ativo_contato->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_contato->ViewCustomAttributes = "";

			// nome_contato
			$this->nome_contato->LinkCustomAttributes = "";
			$this->nome_contato->HrefValue = "";
			$this->nome_contato->TooltipValue = "";

			// email_contato
			$this->email_contato->LinkCustomAttributes = "";
			$this->email_contato->HrefValue = "";
			$this->email_contato->TooltipValue = "";

			// telefone_contato
			$this->telefone_contato->LinkCustomAttributes = "";
			$this->telefone_contato->HrefValue = "";
			$this->telefone_contato->TooltipValue = "";

			// assunto_contato
			$this->assunto_contato->LinkCustomAttributes = "";
			$this->assunto_contato->HrefValue = "";
			$this->assunto_contato->TooltipValue = "";

			// mensagem_contato
			$this->mensagem_contato->LinkCustomAttributes = "";
			$this->mensagem_contato->HrefValue = "";
			$this->mensagem_contato->TooltipValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";
			$this->usuario_id->TooltipValue = "";

			// data_atualizacao_contato
			$this->data_atualizacao_contato->LinkCustomAttributes = "";
			$this->data_atualizacao_contato->HrefValue = "";
			$this->data_atualizacao_contato->TooltipValue = "";

			// bool_ativo_contato
			$this->bool_ativo_contato->LinkCustomAttributes = "";
			$this->bool_ativo_contato->HrefValue = "";
			$this->bool_ativo_contato->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// nome_contato
			$this->nome_contato->EditAttrs["class"] = "form-control";
			$this->nome_contato->EditCustomAttributes = "";
			$this->nome_contato->EditValue = HtmlEncode($this->nome_contato->CurrentValue);
			$this->nome_contato->PlaceHolder = RemoveHtml($this->nome_contato->caption());

			// email_contato
			$this->email_contato->EditAttrs["class"] = "form-control";
			$this->email_contato->EditCustomAttributes = "";
			$this->email_contato->EditValue = HtmlEncode($this->email_contato->CurrentValue);
			$this->email_contato->PlaceHolder = RemoveHtml($this->email_contato->caption());

			// telefone_contato
			$this->telefone_contato->EditAttrs["class"] = "form-control";
			$this->telefone_contato->EditCustomAttributes = "";
			$this->telefone_contato->EditValue = HtmlEncode($this->telefone_contato->CurrentValue);
			$this->telefone_contato->PlaceHolder = RemoveHtml($this->telefone_contato->caption());

			// assunto_contato
			$this->assunto_contato->EditAttrs["class"] = "form-control";
			$this->assunto_contato->EditCustomAttributes = "";
			$this->assunto_contato->EditValue = HtmlEncode($this->assunto_contato->CurrentValue);
			$this->assunto_contato->PlaceHolder = RemoveHtml($this->assunto_contato->caption());

			// mensagem_contato
			$this->mensagem_contato->EditAttrs["class"] = "form-control";
			$this->mensagem_contato->EditCustomAttributes = "";
			$this->mensagem_contato->EditValue = HtmlEncode($this->mensagem_contato->CurrentValue);
			$this->mensagem_contato->PlaceHolder = RemoveHtml($this->mensagem_contato->caption());

			// usuario_id
			$this->usuario_id->EditAttrs["class"] = "form-control";
			$this->usuario_id->EditCustomAttributes = "";
			$this->usuario_id->EditValue = HtmlEncode($this->usuario_id->CurrentValue);
			$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

			// data_atualizacao_contato
			$this->data_atualizacao_contato->EditAttrs["class"] = "form-control";
			$this->data_atualizacao_contato->EditCustomAttributes = "";
			$this->data_atualizacao_contato->EditValue = HtmlEncode(FormatDateTime($this->data_atualizacao_contato->CurrentValue, 8));
			$this->data_atualizacao_contato->PlaceHolder = RemoveHtml($this->data_atualizacao_contato->caption());

			// bool_ativo_contato
			$this->bool_ativo_contato->EditAttrs["class"] = "form-control";
			$this->bool_ativo_contato->EditCustomAttributes = "";
			$this->bool_ativo_contato->EditValue = HtmlEncode($this->bool_ativo_contato->CurrentValue);
			$this->bool_ativo_contato->PlaceHolder = RemoveHtml($this->bool_ativo_contato->caption());

			// Add refer script
			// nome_contato

			$this->nome_contato->LinkCustomAttributes = "";
			$this->nome_contato->HrefValue = "";

			// email_contato
			$this->email_contato->LinkCustomAttributes = "";
			$this->email_contato->HrefValue = "";

			// telefone_contato
			$this->telefone_contato->LinkCustomAttributes = "";
			$this->telefone_contato->HrefValue = "";

			// assunto_contato
			$this->assunto_contato->LinkCustomAttributes = "";
			$this->assunto_contato->HrefValue = "";

			// mensagem_contato
			$this->mensagem_contato->LinkCustomAttributes = "";
			$this->mensagem_contato->HrefValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";

			// data_atualizacao_contato
			$this->data_atualizacao_contato->LinkCustomAttributes = "";
			$this->data_atualizacao_contato->HrefValue = "";

			// bool_ativo_contato
			$this->bool_ativo_contato->LinkCustomAttributes = "";
			$this->bool_ativo_contato->HrefValue = "";
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
		if ($this->id_contato->Required) {
			if (!$this->id_contato->IsDetailKey && $this->id_contato->FormValue != NULL && $this->id_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_contato->caption(), $this->id_contato->RequiredErrorMessage));
			}
		}
		if ($this->nome_contato->Required) {
			if (!$this->nome_contato->IsDetailKey && $this->nome_contato->FormValue != NULL && $this->nome_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nome_contato->caption(), $this->nome_contato->RequiredErrorMessage));
			}
		}
		if ($this->email_contato->Required) {
			if (!$this->email_contato->IsDetailKey && $this->email_contato->FormValue != NULL && $this->email_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_contato->caption(), $this->email_contato->RequiredErrorMessage));
			}
		}
		if ($this->telefone_contato->Required) {
			if (!$this->telefone_contato->IsDetailKey && $this->telefone_contato->FormValue != NULL && $this->telefone_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->telefone_contato->caption(), $this->telefone_contato->RequiredErrorMessage));
			}
		}
		if ($this->assunto_contato->Required) {
			if (!$this->assunto_contato->IsDetailKey && $this->assunto_contato->FormValue != NULL && $this->assunto_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->assunto_contato->caption(), $this->assunto_contato->RequiredErrorMessage));
			}
		}
		if ($this->mensagem_contato->Required) {
			if (!$this->mensagem_contato->IsDetailKey && $this->mensagem_contato->FormValue != NULL && $this->mensagem_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mensagem_contato->caption(), $this->mensagem_contato->RequiredErrorMessage));
			}
		}
		if ($this->usuario_id->Required) {
			if (!$this->usuario_id->IsDetailKey && $this->usuario_id->FormValue != NULL && $this->usuario_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usuario_id->caption(), $this->usuario_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->usuario_id->FormValue)) {
			AddMessage($FormError, $this->usuario_id->errorMessage());
		}
		if ($this->data_atualizacao_contato->Required) {
			if (!$this->data_atualizacao_contato->IsDetailKey && $this->data_atualizacao_contato->FormValue != NULL && $this->data_atualizacao_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->data_atualizacao_contato->caption(), $this->data_atualizacao_contato->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->data_atualizacao_contato->FormValue)) {
			AddMessage($FormError, $this->data_atualizacao_contato->errorMessage());
		}
		if ($this->bool_ativo_contato->Required) {
			if (!$this->bool_ativo_contato->IsDetailKey && $this->bool_ativo_contato->FormValue != NULL && $this->bool_ativo_contato->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_contato->caption(), $this->bool_ativo_contato->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_contato->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_contato->errorMessage());
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

		// nome_contato
		$this->nome_contato->setDbValueDef($rsnew, $this->nome_contato->CurrentValue, "", FALSE);

		// email_contato
		$this->email_contato->setDbValueDef($rsnew, $this->email_contato->CurrentValue, NULL, FALSE);

		// telefone_contato
		$this->telefone_contato->setDbValueDef($rsnew, $this->telefone_contato->CurrentValue, NULL, FALSE);

		// assunto_contato
		$this->assunto_contato->setDbValueDef($rsnew, $this->assunto_contato->CurrentValue, NULL, FALSE);

		// mensagem_contato
		$this->mensagem_contato->setDbValueDef($rsnew, $this->mensagem_contato->CurrentValue, NULL, FALSE);

		// usuario_id
		$this->usuario_id->setDbValueDef($rsnew, $this->usuario_id->CurrentValue, 0, FALSE);

		// data_atualizacao_contato
		$this->data_atualizacao_contato->setDbValueDef($rsnew, UnFormatDateTime($this->data_atualizacao_contato->CurrentValue, 0), CurrentDate(), FALSE);

		// bool_ativo_contato
		$this->bool_ativo_contato->setDbValueDef($rsnew, $this->bool_ativo_contato->CurrentValue, 0, strval($this->bool_ativo_contato->CurrentValue) == "");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("contatolist.php"), "", $this->TableVar, TRUE);
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
