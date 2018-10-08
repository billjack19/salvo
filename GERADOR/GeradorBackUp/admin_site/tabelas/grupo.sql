
-- Criar tabela grupo
-- Gerando em: 01/08/2018 16:52:45
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
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Teste', '2018-01-06 09:33:45', 1, 1
);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Teste Grupo', '2018-01-06 09:47:16', 1, 1
);