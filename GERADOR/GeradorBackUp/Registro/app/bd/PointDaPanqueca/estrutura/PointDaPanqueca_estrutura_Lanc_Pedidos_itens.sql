

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 10:30:00
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos_itens`;
CREATE TABLE Lanc_Pedidos_itens (
	`Filial` int NOT NULL,
	`Documento` char(6) NOT NULL,
	`Sequencia` int NOT NULL,
	`SUB_GRUPO` int DEFAULT NULL,
	`GRUPO` int DEFAULT NULL,
	`ITEM` int DEFAULT NULL,
	`QUANTIDADE` float DEFAULT NULL,
	`VALOR_UNITARIO` float DEFAULT NULL,
	`VALOR_TOTAL` float DEFAULT NULL,
	`UNIDADE` char(3) DEFAULT NULL,
	`QUANTIDADEPRINCIPAL` float DEFAULT NULL,
	`VALOR_BASE` float DEFAULT NULL,
	`AdicionalProduto` varchar(200) DEFAULT NULL,
	`FlagImpressao` int(1) DEFAULT NULL,
	`ID_Lanc_Pedidos_Itens` int NOT NULL,
	PRIMARY KEY (`Filial`, `Documento`, `Sequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


