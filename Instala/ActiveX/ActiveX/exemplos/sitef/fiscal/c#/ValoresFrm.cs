using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace exemplo
{
    public partial class ValoresFrm : Form
    {
        private int internalTamanhoMinimo = 0;
        
        public ValoresFrm()
        {
            InitializeComponent();
        }

        public int tamanhoMinimo
        {
            get
            {
                return internalTamanhoMinimo;
            }
            set
            {
                internalTamanhoMinimo = value;
            }
        }

        public int tamanhoMaximo
        {
            get
            {
                return txtValor.MaxLength;
            }
            set
            {
                txtValor.MaxLength = value;
            }
        }

        public bool ligarModoSenha
        {
            set
            {
                if (value)
                    txtValor.PasswordChar = '*';
            }
        }


        public void escreverMensagem(string msg)
        {
            lblMsg.Text = msg;
        }

        public string dadoLido
        {
            get
            {
                return txtValor.Text;
            }
        }

        private void btnFechar_Click(object sender, EventArgs e)
        {
            this.DialogResult = DialogResult.Cancel;
            this.Close();
        }

        private void btnOK_Click(object sender, EventArgs e)
        {
            if (txtValor.Text != "" && txtValor.Text.Length < internalTamanhoMinimo)
            {
                txtValor.Focus();
                MessageBox.Show("Por favor, preencha corretamente o campo,",
                    "Preenchimento", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }

            this.DialogResult = DialogResult.OK;
            this.Close();
        }

        private void ValoresFrm_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Escape)
            {
                this.DialogResult = DialogResult.Cancel;
                this.Close();
            }
        }

        private void btnTelaAnterior_Click(object sender, EventArgs e)
        {
            this.DialogResult = DialogResult.Retry;
            this.Close();
        }
    }
}
