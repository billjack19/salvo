Option Explicit On

Imports System.Runtime.InteropServices.ComTypes
Imports EasyTEFSiTef


Public Class NaoFiscalFrm
    Implements IEasyTEFCliSiTefEvents

    Dim WithEvents EasyTEF As EasyTEFSiTef.EasyTEFCliSiTef
    'Variáveis para configuração de Eventos do componente EasyTEFDiscado
    Private cookie As Integer
    Private icp As IConnectionPoint

    Private InterromperFluxo As Boolean = False
    Private HouveCancelamento As Boolean = False
    Private ChequeGenerico As Boolean = False
    Private TotalDescontoCielo As Double = 0
    Private TotalSaqueCielo As Double = 0
    Private Sequencial As String
    Private DataHora As DateTime
    Private BufferTransacoesTEF As String()

    Const FORMATO_DINHEIRO As String = "#0.00"


    Private Sub CarregarEasyTEF()
        Dim f As New stdole.StdFont
        Dim icpc As IConnectionPointContainer
        Dim guid As Guid

        EasyTEF = New EasyTEFCliSiTef

        'Configuração de eventos
        icpc = CType(EasyTEF, IConnectionPointContainer)
        guid = GetType(EasyTEFSiTef.IEasyTEFCliSiTefEvents).GUID
        icpc.FindConnectionPoint(guid, icp)
        icp.Advise(Me, cookie)

        EasyTEF.GerarLogComandos = True
        EasyTEF.CaminhoCompletoCliSiTef32I = "C:\Users\Robson\Documents\TEF\CliSiTef\dlls\CliSiTef32I.dll"
        EasyTEF.HostSiTef = "192.168.48.131"
        EasyTEF.Loja = "00000000"
        EasyTEF.Operador = "OperadorPdv" ' Aqui deve ser o nome do usuário operador atual do sistema
        EasyTEF.Terminal = "SE000001"
        EasyTEF.ContraSenha = "D7680B9b585708"
        EasyTEF.AutoVerificarTEF = True

        EasyTEF.CieloPremia.NomeSoftwareHouse = "NomeSoft" ' Aqui deve ser o nome da software house, máx. 8 caracteres
        EasyTEF.CieloPremia.AtivarCieloPremia = True

        ' EasyTEF.MensagemPinPad = "EasyTEF|Componente EasyTEFCliSiTef"
    End Sub

    Private Sub btnImpressaoNaoFiscal_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnImpressaoNaoFiscal.Click
        Dim i As Integer
        Dim CountCartoes As Integer
        Dim Cartoes() As Object

        Call txtQtdCartoes.Focus()

        Call EmitirSatOuNFCe()
        CountCartoes = txtQtdCartoes.Value

        ReDim Cartoes(CountCartoes - 1)

        For i = 0 To CountCartoes - 1
            Cartoes(i) = PegarValor
        Next i

        Call EasyTEF.IniciarTransacaoTEF()
        If TratarPagamentoComCartoes(Cartoes) Then
            For i = LBound(EasyTEF.ValoresCartoes) To UBound(EasyTEF.ValoresCartoes)
                Call ImprimirCupomEmSuaImpressoraNaoFiscal(EasyTEF.CuponsDisponiveis(i))
            Next i

            If MsgBox("A impressão foi efetuada totalmente com sucesso?", _
                vbYesNo + vbQuestion, "Impressão") = vbYes Then

                If (UBound(EasyTEF.ValoresCartoes) = 0) Then
                    Call EasyTEF.ConfirmacaoVendaImpressaoCupom(Sequencial, DataHora, DataHora)
                ElseIf (UBound(EasyTEF.ValoresCartoes) > 0) Then
                    Call EasyTEF.ConfirmacaoVendaImpressaoCupomMultiplosCartoes()
                End If

            Else
                Call EasyTEF.CancelarVendasPendentes()
            End If

            Call EasyTEF.FinalizarTransacaoTEF()

            TotalDescontoCielo = 0
            TotalSaqueCielo = 0
            ReDim BufferTransacoesTEF(0)
            HouveCancelamento = False
            ChequeGenerico = False
            InterromperFluxo = False

        End If


    End Sub

    Public Sub OnAbrirComprovanteNaoFiscalVinculado(ByRef OperacaoECFOK As Boolean, ByVal NomeFormaPagamento As String, ByVal ValorCupom As Double) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnAbrirComprovanteNaoFiscalVinculado

    End Sub

    Public Sub OnAbrirRelatorioGerencial() Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnAbrirRelatorioGerencial

    End Sub

    Public Sub OnAguardarTeclaOperador(ByVal Mensagem As String) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnAguardarTeclaOperador
        If Mensagem = "" Then
            MsgBox("Por favor, presisone <Enter>", vbInformation)
        Else
            MsgBox(Mensagem, vbInformation)
        End If
    End Sub

    Public Sub OnAposTransacaoNegada(ByVal NaoContinuar As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnAposTransacaoNegada

    End Sub

    Public Sub OnEfetuarFormaPagamento(ByRef OperacaoECFOK As Boolean, ByVal Params As Object, ByRef Retorno As String) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnEfetuarFormaPagamento

    End Sub

    Public Sub OnEncerrarCupomFiscal() Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnEncerrarCupomFiscal

    End Sub

    Public Sub OnExibirMensagem(ByVal TelaOperador As Boolean, ByVal TelaCliente As Boolean, ByVal Mensagem As String) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnExibirMensagem
        If TelaOperador Then
            lblMsgSiTef.Text = Mensagem
        End If

    End Sub

    Public Sub OnExibirMenuOpcoesOperador(ByVal Caption As String, _
                                          ByVal Opcoes As Object, _
                                          ByRef OpcaoEscolhida As String, _
                                          ByRef TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta) _
                                      Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnExibirMenuOpcoesOperador

        Dim FrmMenu As MenuOperadorFrm

        FrmMenu = New MenuOperadorFrm
        FrmMenu.Text = Caption
        Try
            FrmMenu.MenuOpcoes = Opcoes
            FrmMenu.ShowDialog()
            OpcaoEscolhida = FrmMenu.Opcao

            If Not HouveCancelamento Then
                HouveCancelamento = OpcaoEscolhida.Contains("CANCELAMENTO")
            End If

            If Not ChequeGenerico Then
                ChequeGenerico = OpcaoEscolhida.Contains("GENERICA")
            End If

            TipoContinuacao = TipoContinuacaoColeta.tccContinuar
            If (FrmMenu.DialogResult = DialogResult.Cancel) Then
                TipoContinuacao = TipoContinuacaoColeta.tccInterromper
            ElseIf (FrmMenu.DialogResult = DialogResult.Retry) Then
                TipoContinuacao = TipoContinuacaoColeta.tccMenuAnterior
            End If

        Catch e As Exception
            TipoContinuacao = TipoContinuacaoColeta.tccInterromper
            MessageBox.Show("Erro no evento OnExibirMenuOpcoesOperador: \n\r" +
                e.Message, "Problema encontrado", MessageBoxButtons.OK, MessageBoxIcon.Error)
        End Try

    End Sub

    Public Sub OnFecharComprovanteNaoFiscalVinculado(ByRef OperacaoECFOK As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnFecharComprovanteNaoFiscalVinculado

    End Sub

    Public Sub OnFecharRelatorioGerencial(ByRef OperacaoECFOK As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnFecharRelatorioGerencial

    End Sub

    Public Sub OnGuilhotinar2aViaCupomTEF() Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnGuilhotinar2aViaCupomTEF

    End Sub

    Public Sub OnImpressoraTemPapel(ByRef OperacaoECFOK As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnImpressoraTemPapel

    End Sub

    Public Sub OnImprimirLeituraX(ByRef OperacaoECFOK As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnImprimirLeituraX

    End Sub

    Public Sub OnImprimirRelatorioGerencial(ByVal ImagemCupomTEF As Object, ByRef ImpressaoOK As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnImprimirRelatorioGerencial

    End Sub

    Public Sub OnIniciarFechamentoCupomFiscal(ByRef OperacaoECFOK As Boolean, ByVal Params As Object, ByRef Retorno As String) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnIniciarFechamentoCupomFiscal

    End Sub

    Public Sub OnInterromperColetaDados(ByRef TipoContinuacaoColeta As EasyTEFSiTef.TipoContinuacaoColeta) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnInterromperColetaDados
        If InterromperFluxo Then
            TipoContinuacaoColeta = EasyTEFSiTef.TipoContinuacaoColeta.tccInterromper
            InterromperFluxo = False
        Else
            TipoContinuacaoColeta = EasyTEFSiTef.TipoContinuacaoColeta.tccContinuar
        End If
    End Sub

    Public Sub OnLerDadosDiversos(ByVal Mensagem As String, _
                                  ByVal TipoDeDados As EasyTEFSiTef.TipoDadosDiversos, _
                                  ByRef DadoLido As String, _
                                  ByRef TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta) _
                              Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnLerDadosDiversos
        Dim FrmValores As ValoresFrm = New ValoresFrm
        Dim Capt As String = "Por favor, informe "

        Try
            Select Case TipoDeDados
                Case TipoDadosDiversos.tddCheque
                    Capt = Capt & "o número do cheque"
                Case TipoDadosDiversos.tddMonetario
                    Capt = Capt & "o valor"
                Case TipoDadosDiversos.tddCodigoDeBarras
                    Capt = Capt + "o número do código de barras"
            End Select

            FrmValores.Text = Capt
            Call FrmValores.EscreverMensagem(Mensagem)
            FrmValores.ShowDialog()
            DadoLido = FrmValores.DadoLido
            TipoContinuacao = TipoContinuacaoColeta.tccContinuar
            If (FrmValores.DialogResult = DialogResult.Cancel) Then
                TipoContinuacao = TipoContinuacaoColeta.tccInterromper
            ElseIf (FrmValores.DialogResult = DialogResult.Retry) Then
                TipoContinuacao = TipoContinuacaoColeta.tccMenuAnterior
            End If
        Catch e As Exception
            MessageBox.Show("Erro no evento OnLerDadosDiversos: \n\r" +
                    e.Message, "Problema encontrado", MessageBoxButtons.OK, MessageBoxIcon.Error)
        End Try
    End Sub

    Public Sub OnLerRespostaBooleana(ByVal Mensagem As String, ByRef Resposta As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnLerRespostaBooleana
        Dim Msg As String

        Msg = Mensagem

        If Msg = "" Then
            Msg = "Confirmar esta operação?"
        End If

        Resposta = (MsgBox(Msg, vbQuestion + vbYesNo, "Confirmação") = vbYes)
    End Sub

    Public Sub OnLerValor(ByVal Mensagem As String, ByVal TamanhoMinimo As Integer, ByVal TamanhoMaximo As Integer, ByRef ValorLido As String, ByRef TipoContinuacao As EasyTEFSiTef.TipoContinuacaoColeta) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnLerValor
        Dim f As ValoresFrm = New ValoresFrm()
        Try
            f.ValorMinimo = TamanhoMinimo
            f.ValorMaximo = TamanhoMaximo
            f.EscreverMensagem(Mensagem)
            ' mascarar a senha do supervisor
            If ((EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReImpressaoPagamentoConta) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReimpressao) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReimpressaoUltimoComprovante) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReimpressaoEspecifica) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReimpressaoLojista) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReimpressaoPortadorCartao) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdTodasAsReimpressoes) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReimpressaoEspecificaRedecard) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdReimpressaoEspecificaVisanet) Or
                (EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdCancelamentoTransacaoCartaoCreditoDebito)) Then

                f.LigarModoSenha = True
            End If
            f.ShowDialog()
            ValorLido = f.DadoLido

            If ((EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdCartaoDebitoPreDatado) And
                (ValorLido = "")) Then
                ValorLido = String.Format("{0:ddmmyyyy}", DateAndTime.Now.AddDays(30))
            ElseIf ((EasyTEF.OperacaoAtualDaColetaDeDados = CampoColetaDados.ccdNone) And
                (Mensagem.Contains("DDMMAAAA")) And
                (ValorLido = "")) Then
                ValorLido = String.Format("{0:ddmmyyyy}", DateAndTime.Now)
            End If

            TipoContinuacao = TipoContinuacaoColeta.tccContinuar
            If (f.DialogResult = DialogResult.Cancel) Then
                TipoContinuacao = TipoContinuacaoColeta.tccInterromper
            ElseIf (f.DialogResult = DialogResult.Retry) Then
                TipoContinuacao = TipoContinuacaoColeta.tccMenuAnterior
            End If
        Catch e As Exception
            MessageBox.Show("Erro no evento OnLerValor: \n\r" +
                e.Message, "Problema encontrado", MessageBoxButtons.OK, MessageBoxIcon.Error)
        End Try
    End Sub

    Public Sub OnLimparMensagem(ByVal TelaOperador As Boolean, ByVal TelaCliente As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnLimparMensagem
        lblMsgSiTef.Text = ""
    End Sub

    Public Sub OnSubTotalizarCupom(ByRef OperacaoECFOK As Boolean, ByVal Params As Object, ByRef Retorno As String) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnSubTotalizarCupom

    End Sub

    Public Sub OnTerminarCancelamentoMultiplosCartoes() Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnTerminarCancelamentoMultiplosCartoes

    End Sub

    Public Sub OnTerminarFechamentoCupom(ByRef OperacaoECFOK As Boolean, ByVal Params As Object, ByRef Retorno As String) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnTerminarFechamentoCupom

    End Sub

    Public Sub OnUsarComprovanteNaoFiscalVinculado(ByVal ImagemCupomTEF As Object, ByRef ImpressaoOK As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnUsarComprovanteNaoFiscalVinculado

    End Sub

    Public Sub OnVerificarCupomFiscalAberto(ByRef CupomFiscalAberto As Boolean) Implements EasyTEFSiTef.IEasyTEFCliSiTefEvents.OnVerificarCupomFiscalAberto
        ' força a confirmação da transação
        CupomFiscalAberto = False
        HouveCancelamento = False
    End Sub

    Private Sub NaoFiscalFrm_FormClosing(ByVal sender As System.Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles MyBase.FormClosing
        'Libera a referência do objeto COM
        EasyTEF = Nothing
        icp.Unadvise(cookie)
    End Sub

    Private Sub NaoFiscalFrm_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Call CarregarEasyTEF()
    End Sub

    Private Sub btnCancelarFluxo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnCancelarFluxo.Click
        InterromperFluxo = True
    End Sub

    Private Sub EmitirSatOuNFCe()
        ' este método representa o método de seu sistema que gera e transmite
        ' o SAT ou NFC-e
    End Sub

    Private Function PegarValor() As Double
        Randomize()
        PegarValor = (Int(Rnd * 1000) + 1) / 100
    End Function

    Private Function PegarSequencial() As String
        Randomize()
        PegarSequencial = (Int(Rnd * 100000) + 1)
    End Function

    Public Function TratarPagamentoComCartoes(ByVal Valores As Object) As Boolean
        Dim resultado As Boolean
        Dim valorCartao As Double
        Dim i As Integer
        Dim MsgErroSiTef As String
        Dim FuncaoSiTef As TipoFuncaoCliSiTef

        resultado = True

        EasyTEF.NumeroDeCartoes = 0

        If IsArray(Valores) Then

            Sequencial = PegarSequencial
            EasyTEF.NumeroDeCartoes = UBound(Valores) + 1
            For i = 1 To EasyTEF.NumeroDeCartoes
                valorCartao = Valores(i - 1)

                If MsgBox("Cartão de crédito (" & Format(valorCartao, FORMATO_DINHEIRO) & ")?", _
                    vbYesNo + vbQuestion, "Tipo de Cartão") = vbYes Then
                    FuncaoSiTef = TipoFuncaoCliSiTef.fcsCredito
                Else
                    FuncaoSiTef = TipoFuncaoCliSiTef.fcsDebito
                End If
                With EasyTEF
                    MsgErroSiTef = ""
                    DataHora = DateTime.Now
                    Call .ExecutarFuncaoSiTef(FuncaoSiTef, valorCartao, Sequencial, _
                        DataHora, DataHora, "{TipoTratamento=4}", "TEF", MsgErroSiTef)
                    If MsgErroSiTef <> "" Then
                        MsgBox(MsgErroSiTef, vbExclamation)
                    End If
                    If (Not .TransacaoAprovada) Then
                        resultado = False
                        MsgBox("Não foi possível finalizar com sucesso o pagamento com cartão", _
                            vbCritical)
                        Exit For
                    Else
                        TotalDescontoCielo = TotalDescontoCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo4029
                        TotalSaqueCielo = TotalSaqueCielo + EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo130
                        If BufferTransacoesTEF Is Nothing Then
                            ReDim BufferTransacoesTEF(0)
                        Else
                            ReDim Preserve BufferTransacoesTEF(UBound(BufferTransacoesTEF))
                        End If

                        BufferTransacoesTEF(UBound(BufferTransacoesTEF)) = _
                            EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo4029 & ";" _
                            & EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo130
                    End If
                End With
            Next i

        End If

        TratarPagamentoComCartoes = resultado
    End Function

    Private Function ArrayToStr(ByVal a As Object)
        Dim i As Integer
        Dim s As String
        s = ""
        For i = LBound(a) To UBound(a)
            s = s & a(i) & vbCrLf
        Next i

        ArrayToStr = s
    End Function

    Private Sub ImprimirCupomEmSuaImpressoraNaoFiscal(ByVal Cupom As Object)
        ' aqui deve ser adicionado o comando de qualquer impressora não fiscal que
        ' fará a impressão do Cupom TEF
        Call MsgBox(ArrayToStr(Cupom), vbInformation)
    End Sub

    Private Sub btnAdmTEF_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnAdmTEF.Click
        Dim MsgErro As String = ""

        Me.Cursor = Cursors.WaitCursor
        DataHora = DateTime.Now
        Sequencial = PegarSequencial()

        Call EasyTEF.ConfirmarOuDesfazerPendencias()
        Call EasyTEF.ExecutarFuncaoSiTef(TipoFuncaoCliSiTef.fcsTransacoesGerenciais, 1, _
            Sequencial, DataHora, DataHora, "{TipoTratamento=4}", "", MsgErro)

        If MsgErro <> "" Then
            MsgBox(MsgErro, vbExclamation)
            Me.Cursor = Cursors.Default
            Exit Sub
        End If

        If Not ChequeGenerico Then
            Call ImprimirCupomEmSuaImpressoraNaoFiscal(EasyTEF.ComprovanteTEF1aVia)
            Call ImprimirCupomEmSuaImpressoraNaoFiscal(EasyTEF.ComprovanteTEF2aVia)
            If MsgBox("A impressão foi efetuada totalmente com sucesso?", _
                vbYesNo + vbQuestion, "Impressão") = vbYes Then

                Call EasyTEF.ConfirmacaoVendaImpressaoCupom(Sequencial, DataHora, DataHora)
            Else
                Call EasyTEF.CancelarVendasPendentes()
                Exit Sub
            End If
        Else
            ChequeGenerico = False
        End If

        If (EasyTEF.OperacaoTEFAtual = TipoFuncaoCliSiTef.fcsCheque) And _
            (EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo120 <> "") Then

            MsgBox("Autorização do Cheque: " & vbCrLf & vbCrLf & _
                EasyTEF.RetornosCliSiTef.RetornosPadrao.valorCampo120)

        End If

        Me.Cursor = Cursors.Default

    End Sub
End Class
