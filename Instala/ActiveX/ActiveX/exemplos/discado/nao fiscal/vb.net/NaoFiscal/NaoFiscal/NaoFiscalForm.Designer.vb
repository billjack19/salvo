<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class NaoFiscalForm
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.btnAdmTEF = New System.Windows.Forms.Button()
        Me.btnPagarComCartao = New System.Windows.Forms.Button()
        Me.label1 = New System.Windows.Forms.Label()
        Me.upDown = New System.Windows.Forms.NumericUpDown()
        CType(Me.upDown, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'btnAdmTEF
        '
        Me.btnAdmTEF.Location = New System.Drawing.Point(18, 134)
        Me.btnAdmTEF.Name = "btnAdmTEF"
        Me.btnAdmTEF.Size = New System.Drawing.Size(389, 46)
        Me.btnAdmTEF.TabIndex = 7
        Me.btnAdmTEF.Text = "Administração TEF"
        Me.btnAdmTEF.UseVisualStyleBackColor = True
        '
        'btnPagarComCartao
        '
        Me.btnPagarComCartao.Location = New System.Drawing.Point(18, 82)
        Me.btnPagarComCartao.Name = "btnPagarComCartao"
        Me.btnPagarComCartao.Size = New System.Drawing.Size(389, 46)
        Me.btnPagarComCartao.TabIndex = 6
        Me.btnPagarComCartao.Text = "Pagar com cartão (ões)"
        Me.btnPagarComCartao.UseVisualStyleBackColor = True
        '
        'label1
        '
        Me.label1.AutoSize = True
        Me.label1.Location = New System.Drawing.Point(12, 17)
        Me.label1.Name = "label1"
        Me.label1.Size = New System.Drawing.Size(286, 33)
        Me.label1.TabIndex = 5
        Me.label1.Text = "Quantidade de Cartões"
        '
        'upDown
        '
        Me.upDown.Location = New System.Drawing.Point(323, 10)
        Me.upDown.Maximum = New Decimal(New Integer() {10, 0, 0, 0})
        Me.upDown.Minimum = New Decimal(New Integer() {1, 0, 0, 0})
        Me.upDown.Name = "upDown"
        Me.upDown.Size = New System.Drawing.Size(84, 40)
        Me.upDown.TabIndex = 4
        Me.upDown.Value = New Decimal(New Integer() {1, 0, 0, 0})
        '
        'NaoFiscalForm
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(15.0!, 33.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(419, 191)
        Me.Controls.Add(Me.btnAdmTEF)
        Me.Controls.Add(Me.btnPagarComCartao)
        Me.Controls.Add(Me.label1)
        Me.Controls.Add(Me.upDown)
        Me.Font = New System.Drawing.Font("Tahoma", 20.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Margin = New System.Windows.Forms.Padding(8)
        Me.Name = "NaoFiscalForm"
        Me.Text = "Impressão Não Fiscal"
        CType(Me.upDown, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Private WithEvents btnAdmTEF As System.Windows.Forms.Button
    Private WithEvents btnPagarComCartao As System.Windows.Forms.Button
    Private WithEvents label1 As System.Windows.Forms.Label
    Private WithEvents upDown As System.Windows.Forms.NumericUpDown

End Class
