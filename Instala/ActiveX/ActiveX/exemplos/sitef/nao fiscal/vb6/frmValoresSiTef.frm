VERSION 5.00
Begin VB.Form frmValoresSiTef 
   BorderStyle     =   3  'Fixed Dialog
   ClientHeight    =   2190
   ClientLeft      =   45
   ClientTop       =   435
   ClientWidth     =   4590
   BeginProperty Font 
      Name            =   "Tahoma"
      Size            =   9
      Charset         =   0
      Weight          =   400
      Underline       =   0   'False
      Italic          =   0   'False
      Strikethrough   =   0   'False
   EndProperty
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   2190
   ScaleWidth      =   4590
   ShowInTaskbar   =   0   'False
   StartUpPosition =   1  'CenterOwner
   Begin VB.CommandButton btnTelaAnterior 
      Caption         =   "&Tela Anterior"
      Height          =   375
      Left            =   240
      TabIndex        =   4
      Top             =   1680
      Width           =   1335
   End
   Begin VB.CommandButton btnOK 
      Caption         =   "&OK"
      Default         =   -1  'True
      Height          =   375
      Left            =   1680
      TabIndex        =   3
      Top             =   1680
      Width           =   1335
   End
   Begin VB.CommandButton btnFechar 
      Caption         =   "&Fechar"
      Height          =   375
      Left            =   3120
      TabIndex        =   2
      Top             =   1680
      Width           =   1335
   End
   Begin VB.TextBox edtValor 
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   9.75
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   405
      Left            =   120
      TabIndex        =   1
      Top             =   960
      Width           =   4335
   End
   Begin VB.Label lblMsg 
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   9.75
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   120
      TabIndex        =   0
      Top             =   120
      Width           =   4335
      WordWrap        =   -1  'True
   End
End
Attribute VB_Name = "frmValoresSiTef"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Public Result As VbMsgBoxResult
Public TamanhoMinimo As Integer
Public ValorDigitado As String


Private Sub btnFechar_Click()
    Result = vbCancel
    Unload Me
End Sub

Private Sub btnOK_Click()
    If (Len(edtValor.Text) < TamanhoMinimo) And (edtValor.Text <> "") Then
        edtValor.SetFocus
        MsgBox "Por favor, preencha o campo corretamente.", vbCritical
        Exit Sub
    End If
    ValorDigitado = edtValor.Text
    Result = vbOK
    Unload Me
End Sub

Private Sub btnTelaAnterior_Click()
    Result = vbRetry
    Unload Me
End Sub

Private Sub Form_Load()
    edtValor.Text = ""
End Sub
