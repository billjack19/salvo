
-- Criar tabela destaque_grupo
-- Gerando em: 01/08/2018 16:54:42
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `destaque_grupo`;

CREATE TABLE IF NOT EXISTS `destaque_grupo` (
	`id_destaque_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_destaque_grupo` varchar(100) NOT NULL ,
	`grupo_id` int(11) NOT NULL ,
	`imagem_destaque_grupo` varchar(100) NOT NULL ,
	`descricao_destaque_grupo` varchar(300)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_destaque_grupo` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_destaque_grupo` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 1, 'Alarmes', 1, 'Alarmes-ultra (2).png', '', 1, '2018-02-08 11:03:08', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 2, 'Automação', 2, 'Automacao.jpg', '', 1, '2018-01-25 16:06:36', 0
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 3, 'Nobreak e Baterias', 3, 'bateria_nobreak.jpg', '', 1, '2018-02-19 15:00:18', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 4, 'Cabos', 4, 'Cabos.jpg', '', 1, '2018-02-08 11:18:41', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 5, 'CFTV', 5, 'CFTV2.png', '', 1, '2018-02-06 17:39:51', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 6, 'Acessórios', 6, 'acessorios.jpg', '', 1, '2018-02-08 11:13:31', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 7, 'Controle de Acesso', 7, 'controle-de-acesso-gsproxct.png', '', 1, '2018-02-05 16:42:48', 1
);