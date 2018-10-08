
-- Criar tabela backup_tabela
-- Gerando em: 05/08/2018 23:35:02
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `backup_tabela`;

CREATE TABLE IF NOT EXISTS `backup_tabela` (
	`id_backup_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_tabela` varchar(100) NOT NULL ,
	`data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`projetos_id` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;