namespace exemplo
{
    partial class FrenteCaixaFrm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.btnAdicionarItem = new System.Windows.Forms.Button();
            this.groupBox5 = new System.Windows.Forms.GroupBox();
            this.edtValorUnit = new System.Windows.Forms.TextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.rbt3Casas = new System.Windows.Forms.RadioButton();
            this.rbt2Casas = new System.Windows.Forms.RadioButton();
            this.groupBox4 = new System.Windows.Forms.GroupBox();
            this.edtValorDesconto = new System.Windows.Forms.TextBox();
            this.label5 = new System.Windows.Forms.Label();
            this.rbtValorDesconto = new System.Windows.Forms.RadioButton();
            this.rbtPercentual = new System.Windows.Forms.RadioButton();
            this.groupBox3 = new System.Windows.Forms.GroupBox();
            this.edtQtde = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.rbtFracionaria = new System.Windows.Forms.RadioButton();
            this.rbtInteira = new System.Windows.Forms.RadioButton();
            this.edtAliquota = new System.Windows.Forms.TextBox();
            this.edtDescricao = new System.Windows.Forms.TextBox();
            this.edtCodigo = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.btnAdm = new System.Windows.Forms.Button();
            this.btnNovo = new System.Windows.Forms.Button();
            this.btnCancelarVenda = new System.Windows.Forms.Button();
            this.btnEncerrarVenda = new System.Windows.Forms.Button();
            this.btnFechar = new System.Windows.Forms.Button();
            this.mmoCupomFiscal = new System.Windows.Forms.TextBox();
            this.btnCancelarItem = new System.Windows.Forms.Button();
            this.groupBox6 = new System.Windows.Forms.GroupBox();
            this.label11 = new System.Windows.Forms.Label();
            this.label10 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.edtValorCartao3 = new System.Windows.Forms.TextBox();
            this.edtValorCartao2 = new System.Windows.Forms.TextBox();
            this.label8 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.edtValorCartao1 = new System.Windows.Forms.TextBox();
            this.edtValorCheque = new System.Windows.Forms.TextBox();
            this.edtValorDinheiro = new System.Windows.Forms.TextBox();
            this.txtMsgOperador = new System.Windows.Forms.TextBox();
            this.label12 = new System.Windows.Forms.Label();
            this.txtMsgCliente = new System.Windows.Forms.TextBox();
            this.label13 = new System.Windows.Forms.Label();
            this.groupBox1.SuspendLayout();
            this.groupBox5.SuspendLayout();
            this.groupBox4.SuspendLayout();
            this.groupBox3.SuspendLayout();
            this.groupBox6.SuspendLayout();
            this.SuspendLayout();
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.btnAdicionarItem);
            this.groupBox1.Controls.Add(this.groupBox5);
            this.groupBox1.Controls.Add(this.groupBox4);
            this.groupBox1.Controls.Add(this.groupBox3);
            this.groupBox1.Controls.Add(this.edtAliquota);
            this.groupBox1.Controls.Add(this.edtDescricao);
            this.groupBox1.Controls.Add(this.edtCodigo);
            this.groupBox1.Controls.Add(this.label3);
            this.groupBox1.Controls.Add(this.label2);
            this.groupBox1.Controls.Add(this.label1);
            this.groupBox1.Location = new System.Drawing.Point(12, 12);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(250, 350);
            this.groupBox1.TabIndex = 0;
            this.groupBox1.TabStop = false;
            // 
            // btnAdicionarItem
            // 
            this.btnAdicionarItem.Location = new System.Drawing.Point(13, 313);
            this.btnAdicionarItem.Name = "btnAdicionarItem";
            this.btnAdicionarItem.Size = new System.Drawing.Size(231, 23);
            this.btnAdicionarItem.TabIndex = 9;
            this.btnAdicionarItem.Text = "Adicionar Ítem ao Cupom [F3]";
            this.btnAdicionarItem.UseVisualStyleBackColor = true;
            this.btnAdicionarItem.Click += new System.EventHandler(this.btnAdicionarItem_Click);
            // 
            // groupBox5
            // 
            this.groupBox5.Controls.Add(this.edtValorUnit);
            this.groupBox5.Controls.Add(this.label6);
            this.groupBox5.Controls.Add(this.rbt3Casas);
            this.groupBox5.Controls.Add(this.rbt2Casas);
            this.groupBox5.Location = new System.Drawing.Point(9, 200);
            this.groupBox5.Name = "groupBox5";
            this.groupBox5.Size = new System.Drawing.Size(235, 100);
            this.groupBox5.TabIndex = 8;
            this.groupBox5.TabStop = false;
            this.groupBox5.Text = "Valor Unitário";
            // 
            // edtValorUnit
            // 
            this.edtValorUnit.Location = new System.Drawing.Point(46, 65);
            this.edtValorUnit.Name = "edtValorUnit";
            this.edtValorUnit.Size = new System.Drawing.Size(48, 22);
            this.edtValorUnit.TabIndex = 7;
            this.edtValorUnit.Text = "40,00";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(3, 68);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(35, 14);
            this.label6.TabIndex = 6;
            this.label6.Text = "Qtde";
            // 
            // rbt3Casas
            // 
            this.rbt3Casas.AutoSize = true;
            this.rbt3Casas.Location = new System.Drawing.Point(6, 42);
            this.rbt3Casas.Name = "rbt3Casas";
            this.rbt3Casas.Size = new System.Drawing.Size(109, 17);
            this.rbt3Casas.TabIndex = 5;
            this.rbt3Casas.TabStop = true;
            this.rbt3Casas.Text = "3 Casas Decimais";
            this.rbt3Casas.UseVisualStyleBackColor = true;
            // 
            // rbt2Casas
            // 
            this.rbt2Casas.AutoSize = true;
            this.rbt2Casas.Checked = true;
            this.rbt2Casas.Location = new System.Drawing.Point(6, 18);
            this.rbt2Casas.Name = "rbt2Casas";
            this.rbt2Casas.Size = new System.Drawing.Size(109, 17);
            this.rbt2Casas.TabIndex = 4;
            this.rbt2Casas.TabStop = true;
            this.rbt2Casas.Text = "2 Casas Decimais";
            this.rbt2Casas.UseVisualStyleBackColor = true;
            // 
            // groupBox4
            // 
            this.groupBox4.Controls.Add(this.edtValorDesconto);
            this.groupBox4.Controls.Add(this.label5);
            this.groupBox4.Controls.Add(this.rbtValorDesconto);
            this.groupBox4.Controls.Add(this.rbtPercentual);
            this.groupBox4.Location = new System.Drawing.Point(122, 94);
            this.groupBox4.Name = "groupBox4";
            this.groupBox4.Size = new System.Drawing.Size(122, 100);
            this.groupBox4.TabIndex = 7;
            this.groupBox4.TabStop = false;
            this.groupBox4.Text = "Desconto";
            // 
            // edtValorDesconto
            // 
            this.edtValorDesconto.Location = new System.Drawing.Point(49, 68);
            this.edtValorDesconto.Name = "edtValorDesconto";
            this.edtValorDesconto.Size = new System.Drawing.Size(48, 22);
            this.edtValorDesconto.TabIndex = 7;
            this.edtValorDesconto.Text = "0";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(6, 71);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(35, 14);
            this.label5.TabIndex = 6;
            this.label5.Text = "Qtde";
            // 
            // rbtValorDesconto
            // 
            this.rbtValorDesconto.AutoSize = true;
            this.rbtValorDesconto.Location = new System.Drawing.Point(9, 45);
            this.rbtValorDesconto.Name = "rbtValorDesconto";
            this.rbtValorDesconto.Size = new System.Drawing.Size(68, 17);
            this.rbtValorDesconto.TabIndex = 5;
            this.rbtValorDesconto.TabStop = true;
            this.rbtValorDesconto.Text = "Por Valor";
            this.rbtValorDesconto.UseVisualStyleBackColor = true;
            // 
            // rbtPercentual
            // 
            this.rbtPercentual.AutoSize = true;
            this.rbtPercentual.Checked = true;
            this.rbtPercentual.Location = new System.Drawing.Point(9, 21);
            this.rbtPercentual.Name = "rbtPercentual";
            this.rbtPercentual.Size = new System.Drawing.Size(95, 17);
            this.rbtPercentual.TabIndex = 4;
            this.rbtPercentual.TabStop = true;
            this.rbtPercentual.Text = "Por Percentual";
            this.rbtPercentual.UseVisualStyleBackColor = true;
            // 
            // groupBox3
            // 
            this.groupBox3.Controls.Add(this.edtQtde);
            this.groupBox3.Controls.Add(this.label4);
            this.groupBox3.Controls.Add(this.rbtFracionaria);
            this.groupBox3.Controls.Add(this.rbtInteira);
            this.groupBox3.Location = new System.Drawing.Point(9, 94);
            this.groupBox3.Name = "groupBox3";
            this.groupBox3.Size = new System.Drawing.Size(100, 100);
            this.groupBox3.TabIndex = 6;
            this.groupBox3.TabStop = false;
            this.groupBox3.Text = "Quantidade";
            // 
            // edtQtde
            // 
            this.edtQtde.Location = new System.Drawing.Point(46, 68);
            this.edtQtde.Name = "edtQtde";
            this.edtQtde.Size = new System.Drawing.Size(48, 22);
            this.edtQtde.TabIndex = 3;
            this.edtQtde.Text = "1";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(3, 71);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(35, 14);
            this.label4.TabIndex = 2;
            this.label4.Text = "Qtde";
            // 
            // rbtFracionaria
            // 
            this.rbtFracionaria.AutoSize = true;
            this.rbtFracionaria.Location = new System.Drawing.Point(6, 45);
            this.rbtFracionaria.Name = "rbtFracionaria";
            this.rbtFracionaria.Size = new System.Drawing.Size(77, 17);
            this.rbtFracionaria.TabIndex = 1;
            this.rbtFracionaria.TabStop = true;
            this.rbtFracionaria.Text = "Fracionária";
            this.rbtFracionaria.UseVisualStyleBackColor = true;
            // 
            // rbtInteira
            // 
            this.rbtInteira.AutoSize = true;
            this.rbtInteira.Checked = true;
            this.rbtInteira.Location = new System.Drawing.Point(6, 21);
            this.rbtInteira.Name = "rbtInteira";
            this.rbtInteira.Size = new System.Drawing.Size(54, 17);
            this.rbtInteira.TabIndex = 0;
            this.rbtInteira.TabStop = true;
            this.rbtInteira.Text = "Inteira";
            this.rbtInteira.UseVisualStyleBackColor = true;
            // 
            // edtAliquota
            // 
            this.edtAliquota.Location = new System.Drawing.Point(122, 66);
            this.edtAliquota.Name = "edtAliquota";
            this.edtAliquota.Size = new System.Drawing.Size(45, 22);
            this.edtAliquota.TabIndex = 5;
            this.edtAliquota.Text = "II";
            // 
            // edtDescricao
            // 
            this.edtDescricao.Location = new System.Drawing.Point(122, 41);
            this.edtDescricao.Name = "edtDescricao";
            this.edtDescricao.Size = new System.Drawing.Size(122, 22);
            this.edtDescricao.TabIndex = 4;
            this.edtDescricao.Text = "Produto de Teste";
            // 
            // edtCodigo
            // 
            this.edtCodigo.Location = new System.Drawing.Point(122, 15);
            this.edtCodigo.Name = "edtCodigo";
            this.edtCodigo.Size = new System.Drawing.Size(122, 22);
            this.edtCodigo.TabIndex = 3;
            this.edtCodigo.Text = "0123456789";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(65, 69);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(51, 14);
            this.label3.TabIndex = 2;
            this.label3.Text = "Alíquota";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(58, 44);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(58, 14);
            this.label2.TabIndex = 1;
            this.label2.Text = "Descrição";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(6, 18);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(110, 14);
            this.label1.TabIndex = 0;
            this.label1.Text = "Código do Produto";
            // 
            // groupBox2
            // 
            this.groupBox2.Location = new System.Drawing.Point(11, 399);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(621, 5);
            this.groupBox2.TabIndex = 1;
            this.groupBox2.TabStop = false;
            // 
            // btnAdm
            // 
            this.btnAdm.Location = new System.Drawing.Point(17, 370);
            this.btnAdm.Name = "btnAdm";
            this.btnAdm.Size = new System.Drawing.Size(245, 23);
            this.btnAdm.TabIndex = 2;
            this.btnAdm.Text = "&Executar Operação Administrativa CliSiTef";
            this.btnAdm.UseVisualStyleBackColor = true;
            this.btnAdm.Click += new System.EventHandler(this.btnAdm_Click);
            // 
            // btnNovo
            // 
            this.btnNovo.Location = new System.Drawing.Point(13, 411);
            this.btnNovo.Name = "btnNovo";
            this.btnNovo.Size = new System.Drawing.Size(121, 23);
            this.btnNovo.TabIndex = 4;
            this.btnNovo.Text = "Nova Venda [F4]";
            this.btnNovo.UseVisualStyleBackColor = true;
            this.btnNovo.Click += new System.EventHandler(this.btnNovo_Click);
            // 
            // btnCancelarVenda
            // 
            this.btnCancelarVenda.Location = new System.Drawing.Point(276, 411);
            this.btnCancelarVenda.Name = "btnCancelarVenda";
            this.btnCancelarVenda.Size = new System.Drawing.Size(130, 23);
            this.btnCancelarVenda.TabIndex = 6;
            this.btnCancelarVenda.Text = "Cancelar Venda [F6]";
            this.btnCancelarVenda.UseVisualStyleBackColor = true;
            this.btnCancelarVenda.Click += new System.EventHandler(this.btnCancelarVenda_Click);
            // 
            // btnEncerrarVenda
            // 
            this.btnEncerrarVenda.Location = new System.Drawing.Point(412, 411);
            this.btnEncerrarVenda.Name = "btnEncerrarVenda";
            this.btnEncerrarVenda.Size = new System.Drawing.Size(130, 23);
            this.btnEncerrarVenda.TabIndex = 7;
            this.btnEncerrarVenda.Text = "Encerrar Venda [F7]";
            this.btnEncerrarVenda.UseVisualStyleBackColor = true;
            this.btnEncerrarVenda.Click += new System.EventHandler(this.btnEncerrarVenda_Click);
            // 
            // btnFechar
            // 
            this.btnFechar.Location = new System.Drawing.Point(548, 411);
            this.btnFechar.Name = "btnFechar";
            this.btnFechar.Size = new System.Drawing.Size(83, 23);
            this.btnFechar.TabIndex = 8;
            this.btnFechar.Text = "&Fechar";
            this.btnFechar.UseVisualStyleBackColor = true;
            this.btnFechar.Click += new System.EventHandler(this.btnFechar_Click);
            // 
            // mmoCupomFiscal
            // 
            this.mmoCupomFiscal.Font = new System.Drawing.Font("Courier New", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.mmoCupomFiscal.Location = new System.Drawing.Point(270, 12);
            this.mmoCupomFiscal.Multiline = true;
            this.mmoCupomFiscal.Name = "mmoCupomFiscal";
            this.mmoCupomFiscal.ScrollBars = System.Windows.Forms.ScrollBars.Vertical;
            this.mmoCupomFiscal.Size = new System.Drawing.Size(362, 194);
            this.mmoCupomFiscal.TabIndex = 9;
            this.mmoCupomFiscal.TabStop = false;
            // 
            // btnCancelarItem
            // 
            this.btnCancelarItem.Location = new System.Drawing.Point(140, 411);
            this.btnCancelarItem.Name = "btnCancelarItem";
            this.btnCancelarItem.Size = new System.Drawing.Size(130, 23);
            this.btnCancelarItem.TabIndex = 5;
            this.btnCancelarItem.Text = "Cancelar Ítem [F5]";
            this.btnCancelarItem.UseVisualStyleBackColor = true;
            this.btnCancelarItem.Click += new System.EventHandler(this.btnCancelarItem_Click);
            // 
            // groupBox6
            // 
            this.groupBox6.Controls.Add(this.label11);
            this.groupBox6.Controls.Add(this.label10);
            this.groupBox6.Controls.Add(this.label9);
            this.groupBox6.Controls.Add(this.edtValorCartao3);
            this.groupBox6.Controls.Add(this.edtValorCartao2);
            this.groupBox6.Controls.Add(this.label8);
            this.groupBox6.Controls.Add(this.label7);
            this.groupBox6.Controls.Add(this.edtValorCartao1);
            this.groupBox6.Controls.Add(this.edtValorCheque);
            this.groupBox6.Controls.Add(this.edtValorDinheiro);
            this.groupBox6.Location = new System.Drawing.Point(270, 280);
            this.groupBox6.Name = "groupBox6";
            this.groupBox6.Size = new System.Drawing.Size(362, 113);
            this.groupBox6.TabIndex = 10;
            this.groupBox6.TabStop = false;
            this.groupBox6.Text = "Formas de Pagamento";
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Location = new System.Drawing.Point(197, 84);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(53, 14);
            this.label11.TabIndex = 15;
            this.label11.Text = "Cartão 3";
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Location = new System.Drawing.Point(197, 56);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(53, 14);
            this.label10.TabIndex = 14;
            this.label10.Text = "Cartão 2";
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(199, 28);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(53, 14);
            this.label9.TabIndex = 13;
            this.label9.Text = "Cartão 1";
            // 
            // edtValorCartao3
            // 
            this.edtValorCartao3.Location = new System.Drawing.Point(256, 81);
            this.edtValorCartao3.Name = "edtValorCartao3";
            this.edtValorCartao3.Size = new System.Drawing.Size(71, 22);
            this.edtValorCartao3.TabIndex = 12;
            this.edtValorCartao3.Text = "0,00";
            // 
            // edtValorCartao2
            // 
            this.edtValorCartao2.Location = new System.Drawing.Point(256, 53);
            this.edtValorCartao2.Name = "edtValorCartao2";
            this.edtValorCartao2.Size = new System.Drawing.Size(71, 22);
            this.edtValorCartao2.TabIndex = 11;
            this.edtValorCartao2.Text = "0,00";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Location = new System.Drawing.Point(33, 56);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(49, 14);
            this.label8.TabIndex = 10;
            this.label8.Text = "Cheque";
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(33, 28);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(51, 14);
            this.label7.TabIndex = 9;
            this.label7.Text = "Dinheiro";
            // 
            // edtValorCartao1
            // 
            this.edtValorCartao1.Location = new System.Drawing.Point(256, 25);
            this.edtValorCartao1.Name = "edtValorCartao1";
            this.edtValorCartao1.Size = new System.Drawing.Size(71, 22);
            this.edtValorCartao1.TabIndex = 8;
            this.edtValorCartao1.Text = "0,00";
            // 
            // edtValorCheque
            // 
            this.edtValorCheque.Location = new System.Drawing.Point(90, 53);
            this.edtValorCheque.Name = "edtValorCheque";
            this.edtValorCheque.Size = new System.Drawing.Size(71, 22);
            this.edtValorCheque.TabIndex = 4;
            this.edtValorCheque.Text = "0,00";
            // 
            // edtValorDinheiro
            // 
            this.edtValorDinheiro.Location = new System.Drawing.Point(90, 25);
            this.edtValorDinheiro.Name = "edtValorDinheiro";
            this.edtValorDinheiro.Size = new System.Drawing.Size(71, 22);
            this.edtValorDinheiro.TabIndex = 1;
            this.edtValorDinheiro.Text = "0,00";
            // 
            // txtMsgOperador
            // 
            this.txtMsgOperador.Location = new System.Drawing.Point(358, 212);
            this.txtMsgOperador.Name = "txtMsgOperador";
            this.txtMsgOperador.ReadOnly = true;
            this.txtMsgOperador.Size = new System.Drawing.Size(274, 22);
            this.txtMsgOperador.TabIndex = 12;
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Location = new System.Drawing.Point(267, 215);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(85, 14);
            this.label12.TabIndex = 11;
            this.label12.Text = "Tela Operador";
            // 
            // txtMsgCliente
            // 
            this.txtMsgCliente.Location = new System.Drawing.Point(358, 240);
            this.txtMsgCliente.Name = "txtMsgCliente";
            this.txtMsgCliente.ReadOnly = true;
            this.txtMsgCliente.Size = new System.Drawing.Size(274, 22);
            this.txtMsgCliente.TabIndex = 14;
            // 
            // label13
            // 
            this.label13.AutoSize = true;
            this.label13.Location = new System.Drawing.Point(281, 243);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(71, 14);
            this.label13.TabIndex = 13;
            this.label13.Text = "Tela Cliente";
            // 
            // FrenteCaixaFrm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(7F, 14F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(644, 446);
            this.Controls.Add(this.txtMsgCliente);
            this.Controls.Add(this.label13);
            this.Controls.Add(this.txtMsgOperador);
            this.Controls.Add(this.label12);
            this.Controls.Add(this.groupBox6);
            this.Controls.Add(this.mmoCupomFiscal);
            this.Controls.Add(this.btnFechar);
            this.Controls.Add(this.btnEncerrarVenda);
            this.Controls.Add(this.btnCancelarVenda);
            this.Controls.Add(this.btnCancelarItem);
            this.Controls.Add(this.btnNovo);
            this.Controls.Add(this.btnAdm);
            this.Controls.Add(this.groupBox2);
            this.Controls.Add(this.groupBox1);
            this.Font = new System.Drawing.Font("Tahoma", 9F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.KeyPreview = true;
            this.Name = "FrenteCaixaFrm";
            this.Text = "Exemplo TEF Dedicado - Integração com a biblioteca CliSiTef";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.FrenteCaixaFrm_FormClosing);
            this.Load += new System.EventHandler(this.FrenteCaixaFrm_Load);
            this.KeyUp += new System.Windows.Forms.KeyEventHandler(this.FrenteCaixaFrm_KeyUp);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.groupBox5.ResumeLayout(false);
            this.groupBox5.PerformLayout();
            this.groupBox4.ResumeLayout(false);
            this.groupBox4.PerformLayout();
            this.groupBox3.ResumeLayout(false);
            this.groupBox3.PerformLayout();
            this.groupBox6.ResumeLayout(false);
            this.groupBox6.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.TextBox edtAliquota;
        private System.Windows.Forms.TextBox edtDescricao;
        private System.Windows.Forms.TextBox edtCodigo;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.GroupBox groupBox4;
        private System.Windows.Forms.GroupBox groupBox3;
        private System.Windows.Forms.Button btnAdicionarItem;
        private System.Windows.Forms.GroupBox groupBox5;
        private System.Windows.Forms.TextBox edtValorUnit;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.RadioButton rbt3Casas;
        private System.Windows.Forms.RadioButton rbt2Casas;
        private System.Windows.Forms.TextBox edtValorDesconto;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.RadioButton rbtValorDesconto;
        private System.Windows.Forms.RadioButton rbtPercentual;
        private System.Windows.Forms.TextBox edtQtde;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.RadioButton rbtFracionaria;
        private System.Windows.Forms.RadioButton rbtInteira;
        private System.Windows.Forms.Button btnAdm;
        private System.Windows.Forms.Button btnNovo;
        private System.Windows.Forms.Button btnCancelarVenda;
        private System.Windows.Forms.Button btnEncerrarVenda;
        private System.Windows.Forms.Button btnFechar;
        private System.Windows.Forms.TextBox mmoCupomFiscal;
        private System.Windows.Forms.Button btnCancelarItem;
        private System.Windows.Forms.GroupBox groupBox6;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.TextBox edtValorCartao3;
        private System.Windows.Forms.TextBox edtValorCartao2;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.TextBox edtValorCartao1;
        private System.Windows.Forms.TextBox edtValorCheque;
        private System.Windows.Forms.TextBox edtValorDinheiro;
        private System.Windows.Forms.TextBox txtMsgOperador;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.TextBox txtMsgCliente;
        private System.Windows.Forms.Label label13;

    }
}

