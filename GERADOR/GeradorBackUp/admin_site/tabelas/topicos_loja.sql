
-- Criar tabela topicos_loja
-- Gerando em: 01/08/2018 16:52:46
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `topicos_loja`;

CREATE TABLE IF NOT EXISTS `topicos_loja` (
	`id_topicos_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_topicos_loja` varchar(100) NOT NULL ,
	`descricao_topicos_loja` varchar(100) NOT NULL ,
	`loja_id` int(11) NOT NULL ,
	`data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 1, 'Endereço', 'Teste', 1, '2018-01-08 08:48:36', 1
);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 2, 'Telefone', 'Teste', 1, '2018-01-08 08:49:06', 1
);