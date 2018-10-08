

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 17:36:11
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos_Itens_Adicional`;
CREATE TABLE Lanc_Pedidos_Itens_Adicional (
	`ID_Lanc_Pedidos_Itens_Adicional` int NOT NULL,
	`ID_TabAdicionalProdutosItens` int DEFAULT NULL,
	`Filial` int NOT NULL,
	`Documento` char(6) NOT NULL,
	`ITEM` int DEFAULT NULL,
	`QUANTIDADE` float DEFAULT NULL,
	`UNIDADE` char(3) DEFAULT NULL,
	`QUANTIDADEPRINCIPAL` float DEFAULT NULL,
	`VALOR_BASE` float DEFAULT NULL,
	`VALOR_UNITARIO` float DEFAULT NULL,
	`VALOR_TOTAL` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


