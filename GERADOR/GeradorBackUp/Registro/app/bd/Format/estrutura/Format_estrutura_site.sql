

--
-- Database Format 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 21/12/2017 15:07:01

--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||



USE Format;


DROP TABLE IF EXISTS `SITE`;
CREATE TABLE SITE (
	`ID_SITE` int NOT NULL,
	`NOME_EMPRESA` varchar(100) DEFAULT NULL,
	`NOME_CIDADE` varchar(100) DEFAULT NULL,
	`ESTADO` char(2) DEFAULT NULL,
	`FONE` varchar(14) DEFAULT NULL,
	`FONE_APP` varchar(14) DEFAULT NULL,
	`EMAIL` varchar(100) DEFAULT NULL,
	`sendusername` varchar(255) DEFAULT NULL,
	`sendpassword` varchar(255) DEFAULT NULL,
	`smtpserver` varchar(255) DEFAULT NULL,
	`smtpserverport` int DEFAULT NULL,
	`MailFrom` varchar(255) DEFAULT NULL,
	`MailTo` varchar(255) DEFAULT NULL,
	`MailCc` varchar(255) DEFAULT NULL,
	PRIMARY KEY (`ID_SITE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


