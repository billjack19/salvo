
-- Criar tabela itensvenda
-- Gerando em: 01/08/2018 16:54:06
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `itensvenda`;

CREATE TABLE IF NOT EXISTS `itensvenda` (
	`id_ItensVenda` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`Produto_itensvenda` varchar(3) NOT NULL ,
	`Quantidade_itensvenda` int(11) NOT NULL ,
	`data_atualizacao_ItensVenda` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_ItensVenda` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro