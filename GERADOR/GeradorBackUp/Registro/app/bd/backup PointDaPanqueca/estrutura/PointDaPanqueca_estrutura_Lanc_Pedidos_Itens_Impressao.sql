

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 15:45:41
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Lanc_Pedidos_Itens_Impressao`;
CREATE TABLE Lanc_Pedidos_Itens_Impressao (
	`ID_LANC_PEDIDOS_ITENS_IMPRESSAO` int NOT NULL,
	`Filial` int DEFAULT NULL,
	`Documento` varchar(6) DEFAULT NULL,
	`Sequencia` int DEFAULT NULL,
	`Item` int DEFAULT NULL,
	`Quantidade` float DEFAULT NULL,
	`Descricao` varchar(4000) DEFAULT NULL,
	`DataAtualizacao` date DEFAULT NULL,
	`HoraAtualizacao` char(8) DEFAULT NULL,
	`UsuarioAtualizacao` char(3) DEFAULT NULL,
	`SequenciaImpressao` int DEFAULT NULL,
	`CK_CONFIRMADO` int(1) DEFAULT NULL,
	`FlagImpressao` int(1) DEFAULT NULL,
	PRIMARY KEY (`ID_LANC_PEDIDOS_ITENS_IMPRESSAO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


