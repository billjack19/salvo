VERSION 5.00
Object = "{86CF1D34-0C5F-11D2-A9FC-0000F8754DA1}#2.0#0"; "MSCOMCT2.OCX"
Begin VB.Form NaoFiscalFrm 
   Caption         =   "Impressão Não Fiscal"
   ClientHeight    =   2970
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
   ScaleHeight     =   2970
   ScaleWidth      =   6045
   StartUpPosition =   3  'Windows Default
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
      BuddyDispid     =   196611
      OrigLeft        =   5760
      OrigTop         =   480
      OrigRight       =   6015
      OrigBottom      =   975
      Min             =   1
      SyncBuddy       =   -1  'True
      BuddyProperty   =   0
      Enabled         =   -1  'True
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
Dim WithEvents EasyTEF As EasyTEF.EasyTEFDiscado
Attribute EasyTEF.VB_VarHelpID = -1

Private TotalDescontoCielo As Double
Private TotalSaqueCielo As Double
Private BufferTransacoesTEF() As String


Private Sub CarregarEasyTEF()
Dim f As New StdFont
Dim ini As String

    f.Name = "Tahoma"
    f.Size = 9
    ini = App.Path & "\exemplo.ini"
    
    Set EasyTEF = New EasyTEF.EasyTEFDiscado
    
    EasyTEF.ImpressaoNaoFiscal = True
    
    EasyTEF.Gerenciador = tgGerenciadorPadrao
    EasyTEF.FormMsgOperador.Fonte = f
    EasyTEF.FormMsgOperador.Altura = 110
    EasyTEF.FormMsgOperador.Largura = 400
    EasyTEF.FormMsgOperador.BotaoOK.Altura = 25
    EasyTEF.FormMsgOperador.BotaoOK.Largura = 75
    EasyTEF.ContraSenha = ReadINI(ini, "TEF", "contraSenhaDisc", "")
    EasyTEF.AutoAtivarGerenciador = True
    'se usar tef dedicado D-TEF, com Client D-TEF, setar True
    EasyTEF.UsarDTEF = ReadINI(ini, "TEF", "usarDTEF", "0")
    EasyTEF.Somente1RelGerencial = True
    ' configurações para Cielo Premia
    EasyTEF.CieloPremia.RazaoSocialSW = "Razão Social da Software House"
    EasyTEF.CieloPremia.VersaoSW = "Nome da Automação e Versão"
    EasyTEF.CieloPremia.Tipo = tcpAmbas
    
    If Not EasyTEF.AutoVerificarTEF Then
        EasyTEF.AutoVerificarTEF = True
    End If
End Sub

Public Function TratarPagamentoComCartoes(Valores As Variant) As Boolean
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
            
            Call EasyTEF.PagarNoCartao(valorCartao, tmReal, PegarValor, _
                i = 1, i = EasyTEF.NumeroDeCartoes, "TEF")
            
            resultado = EasyTEF.TransacaoAprovada
            If Not EasyTEF.TransacaoAprovada Then
                MsgBox "Não foi possível finalizar com sucesso o pagamento com cartão", _
                    vbCritical
                Exit For
            Else
                TotalDescontoCielo = TotalDescontoCielo + EasyTEF.ValorCampo709_000
                TotalSaqueCielo = TotalSaqueCielo + EasyTEF.ValorCampo708_000
                ReDim Preserve BufferTransacoesTEF(UBound(BufferTransacoesTEF))
                ' nome da rede + NSU + finalização
                BufferTransacoesTEF(UBound(BufferTransacoesTEF)) = EasyTEF.ValorCampo010_000 & ";" _
                    & EasyTEF.ValorCampo012_000 & ";" & EasyTEF.ValorCampo027_000
            End If
            
        Next i
        
    End If
    
    TratarPagamentoComCartoes = resultado
End Function


Private Sub EmitirSatOuNFCe()
  ' este método representa o método de seu sistema que gera e transmite
  ' o SAT ou NFC-e

End Sub

Private Sub cmdAdmTEF_Click()
    Screen.MousePointer = vbHourglass
    
    EasyTEF.ImprimirComprovante = True
    Call EasyTEF.FazerRequisicaoAdministrativa
    
    Screen.MousePointer = vbDefault

End Sub

Private Sub cmdPagar_Click()
    Dim i As Integer
    Dim CountCartoes As Integer
    Dim Cartoes() As Variant
    
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
            
            Call EasyTEF.ConfirmacaoVendaImpressaoCupom( _
              EasyTEF.ValorCampo010_000, EasyTEF.ValorCampo012_000, _
              EasyTEF.ValorCampo027_000, EasyTEF.ValorCampo002_000)
              
        Else
            Call EasyTEF.CancelarVendasPendentes
        End If
        
        Call EasyTEF.FinalizarTransacaoTEF
        TotalDescontoCielo = 0
        TotalSaqueCielo = 0
    End If
    
    ReDim bufferInfoTransacoesTEF(0)

End Sub

Private Function PegarValor() As Double
    Randomize
    PegarValor = (Int(Rnd * 10000) + 1) / 100
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

Private Sub EasyTEF_OnGerarIdentificador(identificacao As Long)
    Randomize
    identificacao = Int(Rnd * 1000) + 1
End Sub

Private Sub EasyTEF_OnImpressaoNaoFiscal(ByVal ImagemCupomTEF As Variant, ImpressaoOK As Boolean)
    
    Call ImprimirCupomEmSuaImpressoraNaoFiscal(ImagemCupomTEF)
    
    ImpressaoOK = MsgBox("A impressão foi efetuada totalmente com sucesso?", _
        vbYesNo + vbQuestion, "Impressão") = vbYes
        
End Sub

Private Sub Form_Load()
    Call CarregarEasyTEF
    ReDim BufferTransacoesTEF(1)
End Sub
