/*******************************************************************************
  Autor......: EasyTEF Team - 14/08/2011
  Objetivo...: Fazer um exemplo simples e direto da utilização do componente
               EasyTEFCliSiTef numa tela de frente de caixa. Este exemplo
               implementa os tratamentos mínimos necessários para a
               certificação.

  Comentários: Este tela não deve ser usada como referência para uma
               aplicação comercial (AC) mais completa, mas sim como guia para
               uso dos métodos e tratamentos a serem feitos na utilização do
               componente TEasyTEFCliSiTef.

               Os tratamentos quanto a ECF, como por exemplo, abrir a tela
               com cupom fiscal já aberto, troco, etc., devem ser feitos pela
               AC e não são tratados neste exemplo.
*******************************************************************************/

using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using FiscalPrinterBematech;
using Microsoft.VisualBasic;
using EasyTEFSiTef;
using stdole;
using System.Runtime.InteropServices;
using System.Runtime.InteropServices.ComTypes;
using System.Xml;
using System.IO;

namespace exemplo
{

    // não esquecer de implementar a interface  ↓ IEasyTEFCliSiTefEvents
    public partial class FrenteCaixaFrm : Form, IEasyTEFCliSiTefEvents 
    {
        const int ECF_RETORNO_OK = 1;
        const string FORMA_PGTO_CARTAO = "Cartao";
        const string FORMA_PGTO_CHEQUE = "Cheque";
        const string FORMA_PGTO_DINHEIRO = "Dinheiro";
        const string CUPOM_ABERTO = "\\CupomAberto.txt";

        private EasyTEFCliSiTef EasyTEF;
        private int retorno; // Valor de retorno da execução dos comandos da ECF
        private int seq; // Sequencial usado para display do número do produto no cupom fiscal
        private double total; // Valor total dos ítens do cupom passado à tela de fechamento de cupom fiscal
        private string numeroCupom; // Número do cupom fiscal atual
        private bool usuarioNaoQuerOutraFormaPgto = false;
        private double valorTotal = 0;

        // variáveis para configuração de eventos
        private int cookie = -1;
        private IConnectionPoint icp = null;

        // métodos para os eventos, o form deve implementar a interface de eventos e os mesmos devem ser public
        public void OnEfetuarFormaPagamento(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            string valor1 = Convert.ToString(((object[])(parametros))[0]);
            string valor2 = Convert.ToString(((object[])(parametros))[1]);
            operacaoECFOk = BemaFI32.Bematech_FI_EfetuaFormaPagamento(
                valor1, valor2) == ECF_RETORNO_OK;
        }

        public void OnEncerrarCupomFiscal()
        {
            BemaFI32.Bematech_FI_FechaComprovanteNaoFiscalVinculado();
            BemaFI32.Bematech_FI_CancelaCupom();
        }

        public void OnFecharComprovanteNaoFiscalVinculado(ref bool OperacaoECFOK)
        {
            OperacaoECFOK = BemaFI32.Bematech_FI_FechaComprovanteNaoFiscalVinculado() == ECF_RETORNO_OK;
        }

        public void OnFecharRelatorioGerencial(ref bool operacaoECFOk)
        {
            operacaoECFOk = BemaFI32.Bematech_FI_FechaRelatorioGerencial() == ECF_RETORNO_OK;
        }

        public void OnImprimirRelatorioGerencial(object imagemCupomTEF, ref bool impressaoOk)
        {
            string valor1, valor2, valor3;
            valor1 = Convert.ToString(((object[])(imagemCupomTEF))[0]);
            valor2 = Convert.ToString(((object[])(imagemCupomTEF))[1]);
            valor3 = Convert.ToString(((object[])(imagemCupomTEF))[2]);
            impressaoOk = BemaFI32.Bematech_FI_RelatorioGerencial(valor1 + "\r\n" +
                valor2 + "\r\n" + valor3 + "\r\n") == ECF_RETORNO_OK;
        }

        public void OnIniciarFechamentoCupomFiscal(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            string valor1, valor2, valor3;
            valor1 = Convert.ToString(((object[])(parametros))[0]);
            valor2 = Convert.ToString(((object[])(parametros))[1]);
            valor3 = Convert.ToString(((object[])(parametros))[2]);

            operacaoECFOk = BemaFI32.Bematech_FI_IniciaFechamentoCupom(
                valor1, valor2, valor3) == ECF_RETORNO_OK;
        }

        public void OnTerminarFechamentoCupom(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            string valor1 = Convert.ToString(((object[])(parametros))[0]);
            operacaoECFOk = BemaFI32.Bematech_FI_TerminaFechamentoCupom(valor1) == ECF_RETORNO_OK;
            EasyTEF.ExcluirArquivo(Application.StartupPath + CUPOM_ABERTO);
        }

        public void OnTerminarCancelamentoMultiplosCartoes()
        {
            mmoCupomFiscal.Text = "";
            habilitarBotoes(false);
            limparFormasPgto();
        }

        public void OnUsarComprovanteNaoFiscalVinculado(object imagemCupomTEF, ref bool impressaoOk)
        {
            string valor1, valor2, valor3;

            valor1 = valor2 = valor3 = "";

            if (((object[])(imagemCupomTEF)).Length >= 1)
                valor1 = Convert.ToString(((object[])(imagemCupomTEF))[0]);
            if (((object[])(imagemCupomTEF)).Length >= 2)
                valor2 = Convert.ToString(((object[])(imagemCupomTEF))[1]);
            if (((object[])(imagemCupomTEF)).Length >= 3)
                valor3 = Convert.ToString(((object[])(imagemCupomTEF))[2]);

            impressaoOk = BemaFI32.Bematech_FI_UsaComprovanteNaoFiscalVinculado(
                valor1 + "\r\n" + valor2 + "\r\n" + valor3 + "\r\n") == ECF_RETORNO_OK;
        }

        public void OnSubTotalizarCupom(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            retorno = " ".PadRight(14);
            operacaoECFOk = BemaFI32.Bematech_FI_SubTotal(ref retorno) == ECF_RETORNO_OK;
        }

        public void OnImpressoraTemPapel(ref bool operacaoECFOk)
        {
            /*********************************************************************
             * As 4 linhas ABAIXO devem ser descomentadas se usar ECF ** Física **
             * e a linha operacaoECFOK deve ser comentada.
            **********************************************************************/
            //int a, s1, s2;
            //a = s1 = s2 = 0;
            //BemaFI32.Bematech_FI_VerificaEstadoImpressora(ref a, ref s1, ref s2);
            //operacaoECFOk = (!(s1 >= 128));

            /*********************************************************************
             * As 4 linhas ACIMA devem ser comentadas se usar ECF ** Emulada **
             * e a linha abaixo NÃO deve ser comentada.
            **********************************************************************/
            operacaoECFOk = true;
        }

        public FrenteCaixaFrm()
        {
            InitializeComponent();
        }

        private void carregarEasyTEF()
        {
            string usarTEF = "";
            string noh = "";

            // instancia o componente
            EasyTEF = new EasyTEFCliSiTef();

            // configuração de eventos
			// não esquecer de implementar a interface IEasyTEFCliSiTefEvents
            IConnectionPointContainer icpc = (IConnectionPointContainer)EasyTEF;
            Guid guid = typeof(IEasyTEFCliSiTefEvents).GUID;
            icpc.FindConnectionPoint(ref guid, out icp);
            icp.Advise(this, out cookie);

            XmlTextReader reader = new XmlTextReader(Application.StartupPath + "\\Config.xml");

            while (reader.Read())
            {
                switch (reader.NodeType)
                {
                    case XmlNodeType.Element:
                        noh = reader.Name;
                        break;
                    case XmlNodeType.Text:
                        
                        if (noh == "UsarTEF")
                        {
                            usarTEF = reader.Value;
                            break;
                        }

                        if (noh == "PathCliSiTef32I")
                        {
                            EasyTEF.CaminhoCompletoCliSiTef32I = reader.Value;
                            break;
                        }

                        if (noh == "Host")
                        {
                            EasyTEF.HostSiTef = reader.Value;
                            break;
                        }

                        if (noh == "Loja")
                        {
                            EasyTEF.Loja = reader.Value;
                            break;
                        }

                        if (noh == "Operador")
                        {
                            EasyTEF.Operador = reader.Value;
                            break;
                        }

                        if (noh == "Terminal")
                        {
                            EasyTEF.Terminal = reader.Value;
                            break;
                        }

                        if (noh == "ContraSenhaEasyTEF")
                        {
                            EasyTEF.ContraSenha = reader.Value;
                            break;
                        }

                        break;
                }
            }

            if (usarTEF == "Sim")
                EasyTEF.AutoVerificarTEF = true;

            reader.Close();
        }

        private void adicionarLinhasDisplay(string s){
            mmoCupomFiscal.Text = mmoCupomFiscal.Text + Environment.NewLine + s;
        }

        private void mostrarMsgErroECF(string msg) {
            MessageBox.Show(msg + Convert.ToString(retorno), "Retorno Impressora",
                MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
        }

        private void habilitarBotoes(Boolean habilitar) {
            btnNovo.Enabled = !habilitar;
            btnAdicionarItem.Enabled = habilitar;
            btnCancelarItem.Enabled = habilitar;
            btnCancelarVenda.Enabled = habilitar;
            btnEncerrarVenda.Enabled = habilitar;
            btnAdm.Enabled = !btnAdicionarItem.Enabled;
        }

        private void adicionarProduto() {
            int casasDec;
            string tipoQtd;
            string tipoDesc;
            string desc;

            Cursor = Cursors.WaitCursor;

            if (rbtInteira.Checked)
                tipoQtd = "I";
            else
                tipoQtd = "F";

            if (rbt2Casas.Checked)
                casasDec = 2;
            else
                casasDec = 3;

            if (rbtPercentual.Checked)
                tipoDesc = "%";
            else
                tipoDesc = "$";

            desc = edtDescricao.Text;

            retorno = BemaFI32.Bematech_FI_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, 
                tipoQtd, edtQtde.Text, casasDec, edtValorUnit.Text, tipoDesc, edtValorDesconto.Text);

            if (retorno == ECF_RETORNO_OK)
            {
                seq = seq + 1;
                adicionarLinhasDisplay(seq + "\t" + desc + "\t" +
                    edtQtde.Text + " x " + edtValorUnit.Text);
                total = total + Convert.ToDouble(edtValorUnit.Text) *
                    Convert.ToInt32(edtQtde.Text);
                edtCodigo.Focus();
                btnEncerrarVenda.Enabled = true;
                btnCancelarVenda.Enabled = true;
            }
            else
                mostrarMsgErroECF("Não foi possível adicionar os produto. O código de erro é: ");

            Cursor = Cursors.Default;
        }

        private void cancelarItem() {
            string numero;
            numero = "";

            while (numero == "") {
                numero = Microsoft.VisualBasic.Interaction.InputBox(
                    "Informe o numero do item no cupom",
                    "Informe o numero do item no cupom", "000", 100, 100);
            }

            if (numero.Length == 1)
                numero = "00" + numero;
            else if (numero.Length == 2)
                numero = "0" + numero;

            retorno = BemaFI32.Bematech_FI_CancelaItemGenerico(numero);

            if (!(retorno == ECF_RETORNO_OK))
                mostrarMsgErroECF("Não foi possível cancelar o Item. O código de erro é: ");
            else {
                adicionarLinhasDisplay(" ");
                adicionarLinhasDisplay("Item " + numero + " cancelado");
                adicionarLinhasDisplay(" ");
            }
        }

        private void cancelarVenda() {
            Cursor = Cursors.WaitCursor;

            mmoCupomFiscal.Text = "";
            retorno = BemaFI32.Bematech_FI_CancelaCupom();

            if (!(retorno == ECF_RETORNO_OK))
                mostrarMsgErroECF("Não foi possível cancelar o cupom fiscal. O código de erro é: ");
            else
            {
                habilitarBotoes(false);
                EasyTEF.ExcluirArquivo(Application.StartupPath + CUPOM_ABERTO);
            }

            OnLimparMensagem(true, true);
            limparFormasPgto();
            Cursor = Cursors.Default;
        }

        bool tratarPagamentoComCartao(ref double valorTotalCartao) {
            int i;
            double cartaoAtual = 0;
            string MsgErro = "";
            bool transacaNegada = false;
            TipoFuncaoCliSiTef Funcao;

            EasyTEF.NumeroDeCartoes = 0;
            // conta a quantidade de cartões
            if (edtValorCartao1.Text != "0,00")
                EasyTEF.NumeroDeCartoes++;
            if (edtValorCartao2.Text != "0,00")
                EasyTEF.NumeroDeCartoes++;
            if (edtValorCartao3.Text != "0,00")
                EasyTEF.NumeroDeCartoes++;

            for (i = 1; i <= EasyTEF.NumeroDeCartoes; i++)
            {
                DialogResult result = MessageBox.Show("Pagar com Cartão de Crédito?",
                    "Tipo de Cartão", MessageBoxButtons.YesNo);

                if (result == DialogResult.Yes)
                    Funcao = TipoFuncaoCliSiTef.fcsCredito;
                else
                    Funcao = TipoFuncaoCliSiTef.fcsDebito;

                if (i == 1)
                    cartaoAtual = Convert.ToDouble(edtValorCartao1.Text);
                else if (i == 2)
                    cartaoAtual = Convert.ToDouble(edtValorCartao2.Text);
                else if (i == 3)
                    cartaoAtual = Convert.ToDouble(edtValorCartao3.Text);

                EasyTEF.ExecutarFuncaoSiTef(Funcao, cartaoAtual, numeroCupom, 
                    DateTime.Now, DateTime.Now, "", FORMA_PGTO_CARTAO, ref MsgErro);

                if (MsgErro != "" && MsgErro != null)
                {
                    MessageBox.Show(MsgErro, "TEF", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                }

                transacaNegada = ((transacaNegada) || 
                    ((EasyTEF.TransacaoNegada) && (EasyTEF.NumeroDeCartoes > 1)));

                if (!(EasyTEF.TransacaoAprovada))
                    return false;
            }

            if (usuarioNaoQuerOutraFormaPgto)
            {
                return false;
            }

            return true;
        }

        private void limparFormasPgto() {

            edtValorDinheiro.Text = "0,00";
            edtValorCheque.Text = "0,00";
            edtValorCartao1.Text = "0,00";
            edtValorCartao2.Text = "0,00";
            edtValorCartao3.Text = "0,00";
        }

        private void encerrarVenda() {
            double valorDinheiro, valorCheque, valorCartao;
            object [] parametros;
            string desconto, tipoDesc, valor;
            bool operacaoECFOK;
            double valorTotalCartao = 0;

            Cursor = Cursors.WaitCursor;

            try
            {
                parametros = new object[1];
                parametros[0] = "";
                operacaoECFOK = false;
                valorDinheiro = valorCheque = valorCartao = 0;
                valorTotal = Convert.ToDouble(EasyTEF.TratarCupomFiscal(
                    MetodoECF.tmeSubTotalizarCupom, parametros, operacaoECFOK)) / 100;

                if (valorTotal == 0)
                {
                    MessageBox.Show("Cupom fiscal sem valor, operação cancelada.",
                        "Cupom Fiscal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }
                else
                {
                    valorDinheiro = Convert.ToDouble(edtValorDinheiro.Text);
                    valorCheque = Convert.ToDouble(edtValorCheque.Text);
                    valorCartao = Convert.ToDouble(edtValorCartao1.Text) +
                        Convert.ToDouble(edtValorCartao2.Text) +
                        Convert.ToDouble(edtValorCartao3.Text);

                    if (!((valorTotal) == (valorDinheiro + valorCheque + valorCartao + 
                        obterTotaisCartoesAprovadosAnteriormente())))
                    {
                        MessageBox.Show("Total das formas de pagamento diferente do total do cupom",
                            "Cupom Fiscal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        return;
                    }
                }

                
                if (!tratarPagamentoComCartao(ref valorTotalCartao))
                {
                    return;
                }

                desconto = "D";
                tipoDesc = "$";
                valor = "0";

                parametros = new object[3];
                parametros[0] = desconto;
                parametros[1] = tipoDesc;
                parametros[2] = valor;

                EasyTEF.TratarCupomFiscal(MetodoECF.tmeIniciarFechamentoCupom, parametros, ref operacaoECFOK);

                if (!operacaoECFOK)
                {
                    MessageBox.Show("Não foi possível totalizar o cupom",
                        "Iniciar Fechamento Cupom", MessageBoxButtons.OK,
                        MessageBoxIcon.Warning);
                    limparTela();
                    return;
                }

                parametros = new object[2];

                if (edtValorDinheiro.Text != "0,00")
                {
                    parametros[0] = FORMA_PGTO_DINHEIRO;
                    parametros[1] = valorDinheiro.ToString("#0.00");
                    EasyTEF.TratarCupomFiscal(MetodoECF.tmeEfetuarFormaPagamento, parametros, ref operacaoECFOK);
                    if (!operacaoECFOK)
                    {
                        MessageBox.Show("Não foi possível efetuar a forma de pagamento.",
                            "ECF", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                        limparTela();
                        return;
                    }
                }

                if (edtValorCheque.Text != "0,00")
                {
                    parametros[0] = FORMA_PGTO_CHEQUE;
                    parametros[1] = valorCheque.ToString("#0.00");
                    EasyTEF.TratarCupomFiscal(MetodoECF.tmeEfetuarFormaPagamento, parametros, ref operacaoECFOK);
                    if (!operacaoECFOK)
                    {
                        MessageBox.Show("Não foi possível efetuar a forma de pagamento.",
                            "ECF", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                        limparTela();
                        return;
                    }
                }

                if (!EasyTEF.EfetuarFormasPagamentoCartao())
                {
                    MessageBox.Show("Não foi possível efetuar as forma de pagamento TEF.",
                        "ECF", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                    limparTela();
                    return;
                }

                parametros = new object[1];
                parametros[0] = "Mensagem desejada de fechamento do cupom...";
                EasyTEF.TratarCupomFiscal(MetodoECF.tmeTerminarFechamentoCupom, parametros, ref operacaoECFOK);

                if (!operacaoECFOK)
                {
                    MessageBox.Show("Não foi possível terminar o fechamento do cupom fiscal.",
                        "ECF", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                    limparTela();
                    return;
                }

                EasyTEF.ImprimirCuponsECF();

                limparTela();
            }
            finally
            {
                Cursor = Cursors.Default;
            }
        }

        private void novaVenda() {
            Cursor = Cursors.WaitCursor;

            mmoCupomFiscal.Text = "";
            retorno = BemaFI32.Bematech_FI_AbreCupom("");

            if (!(retorno == ECF_RETORNO_OK))
                mostrarMsgErroECF("Não foi possível abrir o cupom fiscal. A mensagem de erro é: ");
            else {
                // arquivo criado propositalmente para indicar que o cupom fiscal está aberto
                EasyTEF.SalvarArquivoVazio(Application.StartupPath + CUPOM_ABERTO);

                habilitarBotoes(true);
                
                seq = 0;
                total = 0;

                numeroCupom = new string('\x20', 14);
                retorno = BemaFI32.Bematech_FI_NumeroCupom(ref numeroCupom);
                numeroCupom = numeroCupom.Trim();
                adicionarLinhasDisplay("Cupom Fiscal No. " + numeroCupom);
                adicionarLinhasDisplay(" ");
                adicionarLinhasDisplay(" ");
            }

            Cursor = Cursors.Default;
        }

        private void FrenteCaixaFrm_Load(object sender, EventArgs e)
        {
            carregarEasyTEF();
            habilitarBotoes(false);
        }

        private void btnAdicionarItem_Click(object sender, EventArgs e)
        {
            adicionarProduto();
        }

        private void btnAdm_Click(object sender, EventArgs e)
        {
            string MsgErro = "";

            Cursor = Cursors.WaitCursor;
            try{
                EasyTEF.ExecutarFuncaoSiTef(TipoFuncaoCliSiTef.fcsTransacoesGerenciais,
                    1, "123456", DateTime.Now, DateTime.Now, "", "", MsgErro);

                if (MsgErro != "")
                {
                    MessageBox.Show(MsgErro, "Retorno SiTef",
                        MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                    return;
                }

                // se houver cupom tef a ser impresso
                if ((((object[])(EasyTEF.ComprovanteTEF1aVia)).Length > 1) ||
                    (((object[])(EasyTEF.ComprovanteTEF2aVia)).Length > 1)){
                    if (!(EasyTEF.ImprimirRelatorioGerencial(EasyTEF.ComprovanteTEF1aVia, 
                        EasyTEF.ComprovanteTEF2aVia))){
                        MessageBox.Show("Não foi possível imprimir o cupom TEF.", "Impressão cupom TEF",
                            MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                        return;
                    } else
                        EasyTEF.ExcluirArquivo(Application.StartupPath + CUPOM_ABERTO);
                }

            } finally {
                Cursor = Cursors.Default;
            }
        }

        private void btnNovo_Click(object sender, EventArgs e)
        {
            novaVenda();
        }

        private void btnCancelarItem_Click(object sender, EventArgs e)
        {
            cancelarItem();
        }

        private void btnCancelarVenda_Click(object sender, EventArgs e)
        {
            cancelarVenda();
        }

        private void btnEncerrarVenda_Click(object sender, EventArgs e)
        {
            encerrarVenda();
        }

        private void FrenteCaixaFrm_FormClosing(object sender, FormClosingEventArgs e)
        {
            icp.Unadvise(cookie);
            //EasyTEF = null;
        }

        private void FrenteCaixaFrm_KeyUp(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.F3 && btnAdicionarItem.Enabled)
                adicionarProduto();
            else if (e.KeyCode == Keys.F4 && btnNovo.Enabled)
                novaVenda();
            else if (e.KeyCode == Keys.F5 && btnCancelarItem.Enabled)
                cancelarItem();
            else if (e.KeyCode == Keys.F6 && btnCancelarVenda.Enabled)
                cancelarVenda();
            else if (e.KeyCode == Keys.F7 && btnEncerrarVenda.Enabled)
                encerrarVenda();
        }

        private void btnFechar_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        public void OnGuilhotinar2aViaCupomTEF()
        {
            // colocar aqui o comando da ECF que faz o corte do papel
        }

        public void OnImprimirLeituraX(ref bool operacaoECFOk)
        {
            operacaoECFOk = true;
        }


        public void OnAbrirRelatorioGerencial()
        {
            //throw new NotImplementedException();
        }

        public void OnAguardarTeclaOperador(string Mensagem)
        {
            if (Mensagem == "")
                MessageBox.Show("Por favor, pressione <Enter>", "",
                    MessageBoxButtons.OK, MessageBoxIcon.Information);
            else
                MessageBox.Show(Mensagem, "",
                    MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        public void OnExibirMensagem(bool TelaOperador, bool TelaCliente, string Mensagem)
        {
            if (TelaOperador)
                txtMsgOperador.Text = Mensagem;

            if (TelaCliente)
                txtMsgCliente.Text = Mensagem;

        }

        public void OnExibirMenuOpcoesOperador(string Caption, object Opcoes, ref string OpcaoEscolhida, ref TipoContinuacaoColeta TipoContinuacao)
        {
            MenuOperadorFrm f = new MenuOperadorFrm();
            f.Text = Caption;
            try
            {
                f.menuOpcoes = Opcoes;
                f.ShowDialog();
                OpcaoEscolhida = f.opcao;
                TipoContinuacao = TipoContinuacaoColeta.tccContinuar;
                if (f.DialogResult == DialogResult.Cancel)
                    TipoContinuacao = TipoContinuacaoColeta.tccInterromper;
                else if (f.DialogResult == DialogResult.Retry)
                    TipoContinuacao = TipoContinuacaoColeta.tccMenuAnterior;
            }
            catch (Exception e)
            {
                MessageBox.Show("Erro no evento OnExibirMenuOpcoesOperador: \n\r" +
                    e.Message, "Problema encontrado", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

        }

        public void OnLerDadosDiversos(string Mensagem, TipoDadosDiversos TipoDeDados, ref string DadoLido, ref TipoContinuacaoColeta TipoContinuacao)
        {
            ValoresFrm f = new ValoresFrm();
            string msg = "";
            string capt = "";
            
            msg = Mensagem;
            capt = "Por favor, informe ";

            try
            {
                switch (TipoDeDados)
                {
                    case TipoDadosDiversos.tddCheque: capt = capt + "o número do cheque"; break;
                    case TipoDadosDiversos.tddMonetario: capt = capt + "o valor"; break;
                    case TipoDadosDiversos.tddCodigoDeBarras: capt = capt + "o número do código de barras"; break;
                }

                f.Text = capt;
                f.escreverMensagem(msg);
                f.ShowDialog();
                DadoLido = f.dadoLido;
                TipoContinuacao = TipoContinuacaoColeta.tccContinuar;
                if (f.DialogResult == DialogResult.Cancel)
                    TipoContinuacao = TipoContinuacaoColeta.tccInterromper;
                else if (f.DialogResult == DialogResult.Retry)
                    TipoContinuacao = TipoContinuacaoColeta.tccMenuAnterior;
            }
            catch (Exception e)
            {
                MessageBox.Show("Erro no evento OnLerDadosDiversos: \n\r" +
                    e.Message, "Problema encontrado", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

        }

        public void OnLerRespostaBooleana(string Mensagem, ref bool Resposta)
        {
            string msg = "";
            
            msg = Mensagem;
            if (msg == "")
                msg = "Confirmar esta operação?";

            Resposta = MessageBox.Show(Mensagem, "Confirmação",
                MessageBoxButtons.YesNo, MessageBoxIcon.Warning) == DialogResult.Yes;
        }

        public void OnLerValor(string Mensagem, int TamanhoMinimo, int TamanhoMaximo, ref string ValorLido, ref TipoContinuacaoColeta TipoContinuacao)
        {
            ValoresFrm f = new ValoresFrm();
            try
            {
                f.tamanhoMinimo = TamanhoMinimo;
                f.tamanhoMaximo = TamanhoMaximo;
                f.escreverMensagem(Mensagem);
                // mascarar a senha do supervisor
                if ((EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReImpressaoPagamentoConta) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReimpressao) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReimpressaoUltimoComprovante) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReimpressaoEspecifica) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReimpressaoLojista) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReimpressaoPortadorCartao) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdTodasAsReimpressoes) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReimpressaoEspecificaRedecard) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdReimpressaoEspecificaVisanet) ||
                    (EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdCancelamentoTransacaoCartaoCreditoDebito))
                    f.ligarModoSenha = true;

                f.ShowDialog();
                ValorLido = f.dadoLido;

                if ((EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdCartaoDebitoPreDatado) &&
                    (ValorLido == ""))
                    ValorLido = String.Format("{0:ddmmyyyy}", DateAndTime.Now.AddDays(30));
                else if ((EasyTEF.OperacaoAtualDaColetaDeDados == CampoColetaDados.ccdNone) &&
                    (Mensagem.Contains("DDMMAAAA")) &&
                    (ValorLido == ""))
                    ValorLido = String.Format("{0:ddmmyyyy}", DateAndTime.Now);

                TipoContinuacao = TipoContinuacaoColeta.tccContinuar;
                if (f.DialogResult == DialogResult.Cancel)
                    TipoContinuacao = TipoContinuacaoColeta.tccInterromper;
                else if (f.DialogResult == DialogResult.Retry)
                    TipoContinuacao = TipoContinuacaoColeta.tccMenuAnterior;
            }
            catch (Exception e)
            {
                MessageBox.Show("Erro no evento OnLerValor: \n\r" +
                    e.Message, "Problema encontrado", MessageBoxButtons.OK, MessageBoxIcon.Error);
            } 
        }

        public void OnLimparMensagem(bool TelaOperador, bool TelaCliente)
        {
            if (TelaCliente)
                txtMsgCliente.Text = "";

            if (TelaOperador)
                txtMsgOperador.Text = "";
        }

        public void OnVerificarCupomFiscalAberto(ref bool CupomFiscalAberto)
        {
            CupomFiscalAberto = File.Exists(Application.StartupPath + "\\CupomAberto.txt");
        }


        public void OnAposTransacaoNegada(bool NaoContinuar)
        {
            usuarioNaoQuerOutraFormaPgto = NaoContinuar;
            if (!usuarioNaoQuerOutraFormaPgto)
            {
                edtValorCartao1.Text = "0,00";
                edtValorCartao2.Text = "0,00";
                edtValorCartao3.Text = "0,00";
                edtValorDinheiro.Focus();
                // sugere Dinheiro como a forma de pagamento para encerrar o cupom
                edtValorDinheiro.Text = ((double)(valorTotal - 
                    obterTotaisCartoesAprovadosAnteriormente())).ToString("#0.00");
            }
        }

        private void limparTela()
        {
            mmoCupomFiscal.Text = "";
            habilitarBotoes(false);
            limparFormasPgto();
        }

        private double obterTotaisCartoesAprovadosAnteriormente()
        {
            double retorno = 0;

            for (int i = 0; i < ((object[])EasyTEF.ValoresCadaCartao).Length; i++)
                retorno = retorno + Convert.ToDouble(((object[])EasyTEF.ValoresCadaCartao)[i]);

            return retorno;
        }

        public void OnAbrirComprovanteNaoFiscalVinculado(ref bool OperacaoECFOK, string NomeFormaPagamento, double ValorCupom)
        {
            OperacaoECFOK = BemaFI32.Bematech_FI_AbreComprovanteNaoFiscalVinculado(
                NomeFormaPagamento, ValorCupom.ToString("#0.00"), numeroCupom.Trim()) == ECF_RETORNO_OK;
        }


        public void OnInterromperColetaDados(ref TipoContinuacaoColeta TipoContinuacaoColeta)
        {
            // throw new NotImplementedException();

            TipoContinuacaoColeta = EasyTEFSiTef.TipoContinuacaoColeta.tccContinuar;
        }
    }
}