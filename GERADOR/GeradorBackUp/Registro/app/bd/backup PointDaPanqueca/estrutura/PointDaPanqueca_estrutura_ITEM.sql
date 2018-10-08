

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 12/02/2018 16:10:22
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `ITEM`;
CREATE TABLE ITEM (
	`GRUPO` int NOT NULL,
	`SUB_GRUPO` int NOT NULL,
	`ITEM` int NOT NULL,
	`DESCRICAO` varchar(300) DEFAULT NULL,
	`UNIDADE_MEDIDA` varchar(3) DEFAULT NULL,
	`Adicional` int DEFAULT NULL,
	`Preparo` int DEFAULT NULL,
	PRIMARY KEY (`GRUPO`, `SUB_GRUPO`, `ITEM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


