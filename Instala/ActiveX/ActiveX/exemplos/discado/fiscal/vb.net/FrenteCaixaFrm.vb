
'------------------------------------------------------------------------------
'
' Autor......: EasyTEF Team
' Objetivo...: Fazer um exemplo simples e direto da utilização do componente
'              COM EasyTEFDiscado numa tela de frente de caixa. Este exemplo
'              implementa os tratamentos mínimos necessários para a
'              homologação do seu sistema.
'
' Comentários: Esta tela não deve ser usada como referência para uma
'              aplicação comercial (AC) mais completa, mas sim como guia para
'              uso dos métodos e tratamentos a serem feitos na utilização do
'              componente EasyTEFDiscado.
'
'              Os tratamentos quanto a ECF, como por exemplo, abrir a tela
'              com cupom fiscal já aberto, troco, etc., devem ser feitos pela
'              AC e não são tratados neste exemplo.
'
'------------------------------------------------------------------------------

Option Explicit On

Imports System.Runtime.InteropServices.ComTypes
Imports EasyTEF

Public Class FrenteCaixaFrm
    Implements IEasyTEFDiscadoEvents

    'Constantes
    Const ECF_RETORNO_OK As Integer = 1
    Const CUPOM_FISCAL As String = "Cupom Fiscal"
    Const FORMA_PGTO_CARTAO As String = "Cartao"
    Const FORMA_PGTO_CHEQUE As String = "Cheque"
    Const FORMA_PGTO_DINHEIRO As String = "Dinheiro"
    Const FORMATO_MONEY As String = "#0.00"

    Dim WithEvents EasyTEF As EasyTEF.EasyTEFDiscado
    'Variáveis para configuração de Eventos do componente EasyTEFDiscado
    Private cookie As Integer
    Private icp As IConnectionPoint

    Private Retorno As Integer 'Valor de retorno da execução dos comandos da ECF
    Private Total As Double 'Valor total dos ítens do cupom passado à tela de fechamento de cupom fiscal
    Private Seq As Integer 'Sequencial usado para display do número do produto no cupom fiscal

    Private TotalDescontoCielo As Double = 0
    Private TotalSaqueCielo As Double = 0
    Private BufferTransacoesTEF() As String

    Private UsuarioNaoQuerOutraFormaPgto As Boolean

    'Variáveis utilizadas em eventos do EasyTEF
    Dim NumeroCupom As String

    Public Sub OnEfetuarFormaPagamento(ByRef operacaoECFOk As Boolean, _
                                       ByVal params As Object, _
                                       ByRef retorno As String) _
                                   Implements EasyTEF.IEasyTEFDiscadoEvents.OnEfetuarFormaPagamento
        If rbtBematech.Checked Then
            operacaoECFOk = Bematech_FI_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            operacaoECFOk = ECF_EfetuaFormaPagamento(params(0), params(1)) = ECF_RETORNO_OK
        End If
    End Sub

    Public Sub OnEncerrarCupomFiscal() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnEncerrarCupomFiscal
        If rbtBematech.Checked Then
            Call Bematech_FI_FechaComprovanteNaoFiscalVinculado()
            Call Bematech_FI_CancelaCupom()
        ElseIf rbtSweda.Checked Then
            Call ECF_FechaComprovanteNaoFiscalVinculado()
            Call ECF_CancelaCupom()
        End If
    End Sub

    Public Sub OnFecharComprovanteNaoFiscalVinculado() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnFecharComprovanteNaoFiscalVinculado
        If rbtBematech.Checked Then
            Call Bematech_FI_FechaComprovanteNaoFiscalVinculado()
        ElseIf rbtSweda.Checked Then
            Call ECF_FechaComprovanteNaoFiscalVinculado()
        End If
    End Sub

    Public Sub OnFecharRelatorioGerencial(ByRef operacaoECFOk As Boolean) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnFecharRelatorioGerencial
        If rbtBematech.Checked Then
            operacaoECFOk = Bematech_FI_FechaRelatorioGerencial = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            operacaoECFOk = ECF_FechaRelatorioGerencial = ECF_RETORNO_OK
        End If
    End Sub

    Public Sub OnImpressoraTemPapel(ByRef operacaoECFOk As Boolean) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnImpressoraTemPapel
        'Dim a As Integer
        'Dim s1 As Integer
        'Dim s2 As Integer
        'Dim i As Integer
        'Dim aviso As String
        'Dim erro As String

        '*********************************************************************
        '* As linhas ABAIXO devem ser descomentadas se usar ECF ** Física **
        '* e a linha operacaoECFOK deve ser comentada.
        '*********************************************************************

        'a = 0
        's1 = 0
        's2 = 0
        If rbtBematech.Checked Then
            'Call Bematech_FI_VerificaEstadoImpressora(a, s1, s2)
        ElseIf rbtSweda.Checked Then
            'Call ECF_VerificaEstadoImpressora(a, s1, s2)
        End If
        'operacaoECFOK = Not (s1 >= 128) 'fim de papel

        '*********************************************************************
        '* As linhas ACIMA devem ser comentadas se usar ECF ** Emulada **
        '* e a linha abaixo NÃO deve ser comentada.
        '*********************************************************************
        operacaoECFOk = True
    End Sub

    Public Sub OnImprimirRelatorioGerencial(ByVal imagemCupomTEF As Object, _
                                            ByRef impressaoOk As Boolean) _
                                        Implements EasyTEF.IEasyTEFDiscadoEvents.OnImprimirRelatorioGerencial
        Dim s As String = ""
        Call ArrayToStr(imagemCupomTEF, s)
        If rbtBematech.Checked Then
            impressaoOk = Bematech_FI_RelatorioGerencial(s) = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            impressaoOk = ECF_RelatorioGerencial(s) = ECF_RETORNO_OK
        End If
    End Sub

    Public Sub OnIniciarFechamentoCupomFiscal(ByRef operacaoECFOk As Boolean, _
                                              ByVal params As Object, _
                                              ByRef retorno As String) _
                                          Implements EasyTEF.IEasyTEFDiscadoEvents.OnIniciarFechamentoCupomFiscal
        If rbtBematech.Checked Then
            operacaoECFOk = Bematech_FI_IniciaFechamentoCupom(params(0), _
                params(1), params(2)) = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            operacaoECFOk = ECF_IniciaFechamentoCupom(params(0), _
                params(1), params(2)) = ECF_RETORNO_OK
        End If
    End Sub

    Public Sub OnSubTotalizarCupom(ByRef operacaoECFOk As Boolean, _
                                   ByVal params As Object, _
                                   ByRef retorno As String) _
                               Implements EasyTEF.IEasyTEFDiscadoEvents.OnSubTotalizarCupom
        retorno = Space(14)
        If rbtBematech.Checked Then
            operacaoECFOk = Bematech_FI_SubTotal(retorno) = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            operacaoECFOk = ECF_SubTotal(retorno) = ECF_RETORNO_OK
        End If
    End Sub

    Public Sub OnTerminarCancelamentoMultiplosCartoes() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnTerminarCancelamentoMultiplosCartoes
        mmoCupomFiscal.Text = ""
        Call habilitarBotoes(False)
        Call limparFormasPgto()
    End Sub

    Public Sub OnTerminarFechamentoCupom(ByRef operacaoECFOk As Boolean, _
                                         ByVal params As Object, _
                                         ByRef retorno As String) _
                                     Implements EasyTEF.IEasyTEFDiscadoEvents.OnTerminarFechamentoCupom
        If rbtBematech.Checked Then
            operacaoECFOk = Bematech_FI_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            operacaoECFOk = ECF_TerminaFechamentoCupom(params(0)) = ECF_RETORNO_OK
        End If

    End Sub

    Public Sub OnUsarComprovanteNaoFiscalVinculado(ByVal imagemCupomTEF As Object, _
                                                   ByRef impressaoOk As Boolean) _
                                               Implements EasyTEF.IEasyTEFDiscadoEvents.OnUsarComprovanteNaoFiscalVinculado
        Dim s As String = ""
        Call ArrayToStr(imagemCupomTEF, s)
        If rbtBematech.Checked Then
            impressaoOk = Bematech_FI_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            impressaoOk = ECF_UsaComprovanteNaoFiscalVinculado(s) = ECF_RETORNO_OK
        End If
    End Sub

    Public Sub OnImprimirLeituraX(ByRef operacaoECFOk As Boolean) _
            Implements IEasyTEFDiscadoEvents.OnImprimirLeituraX
        operacaoECFOk = True
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
        EasyTEF.Gerenciador = TipoGerenciador.tgGerenciadorPadrao
        EasyTEF.FormMsgOperador.Fonte = f
        EasyTEF.FormMsgOperador.Altura = 110
        EasyTEF.FormMsgOperador.Largura = 400
        EasyTEF.FormMsgOperador.BotaoOK.Altura = 25
        EasyTEF.FormMsgOperador.BotaoOK.Largura = 75
        EasyTEF.ContraSenha = "1558542034e082"

        EasyTEF.Somente1RelGerencial = True

        EasyTEF.CieloPremia.RazaoSocialSW = "Razão Social da Software House"
        EasyTEF.CieloPremia.VersaoSW = "Nome da Automação e Versão"
        EasyTEF.CieloPremia.Tipo = TipoCieloPremia.tcpAmbas

        If Not EasyTEF.AutoVerificarTEF Then
            EasyTEF.AutoVerificarTEF = True
        End If
    End Sub

    Private Sub FrenteCaixaFrm_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles Me.KeyUp
        If e.Shift = False Then
            If e.KeyCode = Keys.F3 And btnAdicionarItem.Enabled Then
                Call adicionarProduto()
            ElseIf e.KeyCode = Keys.F4 And btnNovo.Enabled Then
                Call novaVenda()
            ElseIf e.KeyCode = Keys.F5 And btnCancelarItem.Enabled Then
                Call cancelarItem()
            ElseIf e.KeyCode = Keys.F6 And btnCancelarVenda.Enabled Then
                Call cancelarVenda()
            ElseIf e.KeyCode = Keys.F7 And btnEncerrarVenda.Enabled Then
                Call encerrarVenda()
            End If
        End If

    End Sub

    Private Sub FrenteCaixaFrm_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Total = 0
        Call CarregarEasyTEF()
    End Sub

    Private Sub FrenteCaixaFrm_FormClosing(ByVal sender As System.Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles MyBase.FormClosing
        'Libera a referência do objeto COM
        EasyTEF = Nothing
        icp.Unadvise(cookie)
    End Sub

    Private Sub novaVenda()
        Cursor = Cursors.WaitCursor

        TotalDescontoCielo = 0
        TotalSaqueCielo = 0

        mmoCupomFiscal.Text = ""
        If rbtBematech.Checked Then
            Retorno = Bematech_FI_AbreCupom("")
        ElseIf rbtSweda.Checked Then
            Retorno = ECF_AbreCupom("")
        End If
        If Not (Retorno = ECF_RETORNO_OK) Then
            Call mostrarMsgErroECF("Não foi possível abrir o cupom fiscal. O código de erro é: ")
        Else
            Call habilitarBotoes(True)

            Seq = 0
            Total = 0

            NumeroCupom = Space(6)
            If rbtBematech.Checked Then
                Retorno = Bematech_FI_NumeroCupom(NumeroCupom)
            ElseIf rbtSweda.Checked Then
                Retorno = ECF_NumeroCupom(NumeroCupom)
            End If

            Call adicionarLinhasDisplay("Cupom Fiscal No. " & NumeroCupom)
            Call adicionarLinhasDisplay(" ")
            Call adicionarLinhasDisplay(" ")

        End If

        Cursor = Cursors.Default
    End Sub

    Private Sub mostrarMsgErroECF(ByVal msg As String)
        MsgBox(msg & Retorno, vbExclamation, CUPOM_FISCAL)
    End Sub

    Private Sub habilitarBotoes(ByVal habilitar As Boolean)
        btnNovo.Enabled = Not habilitar
        btnAdicionarItem.Enabled = habilitar
        btnCancelarItem.Enabled = habilitar
        btnCancelarVenda.Enabled = habilitar
        btnEncerrarVenda.Enabled = habilitar
    End Sub

    Private Sub adicionarLinhasDisplay(ByVal s As String)
        mmoCupomFiscal.Text = mmoCupomFiscal.Text & vbCrLf & s
    End Sub

    Private Sub cancelarItem()
        Dim numero As String
        numero = ""
        While (numero = "")
            numero = InputBox("Informe o numero do item no cupom", _
                "Informe o numero do item no cupom", "000")
        End While

        If Len(numero) = 1 Then
            numero = "00" & numero
        ElseIf Len(numero) = 2 Then
            numero = "0" & numero
        End If

        If rbtBematech.Checked Then
            Retorno = Bematech_FI_CancelaItemGenerico(numero)
        ElseIf rbtSweda.Checked Then
            Retorno = ECF_CancelaItemGenerico(numero)
        End If

        If Not (Retorno = ECF_RETORNO_OK) Then
            mostrarMsgErroECF("Não foi possível cancelar o Item. O código de erro é: ")
        Else
            Call adicionarLinhasDisplay(" ")
            Call adicionarLinhasDisplay("Item " & numero & " cancelado")
            Call adicionarLinhasDisplay(" ")
        End If

    End Sub

    Private Sub btnCancelarItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnCancelarItem.Click
        Call cancelarItem()
    End Sub

    Private Sub cancelarVenda()
        Cursor = Cursors.WaitCursor

        mmoCupomFiscal.Text = ""
        If rbtBematech.Checked Then
            Retorno = Bematech_FI_CancelaCupom
        ElseIf rbtSweda.Checked Then
            Retorno = ECF_CancelaCupom
        End If

        If Not (Retorno = ECF_RETORNO_OK) Then
            mostrarMsgErroECF("Não foi possível cancelar o cupom fiscal. O código de erro é: ")
        Else
            Call habilitarBotoes(False)
        End If

        Cursor = Cursors.Default
    End Sub

    Private Sub btnCancelarVenda_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnCancelarVenda.Click
        Call cancelarVenda()
    End Sub

    Private Sub encerrarVenda()
        Dim valorTotal As Double
        Dim valorDinheiro As Double
        Dim valorCheque As Double
        Dim valorCartao As Double
        Dim parametros As Object()
        Dim desconto As String
        Dim tipoDesc As String
        Dim valor As String
        Dim OperacaoECFOK As Boolean
        Dim Cartoes() As Object
        Dim CountCartoes As Integer = 0

        Cursor = Cursors.WaitCursor

        parametros = New Object(1) {}
        valorTotal = EasyTEF.TratarCupomFiscal(MetodoECF.tmeSubTotalizarCupom, parametros, OperacaoECFOK)
        If valorTotal / 100 = 0 Then
            Cursor = Cursors.Default
            MsgBox("Cupom fiscal sem valor, operação cancelada")
            Exit Sub
        Else
            valorDinheiro = edtValorDinheiro.Text
            valorCheque = edtValorCheque.Text
            valorCartao = CDbl(edtValorCartao1.Text) + _
                CDbl(edtValorCartao2.Text) + _
                CDbl(edtValorCartao3.Text)

            If Not ((valorTotal / 100) = (valorDinheiro + valorCheque + valorCartao + _
                                          ObterValoresTransacaoAnteriorCartao())) Then
                Cursor = Cursors.Default
                MsgBox("Total das formas de pagamento diferente do total do cupom")
                Exit Sub
            End If
        End If


        ' Se houver um pagamento com 1 cartão
        If IIf(edtValorCartao1.Text = "", _
            "0,00", edtValorCartao1.Text) > 0 Then

            CountCartoes = CountCartoes + 1
            ReDim Preserve Cartoes(CountCartoes - 1)
            Cartoes(CountCartoes - 1) = edtValorCartao1.Text

            ' Se houver um pagamento com 2 cartões
            If IIf(edtValorCartao2.Text = "", _
                "0,00", edtValorCartao2.Text) > 0 Then

                CountCartoes = CountCartoes + 1
                ReDim Preserve Cartoes(CountCartoes - 1)
                Cartoes(CountCartoes - 1) = edtValorCartao2.Text

                ' Se houver um pagamento com 3 cartões
                If IIf(edtValorCartao3.Text = "", _
                    "0,00", edtValorCartao3.Text) > 0 Then

                    CountCartoes = CountCartoes + 1
                    ReDim Preserve Cartoes(CountCartoes - 1)
                    Cartoes(CountCartoes - 1) = edtValorCartao3.Text

                End If
            End If

            If CountCartoes > 0 Then
                If Not TratarPagamentoComCartoes(Cartoes) Then
                    MsgBox("Não foi possível terminar o pagamento com cartão.", vbCritical)
                    Exit Sub
                End If
            End If

        End If

        desconto = "D"
        tipoDesc = "$"
        valor = "0"

        ReDim parametros(3)
        parametros(0) = desconto
        parametros(1) = tipoDesc
        parametros(2) = valor

        Call EasyTEF.TratarCupomFiscal(MetodoECF.tmeIniciarFechamentoCupomFiscal, parametros, OperacaoECFOK)

        If Val(edtValorDinheiro.Text) > 0 Then
            parametros = New Object(2) {}
            parametros(0) = "Dinheiro"
            parametros(1) = Format(FORMATO_MONEY, edtValorDinheiro.Text)
            Call EasyTEF.TratarCupomFiscal(MetodoECF.tmeEfetuarFormaPagamento, parametros, OperacaoECFOK)

            ' A variável operacaoECFOK retorna se o comando da ECF foi executado
            ' com sucesso ou não
            If Not OperacaoECFOK Then
                MsgBox("Não foi possível efetuar a forma de pagamento 'Dinheiro'.", vbCritical)
                Exit Sub
            End If
        End If

        If Val(edtValorCheque.Text) > 0 Then
            parametros = New Object(2) {}
            parametros(0) = FORMA_PGTO_CHEQUE
            parametros(1) = Format(FORMATO_MONEY, edtValorCheque.Text)
            Call EasyTEF.TratarCupomFiscal(MetodoECF.tmeEfetuarFormaPagamento, parametros, OperacaoECFOK)

            If Not OperacaoECFOK Then
                MsgBox("Não foi possível efetuar a forma de pagamento 'Cheque'.", vbCritical)
                Exit Sub
            End If
        End If

        ' se houve pagamento com cartão
        ' usa o método automático para efetuar as formas de pagamento de maneira
        ' simples, ou seja, somente descrição da forma de pagamento de cartão
        ' e o valor de cada forma de pagamento
        If Not (EasyTEF.OperacaoTEFAtual = TipoTEF.ttCheque) Then
            If Not EasyTEF.EfetuarFormasPagamentoCartao Then
                MsgBox("Não foi possível efetuar a(s) forma(s) de pagamento de cartão.", vbCritical)
                Exit Sub
            End If
        End If

        parametros = New Object(1) {}
        parametros(0) = "Mensagem desejada de fechamento do cupom..."
        Call EasyTEF.TratarCupomFiscal(MetodoECF.tmeTerminarFechamentoCupomFiscal, parametros, OperacaoECFOK)

        If Not OperacaoECFOK Then
            MsgBox("Não foi possível terminar o fechamento do cupom fiscal.", vbCritical)
            Exit Sub
        End If

        ' imprime todos os cupons tef de transações aprovadas
        If EasyTEF.ImprimirCuponsECF Then
            NumeroCupom = ""
        End If

        mmoCupomFiscal.Text = ""
        Call habilitarBotoes(False)
        Call limparFormasPgto()

        Cursor = Cursors.Default

    End Sub

    Public Function TratarPagamentoComCartoes(Valores As Object) As Boolean
        Dim resultado As Boolean
        Dim valorCartao As Double
        Dim i As Integer

        resultado = True

        EasyTEF.NumeroDeCartoes = 0

        If IsArray(Valores) Then
            EasyTEF.ImprimirComprovante = False
            EasyTEF.NumeroDeCartoes = UBound(Valores) + 1
            For i = 1 To EasyTEF.NumeroDeCartoes
                valorCartao = Valores(i - 1)

                Call EasyTEF.PagarNoCartao(valorCartao, TipoMoeda.tmReal, valorCartao, _
                    i = 1, i = EasyTEF.NumeroDeCartoes, FORMA_PGTO_CARTAO)

                resultado = EasyTEF.TransacaoAprovada
                If Not EasyTEF.TransacaoAprovada Then
                    MsgBox("Não foi possível finalizar com sucesso o pagamento com cartão", _
                        vbCritical)
                    Exit For
                Else
                    TotalDescontoCielo = TotalDescontoCielo + EasyTEF.ValorCampo709_000
                    TotalSaqueCielo = TotalSaqueCielo + EasyTEF.ValorCampo708_000
                    If BufferTransacoesTEF Is Nothing Then
                        ReDim BufferTransacoesTEF(0)
                    Else
                        ReDim Preserve BufferTransacoesTEF(UBound(BufferTransacoesTEF))
                    End If

                    ' nome da rede + NSU + finalização
                    BufferTransacoesTEF(UBound(BufferTransacoesTEF)) = EasyTEF.ValorCampo010_000 & ";" _
                        & EasyTEF.ValorCampo012_000 & ";" & EasyTEF.ValorCampo027_000
                End If

            Next i

        End If

        If UsuarioNaoQuerOutraFormaPgto Then
            Call limparFormasPgto()
        End If

        TratarPagamentoComCartoes = resultado
    End Function

    Private Sub limparFormasPgto()

        chkConsultaSerasa.Checked = False

        edtValorDinheiro.Text = "0,00"
        edtValorCheque.Text = "0,00"
        edtValorCartao1.Text = "0,00"
        edtValorCartao2.Text = "0,00"
        edtValorCartao3.Text = "0,00"

    End Sub

    Private Sub adicionarProduto()
        Dim casasDec As Integer
        Dim tipoQtd As String
        Dim tipoDesc As String
        Dim desc As String

        Cursor = Cursors.WaitCursor

        If rbtInteira.Checked Then
            tipoQtd = "I"
        Else
            tipoQtd = "F"
        End If

        If rbt2Casas.Checked Then
            casasDec = 2
        Else
            casasDec = 3
        End If

        If rbtPercentual.Checked Then
            tipoDesc = "%"
        Else
            tipoDesc = "$"
        End If

        desc = edtDescricao.Text

        If rbtBematech.Checked Then
            Retorno = Bematech_FI_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
                tipoQtd, edtQtde.Text, casasDec, edtValorUnit.Text, _
                tipoDesc, edtValorDesconto.Text)
        ElseIf rbtSweda.Checked Then
            Retorno = ECF_VendeItem(edtCodigo.Text, desc, edtAliquota.Text, _
                tipoQtd, edtQtde.Text, casasDec, edtValorUnit.Text, _
                tipoDesc, edtValorDesconto.Text)
        End If
        If Retorno = ECF_RETORNO_OK Then
            Seq = Seq + 1
            Call adicionarLinhasDisplay(Seq & vbTab & desc & vbTab & _
                edtQtde.Text & " x " & edtValorUnit.Text)

            Total = Total + edtValorUnit.Text * edtQtde.Text

            edtCodigo.Focus()
            btnEncerrarVenda.Enabled = True
            btnCancelarVenda.Enabled = True
        Else
            Call mostrarMsgErroECF("Não foi possível adicionar o item. O código de erro é: ")
        End If

        Cursor = Cursors.Default

    End Sub

    Private Sub btnEncerrarVenda_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnEncerrarVenda.Click
        Call encerrarVenda()
    End Sub

    Private Sub btnAdicionarItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnAdicionarItem.Click
        Call adicionarProduto()
    End Sub

    Private Sub btnAdm_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnAdm.Click
        Cursor = Cursors.WaitCursor

        EasyTEF.ImprimirComprovante = True
        Call EasyTEF.FazerRequisicaoAdministrativa()

        Cursor = Cursors.Default
    End Sub

    Private Sub btnNovo_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnNovo.Click
        Call novaVenda()
    End Sub

    Private Sub btnFechar_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnFechar.Click
        Close()
    End Sub

    Private Sub ArrayToStr(ByVal a As Object, ByRef s As String)
        Dim i As Integer
        s = ""
        For i = LBound(a) To UBound(a)
            s = s & a(i) & vbCrLf
        Next i
    End Sub

    Public Sub OnAntesConfirmacao() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesConfirmacao

    End Sub

    Public Sub OnAntesEnviarRequisicao(ByVal req As Object) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesEnviarRequisicao

    End Sub

    Public Sub OnAntesNaoConfirmacao() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesNaoConfirmacao

    End Sub

    Public Sub OnAposConfirmacao() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposConfirmacao

    End Sub

    Public Sub OnAposNaoConfirmacao() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposNaoConfirmacao

    End Sub

    Public Sub OnAposTransacaoNegada(ByVal UsarOutraFormaPgto As Boolean) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposTransacaoNegada
        UsuarioNaoQuerOutraFormaPgto = Not UsarOutraFormaPgto
        If UsarOutraFormaPgto Then
            Call limparFormasPgto()
            ' Sugere terminar o cupom fiscal em dinheiro
            edtValorDinheiro.Text = Format(Total - ObterValoresTransacaoAnteriorCartao(), "#0.00")
            MsgBox("Atenção. Este exemplo em VB.NET sugere automaticamente terminar " & _
                "o cupom fiscal em DINHEIRO." & vbCrLf & vbCrLf & _
                "Observe que o valor em cartão foi apagado e o restante do cupom " & _
                "fiscal foi preenchido no campo Dinheiro.", vbExclamation)
        End If

    End Sub

    Public Sub OnGerarIdentificador(ByRef identificacao As Integer) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnGerarIdentificador
        Randomize()
        identificacao = Int(Rnd() * 1000) + 1
    End Sub

    Public Sub OnAbrirComprovanteNaoFiscalVinculado(ByRef operacaoECFOK As Boolean, _
                                                    NomeFormaPgto As String, _
                                                    ValorPgto As Double) _
                                                Implements EasyTEF.IEasyTEFDiscadoEvents.OnAbrirComprovanteNaoFiscalVinculado
        Dim valor As String

        valor = Format(ValorPgto, "#0.00")
        If rbtBematech.Checked Then
            operacaoECFOK = Bematech_FI_AbreComprovanteNaoFiscalVinculado(NomeFormaPgto, _
                valor, NumeroCupom) = ECF_RETORNO_OK
        ElseIf rbtSweda.Checked Then
            operacaoECFOK = ECF_AbreComprovanteNaoFiscalVinculado(NomeFormaPgto, _
                valor, NumeroCupom) = ECF_RETORNO_OK
        End If

    End Sub

    Public Sub OnAntesImprimir1aViaCupomTEF() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAntesImprimir1aViaCupomTEF

        If rbtSweda.Checked Then
            If EasyTEF.ComandoECF = MetodoECF.tmeUsarComprovanteNaoFiscalVinculado Then
                Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            ElseIf EasyTEF.ComandoECF = MetodoECF.tmeImprimirRelatorioGerencial Then
                Call ECF_RelatorioGerencial(vbCrLf)
                Call ECF_RelatorioGerencial(vbCrLf)
                Call ECF_RelatorioGerencial(vbCrLf)
            End If
        ElseIf rbtBematech.Checked Then
            If EasyTEF.ComandoECF = MetodoECF.tmeUsarComprovanteNaoFiscalVinculado Then
                Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            ElseIf EasyTEF.ComandoECF = MetodoECF.tmeImprimirRelatorioGerencial Then
                Call Bematech_FI_RelatorioGerencial(vbCrLf)
                Call Bematech_FI_RelatorioGerencial(vbCrLf)
                Call Bematech_FI_RelatorioGerencial(vbCrLf)
            End If
        End If

    End Sub

    Public Sub OnAposImpressoraNaoResponde(TentarNovamente As Boolean) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposImpressoraNaoResponde

    End Sub

    Public Sub OnAposImprimir1aViaCupomTEF() _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposImprimir1aViaCupomTEF

        If rbtSweda.Checked Then
            If EasyTEF.ComandoECF = MetodoECF.tmeUsarComprovanteNaoFiscalVinculado Then
                Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call ECF_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            ElseIf EasyTEF.ComandoECF = MetodoECF.tmeImprimirRelatorioGerencial Then
                Call ECF_RelatorioGerencial(vbCrLf)
                Call ECF_RelatorioGerencial(vbCrLf)
                Call ECF_RelatorioGerencial(vbCrLf)
            End If
        ElseIf rbtBematech.Checked Then
            If EasyTEF.ComandoECF = MetodoECF.tmeUsarComprovanteNaoFiscalVinculado Then
                Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
                Call Bematech_FI_UsaComprovanteNaoFiscalVinculado(vbCrLf)
            ElseIf EasyTEF.ComandoECF = MetodoECF.tmeImprimirRelatorioGerencial Then
                Call Bematech_FI_RelatorioGerencial(vbCrLf)
                Call Bematech_FI_RelatorioGerencial(vbCrLf)
                Call Bematech_FI_RelatorioGerencial(vbCrLf)
            End If
        End If

    End Sub

    Public Sub OnAposLerRespostaRequisicao(Arquivo As Object) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnAposLerRespostaRequisicao

    End Sub

    Public Sub OnImpressaoNaoFiscal(ImagemCupomTEF As Object, _
                                    ByRef ImpressaoOK As Boolean) _
                                Implements EasyTEF.IEasyTEFDiscadoEvents.OnImpressaoNaoFiscal

    End Sub

    Public Sub OnInterromperFluxo(ByRef Interromper As Boolean) _
            Implements EasyTEF.IEasyTEFDiscadoEvents.OnInterromperFluxo

    End Sub

    Public Sub OnValorPersonalizadoReq(ByRef Campo As Object, _
                                       ByRef Valor As Object) _
                                   Implements EasyTEF.IEasyTEFDiscadoEvents.OnValorPersonalizadoReq

    End Sub

    Public Sub OnAbrirRelatorioGerencial() Implements EasyTEF.IEasyTEFDiscadoEvents.OnAbrirRelatorioGerencial

        If rbtSweda.Checked Then
            Call ECF_AbreRelatorioGerencial()
        End If

    End Sub

    Private Function ObterValoresTransacaoAnteriorCartao() As Double
        Dim i As Integer
        Dim acumulador As Double

        acumulador = 0

        If EasyTEF.OperacaoTEFAtual <> TipoTEF.ttCheque Then
            For i = LBound(EasyTEF.ValoresCartoes) To UBound(EasyTEF.ValoresCartoes)
                acumulador = acumulador + Val(EasyTEF.ValoresCartoes(i))
            Next i
        End If

        ObterValoresTransacaoAnteriorCartao = acumulador

    End Function

End Class
