
-- Criar tabela slide_show
-- Gerando em: 01/08/2018 16:53:40
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `slide_show`;

CREATE TABLE IF NOT EXISTS `slide_show` (
	`id_slide_show` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_slide_show` varchar(100)  ,
	`descricao_slide_show` varchar(200)  ,
	`imagem_slide_show` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_slide_show` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_slide_show` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 1, 'ARMAZENAMENTO', 'Aqui você deposita seu café e a sua confiança! Seu café muito bem protegido e armazenado.', 'fundo1.jpeg', 1, '2018-01-12 15:31:06', 1
);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 2, 'CERTIFICAÇÕES', 'Nossos cafés possuem as melhores certificações internacionais.', 'fundo2.jpg', 1, '2018-01-12 15:31:32', 1
);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 3, 'SUSTENTABILIDADE', 'Sustentabilidade. proteção ambiental e responsabilidade social', 'fundo3.jpg', 1, '2018-01-12 15:36:08', 1
);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 4, 'Teste', 'teste', 'loja.png', 1, '2018-01-05 14:34:57', 0
);