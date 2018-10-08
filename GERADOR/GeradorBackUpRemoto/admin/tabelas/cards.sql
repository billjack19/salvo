
-- Criar tabela cards
-- Gerando em: 01/08/2018 16:52:02
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cards`;

CREATE TABLE IF NOT EXISTS `cards` (
	`id_cards` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_cards` varchar(100) NOT NULL ,
	`descricao_cards` varchar(200)  ,
	`imagem_cards` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_cards` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_cards` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 1, 'Construção e Reforma', '', 'card1.jpg', 1, '2018-01-09 13:46:34', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 2, 'Casa e Escritório', '', 'card2.jpg', 1, '2018-01-02 10:38:02', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 3, 'Iluminação e decoração', '', 'card3.jpg', 1, '2018-01-02 10:38:40', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 4, 'teste', 'milton', 'Tulips.jpg', 1, '2018-01-10 09:51:23', 0
);