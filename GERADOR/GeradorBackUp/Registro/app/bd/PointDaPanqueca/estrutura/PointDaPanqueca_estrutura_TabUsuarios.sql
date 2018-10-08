

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 17:44:39
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabUsuarios`;
CREATE TABLE TabUsuarios (
	`Identificacao` char(3) NOT NULL,
	`Nome` char(30) DEFAULT NULL,
	`Senha` char(10) DEFAULT NULL,
	`FILIAL` int DEFAULT NULL,
	`Vendedor` int DEFAULT NULL,
	PRIMARY KEY (`Identificacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


