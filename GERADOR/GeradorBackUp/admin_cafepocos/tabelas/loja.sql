
-- Criar tabela loja
-- Gerando em: 01/08/2018 16:53:39
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `loja`;

CREATE TABLE IF NOT EXISTS `loja` (
	`id_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_loja` varchar(100) NOT NULL ,
	`descricao_loja` varchar(100)  ,
	`imagem_loja` varchar(100)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_loja` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO loja ( `id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES ( 1, 'A 60 anos armazenando seu café com a qualidade que só a CaféPoços possui!', '', '60.jpg', 1, '2018-01-12 15:42:43', 1
);