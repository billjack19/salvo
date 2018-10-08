

--
-- Database COOPERATIVA 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 17/01/2018 09:13:22
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE COOPERATIVA;


DROP TABLE IF EXISTS `CLIEFORNEC_TELEFONE`;
CREATE TABLE CLIEFORNEC_TELEFONE (
	`Cliente` int NOT NULL,
	`Sequencia` int NOT NULL,
	`Email` varchar(255) DEFAULT NULL,
	PRIMARY KEY (`Cliente`, `Sequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


