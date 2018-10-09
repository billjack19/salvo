VERSION 5.00
Object = "{86CF1D34-0C5F-11D2-A9FC-0000F8754DA1}#2.0#0"; "MSCOMCT2.OCX"
Begin VB.Form NaoFiscalFrm 
   Caption         =   "Impressão Não Fiscal"
   ClientHeight    =   4440
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   6045
   BeginProperty Font 
      Name            =   "Tahoma"
      Size            =   20.25
      Charset         =   0
      Weight          =   400
      Underline       =   0   'False
      Italic          =   0   'False
      Strikethrough   =   0   'False
   EndProperty
   LinkTopic       =   "Form1"
   ScaleHeight     =   4440
   ScaleWidth      =   6045
   StartUpPosition =   3  'Windows Default
   Begin VB.CommandButton btnCancelar 
      Caption         =   "Cancelar Fluxo"
      Height          =   735
      Left            =   360
      TabIndex        =   6
      Top             =   3360
      Width           =   5415
   End
   Begin VB.CommandButton cmdAdmTEF 
      Caption         =   "Administração TEF"
      Height          =   735
      Left            =   360
      TabIndex        =   4
      Top             =   2040
      Width           =   5415
   End
   Begin VB.CommandButton cmdPagar 
      Caption         =   "Pagar com Cartão (ões)"
      Height          =   735
      Left            =   360
      TabIndex        =   3
      Top             =   1200
      Width           =   5415
   End
   Begin VB.TextBox txtQtdCartoes 
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   12
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   495
      Left            =   4680
      TabIndex        =   2
      Text            =   "1"
      Top             =   240
      Width           =   840
   End
   Begin MSComCtl2.UpDown UpDown1 
      Height          =   495
      Left            =   5520
      TabIndex        =   1
      Top             =   240
      Width           =   255
      _ExtentX        =   450
      _ExtentY        =   873
      _Version        =   393216
      Value           =   1
      BuddyControl    =   "txtQtdCartoes"
      BuddyDispid     =   196612
      OrigLeft        =   5760
      OrigTop         =   480
      OrigRight       =   6015
      OrigBottom      =   975
      Min             =   1
      SyncBuddy       =   -1  'True
      BuddyProperty   =   0
      Enabled         =   -1  'True
   End
   Begin VB.Label lblMsgSiTef 
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   9
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   255
      Left            =   360
      TabIndex        =   5
      Top             =   3000
      Width           =   5415
   End
   Begin VB.Label Label1 
      AutoSize        =   -1  'True
      Caption         =   "Quantidade de Cartões"
      Height          =   495
      Left            =   240
      TabIndex        =   0
      Top             =   240
      Width           =   4065
   End
End
Attribute VB_Name = "NaoFiscalFrm"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim WithEvents EasyTEF As EasyTEFSiTef.EasyTEFCliSiTef
Attribute EasyTEF.VB_VarHelpID = -1

Private TotalDescontoCielo As Double
Private TotalSaqueCielo As Double
Private BufferTransacoesTEF() As String
Private Sequencial As String
Private DataHora As Date
Private ChequeGenerico As Boolean
Private HouveCancelamento As Boolean
Private InterromperFluxo As Boolean

Const FORMATO_DINHEIRO As String = "#0.00"

Private Sub CarregarEasyTEF()
Dim ini As String

    Set EasyTEF = New EasyTEFSiTef.EasyTEFCliSiTef
    
    ini = App.Path & "\exemplo.ini"
    EasyTEF.GerarLogComandos = True
    EasyTEF.CaminhoCompletoCliSiTef32I = ReadINI(ini, "SiTef", "PathCliSiTef32I", "")
    EasyTEF.HostSiTef = ReadINI(ini, "SiTef", "Host", "")
    EasyTEF.Loja = ReadINI(ini, "SiTef", "Loja", "")
    EasyTEF.Operador = ReadINI(ini, "SiTef", "Operador", "")
    EasyTEF.Terminal = ReadINI(ini, "SiTef", "Terminal", "")
    EasyTEF.ContraSenha = ReadINI(ini, "SiTef", "ContraSenhaEasyTEF", "")
    EasyTEF.AutoVerificarTEF = True
    
    EasyTEF.CieloPremia.NomeSoftwareHouse = "NomeSoft" ' nome da software house, máx. 8 caracteres
    EasyTEF.CieloPremia.AtivarCieloPremia = True
    
    ' EasyTEF.MensagemPinPad = "EasyTEF|Componente EasyTEFCliSiTef"

End Sub

Public Function TratarPagamentoComCartoes(Valores As Variant) As Boolean
Dim resultado As Boolean
Dim valorCartao As Double
Dim i As Integer
Dim MsgErroSiTef As String
Dim FuncaoSiTef As TipoFuncaoCliSiTef
    
    resultado = True
    
    EasyTEF.NumeroDeCartoes = 0
    
    If IsArray(Valores) Then
    
        Sequencial = PegarSequencial
        EasyTEF.NumeroDeCartoes = UBound(Valores) + 1
        For i = 1 To EasyTEF.NumeroDeCartoes
            valorCartao = Valores(i - 1)
            
            If MsgBox("Cartão de crédito (" & Format(valorCartao, FORMATO_DINHEIRO) & ")?", _
                vbYesNo + vbQuestion, "Tipo de Cartão") = vbYes Then
                FuncaoSiTef = fcsCredito
            Else
                FuncaoSiTef = fcsDebito
            End If
            With EasyTEF
                DataHora = Now
                Call .ExecutarFuncaoSiTef(FuncaoSiTef, valorCartao, Sequencial, _
                    DataHora, DataHora, "{TipoTratamento=4}", "TEF", MsgErroSiTef)
                If MsgErroSiTef <> "" Then
                    MsgBox MsgErroSiTef, vbExclamation
                End If
                If (Not .TransacaoAprovada) Then
                    resultado = False
                    MsgBox "Não foi possível finalizar com sucesso o pagamento com cartão", _
                        vbCritical
                    Exit For
                Else
                    TotalDescontoCielo = TotalDescontoCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo4029
                    TotalSaqueCielo = TotalSaqueCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo130
                    ReDim Preserve BufferTransacoesTEF(UBound(BufferTransacoesTEF))
                    
                    BufferTransacoesTEF(UBound(BufferTransacoesTEF)) = _
                        EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo4029 & ";" _
                        & EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo130
                End If
            End With
        Next i
        
    End If
    
    TratarPagamentoComCartoes = resultado
End Function


Private Sub EmitirSatOuNFCe()
  ' este método representa o método de seu sistema que gera e transmite
  ' o SAT ou NFC-e

End Sub

Private Sub btnCancelar_Click()
    InterromperFluxo = True
End Sub

Private Sub cmdAdmTEF_Click()
Dim MsgErro As String
Dim CupomTEF1aVia As String
Dim CupomTEF2aVia As String

    Screen.MousePointer = vbHourglass
    DataHora = Now
    
    Sequencial = PegarSequencial
    
    Call EasyTEF.ConfirmarOuDesfazerPendencias
    Call EasyTEF.ExecutarFuncaoSiTef(fcsTransacoesGerenciais, 1, _
        Sequencial, DataHora, DataHora, "{TipoTratamento=4}", "", MsgErro)
    
    If MsgErro <> "" Then
        MsgBox MsgErro, vbExclamation
        Screen.MousePointer = vbDefault
        Exit Sub
    End If
        
    If Not ChequeGenerico Then
        Call ImprimirCupomEmSuaImpressoraNaoFiscal(EasyTEF.ComprovanteTEF1aVia)
        Call ImprimirCupomEmSuaImpressoraNaoFiscal(EasyTEF.ComprovanteTEF2aVia)
        If MsgBox("A impressão foi efetuada totalmente com sucesso?", _
            vbYesNo + vbQuestion, "Impressão") = vbYes Then
            
            Call EasyTEF.ConfirmacaoVendaImpressaoCupom(Sequencial, DataHora, DataHora)
        Else
            Call EasyTEF.CancelarVendasPendentes
            Exit Sub
        End If
    Else
        ChequeGenerico = False
    End If
    
    If (EasyTEF.OperacaoTEFAtual = fcsCheque) And _
        (EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo120 <> "") Then
        
        MsgBox "Autorização do Cheque: " & vbCrLf & vbCrLf & _
            EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo120
        
    End If
    
    Screen.MousePointer = vbDefault
End Sub

Private Sub cmdPagar_Click()
    Dim i As Integer
    Dim CountCartoes As Integer
    Dim Cartoes() As Variant
    
    Call txtQtdCartoes.SetFocus
    
    Call EmitirSatOuNFCe
    CountCartoes = txtQtdCartoes.Text
    
    ReDim Cartoes(CountCartoes - 1)
    
    For i = 0 To CountCartoes - 1
        Cartoes(i) = PegarValor
    Next i
    
    Call EasyTEF.IniciarTransacaoTEF
    If TratarPagamentoComCartoes(Cartoes) Then
        For i = LBound(EasyTEF.ValoresCartoes) To UBound(EasyTEF.ValoresCartoes)
            Call ImprimirCupomEmSuaImpressoraNaoFiscal(EasyTEF.CuponsDisponiveis(i))
        Next i
        
        If MsgBox("A impressão foi efetuada totalmente com sucesso?", _
            vbYesNo + vbQuestion, "Impressão") = vbYes Then
            
            If (UBound(EasyTEF.ValoresCartoes) = 0) Then
                Call EasyTEF.ConfirmacaoVendaImpressaoCupom(Sequencial, DataHora, DataHora)
            ElseIf (UBound(EasyTEF.ValoresCartoes) > 0) Then
                Call EasyTEF.ConfirmacaoVendaImpressaoCupomMultiplosCartoes
            End If
            
        Else
            Call EasyTEF.CancelarVendasPendentes
        End If
        
        Call EasyTEF.FinalizarTransacaoTEF
        
        TotalDescontoCielo = 0
        TotalSaqueCielo = 0
        ReDim bufferInfoTransacoesTEF(0)
        HouveCancelamento = False
        ChequeGenerico = False
        InterromperFluxo = False
    End If

End Sub

Private Function PegarValor() As Double
    Randomize
    PegarValor = (Int(Rnd * 1000) + 1) / 100
End Function

Private Function PegarSequencial() As String
    Randomize
    PegarSequencial = (Int(Rnd * 100000) + 1)
End Function

Private Sub ImprimirCupomEmSuaImpressoraNaoFiscal(Cupom As Variant)
    ' aqui deve ser adicionado o comando de qualquer impressora não fiscal que
    ' fará a impressão do Cupom TEF
    Call MsgBox(ArrayToStr(Cupom), vbInformation)
End Sub

Private Function ArrayToStr(a As Variant)
    Dim i As Integer
    Dim s As String
    s = ""
    For i = LBound(a) To UBound(a)
        s = s & a(i) & vbCrLf
    Next i
    
    ArrayToStr = s
End Function

Private Sub EasyTEF_OnAguardarTeclaOperador(ByVal Mensagem As String)
    If Mensagem = "" Then
        MsgBox "Por favor, presisone <Enter>", vbInformation
    Else
        MsgBox Mensagem, vbInformation
    End If
End Sub

Private Sub EasyTEF_OnExibirMensagem(ByVal TelaOperador As Boolean, ByVal TelaCliente As Boolean, ByVal Mensagem As String)
    If TelaOperador Then
        lblMsgSiTef.Caption = Mensagem
    End If
End Sub

Private Sub EasyTEF_OnExibirMenuOpcoesOperador(ByVal Caption As String, _
    ByVal Opcoes As Variant, _
    OpcaoEscolhida As String, _
    TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta)
    
Dim ModalResult As VbMsgBoxResult

    frmMenuOpcoesSitef.Caption = Caption
    frmMenuOpcoesSitef.CarregarMenuOpcoesSitef (Opcoes)
    Call frmMenuOpcoesSitef.Show(vbModal)
    ModalResult = frmMenuOpcoesSitef.Result
    OpcaoEscolhida = frmMenuOpcoesSitef.opcao
    
    If Not HouveCancelamento Then
        HouveCancelamento = (InStr(UCase(OpcaoEscolhida), "CANCELAMENTO") > 0)
    End If
    
    If Not ChequeGenerico Then
        ChequeGenerico = (InStr(UCase(OpcaoEscolhida), "GENERICA") > 0)
    End If
    
    TipoContinuacao = tccContinuar
    
    If ModalResult = vbCancel Then
        TipoContinuacao = tccInterromper
    ElseIf ModalResult = vbRetry Then
        TipoContinuacao = tccMenuAnterior
    End If

End Sub

Private Sub EasyTEF_OnInterromperColetaDados(TipoContinuacaoColeta As EasyTEFSiTef.TipoContinuacaoColeta)

    If InterromperFluxo Then
        TipoContinuacaoColeta = tccInterromper
        InterromperFluxo = False
    Else
        TipoContinuacaoColeta = tccContinuar
    End If
    
End Sub

Private Sub EasyTEF_OnLerDadosDiversos(ByVal Mensagem As String, ByVal TipoDeDados As EasyTEFSiTef.TipoDadosDiversos, DadoLido As String, TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta)
Dim Msg, Capt As String

    Msg = Mensagem
    Capt = "Por favor, informe "
    
    Select Case TipoDeDados
        Case tddCheque
            Capt = Capt & "o número do cheque"
        Case tddMonetario
            Capt = Capt & "o valor"
        Case tddCodigoDeBarras
            Capt = Capt & "o número do código de barras"
    End Select
    
    If TipoDeDados = tddCheque Then
        frmConsultaCheque.Caption = Capt
        frmConsultaCheque.lblMsg.Caption = Msg
        frmConsultaCheque.Show vbModal
        
        DadoLido = "0:" & Format(CInt(frmConsultaCheque.txtCompensa.Text), "000") & _
            Format(CInt(frmConsultaCheque.txtBanco.Text), "000") & _
            Format(CInt(frmConsultaCheque.txtAgencia.Text), "0000") & _
            Format(CInt(frmConsultaCheque.txtC1.Text), "0") & _
            Format(CInt(frmConsultaCheque.txtContaCorrente.Text), "0000000000") & _
            Format(CInt(frmConsultaCheque.txtC2.Text), "0") & _
            Format(CInt(frmConsultaCheque.txtNumeroCheque.Text), "000000") & _
            Format(CInt(frmConsultaCheque.txtC3.Text), "0")
            
        TipoContinuacao = tccContinuar
        
        If frmConsultaCheque.Result = vbCancel Then
            TipoContinuacao = tccInterromper
        End If
    Else
        frmValoresSiTef.Caption = Capt
        frmValoresSiTef.lblMsg.Caption = Msg
        frmValoresSiTef.Show vbModal
        DadoLido = frmValoresSiTef.ValorDigitado
        
        TipoContinuacao = tccContinuar
        If frmValoresSiTef.Result = vbCancel Then
            TipoContinuacao = tccInterromper
        ElseIf frmValoresSiTef.Result = vbRetry Then
            TipoContinuacao = tccMenuAnterior
        End If
    End If
End Sub

Private Sub EasyTEF_OnLerRespostaBooleana(ByVal Mensagem As String, Resposta As Boolean)
Dim Msg As String

    Msg = Mensagem
    
    If Msg = "" Then
        Msg = "Confirmar esta operação?"
    End If
    
    Resposta = (MsgBox(Msg, vbQuestion + vbYesNo, "Confirmação") = vbYes)
End Sub

Private Sub EasyTEF_OnLerValor(ByVal Mensagem As String, _
    ByVal TamanhoMinimo As Long, _
    ByVal TamanhoMaximo As Long, _
    ValorLido As String, _
    TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta)
    
    frmValoresSiTef.TamanhoMinimo = TamanhoMinimo
    frmValoresSiTef.edtValor.MaxLength = TamanhoMaximo
    frmValoresSiTef.lblMsg.Caption = Mensagem
    'mascarar a senha do supervisor
    If EasyTEF.OperacaoAtualDaColetaDeDados = ccdReImpressaoPagamentoConta Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdReimpressao Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdReimpressaoUltimoComprovante Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdReimpressaoEspecifica Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdReimpressaoLojista Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdReimpressaoPortadorCartao Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdTodasAsReimpressoes Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdReimpressaoEspecificaRedecard Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdReimpressaoEspecificaVisanet Or _
       EasyTEF.OperacaoAtualDaColetaDeDados = ccdCancelamentoTransacaoCartaoCreditoDebito Then
       
        frmValoresSiTef.edtValor.PasswordChar = "*"
    Else
        frmValoresSiTef.edtValor.PasswordChar = ""
    End If
    
    frmValoresSiTef.Show vbModal
    ValorLido = frmValoresSiTef.ValorDigitado
    
    If (EasyTEF.OperacaoAtualDaColetaDeDados = ccdCartaoDebitoPreDatado) And (ValorLido = "") Then
        ValorLido = Format(DateAdd("d", 30, Now), "ddmmyyyy")
    ElseIf (EasyTEF.OperacaoAtualDaColetaDeDados = ccdNone) And _
        (InStr(Mensagem, "DDMMAAAA") > 0) And (ValorLido = "") Then
        ValorLido = Format(Now, "ddmmyyyy")
    End If
    
    TipoContinuacao = tccContinuar
    If frmValoresSiTef.Result = vbCancel Then
        TipoContinuacao = tccInterromper
    ElseIf frmValoresSiTef.Result = vbRetry Then
        TipoContinuacao = tccMenuAnterior
    End If
End Sub

Private Sub EasyTEF_OnLimparMensagem(ByVal TelaOperador As Boolean, ByVal TelaCliente As Boolean)

    lblMsgSiTef.Caption = ""
    
End Sub

Private Sub EasyTEF_OnVerificarCupomFiscalAberto(CupomFiscalAberto As Boolean)

  ' força a confirmação da transação
  CupomFiscalAberto = False
  HouveCancelamento = False
  
End Sub

Private Sub Form_Load()
    Call CarregarEasyTEF
    ReDim BufferTransacoesTEF(1)
End Sub
