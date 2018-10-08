

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 13:57:57
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `TabAdicionalProdutos`;
CREATE TABLE TabAdicionalProdutos (
	`CODIGO` int NOT NULL,
	`DESCRICAO` varchar(100) DEFAULT NULL,
	`DataAtualizacao` datetime DEFAULT NULL,
	`HoraAtualizacao` char(8) DEFAULT NULL,
	`UsuarioAtualizacao` char(3) DEFAULT NULL,
	`QTD_NAO_COBRAR` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


