

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/03/2018 17:35:48
--   _       _          __     ___             ______        _____     ___                 ___  
-- // \\  // \\  ||   //  \\  ||  \\    //\\     ||    ||   //   \\  ||   ||       //||  //   ||
-- ||  \\//  ||  ||   || __   ||__//   //__\\    ||    ||   ||   ||  ||   ||  ===    ||  ||___||
-- ||        ||  ||   \\__//  ||  \\  //    \\   ||    ||   \\___//  ||   ||         ||   ____||

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos_Itens_Preparo`;
CREATE TABLE Lanc_Pedidos_Itens_Preparo (
	`ID_Lanc_Pedidos_Itens_Preparo` int NOT NULL,
	`ID_TabPreparoProdutosItens` int DEFAULT NULL,
	`Filial` int DEFAULT NULL,
	`Documento` varchar(6) DEFAULT NULL,
	`DescricaoPreparo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


