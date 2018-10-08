

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 10:20:27
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos_Vencimento`;
CREATE TABLE Lanc_Pedidos_Vencimento (
	`Filial` int NOT NULL,
	`Documento` char(6) NOT NULL,
	`Sequencia` char(10) NOT NULL,
	`Valor` float DEFAULT NULL,
	`CondPagamento` int DEFAULT NULL,
	PRIMARY KEY (`Filial`, `Documento`, `Sequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


