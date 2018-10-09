<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class new_sjt_add extends new_sjt
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'new_sjt';

	// Page object name
	public $PageObjName = "new_sjt_add";

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

		// Table object (new_sjt)
		if (!isset($GLOBALS["new_sjt"]) || get_class($GLOBALS["new_sjt"]) == PROJECT_NAMESPACE . "new_sjt") {
			$GLOBALS["new_sjt"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["new_sjt"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'new_sjt');

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
		global $EXPORT, $new_sjt;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($new_sjt);
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
					if ($pageName == "new_sjtview.php")
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
			$key .= @$ar['id_new_sjt'];
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
			$this->id_new_sjt->Visible = FALSE;
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
		$this->id_new_sjt->Visible = FALSE;
		$this->descricao_new_sjt->setVisibility();
		$this->imagem_demonstrativa_new_sjt->setVisibility();
		$this->numero_edicao_new_sjt->setVisibility();
		$this->data_atualizacao_new_sjt->setVisibility();
		$this->usuario_id->setVisibility();
		$this->bool_ativo_new_sjt->setVisibility();
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
			if (Get("id_new_sjt") !== NULL) {
				$this->id_new_sjt->setQueryStringValue(Get("id_new_sjt"));
				$this->setKey("id_new_sjt", $this->id_new_sjt->CurrentValue); // Set up key
			} else {
				$this->setKey("id_new_sjt", ""); // Clear key
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
					$this->terminate("new_sjtlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "new_sjtlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "new_sjtview.php")
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
		$this->id_new_sjt->CurrentValue = NULL;
		$this->id_new_sjt->OldValue = $this->id_new_sjt->CurrentValue;
		$this->descricao_new_sjt->CurrentValue = NULL;
		$this->descricao_new_sjt->OldValue = $this->descricao_new_sjt->CurrentValue;
		$this->imagem_demonstrativa_new_sjt->CurrentValue = NULL;
		$this->imagem_demonstrativa_new_sjt->OldValue = $this->imagem_demonstrativa_new_sjt->CurrentValue;
		$this->numero_edicao_new_sjt->CurrentValue = NULL;
		$this->numero_edicao_new_sjt->OldValue = $this->numero_edicao_new_sjt->CurrentValue;
		$this->data_atualizacao_new_sjt->CurrentValue = NULL;
		$this->data_atualizacao_new_sjt->OldValue = $this->data_atualizacao_new_sjt->CurrentValue;
		$this->usuario_id->CurrentValue = NULL;
		$this->usuario_id->OldValue = $this->usuario_id->CurrentValue;
		$this->bool_ativo_new_sjt->CurrentValue = 1;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'descricao_new_sjt' first before field var 'x_descricao_new_sjt'
		$val = $CurrentForm->hasValue("descricao_new_sjt") ? $CurrentForm->getValue("descricao_new_sjt") : $CurrentForm->getValue("x_descricao_new_sjt");
		if (!$this->descricao_new_sjt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->descricao_new_sjt->Visible = FALSE; // Disable update for API request
			else
				$this->descricao_new_sjt->setFormValue($val);
		}

		// Check field name 'imagem_demonstrativa_new_sjt' first before field var 'x_imagem_demonstrativa_new_sjt'
		$val = $CurrentForm->hasValue("imagem_demonstrativa_new_sjt") ? $CurrentForm->getValue("imagem_demonstrativa_new_sjt") : $CurrentForm->getValue("x_imagem_demonstrativa_new_sjt");
		if (!$this->imagem_demonstrativa_new_sjt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->imagem_demonstrativa_new_sjt->Visible = FALSE; // Disable update for API request
			else
				$this->imagem_demonstrativa_new_sjt->setFormValue($val);
		}

		// Check field name 'numero_edicao_new_sjt' first before field var 'x_numero_edicao_new_sjt'
		$val = $CurrentForm->hasValue("numero_edicao_new_sjt") ? $CurrentForm->getValue("numero_edicao_new_sjt") : $CurrentForm->getValue("x_numero_edicao_new_sjt");
		if (!$this->numero_edicao_new_sjt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->numero_edicao_new_sjt->Visible = FALSE; // Disable update for API request
			else
				$this->numero_edicao_new_sjt->setFormValue($val);
		}

		// Check field name 'data_atualizacao_new_sjt' first before field var 'x_data_atualizacao_new_sjt'
		$val = $CurrentForm->hasValue("data_atualizacao_new_sjt") ? $CurrentForm->getValue("data_atualizacao_new_sjt") : $CurrentForm->getValue("x_data_atualizacao_new_sjt");
		if (!$this->data_atualizacao_new_sjt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->data_atualizacao_new_sjt->Visible = FALSE; // Disable update for API request
			else
				$this->data_atualizacao_new_sjt->setFormValue($val);
			$this->data_atualizacao_new_sjt->CurrentValue = UnFormatDateTime($this->data_atualizacao_new_sjt->CurrentValue, 0);
		}

		// Check field name 'usuario_id' first before field var 'x_usuario_id'
		$val = $CurrentForm->hasValue("usuario_id") ? $CurrentForm->getValue("usuario_id") : $CurrentForm->getValue("x_usuario_id");
		if (!$this->usuario_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usuario_id->Visible = FALSE; // Disable update for API request
			else
				$this->usuario_id->setFormValue($val);
		}

		// Check field name 'bool_ativo_new_sjt' first before field var 'x_bool_ativo_new_sjt'
		$val = $CurrentForm->hasValue("bool_ativo_new_sjt") ? $CurrentForm->getValue("bool_ativo_new_sjt") : $CurrentForm->getValue("x_bool_ativo_new_sjt");
		if (!$this->bool_ativo_new_sjt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_new_sjt->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_new_sjt->setFormValue($val);
		}

		// Check field name 'id_new_sjt' first before field var 'x_id_new_sjt'
		$val = $CurrentForm->hasValue("id_new_sjt") ? $CurrentForm->getValue("id_new_sjt") : $CurrentForm->getValue("x_id_new_sjt");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->descricao_new_sjt->CurrentValue = $this->descricao_new_sjt->FormValue;
		$this->imagem_demonstrativa_new_sjt->CurrentValue = $this->imagem_demonstrativa_new_sjt->FormValue;
		$this->numero_edicao_new_sjt->CurrentValue = $this->numero_edicao_new_sjt->FormValue;
		$this->data_atualizacao_new_sjt->CurrentValue = $this->data_atualizacao_new_sjt->FormValue;
		$this->data_atualizacao_new_sjt->CurrentValue = UnFormatDateTime($this->data_atualizacao_new_sjt->CurrentValue, 0);
		$this->usuario_id->CurrentValue = $this->usuario_id->FormValue;
		$this->bool_ativo_new_sjt->CurrentValue = $this->bool_ativo_new_sjt->FormValue;
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
		$this->id_new_sjt->setDbValue($row['id_new_sjt']);
		$this->descricao_new_sjt->setDbValue($row['descricao_new_sjt']);
		$this->imagem_demonstrativa_new_sjt->setDbValue($row['imagem_demonstrativa_new_sjt']);
		$this->numero_edicao_new_sjt->setDbValue($row['numero_edicao_new_sjt']);
		$this->data_atualizacao_new_sjt->setDbValue($row['data_atualizacao_new_sjt']);
		$this->usuario_id->setDbValue($row['usuario_id']);
		$this->bool_ativo_new_sjt->setDbValue($row['bool_ativo_new_sjt']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_new_sjt'] = $this->id_new_sjt->CurrentValue;
		$row['descricao_new_sjt'] = $this->descricao_new_sjt->CurrentValue;
		$row['imagem_demonstrativa_new_sjt'] = $this->imagem_demonstrativa_new_sjt->CurrentValue;
		$row['numero_edicao_new_sjt'] = $this->numero_edicao_new_sjt->CurrentValue;
		$row['data_atualizacao_new_sjt'] = $this->data_atualizacao_new_sjt->CurrentValue;
		$row['usuario_id'] = $this->usuario_id->CurrentValue;
		$row['bool_ativo_new_sjt'] = $this->bool_ativo_new_sjt->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_new_sjt")) <> "")
			$this->id_new_sjt->CurrentValue = $this->getKey("id_new_sjt"); // id_new_sjt
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
		// id_new_sjt
		// descricao_new_sjt
		// imagem_demonstrativa_new_sjt
		// numero_edicao_new_sjt
		// data_atualizacao_new_sjt
		// usuario_id
		// bool_ativo_new_sjt

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_new_sjt
			$this->id_new_sjt->ViewValue = $this->id_new_sjt->CurrentValue;
			$this->id_new_sjt->ViewCustomAttributes = "";

			// descricao_new_sjt
			$this->descricao_new_sjt->ViewValue = $this->descricao_new_sjt->CurrentValue;
			$this->descricao_new_sjt->ViewCustomAttributes = "";

			// imagem_demonstrativa_new_sjt
			$this->imagem_demonstrativa_new_sjt->ViewValue = $this->imagem_demonstrativa_new_sjt->CurrentValue;
			$this->imagem_demonstrativa_new_sjt->ViewCustomAttributes = "";

			// numero_edicao_new_sjt
			$this->numero_edicao_new_sjt->ViewValue = $this->numero_edicao_new_sjt->CurrentValue;
			$this->numero_edicao_new_sjt->ViewValue = FormatNumber($this->numero_edicao_new_sjt->ViewValue, 0, -2, -2, -2);
			$this->numero_edicao_new_sjt->ViewCustomAttributes = "";

			// data_atualizacao_new_sjt
			$this->data_atualizacao_new_sjt->ViewValue = $this->data_atualizacao_new_sjt->CurrentValue;
			$this->data_atualizacao_new_sjt->ViewValue = FormatDateTime($this->data_atualizacao_new_sjt->ViewValue, 0);
			$this->data_atualizacao_new_sjt->ViewCustomAttributes = "";

			// usuario_id
			$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
			$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
			$this->usuario_id->ViewCustomAttributes = "";

			// bool_ativo_new_sjt
			$this->bool_ativo_new_sjt->ViewValue = $this->bool_ativo_new_sjt->CurrentValue;
			$this->bool_ativo_new_sjt->ViewValue = FormatNumber($this->bool_ativo_new_sjt->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_new_sjt->ViewCustomAttributes = "";

			// descricao_new_sjt
			$this->descricao_new_sjt->LinkCustomAttributes = "";
			$this->descricao_new_sjt->HrefValue = "";
			$this->descricao_new_sjt->TooltipValue = "";

			// imagem_demonstrativa_new_sjt
			$this->imagem_demonstrativa_new_sjt->LinkCustomAttributes = "";
			$this->imagem_demonstrativa_new_sjt->HrefValue = "";
			$this->imagem_demonstrativa_new_sjt->TooltipValue = "";

			// numero_edicao_new_sjt
			$this->numero_edicao_new_sjt->LinkCustomAttributes = "";
			$this->numero_edicao_new_sjt->HrefValue = "";
			$this->numero_edicao_new_sjt->TooltipValue = "";

			// data_atualizacao_new_sjt
			$this->data_atualizacao_new_sjt->LinkCustomAttributes = "";
			$this->data_atualizacao_new_sjt->HrefValue = "";
			$this->data_atualizacao_new_sjt->TooltipValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";
			$this->usuario_id->TooltipValue = "";

			// bool_ativo_new_sjt
			$this->bool_ativo_new_sjt->LinkCustomAttributes = "";
			$this->bool_ativo_new_sjt->HrefValue = "";
			$this->bool_ativo_new_sjt->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// descricao_new_sjt
			$this->descricao_new_sjt->EditAttrs["class"] = "form-control";
			$this->descricao_new_sjt->EditCustomAttributes = "";
			$this->descricao_new_sjt->EditValue = HtmlEncode($this->descricao_new_sjt->CurrentValue);
			$this->descricao_new_sjt->PlaceHolder = RemoveHtml($this->descricao_new_sjt->caption());

			// imagem_demonstrativa_new_sjt
			$this->imagem_demonstrativa_new_sjt->EditAttrs["class"] = "form-control";
			$this->imagem_demonstrativa_new_sjt->EditCustomAttributes = "";
			$this->imagem_demonstrativa_new_sjt->EditValue = HtmlEncode($this->imagem_demonstrativa_new_sjt->CurrentValue);
			$this->imagem_demonstrativa_new_sjt->PlaceHolder = RemoveHtml($this->imagem_demonstrativa_new_sjt->caption());

			// numero_edicao_new_sjt
			$this->numero_edicao_new_sjt->EditAttrs["class"] = "form-control";
			$this->numero_edicao_new_sjt->EditCustomAttributes = "";
			$this->numero_edicao_new_sjt->EditValue = HtmlEncode($this->numero_edicao_new_sjt->CurrentValue);
			$this->numero_edicao_new_sjt->PlaceHolder = RemoveHtml($this->numero_edicao_new_sjt->caption());

			// data_atualizacao_new_sjt
			$this->data_atualizacao_new_sjt->EditAttrs["class"] = "form-control";
			$this->data_atualizacao_new_sjt->EditCustomAttributes = "";
			$this->data_atualizacao_new_sjt->EditValue = HtmlEncode(FormatDateTime($this->data_atualizacao_new_sjt->CurrentValue, 8));
			$this->data_atualizacao_new_sjt->PlaceHolder = RemoveHtml($this->data_atualizacao_new_sjt->caption());

			// usuario_id
			$this->usuario_id->EditAttrs["class"] = "form-control";
			$this->usuario_id->EditCustomAttributes = "";
			$this->usuario_id->EditValue = HtmlEncode($this->usuario_id->CurrentValue);
			$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

			// bool_ativo_new_sjt
			$this->bool_ativo_new_sjt->EditAttrs["class"] = "form-control";
			$this->bool_ativo_new_sjt->EditCustomAttributes = "";
			$this->bool_ativo_new_sjt->EditValue = HtmlEncode($this->bool_ativo_new_sjt->CurrentValue);
			$this->bool_ativo_new_sjt->PlaceHolder = RemoveHtml($this->bool_ativo_new_sjt->caption());

			// Add refer script
			// descricao_new_sjt

			$this->descricao_new_sjt->LinkCustomAttributes = "";
			$this->descricao_new_sjt->HrefValue = "";

			// imagem_demonstrativa_new_sjt
			$this->imagem_demonstrativa_new_sjt->LinkCustomAttributes = "";
			$this->imagem_demonstrativa_new_sjt->HrefValue = "";

			// numero_edicao_new_sjt
			$this->numero_edicao_new_sjt->LinkCustomAttributes = "";
			$this->numero_edicao_new_sjt->HrefValue = "";

			// data_atualizacao_new_sjt
			$this->data_atualizacao_new_sjt->LinkCustomAttributes = "";
			$this->data_atualizacao_new_sjt->HrefValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";

			// bool_ativo_new_sjt
			$this->bool_ativo_new_sjt->LinkCustomAttributes = "";
			$this->bool_ativo_new_sjt->HrefValue = "";
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
		if ($this->id_new_sjt->Required) {
			if (!$this->id_new_sjt->IsDetailKey && $this->id_new_sjt->FormValue != NULL && $this->id_new_sjt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_new_sjt->caption(), $this->id_new_sjt->RequiredErrorMessage));
			}
		}
		if ($this->descricao_new_sjt->Required) {
			if (!$this->descricao_new_sjt->IsDetailKey && $this->descricao_new_sjt->FormValue != NULL && $this->descricao_new_sjt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->descricao_new_sjt->caption(), $this->descricao_new_sjt->RequiredErrorMessage));
			}
		}
		if ($this->imagem_demonstrativa_new_sjt->Required) {
			if (!$this->imagem_demonstrativa_new_sjt->IsDetailKey && $this->imagem_demonstrativa_new_sjt->FormValue != NULL && $this->imagem_demonstrativa_new_sjt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->imagem_demonstrativa_new_sjt->caption(), $this->imagem_demonstrativa_new_sjt->RequiredErrorMessage));
			}
		}
		if ($this->numero_edicao_new_sjt->Required) {
			if (!$this->numero_edicao_new_sjt->IsDetailKey && $this->numero_edicao_new_sjt->FormValue != NULL && $this->numero_edicao_new_sjt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->numero_edicao_new_sjt->caption(), $this->numero_edicao_new_sjt->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->numero_edicao_new_sjt->FormValue)) {
			AddMessage($FormError, $this->numero_edicao_new_sjt->errorMessage());
		}
		if ($this->data_atualizacao_new_sjt->Required) {
			if (!$this->data_atualizacao_new_sjt->IsDetailKey && $this->data_atualizacao_new_sjt->FormValue != NULL && $this->data_atualizacao_new_sjt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->data_atualizacao_new_sjt->caption(), $this->data_atualizacao_new_sjt->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->data_atualizacao_new_sjt->FormValue)) {
			AddMessage($FormError, $this->data_atualizacao_new_sjt->errorMessage());
		}
		if ($this->usuario_id->Required) {
			if (!$this->usuario_id->IsDetailKey && $this->usuario_id->FormValue != NULL && $this->usuario_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usuario_id->caption(), $this->usuario_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->usuario_id->FormValue)) {
			AddMessage($FormError, $this->usuario_id->errorMessage());
		}
		if ($this->bool_ativo_new_sjt->Required) {
			if (!$this->bool_ativo_new_sjt->IsDetailKey && $this->bool_ativo_new_sjt->FormValue != NULL && $this->bool_ativo_new_sjt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_new_sjt->caption(), $this->bool_ativo_new_sjt->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_new_sjt->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_new_sjt->errorMessage());
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

		// descricao_new_sjt
		$this->descricao_new_sjt->setDbValueDef($rsnew, $this->descricao_new_sjt->CurrentValue, "", FALSE);

		// imagem_demonstrativa_new_sjt
		$this->imagem_demonstrativa_new_sjt->setDbValueDef($rsnew, $this->imagem_demonstrativa_new_sjt->CurrentValue, "", FALSE);

		// numero_edicao_new_sjt
		$this->numero_edicao_new_sjt->setDbValueDef($rsnew, $this->numero_edicao_new_sjt->CurrentValue, 0, FALSE);

		// data_atualizacao_new_sjt
		$this->data_atualizacao_new_sjt->setDbValueDef($rsnew, UnFormatDateTime($this->data_atualizacao_new_sjt->CurrentValue, 0), CurrentDate(), FALSE);

		// usuario_id
		$this->usuario_id->setDbValueDef($rsnew, $this->usuario_id->CurrentValue, 0, FALSE);

		// bool_ativo_new_sjt
		$this->bool_ativo_new_sjt->setDbValueDef($rsnew, $this->bool_ativo_new_sjt->CurrentValue, 0, strval($this->bool_ativo_new_sjt->CurrentValue) == "");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("new_sjtlist.php"), "", $this->TableVar, TRUE);
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
