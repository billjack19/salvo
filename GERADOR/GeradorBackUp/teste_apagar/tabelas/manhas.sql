
-- Criar tabela manhas
-- Gerando em: 01/08/2018 16:54:07
-- Pelo Gerador JK-19

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
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 1, 'xyz', 'Ti tonar imortal', 1, '2018-02-19 10:21:56', 1, 1
);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 2, 'xasd', 'Fatality', 2, '2018-01-23 11:02:17', 1, 1
);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 3, 'qwrer', 'Brutality', 2, '2018-01-23 11:02:49', 1, 1
);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 4, 'qweasd', 'Pack de armas', 3, '2018-01-23 11:03:32', 1, 1
);
INSERT INTO manhas ( `id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES ( 5, 'teste', 'isso ai', 1, '2018-02-19 10:21:01', 1, 1
);