

--
-- Database OrdemServicoCDI 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 03/02/2018 08:14:15
--   _       _          __     ___             ______        _____     ___                 ___
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||
--

DROP DATABASE IF EXISTS `OrdemServicoCDI`;
CREATE DATABASE `OrdemServicoCDI`;

USE OrdemServicoCDI;


DROP TABLE IF EXISTS `AUTORIZACAO`;
CREATE TABLE AUTORIZACAO (
	`IDENTIFICACAO` varchar(20) NOT NULL  , 
	`NIVEL` tinyint NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CbaContas_Acesso`;
CREATE TABLE CbaContas_Acesso (
	`NRO_CONTA` char(15) NOT NULL  , 
	`BANCO` int NOT NULL  , 
	`IDENTIFICACAO` char(3) NOT NULL  , 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHECK_LIST`;
CREATE TABLE CHECK_LIST (
	`ID_CHECK_LIST` int NOT NULL  , 
	`ID_CLIENTE` int NOT NULL  , 
	`ID_SISTEMA` int NOT NULL  , 
	`ID_OPCAO_MENU` int NOT NULL  , 
	`ID_ITEM_MENU` int NOT NULL  , 
	`DS_CHECK_LIST` varchar(8000)   DEFAULT NULL, 
	`CH_CHECK_LIST` int(1) NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DataAtualizacao_Alteracao` datetime   DEFAULT NULL, 
	`HoraAtualizacao_Alteracao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao_Alteracao` char(3)   DEFAULT NULL
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
	`Calcula` int(1)   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHECK_LIST_DESENV`;
CREATE TABLE CHECK_LIST_DESENV (
	`ID_CHECK_LIST_DESENV` int NOT NULL  , 
	`ID_CHECK_LIST` int NOT NULL  , 
	`ID_FORMULARIO` int NOT NULL  , 
	`NOME_MENU` varchar(50)   DEFAULT NULL, 
	`LOCAL_FORM` varchar(250)   DEFAULT NULL, 
	`OBSERVACOES` varchar(8000)   DEFAULT NULL
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
	`AdiantamentoClientes` int(1)   DEFAULT NULL, 
	`AdiantamentoFornecedores` int(1)   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHECK_LIST_DESFAZER`;
CREATE TABLE CHECK_LIST_DESFAZER (
	`ID_CHECK_LIST_DESFAZER` int NOT NULL  , 
	`ID_CHECK_LIST` int NOT NULL  , 
	`ID_ITEM_MENU` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHECK_LIST_FORMULARIO`;
CREATE TABLE CHECK_LIST_FORMULARIO (
	`ID_CHECK_LIST_FORMULARIO` int NOT NULL  , 
	`ID_CHECK_LIST` int NOT NULL  , 
	`ID_FORMULARIO` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHECK_LIST_ITEM_MENU`;
CREATE TABLE CHECK_LIST_ITEM_MENU (
	`ID_CHECK_LIST_ITEM_MENU` int NOT NULL  , 
	`ID_CHECK_LIST` int NOT NULL  , 
	`ID_ITEM_MENU` int NOT NULL  , 
	`CK_CHECK_LIST_ITEM_MENU` varchar(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHECK_LIST_RECURSOS_BD`;
CREATE TABLE CHECK_LIST_RECURSOS_BD (
	`ID_CHECK_LIST_RECURSOS_BD` int NOT NULL  , 
	`ID_CHECK_LIST` int NOT NULL  , 
	`ID_RECURSOS_BD` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CHECK_LIST_SUPORTE`;
CREATE TABLE CHECK_LIST_SUPORTE (
	`ID_CHECK_LIST_SUPORTE` int NOT NULL  , 
	`ID_CHECK_LIST` int NOT NULL  , 
	`DS_CHECK_LIST_SUPORTE` varchar(8000)   DEFAULT NULL, 
	`CK_CHECK_LIST_SUPORTE` varchar(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Checklist_Instalacoes`;
CREATE TABLE Checklist_Instalacoes (
	`Codigo` int   DEFAULT NULL, 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`Servidor` int(1)   DEFAULT NULL, 
	`Instancia` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DATAATUALIZACAO_alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC`;
CREATE TABLE CLIEFORNEC (
	`CODIGO` int NOT NULL  , 
	`PESSOA` char(1)   DEFAULT NULL, 
	`CPF_CGC` varchar(18)   DEFAULT NULL, 
	`INSCRICAOESTADUAL` varchar(20)   DEFAULT NULL, 
	`RAZAOSOCIAL` varchar(70)   DEFAULT NULL, 
	`ENDERECO` varchar(70)   DEFAULT NULL, 
	`BAIRRO` varchar(30)   DEFAULT NULL, 
	`CIDADE` varchar(30)   DEFAULT NULL, 
	`ESTADO` varchar(2)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`STATUS` int(1)   DEFAULT NULL, 
	`STATUS_RD` int(1)   DEFAULT NULL, 
	`OBSERVACAO` text   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`INFORMATICA` int(1) NOT NULL  , 
	`CONTABILIDADE` int(1) NOT NULL  , 
	`DATA_CADASTRO` datetime   DEFAULT NULL, 
	`MicroEmpresa` int(1)   DEFAULT NULL, 
	`NUMERO` varchar(30)   DEFAULT NULL, 
	`SUSPENSO` int(1)   DEFAULT NULL, 
	`INATIVO` int(1)   DEFAULT NULL, 
	`ORIGEM` int   DEFAULT NULL, 
	`Celular` varchar(100)   DEFAULT NULL, 
	`CodCidade` int   DEFAULT NULL, 
	`CodPais` int   DEFAULT NULL, 
	`DATAATUALIZACAO_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`CaminhoScript` varchar(50)   DEFAULT NULL, 
	`CaminhoExecGenerico` varchar(300)   DEFAULT NULL, 
	`CaminhoExecFiscal` varchar(300)   DEFAULT NULL, 
	`2` varchar(300)   DEFAULT NULL, 
	`CaminhoExecAco` varchar(300)   DEFAULT NULL, 
	`CaminhoExecEmpresa` varchar(300)   DEFAULT NULL, 
	`InscricaoMunicipal` varchar(20)   DEFAULT NULL, 
	`TipoTributacao` char(2)   DEFAULT NULL, 
	`NIRE` char(20)   DEFAULT NULL, 
	`InicioAtividades` datetime   DEFAULT NULL, 
	`ResponsavelFiscal` int   DEFAULT NULL, 
	`ResponsavelPessoal` int   DEFAULT NULL, 
	`ResponsavelContabil` int   DEFAULT NULL, 
	`NOMEFANTASIA` varchar(100)   DEFAULT NULL, 
	`PastaExecEmpresa` varchar(50)   DEFAULT NULL, 
	`PastaScriptsFTP` varchar(50)   DEFAULT NULL, 
	`Fiscal` int(1)   DEFAULT NULL, 
	`Generico` int(1)   DEFAULT NULL, 
	`CupomFiscal` int(1)   DEFAULT NULL, 
	`ServidorDedicado` int(1)   DEFAULT NULL, 
	`ResponsavelAcessos` varchar(50)   DEFAULT NULL, 
	`ResponsavelTreinamento` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_CONEXAO`;
CREATE TABLE CLIEFORNEC_CONEXAO (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Tipo` varchar(100)   DEFAULT NULL, 
	`IP` varchar(100)   DEFAULT NULL, 
	`Senha` varchar(100)   DEFAULT NULL, 
	`Computador` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_DEPTO_FISCAL`;
CREATE TABLE CLIEFORNEC_DEPTO_FISCAL (
	`Cliente` int NOT NULL  , 
	`Evento` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Prazo` int   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_DEPTO_CONTABIL`;
CREATE TABLE CLIEFORNEC_DEPTO_CONTABIL (
	`Cliente` int NOT NULL  , 
	`Evento` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Prazo` int   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_DEPTO_PESSOAL`;
CREATE TABLE CLIEFORNEC_DEPTO_PESSOAL (
	`Cliente` int NOT NULL  , 
	`Evento` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Prazo` int   DEFAULT NULL, 
	`Observacao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_SENHAS`;
CREATE TABLE CLIEFORNEC_SENHAS (
	`CLIENTE` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Descricao` varchar(500)   DEFAULT NULL, 
	`Senha` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_Sistema`;
CREATE TABLE CLIEFORNEC_Sistema (
	`Cliente` int NOT NULL  , 
	`codSistema` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_SOCIOS`;
CREATE TABLE CLIEFORNEC_SOCIOS (
	`CODIGO` int NOT NULL  , 
	`Cliente` int NOT NULL  , 
	`Nome` varchar(500)   DEFAULT NULL, 
	`CPF_CGC` varchar(18)   DEFAULT NULL, 
	`RG` varchar(20)   DEFAULT NULL, 
	`PercSemCapital` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `CLIEFORNEC_TELEFONE`;
CREATE TABLE CLIEFORNEC_TELEFONE (
	`Cliente` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Telefone` char(10)   DEFAULT NULL, 
	`Ramal` char(15)   DEFAULT NULL, 
	`Tipo` char(8)   DEFAULT NULL, 
	`EMail` varchar(100)   DEFAULT NULL, 
	`Contato` varchar(50)   DEFAULT NULL, 
	`Responsavel` int(1) NOT NULL  
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
	`observacao` varchar(100)   DEFAULT NULL, 
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
	`rowguid` varchar(500) NOT NULL  , 
	`EmissaoFornec` datetime   DEFAULT NULL
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


DROP TABLE IF EXISTS `FORMULARIO`;
CREATE TABLE FORMULARIO (
	`ID_FORMULARIO` int NOT NULL  , 
	`DS_FORMULARIO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ITEM_MENU`;
CREATE TABLE ITEM_MENU (
	`ID_ITEM_MENU` int NOT NULL  , 
	`DS_ITEM_MENU` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
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
	`Oficial` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Cronograma`;
CREATE TABLE Lanc_Cronograma (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Responsavel` int   DEFAULT NULL, 
	`Observacao` varchar(1500)   DEFAULT NULL, 
	`FlagEncerrada` int(1)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DATAATUALIZACAO_alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`DataEncerrado` datetime   DEFAULT NULL, 
	`HoraEncerrado` char(8)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Evento` int   DEFAULT NULL, 
	`DataInicial` datetime   DEFAULT NULL, 
	`DataFinal` datetime   DEFAULT NULL, 
	`TipoDepto` char(2)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Execs`;
CREATE TABLE Lanc_Execs (
	`Modulo` int NOT NULL  , 
	`Cliente` int NOT NULL  , 
	`Atualizar` int(1)   DEFAULT NULL, 
	`Generico` int(1)   DEFAULT NULL, 
	`Fiscal` int(1)   DEFAULT NULL, 
	`Faturamento` int(1)   DEFAULT NULL, 
	`Aco` int(1)   DEFAULT NULL, 
	`Empresa` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OS_Acompanhamento`;
CREATE TABLE Lanc_OS_Acompanhamento (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Seq` int NOT NULL  , 
	`Data` datetime   DEFAULT NULL, 
	`Tipo` varchar(20)   DEFAULT NULL, 
	`Descricao` varchar(500)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_Atendimento`;
CREATE TABLE Lanc_Atendimento (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Hora` char(8)   DEFAULT NULL, 
	`Contato` varchar(100)   DEFAULT NULL, 
	`Cliente` int   DEFAULT NULL, 
	`Sistema` int   DEFAULT NULL, 
	`Atendente` int   DEFAULT NULL, 
	`Ocorrencia` varchar(2000)   DEFAULT NULL, 
	`Solucao` varchar(2000)   DEFAULT NULL, 
	`TipoOcorrencia` char(1)   DEFAULT NULL, 
	`TipoAtendimento` char(2)   DEFAULT NULL, 
	`FlagEncerrada` int(1)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`DATAATUALIZACAO_alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`DataEncerrado` datetime   DEFAULT NULL, 
	`HoraEncerrado` char(8)   DEFAULT NULL, 
	`GeradoOS` int(1)   DEFAULT NULL, 
	`Responsavel` int   DEFAULT NULL, 
	`EntreguePor` int   DEFAULT NULL, 
	`FlagUrgente` int(1)   DEFAULT NULL, 
	`FlagLembrete` int(1)   DEFAULT NULL, 
	`ConcluirAte` datetime   DEFAULT NULL, 
	`FlagEncerradoDiretoria` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OS_Atualizacao`;
CREATE TABLE Lanc_OS_Atualizacao (
	`ID_LANC_OS_ATUALIZACAO` int NOT NULL  , 
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Sistema` int NOT NULL  , 
	`Atualizacao` text(2147483647)   DEFAULT NULL, 
	`DescricaoGenerica` text(2147483647)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OS_Atualizacao_Gerado`;
CREATE TABLE Lanc_OS_Atualizacao_Gerado (
	`ID_LANC_OS_ATUALIZACAO_GERADO` int NOT NULL  , 
	`ID_LANC_OS_ATUALIZACAO` int NOT NULL  , 
	`Cliente` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OS_email`;
CREATE TABLE Lanc_OS_email (
	`Filial` int NOT NULL  , 
	`Documento` char(10) NOT NULL  , 
	`SeqEmail` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OS`;
CREATE TABLE Lanc_OS (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Cliente` int   DEFAULT NULL, 
	`DataEmissao` datetime   DEFAULT NULL, 
	`Entrega` datetime   DEFAULT NULL, 
	`DATAATUALIZACAO_alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`FlagCancelada` int(1)   DEFAULT NULL, 
	`Atendente` int   DEFAULT NULL, 
	`Tipo` char(1)   DEFAULT NULL, 
	`Solicitante` varchar(50)   DEFAULT NULL, 
	`Sistema` int   DEFAULT NULL, 
	`TempoEstimado` varchar(50)   DEFAULT NULL, 
	`PrazoDesenv` datetime   DEFAULT NULL, 
	`PrazoCliente` datetime   DEFAULT NULL, 
	`Ocorrencia` varchar(1500)   DEFAULT NULL, 
	`DescricaoServico` varchar(1500)   DEFAULT NULL, 
	`Vinculacao` varchar(1500)   DEFAULT NULL, 
	`Status` char(1)   DEFAULT NULL, 
	`Desenvolver` int(1)   DEFAULT NULL, 
	`Testar` int(1)   DEFAULT NULL, 
	`Atualizar` int(1)   DEFAULT NULL, 
	`Concluido` int(1)   DEFAULT NULL, 
	`Responsavel` int   DEFAULT NULL, 
	`DocumentoOrigem` char(6)   DEFAULT NULL, 
	`DocumentoAtendimento` char(6)   DEFAULT NULL, 
	`RetornoCliente` varchar(1000)   DEFAULT NULL, 
	`EntreguePor` int   DEFAULT NULL, 
	`Observacao` varchar(1500)   DEFAULT NULL, 
	`Evento` int   DEFAULT NULL, 
	`DocCronograma` char(6)   DEFAULT NULL, 
	`TipoDepto` char(2)   DEFAULT NULL, 
	`FlagEncerrada` int(1)   DEFAULT NULL, 
	`Tempo` char(8)   DEFAULT NULL, 
	`MotivoCancelamento` varchar(500)   DEFAULT NULL, 
	`StatusRetorno` char(1)   DEFAULT NULL, 
	`FlagUrgente` int(1)   DEFAULT NULL, 
	`EmAnalise` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MENU`;
CREATE TABLE MENU (
	`SEQ_MENU` int NOT NULL  , 
	`DESC_MENU` varchar(50) NOT NULL  , 
	`ITEM_PAI` tinyint NOT NULL  , 
	`ITEM_MENU` varchar(100) NOT NULL  , 
	`FERRAMENTA` varchar(100)   DEFAULT NULL, 
	`IDC_ADMINISTRACAO` int(1) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OS_Prorrogacao`;
CREATE TABLE Lanc_OS_Prorrogacao (
	`ID_LANC_OS_PRORROGACAO` int NOT NULL  , 
	`Filial` int   DEFAULT NULL, 
	`Documento` char(6)   DEFAULT NULL, 
	`PrazoDesenv` datetime   DEFAULT NULL, 
	`PrazoCliente` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OPCAO_MENU`;
CREATE TABLE OPCAO_MENU (
	`ID_OPCAO_MENU` int NOT NULL  , 
	`DS_OPCAO_MENU` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Lanc_OS_Sistemas`;
CREATE TABLE Lanc_OS_Sistemas (
	`Filial` int NOT NULL  , 
	`Documento` char(6) NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Sistema` int   DEFAULT NULL, 
	`Versao` varchar(15)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `MENU_PAI`;
CREATE TABLE MENU_PAI (
	`ITEM_PAI` tinyint NOT NULL  , 
	`DESC_MENU` varchar(30)   DEFAULT NULL
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
	`PEDIDOCLIENTE` char(15)   DEFAULT NULL, 
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
	`SubSerie` char(3)   DEFAULT NULL, 
	`NaoGerarComissao` int(1)   DEFAULT NULL, 
	`Canhoto` int(1)   DEFAULT NULL, 
	`ObservacaoCanhoto` varchar(500)   DEFAULT NULL, 
	`StatusEntrega` int   DEFAULT NULL, 
	`ObservacaoEntrega` varchar(500)   DEFAULT NULL, 
	`SequenciaEntrega` int   DEFAULT NULL, 
	`Atendente` int   DEFAULT NULL, 
	`TotalDevolucao` float   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL, 
	`DataProt` datetime   DEFAULT NULL, 
	`HoraProt` char(8)   DEFAULT NULL, 
	`NumProtCanc` varchar(15)   DEFAULT NULL, 
	`DataProtCanc` datetime   DEFAULT NULL, 
	`HoraProtCanc` char(8)   DEFAULT NULL, 
	`StatusCanc` int   DEFAULT NULL, 
	`NumLote` varchar(15)   DEFAULT NULL, 
	`NumXML` varchar(44)   DEFAULT NULL, 
	`NumRecebimento` varchar(15)   DEFAULT NULL, 
	`StatusXML` int   DEFAULT NULL, 
	`StatusNF` int   DEFAULT NULL, 
	`NFeCancelada` int(1)   DEFAULT NULL, 
	`NumProtocolo` varchar(15)   DEFAULT NULL, 
	`FlagImpressaoNFe` int(1)   DEFAULT NULL, 
	`BaseSubstituicao` float   DEFAULT NULL, 
	`MailNFe` varchar(255)   DEFAULT NULL, 
	`NFeValida` int(1)   DEFAULT NULL, 
	`StatusERR` varchar(2500)   DEFAULT NULL, 
	`SeqEntrega` int   DEFAULT NULL, 
	`ValorSubstituicao` float   DEFAULT NULL, 
	`TipoAmbiente` char(1)   DEFAULT NULL, 
	`MargemLucroProduto` float   DEFAULT NULL, 
	`AutorizadoMargem` varchar(100)   DEFAULT NULL, 
	`Contrato` varchar(10)   DEFAULT NULL, 
	`Tributacao` int(1)   DEFAULT NULL, 
	`QtdeItens` decimal   DEFAULT NULL, 
	`DadosAdicionaisNFe` text(2147483647)   DEFAULT NULL, 
	`OutrasDespesas` float   DEFAULT NULL, 
	`ValorAcrescimo` float   DEFAULT NULL, 
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
	`ValorAcrescimoIncentivo` float   DEFAULT NULL, 
	`DataLancamento` datetime   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  , 
	`Convenio` int   DEFAULT NULL, 
	`LimiteConvenio` float   DEFAULT NULL, 
	`Dependente` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Parametros`;
CREATE TABLE Parametros (
	`GeraContaContabil` int(1)   DEFAULT NULL, 
	`Mes_Mov` datetime   DEFAULT NULL, 
	`Agenda` int(1)   DEFAULT NULL, 
	`BloquearValoresNFPedido` int(1)   DEFAULT NULL, 
	`CaminhoExecGenerico` varchar(300)   DEFAULT NULL, 
	`CaminhoExecFiscal` varchar(300)   DEFAULT NULL, 
	`CaminhoExecFaturamento` varchar(300)   DEFAULT NULL, 
	`CaminhoExecAco` varchar(300)   DEFAULT NULL, 
	`CaminhoExecEmpresa` varchar(300)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `REGISTRO`;
CREATE TABLE REGISTRO (
	`DT_INSTALACAO` datetime NOT NULL  , 
	`NOME` varchar(30) NOT NULL  , 
	`EMPRESA` varchar(30) NOT NULL  , 
	`ENDERECO` varchar(50) NOT NULL  , 
	`BAIRRO` varchar(30) NOT NULL  , 
	`CIDADE` varchar(30) NOT NULL  , 
	`CEP` varchar(9) NOT NULL  , 
	`UF` varchar(2) NOT NULL  , 
	`TELEFONE` varchar(30)   DEFAULT NULL, 
	`FAX` varchar(30)   DEFAULT NULL, 
	`CGC` varchar(18) NOT NULL  , 
	`IE` varchar(16) NOT NULL  , 
	`DT_VALIDADE` datetime NOT NULL  , 
	`SERIE1` real NOT NULL  , 
	`SERIE2` real NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `RECURSOS_BD`;
CREATE TABLE RECURSOS_BD (
	`ID_RECURSOS_BD` int NOT NULL  , 
	`DS_RECURSOS_BD` varchar(50)   DEFAULT NULL, 
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
	`Gerado` datetime   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `OPCOES_NIVEIS`;
CREATE TABLE OPCOES_NIVEIS (
	`NIVEL` tinyint NOT NULL  , 
	`SEQ_MENU` int NOT NULL  
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


DROP TABLE IF EXISTS `Rel`;
CREATE TABLE Rel (
	`num_rel` numeric NOT NULL  , 
	`nSum1` float   DEFAULT NULL, 
	`nSum2` float   DEFAULT NULL, 
	`nSum3` float   DEFAULT NULL, 
	`nSumImposto` float   DEFAULT NULL
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
	`nSum1` float   DEFAULT NULL, 
	`nSum2` float   DEFAULT NULL, 
	`nSum3` float   DEFAULT NULL
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
	`CODIGO` int NOT NULL  
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
	`observacao1` varchar(50)   DEFAULT NULL, 
	`observacao2` varchar(50)   DEFAULT NULL, 
	`observacao3` varchar(50)   DEFAULT NULL, 
	`INSCRICAO` varchar(20)   DEFAULT NULL, 
	`CGC` varchar(20)   DEFAULT NULL, 
	`PAGINA_ENTRADA` int   DEFAULT NULL, 
	`empresa` int   DEFAULT NULL, 
	`dt_inicial` datetime   DEFAULT NULL, 
	`dt_final` datetime   DEFAULT NULL, 
	`codigo` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Ajuda`;
CREATE TABLE Tab_Ajuda (
	`Lancamento` int NOT NULL  , 
	`Sistema` int   DEFAULT NULL, 
	`OpcaoSistema` int   DEFAULT NULL, 
	`Funcionalidade` varchar(4000)   DEFAULT NULL, 
	`ModoUsar` text(2147483647)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` varchar(3)   DEFAULT NULL
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
	`CODIGO` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rel5`;
CREATE TABLE rel5 (
	`NUM_REL` int NOT NULL  , 
	`soma` char(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_TipoNF_Usuario`;
CREATE TABLE Tab_TipoNF_Usuario (
	`FILIAL` int NOT NULL  , 
	`Codigo` int NOT NULL  , 
	`Sequencia` int NOT NULL  , 
	`Usuario` char(3)   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_OpcaoSistema`;
CREATE TABLE Tab_OpcaoSistema (
	`Sistema` int NOT NULL  , 
	`Opcao` int NOT NULL  , 
	`Descricao` char(50)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` varchar(3)   DEFAULT NULL
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
	`ParcelasImpressao` int(1)   DEFAULT NULL, 
	`TipoNF` int   DEFAULT NULL, 
	`GRUPO_CONTA` int   DEFAULT NULL, 
	`SEQ_CTA_CUSTO` int   DEFAULT NULL, 
	`SUB_GRUPO` int   DEFAULT NULL, 
	`NatNaoContribuinte` int   DEFAULT NULL, 
	`NaoCalcularPISCOFINS` int(1)   DEFAULT NULL, 
	`rowguid` varchar(500) NOT NULL  , 
	`DescricaoNF` varchar(50)   DEFAULT NULL, 
	`Convenio` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tab_Modulos`;
CREATE TABLE Tab_Modulos (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tabela_Preco_Configuracao`;
CREATE TABLE Tabela_Preco_Configuracao (
	`GRUPO` int NOT NULL  , 
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
	`observacao` varchar(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`VlrServico` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabCidade`;
CREATE TABLE tabCidade (
	`Cidade` int NOT NULL  , 
	`Nome` varchar(50)   DEFAULT NULL, 
	`CodigoIBGE` varchar(7)   DEFAULT NULL, 
	`Estado` varchar(2)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` varchar(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` varchar(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabClientesRelacionados`;
CREATE TABLE TabClientesRelacionados (
	`CLIENTEPRINCIPAL` int NOT NULL  , 
	`CLIENTERELACIONADO` int NOT NULL  , 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(10)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabelaAtendentes`;
CREATE TABLE TabelaAtendentes (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL, 
	`ValorServico` float   DEFAULT NULL, 
	`Usuario` char(3)   DEFAULT NULL, 
	`ck_Inativo` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabelaTecnico`;
CREATE TABLE TabelaTecnico (
	`Codigo` int NOT NULL  , 
	`Pessoa` varchar(8)   DEFAULT NULL, 
	`CPF_CGC` varchar(18)   DEFAULT NULL, 
	`RG` varchar(20)   DEFAULT NULL, 
	`Nome` varchar(80)   DEFAULT NULL, 
	`EstadoCivil` varchar(80)   DEFAULT NULL, 
	`Funcao` varchar(80)   DEFAULT NULL, 
	`Endereco` varchar(80)   DEFAULT NULL, 
	`Bairro` varchar(80)   DEFAULT NULL, 
	`ObservacaoEndereco` varchar(80)   DEFAULT NULL, 
	`Cidade` varchar(30)   DEFAULT NULL, 
	`Estado` varchar(2)   DEFAULT NULL, 
	`Telefone` varchar(100)   DEFAULT NULL, 
	`Celular` varchar(100)   DEFAULT NULL, 
	`Contato` varchar(80)   DEFAULT NULL, 
	`Email` varchar(150)   DEFAULT NULL, 
	`CEP` varchar(9)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabelaTipoEquipamento`;
CREATE TABLE TabelaTipoEquipamento (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(200)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabelaAutorizadas`;
CREATE TABLE TabelaAutorizadas (
	`Codigo` int NOT NULL  , 
	`Nome` varchar(80)   DEFAULT NULL, 
	`CNPJ` varchar(18)   DEFAULT NULL, 
	`InscricaoEstadual` varchar(20)   DEFAULT NULL, 
	`Endereco` varchar(80)   DEFAULT NULL, 
	`Bairro` varchar(50)   DEFAULT NULL, 
	`Cidade` varchar(50)   DEFAULT NULL, 
	`Estado` varchar(2)   DEFAULT NULL, 
	`CEP` varchar(8)   DEFAULT NULL, 
	`Telefone` varchar(70)   DEFAULT NULL, 
	`Celular` varchar(70)   DEFAULT NULL, 
	`Email` varchar(100)   DEFAULT NULL, 
	`Contato` varchar(80)   DEFAULT NULL, 
	`ObservacaoEndereco` varchar(80)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabelaEventos`;
CREATE TABLE TabelaEventos (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabPais`;
CREATE TABLE TabPais (
	`Pais` int NOT NULL  , 
	`Nome` varchar(50)   DEFAULT NULL, 
	`CodigoIBGE` char(4)   DEFAULT NULL
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


DROP TABLE IF EXISTS `TabOrigemCliente`;
CREATE TABLE TabOrigemCliente (
	`CODIGO` int NOT NULL  , 
	`DESCRICAO` varchar(50)   DEFAULT NULL, 
	`DataAtualizacao` datetime   DEFAULT NULL, 
	`HoraAtualizacao` char(8)   DEFAULT NULL, 
	`UsuarioAtualizacao` char(3)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabSistemas`;
CREATE TABLE TabSistemas (
	`SistemaNome` char(50)   DEFAULT NULL
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


DROP TABLE IF EXISTS `tabSistemasCDI`;
CREATE TABLE tabSistemasCDI (
	`Codigo` int NOT NULL  , 
	`Descricao` varchar(50)   DEFAULT NULL, 
	`NomeExe` varchar(250)   DEFAULT NULL, 
	`Mostrar` int(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabSistemasCDI_Usuarios`;
CREATE TABLE tabSistemasCDI_Usuarios (
	`Sistemas` int NOT NULL  , 
	`Usuarios` char(3) NOT NULL  , 
	`Acessos` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabSistemaCliente`;
CREATE TABLE tabSistemaCliente (
	`CodSistema` int NOT NULL  , 
	`DescricaoSistema` char(50)   DEFAULT NULL, 
	`Generico` int(1)   DEFAULT NULL, 
	`DATAATUALIZACAO` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO` char(3)   DEFAULT NULL, 
	`DATAATUALIZACAO_Alteracao` datetime   DEFAULT NULL, 
	`HORAATUALIZACAO_Alteracao` char(8)   DEFAULT NULL, 
	`USUARIOATUALIZACAO_Alteracao` char(3)   DEFAULT NULL, 
	`DescricaoResumida` varchar(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tabStatus`;
CREATE TABLE tabStatus (
	`Status` int NOT NULL  , 
	`Descricao` varchar(100)   DEFAULT NULL, 
	`Tipo` varchar(1)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabProgramas`;
CREATE TABLE TabProgramas (
	`Programa` int NOT NULL  , 
	`Nome` char(50)   DEFAULT NULL, 
	`NomeVB` char(50)   DEFAULT NULL, 
	`NomeMenuVB` char(50)   DEFAULT NULL, 
	`NomeSistema` char(50)   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `VOLUMES`;
CREATE TABLE VOLUMES (
	`VOLUME` int NOT NULL  , 
	`DESCRICAO` varchar(40)   DEFAULT NULL, 
	`TransmissaoDialUp` char(1)   DEFAULT NULL
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
	`NovoAviso` char(5)   DEFAULT NULL, 
	`TempoAviso` int   DEFAULT NULL, 
	`TipoAviso` char(1)   DEFAULT NULL, 
	`CodLocal` int   DEFAULT NULL, 
	`AgendadoPor` varchar(30)   DEFAULT NULL, 
	`NaoParticipanteAvisoEmail` int(1)   DEFAULT NULL
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
	`consultapedidos` int(1)   DEFAULT NULL, 
	`ControlaOP` int(1)   DEFAULT NULL, 
	`Palm` int(1)   DEFAULT NULL, 
	`Vendedor` int   DEFAULT NULL, 
	`Master` int(1)   DEFAULT NULL, 
	`Inativo` int(1)   DEFAULT NULL, 
	`ControleAutorizacaoCompras` int(1)   DEFAULT NULL, 
	`ValorMaxOrdemCompra` float   DEFAULT NULL, 
	`AutorizacaoReabrePedido` int(1)   DEFAULT NULL, 
	`DescontoNF` float   DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `TabUsuarios_Filial`;
CREATE TABLE TabUsuarios_Filial (
	`Filial` int NOT NULL  , 
	`Usuario` char(3) NOT NULL  , 
	`Sequencia` int NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `VERSAO`;
CREATE TABLE VERSAO (
	`VERSAO` varchar(5) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


