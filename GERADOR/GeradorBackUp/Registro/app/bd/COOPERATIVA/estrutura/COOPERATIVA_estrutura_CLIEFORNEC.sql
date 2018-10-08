

--
-- Database COOPERATIVA 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 17/01/2018 08:50:28
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE COOPERATIVA;


DROP TABLE IF EXISTS `CLIEFORNEC`;
CREATE TABLE CLIEFORNEC (
	`CODIGO` int NOT NULL,
	`CPF_CGC` varchar(18) DEFAULT NULL,
	`RAZAOSOCIAL` varchar(255) DEFAULT NULL,
	`NOMEFANTASIA` varchar(255) DEFAULT NULL,
	PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


