

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 11:34:55
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabUsuarios`;
CREATE TABLE TabUsuarios (
	`Identificacao` char(3) NOT NULL,
	`Nome` char(30) DEFAULT NULL,
	`Senha` char(10) DEFAULT NULL,
	`FILIAL` int DEFAULT NULL,
	`Vendedor` int DEFAULT NULL,
	`Inativo` int(1) DEFAULT NULL,
	PRIMARY KEY (`Identificacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


