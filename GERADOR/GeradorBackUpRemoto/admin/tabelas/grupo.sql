
-- Criar tabela grupo
-- Gerando em: 01/08/2018 16:52:05
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
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Automação e Controle', '2017-12-29 00:00:00', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Cabos Atox', '2017-12-29 00:00:00', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 3, 'Canaletas e Acessórios', '2017-12-22 10:01:36', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 4, 'Chaves e Fusíveis', '2017-12-22 10:01:36', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 5, 'Conduletes e Caixas', '2017-12-22 10:01:36', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 6, 'Disjuntores', '2017-12-29 00:00:00', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 7, 'Eletrocalhas', '2017-12-29 00:00:00', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 8, 'Luminária Pública', '2017-12-29 00:00:00', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 9, 'Para-raio e Acessórios para Aterramento', '2017-12-22 10:01:36', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 10, 'Quadros de Comando', '2017-12-29 00:00:00', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 11, 'Teleinformática e Telefonia', '2017-12-22 10:01:36', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 12, 'Terminais', '2017-12-29 00:00:00', 1, 1
);