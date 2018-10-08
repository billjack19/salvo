
-- Criar tabela teste_grade
-- Gerando em: 01/08/2018 16:53:40
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `teste_grade`;

CREATE TABLE IF NOT EXISTS `teste_grade` (
	`id_teste_grade` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_teste_grade` varchar(200) NOT NULL ,
	`teste_id` int(200) NOT NULL ,
	`data_atualizacao_teste_grade` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_teste_grade` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO teste_grade ( `id_teste_grade`, `descricao_teste_grade`, `teste_id`, `data_atualizacao_teste_grade`, `usuario_id`, `bool_ativo_teste_grade`) VALUES ( 1, 'teste', 1, '2018-01-22 10:07:24', 1, 1
);
INSERT INTO teste_grade ( `id_teste_grade`, `descricao_teste_grade`, `teste_id`, `data_atualizacao_teste_grade`, `usuario_id`, `bool_ativo_teste_grade`) VALUES ( 2, 'teste 2', 1, '2018-01-22 10:08:23', 1, 1
);
INSERT INTO teste_grade ( `id_teste_grade`, `descricao_teste_grade`, `teste_id`, `data_atualizacao_teste_grade`, `usuario_id`, `bool_ativo_teste_grade`) VALUES ( 3, 'Teste grade 2', 2, '2018-01-22 10:17:20', 1, 1
);