
-- Criar tabela jogo
-- Gerando em: 01/08/2018 16:54:06
-- Pelo Gerador JK-19

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
INSERT INTO jogo ( `id_jogo`, `descricao_jogo`, `console_id`, `data_atualizacao_jogo`, `usuario_id`, `bool_ativo_jogo`) VALUES ( 1, 'Gta', 1, '2018-01-23 10:01:48', 1, 1
);
INSERT INTO jogo ( `id_jogo`, `descricao_jogo`, `console_id`, `data_atualizacao_jogo`, `usuario_id`, `bool_ativo_jogo`) VALUES ( 2, 'Mortal Kombat', 1, '2018-01-23 11:02:02', 1, 1
);
INSERT INTO jogo ( `id_jogo`, `descricao_jogo`, `console_id`, `data_atualizacao_jogo`, `usuario_id`, `bool_ativo_jogo`) VALUES ( 3, 'GTA', 2, '2018-01-23 11:03:14', 1, 1
);