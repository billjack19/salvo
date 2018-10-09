Public Class ValoresFrm
    Private InternalValorMinimo As Integer = 0

    Public Property ValorMinimo As Integer
        Get
            Return InternalValorMinimo
        End Get
        Set(ByVal value As Integer)
            InternalValorMinimo = value
        End Set
    End Property

    Public Property ValorMaximo As Integer
        Get
            Return txtValor.MaxLength
        End Get
        Set(ByVal value As Integer)
            txtValor.MaxLength = value
        End Set
    End Property

    Public WriteOnly Property LigarModoSenha As Boolean
        Set(ByVal value As Boolean)
            If (value) Then
                txtValor.PasswordChar = "*"
            Else
                txtValor.PasswordChar = ""
            End If
        End Set
    End Property

    Public Sub EscreverMensagem(ByVal Msg As String)
        lblMsg.Text = Msg
    End Sub

    Public ReadOnly Property DadoLido As String
        Get
            Return txtValor.Text
        End Get
    End Property

    Private Sub btnTelaAnterior_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnTelaAnterior.Click
        Me.DialogResult = Windows.Forms.DialogResult.Retry
        Me.Close()
    End Sub

    Private Sub btnOK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnOK.Click
        If (txtValor.Text <> "" And txtValor.Text.Length < InternalValorMinimo) Then
            txtValor.Focus()
            MessageBox.Show("Por favor, preencha corretamente o campo,",
                    "Preenchimento", MessageBoxButtons.OK, MessageBoxIcon.Warning)
        Else
            Me.DialogResult = Windows.Forms.DialogResult.OK
            Me.Close()
        End If
    End Sub

    Private Sub btnFechar_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnFechar.Click
        Me.DialogResult = Windows.Forms.DialogResult.Cancel
        Me.Close()
    End Sub

    Private Sub btnFechar_KeyUp(ByVal sender As System.Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles btnFechar.KeyUp
        If (e.KeyCode = Keys.Escape) Then
            Me.DialogResult = Windows.Forms.DialogResult.Cancel
            Me.Close()
        End If
    End Sub
End Class