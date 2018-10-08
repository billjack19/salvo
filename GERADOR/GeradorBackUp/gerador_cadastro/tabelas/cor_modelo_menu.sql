
-- Criar tabela cor_modelo_menu
-- Gerando em: 05/08/2018 23:35:03
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cor_modelo_menu`;

CREATE TABLE IF NOT EXISTS `cor_modelo_menu` (
	`id_cor_modelo_menu` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_cor_modelo_menu` varchar(10) NOT NULL ,
	`modelo_cores_menu_id` int(11) NOT NULL ,
	`num_cor_modelo_menu` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;