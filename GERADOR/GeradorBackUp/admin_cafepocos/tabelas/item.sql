
-- Criar tabela item
-- Gerando em: 01/08/2018 16:53:39
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(300) NOT NULL ,
	`descricao_site_item` varchar(300)  ,
	`unidade_medida_item` varchar(3)  ,
	`imagem_item` varchar(200) NOT NULL ,
	`grupo_id` int(11)  ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'teste', 'teste', 'UN', 'Logotipo.jpg', 4, 1, 0
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Cabos Atox', '', 'UN', 'cabo.jpg', 2, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 3, 'Chaves e Fusíveis', '', 'UN', 'fusiveis.jpg', 4, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 4, 'Luminária Pública', '', 'UN', 'luminarias.png', 8, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 5, 'Botões', 'Para seus projetos com tomadas de decisão entre outros', 'UN', 'botoes.jpg', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 6, 'Chave Comutadora', '', 'UN', 'chave-comutadora.jpg', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 7, 'Contator', 'Contator', 'UN', 'contator.jpg', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 8, 'Contator', '', 'UN', 'contator.jpg', 7, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 9, 'Cabo Atox', '', 'MT', 'cabo-atox.jpg', 2, 1, 1
);