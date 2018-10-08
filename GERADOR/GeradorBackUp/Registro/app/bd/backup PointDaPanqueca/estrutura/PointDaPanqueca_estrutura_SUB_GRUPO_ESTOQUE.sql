

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 11:33:47
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `SUB_GRUPO_ESTOQUE`;
CREATE TABLE SUB_GRUPO_ESTOQUE (
	`GRUPO` int NOT NULL,
	`SUB_GRUPO` int NOT NULL,
	`DESCRICAO` varchar(50) DEFAULT NULL,
	`Imagem` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`GRUPO`, `SUB_GRUPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


