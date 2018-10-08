

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 12:03:57
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabAdicionalProdutosItens`;
CREATE TABLE TabAdicionalProdutosItens (
	`Codigo` int NOT NULL,
	`Item` int NOT NULL,
	`Unidade` char(3) DEFAULT NULL,
	`QUANTIDADE` float DEFAULT NULL,
	`ID_TabAdicionalProdutosItens` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


