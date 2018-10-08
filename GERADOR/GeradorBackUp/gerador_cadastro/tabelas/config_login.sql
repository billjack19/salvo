
-- Criar tabela config_login
-- Gerando em: 05/08/2018 23:35:02
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `config_login`;

CREATE TABLE IF NOT EXISTS `config_login` (
	`id_config_login` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_config_login` varchar(100) NOT NULL ,
	`imagem_fundo_id` int(11) NOT NULL ,
	`imagem_icone_id` int(11) NOT NULL ,
	`tabela_login_config_login` varchar(100) NOT NULL ,
	`login_config_login` varchar(100) NOT NULL ,
	`senha_config_login` varchar(100) NOT NULL ,
	`cor_fundo_config_login` varchar(10) NOT NULL ,
	`password_config_login` int(1) NOT NULL ,
	`projetos_id` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;