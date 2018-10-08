
-- Backup Geral
-- Gerando em: 01/08/2018 16:54:04
-- Pelo Gerador JK-19




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: aluno
DROP TABLE IF EXISTS `aluno`;

CREATE TABLE IF NOT EXISTS `aluno` (
	`id_aluno` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_aluno` varchar(100) NOT NULL ,
	`data_nascimento_aluno` date NOT NULL ,
	`sexo_aluno` enum('Masculino','Feminino') NOT NULL ,
	`data_atualizacao_aluno` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_aluno` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 1, 'Jack Biller', '1997-11-19', 'Masculino', '2018-01-26 11:51:04', 1, 1);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 2, 'Teste', '1998-05-24', 'Masculino', '2018-02-19 09:57:40', 1, 0);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 3, 'Jack Teste', '1997-11-19', 'Masculino', '2018-03-12 10:06:05', 1, 1);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 4, 'Jack Teste', '1997-11-19', 'Masculino', '2018-03-12 10:08:21', 1, 1);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 5, 'Jack Teste Apagar', '1997-11-19', 'Masculino', '2018-03-12 10:14:09', 1, 1);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 6, 'Fulando', '1999-12-15', 'Masculino', '2018-03-27 08:47:23', 1, 1);
INSERT INTO aluno ( `id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES ( 7, 'Teste Data Nascimento Notificação', '2005-12-13', 'Masculino', '2018-03-27 09:12:38', 1, 1);



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
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 1, 'aluno', 'Aluno', 1, 1, 1, 1, '2018-04-18 09:36:55', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 2, 'console', 'Console', 1, 1, 1, 1, '2018-04-18 09:36:55', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 3, 'genero', 'Género', 1, 1, 1, 1, '2018-04-18 09:36:55', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 4, 'jogo', 'Jogo', 1, 1, 1, 1, '2018-04-18 09:36:55', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 5, 'livro', 'Livro', 1, 1, 1, 1, '2018-04-18 09:36:55', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 6, 'manhas', 'Manhas', 1, 1, 1, 1, '2018-04-18 09:36:55', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 7, 'objetivos', 'Objetivos', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 8, 'operacao_data', 'Operação Data', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 9, 'operacao_teste', 'Operação Teste', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 10, 'prefixos', 'Prefixos', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 11, 'manhas-jogo', 'Manhas - Jogo', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 12, 'jogo-console', 'Jogo - Console', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 13, 'upload', 'Upload', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 14, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 15, 'mov', 'Mov', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 16, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 17, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 18, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-04-18 09:36:56', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 19, 'livro', 'Livro', 1, 1, 1, 50, '2018-04-18 10:10:10', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 20, 'genero', 'Género', 1, 1, 1, 50, '2018-04-18 10:10:10', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 21, 'aluno', 'Aluno', 1, 1, 1, 50, '2018-04-18 10:10:10', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 22, 'livro', 'Livro', 1, 1, 1, 51, '2018-04-18 16:10:38', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 23, 'genero', 'Género', 1, 1, 1, 51, '2018-04-18 16:10:38', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 24, 'aluno', 'Aluno', 1, 1, 1, 51, '2018-04-18 16:10:39', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 25, 'console', 'Console', 1, 0, 0, 51, '2018-04-18 16:10:39', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: console
DROP TABLE IF EXISTS `console`;

CREATE TABLE IF NOT EXISTS `console` (
	`id_console` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_console` varchar(150) NOT NULL ,
	`data_atualizacao_console` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_console` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO console ( `id_console`, `descricao_console`, `data_atualizacao_console`, `usuario_id`, `bool_ativo_console`) VALUES ( 1, 'PS2', '2018-01-23 10:01:34', 1, 1);
INSERT INTO console ( `id_console`, `descricao_console`, `data_atualizacao_console`, `usuario_id`, `bool_ativo_console`) VALUES ( 2, 'PC', '2018-01-23 11:02:59', 1, 1);
INSERT INTO console ( `id_console`, `descricao_console`, `data_atualizacao_console`, `usuario_id`, `bool_ativo_console`) VALUES ( 3, 'PS1', '2018-03-14 14:51:48', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: genero
DROP TABLE IF EXISTS `genero`;

CREATE TABLE IF NOT EXISTS `genero` (
	`id_genero` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_genero` varchar(150) NOT NULL ,
	`data_atualizacao_genero` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_genero` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO genero ( `id_genero`, `descricao_genero`, `data_atualizacao_genero`, `usuario_id`, `bool_ativo_genero`) VALUES ( 1, 'Comédia', '2018-04-14 08:53:47', 1, 1);
INSERT INTO genero ( `id_genero`, `descricao_genero`, `data_atualizacao_genero`, `usuario_id`, `bool_ativo_genero`) VALUES ( 2, 'Terror', '2018-01-30 08:18:09', 1, 1);
INSERT INTO genero ( `id_genero`, `descricao_genero`, `data_atualizacao_genero`, `usuario_id`, `bool_ativo_genero`) VALUES ( 3, 'Ficção Científica', '2018-04-13 15:14:56', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: itensvenda
DROP TABLE IF EXISTS `itensvenda`;

CREATE TABLE IF NOT EXISTS `itensvenda` (
	`id_ItensVenda` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`Produto_itensvenda` varchar(3) NOT NULL ,
	`Quantidade_itensvenda` int(11) NOT NULL ,
	`data_atualizacao_ItensVenda` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_ItensVenda` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: jogo
DROP TABLE IF EXISTS `jogo`;

CREATE TABLE IF NOT EXISTS `jogo` (
	`id_jogo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_jogo` varchar(150) NOT NULL ,
	`console_id` int(150) NOT NULL ,
	`data_atualizacao_jogo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_jogo` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO jogo ( `id_jogo`, `descricao_jogo`, `console_id`, `data_atualizacao_jogo`, `usuario_id`, `bool_ativo_jogo`) VALUES ( 1, 'Gta', 1, '2018-01-23 10:01:48', 1, 1);
INSERT INTO jogo ( `id_jogo`, `descricao_jogo`, `console_id`, `data_atualizacao_jogo`, `usuario_id`, `bool_ativo_jogo`) VALUES ( 2, 'Mortal Kombat', 1, '2018-01-23 11:02:02', 1, 1);
INSERT INTO jogo ( `id_jogo`, `descricao_jogo`, `console_id`, `data_atualizacao_jogo`, `usuario_id`, `bool_ativo_jogo`) VALUES ( 3, 'GTA', 2, '2018-01-23 11:03:14', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: livro
DROP TABLE IF EXISTS `livro`;

CREATE TABLE IF NOT EXISTS `livro` (
	`id_livro` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_livro` varchar(200) NOT NULL ,
	`codigo_livro` varchar(150) NOT NULL ,
	`genero_id` int(200) NOT NULL ,
	`data_atualizacao_livro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_livro` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 1, 'O livro', '123', 1, '2018-01-23 08:05:42', 1, 1);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 2, 'O Livro Assombrado', '465', 2, '2018-01-23 08:06:05', 1, 1);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 3, 'O poema misterioso', '1542', 2, '2018-03-27 08:10:41', 1, 1);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 4, 'Teoria de tudo', '1956', 3, '2018-04-13 15:15:08', 1, 1);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 5, 'Meia Noite e Meia', '548546', 1, '2018-04-14 09:11:47', 1, 1);
INSERT INTO livro ( `id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES ( 6, 'Só pra Variar', '458462', 1, '2018-04-14 08:53:04', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: manhas
DROP TABLE IF EXISTS `manhas`;

CREATE TABLE IF NOT EXISTS `manhas` (
	`id_manhas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`manha_manhas` varchar(100) NOT NULL ,
	`descricao_manhas` varchar(150) NOT NULL ,
	`jogo_id` int(150) NOT NULL ,
	`data_atualizacao_manhas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_manhas` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 1, 'xyz', 'Ti tonar imortal', 1, '2018-02-19 10:21:56', 1, 1);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 2, 'xasd', 'Fatality', 2, '2018-01-23 11:02:17', 1, 1);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 3, 'qwrer', 'Brutality', 2, '2018-01-23 11:02:49', 1, 1);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 4, 'qweasd', 'Pack de armas', 3, '2018-01-23 11:03:32', 1, 1);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 5, 'teste', 'isso ai', 1, '2018-02-19 10:21:01', 1, 1);



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
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nível Administrador', 'aluno+console+genero+jogo+livro+manhas+objetivos+operacao_data+operacao_teste+prefixos+manhas-jogo+jogo-console+upload+mapa+mov+relatorio+notificacao+usuario', '2018-04-16 15:08:36', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 2, 'Nível de Aluno', 'aluno+livro', '2018-01-31 10:17:30', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 3, 'Nível Para Vídeo Game', 'console+jogo+manhas-jogo+jogo-console+pdf', '2018-01-31 10:17:37', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 4, 'Ajudante de Jogador', 'console+jogo', '2018-01-29 12:00:41', 7, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 50, 'Nível para Biblioteca', '', '2018-04-18 10:10:10', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 51, 'Teste', '', '2018-04-18 16:10:37', 1, 1);



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
	`area_notificacoes_config` varchar(100) NOT NULL ,
	`tipo_alteracao_notificacoes_config` varchar(100) NOT NULL ,
	`data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 1, 'jogo', 'I+U', '2018-02-08 15:36:49', 1, 1);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 2, 'manhas', 'I+U', '2018-03-12 08:12:47', 1, 1);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 3, 'console', 'I+U', '2018-03-12 08:13:17', 1, 1);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 4, 'livro', 'I', '2018-03-12 08:33:07', 1, 1);
INSERT INTO notificacoes_config ( `id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES ( 5, 'aluno', 'I+U', '2018-03-12 10:09:44', 1, 1);



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
	`tipo_alteracao_notificacoes_salvas` enum('i','u','d') NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 1, 'Descrição => PS1<br>Usuário Id => 1<br>Bool Ativo => 1<br>', '1', '1', 'i', 3, '2018-03-27 08:27:02', 1);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 2, '<b>Aréa de Atuação: </b>livro<br><b>Registro inserido:</b><br>Descrição => Teoria de tudo<br>Código => 1956<br>Género => /%/SELECT * FROM genero WHERE id_genero = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 4, '2018-03-27 08:42:18', 1);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 3, '<b>Aréa de Atuação: </b>aluno<br><b>Registro inserido:</b><br>Nome => Teste Data Nascimento Notificação<br>Data Nascimento => 13/12/2005<br>Sexo => Masculino<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 5, '2018-04-14 08:17:34', 1);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 4, '<b>Aréa de Atuação: </b>livro<br><b>Registro inserido:</b><br>Descrição => Meia Noite<br>Código => 548546<br>Género => /%/SELECT * FROM genero WHERE id_genero = 2/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 4, '2018-04-14 08:36:55', 1);
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 5, '<b>Aréa de Atuação: </b>livro<br><b>Registro inserido:</b><br>Descrição => Só pra Variar<br>Código => 458462<br>Género => /%/SELECT * FROM genero WHERE id_genero = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 4, '2018-04-14 08:54:10', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: objetivos
DROP TABLE IF EXISTS `objetivos`;

CREATE TABLE IF NOT EXISTS `objetivos` (
	`id_objetivos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_objetivos` varchar(200) NOT NULL ,
	`descricao_objetivos` text NOT NULL ,
	`data_atualizacao_objetivos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_objetivos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 1, 'Gráficos por valor', 'Vou determinar que uma tabela com campo de valor numérico possa renderizar gráfico a partir de seu histórico<br><br>
Pre requisitos: tabela de logs com trigers pre programadas', '2018-01-31 13:21:33', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 2, 'Foto pela webcam do pc', 'Cadastrar nome de fotos tiradas pela webcam do pc e ser capas de tirar e armazena-la no servidor', '2018-01-31 13:22:46', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 3, 'Interfase SO', 'Objetivo de deixar um rodapé fixo na tela com um batão capaz de pesquisar qualquer coisa no sistema e ti levando ao acesso a ela sem precisar de mouse, somente no teclado<br>
Além de ícones na pagina principal do sistemas cadastrados pelo próprio usuário', '2018-01-31 13:25:36', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 4, 'Tabela de log', 'tem como finalidade registrar informação anterior a da atualizada', '2018-02-07 08:22:06', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 5, 'Responsividade de tabela', 'deixar as tabelas mais flexíveis na tela em que esta sendo projetada', '2018-03-22 17:43:55', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 6, 'Tabela Cabeçario', 'Tem por objetivo definir algumas pre configurações nos heads de relatórios', '2018-01-31 13:28:06', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 7, 'Movimentação de arquivo', 'O sistema conseguira manipular arquivos do servidor de maneira mais fácil e intuitiva
<br><br>
Em andamento<br>
Falta fazer para arquivos de vídeo, áudio e texto', '2018-02-07 08:23:57', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 8, 'Multiplos Uploads', 'A ideia é poder fazer mais de um upload por vez', '2018-01-31 13:29:41', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 9, 'Preenchimento automatico de campos', 'O sistema através de uma data poderá preencher automaticamente um campo', '2018-03-22 17:42:46', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 10, 'Logica de negócio', 'O sistema será capaz de executar operações entre campos da tabela e preenche outro campo com o resultado', '2018-02-05 09:48:20', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 11, 'Filtro no cabeçalho da tabela', 'Clicando no cabeçalho ele ordenará os registros de acordo com o cabeçalho, se tiver com seta pra cima ordenará em ordem decrescente e com a seta para baixo ordenará em ordem crescente', '2018-01-31 13:53:09', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 12, 'Mascaras', 'Setar mascaras nos campos', '2018-01-31 14:01:47', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 13, 'Busca por busca', 'Tem um campo e pelo valor desse campo você limita valor de outro campo', '2018-02-15 17:51:55', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 14, 'numerador de registros', 'coluna de numero numerando registro por registro', '2018-01-31 15:16:08', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 15, 'Notificação', 'avisar registros cadastrados recentemente ou registros proximo de uma determinada data', '2018-04-14 08:12:38', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 16, 'Limitar campo numerico', 'Bug para corrigir, nos campos de tipo \'number\' pode-se digitar a quantidade de números que quiser', '2018-02-07 08:48:57', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 17, 'Campo Único por Substituição', 'Definir um campo único por substituição quer dizer que os valores dessas coluna não podem se repetir, porém quando cadastrado se houver este valor o mesmo será substituído pelo valor que esta no registro alterando ou por um outro valor novo se for cadastro', '2018-02-07 08:15:46', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 18, 'Logica de negócio 2', 'O sistema será capaz de realizar cálculos entre datas, como diferença em dias entre duas datas ou uma data com acrecemo ou decréscimo de dias', '2018-02-07 08:20:31', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 19, 'Paginação', 'As tabelas serem limitas a um número de registro por vez', '2018-02-07 13:09:39', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 20, 'Visualização de Registro', 'Icone para mostrar num modal os dados desse registro com grades se tiver', '2018-02-07 13:12:02', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 21, 'Criptografia', 'Selecionar campos que antes de serem salvos passarem por um criptografia hardcoud', '2018-03-22 17:54:38', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 22, 'Registro de Monitoramento', 'É uma simulação de tempo real sobre um registro
<br>
Por exemplo: Uma consulta de medico a um paciente. No caso o medico teria em sua mesa um sistema onde ele abriria a ficha desse paciente e já teria todos os dados desse paciente, podendo lançar novos dados', '2018-02-19 10:12:34', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 23, 'Chat Suporte', 'Tem um chat interno para tirar duvidas de funcionalidades', '2018-07-27 08:24:48', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 24, 'Tirar Duvidas', 'Projeto independente para tirar duvidas no caso é um sistema de perguntas e respostas que será integrado na forma de lista dinamicamente nos sistemas
<br><br>
Com a exemplo pode ter uma área para demostração de comandos e teclas de atalho
tambem', '2018-07-27 08:28:40', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 25, 'Ocultar arquivos inativos', 'Opção para ocultar arquivos inativos.
<br>
Palavra chave: FILTRO', '2018-07-27 08:30:38', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 26, 'Melhoria na forma de requisição', 'A requisição deve retornar um texto na sintaxe de um objeto JSON pela função toJson() em PHP', '2018-07-27 08:33:34', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: operacao_data
DROP TABLE IF EXISTS `operacao_data`;

CREATE TABLE IF NOT EXISTS `operacao_data` (
	`id_operacao_data` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`data_1_operacao_data` date NOT NULL ,
	`data_2_operacao_data` int(11) NOT NULL ,
	`resultado_data_operacao_data` date NOT NULL ,
	`data_atualizacao_operacao_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_operacao_data` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: operacao_teste
DROP TABLE IF EXISTS `operacao_teste`;

CREATE TABLE IF NOT EXISTS `operacao_teste` (
	`id_operacao_teste` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`valor_1_operacao_teste` int(11) NOT NULL ,
	`valor_2_operacao_teste` int(11) NOT NULL ,
	`resultado_operacao_teste` int(11) NOT NULL ,
	`valor_3_operacao_teste` int(11) NOT NULL ,
	`valor_4_operacao_teste` int(11) NOT NULL ,
	`resultado_2_operacao_teste` int(11) NOT NULL ,
	`resultado_final_operacao_teste` int(11) NOT NULL ,
	`data_atualizacao_operacao_teste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_operacao_teste` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO operacao_teste ( `id_operacao_teste`, `valor_1_operacao_teste`, `valor_2_operacao_teste`, `resultado_operacao_teste`, `valor_3_operacao_teste`, `valor_4_operacao_teste`, `resultado_2_operacao_teste`, `resultado_final_operacao_teste`, `data_atualizacao_operacao_teste`, `usuario_id`, `bool_ativo_operacao_teste`) VALUES ( 1, 150, 20, 120, 30, 50, 2, 0, '2018-02-01 14:34:11', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: prefixos
DROP TABLE IF EXISTS `prefixos`;

CREATE TABLE IF NOT EXISTS `prefixos` (
	`id_prefixos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`prefixo_prefixos` varchar(200) NOT NULL ,
	`descricao_prefixos` text NOT NULL ,
	`data_atualizacao_prefixos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_prefixos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 1, 'imagem', 'Serve para referenciar nome de uma imagem no servidor', '2018-01-31 13:13:40', 1, 1);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 2, 'video', 'Serve para referenciar um arquivo de vídeo no servidor', '2018-01-31 13:14:07', 1, 1);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 3, 'audio', 'Serve para referenciar um arquivo de audio no servidor', '2018-01-31 13:14:31', 1, 1);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 4, 'texto', 'Serve para referenciar um arquivo de texto no servidor', '2018-01-31 13:14:58', 1, 1);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 5, 'bool', 'É um campo de verdadeiro ou falso.<br>
Sua formação é de int(1) prédefinido com 1, este campo só recebe valor 1 ou 0 sendo que o 1 serve para verdadeiro e o 0 para falso', '2018-01-31 13:16:40', 1, 1);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 6, 'senha', 'Este campo aparece somente no cadastro e do tipo password, para ser alterado é preciso estar logado ou ter acesso direto ao banco de dados', '2018-01-31 13:18:14', 1, 1);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 7, 'status', 'Prefixo para identificar quando um campo será alterado dinamicamente (por triggers)<br>
Também é mostrado somente no cadastro.<br>
Se precisar alterar este registro tem que ter acesso direto ao banco de dados', '2018-04-16 13:35:40', 1, 1);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 8, 'mapa', 'Prefixo que indica que será preciso um mapa para achar geolocalização e cadastrar este campo
(Ideia inicial era de um modal com um mapa onde iria o usuário iria clicar na área do mapa e já iria puxar a latitude e longitude)', '2018-07-27 08:18:41', 1, 0);
INSERT INTO prefixos ( `id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES ( 9, 'foto', 'prefixo que indica que o campo deve abrir a webcam do computador e tirar uma foto', '2018-07-27 08:18:30', 1, 0);



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
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 1, 'aluno', '2018-04-18 09:36:55', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 2, 'console', '2018-04-18 09:36:55', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 3, 'jogo', '2018-04-18 09:36:55', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 4, 'livro', '2018-04-18 09:36:55', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 5, 'manhas', '2018-04-18 09:36:55', 1);



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
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 2, 'Relatório de Manhas de Jogos', 'manhas', 'manha_manhas+descricao_manhas', 'manhas_tr_jogo_tr_descricao_jogo+jogo_tr_console_tr_descricao_console+manhas_tr_usuario_tr_nome_usuario', ' AND (jogo.descricao_jogo LIKE \'%Gta%\') AND (console.descricao_console LIKE \'%PC%\')', 1, '2018-01-26 11:39:47', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 6, 'Relatório de Livros', 'livro', 'descricao_livro+codigo_livro+data_atualizacao_livro', 'livro_tr_genero_tr_descricao_genero+livro_tr_usuario_tr_nome_usuario', '', 1, '2018-01-23 15:31:12', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 7, 'teste', 'aluno', 'nome_aluno+data_nascimento_aluno+sexo_aluno', 'aluno_tr_usuario_tr_nome_usuario+aluno_tr_usuario_tr_login_usuario', '', 1, '2018-01-24 14:25:19', 1, 0, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: teste_gatilho
DROP TABLE IF EXISTS `teste_gatilho`;

CREATE TABLE IF NOT EXISTS `teste_gatilho` (
	`id_teste_gatilho` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`Referencia_teste_gatilho` varchar(3) NOT NULL ,
	`Descricao_teste_gatilho` varchar(50) NOT NULL ,
	`Estoque_teste_gatilho` int(11) NOT NULL ,
	`data_atualizacao_teste_gatilho` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_teste_gatilho` int(11) NOT NULL DEFAULT 1 
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
	`nivel_acesso_id` int(11)  DEFAULT 1 ,
	`bool_ativo_usuario` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 3, 'JACK', 'JAC', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 7, 'JOGADOR', 'JOG', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 3, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 8, 'Ajudante de Jogador', 'AJJ', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 4, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 9, 'Bibliotecaria', 'BIB', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 50, 1);