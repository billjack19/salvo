
-- Criar tabela loja
-- Gerando em: 01/08/2018 16:52:45
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `loja`;

CREATE TABLE IF NOT EXISTS `loja` (
	`id_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_loja` varchar(100) NOT NULL ,
	`descricao_loja` text NOT NULL ,
	`data_atualizacao_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO loja ( `id_loja`, `titulo_loja`, `descricao_loja`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES ( 1, 'Visite Nossa Loja', 'Aguardamos sua visita!', '2018-01-10 16:24:40', 1
);
INSERT INTO loja ( `id_loja`, `titulo_loja`, `descricao_loja`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES ( 2, 'Teste', 'teste', '2018-01-10 16:24:06', 0
);