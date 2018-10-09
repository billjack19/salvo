<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class ValoresFrm
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
        Me.btnFechar = New System.Windows.Forms.Button()
        Me.btnOK = New System.Windows.Forms.Button()
        Me.btnTelaAnterior = New System.Windows.Forms.Button()
        Me.txtValor = New System.Windows.Forms.TextBox()
        Me.lblMsg = New System.Windows.Forms.Label()
        Me.SuspendLayout()
        '
        'btnFechar
        '
        Me.btnFechar.DialogResult = System.Windows.Forms.DialogResult.Cancel
        Me.btnFechar.Location = New System.Drawing.Point(237, 88)
        Me.btnFechar.Name = "btnFechar"
        Me.btnFechar.Size = New System.Drawing.Size(75, 23)
        Me.btnFechar.TabIndex = 9
        Me.btnFechar.Text = "&Fechar"
        Me.btnFechar.UseVisualStyleBackColor = True
        '
        'btnOK
        '
        Me.btnOK.Location = New System.Drawing.Point(156, 88)
        Me.btnOK.Name = "btnOK"
        Me.btnOK.Size = New System.Drawing.Size(75, 23)
        Me.btnOK.TabIndex = 8
        Me.btnOK.Text = "&OK"
        Me.btnOK.UseVisualStyleBackColor = True
        '
        'btnTelaAnterior
        '
        Me.btnTelaAnterior.Location = New System.Drawing.Point(15, 88)
        Me.btnTelaAnterior.Name = "btnTelaAnterior"
        Me.btnTelaAnterior.Size = New System.Drawing.Size(135, 23)
        Me.btnTelaAnterior.TabIndex = 7
        Me.btnTelaAnterior.Text = "&Tela Anterior"
        Me.btnTelaAnterior.UseVisualStyleBackColor = True
        '
        'txtValor
        '
        Me.txtValor.Location = New System.Drawing.Point(12, 36)
        Me.txtValor.Name = "txtValor"
        Me.txtValor.Size = New System.Drawing.Size(300, 22)
        Me.txtValor.TabIndex = 6
        '
        'lblMsg
        '
        Me.lblMsg.AccessibleName = "lblMsg"
        Me.lblMsg.AutoSize = True
        Me.lblMsg.Location = New System.Drawing.Point(12, 10)
        Me.lblMsg.Name = "lblMsg"
        Me.lblMsg.Size = New System.Drawing.Size(0, 14)
        Me.lblMsg.TabIndex = 5
        '
        'ValoresFrm
        '
        Me.AcceptButton = Me.btnOK
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 14.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(324, 121)
        Me.Controls.Add(Me.btnFechar)
        Me.Controls.Add(Me.btnOK)
        Me.Controls.Add(Me.btnTelaAnterior)
        Me.Controls.Add(Me.txtValor)
        Me.Controls.Add(Me.lblMsg)
        Me.Font = New System.Drawing.Font("Tahoma", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.KeyPreview = True
        Me.Name = "ValoresFrm"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "Valores"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Private WithEvents btnFechar As System.Windows.Forms.Button
    Private WithEvents btnOK As System.Windows.Forms.Button
    Private WithEvents btnTelaAnterior As System.Windows.Forms.Button
    Private WithEvents txtValor As System.Windows.Forms.TextBox
    Private WithEvents lblMsg As System.Windows.Forms.Label
End Class
