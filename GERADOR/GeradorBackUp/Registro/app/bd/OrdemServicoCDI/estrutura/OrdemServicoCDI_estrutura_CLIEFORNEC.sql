

--
-- Database OrdemServicoCDI 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 03/02/2018 08:16:06
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE OrdemServicoCDI;


DROP TABLE IF EXISTS `CLIEFORNEC`;
CREATE TABLE CLIEFORNEC (
	`CODIGO` int NOT NULL,
	`CPF_CGC` varchar(18) DEFAULT NULL,
	`RAZAOSOCIAL` varchar(70) DEFAULT NULL,
	PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


