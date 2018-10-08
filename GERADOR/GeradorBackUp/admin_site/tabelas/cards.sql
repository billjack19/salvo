
-- Criar tabela cards
-- Gerando em: 01/08/2018 16:52:43
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cards`;

CREATE TABLE IF NOT EXISTS `cards` (
	`id_cards` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_cards` varchar(100) NOT NULL ,
	`descricao_cards` text  ,
	`imagem_cards` varchar(100) NOT NULL ,
	`data_atualizacao_cards` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_cards` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 1, 'Teste', 'teste', 'cacamba_de_entulho.png', '2018-01-09 16:15:04', 1
);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 2, 'Teste 2', 'test', 'fundo-slideshow-home.jpg', '2018-01-08 15:05:16', 1
);