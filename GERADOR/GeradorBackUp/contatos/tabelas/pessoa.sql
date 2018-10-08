
-- Criar tabela pessoa
-- Gerando em: 05/08/2018 23:34:21
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE IF NOT EXISTS `pessoa` (
	`id_pessoa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_pessoa` varchar(200) NOT NULL ,
	`telefone_pessoa` varchar(20) NOT NULL ,
	`data_atualizacao_pessoa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pessoa` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;