Public Class MenuOperadorFrm
    Private InternalMenuOpcoes As Object()
    Private InternalGroupOpcoes As RadioButton()
    Private InternalOpcao As String
    Private InternalCountOpcoes As Integer = 0

    Public WriteOnly Property MenuOpcoes As Object
        Set(ByVal value As Object)
            InternalMenuOpcoes = value
            ReDim InternalGroupOpcoes(UBound(value))
            ' For I As Integer = LBound(value) To UBound(value)
            ' InternalMenuOpcoes(I) = value(I)
            ' Next
        End Set
    End Property

    Public ReadOnly Property GrupoOpcoes As RadioButton()
        Get
            Return InternalMenuOpcoes
        End Get
    End Property

    Public ReadOnly Property Opcao As String
        Get
            Return InternalOpcao
        End Get
    End Property

    Public ReadOnly Property Grupo As GroupBox
        Get
            Return Me.gbOpcoes
        End Get
    End Property

    Private Function PodeFechar() As Boolean

        Dim AlgumMarcado As Boolean = False

        For I As Integer = LBound(InternalGroupOpcoes) To UBound(InternalGroupOpcoes)
            AlgumMarcado = InternalGroupOpcoes(I).Checked

            If (AlgumMarcado) Then
                InternalOpcao = InternalGroupOpcoes(I).Text
                Exit For
            End If
        Next

        If Not AlgumMarcado Then
            MsgBox("Por favor, escolha uma das opções.")
            Return False
        End If

        InternalOpcao = InternalOpcao.Replace("&", "")

        Return True

    End Function


    Private Sub MenuOperadorFrm_KeyUp(ByVal sender As System.Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles MyBase.KeyUp
        If (e.KeyCode = Keys.Enter) Then
            If (PodeFechar()) Then
                Me.DialogResult = Windows.Forms.DialogResult.OK
                Me.Close()
            End If
        ElseIf (e.KeyCode = Keys.Escape) Then
            Me.DialogResult = Windows.Forms.DialogResult.Cancel
            Me.Close()
        End If
    End Sub

    Private Sub btnTelaAnterior_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnTelaAnterior.Click
        Me.DialogResult = Windows.Forms.DialogResult.Retry
        Me.Close()
    End Sub

    Private Sub MenuOperadorFrm_Shown(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Shown
        If IsArray(InternalMenuOpcoes) Then
            For I As Integer = LBound(InternalMenuOpcoes) To UBound(InternalMenuOpcoes)
                InternalGroupOpcoes(I) = New RadioButton()
                InternalGroupOpcoes(I).AutoSize = True
                InternalGroupOpcoes(I).Text = "&" + Convert.ToString(InternalMenuOpcoes(I))
                InternalGroupOpcoes(I).Location = New System.Drawing.Point(10, 15 + I * 20)
                gbOpcoes.Controls.Add(InternalGroupOpcoes(I))
            Next
        End If
    End Sub

    Private Sub btnOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOK.Click
        If (PodeFechar()) Then
            Me.DialogResult = Windows.Forms.DialogResult.OK
            Me.Close()
        End If
    End Sub

    Private Sub btnFechar_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnFechar.Click
        Me.DialogResult = Windows.Forms.DialogResult.Cancel
        Me.Close()
    End Sub

End Class