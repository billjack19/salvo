
-- Backup Geral
-- Gerando em: 05/08/2018 23:34:06
-- Pelo Gerador JK-19




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: aplicativos
DROP TABLE IF EXISTS `aplicativos`;

CREATE TABLE IF NOT EXISTS `aplicativos` (
	`id_aplicativos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_aplicativos` varchar(200) NOT NULL ,
	`data_atualizacao_aplicativos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_aplicativos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 1, 'Constituição Brasileira', '2018-08-05 18:37:20', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 2, 'Cyrus (Autenticador de Jogos do YU-GI-HO)', '2018-08-05 18:37:50', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 3, 'DaTuner Lite (Afinador)', '2018-08-05 18:38:03', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 4, 'Dicio (Dicionario)', '2018-08-05 18:38:16', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 5, 'Duel Link', '2018-08-05 18:38:34', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 6, 'Facebook', '2018-08-05 18:38:41', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 7, 'Google Opinion Rewards', '2018-08-05 18:39:05', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 8, 'Grupos para WhatsApp', '2018-08-05 18:39:22', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 9, 'Hill Climb Racing', '2018-08-05 18:39:44', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 10, 'Hill Climb Racing 2', '2018-08-05 18:39:54', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 11, 'HTML Color Codes Piker', '2018-08-05 18:40:21', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 12, 'Letras (de Musica)', '2018-08-05 18:40:35', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 13, 'Master FIPE', '2018-08-05 18:40:47', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 14, 'Music Player', '2018-08-05 18:41:02', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 15, 'MX Player', '2018-08-05 18:41:10', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 16, 'Open in browser', '2018-08-05 18:41:23', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 17, 'Opera Mini', '2018-08-05 18:41:32', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 18, 'Soundcorset afinador e metronomo', '2018-08-05 18:42:01', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 19, 'Tradutor', '2018-08-05 18:42:07', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 20, 'WhatsApp', '2018-08-05 18:42:15', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 21, 'ZArchiver', '2018-08-05 18:42:33', 1, 1);
INSERT INTO aplicativos ( `id_aplicativos`, `descricao_aplicativos`, `data_atualizacao_aplicativos`, `usuario_id`, `bool_ativo_aplicativos`) VALUES ( 22, 'Zoom', '2018-08-05 18:42:44', 1, 1);



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
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 20, 'aplicativos', 'Aplicativos', 1, 1, 1, 1, '2018-08-05 18:44:06', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 21, 'meus_aplicativos', 'Meus Aplicativos', 1, 1, 1, 1, '2018-08-05 18:44:06', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 22, 'pessoa', 'Pessoa', 1, 1, 1, 1, '2018-08-05 18:44:06', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 23, 'telefone', 'Telefone', 1, 1, 1, 1, '2018-08-05 18:44:06', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 24, 'telefone-pessoa', 'Telefone - Pessoa', 1, 1, 1, 1, '2018-08-05 18:44:06', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 25, 'upload', 'Upload', 1, 1, 1, 1, '2018-08-05 18:44:07', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 26, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-08-05 18:44:07', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 27, 'mov', 'Mov', 1, 1, 1, 1, '2018-08-05 18:44:07', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 28, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-08-05 18:44:07', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 29, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-08-05 18:44:07', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 30, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-08-05 18:44:07', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: meus_aplicativos
DROP TABLE IF EXISTS `meus_aplicativos`;

CREATE TABLE IF NOT EXISTS `meus_aplicativos` (
	`id_meus_aplicativos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_meus_aplicativos` varchar(200) NOT NULL ,
	`data_atualizacao_meus_aplicativos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_meus_aplicativos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 1, 'Balaça', '2018-08-05 18:44:27', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 2, 'Cálculo de Consumo de Combustível', '2018-08-05 18:44:59', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 3, 'connectWebService', '2018-08-05 18:45:14', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 4, 'Desafio Torres', '2018-08-05 18:45:25', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 5, 'Distribuição Eletrônica', '2018-08-05 18:45:43', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 6, 'Imprimir Binario', '2018-08-05 18:45:57', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 7, 'mostraGeolocalização', '2018-08-05 18:46:25', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 8, 'Panquecas CDI', '2018-08-05 18:46:40', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 9, 'Primeiro Projeto (esta com o ícone do vendas)', '2018-08-05 18:47:16', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 10, 'Projeto Caçamba', '2018-08-05 18:47:34', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 11, 'Travessia do Rio', '2018-08-05 18:47:54', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 12, 'Vendas CDI', '2018-08-05 18:48:00', 1, 1);
INSERT INTO meus_aplicativos ( `id_meus_aplicativos`, `descricao_meus_aplicativos`, `data_atualizacao_meus_aplicativos`, `usuario_id`, `bool_ativo_meus_aplicativos`) VALUES ( 13, 'Vendas Web CDI', '2018-08-05 18:48:06', 1, 1);



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
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'aplicativos+meus_aplicativos+pessoa+telefone+telefone-pessoa+upload+mapa+mov+relatorio+notificacao+usuario', '2018-08-05 18:44:05', 1, 1);



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
-- Tabela: pessoa
DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE IF NOT EXISTS `pessoa` (
	`id_pessoa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_pessoa` varchar(200) NOT NULL ,
	`telefone_pessoa` varchar(20) NOT NULL ,
	`data_atualizacao_pessoa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pessoa` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 1, 'Jack Biller', '+55 35 9 9727-5103', '2018-08-05 22:28:08', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 2, 'Leandro', '991359015', '2018-08-05 22:28:50', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 3, 'A traz Nota Gas', '991004004', '2018-08-05 15:27:29', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 4, 'Abner', '+553592053934', '2018-08-05 22:30:13', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 5, 'Adams', '+55 (35) 9103-5753', '2018-08-05 22:35:17', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 6, 'Alex', '+55 (35) 9122-8337', '2018-08-05 22:34:50', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 7, 'Alex Eletrônica prof', '+55 (35) 9901-3767', '2018-08-05 22:34:19', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 8, 'Alex Majeau', '+55 (35) 8874-0011', '2018-08-05 22:33:40', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 9, 'Alex Rosa', '+55 (35) 8803-0704', '2018-08-05 22:33:07', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 10, 'Ambulancia', '192', '2018-08-05 22:31:53', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 11, 'André Ávila', '035 9 9204-3030', '2018-08-05 22:32:36', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 12, 'Atendimento Oi', '*144', '2018-08-05 22:35:22', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 13, 'Atirador', '+55 (35) 8889-6269', '2018-08-05 22:35:49', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 14, 'Auxilio a LIsta', '102', '2018-08-05 15:35:25', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 15, 'Avestruz', '9 9226-1700', '2018-08-05 15:36:06', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 16, 'Bombeiros', '193', '2018-08-05 22:35:54', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 17, 'Bruno CDI', '+55 (35) 8438-5723', '2018-08-05 22:36:27', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 18, 'Bruno Curso Eletrônica', '+55 (35) 9100-0053', '2018-08-05 22:36:57', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 19, 'Café', '+55 (35) 9728-7704', '2018-08-05 22:37:19', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 20, 'Caixa Postal', '*555', '2018-08-05 22:37:22', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 21, 'Cara da Camera', '9 9196-8001', '2018-08-05 15:39:42', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 22, 'Carrinho Bebê', '9 9175-3658', '2018-08-05 15:40:30', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 23, 'Carro', '9 4830-6737', '2018-08-05 15:41:01', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 24, 'Cassiano', '+55 (35) 8413-7391', '2018-08-05 15:41:33', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 25, 'CDI', '35 9 9165-0804', '2018-08-05 22:37:56', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 26, 'Daniel', '+55 (35) 9126-2283', '2018-08-05 22:38:22', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 27, 'Defesa Civil', '199', '2018-08-05 22:38:24', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 28, 'Digão', '+55 (35) 9840-7146', '2018-08-05 15:56:39', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 29, 'Donizete', '9 8858-0263', '2018-08-05 22:38:55', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 30, 'Eduardo', '+55 (35) 9859-3584', '2018-08-05 16:04:40', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 31, 'Eletronote', '9 9243-4762', '2018-08-05 22:39:37', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 32, 'Emerson', '+55 (35) 9713-8690', '2018-08-05 16:04:45', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 33, 'Endrel', '+55 (35) 8889-8704', '2018-08-05 22:40:52', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 34, 'Esquisito', '+55 (35) 9733-2477', '2018-08-05 16:04:49', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 35, 'Eu tbm', '+55 (35) 9143-0314', '2018-08-05 16:04:51', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 36, 'Fernando Henrique', '+55 (35) 9915-0336', '2018-08-05 16:04:53', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 37, 'Filipe Cabo Verde', '+55 35 9887-5109', '2018-08-05 16:04:55', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 38, 'Fusca', '91675124', '2018-08-05 16:04:57', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 39, 'Gustavo', '+55 35 8714-5361', '2018-08-05 16:04:59', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 40, 'Gustavo Messias', '+55 19  9 8378-2253', '2018-08-05 16:09:09', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 41, 'Harrison', '+55 35 8833-6663', '2018-08-05 16:09:37', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 42, 'Ian Tbm', '035 9 9115-8286', '2018-08-05 16:10:09', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 43, 'Ian', '+55 35 9128-0313', '2018-08-05 16:10:44', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 44, 'James', '9 9146-3182', '2018-08-05 16:11:14', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 45, 'João Carlos Eletrônica', '+55 35 9894-2751', '2018-08-05 16:13:11', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 46, 'João Gui', '+55 35 9982-4693', '2018-08-05 16:14:02', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 47, 'João Irmão', '+55 35 9986-6492', '2018-08-05 16:14:41', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 48, 'Joaquim Célula Vini', '+55 35 9114-6089', '2018-08-05 16:15:38', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 49, 'Jonathan', '+55 35 8887-4660', '2018-08-05 16:16:20', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 50, 'Júlio', '+55 35 8421-0898', '2018-08-05 16:16:56', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 51, 'Leonardo', '9 9918-0264', '2018-08-05 16:18:16', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 52, 'Luis Curso Informatica', '+55 35 8819-1578', '2018-08-05 16:18:53', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 53, 'Luizão Senai', '+55 35 9865-1223', '2018-08-05 16:19:23', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 54, 'Marcos', '+55 35 8801-1878', '2018-08-05 16:19:51', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 55, 'Natália Info', '+55 35 9165-1685', '2018-08-05 16:20:33', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 56, 'Nícolas Info', '+55 35 9211-5021', '2018-08-05 16:21:20', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 57, 'Policia', '190', '2018-08-05 16:21:36', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 58, 'Portal de Voz', '*2211', '2018-08-05 16:22:03', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 59, 'Priscila Sest', '9951-0021', '2018-08-05 16:24:28', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 60, 'Promoções Oi', '*880', '2018-08-05 16:24:46', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 61, 'Promoções Vivo', '*9000', '2018-08-05 16:25:10', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 62, 'Rafa Info', '+55 35 9213-5204', '2018-08-05 16:26:11', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 63, 'Rafa Info', '+55 35 9895-5674', '2018-08-05 16:26:52', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 64, 'Rani Info', '9 9142-1469', '2018-08-05 16:27:26', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 65, 'Raninho', '+55 35 9734-9835', '2018-08-05 18:24:11', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 66, 'Rapaz Luporini', '9 9814-1281', '2018-08-05 18:25:05', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 67, 'Raphael primo v', '+55 35 9228-4034', '2018-08-05 18:25:45', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 68, 'Renan', '+55 35 9881-3662', '2018-08-05 18:26:20', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 69, 'Renato Senat', '+55 35 8867-5022', '2018-08-05 18:26:51', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 70, 'Rodrigo', '9 8831-2985', '2018-08-05 18:27:33', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 71, 'Rosi Mãe', '9 9844-3441', '2018-08-05 22:30:31', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 72, 'Sabrina Forró', '+55 35 9115-0830', '2018-08-05 18:29:18', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 73, 'Samuel', '+55 35 8834-0789', '2018-08-05 18:29:49', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 74, 'Samuel Miser', '+55 35 9864-0562', '2018-08-05 18:30:17', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 75, 'Thales amigo B', '+55 35 9950-1201', '2018-08-05 18:31:04', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 76, 'Thiago CDI', '+55 35 9910-9416', '2018-08-05 18:31:32', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 77, 'Tia Flavia mãe da Rafa', '9 9814-8254', '2018-08-05 18:32:25', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 78, 'Tio Nei', '9 9162-0006', '2018-08-05 22:31:41', 1, 0);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 79, 'Vicente', '+55 35 8886-4383', '2018-08-05 18:33:09', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 80, 'Vinicius', '+55 35 8874-9841', '2018-08-05 18:33:49', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 81, 'Vitim', '+55 35 9172-8691', '2018-08-05 18:34:12', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 82, 'Vivo', '*8486', '2018-08-05 18:34:23', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 83, 'Vivo Fixo SP', '10315', '2018-08-05 18:34:42', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 84, 'Vivo no Mundo', '+55 11 3056-8628', '2018-08-05 18:35:18', 1, 1);
INSERT INTO pessoa ( `id_pessoa`, `nome_pessoa`, `telefone_pessoa`, `data_atualizacao_pessoa`, `usuario_id`, `bool_ativo_pessoa`) VALUES ( 85, 'Vó Tereza', '9 9865-8637', '2018-08-05 18:35:41', 1, 1);



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
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 1, 'pessoa', '2018-08-05 18:44:05', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 2, 'telefone', '2018-08-05 18:44:05', 1);



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
-- Tabela: telefone
DROP TABLE IF EXISTS `telefone`;

CREATE TABLE IF NOT EXISTS `telefone` (
	`id_telefone` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`telefone_telefone` varchar(20) NOT NULL ,
	`pessoa_id` int(11) NOT NULL ,
	`data_atualizacao_telefone` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_telefone` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



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


-- Dados da tabela: Nenhum registro



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




-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
-- Chaves de todas as Tabelas 




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: aplicativos

ALTER TABLE `aplicativos`
	ADD CONSTRAINT `fk_aplicativos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: area_nivel_acesso

ALTER TABLE `area_nivel_acesso`
	ADD CONSTRAINT `fk_area_nivel_acesso<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

ALTER TABLE `area_nivel_acesso`
	ADD CONSTRAINT `fk_area_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: meus_aplicativos

ALTER TABLE `meus_aplicativos`
	ADD CONSTRAINT `fk_meus_aplicativos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: nivel_acesso

ALTER TABLE `nivel_acesso`
	ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes

ALTER TABLE `notificacoes`
	ADD CONSTRAINT `fk_notificacoes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes_config

ALTER TABLE `notificacoes_config`
	ADD CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes_pendentes

ALTER TABLE `notificacoes_pendentes`
	ADD CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes_salvas

ALTER TABLE `notificacoes_salvas`
	ADD CONSTRAINT `fk_notificacoes_salvas<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: pessoa

ALTER TABLE `pessoa`
	ADD CONSTRAINT `fk_pessoa<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: relatorio_tabela - Nenhuma chave encontrada




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: relatorios - Nenhuma chave encontrada




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: telefone

ALTER TABLE `telefone`
	ADD CONSTRAINT `fk_telefone<>pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id_pessoa`);

ALTER TABLE `telefone`
	ADD CONSTRAINT `fk_telefone<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: upload_arq - Nenhuma chave encontrada




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: usuario

ALTER TABLE `usuario`
	ADD UNIQUE INDEX `Login` (`login_usuario`);

ALTER TABLE `usuario`
	ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);