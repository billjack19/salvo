

--
-- Database Format 
-- Estrutura
-- Criado Pelo /******* Migration JK-19 *********/
--

DROP DATABASE IF EXISTS `Format`;
CREATE DATABASE `Format`;

USE Format;


DROP TABLE IF EXISTS `AGRUPAMENTO_USUARIO`;
CREATE TABLE AGRUPAMENTO_USUARIO (
	`ID_AGRUPAMENTO_USUARIO` int NOT NULL  , 
	`IDENTIFICACAO` char(3)   DEFAULT NULL, 
	`ID_GRUPO_USUARIO` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ALMOXARIFADO`;
CREATE TABLE ALMOXARIFADO (
	`ALMOXARIFADO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `AUTORIZA_AM_TIPO_SERVICO`;
CREATE TABLE AUTORIZA_AM_TIPO_SERVICO (
	`ID_AUTORIZA_AM_TIPO_SERVICO` int NOT NULL  , 
	`ID_PECAS_MANUTENCAO` int   DEFAULT NULL, 
	`ID_TIPO_SERVICO` int   DEFAULT NULL, 
	`DESCRICAO` varchar(100)   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `AUTORIZA_AM`;
CREATE TABLE AUTORIZA_AM (
	`ID_AUTORIZA_AM` int NOT NULL  , 
	`FILIAL` int   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`ID_VEICULO` int   DEFAULT NULL, 
	`ID_MOTORISTA` int   DEFAULT NULL, 
	`KM_ATUAL` float   DEFAULT NULL, 
	`OBSERVACAO` varchar(2000)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`FLAGIMPRESSAO` int(1)   DEFAULT NULL, 
	`FLAGCANCELADA` int(1)   DEFAULT NULL, 
	`CK_TIPO` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `AUTORIZACAO`;
CREATE TABLE AUTORIZACAO (
	`IDENTIFICACAO` varchar(20) NOT NULL  , 
	`NIVEL` tinyint NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `BackupCDI`;
CREATE TABLE BackupCDI (
	`NomeBase` varchar(50)   DEFAULT NULL, 
	`FlagBackup` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `BonusFornecedor`;
CREATE TABLE BonusFornecedor (
	`id_BonusFornecedor` int NOT NULL  , 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`ValorBonus` float   DEFAULT NULL, 
	`Observacao` varchar(255)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cbacontas`;
CREATE TABLE cbacontas (
	`NRO_CONTA` char(15) NOT NULL  , 
	`BANCO` int NOT NULL  , 
	`SALDO_ANTERIOR` float   DEFAULT NULL, 
	`SALDO` float   DEFAULT NULL, 
	`debito` numeric   DEFAULT NULL, 
	`Credito` float   DEFAULT NULL, 
	`SALDO_ANT` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ContaContabil` char(5)   DEFAULT NULL, 
	`DepartamentoConta` int   DEFAULT NULL, 
	`SituacaoConta` int   DEFAULT NULL, 
	`SequenciaConta` int   DEFAULT NULL, 
	`Limite` float   DEFAULT NULL, 
	`Gera_SaldoContas` int(1)   DEFAULT NULL, 
	`NaoEfetivado` float   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`JurosTroca` float   DEFAULT NULL, 
	`TaxaDocumento` float   DEFAULT NULL, 
	`GERA_FLUXO` int(1)   DEFAULT NULL, 
	`Factoring` int(1)   DEFAULT NULL, 
	`ContaGarantida` int(1)   DEFAULT NULL, 
	`Observacao` varchar(200)   DEFAULT NULL, 
	`NaoPermitirSaldoNegativo` int(1)   DEFAULT NULL, 
	`Encerrada` int(1)   DEFAULT NULL, 
	`AdiantamentoFornecedores` int(1)   DEFAULT NULL, 
	`AdiantamentoClientes` int(1)   DEFAULT NULL, 
	`EnviaContabilidade` int(1)   DEFAULT NULL, 
	`ContaContabilTrocaDuplicata` char(5)   DEFAULT NULL, 
	`Sequencial` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CategoriaTitulos`;
CREATE TABLE CategoriaTitulos (
	`Codigo` int NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`Indice` int   DEFAULT NULL, 
	`TaxaJuros` float   DEFAULT NULL, 
	`TaxaJurosAtraso` float   DEFAULT NULL, 
	`MultaAtraso` float   DEFAULT NULL, 
	`PrazoRedutor` numeric   DEFAULT NULL, 
	`RedutorTaxa` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CbaContas_Acesso`;
CREATE TABLE CbaContas_Acesso (
	`NRO_CONTA` char(15) NOT NULL  , 
	`BANCO` int NOT NULL  , 
	`IDENTIFICACAO` char(3) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Bancos`;
CREATE TABLE Bancos (
	`BANCO` int NOT NULL  , 
	`nome` char(50)   DEFAULT NULL, 
	`AGENCIA` char(10)   DEFAULT NULL, 
	`ENDERECO` char(50)   DEFAULT NULL, 
	`CIDADE` char(30)   DEFAULT NULL, 
	`ESTADO` char(2)   DEFAULT NULL, 
	`BAIRRO` char(30)   DEFAULT NULL, 
	`CEP` char(9)   DEFAULT NULL, 
	`FONE` char(30)   DEFAULT NULL, 
	`FAX` char(30)   DEFAULT NULL, 
	`DESCONTO` float   DEFAULT NULL, 
	`AlturaCheque` float   DEFAULT NULL, 
	`LinhaValor` float   DEFAULT NULL, 
	`ColunaValor` float   DEFAULT NULL, 
	`LinhaExtenso1` float   DEFAULT NULL, 
	`ColunaExtenso1` float   DEFAULT NULL, 
	`LinhaExtenso2` float   DEFAULT NULL, 
	`ColunaExtenso2` float   DEFAULT NULL, 
	`LinhaPortador` float   DEFAULT NULL, 
	`ColunaPortador` float   DEFAULT NULL, 
	`LinhaCidade` float   DEFAULT NULL, 
	`ColunaCidade` float   DEFAULT NULL, 
	`ColunaMes` float   DEFAULT NULL, 
	`ColunaAno` float   DEFAULT NULL, 
	`UsarBomPara` float   DEFAULT NULL, 
	`LinhaBomPaa` float   DEFAULT NULL, 
	`ColunaBomPara` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ContaContabilContra` char(5)   DEFAULT NULL, 
	`DepartamentoContra` int   DEFAULT NULL, 
	`SituacaoContra` int   DEFAULT NULL, 
	`SequenciaContra` int   DEFAULT NULL, 
	`Calcula` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cbacontascusto`;
CREATE TABLE cbacontascusto (
	`GRUPO_CONTA` int NOT NULL  , 
	`SEQ_CTA_CUSTO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`DESC_CTA_CUSTO` char(50)   DEFAULT NULL, 
	`TIPO_CTA_CUSTO` char(1)   DEFAULT NULL, 
	`SALDO_CTA_CUSTO` int(1)   DEFAULT NULL, 
	`ContaContabil` char(5)   DEFAULT NULL, 
	`Departamento` int   DEFAULT NULL, 
	`Situacao` int   DEFAULT NULL, 
	`Sequencia` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`PercRateio` float   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`CustoProducao` int(1)   DEFAULT NULL, 
	`CustoAdministracao` int(1)   DEFAULT NULL, 
	`NaoApropriar` int(1)   DEFAULT NULL, 
	`Depreciacao` int(1)   DEFAULT NULL, 
	`ParcelasDepreciacao` int   DEFAULT NULL, 
	`Impostos` int(1)   DEFAULT NULL, 
	`DespesasFinanceiras` int(1)   DEFAULT NULL, 
	`TipoDespesas` char(1)   DEFAULT NULL, 
	`Limite` float   DEFAULT NULL, 
	`AgrupamentoContas` int   DEFAULT NULL, 
	`Agregados` int(1)   DEFAULT NULL, 
	`ImpostosSobreVendas` int(1)   DEFAULT NULL, 
	`AgrupamentoContas_RelDespesas` int   DEFAULT NULL, 
	`Fretes` int(1)   DEFAULT NULL, 
	`Comissoes` int(1)   DEFAULT NULL, 
	`GeraRelatorioFinanceiro` int(1)   DEFAULT NULL, 
	`GeraRelatorioCusto` int(1)   DEFAULT NULL, 
	`INATIVO` int(1)   DEFAULT NULL, 
	`ID_LancRateioSetores` int   DEFAULT NULL, 
	`SetorProducaoPrincipal` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cbahistorico`;
CREATE TABLE cbahistorico (
	`COD_HISTORICO` int NOT NULL  , 
	`DESC_HISTORICO` char(50)   DEFAULT NULL, 
	`OPER_HISTORICO` char(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DespesaExtraEmpresa` int(1)   DEFAULT NULL, 
	`ESPECIE` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CBARESUMO`;
CREATE TABLE CBARESUMO (
	`BANCO` int NOT NULL  , 
	`NRO_CONTA` char(15) NOT NULL  , 
	`EMISSAO` datetime   DEFAULT NULL, 
	`DESCRICAO` varchar(100)   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cbacontascusto_Contas`;
CREATE TABLE cbacontascusto_Contas (
	`GRUPO_CONTA` int NOT NULL  , 
	`SEQ_CTA_CUSTO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`Filial` int NOT NULL  , 
	`ContaContabil` int   DEFAULT NULL, 
	`ContraPartida` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cbasubgrupocontas`;
CREATE TABLE cbasubgrupocontas (
	`GRUPO_CONTA` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`DESCRICAO` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`CONTACONTABIL` varchar(5)   DEFAULT NULL, 
	`Almoxarifado` int(1)   DEFAULT NULL, 
	`Limite` float   DEFAULT NULL, 
	`INATIVO` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cbagrupocontas`;
CREATE TABLE cbagrupocontas (
	`GRUPO_CONTA` int NOT NULL  , 
	`DESC_GRUP_CONTA` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Limite` float   DEFAULT NULL, 
	`INATIVO` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cbalancamentos`;
CREATE TABLE cbalancamentos (
	`NUM_LANC` numeric NOT NULL  , 
	`BANCO` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`NRO_CONTA` char(15)   DEFAULT NULL, 
	`NRO_DOCUMENTO` numeric   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`UTILIZADO` varchar(2000)   DEFAULT NULL, 
	`COD_HISTORICO` int   DEFAULT NULL, 
	`NOMINAL` varchar(200)   DEFAULT NULL, 
	`COMPLEMENTO` varchar(200)   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`FLAG_IMPRESSAO` char(1)   DEFAULT NULL, 
	`TIPO` int   DEFAULT NULL, 
	`IDC_OK` char(1)   DEFAULT NULL, 
	`PAGAMENTO` datetime   DEFAULT NULL, 
	`DATA_EFETIVACAO` datetime   DEFAULT NULL, 
	`IDC_OK_EXTRATO` char(1)   DEFAULT NULL, 
	`MOTIVO_CANC` varchar(200)   DEFAULT NULL, 
	`ChPrevisao` char(1)   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`ContaContabil` char(5)   DEFAULT NULL, 
	`Departamento` int   DEFAULT NULL, 
	`Situacao` int   DEFAULT NULL, 
	`Sequencia` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`TransmitidoContab` int(1)   DEFAULT NULL, 
	`FILIAL` int   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL, 
	`NOTAFISCAL` char(6)   DEFAULT NULL, 
	`CUPOM` varchar(6)   DEFAULT NULL, 
	`TRANSFERENCIA` int(1)   DEFAULT NULL, 
	`FILIALBANCO` int   DEFAULT NULL, 
	`TROCA` varchar(6)   DEFAULT NULL, 
	`FILIALTROCA` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`APELIDO` varchar(50)   DEFAULT NULL, 
	`n_controle` int   DEFAULT NULL, 
	`FECHAMENTO` char(10)   DEFAULT NULL, 
	`DataCompetencia` char(7)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`BancoTransferencia` int   DEFAULT NULL, 
	`NRO_CONTATransferencia` char(15)   DEFAULT NULL, 
	`NUM_LANCTransferencia` numeric   DEFAULT NULL, 
	`Chapa` int   DEFAULT NULL, 
	`DATAATUALIZACAO_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CF_Parametros_Entrada`;
CREATE TABLE CF_Parametros_Entrada (
	`NatEntrada_Cafedentro` numeric   DEFAULT NULL, 
	`NatEntrada_CafeFora` numeric   DEFAULT NULL, 
	`Nat_Terceiros` numeric   DEFAULT NULL, 
	`SafraCafe` char(10)   DEFAULT NULL, 
	`CF_Item_Entrada` numeric   DEFAULT NULL, 
	`CF_ItemSacaria_Entrada` numeric   DEFAULT NULL, 
	`CF_Sacaria` int   DEFAULT NULL, 
	`NatEntrada_CompraCafe` numeric   DEFAULT NULL, 
	`ArmazenagemTerceiro` float   DEFAULT NULL, 
	`ArmazenagemAssociado` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CF_Parametros_Saida`;
CREATE TABLE CF_Parametros_Saida (
	`Nat_VendaDE` numeric   DEFAULT NULL, 
	`Nat_VendaFE` numeric   DEFAULT NULL, 
	`Nat_DevSimbol` numeric   DEFAULT NULL, 
	`Nat_Devolucao` numeric   DEFAULT NULL, 
	`Nat_Transferencia` numeric   DEFAULT NULL, 
	`Nat_Exportacao` numeric   DEFAULT NULL, 
	`Nat_Complemento` numeric   DEFAULT NULL, 
	`Nat_VendaFutura` numeric   DEFAULT NULL, 
	`Nat_SimplesRem` numeric   DEFAULT NULL, 
	`Nat_RetornoMerc` numeric   DEFAULT NULL, 
	`Nat_RetornoMercArmGerais` numeric   DEFAULT NULL, 
	`Nat_TransfSaldo` numeric   DEFAULT NULL, 
	`Nat_ComplementoFE` numeric   DEFAULT NULL, 
	`Nat_SimplesRemFE` numeric   DEFAULT NULL, 
	`Nat_TransfCredito` numeric   DEFAULT NULL, 
	`PautaFiscal` float   DEFAULT NULL, 
	`Item_Complemento` int   DEFAULT NULL, 
	`Nat_Consumo` numeric   DEFAULT NULL, 
	`Nat_TransferenciaProdutor` numeric   DEFAULT NULL, 
	`Nat_RemessaIndustria` numeric   DEFAULT NULL, 
	`VlrDevolucao` float   DEFAULT NULL, 
	`VlrDevolucaoArmazenagem` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CF_SALDO_DE_CAPITAL`;
CREATE TABLE CF_SALDO_DE_CAPITAL (
	`serie` char(3) NOT NULL  , 
	`NOTAFISCAL` char(10) NOT NULL  , 
	`CLIENTE` int   DEFAULT NULL, 
	`FAZENDA` int   DEFAULT NULL, 
	`DATAEMISSAO` datetime   DEFAULT NULL, 
	`ESPECIE` int   DEFAULT NULL, 
	`TOTALNOTA` float   DEFAULT NULL, 
	`TIPONOTAFISCAL` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cheques`;
CREATE TABLE cheques (
	`Valor` numeric   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL, 
	`Portador` text(2147483647)   DEFAULT NULL, 
	`Cidade` varchar(30)   DEFAULT NULL, 
	`UtilizadoPara` text(2147483647)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CF_Parametros_Condicao`;
CREATE TABLE CF_Parametros_Condicao (
	`EntradaCF` int   DEFAULT NULL, 
	`VendaCF` int   DEFAULT NULL, 
	`DevolucaoSimbolicaCF` int   DEFAULT NULL, 
	`DevolucaoCF` int   DEFAULT NULL, 
	`TransferenciaCF` int   DEFAULT NULL, 
	`ExportacaoCF` int   DEFAULT NULL, 
	`ComplementoPrecoCF` int   DEFAULT NULL, 
	`EntregaFuturaCF` int   DEFAULT NULL, 
	`SimplesRemessaCF` int   DEFAULT NULL, 
	`RemessaDepositoCF` int   DEFAULT NULL, 
	`RetornoCF` int   DEFAULT NULL, 
	`SaldoCredorCF` int   DEFAULT NULL, 
	`TransferenciaCliente` int   DEFAULT NULL, 
	`Consumo` int   DEFAULT NULL, 
	`CompraCafe` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CENTRO_CUSTO_ESTO`;
CREATE TABLE CENTRO_CUSTO_ESTO (
	`CENTRO_CUSTO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHEQUES_PRE`;
CREATE TABLE CHEQUES_PRE (
	`AGENCIA` varchar(10)   DEFAULT NULL, 
	`CHEQUE` varchar(8)   DEFAULT NULL, 
	`BANCO` int   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`NOME` varchar(50)   DEFAULT NULL, 
	`CPF` varchar(14)   DEFAULT NULL, 
	`IDENTIDADE` varchar(11)   DEFAULT NULL, 
	`TELEFONE` varchar(50)   DEFAULT NULL, 
	`RESPONSAVEL` varchar(50)   DEFAULT NULL, 
	`CGC` varchar(18)   DEFAULT NULL, 
	`INSCRICAO` varchar(16)   DEFAULT NULL, 
	`PAGAMENTO` datetime   DEFAULT NULL, 
	`DATA_NASCIMENTO` datetime   DEFAULT NULL, 
	`DESTINO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_CREDIARIO`;
CREATE TABLE CLIEFORNEC_CREDIARIO (
	`Cliente` int NOT NULL  , 
	`NomePai` varchar(70)   DEFAULT NULL, 
	`NomeMae` varchar(70)   DEFAULT NULL, 
	`Trabalho` varchar(100)   DEFAULT NULL, 
	`TempoServico` varchar(15)   DEFAULT NULL, 
	`CepTrabalho` varchar(9)   DEFAULT NULL, 
	`EnderecoTrabalho` varchar(70)   DEFAULT NULL, 
	`BairroTrabalho` varchar(50)   DEFAULT NULL, 
	`NumeroTrabalho` varchar(10)   DEFAULT NULL, 
	`ComplementoTrabalho` varchar(20)   DEFAULT NULL, 
	`TelefoneTrabalho` varchar(12)   DEFAULT NULL, 
	`CelularTrabalho` varchar(12)   DEFAULT NULL, 
	`FuncaoTrabalho` varchar(50)   DEFAULT NULL, 
	`RendaMensal` float   DEFAULT NULL, 
	`NomeConjugue` varchar(70)   DEFAULT NULL, 
	`TrabalhoConj` varchar(100)   DEFAULT NULL, 
	`FuncaoConj` varchar(50)   DEFAULT NULL, 
	`TempoServicoConj` varchar(15)   DEFAULT NULL, 
	`RendaMensalConj` float   DEFAULT NULL, 
	`SPC` varchar(100)   DEFAULT NULL, 
	`DataConsultaSPC` datetime   DEFAULT NULL, 
	`ContatoSPC` varchar(70)   DEFAULT NULL, 
	`AutorizacaoCrediario` varchar(150)   DEFAULT NULL, 
	`TrabalhosAnteriores` varchar(500)   DEFAULT NULL, 
	`TipoResidencia` varchar(1)   DEFAULT NULL, 
	`OutroDescricao` varchar(50)   DEFAULT NULL, 
	`RefPessoal1` varchar(70)   DEFAULT NULL, 
	`RefPessoal2` varchar(70)   DEFAULT NULL, 
	`RefPessoal3` varchar(70)   DEFAULT NULL, 
	`RefPessoal4` varchar(70)   DEFAULT NULL, 
	`RefPessoalTelefone1` varchar(12)   DEFAULT NULL, 
	`RefPessoalTelefone2` varchar(12)   DEFAULT NULL, 
	`RefPessoalTelefone3` varchar(12)   DEFAULT NULL, 
	`RefPessoalTelefone4` varchar(12)   DEFAULT NULL, 
	`RefPessoalCelular1` varchar(12)   DEFAULT NULL, 
	`RefPessoalCelular2` varchar(12)   DEFAULT NULL, 
	`RefPessoalCelular3` varchar(12)   DEFAULT NULL, 
	`RefPessoalCelular4` varchar(12)   DEFAULT NULL, 
	`RefComercial1` varchar(70)   DEFAULT NULL, 
	`RefComercial2` varchar(70)   DEFAULT NULL, 
	`RefComercial3` varchar(70)   DEFAULT NULL, 
	`RefComercial4` varchar(70)   DEFAULT NULL, 
	`RefComercTelefone1` varchar(12)   DEFAULT NULL, 
	`RefComercTelefone2` varchar(12)   DEFAULT NULL, 
	`RefComercTelefone3` varchar(12)   DEFAULT NULL, 
	`RefComercTelefone4` varchar(12)   DEFAULT NULL, 
	`RefComercCelular1` varchar(12)   DEFAULT NULL, 
	`RefComercCelular2` varchar(12)   DEFAULT NULL, 
	`RefComercCelular3` varchar(12)   DEFAULT NULL, 
	`RefComercCelular4` varchar(12)   DEFAULT NULL, 
	`ObservacaoCrediario` varchar(1000)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_CONTADEBITO`;
CREATE TABLE CLIEFORNEC_CONTADEBITO (
	`CODIGO` int NOT NULL  , 
	`FILIAL` int NOT NULL  , 
	`CONTACONTABIL` char(5)   DEFAULT NULL, 
	`TIPO` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLASSIFICACAO_FISCAL`;
CREATE TABLE CLASSIFICACAO_FISCAL (
	`CLASSIF_FISCAL` char(20) NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`TAXA_IPI` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ExTipi` char(3)   DEFAULT NULL, 
	`CST_IPI` char(2)   DEFAULT NULL, 
	`ImpostoImportacao` float   DEFAULT NULL, 
	`BaseICMSImportacao` float   DEFAULT NULL, 
	`PIS` float   DEFAULT NULL, 
	`COFINS` float   DEFAULT NULL, 
	`CEST` char(9)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_CONDPAGAMENTO`;
CREATE TABLE CLIEFORNEC_CONDPAGAMENTO (
	`CLIENTE` int NOT NULL  , 
	`SEQ` int NOT NULL  , 
	`CONDPAGAMENTO` int   DEFAULT NULL, 
	`PERCENTUAL` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC`;
CREATE TABLE CLIEFORNEC (
	`CODIGO` int NOT NULL  , 
	`PESSOA` char(1)   DEFAULT NULL, 
	`CPF_CGC` varchar(18)   DEFAULT NULL, 
	`INSCRICAOESTADUAL` varchar(20)   DEFAULT NULL, 
	`INSCRICAOINSS` char(15)   DEFAULT NULL, 
	`CONTROLEINSS` char(5)   DEFAULT NULL, 
	`ALIQUOTAINSS` float   DEFAULT NULL, 
	`RAZAOSOCIAL` varchar(70)   DEFAULT NULL, 
	`NOMEFANTASIA` varchar(70)   DEFAULT NULL, 
	`NOMEREDUZIDO` varchar(10)   DEFAULT NULL, 
	`ENDERECO` varchar(70)   DEFAULT NULL, 
	`BAIRRO` varchar(30)   DEFAULT NULL, 
	`CIDADE` varchar(30)   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`TELEFONE` char(100)   DEFAULT NULL, 
	`FAX` char(100)   DEFAULT NULL, 
	`EMAIL` char(100)   DEFAULT NULL, 
	`ENDERECOCOBRANCA` varchar(70)   DEFAULT NULL, 
	`BAIRROCOBRANCA` varchar(50)   DEFAULT NULL, 
	`CIDADECOBRANCA` varchar(30)   DEFAULT NULL, 
	`ESTADOCOBRANCA` char(10)   DEFAULT NULL, 
	`CEPCOBRANCA` varchar(9)   DEFAULT NULL, 
	`CONTATO` varchar(100)   DEFAULT NULL, 
	`NASCIMENTOFUNDACAO` datetime   DEFAULT NULL, 
	`LIMITECOMPRA` float   DEFAULT NULL, 
	`STATUS` int(1)   DEFAULT NULL, 
	`STATUS_RD` int(1)   DEFAULT NULL, 
	`BANCO` varchar(50)   DEFAULT NULL, 
	`AGENCIA` char(20)   DEFAULT NULL, 
	`CONTACORRENTE` varchar(50)   DEFAULT NULL, 
	`BAIXA` datetime   DEFAULT NULL, 
	`OBSERVACAO` text   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`FORNECEDOR` int(1) NOT NULL  , 
	`CLIENTE` int(1) NOT NULL  , 
	`OUTROS` int(1)   DEFAULT NULL, 
	`FUNCIONARIO` int(1) NOT NULL  , 
	`DATA_CADASTRO` datetime   DEFAULT NULL, 
	`ETIQUETASBOLETO` int(1)   DEFAULT NULL, 
	`ETIQUETAS` int(1)   DEFAULT NULL, 
	`RG` varchar(20)   DEFAULT NULL, 
	`ESTADO_CIVIL` varchar(20)   DEFAULT NULL, 
	`CONJUGE` varchar(50)   DEFAULT NULL, 
	`CPF_CGC_CONJUGE` varchar(18)   DEFAULT NULL, 
	`BLOQUEADOFINANCEIRO` int(1) NOT NULL  , 
	`CARTACOBRANCA` int(1) NOT NULL  , 
	`CLIENTE_ESPECIAL` int(1) NOT NULL  , 
	`COBRANCA_EXTERNA` int(1) NOT NULL  , 
	`COBRANCA_JUDICIAL` int(1) NOT NULL  , 
	`ContaContabil` char(5)   DEFAULT NULL, 
	`MicroEmpresa` int(1)   DEFAULT NULL, 
	`DEMISSAO` datetime   DEFAULT NULL, 
	`REGIAO` int   DEFAULT NULL, 
	`VENDEDOR` int   DEFAULT NULL, 
	`DIAVENCIMENTO` int   DEFAULT NULL, 
	`DIASPRAZO1` int   DEFAULT NULL, 
	`DIASPRAZO2` int   DEFAULT NULL, 
	`DIASPRAZO3` int   DEFAULT NULL, 
	`DIASPRAZO4` int   DEFAULT NULL, 
	`DIASPRAZO5` int   DEFAULT NULL, 
	`FONEPAGAR` char(40)   DEFAULT NULL, 
	`CONTATOPAGAR` char(40)   DEFAULT NULL, 
	`EMAILPAGAR` char(50)   DEFAULT NULL, 
	`PaginaGuia` varchar(20)   DEFAULT NULL, 
	`LetraGuia` varchar(20)   DEFAULT NULL, 
	`LinhaGuia` varchar(20)   DEFAULT NULL, 
	`ObservacaoGuia` varchar(50)   DEFAULT NULL, 
	`CapitalSocial` float   DEFAULT NULL, 
	`NUMERO` varchar(30)   DEFAULT NULL, 
	`NUMEROCOBRANCA` varchar(30)   DEFAULT NULL, 
	`atendente` int   DEFAULT NULL, 
	`NOMESOCIO1` varchar(50)   DEFAULT NULL, 
	`CPFSOCIO1` varchar(50)   DEFAULT NULL, 
	`RGSOCIO1` varchar(50)   DEFAULT NULL, 
	`NOMESOCIO2` varchar(50)   DEFAULT NULL, 
	`CPFSOCIO2` varchar(50)   DEFAULT NULL, 
	`RGSOCIO2` varchar(50)   DEFAULT NULL, 
	`NOMESOCIO3` varchar(50)   DEFAULT NULL, 
	`CPFSOCIO3` varchar(50)   DEFAULT NULL, 
	`RGSOCIO3` varchar(50)   DEFAULT NULL, 
	`ATIVIDADE` int   DEFAULT NULL, 
	`SUSPENSO` int(1)   DEFAULT NULL, 
	`INATIVO` int(1)   DEFAULT NULL, 
	`ORIGEM` int   DEFAULT NULL, 
	`CATEGORIACLIENTE` int   DEFAULT NULL, 
	`REFERENCIAS` varchar(1000)   DEFAULT NULL, 
	`ObservacaoVendas` varchar(400)   DEFAULT NULL, 
	`AFILIADO` int(1)   DEFAULT NULL, 
	`DetalheSocial` varchar(500)   DEFAULT NULL, 
	`Especial` int(1)   DEFAULT NULL, 
	`TipoPrazoPagar` int   DEFAULT NULL, 
	`Celular` varchar(100)   DEFAULT NULL, 
	`TITULAR` varchar(50)   DEFAULT NULL, 
	`Construtora` int(1)   DEFAULT NULL, 
	`DataAlteracaoAtendente` datetime   DEFAULT NULL, 
	`GeraComissao` int(1)   DEFAULT NULL, 
	`Complemento` varchar(30)   DEFAULT NULL, 
	`CodCidade` int   DEFAULT NULL, 
	`CodPais` int   DEFAULT NULL, 
	`DataAtualizacao_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`MediaDiasPrazo` int   DEFAULT NULL, 
	`NascContato` datetime   DEFAULT NULL, 
	`Agrupar` int(1)   DEFAULT NULL, 
	`IsencaoIPI` int(1)   DEFAULT NULL, 
	`Contabiliza` int(1)   DEFAULT NULL, 
	`TELEFONE_GRADE` varchar(200)   DEFAULT NULL, 
	`DebitoCredito` int(1)   DEFAULT NULL, 
	`CondPagamento` int   DEFAULT NULL, 
	`NaoAlterarCondicao` int(1)   DEFAULT NULL, 
	`DataPesquisaSintegra` datetime   DEFAULT NULL, 
	`DadosPesquisaSintegra` varchar(100)   DEFAULT NULL, 
	`Fazenda` int   DEFAULT NULL, 
	`ConstaSPC` int(1)   DEFAULT NULL, 
	`Associado` int(1)   DEFAULT NULL, 
	`ObrigacoesPagar` int(1)   DEFAULT NULL, 
	`IsencaoST` int(1)   DEFAULT NULL, 
	`Suframa` int(1)   DEFAULT NULL, 
	`TabelaPrecoPersonalizada` int   DEFAULT NULL, 
	`TribContribuinte` int(1)   DEFAULT NULL, 
	`TribNaoContribuinte` int(1)   DEFAULT NULL, 
	`TribIndustria` int(1)   DEFAULT NULL, 
	`TribConsumidorFinal` int(1)   DEFAULT NULL, 
	`DECLINADO` int(1)   DEFAULT NULL, 
	`ApelidoGrupoEmpresas` varchar(50)   DEFAULT NULL, 
	`EtiquetaEndCobranca` int(1)   DEFAULT NULL, 
	`DescontoPedido` float   DEFAULT NULL, 
	`Convenio` int(1)   DEFAULT NULL, 
	`EmpresaConvenio` int   DEFAULT NULL, 
	`LimiteConvenio` float   DEFAULT NULL, 
	`SimplesNacional` int(1)   DEFAULT NULL, 
	`Transportadora` int   DEFAULT NULL, 
	`PROFISSAO` varchar(30)   DEFAULT NULL, 
	`RENDAMENSAL` float   DEFAULT NULL, 
	`ADMISSAO` datetime   DEFAULT NULL, 
	`LOCALTRABALHO` varchar(50)   DEFAULT NULL, 
	`ENDTRABALHO` varchar(50)   DEFAULT NULL, 
	`BAIRROTRABALHO` varchar(50)   DEFAULT NULL, 
	`CIDADETRABALHO` varchar(50)   DEFAULT NULL, 
	`ESTADOTRABALHO` char(2)   DEFAULT NULL, 
	`CEPTRABALHO` varchar(9)   DEFAULT NULL, 
	`TELEFONETRABALHO` char(20)   DEFAULT NULL, 
	`REGIAO1` int   DEFAULT NULL, 
	`NOMECONJUGE` varchar(50)   DEFAULT NULL, 
	`LOCALTRABALHOCONJ` varchar(50)   DEFAULT NULL, 
	`ENDTRABALHOCONJ` varchar(50)   DEFAULT NULL, 
	`BAIRROTRABALHOCONJ` varchar(50)   DEFAULT NULL, 
	`CIDADETRABALHOCONJ` varchar(50)   DEFAULT NULL, 
	`ESTADOTRABALHOCONJ` char(2)   DEFAULT NULL, 
	`CEPTRABALHOCONJ` varchar(9)   DEFAULT NULL, 
	`TELEFONETRABALHOCONJ` char(20)   DEFAULT NULL, 
	`RENDAFAMILIAR` float   DEFAULT NULL, 
	`QTDEPESSOAS` int   DEFAULT NULL, 
	`PROFISSAOCONJ` varchar(50)   DEFAULT NULL, 
	`NASCONJUGE` datetime   DEFAULT NULL, 
	`RGCONJUGE` varchar(20)   DEFAULT NULL, 
	`CPFCONJUGE` varchar(18)   DEFAULT NULL, 
	`RENDAMENSALCONJ` float   DEFAULT NULL, 
	`ADMISSAOCONJ` datetime   DEFAULT NULL, 
	`REFERENCIACOMERCIAL1` varchar(70)   DEFAULT NULL, 
	`FONEREFERENCIACOMERCIAL1` varchar(20)   DEFAULT NULL, 
	`REFERENCIACOMERCIAL2` varchar(70)   DEFAULT NULL, 
	`FONEREFERENCIACOMERCIAL2` varchar(20)   DEFAULT NULL, 
	`REFERENCIACOMERCIAL3` varchar(70)   DEFAULT NULL, 
	`FONEREFERENCIACOMERCIAL3` varchar(20)   DEFAULT NULL, 
	`REFERENCIABANCARIA1` varchar(50)   DEFAULT NULL, 
	`FONEREFERENCIABANCARIA1` varchar(20)   DEFAULT NULL, 
	`REFERENCIABANCARIA2` varchar(50)   DEFAULT NULL, 
	`FONEREFERENCIABANCARIA2` varchar(20)   DEFAULT NULL, 
	`REFERENCIAPESSOAL1` varchar(50)   DEFAULT NULL, 
	`REFERENCIAPESSOAL2` varchar(50)   DEFAULT NULL, 
	`REFERENCIAPESSOAL3` varchar(50)   DEFAULT NULL, 
	`FONEREFERENCIAPESSOAL1` varchar(20)   DEFAULT NULL, 
	`FONEREFERENCIAPESSOAL2` varchar(20)   DEFAULT NULL, 
	`FONEREFERENCIAPESSOAL3` varchar(20)   DEFAULT NULL, 
	`NOMEFIADOR` varchar(50)   DEFAULT NULL, 
	`LOCALTRABALHOFIADOR` varchar(50)   DEFAULT NULL, 
	`ENDTRABALHOFIADOR` varchar(50)   DEFAULT NULL, 
	`BAIRROTRABALHOFIADOR` varchar(50)   DEFAULT NULL, 
	`CIDADETRABALHOFIADOR` varchar(50)   DEFAULT NULL, 
	`ESTADOTRABALHOFIADOR` char(2)   DEFAULT NULL, 
	`CEPTRABALHOFIADOR` varchar(9)   DEFAULT NULL, 
	`TELEFONETRABALHOFIADOR` char(20)   DEFAULT NULL, 
	`PROFISSAOFIADOR` varchar(50)   DEFAULT NULL, 
	`NASCFIADOR` datetime   DEFAULT NULL, 
	`RGFIADOR` varchar(20)   DEFAULT NULL, 
	`CPFFIADOR` varchar(18)   DEFAULT NULL, 
	`RENDAMENSALFIADOR` float   DEFAULT NULL, 
	`ADMISSAOFIADOR` datetime   DEFAULT NULL, 
	`NOMEFIADORconj` varchar(50)   DEFAULT NULL, 
	`LOCALTRABALHOFIADORconj` varchar(50)   DEFAULT NULL, 
	`ENDTRABALHOFIADORconj` varchar(50)   DEFAULT NULL, 
	`BAIRROTRABALHOFIADORconj` varchar(50)   DEFAULT NULL, 
	`CIDADETRABALHOFIADORconj` varchar(50)   DEFAULT NULL, 
	`ESTADOTRABALHOFIADORconj` char(2)   DEFAULT NULL, 
	`CEPTRABALHOFIADORconj` varchar(9)   DEFAULT NULL, 
	`TELEFONETRABALHOFIADORconj` char(20)   DEFAULT NULL, 
	`PROFISSAOFIADORconj` varchar(50)   DEFAULT NULL, 
	`NASCFIADORconj` datetime   DEFAULT NULL, 
	`RGFIADORconj` varchar(20)   DEFAULT NULL, 
	`CPFFIADORconj` varchar(18)   DEFAULT NULL, 
	`RENDAMENSALFIADORconj` float   DEFAULT NULL, 
	`ADMISSAOFIADORconj` datetime   DEFAULT NULL, 
	`NOMEANTERIORFIADOR` varchar(50)   DEFAULT NULL, 
	`ENDANTERIORFIADOR` varchar(50)   DEFAULT NULL, 
	`BAIRROANTERIORFIADOR` varchar(50)   DEFAULT NULL, 
	`CIDADEANTERIORFIADOR` varchar(50)   DEFAULT NULL, 
	`ESTADOANTERIORFIADOR` char(2)   DEFAULT NULL, 
	`CEPANTERIORFIADOR` varchar(9)   DEFAULT NULL, 
	`TELEFONEANTERIORFIADOR` char(20)   DEFAULT NULL, 
	`ALUGUELANTERIORFIADOR` float   DEFAULT NULL, 
	`ESTADOCIVIL` varchar(30)   DEFAULT NULL, 
	`NACIONALIDADE` varchar(30)   DEFAULT NULL, 
	`NACIONALIDADEFIADOR` varchar(30)   DEFAULT NULL, 
	`ESTADOCIVILFIADOR` varchar(30)   DEFAULT NULL, 
	`ENDERECOFIADOR` varchar(50)   DEFAULT NULL, 
	`BAIRROFIADOR` varchar(50)   DEFAULT NULL, 
	`CIDADEFIADOR` varchar(50)   DEFAULT NULL, 
	`ESTADOFIADOR` char(2)   DEFAULT NULL, 
	`CEPFIADOR` varchar(9)   DEFAULT NULL, 
	`GeraBoleto` int(1)   DEFAULT NULL, 
	`TELEFONEFIADOR` char(20)   DEFAULT NULL, 
	`EstadoCivilFiadorconj` char(50)   DEFAULT NULL, 
	`GERANF` int(1)   DEFAULT NULL, 
	`RegimeCasamento` varchar(50)   DEFAULT NULL, 
	`BANCO2` char(25)   DEFAULT NULL, 
	`AGENCIA2` char(15)   DEFAULT NULL, 
	`CONTACORRENTE2` char(15)   DEFAULT NULL, 
	`TITULAR2` varchar(50)   DEFAULT NULL, 
	`EnderecoComercial` varchar(60)   DEFAULT NULL, 
	`BairroComercial` varchar(30)   DEFAULT NULL, 
	`CidadeComercial` varchar(30)   DEFAULT NULL, 
	`EstadoComercial` varchar(2)   DEFAULT NULL, 
	`TelefoneComercial` varchar(20)   DEFAULT NULL, 
	`CepComercial` varchar(9)   DEFAULT NULL, 
	`NacionalidadeConjuge` varchar(30)   DEFAULT NULL, 
	`TipoTransportadora` int(1)   DEFAULT NULL, 
	`CTRN` varchar(10)   DEFAULT NULL, 
	`DataContabil` datetime   DEFAULT NULL, 
	`AssinadaPor` varchar(100)   DEFAULT NULL, 
	`Cartorio` varchar(100)   DEFAULT NULL, 
	`Livro` varchar(10)   DEFAULT NULL, 
	`Folha` varchar(10)   DEFAULT NULL, 
	`DataPesquisaReceita` datetime   DEFAULT NULL, 
	`DadosPesquisaReceita` varchar(50)   DEFAULT NULL, 
	`CapitalSocialSocio1` float   DEFAULT NULL, 
	`CapitalSocialSocio2` float   DEFAULT NULL, 
	`CapitalSocialSocio3` float   DEFAULT NULL, 
	`ObservacaoSocio1` varchar(100)   DEFAULT NULL, 
	`ObservacaoSocio2` varchar(100)   DEFAULT NULL, 
	`ObservacaoSocio3` varchar(100)   DEFAULT NULL, 
	`TaxaJuros` float   DEFAULT NULL, 
	`Agencia1` varchar(50)   DEFAULT NULL, 
	`Banco1` varchar(50)   DEFAULT NULL, 
	`CaminhoBalanco` varchar(100)   DEFAULT NULL, 
	`CaminhoComprovanteRenda` varchar(100)   DEFAULT NULL, 
	`CaminhoComprovanteResidencia` varchar(100)   DEFAULT NULL, 
	`CaminhoContratoSocial` varchar(100)   DEFAULT NULL, 
	`CaminhoCPF` varchar(100)   DEFAULT NULL, 
	`CaminhoRG` varchar(100)   DEFAULT NULL, 
	`CartaoCredito` varchar(20)   DEFAULT NULL, 
	`CartaoCredito1` varchar(20)   DEFAULT NULL, 
	`ContatoBanco` varchar(50)   DEFAULT NULL, 
	`TelefoneBanco` varchar(50)   DEFAULT NULL, 
	`ContaCorrente1` varchar(50)   DEFAULT NULL, 
	`ContatoBanco1` varchar(50)   DEFAULT NULL, 
	`ContatoReferenciaComercial1` varchar(50)   DEFAULT NULL, 
	`ContatoReferenciaComercial2` varchar(50)   DEFAULT NULL, 
	`ContatoReferenciaComercial3` varchar(50)   DEFAULT NULL, 
	`NomeSocio4` varchar(50)   DEFAULT NULL, 
	`CPFSocio4` varchar(50)   DEFAULT NULL, 
	`RGSocio4` varchar(50)   DEFAULT NULL, 
	`CapitalSocialSocio4` float   DEFAULT NULL, 
	`ObservacaoSocio4` varchar(100)   DEFAULT NULL, 
	`ObservacaoArquivosDocumentos` varchar(1000)   DEFAULT NULL, 
	`TelefoneBanco1` varchar(50)   DEFAULT NULL, 
	`DataConsulta` datetime   DEFAULT NULL, 
	`StatusConsulta` varchar(50)   DEFAULT NULL, 
	`CodFilial` int   DEFAULT NULL, 
	`SequenciaRota` int   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`NumPassaporte` varchar(20)   DEFAULT NULL, 
	`NumPassaporteConjuge` varchar(20)   DEFAULT NULL, 
	`NumPassaporteFiador` varchar(20)   DEFAULT NULL, 
	`PTA` varchar(100)   DEFAULT NULL, 
	`Perc_O` float   DEFAULT NULL, 
	`Perc_G` float   DEFAULT NULL, 
	`CaminhoAssinatura` varchar(500)   DEFAULT NULL, 
	`NaoEnviaPDF` int(1)   DEFAULT NULL, 
	`Vendedor2` int   DEFAULT NULL, 
	`Locador` int(1)   DEFAULT NULL, 
	`UtilizaDescontoPisCofins` int(1)   DEFAULT NULL, 
	`Latitude` varchar(20)   DEFAULT NULL, 
	`Longitude` varchar(20)   DEFAULT NULL, 
	`DiaVendedor1` int   DEFAULT NULL, 
	`DiaVendedor2` int   DEFAULT NULL, 
	`HORAINICIAL` char(8)   DEFAULT NULL, 
	`HORAFINAL` char(8)   DEFAULT NULL, 
	`IsencaoIcms` int(1)   DEFAULT NULL, 
	`DescontoST` float   DEFAULT NULL, 
	`SenhaSITE` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Cliefornec_Creditos`;
CREATE TABLE Cliefornec_Creditos (
	`CLIENTE` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`VALIDADE` datetime   DEFAULT NULL, 
	`LIMITE` float   DEFAULT NULL, 
	`AUTORIZADOEM` datetime   DEFAULT NULL, 
	`AUTORIZADOPOR` varchar(50)   DEFAULT NULL, 
	`OBSERVACAO` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_DOCUMENTOS`;
CREATE TABLE CLIEFORNEC_DOCUMENTOS (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`TipoDocumento` int   DEFAULT NULL, 
	`CaminhoArquivo` varchar(500)   DEFAULT NULL, 
	`Usuario` varchar(500)   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_ENTREGA`;
CREATE TABLE CLIEFORNEC_ENTREGA (
	`CLIENTE` int NOT NULL  , 
	`SEQ` int NOT NULL  , 
	`CEP` varchar(9)   DEFAULT NULL, 
	`ENDERECO` varchar(70)   DEFAULT NULL, 
	`BAIRRO` varchar(70)   DEFAULT NULL, 
	`CIDADE` varchar(50)   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`PaginaGuia` varchar(20)   DEFAULT NULL, 
	`LetraGuia` varchar(20)   DEFAULT NULL, 
	`LinhaGuia` varchar(20)   DEFAULT NULL, 
	`Numero` varchar(50)   DEFAULT NULL, 
	`Telefone` varchar(100)   DEFAULT NULL, 
	`ObservacaoGuia` varchar(100)   DEFAULT NULL, 
	`Contato` varchar(50)   DEFAULT NULL, 
	`Fazenda` int(1)   DEFAULT NULL, 
	`InscProdutorRural` varchar(20)   DEFAULT NULL, 
	`TipoEndereco` int   DEFAULT NULL, 
	`UsuarioObservacaoGuia` char(3)   DEFAULT NULL, 
	`CodCidade` int   DEFAULT NULL, 
	`CNPJ` varchar(18)   DEFAULT NULL, 
	`Complemento` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_ETIQUETA`;
CREATE TABLE CLIEFORNEC_ETIQUETA (
	`Sequencia` int NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`EndCobranca` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_FEEDBACK`;
CREATE TABLE CLIEFORNEC_FEEDBACK (
	`CLIENTE` int NOT NULL  , 
	`SEQ` int NOT NULL  , 
	`DIA` datetime   DEFAULT NULL, 
	`DESCRICAO` varchar(500)   DEFAULT NULL, 
	`ENCERRADO` int(1)   DEFAULT NULL, 
	`DATARETORNO` datetime   DEFAULT NULL, 
	`Usuario` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_RECLAMACAO`;
CREATE TABLE CLIEFORNEC_RECLAMACAO (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`CLIENTE` int NOT NULL  , 
	`EMISSAO` datetime   DEFAULT NULL, 
	`ATENDENTE` varchar(100)   DEFAULT NULL, 
	`RECLAMACAO` varchar(500)   DEFAULT NULL, 
	`PROVIDENCIAS` varchar(500)   DEFAULT NULL, 
	`DATAPROVIDENCIA` datetime   DEFAULT NULL, 
	`ENCERRADODIRETORIA` int(1)   DEFAULT NULL, 
	`DESCRICAODIRETORIA` varchar(50)   DEFAULT NULL, 
	`OBSERVACAODIRETORIA` varchar(500)   DEFAULT NULL, 
	`DATAATUALIZACAO_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`CONTATO` varchar(50)   DEFAULT NULL, 
	`Pedido` char(6)   DEFAULT NULL, 
	`DepartamentoAnalise` int   DEFAULT NULL, 
	`CodTipoReclamacao` int   DEFAULT NULL, 
	`Distribuido` int(1) NOT NULL  , 
	`EmAndamento` int(1) NOT NULL  , 
	`Concluido` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_RECEITA`;
CREATE TABLE CLIEFORNEC_RECEITA (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Inativo` int(1)   DEFAULT NULL, 
	`DataPesquisa` datetime   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL, 
	`CaminhoArquivo` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ConsultadoPor` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_PRODUTOS`;
CREATE TABLE CLIEFORNEC_PRODUTOS (
	`CLIENTE` int NOT NULL  , 
	`CEP` varchar(9) NOT NULL  , 
	`NUMERO` varchar(50) NOT NULL  , 
	`NUMTABELA` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`ValidadeDe` datetime   DEFAULT NULL, 
	`ValidadeAte` datetime   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`PERCDESC` float   DEFAULT NULL, 
	`VOLUME` float   DEFAULT NULL, 
	`BLOQUEADO` int(1)   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`ValorUnidade` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_RECLAMACAO_ACAO`;
CREATE TABLE CLIEFORNEC_RECLAMACAO_ACAO (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6)   DEFAULT NULL, 
	`Sequencia` int NOT NULL  , 
	`Previsao` datetime   DEFAULT NULL, 
	`Usuario` char(3)   DEFAULT NULL, 
	`Acao` varchar(500)   DEFAULT NULL, 
	`ObservacaoAcao` varchar(500)   DEFAULT NULL, 
	`AcaoConcluida` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_TRIBUTACAO`;
CREATE TABLE CLIEFORNEC_TRIBUTACAO (
	`ID_CLIEFORNEC_TRIBUTACAO` int NOT NULL  , 
	`CLIENTE` int   DEFAULT NULL, 
	`ID_TRIBUTACAO` int   DEFAULT NULL, 
	`ID_MOTIVO_DESONERACAO_ICMS` int   DEFAULT NULL, 
	`PTA` varchar(50)   DEFAULT NULL, 
	`DATA_INICIO` datetime   DEFAULT NULL, 
	`DATA_FIM` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_TELEFONE`;
CREATE TABLE CLIEFORNEC_TELEFONE (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Telefone` char(10)   DEFAULT NULL, 
	`Ramal` char(15)   DEFAULT NULL, 
	`Tipo` varchar(50)   DEFAULT NULL, 
	`Contato` varchar(100)   DEFAULT NULL, 
	`Email` varchar(255)   DEFAULT NULL, 
	`EnviaNFE` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ComposicaoCustoProdutos`;
CREATE TABLE ComposicaoCustoProdutos (
	`ITEM` int NOT NULL  , 
	`VALIDADE` datetime NOT NULL  , 
	`DescricaoTabela` varchar(70)   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`PRECOCOMPRA` float   DEFAULT NULL, 
	`BASEMVA` float   DEFAULT NULL, 
	`MVA` float   DEFAULT NULL, 
	`VLRCUSTOIMPOSTOS` float   DEFAULT NULL, 
	`FRETE` float   DEFAULT NULL, 
	`COMISSAO` float   DEFAULT NULL, 
	`AJUSTE` float   DEFAULT NULL, 
	`VLRCUSTOFINAL` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`IPI` float   DEFAULT NULL, 
	`PIS` float   DEFAULT NULL, 
	`COFINS` float   DEFAULT NULL, 
	`Seguro` float   DEFAULT NULL, 
	`OutrasDespesas` float   DEFAULT NULL, 
	`PercDesconto` float   DEFAULT NULL, 
	`Filial` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_SINTEGRA`;
CREATE TABLE CLIEFORNEC_SINTEGRA (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Status` char(20)   DEFAULT NULL, 
	`DataPesquisa` datetime   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL, 
	`CaminhoArquivo` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ConsultadoPor` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_SOCIOS`;
CREATE TABLE CLIEFORNEC_SOCIOS (
	`Cliente` int NOT NULL  , 
	`Socio` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_SPC`;
CREATE TABLE CLIEFORNEC_SPC (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DataPesquisa` datetime   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL, 
	`CaminhoArquivo` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ConsultadoPor` varchar(500)   DEFAULT NULL, 
	`Ocorrencia` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CondPagamento_SubGrupo`;
CREATE TABLE CondPagamento_SubGrupo (
	`CondPagamento` int NOT NULL  , 
	`Grupo` int NOT NULL  , 
	`SubGrupo` int NOT NULL  , 
	`Encargos` float   DEFAULT NULL, 
	`NaoPermitir` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CondPagamento_Bancos`;
CREATE TABLE CondPagamento_Bancos (
	`CondPagamento` int NOT NULL  , 
	`FILIAL` int NOT NULL  , 
	`Banco` int NOT NULL  , 
	`Nro_Conta` char(15) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Comprador`;
CREATE TABLE Comprador (
	`Codigo` numeric NOT NULL  , 
	`Nome` varchar(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CondPagamento`;
CREATE TABLE CondPagamento (
	`Codigo` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`Percentual` float   DEFAULT NULL, 
	`TipoPercentual` char(1)   DEFAULT NULL, 
	`FormaPercentual` char(1)   DEFAULT NULL, 
	`Encargos` float   DEFAULT NULL, 
	`Cliente` int(1)   DEFAULT NULL, 
	`Empregado` int(1)   DEFAULT NULL, 
	`Fornecedor` int(1)   DEFAULT NULL, 
	`TipoTitulo` int   DEFAULT NULL, 
	`CategoriaTitulo` int   DEFAULT NULL, 
	`TipoVencimento` char(1)   DEFAULT NULL, 
	`BancoReceber` int   DEFAULT NULL, 
	`Departamento` int   DEFAULT NULL, 
	`Financiamento` int(1) NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ContaContabil` char(5)   DEFAULT NULL, 
	`DepartamentoConta` int   DEFAULT NULL, 
	`SituacaoConta` int   DEFAULT NULL, 
	`SequenciaConta` int   DEFAULT NULL, 
	`ContaContabilContra` char(5)   DEFAULT NULL, 
	`DepartamentoContra` int   DEFAULT NULL, 
	`SituacaoContra` int   DEFAULT NULL, 
	`SequenciaContra` int   DEFAULT NULL, 
	`TipoJuros` char(1)   DEFAULT NULL, 
	`GeraBoleto` int(1) NOT NULL  , 
	`GeraRelCondicao` int(1) NOT NULL  , 
	`ContaCorrente` char(15)   DEFAULT NULL, 
	`ClienteEspecial` int(1)   DEFAULT NULL, 
	`TAXACARTAO` float   DEFAULT NULL, 
	`DIASCARTAO` int   DEFAULT NULL, 
	`GeraFluxoCaixa` int(1)   DEFAULT NULL, 
	`BaixaAutomatica` int(1)   DEFAULT NULL, 
	`VerificarLimite` int(1)   DEFAULT NULL, 
	`CondVencimento` char(2)   DEFAULT NULL, 
	`DiasCarencia` int   DEFAULT NULL, 
	`Consumidor` int(1)   DEFAULT NULL, 
	`taxaCartaoParc` float   DEFAULT NULL, 
	`ControlaVendaCaixa` int(1)   DEFAULT NULL, 
	`ExigeCadastros` int(1)   DEFAULT NULL, 
	`Taxa_boleto` float   DEFAULT NULL, 
	`DiasVencimentoInicial` int   DEFAULT NULL, 
	`NaoUtilizaEmVendas` int(1)   DEFAULT NULL, 
	`DiasFixoVencimento` int(1)   DEFAULT NULL, 
	`associado` int(1)   DEFAULT NULL, 
	`NaoVerificaCliente` int(1)   DEFAULT NULL, 
	`JurosComposto` int(1)   DEFAULT NULL, 
	`Palm` int(1) NOT NULL  , 
	`Grupo_Conta` int   DEFAULT NULL, 
	`Sub_Grupo` int   DEFAULT NULL, 
	`Seq_Cta_Custo` int   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL, 
	`Inativo` int(1) NOT NULL  , 
	`ValorDespesasAcessorias` float   DEFAULT NULL, 
	`AcrescimoProduto` float   DEFAULT NULL, 
	`ID_FORMA_PAGAMENTO` int   DEFAULT NULL, 
	`MaximoParcelas` int   DEFAULT NULL, 
	`PercAcrescimoDia` float   DEFAULT NULL, 
	`NaoBloqueiaCliente` int(1)   DEFAULT NULL, 
	`PermiteBoleto` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ComunicacaoInterna`;
CREATE TABLE ComunicacaoInterna (
	`Numero` numeric NOT NULL  , 
	`Departamento` int NOT NULL  , 
	`para` varchar(50)   DEFAULT NULL, 
	`texto` varchar(3000)   DEFAULT NULL, 
	`data` datetime   DEFAULT NULL, 
	`responsavel` varchar(50)   DEFAULT NULL, 
	`status` char(1)   DEFAULT NULL, 
	`Impressa` int(1) NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CondPagamento_Contas`;
CREATE TABLE CondPagamento_Contas (
	`CondPagamento` int NOT NULL  , 
	`FILIAL` int NOT NULL  , 
	`ContaContabil` int NOT NULL  , 
	`ContraPartida` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CondPagamento_Vencimentos`;
CREATE TABLE CondPagamento_Vencimentos (
	`Condicao` int NOT NULL  , 
	`Sequencia` numeric NOT NULL  , 
	`dias` numeric   DEFAULT NULL, 
	`VencimentoFixo` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CONTATO_SITE`;
CREATE TABLE CONTATO_SITE (
	`ID_CONTATO_SITE` int NOT NULL  , 
	`DT_CONTATO` datetime   DEFAULT NULL, 
	`NOME_CONTATO` varchar(500)   DEFAULT NULL, 
	`EMAIL_CONTATO` varchar(500)   DEFAULT NULL, 
	`TELEFONE_CONTATO` varchar(500)   DEFAULT NULL, 
	`ASSUNTO_CONTATO` varchar(500)   DEFAULT NULL, 
	`MENSAGEM_CONTATO` varchar(4000)   DEFAULT NULL, 
	`LOTEAMENTO_CONTATO` varchar(500)   DEFAULT NULL, 
	`LOTE_CONTATO` varchar(500)   DEFAULT NULL, 
	`DS_RETORNO` varchar(4000)   DEFAULT NULL, 
	`DS_EMAIL_RETORNO` varchar(500)   DEFAULT NULL, 
	`DT_RETORNO` datetime   DEFAULT NULL, 
	`FLAG_RETORNO` int(1) NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpgdup_pagar`;
CREATE TABLE cpgdup_pagar (
	`FILIAL` int NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`DUPLICATA` varchar(9) NOT NULL  , 
	`SERIE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpgitens_dup`;
CREATE TABLE cpgitens_dup (
	`FILIAL` int NOT NULL  , 
	`DUPLICATA` varchar(9) NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`SEQUENCIA` varchar(10) NOT NULL  , 
	`BANCO` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR_DUPLIC` float   DEFAULT NULL, 
	`DATA_PAGAMENTO` datetime   DEFAULT NULL, 
	`NUM_LANC` int   DEFAULT NULL, 
	`JUROS` float   DEFAULT NULL, 
	`DESCONTO` float   DEFAULT NULL, 
	`OBSERVACAO` varchar(1000)   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`FilialBaixa` int   DEFAULT NULL, 
	`NRO_CONTA` char(15)   DEFAULT NULL, 
	`TransmitidoContab` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ValorCorreto` float   DEFAULT NULL, 
	`Bloqueado_Pagamento` int(1)   DEFAULT NULL, 
	`Provisao` int(1)   DEFAULT NULL, 
	`n_controle` int   DEFAULT NULL, 
	`Dias` int   DEFAULT NULL, 
	`Programacao` datetime   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpgnf_contas`;
CREATE TABLE cpgnf_contas (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(15) NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`DESCRICAO` char(200)   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cotacaoitens`;
CREATE TABLE cotacaoitens (
	`Filial` int NOT NULL  , 
	`Cotacao` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Item` int   DEFAULT NULL, 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`Tipo` int(1)   DEFAULT NULL, 
	`Fornecedor` int   DEFAULT NULL, 
	`OrdemCompra` int   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`ComplementoProduto` varchar(255)   DEFAULT NULL, 
	`ID_COTACAO_ITENS` int NOT NULL  , 
	`ID_SOLICITACAO_COMPRA_ITENS` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CPGNF_PAGAR_DEPRECIACAO`;
CREATE TABLE CPGNF_PAGAR_DEPRECIACAO (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(15) NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`sequencia` int NOT NULL  , 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`Grupo_conta` int   DEFAULT NULL, 
	`sub_grupo` int   DEFAULT NULL, 
	`seq_cta_custo` int   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cprdup_receber`;
CREATE TABLE cprdup_receber (
	`Filial` int NOT NULL  , 
	`SERIE` char(3) NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`Cliente` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpgnf_dup`;
CREATE TABLE cpgnf_dup (
	`FILIAL` int NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`NOTA_FISCAL` char(15) NOT NULL  , 
	`DUPLICATA` varchar(9) NOT NULL  , 
	`SERIE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CPRITENS_DUP_IMPRESSAO`;
CREATE TABLE CPRITENS_DUP_IMPRESSAO (
	`SERIE` char(3) NOT NULL  , 
	`Filial` int NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`SEQUENCIA` varchar(9) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR_DUPLIC` float   DEFAULT NULL, 
	`DATA_PAGAMENTO` datetime   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`Desconto` float   DEFAULT NULL, 
	`FlagCredito` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpgnf_pagar`;
CREATE TABLE cpgnf_pagar (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(15) NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`ESPECIE` int   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`Encargos` float   DEFAULT NULL, 
	`LANCAMENTO` datetime   DEFAULT NULL, 
	`DESDOBRA` char(1)   DEFAULT NULL, 
	`observacao` varchar(1000)   DEFAULT NULL, 
	`ContaContabil` varchar(5)   DEFAULT NULL, 
	`Departamento` int   DEFAULT NULL, 
	`Situacao` int   DEFAULT NULL, 
	`Sequencia` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ParcelasDepreciacao` int(1)   DEFAULT NULL, 
	`Competencia` datetime   DEFAULT NULL, 
	`TipoPrazoPagar` int   DEFAULT NULL, 
	`Bloquear` int(1)   DEFAULT NULL, 
	`Banco` int   DEFAULT NULL, 
	`DataCompetencia` char(7)   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL, 
	`RateioCCUsto` int   DEFAULT NULL, 
	`EmissaoFornec` datetime   DEFAULT NULL, 
	`OrdemCompra` varchar(15)   DEFAULT NULL, 
	`LongoPrazo` int(1)   DEFAULT NULL, 
	`Apelido` varchar(15)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpritens_dup`;
CREATE TABLE cpritens_dup (
	`SERIE` char(3) NOT NULL  , 
	`Filial` int NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`SEQUENCIA` varchar(9) NOT NULL  , 
	`Cliente` char(6)   DEFAULT NULL, 
	`BANCO` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR_DUPLIC` float   DEFAULT NULL, 
	`DATA_PAGAMENTO` datetime   DEFAULT NULL, 
	`JUROS` float   DEFAULT NULL, 
	`DESCONTO` float   DEFAULT NULL, 
	`OBSERVACAO` text(2147483647)   DEFAULT NULL, 
	`TITULO` varchar(6)   DEFAULT NULL, 
	`BOLETO` varchar(15)   DEFAULT NULL, 
	`OBSERVACAOBOLETO1` varchar(84)   DEFAULT NULL, 
	`OBSERVACAOBOLETO2` varchar(84)   DEFAULT NULL, 
	`OBSERVACAOBOLETO3` varchar(84)   DEFAULT NULL, 
	`OBSERVACAOBOLETO4` varchar(84)   DEFAULT NULL, 
	`IMPRESSAO` int(1)   DEFAULT NULL, 
	`FilialBaixa` int   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`NRO_CONTA` char(15)   DEFAULT NULL, 
	`ContaContabilPagar` char(5)   DEFAULT NULL, 
	`TransmitidoContab` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Cupom` varchar(6)   DEFAULT NULL, 
	`Troca` varchar(6)   DEFAULT NULL, 
	`VencTroca` datetime   DEFAULT NULL, 
	`TipoRecebimento` int   DEFAULT NULL, 
	`DuplicataBanco` int(1)   DEFAULT NULL, 
	`fazenda` int   DEFAULT NULL, 
	`DuplicataGarantida` int(1)   DEFAULT NULL, 
	`CondPagamento` int   DEFAULT NULL, 
	`DataEstorno` datetime   DEFAULT NULL, 
	`RemessaBoleto` int(1)   DEFAULT NULL, 
	`DocumentoRemessa` varchar(6)   DEFAULT NULL, 
	`CodBarras` varchar(44)   DEFAULT NULL, 
	`LinhaDigitavel` varchar(62)   DEFAULT NULL, 
	`ArqRemessa` varchar(8)   DEFAULT NULL, 
	`TipoBoleto` char(1)   DEFAULT NULL, 
	`HistoricoCobranca` varchar(500)   DEFAULT NULL, 
	`DataHistoricoCobranca` datetime   DEFAULT NULL, 
	`Programacao` datetime   DEFAULT NULL, 
	`NossoNumero` char(11)   DEFAULT NULL, 
	`Financiamento` int(1)   DEFAULT NULL, 
	`Loteamento` int   DEFAULT NULL, 
	`ParcEntrada` int(1)   DEFAULT NULL, 
	`VencimentoOriginal` datetime   DEFAULT NULL, 
	`ValorOriginal` float   DEFAULT NULL, 
	`Cartorio` int(1)   DEFAULT NULL, 
	`DocumentoVendaLote` varchar(6)   DEFAULT NULL, 
	`DataReajuste` datetime   DEFAULT NULL, 
	`HoraReajuste` char(8)   DEFAULT NULL, 
	`UsuarioReajuste` varchar(3)   DEFAULT NULL, 
	`ValorAnterior` float   DEFAULT NULL, 
	`TaxaReajuste` float   DEFAULT NULL, 
	`FECHAMENTO` varchar(6)   DEFAULT NULL, 
	`RemessaSantander` int(1) NOT NULL  , 
	`ClienteBoleto` int   DEFAULT NULL, 
	`NumSeqAgrupado` int   DEFAULT NULL, 
	`ObservacaoBoleto` varchar(200)   DEFAULT NULL, 
	`VencimentoRetorno` datetime   DEFAULT NULL, 
	`OcorrenciaRetorno` int   DEFAULT NULL, 
	`DataOcorrenciaRetorno` datetime   DEFAULT NULL, 
	`JurosRetorno` float   DEFAULT NULL, 
	`DescontoRetorno` float   DEFAULT NULL, 
	`TotalRecebidoRetorno` float   DEFAULT NULL, 
	`SeuNumero` varchar(10)   DEFAULT NULL, 
	`ObservacaoBoletoAutomatica` varchar(8000)   DEFAULT NULL, 
	`Insolventes` int(1)   DEFAULT NULL, 
	`DataBaixaAviso` datetime   DEFAULT NULL, 
	`UsuarioBaixaAviso` char(3)   DEFAULT NULL, 
	`DataEntradaBanco` datetime   DEFAULT NULL, 
	`MotivoRejeicoesRetorno` varchar(50)   DEFAULT NULL, 
	`DataLembrete1` datetime   DEFAULT NULL, 
	`DataLembrete2` datetime   DEFAULT NULL, 
	`RemessaSafra` int   DEFAULT NULL, 
	`RemessaItau` int   DEFAULT NULL, 
	`ValorCorrecao` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Cpritens_dup_NotaFiscal`;
CREATE TABLE Cpritens_dup_NotaFiscal (
	`SERIE` char(3) NOT NULL  , 
	`Filial` int NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`SEQUENCIA` varchar(9) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR_DUPLIC` float   DEFAULT NULL, 
	`FlagCredito` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpritens_dup_Motivos`;
CREATE TABLE cpritens_dup_Motivos (
	`FILIAL` int NOT NULL  , 
	`SERIE` char(3) NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`SEQUENCIA` varchar(5) NOT NULL  , 
	`SeqMotivo` int NOT NULL  , 
	`Valor_Duplic` float   DEFAULT NULL, 
	`VencimentoAnterior` datetime   DEFAULT NULL, 
	`NovoVencimento` datetime   DEFAULT NULL, 
	`MotivoVenc` varchar(255)   DEFAULT NULL, 
	`DescontoAnterior` float   DEFAULT NULL, 
	`NovoDesconto` float   DEFAULT NULL, 
	`MotivoDesc` varchar(255)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CUPOM_FISCAL`;
CREATE TABLE CUPOM_FISCAL (
	`ID_CUPOM_FISCAL` int NOT NULL  , 
	`FILIAL` int NOT NULL  , 
	`CAIXA` int   DEFAULT NULL, 
	`MODELO` char(20)   DEFAULT NULL, 
	`NUMERO_SERIE` varchar(20)   DEFAULT NULL, 
	`CAMINHO` varchar(255)   DEFAULT NULL, 
	`MFD` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cpritens_dup_Ocorrencia`;
CREATE TABLE cpritens_dup_Ocorrencia (
	`SERIE` char(3) NOT NULL  , 
	`FILIAL` int NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`SEQUENCIADUP` varchar(9) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DataOcorrencia` datetime   DEFAULT NULL, 
	`Ocorrencia` varchar(500)   DEFAULT NULL, 
	`LancadoPor` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `DIFAL`;
CREATE TABLE DIFAL (
	`ID_DIFAL` int NOT NULL  , 
	`ESTADO` char(2)   DEFAULT NULL, 
	`ANO` int   DEFAULT NULL, 
	`UF_DESTINO` float   DEFAULT NULL, 
	`UF_ORIGEM` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cprnf_dup`;
CREATE TABLE cprnf_dup (
	`Filial` int NOT NULL  , 
	`SERIE` char(3) NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`NOTA_FISCAL` char(6) NOT NULL  , 
	`cliente` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ENTRADA_DE_MOVIMENTACAO`;
CREATE TABLE ENTRADA_DE_MOVIMENTACAO (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(10) NOT NULL  , 
	`FORNEC` varchar(18) NOT NULL  , 
	`CODIGO` int   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL, 
	`DATA_EMISSAO` datetime   DEFAULT NULL, 
	`DATA_MOVIMENTO` datetime   DEFAULT NULL, 
	`CodNatureza` numeric   DEFAULT NULL, 
	`NATUREZA` varchar(6)   DEFAULT NULL, 
	`TOTAL_NOTA` float   DEFAULT NULL, 
	`TOTAL_ITENS` float   DEFAULT NULL, 
	`TOTAL_DESCONTO` float   DEFAULT NULL, 
	`OBSERVACAO` varchar(1000)   DEFAULT NULL, 
	`VALOR_IPI` float   DEFAULT NULL, 
	`VALOR_ICMS` float   DEFAULT NULL, 
	`VALOR_ISS` float   DEFAULT NULL, 
	`BASE_IPI` float   DEFAULT NULL, 
	`BASE_ICMS` float   DEFAULT NULL, 
	`BASE_ISS` float   DEFAULT NULL, 
	`ALIQUOTA_IPI` float   DEFAULT NULL, 
	`ALIQUOTA_ICMS` float   DEFAULT NULL, 
	`ALIQUOTA_ISS` float   DEFAULT NULL, 
	`VALOR_DIFERENCA_ICMS` float   DEFAULT NULL, 
	`BASE_DIFERENCA_ICMS` float   DEFAULT NULL, 
	`ALIQUOTA_DIFERENCA_ICMS` float   DEFAULT NULL, 
	`ENCERRADO` int(1) NOT NULL  , 
	`CENTRO_CUSTO` int   DEFAULT NULL, 
	`TIPO_DE_MOVIMENTO` char(1) NOT NULL  , 
	`COD_MOVIMENTO` int   DEFAULT NULL, 
	`COND_PAGAMENTO` tinyint   DEFAULT NULL, 
	`ESPECIE` char(3)   DEFAULT NULL, 
	`VALOR_PAGAR` float   DEFAULT NULL, 
	`VALOR_FRETE` float   DEFAULT NULL, 
	`INCIDEBASEFRETE` int(1) NOT NULL  , 
	`INCIDEBASEIPIFRETE` int(1) NOT NULL  , 
	`DIF_ALIQUOTA` float   DEFAULT NULL, 
	`VALOR_INSS` float   DEFAULT NULL, 
	`SEGURO` float   DEFAULT NULL, 
	`ICMSSUBSTITUICAO` float   DEFAULT NULL, 
	`VALOR_IRRF` float   DEFAULT NULL, 
	`CONTA_CONTABIL` varchar(14)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`OrdemCompra` numeric   DEFAULT NULL, 
	`TransmitidoCP` int(1) NOT NULL  , 
	`TransmitidoLF` int(1) NOT NULL  , 
	`duplicata` varchar(8)   DEFAULT NULL, 
	`Parcelas` numeric   DEFAULT NULL, 
	`ImpostosemCredito` float   DEFAULT NULL, 
	`ContaCredito` char(5)   DEFAULT NULL, 
	`ContaDebito` char(5)   DEFAULT NULL, 
	`isentas` float   DEFAULT NULL, 
	`diferida` float   DEFAULT NULL, 
	`substituicao` float   DEFAULT NULL, 
	`suspensa` float   DEFAULT NULL, 
	`nao_tributadas` float   DEFAULT NULL, 
	`outras` float   DEFAULT NULL, 
	`DescontoBaseReduzida` float   DEFAULT NULL, 
	`ParcelaBaseCalculoReduzida` float   DEFAULT NULL, 
	`NUMERO_NOTA` char(6)   DEFAULT NULL, 
	`GeraDescontoBaseReduzida` int(1) NOT NULL  , 
	`Encargo_Produtos` float   DEFAULT NULL, 
	`Fazenda` numeric   DEFAULT NULL, 
	`SOLICITANTE` varchar(50)   DEFAULT NULL, 
	`MOV_ALMOXARIFADO` int(1) NOT NULL  , 
	`INCIDEBASESEGURO` int(1) NOT NULL  , 
	`DESCONTORATEIO` float   DEFAULT NULL, 
	`GERARVALORESFRETE` int(1)   DEFAULT NULL, 
	`REQUISICAO` varchar(6)   DEFAULT NULL, 
	`DIASPRAZO` int   DEFAULT NULL, 
	`DocumentoFrete` char(10)   DEFAULT NULL, 
	`VencimentoFrete` datetime   DEFAULT NULL, 
	`ValorValeFrete` float   DEFAULT NULL, 
	`FornecedorFrete` int   DEFAULT NULL, 
	`ObservacaoFrete` varchar(300)   DEFAULT NULL, 
	`DiasFrete` int   DEFAULT NULL, 
	`SubstituicaoNaoDestacado` int(1)   DEFAULT NULL, 
	`CalculoAutomaticoIcms` int(1)   DEFAULT NULL, 
	`TipoEntrada` char(2)   DEFAULT NULL, 
	`BaseSubstituicao` float   DEFAULT NULL, 
	`NOTA_VENDA` char(6)   DEFAULT NULL, 
	`NOTA_VENDASERIE` char(3)   DEFAULT NULL, 
	`NF_RECEBER` char(10)   DEFAULT NULL, 
	`PEDIDO` char(6)   DEFAULT NULL, 
	`PercPIS` float   DEFAULT NULL, 
	`PercCOFINS` float   DEFAULT NULL, 
	`Modelo` int   DEFAULT NULL, 
	`ChaveNFe` char(44)   DEFAULT NULL, 
	`BasePIS` float   DEFAULT NULL, 
	`ValorPIS` float   DEFAULT NULL, 
	`BaseCOFINS` float   DEFAULT NULL, 
	`ValorCOFINS` float   DEFAULT NULL, 
	`IncideBaseDespesa` int(1)   DEFAULT NULL, 
	`ObservacaoLancamento` varchar(500)   DEFAULT NULL, 
	`RateioDesconto` int(1)   DEFAULT NULL, 
	`SetorAlmoxarifado` int   DEFAULT NULL, 
	`TipoAlmoxarifado` int   DEFAULT NULL, 
	`BaseSTRet` float   DEFAULT NULL, 
	`ValorSTRet` float   DEFAULT NULL, 
	`BaseICMSOP` float   DEFAULT NULL, 
	`ValorICMSOP` float   DEFAULT NULL, 
	`FilialAlmoxarifado` int   DEFAULT NULL, 
	`NFAlmoxarifado` char(10)   DEFAULT NULL, 
	`FornecAlmoxarifado` varchar(18)   DEFAULT NULL, 
	`SerieAlmoxarifado` char(3)   DEFAULT NULL, 
	`GrupoCC` int   DEFAULT NULL, 
	`SubGrupoCC` int   DEFAULT NULL, 
	`SequenciaCC` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `dtproperties`;
CREATE TABLE dtproperties (
	`id` int NOT NULL  , 
	`objectid` int   DEFAULT NULL, 
	`property` varchar(64) NOT NULL  , 
	`value` varchar(255)   DEFAULT NULL, 
	`uvalue` varchar(255)   DEFAULT NULL, 
	`lvalue` varchar(2147483647)   DEFAULT NULL, 
	`version` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ENTRADA_DE_MOVIMENTACAO_CTACUSTO`;
CREATE TABLE ENTRADA_DE_MOVIMENTACAO_CTACUSTO (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(8) NOT NULL  , 
	`FORNEC` varchar(18) NOT NULL  , 
	`CODIGO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`DESCRICAO` char(200)   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`TIPO_DE_MOVIMENTO` char(1)   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ENTRADA_DE_MOVIMENTACAO_ITENS`;
CREATE TABLE ENTRADA_DE_MOVIMENTACAO_ITENS (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(10) NOT NULL  , 
	`FORNEC` varchar(18) NOT NULL  , 
	`MOVIM_ITEM` int NOT NULL  , 
	`CODIGO` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`VALOR_IPI` float   DEFAULT NULL, 
	`VALOR_ICMS` float   DEFAULT NULL, 
	`VALOR_iss` float   DEFAULT NULL, 
	`VALOR_DESCONTO` float   DEFAULT NULL, 
	`ALIQUOTA_ICMS` float   DEFAULT NULL, 
	`ALIQUOTA_IPI` float   DEFAULT NULL, 
	`BASE_ICMS` float   DEFAULT NULL, 
	`BASE_IPI` float   DEFAULT NULL, 
	`TAXA_DESC` float   DEFAULT NULL, 
	`isentas` float   DEFAULT NULL, 
	`diferida` float   DEFAULT NULL, 
	`substituicao` float   DEFAULT NULL, 
	`suspensa` float   DEFAULT NULL, 
	`nao_tributadas` float   DEFAULT NULL, 
	`outras` float   DEFAULT NULL, 
	`DescontoBaseReduzida` float   DEFAULT NULL, 
	`ParcelaBaseCalculoReduzida` float   DEFAULT NULL, 
	`NUMERO_NOTA` char(6)   DEFAULT NULL, 
	`Estoque_Anterior` float   DEFAULT NULL, 
	`Estoque_Atual` float   DEFAULT NULL, 
	`Estoque_AtualMedio` float   DEFAULT NULL, 
	`Preco_Medio` float   DEFAULT NULL, 
	`Valor_Anterior` float   DEFAULT NULL, 
	`Valor_Atual` float   DEFAULT NULL, 
	`Processado` int(1) NOT NULL  , 
	`Valor_Unitario_Atual` float   DEFAULT NULL, 
	`Valor_UltimaCompra` float   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`SUB_GRUPOCONTA` int   DEFAULT NULL, 
	`Final_Mes` int(1)   DEFAULT NULL, 
	`QuantidadeInformada` float   DEFAULT NULL, 
	`Unidade` varchar(3)   DEFAULT NULL, 
	`Credita_Ipi_Icms` int(1)   DEFAULT NULL, 
	`ICMS_SUBSTITUICAO` float   DEFAULT NULL, 
	`CodNatureza` int   DEFAULT NULL, 
	`Natureza` varchar(6)   DEFAULT NULL, 
	`BaseST` float   DEFAULT NULL, 
	`ValorST` float   DEFAULT NULL, 
	`KIT` char(2)   DEFAULT NULL, 
	`Valor_Venda` float   DEFAULT NULL, 
	`BasePIS` float   DEFAULT NULL, 
	`ValorPIS` float   DEFAULT NULL, 
	`BaseCOFINS` float   DEFAULT NULL, 
	`ValorCOFINS` float   DEFAULT NULL, 
	`CST_IPI` char(2)   DEFAULT NULL, 
	`CST_PIS_COFINS` char(2)   DEFAULT NULL, 
	`TIPO_DE_MOVIMENTO` char(1)   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL, 
	`Frete` float   DEFAULT NULL, 
	`Seguro` float   DEFAULT NULL, 
	`OutrasDespesas` float   DEFAULT NULL, 
	`CST_ICMS` char(3)   DEFAULT NULL, 
	`BaseSTRet` float   DEFAULT NULL, 
	`ValorSTRet` float   DEFAULT NULL, 
	`BaseICMSOP` float   DEFAULT NULL, 
	`ValorICMSOP` float   DEFAULT NULL, 
	`CodigoProdutoNF` int   DEFAULT NULL, 
	`FilialOC` int   DEFAULT NULL, 
	`OrdemCompra` int   DEFAULT NULL, 
	`SequenciaItemOC` int   DEFAULT NULL, 
	`RateioDesconto` float   DEFAULT NULL, 
	`Preco_medio_Bruto` float   DEFAULT NULL, 
	`Valor_Atual_Bruto` float   DEFAULT NULL, 
	`Observacao` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ENTRADA_DE_MOVIMENTACAO_ORDENSCOMPRA`;
CREATE TABLE ENTRADA_DE_MOVIMENTACAO_ORDENSCOMPRA (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(12) NOT NULL  , 
	`FORNEC` varchar(18) NOT NULL  , 
	`SERIE` char(3) NOT NULL  , 
	`CODIGO` int NOT NULL  , 
	`OrdemCompra` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ESTADOS`;
CREATE TABLE ESTADOS (
	`ESTADO` varchar(2) NOT NULL  , 
	`DESCRICAO` varchar(30)   DEFAULT NULL, 
	`TRIBUTA_ICMS` int(1)   DEFAULT NULL, 
	`TRIBUTA_ISS` int(1)   DEFAULT NULL, 
	`ICMS_INCLUSO` int(1)   DEFAULT NULL, 
	`ISS_INCLUSO` int(1)   DEFAULT NULL, 
	`CODIGO_FISCAL` varchar(3)   DEFAULT NULL, 
	`TAXA_ISS` float   DEFAULT NULL, 
	`aliquota_icms` smallint   DEFAULT NULL, 
	`TransmissaoDialUp` char(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`CodigoIBGE` int   DEFAULT NULL, 
	`AliquotaInterna` int   DEFAULT NULL, 
	`FCP` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ENTRADA_DE_MOVIMENTACAO_SERVICOS`;
CREATE TABLE ENTRADA_DE_MOVIMENTACAO_SERVICOS (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(10) NOT NULL  , 
	`FORNEC` varchar(18) NOT NULL  , 
	`CODIGO` int   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL, 
	`ChaveNFe` varchar(60)   DEFAULT NULL, 
	`Valor_Contabil` float   DEFAULT NULL, 
	`Valor_Liquido` float   DEFAULT NULL, 
	`BasePIS` float   DEFAULT NULL, 
	`ValorPIS` float   DEFAULT NULL, 
	`ValorPISRet` float   DEFAULT NULL, 
	`BaseCOFINS` float   DEFAULT NULL, 
	`ValorCOFINS` float   DEFAULT NULL, 
	`ValorCOFINSRet` float   DEFAULT NULL, 
	`ValorINSS` float   DEFAULT NULL, 
	`ValorCSLL` float   DEFAULT NULL, 
	`ValorISS` float   DEFAULT NULL, 
	`ValorISSRet` float   DEFAULT NULL, 
	`AliquotaPIS` float   DEFAULT NULL, 
	`AliquotaCOFINS` float   DEFAULT NULL, 
	`BCCredito` char(2)   DEFAULT NULL, 
	`TipoCredito` int   DEFAULT NULL, 
	`ValorIRRF` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Estados_CruzamentoAliquotas`;
CREATE TABLE Estados_CruzamentoAliquotas (
	`Codigo` int NOT NULL  , 
	`EstOrigem` char(2)   DEFAULT NULL, 
	`EstDestino` char(2)   DEFAULT NULL, 
	`Aliquota` float   DEFAULT NULL, 
	`Numero` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Especie`;
CREATE TABLE Especie (
	`ESPECIE` numeric NOT NULL  , 
	`descricao` char(50)   DEFAULT NULL, 
	`OPERACAO` char(1)   DEFAULT NULL, 
	`Envia_Contab` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Gera_Saldo_Capital` int(1)   DEFAULT NULL, 
	`DespesaExtraEmpresa` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ESTitens_dup`;
CREATE TABLE ESTitens_dup (
	`FILIAL` int NOT NULL  , 
	`DUPLICATA` varchar(8) NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`SEQUENCIA` varchar(5) NOT NULL  , 
	`BANCO` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR_DUPLIC` float   DEFAULT NULL, 
	`DATA_PAGAMENTO` datetime   DEFAULT NULL, 
	`NUM_LANC` int   DEFAULT NULL, 
	`JUROS` float   DEFAULT NULL, 
	`DESCONTO` float   DEFAULT NULL, 
	`OBSERVACAO` varchar(50)   DEFAULT NULL, 
	`TIPO_DE_MOVIMENTO` char(1)   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Faturamento_Inicial`;
CREATE TABLE Faturamento_Inicial (
	`Filial` int NOT NULL  , 
	`Mes` int NOT NULL  , 
	`Ano` int NOT NULL  , 
	`Grupo` int NOT NULL  , 
	`Peso` float   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `FILIAL_CNAE`;
CREATE TABLE FILIAL_CNAE (
	`FILIAL` int NOT NULL  , 
	`Seq` int NOT NULL  , 
	`CNAE` varchar(10)   DEFAULT NULL, 
	`Descricao` varchar(300)   DEFAULT NULL, 
	`Padrao` int(1)   DEFAULT NULL, 
	`ItemListaServico` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Fazendas`;
CREATE TABLE Fazendas (
	`Codigo` numeric NOT NULL  , 
	`Associado` int NOT NULL  , 
	`Inscricao` char(20)   DEFAULT NULL, 
	`Nome` char(50)   DEFAULT NULL, 
	`Endereco` char(60)   DEFAULT NULL, 
	`Bairro` char(20)   DEFAULT NULL, 
	`Cidade` char(40)   DEFAULT NULL, 
	`CEP` char(9)   DEFAULT NULL, 
	`Estado` char(2)   DEFAULT NULL, 
	`Telefone` char(20)   DEFAULT NULL, 
	`AreaTotal` float   DEFAULT NULL, 
	`AreaProducao` float   DEFAULT NULL, 
	`CafePersonalizado` int(1) NOT NULL  , 
	`Funrural` int(1) NOT NULL  , 
	`Regiao` char(10)   DEFAULT NULL, 
	`Status` int(1) NOT NULL  , 
	`VencimentoInscricao` datetime   DEFAULT NULL, 
	`Observacao` char(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` datetime   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Numero` varchar(50)   DEFAULT NULL, 
	`Complemento` varchar(30)   DEFAULT NULL, 
	`CodCidade` int   DEFAULT NULL, 
	`CodPais` int   DEFAULT NULL, 
	`InscricaoProdutor` char(20)   DEFAULT NULL, 
	`Vendedor` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `FechamentoFaturamento`;
CREATE TABLE FechamentoFaturamento (
	`sEQUENCIA` int NOT NULL  , 
	`Filial` int   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL, 
	`NotaFiscal` char(6)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`RazaoSocial` varchar(100)   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Duplicata` varchar(10)   DEFAULT NULL, 
	`SequenciaDup` varchar(10)   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`Data_Pagamento` datetime   DEFAULT NULL, 
	`Valor_duplic` float   DEFAULT NULL, 
	`Juros` float   DEFAULT NULL, 
	`Descontos` float   DEFAULT NULL, 
	`Recibobaixa` int   DEFAULT NULL, 
	`Obserrvacao` varchar(200)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ESTOQUE_VENDA_FUTURA`;
CREATE TABLE ESTOQUE_VENDA_FUTURA (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`Fazenda` numeric   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`DataSaida` datetime   DEFAULT NULL, 
	`TotalNota` float   DEFAULT NULL, 
	`TipoNotaFiscal` char(1) NOT NULL  , 
	`CondPagamento` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` numeric   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`BaseIcms` float   DEFAULT NULL, 
	`AliquotaIcms` float   DEFAULT NULL, 
	`ValorIcms` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Remessa` char(6)   DEFAULT NULL, 
	`Encerrado` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `FILIAL`;
CREATE TABLE FILIAL (
	`FILIAL` int NOT NULL  , 
	`DESCRICAO` varchar(70)   DEFAULT NULL, 
	`DESCRICAOPED` varchar(70)   DEFAULT NULL, 
	`PORTARECEITUARIO` char(40)   DEFAULT NULL, 
	`PORTANOTA` char(40)   DEFAULT NULL, 
	`PORTACHEQUE` char(40)   DEFAULT NULL, 
	`CONTADOR` varchar(50)   DEFAULT NULL, 
	`ENDERECO` varchar(50)   DEFAULT NULL, 
	`NUMERO` varchar(10)   DEFAULT NULL, 
	`CIDADE` char(50)   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`BAIRRO` varchar(30)   DEFAULT NULL, 
	`FONE` varchar(50)   DEFAULT NULL, 
	`CEP` varchar(12)   DEFAULT NULL, 
	`RAMO` varchar(1)   DEFAULT NULL, 
	`COD_ATIVIDADE` varchar(10)   DEFAULT NULL, 
	`CGC` varchar(20)   DEFAULT NULL, 
	`INSCRICAO` varchar(20)   DEFAULT NULL, 
	`DATA_BASE` varchar(7)   DEFAULT NULL, 
	`MES_ANO` varchar(7)   DEFAULT NULL, 
	`N_LIVRO_ENTRADA` int   DEFAULT NULL, 
	`N_PAG_ENTRADA` int   DEFAULT NULL, 
	`N_LIVRO_SAIDA` int   DEFAULT NULL, 
	`N_PAG_SAIDA` int   DEFAULT NULL, 
	`N_LIVRO_APURACAO` int   DEFAULT NULL, 
	`N_PAG_APURACAO` int   DEFAULT NULL, 
	`SL_CREDOR_ICMS` float   DEFAULT NULL, 
	`OLEO_DIESEL` int(1) NOT NULL  , 
	`PERC_IMPOSTO` int   DEFAULT NULL, 
	`crc` varchar(30)   DEFAULT NULL, 
	`marca` varchar(20)   DEFAULT NULL, 
	`modelo` varchar(20)   DEFAULT NULL, 
	`meio_magnetico` varchar(10)   DEFAULT NULL, 
	`midia` varchar(10)   DEFAULT NULL, 
	`bloco` varchar(10)   DEFAULT NULL, 
	`densidade` varchar(10)   DEFAULT NULL, 
	`informante` varchar(28)   DEFAULT NULL, 
	`fone_contato` numeric   DEFAULT NULL, 
	`responsavel` varchar(40)   DEFAULT NULL, 
	`tipo_empresa` char(2)   DEFAULT NULL, 
	`arq_magnetico` char(2)   DEFAULT NULL, 
	`cod_fin` char(1)   DEFAULT NULL, 
	`tipo_c` char(2)   DEFAULT NULL, 
	`cod_conv` char(1)   DEFAULT NULL, 
	`cod_ident` char(1)   DEFAULT NULL, 
	`apresentacao` int(1) NOT NULL  , 
	`dt_inicial_ped` datetime   DEFAULT NULL, 
	`dt_final_ped` datetime   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ContaCaixa` char(10)   DEFAULT NULL, 
	`BancoCaixa` int   DEFAULT NULL, 
	`GrupoCaixa` int   DEFAULT NULL, 
	`SubGrupoCaixa` int   DEFAULT NULL, 
	`SequenciaContaCaixa` int   DEFAULT NULL, 
	`MICROGERAIS` int(1) NOT NULL  , 
	`GERAPRODUTOS` int(1) NOT NULL  , 
	`GrupoCaixaBaixa` int   DEFAULT NULL, 
	`SubGrupoCaixaBaixa` int   DEFAULT NULL, 
	`SequenciaContaCaixaBaixa` int   DEFAULT NULL, 
	`CLIENTE` numeric   DEFAULT NULL, 
	`Cliente_Armazem` numeric   DEFAULT NULL, 
	`ContaContabilContraEstoque` char(5)   DEFAULT NULL, 
	`DepartamentoContraEstoque` int   DEFAULT NULL, 
	`SituacaoContraEstoque` int   DEFAULT NULL, 
	`SequenciaContraEstoque` int   DEFAULT NULL, 
	`ContaContabilEntrada` char(5)   DEFAULT NULL, 
	`DepartamentoEntrada` int   DEFAULT NULL, 
	`SituacaoEntrada` int   DEFAULT NULL, 
	`SequenciaEntrada` int   DEFAULT NULL, 
	`Lote_Livros_Entrada_de` int   DEFAULT NULL, 
	`Lote_Livros_Entrada_Ate` int   DEFAULT NULL, 
	`Lote_Livros_Saida_de` int   DEFAULT NULL, 
	`Lote_Livros_Saida_Ate` int   DEFAULT NULL, 
	`Lote_ContasPagar_de` int   DEFAULT NULL, 
	`Lote_ContasPagar_Ate` int   DEFAULT NULL, 
	`Lote_Bancario_de` int   DEFAULT NULL, 
	`Lote_Bancario_Ate` int   DEFAULT NULL, 
	`Lote_ContasReceber_de` int   DEFAULT NULL, 
	`Lote_ContasReceber_Ate` int   DEFAULT NULL, 
	`Lote_Receber_Lanc_De` int   DEFAULT NULL, 
	`Lote_Receber_Lanc_ate` int   DEFAULT NULL, 
	`Lote_Pagar_Lanc_De` int   DEFAULT NULL, 
	`Lote_Pagar_Lanc_ate` int   DEFAULT NULL, 
	`EC` varchar(20)   DEFAULT NULL, 
	`REGISTROIMA` varchar(20)   DEFAULT NULL, 
	`FAX` char(10)   DEFAULT NULL, 
	`DATA_INICIAL` datetime   DEFAULT NULL, 
	`DATA_FINAL` datetime   DEFAULT NULL, 
	`CF_LOTE` float   DEFAULT NULL, 
	`Lote_Comercializacao_de` int   DEFAULT NULL, 
	`Lote_Comercializacao_ate` int   DEFAULT NULL, 
	`Lote_Adiantamento_de` int   DEFAULT NULL, 
	`Lote_Adiantamento_ate` int   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`SUB_GRUPO_CONTA` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` smallint   DEFAULT NULL, 
	`ESPECIE` char(3)   DEFAULT NULL, 
	`CONTA_CONTABIL` varchar(14)   DEFAULT NULL, 
	`GERAMOVIMENTO` int(1)   DEFAULT NULL, 
	`Lote_CupomFiscal_de` int   DEFAULT NULL, 
	`Lote_CupomFiscal_ate` int   DEFAULT NULL, 
	`GerarImpostos` int(1)   DEFAULT NULL, 
	`Empresa` varchar(50)   DEFAULT NULL, 
	`EMAIL` varchar(50)   DEFAULT NULL, 
	`EstoqueEnviaPagar` int(1)   DEFAULT NULL, 
	`Oficial` int(1)   DEFAULT NULL, 
	`CodCidade` int   DEFAULT NULL, 
	`CodPais` int   DEFAULT NULL, 
	`Complemento` varchar(20)   DEFAULT NULL, 
	`InscricaoST` varchar(14)   DEFAULT NULL, 
	`InscMunicipal` varchar(15)   DEFAULT NULL, 
	`CodCNAE` char(7)   DEFAULT NULL, 
	`CaminhoNFe` varchar(255)   DEFAULT NULL, 
	`SerieNF` char(3)   DEFAULT NULL, 
	`SerieSCAN` char(3)   DEFAULT NULL, 
	`SerieFS` char(3)   DEFAULT NULL, 
	`CalculaST` int(1)   DEFAULT NULL, 
	`Simples_Minas` int(1)   DEFAULT NULL, 
	`MODE` char(2)   DEFAULT NULL, 
	`Recibobaixa` numeric   DEFAULT NULL, 
	`FilialPrincipal` int   DEFAULT NULL, 
	`pedido` varchar(6)   DEFAULT NULL, 
	`Orcamento` varchar(6)   DEFAULT NULL, 
	`NumCliente` int   DEFAULT NULL, 
	`ObrigaImpressaoPedido` int(1)   DEFAULT NULL, 
	`ImprimirVendedorNFe` int(1)   DEFAULT NULL, 
	`EnderecoCobranca` varchar(70)   DEFAULT NULL, 
	`BairroCobranca` varchar(50)   DEFAULT NULL, 
	`CidadeCobranca` varchar(30)   DEFAULT NULL, 
	`EstadoCobranca` char(10)   DEFAULT NULL, 
	`CepCobranca` varchar(9)   DEFAULT NULL, 
	`NumeroCobranca` varchar(30)   DEFAULT NULL, 
	`EnderecoEntrega` varchar(70)   DEFAULT NULL, 
	`BairroEntrega` varchar(50)   DEFAULT NULL, 
	`CidadeEntrega` varchar(30)   DEFAULT NULL, 
	`EstadoEntrega` char(10)   DEFAULT NULL, 
	`CepEntrega` varchar(9)   DEFAULT NULL, 
	`NumeroEntrega` varchar(30)   DEFAULT NULL, 
	`UsarDadosAdicionais` int(1)   DEFAULT NULL, 
	`DadosAdicionais` varchar(70)   DEFAULT NULL, 
	`EmailNFe` varchar(255)   DEFAULT NULL, 
	`SenhaEmailNFe` varchar(255)   DEFAULT NULL, 
	`SMTPEmail` varchar(255)   DEFAULT NULL, 
	`RegimeTributario` char(1)   DEFAULT NULL, 
	`ClienteConsumidor` int   DEFAULT NULL, 
	`EmailRecXML` varchar(255)   DEFAULT NULL, 
	`NumeroCliente` int   DEFAULT NULL, 
	`NumeroProduto` int   DEFAULT NULL, 
	`AliquotaSimples` float   DEFAULT NULL, 
	`DocEstoque` int   DEFAULT NULL, 
	`ControlaPISCOFINS` int(1)   DEFAULT NULL, 
	`NumJuntaComercial` varchar(15)   DEFAULT NULL, 
	`ObrigaChaveNFe` int(1)   DEFAULT NULL, 
	`ContaContabilEntradaDevolucao` char(6)   DEFAULT NULL, 
	`CodEmpresaInvent` int   DEFAULT NULL, 
	`GeraCreditoICMS` int(1)   DEFAULT NULL, 
	`CodSituacaoPadrao` int   DEFAULT NULL, 
	`VencimentoCheque` int(1)   DEFAULT NULL, 
	`ImpostoRetidoServico` int(1)   DEFAULT NULL, 
	`NomeContrato` varchar(500)   DEFAULT NULL, 
	`CaminhoExec` varchar(1000)   DEFAULT NULL, 
	`RecuperacaoCredito` int(1)   DEFAULT NULL, 
	`EmailCompradorCotacao` varchar(150)   DEFAULT NULL, 
	`CPFResponsavelRFB` varchar(11)   DEFAULT NULL, 
	`STAliquotaInterestadual` int(1)   DEFAULT NULL, 
	`Apelido` varchar(50)   DEFAULT NULL, 
	`FaixaReceita` float   DEFAULT NULL, 
	`Industria` int(1)   DEFAULT NULL, 
	`Inativa` int(1)   DEFAULT NULL, 
	`DiasLembreteCobranca1` int   DEFAULT NULL, 
	`DiasLembreteCobranca2` int   DEFAULT NULL, 
	`EmailLembreteCobranca` varchar(100)   DEFAULT NULL, 
	`SenhaEmailLembreteCobranca` varchar(50)   DEFAULT NULL, 
	`SMTPEmailLembreteCobranca` varchar(100)   DEFAULT NULL, 
	`NumeroLoteServico` int   DEFAULT NULL, 
	`CalcularDIFAL` int(1)   DEFAULT NULL, 
	`LucroPresumido` int   DEFAULT NULL, 
	`NaoAlteraProduto` int(1)   DEFAULT NULL, 
	`DataBloqFinanceiro` datetime   DEFAULT NULL, 
	`logDataBloqFinanceiro` varchar(1000)   DEFAULT NULL, 
	`DataBloqEstoque` datetime   DEFAULT NULL, 
	`logDataBloqEstoque` varchar(1000)   DEFAULT NULL, 
	`ALIQUOTA_PIS_SN` float   DEFAULT NULL, 
	`ALIQUOTA_COFINS_SN` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `GRUPO_ESTOQUE`;
CREATE TABLE GRUPO_ESTOQUE (
	`GRUPO` int NOT NULL  , 
	`DESCRICAO` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Conta_Contabil` char(5)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `FILIAL_SERIE_TALAO`;
CREATE TABLE FILIAL_SERIE_TALAO (
	`FILIAL` int NOT NULL  , 
	`SERIE` char(10) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Funcionario_FeedBack`;
CREATE TABLE Funcionario_FeedBack (
	`Chapa` int NOT NULL  , 
	`SEQ` int NOT NULL  , 
	`Dia` datetime   DEFAULT NULL, 
	`Descricao` varchar(1000)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`DataRetorno` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `GRUPO_ESTOQUE_IMOBILIZADO`;
CREATE TABLE GRUPO_ESTOQUE_IMOBILIZADO (
	`GRUPO` int NOT NULL  , 
	`DESCRICAO` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `IMOBILIZADOS_NUMEROS`;
CREATE TABLE IMOBILIZADOS_NUMEROS (
	`CODIGO` int NOT NULL  , 
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`NUMERO` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ICMS`;
CREATE TABLE ICMS (
	`outros_debitos1` varchar(50)   DEFAULT NULL, 
	`aux_outros_debitos1` float   DEFAULT NULL, 
	`outros_debitos2` varchar(50)   DEFAULT NULL, 
	`aux_outros_debitos2` float   DEFAULT NULL, 
	`estorno_credito1` varchar(50)   DEFAULT NULL, 
	`aux_estorno_creditos1` float   DEFAULT NULL, 
	`estorno_credito2` varchar(50)   DEFAULT NULL, 
	`aux_estorno_creditos2` float   DEFAULT NULL, 
	`outros_creditos1` varchar(50)   DEFAULT NULL, 
	`aux_outros_creditos1` float   DEFAULT NULL, 
	`outros_creditos2` varchar(50)   DEFAULT NULL, 
	`aux_outros_creditos2` float   DEFAULT NULL, 
	`estorno_debitos1` varchar(50)   DEFAULT NULL, 
	`aux_estorno_debitos1` float   DEFAULT NULL, 
	`estorno_debitos2` varchar(50)   DEFAULT NULL, 
	`aux_estorno_debitos2` float   DEFAULT NULL, 
	`deduz1` varchar(50)   DEFAULT NULL, 
	`deducoes1` float   DEFAULT NULL, 
	`deduz2` varchar(50)   DEFAULT NULL, 
	`deducoes2` float   DEFAULT NULL, 
	`guia1` varchar(8)   DEFAULT NULL, 
	`data1` datetime   DEFAULT NULL, 
	`orgao1` varchar(30)   DEFAULT NULL, 
	`VALOR1` float   DEFAULT NULL, 
	`guia2` varchar(50)   DEFAULT NULL, 
	`data2` datetime   DEFAULT NULL, 
	`orgao2` varchar(30)   DEFAULT NULL, 
	`VALOR2` float   DEFAULT NULL, 
	`guia3` varchar(8)   DEFAULT NULL, 
	`data3` datetime   DEFAULT NULL, 
	`VALOR3` float   DEFAULT NULL, 
	`orgao3` varchar(30)   DEFAULT NULL, 
	`observacao1` text(1073741823)   DEFAULT NULL, 
	`observacao2` text(1073741823)   DEFAULT NULL, 
	`observacao3` text(1073741823)   DEFAULT NULL, 
	`MES_ANO_INICIAL` varchar(7)   DEFAULT NULL, 
	`MES_ANO_FINAL` varchar(7)   DEFAULT NULL, 
	`empresa` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `IMOBILIZADOS`;
CREATE TABLE IMOBILIZADOS (
	`CODIGO` int NOT NULL  , 
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`Cor` varchar(70)   DEFAULT NULL, 
	`Marca` varchar(70)   DEFAULT NULL, 
	`NumeroSerie` varchar(70)   DEFAULT NULL, 
	`Setor` int   DEFAULT NULL, 
	`Fornecedor` int   DEFAULT NULL, 
	`NumeroDe` int   DEFAULT NULL, 
	`NumeroAte` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`CaminhoImg1` varchar(1000)   DEFAULT NULL, 
	`CaminhoImg2` varchar(1000)   DEFAULT NULL, 
	`CaminhoImg3` varchar(1000)   DEFAULT NULL, 
	`CaminhoImg4` varchar(1000)   DEFAULT NULL, 
	`CaminhoPDF1` varchar(1000)   DEFAULT NULL, 
	`CaminhoPDF2` varchar(1000)   DEFAULT NULL, 
	`CaminhoPDF3` varchar(1000)   DEFAULT NULL, 
	`CaminhoPDF4` varchar(1000)   DEFAULT NULL, 
	`CaminhoPDF5` varchar(1000)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Grupo_Usuario`;
CREATE TABLE Grupo_Usuario (
	`ID_GRUPO_USUARIO` int NOT NULL  , 
	`DS_Grupo_Usuario` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Indices`;
CREATE TABLE Indices (
	`codigo` int NOT NULL  , 
	`descricao` char(50)   DEFAULT NULL, 
	`natureza` char(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `IBPT`;
CREATE TABLE IBPT (
	`ID_IBPT` int NOT NULL  , 
	`ESTADO` char(2)   DEFAULT NULL, 
	`CODIGO` varchar(50)   DEFAULT NULL, 
	`EX` int   DEFAULT NULL, 
	`TIPO` int   DEFAULT NULL, 
	`DESCRICAO` varchar(255)   DEFAULT NULL, 
	`NACIONAL` float   DEFAULT NULL, 
	`IMPORTADO` float   DEFAULT NULL, 
	`ESTADUAL` float   DEFAULT NULL, 
	`MUNICIPAL` float   DEFAULT NULL, 
	`VIGENCIA_INICIO` datetime   DEFAULT NULL, 
	`VIGENCIA_FIM` datetime   DEFAULT NULL, 
	`CHAVE` varchar(10)   DEFAULT NULL, 
	`VERSAO` varchar(10)   DEFAULT NULL, 
	`FONTE` varchar(10)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_CUSTO`;
CREATE TABLE ITEM_CUSTO (
	`FILIAL` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`MES_ANO` char(7) NOT NULL  , 
	`SALDO_FINAL` float   DEFAULT NULL, 
	`QTDE_PRODUCAO` float   DEFAULT NULL, 
	`FERRAGEM_ATUAL` float   DEFAULT NULL, 
	`FERRAGEM_MEDIO` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Item_Agregados`;
CREATE TABLE Item_Agregados (
	`ITEM` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`DESCRICAO` varchar(60)   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_FORNEC`;
CREATE TABLE ITEM_FORNEC (
	`ITEM` int NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`SEQ` int NOT NULL  , 
	`CLIENTE` varchar(20)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_FILIAL`;
CREATE TABLE ITEM_FILIAL (
	`FILIAL` int NOT NULL  , 
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`PRECO_BASE` float   DEFAULT NULL, 
	`INDICE_PRECO1` float   DEFAULT NULL, 
	`INDICE_PRECO2` float   DEFAULT NULL, 
	`INDICE_PRECO3` float   DEFAULT NULL, 
	`INDICE_PRECO4` float   DEFAULT NULL, 
	`ESTOQUE` float NOT NULL  , 
	`ESTOQUE_INICIAL` float   DEFAULT NULL, 
	`PRECO_MEDIO` float   DEFAULT NULL, 
	`PRECO_INICIAL` float   DEFAULT NULL, 
	`PRECO_ANTERIOR` float   DEFAULT NULL, 
	`ATUALIZACAO_PRECO` datetime   DEFAULT NULL, 
	`ULTIMA_COMPRA` datetime   DEFAULT NULL, 
	`VLR_ULTIMACOMPRA` float   DEFAULT NULL, 
	`QTDE_INVENTARIO` numeric   DEFAULT NULL, 
	`MEDIO_INVENTARIO` float   DEFAULT NULL, 
	`MOVIMENTA_LOJA` int(1) NOT NULL  , 
	`ESTORNO_INICIAL` float   DEFAULT NULL, 
	`ETIQUETAS` int(1)   DEFAULT NULL, 
	`EstoqueMinimo` float   DEFAULT NULL, 
	`PRECO_MINIMO` float   DEFAULT NULL, 
	`Localizacao` varchar(100)   DEFAULT NULL, 
	`BloquearEstoqueNegativo` int(1)   DEFAULT NULL, 
	`Piso` varchar(20)   DEFAULT NULL, 
	`Prateleira` varchar(20)   DEFAULT NULL, 
	`Posicao` varchar(20)   DEFAULT NULL, 
	`Atacado` float   DEFAULT NULL, 
	`UsuarioAlteracao` varchar(100)   DEFAULT NULL, 
	`PrecoMedioVenda` float   DEFAULT NULL, 
	`Preco_Maximo` float   DEFAULT NULL, 
	`Carteira` float   DEFAULT NULL, 
	`CarteiraTransferencia` float   DEFAULT NULL, 
	`Preco_MedioBruto` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Indices_Valores`;
CREATE TABLE Indices_Valores (
	`indice` int NOT NULL  , 
	`data` datetime   DEFAULT NULL, 
	`valor` float   DEFAULT NULL, 
	`DiasUteis` numeric   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM`;
CREATE TABLE ITEM (
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`DESCRICAO` varchar(300)   DEFAULT NULL, 
	`DESCRICAONF` varchar(300)   DEFAULT NULL, 
	`REFERENCIA1` varchar(70)   DEFAULT NULL, 
	`REFERENCIA2` varchar(70)   DEFAULT NULL, 
	`UNIDADE_MEDIDA` varchar(3)   DEFAULT NULL, 
	`UNIDADE_MEDIDA_VENDA` varchar(3)   DEFAULT NULL, 
	`LOCALIZACAO` varchar(20)   DEFAULT NULL, 
	`ATUALIZA_ESTOQUE` int(1) NOT NULL  , 
	`ALMOXARIFADO` int   DEFAULT NULL, 
	`PESO_UNITARIO` float   DEFAULT NULL, 
	`COMISSAO` float   DEFAULT NULL, 
	`INDICE_PRECO1` float   DEFAULT NULL, 
	`INDICE_PRECO2` float   DEFAULT NULL, 
	`INDICE_PRECO3` float   DEFAULT NULL, 
	`INDICE_PRECO4` float   DEFAULT NULL, 
	`COD_TRIBUTACAO` int   DEFAULT NULL, 
	`CLASSIF_FISCAL` char(20)   DEFAULT NULL, 
	`ESTOQUE` numeric   DEFAULT NULL, 
	`ESTOQUE_INICIAL` float   DEFAULT NULL, 
	`PRECO_MEDIO` float   DEFAULT NULL, 
	`PRECO_INICIAL` float   DEFAULT NULL, 
	`ESTOQUE_MINIMO` float   DEFAULT NULL, 
	`ULTIMA_COMPRA` datetime   DEFAULT NULL, 
	`RECEITUARIO` int(1) NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`MOVIMENTA_LOJA` int(1) NOT NULL  , 
	`BLOQUEADO` int(1) NOT NULL  , 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`MARGEMLUCRO` float   DEFAULT NULL, 
	`CODIGO_BARRAS` varchar(14)   DEFAULT NULL, 
	`OBSERVACAONOTA` numeric   DEFAULT NULL, 
	`PERCFORAESTADO` float   DEFAULT NULL, 
	`SACAS_TROCA` float   DEFAULT NULL, 
	`CATEGORIA` int   DEFAULT NULL, 
	`QTDEEMBALAGEM` float   DEFAULT NULL, 
	`MEDIDA` float   DEFAULT NULL, 
	`CARGA` char(10)   DEFAULT NULL, 
	`TOPO` varchar(50)   DEFAULT NULL, 
	`CARACTERISTICA` char(20)   DEFAULT NULL, 
	`MOV_ALMOXARIF` int(1)   DEFAULT NULL, 
	`TIPOPRODUTO` int   DEFAULT NULL, 
	`PERCENTRADA` float   DEFAULT NULL, 
	`QTDEM3` float   DEFAULT NULL, 
	`IMOBILIZADO` int(1)   DEFAULT NULL, 
	`PRODUCAO` int(1)   DEFAULT NULL, 
	`PESO_ACO` float   DEFAULT NULL, 
	`FatorProdutividade` float   DEFAULT NULL, 
	`ObservacaoProducao_Barras` varchar(500)   DEFAULT NULL, 
	`BeneficioFiscal` int(1)   DEFAULT NULL, 
	`RelDiasVida` int(1)   DEFAULT NULL, 
	`MateriaPrima` int(1)   DEFAULT NULL, 
	`BloquearTransferencia` int(1)   DEFAULT NULL, 
	`SomenteMultiplos` int(1)   DEFAULT NULL, 
	`BloquearEstoqueNegativo` int(1)   DEFAULT NULL, 
	`Fabricante` varchar(100)   DEFAULT NULL, 
	`PesoAdicional` float   DEFAULT NULL, 
	`PercColuna001` float   DEFAULT NULL, 
	`PercColuna002` float   DEFAULT NULL, 
	`PercColuna003` float   DEFAULT NULL, 
	`PercColuna004` float   DEFAULT NULL, 
	`PercColuna005` float   DEFAULT NULL, 
	`Maximo` float   DEFAULT NULL, 
	`CodTipoItem` int   DEFAULT NULL, 
	`CodGenero` int   DEFAULT NULL, 
	`CodServico` int   DEFAULT NULL, 
	`IdMercadoria` int   DEFAULT NULL, 
	`PercPIS` float   DEFAULT NULL, 
	`PercCOFINS` float   DEFAULT NULL, 
	`CST_PIS_COFINS` char(2)   DEFAULT NULL, 
	`SequenciaTalao` int   DEFAULT NULL, 
	`CodigoProdutoNF` int   DEFAULT NULL, 
	`Origem` int   DEFAULT NULL, 
	`PontosDesafio` float   DEFAULT NULL, 
	`CST_PIS_COFINS_Entrada` char(2)   DEFAULT NULL, 
	`Numero` varchar(3)   DEFAULT NULL, 
	`Embalagem` int   DEFAULT NULL, 
	`Marca` int   DEFAULT NULL, 
	`Sabor` int   DEFAULT NULL, 
	`TipoConsumo` int   DEFAULT NULL, 
	`ValorMaxNota` float   DEFAULT NULL, 
	`ValorMaxEntrada` float   DEFAULT NULL, 
	`ControlaEstoqueMinimo` int(1)   DEFAULT NULL, 
	`HorasProducao` char(8)   DEFAULT NULL, 
	`QtdeCola` float   DEFAULT NULL, 
	`QtdeRebite` float   DEFAULT NULL, 
	`UsuarioHorasProducao` varchar(250)   DEFAULT NULL, 
	`CodigoANP` varchar(9)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`AlertaEstoqueMinimo` int(1)   DEFAULT NULL, 
	`Especificacoes` varchar(2000)   DEFAULT NULL, 
	`DescPercPIS` float   DEFAULT NULL, 
	`DescPercCOFINS` float   DEFAULT NULL, 
	`NaturezaReceita` int   DEFAULT NULL, 
	`BCCredito` int   DEFAULT NULL, 
	`TipoCredito` int   DEFAULT NULL, 
	`CubagemUN` float   DEFAULT NULL, 
	`CubagemCaixa` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Item_Kit`;
CREATE TABLE Item_Kit (
	`item` int NOT NULL  , 
	`item_kit` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Quantidade` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_NVE`;
CREATE TABLE ITEM_NVE (
	`ID_ITEM_NVE` int NOT NULL  , 
	`ITEM` int   DEFAULT NULL, 
	`NVE` char(6)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_MVA`;
CREATE TABLE ITEM_MVA (
	`ITEM` int NOT NULL  , 
	`Estado` varchar(2) NOT NULL  , 
	`MVA` float   DEFAULT NULL, 
	`Icms` int(1)   DEFAULT NULL, 
	`Aliquota` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Item_MVA_Tributacao`;
CREATE TABLE Item_MVA_Tributacao (
	`Item` int NOT NULL  , 
	`Estado_Origem` varchar(2) NOT NULL  , 
	`Estado_Destino` varchar(2) NOT NULL  , 
	`MVA` float   DEFAULT NULL, 
	`Aliquota` float   DEFAULT NULL, 
	`Tributacao` int   DEFAULT NULL, 
	`ICMS` int(1)   DEFAULT NULL, 
	`TributacaoNaoContribuinte` int   DEFAULT NULL, 
	`TributacaoIndustria` int   DEFAULT NULL, 
	`TributacaoConsumidorFinal` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_PRODUCAO`;
CREATE TABLE ITEM_PRODUCAO (
	`ITEM` int NOT NULL  , 
	`ITeM_ITEM` int NOT NULL  , 
	`TRACO` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Espiral1` int   DEFAULT NULL, 
	`Espiral1Espaco` float   DEFAULT NULL, 
	`Espiral1Ate` float   DEFAULT NULL, 
	`Espiral2` int   DEFAULT NULL, 
	`Espiral2Espaco` float   DEFAULT NULL, 
	`Espiral2Ate` float   DEFAULT NULL, 
	`Espiral3` int   DEFAULT NULL, 
	`Espiral3Espaco` float   DEFAULT NULL, 
	`Espiral3Ate` float   DEFAULT NULL, 
	`DataAtualizacao_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_Inventario`;
CREATE TABLE ITEM_Inventario (
	`Filial` int NOT NULL  , 
	`Item` varchar(14) NOT NULL  , 
	`Data` datetime NOT NULL  , 
	`Estoque` float   DEFAULT NULL, 
	`Preco_Medio` float   DEFAULT NULL, 
	`Ultima_Compra` datetime   DEFAULT NULL, 
	`Vlr_UltimaCompra` float   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`QTDE_INVENTARIO` float   DEFAULT NULL, 
	`MEDIO_INVENTARIO` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_TabelaPreco`;
CREATE TABLE ITEM_TabelaPreco (
	`FILIAL` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`Preco_Base` float   DEFAULT NULL, 
	`Preco_Minimo` float   DEFAULT NULL, 
	`DataAtualizacao` datetime NOT NULL  , 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`SeqAtualizacao` int NOT NULL  , 
	`Atacado` float   DEFAULT NULL, 
	`Preco_Maximo` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Item_Similar_Referencia`;
CREATE TABLE Item_Similar_Referencia (
	`ITEM` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`REFERENCIA` varchar(50)   DEFAULT NULL, 
	`OBSERVACAO` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_TAPETE_BARRAS`;
CREATE TABLE ITEM_TAPETE_BARRAS (
	`ITEM` int NOT NULL  , 
	`ITeM_ITEM` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`SEQ` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`METROS` float   DEFAULT NULL, 
	`NABASE` int(1)   DEFAULT NULL, 
	`A05MT` int(1)   DEFAULT NULL, 
	`A1MT` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_TRIBUTACAO_ORIGEM`;
CREATE TABLE ITEM_TRIBUTACAO_ORIGEM (
	`ITEM` int NOT NULL  , 
	`ESTADO` varchar(2) NOT NULL  , 
	`COD_TRIBUTACAO` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_TabelaPreco_Personalizada`;
CREATE TABLE ITEM_TabelaPreco_Personalizada (
	`FILIAL` int NOT NULL  , 
	`CODIGO` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`DescricaoTabela` varchar(100)   DEFAULT NULL, 
	`Preco_Base` float   DEFAULT NULL, 
	`Preco_Minimo` float   DEFAULT NULL, 
	`DataAtualizacao` datetime NOT NULL  , 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_SIMILAR`;
CREATE TABLE ITEM_SIMILAR (
	`ITEM` int NOT NULL  , 
	`ITEM_SIMILAR` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_UnidadeAlternativa`;
CREATE TABLE ITEM_UnidadeAlternativa (
	`ITEM` int NOT NULL  , 
	`Unidade_Medida` varchar(3) NOT NULL  , 
	`Quantidade` float   DEFAULT NULL, 
	`DestacaNF` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Contagem_Itens`;
CREATE TABLE Lanc_Contagem_Itens (
	`FILIAL` int NOT NULL  , 
	`EMISSAO` datetime NOT NULL  , 
	`MOVIM_ITEM` int NOT NULL  , 
	`ITEM` int   DEFAULT NULL, 
	`ESTOQUE` float   DEFAULT NULL, 
	`CONTAGEM` float   DEFAULT NULL, 
	`SALDO` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`EstoquePrinc` float   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`QtdeUnidade` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Contagem`;
CREATE TABLE Lanc_Contagem (
	`FILIAL` int NOT NULL  , 
	`EMISSAO` datetime NOT NULL  , 
	`ENCERRADO` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_ChequesPre_DuplicatasPagar`;
CREATE TABLE Lanc_ChequesPre_DuplicatasPagar (
	`Lancamento` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Duplicata` char(10)   DEFAULT NULL, 
	`ValorParcela` float   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`SeqDuplicata` char(10)   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_ChequesPre_Duplicatas`;
CREATE TABLE Lanc_ChequesPre_Duplicatas (
	`Lancamento` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Duplicata` char(10)   DEFAULT NULL, 
	`ValorParcela` float   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`SeqDuplicata` char(10)   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_ChequesPre`;
CREATE TABLE Lanc_ChequesPre (
	`Lancamento` int NOT NULL  , 
	`Agencia` varchar(10)   DEFAULT NULL, 
	`Cheque` varchar(10)   DEFAULT NULL, 
	`Banco` int   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`Nome` varchar(50)   DEFAULT NULL, 
	`Nascimento` datetime   DEFAULT NULL, 
	`Pessoa` int(1)   DEFAULT NULL, 
	`CpfCnpj` varchar(18)   DEFAULT NULL, 
	`RG` varchar(20)   DEFAULT NULL, 
	`Inscricao` varchar(20)   DEFAULT NULL, 
	`Telefone` varchar(15)   DEFAULT NULL, 
	`Responsavel` varchar(50)   DEFAULT NULL, 
	`Destino` varchar(50)   DEFAULT NULL, 
	`Pagamento` datetime   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Pedido` char(10)   DEFAULT NULL, 
	`Observacao` varchar(100)   DEFAULT NULL, 
	`DescBanco` varchar(200)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DataAtualizacao_Alteracao` datetime   DEFAULT NULL, 
	`HoraAtualizacao_Alteracao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao_Alteracao` char(3)   DEFAULT NULL, 
	`CodCidade` int   DEFAULT NULL, 
	`Deposito` int(1)   DEFAULT NULL, 
	`Cidade` varchar(50)   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`Fechamento` varchar(6)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_DepositoChequesPre`;
CREATE TABLE Lanc_DepositoChequesPre (
	`Lancamento` int NOT NULL  , 
	`Filial` int NOT NULL  , 
	`Banco` int   DEFAULT NULL, 
	`ContaCorrente` char(15)   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`VencimentoInicial` datetime   DEFAULT NULL, 
	`VencimentoFinal` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Formula` char(3)   DEFAULT NULL, 
	`Emitente` varchar(50)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Contagem_Itens_Conferencia_TMP`;
CREATE TABLE Lanc_Contagem_Itens_Conferencia_TMP (
	`FILIAL` int NOT NULL  , 
	`EMISSAO` datetime NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`Quantidade` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Contagem_Itens_Conferencia`;
CREATE TABLE Lanc_Contagem_Itens_Conferencia (
	`FILIAL` int NOT NULL  , 
	`EMISSAO` datetime NOT NULL  , 
	`SequenciaConferencia` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`Quantidade` float   DEFAULT NULL, 
	`Unidade` varchar(3)   DEFAULT NULL, 
	`QuantidadePrincipal` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_DepositoChequesPre_Cheques`;
CREATE TABLE Lanc_DepositoChequesPre_Cheques (
	`Lancamento` int NOT NULL  , 
	`Filial` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`LancamentoCheque` int NOT NULL  , 
	`NUM_LANC_Bancario` numeric   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_ContratoAdministracao`;
CREATE TABLE Lanc_ContratoAdministracao (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`PercentualAluguel` float   DEFAULT NULL, 
	`QtdeParcelasAluguel` float   DEFAULT NULL, 
	`TaxaAdministracao` float   DEFAULT NULL, 
	`BancoDeposito` varchar(30)   DEFAULT NULL, 
	`AgenciaDeposito` varchar(15)   DEFAULT NULL, 
	`ContaDeposito` varchar(15)   DEFAULT NULL, 
	`NomeDeposito` varchar(50)   DEFAULT NULL, 
	`GeraCpmf` int(1)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`RepasseDesconto` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_ContratoLocacao`;
CREATE TABLE Lanc_ContratoLocacao (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`Imovel` int   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`ValorAluguel` float   DEFAULT NULL, 
	`ValorIptu` float   DEFAULT NULL, 
	`TaxaIptu` int(1)   DEFAULT NULL, 
	`TaxaCondominio` int(1)   DEFAULT NULL, 
	`PrazoMeses` int   DEFAULT NULL, 
	`Prazode` datetime   DEFAULT NULL, 
	`PrazoAte` datetime   DEFAULT NULL, 
	`DiaVencimento` int   DEFAULT NULL, 
	`QtdeAbatimento` int   DEFAULT NULL, 
	`ValorAbatimento` float   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`GeraBoletos` int(1)   DEFAULT NULL, 
	`MotivoEncerrado` varchar(50)   DEFAULT NULL, 
	`DataEncerrado` datetime   DEFAULT NULL, 
	`Caucao` int(1)   DEFAULT NULL, 
	`ATIVIDADE` char(50)   DEFAULT NULL, 
	`DescricaoAbatimento` varchar(250)   DEFAULT NULL, 
	`SeguroFianca` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_EntradaProducaoItens`;
CREATE TABLE Lanc_EntradaProducaoItens (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`DocProducao` varchar(6)   DEFAULT NULL, 
	`Observacao` varchar(100)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`Etiquetas` int   DEFAULT NULL, 
	`EncerradoConcreto` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_FechamentoCaixa_Duplicatas`;
CREATE TABLE Lanc_FechamentoCaixa_Duplicatas (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`FilialDup` int NOT NULL  , 
	`Duplicata` char(8) NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`Sequencia` varchar(10) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Execs`;
CREATE TABLE Lanc_Execs (
	`Modulo` int NOT NULL  , 
	`Atualizar` int(1)   DEFAULT NULL, 
	`Generico` int(1)   DEFAULT NULL, 
	`Fiscal` int(1)   DEFAULT NULL, 
	`Faturamento` int(1)   DEFAULT NULL, 
	`Aco` int(1)   DEFAULT NULL, 
	`Empresa` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_GeracaoProducao`;
CREATE TABLE Lanc_GeracaoProducao (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6)   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Responsavel` varchar(50)   DEFAULT NULL, 
	`Observacao` varchar(200)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`SubGrupo` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_EntradaProducaoItensProducao`;
CREATE TABLE Lanc_EntradaProducaoItensProducao (
	`Emissao` datetime   DEFAULT NULL, 
	`Filial` int NOT NULL  , 
	`Pedido` varchar(6)   DEFAULT NULL, 
	`Prazo` datetime   DEFAULT NULL, 
	`Item` int NOT NULL  , 
	`SequenciaProduto` char(7) NOT NULL  , 
	`Tipo` char(1) NOT NULL  , 
	`Quantidade` float   DEFAULT NULL, 
	`QuantidadeProducao` float   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Dupla` char(50)   DEFAULT NULL, 
	`Forma` char(50)   DEFAULT NULL, 
	`Serie` char(50)   DEFAULT NULL, 
	`FilialPedido` int   DEFAULT NULL, 
	`Gerar` int(1)   DEFAULT NULL, 
	`Encerrar` int(1)   DEFAULT NULL, 
	`documento` varchar(6)   DEFAULT NULL, 
	`Processado` int(1)   DEFAULT NULL, 
	`Traco` int   DEFAULT NULL, 
	`Vlr_Ferragem_Atual` float   DEFAULT NULL, 
	`Vlr_Ferragem_Medio` float   DEFAULT NULL, 
	`Vlr_Concreto_Atual` float   DEFAULT NULL, 
	`Vlr_Concreto_Medio` float   DEFAULT NULL, 
	`Vlr_Custo_Producao` float   DEFAULT NULL, 
	`Vlr_Custo_Administracao` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_EntradaProducao`;
CREATE TABLE Lanc_EntradaProducao (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Pedido` varchar(6)   DEFAULT NULL, 
	`EmissaoPedido` datetime   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`DataEntrega` datetime   DEFAULT NULL, 
	`Observacao` varchar(600)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`DocProducao` varchar(6)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_GeracaoProducaoItens`;
CREATE TABLE Lanc_GeracaoProducaoItens (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6)   DEFAULT NULL, 
	`Sequencia` int NOT NULL  , 
	`Pedido` varchar(6)   DEFAULT NULL, 
	`Prazo` datetime   DEFAULT NULL, 
	`Item` int   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`QuantidadeProducao` float   DEFAULT NULL, 
	`Gerar` int(1)   DEFAULT NULL, 
	`Encerrar` int(1)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`EmissaoPedido` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Marketing_itens_NaoCadastrados`;
CREATE TABLE Lanc_Marketing_itens_NaoCadastrados (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DescricaoItem` varchar(300)   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`Marca` varchar(300)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LANC_MARKETING_FEEDBACK`;
CREATE TABLE LANC_MARKETING_FEEDBACK (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`SEQ` int NOT NULL  , 
	`DIA` datetime   DEFAULT NULL, 
	`DESCRICAO` varchar(500)   DEFAULT NULL, 
	`ENCERRADO` int(1)   DEFAULT NULL, 
	`DATARETORNO` datetime   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Marketing_Itens`;
CREATE TABLE Lanc_Marketing_Itens (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`VALOR_DESCONTO` float   DEFAULT NULL, 
	`TAXA_DESC` float   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`QUANTIDADEPRINCIPAL` float   DEFAULT NULL, 
	`VALOR_BASE` float   DEFAULT NULL, 
	`VLRCALC` float   DEFAULT NULL, 
	`ARMADO` int(1)   DEFAULT NULL, 
	`DESCRICAOARMADO` varchar(200)   DEFAULT NULL, 
	`SEQUENCIAARMADO` int   DEFAULT NULL, 
	`ADICIONALPRODUTO` varchar(200)   DEFAULT NULL, 
	`ValorInicial` float   DEFAULT NULL, 
	`ServicoArmado` int(1)   DEFAULT NULL, 
	`ServicoCorteDobra` int(1)   DEFAULT NULL, 
	`UsoConsumo` int(1)   DEFAULT NULL, 
	`AbaixoTabela` char(1)   DEFAULT NULL, 
	`Comissao` float   DEFAULT NULL, 
	`Linha` char(6)   DEFAULT NULL, 
	`EstoqueAtual` float   DEFAULT NULL, 
	`TaxaIPI` float   DEFAULT NULL, 
	`BaseIPI` float   DEFAULT NULL, 
	`ValorIPI` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Marketing`;
CREATE TABLE Lanc_Marketing (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`TOTAL` float   DEFAULT NULL, 
	`PESSOA` char(1)   DEFAULT NULL, 
	`CPF_CGC` varchar(18)   DEFAULT NULL, 
	`INSCRICAOESTADUAL` varchar(20)   DEFAULT NULL, 
	`RAZAOSOCIAL` varchar(70)   DEFAULT NULL, 
	`ENDERECO` varchar(70)   DEFAULT NULL, 
	`BAIRRO` varchar(30)   DEFAULT NULL, 
	`CIDADE` varchar(30)   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`TELEFONE` char(100)   DEFAULT NULL, 
	`FAX` char(100)   DEFAULT NULL, 
	`EMAIL` char(50)   DEFAULT NULL, 
	`CONTATO` varchar(50)   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Validade` datetime   DEFAULT NULL, 
	`Previsao` datetime   DEFAULT NULL, 
	`Observacao` varchar(600)   DEFAULT NULL, 
	`Encerramento` varchar(500)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`PrazoEntrega` varchar(500)   DEFAULT NULL, 
	`LocalEntrega` varchar(500)   DEFAULT NULL, 
	`Pagamento` varchar(500)   DEFAULT NULL, 
	`ObservacaoRetorno` varchar(500)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`TRANSPORTADORA` int   DEFAULT NULL, 
	`Vendedor` int   DEFAULT NULL, 
	`TotalFrete` float   DEFAULT NULL, 
	`ObservacaoFrete` varchar(500)   DEFAULT NULL, 
	`CELULAR` varchar(100)   DEFAULT NULL, 
	`PEDIDO` char(6)   DEFAULT NULL, 
	`JUSTIFICATIVA` int   DEFAULT NULL, 
	`DeptoComercial` varchar(50)   DEFAULT NULL, 
	`Numero` varchar(50)   DEFAULT NULL, 
	`MARGEMLUCRO` float   DEFAULT NULL, 
	`ObservacaoMaterialArmado` varchar(500)   DEFAULT NULL, 
	`Procedencia` varchar(50)   DEFAULT NULL, 
	`Desconto` float   DEFAULT NULL, 
	`MensagemDestaque` varchar(100)   DEFAULT NULL, 
	`OrcamentoReferente` varchar(300)   DEFAULT NULL, 
	`MotivoJustificativa` varchar(500)   DEFAULT NULL, 
	`OsOrcamento` char(10)   DEFAULT NULL, 
	`OsLote` char(10)   DEFAULT NULL, 
	`Historico` text(1073741823)   DEFAULT NULL, 
	`ValorDesconto` float   DEFAULT NULL, 
	`RETIRA` int(1)   DEFAULT NULL, 
	`Categoria` int   DEFAULT NULL, 
	`CEPENTREGA` varchar(9)   DEFAULT NULL, 
	`NumeroEntrega` varchar(50)   DEFAULT NULL, 
	`Tabela` int   DEFAULT NULL, 
	`Motivo` int   DEFAULT NULL, 
	`AutorizadoMargem` varchar(50)   DEFAULT NULL, 
	`MARGEMLUCROCorteDobra` float   DEFAULT NULL, 
	`MargemLucroArmado` float   DEFAULT NULL, 
	`MargemLucroProduto` float   DEFAULT NULL, 
	`DiasEntrega` float   DEFAULT NULL, 
	`PesoEntrega` float   DEFAULT NULL, 
	`DECLINADO` int(1)   DEFAULT NULL, 
	`ConsumidorFinal` int(1)   DEFAULT NULL, 
	`ValorIpi` float   DEFAULT NULL, 
	`BaseIPI` float   DEFAULT NULL, 
	`Frete` int   DEFAULT NULL, 
	`Contribuinte` int(1)   DEFAULT NULL, 
	`NaoContribuinte` int(1)   DEFAULT NULL, 
	`Industria` int(1)   DEFAULT NULL, 
	`IsencaoIPI` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Marketing_Itens_Personalizados`;
CREATE TABLE Lanc_Marketing_Itens_Personalizados (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DESCRICAO` varchar(200)   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`COMPRIMENTO` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`ARAME` float   DEFAULT NULL, 
	`PESOARAME` float   DEFAULT NULL, 
	`ESTRIBO` float   DEFAULT NULL, 
	`EstriboQuantidade` float   DEFAULT NULL, 
	`EstriboEspacamento` float   DEFAULT NULL, 
	`EstriboDimensao1` float   DEFAULT NULL, 
	`EstriboDimensao2` float   DEFAULT NULL, 
	`PESOESTRIBO` float   DEFAULT NULL, 
	`VALOR_DESCONTO` float   DEFAULT NULL, 
	`TAXA_DESC` float   DEFAULT NULL, 
	`PRECOBASE` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`TotalPeso` float   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL, 
	`PercArame` float   DEFAULT NULL, 
	`UnitArame` float   DEFAULT NULL, 
	`UnitEstribo` float   DEFAULT NULL, 
	`MTLinear` float   DEFAULT NULL, 
	`PercMO` float   DEFAULT NULL, 
	`ValorMO` float   DEFAULT NULL, 
	`TotalGeral` float   DEFAULT NULL, 
	`ValorMetroLinear` float   DEFAULT NULL, 
	`totalMO` float   DEFAULT NULL, 
	`ColunaViga` int   DEFAULT NULL, 
	`VariacaoPeso` float   DEFAULT NULL, 
	`TIPO` char(1)   DEFAULT NULL, 
	`FerroSapata` int   DEFAULT NULL, 
	`QtdeSapata1` float   DEFAULT NULL, 
	`QtdeSapata2` float   DEFAULT NULL, 
	`LarguraSapata` float   DEFAULT NULL, 
	`ComprimentoSapata` float   DEFAULT NULL, 
	`AlturaSapata` float   DEFAULT NULL, 
	`Diametro` float   DEFAULT NULL, 
	`Metragem1` float   DEFAULT NULL, 
	`PesoSapata` float   DEFAULT NULL, 
	`UnitSapata` float   DEFAULT NULL, 
	`Metragem2` float   DEFAULT NULL, 
	`FerroEstriboRedondo` int   DEFAULT NULL, 
	`PesoEstriboRedondo` float   DEFAULT NULL, 
	`UnitEstriboRedondo` float   DEFAULT NULL, 
	`ReducaoEstribo` float   DEFAULT NULL, 
	`ComplementoDescricao` varchar(50)   DEFAULT NULL, 
	`Observacao` varchar(300)   DEFAULT NULL, 
	`EstriboPronto` int   DEFAULT NULL, 
	`FerroAnel` int   DEFAULT NULL, 
	`QtdeAnel` float   DEFAULT NULL, 
	`PesoAnel` float   DEFAULT NULL, 
	`UnitAnel` float   DEFAULT NULL, 
	`ValorAnel` float   DEFAULT NULL, 
	`MetragemAnel` float   DEFAULT NULL, 
	`TipoSapata` char(1)   DEFAULT NULL, 
	`AbaixoTabela` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Marketing_Itens_Personalizados_Ferros`;
CREATE TABLE Lanc_Marketing_Itens_Personalizados_Ferros (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` varchar(6) NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`SequenciaLanc` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`DOBRA1` float   DEFAULT NULL, 
	`DOBRA2` float   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`QUANTIDADEPRINCIPAL` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_SERVICO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`VLRCALC` float   DEFAULT NULL, 
	`AbaixoTabela` char(1)   DEFAULT NULL, 
	`Comissao` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OrdemServico`;
CREATE TABLE Lanc_OrdemServico (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Pedido` varchar(6)   DEFAULT NULL, 
	`EmissaoPedido` datetime   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`DataEntrega` datetime   DEFAULT NULL, 
	`Observacao` varchar(600)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Pedidos`;
CREATE TABLE Lanc_Pedidos (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`Vendedor` int   DEFAULT NULL, 
	`TaxaComissao` float   DEFAULT NULL, 
	`TOTAL` float   DEFAULT NULL, 
	`CONTATO` varchar(50)   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Previsao` datetime   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`Encerramento` varchar(500)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`PrazoEntrega` datetime   DEFAULT NULL, 
	`LocalEntrega` varchar(300)   DEFAULT NULL, 
	`Pagamento` varchar(200)   DEFAULT NULL, 
	`ValorFrete` float   DEFAULT NULL, 
	`FreteIncluso` int(1)   DEFAULT NULL, 
	`PEDIDOCLIENTE` varchar(50)   DEFAULT NULL, 
	`TRANSPORTADORA` int   DEFAULT NULL, 
	`EncerradoFaturado` int(1)   DEFAULT NULL, 
	`EncerradoEntregue` int(1)   DEFAULT NULL, 
	`Orcamento` varchar(6)   DEFAULT NULL, 
	`Condpagamento` int   DEFAULT NULL, 
	`QtdeVeiculos` float   DEFAULT NULL, 
	`ValorFreteUnitario` float   DEFAULT NULL, 
	`ObservacaoFrete` varchar(100)   DEFAULT NULL, 
	`MargemLucro` float   DEFAULT NULL, 
	`TipoCredito` char(1)   DEFAULT NULL, 
	`AutorizadoCredito` varchar(50)   DEFAULT NULL, 
	`ObservacaoCredito` varchar(100)   DEFAULT NULL, 
	`TipoPreco` char(1)   DEFAULT NULL, 
	`AutorizadoPreco` varchar(50)   DEFAULT NULL, 
	`ObservacaoPreco` varchar(100)   DEFAULT NULL, 
	`Impressao` int   DEFAULT NULL, 
	`Desconto` float   DEFAULT NULL, 
	`Placa` char(20)   DEFAULT NULL, 
	`Pesagem` int(1)   DEFAULT NULL, 
	`Apontador` varchar(50)   DEFAULT NULL, 
	`Teste` int(1)   DEFAULT NULL, 
	`Laboratorio` varchar(50)   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`VALORDESCONTO` float   DEFAULT NULL, 
	`RETIRA` int(1)   DEFAULT NULL, 
	`MOTORISTA` varchar(50)   DEFAULT NULL, 
	`DataAutorizado` datetime   DEFAULT NULL, 
	`Impresso` int(1) NOT NULL  , 
	`CEPENTREGA` varchar(9)   DEFAULT NULL, 
	`CorteDobra` int(1)   DEFAULT NULL, 
	`MotivoCancelamento` text   DEFAULT NULL, 
	`Numero` varchar(50)   DEFAULT NULL, 
	`Tabela` int   DEFAULT NULL, 
	`Baixado` int(1)   DEFAULT NULL, 
	`EntregaNoturna` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`Motivo` int   DEFAULT NULL, 
	`Atendente` int   DEFAULT NULL, 
	`TotalDevolucao` float   DEFAULT NULL, 
	`AutorizadoMargem` varchar(50)   DEFAULT NULL, 
	`MargemLucroCorteDobra` float   DEFAULT NULL, 
	`MargemLucroProduto` float   DEFAULT NULL, 
	`MargemLucroArmado` float   DEFAULT NULL, 
	`EncerradoVendas` int(1)   DEFAULT NULL, 
	`Lote` varchar(50)   DEFAULT NULL, 
	`Volumes` float   DEFAULT NULL, 
	`FerroAnel` int   DEFAULT NULL, 
	`QtdeAnel` float   DEFAULT NULL, 
	`PesoAnel` float   DEFAULT NULL, 
	`UnitAnel` float   DEFAULT NULL, 
	`ValorAnel` float   DEFAULT NULL, 
	`PedidoReplicado` char(6)   DEFAULT NULL, 
	`PercReplicado` float   DEFAULT NULL, 
	`EmProducao` int(1)   DEFAULT NULL, 
	`BaseST` float   DEFAULT NULL, 
	`ValorST` float   DEFAULT NULL, 
	`TaxaFrete` float   DEFAULT NULL, 
	`Fazenda` int   DEFAULT NULL, 
	`REFERENCIAENTREGA` varchar(100)   DEFAULT NULL, 
	`UsuarioImpressao` varchar(500)   DEFAULT NULL, 
	`ValorFaturado` float   DEFAULT NULL, 
	`Convenio` int   DEFAULT NULL, 
	`LimiteConvenio` float   DEFAULT NULL, 
	`Dependente` varchar(100)   DEFAULT NULL, 
	`EncerradoProducao` int(1)   DEFAULT NULL, 
	`FlagCupomFiscal` int(1)   DEFAULT NULL, 
	`Processado` int(1)   DEFAULT NULL, 
	`Parcelas` int   DEFAULT NULL, 
	`PrazoEntregaDe` datetime   DEFAULT NULL, 
	`PesoLiquido` float   DEFAULT NULL, 
	`PesoBruto` float   DEFAULT NULL, 
	`EntregaFutura` int(1)   DEFAULT NULL, 
	`ValorIPI` float   DEFAULT NULL, 
	`Carga` int   DEFAULT NULL, 
	`Bonificacao` int(1)   DEFAULT NULL, 
	`BaseIPI` float   DEFAULT NULL, 
	`Transferencia` int(1) NOT NULL  , 
	`TaxaAlbum` float   DEFAULT NULL, 
	`Meses` int   DEFAULT NULL, 
	`TabPrecoPersonalizada` int   DEFAULT NULL, 
	`Perc_O` float   DEFAULT NULL, 
	`Perc_G` float   DEFAULT NULL, 
	`Direto` int(1)   DEFAULT NULL, 
	`ComissaoDireto` int   DEFAULT NULL, 
	`ServicoSoldado` int(1)   DEFAULT NULL, 
	`Soldado` int(1)   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`JustificativaAtraso` varchar(200)   DEFAULT NULL, 
	`Veiculo` char(8)   DEFAULT NULL, 
	`PercAcrescimoDia` float   DEFAULT NULL, 
	`ValorAcrescimoDia` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Pedidos_itens`;
CREATE TABLE Lanc_Pedidos_itens (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`VALOR_DESCONTO` float   DEFAULT NULL, 
	`TAXA_DESC` float   DEFAULT NULL, 
	`EncerradoFaturado` int(1)   DEFAULT NULL, 
	`EncerradoEntregue` int(1)   DEFAULT NULL, 
	`PrecoBase` float   DEFAULT NULL, 
	`Producao` varchar(6)   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`QUANTIDADEPRINCIPAL` float   DEFAULT NULL, 
	`VALOR_BASE` float   DEFAULT NULL, 
	`ARMADO` int(1)   DEFAULT NULL, 
	`VLRCALC` float   DEFAULT NULL, 
	`AdicionalProduto` varchar(200)   DEFAULT NULL, 
	`SequenciaArmado` int   DEFAULT NULL, 
	`DescricaoArmado` varchar(200)   DEFAULT NULL, 
	`Baixado` int(1)   DEFAULT NULL, 
	`Saldo` float   DEFAULT NULL, 
	`ValorDevolucao` float   DEFAULT NULL, 
	`QtdeDevolucao` float   DEFAULT NULL, 
	`ServicoArmado` int(1)   DEFAULT NULL, 
	`ServicoCorteDobra` int(1)   DEFAULT NULL, 
	`EstoqueAtual` float   DEFAULT NULL, 
	`UsoConsumo` int(1)   DEFAULT NULL, 
	`AbaixoTabela` char(1)   DEFAULT NULL, 
	`ValorAcrescimo` float   DEFAULT NULL, 
	`Comissao` float   DEFAULT NULL, 
	`Linha` char(6)   DEFAULT NULL, 
	`BaseIPI` float   DEFAULT NULL, 
	`ValorIPI` float   DEFAULT NULL, 
	`Meses` int   DEFAULT NULL, 
	`ServicoSoldado` int(1)   DEFAULT NULL, 
	`Soldado` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OrcamentoAnual`;
CREATE TABLE Lanc_OrcamentoAnual (
	`Filial` int NOT NULL  , 
	`Ano` char(4) NOT NULL  , 
	`Seq` int NOT NULL  , 
	`DescContaCusto` varchar(50)   DEFAULT NULL, 
	`MediaOrcado` float   DEFAULT NULL, 
	`TotalOrcado` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OrdemServicoItens`;
CREATE TABLE Lanc_OrdemServicoItens (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`ValorUnitario` float   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OrdemServicoItensAlmoxarifado`;
CREATE TABLE Lanc_OrdemServicoItensAlmoxarifado (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Produto` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`ValorUnitario` float   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `lanc_marketing_Telefone`;
CREATE TABLE lanc_marketing_Telefone (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`Telefone` char(11)   DEFAULT NULL, 
	`Ramal` char(15)   DEFAULT NULL, 
	`Tipo` char(50)   DEFAULT NULL, 
	`Contato` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Promissoria_Avulsa_Entradas`;
CREATE TABLE Lanc_Promissoria_Avulsa_Entradas (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`SeqLinha` int NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LANC_PEDIDOS_PENDENTE`;
CREATE TABLE LANC_PEDIDOS_PENDENTE (
	`ID_LANC_PEDIDOS_PENDENTE` int NOT NULL  , 
	`FILIAL` int   DEFAULT NULL, 
	`DOCUMENTO` char(6)   DEFAULT NULL, 
	`SEQUENCIA` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`QUANTIDADEPRINCIPAL` float   DEFAULT NULL, 
	`ARMADO` int(1)   DEFAULT NULL, 
	`SEQUENCIAARMADO` int   DEFAULT NULL, 
	`REFERENCIA` varchar(70)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Pedidos_Vencimento`;
CREATE TABLE Lanc_Pedidos_Vencimento (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DIAS` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`CondPagamento` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Pedidos_Itens_Personalizados_Ferros`;
CREATE TABLE Lanc_Pedidos_Itens_Personalizados_Ferros (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` varchar(6) NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`SequenciaLanc` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`DOBRA1` float   DEFAULT NULL, 
	`DOBRA2` float   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`QUANTIDADEPRINCIPAL` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_SERVICO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`VLRCALC` float   DEFAULT NULL, 
	`AbaixoTabela` char(1)   DEFAULT NULL, 
	`Comissao` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Promissoria_Avulsa`;
CREATE TABLE Lanc_Promissoria_Avulsa (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Loteamento` int   DEFAULT NULL, 
	`NumLote` char(6)   DEFAULT NULL, 
	`ValorVenda` float   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL, 
	`ValorEntrada` float   DEFAULT NULL, 
	`QtdeParcEntrada` int   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`VencimentoEntrada` datetime   DEFAULT NULL, 
	`Corretor` int   DEFAULT NULL, 
	`ValorContrato` float   DEFAULT NULL, 
	`TaxaComissao` float   DEFAULT NULL, 
	`ValorComissao` float   DEFAULT NULL, 
	`PESSOA` char(1)   DEFAULT NULL, 
	`CPF_CGC` varchar(18)   DEFAULT NULL, 
	`ENDERECO` varchar(70)   DEFAULT NULL, 
	`BAIRRO` varchar(30)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`NUMERO` varchar(30)   DEFAULT NULL, 
	`DescricaoCliente` varchar(70)   DEFAULT NULL, 
	`DescricaoLoteamento` varchar(255)   DEFAULT NULL, 
	`Quadra` varchar(4)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Pedidos_Itens_Personalizados`;
CREATE TABLE Lanc_Pedidos_Itens_Personalizados (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DESCRICAO` varchar(300)   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`COMPRIMENTO` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`ARAME` float   DEFAULT NULL, 
	`PESOARAME` float   DEFAULT NULL, 
	`ESTRIBO` float   DEFAULT NULL, 
	`EstriboQuantidade` float   DEFAULT NULL, 
	`EstriboEspacamento` float   DEFAULT NULL, 
	`EstriboDimensao1` float   DEFAULT NULL, 
	`EstriboDimensao2` float   DEFAULT NULL, 
	`PESOESTRIBO` float   DEFAULT NULL, 
	`VALOR_DESCONTO` float   DEFAULT NULL, 
	`TAXA_DESC` float   DEFAULT NULL, 
	`PRECOBASE` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`TotalPeso` float   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL, 
	`PercArame` float   DEFAULT NULL, 
	`UnitArame` float   DEFAULT NULL, 
	`UnitEstribo` float   DEFAULT NULL, 
	`MTLinear` float   DEFAULT NULL, 
	`PercMO` float   DEFAULT NULL, 
	`ValorMO` float   DEFAULT NULL, 
	`TotalGeral` float   DEFAULT NULL, 
	`ValorMetroLinear` float   DEFAULT NULL, 
	`totalMO` float   DEFAULT NULL, 
	`ColunaViga` int   DEFAULT NULL, 
	`VariacaoPeso` float   DEFAULT NULL, 
	`TIPO` char(1)   DEFAULT NULL, 
	`FerroSapata` int   DEFAULT NULL, 
	`QtdeSapata1` float   DEFAULT NULL, 
	`QtdeSapata2` float   DEFAULT NULL, 
	`LarguraSapata` float   DEFAULT NULL, 
	`ComprimentoSapata` float   DEFAULT NULL, 
	`AlturaSapata` float   DEFAULT NULL, 
	`Diametro` float   DEFAULT NULL, 
	`Metragem1` float   DEFAULT NULL, 
	`PesoSapata` float   DEFAULT NULL, 
	`UnitSapata` float   DEFAULT NULL, 
	`Metragem2` float   DEFAULT NULL, 
	`FerroEstriboRedondo` int   DEFAULT NULL, 
	`PesoEstriboRedondo` float   DEFAULT NULL, 
	`UnitEstriboRedondo` float   DEFAULT NULL, 
	`ReducaoEstribo` float   DEFAULT NULL, 
	`ComplementoDescricao` varchar(50)   DEFAULT NULL, 
	`Observacao` varchar(300)   DEFAULT NULL, 
	`EstriboPronto` int   DEFAULT NULL, 
	`FerroAnel` int   DEFAULT NULL, 
	`QtdeAnel` float   DEFAULT NULL, 
	`PesoAnel` float   DEFAULT NULL, 
	`UnitAnel` float   DEFAULT NULL, 
	`ValorAnel` float   DEFAULT NULL, 
	`MetragemAnel` float   DEFAULT NULL, 
	`TipoSapata` char(1)   DEFAULT NULL, 
	`AbaixoTabela` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Promissoria_Avulsa_Entradas_TEMP`;
CREATE TABLE Lanc_Promissoria_Avulsa_Entradas_TEMP (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`SeqLinha` int NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Requisicao_Itens`;
CREATE TABLE Lanc_Requisicao_Itens (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`GRUPO` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QTDEREQUISICAO` float   DEFAULT NULL, 
	`QTDESAIDA` float   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LANC_TELEMARKETING`;
CREATE TABLE LANC_TELEMARKETING (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DataAtendimento` datetime   DEFAULT NULL, 
	`Descricao` text(2147483647)   DEFAULT NULL, 
	`DataRetorno` datetime   DEFAULT NULL, 
	`SeqRetorno` int   DEFAULT NULL, 
	`Usuario` varchar(200)   DEFAULT NULL, 
	`Contato` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Transferencia`;
CREATE TABLE Lanc_Transferencia (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`EMISSAO` datetime   DEFAULT NULL, 
	`Filial_Para` int   DEFAULT NULL, 
	`encerrado` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Pedido` char(6)   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Reserva_Lotes`;
CREATE TABLE Lanc_Reserva_Lotes (
	`ID_LANC_RESERVA_LOTES` int NOT NULL  , 
	`Loteamento` int NOT NULL  , 
	`NumLote` char(6) NOT NULL  , 
	`Corretor` varchar(3)   DEFAULT NULL, 
	`DataReserva` datetime   DEFAULT NULL, 
	`HoraReserva` char(8)   DEFAULT NULL, 
	`ObservacaoReseva` varchar(4000)   DEFAULT NULL, 
	`flagCancelada` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Requisicao`;
CREATE TABLE Lanc_Requisicao (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` int NOT NULL  , 
	`NOTAFISCAL` char(6)   DEFAULT NULL, 
	`DATAEMISSAO` datetime   DEFAULT NULL, 
	`SOLICITANTE` varchar(50)   DEFAULT NULL, 
	`OBSERVACAO` varchar(250)   DEFAULT NULL, 
	`FLAGCANCELADA` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Transferencia_itens`;
CREATE TABLE Lanc_Transferencia_itens (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`movim_item` int NOT NULL  , 
	`quantidade` float   DEFAULT NULL, 
	`item` int   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`QtdePrincipal` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_TransferenciaProdutos`;
CREATE TABLE Lanc_TransferenciaProdutos (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`EMISSAO` datetime   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`encerrado` int(1)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Pedido` char(6)   DEFAULT NULL, 
	`Simbolica` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_TransferenciaProdutos_Itens`;
CREATE TABLE Lanc_TransferenciaProdutos_Itens (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`movim_item` int NOT NULL  , 
	`quantidade` float   DEFAULT NULL, 
	`item` int   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`QtdePrincipal` float   DEFAULT NULL, 
	`TipoMovimento` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_TrocaDuplicatas`;
CREATE TABLE Lanc_TrocaDuplicatas (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Emissao` datetime   DEFAULT NULL, 
	`Contato` varchar(50)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`PeriodoDe` datetime   DEFAULT NULL, 
	`PeriodoAte` datetime   DEFAULT NULL, 
	`Banco` int   DEFAULT NULL, 
	`Nro_conta` varchar(15)   DEFAULT NULL, 
	`Observacao` varchar(200)   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`Despesas` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`JurosTroca` float   DEFAULT NULL, 
	`TaxaDocumento` float   DEFAULT NULL, 
	`DataBaixa` datetime   DEFAULT NULL, 
	`ValorLiquido` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_TrocaDuplicatas_Duplicatas`;
CREATE TABLE Lanc_TrocaDuplicatas_Duplicatas (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`idSeq` int NOT NULL  , 
	`FilialDup` int   DEFAULT NULL, 
	`Duplicata` varchar(6)   DEFAULT NULL, 
	`Serie` varchar(3)   DEFAULT NULL, 
	`Sequencia` varchar(10)   DEFAULT NULL, 
	`Valor_Duplic` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote`;
CREATE TABLE Lanc_VendasLote (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Loteamento` int   DEFAULT NULL, 
	`NumLote` char(6)   DEFAULT NULL, 
	`ValorVenda` float   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL, 
	`ValorEntrada` float   DEFAULT NULL, 
	`QtdeParcEntrada` int   DEFAULT NULL, 
	`QtdeParcFinanc` int   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL, 
	`NotaFiscal` varchar(6)   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`VencimentoEntrada` datetime   DEFAULT NULL, 
	`Corretor` int   DEFAULT NULL, 
	`AutorizadoContrato` int(1)   DEFAULT NULL, 
	`AutorizadoPor` varchar(500)   DEFAULT NULL, 
	`DescontoParcela` float   DEFAULT NULL, 
	`ValorContrato` float   DEFAULT NULL, 
	`DataAtualizacao_Reembolso` datetime   DEFAULT NULL, 
	`HoraAtualizacao_Reembolso` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao_Reembolso` char(3)   DEFAULT NULL, 
	`FlagDesistencia` int(1)   DEFAULT NULL, 
	`VencimentoReembolso` datetime   DEFAULT NULL, 
	`EmissaoReembolso` datetime   DEFAULT NULL, 
	`MotivoReembolso` varchar(1000)   DEFAULT NULL, 
	`ValorLiquidado` float   DEFAULT NULL, 
	`ValorALiquidar` float   DEFAULT NULL, 
	`TaxaImpostos` float   DEFAULT NULL, 
	`TaxaADM` float   DEFAULT NULL, 
	`TotalReembolso` float   DEFAULT NULL, 
	`TaxaComissao` float   DEFAULT NULL, 
	`FilialReembolso` int   DEFAULT NULL, 
	`SerieReembolso` varchar(3)   DEFAULT NULL, 
	`NotaFiscalReembolso` varchar(15)   DEFAULT NULL, 
	`TipoReembolso` char(1)   DEFAULT NULL, 
	`EnviadoCartaEscritura` int(1)   DEFAULT NULL, 
	`GeradoMultaEscritura` int(1)   DEFAULT NULL, 
	`ValorComissao` float   DEFAULT NULL, 
	`VencimentoMulta` datetime   DEFAULT NULL, 
	`PercMulta` float   DEFAULT NULL, 
	`ValorMulta` float   DEFAULT NULL, 
	`DuplicataMulta` varchar(6)   DEFAULT NULL, 
	`SerieMulta` varchar(3)   DEFAULT NULL, 
	`ImpContrato` int   DEFAULT NULL, 
	`Testemunha1` varchar(100)   DEFAULT NULL, 
	`CPFTestemunha1` varchar(50)   DEFAULT NULL, 
	`Testemunha2` varchar(100)   DEFAULT NULL, 
	`CPFTestemunha2` varchar(50)   DEFAULT NULL, 
	`SociosNaoGeramIR` int(1)   DEFAULT NULL, 
	`DataRenegociacao` datetime   DEFAULT NULL, 
	`ValorRenegociacao` float   DEFAULT NULL, 
	`QtdeParcRenegociacao` int   DEFAULT NULL, 
	`VencimentoRenegociacao` datetime   DEFAULT NULL, 
	`ObservacaoRenegociacao` varchar(500)   DEFAULT NULL, 
	`ResponsavelRenegociacao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Corretor`;
CREATE TABLE Lanc_VendasLote_Corretor (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Corretor` int NOT NULL  , 
	`Comissao` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Clientes`;
CREATE TABLE Lanc_VendasLote_Clientes (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Cliente` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Entradas_TEMP`;
CREATE TABLE Lanc_VendasLote_Entradas_TEMP (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`NCT` int(1)   DEFAULT NULL, 
	`SeqLinha` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_IPTU`;
CREATE TABLE Lanc_VendasLote_IPTU (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`SeqLinha` int NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`NCT` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_ClientesAnteriores`;
CREATE TABLE Lanc_VendasLote_ClientesAnteriores (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Seq` int NOT NULL  , 
	`Cliente` int NOT NULL  , 
	`DataTransf` datetime   DEFAULT NULL, 
	`Usuario` varchar(200)   DEFAULT NULL, 
	`Historico` text(2147483647)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Entradas`;
CREATE TABLE Lanc_VendasLote_Entradas (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`NCT` int(1)   DEFAULT NULL, 
	`SeqLinha` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Renegociacao_TEMP`;
CREATE TABLE Lanc_VendasLote_Renegociacao_TEMP (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`SeqLinha` int NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_IPTU_TEMP`;
CREATE TABLE Lanc_VendasLote_IPTU_TEMP (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`SeqLinha` int NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`NCT` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Renegociacao`;
CREATE TABLE Lanc_VendasLote_Renegociacao (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`SeqLinha` int NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Reajustes_LOGS`;
CREATE TABLE Lanc_VendasLote_Reajustes_LOGS (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Seq` int NOT NULL  , 
	`DATA_LOG` datetime   DEFAULT NULL, 
	`HORA_LOG` varchar(50)   DEFAULT NULL, 
	`USUARIO` varchar(3)   DEFAULT NULL, 
	`VERSAO_SISTEMA` varchar(100)   DEFAULT NULL, 
	`LOG_REAJUSTE` text(2147483647)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Financ`;
CREATE TABLE Lanc_VendasLote_Financ (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Sequencia` varchar(5) NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_Reajustes`;
CREATE TABLE Lanc_VendasLote_Reajustes (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Seq` int NOT NULL  , 
	`DataReajuste` datetime   DEFAULT NULL, 
	`ValoAnterior` float   DEFAULT NULL, 
	`NovoValor` float   DEFAULT NULL, 
	`TaxaReajuste` float   DEFAULT NULL, 
	`Parcela` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ValorCorrecao` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LancamentosAdiantamentoFornecedor`;
CREATE TABLE LancamentosAdiantamentoFornecedor (
	`FILIAL` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Fornecedor` int   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Operacao` char(1) NOT NULL  , 
	`Observacao` text(2147483647)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`BancoAdiantamento` int   DEFAULT NULL, 
	`ContaAdiantamento` varchar(50)   DEFAULT NULL, 
	`BancoCredito` int   DEFAULT NULL, 
	`ContaCredito` varchar(50)   DEFAULT NULL, 
	`Recibobaixa` numeric   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DataAtualizacao_Alteracao` datetime   DEFAULT NULL, 
	`HoraAtualizacao_Alteracao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao_Alteracao` char(3)   DEFAULT NULL, 
	`DocumentoBancario` char(15)   DEFAULT NULL, 
	`ReciboBancario` int   DEFAULT NULL, 
	`SeriePagar` char(3)   DEFAULT NULL, 
	`DocumentoPagar` varchar(6)   DEFAULT NULL, 
	`DocumentoADT` varchar(6)   DEFAULT NULL, 
	`Apelido` char(20)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LancProvisaoFluxo`;
CREATE TABLE LancProvisaoFluxo (
	`Filial` int NOT NULL  , 
	`Mes` int NOT NULL  , 
	`Ano` int NOT NULL  , 
	`Fornecedor` int NOT NULL  , 
	`Valor` float   DEFAULT NULL, 
	`DiaVencimento` int   DEFAULT NULL, 
	`Usuario` char(3)   DEFAULT NULL, 
	`Efetivado` int(1)   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LancamentosCreditosClientes`;
CREATE TABLE LancamentosCreditosClientes (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Operacao` char(1)   DEFAULT NULL, 
	`Observacao` text(2147483647)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`BancoCredito` int   DEFAULT NULL, 
	`ContaCredito` varchar(50)   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DataAtualizacao_Alteracao` datetime   DEFAULT NULL, 
	`HoraAtualizacao_Alteracao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao_Alteracao` char(3)   DEFAULT NULL, 
	`DocumentoBancario` varchar(15)   DEFAULT NULL, 
	`ReciboBancario` int   DEFAULT NULL, 
	`SerieReceber` char(3)   DEFAULT NULL, 
	`DocumentoReceber` varchar(6)   DEFAULT NULL, 
	`Apelido` char(20)   DEFAULT NULL, 
	`BancoDebito` int   DEFAULT NULL, 
	`ContaDebito` varchar(50)   DEFAULT NULL, 
	`DocumentoADT` varchar(6)   DEFAULT NULL, 
	`Pedido` char(6)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LancBoleto`;
CREATE TABLE LancBoleto (
	`Filial` int NOT NULL  , 
	`Documento` char(8) NOT NULL  , 
	`Banco` int NOT NULL  , 
	`Agencia` char(4) NOT NULL  , 
	`ContaCorrente` varchar(15)   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`FlagGeracao` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LancBoleto_Dup`;
CREATE TABLE LancBoleto_Dup (
	`Filial` int NOT NULL  , 
	`Documento` char(8) NOT NULL  , 
	`Seq` int NOT NULL  , 
	`Serie` char(3)   DEFAULT NULL, 
	`Duplicata` char(6)   DEFAULT NULL, 
	`Sequencia` varchar(10)   DEFAULT NULL, 
	`CodBarras` varchar(44)   DEFAULT NULL, 
	`LinhaDigitavel` varchar(62)   DEFAULT NULL, 
	`TipoBoleto` char(1)   DEFAULT NULL, 
	`NossoNumero` char(11)   DEFAULT NULL, 
	`FilialDup` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_VendasLote_SociosAnteriores`;
CREATE TABLE Lanc_VendasLote_SociosAnteriores (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6) NOT NULL  , 
	`Cliente` int NOT NULL  , 
	`Socio` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LINK_CONEXAO_REMOTA`;
CREATE TABLE LINK_CONEXAO_REMOTA (
	`ID_LINK_CONEXAO_REMOTA` int NOT NULL  , 
	`DS_PROGRAMA` varchar(50)   DEFAULT NULL, 
	`DS_EXEC` varchar(100)   DEFAULT NULL, 
	`DS_LINK` varchar(4000)   DEFAULT NULL, 
	`DS_OBSERVACOES` varchar(4000)   DEFAULT NULL, 
	`CK_APENAS_IE` int(1)   DEFAULT NULL, 
	`ORDEM_EXIBICAO` int   DEFAULT NULL, 
	`CK_INATIVO` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LOG_CDI`;
CREATE TABLE LOG_CDI (
	`ID_LOG_CDI` int NOT NULL  , 
	`USUARIO` char(3) NOT NULL  , 
	`TABELA` char(20) NOT NULL  , 
	`OPERACAO` char(3) NOT NULL  , 
	`DATA_HORA` datetime NOT NULL  , 
	`ID_REGISTRO` int   DEFAULT NULL, 
	`INSTRUCAO_REALIZADA` text(2147483647)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MENU_PAI`;
CREATE TABLE MENU_PAI (
	`ITEM_PAI` tinyint NOT NULL  , 
	`DESC_MENU` varchar(30)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MENU`;
CREATE TABLE MENU (
	`SEQ_MENU` int NOT NULL  , 
	`DESC_MENU` varchar(50)   DEFAULT NULL, 
	`ITEM_PAI` tinyint NOT NULL  , 
	`ITEM_MENU` varchar(100)   DEFAULT NULL, 
	`FERRAMENTA` varchar(100)   DEFAULT NULL, 
	`IDC_ADMINISTRACAO` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MARGEM_COMISSAO`;
CREATE TABLE MARGEM_COMISSAO (
	`SEQ` int NOT NULL  , 
	`MESANO` datetime   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`MARGEM` float   DEFAULT NULL, 
	`COMISSAO` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `LeituraReducaoZ`;
CREATE TABLE LeituraReducaoZ (
	`Filial` int NOT NULL  , 
	`DataReducao` datetime NOT NULL  , 
	`NUM_MAQ_REG` char(3) NOT NULL  , 
	`NUM_SER_FAB` char(20)   DEFAULT NULL, 
	`MOD_DOC_FISCAL` char(3)   DEFAULT NULL, 
	`CONT_ORD_INI` char(6)   DEFAULT NULL, 
	`CONT_ORD_FIM` char(6)   DEFAULT NULL, 
	`CONT_REDUCAO` char(6)   DEFAULT NULL, 
	`VLR_TOTAL_INI` float   DEFAULT NULL, 
	`VLR_TOTAL_FIM` float   DEFAULT NULL, 
	`Observacao` varchar(100)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`CRO` char(3)   DEFAULT NULL, 
	`CancelamentoICMS` float   DEFAULT NULL, 
	`DescontoICMS` float   DEFAULT NULL, 
	`VendaLiquida` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MOVIMENTACAO`;
CREATE TABLE MOVIMENTACAO (
	`SEQ_MOVIMENTACAO` numeric NOT NULL  , 
	`FILIAL` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`ITEM` numeric   DEFAULT NULL, 
	`DATA_MOV` datetime   DEFAULT NULL, 
	`COD_MOVIMENTO` int   DEFAULT NULL, 
	`TIPO_DE_MOVIMENTO` char(1)   DEFAULT NULL, 
	`COD_CLIENTE` varchar(14)   DEFAULT NULL, 
	`FORNEC` varchar(14)   DEFAULT NULL, 
	`CODIGO` int   DEFAULT NULL, 
	`DOCUMENTO` char(10)   DEFAULT NULL, 
	`QUANTIDADE_MOV` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`ESTOQUE_ANTERIOR` float   DEFAULT NULL, 
	`ESTOQUE_ATUAL` float   DEFAULT NULL, 
	`VALOR_ANTERIOR` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`PRECO_MEDIO` float   DEFAULT NULL, 
	`CENTRO_CUSTO` int   DEFAULT NULL, 
	`NATUREZA` varchar(6)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MOTIVO_DEVOLUCAO`;
CREATE TABLE MOTIVO_DEVOLUCAO (
	`ID_MOTIVO_DEVOLUCAO` int NOT NULL  , 
	`DS_MOTIVO_DEVOLUCAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MOTORISTA`;
CREATE TABLE MOTORISTA (
	`ID_MOTORISTA` int NOT NULL  , 
	`DS_MOTORISTA` varchar(50)   DEFAULT NULL, 
	`CPF` char(18)   DEFAULT NULL, 
	`CNH` char(11)   DEFAULT NULL, 
	`CATEGORIA` char(2)   DEFAULT NULL, 
	`VALIDADE` datetime   DEFAULT NULL, 
	`CEP` char(9)   DEFAULT NULL, 
	`ENDERECO` varchar(50)   DEFAULT NULL, 
	`NUMERO` varchar(20)   DEFAULT NULL, 
	`COMPLEMENTO` varchar(30)   DEFAULT NULL, 
	`BAIRRO` varchar(40)   DEFAULT NULL, 
	`ID_CIDADE` int   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`FONE` char(11)   DEFAULT NULL, 
	`EMAIL` varchar(100)   DEFAULT NULL, 
	`CK_INATIVO` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MOV_ESTOQUE_ITENS`;
CREATE TABLE MOV_ESTOQUE_ITENS (
	`FILIAL` int NOT NULL  , 
	`NOTA_FISCAL` char(10) NOT NULL  , 
	`SERIE` char(3) NOT NULL  , 
	`FORNEC` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DATA_MOVIMENTO` datetime   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`PRECO_MEDIO` float   DEFAULT NULL, 
	`TIPO_DE_MOVIMENTO` char(2)   DEFAULT NULL, 
	`TELAMOVIMENTACAO` varchar(100)   DEFAULT NULL, 
	`FlagMovimento` char(3)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ImplantacaoSaldo` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MovimentoContaCustoEmissao`;
CREATE TABLE MovimentoContaCustoEmissao (
	`Lancamento` numeric NOT NULL  , 
	`Filial` int   DEFAULT NULL, 
	`Documento` char(20)   DEFAULT NULL, 
	`Fornec` int   DEFAULT NULL, 
	`Sequencia` varchar(50)   DEFAULT NULL, 
	`Recibobaixa` int   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Pagamento` datetime   DEFAULT NULL, 
	`GrupoConta` int   DEFAULT NULL, 
	`SubGrupoConta` int   DEFAULT NULL, 
	`SeqCtaCusto` int   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`NumLanc` int   DEFAULT NULL, 
	`Banco` int   DEFAULT NULL, 
	`Nro_Conta` varchar(20)   DEFAULT NULL, 
	`TipoConta` char(1)   DEFAULT NULL, 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`Descricao1` varchar(50)   DEFAULT NULL, 
	`Descricao2` varchar(50)   DEFAULT NULL, 
	`Descricao3` varchar(50)   DEFAULT NULL, 
	`Descricao4` varchar(50)   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL, 
	`Competencia` datetime   DEFAULT NULL, 
	`DataCompetencia` char(7)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MovimentoContaCustoPagamento`;
CREATE TABLE MovimentoContaCustoPagamento (
	`Lancamento` numeric NOT NULL  , 
	`Filial` int   DEFAULT NULL, 
	`Documento` char(20)   DEFAULT NULL, 
	`Fornec` int   DEFAULT NULL, 
	`Sequencia` varchar(50)   DEFAULT NULL, 
	`Recibobaixa` int   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Pagamento` datetime   DEFAULT NULL, 
	`GrupoConta` int   DEFAULT NULL, 
	`SubGrupoConta` int   DEFAULT NULL, 
	`SeqCtaCusto` int   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`NumLanc` int   DEFAULT NULL, 
	`Banco` int   DEFAULT NULL, 
	`Nro_Conta` varchar(20)   DEFAULT NULL, 
	`TipoConta` char(1)   DEFAULT NULL, 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`Descricao1` varchar(50)   DEFAULT NULL, 
	`Descricao2` varchar(50)   DEFAULT NULL, 
	`Descricao3` varchar(50)   DEFAULT NULL, 
	`Descricao4` varchar(50)   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL, 
	`Competencia` datetime   DEFAULT NULL, 
	`DataCompetencia` char(7)   DEFAULT NULL, 
	`DataEfetivacao` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_DEV_NFE`;
CREATE TABLE NF_RECEBER_DEV_NFE (
	`FILIAL` int   DEFAULT NULL, 
	`SERIE` char(3)   DEFAULT NULL, 
	`NOTAFISCAL` varchar(6)   DEFAULT NULL, 
	`SERIEENTRADA` char(3)   DEFAULT NULL, 
	`NOTAFISCALENTRADA` varchar(6)   DEFAULT NULL, 
	`DATAEMISSAO` datetime   DEFAULT NULL, 
	`CHAVENFE` varchar(44)   DEFAULT NULL, 
	`MODELO` char(2)   DEFAULT NULL, 
	`NRO_ECF` char(3)   DEFAULT NULL, 
	`NRO_COO` char(6)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_DOCUMENTOS`;
CREATE TABLE NF_RECEBER_DOCUMENTOS (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Observacao` text   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ConsultadoPor` varchar(200)   DEFAULT NULL, 
	`CaminhoArquivo` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_CORRECAO`;
CREATE TABLE NF_RECEBER_CORRECAO (
	`FILIAL` int NOT NULL  , 
	`SERIE` char(3) NOT NULL  , 
	`NOTAFISCAL` char(6) NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`CodCorrecao` int   DEFAULT NULL, 
	`Descricao` char(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ProtocoloAutorizacao` varchar(20)   DEFAULT NULL, 
	`Evento` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_CONDICAO`;
CREATE TABLE NF_RECEBER_CONDICAO (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`CondPagamento` int NOT NULL  , 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_CONVENIOS`;
CREATE TABLE NF_RECEBER_CONVENIOS (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`FilialConvenio` int NOT NULL  , 
	`SerieConvenio` char(3) NOT NULL  , 
	`NotaFiscalConvenio` char(6) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER`;
CREATE TABLE NF_RECEBER (
	`FILIAL` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`DataSaida` datetime   DEFAULT NULL, 
	`TIPONOTA` char(2)   DEFAULT NULL, 
	`Especie` int   DEFAULT NULL, 
	`CodNatureza` numeric   DEFAULT NULL, 
	`Natureza` varchar(6)   DEFAULT NULL, 
	`TotalItens` float   DEFAULT NULL, 
	`TotalNota` float   DEFAULT NULL, 
	`TipoNotaFiscal` char(1)   DEFAULT NULL, 
	`CondPagamento` int   DEFAULT NULL, 
	`FlagImpressao` int(1)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`BaseIcms` decimal   DEFAULT NULL, 
	`AliquotaIcms` decimal   DEFAULT NULL, 
	`ValorIcms` decimal   DEFAULT NULL, 
	`BaseIpi` decimal   DEFAULT NULL, 
	`AliquotaIpi` decimal   DEFAULT NULL, 
	`ValorIpi` decimal   DEFAULT NULL, 
	`Vendedor` int   DEFAULT NULL, 
	`TaxaComissao` decimal   DEFAULT NULL, 
	`ValorSeguro` decimal   DEFAULT NULL, 
	`ValorFrete` decimal   DEFAULT NULL, 
	`FreteIncluso` int(1)   DEFAULT NULL, 
	`PesoLiquido` decimal   DEFAULT NULL, 
	`PesoBruto` decimal   DEFAULT NULL, 
	`Quantidade` decimal   DEFAULT NULL, 
	`Marca` varchar(20)   DEFAULT NULL, 
	`Numero` varchar(20)   DEFAULT NULL, 
	`EspecieMercadoria` varchar(20)   DEFAULT NULL, 
	`Placa` varchar(20)   DEFAULT NULL, 
	`Estado` varchar(2)   DEFAULT NULL, 
	`FreteConta` char(1)   DEFAULT NULL, 
	`Transportadora` int   DEFAULT NULL, 
	`LocalEntrega` varchar(300)   DEFAULT NULL, 
	`DadosAdicional1` varchar(80)   DEFAULT NULL, 
	`DadosAdicional2` varchar(70)   DEFAULT NULL, 
	`DadosAdicional3` varchar(70)   DEFAULT NULL, 
	`DadosAdicional4` varchar(70)   DEFAULT NULL, 
	`DadosAdicional5` varchar(70)   DEFAULT NULL, 
	`DadosAdicional6` varchar(70)   DEFAULT NULL, 
	`DadosAdicional7` varchar(70)   DEFAULT NULL, 
	`DadosAdicional8` varchar(70)   DEFAULT NULL, 
	`DadosAdicional9` varchar(70)   DEFAULT NULL, 
	`DadosAdicional10` varchar(70)   DEFAULT NULL, 
	`DescontoPerc` decimal   DEFAULT NULL, 
	`Desdobra` char(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DescontoBaseReduzida` decimal   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`parcelas` int   DEFAULT NULL, 
	`BOLETO` varchar(15)   DEFAULT NULL, 
	`OBSERVACAO` varchar(255)   DEFAULT NULL, 
	`FlagReimpressao` int(1)   DEFAULT NULL, 
	`SituacaoTributaria` int   DEFAULT NULL, 
	`ContaDebito` char(5)   DEFAULT NULL, 
	`ContaCredito` char(5)   DEFAULT NULL, 
	`isentas` decimal   DEFAULT NULL, 
	`diferida` decimal   DEFAULT NULL, 
	`substituicao` decimal   DEFAULT NULL, 
	`suspensa` decimal   DEFAULT NULL, 
	`nao_tributadas` decimal   DEFAULT NULL, 
	`outras` decimal   DEFAULT NULL, 
	`ParcelaBaseCalculoReduzida` decimal   DEFAULT NULL, 
	`ObservacaoProduto` varchar(50)   DEFAULT NULL, 
	`NotaRemessa` char(6)   DEFAULT NULL, 
	`NotaRemessaSerie` char(3)   DEFAULT NULL, 
	`Motorista` char(50)   DEFAULT NULL, 
	`nf_entrada_devolucao` varchar(6)   DEFAULT NULL, 
	`Fechamento` varchar(6)   DEFAULT NULL, 
	`CATEGORIA_CONTABIL_CONTA` char(5)   DEFAULT NULL, 
	`MARGEMLUCRO` decimal   DEFAULT NULL, 
	`FORMAPAGTO` varchar(50)   DEFAULT NULL, 
	`ORDEMCARREG` int   DEFAULT NULL, 
	`AVALISTA` varchar(50)   DEFAULT NULL, 
	`CPF_CGC_AVALISTA` varchar(18)   DEFAULT NULL, 
	`GERA_DUPLICATA` int(1)   DEFAULT NULL, 
	`PEDIDO` char(6)   DEFAULT NULL, 
	`PRACAPAGAMENTO` varchar(150)   DEFAULT NULL, 
	`PMINTER` char(10)   DEFAULT NULL, 
	`PEDIDOCLIENTE` char(50)   DEFAULT NULL, 
	`TRANSMITIDOLF` int(1)   DEFAULT NULL, 
	`MOTIVOCANC` varchar(50)   DEFAULT NULL, 
	`IncideFreteICMS` int(1)   DEFAULT NULL, 
	`VALORDESCONTO` float   DEFAULT NULL, 
	`SEGURADORA` datetime   DEFAULT NULL, 
	`NFPAULISTA` datetime   DEFAULT NULL, 
	`RETIRA` int(1)   DEFAULT NULL, 
	`CORRIDA` varchar(100)   DEFAULT NULL, 
	`OBSERVACAONOTA` varchar(100)   DEFAULT NULL, 
	`NUMEROFORMULARIO` char(10)   DEFAULT NULL, 
	`CEPENTREGA` varchar(9)   DEFAULT NULL, 
	`Tabela` int   DEFAULT NULL, 
	`NumeroEntrega` varchar(50)   DEFAULT NULL, 
	`EntregaNoturna` int(1)   DEFAULT NULL, 
	`NaoGerarComissao` int(1)   DEFAULT NULL, 
	`SubSerie` char(3)   DEFAULT NULL, 
	`Canhoto` int(1)   DEFAULT NULL, 
	`ObservacaoCanhoto` varchar(500)   DEFAULT NULL, 
	`StatusEntrega` int   DEFAULT NULL, 
	`ObservacaoEntrega` varchar(500)   DEFAULT NULL, 
	`SequenciaEntrega` int   DEFAULT NULL, 
	`Atendente` int   DEFAULT NULL, 
	`TotalDevolucao` float   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL, 
	`ValorSubstituicao` float   DEFAULT NULL, 
	`BaseSubstituicao` float   DEFAULT NULL, 
	`TipoAmbiente` char(1)   DEFAULT NULL, 
	`QtdeItens` decimal   DEFAULT NULL, 
	`Contrato` varchar(10)   DEFAULT NULL, 
	`Tributacao` int(1)   DEFAULT NULL, 
	`ValorDeduzirComissao` float   DEFAULT NULL, 
	`ValorAcrescimo` float   DEFAULT NULL, 
	`DadosAdicionaisNFe` text(2147483647)   DEFAULT NULL, 
	`OutrasDespesas` float   DEFAULT NULL, 
	`TP_FORM` char(3)   DEFAULT NULL, 
	`DATAATUALIZACAO_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`AgenciaChq` varchar(10)   DEFAULT NULL, 
	`Cheque` varchar(10)   DEFAULT NULL, 
	`DescBancoChq` varchar(200)   DEFAULT NULL, 
	`ValorChq` float   DEFAULT NULL, 
	`EmissaoChq` datetime   DEFAULT NULL, 
	`VencimentoChq` datetime   DEFAULT NULL, 
	`NomeChq` varchar(50)   DEFAULT NULL, 
	`NascimentoChq` datetime   DEFAULT NULL, 
	`PessoaChq` int(1)   DEFAULT NULL, 
	`CpfCnpjChq` varchar(18)   DEFAULT NULL, 
	`RgChq` varchar(18)   DEFAULT NULL, 
	`InscricaoChq` varchar(18)   DEFAULT NULL, 
	`TelefoneChq` varchar(15)   DEFAULT NULL, 
	`ResponsavelChq` varchar(50)   DEFAULT NULL, 
	`DestinoChq` varchar(50)   DEFAULT NULL, 
	`ClienteChq` int   DEFAULT NULL, 
	`ObservacaoChq` varchar(100)   DEFAULT NULL, 
	`CidadeChq` varchar(20)   DEFAULT NULL, 
	`Fazenda` int   DEFAULT NULL, 
	`HoraSaida` char(8)   DEFAULT NULL, 
	`ValorOutras` float   DEFAULT NULL, 
	`BaseSTRet` float   DEFAULT NULL, 
	`ValorSTRet` float   DEFAULT NULL, 
	`Agronomo` int   DEFAULT NULL, 
	`NotaRemessaFilial` int   DEFAULT NULL, 
	`SeqEntrega` int   DEFAULT NULL, 
	`ValorAcrescimoIncentivo` float   DEFAULT NULL, 
	`DataLancamento` datetime   DEFAULT NULL, 
	`Convenio` int   DEFAULT NULL, 
	`LimiteConvenio` float   DEFAULT NULL, 
	`Dependente` varchar(100)   DEFAULT NULL, 
	`CodSituacaoTributaria` char(3)   DEFAULT NULL, 
	`AutorizacaoEstoqueNegativo` varchar(100)   DEFAULT NULL, 
	`VendaCaixa` int(1)   DEFAULT NULL, 
	`Loteamento` int   DEFAULT NULL, 
	`NumLote` char(6)   DEFAULT NULL, 
	`DocVendaLote` varchar(6)   DEFAULT NULL, 
	`GeraCreditoICMS` int(1)   DEFAULT NULL, 
	`LocalExportacao` varchar(50)   DEFAULT NULL, 
	`UFExportacao` char(2)   DEFAULT NULL, 
	`DataContingencia` datetime   DEFAULT NULL, 
	`HoraContingencia` char(8)   DEFAULT NULL, 
	`JustContingencia` varchar(255)   DEFAULT NULL, 
	`FlagDenegada` int(1)   DEFAULT NULL, 
	`PesoAutomatico` int(1)   DEFAULT NULL, 
	`NumContingencia` varchar(36)   DEFAULT NULL, 
	`Autorizado` int   DEFAULT NULL, 
	`CupomFiscalManual` int(1)   DEFAULT NULL, 
	`FlagUtilizadoCredito` int(1)   DEFAULT NULL, 
	`ManutencaoVencimentos` int(1)   DEFAULT NULL, 
	`SerieFormulario` char(3)   DEFAULT NULL, 
	`Carga` int   DEFAULT NULL, 
	`LoteNFe` int   DEFAULT NULL, 
	`CodMotivoDevolucao` int   DEFAULT NULL, 
	`ValorAproxImpostos` float   DEFAULT NULL, 
	`Grupo_Conta` int   DEFAULT NULL, 
	`Sub_Grupo` int   DEFAULT NULL, 
	`Seq_Cta_Custo` int   DEFAULT NULL, 
	`ClienteBoleto` int   DEFAULT NULL, 
	`DataSaidaCanhoto` datetime   DEFAULT NULL, 
	`HoraSaidaCanhoto` char(8)   DEFAULT NULL, 
	`DataRetornoCanhoto` datetime   DEFAULT NULL, 
	`HoraRetornoCanhoto` char(8)   DEFAULT NULL, 
	`ValorFreteND` float   DEFAULT NULL, 
	`ValorDespesaND` float   DEFAULT NULL, 
	`FilialVinculada` int   DEFAULT NULL, 
	`SerieVinculada` char(3)   DEFAULT NULL, 
	`NotaFiscalVinculada` char(6)   DEFAULT NULL, 
	`Encargos` float   DEFAULT NULL, 
	`TotalServicos` float   DEFAULT NULL, 
	`ServicoSoldado` int(1)   DEFAULT NULL, 
	`Soldado` int(1)   DEFAULT NULL, 
	`Imovel` int   DEFAULT NULL, 
	`vFCPUFDest` float   DEFAULT NULL, 
	`vICMSUFDest` float   DEFAULT NULL, 
	`vICMSUFRemet` float   DEFAULT NULL, 
	`Orcamento` char(6)   DEFAULT NULL, 
	`FEDERAL` float   DEFAULT NULL, 
	`ESTADUAL` float   DEFAULT NULL, 
	`MUNICIPAL` float   DEFAULT NULL, 
	`CHAVE` varchar(10)   DEFAULT NULL, 
	`FONTE` varchar(10)   DEFAULT NULL, 
	`DadosAdicionaisIBPT` varchar(250)   DEFAULT NULL, 
	`NumProtocoloDen` varchar(15)   DEFAULT NULL, 
	`StatusNFDen` int   DEFAULT NULL, 
	`DataProtDen` datetime   DEFAULT NULL, 
	`HoraProtDen` char(8)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_IMPRESSAO_TRANSPORTADORA`;
CREATE TABLE NF_RECEBER_IMPRESSAO_TRANSPORTADORA (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` varchar(6) NOT NULL  , 
	`CNPJ` varchar(14)   DEFAULT NULL, 
	`Nome` varchar(60)   DEFAULT NULL, 
	`IE` varchar(14)   DEFAULT NULL, 
	`xEnder` varchar(60)   DEFAULT NULL, 
	`xMun` varchar(60)   DEFAULT NULL, 
	`UF` char(2)   DEFAULT NULL, 
	`ANTT` varchar(20)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_IMPORTACAO`;
CREATE TABLE NF_RECEBER_IMPORTACAO (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`DocumentoImportacao` char(10)   DEFAULT NULL, 
	`DataRegistro` datetime   DEFAULT NULL, 
	`LocalDesembaraco` varchar(60)   DEFAULT NULL, 
	`UFDesembaraco` char(2)   DEFAULT NULL, 
	`DataDesembaraco` datetime   DEFAULT NULL, 
	`NumeroAdicao` char(10)   DEFAULT NULL, 
	`SeqAdicao` char(10)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_IMPRESSAO_FILIAL`;
CREATE TABLE NF_RECEBER_IMPRESSAO_FILIAL (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` varchar(6) NOT NULL  , 
	`CNPJ` varchar(14)   DEFAULT NULL, 
	`xNome` varchar(60)   DEFAULT NULL, 
	`xFant` varchar(60)   DEFAULT NULL, 
	`xLgr` varchar(60)   DEFAULT NULL, 
	`nro` varchar(60)   DEFAULT NULL, 
	`xCpl` varchar(60)   DEFAULT NULL, 
	`xBairro` varchar(60)   DEFAULT NULL, 
	`cMun` int   DEFAULT NULL, 
	`xMun` varchar(60)   DEFAULT NULL, 
	`UF` char(2)   DEFAULT NULL, 
	`CEP` char(8)   DEFAULT NULL, 
	`cPais` int   DEFAULT NULL, 
	`xPais` varchar(60)   DEFAULT NULL, 
	`Fone` varchar(14)   DEFAULT NULL, 
	`IE` varchar(14)   DEFAULT NULL, 
	`IEST` varchar(14)   DEFAULT NULL, 
	`IM` varchar(15)   DEFAULT NULL, 
	`CNAE` varchar(7)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_IMPRESSAO_CLIENTE`;
CREATE TABLE NF_RECEBER_IMPRESSAO_CLIENTE (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` varchar(6) NOT NULL  , 
	`CNPJ` varchar(14)   DEFAULT NULL, 
	`xNome` varchar(60)   DEFAULT NULL, 
	`xLgr` varchar(60)   DEFAULT NULL, 
	`nro` varchar(60)   DEFAULT NULL, 
	`xCpl` varchar(60)   DEFAULT NULL, 
	`xBairro` varchar(60)   DEFAULT NULL, 
	`cMun` int   DEFAULT NULL, 
	`xMun` varchar(60)   DEFAULT NULL, 
	`UF` char(2)   DEFAULT NULL, 
	`CEP` char(8)   DEFAULT NULL, 
	`cPais` int   DEFAULT NULL, 
	`xPais` varchar(60)   DEFAULT NULL, 
	`Fone` varchar(14)   DEFAULT NULL, 
	`IE` varchar(14)   DEFAULT NULL, 
	`ISUF` varchar(9)   DEFAULT NULL, 
	`email` varchar(60)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_IMPRESSAO`;
CREATE TABLE NF_RECEBER_IMPRESSAO (
	`FILIAL` int NOT NULL  , 
	`SERIE` char(3) NOT NULL  , 
	`NOTAFISCAL` char(6) NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`DESCRICAO` varchar(300)   DEFAULT NULL, 
	`CLASSIFICACAO` char(10)   DEFAULT NULL, 
	`SITUACAO_TRIBUTARIA` char(10)   DEFAULT NULL, 
	`UNIDADE` char(10)   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALORUNITARIO` float   DEFAULT NULL, 
	`VALORTOTAL` float   DEFAULT NULL, 
	`ALIQUOTA` float   DEFAULT NULL, 
	`item` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_IMPORTACAO_ITENS`;
CREATE TABLE NF_RECEBER_IMPORTACAO_ITENS (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`QUANTIDADE` decimal   DEFAULT NULL, 
	`QuantidadeInformada` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`Valor_Base` float   DEFAULT NULL, 
	`VALOR_TOTAL` decimal   DEFAULT NULL, 
	`ValorTotalReais` float   DEFAULT NULL, 
	`TaxaCambio` float   DEFAULT NULL, 
	`NatOperacao` char(5)   DEFAULT NULL, 
	`Tributacao` int   DEFAULT NULL, 
	`CST_ICMS` char(3)   DEFAULT NULL, 
	`BaseIcms` decimal   DEFAULT NULL, 
	`AliquotaIcms` decimal   DEFAULT NULL, 
	`ValorIcms` decimal   DEFAULT NULL, 
	`CST_IPI` char(2)   DEFAULT NULL, 
	`BaseIpi` decimal   DEFAULT NULL, 
	`AliquotaIpi` decimal   DEFAULT NULL, 
	`ValorIpi` decimal   DEFAULT NULL, 
	`CST_PIS_COFINS` char(2)   DEFAULT NULL, 
	`Base_PIS_COFINS` float   DEFAULT NULL, 
	`PIS` float   DEFAULT NULL, 
	`COFINS` float   DEFAULT NULL, 
	`BaseII` float   DEFAULT NULL, 
	`ValorII` float   DEFAULT NULL, 
	`BaseIcmsST` float   DEFAULT NULL, 
	`ValorICMSST` float   DEFAULT NULL, 
	`ValorRateioDesconto` float   DEFAULT NULL, 
	`ValorRateioFrete` float   DEFAULT NULL, 
	`ValorRateioSeguro` float   DEFAULT NULL, 
	`ValorRateioOutras` float   DEFAULT NULL, 
	`ValorRateioIncentivo` float   DEFAULT NULL, 
	`DespesasAduaneiras` float   DEFAULT NULL, 
	`ValorIOF` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_PEDIDOS`;
CREATE TABLE NF_RECEBER_PEDIDOS (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Pedido` char(6) NOT NULL  , 
	`FilialPedido` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_ITENSNF`;
CREATE TABLE NF_RECEBER_ITENSNF (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DESCRICAO` varchar(300)   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`AliquotaIcms` float   DEFAULT NULL, 
	`SUBST_TRIBUT` char(1)   DEFAULT NULL, 
	`CLAS_FISCAL` char(1)   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_VOLUMES`;
CREATE TABLE NF_RECEBER_VOLUMES (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Volume` int NOT NULL  , 
	`Item` int NOT NULL  , 
	`Quantidade` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_ITENS_PERSONALIZADOS`;
CREATE TABLE NF_RECEBER_ITENS_PERSONALIZADOS (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` varchar(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DESCRICAO` varchar(300)   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`TIPO` char(1)   DEFAULT NULL, 
	`TotalPeso` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_PEDIDO`;
CREATE TABLE NF_RECEBER_PEDIDO (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Pedido` char(6) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NF_RECEBER_ITENS`;
CREATE TABLE NF_RECEBER_ITENS (
	`Filial` int NOT NULL  , 
	`Serie` char(3) NOT NULL  , 
	`NotaFiscal` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` decimal   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` decimal   DEFAULT NULL, 
	`BaseIcms` decimal   DEFAULT NULL, 
	`AliquotaIcms` decimal   DEFAULT NULL, 
	`ValorIcms` decimal   DEFAULT NULL, 
	`BaseIpi` decimal   DEFAULT NULL, 
	`AliquotaIpi` decimal   DEFAULT NULL, 
	`ValorIpi` decimal   DEFAULT NULL, 
	`PesoLiquido` decimal   DEFAULT NULL, 
	`PesoBruto` decimal   DEFAULT NULL, 
	`VALOR_DESCONTO` decimal   DEFAULT NULL, 
	`TAXA_DESC` decimal   DEFAULT NULL, 
	`SUBST_TRIBUT` char(1)   DEFAULT NULL, 
	`CLAS_FISCAL` char(1)   DEFAULT NULL, 
	`RECEITA` numeric   DEFAULT NULL, 
	`SITUACAO_TRIBUTARIA` char(3)   DEFAULT NULL, 
	`isentas` decimal   DEFAULT NULL, 
	`diferida` decimal   DEFAULT NULL, 
	`substituicao` decimal   DEFAULT NULL, 
	`suspensa` decimal   DEFAULT NULL, 
	`nao_tributadas` decimal   DEFAULT NULL, 
	`outras` decimal   DEFAULT NULL, 
	`DescontoBaseReduzida` decimal   DEFAULT NULL, 
	`ParcelaBaseCalculoReduzida` decimal   DEFAULT NULL, 
	`VlrCalc` decimal   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`QuantidadeInformada` float   DEFAULT NULL, 
	`Valor_Base` float   DEFAULT NULL, 
	`Armado` int(1)   DEFAULT NULL, 
	`DESCRICAOARMADO` varchar(200)   DEFAULT NULL, 
	`SEQUENCIAARMADO` int   DEFAULT NULL, 
	`ADICIONALPRODUTO` varchar(200)   DEFAULT NULL, 
	`ValorDevolucao` float   DEFAULT NULL, 
	`QtdeDevolucao` float   DEFAULT NULL, 
	`ServicoArmado` int(1)   DEFAULT NULL, 
	`ServicoCorteDobra` int(1)   DEFAULT NULL, 
	`NatOperacao` char(5)   DEFAULT NULL, 
	`ValorRateioFrete` float   DEFAULT NULL, 
	`ValorIcmsFrete` float   DEFAULT NULL, 
	`BaseIcmsST` float   DEFAULT NULL, 
	`RelatorioArmado` int(1)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`VALOR_ACRESCIMO` decimal   DEFAULT NULL, 
	`Pis` float   DEFAULT NULL, 
	`Cofins` float   DEFAULT NULL, 
	`UsoConsumo` int(1)   DEFAULT NULL, 
	`ValorICMSST` float   DEFAULT NULL, 
	`CST_IPI` char(2)   DEFAULT NULL, 
	`CST_PIS_COFINS` char(2)   DEFAULT NULL, 
	`ValorRateioSeguro` float   DEFAULT NULL, 
	`ValorRateioOutras` float   DEFAULT NULL, 
	`IndTot` int(1)   DEFAULT NULL, 
	`ValorRateioDesconto` float   DEFAULT NULL, 
	`BaseSTRet` float   DEFAULT NULL, 
	`ValorSTRet` float   DEFAULT NULL, 
	`DescricaoProduto` varchar(70)   DEFAULT NULL, 
	`CodigoProdutonf` int   DEFAULT NULL, 
	`Comissao` float   DEFAULT NULL, 
	`ValorRateioIncentivo` float   DEFAULT NULL, 
	`Tributacao` int   DEFAULT NULL, 
	`ValorIOF` float   DEFAULT NULL, 
	`DespesasAduaneiras` float   DEFAULT NULL, 
	`BaseII` float   DEFAULT NULL, 
	`ValorII` float   DEFAULT NULL, 
	`Linha` char(6)   DEFAULT NULL, 
	`ValorBonificacao` float   DEFAULT NULL, 
	`ValorAproxImpostos` float   DEFAULT NULL, 
	`ValorRateioFreteND` float   DEFAULT NULL, 
	`ValorRateioDespesaND` float   DEFAULT NULL, 
	`ComissaoAtendente` float   DEFAULT NULL, 
	`ComissaoDireto` float   DEFAULT NULL, 
	`ItemComodato` int   DEFAULT NULL, 
	`ServicoSoldado` int(1)   DEFAULT NULL, 
	`Soldado` int(1)   DEFAULT NULL, 
	`vBCUFDest` float   DEFAULT NULL, 
	`pFCPUFDest` float   DEFAULT NULL, 
	`pICMSUFDest` float   DEFAULT NULL, 
	`pICMSInter` float   DEFAULT NULL, 
	`pICMSInterPart` float   DEFAULT NULL, 
	`vFCPUFDest` float   DEFAULT NULL, 
	`vICMSUFDest` float   DEFAULT NULL, 
	`vICMSUFRemet` float   DEFAULT NULL, 
	`FEDERAL` float   DEFAULT NULL, 
	`ESTADUAL` float   DEFAULT NULL, 
	`MUNICIPAL` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Ordem_Servico`;
CREATE TABLE Ordem_Servico (
	`Documento` varchar(6) NOT NULL  , 
	`Emissao` datetime   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`VlrTotal` float   DEFAULT NULL, 
	`Fechamento` varchar(6)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Observacao`;
CREATE TABLE Observacao (
	`Observacao` numeric NOT NULL  , 
	`DESCRICAO` varchar(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OPCOES_NIVEIS`;
CREATE TABLE OPCOES_NIVEIS (
	`NIVEL` tinyint NOT NULL  , 
	`SEQ_MENU` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NRO_REQUISICAO`;
CREATE TABLE NRO_REQUISICAO (
	`REQUISICAO` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NFe_NCM_CST_IPI_FILIAL`;
CREATE TABLE NFe_NCM_CST_IPI_FILIAL (
	`ID_NCM_CST_IPI_FILIAL` int NOT NULL  , 
	`ID_NCM` int   DEFAULT NULL, 
	`ID_CST_IPI` int   DEFAULT NULL, 
	`ID_FILIAL` int   DEFAULT NULL, 
	`TAXA_IPI` float   DEFAULT NULL, 
	`CK_INATIVO` int(1)   DEFAULT NULL, 
	`ID_ENQUADRAMENTO_IPI` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Ordem_Servico_itens`;
CREATE TABLE Ordem_Servico_itens (
	`Documento` char(6) NOT NULL  , 
	`sequencia` int NOT NULL  , 
	`Servico` int   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`VlrUnitario` float   DEFAULT NULL, 
	`VlrTotal` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OrdemCompra_Solicitacao`;
CREATE TABLE OrdemCompra_Solicitacao (
	`Filial` int NOT NULL  , 
	`Numero` int NOT NULL  , 
	`Solicitacao` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OrdemCompra_Solicitacao_Itens`;
CREATE TABLE OrdemCompra_Solicitacao_Itens (
	`Filial` int NOT NULL  , 
	`Numero` int NOT NULL  , 
	`Solicitacao` int NOT NULL  , 
	`Seq` int NOT NULL  , 
	`SeqItem` int   DEFAULT NULL, 
	`Item` int   DEFAULT NULL, 
	`Descricao` varchar(200)   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OrdemCompra_CCusto`;
CREATE TABLE OrdemCompra_CCusto (
	`Filial` int NOT NULL  , 
	`Numero` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Seq_Cta_Custo` int   DEFAULT NULL, 
	`Grupo_Conta` int   DEFAULT NULL, 
	`Sub_Grupo` int   DEFAULT NULL, 
	`Descricao` char(200)   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OrdemCompraItens`;
CREATE TABLE OrdemCompraItens (
	`Filial` int NOT NULL  , 
	`OrdemCompra` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Item` int   DEFAULT NULL, 
	`Descricao` varchar(200)   DEFAULT NULL, 
	`Marca` varchar(100)   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`ValorUnitario` float   DEFAULT NULL, 
	`Desconto` float   DEFAULT NULL, 
	`ValorDesconto` float   DEFAULT NULL, 
	`IPI` float   DEFAULT NULL, 
	`ValorIPI` float   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL, 
	`NotaFiscal` char(6)   DEFAULT NULL, 
	`QtdRecebida` float   DEFAULT NULL, 
	`Encerrada` int(1)   DEFAULT NULL, 
	`DATARECEBIMENTO` datetime   DEFAULT NULL, 
	`DataEncerramento` datetime   DEFAULT NULL, 
	`SubstTributaria` float   DEFAULT NULL, 
	`ValorSubstTributaria` float   DEFAULT NULL, 
	`Motivo` varchar(250)   DEFAULT NULL, 
	`Aprovado` int(1)   DEFAULT NULL, 
	`Preferencial` int(1)   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`MotivoReabertura` varchar(250)   DEFAULT NULL, 
	`AliqICMS` float   DEFAULT NULL, 
	`ValorICMS` float   DEFAULT NULL, 
	`QtdRecebidaManual` float   DEFAULT NULL, 
	`ValorTotalGeral` float   DEFAULT NULL, 
	`QuantidadePrincipal` float   DEFAULT NULL, 
	`QuantidadePrincipalRecebida` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OrdemCarregamento`;
CREATE TABLE OrdemCarregamento (
	`Codigo` int NOT NULL  , 
	`Emissao` datetime   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ORDEMCOMPRA`;
CREATE TABLE ORDEMCOMPRA (
	`NUMERO` int NOT NULL  , 
	`DataAutorizado` datetime   DEFAULT NULL, 
	`AutorizadoCredito` varchar(50)   DEFAULT NULL, 
	`TipoCredito` char(1)   DEFAULT NULL, 
	`ObservacaoCredito` varchar(500)   DEFAULT NULL, 
	`NomeFornecedor` varchar(500)   DEFAULT NULL, 
	`Status` int   DEFAULT NULL, 
	`CompraDireta` int(1)   DEFAULT NULL, 
	`FatorMoeda` float   DEFAULT NULL, 
	`TaxaImportacao` float   DEFAULT NULL, 
	`OutrasTaxas` float   DEFAULT NULL, 
	`NaoFluxoCaixa` int(1)   DEFAULT NULL, 
	`Adiantamento` float   DEFAULT NULL, 
	`Solicitacao` int   DEFAULT NULL, 
	`LocalEntrega` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PAGARPREVISAOITENS`;
CREATE TABLE PAGARPREVISAOITENS (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` varchar(6)   DEFAULT NULL, 
	`ITEM` int NOT NULL  , 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`ENCERRADO` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PagarPrevisaoProdutos`;
CREATE TABLE PagarPrevisaoProdutos (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`QUANTIDADE` float   DEFAULT NULL, 
	`VALOR_UNITARIO` float   DEFAULT NULL, 
	`VALOR_TOTAL` float   DEFAULT NULL, 
	`UNIDADE` char(3)   DEFAULT NULL, 
	`QUANTIDADEPRINCIPAL` float   DEFAULT NULL, 
	`Encerrado` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PAGARPREVISAO`;
CREATE TABLE PAGARPREVISAO (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` char(6) NOT NULL  , 
	`FORNEC` int   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`VALORTOTAL` float   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`PARCELAS` int   DEFAULT NULL, 
	`OBSERVACAO` varchar(100)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`FLAGCANCELADA` int(1)   DEFAULT NULL, 
	`ESPECIE` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Origem`;
CREATE TABLE Origem (
	`ID_ORIGEM` int NOT NULL  , 
	`DS_ORIGEM` varchar(150)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Parametros_Abastecimento`;
CREATE TABLE Parametros_Abastecimento (
	`DataEmissao` datetime NOT NULL  , 
	`ValorCombustivel` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PARAMETROS`;
CREATE TABLE PARAMETROS (
	`TIPO_MOV_ENTRADA` int   DEFAULT NULL, 
	`TIPO_MOV_SAIDA` int   DEFAULT NULL, 
	`TIPO_MOV_REQUISICAO` int   DEFAULT NULL, 
	`Natureza` numeric   DEFAULT NULL, 
	`NaturezaFora` numeric   DEFAULT NULL, 
	`FILIAL_MATRIZ` int   DEFAULT NULL, 
	`ESPECIE_TITULO` int   DEFAULT NULL, 
	`HISTORICO_CHEQUE` int   DEFAULT NULL, 
	`OBSERVACAO_BOLETO1` char(50)   DEFAULT NULL, 
	`OBSERVACAO_BOLETO2` char(50)   DEFAULT NULL, 
	`OBSERVACAO_BOLETO3` char(50)   DEFAULT NULL, 
	`JUROS` float   DEFAULT NULL, 
	`SequenciaNPR` numeric   DEFAULT NULL, 
	`ValorSaca` float   DEFAULT NULL, 
	`DescricaoNPR` varchar(300)   DEFAULT NULL, 
	`HistoricoAVista` int   DEFAULT NULL, 
	`EspecieIR` int   DEFAULT NULL, 
	`FornecIR` int   DEFAULT NULL, 
	`SequenciaIR` int   DEFAULT NULL, 
	`GrupoIR` int   DEFAULT NULL, 
	`SubGrupoIR` int   DEFAULT NULL, 
	`EspecieNF` int   DEFAULT NULL, 
	`BancoLancamentos` int   DEFAULT NULL, 
	`TRANSPORTADORA` int   DEFAULT NULL, 
	`HistoricoBaixa` int   DEFAULT NULL, 
	`HistoricoBaixaPagar` int   DEFAULT NULL, 
	`NatTransDentro` numeric   DEFAULT NULL, 
	`NatTransfora` numeric   DEFAULT NULL, 
	`NatTransEntrada` numeric   DEFAULT NULL, 
	`NatDevEntradaDentro` numeric   DEFAULT NULL, 
	`NatDevEntradaFora` numeric   DEFAULT NULL, 
	`EspecieDevolucao` int   DEFAULT NULL, 
	`NatDevSaidaDentro` numeric   DEFAULT NULL, 
	`NatDevSaidaFora` numeric   DEFAULT NULL, 
	`GRUPO_CONTADEV` int   DEFAULT NULL, 
	`SUB_GRUPO_CONTADEV` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTODEV` smallint   DEFAULT NULL, 
	`ContaContabilDEV` char(5)   DEFAULT NULL, 
	`DepartamentoDEV` int   DEFAULT NULL, 
	`SituacaoDEV` int   DEFAULT NULL, 
	`SequenciaDEV` int   DEFAULT NULL, 
	`ContaContabilCredito` char(5)   DEFAULT NULL, 
	`DepartamentoCredito` int   DEFAULT NULL, 
	`SituacaoCredito` int   DEFAULT NULL, 
	`SequenciaCredito` int   DEFAULT NULL, 
	`SequenciaCustoCredito` int   DEFAULT NULL, 
	`GrupoCredito` int   DEFAULT NULL, 
	`SubGrupoCredito` int   DEFAULT NULL, 
	`EspecieCredito` int   DEFAULT NULL, 
	`NatEntradaDentro` numeric   DEFAULT NULL, 
	`NatEntradaFora` numeric   DEFAULT NULL, 
	`EspecieEntrada` int   DEFAULT NULL, 
	`GRUPO_CONTAENTRADA` int   DEFAULT NULL, 
	`SUB_GRUPO_CONTAENTRADA` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTOENTRADA` smallint   DEFAULT NULL, 
	`SequenciaCustoCreditoPagar` int   DEFAULT NULL, 
	`GrupoCreditoPagar` int   DEFAULT NULL, 
	`SubGrupoCreditoPagar` int   DEFAULT NULL, 
	`Mes_Mov` datetime   DEFAULT NULL, 
	`NatConsumoDentro` numeric   DEFAULT NULL, 
	`NatConsumofora` numeric   DEFAULT NULL, 
	`RECIBOBAIXA` numeric   DEFAULT NULL, 
	`NatVendaFuturaDentro` numeric   DEFAULT NULL, 
	`NatVendaFuturafora` numeric   DEFAULT NULL, 
	`NatEntregaVendaFuturaDentro` numeric   DEFAULT NULL, 
	`NatEntregaVendaFuturafora` numeric   DEFAULT NULL, 
	`CondicaoEntregaVendaFutura` numeric   DEFAULT NULL, 
	`SafraCafe` char(10)   DEFAULT NULL, 
	`CondPagamentoReceber` varchar(50)   DEFAULT NULL, 
	`CF_TAXA_VALOR_BRUTO` int   DEFAULT NULL, 
	`CF_TAXA_ACRESCIMO` int   DEFAULT NULL, 
	`CF_TAXA_QUEBRA` int   DEFAULT NULL, 
	`GRUPO_CONTAADIANTAMENTO` int   DEFAULT NULL, 
	`SUB_GRUPO_CONTAADIANTAMENTO` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTOADIANTAMENTO` smallint   DEFAULT NULL, 
	`ContaContabilADIANTAMENTO` char(5)   DEFAULT NULL, 
	`EspecieAdiantamento` int   DEFAULT NULL, 
	`CondPagamentoAdiantamento` int   DEFAULT NULL, 
	`CF_TAXA_JUROS` int   DEFAULT NULL, 
	`CF_TAXA_COMERCIALIZACAO` int   DEFAULT NULL, 
	`CF_TAXA_ARMAZENAGEM` int   DEFAULT NULL, 
	`INTEGRALIZACAO` numeric   DEFAULT NULL, 
	`SAFRA` char(10)   DEFAULT NULL, 
	`CF_TAXA_SACARIA` int   DEFAULT NULL, 
	`CARTAMODELO` varchar(2000)   DEFAULT NULL, 
	`CALC_ESTOQUE` int(1) NOT NULL  , 
	`TAXACOMERCIALIZACAO` float   DEFAULT NULL, 
	`CLIEIRRF` int   DEFAULT NULL, 
	`GeraContaContabil` int(1)   DEFAULT NULL, 
	`COND_ORCA` int   DEFAULT NULL, 
	`DiaBloqueado` int   DEFAULT NULL, 
	`CONTAINICIALFORNEC` varchar(15)   DEFAULT NULL, 
	`CONTAINICIALCLIENTE` varchar(15)   DEFAULT NULL, 
	`GERACONTAAUTOMATICO` int(1)   DEFAULT NULL, 
	`Nat_VendaOrdemDE` int   DEFAULT NULL, 
	`Nat_VendaOrdemFE` int   DEFAULT NULL, 
	`Nat_RemessaOrdemDE` int   DEFAULT NULL, 
	`Nat_RemessaOrdemFE` int   DEFAULT NULL, 
	`Nat_RemessaConsertoDE` int   DEFAULT NULL, 
	`Nat_RemessaConsertoFE` int   DEFAULT NULL, 
	`TIPO_MOV_CONTAGEM_ENTRADA` int   DEFAULT NULL, 
	`TIPO_MOV_CONTAGEM_SAIDA` int   DEFAULT NULL, 
	`CALCULA_NEGATIVO` int(1)   DEFAULT NULL, 
	`UNIDADECOLUNAS` varchar(3)   DEFAULT NULL, 
	`VlrMaoObra` float   DEFAULT NULL, 
	`TIPO_MOV_TRANSFERENCIA_ENTRADA` int   DEFAULT NULL, 
	`TIPO_MOV_TRANSFERENCIA_SAIDA` int   DEFAULT NULL, 
	`PRECO_MEDIO_ICMS` int(1)   DEFAULT NULL, 
	`ARAME` int   DEFAULT NULL, 
	`PERC_ARAME` float   DEFAULT NULL, 
	`altera_valores` int(1)   DEFAULT NULL, 
	`FerroEstribo` int   DEFAULT NULL, 
	`HistoricoEstornoBaixa` int   DEFAULT NULL, 
	`ValorBloqueioPedido` float   DEFAULT NULL, 
	`DiasBloqueioPedido` int   DEFAULT NULL, 
	`GRUPOJUROSPAGAR` int   DEFAULT NULL, 
	`SUBGRUPOJUROSPAGAR` int   DEFAULT NULL, 
	`SEQUENCIAJUROSPAGAR` int   DEFAULT NULL, 
	`GRUPODESCONTOSPAGAR` int   DEFAULT NULL, 
	`SUBGRUPODESCONTOSPAGAR` int   DEFAULT NULL, 
	`SEQUENCIADESCONTOSPAGAR` int   DEFAULT NULL, 
	`CategoriaClienteDeposito` int   DEFAULT NULL, 
	`ValorVendaDeposito` float   DEFAULT NULL, 
	`GrupoFrete` int   DEFAULT NULL, 
	`SubGrupoFrete` int   DEFAULT NULL, 
	`SequenciaFrete` int   DEFAULT NULL, 
	`EspecieFrete` int   DEFAULT NULL, 
	`DiasBloqueioOrcamento` int   DEFAULT NULL, 
	`TipoMovimentoFechamento` int   DEFAULT NULL, 
	`CodBarras` char(9)   DEFAULT NULL, 
	`Cliente_PedidoConsumidor` int   DEFAULT NULL, 
	`Condicao_PedidoConsumidor` int   DEFAULT NULL, 
	`GrupoImpostoSubstituicao` int   DEFAULT NULL, 
	`SubGrupoImpostoSubstituicao` int   DEFAULT NULL, 
	`SequenciaImpostoSubstituicao` int   DEFAULT NULL, 
	`EspecieImpostoSubstituicao` int   DEFAULT NULL, 
	`FornecedorImpostoSubstituicao` int   DEFAULT NULL, 
	`SenhaOficial` varchar(50)   DEFAULT NULL, 
	`HistoricoEstornoBaixaCtaPagar` int   DEFAULT NULL, 
	`VlrMaoObraMinimo` float   DEFAULT NULL, 
	`TabPrecoGenerica` int(1)   DEFAULT NULL, 
	`EspecieIRRF` int   DEFAULT NULL, 
	`grupoirrf` int   DEFAULT NULL, 
	`subgrupoirrf` int   DEFAULT NULL, 
	`sequenciairrf` int   DEFAULT NULL, 
	`BloqueioCredito` int(1)   DEFAULT NULL, 
	`SenhaUF` int(1)   DEFAULT NULL, 
	`SenhaEstoque` int(1)   DEFAULT NULL, 
	`TipoImpressao` int(1)   DEFAULT NULL, 
	`ValorMinimo3Parcelas` float   DEFAULT NULL, 
	`ImprimirPedidoExpedicao` int(1)   DEFAULT NULL, 
	`Adicional1` varchar(50)   DEFAULT NULL, 
	`Perc1` float   DEFAULT NULL, 
	`Adicional2` varchar(50)   DEFAULT NULL, 
	`Perc2` float   DEFAULT NULL, 
	`Adicional3` varchar(50)   DEFAULT NULL, 
	`Perc3` float   DEFAULT NULL, 
	`Adicional4` varchar(50)   DEFAULT NULL, 
	`Perc4` float   DEFAULT NULL, 
	`CategoriaParticular` int   DEFAULT NULL, 
	`EspecieMercadoria` varchar(20)   DEFAULT NULL, 
	`MarcaMercadoria` varchar(20)   DEFAULT NULL, 
	`reserva001` varchar(50)   DEFAULT NULL, 
	`reserva002` varchar(50)   DEFAULT NULL, 
	`reserva003` varchar(50)   DEFAULT NULL, 
	`BloquearDescontoAcimaDe` float   DEFAULT NULL, 
	`UsoConsumo` int(1)   DEFAULT NULL, 
	`TabelaPrecoAco` int(1)   DEFAULT NULL, 
	`VolumeObrigatorio` int(1)   DEFAULT NULL, 
	`ControlePercPedido` int(1)   DEFAULT NULL, 
	`Agenda` int(1)   DEFAULT NULL, 
	`PesoMinimoEntrega` float   DEFAULT NULL, 
	`ControleCustoUltimaCompra` int(1)   DEFAULT NULL, 
	`VerificaEstoqueEncerramento` int(1)   DEFAULT NULL, 
	`SenhaProdutoAbaixoTabela` int(1)   DEFAULT NULL, 
	`BloquearValoresNFPedido` int(1)   DEFAULT NULL, 
	`OcultarValoresPedido` int(1)   DEFAULT NULL, 
	`NaoVerificarSaldoPedidos` int(1)   DEFAULT NULL, 
	`OrdemProdNFe` char(1)   DEFAULT NULL, 
	`ControlaPlacaNFE` int(1)   DEFAULT NULL, 
	`TipoBaixaChq` char(1)   DEFAULT NULL, 
	`NaoImprimirCabecalhoPedido` int(1)   DEFAULT NULL, 
	`PedidoNF_RECEBER` int(1)   DEFAULT NULL, 
	`SUB_GRUPO_Deposito` int   DEFAULT NULL, 
	`GRUPO_CONTA_Deposito` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO_Deposito` int   DEFAULT NULL, 
	`Historico_Deposito` int   DEFAULT NULL, 
	`VencimentoDataEntrega` int(1)   DEFAULT NULL, 
	`GrupoCorteDobra` int   DEFAULT NULL, 
	`EnviaEmailNFeCanc` int(1)   DEFAULT NULL, 
	`ControleAutorizacaoSolicitacao` int(1)   DEFAULT NULL, 
	`ControlaMotivosReceber` int(1)   DEFAULT NULL, 
	`ControlaReplicacao` int(1)   DEFAULT NULL, 
	`NaoImprimirReferenciaNFe` int(1)   DEFAULT NULL, 
	`CalcularConsultaProdutosSobre` char(1)   DEFAULT NULL, 
	`ProducaoDiariaArmado` float   DEFAULT NULL, 
	`FornecedorAlmoxarifado` int   DEFAULT NULL, 
	`TipoMovimentoAlmoxarifado` int   DEFAULT NULL, 
	`QtdeParc1` int   DEFAULT NULL, 
	`PercFinan1` float   DEFAULT NULL, 
	`QtdeParc2` int   DEFAULT NULL, 
	`PercFinan2` float   DEFAULT NULL, 
	`QtdeParc3` int   DEFAULT NULL, 
	`PercFinan3` float   DEFAULT NULL, 
	`QtdeParc4` int   DEFAULT NULL, 
	`PercFinan4` float   DEFAULT NULL, 
	`QtdeParc5` int   DEFAULT NULL, 
	`PercFinan5` float   DEFAULT NULL, 
	`ValorEntradaFinan` float   DEFAULT NULL, 
	`CondPagamentoLote` int   DEFAULT NULL, 
	`QtdeParcEntrada` int   DEFAULT NULL, 
	`CondPagamentoLoteEntrada` int   DEFAULT NULL, 
	`CondPagamentoLoteEntradaNCT` int   DEFAULT NULL, 
	`ContaContabilReembolso` int   DEFAULT NULL, 
	`EspeciePagarReembolso` int   DEFAULT NULL, 
	`grupo_conta_Reembolso` int   DEFAULT NULL, 
	`seq_cta_custo_Reembolso` int   DEFAULT NULL, 
	`sub_grupo_Reembolso` int   DEFAULT NULL, 
	`TaxaImpostosDesistencia` float   DEFAULT NULL, 
	`ValorTaxaAdministrativa` float   DEFAULT NULL, 
	`ControleAprovacaoCotacaoCompra` int(1)   DEFAULT NULL, 
	`CaminhoExecGenerico` varchar(1000)   DEFAULT NULL, 
	`CaminhoExecFiscal` varchar(1000)   DEFAULT NULL, 
	`CaminhoExecFaturamento` varchar(1000)   DEFAULT NULL, 
	`CaminhoExecAco` varchar(1000)   DEFAULT NULL, 
	`CaminhoExecEmpresa` varchar(1000)   DEFAULT NULL, 
	`BloqVencDif` int(1)   DEFAULT NULL, 
	`ControlaNumeracao` int(1)   DEFAULT NULL, 
	`NaoPermiteInstanciasSistema` int(1)   DEFAULT NULL, 
	`CodBCCreditoServico` int   DEFAULT NULL, 
	`CodCST` int   DEFAULT NULL, 
	`GrupoServicoNFE` int   DEFAULT NULL, 
	`MsgCarne` varchar(500)   DEFAULT NULL, 
	`ProdutoServico` int   DEFAULT NULL, 
	`DiasProrrogacaoDup` int   DEFAULT NULL, 
	`CaminhoExec` varchar(1000)   DEFAULT NULL, 
	`percJuros` float   DEFAULT NULL, 
	`NaoMostrarJuros` int(1)   DEFAULT NULL, 
	`AdicionalCusto` float   DEFAULT NULL, 
	`ControlaTrocoBaixa` int(1)   DEFAULT NULL, 
	`TransportadoraEncerramento` int   DEFAULT NULL, 
	`VendedorEncerramento` int   DEFAULT NULL, 
	`BancoPagarReembolso` int   DEFAULT NULL, 
	`EmailMalaDireta` varchar(255)   DEFAULT NULL, 
	`SMTPMalaDireta` varchar(255)   DEFAULT NULL, 
	`SenhaEmailMalaDireta` varchar(255)   DEFAULT NULL, 
	`HorarioAtualizaExec` char(8)   DEFAULT NULL, 
	`DiasBloqueioPedidoAberto` int   DEFAULT NULL, 
	`HorarioAtualizaExecManual` char(8)   DEFAULT NULL, 
	`EspecieCreditoCliente` int   DEFAULT NULL, 
	`HistoricoCredito` int   DEFAULT NULL, 
	`CondPagamentoCredito` int   DEFAULT NULL, 
	`CondPagamentoCreditoDevolucao` int   DEFAULT NULL, 
	`HistoricoDevolucaoCredito` int   DEFAULT NULL, 
	`ControlaFilialChequePre` int(1)   DEFAULT NULL, 
	`PercBloqNFEntrada` float   DEFAULT NULL, 
	`BloquearVencimentosAnteriores` int(1)   DEFAULT NULL, 
	`CondPagamentoMulta` int   DEFAULT NULL, 
	`EspecieMulta` int   DEFAULT NULL, 
	`EspecieDespesaFixa` int   DEFAULT NULL, 
	`BancoDespesaFixa` int   DEFAULT NULL, 
	`ProcessadoNaturezaItemEstoque` int(1)   DEFAULT NULL, 
	`MostrarLocalizacaoProdutosPedido` int(1) NOT NULL  , 
	`VerificaInfoMenu` int(1) NOT NULL  , 
	`CondPagamentoLoteIPTU` int   DEFAULT NULL, 
	`CondPagamentoLoteIPTUNCT` int   DEFAULT NULL, 
	`TabelaSobre` int   DEFAULT NULL, 
	`HistoricoAdiantamento` int   DEFAULT NULL, 
	`HistoricoDevolucaoAdiantamento` int   DEFAULT NULL, 
	`EspecieAdiantamentoFornecedor` int   DEFAULT NULL, 
	`AlteracaoMesMov` varchar(70)   DEFAULT NULL, 
	`EspeciePIS` int   DEFAULT NULL, 
	`GrupoPIS` int   DEFAULT NULL, 
	`SubgrupoPIS` int   DEFAULT NULL, 
	`SequenciaPIS` int   DEFAULT NULL, 
	`CliePIS` int   DEFAULT NULL, 
	`EspecieISS` int   DEFAULT NULL, 
	`GrupoISS` int   DEFAULT NULL, 
	`SubgrupoISS` int   DEFAULT NULL, 
	`SequenciaISS` int   DEFAULT NULL, 
	`ClieISS` int   DEFAULT NULL, 
	`EspecieINSS` int   DEFAULT NULL, 
	`GrupoINSS` int   DEFAULT NULL, 
	`SubgrupoINSS` int   DEFAULT NULL, 
	`SequenciaINSS` int   DEFAULT NULL, 
	`ClieINSS` int   DEFAULT NULL, 
	`FusoHorario` char(6)   DEFAULT NULL, 
	`EspecieCSLL` int   DEFAULT NULL, 
	`GrupoCSLL` int   DEFAULT NULL, 
	`SubgrupoCSLL` int   DEFAULT NULL, 
	`SequenciaCSLL` int   DEFAULT NULL, 
	`ClieCSLL` int   DEFAULT NULL, 
	`GrupoBordero` int   DEFAULT NULL, 
	`SubGrupoBordero` int   DEFAULT NULL, 
	`SequenciaBordero` int   DEFAULT NULL, 
	`HistorioBordero` int   DEFAULT NULL, 
	`HistoricoBorderoJuros` int   DEFAULT NULL, 
	`HistoricoBorderoIOF` int   DEFAULT NULL, 
	`GrupoJurosBordero` int   DEFAULT NULL, 
	`SubGrupoJurosBordero` int   DEFAULT NULL, 
	`SequenciaJurosBordero` int   DEFAULT NULL, 
	`GrupoIOFBordero` int   DEFAULT NULL, 
	`SubGrupoIOFBordero` int   DEFAULT NULL, 
	`SequenciaIOFBordero` int   DEFAULT NULL, 
	`AlteraValorItem` int(1)   DEFAULT NULL, 
	`PercPIS` float   DEFAULT NULL, 
	`PercCOFINS` float   DEFAULT NULL, 
	`PercContribSocial` float   DEFAULT NULL, 
	`PercImpostoRenda` float   DEFAULT NULL, 
	`PercContribSocialJuros` float   DEFAULT NULL, 
	`PercImpostoRendaJuros` float   DEFAULT NULL, 
	`DiasBloqueioPedidoEspecial` int   DEFAULT NULL, 
	`ValorLimiteCompras` float   DEFAULT NULL, 
	`PercBloqNFOC` float   DEFAULT NULL, 
	`CondPagamentoLoteRenegociacao` int   DEFAULT NULL, 
	`TimeOut_CANCELAMENTO` int   DEFAULT NULL, 
	`TimeOut_RETORNO` int   DEFAULT NULL, 
	`TimeOut_UNINFE` int   DEFAULT NULL, 
	`TimeOut_STATUS` int   DEFAULT NULL, 
	`PercBloqNFPedido` float   DEFAULT NULL, 
	`CK_EXEC_LOCAL` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PARAMETROS_RECEBER`;
CREATE TABLE PARAMETROS_RECEBER (
	`PAG_REL_DUP` numeric   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PARAMETROS_COMERCIALIZACAO`;
CREATE TABLE PARAMETROS_COMERCIALIZACAO (
	`DOC_PERSONALIZADO` char(6)   DEFAULT NULL, 
	`VLR_PERSONALIZADO` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ParametrosCupomFiscal_Tributacao`;
CREATE TABLE ParametrosCupomFiscal_Tributacao (
	`Filial` int NOT NULL  , 
	`Cod_Tributacao` int NOT NULL  , 
	`CFOPDentro` int   DEFAULT NULL, 
	`CFOPFora` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Parametros_VendasBalcao`;
CREATE TABLE Parametros_VendasBalcao (
	`NaturezaDentroSaida` int   DEFAULT NULL, 
	`NaturezaForaSaida` int   DEFAULT NULL, 
	`Transportadora` int   DEFAULT NULL, 
	`TipoMovSaida` int   DEFAULT NULL, 
	`NaturezaDentroTransf` int   DEFAULT NULL, 
	`NaturezaForaTransf` int   DEFAULT NULL, 
	`NaturezaEntradaTransf` int   DEFAULT NULL, 
	`TipoMovTransferenciaEntrada` int   DEFAULT NULL, 
	`TipoMovTransferenciaSaida` int   DEFAULT NULL, 
	`NaturezaDentroSaidaSubstituicao` int   DEFAULT NULL, 
	`NaturezaForaSaidaSubstituicao` int   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL, 
	`AliquotaSimples` float   DEFAULT NULL, 
	`CondPagamentoNF` int   DEFAULT NULL, 
	`PermiteExclusaoPedido` int(1)   DEFAULT NULL, 
	`pis` float   DEFAULT NULL, 
	`cofins` float   DEFAULT NULL, 
	`ArredondarPeso` int(1)   DEFAULT NULL, 
	`NaturezaDentroBonificacao` int   DEFAULT NULL, 
	`NaturezaForaBonificacao` int   DEFAULT NULL, 
	`TipoNFSaida` int   DEFAULT NULL, 
	`TipoNFBonificacao` int   DEFAULT NULL, 
	`CondPagamentoDoacao` int   DEFAULT NULL, 
	`NaturezaDentroTroca` int   DEFAULT NULL, 
	`NaturezaForaTroca` int   DEFAULT NULL, 
	`TipoNFTroca` int   DEFAULT NULL, 
	`NatNFDivididaDentro` int   DEFAULT NULL, 
	`NatNFDivididaFora` int   DEFAULT NULL, 
	`DiasEntrega` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Parametros_Boleto`;
CREATE TABLE Parametros_Boleto (
	`Filial` int NOT NULL  , 
	`Banco` int NOT NULL  , 
	`Agencia` int NOT NULL  , 
	`ContaCorrente` varchar(13) NOT NULL  , 
	`NumRange` char(5)   DEFAULT NULL, 
	`NumSeqDoc` char(7)   DEFAULT NULL, 
	`Dias` int   DEFAULT NULL, 
	`JurosDia` float   DEFAULT NULL, 
	`Instrucao1` char(2)   DEFAULT NULL, 
	`Instrucao2` char(2)   DEFAULT NULL, 
	`Mensagem1` varchar(50)   DEFAULT NULL, 
	`Mensagem2` varchar(50)   DEFAULT NULL, 
	`Mensagem3` varchar(50)   DEFAULT NULL, 
	`Mensagem4` varchar(50)   DEFAULT NULL, 
	`Mensagem5` varchar(50)   DEFAULT NULL, 
	`Mensagem6` varchar(50)   DEFAULT NULL, 
	`Mensagem7` varchar(50)   DEFAULT NULL, 
	`Mensagem8` varchar(50)   DEFAULT NULL, 
	`ExtensaoRemessa` char(3)   DEFAULT NULL, 
	`ExtensaoRetorno` char(3)   DEFAULT NULL, 
	`CaminhoRemessa` varchar(250)   DEFAULT NULL, 
	`CaminhoRetorno` varchar(250)   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  , 
	`CodConvenio` varchar(20)   DEFAULT NULL, 
	`CodCarteira` char(1)   DEFAULT NULL, 
	`FormaCadastramento` char(1)   DEFAULT NULL, 
	`TipoDocumento` char(1)   DEFAULT NULL, 
	`IDEmissao` char(1)   DEFAULT NULL, 
	`IDDistribuicao` char(1)   DEFAULT NULL, 
	`IDBanco` char(3)   DEFAULT NULL, 
	`Sequencia` int NOT NULL  , 
	`CondPagamento` int   DEFAULT NULL, 
	`UsarEnderecoCobranca` int(1)   DEFAULT NULL, 
	`CodCedente` varchar(7)   DEFAULT NULL, 
	`DiasProtesto` int   DEFAULT NULL, 
	`DiasTolerancia` int   DEFAULT NULL, 
	`JurosMes` float   DEFAULT NULL, 
	`PercMulta` float   DEFAULT NULL, 
	`PrefixoRemessa` char(2)   DEFAULT NULL, 
	`ValorDesconto` float   DEFAULT NULL, 
	`NumSeqAgrupado` int   DEFAULT NULL, 
	`NumeroCarteira` int   DEFAULT NULL, 
	`EmailCopiaParaBoletos` varchar(500)   DEFAULT NULL, 
	`AgenciaNova` varchar(10)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ParametrosCaixa`;
CREATE TABLE ParametrosCaixa (
	`Filial` int NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PENDENCIA_MOVIMENTACAO`;
CREATE TABLE PENDENCIA_MOVIMENTACAO (
	`GRUPO` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`ITEM` numeric   DEFAULT NULL, 
	`FILIAL` int   DEFAULT NULL, 
	`QUANTIDADE` numeric   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PARAMETROSPRODUCAO`;
CREATE TABLE PARAMETROSPRODUCAO (
	`CLIENTEPRODUCAO` int   DEFAULT NULL, 
	`SAIDAPRODUCAO` int   DEFAULT NULL, 
	`ENTRADAPRODUCAO` int   DEFAULT NULL, 
	`GastosIndiretosFabricacao` float   DEFAULT NULL, 
	`DespesasPrediais` float   DEFAULT NULL, 
	`DespesasAdministrativas` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Producao_Rateio`;
CREATE TABLE Producao_Rateio (
	`MES_ANO` char(6) NOT NULL  , 
	`VLR_CUSTO_PRODUCAO` float   DEFAULT NULL, 
	`VLR_CUSTO_ADMINISTRACAO` float   DEFAULT NULL, 
	`QTDEM3` float   DEFAULT NULL, 
	`DIA` datetime   DEFAULT NULL, 
	`Rateio_Producao` float   DEFAULT NULL, 
	`Rateio_Administracao` float   DEFAULT NULL, 
	`rateio_m3` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Parametrosnfe`;
CREATE TABLE Parametrosnfe (
	`Filial` int NOT NULL  , 
	`ChaveNFe` char(9)   DEFAULT NULL, 
	`DigVerificadorNFe` char(1)   DEFAULT NULL, 
	`Modelo` char(2)   DEFAULT NULL, 
	`TipoImpressao` char(1)   DEFAULT NULL, 
	`TipoEmissao` char(1)   DEFAULT NULL, 
	`TipoAmbiente` char(1)   DEFAULT NULL, 
	`FinalidadeNFe` char(1)   DEFAULT NULL, 
	`ProcessoEmissao` char(1)   DEFAULT NULL, 
	`VersaoNFe` char(20)   DEFAULT NULL, 
	`SeqCancelamento` int   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL, 
	`Scan` char(3)   DEFAULT NULL, 
	`FS` char(3)   DEFAULT NULL, 
	`Talao` char(3)   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  , 
	`Pedido` char(3)   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL, 
	`strModelo` char(10)   DEFAULT NULL, 
	`ModeloTalao` char(2)   DEFAULT NULL, 
	`DataContingencia` datetime   DEFAULT NULL, 
	`HoraContingencia` char(8)   DEFAULT NULL, 
	`JustContingencia` varchar(255)   DEFAULT NULL, 
	`Convenio` char(3)   DEFAULT NULL, 
	`ID_VersaoLayout` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ParametrosReplicaPedido`;
CREATE TABLE ParametrosReplicaPedido (
	`Filial` int NOT NULL  , 
	`TipoNF` int   DEFAULT NULL, 
	`CodNatureza` numeric   DEFAULT NULL, 
	`Transportadora` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`Banco` int   DEFAULT NULL, 
	`Nro_Conta` char(15)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ParametrosCurvaABC`;
CREATE TABLE ParametrosCurvaABC (
	`TipoABC` char(1) NOT NULL  , 
	`Quantidade` float   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_ConsultaLoteamento`;
CREATE TABLE Rel_ConsultaLoteamento (
	`NumLinha` numeric NOT NULL  , 
	`Loteamento` varchar(500)   DEFAULT NULL, 
	`NumLote` char(6)   DEFAULT NULL, 
	`Matricula` varchar(50)   DEFAULT NULL, 
	`Quadra` varchar(50)   DEFAULT NULL, 
	`AreaTotal` float   DEFAULT NULL, 
	`Frente` float   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL, 
	`Esquina` varchar(3)   DEFAULT NULL, 
	`Status` char(3)   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `REGISTRO`;
CREATE TABLE REGISTRO (
	`DT_INSTALACAO` datetime NOT NULL  , 
	`NOME` varchar(30)   DEFAULT NULL, 
	`EMPRESA` varchar(30)   DEFAULT NULL, 
	`ENDERECO` varchar(50)   DEFAULT NULL, 
	`BAIRRO` varchar(30)   DEFAULT NULL, 
	`CIDADE` varchar(30)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`UF` varchar(2)   DEFAULT NULL, 
	`TELEFONE` varchar(30)   DEFAULT NULL, 
	`FAX` varchar(30)   DEFAULT NULL, 
	`CGC` varchar(18)   DEFAULT NULL, 
	`IE` varchar(16)   DEFAULT NULL, 
	`DT_VALIDADE` datetime NOT NULL  , 
	`SERIE1` real NOT NULL  , 
	`SERIE2` real NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel`;
CREATE TABLE Rel (
	`num_rel` numeric NOT NULL  , 
	`nSum1` float   DEFAULT NULL, 
	`nSum2` float   DEFAULT NULL, 
	`nSum3` float   DEFAULT NULL, 
	`nSumImposto` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_EtiquetaProducao`;
CREATE TABLE Rel_EtiquetaProducao (
	`Num_rel` int   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`Documento` varchar(6)   DEFAULT NULL, 
	`Pedido` varchar(6)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Item` int   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`Observacao` varchar(200)   DEFAULT NULL, 
	`Sequencia` char(7)   DEFAULT NULL, 
	`Gerado` datetime   DEFAULT NULL, 
	`DataEntrega` datetime   DEFAULT NULL, 
	`DUPLA` int   DEFAULT NULL, 
	`FORMA` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Receitas`;
CREATE TABLE Receitas (
	`Numero` numeric NOT NULL  , 
	`ART` numeric NOT NULL  , 
	`requerente` int   DEFAULT NULL, 
	`emissao` datetime   DEFAULT NULL, 
	`agronomo` int   DEFAULT NULL, 
	`cultura` int   DEFAULT NULL, 
	`TipoInfestacao` char(1)   DEFAULT NULL, 
	`Infestacao` int   DEFAULT NULL, 
	`agrotoxico` int   DEFAULT NULL, 
	`areaTratada` float   DEFAULT NULL, 
	`UnidadeArea` char(3)   DEFAULT NULL, 
	`Qtd_adquirir` float   DEFAULT NULL, 
	`UnidadeQtd` varchar(3)   DEFAULT NULL, 
	`Dosagem` float   DEFAULT NULL, 
	`UnidadeD` char(3)   DEFAULT NULL, 
	`Area` float   DEFAULT NULL, 
	`UnidadeA` char(3)   DEFAULT NULL, 
	`Aplicacoes` numeric   DEFAULT NULL, 
	`Intervalo` numeric   DEFAULT NULL, 
	`carencia` numeric   DEFAULT NULL, 
	`complemento` varchar(100)   DEFAULT NULL, 
	`epoca` varchar(50)   DEFAULT NULL, 
	`ModoAplicacao` varchar(100)   DEFAULT NULL, 
	`MAnejo` char(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`UsoAvental` int(1) NOT NULL  , 
	`UsoBota` int(1) NOT NULL  , 
	`UsoChapeu` int(1) NOT NULL  , 
	`UsoMacacao` int(1) NOT NULL  , 
	`UsoMascara` int(1) NOT NULL  , 
	`Usooculos` int(1) NOT NULL  , 
	`UsoLuva` int(1) NOT NULL  , 
	`Observacao` varchar(100)   DEFAULT NULL, 
	`NotaFiscal` char(6)   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`Fazenda` numeric   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PRODUTOS_AGROTOXICOS`;
CREATE TABLE PRODUTOS_AGROTOXICOS (
	`agrotoxico` int NOT NULL  , 
	`item` int NOT NULL  , 
	`qtd_padrao` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_Grafico`;
CREATE TABLE Rel_Grafico (
	`Num_Rel` int NOT NULL  , 
	`Linha` int NOT NULL  , 
	`seq` int NOT NULL  , 
	`Valor` float   DEFAULT NULL, 
	`Texto` varchar(50)   DEFAULT NULL, 
	`Cor` int   DEFAULT NULL, 
	`Gerado` datetime   DEFAULT NULL, 
	`Series` varchar(50)   DEFAULT NULL, 
	`Titulo` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_EtiquetasLotes`;
CREATE TABLE Rel_EtiquetasLotes (
	`Loteamento` varchar(255)   DEFAULT NULL, 
	`NumLote` char(6)   DEFAULT NULL, 
	`Quadra` varchar(4)   DEFAULT NULL, 
	`Documento` varchar(6)   DEFAULT NULL, 
	`Cliente` varchar(70)   DEFAULT NULL, 
	`Socios` varchar(4000)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_EtiquetasProdutos`;
CREATE TABLE Rel_EtiquetasProdutos (
	`Item` int   DEFAULT NULL, 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`Valor_Venda` float   DEFAULT NULL, 
	`Codigo_Barras` varchar(14)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_FluxoCaixa`;
CREATE TABLE Rel_FluxoCaixa (
	`Num_Rel` int   DEFAULT NULL, 
	`Dia` datetime   DEFAULT NULL, 
	`Pagar_Atraso` float   DEFAULT NULL, 
	`Pagar_Previsao` float   DEFAULT NULL, 
	`Pagar_Provisao` float   DEFAULT NULL, 
	`Receber_Atraso` float   DEFAULT NULL, 
	`Receber_Previsao` float   DEFAULT NULL, 
	`Receber_Provisao` float   DEFAULT NULL, 
	`DocAPagar` float   DEFAULT NULL, 
	`DocAReceber` float   DEFAULT NULL, 
	`DocPago` float   DEFAULT NULL, 
	`DocRecebido` float   DEFAULT NULL, 
	`LancBancario` float   DEFAULT NULL, 
	`SaldoBancario` float   DEFAULT NULL, 
	`Geracao` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_NFe`;
CREATE TABLE Rel_NFe (
	`Linha` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel_Etiquetas`;
CREATE TABLE Rel_Etiquetas (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel3`;
CREATE TABLE Rel3 (
	`num_rel` numeric NOT NULL  , 
	`soma_001` float   DEFAULT NULL, 
	`outros_debitos1` varchar(50)   DEFAULT NULL, 
	`aux_outros_debitos1` float   DEFAULT NULL, 
	`outros_debitos2` varchar(50)   DEFAULT NULL, 
	`aux_outros_debitos2` float   DEFAULT NULL, 
	`estorno_credito1` varchar(50)   DEFAULT NULL, 
	`aux_estorno_creditos1` float   DEFAULT NULL, 
	`estorno_credito2` varchar(50)   DEFAULT NULL, 
	`aux_estorno_creditos2` float   DEFAULT NULL, 
	`soma_005` float   DEFAULT NULL, 
	`outros_creditos1` varchar(50)   DEFAULT NULL, 
	`aux_outros_creditos1` float   DEFAULT NULL, 
	`outros_creditos2` varchar(50)   DEFAULT NULL, 
	`aux_outros_creditos2` float   DEFAULT NULL, 
	`estorno_debitos1` varchar(50)   DEFAULT NULL, 
	`aux_estorno_debitos1` float   DEFAULT NULL, 
	`estorno_debitos2` varchar(50)   DEFAULT NULL, 
	`aux_estorno_debitos2` float   DEFAULT NULL, 
	`saldo_anterior` float   DEFAULT NULL, 
	`saldo_devedor` float   DEFAULT NULL, 
	`deduz1` varchar(50)   DEFAULT NULL, 
	`deducoes1` float   DEFAULT NULL, 
	`deduz2` varchar(50)   DEFAULT NULL, 
	`deducoes2` float   DEFAULT NULL, 
	`imposto_recolher` float   DEFAULT NULL, 
	`saldo_transportar` float   DEFAULT NULL, 
	`guia1` varchar(8)   DEFAULT NULL, 
	`data1` datetime   DEFAULT NULL, 
	`orgao1` varchar(30)   DEFAULT NULL, 
	`VALOR1` float   DEFAULT NULL, 
	`guia2` varchar(50)   DEFAULT NULL, 
	`data2` datetime   DEFAULT NULL, 
	`orgao2` varchar(30)   DEFAULT NULL, 
	`VALOR2` float   DEFAULT NULL, 
	`guia3` varchar(8)   DEFAULT NULL, 
	`data3` datetime   DEFAULT NULL, 
	`VALOR3` float   DEFAULT NULL, 
	`orgao3` varchar(30)   DEFAULT NULL, 
	`observacao1` varchar(100)   DEFAULT NULL, 
	`observacao2` varchar(100)   DEFAULT NULL, 
	`observacao3` varchar(100)   DEFAULT NULL, 
	`INSCRICAO` varchar(20)   DEFAULT NULL, 
	`CGC` varchar(20)   DEFAULT NULL, 
	`PAGINA_ENTRADA` int   DEFAULT NULL, 
	`empresa` int   DEFAULT NULL, 
	`dt_inicial` datetime   DEFAULT NULL, 
	`dt_final` datetime   DEFAULT NULL, 
	`codigo` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rel5`;
CREATE TABLE rel5 (
	`NUM_REL` int NOT NULL  , 
	`soma` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `REL4`;
CREATE TABLE REL4 (
	`NUM_REL` numeric   DEFAULT NULL, 
	`TIPO` varchar(1)   DEFAULT NULL, 
	`INICIAL` int   DEFAULT NULL, 
	`TOTAL_VALOR` float   DEFAULT NULL, 
	`TOTAL_BASE` float   DEFAULT NULL, 
	`TOTAL_ICMS` float   DEFAULT NULL, 
	`TOTAL_ISENTAS` float   DEFAULT NULL, 
	`TOTAL_OUTROS` float   DEFAULT NULL, 
	`CODIGO` int NOT NULL  , 
	`TOTAL_ImpostoSemCredito` float   DEFAULT NULL, 
	`TOTAL_NaoTributadas` float   DEFAULT NULL, 
	`TOTAL_ParcelaBaseCalculoReduz` float   DEFAULT NULL, 
	`TOTAL_Diferida` float   DEFAULT NULL, 
	`TOTAL_Suspensa` float   DEFAULT NULL, 
	`TOTAL_SubstituicaoTributaria` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rel1`;
CREATE TABLE rel1 (
	`num_rel` numeric NOT NULL  , 
	`empresa` int   DEFAULT NULL, 
	`entrada` datetime   DEFAULT NULL, 
	`especie` varchar(3)   DEFAULT NULL, 
	`serie` varchar(3)   DEFAULT NULL, 
	`numero` varchar(6)   DEFAULT NULL, 
	`emissao` datetime   DEFAULT NULL, 
	`emitente` int   DEFAULT NULL, 
	`estado` varchar(2)   DEFAULT NULL, 
	`vlr_contabil` float   DEFAULT NULL, 
	`codigo_contabil` varchar(6)   DEFAULT NULL, 
	`codigo_fiscal` varchar(6)   DEFAULT NULL, 
	`icms_cod` varchar(1)   DEFAULT NULL, 
	`icms_base` float   DEFAULT NULL, 
	`icms_aliquota` float   DEFAULT NULL, 
	`icms_vlrs` float   DEFAULT NULL, 
	`ipi_cod` varchar(1)   DEFAULT NULL, 
	`ipi_base` float   DEFAULT NULL, 
	`ipi_vlrs` float   DEFAULT NULL, 
	`obs` varchar(60)   DEFAULT NULL, 
	`oleo` float   DEFAULT NULL, 
	`diferencial` float   DEFAULT NULL, 
	`codigo` int   DEFAULT NULL, 
	`cod_contabil` int   DEFAULT NULL, 
	`debito` float   DEFAULT NULL, 
	`credito` float   DEFAULT NULL, 
	`trans` char(1)   DEFAULT NULL, 
	`FAZENDA` int   DEFAULT NULL, 
	`entrada1` datetime   DEFAULT NULL, 
	`nSum1` float   DEFAULT NULL, 
	`nSum2` float   DEFAULT NULL, 
	`nSum3` float   DEFAULT NULL, 
	`nSumImposto` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rel2`;
CREATE TABLE rel2 (
	`num_rel` numeric   DEFAULT NULL, 
	`empresa` int   DEFAULT NULL, 
	`NATUREZA` varchar(6)   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`BASE_ICMS` float   DEFAULT NULL, 
	`ICMS_CREDITADO` float   DEFAULT NULL, 
	`ISENTAS` float   DEFAULT NULL, 
	`OUTRAS` float   DEFAULT NULL, 
	`SALDO_CREDOR_ICMS` float   DEFAULT NULL, 
	`PAGINA_APURACAO` float   DEFAULT NULL, 
	`INSCRICAO` varchar(20)   DEFAULT NULL, 
	`CGC` varchar(20)   DEFAULT NULL, 
	`PAGINA_ENTRADA` int   DEFAULT NULL, 
	`TIPO` varchar(1)   DEFAULT NULL, 
	`CODIGO` int NOT NULL  , 
	`ImpostoSemCredito` float   DEFAULT NULL, 
	`NaoTributadas` float   DEFAULT NULL, 
	`ParcelaBaseCalculoReduz` float   DEFAULT NULL, 
	`Diferida` float   DEFAULT NULL, 
	`Suspensa` float   DEFAULT NULL, 
	`SubstituicaoTributaria` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rel6`;
CREATE TABLE rel6 (
	`LINHA` int NOT NULL  , 
	`NUM_REL` int NOT NULL  , 
	`DUPLICATA` char(15)   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`FORNEC` int   DEFAULT NULL, 
	`NOTA_FISCAL` char(15)   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`ESPECIE` int   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`SEQUENCIA` char(10)   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR_DUPLIC` float   DEFAULT NULL, 
	`BANCO` int   DEFAULT NULL, 
	`DATA_PAGAMENTO` datetime   DEFAULT NULL, 
	`JUROS` float   DEFAULT NULL, 
	`DESCONTO` float   DEFAULT NULL, 
	`DESCRICAO` varchar(100)   DEFAULT NULL, 
	`DESCRICAO1` varchar(100)   DEFAULT NULL, 
	`DESCRICAO2` varchar(100)   DEFAULT NULL, 
	`DESCRICAO3` varchar(100)   DEFAULT NULL, 
	`DESCRICAO4` varchar(100)   DEFAULT NULL, 
	`COD_CLIENTE` int   DEFAULT NULL, 
	`Seq1` char(3)   DEFAULT NULL, 
	`Seq2` int   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`ORIGEM` char(10)   DEFAULT NULL, 
	`BOLETO` varchar(15)   DEFAULT NULL, 
	`CATEGORIA` int   DEFAULT NULL, 
	`FAZENDA` int   DEFAULT NULL, 
	`PRODUTO` char(60)   DEFAULT NULL, 
	`CondPagamento` int   DEFAULT NULL, 
	`FILIAL` int   DEFAULT NULL, 
	`FILIALCUSTO` int   DEFAULT NULL, 
	`RECIBO` numeric   DEFAULT NULL, 
	`Gerado` datetime   DEFAULT NULL, 
	`LOCADOR` int   DEFAULT NULL, 
	`LOCATARIO` int   DEFAULT NULL, 
	`DATACONTRATO` datetime   DEFAULT NULL, 
	`VALORALUGUEL` float   DEFAULT NULL, 
	`IMOVEL` int   DEFAULT NULL, 
	`TAXAADMINISTRACAO` float   DEFAULT NULL, 
	`VALORADMINISTRACAO` float   DEFAULT NULL, 
	`ContaContabil` varchar(6)   DEFAULT NULL, 
	`Programacao` datetime   DEFAULT NULL, 
	`Caminho` varchar(200)   DEFAULT NULL, 
	`Lado1` float   DEFAULT NULL, 
	`Lado2` float   DEFAULT NULL, 
	`Lado3` float   DEFAULT NULL, 
	`Lado4` float   DEFAULT NULL, 
	`ValorIR` float   DEFAULT NULL, 
	`DuplicataBanco` int(1)   DEFAULT NULL, 
	`CreditoBanco` datetime   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel7`;
CREATE TABLE Rel7 (
	`LINHA` int NOT NULL  , 
	`NUM_REL` int NOT NULL  , 
	`FILIAL` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` numeric   DEFAULT NULL, 
	`QT_COMPRA_DENTRO` numeric   DEFAULT NULL, 
	`VL_COMPRA_DENTRO` numeric   DEFAULT NULL, 
	`QT_COMPRA_FORA` numeric   DEFAULT NULL, 
	`VL_COMPRA_FORA` numeric   DEFAULT NULL, 
	`QT_SAIDA_DENTRO` numeric   DEFAULT NULL, 
	`VL_SAIDA_DENTRO` numeric   DEFAULT NULL, 
	`QT_SAIDA_FORA` numeric   DEFAULT NULL, 
	`VL_SAIDA_FORA` numeric   DEFAULT NULL, 
	`ESTADO` char(2)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel9`;
CREATE TABLE Rel9 (
	`LINHA` int NOT NULL  , 
	`NUM_REL` int NOT NULL  , 
	`FILIAL` int   DEFAULT NULL, 
	`EMISSAO` datetime   DEFAULT NULL, 
	`NOTAFISCAL` char(10)   DEFAULT NULL, 
	`TIPO_MOVIMENTO` char(30)   DEFAULT NULL, 
	`CLIENTE` int   DEFAULT NULL, 
	`ITEM` numeric   DEFAULT NULL, 
	`RECEITA` char(10)   DEFAULT NULL, 
	`AGRONOMO` int   DEFAULT NULL, 
	`AGROTOXICO` int   DEFAULT NULL, 
	`QUANTIDADE` numeric   DEFAULT NULL, 
	`UNIDADE_MEDIDA` char(10)   DEFAULT NULL, 
	`CONDPAGAMENTO` int   DEFAULT NULL, 
	`EST_INICIO` float   DEFAULT NULL, 
	`EST_ENTRADA` float   DEFAULT NULL, 
	`EST_SAIDADENTRO` float   DEFAULT NULL, 
	`EST_SAIDAFORA` float   DEFAULT NULL, 
	`EST_TOTVENDAS` float   DEFAULT NULL, 
	`EST_TRANSF` float   DEFAULT NULL, 
	`EST_FINAL` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Rel8`;
CREATE TABLE Rel8 (
	`LINHA` int NOT NULL  , 
	`NUM_REL` int NOT NULL  , 
	`FILIAL` int   DEFAULT NULL, 
	`GRUPO` int   DEFAULT NULL, 
	`ITEM` numeric   DEFAULT NULL, 
	`PRECO_MEDIO` float   DEFAULT NULL, 
	`QTDE_ANTERIOR` numeric   DEFAULT NULL, 
	`QTDE_VENDA_TERCEIRO` numeric   DEFAULT NULL, 
	`VLR_VENDA_TERCEIRO` numeric   DEFAULT NULL, 
	`VLR_DESCONTO_TERCEIRO` numeric   DEFAULT NULL, 
	`VLR_DESCONTO_BASE_TERCEIRO` numeric   DEFAULT NULL, 
	`QTDE_VENDA_ASSOCIADO` numeric   DEFAULT NULL, 
	`VLR_VENDA_ASSOCIADO` numeric   DEFAULT NULL, 
	`VLR_DESCONTO_ASSOCIADO` numeric   DEFAULT NULL, 
	`VLR_DESCONTO_BASE_ASSOCIADO` numeric   DEFAULT NULL, 
	`NOTAFISCAL` char(10)   DEFAULT NULL, 
	`SERIE` char(2)   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`CondPagamento` varchar(50)   DEFAULT NULL, 
	`GERADO` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `RelDiasVida`;
CREATE TABLE RelDiasVida (
	`Num_Rel` int NOT NULL  , 
	`Item` int NOT NULL  , 
	`Estoque` float   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`Carteira` float   DEFAULT NULL, 
	`ConsumoDiario` float   DEFAULT NULL, 
	`EstoqueMinimo` float   DEFAULT NULL, 
	`SugestaoCompra` float   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `RelCurvaABC`;
CREATE TABLE RelCurvaABC (
	`Num_Rel` int NOT NULL  , 
	`Item` int NOT NULL  , 
	`Grupo` int   DEFAULT NULL, 
	`Sub_Grupo` int   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL, 
	`PrecoMedio` float   DEFAULT NULL, 
	`Participacao` float   DEFAULT NULL, 
	`Acumulado` float   DEFAULT NULL, 
	`ABC` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `REPLICACAO_TABELA`;
CREATE TABLE REPLICACAO_TABELA (
	`ID_REPLICACAO_TABELA` bigint   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `SolicitacaoComprasItens`;
CREATE TABLE SolicitacaoComprasItens (
	`Filial` int NOT NULL  , 
	`Solicitacao` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Item` int   DEFAULT NULL, 
	`Descricao` varchar(300)   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`Tipo` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`Referencia` varchar(70)   DEFAULT NULL, 
	`Saldo` float   DEFAULT NULL, 
	`QuantidadePrincipal` float   DEFAULT NULL, 
	`ComplementoProduto` varchar(255)   DEFAULT NULL, 
	`ValorSugerido` float   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`ID_SOLICITACAO_COMPRA_ITENS` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `SUB_GRUPO_ESTOQUE`;
CREATE TABLE SUB_GRUPO_ESTOQUE (
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Aquecedor` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `SITE`;
CREATE TABLE SITE (
	`ID_SITE` int NOT NULL  , 
	`NOME_EMPRESA` varchar(100)   DEFAULT NULL, 
	`NOME_CIDADE` varchar(100)   DEFAULT NULL, 
	`ESTADO` char(2)   DEFAULT NULL, 
	`FONE` varchar(14)   DEFAULT NULL, 
	`FONE_APP` varchar(14)   DEFAULT NULL, 
	`EMAIL` varchar(100)   DEFAULT NULL, 
	`sendusername` varchar(255)   DEFAULT NULL, 
	`sendpassword` varchar(255)   DEFAULT NULL, 
	`smtpserver` varchar(255)   DEFAULT NULL, 
	`smtpserverport` int   DEFAULT NULL, 
	`MailFrom` varchar(255)   DEFAULT NULL, 
	`MailTo` varchar(255)   DEFAULT NULL, 
	`MailCc` varchar(255)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `REPLICACAO_TABELA_COLUNA`;
CREATE TABLE REPLICACAO_TABELA_COLUNA (
	`ID_REPLICACAO_TABELA` int   DEFAULT NULL, 
	`ID_COLUNA` int   DEFAULT NULL, 
	`COLUNA` varchar(100)   DEFAULT NULL, 
	`CK_ENVIAR` int(1)   DEFAULT NULL, 
	`CK_RECEBER` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `SUB_GRUPO_ESTOQUE_IMOBILIZADO`;
CREATE TABLE SUB_GRUPO_ESTOQUE_IMOBILIZADO (
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `SubstituicaoTributaria`;
CREATE TABLE SubstituicaoTributaria (
	`ESTADO` varchar(2) NOT NULL  , 
	`COD_TRIBUTACAO` int NOT NULL  , 
	`SubstituicaoTributaria` numeric   DEFAULT NULL, 
	`AliquotaSubstituicao` numeric   DEFAULT NULL, 
	`Icms` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_AgrupamentoContas`;
CREATE TABLE Tab_AgrupamentoContas (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Tipo` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `RequisicaoPedidos`;
CREATE TABLE RequisicaoPedidos (
	`Filial` int NOT NULL  , 
	`Lancamento` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Observacao` varchar(255)   DEFAULT NULL, 
	`Pedido` varchar(6)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `SITUACAO_TRIBUTARIA`;
CREATE TABLE SITUACAO_TRIBUTARIA (
	`SITUACAO_TRIBUTARIA` char(3) NOT NULL  , 
	`DESCRICAO` varchar(70)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_ComposicaoRelGerencial_Subtrair`;
CREATE TABLE Tab_ComposicaoRelGerencial_Subtrair (
	`CodigoRel` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`AgrupamentoSubtrair` char(5)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_ComposicaoRelGerencial_Soma`;
CREATE TABLE Tab_ComposicaoRelGerencial_Soma (
	`CodigoRel` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`AgrupamentoSoma` char(5)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_AutorizacaoDepartamento`;
CREATE TABLE Tab_AutorizacaoDepartamento (
	`Usuario` char(3) NOT NULL  , 
	`Departamento` int NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_ComposicaoRelGerencial`;
CREATE TABLE Tab_ComposicaoRelGerencial (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_AgrupamentoContas_RelDespesas`;
CREATE TABLE Tab_AgrupamentoContas_RelDespesas (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Categorias`;
CREATE TABLE Tab_Categorias (
	`Codigo` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`Lucro` float   DEFAULT NULL, 
	`Desconto` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Convenios`;
CREATE TABLE Tab_Convenios (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`LimiteGeral` float   DEFAULT NULL, 
	`Bloqueado` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`CondPagamento` int   DEFAULT NULL, 
	`PercDesc` float   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`AceitaDependentes` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_EmailUsuario`;
CREATE TABLE Tab_EmailUsuario (
	`Usuario` char(3) NOT NULL  , 
	`Email` varchar(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Corretores`;
CREATE TABLE Tab_Corretores (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Correcao`;
CREATE TABLE Tab_Correcao (
	`CODIGO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Embalagens`;
CREATE TABLE Tab_Embalagens (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Feriados`;
CREATE TABLE Tab_Feriados (
	`DiaMes` char(4) NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Dia` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Imoveis`;
CREATE TABLE Tab_Imoveis (
	`Codigo` int NOT NULL  , 
	`Locador` int   DEFAULT NULL, 
	`Endereco` varchar(70)   DEFAULT NULL, 
	`Bairro` varchar(50)   DEFAULT NULL, 
	`Cidade` varchar(50)   DEFAULT NULL, 
	`Estado` varchar(2)   DEFAULT NULL, 
	`Cep` varchar(9)   DEFAULT NULL, 
	`Regiao` int   DEFAULT NULL, 
	`DiaVencimento` int   DEFAULT NULL, 
	`QtdeQuartos` float   DEFAULT NULL, 
	`QtdeVagas` float   DEFAULT NULL, 
	`MQuadrados` float   DEFAULT NULL, 
	`ValorIptu` float   DEFAULT NULL, 
	`ValorAluguel` float   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`Bloqueado` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Contrato` varchar(6)   DEFAULT NULL, 
	`TipoImovel` int   DEFAULT NULL, 
	`MatriculaCRI` varchar(10)   DEFAULT NULL, 
	`ContratoLocacao` char(6)   DEFAULT NULL, 
	`Locacao` int(1)   DEFAULT NULL, 
	`Venda` int(1)   DEFAULT NULL, 
	`Inativo` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_GeracaoFechamento`;
CREATE TABLE Tab_GeracaoFechamento (
	`Agrupamento` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`GrupoCFOP` int   DEFAULT NULL, 
	`GrupoContaCusto` int   DEFAULT NULL, 
	`TipoMovimentacao` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Imoveis_Reajuste`;
CREATE TABLE Tab_Imoveis_Reajuste (
	`Codigo` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Emissao` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Porcentagem` float   DEFAULT NULL, 
	`ContratoLocacao` varchar(6)   DEFAULT NULL, 
	`ValorAnterior` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tab_GrupoCFOP`;
CREATE TABLE tab_GrupoCFOP (
	`CODIGO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tab_InscricaoST`;
CREATE TABLE tab_InscricaoST (
	`ID_tab_InscricaoST` int NOT NULL  , 
	`Filial` int   DEFAULT NULL, 
	`Estado` char(2)   DEFAULT NULL, 
	`InscricaoST` varchar(14)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TAB_IBPT_VERSAO`;
CREATE TABLE TAB_IBPT_VERSAO (
	`ID_IBPT` int NOT NULL  , 
	`CODIGO` char(8)   DEFAULT NULL, 
	`EX` int   DEFAULT NULL, 
	`TABELA` int   DEFAULT NULL, 
	`ALIQ_NAC` float   DEFAULT NULL, 
	`ALIQ_INT` float   DEFAULT NULL, 
	`VERSAO` char(10)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_ImoveisProprietario`;
CREATE TABLE Tab_ImoveisProprietario (
	`imovel` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Locador` int   DEFAULT NULL, 
	`PercDIMOB` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Justificativa`;
CREATE TABLE Tab_Justificativa (
	`Codigo` int NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`bloquearorcamento` int(1)   DEFAULT NULL, 
	`NaoExibir` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_LeadTime`;
CREATE TABLE Tab_LeadTime (
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`LeadTime` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tab_RegE13`;
CREATE TABLE tab_RegE13 (
	`Filial` int NOT NULL  , 
	`NumSerieECF` char(20) NOT NULL  , 
	`CRZ` char(6) NOT NULL  , 
	`TotalizadorParcial` char(7) NOT NULL  , 
	`ValorAcumulado` float   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Modulos`;
CREATE TABLE Tab_Modulos (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TAB_NCM`;
CREATE TABLE TAB_NCM (
	`ID_NCM` int NOT NULL  , 
	`NCM` char(8)   DEFAULT NULL, 
	`DS_NCM` varchar(50)   DEFAULT NULL, 
	`EXTIPI` char(3)   DEFAULT NULL, 
	`CK_DEDUCAO` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TAB_MOTIVO`;
CREATE TABLE TAB_MOTIVO (
	`Codigo` int NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Justificativa` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tab_RegE01`;
CREATE TABLE tab_RegE01 (
	`Filial` int NOT NULL  , 
	`NumSerieECF` char(20) NOT NULL  , 
	`CRZ` char(6) NOT NULL  , 
	`NumCaixa` char(3)   DEFAULT NULL, 
	`DataReducao` datetime   DEFAULT NULL, 
	`NumCOO` char(6)   DEFAULT NULL, 
	`NumCRO` char(6)   DEFAULT NULL, 
	`ValorVendaBruta` float   DEFAULT NULL, 
	`PIS` float   DEFAULT NULL, 
	`COFINS` float   DEFAULT NULL, 
	`TotalGeral` float   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Marcas`;
CREATE TABLE Tab_Marcas (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_RelatorioGerencial`;
CREATE TABLE Tab_RelatorioGerencial (
	`Mes` int NOT NULL  , 
	`Ano` int NOT NULL  , 
	`CodAgrupamento` int NOT NULL  , 
	`Valor` float   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TAB_SETORES`;
CREATE TABLE TAB_SETORES (
	`Codigo` int NOT NULL  , 
	`DESCRICAO` char(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Regioes`;
CREATE TABLE Tab_Regioes (
	`Codigo` int NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`BloqueioFinanceiro` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tab_RegE15`;
CREATE TABLE tab_RegE15 (
	`Filial` int NOT NULL  , 
	`NumSerieECF` char(20) NOT NULL  , 
	`CRZ` char(6) NOT NULL  , 
	`COO` char(6) NOT NULL  , 
	`CCF` char(6) NOT NULL  , 
	`Sequencial` int NOT NULL  , 
	`Item` int   DEFAULT NULL, 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`ValorUnitario` float   DEFAULT NULL, 
	`Desconto` float   DEFAULT NULL, 
	`Acrescimo` float   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL, 
	`TotalizadorParcial` char(7)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`PIS` float   DEFAULT NULL, 
	`COFINS` float   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tab_RegE14`;
CREATE TABLE tab_RegE14 (
	`Filial` int NOT NULL  , 
	`NumSerieECF` char(20) NOT NULL  , 
	`CRZ` char(6) NOT NULL  , 
	`COO` char(6) NOT NULL  , 
	`CCF` char(6) NOT NULL  , 
	`DataEmissao` datetime   DEFAULT NULL, 
	`ValorTotal` float   DEFAULT NULL, 
	`Desconto` float   DEFAULT NULL, 
	`Acrescimo` float   DEFAULT NULL, 
	`ValorLiquido` float   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`CPF_CGC` varchar(14)   DEFAULT NULL, 
	`PIS` float   DEFAULT NULL, 
	`COFINS` float   DEFAULT NULL, 
	`Cliente` varchar(40)   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Sabores`;
CREATE TABLE Tab_Sabores (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoNF_Naturezas`;
CREATE TABLE Tab_TipoNF_Naturezas (
	`FILIAL` int NOT NULL  , 
	`CodTipoNF` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`CodNatureza` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoNF_Cabecalho`;
CREATE TABLE Tab_TipoNF_Cabecalho (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoNF_Usuario`;
CREATE TABLE Tab_TipoNF_Usuario (
	`FILIAL` int NOT NULL  , 
	`Codigo` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Usuario` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoConsumo`;
CREATE TABLE Tab_TipoConsumo (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoAlmoxarifado`;
CREATE TABLE Tab_TipoAlmoxarifado (
	`Codigo` int NOT NULL  , 
	`DESCRICAO` char(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoNF`;
CREATE TABLE Tab_TipoNF (
	`Filial` int NOT NULL  , 
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`ControlePedidos` int(1)   DEFAULT NULL, 
	`NFRemessa` int(1)   DEFAULT NULL, 
	`CFOPProdutos` int(1)   DEFAULT NULL, 
	`GerarContasReceber` int(1)   DEFAULT NULL, 
	`GerarContasPagar` int(1)   DEFAULT NULL, 
	`GerarEstoque` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`NatTransDentro` int   DEFAULT NULL, 
	`NatTransFora` int   DEFAULT NULL, 
	`NatTransEntrada` int   DEFAULT NULL, 
	`Tipo` char(1)   DEFAULT NULL, 
	`PrecoMedioProdutos` int(1)   DEFAULT NULL, 
	`NaoCalcularImpostos` int(1)   DEFAULT NULL, 
	`NatEntradaDentro` int   DEFAULT NULL, 
	`NatEntradaFora` int   DEFAULT NULL, 
	`Exterior` int(1)   DEFAULT NULL, 
	`ComplementoICMS` int(1)   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL, 
	`NatNaoContribuinte` int   DEFAULT NULL, 
	`NaoCalcularPISCOFINS` int(1)   DEFAULT NULL, 
	`DescricaoNF` varchar(50)   DEFAULT NULL, 
	`Convenio` int(1)   DEFAULT NULL, 
	`GeraRelFaturamento` int(1)   DEFAULT NULL, 
	`InformarImpostos` int(1)   DEFAULT NULL, 
	`CreditoCliente` int(1)   DEFAULT NULL, 
	`NatZFM` int   DEFAULT NULL, 
	`VendaFutura` int(1)   DEFAULT NULL, 
	`ControlaReceberCFOP` int(1)   DEFAULT NULL, 
	`DividirNF` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TiposDocumento`;
CREATE TABLE Tab_TiposDocumento (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabAgendaTelefonica_Telefones`;
CREATE TABLE TabAgendaTelefonica_Telefones (
	`SeqAgenda` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Telefone` char(15)   DEFAULT NULL, 
	`Tipo` varchar(50)   DEFAULT NULL, 
	`Email` varchar(255)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoRecebimento`;
CREATE TABLE Tab_TipoRecebimento (
	`Codigo` int NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabAjusteIPI`;
CREATE TABLE tabAjusteIPI (
	`Codigo` char(10) NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`Tipo_Mov` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tab_TributacaoImpostos_CST`;
CREATE TABLE tab_TributacaoImpostos_CST (
	`Codigo` int NOT NULL  , 
	`CST_PIS_COFINS` char(2) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabAgendaTelefonica`;
CREATE TABLE TabAgendaTelefonica (
	`Seq` int NOT NULL  , 
	`Nome` varchar(300)   DEFAULT NULL, 
	`Telefone` varchar(300)   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Endereco` varchar(70)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`RG` varchar(20)   DEFAULT NULL, 
	`cpf_cnpj` varchar(30)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabApuracao`;
CREATE TABLE tabApuracao (
	`Registro` char(4) NOT NULL  , 
	`Periodo` datetime NOT NULL  , 
	`Indice` char(2) NOT NULL  , 
	`Valor` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabCategoriaClienteMargem`;
CREATE TABLE TabCategoriaClienteMargem (
	`CATEGORIACLIENTE` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`QUANTIDADE` float   DEFAULT NULL, 
	`MARGEM` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabAtividadeCliente`;
CREATE TABLE TabAtividadeCliente (
	`CODIGO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabAjustesApuracao`;
CREATE TABLE tabAjustesApuracao (
	`Empresa` int NOT NULL  , 
	`Periodo` datetime NOT NULL  , 
	`Tipo_Apuracao` char(4) NOT NULL  , 
	`Codigo` int NOT NULL  , 
	`Valor` float   DEFAULT NULL, 
	`Descricao` varchar(255)   DEFAULT NULL, 
	`Ind_Doc` char(1)   DEFAULT NULL, 
	`Origem` int   DEFAULT NULL, 
	`Documento` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabCategoriaCliente`;
CREATE TABLE TabCategoriaCliente (
	`CODIGO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`VlrServico_CorteDobra` float   DEFAULT NULL, 
	`VlrServico_Armado` float   DEFAULT NULL, 
	`MediaDiasPrazo` int   DEFAULT NULL, 
	`Encargos` float   DEFAULT NULL, 
	`DiasValidadeSPC` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabCategoriaGrupoProdutos`;
CREATE TABLE TabCategoriaGrupoProdutos (
	`CATEGORIACLIENTE` int NOT NULL  , 
	`GRUPO` int NOT NULL  , 
	`MargemMinima` float   DEFAULT NULL, 
	`MargemInicial` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabClientesRelacionados`;
CREATE TABLE TabClientesRelacionados (
	`CLIENTEPRINCIPAL` int NOT NULL  , 
	`CLIENTERELACIONADO` int NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(10)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabCST_PIS_COFINS`;
CREATE TABLE tabCST_PIS_COFINS (
	`CST_PIS_COFINS` char(2) NOT NULL  , 
	`Descricao` varchar(255)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabCidadeDIMOB`;
CREATE TABLE TabCidadeDIMOB (
	`ID` int NOT NULL  , 
	`Codigo` int   DEFAULT NULL, 
	`Cidade` varchar(200)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabCoeficientes`;
CREATE TABLE TabCoeficientes (
	`Codigo` int NOT NULL  , 
	`Nome` varchar(50)   DEFAULT NULL, 
	`QtdeMaxParc` int   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`PercDesconto` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabCoeficientes_Parcelas`;
CREATE TABLE TabCoeficientes_Parcelas (
	`Codigo` int NOT NULL  , 
	`Parcela` int NOT NULL  , 
	`Taxa` float   DEFAULT NULL, 
	`Corretagem` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabCidade`;
CREATE TABLE tabCidade (
	`Cidade` int NOT NULL  , 
	`Nome` varchar(50)   DEFAULT NULL, 
	`CodigoIBGE` varchar(7)   DEFAULT NULL, 
	`Estado` varchar(2)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` varchar(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` varchar(3)   DEFAULT NULL, 
	`NomeAbreviado` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabelaPrecoCliente`;
CREATE TABLE TabelaPrecoCliente (
	`id_TabelaPrecoCliente` int NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL, 
	`ck_Inativo` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabCST_IPI`;
CREATE TABLE tabCST_IPI (
	`CST_IPI` char(2) NOT NULL  , 
	`Descricao` varchar(255)   DEFAULT NULL, 
	`Tipo_Mov` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabECF`;
CREATE TABLE tabECF (
	`Empresa` int NOT NULL  , 
	`Caixa` int NOT NULL  , 
	`Modelo` char(20)   DEFAULT NULL, 
	`nroFabricacao` char(20)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabelaPrecoClienteItem`;
CREATE TABLE TabelaPrecoClienteItem (
	`id_TabelaPrecoClienteItem` int NOT NULL  , 
	`id_TabelaPrecoCliente` int   DEFAULT NULL, 
	`Item` int   DEFAULT NULL, 
	`Unidade` char(3)   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`ck_Inativo` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tabela_Preco_Configuracao`;
CREATE TABLE Tabela_Preco_Configuracao (
	`grupo` int NOT NULL  , 
	`TextoColuna001` varchar(50)   DEFAULT NULL, 
	`TextoColuna002` varchar(50)   DEFAULT NULL, 
	`TextoColuna003` varchar(50)   DEFAULT NULL, 
	`TextoColuna004` varchar(50)   DEFAULT NULL, 
	`TextoColuna005` varchar(50)   DEFAULT NULL, 
	`PercColuna001` float   DEFAULT NULL, 
	`PercColuna002` float   DEFAULT NULL, 
	`PercColuna003` float   DEFAULT NULL, 
	`PercColuna004` float   DEFAULT NULL, 
	`PercColuna005` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL, 
	`VlrServico` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TABELA_PRECOS`;
CREATE TABLE TABELA_PRECOS (
	`ITEM` int NOT NULL  , 
	`VALIDADE` datetime NOT NULL  , 
	`UNIDADE` varchar(3)   DEFAULT NULL, 
	`PRECOBASE` float   DEFAULT NULL, 
	`VLRCUSTO` float   DEFAULT NULL, 
	`DESCONTO1` float   DEFAULT NULL, 
	`DESCONTO2` float   DEFAULT NULL, 
	`DESCONTO3` float   DEFAULT NULL, 
	`DESCONTO4` float   DEFAULT NULL, 
	`TAXAIPI` float   DEFAULT NULL, 
	`VLRCUSTOFINAL` float   DEFAULT NULL, 
	`PRECOMINIMO` float   DEFAULT NULL, 
	`PRECOVENDA` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` varchar(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` varchar(3)   DEFAULT NULL, 
	`PercVenda` float   DEFAULT NULL, 
	`CustoSemIpi` float   DEFAULT NULL, 
	`CustoUnidSemIPI` float   DEFAULT NULL, 
	`MVA` float   DEFAULT NULL, 
	`BASEMVA` float   DEFAULT NULL, 
	`CustoUnidSemMVA` float   DEFAULT NULL, 
	`PrecoVendaBase` float   DEFAULT NULL, 
	`VlrServico` float   DEFAULT NULL, 
	`DESCONTO5` float   DEFAULT NULL, 
	`DESCONTOAVISTA` float   DEFAULT NULL, 
	`CustoBaseIPI` float   DEFAULT NULL, 
	`CustoKGIPI` float   DEFAULT NULL, 
	`Observacao` text(1073741823)   DEFAULT NULL, 
	`DescricaoTabela` text(1073741823)   DEFAULT NULL, 
	`CustoBaseCompra` float   DEFAULT NULL, 
	`CustoKGCompra` float   DEFAULT NULL, 
	`Ajuste8020` float   DEFAULT NULL, 
	`Ajuste2` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabLoteamentos_Decretos`;
CREATE TABLE TabLoteamentos_Decretos (
	`Loteamento` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Decreto` varchar(10)   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabItensFornecedor`;
CREATE TABLE TabItensFornecedor (
	`Empresa` int NOT NULL  , 
	`Fornecedor` char(14) NOT NULL  , 
	`ItemOrigem` varchar(14) NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`ItemEntrada` varchar(14)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabINPC`;
CREATE TABLE TabINPC (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL, 
	`Taxa` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabLoteamentos_Lotes`;
CREATE TABLE TabLoteamentos_Lotes (
	`Loteamento` int NOT NULL  , 
	`NumLote` char(6) NOT NULL  , 
	`Matricula` varchar(30)   DEFAULT NULL, 
	`Quadra` varchar(4)   DEFAULT NULL, 
	`AreaTotal` float   DEFAULT NULL, 
	`Frente` float   DEFAULT NULL, 
	`Esquina` int(1)   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL, 
	`Status` char(2)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Xpoint` float   DEFAULT NULL, 
	`Ypoint` float   DEFAULT NULL, 
	`DataEscritura` datetime   DEFAULT NULL, 
	`DataContabil` datetime   DEFAULT NULL, 
	`AssinadaPor` varchar(100)   DEFAULT NULL, 
	`Cartorio` varchar(100)   DEFAULT NULL, 
	`Livro` varchar(10)   DEFAULT NULL, 
	`Folha` varchar(10)   DEFAULT NULL, 
	`ValorEscritura` float   DEFAULT NULL, 
	`DataContrato` datetime   DEFAULT NULL, 
	`ValorContrato` float   DEFAULT NULL, 
	`AnoDIMOB` int   DEFAULT NULL, 
	`ValorDIMOB` float   DEFAULT NULL, 
	`LadoDireito` float   DEFAULT NULL, 
	`LadoEsquerdo` float   DEFAULT NULL, 
	`Fundo` float   DEFAULT NULL, 
	`Confrontamentos` varchar(1000)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabLoteamentos`;
CREATE TABLE TabLoteamentos (
	`Codigo` int NOT NULL  , 
	`Nome` varchar(255)   DEFAULT NULL, 
	`AreaTotal` float   DEFAULT NULL, 
	`AreaLoteada` float   DEFAULT NULL, 
	`QtdeLotes` int   DEFAULT NULL, 
	`QtdeLotesDisp` int   DEFAULT NULL, 
	`Observacao` varchar(1000)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`CaminhoImagem` varchar(500)   DEFAULT NULL, 
	`ObservacaoCorretagem` varchar(1000)   DEFAULT NULL, 
	`TabCoeficiente` int   DEFAULT NULL, 
	`EmpresaLoteamento` varchar(70)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`Cidade` int   DEFAULT NULL, 
	`Estado` char(2)   DEFAULT NULL, 
	`ValorTaxaAdministrativa` float   DEFAULT NULL, 
	`ContaCustoComissao` varchar(11)   DEFAULT NULL, 
	`PrazoEscritura` int   DEFAULT NULL, 
	`grupo_conta_Reembolso` int   DEFAULT NULL, 
	`seq_cta_custo_Reembolso` int   DEFAULT NULL, 
	`sub_grupo_Reembolso` int   DEFAULT NULL, 
	`ck_Mostrar_Site` int(1)   DEFAULT NULL, 
	`DescricaoParaSite` varchar(4000)   DEFAULT NULL, 
	`Latitude` varchar(50)   DEFAULT NULL, 
	`Longitude` varchar(50)   DEFAULT NULL, 
	`DescricaoResumidaParaSite` varchar(4000)   DEFAULT NULL, 
	`IR_PRAZO_ESCLARECIMENTOS` datetime   DEFAULT NULL, 
	`IR_CNPJ_EMPRESA` varchar(30)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabLocais`;
CREATE TABLE TabLocais (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(255)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabLoteamentos_Lotes_Decretos`;
CREATE TABLE TabLoteamentos_Lotes_Decretos (
	`Loteamento` int NOT NULL  , 
	`NumLote` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Decreto` varchar(10)   DEFAULT NULL, 
	`Data` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabObservacaoLF`;
CREATE TABLE tabObservacaoLF (
	`Empresa` int NOT NULL  , 
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`Tipo_Mov` char(1)   DEFAULT NULL, 
	`Tipo_Apuracao` int(1)   DEFAULT NULL, 
	`CodApuracao` varchar(10)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabLoteamentos_Socios`;
CREATE TABLE TabLoteamentos_Socios (
	`Loteamento` int NOT NULL  , 
	`Socio` int NOT NULL  , 
	`Perc` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabNiveis`;
CREATE TABLE TabNiveis (
	`Usuario` char(3) NOT NULL  , 
	`Programa` int NOT NULL  , 
	`Acesso` char(3)   DEFAULT NULL, 
	`Movimentar` char(3)   DEFAULT NULL, 
	`Incluir` char(3)   DEFAULT NULL, 
	`Alterar` char(3)   DEFAULT NULL, 
	`Excluir` char(3)   DEFAULT NULL, 
	`Imprimir` char(3)   DEFAULT NULL, 
	`Pesquisar` char(3)   DEFAULT NULL, 
	`UsuarioAtualizacao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabMarkup`;
CREATE TABLE TabMarkup (
	`Numero` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`DespesasFixas` float   DEFAULT NULL, 
	`DespesasVariaveis` float   DEFAULT NULL, 
	`Comissao` float   DEFAULT NULL, 
	`MargemLucro` float   DEFAULT NULL, 
	`IndiceMarkup` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabObservacaoLF_Naturezas`;
CREATE TABLE tabObservacaoLF_Naturezas (
	`Empresa` int NOT NULL  , 
	`codObservacao` int NOT NULL  , 
	`codNatureza` char(10) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabSistemas`;
CREATE TABLE TabSistemas (
	`SistemaNome` char(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabOcorrenciasSantander`;
CREATE TABLE TabOcorrenciasSantander (
	`ID` int NOT NULL  , 
	`Codigo` int   DEFAULT NULL, 
	`Ocorrencia` varchar(100)   DEFAULT NULL, 
	`EfetuarBaixa` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabRegiaoVendedor`;
CREATE TABLE TabRegiaoVendedor (
	`Regiao` int NOT NULL  , 
	`Vendedor` int NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabOcorrenciasRetornoHSBC`;
CREATE TABLE tabOcorrenciasRetornoHSBC (
	`Ocorrencia` int NOT NULL  , 
	`SeqOcorrencia` int NOT NULL  , 
	`DescOcorrencia` varchar(100)   DEFAULT NULL, 
	`EfetuarBaixa` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabOrigemCliente`;
CREATE TABLE TabOrigemCliente (
	`CODIGO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabSistemasCDI_Usuarios`;
CREATE TABLE tabSistemasCDI_Usuarios (
	`Sistemas` int NOT NULL  , 
	`Usuarios` char(3) NOT NULL  , 
	`Acessos` float   DEFAULT NULL, 
	`PermiteRepassar` int(1) NOT NULL  , 
	`Tamanho` int   DEFAULT NULL, 
	`Cor` varchar(15)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabObservacaoLF_Produtos`;
CREATE TABLE tabObservacaoLF_Produtos (
	`Empresa` int NOT NULL  , 
	`codObservacao` int NOT NULL  , 
	`Produto` varchar(60) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabOrigemDocumentoIPI`;
CREATE TABLE tabOrigemDocumentoIPI (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabPais`;
CREATE TABLE tabPais (
	`Pais` int NOT NULL  , 
	`Nome` varchar(50)   DEFAULT NULL, 
	`CodigoIBGE` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabParametros`;
CREATE TABLE TabParametros (
	`CampoCliente` int   DEFAULT NULL, 
	`CampoRepresentante` int   DEFAULT NULL, 
	`EliminarPedido` int(1)   DEFAULT NULL, 
	`ClienteDisponivel` int(1)   DEFAULT NULL, 
	`JurosMensal` float   DEFAULT NULL, 
	`JurosDiario` float   DEFAULT NULL, 
	`VincularPedido` int(1)   DEFAULT NULL, 
	`BaixarEstoque` int(1)   DEFAULT NULL, 
	`AbaixoCusto` int(1)   DEFAULT NULL, 
	`QtdeClientes` int   DEFAULT NULL, 
	`DiasFaturamento` int   DEFAULT NULL, 
	`CentroCusto` int   DEFAULT NULL, 
	`TipoMovimento` int   DEFAULT NULL, 
	`CentroCustoEntrada` int   DEFAULT NULL, 
	`TipoMovimentoEntrada` int   DEFAULT NULL, 
	`LancamentoBancario` int(1)   DEFAULT NULL, 
	`HistoricoBaixa` int   DEFAULT NULL, 
	`GrupoContaBaixa` int   DEFAULT NULL, 
	`SubGrupoContaBaixa` int   DEFAULT NULL, 
	`SeqContaCustoBaixa` int   DEFAULT NULL, 
	`BancoDuplicata` int   DEFAULT NULL, 
	`CalculaIRRepresentante` int(1)   DEFAULT NULL, 
	`AliquotaIRRepresentante` float   DEFAULT NULL, 
	`ObrigaItens` int(1)   DEFAULT NULL, 
	`ObrigaRepresentante` int(1)   DEFAULT NULL, 
	`AcrescimoCusto` float   DEFAULT NULL, 
	`CodigoReferencia` int   DEFAULT NULL, 
	`CpfCnpjDuplicados` int(1)   DEFAULT NULL, 
	`UltimaColuna` int   DEFAULT NULL, 
	`AliquotaAutonomo` float   DEFAULT NULL, 
	`DescontoSuframa` int(1)   DEFAULT NULL, 
	`LancarImpostos` int(1)   DEFAULT NULL, 
	`Observacao` int   DEFAULT NULL, 
	`DescontoUnitario` int(1)   DEFAULT NULL, 
	`AdicionaFrete` int(1)   DEFAULT NULL, 
	`VendaAVista` int   DEFAULT NULL, 
	`ModeloOutras` int NOT NULL  , 
	`ComissaoIgual` int(1) NOT NULL  , 
	`ProdutosOutras` int(1)   DEFAULT NULL, 
	`UtilizaOrdemSeparacao` int(1)   DEFAULT NULL, 
	`DecimaisQuantidade` int   DEFAULT NULL, 
	`ImprimeRelatorioCotacoes` int(1)   DEFAULT NULL, 
	`ComissaoTaxa` int   DEFAULT NULL, 
	`SenhaDesconto` int(1)   DEFAULT NULL, 
	`UtilizaNroNota` int(1)   DEFAULT NULL, 
	`UtilizaNroDuplicata` int(1)   DEFAULT NULL, 
	`UtilizaNroFicha` int(1)   DEFAULT NULL, 
	`NroNotaFiscal` int   DEFAULT NULL, 
	`NroDuplicata` int   DEFAULT NULL, 
	`NroFicha` int   DEFAULT NULL, 
	`OrcamentoLoja` int(1)   DEFAULT NULL, 
	`DadosReferencia` int(1)   DEFAULT NULL, 
	`ValidaData` int(1)   DEFAULT NULL, 
	`ImprimirDuplicata` int(1)   DEFAULT NULL, 
	`ArredondarDesdobramento` int(1)   DEFAULT NULL, 
	`Decimais` int   DEFAULT NULL, 
	`Gaveta` int(1)   DEFAULT NULL, 
	`MensagemCarne` varchar(600)   DEFAULT NULL, 
	`MensagemDuplicata` varchar(600)   DEFAULT NULL, 
	`ImagemEmpresa` varchar(30)   DEFAULT NULL, 
	`ImagemPropaganda` varchar(620)   DEFAULT NULL, 
	`TempoPropaganda` int   DEFAULT NULL, 
	`MensagemPedido` varchar(35)   DEFAULT NULL, 
	`FaturarLocalidades` int(1)   DEFAULT NULL, 
	`ExibeRestricao` int(1)   DEFAULT NULL, 
	`ExibeAtrasadas` int(1)   DEFAULT NULL, 
	`OcultarLucroLiquido` int(1)   DEFAULT NULL, 
	`QuantidadeInsuficiente` int(1)   DEFAULT NULL, 
	`DescontadaBancario` int(1)   DEFAULT NULL, 
	`MesmoValorGrupo` int(1)   DEFAULT NULL, 
	`ImpressoraNotaFiscal` int(1)   DEFAULT NULL, 
	`NomeImpressora` varchar(50)   DEFAULT NULL, 
	`CasosEspeciais` text(2147483647)   DEFAULT NULL, 
	`TipoVenda` int   DEFAULT NULL, 
	`ExibeInformacoes` int(1)   DEFAULT NULL, 
	`ClienteAVista` int   DEFAULT NULL, 
	`AcrescimoVenda` float   DEFAULT NULL, 
	`SenhaRestricao` int(1)   DEFAULT NULL, 
	`LiberarClienteInativo` int(1)   DEFAULT NULL, 
	`ContaDuplicata` varchar(15)   DEFAULT NULL, 
	`FechamentoDia` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabProgramas`;
CREATE TABLE TabProgramas (
	`Programa` int NOT NULL  , 
	`Nome` char(50)   DEFAULT NULL, 
	`NomeVB` char(50)   DEFAULT NULL, 
	`NomeMenuVB` char(50)   DEFAULT NULL, 
	`NomeSistema` char(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabSistemasCDI`;
CREATE TABLE tabSistemasCDI (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`NomeExe` varchar(250)   DEFAULT NULL, 
	`Mostrar` int(1)   DEFAULT NULL, 
	`ChaveRegistro` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabUsuarios_Filial`;
CREATE TABLE TabUsuarios_Filial (
	`Filial` int NOT NULL  , 
	`Usuario` char(3) NOT NULL  , 
	`Sequencia` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabUsuarios`;
CREATE TABLE TabUsuarios (
	`Identificacao` char(3) NOT NULL  , 
	`Nome` char(30)   DEFAULT NULL, 
	`Senha` char(10)   DEFAULT NULL, 
	`Administracao` int(1)   DEFAULT NULL, 
	`FILIAL` int   DEFAULT NULL, 
	`AlteraFilial` int(1)   DEFAULT NULL, 
	`AlteraFinanceiro` int(1)   DEFAULT NULL, 
	`Diretoria` int(1)   DEFAULT NULL, 
	`Perc_Descontos` float   DEFAULT NULL, 
	`Perc_Juros` float   DEFAULT NULL, 
	`Atendente` int   DEFAULT NULL, 
	`Palm` int(1)   DEFAULT NULL, 
	`Vendedor` int   DEFAULT NULL, 
	`ControlaOP` int(1)   DEFAULT NULL, 
	`Master` int(1)   DEFAULT NULL, 
	`ConsultaPedidos` int(1)   DEFAULT NULL, 
	`Inativo` int(1)   DEFAULT NULL, 
	`ControleAutorizacaoCompras` int(1)   DEFAULT NULL, 
	`ValorMaxSolicitacao` float   DEFAULT NULL, 
	`ValorMaxCotacao` float   DEFAULT NULL, 
	`DescontoNF` float   DEFAULT NULL, 
	`ValorMaxOrdemCompra` float   DEFAULT NULL, 
	`AutorizacaoReabrePedido` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`DATAATUALIZACAO_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`AutorizaAtualizacoes` int(1)   DEFAULT NULL, 
	`MostrarConsultaCompras` int(1)   DEFAULT NULL, 
	`NaoAlteraDataPagto` int(1)   DEFAULT NULL, 
	`EncerraReclamacao` int(1) NOT NULL  , 
	`DistribuiReclamacao` int(1) NOT NULL  , 
	`IncluiFoto` int(1) NOT NULL  , 
	`ExcluiFoto` int(1) NOT NULL  , 
	`Valor_Descontos` float   DEFAULT NULL, 
	`ConsultaGeracaoCompras` int(1)   DEFAULT NULL, 
	`ControlaLogistica` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabTipoFormConsulta`;
CREATE TABLE TabTipoFormConsulta (
	`TP_FORM` char(3) NOT NULL  , 
	`NomeFormulario` varchar(50)   DEFAULT NULL, 
	`Observacao` varchar(255)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabTipoReclamacao`;
CREATE TABLE TabTipoReclamacao (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabVeiculos`;
CREATE TABLE TabVeiculos (
	`PLACA` char(10) NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Proprietario` int   DEFAULT NULL, 
	`id_Veiculo` int NOT NULL  , 
	`Inativo` int(1)   DEFAULT NULL, 
	`Estado` char(2)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabStatus`;
CREATE TABLE tabStatus (
	`Status` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`Tipo` varchar(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Temp_ChequesPre`;
CREATE TABLE Temp_ChequesPre (
	`Lancamento` int NOT NULL  , 
	`Agencia` char(4)   DEFAULT NULL, 
	`Cheque` varchar(10)   DEFAULT NULL, 
	`DescBanco` varchar(50)   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Emissao` datetime   DEFAULT NULL, 
	`Vencimento` datetime   DEFAULT NULL, 
	`Nome` varchar(50)   DEFAULT NULL, 
	`Nascimento` datetime   DEFAULT NULL, 
	`Pessoa` char(1)   DEFAULT NULL, 
	`CpfCnpj` varchar(18)   DEFAULT NULL, 
	`Rg` varchar(20)   DEFAULT NULL, 
	`Inscricao` varchar(20)   DEFAULT NULL, 
	`Telefone` varchar(15)   DEFAULT NULL, 
	`Responsavel` varchar(50)   DEFAULT NULL, 
	`Destino` varchar(50)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Observacao` varchar(255)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabVeiculos_Documentos`;
CREATE TABLE TabVeiculos_Documentos (
	`id_Documento` int NOT NULL  , 
	`id_Veiculo` int NOT NULL  , 
	`Arquivo` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TarefasaFazer`;
CREATE TABLE TarefasaFazer (
	`Usuario` char(3) NOT NULL  , 
	`Data` datetime NOT NULL  , 
	`Hora` char(5) NOT NULL  , 
	`Duracao` char(5)   DEFAULT NULL, 
	`Titulo` varchar(50)   DEFAULT NULL, 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`Prioridade` int   DEFAULT NULL, 
	`Codigo` int   DEFAULT NULL, 
	`CodLocal` int   DEFAULT NULL, 
	`AgendadoPor` varchar(30)   DEFAULT NULL, 
	`NaoParticipanteAvisoEmail` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TIPO_BONIFICACAO`;
CREATE TABLE TIPO_BONIFICACAO (
	`ID_TIPO_BONIFICACAO` int NOT NULL  , 
	`DS_TIPO_BONIFICACAO` varchar(50)   DEFAULT NULL, 
	`CK_TIPO_BONIFICACAO` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Temp_ChequesPre_Duplicata`;
CREATE TABLE Temp_ChequesPre_Duplicata (
	`Lancamento` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`Duplicata` char(6)   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`SeqDuplicata` varchar(10)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Temp_BaixasChq`;
CREATE TABLE Temp_BaixasChq (
	`SERIE` char(3) NOT NULL  , 
	`Filial` int NOT NULL  , 
	`DUPLICATA` char(8) NOT NULL  , 
	`SEQUENCIA` varchar(10) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`BANCO` int   DEFAULT NULL, 
	`VENCIMENTO` datetime   DEFAULT NULL, 
	`VALOR_DUPLIC` float   DEFAULT NULL, 
	`DATA_PAGAMENTO` datetime   DEFAULT NULL, 
	`JUROS` float   DEFAULT NULL, 
	`DESCONTO` float   DEFAULT NULL, 
	`OBSERVACAO` varchar(100)   DEFAULT NULL, 
	`TITULO` varchar(6)   DEFAULT NULL, 
	`BOLETO` varchar(15)   DEFAULT NULL, 
	`OBSERVACAOBOLETO1` varchar(84)   DEFAULT NULL, 
	`OBSERVACAOBOLETO2` varchar(84)   DEFAULT NULL, 
	`OBSERVACAOBOLETO3` varchar(84)   DEFAULT NULL, 
	`OBSERVACAOBOLETO4` varchar(84)   DEFAULT NULL, 
	`IMPRESSAO` int(1)   DEFAULT NULL, 
	`FilialBaixa` int   DEFAULT NULL, 
	`ReciboBaixa` numeric   DEFAULT NULL, 
	`NRO_CONTA` char(15)   DEFAULT NULL, 
	`ContaContabilPagar` char(5)   DEFAULT NULL, 
	`TransmitidoContab` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`Cupom` varchar(6)   DEFAULT NULL, 
	`GERA_DUPLICATA` int(1)   DEFAULT NULL, 
	`FILIALFECHAMENTO` int   DEFAULT NULL, 
	`FECHAMENTO` varchar(6)   DEFAULT NULL, 
	`troca` char(10)   DEFAULT NULL, 
	`DATA_PREVISTA` datetime   DEFAULT NULL, 
	`CondPagamento` int   DEFAULT NULL, 
	`TipoRecebimento` int   DEFAULT NULL, 
	`VencTroca` datetime   DEFAULT NULL, 
	`DuplicataBanco` int(1)   DEFAULT NULL, 
	`Fazenda` int   DEFAULT NULL, 
	`DuplicataGarantida` int   DEFAULT NULL, 
	`Credito` float   DEFAULT NULL, 
	`DataEstorno` datetime   DEFAULT NULL, 
	`FlagBaixa` int(1)   DEFAULT NULL, 
	`BancoBaixa` int   DEFAULT NULL, 
	`ContaBaixa` varchar(15)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tipo_Produto`;
CREATE TABLE Tipo_Produto (
	`TIPO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TIPO_DE_MOVIMENTO`;
CREATE TABLE TIPO_DE_MOVIMENTO (
	`COD_MOVIMENTO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`TIPO` char(1)   DEFAULT NULL, 
	`PRECO_MEDIO` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tmp_Escrituras`;
CREATE TABLE tmp_Escrituras (
	`Cliente` int   DEFAULT NULL, 
	`RazaoSocial` varchar(200)   DEFAULT NULL, 
	`Loteamento` int   DEFAULT NULL, 
	`Nome` varchar(200)   DEFAULT NULL, 
	`NumLote` varchar(20)   DEFAULT NULL, 
	`Quadra` varchar(10)   DEFAULT NULL, 
	`UltPag` datetime   DEFAULT NULL, 
	`Documento` varchar(6)   DEFAULT NULL, 
	`Filial` int   DEFAULT NULL, 
	`EnviadoCartaEscritura` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tmp_ImpostoDIMOB`;
CREATE TABLE tmp_ImpostoDIMOB (
	`NUM_REL` int NOT NULL  , 
	`LOCADOR` int NOT NULL  , 
	`IMOVEL` int NOT NULL  , 
	`MES` int NOT NULL  , 
	`ANO` int NOT NULL  , 
	`VALOR` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TipoTitulos`;
CREATE TABLE TipoTitulos (
	`codigo` int NOT NULL  , 
	`descricao` char(50)   DEFAULT NULL, 
	`TipoContrato` char(20)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TipoServicos`;
CREATE TABLE TipoServicos (
	`Codigo` int NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tmp_Reajustes`;
CREATE TABLE tmp_Reajustes (
	`FILIAL` int NOT NULL  , 
	`DOCUMENTO` varchar(6) NOT NULL  , 
	`Loteamento` int   DEFAULT NULL, 
	`Nome` varchar(255)   DEFAULT NULL, 
	`NumLote` char(6)   DEFAULT NULL, 
	`Quadra` varchar(4)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`RazaoSocial` varchar(70)   DEFAULT NULL, 
	`Parcela` int   DEFAULT NULL, 
	`Vencimento1` datetime   DEFAULT NULL, 
	`Vencimento2` datetime   DEFAULT NULL, 
	`ProxVencimento` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TRANSPORTADORA`;
CREATE TABLE TRANSPORTADORA (
	`TRANSPORTADORA` numeric NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`ENDERECO` varchar(50)   DEFAULT NULL, 
	`BAIRRO` char(40)   DEFAULT NULL, 
	`CIDADE` char(40)   DEFAULT NULL, 
	`CEP` char(9)   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`FONE` varchar(30)   DEFAULT NULL, 
	`FAX` varchar(30)   DEFAULT NULL, 
	`CONTATO` varchar(30)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`CPF_CGC` varchar(18)   DEFAULT NULL, 
	`INSCRICAOESTADUAL` varchar(16)   DEFAULT NULL, 
	`PLACA` char(10)   DEFAULT NULL, 
	`DESCONTO` float   DEFAULT NULL, 
	`DestacarDadosNF` int(1)   DEFAULT NULL, 
	`Inativo` int(1)   DEFAULT NULL, 
	`TipoTransportadora` int(1)   DEFAULT NULL, 
	`TipoMotorista` int(1)   DEFAULT NULL, 
	`ANTT` varchar(20)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tmp_LANC_BONIFICACAO`;
CREATE TABLE Tmp_LANC_BONIFICACAO (
	`ID_LANC_BONIFICACAO` int NOT NULL  , 
	`DT_LANC_BONIFICACAO` datetime   DEFAULT NULL, 
	`ID_TIPO_BONIFICACAO` int   DEFAULT NULL, 
	`VENDEDOR` char(3)   DEFAULT NULL, 
	`VALOR` float   DEFAULT NULL, 
	`CK_LANC_BONIFICACAO` char(1)   DEFAULT NULL, 
	`VENDEDOR_ORIGEM` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tmp_PARAMETROS`;
CREATE TABLE Tmp_PARAMETROS (
	`TIPO_MOV_ENTRADA` int   DEFAULT NULL, 
	`TIPO_MOV_SAIDA` int   DEFAULT NULL, 
	`TIPO_MOV_REQUISICAO` int   DEFAULT NULL, 
	`Natureza` numeric   DEFAULT NULL, 
	`NaturezaFora` numeric   DEFAULT NULL, 
	`FILIAL_MATRIZ` int   DEFAULT NULL, 
	`ESPECIE_TITULO` int   DEFAULT NULL, 
	`HISTORICO_CHEQUE` int   DEFAULT NULL, 
	`OBSERVACAO_BOLETO1` char(50)   DEFAULT NULL, 
	`OBSERVACAO_BOLETO2` char(50)   DEFAULT NULL, 
	`OBSERVACAO_BOLETO3` char(50)   DEFAULT NULL, 
	`JUROS` float   DEFAULT NULL, 
	`SequenciaNPR` numeric   DEFAULT NULL, 
	`ValorSaca` float   DEFAULT NULL, 
	`DescricaoNPR` varchar(300)   DEFAULT NULL, 
	`HistoricoAVista` int   DEFAULT NULL, 
	`EspecieIR` int   DEFAULT NULL, 
	`FornecIR` int   DEFAULT NULL, 
	`SequenciaIR` int   DEFAULT NULL, 
	`GrupoIR` int   DEFAULT NULL, 
	`SubGrupoIR` int   DEFAULT NULL, 
	`EspecieNF` int   DEFAULT NULL, 
	`BancoLancamentos` int   DEFAULT NULL, 
	`TRANSPORTADORA` int   DEFAULT NULL, 
	`HistoricoBaixa` int   DEFAULT NULL, 
	`HistoricoBaixaPagar` int   DEFAULT NULL, 
	`NatTransDentro` numeric   DEFAULT NULL, 
	`NatTransfora` numeric   DEFAULT NULL, 
	`NatTransEntrada` numeric   DEFAULT NULL, 
	`NatDevEntradaDentro` numeric   DEFAULT NULL, 
	`NatDevEntradaFora` numeric   DEFAULT NULL, 
	`EspecieDevolucao` int   DEFAULT NULL, 
	`NatDevSaidaDentro` numeric   DEFAULT NULL, 
	`NatDevSaidaFora` numeric   DEFAULT NULL, 
	`GRUPO_CONTADEV` int   DEFAULT NULL, 
	`SUB_GRUPO_CONTADEV` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTODEV` smallint   DEFAULT NULL, 
	`ContaContabilDEV` char(5)   DEFAULT NULL, 
	`DepartamentoDEV` int   DEFAULT NULL, 
	`SituacaoDEV` int   DEFAULT NULL, 
	`SequenciaDEV` int   DEFAULT NULL, 
	`ContaContabilCredito` char(5)   DEFAULT NULL, 
	`DepartamentoCredito` int   DEFAULT NULL, 
	`SituacaoCredito` int   DEFAULT NULL, 
	`SequenciaCredito` int   DEFAULT NULL, 
	`SequenciaCustoCredito` int   DEFAULT NULL, 
	`GrupoCredito` int   DEFAULT NULL, 
	`SubGrupoCredito` int   DEFAULT NULL, 
	`EspecieCredito` int   DEFAULT NULL, 
	`NatEntradaDentro` numeric   DEFAULT NULL, 
	`NatEntradaFora` numeric   DEFAULT NULL, 
	`EspecieEntrada` int   DEFAULT NULL, 
	`GRUPO_CONTAENTRADA` int   DEFAULT NULL, 
	`SUB_GRUPO_CONTAENTRADA` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTOENTRADA` smallint   DEFAULT NULL, 
	`SequenciaCustoCreditoPagar` int   DEFAULT NULL, 
	`GrupoCreditoPagar` int   DEFAULT NULL, 
	`SubGrupoCreditoPagar` int   DEFAULT NULL, 
	`Mes_Mov` datetime   DEFAULT NULL, 
	`NatConsumoDentro` numeric   DEFAULT NULL, 
	`NatConsumofora` numeric   DEFAULT NULL, 
	`RECIBOBAIXA` numeric   DEFAULT NULL, 
	`NatVendaFuturaDentro` numeric   DEFAULT NULL, 
	`NatVendaFuturafora` numeric   DEFAULT NULL, 
	`NatEntregaVendaFuturaDentro` numeric   DEFAULT NULL, 
	`NatEntregaVendaFuturafora` numeric   DEFAULT NULL, 
	`CondicaoEntregaVendaFutura` numeric   DEFAULT NULL, 
	`SafraCafe` char(10)   DEFAULT NULL, 
	`CondPagamentoReceber` varchar(50)   DEFAULT NULL, 
	`CF_TAXA_VALOR_BRUTO` int   DEFAULT NULL, 
	`CF_TAXA_ACRESCIMO` int   DEFAULT NULL, 
	`CF_TAXA_QUEBRA` int   DEFAULT NULL, 
	`GRUPO_CONTAADIANTAMENTO` int   DEFAULT NULL, 
	`SUB_GRUPO_CONTAADIANTAMENTO` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTOADIANTAMENTO` smallint   DEFAULT NULL, 
	`ContaContabilADIANTAMENTO` char(5)   DEFAULT NULL, 
	`EspecieAdiantamento` int   DEFAULT NULL, 
	`CondPagamentoAdiantamento` int   DEFAULT NULL, 
	`CF_TAXA_JUROS` int   DEFAULT NULL, 
	`CF_TAXA_COMERCIALIZACAO` int   DEFAULT NULL, 
	`CF_TAXA_ARMAZENAGEM` int   DEFAULT NULL, 
	`INTEGRALIZACAO` numeric   DEFAULT NULL, 
	`SAFRA` char(10)   DEFAULT NULL, 
	`CF_TAXA_SACARIA` int   DEFAULT NULL, 
	`CARTAMODELO` varchar(2000)   DEFAULT NULL, 
	`CALC_ESTOQUE` int(1) NOT NULL  , 
	`TAXACOMERCIALIZACAO` float   DEFAULT NULL, 
	`CLIEIRRF` int   DEFAULT NULL, 
	`GeraContaContabil` int(1)   DEFAULT NULL, 
	`COND_ORCA` int   DEFAULT NULL, 
	`DiaBloqueado` int   DEFAULT NULL, 
	`CONTAINICIALFORNEC` varchar(15)   DEFAULT NULL, 
	`CONTAINICIALCLIENTE` varchar(15)   DEFAULT NULL, 
	`GERACONTAAUTOMATICO` int(1)   DEFAULT NULL, 
	`Nat_VendaOrdemDE` int   DEFAULT NULL, 
	`Nat_VendaOrdemFE` int   DEFAULT NULL, 
	`Nat_RemessaOrdemDE` int   DEFAULT NULL, 
	`Nat_RemessaOrdemFE` int   DEFAULT NULL, 
	`Nat_RemessaConsertoDE` int   DEFAULT NULL, 
	`Nat_RemessaConsertoFE` int   DEFAULT NULL, 
	`TIPO_MOV_CONTAGEM_ENTRADA` int   DEFAULT NULL, 
	`TIPO_MOV_CONTAGEM_SAIDA` int   DEFAULT NULL, 
	`CALCULA_NEGATIVO` int(1)   DEFAULT NULL, 
	`UNIDADECOLUNAS` varchar(3)   DEFAULT NULL, 
	`VlrMaoObra` float   DEFAULT NULL, 
	`TIPO_MOV_TRANSFERENCIA_ENTRADA` int   DEFAULT NULL, 
	`TIPO_MOV_TRANSFERENCIA_SAIDA` int   DEFAULT NULL, 
	`PRECO_MEDIO_ICMS` int(1)   DEFAULT NULL, 
	`ARAME` int   DEFAULT NULL, 
	`PERC_ARAME` float   DEFAULT NULL, 
	`altera_valores` int(1)   DEFAULT NULL, 
	`FerroEstribo` int   DEFAULT NULL, 
	`HistoricoEstornoBaixa` int   DEFAULT NULL, 
	`ValorBloqueioPedido` float   DEFAULT NULL, 
	`DiasBloqueioPedido` int   DEFAULT NULL, 
	`GRUPOJUROSPAGAR` int   DEFAULT NULL, 
	`SUBGRUPOJUROSPAGAR` int   DEFAULT NULL, 
	`SEQUENCIAJUROSPAGAR` int   DEFAULT NULL, 
	`GRUPODESCONTOSPAGAR` int   DEFAULT NULL, 
	`SUBGRUPODESCONTOSPAGAR` int   DEFAULT NULL, 
	`SEQUENCIADESCONTOSPAGAR` int   DEFAULT NULL, 
	`CategoriaClienteDeposito` int   DEFAULT NULL, 
	`ValorVendaDeposito` float   DEFAULT NULL, 
	`GrupoFrete` int   DEFAULT NULL, 
	`SubGrupoFrete` int   DEFAULT NULL, 
	`SequenciaFrete` int   DEFAULT NULL, 
	`EspecieFrete` int   DEFAULT NULL, 
	`DiasBloqueioOrcamento` int   DEFAULT NULL, 
	`TipoMovimentoFechamento` int   DEFAULT NULL, 
	`CodBarras` char(9)   DEFAULT NULL, 
	`Cliente_PedidoConsumidor` int   DEFAULT NULL, 
	`Condicao_PedidoConsumidor` int   DEFAULT NULL, 
	`GrupoImpostoSubstituicao` int   DEFAULT NULL, 
	`SubGrupoImpostoSubstituicao` int   DEFAULT NULL, 
	`SequenciaImpostoSubstituicao` int   DEFAULT NULL, 
	`EspecieImpostoSubstituicao` int   DEFAULT NULL, 
	`FornecedorImpostoSubstituicao` int   DEFAULT NULL, 
	`SenhaOficial` varchar(50)   DEFAULT NULL, 
	`HistoricoEstornoBaixaCtaPagar` int   DEFAULT NULL, 
	`VlrMaoObraMinimo` float   DEFAULT NULL, 
	`TabPrecoGenerica` int(1)   DEFAULT NULL, 
	`EspecieIRRF` int   DEFAULT NULL, 
	`grupoirrf` int   DEFAULT NULL, 
	`subgrupoirrf` int   DEFAULT NULL, 
	`sequenciairrf` int   DEFAULT NULL, 
	`BloqueioCredito` int(1)   DEFAULT NULL, 
	`SenhaUF` int(1)   DEFAULT NULL, 
	`SenhaEstoque` int(1)   DEFAULT NULL, 
	`TipoImpressao` int(1)   DEFAULT NULL, 
	`ValorMinimo3Parcelas` float   DEFAULT NULL, 
	`ImprimirPedidoExpedicao` int(1)   DEFAULT NULL, 
	`Adicional1` varchar(50)   DEFAULT NULL, 
	`Perc1` float   DEFAULT NULL, 
	`Adicional2` varchar(50)   DEFAULT NULL, 
	`Perc2` float   DEFAULT NULL, 
	`Adicional3` varchar(50)   DEFAULT NULL, 
	`Perc3` float   DEFAULT NULL, 
	`Adicional4` varchar(50)   DEFAULT NULL, 
	`Perc4` float   DEFAULT NULL, 
	`CategoriaParticular` int   DEFAULT NULL, 
	`EspecieMercadoria` varchar(20)   DEFAULT NULL, 
	`MarcaMercadoria` varchar(20)   DEFAULT NULL, 
	`reserva001` varchar(50)   DEFAULT NULL, 
	`reserva002` varchar(50)   DEFAULT NULL, 
	`reserva003` varchar(50)   DEFAULT NULL, 
	`BloquearDescontoAcimaDe` float   DEFAULT NULL, 
	`UsoConsumo` int(1)   DEFAULT NULL, 
	`TabelaPrecoAco` int(1)   DEFAULT NULL, 
	`VolumeObrigatorio` int(1)   DEFAULT NULL, 
	`ControlePercPedido` int(1)   DEFAULT NULL, 
	`Agenda` int(1)   DEFAULT NULL, 
	`PesoMinimoEntrega` float   DEFAULT NULL, 
	`ControleCustoUltimaCompra` int(1)   DEFAULT NULL, 
	`VerificaEstoqueEncerramento` int(1)   DEFAULT NULL, 
	`SenhaProdutoAbaixoTabela` int(1)   DEFAULT NULL, 
	`BloquearValoresNFPedido` int(1)   DEFAULT NULL, 
	`OcultarValoresPedido` int(1)   DEFAULT NULL, 
	`NaoVerificarSaldoPedidos` int(1)   DEFAULT NULL, 
	`OrdemProdNFe` char(1)   DEFAULT NULL, 
	`ControlaPlacaNFE` int(1)   DEFAULT NULL, 
	`TipoBaixaChq` char(1)   DEFAULT NULL, 
	`NaoImprimirCabecalhoPedido` int(1)   DEFAULT NULL, 
	`PedidoNF_RECEBER` int(1)   DEFAULT NULL, 
	`SUB_GRUPO_Deposito` int   DEFAULT NULL, 
	`GRUPO_CONTA_Deposito` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO_Deposito` int   DEFAULT NULL, 
	`Historico_Deposito` int   DEFAULT NULL, 
	`VencimentoDataEntrega` int(1)   DEFAULT NULL, 
	`GrupoCorteDobra` int   DEFAULT NULL, 
	`EnviaEmailNFeCanc` int(1)   DEFAULT NULL, 
	`ControleAutorizacaoSolicitacao` int(1)   DEFAULT NULL, 
	`ControlaMotivosReceber` int(1)   DEFAULT NULL, 
	`ControlaReplicacao` int(1)   DEFAULT NULL, 
	`NaoImprimirReferenciaNFe` int(1)   DEFAULT NULL, 
	`CalcularConsultaProdutosSobre` char(1)   DEFAULT NULL, 
	`ProducaoDiariaArmado` float   DEFAULT NULL, 
	`FornecedorAlmoxarifado` int   DEFAULT NULL, 
	`TipoMovimentoAlmoxarifado` int   DEFAULT NULL, 
	`QtdeParc1` int   DEFAULT NULL, 
	`PercFinan1` float   DEFAULT NULL, 
	`QtdeParc2` int   DEFAULT NULL, 
	`PercFinan2` float   DEFAULT NULL, 
	`QtdeParc3` int   DEFAULT NULL, 
	`PercFinan3` float   DEFAULT NULL, 
	`QtdeParc4` int   DEFAULT NULL, 
	`PercFinan4` float   DEFAULT NULL, 
	`QtdeParc5` int   DEFAULT NULL, 
	`PercFinan5` float   DEFAULT NULL, 
	`ValorEntradaFinan` float   DEFAULT NULL, 
	`CondPagamentoLote` int   DEFAULT NULL, 
	`QtdeParcEntrada` int   DEFAULT NULL, 
	`CondPagamentoLoteEntrada` int   DEFAULT NULL, 
	`CondPagamentoLoteEntradaNCT` int   DEFAULT NULL, 
	`ValorTaxaAdministrativa` float   DEFAULT NULL, 
	`TaxaImpostosDesistencia` float   DEFAULT NULL, 
	`EspeciePagarReembolso` int   DEFAULT NULL, 
	`ContaContabilReembolso` int   DEFAULT NULL, 
	`BancoPagarReembolso` int   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tmp_LucroPresumido`;
CREATE TABLE Tmp_LucroPresumido (
	`id_LucroPresumido` int NOT NULL  , 
	`Empresa` int NOT NULL  , 
	`Emissao` datetime NOT NULL  , 
	`CST_PIS_COFINS` char(2) NOT NULL  , 
	`CFOP` int NOT NULL  , 
	`Modelo` char(2) NOT NULL  , 
	`ValorTotal` float   DEFAULT NULL, 
	`ValorBaseCalculo` float   DEFAULT NULL, 
	`ValorPIS` float   DEFAULT NULL, 
	`ValorCOFINS` float   DEFAULT NULL, 
	`ValorDesconto` float   DEFAULT NULL, 
	`Tipo` int   DEFAULT NULL, 
	`Quantidade` float   DEFAULT NULL, 
	`Serie` char(3)   DEFAULT NULL, 
	`Situacao` char(2)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tmp_Lanc_VendasLote_Entradas`;
CREATE TABLE Tmp_Lanc_VendasLote_Entradas (
	`Filial` int NOT NULL  , 
	`Documento` varchar(6)   DEFAULT NULL, 
	`Sequencia` varchar(5) NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`Valor` float   DEFAULT NULL, 
	`NCT` int(1) NOT NULL  , 
	`SeqLinha` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `UNIDADE_MEDIDAS`;
CREATE TABLE UNIDADE_MEDIDAS (
	`UNIDADE_MEDIDA` varchar(3) NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`LIMITE_INFERIOR` float   DEFAULT NULL, 
	`LIMITE_SUPERIOR` float   DEFAULT NULL, 
	`MULTIPLICADOR` float   DEFAULT NULL, 
	`TransmissaoDialUp` char(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Vencimentos_OC`;
CREATE TABLE Vencimentos_OC (
	`OrdemCompra` numeric NOT NULL  , 
	`Fornecedor` int NOT NULL  , 
	`Parcela` char(5) NOT NULL  , 
	`Vencimento` datetime   DEFAULT NULL, 
	`valor` float   DEFAULT NULL, 
	`NaoGerarFluxoCaixa` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `VENDEDOR_COMISSAO`;
CREATE TABLE VENDEDOR_COMISSAO (
	`VENDEDOR` int NOT NULL  , 
	`SEQUENCIA` int NOT NULL  , 
	`QUANTIDADE` float   DEFAULT NULL, 
	`COMISSAO` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tributacao_TipoNF`;
CREATE TABLE Tributacao_TipoNF (
	`Filial` int NOT NULL  , 
	`Cod_Tributacao` int NOT NULL  , 
	`TipoNF` int NOT NULL  , 
	`CFOPDentro` int   DEFAULT NULL, 
	`CFOPFora` int   DEFAULT NULL, 
	`CFOPEntradaDentro` int   DEFAULT NULL, 
	`CFOPEntradaFora` int   DEFAULT NULL, 
	`GerarContasReceber` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TRIBUTACAO`;
CREATE TABLE TRIBUTACAO (
	`COD_TRIBUTACAO` int NOT NULL  , 
	`DESCRICAO` char(50)   DEFAULT NULL, 
	`ICMS` int(1)   DEFAULT NULL, 
	`IPI` int(1)   DEFAULT NULL, 
	`BASE_REDU_ICMS` float   DEFAULT NULL, 
	`GeraDesconto` int(1)   DEFAULT NULL, 
	`Observacao` numeric   DEFAULT NULL, 
	`SITUACAO_TRIBUTARIA` char(3)   DEFAULT NULL, 
	`TipoDentro` char(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ICMSFORA` int(1)   DEFAULT NULL, 
	`IPIFORA` int(1)   DEFAULT NULL, 
	`BASE_REDU_ICMSFORA` float   DEFAULT NULL, 
	`GeraDescontoFORA` int(1)   DEFAULT NULL, 
	`ObservacaoFORA` numeric   DEFAULT NULL, 
	`SITUACAO_TRIBUTARIAFORA` char(3)   DEFAULT NULL, 
	`TipoFora` char(1)   DEFAULT NULL, 
	`Observacao2_dentro` numeric   DEFAULT NULL, 
	`Observacao2_fora` numeric   DEFAULT NULL, 
	`AliquotaICMS` numeric   DEFAULT NULL, 
	`AliquotaSubstituicao` numeric   DEFAULT NULL, 
	`SubstituicaoTributaria` numeric   DEFAULT NULL, 
	`Reducao` int(1)   DEFAULT NULL, 
	`SimplesNacional` char(3)   DEFAULT NULL, 
	`SimplesNacionalFora` char(3)   DEFAULT NULL, 
	`SimplesNacionalEntrada` char(3)   DEFAULT NULL, 
	`SimplesNacionalForaEntrada` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `VENDEDOR`;
CREATE TABLE VENDEDOR (
	`VENDEDOR` numeric NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`ENDERECO` varchar(50)   DEFAULT NULL, 
	`BAIRRO` char(50)   DEFAULT NULL, 
	`CIDADE` char(50)   DEFAULT NULL, 
	`CEP` char(9)   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`FONE` char(30)   DEFAULT NULL, 
	`CPF` char(18)   DEFAULT NULL, 
	`TAXA_COMIS` float   DEFAULT NULL, 
	`ETIQUETAS` char(5)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`TAXA_DESCONTO` float   DEFAULT NULL, 
	`REGIAO` int   DEFAULT NULL, 
	`DataComissao` int   DEFAULT NULL, 
	`PercExtra` float   DEFAULT NULL, 
	`PercExtraAcresc` float   DEFAULT NULL, 
	`BANCO` varchar(20)   DEFAULT NULL, 
	`AGENCIA` varchar(10)   DEFAULT NULL, 
	`CONTACORRENTE` varchar(10)   DEFAULT NULL, 
	`CONTATO` varchar(50)   DEFAULT NULL, 
	`EMAIL` varchar(50)   DEFAULT NULL, 
	`SITE` varchar(50)   DEFAULT NULL, 
	`FAX` varchar(30)   DEFAULT NULL, 
	`TipoVendedor` int(1)   DEFAULT NULL, 
	`TipoAtendente` int(1)   DEFAULT NULL, 
	`OBservacao` varchar(500)   DEFAULT NULL, 
	`DadosEmail1` varchar(50)   DEFAULT NULL, 
	`DadosEmail2` varchar(50)   DEFAULT NULL, 
	`DadosEmail3` varchar(50)   DEFAULT NULL, 
	`DadosEmail4` varchar(50)   DEFAULT NULL, 
	`Representante` int(1)   DEFAULT NULL, 
	`Meta` float   DEFAULT NULL, 
	`INSS` float   DEFAULT NULL, 
	`IRPF` float   DEFAULT NULL, 
	`CondPagamentoCaixa` int   DEFAULT NULL, 
	`Nacionalidade` varchar(30)   DEFAULT NULL, 
	`EstadoCivil` varchar(30)   DEFAULT NULL, 
	`RegimeCasamento` varchar(50)   DEFAULT NULL, 
	`Profissao` varchar(30)   DEFAULT NULL, 
	`RG` varchar(30)   DEFAULT NULL, 
	`VendedorSupervisor` int   DEFAULT NULL, 
	`Supervisor` int(1)   DEFAULT NULL, 
	`CodCidade` int   DEFAULT NULL, 
	`Complemento` varchar(30)   DEFAULT NULL, 
	`Numero` varchar(30)   DEFAULT NULL, 
	`CRECI` varchar(10)   DEFAULT NULL, 
	`Imobiliaria` varchar(50)   DEFAULT NULL, 
	`Parceiro` int(1)   DEFAULT NULL, 
	`Divulgador` int(1)   DEFAULT NULL, 
	`Inativo` int(1) NOT NULL  , 
	`PercTaxaAdm` float   DEFAULT NULL, 
	`CalculaConsultaGerencial` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `VERSAO`;
CREATE TABLE VERSAO (
	`VERSAO` varchar(5)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `view_ItemEstados`;
CREATE TABLE view_ItemEstados (
	`GRUPO` int NOT NULL  , 
	`SUB_GRUPO` int NOT NULL  , 
	`ITEM` int NOT NULL  , 
	`DESCRICAO` varchar(300)   DEFAULT NULL, 
	`EstOrigem` char(2)   DEFAULT NULL, 
	`EstDestino` char(2)   DEFAULT NULL, 
	`Aliquota` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `VOLUMES`;
CREATE TABLE VOLUMES (
	`VOLUME` int NOT NULL  , 
	`DESCRICAO` varchar(40)   DEFAULT NULL, 
	`TransmissaoDialUp` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `View_LancRequisicao`;
CREATE TABLE View_LancRequisicao (
	`FILIAL` int NOT NULL  , 
	`GRUPO` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`ITEM` int   DEFAULT NULL, 
	`UltimaRequisicao` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Vendedor_Meta`;
CREATE TABLE Vendedor_Meta (
	`Vendedor` int NOT NULL  , 
	`Grupo` int NOT NULL  , 
	`PercMeta` float   DEFAULT NULL, 
	`QtdeMeta` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


