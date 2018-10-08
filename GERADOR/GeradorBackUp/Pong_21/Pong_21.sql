
-- Backup Geral
-- Gerando em: 01/08/2018 16:58:52
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


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: historico_jogo
DROP TABLE IF EXISTS `historico_jogo`;

CREATE TABLE IF NOT EXISTS `historico_jogo` (
	`id_historico_jogo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`sequencia_historico_jogo` int(11) NOT NULL ,
	`placar_historico_jogo` varchar(200) NOT NULL ,
	`jogos_id` int(11) NOT NULL ,
	`data_atualizacao_historico_jogo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_historico_jogo` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 1, 1, '1-0', 1, '2018-02-22 10:10:45', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 2, 2, '2-0', 1, '2018-02-22 10:10:52', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 3, 3, '2-1', 1, '2018-02-22 10:11:04', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 4, 4, '2-2', 1, '2018-02-22 10:11:19', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 5, 5, '2-3', 1, '2018-02-22 10:11:34', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 6, 6, '3-3', 1, '2018-02-22 10:11:40', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 7, 7, '4-3', 1, '2018-02-22 10:11:47', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 8, 8, '5-3', 1, '2018-02-22 10:11:52', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: jogadores
DROP TABLE IF EXISTS `jogadores`;

CREATE TABLE IF NOT EXISTS `jogadores` (
	`id_jogadores` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_jogadores` varchar(200) NOT NULL ,
	`foto_jogadores` varchar(200)  ,
	`telefone_jogadores` varchar(200) NOT NULL ,
	`data_atualizacao_jogadores` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_jogadores` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO jogadores ( `id_jogadores`, `nome_jogadores`, `foto_jogadores`, `telefone_jogadores`, `data_atualizacao_jogadores`, `usuario_id`, `bool_ativo_jogadores`) VALUES ( 1, 'Jack Biller da Silva Prado', '', '35 99723-1080', '2018-02-22 10:09:55', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: jogo_atual
DROP TABLE IF EXISTS `jogo_atual`;

CREATE TABLE IF NOT EXISTS `jogo_atual` (
	`id_jogo_atual` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`resultado_jogo_atual` enum('jog_1','jog_2') NOT NULL ,
	`data_atualizacao_jogo_atual` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_jogo_atual` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO jogo_atual ( `id_jogo_atual`, `resultado_jogo_atual`, `data_atualizacao_jogo_atual`, `usuario_id`, `bool_ativo_jogo_atual`) VALUES ( 1, 'jog_2', '2018-02-22 10:15:31', 1, 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: jogos
DROP TABLE IF EXISTS `jogos`;

CREATE TABLE IF NOT EXISTS `jogos` (
	`id_jogos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_jogos` varchar(200) NOT NULL ,
	`jogador_1_jogos` int(11) NOT NULL ,
	`jogador_2_jogos` int(11) NOT NULL ,
	`resultado_jogos` varchar(200) NOT NULL ,
	`data_atualizacao_jogos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_jogos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO jogos ( `id_jogos`, `descricao_jogos`, `jogador_1_jogos`, `jogador_2_jogos`, `resultado_jogos`, `data_atualizacao_jogos`, `usuario_id`, `bool_ativo_jogos`) VALUES ( 1, 'teset', 1, 2, '5-3', '2018-02-22 10:10:30', 1, 1);



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
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'jogadores+jogo_atual+jogos+historico_jogo-jogos+upload+mapa+mov+pdf+notif+usuario', '2018-02-22 10:05:09', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 2, 'Nível 2', 'jogadores+jogo_atual+jogos+historico_jogo-jogos+upload+mov+pdf+notif+usuario', '2018-02-22 10:20:39', 1, 1);



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
	`tipo_alteracao_notificacoes_config` enum('insert','update','delete') NOT NULL ,
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
	`tipo_alteracao_notificacoes_config` varchar(50) NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT 1 
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


-- Dados da tabela: 
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 1, 'historico_jogo', '2018-02-22 10:05:25', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 2, 'jogadores', '2018-02-22 10:05:25', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 3, 'jogo_atual', '2018-02-22 10:05:25', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 4, 'jogos', '2018-02-22 10:05:25', 1);



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
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 3, 'CONSOLE', 'CON', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 2, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 4, 'APLICAÇÃO', 'APL', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 2, 1);