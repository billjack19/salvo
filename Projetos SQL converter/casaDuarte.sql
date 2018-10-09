CREATE TABLE dbo_nf_receber_itens (
  filial                      int NOT NULL,
  serie                       char(3) NOT NULL,
  notafiscal                  char(6) NOT NULL,
  sequencia                   int NOT NULL,
  sub_grupo                   int,
  grupo                       int,
  item                        int,
  quantidade                  numeric(19,4),
  valor_unitario              double precision(53,2),
  valor_total                 numeric(19,4),
  baseicms                    numeric(19,4),
  aliquotaicms                numeric(19,4),
  valoricms                   numeric(19,4),
  baseipi                     numeric(19,4),
  aliquotaipi                 numeric(19,4),
  valoripi                    numeric(19,4),
  pesoliquido                 numeric(19,4),
  pesobruto                   numeric(19,4),
  valor_desconto              numeric(19,4),
  taxa_desc                   numeric(18),
  subst_tribut                char,
  clas_fiscal                 char,
  receita                     numeric(18),
  situacao_tributaria         char(3),
  isentas                     numeric(19,4),
  diferida                    numeric(19,4),
  substituicao                numeric(19,4),
  suspensa                    numeric(19,4),
  nao_tributadas              numeric(19,4),
  outras                      numeric(19,4),
  descontobasereduzida        numeric(19,4),
  parcelabasecalculoreduzida  numeric(19,4),
  vlrcalc                     numeric(19,4),
  unidade                     char(3),
  quantidadeinformada         double precision(53,2),
  valor_base                  double precision(53,2),
  armado                      boolean DEFAULT 0,
  descricaoarmado             longtext,
  sequenciaarmado             int,
  adicionalproduto            longtext,
  valordevolucao              double precision(53,2) DEFAULT 0,
  qtdedevolucao               double precision(53,2) DEFAULT 0,
  natoperacao                 char(5),
  servicoarmado               boolean DEFAULT 0,
  servicocortedobra           boolean DEFAULT 0,
  baseicmsst                  numeric(18,4),
  valorrateiofrete            double precision(53,2),
  valoricmsfrete              double precision(53,2),
  pis                         double precision(53,2),
  cofins                      double precision(53,2),
  flagcancelada               boolean DEFAULT 0,
  valor_acrescimo             double precision(53,2),
  usoconsumo                  boolean DEFAULT 0,
  valoricmsst                 double precision(53,2),
  cst_ipi                     char(2),
  cst_pis_cofins              char(2),
  valorrateioseguro           double precision(53,2),
  valorrateiooutras           double precision(53,2),
  indtot                      boolean DEFAULT 0,
  valorrateiodesconto         double precision(53,2),
  basestret                   double precision(53,2),
  valorstret                  double precision(53,2),
  descricaoproduto            nvarchar(70),
  codigoprodutonf             int,
  comissao                    double precision(53,2),
  valorrateioincentivo        double precision(53,2),
  tributacao                  int,
  baseii                      double precision(53,2),
  valorii                     double precision(53,2),
  valoriof                    double precision(53,2),
  despesasaduaneiras          double precision(53,2),
  linha                       char(6),
  codnatureza                 int,
  valorbonificacao            double precision(53,2),
  valoraproximpostos          double precision(53,2),
  valorrateiofretend          double precision(53,2),
  valorrateiodespesand        double precision(53,2),
  comissaoatendente           double precision(53,2),
  comissaodireto              double precision(53,2),
  itemcomodato                int,
  servicosoldado              boolean,
  soldado                     boolean,
  vbcufdest                   double precision(53,2),
  pfcpufdest                  double precision(53,2),
  picmsufdest                 double precision(53,2),
  picmsinter                  double precision(53,2),
  picmsinterpart              double precision(53,2),
  vfcpufdest                  double precision(53,2),
  vicmsufdest                 double precision(53,2),
  vicmsufremet                double precision(53,2),
  federal                     double precision(53,2),
  estadual                    double precision(53,2),
  municipal                   double precision(53,2),
  baseicmsfcp                 double precision(53,2),
  aliquotaicmsfcp             double precision(53,2),
  valoricmsfcp                double precision(53,2),
  tipomov                     varchar(1),
  tipopreco                   char,
  autorizacaopreco            varchar(3),
  PRIMARY KEY (filial, serie, notafiscal, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_nf_receber_itens_personalizados (
  filial          int NOT NULL,
  serie           char(3) NOT NULL,
  notafiscal      varchar(6) NOT NULL,
  sequencia       int NOT NULL,
  descricao       nvarchar(100),
  quantidade      numeric(18,4),
  valor_unitario  double precision(53,2),
  valor_total     numeric(18,4),
  tipo            char,
  totalpeso       double precision(53,2),
  PRIMARY KEY (filial, serie, notafiscal, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_nf_receber_itensnf (
  filial          int NOT NULL,
  serie           char(3) NOT NULL,
  notafiscal      char(6) NOT NULL,
  sequencia       int NOT NULL,
  descricao       longtext,
  quantidade      numeric(18,4),
  valor_unitario  double precision(53,2),
  valor_total     numeric(18,4),
  aliquotaicms    numeric(18,4),
  subst_tribut    char,
  clas_fiscal     char,
  unidade         char(3),
  PRIMARY KEY (filial, serie, notafiscal, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_nf_receber_pedido (
  filial      int NOT NULL,
  serie       char(3) NOT NULL,
  notafiscal  char(6) NOT NULL,
  pedido      char(6) NOT NULL,
  PRIMARY KEY (filial, serie, notafiscal, pedido)
) ENGINE = InnoDB;

CREATE TABLE dbo_nf_receber_pedidos (
  filial        int NOT NULL,
  serie         char(3) NOT NULL,
  notafiscal    char(6) NOT NULL,
  pedido        char(6) NOT NULL,
  filialpedido  int NOT NULL,
  PRIMARY KEY (filial, serie, notafiscal, pedido, filialpedido)
) ENGINE = InnoDB;

CREATE TABLE dbo_nf_receber_volumes (
  filial      int NOT NULL,
  serie       char(3) NOT NULL,
  notafiscal  char(6) NOT NULL,
  volume      int NOT NULL,
  item        int NOT NULL,
  quantidade  double precision(53,2),
  PRIMARY KEY (filial, serie, notafiscal, volume, item)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_finalidade (
  id_finalidade  int NOT NULL PRIMARY KEY,
  ds_finalidade  varchar(50)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_forma_pagamento (
  id_forma_pagamento  int NOT NULL PRIMARY KEY,
  ds_forma_pagamento  varchar(50)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_modalidade_frete (
  id_modalidade_frete  int NOT NULL PRIMARY KEY,
  ds_modalidade_frete  varchar(100)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_motivo_desoneracao_icms (
  id_motivo_desoneracao_icms  int NOT NULL PRIMARY KEY,
  ds_motivo_desoneracao_icms  varchar(150)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_ncm_cst_ipi_filial (
  id_ncm_cst_ipi_filial  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_ncm                 int,
  id_cst_ipi             int,
  id_filial              int,
  taxa_ipi               double precision(53,2),
  ck_inativo             boolean DEFAULT 0,
  id_enquadramento_ipi   int,
  id_cst_pis_cofins      char(2),
  percpis                double precision(53,2),
  perccofins             double precision(53,2),
  descpercpis            double precision(53,2),
  descperccofins         double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_ncm_mva (
  id_ncm_mva               int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_uf_origem             int,
  id_uf_destino            int,
  id_ncm                   int,
  mva                      double precision(53,2),
  aliquota                 double precision(53,2),
  ck_dif_aliquota          boolean,
  ck_inativo               boolean,
  descontosimplesnacional  double precision(53,2),
  fcp                      double precision(53,2) DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_ncm_mva_tributacao (
  id_ncm_mva_tributacao  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_ncm_mva             int,
  id_tributacao          int,
  id_tipo_cliente        int
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_operadora_cartao (
  id_operadora_cartao  int NOT NULL PRIMARY KEY,
  ds_operadora_cartao  varchar(50)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_parametros (
  id_parametros        int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  filial               int,
  id_modelo            int,
  id_tipo_impressao    int,
  id_tipo_emissao      int,
  id_tipo_ambiente     int,
  id_processo_emissao  int DEFAULT 0,
  caminhonfe           varchar(255),
  id_versao            int
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_parametros_serie (
  id_parametros_serie  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_parametros        int,
  id_tipo_emissao      int,
  serie                char(3),
  serie_entrada        char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_parametros_tipo_emissao (
  id_parametros_tipo_emissao  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_parametros               int,
  id_tipo_emissao             int,
  data_contingencia           datetime,
  hora_contingencia           char(8),
  just_contingencia           varchar(255)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_setup (
  id_setup  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  ds_setup  varchar(255),
  valor     double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_tipo_cliente (
  id_tipo_cliente  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  ds_tipo_cliente  varchar(50),
  ck_consumidor    boolean DEFAULT 0,
  ck_inativo       boolean DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_tipo_emissao (
  id_tipo_emissao  int NOT NULL PRIMARY KEY,
  ds_tipo_emissao  varchar(100),
  id_modelo        int
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_tipo_impressao (
  id_tipo_impressao  int NOT NULL PRIMARY KEY,
  ds_tipo_impressao  varchar(50),
  id_modelo          int
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_tipo_operacao (
  id_tipo_operacao  int NOT NULL PRIMARY KEY,
  ds_tipo_operacao  varchar(100)
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_tributacao_cst_icms (
  id_tributacao_cst_icms  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_tributacao           int,
  id_cst_icms             int,
  ck_simples              boolean,
  ck_entrada              boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_tributacao_observacao (
  id_tributacao_observacao  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_tributacao             int,
  id_observacao             int,
  ck_inativo                boolean DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_nfe_versao (
  id_versao   int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  ds_versao   varchar(10),
  ck_inativo  boolean DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_nro_requisicao (
  requisicao  int NOT NULL
) ENGINE = InnoDB;

CREATE TABLE dbo_observacao (
  observacao          numeric(18) NOT NULL PRIMARY KEY,
  descricao           nvarchar(100),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_opcoes_niveis (
  nivel     tinyint NOT NULL,
  seq_menu  int NOT NULL
) ENGINE = InnoDB;

CREATE TABLE dbo_ordem_servico (
  documento           varchar(6) NOT NULL,
  emissao             datetime,
  cliente             int,
  vlrtotal            numeric(18,4),
  fechamento          varchar(6),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_ordem_servico_itens (
  documento    char(6) NOT NULL,
  sequencia    int NOT NULL,
  servico      int,
  quantidade   numeric(18,4),
  vlrunitario  numeric(18,4),
  vlrtotal     numeric(18,4)
) ENGINE = InnoDB;

CREATE TABLE dbo_ordemcarregamento (
  codigo              int NOT NULL,
  emissao             datetime,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_ordemcompra (
  filial                   int NOT NULL,
  numero                   int NOT NULL,
  cotacao                  int,
  dataemissao              datetime,
  fornecedor               int,
  vendedor                 nvarchar(50),
  departamento             int,
  datafechamento           datetime,
  tipofechamento           char,
  descricaotipofechamento  nvarchar(50),
  prazoentrega             nvarchar(50),
  toleranciaentrega        nvarchar(50),
  condicaopagamento        nvarchar(50),
  tipofrete                char(3),
  valorfrete               double precision(53,2),
  transportador            int,
  comprador                int,
  observacao               nvarchar(250),
  valortotal               double precision(53,2),
  dataatualizacao          datetime,
  horaatualizacao          char(8),
  usuarioatualizacao       char(3),
  parcelas                 int,
  vencimento               datetime,
  dataentrega              datetime,
  desconto                 double precision(53,2),
  dataautorizado           datetime,
  autorizadocredito        nvarchar(50),
  tipocredito              char,
  observacaocredito        longtext,
  nomefornecedor           longtext,
  `status`                 int,
  compradireta             boolean DEFAULT 0,
  fatormoeda               double precision(53,2),
  taxaimportacao           double precision(53,2),
  outrastaxas              double precision(53,2),
  naofluxocaixa            boolean DEFAULT 0,
  adiantamento             double precision(53,2) DEFAULT 0,
  solicitacao              int,
  localentrega             longtext,
  PRIMARY KEY (filial, numero)
) ENGINE = InnoDB;

CREATE TABLE dbo_ordemcompra_ccusto (
  filial         int NOT NULL,
  numero         int NOT NULL,
  sequencia      int NOT NULL,
  seq_cta_custo  int,
  grupo_conta    int,
  sub_grupo      int,
  descricao      char(200),
  valor          double precision(53,2),
  PRIMARY KEY (filial, numero, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_ordemcompra_solicitacao (
  filial       int NOT NULL,
  numero       int NOT NULL,
  solicitacao  int NOT NULL,
  PRIMARY KEY (filial, numero, solicitacao)
) ENGINE = InnoDB;

CREATE TABLE dbo_ordemcompra_solicitacao_itens (
  filial       int NOT NULL,
  numero       int NOT NULL,
  solicitacao  int NOT NULL,
  seq          int AUTO_INCREMENT NOT NULL,
  seqitem      int,
  item         int,
  descricao    nvarchar(200),
  quantidade   double precision(53,2),
  PRIMARY KEY (filial, numero, solicitacao, seq)
) ENGINE = InnoDB;

CREATE TABLE dbo_ordemcompraitens (
  filial                       int NOT NULL DEFAULT 0,
  ordemcompra                  int NOT NULL,
  sequencia                    int NOT NULL,
  item                         int,
  marca                        nvarchar(50),
  `data`                       datetime,
  quantidade                   double precision(53,2),
  valorunitario                double precision(53,2),
  desconto                     double precision(53,2),
  valordesconto                double precision(53,2),
  ipi                          double precision(53,2),
  valoripi                     double precision(53,2),
  valortotal                   double precision(53,2),
  notafiscal                   char(6),
  qtdrecebida                  double precision(53,2) DEFAULT 0,
  encerrada                    boolean DEFAULT 0,
  datarecebimento              datetime,
  dataencerramento             datetime,
  substtributaria              double precision(53,2),
  valorsubsttributaria         double precision(53,2),
  motivo                       nvarchar(250),
  aprovado                     boolean,
  preferencial                 boolean DEFAULT 0,
  descricao                    longtext,
  aliqicms                     double precision(53,2),
  valoricms                    double precision(53,2),
  unidade                      char(3),
  motivoreabertura             nvarchar(250),
  referencia                   nvarchar(70),
  qtdrecebidamanual            double precision(53,2) DEFAULT 0,
  valortotalgeral              double precision(53,2),
  complementoproduto           nvarchar(255),
  diaspagamento                double precision(53,2),
  quantidadeprincipal          double precision(53,2),
  quantidadeprincipalrecebida  double precision(53,2),
  PRIMARY KEY (filial, ordemcompra, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_origem (
  id_origem  int NOT NULL PRIMARY KEY,
  ds_origem  varchar(150)
) ENGINE = InnoDB;

CREATE TABLE dbo_pagarprevisao (
  filial              int NOT NULL,
  documento           char(6) NOT NULL,
  fornec              int,
  emissao             datetime,
  valortotal          numeric(18,4),
  vencimento          datetime,
  parcelas            int,
  observacao          nvarchar(100),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  flagcancelada       boolean DEFAULT 0,
  especie             int,
  PRIMARY KEY (filial, documento)
) ENGINE = InnoDB;

CREATE TABLE dbo_pagarprevisaoitens (
  filial      int NOT NULL,
  documento   nvarchar(6) NOT NULL,
  item        int NOT NULL,
  vencimento  datetime,
  valor       numeric(18,4),
  encerrado   boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_pagarprevisaoprodutos (
  filial               int NOT NULL,
  documento            char(6) NOT NULL,
  sequencia            int NOT NULL,
  sub_grupo            int,
  grupo                int,
  item                 int,
  quantidade           numeric(18,4),
  valor_unitario       double precision(53,2),
  valor_total          numeric(18,4),
  unidade              char(3),
  quantidadeprincipal  double precision(53,2),
  encerrado            boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_parametro_numero_letra (
  numero  int,
  letra   varchar(1)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametros (
  tipo_mov_entrada                  int,
  tipo_mov_saida                    int,
  tipo_mov_requisicao               int,
  natureza                          numeric(18),
  naturezafora                      numeric(18),
  filial_matriz                     int,
  especie_titulo                    int,
  historico_cheque                  int,
  observacao_boleto1                char(50),
  observacao_boleto2                char(50),
  observacao_boleto3                char(50),
  juros                             numeric(18,4),
  descricaonpr                      longtext,
  historicoavista                   int,
  especieir                         int,
  fornecir                          int,
  sequenciair                       int,
  grupoir                           int,
  subgrupoir                        int,
  especienf                         int,
  bancolancamentos                  int,
  transportadora                    int,
  historicobaixa                    int,
  historicobaixapagar               int,
  nattransdentro                    numeric(18),
  nattransfora                      numeric(18),
  nattransentrada                   numeric(18),
  natdeventradadentro               numeric(18),
  natdeventradafora                 numeric(18),
  especiedevolucao                  int,
  natdevsaidadentro                 numeric(18),
  natdevsaidafora                   numeric(18),
  grupo_contadev                    int,
  sub_grupo_contadev                int,
  seq_cta_custodev                  smallint,
  contacontabildev                  char(5),
  departamentodev                   int,
  situacaodev                       int,
  sequenciadev                      int,
  contacontabilcredito              char(5),
  departamentocredito               int,
  situacaocredito                   int,
  sequenciacredito                  int,
  sequenciacustocredito             int,
  grupocredito                      int,
  subgrupocredito                   int,
  especiecredito                    int,
  natentradadentro                  numeric(18),
  natentradafora                    numeric(18),
  especieentrada                    int,
  grupo_contaentrada                int,
  sub_grupo_contaentrada            int,
  seq_cta_custoentrada              smallint,
  sequenciacustocreditopagar        int,
  grupocreditopagar                 int,
  subgrupocreditopagar              int,
  mes_mov                           datetime,
  natconsumodentro                  numeric(18),
  natconsumofora                    numeric(18),
  recibobaixa                       numeric(18),
  natvendafuturadentro              numeric(18),
  natvendafuturafora                numeric(18),
  natentregavendafuturadentro       numeric(18),
  natentregavendafuturafora         numeric(18),
  condicaoentregavendafutura        numeric(18),
  safracafe                         nchar(10),
  condpagamentoreceber              varchar(50),
  cf_taxa_valor_bruto               int,
  cf_taxa_acrescimo                 int,
  cf_taxa_quebra                    int,
  grupo_contaadiantamento           int,
  sub_grupo_contaadiantamento       int,
  seq_cta_custoadiantamento         smallint,
  contacontabiladiantamento         char(5),
  especieadiantamento               int,
  condpagamentoadiantamento         int,
  cf_taxa_juros                     int,
  cf_taxa_comercializacao           int,
  cf_taxa_armazenagem               int,
  integralizacao                    numeric(18),
  safra                             nchar(10),
  cf_taxa_sacaria                   int,
  cartamodelo                       longtext,
  calc_estoque                      boolean NOT NULL,
  taxacomercializacao               numeric(18,4),
  clieirrf                          int,
  geracontacontabil                 boolean,
  cond_orca                         int,
  diabloqueado                      int,
  containicialfornec                nvarchar(15),
  containicialcliente               nvarchar(15),
  geracontaautomatico               boolean,
  nat_vendaordemde                  int,
  nat_vendaordemfe                  int,
  nat_remessaordemde                int,
  nat_remessaordemfe                int,
  nat_remessaconsertode             int,
  nat_remessaconsertofe             int,
  tipo_mov_contagem_entrada         int,
  tipo_mov_contagem_saida           int,
  calcula_negativo                  boolean,
  unidadecolunas                    nvarchar(3),
  vlrmaoobra                        numeric(18,4),
  tipo_mov_transferencia_entrada    int,
  tipo_mov_transferencia_saida      int,
  preco_medio_icms                  boolean,
  arame                             int,
  perc_arame                        double precision(53,2),
  altera_valores                    boolean,
  ferroestribo                      int,
  valorbloqueiopedido               double precision(53,2),
  diasbloqueiopedido                int,
  grupojurospagar                   int,
  subgrupojurospagar                int,
  sequenciajurospagar               int,
  grupodescontospagar               int,
  subgrupodescontospagar            int,
  sequenciadescontospagar           int,
  categoriaclientedeposito          int,
  valorvendadeposito                double precision(53,2),
  grupofrete                        int,
  subgrupofrete                     int,
  sequenciafrete                    int,
  especiefrete                      int,
  diasbloqueioorcamento             int,
  tipomovimentofechamento           int,
  codbarras                         char(9),
  especieespecial                   int,
  grupo_contaespecial               int,
  sub_grupo_contaespecial           int,
  seq_cta_custoespecial             int,
  cliente_pedidoconsumidor          int,
  condicao_pedidoconsumidor         int,
  grupoimpostosubstituicao          int,
  subgrupoimpostosubstituicao       int,
  sequenciaimpostosubstituicao      int,
  especieimpostosubstituicao        int,
  fornecedorimpostosubstituicao     int,
  senhaoficial                      nvarchar(50),
  historicoestornobaixa             int,
  historicoestornobaixactapagar     int,
  vlrmaoobraminimo                  double precision(53,2) DEFAULT 0,
  nfepagina1                        int,
  nfepagina2                        int,
  tabprecogenerica                  boolean DEFAULT 0,
  especieirrf                       int,
  grupoirrf                         int,
  subgrupoirrf                      int,
  sequenciairrf                     int,
  bloqueiocredito                   boolean DEFAULT 0,
  senhauf                           boolean DEFAULT 0,
  senhaestoque                      boolean DEFAULT 0,
  tipoimpressao                     boolean DEFAULT 0,
  adicional1                        nvarchar(50),
  perc1                             double precision(53,2) DEFAULT 0,
  adicional2                        nvarchar(50),
  perc2                             double precision(53,2) DEFAULT 0,
  adicional3                        nvarchar(50),
  perc3                             double precision(53,2) DEFAULT 0,
  adicional4                        nvarchar(50),
  perc4                             double precision(53,2) DEFAULT 0,
  bloqclieautomatico                boolean DEFAULT 0,
  especiemercadoria                 nvarchar(20),
  marcamercadoria                   nvarchar(20),
  juroscarne                        numeric(18,4),
  bloqueardescontoacimade           double precision(53,2),
  usoconsumo                        boolean DEFAULT 0,
  tabelaprecoaco                    boolean,
  volumeobrigatorio                 boolean DEFAULT 0,
  agenda                            boolean,
  controlepercpedido                boolean DEFAULT 0,
  controlecustoultimacompra         boolean DEFAULT 0,
  verificaestoqueencerramento       boolean DEFAULT 0,
  bloquearvaloresnfpedido           boolean DEFAULT 0,
  ocultarvalorespedido              boolean DEFAULT 0,
  naoverificarsaldopedidos          boolean DEFAULT 0,
  ordemprodnfe                      char,
  controlaplacanfe                  boolean DEFAULT 0,
  tipobaixachq                      char,
  naoimprimircabecalhopedido        boolean DEFAULT 0,
  sub_grupo_deposito                int,
  grupo_conta_deposito              int,
  seq_cta_custo_deposito            int,
  historico_deposito                int,
  vencimentodataentrega             boolean DEFAULT 0,
  pedidonf_receber                  boolean DEFAULT 0,
  enviaemailnfecanc                 boolean DEFAULT 0,
  controlamotivosreceber            boolean DEFAULT 0,
  controlareplicacao                boolean DEFAULT 0,
  produtoleite                      int,
  naoimprimirreferencianfe          boolean DEFAULT 0,
  calcularconsultaprodutossobre     char,
  fornecedoralmoxarifado            int,
  tipomovimentoalmoxarifado         int,
  controleaprovacaocotacaocompra    boolean DEFAULT 0,
  bloqvencdif                       boolean,
  caminhoexecgenerico               longtext,
  caminhoexecfiscal                 longtext,
  caminhoexecfaturamento            longtext,
  caminhoexecaco                    longtext,
  caminhoexecempresa                longtext,
  controlanumeracao                 boolean DEFAULT 0,
  naopermiteinstanciassistema       boolean,
  codbccreditoservico               int,
  codcst                            int,
  gruposerviconfe                   int,
  msgcarne                          longtext,
  produtoservico                    int,
  diasprorrogacaodup                int,
  caminhoexec                       longtext,
  percjuros                         double precision(53,2),
  naomostrarjuros                   boolean DEFAULT 0,
  adicionalcusto                    double precision(53,2),
  controlatrocobaixa                boolean DEFAULT 0,
  transportadoraencerramento        int,
  vendedorencerramento              int,
  horarioatualizaexec               char(8),
  diasbloqueiopedidoaberto          int,
  horarioatualizaexecmanual         char(8),
  especiecreditocliente             int,
  historicocredito                  int,
  condpagamentocredito              int,
  condpagamentocreditodevolucao     int,
  controlafilialchequepre           boolean DEFAULT 0,
  historicodevolucaocredito         int,
  percbloqnfentrada                 double precision(53,2),
  bloquearvencimentosanteriores     boolean DEFAULT 0,
  especiedespesafixa                int,
  bancodespesafixa                  int,
  processadonaturezaitemestoque     boolean DEFAULT 0,
  naocalculadevolucaocarteira       boolean DEFAULT 0,
  controlacortamanhocarteira        boolean DEFAULT 0,
  verificainfomenu                  boolean NOT NULL DEFAULT 0,
  mostrarlocalizacaoprodutospedido  boolean NOT NULL DEFAULT 0,
  historicoadiantamento             int,
  historicodevolucaoadiantamento    int,
  especieadiantamentofornecedor     int,
  tabelasobre                       int,
  alteracaomesmov                   varchar(70),
  fusohorario                       char(6),
  especiepis                        int,
  grupopis                          int,
  subgrupopis                       int,
  sequenciapis                      int,
  cliepis                           int,
  especieiss                        int,
  grupoiss                          int,
  subgrupoiss                       int,
  sequenciaiss                      int,
  clieiss                           int,
  especieinss                       int,
  grupoinss                         int,
  subgrupoinss                      int,
  sequenciainss                     int,
  clieinss                          int,
  especiecsll                       int,
  grupocsll                         int,
  subgrupocsll                      int,
  sequenciacsll                     int,
  cliecsll                          int,
  especiecofins                     int,
  grupocofins                       int,
  subgrupocofins                    int,
  sequenciacofins                   int,
  cliecofins                        int,
  grupojurosbordero                 int,
  subgrupojurosbordero              int,
  sequenciajurosbordero             int,
  grupoiofbordero                   int,
  subgrupoiofbordero                int,
  sequenciaiofbordero               int,
  historiobordero                   int,
  historicoborderojuros             int,
  historicoborderoiof               int,
  grupobordero                      int,
  subgrupobordero                   int,
  sequenciabordero                  int,
  alteravaloritem                   boolean,
  percbloqnfpedido                  double precision(53,2),
  diasbloqueiopedidoespecial        int,
  maximodescontopedido              double precision(53,2),
  mensagemimpressaocotacao          longtext,
  departamentosolicitacao           int,
  senhaoficialinativa               nvarchar(50),
  valorlimitecompras                double precision(53,2),
  mes_movestoque                    datetime,
  alteracaomesmovestoque            nvarchar(100),
  historico_depositosaida           int,
  banco_depositosaida               int,
  contacorrente_depositosaida       varchar(15),
  emailordemautorizada              nvarchar(200),
  percbloqnfoc                      double precision(53,2),
  mostradetalhesimpressaoorcamento  boolean,
  timeout_cancelamento              int,
  timeout_retorno                   int,
  timeout_uninfe                    int,
  timeout_status                    int,
  emailordemcompraematraso          varchar(200),
  diassintegra                      int,
  diasserasa                        int,
  diasspc                           int,
  controleautorizacaoordemcompra    nchar(10),
  ck_exec_local                     boolean,
  grupotacbordero                   int,
  subgrupotacbordero                int,
  sequenciatacbordero               int,
  historicoborderotac               int
) ENGINE = InnoDB;

CREATE TABLE dbo_parametros_abastecimento (
  dataemissao       datetime NOT NULL PRIMARY KEY,
  valorcombustivel  double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametros_boleto (
  filial                 int NOT NULL,
  banco                  int NOT NULL,
  agencia                int NOT NULL,
  contacorrente          nvarchar(13) NOT NULL,
  numrange               char(5),
  numseqdoc              char(7),
  dias                   int,
  jurosdia               double precision(53,2),
  instrucao1             char(2),
  instrucao2             char(2),
  mensagem1              nvarchar(50),
  mensagem2              nvarchar(50),
  mensagem3              nvarchar(50),
  mensagem4              nvarchar(50),
  mensagem5              nvarchar(50),
  mensagem6              nvarchar(50),
  mensagem7              nvarchar(50),
  mensagem8              nvarchar(50),
  extensaoremessa        char(3),
  extensaoretorno        char(3),
  caminhoremessa         nvarchar(250),
  caminhoretorno         nvarchar(250),
  rowguid                char(38) NOT NULL,
  codconvenio            nvarchar(20),
  codcarteira            char,
  formacadastramento     char,
  tipodocumento          char,
  idemissao              char,
  iddistribuicao         char,
  idbanco                char(3),
  sequencia              int,
  condpagamento          int,
  usarenderecocobranca   boolean,
  percmulta              double precision(53,2),
  codcedente             varchar(7),
  diasprotesto           int,
  diastolerancia         int,
  jurosmes               double precision(53,2),
  prefixoremessa         char(2),
  valordesconto          double precision(53,2),
  numseqagrupado         int,
  numerocarteira         int,
  agencianova            varchar(10),
  emailcopiaparaboletos  longtext,
  emailboleto            varchar(255),
  smtpemailboleto        varchar(50),
  senhaemailboleto       varchar(50),
  portaemailboleto       varchar(6),
  PRIMARY KEY (filial, banco, agencia, contacorrente)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametros_comercializacao (
  doc_personalizado  char(6),
  vlr_personalizado  numeric(18,4)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametros_receber (
  pag_rel_dup  numeric(18)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametros_vendasbalcao (
  naturezadentrosaida              int,
  naturezaforasaida                int,
  transportadora                   int,
  tipomovsaida                     int,
  naturezadentrotransf             int,
  naturezaforatransf               int,
  naturezaentradatransf            int,
  tipomovtransferenciaentrada      int,
  tipomovtransferenciasaida        int,
  naturezadentrosaidasubstituicao  int,
  naturezaforasaidasubstituicao    int,
  naturezadentroremessavenda       int,
  naturezaforaremessavenda         int,
  naturezadentroretornovendedor    int,
  naturezaforaretornovendedor      int,
  tiponf                           int,
  pis                              double precision(53,2),
  cofins                           double precision(53,2),
  aliquotasimples                  double precision(53,2),
  condpagamentonf                  int,
  arredondarpeso                   boolean DEFAULT 0,
  permiteexclusaopedido            boolean DEFAULT 0,
  naturezadentrobonificacao        int,
  naturezaforabonificacao          int,
  tiponfsaida                      int,
  tiponfbonificacao                int,
  condpagamentodoacao              int,
  naturezadentrotroca              int,
  naturezaforatroca                int,
  tiponftroca                      int,
  natnfdivididadentro              int,
  natnfdivididafora                int,
  diasentrega                      int
) ENGINE = InnoDB;

CREATE TABLE dbo_parametroscaixa (
  filial   int NOT NULL PRIMARY KEY,
  cliente  int,
  tiponf   int
) ENGINE = InnoDB;

CREATE TABLE dbo_parametroscupomfiscal (
  filial                 int NOT NULL PRIMARY KEY,
  tiponf                 int NOT NULL,
  serie                  char(3) NOT NULL,
  codnatureza            numeric(18),
  cliente                int,
  condpagamento          int,
  banco                  int,
  nro_conta              char(15),
  vendedor               int,
  transportadora         int,
  caminhogera            longtext,
  caminhograva           longtext,
  caminhoimporta         longtext,
  sub_grupo              int,
  grupo_conta            int,
  seq_cta_custo          int,
  utilizacupom           boolean DEFAULT 0,
  naogerareceber         boolean DEFAULT 0,
  naoutilizatabelacupom  boolean NOT NULL DEFAULT 0,
  cancelarpedido         boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_parametroscupomfiscal_tributacao (
  filial          int NOT NULL,
  cod_tributacao  int NOT NULL,
  cfopdentro      int,
  cfopfora        int,
  PRIMARY KEY (filial, cod_tributacao)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametroscurvaabc (
  tipoabc     char NOT NULL PRIMARY KEY,
  quantidade  double precision(53,2),
  valor       double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametrosencerramento (
  filial             int NOT NULL PRIMARY KEY,
  cliente            int,
  tiponf             int,
  tiponffutura       int,
  tiponfdevolucao    int,
  tiponfvendafiscal  int,
  banco              int,
  nro_conta          varchar(15),
  banco_receber      int,
  nro_conta_receber  varchar(15)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametrosnfe (
  filial             int NOT NULL PRIMARY KEY,
  chavenfe           char(9),
  digverificadornfe  char,
  modelo             char(2),
  tipoimpressao      char,
  tipoemissao        char,
  tipoambiente       char,
  finalidadenfe      char,
  processoemissao    char,
  versaonfe          char(20),
  seqcancelamento    int,
  serie              char(3),
  scan               char(3),
  fs                 char(3),
  talao              char(3),
  pedido             char(3),
  tiponf             int,
  modelotalao        char(2),
  datacontingencia   datetime,
  horacontingencia   char(8),
  justcontingencia   nvarchar(255),
  convenio           char(3),
  entrada            char(3),
  id_versaolayout    int
) ENGINE = InnoDB;

CREATE TABLE dbo_parametrosproducao (
  clienteproducao            int,
  saidaproducao              int,
  entradaproducao            int,
  gastosindiretosfabricacao  double precision(53,2),
  despesasprediais           double precision(53,2),
  despesasadministrativas    double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_parametrosreplicapedido (
  filial          int NOT NULL PRIMARY KEY,
  tiponf          int,
  codnatureza     numeric(18),
  transportadora  int,
  sub_grupo       int,
  grupo_conta     int,
  seq_cta_custo   int,
  banco           int,
  nro_conta       char(10)
) ENGINE = InnoDB;

CREATE TABLE dbo_pendencia_consistencia (
  filial       int,
  item         int,
  dataemissao  datetime
) ENGINE = InnoDB;

CREATE TABLE dbo_pendencia_movimentacao (
  grupo       int,
  sub_grupo   int,
  item        numeric(18),
  filial      int,
  quantidade  numeric(18)
) ENGINE = InnoDB;

CREATE TABLE dbo_preco_du (
  col001  varchar(255),
  col002  varchar(255),
  col003  varchar(255)
) ENGINE = InnoDB;

CREATE TABLE dbo_prod (
  codigo           double precision(53,2),
  digito           nvarchar(255),
  descricao        nvarchar(255),
  agrupamento      double precision(53,2),
  fabricante       double precision(53,2),
  unidade_compra   nvarchar(255),
  qtde_embalagem   double precision(53,2),
  unidade_venda    double precision(53,2),
  unidade_lista    nvarchar(255),
  quebra_minimo    nvarchar(255),
  ipi_compra       double precision(53,2),
  etiqueta         double precision(53,2),
  icms_padrao      double precision(53,2),
  tributacao1      double precision(53,2),
  reduz_base_icms  nvarchar(255),
  class_ipi        nvarchar(255),
  tributacao       double precision(53,2),
  f18              double precision(53,2),
  f19              double precision(53,2),
  classif_fiscal   double precision(53,2),
  cor              double precision(53,2),
  codigo_fabri     double precision(53,2),
  tributacao_ecf   nvarchar(255),
  ativo            nvarchar(255),
  ult_alteracao    datetime,
  n2               nvarchar(255),
  f27              double precision(53,2),
  f28              double precision(53,2),
  f29              double precision(53,2),
  f30              double precision(53,2),
  f31              double precision(53,2),
  f32              double precision(53,2),
  f33              double precision(53,2),
  f34              double precision(53,2),
  f35              double precision(53,2),
  f36              double precision(53,2),
  f37              double precision(53,2),
  f38              double precision(53,2),
  f39              double precision(53,2),
  f40              double precision(53,2),
  f41              double precision(53,2),
  f42              double precision(53,2),
  f43              double precision(53,2),
  f44              double precision(53,2),
  f45              double precision(53,2),
  f46              double precision(53,2),
  f47              double precision(53,2),
  f48              double precision(53,2),
  f49              double precision(53,2),
  f50              double precision(53,2),
  f51              double precision(53,2),
  f52              nvarchar(255),
  s1               nvarchar(255),
  f54              double precision(53,2),
  n3               nvarchar(255),
  f56              double precision(53,2),
  f57              datetime,
  f58              nvarchar(255),
  f59              double precision(53,2),
  f60              nvarchar(255),
  f61              nvarchar(255),
  f62              nvarchar(255),
  f63              nvarchar(255),
  f64              nvarchar(255),
  f65              nvarchar(255),
  f66              double precision(53,2),
  f67              double precision(53,2),
  f68              double precision(53,2),
  n4               nvarchar(255),
  f70              double precision(53,2),
  n5               nvarchar(255)
) ENGINE = InnoDB;

CREATE TABLE dbo_producao_rateio (
  mes_ano                  char(6) NOT NULL,
  vlr_custo_producao       numeric(18,4),
  vlr_custo_administracao  numeric(18,4),
  qtdem3                   numeric(18,4),
  dia                      datetime,
  rateio_producao          numeric(18,4),
  rateio_administracao     numeric(18,4),
  rateio_m3                numeric(18,4)
) ENGINE = InnoDB;

CREATE TABLE dbo_produtores_leite (
  regiao          int NOT NULL,
  cliente         int NOT NULL,
  tanqueexpansao  boolean DEFAULT 0,
  inativo         boolean DEFAULT 0,
  PRIMARY KEY (regiao, cliente)
) ENGINE = InnoDB;

CREATE TABLE dbo_produtos_agrotoxicos (
  agrotoxico          int NOT NULL,
  item                int NOT NULL,
  qtd_padrao          double precision(53,2) DEFAULT 0,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  PRIMARY KEY (agrotoxico, item)
) ENGINE = InnoDB;

CREATE TABLE dbo_receitas (
  numero              numeric(18) NOT NULL,
  art                 numeric(18) NOT NULL,
  requerente          int,
  emissao             datetime,
  agronomo            int,
  cultura             int,
  tipoinfestacao      char,
  infestacao          int,
  agrotoxico          int,
  areatratada         numeric(18,4),
  unidadearea         nchar(3),
  qtd_adquirir        numeric(18,4),
  unidadeqtd          nvarchar(3),
  dosagem             double precision(53,2) DEFAULT 0,
  unidaded            nchar(3),
  area                double precision(53,2) DEFAULT 0,
  unidadea            nchar(3),
  aplicacoes          numeric(18),
  intervalo           numeric(18),
  carencia            numeric(18),
  complemento         varchar(100),
  epoca               varchar(50),
  modoaplicacao       varchar(100),
  manejo              char(100),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  usoavental          boolean NOT NULL DEFAULT 0,
  usobota             boolean NOT NULL DEFAULT 0,
  usochapeu           boolean NOT NULL DEFAULT 0,
  usomacacao          boolean NOT NULL DEFAULT 0,
  usomascara          boolean NOT NULL DEFAULT 0,
  usooculos           boolean NOT NULL DEFAULT 0,
  usoluva             boolean NOT NULL DEFAULT 0,
  observacao          varchar(100),
  notafiscal          char(6),
  filial              int,
  fazenda             numeric(18),
  PRIMARY KEY (numero, art)
) ENGINE = InnoDB;

CREATE TABLE dbo_registro (
  dt_instalacao  datetime NOT NULL,
  nome           nvarchar(30) NOT NULL,
  empresa        nvarchar(30) NOT NULL,
  endereco       nvarchar(50) NOT NULL,
  bairro         nvarchar(30) NOT NULL,
  cidade         nvarchar(30) NOT NULL,
  cep            nvarchar(9) NOT NULL,
  uf             nvarchar(2) NOT NULL,
  telefone       nvarchar(30),
  fax            nvarchar(30),
  cgc            nvarchar(18) NOT NULL,
  ie             nvarchar(16) NOT NULL,
  dt_validade    datetime NOT NULL,
  serie1         double precision NOT NULL,
  serie2         double precision NOT NULL
) ENGINE = InnoDB;

CREATE TABLE dbo_rel (
  num_rel      numeric(18) NOT NULL,
  nsum1        double precision(53,2),
  nsum2        double precision(53,2),
  nsum3        double precision(53,2),
  nsumimposto  double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel_etiquetaproducao (
  num_rel      int,
  filial       int,
  documento    nvarchar(6),
  pedido       nvarchar(6),
  cliente      int,
  emissao      datetime,
  item         int,
  quantidade   numeric(18,4),
  observacao   nvarchar(200),
  sequencia    char(7),
  gerado       datetime,
  dataentrega  datetime,
  dupla        int,
  forma        int
) ENGINE = InnoDB;

CREATE TABLE dbo_rel_etiquetas (
  codigo     int NOT NULL,
  descricao  nvarchar(70) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE dbo_rel_etiquetas_contrato (
  filial       int,
  documento    char(6),
  seq          int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  cliente      int,
  tipo         char(2),
  razaosocial  nvarchar(70),
  curso        nvarchar(200)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel_etiquetasprodutos (
  item           int,
  descricao      longtext,
  valor_venda    double precision(53,2),
  codigo_barras  nvarchar(14)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel_fluxocaixa (
  num_rel           int,
  dia               datetime,
  pagar_atraso      numeric(18,4),
  pagar_previsao    numeric(18,4),
  pagar_provisao    numeric(18,4),
  receber_atraso    numeric(18,4),
  receber_previsao  numeric(18,4),
  receber_provisao  numeric(18,4),
  docapagar         numeric(18,4),
  docareceber       numeric(18,4),
  docpago           numeric(18,4),
  docrecebido       numeric(18,4),
  lancbancario      numeric(18,4),
  saldobancario     numeric(18,4),
  geracao           datetime
) ENGINE = InnoDB;

CREATE TABLE dbo_rel_grafico (
  num_rel  int NOT NULL,
  linha    int NOT NULL,
  seq      int NOT NULL,
  valor    numeric(18,4),
  texto    nvarchar(50),
  cor      int,
  gerado   datetime,
  series   nvarchar(50),
  titulo   nvarchar(50)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel_nfe (
  linha  int
) ENGINE = InnoDB;

CREATE TABLE dbo_rel1 (
  num_rel          numeric(18) NOT NULL,
  empresa          int,
  entrada          datetime,
  especie          nvarchar(3),
  serie            nvarchar(3),
  numero           nvarchar(6),
  emissao          datetime,
  emitente         int,
  estado           nvarchar(2),
  vlr_contabil     double precision(53,2),
  codigo_contabil  nvarchar(6),
  codigo_fiscal    nvarchar(6),
  icms_cod         nvarchar(1),
  icms_base        double precision(53,2),
  icms_aliquota    double precision(53,2),
  icms_vlrs        double precision(53,2),
  ipi_cod          nvarchar(1),
  ipi_base         double precision(53,2),
  ipi_vlrs         double precision(53,2),
  obs              nvarchar(60),
  oleo             double precision(53,2),
  diferencial      double precision(53,2),
  codigo           int,
  cod_contabil     int,
  debito           double precision(53,2),
  credito          double precision(53,2),
  trans            nchar,
  fazenda          int,
  entrada1         datetime,
  nsum1            double precision(53,2),
  nsum2            double precision(53,2),
  nsum3            double precision(53,2),
  nsumimposto      double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel2 (
  num_rel                  numeric(18),
  empresa                  int,
  natureza                 nvarchar(6),
  valor                    double precision(53,2),
  base_icms                double precision(53,2),
  icms_creditado           double precision(53,2),
  isentas                  double precision(53,2),
  outras                   double precision(53,2),
  saldo_credor_icms        double precision(53,2),
  pagina_apuracao          double precision(53,2),
  inscricao                nvarchar(20),
  cgc                      nvarchar(20),
  pagina_entrada           int,
  tipo                     nvarchar(1),
  codigo                   int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  impostosemcredito        numeric(18,4),
  naotributadas            numeric(18,4),
  parcelabasecalculoreduz  numeric(18,4),
  diferida                 numeric(18,4),
  suspensa                 numeric(18,4),
  substituicaotributaria   numeric(18,4)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel3 (
  num_rel                numeric(18) NOT NULL,
  soma_001               double precision(53,2),
  outros_debitos1        nvarchar(50),
  aux_outros_debitos1    double precision(53,2),
  outros_debitos2        nvarchar(50),
  aux_outros_debitos2    double precision(53,2),
  estorno_credito1       nvarchar(50),
  aux_estorno_creditos1  double precision(53,2),
  estorno_credito2       nvarchar(50),
  aux_estorno_creditos2  double precision(53,2),
  soma_005               double precision(53,2),
  outros_creditos1       nvarchar(50),
  aux_outros_creditos1   double precision(53,2),
  outros_creditos2       nvarchar(50),
  aux_outros_creditos2   double precision(53,2),
  estorno_debitos1       nvarchar(50),
  aux_estorno_debitos1   double precision(53,2),
  estorno_debitos2       nvarchar(50),
  aux_estorno_debitos2   double precision(53,2),
  saldo_anterior         double precision(53,2),
  saldo_devedor          double precision(53,2),
  deduz1                 nvarchar(50),
  deducoes1              double precision(53,2),
  deduz2                 nvarchar(50),
  deducoes2              double precision(53,2),
  imposto_recolher       double precision(53,2),
  saldo_transportar      double precision(53,2),
  guia1                  nvarchar(8),
  data1                  datetime,
  orgao1                 nvarchar(30),
  valor1                 double precision(53,2),
  guia2                  nvarchar(50),
  data2                  datetime,
  orgao2                 nvarchar(30),
  valor2                 double precision(53,2),
  guia3                  nvarchar(8),
  data3                  datetime,
  valor3                 double precision(53,2),
  orgao3                 nvarchar(30),
  observacao1            nvarchar(100),
  observacao2            nvarchar(100),
  observacao3            nvarchar(100),
  inscricao              nvarchar(20),
  cgc                    nvarchar(20),
  pagina_entrada         int,
  empresa                int,
  dt_inicial             datetime,
  dt_final               datetime,
  codigo                 int AUTO_INCREMENT NOT NULL PRIMARY KEY
) ENGINE = InnoDB;

CREATE TABLE dbo_rel4 (
  num_rel                        numeric(18),
  tipo                           nvarchar(1),
  inicial                        int,
  total_valor                    double precision(53,2),
  total_base                     double precision(53,2),
  total_icms                     double precision(53,2),
  total_isentas                  double precision(53,2),
  total_outros                   double precision(53,2),
  codigo                         int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  total_impostosemcredito        numeric(18,4),
  total_naotributadas            numeric(18,4),
  total_parcelabasecalculoreduz  numeric(18,4),
  total_diferida                 numeric(18,4),
  total_suspensa                 numeric(18,4),
  total_substituicaotributaria   numeric(18,4)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel5 (
  num_rel  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  soma     char
) ENGINE = InnoDB;

CREATE TABLE dbo_rel6 (
  linha           int NOT NULL,
  num_rel         int NOT NULL,
  duplicata       char(8),
  seq_cta_custo   int,
  grupo_conta     int,
  fornec          int,
  nota_fiscal     char(15),
  sub_grupo       int,
  especie         int,
  emissao         datetime,
  valor           double precision(53,2),
  sequencia       char(10),
  vencimento      datetime,
  valor_duplic    double precision(53,2),
  banco           int,
  nro_conta       nchar(15),
  data_pagamento  datetime,
  juros           double precision(53,2),
  desconto        double precision(53,2),
  descricao       nvarchar(100),
  descricao1      nvarchar(100),
  descricao2      nvarchar(100),
  descricao3      nvarchar(100),
  descricao4      nvarchar(100),
  cod_cliente     int,
  seq1            char(3),
  seq2            int,
  cliente         int,
  origem          char(10),
  boleto          varchar(15),
  categoria       int,
  fazenda         int,
  produto         char(50),
  condpagamento   int,
  filial          int,
  filialcusto     int,
  recibo          numeric(18),
  gerado          datetime,
  mes             int,
  ano             int,
  historico       int,
  item            int,
  quantidade      numeric(18,4),
  qtdepos         numeric(18,4),
  qtdeprod        numeric(18,4),
  qtdevenda       numeric(18,4),
  pedido          nvarchar(6),
  quadro          int,
  chao            int,
  vendedor        int,
  contacontabil   nvarchar(6),
  programacao     datetime,
  duplicatabanco  boolean DEFAULT 0,
  creditobanco    datetime
) ENGINE = InnoDB;

CREATE TABLE dbo_rel7 (
  linha             int NOT NULL,
  num_rel           int NOT NULL,
  filial            int,
  grupo             int,
  item              numeric(18),
  qt_compra_dentro  numeric(18,3),
  vl_compra_dentro  numeric(18,3),
  qt_compra_fora    numeric(18,3),
  vl_compra_fora    numeric(18,3),
  qt_saida_dentro   numeric(18,3),
  vl_saida_dentro   numeric(18,3),
  qt_saida_fora     numeric(18,3),
  vl_saida_fora     numeric(18,3),
  estado            char(2)
) ENGINE = InnoDB;

CREATE TABLE dbo_rel8 (
  linha                        int NOT NULL,
  num_rel                      int NOT NULL,
  filial                       int,
  grupo                        int,
  item                         numeric(18),
  preco_medio                  double precision(53,2),
  qtde_anterior                numeric(18,3),
  qtde_venda_terceiro          numeric(18,3),
  vlr_venda_terceiro           numeric(18,3),
  vlr_desconto_terceiro        numeric(18,3),
  vlr_desconto_base_terceiro   numeric(18,3),
  qtde_venda_associado         numeric(18,3),
  vlr_venda_associado          numeric(18,3),
  vlr_desconto_associado       numeric(18,3),
  vlr_desconto_base_associado  numeric(18,3),
  notafiscal                   char(10),
  serie                        char(2),
  dataemissao                  datetime,
  condpagamento                varchar(50),
  gerado                       datetime
) ENGINE = InnoDB;

CREATE TABLE dbo_rel9 (
  linha            int NOT NULL,
  num_rel          int NOT NULL,
  filial           int,
  emissao          datetime,
  notafiscal       char(10),
  tipo_movimento   char(30),
  cliente          int,
  item             numeric(18),
  receita          char(10),
  agronomo         int,
  agrotoxico       int,
  quantidade       numeric(18,3),
  unidade_medida   char(10),
  condpagamento    int,
  est_inicio       double precision(53,2),
  est_entrada      double precision(53,2),
  est_saidadentro  double precision(53,2),
  est_saidafora    double precision(53,2),
  est_totvendas    double precision(53,2),
  est_transf       double precision(53,2),
  est_final        double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_relcurvaabc (
  num_rel       int NOT NULL,
  item          int NOT NULL,
  grupo         int,
  sub_grupo     int,
  quantidade    double precision(53,2),
  valortotal    double precision(53,2),
  precomedio    double precision(53,2),
  participacao  double precision(53,2),
  acumulado     double precision(53,2),
  abc           char,
  PRIMARY KEY (num_rel, item)
) ENGINE = InnoDB;

CREATE TABLE dbo_reldiasvida (
  num_rel   int NOT NULL,
  item      int NOT NULL,
  unidade   char(3),
  qtde1     double precision(53,2),
  qtde2     double precision(53,2),
  qtde3     double precision(53,2),
  total     double precision(53,2),
  diario    double precision(53,2),
  previsao  double precision(53,2),
  carteira  double precision(53,2),
  compra    double precision(53,2),
  diasvida  double precision(53,2),
  dias      double precision(53,2),
  emissao   datetime,
  PRIMARY KEY (num_rel, item)
) ENGINE = InnoDB;

CREATE TABLE dbo_requisicaopedidos (
  filial              int NOT NULL,
  lancamento          int NOT NULL,
  sequencia           int NOT NULL,
  dataemissao         datetime,
  observacao          nvarchar(255),
  pedido              nvarchar(6),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  PRIMARY KEY (filial, lancamento, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_situacao_tributaria (
  situacao_tributaria  char(3) NOT NULL,
  descricao            nvarchar(70),
  dataatualizacao      datetime,
  horaatualizacao      char(8),
  usuarioatualizacao   char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_solicitacaocompracontacusto (
  filial         int NOT NULL,
  numero         int NOT NULL,
  sequencia      int NOT NULL,
  grupo_conta    int,
  sub_grupo      int,
  seq_cta_custo  int,
  descricao      char(200),
  PRIMARY KEY (filial, numero, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_solicitacaocompradocumentos (
  filial           int NOT NULL,
  numero           int NOT NULL,
  sequencia        int NOT NULL,
  caminho_arquivo  longtext,
  PRIMARY KEY (filial, numero, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_solicitacaocomprasitens (
  filial                       int NOT NULL,
  solicitacao                  int NOT NULL,
  sequencia                    int NOT NULL,
  item                         int,
  descricao                    longtext,
  quantidade                   double precision(53,2),
  tipo                         boolean DEFAULT 0,
  dataatualizacao              datetime,
  horaatualizacao              char(8),
  usuarioatualizacao           char(3),
  unidade                      char(3),
  referencia                   nvarchar(70),
  saldo                        double precision(53,2),
  quantidadeprincipal          double precision(53,2),
  complementoproduto           nvarchar(255),
  valorsugerido                double precision(53,2),
  grupo_conta                  int,
  sub_grupo                    int,
  seq_cta_custo                int,
  id_solicitacao_compra_itens  int NOT NULL,
  PRIMARY KEY (filial, solicitacao, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_solicitacaoprodutos (
  filial                        int NOT NULL,
  numero                        int NOT NULL,
  `data`                        datetime,
  observacoes                   longtext,
  responsavel                   nvarchar(200),
  dataatualizacao               datetime,
  horaatualizacao               char(8),
  usuarioatualizacao            char(3),
  flagurgente                   boolean DEFAULT 0,
  dataprioridade                datetime,
  dataatualizacao_alteracao     datetime,
  horaatualizacao_alteracao     char(8),
  usuarioatualizacao_alteracao  char(3),
  flagcancelada                 boolean NOT NULL DEFAULT 0,
  observacaonova                longtext,
  id_solicitacao_produtos       int AUTO_INCREMENT NOT NULL,
  flagencerrado                 boolean DEFAULT 0,
  PRIMARY KEY (filial, numero, id_solicitacao_produtos)
) ENGINE = InnoDB;

CREATE TABLE dbo_solicitacaoprodutositens (
  filial                       int NOT NULL,
  solicitacao                  int NOT NULL,
  sequencia                    int NOT NULL,
  item                         int,
  descricao                    longtext,
  quantidade                   double precision(53,2),
  tipo                         boolean DEFAULT 0,
  dataatualizacao              datetime,
  horaatualizacao              char(8),
  usuarioatualizacao           char(3),
  unidade                      char(3),
  referencia                   nvarchar(70),
  saldo                        double precision(53,2),
  quantidadeprincipal          double precision(53,2),
  complementoproduto           nvarchar(255),
  valorsugerido                double precision(53,2),
  grupo_conta                  int,
  sub_grupo                    int,
  seq_cta_custo                int,
  id_solicitacao_compra_itens  int AUTO_INCREMENT NOT NULL,
  PRIMARY KEY (filial, solicitacao, sequencia, id_solicitacao_compra_itens)
) ENGINE = InnoDB;

CREATE TABLE dbo_sub_grupo_estoque (
  grupo               int NOT NULL,
  sub_grupo           int NOT NULL,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  aquecedor           boolean DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_sub_grupo_estoque_imobilizado (
  grupo               int NOT NULL,
  sub_grupo           int NOT NULL,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  PRIMARY KEY (grupo, sub_grupo)
) ENGINE = InnoDB;

CREATE TABLE dbo_sub_grupo_quantidade (
  sub_grupo      int NOT NULL PRIMARY KEY,
  qtdeembalagem  double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_substituicaotributaria (
  estado                  varchar(2) NOT NULL,
  cod_tributacao          int NOT NULL,
  substituicaotributaria  numeric(12,2),
  aliquotasubstituicao    numeric(12,2),
  icms                    boolean DEFAULT 0,
  PRIMARY KEY (estado, cod_tributacao)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_agrupamentocontas (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           longtext,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  tipo                char
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_agrupamentocontas_reldespesas (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           longtext,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_autorizacaodepartamento (
  usuario             char(3) NOT NULL,
  departamento        int NOT NULL,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  PRIMARY KEY (usuario, departamento)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_categorias (
  codigo              int NOT NULL,
  descricao           nvarchar(50),
  lucro               numeric(18,4),
  desconto            numeric(18,4),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_convenios (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           nvarchar(100),
  cliente             int,
  limitegeral         double precision(53,2),
  bloqueado           boolean DEFAULT 0,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  condpagamento       int,
  percdesc            double precision(53,2),
  observacao          longtext,
  aceitadependentes   boolean DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_correcao (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_emailusuario (
  usuario             char(3) NOT NULL PRIMARY KEY,
  email               nvarchar(200),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_embalagens (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           varchar(200),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_feriados (
  diames              char(4) NOT NULL,
  descricao           char(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  dia                 datetime,
  cidade              int
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_geracaofechamento (
  agrupamento         int NOT NULL PRIMARY KEY,
  descricao           nvarchar(100),
  grupocfop           int,
  grupocontacusto     int,
  tipomovimentacao    int,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_grupocfop (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_ibpt (
  id_ibpt   int NOT NULL PRIMARY KEY,
  codigo    char(8),
  ex        int,
  tabela    int,
  aliq_nac  double precision(53,2),
  aliq_int  double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_inscricaost (
  id_tab_inscricaost  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  filial              int,
  estado              char(2),
  inscricaost         varchar(14)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_justificativa (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           char(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  bloquearorcamento   boolean DEFAULT 0,
  naoexibir           boolean DEFAULT 0,
  vendaperdida        boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_leadtime (
  grupo      int NOT NULL,
  sub_grupo  int NOT NULL,
  leadtime   int,
  PRIMARY KEY (grupo, sub_grupo)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_marcas (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           varchar(200),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_modulos (
  codigo     int NOT NULL PRIMARY KEY,
  descricao  nvarchar(100)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_motivo (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           char(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  justificativa       int
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_regioes (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           char(50),
  valor               numeric(18,4),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  bloqueiofinanceiro  boolean DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_sabores (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           varchar(200),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_setores (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           char(100),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_setorprincipal (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           varchar(100),
  horahomem           double precision(53,2),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tipoalmoxarifado (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           char(100),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tipoconsumo (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           varchar(200),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tiponf (
  filial                int NOT NULL,
  codigo                int NOT NULL,
  descricao             nvarchar(50),
  controlepedidos       boolean DEFAULT 0,
  nfremessa             boolean DEFAULT 0,
  cfopprodutos          boolean DEFAULT 0,
  gerarcontasreceber    boolean DEFAULT 0,
  gerarcontaspagar      boolean DEFAULT 0,
  gerarestoque          boolean DEFAULT 0,
  dataatualizacao       datetime DEFAULT 0,
  horaatualizacao       char(8),
  usuarioatualizacao    char(3),
  nattransdentro        int,
  nattransfora          int,
  nattransentrada       int,
  tipo                  char,
  precomedioprodutos    boolean DEFAULT 0,
  naocalcularimpostos   boolean DEFAULT 0,
  natentradadentro      int,
  natentradafora        int,
  exterior              boolean DEFAULT 0,
  complementoicms       boolean DEFAULT 0,
  parcelasimpressao     boolean DEFAULT 0,
  tiponf                int,
  grupo_conta           int,
  seq_cta_custo         int,
  sub_grupo             int,
  natnaocontribuinte    int,
  naocalcularpiscofins  boolean DEFAULT 0,
  descricaonf           nvarchar(50),
  convenio              boolean DEFAULT 0,
  gerarelfaturamento    boolean DEFAULT 0,
  informarimpostos      boolean DEFAULT 0,
  creditocliente        boolean DEFAULT 0,
  natzfm                int,
  vendafutura           boolean DEFAULT 0,
  controlarecebercfop   boolean DEFAULT 0,
  dividirnf             boolean DEFAULT 0,
  id_finalidade         int,
  id_tipo_operacao      int,
  mastercancelamento    boolean,
  lembrete              longtext,
  PRIMARY KEY (filial, codigo)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tiponf_cabecalho (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           longtext,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tiponf_naturezas (
  filial       int NOT NULL,
  codtiponf    int NOT NULL,
  sequencia    int NOT NULL,
  codnatureza  int,
  PRIMARY KEY (filial, codtiponf, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tiponf_usuario (
  filial     int NOT NULL,
  codigo     int NOT NULL,
  sequencia  int NOT NULL,
  usuario    char(3),
  PRIMARY KEY (filial, codigo, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tiporecebimento (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           char(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  tipocartao          char
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tiposdocumento (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           nvarchar(100),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tab_tributacaoimpostos_cst (
  codigo          int NOT NULL,
  cst_pis_cofins  char(2) NOT NULL,
  PRIMARY KEY (codigo, cst_pis_cofins)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabagendatelefonica (
  seq                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nome                longtext,
  telefone            longtext,
  observacao          longtext,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  endereco            nvarchar(70),
  cep                 nvarchar(9),
  rg                  nvarchar(20),
  cpf_cnpj            nvarchar(30)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabagendatelefonica_telefones (
  seqagenda  int NOT NULL,
  sequencia  int NOT NULL,
  telefone   char(10),
  tipo       nvarchar(50),
  email      nvarchar(255),
  PRIMARY KEY (seqagenda, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabatividadecliente (
  codigo              int NOT NULL,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabcategoriacliente (
  codigo                 int NOT NULL PRIMARY KEY,
  descricao              nvarchar(50),
  dataatualizacao        datetime,
  horaatualizacao        char(8),
  usuarioatualizacao     char(3),
  vlrservico_cortedobra  double precision(53,2),
  vlrservico_armado      double precision(53,2),
  encargos               double precision(53,2),
  diasvalidadespc        int
) ENGINE = InnoDB;

CREATE TABLE dbo_tabcategoriaclientemargem (
  categoriacliente  int NOT NULL,
  sequencia         int NOT NULL,
  quantidade        double precision(53,2),
  margem            double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabcategoriagrupoprodutos (
  categoriacliente  int NOT NULL,
  grupo             int NOT NULL,
  margemminima      double precision(53,2) DEFAULT 0,
  margeminicial     double precision(53,2) DEFAULT 0,
  PRIMARY KEY (categoriacliente, grupo)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabcidade (
  cidade              int,
  nome                nvarchar(50),
  codigoibge          nvarchar(7),
  estado              nvarchar(2),
  dataatualizacao     datetime,
  horaatualizacao     nvarchar(8),
  usuarioatualizacao  nvarchar(3),
  nomeabreviado       nvarchar(50),
  codigo              int
) ENGINE = InnoDB;

CREATE TABLE dbo_tabclientesrelacionados (
  clienteprincipal    int NOT NULL,
  clienterelacionado  int NOT NULL,
  dataatualizacao     datetime,
  horaatualizacao     nchar(10),
  usuarioatualizacao  nchar(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabela_anp (
  codigo     varchar(9),
  descricao  varchar(50)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabela_preco_configuracao (
  grupo               int NOT NULL PRIMARY KEY,
  textocoluna001      nvarchar(50),
  textocoluna002      nvarchar(50),
  textocoluna003      nvarchar(50),
  textocoluna004      nvarchar(50),
  textocoluna005      nvarchar(50),
  perccoluna001       double precision(53,2),
  perccoluna002       double precision(53,2),
  perccoluna003       double precision(53,2),
  perccoluna004       double precision(53,2),
  perccoluna005       double precision(53,2),
  observacao          longtext,
  vlrservico          double precision(53,2),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabela_precos (
  item                int NOT NULL,
  validade            datetime NOT NULL,
  unidade             nchar(3),
  precobase           double precision(53,2),
  vlrcusto            double precision(53,2),
  desconto1           double precision(53,2),
  desconto2           double precision(53,2),
  desconto3           double precision(53,2),
  desconto4           double precision(53,2),
  taxaipi             double precision(53,2),
  vlrcustofinal       double precision(53,2),
  precominimo         double precision(53,2),
  precovenda          double precision(53,2),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  percvenda           double precision(53,2),
  custosemipi         double precision(53,2),
  custounidsemipi     double precision(53,2),
  mva                 double precision(53,2) DEFAULT 0,
  basemva             double precision(53,2),
  custounidsemmva     double precision(53,2),
  vlrservico          double precision(53,2),
  precovendabase      double precision(53,2),
  descontoavista      double precision(53,2),
  custobaseipi        double precision(53,2),
  custokgipi          double precision(53,2),
  observacao          longtext,
  descricaotabela     nvarchar(70),
  custobasecompra     double precision(53,2) DEFAULT 0,
  custokgcompra       double precision(53,2) DEFAULT 0,
  ajuste8020          double precision(53,2) DEFAULT 0,
  ajuste2             double precision(53,2) DEFAULT 0,
  tabelacomparativa   boolean,
  PRIMARY KEY (item, validade)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabelaprecocliente (
  id_tabelaprecocliente  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  cliente                int,
  `data`                 datetime,
  ck_inativo             boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_tabelaprecoclienteitem (
  id_tabelaprecoclienteitem  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  id_tabelaprecocliente      int,
  item                       int,
  unidade                    char(3),
  valor                      double precision(53,2),
  ck_inativo                 boolean NOT NULL DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_tabitens_fornecedores (
  empresa         int NOT NULL,
  fornecedor      char(14) NOT NULL,
  itemorigem      nvarchar(60) NOT NULL,
  unidadeorigem   char(6) NOT NULL,
  descricao       nvarchar(120),
  itementrada     int,
  unidadeentrada  char(3),
  PRIMARY KEY (empresa, fornecedor, itemorigem, unidadeorigem)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabitensfornecedor (
  empresa      int NOT NULL,
  fornecedor   char(14) NOT NULL,
  itemorigem   varchar(14) NOT NULL,
  descricao    nvarchar(50),
  itementrada  varchar(14),
  PRIMARY KEY (empresa, fornecedor, itemorigem)
) ENGINE = InnoDB;

CREATE TABLE dbo_tablocais (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           nvarchar(255),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabmarkup (
  numero             int NOT NULL PRIMARY KEY,
  descricao          nvarchar(50),
  despesasfixas      double precision(53,2),
  despesasvariaveis  double precision(53,2),
  comissao           double precision(53,2),
  margemlucro        double precision(53,2),
  indicemarkup       double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabniveis (
  usuario             char(3) NOT NULL,
  programa            int NOT NULL,
  acesso              char(3),
  movimentar          char(3),
  incluir             char(3),
  alterar             char(3),
  excluir             char(3),
  imprimir            char(3),
  pesquisar           char(3),
  usuarioatualizacao  longtext
) ENGINE = InnoDB;

CREATE TABLE dbo_tabocorrenciasretornohsbc (
  ocorrencia      int NOT NULL PRIMARY KEY,
  seqocorrencia   int NOT NULL,
  descocorrencia  varchar(100),
  efetuarbaixa    boolean NOT NULL DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_tabocorrenciassantander (
  id            int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  codigo        int,
  ocorrencia    varchar(100),
  efetuarbaixa  boolean NOT NULL DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_taborigemcliente (
  codigo              int NOT NULL,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabpais (
  pais        int NOT NULL PRIMARY KEY,
  nome        nvarchar(50),
  codigoibge  int
) ENGINE = InnoDB;

CREATE TABLE dbo_tabparametros (
  campocliente              int,
  camporepresentante        int,
  eliminarpedido            boolean,
  clientedisponivel         boolean,
  jurosmensal               double precision(53,2),
  jurosdiario               double precision(53,2),
  vincularpedido            boolean,
  baixarestoque             boolean,
  abaixocusto               boolean,
  qtdeclientes              int,
  diasfaturamento           int,
  centrocusto               int,
  tipomovimento             int,
  centrocustoentrada        int,
  tipomovimentoentrada      int,
  lancamentobancario        boolean,
  historicobaixa            int,
  grupocontabaixa           int,
  subgrupocontabaixa        int,
  seqcontacustobaixa        int,
  bancoduplicata            int,
  calculairrepresentante    boolean,
  aliquotairrepresentante   double precision(53,2),
  obrigaitens               boolean,
  obrigarepresentante       boolean,
  acrescimocusto            double precision(53,2),
  codigoreferencia          int,
  cpfcnpjduplicados         boolean,
  ultimacoluna              int,
  aliquotaautonomo          double precision(53,2),
  descontosuframa           boolean,
  lancarimpostos            boolean,
  observacao                int,
  descontounitario          boolean,
  adicionafrete             boolean,
  vendaavista               int,
  modelooutras              int NOT NULL,
  comissaoigual             boolean NOT NULL,
  produtosoutras            boolean,
  utilizaordemseparacao     boolean,
  decimaisquantidade        int,
  imprimerelatoriocotacoes  boolean,
  comissaotaxa              int,
  senhadesconto             boolean,
  utilizanronota            boolean,
  utilizanroduplicata       boolean,
  utilizanroficha           boolean,
  nronotafiscal             int,
  nroduplicata              int,
  nroficha                  int,
  orcamentoloja             boolean,
  dadosreferencia           boolean,
  validadata                boolean,
  imprimirduplicata         boolean,
  arredondardesdobramento   boolean,
  decimais                  int,
  gaveta                    boolean,
  mensagemcarne             longtext,
  mensagemduplicata         longtext,
  imagemempresa             varchar(30),
  imagempropaganda          longtext,
  tempopropaganda           int,
  mensagempedido            varchar(35),
  faturarlocalidades        boolean,
  exiberestricao            boolean,
  exibeatrasadas            boolean,
  ocultarlucroliquido       boolean,
  quantidadeinsuficiente    boolean,
  descontadabancario        boolean,
  mesmovalorgrupo           boolean,
  impressoranotafiscal      boolean,
  nomeimpressora            varchar(50),
  casosespeciais            longtext,
  tipovenda                 int,
  exibeinformacoes          boolean,
  clienteavista             int,
  acrescimovenda            double precision(53,2),
  senharestricao            boolean,
  liberarclienteinativo     boolean,
  contaduplicata            varchar(15),
  fechamentodia             boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_tabprogramas (
  programa     int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nome         nchar(50),
  nomevb       nchar(50),
  nomemenuvb   nchar(50),
  nomesistema  nchar(50)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabregiaovendedor (
  regiao              int NOT NULL,
  vendedor            int NOT NULL,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  PRIMARY KEY (regiao, vendedor)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabsistemas (
  sistemanome  nchar(50)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabsistemascdi (
  codigo         int NOT NULL PRIMARY KEY,
  descricao      nvarchar(50),
  nomeexe        nvarchar(250),
  mostrar        boolean DEFAULT 0,
  chaveregistro  varchar(100)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabsistemascdi_usuarios (
  sistemas         int NOT NULL,
  usuarios         char(3) NOT NULL,
  acessos          double precision(53,2),
  permiterepassar  boolean NOT NULL DEFAULT 0,
  tamanho          int,
  cor              varchar(15),
  PRIMARY KEY (sistemas, usuarios)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabstatus (
  `status`   int,
  descricao  nvarchar(100),
  tipo       nvarchar(1)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabtipoformconsulta (
  tp_form         char(3) NOT NULL PRIMARY KEY,
  nomeformulario  nvarchar(50),
  observacao      nvarchar(255)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabtiporeclamacao (
  codigo              int NOT NULL PRIMARY KEY,
  descricao           nvarchar(100),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabusuarios (
  identificacao                 char(3) NOT NULL PRIMARY KEY,
  nome                          nchar(30),
  senha                         char(10),
  administracao                 boolean,
  filial                        int,
  alterafilial                  boolean,
  alterafinanceiro              boolean,
  diretoria                     boolean,
  perc_descontos                numeric(18,4),
  perc_juros                    numeric(18,4),
  atendente                     int,
  palm                          boolean DEFAULT 0,
  vendedor                      int,
  controlaop                    boolean,
  `master`                      boolean DEFAULT 0,
  consultapedidos               boolean DEFAULT 0,
  inativo                       boolean DEFAULT 0,
  controleautorizacaocompras    boolean DEFAULT 0,
  valormaxsolicitacao           double precision(53,2),
  valormaxcotacao               double precision(53,2),
  descontonf                    double precision(53,2),
  autorizacaoreabrepedido       char(10),
  dataatualizacao               datetime,
  horaatualizacao               char(8),
  usuarioatualizacao            char(3),
  dataatualizacao_alteracao     datetime,
  horaatualizacao_alteracao     char(8),
  usuarioatualizacao_alteracao  char(3),
  autorizaatualizacoes          boolean DEFAULT 0,
  mostrarconsultacompras        boolean DEFAULT 0,
  naoalteradatapagto            boolean DEFAULT 0,
  distribuireclamacao           boolean NOT NULL DEFAULT 0,
  encerrareclamacao             boolean NOT NULL DEFAULT 0,
  incluifoto                    boolean NOT NULL DEFAULT 0,
  excluifoto                    boolean NOT NULL DEFAULT 0,
  valor_descontos               double precision(53,2),
  consultageracaocompras        boolean,
  controlalogistica             boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_tabusuarios_filial (
  filial     int NOT NULL,
  usuario    char(3) NOT NULL,
  sequencia  int NOT NULL,
  PRIMARY KEY (filial, usuario, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabveiculos (
  placa               nchar(10) NOT NULL,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  estado              char(2),
  motorista           nvarchar(50),
  transportadora      int,
  id_veiculo          int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  inativo             boolean,
  tipoveiculo         int,
  `status`            boolean,
  capacidadevol       int,
  entregas            int,
  pesobruto           double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_tabveiculos_documentos (
  id_documento  int AUTO_INCREMENT NOT NULL,
  id_veiculo    int NOT NULL,
  arquivo       longtext,
  PRIMARY KEY (id_documento, id_veiculo)
) ENGINE = InnoDB;

CREATE TABLE dbo_tarefasafazer (
  usuario                    char(3) NOT NULL,
  `data`                     datetime NOT NULL,
  hora                       char(5) NOT NULL,
  duracao                    char(5),
  titulo                     nvarchar(50),
  descricao                  longtext,
  prioridade                 int,
  codigo                     int,
  codlocal                   int,
  agendadopor                nvarchar(30),
  naoparticipanteavisoemail  boolean DEFAULT 0,
  PRIMARY KEY (usuario, `data`, hora)
) ENGINE = InnoDB;

CREATE TABLE dbo_temp_baixaschq (
  filial          int NOT NULL,
  serie           char(3) NOT NULL,
  duplicata       char(8) NOT NULL,
  cliente         int,
  sequencia       varchar(10) NOT NULL,
  banco           int,
  vencimento      datetime,
  valor_duplic    double precision(53,2),
  observacao      longtext,
  juros           double precision(53,2),
  desconto        double precision(53,2),
  bancobaixa      int,
  contabaixa      nvarchar(15),
  flagbaixa       boolean DEFAULT 0,
  data_pagamento  datetime,
  recibobaixa     nvarchar(50),
  nro_conta       nvarchar(50),
  filialbaixa     int,
  titulo          int,
  condpagamento   int,
  PRIMARY KEY (filial, serie, duplicata, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_temp_chequespre (
  lancamento          int NOT NULL PRIMARY KEY,
  agencia             char(4),
  cheque              nvarchar(10),
  descbanco           nvarchar(50),
  valor               double precision(53,2),
  emissao             datetime,
  vencimento          datetime,
  nome                nvarchar(50),
  nascimento          datetime,
  pessoa              char,
  cpfcnpj             nvarchar(18),
  rg                  nvarchar(20),
  inscricao           nvarchar(20),
  telefone            nvarchar(15),
  responsavel         nvarchar(50),
  destino             nvarchar(50),
  cliente             int,
  observacao          nvarchar(255),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_temp_chequespre_duplicata (
  lancamento    char(6) NOT NULL,
  sequencia     int NOT NULL,
  vencimento    datetime,
  valor         double precision(53,2),
  duplicata     char(8),
  filial        int,
  seqduplicata  varchar(10),
  serie         char(3),
  PRIMARY KEY (lancamento, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_tipo_bonificacao (
  id_tipo_bonificacao  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  ds_tipo_bonificacao  varchar(50),
  ck_tipo_bonificacao  char
) ENGINE = InnoDB;

CREATE TABLE dbo_tipo_cte (
  filial                 int NOT NULL,
  tipo_nf                int NOT NULL,
  descricao              varchar(50),
  descricaonf            varchar(50),
  codnaturezadentro      int,
  codnaturezafora        int,
  codnaturezadentrodist  int,
  codnaturezaforadist    int,
  id_finalidade          int,
  id_tipo_servico        int,
  id_modal               int,
  lembrete               longtext,
  dataatualizacao        datetime DEFAULT 0,
  horaatualizacao        char(8),
  usuarioatualizacao     char(3),
  PRIMARY KEY (filial, tipo_nf)
) ENGINE = InnoDB;

CREATE TABLE dbo_tipo_cte_usuario (
  filial     int NOT NULL,
  tipo_nf    int NOT NULL,
  sequencia  int NOT NULL,
  usuario    char(3),
  PRIMARY KEY (filial, tipo_nf, sequencia)
) ENGINE = InnoDB;

CREATE TABLE dbo_tipo_de_movimento (
  cod_movimento       int NOT NULL,
  descricao           nvarchar(50),
  tipo                char NOT NULL,
  preco_medio         boolean NOT NULL,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tipo_produto (
  tipo                int NOT NULL,
  descricao           nvarchar(50),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tiposervicos (
  codigo              int NOT NULL,
  descricao           char(50),
  valor               numeric(18,4),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tipotitulos (
  codigo              int NOT NULL,
  descricao           char(50),
  tipocontrato        char(20),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tmp_lanc_bonificacao (
  id_lanc_bonificacao  int NOT NULL,
  dt_lanc_bonificacao  datetime,
  id_tipo_bonificacao  int,
  vendedor             char(3),
  valor                double precision(53,2),
  ck_lanc_bonificacao  char,
  vendedor_origem      char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_tmp_lucropresumido (
  id_lucropresumido  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  empresa            int NOT NULL,
  emissao            datetime NOT NULL,
  cst_pis_cofins     char(2) NOT NULL,
  cfop               int NOT NULL,
  modelo             char(2) NOT NULL,
  valortotal         double precision(53,2),
  valorbasecalculo   double precision(53,2),
  valorpis           double precision(53,2),
  valorcofins        double precision(53,2),
  valordesconto      double precision(53,2),
  tipo               int,
  quantidade         double precision(53,2),
  serie              char(3),
  situacao           char(2)
) ENGINE = InnoDB;

CREATE TABLE dbo_tmp_tab_ncm (
  id_ncm      int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  ncm         char(8),
  ds_ncm      varchar(50),
  extipi      char(3),
  ck_deducao  boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_transportadora (
  transportadora      numeric(18) NOT NULL,
  descricao           nvarchar(50),
  endereco            nvarchar(50),
  bairro              char(40),
  cidade              char(40),
  cep                 char(9),
  estado              varchar(2),
  fone                nvarchar(30),
  fax                 nvarchar(30),
  contato             nvarchar(30),
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3),
  cpf_cgc             varchar(18),
  inscricaoestadual   varchar(16),
  placa               char(10),
  desconto            numeric(18,4),
  destacardadosnf     boolean DEFAULT 0,
  inativo             boolean DEFAULT 0,
  tipotransportadora  boolean DEFAULT 0,
  tipomotorista       boolean DEFAULT 0,
  antt                varchar(20)
) ENGINE = InnoDB;

CREATE TABLE dbo_tributacao (
  cod_tributacao              int NOT NULL,
  descricao                   nchar(50),
  icms                        boolean NOT NULL,
  ipi                         boolean NOT NULL,
  base_redu_icms              double precision(53,2),
  geradesconto                boolean NOT NULL,
  observacao                  numeric(18),
  situacao_tributaria         char(3),
  tipodentro                  char,
  dataatualizacao             datetime,
  horaatualizacao             char(8),
  usuarioatualizacao          char(3),
  icmsfora                    boolean NOT NULL,
  ipifora                     boolean NOT NULL,
  base_redu_icmsfora          double precision(53,2),
  geradescontofora            boolean NOT NULL,
  observacaofora              numeric(18),
  situacao_tributariafora     char(3),
  tipofora                    char,
  observacao2_dentro          numeric(18),
  observacao2_fora            numeric(18),
  aliquotaicms                numeric(12,2),
  aliquotasubstituicao        numeric(12,2),
  substituicaotributaria      numeric(12,2),
  reducao                     boolean DEFAULT 0,
  modalidade                  int DEFAULT 0,
  modalidadest                int DEFAULT 0,
  simplesnacional             char(3),
  simplesnacionalfora         char(3),
  simplesnacionalentrada      char(3),
  simplesnacionalforaentrada  char(3),
  ck_inativo                  boolean DEFAULT 0,
  id_tributacao_dentro        int,
  id_tributacao_fora          int
) ENGINE = InnoDB;

CREATE TABLE dbo_tributacao_tiponf (
  filial              int NOT NULL,
  cod_tributacao      int NOT NULL,
  tiponf              int NOT NULL,
  cfopdentro          int,
  cfopfora            int,
  cfopentradadentro   int,
  cfopentradafora     int,
  gerarcontasreceber  boolean DEFAULT 0,
  PRIMARY KEY (filial, cod_tributacao, tiponf)
) ENGINE = InnoDB;

CREATE TABLE dbo_unidade_medidas (
  unidade_medida      varchar(3) NOT NULL,
  descricao           varchar(50),
  limite_inferior     double precision(53,2),
  limite_superior     double precision(53,2),
  multiplicador       double precision(53,2),
  transmissaodialup   char,
  dataatualizacao     datetime,
  horaatualizacao     char(8),
  usuarioatualizacao  char(3)
) ENGINE = InnoDB;

CREATE TABLE dbo_vencimentos_oc (
  ordemcompra         numeric(18) NOT NULL,
  fornecedor          int NOT NULL,
  parcela             char(5) NOT NULL,
  vencimento          datetime,
  valor               numeric(18,4),
  naogerarfluxocaixa  boolean DEFAULT 0
) ENGINE = InnoDB;

CREATE TABLE dbo_vendedor (
  vendedor                  numeric(18) NOT NULL PRIMARY KEY,
  descricao                 nvarchar(50),
  endereco                  nvarchar(50),
  bairro                    char(50),
  cidade                    char(50),
  cep                       char(9),
  estado                    varchar(2),
  fone                      char(30),
  cpf                       char(18),
  taxa_comis                double precision(53,2),
  etiquetas                 char(5),
  dataatualizacao           datetime,
  horaatualizacao           char(8),
  usuarioatualizacao        char(3),
  taxa_desconto             numeric(18,4),
  regiao                    int,
  datacomissao              int,
  percextra                 numeric(18,4),
  percextraacresc           numeric(18,4),
  banco                     nvarchar(20),
  agencia                   nvarchar(10),
  contacorrente             nvarchar(10),
  contato                   nvarchar(50),
  email                     nvarchar(50),
  site                      nvarchar(50),
  fax                       nvarchar(30),
  tipovendedor              boolean DEFAULT 0,
  tipoatendente             boolean DEFAULT 0,
  observacao                longtext,
  dadosemail1               nvarchar(50),
  dadosemail2               nvarchar(50),
  dadosemail3               nvarchar(50),
  dadosemail4               nvarchar(50),
  inss                      double precision(53,2),
  irpf                      double precision(53,2),
  condpagamentocaixa        int,
  vendedorsupervisor        int,
  supervisor                boolean DEFAULT 0,
  codcidade                 int,
  complemento               nvarchar(30),
  numero                    nvarchar(30),
  inativo                   boolean NOT NULL DEFAULT 0,
  parceiro                  boolean DEFAULT 0,
  divulgador                boolean DEFAULT 0,
  calculaconsultagerencial  boolean NOT NULL DEFAULT 0,
  atacadovarejo             boolean
) ENGINE = InnoDB;

CREATE TABLE dbo_vendedor_comissao (
  vendedor    int NOT NULL,
  sequencia   int NOT NULL,
  quantidade  double precision(53,2),
  comissao    double precision(53,2)
) ENGINE = InnoDB;

CREATE TABLE dbo_versao (
  versao  nvarchar(5) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE dbo_volumes (
  volume             int NOT NULL,
  descricao          varchar(40),
  transmissaodialup  char
) ENGINE = InnoDB;

CREATE INDEX ix_nf_receber_itens_5
  ON dbo_nf_receber_itens
  (natoperacao);

CREATE INDEX ix_nf_receber_itens_4
  ON dbo_nf_receber_itens
  (item);

CREATE INDEX ix_nf_receber_itens_3
  ON dbo_nf_receber_itens
  (sequencia);

CREATE INDEX ix_nf_receber_itens_2
  ON dbo_nf_receber_itens
  (notafiscal);

CREATE INDEX ix_nf_receber_itens_1
  ON dbo_nf_receber_itens
  (serie);

CREATE INDEX ix_nf_receber_itens
  ON dbo_nf_receber_itens
  (filial);

