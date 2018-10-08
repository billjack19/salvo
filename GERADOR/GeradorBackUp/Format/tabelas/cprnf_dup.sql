
-- Criar tabela cprnf_dup
-- Gerando em: 01/08/2018 16:50:25
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cprnf_dup`;

CREATE TABLE IF NOT EXISTS `cprnf_dup` (
	`Filial` int(11) NOT NULL PRIMARY KEY ,
	`SERIE` char(3) NOT NULL PRIMARY KEY ,
	`DUPLICATA` char(8) NOT NULL PRIMARY KEY ,
	`NOTA_FISCAL` char(6) NOT NULL ,
	`cliente` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro