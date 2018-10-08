
-- Backup Geral
-- Gerando em: 01/08/2018 17:01:43
-- Pelo Gerador JK-19




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: area_nivel_acesso
DROP TABLE IF EXISTS `area_nivel_acesso`;

CREATE TABLE IF NOT EXISTS `area_nivel_acesso` (
	`id_area_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`area_area_nivel_acesso` varchar(200) NOT NULL ,
	`demostrativo_area_nivel_acesso` varchar(200) NOT NULL ,
	`bool_list_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`bool_insert_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`bool_update_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`nivel_acesso_id` int(11) NOT NULL ,
	`data_atualizacao_area_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_area_nivel_acesso` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 100, 'caixa', 'Caixa', 1, 1, 1, 1, '2018-06-14 10:41:22', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 101, 'cliente', 'Cliente', 1, 1, 1, 1, '2018-06-14 10:41:23', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 102, 'condicao_de_pagamento', 'Condição De Pagamento', 1, 1, 1, 1, '2018-06-14 10:41:23', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 103, 'empresa', 'Empresa', 1, 1, 1, 1, '2018-06-14 10:41:23', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 104, 'estado', 'Estado', 1, 1, 1, 1, '2018-06-14 10:41:23', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 105, 'filial', 'Filial', 1, 1, 1, 1, '2018-06-14 10:41:23', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 106, 'grupo', 'Grupo', 1, 1, 1, 1, '2018-06-14 10:41:24', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 107, 'item', 'Item', 1, 1, 1, 1, '2018-06-14 10:41:24', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 108, 'operacoes_caixa', 'Operações Caixa', 1, 1, 1, 1, '2018-06-14 10:41:24', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 109, 'unidade_medida', 'Unidade Medida', 1, 1, 1, 1, '2018-06-14 10:41:24', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 110, 'item-grupo', 'Item - Grupo', 1, 1, 1, 1, '2018-06-14 10:41:24', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 111, 'item_unidade_medida-item', 'Item Unidade Medida - Item', 1, 1, 1, 1, '2018-06-14 10:41:24', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 112, 'cliente_contato-cliente', 'Cliente Contato - Cliente', 1, 1, 1, 1, '2018-06-14 10:41:25', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 113, 'cliente_endereco-cliente', 'Cliente Endereço - Cliente', 1, 1, 1, 1, '2018-06-14 10:41:25', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 114, 'pedido_item-pedido', 'Pedido Item - Pedido', 1, 1, 1, 1, '2018-06-14 10:41:25', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 115, 'pedido_pagamento-pedido', 'Pedido Pagamento - Pedido', 1, 1, 1, 1, '2018-06-14 10:41:25', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 116, 'pedido_pagamento_extorno-pedido_pagamento', 'Pedido Pagamento Extorno - Pedido Pagamento', 1, 1, 1, 1, '2018-06-14 10:41:25', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 117, 'caixa_operacao-caixa_movimentacao', 'Caixa Operação - Caixa Movimentacao', 1, 1, 1, 1, '2018-06-14 10:41:25', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 118, 'filial-empresa', 'Filial - Empresa', 1, 1, 1, 1, '2018-06-14 10:41:26', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 119, 'upload', 'Upload', 1, 1, 1, 1, '2018-06-14 10:41:26', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 120, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-06-14 10:41:26', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 121, 'mov', 'Mov', 1, 1, 1, 1, '2018-06-14 10:41:26', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 122, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-06-14 10:41:26', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 123, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-06-14 10:41:26', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 124, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-06-14 10:41:26', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: caixa
DROP TABLE IF EXISTS `caixa`;

CREATE TABLE IF NOT EXISTS `caixa` (
	`id_caixa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_caixa` varchar(200) NOT NULL ,
	`filial_id` int(200) NOT NULL ,
	`data_atualizacao_caixa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_caixa` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO caixa ( `id_caixa`, `descricao_caixa`, `filial_id`, `data_atualizacao_caixa`, `usuario_id`, `bool_ativo_caixa`) VALUES ( 1, 'Caixa 01', 1, '2018-06-14 09:43:36', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: caixa_movimentacao
DROP TABLE IF EXISTS `caixa_movimentacao`;

CREATE TABLE IF NOT EXISTS `caixa_movimentacao` (
	`id_caixa_movimentacao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`valor_abertura_caixa_movimentacao` float  ,
	`valor_fechamento_caixa_movimentacao` float  ,
	`data_abertura_caixa_movimentacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`data_fechamento_caixa_movimentacao` datetime  ,
	`caixa_id` int(11) NOT NULL ,
	`data_atualizacao_caixa_movimentacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_caixa_movimentacao` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: caixa_operacao
DROP TABLE IF EXISTS `caixa_operacao`;

CREATE TABLE IF NOT EXISTS `caixa_operacao` (
	`id_caixa_operacao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`valor_caixa_operacao` float NOT NULL ,
	`caixa_movimentacao_id` int(11) NOT NULL ,
	`operacoes_caixa_id` int(200) NOT NULL ,
	`data_emissao_caixa_operacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`data_atualizacao_caixa_operacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_caixa_operacao` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cliente
DROP TABLE IF EXISTS `cliente`;

CREATE TABLE IF NOT EXISTS `cliente` (
	`id_cliente` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_cliente` varchar(200) NOT NULL ,
	`data_atualizacao_cliente` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cliente` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 1, 'Jack', '2018-06-14 09:43:48', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 2, 'Ana', '2018-06-14 09:43:57', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 3, 'João', '2018-06-14 09:44:04', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 4, 'Maria', '2018-06-14 09:44:15', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cliente_contato
DROP TABLE IF EXISTS `cliente_contato`;

CREATE TABLE IF NOT EXISTS `cliente_contato` (
	`id_cliente_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`telefone_cliente_contato` varchar(100) NOT NULL ,
	`celular_cliente_contato` varchar(100)  ,
	`email_cliente_contato` varchar(100)  ,
	`cliente_id` int(11)  ,
	`data_atualizacao_cliente_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cliente_contato` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente_contato ( `id_cliente_contato`, `telefone_cliente_contato`, `celular_cliente_contato`, `email_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES ( 5, '123', '', '', 1, '2018-06-14 09:56:44', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cliente_endereco
DROP TABLE IF EXISTS `cliente_endereco`;

CREATE TABLE IF NOT EXISTS `cliente_endereco` (
	`id_cliente_endereco` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`endereco_cliente_endereco` varchar(200) NOT NULL ,
	`numero_cliente_endereco` int(11) NOT NULL ,
	`complemento_cliente_endereco` varchar(100)  ,
	`bairro_cliente_endereco` varchar(200) NOT NULL ,
	`cidade_cliente_endereco` varchar(200) NOT NULL ,
	`estado_id` int(50) NOT NULL ,
	`cliente_id` int(11)  ,
	`data_atualizacao_cliente_endereco` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cliente_endereco` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente_endereco ( `id_cliente_endereco`, `endereco_cliente_endereco`, `numero_cliente_endereco`, `complemento_cliente_endereco`, `bairro_cliente_endereco`, `cidade_cliente_endereco`, `estado_id`, `cliente_id`, `data_atualizacao_cliente_endereco`, `usuario_id`, `bool_ativo_cliente_endereco`) VALUES ( 1, 'Teste', 12, '', 'Teste', 'Teste', 13, 1, '2018-06-14 10:10:11', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: condicao_de_pagamento
DROP TABLE IF EXISTS `condicao_de_pagamento`;

CREATE TABLE IF NOT EXISTS `condicao_de_pagamento` (
	`id_condicao_de_pagamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_condicao_de_pagamento` varchar(200) NOT NULL ,
	`data_atualizacao_condicao_de_pagamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_condicao_de_pagamento` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 1, 'Dinheiro', '2018-06-14 09:57:20', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 2, 'Cartão Crédito', '2018-06-14 09:57:34', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 3, 'Cartão Débito', '2018-06-14 09:57:42', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 4, 'Cheque', '2018-06-14 09:57:48', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 5, 'Boleto', '2018-06-14 09:57:58', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: empresa
DROP TABLE IF EXISTS `empresa`;

CREATE TABLE IF NOT EXISTS `empresa` (
	`id_empresa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`razao_social_empresa` varchar(200) NOT NULL ,
	`data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_empresa` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: estado
DROP TABLE IF EXISTS `estado`;

CREATE TABLE IF NOT EXISTS `estado` (
	`id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_estado` varchar(50) NOT NULL ,
	`sigla_estado` varchar(2) NOT NULL ,
	`data_atualizacao_estado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_estado` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 1, 'Acre', 'AC', '2018-06-14 10:08:59', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 2, 'Alagoas', 'AL', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 3, 'Amapá', 'AP', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 4, 'Amazonas', 'AM', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 5, 'Bahia', 'BA', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 6, 'Ceará', 'CE', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 7, 'Distrito Federal', 'DF', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 8, 'Espírito Santo', 'ES', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 9, 'Goiás', 'GO', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 10, 'Maranhão', 'MA', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 11, 'Mato Grosso', 'MT', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 12, 'Mato Grosso do Sul', 'MS', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 13, 'Minas Gerais', 'MG', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 14, 'Pará', 'PA', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 15, 'Paraíba', 'PB', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 16, 'Paraná', 'PR', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 17, 'Pernambuco', 'PE', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 18, 'Piauí', 'PI', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 19, 'Rio de Janeiro', 'RJ', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 20, 'Rio Grande do Norte', 'RN', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 21, 'Rio Grande do Sul', 'RS', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 22, 'Rondônia', 'RO', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 23, 'Roraima', 'RR', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 24, 'Santa Catarina', 'SC', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 25, 'São Paulo', 'SP', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 26, 'Sergipe', 'SE', '2018-06-14 10:08:43', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `data_atualizacao_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 27, 'Tocantins', 'TO', '2018-06-14 10:08:43', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: filial
DROP TABLE IF EXISTS `filial`;

CREATE TABLE IF NOT EXISTS `filial` (
	`id_filial` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`razao_social_filial` varchar(200) NOT NULL ,
	`cnpj_filial` varchar(25) NOT NULL ,
	`empresa_id` int(200)  ,
	`data_atualizacao_filial` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_filial` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO filial ( `id_filial`, `razao_social_filial`, `cnpj_filial`, `empresa_id`, `data_atualizacao_filial`, `usuario_id`, `bool_ativo_filial`) VALUES ( 1, 'Filial 01', '123', , '2018-06-14 09:43:18', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: grupo
DROP TABLE IF EXISTS `grupo`;

CREATE TABLE IF NOT EXISTS `grupo` (
	`id_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_grupo` varchar(100) NOT NULL ,
	`imagem_grupo` varchar(100) NOT NULL ,
	`filial_id` int(11) NOT NULL ,
	`data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_grupo` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `imagem_grupo`, `filial_id`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Diversos', 'diversos.png', 1, '2018-06-14 10:13:17', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: item
DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(200) NOT NULL ,
	`grupo_id` int(100) NOT NULL ,
	`data_atualizacao_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'Pão Francês', 1, '2018-06-14 10:13:45', 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Rosca', 1, '2018-06-14 10:14:29', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: item_unidade_medida
DROP TABLE IF EXISTS `item_unidade_medida`;

CREATE TABLE IF NOT EXISTS `item_unidade_medida` (
	`id_item_unidade_medida` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`quantidade_item_unidade_medida` float NOT NULL ,
	`item_id` int(100) NOT NULL ,
	`unidade_medida_id` int(100) NOT NULL ,
	`data_atualizacao_item_unidade_medida` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item_unidade_medida` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item_unidade_medida ( `id_item_unidade_medida`, `quantidade_item_unidade_medida`, `item_id`, `unidade_medida_id`, `data_atualizacao_item_unidade_medida`, `usuario_id`, `bool_ativo_item_unidade_medida`) VALUES ( 1, 1, 1, 3, '2018-06-14 10:27:30', 1, 1);
INSERT INTO item_unidade_medida ( `id_item_unidade_medida`, `quantidade_item_unidade_medida`, `item_id`, `unidade_medida_id`, `data_atualizacao_item_unidade_medida`, `usuario_id`, `bool_ativo_item_unidade_medida`) VALUES ( 2, 10, 1, 1, '2018-06-14 10:28:16', 1, 1);
INSERT INTO item_unidade_medida ( `id_item_unidade_medida`, `quantidade_item_unidade_medida`, `item_id`, `unidade_medida_id`, `data_atualizacao_item_unidade_medida`, `usuario_id`, `bool_ativo_item_unidade_medida`) VALUES ( 3, 1, 2, 3, '2018-06-14 10:28:33', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: nivel_acesso
DROP TABLE IF EXISTS `nivel_acesso`;

CREATE TABLE IF NOT EXISTS `nivel_acesso` (
	`id_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_nivel_acesso` varchar(200) NOT NULL ,
	`area_nivel_acesso` text NOT NULL ,
	`data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'caixa+cliente+condicao_de_pagamento+empresa+estado+filial+grupo+item+operacoes_caixa+unidade_medida+item-grupo+item_unidade_medida-item+cliente_contato-cliente+cliente_endereco-cliente+pedido_item-pedido+pedido_pagamento-pedido+pedido_pagamento_extorno-pedido_pagamento+caixa_operacao-caixa_movimentacao+filial-empresa+upload+mapa+mov+relatorio+notificacao+usuario', '2018-06-14 10:41:22', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes
DROP TABLE IF EXISTS `notificacoes`;

CREATE TABLE IF NOT EXISTS `notificacoes` (
	`id_notificacoes` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes` text NOT NULL ,
	`usuario_atuador_notificacoes` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes` enum('i','u','d') NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`bool_view_notificacoes` int(1) NOT NULL ,
	`data_atualizacao_notificacoes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes_config
DROP TABLE IF EXISTS `notificacoes_config`;

CREATE TABLE IF NOT EXISTS `notificacoes_config` (
	`id_notificacoes_config` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`area_notificacoes_config` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_config` varchar(100) NOT NULL ,
	`data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes_pendentes
DROP TABLE IF EXISTS `notificacoes_pendentes`;

CREATE TABLE IF NOT EXISTS `notificacoes_pendentes` (
	`id_notificacoes_pendentes` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes_pendentes` text NOT NULL ,
	`usuario_atuador_notificacoes_pendentes` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes_pendentes` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_pendentes` enum('i','u','d') NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_pendentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_pendentes` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes_salvas
DROP TABLE IF EXISTS `notificacoes_salvas`;

CREATE TABLE IF NOT EXISTS `notificacoes_salvas` (
	`id_notificacoes_salvas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes_salvas` text NOT NULL ,
	`usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_salvas` varchar(50) NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: operacoes_caixa
DROP TABLE IF EXISTS `operacoes_caixa`;

CREATE TABLE IF NOT EXISTS `operacoes_caixa` (
	`id_operacoes_caixa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_operacoes_caixa` varchar(200) NOT NULL ,
	`data_atualizacao_operacoes_caixa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_operacoes_caixa` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 1, 'Sangria', '2018-06-14 10:14:53', 1, 1);
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 2, 'Reforço', '2018-06-14 10:15:29', 1, 1);
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 3, 'Devolução', '2018-06-14 10:15:33', 1, 1);
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 4, 'Fechamento', '2018-06-14 10:15:46', 1, 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: pedido
DROP TABLE IF EXISTS `pedido`;

CREATE TABLE IF NOT EXISTS `pedido` (
	`id_pedido` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`documento_pedido` varchar(200) NOT NULL ,
	`total_pedido` float NOT NULL ,
	`emissao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`cliente_id` int(100)  ,
	`nome_cliente_pedido` varchar(100)  ,
	`bool_finalizado_pedido` int(1) NOT NULL ,
	`filial_id` int(200) NOT NULL ,
	`data_atualizacao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: pedido_item
DROP TABLE IF EXISTS `pedido_item`;

CREATE TABLE IF NOT EXISTS `pedido_item` (
	`id_pedido_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`quantidade_pedido_item` float NOT NULL ,
	`valor_unitario_pedido_item` float NOT NULL ,
	`valor_total_pedido_item` float NOT NULL ,
	`item_id` int(100)  ,
	`item_unidade_medida_id` int(100)  ,
	`pedido_id` int(100)  ,
	`data_atualizacao_pedido_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: pedido_pagamento
DROP TABLE IF EXISTS `pedido_pagamento`;

CREATE TABLE IF NOT EXISTS `pedido_pagamento` (
	`id_pedido_pagamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`parcela_atual_pedido_pagamento` int(11) NOT NULL ,
	`parcela_total_pedido_pagamento` int(11) NOT NULL ,
	`valor_pago_pedido_pagamento` float NOT NULL ,
	`bool_esta_pago_pedido_pagamento` int(1) NOT NULL ,
	`pedido_id` int(11) NOT NULL ,
	`condicao_de_pagamento_id` int(200) NOT NULL ,
	`data_atualizacao_pedido_pagamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido_pagamento` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: pedido_pagamento_extorno
DROP TABLE IF EXISTS `pedido_pagamento_extorno`;

CREATE TABLE IF NOT EXISTS `pedido_pagamento_extorno` (
	`id_pedido_pagamento_extorno` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`motivo_pedido_pagamento_extorno` varchar(200) NOT NULL ,
	`pedido_pagamento_id` int(200) NOT NULL ,
	`data_atualizacao_pedido_pagamento_extorno` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido_pagamento_extorno` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: relatorio_tabela
DROP TABLE IF EXISTS `relatorio_tabela`;

CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
	`id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorio_tabela` varchar(200) NOT NULL ,
	`data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: relatorios
DROP TABLE IF EXISTS `relatorios`;

CREATE TABLE IF NOT EXISTS `relatorios` (
	`id_relatorios` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorios` varchar(200) NOT NULL ,
	`tabela_relatorios` varchar(200) NOT NULL ,
	`colunas_relatorios` text NOT NULL ,
	`colunas_estrangeiras_relatorios` text NOT NULL ,
	`colunas_filtro_relatorios` text  ,
	`bool_filtro_ativo_relatorios` int(1) NOT NULL DEFAULT 1 ,
	`data_atualizacao_relatorios` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_emitir_relatorios` int(1) NOT NULL DEFAULT 0 ,
	`bool_ativo_relatorios` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: unidade_medida
DROP TABLE IF EXISTS `unidade_medida`;

CREATE TABLE IF NOT EXISTS `unidade_medida` (
	`id_unidade_medida` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_unidade_medida` varchar(100)  ,
	`sigla_unidade_medida` varchar(100) NOT NULL ,
	`data_atualizacao_unidade_medida` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_unidade_medida` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO unidade_medida ( `id_unidade_medida`, `descricao_unidade_medida`, `sigla_unidade_medida`, `data_atualizacao_unidade_medida`, `usuario_id`, `bool_ativo_unidade_medida`) VALUES ( 1, 'Kilo', 'KG', '2018-06-14 10:21:14', 1, 1);
INSERT INTO unidade_medida ( `id_unidade_medida`, `descricao_unidade_medida`, `sigla_unidade_medida`, `data_atualizacao_unidade_medida`, `usuario_id`, `bool_ativo_unidade_medida`) VALUES ( 2, 'Litro', 'LT', '2018-06-14 10:21:26', 1, 1);
INSERT INTO unidade_medida ( `id_unidade_medida`, `descricao_unidade_medida`, `sigla_unidade_medida`, `data_atualizacao_unidade_medida`, `usuario_id`, `bool_ativo_unidade_medida`) VALUES ( 3, 'Unidade', 'UN', '2018-06-14 10:21:38', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: upload_arq
DROP TABLE IF EXISTS `upload_arq`;

CREATE TABLE IF NOT EXISTS `upload_arq` (
	`id_upload_arq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_upload_arq` varchar(100) NOT NULL ,
	`tipo_upload_arq` varchar(100) NOT NULL ,
	`data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_upload_arq` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 1, 'diversos.png', 'imagem', '2018-06-14 10:12:31', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: usuario
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
	`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_usuario` varchar(200)  ,
	`login_usuario` char(3)  ,
	`senha_usuario` varchar(100)  ,
	`nivel_acesso_id` int(11) NOT NULL DEFAULT 1 ,
	`bool_ativo_usuario` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);