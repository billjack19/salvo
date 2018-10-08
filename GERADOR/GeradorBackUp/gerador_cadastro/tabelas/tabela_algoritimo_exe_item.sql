
-- Criar tabela tabela_algoritimo_exe_item
-- Gerando em: 05/08/2018 23:35:08
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `tabela_algoritimo_exe_item`;

CREATE TABLE IF NOT EXISTS `tabela_algoritimo_exe_item` (
	`id_tabela_algoritimo_exe_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`tabela_algoritimo_exe_id` int(11) NOT NULL ,
	`descricao_tabela` varchar(200) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;