

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 17:40:45
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabAdicionalProdutosItens`;
CREATE TABLE TabAdicionalProdutosItens (
	`Codigo` int NOT NULL,
	`Item` int NOT NULL,
	`Unidade` char(3) DEFAULT NULL,
	`QUANTIDADE` float DEFAULT NULL,
	`ID_TabAdicionalProdutosItens` int NOT NULL,
	PRIMARY KEY (`Codigo`, `Item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


