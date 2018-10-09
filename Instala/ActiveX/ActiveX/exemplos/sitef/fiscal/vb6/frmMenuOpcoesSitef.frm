VERSION 5.00
Begin VB.Form frmMenuOpcoesSitef 
   Caption         =   "Form1"
   ClientHeight    =   3990
   ClientLeft      =   60
   ClientTop       =   450
   ClientWidth     =   8670
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
   ScaleHeight     =   3990
   ScaleWidth      =   8670
   StartUpPosition =   1  'CenterOwner
   Begin VB.CommandButton btnFechar 
      Caption         =   "&Fechar"
      Height          =   375
      Left            =   7200
      TabIndex        =   4
      Top             =   3480
      Width           =   1335
   End
   Begin VB.CommandButton btnOK 
      Caption         =   "&OK"
      Default         =   -1  'True
      Height          =   375
      Left            =   5760
      TabIndex        =   3
      Top             =   3480
      Width           =   1335
   End
   Begin VB.CommandButton btnTelaAnterior 
      Caption         =   "&Tela Anterior"
      Height          =   375
      Left            =   4320
      TabIndex        =   2
      Top             =   3480
      Width           =   1335
   End
   Begin VB.Frame Frame1 
      Caption         =   "O&pções"
      Height          =   3255
      Left            =   120
      TabIndex        =   0
      Top             =   120
      Width           =   8415
      Begin VB.OptionButton Option1 
         Caption         =   "Option1"
         BeginProperty Font 
            Name            =   "Tahoma"
            Size            =   9.75
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   375
         Index           =   0
         Left            =   120
         TabIndex        =   1
         Top             =   240
         Visible         =   0   'False
         Width           =   1575
      End
   End
End
Attribute VB_Name = "frmMenuOpcoesSitef"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Public opcao As String
Public Result As VbMsgBoxResult


Public Sub CarregarMenuOpcoesSitef(ByVal Menu As Variant)
    Const Linhas = 5
    Const Colunas = 2
    Dim i, coluna, tamanho, Indice As Integer
        
    coluna = 0
    tamanho = Int(Frame1.Width / Colunas)
    For i = LBound(Menu) To UBound(Menu)
        Indice = i + 1
        Load Option1(Indice)
        Option1(Indice).Width = tamanho
        If coluna = 0 Then
            Option1(Indice).Left = Option1(0).Left
            If i = 0 Then
                Option1(Indice).Top = Option1(0).Top
            Else
                Option1(Indice).Top = Option1(Indice - 1).Top + Option1(Indice - 1).Height + 100
            End If
            
        Else
            Option1(Indice).Left = tamanho * coluna + 200
            Option1(Indice).Top = Option1(Indice - Linhas).Top
        End If
        
        If i <> 0 And Indice Mod 5 = 0 Then
            coluna = coluna + 1
        End If
        Option1(Indice).Caption = Menu(i)
        Option1(Indice).Visible = True
    Next i
End Sub

Private Sub btnFechar_Click()
    Result = vbCancel
    Unload Me
End Sub

Private Sub btnOK_Click()
    If opcao = "" Then
        MsgBox "Por favor, escolha uma das opções antes de fechar a tela.", vbExclamation
        Exit Sub
    End If
    Result = vbOK
    Unload Me
End Sub

Private Sub btnTelaAnterior_Click()
    Result = vbRetry
    Unload Me
End Sub

Private Sub Form_Activate()
    If Visible Then
        Call Option1(1).SetFocus
    End If
End Sub

Private Sub Form_Load()
    opcao = ""
End Sub

Private Sub Option1_Click(Index As Integer)
    opcao = Option1(Index).Caption
End Sub
