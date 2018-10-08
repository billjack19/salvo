

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 13:06:34
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos_Itens`;
CREATE TABLE Lanc_Pedidos_Itens (
	`Filial` int NOT NULL,
	`Documento` char(6) NOT NULL,
	`Sequencia` int NOT NULL,
	`SUB_GRUPO` int DEFAULT NULL,
	`GRUPO` int DEFAULT NULL,
	`ITEM` int DEFAULT NULL,
	`QUANTIDADE` float DEFAULT NULL,
	`VALOR_UNITARIO` float DEFAULT NULL,
	`VALOR_TOTAL` float DEFAULT NULL,
	`AdicionalProduto` varchar(200) DEFAULT NULL,
	`ID_Lanc_Pedidos_Itens` int NOT NULL PRIMARY KEY AUTO_INCREMENT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


