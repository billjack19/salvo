
-- Criar tabela formula
-- Gerando em: 05/08/2018 23:35:03
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `formula`;

CREATE TABLE IF NOT EXISTS `formula` (
	`id_formula` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_formula` varchar(200) NOT NULL ,
	`formula_formula` varchar(200) NOT NULL ,
	`numero_campos_formula` int(11) NOT NULL ,
	`numero_campos_data_formula` int(11) NOT NULL ,
	`bool_ativo_formula` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;