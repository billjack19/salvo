
-- Criar tabela destaque_grupo
-- Gerando em: 01/08/2018 16:51:34
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
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 1, 'Cabos Atox', 2, 'cabo.jpg', '', 1, '2018-01-02 16:09:31', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 2, 'Luminária Pública', 8, 'luminarias.png', '', 1, '2018-01-02 16:51:49', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 3, 'Chaves e Fusíveis', 4, 'fusiveis.jpg', '', 1, '2018-01-02 16:52:36', 1
);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 4, 'Canaletas e Acessórios', 3, 'fundo3.jpg', '', 1, '2018-01-05 14:32:56', 0
);