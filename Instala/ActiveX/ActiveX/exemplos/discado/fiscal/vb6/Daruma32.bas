Attribute VB_Name = "Daruma32Funcoes"

Public Declare Function Daruma_FI_NumeroSerie Lib "Daruma32.DLL" (ByVal NumeroSerie As String) As Integer
Public Declare Function Daruma_FI_SubTotal Lib "Daruma32.DLL" (ByVal SubTotal As String) As Integer
Public Declare Function Daruma_FI_NumeroCupom Lib "Daruma32.DLL" (ByVal NumeroCupom As String) As Integer
Public Declare Function Daruma_FI_ResetaImpressora Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_AbrePortaSerial Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_LeituraX Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_LeituraXSerial Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_AbreCupom Lib "Daruma32.DLL" (ByVal CGC_CPF As String) As Integer
Public Declare Function Daruma_FI_VendeItem Lib "Daruma32.DLL" (ByVal Codigo As String, ByVal Descricao As String, ByVal Aliquota As String, ByVal TipoQuantidade As String, ByVal quantidade As String, ByVal CasasDecimais As Integer, ByVal ValorUnitario As String, ByVal TipoDesconto As String, ByVal desconto As String) As Integer
Public Declare Function Daruma_FI_CancelaItemAnterior Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_CancelaItemGenerico Lib "Daruma32.DLL" (ByVal NumeroItem As String) As Integer
Public Declare Function Daruma_FI_CancelaCupom Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_FechaCupomResumido Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal Mensagem As String) As Integer
Public Declare Function Daruma_FI_ReducaoZ Lib "Daruma32.DLL" (ByVal Data As String, ByVal Hora As String) As Integer
Public Declare Function Daruma_FI_FechaCupom Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal DiscontoAcrecimo As String, ByVal TipoDescontoAcrecimo As String, ByVal ValorAcrecimoDesconto As String, ByVal ValorPago As String, ByVal Mensagem As String) As Integer
Public Declare Function Daruma_FI_VendeItemDepartamento Lib "Daruma32.DLL" (ByVal Codigo As String, ByVal Descricao As String, ByVal Aliquota As String, ByVal ValorUnitario As String, ByVal quantidade As String, ByVal Acrescimo As String, ByVal desconto As String, ByVal IndiceDepartamento As String, ByVal UnidadeMedida As String) As Integer
Public Declare Function Daruma_FI_AumentaDescricaoItem Lib "Daruma32.DLL" (ByVal Descricao As String) As Integer
Public Declare Function Daruma_FI_UsaUnidadeMedida Lib "Daruma32.DLL" (ByVal UnidadeMedida As String) As Integer
Public Declare Function Daruma_FI_AlteraSimboloMoeda Lib "Daruma32.DLL" (ByVal SimboloMoeda As String) As Integer
Public Declare Function Daruma_FI_ProgramaAliquota Lib "Daruma32.DLL" (ByVal Aliquota As String, ByVal ICMS_ISS As Integer) As Integer
Public Declare Function Daruma_FI_ProgramaHorarioVerao Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_NomeiaDepartamento Lib "Daruma32.DLL" (ByVal Indice As Integer, ByVal Departamento As String) As Integer
Public Declare Function Daruma_FI_NomeiaTotalizadorNaoSujeitoIcms Lib "Daruma32.DLL" (ByVal Indice As Integer, ByVal Totalizador As String) As Integer
Public Declare Function Daruma_FI_ProgramaArredondamento Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_ProgramaTruncamento Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_LinhasEntreCupons Lib "Daruma32.DLL" (ByVal Linhas As Integer) As Integer
Public Declare Function Daruma_FI_EspacoEntreLinhas Lib "Daruma32.DLL" (ByVal Dots As Integer) As Integer
Public Declare Function Daruma_FI_RelatorioGerencial Lib "Daruma32.DLL" (ByVal cTexto As String) As Integer
Public Declare Function Daruma_FI_FechaRelatorioGerencial Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_RecebimentoNaoFiscal Lib "Daruma32.DLL" (ByVal IndiceTotalizador As String, ByVal valor As String, ByVal FormaPagamento As String) As Integer
Public Declare Function Daruma_FI_AbreComprovanteNaoFiscalVinculado Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal valor As String, ByVal NumeroCupom As String) As Integer
Public Declare Function Daruma_FI_UsaComprovanteNaoFiscalVinculado Lib "Daruma32.DLL" (ByVal texto As String) As Integer
Public Declare Function Daruma_FI_FechaComprovanteNaoFiscalVinculado Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_Sangria Lib "Daruma32.DLL" (ByVal valor As String) As Integer
Public Declare Function Daruma_FI_Suprimento Lib "Daruma32.DLL" (ByVal valor As String, ByVal FormaPagamento As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalData Lib "Daruma32.DLL" (ByVal cDataInicial As String, ByVal cDataFinal As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalReducao Lib "Daruma32.DLL" (ByVal cReducaoInicial As String, ByVal cReducaoFinal As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalSerialData Lib "Daruma32.DLL" (ByVal cDataInicial As String, ByVal cDataFinal As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalSerialReducao Lib "Daruma32.DLL" (ByVal cReducaoInicial As String, ByVal cReducaoFinal As String) As Integer
Public Declare Function Daruma_FI_VersaoFirmware Lib "Daruma32.DLL" (ByVal VersaoFirmware As String) As Integer
Public Declare Function Daruma_FI_CGC_IE Lib "Daruma32.DLL" (ByVal CGC As String, ByVal IE As String) As Integer
Public Declare Function Daruma_FI_GrandeTotal Lib "Daruma32.DLL" (ByVal GrandeTotal As String) As Integer
Public Declare Function Daruma_FI_Cancelamentos Lib "Daruma32.DLL" (ByVal ValorCancelamentos As String) As Integer
Public Declare Function Daruma_FI_Descontos Lib "Daruma32.DLL" (ByVal ValorDescontos As String) As Integer
Public Declare Function Daruma_FI_NumeroOperacoesNaoFiscais Lib "Daruma32.DLL" (ByVal NumeroOperacoes As String) As Integer
Public Declare Function Daruma_FI_NumeroCuponsCancelados Lib "Daruma32.DLL" (ByVal NumeroCancelamentos As String) As Integer
Public Declare Function Daruma_FI_NumeroIntervencoes Lib "Daruma32.DLL" (ByVal NumeroIntervencoes As String) As Integer
Public Declare Function Daruma_FI_NumeroReducoes Lib "Daruma32.DLL" (ByVal NumeroReducoes As String) As Integer
Public Declare Function Daruma_FI_NumeroSubstituicoesProprietario Lib "Daruma32.DLL" (ByVal NumeroSubstituicoes As String) As Integer
Public Declare Function Daruma_FI_UltimoItemVendido Lib "Daruma32.DLL" (ByVal NumeroItem As String) As Integer
Public Declare Function Daruma_FI_ClicheProprietario Lib "Daruma32.DLL" (ByVal Cliche As String) As Integer
Public Declare Function Daruma_FI_NumeroCaixa Lib "Daruma32.DLL" (ByVal NumeroCaixa As String) As Integer
Public Declare Function Daruma_FI_NumeroLoja Lib "Daruma32.DLL" (ByVal NumeroLoja As String) As Integer
Public Declare Function Daruma_FI_SimboloMoeda Lib "Daruma32.DLL" (ByVal SimboloMoeda As String) As Integer
Public Declare Function Daruma_FI_MinutosLigada Lib "Daruma32.DLL" (ByVal Minutos As String) As Integer
Public Declare Function Daruma_FI_MinutosImprimindo Lib "Daruma32.DLL" (ByVal Minutos As String) As Integer
Public Declare Function Daruma_FI_VerificaModoOperacao Lib "Daruma32.DLL" (ByVal Modo As String) As Integer
Public Declare Function Daruma_FI_VerificaEpromConectada Lib "Daruma32.DLL" (ByVal Flag As String) As Integer
Public Declare Function Daruma_FI_FlagsFiscais Lib "Daruma32.DLL" (ByRef Flag As Integer) As Integer
Public Declare Function Daruma_FI_ValorPagoUltimoCupom Lib "Daruma32.DLL" (ByVal ValorCupom As String) As Integer
Public Declare Function Daruma_FI_DataHoraImpressora Lib "Daruma32.DLL" (ByVal Data As String, ByVal Hora As String) As Integer
Public Declare Function Daruma_FI_ContadoresTotalizadoresNaoFiscais Lib "Daruma32.DLL" (ByVal Contadores As String) As Integer
Public Declare Function Daruma_FI_VerificaTotalizadoresNaoFiscais Lib "Daruma32.DLL" (ByVal Totalizadores As String) As Integer
Public Declare Function Daruma_FI_DataHoraReducao Lib "Daruma32.DLL" (ByVal Data As String, ByVal Hora As String) As Integer
Public Declare Function Daruma_FI_DataMovimento Lib "Daruma32.DLL" (ByVal Data As String) As Integer
Public Declare Function Daruma_FI_VerificaTruncamento Lib "Daruma32.DLL" (ByVal Flag As String) As Integer
Public Declare Function Daruma_FI_Acrescimos Lib "Daruma32.DLL" (ByVal ValorAcrescimos As String) As Integer
Public Declare Function Daruma_FI_ContadorBilhetePassagem Lib "Daruma32.DLL" (ByVal ContadorPassagem As String) As Integer
Public Declare Function Daruma_FI_VerificaAliquotasIss Lib "Daruma32.DLL" (ByVal AliquotasIss As String) As Integer
Public Declare Function Daruma_FI_VerificaFormasPagamento Lib "Daruma32.DLL" (ByVal Formas As String) As Integer
Public Declare Function Daruma_FI_VerificaRecebimentoNaoFiscal Lib "Daruma32.DLL" (ByVal Recebimentos As String) As Integer
Public Declare Function Daruma_FI_VerificaDepartamentos Lib "Daruma32.DLL" (ByVal Departamentos As String) As Integer
Public Declare Function Daruma_FI_VerificaTipoImpressora Lib "Daruma32.DLL" (ByRef TipoImpressora As Integer) As Integer
Public Declare Function Daruma_FI_VerificaTotalizadoresParciais Lib "Daruma32.DLL" (ByVal cTotalizadores As String) As Integer
Public Declare Function Daruma_FI_RetornoAliquotas Lib "Daruma32.DLL" (ByVal cAliquotas As String) As Integer
Public Declare Function Daruma_FI_VerificaEstadoImpressora Lib "Daruma32.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer) As Integer
Public Declare Function Daruma_FI_DadosUltimaReducao Lib "Daruma32.DLL" (ByVal DadosReducao As String) As Integer
Public Declare Function Daruma_FI_MonitoramentoPapel Lib "Daruma32.DLL" (ByRef Linhas As Integer) As Integer
Public Declare Function Daruma_FI_Autenticacao Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_ProgramaCaracterAutenticacao Lib "Daruma32.DLL" (ByVal parametros As String) As Integer
Public Declare Function Daruma_FI_AcionaGaveta Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_VerificaEstadoGaveta Lib "Daruma32.DLL" (ByRef EstadoGaveta As Integer) As Integer
Public Declare Function Daruma_FI_ProgramaMoedaSingular Lib "Daruma32.DLL" (ByVal MoedaSingular As String) As Integer
Public Declare Function Daruma_FI_ProgramaMoedaPlural Lib "Daruma32.DLL" (ByVal MoedaPlural As String) As Integer
Public Declare Function Daruma_FI_CancelaImpressaoCheque Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_VerificaStatusCheque Lib "Daruma32.DLL" (ByRef StatusCheque As Integer) As Integer
Public Declare Function Daruma_FI_ImprimeCheque Lib "Daruma32.DLL" (ByVal Banco As String, ByVal valor As String, ByVal Favorecido As String, ByVal Cidade As String, ByVal Data As String, ByVal Mensagem As String) As Integer
Public Declare Function Daruma_FI_ImprimeCopiaCheque Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_IncluiCidadeFavorecido Lib "Daruma32.DLL" (ByVal Cidade As String, ByVal Favorecido As String) As Integer
Public Declare Function Daruma_FI_EstornoFormasPagamento Lib "Daruma32.DLL" (ByVal FormaOrigem As String, ByVal FormaDestino As String, ByVal valor As String) As Integer
Public Declare Function Daruma_FI_ForcaImpactoAgulhas Lib "Daruma32.DLL" (ByVal ForcaImpacto As Integer) As Integer
Public Declare Function Daruma_FI_RetornoImpressora Lib "Daruma32.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer) As Integer
Public Declare Function Daruma_FI_FechaPortaSerial Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_VerificaImpressoraLigada Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_IniciaFechamentoCupom Lib "Daruma32.DLL" (ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
Public Declare Function Daruma_FI_EfetuaFormaPagamento Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal ValorFormaPagamento As String) As Integer
Public Declare Function Daruma_FI_EfetuaFormaPagamentoDescricaoForma Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal ValorFormaPagamento As String, ByVal DescricaoOpcional As String) As Integer
Public Declare Function Daruma_FI_TerminaFechamentoCupom Lib "Daruma32.DLL" (ByVal Mensagem As String) As Integer
Public Declare Function Daruma_FI_AbreBilhetePassagem Lib "Daruma32.DLL" (ByVal ImprimeValorFinal As String, ByVal ImprimeEnfatizado As String, ByVal LocalEmbarque As String, ByVal Destino As String, ByVal Linha As String, ByVal Prefixo As String, ByVal Agente As String, ByVal Agencia As String, ByVal Data As String, ByVal Hora As String, ByVal Poltrona As String, ByVal Plataforma As String) As Integer
Public Declare Function Daruma_FI_MapaResumo Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_RelatorioTipo60Analitico Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_RelatorioTipo60Mestre Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_ImprimeConfiguracoesImpressora Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_ImprimeDepartamentos Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_AberturaDoDia Lib "Daruma32.DLL" (ByVal valor As String, ByVal FormaPagamento As String) As Integer
Public Declare Function Daruma_FI_FechamentoDoDia Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_ValorFormaPagamento Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal ValorForma As String) As Integer
Public Declare Function Daruma_FI_ValorTotalizadorNaoFiscal Lib "Daruma32.DLL" (ByVal Totalizador As String, ByVal ValorTotalizador As String) As Integer
Public Declare Function Daruma_FI_DadosSintegra Lib "Daruma32.DLL" (ByVal DataInicial As String, ByVal DataFinal As String) As Integer
Public Declare Function Daruma_FI_RegistrosTipo60 Lib "Daruma32.DLL" () As Integer


'Funções para Impressora restaurante
Public Declare Function Daruma_FIR_RegistraVenda Lib "Daruma32.DLL" (ByVal Mesa As String, ByVal Codigo As String, ByVal Descricao As String, ByVal Aliquota As String, ByVal quantidade As String, ByVal ValorUnitario As String, ByVal FlagAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
Public Declare Function Daruma_FIR_CancelaVenda Lib "Daruma32.DLL" (ByVal Mesa As String, ByVal Codigo As String, ByVal Descricao As String, ByVal Aliquota As String, ByVal quantidade As String, ByVal ValorUnitario As String, ByVal FlagAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
Public Declare Function Daruma_FIR_ConferenciaMesa Lib "Daruma32.DLL" (ByVal Mesa As String, ByVal FlagAcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
Public Declare Function Daruma_FIR_AbreConferenciaMesa Lib "Daruma32.DLL" (ByVal Mesa As String) As Integer
Public Declare Function Daruma_FIR_FechaConferenciaMesa Lib "Daruma32.DLL" (ByVal FlagAcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
Public Declare Function Daruma_FIR_TransferenciaMesa Lib "Daruma32.DLL" (ByVal MesaOrigem As String, ByVal MesaDestino As String) As Integer
Public Declare Function Daruma_FIR_AbreCupomRestaurante Lib "Daruma32.DLL" (ByVal Mesa As String, ByVal CGC_CPF As String) As Integer
Public Declare Function Daruma_FIR_ContaDividida Lib "Daruma32.DLL" (ByVal NumeroCupons As String, ByVal ValorPago As String, ByVal CGC_CPF As String) As Integer
Public Declare Function Daruma_FIR_FechaCupomContaDividida Lib "Daruma32.DLL" (ByVal NumeroCupons As String, ByVal FlagAcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String, ByVal FormasPagamento As String, ByVal ValorFormasPagamento As String, ByVal ValorPagoCliente As String, ByVal CGC_CPF As String) As Integer
Public Declare Function Daruma_FIR_TransferenciaItem Lib "Daruma32.DLL" (ByVal MesaOrigem As String, ByVal Codigo As String, ByVal Descricao As String, ByVal Aliquota As String, ByVal quantidade As String, ByVal ValorUnitario As String, ByVal FlagAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String, ByVal MesaDestino As String) As Integer
Public Declare Function Daruma_FIR_RelatorioMesasAbertas Lib "Daruma32.DLL" (ByVal TipoRelatorio As Integer) As Integer
Public Declare Function Daruma_FIR_ImprimeCardapio Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FIR_RelatorioMesasAbertasSerial Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FIR_CardapioPelaSerial Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FIR_RegistroVendaSerial Lib "Daruma32.DLL" (ByVal Mesa As String) As Integer
Public Declare Function Daruma_FIR_VerificaMemoriaLivre Lib "Daruma32.DLL" (ByVal Bytes As String) As Integer
Public Declare Function Daruma_FIR_FechaCupomRestaurante Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal DiscontoAcrecimo As String, ByVal TipoDescontoAcrecimo As String, ByVal ValorAcrecimoDesconto As String, ByVal ValorPago As String, ByVal Mensagem As String) As Integer
Public Declare Function Daruma_FIR_FechaCupomResumidoRestaurante Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal Mensagem As String) As Integer


' Funções da Impressora Fiscal MFD

Public Declare Function Daruma_FI_SubTotalizaCupomMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_SubTotalizaRecebimentoMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_AbreBilhetePassagemMFD Lib "Daruma32.DLL" (ByVal LocalEmbarque As String, ByVal Destino As String, ByVal Linha As String, ByVal Agencia As String, ByVal Data As String, ByVal Hora As String, ByVal Poltrona As String, ByVal Plataforma As String, ByVal TipoPassagem As String, ByVal RG As String, ByVal Nome As String, ByVal Endereco As String, ByVal UFDestino As String) As Integer
Public Declare Function Daruma_FI_AbreCupomMFD Lib "Daruma32.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
Public Declare Function Daruma_FI_CancelaAcrescimoDescontoItemMFD Lib "Daruma32.DLL" (ByVal AcrescimoDesconto As String, ByVal Item As String) As Integer
Public Declare Function Daruma_FI_CancelaAcrescimoDescontoSubtotalMFD Lib "Daruma32.DLL" (ByVal cFlag As String) As Integer
Public Declare Function Daruma_FI_CancelaCupomMFD Lib "Daruma32.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
Public Declare Function Daruma_FI_ProgramaFormaPagamentoMFD Lib "Daruma32.DLL" (ByVal FormaPagto As String, ByVal OperacaoTef As String) As Integer
Public Declare Function Daruma_FI_IniciaFechamentoCupomMFD Lib "Daruma32.DLL" (ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimo As String, ByVal ValorDesconto As String) As Integer
Public Declare Function Daruma_FI_EfetuaFormaPagamentoMFD Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal ValorFormaPagamento As String, ByVal Parcelas As String, ByVal DescricaoFormaPagto As String) As Integer
Public Declare Function Daruma_FI_CupomAdicionalMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_AcrescimoDescontoItemMFD Lib "Daruma32.DLL" (ByVal Item As String, ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimoDesconto As String) As Integer
Public Declare Function Daruma_FI_AcrescimoDescontoSubtotalMFD Lib "Daruma32.DLL" (ByVal cFlag As String, ByVal cTipo As String, ByVal cValor As String) As Integer
Public Declare Function Daruma_FI_NomeiaRelatorioGerencialMFD Lib "Daruma32.DLL" (ByVal Indice As String, ByVal Descricao As String) As Integer
Public Declare Function Daruma_FI_AutenticacaoMFD Lib "Daruma32.DLL" (ByVal Linhas As String, ByVal texto As String) As Integer
Public Declare Function Daruma_FI_AbreComprovanteNaoFiscalVinculadoMFD Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal valor As String, ByVal NumeroCupom As String, ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
Public Declare Function Daruma_FI_ReimpressaoNaoFiscalVinculadoMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_AbreRecebimentoNaoFiscalMFD Lib "Daruma32.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
Public Declare Function Daruma_FI_EfetuaRecebimentoNaoFiscalMFD Lib "Daruma32.DLL" (ByVal IndiceTotalizador As String, ByVal ValorRecebimento As String) As Integer
Public Declare Function Daruma_FI_IniciaFechamentoRecebimentoNaoFiscalMFD Lib "Daruma32.DLL" (ByVal AcrescimoDesconto As String, ByVal TipoAcrescimoDesconto As String, ByVal ValorAcrescimo As String, ByVal ValorDesconto As String) As Integer
Public Declare Function Daruma_FI_FechaRecebimentoNaoFiscalMFD Lib "Daruma32.DLL" (ByVal Mensagem As String) As Integer
Public Declare Function Daruma_FI_CancelaRecebimentoNaoFiscalMFD Lib "Daruma32.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
Public Declare Function Daruma_FI_AbreRelatorioGerencial Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_UsaRelatorioGerencialMFD Lib "Daruma32.DLL" (ByVal texto As String) As Integer
Public Declare Function Daruma_FI_SegundaViaNaoFiscalVinculadoMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_EstornoNaoFiscalVinculadoMFD Lib "Daruma32.DLL" (ByVal CGC As String, ByVal Nome As String, ByVal Endereco As String) As Integer
Public Declare Function Daruma_FI_NumeroSerieMFD Lib "Daruma32.DLL" (ByVal NumeroSerie As String) As Integer
Public Declare Function Daruma_FI_VersaoFirmwareMFD Lib "Daruma32.DLL" (ByVal VersaoFirmware As String) As Integer
Public Declare Function Daruma_FI_CNPJMFD Lib "Daruma32.DLL" (ByVal CNPJ As String) As Integer
Public Declare Function Daruma_FI_InscricaoEstadualMFD Lib "Daruma32.DLL" (ByVal InscricaoEstadual As String) As Integer
Public Declare Function Daruma_FI_InscricaoMunicipalMFD Lib "Daruma32.DLL" (ByVal InscricaoMunicipal As String) As Integer
Public Declare Function Daruma_FI_TempoOperacionalMFD Lib "Daruma32.DLL" (ByVal TempoOperacional As String) As Integer
Public Declare Function Daruma_FI_MinutosEmitindoDocumentosFiscaisMFD Lib "Daruma32.DLL" (ByVal Minutos As String) As Integer
Public Declare Function Daruma_FI_ContadoresTotalizadoresNaoFiscaisMFD Lib "Daruma32.DLL" (ByVal Contadores As String) As Integer
Public Declare Function Daruma_FI_VerificaTotalizadoresNaoFiscaisMFD Lib "Daruma32.DLL" (ByVal Totalizadores As String) As Integer
Public Declare Function Daruma_FI_VerificaFormasPagamentoMFD Lib "Daruma32.DLL" (ByVal FormasPagamento As String) As Integer
Public Declare Function Daruma_FI_VerificaRecebimentoNaoFiscalMFD Lib "Daruma32.DLL" (ByVal Recebimentos As String) As Integer
Public Declare Function Daruma_FI_VerificaRelatorioGerencialMFD Lib "Daruma32.DLL" (ByVal Relatorios As String) As Integer
Public Declare Function Daruma_FI_ContadorComprovantesCreditoMFD Lib "Daruma32.DLL" (ByVal Comprovantes As String) As Integer
Public Declare Function Daruma_FI_ContadorOperacoesNaoFiscaisCanceladasMFD Lib "Daruma32.DLL" (ByVal OperacoesCanceladas As String) As Integer
Public Declare Function Daruma_FI_ContadorRelatoriosGerenciaisMFD Lib "Daruma32.DLL" (ByVal Relatorios As String) As Integer
Public Declare Function Daruma_FI_ContadorCupomFiscalMFD Lib "Daruma32.DLL" (ByVal CuponsEmitidos As String) As Integer
Public Declare Function Daruma_FI_ContadorFitaDetalheMFD Lib "Daruma32.DLL" (ByVal ContadorFita As String) As Integer
Public Declare Function Daruma_FI_ComprovantesNaoFiscaisNaoEmitidosMFD Lib "Daruma32.DLL" (ByVal Comprovantes As String) As Integer
Public Declare Function Daruma_FI_NumeroSerieMemoriaMFD Lib "Daruma32.DLL" (ByVal NumeroSerieMFD As String) As Integer
Public Declare Function Daruma_FI_ReducoesRestantesMFD Lib "Daruma32.DLL" (ByVal Reducoes As String) As Integer
Public Declare Function Daruma_FI_MarcaModeloTipoImpressoraMFD Lib "Daruma32.DLL" (ByVal Marca As String, ByVal Modelo As String, ByVal Tipo As String) As Integer
Public Declare Function Daruma_FI_VerificaTotalizadoresParciaisMFD Lib "Daruma32.DLL" (ByVal Totalizadores As String) As Integer
Public Declare Function Daruma_FI_DadosUltimaReducaoMFD Lib "Daruma32.DLL" (ByVal DadosReducao As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalDataMFD Lib "Daruma32.DLL" (ByVal DataInicial As String, ByVal DataFinal As String, ByVal FlagLeitura As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalReducaoMFD Lib "Daruma32.DLL" (ByVal ReducaoInicial As String, ByVal ReducaoFinal As String, ByVal FlagLeitura As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalSerialDataMFD Lib "Daruma32.DLL" (ByVal DataInicial As String, ByVal DataFinal As String, ByVal FlagLeitura As String) As Integer
Public Declare Function Daruma_FI_LeituraMemoriaFiscalSerialReducaoMFD Lib "Daruma32.DLL" (ByVal ReducaoInicial As String, ByVal ReducaoFinal As String, ByVal FlagLeitura As String) As Integer
Public Declare Function Daruma_FI_LeituraChequeMFD Lib "Daruma32.DLL" (ByVal CodigoCMC7 As String) As Integer
Public Declare Function Daruma_FI_ImprimeChequeMFD Lib "Daruma32.DLL" (ByVal NumeroBanco As String, ByVal valor As String, ByVal Favorecido As String, ByVal Cidade As String, ByVal Data As String, ByVal Mensagem As String, ByVal ImpressaoVerso As String, ByVal Linhas As String) As Integer
Public Declare Function Daruma_FI_HabilitaDesabilitaRetornoEstendidoMFD Lib "Daruma32.DLL" (ByVal FlagRetorno As String) As Integer
Public Declare Function Daruma_FI_RetornoImpressoraMFD Lib "Daruma32.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer, ByRef ST3 As Integer) As Integer
Public Declare Function Daruma_FI_TotalLivreMFD Lib "Daruma32.DLL" (ByVal cMemoriaLivre As String) As Integer
Public Declare Function Daruma_FI_TamanhoTotalMFD Lib "Daruma32.DLL" (ByVal cTamMFD As String) As Integer
Public Declare Function Daruma_FI_AcrescimoDescontoSubtotalRecebimentoMFD Lib "Daruma32.DLL" (ByVal cFlag As String, ByVal cTipo As String, ByVal cValor As String) As Integer
Public Declare Function Daruma_FI_CancelaAcrescimoDescontoSubtotalRecebimentoMFD Lib "Daruma32.DLL" (ByVal cFlag As String) As Integer
Public Declare Function Daruma_FI_TotalizaCupomMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_TotalizaRecebimentoMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_PercentualLivreMFD Lib "Daruma32.DLL" (ByVal cMemoriaLivre As String) As Integer
Public Declare Function Daruma_FI_DataHoraUltimoDocumentoMFD Lib "Daruma32.DLL" (ByVal cDataHora As String) As Integer
Public Declare Function Daruma_FI_ValorFormaPagamentoMFD Lib "Daruma32.DLL" (ByVal FormaPagamento As String, ByVal ValorForma As String) As Integer
Public Declare Function Daruma_FI_ValorTotalizadorNaoFiscalMFD Lib "Daruma32.DLL" (ByVal Totalizador As String, ByVal ValorTotalizador As String) As Integer
Public Declare Function Daruma_FI_VerificaEstadoImpressoraMFD Lib "Daruma32.DLL" (ByRef ACK As Integer, ByRef ST1 As Integer, ByRef ST2 As Integer, ByRef ST3 As Integer) As Integer
Public Declare Function Daruma_FI_MapaResumoMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_RelatorioTipo60AnaliticoMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_TerminaFechamentoCupomCodigoBarrasMFD Lib "Daruma32.DLL" (ByVal Mensagem As String, ByVal TipoCodigo As String, ByVal Codigo As String, ByVal Altura As Integer, ByVal Largura As Integer, ByVal PosicaoCaracteres As Integer, ByVal Fonte As Integer, ByVal Margem As Integer, ByVal CorrecaoErros As Integer, ByVal Colunas As Integer) As Integer
Public Declare Function Daruma_FI_DownloadMF Lib "Daruma32.DLL" (ByVal Arquivo As String) As Integer
Public Declare Function Daruma_FI_DownloadMFD Lib "Daruma32.DLL" (ByVal Arquivo As String, ByVal TipoDownload As String, ByVal ParametroInicial As String, ByVal ParametroFinal As String, ByVal UsuarioECF As String) As Integer
Public Declare Function Daruma_FI_FormatoDadosMFD Lib "Daruma32.DLL" (ByVal ArquivoMFD As String, ByVal ArquivoDestino As String, ByVal FormatoDestino As String, ByVal TipoDownload As String, ByVal ParametroInicial As String, ByVal ParametroFinal As String, ByVal UsuarioECF As String) As Integer

' Funções disponíveis somente na impressora fiscal MP-2000 TH FI versão 01.01.01 ou 01.00.02
Public Declare Function Daruma_FI_AtivaDesativaVendaUmaLinhaMFD Lib "Daruma32.DLL" (ByVal iFlag As Integer) As Integer
Public Declare Function Daruma_FI_AtivaDesativaAlinhamentoEsquerdaMFD Lib "Daruma32.DLL" (ByVal iFlag As Integer) As Integer
Public Declare Function Daruma_FI_AtivaDesativaCorteProximoMFD Lib "Daruma32.DLL" () As Integer
Public Declare Function Daruma_FI_AtivaDesativaTratamentoONOFFLineMFD Lib "Daruma32.DLL" (ByVal iFlag As Integer) As Integer
Public Declare Function Daruma_FI_StatusEstendidoMFD Lib "Daruma32.DLL" (ByRef iStatus As Integer) As Integer
Public Declare Function Daruma_FI_VerificaFlagCorteMFD Lib "Daruma32.DLL" (ByRef iFlag As Integer) As Integer
Public Declare Function Daruma_FI_TempoRestanteComprovanteMFD Lib "Daruma32.DLL" (ByVal cTempo As String) As Integer
Public Declare Function Daruma_FI_UFProprietarioMFD Lib "Daruma32.DLL" (ByVal cUF As String) As Integer
Public Declare Function Daruma_FI_GrandeTotalUltimaReducaoMFD Lib "Daruma32.DLL" (ByVal cGT As String) As Integer
Public Declare Function Daruma_FI_DataMovimentoUltimaReducaoMFD Lib "Daruma32.DLL" (ByVal cData As String) As Integer
Public Declare Function Daruma_FI_SubTotalComprovanteNaoFiscalMFD Lib "Daruma32.DLL" (ByVal cSubTotal As String) As Integer
Public Declare Function Daruma_FI_InicioFimCOOsMFD Lib "Daruma32.DLL" (ByVal cCOOIni As String, ByVal cCOOFim As String) As Integer
Public Declare Function Daruma_FI_InicioFimGTsMFD Lib "Daruma32.DLL" (ByVal cGTIni As String, ByVal cGTFim As String) As Integer


' utilidades
Public Declare Function Daruma_FI_InfoBalanca Lib "Daruma32.DLL" (ByVal port As String, ByVal model As Integer, ByVal weight As String, ByVal precoKilo As String, ByVal total As String) As Integer
Public Declare Function Daruma_FI_ImpressaoCarne Lib "Daruma32.DLL" (ByVal titulo As String, ByVal parcela As String, ByVal datas As String, ByVal quantidade As Integer, ByVal texto As String, _
                                                ByVal cliente As String, ByVal rgcpf As String, _
                                                ByVal cupom As String, ByVal vias As Integer, ByVal assina As Integer) As Integer
                                                  

Public Declare Function GetPrivateProfileString Lib "kernel32" Alias "GetPrivateProfileStringA" (ByVal LpAplicationName As String, ByVal LpKeyName As Any, ByVal lpDefault As String, ByVal lpReturnString As String, ByVal nSize As Long, ByVal lpFilename As String) As Long
Public Declare Function GetSystemDirectory Lib "kernel32" Alias "GetSystemDirectoryA" (ByVal lpBuffer As String, ByVal nSize As Long) As Long

Public retorno As Integer
Public Funcao As Integer
Public LocalRetorno As String
Public ArqRetorno As String
Public RetornoEstendidoHabilitado As Boolean

