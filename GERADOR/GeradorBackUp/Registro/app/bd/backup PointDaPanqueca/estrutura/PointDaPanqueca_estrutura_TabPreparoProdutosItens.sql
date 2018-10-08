

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 12:03:26
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabPreparoProdutosItens`;
CREATE TABLE TabPreparoProdutosItens (
	`Codigo` int NOT NULL,
	`Sequencia` int NOT NULL,
	`DescricaoPreparo` varchar(100) DEFAULT NULL,
	`ID_TabPreparoProdutosItens` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


