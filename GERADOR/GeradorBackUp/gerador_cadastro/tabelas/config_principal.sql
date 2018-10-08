
-- Criar tabela config_principal
-- Gerando em: 05/08/2018 23:35:02
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `config_principal`;

CREATE TABLE IF NOT EXISTS `config_principal` (
	`id_config_principal` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`projetos_id` int(11) NOT NULL ,
	`modelo_cores_menu_id` int(11) NOT NULL ,
	`icone_cadastro_config_principa` varchar(100) NOT NULL ,
	`tabelas_cadastro_config_principa` text NOT NULL ,
	`logoLg_config_principa` varchar(100) NOT NULL ,
	`logoSm_config_principa` varchar(100) NOT NULL ,
	`bool_upload_config_principa` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;