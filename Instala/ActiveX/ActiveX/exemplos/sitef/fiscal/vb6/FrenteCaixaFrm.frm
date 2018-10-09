VERSION 5.00
Begin VB.Form FrenteCaixaFrm 
   Caption         =   "Exemplo TEF Dedicado - Tela de Frente de Caixa"
   ClientHeight    =   6690
   ClientLeft      =   60
   ClientTop       =   450
   ClientWidth     =   9480
   BeginProperty Font 
      Name            =   "Tahoma"
      Size            =   9
      Charset         =   0
      Weight          =   400
      Underline       =   0   'False
      Italic          =   0   'False
      Strikethrough   =   0   'False
   EndProperty
   KeyPreview      =   -1  'True
   LinkTopic       =   "Form1"
   ScaleHeight     =   6690
   ScaleWidth      =   9480
   StartUpPosition =   3  'Windows Default
   Begin VB.OptionButton rbtDaruma 
      Caption         =   "Daruma"
      Height          =   375
      Left            =   7440
      TabIndex        =   38
      Top             =   5280
      Width           =   975
   End
   Begin VB.OptionButton rbtBematech 
      Caption         =   "Bematech"
      Height          =   375
      Left            =   6000
      TabIndex        =   37
      Top             =   5280
      Width           =   1215
   End
   Begin VB.OptionButton rbtSweda 
      Caption         =   "Sweda"
      Height          =   375
      Left            =   4920
      TabIndex        =   36
      Top             =   5280
      Value           =   -1  'True
      Width           =   975
   End
   Begin VB.Frame Frame6 
      Caption         =   "Formas de Pagamento"
      Height          =   1335
      Left            =   3960
      TabIndex        =   18
      Top             =   3360
      Width           =   5415
      Begin VB.TextBox edtValorCartao1 
         Height          =   315
         Left            =   4440
         TabIndex        =   42
         Text            =   "0,00"
         Top             =   240
         Width           =   855
      End
      Begin VB.TextBox edtValorCartao2 
         Height          =   315
         Left            =   4440
         TabIndex        =   44
         Text            =   "0,00"
         Top             =   600
         Width           =   855
      End
      Begin VB.TextBox edtValorCartao3 
         Height          =   315
         Left            =   4440
         TabIndex        =   46
         Text            =   "0,00"
         Top             =   960
         Width           =   855
      End
      Begin VB.Frame Frame8 
         Height          =   975
         Left            =   3480
         TabIndex        =   35
         Top             =   240
         Width           =   40
      End
      Begin VB.Frame Frame7 
         Height          =   975
         Left            =   1800
         TabIndex        =   34
         Top             =   240
         Width           =   40
      End
      Begin VB.TextBox edtValorCheque 
         Height          =   315
         Left            =   2160
         TabIndex        =   20
         Text            =   "0,00"
         Top             =   720
         Width           =   975
      End
      Begin VB.TextBox edtValorDinheiro 
         Height          =   315
         Left            =   480
         TabIndex        =   19
         Text            =   "0,00"
         Top             =   720
         Width           =   975
      End
      Begin VB.Label lblCartao1 
         Caption         =   "Cartão 1"
         Height          =   255
         Left            =   3600
         TabIndex        =   47
         Top             =   240
         Width           =   735
      End
      Begin VB.Label lblCartao2 
         Caption         =   "Cartão 2"
         Height          =   255
         Left            =   3600
         TabIndex        =   45
         Top             =   600
         Width           =   735
      End
      Begin VB.Label lblCartao3 
         Caption         =   "Cartão 3"
         Height          =   255
         Left            =   3600
         TabIndex        =   43
         Top             =   960
         Width           =   735
      End
      Begin VB.Label Label7 
         AutoSize        =   -1  'True
         Caption         =   "Cheque"
         Height          =   210
         Index           =   1
         Left            =   2160
         TabIndex        =   40
         Top             =   360
         Width           =   630
      End
      Begin VB.Label Label7 
         AutoSize        =   -1  'True
         Caption         =   "Dinheiro"
         Height          =   210
         Index           =   0
         Left            =   480
         TabIndex        =   39
         Top             =   360
         Width           =   660
      End
   End
   Begin VB.CommandButton btnFechar 
      Caption         =   "&Fechar"
      Height          =   375
      Left            =   8280
      TabIndex        =   25
      Top             =   6240
      Width           =   1095
   End
   Begin VB.CommandButton btnEncerrarVenda 
      Caption         =   "Encerrar Venda [F7]"
      Enabled         =   0   'False
      Height          =   375
      Left            =   6240
      TabIndex        =   24
      Top             =   6240
      Width           =   2055
   End
   Begin VB.CommandButton btnCancelarVenda 
      Caption         =   "Cancelar Venda [F6]"
      Enabled         =   0   'False
      Height          =   375
      Left            =   4200
      TabIndex        =   23
      Top             =   6240
      Width           =   2055
   End
   Begin VB.CommandButton btnCancelarItem 
      Caption         =   "Cancelar Ítem [F5]"
      Enabled         =   0   'False
      Height          =   375
      Left            =   2160
      TabIndex        =   22
      Top             =   6240
      Width           =   2055
   End
   Begin VB.CommandButton btnNovo 
      Caption         =   "Nova Venda [F4]"
      DisabledPicture =   "FrenteCaixaFrm.frx":0000
      Height          =   375
      Left            =   120
      Picture         =   "FrenteCaixaFrm.frx":0102
      TabIndex        =   21
      Top             =   6240
      Width           =   2055
   End
   Begin VB.Frame Frame5 
      Height          =   135
      Left            =   120
      TabIndex        =   33
      Top             =   6000
      Width           =   9255
   End
   Begin VB.CommandButton btnAdm 
      Caption         =   "&Administração TEF"
      Height          =   375
      Left            =   4920
      TabIndex        =   17
      Top             =   4800
      Width           =   3495
   End
   Begin VB.TextBox mmoCupomFiscal 
      BeginProperty Font 
         Name            =   "Courier New"
         Size            =   9.75
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   3015
      Left            =   3960
      MultiLine       =   -1  'True
      TabIndex        =   26
      TabStop         =   0   'False
      Top             =   120
      Width           =   5415
   End
   Begin VB.Frame Frame1 
      Height          =   5535
      Left            =   120
      TabIndex        =   0
      Top             =   0
      Width           =   3735
      Begin VB.CommandButton btnAdicionarItem 
         Caption         =   "Adicionar Item ao Cupom Fiscal [F3]"
         Enabled         =   0   'False
         Height          =   375
         Left            =   120
         TabIndex        =   16
         Top             =   4920
         Width           =   3495
      End
      Begin VB.TextBox edtAliquota 
         Height          =   315
         Left            =   1920
         TabIndex        =   3
         Text            =   "II"
         Top             =   1080
         Width           =   495
      End
      Begin VB.TextBox edtDescricao 
         Height          =   315
         Left            =   1920
         TabIndex        =   2
         Text            =   "Produto de Teste"
         Top             =   720
         Width           =   1695
      End
      Begin VB.TextBox edtCodigo 
         Height          =   315
         Left            =   1920
         TabIndex        =   1
         Text            =   "0123456789"
         Top             =   360
         Width           =   1695
      End
      Begin VB.Frame Frame4 
         Caption         =   "Valor Unitário"
         Height          =   1575
         Left            =   120
         TabIndex        =   12
         Top             =   3240
         Width           =   3495
         Begin VB.TextBox edtValorUnit 
            Height          =   315
            Left            =   825
            TabIndex        =   15
            Text            =   "40,50"
            Top             =   1080
            Width           =   855
         End
         Begin VB.OptionButton rbt2Casas 
            Caption         =   "2 Casas decimais"
            Height          =   255
            Left            =   120
            TabIndex        =   13
            Top             =   360
            Value           =   -1  'True
            Width           =   2055
         End
         Begin VB.OptionButton rbt3Casas 
            Caption         =   "3 Casas decimais"
            Height          =   255
            Left            =   120
            TabIndex        =   14
            Top             =   720
            Width           =   2055
         End
         Begin VB.Label Label6 
            Alignment       =   1  'Right Justify
            AutoSize        =   -1  'True
            Caption         =   "Valor:"
            Height          =   210
            Left            =   255
            TabIndex        =   32
            Top             =   1080
            Width           =   465
         End
      End
      Begin VB.Frame Frame3 
         Caption         =   "Desconto"
         Height          =   1575
         Left            =   1800
         TabIndex        =   8
         Top             =   1560
         Width           =   1815
         Begin VB.TextBox edtValorDesc 
            Height          =   315
            Left            =   825
            TabIndex        =   11
            Text            =   "0"
            Top             =   1080
            Width           =   495
         End
         Begin VB.OptionButton rbtPercentual 
            Caption         =   "Por Percentual"
            Height          =   255
            Left            =   120
            TabIndex        =   9
            Top             =   360
            Value           =   -1  'True
            Width           =   1575
         End
         Begin VB.OptionButton rbtValor 
            Caption         =   "Por Valor"
            Height          =   255
            Left            =   120
            TabIndex        =   10
            Top             =   720
            Width           =   1335
         End
         Begin VB.Label Label5 
            Alignment       =   1  'Right Justify
            AutoSize        =   -1  'True
            Caption         =   "Valor:"
            Height          =   210
            Left            =   255
            TabIndex        =   31
            Top             =   1080
            Width           =   465
         End
      End
      Begin VB.Frame Frame2 
         Caption         =   "Quantidade"
         Height          =   1575
         Left            =   120
         TabIndex        =   4
         Top             =   1560
         Width           =   1575
         Begin VB.TextBox edtQtd 
            Height          =   315
            Left            =   825
            TabIndex        =   7
            Text            =   "1"
            Top             =   1080
            Width           =   495
         End
         Begin VB.OptionButton rbtInteira 
            Caption         =   "Inteira"
            Height          =   255
            Left            =   120
            TabIndex        =   5
            Top             =   360
            Value           =   -1  'True
            Width           =   1095
         End
         Begin VB.OptionButton rbtFracionaria 
            Caption         =   "Fracionária"
            Height          =   255
            Left            =   120
            TabIndex        =   6
            Top             =   720
            Width           =   1215
         End
         Begin VB.Label Label4 
            Alignment       =   1  'Right Justify
            AutoSize        =   -1  'True
            Caption         =   "Qtde:"
            Height          =   210
            Left            =   240
            TabIndex        =   30
            Top             =   1080
            Width           =   480
         End
      End
      Begin VB.Label Label3 
         Alignment       =   1  'Right Justify
         AutoSize        =   -1  'True
         Caption         =   "Alíquota:"
         Height          =   210
         Left            =   1095
         TabIndex        =   29
         Top             =   1080
         Width           =   720
      End
      Begin VB.Label Label2 
         Alignment       =   1  'Right Justify
         AutoSize        =   -1  'True
         Caption         =   "Descrição:"
         Height          =   210
         Left            =   990
         TabIndex        =   28
         Top             =   720
         Width           =   825
      End
      Begin VB.Label Label1 
         Alignment       =   1  'Right Justify
         AutoSize        =   -1  'True
         Caption         =   "Código do Produto:"
         Height          =   210
         Left            =   210
         TabIndex        =   27
         Top             =   360
         Width           =   1605
      End
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
      Left            =   120
      TabIndex        =   41
      Top             =   5760
      Width           =   9255
   End
End
Attribute VB_Name = "FrenteCaixaFrm"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
'------------------------------------------------------------------------------
'
' Autor......: EasyTEF Team - 20/01/2009
' Objetivo...: Fazer um exemplo simples e direto da utilização do componente
'              COM EasyTEFDiscado numa tela de frente de caixa. Este exemplo
'              implementa os tratamentos mínimos necessários para a
'              homologação do seu sistema.
'
' Comentários: Esta tela não deve ser usada como referência para uma
'              aplicação comercial (AC) mais completa, mas sim como guia para
'              uso dos métodos e tratamentos a serem feitos na utilização do
'              componente EasyTEFDiscado.
'
'              Os tratamentos quanto a ECF, como por exemplo, abrir a tela
'              com cupom fiscal já aberto, troco, etc., devem ser feitos pela
'              AC e não são tratados neste exemplo.
'
'------------------------------------------------------------------------------

Option Explicit
Dim WithEvents EasyTEF As EasyTEFSiTef.EasyTEFCliSiTef
Attribute EasyTEF.VB_VarHelpID = -1
Dim Retorno As Integer 'Valor de retorno da execução dos comandos da ECF
Dim total As Double 'Valor total dos ítens do cupom passado à tela de fechamento de cupom fiscal
Dim seq As Integer 'Sequencial usado para display do número do produto no cupom fiscal
Dim HouveCancelamento As Boolean
Dim ChequeGenerico As Boolean
Public InterromperFluxo As Boolean

'Variáveis utilizadas em eventos do EasyTEF
Dim NumeroCupom As String
Dim TotalDescontoCielo As Double
Dim TotalSaqueCielo As Double
Dim UsuarioNaoQuerOutraFormaPgto As Boolean

'Constantes
Const ECF_RETORNO_OK As Integer = 1
Const CUPOM_FISCAL As String = "Cupom Fiscal"
Const FORMA_PGTO_CARTAO As String = "Cartao"
Const FORMA_PGTO_CHEQUE As String = "Cheque"
Const FORMATO_DINHEIRO As String = "#0.00"
Const ARQUIVO_CUPOM_ABERTO As String = ".\CupomAberto.txt"

Private Sub carregarEasyTEF()
Dim ini As String

    Set EasyTEF = New EasyTEFSiTef.EasyTEFCliSiTef
    
    ini = App.path & "\exemplo.ini"
    If ReadINI(ini, "SiTef", "UsarTEFSiTef", "Nao") = "Sim" Then
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
        
        EasyTEF.MensagemPinPad = "EasyTEF|Componente EasyTEFCliSiTef"
    End If
End Sub

Private Sub btnAdicionarItem_Click()
    adicionarProduto
End Sub

Private Sub btnAdm_Click()
Dim MsgErro As String
Dim CupomTEF1aVia As String
Dim CupomTEF2aVia As String

    Screen.MousePointer = vbHourglass
    
    Call EasyTEF.ConfirmarOuDesfazerPendencias
    
    Call EasyTEF.ExecutarFuncaoSiTef(fcsTransacoesGerenciais, 1, _
        "123456", Now, Now, "{TipoTratamento=4}", "", MsgErro)
    
    If MsgErro <> "" Then
        MsgBox MsgErro, vbExclamation
        Screen.MousePointer = vbDefault
        Exit Sub
    End If
        
    Call arrayToStr(EasyTEF.ComprovanteTEF1aVia, CupomTEF1aVia)
    Call arrayToStr(EasyTEF.ComprovanteTEF2aVia, CupomTEF2aVia)
        
    If Trim(CupomTEF1aVia) <> "" Or Trim(CupomTEF2aVia) <> "" Then
        If Not ChequeGenerico Then
            If Not EasyTEF.ImprimirRelatorioGerencial( _
                EasyTEF.ComprovanteTEF1aVia, EasyTEF.ComprovanteTEF2aVia) Then
                MsgBox "Não foi possível imprimir o cupom TEF.", vbExclamation
                Screen.MousePointer = vbDefault
                Exit Sub
            End If
        Else
            ChequeGenerico = False
        End If
    End If
    
    If (EasyTEF.OperacaoTEFAtual = fcsCheque) And _
        (EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo120 <> "") Then
        
        MsgBox "Autorização do Cheque: " & vbCrLf & vbCrLf & _
            EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo120
        
    End If
    
    Screen.MousePointer = vbDefault
End Sub

Private Sub btnCancelarItem_Click()
    Call cancelarItem
End Sub

Private Sub btnCancelarVenda_Click()
    Call cancelarVenda
End Sub

Private Sub btnEncerrarVenda_Click()
    Call encerrarVenda
End Sub

Private Sub btnFechar_Click()
    Unload Me
End Sub

Private Sub btnNovo_Click()
    Call novaVenda
End Sub

Private Sub EasyTEF_OnAbrirComprovanteNaoFiscalVinculado(OperacaoECFOK As Boolean, _
    ByVal NomeFormaPagamento As String, ByVal ValorCupom As Double)
    
    If rbtBematech.Value Then
        OperacaoECFOK = Bematech_FI_AbreComprovanteNaoFiscalVinculado(NomeFormaPagamento, _
            Format(ValorCupom, FORMATO_DINHEIRO), NumeroCupom) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        OperacaoECFOK = ECF_AbreComprovanteNaoFiscalVinculado(NomeFormaPagamento, _
            Format(ValorCupom, FORMATO_DINHEIRO), NumeroCupom) = ECF_RETORNO_OK
    Else
        OperacaoECFOK = Daruma_FI_AbreComprovanteNaoFiscalVinculado(NomeFormaPagamento, _
            Format(ValorCupom, FORMATO_DINHEIRO), NumeroCupom) = ECF_RETORNO_OK
    End If

End Sub

Private Sub EasyTEF_OnAbrirRelatorioGerencial()
    If rbtSweda.Value Then
        ECF_AbreRelatorioGerencial
    ElseIf rbtDaruma.Value Then
        Daruma_FI_AbreRelatorioGerencial
    End If
End Sub

Private Sub EasyTEF_OnAguardarTeclaOperador(ByVal Mensagem As String)
    If Mensagem = "" Then
        MsgBox "Por favor, presisone <Enter>", vbInformation
    Else
        MsgBox Mensagem, vbInformation
    End If
End Sub

Private Sub EasyTEF_OnAposTransacaoNegada(ByVal NaoContinuar As Boolean)
    UsuarioNaoQuerOutraFormaPgto = NaoContinuar
    If Not NaoContinuar Then
        Call limparFormasPgto
        ' Sugere terminar o cupom fiscal em dinheiro
        edtValorDinheiro.Text = Format(total - ObterValoresTransacaoAnteriorCartao, "#0.00")
        MsgBox "Atenção. Este exemplo em VB6 sugere automaticamente terminar " & _
            "o cupom fiscal em DINHEIRO." & vbCrLf & vbCrLf & _
            "Observe que o valor em cartão foi apagado e o restante do cupom " & _
            "fiscal foi preenchido no campo Dinheiro.", vbExclamation
    End If
End Sub

Private Sub EasyTEF_OnEfetuarFormaPagamento(OperacaoECFOK As Boolean, ByVal params As Variant, Retorno As String)
    If rbtBematech.Value Then
        OperacaoECFOK = Bematech_FI_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        OperacaoECFOK = ECF_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
    Else
        OperacaoECFOK = Daruma_FI_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnEncerrarCupomFiscal()
    If rbtBematech.Value Then
        Call Bematech_FI_FechaComprovanteNaoFiscalVinculado
        Call Bematech_FI_CancelaCupom
    ElseIf rbtSweda.Value Then
        Call ECF_FechaComprovanteNaoFiscalVinculado
        Call ECF_CancelaCupom
    Else
        Call Daruma_FI_FechaComprovanteNaoFiscalVinculado
        Call Daruma_FI_CancelaCupom
    End If
    
    Call EasyTEF.ExcluirArquivo(App.path & ARQUIVO_CUPOM_ABERTO)
    Call ZerarCieloPremia
End Sub

Private Sub EasyTEF_OnExibirMensagem(ByVal TelaOperador As Boolean, ByVal TelaCliente As Boolean, ByVal Mensagem As String)
    If TelaOperador Then
        lblMsgSiTef.Caption = Mensagem
    End If
End Sub

Private Sub EasyTEF_OnExibirMenuOpcoesOperador(ByVal Caption As String, ByVal Opcoes As Variant, OpcaoEscolhida As String, TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta)
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

Private Sub EasyTEF_OnFecharComprovanteNaoFiscalVinculado(OperacaoECFOK As Boolean)
    If rbtBematech.Value Then
        OperacaoECFOK = Bematech_FI_FechaComprovanteNaoFiscalVinculado = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        OperacaoECFOK = ECF_FechaComprovanteNaoFiscalVinculado = ECF_RETORNO_OK
    Else
        OperacaoECFOK = Daruma_FI_FechaComprovanteNaoFiscalVinculado = ECF_RETORNO_OK
    End If

End Sub

Private Sub EasyTEF_OnFecharRelatorioGerencial(OperacaoECFOK As Boolean)
    If rbtBematech.Value Then
        OperacaoECFOK = Bematech_FI_FechaRelatorioGerencial = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        OperacaoECFOK = ECF_FechaRelatorioGerencial = ECF_RETORNO_OK
    Else
        OperacaoECFOK = Daruma_FI_FechaRelatorioGerencial = ECF_RETORNO_OK
    End If
End Sub


Private Sub EasyTEF_OnGuilhotinar2aViaCupomTEF()

    If rbtBematech.Value Then

        If EasyTEF.ComandoECF = tmeUsarComprovanteNaoFiscalVinculado Then
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
        ElseIf EasyTEF.ComandoECF = tmeImprimirRelatorioGerencial Then
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
        End If
    
    End If
    
    Call Bematech_FI_AcionaGuilhotinaMFD(0)

End Sub

Private Sub EasyTEF_OnImpressoraTemPapel(OperacaoECFOK As Boolean)
Dim a As Integer
Dim s1 As Integer
Dim s2 As Integer

    'a = 0
    's1 = 0
    's2 = 0
    If rbtBematech.Value Then
        'Call Bematech_FI_VerificaEstadoImpressora(a, s1, s2)
    ElseIf rbtSweda.Value Then
        'Call ECF_VerificaEstadoImpressora(a, s1, s2)
    Else
        'Call Daruma_FI_VerificaEstadoImpressora(a, s1, s2)
    End If
    'operacaoECFOK = Not (s1 >= 128) 'fim de papel
    OperacaoECFOK = True
End Sub

Private Sub EasyTEF_OnImprimirLeituraX(OperacaoECFOK As Boolean)
    OperacaoECFOK = True
End Sub

Private Sub EasyTEF_OnImprimirRelatorioGerencial(ByVal imagemCupomTEF As Variant, impressaoOk As Boolean)
Dim s As String
    Call arrayToStr(imagemCupomTEF, s)
    If rbtBematech.Value Then
        impressaoOk = Bematech_FI_RelatorioGerencial(s) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        impressaoOk = ECF_RelatorioGerencial(s) = ECF_RETORNO_OK
    Else
        impressaoOk = Daruma_FI_RelatorioGerencial(s) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnIniciarFechamentoCupomFiscal(OperacaoECFOK As Boolean, ByVal params As Variant, Retorno As String)
    If rbtBematech.Value Then
        OperacaoECFOK = Bematech_FI_IniciaFechamentoCupom(params(0), _
            params(1), params(2)) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        OperacaoECFOK = ECF_IniciaFechamentoCupom(params(0), _
            params(1), params(2)) = ECF_RETORNO_OK
    Else
        OperacaoECFOK = Daruma_FI_IniciaFechamentoCupom(params(0), _
            params(1), params(2)) = ECF_RETORNO_OK
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

Private Sub EasyTEF_OnLerValor(ByVal Mensagem As String, ByVal TamanhoMinimo As Long, ByVal TamanhoMaximo As Long, ValorLido As String, TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta)
    
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

Private Sub EasyTEF_OnSubTotalizarCupom(OperacaoECFOK As Boolean, ByVal Param As Variant, Retorno As String)
    Retorno = Space(14)
    If rbtBematech.Value Then
        OperacaoECFOK = Bematech_FI_SubTotal(Retorno) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        OperacaoECFOK = ECF_SubTotal(Retorno) = ECF_RETORNO_OK
    Else
        OperacaoECFOK = Daruma_FI_SubTotal(Retorno) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnTerminarCancelamentoMultiplosCartoes()
    mmoCupomFiscal.Text = ""
    Call habilitarBotoes(False)
    Call limparFormasPgto
End Sub

Private Sub EasyTEF_OnTerminarFechamentoCupom(OperacaoECFOK As Boolean, ByVal params As Variant, Retorno As String)
    If rbtBematech.Value Then
        OperacaoECFOK = Bematech_FI_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        OperacaoECFOK = ECF_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
    Else
        OperacaoECFOK = Daruma_FI_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
    End If
    
    If OperacaoECFOK Then
        Call EasyTEF.ExcluirArquivo(App.path & ARQUIVO_CUPOM_ABERTO)
    End If
    
    Call ZerarCieloPremia
End Sub


Private Sub EasyTEF_OnUsarComprovanteNaoFiscalVinculado(ByVal imagemCupomTEF As Variant, impressaoOk As Boolean)
    Dim s As String
    Call arrayToStr(imagemCupomTEF, s)
    If rbtBematech.Value Then
        impressaoOk = Bematech_FI_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        impressaoOk = ECF_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
    Else
        impressaoOk = Daruma_FI_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
    End If
End Sub


Private Sub EasyTEF_OnVerificarCupomFiscalAberto(CupomFiscalAberto As Boolean)

    If EasyTEF.ComandoECF <> tmeImprimirRelatorioGerencial Then
        ' desfaz a transação se o cupom ficou aberto
        CupomFiscalAberto = Dir(App.path & ARQUIVO_CUPOM_ABERTO) <> ""
    ElseIf HouveCancelamento Then
        ' força a confirmação da transação
        CupomFiscalAberto = False
        HouveCancelamento = False
    Else
        ' força o desfazimento da transação
        CupomFiscalAberto = True
    End If
    
End Sub

Private Sub Form_KeyUp(KeyCode As Integer, Shift As Integer)
    If Shift = 0 Then
        If KeyCode = vbKeyF3 And btnAdicionarItem.Enabled Then
            Call adicionarProduto
        ElseIf KeyCode = vbKeyF4 And btnNovo.Enabled Then
            Call novaVenda
        ElseIf KeyCode = vbKeyF5 And btnCancelarItem.Enabled Then
            Call cancelarItem
        ElseIf KeyCode = vbKeyF6 And btnCancelarVenda.Enabled Then
            Call cancelarVenda
        ElseIf KeyCode = vbKeyF7 And btnEncerrarVenda.Enabled Then
            Call encerrarVenda
        End If
    End If
End Sub

Private Sub Form_Load()
    total = 0
    Call carregarEasyTEF
    ReDim TransacoesAnterioresAprovadas(0)
    
    HouveCancelamento = False
    ChequeGenerico = False
    
    Call ZerarCieloPremia
    
End Sub

Private Sub novaVenda()
    Screen.MousePointer = vbHourglass
    
    Call ZerarCieloPremia
    Call EasyTEF.ConfirmarOuDesfazerPendencias
    
    mmoCupomFiscal.Text = ""
    If rbtBematech.Value Then
        Retorno = Bematech_FI_AbreCupom("")
    ElseIf rbtSweda.Value Then
        Retorno = ECF_AbreCupom("")
    Else
        Retorno = Daruma_FI_AbreCupom("")
    End If
    
    If Not (Retorno = ECF_RETORNO_OK) Then
        Call mostrarMsgErroECF("Não foi possível abrir o cupom fiscal. O código de erro é: ")
    Else
        Call EasyTEF.SalvarArquivoVazio(App.path & ARQUIVO_CUPOM_ABERTO)
        
        Call habilitarBotoes(True)
        
        seq = 0
        total = 0
        
        NumeroCupom = Space(6)
        
        If rbtBematech.Value Then
            Retorno = Bematech_FI_NumeroCupom(NumeroCupom)
        ElseIf rbtSweda.Value Then
            Retorno = ECF_NumeroCupom(NumeroCupom)
        Else
            Retorno = Daruma_FI_NumeroCupom(NumeroCupom)
        End If
        
        Call AdicionarLinhasDisplay("Cupom Fiscal No. " & NumeroCupom)
        Call AdicionarLinhasDisplay(" ")
        Call AdicionarLinhasDisplay(" ")
        
    End If
        
    Screen.MousePointer = vbDefault
End Sub

Private Sub AdicionarLinhasDisplay(ByVal s As String)
    mmoCupomFiscal.Text = mmoCupomFiscal.Text & vbCrLf & s
End Sub

Private Sub habilitarBotoes(ByVal habilitar As Boolean)
    btnNovo.Enabled = Not habilitar
    btnAdicionarItem.Enabled = habilitar
    btnCancelarItem.Enabled = habilitar
    btnCancelarVenda.Enabled = habilitar
    btnEncerrarVenda.Enabled = habilitar
End Sub

Private Sub cancelarItem()
    Dim numero As String
    numero = ""
    While (numero = "")
        numero = InputBox("Informe o numero do item no cupom", _
            "Informe o numero do item no cupom", "000")
    Wend
    
    If Len(numero) = 1 Then
        numero = "00" & numero
    ElseIf Len(numero) = 2 Then
        numero = "0" & numero
    End If
    
    If rbtBematech.Value Then
        Retorno = Bematech_FI_CancelaItemGenerico(numero)
    ElseIf rbtSweda.Value Then
        Retorno = ECF_CancelaItemGenerico(numero)
    Else
        Retorno = Daruma_FI_CancelaItemGenerico(numero)
    End If
    
    If Not (Retorno = ECF_RETORNO_OK) Then
        mostrarMsgErroECF ("Não foi possível cancelar o Item. O código de erro é: ")
    Else
        Call AdicionarLinhasDisplay(" ")
        Call AdicionarLinhasDisplay("Item " & numero & " cancelado")
        Call AdicionarLinhasDisplay(" ")
    End If
    
End Sub

Private Sub mostrarMsgErroECF(ByVal Msg As String)
    MsgBox Msg & Retorno, vbExclamation, CUPOM_FISCAL
End Sub

Private Sub cancelarVenda()
    Screen.MousePointer = vbHourglass
  
    mmoCupomFiscal.Text = ""
    If rbtBematech.Value Then
        Retorno = Bematech_FI_CancelaCupom
    ElseIf rbtSweda.Value Then
        Retorno = ECF_CancelaCupom
    Else
        Retorno = Daruma_FI_CancelaCupom
    End If
    If Not (Retorno = ECF_RETORNO_OK) Then
        mostrarMsgErroECF ("Não foi possível cancelar o cupom fiscal. O código de erro é: ")
    Else
      Call habilitarBotoes(False)
    End If
  
    Screen.MousePointer = vbDefault
End Sub

Private Sub encerrarVenda()
Dim valorTotal As Double
Dim valorDinheiro As Double
Dim valorCheque As Double
Dim valorCartao As Double
Dim Parametros As Variant
Dim Desconto As String
Dim tipodesc As String
Dim valor As String
Dim i As Integer
Dim Retorno As String
Dim OperacaoECFOK As Boolean

    Screen.MousePointer = vbHourglass
    
    Parametros = Array("0")
    valorTotal = EasyTEF.TratarCupomFiscal(tmeSubTotalizarCupom, Parametros, OperacaoECFOK)
    If valorTotal / 100 = 0 Then
        MsgBox "Cupom fiscal sem valor, operação cancelada", vbExclamation
        Exit Sub
    Else
        valorDinheiro = edtValorDinheiro.Text
        valorCheque = edtValorCheque.Text
        valorCartao = CDbl(edtValorCartao1.Text) + _
            CDbl(edtValorCartao2.Text) + _
            CDbl(edtValorCartao3.Text)
        
        If Not ((valorTotal / 100) = (valorDinheiro + valorCheque + valorCartao + _
            ObterValoresTransacaoAnteriorCartao)) Then
            MsgBox "Total das formas de pagamento diferente do total do cupom", vbExclamation
            Exit Sub
        End If
    End If
    
    If CDbl(edtValorCartao1.Text) > 0 Then
        If Not tratarPagamentoComCartao(valorTotal) Then
            MsgBox "Não foi possível finalizar o pagamento com cartão", vbExclamation
            Screen.MousePointer = vbDefault
            Exit Sub
        End If
    End If
    
    Desconto = "D"
    If TotalDescontoCielo > 0 Then
        valor = Format(TotalDescontoCielo, FORMATO_DINHEIRO)
    ElseIf TotalSaqueCielo > 0 Then
        Desconto = "A"
        valor = Format(TotalSaqueCielo, FORMATO_DINHEIRO)
    Else
        valor = "0"
    End If
    tipodesc = "$"
    
    Parametros = Array(Desconto, tipodesc, valor)
    Call EasyTEF.TratarCupomFiscal(tmeIniciarFechamentoCupom, Parametros, OperacaoECFOK)
    
    ' OperacaoECFOK diz se o comando na ECF foi executado com sucesso ou não
    If Not OperacaoECFOK Then
        MsgBox "Não foi possível iniciar o fechamento do cupom fiscal", vbExclamation
        Screen.MousePointer = vbDefault
        Exit Sub
    End If
    
    If edtValorDinheiro.Text <> "0,00" Then
        Parametros = Array("Dinheiro", Format(edtValorDinheiro.Text, FORMATO_DINHEIRO))
        Call EasyTEF.TratarCupomFiscal(tmeEfetuarFormaPagamento, Parametros, OperacaoECFOK)
        
        If Not OperacaoECFOK Then
            MsgBox "Não foi efetuar a forma de pagamento 'Dinheiro'.", vbExclamation
            Screen.MousePointer = vbDefault
            Exit Sub
        End If
    End If
    
    If edtValorCheque.Text <> "0,00" Then
        Parametros = Array(FORMA_PGTO_CHEQUE, Format(edtValorCheque.Text, FORMATO_DINHEIRO))
        Call EasyTEF.TratarCupomFiscal(tmeEfetuarFormaPagamento, Parametros, OperacaoECFOK)
        
        If Not OperacaoECFOK Then
            MsgBox "Não foi efetuar a forma de pagamento 'Cheque'.", vbExclamation
            Screen.MousePointer = vbDefault
            Exit Sub
        End If
    End If
    
    If Not EasyTEF.EfetuarFormasPagamentoCartao Then
        MsgBox "Não foi efetuar as formas de pagamento 'Cartao'", vbExclamation
        Screen.MousePointer = vbDefault
        Exit Sub
    End If
    
    Parametros = Array("Mensagem desejada de fechamento do cupom...")
    Call EasyTEF.TratarCupomFiscal(tmeTerminarFechamentoCupom, Parametros, OperacaoECFOK)
    
    If Not OperacaoECFOK Then
        MsgBox "Não foi possível terminar o fechamento do cupom fiscal", vbExclamation
        Screen.MousePointer = vbDefault
        Exit Sub
    End If
    
    If EasyTEF.ImprimirCuponsECF Then
        Call EasyTEF.ConfirmacaoVendaImpressaoCupomMultiplosCartoes
    End If
    
    Call LimparTela
    
    Screen.MousePointer = vbDefault
    
End Sub

Private Sub LimparTela()
    mmoCupomFiscal.Text = ""
    lblMsgSiTef.Caption = ""
    Call habilitarBotoes(False)
    Call limparFormasPgto
End Sub

Private Function tratarPagamentoComCartao(ByRef valorCartao As Double) As Boolean
Dim i As Integer
Dim resultado As Boolean
Dim TransacaoNegada As Boolean
Dim PgtoComCartao As Boolean
Dim MsgErroSiTef As String
Dim FuncaoSiTef As TipoFuncaoCliSiTef
Dim DataHora As Date
    
    valorCartao = 0
    resultado = True
    TransacaoNegada = False
        
    EasyTEF.NumeroDeCartoes = 0
    ' Se houver um pagamento com 1 cartão
    If IIf(edtValorCartao1.Text = "", _
        "0,00", edtValorCartao1.Text) > 0 Then
        
        EasyTEF.NumeroDeCartoes = 1
        
        ' Se houver um pagamento com 2 cartões
        If IIf(edtValorCartao2.Text = "", _
            "0,00", edtValorCartao2.Text) > 0 Then
            
            EasyTEF.NumeroDeCartoes = 2
            
            ' Se houver um pagamento com 3 cartões
            If IIf(edtValorCartao3.Text = "", _
                "0,00", edtValorCartao3.Text) > 0 Then
                
                EasyTEF.NumeroDeCartoes = 3
                
            End If
        End If
    End If
    
    For i = 1 To EasyTEF.NumeroDeCartoes
        
        If i = 1 Then
            valorCartao = edtValorCartao1.Text
        ElseIf i = 2 Then
            valorCartao = edtValorCartao2.Text
        ElseIf i = 3 Then
            valorCartao = edtValorCartao3.Text
        End If
        
        If MsgBox("Cartão de crédito (" & Format(valorCartao, FORMATO_DINHEIRO) & ")?", _
            vbYesNo + vbQuestion, "Tipo de Cartão") = vbYes Then
            FuncaoSiTef = fcsCredito
        Else
            FuncaoSiTef = fcsDebito
        End If
        With EasyTEF
            DataHora = Now
            Call .ExecutarFuncaoSiTef(FuncaoSiTef, valorCartao, NumeroCupom, _
                DataHora, DataHora, "{TipoTratamento=4}", FORMA_PGTO_CARTAO, MsgErroSiTef)
            If MsgErroSiTef <> "" Then
                MsgBox MsgErroSiTef, vbExclamation
            End If
            If (Not .TransacaoAprovada) Then
                resultado = False
                Exit Function
            Else
                TotalDescontoCielo = TotalDescontoCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo4029
                TotalSaqueCielo = TotalSaqueCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo130
            End If

        End With
        
        TransacaoNegada = EasyTEF.TransacaoAprovada
        resultado = resultado And EasyTEF.TransacaoAprovada
        If Not resultado Then
            Exit Function
        End If
        
    Next i
    
    If UsuarioNaoQuerOutraFormaPgto Then
        Call LimparTela
    End If
    
    tratarPagamentoComCartao = resultado
End Function

Public Function tratarPagamentoComCartoes(Valores As Variant, Formas As Variant) As Boolean
Dim resultado As Boolean
Dim valorCartao As Double
Dim i As Integer
Dim TransacaoNegada As Boolean
Dim MsgErroSiTef As String
Dim FuncaoSiTef As TipoFuncaoCliSiTef
Dim DataHora As Date
    
    resultado = True
    
    EasyTEF.NumeroDeCartoes = 0
    
    If IsArray(Valores) Then
        EasyTEF.NumeroDeCartoes = UBound(Valores)
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
                Call .ExecutarFuncaoSiTef(FuncaoSiTef, valorCartao, NumeroCupom, _
                    DataHora, DataHora, "{TipoTratamento=4}", Formas(i - 1), MsgErroSiTef)
                If MsgErroSiTef <> "" Then
                    MsgBox MsgErroSiTef, vbExclamation
                End If
                If (Not .TransacaoAprovada) Then
                    resultado = False
                    Exit Function
                End If
                TransacaoNegada = .TransacaoAprovada
                resultado = resultado And .TransacaoAprovada
            End With
            
            If Not resultado Then
                Exit Function
            Else
                TotalDescontoCielo = TotalDescontoCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo4029
                TotalSaqueCielo = TotalSaqueCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo130
            End If
            
            ' Caso fosse necessário mudar a descrição da forma de pagamento
            ' após a transação ser aprovada, o método a ser usado é o seguinte
            '
            'EasyTEF.AlterarNomeUltimaFormaPagamento(NomeDaFormaDePagamento)
            
        Next i
        
    End If
    
    tratarPagamentoComCartoes = resultado
End Function


Private Sub adicionarProduto()
Dim casasDec As Integer
Dim tipoQtd As String
Dim tipodesc As String
Dim desc As String

    Screen.MousePointer = vbHourglass
    
    If rbtInteira.Value = True Then
        tipoQtd = "I"
    Else
        tipoQtd = "F"
    End If
    
    If rbt2Casas.Value = True Then
      casasDec = 2
    Else
      casasDec = 3
    End If

    If rbtPercentual.Value = True Then
      tipodesc = "%"
    Else
      tipodesc = "$"
    End If
    
    desc = edtDescricao.Text
    
    If rbtBematech.Value Then
        Retorno = Bematech_FI_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
          tipoQtd, edtQtd.Text, casasDec, edtValorUnit.Text, _
          tipodesc, edtValorDesc.Text)
    ElseIf rbtSweda.Value Then
        Retorno = ECF_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
            tipoQtd, edtQtd.Text, casasDec, edtValorUnit.Text, _
            tipodesc, edtValorDesc.Text)
    Else
        Retorno = Daruma_FI_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
          tipoQtd, edtQtd.Text, casasDec, edtValorUnit.Text, _
          tipodesc, edtValorDesc.Text)
    End If
    
    If Retorno = ECF_RETORNO_OK Then
        seq = seq + 1
        Call AdicionarLinhasDisplay(seq & vbTab & desc & vbTab & _
            edtQtd.Text & " x " & edtValorUnit.Text)
            
        total = total + edtValorUnit.Text * edtQtd.Text
        
        edtCodigo.SetFocus
        btnEncerrarVenda.Enabled = True
        btnCancelarVenda.Enabled = True
    Else
        Call mostrarMsgErroECF("Não foi possível adicionar o item. O código de erro é: ")
    End If
    
    Screen.MousePointer = vbDefault
    
End Sub

Private Sub Form_Unload(Cancel As Integer)
    If rbtSweda.Value Then
        ECF_FechaPortaSerial
    End If
End Sub

Private Sub arrayToStr(a As Variant, ByRef s As String)
    Dim i As Integer
    s = ""
    For i = LBound(a) To UBound(a)
        s = s & a(i) & vbCrLf
    Next i
End Sub

Private Sub limparFormasPgto()
    
    edtValorDinheiro.Text = "0,00"
    edtValorCheque.Text = "0,00"
    edtValorCartao1.Text = "0,00"
    edtValorCartao2.Text = "0,00"
    edtValorCartao3.Text = "0,00"
    lblMsgSiTef.Caption = ""
    
End Sub

Public Sub ZerarCieloPremia()

    TotalDescontoCielo = 0
    TotalSaqueCielo = 0
    
End Sub

Private Function ObterValoresTransacaoAnteriorCartao() As Double
    Dim i As Integer
    Dim acumulador As Double
    
    acumulador = 0
    
    For i = LBound(EasyTEF.ValoresCartoes) To UBound(EasyTEF.ValoresCartoes)
        acumulador = acumulador + Val(EasyTEF.ValoresCartoes(i))
    Next i
    
    ObterValoresTransacaoAnteriorCartao = acumulador
    
End Function


