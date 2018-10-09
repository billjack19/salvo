using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace exemplo
{
    
    public partial class MenuOperadorFrm : Form
    {
        public RadioButton[] grupoOpcoes;
        public int countOpcoes = 0;
        private string internalOpcao = "";
        private object internalMenuOpcoes = null;

        public string opcao
        {
            get
            {
                return internalOpcao;
            }
        }

        public GroupBox grupo
        {
            get
            {
                return this.gbOpcoes;
            }

            set
            {
                this.gbOpcoes = value;
            }
        }

        public object menuOpcoes
        {
            set
            {
                internalMenuOpcoes = value;
                grupoOpcoes = new RadioButton[((object[])internalMenuOpcoes).Length];
            }
        }

        public MenuOperadorFrm()
        {
            InitializeComponent();
        }

        private bool fechar()
        {
            bool algumMarcado = false;

            for (int i = 0; i < ((object[])internalMenuOpcoes).Length && !algumMarcado; i++)
            {
                algumMarcado = grupoOpcoes[i].Checked;
                if (algumMarcado)
                    internalOpcao = grupoOpcoes[i].Text;
            }

            if (!(algumMarcado))
            {
                MessageBox.Show("Por favor, escolha uma das opções.",
                    "Opções", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return false;
            }

            internalOpcao = internalOpcao.Replace("&", "");
            return true;
        }

        private void MenuOperadorFrm_KeyUp(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter)
            {
                if (fechar())
                {
                    this.DialogResult = DialogResult.OK;
                    this.Close();
                }
            }
            else if (e.KeyCode == Keys.Escape)
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

        private void MenuOperadorFrm_Shown(object sender, EventArgs e)
        {
            for (int i = 0; i < ((object[])internalMenuOpcoes).Length; i++)
            {
                grupoOpcoes[i] = new RadioButton();
                grupoOpcoes[i].AutoSize = true;
                grupoOpcoes[i].Text = "&" + Convert.ToString(((object[])(internalMenuOpcoes))[i]);
                grupoOpcoes[i].Location = new System.Drawing.Point(10, 15 + i * 20);
                grupo.Controls.Add(grupoOpcoes[i]);
            }
        }

        private void btnOK_Click(object sender, EventArgs e)
        {
            if (fechar())
            {
                this.DialogResult = DialogResult.OK;
                this.Close();
            }
        }

        private void btnFechar_Click(object sender, EventArgs e)
        {
            this.DialogResult = DialogResult.Cancel;
            this.Close();
        }
    }
}
