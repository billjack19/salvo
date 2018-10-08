
-- Criar tabela config_relatorio
-- Gerando em: 05/08/2018 23:35:02
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `config_relatorio`;

CREATE TABLE IF NOT EXISTS `config_relatorio` (
	`id_config_relatorio` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`tabelas_config_relatorio` text NOT NULL ,
	`projetos_id` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;