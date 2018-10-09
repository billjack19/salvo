<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class MenuOperadorFrm
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
        Me.gbOpcoes = New System.Windows.Forms.GroupBox()
        Me.SuspendLayout()
        '
        'btnFechar
        '
        Me.btnFechar.DialogResult = System.Windows.Forms.DialogResult.Cancel
        Me.btnFechar.Location = New System.Drawing.Point(322, 246)
        Me.btnFechar.Name = "btnFechar"
        Me.btnFechar.Size = New System.Drawing.Size(75, 23)
        Me.btnFechar.TabIndex = 10
        Me.btnFechar.Text = "&Fechar"
        Me.btnFechar.UseVisualStyleBackColor = True
        '
        'btnOK
        '
        Me.btnOK.Location = New System.Drawing.Point(241, 246)
        Me.btnOK.Name = "btnOK"
        Me.btnOK.Size = New System.Drawing.Size(75, 23)
        Me.btnOK.TabIndex = 9
        Me.btnOK.Text = "&OK"
        Me.btnOK.UseVisualStyleBackColor = True
        '
        'btnTelaAnterior
        '
        Me.btnTelaAnterior.AccessibleRole = System.Windows.Forms.AccessibleRole.None
        Me.btnTelaAnterior.Location = New System.Drawing.Point(107, 246)
        Me.btnTelaAnterior.Name = "btnTelaAnterior"
        Me.btnTelaAnterior.Size = New System.Drawing.Size(128, 23)
        Me.btnTelaAnterior.TabIndex = 8
        Me.btnTelaAnterior.Text = "&Tela Anterior"
        Me.btnTelaAnterior.UseVisualStyleBackColor = True
        '
        'gbOpcoes
        '
        Me.gbOpcoes.AccessibleName = "gbOpcoes"
        Me.gbOpcoes.Location = New System.Drawing.Point(12, 12)
        Me.gbOpcoes.Name = "gbOpcoes"
        Me.gbOpcoes.Size = New System.Drawing.Size(385, 226)
        Me.gbOpcoes.TabIndex = 7
        Me.gbOpcoes.TabStop = False
        Me.gbOpcoes.Text = "Opções"
        '
        'MenuOperadorFrm
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 14.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(409, 281)
        Me.Controls.Add(Me.btnFechar)
        Me.Controls.Add(Me.btnOK)
        Me.Controls.Add(Me.btnTelaAnterior)
        Me.Controls.Add(Me.gbOpcoes)
        Me.Font = New System.Drawing.Font("Tahoma", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.KeyPreview = True
        Me.Name = "MenuOperadorFrm"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent
        Me.Text = "MenuOperadorFrm"
        Me.ResumeLayout(False)

    End Sub
    Private WithEvents btnFechar As System.Windows.Forms.Button
    Private WithEvents btnOK As System.Windows.Forms.Button
    Private WithEvents btnTelaAnterior As System.Windows.Forms.Button
    Private WithEvents gbOpcoes As System.Windows.Forms.GroupBox
End Class
