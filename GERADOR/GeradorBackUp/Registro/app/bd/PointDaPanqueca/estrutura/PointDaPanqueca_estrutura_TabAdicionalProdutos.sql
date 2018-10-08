

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 17:41:12
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabAdicionalProdutos`;
CREATE TABLE TabAdicionalProdutos (
	`CODIGO` int NOT NULL,
	`DESCRICAO` varchar(100) DEFAULT NULL,
	`DataAtualizacao` datetime DEFAULT NULL,
	`HoraAtualizacao` char(8) DEFAULT NULL,
	`UsuarioAtualizacao` char(3) DEFAULT NULL,
	`QTD_NAO_COBRAR` int DEFAULT NULL,
	PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


