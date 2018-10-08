

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 20/03/2018 08:19:48
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `NF_RECEBER`;
CREATE TABLE NF_RECEBER (
	`FILIAL` int NOT NULL,
	`NotaFiscal` char(6) NOT NULL,
	`FlagCancelada` int(1) DEFAULT NULL,
	`PEDIDO` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


