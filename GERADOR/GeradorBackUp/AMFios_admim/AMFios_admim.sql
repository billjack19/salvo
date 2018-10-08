
-- Backup Geral
-- Gerando em: 01/08/2018 16:49:38
-- Pelo Gerador JK-19




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
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 1, 'Construção e Reforma', '', 'card1.jpg', 1, '2018-01-10 10:15:17', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 2, 'Casa e Escritório', '', 'card3.jpg', 1, '2018-01-09 08:17:46', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 3, 'Iluminação e decoração', '', 'card2.jpg', 1, '2018-01-09 08:18:08', 1);



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
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 1, 'teste', 'teste', 'teste', 'Teste', '', '', 0, '', '', '', 13, '', 1);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 2, 'Jack Biller', 'jac', '123', '9999-9999', '', '', 0, '', '', '', , '', 1);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 4, 'Jack', 'jac', '123', '123', '', '', 0, '', '', '', 0, '', 0);
INSERT INTO cliente_site ( `id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES ( 5, 'Teste Jack', 'jac', '456', '125', '', '', 0, '', '', '', , '', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: configurar_site
DROP TABLE IF EXISTS `configurar_site`;

CREATE TABLE IF NOT EXISTS `configurar_site` (
	`id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_configurar_site` varchar(100) NOT NULL ,
	`cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`contra_cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`imagem_icone_configurar_site` varchar(100) NOT NULL ,
	`imagem_logo_configurar_site` varchar(100) NOT NULL ,
	`data_atualizacao_configurar_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_configurar_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO configurar_site ( `id_configurar_site`, `titulo_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES ( 1, 'AM Fios & Cabos', '#7ec0fa;', '#fff;', 'Logotipo.png', 'Logotipo_branca.png', '2018-01-08 14:30:42', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: contato
DROP TABLE IF EXISTS `contato`;

CREATE TABLE IF NOT EXISTS `contato` (
	`id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`DT_CONTATO` datetime(1)  DEFAULT CURRENT_TIMESTAMP(1) on update CURRENT_TIMESTAMP,
	`NOME_CONTATO` varchar(100)  ,
	`EMAIL_CONTATO` varchar(100)  ,
	`TELEFONE_CONTATO` varchar(100)  ,
	`ASSUNTO_CONTATO` varchar(200)  ,
	`MENSAGEM_CONTATO` text  ,
	`ARQUIVO_CONTATO` varchar(200)  ,
	`bool_ativo_contato` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



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
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 1, 'Cabos Atox', 2, 'cabo.jpg', '', 1, '2018-01-02 16:09:31', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 2, 'Luminária Pública', 8, 'luminarias.png', '', 1, '2018-01-02 16:51:49', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 3, 'Chaves e Fusíveis', 4, 'fusiveis.jpg', '', 1, '2018-01-02 16:52:36', 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 4, 'Canaletas e Acessórios', 3, 'fundo3.jpg', '', 1, '2018-01-05 14:32:56', 0);



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
INSERT INTO endereco_site ( `id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `bairro_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `email_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `configurar_site_id`, `data_atualizacao_endereco_site`, `bool_ativo_endereco_site`) VALUES ( 1, 'R. Pedro Bertozi n° 8', 'R. Pedro Bertozi', 8, '', 'Vila Olímpica', 'Poços de Caldas', 13, '37704-375', '(35) 3722-0808', '', '', 'Segunda - Sexta · 07:30–18:00', '-21.779533', '-46.60325899999998', 1, '2018-01-08 13:29:37', 1);



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
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Automação e Controle', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Cabos Atox', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 3, 'Canaletas e Acessórios', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 4, 'Chaves e Fusíveis', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 5, 'Conduletes e Caixas', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 6, 'Disjuntores', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 7, 'Eletrocalhas', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 8, 'Luminária Pública', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 9, 'Para-raio e Acessórios para Aterramento', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 10, 'Quadros de Comando', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 11, 'Teleinformática e Telefonia', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 12, 'Terminais', '2017-12-29 00:00:00', 1, 1);



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
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'teste', 'teste', 'UN', 'Logotipo.jpg', 4, 1, 0);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Cabos Atox', '', 'UN', 'cabo.jpg', 2, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 3, 'Chaves e Fusíveis', '', 'UN', 'fusiveis.jpg', 4, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 4, 'Luminária Pública', '', 'UN', 'luminarias.png', 8, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 5, 'Botões', 'Para seus projetos com tomadas de decisão entre outros', 'UN', 'botoes.jpg', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 6, 'Chave Comutadora', '', 'UN', 'chave-comutadora.jpg', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 7, 'Contator', 'Contator', 'UN', 'contator.jpg', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 8, 'Contator', '', 'UN', 'contator.jpg', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 9, 'Cabo Atox', '', 'MT', 'cabo-atox.jpg', 2, 1, 1);



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
INSERT INTO item_orcamento ( `id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES ( 1, '2018-01-08 13:33:23', 1, 5, 10, 0, 1);
INSERT INTO item_orcamento ( `id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES ( 2, '2018-01-11 17:56:32', 2, 4, 2, 20, 1);
INSERT INTO item_orcamento ( `id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES ( 3, '2018-01-11 17:56:42', 2, 8, 13, 25, 1);



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
INSERT INTO loja ( `id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES ( 1, 'Visite nossa loja', 'Aguardamos sua visita!', 'loja.png', 1, '2018-01-02 15:55:04', 1);



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
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 1, 'Teste', 1, '2018-01-08 13:33:04', 1);
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 2, 'Orcamento Teste', 4, '2018-01-11 17:49:47', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: quem_somos
DROP TABLE IF EXISTS `quem_somos`;

CREATE TABLE IF NOT EXISTS `quem_somos` (
	`id_quem_somos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_quem_somos` varchar(200) NOT NULL ,
	`descricao_quem_somos` text NOT NULL ,
	`data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_quem_somos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO quem_somos ( `id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES ( 1, 'Quem Somos?', ' ', '2018-01-10 14:06:51', 0);



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
INSERT INTO site ( `ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES ( 1, 'AM Fios & Cabos', 'Poços de Caldas', 'MG', '35 3722-0808', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);



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
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 1, 'Tudo em Lâmpadas', 'Para sua casa e escritório.', 'fundo1.jpg', 1, '2018-01-05 10:18:10', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 2, 'Completa linha de cabos', 'Para você que vai construir ou reformar.', 'fundo2.jpg', 1, '2018-01-02 11:00:01', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 3, 'Grandes Negócios', 'Fechamos qualquer negócio', 'fundo3.jpg', 1, '2018-01-02 11:03:41', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 4, 'Teste', 'teste', 'loja.png', 1, '2018-01-05 14:34:57', 0);



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
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 1, 'Endereço:', 'R. Pedro Bertozi. 8 -4 Vl Olímpica. Poços de Caldas - MG. 37704-375', 1, '2018-01-02 15:43:56', 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 2, 'Telefone:', '(35) 3722-0808', 1, '2018-01-02 15:43:22', 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 3, 'Horário:', 'Segunda - Sexta · 07:30–18:00', 1, '2018-01-02 15:44:02', 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 4, 'E-mail', 'teste@gmail.com', 1, '2018-01-09 08:20:42', 0);



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
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 1, 'Logotipo.jpg', 'imagem', '2018-01-02 08:44:21', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 2, 'Logotipo.png', 'imagem', '2018-01-02 10:30:55', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 3, 'Logotipo_branca.png', 'imagem', '2018-01-02 10:31:16', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 4, 'card1.jpg', 'imagem', '2018-01-02 10:35:46', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 5, 'card2.jpg', 'imagem', '2018-01-02 10:35:57', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 6, 'card3.jpg', 'imagem', '2018-01-02 10:36:06', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 7, 'loja.png', 'imagem', '2018-01-02 10:36:28', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 8, 'fundo1.jpg', 'imagem', '2018-01-02 10:36:40', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 9, 'fundo2.jpg', 'imagem', '2018-01-02 10:36:51', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 10, 'fundo3.jpg', 'imagem', '2018-01-02 10:37:05', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 11, 'cabo.jpg', 'imagem', '2018-01-02 10:42:41', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 12, 'fusiveis.jpg', 'imagem', '2018-01-02 10:42:52', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 13, 'luminarias.png', 'imagem', '2018-01-02 10:43:01', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 14, 'botoes.jpg', 'imagem', '2018-01-02 17:06:48', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 15, 'chave-comutadora.jpg', 'imagem', '2018-01-02 17:13:29', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 16, 'contator.jpg', 'imagem', '2018-01-04 10:27:23', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 17, 'equipamento-de-medicao.jpg', 'imagem', '2018-01-05 13:23:26', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 18, 'cabo-atox.jpg', 'imagem', '2018-01-05 13:24:24', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 19, 'cabo-coaxial.jpg', 'imagem', '2018-01-05 13:33:47', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 20, 'cabo-flexivel-750v.jpg', 'imagem', '2018-01-05 13:36:10', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 21, 'cabo-de-telefonia.jpg', 'imagem', '2018-01-05 13:38:53', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 22, 'maxresdefault_(1).jpg', 'imagem', '2018-01-08 14:13:06', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 23, 'maxresdefault.jpg', 'imagem', '2018-01-08 14:20:06', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 24, 'fundoslideshowhome.jpg', 'imagem', '2018-01-08 16:15:26', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 25, 'Chrysanthemum.jpg', 'imagem', '2018-01-08 16:16:02', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 26, 'Jellyfish.jpg', 'imagem', '2018-01-09 09:43:58', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 27, 'Penguins.jpg', 'imagem', '2018-01-09 09:49:16', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 28, 'Hydrangeas.jpg', 'imagem', '2018-01-09 14:13:17', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 29, 'fundo-slideshow-home.jpg', 'imagem', '2018-01-10 13:36:55', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 30, 'grupo_teste.png', 'imagem', '2018-01-10 13:37:36', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: usuario
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
	`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_usuario` varchar(200)  ,
	`login_usuario` char(3)  ,
	`senha_usuario` varchar(100)  ,
	`bool_ativo_usuario` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1);