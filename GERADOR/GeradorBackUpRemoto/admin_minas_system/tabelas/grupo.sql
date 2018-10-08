
-- Criar tabela grupo
-- Gerando em: 01/08/2018 16:54:43
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE IF NOT EXISTS `grupo` (
	`id_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_grupo` char(50) NOT NULL ,
	`data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11)  ,
	`bool_ativo_grupo` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Alarmes', '2018-02-05 16:37:46', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Automação', '2018-02-05 17:43:36', 1, 0
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 3, 'Nobreak e Baterias', '2018-02-06 10:44:09', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 4, 'Cabos', '2018-01-25 08:43:25', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 5, 'CFTV', '2018-01-25 08:43:37', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 6, 'Acessórios', '2018-02-05 16:26:00', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 7, 'Controle de Acesso', '2018-01-25 08:44:35', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 8, 'Fechaduras', '2018-02-05 17:14:37', 1, 0
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 9, 'Ferramentas', '2018-02-05 17:43:47', 1, 0
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 10, 'Informática', '2018-02-05 17:44:10', 1, 0
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 11, 'Interfonia', '2018-02-05 17:43:58', 1, 0
);