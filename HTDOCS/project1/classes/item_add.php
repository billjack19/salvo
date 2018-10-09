<?php
namespace PHPMaker2019\project1;

//
// Page class
//
class item_add extends item
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{94B279FF-E847-4DCA-BF46-A72808D48DBD}";

	// Table name
	public $TableName = 'item';

	// Page object name
	public $PageObjName = "item_add";

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

		// Table object (item)
		if (!isset($GLOBALS["item"]) || get_class($GLOBALS["item"]) == PROJECT_NAMESPACE . "item") {
			$GLOBALS["item"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["item"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'item');

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
		global $EXPORT, $item;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($item);
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
					if ($pageName == "itemview.php")
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
			$key .= @$ar['id_item'];
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
			$this->id_item->Visible = FALSE;
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
		$this->id_item->Visible = FALSE;
		$this->titulo_item->setVisibility();
		$this->descricao_resumida_item->setVisibility();
		$this->descricao_site_item->setVisibility();
		$this->imagem_item->setVisibility();
		$this->endereco_item->setVisibility();
		$this->numero_item->setVisibility();
		$this->bairro_item->setVisibility();
		$this->cidade_item->setVisibility();
		$this->estado_id->setVisibility();
		$this->situacao_id->setVisibility();
		$this->grupo_id->setVisibility();
		$this->usuario_id->setVisibility();
		$this->bool_ativo_item->setVisibility();
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
			if (Get("id_item") !== NULL) {
				$this->id_item->setQueryStringValue(Get("id_item"));
				$this->setKey("id_item", $this->id_item->CurrentValue); // Set up key
			} else {
				$this->setKey("id_item", ""); // Clear key
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
					$this->terminate("itemlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "itemlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "itemview.php")
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
		$this->id_item->CurrentValue = NULL;
		$this->id_item->OldValue = $this->id_item->CurrentValue;
		$this->titulo_item->CurrentValue = NULL;
		$this->titulo_item->OldValue = $this->titulo_item->CurrentValue;
		$this->descricao_resumida_item->CurrentValue = NULL;
		$this->descricao_resumida_item->OldValue = $this->descricao_resumida_item->CurrentValue;
		$this->descricao_site_item->CurrentValue = NULL;
		$this->descricao_site_item->OldValue = $this->descricao_site_item->CurrentValue;
		$this->imagem_item->CurrentValue = NULL;
		$this->imagem_item->OldValue = $this->imagem_item->CurrentValue;
		$this->endereco_item->CurrentValue = NULL;
		$this->endereco_item->OldValue = $this->endereco_item->CurrentValue;
		$this->numero_item->CurrentValue = NULL;
		$this->numero_item->OldValue = $this->numero_item->CurrentValue;
		$this->bairro_item->CurrentValue = NULL;
		$this->bairro_item->OldValue = $this->bairro_item->CurrentValue;
		$this->cidade_item->CurrentValue = NULL;
		$this->cidade_item->OldValue = $this->cidade_item->CurrentValue;
		$this->estado_id->CurrentValue = NULL;
		$this->estado_id->OldValue = $this->estado_id->CurrentValue;
		$this->situacao_id->CurrentValue = NULL;
		$this->situacao_id->OldValue = $this->situacao_id->CurrentValue;
		$this->grupo_id->CurrentValue = NULL;
		$this->grupo_id->OldValue = $this->grupo_id->CurrentValue;
		$this->usuario_id->CurrentValue = NULL;
		$this->usuario_id->OldValue = $this->usuario_id->CurrentValue;
		$this->bool_ativo_item->CurrentValue = 1;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'titulo_item' first before field var 'x_titulo_item'
		$val = $CurrentForm->hasValue("titulo_item") ? $CurrentForm->getValue("titulo_item") : $CurrentForm->getValue("x_titulo_item");
		if (!$this->titulo_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->titulo_item->Visible = FALSE; // Disable update for API request
			else
				$this->titulo_item->setFormValue($val);
		}

		// Check field name 'descricao_resumida_item' first before field var 'x_descricao_resumida_item'
		$val = $CurrentForm->hasValue("descricao_resumida_item") ? $CurrentForm->getValue("descricao_resumida_item") : $CurrentForm->getValue("x_descricao_resumida_item");
		if (!$this->descricao_resumida_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->descricao_resumida_item->Visible = FALSE; // Disable update for API request
			else
				$this->descricao_resumida_item->setFormValue($val);
		}

		// Check field name 'descricao_site_item' first before field var 'x_descricao_site_item'
		$val = $CurrentForm->hasValue("descricao_site_item") ? $CurrentForm->getValue("descricao_site_item") : $CurrentForm->getValue("x_descricao_site_item");
		if (!$this->descricao_site_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->descricao_site_item->Visible = FALSE; // Disable update for API request
			else
				$this->descricao_site_item->setFormValue($val);
		}

		// Check field name 'imagem_item' first before field var 'x_imagem_item'
		$val = $CurrentForm->hasValue("imagem_item") ? $CurrentForm->getValue("imagem_item") : $CurrentForm->getValue("x_imagem_item");
		if (!$this->imagem_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->imagem_item->Visible = FALSE; // Disable update for API request
			else
				$this->imagem_item->setFormValue($val);
		}

		// Check field name 'endereco_item' first before field var 'x_endereco_item'
		$val = $CurrentForm->hasValue("endereco_item") ? $CurrentForm->getValue("endereco_item") : $CurrentForm->getValue("x_endereco_item");
		if (!$this->endereco_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->endereco_item->Visible = FALSE; // Disable update for API request
			else
				$this->endereco_item->setFormValue($val);
		}

		// Check field name 'numero_item' first before field var 'x_numero_item'
		$val = $CurrentForm->hasValue("numero_item") ? $CurrentForm->getValue("numero_item") : $CurrentForm->getValue("x_numero_item");
		if (!$this->numero_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->numero_item->Visible = FALSE; // Disable update for API request
			else
				$this->numero_item->setFormValue($val);
		}

		// Check field name 'bairro_item' first before field var 'x_bairro_item'
		$val = $CurrentForm->hasValue("bairro_item") ? $CurrentForm->getValue("bairro_item") : $CurrentForm->getValue("x_bairro_item");
		if (!$this->bairro_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bairro_item->Visible = FALSE; // Disable update for API request
			else
				$this->bairro_item->setFormValue($val);
		}

		// Check field name 'cidade_item' first before field var 'x_cidade_item'
		$val = $CurrentForm->hasValue("cidade_item") ? $CurrentForm->getValue("cidade_item") : $CurrentForm->getValue("x_cidade_item");
		if (!$this->cidade_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cidade_item->Visible = FALSE; // Disable update for API request
			else
				$this->cidade_item->setFormValue($val);
		}

		// Check field name 'estado_id' first before field var 'x_estado_id'
		$val = $CurrentForm->hasValue("estado_id") ? $CurrentForm->getValue("estado_id") : $CurrentForm->getValue("x_estado_id");
		if (!$this->estado_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->estado_id->Visible = FALSE; // Disable update for API request
			else
				$this->estado_id->setFormValue($val);
		}

		// Check field name 'situacao_id' first before field var 'x_situacao_id'
		$val = $CurrentForm->hasValue("situacao_id") ? $CurrentForm->getValue("situacao_id") : $CurrentForm->getValue("x_situacao_id");
		if (!$this->situacao_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->situacao_id->Visible = FALSE; // Disable update for API request
			else
				$this->situacao_id->setFormValue($val);
		}

		// Check field name 'grupo_id' first before field var 'x_grupo_id'
		$val = $CurrentForm->hasValue("grupo_id") ? $CurrentForm->getValue("grupo_id") : $CurrentForm->getValue("x_grupo_id");
		if (!$this->grupo_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grupo_id->Visible = FALSE; // Disable update for API request
			else
				$this->grupo_id->setFormValue($val);
		}

		// Check field name 'usuario_id' first before field var 'x_usuario_id'
		$val = $CurrentForm->hasValue("usuario_id") ? $CurrentForm->getValue("usuario_id") : $CurrentForm->getValue("x_usuario_id");
		if (!$this->usuario_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usuario_id->Visible = FALSE; // Disable update for API request
			else
				$this->usuario_id->setFormValue($val);
		}

		// Check field name 'bool_ativo_item' first before field var 'x_bool_ativo_item'
		$val = $CurrentForm->hasValue("bool_ativo_item") ? $CurrentForm->getValue("bool_ativo_item") : $CurrentForm->getValue("x_bool_ativo_item");
		if (!$this->bool_ativo_item->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bool_ativo_item->Visible = FALSE; // Disable update for API request
			else
				$this->bool_ativo_item->setFormValue($val);
		}

		// Check field name 'id_item' first before field var 'x_id_item'
		$val = $CurrentForm->hasValue("id_item") ? $CurrentForm->getValue("id_item") : $CurrentForm->getValue("x_id_item");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->titulo_item->CurrentValue = $this->titulo_item->FormValue;
		$this->descricao_resumida_item->CurrentValue = $this->descricao_resumida_item->FormValue;
		$this->descricao_site_item->CurrentValue = $this->descricao_site_item->FormValue;
		$this->imagem_item->CurrentValue = $this->imagem_item->FormValue;
		$this->endereco_item->CurrentValue = $this->endereco_item->FormValue;
		$this->numero_item->CurrentValue = $this->numero_item->FormValue;
		$this->bairro_item->CurrentValue = $this->bairro_item->FormValue;
		$this->cidade_item->CurrentValue = $this->cidade_item->FormValue;
		$this->estado_id->CurrentValue = $this->estado_id->FormValue;
		$this->situacao_id->CurrentValue = $this->situacao_id->FormValue;
		$this->grupo_id->CurrentValue = $this->grupo_id->FormValue;
		$this->usuario_id->CurrentValue = $this->usuario_id->FormValue;
		$this->bool_ativo_item->CurrentValue = $this->bool_ativo_item->FormValue;
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
		$this->id_item->setDbValue($row['id_item']);
		$this->titulo_item->setDbValue($row['titulo_item']);
		$this->descricao_resumida_item->setDbValue($row['descricao_resumida_item']);
		$this->descricao_site_item->setDbValue($row['descricao_site_item']);
		$this->imagem_item->setDbValue($row['imagem_item']);
		$this->endereco_item->setDbValue($row['endereco_item']);
		$this->numero_item->setDbValue($row['numero_item']);
		$this->bairro_item->setDbValue($row['bairro_item']);
		$this->cidade_item->setDbValue($row['cidade_item']);
		$this->estado_id->setDbValue($row['estado_id']);
		$this->situacao_id->setDbValue($row['situacao_id']);
		$this->grupo_id->setDbValue($row['grupo_id']);
		$this->usuario_id->setDbValue($row['usuario_id']);
		$this->bool_ativo_item->setDbValue($row['bool_ativo_item']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_item'] = $this->id_item->CurrentValue;
		$row['titulo_item'] = $this->titulo_item->CurrentValue;
		$row['descricao_resumida_item'] = $this->descricao_resumida_item->CurrentValue;
		$row['descricao_site_item'] = $this->descricao_site_item->CurrentValue;
		$row['imagem_item'] = $this->imagem_item->CurrentValue;
		$row['endereco_item'] = $this->endereco_item->CurrentValue;
		$row['numero_item'] = $this->numero_item->CurrentValue;
		$row['bairro_item'] = $this->bairro_item->CurrentValue;
		$row['cidade_item'] = $this->cidade_item->CurrentValue;
		$row['estado_id'] = $this->estado_id->CurrentValue;
		$row['situacao_id'] = $this->situacao_id->CurrentValue;
		$row['grupo_id'] = $this->grupo_id->CurrentValue;
		$row['usuario_id'] = $this->usuario_id->CurrentValue;
		$row['bool_ativo_item'] = $this->bool_ativo_item->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_item")) <> "")
			$this->id_item->CurrentValue = $this->getKey("id_item"); // id_item
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
		// id_item
		// titulo_item
		// descricao_resumida_item
		// descricao_site_item
		// imagem_item
		// endereco_item
		// numero_item
		// bairro_item
		// cidade_item
		// estado_id
		// situacao_id
		// grupo_id
		// usuario_id
		// bool_ativo_item

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_item
			$this->id_item->ViewValue = $this->id_item->CurrentValue;
			$this->id_item->ViewCustomAttributes = "";

			// titulo_item
			$this->titulo_item->ViewValue = $this->titulo_item->CurrentValue;
			$this->titulo_item->ViewCustomAttributes = "";

			// descricao_resumida_item
			$this->descricao_resumida_item->ViewValue = $this->descricao_resumida_item->CurrentValue;
			$this->descricao_resumida_item->ViewCustomAttributes = "";

			// descricao_site_item
			$this->descricao_site_item->ViewValue = $this->descricao_site_item->CurrentValue;
			$this->descricao_site_item->ViewCustomAttributes = "";

			// imagem_item
			$this->imagem_item->ViewValue = $this->imagem_item->CurrentValue;
			$this->imagem_item->ViewCustomAttributes = "";

			// endereco_item
			$this->endereco_item->ViewValue = $this->endereco_item->CurrentValue;
			$this->endereco_item->ViewCustomAttributes = "";

			// numero_item
			$this->numero_item->ViewValue = $this->numero_item->CurrentValue;
			$this->numero_item->ViewValue = FormatNumber($this->numero_item->ViewValue, 0, -2, -2, -2);
			$this->numero_item->ViewCustomAttributes = "";

			// bairro_item
			$this->bairro_item->ViewValue = $this->bairro_item->CurrentValue;
			$this->bairro_item->ViewCustomAttributes = "";

			// cidade_item
			$this->cidade_item->ViewValue = $this->cidade_item->CurrentValue;
			$this->cidade_item->ViewCustomAttributes = "";

			// estado_id
			$this->estado_id->ViewValue = $this->estado_id->CurrentValue;
			$this->estado_id->ViewValue = FormatNumber($this->estado_id->ViewValue, 0, -2, -2, -2);
			$this->estado_id->ViewCustomAttributes = "";

			// situacao_id
			$this->situacao_id->ViewValue = $this->situacao_id->CurrentValue;
			$this->situacao_id->ViewValue = FormatNumber($this->situacao_id->ViewValue, 0, -2, -2, -2);
			$this->situacao_id->ViewCustomAttributes = "";

			// grupo_id
			$this->grupo_id->ViewValue = $this->grupo_id->CurrentValue;
			$this->grupo_id->ViewValue = FormatNumber($this->grupo_id->ViewValue, 0, -2, -2, -2);
			$this->grupo_id->ViewCustomAttributes = "";

			// usuario_id
			$this->usuario_id->ViewValue = $this->usuario_id->CurrentValue;
			$this->usuario_id->ViewValue = FormatNumber($this->usuario_id->ViewValue, 0, -2, -2, -2);
			$this->usuario_id->ViewCustomAttributes = "";

			// bool_ativo_item
			$this->bool_ativo_item->ViewValue = $this->bool_ativo_item->CurrentValue;
			$this->bool_ativo_item->ViewValue = FormatNumber($this->bool_ativo_item->ViewValue, 0, -2, -2, -2);
			$this->bool_ativo_item->ViewCustomAttributes = "";

			// titulo_item
			$this->titulo_item->LinkCustomAttributes = "";
			$this->titulo_item->HrefValue = "";
			$this->titulo_item->TooltipValue = "";

			// descricao_resumida_item
			$this->descricao_resumida_item->LinkCustomAttributes = "";
			$this->descricao_resumida_item->HrefValue = "";
			$this->descricao_resumida_item->TooltipValue = "";

			// descricao_site_item
			$this->descricao_site_item->LinkCustomAttributes = "";
			$this->descricao_site_item->HrefValue = "";
			$this->descricao_site_item->TooltipValue = "";

			// imagem_item
			$this->imagem_item->LinkCustomAttributes = "";
			$this->imagem_item->HrefValue = "";
			$this->imagem_item->TooltipValue = "";

			// endereco_item
			$this->endereco_item->LinkCustomAttributes = "";
			$this->endereco_item->HrefValue = "";
			$this->endereco_item->TooltipValue = "";

			// numero_item
			$this->numero_item->LinkCustomAttributes = "";
			$this->numero_item->HrefValue = "";
			$this->numero_item->TooltipValue = "";

			// bairro_item
			$this->bairro_item->LinkCustomAttributes = "";
			$this->bairro_item->HrefValue = "";
			$this->bairro_item->TooltipValue = "";

			// cidade_item
			$this->cidade_item->LinkCustomAttributes = "";
			$this->cidade_item->HrefValue = "";
			$this->cidade_item->TooltipValue = "";

			// estado_id
			$this->estado_id->LinkCustomAttributes = "";
			$this->estado_id->HrefValue = "";
			$this->estado_id->TooltipValue = "";

			// situacao_id
			$this->situacao_id->LinkCustomAttributes = "";
			$this->situacao_id->HrefValue = "";
			$this->situacao_id->TooltipValue = "";

			// grupo_id
			$this->grupo_id->LinkCustomAttributes = "";
			$this->grupo_id->HrefValue = "";
			$this->grupo_id->TooltipValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";
			$this->usuario_id->TooltipValue = "";

			// bool_ativo_item
			$this->bool_ativo_item->LinkCustomAttributes = "";
			$this->bool_ativo_item->HrefValue = "";
			$this->bool_ativo_item->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// titulo_item
			$this->titulo_item->EditAttrs["class"] = "form-control";
			$this->titulo_item->EditCustomAttributes = "";
			$this->titulo_item->EditValue = HtmlEncode($this->titulo_item->CurrentValue);
			$this->titulo_item->PlaceHolder = RemoveHtml($this->titulo_item->caption());

			// descricao_resumida_item
			$this->descricao_resumida_item->EditAttrs["class"] = "form-control";
			$this->descricao_resumida_item->EditCustomAttributes = "";
			$this->descricao_resumida_item->EditValue = HtmlEncode($this->descricao_resumida_item->CurrentValue);
			$this->descricao_resumida_item->PlaceHolder = RemoveHtml($this->descricao_resumida_item->caption());

			// descricao_site_item
			$this->descricao_site_item->EditAttrs["class"] = "form-control";
			$this->descricao_site_item->EditCustomAttributes = "";
			$this->descricao_site_item->EditValue = HtmlEncode($this->descricao_site_item->CurrentValue);
			$this->descricao_site_item->PlaceHolder = RemoveHtml($this->descricao_site_item->caption());

			// imagem_item
			$this->imagem_item->EditAttrs["class"] = "form-control";
			$this->imagem_item->EditCustomAttributes = "";
			$this->imagem_item->EditValue = HtmlEncode($this->imagem_item->CurrentValue);
			$this->imagem_item->PlaceHolder = RemoveHtml($this->imagem_item->caption());

			// endereco_item
			$this->endereco_item->EditAttrs["class"] = "form-control";
			$this->endereco_item->EditCustomAttributes = "";
			$this->endereco_item->EditValue = HtmlEncode($this->endereco_item->CurrentValue);
			$this->endereco_item->PlaceHolder = RemoveHtml($this->endereco_item->caption());

			// numero_item
			$this->numero_item->EditAttrs["class"] = "form-control";
			$this->numero_item->EditCustomAttributes = "";
			$this->numero_item->EditValue = HtmlEncode($this->numero_item->CurrentValue);
			$this->numero_item->PlaceHolder = RemoveHtml($this->numero_item->caption());

			// bairro_item
			$this->bairro_item->EditAttrs["class"] = "form-control";
			$this->bairro_item->EditCustomAttributes = "";
			$this->bairro_item->EditValue = HtmlEncode($this->bairro_item->CurrentValue);
			$this->bairro_item->PlaceHolder = RemoveHtml($this->bairro_item->caption());

			// cidade_item
			$this->cidade_item->EditAttrs["class"] = "form-control";
			$this->cidade_item->EditCustomAttributes = "";
			$this->cidade_item->EditValue = HtmlEncode($this->cidade_item->CurrentValue);
			$this->cidade_item->PlaceHolder = RemoveHtml($this->cidade_item->caption());

			// estado_id
			$this->estado_id->EditAttrs["class"] = "form-control";
			$this->estado_id->EditCustomAttributes = "";
			$this->estado_id->EditValue = HtmlEncode($this->estado_id->CurrentValue);
			$this->estado_id->PlaceHolder = RemoveHtml($this->estado_id->caption());

			// situacao_id
			$this->situacao_id->EditAttrs["class"] = "form-control";
			$this->situacao_id->EditCustomAttributes = "";
			$this->situacao_id->EditValue = HtmlEncode($this->situacao_id->CurrentValue);
			$this->situacao_id->PlaceHolder = RemoveHtml($this->situacao_id->caption());

			// grupo_id
			$this->grupo_id->EditAttrs["class"] = "form-control";
			$this->grupo_id->EditCustomAttributes = "";
			$this->grupo_id->EditValue = HtmlEncode($this->grupo_id->CurrentValue);
			$this->grupo_id->PlaceHolder = RemoveHtml($this->grupo_id->caption());

			// usuario_id
			$this->usuario_id->EditAttrs["class"] = "form-control";
			$this->usuario_id->EditCustomAttributes = "";
			$this->usuario_id->EditValue = HtmlEncode($this->usuario_id->CurrentValue);
			$this->usuario_id->PlaceHolder = RemoveHtml($this->usuario_id->caption());

			// bool_ativo_item
			$this->bool_ativo_item->EditAttrs["class"] = "form-control";
			$this->bool_ativo_item->EditCustomAttributes = "";
			$this->bool_ativo_item->EditValue = HtmlEncode($this->bool_ativo_item->CurrentValue);
			$this->bool_ativo_item->PlaceHolder = RemoveHtml($this->bool_ativo_item->caption());

			// Add refer script
			// titulo_item

			$this->titulo_item->LinkCustomAttributes = "";
			$this->titulo_item->HrefValue = "";

			// descricao_resumida_item
			$this->descricao_resumida_item->LinkCustomAttributes = "";
			$this->descricao_resumida_item->HrefValue = "";

			// descricao_site_item
			$this->descricao_site_item->LinkCustomAttributes = "";
			$this->descricao_site_item->HrefValue = "";

			// imagem_item
			$this->imagem_item->LinkCustomAttributes = "";
			$this->imagem_item->HrefValue = "";

			// endereco_item
			$this->endereco_item->LinkCustomAttributes = "";
			$this->endereco_item->HrefValue = "";

			// numero_item
			$this->numero_item->LinkCustomAttributes = "";
			$this->numero_item->HrefValue = "";

			// bairro_item
			$this->bairro_item->LinkCustomAttributes = "";
			$this->bairro_item->HrefValue = "";

			// cidade_item
			$this->cidade_item->LinkCustomAttributes = "";
			$this->cidade_item->HrefValue = "";

			// estado_id
			$this->estado_id->LinkCustomAttributes = "";
			$this->estado_id->HrefValue = "";

			// situacao_id
			$this->situacao_id->LinkCustomAttributes = "";
			$this->situacao_id->HrefValue = "";

			// grupo_id
			$this->grupo_id->LinkCustomAttributes = "";
			$this->grupo_id->HrefValue = "";

			// usuario_id
			$this->usuario_id->LinkCustomAttributes = "";
			$this->usuario_id->HrefValue = "";

			// bool_ativo_item
			$this->bool_ativo_item->LinkCustomAttributes = "";
			$this->bool_ativo_item->HrefValue = "";
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
		if ($this->id_item->Required) {
			if (!$this->id_item->IsDetailKey && $this->id_item->FormValue != NULL && $this->id_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_item->caption(), $this->id_item->RequiredErrorMessage));
			}
		}
		if ($this->titulo_item->Required) {
			if (!$this->titulo_item->IsDetailKey && $this->titulo_item->FormValue != NULL && $this->titulo_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->titulo_item->caption(), $this->titulo_item->RequiredErrorMessage));
			}
		}
		if ($this->descricao_resumida_item->Required) {
			if (!$this->descricao_resumida_item->IsDetailKey && $this->descricao_resumida_item->FormValue != NULL && $this->descricao_resumida_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->descricao_resumida_item->caption(), $this->descricao_resumida_item->RequiredErrorMessage));
			}
		}
		if ($this->descricao_site_item->Required) {
			if (!$this->descricao_site_item->IsDetailKey && $this->descricao_site_item->FormValue != NULL && $this->descricao_site_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->descricao_site_item->caption(), $this->descricao_site_item->RequiredErrorMessage));
			}
		}
		if ($this->imagem_item->Required) {
			if (!$this->imagem_item->IsDetailKey && $this->imagem_item->FormValue != NULL && $this->imagem_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->imagem_item->caption(), $this->imagem_item->RequiredErrorMessage));
			}
		}
		if ($this->endereco_item->Required) {
			if (!$this->endereco_item->IsDetailKey && $this->endereco_item->FormValue != NULL && $this->endereco_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->endereco_item->caption(), $this->endereco_item->RequiredErrorMessage));
			}
		}
		if ($this->numero_item->Required) {
			if (!$this->numero_item->IsDetailKey && $this->numero_item->FormValue != NULL && $this->numero_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->numero_item->caption(), $this->numero_item->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->numero_item->FormValue)) {
			AddMessage($FormError, $this->numero_item->errorMessage());
		}
		if ($this->bairro_item->Required) {
			if (!$this->bairro_item->IsDetailKey && $this->bairro_item->FormValue != NULL && $this->bairro_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bairro_item->caption(), $this->bairro_item->RequiredErrorMessage));
			}
		}
		if ($this->cidade_item->Required) {
			if (!$this->cidade_item->IsDetailKey && $this->cidade_item->FormValue != NULL && $this->cidade_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cidade_item->caption(), $this->cidade_item->RequiredErrorMessage));
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
		if ($this->situacao_id->Required) {
			if (!$this->situacao_id->IsDetailKey && $this->situacao_id->FormValue != NULL && $this->situacao_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->situacao_id->caption(), $this->situacao_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->situacao_id->FormValue)) {
			AddMessage($FormError, $this->situacao_id->errorMessage());
		}
		if ($this->grupo_id->Required) {
			if (!$this->grupo_id->IsDetailKey && $this->grupo_id->FormValue != NULL && $this->grupo_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grupo_id->caption(), $this->grupo_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->grupo_id->FormValue)) {
			AddMessage($FormError, $this->grupo_id->errorMessage());
		}
		if ($this->usuario_id->Required) {
			if (!$this->usuario_id->IsDetailKey && $this->usuario_id->FormValue != NULL && $this->usuario_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usuario_id->caption(), $this->usuario_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->usuario_id->FormValue)) {
			AddMessage($FormError, $this->usuario_id->errorMessage());
		}
		if ($this->bool_ativo_item->Required) {
			if (!$this->bool_ativo_item->IsDetailKey && $this->bool_ativo_item->FormValue != NULL && $this->bool_ativo_item->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bool_ativo_item->caption(), $this->bool_ativo_item->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->bool_ativo_item->FormValue)) {
			AddMessage($FormError, $this->bool_ativo_item->errorMessage());
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

		// titulo_item
		$this->titulo_item->setDbValueDef($rsnew, $this->titulo_item->CurrentValue, "", FALSE);

		// descricao_resumida_item
		$this->descricao_resumida_item->setDbValueDef($rsnew, $this->descricao_resumida_item->CurrentValue, NULL, FALSE);

		// descricao_site_item
		$this->descricao_site_item->setDbValueDef($rsnew, $this->descricao_site_item->CurrentValue, NULL, FALSE);

		// imagem_item
		$this->imagem_item->setDbValueDef($rsnew, $this->imagem_item->CurrentValue, "", FALSE);

		// endereco_item
		$this->endereco_item->setDbValueDef($rsnew, $this->endereco_item->CurrentValue, NULL, FALSE);

		// numero_item
		$this->numero_item->setDbValueDef($rsnew, $this->numero_item->CurrentValue, 0, FALSE);

		// bairro_item
		$this->bairro_item->setDbValueDef($rsnew, $this->bairro_item->CurrentValue, NULL, FALSE);

		// cidade_item
		$this->cidade_item->setDbValueDef($rsnew, $this->cidade_item->CurrentValue, NULL, FALSE);

		// estado_id
		$this->estado_id->setDbValueDef($rsnew, $this->estado_id->CurrentValue, NULL, FALSE);

		// situacao_id
		$this->situacao_id->setDbValueDef($rsnew, $this->situacao_id->CurrentValue, 0, FALSE);

		// grupo_id
		$this->grupo_id->setDbValueDef($rsnew, $this->grupo_id->CurrentValue, NULL, FALSE);

		// usuario_id
		$this->usuario_id->setDbValueDef($rsnew, $this->usuario_id->CurrentValue, 0, FALSE);

		// bool_ativo_item
		$this->bool_ativo_item->setDbValueDef($rsnew, $this->bool_ativo_item->CurrentValue, 0, strval($this->bool_ativo_item->CurrentValue) == "");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("itemlist.php"), "", $this->TableVar, TRUE);
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
