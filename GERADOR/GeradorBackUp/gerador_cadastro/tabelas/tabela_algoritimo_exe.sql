
-- Criar tabela tabela_algoritimo_exe
-- Gerando em: 05/08/2018 23:35:08
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `tabela_algoritimo_exe`;

CREATE TABLE IF NOT EXISTS `tabela_algoritimo_exe` (
	`id_tabela_algoritimo_exe` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_padrao` varchar(200) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;