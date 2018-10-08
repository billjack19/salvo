
-- Criar tabela genero
-- Gerando em: 01/08/2018 16:54:06
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `genero`;

CREATE TABLE IF NOT EXISTS `genero` (
	`id_genero` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_genero` varchar(150) NOT NULL ,
	`data_atualizacao_genero` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_genero` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO genero ( `id_genero`, `descricao_genero`, `data_atualizacao_genero`, `usuario_id`, `bool_ativo_genero`) VALUES ( 1, 'Comédia', '2018-04-14 08:53:47', 1, 1
);
INSERT INTO genero ( `id_genero`, `descricao_genero`, `data_atualizacao_genero`, `usuario_id`, `bool_ativo_genero`) VALUES ( 2, 'Terror', '2018-01-30 08:18:09', 1, 1
);
INSERT INTO genero ( `id_genero`, `descricao_genero`, `data_atualizacao_genero`, `usuario_id`, `bool_ativo_genero`) VALUES ( 3, 'Ficção Científica', '2018-04-13 15:14:56', 1, 1
);