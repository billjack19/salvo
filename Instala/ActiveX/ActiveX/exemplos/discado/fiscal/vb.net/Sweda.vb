Module Sweda
    Public Declare Function ECF_AlteraSimboloMoeda Lib "CONVECF.DLL" (ByVal SimboloMoeda As String) As Integer
    Public Declare Function ECF_ProgramaAliquota Lib "CONVECF.DLL" (ByVal Aliquota As String, ByVal ICMS_ISS As Integer) As Integer
    Public Declare Function ECF_ProgramaHorarioVerao Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_NomeiaDepartamento Lib "CONVECF.DLL" (ByVal Indice As Integer, ByVal Departamento As String) As Integer
    Public Declare Function ECF_NomeiaTotalizadorNaoSujeitoIcms Lib "CONVECF.DLL" (ByVal Indice As Integer, ByVal Totalizador As String) As Integer
    Public Declare Function ECF_ProgramaArredondamento Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ProgramaTruncamento Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_LinhasEntreCupons Lib "CONVECF.DLL" (ByVal Linhas As Integer) As Integer
    Public Declare Function ECF_EspacoEntreLinhas Lib "CONVECF.DLL" (ByVal Dots As Integer) As Integer
    Public Declare Function ECF_ForcaImpactoAgulhas Lib "CONVECF.DLL" (ByVal ForcaImpacto As Integer) As Integer

    '---< Funções do Cupom Fiscal >---
    Public Declare Function ECF_AbreCupom Lib "CONVECF.DLL" (ByVal CGC_CPF As String) As Integer

    Public Declare Function ECF_VendeItem Lib "CONVECF.DLL" (ByVal Codigo As String, ByVal _
                            Descricao As String, ByVal _
                            Aliquota As String, ByVal _
                            TipoQuantidade As String, ByVal _
                            quantidade As String, ByVal _
                            CasasDecimais As Integer, ByVal _
                            ValorUnitario As String, ByVal _
                            TipoDesconto As String, ByVal _
                            desconto As String) As Integer

    Public Declare Function ECF_VendeItemDepartamento Lib "CONVECF.DLL" (ByVal Codigo As String, ByVal _
                            Descricao As String, ByVal _
                            Aliquota As String, ByVal _
                            ValorUnitario As String, ByVal _
                            quantidade As String, ByVal _
                            Acrescimo As String, ByVal _
                            desconto As String, ByVal _
                            IndiceDepartamento As String, ByVal _
                            UnidadeMedida As String) As Integer

    Public Declare Function ECF_CancelaItemAnterior Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_CancelaItemGenerico Lib "CONVECF.DLL" (ByVal NumeroItem As String) As Integer
    Public Declare Function ECF_CancelaCupom Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_FechaCupomResumido Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal Mensagem As String) As Integer
    Public Declare Function ECF_FechaCupom Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal _
                            AcrescimoDesconto As String, ByVal _
                            TipoAcrescimoDesconto As String, ByVal _
                            ValorAcrescimoDesconto As String, ByVal _
                            ValorPago As String, ByVal Mensagem As String) As Integer

    Public Declare Function ECF_ResetaImpressora Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_IniciaFechamentoCupom Lib "CONVECF.DLL" (ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
    Public Declare Function ECF_EfetuaFormaPagamento Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal ValorFormaPagamento As String) As Integer
    Public Declare Function ECF_EfetuaFormaPagamentoDescricaoForma Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal ValorFormaPagamento As String, ByVal DescricaoFormaPagto As String) As Integer
    Public Declare Function ECF_TerminaFechamentoCupom Lib "CONVECF.DLL" (ByVal Mensagem As String) As Integer
    Public Declare Function ECF_EstornoFormasPagamento Lib "CONVECF.DLL" (ByVal FormaOrigem As String, ByVal FormaDestino As String, ByVal valor As String) As Integer
    Public Declare Function ECF_UsaUnidadeMedida Lib "CONVECF.DLL" (ByVal UnidadeMedida As String) As Integer
    Public Declare Function ECF_AumentaDescricaoItem Lib "CONVECF.DLL" (ByVal Descricao As String) As Integer

    '---< Funções dos Relatórios Fiscais >---
    Public Declare Function ECF_LeituraX Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ReducaoZ Lib "CONVECF.DLL" (ByVal Data As String, ByVal Hora As String) As Integer
    Public Declare Function ECF_RelatorioGerencial Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF_RelatorioGerencialTEF Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF_FechaRelatorioGerencial Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalData Lib "CONVECF.DLL" (ByVal DataInicial As String, ByVal DataFinal As String) As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalReducao Lib "CONVECF.DLL" (ByVal ReducaoInicial As String, ByVal ReducaoFinal As String) As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalSerialData Lib "CONVECF.DLL" (ByVal DataInicial As String, ByVal DataFinal As String) As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalSerialReducao Lib "CONVECF.DLL" (ByVal ReducaoInicial As String, ByVal ReducaoFinal As String) As Integer

    '---< Funções das Operações Não Fiscais >---
    Public Declare Function ECF_RecebimentoNaoFiscal Lib "CONVECF.DLL" (ByVal IndiceTotalizador As String, ByVal valor As String, ByVal FormaPagamento As String) As Integer
    Public Declare Function ECF_AbreComprovanteNaoFiscalVinculado Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal valor As String, ByVal NumeroCupom As String) As Integer
    Public Declare Function ECF_UsaComprovanteNaoFiscalVinculado Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF_UsaComprovanteNaoFiscalVinculadoTEF Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF_FechaComprovanteNaoFiscalVinculado Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_Sangria Lib "CONVECF.DLL" (ByVal valor As String) As Integer
    Public Declare Function ECF_Suprimento Lib "CONVECF.DLL" (ByVal valor As String, ByVal FormaPagamento As String) As Integer
    Public Declare Function ECF_AbreRelatorioGerencial Lib "CONVECF.DLL" () As Integer

    '---< Funções de Informações da Impressora >---
    Public Declare Function ECF_NumeroSerie Lib "CONVECF.DLL" (ByVal NumeroSerie As String) As Integer
    Public Declare Function ECF_SubTotal Lib "CONVECF.DLL" (ByVal SubTotal As String) As Integer
    Public Declare Function ECF_NumeroCupom Lib "CONVECF.DLL" (ByVal NumeroCupom As String) As Integer
    Public Declare Function ECF_LeituraXSerial Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VersaoFirmware Lib "CONVECF.DLL" (ByVal VersaoFirmware As String) As Integer
    Public Declare Function ECF_CGC_IE Lib "CONVECF.DLL" (ByVal CGC As String, ByVal IE As String) As Integer
    Public Declare Function ECF_GrandeTotal Lib "CONVECF.DLL" (ByVal GrandeTotal As String) As Integer
    Public Declare Function ECF_Cancelamentos Lib "CONVECF.DLL" (ByVal ValorCancelamentos As String) As Integer
    Public Declare Function ECF_Descontos Lib "CONVECF.DLL" (ByVal ValorDescontos As String) As Integer
    Public Declare Function ECF_NumeroOperacoesNaoFiscais Lib "CONVECF.DLL" (ByVal NumeroOperacoes As String) As Integer
    Public Declare Function ECF_NumeroCuponsCancelados Lib "CONVECF.DLL" (ByVal NumeroCancelamentos As String) As Integer
    Public Declare Function ECF_NumeroIntervencoes Lib "CONVECF.DLL" (ByVal NumeroIntervencoes As String) As Integer
    Public Declare Function ECF_NumeroReducoes Lib "CONVECF.DLL" (ByVal NumeroReducoes As String) As Integer
    Public Declare Function ECF_NumeroSubstituicoesProprietario Lib "CONVECF.DLL" (ByVal NumeroSubstituicoes As String) As Integer
    Public Declare Function ECF_UltimoItemVendido Lib "CONVECF.DLL" (ByVal NumeroItem As String) As Integer
    Public Declare Function ECF_ClicheProprietario Lib "CONVECF.DLL" (ByVal Cliche As String) As Integer
    Public Declare Function ECF_NumeroCaixa Lib "CONVECF.DLL" (ByVal NumeroCaixa As String) As Integer
    Public Declare Function ECF_NumeroLoja Lib "CONVECF.DLL" (ByVal NumeroLoja As String) As Integer
    Public Declare Function ECF_SimboloMoeda Lib "CONVECF.DLL" (ByVal SimboloMoeda As String) As Integer
    Public Declare Function ECF_MinutosLigada Lib "CONVECF.DLL" (ByVal Minutos As String) As Integer
    Public Declare Function ECF_MinutosImprimindo Lib "CONVECF.DLL" (ByVal Minutos As String) As Integer
    Public Declare Function ECF_VerificaModoOperacao Lib "CONVECF.DLL" (ByVal Modo As String) As Integer
    Public Declare Function ECF_VerificaEpromConectada Lib "CONVECF.DLL" (ByVal Flag As String) As Integer
    Public Declare Function ECF_FlagsFiscais Lib "CONVECF.DLL" (ByRef Flag As Integer) As Integer
    Public Declare Function ECF_ValorPagoUltimoCupom Lib "CONVECF.DLL" (ByVal ValorCupom As String) As Integer
    Public Declare Function ECF_DataHoraImpressora Lib "CONVECF.DLL" (ByVal Data As String, ByVal Hora As String) As Integer
    Public Declare Function ECF_ContadoresTotalizadoresNaoFiscais Lib "CONVECF.DLL" (ByVal Contadores As String) As Integer
    Public Declare Function ECF_VerificaTotalizadoresNaoFiscais Lib "CONVECF.DLL" (ByVal Totalizadores As String) As Integer
    Public Declare Function ECF_DataHoraReducao Lib "CONVECF.DLL" (ByVal Data As String, ByVal Hora As String) As Integer
    Public Declare Function ECF_DataMovimento Lib "CONVECF.DLL" (ByVal Data As String) As Integer
    Public Declare Function ECF_VerificaTruncamento Lib "CONVECF.DLL" (ByVal Flag As String) As Integer
    Public Declare Function ECF_Acrescimos Lib "CONVECF.DLL" (ByVal ValorAcrescimos As String) As Integer
    Public Declare Function ECF_ContadorBilhetePassagem Lib "CONVECF.DLL" (ByVal ContadorPassagem As String) As Integer
    Public Declare Function ECF_VerificaAliquotasIss Lib "CONVECF.DLL" (ByVal Flag As String) As Integer
    Public Declare Function ECF_VerificaFormasPagamento Lib "CONVECF.DLL" (ByVal Formas As String) As Integer
    Public Declare Function ECF_VerificaRecebimentoNaoFiscal Lib "CONVECF.DLL" (ByVal Recebimentos As String) As Integer
    Public Declare Function ECF_VerificaDepartamentos Lib "CONVECF.DLL" (ByVal Departamentos As String) As Integer
    Public Declare Function ECF_VerificaTipoImpressora Lib "CONVECF.DLL" (ByRef TipoImpressora As Integer) As Integer
    Public Declare Function ECF_VerificaTotalizadoresParciais Lib "CONVECF.DLL" (ByVal Totalizadores As String) As Integer
    Public Declare Function ECF_RetornoAliquotas Lib "CONVECF.DLL" (ByVal Aliquotas As String) As Integer
    Public Declare Function ECF_VerificaEstadoImpressora Lib "CONVECF.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer) As Integer
    Public Declare Function ECF_DadosUltimaReducao Lib "CONVECF.DLL" (ByVal DadosReducao As String) As Integer
    Public Declare Function ECF_MonitoramentoPapel Lib "CONVECF.DLL" (ByRef Linhas As Integer) As Integer
    Public Declare Function ECF_VerificaIndiceAliquotasIss Lib "CONVECF.DLL" (ByVal Flag As String) As Integer
    Public Declare Function ECF_ValorFormaPagamento Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal valor As String) As Integer
    Public Declare Function ECF_ValorTotalizadorNaoFiscal Lib "CONVECF.DLL" (ByVal Totalizador As String, ByVal valor As String) As Integer

    '---< Funções de Autenticação e Gaveta de Dinheiro >---
    Public Declare Function ECF_Autenticacao Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ProgramaCaracterAutenticacao Lib "CONVECF.DLL" (ByVal parametros As String) As Integer
    Public Declare Function ECF_AcionaGaveta Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VerificaEstadoGaveta Lib "CONVECF.DLL" (ByRef EstadoGaveta As Integer) As Integer

    '---< Funções de Impressão de Cheques >---
    Public Declare Function ECF_ProgramaMoedaSingular Lib "CONVECF.DLL" (ByVal MoedaSingular As String) As Integer
    Public Declare Function ECF_ProgramaMoedaPlural Lib "CONVECF.DLL" (ByVal MoedaPlural As String) As Integer
    Public Declare Function ECF_CancelaImpressaoCheque Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VerificaStatusCheque Lib "CONVECF.DLL" (ByRef StatusCheque As Integer) As Integer
    Public Declare Function ECF_ImprimeCheque Lib "CONVECF.DLL" (ByVal Banco As String, ByVal _
                            valor As String, ByVal _
                            Favorecido As String, ByVal _
                            Cidade As String, ByVal _
                            Data As String, ByVal Mensagem As String) As Integer

    Public Declare Function ECF_IncluiCidadeFavorecido Lib "CONVECF.DLL" (ByVal Cidade As String, ByVal Favorecido As String) As Integer
    Public Declare Function ECF_ImprimeCopiaCheque Lib "CONVECF.DLL" () As Integer

    '---< Outras Funções >---
    Public Declare Function ECF_AbrePortaSerial Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_RetornoImpressora Lib "CONVECF.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer) As Integer
    Public Declare Function ECF_FechaPortaSerial Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_MapaResumo Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_AberturaDoDia Lib "CONVECF.DLL" (ByVal ValorCompra As String, ByVal FormaPagamento As String) As Integer
    Public Declare Function ECF_FechamentoDoDia Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ImprimeConfiguracoesImpressora Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ImprimeDepartamentos Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_RelatorioTipo60Analitico Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_RelatorioTipo60Mestre Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VerificaImpressoraLigada Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ImpressaoCarne Lib "CONVECF.DLL" (ByVal titulo As String, ByVal Percelas As String, _
                            ByVal datas As String, ByVal _
                            quantidade As Integer, ByVal _
                            texto As String, ByVal _
                            cliente As String, ByVal _
                            RG_CPF As String, ByVal _
                            cupom As String, ByVal _
                            vias As Integer, ByVal _
                            assina As Integer) As Integer
    Public Declare Function ECF_InfoBalanca Lib "CONVECF.DLL" (ByVal Porta As String, ByVal _
                            Modelo As Integer, ByVal _
                            Peso As String, ByVal _
                            precoKilo As String, ByVal _
                            total As String) As Integer
    Public Declare Function ECF_DadosSintegra Lib "CONVECF.DLL" (ByVal DataInicio As String, ByVal DataFinal As String) As Integer
    Public Declare Function ECF_IniciaModoTEF Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_FinalizaModoTEF Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VersaoDll Lib "CONVECF.DLL" (ByVal Versao As String) As Integer
    Public Declare Function ECF_RegistrosTipo60 Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_LeArquivoRetorno Lib "CONVECF.DLL" (ByVal retorno As String) As Integer

    '---< Funções da Impressora Fiscal MFD >---
    Public Declare Function ECF_AbreCupomMFD Lib "CONVECF.DLL" (ByVal CGC As String, ByVal ByValnome As String, ByVal ByValEndereco As String) As Integer
    Public Declare Function ECF_CancelaCupomMFD Lib "CONVECF.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
    Public Declare Function ECF_ProgramaFormaPagamentoMFD Lib "CONVECF.DLL" (ByVal FormaPagto As String, ByVal OperacaoTef As String) As Integer
    Public Declare Function ECF_EfetuaFormaPagamentoMFD Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal ValorFormaPagamento As String, ByVal Parcelas As String, ByVal DescricaoFormaPagto As String) As Integer
    Public Declare Function ECF_CupomAdicionalMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_AcrescimoDescontoItemMFD Lib "CONVECF.DLL" (ByVal Item As String, ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
    Public Declare Function ECF_NomeiaRelatorioGerencialMFD Lib "CONVECF.DLL" (ByVal Indice As String, ByVal Descricao As String) As Integer
    Public Declare Function ECF_AutenticacaoMFD Lib "CONVECF.DLL" (ByVal Linhas As String, ByVal texto As String) As Integer
    Public Declare Function ECF_AbreComprovanteNaoFiscalVinculadoMFD Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal valor As String, ByVal NumeroCupom As String, ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
    Public Declare Function ECF_ReimpressaoNaoFiscalVinculadoMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_AbreRecebimentoNaoFiscalMFD Lib "CONVECF.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
    Public Declare Function ECF_EfetuaRecebimentoNaoFiscalMFD Lib "CONVECF.DLL" (ByVal IndiceTotalizador As String, ByVal ValorRecebimento As String) As Integer
    Public Declare Function ECF_IniciaFechamentoRecebimentoNaoFiscalMFD Lib "CONVECF.DLL" (ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimo As String, ByVal ValorDesconto As String) As Integer
    Public Declare Function ECF_FechaRecebimentoNaoFiscalMFD Lib "CONVECF.DLL" (ByVal Mensagem As String) As Integer
    Public Declare Function ECF_CancelaRecebimentoNaoFiscalMFD Lib "CONVECF.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
    Public Declare Function ECF_AbreRelatorioGerencialMFD Lib "CONVECF.DLL" (ByVal Indice As String) As Integer
    Public Declare Function ECF_UsaRelatorioGerencialMFD Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF_UsaRelatorioGerencialMFDTEF Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF_SegundaViaNaoFiscalVinculadoMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_EstornoNaoFiscalVinculadoMFD Lib "CONVECF.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
    Public Declare Function ECF_NumeroSerieMFD Lib "CONVECF.DLL" (ByVal NumeroSerie As String) As Integer
    Public Declare Function ECF_VersaoFirmwareMFD Lib "CONVECF.DLL" (ByVal VersaoFirmware As String) As Integer
    Public Declare Function ECF_CNPJMFD Lib "CONVECF.DLL" (ByVal CNPJ As String) As Integer
    Public Declare Function ECF_InscricaoEstadualMFD Lib "CONVECF.DLL" (ByVal InscricaoEstadual As String) As Integer
    Public Declare Function ECF_InscricaoMunicipalMFD Lib "CONVECF.DLL" (ByVal InscricaoMunicipal As String) As Integer
    Public Declare Function ECF_TempoOperacionalMFD Lib "CONVECF.DLL" (ByVal TempoOperacional As String) As Integer
    Public Declare Function ECF_MinutosEmitindoDocumentosFiscaisMFD Lib "CONVECF.DLL" (ByVal Minutos As String) As Integer
    Public Declare Function ECF_ContadoresTotalizadoresNaoFiscaisMFD Lib "CONVECF.DLL" (ByVal Contadores As String) As Integer
    Public Declare Function ECF_VerificaTotalizadoresNaoFiscaisMFD Lib "CONVECF.DLL" (ByVal Totalizadores As String) As Integer
    Public Declare Function ECF_VerificaFormasPagamentoMFD Lib "CONVECF.DLL" (ByVal FormasPagamento As String) As Integer
    Public Declare Function ECF_VerificaRecebimentoNaoFiscalMFD Lib "CONVECF.DLL" (ByVal Recebimentos As String) As Integer
    Public Declare Function ECF_VerificaRelatorioGerencialMFD Lib "CONVECF.DLL" (ByVal Relatorios As String) As Integer
    Public Declare Function ECF_ContadorComprovantesCreditoMFD Lib "CONVECF.DLL" (ByVal Comprovantes As String) As Integer
    Public Declare Function ECF_ContadorOperacoesNaoFiscaisCanceladasMFD Lib "CONVECF.DLL" (ByVal OperacoesCanceladas As String) As Integer
    Public Declare Function ECF_ContadorRelatoriosGerenciaisMFD Lib "CONVECF.DLL" (ByVal Relatorios As String) As Integer
    Public Declare Function ECF_ContadorCupomFiscalMFD Lib "CONVECF.DLL" (ByVal CuponsEmitidos As String) As Integer
    Public Declare Function ECF_ContadorFitaDetalheMFD Lib "CONVECF.DLL" (ByVal ContadorFita As String) As Integer
    Public Declare Function ECF_ComprovantesNaoFiscaisNaoEmitidosMFD Lib "CONVECF.DLL" (ByVal Comprovantes As String) As Integer
    Public Declare Function ECF_NumeroSerieMemoriaMFD Lib "CONVECF.DLL" (ByVal NumeroSerieMFD As String) As Integer
    Public Declare Function ECF_MarcaModeloTipoImpressoraMFD Lib "CONVECF.DLL" (ByVal Marca As String, ByVal Modelo As String, ByVal Tipo As String) As Integer
    Public Declare Function ECF_ReducoesRestantesMFD Lib "CONVECF.DLL" (ByVal Reducoes As String) As Integer
    Public Declare Function ECF_VerificaTotalizadoresParciaisMFD Lib "CONVECF.DLL" (ByVal Totalizadores As String) As Integer
    Public Declare Function ECF_DadosUltimaReducaoMFD Lib "CONVECF.DLL" (ByVal DadosReducao As String) As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalDataMFD Lib "CONVECF.DLL" (ByVal DataInicial As String, ByVal DataFinal As String, ByVal FlagLeitura As String) As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalReducaoMFD Lib "CONVECF.DLL" (ByVal ReducaoInicial As String, ByVal ReducaoFinal As String, ByVal FlagLeitura As String) As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalSerialDataMFD Lib "CONVECF.DLL" (ByVal DataInicial As String, ByVal DataFinal As String, ByVal FlagLeitura As String) As Integer
    Public Declare Function ECF_LeituraMemoriaFiscalSerialReducaoMFD Lib "CONVECF.DLL" (ByVal ReducaoInicial As String, ByVal ReducaoFinal As String, ByVal FlagLeitura As String) As Integer
    Public Declare Function ECF_LeituraChequeMFD Lib "CONVECF.DLL" (ByVal CodigoCMC7 As String) As Integer
    Public Declare Function ECF_ImprimeChequeMFD Lib "CONVECF.DLL" (ByVal NumeroBanco As String, ByVal _
                            valor As String, ByVal _
                            Favorecido As String, ByVal _
                            Cidade As String, ByVal _
                            Data As String, ByVal _
                            Mensagem As String, ByVal _
                            ImpressaoVerso As String, ByVal _
                            Linhas As String) As Integer
    Public Declare Function ECF_HabilitaDesabilitaRetornoEstendidoMFD Lib "CONVECF.DLL" (ByVal FlagRetorno As String) As Integer
    Public Declare Function ECF_RetornoImpressoraMFD Lib "CONVECF.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer, ByRef ST3 As Integer) As Integer
    Public Declare Function ECF_AbreBilhetePassagemMFD Lib "CONVECF.DLL" (ByVal Embarque As String, ByVal _
                            Destino As String, ByVal _
                            Linha As String, ByVal _
                            Agencia As String, ByVal _
                            Data As String, ByVal _
                            Hora As String, ByVal _
                            Poltrona As String, ByVal _
                            Plataforma As String, ByVal _
                            TipoPassagem As String, ByVal _
                            RGCliente As String, ByVal _
                            NomeCliente As String, ByVal _
                            EnderecoCliente As String, ByVal _
                            UFDetino As String) As Integer
    Public Declare Function ECF_CancelaAcrescimoDescontoItemMFD Lib "CONVECF.DLL" (ByVal cFlag As String, ByVal cItem As String) As Integer
    Public Declare Function ECF_SubTotalizaCupomMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_SubTotalizaRecebimentoMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_TotalLivreMFD Lib "CONVECF.DLL" (ByVal cMemoriaLivre As String) As Integer
    Public Declare Function ECF_TamanhoTotalMFD Lib "CONVECF.DLL" (ByVal cTamanhoMFD As String) As Integer
    Public Declare Function ECF_AcrescimoDescontoSubtotalRecebimentoMFD Lib "CONVECF.DLL" (ByVal cFlag As String, ByVal cTipo As String, ByVal cValor As String) As Integer
    Public Declare Function ECF_AcrescimoDescontoSubtotalMFD Lib "CONVECF.DLL" (ByVal cFlag As String, ByVal cTipo As String, ByVal cValor As String) As Integer
    Public Declare Function ECF_CancelaAcrescimoDescontoSubtotalMFD Lib "CONVECF.DLL" (ByVal cFlag As String) As Integer
    Public Declare Function ECF_CancelaAcrescimoDescontoSubtotalRecebimentoMFD Lib "CONVECF.DLL" (ByVal cFlag As String) As Integer
    Public Declare Function ECF_TotalizaCupomMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_TotalizaRecebimentoMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_PercentualLivreMFD Lib "CONVECF.DLL" (ByVal cMemoriaLivre As String) As Integer
    Public Declare Function ECF_DataHoraUltimoDocumentoMFD Lib "CONVECF.DLL" (ByVal cDataHora As String) As Integer
    Public Declare Function ECF_MapaResumoMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_RelatorioTipo60AnaliticoMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ValorFormaPagamentoMFD Lib "CONVECF.DLL" (ByVal FormaPagamento As String, ByVal valor As String) As Integer
    Public Declare Function ECF_ValorTotalizadorNaoFiscalMFD Lib "CONVECF.DLL" (ByVal Totalizador As String, ByVal valor As String) As Integer
    Public Declare Function ECF_VerificaEstadoImpressoraMFD Lib "CONVECF.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer, ByRef ST3 As Integer) As Integer
    Public Declare Function ECF_IniciaFechamentoCupomMFD Lib "CONVECF.DLL" (ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimo As String, ByVal ValorDesconto As String) As Integer
    Public Declare Function ECF_TerminaFechamentoCupomCodigoBarrasMFD Lib "CONVECF.DLL" (ByVal cMensagem As String, ByVal _
                            cTipoCodigo As String, ByVal _
                            cCodigo As String, ByVal _
                            iAltura As Integer, ByVal _
                            iLargura As Integer, ByVal _
                            iPosicaoCaracteres As Integer, ByVal _
                            iFonte As Integer, ByVal _
                            iMargem As Integer, ByVal _
                            iCorrecaoErros As Integer, ByVal _
                            iColunas As Integer) As Integer
    Public Declare Function ECF_CancelaItemNaoFiscalMFD Lib "CONVECF.DLL" (ByVal NumeroItem As String) As Integer
    Public Declare Function ECF_AcrescimoItemNaoFiscalMFD Lib "CONVECF.DLL" (ByVal NumeroItem As String, ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
    Public Declare Function ECF_CancelaAcrescimoNaoFiscalMFD Lib "CONVECF.DLL" (ByVal NumeroItem As String, ByVal AcrescimoDesconto As String) As Integer
    Public Declare Function ECF_ImprimeClicheMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ImprimeInformacaoChequeMFD Lib "CONVECF.DLL" (ByVal Posicao As Integer, ByVal Linhas As Integer, ByVal Mensagem As String) As Integer
    Public Declare Function ECF_RelatorioSintegraMFD Lib "CONVECF.DLL" (ByVal iRelatorios As Integer, ByVal _
                            cArquivo As String, ByVal _
                            cMes As String, ByVal _
                            cAno As String, ByVal _
                            cRazaoSocial As String, ByVal _
                            cEndereco As String, ByVal _
                            cNumero As String, ByVal _
                            cComplemento As String, ByVal _
                            cBairro As String, ByVal _
                            cCidade As String, ByVal _
                            cCEP As String, ByVal _
                            cTelefone As String, ByVal _
                            cFax As String, ByVal _
                            cContato As String) As Integer
    Public Declare Function ECF_GeraRelatorioSintegraMFD Lib "CONVECF.DLL" (ByVal iRelatorios As Integer, ByVal _
                            cArquivoOrigem As String, ByVal _
                            cArquivoDestino As String, ByVal _
                            cMes As String, ByVal _
                            cAno As String, ByVal _
                            cRazaoSocial As String, ByVal _
                            cEndereco As String, ByVal _
                            cNumero As String, ByVal _
                            cComplemento As String, ByVal _
                            cBairro As String, ByVal _
                            cCidade As String, ByVal _
                            cCEP As String, ByVal _
                            cTelefone As String, ByVal _
                            cFax As String, ByVal _
                            cContato As String) As Integer
    Public Declare Function ECF_DownloadMF Lib "CONVECF.DLL" (ByVal Arquivo As String) As Integer
    Public Declare Function ECF_DownloadMFD Lib "CONVECF.DLL" (ByVal Arquivo As String, ByVal _
                            TipoDownload As String, ByVal _
                            ParametroInicial As String, ByVal _
                            ParametroFinal As String, ByVal _
                            UsuarioECF As String) As Integer
    Public Declare Function ECF_ReproduzirMemoriaFiscalMFD Lib "CONVECF.DLL" (ByVal Tipo As String, ByVal _
                            fxai As String, ByVal _
                            fxaf As String, ByVal _
                            asc As String, ByVal _
                            bin As String) As Integer
    Public Declare Function ECF_FormatoDadosMFD Lib "CONVECF.DLL" (ByVal ArquivoOrigem As String, ByVal _
                            ArquivoDestino As String, ByVal _
                            TipoFormato As String, ByVal _
                            TipoDownload As String, ByVal _
                            ParametroInicial As String, ByVal _
                            ParametroFinal As String, ByVal _
                            UsuarioECF As String) As Integer
    Public Declare Function ECF_AtivaDesativaVendaUmaLinhaMFD Lib "CONVECF.DLL" (ByVal iFlag As Integer) As Integer
    Public Declare Function ECF_AtivaDesativaAlinhamentoEsquerdaMFD Lib "CONVECF.DLL" (ByVal iFlag As Integer) As Integer
    Public Declare Function ECF_AtivaDesativaCorteProximoMFD Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_AtivaDesativaTratamentoONOFFLineMFD Lib "CONVECF.DLL" (ByVal iFlag As Integer) As Integer
    Public Declare Function ECF_StatusEstendidoMFD Lib "CONVECF.DLL" (ByRef iStatus As Integer) As Integer
    Public Declare Function ECF_VerificaFlagCorteMFD Lib "CONVECF.DLL" (ByRef iStatus As Integer) As Integer
    Public Declare Function ECF_TempoRestanteComprovanteMFD Lib "CONVECF.DLL" (ByVal cTempo As String) As Integer
    Public Declare Function ECF_UFProprietarioMFD Lib "CONVECF.DLL" (ByVal cUF As String) As Integer
    Public Declare Function ECF_GrandeTotalUltimaReducaoMFD Lib "CONVECF.DLL" (ByVal cGT As String) As Integer
    Public Declare Function ECF_DataMovimentoUltimaReducaoMFD Lib "CONVECF.DLL" (ByVal cData As String) As Integer
    Public Declare Function ECF_SubTotalComprovanteNaoFiscalMFD Lib "CONVECF.DLL" (ByVal cSubTotal As String) As Integer
    Public Declare Function ECF_InicioFimCOOsMFD Lib "CONVECF.DLL" (ByVal cCOOIni As String, ByVal cCOOFim As String) As Integer
    Public Declare Function ECF_InicioFimGTsMFD Lib "CONVECF.DLL" (ByVal cGTIni As String, ByVal cGTFim As String) As Integer

    '---< Novas Funções >---
    Public Declare Function ECF_VendeItemTresDecimais Lib "CONVECF.DLL" (ByVal Codigo As String, ByVal _
                            Nome As String, ByVal _
                            Aliquota As String, ByVal _
                            quant As String, ByVal _
                            valor As String, ByVal _
                            tipoacrdesc As String, ByVal _
                            perc As String) As Integer
    Public Declare Function ECF_IdentificaConsumidor Lib "CONVECF.DLL" (ByVal nomei As String, ByVal endi As String, ByVal cpfi As String) As Integer
    Public Declare Function ECF__EmitirCupomAdicional Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF__AbreRelatorioGerencial Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF__EnviarTextoCNF Lib "CONVECF.DLL" (ByVal cTexto As String) As Integer
    Public Declare Function ECF__AbreRecebimentoNaoFiscal Lib "CONVECF.DLL" (ByVal Indice As String, ByVal _
                            tipoacredesc As String, ByVal _
                            tipovalor As String, ByVal _
                            acredesci As String, ByVal _
                            receb As String, ByVal _
                            texto As String) As Integer
    Public Declare Function ECF__EfetuaFormaPagamentoNaoFiscal Lib "CONVECF.DLL" (ByVal legenda As String, ByVal valor As String, ByVal texto As String) As Integer
    Public Declare Function ECF__FundoCaixa Lib "CONVECF.DLL" (ByVal valor As String, ByVal legenda As String) As Integer
    Public Declare Function ECF__ReducaoZAjustaDataHora Lib "CONVECF.DLL" (ByVal cData As String, ByVal chora As String) As Integer
    Public Declare Function ECF__AutenticacaoStr Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF__ProgramaFormasPagamento Lib "CONVECF.DLL" (ByVal Modal As String) As Integer
    Public Declare Function ECF__ProgramaOperador Lib "CONVECF.DLL" (ByVal oper As String) As Integer
    Public Declare Function ECF__CfgFechaAutomaticoCupom Lib "CONVECF.DLL" (ByVal fac As String) As Integer
    Public Declare Function ECF__CfgRedZAutomatico Lib "CONVECF.DLL" (ByVal zauto As String) As Integer
    Public Declare Function ECF__CfgCupomAdicional Lib "CONVECF.DLL" (ByVal adicional As String) As Integer
    Public Declare Function ECF__CfgEspacamentoCupons Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF__CfgHoraMinReducaoZ Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF__CfgLimiarNearEnd Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF__CfgPermMensPromoCNF Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_Registry Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_Registry_AlteraRegistry Lib "CONVECF.DLL" (ByVal chave As String, ByVal valori As String) As Integer
    Public Declare Function ECF_Registry_Path Lib "CONVECF.DLL" (ByVal path As String) As Integer
    Public Declare Function ECF_Registry_PathMFD Lib "CONVECF.DLL" (ByVal path As String) As Integer
    Public Declare Function ECF_Registry_ZAutomatica Lib "CONVECF.DLL" (ByVal zauto As String) As Integer
    Public Declare Function ECF_Registry_Verao Lib "CONVECF.DLL" (ByVal verao As String) As Integer
    Public Declare Function ECF_Registry_Log Lib "CONVECF.DLL" (ByVal log As String) As Integer
    Public Declare Function ECF_Registry_AplMensagem1 Lib "CONVECF.DLL" (ByVal apl As String) As Integer
    Public Declare Function ECF_Registry_AplMensagem2 Lib "CONVECF.DLL" (ByVal apl As String) As Integer
    Public Declare Function ECF_Registry_Default Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_Registry_RetornaValor Lib "CONVECF.DLL" (ByVal ecf As String, ByVal chave As String, ByVal valor As String) As Integer
    Public Declare Function ECF_StatusCupomFiscal Lib "CONVECF.DLL" (ByVal cupa As String) As Integer
    Public Declare Function ECF_StatusRelatorioGerencial Lib "CONVECF.DLL" (ByVal rela As String) As Integer
    Public Declare Function ECF_StatusComprovanteNaoFiscalVinculado Lib "CONVECF.DLL" (ByVal vinc As String) As Integer
    Public Declare Function ECF_StatusComprovanteNaoFiscalNaoVinculado Lib "CONVECF.DLL" (ByVal nvinc As String) As Integer
    Public Declare Function ECF_VerificaModeloEcf Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VerificaHorarioVerao Lib "CONVECF.DLL" (ByVal verao As String) As Integer
    Public Declare Function ECF_VerificaZPendente Lib "CONVECF.DLL" (ByVal zpen As String) As Integer
    Public Declare Function ECF_VerificaXPendente Lib "CONVECF.DLL" (ByVal xpen As String) As Integer
    Public Declare Function ECF_VerificaDiaAberto Lib "CONVECF.DLL" (ByVal diaa As String) As Integer
    Public Declare Function ECF_VerificaDescricaoFormasPagamento Lib "CONVECF.DLL" (ByVal Formas As String) As Integer
    Public Declare Function ECF_VerificaFormasPagamentoEx Lib "CONVECF.DLL" (ByVal FPag As String) As Integer
    Public Declare Function ECF_VerificaTotalizadoresNaoFiscaisEx Lib "CONVECF.DLL" (ByVal Recebimento As String) As Integer
    Public Declare Function ECF_ClicheProprietarioEx Lib "CONVECF.DLL" (ByVal ClicheProprietario As String) As Integer
    Public Declare Function ECF_RegistraNumeroSerie Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VerificaNumeroSerie Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_RetornaSerialCriptografado Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_COO Lib "CONVECF.DLL" (ByVal COOi As String, ByVal COOf As String) As Integer
    Public Declare Function ECF_LerAliquotasComIndice Lib "CONVECF.DLL" (ByVal taxas As String) As Integer
    Public Declare Function ECF_VendaBruta Lib "CONVECF.DLL" (ByVal vbruta As String) As Integer
    Public Declare Function ECF_UltimaFormaPagamento Lib "CONVECF.DLL" (ByVal Nome As String, ByVal valor As String) As Integer
    Public Declare Function ECF_TipoUltimoDocumento Lib "CONVECF.DLL" () As Integer

    'Public Declare Function ECF_PalavraStatus Lib "CONVECF.DLL" (ByVal  status As String) As Integer

    Public Declare Function ECF_PalavraStatusBinario Lib "CONVECF.DLL" (ByVal status As String) As Integer
    Public Declare Function ECF_RetornaErroExtendido Lib "CONVECF.DLL" (ByVal status As String) As Integer
    Public Declare Function ECF_RetornaAcrescimoNF Lib "CONVECF.DLL" (ByVal acnf As String) As Integer
    Public Declare Function ECF_RetornaCFCancelados Lib "CONVECF.DLL" (ByVal cfc As String) As Integer
    Public Declare Function ECF_RetornaCNFCancelados Lib "CONVECF.DLL" (ByVal nfc As String) As Integer
    Public Declare Function ECF_RetornaCLX Lib "CONVECF.DLL" (ByVal clx As String) As Integer
    Public Declare Function ECF_RetornaCNFNV Lib "CONVECF.DLL" (ByVal Recebimento As String) As Integer
    Public Declare Function ECF_RetornaCNFV Lib "CONVECF.DLL" (ByVal Vinculado As String) As Integer
    Public Declare Function ECF_RetornaCOO Lib "CONVECF.DLL" (ByVal COO As String) As Integer
    Public Declare Function ECF_RetornaCRO Lib "CONVECF.DLL" (ByVal cro As String) As Integer
    Public Declare Function ECF_RetornaCRZ Lib "CONVECF.DLL" (ByVal crz As String) As Integer
    Public Declare Function ECF_RetornaCRZRestante Lib "CONVECF.DLL" (ByVal sRed As String) As Integer
    Public Declare Function ECF_RetornaCancelamentoNF Lib "CONVECF.DLL" (ByVal cnf As String) As Integer
    Public Declare Function ECF_RetornaDescontoNF Lib "CONVECF.DLL" (ByVal dnf As String) As Integer
    Public Declare Function ECF_RetornaGNF Lib "CONVECF.DLL" (ByVal gnf As String) As Integer
    Public Declare Function ECF_RetornaTempoImprimindo Lib "CONVECF.DLL" (ByVal MinImprim As String) As Integer
    Public Declare Function ECF_RetornaTempoLigado Lib "CONVECF.DLL" (ByVal MinutosLigada As String) As Integer
    Public Declare Function ECF_RetornaTotalPagamentos Lib "CONVECF.DLL" (ByVal FPag As String) As Integer
    Public Declare Function ECF_RetornaTroco Lib "CONVECF.DLL" (ByVal troco As String) As Integer
    Public Declare Function ECF_RetornaRegistradoresNaoFiscais Lib "CONVECF.DLL" (ByVal rnf As String) As Integer
    Public Declare Function ECF_RetornaRegistradoresFiscais Lib "CONVECF.DLL" (ByVal rf As String) As Integer
    Public Declare Function ECF_RetornaValorComprovanteNaoFiscal Lib "CONVECF.DLL" (ByVal Indice As String, ByVal valor As String) As Integer
    Public Declare Function ECF_RetornaIndiceComprovanteNaoFiscal Lib "CONVECF.DLL" (ByVal Nome As String, ByVal Indice As String) As Integer
    Public Declare Function ECF_CasasDecimaisProgramada Lib "CONVECF.DLL" (ByVal dval As String, ByVal dqt As String) As Integer
    Public Declare Function ECF_TempoEsperaCheque Lib "CONVECF.DLL" (ByVal segundos As String) As Integer
    Public Declare Function ECF_StatusCheque Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ImprimirCheque Lib "CONVECF.DLL" (ByVal Banco As String, ByVal Cidade As String, ByVal cData As String, ByVal nominal As String, ByVal valor As String, ByVal pos As String) As Integer
    Public Declare Function ECF_ImprimirVersoCheque Lib "CONVECF.DLL" (ByVal texto As String) As Integer
    Public Declare Function ECF_LiberarCheque Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_LeituraCodigoMICR Lib "CONVECF.DLL" (ByVal cmc7 As String) As Integer
    Public Declare Function ECF_CancelarCheque Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ProgramarLeiauteCheque Lib "CONVECF.DLL" (ByVal Banco As String, ByVal geometria As String) As Integer
    Public Declare Function ECF_LeituraLeiautesCheques Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_DescontoSobreItemVendido Lib "CONVECF.DLL" (ByVal Item As String, ByVal tipodesc As String, ByVal valor As String) As Integer
    Public Declare Function ECF_AcrescimosICMSISS Lib "CONVECF.DLL" (ByVal vaicms As String, ByVal vaiss As String) As Integer
    Public Declare Function ECF_CancelamentosICMSISS Lib "CONVECF.DLL" (ByVal vcicms As String, ByVal vciss As String) As Integer
    Public Declare Function ECF_DescontosICMSISS Lib "CONVECF.DLL" (ByVal vdicms As String, ByVal vdiss As String) As Integer
    Public Declare Function ECF_LeituraInformacaoUltimoDoc Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_LeituraInformacaoUltimosCNF Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_VerificaRelatorioGerencialProgMFD Lib "CONVECF.DLL" (ByVal sRG As String) As Integer
    Public Declare Function ECF_SegundaViaCNFV Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_CancelamentoCNFV Lib "CONVECF.DLL" (ByVal ignorado As String) As Integer
    Public Declare Function ECF_TEF_ImprimirRespostaCartao Lib "CONVECF.DLL" (ByVal path As String, ByVal forma As String, ByVal trava As String, ByVal valor As String) As Integer
    Public Declare Function ECF_TEF_ImprimirResposta Lib "CONVECF.DLL" (ByVal path As String, ByVal forma As String, ByVal trava As String) As Integer
    Public Declare Function ECF_TEF_FechaRelatorio Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_TEF_EsperarArquivo Lib "CONVECF.DLL" (ByVal path As String, ByVal segundos As String, ByVal trava As String) As Integer
    Public Declare Function ECF_TEF_TravarTeclado Lib "CONVECF.DLL" (ByVal trava As String) As Integer
    Public Declare Function ECF_ApagaTabelaNomesNaoFiscais Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ApagaTabelaNomesFormasdePagamento Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ApagaTabelaAliquotas Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ApagaTabelaNomesRelatoriosGerenciais Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ArquivoSintegra2004MFD Lib "CONVECF.DLL" (ByVal itipo As Integer, ByVal _
                            cArquivo As String, ByVal _
                            cMes As String, ByVal _
                            cAno As String, ByVal _
                            cMesf As String, ByVal _
                            cAnof As String, ByVal _
                            cRazaoSocial As String, ByVal _
                            cEndereco As String, ByVal _
                            cNumero As String, ByVal _
                            cComplemento As String, ByVal _
                            cBairro As String, ByVal _
                            cCidade As String, ByVal _
                            cUF As String, ByVal _
                            cCEP As String, ByVal _
                            cTelefone As String, ByVal _
                            cFax As String, ByVal _
                            cContato As String) As Integer

    'public declare function ECF_LigaDesligaJanelas Lib  "CONVECF.DLL" (ByVal   impressora As String,resto As String) As Integer

    Public Declare Function ECF_EnviarLogotipoCliche Lib "CONVECF.DLL" (ByVal path As String) As Integer
    Public Declare Function ECF_GravarLogotipoCliche Lib "CONVECF.DLL" () As Integer
    Public Declare Function ECF_ExcluirLogotipoCliche Lib "CONVECF.DLL" () As Integer

    ' public declare function  ECF_ProgramarParametrosDiversos(ByVal ecf As String,loja As String,extra As String,qt As String,iss As String) As Integer
    ' public declare function  ECF_ProgramarCliche  Lib  "CONVECF.DLL" (ByVal   razao As String,fantasia As String,endereco:  pchar) As Integer

    Public Declare Function ECF_RetornaTipoEcf Lib "CONVECF.DLL" (ByVal Tipo As String) As Integer

    'Public Declare Function ECF_TabelaMercadoriasServicos3404 Lib "CONVECF.DLL" (ByVal destino As String, ByVal inicio As String, ByVal fim As String) As Integer

    'Public Declare Function ECF_ProgramarTotalizadoresNaoTributados Lib "CONVECF.DLL" (ByVal  f As String, ByVal _
    '                        i As String, ByVal _
    '                        n As String, ByVal _
    '                        fs As String, ByVal _
    '                        iss As String, ByVal _
    '                        ns As String) As Integer

    'Public Declare Function ECF_ReproduzirMemoriaFiscalMFD Lib "CONVECF.DLL" (ByVal tipo As String, ByVal _
    '                        fxai As String, ByVal _
    '                        fxaf As String, ByVal _
    '                        asc As String, ByVal _
    '                        bin As String) As Integer

    'Public Declare Function ECF_TipoUltimoDocumento Lib "CONVECF.DLL" (ByVal tipo As String) As Integer
    'Public Declare Function ECF_GeraRegistrosCAT52MFD Lib "CONVECF.DLL" (ByVal  pathbin As String, ByVal  datas As String) As Integer

    Public Declare Function ECF_CapturaDocunmentos Lib "CONVECF.DLL" (ByVal Tipo As String, ByVal faixai As String, ByVal faixaf As String, ByVal Arquivo As String, ByVal log As String) As Integer
    Public Declare Function ECF_ConfigurarECF Lib "CONVECF.DLL" (ByVal gui As String, ByVal velo As String, ByVal Modo As String, ByVal beep As String) As Integer
    Public Declare Function ECF_DataHoraGravacaoUsuarioSWBasicoMFAdicional Lib "CONVECF.DLL" (ByVal datusu As String, ByVal datsof As String, ByVal Adic As String) As Integer
    Public Declare Function ECF_FlagsFiscais3MFD Lib "CONVECF.DLL" (ByRef Flag As Integer) As Integer

End Module
