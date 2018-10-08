
-- Criar tabela destaque
-- Gerando em: 01/08/2018 16:52:44
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `destaque`;

CREATE TABLE IF NOT EXISTS `destaque` (
	`id_destaque` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_destaque` varchar(100) NOT NULL ,
	`grupo_id` int(11) NOT NULL ,
	`imagem_destaque` varchar(100) NOT NULL ,
	`data_atualizacao_destaque` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_destaque` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO destaque ( `id_destaque`, `descricao_destaque`, `grupo_id`, `imagem_destaque`, `data_atualizacao_destaque`, `bool_ativo_destaque`) VALUES ( 1, 'Teste', 1, 'grupo_teste.png', '2018-01-08 08:54:40', 1
);
INSERT INTO destaque ( `id_destaque`, `descricao_destaque`, `grupo_id`, `imagem_destaque`, `data_atualizacao_destaque`, `bool_ativo_destaque`) VALUES ( 2, 'teste', 1, 'ferramentas_administrativas.png', '2018-01-10 17:07:57', 1
);