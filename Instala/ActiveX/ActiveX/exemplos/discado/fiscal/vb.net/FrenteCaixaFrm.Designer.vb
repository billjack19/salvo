<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class FrenteCaixaFrm
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
        Me.groupBox4 = New System.Windows.Forms.GroupBox()
        Me.edtValorDesconto = New System.Windows.Forms.TextBox()
        Me.label5 = New System.Windows.Forms.Label()
        Me.rbtValorDesconto = New System.Windows.Forms.RadioButton()
        Me.rbtPercentual = New System.Windows.Forms.RadioButton()
        Me.btnFechar = New System.Windows.Forms.Button()
        Me.btnAdicionarItem = New System.Windows.Forms.Button()
        Me.groupBox5 = New System.Windows.Forms.GroupBox()
        Me.edtValorUnit = New System.Windows.Forms.TextBox()
        Me.label6 = New System.Windows.Forms.Label()
        Me.rbt3Casas = New System.Windows.Forms.RadioButton()
        Me.rbt2Casas = New System.Windows.Forms.RadioButton()
        Me.groupBox3 = New System.Windows.Forms.GroupBox()
        Me.edtQtde = New System.Windows.Forms.TextBox()
        Me.label4 = New System.Windows.Forms.Label()
        Me.rbtFracionaria = New System.Windows.Forms.RadioButton()
        Me.rbtInteira = New System.Windows.Forms.RadioButton()
        Me.btnEncerrarVenda = New System.Windows.Forms.Button()
        Me.btnCancelarItem = New System.Windows.Forms.Button()
        Me.groupBox1 = New System.Windows.Forms.GroupBox()
        Me.edtAliquota = New System.Windows.Forms.TextBox()
        Me.edtDescricao = New System.Windows.Forms.TextBox()
        Me.edtCodigo = New System.Windows.Forms.TextBox()
        Me.label3 = New System.Windows.Forms.Label()
        Me.label2 = New System.Windows.Forms.Label()
        Me.label1 = New System.Windows.Forms.Label()
        Me.btnCancelarVenda = New System.Windows.Forms.Button()
        Me.btnNovo = New System.Windows.Forms.Button()
        Me.btnAdm = New System.Windows.Forms.Button()
        Me.groupBox2 = New System.Windows.Forms.GroupBox()
        Me.rbtSweda = New System.Windows.Forms.RadioButton()
        Me.rbtBematech = New System.Windows.Forms.RadioButton()
        Me.groupBox6 = New System.Windows.Forms.GroupBox()
        Me.lblCartao3 = New System.Windows.Forms.Label()
        Me.edtValorCartao3 = New System.Windows.Forms.TextBox()
        Me.lblCartao2 = New System.Windows.Forms.Label()
        Me.edtValorCartao2 = New System.Windows.Forms.TextBox()
        Me.lblCartao1 = New System.Windows.Forms.Label()
        Me.lblCheque = New System.Windows.Forms.Label()
        Me.lblDinheiro = New System.Windows.Forms.Label()
        Me.edtValorCartao1 = New System.Windows.Forms.TextBox()
        Me.groupBox8 = New System.Windows.Forms.GroupBox()
        Me.chkConsultaSerasa = New System.Windows.Forms.CheckBox()
        Me.edtValorCheque = New System.Windows.Forms.TextBox()
        Me.groupBox7 = New System.Windows.Forms.GroupBox()
        Me.edtValorDinheiro = New System.Windows.Forms.TextBox()
        Me.mmoCupomFiscal = New System.Windows.Forms.TextBox()
        Me.groupBox4.SuspendLayout()
        Me.groupBox5.SuspendLayout()
        Me.groupBox3.SuspendLayout()
        Me.groupBox1.SuspendLayout()
        Me.groupBox6.SuspendLayout()
        Me.SuspendLayout()
        '
        'groupBox4
        '
        Me.groupBox4.Controls.Add(Me.edtValorDesconto)
        Me.groupBox4.Controls.Add(Me.label5)
        Me.groupBox4.Controls.Add(Me.rbtValorDesconto)
        Me.groupBox4.Controls.Add(Me.rbtPercentual)
        Me.groupBox4.Location = New System.Drawing.Point(122, 94)
        Me.groupBox4.Name = "groupBox4"
        Me.groupBox4.Size = New System.Drawing.Size(122, 100)
        Me.groupBox4.TabIndex = 7
        Me.groupBox4.TabStop = False
        Me.groupBox4.Text = "Desconto"
        '
        'edtValorDesconto
        '
        Me.edtValorDesconto.Location = New System.Drawing.Point(49, 68)
        Me.edtValorDesconto.Name = "edtValorDesconto"
        Me.edtValorDesconto.Size = New System.Drawing.Size(48, 22)
        Me.edtValorDesconto.TabIndex = 7
        Me.edtValorDesconto.Text = "0"
        '
        'label5
        '
        Me.label5.AutoSize = True
        Me.label5.Location = New System.Drawing.Point(6, 71)
        Me.label5.Name = "label5"
        Me.label5.Size = New System.Drawing.Size(35, 14)
        Me.label5.TabIndex = 6
        Me.label5.Text = "Qtde"
        '
        'rbtValorDesconto
        '
        Me.rbtValorDesconto.AutoSize = True
        Me.rbtValorDesconto.Location = New System.Drawing.Point(9, 45)
        Me.rbtValorDesconto.Name = "rbtValorDesconto"
        Me.rbtValorDesconto.Size = New System.Drawing.Size(74, 18)
        Me.rbtValorDesconto.TabIndex = 5
        Me.rbtValorDesconto.TabStop = True
        Me.rbtValorDesconto.Text = "Por Valor"
        Me.rbtValorDesconto.UseVisualStyleBackColor = True
        '
        'rbtPercentual
        '
        Me.rbtPercentual.AutoSize = True
        Me.rbtPercentual.Checked = True
        Me.rbtPercentual.Location = New System.Drawing.Point(9, 21)
        Me.rbtPercentual.Name = "rbtPercentual"
        Me.rbtPercentual.Size = New System.Drawing.Size(105, 18)
        Me.rbtPercentual.TabIndex = 4
        Me.rbtPercentual.TabStop = True
        Me.rbtPercentual.Text = "Por Percentual"
        Me.rbtPercentual.UseVisualStyleBackColor = True
        '
        'btnFechar
        '
        Me.btnFechar.Location = New System.Drawing.Point(542, 410)
        Me.btnFechar.Name = "btnFechar"
        Me.btnFechar.Size = New System.Drawing.Size(83, 23)
        Me.btnFechar.TabIndex = 18
        Me.btnFechar.Text = "&Fechar"
        Me.btnFechar.UseVisualStyleBackColor = True
        '
        'btnAdicionarItem
        '
        Me.btnAdicionarItem.Enabled = False
        Me.btnAdicionarItem.Location = New System.Drawing.Point(13, 313)
        Me.btnAdicionarItem.Name = "btnAdicionarItem"
        Me.btnAdicionarItem.Size = New System.Drawing.Size(231, 23)
        Me.btnAdicionarItem.TabIndex = 9
        Me.btnAdicionarItem.Text = "Adicionar Ítem ao Cupom [F3]"
        Me.btnAdicionarItem.UseVisualStyleBackColor = True
        '
        'groupBox5
        '
        Me.groupBox5.Controls.Add(Me.edtValorUnit)
        Me.groupBox5.Controls.Add(Me.label6)
        Me.groupBox5.Controls.Add(Me.rbt3Casas)
        Me.groupBox5.Controls.Add(Me.rbt2Casas)
        Me.groupBox5.Location = New System.Drawing.Point(9, 200)
        Me.groupBox5.Name = "groupBox5"
        Me.groupBox5.Size = New System.Drawing.Size(235, 100)
        Me.groupBox5.TabIndex = 8
        Me.groupBox5.TabStop = False
        Me.groupBox5.Text = "Valor Unitário"
        '
        'edtValorUnit
        '
        Me.edtValorUnit.Location = New System.Drawing.Point(46, 65)
        Me.edtValorUnit.Name = "edtValorUnit"
        Me.edtValorUnit.Size = New System.Drawing.Size(48, 22)
        Me.edtValorUnit.TabIndex = 7
        Me.edtValorUnit.Text = "20,00"
        '
        'label6
        '
        Me.label6.AutoSize = True
        Me.label6.Location = New System.Drawing.Point(3, 68)
        Me.label6.Name = "label6"
        Me.label6.Size = New System.Drawing.Size(35, 14)
        Me.label6.TabIndex = 6
        Me.label6.Text = "Qtde"
        '
        'rbt3Casas
        '
        Me.rbt3Casas.AutoSize = True
        Me.rbt3Casas.Location = New System.Drawing.Point(6, 42)
        Me.rbt3Casas.Name = "rbt3Casas"
        Me.rbt3Casas.Size = New System.Drawing.Size(115, 18)
        Me.rbt3Casas.TabIndex = 5
        Me.rbt3Casas.TabStop = True
        Me.rbt3Casas.Text = "3 Casas Decimais"
        Me.rbt3Casas.UseVisualStyleBackColor = True
        '
        'rbt2Casas
        '
        Me.rbt2Casas.AutoSize = True
        Me.rbt2Casas.Checked = True
        Me.rbt2Casas.Location = New System.Drawing.Point(6, 18)
        Me.rbt2Casas.Name = "rbt2Casas"
        Me.rbt2Casas.Size = New System.Drawing.Size(115, 18)
        Me.rbt2Casas.TabIndex = 4
        Me.rbt2Casas.TabStop = True
        Me.rbt2Casas.Text = "2 Casas Decimais"
        Me.rbt2Casas.UseVisualStyleBackColor = True
        '
        'groupBox3
        '
        Me.groupBox3.Controls.Add(Me.edtQtde)
        Me.groupBox3.Controls.Add(Me.label4)
        Me.groupBox3.Controls.Add(Me.rbtFracionaria)
        Me.groupBox3.Controls.Add(Me.rbtInteira)
        Me.groupBox3.Location = New System.Drawing.Point(9, 94)
        Me.groupBox3.Name = "groupBox3"
        Me.groupBox3.Size = New System.Drawing.Size(100, 100)
        Me.groupBox3.TabIndex = 6
        Me.groupBox3.TabStop = False
        Me.groupBox3.Text = "Quantidade"
        '
        'edtQtde
        '
        Me.edtQtde.Location = New System.Drawing.Point(46, 68)
        Me.edtQtde.Name = "edtQtde"
        Me.edtQtde.Size = New System.Drawing.Size(48, 22)
        Me.edtQtde.TabIndex = 3
        Me.edtQtde.Text = "1"
        '
        'label4
        '
        Me.label4.AutoSize = True
        Me.label4.Location = New System.Drawing.Point(3, 71)
        Me.label4.Name = "label4"
        Me.label4.Size = New System.Drawing.Size(35, 14)
        Me.label4.TabIndex = 2
        Me.label4.Text = "Qtde"
        '
        'rbtFracionaria
        '
        Me.rbtFracionaria.AutoSize = True
        Me.rbtFracionaria.Location = New System.Drawing.Point(6, 45)
        Me.rbtFracionaria.Name = "rbtFracionaria"
        Me.rbtFracionaria.Size = New System.Drawing.Size(81, 18)
        Me.rbtFracionaria.TabIndex = 1
        Me.rbtFracionaria.TabStop = True
        Me.rbtFracionaria.Text = "Fracionária"
        Me.rbtFracionaria.UseVisualStyleBackColor = True
        '
        'rbtInteira
        '
        Me.rbtInteira.AutoSize = True
        Me.rbtInteira.Checked = True
        Me.rbtInteira.Location = New System.Drawing.Point(6, 21)
        Me.rbtInteira.Name = "rbtInteira"
        Me.rbtInteira.Size = New System.Drawing.Size(60, 18)
        Me.rbtInteira.TabIndex = 0
        Me.rbtInteira.TabStop = True
        Me.rbtInteira.Text = "Inteira"
        Me.rbtInteira.UseVisualStyleBackColor = True
        '
        'btnEncerrarVenda
        '
        Me.btnEncerrarVenda.Enabled = False
        Me.btnEncerrarVenda.Location = New System.Drawing.Point(406, 410)
        Me.btnEncerrarVenda.Name = "btnEncerrarVenda"
        Me.btnEncerrarVenda.Size = New System.Drawing.Size(130, 23)
        Me.btnEncerrarVenda.TabIndex = 17
        Me.btnEncerrarVenda.Text = "Encerrar Venda [F7]"
        Me.btnEncerrarVenda.UseVisualStyleBackColor = True
        '
        'btnCancelarItem
        '
        Me.btnCancelarItem.Enabled = False
        Me.btnCancelarItem.Location = New System.Drawing.Point(134, 410)
        Me.btnCancelarItem.Name = "btnCancelarItem"
        Me.btnCancelarItem.Size = New System.Drawing.Size(130, 23)
        Me.btnCancelarItem.TabIndex = 15
        Me.btnCancelarItem.Text = "Cancelar Ítem [F5]"
        Me.btnCancelarItem.UseVisualStyleBackColor = True
        '
        'groupBox1
        '
        Me.groupBox1.Controls.Add(Me.btnAdicionarItem)
        Me.groupBox1.Controls.Add(Me.groupBox5)
        Me.groupBox1.Controls.Add(Me.groupBox4)
        Me.groupBox1.Controls.Add(Me.groupBox3)
        Me.groupBox1.Controls.Add(Me.edtAliquota)
        Me.groupBox1.Controls.Add(Me.edtDescricao)
        Me.groupBox1.Controls.Add(Me.edtCodigo)
        Me.groupBox1.Controls.Add(Me.label3)
        Me.groupBox1.Controls.Add(Me.label2)
        Me.groupBox1.Controls.Add(Me.label1)
        Me.groupBox1.Location = New System.Drawing.Point(12, 13)
        Me.groupBox1.Name = "groupBox1"
        Me.groupBox1.Size = New System.Drawing.Size(250, 350)
        Me.groupBox1.TabIndex = 10
        Me.groupBox1.TabStop = False
        '
        'edtAliquota
        '
        Me.edtAliquota.Location = New System.Drawing.Point(122, 66)
        Me.edtAliquota.Name = "edtAliquota"
        Me.edtAliquota.Size = New System.Drawing.Size(45, 22)
        Me.edtAliquota.TabIndex = 5
        Me.edtAliquota.Text = "II"
        '
        'edtDescricao
        '
        Me.edtDescricao.Location = New System.Drawing.Point(122, 41)
        Me.edtDescricao.Name = "edtDescricao"
        Me.edtDescricao.Size = New System.Drawing.Size(122, 22)
        Me.edtDescricao.TabIndex = 4
        Me.edtDescricao.Text = "Produto de Teste"
        '
        'edtCodigo
        '
        Me.edtCodigo.Location = New System.Drawing.Point(122, 15)
        Me.edtCodigo.Name = "edtCodigo"
        Me.edtCodigo.Size = New System.Drawing.Size(122, 22)
        Me.edtCodigo.TabIndex = 3
        Me.edtCodigo.Text = "0123456789"
        '
        'label3
        '
        Me.label3.AutoSize = True
        Me.label3.Location = New System.Drawing.Point(65, 69)
        Me.label3.Name = "label3"
        Me.label3.Size = New System.Drawing.Size(51, 14)
        Me.label3.TabIndex = 2
        Me.label3.Text = "Alíquota"
        '
        'label2
        '
        Me.label2.AutoSize = True
        Me.label2.Location = New System.Drawing.Point(58, 44)
        Me.label2.Name = "label2"
        Me.label2.Size = New System.Drawing.Size(58, 14)
        Me.label2.TabIndex = 1
        Me.label2.Text = "Descrição"
        '
        'label1
        '
        Me.label1.AutoSize = True
        Me.label1.Location = New System.Drawing.Point(6, 18)
        Me.label1.Name = "label1"
        Me.label1.Size = New System.Drawing.Size(110, 14)
        Me.label1.TabIndex = 0
        Me.label1.Text = "Código do Produto"
        '
        'btnCancelarVenda
        '
        Me.btnCancelarVenda.Enabled = False
        Me.btnCancelarVenda.Location = New System.Drawing.Point(270, 410)
        Me.btnCancelarVenda.Name = "btnCancelarVenda"
        Me.btnCancelarVenda.Size = New System.Drawing.Size(130, 23)
        Me.btnCancelarVenda.TabIndex = 16
        Me.btnCancelarVenda.Text = "Cancelar Venda [F6]"
        Me.btnCancelarVenda.UseVisualStyleBackColor = True
        '
        'btnNovo
        '
        Me.btnNovo.Location = New System.Drawing.Point(7, 410)
        Me.btnNovo.Name = "btnNovo"
        Me.btnNovo.Size = New System.Drawing.Size(121, 23)
        Me.btnNovo.TabIndex = 14
        Me.btnNovo.Text = "Nova Venda [F4]"
        Me.btnNovo.UseVisualStyleBackColor = True
        '
        'btnAdm
        '
        Me.btnAdm.Location = New System.Drawing.Point(17, 371)
        Me.btnAdm.Name = "btnAdm"
        Me.btnAdm.Size = New System.Drawing.Size(125, 23)
        Me.btnAdm.TabIndex = 12
        Me.btnAdm.Text = "&Administração TEF"
        Me.btnAdm.UseVisualStyleBackColor = True
        '
        'groupBox2
        '
        Me.groupBox2.Location = New System.Drawing.Point(11, 400)
        Me.groupBox2.Name = "groupBox2"
        Me.groupBox2.Size = New System.Drawing.Size(609, 5)
        Me.groupBox2.TabIndex = 11
        Me.groupBox2.TabStop = False
        '
        'rbtSweda
        '
        Me.rbtSweda.AutoSize = True
        Me.rbtSweda.Checked = True
        Me.rbtSweda.Location = New System.Drawing.Point(570, 376)
        Me.rbtSweda.Name = "rbtSweda"
        Me.rbtSweda.Size = New System.Drawing.Size(62, 18)
        Me.rbtSweda.TabIndex = 22
        Me.rbtSweda.TabStop = True
        Me.rbtSweda.Text = "&Sweda"
        Me.rbtSweda.UseVisualStyleBackColor = True
        '
        'rbtBematech
        '
        Me.rbtBematech.AutoSize = True
        Me.rbtBematech.Location = New System.Drawing.Point(484, 376)
        Me.rbtBematech.Name = "rbtBematech"
        Me.rbtBematech.Size = New System.Drawing.Size(80, 18)
        Me.rbtBematech.TabIndex = 21
        Me.rbtBematech.Text = "&Bematech"
        Me.rbtBematech.UseVisualStyleBackColor = True
        '
        'groupBox6
        '
        Me.groupBox6.Controls.Add(Me.lblCartao3)
        Me.groupBox6.Controls.Add(Me.edtValorCartao3)
        Me.groupBox6.Controls.Add(Me.lblCartao2)
        Me.groupBox6.Controls.Add(Me.edtValorCartao2)
        Me.groupBox6.Controls.Add(Me.lblCartao1)
        Me.groupBox6.Controls.Add(Me.lblCheque)
        Me.groupBox6.Controls.Add(Me.lblDinheiro)
        Me.groupBox6.Controls.Add(Me.edtValorCartao1)
        Me.groupBox6.Controls.Add(Me.groupBox8)
        Me.groupBox6.Controls.Add(Me.chkConsultaSerasa)
        Me.groupBox6.Controls.Add(Me.edtValorCheque)
        Me.groupBox6.Controls.Add(Me.groupBox7)
        Me.groupBox6.Controls.Add(Me.edtValorDinheiro)
        Me.groupBox6.Location = New System.Drawing.Point(270, 249)
        Me.groupBox6.Name = "groupBox6"
        Me.groupBox6.Size = New System.Drawing.Size(362, 113)
        Me.groupBox6.TabIndex = 19
        Me.groupBox6.TabStop = False
        Me.groupBox6.Text = "Formas de Pagamento"
        '
        'lblCartao3
        '
        Me.lblCartao3.AutoSize = True
        Me.lblCartao3.Location = New System.Drawing.Point(227, 83)
        Me.lblCartao3.Name = "lblCartao3"
        Me.lblCartao3.Size = New System.Drawing.Size(53, 14)
        Me.lblCartao3.TabIndex = 15
        Me.lblCartao3.Text = "Cartão 3"
        '
        'edtValorCartao3
        '
        Me.edtValorCartao3.Location = New System.Drawing.Point(284, 80)
        Me.edtValorCartao3.Name = "edtValorCartao3"
        Me.edtValorCartao3.Size = New System.Drawing.Size(71, 22)
        Me.edtValorCartao3.TabIndex = 14
        Me.edtValorCartao3.Text = "0,00"
        '
        'lblCartao2
        '
        Me.lblCartao2.AutoSize = True
        Me.lblCartao2.Location = New System.Drawing.Point(228, 56)
        Me.lblCartao2.Name = "lblCartao2"
        Me.lblCartao2.Size = New System.Drawing.Size(53, 14)
        Me.lblCartao2.TabIndex = 13
        Me.lblCartao2.Text = "Cartão 2"
        '
        'edtValorCartao2
        '
        Me.edtValorCartao2.Location = New System.Drawing.Point(285, 53)
        Me.edtValorCartao2.Name = "edtValorCartao2"
        Me.edtValorCartao2.Size = New System.Drawing.Size(71, 22)
        Me.edtValorCartao2.TabIndex = 12
        Me.edtValorCartao2.Text = "0,00"
        '
        'lblCartao1
        '
        Me.lblCartao1.AutoSize = True
        Me.lblCartao1.Location = New System.Drawing.Point(227, 28)
        Me.lblCartao1.Name = "lblCartao1"
        Me.lblCartao1.Size = New System.Drawing.Size(53, 14)
        Me.lblCartao1.TabIndex = 11
        Me.lblCartao1.Text = "Cartão 1"
        '
        'lblCheque
        '
        Me.lblCheque.AutoSize = True
        Me.lblCheque.Location = New System.Drawing.Point(96, 33)
        Me.lblCheque.Name = "lblCheque"
        Me.lblCheque.Size = New System.Drawing.Size(49, 14)
        Me.lblCheque.TabIndex = 10
        Me.lblCheque.Text = "Cheque"
        '
        'lblDinheiro
        '
        Me.lblDinheiro.AutoSize = True
        Me.lblDinheiro.Location = New System.Drawing.Point(8, 31)
        Me.lblDinheiro.Name = "lblDinheiro"
        Me.lblDinheiro.Size = New System.Drawing.Size(51, 14)
        Me.lblDinheiro.TabIndex = 9
        Me.lblDinheiro.Text = "Dinheiro"
        '
        'edtValorCartao1
        '
        Me.edtValorCartao1.Location = New System.Drawing.Point(284, 25)
        Me.edtValorCartao1.Name = "edtValorCartao1"
        Me.edtValorCartao1.Size = New System.Drawing.Size(71, 22)
        Me.edtValorCartao1.TabIndex = 8
        Me.edtValorCartao1.Text = "0,00"
        '
        'groupBox8
        '
        Me.groupBox8.Location = New System.Drawing.Point(211, 23)
        Me.groupBox8.Name = "groupBox8"
        Me.groupBox8.Size = New System.Drawing.Size(2, 86)
        Me.groupBox8.TabIndex = 6
        Me.groupBox8.TabStop = False
        '
        'chkConsultaSerasa
        '
        Me.chkConsultaSerasa.AutoSize = True
        Me.chkConsultaSerasa.Location = New System.Drawing.Point(94, 82)
        Me.chkConsultaSerasa.Name = "chkConsultaSerasa"
        Me.chkConsultaSerasa.Size = New System.Drawing.Size(111, 18)
        Me.chkConsultaSerasa.TabIndex = 5
        Me.chkConsultaSerasa.Text = "Consulta Serasa"
        Me.chkConsultaSerasa.UseVisualStyleBackColor = True
        '
        'edtValorCheque
        '
        Me.edtValorCheque.Location = New System.Drawing.Point(96, 55)
        Me.edtValorCheque.Name = "edtValorCheque"
        Me.edtValorCheque.Size = New System.Drawing.Size(71, 22)
        Me.edtValorCheque.TabIndex = 4
        Me.edtValorCheque.Text = "0,00"
        '
        'groupBox7
        '
        Me.groupBox7.Location = New System.Drawing.Point(88, 23)
        Me.groupBox7.Name = "groupBox7"
        Me.groupBox7.Size = New System.Drawing.Size(2, 86)
        Me.groupBox7.TabIndex = 2
        Me.groupBox7.TabStop = False
        '
        'edtValorDinheiro
        '
        Me.edtValorDinheiro.Location = New System.Drawing.Point(6, 53)
        Me.edtValorDinheiro.Name = "edtValorDinheiro"
        Me.edtValorDinheiro.Size = New System.Drawing.Size(71, 22)
        Me.edtValorDinheiro.TabIndex = 1
        Me.edtValorDinheiro.Text = "0,00"
        '
        'mmoCupomFiscal
        '
        Me.mmoCupomFiscal.Font = New System.Drawing.Font("Courier New", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.mmoCupomFiscal.Location = New System.Drawing.Point(268, 12)
        Me.mmoCupomFiscal.Multiline = True
        Me.mmoCupomFiscal.Name = "mmoCupomFiscal"
        Me.mmoCupomFiscal.ScrollBars = System.Windows.Forms.ScrollBars.Vertical
        Me.mmoCupomFiscal.Size = New System.Drawing.Size(364, 231)
        Me.mmoCupomFiscal.TabIndex = 20
        Me.mmoCupomFiscal.TabStop = False
        '
        'FrenteCaixaFrm
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 14.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(644, 446)
        Me.Controls.Add(Me.rbtSweda)
        Me.Controls.Add(Me.rbtBematech)
        Me.Controls.Add(Me.groupBox6)
        Me.Controls.Add(Me.mmoCupomFiscal)
        Me.Controls.Add(Me.btnFechar)
        Me.Controls.Add(Me.btnEncerrarVenda)
        Me.Controls.Add(Me.btnCancelarItem)
        Me.Controls.Add(Me.groupBox1)
        Me.Controls.Add(Me.btnCancelarVenda)
        Me.Controls.Add(Me.btnNovo)
        Me.Controls.Add(Me.btnAdm)
        Me.Controls.Add(Me.groupBox2)
        Me.Font = New System.Drawing.Font("Tahoma", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.KeyPreview = True
        Me.Margin = New System.Windows.Forms.Padding(3, 4, 3, 4)
        Me.Name = "FrenteCaixaFrm"
        Me.Text = "Exemplo TEF Discado - Tela de Frente de Caixa"
        Me.groupBox4.ResumeLayout(False)
        Me.groupBox4.PerformLayout()
        Me.groupBox5.ResumeLayout(False)
        Me.groupBox5.PerformLayout()
        Me.groupBox3.ResumeLayout(False)
        Me.groupBox3.PerformLayout()
        Me.groupBox1.ResumeLayout(False)
        Me.groupBox1.PerformLayout()
        Me.groupBox6.ResumeLayout(False)
        Me.groupBox6.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Private WithEvents groupBox4 As System.Windows.Forms.GroupBox
    Private WithEvents edtValorDesconto As System.Windows.Forms.TextBox
    Private WithEvents label5 As System.Windows.Forms.Label
    Private WithEvents rbtValorDesconto As System.Windows.Forms.RadioButton
    Private WithEvents rbtPercentual As System.Windows.Forms.RadioButton
    Private WithEvents btnFechar As System.Windows.Forms.Button
    Private WithEvents btnAdicionarItem As System.Windows.Forms.Button
    Private WithEvents groupBox5 As System.Windows.Forms.GroupBox
    Private WithEvents edtValorUnit As System.Windows.Forms.TextBox
    Private WithEvents label6 As System.Windows.Forms.Label
    Private WithEvents rbt3Casas As System.Windows.Forms.RadioButton
    Private WithEvents rbt2Casas As System.Windows.Forms.RadioButton
    Private WithEvents groupBox3 As System.Windows.Forms.GroupBox
    Private WithEvents edtQtde As System.Windows.Forms.TextBox
    Private WithEvents label4 As System.Windows.Forms.Label
    Private WithEvents rbtFracionaria As System.Windows.Forms.RadioButton
    Private WithEvents rbtInteira As System.Windows.Forms.RadioButton
    Private WithEvents btnEncerrarVenda As System.Windows.Forms.Button
    Private WithEvents btnCancelarItem As System.Windows.Forms.Button
    Private WithEvents groupBox1 As System.Windows.Forms.GroupBox
    Private WithEvents edtAliquota As System.Windows.Forms.TextBox
    Private WithEvents edtDescricao As System.Windows.Forms.TextBox
    Private WithEvents edtCodigo As System.Windows.Forms.TextBox
    Private WithEvents label3 As System.Windows.Forms.Label
    Private WithEvents label2 As System.Windows.Forms.Label
    Private WithEvents label1 As System.Windows.Forms.Label
    Private WithEvents btnCancelarVenda As System.Windows.Forms.Button
    Private WithEvents btnNovo As System.Windows.Forms.Button
    Private WithEvents btnAdm As System.Windows.Forms.Button
    Private WithEvents groupBox2 As System.Windows.Forms.GroupBox
    Private WithEvents rbtSweda As System.Windows.Forms.RadioButton
    Private WithEvents rbtBematech As System.Windows.Forms.RadioButton
    Private WithEvents groupBox6 As System.Windows.Forms.GroupBox
    Private WithEvents lblCartao3 As System.Windows.Forms.Label
    Private WithEvents edtValorCartao3 As System.Windows.Forms.TextBox
    Private WithEvents lblCartao2 As System.Windows.Forms.Label
    Private WithEvents edtValorCartao2 As System.Windows.Forms.TextBox
    Private WithEvents lblCartao1 As System.Windows.Forms.Label
    Private WithEvents lblCheque As System.Windows.Forms.Label
    Private WithEvents lblDinheiro As System.Windows.Forms.Label
    Private WithEvents edtValorCartao1 As System.Windows.Forms.TextBox
    Private WithEvents groupBox8 As System.Windows.Forms.GroupBox
    Private WithEvents chkConsultaSerasa As System.Windows.Forms.CheckBox
    Private WithEvents edtValorCheque As System.Windows.Forms.TextBox
    Private WithEvents groupBox7 As System.Windows.Forms.GroupBox
    Private WithEvents edtValorDinheiro As System.Windows.Forms.TextBox
    Private WithEvents mmoCupomFiscal As System.Windows.Forms.TextBox

End Class
