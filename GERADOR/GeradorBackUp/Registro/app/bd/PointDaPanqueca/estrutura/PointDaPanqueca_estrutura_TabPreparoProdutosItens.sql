

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 17:39:14
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabPreparoProdutosItens`;
CREATE TABLE TabPreparoProdutosItens (
	`Codigo` int NOT NULL,
	`Sequencia` int NOT NULL,
	`DescricaoPreparo` varchar(100) DEFAULT NULL,
	`ID_TabPreparoProdutosItens` int NOT NULL,
	PRIMARY KEY (`Codigo`, `Sequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


