/*******************************************************************************
  Autor......: EasyTEF Team - 02/02/2008
  Objetivo...: Fazer um exemplo simples e direto da utilização do componente
               TEasyTEFDiscado numa tela de frente de caixa. Este exemplo
               implementa os tratamentos mínimos necessários para a
               certificação.

  Comentários: Este tela não deve ser usada como referência para uma
               aplicação comercial (AC) mais completa, mas sim como guia para
               uso dos métodos e tratamentos a serem feitos na utilização do
               componente TEasyTEFDiscado.

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
using ECFSweda;
using DFW;
using Microsoft.VisualBasic;
using EasyTEF;
using System.Xml;
using stdole;
using System.Runtime.InteropServices;
using System.Runtime.InteropServices.ComTypes;

namespace exemplo
{

    // não esquecer de implementar a interface  ↓ IEasyTEFDiscadoEvents
    public partial class FrenteCaixaFrm : Form, IEasyTEFDiscadoEvents
    {
        const int ECF_RETORNO_OK = 1;
        const string FORMA_PGTO_CARTAO = "Cartao";
        const string FORMA_PGTO_CHEQUE = "Cheque";
        const string FORMA_PGTO_DINHEIRO = "Dinheiro";

        private EasyTEF.EasyTEFDiscado EasyTEF;
        private int retorno; // Valor de retorno da execução dos comandos da ECF
        private int seq; // Sequencial usado para display do número do produto no cupom fiscal
        private double total; // Valor total dos ítens do cupom passado à tela de fechamento de cupom fiscal
        private string numeroCupom; // Número do cupom fiscal atual
        private double descontoCielo, saqueCielo = 0;

        // variáveis para configuração de eventos
        private int cookie = -1;
        private IConnectionPoint icp = null;

        // métodos para os eventos, o form deve implementar a interface de eventos e os mesmos devem ser public
        public void OnEfetuarFormaPagamento(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            string valor1 = Convert.ToString(((object[])(parametros))[0]);
            string valor2 = Convert.ToString(((object[])(parametros))[1]);
            if (rbtBematech.Checked)
                operacaoECFOk = BemaFI32.Bematech_FI_EfetuaFormaPagamento(
                    valor1, valor2) == ECF_RETORNO_OK;
            else if (rbtDarumaFW.Checked)
                operacaoECFOk = DarumaFramework.iCFEfetuarPagamentoFormatado_ECF_Daruma(
                    valor1, valor2) == ECF_RETORNO_OK;
            else if (rbtSweda.Checked)
                operacaoECFOk = Sweda.ECF_EfetuaFormaPagamento(
                    valor1, valor2) == ECF_RETORNO_OK;
        }

        public void OnEncerrarCupomFiscal()
        {
            if (rbtBematech.Checked)
            {
                BemaFI32.Bematech_FI_FechaComprovanteNaoFiscalVinculado();
                BemaFI32.Bematech_FI_CancelaCupom();
            }
            else if (rbtDarumaFW.Checked)
            {
                DarumaFramework.iCCDFechar_ECF_Daruma();
                DarumaFramework.iCFCancelar_ECF_Daruma();
            }
            else if (rbtSweda.Checked)
            {
                Sweda.ECF_FechaComprovanteNaoFiscalVinculado();
                Sweda.ECF_CancelaCupom();
            }
        }

        public void OnFecharComprovanteNaoFiscalVinculado()
        {
            if (rbtBematech.Checked)
                BemaFI32.Bematech_FI_FechaComprovanteNaoFiscalVinculado();
            else if (rbtDarumaFW.Checked)
                DarumaFramework.iCCDFechar_ECF_Daruma();
            else if (rbtSweda.Checked)
                Sweda.ECF_FechaComprovanteNaoFiscalVinculado();
        }

        public void OnFecharRelatorioGerencial(ref bool operacaoECFOk)
        {
            if (rbtBematech.Checked)
                operacaoECFOk = BemaFI32.Bematech_FI_FechaRelatorioGerencial() == ECF_RETORNO_OK;
            else if (rbtDarumaFW.Checked)
                operacaoECFOk = DarumaFramework.iRGFechar_ECF_Daruma() == ECF_RETORNO_OK;
            else if (rbtSweda.Checked)
                operacaoECFOk = Sweda.ECF_FechaRelatorioGerencial() == ECF_RETORNO_OK;
        }

        public void OnImprimirRelatorioGerencial(object ImagemCupomTEF, ref bool operacaoECFOK)
        {
            operacaoECFOK = true;
            string linha = "";
            int limiteSuperio = ((object[])(ImagemCupomTEF)).Length;

            for (int i = 0; i < limiteSuperio && operacaoECFOK; i++)
            {
                linha = Convert.ToString(((object[])(ImagemCupomTEF))[i]);
                if (rbtBematech.Checked)
                    operacaoECFOK = operacaoECFOK &&
                        BemaFI32.Bematech_FI_RelatorioGerencial(linha) == ECF_RETORNO_OK;
                else if (rbtDarumaFW.Checked)
                    operacaoECFOK = operacaoECFOK &&
                        DarumaFramework.iRGImprimirTexto_ECF_Daruma(linha) == ECF_RETORNO_OK;
                else if (rbtSweda.Checked)
                    operacaoECFOK = operacaoECFOK &&
                        Sweda.ECF_RelatorioGerencial(linha) == ECF_RETORNO_OK;
            }
        }

        public void OnIniciarFechamentoCupomFiscal(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            string valor1, valor2, valor3;
            valor1 = Convert.ToString(((object[])(parametros))[0]);
            valor2 = Convert.ToString(((object[])(parametros))[1]);
            valor3 = Convert.ToString(((object[])(parametros))[2]);

            if (rbtBematech.Checked)
                operacaoECFOk = BemaFI32.Bematech_FI_IniciaFechamentoCupom(
                    valor1, valor2, valor3) == ECF_RETORNO_OK;
            else if (rbtDarumaFW.Checked)
                operacaoECFOk = DarumaFramework.iCFTotalizarCupom_ECF_Daruma(valor2,
                    valor3) == ECF_RETORNO_OK;
            else if (rbtSweda.Checked)
                operacaoECFOk = Sweda.ECF_IniciaFechamentoCupom(
                    valor1, valor2, valor3) == ECF_RETORNO_OK;
        }

        public void OnTerminarFechamentoCupom(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            string valor1 = Convert.ToString(((object[])(parametros))[0]);
            if (rbtBematech.Checked)
                operacaoECFOk = BemaFI32.Bematech_FI_TerminaFechamentoCupom(valor1) == ECF_RETORNO_OK;
            else if (rbtDarumaFW.Checked)
                operacaoECFOk = DarumaFramework.iCFEncerrarConfigMsg_ECF_Daruma(valor1) == ECF_RETORNO_OK;
            else if (rbtSweda.Checked)
                operacaoECFOk = Sweda.ECF_TerminaFechamentoCupom(valor1) == ECF_RETORNO_OK;
        }

        public void OnTerminarCancelamentoMultiplosCartoes()
        {
            mmoCupomFiscal.Text = "";
            habilitarBotoes(false);
            limparFormasPgto();
        }

        public void OnUsarComprovanteNaoFiscalVinculado(object ImagemCupomTEF, ref bool operacaoECFOK)
        {
            operacaoECFOK = true;
            String linha = "";
            int limiteSuperior = ((object[])(ImagemCupomTEF)).Length;

            for (int i = 0; i < limiteSuperior && operacaoECFOK; i++)
            {
                linha = Convert.ToString(((object[])(ImagemCupomTEF))[i]);
                if (rbtBematech.Checked)
                    operacaoECFOK = operacaoECFOK &&
                        BemaFI32.Bematech_FI_UsaComprovanteNaoFiscalVinculado(linha) == ECF_RETORNO_OK;
                else if (rbtDarumaFW.Checked)
                    operacaoECFOK = operacaoECFOK &&
                        DarumaFramework.iCCDImprimirTexto_ECF_Daruma(linha) == ECF_RETORNO_OK;
                else if (rbtSweda.Checked)
                    operacaoECFOK = operacaoECFOK &&
                        Sweda.ECF_UsaComprovanteNaoFiscalVinculado(linha) == ECF_RETORNO_OK;
            }
        }

        public void OnSubTotalizarCupom(ref bool operacaoECFOk, object parametros, ref string retorno)
        {
            if (rbtBematech.Checked)
            {
                retorno = " ".PadRight(14);
                operacaoECFOk = BemaFI32.Bematech_FI_SubTotal(ref retorno) == ECF_RETORNO_OK;
            }
            else if (rbtDarumaFW.Checked)
            {
                StringBuilder SubTotal = new StringBuilder(11);
                operacaoECFOk = DarumaFramework.rCFSubTotal_ECF_Daruma(SubTotal) == ECF_RETORNO_OK;
                retorno = SubTotal.ToString();
            }
            else if (rbtSweda.Checked)
            {
                retorno = " ".PadRight(14);
                operacaoECFOk = Sweda.ECF_SubTotal(ref retorno) == ECF_RETORNO_OK;
            }
        }

        public void OnValorPersonalizadoReq(ref string campo, ref string valor)
        {

        }

        public void OnEfetuarFormaPagamentoDescricaoForma(ref bool operacaoECFOk, object parametros, ref string retorno)
        {

        }

        public void OnImpressoraTemPapel(ref bool operacaoECFOk)
        {
            /**********************************************************************
            * As linhas ABAIXO devem ser descomentadas se usar ECF ** Física **
            * e a linha operacaoECFOK = true DEVE ser comentada.
            **********************************************************************/
            /*
            int a, s1, s2;
            a = 0;
            s1 = 0;
            s2 = 0;

            if (rbtBematech.Checked)
            {
                BemaFI32.Bematech_FI_VerificaEstadoImpressora(ref a, ref s1, ref s2);
                operacaoECFOk = (!(s1 >= 128));
            }
            else if (rbtDarumaFW.Checked)
            {
                StringBuilder aviso = new StringBuilder(300);
                StringBuilder erro = new StringBuilder(300);

                DarumaFramework.eRetornarAvisoErroUltimoCMD_ECF_Daruma(aviso, erro);
                operacaoECFOk = (!(aviso.ToString().ToLower() == "fim do papel"));
            }
            else if (rbtSweda.Checked)
            {
                Sweda.ECF_VerificaEstadoImpressora(ref a, ref s1, ref s2);
                operacaoECFOk = (!(s1 >= 128));
            }
             * /

            /**********************************************************************
            * As linhas ACIMA devem ser comentadas se usar ECF ** Emulada **
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
            // configuração de fonte do form de mensagens
            string usarTEF = "";
            string noh = "";

            IFontDisp f = new StdFontClass() as IFontDisp;
            f.Name = "Tahoma";
            f.Size = 9;

            try
            {
                // instancia o componente
                EasyTEF = new EasyTEFDiscado();

                // configuração de eventos
                // não esquecer de implementar a interface IEasyTEFDiscadoEvents
                IConnectionPointContainer icpc = (IConnectionPointContainer)EasyTEF;
                Guid guid = typeof(IEasyTEFDiscadoEvents).GUID;
                icpc.FindConnectionPoint(ref guid, out icp);
                icp.Advise(this, out cookie);

                // lê a configuração do sistema
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

                            if (noh == "ContraSenha")
                            {
                                EasyTEF.ContraSenha = reader.Value;
                                break;
                            }

                            if (noh == "UsarD-TEF")
                            {
                                EasyTEF.UsarDTEF = (reader.Value == "Sim");
                                chkUsarDTEF.Checked = EasyTEF.UsarDTEF;
                                break;
                            }

                            break;
                    }
                }

                reader.Close();

                // configuração do EasyTEFDiscado
                EasyTEF.FormMsgOperador.Fonte = f;
                EasyTEF.FormMsgOperador.Altura = 110;
                EasyTEF.FormMsgOperador.Largura = 400;
                EasyTEF.FormMsgOperador.BotaoOK.Altura = 25;
                EasyTEF.FormMsgOperador.BotaoOK.Largura = 75;

                EasyTEF.CieloPremia.RazaoSocialSW = "EasyTEF";
                EasyTEF.CieloPremia.VersaoSW = "Exemplo EasyTEF 2013";
                EasyTEF.CieloPremia.Tipo = TipoCieloPremia.tcpAmbas;

                EasyTEF.Gerenciador = TipoGerenciador.tgGerenciadorPadrao;
                // a contra senha é diferente de um computador para outro.
                // o ideal é que ela seja lida a apartir de um .xml
                // para desenvolvimento, executar GerarSenhaDiscado.exe e entrar 
                // em contato com o EasyTEF Team para liberação da contra senha.
                if (usarTEF == "Sim")
                    EasyTEF.AutoVerificarTEF = true;
            }
            catch (Exception e)
            {
                MessageBox.Show("Erro ao carregar a biblioteca EasyTEF: \r\n\r\n" +
                    e.Message, "Carregar EasyTEF", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

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
            {
                if (!(rbtDarumaFW.Checked))
                    tipoDesc = "%";
                else
                    tipoDesc = "D%";
            }
            else
            {
                if (!(rbtDarumaFW.Checked))
                    tipoDesc = "$";
                else
                    tipoDesc = "D$";
            }

            desc = edtDescricao.Text;

            if (rbtBematech.Checked)
                retorno = BemaFI32.Bematech_FI_VendeItem(edtCodigo.Text, desc, edtAliquota.Text,
                    tipoQtd, edtQtde.Text, casasDec, edtValorUnit.Text, tipoDesc, edtValorDesconto.Text);
            else if (rbtDarumaFW.Checked)
                retorno = DarumaFramework.iCFVender_ECF_Daruma(edtAliquota.Text, edtQtde.Text,
                    edtValorUnit.Text, tipoDesc, edtValorDesconto.Text, edtCodigo.Text, "UN",
                    edtDescricao.Text);
            else if (rbtSweda.Checked)
                retorno = Sweda.ECF_VendeItem(edtCodigo.Text, desc, edtAliquota.Text,
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

            if (rbtBematech.Checked)
                retorno = BemaFI32.Bematech_FI_CancelaItemGenerico(numero);
            else if (rbtDarumaFW.Checked)
                retorno = DarumaFramework.iCFCancelarItem_ECF_Daruma(numero);
            else if (rbtSweda.Checked)
                retorno = Sweda.ECF_CancelaItemGenerico(numero);

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
            limparFormasPgto();

            if (rbtBematech.Checked)
                retorno = BemaFI32.Bematech_FI_CancelaCupom();
            else if (rbtDarumaFW.Checked)
                retorno = DarumaFramework.iCFCancelar_ECF_Daruma();
            else if (rbtSweda.Checked)
                retorno = Sweda.ECF_CancelaCupom();

            if (!(retorno == ECF_RETORNO_OK))
                mostrarMsgErroECF("Não foi possível cancelar o cupom fiscal. O código de erro é: ");
            else
            {
                EasyTEF.CancelarVendasPendentes();
                habilitarBotoes(false);
            }

            Cursor = Cursors.Default;
        }

        bool tratarPagamentoComCartao(ref double valorCartao)
        {
            int i;
            bool retorno;

            valorCartao = 0;
            retorno = true;

            EasyTEF.NumeroDeCartoes = 0;
            if (Convert.ToDouble(edtValorCartao1.Text) > 0)
            {
                EasyTEF.NumeroDeCartoes++;
                if (Convert.ToDouble(edtValorCartao2.Text) > 0)
                {
                    EasyTEF.NumeroDeCartoes++;
                    if (Convert.ToDouble(edtValorCartao3.Text) > 0)
                    {
                        EasyTEF.NumeroDeCartoes++;
                    }
                }
            }

            EasyTEF.ImprimirComprovante = false;

            for (i = 1; i <= EasyTEF.NumeroDeCartoes; i++)
            {
                if (i == 1)
                    valorCartao = Convert.ToDouble(edtValorCartao1.Text);
                else if (i == 2)
                    valorCartao = Convert.ToDouble(edtValorCartao2.Text);
                else if (i == 3)
                    valorCartao = Convert.ToDouble(edtValorCartao3.Text);

                EasyTEF.PagarNoCartao(valorCartao, 0, numeroCupom, i == 1,
                    i == EasyTEF.NumeroDeCartoes, FORMA_PGTO_CARTAO);

                retorno = EasyTEF.TransacaoAprovada;

                if (!(retorno))
                {
                    MessageBox.Show("Não foi possível terminar o pagamento com cartão.",
                        "TEF", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                    return false;
                }
                else 
                { 
                    descontoCielo += EasyTEF.ValorCampo709_000;
                    saqueCielo += EasyTEF.ValorCampo708_000;
                }

                // Caso fosse necessário mudar a descrição da forma de pagamento
                // após a transação ser aprovada, o método a ser usado é o seguinte
                //
                //EasyTEF.AlterarNomeUltimaFormaPagamento(NomeDaFormaDePagamento);
            }

            return retorno;

        }

        public bool tratarPagamentoComCartao(object[,] Cartoes)
        {
            bool retorno = true;
            double valorCartao;

            EasyTEF.NumeroDeCartoes = 0;
            // EasyTEF Team - Se foi passado corretamente o array de cartões
            if (Cartoes.GetType().IsArray){

                EasyTEF.ImprimirComprovante = false;
                EasyTEF.NumeroDeCartoes = Cartoes.GetLength(0);

                for (int i = 0; i < Cartoes.GetLength(0); i++)
                {
                    valorCartao = Convert.ToDouble(Cartoes[i,0]);
                
                    EasyTEF.PagarNoCartao(valorCartao, 0, numeroCupom, i == 0,
                        i == EasyTEF.NumeroDeCartoes-1, Convert.ToString(Cartoes[i,1]));

                    retorno = EasyTEF.TransacaoAprovada;

                    if (!(retorno))
                    {
                        MessageBox.Show("Não foi possível terminar o pagamento com cartão.",
                            "TEF", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                        return false;
                    }
                    else
                    {
                        descontoCielo += EasyTEF.ValorCampo709_000;
                        saqueCielo += EasyTEF.ValorCampo708_000;
                    }

                    // Caso fosse necessário mudar a descrição da forma de pagamento
                    // após a transação ser aprovada, o método a ser usado é o seguinte
                    //
                    //EasyTEF.AlterarNomeUltimaFormaPagamento(NomeDaFormaDePagamento);
                }
            }

            return retorno;

        }

        private void limparFormasPgto() {

            chkConsultaSerasa.Checked = false;

            edtValorDinheiro.Text = "0,00";
            edtValorCheque.Text = "0,00";
            edtValorCartao1.Text = "0,00";
            edtValorCartao2.Text = "0,00";
            edtValorCartao3.Text = "0,00";

        }

        private void encerrarVenda() {
            double valorTotal, valorDinheiro, valorCheque, valorCartao = 0;
            object [] parametros;
            string desconto, tipoDesc, valor = "";
            bool operacaoECFOK = false;

            Cursor = Cursors.WaitCursor;

            try
            {
                // iniciar as variáveis
                parametros = new object[1];
                parametros[0] = "0,00";

                // obtem o total do cupom fiscal
                // esta chamada é obrigatória mesmo que não se deseje obter o total do cupom fiscal
                valorTotal = Convert.ToDouble(EasyTEF.TratarCupomFiscal(
                    MetodoECF.tmeSubTotalizarCupom, parametros, operacaoECFOK)) / 100;

                if ((valorTotal) == 0)
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

                    if (!(valorTotal == (valorDinheiro + valorCheque + valorCartao + 
                        obterValoresTransacaoAnteriorCartao())))
                    {
                        MessageBox.Show("Total das formas de pagamento diferente do total do cupom.",
                            "Cupom Fiscal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        return;
                    }
                }

                if (!(tratarPagamentoComCartao(ref valorTotal)))
                    return;

                desconto = "D";
                if (saqueCielo > 0)
                    desconto = "A";
                tipoDesc = "$";
                valor = "0,00";

                if (rbtDarumaFW.Checked) {
                    tipoDesc = "D$";
                    if (saqueCielo > 0)
                        tipoDesc = "A$";
                }

                parametros = new object[3];
                parametros[0] = desconto;
                parametros[1] = tipoDesc;
                if (descontoCielo > 0)
                    parametros[2] = String.Format("#0.00", descontoCielo);
                else if (saqueCielo > 0)
                    parametros[2] = String.Format("#0.00", saqueCielo);
                else
                    parametros[2] = valor;

                EasyTEF.TratarCupomFiscal(MetodoECF.tmeIniciarFechamentoCupomFiscal, parametros, ref operacaoECFOK);
                // a variável operacaoECFOK retorna se o comando
                // na ECF foi executado com sucesso ou não
                if (!operacaoECFOK)
                {
                    MessageBox.Show("Não foi possível iniciar o fechamento do cupom fiscal.",
                            "Cupom Fiscal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }

                parametros = new object[2];

                if (Convert.ToDouble(edtValorDinheiro.Text) > 0)
                {
                    parametros[0] = FORMA_PGTO_DINHEIRO;
                    parametros[1] = valorDinheiro.ToString("#0.00");
                    EasyTEF.TratarCupomFiscal(MetodoECF.tmeEfetuarFormaPagamento, parametros, ref operacaoECFOK);

                    if (!operacaoECFOK)
                    {
                        MessageBox.Show("Não foi possível efetuar a forma de pagamento 'Dinheiro'.",
                            "Cupom Fiscal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        return;
                    }
                }

                if (Convert.ToDouble(edtValorCheque.Text) > 0)
                {
                    parametros[0] = FORMA_PGTO_CHEQUE;
                    parametros[1] = valorCheque.ToString("#0.00");
                    EasyTEF.TratarCupomFiscal(MetodoECF.tmeEfetuarFormaPagamento, parametros, ref operacaoECFOK);

                    if (!operacaoECFOK)
                    {
                        MessageBox.Show("Não foi possível efetuar a forma de pagamento 'Cheque'.",
                            "Cupom Fiscal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        return;
                    }
                }

                // se houve pagamento com cartão
                // usa o método automático para efetuar as formas de pagamento de maneira
                // simples, ou seja, somente descrição da forma de pagamento de cartão
                // e o valor de cada forma de pagamento
                if (!(EasyTEF.OperacaoTEFAtual == TipoTEF.ttCheque))
                    if (!(EasyTEF.EfetuarFormasPagamentoCartao()))
                    {
                        MessageBox.Show("Não foi possível efetuar a(s) forma(s) de pagamento TEF.",
                            "TEF", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        return;
                    }

                parametros = new object[1];
                parametros[0] = "Mensagem desejada de fechamento do cupom...";
                EasyTEF.TratarCupomFiscal(MetodoECF.tmeTerminarFechamentoCupomFiscal, parametros, ref operacaoECFOK);

                if (!operacaoECFOK)
                {
                    MessageBox.Show("Não foi possível terminar o fechamento do cupom fiscal.",
                            "TEF", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }

                // imprime todos os cupons tef de transações aprovadas
                EasyTEF.ImprimirCuponsECF();

                mmoCupomFiscal.Text = "";
                habilitarBotoes(false);
                limparFormasPgto();
            }
            finally
            {
                Cursor = Cursors.Default;
            }
        }

        private void novaVenda() {
            Cursor = Cursors.WaitCursor;

            descontoCielo = saqueCielo = 0;
            mmoCupomFiscal.Text = "";
            if (rbtBematech.Checked)
                retorno = BemaFI32.Bematech_FI_AbreCupom("");
            else if (rbtDarumaFW.Checked)
                retorno = DarumaFramework.iCFAbrirPadrao_ECF_Daruma();
            else if (rbtSweda.Checked)
                retorno = Sweda.ECF_AbreCupom("");

            if (!(retorno == ECF_RETORNO_OK))
                mostrarMsgErroECF("Não foi possível abrir o cupom fiscal. A mensagem de erro é: ");
            else {
                habilitarBotoes(true);

                seq = 0;
                total = 0;

                numeroCupom = new string('\x20', 14);
                if (rbtBematech.Checked)
                    retorno = BemaFI32.Bematech_FI_NumeroCupom(ref numeroCupom);
                else if (rbtDarumaFW.Checked)
                {
                    StringBuilder numCupom = new StringBuilder(5);
                    retorno = DarumaFramework.rRetornarInformacao_ECF_Daruma("26", numCupom);
                    numeroCupom = numCupom.ToString().Trim();
                }
                else if (rbtSweda.Checked)
                    retorno = Sweda.ECF_NumeroCupom(ref numeroCupom);

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
            Cursor = Cursors.WaitCursor;

            EasyTEF.ImprimirComprovante = true;
            EasyTEF.FazerRequisicaoAdministrativa();

            Cursor = Cursors.Default;
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
            EasyTEF = null;
            if (rbtSweda.Checked)
                Sweda.ECF_FechaPortaSerial();
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

        private void consultarCheque() {
            double valor;
            valor = Convert.ToDouble(edtValorCheque.Text);
            EasyTEF.ConsultarCheque(valor, FORMA_PGTO_CHEQUE, numeroCupom, "", "", "", 
                DateAndTime.Today, "", "", "", "", "", "", "");
            if (EasyTEF.TransacaoAprovada)
                encerrarVenda();
            else
            {
                MessageBox.Show("Não foi possível terminar a consulta de cheque.",
                        "TEF", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }
        }

        private void chkConsultaSerasa_CheckedChanged(object sender, EventArgs e)
        {
            if ((Convert.ToDouble(edtValorCheque.Text) > 0) &&
                (chkConsultaSerasa.Checked)) {
                Cursor = Cursors.WaitCursor;
                consultarCheque();
                Cursor = Cursors.Default;
            }
        }

        public void OnGerarIdentificacao(ref int identificacao)
        {
            Random aleatorio = new Random();
            identificacao = aleatorio.Next(999999);
        }

        public void OnImprimirLeituraX(ref bool operacaoECFOk)
        {
            // a leitura x SOMENTE deve ser impressa para ECFs matriciais
            //operacaoECFOk = BemaFI32.Bematech_FI_LeituraX() == BEMA_RETORNO_OK;
            operacaoECFOk = true;
        }

        public void OnAbrirRelatorioGerencial()
        {
            DarumaFramework.iRGAbrirPadrao_ECF_Daruma();
        }

        public void OnAposTransacaoNegada(bool UsarOutraFormaPgto)
        {
            if (UsarOutraFormaPgto)
            {
                limparFormasPgto();
                // Sugere terminar o cupom fiscal em dinheiro
                edtValorDinheiro.Text = (total - obterValoresTransacaoAnteriorCartao()).ToString("#0.00");
                MessageBox.Show("Atenção. Este exemplo em C# sugere automaticamente terminar " +
                    "o cupom fiscal em DINHEIRO.\n\r\n\r" +
                    "Observe que o valor em cartão foi apagado e o restante do cupom " +
                    "fiscal foi preenchido no campo Dinheiro.", "TEF", MessageBoxButtons.OK,
                    MessageBoxIcon.Warning);
            }

        }

        public void OnGerarIdentificador(ref int identificacao)
        {
            Random newRand = new Random();
            identificacao = newRand.Next();
        }
        
        public void OnAntesConfirmacao()
        {
            //throw new NotImplementedException();
        }

        public void OnAntesEnviarRequisicao(object req)
        {
            
        }

        public void OnAntesNaoConfirmacao()
        {
            //throw new NotImplementedException();
        }

        public void OnAposConfirmacao()
        {
            //throw new NotImplementedException();
        }

        public void OnAposNaoConfirmacao()
        {
            //throw new NotImplementedException();
        }


        public void OnAposImpressoraNaoResponde(bool TentarNovamente)
        {
            //throw new NotImplementedException();
        }

        public void OnAbrirComprovanteNaoFiscalVinculado(ref bool operacaoECFOK, string NomeFormaPgto, double ValorPgto)
        {
            if (rbtBematech.Checked)
                operacaoECFOK = BemaFI32.Bematech_FI_AbreComprovanteNaoFiscalVinculado(
                    NomeFormaPgto, String.Format("#0.00", ValorPgto), numeroCupom) == ECF_RETORNO_OK;
            else if (rbtDarumaFW.Checked)
                operacaoECFOK = DarumaFramework.iCCDAbrirSimplificado_ECF_Daruma(NomeFormaPgto,
                    "1", numeroCupom, ValorPgto.ToString("#0.00")) == ECF_RETORNO_OK;
            else if (rbtSweda.Checked)
                operacaoECFOK = Sweda.ECF_AbreComprovanteNaoFiscalVinculado(
                    NomeFormaPgto, String.Format("#0.00", ValorPgto), numeroCupom) == ECF_RETORNO_OK;
        }

        public void OnAntesImprimir1aViaCupomTEF()
        {
            if (rbtDarumaFW.Checked)
            {
                if (EasyTEF.ComandoECF == MetodoECF.tmeUsarComprovanteNaoFiscalVinculado)
                {
                    DarumaFramework.iCCDImprimirTexto_ECF_Daruma(" ");
                }
                else if (EasyTEF.ComandoECF == MetodoECF.tmeImprimirRelatorioGerencial)
                {
                    DarumaFramework.iRGImprimirTexto_ECF_Daruma(" ");
                }
            }
        }

        public void OnAposImprimir1aViaCupomTEF()
        {
            if (rbtDarumaFW.Checked){
                if (EasyTEF.ComandoECF == MetodoECF.tmeUsarComprovanteNaoFiscalVinculado){
                    DarumaFramework.iCCDImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iCCDImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iCCDImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iCCDImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iCCDImprimirTexto_ECF_Daruma(" ");
                }
                else if (EasyTEF.ComandoECF == MetodoECF.tmeImprimirRelatorioGerencial)
                {
                    DarumaFramework.iRGImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iRGImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iRGImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iRGImprimirTexto_ECF_Daruma(" ");
                    DarumaFramework.iRGImprimirTexto_ECF_Daruma(" ");
                }
                DarumaFramework.eAcionarGuilhotina_ECF_Daruma("1");
            }

        }

        private void edtValorDinheiro_Leave(object sender, EventArgs e)
        {
            if (edtValorDinheiro.Text.Trim() == "")
                edtValorDinheiro.Text = "0,00";
        }

        private void edtValorCheque_Leave(object sender, EventArgs e)
        {
            if (edtValorCheque.Text.Trim() == "")
                edtValorCheque.Text = "0,00";
        }

        private void edtValorCartao1_Leave(object sender, EventArgs e)
        {
            if (edtValorCartao1.Text.Trim() == "")
                edtValorCartao1.Text = "0,00";
        }

        private void edtValorCartao2_Leave(object sender, EventArgs e)
        {
            if (edtValorCartao2.Text.Trim() == "")
                edtValorCartao2.Text = "0,00";
        }

        private void edtValorCartao3_Leave(object sender, EventArgs e)
        {
            if (edtValorCartao3.Text.Trim() == "")
                edtValorCartao3.Text = "0,00";
        }

        private void chkUsarDTEF_CheckedChanged(object sender, EventArgs e)
        {
            if (chkUsarDTEF.Checked != EasyTEF.UsarDTEF)
            {
                Cursor.Current = Cursors.WaitCursor;
                try
                {
                    EasyTEF.AutoVerificarTEF = false;
                    EasyTEF.Gerenciador = TipoGerenciador.tgGerenciadorPadrao;
                    EasyTEF.UsarDTEF = chkUsarDTEF.Checked;
                    EasyTEF.AutoVerificarTEF = true;
                }
                finally
                {
                    Cursor.Current = Cursors.Default;
                }
            }
        }

        private double obterValoresTransacaoAnteriorCartao()
        {
            object valoresCartoes;
            double retorno = 0;
            int tamanho = 0;
            string valor = "";

            if (!(EasyTEF.OperacaoTEFAtual == TipoTEF.ttCheque))
            {
                valoresCartoes = EasyTEF.ValoresCartoes;
                tamanho = ((object[])(valoresCartoes)).Length;
                for (int i = 0; i < tamanho; i++)
                {
                    valor = Convert.ToString(((object[])valoresCartoes)[i]).Replace(".", ",");
                    retorno = retorno + Convert.ToDouble(valor);
                }
            }

            return retorno;
        }


        public void OnAposLerRespostaRequisicao(object Arquivo)
        {
            //throw new NotImplementedException();
        }


        public void OnInterromperFluxo(ref bool Interromper)
        {
            //throw new NotImplementedException();
        }


        public void OnImpressaoNaoFiscal(object ImagemCupomTEF, ref bool ImpressaoOK)
        {
            //throw new NotImplementedException();
        }

        public void OnValorPersonalizadoReq(ref object Campo, ref object Valor)
        {
            //throw new NotImplementedException();
        }
    }
}