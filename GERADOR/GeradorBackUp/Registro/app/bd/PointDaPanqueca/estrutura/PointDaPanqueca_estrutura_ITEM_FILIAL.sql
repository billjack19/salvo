

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 20/03/2018 08:15:31
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `ITEM_FILIAL`;
CREATE TABLE ITEM_FILIAL (
	`FILIAL` int NOT NULL,
	`GRUPO` int NOT NULL,
	`SUB_GRUPO` int NOT NULL,
	`ITEM` int NOT NULL,
	`PRECO_BASE` float DEFAULT NULL,
	`VALOR_INCLUSAO` float DEFAULT NULL,
	PRIMARY KEY (`FILIAL`, `GRUPO`, `SUB_GRUPO`, `ITEM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


