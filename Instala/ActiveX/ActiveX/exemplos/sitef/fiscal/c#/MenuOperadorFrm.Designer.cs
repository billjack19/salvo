namespace exemplo
{
    partial class MenuOperadorFrm
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
            this.gbOpcoes = new System.Windows.Forms.GroupBox();
            this.btnTelaAnterior = new System.Windows.Forms.Button();
            this.btnFechar = new System.Windows.Forms.Button();
            this.btnOK = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // gbOpcoes
            // 
            this.gbOpcoes.AccessibleName = "gbOpcoes";
            this.gbOpcoes.Location = new System.Drawing.Point(12, 12);
            this.gbOpcoes.Name = "gbOpcoes";
            this.gbOpcoes.Size = new System.Drawing.Size(385, 226);
            this.gbOpcoes.TabIndex = 0;
            this.gbOpcoes.TabStop = false;
            this.gbOpcoes.Text = "Opções";
            // 
            // btnTelaAnterior
            // 
            this.btnTelaAnterior.AccessibleRole = System.Windows.Forms.AccessibleRole.None;
            this.btnTelaAnterior.Location = new System.Drawing.Point(107, 246);
            this.btnTelaAnterior.Name = "btnTelaAnterior";
            this.btnTelaAnterior.Size = new System.Drawing.Size(128, 23);
            this.btnTelaAnterior.TabIndex = 1;
            this.btnTelaAnterior.Text = "&Tela Anterior";
            this.btnTelaAnterior.UseVisualStyleBackColor = true;
            this.btnTelaAnterior.Click += new System.EventHandler(this.btnTelaAnterior_Click);
            // 
            // btnFechar
            // 
            this.btnFechar.DialogResult = System.Windows.Forms.DialogResult.Cancel;
            this.btnFechar.Location = new System.Drawing.Point(322, 246);
            this.btnFechar.Name = "btnFechar";
            this.btnFechar.Size = new System.Drawing.Size(75, 23);
            this.btnFechar.TabIndex = 6;
            this.btnFechar.Text = "&Fechar";
            this.btnFechar.UseVisualStyleBackColor = true;
            this.btnFechar.Click += new System.EventHandler(this.btnFechar_Click);
            // 
            // btnOK
            // 
            this.btnOK.Location = new System.Drawing.Point(241, 246);
            this.btnOK.Name = "btnOK";
            this.btnOK.Size = new System.Drawing.Size(75, 23);
            this.btnOK.TabIndex = 5;
            this.btnOK.Text = "&OK";
            this.btnOK.UseVisualStyleBackColor = true;
            this.btnOK.Click += new System.EventHandler(this.btnOK_Click);
            // 
            // MenuOperadorFrm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(7F, 14F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(409, 281);
            this.Controls.Add(this.btnFechar);
            this.Controls.Add(this.btnOK);
            this.Controls.Add(this.btnTelaAnterior);
            this.Controls.Add(this.gbOpcoes);
            this.Font = new System.Drawing.Font("Tahoma", 9F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Name = "MenuOperadorFrm";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "MenuOperadorFrm";
            this.Shown += new System.EventHandler(this.MenuOperadorFrm_Shown);
            this.KeyUp += new System.Windows.Forms.KeyEventHandler(this.MenuOperadorFrm_KeyUp);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.GroupBox gbOpcoes;
        private System.Windows.Forms.Button btnTelaAnterior;
        private System.Windows.Forms.Button btnFechar;
        private System.Windows.Forms.Button btnOK;

    }
}