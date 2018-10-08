

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 17:04:23
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos`;
CREATE TABLE Lanc_Pedidos (
	`Filial` int NOT NULL,
	`Documento` char(6) NOT NULL,
	`Cliente` int DEFAULT NULL,
	`Vendedor` int DEFAULT NULL,
	`TOTAL` float DEFAULT NULL,
	`Emissao` datetime DEFAULT NULL,
	`USUARIOATUALIZACAO` char(3) DEFAULT NULL,
	`EncerradoEntregue` int(1) DEFAULT NULL,
	`Condpagamento` int DEFAULT NULL,
	`Mesa` int DEFAULT NULL,
	PRIMARY KEY (`Filial`, `Documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


