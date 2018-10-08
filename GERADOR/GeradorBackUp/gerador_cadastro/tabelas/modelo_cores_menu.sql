
-- Criar tabela modelo_cores_menu
-- Gerando em: 05/08/2018 23:35:05
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `modelo_cores_menu`;

CREATE TABLE IF NOT EXISTS `modelo_cores_menu` (
	`id_modelo_cores_menu` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_modelo_cores_menu` varchar(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;