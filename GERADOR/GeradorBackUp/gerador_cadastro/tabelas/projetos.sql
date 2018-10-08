
-- Criar tabela projetos
-- Gerando em: 05/08/2018 23:35:07
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `projetos`;

CREATE TABLE IF NOT EXISTS `projetos` (
	`id_projeto` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome` varchar(500) NOT NULL ,
	`host` varchar(500) NOT NULL ,
	`user` varchar(500) NOT NULL ,
	`pws` varchar(500) NOT NULL ,
	`bancoDados` varchar(500) NOT NULL ,
	`versao` varchar(20) NOT NULL DEFAULT 1 ,
	`backup_geral` datetime  ,
	`bool_ativo` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;