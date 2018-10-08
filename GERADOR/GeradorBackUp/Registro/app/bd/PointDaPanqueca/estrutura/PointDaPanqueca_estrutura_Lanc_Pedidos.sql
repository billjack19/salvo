

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 10:09:41
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos`;
CREATE TABLE Lanc_Pedidos (
	`Filial` int NOT NULL,
	`Documento` char(6) NOT NULL,
	`Cliente` int DEFAULT NULL,
	`Vendedor` int DEFAULT NULL,
	`TOTAL` float DEFAULT NULL,
	`CONTATO` varchar(50) DEFAULT NULL,
	`Emissao` datetime DEFAULT NULL,
	`Observacao` varchar(500) DEFAULT NULL,
	`FlagCancelada` int(1) DEFAULT NULL,
	`USUARIOATUALIZACAO` char(3) DEFAULT NULL,
	`EncerradoEntregue` int(1) DEFAULT NULL,
	`Condpagamento` int DEFAULT NULL,
	`Desconto` float DEFAULT NULL,
	`ValorTroco` float DEFAULT NULL,
	`Mesa` int DEFAULT NULL,
	`DataEntregue` datetime DEFAULT NULL,
	PRIMARY KEY (`Filial`, `Documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


