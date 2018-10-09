VERSION 5.00
Begin VB.Form FrenteCaixaFrm 
   Caption         =   "Exemplo TEF Discado - Tela de Frente de Caixa"
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
   Begin VB.OptionButton rbtDarumaFW 
      Caption         =   "Daruma &FW"
      Height          =   375
      Left            =   7800
      TabIndex        =   49
      Top             =   5640
      Width           =   1455
   End
   Begin VB.CheckBox chkUsarDTEF 
      Caption         =   "Usar D-TEF"
      Height          =   255
      Left            =   2400
      TabIndex        =   48
      Top             =   5640
      Width           =   1335
   End
   Begin VB.OptionButton rbtDaruma32 
      Caption         =   "Daruma &32"
      Height          =   375
      Left            =   6360
      TabIndex        =   39
      Top             =   5640
      Width           =   1215
   End
   Begin VB.OptionButton rbtBematech 
      Caption         =   "&Bematech"
      Height          =   375
      Left            =   5040
      TabIndex        =   38
      Top             =   5640
      Width           =   1215
   End
   Begin VB.OptionButton rbtSweda 
      Caption         =   "&Sweda"
      Height          =   375
      Left            =   3960
      TabIndex        =   37
      Top             =   5640
      Value           =   -1  'True
      Width           =   975
   End
   Begin VB.Frame Frame6 
      Caption         =   "Formas de Pagamento"
      Height          =   1455
      Left            =   3960
      TabIndex        =   18
      Top             =   4080
      Width           =   5415
      Begin VB.TextBox edtValorCartao3 
         Height          =   315
         Left            =   4440
         TabIndex        =   46
         Text            =   "0,00"
         Top             =   960
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
      Begin VB.Frame Frame7 
         Height          =   1095
         Left            =   1320
         TabIndex        =   43
         Top             =   240
         Width           =   40
      End
      Begin VB.Frame Frame8 
         Height          =   1095
         Left            =   3360
         TabIndex        =   42
         Top             =   240
         Width           =   40
      End
      Begin VB.CheckBox chkConsultar 
         Caption         =   "Consulta Serasa"
         Height          =   255
         Left            =   1560
         TabIndex        =   21
         Top             =   1080
         Width           =   1575
      End
      Begin VB.TextBox edtValorCartao1 
         Height          =   315
         Left            =   4440
         TabIndex        =   36
         Text            =   "0,00"
         Top             =   240
         Width           =   855
      End
      Begin VB.TextBox edtValorCheque 
         Height          =   315
         Left            =   1560
         TabIndex        =   20
         Text            =   "0,00"
         Top             =   720
         Width           =   975
      End
      Begin VB.TextBox edtValorDinheiro 
         Height          =   315
         Left            =   120
         TabIndex        =   19
         Text            =   "0,00"
         Top             =   720
         Width           =   975
      End
      Begin VB.Label lblCartao3 
         Caption         =   "Cartão 3"
         Height          =   255
         Left            =   3600
         TabIndex        =   47
         Top             =   960
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
      Begin VB.Label lblCheque 
         Caption         =   "Cheque"
         Height          =   255
         Left            =   1560
         TabIndex        =   41
         Top             =   360
         Width           =   975
      End
      Begin VB.Label lblDinheiro 
         Caption         =   "Dinheiro"
         Height          =   255
         Left            =   120
         TabIndex        =   40
         Top             =   360
         Width           =   975
      End
      Begin VB.Label lblCartao1 
         Caption         =   "Cartão 1"
         Height          =   255
         Left            =   3600
         TabIndex        =   35
         Top             =   240
         Width           =   735
      End
   End
   Begin VB.CommandButton btnFechar 
      Caption         =   "&Fechar"
      Height          =   375
      Left            =   8280
      TabIndex        =   26
      Top             =   6240
      Width           =   1095
   End
   Begin VB.CommandButton btnEncerrarVenda 
      Caption         =   "Encerrar Venda [F7]"
      Enabled         =   0   'False
      Height          =   375
      Left            =   6240
      TabIndex        =   25
      Top             =   6240
      Width           =   2055
   End
   Begin VB.CommandButton btnCancelarVenda 
      Caption         =   "Cancelar Venda [F6]"
      Enabled         =   0   'False
      Height          =   375
      Left            =   4200
      TabIndex        =   24
      Top             =   6240
      Width           =   2055
   End
   Begin VB.CommandButton btnCancelarItem 
      Caption         =   "Cancelar Ítem [F5]"
      Enabled         =   0   'False
      Height          =   375
      Left            =   2160
      TabIndex        =   23
      Top             =   6240
      Width           =   2055
   End
   Begin VB.CommandButton btnNovo 
      Caption         =   "Nova Venda [F4]"
      DisabledPicture =   "FrenteCaixaFrm.frx":0000
      Height          =   375
      Left            =   120
      Picture         =   "FrenteCaixaFrm.frx":0102
      TabIndex        =   22
      Top             =   6240
      Width           =   2055
   End
   Begin VB.Frame Frame5 
      Height          =   135
      Left            =   120
      TabIndex        =   34
      Top             =   6000
      Width           =   9255
   End
   Begin VB.CommandButton btnAdm 
      Caption         =   "&Administração TEF"
      Height          =   375
      Left            =   120
      TabIndex        =   17
      Top             =   5640
      Width           =   2055
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
      Height          =   3855
      Left            =   3960
      MultiLine       =   -1  'True
      TabIndex        =   27
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
            TabIndex        =   33
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
            TabIndex        =   32
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
            TabIndex        =   31
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
         TabIndex        =   30
         Top             =   1080
         Width           =   720
      End
      Begin VB.Label Label2 
         Alignment       =   1  'Right Justify
         AutoSize        =   -1  'True
         Caption         =   "Descrição:"
         Height          =   210
         Left            =   990
         TabIndex        =   29
         Top             =   720
         Width           =   825
      End
      Begin VB.Label Label1 
         Alignment       =   1  'Right Justify
         AutoSize        =   -1  'True
         Caption         =   "Código do Produto:"
         Height          =   210
         Left            =   210
         TabIndex        =   28
         Top             =   360
         Width           =   1605
      End
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
Dim WithEvents EasyTEF As EasyTEF.EasyTEFDiscado
Attribute EasyTEF.VB_VarHelpID = -1
Dim retorno As Integer 'Valor de retorno da execução dos comandos da ECF
Dim total As Double 'Valor total dos ítens do cupom passado à tela de fechamento de cupom fiscal
Dim seq As Integer 'Sequencial usado para display do número do produto no cupom fiscal
Dim HouveTransacaoNegada As Boolean
Dim UsuarioNaoQuerOutraFormaPgto As Boolean
Dim CountGerenciais As Integer

'Variáveis utilizadas em eventos do EasyTEF
Dim NumeroCupom As String

'Constantes
Const ECF_RETORNO_OK As Integer = 1
Const CUPOM_FISCAL As String = "Cupom Fiscal"
Const FORMA_PGTO_CARTAO As String = "Cartao"
Const FORMA_PGTO_CHEQUE As String = "Cheque"
Const FORMATO_MONEY As String = "#0.00"

Private Declare Function BlockInput Lib "user32" (ByVal Block As Boolean) As Boolean

Private Sub carregarEasyTEF()
Dim f As New StdFont
Dim ini As String

    f.Name = "Tahoma"
    f.Size = 9
    ini = App.path & "\exemplo.ini"
    
    Set EasyTEF = New EasyTEF.EasyTEFDiscado
    
    EasyTEF.Gerenciador = tgGerenciadorPadrao
    EasyTEF.FormMsgOperador.Fonte = f
    EasyTEF.FormMsgOperador.Altura = 110
    EasyTEF.FormMsgOperador.Largura = 400
    EasyTEF.FormMsgOperador.BotaoOK.Altura = 25
    EasyTEF.FormMsgOperador.BotaoOK.Largura = 75
    EasyTEF.ContraSenha = ReadINI(ini, "TEF", "contraSenha", "")
    EasyTEF.AutoAtivarGerenciador = True
    'se usar tef dedicado D-TEF, com Client D-TEF, setar True
    EasyTEF.UsarDTEF = ReadINI(ini, "TEF", "usarDTEF", "0")
    EasyTEF.Somente1RelGerencial = True
    chkUsarDTEF.Value = ReadINI(ini, "TEF", "usarDTEF", "0")
    ' configurações para Cielo Premia
    EasyTEF.CieloPremia.RazaoSocialSW = "Razão Social da Software House"
    EasyTEF.CieloPremia.VersaoSW = "Nome da Automação e Versão"
    EasyTEF.CieloPremia.Tipo = tcpAmbas
    
    If Not EasyTEF.AutoVerificarTEF Then
        EasyTEF.AutoVerificarTEF = True
    End If
End Sub

Private Sub btnAdicionarItem_Click()
    adicionarProduto
End Sub

Private Sub btnAdm_Click()
    Screen.MousePointer = vbHourglass
    
    EasyTEF.ImprimirComprovante = True
    Call EasyTEF.FazerRequisicaoAdministrativa
    
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

Private Sub chkConsultar_Click()
    If chkConsultar.Value Then
        Screen.MousePointer = vbHourglass
        Call consultarCheque
        Screen.MousePointer = vbDefault
    End If
End Sub

Private Sub chkUsarDTEF_Click()
    If chkUsarDTEF.Value Then
        Screen.MousePointer = vbHourglass
        
        EasyTEF.AutoVerificarTEF = False
        EasyTEF.Gerenciador = tgGerenciadorPadrao
        EasyTEF.UsarDTEF = True
        EasyTEF.AutoVerificarTEF = True
        
        Screen.MousePointer = vbDefault
    Else
        EasyTEF.UsarDTEF = False
    End If
End Sub

Private Sub EasyTEF_OnAbrirComprovanteNaoFiscalVinculado(operacaoECFOK As Boolean, _
    ByVal NomeFormaPgto As String, ByVal ValorPgto As Double)
      
Dim valor As String

    valor = Format(ValorPgto, "#0.00")
    If rbtBematech.Value Then
        operacaoECFOK = Bematech_FI_AbreComprovanteNaoFiscalVinculado(NomeFormaPgto, _
            valor, NumeroCupom) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        operacaoECFOK = ECF_AbreComprovanteNaoFiscalVinculado(NomeFormaPgto, _
            valor, NumeroCupom) = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        operacaoECFOK = Daruma_FI_AbreComprovanteNaoFiscalVinculado(NomeFormaPgto, _
            valor, NumeroCupom) = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        operacaoECFOK = iCCDAbrirSimplificado_ECF_Daruma(NomeFormaPgto, _
            "1", NumeroCupom, _
            valor) = ECF_RETORNO_OK
    End If
    
    CountGerenciais = 0

End Sub

Private Sub EasyTEF_OnAbrirRelatorioGerencial()
    If rbtSweda.Value Then
        Call ECF_AbreRelatorioGerencial
    ElseIf rbtDaruma32.Value Then
        Call Daruma_FI_AbreRelatorioGerencial
    ElseIf rbtDarumaFW.Value Then
        Call iRGAbrirPadrao_ECF_Daruma
    End If
End Sub

Private Sub EasyTEF_OnAposImpressoraNaoResponde(ByVal TentarNovamente As Boolean)
    If TentarNovamente Then
        If rbtBematech.Value Then
            BlockInput True
            Sleep 10000
            Do While Bematech_FI_VerificaImpressoraLigada <> 1
                BlockInput False
                If MsgBox("Impressora não responde, tentar novamente?", _
                    vbQuestion + vbYesNo, "Impressora não responde") = vbNo Then
                
                    Call EasyTEF_OnEncerrarCupomFiscal
                    Call EasyTEF.CancelarVendasPendentes
                
                End If
                BlockInput True
                Sleep 5000
            Loop
            Dim operacaoECFOK As Boolean
            Call EasyTEF_OnFecharComprovanteNaoFiscalVinculado
            Call EasyTEF_OnFecharRelatorioGerencial(operacaoECFOK)
        End If
    End If
End Sub

Private Sub EasyTEF_OnAposImprimir1aViaCupomTEF()
    If rbtDarumaFW.Value Then
        If EasyTEF.ComandoECF = tmeUsarComprovanteNaoFiscalVinculado Then
            Call iCCDImprimirTexto_ECF_Daruma(vbCrLf)
            Call iCCDImprimirTexto_ECF_Daruma(vbCrLf)
            Call iCCDImprimirTexto_ECF_Daruma(vbCrLf)
            Call iCCDImprimirTexto_ECF_Daruma(vbCrLf)
            Call iCCDImprimirTexto_ECF_Daruma(vbCrLf)
        ElseIf EasyTEF.ComandoECF = tmeImprimirRelatorioGerencial Then
            Call iRGImprimirTexto_ECF_Daruma(vbCrLf)
            Call iRGImprimirTexto_ECF_Daruma(vbCrLf)
            Call iRGImprimirTexto_ECF_Daruma(vbCrLf)
            Call iRGImprimirTexto_ECF_Daruma(vbCrLf)
            Call iRGImprimirTexto_ECF_Daruma(vbCrLf)
        End If
        Call eAcionarGuilhotina_ECF_Daruma("1")
    ElseIf rbtSweda.Value Then
        If EasyTEF.ComandoECF = tmeUsarComprovanteNaoFiscalVinculado Then
            Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
        ElseIf EasyTEF.ComandoECF = tmeImprimirRelatorioGerencial Then
            Call ECF_RelatorioGerencial(vbCrLf)
            Call ECF_RelatorioGerencial(vbCrLf)
            Call ECF_RelatorioGerencial(vbCrLf)
            Call ECF_RelatorioGerencial(vbCrLf)
            Call ECF_RelatorioGerencial(vbCrLf)
        End If
    ElseIf rbtBematech.Value Then
        If EasyTEF.ComandoECF = tmeUsarComprovanteNaoFiscalVinculado Then
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
        ElseIf EasyTEF.ComandoECF = tmeImprimirRelatorioGerencial Then
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
            Call Bematech_FI_RelatorioGerencial(vbCrLf)
        End If
    ElseIf rbtDaruma32.Value Then
        If EasyTEF.ComandoECF = tmeUsarComprovanteNaoFiscalVinculado Then
            Call Daruma_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Daruma_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Daruma_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Daruma_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            Call Daruma_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
        ElseIf EasyTEF.ComandoECF = tmeImprimirRelatorioGerencial Then
            Call Daruma_FI_RelatorioGerencial(vbCrLf)
            Call Daruma_FI_RelatorioGerencial(vbCrLf)
            Call Daruma_FI_RelatorioGerencial(vbCrLf)
            Call Daruma_FI_RelatorioGerencial(vbCrLf)
            Call Daruma_FI_RelatorioGerencial(vbCrLf)
        End If
    End If
End Sub

Private Sub EasyTEF_OnAposTransacaoNegada(ByVal UsarOutraFormaPgto As Boolean)
    UsuarioNaoQuerOutraFormaPgto = Not UsarOutraFormaPgto
    If UsarOutraFormaPgto Then
        Call limparFormasPgto
        ' Sugere terminar o cupom fiscal em dinheiro
        edtValorDinheiro.Text = Format(total - ObterValoresTransacaoAnteriorCartao, "#0.00")
        MsgBox "Atenção. Este exemplo em VB6 sugere automaticamente terminar " & _
            "o cupom fiscal em DINHEIRO." & vbCrLf & vbCrLf & _
            "Observe que o valor em cartão foi apagado e o restante do cupom " & _
            "fiscal foi preenchido no campo Dinheiro.", vbExclamation
    End If
End Sub

Private Sub EasyTEF_OnEfetuarFormaPagamento(operacaoECFOK As Boolean, ByVal params As Variant, retorno As String)
    If rbtBematech.Value Then
        operacaoECFOK = Bematech_FI_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        operacaoECFOK = ECF_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        operacaoECFOK = Daruma_FI_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        operacaoECFOK = iCFEfetuarPagamentoFormatado_ECF_Daruma(params(0), params(1)) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnEncerrarCupomFiscal()
    If rbtBematech.Value Then
        Call Bematech_FI_FechaComprovanteNaoFiscalVinculado
        Call Bematech_FI_CancelaCupom
    ElseIf rbtSweda.Value Then
        Call ECF_FechaComprovanteNaoFiscalVinculado
        Call ECF_CancelaCupom
    ElseIf rbtDaruma32.Value Then
        Call Daruma_FI_FechaComprovanteNaoFiscalVinculado
        Call Daruma_FI_CancelaCupom
    ElseIf rbtDarumaFW.Value Then
        Call iCCDFechar_ECF_Daruma
        Call iCFCancelar_ECF_Daruma
    End If
End Sub

Private Sub EasyTEF_OnFecharComprovanteNaoFiscalVinculado()
    If rbtBematech.Value Then
        Call Bematech_FI_FechaComprovanteNaoFiscalVinculado
    ElseIf rbtSweda.Value Then
        Call ECF_FechaComprovanteNaoFiscalVinculado
    ElseIf rbtDaruma32.Value Then
        Call Daruma_FI_FechaComprovanteNaoFiscalVinculado
    ElseIf rbtDarumaFW.Value Then
        Call iCCDFechar_ECF_Daruma
    End If
End Sub

Private Sub EasyTEF_OnFecharRelatorioGerencial(operacaoECFOK As Boolean)
    If rbtBematech.Value Then
        operacaoECFOK = Bematech_FI_FechaRelatorioGerencial = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        operacaoECFOK = ECF_FechaRelatorioGerencial = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        operacaoECFOK = Daruma_FI_FechaRelatorioGerencial = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        operacaoECFOK = iRGFechar_ECF_Daruma = ECF_RETORNO_OK
    End If
End Sub


Private Sub EasyTEF_OnGerarIdentificador(identificacao As Long)
    Randomize
    identificacao = Int(Rnd * 1000) + 1
End Sub

Private Sub EasyTEF_OnImpressoraTemPapel(operacaoECFOK As Boolean)
'Dim a As Integer
'Dim s1 As Integer
'Dim s2 As Integer
'Dim i As Integer
'Dim aviso As String
'Dim erro As String

    '*********************************************************************
    '* As linhas ABAIXO devem ser descomentadas se usar ECF ** Física **
    '* e a linha operacaoECFOK deve ser comentada.
    '*********************************************************************
  
    'a = 0
    's1 = 0
    's2 = 0
    If rbtBematech.Value Then
        'Call Bematech_FI_VerificaEstadoImpressora(a, s1, s2)
    ElseIf rbtSweda.Value Then
        'Call ECF_VerificaEstadoImpressora(a, s1, s2)
    ElseIf rbtDaruma32.Value Then
        'Call Daruma_FI_VerificaEstadoImpressora(a, s1, s2)
    ElseIf rbtDarumaFW.Value Then
        'aviso = Space(300)
        'erro = Space(erro)
        
        'Call eRetornarAvisoErroUltimoCMD_ECF_Daruma(aviso, erro)
        'operacaoECFOK = Not (LCase(aviso) = "fim do papel")
        'Exit Sub
    End If
    'operacaoECFOK = Not (s1 >= 128) 'fim de papel
    
    '*********************************************************************
    '* As linhas ACIMA devem ser comentadas se usar ECF ** Emulada **
    '* e a linha abaixo NÃO deve ser comentada.
    '*********************************************************************
    operacaoECFOK = True
End Sub

Private Sub EasyTEF_OnImprimirLeituraX(operacaoECFOK As Boolean)
    operacaoECFOK = True
End Sub

Private Sub EasyTEF_OnImprimirRelatorioGerencial(ByVal imagemCupomTEF As Variant, impressaoOk As Boolean)
Dim s As String
    Call arrayToStr(imagemCupomTEF, s)
    If rbtBematech.Value Then
        impressaoOk = Bematech_FI_RelatorioGerencial(s) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        impressaoOk = ECF_RelatorioGerencial(s) = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        impressaoOk = Daruma_FI_RelatorioGerencial(s) = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        impressaoOk = iRGImprimirTexto_ECF_Daruma(s) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnIniciarFechamentoCupomFiscal(operacaoECFOK As Boolean, ByVal params As Variant, retorno As String)
    If rbtBematech.Value Then
        operacaoECFOK = Bematech_FI_IniciaFechamentoCupom(params(0), _
            params(1), params(2)) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        operacaoECFOK = ECF_IniciaFechamentoCupom(params(0), _
            params(1), params(2)) = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        operacaoECFOK = Daruma_FI_IniciaFechamentoCupom(params(0), _
            params(1), params(2)) = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        operacaoECFOK = iCFTotalizarCupom_ECF_Daruma(params(1), _
            params(2)) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnSubTotalizarCupom(operacaoECFOK As Boolean, ByVal Param As Variant, retorno As String)
    retorno = Space(14)
    If rbtBematech.Value Then
        operacaoECFOK = Bematech_FI_SubTotal(retorno) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        operacaoECFOK = ECF_SubTotal(retorno) = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        operacaoECFOK = Daruma_FI_SubTotal(retorno) = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        retorno = Space(12)
        operacaoECFOK = rCFSubTotal_ECF_Daruma(retorno) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnTerminarCancelamentoMultiplosCartoes()
    mmoCupomFiscal.Text = ""
    Call habilitarBotoes(False)
    Call limparFormasPgto
End Sub

Private Sub EasyTEF_OnTerminarFechamentoCupom(operacaoECFOK As Boolean, ByVal params As Variant, retorno As String)
    If rbtBematech.Value Then
        operacaoECFOK = Bematech_FI_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        operacaoECFOK = ECF_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        operacaoECFOK = Daruma_FI_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        operacaoECFOK = iCFEncerrarConfigMsg_ECF_Daruma(params(0)) = ECF_RETORNO_OK
    End If
End Sub

Private Sub EasyTEF_OnUsarComprovanteNaoFiscalVinculado(ByVal imagemCupomTEF As Variant, impressaoOk As Boolean)
    Dim s As String
    Call arrayToStr(imagemCupomTEF, s)
    If rbtBematech.Value Then
        impressaoOk = Bematech_FI_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
    ElseIf rbtSweda.Value Then
        impressaoOk = ECF_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
    ElseIf rbtDaruma32.Value Then
        impressaoOk = Daruma_FI_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
    ElseIf rbtDarumaFW.Value Then
        impressaoOk = iCCDImprimirTexto_ECF_Daruma(s) = ECF_RETORNO_OK
    End If
End Sub

Private Sub edtValorCartao1_LostFocus()
    If Trim(edtValorCartao1.Text) = "" Then
        edtValorCartao1.Text = "0,00"
    End If
End Sub

Private Sub edtValorCartao2_LostFocus()
    If Trim(edtValorCartao2.Text) = "" Then
        edtValorCartao2.Text = "0,00"
    End If
End Sub

Private Sub edtValorCartao3_LostFocus()
    If Trim(edtValorCartao3.Text) = "" Then
        edtValorCartao3.Text = "0,00"
    End If
End Sub

Private Sub Form_Activate()
    edtValorCartao1.SetFocus
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
End Sub

Private Sub novaVenda()
    Screen.MousePointer = vbHourglass
    
    mmoCupomFiscal.Text = ""
    If rbtBematech.Value Then
        retorno = Bematech_FI_AbreCupom("")
    ElseIf rbtSweda.Value Then
        retorno = ECF_AbreCupom("")
    ElseIf rbtDaruma32.Value Then
        retorno = Daruma_FI_AbreCupom("")
    ElseIf rbtDarumaFW.Value Then
        retorno = iCFAbrirPadrao_ECF_Daruma
    End If
    
    If Not (retorno = ECF_RETORNO_OK) Then
        Call mostrarMsgErroECF("Não foi possível abrir o cupom fiscal. O código de erro é: ")
    Else
        Call habilitarBotoes(True)
        
        seq = 0
        total = 0
        
        NumeroCupom = Space(6)
        
        If rbtBematech.Value Then
            retorno = Bematech_FI_NumeroCupom(NumeroCupom)
        ElseIf rbtSweda.Value Then
            retorno = ECF_NumeroCupom(NumeroCupom)
        ElseIf rbtDaruma32.Value Then
            retorno = Daruma_FI_NumeroCupom(NumeroCupom)
        ElseIf rbtDarumaFW.Value Then
            retorno = rRetornarInformacao_ECF_Daruma("26", NumeroCupom)
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
        retorno = Bematech_FI_CancelaItemGenerico(numero)
    ElseIf rbtSweda.Value Then
        retorno = ECF_CancelaItemGenerico(numero)
    ElseIf rbtDaruma32.Value Then
        retorno = Daruma_FI_CancelaItemGenerico(numero)
    ElseIf rbtDarumaFW.Value Then
        retorno = iCFCancelarItem_ECF_Daruma(numero)
    End If
    
    If Not (retorno = ECF_RETORNO_OK) Then
        mostrarMsgErroECF ("Não foi possível cancelar o Item. O código de erro é: ")
    Else
        Call AdicionarLinhasDisplay(" ")
        Call AdicionarLinhasDisplay("Item " & numero & " cancelado")
        Call AdicionarLinhasDisplay(" ")
    End If
    
End Sub

Private Sub mostrarMsgErroECF(ByVal msg As String)
    MsgBox msg & retorno, vbExclamation, CUPOM_FISCAL
End Sub

Private Sub cancelarVenda()
    Screen.MousePointer = vbHourglass
  
    mmoCupomFiscal.Text = ""
    If rbtBematech.Value Then
        retorno = Bematech_FI_CancelaCupom
    ElseIf rbtSweda.Value Then
        retorno = ECF_CancelaCupom
    ElseIf rbtDaruma32.Value Then
        retorno = Daruma_FI_CancelaCupom
    ElseIf rbtDarumaFW.Value Then
        retorno = iCFCancelar_ECF_Daruma
    End If
    
    If Not (retorno = ECF_RETORNO_OK) Then
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
Dim parametros As Variant
Dim desconto As String
Dim tipodesc As String
Dim valor As String
Dim i As Integer
Dim retorno As String
Dim operacaoECFOK As Boolean

    Screen.MousePointer = vbHourglass
    
    ' inicia variáveis
    operacaoECFOK = False
    
    ' obtem o total do cupom fiscal
    ' esta chamada é obrigatória mesmo que não se deseje obter o total do cupom fiscal
    parametros = Array("0")
    valorTotal = EasyTEF.TratarCupomFiscal(tmeSubTotalizarCupom, parametros, operacaoECFOK) / 100
    
    If valorTotal = 0 Then
        MsgBox "Cupom fiscal sem valor, operação cancelada", vbCritical
        Exit Sub
    Else
        valorDinheiro = edtValorDinheiro.Text
        valorCheque = edtValorCheque.Text
        valorCartao = CDbl(edtValorCartao1.Text) + _
            CDbl(edtValorCartao2.Text) + _
            CDbl(edtValorCartao3.Text)
        
        If (valorTotal < (valorDinheiro + valorCheque + valorCartao + _
            ObterValoresTransacaoAnteriorCartao)) Then
            Screen.MousePointer = vbDefault
            MsgBox "Total das formas de pagamento diferente do total do cupom.", vbCritical
            Exit Sub
        End If
    End If
    
    If CDbl(edtValorCartao1.Text) > 0 Then
        If Not tratarPagamentoComCartao(valorTotal) Then
            MsgBox "Não foi possível terminar o pagamento com cartão.", vbCritical
            Call voltarCursorAoNormal
            Exit Sub
        End If
    End If
    
    desconto = "D"
    tipodesc = "$"
    valor = Format(EasyTEF.ValorCampo709_000, "#0.00") ' desconto cielo premia
    
    If rbtDarumaFW.Value Then
        tipodesc = "D$"
    End If
    
    parametros = Array(desconto, tipodesc, valor)
    retorno = EasyTEF.TratarCupomFiscal(tmeIniciarFechamentoCupomFiscal, parametros, operacaoECFOK)
    
    If operacaoECFOK = False Then
        Call voltarCursorAoNormal
        MsgBox "Não foi possível iniciar o fechamento do cupom fiscal.", vbCritical
        Exit Sub
    End If
    
    If Val(edtValorDinheiro.Text) > 0 Then
        parametros = Array("Dinheiro", Format(edtValorDinheiro.Text, FORMATO_MONEY))
        Call EasyTEF.TratarCupomFiscal(tmeEfetuarFormaPagamento, parametros, operacaoECFOK)
        
        ' A variável operacaoECFOK retorna se o comando da ECF foi executado
        ' com sucesso ou não
        If Not operacaoECFOK Then
            MsgBox "Não foi possível efetuar a forma de pagamento 'Dinheiro'.", vbCritical
            Exit Sub
        End If
    End If
    
    If Val(edtValorCheque.Text) > 0 Then
        parametros = Array(FORMA_PGTO_CHEQUE, Format(edtValorCheque.Text, FORMATO_MONEY))
        Call EasyTEF.TratarCupomFiscal(tmeEfetuarFormaPagamento, parametros, operacaoECFOK)
        
        If Not operacaoECFOK Then
            MsgBox "Não foi possível efetuar a forma de pagamento 'Cheque'.", vbCritical
            Exit Sub
        End If
    End If
    
    ' se houve pagamento com cartão
    ' usa o método automático para efetuar as formas de pagamento de maneira
    ' simples, ou seja, somente descrição da forma de pagamento de cartão
    ' e o valor de cada forma de pagamento
    If Not (EasyTEF.OperacaoTEFAtual = ttCheque) Then
        If Not EasyTEF.EfetuarFormasPagamentoCartao Then
            MsgBox "Não foi possível efetuar a(s) forma(s) de pagamento de cartão.", vbCritical
            Exit Sub
        End If
    End If
    
    parametros = Array("Mensagem desejada de fechamento do cupom...")
    Call EasyTEF.TratarCupomFiscal(tmeTerminarFechamentoCupomFiscal, parametros, operacaoECFOK)
    
    If Not operacaoECFOK Then
        MsgBox "Não foi possível terminar o fechamento do cupom fiscal.", vbCritical
        Exit Sub
    End If
    
    ' imprime todos os cupons tef de transações aprovadas
    If EasyTEF.ImprimirCuponsECF Then
        NumeroCupom = ""
    End If
    
    Call LimparTela
    
    Screen.MousePointer = vbDefault
    
End Sub

Private Sub LimparTela()
    mmoCupomFiscal.Text = ""
    Call habilitarBotoes(False)
    Call limparFormasPgto
End Sub

Private Function tratarPagamentoComCartao(ByRef valorCartao As Double) As Boolean
Dim i As Integer
Dim resultado As Boolean
    
    ' inicia as variáveis
    valorCartao = 0
    resultado = True
    
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
    
    EasyTEF.ImprimirComprovante = False
    For i = 1 To EasyTEF.NumeroDeCartoes
        
        If i = 1 Then
            valorCartao = edtValorCartao1.Text
        ElseIf i = 2 Then
            valorCartao = edtValorCartao2.Text
        ElseIf i = 3 Then
            valorCartao = edtValorCartao3.Text
        End If
        
        Call EasyTEF.PagarNoCartao(valorCartao, tmReal, NumeroCupom, _
            i = 1, i = EasyTEF.NumeroDeCartoes, FORMA_PGTO_CARTAO)
        
        resultado = EasyTEF.TransacaoAprovada
        If Not EasyTEF.TransacaoAprovada Then
            MsgBox "Não foi possível finalizar com sucesso o pagamento com cartão", _
                vbCritical
            Exit For
        End If
        
        ' Caso fosse necessário mudar a descrição da forma de pagamento
        ' após a transação ser aprovada, o método a ser usado é o seguinte
        '
        'EasyTEF.AlterarNomeUltimaFormaPagamento(NomeDaFormaDePagamento)
        
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
    
    resultado = True
    
    EasyTEF.NumeroDeCartoes = 0
    
    If IsArray(Valores) Then
        EasyTEF.ImprimirComprovante = False
        EasyTEF.NumeroDeCartoes = UBound(Valores) + 1
        For i = 1 To EasyTEF.NumeroDeCartoes
            valorCartao = Valores(i - 1)
            
            Call EasyTEF.PagarNoCartao(valorCartao, tmReal, NumeroCupom, _
                i = 1, i = EasyTEF.NumeroDeCartoes, Formas(i - 1))
            
            resultado = EasyTEF.TransacaoAprovada
            If Not EasyTEF.TransacaoAprovada Then
                MsgBox "Não foi possível finalizar com sucesso o pagamento com cartão", _
                    vbCritical
                Exit For
            End If
            
            ' Caso fosse necessário mudar a descrição da forma de pagamento
            ' após a transação ser aprovada, o método a ser usado é o seguinte
            '
            'EasyTEF.AlterarNomeUltimaFormaPagamento(NomeDaFormaDePagamento)
            
        Next i
        
        If UsuarioNaoQuerOutraFormaPgto Then
            Call LimparTela
        End If
    End If
    
    tratarPagamentoComCartoes = resultado
End Function

Private Sub adicionarProduto()
Dim casasDec As Integer
Dim tipoQtd As String
Dim tipodesc As String
Dim desc As String
Dim operacaoECFOK As Boolean

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
        If rbtDarumaFW.Value = False Then
            tipodesc = "%"
        Else
            tipodesc = "D%"
        End If
    Else
        If rbtDarumaFW.Value = False Then
            tipodesc = "$"
        Else
            tipodesc = "D$"
        End If
    End If
    
    desc = edtDescricao.Text
    
    If rbtBematech.Value Then
        retorno = Bematech_FI_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
            tipoQtd, edtQtd.Text, casasDec, edtValorUnit.Text, _
            tipodesc, edtValorDesc.Text)
    ElseIf rbtSweda.Value Then
        retorno = ECF_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
            tipoQtd, edtQtd.Text, casasDec, edtValorUnit.Text, _
            tipodesc, edtValorDesc.Text)
    ElseIf rbtDaruma32.Value Then
        retorno = Daruma_FI_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
            tipoQtd, edtQtd.Text, casasDec, edtValorUnit.Text, _
            tipodesc, edtValorDesc.Text)
    ElseIf rbtDarumaFW.Value Then
        retorno = iCFVender_ECF_Daruma(edtAliquota.Text, edtQtd.Text, _
            edtValorUnit.Text, tipodesc, edtValorDesc.Text, edtCodigo.Text, "UN", _
            edtDescricao.Text)
    End If
    
    If retorno = ECF_RETORNO_OK Then
        seq = seq + 1
        Call AdicionarLinhasDisplay(seq & vbTab & desc & vbTab & _
            edtQtd.Text & " x " & edtValorUnit.Text)
            
        total = EasyTEF.TratarCupomFiscal(tmeSubTotalizarCupom, Array("0"), operacaoECFOK) / 100
        
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
    
End Sub

Private Function consultarCheque() As Boolean
        EasyTEF.ImprimirComprovante = False
    Call EasyTEF.consultarCheque(Format(edtValorCheque.Text, FORMATO_MONEY), _
        FORMA_PGTO_CHEQUE, NumeroCupom, "", "F", "", 0, "", "", "", "", "", "", "")
    'De acordo com a especificação TEF, quando a consulta de cheque é aprovada,
    'o cupom fiscal deve ser fechado imediatamente
    If EasyTEF.TransacaoAprovada Then
        Call encerrarVenda
    Else
        MsgBox "Não foi possível finalizar a consulta de cheque com sucesso.", vbCritical
    End If
    
    consultarCheque = EasyTEF.TransacaoAprovada
End Function

Private Sub voltarCursorAoNormal()
    Screen.MousePointer = vbDefault
End Sub

Private Function ObterValoresTransacaoAnteriorCartao() As Double
    Dim i As Integer
    Dim acumulador As Double
    
    acumulador = 0
    
    If EasyTEF.OperacaoTEFAtual <> ttCheque Then
        For i = LBound(EasyTEF.ValoresCartoes) To UBound(EasyTEF.ValoresCartoes)
            acumulador = acumulador + Val(EasyTEF.ValoresCartoes(i))
        Next i
    End If
    
    ObterValoresTransacaoAnteriorCartao = acumulador
    
End Function

