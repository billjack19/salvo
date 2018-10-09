Attribute VB_Name = "DarumaFrameworkFuncoes"
'---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Public iRetorno As Integer

Public Declare Sub Sleep Lib "kernel32.dll" (ByVal dwMilliseconds As Long)
Public Declare Function FindWindow Lib "user32" Alias "FindWindowA" (ByVal lpClassName As String, ByVal lpWindowName As String) As Long
 '================================ DECLARACOES DARUMA FRAMEWORK ================================'
    '===========                           IMPRESSORAS FISCAL                          ============'
 
    'Abertura de cupom fiscal
    Public Declare Function iCFAbrir_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal CPF As String, ByVal Nome As String, ByVal Endereco As String) As Integer
    Public Declare Function iCFAbrirPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Registro de item
    Public Declare Function iCFVender_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal Aliq As String, ByVal Qtd As String, ByVal PrecoUn As String, ByVal TipoDescAcresc As String, ByVal VlrDescAcresc As String, ByVal CodItem As String, ByVal Un As String, ByVal DescricaoItem As String) As Integer
    Public Declare Function iCFVenderSemDesc_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal Aliq As String, ByVal Qtd As String, ByVal PrecoUn As String, ByVal CodItem As String, ByVal Un As String, ByVal DescricaoItem As String) As Integer
    Public Declare Function iCFVenderResumido_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal Aliq As String, ByVal PrecoUn As String, ByVal CodItem As String, ByVal DescricaoItem As String) As Integer

    'Desconto ou acrescimo  em item de cupom fiscal
    Public Declare Function iCFLancarAcrescimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumItem As String, ByVal pszTipoDescAcresc As String, ByVal pszValorDescAcresc As String) As Integer
    Public Declare Function iCFLancarDescontoItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumItem As String, ByVal pszTipoDescAcresc As String, ByVal pszValorDescAcresc As String) As Integer
    Public Declare Function iCFLancarAcrescimoUltimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipoDescAcresc As String, ByVal pszValorDescAcresc As String) As Integer
    Public Declare Function iCFLancarDescontoUltimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipoDescAcresc As String, ByVal pszValorDescAcresc As String) As Integer

    'Cancelamento total de item em cupom fiscal
    Public Declare Function iCFCancelarUltimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iCFCancelarItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal NumItem As String) As Integer

    'Cancelamento parcial de item em cupom fiscal
    Public Declare Function iCFCancelarItemParcial_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumItem As String, ByVal pszQuantidade As String) As Integer
    Public Declare Function iCFCancelarUltimoItemParcial_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszQuantidade As String) As Integer

    'Cancelamento de desconto em item
    Public Declare Function iCFCancelarDescontoItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumItem As String) As Integer
    Public Declare Function iCFCancelarDescontoUltimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer


    'Totalizacao de cupom fiscal
    Public Declare Function iCFTotalizarCupom_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal TipoDescAcresc As String, ByVal VlrDescAcresc As String) As Integer
    Public Declare Function iCFTotalizarCupomPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Cancelamento de desconto e acrescimo em subtotal de cupom fiscal
    Public Declare Function iCFCancelarDescontoSubtotal_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iCFCancelarAcrescimoSubtotal_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
                            
    'Descricao do meios de pagamento de cupom fiscal
    Public Declare Function iCFEfetuarPagamentoPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iCFEfetuarPagamentoFormatado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszFormaPgto As String, ByVal pszValor As String) As Integer
    Public Declare Function iCFEfetuarPagamento_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszFormaPgto As String, ByVal pszValor As String, ByVal pszInfoAdicional As String) As Integer

    'Encerramento de cupom fiscal
    Public Declare Function iCFEncerrarPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iCFEncerrarConfigMsg_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszMensagem As String) As Integer
    Public Declare Function iCFEncerrar_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszCupomAdicional As String, ByVal pszMensagem As String) As Integer
    Public Declare Function iCFEncerrarResumido_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iCFEmitirCupomAdicional_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Cancelamento de cupom fiscal
    Public Declare Function iCFCancelar_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Saldo a Pagar
    Public Declare Function rCFSaldoAPagar_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszValor As String) As Integer

    'SubTotal
    Public Declare Function rCFSubTotal_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszValor As String) As Integer
    
    'Status Cupom Fiscal
    Public Declare Function rCFVerificarStatus_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cStatusCF As String, ByRef piStatusCF As Long) As Integer
    Public Declare Function rCFVerificarStatusInt_ECF_Daruma Lib "DarumaFrameWork.dll" (ByRef piStatusCF As Integer) As Integer
    Public Declare Function rCFVerificarStatusStr_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cStatusCF As String) As Integer

    'Identificar consumidor radape do Cupom fiscal
    Public Declare Function iCFIdentificarConsumidor_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNome As String, ByVal pszEndereco As String, ByVal pszDoc As String) As Integer

    'Cupom Mania
    Public Declare Function rCMEfetuarCalculo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszISS As String, ByVal pszICMS As String) As Integer

    'Bilhete de Passagem
    Public Declare Function iCFBPAbrir_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszOrigem As String, ByVal pszDestino As String, ByVal pszUFDestino As String, ByVal pszPercurso As String, ByVal pszPrestadora As String, ByVal pszPlataforma As String, ByVal pszPoltrona As String, ByVal pszModalidadetransp As String, ByVal pszCategoriaTransp As String, ByVal pszDataEmbarque As String, ByVal pszRGPassageiro As String, ByVal pszNomePassageiro As String, ByVal pszEnderecoPassageiro As String) As Integer
    Public Declare Function iCFBPVender_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszAliquota As String, ByVal pszValor As String, ByVal pszTipoDescAcresc As String, ByVal pszValorDescAcresc As String, ByVal pszDescricao As String) As Integer
    Public Declare Function confCFBPProgramarUF_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszUF As String) As Integer
                            
    'Download Mem√≥rias
    ' binario
    Public Declare Function rEfetuarDownloadMFD_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String, ByVal pszNomeArquivo As String) As Integer
    Public Declare Function rEfetuarDownloadMF_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNomeArquivo As String) As Integer
    Public Declare Function rEfetuarDownloadTDM_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer

    'Espelho MFD
    Public Declare Function rGerarEspelhoMFD_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer

    'Relatorios PAF-ECF
    'Relat√≥rio PAF-ECF ON-line
    Public Declare Function rGerarRelatorio_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszRelatorio As String, ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    Public Declare Function rGerarMFD_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    Public Declare Function rGerarMF_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    Public Declare Function rGerarTDM_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    Public Declare Function rGerarSPED_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    Public Declare Function rGerarSINTEGRA_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    Public Declare Function rGerarNFP_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    
    'Relat√≥rio PAF-ECF Off-line
    Public Declare Function rGerarRelatorioOffline_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszRelatorio As String, ByVal pszTipo As String, ByVal pszInicial As String, ByVal pszFinal As String, ByVal szArquivo_MF As String, ByVal szArquivo_MFD As String, ByVal szArquivo_INF As String) As Integer

    'EAD PAF-ECF
    Public Declare Function rAssinarRSA_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszPathArquivo As String, ByVal pszChavePrivada As String, ByVal pszAssinaturaGerada As String) As Integer

    'MD5
    Public Declare Function rCalcularMD5_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszPathArquivo As String, ByVal pszMD5GeradoHex As String, ByVal pszMD5GeradoAscii As String) As Integer

    'Buscar GT Codificado
    Public Declare Function rRetornarGTCodificado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszGT As String) As Integer

    'Verifica GT Codificado
    Public Declare Function rVerificarGTCodificado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszVerificaGT As String) As Integer
    
    'Buscar Serial Codificado
    Public Declare Function rRetornarNumeroSerieCodificado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszSerialCodificado As String) As Integer
    
    'Verificar serial codificado
    Public Declare Function rVerificarNumeroSerieCodificado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszSerialCriptografado As String) As Integer

    'CÛdigo Modelo Fiscal
    Public Declare Function rCodigoModeloFiscal_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszCodigo As String) As Integer
    
    'Assinatura de Arquivos
    Public Declare Function eRSAAssinarArquivo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszPathArquivo As String, ByVal pszPathChave As String) As Integer
    Public Declare Function rRSAChavePublica_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszPathChave As String, ByVal pszPublica As String, ByVal pszExpoente As String) As Integer
    
    'Modo PAF
    Public Declare Function confModoPAF_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszModoPAF As String, ByVal pszChave As String, ByVal pszPath As String) As Integer
    

    'Codigo de Barras
    Public Declare Function iImprimirCodigoBarras_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipo As String, ByVal pszLargura As String, ByVal pszAltura As String, ByVal pszImprTexto As String, ByVal pszCodigo As String, ByVal pszOrientacao As String, ByVal pszTextoLivre As String) As Integer

    '--- ECF - Relatorio Gerencial - Inicio ---
    Public Declare Function iRGAbrir_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNomeRG As String) As Integer
    Public Declare Function iRGAbrirIndice_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal iIndiceRG As Integer) As Integer
    Public Declare Function iRGAbrirPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iRGImprimirTexto_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTexto As String) As Integer
    Public Declare Function iRGFechar_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    '--- ECF - Relatorio Gerencial - Fim ---

    ' --- ECF - Comprovante de CCD - Inicio ---
    ' Abertura de comprovante de credito e debito
    Public Declare Function iCCDAbrir_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszFormaPgto As String, ByVal pszParcelas As String, ByVal pszDocOrigem As String, ByVal pszValor As String, ByVal pszCPF As String, ByVal pszNome As String, ByVal pszEndereco As String) As Integer
    Public Declare Function iCCDAbrirSimplificado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszFormaPgto As String, ByVal pszParcelas As String, ByVal pszDocOrigem As String, ByVal pszValor As String) As Integer
    Public Declare Function iCCDAbrirPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Impressao de texto no comprovante de credito e debito
    Public Declare Function iCCDImprimirTexto_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTexto As String) As Integer
    Public Declare Function iCCDImprimirArquivo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszArqOrigem As String) As Integer
    'Fechamento de texto no comprovante de credito e debito
    Public Declare Function iCCDFechar_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    'Estorno de comprovante de credito e debito
    Public Declare Function iCCDEstornarPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iCCDEstornar_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszCOO As String, ByVal pszCPF As String, ByVal pszNome As String, ByVal pszEndereco As String) As Integer
    '--- ECF - Comprovante de CCD - Fim ---

    'M√©todos para TEF
    Public Declare Function iTEF_ImprimirResposta_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal szArquivo As String, ByVal bTravarTeclado As Boolean) As Integer
    Public Declare Function iTEF_ImprimirRespostaCartao_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal szArquivo As String, ByVal bTravarTeclado As Boolean, ByVal szForma As String, ByVal szValor As String) As Integer
    Public Declare Function iTEF_Fechar_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function eTEF_EsperarArquivo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal szArquivo As String, ByVal iTempo As Integer, ByVal bTravar As Boolean) As Integer
    Public Declare Function eTEF_TravarTeclado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal bTravar As Boolean) As Integer
    Public Declare Function eTEF_SetarFoco_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal szNomeTela As String) As Integer

    'ECF - Leitura Memoria Fiscal - Inicio ---
    Public Declare Function iMFLerSerial_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    Public Declare Function iMFLer_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszInicial As String, ByVal pszFinal As String) As Integer
    'ECF - Leitura Memoria Fiscal - Fim ---

    'ECF - Comprovante n√£o fiscal - Inicio ---
    'Abertura de comprovante nao fiscal
    Public Declare Function iCNFAbrir_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszCPF As String, ByVal pszNome As String, ByVal pszEndereco As String) As Integer
    Public Declare Function iCNFAbrirPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
                                
    'Recebimento de itens
    Public Declare Function iCNFReceber_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszIndice As String, ByVal pszValor As String, ByVal pszTipoDescAcresc As String, ByVal pszValorDescAcresc As String) As Integer
    Public Declare Function iCNFReceberSemDesc_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszIndice As String, ByVal pszValor As String) As Integer

    'Cancelamento de item
    Public Declare Function iCNFCancelarItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumItem As String) As Integer
    Public Declare Function iCNFCancelarUltimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
                                
    'Cancelamento de acrescimo em item
    Public Declare Function iCNFCancelarAcrescimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumItem As String) As Integer
    Public Declare Function iCNFCancelarAcrescimoUltimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Cancelamento de desconto em item
    Public Declare Function iCNFCancelarDescontoItem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumItem As String) As Integer
    Public Declare Function iCNFCancelarDescontoUltimoItem_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Totalizacao de CNF
    Public Declare Function iCNFTotalizarComprovante_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipoDescAcresc As String, ByVal pszValorDescAcresc As String) As Integer
    Public Declare Function iCNFTotalizarComprovantePadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Cancelamento de desconto e acrescimo em subtotal de CNF
    Public Declare Function iCNFCancelarAcrescimoSubtotal_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iCNFCancelarDescontoSubtotal_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    
    'Descricao do meios de pagamento de CNF
    Public Declare Function iCNFEfetuarPagamento_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszFormaPgto As String, ByVal pszValor As String, ByVal pszInfoAdicional As String) As Integer
    Public Declare Function iCNFEfetuarPgtoFormatado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszFormaPgto As String, ByVal pszValor As String) As Integer
    Public Declare Function iCNFEfetuarPagamentoPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Encerramento de CNF
    Public Declare Function iCNFEncerrar_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszMensagem As String) As Integer
    Public Declare Function iCNFEncerrarPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer

    'Cancelamento de CNF
    Public Declare Function iCNFCancelar_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    'ECF - Comprovante n√£o fiscal - Fim ---

    'ECF - Funcoes Gerais - Inicio ---
    Public Declare Function iEjetarCheque_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iEstornarPagamento_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszFormaPgtoEstornado As String, ByVal pszFormaPgtoEfetivado As String, ByVal pszValor As String, ByVal pszInfoAdicional As String) As Integer
    Public Declare Function iAcionarGuilhotina_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszTipoCorte As String) As Integer

    'Leitura X
    Public Declare Function iLeituraX_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function rLeituraX_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function rLeituraXCustomizada_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszCaminho As String) As Integer

    'Sangria
    Public Declare Function iSangriaPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iSangria_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszValor As String, ByVal pszMensagem As String) As Integer

    'Suprimento
    Public Declare Function iSuprimentoPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function iSuprimento_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszValor As String, ByVal pszMensagem As String) As Integer

    'Reducao Z
    Public Declare Function iReducaoZ_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal Inicial As String, ByVal Final As String) As Integer
   
    'Programa√ß√£o do ECF
    Public Declare Function confCadastrarPadrao_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszCadastrar As String, ByVal pszValor As String) As Integer
    Public Declare Function confCadastrar_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszCadastrar As String, ByVal pszValor As String, ByVal pszSeparador As String) As Integer
    Public Declare Function confHabilitarHorarioVerao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function confDesabilitarHorarioVerao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function confProgramarOperador_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszValor As String) As Integer
    Public Declare Function confProgramarIDLoja_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszValor As String) As Integer
    Public Declare Function confProgramarAvancoPapel_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszSepEntreLinhas As String, ByVal pszSepEntreDoc As String, ByVal pszLinhasGuilhotina As String, ByVal pszGuilhotina As String, ByVal pszImpClicheAntecipada As String) As Integer
    Public Declare Function confHabilitarModoPreVenda_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function confDesabilitarModoPreVenda_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function confProgramarHorarioVerao_ECF Lib "DarumaFrameWork.dll" (ByVal iValor As Integer) As Integer

    'Acionamento da Gaveta do ECF
    Public Declare Function iAbrirGaveta_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    
    'Status Gaveta
    Public Declare Function rStatusGaveta_ECF_Daruma Lib "DarumaFrameWork.dll" (ByRef iStatus As Integer) As Integer

    'Carregar Bitmap Promocional
    Public Declare Function eCarregarBitmapPromocional_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszPathLogotipo As String, ByVal pszNumBitmap As String, ByVal pszOrientacao As String) As Integer

    'Impress„o de Cheque
    Public Declare Function iChequeImprimir_FS2100_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNumeroBanco As Integer, ByVal pszCidade As String, ByVal pszData As String, ByVal pszNomeFavorecido As String, ByVal pszTextoFrente As String, ByVal pszValorCheque As Integer) As Integer
    
    'RelatÛrio de configuraÁ„o
    Public Declare Function iRelatorioConfiguracao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    
    'Funcoes - Retorno
    Public Declare Function rLerAliquotas_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cAliquotas As String) As Integer
    Public Declare Function rLerMeiosPagto_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszMeiosPgto As String) As Integer
    Public Declare Function rLerRG_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszRelatorios As String) As Integer
    Public Declare Function rLerCNF_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszNaoFiscais As String) As Integer
    Public Declare Function rLerDecimais_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszDecimalQtde As String, ByVal pszDecimalValor As String, ByRef piDecimalQtde As Integer, ByRef piDecimalValor As Integer) As Integer
    Public Declare Function rLerDecimaisInt_ECF_Daruma Lib "DarumaFrameWork.dll" (ByRef piDecimalQtde As Integer, ByRef piDecimalValor As Integer) As Integer
    Public Declare Function rLerDecimaisStr_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszDecimalQtde As String, ByVal pszDecimalValor As String) As Integer
    
    Public Declare Function rDataHoraImpressora_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszData As String, ByVal pszHora As String) As Integer
    Public Declare Function rVerificarImpressoraLigada_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function rInfoEstentida_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal NamelessParameter1 As Long, ByVal NamelessParameter2 As String) As Integer
    Public Declare Function rStatusImpressora_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszStatus As String) As Integer
    Public Declare Function rMinasLegal_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszRetorno As String) As Integer
    Public Declare Function rTipoUltimoDocumentoInt_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszRetorno As String) As Integer
    Public Declare Function rTipoUltimoDocumentoStr_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszRetorno As String) As Integer
        
    Public Declare Function rConsultaStatusImpressoraStr_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszIndice As Integer, ByVal pszRetorno As String) As Integer
    Public Declare Function rConsultaStatusImpressoraInt_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszIndice As Long, ByRef pszRetorno As Long) As Integer
    Public Declare Function rStatusImpressoraInt_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal piStatusEcf As String) As Integer
    Public Declare Function rInfoEstentida1_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cInfoEx As String) As Integer
    Public Declare Function rInfoEstentida2_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cInfoEx As String) As Integer
    Public Declare Function rInfoEstentida3_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cInfoEx As String) As Integer
    Public Declare Function rInfoEstentida4_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cInfoEx As String) As Integer
    Public Declare Function rInfoEstentida5_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cInfoEx As String) As Integer
    
    Public Declare Function rVerificarReducaoZ_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal zPendente As String) As Integer
    Public Declare Function rStatusUltimoCmd_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszErro As String, ByVal pszAviso As String, ByRef piErro As Integer, ByRef piAviso As Integer) As Integer
    Public Declare Function rStatusUltimoCmdInt_ECF_Daruma Lib "DarumaFrameWork.dll" (ByRef piErro As Integer, ByRef piAviso As Integer) As Integer
    Public Declare Function rStatusUltimoCmdStr_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cErro As String, ByVal cAviso As Integer) As Integer
    Public Declare Function rRetornarInformacao_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszIndice As String, ByVal pszRetornar As String) As Integer
    Public Declare Function rRetornarInformacaoSeparador_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszIndice As String, ByVal pszVSignificativo As String, ByVal pszRetornar As String) As Integer
    Public Declare Function rRetornarNumeroSerie_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszSerial As String, ByVal pszSerial As String) As Integer
    
    Public Declare Function rUltimoCMDEnviado_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszComando As String) As Integer
    Public Declare Function rCarregarNumeroSerie_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszSerial As String) As Integer
    Public Declare Function rRetornarDadosReducaoZ_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszDados As String) As Integer
    Public Declare Function rRegistrarNumeroSerie_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function rStatusImpressoraBinario_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszStatus As String) As Integer
    
    'ECF - Funcoes Gerais - Fim ---

    'ECF - Especiais - Inicio ---
    Public Declare Function eAguardarCompactacao_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function eEnviarComando_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal cComando As String, ByVal iTamanhoComando As Integer, ByVal iType As Integer) As Integer
    Public Declare Function eRetornarAviso_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function eRetornarErro_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
    Public Declare Function eRetornarPortasCOM_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszPortas As String) As Integer
    Public Declare Function eMemoriaFiscal_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszInicio As String, ByVal pszFinal As String, ByVal pszCompleta As Integer, ByVal pszTipo As String) As Integer
    Public Declare Function eRetornarAvisoErroUltimoCMD_ECF_Daruma Lib "DarumaFrameWork.dll" (ByRef pszAviso As String, ByRef pszErro As String) As Integer
    'ECF - Especiais - Fim ---

    'ECF - Registro - Inicio ---
    
    Public Declare Function regRetornaValorChave_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sProduto As String, ByVal sChave As String, ByVal sValor As String) As Integer
    Public Declare Function regAlterarValor_Daruma Lib "DarumaFrameWork.dll" (ByVal pszChave As String, ByVal pszValor As String) As Integer
    Public Declare Function regCCDDocOrigem_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCCDFormaPgto_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCCDLinhasTEF_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCCDParcelas_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCCDValor_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFFormaPgto_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFMensagemPromocional_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFQuantidade_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFTamanhoMinimoDescricao_ECF Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFTipoDescAcresc_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFUnidadeMedida_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFValorDescAcresc_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFCupomAdicional_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFCupomAdicionalDLLConfig_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFCupomAdicionalDllTitulo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regChequeXLinha1_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regChequeXLinha2_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regChequeXLinha3_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regChequeYLinha1_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regChequeYLinha2_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regChequeYLinha3_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCompatStatusFuncao_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regMaxFechamentoAutomatico_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFCupomMania Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFAguardarImpressao_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regCFTamanhoMinimoDescricao_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFArquivoLeituraX_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFCaracterSeparador_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFAuditoria_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFReceberAvisoEmArquivo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFReceberInfoEstendida_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFMaxFechamentoAutomatico_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regECFReceberErroEmArquivo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function regAtocotepe_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro1 As String, ByVal pszParametro2 As String) As Integer
    Public Declare Function regSintegra_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro1 As String, ByVal pszParametro2 As String) As Integer
    Public Declare Function regECFReceberInfoEstendidaEmArquivo_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    Public Declare Function eDefinirModoRegistro_Daruma Lib "DarumaFrameWork.dll" (ByVal pszParametro As String) As Integer
    
     
    'ECF - Registro - Fim ---'


'================================DECLARACOES DARUMA FRAMEWORK ================================'
'===========                           IMPRESSORAS DUAL                            ==========='


Public Declare Function iEnviarBMP_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stArqOrigem As String) As Integer
Public Declare Function iAcionarGaveta_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function iImprimirArquivo_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stPath As String) As Integer
Public Declare Function rStatusGaveta_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByRef iStatusGaveta As Integer) As Integer
Public Declare Function rStatusDocumento_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function rStatusImpressora_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function regVelocidade_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regTermica_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regTabulacao_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regPortaComunicacao_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regModoGaveta_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regLinhasGuilhotina_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regEnterFinal_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regAguardarProcesso_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function iImprimirTexto_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stTexto As String, ByVal iTam As Integer) As Integer
Public Declare Function iAutenticarDocumento_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stTexto As String, ByVal stLocal As String, ByVal stTimeOut As String) As Integer
Public Declare Function regCodePageAutomatico_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regZeroCortado_DUAL_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer



'================================DECLARACOES DARUMA FRAMEWORK ================================'
'===========                               TA2000                                  ==========='

Public Declare Function iEnviarDadosFormatados_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal szTexto As String, ByVal szRetorno As String) As Integer
Public Declare Function regPorta_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regAuditoria_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regMensagemBoasVindasLinha1_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regMensagemBoasVindasLinha2_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regMarcadorOpcao_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regMascara_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regMascaraLetra_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regMascaraNumero_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
Public Declare Function regMascaraEco_TA2000_Daruma Lib "DarumaFrameWork.dll" (ByVal stParametro As String) As Integer
                    
'================================DECLARACOES DARUMA FRAMEWORK ================================'
'===========                               MIN-200                                 ==========='

Public Declare Function regLerApagar_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function regPorta_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function regThread_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function regVelocidade_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function regTempoAlertar_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function regCaptionWinAPP_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function regBandejaInicio_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer

Public Declare Function eInicializar_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function eTrocarBandeja_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function eApagarSms_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal iNumeroSMS As Integer) As Integer

Public Declare Function rListarSms_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function rNivelSinalRecebido_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function rReceberSms_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sIndiceSMS As String, ByVal sNumFone As String, ByVal sData As String, ByVal sHora As String, ByVal sMsg As String) As Integer
Public Declare Function rRetornarImei_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sIMEI As String) As Integer
Public Declare Function rRetornarOperadora_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sOperadora As String) As Integer
Public Declare Function tEnviarSms_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sNumeroTelefone As String, ByVal sMensagem As String) As Integer

Public Declare Function tEnviarDadosCsd_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function rReceberDadosCsd_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer
Public Declare Function eAtivarConexaoCsd_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function eFinalizarChamadaCsd_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function eRealizarChamadaCsd_MODEM_DarumaFramework Lib "DarumaFrameWork.dll" (ByVal sParametro As String) As Integer



'================================DECLARACOES DARUMA FRAMEWORK ================================'
'===========                          DARUMAFRAMEWORK                              ==========='

Public Declare Function eVerificarVersaoDLL_Daruma Lib "DarumaFrameWork.dll" (ByVal sVersaoDLL As String) As Integer
Public Declare Function eDefinirProduto_Daruma Lib "DarumaFrameWork.dll" (ByVal sProduto As String) As Integer
Public Declare Function eBuscarPortaVelocidade_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function eAcionarGuilhotina_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal sTipoCorte As String) As Integer
Public Declare Function eAbrirGaveta_ECF_Daruma Lib "DarumaFrameWork.dll" () As Integer
Public Declare Function eInterpretarRetorno_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal iErro As Integer, ByVal sMsg_Erro As String) As Integer
Public Declare Function eInterpretarErro_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal iErro As Integer, ByVal sMsg_Erro As String) As Integer
Public Declare Function eInterpretarAviso_ECF_Daruma Lib "DarumaFrameWork.dll" (ByVal iAviso As Integer, ByVal sMsg_Aviso As String) As Integer

'Declaracoes globais'===========                         VARIAVEIS GLOBAIS                             ============'

  


    '================================    FUN«’ES GLOBAIS    ================================'
              '===========            TRATAMENTO DE RETORNO IMPRESSORA FISCAL              ==========='


    Public Function DarumaFramework_Mostrar_Retorno_ECF(iRetorno As Integer)
        Dim Str_Msg_NumRetorno As String
        Dim Str_Msg_NumErro As String
        Dim Str_Msg_NumAviso As String
        Dim Int_NumRetorno As Integer
        Dim Int_NumErro As Integer
        Dim Int_NumAviso As Integer
        
        
            Str_Msg_NumRetorno = Space(200)
            Str_Msg_NumErro = Space(200)
            Str_Msg_NumAviso = Space(200)
            
            Int_NumRetorno = 0
            Int_NumErro = 0
            Int_NumAviso = 0
        
       
        'Retornos de MÈtodo
            iRetorno = eInterpretarRetorno_ECF_Daruma(iRetorno, Str_Msg_NumRetorno)
            iRetorno = rStatusUltimoCmdInt_ECF_Daruma(Int_NumErro, Int_NumAviso)
            iRetorno = eInterpretarErro_ECF_Daruma(Int_NumErro, Str_Msg_NumErro)
            iRetorno = eInterpretarAviso_ECF_Daruma(Int_NumAviso, Str_Msg_NumAviso)
                      

                                
           FR_MostraAvisoErro.lblRetorno.Caption = "Retorno do MÈtodo:  " + Str_Msg_NumRetorno
           FR_MostraAvisoErro.lblErro.Caption = "Mensagem de Erro:  " + Str_Msg_NumErro
           FR_MostraAvisoErro.lblAviso.Caption = "Mensagem de Aviso:  " + Str_Msg_NumAviso
           FR_MostraAvisoErro.Show

       
    End Function

