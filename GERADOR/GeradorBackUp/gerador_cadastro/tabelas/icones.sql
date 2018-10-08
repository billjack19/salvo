
-- Criar tabela icones
-- Gerando em: 05/08/2018 23:35:04
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `icones`;

CREATE TABLE IF NOT EXISTS `icones` (
	`id_icones` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_icones` varchar(200) NOT NULL ,
	`html_icones` varchar(200) NOT NULL ,
	`tipo_icones` char(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;