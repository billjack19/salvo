

--
-- Database OrdemServicoCDI 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 03/02/2018 08:16:51
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE OrdemServicoCDI;


DROP TABLE IF EXISTS `CLIEFORNEC_TELEFONE`;
CREATE TABLE CLIEFORNEC_TELEFONE (
	`Cliente` int NOT NULL,
	`Sequencia` int NOT NULL,
	`Telefone` char(10) DEFAULT NULL,
	`EMail` varchar(100) DEFAULT NULL,
	PRIMARY KEY (`Cliente`, `Sequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


