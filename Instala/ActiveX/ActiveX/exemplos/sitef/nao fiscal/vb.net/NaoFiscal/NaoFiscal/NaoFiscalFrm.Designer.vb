<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class NaoFiscalFrm
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
        Me.Label1 = New System.Windows.Forms.Label()
        Me.txtQtdCartoes = New System.Windows.Forms.NumericUpDown()
        Me.btnImpressaoNaoFiscal = New System.Windows.Forms.Button()
        Me.btnAdmTEF = New System.Windows.Forms.Button()
        Me.btnCancelarFluxo = New System.Windows.Forms.Button()
        Me.lblMsgSiTef = New System.Windows.Forms.Label()
        CType(Me.txtQtdCartoes, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Location = New System.Drawing.Point(75, 9)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(227, 25)
        Me.Label1.TabIndex = 0
        Me.Label1.Text = "Quantidade de Cartões"
        '
        'txtQtdCartoes
        '
        Me.txtQtdCartoes.Location = New System.Drawing.Point(308, 7)
        Me.txtQtdCartoes.Minimum = New Decimal(New Integer() {1, 0, 0, 0})
        Me.txtQtdCartoes.Name = "txtQtdCartoes"
        Me.txtQtdCartoes.Size = New System.Drawing.Size(64, 33)
        Me.txtQtdCartoes.TabIndex = 3
        Me.txtQtdCartoes.Value = New Decimal(New Integer() {1, 0, 0, 0})
        '
        'btnImpressaoNaoFiscal
        '
        Me.btnImpressaoNaoFiscal.Location = New System.Drawing.Point(17, 46)
        Me.btnImpressaoNaoFiscal.Name = "btnImpressaoNaoFiscal"
        Me.btnImpressaoNaoFiscal.Size = New System.Drawing.Size(355, 55)
        Me.btnImpressaoNaoFiscal.TabIndex = 4
        Me.btnImpressaoNaoFiscal.Text = "Pagar com Cartão(ões)"
        Me.btnImpressaoNaoFiscal.UseVisualStyleBackColor = True
        '
        'btnAdmTEF
        '
        Me.btnAdmTEF.Location = New System.Drawing.Point(17, 107)
        Me.btnAdmTEF.Name = "btnAdmTEF"
        Me.btnAdmTEF.Size = New System.Drawing.Size(355, 55)
        Me.btnAdmTEF.TabIndex = 5
        Me.btnAdmTEF.Text = "Administração TEF"
        Me.btnAdmTEF.UseVisualStyleBackColor = True
        '
        'btnCancelarFluxo
        '
        Me.btnCancelarFluxo.Location = New System.Drawing.Point(17, 194)
        Me.btnCancelarFluxo.Name = "btnCancelarFluxo"
        Me.btnCancelarFluxo.Size = New System.Drawing.Size(355, 55)
        Me.btnCancelarFluxo.TabIndex = 6
        Me.btnCancelarFluxo.Text = "Cancelar Fluxo"
        Me.btnCancelarFluxo.UseVisualStyleBackColor = True
        '
        'lblMsgSiTef
        '
        Me.lblMsgSiTef.Location = New System.Drawing.Point(12, 166)
        Me.lblMsgSiTef.Name = "lblMsgSiTef"
        Me.lblMsgSiTef.Size = New System.Drawing.Size(360, 25)
        Me.lblMsgSiTef.TabIndex = 7
        '
        'NaoFiscalFrm
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(12.0!, 25.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(384, 261)
        Me.Controls.Add(Me.lblMsgSiTef)
        Me.Controls.Add(Me.btnCancelarFluxo)
        Me.Controls.Add(Me.btnAdmTEF)
        Me.Controls.Add(Me.btnImpressaoNaoFiscal)
        Me.Controls.Add(Me.txtQtdCartoes)
        Me.Controls.Add(Me.Label1)
        Me.Font = New System.Drawing.Font("Tahoma", 15.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Margin = New System.Windows.Forms.Padding(6)
        Me.Name = "NaoFiscalFrm"
        Me.Text = "Exemplo Não Fiscal"
        CType(Me.txtQtdCartoes, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents txtQtdCartoes As System.Windows.Forms.NumericUpDown
    Friend WithEvents btnImpressaoNaoFiscal As System.Windows.Forms.Button
    Friend WithEvents btnAdmTEF As System.Windows.Forms.Button
    Friend WithEvents btnCancelarFluxo As System.Windows.Forms.Button
    Friend WithEvents lblMsgSiTef As System.Windows.Forms.Label

End Class
