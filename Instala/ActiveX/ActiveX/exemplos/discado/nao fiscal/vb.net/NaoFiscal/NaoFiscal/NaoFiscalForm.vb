Option Explicit On

Imports System.Runtime.InteropServices.ComTypes
Imports EasyTEF


' NÃO ESQUECER DE IMPLEMENTAR A INTERFACE IEasyTEFDiscadoEvents
' LOGO APÓS O NOME DA CLASSE ↓
Public Class NaoFiscalForm
    Implements IEasyTEFDiscadoEvents

    Const FORMA_PGTO_CARTAO As String = "Cartao"

    Dim WithEvents EasyTEF As EasyTEF.EasyTEFDiscado

    'Variáveis para configuração de Eventos do componente EasyTEFDiscado
    Private cookie As Integer
    Private icp As IConnectionPoint

    Private TotalDescontoCielo As Double = 0
    Private TotalSaqueCielo As Double = 0
    Private BufferTransacoesTEF As List(Of String) = New List(Of String)

    Public Sub OnAbrirComprovanteNaoFiscalVinculado(ByRef operacaoECFOK As Boolean, _
                                                    ByVal NomeFormaPgto As String, _
                                                    ByVal ValorPgto As Double) _
                                                Implements EasyTEF.IEasyTEFDiscadoEvents.OnAbrirComprovanteNaoFiscalVinculado
        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnAbrirRelatorioGerencial() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAbrirRelatorioGerencial

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnAntesConfirmacao() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesConfirmacao

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnAntesEnviarRequisicao(ByVal req As Object) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesEnviarRequisicao

    End Sub

    Public Sub OnAntesImprimir1aViaCupomTEF() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesImprimir1aViaCupomTEF

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnAntesNaoConfirmacao() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesNaoConfirmacao

    End Sub

    Public Sub OnAposConfirmacao() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposConfirmacao

    End Sub

    Public Sub OnAposImpressoraNaoResponde(ByVal TentarNovamente As Boolean) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposImpressoraNaoResponde

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnAposImprimir1aViaCupomTEF() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposImprimir1aViaCupomTEF

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnAposLerRespostaRequisicao(ByVal Arquivo As Object) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposLerRespostaRequisicao

    End Sub

    Public Sub OnAposNaoConfirmacao() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposNaoConfirmacao

    End Sub

    Public Sub OnAposTransacaoNegada(ByVal UsarOutraFormaPgto As Boolean) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposTransacaoNegada

    End Sub

    Public Sub OnEfetuarFormaPagamento(ByRef operacaoECFOK As Boolean, _
                                       ByVal Parametros As Object, _
                                       ByRef Retorno As String) _
                                   Implements EasyTEF.IEasyTEFDiscadoEvents.OnEfetuarFormaPagamento

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnEncerrarCupomFiscal() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnEncerrarCupomFiscal

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnFecharComprovanteNaoFiscalVinculado() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnFecharComprovanteNaoFiscalVinculado

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnFecharRelatorioGerencial(ByRef operacaoECFOK As Boolean) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnFecharRelatorioGerencial

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnGerarIdentificador(ByRef identificacao As Integer) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnGerarIdentificador

        Randomize()
        identificacao = Int(Rnd() * 1000) + 1

    End Sub

    Public Sub OnImpressaoNaoFiscal(ByVal ImagemCupomTEF As Object, _
                                    ByRef ImpressaoOK As Boolean) _
                                Implements EasyTEF.IEasyTEFDiscadoEvents.OnImpressaoNaoFiscal

        Call ImprimirCupomEmSuaImpressoraNaoFiscal(ImagemCupomTEF)

        ImpressaoOK = MessageBox.Show("Todos os cupons TEF foram impressos com sucesso?",
                    "TEF", MessageBoxButtons.YesNo, MessageBoxIcon.Question) = DialogResult.Yes

    End Sub

    Public Sub OnImpressoraTemPapel(ByRef operacaoECFOK As Boolean) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnImpressoraTemPapel

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnImprimirLeituraX(ByRef operacaoECFOK As Boolean) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnImprimirLeituraX

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnImprimirRelatorioGerencial(ByVal ImagemCupomTEF As Object, _
                                            ByRef operacaoECFOK As Boolean) _
                                        Implements EasyTEF.IEasyTEFDiscadoEvents.OnImprimirRelatorioGerencial

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnIniciarFechamentoCupomFiscal(ByRef operacaoECFOK As Boolean, _
                                              ByVal Parametros As Object, _
                                              ByRef Retorno As String) _
                                          Implements EasyTEF.IEasyTEFDiscadoEvents.OnIniciarFechamentoCupomFiscal

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnInterromperFluxo(ByRef Interromper As Boolean) _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnInterromperFluxo

    End Sub

    Public Sub OnSubTotalizarCupom(ByRef operacaoECFOK As Boolean, _
                                   ByVal Parametros As Object, _
                                   ByRef Retorno As String) _
                               Implements EasyTEF.IEasyTEFDiscadoEvents.OnSubTotalizarCupom

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnTerminarCancelamentoMultiplosCartoes() _
        Implements EasyTEF.IEasyTEFDiscadoEvents.OnTerminarCancelamentoMultiplosCartoes

    End Sub

    Public Sub OnTerminarFechamentoCupom(ByRef operacaoECFOK As Boolean, _
                                         ByVal Parametros As Object, _
                                         ByRef Retorno As String) _
                                     Implements EasyTEF.IEasyTEFDiscadoEvents.OnTerminarFechamentoCupom

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnUsarComprovanteNaoFiscalVinculado(ByVal ImagemCupomTEF As Object, _
                                                   ByRef operacaoECFOK As Boolean) _
                                               Implements EasyTEF.IEasyTEFDiscadoEvents.OnUsarComprovanteNaoFiscalVinculado

        ' evento necessário somente para impressora fiscal

    End Sub

    Public Sub OnValorPersonalizadoReq(ByRef Campo As Object, _
                                       ByRef Valor As Object) _
                                   Implements EasyTEF.IEasyTEFDiscadoEvents.OnValorPersonalizadoReq

    End Sub

    Private Sub ImprimirCupomEmSuaImpressoraNaoFiscal(ByVal CupomTEF As Object)

        MessageBox.Show(CupomTEF(0), "Cupom TEF",
            MessageBoxButtons.OK, MessageBoxIcon.Information)

    End Sub

    Private Sub CarregarEasyTEF()
        Dim f As New stdole.StdFont
        Dim icpc As IConnectionPointContainer
        Dim guid As Guid

        f.Name = "Tahoma"
        f.Size = 9

        'Instancia o componente
        EasyTEF = New EasyTEF.EasyTEFDiscado

        'Configuração de eventos
        icpc = CType(EasyTEF, IConnectionPointContainer)
        guid = GetType(EasyTEF.IEasyTEFDiscadoEvents).GUID
        icpc.FindConnectionPoint(guid, icp)
        icp.Advise(Me, cookie)

        'Configuração do EasyTEFDiscado
        EasyTEF.Gerenciador = TipoGerenciador.tgPayGo
        EasyTEF.FormMsgOperador.Fonte = f
        EasyTEF.FormMsgOperador.Altura = 110
        EasyTEF.FormMsgOperador.Largura = 400
        EasyTEF.FormMsgOperador.BotaoOK.Altura = 25
        EasyTEF.FormMsgOperador.BotaoOK.Largura = 75

        ' a contra senha é diferente de um computador para outro.
        ' o ideal é que ela seja lida a apartir de um .xml
        ' para desenvolvimento, executar GerarSenhaDiscado.exe e entrar 
        ' em contato com o EasyTEF Team para liberação da contra senha.
        EasyTEF.ContraSenha = "1558542034E082"

        EasyTEF.ImpressaoNaoFiscal = True

        EasyTEF.CieloPremia.RazaoSocialSW = "Razão Social da Software House"
        EasyTEF.CieloPremia.VersaoSW = "Nome da Automação e Versão"
        EasyTEF.CieloPremia.Tipo = TipoCieloPremia.tcpAmbas

        If Not EasyTEF.AutoVerificarTEF Then
            EasyTEF.AutoVerificarTEF = True
        End If
    
    End Sub

    Private Sub NaoFiscalForm_Load(ByVal sender As System.Object, _
                                   ByVal e As System.EventArgs) _
                               Handles MyBase.Load

        Call CarregarEasyTEF()

    End Sub

    Public Function TratarPagamentoComCartoes(ByVal Valores As List(Of Double)) As Boolean
        Dim Resultado As Boolean
        Dim ValorCartao As Double
        Dim I As Integer

        Resultado = True

        EasyTEF.NumeroDeCartoes = 0

        EasyTEF.ImprimirComprovante = False
        EasyTEF.NumeroDeCartoes = Valores.Count
        For I = 1 To EasyTEF.NumeroDeCartoes
            ValorCartao = Valores(I - 1)

            Call EasyTEF.PagarNoCartao(ValorCartao, TipoMoeda.tmReal, PegarSequencial(), _
                I = 1, I = EasyTEF.NumeroDeCartoes, FORMA_PGTO_CARTAO)

            Resultado = EasyTEF.TransacaoAprovada
            If Not EasyTEF.TransacaoAprovada Then
                MsgBox("Não foi possível finalizar com sucesso o pagamento com cartão", _
                    vbCritical)
                Exit For
            Else
                TotalDescontoCielo = TotalDescontoCielo + EasyTEF.ValorCampo709_000
                TotalSaqueCielo = TotalSaqueCielo + EasyTEF.ValorCampo708_000

                ' nome da rede + NSU + finalização
                BufferTransacoesTEF.Add(EasyTEF.ValorCampo010_000 & ";" _
                    & EasyTEF.ValorCampo012_000 & ";" & EasyTEF.ValorCampo027_000)
            End If

        Next I

        TratarPagamentoComCartoes = Resultado

    End Function

    Private Sub EmitirSatOuNFCe()
        ' este método representa o método de seu sistema que gera e transmite
        ' o SAT ou NFC-e
    End Sub

    Private Function PegarSequencial() As String
        Dim Aleatorio As Random = New Random()
        PegarSequencial = Convert.ToString(Aleatorio.Next(100, 999999))
    End Function

    Public Function PegarValor() As Double
        Dim Aleatorio As Random = New Random()
        PegarValor = Aleatorio.Next(100, 999) / 100
    End Function


    Private Sub btnPagarComCartao_Click(ByVal sender As System.Object, _
                                        ByVal e As System.EventArgs) _
                                    Handles btnPagarComCartao.Click

        Call EmitirSatOuNFCe()
        Call upDown.Focus()

        Dim CountCartoes As Integer = Convert.ToInt32(upDown.Value)
        Dim Cartoes As List(Of Double) = New List(Of Double)

        For I = 1 To CountCartoes
            Cartoes.Add(PegarValor())
        Next I

        Call EasyTEF.IniciarTransacaoTEF()
        If TratarPagamentoComCartoes(Cartoes) Then

            For I = LBound(EasyTEF.ValoresCartoes) To UBound(EasyTEF.ValoresCartoes)
                Call ImprimirCupomEmSuaImpressoraNaoFiscal(EasyTEF.CuponsDisponiveis(I))
            Next I

            Dim ImpressaoOK As Boolean = MessageBox.Show("Todos os cupons TEF foram impressos com sucesso?",
                    "TEF", MessageBoxButtons.YesNo, MessageBoxIcon.Question) = DialogResult.Yes

            If (ImpressaoOK) Then
                Call EasyTEF.ConfirmacaoVendaImpressaoCupom(
                    EasyTEF.ValorCampo010_000, EasyTEF.ValorCampo012_000,
                    EasyTEF.ValorCampo027_000, EasyTEF.ValorCampo002_000)
            Else
                Call EasyTEF.CancelarVendasPendentes()
            End If

            Call EasyTEF.FinalizarTransacaoTEF()
            TotalDescontoCielo = 0
            TotalSaqueCielo = 0
            BufferTransacoesTEF.Clear()
        End If
        
    End Sub

    Private Sub btnAdmTEF_Click(ByVal sender As System.Object, _
                                ByVal e As System.EventArgs) _
                            Handles btnAdmTEF.Click

        Cursor = Cursors.WaitCursor
        Try
            EasyTEF.ImprimirComprovante = True
            EasyTEF.FazerRequisicaoAdministrativa()
        Finally
            Cursor = Cursors.Default
        End Try

    End Sub
End Class
