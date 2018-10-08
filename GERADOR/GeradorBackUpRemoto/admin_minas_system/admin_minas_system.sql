
-- Backup Geral
-- Gerando em: 01/08/2018 16:54:35
-- Pelo Gerador JK-19




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: adicional_site
DROP TABLE IF EXISTS `adicional_site`;

CREATE TABLE IF NOT EXISTS `adicional_site` (
	`id_adicional_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_adicional_site` varchar(200) NOT NULL ,
	`descricao_adicional_site` text NOT NULL ,
	`imagem_adicional_site` varchar(200) NOT NULL ,
	`saiba_mais_id` int(11) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_adicional_site` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_adicional_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



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


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cards
DROP TABLE IF EXISTS `cards`;

CREATE TABLE IF NOT EXISTS `cards` (
	`id_cards` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_cards` varchar(100) NOT NULL ,
	`descricao_cards` varchar(200)  ,
	`imagem_cards` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_cards` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_cards` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 1, 'Next Cable', '', 'Logonext.jpg', 1, '2018-01-25 09:49:34', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 2, 'Giga Security', '', 'cftv-hvr-adr-16-canais-gs16hd-hd-720p-giga-security-D_NQ_NP_143101-MLB8203210394_042015-F.jpg', 1, '2018-02-05 16:27:00', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 3, 'New Back', '', 'marcanewback.png', 1, '2018-01-25 09:51:47', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 4, 'TecVoz', '', 'tecvoz-1.jpg', 1, '2018-02-05 16:27:31', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 5, 'Lider', '', 'lider.jpg', 1, '2018-02-05 16:28:00', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 6, 'Telecam', '', 'telecam.png', 1, '2018-02-05 16:28:22', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 7, 'Multilaser', '', 'multilaser.png', 1, '2018-02-05 16:28:49', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 8, 'Magatron', '', 'megatron.jpg', 1, '2018-02-05 16:29:08', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 9, 'Onix', '', 'logo-onix.png', 1, '2018-02-05 16:30:13', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 10, 'Ragteck', '', 'ragteck.jpg', 1, '2018-02-05 16:30:53', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 11, 'Genno', '', 'genno.jpg', 1, '2018-02-05 16:31:15', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 12, 'TravBem', '', 'logo_travben.jpg', 1, '2018-02-05 16:31:41', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 13, 'UDI', '', 'udi cabos.png', 1, '2018-02-05 16:31:58', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 14, 'PPA', '', 'ppa.png', 1, '2018-06-22 16:30:36', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cliente_site
DROP TABLE IF EXISTS `cliente_site`;

CREATE TABLE IF NOT EXISTS `cliente_site` (
	`id_cliente_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_cliente_site` varchar(200) NOT NULL ,
	`login_cliente_site` varchar(200) NOT NULL ,
	`senha_cliente_site` varchar(200) NOT NULL ,
	`telefone_cliente_site` varchar(30) NOT NULL ,
	`celular_cliente_site` varchar(30)  ,
	`endereco_cliente_site` varchar(500)  ,
	`numero_cliente_site` int(11)  ,
	`complemento_cliente_site` varchar(200)  ,
	`bairro_cliente_site` varchar(200)  ,
	`cidade_cliente_site` varchar(200)  ,
	`estado_id` int(11)  ,
	`cep_cliente_site` varchar(30)  ,
	`bool_ativo_cliente_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 2, 'Jack Biller', 'jac', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '99723-1080', '', '', 0, '', '', '', 0, '', 1);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 8, 'Teste Jack', 'tes', '*64D475A63138B1EFF85F475F994501BF26331685', '123', '', '', 0, '', '', '', 0, '', 1);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 9, 'rafael', 'rafaelt', '*EC0FF37D2410C08F652646F814222DB2070E5661', '33333333', '333333333', 'ccccccc', 111, '', 'vvvvvv', 'dddddd', 0, '11111111', 1);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 10, 'jelson teixeira', 'jelsonteixeira', '*CD670D3435B07FE0C8105DC0A48E35A10DAE909C', '35991602440', '35991602440', 'travesa valeriano jose da silva', 37, 'casa fundo 37a', 'centro', 'guaxupé', 0, '37800000', 1);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 11, 'ysmaily', 'ysmaily', '*FE40A6FB694966392C6996313FBA2C2E9AE2CBF3', '35997591807', '35992097779', 'rua major francisco anacleto', 933, 'loja A', 'centro', 'nova resende', 0, '37860000', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: configurar_site
DROP TABLE IF EXISTS `configurar_site`;

CREATE TABLE IF NOT EXISTS `configurar_site` (
	`id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_configurar_site` varchar(100) NOT NULL ,
	`titulo_menu_configurar_site` varchar(100)  ,
	`cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`contra_cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`imagem_icone_configurar_site` varchar(100) NOT NULL ,
	`imagem_logo_configurar_site` varchar(100) NOT NULL ,
	`data_atualizacao_configurar_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_configurar_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO configurar_site ( `id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES ( 1, 'Minas System', '', '#f76b00;', '#fff;', 'LogoSmForm.png', 'LogoLgBranca.png', '2018-01-27 09:01:45', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: contato
DROP TABLE IF EXISTS `contato`;

CREATE TABLE IF NOT EXISTS `contato` (
	`id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_contato` varchar(200) NOT NULL ,
	`email_contato` varchar(200)  ,
	`telefone_contato` varchar(200)  ,
	`assunto_contato` varchar(200)  ,
	`mensagem_contato` text  ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_contato` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 1, 'teste no site Jack', 'site_Jack@asd.asd', '123', 'Formulario de Contato - Site Minas System', 'Teste', 2, '2018-01-25 13:57:44', 1);
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 2, 'Helder Eduardo de Figueiredo', 'helder.figueiredo@informatizepc.com.br', '3537147748', 'Formulario de Contato - Site Minas System', 'TESTE', 2, '2018-02-07 10:45:22', 1);
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 3, 'donizete', 'cdi@cdiinfo.com.br', '31114-1177', 'Formulario de Contato - Site Minas System', 'teste cdi', 2, '2018-02-08 10:53:23', 1);
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 4, 'Jack Teste', 'teste@teste.teste', '9999-9999', 'Formulario de Contato - Site Minas System', 'teste', 2, '2018-02-08 12:34:38', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: destaque_grupo
DROP TABLE IF EXISTS `destaque_grupo`;

CREATE TABLE IF NOT EXISTS `destaque_grupo` (
	`id_destaque_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_destaque_grupo` varchar(100) NOT NULL ,
	`grupo_id` int(11) NOT NULL ,
	`imagem_destaque_grupo` varchar(100) NOT NULL ,
	`descricao_destaque_grupo` varchar(300)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_destaque_grupo` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_destaque_grupo` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 1, 'Alarmes', 1, 'Alarmes-ultra (2).png', '', 1, '2018-02-08 11:03:08', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 2, 'Automação', 2, 'Automacao.jpg', '', 1, '2018-01-25 16:06:36', 0);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 3, 'Nobreak e Baterias', 3, 'bateria_nobreak.jpg', '', 1, '2018-02-19 15:00:18', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 4, 'Cabos', 4, 'Cabos.jpg', '', 1, '2018-02-08 11:18:41', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 5, 'CFTV', 5, 'CFTV2.png', '', 1, '2018-02-06 17:39:51', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 6, 'Acessórios', 6, 'acessorios.jpg', '', 1, '2018-02-08 11:13:31', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 7, 'Controle de Acesso', 7, 'controle-de-acesso-gsproxct.png', '', 1, '2018-02-05 16:42:48', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: empresa
DROP TABLE IF EXISTS `empresa`;

CREATE TABLE IF NOT EXISTS `empresa` (
	`id_empresa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_empresa` varchar(200) NOT NULL ,
	`imagem_logo_empresa` varchar(200) NOT NULL ,
	`data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_empresa` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO empresa ( `id_empresa`, `descricao_empresa`, `imagem_logo_empresa`, `data_atualizacao_empresa`, `usuario_id`, `bool_ativo_empresa`) VALUES ( 1, 'Minas System', 'LogoLg.png', '2018-01-27 09:02:12', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: endereco_site
DROP TABLE IF EXISTS `endereco_site`;

CREATE TABLE IF NOT EXISTS `endereco_site` (
	`id_endereco_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_endereco_site` varchar(100) NOT NULL ,
	`endereco_endereco_site` varchar(100) NOT NULL ,
	`numero_endereco_site` int(11) NOT NULL ,
	`complemento_endereco_site` varchar(100)  ,
	`bairro_endereco_site` varchar(100)  ,
	`cidade_endereco_site` varchar(100) NOT NULL ,
	`estado_id` int(11) NOT NULL ,
	`cep_endereco_site` varchar(15) NOT NULL ,
	`telefone_endereco_site` varchar(50) NOT NULL ,
	`celular_endereco_site` varchar(50)  ,
	`email_endereco_site` varchar(100)  ,
	`horario_funcionamento_endereco_site` text NOT NULL ,
	`latitude_endereco_site` varchar(100) NOT NULL ,
	`longitude_endereco_site` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_endereco_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_endereco_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO endereco_site ( `id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `bairro_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `email_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `configurar_site_id`, `data_atualizacao_endereco_site`, `bool_ativo_endereco_site`) VALUES ( 1, 'R. Francisco Tramonte, 10', 'R. Francisco Tramonte', 10, '', 'Jardim Centenario', 'Poços de Caldas', 13, '37704-256', '(35) 3712-6037', '(35) 3715-6397', '', 'segunda - sexta 08:00–18:00', '-21.804359', '-46.562745', 1, '2018-02-06 08:48:54', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: estado
DROP TABLE IF EXISTS `estado`;

CREATE TABLE IF NOT EXISTS `estado` (
	`id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_estado` varchar(100) NOT NULL ,
	`sigla_estado` char(2) NOT NULL ,
	`bool_ativo_estado` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 1, 'Acre', 'AC', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 2, 'Alagoas', 'AL', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 3, 'Amapá', 'AP', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 4, 'Amazonas', 'AM', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 5, 'Bahia', 'BA', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 6, 'Ceará', 'CE', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 7, 'Distrito Federal', 'DF', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 8, 'Espírito Santo', 'ES', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 9, 'Goiás', 'GO', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 10, 'Maranhão', 'MA', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 11, 'Mato Grosso', 'MT', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 12, 'Mato Grosso do Sul', 'MS', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 13, 'Minas Gerais', 'MG', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 14, 'Pará', 'PA', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 15, 'Paraíba', 'PB', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 16, 'Paraná', 'PR', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 17, 'Pernambuco', 'PE', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 18, 'Piauí', 'PI', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 19, 'Rio de Janeiro', 'RJ', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 20, 'Rio Grande do Norte', 'RN', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 21, 'Rio Grande do Sul', 'RS', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 22, 'Rondônia', 'RO', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 23, 'Roraima', 'RR', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 24, 'Santa Catarina', 'SC', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 25, 'São Paulo', 'SP', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 26, 'Sergipe', 'SE', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 27, 'Tocantins', 'TO', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: grupo
DROP TABLE IF EXISTS `grupo`;

CREATE TABLE IF NOT EXISTS `grupo` (
	`id_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_grupo` char(50) NOT NULL ,
	`data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11)  ,
	`bool_ativo_grupo` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Alarmes', '2018-02-05 16:37:46', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Automação', '2018-02-05 17:43:36', 1, 0);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 3, 'Nobreak e Baterias', '2018-02-06 10:44:09', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 4, 'Cabos', '2018-01-25 08:43:25', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 5, 'CFTV', '2018-01-25 08:43:37', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 6, 'Acessórios', '2018-02-05 16:26:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 7, 'Controle de Acesso', '2018-01-25 08:44:35', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 8, 'Fechaduras', '2018-02-05 17:14:37', 1, 0);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 9, 'Ferramentas', '2018-02-05 17:43:47', 1, 0);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 10, 'Informática', '2018-02-05 17:44:10', 1, 0);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 11, 'Interfonia', '2018-02-05 17:43:58', 1, 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: item
DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(300) NOT NULL ,
	`descricao_site_item` varchar(300)  ,
	`unidade_medida_item` varchar(3)  ,
	`imagem_item` varchar(200) NOT NULL ,
	`grupo_id` int(11)  ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'Câmera de Seguração', '', '', 'camera.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Alarme', '', '', 'alarme.jpg', 4, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 3, 'Alarmes Slim', '', '', 'Alarmes-slim.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 4, 'Alarmes Ultra', '', '', 'Alarmes-ultra.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 5, 'Alta', '', '', 'alta.jpg', 4, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 6, 'Cabo HDMI', '', '', 'cabo hdmi.jpg', 4, 1, 0);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 7, 'Abraçadeira em Nylon Preta', '', '', 'Abracadeira-em-Nylon-Preta-300-x-36-mm-c-fortools-0070671.JPG', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 8, 'Cabo Paralelo Megatron', '', '', 'cabo paralelo megatron.jpg', 4, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 9, 'Cabo de Rede', '', '', 'cabo rede.jpg', 4, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 10, 'Cabo Coaxial', '', '', 'coaxial.jpg', 4, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 11, 'Atack New Black Vista', '', '', 'atack-new-black-vista1-1-300x300.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 12, 'Controle De Acesso', '', '', 'controle de acesso.jpg', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 13, 'Controle de Acesso Gsproxct', '', '', 'controle-de-acesso-gsproxct.png', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 14, 'Controle de Acesso Gstouchct', '', '', 'controle-de-acesso-gstouchct.png', 7, 1, 0);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 15, 'Controles Digitais Genno Tech Onix', '', '', 'Controles-Digitais-Genno-Tech-Onix.jpg', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 16, 'Articulador', '', '', 'articulador.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 17, 'Balun', '', '', 'balun.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 18, 'Bnc Borne', '', '', 'bnc borne.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 19, 'Filtro de Linha', '', '', 'filtro_de_linha_5_tom_pt_biv_lexman_89325845_0001_220x220.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 20, 'Eletrificador Revolution Control', '', '', 'eletrificador-revolution-control-.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 21, 'GATE-SAW', '', '', 'GATE-SAW.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 22, 'IB 550 PET', '', '', 'IB-550-PET.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 23, 'Sensor Magnético com Fio 1', '', '', 'Sensor-Magnetico-com-Fio-1.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 24, 'Sensor Magnético SMG SAW.', '', '', 'Sensor-Magnetico-SMG-SAW.png', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 25, 'Fontes', '', '', 'fontes.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 26, 'Haste', '', '', 'haste.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 27, 'Mola', '', '', 'mola.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 28, 'P4', '', '', 'p4.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 29, 'RCA', '', '', 'rca.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 30, 'Refletor', '', '', 'refletor.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 31, 'RJ-45', '', '', 'rj45.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 32, 'Roteador TP Link', '', '', 'Roteador-TP-Link-TL-WR840N-Wireless-300Mbps-com-2-Antenas-Interna-3112369.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 33, 'Suporte TV', '', '', 'suporte tv.jpg', 6, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 34, 'Bullet 20m', '', '', 'bullet 20m.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 35, 'Bullet 25m', '', '', 'bullet 25m.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 36, 'Bullet', '', '', 'bullet.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 37, 'Camera Infravermelho Sony Exmor Full Ahd Gsfhd1050tv', '', '', 'camera-infravermelho-sony-exmor-full-ahd-gsfhd1050tv.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 38, 'Camera Speed Dome IP  Gsip2m18x120ir', '', '', 'camera-speed-dome-ip-gsip2m18x120ir.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 39, 'Camera Infravermelho Dome Ahd Plus 20 Metros Plastica Gshdp20db28', '', '', 'camera_infravermelho_dome_ahd_plus_20_metros_plastica-gshdp20db28.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 40, 'Camera Infravermelho Dome Ahd Plus 30 Metros Metalica Gshdp30db28', '', '', 'camera_infravermelho_dome_ahd_plus_30_metros_metalica-gshdp30db28.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 41, 'Camera Infravermelho Tubular Ahd Plus 20 Metros Plastica Gshdp20tb', '', '', 'camera_infravermelho_tubular_ahd_plus_20_metros_plastica-gshdp20tb.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 42, 'Camera Infravermelho Tubular Ahd Plus 30 Metros Metalica Gshdp30tb28', '', '', 'camera_infravermelho_tubular_ahd_plus_30_metros_metalica-gshdp30tb28.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 43, 'Dome', '', '', 'dome.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 44, 'Dvr Flex', '', '', 'dvr flex.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 45, 'DVR', '', '', 'dvr.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 46, 'Ftg TV ISP230IR', '', '', 'ftg_TV-ISP230IRjpg301022018163043.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 47, 'DVR Stand Alone DVR Lite', '', '', 'giga-produtos-nivel3-dvr-stand-alone-dvr-lite-dvr-lite-img.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 48, 'Gravador Digital de Video HVR Ahd 720p Gs04hd', '', '', 'gravador-digital-de-video-hvr-ahd-720p-gs04hd.png', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 49, 'Wifi', '', '', 'wifi.jpg', 5, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 50, 'FTG X8 Preto', '', '', 'ftg_X8_Preto1jpg714072016113031.jpg', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 51, 'FTM F6', '', '', 'ftm_F6jpg114072016110350.jpg', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 52, 'FTM FL1000', '', '', 'ftm_FL1000_1jpg814072016110500.jpg', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 53, 'Controle de Acesso Gstouchct', '', '', 'controle-de-acesso-gstouchct.png', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 54, 'Nobreak 700', '', '', 'nobreak 700.jpg', 3, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 55, 'Nobreak', '', '', 'nobreak.jpg', 3, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 56, 'Nobreak', '', '', 'nobreak.png', 3, 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: item_orcamento
DROP TABLE IF EXISTS `item_orcamento`;

CREATE TABLE IF NOT EXISTS `item_orcamento` (
	`id_item_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`orcamento_id` int(11) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`quantidade_item_orcamento` float NOT NULL ,
	`total_item_orcamento` float NOT NULL ,
	`bool_ativo_item_orcamento` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item_orcamento ( `id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES ( 1, '2018-01-25 10:36:21', 1, 1, 10, 1200, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: loja
DROP TABLE IF EXISTS `loja`;

CREATE TABLE IF NOT EXISTS `loja` (
	`id_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_loja` varchar(100) NOT NULL ,
	`descricao_loja` varchar(100)  ,
	`imagem_loja` varchar(100)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_loja` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO loja ( `id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES ( 1, 'Venha visitar nossa loja', 'Aguardamos sua visita', 'WhatsApp Image 2018-02-19 at 14.46.46 (1).jpeg', 1, '2018-02-19 14:54:18', 1);



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
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+quem_somos+videos+orcamento-cliente_site+item_orcamento-orcamento+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+topicos_loja-loja+upload+mapa+mov+pdf+notif+usuario', '2018-04-14 10:40:07', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 2, 'Usuario', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+quem_somos+videos+orcamento-cliente_site+item_orcamento-orcamento+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+topicos_loja-loja+upload+mov+pdf+usuario', '2018-04-16 08:58:18', 1, 1);



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
-- Tabela: orcamento
DROP TABLE IF EXISTS `orcamento`;

CREATE TABLE IF NOT EXISTS `orcamento` (
	`id_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_orcamento` varchar(200) NOT NULL ,
	`cliente_site_id` int(11) NOT NULL ,
	`data_lanc_orcamento` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_orcamento` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 1, 'Teste Jack', 2, '2018-01-25 10:35:22', 1);
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 2, '1', 9, '2018-03-02 13:22:11', 1);
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 3, 'Câmeras de seguranças', 10, '2018-06-28 21:26:35', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: quem_somos
DROP TABLE IF EXISTS `quem_somos`;

CREATE TABLE IF NOT EXISTS `quem_somos` (
	`id_quem_somos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_quem_somos` varchar(200) NOT NULL ,
	`descricao_quem_somos` text NOT NULL ,
	`imagem_quem_somos` varchar(100) NOT NULL ,
	`data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_quem_somos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO quem_somos ( `id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES ( 1, 'Sobre A Minas System', '<p>
A Minas System é uma empresa de distribuição de produtos de CFTV e Segurança. Possuímos uma grande experiência nessa setor, conhecemos este mercado e sabemos do desafio que o Revendedor enfrenta diariamente. Viemos com o compromisso de estreitar o relacionamento entre o Fabricante e você Revendedor, oferecendo um atendimento personalizado e um pós-venda diferenciado. Representamos grandes marcas no mercado, disponibilizando soluções que atendam com eficiência e investimentos acessíveis às necessidades do seu cliente.</p>
<br>
<p>
Estamos também à disposição para desenvolver e orientar, sempre que houver necessidade, na elaboração de projetos de segurança em ambientes corporativos e em ambientes residenciais, a nossa meta é estabelecer uma parceria longa e próspera. Tenha a certeza revendedor, que você encontrou um distribuidor que não procura somente realizar uma venda, mas um parceiro de negócios que vai trabalhar junto com você.
</p>
<br>
<p>Venha nos visita, estamos te aguardando.</p>', 'LogoLg.png', '2018-06-22 16:43:39', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: relatorio_tabela
DROP TABLE IF EXISTS `relatorio_tabela`;

CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
	`id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorio_tabela` varchar(200) NOT NULL ,
	`data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 1, 'cliente_site', '2018-04-14 10:40:07', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 2, 'contato', '2018-04-14 10:40:07', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 3, 'grupo', '2018-04-14 10:40:07', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 4, 'item', '2018-04-14 10:40:07', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 5, 'item_orcamento', '2018-04-14 10:40:07', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 6, 'orcamento', '2018-04-14 10:40:07', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 7, 'videos', '2018-04-14 10:40:07', 1);



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


-- Dados da tabela: 
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 1, 'Relatório de Contatos', 'contato', 'nome_contato+email_contato+telefone_contato', 'contato_tr_usuario_tr_nome_usuario', ' AND (usuario.nome_usuario LIKE \'%SITE%\')', 1, '2018-01-25 13:59:34', 1, 0, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: saiba_mais
DROP TABLE IF EXISTS `saiba_mais`;

CREATE TABLE IF NOT EXISTS `saiba_mais` (
	`id_saiba_mais` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_saiba_mais` varchar(200) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_saiba_mais` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_saiba_mais` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: site
DROP TABLE IF EXISTS `site`;

CREATE TABLE IF NOT EXISTS `site` (
	`ID_SITE` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`NOME_EMPRESA` varchar(100)  ,
	`NOME_CIDADE` varchar(100)  ,
	`ESTADO` char(2)  ,
	`FONE` varchar(14)  ,
	`FONE_APP` varchar(14)  ,
	`EMAIL` varchar(100)  ,
	`sendusername` varchar(255)  ,
	`sendpassword` varchar(255)  ,
	`smtpserver` varchar(255)  ,
	`smtpserverport` int(11)  ,
	`MailFrom` varchar(255)  ,
	`MailTo` varchar(255)  ,
	`MailCc` varchar(255)  ,
	`bool_ativo_site` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO site ( `ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES ( 1, 'Minas System', 'Poços de Caldas', 'MG', '(35) 3712-6037', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: slide_show
DROP TABLE IF EXISTS `slide_show`;

CREATE TABLE IF NOT EXISTS `slide_show` (
	`id_slide_show` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_slide_show` varchar(100)  ,
	`descricao_slide_show` varchar(200)  ,
	`imagem_slide_show` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_slide_show` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_slide_show` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 1, 'Tudo em Alarmes', '', 'fundo4.jpg', 1, '2018-02-06 08:59:05', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 2, 'Tudo para CFTV', '', 'security-resized-no-watermark.jpeg', 1, '2018-02-05 15:25:01', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 3, 'Informática', '', 'informatica.png', 1, '2018-02-05 15:24:53', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: topicos_loja
DROP TABLE IF EXISTS `topicos_loja`;

CREATE TABLE IF NOT EXISTS `topicos_loja` (
	`id_topicos_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_topicos_loja` varchar(100) NOT NULL ,
	`descricao_topicos_loja` varchar(100) NOT NULL ,
	`loja_id` int(11) NOT NULL ,
	`data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 1, 'Endereço', 'R. Francisco Tramonte, 10 - Jardim Centenario, Poços de Caldas - MG', 1, '2018-01-25 09:36:53', 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 2, 'Telefone', '(35) 3712-6037 ', 1, '2018-01-25 09:37:13', 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 3, 'Horário de Funcionamento', 'Segunda - Sexta 08:00–18:00', 1, '2018-01-25 09:37:41', 1);



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
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 24, 'informatica.png', 'imagem', '2018-01-27 08:21:06', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 25, 'seguranca.png', 'imagem', '2018-01-27 08:40:47', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 26, 'security-resized-no-watermark.jpeg', 'imagem', '2018-01-27 08:58:10', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 27, 'giga-produtos-nivel3-dvr-stand-alone-dvr-lite-dvr-lite-img.png', 'imagem', '2018-02-05 15:28:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 28, 'cabo paralelo megatron.jpg', 'imagem', '2018-02-05 15:29:15', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 36, 'Roteador-TP-Link-TL-WR840N-Wireless-300Mbps-com-2-Antenas-Interna-3112369.jpg', 'imagem', '2018-02-05 15:29:55', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 40, 'Sensor-Magnetico-SMG-SAW.png', 'imagem', '2018-02-05 16:13:29', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 41, 'Sensor-Magnetico-com-Fio-1.png', 'imagem', '2018-02-05 16:13:34', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 49, 'camera-speed-dome-ip-gsip2m18x120ir.png', 'imagem', '2018-02-05 16:14:12', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 54, 'cabo hdmi.jpg', 'imagem', '2018-02-05 16:14:34', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 55, 'Controles-Digitais-Genno-Tech-Onix.jpg', 'imagem', '2018-02-05 16:14:38', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 56, 'camera_infravermelho_dome_ahd_plus_30_metros_metalica-gshdp30db28.png', 'imagem', '2018-02-05 16:14:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 57, 'camera_infravermelho_dome_ahd_plus_20_metros_plastica-gshdp20db28.png', 'imagem', '2018-02-05 16:14:49', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 58, 'camera_infravermelho_tubular_ahd_plus_30_metros_metalica-gshdp30tb28.png', 'imagem', '2018-02-05 16:14:54', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 59, 'camera_infravermelho_tubular_ahd_plus_20_metros_plastica-gshdp20tb.png', 'imagem', '2018-02-05 16:14:59', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 60, 'cftv-hvr-adr-16-canais-gs16hd-hd-720p-giga-security-D_NQ_NP_143101-MLB8203210394_042015-F.jpg', 'imagem', '2018-02-05 16:15:03', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 62, 'dome.jpg', 'imagem', '2018-02-05 16:15:12', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 63, 'dvr flex.jpg', 'imagem', '2018-02-05 16:15:17', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 64, 'dvr.jpg', 'imagem', '2018-02-05 16:15:23', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 65, 'eletrificador-revolution-control-.png', 'imagem', '2018-02-05 16:15:27', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 66, 'haste.jpg', 'imagem', '2018-02-05 16:15:31', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 67, 'ftg_TV-ISP230IRjpg301022018163043.jpg', 'imagem', '2018-02-05 16:15:36', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 68, 'filtro_de_linha_5_tom_pt_biv_lexman_89325845_0001_220x220.jpg', 'imagem', '2018-02-05 16:15:40', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 71, 'gravador-digital-de-video-hvr-ahd-720p-gs04hd.png', 'imagem', '2018-02-05 16:15:56', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 72, 'lider.jpg', 'imagem', '2018-02-05 16:16:01', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 73, 'megatron.jpg', 'imagem', '2018-02-05 16:16:06', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 75, 'multilaser.png', 'imagem', '2018-02-05 16:16:17', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 76, 'mola.jpg', 'imagem', '2018-02-05 16:16:22', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 77, 'nobreak 700.jpg', 'imagem', '2018-02-05 16:16:26', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 78, 'logo_travben.jpg', 'imagem', '2018-02-05 16:16:31', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 79, 'nobreak.png', 'imagem', '2018-02-05 16:16:35', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 80, 'nobreak.jpg', 'imagem', '2018-02-05 16:16:40', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 82, 'rca.jpg', 'imagem', '2018-02-05 16:16:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 83, 'ragteck.jpg', 'imagem', '2018-02-05 16:16:56', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 84, 'refletor.jpg', 'imagem', '2018-02-05 16:17:01', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 85, 'tecvoz-1.jpg', 'imagem', '2018-02-05 16:17:06', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 86, 'telecam.png', 'imagem', '2018-02-05 16:17:11', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 87, 'suporte tv.jpg', 'imagem', '2018-02-05 16:17:16', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 90, 'controle de acesso.jpg', 'imagem', '2018-02-05 16:41:23', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 92, 'controle-de-acesso-gstouchct.png', 'imagem', '2018-02-05 16:41:33', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 93, 'ftg_X8_Preto1jpg714072016113031.jpg', 'imagem', '2018-02-05 16:41:38', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 94, 'ftm_F6jpg114072016110350.jpg', 'imagem', '2018-02-05 16:41:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 95, 'ftm_FL1000_1jpg814072016110500.jpg', 'imagem', '2018-02-05 16:41:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 97, 'fundo4.jpg', 'imagem', '2018-02-06 08:58:34', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 142, 'Automacao.jpg', 'imagem', '2018-02-06 09:28:43', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 143, 'Baterias.jpg', 'imagem', '2018-02-06 09:28:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 144, 'Baterias_e_Pilhas.jpg', 'imagem', '2018-02-06 09:28:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 146, 'CFTV.png', 'imagem', '2018-02-06 09:28:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 147, 'Cabos.jpg', 'imagem', '2018-02-06 09:28:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 148, 'Conectores.jpg', 'imagem', '2018-02-06 09:28:45', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 149, 'Controle_de_Acesso.png', 'imagem', '2018-02-06 09:28:45', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 150, 'GATE-SAW.png', 'imagem', '2018-02-06 09:28:45', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 151, 'IB-550-PET.png', 'imagem', '2018-02-06 09:28:45', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 152, 'Logo.png', 'imagem', '2018-02-06 09:28:45', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 153, 'LogoLg.png', 'imagem', '2018-02-06 09:28:46', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 154, 'LogoLgBranca.png', 'imagem', '2018-02-06 09:28:46', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 155, 'LogoLgForm.png', 'imagem', '2018-02-06 09:28:46', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 156, 'LogoSmBranca.png', 'imagem', '2018-02-06 09:28:46', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 157, 'LogoSmForm.png', 'imagem', '2018-02-06 09:28:46', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 158, 'Logonext.jpg', 'imagem', '2018-02-06 09:28:47', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 160, 'alarmes.JPG', 'imagem', '2018-02-06 09:28:47', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 165, 'bnc borne.jpg', 'imagem', '2018-02-06 09:28:48', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 166, 'bullet 20m.jpg', 'imagem', '2018-02-06 09:28:48', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 167, 'bullet 25m.jpg', 'imagem', '2018-02-06 09:28:48', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 168, 'bullet.jpg', 'imagem', '2018-02-06 09:28:49', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 169, 'cabo rede.jpg', 'imagem', '2018-02-06 09:28:49', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 170, 'camera-infravermelho-sony-exmor-full-ahd-gsfhd1050tv.png', 'imagem', '2018-02-06 09:28:49', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 171, 'camera.png', 'imagem', '2018-02-06 09:28:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 172, 'coaxial.jpg', 'imagem', '2018-02-06 09:28:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 173, 'controle-de-acesso-gsproxct.png', 'imagem', '2018-02-06 09:28:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 174, 'fontes.jpg', 'imagem', '2018-02-06 09:28:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 175, 'fundo1.jpg', 'imagem', '2018-02-06 09:28:50', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 176, 'fundo2.jpg', 'imagem', '2018-02-06 09:28:51', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 177, 'fundo3.jpg', 'imagem', '2018-02-06 09:28:51', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 178, 'genno.jpg', 'imagem', '2018-02-06 09:28:51', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 179, 'logo-onix.png', 'imagem', '2018-02-06 09:28:51', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 180, 'loja.png', 'imagem', '2018-02-06 09:28:51', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 181, 'marcanewback.png', 'imagem', '2018-02-06 09:28:52', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 182, 'p4.jpg', 'imagem', '2018-02-06 09:28:52', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 183, 'rj45.jpg', 'imagem', '2018-02-06 09:28:52', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 184, 'udi cabos.png', 'imagem', '2018-02-06 09:28:52', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 185, 'wifi.jpg', 'imagem', '2018-02-06 09:28:52', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 186, 'CFTV2.png', 'imagem', '2018-02-06 17:39:26', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 189, 'WhatsApp Image 2018-02-19 at 14.46.46 (1).jpeg', 'imagem', '2018-02-19 14:53:55', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 190, 'bateria_nobreak.jpg', 'imagem', '2018-02-19 14:59:54', 1);



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
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*68922D0185D8333DA80D814C32E5A04C28CC06D0', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 3, 'Minas System', 'msa', '*B86383B63289AA7C1A3F12670A5F9C18AE168454', 2, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: videos
DROP TABLE IF EXISTS `videos`;

CREATE TABLE IF NOT EXISTS `videos` (
	`id_videos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_videos` text NOT NULL ,
	`link_videos` varchar(200) NOT NULL ,
	`data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_videos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO videos ( `id_videos`, `descricao_videos`, `link_videos`, `data_atualizacao_videos`, `bool_ativo_videos`) VALUES ( 1, '\'teste"', 'teste', '2018-02-06 10:25:32', 0);