
-- Criar tabela grade_combo
-- Gerando em: 05/08/2018 23:35:03
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `grade_combo`;

CREATE TABLE IF NOT EXISTS `grade_combo` (
	`id_grade_combo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`projetos_id` int(11) NOT NULL ,
	`tabela` varchar(200) NOT NULL ,
	`campo_primario` varchar(200) NOT NULL ,
	`campo_grade` varchar(200) NOT NULL ,
	`campo_grade_primario` varchar(200)  ,
	`campo_principal` varchar(200) NOT NULL ,
	`sequencia` int(2) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;