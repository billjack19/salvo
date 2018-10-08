
-- Criar tabela cards
-- Gerando em: 01/08/2018 16:49:40
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
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 1, 'Construção e Reforma', '', 'card1.jpg', 1, '2018-01-10 10:15:17', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 2, 'Casa e Escritório', '', 'card3.jpg', 1, '2018-01-09 08:17:46', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 3, 'Iluminação e decoração', '', 'card2.jpg', 1, '2018-01-09 08:18:08', 1
);