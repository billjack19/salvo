

--
-- Database PointDaPanqueca 
-- Registros
-- Criado Pelo /******* Migration JK-19 *********/
-- Gerado: 19/12/2017 15:47:07
--  _    _        __    __          _____      ___    ___             ___
-- / \  / \  |   /  \  |  \    /\     |   |   /   \  |   |       /|  /   \
-- |  \/  |  |   | __  |__/   /__\    |   |   |   |  |   |  ---   |  |___|
-- |      |  |   \__/  |  \  /    \   |   |   \___/  |   |        |   ___|

USE PointDaPanqueca;


DROP TABLE IF EXISTS `Tab_Mesas`;
CREATE TABLE Tab_Mesas (
	`Codigo` int NOT NULL,
	`Descricao` varchar(200) DEFAULT NULL,
	`DataAtualizacao` datetime DEFAULT NULL,
	`HoraAtualizacao` char(8) DEFAULT NULL,
	`UsuarioAtualizacao` char(3) DEFAULT NULL,
	`Inativo` int(1) NOT NULL,
	PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


