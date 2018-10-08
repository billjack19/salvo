
-- Criar tabela console
-- Gerando em: 01/08/2018 16:54:06
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `console`;

CREATE TABLE IF NOT EXISTS `console` (
	`id_console` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_console` varchar(150) NOT NULL ,
	`data_atualizacao_console` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_console` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO console ( `id_console`, `descricao_console`, `data_atualizacao_console`, `usuario_id`, `bool_ativo_console`) VALUES ( 1, 'PS2', '2018-01-23 10:01:34', 1, 1
);
INSERT INTO console ( `id_console`, `descricao_console`, `data_atualizacao_console`, `usuario_id`, `bool_ativo_console`) VALUES ( 2, 'PC', '2018-01-23 11:02:59', 1, 1
);
INSERT INTO console ( `id_console`, `descricao_console`, `data_atualizacao_console`, `usuario_id`, `bool_ativo_console`) VALUES ( 3, 'PS1', '2018-03-14 14:51:48', 1, 1
);