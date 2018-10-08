
-- Criar tabela teste
-- Gerando em: 01/08/2018 16:53:40
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `teste`;

CREATE TABLE IF NOT EXISTS `teste` (
	`id_teste` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_teste` varchar(200) NOT NULL ,
	`data_atualizacao_teste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_teste` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 1, 'teste', '2018-01-22 10:07:17', 1, 1
);
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 2, 'Teste 2', '2018-01-22 10:16:00', 1, 1
);
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 3, 'Teste 3', '2018-01-22 10:16:05', 1, 1
);
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 4, 'Teste 4', '2018-01-22 10:16:10', 1, 1
);